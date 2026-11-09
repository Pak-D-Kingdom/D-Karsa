<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Services\TemplateManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class CategoryTemplateFilterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Config::set('database.default', 'sqlite');
        Config::set('database.connections.sqlite.database', database_path('database.sqlite'));
    }

    /**
     * Test 1: Undangan Pernikahan hanya memfilter tema Pernikahan
     */
    public function test_pernikahan_category_only_returns_pernikahan_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Pernikahan');
        $this->assertNotEmpty($themes);

        foreach ($themes as $theme) {
            $this->assertTrue(
                TemplateManager::matchesCategory($theme, 'Pernikahan'),
                "Template {$theme['name']} harus cocok dengan kategori Pernikahan"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Ulang Tahun'),
                "Template Pernikahan {$theme['name']} tidak boleh bocor ke kategori Ulang Tahun"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Aqiqah', 'Aqiqah anak'),
                "Template Pernikahan {$theme['name']} tidak boleh bocor ke kategori Aqiqah"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Khitan'),
                "Template Pernikahan {$theme['name']} tidak boleh bocor ke kategori Khitan"
            );
        }

        // Pastikan tema pernikahan utama ada di sini
        $names = array_column($themes, 'name');
        $this->assertContains('Simple Minimalist Floral', $names);
        $this->assertContains('Wildflower Pink (Rose Romance)', $names);
        $this->assertContains('3D Javanese Royal Keraton', $names);
        $this->assertContains('Chibi Red Oriental', $names);
    }

    /**
     * Test 2: Undangan Ulang Tahun hanya memfilter tema Ulang Tahun
     */
    public function test_ulang_tahun_category_only_returns_birthday_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Ulang Tahun');
        $this->assertNotEmpty($themes);

        foreach ($themes as $theme) {
            $this->assertTrue(
                TemplateManager::matchesCategory($theme, 'Ulang Tahun'),
                "Template {$theme['name']} harus cocok dengan kategori Ulang Tahun"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Pernikahan'),
                "Template Ulang Tahun {$theme['name']} tidak boleh bocor ke kategori Pernikahan"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Wisuda'),
                "Template Ulang Tahun {$theme['name']} tidak boleh bocor ke kategori Wisuda"
            );
        }

        $names = array_column($themes, 'name');
        $this->assertContains('Cheerful Confetti Birthday', $names);
        $this->assertContains('Kids Birthday Party Balon Ceria', $names);
        $this->assertContains('Rustic Coral & Peach', $names);
        $this->assertContains('Golden Luxury Birthday / Milad', $names);
    }

    /**
     * Test 3: Undangan Aqiqah & Kelahiran hanya memfilter tema Aqiqah
     */
    public function test_aqiqah_category_only_returns_aqiqah_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Aqiqah', 'Aqiqah anak');
        $this->assertNotEmpty($themes);

        foreach ($themes as $theme) {
            $this->assertTrue(
                TemplateManager::matchesCategory($theme, 'Aqiqah', 'Aqiqah anak'),
                "Template {$theme['name']} harus cocok dengan kategori Aqiqah"
            );
            $this->assertFalse(
                TemplateManager::matchesCategory($theme, 'Pernikahan'),
                "Template Aqiqah {$theme['name']} tidak boleh bocor ke Pernikahan"
            );
        }

        $names = array_column($themes, 'name');
        $this->assertContains('Little Prince Nordic Aqiqah', $names);
        $this->assertContains('Sweet Baby Pastel Aqiqah & Khitan', $names);
        $this->assertContains('Royal Tasmiyah & Aqiqah Sultan', $names);
    }

    /**
     * Test 4: Undangan Khitan hanya memfilter tema Khitanan
     */
    public function test_khitan_category_only_returns_khitan_templates(): void
    {
        $themesDirect = TemplateManager::getThemesByCategory('Khitan');
        $themesSub = TemplateManager::getThemesByCategory('Aqiqah', 'Tasyakuran khitanan');

        $this->assertNotEmpty($themesDirect);
        $this->assertNotEmpty($themesSub);

        $namesDirect = array_column($themesDirect, 'name');
        $this->assertContains('Walimatul Khitan Sahaja Berkah', $namesDirect);
        $this->assertContains('Walimatul Khitan Berkah Sholeh', $namesDirect);

        // Tidak boleh memuat tema pernikahan atau ulang tahun
        $this->assertNotContains('Simple Minimalist Floral', $namesDirect);
        $this->assertNotContains('Cheerful Confetti Birthday', $namesDirect);
        $this->assertNotContains('Modern Graduate Editorial', $namesDirect);
    }

    /**
     * Test 5: Undangan Wisuda hanya memfilter tema Wisuda
     */
    public function test_wisuda_category_only_returns_graduation_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Wisuda');
        $this->assertNotEmpty($themes);

        $names = array_column($themes, 'name');
        $this->assertContains('Modern Graduate Editorial', $names);
        $this->assertContains('Wisuda Sarjana Prestasi Emas', $names);
        $this->assertContains('Valedictorian Scholar Luxury Gala', $names);

        $this->assertNotContains('Simple Minimalist Floral', $names);
        $this->assertNotContains('Walimatul Khitan Berkah Sholeh', $names);
    }

    /**
     * Test 6: Undangan Seminar hanya memfilter tema Seminar
     */
    public function test_seminar_category_only_returns_seminar_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Seminar');
        $this->assertNotEmpty($themes);

        $names = array_column($themes, 'name');
        $this->assertContains('Clean Tech Seminar & Workshop', $names);

        $this->assertNotContains('Simple Minimalist Floral', $names);
        $this->assertNotContains('Cheerful Confetti Birthday', $names);
    }

    /**
     * Test 7: Undangan Acara Formal hanya memfilter tema Formal
     */
    public function test_acara_formal_category_only_returns_formal_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Acara Formal');
        $this->assertNotEmpty($themes);

        $names = array_column($themes, 'name');
        $this->assertContains('Clean Tech Seminar & Workshop', $names);
        $this->assertContains('Reuni Akbar Sapphire Silver', $names);
        $this->assertContains('Floral Midnight Navy', $names);
        $this->assertContains('Korporat Profesional & Grand Opening', $names);

        $this->assertNotContains('Simple Minimalist Floral', $names);
        $this->assertNotContains('Chibi Red Oriental', $names);
    }

    /**
     * Test 8: Undangan Keagamaan hanya memfilter tema Keagamaan
     */
    public function test_keagamaan_category_only_returns_religious_templates(): void
    {
        $themes = TemplateManager::getThemesByCategory('Keagamaan');
        $this->assertNotEmpty($themes);

        $names = array_column($themes, 'name');
        $this->assertContains('Ketupat Raya Silaturahmi & Halal Bihalal', $names);
        $this->assertContains('Tasyakuran & Doa Rumah Baru', $names);
        $this->assertContains('Doa Bersama & Tahlilan Khusyuk', $names);
        $this->assertContains('Green Mosque Syiar & Tabligh Akbar', $names);
        $this->assertContains('Walimatus Safar Haji & Umrah Mubarok', $names);

        $this->assertNotContains('Simple Minimalist Floral', $names);
        $this->assertNotContains('Cheerful Confetti Birthday', $names);
    }

    /**
     * Test 9: Halaman /buat-undangan menginisialisasi tema sesuai kategori yang diminta
     */
    public function test_builder_page_initializes_with_theme_matching_chosen_category(): void
    {
        // 1. Ulang Tahun -> tema default harus kategori ulang tahun
        $resUltah = $this->get('/buat-undangan?category=Ulang%20Tahun');
        $resUltah->assertStatus(200);
        $resUltah->assertSee('Cheerful Confetti Birthday');

        // 2. Wisuda -> tema default harus kategori wisuda
        $resWisuda = $this->get('/buat-undangan?category=Wisuda');
        $resWisuda->assertStatus(200);
        $resWisuda->assertSee('Modern Graduate Editorial');

        // 3. Khitan -> tema default harus kategori khitan
        $resKhitan = $this->get('/buat-undangan?category=khitanan');
        $resKhitan->assertStatus(200);
        $resKhitan->assertSee('Walimatul Khitan');

        // 4. Pernikahan -> tema default pernikahan
        $resNikah = $this->get('/buat-undangan?category=Pernikahan');
        $resNikah->assertStatus(200);
        $resNikah->assertSee('Simple Minimalist Floral');
    }

    /**
     * Test 10: Jika query theme tidak cocok dengan kategori, sistem otomatis menggunakan default kategori tersebut
     */
    public function test_builder_page_rejects_mismatched_theme_and_defaults_to_category_theme(): void
    {
        // User minta kategori Ulang Tahun, tapi parameter URL mengirim tema pernikahan
        $response = $this->get('/buat-undangan?category=Ulang%20Tahun&theme=Simple%20Minimalist%20Floral');
        $response->assertStatus(200);

        // Jangan izinkan tema pernikahan menjadi tema aktif di undangan Ulang Tahun
        $response->assertSee('Cheerful Confetti Birthday');
    }

    /**
     * Test 11: Modal Ganti Desain memuat badge kategori aktif dan kontrol filter pencarian
     */
    public function test_builder_template_modal_contains_active_category_badge_and_search_controls(): void
    {
        $response = $this->get('/buat-undangan?category=Pernikahan');
        $response->assertStatus(200);
        $response->assertSee('id="templateModal"', false);
        $response->assertSee('id="modalActiveCategoryBadge"', false);
        $response->assertSee('id="modalTemplateSearchInput"', false);
        $response->assertSee('id="modalEmptyState"', false);
        $response->assertSee('Kategori Aktif: Undangan Pernikahan');
    }

    /**
     * Test 12: Penyimpanan undangan berhasil dan kategori tetap konsisten dengan temanya
     */
    public function test_submitting_invitation_preserves_category_and_template(): void
    {
        $slug = 'test-ultah-filter-' . time();
        $payload = [
            'category' => 'Ulang Tahun',
            'sub_category' => 'Sweet seventeen',
            'selected_theme' => 'Cheerful Confetti Birthday',
            'selected_package' => 'Paket Basic - Rp50.000',
            'event_heading' => 'SWEET SEVENTEEN BIRTHDAY',
            'wedding_date' => '2026-11-20',
            'quote' => 'Perayaan ulang tahun penuh berkah',
            'slug' => $slug,
            'groom_name' => 'Clarissa Putri',
            'customer_name' => 'Bunda Clarissa',
            'customer_phone' => '081234567890',
        ];

        $response = $this->post('/buat-undangan', $payload);
        $response->assertRedirect();

        $saved = Couple::where('slug', $slug)->first();
        $this->assertNotNull($saved);
        $this->assertEquals('Ulang Tahun', $saved->category);
        $this->assertEquals('Sweet seventeen', $saved->sub_category);
        $this->assertEquals('Cheerful Confetti Birthday', $saved->theme);
    }
}
