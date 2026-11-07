<?php

namespace Tests\Feature;

use App\Models\Couple;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserSixEnhancementsTest extends TestCase
{
    /**
     * @param  array<string, mixed>  $params
     */
    private function previewPath(array $params): string
    {
        config(['cache.default' => 'array']);

        $response = $this->postJson('/demo/tautan', [
            'template_key' => $params['_key'] ?? 'grandopening-cherry-blossom',
            'params' => $params,
        ])->assertOk();

        return (string) parse_url($response->json('url'), PHP_URL_PATH);
    }

    /**
     * Test 1 & 4: Contact Person 1 & 2 (1 Nama + 1 Nomor HP per person)
     * displayed as dedicated contact cards with WhatsApp link in formal event.
     */
    public function test_contact_person_fields_and_render_in_template(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Acara Formal',
            '_key' => 'grandopening-cherry-blossom',
            'host_name' => 'PT D\'Karsa Solusi Digital',
            'bride_father' => 'Bambang Wijaya',
            'cp_phone_1' => '081234567890',
            'bride_mother' => 'Siti Rahma',
            'cp_phone_2' => '085711112233',
        ]);

        $this->get($path)
            ->assertOk()
            ->assertSee('Bambang Wijaya', false)
            ->assertSee('081234567890', false)
            ->assertSee('wa.me/6281234567890', false)
            ->assertSee('Siti Rahma', false)
            ->assertSee('085711112233', false)
            ->assertSee('wa.me/6285711112233', false);
    }

    /**
     * Test 2: Bottom HUD Dock (Gambar 5) adapts labels and icons per event category.
     */
    public function test_bottom_dock_adapts_to_event_templates(): void
    {
        // 1. Corporate / Acara Formal
        $corpPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Acara Formal',
            '_key' => 'grandopening-cherry-blossom',
        ]);

        $this->get($corpPath)
            ->assertOk()
            ->assertSee('TENTANG', false)
            ->assertSee('AGENDA', false)
            ->assertSee('GALERI', false)
            ->assertSee('TIKET', false)
            ->assertSee('UCAPAN', false);

        // 2. Birthday / Ulang Tahun
        $bdayPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Ulang Tahun',
            '_key' => 'birthday-bold-red',
        ]);

        $this->get($bdayPath)
            ->assertOk()
            ->assertSee('ULTAH', false)
            ->assertSee('PESTA', false)
            ->assertSee('QR TAMU', false);

        // 3. Graduate / Wisuda
        $gradPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Wisuda',
            '_key' => 'kelulusan-chocolate-luxe',
        ]);

        $this->get($gradPath)
            ->assertOk()
            ->assertSee('WISUDA', false);

        // 4. Wedding / Pernikahan
        $wedPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Pernikahan',
            '_key' => 'minimalis-lumen',
        ]);

        $this->get($wedPath)
            ->assertOk()
            ->assertSee('PROFIL', false)
            ->assertSee('ACARA', false)
            ->assertSee('DOA', false);
    }

    /**
     * Test 3: Quotes adapt to template category if empty or custom.
     */
    public function test_quotes_adapt_to_event_category(): void
    {
        // Corporate default quote
        $corpPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Acara Formal',
            '_key' => 'grandopening-cherry-blossom',
        ]);

        $this->get($corpPath)
            ->assertOk()
            ->assertSee('agenda resmi ini', false)
            ->assertSee('Panitia Pelaksana', false);

        // Birthday default quote
        $bdayPath = $this->previewPath([
            'preview' => '1',
            'tier' => 'eksklusif',
            'category' => 'Ulang Tahun',
            '_key' => 'birthday-bold-red',
        ]);

        $this->get($bdayPath)
            ->assertOk()
            ->assertSee('Selamat bertambah usia', false);
    }

    /**
     * Test 5 & 6: Builder view has the required contrast solver, dynamic bank 1 & 2 fields,
     * contact person fields, and button micro-interaction animations.
     */
    public function test_builder_view_contains_all_six_enhancements(): void
    {
        $response = $this->get('/buat-undangan');
        $response->assertOk();

        // 1. Contrast fix button & logic
        $response->assertSee('kdContrastFix', false)
            ->assertSee('Perbaiki Kontras Otomatis', false)
            ->assertSee('fixKustomContrast', false)
            ->assertSee('kdContrastNote', false);

        // 2. Contact Person 1 & 2 separated fields
        $response->assertSee('contactPhone1Wrap', false)
            ->assertSee('cp_phone_1', false)
            ->assertSee('contactPhone2Wrap', false)
            ->assertSee('cp_phone_2', false);

        // 3. Bank 1 and Bank 2 elements
        $response->assertSee('bankTitle1', false)
            ->assertSee('bankHolderLabel1', false)
            ->assertSee('bankHolderInput1', false)
            ->assertSee('bankTitle2', false)
            ->assertSee('bankHolderLabel2', false)
            ->assertSee('bankHolderInput2', false);

        // 4. Global Button Animations & Gambar 5 Dock animations in styles
        $response->assertSee('btnShine', false)
            ->assertSee('bounceContrast', false);
    }

    /**
     * Test: Keterangan paket/tier-note (misal: "Peluncuran Produk • Denim Blue BESPOKE STUDIO • UNLIMITED VIP")
     * disembunyikan untuk undangan yang sudah dibeli atau bukan demo,
     * dan animasi parallax dimaksimalkan untuk paket eksklusif dan kustom.
     */
    public function test_topbar_tier_note_hidden_on_purchased_or_non_demo_and_parallax_maximized(): void
    {
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        DB::purge('sqlite');
        DB::reconnect('sqlite');

        // 1. Undangan real / bukan demo (/undangan/{slug}) yang sudah dibeli & published
        $couple = Couple::firstOrCreate(
            ['slug' => 'launching-produk-resmi'],
            [
                'theme' => 'launching-denim-blue',
                'category' => 'Acara Formal',
                'sub_category' => 'Peluncuran Produk',
                'package_name' => 'Paket Kustom - Rp280.000',
                'groom_name' => 'PT D\'Karsa Solusi',
                'groom_fullname' => 'PT D\'Karsa Solusi Digital',
                'bride_name' => 'Produk Digital',
                'bride_fullname' => 'Produk Inovasi Digital',
                'customer_name' => 'Admin D\'Karsa',
                'customer_phone' => '081234567890',
                'wedding_date' => now()->addMonth(),
                'status' => 'published',
                'payment_status' => 'paid',
            ]
        );

        $response = $this->get('/undangan/launching-produk-resmi');
        $response->assertOk();

        // Topbar eyebrow tetap tampil dengan elegan
        $response->assertSee('UNDANGAN ACARA FORMAL', false);

        // Keterangan jualan / template note / customizer dock HARUS disembunyikan
        $response->assertDontSee('BESPOKE STUDIO', false);
        $response->assertDontSee('id="tier-note"', false);
        $response->assertDontSee('id="top-customizer-dock"', false);

        // 2. Parallax 5-plane elements aktif untuk Eksklusif & Kustom
        $response->assertSee('id="parallax-plane-0-bg"', false)
            ->assertSee('id="parallax-plane-1-midground"', false)
            ->assertSee('id="parallax-plane-3-foreground"', false)
            ->assertSee('id="parallax-plane-4-lens"', false)
            ->assertSee('id="parallax-plane-5-bespoke"', false);

        // 3. Pada demo katalog non-purchased (/demo/launching-denim-blue), dock & info tier tampil untuk kebutuhan jualan
        $demoResponse = $this->get('/demo/launching-denim-blue');
        $demoResponse->assertOk()
            ->assertSee('id="tier-note"', false)
            ->assertSee('id="top-customizer-dock"', false);
    }

    /**
     * Test: Container kartu QR (guest pass) menggunakan warna kartu (--surface-container) bukan latar halaman.
     */
    public function test_guest_qr_container_uses_card_surface(): void
    {
        $path = $this->previewPath([
            'preview' => '1',
            'tier' => 'kustom',
            'category' => 'Acara Formal',
            '_key' => 'grandopening-cherry-blossom',
            'cBg' => '#1E90FF',
            'cCard' => '#801D1D',
        ]);

        $response = $this->get($path);
        $response->assertOk();

        // Kartu tiket QR menggunakan --surface-container
        $response->assertSee('background: var(--surface-container, var(--surface))', false);
    }
}
