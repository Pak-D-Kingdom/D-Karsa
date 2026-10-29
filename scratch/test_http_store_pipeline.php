<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;
use App\Models\Couple;

$timestamp = time();
$testSlug = 'uji-http-store-' . $timestamp;

$postData = [
    'category' => 'Ulang Tahun',
    'sub_category' => 'Sweet Seventeen',
    'selected_theme' => 'Sweet Seventeen - Editorial Cherry Blossom',
    'selected_package' => 'Paket Premium - Rp110.000',
    'event_heading' => 'CHERRY BLOSSOM 17TH BASH',
    'groom_name' => 'Aurellia Keisha',
    'groom_fullname' => 'Aurellia Keisha Pratama',
    'wedding_date' => '2026-12-15',
    'slug' => $testSlug,
    'customer_name' => 'Bunda Pratama',
    'customer_phone' => '081234567890',
    'quote' => 'Merayakan 17 tahun perjalanan penuh tawa dan kebahagiaan.',
    'bank_name_1' => 'BCA',
    'bank_account_1' => '5432109876',
    'bank_holder_1' => 'Aurellia Keisha',
    'events' => [
        [
            'title' => 'Pesta Tiup Lilin & Gala Dinner',
            'date' => '2026-12-15',
            'start_time' => '18:00',
            'end_time' => '21:00',
            'venue_name' => 'Grand Sakura Ballroom',
            'address' => 'Jl. Bunga Sakura No. 17, Jakarta Selatan',
            'maps_url' => 'https://maps.google.com/?q=GrandSakura',
        ],
        [
            'title' => 'After Party & Photo Session',
            'date' => '2026-12-15',
            'start_time' => '21:00',
            'end_time' => '23:00',
            'venue_name' => 'Rooftop Lounge Sakura',
            'address' => 'Lantai 5 Grand Sakura Ballroom',
            'maps_url' => 'https://maps.google.com/?q=GrandSakura',
        ]
    ]
];

echo "1. Simulating Form POST /buat-undangan...\n";
$request = Request::create('/buat-undangan', 'POST', $postData);
$session = app('session')->driver();
$session->start();
$request->setLaravelSession($session);
$response = app(\App\Http\Controllers\InvitationController::class)->store($request);

echo "   HTTP Response Status: " . $response->getStatusCode() . "\n";
echo "   Redirect Location: " . $response->headers->get('Location') . "\n";

$couple = Couple::where('slug', $testSlug)->with('events')->first();
if (!$couple) {
    echo "ERROR: Couple record was not created!\n";
    exit(1);
}

echo "2. Validating Stored Data in Database...\n";
echo "   - ID: " . $couple->id . "\n";
echo "   - Slug: " . $couple->slug . "\n";
echo "   - Category: " . $couple->category . "\n";
echo "   - Theme: " . $couple->theme . "\n";
echo "   - Heading: " . $couple->event_heading . "\n";
echo "   - Celebrant Name: " . $couple->groom_name . "\n";
echo "   - Event Count: " . $couple->events->count() . "\n";
foreach ($couple->events as $i => $ev) {
    echo "     Event " . ($i + 1) . ": " . $ev->title . " @ " . $ev->venue_name . "\n";
}

// Publish for viewing
$couple->update(['status' => 'published']);

echo "3. Simulating GET /undangan/{$testSlug}...\n";
$viewRequest = Request::create("/undangan/{$testSlug}", 'GET');
$viewResponse = $kernel->handle($viewRequest);
$html = $viewResponse->getContent();

$foundName = str_contains($html, 'Aurellia Keisha');
$foundHeading = str_contains($html, 'CHERRY BLOSSOM 17TH BASH');
$foundEvent1 = str_contains($html, 'Pesta Tiup Lilin & Gala Dinner');
$foundEvent2 = str_contains($html, 'After Party & Photo Session');
$foundVenue1 = str_contains($html, 'Grand Sakura Ballroom');
$foundVenue2 = str_contains($html, 'Rooftop Lounge Sakura');
$foundBank = str_contains($html, '5432109876');

echo "4. Checking Rendered View Output:\n";
echo "   - Celebrant Name: " . ($foundName ? "MATCHED" : "FAIL") . "\n";
echo "   - Heading: " . ($foundHeading ? "MATCHED" : "FAIL") . "\n";
echo "   - Event 1: " . ($foundEvent1 ? "MATCHED" : "FAIL") . "\n";
echo "   - Event 2: " . ($foundEvent2 ? "MATCHED" : "FAIL") . "\n";
echo "   - Venue 1: " . ($foundVenue1 ? "MATCHED" : "FAIL") . "\n";
echo "   - Venue 2: " . ($foundVenue2 ? "MATCHED" : "FAIL") . "\n";
echo "   - Bank Account: " . ($foundBank ? "MATCHED" : "FAIL") . "\n";

echo "5. Deleting Test Data from Database...\n";
$couple->events()->delete();
$couple->delete();

$stillExists = Couple::where('slug', $testSlug)->exists();
echo "6. Confirming deletion: " . (!$stillExists ? "SUCCESSFULLY WIPED OUT" : "FAILED TO DELETE") . "\n";
