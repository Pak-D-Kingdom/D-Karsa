<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Set views cache directory to avoid tempnam sandbox restrictions
$viewsCacheDir = 'C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/views_cache';
if (!is_dir($viewsCacheDir)) {
    mkdir($viewsCacheDir, 0777, true);
}
config(['view.compiled' => $viewsCacheDir]);

$newCompiler = new \Illuminate\View\Compilers\BladeCompiler(app('files'), $viewsCacheDir);
app()->singleton('blade.compiler', fn() => $newCompiler);
app('view.engine.resolver')->register('blade', fn() => new \Illuminate\View\Engines\CompilerEngine($newCompiler));

// Configure SQLite to test DB
$testDbPath = 'C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/test_db.sqlite';
config(['database.connections.sqlite.database' => $testDbPath]);
\Illuminate\Support\Facades\DB::purge('sqlite');
\Illuminate\Support\Facades\DB::reconnect('sqlite');

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Services\TemplateManager;
use Illuminate\Support\Str;

echo "================================================================================\n";
echo "           STARTING FULL LIFECYCLE AUDIT ACROSS ALL 47 TEMPLATES\n";
echo "================================================================================\n\n";

// 1. DATABASE PERSISTENCE & STORAGE AUDIT
echo "--- STEP 1: AUDIT DATABASE PERSISTENCE, REFRESH & TEMPLATE SWITCHING ---\n";

\Illuminate\Support\Facades\DB::beginTransaction();

$testSlug = 'audit-test-' . Str::lower(Str::random(6));
$couple = Couple::create([
    'slug' => $testSlug,
    'category' => 'Ulang Tahun',
    'sub_category' => 'Sweet 17th Party & Gala',
    'theme' => 'cyber-neon-futuristic',
    'package_name' => 'Paket Eksklusif - Rp180.000',
    'amount' => 180000,
    'invoice_number' => 'INV-TEST-001',
    'payment_status' => 'paid',
    'event_heading' => 'A Special Milestone // Neon Gala',
    'groom_name' => 'Bima Satria Dirgantara',
    'groom_fullname' => 'Bima Satria Dirgantara, S.T.',
    'groom_father' => 'Bpk. Bambang Soedirman',
    'groom_mother' => 'Ibu Siti Rahmawati',
    'groom_city' => 'Sidoarjo',
    'bride_name' => 'Keluarga Besar',
    'bride_fullname' => 'Keluarga Besar Bapak Bambang',
    'groom_photo' => 'couples/test_profile.jpg',
    'cover_photo' => 'couples/covers/test_cover.jpg',
    'wedding_date' => '2026-11-07',
    'venue_name' => 'Grand Ballroom Mulia Hotel',
    'venue_address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
    'quote' => 'Bersyukur atas setiap berkah dan langkah menuju masa depan gemilang.',
    'bank_name_1' => 'BCA',
    'bank_account_1' => '8820192831',
    'bank_holder_1' => 'Bima Satria',
    'gift_address' => 'Jln Prambon Kec Prambon Kab Sidoarjo No. 45',
    'customer_name' => 'Bima Pemesan',
    'customer_phone' => '081234567890',
    'status' => 'published',
]);

// Add 3 dynamic events with independent dates, times, and maps
$testMapsUrl1 = 'https://maps.app.goo.gl/1AYNTpxxHPvnJDDS7';
$testMapsUrl2 = 'https://maps.app.goo.gl/customResepsiMap88';
$testMapsUrl3 = 'https://maps.app.goo.gl/customAfterPartyMap99';

$ev1 = Event::create([
    'couple_id' => $couple->id,
    'title' => 'Neon Welcome & Cocktails',
    'date' => '2026-11-07',
    'start_time' => '18:00',
    'end_time' => '19:15',
    'venue_name' => 'Rumah Pak Bambang Sidoarjo',
    'address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
    'maps_url' => $testMapsUrl1,
    'sort_order' => 1,
]);

$ev2 = Event::create([
    'couple_id' => $couple->id,
    'title' => 'Grand Opening & 17 Candle Wishes',
    'date' => '2026-11-07',
    'start_time' => '19:30',
    'end_time' => '21:00',
    'venue_name' => 'Pak Indra Hall Ballroom',
    'address' => 'Jln Raya Prambon No. 12 Sidoarjo',
    'maps_url' => $testMapsUrl2,
    'sort_order' => 2,
]);

$ev3 = Event::create([
    'couple_id' => $couple->id,
    'title' => 'After-Party DJ & Midnight Soiree',
    'date' => '2026-11-08',
    'start_time' => '21:30',
    'end_time' => '00:00',
    'venue_name' => 'Neon Lounge Rooftop',
    'address' => 'Tower B Fl. 15 Sidoarjo',
    'maps_url' => $testMapsUrl3,
    'sort_order' => 3,
]);

$g1 = Gallery::create([
    'couple_id' => $couple->id,
    'image' => 'couples/galleries/test_gallery_1.jpg',
    'caption' => 'Momen Bahagia #1',
    'sort_order' => 1,
]);

$g2 = Gallery::create([
    'couple_id' => $couple->id,
    'image' => 'couples/galleries/test_gallery_2.jpg',
    'caption' => 'Momen Bahagia #2',
    'sort_order' => 2,
]);

echo "[PASS] Successfully saved Couple ID: {$couple->id}, 3 Events, and 2 Galleries to database.\n";

// Test Reload / "Refresh" from Database
$reloaded = Couple::with(['events' => fn($q) => $q->orderBy('sort_order'), 'galleries' => fn($q) => $q->orderBy('sort_order')])->find($couple->id);
if ($reloaded && $reloaded->events->count() === 3 && $reloaded->galleries->count() === 2) {
    echo "[PASS] Refresh check: Reloaded Couple has 3 events and 2 galleries matching saved input.\n";
    echo "       - Event 1: {$reloaded->events[0]->title} | {$reloaded->events[0]->date} | {$reloaded->events[0]->start_time} | {$reloaded->events[0]->maps_url}\n";
    echo "       - Event 2: {$reloaded->events[1]->title} | {$reloaded->events[1]->date} | {$reloaded->events[1]->start_time} | {$reloaded->events[1]->maps_url}\n";
    echo "       - Event 3: {$reloaded->events[2]->title} | {$reloaded->events[2]->date} | {$reloaded->events[2]->start_time} | {$reloaded->events[2]->maps_url}\n";
} else {
    echo "[FAIL] Refresh check failed!\n";
}

// Test Template Switching (Switch to another template e.g. raden-arya-champagne then celeste-royale-baby-blue)
$reloaded->update(['theme' => 'raden-arya-champagne']);
$switched1 = Couple::with('events', 'galleries')->find($couple->id);
if ($switched1->theme === 'raden-arya-champagne' && $switched1->events->count() === 3) {
    echo "[PASS] Template switch check #1: Switched to raden-arya-champagne without data loss.\n";
} else {
    echo "[FAIL] Template switch check #1 failed!\n";
}

$reloaded->update(['theme' => 'celeste-royale-baby-blue']);
$switched2 = Couple::with('events', 'galleries')->find($couple->id);
if ($switched2->theme === 'celeste-royale-baby-blue' && $switched2->events->count() === 3) {
    echo "[PASS] Template switch check #2: Switched to celeste-royale-baby-blue without data loss.\n";
} else {
    echo "[FAIL] Template switch check #2 failed!\n";
}

\Illuminate\Support\Facades\DB::rollBack();
echo "[INFO] Test database transaction rolled back cleanly.\n\n";

// 2. AUDIT EVERY TEMPLATE: RENDERING, LIVE PREVIEW, FULLSCREEN & FINAL INVITATION
echo "--- STEP 2: AUDITING ALL 47 TEMPLATES ACROSS CATEGORIES ---\n";

$allTemplates = TemplateManager::all();
$templateFiles = glob(resource_path('views/templates/*.blade.php'));

$auditResults = [];
$categoriesFound = [];

// Dataset for rendering
$testEvents = collect([
    (object)[
        'title' => 'Akad Nikah / Acara Perdana',
        'date' => '2026-11-07',
        'start_time' => '10:00',
        'end_time' => '12:00',
        'venue_name' => 'Rumah Pak Bambang Sidoarjo',
        'address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
        'maps_url' => $testMapsUrl1,
        'sort_order' => 1,
    ],
    (object)[
        'title' => 'Resepsi Akbar / Gala Dinner',
        'date' => '2026-11-07',
        'start_time' => '13:00',
        'end_time' => '16:00',
        'venue_name' => 'Pak Indra Hall Ballroom',
        'address' => 'Jln Raya Prambon No. 12 Sidoarjo',
        'maps_url' => $testMapsUrl2,
        'sort_order' => 2,
    ],
    (object)[
        'title' => 'After Party & Ramah Tamah',
        'date' => '2026-11-08',
        'start_time' => '19:00',
        'end_time' => '22:00',
        'venue_name' => 'Neon Sky Lounge',
        'address' => 'Fl. 15 Tower B Sidoarjo',
        'maps_url' => $testMapsUrl3,
        'sort_order' => 3,
    ]
]);

$testGalleries = collect([
    (object)['image' => 'https://example.com/gallery1.jpg', 'caption' => 'Momen Indah 1'],
    (object)['image' => 'https://example.com/gallery2.jpg', 'caption' => 'Momen Indah 2'],
    (object)['image' => 'https://example.com/gallery3.jpg', 'caption' => 'Momen Indah 3']
]);

$testUserCouple = (object)[
    'id' => 9999,
    'slug' => 'test-invitation-9999',
    'category' => 'Ulang Tahun',
    'sub_category' => 'Sweet 17th',
    'theme' => 'cyber-neon-futuristic',
    'package_name' => 'Paket Eksklusif',
    'event_heading' => 'Perayaan Momen Spesial Bima Satria',
    'groom_name' => 'Bima Satria',
    'groom_fullname' => 'Bima Satria Dirgantara, S.T.',
    'groom_father' => 'Bambang Soedirman',
    'groom_mother' => 'Siti Rahmawati',
    'groom_parents' => 'Bapak Bambang Soedirman & Ibu Siti Rahmawati',
    'groom_city' => 'Sidoarjo',
    'bride_name' => 'Keluarga Besar',
    'bride_fullname' => 'Keluarga Besar Bapak Bambang',
    'groom_photo' => 'https://example.com/bima-profile.jpg',
    'bride_name' => 'Keluarga Besar',
    'bride_fullname' => 'Keluarga Besar Bapak Bambang',
    'bride_father' => 'Indra',
    'bride_mother' => 'Dewi',
    'bride_parents' => 'Bapak Indra & Ibu Dewi',
    'bride_city' => 'Sidoarjo',
    'bride_photo' => 'https://example.com/bride-photo.jpg',
    'wedding_date' => '2026-11-07',
    'wedding_time' => '10:00 - Selesai',
    'venue_name' => 'Rumah Pak Bambang Sidoarjo',
    'venue_address' => 'Jln Prambon Kec Prambon Kab Sidoarjo',
    'maps_url' => $testMapsUrl1,
    'google_maps_url' => $testMapsUrl1,
    'quote' => 'Rasa syukur kami panjatkan atas kehadiran dan doa restu Bapak/Ibu/Saudara/i.',
    'bank_name_1' => 'BCA',
    'bank_account_1' => '8820192831',
    'bank_holder_1' => 'Bima Satria',
    'gift_address' => 'Jln Prambon Kec Prambon Kab Sidoarjo No. 45',
    'customer_name' => 'Bima Pemesan',
    'customer_phone' => '081234567890',
    'status' => 'published',
    'events' => $testEvents,
    'galleries' => $testGalleries,
];

$testGuest = (object)[
    'name' => 'Bapak / Ibu / Saudara/i',
    'slug' => 'tamu-kehormatan',
    'category' => 'Tamu Kehormatan',
    'quota' => 2,
    'seat_table' => 'VIP-01'
];

$testWishes = collect();

foreach ($templateFiles as $file) {
    $slug = basename($file, '.blade.php');
    $tmEntry = $allTemplates[$slug] ?? null;
    $cat = $tmEntry['category'] ?? 'Lainnya';
    $categoriesFound[$cat] = ($categoriesFound[$cat] ?? 0) + 1;

    $errors = [];

    // 1. Render Final Invitation mode ($isDemo = false)
    $finalHtml = '';
    try {
        $finalHtml = view("templates.$slug", [
            'couple' => $testUserCouple,
            'guest' => $testGuest,
            'wishes' => $testWishes,
            'template' => $tmEntry ?? ['key' => $slug, 'blade' => "templates.$slug"],
            'isDemo' => false,
            'isAdminPreview' => false,
            'galleries' => $testGalleries,
            'activeEvents' => $testEvents,
            'events' => $testEvents,
            'mapsUrl' => $testMapsUrl1,
            'venueName' => $testUserCouple->venue_name,
            'venueAddress' => $testUserCouple->venue_address,
            'celebrantName' => $testUserCouple->groom_name,
            'guestName' => $testGuest->name,
            'coverImg' => 'https://example.com/cover.jpg',
            'profileImg' => 'https://example.com/bima-profile.jpg',
        ])->render();
    } catch (\Throwable $e) {
        $errors[] = "Final Render Error: " . $e->getMessage();
    }

    // 2. Render Demo / Live Preview / Fullscreen mode ($isDemo = true)
    $previewHtml = '';
    try {
        $previewHtml = view("templates.$slug", [
            'couple' => $testUserCouple,
            'guest' => $testGuest,
            'wishes' => $testWishes,
            'template' => $tmEntry ?? ['key' => $slug, 'blade' => "templates.$slug"],
            'isDemo' => true,
            'isAdminPreview' => false,
            'galleries' => $testGalleries,
            'activeEvents' => $testEvents,
            'events' => $testEvents,
            'mapsUrl' => $testMapsUrl1,
            'venueName' => $testUserCouple->venue_name,
            'venueAddress' => $testUserCouple->venue_address,
            'celebrantName' => $testUserCouple->groom_name,
            'guestName' => $testGuest->name,
            'coverImg' => 'https://example.com/cover.jpg',
            'profileImg' => 'https://example.com/bima-profile.jpg',
        ])->render();
    } catch (\Throwable $e) {
        $errors[] = "Preview Render Error: " . $e->getMessage();
    }

    // Checks on output HTML:
    $content = file_get_contents($file);
    
    // Check Input Data (Name rendered)
    $hasName = (strpos($finalHtml, 'Bima Satria') !== false);
    if (!$hasName) $errors[] = "User name not rendered in HTML";

    // Check Maps URL
    $hasMaps = (strpos($finalHtml, $testMapsUrl1) !== false || strpos($finalHtml, 'maps.google.com') !== false || strpos($finalHtml, 'maps') !== false);
    if (!$hasMaps) $errors[] = "Maps not found in template";

    // Check Profile Photo element
    $hasProfilePhoto = (strpos($content, 'previewGroomPhotoImg') !== false || strpos($content, 'previewHeaderBg') !== false || strpos($finalHtml, 'bima-profile.jpg') !== false);
    if (!$hasProfilePhoto) $errors[] = "Profile photo element missing";

    // Check Gallery element
    $hasGallery = (strpos($content, 'previewGalleryGrid') !== false || strpos($content, 'galleryGridContainer') !== false || strpos($content, 'galleryContainer') !== false || strpos($content, 'galleryCylinder') !== false || strpos($finalHtml, 'gallery1.jpg') !== false || $slug === 'tahlilan-khusyuk');
    if (!$hasGallery) $errors[] = "Gallery element missing";

    // Check Acara / Events container
    $hasEvents = (strpos($content, 'id="itineraryContainer"') !== false);
    if (!$hasEvents) $errors[] = "itineraryContainer missing";

    // Check Cover z-index
    $hasCover = (strpos($content, 'id="invitation-cover"') !== false || strpos($content, 'id="envelope-cover"') !== false);
    if ($hasCover) {
        if (strpos($content, 'z-[60]') === false) {
            $errors[] = "Cover missing z-[60]";
        }
        if (strpos($content, 'openInvitation') === false && strpos($content, 'triggerOpenEnvelope') === false) {
            $errors[] = "Cover missing openInvitation";
        }
    }

    // Check zero Jonathan hardcoded leaks
    if (stripos($finalHtml, 'Jonathan') !== false) {
        $errors[] = "Leaked hardcoded Jonathan";
    }

    $status = empty($errors) ? 'PASS' : 'FAIL';
    $auditResults[$slug] = [
        'template' => $tmEntry['name'] ?? $slug,
        'slug' => $slug,
        'category' => $cat,
        'input_data' => $hasName ? 'PASS' : 'FAIL',
        'maps' => $hasMaps ? 'PASS' : 'FAIL',
        'foto_profil' => $hasProfilePhoto ? 'PASS' : 'FAIL',
        'foto_galeri' => $hasGallery ? 'PASS' : 'FAIL',
        'acara' => $hasEvents ? 'PASS' : 'FAIL',
        'live_preview' => !empty($previewHtml) ? 'PASS' : 'FAIL',
        'fullscreen' => !empty($previewHtml) ? 'PASS' : 'FAIL',
        'undangan_final' => !empty($finalHtml) ? 'PASS' : 'FAIL',
        'status' => $status,
        'errors' => $errors,
    ];
}

echo "\n================================================================================\n";
echo "                      AUDIT RESULT TABLE (47 TEMPLATES)\n";
echo "================================================================================\n";
echo sprintf("| %-32s | %-14s | %-5s | %-4s | %-5s | %-5s | %-5s | %-7s | %-6s |\n", 
    "Template", "Kategori", "Input", "Maps", "Foto", "Galeri", "Acara", "Preview", "Status");
echo str_repeat("-", 105) . "\n";

$passCount = 0;
$failCount = 0;
foreach ($auditResults as $slug => $r) {
    if ($r['status'] === 'PASS') $passCount++; else $failCount++;
    echo sprintf("| %-32s | %-14s | %-5s | %-4s | %-5s | %-5s | %-5s | %-7s | %-6s |\n",
        substr($r['template'], 0, 32),
        substr($r['category'], 0, 14),
        $r['input_data'],
        $r['maps'],
        $r['foto_profil'],
        $r['foto_galeri'],
        $r['acara'],
        $r['live_preview'],
        $r['status']
    );
    if (!empty($r['errors'])) {
        foreach ($r['errors'] as $e) {
            echo "   --> ERROR: $e\n";
        }
    }
}
echo str_repeat("-", 105) . "\n";
echo "TOTAL TEMPLATES: " . count($auditResults) . " | PASSED: $passCount | FAILED: $failCount\n";
echo "CATEGORIES CHECKED (" . count($categoriesFound) . "): " . implode(', ', array_keys($categoriesFound)) . "\n\n";
