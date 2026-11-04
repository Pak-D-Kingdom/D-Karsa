<?php

namespace Tests\Feature;

use Tests\TestCase;

class PreviewGuestLinksTest extends TestCase
{
    public function test_halaman_link_tamu_memakai_tautan_undangan_uji(): void
    {
        config(['cache.default' => 'array']);

        $response = $this->postJson('/demo/tautan', [
            'template_key' => 'jawa-keraton-agung',
            'params' => [
                'preview' => '1',
                'category' => 'Pernikahan',
                'groom_name' => 'Arya',
                'bride_name' => 'Kinanthi',
                'tier' => 'eksklusif',
            ],
        ])->assertOk();

        $path = parse_url($response->json('url'), PHP_URL_PATH);

        $this->get($path.'/tamu')
            ->assertOk()
            ->assertSee('Link Personal per Tamu', false)
            ->assertSee('Arya &amp; Kinanthi', false)
            ->assertSee($path, false)
            ->assertDontSee('/undangan/undangan-anda', false);
    }

    public function test_halaman_link_tamu_menolak_token_yang_tidak_dikenal(): void
    {
        config(['cache.default' => 'array']);

        $this->get('/p/token-tidak-ada/tamu')->assertNotFound();
    }
}
