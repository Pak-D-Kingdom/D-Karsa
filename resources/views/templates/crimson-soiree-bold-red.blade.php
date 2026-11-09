<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Crimson Soirée: Chapter Thirty') . ' - ' . ($couple->groom_name ?? 'Devan Pramudya') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Devan Pramudya' }} - Ulang Tahun Dewasa - Minimalis Modern Bold Red."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "tertiary": "#8a1538", "on-tertiary-fixed-variant": "#8a1538", "surface-dim": "#dcd9dc", "primary-fixed-dim": "#ffb4ab", "inverse-on-surface": "#f3f0f2", "on-tertiary": "#ffffff", "on-secondary": "#ffffff", "on-secondary-fixed-variant": "#47464a", "background": "#fcf8fb", "on-tertiary-container": "#ffcbd2", "error-container": "#ffdad6", "on-surface": "#1c1b1d", "surface-container-lowest": "#ffffff", "error": "#ba1a1a", "on-primary-fixed": "#410002", "surface": "#fcf8fb", "inverse-surface": "#313032", "on-primary": "#ffffff", "surface-bright": "#fcf8fb", "tertiary-fixed-dim": "#ffb2bd", "tertiary-container": "#aa304f", "on-background": "#1c1b1d", "on-secondary-container": "#656467", "primary-fixed": "#ffdad6", "surface-container-low": "#f6f2f5", "on-surface-variant": "#5b403d", "secondary-fixed-dim": "#c8c5ca", "surface-container-highest": "#e5e1e4", "outline": "#8f6f6c", "surface-container-high": "#eae7ea", "on-primary-fixed-variant": "#93000b", "outline-variant": "#e4beb9", "on-tertiary-fixed": "#400014", "secondary-fixed": "#e4e1e6", "secondary-container": "#e4e1e6", "on-primary-container": "#ffcdc7", "inverse-primary": "#ffb4ab", "primary-container": "#b91c1c", "primary": "#93000b", "tertiary-fixed": "#ffd9dd", "surface-container": "#f0edf0", "surface-variant": "#e5e1e4", "secondary": "#5f5e61", "on-error": "#ffffff", "on-secondary-fixed": "#1b1b1e", "on-error-container": "#93000a", "surface-tint": "#b91c1c" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-xs": "0.25rem", "space-md": "1rem", "gutter-mobile": "1rem", "space-xl": "2.5rem", "space-sm": "0.5rem", "margin-mobile": "1.25rem", "gutter": "1.5rem", "space-lg": "1.5rem", "margin": "3rem" }, "fontFamily": { "label-sm": ["Space Grotesk"], "headline-lg": ["Space Grotesk"], "label-md": ["Space Grotesk"], "headline-lg-mobile": ["Space Grotesk"], "headline-sm": ["Space Grotesk"], "display-mobile": ["Space Grotesk"], "display": ["Space Grotesk"], "body-md": ["Plus Jakarta Sans"], "body-sm": ["Plus Jakarta Sans"], "headline-md": ["Space Grotesk"], "label-lg": ["Space Grotesk"], "body-lg": ["Plus Jakarta Sans"] }, "fontSize": { "label-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.12em", "fontWeight": "600" }], "headline-lg": ["48px", { "lineHeight": "54px", "letterSpacing": "-0.03em", "fontWeight": "600" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.06em", "fontWeight": "500" }], "headline-lg-mobile": ["32px", { "lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "600" }], "headline-sm": ["20px", { "lineHeight": "26px", "letterSpacing": "-0.01em", "fontWeight": "600" }], "display-mobile": ["44px", { "lineHeight": "48px", "letterSpacing": "-0.03em", "fontWeight": "700" }], "display": ["72px", { "lineHeight": "80px", "letterSpacing": "-0.04em", "fontWeight": "700" }], "body-md": ["15px", { "lineHeight": "24px", "fontWeight": "400" }], "body-sm": ["13px", { "lineHeight": "20px", "fontWeight": "400" }], "headline-md": ["28px", { "lineHeight": "34px", "letterSpacing": "-0.02em", "fontWeight": "600" }], "label-lg": ["14px", { "lineHeight": "18px", "letterSpacing": "0.08em", "fontWeight": "600" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Devan Pramudya';
        $celebrantNick = $couple->groom_nickname ?? 'Devan';
        $heading = $couple->event_heading ?? 'Crimson Soirée: Chapter Thirty';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dewasa';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Main Celebration & Milestone Toast',
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
        $quote = $couple->quote ?? 'Entering thirty with clarity, bold conviction, and deep gratitude for every milestone.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7u7oze2fsIArA9JU5fPuG8VRUbvwwHHb-KrIZrb-6grSw-5gzRr9d4NRYCwUvgglHPZnAbpiZdgmk3igMYj48mQ4V025UwNyp4Fx7CIbNcmth1HzAEB1R2j4pjOFa-jPPPrbjQmkvXQ_WiyjHSsRC9wgK6k4YBYMP0XKDRia3Bl1xUKOKKioGxZoMpFsTa5WPAWTesi5lR01didVxEZIQeB1FjNStLAIn57-KXjk0';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7u7oze2fsIArA9JU5fPuG8VRUbvwwHHb-KrIZrb-6grSw-5gzRr9d4NRYCwUvgglHPZnAbpiZdgmk3igMYj48mQ4V025UwNyp4Fx7CIbNcmth1HzAEB1R2j4pjOFa-jPPPrbjQmkvXQ_WiyjHSsRC9wgK6k4YBYMP0XKDRia3Bl1xUKOKKioGxZoMpFsTa5WPAWTesi5lR01didVxEZIQeB1FjNStLAIn57-KXjk0';
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

        $venueName = $couple->venue_name ?? 'The Crimson Room, Grand Hyatt';
        $venueAddress = $couple->venue_address ?? 'Jl. M.H. Thamrin Kav. 28-30, Gondangdia, Jakarta Pusat';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7u7oze2fsIArA9JU5fPuG8VRUbvwwHHb-KrIZrb-6grSw-5gzRr9d4NRYCwUvgglHPZnAbpiZdgmk3igMYj48mQ4V025UwNyp4Fx7CIbNcmth1HzAEB1R2j4pjOFa-jPPPrbjQmkvXQ_WiyjHSsRC9wgK6k4YBYMP0XKDRia3Bl1xUKOKKioGxZoMpFsTa5WPAWTesi5lR01didVxEZIQeB1FjNStLAIn57-KXjk0', 'caption' => 'Momen Bahagia #1'],
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
        <main class="flex flex-col relative w-full flex-1 bg-surface pt-safe pb-safe"><div class="flex flex-col w-full px-4 py-3 justify-between items-center text-center overflow-hidden select-none" id="envelope-screen">
<!-- Top Audio Status & Editorial Edition Meta -->
<div class="flex flex-col items-center w-full gap-1.5 pt-1">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high text-on-surface shadow-sm">
<span class="inline-flex items-end gap-0.5 h-3">
<span class="w-0.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
<span class="w-0.5 h-3 bg-primary rounded-full animate-pulse" style="animation-delay: 150ms;"></span>
<span class="w-0.5 h-2 bg-primary rounded-full animate-pulse" style="animation-delay: 300ms;"></span>
<span class="w-0.5 h-3 bg-primary rounded-full animate-pulse" style="animation-delay: 75ms;"></span>
</span>
<span class="font-label-sm text-label-sm tracking-widest text-primary uppercase">CRIMSON RESONANCE — CHAPTER 30</span>
</div>
<span class="font-label-sm text-label-sm text-secondary tracking-widest uppercase">
      CHAPTER 30 • PRIVATE SOIRÉE • ED. 2025
    </span>
</div>
<!-- Central Visual Anchor & Celebrant Identity -->
<div class="flex flex-col items-center w-full my-auto py-2">
<!-- Emblem & Interactive Seal Trigger -->
<div class="relative cursor-pointer group flex items-center justify-center mb-2" id="seal-trigger" onclick="triggerOpenInvitation()">
<div class="absolute -inset-2.5 rounded-full bg-primary-fixed-dim/30 animate-ping opacity-40"></div>
<div class="absolute -inset-1 rounded-full bg-primary-container/20 blur-sm"></div>
<div class="relative w-20 h-20 rounded-full bg-surface-container-lowest p-1 shadow-md transition-transform duration-300 group-active:scale-95">
<img alt="Bold Red Milestone 30th Seal" class="w-full h-full object-contain rounded-full" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
<!-- Interaction Prompt -->
<div class="flex items-center gap-1.5 mb-2.5">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span class="font-label-sm text-label-sm tracking-widest text-primary font-semibold">KETUK UNTUK MEMBUKA SEGEL</span>
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
</div>
<!-- Typography Editorial Block -->
<span class="font-label-sm text-label-sm tracking-wider text-secondary uppercase mb-1">
      CELEBRATING THREE DECADES OF VISION &amp; PURPOSE
    </span>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight mb-1" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant italic max-w-xs leading-snug px-2">
      “Entering thirty with clarity, bold conviction, and deep gratitude for every milestone shared.”
    </p>
</div>
<!-- Guest Pass Envelope Card -->
<div class="w-full max-w-sm bg-surface-container-lowest rounded-xl shadow-md p-3.5 text-left relative overflow-hidden mb-2">
<div class="absolute top-0 left-0 right-0 h-1 bg-primary"></div>
<div class="flex items-center justify-between mb-2 pt-0.5">
<span class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">
        ★ VIP INVITATION • ACCESS PASS
      </span>
<span class="font-label-sm text-label-sm text-secondary font-mono tracking-wider">
        NO. 030-DP
      </span>
</div>
<div class="space-y-0.5 mb-2">
<span class="block font-label-sm text-label-sm text-secondary tracking-widest uppercase">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </span>
<div class="flex items-baseline justify-between">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight" id="previewGuestNameCover">
          {{ $guestName }}
        </span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">
          Di Tempat
        </span>
</div>
</div>
<p class="font-body-sm text-body-sm text-secondary leading-snug">
      Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga perayaan ulang tahun ke-30 yang penuh kehangatan, inspirasi, dan rasa syukur.
    </p>
</div>
<!-- Interactive Call-To-Action (CTA) -->
<div class="w-full max-w-sm mb-2">
<button class="w-full bg-primary-container text-on-primary py-3 rounded-lg shadow-md hover:bg-primary transition-all duration-200 active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">mail</span>
<span class="font-label-lg text-label-lg uppercase tracking-wider font-bold">BUKA UNDANGAN</span>
<span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
</div>
<!-- Footer Event Logistics -->
<div class="flex flex-col items-center gap-0.5 pb-1">
<div class="flex items-center gap-1.5 text-on-surface">
<span class="material-symbols-outlined text-sm text-primary">calendar_today</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase font-semibold">
        {{ strtoupper($eventDateFormatted) }} • THE LANGHAM JAKARTA
      </span>
</div>
<span class="font-label-sm text-label-sm text-secondary tracking-widest uppercase">
      DRESS CODE: MODERN BLACK TIE &amp; CRIMSON ACCENT • RSVP STRICTLY REQUIRED
    </span>
</div>
</div>
<script>
  function triggerOpenInvitation() {
    const seal = document.getElementById('seal-trigger');
    if (seal) {
      seal.classList.add('scale-110');
      setTimeout(() => {
        seal.classList.remove('scale-110');
        if (typeof openInvitation === 'function') openInvitation();
      }, 200);
    }
  }
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-xl pt-safe shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm"><span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span><h1 class="font-label-md text-label-md uppercase text-on-surface tracking-widest font-semibold" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div><div class="flex items-center gap-space-xs"><button aria-label="Toggle Audio Ambient" class="w-11 h-11 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">volume_up</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex flex-col relative w-full flex-1 bg-surface pt-16 pb-24"><div class="flex flex-col w-full text-on-surface">
<!-- 1. HERO SECTION & CELEBRANT SHOWCASE -->
<section class="relative flex flex-col w-full px-margin-mobile pt-space-md pb-space-xl" id="undangan">
<div class="flex flex-col gap-space-sm items-start">
<div class="inline-flex items-center gap-space-xs px-space-sm py-1 bg-surface-container rounded-DEFAULT">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span class="font-label-sm text-label-sm tracking-widest uppercase text-primary font-semibold">1995 • CHAPTER XXX • 2025</span>
</div>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant font-medium">30TH MILESTONE SOIRÉE • JAKARTA</span>
</div>
<!-- Editorial Portrait Presentation -->
<div class="relative w-full mt-space-md aspect-[3/4] rounded-xl overflow-hidden bg-surface-container-high shadow-md">
<img alt="Devan Pramudya - Chapter 30 Celebrant" class="w-full h-full object-cover object-top" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface via-inverse-surface/30 to-transparent"></div>
<div class="absolute bottom-0 inset-x-0 p-space-md flex flex-col gap-space-xs text-inverse-on-surface">
<div class="flex items-center gap-space-xs">
<span class="px-2 py-0.5 bg-primary-container text-on-primary font-label-sm text-label-sm rounded-DEFAULT uppercase tracking-wider font-semibold">Chapter 30</span>
<span class="text-white/80 font-label-sm text-label-sm tracking-widest uppercase">The Langham Jakarta</span>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-white tracking-tight uppercase leading-none mt-1">
          DEVAN PRAMUDYA
        </h2>
</div>
</div>
<!-- Celebrant Manifesto -->
<div class="mt-space-md p-space-md bg-surface-container-low rounded-xl">
<div class="flex items-start gap-space-xs text-primary-container mb-space-xs">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">format_quote</span>
</div>
<p class="font-body-md text-body-md text-on-surface italic leading-relaxed">
        “Reflecting on three decades of growth, forging visions with intent, and celebrating the people who make this journey extraordinary.”
      </p>
</div>
</section>
<!-- 2. GUEST VIP RESERVATION PASS -->
<section class="px-margin-mobile pb-space-xl">
<div class="bg-surface-container-high rounded-xl p-space-md shadow-sm relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary-container/10 pointer-events-none"></div>
<div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1.5 pb-space-sm">
<span class="font-label-sm text-xs tracking-wider uppercase text-on-surface-variant font-semibold">KEPADA YTH. TAMU KEHORMATAN:</span>
<span class="px-2 py-0.5 bg-primary-container text-on-primary text-[10px] rounded-DEFAULT uppercase font-bold tracking-wider shrink-0">VIP PASS</span>
</div>
<div class="pt-space-xs">
<h3 class="font-headline-sm text-lg sm:text-xl text-on-surface font-semibold tracking-tight" id="previewGuestNameMain">
{{ $guestName }}
</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">
          Merupakan kehormatan mendalam bagi kami menyambut kehadiran Anda untuk bersulang dan merayakan tonggak usia ke-30 ini bersama.
        </p>
</div>
<div class="mt-space-md p-space-sm bg-surface-container-lowest rounded-lg flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary-container text-[20px]">table_restaurant</span>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">MEJA RESERVASI VIP</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">CRIMSON SUITE A-08</span>
</div>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Kapasitas</span>
<span class="font-label-md text-label-md text-primary font-semibold block">2 Tamu</span>
</div>
</div>
</div>
</section>
<!-- 3. PROFIL SINGKAT (SEKILAS PERJALANAN DI USIA 30) -->
<section class="px-margin-mobile pb-space-xl" id="profil">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">CHAPTER RETROSPECTIVE</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-md">
      Sekilas Perjalanan di Usia 30
    </h3>
<!-- Rundown Timeline -->
<div class="flex flex-col gap-space-sm" id="itineraryContainer">
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
        if (empty($evTimeStr)) $evTimeStr = "18.30 - 22.00 WIB";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
    @endphp
    <div class="p-space-md bg-surface-container-low rounded-xl flex items-start gap-space-md event-itinerary-item border border-primary/20">
        <div class="flex flex-col items-center shrink-0">
            <span class="px-2 py-0.5 bg-primary-container text-on-primary rounded font-label-sm text-label-sm font-semibold">{{ $evTimeStr }}</span>
            <span class="font-label-sm text-[10px] text-primary tracking-widest uppercase mt-1 font-bold">SESI {{ $index + 1 }}</span>
        </div>
        <div class="flex flex-col flex-1 min-w-0">
            <h4 class="font-label-lg text-label-lg font-semibold text-on-surface leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary font-semibold block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary font-bold hover:underline mt-1">
                    <span class="material-symbols-outlined text-[14px]">directions</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</section>
<!-- 4. JADWAL ACARA & COUNTDOWN -->
<section class="px-margin-mobile pb-space-xl" id="jadwal">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">EVENT SCHEDULE</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-xs">
      Jadwal Acara &amp; Live Countdown
    </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
      {{ $eventDateFormatted }} • {{ $eventTimeFormatted }} (Pintu ballroom dibuka 18.00 WIB)
    </p>
<!-- Countdown Timer (Live via inline JS) -->
<div class="bg-inverse-surface text-inverse-on-surface p-space-md rounded-xl mb-space-md">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-sm text-label-sm tracking-wider uppercase text-inverse-on-surface/80">HITUNG MUNDUR ACARA</span>
<span class="material-symbols-outlined text-primary-fixed-dim text-[18px]">timelapse</span>
</div>
<div class="grid grid-cols-4 gap-2 text-center" id="countdown-grid">
<div class="bg-on-surface-variant/20 p-space-xs rounded-lg flex flex-col items-center">
<span class="font-headline-md text-headline-md font-bold text-white leading-none" id="days-val">--</span>
<span class="font-label-sm text-label-sm text-inverse-on-surface/70 uppercase mt-1">Hari</span>
</div>
<div class="bg-on-surface-variant/20 p-space-xs rounded-lg flex flex-col items-center">
<span class="font-headline-md text-headline-md font-bold text-white leading-none" id="hours-val">--</span>
<span class="font-label-sm text-label-sm text-inverse-on-surface/70 uppercase mt-1">Jam</span>
</div>
<div class="bg-on-surface-variant/20 p-space-xs rounded-lg flex flex-col items-center">
<span class="font-headline-md text-headline-md font-bold text-white leading-none" id="minutes-val">--</span>
<span class="font-label-sm text-label-sm text-inverse-on-surface/70 uppercase mt-1">Menit</span>
</div>
<div class="bg-on-surface-variant/20 p-space-xs rounded-lg flex flex-col items-center">
<span class="font-headline-md text-headline-md font-bold text-white leading-none" id="seconds-val">--</span>
<span class="font-label-sm text-label-sm text-inverse-on-surface/70 uppercase mt-1">Detik</span>
</div>
</div>
</div>
</section>
<!-- 5. LOKASI ACARA & AKSES PETA -->
<section class="px-margin-mobile pb-space-xl" id="lokasi">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">VENUE &amp; ARRIVAL</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-sm">
      Lokasi Acara &amp; Akses
    </h3>
<div class="bg-surface-container-low rounded-xl overflow-hidden shadow-sm">
<!-- Static Location View Map Pipeline -->
<div class="w-full h-44 bg-cover bg-center relative" data-location="The Langham Jakarta District 8 SCBD" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC0nU41Bnejm6jwBGzXiqaWgdtGUvtZKbIv2w95Lr5oqtU1s4R_vGdaaoJaN2D-7EQUy5neeyAwwW4jLWnLF73ZhNcmdJquxd3bFoKv9cwUzFeji3CprOEuJ_nIh_ugiGCuNrhgMp55pDReziIYqbT2-TYQCKecXrnJlvIbPC7yG7RVpemZu_I_-esMsFKHGfUV3hCQuPn4Lb3_O_NH1h4Jdzu7UQ7jdazPhRskTTWa')">
<div class="absolute inset-0 bg-inverse-surface/20"></div>
<div class="absolute bottom-3 left-3 bg-inverse-surface/90 text-inverse-on-surface px-2.5 py-1 rounded flex items-center gap-1.5 backdrop-blur-sm">
<span class="material-symbols-outlined text-[16px] text-primary-fixed-dim">pin_drop</span>
<span class="font-label-sm text-label-sm font-semibold">District 8 SCBD • Level 2</span>
</div>
</div>
<div class="p-space-md flex flex-col gap-space-xs">
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">
          The Grand Ballroom, Level 2
        </h4>
<span class="font-label-md text-label-md text-primary font-semibold">The Langham Jakarta</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          District 8 SCBD, Jl. Jend. Sudirman Kav 52-53, Senayan, Jakarta Selatan 12190.
        </p>
<div class="mt-space-xs p-space-xs bg-surface-container rounded-lg flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary-container text-[20px]">local_parking</span>
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">Layanan VIP Valet tersedia di lobi utama The Langham.</span>
</div>
<div class="grid grid-cols-2 gap-space-sm mt-space-sm">
<a id="previewMapsLinkMain" class="py-2 px-space-xs bg-primary-container text-on-primary rounded-lg flex items-center justify-center gap-1 font-label-md text-label-md uppercase font-semibold" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">directions</span>
            BUKA MAPS
          </a>
<button class="py-2 px-space-xs bg-surface-container text-on-surface rounded-lg flex items-center justify-center gap-1 font-label-md text-label-md uppercase font-semibold" onclick="navigator.clipboard.writeText('{{ addslashes($venueAddress) }}'); const b=this.querySelector('.btn-label'); b.textContent='TERSALIN!'; setTimeout(()=&gt;b.textContent='SALIN ALAMAT', 2000);" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span class="btn-label">SALIN ALAMAT</span>
</button>
</div>
</div>
</div>
</section>
<!-- 6. TEMA PESTA & PANDUAN BUSANA -->
<section class="px-margin-mobile pb-space-xl">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">AESTHETIC &amp; ATTIRE</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-xs">
      Dress Code: Modern Crimson &amp; Black Tie
    </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
      Untuk menciptakan atmosfer malam yang elegan, terstruktur, dan berkesan harmonis:
    </p>
<!-- Color Palette Swatches -->
<div class="bg-surface-container-low p-space-md rounded-xl mb-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant font-semibold block mb-space-xs">PALET WARNA RESMI</span>
<div class="grid grid-cols-5 gap-2 text-center">
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full bg-primary-container shadow-sm"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Crimson</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full bg-inverse-surface shadow-sm"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Onyx</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full bg-secondary shadow-sm"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Slate</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full bg-surface-container-highest shadow-sm"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">Silver</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-10 h-10 rounded-full bg-surface-container-lowest shadow-sm"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">White</span>
</div>
</div>
</div>
<!-- Attire Details for Men & Ladies -->
<div class="flex flex-col gap-space-sm">
<div class="p-space-md bg-surface-container-low rounded-xl">
<div class="flex items-center gap-space-xs text-primary font-semibold mb-1">
<span class="material-symbols-outlined text-[20px]">man</span>
<h4 class="font-label-lg text-label-lg uppercase">Tamu Pria (Gentlemen)</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Modern tailored black tuxedo atau sharp charcoal suit dengan dasi kupu-kupu atau aksen pocket square merah crimson, dipadukan kemeja crisp white dress shirt.
        </p>
</div>
<div class="p-space-md bg-surface-container-low rounded-xl">
<div class="flex items-center gap-space-xs text-tertiary-container font-semibold mb-1">
<span class="material-symbols-outlined text-[20px]">woman</span>
<h4 class="font-label-lg text-label-lg uppercase">Tamu Wanita (Ladies)</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Chic architectural cocktail dress atau modern evening gown bernuansa bold crimson, deep wine, sleek onyx black, atau silver platinum yang anggun.
        </p>
</div>
</div>
</section>
<!-- 7. GALERI FOTO (GALERI BABAK 30) -->
<section class="px-margin-mobile pb-space-xl">
<div class="flex items-center justify-between mb-space-xs">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">VISUAL ESSAY</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight">
          Galeri Babak 30
        </h3>
</div>
<span class="material-symbols-outlined text-primary-container text-[24px]">photo_library</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
      Eksplorasi estetika, momen persiapan intim, dan nuansa ballroom Chapter 30.
    </p>
<!-- Visual Grid -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-sm">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="rounded-xl overflow-hidden bg-surface-container shadow-sm flex flex-col border border-outline-variant/30">
    <div class="relative w-full aspect-square bg-surface-container-high overflow-hidden">
      <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-space-xs flex flex-col">
        <span class="font-title-md text-[12px] text-primary leading-tight truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 8. FORMULIR RSVP (KONFIRMASI KEHADIRAN TAMU VIP) -->
<section class="px-margin-mobile pb-space-xl" id="rsvp">
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">RESERVASI RESMI</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-xs">
        Konfirmasi Kehadiran Tamu VIP
      </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
        Mohon mengisi konfirmasi kehadiran sebelum 20 November 2025 demi kelancaran tata letak jamuan makan malam.
      </p>
<form class="flex flex-col gap-space-md" id="rsvp-form" onsubmit="event.preventDefault(); document.getElementById('rsvp-success').classList.remove('hidden'); document.getElementById('rsvp-form').classList.add('hidden');">
<!-- Input Nama Tamu -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="guest-name">Nama Lengkap Tamu</label>
<input class="w-full px-space-md py-2.5 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:ring-0 shadow-sm" id="guest-name" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Jumlah Kehadiran -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Jumlah Kehadiran</label>
<div class="grid grid-cols-2 gap-space-sm">
<label class="cursor-pointer">
<input class="peer sr-only" name="pax" type="radio" value="1"/>
<div class="p-space-sm rounded-lg bg-surface-container-lowest peer-checked:bg-primary-container peer-checked:text-on-primary text-on-surface text-center font-label-md text-label-md font-semibold shadow-sm transition-colors">
                1 Orang
              </div>
</label>
<label class="cursor-pointer">
<input checked="" class="peer sr-only" name="pax" type="radio" value="2"/>
<div class="p-space-sm rounded-lg bg-surface-container-lowest peer-checked:bg-primary-container peer-checked:text-on-primary text-on-surface text-center font-label-md text-label-md font-semibold shadow-sm transition-colors">
                2 Orang (Pasangan)
              </div>
</label>
</div>
</div>
<!-- Status Kehadiran Radio -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Status Konfirmasi</label>
<div class="grid grid-cols-2 gap-space-sm">
<label class="cursor-pointer">
<input checked="" class="peer sr-only" name="attendance" type="radio" value="hadir"/>
<div class="p-space-sm rounded-lg bg-surface-container-lowest peer-checked:bg-primary-container peer-checked:text-on-primary text-on-surface text-center font-label-md text-label-md font-semibold shadow-sm flex items-center justify-center gap-1 transition-colors">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
                Ya, Hadir
              </div>
</label>
<label class="cursor-pointer">
<input class="peer sr-only" name="attendance" type="radio" value="tidak"/>
<div class="p-space-sm rounded-lg bg-surface-container-lowest peer-checked:bg-secondary peer-checked:text-on-secondary text-on-surface text-center font-label-md text-label-md font-semibold shadow-sm flex items-center justify-center gap-1 transition-colors">
<span class="material-symbols-outlined text-[16px]">cancel</span>
                Berhalangan
              </div>
</label>
</div>
</div>
<!-- Pesan & Doa -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="guest-wishes">Pesan &amp; Doa Hangat</label>
<textarea class="w-full px-space-md py-2.5 bg-surface-container-lowest rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:ring-0 shadow-sm" id="guest-wishes" placeholder="Tuliskan ucapan selamat atau doa untuk babak ke-30 Devan..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full py-3 bg-primary-container text-on-primary rounded-lg font-label-lg text-label-lg font-semibold uppercase tracking-wider shadow-md hover:bg-primary transition-colors flex items-center justify-center gap-space-xs" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
          KIRIM KONFIRMASI &amp; DOA
        </button>
</form>
<!-- Confirmation Feedback Toast Box -->
<div class="hidden p-space-md bg-surface-container-highest rounded-lg text-center flex-col items-center gap-space-xs" id="rsvp-success">
<span class="material-symbols-outlined text-primary-container text-[36px]">verified</span>
<h4 class="font-label-lg text-label-lg font-semibold text-on-surface">Konfirmasi Kehadiran Diterima!</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Terima kasih {{ $guestName }}. Meja Crimson Suite A-08 telah diamankan untuk Anda. Sampai jumpa di malam perayaan!
        </p>
</div>
</div>
</section>
<!-- 9. BUKU TAMU DIGITAL (UNTAIAN DOA & HARAPAN) -->
<section class="px-margin-mobile pb-space-xl">
<div class="flex items-center justify-between mb-space-xs">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">WORDS OF WARMTH</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight">
          Untaian Doa &amp; Harapan
        </h3>
</div>
<span class="material-symbols-outlined text-primary-container text-[24px]">favorite</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
      Pesan kasih dan apresiasi dari sahabat terdekat untuk babak baru Devan Pramudya.
    </p>
<!-- Wishes Stream -->
<div class="flex flex-col gap-space-sm" id="wishes-stream">
<div class="p-space-md bg-surface-container-low rounded-xl flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="font-label-md text-label-md text-on-surface font-bold">Arya Senjaya</span>
<span class="px-1.5 py-0.2 bg-primary-container text-on-primary font-label-sm text-label-sm rounded uppercase">Partner</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
          “Selamat menginjak usia 30, Dev! Teruslah merancang karya arsitektur yang menginspirasi banyak jiwa. Doa terbaik untuk visi besar ke depan.”
        </p>
<div class="flex items-center gap-1 text-primary-container font-label-sm text-label-sm font-semibold pt-1">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span>18 Resonansi</span>
</div>
</div>
<div class="p-space-md bg-surface-container-low rounded-xl flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="font-label-md text-label-md text-on-surface font-bold">Clara Anastasia</span>
<span class="px-1.5 py-0.2 bg-secondary text-on-secondary font-label-sm text-label-sm rounded uppercase">Sahabat</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
          “Welcome to Chapter 30, Devan! Semoga kedewasaan ini membawa ketenangan, kebahagiaan sejati, dan petualangan marathon berikutnya!”
        </p>
<div class="flex items-center gap-1 text-primary-container font-label-sm text-label-sm font-semibold pt-1">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span>12 Resonansi</span>
</div>
</div>
</div>
</section>
<!-- 10. TANDA KASIH DIGITAL (GIFT REGISTRY) -->
<section class="px-margin-mobile pb-space-xl">
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">DIGITAL REGISTRY</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface tracking-tight mb-space-xs">
        Tanda Kasih Digital
      </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
        Kehadiran dan doa restu Anda adalah anugerah terbesar bagi kami. Namun apabila Anda berkehendak memberikan tanda kasih, dapat disalurkan melalui rekening resmi:
      </p>
<div class="flex flex-col gap-space-sm">
<!-- Bank 1 Card -->
<div class="p-space-md bg-surface-container-lowest rounded-lg flex items-center justify-between shadow-sm mb-3">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm font-bold tracking-wider text-primary uppercase">{{ $bankName1 }}</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-wider mt-0.5" id="bca-num">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="px-space-md py-2 bg-primary-container text-on-primary rounded-md font-label-sm text-label-sm uppercase font-semibold flex items-center gap-1 hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="p-space-md bg-surface-container-lowest rounded-lg flex items-center justify-between shadow-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm font-bold tracking-wider text-secondary uppercase">{{ $bankName2 }}</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface tracking-wider mt-0.5" id="mandiri-num">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="px-space-md py-2 bg-primary-container text-on-primary rounded-md font-label-sm text-label-sm uppercase font-semibold flex items-center gap-1 hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</div>
</section>
<!-- 11. PENUTUP & SALAM HANGAT -->
<section class="px-margin-mobile pb-space-lg flex flex-col items-center text-center">
<!-- Milestone Seal Image Reference -->
<div class="w-20 h-20 mb-space-sm">
<img alt="Bold Red Milestone 30th Seal" class="w-full h-full object-contain rounded-full" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold mb-1">UNGKAPAN SYUKUR</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight max-w-xs mb-space-xs">
      Sampai Jumpa di Malam Penuh Syukur &amp; Kebersamaan
    </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-sm mb-space-md">
      Merayakan tiga dekade bukan sekadar menghitung tahun yang berlalu, melainkan merayakan setiap cinta, persahabatan, dan memori tak ternilai yang telah kita ukir bersama.
    </p>
<div class="flex flex-col items-center">
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-bold">Devan Pramudya &amp; Keluarga Besar</span>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Jakarta, Indonesia • Chapter 30</span>
</div>
</section>
</div>
<script>
  // Dynamic Countdown Timer Logic for Event: 29 Nov 2025 18:30 WIB (UTC+7)
  (function initEventCountdown() {
    let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();

    function update() {
      const now = new Date().getTime();
      const diff = targetDate - now;

      if (diff <= 0) {
        document.getElementById('days-val').textContent = '00';
        document.getElementById('hours-val').textContent = '00';
        document.getElementById('minutes-val').textContent = '00';
        document.getElementById('seconds-val').textContent = '00';
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      document.getElementById('days-val').textContent = String(days).padStart(2, '0');
      document.getElementById('hours-val').textContent = String(hours).padStart(2, '0');
      document.getElementById('minutes-val').textContent = String(minutes).padStart(2, '0');
      document.getElementById('seconds-val').textContent = String(seconds).padStart(2, '0');
    }

    update();
    setInterval(update, 1000);

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        targetDate = new Date(newDateStr).getTime();
        update();
      }
    };
  })();

  // Smooth scroll handler for fixed bottom navigation tabs
  document.querySelectorAll('nav a[data-path]').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const path = this.getAttribute('data-path');
      const targetSection = document.getElementById(path);
      if (targetSection) {
        targetSection.scrollIntoView({ behavior: 'smooth' });
      }
      document.querySelectorAll('nav a[data-path]').forEach(item => {
        item.classList.remove('text-primary-container', 'font-semibold');
        item.classList.add('text-on-surface-variant');
      });
      this.classList.add('text-primary-container', 'font-semibold');
      this.classList.remove('text-on-surface-variant');
    });
  });
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/85 backdrop-blur-xl shadow-[0_-1px_12px_rgba(0,0,0,0.05)]" data-active-classes="text-primary-container font-semibold"><div class="flex justify-around items-center h-20 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center gap-1 w-14 h-14 transition-colors text-primary-container font-semibold" data-path="undangan" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Undangan</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors" data-path="profil" href="#"><span class="material-symbols-outlined text-[22px]">badge</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Profil</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">calendar_today</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Jadwal</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">pin_drop</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Lokasi</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">check_circle</span><span class="font-label-sm text-label-sm uppercase tracking-wider">RSVP</span></a></div></nav>
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
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.30 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary font-bold hover:underline mt-1"><span class="material-symbols-outlined text-[14px]">directions</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="p-space-md bg-surface-container-low rounded-xl flex items-start gap-space-md event-itinerary-item border border-primary/20">
                        <div class="flex flex-col items-center shrink-0">
                            <span class="px-2 py-0.5 bg-primary-container text-on-primary rounded font-label-sm text-label-sm font-semibold">${timeStr}</span>
                            <span class="font-label-sm text-[10px] text-primary tracking-widest uppercase mt-1 font-bold">SESI ${i + 1}</span>
                        </div>
                        <div class="flex flex-col flex-1 min-w-0">
                            <h4 class="font-label-lg text-label-lg font-semibold text-on-surface leading-snug">${title}</h4>
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'crimson-soiree-bold-red' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>