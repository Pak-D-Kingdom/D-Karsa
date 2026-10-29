<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\TemplateManager;

$templates = TemplateManager::all();
echo "=======================================================\n";
echo "AUDITING ALL " . count($templates) . " TEMPLATES IN D-KARSA\n";
echo "=======================================================\n\n";

$results = [];

$testCover = "https://example.com/test-custom-cover-unique123.jpg";
$testGroom = "https://example.com/test-custom-groom-unique456.jpg";
$testBride = "https://example.com/test-custom-bride-unique789.jpg";
$testGal1 = "https://example.com/test-gal1-unique.jpg";
$testGal2 = "https://example.com/test-gal2-unique.jpg";
$testGalleriesJson = json_encode([$testGal1, $testGal2]);
$testGroomName = "CustomGroomNameTest";
$testBrideName = "CustomBrideNameTest";
$testHeading = "CustomHeadingTest";
$testVenue = "CustomVenueTest";
$testAddress = "CustomAddressTest";
$testEventsJson = json_encode([
    [
        'title' => 'CustomSession1Test',
        'venue_name' => 'CustomEventVenue1Test',
        'date' => '2026-12-01',
        'start_time' => '09:00 WIB',
        'end_time' => '11:00 WIB',
        'address' => 'CustomEventAddress1Test',
        'maps_url' => 'https://maps.google.com/?q=CustomEventVenue1Test'
    ],
    [
        'title' => 'CustomSession2Test',
        'venue_name' => 'CustomEventVenue2Test',
        'date' => '2026-12-01',
        'start_time' => '13:00 WIB',
        'end_time' => '15:00 WIB',
        'address' => 'CustomEventAddress2Test',
        'maps_url' => 'https://maps.google.com/?q=CustomEventVenue2Test'
    ]
]);

foreach ($templates as $key => $tmpl) {
    $bladeView = $tmpl['blade'] ?? null;
    $name = $tmpl['name'] ?? $key;
    $cat = $tmpl['category'] ?? 'Pernikahan';

    $itemResult = [
        'key' => $key,
        'name' => $name,
        'category' => $cat,
        'blade' => $bladeView,
        'blade_exists' => false,
        'php_syntax' => false,
        'js_syntax' => false,
        'demo_renders' => false,
        'custom_renders' => false,
        'cover_photo_synced' => false,
        'groom_photo_synced' => false,
        'gallery_synced' => false,
        'events_synced' => false,
        'venue_synced' => false,
        'has_update_photo_listener' => false,
        'has_update_gallery_listener' => false,
        'has_update_field_listener' => false,
        'has_update_events_listener' => false,
        'issues' => [],
    ];

    if (!$bladeView) {
        $itemResult['issues'][] = "No blade view defined in TemplateManager";
        $results[$key] = $itemResult;
        continue;
    }

    $bladePath = resource_path('views/' . str_replace('.', '/', $bladeView) . '.blade.php');
    if (!file_exists($bladePath)) {
        $itemResult['issues'][] = "Blade file not found: $bladePath";
        $results[$key] = $itemResult;
        continue;
    }
    $itemResult['blade_exists'] = true;

    // 1. PHP Syntax Check
    $lintOutput = [];
    $lintStatus = 0;
    exec("php -l " . escapeshellarg($bladePath), $lintOutput, $lintStatus);
    if ($lintStatus === 0) {
        $itemResult['php_syntax'] = true;
    } else {
        $itemResult['issues'][] = "PHP Syntax Error: " . implode(" ", $lintOutput);
    }

    $bladeContent = file_get_contents($bladePath);

    // 2. PostMessage Listeners in Blade Content
    $itemResult['has_update_photo_listener'] = (str_contains($bladeContent, 'UPDATE_PREVIEW_PHOTO'));
    $itemResult['has_update_gallery_listener'] = (str_contains($bladeContent, 'UPDATE_PREVIEW_GALLERY'));
    $itemResult['has_update_field_listener'] = (str_contains($bladeContent, 'UPDATE_PREVIEW_FIELD'));
    $itemResult['has_update_events_listener'] = (str_contains($bladeContent, 'UPDATE_PREVIEW_EVENTS'));

    // 3. Test Demo Render (Clean)
    $rendered = '';
    try {
        $couple = TemplateManager::getDemoCouple($key);
        $guest = TemplateManager::getDemoGuest();
        $wishes = TemplateManager::getDemoWishes();
        $isDemo = true;
        $isAdminPreview = false;
        $template = $tmpl;
        $galleries = $couple->galleries ?? collect();

        $rendered = view($bladeView, compact('couple', 'guest', 'wishes', 'isDemo', 'isAdminPreview', 'template', 'galleries'))->render();
        $itemResult['demo_renders'] = true;
    } catch (\Throwable $e) {
        $itemResult['issues'][] = "Clean Demo Render Exception: " . $e->getMessage();
    }

    // 4. JS Syntax Check: Extract <script> blocks from actual rendered HTML
    if (!empty($rendered) && preg_match_all('/<script(?![^>]*\bsrc=)[^>]*>(.*?)<\/script>/is', $rendered, $matches)) {
        $allJs = implode("\n;\n", $matches[1]);
        $tempJsFile = sys_get_temp_dir() . '/test_' . md5($key) . '.js';
        file_put_contents($tempJsFile, $allJs);
        $jsOutput = [];
        $jsStatus = 0;
        exec("node --check " . escapeshellarg($tempJsFile) . " 2>&1", $jsOutput, $jsStatus);
        unlink($tempJsFile);

        if ($jsStatus === 0) {
            $itemResult['js_syntax'] = true;
        } else {
            $itemResult['issues'][] = "JS Syntax Error in rendered output: " . implode(" ", array_slice($jsOutput, 0, 2));
        }
    } else {
        $itemResult['js_syntax'] = true;
    }

    // 5. Test Custom Data Overrides Render
    try {
        $overrides = [
            'cover_photo' => $testCover,
            'groom_photo' => $testGroom,
            'bride_photo' => $testBride,
            'groom_name' => $testGroomName,
            'bride_name' => $testBrideName,
            'event_heading' => $testHeading,
            'venue_name' => $testVenue,
            'venue_address' => $testAddress,
            'events' => collect(json_decode($testEventsJson)),
            'galleries' => collect([
                (object)['image' => $testGal1, 'caption' => 'Test 1', 'sort_order' => 1],
                (object)['image' => $testGal2, 'caption' => 'Test 2', 'sort_order' => 2],
            ]),
        ];

        $coupleCustom = TemplateManager::getDemoCouple($key, $overrides);
        $galleriesCustom = $coupleCustom->galleries ?? collect();

        $renderedCustom = view($bladeView, [
            'couple' => $coupleCustom,
            'guest' => $guest,
            'wishes' => $wishes,
            'isDemo' => true,
            'isAdminPreview' => false,
            'template' => $tmpl,
            'galleries' => $galleriesCustom,
        ])->render();

        $itemResult['custom_renders'] = true;

        // Check if custom cover photo appears
        if (str_contains($renderedCustom, $testCover)) {
            $itemResult['cover_photo_synced'] = true;
        } else {
            $itemResult['issues'][] = "Custom cover_photo not found in rendered HTML";
        }

        // Check if custom groom / celebrant photo appears
        // (Note: Some templates might not have a photo section by design, let's detect if it has groom_photo)
        if (str_contains($renderedCustom, $testGroom)) {
            $itemResult['groom_photo_synced'] = true;
        } else {
            // Check if template has photo section
            if (str_contains($bladeContent, 'groom_photo') || str_contains($bladeContent, 'profileImg') || str_contains($bladeContent, 'previewGroomPhoto')) {
                $itemResult['issues'][] = "Custom groom_photo/profileImg not found in rendered HTML";
            } else {
                $itemResult['groom_photo_synced'] = 'N/A (No photo in design)';
            }
        }

        // Check if custom gallery appears
        if (str_contains($renderedCustom, $testGal1)) {
            $itemResult['gallery_synced'] = true;
        } else {
            if (str_contains($bladeContent, 'galleries') || str_contains($bladeContent, 'activeGalleries')) {
                $itemResult['issues'][] = "Custom galleries not found in rendered HTML";
            } else {
                $itemResult['gallery_synced'] = 'N/A (No gallery in design)';
            }
        }

        // Check if custom venue appears
        if (str_contains($renderedCustom, $testVenue) || str_contains($renderedCustom, 'CustomEventVenue1Test')) {
            $itemResult['venue_synced'] = true;
        } else {
            $itemResult['issues'][] = "Custom venue_name not found in rendered HTML";
        }

        // Check if custom events appear
        if (str_contains($renderedCustom, 'CustomSession1Test')) {
            $itemResult['events_synced'] = true;
        } else {
            if (str_contains($bladeContent, 'activeEvents') || str_contains($bladeContent, 'events')) {
                $itemResult['issues'][] = "Custom events not found in rendered HTML";
            } else {
                $itemResult['events_synced'] = 'Single/Static event design';
            }
        }

    } catch (\Throwable $e) {
        $itemResult['issues'][] = "Custom Overrides Render Exception: " . $e->getMessage();
    }

    $results[$key] = $itemResult;
}

// Print Report
$perfectCount = 0;
$issueCount = 0;

foreach ($results as $k => $res) {
    if (empty($res['issues'])) {
        $perfectCount++;
        echo "[OK] {$res['name']} ({$res['key']}) - Category: {$res['category']}\n";
    } else {
        $issueCount++;
        echo "[ISSUES] {$res['name']} ({$res['key']}) - Category: {$res['category']}\n";
        foreach ($res['issues'] as $iss) {
            echo "   -> $iss\n";
        }
    }
}

echo "\n=======================================================\n";
echo "SUMMARY: $perfectCount PERFECT | $issueCount WITH ISSUES\n";
echo "=======================================================\n";

echo "\n--- TEMPLATES CAPABILITIES MATRIX ---\n";
foreach ($templates as $k => $t) {
    $blade = $t['blade'];
    $file = resource_path('views/' . str_replace('.', '/', $blade) . '.blade.php');
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    $hasEventsLoop = (str_contains($content, 'activeEvents') || str_contains($content, 'eventList') || str_contains($content, '$couple->events') || str_contains($content, 'itineraryContainer'));
    $eventsDynamic = str_contains($content, 'renderDynamicEvents');
    $hasCoverImg = (str_contains($content, 'cover_photo') || str_contains($content, 'coverImg') || str_contains($content, 'default_cover'));
    $hasGroomImg = (str_contains($content, 'groom_photo') || str_contains($content, 'groomImg') || str_contains($content, 'profileImg'));
    $hasGallery = (str_contains($content, 'galleries') || str_contains($content, 'activeGalleries') || str_contains($content, 'displayGalleries'));

    echo sprintf("%-28s | EventsLoop: %-4s | DynamicEventsJS: %-4s | CoverImg: %-4s | ProfileImg: %-4s | Gallery: %-4s\n",
        $k,
        $hasEventsLoop ? 'YES' : 'NO',
        $eventsDynamic ? 'YES' : 'NO',
        $hasCoverImg ? 'YES' : 'NO',
        $hasGroomImg ? 'YES' : 'NO',
        $hasGallery ? 'YES' : 'NO'
    );
}

// Save JSON report for further analysis
file_put_contents(__DIR__ . '/audit_results.json', json_encode($results, JSON_PRETTY_PRINT));
