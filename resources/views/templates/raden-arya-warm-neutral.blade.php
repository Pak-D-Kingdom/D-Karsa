<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Kisah Raden Arya: Sahabat Rimba Kencana') . ' - ' . ($couple->groom_name ?? 'Raden Arya & Harimau Kencana') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Raden Arya & Harimau Kencana' }} - Tema Karakter Original - Tradisional Nusantara Warm Neutral."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600&amp;family=EB+Garamond:wght@500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "outline-variant": "#d2c4bd", "on-primary-container": "#baa599", "primary-fixed-dim": "#d9c2b6", "on-error": "#ffffff", "surface": "#fcf9f3", "surface-container-highest": "#e5e2dc", "surface-tint": "#6c5b51", "background": "#fcf9f3", "secondary": "#9c432f", "surface-container-lowest": "#ffffff", "surface-container-high": "#ebe8e2", "on-primary-fixed": "#251911", "error-container": "#ffdad6", "on-secondary-fixed-variant": "#7d2c1a", "inverse-on-surface": "#f3f0ea", "on-primary": "#ffffff", "tertiary-fixed-dim": "#e9c176", "on-surface": "#1c1c18", "tertiary-fixed": "#ffdea5", "on-secondary-container": "#762715", "on-error-container": "#93000a", "surface-container": "#f0eee8", "tertiary-container": "#523a00", "surface-variant": "#e5e2dc", "surface-container-low": "#f6f3ed", "on-primary-fixed-variant": "#53443a", "secondary-fixed": "#ffdad3", "secondary-fixed-dim": "#ffb4a4", "inverse-surface": "#31312d", "on-background": "#1c1c18", "error": "#ba1a1a", "secondary-container": "#ff8f76", "on-secondary-fixed": "#3d0600", "surface-bright": "#fcf9f3", "tertiary": "#372500", "on-tertiary-container": "#c9a45c", "outline": "#80756f", "on-tertiary": "#ffffff", "primary-container": "#4a3b32", "inverse-primary": "#d9c2b6", "primary-fixed": "#f6ded1", "on-tertiary-fixed-variant": "#5d4201", "primary": "#33251d", "on-surface-variant": "#4e4540", "on-tertiary-fixed": "#261900", "surface-dim": "#dcdad4", "on-secondary": "#ffffff" }, borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, spacing: { "space-md": "1rem", "space-sm": "0.5rem", "margin-mobile": "1.25rem", "space-xl": "2.5rem", "space-xs": "0.25rem", "gutter-mobile": "1rem", "gutter": "1.5rem", "margin": "3rem", "space-lg": "1.5rem" }, fontFamily: { "label-lg": ["Be Vietnam Pro"], "display": ["EB Garamond"], "body-lg": ["Be Vietnam Pro"], "headline-sm": ["EB Garamond"], "label-sm": ["Be Vietnam Pro"], "headline-lg-mobile": ["EB Garamond"], "title-lg": ["EB Garamond"], "display-mobile": ["EB Garamond"], "body-sm": ["Be Vietnam Pro"], "label-md": ["Be Vietnam Pro"], "headline-lg": ["EB Garamond"], "title-md": ["Be Vietnam Pro"], "body-md": ["Be Vietnam Pro"], "headline-md": ["EB Garamond"], "headline-md-mobile": ["EB Garamond"] }, fontSize: { "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.04em", "fontWeight": "600"}], "display": ["56px", {"lineHeight": "64px", "letterSpacing": "-0.01em", "fontWeight": "500"}], "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}], "headline-sm": ["22px", {"lineHeight": "28px", "letterSpacing": "0.01em", "fontWeight": "600"}], "label-sm": ["10px", {"lineHeight": "14px", "letterSpacing": "0.08em", "fontWeight": "600"}], "headline-lg-mobile": ["30px", {"lineHeight": "36px", "letterSpacing": "0em", "fontWeight": "500"}], "title-lg": ["20px", {"lineHeight": "26px", "letterSpacing": "0.02em", "fontWeight": "600"}], "display-mobile": ["38px", {"lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "500"}], "body-sm": ["13px", {"lineHeight": "20px", "fontWeight": "400"}], "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.06em", "fontWeight": "500"}], "headline-lg": ["40px", {"lineHeight": "48px", "letterSpacing": "0em", "fontWeight": "500"}], "title-md": ["16px", {"lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "600"}], "body-md": ["15px", {"lineHeight": "24px", "fontWeight": "400"}], "headline-md": ["30px", {"lineHeight": "38px", "letterSpacing": "0.01em", "fontWeight": "600"}], "headline-md-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "0.01em", "fontWeight": "600"}] } } } }
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
            -webkit-tap-highlight-color: transparent;
        }
        * {
            box-sizing: border-box;
        }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined', 'Material Icons', sans-serif !important;
            font-weight: normal;
            font-style: normal;
            line-height: 1;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased overflow-hidden">

    @php
        $celebrantName = $couple->groom_name ?? 'Raden Arya & Harimau Kencana';
        $celebrantNick = $couple->groom_nickname ?? 'Arya';
        $heading = $couple->event_heading ?? 'Kisah Raden Arya: Sahabat Rimba Kencana';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dengan tema kartun atau karakter original';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Acara Utama & Perayaan Spesial',
                    'date' => !empty($couple->wedding_date) ? (is_string($couple->wedding_date) ? $couple->wedding_date : $couple->wedding_date->format('Y-m-d')) : now()->format('Y-m-d'),
                    'start_time' => $couple->wedding_time ?? '18.30 WIB',
                    'end_time' => '22.00 WIB',
                    'venue_name' => $venueName,
                    'address' => $venueAddress,
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1
                ]
            ]);
        }
        $quote = $couple->quote ?? 'Menapaki rimba kencana, merajut kebaikan budi pekerti, dan menyalakan lentera harapan bagi sesama.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBIs_DVv-07jQdxsdSfqGYfJ8RQTrrmVrHUjRtUQZHQfllndeZysSk5zj1-efvi4TQ6C0pcDqxjn-9gP54G-jsMunYXri7vr5suac-XnmtVm9phPBRjrXenKM487lqw2ugrfzcMe69xp0pj1uPJvr59rg3KFlYG61idVoqSYvueUWXZgVDVmZlGzjBOqhLaGLVzbY-kEzea733nmEAndoCXP6OcVCs1xvXbBwl87HR4';
        $profileImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            $defaultProfileImg
        );

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? $couple->wedding_time : '18.30 WIB - Selesai';

        $venueName = $couple->venue_name ?? 'Plataran Dharmawangsa';
        $venueAddress = $couple->venue_address ?? 'Jl. Dharmawangsa Raya No. 6, Pulo, Kebayoran Baru, Jakarta Selatan';
        $mapsUrl = !empty($couple->maps_url) ? $couple->maps_url : (!empty($couple->google_maps_url) ? $couple->google_maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));

        $familyLine = !empty($couple->groom_parents) ? $couple->groom_parents : (!empty($couple->groom_father) && !empty($couple->groom_mother) ? ('Bpk. ' . $couple->groom_father . ' & Ibu ' . $couple->groom_mother) : 'Keluarga Besar');

        // Bank / Digital Gift Info
        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'Bank BCA';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->account_number ?? '873 019 4421';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->account_name ?? $celebrantName;

        $bankName2 = $couple->bank_name_2 ?? 'Bank Mandiri';
        $bankAccount2 = $couple->bank_account_2 ?? '137 00 2938 1092';
        $bankHolder2 = $couple->bank_holder_2 ?? $celebrantName;

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBIs_DVv-07jQdxsdSfqGYfJ8RQTrrmVrHUjRtUQZHQfllndeZysSk5zj1-efvi4TQ6C0pcDqxjn-9gP54G-jsMunYXri7vr5suac-XnmtVm9phPBRjrXenKM487lqw2ugrfzcMe69xp0pj1uPJvr59rg3KFlYG61idVoqSYvueUWXZgVDVmZlGzjBOqhLaGLVzbY-kEzea733nmEAndoCXP6OcVCs1xvXbBwl87HR4', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBGxoo0eb4lhzdfTUIHrqIaU1FRKSmvC1Ln9OvLFABegN3vuKt7DSQOBpHEjdRcaq1iUgH5Iqy0-x9eSbwzzHKqpJK8DB6o2pZAhbJevjWzFtq9r65n61_qshoi932qvzA9fCw-7Q7oFcxc-evzR94Kq1OZxFhceW2M4SHGymNkDlUrltAwOor59CVgUhgk0nHjIG_986LAT0Gx3oBNsfiN61Gwn8wDGxvFu0JXd9e5', 'caption' => 'Momen Bahagia #3'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCd5V6j6PcPHF-gyob1XX2aJ_T5pA5TGYgq3cUEXDL3MTMG23xEXU4jvMmZuANsxd9IwGxh8xT2qcfQmLKmVO1EbF9WBbhOBjGciuN3XRKcewN1ZZ7ByRhXDBuY-TsN3kT0jyFamMaX-pWj1XTlMT_vxMU_gmuX_DiFDLk8hL3bN-pS4lAiuDXz-ktJ-s2hFtBDMmhNrgoVV4PpQSPYpwoot40pu8Ww2IetBoeOVtOT', 'caption' => 'Momen Bahagia #4'],
            ]);
        }

        // Dynamic Events
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Evening Welcome & Reception',

                    'date' => $eventDateFormatted,

                    'start_time' => '18:30 WIB',

                    'end_time' => '19:30 WIB',

                    'venue_name' => $venueName,

                    'address' => $venueAddress,

                    'maps_url' => $mapsUrl,

                    'sort_order' => 1,

                ],
                (object)[
                    'title' => 'Celebration Gala & Toast',

                    'date' => $eventDateFormatted,

                    'start_time' => '19:30 WIB',

                    'end_time' => '21:30 WIB',

                    'venue_name' => 'Main Ballroom Stage',

                    'address' => $venueAddress,

                    'maps_url' => $mapsUrl,

                    'sort_order' => 2,

                ],
            ]);
        }
    @endphp

    <!-- Background Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Feedback Toast -->
    <div id="toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 max-w-xs px-4 py-2.5 rounded-xl bg-on-surface text-surface text-xs font-medium text-center opacity-0 pointer-events-none transition-opacity duration-300 z-[120] shadow-2xl flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-[18px]">verified</span>
        <span id="toast-message">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: DIGITAL ENVELOPE (Tampilan Awal Amplop)
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-[60] overflow-y-auto overscroll-contain bg-surface flex flex-col items-center justify-between transition-all duration-700 ease-in-out select-none">
        <main class="flex-1 flex flex-col relative w-full bg-surface"><div class="flex flex-col w-full relative select-none">
<!-- Interactive Fullscreen Envelope Canvas -->
<div class="relative w-full flex flex-col justify-between py-6 px-4 box-border overflow-hidden">
<!-- Background Motif Watermark -->
<div class="absolute inset-0 pointer-events-none flex items-center justify-center opacity-5">
<svg class="w-96 h-96 text-primary" fill="currentColor" viewbox="0 0 200 200">
<path d="M100 15 C110 50 150 90 185 100 C150 110 110 150 100 185 C90 150 50 110 15 100 C50 90 90 50 100 15 Z"></path>
<circle cx="100" cy="100" fill="none" r="45" stroke="currentColor" stroke-width="1.5"></circle>
<circle cx="100" cy="100" fill="none" r="65" stroke="currentColor" stroke-width="1"></circle>
</svg>
</div>
<!-- Header Section: Cultural Badge & Audio Teaser -->
<div class="relative z-10 flex flex-col items-center text-center space-y-2">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high shadow-sm">
<span class="text-tertiary-fixed-dim text-label-sm">✦</span>
<span class="font-label-sm text-label-sm text-on-surface tracking-widest uppercase">Kisah Maha Karya Nusantara • Edisi Khusus</span>
<span class="text-tertiary-fixed-dim text-label-sm">✦</span>
</div>
<!-- Audio Track Pill -->
<button class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-low shadow-sm active:scale-95 transition-transform duration-200" id="audio-toggle" type="button" onclick="toggleMusic()">
<span class="material-symbols-outlined text-secondary text-[16px] animate-pulse">graphic_eq</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium tracking-wide">Gending Rimba &amp; Warm Neutral Harmony</span>
<span class="w-1.5 h-1.5 rounded-full bg-secondary" id="audio-status-dot"></span>
</button>
</div>
<!-- Center Stage: The Imperial Wax Seal & Royal Titles -->
<div class="relative z-10 flex flex-col items-center text-center my-4">
<!-- Interactive Wax Seal Core -->
<div class="relative flex items-center justify-center cursor-pointer group" id="wax-seal-wrapper">
<!-- Radiant Glow Rings -->
<div class="absolute -inset-4 rounded-full bg-tertiary-fixed-dim/20 blur-md group-hover:scale-110 transition-all duration-700 animate-pulse"></div>
<div class="absolute -inset-1.5 rounded-full bg-surface-container-high shadow-md"></div>
<!-- Seal Image Container -->
<div class="relative w-28 h-28 rounded-full overflow-hidden shadow-xl bg-primary-container p-0.5 active:rotate-12 transition-transform duration-300">
<img alt="Segel Keraton Nusantara" class="w-full h-full object-cover rounded-full" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<!-- Floating interactive indicator -->
<div class="absolute -bottom-3 bg-primary text-surface-container-lowest px-3 py-0.5 rounded-full shadow-md">
<p class="font-label-sm text-label-sm tracking-wider flex items-center gap-1">
<span class="text-tertiary-fixed-dim">◆</span> KETUK SEGEL <span class="text-tertiary-fixed-dim">◆</span>
</p>
</div>
</div>
<!-- Royal Epithet -->
<div class="mt-6 flex flex-col items-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-1">
          Perayaan Ulang Tahun Karakter Orisinal
        </span>
<h1 class="font-display-mobile text-display-mobile text-primary tracking-tight leading-tight" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<!-- Signature Bronze Divider Glyph -->
<div class="flex items-center justify-center gap-3 my-2 w-full max-w-[220px]">
<span class="h-[1px] flex-1 bg-gradient-to-r from-transparent to-outline-variant"></span>
<span class="text-on-tertiary-container text-[11px] leading-none">❖</span>
<span class="h-[1px] flex-1 bg-gradient-to-l from-transparent to-outline-variant"></span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs italic leading-relaxed px-4">
          “Menapaki rimba kencana, merajut kebaikan budi pekerti, dan menyalakan lentera harapan di tanah Nusantara.”
        </p>
</div>
</div>
<!-- VIP Guest Pass Card -->
<div class="relative z-10 w-full max-w-sm mx-auto mb-3">
<div class="relative bg-surface-container-lowest rounded-xl shadow-md p-4 transition-all duration-300">
<!-- Header Access Tag -->
<div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1.5 pb-2 mb-2 bg-surface-container-low -mx-4 -mt-4 px-4 pt-3 rounded-t-xl">
<div class="flex items-center gap-1.5 shrink-0">
<span class="material-symbols-outlined text-[14px] text-secondary">verified</span>
<span class="font-label-sm text-xs uppercase tracking-wider text-secondary font-semibold">Tamu Kehormatan</span>
</div>
<span class="font-label-sm text-[10.5px] px-2 py-0.5 rounded bg-surface text-on-surface-variant font-mono shrink-0 ml-auto sm:ml-0">PASS: NO. 009-NUSA</span>
</div>
<!-- Invitation Addressee -->
<div class="text-left space-y-1">
<p class="font-label-sm text-xs tracking-wider uppercase text-outline">Kepada Yth. Tamu Kehormatan:</p>
<div class="flex items-baseline justify-between">
<p class="font-headline-sm-mobile text-lg text-primary font-semibold tracking-wide" id="previewGuestNameCover">
{{ $guestName }}
</p>
<span class="font-label-sm text-label-sm text-on-surface-variant bg-surface-container px-2 py-0.5 rounded">Di Tempat</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed pt-1">
            Merupakan suatu kehormatan agung bagi kami menyambut kehadiran Anda dalam perayaan hangat berbalut tradisi dan sukacita kencana ini.
          </p>
</div>
</div>
</div>
<!-- Actions & Event Metadata -->
<div class="relative z-10 flex flex-col items-center text-center space-y-3">
<!-- Primary Open CTA Envelope Action -->
<button class="w-full max-w-sm bg-gradient-to-r from-primary to-primary-container text-surface-container-lowest py-3.5 px-6 rounded-lg shadow-lg flex items-center justify-center gap-3 active:scale-[0.98] transition-transform duration-200" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed-dim">mark_email_read</span>
<span class="font-label-lg text-label-lg tracking-wider font-medium">BUKA UNDANGAN RESMI</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
<!-- Event Details Bar -->
<div class="w-full max-w-sm grid grid-cols-2 gap-2 text-left">
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">calendar_today</span>
<div class="min-w-0">
<p class="font-label-sm text-label-sm text-outline uppercase leading-none">Hari &amp; Tanggal</p>
<p class="font-title-md text-title-md text-on-surface truncate">{{ $eventDateFormatted }}</p>
</div>
</div>
<div class="bg-surface-container-low p-2.5 rounded-lg flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
<div class="min-w-0">
<p class="font-label-sm text-label-sm text-outline uppercase leading-none">Lokasi Acara</p>
<p class="font-title-md text-title-md text-on-surface truncate">Plataran GBK, Jkt</p>
</div>
</div>
</div>
<!-- Dress Code Pill -->
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-surface-container text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-outline">styler</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider">
          Dress Code: Tradisional Kontemporer / Warm Neutral &amp; Batik
        </span>
</div>
</div>
</div>
</div>
<script>
  (function() {
    const seal = document.getElementById('wax-seal-wrapper');
    const openBtn = document.getElementById('open-invitation-btn');
    const audioToggle = document.getElementById('audio-toggle');
    const audioDot = document.getElementById('audio-status-dot');
    let isPlaying = false;

    function handleOpen() {
      // Tactile burst animation
      if (seal) {
        seal.classList.add('scale-110');
        setTimeout(() => seal.classList.remove('scale-110'), 250);
      }
      if (openBtn) {
        openBtn.classList.add('opacity-80');
        setTimeout(() => openBtn.classList.remove('opacity-80'), 200);
      }
      
      // Dispatch custom invitation reveal event
      const event = new CustomEvent('invitation:open', { detail: { guest: '{{ $guestName }}' } });
      window.dispatchEvent(event);
      if (typeof openInvitation === 'function') openInvitation();
    }

    if (seal) seal.addEventListener('click', handleOpen);
    if (openBtn) openBtn.addEventListener('click', handleOpen);

    if (audioToggle) {
      audioToggle.addEventListener('click', function() {
        isPlaying = !isPlaying;
        if (audioDot) {
          audioDot.classList.toggle('bg-secondary', isPlaying);
          audioDot.classList.toggle('bg-outline', !isPlaying);
        }
      });
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(74,59,50,0.05)]"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm"><span class="material-symbols-outlined text-secondary text-title-lg select-none">local_florist</span><div class="flex flex-col"><span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant leading-none">Peringatan Weton</span><h1 class="font-title-lg text-title-lg text-primary tracking-wide leading-none mt-0.5" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-sm"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Musik" class="w-11 h-11 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-surface-container-high transition-colors cursor-pointer"><span class="material-symbols-outlined text-title-md">music_note</span></button><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99"/></div></div></header><main class="flex-1 flex flex-col relative w-full pt-16 pb-24 bg-surface"><div class="flex flex-col w-full px-gutter-mobile space-y-space-xl">
<!-- TOP LIVELY AMBIENT BANNER -->
<section class="mt-2 w-full bg-surface-container-high/90 rounded-xl p-space-sm shadow-sm flex flex-col items-center text-center space-y-1">
<div class="flex items-center gap-1.5 text-secondary">
<span class="material-symbols-outlined text-[18px]">workspace_premium</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">
        Perayaan Ulang Tahun Ke-7 &amp; Peluncuran Karakter Orisinal
      </span>
</div>
<div class="inline-flex items-center gap-2 bg-surface-container-lowest/80 px-3 py-1 rounded-full text-on-surface-variant">
<span class="inline-block w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span class="font-label-sm text-label-sm italic text-on-surface-variant">
        ♫ Gamelan Laras Salendro Kencana Sedang Mengalun
      </span>
</div>
</section>
<!-- HERO ARCHED FRAMEWORK -->
<section class="w-full flex flex-col items-center">
<div class="w-full bg-surface-container-lowest rounded-xl p-4 shadow-md flex flex-col items-center text-center relative overflow-hidden">
<!-- Traditional Arch Crest Visual Motif -->
<div class="flex items-center justify-center gap-2 mb-2 text-on-tertiary-container">
<span class="text-xs">✦</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest font-semibold">Maha Karya Nusantara</span>
<span class="text-xs">✦</span>
</div>
<!-- Masterpiece Image Container with Arch Illusion -->
<div class="w-full rounded-t-[5rem] rounded-b-xl overflow-hidden shadow-inner bg-surface-container relative">
<img alt="Raden Arya dan Sang Kancil Kencana di pelataran candi purba" class="w-full h-auto object-cover max-h-[460px] mx-auto select-none" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<!-- Ambient Warm Tint Overlay -->
<div class="absolute inset-0 bg-gradient-to-t from-primary/30 via-transparent to-transparent pointer-events-none"></div>
</div>
<div class="pt-4 pb-1 px-2 flex flex-col items-center">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Sang Penjelajah Rimba</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary mt-1">Raden Arya &amp; Sang Satwa Kencana</h2>
<!-- Ornamental Lozenge Divider -->
<div class="flex items-center justify-center gap-3 my-3 w-3/4">
<div class="h-px bg-outline-variant/60 flex-1"></div>
<span class="text-on-tertiary-container text-xs">❖</span>
<div class="h-px bg-outline-variant/60 flex-1"></div>
</div>
<p class="font-display text-body-lg italic text-on-surface-variant max-w-sm px-2">
          “Di naungan candi purba dan bisikan rimba, keberanian tunas bangsa bersemi membawa lentera budi luhur.”
        </p>
</div>
</div>
</section>
<!-- GUEST HONOR CARD -->
<section class="w-full bg-surface-container-low rounded-xl p-5 shadow-sm relative overflow-hidden">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Kepada Yang Terhormat</span>
<h3 class="font-headline-sm text-headline-sm text-primary mt-0.5"><span id="previewGuestNameMain">{{ $guestName }}</span></h3>
</div>
<span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-2.5 py-1 rounded-full uppercase tracking-wider">
        VIP Guest
      </span>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/90 rounded-lg p-3.5 space-y-2">
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-secondary text-title-md">table_restaurant</span>
<span class="font-body-md text-body-md font-medium">Bale Rimba Suite 01 (2 Tamu Khusus)</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Konfirmasi Kehadiran Mohon Sebelum 28 Nov 2025</span>
</div>
</div>
</section>
<!-- LIVE COUNTDOWN & EVENT DETAILS -->
<section class="w-full bg-primary-container text-on-primary rounded-xl p-5 shadow-md flex flex-col items-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-primary-container">Menuju Waktu Peringatan</span>
<h3 class="font-headline-sm text-headline-sm text-on-primary mt-1 mb-4 text-center">Sabtu Kliwon, 6 Desember 2025</h3>
<!-- 4 Countdown Blocks -->
<div class="grid grid-cols-4 gap-2 w-full max-w-xs mb-5">
<div class="bg-primary/70 rounded-lg py-2.5 flex flex-col items-center shadow-inner">
<span class="font-display text-title-lg font-semibold text-tertiary-fixed" id="timer-days">14</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase">Hari</span>
</div>
<div class="bg-primary/70 rounded-lg py-2.5 flex flex-col items-center shadow-inner">
<span class="font-display text-title-lg font-semibold text-tertiary-fixed" id="timer-hours">08</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase">Jam</span>
</div>
<div class="bg-primary/70 rounded-lg py-2.5 flex flex-col items-center shadow-inner">
<span class="font-display text-title-lg font-semibold text-tertiary-fixed" id="timer-minutes">42</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase">Menit</span>
</div>
<div class="bg-primary/70 rounded-lg py-2.5 flex flex-col items-center shadow-inner">
<span class="font-display text-title-lg font-semibold text-tertiary-fixed" id="timer-seconds">19</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase">Detik</span>
</div>
</div>
<!-- Calendar Link Button -->
<a class="w-full py-2.5 px-4 bg-tertiary-fixed text-on-tertiary-fixed rounded-lg font-label-md text-label-md flex items-center justify-center gap-2 shadow-sm hover:brightness-105 active:scale-[0.99] transition-all" href="https://calendar.google.com" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">event_available</span>
      Simpan ke Google Calendar
    </a>
</section>
<!-- RUNDOWN AGENDA -->
<section class="w-full space-y-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-title-md">schedule</span>
<h3 class="font-headline-sm text-headline-sm text-primary">{{ $couple->events->first()->title ?? "Rangkaian Acara Kencana" }}</h3>
</div>
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm space-y-4" id="itineraryContainer">
@foreach($activeEvents as $index => $event)
    @php
        $evDateStr = $eventDateFormatted;
        if (!empty($event->date)) {
            try {
                $evDateStr = \Carbon\Carbon::parse($event->date)->locale("id")->isoFormat("dddd, D MMMM Y");
            } catch (\Exception $e) {
                $evDateStr = $event->date;
            }
        }
        $evTimeStr = trim(($event->start_time ?? "") . (!empty($event->end_time) ? " - " . $event->end_time : ""));
        if (empty($evTimeStr)) $evTimeStr = "16.00 - 21.00 WIB";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
    @endphp
    <div class="flex gap-3 items-start event-itinerary-item">
        <div class="bg-secondary-fixed/50 text-secondary font-label-md text-label-md px-2 py-1 rounded shrink-0 font-bold">{{ $evTimeStr }}</div>
        <div class="flex-1 min-w-0">
            <span class="text-[10px] text-secondary font-bold uppercase tracking-wider block">SESI {{ $index + 1 }}</span>
            <p class="font-title-md text-title-md text-primary leading-tight font-bold">{{ $event->title ?? ("Acara " . ($index + 1)) }}</p>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary font-semibold block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold">
                    <span class="material-symbols-outlined text-[13px]">location_on</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</section>
<!-- LORE & STORY CHAPTERS -->
<section class="w-full space-y-4">
<div class="text-center space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Babad Lakon Orisinal</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Kisah Sang Ksatria Cilik</h3>
</div>
<!-- 3 Story Chapters -->
<div class="space-y-3">
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col space-y-1.5">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Babak I</span>
<h4 class="font-title-md text-title-md text-primary">Pusaka Rimba Parahyangan</h4>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          Tumbuh di pelataran sanubari kraton yang asri, Raden Arya diajarkan menghargai setiap desir angin, dedaunan purba, dan budi pekerti luhur leluhur tanah Jawa.
        </p>
</div>
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col space-y-1.5">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Babak II</span>
<h4 class="font-title-md text-title-md text-primary">Persahabatan Satwa Kencana</h4>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          Di tengah penjelajahan gerbang batu kuno, Raden Arya berjumpa dengan satwa ajaib bercahaya keemasan yang menjadi penjaga pusaka kelestarian alam nusantara.
        </p>
</div>
<div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm flex flex-col space-y-1.5">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Babak III</span>
<h4 class="font-title-md text-title-md text-primary">Misi Lentera Nusantara</h4>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          Kini, menginjak usia ke-7 tahun, ia siap menyalakan lentera harapan bagi kawan-kawan sebaya untuk memelihara warisan budaya dan menjaga alam pertiwi.
        </p>
</div>
</div>
<!-- 3 Moral Pillars Badges -->
<div class="grid grid-cols-3 gap-2 pt-1">
<div class="bg-surface-container-high rounded-lg p-2.5 text-center flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-title-lg">shield</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Keberanian</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Teguh Bela Alam</span>
</div>
<div class="bg-surface-container-high rounded-lg p-2.5 text-center flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-title-lg">favorite</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Budi Asih</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Rendah Hati</span>
</div>
<div class="bg-surface-container-high rounded-lg p-2.5 text-center flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-title-lg">park</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Cinta Pertiwi</span>
<span class="font-body-sm text-[11px] text-on-surface-variant">Lestari Rimba</span>
</div>
</div>
</section>
<!-- DRESS CODE GUIDE -->
<section class="w-full bg-surface-container-low rounded-xl p-5 shadow-sm space-y-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-title-md">checkroom</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Tata Busana: Warm Neutral &amp; Batik</h3>
</div>
<!-- Swatches -->
<div class="flex items-center justify-between gap-1 px-1">
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full shadow-sm bg-[#F4EFE6]"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Warm Sand</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full shadow-sm bg-[#4A3B32]"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Teak Wood</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full shadow-sm bg-[#B2533E]"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Terracotta</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full shadow-sm bg-[#C5A059]"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Gold Bronze</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full shadow-sm bg-white"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Soft Ivory</span>
</div>
</div>
<!-- Guidelines -->
<div class="bg-surface-container-lowest rounded-lg p-3 space-y-2.5">
<div>
<p class="font-label-md text-label-md text-primary font-semibold">Tamu Pria</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Beskap modern warm neutral atau kemeja batik tulis sogan dengan celana kain rapi.</p>
</div>
<div>
<p class="font-label-md text-label-md text-primary font-semibold">Tamu Wanita</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Kebaya santai bernuansa earth-tone sand/terracotta dipadu kain batik kencana.</p>
</div>
</div>
</section>
<!-- ARTWORK & CREATIVE GALLERY -->
<section class="w-full space-y-3">
<div class="flex items-center justify-between">
<h3 class="font-headline-sm text-headline-sm text-primary">Galeri Eksplorasi Karya</h3>
<span class="font-label-sm text-label-sm text-secondary uppercase font-semibold">4 Pratinjau</span>
</div>
<div id="galleryGridContainer" class="grid grid-cols-2 gap-2.5">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant/30">
    <div class="relative w-full aspect-square bg-surface-container-high overflow-hidden">
      <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-2 flex flex-col">
        <span class="font-body-sm text-[12px] text-primary truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- VENUE & MAP -->
<section class="w-full space-y-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-title-md">place</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Lokasi Perhelatan</h3>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
<div class="w-full h-44 bg-cover bg-center relative" data-location="Hutan Kota by Plataran, Senayan, Jakarta" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAHVUBWz9AAgl5ivtkFMFt5ZH-Fh7IBr9-u7Xsjx62Aavo4_VueIG0Jjfa91uHnsRzmdas4Hs-KTGFZZpXo0VVELPejeJBW3z3mD1unNThZj-CQ3PboTFOOAJp9GSTU_ujMwdgV17ma7S1cErc7XF8AgCkk_FCdaD3FyUZon3ZHyBu5DGMrIbDxdgJFdPQoQllv2I-cNlJzerNlmV4s5EE4tfjUjmsMgf_G0hfOLKsn')">
<div class="absolute inset-0 bg-primary/20 backdrop-blur-[1px] flex items-center justify-center">
<div class="bg-surface-container-lowest/90 px-3.5 py-1.5 rounded-full shadow-md flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary text-title-md">pin_drop</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">Bale Rimba Plataran Gate</span>
</div>
</div>
</div>
<div class="p-4 space-y-3">
<div>
<h4 class="font-title-md text-title-md text-primary">Hutan Kota by Plataran</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Gelora Bung Karno (GBK), Jl. Jend. Sudirman, Senayan, Jakarta Pusat</p>
</div>
<!-- Badges -->
<div class="flex flex-wrap gap-1.5">
<span class="bg-surface-container px-2 py-0.5 rounded text-[11px] font-label-sm text-on-surface-variant">
            🚗 VIP Valet Complimentary
          </span>
<span class="bg-surface-container px-2 py-0.5 rounded text-[11px] font-label-sm text-on-surface-variant">
            🛺 Shuttle Buggy Tersedia
          </span>
<span class="bg-surface-container px-2 py-0.5 rounded text-[11px] font-label-sm text-on-surface-variant">
            📍 Pintu Barat GBK
          </span>
</div>
<div class="grid grid-cols-2 gap-2 pt-1">
<a id="previewMapsLinkMain" class="py-2 px-3 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm flex items-center justify-center gap-1.5 hover:bg-secondary transition-colors" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[16px]">map</span>
            Buka Maps
          </a>
<button class="py-2 px-3 bg-surface-container text-on-surface rounded-lg font-label-sm text-label-sm flex items-center justify-center gap-1.5 hover:bg-surface-container-high transition-colors" onclick="navigator.clipboard.writeText('{{ addslashes($venueAddress) }}'); alert('Alamat disalin ke papan klip!');" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
            Salin Alamat
          </button>
</div>
</div>
</div>
</section>
<!-- RSVP FORM -->
<section class="w-full bg-surface-container-low rounded-xl p-5 shadow-md space-y-4">
<div class="text-center space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Konfirmasi Kehadiran</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Buku Tamu Resepsi</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mohon berkenan mengisi lembar kehormatan di bawah ini</p>
</div>
<form class="space-y-3.5" onsubmit="event.preventDefault(); alert('Matur Nuwun! Konfirmasi kehadiran Anda telah tercatat dengan berkah.');">
<div>
<label class="block font-label-md text-label-md uppercase tracking-wider text-primary mb-1">Nama Tamu Kehormatan</label>
<input class="w-full bg-surface-container-lowest rounded-lg p-2.5 font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-tertiary-fixed shadow-inner" type="text" value="{{ $guestName }}"/>
</div>
<div>
<label class="block font-label-md text-label-md uppercase tracking-wider text-primary mb-1.5">Status Kehadiran</label>
<div class="space-y-1.5">
<label class="flex items-center gap-2.5 p-2 bg-surface-container-lowest rounded-lg cursor-pointer">
<input checked="" class="accent-secondary text-secondary w-4 h-4" name="kehadiran" type="radio" value="2"/>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Hadir Berdua (2 Kursi Reservasi)</span>
</label>
<label class="flex items-center gap-2.5 p-2 bg-surface-container-lowest rounded-lg cursor-pointer">
<input class="accent-secondary text-secondary w-4 h-4" name="kehadiran" type="radio" value="1"/>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Hadir Sendiri (1 Kursi Reservasi)</span>
</label>
<label class="flex items-center gap-2.5 p-2 bg-surface-container-lowest rounded-lg cursor-pointer">
<input class="accent-secondary text-secondary w-4 h-4" name="kehadiran" type="radio" value="0"/>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Mohon Maaf, Berhalangan Hadir</span>
</label>
</div>
</div>
<div>
<label class="block font-label-md text-label-md uppercase tracking-wider text-primary mb-1">Buah Hati Pendamping</label>
<select class="w-full bg-surface-container-lowest rounded-lg p-2.5 font-body-md text-body-md text-on-surface focus:outline-none">
<option>Tidak Membawa Anak</option>
<option>1 Anak (Di Bawah 10 Tahun)</option>
<option>2 Anak (Di Bawah 10 Tahun)</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md uppercase tracking-wider text-primary mb-1">Untaian Doa &amp; Restu</label>
<textarea class="w-full bg-surface-container-lowest rounded-lg p-2.5 font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-tertiary-fixed shadow-inner" placeholder="Tuliskan doa tulus untuk ksatria cilik Raden Arya..." rows="3"></textarea>
</div>
<button class="w-full py-3 bg-secondary text-on-secondary rounded-lg font-label-lg text-label-lg uppercase tracking-wider shadow hover:brightness-110 active:scale-[0.99] transition-all" type="submit">
        Kirim Konfirmasi Kehadiran
      </button>
</form>
</section>
<!-- PRAYER MESSAGES FEED (GUESTBOOK) -->
<section class="w-full space-y-3">
<div class="flex items-center justify-between">
<h3 class="font-headline-sm text-headline-sm text-primary">Untaian Doa Tamu Kencana</h3>
<span class="font-label-sm text-label-sm text-secondary font-semibold">12 Pesan Masuk</span>
</div>
<div class="space-y-2.5">
<div class="bg-surface-container-lowest rounded-xl p-3.5 shadow-sm space-y-1">
<div class="flex items-center justify-between">
<span class="font-title-md text-sm text-primary font-semibold">Keluarga Besar Sasongko</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">10 mnt lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          “Dirgahayu ke-7 Raden Arya! Semoga karakter orisinal ini menjadi lentera inspirasi bagi generasi anak nusantara.”
        </p>
</div>
<div class="bg-surface-container-lowest rounded-xl p-3.5 shadow-sm space-y-1">
<div class="flex items-center justify-between">
<span class="font-title-md text-sm text-primary font-semibold">Bima &amp; Larasati</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">1 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          “Bangga melihat karya luhur bertema tradisi diwujudkan begitu apik dan megah. Sampai jumpa di Bale Rimba!”
        </p>
</div>
</div>
</section>
<!-- TANDA KASIH KENCANA (DIGITAL GIFT) -->
<section class="w-full bg-surface-container-low rounded-xl p-5 shadow-sm space-y-3.5 text-center">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Tanda Kasih Kencana</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Kado &amp; Dana Konservasi Rimba</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
      Kehadiran dan doa restu Bapak/Ibu merupakan kado terindah. Jika berkenan memberi tanda kasih, dana akan dialokasikan sebagian untuk pelestarian satwa &amp; edukasi budaya anak:
    </p>
<div class="space-y-2 pt-1 text-left">
<!-- Bank 1 Card -->
<div class="bg-surface-container-lowest rounded-lg p-3 flex items-center justify-between shadow-sm mb-3">
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-bold">{{ $bankName1 }}</span>
<p class="font-title-md text-base text-primary font-semibold tracking-wider" id="bca-num">{{ $bankAccount1 }}</p>
<p class="font-body-sm text-xs text-on-surface-variant">a.n. {{ $bankHolder1 }}</p>
</div>
<button class="bg-surface-container-high text-primary hover:bg-secondary hover:text-on-secondary px-3 py-1.5 rounded text-xs font-label-md transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-lowest rounded-lg p-3 flex items-center justify-between shadow-sm">
<div>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-bold">{{ $bankName2 }}</span>
<p class="font-title-md text-base text-primary font-semibold tracking-wider" id="mandiri-num">{{ $bankAccount2 }}</p>
<p class="font-body-sm text-xs text-on-surface-variant">a.n. {{ $bankHolder2 }}</p>
</div>
<button class="bg-surface-container-high text-primary hover:bg-secondary hover:text-on-secondary px-3 py-1.5 rounded text-xs font-label-md transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</div>
</section>
<!-- WAX SEAL EMBLEM & CLOSING GRATITUDE -->
<footer class="w-full flex flex-col items-center text-center pt-2 pb-6 space-y-3">
<!-- Emblem Wax Seal Image -->
<div class="w-20 h-20 rounded-full shadow-md overflow-hidden bg-surface-container p-0.5">
<img alt="Cap Lak Emas Nusantara Warm Neutral Edisi Maha Karya" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99"/>
</div>
<div class="space-y-1 max-w-xs">
<p class="font-headline-sm text-lg text-primary italic">Matur Nuwun Sanget</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
        Keluarga Besar Arya Wijayakusuma &amp; Tim Kreator Karakter Nusantara
      </p>
</div>
<div class="flex items-center gap-2 text-on-tertiary-container pt-1">
<span class="text-xs">✦</span>
<span class="font-label-sm text-[10px] uppercase tracking-widest text-on-surface-variant">Yogyakarta — Jakarta • 2025</span>
<span class="text-xs">✦</span>
</div>
</footer>
</div>
<!-- INTERACTIVE TIMER SCRIPT -->
<script>
  (function initCountdown() {
    let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
    function updateTimer() {
      const now = new Date().getTime();
      const distance = targetDate - now;

      if (distance > 0) {
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const dEl = document.getElementById("timer-days");
        const hEl = document.getElementById("timer-hours");
        const mEl = document.getElementById("timer-minutes");
        const sEl = document.getElementById("timer-seconds");

        if (dEl) dEl.textContent = String(days).padStart(2, "0");
        if (hEl) hEl.textContent = String(hours).padStart(2, "0");
        if (mEl) mEl.textContent = String(minutes).padStart(2, "0");
        if (sEl) sEl.textContent = String(seconds).padStart(2, "0");
      }
    }
    updateTimer();
    setInterval(updateTimer, 1000);

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        targetDate = new Date(newDateStr).getTime();
        updateTimer();
      }
    };
  })();
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface-container-lowest/85 backdrop-blur-xl shadow-[0_-2px_12px_rgba(74,59,50,0.06)]" data-active-classes="text-secondary font-semibold"><div class="flex justify-around items-center h-16 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[56px] h-11 transition-colors text-secondary font-semibold" data-path="undangan-utama" href="#"><span class="material-symbols-outlined text-title-md">mail</span><span class="font-label-sm text-label-sm mt-0.5">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-11 text-on-surface-variant hover:text-primary transition-colors" data-path="cerita" href="#"><span class="material-symbols-outlined text-title-md">auto_stories</span><span class="font-label-sm text-label-sm mt-0.5">Cerita</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-11 text-on-surface-variant hover:text-primary transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-title-md">calendar_month</span><span class="font-label-sm text-label-sm mt-0.5">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-11 text-on-surface-variant hover:text-primary transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-title-md">location_on</span><span class="font-label-sm text-label-sm mt-0.5">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-11 text-on-surface-variant hover:text-primary transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-title-md">mark_email_read</span><span class="font-label-sm text-label-sm mt-0.5">RSVP</span></a></div></nav>
    </div>

    <script>
        window.isAudioPlaying = false;

        function openInvitation() {
            const cover = document.getElementById('invitation-cover');
            const main = document.getElementById('invitation-main');
            const audio = document.getElementById('invitationAudio');

            if (cover) {
                cover.classList.add('opacity-0', 'pointer-events-none', '-translate-y-8');
                setTimeout(() => {
                    cover.style.display = 'none';
                    document.body.classList.remove('overflow-hidden');
                    if (main) {
                        main.classList.remove('opacity-0');
                    }
                }, 700);
            }

            if (audio) {
                audio.play().then(() => {
                    window.isAudioPlaying = true;
                    updateMusicFabUI(true);
                }).catch(err => {
                    console.log('Autoplay audio prevented:', err);
                });
            }
        }

        function toggleMusic() {
            const audio = document.getElementById('invitationAudio');
            if (!audio) return;
            if (window.isAudioPlaying) {
                audio.pause();
                window.isAudioPlaying = false;
                updateMusicFabUI(false);
            } else {
                audio.play().then(() => {
                    window.isAudioPlaying = true;
                    updateMusicFabUI(true);
                }).catch(e => console.log(e));
            }
        }

        function updateMusicFabUI(isPlaying) {
            const btn = document.getElementById('music-fab');
            if (!btn) return;
            const icon = btn.querySelector('.material-symbols-outlined') || btn.querySelector('span');
            if (isPlaying) {
                btn.classList.add('animate-spin-slow');
                btn.style.opacity = '1';
                if (icon) icon.textContent = 'music_note';
            } else {
                btn.classList.remove('animate-spin-slow');
                btn.style.opacity = '0.5';
                if (icon) icon.textContent = 'music_off';
            }
        }

        function copyToClipboard(text, msg) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => showToast(msg || 'Teks berhasil disalin!'));
            } else {
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                showToast(msg || 'Teks berhasil disalin!');
            }
        }

        function showToast(msg) {
            const t = document.getElementById('toast');
            const tm = document.getElementById('toast-message');
            if (t && tm) {
                tm.innerText = msg;
                t.classList.remove('opacity-0', 'pointer-events-none');
                setTimeout(() => t.classList.add('opacity-0', 'pointer-events-none'), 3000);
            }
        }

        // PostMessage listener for Live Preview iframe
        
        window.renderDynamicEvents = function(events) {
            const container = document.getElementById("itineraryContainer");
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "16.00 - 21.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="flex gap-3 items-start event-itinerary-item">
                        <div class="bg-secondary-fixed/50 text-secondary font-label-md text-label-md px-2 py-1 rounded shrink-0 font-bold">${timeStr}</div>
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] text-secondary font-bold uppercase tracking-wider block">SESI ${i + 1}</span>
                            <p class="font-title-md text-title-md text-primary leading-tight font-bold">${title}</p>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-secondary font-semibold block mt-0.5">${dateStr}</span>` : ""}
                            ${mapsBtn}
                        </div>
                    </div>
                `;
            }).join("");
        };
    
        window.addEventListener('message', function(event) {
            const data = event.data;
            if (!data || typeof data !== 'object') return;

            if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const val = data.value;

                if (field === 'wedding_date' && typeof window.updateTargetDate === 'function') {
                    window.updateTargetDate(val);
                }

                if (field === 'groom_name' || field === 'name') {
                    const elCover = document.getElementById('previewGroomNameCover');
                    const elHero = document.getElementById('previewGroomNameHero');
                    const elTitle = document.getElementById('previewGroomNameTitle');
                    const elClosing = document.getElementById('previewGroomNameClosing');
                    if (elCover) elCover.innerText = val || "{{ $celebrantName }}";
                    if (elHero) elHero.innerText = val || "{{ $celebrantName }}";
                    if (elTitle) elTitle.innerText = val || "{{ $celebrantName }}";
                    if (elClosing) elClosing.innerText = `— ${val || '{{ $celebrantName }}'} & {{ $familyLine }} —`;
                }

                if (field === 'sub_category') {
                    const elSubCover = document.getElementById('previewSubCategoryCover');
                    const elSubBadge = document.getElementById('previewSubCategoryBadge');
                    if (elSubCover) elSubCover.innerText = val || "{{ $subCategoryBadge }}";
                    if (elSubBadge) elSubBadge.innerText = val || "{{ $subCategoryBadge }}";
                }

                if (field === 'quote' || field === 'event_quote') {
                    const elQCover = document.getElementById('previewQuoteCover');
                    const elQ = document.getElementById('previewQuote');
                    if (elQCover) elQCover.innerText = `“${val || '{{ $quote }}'}”`;
                    if (elQ) elQ.innerText = `“${val || '{{ $quote }}'}”`;
                }

                if (field === 'maps_url' || field === 'google_maps_url' || field === 'event_1_maps_url') {
                    const elM = document.getElementById('previewMapsLinkMain') || document.getElementById('previewMapsLink');
                    if (elM) elM.href = val || '{{ $mapsUrl }}';
                }

                if (field === 'venue_name' || field === 'event_1_venue') {
                    const elV = document.getElementById('previewVenueNameMain');
                    if (elV) elV.innerText = val || '{{ $venueName }}';
                }

                if (field === 'venue_address' || field === 'event_1_address') {
                    const elA = document.getElementById('previewVenueAddressMain');
                    if (elA) elA.innerText = val || '{{ $venueAddress }}';
                }

                if (field === 'venue_name_orig') {
                    const elV = document.getElementById('previewVenueNameMain');
                    if (elV) elV.innerText = val || "{{ $venueName }}";
                }

                if (field === 'venue_address') {
                    const elA = document.getElementById('previewVenueAddressMain');
                    if (elA) elA.innerText = val || "{{ $venueAddress }}";
                }

                if (field === 'guest_name' || field === 'to') {
                    const elGCover = document.getElementById('previewGuestNameCover');
                    const elGMain = document.getElementById('previewGuestNameMain');
                    if (elGCover) elGCover.innerText = val || "{{ $guestName }}";
                    if (elGMain) elGMain.innerText = val || "{{ $guestName }}";
                }
            } else if (data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(data.events) && data.events.length > 0) {
                if (typeof window.renderDynamicEvents === 'function') window.renderDynamicEvents(data.events);
                const ev0 = data.events[0];
                const elM = document.getElementById('previewMapsLinkMain') || document.getElementById('previewMapsLink');
                if (elM && ev0.maps_url) elM.href = ev0.maps_url;
                const elV = document.getElementById('previewVenueNameMain');
                if (elV && ev0.venue_name) elV.innerText = ev0.venue_name;
                const elA = document.getElementById('previewVenueAddressMain');
                if (elA && ev0.address) elA.innerText = ev0.address;
            } else if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl || data.url;

                if ((target === 'cover' || target === 'cover_photo') && photoUrl) {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if ((target === 'groom' || target === 'groom_photo' || target === 'star' || target === 'person' || !target) && photoUrl) {
                    const profileEl = document.getElementById('previewGroomPhotoImg');
                    if (profileEl) profileEl.src = photoUrl;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    const galContainer = document.getElementById('galleryGridContainer');
                    if (galContainer) {
                        galContainer.innerHTML = photos.map((src, i) => `
                            <div class="aspect-square rounded-xl overflow-hidden bg-surface-container shadow-sm border border-outline-variant/30">
                                <img src="${src}" alt="Foto Galeri #${i + 1}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        `).join('');
                    }
                }
            } else if (data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            }
        });

        // Notify parent iframe
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'raden-arya-warm-neutral' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>