<?php

namespace Tests\Feature;

use Tests\TestCase;

class PreviewDoubleEventTest extends TestCase
{
    public function test_dua_acara_dari_pratinjau_tampil_semua(): void
    {
        config(['cache.default' => 'array']);

        $events = [
            ['title' => 'Akad Nikah', 'date' => '2026-11-14', 'start_time' => '08:00', 'end_time' => '10:00', 'venue_name' => 'Masjid Agung', 'address' => 'Jl. Ketintang'],
            ['title' => 'Resepsi Pernikahan', 'date' => '2026-11-14', 'start_time' => '11:00', 'end_time' => '14:00', 'venue_name' => 'Gedung Serbaguna', 'address' => 'Jl. Dukuh Kupang'],
        ];

        $response = $this->postJson('/demo/tautan', [
            'template_key' => 'minimalis-lumen',
            'params' => [
                'preview' => '1',
                'tier' => 'eksklusif',
                'category' => 'Pernikahan',
                'groom_name' => 'Arya',
                'bride_name' => 'Kinanthi',
                'events_json' => json_encode($events),
                'event_1_title' => 'Akad Nikah',
                'event_2_title' => 'Resepsi Pernikahan',
            ],
        ])->assertOk();

        $path = parse_url($response->json('url'), PHP_URL_PATH);

        $this->get($path)
            ->assertOk()
            ->assertSee('AKAD NIKAH', false)
            ->assertSee('RESEPSI PERNIKAHAN', false);
    }
}
