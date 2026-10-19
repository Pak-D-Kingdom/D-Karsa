<?php

namespace Tests\Feature;

use App\Filament\Resources\CoupleResource\Pages\EditCouple;
use App\Filament\Resources\CoupleResource\Pages\ListCouples;
use App\Models\Couple;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminCoupleTest extends TestCase
{
    protected User $admin;
    protected Couple $couple;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        \Illuminate\Support\Facades\DB::purge('sqlite');
        \Illuminate\Support\Facades\DB::reconnect('sqlite');

        $this->admin = User::first() ?? User::factory()->create();
        $this->couple = Couple::where('slug', 'bima-diana')->first() ?? Couple::first();
    }

    public function test_admin_can_view_couples_table_with_theme_and_data(): void
    {
        Livewire::actingAs($this->admin)
            ->test(ListCouples::class)
            ->assertSuccessful()
            ->searchTable('bima-diana')
            ->assertCanSeeTableRecords([$this->couple]);
    }

    public function test_admin_edit_form_hydrates_existing_photos(): void
    {
        $test = Livewire::actingAs($this->admin)
            ->test(EditCouple::class, ['record' => $this->couple->getRouteKey()])
            ->assertSuccessful();

        $data = $test->get('data');
        $this->assertNotEmpty($data['groom_photo']);
        $this->assertNotEmpty($data['bride_photo']);
        $this->assertEquals('Simple Minimalist Floral', $data['theme']);
    }

    public function test_saving_edit_form_preserves_existing_photos(): void
    {
        $originalGroom = $this->couple->groom_photo;
        $originalBride = $this->couple->bride_photo;

        Livewire::actingAs($this->admin)
            ->test(EditCouple::class, ['record' => $this->couple->getRouteKey()])
            ->call('save')
            ->assertHasNoErrors();

        $this->couple->refresh();
        $this->assertEquals($originalGroom, $this->couple->groom_photo);
        $this->assertEquals($originalBride, $this->couple->bride_photo);
    }

    public function test_admin_can_replace_photo_and_save(): void
    {
        $originalGroom = $this->couple->groom_photo;
        $fakeFile = UploadedFile::fake()->image('new_test_groom.jpg', 400, 400);

        Livewire::actingAs($this->admin)
            ->test(EditCouple::class, ['record' => $this->couple->getRouteKey()])
            ->set('data.groom_photo', [$fakeFile])
            ->call('save')
            ->assertHasNoErrors();

        $this->couple->refresh();
        $newPhoto = $this->couple->groom_photo;
        $this->assertNotEquals($originalGroom, $newPhoto);
        $this->assertTrue(Storage::disk('public')->exists($newPhoto));

        // Clean up and restore original photo
        Storage::disk('public')->delete($newPhoto);
        $this->couple->update(['groom_photo' => $originalGroom]);
    }

    public function test_public_storage_symlink_points_to_correct_disk(): void
    {
        $publicStoragePath = public_path('storage');
        $this->assertTrue(file_exists($publicStoragePath));

        if (!empty($this->couple->groom_photo)) {
            $directPath = public_path('storage/' . $this->couple->groom_photo);
            $this->assertTrue(file_exists($directPath), "File {$directPath} must be accessible via public/storage");
        }
    }
}
