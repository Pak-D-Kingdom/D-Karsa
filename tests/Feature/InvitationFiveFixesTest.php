<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvitationFiveFixesTest extends TestCase
{
    /**
     * @param  array<string, mixed>  $params
     */
    private function previewPath(array $params): string
    {
        config(['cache.default' => 'array']);

        $response = $this->postJson('/demo/tautan', [
            'template_key' => $params['_key'] ?? 'minimalis-lumen',
            'params' => $params,
        ])->assertOk();

        return (string) parse_url($response->json('url'), PHP_URL_PATH);
    }

    public function test_setiap_acara_punya_kartu_peta_dan_tombol_sendiri(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'events_json' => json_encode([
                ['title' => 'Akad Nikah', 'date' => '2026-11-14', 'venue_name' => 'Masjid Agung', 'address' => 'Jl. Ketintang', 'maps_url' => 'https://www.google.com/maps/place/Masjid+Agung/@-7.2892,112.7211,17z'],
                ['title' => 'Resepsi', 'date' => '2026-11-14', 'venue_name' => 'Gedung Serbaguna', 'address' => 'Jl. Dukuh Kupang', 'maps_url' => 'https://maps.app.goo.gl/AbCdEf'],
            ]),
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('map-card-event-1', false)
            ->assertSee('map-card-event-2', false)
            ->assertSee('btn-map-event-2', false)
            ->assertSee('q=-7.2892%2C112.7211', false)
            ->assertSee('https://maps.app.goo.gl/AbCdEf', false);
    }

    public function test_live_streaming_sudah_dihapus_dan_dresscode_tampil(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'dresscode' => 'Kebaya Putih & Sage Green',
        ]);

        $this->get($path)
            ->assertOk()
            ->assertDontSee('LIVE STREAMING', false)
            ->assertDontSee('live_stream_url', false)
            ->assertSee('Kebaya Putih &amp; Sage Green', false);
    }

    public function test_nama_tamu_dibaca_dari_parameter_lain(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
        ]);

        $this->get($path.'?nama=Bapak+Andi+Wijaya')
            ->assertOk()
            ->assertSee('gate-guest-name', false);

        $this->get($path.'?kepada=Ibu+Sari')
            ->assertOk();
    }

    public function test_link_tamu_menimpa_nama_default_di_token(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'to' => 'Tamu Tes',
        ]);

        $this->get($path.'?to=Bapak-Andi-Wijaya')
            ->assertOk()
            ->assertSee('Bapak Andi Wijaya', false)
            ->assertDontSee('Tamu Tes', false);
    }

    public function test_warna_dresscode_pilihan_pemesan_ditampilkan(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'dresscode' => 'Kebaya Putih',
            'dresscode_colors' => '#A67B5B,#5C8063,#FFFDF9',
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('background:#A67B5B', false)
            ->assertSee('background:#5C8063', false)
            ->assertSee('#A67B5B', false);
    }
}
