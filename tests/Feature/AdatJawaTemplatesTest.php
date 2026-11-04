<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Services\TemplateManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdatJawaTemplatesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Slot 01–10 dari master registry, urut sesuai batch Adat Jawa.
     *
     * @return array<int, array{0: string, 1: string, 2: string}>
     */
    public static function adatJawaProvider(): array
    {
        return [
            ['jawa-keraton-agung', 'Keraton Agung', 'Ocean Blue'],
            ['jawa-sekar-kedhaton', 'Sekar Kedhaton', 'Clean White'],
            ['jawa-gunungan-emas', 'Gunungan Emas', 'Dusty Rose'],
            ['jawa-batik-parang', 'Batik Parang', 'Sage Green'],
            ['jawa-gebyok-ukir', 'Gebyok Ukir', 'Rose Gold'],
            ['jawa-melati-kraton', 'Melati Kraton', 'Blueberry Milk'],
            ['jawa-sogan-klasik', 'Sogan Klasik', 'Yellow Sunshine'],
            ['jawa-wijaya-kusuma', 'Wijaya Kusuma', 'Plum Velvet'],
            ['jawa-sekar-jagad', 'Sekar Jagad', 'Monochrome'],
            ['jawa-prada-ayu', 'Prada Ayu', 'Coral & Peach'],
            ['jawa-arctic-frost', 'Arctic Frost', 'Arctic Frost'],
            ['jawa-purple-dream', 'Purple Dream', 'Purple Dream'],
            ['jawa-burgundy-wine', 'Burgundy Wine', 'Burgundy Wine'],
            ['jawa-ruby-luxe', 'Ruby Luxe', 'Ruby Luxe'],
            ['jawa-pastel-mix', 'Pastel Mix', 'Pastel Mix'],
            ['jawa-citrus-pop', 'Citrus Pop', 'Citrus Pop'],
            ['jawa-soft-pink', 'Soft Pink', 'Soft Pink'],
            ['jawa-midnight-navy', 'Midnight Navy', 'Midnight Navy'],
            ['sunda-mega-mendung', 'Mega Mendung', 'Sage Green'],
            ['sunda-siger-wangi', 'Siger Wangi', 'Rose Gold'],
            ['sunda-parahyangan', 'Parahyangan', 'Blueberry Milk'],
            ['sunda-kembang-peuteuy', 'Kembang Peuteuy', 'Yellow Sunshine'],
            ['sunda-ratu-sunda', 'Ratu Sunda', 'Plum Velvet'],
            ['sunda-angklung-kasih', 'Angklung Kasih', 'Monochrome'],
            ['sunda-priangan-lembut', 'Priangan Lembut', 'Coral & Peach'],
            ['sunda-sangkuriang', 'Sangkuriang', 'Arctic Frost'],
            ['sunda-dayang-sumbi', 'Dayang Sumbi', 'Purple Dream'],
            ['sunda-citarum-ayu', 'Citarum Ayu', 'Burgundy Wine'],
            ['sunda-bunga-kantil', 'Bunga Kantil', 'Ruby Luxe'],
            ['sunda-cireundeu-asih', 'Cireundeu Asih', 'Pastel Mix'],
            ['minang-rumah-gadang', 'Rumah Gadang', 'Burgundy Wine'],
            ['minang-gonjong-amah', 'Gonjong Amah', 'Ruby Luxe'],
            ['minang-suntiang-permata', 'Suntiang Permata', 'Pastel Mix'],
            ['minang-songket-padang', 'Songket Padang', 'Citrus Pop'],
            ['minang-ranah-minang', 'Ranah Minang', 'Soft Pink'],
            ['minang-bundo-kanduang', 'Bundo Kanduang', 'Midnight Navy'],
            ['minang-siti-nurbaya', 'Siti Nurbaya', 'Cyber Neon'],
            ['minang-singgalang', 'Singgalang', 'Bold Red'],
            ['minang-marawa-pusako', 'Marawa Pusako', 'Mint Fresh'],
            ['minang-anak-daro', 'Anak Daro', 'Ocean Blue'],
            ['nusantara-tenun-ikat', 'Tenun Ikat', 'Dusty Rose'],
            ['nusantara-ulos-hela', 'Ulos Hela', 'Sage Green'],
            ['nusantara-nusantara-raya', 'Nusantara Raya', 'Rose Gold'],
            ['nusantara-wastra-timur', 'Wastra Timur', 'Blueberry Milk'],
            ['nusantara-toraja-tallu', 'Toraja Tallu', 'Yellow Sunshine'],
            ['nusantara-dayak-ranying', 'Dayak Ranying', 'Plum Velvet'],
            ['nusantara-bunga-cengkeh', 'Bunga Cengkeh', 'Monochrome'],
            ['nusantara-sabu-raijua', 'Sabu Raijua', 'Coral & Peach'],
            ['minimalis-aria', 'Aria', 'Citrus Pop'],
            ['minimalis-bening', 'Bening', 'Soft Pink'],
            ['minimalis-nadi', 'Nadi', 'Midnight Navy'],
            ['minimalis-ruang', 'Ruang', 'Cyber Neon'],
            ['minimalis-kanvas', 'Kanvas', 'Bold Red'],
            ['minimalis-selaras', 'Selaras', 'Mint Fresh'],
            ['minimalis-lumen', 'Lumen', 'Ocean Blue'],
            ['minimalis-sudut', 'Sudut', 'Clean White'],
            ['minimalis-grafik', 'Grafik', 'Dusty Rose'],
            ['minimalis-sunyi', 'Sunyi', 'Sage Green'],
            ['minimalis-kaca', 'Kaca', 'Rose Gold'],
            ['minimalis-aksara', 'Aksara', 'Blueberry Milk'],
            ['minimalis-monoline', 'Monoline', 'Yellow Sunshine'],
            ['minimalis-rona', 'Rona', 'Plum Velvet'],
            ['floral-rosalind', 'Rosalind', 'Clean White'],
            ['floral-peony-putih', 'Peony Putih', 'Dusty Rose'],
            ['floral-taman-ayu', 'Taman Ayu', 'Sage Green'],
            ['floral-anggrek-bulan', 'Anggrek Bulan', 'Rose Gold'],
            ['floral-bunga-kertas', 'Bunga Kertas', 'Blueberry Milk'],
            ['floral-magnolia', 'Magnolia', 'Yellow Sunshine'],
            ['floral-lavender-fields', 'Lavender Fields', 'Plum Velvet'],
            ['floral-sakura-lembut', 'Sakura Lembut', 'Monochrome'],
            ['floral-daisy-pagi', 'Daisy Pagi', 'Coral & Peach'],
            ['floral-rosewood', 'Rosewood', 'Arctic Frost'],
            ['islami-ar-rum-21', 'Ar-Rum 21', 'Burgundy Wine'],
            ['islami-nurul-iman', 'Nurul Iman', 'Ruby Luxe'],
            ['islami-baarakallahu', 'Baarakallahu', 'Pastel Mix'],
            ['islami-misykah', 'Misykah', 'Citrus Pop'],
            ['islami-mihrab-cinta', 'Mihrab Cinta', 'Soft Pink'],
            ['islami-salam-khusyuk', 'Salam Khusyuk', 'Midnight Navy'],
            ['islami-zahra-and-ahmad', 'Zahra & Ahmad', 'Cyber Neon'],
            ['islami-barokah-jannah', 'Barokah Jannah', 'Bold Red'],
            ['akad-dua-janji', 'Dua Janji', 'Rose Gold'],
            ['akad-sakral-and-syahdu', 'Sakral & Syahdu', 'Blueberry Milk'],
            ['akad-satu-hari-dua-acara', 'Satu Hari Dua Acara', 'Yellow Sunshine'],
            ['akad-khitbah', 'Khitbah', 'Plum Velvet'],
            ['akad-akad-and-resepsi', 'Akad & Resepsi', 'Monochrome'],
            ['internasional-maison', 'Maison', 'Earth Tone'],
            ['internasional-editorial-vows', 'Editorial Vows', 'Lavender Haze'],
            ['internasional-nusantara-fusion', 'Nusantara Fusion', 'Chocolate Luxe'],
            ['internasional-the-grand-affair', 'The Grand Affair', 'Orange Energy'],
            ['internasional-bilingual-bliss', 'Bilingual Bliss', 'Cherry Blossom'],
        ];
    }

    public function test_all_ten_adat_jawa_templates_are_registered(): void
    {
        $all = TemplateManager::all();

        foreach (self::adatJawaProvider() as [$key, $name, $palette]) {
            $this->assertArrayHasKey($key, $all, "Template {$key} tidak terdaftar di TemplateManager::all()");
            $this->assertSame(TemplateManager::viewPath($key), $all[$key]['blade']);
            $this->assertSame('Pernikahan', $all[$key]['category']);
            $this->assertStringContainsString($name, $all[$key]['name']);
            $this->assertStringContainsString($palette, $all[$key]['name']);
            $this->assertSame('/demo/'.$key, $all[$key]['demo_route']);
        }
    }

    public function test_resolve_key_maps_names_palettes_and_exact_keys(): void
    {
        foreach (self::adatJawaProvider() as [$key, $name, $palette]) {
            $this->assertSame($key, TemplateManager::resolveKey($key), "Exact key {$key} gagal");
            $this->assertSame($key, TemplateManager::resolveKey($name), "Nama {$name} gagal");
            $culture = str_starts_with($key, 'sunda-') ? 'Adat Sunda — ' : (str_starts_with($key, 'minang-') ? 'Adat Minang — ' : (str_starts_with($key, 'nusantara-') ? 'Adat Nusantara — ' : (str_starts_with($key, 'minimalis-') ? 'Minimalis Modern — ' : (str_starts_with($key, 'floral-') ? 'Elegan & Floral — ' : (str_starts_with($key, 'islami-') ? 'Islami — ' : (str_starts_with($key, 'akad-') ? 'Akad & Resepsi — ' : (str_starts_with($key, 'internasional-') ? 'Internasional — ' : 'Adat Jawa — ')))))));
            $this->assertSame($key, TemplateManager::resolveKey($culture.$palette), "Palette {$palette} gagal");
        }

        // Template Jawa lama tetap tidak boleh tertarik ke suite baru.
        $this->assertSame('javanese-royal', TemplateManager::resolveKey('3D Javanese Royal Keraton'));
    }

    public function test_catalog_and_demo_data_cover_the_suite(): void
    {
        $catalogKeys = array_column(TemplateManager::getCatalogThemes(), 'key');

        foreach (self::adatJawaProvider() as [$key]) {
            $this->assertContains($key, $catalogKeys, "{$key} tidak muncul di katalog builder");

            $couple = TemplateManager::getDemoCouple($key);
            $this->assertSame('Arya', $couple->groom_name);
            $this->assertSame('Kinanthi', $couple->bride_name);
            $this->assertCount(2, $couple->events, "{$key} harus punya Akad & Resepsi terpisah");
            $this->assertGreaterThanOrEqual(4, $couple->galleries->count());
        }
    }

    public function test_each_demo_route_renders_the_full_invitation(): void
    {
        foreach (self::adatJawaProvider() as [$key, $name, $palette]) {
            $response = $this->get('/demo/'.$key);

            $response->assertOk();
            $response->assertSee('BUKA UNDANGAN', false);
            $response->assertSee('Designed with Love by', false);
            $response->assertSee('gateDoorLeft', false);
            $response->assertSee('gateDoorRight', false);
            $response->assertSee('previewGalleryGrid', false);
            $response->assertSee('cdDays', false);
            $response->assertSee('KIRIM KONFIRMASI RSVP', false);
            $response->assertSee('Salin', false);
            // Kartu QR tamu + kartu ATM metalik wajib ada di semua kategori & tier.
            $response->assertSee('id="section-guest-qr"', false);
            $response->assertSee('id="section-digital-gift"', false);
            $response->assertDontSee('api.qrserver', false);
            $response->assertSee($name); // escaped: 'Zahra & Ahmad' -> 'Zahra &amp; Ahmad'
            $response->assertSee($palette); // escaped default: 'Coral & Peach' -> 'Coral &amp; Peach'
        }
    }

    public function test_tier_parameter_switches_the_rendered_tier(): void
    {
        foreach (['basic', 'premium', 'eksklusif', 'kustom'] as $tier) {
            $this->get('/demo/jawa-keraton-agung?tier='.$tier)
                ->assertOk()
                ->assertSee('data-tier="'.$tier.'"', false);

            // URL bersih per paket: /demo/{key}/{tier} — 179 template × 4 paket.
            $this->get('/demo/jawa-keraton-agung/'.$tier)
                ->assertOk()
                ->assertSee('data-tier="'.$tier.'"', false)
                ->assertSee('id="section-guest-qr"', false)
                ->assertSee('id="section-digital-gift"', false);
        }

        // Nilai di luar empat paket tidak boleh masuk ke atribut HTML.
        $this->get('/demo/jawa-keraton-agung?tier=../../etc')
            ->assertOk()
            ->assertSee('data-tier="eksklusif"', false);
    }

    public function test_published_couple_renders_with_an_adat_jawa_theme(): void
    {
        $couple = Couple::create([
            'slug' => 'adat-jawa-test',
            'groom_name' => 'Bagas',
            'groom_fullname' => 'Bagas Pratama',
            'bride_name' => 'Sekar',
            'bride_fullname' => 'Sekar Ayu',
            'theme' => 'Batik Parang (Sage Green)',
            'category' => 'Pernikahan',
            'sub_category' => 'Adat Jawa Geometris',
            'wedding_date' => '2026-11-14',
            'venue_name' => 'Pendopo Agung',
            'status' => 'published',
        ]);

        $response = $this->get('/undangan/'.$couple->slug);

        $response->assertOk();
        $response->assertSee('Bagas', false);
        $response->assertSee('Sekar', false);
        $response->assertSee('BUKA UNDANGAN', false);
        $response->assertSee('Batik Parang', false);
    }
}
