<?php

$jsonPath = 'C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/all_covers_report.json';
$data = json_decode(file_get_contents($jsonPath), true);

printf("%-26s | %-10s | %-14s | %-16s | %-15s\n", "Template", "CoverFound", "BlackBackdrop", "ScrollOverflow", "ButtonVisible");
echo str_repeat("-", 90) . "\n";

$issues = [];
foreach ($data as $row) {
    $t = $row['template'];
    $found = $row['found'] ? 'YES' : 'NO';
    $black = ($row['isBlackBackdrop'] ?? false) ? 'YES' : 'NO';
    $scroll = ($row['hasScrollOverflow'] ?? false) ? 'YES (' . $row['scrollHeight'] . 'px)' : 'NO';
    $btnVis = ($row['btnInfo']['isVisible'] ?? false) ? 'YES' : 'NO/OFFSCREEN';
    $btnOff = $row['btnInfo']['isOffscreen'] ?? false;

    if ($black === 'YES' || $scroll !== 'NO' || $btnVis !== 'YES' || !$row['found']) {
        $issues[] = [
            'template' => $t,
            'black' => $black,
            'scroll' => $scroll,
            'btnVis' => $btnVis,
            'btnOff' => $btnOff,
            'btnText' => $row['btnInfo']['text'] ?? 'N/A',
            'child' => $row['childInfo'] ?? null
        ];
    }

    printf("%-26s | %-10s | %-14s | %-16s | %-15s\n", $t, $found, $black, $scroll, $btnVis);
}

echo "\n\n=== IDENTIFIED ISSUES (" . count($issues) . ") ===\n";
foreach ($issues as $iss) {
    echo "- {$iss['template']}: BlackBackdrop={$iss['black']}, ScrollOverflow={$iss['scroll']}, BtnVis={$iss['btnVis']}, BtnText='{$iss['btnText']}'\n";
    if ($iss['child']) {
        echo "    Child Box: width={$iss['child']['width']}px, height={$iss['child']['height']}px, rounded={$iss['child']['borderRadius']}\n";
    }
}
