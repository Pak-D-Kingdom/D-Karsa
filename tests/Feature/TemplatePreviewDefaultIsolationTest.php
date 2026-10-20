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
