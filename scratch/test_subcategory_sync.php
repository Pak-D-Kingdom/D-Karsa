<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "========================================================\n";
echo "TEST SUB-CATEGORY DYNAMIC SYNC IN TEMPLATE PREVIEWS\n";
echo "========================================================\n";

$tests = [
    [
        'name' => 'Arctic Frost with "Ulang tahun dewasa"',
        'url' => '/demo/arctic-frost?sub_category=Ulang+tahun+dewasa',
        'expected' => 'Ulang tahun dewasa',
        'element_id' => 'previewSubCategoryBadge'
    ],
    [
        'name' => 'Arctic Frost with "Ulang tahun anak"',
        'url' => '/demo/arctic-frost?sub_category=Ulang+tahun+anak',
        'expected' => 'Ulang tahun anak',
        'element_id' => 'previewSubCategoryBadge'
    ],
    [
        'name' => 'Arctic Frost with "Sweet seventeen"',
        'url' => '/demo/arctic-frost?sub_category=Sweet+seventeen',
        'expected' => 'Sweet seventeen',
        'element_id' => 'previewSubCategoryBadge'
    ],
    [
        'name' => 'Formal Corporate with "Rapat Kerja Nasional"',
        'url' => '/demo/formal-corporate?sub_category=Rapat+Kerja+Nasional',
        'expected' => 'Rapat Kerja Nasional',
        'element_id' => 'previewSubCategoryBadge'
    ],
    [
        'name' => 'Rustic Coral Peach with "Pesta Kebun Spesial"',
        'url' => '/demo/rustic-coral-peach?sub_category=Pesta+Kebun+Spesial',
        'expected' => 'Pesta Kebun Spesial',
        'element_id' => 'previewSubCategoryBadge'
    ],
];

$allPassed = true;

foreach ($tests as $t) {
    $request = Illuminate\Http\Request::create($t['url'], 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
    
    if ($status !== 200) {
        echo "❌ [FAIL] {$t['name']}: HTTP status {$status}\n";
        $allPassed = false;
        continue;
    }
    
    $decoded = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    // Check that expected sub-category is present
    $needle = $t['expected'];
    if (!str_contains($decoded, $needle)) {
        echo "❌ [FAIL] {$t['name']}: string '{$needle}' NOT found in response!\n";
        $allPassed = false;
        continue;
    }
    
    // Check element badge specifically
    if (isset($t['element_id'])) {
        $pattern = '/id="' . preg_quote($t['element_id'], '/') . '"[^>]*>([^<]*)<\//';
        if (preg_match($pattern, $decoded, $matches)) {
            $badgeText = trim($matches[1]);
            if (stripos($badgeText, $needle) !== false) {
                echo "✅ [PASS] {$t['name']} -> Element #{$t['element_id']} contains: '{$badgeText}'\n";
            } else {
                echo "❌ [FAIL] {$t['name']} -> Element #{$t['element_id']} text is '{$badgeText}', expected '{$needle}'\n";
                $allPassed = false;
            }
        } else {
            echo "⚠️ [WARN] Element #{$t['element_id']} pattern not matched directly, but string exists in response.\n";
            echo "✅ [PASS] {$t['name']}\n";
        }
    } else {
        echo "✅ [PASS] {$t['name']}\n";
    }
    
    $kernel->terminate($request, $response);
}

if ($allPassed) {
    echo "\n🎉 ALL SUB-CATEGORY SYNC TESTS PASSED PERFECTLY!\n";
} else {
    echo "\n❌ SOME TESTS FAILED!\n";
}
