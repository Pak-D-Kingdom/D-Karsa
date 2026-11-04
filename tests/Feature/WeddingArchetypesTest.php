<?php

namespace Tests\Feature;

use App\Services\TemplateManager;
use App\Support\WeddingArchetypes;
use Tests\TestCase;

class WeddingArchetypesTest extends TestCase
{
    public function test_sembilan_sub_bab_pernikahan_punya_archetype_berbeda(): void
    {
        $expected = [
            'jawa-keraton-agung' => 'jawa',
            'sunda-mega-mendung' => 'sunda',
            'minang-rumah-gadang' => 'minang',
            'nusantara-tenun-ikat' => 'nusantara',
            'minimalis-aria' => 'minimalis',
            'floral-rosalind' => 'floral',
            'islami-ar-rum-21' => 'islami',
            'akad-dua-janji' => 'akad',
            'internasional-maison' => 'internasional',
        ];

        foreach ($expected as $key => $archetype) {
            $this->assertSame($archetype, TemplateManager::weddingArchetype($key), $key);
        }

        $this->assertCount(9, array_unique(array_values($expected)));
    }

    public function test_kategori_lain_tidak_memakai_archetype_pernikahan(): void
    {
        $this->assertNull(TemplateManager::weddingArchetype('birthday-citrus-pop'));
        $this->assertNull(TemplateManager::weddingArchetype('seminar-coral-peach'));
        $this->assertNull(TemplateManager::weddingArchetype(''));
        $this->assertNull(TemplateManager::weddingArchetype(null));
    }

    public function test_setiap_archetype_punya_art_sendiri(): void
    {
        $shapes = [];

        foreach (WeddingArchetypes::KEYS as $key) {
            $art = WeddingArchetypes::art($key);

            $this->assertNotEmpty($art['label'], $key);
            $this->assertStringContainsString('<svg', $art['seal'], $key);
            $this->assertNotEmpty($art['silhouette'], $key);
            $this->assertStringContainsString('<svg', $art['ornament_left'], $key);
            $this->assertStringContainsString('<svg', $art['ornament_right'], $key);
            $this->assertContains($art['particle'], ['jasmine', 'firefly', 'diamond', 'frangipani', 'bokeh', 'petal', 'star', 'bubble', 'sakura']);

            $shapes[] = $art['silhouette'];
        }

        $this->assertCount(9, array_unique($shapes), 'Siluet plane 1 harus berbeda untuk 9 archetype.');
    }

    public function test_halaman_pernikahan_membawa_atribut_data_wed(): void
    {
        $html = $this->get('/demo/jawa-keraton-agung/eksklusif')->assertOk()->getContent();

        $this->assertStringContainsString('data-wed="jawa"', $html);
        $this->assertStringContainsString('html[data-wed="jawa"] .gate-door.left', $html);
    }
}
