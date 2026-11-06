<?php

namespace Tests\Feature;

use App\Support\ColorTheme;
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
     * Tombol petunjuk arah harus mengikuti isi field peta apa adanya (termasuk short link),
     * bukan dialihkan ke pencarian. Hanya alamat peta kosong (https://maps.google.com) yang
     * jatuh ke pencarian alamat supaya tidak berujung halaman peta tanpa titik.
     */
    public function test_map_directions_follows_the_filled_link(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_title=Akad&event_1_venue=Balai%20Kartini&event_1_address=Jl.%20Sudirman%209&event_1_maps_url=https://maps.app.goo.gl/abc123XYZ');

        $response->assertOk();
        $this->assertStringContainsString('href="https://maps.app.goo.gl/abc123XYZ"', $response->getContent());

        $empty = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_title=Akad&event_1_venue=Balai%20Kartini&event_1_address=Jl.%20Sudirman%209&event_1_maps_url=https://maps.google.com');

        $empty->assertOk();
        $html = $empty->getContent();
        $this->assertStringContainsString('google.com/maps/search/?api=1', $html);
    }

    /**
     * Nama tamu di sampul memakai warna yang dipilih (accent), bukan warna teks bawaan.
     */
    public function test_gate_guest_name_uses_selected_accent(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&cAcc=%23B4762A&to=Ibu%20Sari');

        $response->assertOk();
        $this->assertMatchesRegularExpression(
            '/id="gate-guest-name"[^>]*style="color:var\(--gate-accent\)"/',
            $response->getContent(),
            'Nama tamu pada sampul harus mengikuti warna aksen yang dipilih.'
        );
    }

    /**
     * Tombol petunjuk arah pada kartu lokasi memakai gaya pil (.map-directions), bukan tautan garis bawah.
     */
    public function test_map_directions_uses_pill_button_style(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif&event_1_venue=Balai%20Kartini&event_1_address=Jl.%20Sudirman%209');

        $response->assertOk();

        $html = $response->getContent();
        $this->assertStringContainsString('class="map-directions"', $html);
        $this->assertStringContainsString('.map-directions {', $html);
    }

    /**
     * Konten undangan tidak boleh tampil sebelum gerbang dibuka, dan tidak memakai blur (mahal saat transisi).
     */
    public function test_content_is_hidden_behind_gate_without_blur(): void
    {
        $response = $this->get('/demo/minimalis-lumen?tier=eksklusif');

        $response->assertOk();

        $html = $response->getContent();
        $this->assertStringContainsString('body:not(.gate-open):not(.gate-opening) #bottom-hud', $html);
        $this->assertStringContainsString('body.gate-locked main { opacity: 0; visibility: hidden;', file_get_contents(resource_path('views/templates/partials/event-theme.blade.php')));
    }

    /**
     * Tombol petunjuk arah harus persis mengikuti tautan peta yang diisi di formulir.
     */
    public function test_map_directions_follows_filled_link(): void
    {
        $link = 'https://www.google.com/maps/place/Belia+Cosmetic/@-7.2892,112.7211,17z';
        $response = $this->get('/demo/minimalis-lumen?tier=kustom&event_1_title=Akad&event_1_venue=Belia+Cosmetic&event_1_maps_url='.urlencode($link));

        $response->assertOk();
        $this->assertStringContainsString('href="'.$link.'"', $response->getContent());
    }

    /**
     * Warna kustom yang menyatu dengan latar harus digeser otomatis agar tetap terbaca.
     */
    public function test_blended_custom_colors_are_adjusted_for_contrast(): void
    {
        $readable = ColorTheme::readable('#FAF3E0', '#FAF3E0', 6.0);
        $this->assertNotSame('#FAF3E0', $readable);
        $this->assertGreaterThanOrEqual(6.0, ColorTheme::contrastRatio($readable, '#FAF3E0'));

        // Aksen terang di atas halaman terang tidak boleh dibiarkan menyatu.
        $accent = ColorTheme::readable('#FFFDF7', '#FAF3E0', 3.0);
        $this->assertGreaterThanOrEqual(3.0, ColorTheme::contrastRatio($accent, '#FAF3E0'));

        // Teks di atas blok aksen ikut menyesuaikan (gelap → putih, terang → gelap).
        $this->assertSame('#F8FAFC', ColorTheme::onColor('#241008'));
        $this->assertSame('#141311', ColorTheme::onColor('#F1E9D2'));
    }
}
