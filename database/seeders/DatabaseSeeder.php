<?php

namespace Database\Seeders;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Filament
        User::firstOrCreate(
            ['email' => 'admin@undangan.test'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Couple demo
        $couple = Couple::firstOrCreate(
            ['slug' => 'd-karsa'],
            [
                'groom_name' => "D'Karsa",
                'groom_fullname' => "D'Karsa Digital",
                'groom_father' => 'Bapak Hendra',
                'groom_mother' => 'Ibu Siti Aminah',
                'bride_name' => 'Wedding',
                'bride_fullname' => "D'Karsa Wedding",
                'bride_father' => 'Bapak Bambang',
                'bride_mother' => 'Ibu Rina Wati',
                'wedding_date' => now()->addMonths(2)->toDateString(),
                'venue_name' => 'Gedung Serbaguna Bahagia, Jakarta Selatan',
                'quote' => 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya. — QS. Ar-Rum: 21',
            ]
        );

        // Events
        if ($couple->events()->count() === 0) {
            Event::create([
                'couple_id' => $couple->id,
                'title' => 'Akad Nikah',
                'date' => $couple->wedding_date,
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'venue_name' => 'Masjid Agung Al-Azhar, Jakarta',
                'address' => 'Jl. Sisingamangaraja No.1, Kebayoran Baru, Jakarta Selatan',
                'maps_url' => 'https://maps.google.com/?q=Masjid+Agung+Al-Azhar+Jakarta',
                'sort_order' => 1,
            ]);
            Event::create([
                'couple_id' => $couple->id,
                'title' => 'Resepsi',
                'date' => $couple->wedding_date,
                'start_time' => '11:00:00',
                'end_time' => '14:00:00',
                'venue_name' => 'Gedung Serbaguna Bahagia, Jakarta Selatan',
                'address' => 'Jl. Bahagia No. 88, Jakarta Selatan',
                'maps_url' => 'https://maps.google.com/?q=Gedung+Serbaguna+Bahagia+Jakarta',
                'sort_order' => 2,
            ]);
        }

        // Guests demo
        if (Guest::count() < 5) {
            $guests = [
                ['name' => 'Bapak Joko & Keluarga', 'category' => 'Keluarga', 'address' => 'Jakarta'],
                ['name' => 'Sahabat SMA', 'category' => 'Teman', 'address' => 'Bekasi'],
                ['name' => 'Rekan Kantor', 'category' => 'Rekan Kerja', 'address' => 'Tangerang'],
                ['name' => 'Keluarga Besar', 'category' => 'Keluarga', 'address' => 'Bogor'],
                ['name' => 'Teman Kuliah', 'category' => 'Teman', 'address' => 'Depok'],
            ];
            foreach ($guests as $g) {
                Guest::firstOrCreate(['name' => $g['name']], array_merge($g, ['couple_id' => $couple->id, 'quota' => 2]));
            }
        }

        // Wishes demo
        if (Wish::count() === 0) {
            Wish::create(['name' => 'Ahmad & Siti', 'message' => "Selamat menempuh hidup baru bersama D'Karsa! Semoga menjadi keluarga sakinah mawaddah warahmah 🤲", 'is_approved' => true]);
            Wish::create(['name' => 'Keluarga Budi', 'message' => 'Barakallah! Semoga pernikahannya berkah dan langgeng sampai kakek nenek! 🎉', 'is_approved' => true]);
            Wish::create(['name' => 'Sahabat Terbaik', 'message' => 'Finally! Akhirnya resmi juga kalian berdua. Bahagia selalu ya! ❤️', 'is_approved' => true]);
        }

        // Gallery placeholder (picsum)
        if (Gallery::count() === 0) {
            for ($i = 1; $i <= 6; $i++) {
                // keep image path for Filament, but placeholder URL won't resolve via Storage; use external url handled in view fallback
                // so we just skip filling if directory empty - view will show picsum fallback
            }
        }
    }
}
