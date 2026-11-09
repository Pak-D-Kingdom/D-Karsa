<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Forest Moss XVII') . ' - ' . ($couple->groom_name ?? 'Charlotte Vivienne') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Charlotte Vivienne' }} - Sweet Seventeen - Elegan Klasik Forest Moss."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&amp;family=Outfit:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "background": "#fcf9f1", "secondary-fixed": "#ffe088", "primary-fixed-dim": "#abcfb8", "surface": "#fcf9f1", "tertiary-container": "#283b03", "tertiary": "#162400", "outline": "#727973", "on-primary-fixed": "#002113", "on-tertiary": "#ffffff", "inverse-primary": "#abcfb8", "surface-container-low": "#f6f3eb", "on-primary": "#ffffff", "inverse-surface": "#31312b", "inverse-on-surface": "#f3f1e9", "on-tertiary-container": "#8ea663", "primary-container": "#1b3b2b", "on-error-container": "#93000a", "secondary-fixed-dim": "#e9c349", "on-secondary-fixed": "#241a00", "secondary-container": "#fed65b", "on-surface-variant": "#424843", "surface-variant": "#e5e2db", "error-container": "#ffdad6", "on-tertiary-fixed": "#131f00", "primary-fixed": "#c7ebd4", "primary": "#032517", "surface-dim": "#dcdad2", "on-secondary": "#ffffff", "on-error": "#ffffff", "tertiary-fixed-dim": "#b6d088", "on-background": "#1c1c17", "tertiary-fixed": "#d2eca2", "secondary": "#735c00", "on-secondary-container": "#745c00", "on-primary-fixed-variant": "#2d4d3c", "surface-container-high": "#ebe8e0", "surface-tint": "#456553", "on-primary-container": "#83a590", "outline-variant": "#c1c8c2", "on-tertiary-fixed-variant": "#394d14", "surface-container-lowest": "#ffffff", "surface-container": "#f1eee6", "on-secondary-fixed-variant": "#574500", "surface-bright": "#fcf9f1", "on-surface": "#1c1c17", "error": "#ba1a1a", "surface-container-highest": "#e5e2db" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-xs": "0.25rem", "space-sm": "0.5rem", "space-xl": "3rem", "space-md": "1rem", "gutter": "1.5rem", "margin-mobile": "1.25rem", "gutter-mobile": "1rem", "space-lg": "1.75rem", "margin": "3rem" }, "fontFamily": { "body-sm": ["Libre Caslon Text"], "body-lg": ["Libre Caslon Text"], "display-hero-mobile": ["EB Garamond"], "label-lg": ["Outfit"], "label-sm": ["Outfit"], "body-md": ["Libre Caslon Text"], "headline-sm": ["EB Garamond"], "display-hero": ["EB Garamond"], "headline-lg": ["EB Garamond"], "headline-md": ["EB Garamond"], "headline-lg-mobile": ["EB Garamond"], "label-md": ["Outfit"] }, "fontSize": { "body-sm": ["14px", { "lineHeight": "22px", "fontWeight": "400" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "display-hero-mobile": ["38px", { "lineHeight": "46px", "letterSpacing": "0.03em", "fontWeight": "400" }], "label-lg": ["13px", { "lineHeight": "18px", "letterSpacing": "0.15em", "fontWeight": "600" }], "label-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.1em", "fontWeight": "500" }], "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }], "headline-sm": ["22px", { "lineHeight": "30px", "fontWeight": "600" }], "display-hero": ["56px", { "lineHeight": "64px", "letterSpacing": "0.04em", "fontWeight": "400" }], "headline-lg": ["40px", { "lineHeight": "48px", "letterSpacing": "0.02em", "fontWeight": "500" }], "headline-md": ["28px", { "lineHeight": "36px", "letterSpacing": "0.01em", "fontWeight": "600" }], "headline-lg-mobile": ["30px", { "lineHeight": "38px", "letterSpacing": "0.02em", "fontWeight": "500" }], "label-md": ["11px", { "lineHeight": "16px", "letterSpacing": "0.12em", "fontWeight": "600" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Charlotte Vivienne';
        $celebrantNick = $couple->groom_nickname ?? 'Charlotte';
        $heading = $couple->event_heading ?? 'Forest Moss XVII';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet seventeen';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Grand Entrance & 17 Roses Waltz',
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
        $quote = $couple->quote ?? 'Like deep evergreen leaves in enchanted woods, seventeen unfolds in timeless grace.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDBjQYZM6h0b6UjEbXUsu5bHgW_GCZZ58xuKdoY6KDjOTJDonYQQANhVCsH2LeljFVeKrHRbOJadz5q5SEQRGuFuGV4-9uenH2-8RvKGdPiGBYj3LxqbmVScKS8m-XpFI3kV6Lvlhi06USqUr_W0eGnvkpYo8uSpciOV4IgZ3BaYiIX9XS5TJ2pRYPqtLdWBsrH2mTmto1SModuawiXN79yphfjoIXJZh8knBN_g4Ve';
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

        $venueName = $couple->venue_name ?? 'The St. Regis Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDBjQYZM6h0b6UjEbXUsu5bHgW_GCZZ58xuKdoY6KDjOTJDonYQQANhVCsH2LeljFVeKrHRbOJadz5q5SEQRGuFuGV4-9uenH2-8RvKGdPiGBYj3LxqbmVScKS8m-XpFI3kV6Lvlhi06USqUr_W0eGnvkpYo8uSpciOV4IgZ3BaYiIX9XS5TJ2pRYPqtLdWBsrH2mTmto1SModuawiXN79yphfjoIXJZh8knBN_g4Ve', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCJ_zQoqZKvzTTFtrraN1D0bXPX_O7oRanlncErUWE3TRPaMhb61zKlKZmyNI1ipqxNr1Gwfp9xX95SWFeSJWqJ8BV6cfTVg1sEilSBmMD4HZUkEDwwrZrukmBa_rOONHgCSMF99aeeWvZKU0aw8EzaZDKnD1fQdYkb9aYGZC8RDzYzN2Pu7mfD3TmNFyrfjPGaUrezgScKqWeDJQ2sltlVLoTV02joElpcvaJeO9g7', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 flex flex-col relative w-full bg-surface pt-safe pb-safe"><div class="flex flex-col w-full relative overflow-hidden items-center justify-between px-margin-mobile py-space-md min-h-[92vh]">
<!-- Ambient Botanical Background Foil Watermark Elements -->
<div class="absolute -top-12 -left-12 w-48 h-48 rounded-full bg-secondary-fixed/20 blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-16 -right-12 w-56 h-56 rounded-full bg-primary-fixed-dim/25 blur-3xl pointer-events-none"></div>
<!-- Subtle Vintage Filigree Corner Ornaments -->
<svg class="absolute top-2 left-2 w-12 h-12 text-secondary/30 pointer-events-none" fill="none" viewbox="0 0 100 100">
<path d="M10 10 H50 C30 10 10 30 10 50 V10 Z" fill="currentColor"></path>
<path d="M14 14 H40 M14 22 H32 M14 30 H24" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"></path>
</svg>
<svg class="absolute top-2 right-2 w-12 h-12 text-secondary/30 pointer-events-none rotate-90" fill="none" viewbox="0 0 100 100">
<path d="M10 10 H50 C30 10 10 30 10 50 V10 Z" fill="currentColor"></path>
<path d="M14 14 H40 M14 22 H32 M14 30 H24" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"></path>
</svg>
<!-- Section 1: Aristocratic Header & Heraldic Tagline -->
<header class="w-full flex flex-col items-center text-center mt-space-xs z-10">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high/60 shadow-sm">
<span class="text-secondary text-[10px]">✦</span>
<p class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary font-semibold">
        Verdant Royale XVII
      </p>
<span class="text-secondary text-[10px]">✦</span>
</div>
<p class="font-label-sm text-label-sm tracking-[0.25em] uppercase text-on-surface-variant/80 mt-1.5">
      A Celebration of Seventeen Blossoming Dreams
    </p>
<!-- Botanical Micro Divider -->
<div class="flex items-center justify-center gap-2 mt-2 w-full max-w-[200px] opacity-70">
<div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-secondary to-transparent"></div>
<span class="material-symbols-outlined text-secondary text-sm">spa</span>
<div class="h-[1px] flex-1 bg-gradient-to-l from-transparent via-secondary to-transparent"></div>
</div>
</header>
<!-- Section 2: Royal Wax Seal Crest Monogram -->
<section class="flex flex-col items-center my-space-sm relative z-10 group cursor-pointer">
<div class="relative flex items-center justify-center">
<!-- Glow Aura -->
<div class="absolute inset-0 rounded-full bg-secondary-fixed-dim/40 blur-xl scale-110 animate-pulse"></div>
<!-- Wax Seal Medallion Frame -->
<div class="relative w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-secondary to-secondary-fixed shadow-[0_12px_28px_-6px_rgba(27,59,43,0.35)] transition-transform duration-500 hover:scale-105 active:scale-95 flex items-center justify-center">
<div class="w-full h-full rounded-full bg-primary flex items-center justify-center overflow-hidden shadow-inner">
<img alt="XVII Forest Moss Debutante Seal" class="w-[108px] h-[108px] object-contain drop-shadow-md transition-transform duration-700 ease-out hover:rotate-3" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
</div>
<span class="font-label-sm text-label-sm text-secondary tracking-[0.2em] uppercase mt-2 font-medium">
      Botanical Crest • XVII
    </span>
</section>
<!-- Section 3: Debutante Honorifics & Grand Verses -->
<section class="flex flex-col items-center text-center px-2 z-10">
<span class="font-label-md text-label-md uppercase tracking-[0.3em] text-on-surface-variant font-semibold">
      The Sweet Seventeen Soirée
    </span>
<h1 class="font-display-hero-mobile text-display-hero-mobile text-primary tracking-wide font-normal mt-0.5" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<div class="w-12 h-[1px] bg-secondary/50 my-1.5 mx-auto"></div>
<p class="font-body-sm text-body-sm italic text-on-surface-variant max-w-[340px] px-2 leading-relaxed">
      “Like deep evergreen leaves in enchanted woods, seventeen unfolds in timeless grace and golden dreams.”
    </p>
</section>
<!-- Section 4: Physical Missive Stationery Card (Invitation Formalities) -->
<section class="w-full max-w-[420px] bg-surface-container-lowest/90 backdrop-blur-sm rounded-xl p-space-md shadow-[0_16px_36px_-8px_rgba(27,59,43,0.12),0_4px_16px_rgba(115,92,0,0.06)] relative z-10 mt-space-sm mb-space-xs">
<!-- Blind Deboss Inset Layer Effect -->
<div class="absolute inset-1.5 rounded-lg bg-transparent pointer-events-none opacity-40 shadow-[inset_0_0_0_1px_#735c00]"></div>
<div class="flex flex-col items-center text-center relative z-10">
<!-- VIP Sovereign Badge -->
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed mb-space-sm shadow-xs">
<span class="text-xs">★</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.16em] font-semibold">
          VIP Invitation • Exclusive Access
        </span>
</div>
<!-- Formal Guest Etiquette -->
<div class="w-full flex flex-col items-center py-1">
<p class="font-label-sm text-label-sm tracking-[0.2em] text-on-surface-variant/80 uppercase">
          Kepada Yth. <span id="previewGuestNameCover">{{ $guestName }}</span>:
        </p>
<p class="font-headline-sm text-headline-sm text-primary tracking-normal mt-0.5 font-semibold">
          {{ $guestName }}
        </p>
<p class="font-body-sm text-body-sm italic text-secondary font-medium">
          Di Tempat
        </p>
</div>
<!-- Cordial Welcome Statement -->
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 mb-space-md text-center max-w-[340px] leading-relaxed">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Bapak/Ibu/Saudara/i untuk turut merayakan momen berharga langkah usia ketujuh belas penuh rasa syukur.
      </p>
<!-- Primary Action CTA -->
<button class="w-full flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-primary text-secondary-fixed font-label-lg text-label-lg tracking-[0.18em] shadow-[0_8px_20px_-4px_rgba(3,37,23,0.4)] transition-all duration-300 hover:bg-primary-container active:scale-[0.98] group cursor-pointer" id="open-invitation-btn" onclick="openInvitation()">
<span class="material-symbols-outlined text-lg transition-transform duration-300 group-hover:scale-110">drafts</span>
<span class="font-semibold uppercase">Buka Undangan</span>
<span class="material-symbols-outlined text-base transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
</button>
<!-- Background Orchestral Badge With Acoustic Rhythm Waves -->
<div class="mt-space-sm flex items-center justify-center gap-2 py-1 px-3 rounded-full bg-surface-container text-on-surface-variant text-center max-w-full">
<div aria-hidden="true" class="flex items-end gap-[2px] h-3 px-0.5">
<span class="w-[2px] h-1.5 bg-secondary rounded-full animate-bounce"></span>
<span class="w-[2px] h-3 bg-secondary rounded-full animate-bounce [animation-delay:0.15s]"></span>
<span class="w-[2px] h-2 bg-secondary rounded-full animate-bounce [animation-delay:0.3s]"></span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant tracking-wider truncate">
          ♪ Enchanted Waltz in G Major - Forest Royale
        </p>
</div>
</div>
</section>
<!-- Section 5: Royal Date & Destination Metadata Footer -->
<footer class="w-full flex flex-col items-center text-center mt-1 z-10 pb-space-xs">
<div class="flex items-center gap-1.5 text-secondary font-label-sm text-label-sm uppercase tracking-[0.15em] font-semibold">
<span class="material-symbols-outlined text-xs">calendar_today</span>
<span>{{ $eventDateFormatted }}</span>
<span class="text-[8px] opacity-60">•</span>
<span class="truncate">The St. Regis Grand Ballroom, Jakarta</span>
</div>
<p class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-on-surface-variant/70 mt-1">
      #VerdantRoyaleXVII • RSVP Strictly Required
    </p>
</footer>
<!-- Micro Interaction Toast Confirmation Trigger -->
<div class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-inverse-surface text-inverse-on-surface px-5 py-2.5 rounded-full shadow-2xl transition-all duration-500 opacity-0 pointer-events-none translate-y-4 z-50 flex items-center gap-2" id="envelopeModalToast">
<span class="material-symbols-outlined text-secondary-fixed text-sm">mark_email_read</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-inverse-on-surface">Membuka Segel Royal...</span>
</div>
<script>
    const openBtn = document.getElementById('openInviteBtn');
    const toast = document.getElementById('envelopeModalToast');
    
    if (openBtn && toast) {
      openBtn.addEventListener('click', () => {
        toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
        toast.classList.add('opacity-100', 'translate-y-0');
        
        setTimeout(() => {
          toast.classList.remove('opacity-100', 'translate-y-0');
          toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
        }, 2200);
      });
    }
  </script>
</div></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_12px_rgba(27,59,43,0.06)]"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm min-w-0"><img alt="Forest Moss XVII Seal Logo" class="h-8 w-auto object-contain flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP"/><div class="flex flex-col min-w-0"><span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary truncate">Verdant Royale XVII</span><h1 class="font-headline-sm text-headline-sm text-primary leading-tight truncate" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-sm flex-shrink-0"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Background Music" class="w-11 h-11 rounded-full flex items-center justify-center text-primary hover:bg-surface-variant/40 transition-all cursor-pointer"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 flex flex-col relative w-full pt-16 pb-20 bg-surface"><div class="flex flex-col w-full">
<!-- Interactive Toast Notification -->
<div class="fixed top-20 left-1/2 -translate-x-1/2 z-50 pointer-events-none transition-all duration-300 opacity-0 transform -translate-y-2 flex items-center gap-space-sm bg-primary text-on-primary px-space-md py-space-sm rounded-xl shadow-xl" id="toastNotification">
<span class="material-symbols-outlined text-[18px] text-secondary-fixed">check_circle</span>
<span class="font-label-md text-label-md tracking-wider uppercase" id="toastText">Teks Berhasil Disalin</span>
</div>
<div class="max-w-[480px] mx-auto w-full px-gutter-mobile flex flex-col gap-space-xl pb-16">
<!-- 1. Top Section & Hero Portrait -->
<section class="flex flex-col items-center text-center pt-space-lg">
<!-- Luxury Badge -->
<div class="inline-flex items-center gap-2 px-space-md py-1 bg-surface-container rounded-full shadow-sm mb-space-md">
<span class="material-symbols-outlined text-[14px] text-secondary">flare</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-semibold">The Debutante • Royal XVII Conservatory Gala</span>
<span class="material-symbols-outlined text-[14px] text-secondary">flare</span>
</div>
<!-- Cathedral Arch Frame holding Haute Couture Portrait -->
<div class="relative w-full aspect-[3/4] max-w-[360px] mx-auto p-2 bg-surface-container-low rounded-t-[180px] rounded-b-xl shadow-xl flex flex-col">
<div class="relative w-full h-full rounded-t-[172px] rounded-b-lg overflow-hidden bg-primary-container">
<img alt="Charlotte Vivienne in Forest Moss debutante gown" class="w-full h-full object-cover object-top transition-transform duration-700 hover:scale-105" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
<!-- Bottom Arch Caption -->
<div class="absolute bottom-3 left-3 right-3 text-center px-2 py-1.5 bg-primary/70 backdrop-blur-md rounded-lg">
<p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed">
              Verdant Royale XVII • Charlotte Vivienne
            </p>
<p class="font-label-sm text-[9px] text-primary-fixed tracking-widest uppercase">
              Bespoke Forest Moss Organza
            </p>
</div>
</div>
</div>
<!-- Debutante Announcement Typography -->
<div class="mt-space-lg flex flex-col items-center gap-space-xs">
<span class="font-label-md text-label-md uppercase tracking-[0.25em] text-secondary">Celebrating 17 Golden Blossoms</span>
<h2 class="font-display-hero-mobile text-display-hero-mobile text-primary tracking-wide">Charlotte Vivienne</h2>
<div class="w-16 h-0.5 bg-secondary-fixed-dim my-2"></div>
<p class="font-body-md text-body-md italic text-on-surface-variant max-w-sm px-4">
          “Like sunlight filtering through ancient pines, seventeen begins with grace, purpose, and everlasting memories.”
        </p>
</div>
</section>
<!-- 2. Personal VIP Guest Greeting -->
<section class="bg-surface-container-low p-space-lg rounded-xl shadow-md flex flex-col items-center text-center relative overflow-hidden">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center mb-space-sm text-secondary">
<span class="material-symbols-outlined text-[24px]">workspace_premium</span>
</div>
<span class="font-label-sm text-label-sm tracking-widest uppercase text-secondary">Kepada Yth. <span id="previewGuestNameMain">{{ $guestName }}</span></span>
<h3 class="font-headline-sm text-headline-sm text-primary mt-1" id="previewGuestNameMain">{{ $guestName }}</h3>
<div class="mt-space-sm inline-flex items-center gap-1.5 px-3 py-1 bg-surface rounded-full shadow-sm">
<span class="material-symbols-outlined text-[14px] text-primary">chair</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Meja Reservasi: Emerald Conservatory VIP A-07 (2 Tamu)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-md leading-relaxed">
        Merupakan kehormatan dan sukacita mendalam bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir membagikan doa restu serta merayakan malam peralihan usia ketujuh belas putri kami tercinta.
      </p>
</section>
<!-- 3. Event Schedule & Live Countdown -->
<section class="flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Waktu &amp; Tempat Perhelatan</span>
<h3 class="font-headline-sm text-headline-sm text-primary">{{ $couple->events->first()->title ?? "Agenda Malam Resepsi" }}</h3>
</div>
<!-- Date Banner Card -->
<div class="bg-surface-container-low p-space-md rounded-xl shadow-sm text-center flex flex-col gap-1">
<p class="font-headline-sm text-headline-sm text-primary">{{ $eventDateFormatted }}</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">18.30 WIB - Selesai <span class="text-secondary font-semibold">(Pintu Ballroom dibuka 18.00 WIB)</span></p>
</div>
<!-- Live Countdown Grid -->
<div class="grid grid-cols-4 gap-2">
<div class="bg-surface-container p-2.5 rounded-lg text-center shadow-sm">
<span class="font-display-hero-mobile text-[26px] leading-tight text-primary block" id="cd-days">38</span>
<span class="font-label-sm text-[9px] uppercase tracking-wider text-on-surface-variant block mt-1">Hari</span>
</div>
<div class="bg-surface-container p-2.5 rounded-lg text-center shadow-sm">
<span class="font-display-hero-mobile text-[26px] leading-tight text-primary block" id="cd-hours">14</span>
<span class="font-label-sm text-[9px] uppercase tracking-wider text-on-surface-variant block mt-1">Jam</span>
</div>
<div class="bg-surface-container p-2.5 rounded-lg text-center shadow-sm">
<span class="font-display-hero-mobile text-[26px] leading-tight text-primary block" id="cd-minutes">25</span>
<span class="font-label-sm text-[9px] uppercase tracking-wider text-on-surface-variant block mt-1">Menit</span>
</div>
<div class="bg-surface-container p-2.5 rounded-lg text-center shadow-sm">
<span class="font-display-hero-mobile text-[26px] leading-tight text-primary block" id="cd-seconds">40</span>
<span class="font-label-sm text-[9px] uppercase tracking-wider text-on-surface-variant block mt-1">Detik</span>
</div>
</div>
<!-- Google Calendar Action -->
<a class="w-full flex items-center justify-center gap-2 py-3 px-space-md bg-surface-container hover:bg-surface-container-high rounded-xl text-primary font-label-md text-label-md tracking-wider uppercase transition-colors shadow-sm" href="https://calendar.google.com" rel="noopener" target="_blank">
<span class="material-symbols-outlined text-[18px] text-secondary">event</span>
        Simpan ke Google Calendar
      </a>
<!-- Rundown Acara Utama -->
<div class="flex flex-col gap-space-sm mt-space-sm">
<span class="font-label-md text-label-md uppercase tracking-wider text-primary font-semibold px-1">Rundown Acara Utama</span>
<div class="space-y-3" id="itineraryContainer">
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
    @endphp
    <div class="flex items-start gap-space-md p-space-md bg-surface-container-low rounded-xl shadow-sm event-itinerary-item">
        <div class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center flex-shrink-0 font-headline-sm text-[16px]">
            {{ sprintf("%02d", $index + 1) }}
        </div>
        <div class="flex flex-col min-w-0 flex-1">
            <span class="font-label-sm text-label-sm text-secondary font-semibold">{{ $evTimeStr }}</span>
            <h4 class="font-headline-sm text-[18px] text-primary leading-tight font-bold">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[11px] text-primary block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold">
                    <span class="material-symbols-outlined text-[13px]">location_on</span>
                    <span>Buka Google Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</div>
</section>
<!-- 4. Theme & Dress Code Guide -->
<section class="bg-surface-container-low p-space-lg rounded-xl shadow-md flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Panduan Nuansa Acara</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Tema &amp; Tata Busana</h3>
<p class="font-body-sm text-body-sm italic text-on-surface-variant mt-1">Verdant Royale: A Timeless Evening of Forest Elegance &amp; Gold Glamour</p>
</div>
<!-- Color Swatches -->
<div class="flex flex-col gap-2 items-center">
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant">Rekomendasi Palet Warna:</span>
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full shadow-inner bg-primary" title="Forest Moss"></div>
<div class="w-8 h-8 rounded-full shadow-inner bg-surface-tint" title="Emerald Green"></div>
<div class="w-8 h-8 rounded-full shadow-inner bg-secondary" title="Antique Gold"></div>
<div class="w-8 h-8 rounded-full shadow-inner bg-secondary-fixed" title="Champagne"></div>
<div class="w-8 h-8 rounded-full shadow-inner bg-inverse-surface" title="Midnight Onyx"></div>
</div>
</div>
<!-- Guest Category Guidelines -->
<div class="flex flex-col gap-space-sm pt-2">
<div class="p-space-md bg-surface rounded-xl shadow-sm">
<div class="flex items-center gap-2 text-primary mb-1">
<span class="material-symbols-outlined text-[20px] text-secondary">male</span>
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Tamu Pria (Gentlemen)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Formal Tuxedo / Dark Suit atau Batik Tulis Sutra Eksklusif bernuansa Forest Green / Gold / Hitam Elegan.
          </p>
</div>
<div class="p-space-md bg-surface rounded-xl shadow-sm">
<div class="flex items-center gap-2 text-primary mb-1">
<span class="material-symbols-outlined text-[20px] text-secondary">female</span>
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Tamu Wanita (Ladies)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Glamorous Haute Couture Evening Gown atau Chic Cocktail Dress nuansa Emerald, Sage, Forest Green, Champagne Gold, atau Bronze.
          </p>
<div class="mt-2 text-[12px] font-body-sm text-error bg-error-container/30 px-2 py-1 rounded inline-block">
            * Mohon berkenan menghindari gaun bernuansa putih polos.
          </div>
</div>
</div>
</section>
<!-- 5. Her Journey to 17 (Galeri Foto) -->
<section class="flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Kenangan &amp; Rekam Jejak</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Her Journey to 17</h3>
</div>
<div class="flex flex-col gap-space-md">
<!-- Main Portrait Card -->
<div class="relative rounded-xl overflow-hidden shadow-lg aspect-[4/5] bg-primary-container">
<img alt="Chapter XVII debutante portrait" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex flex-col justify-end p-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed">Feature Chapter</span>
<h4 class="font-headline-sm text-headline-sm text-on-primary">Chapter XVII • The Conservatory Ball</h4>
</div>
</div>
<!-- 2 Secondary Cards -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-sm">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container-low rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant/30">
    <div class="w-full aspect-[4/5] bg-surface-container overflow-hidden">
      <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-space-xs flex flex-col">
        <span class="font-label-sm text-[11px] font-semibold text-primary block truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 6. Venue Location & Map -->
<section class="bg-surface-container-low p-space-lg rounded-xl shadow-md flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Lokasi Acara</span>
<h3 class="font-headline-sm text-headline-sm text-primary">The St. Regis Grand Ballroom</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">
          Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan
        </p>
</div>
<!-- Map Container -->
<div class="w-full h-56 bg-cover bg-center rounded-xl shadow-sm relative overflow-hidden" data-location="The St. Regis Jakarta" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAZ9BRzpp9DDMYypjS8BjL380szxlpU2j5k4nBTqXVjhpIIfHmHSp1EC-U2Vg4ZSDGjENRTiWggsrYTUY0AGo9jSsFPmYq_HdRvda141xJmC83Dm0ClvnierINAg73P3NzEd5jGYiEfHV8iQy06u0JPakPIJvc-fsCaARWZ4gNGMicV4K1fKT1z7clHhbBHq1vQSOF7XpJe1PhEBgwyOAejhJML5KNvxhA5-LqWv8hM')">
<div class="absolute bottom-2 left-2 right-2 bg-surface/90 backdrop-blur-md p-2 rounded-lg flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary">local_parking</span>
<span class="font-label-sm text-[10px] text-primary uppercase font-semibold">VIP Valet Parking &amp; Drop-off Lobby Utama Tersedia</span>
</div>
</div>
<!-- Location Actions -->
<div class="grid grid-cols-2 gap-space-sm">
<a id="previewMapsLinkMain" class="py-2.5 px-space-sm bg-primary text-on-primary rounded-xl font-label-md text-label-md uppercase tracking-wider text-center flex items-center justify-center gap-1.5 shadow-sm" href="{{ $mapsUrl }}" rel="noopener" target="_blank">
<span class="material-symbols-outlined text-[18px]">near_me</span>
          Buka Maps
        </a>
<button class="py-2.5 px-space-sm bg-surface-container hover:bg-surface-container-high text-primary rounded-xl font-label-md text-label-md uppercase tracking-wider text-center flex items-center justify-center gap-1.5 shadow-sm transition-colors" onclick="navigator.clipboard.writeText('{{ addslashes($venueAddress) }}'); showToast('Alamat Berhasil Disalin');" type="button">
<span class="material-symbols-outlined text-[18px] text-secondary">content_copy</span>
          Salin Alamat
        </button>
</div>
</section>
<!-- 7. RSVP Form (Konfirmasi Kehadiran) -->
<section class="bg-surface-container-low p-space-lg rounded-xl shadow-md flex flex-col gap-space-md" id="rsvp-section">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Konfirmasi Kehadiran</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Reservasi Kursi VIP</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">
          Mohon berkenan mengonfirmasi kehadiran sebelum tanggal <span class="text-primary font-semibold">15 November 2025</span> untuk reservasi banquet dinner eksklusif.
        </p>
</div>
<form class="flex flex-col gap-space-md" id="rsvpForm" onsubmit="event.preventDefault(); submitRSVP();">
<!-- Nama Lengkap Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Nama Lengkap Tamu</label>
<input class="bg-surface px-space-md py-2.5 rounded-lg text-on-surface font-body-md text-body-md focus:outline-none focus:ring-0 focus:bg-surface-container shadow-sm" id="guestNameInput" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Jumlah Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Jumlah Tamu</label>
<div class="relative">
<select class="w-full bg-surface px-space-md py-2.5 rounded-lg text-on-surface font-body-md text-body-md focus:outline-none appearance-none shadow-sm pr-10">
<option value="2">2 Orang ({{ $guestName }})</option>
<option value="1">1 Orang (Hadir Sendiri)</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<!-- Attendance Radio Buttons -->
<div class="flex flex-col gap-2">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Pilihan Kehadiran</label>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center gap-2 p-3 bg-surface rounded-lg cursor-pointer shadow-sm hover:bg-surface-container transition-colors">
<input checked="" class="accent-primary w-4 h-4" name="attendance" type="radio" value="hadir"/>
<span class="font-label-sm text-label-sm uppercase text-primary font-semibold">Ya, Pasti Hadir</span>
</label>
<label class="flex items-center gap-2 p-3 bg-surface rounded-lg cursor-pointer shadow-sm hover:bg-surface-container transition-colors">
<input class="accent-primary w-4 h-4" name="attendance" type="radio" value="absen"/>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Berhalangan</span>
</label>
</div>
</div>
<!-- Ucapan & Doa Restu Textarea -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Untaian Doa &amp; Harapan</label>
<textarea class="bg-surface px-space-md py-2.5 rounded-lg text-on-surface font-body-md text-body-md focus:outline-none shadow-sm resize-none" id="guestWishInput" placeholder="Tuliskan pesan doa dan harapan untuk Charlotte..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full py-3.5 px-space-md bg-primary hover:bg-primary-container text-on-primary rounded-xl font-label-md text-label-md tracking-wider uppercase transition-colors shadow-md flex items-center justify-center gap-2" type="submit">
<span class="material-symbols-outlined text-[18px] text-secondary-fixed">mail</span>
          Kirim Konfirmasi &amp; Doa Restu
        </button>
</form>
</section>
<!-- 8. Untaian Doa & Harapan (Buku Tamu Digital) -->
<section class="flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Buku Tamu Digital</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Untaian Doa &amp; Harapan</h3>
</div>
<div class="flex flex-col gap-space-sm" id="wishesContainer">
<!-- Wish Card 1 -->
<div class="bg-surface-container-low p-space-md rounded-xl shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold text-primary">Grace &amp; Alexander Tan</span>
<span class="font-label-sm text-[10px] text-secondary">1 jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm italic text-on-surface-variant">
            “Happy Sweet Seventeen, dearest Charlotte! Semoga langkahmu selalu diberkati dengan kedamaian, kecerdasan, dan kebahagiaan tak berujung. Sampai jumpa di malam debutante!”
          </p>
</div>
<!-- Wish Card 2 -->
<div class="bg-surface-container-low p-space-md rounded-xl shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold text-primary">Keluarga Besar Winardi</span>
<span class="font-label-sm text-[10px] text-secondary">3 jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm italic text-on-surface-variant">
            “Selamat menginjak usia 17 tahun untuk putri tercinta Charlotte Vivienne. Tumbuhlah senantiasa menjadi terang dan kebanggaan keluarga tercinta.”
          </p>
</div>
<!-- Wish Card 3 -->
<div class="bg-surface-container-low p-space-md rounded-xl shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold text-primary">Nadia &amp; Christopher</span>
<span class="font-label-sm text-[10px] text-secondary">5 jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm italic text-on-surface-variant">
            “A true royal beauty! Can't wait to celebrate your magical night, Charlotte. You look so stunning in that forest moss dress!”
          </p>
</div>
</div>
</section>
<!-- 9. Digital Gift Registry (Tanda Kasih Digital) -->
<section class="bg-surface-container-low p-space-lg rounded-xl shadow-md flex flex-col gap-space-md">
<div class="text-center">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Tanda Kasih Digital</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Digital Gift Registry</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">
          Kehadiran dan doa restu Anda adalah anugerah terindah bagi kami. Namun apabila berkehendak memberikan tanda kasih, dapat disalurkan melalui:
        </p>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Bank 1 Card -->
<div class="p-space-md bg-surface rounded-xl shadow-sm flex items-center justify-between gap-space-sm mb-3">
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">{{ $bankName1 }}</span>
<span class="font-headline-sm text-[20px] text-primary tracking-wide">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="flex-shrink-0 bg-secondary text-on-secondary px-3.5 py-1.5 rounded-lg text-label-sm uppercase tracking-wider font-semibold hover:opacity-90 active:scale-95 transition-all shadow-sm" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="p-space-md bg-surface rounded-xl shadow-sm flex items-center justify-between gap-space-sm">
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">{{ $bankName2 }}</span>
<span class="font-headline-sm text-[20px] text-primary tracking-wide">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="flex-shrink-0 bg-secondary text-on-secondary px-3.5 py-1.5 rounded-lg text-label-sm uppercase tracking-wider font-semibold hover:opacity-90 active:scale-95 transition-all shadow-sm" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- 10. Closing & Signature -->
<section class="flex flex-col items-center text-center pt-space-md pb-space-lg gap-space-sm">
<!-- Wax Seal Emblem -->
<div class="w-20 h-20 rounded-full overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
<img alt="Forest Moss XVII Wax Seal Monogram" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP"/>
</div>
<p class="font-body-md text-body-md italic text-on-surface-variant max-w-sm mt-space-sm px-4">
        “Tiada ungkapan yang lebih tulus selain rasa syukur mendalam atas kehadiran, kasih, dan doa restu yang Anda curahkan untuk mengiringi langkah putri kami tercinta.”
      </p>
<div class="flex flex-col items-center gap-0.5 mt-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Salam Hangat &amp; Sukacita,</span>
<h4 class="font-headline-sm text-headline-sm text-primary">Charlotte Vivienne &amp; Keluarga Besar</h4>
<span class="font-label-sm text-[10px] uppercase tracking-widest text-on-surface-variant mt-1">Verdant Royale XVII • Jakarta, 2025</span>
</div>
</section>
</div>
</div>
<script>
  function showToast(message) {
    var toast = document.getElementById('toastNotification');
    var toastText = document.getElementById('toastText');
    if (!toast || !toastText) return;
    toastText.textContent = message;
    toast.classList.remove('opacity-0', '-translate-y-2');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(function() {
      toast.classList.remove('opacity-100', 'translate-y-0');
      toast.classList.add('opacity-0', '-translate-y-2');
    }, 2500);
  }

  function submitRSVP() {
    var nameInput = document.getElementById('guestNameInput');
    var wishInput = document.getElementById('guestWishInput');
    var wishesContainer = document.getElementById('wishesContainer');
    
    var guestName = nameInput ? nameInput.value.trim() : 'Tamu Kehormatan';
    var guestWish = wishInput ? wishInput.value.trim() : '';

    if (guestWish && wishesContainer) {
      var newCard = document.createElement('div');
      newCard.className = 'bg-surface-container-low p-space-md rounded-xl shadow-sm flex flex-col gap-1 transition-all duration-500 transform translate-y-2 opacity-0';
      newCard.innerHTML = '<div class="flex items-center justify-between">' +
        '<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold text-primary">' + escapeHtml(guestName) + '</span>' +
        '<span class="font-label-sm text-[10px] text-secondary">Baru saja</span>' +
        '</div>' +
        '<p class="font-body-sm text-body-sm italic text-on-surface-variant">&ldquo;' + escapeHtml(guestWish) + '&rdquo;</p>';
      
      wishesContainer.insertBefore(newCard, wishesContainer.firstChild);
      setTimeout(function() {
        newCard.classList.remove('translate-y-2', 'opacity-0');
      }, 50);
      wishInput.value = '';
    }

    showToast('Konfirmasi Berhasil Dikirimkan');
  }

  function escapeHtml(string) {
    return String(string).replace(/[&<>"']/g, function(s) {
      return ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
      })[s];
    });
  }

  // Live countdown ticker simulation
  (function() {
    var sVal = 40;
    var secElem = document.getElementById('cd-seconds');
    if (secElem) {
      setInterval(function() {
        sVal--;
        if (sVal < 0) sVal = 59;
        secElem.textContent = (sVal < 10 ? '0' : '') + sVal;
      }, 1000);
    }
  })();
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-4px_24px_rgba(27,59,43,0.08)]" data-active-classes="text-primary font-semibold"><div class="flex justify-around items-center h-20 px-space-xs max-w-md mx-auto"><a aria-current="page" class="flex flex-col items-center justify-center gap-1 w-14 h-14 transition-colors duration-200 text-primary font-semibold" data-path="undangan-utama" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Undangan</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors duration-200" data-path="agenda" href="#"><span class="material-symbols-outlined text-[22px]">calendar_today</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Agenda</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors duration-200" data-path="galeri" href="#"><span class="material-symbols-outlined text-[22px]">photo_library</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Galeri</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors duration-200" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-sm text-label-sm uppercase tracking-wider">RSVP</span></a><a class="flex flex-col items-center justify-center gap-1 w-14 h-14 text-on-surface-variant transition-colors duration-200" data-path="hadiah" href="#"><span class="material-symbols-outlined text-[22px]">featured_seasonal_and_gifts</span><span class="font-label-sm text-label-sm uppercase tracking-wider">Hadiah</span></a></div></nav>
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
            container.innerHTML = events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.00 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Google Maps</span></a>` : "";
                const idxStr = String(i + 1).padStart(2, "0");
                return `
                    <div class="flex items-start gap-space-md p-space-md bg-surface-container-low rounded-xl shadow-sm event-itinerary-item">
                        <div class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center flex-shrink-0 font-headline-sm text-[16px]">
                            ${idxStr}
                        </div>
                        <div class="flex flex-col min-w-0 flex-1">
                            <span class="font-label-sm text-label-sm text-secondary font-semibold">${timeStr}</span>
                            <h4 class="font-headline-sm text-[18px] text-primary leading-tight font-bold">${title}</h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[11px] text-primary block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'forest-moss-seventeen' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>