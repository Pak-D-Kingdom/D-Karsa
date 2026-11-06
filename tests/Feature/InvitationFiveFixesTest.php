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

    public function test_setiap_acara_punya_kartu_peta_interaktif(): void
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
            ->assertSee('q=-7.2892%2C112.7211', false)
            ->assertSee('Muat Peta Interaktif', false);
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

    public function test_kustom_tier_merender_4_color_pickers(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'kustom',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('id="bespokeBg"', false)
            ->assertSee('id="bespokeCard"', false)
            ->assertSee('id="bespokeColor"', false)
            ->assertSee('id="bespokeTxt"', false)
            ->assertSee('cBg', false)
            ->assertSee('cCard', false)
            ->assertSee('cAcc', false)
            ->assertSee('cTxt', false);
    }

    public function test_event_2_dresscode_badge_tampil_pada_acara_kedua(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'events_json' => json_encode([
                ['title' => 'Akad Nikah', 'date' => '2026-11-14', 'venue_name' => 'Masjid Agung', 'dresscode' => 'Kebaya Putih'],
                ['title' => 'Resepsi', 'date' => '2026-11-14', 'venue_name' => 'Gedung Serbaguna', 'dresscode' => 'Batik Modern & Navy'],
            ]),
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('id="event-1-dresscode-badge"', false)
            ->assertSee('Kebaya Putih', false)
            ->assertSee('id="event-2-dresscode-badge"', false)
            ->assertSee('Batik Modern &amp; Navy', false);
    }

    public function test_schedule_card_tidak_berisi_tombol_maps(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'events_json' => json_encode([
                ['title' => 'Akad Nikah', 'date' => '2026-11-14', 'venue_name' => 'Masjid Agung', 'address' => 'Jl. Ketintang', 'maps_url' => 'https://maps.google.com/?q=Masjid'],
            ]),
        ]);

        $response = $this->get($path)->assertOk();
        $content = $response->getContent();

        if (preg_match('/<section id="acara".*?<\/section>/s', $content, $m)) {
            $this->assertStringNotContainsString('PETUNJUK GOOGLE MAPS', $m[0]);
            $this->assertStringNotContainsString('Petunjuk Google Maps', $m[0]);
            $this->assertStringNotContainsString('Buka Google Maps', $m[0]);
        }
    }

    public function test_palet_warna_kustom_diterapkan_ke_undangan(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'kustom',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'cBg' => '#0E4369',
            'cCard' => '#B71C1C',
            'cAcc' => '#005082',
            'cTxt' => '#FFFFFF',
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('data-tier="kustom"', false)
            ->assertSee('--obsidian: #0E4369', false)
            ->assertSee('--surface-container: #B71C1C', false)
            ->assertSee('--gold: #005082', false)
            ->assertSee('--on-surface: #FFFFFF', false);
    }

    public function test_dresscode_acara_1_dan_acara_2_keduanya_tersimpan_dan_tampil(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'kustom',
            'category' => 'Pernikahan',
            'groom_name' => 'Arya',
            'bride_name' => 'Kinanthi',
            'event_1_dresscode' => 'Kebaya Putih Elegan',
            'event_2_dresscode' => 'Batik Tenun Nusantara',
            'events_json' => json_encode([
                ['title' => 'Akad Nikah', 'date' => '2026-11-14', 'venue_name' => 'Masjid Raya', 'dresscode' => 'Kebaya Putih Elegan', 'dresscode_colors' => '#FFFFFF,#E5C158,#1D6FA5,#2A2A26'],
                ['title' => 'Resepsi Malam', 'date' => '2026-11-14', 'venue_name' => 'Ballroom Grand', 'dresscode' => 'Batik Tenun Nusantara', 'dresscode_colors' => '#1D6FA5,#C9A050,#FFFFFF,#000000'],
            ]),
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('Kebaya Putih Elegan', false)
            ->assertSee('Batik Tenun Nusantara', false);
    }
}
