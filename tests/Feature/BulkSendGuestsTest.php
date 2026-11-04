<?php

namespace Tests\Feature;

use App\Services\WhatsAppBulkSender;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BulkSendGuestsTest extends TestCase
{
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'slug' => 'arya-kinanthi',
            'base_url' => 'http://localhost/u/arya-kinanthi',
            'guests' => [
                ['name' => 'Bapak Andi Wijaya', 'phone' => '081234567890'],
                ['name' => 'Ibu Sari & Keluarga', 'phone' => '081298765432'],
            ],
        ], $overrides);
    }

    public function test_mode_simulasi_mengirim_tanpa_kredensial(): void
    {
        config([
            'services.whatsapp.provider' => '',
            'services.whatsapp.token' => '',
            'services.whatsapp.phone_id' => '',
        ]);
        Http::fake();

        $response = $this->postJson(route('invitation.bulk-send'), $this->payload());

        $response->assertOk()
            ->assertJsonPath('mode', 'simulasi')
            ->assertJsonPath('sent', 2)
            ->assertJsonPath('failed', 0);

        Http::assertNothingSent();
    }

    public function test_cloud_api_mengirim_template_ke_setiap_tamu(): void
    {
        config([
            'services.whatsapp.provider' => 'cloud',
            'services.whatsapp.token' => 'token-uji',
            'services.whatsapp.phone_id' => '1234567890',
            'services.whatsapp.template' => '',
        ]);
        Http::fake(['graph.facebook.com/*' => Http::response(['messages' => [['id' => 'wamid.1']]], 200)]);

        $response = $this->postJson(route('invitation.bulk-send'), $this->payload());

        $response->assertOk()
            ->assertJsonPath('mode', 'cloud')
            ->assertJsonPath('sent', 2);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/1234567890/messages')
                && $request['to'] === '6281234567890'
                && str_contains($request['text']['body'], 'Bapak Andi Wijaya')
                && str_contains($request['text']['body'], '?to=Bapak-Andi-Wijaya');
        });
    }

    public function test_nomor_tidak_valid_dihitung_gagal(): void
    {
        config(['services.whatsapp.provider' => '']);
        Http::fake();

        $response = $this->postJson(route('invitation.bulk-send'), $this->payload([
            'guests' => [['name' => 'Tanpa Nomor', 'phone' => 'abc']],
        ]));

        $response->assertOk()
            ->assertJsonPath('sent', 0)
            ->assertJsonPath('failed', 1)
            ->assertJsonPath('results.0.error', 'Nomor tidak valid');
    }

    public function test_normalisasi_nomor_indonesia(): void
    {
        $sender = new WhatsAppBulkSender;

        $this->assertSame('6281234567890', $sender->normalizePhone('081234567890'));
        $this->assertSame('6281234567890', $sender->normalizePhone('81234567890'));
        $this->assertSame('6281234567890', $sender->normalizePhone('+62 812-3456-7890'));
        $this->assertSame('', $sender->normalizePhone('123'));
    }

    public function test_link_memakai_tanda_hubung(): void
    {
        config(['services.whatsapp.provider' => '']);
        Http::fake();

        $response = $this->postJson(route('invitation.bulk-send'), $this->payload([
            'guests' => [['name' => 'Ibu Sari & Keluarga', 'phone' => '081298765432']],
        ]));

        $response->assertOk()->assertJsonPath('sent', 1);
    }

    public function test_tes_kirim_satu_nomor_mengembalikan_tautan_wa_me(): void
    {
        config(['services.whatsapp.provider' => '']);
        Http::fake();

        $response = $this->postJson(route('invitation.test-send'), [
            'phone' => '081234567890',
            'name' => 'Bapak Andi Wijaya',
            'slug' => 'arya-kinanthi',
        ]);

        $response->assertOk()
            ->assertJsonPath('mode', 'simulasi')
            ->assertJsonPath('ok', true)
            ->assertJsonPath('simulated', true)
            ->assertJsonPath('phone', '6281234567890');

        $this->assertStringContainsString('https://wa.me/6281234567890?text=', $response->json('wa_me'));
        $this->assertStringContainsString('?to=Bapak-Andi-Wijaya', $response->json('link'));
    }

    public function test_tes_kirim_cloud_memanggil_api(): void
    {
        config([
            'services.whatsapp.provider' => 'cloud',
            'services.whatsapp.token' => 'token-uji',
            'services.whatsapp.phone_id' => '1234567890',
            'services.whatsapp.template' => '',
        ]);
        Http::fake(['graph.facebook.com/*' => Http::response(['messages' => [['id' => 'wamid.9']]], 200)]);

        $response = $this->postJson(route('invitation.test-send'), [
            'phone' => '081234567890',
            'name' => 'Bapak Andi Wijaya',
        ]);

        $response->assertOk()
            ->assertJsonPath('mode', 'cloud')
            ->assertJsonPath('ok', true)
            ->assertJsonPath('simulated', false);

        Http::assertSent(fn ($request) => str_contains($request->url(), '/messages')
            && $request['to'] === '6281234567890');
    }

    public function test_tes_kirim_menolak_nomor_tidak_valid(): void
    {
        config(['services.whatsapp.provider' => '']);
        Http::fake();

        $response = $this->postJson(route('invitation.test-send'), ['phone' => '12']);

        $response->assertOk()
            ->assertJsonPath('ok', false)
            ->assertJsonPath('error', 'Nomor tidak valid');
    }
}
