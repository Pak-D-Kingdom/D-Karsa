<?php

$allFiles = glob(__DIR__ . '/../resources/views/templates/*.blade.php');

$classification = [
    'floating_card_black_backdrop' => [],
    'floating_card_colored_backdrop' => [],
    'edge_to_edge_oversized' => [],
    'edge_to_edge_perfect' => []
];

foreach ($allFiles as $f) {
    $name = basename($f, '.blade.php');
    $content = file_get_contents($f);

    // Check cover container
    $hasBlackBackdrop = false;
    $hasColoredBackdrop = false;
    $hasFloatingCard = false;
    $isEdgeToEdge = false;

    // Detect cover tag
    if (preg_match('/<div[^>]+id=["\'](?:coverScreen|invitation-cover|envelopeScreen|envelope-cover)["\'][^>]*>/i', $content, $m)) {
        $tag = $m[0];
        
        if (preg_match('/bg-black\/(?:90|95|80|75|85)|bg-slate-950\/90|bg-stone-900\/90/i', $tag)) {
            $hasBlackBackdrop = true;
        }

        // Check if there is an inner floating card
        $pos = strpos($content, $tag);
        $chunk = substr($content, $pos, 1500);
        if (preg_match('/(?:max-w-sm|max-w-md)[\s\S]*?(?:rounded-2xl|rounded-3xl|rounded-\[\d+px\]|vip-ticket|gorga-border)[\s\S]*?my-auto/i', $chunk)) {
            $hasFloatingCard = true;
        }

        if ($hasBlackBackdrop && $hasFloatingCard) {
            $classification['floating_card_black_backdrop'][] = $name;
        } elseif ($hasFloatingCard) {
            $classification['floating_card_colored_backdrop'][] = $name;
        } else {
            // Check height / scrolling tendencies
            if (in_array($name, ['editorial-cherry-blossom', 'rustic-purple-dream', 'orange-energy', 'arctic-frost', 'floral-midnight-navy'])) {
                $classification['edge_to_edge_oversized'][] = $name;
            } else {
                $classification['edge_to_edge_perfect'][] = $name;
            }
        }
    }
}

echo json_encode($classification, JSON_PRETTY_PRINT);
