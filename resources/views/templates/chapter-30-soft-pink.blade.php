<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Chapter 30: Modern Radiance') . ' - ' . ($couple->groom_name ?? 'Clara Vivienne') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Clara Vivienne' }} - Ulang Tahun Dewasa - Geometris Soft Pink."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&amp;family=Syne:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-surface-variant": "#514345", "primary": "#874e58", "on-primary": "#ffffff", "tertiary-fixed": "#ffd9de", "outline": "#847375", "secondary-fixed": "#ffe088", "surface": "#fff8f9", "on-secondary": "#ffffff", "error-container": "#ffdad6", "on-secondary-fixed-variant": "#574500", "on-primary-fixed": "#360c17", "primary-fixed": "#ffd9de", "inverse-primary": "#fcb3be", "error": "#ba1a1a", "on-background": "#2a1522", "primary-fixed-dim": "#fcb3be", "surface-container-lowest": "#ffffff", "secondary": "#735c00", "tertiary-fixed-dim": "#e7bcc1", "on-secondary-fixed": "#241a00", "surface-container-high": "#ffe0ef", "on-tertiary": "#ffffff", "surface-bright": "#fff8f9", "surface-container": "#ffe8f2", "on-tertiary-fixed": "#2d1419", "inverse-surface": "#412937", "on-tertiary-container": "#65454a", "surface-container-low": "#fff0f5", "background": "#fff8f9", "on-surface": "#2a1522", "secondary-container": "#fed65b", "surface-container-highest": "#fed8eb", "primary-container": "#f4acb7", "on-error": "#ffffff", "outline-variant": "#d6c2c3", "on-tertiary-fixed-variant": "#5e3e43", "surface-tint": "#874e58", "inverse-on-surface": "#ffecf4", "secondary-fixed-dim": "#e9c349", "on-primary-fixed-variant": "#6b3741", "on-secondary-container": "#745c00", "surface-dim": "#f5d0e3", "on-error-container": "#93000a", "tertiary-container": "#dfb4ba", "tertiary": "#78555b", "on-primary-container": "#733d47", "surface-variant": "#fed8eb" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "space-xl": "3rem", "space-md": "1rem", "space-sm": "0.5rem", "gutter-mobile": "1rem", "margin": "3rem", "margin-mobile": "1.25rem", "gutter": "1.5rem", "space-xs": "0.25rem", "space-lg": "1.75rem" }, "fontFamily": { "headline-lg": ["Syne"], "label-md": ["Outfit"], "headline-xl": ["Syne"], "body-md": ["Outfit"], "body-lg": ["Outfit"], "label-sm": ["Outfit"], "headline-sm": ["Syne"], "headline-xl-mobile": ["Syne"], "headline-md": ["Syne"], "headline-lg-mobile": ["Syne"], "title-lg": ["Outfit"], "title-md": ["Outfit"] }, "fontSize": { "headline-lg": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.12em", "fontWeight": "600" }], "headline-xl": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-md": ["14px", { "lineHeight": "22px", "letterSpacing": "0.01em", "fontWeight": "400" }], "body-lg": ["16px", { "lineHeight": "26px", "letterSpacing": "0.01em", "fontWeight": "400" }], "label-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.16em", "fontWeight": "600" }], "headline-sm": ["22px", { "lineHeight": "28px", "letterSpacing": "0.01em", "fontWeight": "600" }], "headline-xl-mobile": ["38px", { "lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "headline-md": ["28px", { "lineHeight": "36px", "letterSpacing": "0em", "fontWeight": "600" }], "headline-lg-mobile": ["28px", { "lineHeight": "34px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "title-lg": ["20px", { "lineHeight": "26px", "letterSpacing": "0.01em", "fontWeight": "600" }], "title-md": ["18px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "500" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Clara Vivienne';
        $celebrantNick = $couple->groom_nickname ?? 'Clara';
        $heading = $couple->event_heading ?? 'Chapter 30: Modern Radiance';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dewasa';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Dinner Soirée & 30 Milestone Toast',
                    'date' => !empty($couple->wedding_date) ? (is_string($couple->wedding_date) ? $couple->wedding_date : $couple->wedding_date->format('Y-m-d')) : now()->format('Y-m-d'),
                    'start_time' => $couple->wedding_time ?? '18.00 WIB',
                    'end_time' => '21.00 WIB',
                    'venue_name' => $venueName,
                    'address' => $venueAddress,
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1
                ]
            ]);
        }
        $quote = $couple->quote ?? 'Entering thirty with boundless clarity, grateful heart, and modern radiance.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuB81TjoDXdvwRECLSQ3RLPTC-zXSfoNXzdcLKfALp2aHzSb81-pXYZ9xffHGB2-VkFV9vq2AzLbfp2mDymfTxm2uOegZokkRMtxUX6LLpBcno2SNguR05t869dKovhXA7FSS5lhhSiiqG3_u2L8dFPk2IFpwuyaXeM4vTZxONYwdW-2gZjXm8DmFYWNtX9OKwkBSnLOiCM7SeaA_PwpRsKwmxPzO8kDygW1ybK5t6jh';
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

        $venueName = $couple->venue_name ?? 'The Glasshouse Lounge';
        $venueAddress = $couple->venue_address ?? 'Jl. Brawijaya Raya No. 18, Kebayoran Baru, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB81TjoDXdvwRECLSQ3RLPTC-zXSfoNXzdcLKfALp2aHzSb81-pXYZ9xffHGB2-VkFV9vq2AzLbfp2mDymfTxm2uOegZokkRMtxUX6LLpBcno2SNguR05t869dKovhXA7FSS5lhhSiiqG3_u2L8dFPk2IFpwuyaXeM4vTZxONYwdW-2gZjXm8DmFYWNtX9OKwkBSnLOiCM7SeaA_PwpRsKwmxPzO8kDygW1ybK5t6jh', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAHPIyqiN_M5J1iRjZ4hjWGAhcHctZaDAoedxWuKUKbSMTTSAI9Ewgot8Hca77ylfbMS4Dk3USR8dHnpu8kjVr04JRhEnOljRHdxZTmsbDCfILCYXbgilBMBGmPzsk3tCo0GdEL0y_LIqoUFxb1WjdBU3R9S3JxTv1XKPG3RAidGfU1btffbkGl8vRam3whJaUvIlsBsK1w64qGDjgzgYvfLM_AtALD5gCnPNGw3v0Z', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 flex flex-col relative w-full bg-surface pt-safe pb-safe"><div class="flex flex-col w-full min-h-[92vh] justify-between p-4 sm:p-6 text-center select-none overflow-hidden relative" id="envelope-screen">
<!-- Subtle Ambient Glow Orbs -->
<div class="absolute -top-16 -left-16 w-56 h-56 bg-primary-container/30 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-20 -right-20 w-64 h-64 bg-secondary-fixed/30 rounded-full blur-3xl pointer-events-none"></div>
<!-- Top Bar / Masthead -->
<header class="flex flex-col items-center gap-2 relative z-10 w-full pt-1">
<!-- Floating Audio Pill Badge -->
<div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container-lowest/80 backdrop-blur-md rounded-full shadow-sm">
<span class="inline-flex items-center text-primary animate-pulse">
<span class="material-symbols-outlined text-body-md" style="font-variation-settings: 'FILL' 1;">graphic_eq</span>
</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant font-medium">Modern Soul Vibes — Chapter 30</span>
<span class="w-1.5 h-1.5 rounded-full bg-primary/70 animate-ping"></span>
</div>
<!-- Geometric Issue Metadata -->
<div class="flex items-center justify-center gap-2 text-on-surface-variant/80 w-full max-w-sm mt-1">
<span class="h-px bg-outline-variant/60 flex-1"></span>
<div class="flex items-center gap-1.5">
<span class="text-label-sm font-label-sm text-secondary">◆</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase font-semibold text-on-surface">CHAPTER 30 • PRIVATE SOIREE • ED. 2025</span>
<span class="text-label-sm font-label-sm text-secondary">◆</span>
</div>
<span class="h-px bg-outline-variant/60 flex-1"></span>
</div>
</header>
<!-- Center Visual: Monogram & Wax Seal Emblem -->
<main class="flex flex-col items-center justify-center my-auto py-2 relative z-10">
<!-- Interactive Seal Area -->
<div class="relative group cursor-pointer flex flex-col items-center" id="seal-trigger" onclick="triggerOpenEffect()">
<!-- Atmospheric Rose Aura -->
<div class="absolute inset-0 bg-primary-container/50 rounded-full blur-xl transform scale-110 group-hover:scale-125 transition-transform duration-700 ease-out"></div>
<!-- Central Wax Seal Badge Frame -->
<div class="relative w-28 h-28 sm:w-32 sm:h-32 p-1.5 bg-surface-container-lowest/90 rounded-2xl shadow-xl transition-transform duration-300 transform group-hover:scale-105 active:scale-95 flex items-center justify-center">
<img alt="Geometric Soft Pink 30th Birthday Seal" class="w-full h-full object-contain rounded-xl drop-shadow-md" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
<!-- Micro Corner Diamonds -->
<span class="absolute -top-1 -left-1 w-2.5 h-2.5 bg-secondary rotate-45"></span>
<span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-secondary rotate-45"></span>
<span class="absolute -bottom-1 -left-1 w-2.5 h-2.5 bg-secondary rotate-45"></span>
<span class="absolute -bottom-1 -right-1 w-2.5 h-2.5 bg-secondary rotate-45"></span>
</div>
<!-- Pulse Directive Under Emblem -->
<div class="mt-2.5 flex items-center gap-1.5">
<span class="text-label-sm text-secondary">◆</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">KETUK UNTUK MEMBUKA SEGEL</span>
<span class="text-label-sm text-secondary">◆</span>
</div>
</div>
<!-- Editorial Title & Milestone Typographic Lockup -->
<div class="mt-3.5 space-y-1 max-w-md mx-auto px-2">
<p class="font-label-md text-label-md uppercase tracking-[0.25em] text-tertiary">CELEBRATING 30 YEARS OF GRACE</p>
<h1 class="font-headline-lg-mobile sm:font-headline-md text-headline-lg-mobile sm:text-headline-md text-on-surface font-extrabold tracking-tight" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-md text-body-md text-on-surface-variant italic max-w-xs mx-auto leading-relaxed pt-0.5">
        “Entering thirty with boundless clarity, grateful heart, and modern radiance.”
      </p>
</div>
<!-- Guest Personalized Pass Card -->
<div class="mt-3.5 w-full max-w-sm bg-surface-container-lowest/95 backdrop-blur-md p-4 rounded-xl shadow-md relative text-left">
<!-- Faceted Ribbon / Badge -->
<div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1.5 pb-2 mb-2">
<div class="inline-flex items-center gap-1 px-2 py-0.5 bg-surface-variant text-on-primary-container rounded shrink-0">
<span class="text-xs text-secondary">★</span>
<span class="text-[10px] uppercase tracking-wider font-semibold">VIP INVITATION • ACCESS PASS</span>
</div>
<span class="text-[10px] text-outline tracking-wider font-mono shrink-0 ml-auto sm:ml-0">NO. 030-CV</span>
</div>
<!-- Guest Details Block -->
<div class="space-y-0.5">
<p class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-semibold">KEPADA YTH. BAPAK / IBU / SAUDARA/I:</p>
<div class="flex items-baseline justify-between">
<h2 class="font-title-lg text-title-lg text-on-surface font-bold tracking-tight" id="previewGuestNameCover">{{ $guestName }}</h2>
<span class="font-label-md text-label-md text-tertiary italic">Di Tempat</span>
</div>
</div>
<!-- Welcome Note -->
<p class="font-body-md text-body-md text-on-surface-variant/90 leading-snug mt-2 pt-2 bg-surface-container-low/60 p-2.5 rounded-lg text-xs">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga perayaan ulang tahun ke-30 yang penuh kehangatan, inspirasi, dan syukur.
      </p>
</div>
</main>
<!-- Primary Action & Event Meta Footer -->
<footer class="w-full max-w-sm mx-auto flex flex-col items-center gap-2.5 pb-2 relative z-10">
<!-- Magnetic Open Envelope Button -->
<button class="w-full py-3.5 px-6 bg-inverse-surface active:bg-on-background text-inverse-on-surface font-label-md text-label-md uppercase tracking-[0.2em] rounded-lg shadow-xl hover:shadow-2xl transition-all duration-300 flex items-center justify-center gap-2.5 group cursor-pointer" id="open-invitation-btn" onclick="openInvitation()" type="button">
<span class="material-symbols-outlined text-title-md text-secondary-fixed transition-transform group-hover:rotate-12" style="font-variation-settings: 'FILL' 1;">drafts</span>
<span class="font-semibold tracking-widest text-on-primary">BUKA UNDANGAN</span>
<span class="text-secondary-fixed font-bold text-title-md transition-transform group-hover:translate-x-1.5">→</span>
</button>
<!-- Strict Milestone Event Info Meta -->
<div class="text-center space-y-0.5">
<p class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant font-medium">
        {{ strtoupper($eventDateFormatted) }} • THE LANGHAM JAKARTA
      </p>
<p class="font-label-sm text-label-sm tracking-widest uppercase text-tertiary font-semibold text-[9px]">
        DRESS CODE: MODERN BLUSH &amp; BLACK TIE • RSVP STRICTLY REQUIRED
      </p>
</div>
</footer>
</div>
<script>
  function triggerOpenEffect() {
    const btn = document.getElementById('open-btn');
    const seal = document.getElementById('seal-trigger');
    
    if (btn && seal) {
      btn.classList.add('scale-95', 'opacity-90');
      seal.classList.add('scale-110');
      
      setTimeout(() => {
        btn.classList.remove('scale-95', 'opacity-90');
        seal.classList.remove('scale-110');
        if (typeof openInvitation === 'function') openInvitation();
      }, 250);
    }
  }
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-margin-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm"><div class="w-9 h-9 rotate-45 bg-surface-container-high flex items-center justify-center"><span class="-rotate-45 font-headline-sm text-headline-sm text-primary font-bold">30</span></div><div class="flex flex-col"><span class="font-label-sm text-label-sm tracking-widest uppercase text-outline">{{ $couple->events->first()->title ?? "Chapter Thirty" }}</span><h1 class="font-title-md text-title-md text-on-surface" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-xs"><button aria-label="Toggle Musik" class="w-11 h-11 min-w-[44px] min-h-[44px] flex items-center justify-center text-primary bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer" type="button" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><img alt="Profile" class="w-8 h-8 rounded-full object-cover ml-space-xs" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu"/></div></div></header><main class="flex-1 flex flex-col relative w-full bg-surface pt-16 pb-20"><div class="flex flex-col w-full">
<!-- Top Decorative Geometric Ribbon -->
<div class="w-full flex items-center justify-between px-margin-mobile py-space-xs bg-surface-container-high/60">
<div class="flex items-center gap-space-xs">
<div class="w-2 h-2 rotate-45 bg-primary"></div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-semibold">PRIVATE INVITATION • MILENIAL CHAPTER XXX</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">15.11.2025</span>
</div>
<!-- SECTION 1: HERO ARCHITECTURAL SHOWCASE -->
<section class="relative w-full px-margin-mobile pt-space-md pb-space-lg flex flex-col items-center text-center">
<!-- Geometric Facet Backdrop Accent -->
<div class="absolute -top-6 w-48 h-48 bg-primary-container/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="relative w-full max-w-sm mx-auto mb-space-md">
<!-- Outer Geometric Framed Card -->
<div class="relative p-2 bg-surface-container-lowest shadow-md">
<!-- Inner Polygon / Architectural Crop Wrapper -->
<div class="relative aspect-[3/4] w-full overflow-hidden bg-surface-container">
<img alt="Stephanie Aurelia Chapter 30" class="w-full h-full object-cover object-top scale-100 hover:scale-105 transition-transform duration-700" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<!-- Subtle Gradient Scrim -->
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/60 via-transparent to-transparent"></div>
<div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-left">
<span class="bg-surface/90 backdrop-blur-sm px-2.5 py-1 font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">30th Soirée</span>
<span class="text-surface font-label-sm text-label-sm font-semibold tracking-widest">JAKARTA</span>
</div>
</div>
</div>
<!-- Corner Diamond Embellishments -->
<div class="absolute -top-1.5 -left-1.5 w-3.5 h-3.5 rotate-45 bg-primary"></div>
<div class="absolute -top-1.5 -right-1.5 w-3.5 h-3.5 rotate-45 bg-primary"></div>
<div class="absolute -bottom-1.5 -left-1.5 w-3.5 h-3.5 rotate-45 bg-primary"></div>
<div class="absolute -bottom-1.5 -right-1.5 w-3.5 h-3.5 rotate-45 bg-primary"></div>
</div>
<!-- Typography Block -->
<div class="flex items-center gap-space-sm mb-space-xs">
<div class="h-px w-6 bg-primary/40"></div>
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-primary font-bold">A MILESTONE CHAPTER • 30TH BIRTHDAY</span>
<div class="h-px w-6 bg-primary/40"></div>
</div>
<h2 class="font-headline-xl-mobile text-headline-xl-mobile text-on-surface uppercase tracking-tight mb-space-xs font-bold">
      Stephanie Aurelia
    </h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xs mx-auto italic mb-space-md">
      "Celebrating three decades of resilience, laughter, deep connections, and exciting horizons ahead."
    </p>
<!-- Quick Milestone Diamond Badge -->
<div class="inline-flex items-center gap-2 bg-surface-container-high px-4 py-1.5 shadow-sm">
<span class="material-symbols-outlined text-[16px] text-primary" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface font-semibold">1995 • CHAPTER XXX • 2025</span>
</div>
</section>
<!-- SECTION 2: KARTU UNDANGAN <span id="previewGuestNameMain">{{ $guestName }}</span> -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="relative bg-surface-container-lowest p-space-md shadow-md overflow-hidden">
<!-- Geometric Corner Shading -->
<div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-bl from-primary-container/40 to-transparent"></div>
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-outline">INVITATION SPECIFICATION</span>
<div class="w-2.5 h-2.5 rotate-45 bg-secondary"></div>
</div>
<p class="font-label-sm text-label-sm tracking-widest uppercase text-primary font-bold mb-1">KEPADA YTH. TAMU KEHORMATAN:</p>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight mb-space-xs">
        {{ $guestName }}
      </h3>
<div class="bg-surface-container p-space-sm mb-space-sm flex items-start gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5" style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
<div>
<p class="font-label-sm text-label-sm text-on-surface uppercase font-bold tracking-wide">Meja Reservasi VIP: Atelier Lounge B-03</p>
<p class="font-body-md text-body-md text-on-surface-variant">Kapasitas: 2 Tamu Terdaftar</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
        Kehadiran dan doa restu Anda adalah pelengkap kebahagiaan terbesar dalam merayakan langkah usia baru tiga dekade ini.
      </p>
</div>
</section>
<!-- SECTION 3: PROFIL SINGKAT & REFLEKSI 30 TAHUN -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">LIFE JOURNEY</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Mengenal Stephanie di Usia 30</h3>
</div>
<div class="w-7 h-7 bg-surface-container-high flex items-center justify-center rotate-45">
<span class="material-symbols-outlined -rotate-45 text-primary text-[16px]">menu_book</span>
</div>
</div>
<!-- 3 Milestone Decades Bento-List -->
<div class="flex flex-col gap-space-xs mb-space-sm">
<!-- Item 1 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex items-start gap-space-sm">
<div class="w-8 h-8 shrink-0 bg-primary text-on-primary flex items-center justify-center font-headline-sm text-[13px] font-bold">
          01
        </div>
<div class="min-w-0">
<p class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wide">1995 – 2015: Foundations &amp; Curiosity</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Masa bertumbuh diiringi kecintaan pada sketsa, seni rupa, dan eksplorasi akademis awal.</p>
</div>
</div>
<!-- Item 2 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex items-start gap-space-sm">
<div class="w-8 h-8 shrink-0 bg-primary-container text-on-primary-container flex items-center justify-center font-headline-sm text-[13px] font-bold">
          02
        </div>
<div class="min-w-0">
<p class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wide">2016 – 2024: Crafting Passion</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Membangun karier arsitektur interior, memupuk persahabatan sejati, dan menapaki dunia profesional mandiri.</p>
</div>
</div>
<!-- Item 3 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex items-start gap-space-sm">
<div class="w-8 h-8 shrink-0 bg-inverse-surface text-inverse-on-surface flex items-center justify-center font-headline-sm text-[13px] font-bold">
          03
        </div>
<div class="min-w-0">
<p class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wide">2025 &amp; Beyond: Grace &amp; Intention</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Memasuki dekade ketiga dengan ketenangan batin, kehangatan relasi, dan komitmen menjalani hidup penuh kesadaran.</p>
</div>
</div>
</div>
<!-- Fun Facts Tag Card -->
<div class="bg-surface-container p-space-sm shadow-sm flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[24px]">coffee</span>
<p class="font-body-md text-body-md text-on-surface italic">
        "Architect by day, vinyl enthusiast by night, lover of ceremonial matcha &amp; sunset seaside runs."
      </p>
</div>
</section>
<!-- SECTION 4: JADWAL ACARA & COUNTDOWN -->
<section class="w-full px-margin-mobile mb-space-lg">
<!-- Header Block -->
<div class="text-center mb-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">DATE &amp; ITINERARY</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-1">{{ $eventDateFormatted }}</h3>
<p class="font-body-md text-body-md text-on-surface-variant">18.00 WIB – Selesai (Waktu Indonesia Barat)</p>
</div>
<!-- Countdown Timer Boxes -->
<div class="grid grid-cols-4 gap-2 mb-space-md text-center" id="countdown-grid">
<div class="bg-surface-container-lowest p-2 shadow-sm flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold" id="cd-days">42</span>
<span class="font-label-sm text-label-sm uppercase text-outline">HARI</span>
</div>
<div class="bg-surface-container-lowest p-2 shadow-sm flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold" id="cd-hours">16</span>
<span class="font-label-sm text-label-sm uppercase text-outline">JAM</span>
</div>
<div class="bg-surface-container-lowest p-2 shadow-sm flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold" id="cd-mins">24</span>
<span class="font-label-sm text-label-sm uppercase text-outline">MENIT</span>
</div>
<div class="bg-surface-container-lowest p-2 shadow-sm flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold" id="cd-secs">08</span>
<span class="font-label-sm text-label-sm uppercase text-outline">DETIK</span>
</div>
</div>
<!-- Google Calendar Action -->
<a class="w-full bg-surface-container-highest text-on-surface py-3 px-4 flex items-center justify-center gap-space-xs mb-space-md shadow-sm active:scale-98 transition-transform font-label-md text-label-md uppercase tracking-wider font-semibold" href="https://calendar.google.com" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-primary text-[18px]">calendar_add_on</span>
      Simpan ke Google Calendar
    </a>
<!-- Geometric Rundown Timeline -->
<div class="bg-surface-container-lowest p-space-md shadow-md">
<h4 class="font-label-sm text-label-sm uppercase tracking-widest text-outline mb-space-md">SOIRÉE ORDER OF EVENTS</h4>
<div class="flex flex-col gap-space-md" id="itineraryContainer">
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
        if (empty($evTimeStr)) $evTimeStr = "18.00 - 21.00 WIB";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
        $diamondBg = ($index % 2 === 0) ? "bg-primary" : "bg-secondary";
    @endphp
    <div class="flex items-start gap-space-sm relative event-itinerary-item">
        <div class="w-3 h-3 rotate-45 {{ $diamondBg }} shrink-0 mt-1"></div>
        <div class="flex-1 min-w-0">
            <div class="flex items-baseline gap-2">
                <span class="font-label-md text-label-md text-primary font-bold">{{ $evTimeStr }}</span>
                <span class="font-label-sm text-label-sm text-outline">• SESI {{ $index + 1 }}</span>
            </div>
            <p class="font-title-md text-title-md text-on-surface font-semibold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</p>
            <p class="font-body-md text-body-md text-on-surface-variant">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary font-semibold block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold">
                    <span class="material-symbols-outlined text-[13px]">near_me</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</div>
</section>
<!-- SECTION 5: LOKASI ACARA & PETA -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="bg-surface-container-lowest p-space-md shadow-md">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">location_on</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">VENUE DETAILS</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
        The Glass House
      </h3>
<p class="font-body-md text-body-md text-on-surface font-medium">The Ritz-Carlton Jakarta, Pacific Place</p>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">SCBD, Jl. Jend. Sudirman Kav. 52-53, Senayan, Kebayoran Baru, Jakarta Selatan</p>
<!-- Static Map Box Container -->
<div class="w-full h-48 bg-cover bg-center shadow-inner relative flex items-end p-space-sm mb-space-sm" data-location="The Ritz-Carlton Jakarta, Pacific Place" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAJ9F2eLRs4992WukiCS-S5FhOI9lmFQCrR1IUYmEnPDuVmxngwaFsrBK4rqiPhc-OGAZxEZnMRyFq5iS_l8TjmHDtB_pC5j7Rnz-thm47eY5MzCbheU2sinE82wWxthp0arlCMKtcxXCG3ZCH8CKsdM7wV28h_wsDzNSAbO2g8WYZzqakw6EPbUx1KoZRNEKwX3MSB9HwSPaXYfiWYFBHMlZnZVg0rL6f8NFLvdsVX')">
<div class="bg-surface/95 backdrop-blur-sm p-2 shadow-sm flex items-center gap-2">
<div class="w-2.5 h-2.5 rotate-45 bg-primary"></div>
<span class="font-label-sm text-label-sm text-on-surface font-semibold uppercase">VIP Valet Parking Tersedia di Lobi Timur</span>
</div>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-space-xs">
<a id="previewMapsLinkMain" class="bg-primary text-on-primary py-2.5 px-3 flex items-center justify-center gap-1.5 font-label-md text-label-md uppercase tracking-wide font-semibold shadow-sm active:scale-95 transition-transform" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">near_me</span>
          Buka Maps
        </a>
<button class="bg-surface-container-high text-on-surface py-2.5 px-3 flex items-center justify-center gap-1.5 font-label-md text-label-md uppercase tracking-wide font-semibold shadow-sm active:scale-95 transition-transform" id="btn-copy-address" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
          Salin Alamat
        </button>
</div>
<div class="hidden text-center mt-2 font-label-sm text-label-sm text-primary font-bold" id="copy-address-feedback">
        ✓ Alamat berhasil disalin ke clipboard!
      </div>
</div>
</section>
<!-- SECTION 6: TEMA ACARA & DRESS CODE -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="bg-surface-container-high/60 p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">ETIQUETTE &amp; ATTIRE</span>
<span class="material-symbols-outlined text-primary text-[20px]">palette</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface font-bold mb-space-xs">
        Modern Atelier
      </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
        Minimalist Geometric Chic in Soft Pink, Rose Gold &amp; Muted Plum.
      </p>
<!-- Palette Circles Bar -->
<div class="flex items-center justify-between bg-surface-container-lowest p-space-sm mb-space-md shadow-sm">
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-[#fcedf0] shadow-inner"></div>
<span class="font-label-sm text-[9px] uppercase text-outline">Blush</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-[#f4acb7] shadow-inner"></div>
<span class="font-label-sm text-[9px] uppercase text-outline">Dusty</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-[#df9a8b] shadow-inner"></div>
<span class="font-label-sm text-[9px] uppercase text-outline">Rose Gold</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-[#5c2e47] shadow-inner"></div>
<span class="font-label-sm text-[9px] uppercase text-outline">Plum</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-[#1f1620] shadow-inner"></div>
<span class="font-label-sm text-[9px] uppercase text-outline">Onyx</span>
</div>
</div>
<!-- Specific Recommendations -->
<div class="grid grid-cols-1 gap-space-sm">
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex items-start gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">male</span>
<div>
<p class="font-label-sm text-label-sm uppercase text-on-surface font-bold">Tamu Pria</p>
<p class="font-body-md text-body-md text-on-surface-variant">Semi-formal sharp tailored blazer, dark charcoal / espresso suit, atau modern relaxed collared set.</p>
</div>
</div>
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex items-start gap-space-xs">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">female</span>
<div>
<p class="font-label-sm text-label-sm uppercase text-on-surface font-bold">Tamu Wanita</p>
<p class="font-body-md text-body-md text-on-surface-variant">Chic cocktail dress, modern tailored jumpsuit bernuansa soft pink, neutral champagne blush, atau dusty rose.</p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 7: GALERI FOTO (GEOMETRIC MOSAIC) -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">MOMENTS CAPTURED</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Vignettes of Gratitude</h3>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">photo_library</span>
</div>
<!-- Asymmetrical Grid Gallery -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-xs">
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
<!-- SECTION 8: FORMULIR KONFIRMASI KEHADIRAN (RSVP) -->
<section class="w-full px-margin-mobile mb-space-lg" id="rsvp-section">
<div class="bg-surface-container-lowest p-space-md shadow-md relative">
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">RESERVATION</span>
<div class="w-2 h-2 rotate-45 bg-primary"></div>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
        Konfirmasi Kehadiran
      </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
        Demi kenyamanan pengaturan meja dan hidangan, mohon konfirmasi sebelum <strong class="text-on-surface">1 November 2025</strong>.
      </p>
<form class="flex flex-col gap-space-md" id="rsvp-form">
<!-- Input Nama -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-semibold" for="rsvp-name">Nama Lengkap Tamu</label>
<input class="w-full bg-surface-container-low text-on-surface px-space-sm py-2.5 font-body-md text-body-md outline-none focus:bg-surface focus:shadow-sm" id="rsvp-name" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Dropdown Jumlah Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-semibold" for="rsvp-count">Jumlah Kehadiran</label>
<select class="w-full bg-surface-container-low text-on-surface px-space-sm py-2.5 font-body-md text-body-md outline-none focus:bg-surface" id="rsvp-count">
<option value="1">1 Orang Tamu (Single)</option>
<option selected="" value="2">2 Orang Tamu (Bersama Pasangan)</option>
<option value="3">3 Orang Tamu</option>
</select>
</div>
<!-- Radio Buttons -->
<div class="flex flex-col gap-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-semibold">Status Konfirmasi</span>
<label class="flex items-center gap-space-sm p-space-sm bg-surface-container-low cursor-pointer active:bg-surface-container">
<input checked="" class="accent-primary w-4 h-4" name="rsvp_status" type="radio" value="hadir"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">✓ Ya, Pasti Hadir</span>
<span class="font-body-md text-[12px] text-on-surface-variant">Senang sekali bisa hadir merayakan bersama</span>
</div>
</label>
<label class="flex items-center gap-space-sm p-space-sm bg-surface-container-low cursor-pointer active:bg-surface-container">
<input class="accent-primary w-4 h-4" name="rsvp_status" type="radio" value="absen"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">✕ Maaf, Berhalangan</span>
<span class="font-body-md text-[12px] text-on-surface-variant">Turut mendoakan dari kejauhan</span>
</div>
</label>
</div>
<!-- Textarea Pesan -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-semibold" for="rsvp-message">Pesan &amp; Doa Hangat</label>
<textarea class="w-full bg-surface-container-low text-on-surface p-space-sm font-body-md text-body-md outline-none focus:bg-surface resize-none" id="rsvp-message" placeholder="Tuliskan ucapan selamat ulang tahun ke-30 untuk Stephanie..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary text-on-primary py-3 px-space-md flex items-center justify-center gap-2 font-label-md text-label-md uppercase tracking-wider font-bold shadow-md active:scale-98 transition-transform" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
          KIRIM KONFIRMASI &amp; DOA
        </button>
</form>
<!-- RSVP Feedback Prompt -->
<div class="hidden mt-space-md p-space-sm bg-primary-container/40 text-center" id="rsvp-success-msg">
<p class="font-label-md text-label-md text-primary font-bold">Terima Kasih, {{ $guestName }}!</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Konfirmasi kehadiran Anda telah tercatat pada Meja Atelier B-03.</p>
</div>
</div>
</section>
<!-- SECTION 9: BUKU TAMU DIGITAL (DOA & UCAPAN) -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="flex items-center justify-between mb-space-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">WARM WISHES</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Untaian Doa &amp; Cerita</h3>
</div>
<span class="font-label-sm text-label-sm px-2 py-1 bg-surface-container-high text-primary font-bold">18 WISHES</span>
</div>
<!-- Messages Stream -->
<div class="flex flex-col gap-space-xs" id="wishes-stream">
<!-- Message 1 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Clarissa &amp; Adrian</span>
<span class="font-label-sm text-label-sm text-outline">2 jam yang lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          "Happy 30th milestone, Steph! Melihat kamu terus bertumbuh dengan integritas dan kehangatan hati selalu menginspirasi kita semua. Can't wait to toast with you on Saturday!"
        </p>
<div class="flex items-center gap-1 mt-1 text-primary">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-sm text-label-sm font-semibold">12 Love</span>
</div>
</div>
<!-- Message 2 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Bramantyo &amp; Rekan Studio</span>
<span class="font-label-sm text-label-sm text-outline">5 jam yang lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          "Selamat menapaki usia 30 dengan karya arsitektur dan visi hidup yang semakin memukau! Semoga babak baru ini penuh dengan pencapaian besar dan sukacita."
        </p>
<div class="flex items-center gap-1 mt-1 text-primary">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-sm text-label-sm font-semibold">8 Love</span>
</div>
</div>
<!-- Message 3 -->
<div class="bg-surface-container-lowest p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-on-surface font-bold">Maya Kusuma</span>
<span class="font-label-sm text-label-sm text-outline">Kemarin</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          "Dearest Steph, welcoming thirty never looked this effortless and radiant. May your days be blessed with peace and endless creative fulfillment."
        </p>
<div class="flex items-center gap-1 mt-1 text-primary">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-sm text-label-sm font-semibold">15 Love</span>
</div>
</div>
</div>
</section>
<!-- SECTION 10: TANDA KASIH DIGITAL (ANGPAU & REKENING) -->
<section class="w-full px-margin-mobile mb-space-lg">
<div class="bg-surface-container-lowest p-space-md shadow-md">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">redeem</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">DIGITAL ENVELOPE</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
        Tanda Kasih Digital
      </h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
        Kehadiran dan kebersamaan Anda adalah hadiah terindah. Namun bila Anda ingin berbagi tanda kasih, dapat disampaikan melalui kanal berikut:
      </p>
<div class="flex flex-col gap-space-sm">
<!-- Bank 1 Card -->
<div class="bg-surface-container-low p-space-sm flex items-center justify-between mb-3 rounded-lg">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase font-bold text-primary">{{ $bankName1 }}</span>
<p class="font-title-md text-title-md text-on-surface font-bold tracking-wider mt-0.5" id="bca-acc-num">{{ $bankAccount1 }}</p>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-surface-container-high px-3 py-1.5 rounded text-label-sm font-label-sm font-semibold uppercase tracking-wider text-on-surface hover:bg-primary hover:text-on-primary active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-low p-space-sm flex items-center justify-between rounded-lg">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase font-bold text-secondary">{{ $bankName2 }}</span>
<p class="font-title-md text-title-md text-on-surface font-bold tracking-wider mt-0.5" id="mandiri-acc-num">{{ $bankAccount2 }}</p>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-surface-container-high px-3 py-1.5 rounded text-label-sm font-label-sm font-semibold uppercase tracking-wider text-on-surface hover:bg-primary hover:text-on-primary active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- SECTION 11: PENUTUP & GEOMETRIC SEAL EMBLEM -->
<section class="w-full px-margin-mobile pb-space-xl flex flex-col items-center text-center">
<!-- Emblem Brand Wax Seal -->
<div class="w-24 h-24 mb-space-md shadow-md p-1 bg-surface-container-lowest rounded-full flex items-center justify-center">
<img alt="30th Birthday Seal" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu"/>
</div>
<div class="flex items-center gap-space-sm mb-space-xs">
<div class="h-px w-8 bg-primary/30"></div>
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-primary font-bold">{{ $couple->events->first()->title ?? "Chapter Thirty" }}</span>
<div class="h-px w-8 bg-primary/30"></div>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-xs">
      Sampai Jumpa di Hari Bahagia
    </p>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xs mb-space-md">
      "Setiap langkah masa lalu membimbing kita ke titik ini; mari menyambut tiga dekade penuh keanggunan, rasa syukur, dan cinta."
    </p>
<p class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold">
      Salam Hangat,<br/>
<span class="text-primary font-bold">Stephanie Aurelia &amp; Keluarga</span>
</p>
</section>
<!-- MICRO-INTERACTIONS SCRIPT -->
<script>
    // Address copy button
    const copyBtn = document.getElementById('btn-copy-address');
    const copyFeedback = document.getElementById('copy-address-feedback');
    if (copyBtn && copyFeedback) {
      copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText('{{ addslashes($venueAddress) }}');
        copyFeedback.classList.remove('hidden');
        setTimeout(() => copyFeedback.classList.add('hidden'), 3500);
      });
    }

    // Dynamic countdown timer calculation (Target: Nov 15, 2025 18:00 WIB)
    function updateCountdown() {
      let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
      const now = new Date().getTime();
      const difference = targetDate - now;

      if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((difference % (1000 * 60)) / 1000);

        const dEl = document.getElementById('cd-days');
        const hEl = document.getElementById('cd-hours');
        const mEl = document.getElementById('cd-mins');
        const sEl = document.getElementById('cd-secs');

        if (dEl) dEl.innerText = String(days).padStart(2, '0');
        if (hEl) hEl.innerText = String(hours).padStart(2, '0');
        if (mEl) mEl.innerText = String(mins).padStart(2, '0');
        if (sEl) sEl.innerText = String(secs).padStart(2, '0');
      }
    }
    setInterval(updateCountdown, 1000);
    updateCountdown();

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        targetDate = new Date(newDateStr).getTime();
        updateCountdown();
      }
    };

    // RSVP Form interaction
    const rsvpForm = document.getElementById('rsvp-form');
    const rsvpMsg = document.getElementById('rsvp-success-msg');
    const wishesStream = document.getElementById('wishes-stream');

    if (rsvpForm) {
      rsvpForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const guestName = document.getElementById('rsvp-name').value || '{{ $guestName }}';
        const msgText = document.getElementById('rsvp-message').value;

        if (rsvpMsg) {
          rsvpMsg.classList.remove('hidden');
          rsvpForm.classList.add('opacity-50', 'pointer-events-none');
        }

        // Add to digital wishes feed if text is entered
        if (msgText.trim() !== '' && wishesStream) {
          const newCard = document.createElement('div');
          newCard.className = 'bg-surface-container-lowest p-space-sm shadow-sm flex flex-col gap-1 border-l-2 border-primary';
          newCard.innerHTML = `
            <div class="flex items-center justify-between">
              <span class="font-label-md text-label-md text-primary font-bold">${guestName}</span>
              <span class="font-label-sm text-label-sm text-outline">Baru saja</span>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">"${msgText}"</p>
            <div class="flex items-center gap-1 mt-1 text-primary">
              <span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
              <span class="font-label-sm text-label-sm font-semibold">1 Love</span>
            </div>
          `;
          wishesStream.insertBefore(newCard, wishesStream.firstChild);
        }
      });
    }
  </script>
</div></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(0,0,0,0.04)]" data-active-classes="text-primary font-semibold"><div class="flex justify-around items-center h-20 px-space-xs"><a class="flex flex-col items-center justify-center gap-1 min-w-[44px] min-h-[44px] flex-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="undangan-utama-chapter-30" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm">Undangan</span></a><a class="flex flex-col items-center justify-center gap-1 min-w-[44px] min-h-[44px] flex-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="profil" href="#"><span class="material-symbols-outlined text-[22px]">person</span><span class="font-label-sm text-label-sm">Profil</span></a><a class="flex flex-col items-center justify-center gap-1 min-w-[44px] min-h-[44px] flex-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">event_upcoming</span><span class="font-label-sm text-label-sm">Jadwal</span></a><a class="flex flex-col items-center justify-center gap-1 min-w-[44px] min-h-[44px] flex-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">location_on</span><span class="font-label-sm text-label-sm">Lokasi</span></a><a class="flex flex-col items-center justify-center gap-1 min-w-[44px] min-h-[44px] flex-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-sm text-label-sm">RSVP</span></a></div></nav>
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
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.00 - 21.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">near_me</span><span>Buka Maps</span></a>` : "";
                const diamondBg = (i % 2 === 0) ? "bg-primary" : "bg-secondary";
                return `
                    <div class="flex items-start gap-space-sm relative event-itinerary-item">
                        <div class="w-3 h-3 rotate-45 ${diamondBg} shrink-0 mt-1"></div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-baseline gap-2">
                                <span class="font-label-md text-label-md text-primary font-bold">${timeStr}</span>
                                <span class="font-label-sm text-label-sm text-outline">• SESI ${i + 1}</span>
                            </div>
                            <p class="font-title-md text-title-md text-on-surface font-semibold leading-snug">${title}</p>
                            <p class="font-body-md text-body-md text-on-surface-variant">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-primary font-semibold block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'chapter-30-soft-pink' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>