<?php

namespace Tests\Feature;

use App\Services\TemplateManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTemplatesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 89 template event non-pernikahan (5 kategori), urut sesuai meta.
     *
     * @return array<int, array{0: string, 1: string, 2: string}>
     */
    public static function eventProvider(): array
    {
        $rows = [];
        foreach (TemplateManager::eventMeta() as $t) {
            $rows[] = [$t['key'], $t['name'], $t['palette'], $t['culture']];
        }

        return $rows;
    }

    public function test_all_event_templates_are_registered(): void
    {
        $all = TemplateManager::all();

        foreach (self::eventProvider() as [$key, $name, $palette, $culture]) {
            $this->assertArrayHasKey($key, $all, "Template {$key} tidak terdaftar di TemplateManager::all()");
            $this->assertSame(TemplateManager::viewPath($key), $all[$key]['blade']);
            $this->assertSame('/demo/'.$key, $all[$key]['demo_route']);
        }
    }

    public function test_catalog_and_demo_data_cover_the_suite(): void
    {
        $catalogKeys = array_column(TemplateManager::getCatalogThemes(), 'key');

        foreach (self::eventProvider() as [$key, $name, $palette, $culture]) {
            $this->assertContains($key, $catalogKeys, "{$key} tidak muncul di katalog builder");

            $couple = TemplateManager::getDemoCouple($key);
            $this->assertNotEmpty($couple->groom_name);
            $this->assertGreaterThanOrEqual(4, $couple->galleries->count());
        }
    }

    public function test_each_event_demo_route_renders_the_full_invitation(): void
    {
        foreach (self::eventProvider() as [$key, $name, $palette, $culture]) {
            $response = $this->get('/demo/'.$key);

            $response->assertOk();
            $response->assertSee('Designed with Love by', false);
            $response->assertSee('cdDays', false);
            // Wajib di keenam kategori & keempat tier: kartu QR tamu + kartu ATM metalik.
            $response->assertSee('id="section-guest-qr"', false);
            $response->assertSee('id="section-digital-gift"', false);
            $response->assertDontSee('api.qrserver', false);
            if ($culture === 'corporate') {
                $response->assertSee('Registrasi Peserta', false);
                $response->assertSee('Official VIP Delegate E-Ticket', false);
                $response->assertSee('Amplop Digital', false);
            } else {
                $response->assertSee('KIRIM KONFIRMASI RSVP', false);
            }
            $response->assertSee('Salin', false);
            $response->assertSee('previewGalleryGrid', false);
            $response->assertSee('audio-pill', false);
            $response->assertSee($name);

            if ($culture === 'corporate') {
                $response->assertSee('envelope-stage', false);
                $response->assertDontSee('class="gate-door left"', false);
                $response->assertSee('BUKA AMPLOP UNDANGAN', false);
            } else {
                $response->assertSee('gateDoorLeft', false);
                $response->assertSee('gateDoorRight', false);
                $response->assertSee('BUKA UNDANGAN', false);
            }

            if ($culture === 'birthday') {
                $response->assertSee('confetti-canvas', false);
            }
        }
    }
}
