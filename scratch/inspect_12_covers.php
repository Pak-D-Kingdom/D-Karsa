<?php

$templates = [
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

foreach ($templates as $t) {
    $file = __DIR__ . '/../resources/views/templates/' . $t . '.blade.php';
    $content = file_get_contents($file);
    echo "=== TEMPLATE: $t ===\n";
    if (preg_match('/<div id=["\']coverScreen["\'][^>]*>([\s\S]{1,400})/i', $content, $m)) {
        echo trim(substr($m[0], 0, 350)) . "\n\n";
    }
}
