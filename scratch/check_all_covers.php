<?php

$files = glob(__DIR__ . '/../resources/views/templates/*.blade.php');
$results = [];

foreach ($files as $file) {
    $name = basename($file, '.blade.php');
    $content = file_get_contents($file);

    // Look for cover screen IDs and classes
    preg_match('/<div[^>]+id=["\']([^"\']*(?:cover|modal|screen)[^"\']*)["\'][^>]*>/i', $content, $idMatch);
    
    // Look for fixed inset-0 on cover
    $hasFixedInset0 = false;
    $coverClasses = '';
    $coverTag = '';
    
    // Check various common cover ids
    $coverIds = ['invitation-cover', 'coverScreen', 'cover', 'cover-screen', 'welcome-screen', 'screen-cover', 'gateCover'];
    foreach ($coverIds as $cid) {
        if (preg_match('/<div[^>]+id=["\']' . preg_quote($cid, '/') . '["\'][^>]*>/i', $content, $m)) {
            $coverTag = $m[0];
            if (preg_match('/class=["\']([^"\']+)["\']/i', $coverTag, $cm)) {
                $coverClasses = $cm[1];
            }
            if (str_contains($coverTag, 'fixed inset-0')) {
                $hasFixedInset0 = true;
            }
            break;
        }
    }

    // If not found by specific ID, search for any fixed inset-0 container with z-50 or higher
    if (!$coverTag && preg_match('/<div[^>]+class=["\'][^"\']*fixed inset-0[^"\']*(?:z-50|z-40)[^"\']*["\'][^>]*>/i', $content, $m)) {
        $coverTag = $m[0];
        $hasFixedInset0 = true;
        if (preg_match('/class=["\']([^"\']+)["\']/i', $coverTag, $cm)) {
            $coverClasses = $cm[1];
        }
    }

    // Look for button or action to open invitation
    $hasOpenAction = false;
    $openBtnText = '';
    if (preg_match('/(?:openInvitation|bukaUndangan|openCover|buka-undangan)[^>]*>([^<]+)/i', $content, $bm)) {
        $hasOpenAction = true;
        $openBtnText = trim(strip_tags($bm[1]));
    } elseif (preg_match('/<button[^>]+id=["\'](?:openInvitationBtn|waxSealBtn|open-invitation-btn|btn-open)[^>]*>/i', $content, $bm)) {
        $hasOpenAction = true;
        $openBtnText = 'Button ID: ' . $bm[0];
    } elseif (preg_match('/(Buka Undangan|BUKA UNDANGAN|Buka Dokumen|BUKA DOKUMEN|Open Invitation|Buka)/i', $content, $bm)) {
        $hasOpenAction = true;
        $openBtnText = $bm[1];
    }

    // Check body tag
    preg_match('/<body[^>]*>/i', $content, $bodyMatch);
    $bodyTag = $bodyMatch[0] ?? '';
    $bodyOverflowHidden = str_contains($bodyTag, 'overflow-hidden');

    // Check if cover container uses h-screen / min-h-screen / h-full or fixed inset-0
    $isFullCover = $hasFixedInset0 || str_contains($coverClasses, 'h-screen') || str_contains($coverClasses, 'min-h-screen');

    // Check if there is an inner floating card that could cause black borders/margins
    $hasFloatingBoxIssue = false;
    if ($coverTag) {
        // extract first ~1000 chars of cover
        $pos = strpos($content, $coverTag);
        $coverChunk = substr($content, $pos, 1500);
        if (preg_match('/(?:bg-black\/(?:90|95|80|75)|bg-opacity)[\s\S]*?(?:max-w-sm|max-w-md)[\s\S]*?(?:rounded-2xl|rounded-3xl|shadow-2xl)/i', $coverChunk)) {
            $hasFloatingBoxIssue = true;
        }
    }

    $results[$name] = [
        'cover_found' => !empty($coverTag),
        'cover_tag_preview' => substr($coverTag, 0, 100),
        'fixed_inset_0' => $hasFixedInset0,
        'cover_classes' => $coverClasses,
        'has_open_btn' => $hasOpenAction,
        'open_text' => substr($openBtnText, 0, 50),
        'body_overflow_hidden' => $bodyOverflowHidden,
        'has_floating_box_issue' => $hasFloatingBoxIssue,
    ];
}

echo "========================================================================\n";
echo "COVER SCREEN AUDIT FOR ALL TEMPLATES\n";
echo "========================================================================\n\n";

$issues = [];
foreach ($results as $name => $r) {
    $status = 'OK';
    $notes = [];
    if (!$r['cover_found']) {
        $status = 'NO COVER FOUND';
        $notes[] = 'No cover container detected';
    } elseif (!$r['fixed_inset_0']) {
        $status = 'NOT FIXED INSET-0';
        $notes[] = 'Cover does not use fixed inset-0';
    }
    if (!$r['has_open_btn']) {
        $status = 'NO OPEN BTN';
        $notes[] = 'No open button found';
    }
    if ($r['has_floating_box_issue']) {
        $status = 'FLOATING CARD ISSUE';
        $notes[] = 'Possible floating box/margin over dark backdrop';
    }

    if ($status !== 'OK') {
        $issues[$name] = $notes;
        echo "[!] $name: $status -> " . implode(', ', $notes) . "\n";
        echo "    Tag: " . $r['cover_tag_preview'] . "\n\n";
    } else {
        echo "[OK] $name: Fullscreen cover (fixed inset-0), Button: '{$r['open_text']}'\n";
    }
}

echo "\n========================================================================\n";
echo "TOTAL: " . count($results) . " templates checked. Issues found: " . count($issues) . "\n";
echo "========================================================================\n";
