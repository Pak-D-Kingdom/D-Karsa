<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\TemplateManager;
use Carbon\Carbon;

$templatesToTest = [
    'formal-corporate' => 'Korporat Profesional & Grand Opening',
    'rustic-coral-peach' => 'Rustic Coral & Peach (Ulang Tahun)',
    'floral-midnight-navy' => 'Floral Midnight Navy (Acara Formal)',
    'arctic-frost' => 'Korporat Profesional Arctic Frost (Ulang Tahun / Formal)',
];

$results = [];

foreach ($templatesToTest as $key => $label) {
    echo "========================================================\n";
    echo "Testing Template: {$key} ({$label})\n";
    echo "========================================================\n";

    $customGroom = "CUSTOM_NAME_{$key}";
    $customHeading = "CUSTOM_HEADING_{$key}";
    $customDate = Carbon::create(2027, 8, 15, 14, 30);
    $customTime = "14:30 WIB";
    $customVenue = "CUSTOM_VENUE_{$key}";
    $customAddress = "CUSTOM_ADDR_{$key}_STREET_99";
    $customQuote = "CUSTOM_QUOTE_{$key}_INSPIRATION";
    $customBankName = "BANK_TEST_{$key}";
    $customBankAcc = "7788990011";
    $customBankHolder = "HOLDER_{$key}";
    $customGiftAddress = "GIFT_SECRETARIAT_{$key}";
    $customGuestName = "VIP_GUEST_{$key}";

    $customEvents = collect([
        (object)[
            'title' => "EV1_TITLE_{$key}",
            'date' => '2027-08-15',
            'start_time' => '14:30 WIB',
            'end_time' => '16:00 WIB',
            'venue_name' => "SESI_1_{$key}",
            'address' => $customAddress,
            'sort_order' => 1
        ],
        (object)[
            'title' => "EV2_TITLE_{$key}",
            'date' => '2027-08-15',
            'start_time' => '17:00 WIB',
            'end_time' => '19:30 WIB',
            'venue_name' => "SESI_2_{$key}",
            'address' => "EV2_DESC_{$key}",
            'sort_order' => 2
        ]
    ]);

    $customGalleries = collect([
        (object)['image' => "https://example.com/gallery1_{$key}.jpg", 'caption' => "CAPTION_1_{$key}"],
        (object)['image' => "https://example.com/gallery2_{$key}.jpg", 'caption' => "CAPTION_2_{$key}"],
    ]);

    $overrides = [
        'groom_name' => $customGroom,
        'groom_fullname' => $customGroom . ' Fullname',
        'event_heading' => $customHeading,
        'wedding_date' => $customDate,
        'wedding_time' => $customTime,
        'venue_name' => $customVenue,
        'venue_address' => $customAddress,
        'quote' => $customQuote,
        'bank_name_1' => $customBankName,
        'bank_name' => $customBankName,
        'bank_account_1' => $customBankAcc,
        'account_number' => $customBankAcc,
        'bank_holder_1' => $customBankHolder,
        'account_name' => $customBankHolder,
        'gift_address' => $customGiftAddress,
        'events' => $customEvents,
        'galleries' => $customGalleries,
    ];

    $templateInfo = TemplateManager::get($key);
    $couple = TemplateManager::getDemoCouple($key, $overrides);
    $guest = (object)[
        'name' => $customGuestName,
        'slug' => 'vip-guest',
        'category' => 'VIP',
        'quota' => 2
    ];
    $wishes = collect([]);
    $isDemo = true;
    $isAdminPreview = false;
    $galleries = $customGalleries;

    try {
        $html = view($templateInfo['blade'], compact('couple', 'guest', 'wishes', 'isDemo', 'isAdminPreview', 'templateInfo', 'galleries'))->render();

        $checks = [
            'Nama Penyelenggara/Mempelai (groom_name)' => str_contains($html, $customGroom),
            'Judul/Header Acara (event_heading)' => str_contains($html, $customHeading),
            'Tanggal Acara Terformat (wedding_date: 15 Agustus 2027)' => str_contains($html, '15 Agustus 2027'),
            'Waktu Acara (wedding_time: 14:30)' => str_contains($html, '14:30'),
            'Nama Lokasi/Venue (venue_name)' => str_contains($html, $customVenue),
            'Alamat Lokasi (venue_address)' => str_contains($html, $customAddress),
            'Sambutan / Quote (quote)' => str_contains($html, $customQuote),
            'Nama Bank (bank_name_1)' => str_contains($html, $customBankName),
            'Nomor Rekening (bank_account_1)' => str_contains($html, $customBankAcc),
            'Atas Nama Rekening (bank_holder_1)' => str_contains($html, $customBankHolder),
            'Nama Tamu Undangan (guest->name)' => str_contains($html, $customGuestName),
            'Custom Event 1 Title' => str_contains($html, "EV1_TITLE_{$key}"),
            'Custom Event 2 Title' => str_contains($html, "EV2_TITLE_{$key}"),
            'Custom Gallery Image 1' => str_contains($html, "gallery1_{$key}.jpg"),
        ];

        $results[$key] = $checks;

        foreach ($checks as $item => $passed) {
            echo ($passed ? "  [PASS] " : "  [FAIL] ") . $item . "\n";
        }
    } catch (\Throwable $e) {
        echo "  [ERROR] Render failed: " . $e->getMessage() . "\n";
        $results[$key] = ['ERROR' => $e->getMessage()];
    }
    echo "\n";
}
