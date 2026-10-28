<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "========================================================\n";
echo "TEST MAPS DENAH REMOVAL & DIRECT BUTTON VERIFICATION\n";
echo "========================================================\n";

$templates = [
    'formal-corporate' => [
        'name' => 'Korporat Profesional & Grand Opening',
        'url' => '/demo/formal-corporate',
        'must_contain' => [
            'Buka Petunjuk Arah (Google Maps)',
            'maps.google.com',
        ],
        'must_not_contain' => [
            '<iframe',
            'Taman Utama Bistro',
        ],
    ],
    'rustic-coral-peach' => [
        'name' => 'Rustic Coral & Peach (Ulang Tahun)',
        'url' => '/demo/rustic-coral-peach',
        'must_contain' => [
            'Buka Petunjuk Arah (Google Maps)',
            'maps.google.com',
        ],
        'must_not_contain' => [
            '<iframe',
            'Taman Utama Bistro',
            'Map Pipeline Component',
        ],
    ],
    'floral-midnight-navy' => [
        'name' => 'Floral Midnight Navy (Acara Formal)',
        'url' => '/demo/floral-midnight-navy',
        'must_contain' => [
            'Buka Petunjuk Arah (Google Maps)',
            'maps.google.com',
        ],
        'must_not_contain' => [
            '<iframe',
            'Stylized Dark Map Preview Card',
        ],
    ],
    'arctic-frost' => [
        'name' => 'Korporat Profesional Arctic Frost',
        'url' => '/demo/arctic-frost',
        'must_contain' => [
            'Buka Petunjuk Arah (Google Maps)',
            'maps.google.com',
        ],
        'must_not_contain' => [
            '<iframe',
            'Venue Map Preview Card',
        ],
    ],
];

$allPassed = true;

foreach ($templates as $key => $cfg) {
    echo "\nTesting: {$cfg['name']} ({$key})\n";
    $request = Illuminate\Http\Request::create($cfg['url'], 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    
    if ($status !== 200) {
        echo "  ❌ [FAIL] Status code: {$status}\n";
        $allPassed = false;
        continue;
    }
    
    $decoded = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    // Check must_contain
    foreach ($cfg['must_contain'] as $str) {
        if (str_contains($decoded, $str)) {
            echo "  ✅ [PASS] Found expected button/link: '{$str}'\n";
        } else {
            echo "  ❌ [FAIL] Missing expected: '{$str}'\n";
            $allPassed = false;
        }
    }
    
    // Check must_not_contain
    foreach ($cfg['must_not_contain'] as $forbidden) {
        if (!str_contains($decoded, $forbidden)) {
            echo "  ✅ [PASS] Clean: Forbidden map denah element '{$forbidden}' is NOT present\n";
        } else {
            echo "  ❌ [FAIL] Found forbidden element: '{$forbidden}'\n";
            $allPassed = false;
        }
    }
    
    $kernel->terminate($request, $response);
}

if ($allPassed) {
    echo "\n🎉 ALL TEMPLATES VERIFIED: NO MAPS DENAH, DIRECT BUTTONS WORKING PERFECTLY!\n";
} else {
    echo "\n❌ SOME MAP TESTS FAILED!\n";
}
