<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Solaris: The Sunset Convergence') . ' - ' . ($couple->groom_name ?? 'Solaris The Sunset Guardian') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Solaris The Sunset Guardian' }} - Tema Karakter Original - Bold Modern Sunset Gradient."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=Syne:wght@600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@100..900&family=Syne:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "secondary-container": "#d70357", "on-secondary": "#660025", "on-primary-fixed": "#3b0900", "surface-variant": "#383240", "surface-tint": "#ffb5a0", "secondary-fixed-dim": "#ffb2be", "on-primary-fixed-variant": "#862200", "surface": "#15111e", "secondary": "#ffb2be", "on-background": "#e8dff1", "on-secondary-fixed": "#400014", "tertiary-fixed": "#ffdeac", "tertiary-container": "#c08600", "background": "#15111e", "surface-container-low": "#1e1926", "on-primary-container": "#541200", "on-tertiary-fixed-variant": "#604100", "inverse-surface": "#e8dff1", "on-surface-variant": "#e4beb4", "secondary-fixed": "#ffd9de", "primary": "#ffb5a0", "primary-fixed": "#ffdbd1", "on-tertiary-container": "#3a2600", "surface-container-highest": "#383240", "surface-container-high": "#2d2835", "surface-container-lowest": "#100c18", "on-primary": "#5f1500", "on-tertiary": "#432c00", "error": "#ffb4ab", "on-surface": "#e8dff1", "on-error": "#690005", "surface-dim": "#15111e", "error-container": "#93000a", "on-error-container": "#ffdad6", "inverse-primary": "#b02f00", "outline-variant": "#5b4039", "tertiary": "#ffba38", "on-secondary-fixed-variant": "#900038", "outline": "#ab8980", "surface-bright": "#3c3745", "inverse-on-surface": "#332e3c", "primary-container": "#ff5722", "primary-fixed-dim": "#ffb5a0", "on-tertiary-fixed": "#281900", "surface-container": "#221d2a", "on-secondary-container": "#ffeced", "tertiary-fixed-dim": "#ffba38" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-xl": "2.5rem", "gutter": "1.5rem", "space-3xl": "6rem", "space-2xl": "4rem", "space-xs": "0.25rem", "margin": "3rem", "space-md": "1rem", "gutter-mobile": "1rem", "space-lg": "1.5rem", "space-sm": "0.5rem", "margin-mobile": "1.25rem" }, "fontFamily": { "headline-lg-mobile": ["Syne"], "display-hero-mobile": ["Syne"], "headline-sm": ["Syne"], "headline-lg": ["Syne"], "headline-xl-mobile": ["Syne"], "body-xl": ["Space Grotesk"], "label-md": ["Space Grotesk"], "headline-md": ["Syne"], "body-md": ["Space Grotesk"], "body-sm": ["Space Grotesk"], "headline-xl": ["Syne"], "display-hero": ["Syne"], "label-caps": ["Space Grotesk"] }, "fontSize": { "headline-lg-mobile": ["26px", { "lineHeight": "32px", "fontWeight": "700" }], "display-hero-mobile": ["40px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "800" }], "headline-sm": ["20px", { "lineHeight": "26px", "fontWeight": "600" }], "headline-lg": ["36px", { "lineHeight": "42px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-xl-mobile": ["32px", { "lineHeight": "38px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "body-xl": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "label-md": ["14px", { "lineHeight": "18px", "letterSpacing": "0.02em", "fontWeight": "600" }], "headline-md": ["24px", { "lineHeight": "30px", "fontWeight": "600" }], "body-md": ["15px", { "lineHeight": "24px", "fontWeight": "400" }], "body-sm": ["13px", { "lineHeight": "20px", "fontWeight": "400" }], "headline-xl": ["48px", { "lineHeight": "54px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "display-hero": ["72px", { "lineHeight": "76px", "letterSpacing": "-0.03em", "fontWeight": "800" }], "label-caps": ["11px", { "lineHeight": "14px", "letterSpacing": "0.14em", "fontWeight": "700" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Solaris The Sunset Guardian';
        $celebrantNick = $couple->groom_nickname ?? 'Solaris';
        $heading = $couple->event_heading ?? 'Solaris: The Sunset Convergence';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dengan tema kartun atau karakter original';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Acara Utama & Peluncuran Karakter',
                    'date' => !empty($couple->wedding_date) ? (is_string($couple->wedding_date) ? $couple->wedding_date : $couple->wedding_date->format('Y-m-d')) : now()->format('Y-m-d'),
                    'start_time' => $couple->wedding_time ?? '18.00 WIB',
                    'end_time' => '22.00 WIB',
                    'venue_name' => $venueName,
                    'address' => $venueAddress,
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1
                ]
            ]);
        }
        $quote = $couple->quote ?? 'Di batas cakrawala senja di mana nyala api keberanian bertemu kehangatan harapan, kita berkumpul merayakan babak baru.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuClcfkEaZIvqACRX7sQ9n4fdhnAvglnuCHev9Jw3KNiN-290xidPlQ0OhLOyNpHsRS99zWpm1INpsj6pOEVbVYvo5aPGaarsVgzRfMmqp0GoVsO-KD0lgo2quIewVhhLCiZg4mtjMiI1t1mBy9OFj4A-RJbaUTetFR3wiuQMNHPz6-prW-q6bNU7ov7Mr0QmsryY24_vaJNpET9R9P6aAGpL-M17m8sfgL1GwzSQ1LO';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCkQapBcDSNsc8sRIoAYwIdr7VCtO6rhZyHklHa1CgdHU0diPbRe3glhXYzfd8NQfiHSLtkmTebmY86g0FCVkfbkCm6XadPIYcKDcFVwIH3eQ4uP2_FkQh27bLQ7BGSEvyRbnbjBpp9nh5kSor6zsvTVQt4UN1N9obBYfHiohe0wovHNKwKQZ0Oftq823tJdAECRcsCN6w-wRH8wTmsMPhRkxPbFbqhOTJ1eVvhZX7G';
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

        $venueName = $couple->venue_name ?? 'The Sky Ballroom Level 50';
        $venueAddress = $couple->venue_address ?? 'The Westin Jakarta, Jl. H.R. Rasuna Said Kav. C-22, Setiabudi, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuClcfkEaZIvqACRX7sQ9n4fdhnAvglnuCHev9Jw3KNiN-290xidPlQ0OhLOyNpHsRS99zWpm1INpsj6pOEVbVYvo5aPGaarsVgzRfMmqp0GoVsO-KD0lgo2quIewVhhLCiZg4mtjMiI1t1mBy9OFj4A-RJbaUTetFR3wiuQMNHPz6-prW-q6bNU7ov7Mr0QmsryY24_vaJNpET9R9P6aAGpL-M17m8sfgL1GwzSQ1LO', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCkQapBcDSNsc8sRIoAYwIdr7VCtO6rhZyHklHa1CgdHU0diPbRe3glhXYzfd8NQfiHSLtkmTebmY86g0FCVkfbkCm6XadPIYcKDcFVwIH3eQ4uP2_FkQh27bLQ7BGSEvyRbnbjBpp9nh5kSor6zsvTVQt4UN1N9obBYfHiohe0wovHNKwKQZ0Oftq823tJdAECRcsCN6w-wRH8wTmsMPhRkxPbFbqhOTJ1eVvhZX7G', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCni-V6uN6KT4Vw_bQm4Byhsdm-0WcyxOzC26rZ2UQXMSLWU24OJPDqdU0AtAhZAeebtrKtEZgQSca56Ik2yHg9Vo8kKtGt_3kCN8mmz3xDAIZFODaydEeIF7mJR6DKT8zqMkipeJYtRqsN3-3ETvtzNGqtAg5XFzh8lVhXsyaUJsiU3hStoIh5QaDPYpMbQGe-kVY1ZKGhgAr6ONgl5d-Zj5ScOQVAka4nFu-KrVLe', 'caption' => 'Momen Bahagia #3'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAv4DAEC16Qc-bAzHrj7AqxQafa-sHj2ajXNH_Gc7p13nUp_RWlerb1Ib453LJFqUT2szu71l7mw8uwvh93u7npv96zLD314u-iwlAoRpb6-aoTKiolhpR3c_wrzyzGFPsZopoYmStjc_5kdLMMRItbgQKVA1WxoJFgFSLvVLo1b-O_mKOobgSmwgd9wu9ufkEfWS2voobbggVcUolzCYg50WiJkcDOD_aFpkkWOqF1', 'caption' => 'Momen Bahagia #4'],
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
        <main class="flex flex-col relative w-full flex-grow bg-surface"><div class="flex flex-col w-full relative overflow-hidden select-none" id="envelope-root">
<div class="absolute inset-0 pointer-events-none -z-10 overflow-hidden">
<div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 rounded-full bg-gradient-to-b from-primary-container/25 via-secondary-container/20 to-transparent blur-3xl opacity-70"></div>
<div class="absolute top-1/3 -left-20 w-64 h-64 rounded-full bg-tertiary-container/15 blur-2xl"></div>
<div class="absolute bottom-10 -right-20 w-80 h-80 rounded-full bg-secondary-container/20 blur-3xl"></div>
<svg class="absolute inset-0 w-full h-full opacity-10 stroke-primary/30" xmlns="http://www.w3.org/2000/svg">
<defs>
<pattern height="40" id="solar-circuit-grid" patternunits="userSpaceOnUse" width="40">
<circle cx="20" cy="20" fill="#ffb5a0" r="0.75"></circle>
<path d="M 40 20 L 20 20 20 40" fill="none" stroke="currentColor" stroke-width="0.5"></path>
</pattern>
</defs>
<rect fill="url(#solar-circuit-grid)" height="100%" width="100%"></rect>
</svg>
</div>
<div class="flex flex-col justify-between w-full max-w-md mx-auto px-4 py-3 gap-y-2.5">
<div class="flex flex-col gap-1.5 w-full">
<div class="flex items-center justify-between gap-1 w-full bg-surface-container-high/90 px-2.5 py-1 rounded-full shadow-sm">
<div class="flex items-center gap-1.5 min-w-0">
<span class="material-symbols-outlined text-tertiary text-xs animate-pulse">bolt</span>
<span class="font-label-caps text-label-caps text-tertiary uppercase tracking-widest truncate">ORIGINAL UNIVERSE // ED. 2025 • JAKARTA</span>
</div>
<span class="w-1.5 h-1.5 rounded-full bg-primary-container animate-ping"></span>
</div>
<div class="flex items-center justify-between w-full bg-surface-container-low/80 px-2.5 py-1 rounded-full backdrop-blur-md">
<div class="flex items-center gap-1.5 min-w-0">
<span class="material-symbols-outlined text-secondary text-sm">music_note</span>
<p class="font-body-sm text-body-sm text-on-surface-variant italic truncate text-[11px] leading-tight">
            Sunset Horizon Symphony — Solaris Theme
          </p>
</div>
<div class="flex items-end gap-0.5 h-3 ml-2 shrink-0">
<span class="w-0.5 bg-primary-container h-2 rounded-full animate-bounce"></span>
<span class="w-0.5 bg-secondary h-3 rounded-full animate-bounce [animation-delay:0.15s]"></span>
<span class="w-0.5 bg-tertiary h-1.5 rounded-full animate-bounce [animation-delay:0.3s]"></span>
<span class="w-0.5 bg-primary h-2.5 rounded-full animate-bounce [animation-delay:0.45s]"></span>
</div>
</div>
</div>
<div class="flex flex-col items-center justify-center my-0.5 relative group">
<div aria-label="Buka Segel Solaris" class="relative p-1.5 rounded-full bg-gradient-to-tr from-secondary-container via-primary-container to-tertiary shadow-xl shadow-secondary-container/20 cursor-pointer active:scale-95 transition-all duration-300" id="wax-seal-button" role="button">
<div class="w-24 h-24 rounded-full bg-surface-container-lowest flex items-center justify-center overflow-hidden p-1">
<img alt="Solaris Sunset Wax Seal Emblem" class="w-full h-full object-contain filter drop-shadow hover:rotate-6 transition-transform duration-500" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<div class="absolute -inset-1 rounded-full border border-primary/20 pointer-events-none animate-pulse"></div>
</div>
<div class="mt-1.5 flex items-center gap-1 text-tertiary">
<span class="font-label-caps text-label-caps tracking-widest text-[10px] uppercase font-bold animate-pulse text-center">
          ◆ KETUK UNTUK MEMBUKA SEGEL SOLARIS ◆
        </span>
</div>
</div>
<div class="flex flex-col items-center text-center px-1">
<span class="font-label-caps text-label-caps text-tertiary uppercase tracking-widest text-[10px] mb-0.5 font-bold">
        PERAYAAN ULANG TAHUN & PELUNCURAN KARAKTER ORISINAL
      </span>
<h1 class="font-headline-xl-mobile text-headline-xl-mobile font-extrabold uppercase bg-gradient-to-r from-tertiary via-primary-container to-secondary-container bg-clip-text text-transparent tracking-tight leading-none" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<span class="font-label-caps text-label-caps text-on-surface-variant tracking-[0.2em] font-semibold text-[11px] mt-0.5">
        THE SUNSET GUARDIAN
      </span>
<p class="font-body-sm text-body-sm text-on-surface-variant/90 italic text-[11px] leading-relaxed mt-1 max-w-xs">
        “Di batas cakrawala senja di mana nyala api keberanian bertemu kehangatan harapan, sebuah babak baru dimulai. Selamat datang di malam perayaan mahakarya semesta orisinal.”
      </p>
</div>
<div class="relative w-full bg-surface-container/90 rounded-xl p-3 shadow-lg shadow-black/40 backdrop-blur-md">
<div class="flex items-center justify-between w-full mb-1.5">
<div class="flex items-center gap-1 bg-secondary-container px-2 py-0.5 rounded-full">
<span class="material-symbols-outlined text-on-secondary text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-caps text-label-caps text-on-secondary text-[9px] font-bold">VIP INVITATION</span>
</div>
<span class="font-label-caps text-label-caps text-tertiary-fixed text-[10px] tracking-wider font-semibold">NO. 001-SOLAR</span>
</div>
<div class="flex flex-col text-left">
<span class="font-label-caps text-label-caps text-on-surface-variant text-[9px] tracking-wider uppercase">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold text-lg mt-0.5" id="previewGuestNameCover">
          {{ $guestName }}
        </h2>
<span class="font-body-sm text-body-sm text-primary text-xs font-medium -mt-0.5">
          Di Tempat
        </span>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[11px] leading-snug mt-1">
          Merupakan suatu kehormatan agung menyambut kehadiran Anda dalam malam peluncuran karakter dan perayaan ulang tahun penuh energi spektakuler ini.
        </p>
</div>
</div>
<div class="w-full flex flex-col items-center">
<button class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-tertiary via-primary-container to-secondary-container text-on-primary-fixed font-label-md text-label-md font-bold uppercase tracking-wider shadow-lg shadow-primary-container/30 hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center gap-1.5 cursor-pointer" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-base">mail</span>
<span class="text-xs tracking-wider">BUKA UNDANGAN (ENTER SUNSET GALA)</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
<div class="flex flex-col gap-1 w-full bg-surface-container-lowest/80 p-2 rounded-lg text-center backdrop-blur-sm">
<div class="flex items-center justify-center gap-3 text-[11px] text-on-surface flex-wrap">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-primary text-xs">calendar_today</span>
<span class="font-body-sm text-body-sm font-semibold text-[11px]">{{ $eventDateFormatted }}</span>
</div>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-xs">account_balance</span>
<span class="font-body-sm text-body-sm font-medium text-[11px] truncate max-w-[180px]">{{ $venueName }}, Jakarta</span>
</div>
</div>
<div class="w-full pt-0.5">
<span class="font-label-caps text-label-caps text-tertiary text-[9px] font-bold tracking-widest uppercase">
          DRESS CODE: BOLD SUNSET GRADIENT & MODERN BLACK TIE / FORMAL
        </span>
</div>
</div>
</div>
<div class="fixed inset-0 bg-gradient-to-t from-primary-container via-secondary-container to-surface pointer-events-none opacity-0 transition-opacity duration-700 z-50 flex items-center justify-center" id="unlock-flash">
<div class="flex flex-col items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-6xl animate-spin">wb_sunny</span>
<span class="font-headline-md text-headline-md text-on-surface font-bold tracking-widest uppercase">MEMBUKA CAKRAWALA...</span>
</div>
</div>
</div>
<script>
  (function() {
    const triggerElements = [
      document.getElementById('wax-seal-button'),
      document.getElementById('open-invitation-btn')
    ];
    const flashOverlay = document.getElementById('unlock-flash');

    function launchUnlockEffect() {
      if (!flashOverlay) return;
      flashOverlay.classList.remove('pointer-events-none');
      flashOverlay.classList.add('opacity-95');
      setTimeout(() => {
        window.dispatchEvent(new CustomEvent('envelope-opened', { detail: { guest: '{{ $guestName }}' } }));
        flashOverlay.classList.add('opacity-0', 'pointer-events-none');
        flashOverlay.classList.remove('opacity-95');
        setTimeout(() => {
          flashOverlay.style.display = 'none';
        }, 500);
      }, 700);
    }

    triggerElements.forEach(btn => {
      if (btn) {
        btn.addEventListener('click', launchUnlockEffect);
      }
    });
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 inset-x-0 z-50 bg-surface/85 backdrop-blur-xl shadow-[0_10px_30px_rgba(255,87,34,0.08)] pt-safe max-w-md mx-auto"><div class="h-16 px-margin-mobile flex items-center justify-between gap-space-sm"><div class="flex items-center gap-space-sm min-w-0"><div class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center shadow-[0_0_12px_rgba(255,87,34,0.35)] shrink-0"><span class="material-symbols-outlined text-on-primary-container text-[20px]">wb_twilight</span></div><div class="flex flex-col min-w-0"><span class="font-headline-sm text-headline-sm text-on-surface truncate tracking-tight">Undangan Utama   Solaris Sunset</span><div class="flex items-center gap-space-xs"><span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span><span class="font-label-caps text-label-caps text-tertiary uppercase">VIP GALA</span></div></div></div><div class="flex items-center gap-space-xs shrink-0"><button aria-label="BGM Audio Toggle" class="w-11 h-11 rounded-full bg-surface-container-high/90 flex items-center justify-center text-primary hover:text-on-surface transition-colors" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex flex-col relative w-full flex-grow pt-16 pb-20 bg-surface"><div class="flex flex-col w-full">
<!-- Hero Section -->
<section class="relative px-margin-mobile pt-space-md pb-space-lg flex flex-col items-center">
<!-- Ambient Flare Glows -->
<div class="absolute -top-10 left-1/2 -translate-x-1/2 w-72 h-72 bg-primary-container/20 rounded-full blur-[80px] pointer-events-none"></div>
<div class="absolute top-48 right-2 w-48 h-48 bg-secondary-container/20 rounded-full blur-[60px] pointer-events-none"></div>
<!-- Header Badges -->
<div class="w-full flex flex-col sm:flex-row items-center justify-between gap-space-xs mb-space-md z-10">
<div class="flex items-center gap-space-xs bg-surface-container-high/90 px-3 py-1.5 rounded-full shadow-[0_4px_16px_rgba(255,87,34,0.15)]">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="font-label-caps text-label-caps text-primary tracking-wider uppercase">EDISI SPESIAL • PELUNCURAN KARAKTER ORISINAL & ULTAH</span>
</div>
<div class="flex items-center gap-1.5 bg-secondary-container/25 px-3 py-1 rounded-full shadow-sm">
<span class="material-symbols-outlined text-[14px] text-secondary">stars</span>
<span class="font-label-caps text-label-caps text-secondary font-bold tracking-widest uppercase">SEAT VIP #A-01</span>
</div>
</div>
<!-- Hero Character Illustration Framing -->
<div class="relative w-full max-w-sm mx-auto rounded-xl overflow-hidden bg-surface-container-high shadow-[0_12px_40px_rgba(255,87,34,0.22)]">
<div class="relative aspect-[3/4] w-full overflow-hidden flex items-center justify-center">
<img class="w-full h-full object-cover object-top" data-alt="Anime hero character Solaris standing proudly on futuristic skyscraper rooftop at dramatic sunset dusk, holding glowing celestial solar fireball, dark cyberpunk coat with orange flame lining, high-energy anime concept art" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-surface via-surface/20 to-transparent"></div>
<div class="absolute top-3 left-3 bg-surface-container-lowest/80 backdrop-blur-md px-2.5 py-1 rounded-full flex items-center gap-1.5">
<span class="material-symbols-outlined text-tertiary text-[15px]" style="font-variation-settings: 'FILL' 1;">flare</span>
<span class="font-label-caps text-label-caps text-tertiary">SOLARIS GENESIS</span>
</div>
</div>
</div>
<!-- Title & Quote Area -->
<div class="w-full text-center mt-space-md z-10">
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface uppercase tracking-tight" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<div class="mt-space-sm bg-surface-container-low/75 backdrop-blur-md p-space-sm rounded-lg text-center shadow-inner">
<p class="font-body-sm text-body-sm text-on-surface-variant italic">
          “Transforming dusk into radiant dawn: Bergabunglah bersama kami merayakan lahirnya semesta orisinal baru dalam balutan seni, persahabatan, dan sukacita.”
        </p>
<span class="block mt-1 font-label-caps text-label-caps text-tertiary uppercase tracking-widest">— SOLARIS & CREATOR COLLECTIVE</span>
</div>
</div>
</section>
<!-- Guest Honor Card -->
<section class="px-margin-mobile py-space-sm">
<div class="relative w-full rounded-xl bg-gradient-to-br from-surface-container-high/90 to-surface-container/90 backdrop-blur-xl p-space-md shadow-[0_8px_32px_rgba(255,87,34,0.18)] overflow-hidden">
<!-- Glow filament -->
<div class="absolute -right-12 -top-12 w-36 h-36 bg-primary-container/25 rounded-full blur-2xl pointer-events-none"></div>
<div class="flex items-center gap-space-xs text-tertiary mb-space-xs">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span class="font-label-caps text-label-caps tracking-widest uppercase">Undangan Khusus Tamu Terhormat</span>
</div>
<p class="font-label-caps text-label-caps text-on-surface-variant uppercase">KEPADA YTH. BAPAK/IBU/SAUDARA/I:</p>
<h2 class="font-headline-md text-headline-md text-on-surface mt-0.5 tracking-tight"><span id="previewGuestNameMain">{{ $guestName }}</span></h2>
<div class="mt-space-sm p-space-xs bg-surface-container-lowest/80 rounded-lg flex items-center justify-between gap-space-xs">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container/30 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary text-[16px]">airline_seat_recline_extra</span>
</div>
<div class="min-w-0">
<span class="font-label-caps text-label-caps text-secondary block uppercase">Reservasi Meja</span>
<span class="font-body-sm text-body-sm text-on-surface font-semibold truncate block">Solaris Skyline Suite 01</span>
</div>
</div>
<div class="shrink-0 bg-primary/20 text-primary font-label-caps text-label-caps px-2 py-1 rounded-full uppercase font-bold">
          2 Tamu Khusus
        </div>
</div>
<p class="mt-space-sm font-body-sm text-body-sm text-on-surface-variant">
        Kehadiran dan kehangatan Anda merupakan energi terbesar bagi kami untuk terus mengibarkan fajar kreativitas. Sebuah kehormatan menyambut Anda di lingkar utama perayaan eksklusif ini.
      </p>
</div>
</section>
<!-- Lore & Character Universe -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="flex flex-col mb-space-sm">
<div class="flex items-center gap-1.5 text-primary">
<span class="material-symbols-outlined text-[16px]">auto_stories</span>
<span class="font-label-caps text-label-caps uppercase tracking-widest">Kisah & Semesta Solaris</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">Tiga Pilar Pelindung Senja</h3>
</div>
<!-- 3 Character Pillars -->
<div class="grid grid-cols-1 gap-space-xs mb-space-md">
<div class="bg-surface-container-high/80 rounded-lg p-space-sm flex items-center gap-space-sm shadow-sm">
<div class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">local_fire_department</span>
</div>
<div class="min-w-0">
<h4 class="font-body-md text-body-md font-bold text-on-surface">Nyala Harapan (Solar Flare)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Kekuatan mengalir dari hangatnya mentari untuk melindungi jiwa yang rapuh.</p>
</div>
</div>
<div class="bg-surface-container-high/80 rounded-lg p-space-sm flex items-center gap-space-sm shadow-sm">
<div class="w-9 h-9 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">shield</span>
</div>
<div class="min-w-0">
<h4 class="font-body-md text-body-md font-bold text-on-surface">Keteguhan Jiwa (Dusk Armor)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Zirah obsidian berbias jingga, berdiri kokoh menembus bayang-bayang malam.</p>
</div>
</div>
<div class="bg-surface-container-high/80 rounded-lg p-space-sm flex items-center gap-space-sm shadow-sm">
<div class="w-9 h-9 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary-container shrink-0">
<span class="material-symbols-outlined text-[20px]">all_inclusive</span>
</div>
<div class="min-w-0">
<h4 class="font-body-md text-body-md font-bold text-on-surface">Keberanian Sejati (Infinite Horizon)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Keyakinan bahwa di balik tenggelamnya matahari, fajar baru senantiasa menunggu.</p>
</div>
</div>
</div>
<!-- 3 Story Chapters -->
<div class="space-y-space-sm">
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-caps text-label-caps text-primary font-bold uppercase">Babak I</span>
<span class="font-label-caps text-label-caps text-on-surface-variant">ORIGIN ARC</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Lahirnya Sang Penjaga Senja</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
          Eksplorasi energi surya di batas cakrawala kota metropolitan masa depan, mengawali takdir seorang pemuda yang dianugerahi api abadi.
        </p>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-caps text-label-caps text-tertiary font-bold uppercase">Babak II</span>
<span class="font-label-caps text-label-caps text-on-surface-variant">THE RELIC</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Artefak Inti Surya</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
          Penemuan kristal surya abadi yang sanggup mentransformasi keputusasaan dan gulita menjadi kilau pendar fajar penuh keajaiban.
        </p>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-caps text-label-caps text-secondary font-bold uppercase">Babak III</span>
<span class="font-label-caps text-label-caps text-on-surface-variant">GLOBAL HORIZON</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Misi Masa Depan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
          Visi kreasi karakter animasi orisinal lokal menembus kancah global bersama komunitas kreator independen Indonesia.
        </p>
</div>
</div>
</section>
<!-- Live Countdown & Agenda Section -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="bg-gradient-to-b from-surface-container-high to-surface-container-low rounded-xl p-space-md shadow-[0_10px_35px_rgba(255,87,34,0.14)]">
<div class="text-center mb-space-sm">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-container/20 text-primary mb-2">
<span class="material-symbols-outlined text-[16px]">schedule</span>
<span class="font-label-caps text-label-caps uppercase tracking-wider">Hitung Mundur Waktu Peluncuran</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $eventDateFormatted }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Pukul 18.00 - 22.00 WIB (Open Gate: 17.30 WIB)</p>
</div>
<!-- Segmented Countdown Cards -->
<div class="grid grid-cols-4 gap-space-xs text-center my-space-md" id="solaris-countdown">
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-inner">
<span class="block font-headline-md text-headline-md text-primary font-bold" id="cd-days">42</span>
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase">HARI</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-inner">
<span class="block font-headline-md text-headline-md text-tertiary font-bold" id="cd-hours">18</span>
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase">JAM</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-inner">
<span class="block font-headline-md text-headline-md text-secondary font-bold" id="cd-minutes">35</span>
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase">MENIT</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-inner">
<span class="block font-headline-md text-headline-md text-on-surface font-bold animate-pulse" id="cd-seconds">12</span>
<span class="font-label-caps text-label-caps text-on-surface-variant uppercase">DETIK</span>
</div>
</div>
<!-- Calendar Button -->
<a class="w-full py-3 px-4 rounded-lg bg-surface-container-highest hover:bg-surface-bright text-on-surface font-label-md text-label-md flex items-center justify-center gap-2 transition-colors shadow-sm" href="https://calendar.google.com" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px] text-tertiary">event</span>
<span>Simpan ke Google Calendar</span>
</a>
<!-- Rundown Timeline -->
<div class="mt-space-lg">
<span class="font-label-caps text-label-caps text-primary tracking-widest uppercase block mb-space-sm">Rundown Agenda Eksklusif</span>
<div class="space-y-space-sm relative pl-4" id="itineraryContainer">
<!-- Ambient filament line -->
<div class="absolute left-1 top-2 bottom-2 w-0.5 bg-gradient-to-b from-primary via-secondary-container to-tertiary"></div>
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
        if (empty($evTimeStr)) $evTimeStr = "18.00 - 22.00 WIB";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
        $dotColors = ["bg-primary", "bg-primary-container", "bg-secondary-container", "bg-tertiary"];
        $dotColor = $dotColors[$index % count($dotColors)];
    @endphp
    <div class="relative pl-3 event-itinerary-item">
        <span class="absolute -left-[15px] top-1.5 w-2 h-2 rounded-full {{ $dotColor }} ring-4 ring-surface-container-high"></span>
        <span class="font-label-caps text-label-caps text-tertiary font-bold">{{ $evTimeStr }}</span>
        <h5 class="font-body-md text-body-md font-bold text-on-surface">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h5>
        <p class="font-body-sm text-body-sm text-on-surface-variant">
            {{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif
        </p>
        @if(!empty($evDateStr))
            <span class="text-[10px] text-tertiary block mt-0.5 font-medium">📅 {{ $evDateStr }}</span>
        @endif
        @if(!empty($evMaps))
            <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1">
                <span class="material-symbols-outlined text-[13px]">location_on</span>
                <span>Buka Google Maps</span>
            </a>
        @endif
    </div>
@endforeach
</div>
</div>
</div>
</section>
<!-- Dress Code Guide -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="bg-surface-container rounded-xl p-space-md shadow-md">
<div class="flex items-center gap-space-xs text-secondary mb-1">
<span class="material-symbols-outlined text-[18px]">checkroom</span>
<span class="font-label-caps text-label-caps uppercase tracking-widest">Panduan Tata Busana</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Bold Modern Sunset Gradient & Black Tie</h3>
<!-- Color Swatch Strip -->
<div class="flex items-center gap-2 my-space-sm overflow-x-auto py-1">
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#100b1a] shadow-inner"></div>
<span class="font-label-caps text-[9px] text-on-surface-variant">Twilight</span>
</div>
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#383240] shadow-inner"></div>
<span class="font-label-caps text-[9px] text-on-surface-variant">Violet</span>
</div>
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#ff5722] shadow-md shadow-primary-container/30"></div>
<span class="font-label-caps text-[9px] text-primary">Solar</span>
</div>
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#d70357] shadow-md shadow-secondary-container/30"></div>
<span class="font-label-caps text-[9px] text-secondary">Magenta</span>
</div>
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#ffba38] shadow-md shadow-tertiary/30"></div>
<span class="font-label-caps text-[9px] text-tertiary">Amber</span>
</div>
<div class="flex flex-col items-center gap-1 shrink-0">
<div class="w-8 h-8 rounded-full bg-[#ffffff] shadow-inner"></div>
<span class="font-label-caps text-[9px] text-on-surface-variant">Crisp</span>
</div>
</div>
<div class="space-y-space-xs mt-space-sm">
<div class="p-space-sm rounded-lg bg-surface-container-high/60">
<span class="font-label-caps text-label-caps text-tertiary uppercase block font-bold">Untuk Pria</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Setelan jas tailoring hitam atau deep navy modern dengan aksen pocket square solar orange, lapel pin bernuansa emas, atau dasi senja amber.
          </p>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-high/60">
<span class="font-label-caps text-label-caps text-secondary uppercase block font-bold">Untuk Wanita</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Architectural cocktail dress / gaun malam bernuansa gradasi senja (warm coral, fiery orange, twilight berry) atau sleek black berpadu aksen kilau emas.
          </p>
</div>
</div>
</div>
</section>
<!-- Galeri Seni & Karya -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="flex items-center justify-between mb-space-sm">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Galeri Eksklusif</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Arsip Konseptual Solaris</h3>
</div>
<span class="material-symbols-outlined text-primary text-[24px]">collections</span>
</div>
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-xs">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container rounded-lg overflow-hidden group shadow-sm flex flex-col border border-outline-variant/30">
    <div class="relative w-full aspect-square bg-surface-container-highest overflow-hidden">
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
<!-- Venue Location & Interactive Map Preview -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="bg-surface-container rounded-xl p-space-md shadow-md">
<div class="flex items-center gap-space-xs text-primary mb-1">
<span class="material-symbols-outlined text-[18px]">place</span>
<span class="font-label-caps text-label-caps uppercase tracking-widest">Lokasi Acara & Akses VIP</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $venueName }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Level 28, Tower Senayan — Jl. Jend. Sudirman Kav. 52-53, Jakarta Pusat</p>
<!-- Map Mockup Container -->
<div class="my-space-sm relative rounded-lg overflow-hidden shadow-inner">
<div class="w-full h-44 bg-cover bg-center" data-location="{{ $venueName }}, Jl. Jend. Sudirman Kav 52-53, Jakarta" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCT7TnFQQhq0gzxgkliErSD2aN-kySW4UjnTZSB6_r3vKy2HEDPwbnXLP0oksTYDYmFmFuPuFv3qnd5nOG-vegmpKm1LZuWPOa4yryEoiif6Ngj-Syye9REirGDWi-XXcGX5h8DsS302ISCJL2ifBwMuwPtD7Sy3MGReBcGAekBxH7klmLHD8yKkQMachZUwNElHOflp6DbHj5AzqL5mchHNWr9ZORwvWCNgh55Z-MX')"></div>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent pointer-events-none"></div>
<div class="absolute bottom-2.5 left-2.5 bg-surface-container-high/90 backdrop-blur-md px-2.5 py-1 rounded-md flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
<span class="font-label-caps text-label-caps text-on-surface">SKY BALLROOM LVL 28</span>
</div>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-space-xs mt-space-sm">
<a id="previewMapsLinkMain" class="py-2.5 px-3 rounded-lg bg-primary-container text-on-primary-container font-label-md text-label-md flex items-center justify-center gap-1.5 shadow-md" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[16px]">navigation</span>
<span>Buka Maps</span>
</a>
<button class="py-2.5 px-3 rounded-lg bg-surface-container-highest hover:bg-surface-bright text-on-surface font-label-md text-label-md flex items-center justify-center gap-1.5 transition-colors" onclick="navigator.clipboard.writeText('{{ addslashes($venueAddress) }}'); alert('Alamat disalin ke clipboard!');" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
<span>Salin Alamat</span>
</button>
</div>
<!-- Amenities Badges -->
<div class="mt-space-md pt-space-sm border-t border-surface-container-highest/40 flex flex-wrap gap-2">
<span class="inline-flex items-center gap-1 bg-surface-container-highest/80 px-2.5 py-1 rounded-full font-label-caps text-label-caps text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-tertiary">local_parking</span> VIP Valet Parking Complimentary
        </span>
<span class="inline-flex items-center gap-1 bg-surface-container-highest/80 px-2.5 py-1 rounded-full font-label-caps text-label-caps text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-primary">elevator</span> Private Sky Elevator
        </span>
<span class="inline-flex items-center gap-1 bg-surface-container-highest/80 px-2.5 py-1 rounded-full font-label-caps text-label-caps text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-secondary">photo_camera</span> Hologram Photo Hall
        </span>
</div>
</div>
</section>
<!-- Konfirmasi Kehadiran Tamu VIP (RSVP Form) -->
<section class="px-margin-mobile pt-space-lg pb-space-sm" id="rsvp-section">
<div class="relative bg-gradient-to-b from-surface-container-high to-surface-container-low rounded-xl p-space-md shadow-[0_12px_36px_rgba(255,87,34,0.18)]">
<div class="flex items-center gap-space-xs text-primary mb-1">
<span class="material-symbols-outlined text-[18px]">how_to_reg</span>
<span class="font-label-caps text-label-caps uppercase tracking-widest">Portal Tamu VIP</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Konfirmasi Kehadiran</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Mohon lengkapi konfirmasi kehadiran Anda demi kenyamanan alokasi jamuan eksklusif.</p>
<form class="mt-space-md space-y-space-sm" onsubmit="event.preventDefault(); document.getElementById('rsvp-success-msg').classList.remove('hidden');">
<!-- Guest Name (Pre-filled) -->
<div>
<label class="font-label-caps text-label-caps text-tertiary uppercase block mb-1">Nama Tamu Kehormatan</label>
<div class="w-full bg-surface-container-lowest px-3 py-2.5 rounded-lg text-on-surface font-body-md text-body-md flex items-center justify-between">
<span id="previewGuestNameMain">{{ $guestName }}</span>
<span class="material-symbols-outlined text-primary text-[18px]">lock</span>
</div>
</div>
<!-- Attendance Radio Selection -->
<div>
<label class="font-label-caps text-label-caps text-tertiary uppercase block mb-1.5">Status Kehadiran</label>
<div class="space-y-2">
<label class="flex items-center gap-3 p-2.5 rounded-lg bg-surface-container-lowest cursor-pointer hover:bg-surface-container-high transition-colors">
<input checked="" class="accent-[#ff5722] w-4 h-4" name="attendance" type="radio" value="hadir-berdua"/>
<div class="min-w-0">
<span class="font-body-sm text-body-sm font-semibold text-on-surface block">⚡ Ya, Pasti Hadir Berdua (Suite A-01)</span>
<span class="font-label-caps text-[10px] text-primary">ALOKASI MEJA VIP TERKONFIRMASI</span>
</div>
</label>
<label class="flex items-center gap-3 p-2.5 rounded-lg bg-surface-container-lowest cursor-pointer hover:bg-surface-container-high transition-colors">
<input class="accent-[#ff5722] w-4 h-4" name="attendance" type="radio" value="hadir-sendiri"/>
<div class="min-w-0">
<span class="font-body-sm text-body-sm text-on-surface block">Ya, Hadir Sendiri</span>
</div>
</label>
<label class="flex items-center gap-3 p-2.5 rounded-lg bg-surface-container-lowest cursor-pointer hover:bg-surface-container-high transition-colors">
<input class="accent-[#ff5722] w-4 h-4" name="attendance" type="radio" value="berhalangan"/>
<div class="min-w-0">
<span class="font-body-sm text-body-sm text-on-surface-variant block">Mohon Maaf, Berhalangan</span>
</div>
</label>
</div>
</div>
<!-- Banquet Preference Dropdown -->
<div>
<label class="font-label-caps text-label-caps text-tertiary uppercase block mb-1" for="banquet-pref">Pilihan Jamuan Santap (Banquet Preference)</label>
<select class="w-full bg-surface-container-lowest px-3 py-2.5 rounded-lg text-on-surface font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary" id="banquet-pref">
<option value="western">Western Sunset Gourmet Course (Wagyu & Truffle Flare)</option>
<option value="japanese">Japanese Modern Fusion (Omakase Solaris Signature)</option>
<option value="nusantara">Nusantara Royale Banquet (Rendang Wagyu Padang & Saffron Rice)</option>
</select>
</div>
<!-- Message/Wishes Textarea -->
<div>
<label class="font-label-caps text-label-caps text-tertiary uppercase block mb-1" for="guest-message">Untaian Doa & Pesan untuk Solaris</label>
<textarea class="w-full bg-surface-container-lowest p-3 rounded-lg text-on-surface placeholder:text-on-surface-variant/50 font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary" id="guest-message" placeholder="Tuliskan ucapan selamat ulang tahun dan harapan peluncuran semesta..." rows="3"></textarea>
</div>
<!-- Submit CTA Button -->
<button class="w-full py-3.5 px-4 rounded-lg bg-gradient-to-r from-primary-container via-secondary-container to-tertiary text-on-primary-container font-label-md text-label-md font-bold uppercase tracking-wider shadow-[0_6px_20px_rgba(255,87,34,0.35)] active:scale-[0.99] transition-transform flex items-center justify-center gap-2" type="submit">
<span>🚀 TRANSMIT KONFIRMASI KEHADIRAN</span>
</button>
<div class="hidden mt-2 p-3 bg-secondary-container/20 rounded-lg text-center animate-fade-in" id="rsvp-success-msg">
<p class="font-body-sm text-body-sm text-secondary font-semibold">✨ Terima Kasih! Konfirmasi Anda telah tercatat dalam arsip transmisi VIP.</p>
</div>
</form>
</div>
</section>
<!-- Buku Tamu Digital (Untaian Doa Sahabat) -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="flex items-center justify-between mb-space-sm">
<div>
<span class="font-label-caps text-label-caps text-tertiary uppercase tracking-widest block">Buku Tamu Digital</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Untaian Doa Sahabat</h3>
</div>
<span class="material-symbols-outlined text-tertiary text-[22px]">forum</span>
</div>
<!-- Message Bubbles Feed -->
<div class="space-y-space-xs">
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-body-sm text-body-sm font-bold text-primary">Rian & Studio Animorph</span>
<span class="font-label-caps text-[10px] text-on-surface-variant">10 Menit lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          “Selamat atas kelahiran Solaris! Karakternya begitu hidup dan inspiratif. Bangga sekali melihat karya lokal mencapai kualitas spektakuler seperti ini!”
        </p>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-body-sm text-body-sm font-bold text-secondary">Alysia Putri</span>
<span class="font-label-caps text-[10px] text-on-surface-variant">1 Jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          “Happy Birthday Solaris! Semoga api keberaniannya menyinari semua seniman muda di tanah air. Sampai bertemu di The Glass House!”
        </p>
</div>
<div class="p-space-sm rounded-lg bg-surface-container-low shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-body-sm text-body-sm font-bold text-tertiary">Bagas Dharmawan (Illustrator)</span>
<span class="font-label-caps text-[10px] text-on-surface-variant">3 Jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          “Desain kostumnya luar biasa garang, sentuhan sunset oranye-nya benar-benar magis. Sukses besar untuk perilisan babak pertama!”
        </p>
</div>
</div>
</section>
<!-- Tanda Kasih Digital (Angpau Digital) -->
<section class="px-margin-mobile pt-space-lg pb-space-sm">
<div class="bg-surface-container rounded-xl p-space-md shadow-md">
<div class="flex items-center gap-space-xs text-secondary mb-1">
<span class="material-symbols-outlined text-[18px]">volunteer_activism</span>
<span class="font-label-caps text-label-caps uppercase tracking-widest">Tanda Kasih Digital</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Dukungan Karya & Animasi</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
        Bagi kerabat dan sahabat yang ingin memberikan tanda kasih untuk pengembangan proyek film pendek animasi independen Solaris:
      </p>
<div class="space-y-space-xs mt-space-sm">
<!-- Bank 1 Card -->
<div class="bg-surface-container-high rounded-lg p-space-sm flex items-center justify-between shadow-xs mb-3">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">{{ $bankName1 }}</span>
<span class="font-title-md text-title-md font-mono text-on-surface font-semibold tracking-wider">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded text-label-caps uppercase font-semibold hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-high rounded-lg p-space-sm flex items-center justify-between shadow-xs">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">{{ $bankName2 }}</span>
<span class="font-title-md text-title-md font-mono text-on-surface font-semibold tracking-wider">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded text-label-caps uppercase font-semibold hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</div>
</section>
<!-- Closing Tribute & Family Seal -->
<section class="px-margin-mobile pt-space-lg pb-space-2xl flex flex-col items-center text-center">
<!-- Wax Seal Emblem Embed -->
<div class="relative w-28 h-28 my-space-xs flex items-center justify-center">
<div class="absolute inset-0 bg-primary-container/20 rounded-full blur-xl animate-pulse"></div>
<img alt="Solaris Sunset Wax Seal Emblem" class="w-full h-full object-contain filter drop-shadow hover:rotate-6 transition-transform duration-500" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mt-space-sm uppercase tracking-wider">
      Sampai Jumpa di Pelukan Senja
    </h4>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-1">
      Merupakan sebuah kehormatan tak terhingga dapat merayakan fajar baru imajinasi ini bersama Anda.
    </p>
<div class="mt-space-md pt-space-xs">
<span class="font-label-caps text-label-caps text-tertiary tracking-widest uppercase block font-bold">HORMAT KAMI,</span>
<span class="font-headline-sm text-headline-sm text-transparent bg-clip-text bg-gradient-to-r from-primary via-tertiary to-secondary block mt-0.5">
        CREATOR FAMILY & SOLARIS CORE TEAM
      </span>
<span class="font-label-caps text-[10px] text-on-surface-variant uppercase tracking-widest block mt-1">
        JAKARTA • DECEMBER 2025 • ALL RIGHTS RESERVED
      </span>
</div>
</section>
<script>
    // Live countdown simulation
    (function initCountdown() { return;
      let sec = 12;
      let min = 35;
      const elSec = document.getElementById('cd-seconds');
      const elMin = document.getElementById('cd-minutes');
      if (!elSec) return;
      setInterval(() => {
        sec--;
        if (sec < 0) {
          sec = 59;
          min--;
          if (elMin) elMin.textContent = String(min).padStart(2, '0');
        }
        elSec.textContent = String(sec).padStart(2, '0');
      }, 1000);
    })();
  </script>
</div></main><nav class="fixed bottom-0 inset-x-0 z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-8px_24px_rgba(215,3,87,0.12)]" data-active-classes="text-primary font-bold"><div class="flex justify-around items-center h-20 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] gap-space-xs transition-colors text-primary font-bold" data-path="undangan-utama---solaris-sunset" href="#undangan"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-caps text-label-caps uppercase">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] gap-space-xs text-on-surface-variant transition-colors" data-path="karakter-solaris" href="#karakter"><span class="material-symbols-outlined text-[22px]">shield</span><span class="font-label-caps text-label-caps uppercase">Karakter</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] gap-space-xs text-on-surface-variant transition-colors" data-path="jadwal-gala" href="#jadwal"><span class="material-symbols-outlined text-[22px]">event</span><span class="font-label-caps text-label-caps uppercase">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] gap-space-xs text-on-surface-variant transition-colors" data-path="lokasi-venue" href="#lokasi"><span class="material-symbols-outlined text-[22px]">explore</span><span class="font-label-caps text-label-caps uppercase">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] gap-space-xs text-on-surface-variant transition-colors" data-path="rsvp-portal" href="#rsvp"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-caps text-label-caps uppercase">RSVP</span></a></div></nav>
    </div>

    <script>
        window.isAudioPlaying = false;

        function openInvitation() {
            const cover = document.getElementById('invitation-cover');
            const main = document.getElementById('invitation-main');
            const audio = document.getElementById('invitationAudio');
            const flashOverlay = document.getElementById('unlock-flash');
            if (flashOverlay) {
                flashOverlay.classList.add('opacity-0', 'pointer-events-none');
                flashOverlay.style.display = 'none';
            }

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

        // Live Countdown Script
        (function() {
            let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
            function updateCountdown() {
                const now = new Date().getTime();
                const diff = targetDate - now;
                if (diff <= 0) return;

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                const elD = document.getElementById('cd-days') || document.getElementById('countdown-days');
                const elH = document.getElementById('cd-hours') || document.getElementById('countdown-hours');
                const elM = document.getElementById('cd-minutes') || document.getElementById('countdown-minutes');
                const elS = document.getElementById('cd-seconds') || document.getElementById('countdown-seconds');

                if (elD) elD.innerText = String(days).padStart(2, '0');
                if (elH) elH.innerText = String(hours).padStart(2, '0');
                if (elM) elM.innerText = String(minutes).padStart(2, '0');
                if (elS) elS.innerText = String(seconds).padStart(2, '0');
            }
            setInterval(updateCountdown, 1000);
            updateCountdown();

            window.updateTargetDate = function(newDateStr) {
                if (newDateStr) {
                    targetDate = new Date(newDateStr).getTime();
                    updateCountdown();
                }
            };
        })();

        // PostMessage listener for Live Preview iframe
        
        window.renderDynamicEvents = function(events) {
            const container = document.getElementById("itineraryContainer");
            if (!container || !Array.isArray(events) || events.length === 0) return;
            const filament = `<div class="absolute left-1 top-2 bottom-2 w-0.5 bg-gradient-to-b from-primary via-secondary-container to-tertiary"></div>`;
            const dotColors = ["bg-primary", "bg-primary-container", "bg-secondary-container", "bg-tertiary"];
            container.innerHTML = filament + events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.00 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Google Maps</span></a>` : "";
                const dotColor = dotColors[i % dotColors.length];
                return `
                    <div class="relative pl-3 event-itinerary-item">
                        <span class="absolute -left-[15px] top-1.5 w-2 h-2 rounded-full ${dotColor} ring-4 ring-surface-container-high"></span>
                        <span class="font-label-caps text-label-caps text-tertiary font-bold">${timeStr}</span>
                        <h5 class="font-body-md text-body-md font-bold text-on-surface">${title}</h5>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">${venue}${addr ? " &bull; " + addr : ""}</p>
                        ${dateStr ? `<span class="text-[10px] text-tertiary block mt-0.5 font-medium">${dateStr}</span>` : ""}
                        ${mapsBtn}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'solaris-sunset-gradient' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>