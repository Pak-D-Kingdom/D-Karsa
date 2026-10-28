<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;
use App\Http\Controllers\InvitationController;

$controller = new InvitationController();

$cases = [
    [
        'slug' => 'formal-corporate',
        'params' => [
            'groom_name' => 'PT Sinarmas Digital Tech',
            'event_heading' => 'GRAND LAUNCHING & ANNUAL PARTNER SUMMIT 2027',
            'wedding_date' => '2027-10-15',
            'wedding_time' => '09:00 WIB',
            'venue_name' => 'Grand Ballroom Fairmont Jakarta',
            'quote' => 'Membangun sinergi tanpa batas bersama seluruh ekosistem mitra terbaik kami di Indonesia.',
            'bank_name_1' => 'Bank Mandiri Corporate',
            'bank_account_1' => '1400012345678',
            'bank_holder_1' => 'PT Sinarmas Digital Tech',
            'to' => 'Dr. Bambang Sulistyo',
            'events_json' => json_encode([
                [
                    'title' => 'Executive Coffee & Networking',
                    'date' => '2027-10-15',
                    'start_time' => '09:00 WIB',
                    'end_time' => '10:00 WIB',
                    'venue_name' => 'Foyer Mezzanine',
                    'address' => 'Jl. Asia Afrika No.8, Gelora, Tanah Abang, Jakarta Pusat'
                ],
                [
                    'title' => 'Keynote Presentation & Strategic MoU',
                    'date' => '2027-10-15',
                    'start_time' => '10:00 WIB',
                    'end_time' => '12:30 WIB',
                    'venue_name' => 'Main Stage Ballroom',
                    'address' => 'Sesi utama peresmian platform dan penandatanganan kesepakatan'
                ]
            ])
        ],
        'asserts' => [
            'PT Sinarmas Digital Tech',
            'GRAND LAUNCHING & ANNUAL PARTNER SUMMIT 2027',
            'Fairmont Jakarta',
            'Membangun sinergi tanpa batas',
            '1400012345678',
            'Dr. Bambang Sulistyo',
            'Executive Coffee & Networking',
            'Keynote Presentation & Strategic MoU'
        ]
    ],
    [
        'slug' => 'rustic-coral-peach',
        'params' => [
            'groom_name' => 'Chelsea Olivia Natasya',
            'event_heading' => 'Chelsea Sweet 17th Fiesta',
            'wedding_date' => '2027-09-20',
            'wedding_time' => '17:30 WIB',
            'venue_name' => 'The Glasshouse Garden Bistro',
            'quote' => '17 tahun penuh syukur, keceriaan, dan cinta tak terhingga bersama kalian.',
            'bank_name_1' => 'BCA Digital',
            'bank_account_1' => '5520991122',
            'bank_holder_1' => 'Chelsea Olivia Natasya',
            'to' => 'Aurelia & Family',
            'events_json' => json_encode([
                [
                    'title' => 'Sunset Mocktail & Photo Booth',
                    'date' => '2027-09-20',
                    'start_time' => '17:30 WIB',
                    'end_time' => '18:30 WIB',
                    'venue_name' => 'Garden Patio',
                    'address' => 'Jl. Bukit Darmo Golf No. 10, Surabaya'
                ],
                [
                    'title' => 'Birthday Dinner & Candle Blowing',
                    'date' => '2027-09-20',
                    'start_time' => '19:00 WIB',
                    'end_time' => '21:00 WIB',
                    'venue_name' => 'Indoor Dining Hall',
                    'address' => 'Acara tiup lilin ke-17 dan makan malam bersama teman-teman'
                ]
            ])
        ],
        'asserts' => [
            'Chelsea Olivia Natasya',
            'Chelsea Sweet 17th Fiesta',
            'The Glasshouse Garden Bistro',
            '17 tahun penuh syukur',
            '5520991122',
            'Aurelia & Family',
            'Sunset Mocktail & Photo Booth',
            'Birthday Dinner & Candle Blowing'
        ]
    ],
    [
        'slug' => 'floral-midnight-navy',
        'params' => [
            'groom_name' => 'Asosiasi Startup Nusantara (ASN)',
            'bride_name' => 'Prof. Dr. Irwan Susanto',
            'event_heading' => 'Nocturne Botanical Innovation Night',
            'wedding_date' => '2027-11-10',
            'wedding_time' => '18:30 WIB',
            'venue_name' => 'The Langham Ballroom',
            'quote' => 'Menatap masa depan teknologi dan keanekaragaman hayati nusantara.',
            'bank_name_1' => 'Bank Mandiri',
            'bank_account_1' => '112233445566',
            'bank_holder_1' => 'Yayasan Startup Nusantara',
            'to' => 'Menteri Komunikasi dan Digital RI',
            'events_json' => json_encode([
                [
                    'title' => 'Welcoming Cocktail & VIP Registration',
                    'date' => '2027-11-10',
                    'start_time' => '18:30 WIB',
                    'end_time' => '19:30 WIB',
                    'venue_name' => 'Foyer Lobby',
                    'address' => 'SCBD Lot 28, Senayan, Jakarta Selatan'
                ],
                [
                    'title' => 'Startup Excellence Awarding Night',
                    'date' => '2027-11-10',
                    'start_time' => '19:30 WIB',
                    'end_time' => '22:00 WIB',
                    'venue_name' => 'Grand Botanical Stage',
                    'address' => 'Malam penganugerahan startup terbaik nasional'
                ]
            ])
        ],
        'asserts' => [
            'Asosiasi Startup Nusantara (ASN)',
            'Prof. Dr. Irwan Susanto',
            'Nocturne Botanical Innovation Night',
            'The Langham Ballroom',
            'Menatap masa depan teknologi',
            '112233445566',
            'Menteri Komunikasi dan Digital RI',
            'Welcoming Cocktail & VIP Registration',
            'Startup Excellence Awarding Night'
        ]
    ],
    [
        'slug' => 'arctic-frost',
        'params' => [
            'groom_name' => 'Adrian Pratama',
            'event_heading' => 'The 17th Glacial Executive Milestone',
            'wedding_date' => '2027-12-05',
            'wedding_time' => '18:00 WIB',
            'venue_name' => 'Glacial Crystal Hall Kempinski',
            'quote' => 'Langkah awal kepemimpinan muda berintegritas tinggi.',
            'bank_name_1' => 'BCA Priority',
            'bank_account_1' => '8899001122',
            'bank_holder_1' => 'Adrian Pratama',
            'to' => 'Jajaran Dewan Direksi & Rekan',
            'events_json' => json_encode([
                [
                    'title' => 'VIP Red Carpet & Crystal Welcoming',
                    'date' => '2027-12-05',
                    'start_time' => '18:00 WIB',
                    'end_time' => '19:00 WIB',
                    'venue_name' => 'Crystal Foyer',
                    'address' => 'Hotel Indonesia Kempinski Jakarta'
                ],
                [
                    'title' => 'Executive Gala & Celebration Dinner',
                    'date' => '2027-12-05',
                    'start_time' => '19:00 WIB',
                    'end_time' => '21:30 WIB',
                    'venue_name' => 'Grand Glacial Ballroom',
                    'address' => 'Perayaan puncak malam kedewasaan dan jamuan eksekutif'
                ]
            ])
        ],
        'asserts' => [
            'Adrian Pratama',
            'The 17th Glacial Executive Milestone',
            'Glacial Crystal Hall Kempinski',
            'Langkah awal kepemimpinan muda',
            '8899001122',
            'Jajaran Dewan Direksi & Rekan',
            'VIP Red Carpet & Crystal Welcoming',
            'Executive Gala & Celebration Dinner'
        ]
    ]
];

$allPassed = true;
foreach ($cases as $c) {
    echo "========================================================\n";
    echo "Testing Controller demoTemplate for: {$c['slug']}\n";
    echo "========================================================\n";

    $req = Request::create('/demo/' . $c['slug'] . '?' . http_build_query($c['params']), 'GET');
    $res = $controller->demoTemplate($req, $c['slug']);
    $html = $res->render();
    $decodedHtml = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    foreach ($c['asserts'] as $text) {
        $hasText = str_contains($decodedHtml, $text);
        if ($hasText) {
            echo "  [PASS] Found: '{$text}'\n";
        } else {
            echo "  [FAIL] Missing: '{$text}'\n";
            $allPassed = false;
        }
    }
    echo "\n";
}

if ($allPassed) {
    echo "ALL CONTROLLER DEMO TESTS PASSED PERFECTLY!\n";
} else {
    echo "SOME CONTROLLER DEMO TESTS FAILED!\n";
    exit(1);
}
