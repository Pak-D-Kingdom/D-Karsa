<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Celeste Royale XVII') . ' - ' . ($couple->groom_name ?? 'Seraphina Claire Bleu') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Seraphina Claire Bleu' }} - Sweet Seventeen - Elegan Klasik Baby Blue."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "surface-bright": "#f8f9ff", "secondary-container": "#f2deaa", "outline-variant": "#c2c7d0", "on-primary-fixed": "#001d35", "on-primary-container": "#91bbeb", "surface-variant": "#d4e4fa", "surface-container": "#e5efff", "surface-dim": "#ccdbf2", "surface": "#f8f9ff", "on-error": "#ffffff", "primary-container": "#1c4b75", "error-container": "#ffdad6", "on-tertiary": "#ffffff", "on-surface": "#0d1c2d", "on-tertiary-fixed": "#001d32", "primary-fixed": "#d0e4ff", "inverse-on-surface": "#e9f1ff", "on-error-container": "#93000a", "secondary-fixed-dim": "#d8c593", "on-primary-fixed-variant": "#1a4973", "surface-container-highest": "#d4e4fa", "on-background": "#0d1c2d", "tertiary-container": "#034c77", "surface-container-lowest": "#ffffff", "inverse-surface": "#233143", "secondary": "#6b5d34", "on-secondary-fixed-variant": "#52461f", "primary": "#00345a", "outline": "#72777f", "tertiary-fixed": "#cde5ff", "surface-container-low": "#eef4ff", "on-primary": "#ffffff", "on-secondary": "#ffffff", "on-secondary-fixed": "#231b00", "surface-tint": "#36618c", "primary-fixed-dim": "#a0cafb", "surface-container-high": "#dbe9ff", "on-tertiary-container": "#88bced", "tertiary-fixed-dim": "#97ccfd", "tertiary": "#003555", "inverse-primary": "#a0cafb", "on-surface-variant": "#42474e", "on-tertiary-fixed-variant": "#004a75", "secondary-fixed": "#f5e1ad", "background": "#f8f9ff", "error": "#ba1a1a", "on-secondary-container": "#706138" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-xl": "4rem", "margin": "3rem", "space-sm": "0.75rem", "space-md": "1.5rem", "gutter": "1.5rem", "space-xs": "0.375rem", "margin-sm": "1.25rem", "space-lg": "2.5rem", "gutter-sm": "1rem" }, "fontFamily": { "display-lg-mobile": ["Playfair Display"], "headline-sm": ["Playfair Display"], "body-sm": ["Manrope"], "label-md": ["Manrope"], "body-lg": ["Manrope"], "headline-lg": ["Playfair Display"], "body-md": ["Manrope"], "display-lg": ["Playfair Display"], "headline-md": ["Playfair Display"], "title-md": ["Manrope"], "headline-lg-mobile": ["Playfair Display"], "label-lg": ["Playfair Display"] }, "fontSize": { "display-lg-mobile": ["38px", { "lineHeight": "48px", "letterSpacing": "0.03em", "fontWeight": "400" }], "headline-sm": ["20px", { "lineHeight": "28px", "letterSpacing": "0.02em", "fontWeight": "500" }], "body-sm": ["13px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "400" }], "label-md": ["11px", { "lineHeight": "16px", "letterSpacing": "0.15em", "fontWeight": "600" }], "body-lg": ["17px", { "lineHeight": "28px", "letterSpacing": "0.01em", "fontWeight": "300" }], "headline-lg": ["40px", { "lineHeight": "52px", "letterSpacing": "0.02em", "fontWeight": "400" }], "body-md": ["15px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "300" }], "display-lg": ["56px", { "lineHeight": "68px", "letterSpacing": "0.04em", "fontWeight": "400" }], "headline-md": ["26px", { "lineHeight": "36px", "letterSpacing": "0.01em", "fontWeight": "400" }], "title-md": ["16px", { "lineHeight": "24px", "letterSpacing": "0.08em", "fontWeight": "600" }], "headline-lg-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "0.02em", "fontWeight": "400" }], "label-lg": ["13px", { "lineHeight": "18px", "letterSpacing": "0.18em", "fontWeight": "600" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Seraphina Claire Bleu';
        $celebrantNick = $couple->groom_nickname ?? 'Seraphina';
        $heading = $couple->event_heading ?? 'Celeste Royale XVII';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet seventeen';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'The Debutante Ball & Classical Waltz',
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
        $quote = $couple->quote ?? 'Under the moonlit sapphire sky, a fairytale chapter unfolds at seventeen.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDPhs8ea_XcpCjmN1tXAccX80RBIaLcOfGe86RUqT8nfytEPgmwnHFrI5hC2NSp8AJWR1wu7-xwDSifO9ff_jHCkoSOCEwg8bv6UNk4v0_lqDfwO5qpfcNIbG-scENJQaZBa2Sygsj0Tkyd8M0TNtLdKf1qLOMxA-P-hsc9aUnC7VytH2ho1Lj-hVhWqxiicAn9jXQpOSomxhgXZJkGkMN1Cybsgv0938KiOCkTZQUT';
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

        $venueName = $couple->venue_name ?? 'The Carlton Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Jl. M.H. Thamrin No. 1, Menteng, Jakarta Pusat';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDPhs8ea_XcpCjmN1tXAccX80RBIaLcOfGe86RUqT8nfytEPgmwnHFrI5hC2NSp8AJWR1wu7-xwDSifO9ff_jHCkoSOCEwg8bv6UNk4v0_lqDfwO5qpfcNIbG-scENJQaZBa2Sygsj0Tkyd8M0TNtLdKf1qLOMxA-P-hsc9aUnC7VytH2ho1Lj-hVhWqxiicAn9jXQpOSomxhgXZJkGkMN1Cybsgv0938KiOCkTZQUT', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrrFpr1ImnmS34EUQfMFd2Q8khyGwHENDV80wMSjPukMbafd_h7YwxvrsHbiS9P9b68ma1gIl2LEmc_pXkvBTJqbJeyzHAZnaVMGMZeRfAQktlBp6XgKa_jhZj1xxFEIdN8PKy13ZV8IbkWa1X72N8ZqJAerWD-cz5ZAurQZDdbVRmlsjGcJbfESjpuIaFU5RilILrVRZZVAIY0Bnh91FobAgImbTk2UUtXLgO3MtN', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 flex flex-col relative w-full min-h-full bg-surface pb-8"><div class="flex flex-col justify-between w-full min-h-full relative px-4 py-3 selection:bg-secondary-container selection:text-on-secondary-container"><!-- Classical Ambient Glowing Background Layers --><div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden"><div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 rounded-full bg-surface-variant/40 blur-3xl"></div><div class="absolute top-1/3 -left-20 w-80 h-80 rounded-full bg-secondary-container/20 blur-3xl"></div><div class="absolute bottom-10 -right-20 w-96 h-96 rounded-full bg-surface-dim/40 blur-3xl"></div><!-- Fine Filigree Stars Vector Layer --><svg class="absolute inset-0 w-full h-full opacity-35 text-secondary" xmlns="http://www.w3.org/2000/svg"><defs><pattern height="80" id="celeste-stars" patternUnits="userSpaceOnUse" width="80"><circle cx="12" cy="18" fill="currentColor" opacity="0.6" r="0.75"></circle><circle cx="68" cy="32" fill="currentColor" opacity="0.8" r="1.1"></circle><path d="M40 38 L41 40 L43 41 L41 42 L40 44 L39 42 L37 41 L39 40 Z" fill="currentColor" opacity="0.75"></path><circle cx="28" cy="68" fill="currentColor" opacity="0.5" r="0.8"></circle><circle cx="64" cy="72" fill="currentColor" opacity="0.4" r="0.6"></circle></pattern></defs><rect fill="url(#celeste-stars)" height="100%" width="100%"></rect></svg></div><!-- Classical Regency Header Crest & Title --><header class="flex flex-col items-center text-center mt-1 mb-1 space-y-1.5"><!-- Top Royal Filigree Ribbon --><div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container shadow-sm"><span class="material-symbols-outlined text-secondary" style="font-size: 13px;">diamond</span><span class="font-label-md text-xs tracking-widest uppercase text-secondary">CELESTE ROYALE XVII • A CELEBRATION OF SEVENTEEN RADIANT DREAMS</span><span class="material-symbols-outlined text-secondary" style="font-size: 13px;">diamond</span></div><div class="flex items-center justify-center gap-2 w-full max-w-xs"><div class="h-px flex-1 bg-gradient-to-r from-transparent via-secondary/40 to-transparent"></div><span class="text-secondary/70 text-sm italic">⚜</span><div class="h-px flex-1 bg-gradient-to-l from-transparent via-secondary/40 to-transparent"></div></div></header><!-- Physical Wax Seal Focal Anchor --><div class="flex flex-col items-center justify-center relative my-1"><!-- Radiant Halo Backlight --><div class="absolute w-28 h-28 rounded-full bg-secondary-container/50 blur-xl -z-10 animate-pulse"></div><div class="relative p-1.5 rounded-full bg-surface-container shadow-lg"><div class="p-0.5 rounded-full bg-secondary-fixed"><img alt="Celeste Royale XVII Royal Wax Seal Monogram" class="w-16 h-16 object-contain rounded-full shadow-md transition-transform duration-500 hover:scale-105" src="{{ $coverImg }}" id="previewCoverPhotoImg"></div></div><div class="mt-1 text-center"><span class="font-label-md text-xs tracking-widest uppercase text-secondary block">HONNEUR ET GRÂCE</span></div></div><!-- Debutante Hero Nomenclature --><section class="text-center my-1 px-2 space-y-1"><p class="font-label-md text-xs tracking-[0.2em] text-on-surface-variant uppercase">THE SWEET SEVENTEEN BALL OF</p><h1 class="font-display-lg-mobile text-headline-md text-primary tracking-wide leading-tight" id="previewGroomNameCover">{{ $celebrantName }}</h1><div class="max-w-md mx-auto"><p class="font-body-sm text-xs italic text-on-surface-variant px-4">“Under the moonlit sapphire sky, a fairytale chapter unfolds at seventeen.”</p></div></section><!-- Physical Invitation Envelope Card Illusion --><div class="w-full max-w-md mx-auto relative rounded-xl shadow-lg bg-surface-container-lowest p-3.5 my-1 space-y-2.5"><!-- Dual Concentric Arch Head Motif --><div class="flex flex-col items-center"><div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container shadow-sm mb-1"><span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">stars</span><span class="font-label-md text-xs tracking-wider font-semibold">VIP INVITATION • EXCLUSIVE ACCESS</span></div><div class="w-8 h-0.5 bg-secondary-container rounded-full"></div></div><!-- Formal Guest Name Card (Indonesian Protocol) --><div class="rounded-lg bg-surface-container-low p-2.5 text-center shadow-inner relative overflow-hidden"><div class="absolute top-1.5 left-2 text-secondary/40 text-xs select-none">❖</div><div class="absolute top-1.5 right-2 text-secondary/40 text-xs select-none">❖</div><div class="absolute bottom-1.5 left-2 text-secondary/40 text-xs select-none">❖</div><div class="absolute bottom-1.5 right-2 text-secondary/40 text-xs select-none">❖</div><p class="font-label-md text-xs text-on-surface-variant tracking-wider uppercase mb-0.5">KEPADA YTH. BAPAK / IBU / SAUDARA/I :</p><div><h2 class="font-headline-sm text-lg text-primary tracking-wide" id="previewGuestNameCover">{{ $guestName }}</h2></div><p class="font-body-sm text-xs italic text-on-surface-variant">Di Tempat</p></div><!-- Warm Indonesian Invitation Opening Copy --><div class="px-2 text-center"><p class="font-body-sm text-xs text-on-surface leading-normal">Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Bapak/Ibu/Saudara/i untuk turut merayakan momen berharga langkah usia ketujuh belas yang penuh kasih dan sukacita.</p></div><!-- Interactive Section: Primary CTA + Music State --><div class="pt-1 flex flex-col items-center gap-2"><!-- Primary Open Button --><button class="w-full py-2.5 px-5 rounded-full bg-primary-container text-on-primary font-title-md text-sm tracking-wider uppercase shadow-md shadow-primary-container/25 hover:bg-tertiary-container active:scale-[0.99] transition-all flex items-center justify-center gap-2 group cursor-pointer" id="open-invitation-btn" type="button" onclick="openInvitation()"><span class="material-symbols-outlined text-base group-hover:rotate-12 transition-transform">mail</span><span class="">Buka Undangan</span><span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span></button><!-- Music Pill Micro-Player --><div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container text-on-surface shadow-sm cursor-pointer hover:bg-surface-variant transition-colors" id="musicPill"><span class="material-symbols-outlined text-secondary text-xs animate-spin" id="musicIcon" style="animation-duration: 4s;">music_note</span><div class="flex items-center gap-1"><span class="w-1 h-2.5 bg-secondary rounded-full animate-pulse"></span><span class="w-1 h-3.5 bg-secondary rounded-full animate-pulse" style="animation-delay: 150ms;"></span><span class="w-1 h-2 bg-secondary rounded-full animate-pulse" style="animation-delay: 300ms;"></span></div><span class="font-label-md text-xs tracking-tight text-on-surface truncate max-w-[190px]">Moonlight Waltz in A Minor - Royal Ball</span></div></div></div><!-- Event Quick Metadata Bar --><footer class="mt-1 mb-1 text-center space-y-1 max-w-sm mx-auto"><div class="flex items-center justify-center gap-1.5 text-secondary"><span class="material-symbols-outlined text-sm">calendar_month</span><span class="font-title-md text-xs tracking-widest uppercase text-primary">{{ strtoupper($eventDateFormatted) }}</span></div><div class="flex items-center justify-center gap-1 text-on-surface-variant px-3"><span class="material-symbols-outlined text-xs">location_on</span><span class="font-body-sm text-xs tracking-wide uppercase">{{ strtoupper($venueName) }}</span></div><div class="flex flex-col items-center gap-0.5"><span class="font-label-md text-xs tracking-widest text-secondary font-medium uppercase">#SeraphinaBleuXVII • RSVP Strictly Required</span><div class="w-12 h-px bg-secondary-fixed-dim/60 mt-0.5"></div></div></footer><!-- Modal Feedback Delight Script --><script>(function() { const openBtn = document.getElementById('open-invitation-btn') || document.getElementById('btnOpenInvitation'); const musicPill = document.getElementById('musicPill'); let isPlaying = true; if (openBtn) { openBtn.addEventListener('click', function() { this.classList.add('scale-95'); setTimeout(() => { this.classList.remove('scale-95'); const alertBanner = document.createElement('div'); alertBanner.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 z-50 bg-primary-container text-on-primary font-body-sm text-body-sm px-5 py-3 rounded-full shadow-2xl flex items-center gap-2 animate-bounce'; alertBanner.innerHTML = '<span class="material-symbols-outlined text-sm text-secondary-container">auto_awesome</span> Membuka lembaran royal Celeste Royale XVII...'; document.body.appendChild(alertBanner); setTimeout(() => alertBanner.remove(), 2600); }, 150); }); } if (musicPill) { musicPill.addEventListener('click', function() { isPlaying = !isPlaying; const bars = this.querySelectorAll('div span'); const icon = document.getElementById('musicIcon'); if (!isPlaying) { bars.forEach(b => b.classList.remove('animate-pulse')); if (icon) icon.classList.remove('animate-spin'); this.classList.add('opacity-75'); } else { bars.forEach(b => b.classList.add('animate-pulse')); if (icon) icon.classList.add('animate-spin'); this.classList.remove('opacity-75'); } }); } })();</script></div></main>


    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(28,75,117,0.06)]"><div class="h-16 px-gutter-sm flex items-center justify-between"><div class="flex items-center gap-space-xs"><img alt="Celeste Royale XVII Royal Wax Seal Monogram" class="h-8 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5"/><div class="flex flex-col"><span class="font-label-lg text-label-lg tracking-[0.2em] text-primary uppercase leading-tight">Celeste Royale</span><span class="font-body-sm text-body-sm text-secondary italic leading-none">Undangan Utama   Celeste Royale</span></div></div><div class="flex items-center gap-space-xs"><button aria-label="Toggle Royal Music" class="w-11 h-11 rounded-full flex items-center justify-center text-primary hover:bg-surface-variant/40 transition-colors" type="button" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shadow-sm"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex flex-col relative w-full pt-16 pb-28 bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- 1. Top Welcome & Debutante Hero Showcase -->
<section class="flex flex-col items-center px-gutter-sm pt-space-md pb-space-lg text-center relative overflow-hidden">
<div class="inline-flex items-center gap-1.5 px-space-sm py-1 rounded-full bg-surface-container-high text-primary shadow-sm mb-space-md">
<span class="text-secondary text-[12px]">👑</span>
<span class="font-label-md text-label-md tracking-[0.2em] uppercase">THE DEBUTANTE • ROYAL XVII SOIREE</span>
</div>
<!-- Classical Arch Frame Hero Image -->
<div class="relative w-full max-w-[340px] mx-auto mb-space-md">
<div class="p-2 rounded-t-[170px] rounded-b-xl bg-gradient-to-b from-secondary-fixed-dim/60 via-surface-container-high to-surface-variant shadow-xl">
<div class="relative w-full aspect-[3/4.2] rounded-t-[162px] rounded-b-lg overflow-hidden bg-surface-container">
<img alt="Seraphina Claire Bleu debutante portrait" class="w-full h-full object-cover object-top" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex flex-col justify-end p-space-md text-left">
<span class="font-label-md text-[10px] text-secondary-fixed tracking-[0.25em] uppercase">Celeste Royale XVII</span>
<p class="font-headline-sm text-headline-sm text-surface font-normal">Seraphina Claire Bleu</p>
</div>
</div>
</div>
<!-- Decorative Corner Pearls -->
<div class="absolute -top-1 -left-1 w-3 h-3 rounded-full bg-secondary-fixed shadow-sm"></div>
<div class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-secondary-fixed shadow-sm"></div>
</div>
<div class="max-w-[380px] mx-auto flex flex-col items-center">
<span class="font-label-lg text-label-lg tracking-[0.25em] text-secondary uppercase mb-1">CELEBRATING 17 SAPPHIRE BLOSSOMS</span>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-primary tracking-wide mb-space-xs font-normal" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant italic max-w-[320px] leading-relaxed">
        “May this seventeenth year be filled with grace, enchanting waltzes, and dreams that touch the stars.”
      </p>
</div>
</section>
<!-- 2. Guest Honor Card (Invitation Salutation) -->
<section class="px-gutter-sm mb-space-lg">
<div class="relative rounded-xl p-space-md bg-surface-container-low shadow-md overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-surface-variant/50 pointer-events-none"></div>
<div class="flex flex-col items-center text-center relative z-10">
<div class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center mb-space-xs shadow-sm">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
<span class="font-label-md text-label-md text-secondary tracking-[0.2em] uppercase mb-1">KEPADA YTH:</span>
<h2 class="font-headline-sm text-headline-sm text-primary font-medium mb-space-xs" id="previewGuestNameCover">
          {{ $guestName }}
        </h2>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed max-w-[340px]">
          Merupakan sukacita mendalam dan kehormatan yang tak terhingga bagi kami sekeluarga apabila Bapak/Ibu/Sahabat berkenan hadir memberikan restu dan doa di malam istimewa perayaan usia ke-17 putri kami tercinta.
        </p>
</div>
</div>
</section>
<!-- 3. Rundown & Countdown Timer -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">RUNDOWN &amp; AGENDAS</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Waktu &amp; Tanggal Acara</h3>
</div>
<!-- Date Card -->
<div class="rounded-xl p-space-md bg-surface-container shadow-sm flex flex-col gap-space-sm text-center items-center">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-[20px]">calendar_today</span>
<span class="font-title-md text-title-md">{{ $eventDateFormatted }}</span>
</div>
<div class="flex items-center gap-1.5 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">schedule</span>
<span class="font-body-sm text-body-sm">{{ $eventTimeFormatted }}</span>
</div>
<p class="font-body-sm text-body-sm text-secondary italic">
        (Pintu Ballroom dibuka pukul 18.00 WIB)
      </p>
</div>
<!-- Live Countdown Display -->
<div class="grid grid-cols-4 gap-2">
<div class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-primary text-on-primary shadow-sm">
<span class="font-headline-sm text-headline-sm font-semibold tracking-normal leading-tight" id="cd-days">48</span>
<span class="font-label-md text-[10px] text-primary-fixed-dim uppercase tracking-widest">HARI</span>
</div>
<div class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-primary text-on-primary shadow-sm">
<span class="font-headline-sm text-headline-sm font-semibold tracking-normal leading-tight" id="cd-hours">14</span>
<span class="font-label-md text-[10px] text-primary-fixed-dim uppercase tracking-widest">JAM</span>
</div>
<div class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-primary text-on-primary shadow-sm">
<span class="font-headline-sm text-headline-sm font-semibold tracking-normal leading-tight" id="cd-minutes">35</span>
<span class="font-label-md text-[10px] text-primary-fixed-dim uppercase tracking-widest">MENIT</span>
</div>
<div class="flex flex-col items-center justify-center p-space-sm rounded-lg bg-primary text-on-primary shadow-sm">
<span class="font-headline-sm text-headline-sm font-semibold tracking-normal leading-tight" id="cd-seconds">20</span>
<span class="font-label-md text-[10px] text-primary-fixed-dim uppercase tracking-widest">DETIK</span>
</div>
</div>
<a class="w-full flex items-center justify-center gap-2 py-3 px-space-md rounded-xl bg-surface-container-high text-primary hover:bg-surface-variant transition-colors shadow-sm text-center" href="https://calendar.google.com" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">event_upcoming</span>
<span class="font-title-md text-[14px]">Simpan ke Google Calendar</span>
</a>
<!-- Rundown Timeline -->
<div class="mt-2 space-y-3" id="itineraryContainer">
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
    <div class="p-3.5 rounded-xl bg-surface-container shadow-sm border border-secondary/20 flex flex-col gap-1.5 text-left event-itinerary-item">
        <div class="flex items-center justify-between">
            <span class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold">SESI {{ $index + 1 }}</span>
            <span class="font-label-md text-xs text-primary font-semibold">{{ $evTimeStr }}</span>
        </div>
        <h4 class="font-headline-sm text-base text-primary font-bold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h4>
        <p class="font-body-sm text-xs text-on-surface-variant">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
        @if(!empty($evDateStr))
            <span class="text-[11px] text-secondary block mt-0.5">📅 {{ $evDateStr }}</span>
        @endif
        @if(!empty($evMaps))
            <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-0.5">
                <span class="material-symbols-outlined text-[13px]">location_on</span>
                <span>Buka Google Maps</span>
            </a>
        @endif
    </div>
@endforeach
</div>
</section>
<!-- 4. Style & Etiquette (Dress Code) -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">STYLE &amp; ETIQUETTE</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Tema &amp; Tata Busana</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[340px] mt-1">
        Celeste Royale: A Fairytale Evening of Classical Waltz &amp; Sapphire Glamour
      </p>
</div>
<!-- Color Swatches -->
<div class="p-space-sm rounded-xl bg-surface-container-low shadow-sm flex flex-col items-center gap-space-xs">
<span class="font-label-md text-[10px] text-secondary uppercase tracking-[0.15em]">Palet Busana Tamu Undangan</span>
<div class="flex items-center justify-center gap-3 py-1">
<div class="flex flex-col items-center gap-1">
<div class="w-7 h-7 rounded-full bg-[#d0e4ff] shadow-inner"></div>
<span class="font-label-md text-[9px] text-on-surface-variant">Baby Blue</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-7 h-7 rounded-full bg-[#eef4ff] shadow-inner"></div>
<span class="font-label-md text-[9px] text-on-surface-variant">Ice Powder</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-7 h-7 rounded-full bg-[#1c4b75] shadow-inner"></div>
<span class="font-label-md text-[9px] text-on-surface-variant">Sapphire</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-7 h-7 rounded-full bg-[#d8c593] shadow-inner"></div>
<span class="font-label-md text-[9px] text-on-surface-variant">Champagne</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-7 h-7 rounded-full bg-[#001d35] shadow-inner"></div>
<span class="font-label-md text-[9px] text-on-surface-variant">Midnight</span>
</div>
</div>
</div>
<!-- Gentleman & Ladies Cards -->
<div class="flex flex-col gap-space-sm">
<div class="rounded-xl p-space-md bg-surface-container shadow-sm flex gap-space-sm items-start">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]">man</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-primary uppercase mb-0.5">TAMU PRIA (GENTLEMEN)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Black Tie / Formal Tuxedo, Dark Navy Suit dengan dasi kupu-kupu atau Batik Sutra Lengan Panjang Eksklusif.
          </p>
</div>
</div>
<div class="rounded-xl p-space-md bg-surface-container shadow-sm flex gap-space-sm items-start">
<div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]">woman</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-secondary uppercase mb-0.5">TAMU WANITA (LADIES)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Grand Evening Ballgown / Glamorous Cocktail Dress bernuansa pastel baby blue, silver mist, champagne, atau midnight royal. <span class="text-error font-medium">(Mohon hindari gaun putih polos)</span>.
          </p>
</div>
</div>
</div>
</section>
<!-- 5. Portrait Lookbook ('Her Journey to 17') -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">PORTRAIT LOOKBOOK</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Her Journey to 17</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[340px]">
        Potret langkah keanggunan, tawa, dan pesona masa mekar Seraphina Claire.
      </p>
</div>
<!-- Featured Photo -->
<div class="rounded-xl overflow-hidden bg-surface-container shadow-md flex flex-col">
<div class="relative w-full aspect-[4/3] bg-surface-variant">
<img alt="Seraphina Claire ballgown pose" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
</div>
<div class="p-space-sm flex items-center justify-between">
<div class="flex flex-col">
<span class="font-title-md text-[14px] text-primary">{{ $couple->events->first()->title ?? 'Chapter XVII • The Debutante Ball' }}</span>
<span class="font-body-sm text-[12px] text-secondary">Grand Viennese Ballroom</span>
</div>
<span class="material-symbols-outlined text-secondary text-[20px]">auto_awesome</span>
</div>
</div>
<!-- Supporting 2-grid photos with detailed image placeholders -->
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
<!-- 6. Venue & Location Map -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">THE VENUE</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Lokasi Perayaan</h3>
</div>
<div class="rounded-xl p-space-md bg-surface-container-low shadow-md flex flex-col gap-space-sm">
<div class="flex items-start gap-space-sm">
<div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]">location_on</span>
</div>
<div class="flex flex-col">
<h4 class="font-title-md text-title-md text-primary leading-snug">{{ $venueName }}</h4>
<span class="font-label-md text-[11px] text-secondary uppercase tracking-wider mb-1">Mega Kuningan, Jakarta Selatan</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed" id="venue-address">
            {{ $venueAddress }}
          </p>
</div>
</div>
<!-- Map Embed Container -->
<div class="w-full h-44 rounded-lg bg-cover bg-center shadow-inner relative overflow-hidden flex items-end p-space-xs" data-location="The Ritz-Carlton Jakarta, Mega Kuningan" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCWHId9aJymZnjmTIbbDD2D8anuth0fBsxeGdqbf_w9vnaeOd1kM7SLYPHxQKSqDf4i28F-1RKs3YbKXsrZvVUO2c-P4Wd2pNRcwNRjudMx2nKAvZxlk4t_dQmhmtJS81fJjfQ8_CCo78AtowXQ_k0wsdXJvy1rJotcLjR3eaYk8k1VhQ6uoJbQ8a94fkelwcmVOhMJAMPoeq9WH4GP3SWEfzrCJnTIs3wLdnZCr8mc')">
<div class="px-2 py-1 rounded bg-surface/90 backdrop-blur-md flex items-center gap-1 shadow-sm">
<span class="material-symbols-outlined text-primary text-[14px]">pin_drop</span>
<span class="font-label-md text-[10px] text-primary font-semibold">Ballroom Level 2</span>
</div>
</div>
<div class="p-space-xs rounded bg-surface-container flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-secondary text-[18px]">local_parking</span>
<span class="font-body-sm text-[12px]">Layanan VIP Valet Parking &amp; Drop-off Lobby Utama tersedia.</span>
</div>
<!-- Actions -->
<div class="grid grid-cols-2 gap-2 pt-1">
<a id="previewMapsLinkMain" class="flex items-center justify-center gap-1.5 py-2.5 px-space-xs rounded-lg bg-primary text-on-primary hover:bg-primary-container transition-colors shadow-sm text-center" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[16px]">directions</span>
<span class="font-title-md text-[13px]">Buka Maps</span>
</a>
<button class="flex items-center justify-center gap-1.5 py-2.5 px-space-xs rounded-lg bg-surface-container-high text-primary hover:bg-surface-variant transition-colors shadow-sm text-center" id="copy-address-btn" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
<span class="font-title-md text-[13px]" id="copy-address-text">Salin Alamat</span>
</button>
</div>
</div>
</section>
<!-- 7. Interactive RSVP Form -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">RESERVATION OF HONOR</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Konfirmasi Kehadiran</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[340px]">
        Mohon konfirmasi kehadiran sebelum tanggal 5 Desember 2025 untuk reservasi banquet dinner.
      </p>
</div>
<form class="rounded-xl p-space-md bg-surface-container shadow-md flex flex-col gap-space-sm" id="rsvp-form" onsubmit="event.preventDefault(); document.getElementById('rsvp-success').classList.remove('hidden'); this.reset();">
<!-- Full Name -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-[11px] text-secondary uppercase tracking-wider" for="rsvp-name">Nama Lengkap Tamu</label>
<input class="w-full px-3 py-2.5 rounded-lg bg-surface text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary shadow-sm" id="rsvp-name" placeholder="Nama Anda" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Guest Count Dropdown -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-[11px] text-secondary uppercase tracking-wider" for="rsvp-guests">Jumlah Tamu</label>
<select class="w-full px-3 py-2.5 rounded-lg bg-surface text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary shadow-sm" id="rsvp-guests">
<option value="2">2 Orang ({{ $guestName }})</option>
<option value="1">1 Orang</option>
<option value="3">3 Orang</option>
</select>
</div>
<!-- Attendance Confirmation Radios -->
<div class="flex flex-col gap-1.5 pt-1">
<span class="font-label-md text-[11px] text-secondary uppercase tracking-wider">Konfirmasi Kehadiran</span>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center gap-2 p-2.5 rounded-lg bg-surface text-on-surface cursor-pointer shadow-sm hover:bg-surface-variant/40 transition-colors">
<input checked="" class="text-primary accent-primary" name="attendance" type="radio" value="hadir"/>
<span class="font-body-sm text-body-sm font-medium">Ya, Pasti Hadir</span>
</label>
<label class="flex items-center gap-2 p-2.5 rounded-lg bg-surface text-on-surface cursor-pointer shadow-sm hover:bg-surface-variant/40 transition-colors">
<input class="text-primary accent-primary" name="attendance" type="radio" value="berhalangan"/>
<span class="font-body-sm text-body-sm">Maaf, Berhalangan</span>
</label>
</div>
</div>
<!-- Prayers & Wishes Field -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-[11px] text-secondary uppercase tracking-wider" for="rsvp-message">Pesan Doa &amp; Ucapan Restu</label>
<textarea class="w-full px-3 py-2.5 rounded-lg bg-surface text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary shadow-sm" id="rsvp-message" placeholder="Tuliskan doa hangat untuk Seraphina..." rows="3"></textarea>
</div>
<button class="mt-1 w-full py-3 px-space-md rounded-xl bg-primary text-on-primary hover:bg-primary-container transition-colors shadow-md flex items-center justify-center gap-2" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
<span class="font-title-md text-[14px]">Kirim Konfirmasi &amp; Doa Restu</span>
</button>
<!-- Feedback Banner -->
<div class="hidden p-space-sm rounded-lg bg-secondary-container text-on-secondary-container text-center font-body-sm text-body-sm shadow-sm" id="rsvp-success">
        ✨ Terima kasih! Konfirmasi dan doa restu Anda telah tercatat dalam buku tamu istimewa kami.
      </div>
</form>
</section>
<!-- 8. Wishes & Blessings (Live Guestbook Feed) -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">WISHES &amp; BLESSINGS</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Untaian Doa &amp; Harapan</h3>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Wish Card 1 -->
<div class="rounded-xl p-space-md bg-surface-container-low shadow-sm flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-title-md text-[12px]">
              V
            </div>
<span class="font-title-md text-[14px] text-primary">Valerie &amp; Family</span>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          “Happy sweet 17th birthday dear Seraphina! May your debutante night be pure magic and may the years ahead sparkle with endless happiness and elegance.”
        </p>
</div>
<!-- Wish Card 2 -->
<div class="rounded-xl p-space-md bg-surface-container-low shadow-sm flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-title-md text-[12px]">
              K
            </div>
<span class="font-title-md text-[14px] text-primary">Keluarga Besar Hartono</span>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          “Selamat melangkah ke usia 17 tahun untuk ananda Seraphina tercinta. Tumbuhlah menjadi pribadi yang bijak, anggun, dan senantiasa menjadi terang bagi sesama.”
        </p>
</div>
<!-- Wish Card 3 -->
<div class="rounded-xl p-space-md bg-surface-container-low shadow-sm flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-variant text-primary flex items-center justify-center font-title-md text-[12px]">
              A
            </div>
<span class="font-title-md text-[14px] text-primary">Audrey &amp; Friends</span>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">Kemarin</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          “Can’t wait to dance the night away with our sapphire princess! Happy 17th gorgeous Seraphina, you deserve all the fairest dreams!”
        </p>
</div>
</div>
</section>
<!-- 9. Love & Token of Appreciation (Digital Gift / Angpau) -->
<section class="px-gutter-sm mb-space-lg flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-md text-label-md tracking-[0.2em] text-secondary uppercase mb-1">LOVE &amp; TOKEN OF APPRECIATION</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Tanda Kasih Digital</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[340px]">
        Doa restu Anda merupakan karunia terindah bagi kami. Namun apabila berkehendak memberikan tanda kasih, dapat disalurkan melalui rekening resmi:
      </p>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Bank 1 Card -->
<div class="rounded-xl p-space-md bg-surface-container shadow-sm flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-title-md text-[14px] text-primary font-bold">{{ $bankName1 }}</span>
<span class="font-label-md text-[10px] px-2 py-0.5 rounded bg-surface-container-high text-secondary uppercase">Rekening Resmi</span>
</div>
<div class="flex items-baseline justify-between">
<div class="flex flex-col">
<span class="font-headline-sm text-[22px] tracking-wider text-primary font-semibold" id="acc-bca">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-high text-primary hover:bg-surface-variant font-title-md text-[12px] shadow-sm transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
            Salin Rekening
          </button>
</div>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="rounded-xl p-space-md bg-surface-container shadow-sm flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-title-md text-[14px] text-primary font-bold">{{ $bankName2 }}</span>
<span class="font-label-md text-[10px] px-2 py-0.5 rounded bg-surface-container-high text-secondary uppercase">Rekening Resmi</span>
</div>
<div class="flex items-baseline justify-between">
<div class="flex flex-col">
<span class="font-headline-sm text-[22px] tracking-wider text-primary font-semibold" id="acc-mandiri">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-high text-primary hover:bg-surface-variant font-title-md text-[12px] shadow-sm transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
            Salin Rekening
          </button>
</div>
</div>
@endif
</div>
</section>
<!-- 10. Royal Seal Closing & Warm Salutations -->
<footer class="px-gutter-sm pb-space-lg pt-space-md flex flex-col items-center text-center">
<div class="w-16 h-16 mb-space-sm rounded-full overflow-hidden shadow-md flex items-center justify-center p-1 bg-surface-container-low">
<img alt="Celeste Royale XVII Royal Wax Seal Monogram" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5"/>
</div>
<span class="font-label-lg text-label-lg tracking-[0.2em] text-secondary uppercase mb-1">GRATITUDE &amp; CLOSING</span>
<h3 class="font-headline-sm text-headline-sm text-primary mb-2">Sampai Berjumpa di Malam Penuh Bintang</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[320px] mb-space-md leading-relaxed">
      Kehadiran dan restu penuh ketulusan dari Anda akan menjadi lembaran memori paling berharga dalam sejarah mekar tujuh belas tahun putri kami.
    </p>
<div class="flex flex-col items-center">
<span class="font-title-md text-title-md text-primary font-medium">Seraphina Claire Bleu</span>
<span class="font-body-sm text-body-sm text-secondary italic">&amp; Keluarga Besar Bleu - Soedirja</span>
</div>
</footer>
</div>
<script>
  // Dynamic subtle countdown ticker simulation
  (function initCountdown() { return;
    let days = 48, hours = 14, mins = 35, secs = 20;
    const sEl = document.getElementById('cd-seconds');
    const mEl = document.getElementById('cd-minutes');
    if (!sEl || !mEl) return;
    setInterval(() => {
      secs--;
      if (secs < 0) {
        secs = 59;
        mins--;
        if (mins < 0) { mins = 59; }
        mEl.textContent = mins < 10 ? '0' + mins : mins;
      }
      sEl.textContent = secs < 10 ? '0' + secs : secs;
    }, 1000);
  })();

  // Copy address interaction
  const copyBtn = document.getElementById('copy-address-btn');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const addr = document.getElementById('venue-address')?.innerText || '{{ $venueAddress }}';
      navigator.clipboard.writeText(addr).then(() => {
        const txt = document.getElementById('copy-address-text');
        if (txt) {
          txt.textContent = 'Alamat Tersalin!';
          setTimeout(() => { txt.textContent = 'Salin Alamat'; }, 2000);
        }
      });
    });
  }
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/85 backdrop-blur-xl shadow-[0_-2px_12px_rgba(28,75,117,0.06)]" data-active-classes="text-primary font-title-md"><div class="flex justify-around items-center h-16 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center gap-1 py-1 w-14 min-h-[44px] transition-colors text-primary font-title-md" data-path="undangan-utama---celeste-royale" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-md text-[10px] leading-tight tracking-wider uppercase">Undangan</span></a><a class="flex flex-col items-center justify-center gap-1 py-1 w-14 min-h-[44px] text-on-surface-variant hover:text-primary transition-colors" data-path="agenda" href="#"><span class="material-symbols-outlined text-[22px]">event_available</span><span class="font-label-md text-[10px] leading-tight tracking-wider uppercase">Agenda</span></a><a class="flex flex-col items-center justify-center gap-1 py-1 w-14 min-h-[44px] text-on-surface-variant hover:text-primary transition-colors" data-path="galeri" href="#"><span class="material-symbols-outlined text-[22px]">photo_library</span><span class="font-label-md text-[10px] leading-tight tracking-wider uppercase">Galeri</span></a><a class="flex flex-col items-center justify-center gap-1 py-1 w-14 min-h-[44px] text-on-surface-variant hover:text-primary transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-md text-[10px] leading-tight tracking-wider uppercase">RSVP</span></a><a class="flex flex-col items-center justify-center gap-1 py-1 w-14 min-h-[44px] text-on-surface-variant hover:text-primary transition-colors" data-path="hadiah" href="#"><span class="material-symbols-outlined text-[22px]">featured_seasonal_and_gifts</span><span class="font-label-md text-[10px] leading-tight tracking-wider uppercase">Hadiah</span></a></div></nav>
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
                    document.documentElement.classList.remove('overflow-hidden');
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
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.30 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-0.5"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Google Maps</span></a>` : "";
                return `
                    <div class="p-3.5 rounded-xl bg-surface-container shadow-sm border border-secondary/20 flex flex-col gap-1.5 text-left event-itinerary-item">
                        <div class="flex items-center justify-between">
                            <span class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold">SESI ${i + 1}</span>
                            <span class="font-label-md text-xs text-primary font-semibold">${timeStr}</span>
                        </div>
                        <h4 class="font-headline-sm text-base text-primary font-bold leading-snug">${title}</h4>
                        <p class="font-body-sm text-xs text-on-surface-variant">${venue}${addr ? " &bull; " + addr : ""}</p>
                        ${dateStr ? `<span class="text-[11px] text-secondary block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'celeste-royale-baby-blue' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>