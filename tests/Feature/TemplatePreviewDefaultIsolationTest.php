<?php

namespace Tests\Feature;

use Tests\TestCase;

class TemplatePreviewDefaultIsolationTest extends TestCase
{
    /**
     * Test Simple Minimalist Floral demo renders authentic default mock data
     */
    public function test_minimalist_floral_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/minimalist-floral');

        $response->assertStatus(200);
        $response->assertSee('Julian');
        $response->assertSee('Michelle');
        $response->assertSee('Bpk. Hendrawan &amp; Ibu Melati', false);
        $response->assertSee('Bpk. Tanoto &amp; Ibu Fenny', false);
        $response->assertSee('The Glass Pavillion, Surabaya');
    }

    /**
     * Test Minimalist Floral preview renders cleanly even when bride is absent (non-wedding or single host)
     */
    public function test_minimalist_floral_preview_without_bride(): void
    {
        $response = $this->get('/demo/minimalist-floral?category=Wisuda&bride_name=');

        $response->assertStatus(200);
        $response->assertSee('defaultBrideParents');
    }

    /**
     * Test Snowfall Minimalist White demo renders authentic default mock data
     */
    public function test_snowfall_white_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/snowfall-white');

        $response->assertStatus(200);
        $response->assertSee('Nicholas');
        $response->assertSee('Catherine');
        $response->assertSee('Bpk. Ir. Robert Wijaya &amp; Ibu Diana Kusuma', false);
    }

    /**
     * Test templates do not read localStorage directly to prevent stale cache contamination
     */
    public function test_template_blades_do_not_contain_unsolicited_localstorage_reads(): void
    {
        $minimalistContent = file_get_contents(resource_path('views/templates/minimalist-floral.blade.php'));
        $this->assertStringNotContainsString('applyLivePreviewData', $minimalistContent);
        $this->assertStringNotContainsString('localStorage.getItem(\'dkarsa_preview_', $minimalistContent);

        $snowfallContent = file_get_contents(resource_path('views/templates/snowfall-white.blade.php'));
        $this->assertStringNotContainsString('applyLivePreviewData', $snowfallContent);
        $this->assertStringNotContainsString('localStorage.getItem(\'dkarsa_preview_', $snowfallContent);
    }

    /**
     * Test Builder page provides reset default mechanisms and clean preview isolation
     */
    public function test_builder_page_provides_clean_preview_and_reset_defaults(): void
    {
        $response = $this->get('/buat-undangan');

        $response->assertStatus(200);
        $response->assertSee('resetFormToTemplateDefaults');
        $response->assertSee('isCleanDemoMode');
        $response->assertSee('btnUseTemplateFromPreview');
        $response->assertSee('previewSpecificTemplate');
    }

    /**
     * Test Cheerful Confetti Birthday renders playful party defaults
     */
    public function test_cheerful_birthday_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/cheerful-birthday');

        $response->assertStatus(200);
        $response->assertSee('Arkan');
        $response->assertSee('Muhammad Arkan Pratama');
        $response->assertSee('Ulang Tahun ke-7');
        $response->assertDontSee('Jessica Olivia');
        $response->assertDontSee('Amanda Putri');
    }

    /**
     * Test Golden Luxury Birthday renders dark gold VIP defaults
     */
    public function test_golden_birthday_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/golden-birthday');

        $response->assertStatus(200);
        $response->assertSee('Jessica Olivia');
        $response->assertSee('VIP Birthday Invitation');
        $response->assertDontSee('Muhammad Arkan Pratama');
    }

    /**
     * Test Modern Graduate Editorial renders academic graduation defaults
     */
    public function test_modern_graduate_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/modern-graduate');

        $response->assertStatus(200);
        $response->assertSee('Faris');
        $response->assertSee('Faris Al-Ghifari, S.T.');
        $response->assertSee('Cum Laude');
        $response->assertDontSee('LỄ THÀNH HÔN');
        $response->assertDontSee('Akad Nikah');
    }

    /**
     * Test Clean Tech Seminar & Workshop renders tech conference defaults
     */
    public function test_clean_seminar_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/clean-seminar');

        $response->assertStatus(200);
        $response->assertSee('Indonesia AI Summit 2026');
        $response->assertSee('Dr. Aris Sudarsono');
        $response->assertSee('Keynote Speaker');
        $response->assertDontSee('LỄ THÀNH HÔN');
        $response->assertDontSee('Pengantin');
    }

    /**
     * Test Green Mosque Syiar renders authentic Islamic tabligh akbar defaults
     */
    public function test_green_mosque_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/green-mosque');

        $response->assertStatus(200);
        $response->assertSee('K.H. Ahmad Syarifuddin');
        $response->assertSee('TABLIGH AKBAR');
        $response->assertDontSee('Ketupat');
        $response->assertDontSee('Bpk. H. Rahmat');
    }

    /**
     * Test Little Prince Nordic Aqiqah renders authentic Nordic defaults
     */
    public function test_little_prince_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/little-prince');

        $response->assertStatus(200);
        $response->assertSee('Muhammad Rayyan Al-Fatih');
        $response->assertSee('Fajar Ramadhan');
        $response->assertDontSee('Walimatul Khitan');
        $response->assertDontSee('Dania Azkadina');
    }

    /**
     * Test Royal Tasmiyah Sultan renders authentic luxury sultan defaults
     */
    public function test_royal_tasmiyah_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/royal-tasmiyah');

        $response->assertStatus(200);
        $response->assertSee('Daniswara');
        $response->assertSee('Danang Wibowo');
        $response->assertDontSee('Dania Azkadina');
    }

    /**
     * Test Walimatul Khitan preview respects custom user bank data and events schedule (no hardcoded fallback)
     */
    public function test_walimatul_khitan_preview_respects_custom_bank_and_events(): void
    {
        $eventsJson = json_encode([
            [
                'title' => 'Tasyakuran',
                'date' => '2026-10-31',
                'start_time' => '16:00',
                'end_time' => 'Selesai',
                'venue_name' => 'Rumah Pak Bambang',
                'address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
                'maps_url' => 'https://maps.google.com/?q=Prambon+Sidoarjo',
            ]
        ]);

        $response = $this->get('/demo/walimatul-khitan?' . http_build_query([
            'preview' => '1',
            'bank_name_1' => 'Bank BCA',
            'bank_account_1' => '12345678',
            'bank_holder_1' => 'Arik Ananda',
            'events_json' => $eventsJson,
        ]));

        $response->assertStatus(200);
        $response->assertSee('Bank BCA');
        $response->assertSee('12345678');
        $response->assertSee('Arik Ananda');
        $response->assertSee('Tasyakuran');
        $response->assertSee('Rumah Pak Bambang');
        $response->assertSee('Jln Prambon Kec Prambon Kab Sidoarjo');
        $response->assertSee('31 Oktober 2026');
        $response->assertDontSee('7891029384');
        $response->assertDontSee('TAUSIYAH KHITAN & SHOLAWAT NABI');
    }

    /**
     * Test Sweet Baby Pastel Aqiqah preview respects custom user bank data and events schedule
     */
    public function test_baby_aqiqah_preview_respects_custom_bank_and_events(): void
    {
        $eventsJson = json_encode([
            [
                'title' => 'Tasyakuran Aqiqah',
                'date' => '2026-10-31',
                'start_time' => '16:00',
                'end_time' => 'Selesai',
                'venue_name' => 'Rumah Pak Bambang',
                'address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
                'maps_url' => 'https://maps.google.com/?q=Prambon+Sidoarjo',
            ]
        ]);

        $response = $this->get('/demo/baby-aqiqah?' . http_build_query([
            'preview' => '1',
            'bank_name_1' => 'Bank BCA',
            'bank_account_1' => '12345678',
            'bank_holder_1' => 'Arik Ananda',
            'events_json' => $eventsJson,
        ]));

        $response->assertStatus(200);
        $response->assertSee('Bank BCA');
        $response->assertSee('12345678');
        $response->assertSee('Arik Ananda');
        $response->assertSee('Tasyakuran Aqiqah');
        $response->assertSee('Rumah Pak Bambang');
        $response->assertSee('Jln Prambon Kec Prambon Kab Sidoarjo');
        $response->assertSee('31 Oktober 2026');
        $response->assertDontSee('7192837465');
        $response->assertDontSee('Pembacaan Maulid & Doa Selamat');
    }

    /**
     * Test Little Prince preview respects custom user bank data and events schedule
     */
    public function test_little_prince_preview_respects_custom_bank_and_events(): void
    {
        $eventsJson = json_encode([
            [
                'title' => 'Tasyakuran Kelahiran',
                'date' => '2026-10-31',
                'start_time' => '16:00',
                'end_time' => 'Selesai',
                'venue_name' => 'Rumah Pak Bambang',
                'address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
                'maps_url' => 'https://maps.google.com/?q=Prambon+Sidoarjo',
            ]
        ]);

        $response = $this->get('/demo/little-prince?' . http_build_query([
            'preview' => '1',
            'bank_name_1' => 'Bank BCA',
            'bank_account_1' => '12345678',
            'bank_holder_1' => 'Arik Ananda',
            'events_json' => $eventsJson,
        ]));

        $response->assertStatus(200);
        $response->assertSee('Bank BCA');
        $response->assertSee('12345678');
        $response->assertSee('Arik Ananda');
        $response->assertSee('Tasyakuran Kelahiran');
        $response->assertSee('Rumah Pak Bambang');
        $response->assertSee('Jln Prambon Kec Prambon Kab Sidoarjo');
        $response->assertSee('31 Oktober 2026');
    }

    /**
     * Test TemplateManager resolves distinct template keys correctly
     */
    public function test_template_manager_resolves_distinct_keys(): void
    {
        $this->assertEquals('cheerful-birthday', \App\Services\TemplateManager::resolveKey('Cheerful Confetti Birthday'));
        $this->assertEquals('golden-birthday', \App\Services\TemplateManager::resolveKey('Golden Luxury Birthday'));
        $this->assertEquals('golden-birthday', \App\Services\TemplateManager::resolveKey('Golden Luxury Birthday / Milad'));
        $this->assertEquals('modern-graduate', \App\Services\TemplateManager::resolveKey('Modern Graduate Editorial'));
        $this->assertEquals('clean-seminar', \App\Services\TemplateManager::resolveKey('Clean Tech Seminar & Workshop'));
        $this->assertEquals('green-mosque', \App\Services\TemplateManager::resolveKey('Green Mosque Syiar & Tabligh Akbar'));
        $this->assertEquals('green-mosque', \App\Services\TemplateManager::resolveKey('Green Mosque Syiar'));
        $this->assertEquals('little-prince', \App\Services\TemplateManager::resolveKey('Little Prince Nordic Aqiqah'));
        $this->assertEquals('little-prince', \App\Services\TemplateManager::resolveKey('Little Prince Nordic'));
        $this->assertEquals('royal-tasmiyah', \App\Services\TemplateManager::resolveKey('Royal Tasmiyah & Aqiqah Sultan'));
        $this->assertEquals('royal-tasmiyah', \App\Services\TemplateManager::resolveKey('Royal Tasmiyah Sultan'));
        $this->assertEquals('walimatul-khitan-sahaja', \App\Services\TemplateManager::resolveKey('Walimatul Khitan Sahaja Berkah'));
        $this->assertEquals('walimatul-khitan-sahaja', \App\Services\TemplateManager::resolveKey('Walimatul Khitan Sahaja'));
        $this->assertEquals('walimatul-khitan', \App\Services\TemplateManager::resolveKey('Walimatul Khitan Berkah Sholeh'));
        $this->assertEquals('chibi-red', \App\Services\TemplateManager::resolveKey('Chibi Red Oriental'));
    }

    /**
     * Test Walimatul Khitan Sahaja (Basic Tier Khitan) renders authentic defaults
     */
    public function test_walimatul_khitan_sahaja_demo_renders_authentic_defaults(): void
    {
        $response = $this->get('/demo/walimatul-khitan-sahaja');

        $response->assertStatus(200);
        $response->assertSee('Ahmad Fatih');
        $response->assertSee('Tasyakuran Walimatul Khitan');
        $response->assertSee('Tasyakuran &amp; Doa Khitan', false);
        $response->assertSee('1310018899221');
        $response->assertSee('Hendra Pratama');
        $response->assertSee('Rina Wijaya');
    }

    /**
     * Test catalog contains a dedicated Basic tier Khitan template
     */
    public function test_catalog_contains_khitan_basic_template(): void
    {
        $themes = \App\Services\TemplateManager::getCatalogThemes();
        $basicKhitanThemes = array_filter($themes, function ($t) {
            return ($t['tier'] ?? '') === 'basic' && ($t['category'] ?? '') === 'khitanan';
        });

        $this->assertNotEmpty($basicKhitanThemes, 'Catalog must contain at least one Basic tier template for Khitanan.');
        $khitanBasic = reset($basicKhitanThemes);
        $this->assertEquals('walimatul-khitan-sahaja', $khitanBasic['key']);
        $this->assertEquals('Rp50.000', $khitanBasic['price']);
        $this->assertEquals('basic', $khitanBasic['tier']);
    }

    /**
     * Test strictly ZERO occurrences of the word 'Chungdoi' across all views
     */
    public function test_zero_occurrences_of_forbidden_words(): void
    {
        $builderContent = file_get_contents(resource_path('views/builder/index.blade.php'));
        $this->assertStringNotContainsStringIgnoringCase('chungdoi', $builderContent);

        $templateFiles = glob(resource_path('views/templates/*.blade.php'));
        foreach ($templateFiles as $file) {
            $content = file_get_contents($file);
            $this->assertStringNotContainsStringIgnoringCase('chungdoi', $content, "Template " . basename($file) . " contains forbidden word.");
        }
    }
}
