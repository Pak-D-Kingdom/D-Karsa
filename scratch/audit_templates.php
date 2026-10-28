<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$templates = \App\Services\TemplateManager::all();
echo "Total templates in TemplateManager: " . count($templates) . "\n";
foreach ($templates as $key => $t) {
    $cat = $t['category'] ?? '-';
    $name = $t['name'] ?? '-';
    $blade = $t['blade'] ?? '-';
    $bladePath = resource_path('views/' . str_replace('.', '/', $blade) . '.blade.php');
    $exists = file_exists($bladePath) ? 'EXISTS' : 'MISSING';
    echo "[$exists] Key: $key | Cat: $cat | Blade: $blade | Name: $name\n";
}
