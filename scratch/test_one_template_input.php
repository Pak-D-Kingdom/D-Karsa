<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Services\TemplateManager;

$templateKey = 'batak-heritage';
$template = TemplateManager::get($templateKey);

$slug = 'test-uji-' . $templateKey . '-' . time();
$groomName = 'NamaUji_' . $templateKey;
$brideName = 'PartnerUji_' . $templateKey;
$heading = 'JUDUL_UJI_' . strtoupper(str_replace('-', '_', $templateKey));
$eventVenue = 'GedungVenueSatu_' . $templateKey;
$eventTitle = 'AcaraSatu_' . $templateKey;

echo "1. Creating test Couple in database...\n";
$couple = Couple::create([
    'slug' => $slug,
    'category' => $template['category'],
    'theme' => $template['name'],
    'status' => 'published',
    'package_name' => $template['package'] ?? 'Paket Premium',
    'amount' => 110000,
    'customer_name' => 'Tester D-Karsa',
    'customer_phone' => '081234567890',
    'event_heading' => $heading,
    'groom_name' => $groomName,
    'groom_fullname' => $groomName . ' Full',
    'bride_name' => $brideName,
    'bride_fullname' => $brideName . ' Full',
    'wedding_date' => '2026-11-25',
    'quote' => 'Kutipan Uji Momen Berharga',
    'cover_photo' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200',
    'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600',
    'bride_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600',
    'bank_name_1' => 'BCA',
    'bank_account_1' => '1234567890',
    'bank_holder_1' => 'Tester Rekening',
]);

echo "2. Creating test Events...\n";
Event::create([
    'couple_id' => $couple->id,
    'title' => $eventTitle,
    'date' => '2026-11-25',
    'start_time' => '09:00',
    'end_time' => '11:00',
    'venue_name' => $eventVenue,
    'address' => 'Jl. Pengujian No. 123',
    'sort_order' => 1
]);

$couple->load(['events', 'galleries', 'wishes']);

echo "3. Rendering Blade View: {$template['blade']}...\n";
$guest = (object)[
    'name' => 'TamuUji_' . $templateKey,
    'slug' => 'tamu-uji',
    'category' => 'Tamu Kehormatan',
    'quota' => 2
];
$wishes = collect([]);
$isAdminPreview = false;
$isDemo = false;
$galleries = $couple->galleries;

$html = view($template['blade'], compact('couple', 'guest', 'wishes', 'isAdminPreview', 'template', 'isDemo', 'galleries'))->render();

$foundGroom = str_contains($html, $groomName);
$foundBride = str_contains($html, $brideName);
$foundHeading = str_contains($html, $heading);
$foundEventTitle = str_contains($html, $eventTitle);
$foundEventVenue = str_contains($html, $eventVenue);

echo "Verification results:\n";
echo "  - Groom Name ($groomName): " . ($foundGroom ? "MATCHED" : "NOT FOUND") . "\n";
echo "  - Bride Name ($brideName): " . ($foundBride ? "MATCHED" : "NOT FOUND") . "\n";
echo "  - Heading ($heading): " . ($foundHeading ? "MATCHED" : "NOT FOUND") . "\n";
echo "  - Event Title ($eventTitle): " . ($foundEventTitle ? "MATCHED" : "NOT FOUND") . "\n";
echo "  - Event Venue ($eventVenue): " . ($foundEventVenue ? "MATCHED" : "NOT FOUND") . "\n";

echo "4. Deleting test Couple and related records from database...\n";
$couple->events()->delete();
$couple->delete();

$stillExists = Couple::where('slug', $slug)->exists();
echo "5. Checking database: " . ($stillExists ? "ERROR: Record still exists!" : "CONFIRMED: Record successfully deleted from DB!") . "\n";
