<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InvitationBuilderComprehensiveTest extends TestCase
{
    protected array $createdCoupleIds = [];
    protected array $uploadedStorageFiles = [];

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        \Illuminate\Support\Facades\DB::purge('sqlite');
        \Illuminate\Support\Facades\DB::reconnect('sqlite');
    }

    protected function tearDown(): void
    {
        if (!empty($this->createdCoupleIds)) {
            Event::whereIn('couple_id', $this->createdCoupleIds)->delete();
            Gallery::whereIn('couple_id', $this->createdCoupleIds)->delete();
            Couple::whereIn('id', $this->createdCoupleIds)->delete();
        }

        foreach ($this->uploadedStorageFiles as $file) {
            if (Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        parent::tearDown();
    }

    /**
     * 1. Test GET /buat-undangan across various categories and themes.
     */
    public function test_get_builder_page_renders_successfully(): void
    {
        $categories = [
            'Pernikahan' => 'chibi-red',
            'Ulang Tahun' => 'arctic-frost',
            'Aqiqah' => 'baby-aqiqah',
            'Acara Formal' => 'formal-corporate',
            'Keagamaan' => 'walimatus-safar',
            'Wisuda' => 'wisuda-sarjana'
        ];

        foreach ($categories as $cat => $themeKey) {
            $response = $this->get("/buat-undangan?category={$cat}&theme={$themeKey}");
            $response->assertStatus(200);
            $response->assertSee('Buat Undangan Digital Anda Sendiri');
            $response->assertSee('draftRecoveryBanner');
            $response->assertSee('autoSaveIndicator');
        }
    }

    /**
     * 2. Test validation rules for required fields.
     */
    public function test_mandatory_fields_validation_errors(): void
    {
        // Missing all required fields
        $response = $this->from('/buat-undangan')->post('/buat-undangan', []);
        $response->assertRedirect('/buat-undangan');
        $response->assertSessionHasErrors([
            'groom_name' => 'Nama mempelai / pihak utama wajib diisi.',
            'wedding_date' => 'Tanggal acara / pernikahan wajib diisi.',
            'customer_name' => 'Nama lengkap pemesan wajib diisi untuk verifikasi & ACC undangan.',
            'customer_phone' => 'Nomor WhatsApp pemesan wajib diisi untuk konfirmasi undangan.',
        ]);
    }

    /**
     * 3. Test submitting a full wedding invitation with 2 events.
     */
    public function test_full_wedding_invitation_submission(): void
    {
        Storage::fake('public');

        $response = $this->from('/buat-undangan')->post('/buat-undangan', [
            'category' => 'Pernikahan',
            'sub_category' => 'Minimalis modern',
            'selected_theme' => 'Chibi Red Oriental',
            'selected_package' => 'Paket Eksklusif - Rp180.000',
            'wedding_date' => '2026-12-25',
            'groom_name' => 'Kevin',
            'groom_fullname' => 'Kevin Sanjaya, S.T.',
            'groom_father' => 'Bpk. Sanjaya',
            'groom_mother' => 'Ibu Maria',
            'bride_name' => 'Valencia',
            'bride_fullname' => 'Valencia Tanoe, B.A.',
            'bride_father' => 'Bpk. Hary Tanoe',
            'bride_mother' => 'Ibu Liliana',
            'event_1_title' => 'Pemberkatan Nikah',
            'event_1_date' => '2026-12-25',
            'event_1_start_time' => '09:00 WIB',
            'event_1_end_time' => '11:00 WIB',
            'event_1_venue' => 'Katedral Jakarta',
            'event_1_address' => 'Jl. Katedral No. 7, Jakarta Pusat',
            'event_1_maps_url' => 'https://maps.google.com',
            'event_2_title' => 'Resepsi Pernikahan',
            'event_2_date' => '2026-12-25',
            'event_2_start_time' => '18:30 WIB',
            'event_2_end_time' => '21:30 WIB',
            'event_2_venue' => 'Grand Ballroom Park Hyatt',
            'event_2_address' => 'Jl. Kebon Sirih No. 17-19, Jakarta Pusat',
            'event_2_maps_url' => 'https://maps.google.com',
            'bank_name_1' => 'BCA',
            'bank_account_1' => '8880192831',
            'bank_holder_1' => 'Kevin Sanjaya',
            'customer_name' => 'Kevin Sanjaya',
            'customer_phone' => '081299998888',
        ]);

        $couple = Couple::where('groom_name', 'Kevin')->where('bride_name', 'Valencia')->latest()->first();
        $this->assertNotNull($couple);
        $this->createdCoupleIds[] = $couple->id;

        $response->assertRedirect(route('midtrans.checkout', ['slug' => $couple->slug]));
        $this->assertEquals(180000, $couple->amount);
        $this->assertEquals('pending', $couple->payment_status);
        $this->assertNotEmpty($couple->invoice_number);

        // Check events
        $events = Event::where('couple_id', $couple->id)->orderBy('sort_order')->get();
        $this->assertCount(2, $events);
        $this->assertEquals('Pemberkatan Nikah', $events[0]->title);
        $this->assertEquals('Resepsi Pernikahan', $events[1]->title);

        // Check checkout view
        $checkoutResponse = $this->get(route('midtrans.checkout', ['slug' => $couple->slug]));
        $checkoutResponse->assertStatus(200);
    }

    /**
     * 4. Test duplicate slug handling with auto-increment.
     */
    public function test_duplicate_slug_increments_properly(): void
    {
        $couple1 = Couple::create([
            'slug' => 'kevin-valencia',
            'category' => 'Pernikahan',
            'wedding_date' => '2026-12-25',
            'groom_name' => 'Kevin',
            'groom_fullname' => 'Kevin Sanjaya',
            'bride_name' => 'Valencia',
            'bride_fullname' => 'Valencia Tanoe',
            'venue_name' => 'Gedung Serbaguna',
            'customer_name' => 'Order Pertama',
            'customer_phone' => '08123456789',
            'amount' => 110000,
            'invoice_number' => 'INV-TEST-001',
            'payment_status' => 'pending',
            'status' => 'pending'
        ]);
        $this->createdCoupleIds[] = $couple1->id;

        $response = $this->post('/buat-undangan', [
            'category' => 'Pernikahan',
            'wedding_date' => '2026-12-25',
            'groom_name' => 'Kevin',
            'bride_name' => 'Valencia',
            'customer_name' => 'Order Kedua',
            'customer_phone' => '08123456789',
        ]);

        $couple2 = Couple::where('customer_name', 'Order Kedua')->first();
        $this->assertNotNull($couple2);
        $this->createdCoupleIds[] = $couple2->id;

        $this->assertEquals('kevin-valencia-2', $couple2->slug);
    }

    /**
     * 5. Test non-wedding event creation with dynamic 3 events.
     */
    public function test_non_wedding_with_dynamic_events(): void
    {
        $response = $this->post('/buat-undangan', [
            'category' => 'Ulang Tahun',
            'sub_category' => 'Sweet seventeen',
            'selected_theme' => 'Korporat Profesional Arctic Frost',
            'selected_package' => 'Paket Eksklusif - Rp180.000',
            'wedding_date' => '2026-11-15',
            'groom_name' => 'Aurellia Keisha',
            'groom_fullname' => 'Aurellia Keisha Putri Handoko',
            'customer_name' => 'Bpk. Handoko',
            'customer_phone' => '081122334455',
            'events' => [
                [
                    'title' => 'VIP Red Carpet & Welcome Drink',
                    'date' => '2026-11-15',
                    'start_time' => '16:00 WIB',
                    'end_time' => '17:30 WIB',
                    'venue_name' => 'Foyer Glasshouse',
                    'address' => 'Jl. Senopati No. 45',
                    'maps_url' => 'https://maps.google.com'
                ],
                [
                    'title' => 'Gala Dinner & 17 Wishes Ceremony',
                    'date' => '2026-11-15',
                    'start_time' => '18:00 WIB',
                    'end_time' => '20:30 WIB',
                    'venue_name' => 'Main Diamond Hall',
                    'address' => 'Jl. Senopati No. 45',
                    'maps_url' => 'https://maps.google.com'
                ],
                [
                    'title' => 'After Party & Live DJ Performance',
                    'date' => '2026-11-15',
                    'start_time' => '20:30 WIB',
                    'end_time' => '23:00 WIB',
                    'venue_name' => 'Rooftop Lounge',
                    'address' => 'Jl. Senopati No. 45',
                    'maps_url' => 'https://maps.google.com'
                ]
            ]
        ]);

        $couple = Couple::where('groom_name', 'Aurellia Keisha')->first();
        $this->assertNotNull($couple);
        $this->createdCoupleIds[] = $couple->id;

        $this->assertEquals('Keluarga', $couple->bride_name);
        $events = Event::where('couple_id', $couple->id)->orderBy('sort_order')->get();
        $this->assertCount(3, $events);
        $this->assertEquals('VIP Red Carpet & Welcome Drink', $events[0]->title);
        $this->assertEquals('Gala Dinner & 17 Wishes Ceremony', $events[1]->title);
        $this->assertEquals('After Party & Live DJ Performance', $events[2]->title);
    }

    /**
     * 6. Test Base64 image fallback and automatic gallery showcase.
     */
    public function test_base64_image_fallback_and_gallery_showcase(): void
    {
        $tinyPng = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';

        $response = $this->post('/buat-undangan', [
            'category' => 'Pernikahan',
            'groom_name' => 'Dimas',
            'bride_name' => 'Anisa',
            'wedding_date' => '2026-10-10',
            'customer_name' => 'Dimas Pratama',
            'customer_phone' => '081300001111',
            'groom_photo_base64' => $tinyPng,
            'bride_photo_base64' => $tinyPng,
            'cover_photo_base64' => $tinyPng,
        ]);

        $couple = Couple::where('groom_name', 'Dimas')->where('bride_name', 'Anisa')->first();
        $this->assertNotNull($couple);
        $this->createdCoupleIds[] = $couple->id;

        $this->assertNotEmpty($couple->groom_photo);
        $this->assertNotEmpty($couple->bride_photo);
        $this->assertNotEmpty($couple->cover_photo);

        $this->uploadedStorageFiles[] = $couple->groom_photo;
        $this->uploadedStorageFiles[] = $couple->bride_photo;
        $this->uploadedStorageFiles[] = $couple->cover_photo;

        // Auto showcase to gallery
        $galleries = Gallery::where('couple_id', $couple->id)->get();
        $this->assertCount(3, $galleries);
        foreach ($galleries as $g) {
            $this->uploadedStorageFiles[] = $g->image;
        }
    }
}
