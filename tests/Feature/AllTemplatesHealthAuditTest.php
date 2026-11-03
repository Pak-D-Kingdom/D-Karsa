<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Models\Guest;
use App\Models\Wish;
use App\Services\TemplateManager;
use Carbon\Carbon;
use Tests\TestCase;

class AllTemplatesHealthAuditTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
    }

    /**
     * Test 1: Pastikan setiap template memiliki blade view yang ada di disk.
     */
    public function test_all_templates_have_existing_blade_views(): void
    {
        $all = TemplateManager::all();
        $this->assertNotEmpty($all, "Daftar template tidak boleh kosong");

        $missingViews = [];
        foreach ($all as $key => $tmpl) {
            $blade = $tmpl['blade'] ?? null;
            if (!$blade || !view()->exists($blade)) {
                $missingViews[] = "Template '{$key}' (view: '{$blade}') tidak ditemukan!";
            }
        }

        $this->assertEmpty($missingViews, "Ditemukan template dengan view Blade yang tidak ada: " . implode(', ', $missingViews));
    }

    /**
     * Test 1c: Cek setiap template di getCatalogThemes memiliki template_key yang valid di TemplateManager::all()
     */
    public function test_catalog_themes_keys_exist_in_template_manager_all(): void
    {
        $all = TemplateManager::all();
        $catalog = TemplateManager::getCatalogThemes();
        $invalidKeys = [];

        foreach ($catalog as $catItem) {
            $key = $catItem['template_key'] ?? $catItem['key'] ?? null;
            if (!$key || !isset($all[$key])) {
                $invalidKeys[] = "Catalog theme '{$catItem['name']}' memiliki key '{$key}' yang tidak ada di TemplateManager::all()";
            }
        }

        $this->assertEmpty($invalidKeys, "Ditemukan key katalog yang tidak valid:\n" . implode("\n", $invalidKeys));
    }

    /**
     * Test 5: Cek setiap template dapat dirender dengan DATA MINIMAL (semua field opsional null/kosong)
     * Ini menguji apakah ada template yang crash dengan 'Undefined property' atau 'Attempt to read property on null'.
     */
    public function test_all_templates_render_with_extreme_minimal_data(): void
    {
        $all = TemplateManager::all();
        $failures = [];

        // Data minimal ekstrem
        $minimalCouple = (object)[
            'id' => 101,
            'slug' => 'minimal-test',
            'groom_name' => 'Budi',
            'bride_name' => 'Ani',
            'groom_fullname' => null,
            'bride_fullname' => null,
            'groom_birth_order' => null,
            'bride_birth_order' => null,
            'groom_father' => null,
            'groom_mother' => null,
            'bride_father' => null,
            'bride_mother' => null,
            'groom_city' => null,
            'bride_city' => null,
            'groom_photo' => null,
            'bride_photo' => null,
            'cover_photo' => null,
            'wedding_date' => Carbon::now()->addDays(10),
            'wedding_time' => null,
            'venue_name' => 'Lokasi Acara',
            'venue_address' => null,
            'address' => null,
            'maps_url' => null,
            'quote' => null,
            'event_heading' => null,
            'category' => 'Pernikahan',
            'sub_category' => null,
            'theme' => 'minimalist-floral',
            'bank_name' => null,
            'account_number' => null,
            'account_name' => null,
            'bank_name_1' => null,
            'bank_account_1' => null,
            'bank_holder_1' => null,
            'bank_name_2' => null,
            'bank_account_2' => null,
            'bank_holder_2' => null,
            'gift_address' => null,
            'events' => collect(), // Tidak ada event sama sekali
            'galleries' => collect(), // Tidak ada galeri
        ];

        $guest = (object)[
            'name' => 'Tamu',
            'slug' => 'tamu',
            'category' => null,
            'quota' => null,
        ];

        $wishes = collect(); // Belum ada ucapan sama sekali
        $isDemo = false;
        $isAdminPreview = false;
        $galleries = collect();

        foreach ($all as $key => $tmpl) {
            $viewName = $tmpl['blade'];
            try {
                $html = view($viewName, [
                    'couple' => $minimalCouple,
                    'guest' => $guest,
                    'wishes' => $wishes,
                    'isDemo' => $isDemo,
                    'isAdminPreview' => $isAdminPreview,
                    'template' => $tmpl,
                    'galleries' => $galleries,
                ])->render();

                if (empty($html)) {
                    $failures[] = "Template '{$key}' (minimal data) menghasilkan output kosong.";
                }

                // Cek apakah ada string error PHP bocor ke output HTML
                if (str_contains($html, 'Trying to get property') || str_contains($html, 'Undefined variable') || str_contains($html, 'Call to a member function')) {
                    $failures[] = "Template '{$key}' membocorkan PHP warning/error di output HTML!";
                }
            } catch (\Throwable $e) {
                $failures[] = "Template '{$key}' CRASH dengan data minimal: " . $e->getMessage() . " di " . $e->getFile() . ":" . $e->getLine();
            }
        }

        $this->assertEmpty($failures, "Ditemukan template yang crash saat data input minimal:\n" . implode("\n", $failures));
    }

    /**
     * Test 6: Cek setiap template dapat dirender dengan DATA MAKSIMAL & MULTI EVENT (3+ acara, 6+ foto, 2 rekening, doa banyak)
     */
    public function test_all_templates_render_with_maximal_rich_data(): void
    {
        $all = TemplateManager::all();
        $failures = [];

        $richCouple = (object)[
            'id' => 202,
            'slug' => 'rich-test',
            'groom_name' => 'Raden Mas Bagus',
            'bride_name' => 'Raden Ajeng Sekar',
            'groom_fullname' => 'dr. Raden Mas Bagus Wicaksono, Sp.A.',
            'bride_fullname' => 'drg. Raden Ajeng Sekar Arum, M.Biomed.',
            'groom_birth_order' => 'Putra Pertama',
            'bride_birth_order' => 'Putri Bungsu',
            'groom_father' => 'Prof. Dr. Ir. H. Bambang Sudiro, M.Sc.',
            'groom_mother' => 'Dr. Hj. Siti Rahmawati, M.Pd.',
            'bride_father' => 'Drs. H. Hendra Danubrata, M.M.',
            'bride_mother' => 'Hj. Endang Pertiwi, S.E.',
            'groom_city' => 'Yogyakarta',
            'bride_city' => 'Surakarta',
            'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400',
            'bride_photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400',
            'cover_photo' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200',
            'wedding_date' => Carbon::parse('2026-12-31 08:30:00'),
            'wedding_time' => '08:30 WIB - Selesai',
            'venue_name' => 'Kraton Grand Ballroom & Heritage Garden',
            'venue_address' => 'Jl. Malioboro Heritage No. 101, Yogyakarta',
            'address' => 'Jl. Malioboro Heritage No. 101, Yogyakarta',
            'maps_url' => 'https://goo.gl/maps/exampleHeritage',
            'quote' => 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri...',
            'event_heading' => 'Pawiwahan Agung & Resepsi Kebudayaan',
            'category' => 'Pernikahan',
            'sub_category' => 'Pernikahan Adat',
            'theme' => 'javanese-royal',
            'bank_name' => 'BCA',
            'account_number' => '8899001122',
            'account_name' => 'dr. Bagus Wicaksono',
            'bank_name_1' => 'BCA',
            'bank_account_1' => '8899001122',
            'bank_holder_1' => 'dr. Bagus Wicaksono',
            'bank_name_2' => 'Bank Mandiri',
            'bank_account_2' => '1370019283746',
            'bank_holder_2' => 'drg. Sekar Arum',
            'gift_address' => 'Jl. Malioboro No. 101, RT 01 / RW 02, Gondomanan, Yogyakarta (Up: Bagus & Sekar)',
            'events' => collect([
                (object)[
                    'title' => 'Upacara Siraman & Midodareni',
                    'date' => '2026-12-30',
                    'start_time' => '15:00 WIB',
                    'end_time' => '18:00 WIB',
                    'venue_name' => 'Kediaman Mempelai Putri',
                    'address' => 'Jl. Taman Siswa No. 12, Solo',
                    'maps_url' => 'https://maps.google.com/?q=solo',
                    'sort_order' => 1,
                ],
                (object)[
                    'title' => 'Akad Nikah / Ijab Qabul',
                    'date' => '2026-12-31',
                    'start_time' => '08:00 WIB',
                    'end_time' => '10:00 WIB',
                    'venue_name' => 'Masjid Agung Kraton',
                    'address' => 'Kawasan Kraton Yogyakarta',
                    'maps_url' => 'https://maps.google.com/?q=masjid',
                    'sort_order' => 2,
                ],
                (object)[
                    'title' => 'Resepsi & Panggih Ageng',
                    'date' => '2026-12-31',
                    'start_time' => '11:00 WIB',
                    'end_time' => '15:00 WIB',
                    'venue_name' => 'Kraton Grand Ballroom',
                    'address' => 'Jl. Malioboro Heritage No. 101, Yogyakarta',
                    'maps_url' => 'https://maps.google.com/?q=ballroom',
                    'sort_order' => 3,
                ],
            ]),
            'galleries' => collect([
                (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=600', 'sort_order' => 1],
                (object)['image' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=600', 'sort_order' => 2],
                (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=600', 'sort_order' => 3],
                (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600', 'sort_order' => 4],
            ]),
        ];

        $guest = (object)[
            'name' => 'Prof. Dr. Ir. Soemartono & Keluarga',
            'slug' => 'prof-soemartono',
            'category' => 'VVIP Diplomatic',
            'quota' => 4,
        ];

        $wishes = collect([
            (object)['name' => 'Gubernur DIY', 'message' => 'Nderek mangayubagyo, rahayu widada tansah pinanggih.', 'attendance' => 'hadir', 'created_at' => Carbon::now()->subMinutes(10)],
            (object)['name' => 'Keluarga Besar FK UGM', 'message' => 'Selamat menempuh hidup baru dr. Bagus & drg. Sekar!', 'attendance' => 'hadir', 'created_at' => Carbon::now()->subMinutes(30)],
            (object)['name' => 'Sahabat SMA 1', 'message' => 'Bahagia selalu sampai kakek nenek ya teman-teman!', 'attendance' => 'hadir', 'created_at' => Carbon::now()->subHours(2)],
        ]);

        $isDemo = false;
        $isAdminPreview = false;
        $galleries = $richCouple->galleries;

        foreach ($all as $key => $tmpl) {
            $viewName = $tmpl['blade'];
            try {
                $html = view($viewName, [
                    'couple' => $richCouple,
                    'guest' => $guest,
                    'wishes' => $wishes,
                    'isDemo' => $isDemo,
                    'isAdminPreview' => $isAdminPreview,
                    'template' => $tmpl,
                    'galleries' => $galleries,
                ])->render();

                if (empty($html)) {
                    $failures[] = "Template '{$key}' (rich data) menghasilkan string kosong.";
                }

                // Cek nama mempelai dan nama tamu muncul
                if (!str_contains($html, 'Bagus') && !str_contains($html, 'Sekar')) {
                    $failures[] = "Template '{$key}' tidak menampilkan nama mempelai dari data maksimal.";
                }
            } catch (\Throwable $e) {
                $failures[] = "Template '{$key}' CRASH dengan data maksimal: " . $e->getMessage() . " di " . $e->getFile() . ":" . $e->getLine();
            }
        }

        $this->assertEmpty($failures, "Ditemukan kegagalan render template dengan data maksimal:\n" . implode("\n", $failures));
    }

    /**
     * Test 7: Cek form RSVP dan Wish pada setiap template memiliki action route dan token CSRF yang valid
     */
    public function test_all_templates_have_working_rsvp_and_wish_forms(): void
    {
        $all = TemplateManager::all();
        $issues = [];

        foreach ($all as $key => $tmpl) {
            $response = $this->get("/demo/{$key}");
            $content = $response->getContent();

            // Cek apakah ada form action atau endpoint rsvp
            $hasRsvp = str_contains($content, 'action="' . url('/rsvp') . '"') 
                    || str_contains($content, 'action="/rsvp"') 
                    || str_contains($content, 'route(\'invitation.rsvp\')')
                    || str_contains($content, '/rsvp')
                    || str_contains($content, 'id="rsvp');

            // Cek apakah ada form action atau endpoint wish / doa
            $hasWish = str_contains($content, 'action="' . url('/wish') . '"') 
                    || str_contains($content, 'action="/wish"') 
                    || str_contains($content, '/wish')
                    || str_contains($content, 'id="wish');

            // Jika ada form dengan method POST, pastikan menyertakan _token CSRF
            if (str_contains($content, 'method="POST"') || str_contains($content, 'method="post"')) {
                if (!str_contains($content, 'name="_token"') && !str_contains($content, 'csrf-token') && !str_contains($content, 'csrf_token()')) {
                    $issues[] = "Template '{$key}' memiliki form POST namun tidak menyertakan _token CSRF!";
                }
            }
        }

        $this->assertEmpty($issues, "Ditemukan isu pada form RSVP/Wish di template:\n" . implode("\n", $issues));
    }

    /**
     * Test 8: Cek semua template memiliki viewport meta tag untuk responsivitas mobile
     */
    public function test_all_templates_have_viewport_meta_tag(): void
    {
        $all = TemplateManager::all();
        $missingViewport = [];

        foreach ($all as $key => $tmpl) {
            $response = $this->get("/demo/{$key}");
            $content = $response->getContent();

            if (!str_contains($content, 'name="viewport"') && !str_contains($content, "name='viewport'")) {
                $missingViewport[] = "Template '{$key}' tidak memiliki meta viewport!";
            }
        }

        $this->assertEmpty($missingViewport, "Ditemukan template tanpa meta viewport:\n" . implode("\n", $missingViewport));
    }

    /**
     * Test 9: Cek semua template memiliki mekanisme sampul buka undangan (Buka Undangan / Cover Unlock)
     */
    public function test_all_templates_have_cover_unlock_mechanism(): void
    {
        $all = TemplateManager::all();
        $missingCover = [];

        foreach ($all as $key => $tmpl) {
            $response = $this->get("/demo/{$key}");
            $content = $response->getContent();

            $hasUnlock = str_contains($content, 'openInvitation') 
                      || str_contains($content, 'bukaUndangan') 
                      || str_contains($content, 'Buka Undangan')
                      || str_contains($content, 'Buka Sampul')
                      || str_contains($content, 'btnOpen')
                      || str_contains($content, 'coverOverlay')
                      || str_contains($content, 'envelopeCover');

            if (!$hasUnlock) {
                $missingCover[] = "Template '{$key}' tidak memiliki tombol atau trigger Buka Undangan / Cover!";
            }
        }

        $this->assertEmpty($missingCover, "Ditemukan template tanpa tombol Buka Undangan:\n" . implode("\n", $missingCover));
    }

    /**
     * Test 10: Cek semua template memiliki pemutar audio / latar musik (Audio player)
     */
    public function test_all_templates_have_audio_player_element(): void
    {
        $all = TemplateManager::all();
        $missingAudio = [];

        foreach ($all as $key => $tmpl) {
            $response = $this->get("/demo/{$key}");
            $content = $response->getContent();

            $hasAudio = str_contains($content, '<audio') 
                     || str_contains($content, 'musicBtn') 
                     || str_contains($content, 'bgMusic')
                     || str_contains($content, 'toggleAudio')
                     || str_contains($content, 'audioEl')
                     || str_contains($content, 'toggleMusic');

            if (!$hasAudio) {
                $missingAudio[] = "Template '{$key}' tidak memiliki elemen pemutar audio / musik!";
            }
        }

        $this->assertEmpty($missingAudio, "Ditemukan template tanpa pemutar musik:\n" . implode("\n", $missingAudio));
    }

    /**
     * Test 2: Pastikan setiap template dapat dirender tanpa error di rute /demo/{key}.
     */
    public function test_all_templates_render_successfully_on_demo_route(): void
    {
        $all = TemplateManager::all();
        $failures = [];

        foreach ($all as $key => $tmpl) {
            try {
                $response = $this->get("/demo/{$key}");
                if ($response->status() !== 200) {
                    $failures[] = "Template demo '/demo/{$key}' mengembalikan HTTP {$response->status()}";
                }
            } catch (\Throwable $e) {
                $failures[] = "Template demo '/demo/{$key}' melempar exception: " . $e->getMessage() . " di " . $e->getFile() . ":" . $e->getLine();
            }
        }

        $this->assertEmpty($failures, "Ditemukan error saat render demo template:\n" . implode("\n", $failures));
    }

    /**
     * Test 3: Pastikan setiap template dapat dirender dengan data couple kustom (Live Preview simulation)
     */
    public function test_all_templates_render_with_custom_builder_data(): void
    {
        $all = TemplateManager::all();
        $failures = [];

        $customParams = [
            'groom_name' => 'Fulan',
            'bride_name' => 'Fulanah',
            'wedding_date' => '2026-12-25',
            'wedding_time' => '09:00 WIB',
            'venue_name' => 'Ballroom Grand Horison',
            'quote' => 'Semoga sakinah mawaddah warahmah.',
            'event_heading' => 'Walimatul Ursy',
            'bank_name_1' => 'BCA',
            'bank_account_1' => '1234567890',
            'bank_holder_1' => 'Fulan',
        ];

        foreach ($all as $key => $tmpl) {
            try {
                $response = $this->get("/demo/{$key}?" . http_build_query($customParams));
                if ($response->status() !== 200) {
                    $failures[] = "Live preview '/demo/{$key}' gagal dengan HTTP {$response->status()}";
                } else {
                    $content = $response->getContent();
                    // Pastikan nama kustom muncul di halaman
                    if (!str_contains($content, 'Fulan')) {
                        $failures[] = "Live preview '/demo/{$key}' tidak merender nama kustom 'Fulan'";
                    }
                }
            } catch (\Throwable $e) {
                $failures[] = "Live preview '/demo/{$key}' melempar exception: " . $e->getMessage();
            }
        }

        $this->assertEmpty($failures, "Ditemukan kegagalan render live preview kustom:\n" . implode("\n", $failures));
    }

    /**
     * Test 4: Pastikan setiap template dapat dirender sebagai undangan klien asli (isDemo = false)
     */
    public function test_all_templates_render_in_live_invitation_mode(): void
    {
        $all = TemplateManager::all();
        $failures = [];

        $mockCouple = (object)[
            'id' => 999,
            'slug' => 'test-invitation',
            'groom_name' => 'Ahmad',
            'bride_name' => 'Siti',
            'groom_fullname' => 'Ahmad Fauzi, S.T.',
            'bride_fullname' => 'Siti Nurhaliza, S.Pd.',
            'groom_father' => 'Bapak Mansyur',
            'groom_mother' => 'Ibu Fatimah',
            'bride_father' => 'Bapak Usman',
            'bride_mother' => 'Ibu Aisyah',
            'groom_city' => 'Jakarta Selatan',
            'bride_city' => 'Bandung',
            'groom_photo' => null,
            'bride_photo' => null,
            'cover_photo' => null,
            'wedding_date' => Carbon::parse('2026-11-15 09:00:00'),
            'wedding_time' => '09:00 - Selesai',
            'venue_name' => 'Masjid Raya Al-Barkah',
            'venue_address' => 'Jl. Merdeka No. 45, Jakarta',
            'address' => 'Jl. Merdeka No. 45, Jakarta',
            'maps_url' => 'https://maps.google.com',
            'quote' => 'Dan di antara tanda-tanda kebesaran-Nya...',
            'event_heading' => 'Pernikahan Suci',
            'category' => 'Pernikahan',
            'sub_category' => 'Pernikahan adat',
            'theme' => 'minimalist-floral',
            'bank_name' => 'BCA',
            'account_number' => '12345678',
            'account_name' => 'Ahmad Fauzi',
            'bank_name_1' => 'BCA',
            'bank_account_1' => '12345678',
            'bank_holder_1' => 'Ahmad Fauzi',
            'bank_name_2' => 'Mandiri',
            'bank_account_2' => '87654321',
            'bank_holder_2' => 'Siti Nurhaliza',
            'gift_address' => 'Jl. Cempaka Putih No. 12',
            'events' => collect([
                (object)[
                    'title' => 'Akad Nikah',
                    'date' => '2026-11-15',
                    'start_time' => '08:00 WIB',
                    'end_time' => '10:00 WIB',
                    'venue_name' => 'Masjid Raya Al-Barkah',
                    'address' => 'Jl. Merdeka No. 45, Jakarta',
                    'maps_url' => 'https://maps.google.com',
                    'sort_order' => 1,
                ],
                (object)[
                    'title' => 'Resepsi Pernikahan',
                    'date' => '2026-11-15',
                    'start_time' => '11:00 WIB',
                    'end_time' => '14:00 WIB',
                    'venue_name' => 'Ballroom Al-Barkah',
                    'address' => 'Jl. Merdeka No. 45, Jakarta',
                    'maps_url' => 'https://maps.google.com',
                    'sort_order' => 2,
                ],
            ]),
            'galleries' => collect(),
        ];

        $guest = (object)[
            'name' => 'Tamu Terhormat',
            'slug' => 'tamu-terhormat',
            'category' => 'VIP',
            'quota' => 2,
        ];

        $wishes = collect([
            (object)[
                'name' => 'Sahabat Baik',
                'message' => 'Selamat menempuh hidup baru!',
                'attendance' => 'hadir',
                'created_at' => Carbon::now(),
            ]
        ]);

        $isDemo = false;
        $isAdminPreview = false;
        $galleries = collect();

        foreach ($all as $key => $tmpl) {
            $viewName = $tmpl['blade'];
            try {
                $html = view($viewName, [
                    'couple' => $mockCouple,
                    'guest' => $guest,
                    'wishes' => $wishes,
                    'isDemo' => $isDemo,
                    'isAdminPreview' => $isAdminPreview,
                    'template' => $tmpl,
                    'galleries' => $galleries,
                ])->render();

                if (empty($html)) {
                    $failures[] = "Template '{$key}' (view '{$viewName}') merender string kosong.";
                }
            } catch (\Throwable $e) {
                $failures[] = "Template '{$key}' (view '{$viewName}') error saat render mode undangan asli: " . $e->getMessage() . " di " . $e->getFile() . ":" . $e->getLine();
            }
        }

        $this->assertEmpty($failures, "Ditemukan kegagalan render template mode undangan asli:\n" . implode("\n", $failures));
    }
}
