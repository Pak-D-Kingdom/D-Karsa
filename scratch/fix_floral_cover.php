<?php
$file = 'resources/views/templates/floral-midnight-navy.blade.php';
$c = file_get_contents($file);

// 1. Update z-50 to z-[60] and add invitation-cover
$c = str_replace(
    'class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-background flex flex-col items-center justify-center px-2 sm:px-6 py-3 sm:py-6 transition-all duration-700 ease-in-out" id="envelope-cover"',
    'class="fixed inset-0 z-[60] overflow-y-auto overscroll-contain bg-background flex flex-col items-center justify-center px-2 sm:px-6 py-3 sm:py-6 transition-all duration-700 ease-in-out" id="envelope-cover"',
    $c
);

// 2. In triggerOpenEnvelope, support both envelope-cover and invitation-cover
$c = str_replace(
    "const envelopeCover = document.getElementById('envelope-cover');",
    "const envelopeCover = document.getElementById('envelope-cover') || document.getElementById('invitation-cover');",
    $c
);

file_put_contents($file, $c);
echo "floral-midnight-navy updated!\n";
