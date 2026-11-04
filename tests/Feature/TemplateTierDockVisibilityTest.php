<?php

namespace Tests\Feature;

use Tests\TestCase;

class TemplateTierDockVisibilityTest extends TestCase
{
    public function test_undangan_uji_tidak_menampilkan_harga_dan_pemilih_paket(): void
    {
        config(['cache.default' => 'array']);

        $response = $this->postJson('/demo/tautan', [
            'template_key' => 'minimalis-lumen',
            'params' => [
                'preview' => '1',
                'category' => 'Pernikahan',
                'tier' => 'eksklusif',
                'groom_name' => 'Arya',
                'bride_name' => 'Kinanthi',
            ],
        ])->assertOk();

        $path = parse_url($response->json('url'), PHP_URL_PATH);

        $this->get($path)
            ->assertOk()
            ->assertDontSee('id="top-customizer-dock"', false)
            ->assertDontSee('Rp180.000', false);
    }

    public function test_halaman_demo_tetap_menampilkan_harga_dan_pemilih_paket(): void
    {
        $this->get('/demo/minimalis-lumen?tier=eksklusif')
            ->assertOk()
            ->assertSee('id="top-customizer-dock"', false)
            ->assertSee('Rp180.000', false);
    }
}
