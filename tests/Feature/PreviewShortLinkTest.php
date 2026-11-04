<?php

namespace Tests\Feature;

use Tests\TestCase;

class PreviewShortLinkTest extends TestCase
{
    public function test_preview_link_mengembalikan_tautan_pendek_yang_bisa_dibuka(): void
    {
        config(['cache.default' => 'array']);

        $response = $this->postJson('/demo/tautan', [
            'template_key' => 'jawa-keraton-agung',
            'params' => [
                'preview' => '1',
                'category' => 'Pernikahan',
                'sub_category' => 'Adat Jawa',
                'groom_name' => 'Arya',
                'to' => 'Tamu Tes',
                'tier' => 'eksklusif',
            ],
        ])->assertOk();

        $url = $response->json('url');

        $this->assertStringContainsString('/p/', $url);
        $this->assertLessThan(80, strlen($url), 'Tautan pratinjau harus pendek.');
        $this->assertStringNotContainsString('events_json', $url);

        $this->get(parse_url($url, PHP_URL_PATH))
            ->assertOk()
            ->assertSee('Arya', false);
    }

    public function test_token_pratinjau_yang_tidak_dikenal_menghasilkan_404(): void
    {
        config(['cache.default' => 'array']);

        $this->get('/p/token-tidak-ada')->assertNotFound();
    }
}
