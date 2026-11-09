<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Midnight Soirée: Milestone 35') . ' - ' . ($couple->groom_name ?? 'Adrian Wicaksono') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Adrian Wicaksono' }} - Ulang Tahun Dewasa - Minimalis Modern Midnight Navy."/>

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
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "secondary-fixed": "#d9e2ff", "primary-fixed": "#d6e3fe", "on-tertiary-fixed-variant": "#574500", "surface-container-lowest": "#ffffff", "on-primary-container": "#77849c", "on-error": "#ffffff", "on-background": "#191c1e", "surface-container-high": "#e6e8eb", "on-tertiary-container": "#4e3d00", "primary-container": "#0e1c2f", "surface-container": "#eceef1", "inverse-on-surface": "#eff1f4", "on-tertiary": "#ffffff", "surface-dim": "#d8dadd", "on-tertiary-fixed": "#241a00", "surface-variant": "#e0e3e6", "on-error-container": "#93000a", "surface-bright": "#f7f9fc", "on-primary-fixed": "#0e1c2f", "inverse-primary": "#bac7e1", "secondary": "#4f5e81", "on-primary-fixed-variant": "#3a475c", "primary": "#000000", "tertiary": "#735c00", "on-secondary-container": "#4d5b7e", "background": "#f7f9fc", "tertiary-fixed": "#ffe088", "error": "#ba1a1a", "surface-container-highest": "#e0e3e6", "surface-tint": "#525f75", "inverse-surface": "#2d3133", "error-container": "#ffdad6", "outline": "#75777d", "on-surface": "#191c1e", "outline-variant": "#c5c6cd", "primary-fixed-dim": "#bac7e1", "on-secondary-fixed": "#0a1a3a", "secondary-container": "#c5d4fd", "surface": "#f7f9fc", "secondary-fixed-dim": "#b7c6ee", "tertiary-fixed-dim": "#e9c349", "surface-container-low": "#f2f4f7", "on-primary": "#ffffff", "on-secondary-fixed-variant": "#384668", "tertiary-container": "#cba72f", "on-surface-variant": "#44474c", "on-secondary": "#ffffff" }, borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, spacing: { "space-xs": "0.25rem", "gutter": "1.5rem", "space-md": "1rem", "margin-mobile": "1.25rem", "gutter-mobile": "1rem", "space-xl": "3rem", "space-lg": "1.75rem", "space-sm": "0.5rem", "margin": "3rem" }, fontFamily: { "body-sm": ["Plus Jakarta Sans"], "body-md": ["Plus Jakarta Sans"], "headline-lg": ["Space Grotesk"], "label-lg": ["Plus Jakarta Sans"], "label-sm": ["Plus Jakarta Sans"], "body-lg": ["Plus Jakarta Sans"], "display-hero-mobile": ["Space Grotesk"], "headline-md": ["Space Grotesk"], "headline-lg-mobile": ["Space Grotesk"], "display-hero": ["Space Grotesk"], "headline-sm": ["Space Grotesk"], "label-md": ["Plus Jakarta Sans"] }, fontSize: { "body-sm": ["13px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "400" }], "body-md": ["15px", { lineHeight: "24px", letterSpacing: "0", fontWeight: "400" }], "headline-lg": ["36px", { lineHeight: "44px", letterSpacing: "-0.02em", fontWeight: "600" }], "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.04em", fontWeight: "600" }], "label-sm": ["10px", { lineHeight: "14px", letterSpacing: "0.12em", fontWeight: "600" }], "body-lg": ["18px", { lineHeight: "28px", letterSpacing: "-0.01em", fontWeight: "400" }], "display-hero-mobile": ["44px", { lineHeight: "52px", letterSpacing: "-0.03em", fontWeight: "600" }], "headline-md": ["24px", { lineHeight: "32px", letterSpacing: "-0.01em", fontWeight: "500" }], "headline-lg-mobile": ["28px", { lineHeight: "36px", letterSpacing: "-0.02em", fontWeight: "600" }], "display-hero": ["72px", { lineHeight: "80px", letterSpacing: "-0.04em", fontWeight: "600" }], "headline-sm": ["20px", { lineHeight: "28px", letterSpacing: "0", fontWeight: "500" }], "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.08em", fontWeight: "600" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Adrian Wicaksono';
        $celebrantNick = $couple->groom_nickname ?? 'Adrian';
        $heading = $couple->event_heading ?? 'Midnight Soirée: Milestone 35';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dewasa';
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
        $quote = $couple->quote ?? 'Entering thirty-five with clarity of mind, gratitude for every milestone, and quiet confidence.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6AtwKU1AzpfBSTFj3XjEmRw0vPFIRTZzX9ttciYelUfIjcTtnFjbuzz0QCoC_Ihg7jVXW9Of_Mko6R5ojZ30buJ2WjRGAhWvrD0O6ZsSr5zjEnvt5pNYPyQYB31jJGnfnHPEKGWtdQl8yUWMjOgDIiSClms-_ORe_H06CgXhzqBGZa8jW_mo_kxOJjgtsQZWvJa93zPFwGB7gIqvdHbqD50L7x_1jVSkMpGba_xQV';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBujD13BvWavImZr1-nM9E09_wq_GMTSV3LbHY_KwuAGLm_leJDGjZELB7xWF-4hf0HfjrT6T0qJ6720lMz_y4LhYqSSgIcJ4zb-sElygV5QV83fzTsOL4qQqnQugapFInDCnBYKFE0NamJ4MiJmETrIWvXRCJPGlp43_BivmKP6MKQZlsxds1-kP3f2x5hM9NyS8SMwFB-lWBhKfPGitP3qcY7Zh64shGK5OniRsrK';
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

        $venueName = $couple->venue_name ?? 'The Foundry Private Lounge';
        $venueAddress = $couple->venue_address ?? 'Sudirman Central Business District (SCBD) Lot 8, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6AtwKU1AzpfBSTFj3XjEmRw0vPFIRTZzX9ttciYelUfIjcTtnFjbuzz0QCoC_Ihg7jVXW9Of_Mko6R5ojZ30buJ2WjRGAhWvrD0O6ZsSr5zjEnvt5pNYPyQYB31jJGnfnHPEKGWtdQl8yUWMjOgDIiSClms-_ORe_H06CgXhzqBGZa8jW_mo_kxOJjgtsQZWvJa93zPFwGB7gIqvdHbqD50L7x_1jVSkMpGba_xQV', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBujD13BvWavImZr1-nM9E09_wq_GMTSV3LbHY_KwuAGLm_leJDGjZELB7xWF-4hf0HfjrT6T0qJ6720lMz_y4LhYqSSgIcJ4zb-sElygV5QV83fzTsOL4qQqnQugapFInDCnBYKFE0NamJ4MiJmETrIWvXRCJPGlp43_BivmKP6MKQZlsxds1-kP3f2x5hM9NyS8SMwFB-lWBhKfPGitP3qcY7Zh64shGK5OniRsrK', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCpxPvc26i4rr2vB_ttSb_YwSyJpOxr-XS7Ag2MyKkkFdrd3QQYzXOToe1WnN81t4MrnjqDig5CXYeF1zOcZ652yMJDj9wL8GaEhSUwo0v1DtbrPka6hbaAwBwp4oY6sWbxxR6zRqKlngIMIJjUGk-82HR5dfhbfkhRIRFU9l2h62S_SrmVmrzKIxr5vx3Qjzh16mQIYcZGkSvgz3KntQ00_eqNxRcLCEjl8G-s6lzj', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex flex-col relative w-full min-h-screen bg-surface"><div class="flex flex-col w-full relative overflow-hidden select-none">
<!-- Architectural ambient glow & framing accents -->
<div class="absolute -top-24 left-1/2 -translate-x-1/2 w-80 h-80 rounded-full bg-primary-fixed/30 blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-24 right-[-10%] w-72 h-72 rounded-full bg-secondary-fixed/40 blur-3xl pointer-events-none"></div>
<div class="relative w-full max-w-md mx-auto px-margin-mobile py-space-sm flex flex-col justify-between min-h-[94vh]">
<!-- Top Bar: Ambient Audio Status & Edition Tracker -->
<header class="flex flex-col items-center gap-space-xs text-center pt-space-xs">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface shadow-sm">
<span class="inline-flex items-center gap-0.5 text-on-surface-variant">
<span class="w-0.5 h-2.5 bg-primary rounded-full animate-pulse"></span>
<span class="w-0.5 h-4 bg-primary rounded-full animate-pulse" style="animation-delay: 150ms;"></span>
<span class="w-0.5 h-1.5 bg-primary rounded-full animate-pulse" style="animation-delay: 300ms;"></span>
</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase text-on-surface">Midnight Resonance — Chapter 35</span>
</div>
<div class="flex items-center justify-center gap-2 text-on-surface-variant/80">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-[10px]">Chapter 35</span>
<span class="w-1 h-1 rotate-45 bg-outline-variant"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-[10px]">Private Soirée</span>
<span class="w-1 h-1 rotate-45 bg-outline-variant"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-[10px]">Ed. 2025</span>
</div>
</header>
<!-- Center Section: Interactive Monogram Seal & Celebrant Hero -->
<section class="flex flex-col items-center text-center my-space-xs">
<!-- Monogram Wax Seal Interaction Module -->
<div class="relative group cursor-pointer active:scale-95 transition-all duration-300" id="seal-trigger">
<div class="absolute inset-0 rounded-full bg-primary-container/10 blur-xl group-hover:blur-2xl transition-all"></div>
<div class="relative w-28 h-28 rounded-full p-1 bg-surface-container-lowest shadow-md flex items-center justify-center">
<img alt="Midnight Navy Milestone Seal" class="w-full h-full object-cover rounded-full shadow-inner transform group-hover:scale-105 transition-transform duration-500" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
<div class="mt-2 inline-flex items-center gap-1.5 text-on-surface-variant">
<span class="text-[9px] tracking-widest font-label-sm uppercase">◆ Ketuk Untuk Membuka Segel ◆</span>
</div>
<!-- Celebrant Titles & Philosophy Quote -->
<div class="mt-3 flex flex-col items-center">
<span class="font-label-sm text-label-sm tracking-[0.2em] uppercase text-on-surface-variant font-semibold">
          Celebrating 35 Years of Purpose
        </span>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight mt-0.5" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-1 leading-relaxed">
          “Entering thirty-five with clarity of mind, gratitude for every milestone, and quiet confidence for what lies ahead.”
        </p>
</div>
</section>
<!-- Guest Personalized VIP Card (Envelope Opening Leaflet) -->
<section class="w-full rounded-xl bg-surface-container-lowest shadow-md p-space-md flex flex-col gap-2.5 relative">
<div class="flex items-center justify-between">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-sm bg-surface-container text-on-surface font-label-sm text-[10px] tracking-wider uppercase font-semibold">
          ★ VIP INVITATION • ACCESS PASS
        </span>
<span class="font-headline-sm text-xs text-on-surface-variant font-mono tracking-widest">
          NO. 035-AW
        </span>
</div>
<div class="space-y-0.5">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block text-[10px]">
          Kepada Yth. Bapak/Ibu/Saudara/i:
        </span>
<div class="flex items-baseline justify-between gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-normal" id="previewGuestNameCover">
            {{ $guestName }}
          </h2>
<span class="font-body-sm text-body-sm text-on-surface-variant italic">
            Di Tempat
          </span>
</div>
</div>
<div class="w-full h-px bg-surface-variant"></div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga perayaan ulang tahun ke-35 yang penuh kehangatan, pencapaian, dan rasa syukur.
      </p>
</section>
<!-- Interactive Primary CTA Button -->
<div class="w-full mt-space-xs">
<button class="w-full py-3.5 px-4 rounded-lg bg-primary-container text-surface-container-lowest shadow-lg active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 group" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-hover:translate-x-0.5">mail</span>
<span class="font-label-lg text-label-lg tracking-wider uppercase">Buka Undangan</span>
<span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
</button>
</div>
<!-- Event Metadata & Strict Dress Code Protocol -->
<footer class="text-center flex flex-col items-center gap-1 pb-1 pt-space-xs">
<p class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface font-semibold text-[11px]">
        {{ $eventDateFormatted }} • Park Hyatt Jakarta
      </p>
<div class="flex flex-wrap items-center justify-center gap-1 text-on-surface-variant">
<span class="font-label-sm text-label-sm text-[10px] uppercase tracking-wider">
          Dress Code: Midnight Navy &amp; Modern Black Tie
        </span>
<span class="text-[8px] opacity-40">•</span>
<span class="font-label-sm text-label-sm text-[10px] uppercase tracking-wider font-semibold">
          RSVP Strictly Required
        </span>
</div>
</footer>
</div>
</div>
<script>
  (function() {
    const seal = document.getElementById('seal-trigger');
    const button = document.getElementById('open-invite-btn');

    function triggerInteractionFeedback(element) {
      if (!element) return;
      element.classList.add('scale-95');
      setTimeout(() => {
        element.classList.remove('scale-95');
      }, 180);
    }

    if (seal) {
      seal.addEventListener('click', function() {
        triggerInteractionFeedback(seal);
        if (button) {
          button.classList.add('bg-secondary');
          setTimeout(() => {
            button.classList.remove('bg-secondary');
          }, 350);
        }
      });
    }

    if (button) {
      button.addEventListener('click', function() {
        triggerInteractionFeedback(button);
      });
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-primary-container/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-margin-mobile flex items-center justify-between"><div class="flex flex-col justify-center"><span class="font-label-sm text-label-sm text-secondary tracking-widest uppercase">INVITATION</span><h1 class="font-headline-sm text-headline-sm text-on-primary line-clamp-1" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div><div class="flex items-center gap-space-sm"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Musik" class="w-9 h-9 rounded-full flex items-center justify-center text-on-primary bg-primary/40 hover:bg-primary/70 transition-all cursor-pointer"><span class="material-symbols-outlined text-[18px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex flex-col relative w-full pt-16 pb-24 bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Top Ambient Banner -->
<div class="w-full bg-primary-container text-on-primary py-space-sm px-margin-mobile flex items-center justify-between text-center">
<span class="font-label-sm text-label-sm tracking-widest text-primary-fixed uppercase">A MILESTONE CHAPTER • 35TH BIRTHDAY</span>
<span class="font-label-sm text-label-sm text-tertiary-fixed tracking-wider">JAKARTA • NOV 2025</span>
</div>
<div class="px-margin-mobile flex flex-col gap-space-xl py-space-lg">
<!-- 1. Hero Header & Celebrant Showcase -->
<section class="flex flex-col items-center text-center">
<div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container-high text-secondary mb-space-md shadow-sm">
<span class="material-symbols-outlined text-[14px] text-tertiary">arrow_back_ios_new</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase">✦ 1990 • CHAPTER XXXV • 2025</span>
</div>
<!-- Celebrant Portrait Card -->
<div class="relative w-full max-w-sm rounded-xl overflow-hidden shadow-xl bg-primary-container p-2 mb-space-lg">
<div class="relative w-full aspect-[3/4] rounded-lg overflow-hidden">
<img alt="Adrian Wicaksono - 35th Milestone Portrait" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary-container via-transparent to-transparent opacity-80"></div>
<div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
<span class="px-2.5 py-1 rounded bg-surface-container-lowest/80 backdrop-blur-md font-label-sm text-label-sm text-primary-container uppercase tracking-wider font-semibold">35TH SOIRÉE</span>
<span class="px-2.5 py-1 rounded bg-primary-container/80 backdrop-blur-md font-label-sm text-label-sm text-on-primary uppercase tracking-wider">JAKARTA</span>
</div>
</div>
</div>
<h1 class="font-display-hero-mobile text-display-hero-mobile tracking-tight text-primary-container font-semibold uppercase mb-space-xs">
        ADRIAN WICAKSONO
      </h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md mx-auto italic leading-relaxed">
        “Reflecting on thirty-five years of purposeful journeys, meaningful bonds, and embracing the milestones ahead with quiet clarity.”
      </p>
</section>
<!-- 2. Guest Invitation Specification Card (Kepada Yth) -->
<section class="w-full bg-primary-container text-on-primary rounded-xl p-space-lg shadow-xl relative overflow-hidden">
<div class="absolute -right-10 -bottom-10 w-36 h-36 rounded-full bg-secondary/10 blur-2xl pointer-events-none"></div>
<div class="flex items-center gap-space-xs text-primary-fixed mb-space-sm">
<span class="material-symbols-outlined text-[16px]">verified_user</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase font-semibold">KEPADA YTH. <span id="previewGuestNameMain">{{ $guestName }}</span></span>
</div>
<div class="bg-surface-container-lowest/10 backdrop-blur-md rounded-lg p-space-md mb-space-md">
<div class="font-headline-sm text-headline-sm text-surface-container-lowest font-medium mb-1">
          {{ $guestName }}
        </div>
<div class="flex items-center gap-1.5 text-tertiary-fixed text-body-sm font-label-md">
<span class="material-symbols-outlined text-[18px]">table_bar</span>
<span>MEJA RESERVASI VIP: PENTHOUSE LOUNGE A-05</span>
</div>
<div class="font-label-sm text-label-sm text-primary-fixed-dim mt-0.5">
          (Kapasitas: 2 Tamu Terdaftar)
        </div>
</div>
<p class="font-body-sm text-body-sm text-surface-variant leading-relaxed">
        Kehadiran serta doa restu Anda adalah pelengkap kebahagiaan terbesar dalam merayakan babak baru usia tiga puluh lima ini.
      </p>
</section>
<!-- 3. Profil Singkat (Life Journey & Vision at 35) -->
<section class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">BIOGRAFI &amp; MILESTONE</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Sekilas Perjalanan di Usia 35</h2>
</div>
<span class="material-symbols-outlined text-secondary text-[26px]">timeline</span>
</div>
<div class="flex flex-col gap-space-sm">
<!-- 01 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between text-secondary">
<span class="font-headline-sm text-headline-sm font-bold text-primary-container">01</span>
<span class="font-label-sm text-label-sm bg-surface-container-high px-2 py-0.5 rounded text-on-surface-variant">1990 - 2012</span>
</div>
<h3 class="font-label-lg text-label-lg text-primary font-semibold">The Foundations</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Masa tumbuh berkembang dalam nilai integritas, eksplorasi keilmuan teknologi, dan pembentukan karakter kepemimpinan.
          </p>
</div>
<!-- 02 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between text-secondary">
<span class="font-headline-sm text-headline-sm font-bold text-primary-container">02</span>
<span class="font-label-sm text-label-sm bg-surface-container-high px-2 py-0.5 rounded text-on-surface-variant">2013 - 2024</span>
</div>
<h3 class="font-label-lg text-label-lg text-primary font-semibold">Building &amp; Resilience</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Membangun karier profesional di bidang teknologi investasi, mendirikan inisiatif bermakna, dan mengukir persahabatan sejati.
          </p>
</div>
<!-- 03 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between text-secondary">
<span class="font-headline-sm text-headline-sm font-bold text-primary-container">03</span>
<span class="font-label-sm text-label-sm bg-surface-container-high px-2 py-0.5 rounded text-on-surface-variant">2025 &amp; Beyond</span>
</div>
<h3 class="font-label-lg text-label-lg text-primary font-semibold">Clarity &amp; Legacy</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Memasuki usia 35 dengan ketenangan batin, komitmen memberikan dampak bagi sesama, dan dedikasi pada karya yang berkelanjutan.
          </p>
</div>
</div>
<!-- Personal Touch Quote Box -->
<div class="bg-surface-container rounded-xl p-space-md flex items-start gap-space-sm text-on-surface">
<span class="material-symbols-outlined text-secondary text-[22px] mt-0.5">interests</span>
<p class="font-body-sm text-body-sm text-on-surface-variant italic">
          “An architect of ideas by day, jazz and vinyl aficionado by night, coffee enthusiast &amp; devoted marathon runner.”
        </p>
</div>
</section>
<!-- 4. Jadwal Acara & Live Countdown -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">AGENDA &amp; WAKTU</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Jadwal Acara &amp; Countdown</h2>
</div>
<!-- Date Banner -->
<div class="bg-primary-container text-on-primary rounded-xl p-space-md shadow-md flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-lg bg-surface-container-lowest/10 flex flex-col items-center justify-center shrink-0 text-center">
<span class="font-label-sm text-label-sm uppercase text-tertiary-fixed leading-none">NOV</span>
<span class="font-headline-sm text-headline-sm font-bold leading-none mt-0.5">22</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-lg text-label-lg font-bold text-surface-container-lowest">{{ $eventDateFormatted }}</span>
<span class="font-body-sm text-body-sm text-primary-fixed truncate">18.30 WIB - Selesai (Pintu dibuka 18.00 WIB)</span>
</div>
</div>
<!-- Live Minimalist Countdown Grid -->
<div class="grid grid-cols-4 gap-2 text-center" id="countdown-grid">
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-sm">
<span class="block font-headline-md text-headline-md font-bold text-primary-container leading-none" id="cd-days">45</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Hari</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-sm">
<span class="block font-headline-md text-headline-md font-bold text-primary-container leading-none" id="cd-hours">18</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Jam</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-sm">
<span class="block font-headline-md text-headline-md font-bold text-primary-container leading-none" id="cd-mins">20</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Menit</span>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-lg shadow-sm">
<span class="block font-headline-md text-headline-md font-bold text-primary-container leading-none" id="cd-secs">35</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Detik</span>
</div>
</div>
<button class="w-full bg-primary-container hover:bg-secondary text-on-primary py-3 px-space-md rounded-lg font-label-md text-label-md tracking-wider flex items-center justify-center gap-2 transition-colors shadow-sm uppercase font-semibold" type="button">
<span class="material-symbols-outlined text-[18px]">event_available</span>
<span>Simpan ke Google Calendar</span>
</button>
<!-- Rundown Itinerary -->
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg relative mt-2" id="itineraryContainer">
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
    <div class="flex gap-space-md relative event-itinerary-item">
        <div class="flex flex-col items-center">
            <span class="w-3 h-3 rounded-full bg-primary-container ring-4 ring-secondary-fixed"></span>
            <span class="w-0.5 flex-1 bg-surface-variant my-1"></span>
        </div>
        <div class="flex flex-col pb-2 flex-1 min-w-0">
            <span class="font-label-sm text-label-sm text-secondary tracking-widest font-semibold uppercase">{{ $evTimeStr }} • SESI {{ $index + 1 }}</span>
            <h4 class="font-label-lg text-label-lg text-primary-container font-bold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary font-semibold block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary-container font-bold hover:underline mt-1">
                    <span class="material-symbols-outlined text-[13px]">near_me</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</section>
<!-- 5. Lokasi Acara & Peta (Venue Details) -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">TEMPAT PELAKSANAAN</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Lokasi Acara &amp; Akses</h2>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm flex flex-col">
<!-- Interactive Map Container -->
<div class="w-full h-48 bg-cover bg-center relative" data-location="Park Hyatt Jakarta, Jl. Kebon Sirih No. 17-19, Menteng, Jakarta Pusat" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBSfFYXg110GrdOr9ADh36bqVXXKUcmvu-tvueHf9_lQCLsiSATnq5uqwqN3Ro7GIl6vkHYT4cLxxk7y0AMMr8Ags0WyGmwAyiyrFJ0DzPfNJSI6Ifs2TS8jwXnzYaigvCqwwdaXUUTdOExBam_WdWlvEh49b2Om0X-iqQ5tLWopAFJkdW1f1cluRKrmg2W9nJDHnmVqtJZNv0D_TXn_WJtPsyVvr4gXXe4FGQ63NaD')">
<div class="absolute inset-0 bg-primary-container/20"></div>
<div class="absolute top-3 left-3 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded text-primary-container font-label-sm text-label-sm font-semibold flex items-center gap-1 shadow-sm">
<span class="material-symbols-outlined text-[16px] text-tertiary">location_on</span>
<span>Park Hyatt Jakarta • Level 36</span>
</div>
</div>
<div class="p-space-md flex flex-col gap-space-sm">
<div>
<h3 class="font-headline-sm text-headline-sm text-primary-container font-bold" id="previewVenueNameMain">{{ $venueName }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5" id="previewVenueAddressMain">{{ $venueAddress }}</p>
</div>
<div class="p-space-sm bg-surface-container-high rounded-lg flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">local_parking</span>
<span class="font-label-sm text-label-sm text-on-surface font-medium">VIP Valet Parking tersedia di Lobby Utara Park Hyatt.</span>
</div>
<div class="grid grid-cols-2 gap-space-sm pt-2">
<a id="previewMapsLinkMain" class="bg-primary-container text-on-primary py-2.5 px-3 rounded text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 hover:bg-secondary transition-colors" href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer"><span class="material-symbols-outlined text-[16px]">map</span><span>Buka Maps</span></a>
<button class="bg-surface-container hover:bg-surface-variant text-primary-container py-2.5 px-3 rounded font-label-md text-label-md uppercase tracking-wider flex items-center justify-center gap-1.5 transition-colors" onclick="navigator.clipboard?.writeText('{{ addslashes($venueAddress) }}')" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span>Salin Alamat</span>
</button>
</div>
</div>
</div>
</section>
<!-- 6. Tema & Panduan Tata Busana (Dress Code) -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">PANDUAN BUSANA</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Midnight Sophistication</h2>
</div>
<div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<!-- Palette Swatches -->
<div class="flex flex-col gap-2">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Palet Warna Utama:</span>
<div class="flex items-center gap-2">
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-8 rounded bg-primary-container shadow-inner"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Midnight</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-8 rounded bg-secondary shadow-inner"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Slate</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-8 rounded bg-surface-dim shadow-inner"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Platinum</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-8 rounded bg-tertiary-container shadow-inner"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Gold</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-8 rounded bg-primary shadow-inner"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Onyx</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 gap-space-sm pt-2">
<div class="bg-surface-container rounded-lg p-space-md flex flex-col gap-1">
<div class="flex items-center gap-1.5 text-primary-container font-bold font-label-lg text-label-lg">
<span class="material-symbols-outlined text-[18px]">man</span>
<span>Tamu Pria</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Sharp tailored modern tuxedo / dark midnight navy suit, crisp white dress shirt, and black leather oxfords.
            </p>
</div>
<div class="bg-surface-container rounded-lg p-space-md flex flex-col gap-1">
<div class="flex items-center gap-1.5 text-primary-container font-bold font-label-lg text-label-lg">
<span class="material-symbols-outlined text-[18px]">woman</span>
<span>Tamu Wanita</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Chic cocktail dress or modern architectural evening gown bernuansa midnight navy, platinum, deep charcoal, atau champagne.
            </p>
</div>
</div>
</div>
</section>
<!-- 7. Galeri Foto (Vignettes of Gratitude & Milestones) -->
<section class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">MEMORI &amp; DOKUMENTASI</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Galeri Babak 35</h2>
</div>
<span class="material-symbols-outlined text-secondary text-[24px]">photo_library</span>
</div>
<div id="galleryGridContainer" class="grid grid-cols-2 gap-2">
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
      <div class="p-2 flex flex-col">
        <span class="font-body-sm text-[12px] text-primary truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 8. Formulir Konfirmasi Kehadiran (RSVP) -->
<section class="w-full bg-surface-container-lowest rounded-xl p-space-lg shadow-md flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">RSVP PRIORITAS</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Konfirmasi Kehadiran</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
          Demi kenyamanan pengaturan meja dan hidangan eksklusif, mohon konfirmasi sebelum 10 November 2025.
        </p>
</div>
<form class="flex flex-col gap-space-md" onsubmit="event.preventDefault(); alert('Terima kasih, konfirmasi Anda telah tercatat dengan baik.');">
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-secondary uppercase tracking-wider font-semibold">Nama Lengkap Tamu</label>
<input class="w-full h-12 px-space-md rounded bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container focus:text-primary-container transition-colors" placeholder="Masukkan nama..." type="text" value="{{ $guestName }}"/>
</div>
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-secondary uppercase tracking-wider font-semibold">Jumlah Kehadiran</label>
<select class="w-full h-12 px-space-md rounded bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container transition-colors">
<option selected="">2 Orang - Bersama Pasangan</option>
<option>1 Orang - Hadir Sendiri</option>
<option>Berhalangan Hadir</option>
</select>
</div>
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-secondary uppercase tracking-wider font-semibold">Status Konfirmasi</label>
<div class="grid grid-cols-2 gap-space-sm pt-1">
<label class="flex items-center gap-2 p-3 rounded bg-surface-container-low cursor-pointer hover:bg-surface-container transition-colors">
<input checked="" class="accent-primary-container w-4 h-4" name="rsvp_status" type="radio"/>
<span class="font-label-sm text-label-sm text-on-surface font-bold">✓ Ya, Pasti Hadir</span>
</label>
<label class="flex items-center gap-2 p-3 rounded bg-surface-container-low cursor-pointer hover:bg-surface-container transition-colors">
<input class="accent-primary-container w-4 h-4" name="rsvp_status" type="radio"/>
<span class="font-label-sm text-label-sm text-on-surface font-medium">✕ Maaf, Berhalangan</span>
</label>
</div>
</div>
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm text-secondary uppercase tracking-wider font-semibold">Pesan &amp; Doa Hangat</label>
<textarea class="w-full p-space-md rounded bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:bg-surface-container transition-colors" placeholder="Tuliskan ucapan atau doa untuk Adrian..." rows="3"></textarea>
</div>
<button class="w-full bg-primary-container hover:bg-secondary text-on-primary py-3.5 px-space-md rounded-lg font-label-md text-label-md tracking-wider flex items-center justify-center gap-2 transition-colors shadow uppercase font-bold mt-1" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
<span>Kirim Konfirmasi &amp; Doa</span>
</button>
</form>
</section>
<!-- 9. Untaian Doa & Harapan (Buku Tamu Digital) -->
<section class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">BUKU TAMU DIGITAL</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Untaian Doa &amp; Harapan</h2>
</div>
<span class="material-symbols-outlined text-secondary text-[24px]">forum</span>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Message 1 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center font-bold text-xs">
                DW
              </div>
<span class="font-label-md text-label-md text-primary-container font-bold">Dimas &amp; Raisa</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
            Selamat memasuki babak ke-35, sahabat! Semoga selalu dilimpahi kejernihan visi, kesehatan prima, dan kebahagiaan berlimpah bersama keluarga tercinta. Can't wait to raise a glass with you at Park Hyatt!
          </p>
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-sm text-label-sm">12 Suka</span>
</div>
</div>
<!-- Message 2 -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-xs">
                SM
              </div>
<span class="font-label-md text-label-md text-primary-container font-bold">Sarah Maureen</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
            Happy 35th milestone, Adrian. Sebuah perjalanan yang inspiratif. Sampai jumpa di malam selebrasi yang megah ini!
          </p>
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-sm text-label-sm">8 Suka</span>
</div>
</div>
</div>
</section>
<!-- 10. Tanda Kasih Digital (Digital Envelope) -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">TANDA KASIH</span>
<h2 class="font-headline-sm text-headline-sm text-primary-container font-semibold">Tanda Kasih Digital</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
          Bagi para sahabat yang ingin mengirimkan kado atau tanda kasih secara digital untuk menandai milestone ke-35 ini:
        </p>
</div>
<div class="flex flex-col gap-space-sm">
<!-- Bank 1 Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex items-center justify-between border border-outline-variant/30 mb-3">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">{{ $bankName1 }}</span>
<span class="font-headline-sm text-headline-sm text-primary-container font-mono tracking-wider" id="accBCA">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary p-2.5 rounded-lg active:scale-95 transition-transform shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex items-center justify-between border border-outline-variant/30">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">{{ $bankName2 }}</span>
<span class="font-headline-sm text-headline-sm text-primary-container font-mono tracking-wider" id="accMandiri">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary p-2.5 rounded-lg active:scale-95 transition-transform shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- 11. Closing Section -->
<section class="flex flex-col items-center text-center pt-space-lg pb-space-xl">
<!-- Monogram Seal Image -->
<div class="w-20 h-20 rounded-full overflow-hidden shadow-lg mb-space-md bg-primary-container p-1">
<img alt="Adrian Wicaksono Milestone Monogram Seal" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6AtwKU1AzpfBSTFj3XjEmRw0vPFIRTZzX9ttciYelUfIjcTtnFjbuzz0QCoC_Ihg7jVXW9Of_Mko6R5ojZ30buJ2WjRGAhWvrD0O6ZsSr5zjEnvt5pNYPyQYB31jJGnfnHPEKGWtdQl8yUWMjOgDIiSClms-_ORe_H06CgXhzqBGZa8jW_mo_kxOJjgtsQZWvJa93zPFwGB7gIqvdHbqD50L7x_1jVSkMpGba_xQV"/>
</div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mb-1">UNGKAPAN TERIMA KASIH</span>
<h3 class="font-headline-md text-headline-md text-primary-container font-semibold max-w-xs leading-snug">
        Sampai Jumpa di Malam Penuh Syukur &amp; Kebersamaan
      </h3>
<p class="font-label-md text-label-md text-on-surface-variant mt-space-sm uppercase tracking-wider">
        Salam Hangat, Adrian Wicaksono &amp; Keluarga
      </p>
<div class="w-12 h-0.5 bg-surface-variant mt-space-lg rounded-full"></div>
</section>
</div>
</div>
<script>
  (function() {
    // Dynamic countdown logic targeting 22 November 2025
    let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
    function updateCountdown() {
      const now = new Date().getTime();
      const difference = targetDate - now;

      if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        const dEl = document.getElementById("cd-days");
        const hEl = document.getElementById("cd-hours");
        const mEl = document.getElementById("cd-mins");
        const sEl = document.getElementById("cd-secs");

        if (dEl) dEl.innerText = days;
        if (hEl) hEl.innerText = hours;
        if (mEl) mEl.innerText = minutes;
        if (sEl) sEl.innerText = seconds;
      }
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        targetDate = new Date(newDateStr).getTime();
        updateCountdown();
      }
    };
  })();
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface-container-lowest/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]" data-active-classes="text-primary-container font-semibold"><div class="h-16 px-gutter-mobile flex items-center justify-around"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] transition-colors text-primary-container font-semibold" data-path="undangan" href="#"><span class="material-symbols-outlined text-[22px]">mail</span><span class="font-label-sm text-label-sm mt-0.5">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] text-on-surface-variant hover:text-on-surface transition-colors" data-path="profil" href="#"><span class="material-symbols-outlined text-[22px]">badge</span><span class="font-label-sm text-label-sm mt-0.5">Profil</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] text-on-surface-variant hover:text-on-surface transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">calendar_today</span><span class="font-label-sm text-label-sm mt-0.5">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] text-on-surface-variant hover:text-on-surface transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">near_me</span><span class="font-label-sm text-label-sm mt-0.5">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm mt-0.5">RSVP</span></a></div></nav>
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
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary-container font-bold hover:underline mt-1"><span class="material-symbols-outlined text-[13px]">near_me</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="flex gap-space-md relative event-itinerary-item">
                        <div class="flex flex-col items-center">
                            <span class="w-3 h-3 rounded-full bg-primary-container ring-4 ring-secondary-fixed"></span>
                            <span class="w-0.5 flex-1 bg-surface-variant my-1"></span>
                        </div>
                        <div class="flex flex-col pb-2 flex-1 min-w-0">
                            <span class="font-label-sm text-label-sm text-secondary tracking-widest font-semibold uppercase">${timeStr} • SESI ${i + 1}</span>
                            <h4 class="font-label-lg text-label-lg text-primary-container font-bold leading-snug">${title}</h4>
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'midnight-soiree-navy' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>