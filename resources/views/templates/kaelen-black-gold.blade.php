<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'The Chronicles of Kaelen: Golden Crucible') . ' - ' . ($couple->groom_name ?? 'Kaelen The Golden Alchemist') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Kaelen The Golden Alchemist' }} - Tema Karakter Original - Bold Modern Black & Gold."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&amp;family=Syne:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "tertiary-fixed-dim": "#f4be53", "primary-fixed": "#ffe088", "on-error": "#690005", "primary-fixed-dim": "#e9c349", "surface-container-highest": "#343538", "surface-variant": "#343538", "surface-tint": "#e9c349", "on-primary-fixed": "#241a00", "surface-container-high": "#292a2d", "secondary-fixed": "#f1e3a9", "secondary-container": "#4f471b", "surface-dim": "#121316", "surface": "#121316", "background": "#121316", "tertiary-container": "#deaa41", "on-surface": "#e3e2e6", "on-secondary-fixed-variant": "#4f471b", "on-secondary-fixed": "#211b00", "primary": "#f2ca50", "on-tertiary-fixed": "#271900", "surface-container": "#1f1f23", "inverse-surface": "#e3e2e6", "primary-container": "#d4af37", "on-secondary": "#383006", "error": "#ffb4ab", "surface-bright": "#38393c", "on-primary": "#3c2f00", "on-tertiary": "#412d00", "outline": "#99907c", "outline-variant": "#4d4635", "tertiary-fixed": "#ffdea6", "on-tertiary-fixed-variant": "#5e4200", "on-secondary-container": "#c2b57f", "surface-container-lowest": "#0d0e11", "inverse-on-surface": "#2f3034", "on-surface-variant": "#d0c5af", "on-error-container": "#ffdad6", "secondary-fixed-dim": "#d4c78f", "on-background": "#e3e2e6", "on-primary-fixed-variant": "#574500", "tertiary": "#fdc659", "secondary": "#d4c78f", "inverse-primary": "#735c00", "on-primary-container": "#554300", "error-container": "#93000a", "surface-container-low": "#1b1b1f", "on-tertiary-container": "#5b4000" }, borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, spacing: { "gutter-mobile": "1rem", "margin": "3rem", "space-md": "1rem", "space-sm": "0.5rem", "space-xl": "3rem", "space-xs": "0.25rem", "space-lg": "1.75rem", "margin-mobile": "1.25rem", "gutter": "1.5rem" }, fontFamily: { "label-md": ["Plus Jakarta Sans"], "headline-sm": ["Syne"], "display-hero": ["Syne"], "title-md": ["Plus Jakarta Sans"], "label-caps": ["Plus Jakarta Sans"], "headline-lg": ["Syne"], "body-sm": ["Plus Jakarta Sans"], "headline-lg-mobile": ["Syne"], "display-hero-mobile": ["Syne"], "headline-md": ["Syne"], "body-lg": ["Plus Jakarta Sans"], "body-md": ["Plus Jakarta Sans"] }, fontSize: { "label-md": ["14px", { "lineHeight": "20px", "fontWeight": "600" }], "headline-sm": ["22px", { "lineHeight": "28px", "fontWeight": "600" }], "display-hero": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.03em", "fontWeight": "800" }], "title-md": ["18px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "600" }], "label-caps": ["11px", { "lineHeight": "16px", "letterSpacing": "0.18em", "fontWeight": "700" }], "headline-lg": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-sm": ["13px", { "lineHeight": "18px", "fontWeight": "400" }], "headline-lg-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "display-hero-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "800" }], "headline-md": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "body-md": ["15px", { "lineHeight": "22px", "fontWeight": "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Kaelen The Golden Alchemist';
        $celebrantNick = $couple->groom_nickname ?? 'Kaelen';
        $heading = $couple->event_heading ?? 'The Chronicles of Kaelen: Golden Crucible';
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
        $quote = $couple->quote ?? 'Di balik percikan alkimia kencana dan bayang-bayang obsidian, sebuah babak baru keberanian dimulai.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuApODN6_1bSafCkCiHZf4GfzJ93Xpg_sCFNQf8UNjKNvgXoz2jMWrxZb7MaHPWH0Lkf-ohd_WTScwlHnTR5cQriQKTggKCkQ1LltEzR9DLcuyAzA_qqE73hqYJYYHfm9OZS20lMI0Bj2LOJoR9L2_es9ugVigvtEgfrU3S1UtF3cyPaH6bJ8Mb6cmeaXF2Ox_SVBLYPYY8xPaKlIegwRN0M0Wzf3V03yd1YctPmwMjH';
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

        $venueName = $couple->venue_name ?? 'The Tribrata Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Jl. Dharmawangsa III No. 2, Pulo, Kebayoran Baru, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuApODN6_1bSafCkCiHZf4GfzJ93Xpg_sCFNQf8UNjKNvgXoz2jMWrxZb7MaHPWH0Lkf-ohd_WTScwlHnTR5cQriQKTggKCkQ1LltEzR9DLcuyAzA_qqE73hqYJYYHfm9OZS20lMI0Bj2LOJoR9L2_es9ugVigvtEgfrU3S1UtF3cyPaH6bJ8Mb6cmeaXF2Ox_SVBLYPYY8xPaKlIegwRN0M0Wzf3V03yd1YctPmwMjH', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCWSivXjZRIjQZhvTkgtC8umUhu2C-oRjoXY2tVPC6zS_vj1c9BxQNdZm9ZlJkhNGkszx2zGzqgroU-Bv9P9xUTuBp4ih6KrJ6B0-B5xtXUT9Ah3Sy9tSN9X4O4PtNlYSEhgrHM6KdxAMqoAPo5w1egB9A3aSHyRWN0gseL4wNxLVF9nCwRhl9W783U5gIIuL3_Zb-47x9iW-zXER7Eev-KFlpD4YWoLhwQhs6EJBkb', 'caption' => 'Momen Bahagia #3'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAwHc4TtdOQljS4nGaDuACIbuzRR-b0WZhf6yRh3lmP8aHMltPDFkt73HgsgW6n28sESwTlIR0C6ptdDx31JgDDhUt_tDwO1ZVKNlZkEnH5ze61jYR2d_np1ClqrSfw65Ac80hd1vzPrSVLuCeqqWyWe34qYBwPkz58dLjqUVUg9VelOMR0zoH2fRJt73F7IRxYITbUwwr26N-RGirp2_LmbSWWMW2dqgopZ3Ib5qrO', 'caption' => 'Momen Bahagia #4'],
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
        <main class="flex-1 w-full bg-surface relative flex flex-col"><div class="flex flex-col w-full relative overflow-hidden select-none">
<!-- Ambient Auric Radial Core Glow -->
<div class="absolute -top-32 left-1/2 -translate-x-1/2 w-96 h-96 rounded-full bg-primary/10 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 rounded-full bg-primary-container/10 blur-3xl pointer-events-none"></div>
<!-- Geometric Luxury Accent Lattice (Subtle gold hairline lines) -->
<svg class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" xmlns="http://www.w3.org/2000/svg">
<defs>
<pattern height="48" id="gold-grid" patternunits="userSpaceOnUse" width="48">
<path d="M 48 0 L 0 48 M 0 0 L 48 48" fill="none" stroke="#d4af37" stroke-dasharray="2 6" stroke-width="0.5"></path>
</pattern>
</defs>
<rect fill="url(#gold-grid)" height="100%" width="100%"></rect>
</svg>
<!-- Envelope Container Layout -->
<div class="relative z-10 px-margin-mobile pb-space-lg flex flex-col items-center max-w-md mx-auto w-full gap-space-md">
<!-- Top Status Ribbon & Audio Teaser Bar -->
<div class="w-full flex flex-col gap-space-xs items-center pt-space-xs">
<div class="flex items-center gap-space-xs bg-surface-container-high px-3 py-1 rounded-full shadow-sm">
<span class="material-symbols-outlined text-primary text-[14px]">bolt</span>
<span class="font-label-caps text-label-caps text-primary tracking-widest uppercase">ORIGINAL UNIVERSE // ED. 2025 • JAKARTA</span>
</div>
<div class="flex items-center gap-space-xs bg-surface-container-low px-3 py-0.5 rounded-full">
<span class="material-symbols-outlined text-tertiary text-[14px]">graphic_eq</span>
<span class="font-body-sm text-body-sm text-secondary">♪ Auric Symphony — Kaelen's Theme</span>
</div>
</div>
<!-- Interactive Emblem Wax Seal Section -->
<div class="relative flex flex-col items-center justify-center my-space-xs group">
<!-- Glow Aura -->
<div class="absolute w-44 h-44 rounded-full bg-primary/20 blur-xl transition-all duration-700 pointer-events-none animate-pulse" id="seal-glow"></div>
<!-- Seal Button Trigger -->
<button aria-label="Buka Segel Auric" class="relative z-10 p-1 rounded-full bg-surface-container transition-transform duration-300 active:scale-95 hover:scale-105 shadow-xl cursor-pointer" id="emblem-seal-btn" type="button" onclick="openInvitation()">
<img alt="Kaelen Original Edition Seal" class="w-28 h-28 object-contain drop-shadow-[0_10px_20px_rgba(212,175,55,0.35)]" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</button>
<!-- Interactive Instruction Badge -->
<div class="mt-space-xs bg-surface-container-high px-3 py-1 rounded-full shadow-md transition-colors duration-300">
<p class="font-label-caps text-label-caps text-primary tracking-widest uppercase flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
          ◆ KETUK UNTUK MEMBUKA SEGEL AURIC ◆
        </p>
</div>
</div>
<!-- Editorial Hierarchy & Title Section -->
<div class="text-center flex flex-col items-center gap-1">
<p class="font-label-caps text-label-caps text-secondary tracking-[0.2em] uppercase">
        PERAYAAN ULANG TAHUN &amp; PELUNCURAN KARAKTER ORISINAL
      </p>
<h1 class="font-display-hero-mobile text-display-hero-mobile text-primary tracking-tight font-extrabold uppercase drop-shadow-[0_2px_12px_rgba(242,202,80,0.25)]" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-title-md text-title-md text-on-surface tracking-wider uppercase font-semibold">
        THE GOLDEN ALCHEMIST
      </p>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-1 leading-relaxed italic opacity-90">
        “Di balik percikan alkimia kencana dan bayang-bayang obsidian, sebuah babak baru keberanian dimulai. Selamat datang di malam perayaan mahakarya orisinal.”
      </p>
</div>
<!-- Digital Envelope VIP Card Container -->
<div class="w-full bg-surface-container-low rounded-xl p-space-md shadow-xl relative overflow-hidden transition-all duration-500" id="vip-card">
<!-- Card Corner Ornament Accent -->
<div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-bl from-primary/15 to-transparent pointer-events-none"></div>
<!-- VIP Header Identifier -->
<div class="flex items-center justify-between pb-space-sm mb-space-sm bg-surface-container-lowest/60 px-3 py-1.5 rounded-lg">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-[16px]" style="font-variation-settings: 'FILL' 1;">stars</span>
<span class="font-label-caps text-label-caps text-primary-fixed tracking-widest uppercase">VIP INVITATION</span>
</div>
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-wider">NO. 001-AURIC</span>
</div>
<!-- Guest Card Body -->
<div class="flex flex-col gap-1 text-center py-space-xs">
<p class="font-label-caps text-label-caps text-secondary uppercase tracking-widest opacity-80">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </p>
<p class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-normal pt-1" id="previewGuestNameCover">
          {{ $guestName }}
        </p>
<div class="flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-secondary text-[14px]">location_on</span>
<span class="font-body-sm text-body-sm text-secondary">Di Tempat</span>
</div>
</div>
<!-- Welcome Note -->
<p class="font-body-sm text-body-sm text-on-surface-variant text-center mt-2 leading-relaxed bg-surface-container px-3 py-2 rounded-lg">
        Merupakan suatu kehormatan agung menyambut kehadiran Anda dalam malam peluncuran karakter dan perayaan ulang tahun penuh energi spektakuler ini.
      </p>
</div>
<!-- Primary Action CTA Button -->
<button class="w-full bg-gradient-to-r from-primary-container via-primary to-primary-fixed text-on-primary font-title-md text-title-md font-bold py-3.5 px-6 rounded-lg shadow-lg active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2 group cursor-pointer" id="open-envelope-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-hover:scale-110">mail</span>
<span class="tracking-wide uppercase">BUKA UNDANGAN (ENTER AURIC GALA)</span>
<span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
</button>
<!-- Event Metadata Footer -->
<div class="w-full flex flex-col items-center gap-1.5 text-center pt-space-xs pb-space-sm">
<div class="flex items-center justify-center gap-1.5 text-secondary">
<span class="material-symbols-outlined text-[15px]">event</span>
<span class="font-label-caps text-label-caps tracking-wider uppercase">{{ strtoupper($eventDateFormatted) }}</span>
</div>
<div class="flex items-center justify-center gap-1.5 text-on-surface-variant">
<span class="material-symbols-outlined text-[15px]">account_balance</span>
<span class="font-body-sm text-body-sm">THE TRIBHATA GRAND BALLROOM, JAKARTA</span>
</div>
<div class="mt-1 bg-surface-container px-3 py-1 rounded-full">
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-widest">
          DRESS CODE: BOLD BLACK &amp; METALLIC GOLD COCKTAIL / FORMAL
        </span>
</div>
</div>
</div>
</div>
<script>
  (function() {
    const sealBtn = document.getElementById('emblem-seal-btn');
    const openBtn = document.getElementById('open-envelope-btn');
    const vipCard = document.getElementById('vip-card');
    const sealGlow = document.getElementById('seal-glow');

    function triggerUnlockEffect() {
      if (sealGlow) {
        sealGlow.classList.remove('bg-primary/20');
        sealGlow.classList.add('bg-primary', 'scale-125');
      }
      if (vipCard) {
        vipCard.classList.add('scale-[1.02]');
        setTimeout(() => {
          vipCard.classList.remove('scale-[1.02]');
        }, 300);
      }
      if (openBtn) {
        openBtn.classList.add('brightness-125');
        setTimeout(() => {
          openBtn.classList.remove('brightness-125');
        }, 400);
      }
    }

    if (sealBtn) {
      sealBtn.addEventListener('click', triggerUnlockEffect);
    }

    if (openBtn) {
      openBtn.addEventListener('click', () => {
        triggerUnlockEffect();
        const event = new CustomEvent('navigate-to-invitation', { bubbles: true });
        openBtn.dispatchEvent(event);
        if (typeof openInvitation === 'function') openInvitation();
      });
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-margin-mobile flex items-center justify-between gap-space-sm"><div class="flex items-center gap-space-sm min-w-0"><img alt="Black Gold Character Emblem Seal" class="h-8 w-auto object-contain shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS"/><div class="flex flex-col truncate"><span class="font-label-caps text-label-caps text-primary tracking-widest uppercase truncate">Kaelen Gala</span><h1 class="font-title-md text-title-md text-on-surface font-semibold truncate leading-none" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-xs shrink-0"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Musik" class="w-9 h-9 rounded-full flex items-center justify-center text-primary hover:bg-surface-container transition-all cursor-pointer"><span class="material-symbols-outlined text-[18px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 w-full bg-surface pt-16 pb-24 relative flex flex-col"><div class="flex flex-col w-full pb-12">
<!-- Top Audio Pill & Event Category Indicator -->
<div class="px-margin-mobile pt-3 pb-2 flex flex-col gap-2">
<div class="flex items-center justify-between gap-2">
<span class="font-label-caps text-label-caps text-primary tracking-widest uppercase">
        Edisi Spesial • Peluncuran Karakter Orisinal &amp; Ultah
      </span>
<div class="cursor-pointer bg-surface-container-high hover:bg-surface-bright transition-all px-2.5 py-1 rounded-full flex items-center gap-1.5 shadow-sm" id="audio-toggle">
<span class="material-symbols-outlined text-primary text-[14px] animate-pulse">music_note</span>
<span class="font-label-caps text-label-caps text-on-surface-variant truncate max-w-[130px]">Auric Overture</span>
</div>
</div>
</div>
<!-- Hero Character Showcase Frame -->
<section class="px-margin-mobile relative my-2">
<div class="relative bg-surface-container-lowest rounded-xl overflow-hidden shadow-xl p-3 flex flex-col">
<!-- Ambient Golden Backlight Glow -->
<div class="absolute -top-16 -left-16 w-56 h-56 rounded-full bg-primary/10 blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-16 -right-16 w-56 h-56 rounded-full bg-tertiary-container/10 blur-3xl pointer-events-none"></div>
<!-- Character Masterpiece Display with Gold Accents -->
<div class="relative rounded-lg overflow-hidden bg-surface-dim">
<img alt="Kaelen The Golden Alchemist in full gilded attire" class="w-full h-[410px] object-cover object-top filter brightness-105" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<!-- Subtle Top & Bottom Gradient Overlay for contrast -->
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/30 to-transparent"></div>
<!-- Top Gilded Badge -->
<div class="absolute top-3 left-3 flex items-center gap-1.5 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full shadow-md">
<span class="material-symbols-outlined text-primary text-[14px]">stars</span>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest">Original Hero Prodigy</span>
</div>
<!-- Perforated Monogram Seat Tag Overlay -->
<div class="absolute top-3 right-3 bg-surface-container-high/90 backdrop-blur-md px-2.5 py-1 rounded-lg shadow-md text-right">
<span class="font-label-caps text-label-caps text-on-surface-variant block leading-none">SEAT VIP</span>
<span class="font-title-md text-primary font-bold">#A-01</span>
</div>
<!-- Hero Identity Title Bottom Scrim -->
<div class="absolute bottom-3 left-3 right-3 flex flex-col gap-1">
<div class="flex items-baseline gap-2">
<h2 class="font-display-hero-mobile text-display-hero-mobile text-primary tracking-wider leading-none">KAELEN</h2>
<span class="font-label-caps text-label-caps text-secondary-fixed tracking-widest uppercase">Orisinal</span>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold -mt-1 tracking-tight">The Golden Alchemist</p>
</div>
</div>
<!-- Character Quote Banner -->
<div class="mt-4 p-4 rounded-lg bg-surface-container-high/70 backdrop-blur-md relative">
<div class="flex items-start gap-2.5">
<span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">auto_awesome</span>
<div class="flex flex-col">
<p class="font-body-md text-body-md text-on-surface italic leading-relaxed">
              "Transforming imagination into golden reality. Bergabunglah bersama kami merayakan lahirnya semesta baru dalam balutan seni, persahabatan, dan sukacita."
            </p>
<span class="font-label-caps text-label-caps text-primary mt-2 text-right uppercase tracking-wider">— Kaelen &amp; Creator Collective</span>
</div>
</div>
</div>
</div>
</section>
<!-- Guest Reservation Card -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container-high rounded-xl p-5 shadow-lg relative overflow-hidden">
<div class="absolute top-0 right-0 w-28 h-28 bg-primary/5 rounded-bl-full pointer-events-none"></div>
<div class="flex items-center justify-between mb-3">
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest">Undangan Khusus Tamu Terhormat</span>
<span class="material-symbols-outlined text-primary text-[18px]">verified</span>
</div>
<div class="bg-surface-container-lowest/80 rounded-lg p-4 mb-3">
<span class="font-label-caps text-label-caps text-on-surface-variant block uppercase">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
<h3 class="font-title-md text-title-md text-primary font-bold mt-0.5"><span id="previewGuestNameMain">{{ $guestName }}</span></h3>
<div class="mt-2.5 pt-2 flex items-center justify-between gap-2">
<div class="flex items-center gap-1.5 text-secondary-fixed">
<span class="material-symbols-outlined text-[16px]">chair</span>
<span class="font-body-sm text-body-sm">Meja VIP: Auric Chamber Suite 01</span>
</div>
<span class="bg-secondary-container text-on-secondary-container text-[11px] font-label-md px-2 py-0.5 rounded-full font-bold">2 Tamu</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        Merupakan suatu kehormatan dan kebahagiaan tak terhingga bagi kami untuk menyambut Anda menyaksikan momentum bersejarah peluncuran figur pahlawan orisinal Indonesia ini.
      </p>
</div>
</section>
<!-- Live Countdown Timer & Calendar Sync -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container-low rounded-xl p-5 shadow-md flex flex-col gap-4">
<div class="flex items-center justify-between">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Menghitung Mundur Hari Besar</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface mt-0.5">{{ $eventDateFormatted }}</h4>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">hourglass_top</span>
</div>
</div>
<!-- Digit Blocks -->
<div class="grid grid-cols-4 gap-2 text-center" id="countdown-grid">
<div class="bg-surface-container-highest/80 rounded-lg p-2.5 flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold leading-none" id="days-val">284</span>
<span class="font-label-caps text-label-caps text-on-surface-variant mt-1">HARI</span>
</div>
<div class="bg-surface-container-highest/80 rounded-lg p-2.5 flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold leading-none" id="hours-val">14</span>
<span class="font-label-caps text-label-caps text-on-surface-variant mt-1">JAM</span>
</div>
<div class="bg-surface-container-highest/80 rounded-lg p-2.5 flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold leading-none" id="mins-val">32</span>
<span class="font-label-caps text-label-caps text-on-surface-variant mt-1">MENIT</span>
</div>
<div class="bg-surface-container-highest/80 rounded-lg p-2.5 flex flex-col items-center">
<span class="font-headline-md text-headline-md text-primary font-bold leading-none" id="secs-val">45</span>
<span class="font-label-caps text-label-caps text-on-surface-variant mt-1">DETIK</span>
</div>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm px-1">
<span>⏰ Pukul 18.00 - 22.00 WIB</span>
<span class="text-primary font-label-md">Open Gate: 17.30 WIB</span>
</div>
<button class="w-full bg-surface-container-high hover:bg-surface-bright text-on-surface py-2.5 px-4 rounded-lg flex items-center justify-center gap-2 transition-all shadow-sm" id="cal-sync-btn">
<span class="material-symbols-outlined text-primary text-[18px]">calendar_month</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Simpan ke Google Calendar</span>
</button>
</div>
</section>
<!-- Lore of Kaelen (Character Narrative) -->
<section class="px-margin-mobile my-4">
<div class="flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-primary text-[20px]">menu_book</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Kisah &amp; Semesta Kaelen</h3>
</div>
<!-- 3 Character Pillars -->
<div class="grid grid-cols-3 gap-2 mb-3">
<div class="bg-surface-container-high p-3 rounded-lg flex flex-col items-center text-center">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[18px]">neurology</span>
</div>
<span class="font-label-caps text-label-caps text-on-surface font-bold leading-tight">Kecerdasan Ilmiah</span>
</div>
<div class="bg-surface-container-high p-3 rounded-lg flex flex-col items-center text-center">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[18px]">shield</span>
</div>
<span class="font-label-caps text-label-caps text-on-surface font-bold leading-tight">Keteguhan Emas</span>
</div>
<div class="bg-surface-container-high p-3 rounded-lg flex flex-col items-center text-center">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center mb-1.5">
<span class="material-symbols-outlined text-[18px]">local_fire_department</span>
</div>
<span class="font-label-caps text-label-caps text-on-surface font-bold leading-tight">Keberanian Sejati</span>
</div>
</div>
<!-- Narrative Chapters Accordion/List -->
<div class="flex flex-col gap-2.5">
<div class="bg-surface-container-low rounded-lg p-4">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-caps text-label-caps text-primary uppercase">Babak I</span>
<span class="text-on-surface-variant text-[12px]">•</span>
<h4 class="font-title-md text-title-md text-on-surface font-bold">Lahirnya Sang Alkemis</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Kaelen terlahir dari eksplorasi rasa ingin tahu tanpa batas, menggabungkan presisi teknologi modern dengan filosofi alchemika kuno untuk menciptakan inovasi bercahaya kencana.
        </p>
</div>
<div class="bg-surface-container-low rounded-lg p-4">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-caps text-label-caps text-primary uppercase">Babak II</span>
<span class="text-on-surface-variant text-[12px]">•</span>
<h4 class="font-title-md text-title-md text-on-surface font-bold">Artefak Inti Kencana</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Penemuan artefak oktahedron geometris di genggamannya menjadi sumber energi murni yang melindunginya serta mentransformasikan kegelapan menjadi kilau emas nan megah.
        </p>
</div>
<div class="bg-surface-container-low rounded-lg p-4">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-caps text-label-caps text-primary uppercase">Babak III</span>
<span class="text-on-surface-variant text-[12px]">•</span>
<h4 class="font-title-md text-title-md text-on-surface font-bold">Misi Masa Depan</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Lebih dari sekadar karakter komik, Kaelen adalah simbol tekad generasi baru yang berani bermimpi besar, menembus batas cipta, dan menyinari dunia sekitar.
        </p>
</div>
</div>
</section>
<!-- Rundown Acara (Event Schedule Timeline) -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container rounded-xl p-5 shadow-lg">
<div class="flex items-center justify-between mb-4">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Rangkaian Acara Eksklusif</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $couple->events->first()->title ?? "Jadwal Perayaan Gala" }}</h3>
</div>
<span class="material-symbols-outlined text-primary text-[24px]">history_edu</span>
</div>
<div class="flex flex-col gap-3 relative" id="itineraryContainer">
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
    <div class="flex gap-3 items-start event-itinerary-item">
        <div class="bg-primary text-on-primary font-label-caps px-2 py-1.5 rounded text-center shrink-0 w-20 font-bold text-xs">
            {{ $evTimeStr }}
        </div>
        <div class="flex-1 min-w-0 bg-surface-container-high p-2.5 rounded-lg border border-primary/20">
            <span class="text-[9px] uppercase tracking-wider text-primary font-bold block">SESI {{ $index + 1 }}</span>
            <h5 class="font-label-md text-label-md text-primary font-bold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h5>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-bold">
                    <span class="material-symbols-outlined text-[13px]">location_on</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</div>
</div>
</section>
<!-- Dress Code Guide (Panduan Busana) -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container-low rounded-xl p-5 shadow-md">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">checkroom</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Panduan Tata Busana</h3>
</div>
<p class="font-label-caps text-label-caps text-secondary-fixed mb-4 uppercase tracking-wider">
        Theme: Bold Modern Black &amp; Auric Gold
      </p>
<!-- Palette Swatches -->
<div class="mb-4">
<span class="font-body-sm text-body-sm text-on-surface-variant block mb-2">Palet Warna Utama Tamu:</span>
<div class="flex items-center gap-2">
<div class="flex-1 flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-surface-container-lowest shadow-inner"></div>
<span class="text-[10px] font-label-caps text-on-surface-variant uppercase">Pitch Black</span>
</div>
<div class="flex-1 flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-surface-container shadow-inner"></div>
<span class="text-[10px] font-label-caps text-on-surface-variant uppercase">Obsidian</span>
</div>
<div class="flex-1 flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-primary shadow-sm"></div>
<span class="text-[10px] font-label-caps text-on-surface-variant uppercase">Metallic Gold</span>
</div>
<div class="flex-1 flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-secondary-fixed shadow-sm"></div>
<span class="text-[10px] font-label-caps text-on-surface-variant uppercase">Champagne</span>
</div>
<div class="flex-1 flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-on-surface shadow-sm"></div>
<span class="text-[10px] font-label-caps text-on-surface-variant uppercase">Crisp White</span>
</div>
</div>
</div>
<!-- Guidelines Cards -->
<div class="grid grid-cols-2 gap-2.5">
<div class="bg-surface-container-high p-3 rounded-lg flex flex-col">
<div class="flex items-center gap-1 text-primary mb-1">
<span class="material-symbols-outlined text-[16px]">male</span>
<span class="font-label-md text-label-md font-bold">Untuk Pria</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Tailored black suit/blazer dengan sentuhan saputangan saku emas atau pin lapel kencana, kemeja gelap rapi.
          </p>
</div>
<div class="bg-surface-container-high p-3 rounded-lg flex flex-col">
<div class="flex items-center gap-1 text-primary mb-1">
<span class="material-symbols-outlined text-[16px]">female</span>
<span class="font-label-md text-label-md font-bold">Untuk Wanita</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Architectural cocktail dress atau gaun malam hitam elegan beraksen perhiasan/bordir emas berkilau.
          </p>
</div>
</div>
</div>
</section>
<!-- Curated Art Gallery & Assets Showcase -->
<section class="px-margin-mobile my-3">
<div class="flex items-center justify-between mb-3">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Sneak Peek Eksklusif</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Galeri Seni &amp; Karya</h3>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">palette</span>
</div>
<div id="galleryGridContainer" class="grid grid-cols-2 gap-2.5">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container-high rounded-lg overflow-hidden flex flex-col shadow-sm border border-outline-variant/30">
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
<!-- Venue & Map Information -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container rounded-xl p-5 shadow-lg">
<div class="flex items-center justify-between mb-3">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Lokasi &amp; Akses Tamu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">The Tribrata Darmawangsa</h3>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container-high text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">location_on</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-3 leading-relaxed">
        Grand Ballroom, The Tribrata Darmawangsa Jakarta.<br/>
        Jl. Darmawangsa III No.2, Pulo, Kebayoran Baru, Jakarta Selatan 12160.
      </p>
<!-- Embedded Google Map Component -->
<div class="w-full h-44 rounded-lg bg-cover bg-center overflow-hidden mb-3 relative shadow-md" data-location="The Tribrata Darmawangsa, Jakarta, Indonesia" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB86tax-EOMRDA_F6fH_G41FFEJs1RNa-uBHtNApoRDUh6kfBdRLBiZAreYld9VImyyMZbFiLRE3ypGlfrGs9Qnh8ldVRCNZu9SMPNO4wLXRl47FcCLejHo8AAIBJzNMzqna3LdycTnyr34AhImr7AjMEmQ1GllxEz_gmRnWxccq4szJgT2fvRYkfGm1Nl1G2wiCCDzLXh-bcvjUbptk0IsozrSHpvsjm5sctnMbeRx')">
<div class="absolute inset-0 bg-surface-container-lowest/40 backdrop-blur-[1px] flex flex-col items-center justify-center p-3 text-center">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md animate-bounce">
<span class="material-symbols-outlined text-[20px]">pin_drop</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-bold mt-1 bg-surface-container-lowest/90 px-3 py-0.5 rounded-full">
            Grand Ballroom Gate
          </span>
</div>
</div>
<!-- Facility Badges -->
<div class="flex flex-wrap gap-2 mb-4">
<span class="bg-surface-container-high text-on-surface-variant text-[11px] font-label-md px-2.5 py-1 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-primary text-[14px]">local_parking</span> VIP Valet Complimentary
        </span>
<span class="bg-surface-container-high text-on-surface-variant text-[11px] font-label-md px-2.5 py-1 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-primary text-[14px]">photo_camera</span> Photo Experience
        </span>
<span class="bg-surface-container-high text-on-surface-variant text-[11px] font-label-md px-2.5 py-1 rounded flex items-center gap-1">
<span class="material-symbols-outlined text-primary text-[14px]">lock</span> Cloakroom
        </span>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-2">
<button class="bg-surface-container-high hover:bg-surface-bright text-on-surface py-2 px-3 rounded-lg flex items-center justify-center gap-1.5 transition-all" id="copy-addr-btn">
<span class="material-symbols-outlined text-primary text-[16px]">content_copy</span>
<span class="font-label-md text-label-md font-semibold">Salin Alamat</span>
</button>
<a id="previewMapsLinkMain" class="bg-primary text-on-primary hover:bg-primary-fixed-dim py-2 px-3 rounded-lg flex items-center justify-center gap-1.5 transition-all shadow-md text-center" href="{{ $mapsUrl }}" target="_blank">
<span class="material-symbols-outlined text-[16px]">near_me</span>
<span class="font-label-md text-label-md font-bold">Buka Maps</span>
</a>
</div>
</div>
</section>
<!-- Interactive RSVP Form -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container-low rounded-xl p-5 shadow-xl relative overflow-hidden">
<!-- Glow ambient corner -->
<div class="absolute -top-12 -right-12 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary text-[22px]">how_to_reg</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Konfirmasi Kehadiran (RSVP)</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">
        Mohon kesediaan konfirmasi sebelum 1 Desember 2025 demi ketepatan reservasi banquet suite Anda.
      </p>
<form class="flex flex-col gap-3.5" id="rsvp-form">
<!-- Guest Name prefilled -->
<div class="flex flex-col gap-1">
<label class="font-label-caps text-label-caps text-primary uppercase">Nama Lengkap Tamu</label>
<input class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-lg font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" type="text" value="{{ $guestName }}"/>
</div>
<!-- Attendance Options -->
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-primary uppercase">Status Kehadiran</label>
<div class="grid grid-cols-1 gap-2">
<label class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-high cursor-pointer hover:bg-surface-bright transition-all">
<input checked="" class="accent-primary w-4 h-4 cursor-pointer" name="attendance" type="radio" value="hadir-berdua"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">⚡ Ya, Pasti Hadir Berdua</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Akan hadir 2 orang di Suite A-01</span>
</div>
</label>
<label class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-high cursor-pointer hover:bg-surface-bright transition-all">
<input class="accent-primary w-4 h-4 cursor-pointer" name="attendance" type="radio" value="hadir-sendiri"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Ya, Hadir Sendiri</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Hadir 1 orang</span>
</div>
</label>
<label class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-high cursor-pointer hover:bg-surface-bright transition-all">
<input class="accent-primary w-4 h-4 cursor-pointer" name="attendance" type="radio" value="berhalangan"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Mohon Maaf, Berhalangan</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Akan menitipkan doa restu &amp; kado</span>
</div>
</label>
</div>
</div>
<!-- Dietary / Companion Select -->
<div class="flex flex-col gap-1">
<label class="font-label-caps text-label-caps text-primary uppercase">Preferensi Menu Banquet</label>
<select class="w-full bg-surface-container-lowest text-on-surface px-3 py-2.5 rounded-lg font-body-sm text-body-sm focus:outline-none focus:ring-1 focus:ring-primary shadow-inner">
<option>Western Gourmet Course (Wagyu &amp; Truffle)</option>
<option>Asian Imperial Course (Seafood &amp; Auric Duck)</option>
<option>Plant-Based / Vegetarian Haute Cuisine</option>
</select>
</div>
<!-- Wishes and Greetings Message -->
<div class="flex flex-col gap-1">
<label class="font-label-caps text-label-caps text-primary uppercase">Untaian Doa &amp; Pesan untuk Kaelen</label>
<textarea class="w-full bg-surface-container-lowest text-on-surface px-3 py-2.5 rounded-lg font-body-sm text-body-sm focus:outline-none focus:ring-1 focus:ring-primary shadow-inner resize-none" placeholder="Tuliskan doa restu, ucapan selamat ulang tahun, dan apresiasi karya..." rows="3"></textarea>
</div>
<button class="mt-2 w-full bg-primary hover:bg-primary-fixed text-on-primary py-3 px-4 rounded-lg flex items-center justify-center gap-2 shadow-lg transition-all" id="submit-rsvp-btn" type="button">
<span class="material-symbols-outlined text-[20px] font-bold">send</span>
<span class="font-label-md text-label-md uppercase tracking-wider font-bold">Transmit Konfirmasi Kehadiran</span>
</button>
</form>
<!-- Feedback Success Toast (Hidden initially) -->
<div class="hidden mt-3 p-3 rounded-lg bg-surface-container-highest text-primary flex items-center gap-2" id="rsvp-success-toast">
<span class="material-symbols-outlined text-[20px]">check_circle</span>
<span class="font-body-sm text-body-sm font-semibold">Terima kasih! RSVP Anda telah terenkripsi dalam Buku Tamu Kencana.</span>
</div>
</div>
</section>
<!-- Digital Guestbook (Buku Tamu Digital) -->
<section class="px-margin-mobile my-3">
<div class="flex items-center justify-between mb-3">
<div>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest block">Buku Tamu Digital</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Untaian Doa Sahabat</h3>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">forum</span>
</div>
<div class="flex flex-col gap-2.5">
<!-- Comment 1 -->
<div class="bg-surface-container-low p-3.5 rounded-lg flex gap-3">
<div class="w-9 h-9 rounded-full bg-secondary-container text-primary font-bold flex items-center justify-center shrink-0">
          AW
        </div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<h5 class="font-label-md text-label-md text-on-surface font-semibold truncate">Andi Wicaksono</h5>
<span class="text-[11px] font-label-caps text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
            Selamat atas peluncuran maha karya Kaelen! Karakter ini benar-benar membawa napas baru bagi industri animasi tanah air. Can’t wait for the premiere!
          </p>
</div>
</div>
<!-- Comment 2 -->
<div class="bg-surface-container-low p-3.5 rounded-lg flex gap-3">
<div class="w-9 h-9 rounded-full bg-secondary-container text-primary font-bold flex items-center justify-center shrink-0">
          ST
        </div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<h5 class="font-label-md text-label-md text-on-surface font-semibold truncate">Stephanie Tan</h5>
<span class="text-[11px] font-label-caps text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
            Happy birthday dan selamat untuk seluruh tim kreator! Konsep hitam emasnya luar biasa megah. Sampai jumpa di Tribrata!
          </p>
</div>
</div>
<!-- Comment 3 -->
<div class="bg-surface-container-low p-3.5 rounded-lg flex gap-3">
<div class="w-9 h-9 rounded-full bg-secondary-container text-primary font-bold flex items-center justify-center shrink-0">
          DK
        </div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<h5 class="font-label-md text-label-md text-on-surface font-semibold truncate">Dimas Kencana</h5>
<span class="text-[11px] font-label-caps text-on-surface-variant">1 hari lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
            Karakter Alchemist dengan perpaduan sains &amp; estetika modern yang sangat kuat. Sukses besar untuk Kaelen Universe!
          </p>
</div>
</div>
</div>
</section>
<!-- Digital Gift Registry (Tanda Kasih Digital) -->
<section class="px-margin-mobile my-3">
<div class="bg-surface-container-high rounded-xl p-5 shadow-lg relative">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">featured_seasonal_and_gifts</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Tanda Kasih Digital</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4 leading-relaxed">
        Doa restu Anda adalah anugerah terbesar bagi kami. Namun apabila Anda berkenan memberikan tanda kasih digital untuk pengembangan karya animasi Kaelen:
      </p>
<div class="flex flex-col gap-2.5">
<!-- Bank 1 Card -->
<div class="bg-surface-container-lowest p-3 rounded-lg flex items-center justify-between mb-2.5">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary-fixed">{{ $bankName1 }}</span>
<span class="font-title-md text-title-md text-primary font-bold tracking-wider">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-surface-container-high hover:bg-primary hover:text-on-primary text-primary px-3 py-1.5 rounded text-label-caps text-label-caps uppercase transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-lowest p-3 rounded-lg flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary-fixed">{{ $bankName2 }}</span>
<span class="font-title-md text-title-md text-primary font-bold tracking-wider">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-surface-container-high hover:bg-primary hover:text-on-primary text-primary px-3 py-1.5 rounded text-label-caps text-label-caps uppercase transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- Official Seal Emblem & Warm Closing Section -->
<section class="px-margin-mobile my-6 flex flex-col items-center text-center">
<!-- Character Emblem Seal Image -->
<div class="relative my-2">
<img alt="Kaelen Original Edition Official Seal Emblem" class="w-24 h-24 object-contain filter drop-shadow-[0_0_16px_rgba(212,175,55,0.3)] animate-pulse" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS"/>
</div>
<span class="font-label-caps text-label-caps text-primary tracking-widest uppercase mt-2">
      Sampai Jumpa di Malam Keajaiban Kencana
    </span>
<p class="font-body-md text-body-md text-on-surface max-w-xs mt-1 leading-relaxed">
      Terima kasih telah menjadi bagian dari perjalanan awal semesta Kaelen The Golden Alchemist.
    </p>
<div class="mt-4 pt-3 flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary-fixed font-bold">Keluarga Besar Arya Wijaya</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">&amp; Tim Kreatif Studio Karakter Orisinal</span>
</div>
</section>
</div>
<script>
  (function initKaelenGalaInteractions() {
    // Dynamic countdown clock simulator
    let days = 284, hours = 14, mins = 32, secs = 45;
    const daysEl = document.getElementById('days-val');
    const hoursEl = document.getElementById('hours-val');
    const minsEl = document.getElementById('mins-val');
    const secsEl = document.getElementById('secs-val');

    setInterval(() => {
      if (secs > 0) {
        secs--;
      } else {
        secs = 59;
        if (mins > 0) {
          mins--;
        } else {
          mins = 59;
          if (hours > 0) {
            hours--;
          } else {
            hours = 23;
            if (days > 0) days--;
          }
        }
      }
      if (secsEl) secsEl.textContent = secs.toString().padStart(2, '0');
      if (minsEl) minsEl.textContent = mins.toString().padStart(2, '0');
      if (hoursEl) hoursEl.textContent = hours.toString().padStart(2, '0');
      if (daysEl) daysEl.textContent = days.toString();
    }, 1000);

    // Copy Address Button Micro-interaction
    const copyAddrBtn = document.getElementById('copy-addr-btn');
    if (copyAddrBtn) {
      copyAddrBtn.addEventListener('click', () => {
        navigator.clipboard.writeText('{{ addslashes($venueAddress) }}');
        const textSpan = copyAddrBtn.querySelector('span:nth-child(2)');
        if (textSpan) {
          const original = textSpan.textContent;
          textSpan.textContent = 'Alamat Tersalin!';
          setTimeout(() => { textSpan.textContent = original; }, 2000);
        }
      });
    }

    // Google Calendar Sync micro-interaction
    const calSyncBtn = document.getElementById('cal-sync-btn');
    if (calSyncBtn) {
      calSyncBtn.addEventListener('click', () => {
        const calUrl = 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=Gala+Kaelen+The+Golden+Alchemist&dates=20251213T110000Z/20251213T150000Z&details=Peluncuran+Karakter+Orisinal+dan+Perayaan+Ultah+Kaelen&location=The+Tribrata+Darmawangsa+Jakarta';
        window.open(calUrl, '_blank');
      });
    }

    // RSVP submission handler
    const rsvpBtn = document.getElementById('submit-rsvp-btn');
    const toast = document.getElementById('rsvp-success-toast');
    if (rsvpBtn && toast) {
      rsvpBtn.addEventListener('click', () => {
        rsvpBtn.disabled = true;
        rsvpBtn.classList.add('opacity-75');
        rsvpBtn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">sync</span> Mengirim Reservasi...';
        setTimeout(() => {
          toast.classList.remove('hidden');
          rsvpBtn.innerHTML = '<span class="material-symbols-outlined text-[18px]">verified</span> Terkonfirmasi!';
          toast.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 1000);
      });
    }

    // Audio pill feedback
    const audioPill = document.getElementById('audio-toggle');
    if (audioPill) {
      audioPill.addEventListener('click', () => {
        const icon = audioPill.querySelector('.material-symbols-outlined');
        if (icon) {
          if (icon.classList.contains('animate-pulse')) {
            icon.classList.remove('animate-pulse');
            icon.textContent = 'volume_off';
          } else {
            icon.classList.add('animate-pulse');
            icon.textContent = 'music_note';
          }
        }
      });
    }
  })();
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface-container-lowest/85 backdrop-blur-xl shadow-[0_-1px_12px_rgba(0,0,0,0.4)]" data-active-classes="text-primary font-semibold"><div class="flex items-stretch justify-around h-16 px-space-xs"><a aria-current="page" class="flex-1 flex flex-col items-center justify-center min-w-[44px] min-h-[44px] py-1 transition-colors text-primary font-semibold" data-path="undangan" href="#"><span class="material-symbols-outlined text-[20px]">auto_awesome</span><span class="font-label-caps text-label-caps mt-0.5 tracking-tight uppercase">Undangan</span></a><a class="flex-1 flex flex-col items-center justify-center min-w-[44px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="karakter" href="#"><span class="material-symbols-outlined text-[20px]">shield_person</span><span class="font-label-caps text-label-caps mt-0.5 tracking-tight uppercase">Karakter</span></a><a class="flex-1 flex flex-col items-center justify-center min-w-[44px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[20px]">event</span><span class="font-label-caps text-label-caps mt-0.5 tracking-tight uppercase">Jadwal</span></a><a class="flex-1 flex flex-col items-center justify-center min-w-[44px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[20px]">near_me</span><span class="font-label-caps text-label-caps mt-0.5 tracking-tight uppercase">Lokasi</span></a><a class="flex-1 flex flex-col items-center justify-center min-w-[44px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[20px]">how_to_reg</span><span class="font-label-caps text-label-caps mt-0.5 tracking-tight uppercase">RSVP</span></a></div></nav>
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

                const elD = document.getElementById('days-val') || document.getElementById('countdown-days');
                const elH = document.getElementById('hours-val') || document.getElementById('countdown-hours');
                const elM = document.getElementById('mins-val') || document.getElementById('countdown-minutes');
                const elS = document.getElementById('secs-val') || document.getElementById('countdown-seconds');

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
            container.innerHTML = events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.30 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-bold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="flex gap-3 items-start event-itinerary-item">
                        <div class="bg-primary text-on-primary font-label-caps px-2 py-1.5 rounded text-center shrink-0 w-20 font-bold text-xs">
                            ${timeStr}
                        </div>
                        <div class="flex-1 min-w-0 bg-surface-container-high p-2.5 rounded-lg border border-primary/20">
                            <span class="text-[9px] uppercase tracking-wider text-primary font-bold block">SESI ${i + 1}</span>
                            <h5 class="font-label-md text-label-md text-primary font-bold leading-snug">${title}</h5>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-primary block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'kaelen-black-gold' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>