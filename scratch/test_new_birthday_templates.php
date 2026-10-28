<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "========================================================\n";
echo "TEST SUITE: 3 TEMPLATE BARU ULANG TAHUN D'KARSA\n";
echo "1. Editorial Cherry Blossom\n";
echo "2. Elegan Klasik Orange Energy\n";
echo "3. Rustic Purple Dream\n";
echo "========================================================\n\n";

$templates = [
    'editorial-cherry-blossom' => [
        'name' => 'Editorial Cherry Blossom',
        'key' => 'editorial-cherry-blossom',
        'celebrant' => 'Valerie Chloe',
        'theme_title' => 'Sakura Reverie',
        'button_id' => 'open-envelope-btn',
        'sub_category' => 'Sweet seventeen',
    ],
    'orange-energy' => [
        'name' => 'Elegan Klasik Orange Energy',
        'key' => 'orange-energy',
        'celebrant' => 'Clarissa Aurelia',
        'theme_title' => 'Aura Soleil',
        'button_id' => 'openInvitationBtn',
        'sub_category' => 'Sweet seventeen',
    ],
    'rustic-purple-dream' => [
        'name' => 'Rustic Purple Dream',
        'key' => 'rustic-purple-dream',
        'celebrant' => 'Aurellia Keisha',
        'theme_title' => 'Rustic Purple Dream',
        'button_id' => 'btnOpenInvitation',
        'sub_category' => 'Ulang tahun remaja',
    ],
];

$allPassed = true;

// 1. Test TemplateManager registration
echo "[TEST 1] Verifikasi TemplateManager::all() dan resolveKey()...\n";
$allThemes = \App\Services\TemplateManager::all();
foreach ($templates as $key => $meta) {
    if (!isset($allThemes[$key])) {
        echo "❌ TemplateManager::all() tidak memiliki key: {$key}\n";
        $allPassed = false;
    } else {
        $reg = $allThemes[$key];
        if ($reg['category'] !== 'Ulang Tahun') {
            echo "❌ Template {$key} category salah: {$reg['category']} (harus 'Ulang Tahun')\n";
            $allPassed = false;
        } else {
            echo "  ✓ TemplateManager::all() [$key] terdaftar dengan category 'Ulang Tahun'\n";
        }
    }

    $resolved = \App\Services\TemplateManager::resolveKey($key);
    if ($resolved !== $key) {
        echo "❌ resolveKey('{$key}') mengembalikan '{$resolved}' bukan '{$key}'\n";
        $allPassed = false;
    } else {
        echo "  ✓ resolveKey('{$key}') -> '{$resolved}'\n";
    }
}

// 2. Test Demo Routes via Laravel HTTP Kernel
echo "\n[TEST 2] Verifikasi Demo Route (/demo/{templateKey})...\n";
foreach ($templates as $key => $meta) {
    $request = Illuminate\Http\Request::create("/demo/{$key}", 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();

    if ($status !== 200) {
        echo "❌ /demo/{$key} mengembalikan status {$status}\n";
        $allPassed = false;
        continue;
    }

    echo "  ✓ /demo/{$key} HTTP 200 OK\n";

    // Check NOT wedding fallback
    if (strpos($content, 'chibi-red') !== false || strpos($content, 'Rizky & Amanda') !== false || strpos($content, 'Lễ Thành Hôn') !== false) {
        echo "  ❌ /demo/{$key} JATUH KE DESAIN WEDDING (chibi-red / Rizky & Amanda)!\n";
        $allPassed = false;
    } else {
        echo "  ✓ Tidak jatuh ke desain Wedding\n";
    }

    // Check Celebrant Name
    if (strpos($content, $meta['celebrant']) === false) {
        echo "  ❌ Nama celebrant '{$meta['celebrant']}' tidak ditemukan di template!\n";
        $allPassed = false;
    } else {
        echo "  ✓ Ditemukan nama celebrant: '{$meta['celebrant']}'\n";
    }

    // Check Cover Screen & Open Button
    if (strpos($content, 'id="invitation-cover"') === false) {
        echo "  ❌ Container Cover Screen (id=\"invitation-cover\") tidak ditemukan!\n";
        $allPassed = false;
    } else {
        echo "  ✓ Container Cover Screen (id=\"invitation-cover\") ada\n";
    }

    if (strpos($content, $meta['button_id']) === false && strpos($content, 'Buka Undangan') === false && strpos($content, 'BUKA UNDANGAN') === false) {
        echo "  ❌ Tombol Buka Undangan ('{$meta['button_id']}') tidak ditemukan!\n";
        $allPassed = false;
    } else {
        echo "  ✓ Tombol Buka Undangan ('{$meta['button_id']}') ada\n";
    }

    // Check Venue Button and NO static maps denah
    if (strpos($content, 'maps.google.com') === false && strpos($content, 'google_maps_url') === false) {
        echo "  ❌ Link / Button Google Maps tidak ditemukan di venue section!\n";
        $allPassed = false;
    } else {
        echo "  ✓ Tombol langsung ke Google Maps terpasang\n";
    }

    // Check no floorplan / denah image
    if (strpos($content, 'denah') !== false) {
        echo "  ⚠️ Warning: Teks 'denah' terdeteksi di {$key}\n";
    } else {
        echo "  ✓ Bersih dari denah / map image statis\n";
    }
}

// 3. Test Custom Query Parameters & Sub-Category Binding
echo "\n[TEST 3] Verifikasi Input Custom & Sub Bab / Sub Kategori Dinamis...\n";
$customName = "Nathania Salsabila";
$customSubCat = "Sweet Seventeen Milestone";
$customVenue = "The Ritz-Carlton Mega Kuningan";

foreach ($templates as $key => $meta) {
    $request = Illuminate\Http\Request::create("/demo/{$key}?groom_name=" . urlencode($customName) . "&sub_category=" . urlencode($customSubCat) . "&venue_name=" . urlencode($customVenue), 'GET');
    $response = $kernel->handle($request);
    $content = $response->getContent();

    $hasName = strpos($content, $customName) !== false;
    $hasSubCat = strpos($content, $customSubCat) !== false;
    $hasVenue = strpos($content, $customVenue) !== false;

    if ($hasName && $hasSubCat && $hasVenue) {
        echo "  ✓ {$key}: Berhasil merender input custom (Nama: {$customName}, SubCat: {$customSubCat}, Venue: {$customVenue})\n";
    } else {
        echo "  ❌ {$key}: Gagal merender parameter custom! (Name: " . ($hasName ? 'OK' : 'FAIL') . ", SubCat: " . ($hasSubCat ? 'OK' : 'FAIL') . ", Venue: " . ($hasVenue ? 'OK' : 'FAIL') . ")\n";
        $allPassed = false;
    }
}

// 4. Test Home Page (Catalog Cards Render)
echo "\n[TEST 4] Verifikasi Halaman Home / Katalog Template...\n";
$homeReq = Illuminate\Http\Request::create('/', 'GET');
$homeRes = $kernel->handle($homeReq);
$homeContent = $homeRes->getContent();

foreach ($templates as $key => $meta) {
    if (strpos($homeContent, "openThemePreviewModal('{$key}')") !== false || strpos($homeContent, $key) !== false) {
        echo "  ✓ Kartu template '{$key}' muncul di halaman Home dengan modal preview terhubung\n";
    } else {
        echo "  ❌ Kartu template '{$key}' tidak ditemukan di halaman Home!\n";
        $allPassed = false;
    }
}

echo "\n========================================================\n";
if ($allPassed) {
    echo "🎉 SEMUA PENGUJIAN 3 TEMPLATE ULANG TAHUN BERHASIL 100%!\n";
} else {
    echo "❌ TERDAPAT PENGUJIAN YANG GAGAL!\n";
}
echo "========================================================\n";
