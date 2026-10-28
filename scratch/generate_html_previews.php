<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\TemplateManager;
use Carbon\Carbon;

$samples = [
    'formal-corporate' => [
        'name' => 'PT Nusantara Digital Solusindo',
        'heading' => 'GRAND LAUNCHING & STRATEGIC SUMMIT 2027',
        'venue' => 'Grand Ballroom Fairmont Jakarta',
        'address' => 'Jl. Asia Afrika No.8, Gelora, Jakarta Pusat',
        'quote' => 'Kolaborasi dan inovasi tanpa batas demi mewujudkan transformasi ekosistem digital berkelanjutan.',
        'bank' => 'Bank Mandiri Corporate',
        'acc' => '1400012345678',
        'holder' => 'PT Nusantara Digital Solusindo',
        'guest' => 'Dr. Ir. Bambang Sulistyo, M.M.'
    ],
    'rustic-coral-peach' => [
        'name' => 'Clarissa Aurelia Putri',
        'heading' => 'Sweet 17th Birthday Milestone Celebration',
        'venue' => 'The Glasshouse Garden Bistro & Cafe',
        'address' => 'Jl. Bukit Darmo Golf No. 10, Surabaya',
        'quote' => 'Melangkah ke babak baru penuh syukur, tawa bahagia, dan kehangatan bersama sahabat tersayang.',
        'bank' => 'BCA Digital',
        'acc' => '5271889201',
        'holder' => 'Clarissa Aurelia Putri',
        'guest' => 'Aurelia Syahrini & Family'
    ],
    'floral-midnight-navy' => [
        'name' => 'Komunitas Ekosistem Kreatif Nusantara (KEKN)',
        'heading' => 'Nocturne Botanical Innovation & Gala Night',
        'venue' => 'The Glasshouse Grand Sanctuary Langham',
        'address' => 'SCBD Lot 28, Senayan, Jakarta Selatan',
        'quote' => 'Kala malam menyulam keheningan, karya dedikasi mekar dalam harmoni untuk peradaban nusantara.',
        'bank' => 'Bank BNI Prioritas',
        'acc' => '0981122334',
        'holder' => 'Yayasan Presidium KEKN',
        'guest' => 'Menteri Pariwisata & Ekonomi Kreatif'
    ]
];

foreach ($samples as $key => $s) {
    $overrides = [
        'groom_name' => $s['name'],
        'event_heading' => $s['heading'],
        'wedding_date' => Carbon::now()->addMonths(2),
        'wedding_time' => '18:30 WIB',
        'venue_name' => $s['venue'],
        'venue_address' => $s['address'],
        'quote' => $s['quote'],
        'bank_name_1' => $s['bank'],
        'bank_name' => $s['bank'],
        'bank_account_1' => $s['acc'],
        'account_number' => $s['acc'],
        'bank_holder_1' => $s['holder'],
        'account_name' => $s['holder'],
        'events' => collect([
            (object)[
                'title' => 'VIP Welcoming & Red Carpet Reception',
                'date' => Carbon::now()->addMonths(2)->format('Y-m-d'),
                'start_time' => '18:30 WIB',
                'end_time' => '19:30 WIB',
                'venue_name' => 'Foyer Mezzanine',
                'address' => $s['address']
            ],
            (object)[
                'title' => 'Main Celebration Gala & Awarding Ceremony',
                'date' => Carbon::now()->addMonths(2)->format('Y-m-d'),
                'start_time' => '19:30 WIB',
                'end_time' => '22:00 WIB',
                'venue_name' => 'Grand Sanctuary Ballroom',
                'address' => 'Puncak acara dan jamuan santap malam eksklusif'
            ]
        ])
    ];

    $templateInfo = TemplateManager::get($key);
    $couple = TemplateManager::getDemoCouple($key, $overrides);
    $guest = (object)[
        'name' => $s['guest'],
        'slug' => 'tamu-vip',
        'category' => 'Tamu Kehormatan',
        'quota' => 2
    ];
    $wishes = collect([
        (object)['name' => 'Keluarga Besar Setyawan', 'message' => 'Selamat dan sukses selalu atas terselenggaranya acara istimewa ini!', 'attendance' => 'Hadir'],
        (object)['name' => 'Direksi Mitra Strategis', 'message' => 'Turut berbahagia, semoga semakin gemilang kedepannya!', 'attendance' => 'Hadir']
    ]);
    $isDemo = false;
    $isAdminPreview = false;
    $galleries = $couple->galleries ?? collect();

    $html = view($templateInfo['blade'], compact('couple', 'guest', 'wishes', 'isDemo', 'isAdminPreview', 'templateInfo', 'galleries'))->render();

    file_put_contents(__DIR__ . "/preview_{$key}.html", $html);
    echo "Generated preview_{$key}.html\n";
}
