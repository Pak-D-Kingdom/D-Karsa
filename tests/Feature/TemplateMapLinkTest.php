<?php

namespace Tests\Feature;

use App\Services\TemplateManager;
use Tests\TestCase;

class TemplateMapLinkTest extends TestCase
{
    public function test_tautan_tanpa_skema_dibuat_absolut(): void
    {
        $this->assertSame(
            'https://maps.app.goo.gl/AbCdEf',
            TemplateManager::mapDirectionsUrl('maps.app.goo.gl/AbCdEf', 'Gedung Serbaguna')
        );
        $this->assertSame(
            'https://www.google.com/maps/place/Belia+Cosmetic/@-7.28,112.72,17z',
            TemplateManager::mapDirectionsUrl('https://www.google.com/maps/place/Belia+Cosmetic/@-7.28,112.72,17z')
        );
    }

    public function test_alamat_biasa_jadi_pencarian_maps(): void
    {
        $url = TemplateManager::mapDirectionsUrl('Jl. Dukuh Kupang 12 Surabaya');

        $this->assertStringStartsWith('https://www.google.com/maps/search/?api=1&query=', $url);
        $this->assertStringContainsString('Dukuh+Kupang', $url);
    }

    public function test_tautan_kosong_memakai_alamat_acara(): void
    {
        $this->assertSame(
            'https://www.google.com/maps/search/?api=1&query=Gedung+Serbaguna+Surabaya',
            TemplateManager::mapDirectionsUrl('', 'Gedung Serbaguna Surabaya')
        );
        $this->assertSame('https://www.google.com/maps', TemplateManager::mapDirectionsUrl(null, null));
    }

    public function test_embed_memakai_koordinat_dari_tautan_pembeli(): void
    {
        $this->assertSame(
            'https://www.google.com/maps?q=-7.2892%2C112.7211&z=16&output=embed',
            TemplateManager::mapEmbedUrl('https://www.google.com/maps/place/Belia+Cosmetic/@-7.2892,112.7211,17z')
        );
        $this->assertSame(
            'https://www.google.com/maps?q=-7.2575%2C112.7521&z=16&output=embed',
            TemplateManager::mapEmbedUrl('https://www.google.com/maps/place/x/data=!4m2!3d-7.2575!4d112.7521')
        );
    }

    public function test_embed_memakai_nama_tempat_dari_tautan(): void
    {
        $this->assertSame(
            'https://www.google.com/maps?q=Belia+Cosmetic&z=16&output=embed',
            TemplateManager::mapEmbedUrl('https://www.google.com/maps/place/Belia+Cosmetic')
        );
    }

    public function test_embed_kembali_ke_alamat_bila_tautan_tidak_memuat_lokasi(): void
    {
        $this->assertSame(
            'https://www.google.com/maps?q=Gedung+Serbaguna&z=16&output=embed',
            TemplateManager::mapEmbedUrl('maps.app.goo.gl/AbCdEf', 'Gedung Serbaguna')
        );
    }
}
