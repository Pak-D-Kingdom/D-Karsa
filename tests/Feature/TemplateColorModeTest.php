<?php

namespace Tests\Feature;

use App\Support\ColorTheme;
use Tests\TestCase;

class TemplateColorModeTest extends TestCase
{
    public function test_palet_siang_memakai_latar_terang(): void
    {
        $theme = ColorTheme::forPalette('Ocean Blue');

        $this->assertSame('light', $theme['mode']);
        $this->assertSame('#F3F8FC', $theme['page']);
        $this->assertSame('#FFFFFF', $theme['card']);
        $this->assertSame('#102A43', $theme['text']);
    }

    public function test_palet_jewel_memakai_halaman_ivory_dan_gerbang_berwarna(): void
    {
        $theme = ColorTheme::forPalette('Burgundy Wine');

        $this->assertSame('jewel', $theme['mode']);
        $this->assertSame('#FDF9F7', $theme['page']);
        $this->assertSame('#5E1926', $theme['gate']);
    }

    public function test_hanya_tiga_palet_malam_yang_gelap(): void
    {
        foreach (['Midnight Navy', 'Cyber Neon', 'Dark Mode'] as $palette) {
            $this->assertSame('night', ColorTheme::forPalette($palette)['mode'], $palette);
        }

        foreach (['Clean White', 'Soft Pink', 'Sage Green', 'Monochrome', 'Bold Red', 'Plum Velvet'] as $palette) {
            $this->assertNotSame('night', ColorTheme::forPalette($palette)['mode'], $palette);
        }
    }

    public function test_halaman_demo_menandai_mode_warna(): void
    {
        $this->get('/demo/minimalis-lumen?tier=eksklusif')
            ->assertOk()
            ->assertSee('data-mode="light"', false);

        $this->get('/demo/seminar-burgundy-wine?tier=eksklusif')
            ->assertOk()
            ->assertSee('data-mode="jewel"', false);

        $this->get('/demo/tasmiyah-midnight-navy?tier=eksklusif')
            ->assertOk()
            ->assertSee('data-mode="night"', false);
    }
}
