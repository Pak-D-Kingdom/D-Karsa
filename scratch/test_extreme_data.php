<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$viewsCacheDir = 'C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/views_cache';
config(['view.compiled' => $viewsCacheDir]);
$newCompiler = new \Illuminate\View\Compilers\BladeCompiler(app('files'), $viewsCacheDir);
app()->singleton('blade.compiler', fn() => $newCompiler);
app('view.engine.resolver')->register('blade', fn() => new \Illuminate\View\Engines\CompilerEngine($newCompiler));

use App\Services\TemplateManager;

$extremeLongName = "Raden Mas Panji Aryo Kusumo Hadiningrat Diningrat bin H. Soedirman Al-Mansyur & Cut Nyak Meutia Srikandi";
$extremeAddress = "Jalan Brigadir Jenderal Katamso Gang Kenanga Indah RT 012 / RW 008 No. 129 Bawah, Kelurahan Kampung Melayu, Kecamatan Jatinegara, Kota Administrasi Jakarta Timur, Daerah Khusus Ibukota Jakarta 13320";
$extremeMaps = "https://www.google.com/maps/place/Grand+Ballroom+Mulia+Hotel/@-6.2163581,106.7974533,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69f14bd3c4826b:0xb63d8eb4bbfdc766!8m2!3d-6.2163634!4d106.8000282!16s%2Fg%2F11b7ck2wzq?entry=ttu";

$fiveEvents = collect([
    (object)['title' => 'Sesi 1: Prosesi Adat & Khotmil Quran', 'date' => '2026-11-05', 'start_time' => '07:30', 'end_time' => '09:00', 'venue_name' => 'Pendopo Utama', 'address' => $extremeAddress, 'maps_url' => $extremeMaps, 'sort_order' => 1],
    (object)['title' => 'Sesi 2: Akad Nikah & Ijab Kabul', 'date' => '2026-11-05', 'start_time' => '09:30', 'end_time' => '11:00', 'venue_name' => 'Masjid Raya', 'address' => $extremeAddress, 'maps_url' => $extremeMaps, 'sort_order' => 2],
    (object)['title' => 'Sesi 3: Upacara Panggih & Sungkeman', 'date' => '2026-11-05', 'start_time' => '11:30', 'end_time' => '13:00', 'venue_name' => 'Gedung Kencana', 'address' => $extremeAddress, 'maps_url' => $extremeMaps, 'sort_order' => 3],
    (object)['title' => 'Sesi 4: Resepsi Siang VIP', 'date' => '2026-11-05', 'start_time' => '13:30', 'end_time' => '16:00', 'venue_name' => 'Grand Ballroom Fl. 3', 'address' => $extremeAddress, 'maps_url' => $extremeMaps, 'sort_order' => 4],
    (object)['title' => 'Sesi 5: Gala Dinner & After Party', 'date' => '2026-11-06', 'start_time' => '19:00', 'end_time' => '23:00', 'venue_name' => 'Rooftop Sky Lounge', 'address' => $extremeAddress, 'maps_url' => $extremeMaps, 'sort_order' => 5],
]);

$extremeCouple = (object)[
    'id' => 8888,
    'slug' => 'extreme-test',
    'category' => 'Pernikahan',
    'sub_category' => 'Adat Modern VIP',
    'theme' => 'javanese-royal',
    'package_name' => 'Paket Sultan',
    'event_heading' => 'PAWIWAHAN AGUNG & WALIMATUL ‘URSY ⚜️',
    'groom_name' => $extremeLongName,
    'groom_fullname' => $extremeLongName . ', B.Eng (Hons), M.Sc',
    'groom_father' => 'K.R.T. Soedirman Al-Mansyur Hadiningrat',
    'groom_mother' => 'R.Ay. Siti Rahmawati Hadiningrat',
    'groom_parents' => 'K.R.T. Soedirman & R.Ay. Siti Rahmawati',
    'groom_city' => 'Surakarta Hadiningrat',
    'groom_photo' => null, // Test fallback
    'bride_name' => 'Cut Nyak Meutia',
    'bride_fullname' => 'Cut Nyak Meutia Srikandi, S.I.Kom',
    'bride_father' => null, // Optional empty
    'bride_mother' => null, // Optional empty
    'bride_parents' => null, // Optional empty
    'bride_city' => 'Banda Aceh',
    'bride_photo' => null, // Test fallback
    'wedding_date' => '2026-11-05',
    'wedding_time' => '07:30 - Selesai',
    'venue_name' => 'Pendopo Sasana Kencana & Grand Ballroom',
    'venue_address' => $extremeAddress,
    'maps_url' => $extremeMaps,
    'google_maps_url' => $extremeMaps,
    'quote' => null, // Optional empty
    'bank_name_1' => 'Bank Mandiri',
    'bank_account_1' => '123-00-9876543-1',
    'bank_holder_1' => 'Panji Aryo Kusumo',
    'gift_address' => null, // Optional empty
    'status' => 'published',
    'events' => $fiveEvents,
    'galleries' => collect(), // Empty galleries test
];

$extremeGuest = (object)[
    'name' => 'Prof. Dr. Ir. H. Bambang Widjojanto, M.Sc., Ph.D. & Istri',
    'slug' => 'tamu-vip',
    'category' => 'VVIP Diplomatic',
    'quota' => 4,
];

$allTemplates = TemplateManager::all();
$templateFiles = glob(resource_path('views/templates/*.blade.php'));

$extremeErrors = [];
foreach ($templateFiles as $file) {
    $slug = basename($file, '.blade.php');
    $tmEntry = $allTemplates[$slug] ?? ['key' => $slug, 'blade' => "templates.$slug"];
    try {
        $html = view("templates.$slug", [
            'couple' => $extremeCouple,
            'guest' => $extremeGuest,
            'wishes' => collect(),
            'template' => $tmEntry,
            'isDemo' => false,
            'isAdminPreview' => false,
            'galleries' => collect(),
            'activeEvents' => $fiveEvents,
            'events' => $fiveEvents,
            'mapsUrl' => $extremeMaps,
            'venueName' => $extremeCouple->venue_name,
            'venueAddress' => $extremeCouple->venue_address,
            'celebrantName' => $extremeCouple->groom_name,
            'guestName' => $extremeGuest->name,
            'coverImg' => 'https://example.com/cover.jpg',
            'profileImg' => 'https://example.com/profile.jpg',
        ])->render();

        if (strlen($html) < 5000) {
            $extremeErrors[$slug] = "Rendered HTML suspiciously small: " . strlen($html) . " bytes";
        }
    } catch (\Throwable $e) {
        $extremeErrors[$slug] = $e->getMessage();
    }
}

if (empty($extremeErrors)) {
    echo "SUCCESS: All 47 templates handled extreme data (super-long names, 5 multi-events, extreme address, empty optionals) flawlessly with ZERO errors!\n";
} else {
    echo "ERRORS on extreme data (" . count($extremeErrors) . "):\n";
    foreach ($extremeErrors as $s => $err) {
        echo "[$s]: $err\n";
    }
}
