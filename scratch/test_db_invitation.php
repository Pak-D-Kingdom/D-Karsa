<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Http\Controllers\InvitationController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

$controller = new InvitationController();

$cases = [
    [
        'theme' => 'Executive Corporate & Grand Opening',
        'category' => 'Acara Formal',
        'sub_category' => 'Grand opening & gala dinner',
        'groom_name' => 'PT Astra Mega Ventura',
        'event_heading' => 'ASTRA DIGITAL VENTURES INAUGURATION',
        'venue_name' => 'Menara Astra Grand Hall Lt. 55',
        'quote' => 'Menyongsong peradaban teknologi masa depan dengan fondasi integritas.',
        'bank_name_1' => 'Bank Mandiri',
        'bank_account_1' => '1230044556677',
        'bank_holder_1' => 'PT Astra Mega Ventura',
        'events' => [
            ['title' => 'VIP Ribbon Cutting & Press Room', 'start_time' => '08:30 WIB', 'end_time' => '10:00 WIB', 'venue_name' => 'Level 55 Foyer', 'address' => 'Jl. Jend. Sudirman Kav. 5-6, Jakarta Pusat'],
            ['title' => 'Venture Showcase & Partner Banquet', 'start_time' => '10:00 WIB', 'end_time' => '13:00 WIB', 'venue_name' => 'Auditorium Hall', 'address' => 'Gala santap siang bersama investor']
        ]
    ],
    [
        'theme' => 'Rustic Coral & Peach - Sweet 17th Birthday',
        'category' => 'Ulang Tahun',
        'sub_category' => 'Sweet seventeen',
        'groom_name' => 'Nabila Syakira Putri',
        'event_heading' => 'Nabila 17th Golden Milestone',
        'venue_name' => 'The Rustic Pavilion Garden',
        'quote' => 'Terima kasih atas segala cinta, tawa, dan kenangan indah sepanjang 17 tahun ini.',
        'bank_name_1' => 'Bank Central Asia',
        'bank_account_1' => '8219901234',
        'bank_holder_1' => 'Nabila Syakira Putri',
        'events' => [
            ['title' => 'Garden Sunset & Cocktail', 'start_time' => '16:30 WIB', 'end_time' => '18:00 WIB', 'venue_name' => 'Main Lawn', 'address' => 'Jl. Raya Darmo Harapan No. 7, Surabaya'],
            ['title' => 'Sweet Seventeen Celebration Gala', 'start_time' => '18:30 WIB', 'end_time' => '21:00 WIB', 'venue_name' => 'Glass Pavillion', 'address' => 'Pesta tiup lilin dan makan malam']
        ]
    ],
    [
        'theme' => 'Floral Midnight Navy - Acara Komunitas',
        'category' => 'Acara Formal',
        'sub_category' => 'Acara komunitas',
        'groom_name' => 'Ikatan Alumni Desain Grafis Indonesia',
        'bride_name' => 'Prof. Anindya Baskoro',
        'event_heading' => 'Nocturne Graphic Art & Community Gala',
        'venue_name' => 'National Art Gallery Foyer',
        'quote' => 'Menghidupkan estetika visual yang berdampak bagi peradaban dunia.',
        'bank_name_1' => 'Bank BNI',
        'bank_account_1' => '0981122334',
        'bank_holder_1' => 'IADGI Pusat',
        'events' => [
            ['title' => 'Exhibition Tour & Red Carpet', 'start_time' => '18:00 WIB', 'end_time' => '19:30 WIB', 'venue_name' => 'Galeri Utama', 'address' => 'Jl. Medan Merdeka Timur No. 14, Jakarta Pusat'],
            ['title' => 'Designer of the Year Awards', 'start_time' => '19:30 WIB', 'end_time' => '22:00 WIB', 'venue_name' => 'Amphitheater Hall', 'address' => 'Penganugerahan trofi desainer terbaik']
        ]
    ],
    [
        'theme' => 'Korporat Profesional Arctic Frost - Sweet 17th Birthday',
        'category' => 'Ulang Tahun',
        'sub_category' => 'Sweet seventeen',
        'groom_name' => 'Nicholas Alexander',
        'event_heading' => 'The 17th Glacial Executive Milestone',
        'venue_name' => 'The Glacial Horizon Kempinski',
        'quote' => 'Kedewasaan adalah permulaan komitmen untuk menciptakan karya besar.',
        'bank_name_1' => 'Bank Mandiri Prioritas',
        'bank_account_1' => '1190022334455',
        'bank_holder_1' => 'Nicholas Alexander',
        'events' => [
            ['title' => 'Frost VIP Welcoming & Lanyard Pass', 'start_time' => '18:00 WIB', 'end_time' => '19:00 WIB', 'venue_name' => 'Horizon Lounge', 'address' => 'Grand Indonesia West Mall, Jakarta Pusat'],
            ['title' => 'Milestone Banquet & Keynote', 'start_time' => '19:00 WIB', 'end_time' => '21:30 WIB', 'venue_name' => 'Grand Crystal Ballroom', 'address' => 'Jamuan santap malam eksekutif']
        ]
    ]
];

\Illuminate\Support\Facades\DB::beginTransaction();

try {
    foreach ($cases as $c) {
        echo "========================================================\n";
        echo "Testing Stored DB Invitation: {$c['theme']}\n";
        echo "========================================================\n";

        $slug = 'test-' . Str::slug($c['groom_name']) . '-' . rand(1000, 9999);

        $couple = Couple::create([
            'slug' => $slug,
            'category' => $c['category'],
            'sub_category' => $c['sub_category'],
            'theme' => $c['theme'],
            'package_name' => 'Paket Premium - Rp110.000',
            'event_heading' => $c['event_heading'],
            'groom_name' => $c['groom_name'],
            'groom_fullname' => $c['groom_name'] . ' S.T.',
            'bride_name' => $c['bride_name'] ?? 'Keluarga Besar',
            'bride_fullname' => $c['bride_fullname'] ?? 'Keluarga Besar',
            'wedding_date' => now()->addDays(30),
            'venue_name' => $c['venue_name'],
            'quote' => $c['quote'],
            'bank_name_1' => $c['bank_name_1'],
            'bank_account_1' => $c['bank_account_1'],
            'bank_holder_1' => $c['bank_holder_1'],
            'status' => 'published',
            'customer_name' => 'Tester Fonda',
            'customer_phone' => '081234567890',
            'amount' => 110000,
            'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
            'payment_status' => 'paid',
        ]);

        foreach ($c['events'] as $i => $ev) {
            Event::create([
                'couple_id' => $couple->id,
                'title' => $ev['title'],
                'date' => now()->addDays(30)->toDateString(),
                'start_time' => $ev['start_time'],
                'end_time' => $ev['end_time'],
                'venue_name' => $ev['venue_name'],
                'address' => $ev['address'],
                'sort_order' => $i + 1
            ]);
        }

        $req = Request::create('/' . $slug, 'GET', ['to' => 'Tamu Kehormatan VIP']);
        $res = $controller->showInvitation($req, $slug);
        $html = $res->render();
        $decoded = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $asserts = [
            $c['groom_name'],
            $c['event_heading'],
            $c['venue_name'],
            $c['quote'],
            $c['bank_account_1'],
            $c['events'][0]['title'],
            $c['events'][1]['title']
        ];

        foreach ($asserts as $val) {
            if (str_contains($decoded, $val)) {
                echo "  [PASS] Stored data found: '{$val}'\n";
            } else {
                echo "  [FAIL] Stored data missing: '{$val}'\n";
                throw new \Exception("Assertion failed for: {$val}");
            }
        }
        echo "\n";
    }

    echo "ALL STORED DB INVITATIONS RENDERED PERFECTLY!\n";
} finally {
    \Illuminate\Support\Facades\DB::rollBack();
}
