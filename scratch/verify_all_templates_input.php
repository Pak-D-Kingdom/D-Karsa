<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Services\TemplateManager;

$templates = TemplateManager::all();
$results = [];
$total = count($templates);
$current = 0;

echo "=================================================================\n";
echo "AUDIT SINKRONISASI DATA INPUT & TAMPILAN 32 TEMPLATE UNDANGAN D-KARSA\n";
echo "=================================================================\n\n";

foreach ($templates as $templateKey => $tmpl) {
    $template = $tmpl;
    if ($templateKey === 'custom-request') continue;
    $current++;
    $cat = $tmpl['category'] ?? 'Pernikahan';
    $isWedding = ($cat === 'Pernikahan');

    // Unique tokens for this template
    $timestamp = time() . '_' . $current;
    $slug = 'uji-' . $templateKey . '-' . $timestamp;
    $primaryName = 'NamaUji_' . str_replace('-', '_', $templateKey);
    $partnerName = 'PasanganUji_' . str_replace('-', '_', $templateKey);
    $primaryFullName = 'NamaLengkap_' . str_replace('-', '_', $templateKey);
    $partnerFullName = 'PasanganLengkap_' . str_replace('-', '_', $templateKey);
    $heading = 'JUDUL_UJI_' . strtoupper(str_replace('-', '_', $templateKey));
    $quoteText = 'Kutipan_Indah_Penuh_Makna_' . str_replace('-', '_', $templateKey);
    $eventTitle = 'SesiAcara_' . str_replace('-', '_', $templateKey);
    $eventVenue = 'GedungUtama_' . str_replace('-', '_', $templateKey);
    $eventAddress = 'Jl. Protokol No. 77_' . str_replace('-', '_', $templateKey);
    $guestName = 'Bapak_TamuKehormatan_' . str_replace('-', '_', $templateKey);
    $bankName = 'BankUji_' . str_replace('-', '_', $templateKey);
    $bankAccount = '88800' . sprintf('%05d', $current);
    $bankHolder = 'PemilikUji_' . str_replace('-', '_', $templateKey);

    // 1. Insert into database
    $couple = Couple::create([
        'slug' => $slug,
        'category' => $cat,
        'sub_category' => $tmpl['badge'] ?? 'Sub Kategori Uji',
        'theme' => $tmpl['name'],
        'status' => 'published',
        'package_name' => $tmpl['package'] ?? 'Paket Premium',
        'amount' => 110000,
        'customer_name' => 'Tester D-Karsa',
        'customer_phone' => '081234567890',
        'event_heading' => $heading,
        'groom_name' => $primaryName,
        'groom_fullname' => $primaryFullName,
        'bride_name' => $partnerName,
        'bride_fullname' => $partnerFullName,
        'wedding_date' => '2026-11-28',
        'quote' => $quoteText,
        'cover_photo' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200',
        'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600',
        'bride_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600',
        'bank_name_1' => $bankName,
        'bank_account_1' => $bankAccount,
        'bank_holder_1' => $bankHolder,
        'gift_address' => 'Alamat Kirim Hadiah Uji No. 99',
    ]);

    // 2. Insert Events
    $event1 = Event::create([
        'couple_id' => $couple->id,
        'title' => $eventTitle,
        'date' => '2026-11-28',
        'start_time' => '10:00',
        'end_time' => '13:00',
        'venue_name' => $eventVenue,
        'address' => $eventAddress,
        'maps_url' => 'https://maps.google.com/?q=TestVenue',
        'sort_order' => 1
    ]);

    $couple->load(['events', 'galleries', 'wishes']);

    // 3. Render View
    $guest = (object)[
        'name' => $guestName,
        'slug' => 'tamu-kehormatan',
        'category' => 'Tamu Kehormatan',
        'quota' => 2
    ];
    $wishes = collect([]);
    $isAdminPreview = false;
    $isDemo = false;
    $galleries = $couple->galleries;

    $renderError = null;
    $html = '';
    try {
        $html = view($tmpl['blade'], compact('couple', 'guest', 'wishes', 'isAdminPreview', 'template', 'isDemo', 'galleries'))->render();
    } catch (\Throwable $e) {
        $renderError = $e->getMessage();
    }

    // 4. Verify Content
    $checks = [];
    $evidence = [];

    // Helper to extract context snippet around a match
    $extractSnippet = function($haystack, $needle) {
        $pos = strpos($haystack, $needle);
        if ($pos === false) return null;
        $start = max(0, $pos - 40);
        $len = strlen($needle) + 80;
        $raw = substr($haystack, $start, $len);
        // Clean whitespace
        return trim(preg_replace('/\s+/', ' ', strip_tags($raw)));
    };

    // Primary Name check (Groom, Celebrant, Host, Graduate, Deceased, Child)
    $hasPrimary = str_contains($html, $primaryName) || str_contains($html, $primaryFullName);
    $checks['primary_name'] = $hasPrimary;
    if ($hasPrimary) {
        $evidence['primary_name'] = $extractSnippet($html, $primaryName) ?: $extractSnippet($html, $primaryFullName);
    }

    // Partner Name check (For wedding templates)
    if ($isWedding) {
        $hasPartner = str_contains($html, $partnerName) || str_contains($html, $partnerFullName);
        $checks['partner_name'] = $hasPartner;
        if ($hasPartner) {
            $evidence['partner_name'] = $extractSnippet($html, $partnerName) ?: $extractSnippet($html, $partnerFullName);
        }
    }

    // Event Heading check
    $hasHeading = str_contains($html, $heading);
    $checks['event_heading'] = $hasHeading;
    if ($hasHeading) {
        $evidence['event_heading'] = $extractSnippet($html, $heading);
    }

    // Event Title / Venue check
    $hasEvent = str_contains($html, $eventTitle) || str_contains($html, $eventVenue);
    $checks['event_details'] = $hasEvent;
    if ($hasEvent) {
        $evidence['event_details'] = $extractSnippet($html, $eventTitle) ?: $extractSnippet($html, $eventVenue);
    }

    // Guest Name check
    $hasGuest = str_contains($html, $guestName);
    $checks['guest_name'] = $hasGuest;
    if ($hasGuest) {
        $evidence['guest_name'] = $extractSnippet($html, $guestName);
    }

    // Bank Account check (Optional in some corporate/reuni/seminar designs)
    $hasBank = str_contains($html, $bankName) || str_contains($html, $bankAccount) || str_contains($html, $bankHolder);
    if ($hasBank) {
        $checks['bank_gift'] = true;
        $evidence['bank_gift'] = $extractSnippet($html, $bankAccount) ?: $extractSnippet($html, $bankName);
    }

    // Quote check
    $hasQuote = str_contains($html, $quoteText);
    if ($hasQuote) {
        $checks['quote'] = true;
        $evidence['quote'] = $extractSnippet($html, $quoteText);
    }

    // 5. Delete from database immediately
    $couple->events()->delete();
    $couple->delete();
    $deleted = !Couple::where('id', $couple->id)->exists();

    $isAllPassed = $hasPrimary && $hasHeading && $hasEvent && $hasGuest && (!$isWedding || ($checks['partner_name'] ?? false));

    $results[$templateKey] = [
        'template' => $templateKey,
        'name' => $tmpl['name'],
        'category' => $cat,
        'passed' => $isAllPassed && $deleted,
        'deleted_from_db' => $deleted,
        'checks' => $checks,
        'evidence' => $evidence,
        'render_error' => $renderError
    ];

    $statusIcon = ($isAllPassed && $deleted) ? '✅ PASS' : '❌ FAIL';
    echo sprintf("[%02d/%02d] %s | %-28s | %-20s | Primary: %s | Event: %s | DB Wiped: %s\n",
        $current,
        $total,
        $statusIcon,
        $templateKey,
        $cat,
        $hasPrimary ? 'YES' : 'NO',
        $hasEvent ? 'YES' : 'NO',
        $deleted ? 'YES' : 'NO'
    );
}

// Save detailed report
$reportPath = 'C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/input_data_verification_report.json';
file_put_contents($reportPath, json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "\n=================================================================\n";
$passCount = count(array_filter($results, fn($r) => $r['passed']));
echo "TOTAL: $passCount / $total TEMPLATE BERHASIL DIVERIFIKASI & DIHAPUS DARI DB!\n";
echo "Laporan bukti tersimpan di: $reportPath\n";
echo "=================================================================\n";
