<?php

namespace Tests\Feature;

use Tests\TestCase;

class KustomStudioSyncTest extends TestCase
{
    /**
     * Tautan demo harus membawa tier=kustom, bukan memaksa eksklusif.
     */
    public function test_demo_url_keeps_kustom_tier(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=kustom');

        $response->assertOk();
        $response->assertSee('data-tier="kustom"', false);
    }

    /**
     * Empat warna studio kustom (bg, card, accent, text) dipakai tema, bukan hanya tiga.
     */
    public function test_four_color_pickers_are_applied_to_theme(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=kustom&cBg=%23FAF3E0&cCard=%23FFFDF7&cAcc=%23B4762A&cTxt=%231A1A1A');

        $response->assertOk();
        $response->assertSee('"cBg":"#FAF3E0"', false);
        $response->assertSee('"cCard":"#FFFDF7"', false);
        $response->assertSee('"cAcc":"#B4762A"', false);
        $response->assertSee('"cTxt":"#1A1A1A"', false);
    }

    /**
     * Nilai studio kustom yang tidak valid tidak boleh masuk ke tema (mencegah CSS injection).
     */
    public function test_invalid_kustom_values_are_discarded(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=kustom&cBg=red;background:url(x)&cGate=<script>');

        $response->assertOk();
        $response->assertDontSee('background:url(x)', false);
        $response->assertSee('data-gate=""', false);
    }

    /**
     * Kartu jadwal hanya berisi judul, tanggal, waktu, tempat, alamat, dan badge dresscode.
     * Tombol/embed peta hanya hidup di bagian Lokasi.
     */
    public function test_schedule_card_has_no_map_button(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_title=Akad&event_2_title=Resepsi&event_1_dresscode=Kebaya&event_2_dresscode=Batik');

        $response->assertOk();

        $html = $response->getContent();
        $scheduleStart = strpos($html, '<section id="acara"');
        $scheduleEnd = strpos($html, '</section>', (int) $scheduleStart);
        $this->assertNotFalse($scheduleStart);

        $scheduleCard = substr($html, (int) $scheduleStart, (int) $scheduleEnd - (int) $scheduleStart);

        $this->assertStringNotContainsString('google.com/maps', $scheduleCard);
        $this->assertStringNotContainsString('Petunjuk', $scheduleCard);
        $this->assertStringContainsString('Dresscode:', $scheduleCard);
    }

    /**
     * Dresscode acara kedua tampil di badge-nya sendiri, bukan menumpang acara pertama.
     */
    public function test_event_two_dresscode_renders_in_its_own_badge(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_title=Akad&event_2_title=Resepsi&event_1_dresscode=Kebaya%20Putih&event_2_dresscode=Batik%20Coklat');

        $response->assertOk();

        $html = $response->getContent();

        $this->assertMatchesRegularExpression(
            '/id="event-2-dresscode-badge".*?Batik Coklat/s',
            $html,
            'Badge dresscode acara kedua harus memuat dresscode acara kedua.'
        );
        $this->assertMatchesRegularExpression(
            '/id="event-1-dresscode-badge".*?Kebaya Putih/s',
            $html,
            'Badge dresscode acara pertama harus memuat dresscode acara pertama.'
        );
    }

    /**
     * Short link Google Maps yang gagal di-expand tidak boleh dipakai apa adanya (404);
     * tombol arah harus jatuh ke pencarian alamat.
     */
    public function test_unresolved_short_map_link_falls_back_to_search(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_title=Akad&event_1_venue=Balai%20Kartini&event_1_address=Jl.%20Sudirman%209&event_1_maps_url=https://maps.app.goo.gl/tidak-ada');

        $response->assertOk();

        $html = $response->getContent();

        $this->assertStringNotContainsString('href="https://maps.app.goo.gl/tidak-ada"', $html);
        $this->assertStringContainsString('google.com/maps/search/?api=1', $html);
    }
}
