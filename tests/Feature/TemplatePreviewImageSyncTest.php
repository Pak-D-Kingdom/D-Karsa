<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Services\TemplateManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TemplatePreviewImageSyncTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test TemplateManager resolvePhotoUrl correctly handles data URIs, http URLs, storage paths, and fallbacks.
     */
    public function test_resolve_photo_url_handles_all_schemes(): void
    {
        $base64Uri = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';
        $this->assertEquals($base64Uri, TemplateManager::resolvePhotoUrl($base64Uri));

        $httpUrl = 'http://example.com/test.jpg';
        $this->assertEquals($httpUrl, TemplateManager::resolvePhotoUrl($httpUrl));

        $httpsUrl = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486';
        $this->assertEquals($httpsUrl, TemplateManager::resolvePhotoUrl($httpsUrl));

        $storagePath = 'couples/custom-groom.jpg';
        $this->assertStringContainsString('storage/couples/custom-groom.jpg', TemplateManager::resolvePhotoUrl($storagePath));

        $fallback = 'https://example.com/default-cover.jpg';
        $this->assertEquals($fallback, TemplateManager::resolvePhotoUrl(null, $fallback));
        $this->assertEquals($fallback, TemplateManager::resolvePhotoUrl('', $fallback));
    }

    /**
     * Test TemplateManager formatParentNames formats honorifics without duplicating.
     */
    public function test_format_parent_names_honorifics(): void
    {
        $formatted = TemplateManager::formatParentNames('Budi', 'Siti');
        $this->assertStringContainsString('Bpk. Budi', $formatted);
        $this->assertStringContainsString('Ibu Siti', $formatted);

        $alreadyTitled = TemplateManager::formatParentNames('Bpk. H. Rahmat', 'Hj. Maryam');
        $this->assertEquals('Bpk. H. Rahmat & Hj. Maryam', $alreadyTitled);

        $this->assertEquals('Fallback Parents', TemplateManager::formatParentNames('', '', 'Fallback Parents'));
        $this->assertEquals('', TemplateManager::formatParentNames(null, null, null));
    }

    /**
     * Test that all 24 template blades render correctly with base64 data URIs and preview listeners.
     */
    public function test_all_24_templates_render_and_have_preview_synchronization(): void
    {
        $base64Sample = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==';

        $templates = [
            'wildflower-pink',
            'batak-heritage',
            'minimalist-floral',
            'snowfall-white',
            'chibi-red',
            'javanese-royal',
            'baby-aqiqah',
            'walimatul-khitan',
            'golden-birthday',
            'kids-birthday',
            'tahlilan-khusyuk',
            'halal-bihalal',
            'syukuran-rumah',
            'wisuda-sarjana',
            'formal-corporate',
            'cheerful-birthday',
            'little-prince',
            'royal-tasmiyah',
            'green-mosque',
            'walimatus-safar',
            'modern-graduate',
            'scholar-luxury',
            'clean-seminar',
            'reuni-akbar',
        ];

        foreach ($templates as $themeKey) {
            $couple = new Couple([
                'groom_name' => 'Aditya Pratama',
                'bride_name' => 'Bella Anindita',
                'groom_fullname' => 'Aditya Pratama, S.T.',
                'bride_fullname' => 'Bella Anindita, S.Ds.',
                'groom_father' => 'Bambang',
                'groom_mother' => 'Siti',
                'bride_father' => 'Surya',
                'bride_mother' => 'Dewi',
                'wedding_date' => now()->addDays(30)->toDateString(),
                'wedding_time' => '10:00:00',
                'venue_name' => 'Grand Ballroom',
                'venue_address' => 'Jl. Jenderal Sudirman No. 1, Jakarta',
                'cover_photo' => $base64Sample,
                'groom_photo' => $base64Sample,
                'bride_photo' => $base64Sample,
                'quote' => 'Bersama menggapai ridho-Nya dalam ikatan suci yang penuh berkah.',
            ]);

            $guest = (object)['name' => 'Sahabat Tercinta'];
            $galleries = collect([
                (object)['image' => $base64Sample],
                (object)['image' => $base64Sample],
            ]);

            $rendered = view('templates.' . $themeKey, [
                'couple' => $couple,
                'guest' => $guest,
                'galleries' => $galleries,
                'wishes' => collect(),
            ])->render();

            $this->assertNotEmpty($rendered, "Template {$themeKey} failed to render.");
            $this->assertStringContainsString('PREVIEW_IFRAME_READY', $rendered, "Template {$themeKey} is missing PREVIEW_IFRAME_READY handshake.");
            $this->assertStringContainsString('UPDATE_PREVIEW_PHOTO', $rendered, "Template {$themeKey} is missing UPDATE_PREVIEW_PHOTO listener.");
            $this->assertStringContainsString('previewCover', $rendered, "Template {$themeKey} is missing cover preview element ID.");
            $this->assertStringContainsString('previewGroomPhotoImg', $rendered, "Template {$themeKey} is missing groom/primary photo element ID.");
            if ($themeKey !== 'tahlilan-khusyuk') {
                $this->assertStringContainsString('previewGalleryGrid', $rendered, "Template {$themeKey} is missing previewGalleryGrid ID.");
            }
        }
    }

    /**
     * Test the builder view contains dynamic synchronization scripts and preservation of base64 photos.
     */
    public function test_builder_view_contains_preview_sync_and_base64_preservation(): void
    {
        $response = $this->get('/buat-undangan');
        $response->assertStatus(200);

        $content = $response->getContent();
        $this->assertStringContainsString('sendLatestPreviewDataToIframe', $content);
        $this->assertStringContainsString('PREVIEW_IFRAME_READY', $content);
        $this->assertStringContainsString('id="groomPhotoBase64"', $content);
        $this->assertStringContainsString('id="bridePhotoBase64"', $content);
        $this->assertStringContainsString('id="coverPhotoBase64"', $content);
        $this->assertStringContainsString('id="galleryPhotosBase64"', $content);
        $this->assertStringContainsString('UPDATE_PREVIEW_PHOTO', $content);
        $this->assertStringContainsString('UPDATE_PREVIEW_GALLERY', $content);
        $this->assertStringContainsString('UPDATE_PREVIEW_PARENTS', $content);
    }

    /**
     * Test all 24 template demo routes return 200 OK with demo couple data.
     */
    public function test_all_24_demo_routes_return_status_200(): void
    {
        $templates = [
            'wildflower-pink',
            'batak-heritage',
            'minimalist-floral',
            'snowfall-white',
            'chibi-red',
            'javanese-royal',
            'baby-aqiqah',
            'walimatul-khitan',
            'golden-birthday',
            'kids-birthday',
            'tahlilan-khusyuk',
            'halal-bihalal',
            'syukuran-rumah',
            'wisuda-sarjana',
            'formal-corporate',
            'cheerful-birthday',
            'little-prince',
            'royal-tasmiyah',
            'green-mosque',
            'walimatus-safar',
            'modern-graduate',
            'scholar-luxury',
            'clean-seminar',
            'reuni-akbar',
        ];

        foreach ($templates as $themeKey) {
            $response = $this->get('/demo/' . $themeKey);
            $response->assertStatus(200);
            $this->assertNotEmpty($response->getContent(), "Demo route /demo/{$themeKey} returned empty content.");
        }
    }
}

