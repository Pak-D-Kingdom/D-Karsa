<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageUploadValidationTest extends TestCase
{
    /**
     * Test groom photo exceeding 5MB triggers friendly Indonesian validation error
     */
    public function test_groom_photo_exceeding_5mb_returns_indonesian_error(): void
    {
        $oversizedPhoto = UploadedFile::fake()->image('groom_huge.jpg')->size(6000); // 6 MB > 5120 KB

        $response = $this->from('/buat-undangan')->post('/buat-undangan', [
            'wedding_date' => '2026-12-31',
            'groom_name' => 'Faris',
            'customer_name' => 'Fonda Endana',
            'customer_phone' => '08123456789',
            'groom_photo' => $oversizedPhoto,
        ]);

        $response->assertRedirect('/buat-undangan');
        $response->assertSessionHasErrors([
            'groom_photo' => 'Ukuran foto mempelai pria tidak boleh lebih dari 5 MB.',
        ]);
    }

    /**
     * Test bride photo exceeding 5MB triggers friendly Indonesian validation error
     */
    public function test_bride_photo_exceeding_5mb_returns_indonesian_error(): void
    {
        $oversizedPhoto = UploadedFile::fake()->image('bride_huge.jpg')->size(6000); // 6 MB > 5120 KB

        $response = $this->from('/buat-undangan')->post('/buat-undangan', [
            'wedding_date' => '2026-12-31',
            'groom_name' => 'Faris',
            'customer_name' => 'Fonda Endana',
            'customer_phone' => '08123456789',
            'bride_photo' => $oversizedPhoto,
        ]);

        $response->assertRedirect('/buat-undangan');
        $response->assertSessionHasErrors([
            'bride_photo' => 'Ukuran foto mempelai wanita tidak boleh lebih dari 5 MB.',
        ]);
    }

    /**
     * Test cover photo exceeding 5MB triggers friendly Indonesian validation error
     */
    public function test_cover_photo_exceeding_5mb_returns_indonesian_error(): void
    {
        $oversizedPhoto = UploadedFile::fake()->image('cover_huge.jpg')->size(6000); // 6 MB > 5120 KB

        $response = $this->from('/buat-undangan')->post('/buat-undangan', [
            'wedding_date' => '2026-12-31',
            'groom_name' => 'Faris',
            'customer_name' => 'Fonda Endana',
            'customer_phone' => '08123456789',
            'cover_photo' => $oversizedPhoto,
        ]);

        $response->assertRedirect('/buat-undangan');
        $response->assertSessionHasErrors([
            'cover_photo' => 'Ukuran foto sampul (cover) tidak boleh lebih dari 5 MB.',
        ]);
    }

    /**
     * Test gallery photo exceeding 5MB triggers friendly Indonesian validation error
     */
    public function test_gallery_photo_exceeding_5mb_returns_indonesian_error(): void
    {
        $oversizedPhoto = UploadedFile::fake()->image('gallery_huge.jpg')->size(6000); // 6 MB > 5120 KB

        $response = $this->from('/buat-undangan')->post('/buat-undangan', [
            'wedding_date' => '2026-12-31',
            'groom_name' => 'Faris',
            'customer_name' => 'Fonda Endana',
            'customer_phone' => '08123456789',
            'gallery_photos' => [$oversizedPhoto],
        ]);

        $response->assertRedirect('/buat-undangan');
        $response->assertSessionHasErrors([
            'gallery_photos.0' => 'Setiap foto galeri tidak boleh lebih dari 5 MB.',
        ]);
    }

    /**
     * Test client-side builder page contains Indonesian 5MB helper labels and JS guards
     */
    public function test_builder_page_contains_indonesian_5mb_labels_and_guards(): void
    {
        $response = $this->get('/buat-undangan');

        $response->assertStatus(200);
        $response->assertSee('Maksimal 5 MB');
        $response->assertSee('Ukuran file foto terlalu besar');
        $response->assertSee('Ada foto galeri yang melebihi batas ukuran 5 MB');
    }

    /**
     * Strictly verify zero occurrences of forbidden words
     */
    public function test_zero_occurrences_of_forbidden_words(): void
    {
        $controllerContent = file_get_contents(app_path('Http/Controllers/InvitationController.php'));
        $this->assertStringNotContainsStringIgnoringCase('chungdoi', $controllerContent);

        $builderContent = file_get_contents(resource_path('views/builder/index.blade.php'));
        $this->assertStringNotContainsStringIgnoringCase('chungdoi', $builderContent);
    }
}
