<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Models\User;
use App\Services\TemplateManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TemplateCoverDecouplingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        \Illuminate\Support\Facades\DB::purge('sqlite');
        \Illuminate\Support\Facades\DB::reconnect('sqlite');
    }

    /**
     * Pastikan setiap template memiliki cover default yang unik dan berbeda
     */
    public function test_each_template_has_distinct_default_cover(): void
    {
        $chibiCover = TemplateManager::getDefaultCoverImage('chibi-red');
        $javaneseCover = TemplateManager::getDefaultCoverImage('javanese-royal');
        $batakCover = TemplateManager::getDefaultCoverImage('batak-heritage');
        $floralCover = TemplateManager::getDefaultCoverImage('minimalist-floral');
        $pinkCover = TemplateManager::getDefaultCoverImage('wildflower-pink');

        $this->assertNotEmpty($chibiCover);
        $this->assertNotEmpty($javaneseCover);
        $this->assertNotEmpty($batakCover);
        $this->assertNotEmpty($floralCover);
        $this->assertNotEmpty($pinkCover);

        // Pastikan tidak ada template utama yang saling bertabrakan / menduplikasi URL cover
        $this->assertNotEquals($chibiCover, $floralCover);
        $this->assertNotEquals($javaneseCover, $floralCover);
        $this->assertNotEquals($batakCover, $javaneseCover);
        $this->assertNotEquals($batakCover, $floralCover);
        $this->assertNotEquals($pinkCover, $floralCover);
    }

    /**
     * Pastikan katalog template di halaman Home menampilkan gambar default template,
     * bukan gambar custom dari couple / klien.
     */
    public function test_home_catalog_displays_default_template_covers(): void
    {
        $response = $this->get('/');
        $response->assertSuccessful();

        $chibi = TemplateManager::get('chibi-red');
        $batak = TemplateManager::get('batak-heritage');
        $javanese = TemplateManager::get('javanese-royal');
        $floral = TemplateManager::get('minimalist-floral');

        $response->assertSee($chibi['img']);
        $response->assertSee($batak['img']);
        $response->assertSee($javanese['img']);
        $response->assertSee($floral['img']);
    }

    /**
     * Pastikan halaman Builder (/buat-undangan) menampilkan gambar default template.
     */
    public function test_builder_page_displays_default_template_thumbnails(): void
    {
        $response = $this->get('/buat-undangan');
        $response->assertSuccessful();

        $chibi = TemplateManager::get('chibi-red');
        $batak = TemplateManager::get('batak-heritage');

        $response->assertSee($chibi['img']);
        $response->assertSee($batak['img']);
    }

    /**
     * Pastikan ketika admin/pengguna mengubah cover_photo pada suatu Couple,
     * cover tersebut hanya tampil di undangan milik Couple tersebut dan TIDAK merubah thumbnail katalog Home & Builder.
     */
    public function test_custom_couple_cover_does_not_affect_catalog_thumbnails(): void
    {
        $couple = Couple::firstOrCreate(
            ['slug' => 'test-couple-cover-isolation'],
            [
                'groom_name' => 'TestingGroom',
                'bride_name' => 'TestingBride',
                'groom_fullname' => 'Testing Groom Full',
                'bride_fullname' => 'Testing Bride Full',
                'theme' => 'Simple Minimalist Floral',
                'category' => 'Pernikahan',
                'wedding_date' => now()->addDays(30),
                'cover_photo' => 'couples/covers/custom_isolated_photo.jpg',
                'is_in_catalog' => true,
            ]
        );

        $couple->update([
            'cover_photo' => 'couples/covers/custom_isolated_photo.jpg',
            'is_in_catalog' => true,
        ]);

        // 1. Cek halaman Home: cover default template Simple Minimalist Floral tetap ada
        $homeResponse = $this->get('/');
        $homeResponse->assertSuccessful();
        $floralTemplate = TemplateManager::get('minimalist-floral');
        $homeResponse->assertSee($floralTemplate['img']);

        // Thumbnail kartu template TIDAK berubah menjadi custom_isolated_photo.jpg
        $catalogThemes = TemplateManager::getCatalogThemes();
        foreach ($catalogThemes as $t) {
            $this->assertStringNotContainsString('custom_isolated_photo.jpg', $t['img']);
        }

        // 2. Cek halaman Buat Undangan: thumbnail template tetap sesuai default
        $builderResponse = $this->get('/buat-undangan');
        $builderResponse->assertSuccessful();
        $builderResponse->assertSee($floralTemplate['img']);

        // 3. Cek undangan couple tersebut: cover undangan miliknya menggunakan custom cover
        $invitationResponse = $this->get('/undangan/' . $couple->slug);
        $invitationResponse->assertSuccessful();
        $invitationResponse->assertSee('custom_isolated_photo.jpg', false);

        // Bersihkan data testing
        $couple->delete();
    }

    /**
     * Pastikan rute demo menggunakan cover default template yang sesuai
     */
    public function test_demo_routes_render_with_designated_covers(): void
    {
        $demoChibi = $this->get('/demo/chibi-red');
        $demoChibi->assertSuccessful();
        $demoChibi->assertSee('photo-1532712938310-34cb3982ef74', false);

        $demoBatak = $this->get('/demo/batak-heritage');
        $demoBatak->assertSuccessful();
        $demoBatak->assertSee('photo-1591604466107-ec97de577aff', false);

        $demoJavanese = $this->get('/demo/javanese-royal');
        $demoJavanese->assertSuccessful();
        $demoJavanese->assertSee('photo-1583939003579-730e3918a45a', false);
    }
}
