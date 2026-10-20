<?php

namespace Tests\Feature;

use App\Models\Couple;
use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\Wish;
use Tests\TestCase;

class WishAndRsvpTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        \Illuminate\Support\Facades\DB::purge('sqlite');
        \Illuminate\Support\Facades\DB::reconnect('sqlite');
    }

    public function test_wish_and_rsvp_submission_via_ajax_creates_both_records(): void
    {
        $couple = Couple::firstOrCreate(
            ['slug' => 'test-couple-rsvp'],
            [
                'groom_name' => 'Test Groom',
                'groom_fullname' => 'Test Groom Fullname',
                'bride_name' => 'Test Bride',
                'bride_fullname' => 'Test Bride Fullname',
                'category' => 'Pernikahan',
                'wedding_date' => '2026-12-12',
                'status' => 'published',
            ]
        );

        $guest = Guest::firstOrCreate(
            ['couple_id' => $couple->id, 'slug' => 'budi-test'],
            [
                'name' => 'Budi Test',
                'category' => 'VIP',
                'quota' => 2,
            ]
        );

        // Submit via AJAX / JSON
        $response = $this->postJson('/wish', [
            'couple_id' => $couple->id,
            'name' => 'Budi Test',
            'attendance' => 'hadir',
            'guest_count' => 2,
            'guest_slug' => 'budi-test',
            'message' => 'Selamat berbahagia selalu!',
            'category' => 'VIP',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        // Assert Wish record created
        $this->assertDatabaseHas('wishes', [
            'couple_id' => $couple->id,
            'name' => 'Budi Test',
            'message' => 'Selamat berbahagia selalu!',
        ]);

        // Assert RSVP record created with linked guest_id and correct pax count
        $this->assertDatabaseHas('rsvps', [
            'guest_id' => $guest->id,
            'name' => 'Budi Test',
            'attendance' => 'hadir',
            'guest_count' => 2,
        ]);

        // Cleanup
        Wish::where('name', 'Budi Test')->delete();
        Rsvp::where('name', 'Budi Test')->delete();
        $guest->delete();
        $couple->delete();
    }
}
