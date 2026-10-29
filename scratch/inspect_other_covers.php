<?php

$allFiles = glob(__DIR__ . '/../resources/views/templates/*.blade.php');
$exclude12 = [
    'batak-heritage',
    'golden-birthday',
    'green-mosque',
    'halal-bihalal',
    'modern-graduate',
    'reuni-akbar',
    'royal-tasmiyah',
    'scholar-luxury',
    'tahlilan-khusyuk',
    'walimatul-khitan',
    'walimatus-safar',
    'wisuda-sarjana'
];

foreach ($allFiles as $f) {
    $name = basename($f, '.blade.php');
    if (in_array($name, $exclude12)) continue;
    
    $content = file_get_contents($f);
    echo "=== TEMPLATE: $name ===\n";
    // Find cover screen container
    if (preg_match('/(<div[^>]+(?:id=["\'](?:cover|coverScreen|invitation-cover|modalCover)["\']|class=["\'][^"\']*fixed inset-0[^"\']*["\'])[^>]*>)([\s\S]{1,350})/i', $content, $m)) {
        echo trim($m[1]) . "\n";
        // Check first child
        if (preg_match('/<div[^>]+class=["\']([^"\']+)["\'][^>]*>/i', $m[2], $c1)) {
            echo "   First child class: " . $c1[1] . "\n";
        }
    } else {
        echo "   [!] NO COVER MATCH FOUND!\n";
    }
    echo "\n";
}
