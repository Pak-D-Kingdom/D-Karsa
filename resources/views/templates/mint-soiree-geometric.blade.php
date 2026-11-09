<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Mint Soirée: Chapter 30') . ' - ' . ($couple->groom_name ?? 'Reyhan Danendra') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Reyhan Danendra' }} - Ulang Tahun Dewasa - Geometris Mint Fresh."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&amp;family=Syne:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "surface-container-high": "#e1e8fd", "surface-bright": "#f9f9ff", "error-container": "#ffdad6", "secondary-container": "#adedd3", "on-secondary-container": "#306d58", "inverse-primary": "#68dba9", "on-secondary": "#ffffff", "surface-tint": "#006c4a", "on-tertiary-fixed": "#002115", "primary-fixed-dim": "#68dba9", "on-tertiary-container": "#f5fff7", "error": "#ba1a1a", "tertiary-fixed-dim": "#8bd6b4", "inverse-on-surface": "#edf0ff", "on-primary": "#ffffff", "on-surface": "#141b2b", "on-surface-variant": "#3d4a42", "surface-container-low": "#f1f3ff", "primary": "#006948", "surface-variant": "#dce2f7", "on-error-container": "#93000a", "on-primary-container": "#f5fff7", "secondary-fixed": "#b0f0d6", "tertiary-container": "#378265", "background": "#f9f9ff", "on-background": "#141b2b", "primary-container": "#00855d", "tertiary": "#18684d", "on-secondary-fixed-variant": "#0b513d", "on-tertiary": "#ffffff", "outline": "#6d7a72", "surface-container-highest": "#dce2f7", "on-error": "#ffffff", "outline-variant": "#bccac0", "secondary": "#2b6954", "inverse-surface": "#293040", "primary-fixed": "#85f8c4", "on-tertiary-fixed-variant": "#00513a", "surface-container-lowest": "#ffffff", "on-primary-fixed": "#002114", "surface": "#f9f9ff", "surface-container": "#e9edff", "on-secondary-fixed": "#002117", "surface-dim": "#d3daef", "on-primary-fixed-variant": "#005137", "tertiary-fixed": "#a6f2cf", "secondary-fixed-dim": "#95d3ba" }, borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, spacing: { "space-sm": "0.5rem", "gutter-mobile": "1rem", "space-xl": "3rem", "gutter": "1.5rem", "space-lg": "1.75rem", "margin": "3rem", "space-xs": "0.25rem", "space-md": "1rem", "margin-mobile": "1.25rem" }, fontFamily: { "headline-lg-mobile": ["Syne"], "body-lg": ["Space Grotesk"], "body-sm": ["Space Grotesk"], "headline-md": ["Syne"], "headline-sm": ["Syne"], "display-hero-mobile": ["Syne"], "label-sm": ["Space Grotesk"], "label-lg": ["Space Grotesk"], "label-md": ["Space Grotesk"], "headline-lg": ["Syne"], "body-md": ["Space Grotesk"], "display-hero": ["Syne"] }, fontSize: { "headline-lg-mobile": ["28px", { "lineHeight": "34px", "letterSpacing": "-0.01em", "fontWeight": "700" }], "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "body-sm": ["13px", { "lineHeight": "20px", "fontWeight": "400" }], "headline-md": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }], "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }], "display-hero-mobile": ["38px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "800" }], "label-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.12em", "fontWeight": "700" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.06em", "fontWeight": "600" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "600" }], "headline-lg": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }], "body-md": ["15px", { "lineHeight": "24px", "fontWeight": "400" }], "display-hero": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.03em", "fontWeight": "800" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Reyhan Danendra';
        $celebrantNick = $couple->groom_nickname ?? 'Reyhan';
        $heading = $couple->event_heading ?? 'Mint Soirée: Chapter 30';
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
        $quote = $couple->quote ?? 'Entering thirty with grounded clarity, creative energy, and deep gratitude for every milestone.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBUa5nKhZ0fyl6HfSUiPmVfYSRkugaoIIVwHkk1ENHonrCXMjoMxptho-zDpnPvxzfHS5SwArIvMT9AJmWIksSEqiOFb0BawlfKgKS1ZE1TmBUIF7QjoHISS_Nbp8JKzK9PzMOIAA4lnzN2K8TuWzO8UDwFHaA4Res8LSgDUN-aVENIlxhskSils4ZdaPSKY1ReSqU0khblEOI4qiqC42YhbQwf4YG8aZ8TXg2SddA3';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCm8Z9fLOOglxCw4_JcvT1UeY6UDkwtoQYWVtRCPzs7JOtME5IAyaBAc7RE_VKVhtesjYMrNoFNN-S65Cf2UUNIe1nrgD-_cDocHBIG-FPWNv5XGPQgJ6dWZbBLY8HAUupGh-dFsJVoJ3ejVjMFHZbWnes2Sw-9n25Ex4s6-J02wtxy25-SqvtdJE2EtwT_VJRnUbaCtpKJ3DSQoADjWEyE8u92E6IGQpcp9esmVbIF';
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

        $venueName = $couple->venue_name ?? 'Botanica Glass Pavilion';
        $venueAddress = $couple->venue_address ?? 'Jl. Sultan Iskandar Muda No. 8, Pondok Indah, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBUa5nKhZ0fyl6HfSUiPmVfYSRkugaoIIVwHkk1ENHonrCXMjoMxptho-zDpnPvxzfHS5SwArIvMT9AJmWIksSEqiOFb0BawlfKgKS1ZE1TmBUIF7QjoHISS_Nbp8JKzK9PzMOIAA4lnzN2K8TuWzO8UDwFHaA4Res8LSgDUN-aVENIlxhskSils4ZdaPSKY1ReSqU0khblEOI4qiqC42YhbQwf4YG8aZ8TXg2SddA3', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCm8Z9fLOOglxCw4_JcvT1UeY6UDkwtoQYWVtRCPzs7JOtME5IAyaBAc7RE_VKVhtesjYMrNoFNN-S65Cf2UUNIe1nrgD-_cDocHBIG-FPWNv5XGPQgJ6dWZbBLY8HAUupGh-dFsJVoJ3ejVjMFHZbWnes2Sw-9n25Ex4s6-J02wtxy25-SqvtdJE2EtwT_VJRnUbaCtpKJ3DSQoADjWEyE8u92E6IGQpcp9esmVbIF', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCR_w8moM_fvxsQTWqjn992YWwvePTy1VWNlGYrgFhVvbWFk0dWnjptigIyA8b7B9iu5VOdmbqIDAFzpY3Q89TzPJlhOOhXLRyST_g9qN2MXp2ayf936v5J0b7hMDyKptJQodkJYPCo30n1OSEAM7Vl5ZWgGErmkGtUGCTW0I_oDbZppuRKq0-yeM8yASDnXaAJwYbxfJ5DOuv_DpPlyTl9-Sqte1d4gAA1MkFsWn-R', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 flex flex-col relative w-full bg-surface min-h-screen"><div class="flex flex-col w-full relative select-none">
<!-- Prismatic Geometric Background Motif -->
<div class="absolute inset-0 pointer-events-none overflow-hidden opacity-40">
<svg class="w-full h-full" fill="none" viewbox="0 0 400 800" xmlns="http://www.w3.org/2000/svg">
<circle cx="200" cy="240" fill="url(#mintGlow)" fill-opacity="0.35" r="160"></circle>
<polygon opacity="0.4" points="200,40 370,140 370,340 200,440 30,340 30,140" stroke="#006948" stroke-dasharray="4 4" stroke-width="0.75"></polygon>
<polygon opacity="0.6" points="200,70 340,150 340,320 200,400 60,320 60,150" stroke="#85f8c4" stroke-width="0.5"></polygon>
<defs>
<radialgradient cx="0.5" cy="0.5" gradientunits="userSpaceOnUse" id="mintGlow" r="0.5">
<stop stop-color="#b0f0d6"></stop>
<stop offset="1" stop-color="#f9f9ff" stop-opacity="0"></stop>
</radialgradient>
</defs>
</svg>
</div>
<div class="relative z-10 flex flex-col justify-between px-gutter-mobile py-space-sm gap-y-3">
<!-- Top Bar / Status Section -->
<header class="flex flex-col items-center text-center gap-1.5 pt-1">
<div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary-container/70 rounded-full">
<span class="inline-flex gap-0.5 items-end h-2.5">
<span class="w-0.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
<span class="w-0.5 h-2.5 bg-primary rounded-full animate-pulse" style="animation-delay: 150ms;"></span>
<span class="w-0.5 h-2 bg-primary rounded-full animate-pulse" style="animation-delay: 300ms;"></span>
</span>
<span class="font-label-sm text-label-sm text-on-secondary-container tracking-widest uppercase">
          MINT HARMONY — CHAPTER 30
        </span>
<span class="font-label-sm text-label-sm text-on-secondary-container/80 tracking-wider">
          • 1995–2025
        </span>
</div>
<p class="font-label-sm text-label-sm text-tertiary tracking-widest uppercase opacity-90">
        CHAPTER 30 • PRIVATE SOIRÉE • ED. 2025
      </p>
</header>
<!-- Geometric Seal & Monogram Container -->
<section class="flex flex-col items-center justify-center my-1">
<div class="relative group cursor-pointer transition-transform duration-300 hover:scale-105 active:scale-95" id="interactive-seal">
<!-- Prismatic Backglow -->
<div class="absolute -inset-3 bg-secondary-fixed/50 rounded-full blur-xl opacity-70"></div>
<!-- Faceted Outer Medallion Shell -->
<div class="relative w-[116px] h-[116px] p-1 bg-surface-container-lowest rounded-2xl flex items-center justify-center shadow-md">
<img alt="Chapter 30 Mint Soirée Faceted Octagonal Seal" class="w-[108px] h-[108px] object-contain drop-shadow-sm select-none" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<!-- Diamond Pin Node Bottom -->
<div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2.5 h-2.5 rotate-45 bg-primary shadow-xs"></div>
</div>
<!-- Tactile Micro-interaction Cue -->
<div class="mt-2.5 flex items-center gap-1.5">
<span class="text-primary text-[10px] select-none">◆</span>
<span class="font-label-sm text-label-sm text-primary tracking-widest uppercase">
          KETUK UNTUK MEMBUKA SEGEL
        </span>
<span class="text-primary text-[10px] select-none">◆</span>
</div>
</section>
<!-- Celebrant Masthead & Refined Quote -->
<section class="flex flex-col items-center text-center gap-1">
<span class="font-label-sm text-label-sm text-secondary tracking-widest uppercase">
        CELEBRATING THREE DECADES OF VISION &amp; GROWTH
      </span>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[320px] px-2 leading-relaxed">
        “Entering thirty with grounded clarity, creative energy, and deep gratitude for every milestone shared.”
      </p>
</section>
<!-- Personalized Guest Envelope Card (Kepada Yth) -->
<article class="relative bg-surface-container-lowest rounded-xl p-3.5 shadow-sm overflow-hidden">
<!-- Cut Gem Corner Accent Top-Right -->
<div class="absolute -top-6 -right-6 w-12 h-12 bg-secondary-container/40 rotate-45 pointer-events-none"></div>
<div class="flex items-center justify-between mb-2">
<span class="inline-flex items-center gap-1 px-2 py-0.5 bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm rounded-sm">
<span class="text-[9px]">★</span> VIP INVITATION
        </span>
<span class="font-label-sm text-label-sm text-secondary font-mono tracking-wider">
          ACCESS PASS • NO. 030-RD
        </span>
</div>
<div class="bg-surface-container-low p-3 rounded-lg flex flex-col gap-0.5">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </span>
<div class="flex items-baseline justify-between flex-wrap gap-1 mt-0.5">
<h2 class="font-headline-sm text-headline-sm text-primary font-bold tracking-tight" id="previewGuestNameCover">
            {{ $guestName }}
          </h2>
<span class="font-label-md text-label-md text-secondary italic">
            Di Tempat
          </span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 px-1 text-center leading-normal">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga perayaan ulang tahun ke-30 yang penuh kehangatan, inspirasi, dan rasa syukur.
      </p>
</article>
<!-- Primary Call-to-Action Component -->
<section class="flex flex-col items-center gap-2 pt-0.5">
<button class="w-full relative group overflow-hidden bg-primary active:bg-primary-container text-on-primary py-3.5 px-6 rounded-xl flex items-center justify-center gap-2.5 shadow-md transition-all duration-200" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-[19px]">mail</span>
<span class="font-label-lg text-label-lg tracking-wider font-bold">
          BUKA UNDANGAN
        </span>
<span class="material-symbols-outlined text-[19px] transition-transform duration-200 group-hover:translate-x-1">
          arrow_forward
        </span>
</button>
<!-- Event Quick Meta Badges -->
<div class="w-full flex flex-col items-center gap-1.5 pt-1">
<div class="flex items-center justify-center gap-1.5 font-label-md text-label-md text-on-surface-variant text-center">
<span class="material-symbols-outlined text-primary text-[16px]">calendar_today</span>
<span>{{ strtoupper($eventDateFormatted) }}</span>
<span>•</span>
<span class="material-symbols-outlined text-primary text-[16px]">location_on</span>
<span>THE LANGHAM JAKARTA</span>
</div>
<div class="inline-flex items-center justify-center px-2.5 py-1 bg-surface-container rounded-md max-w-full">
<p class="font-label-sm text-label-sm text-secondary text-center tracking-tight truncate">
            DRESS CODE: FRESH MINT &amp; MODERN BLACK TIE • RSVP STRICTLY REQUIRED
          </p>
</div>
</div>
</section>
</div>
</div>
<script>
  (function() {
    const seal = document.getElementById('interactive-seal');
    const openBtn = document.getElementById('btn-open-invitation');

    function triggerOpeningCelebration(e) {
      if (openBtn) {
        openBtn.classList.add('scale-95', 'opacity-90');
        setTimeout(() => {
          openBtn.classList.remove('scale-95', 'opacity-90');
        }, 180);
      }
    }

    if (seal) {
      seal.addEventListener('click', triggerOpeningCelebration);
    }
    if (openBtn) {
      openBtn.addEventListener('click', triggerOpeningCelebration);
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,105,72,0.06)] pt-safe"><div class="h-16 px-gutter-mobile flex items-center justify-between gap-space-sm"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-primary text-[20px]">diamond</span><h1 class="font-headline-sm text-headline-sm text-primary tracking-tight" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div><div class="flex items-center gap-space-xs"><div class="px-space-xs py-0.5 rounded bg-secondary-container text-on-secondary-container font-label-sm text-label-sm uppercase flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span><span>VIP GUEST</span></div><button aria-label="Toggle Sound" class="w-11 h-11 flex items-center justify-center rounded-full text-on-surface-variant hover:text-primary transition-colors" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 flex flex-col relative w-full pt-16 pb-20 bg-surface"><div class="flex flex-col w-full">
<!-- SECTION 1: HERO & CELEBRANT SHOWCASE -->
<section class="relative px-gutter-mobile pt-4 pb-space-lg">
<!-- Top Milestone Badge Ribbon -->
<div class="flex justify-center mb-space-sm">
<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-secondary-container text-on-secondary-container shadow-sm">
<span class="material-symbols-outlined text-[14px]">diamond</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase font-bold">1995 • CHAPTER XXX • 2025 | 30TH MILESTONE SOIRÉE</span>
</div>
</div>
<!-- Architectural Faceted Hero Card -->
<div class="relative bg-surface-container-low rounded-xl overflow-hidden shadow-md">
<!-- Image Showcase -->
<div class="relative w-full aspect-[4/5] overflow-hidden">
<img alt="Reyhan Danendra at 30th Milestone celebration wearing an emerald green tailored suit holding a glass in a lush greenhouse pavilion" class="w-full h-full object-cover object-top" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface via-inverse-surface/30 to-transparent"></div>
<!-- Top Overlay Geometric Tag -->
<div class="absolute top-4 left-4 right-4 flex justify-between items-center">
<div class="px-2.5 py-1 rounded bg-inverse-surface/80 backdrop-blur-md text-primary-fixed font-label-sm text-label-sm tracking-widest uppercase flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-primary-fixed"></span>
<span>CHAPTER 30 | THE GLASSHOUSE ATRIUM</span>
</div>
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center shadow">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
</div>
<!-- Hero Bottom Typography Content -->
<div class="absolute bottom-0 inset-x-0 p-space-md text-inverse-on-surface">
<div class="flex items-center gap-2 mb-1">
<span class="font-label-md text-label-md text-primary-fixed tracking-widest uppercase">The Celebrant</span>
<div class="h-px w-8 bg-primary-fixed/40"></div>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-inverse-on-surface tracking-tight uppercase font-extrabold mb-2">
            REYHAN DANENDRA
          </h2>
<p class="font-body-sm text-body-sm text-inverse-on-surface/90 italic leading-relaxed">
            “Reflecting on three decades of growth, crafting visions with intent, and celebrating with the people who make this journey extraordinary.”
          </p>
</div>
</div>
<!-- Quick Sub-Strip -->
<div class="bg-primary px-space-md py-3 flex items-center justify-between text-on-primary">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">event</span>
<span class="font-label-md text-label-md font-medium tracking-wide">{{ $eventDateFormatted }}</span>
</div>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span class="font-label-md text-label-md font-semibold">SCBD Jakarta</span>
</div>
</div>
</div>
</section>
<!-- SECTION 2: PERSONALIZED GUEST WELCOME & TABLE ASSIGNMENT -->
<section class="px-gutter-mobile pb-space-lg">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm relative overflow-hidden">
<div class="flex flex-wrap justify-between items-center gap-x-4 gap-y-2 mb-3">
<div>
<span class="font-label-sm text-xs text-primary uppercase font-bold tracking-wider">Kepada Yth. Tamu Kehormatan:</span>
<h3 class="font-headline-sm text-lg sm:text-xl text-on-surface mt-0.5 font-bold" id="previewGuestNameMain">{{ $guestName }}</h3>
</div>
<div class="px-2.5 py-1 rounded bg-primary text-on-primary text-[10px] font-semibold tracking-wider flex items-center gap-1 shadow-sm shrink-0">
<span class="material-symbols-outlined text-[13px]">stars</span>
<span>VIP PASS</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4 leading-relaxed">
        Merupakan kehormatan tak terhingga bagi kami untuk menyambut Anda secara langsung merayakan tonggak babak ke-30 ini bersama dalam kehangatan botani The Glasshouse.
      </p>
<!-- Table Reservation Allocation Chip -->
<div class="bg-surface-bright rounded-lg p-3 flex items-center gap-3 shadow-inner">
<div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">table_bar</span>
</div>
<div class="flex-1 min-w-0">
<div class="font-label-sm text-label-sm text-primary uppercase font-bold">Meja Reservasi VIP</div>
<div class="font-body-md text-body-md text-on-surface font-semibold truncate">MINT BOTANICA SUITE A-08</div>
<div class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">(Kapasitas Terdaftar: 2 Tamu Khusus)</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: PROFIL SINGKAT (SEKILAS PERJALANAN DI USIA 30) -->
<section class="px-gutter-mobile pb-space-lg">
<div class="flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-primary text-[22px]">view_in_ar</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Sekilas Perjalanan di Usia 30</h3>
</div>
<div class="bg-surface-container-high rounded-xl p-space-md space-y-3 shadow-sm mb-3">
<!-- Stage 01 -->
<div class="bg-surface-bright p-3.5 rounded-lg shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container text-primary font-label-sm text-label-sm font-bold">1995 – 2015</span>
<span class="font-label-md text-label-md text-secondary font-bold">STAGE 01</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold mb-1">The Foundations</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Masa pembentukan nilai dasar integritas, rasa ingin tahu arsitektural, serta eksplorasi ilmu pengetahuan yang menjadi pondasi cara berpikir mandiri.
        </p>
</div>
<!-- Stage 02 -->
<div class="bg-surface-bright p-3.5 rounded-lg shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<span class="px-2 py-0.5 rounded bg-surface-container text-primary font-label-sm text-label-sm font-bold">2016 – 2024</span>
<span class="font-label-md text-label-md text-secondary font-bold">STAGE 02</span>
</div>
<div class="font-headline-sm text-[16px] text-on-surface font-bold mb-1">Venture &amp; Resilience</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Membangun karier profesional di bidang sustainable design, merintis inovasi berdampak tinggi, serta memupuk lingkar persahabatan sejati.
        </p>
</div>
<!-- Stage 03 -->
<div class="bg-primary text-on-primary p-3.5 rounded-lg shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<span class="px-2 py-0.5 rounded bg-on-primary/20 text-on-primary font-label-sm text-label-sm font-bold">2025 &amp; BEYOND</span>
<span class="font-label-md text-label-md text-primary-fixed font-bold">STAGE 03</span>
</div>
<div class="font-headline-sm text-[16px] text-on-primary font-bold mb-1">Clarity &amp; Synthesis</div>
<p class="font-body-sm text-body-sm text-on-primary-container leading-relaxed">
          Memasuki babak usia 30 dengan ketenangan batin, komitmen dedikasi sosial, dan visi masa depan terukur untuk berkontribusi bagi masyarakat luas.
        </p>
</div>
</div>
<!-- Persona Chip -->
<div class="bg-secondary-container text-on-secondary-container p-3 rounded-lg flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">architecture</span>
<p class="font-body-sm text-body-sm font-medium">
        Architect by profession, vinyl &amp; espresso enthusiast by passion, and marathon runner by discipline.
      </p>
</div>
</section>
<!-- SECTION 4: JADWAL ACARA & LIVE COUNTDOWN -->
<section class="px-gutter-mobile pb-space-lg">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">schedule</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Jadwal &amp; Countdown</h3>
</div>
<span class="font-label-sm text-label-sm text-primary bg-secondary-container px-2 py-0.5 rounded font-bold uppercase">WIB (GMT+7)</span>
</div>
<!-- Live Countdown Card -->
<div class="bg-inverse-surface text-inverse-on-surface rounded-xl p-space-md shadow-md mb-4">
<div class="text-center mb-3">
<div class="font-label-sm text-label-sm text-primary-fixed uppercase tracking-widest font-bold">Waktu Menuju Perayaan</div>
<div class="font-body-sm text-body-sm text-surface-variant font-medium mt-0.5">{{ $eventDateFormatted }} • 18.30 WIB</div>
</div>
<!-- 4 Segmented Boxes -->
<div class="grid grid-cols-4 gap-2 mb-4">
<div class="bg-surface-variant/20 rounded-lg p-2 flex flex-col items-center justify-center">
<span class="font-headline-lg-mobile text-[26px] font-extrabold text-primary-fixed" id="cd-days">42</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-inverse-on-surface/70 text-[9px]">HARI</span>
</div>
<div class="bg-surface-variant/20 rounded-lg p-2 flex flex-col items-center justify-center">
<span class="font-headline-lg-mobile text-[26px] font-extrabold text-primary-fixed" id="cd-hours">07</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-inverse-on-surface/70 text-[9px]">JAM</span>
</div>
<div class="bg-surface-variant/20 rounded-lg p-2 flex flex-col items-center justify-center">
<span class="font-headline-lg-mobile text-[26px] font-extrabold text-primary-fixed" id="cd-mins">18</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-inverse-on-surface/70 text-[9px]">MENIT</span>
</div>
<div class="bg-surface-variant/20 rounded-lg p-2 flex flex-col items-center justify-center">
<span class="font-headline-lg-mobile text-[26px] font-extrabold text-primary-fixed" id="cd-secs">30</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-inverse-on-surface/70 text-[9px]">DETIK</span>
</div>
</div>
<!-- Add to Calendar Button -->
<button class="w-full py-2.5 px-4 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider font-bold flex items-center justify-center gap-2 active:scale-[0.98] transition-transform shadow-sm" onclick="alert('Acara Chapter 30 Reyhan Danendra berhasil disinkronkan ke kalender Anda!')">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
<span>Simpan ke Google Calendar</span>
</button>
</div>
<!-- Timeline / Rundown Cards -->
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
        $timeBg = ($index % 2 === 0) ? "bg-secondary-container text-on-secondary-container" : "bg-primary text-on-primary";
    @endphp
    <div class="bg-surface-container rounded-xl p-space-md flex gap-3 shadow-sm event-itinerary-item">
        <div class="w-16 py-1.5 rounded-lg {{ $timeBg }} flex flex-col items-center justify-center shrink-0">
            <span class="font-headline-sm text-[13px] font-bold">{{ $evTimeStr }}</span>
        </div>
        <div class="flex-1 min-w-0">
            <span class="font-label-sm text-[10px] text-primary uppercase font-bold tracking-wide block">SESI {{ $index + 1 }}</span>
            <h4 class="font-headline-sm text-[16px] text-on-surface font-bold mt-0.5 leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary block mt-0.5 font-semibold">📅 {{ $evDateStr }}</span>
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
</section>
<!-- SECTION 5: LOKASI ACARA & AKSES VENUE -->
<section class="px-gutter-mobile pb-space-lg">
<div class="flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-primary text-[22px]">location_city</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Lokasi Acara &amp; Akses Venue</h3>
</div>
<div class="bg-surface-container-low rounded-xl overflow-hidden shadow-sm">
<!-- Simulated Map Box -->
<div class="w-full h-44 bg-cover bg-center relative" data-location="The Langham, Jakarta District 8 SCBD" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAeXUpDwpW3usBaXcZqs99uVm_8EnUXMzCHEsintA8-bob94jB4AgdUxUop42gCDFV6GFU6WRsjamkzHKkZbIgh2QQt2bIeKJ7C2YoiEKelZmTt6C5iGyh7GE3HhQmZ0giRG6RD6_2GXkfZCl7AtxLup1iEOAeTda5lvNKssBLp5-460t7O1aELpwj80Fd7fLsY4ag8YJDI_Ub3j47kh8JgTOpknZdTTNdzCESikvAT')">
<div class="absolute inset-0 bg-primary/20 backdrop-blur-[1px]"></div>
<div class="absolute inset-0 flex items-center justify-center">
<div class="px-3.5 py-2 rounded-xl bg-inverse-surface/90 text-inverse-on-surface flex items-center gap-2 shadow-lg backdrop-blur-md">
<span class="material-symbols-outlined text-primary-fixed text-[20px]">pin_drop</span>
<div>
<div class="font-label-md text-label-md font-bold">The Glasshouse Atrium</div>
<div class="font-body-sm text-[11px] text-surface-variant">Level 5, The Langham Jakarta</div>
</div>
</div>
</div>
</div>
<div class="p-space-md">
<h4 class="font-headline-sm text-[17px] text-on-surface font-bold">The Langham Jakarta</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
          District 8 SCBD, Jl. Jend. Sudirman Kav 52–53, Senayan, Kebayoran Baru, Jakarta Selatan 12190
        </p>
<!-- Valet Info -->
<div class="mt-3 p-2.5 rounded bg-surface-container flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px]">local_parking</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">
            Layanan VIP Valet &amp; Drop-off tamu khusus tersedia di lobby utama The Langham.
          </span>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-2 mt-4">
<a id="previewMapsLinkMain" class="py-2.5 px-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-bold flex items-center justify-center gap-1.5 shadow-sm active:scale-95 transition-transform" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">map</span>
<span>BUKA MAPS</span>
</a>
<button class="py-2.5 px-3 rounded-lg bg-secondary-container text-on-secondary-container font-label-md text-label-md font-bold flex items-center justify-center gap-1.5 active:scale-95 transition-transform" onclick="navigator.clipboard?.writeText('{{ addslashes($venueAddress) }}'); alert('Alamat disalin ke clipboard!');">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span>SALIN ALAMAT</span>
</button>
</div>
</div>
</div>
</section>
<!-- SECTION 6: PANDUAN TATA BUSANA (DRESS CODE GUIDE) -->
<section class="px-gutter-mobile pb-space-lg">
<div class="bg-surface-container-high rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary text-[22px]">apparel</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Dress Code: Modern Mint &amp; Black Tie</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-4">
        Untuk menciptakan atmosfer malam yang elegan, terstruktur, dan selaras dengan nuansa segar botanical glasshouse:
      </p>
<!-- Palette Swatches -->
<div class="mb-4">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase font-bold tracking-wider mb-2">Pilihan Palet Busana:</div>
<div class="grid grid-cols-5 gap-1.5">
<div class="flex flex-col items-center">
<div class="w-full h-8 rounded bg-primary shadow-sm"></div>
<span class="font-label-sm text-[10px] mt-1 text-on-surface-variant font-medium">Deep Mint</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full h-8 rounded bg-secondary-container shadow-sm"></div>
<span class="font-label-sm text-[10px] mt-1 text-on-surface-variant font-medium">Fresh Sage</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full h-8 rounded bg-inverse-surface shadow-sm"></div>
<span class="font-label-sm text-[10px] mt-1 text-on-surface-variant font-medium">Charcoal</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full h-8 rounded bg-surface-container-highest shadow-sm"></div>
<span class="font-label-sm text-[10px] mt-1 text-on-surface-variant font-medium">Silver</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full h-8 rounded bg-surface-container-lowest shadow-sm"></div>
<span class="font-label-sm text-[10px] mt-1 text-on-surface-variant font-medium">White</span>
</div>
</div>
</div>
<!-- Gender Guides -->
<div class="space-y-2.5">
<div class="bg-surface-bright p-3 rounded-lg shadow-sm">
<div class="flex items-center gap-1.5 text-primary mb-1">
<span class="material-symbols-outlined text-[16px]">man</span>
<span class="font-label-md text-label-md uppercase font-bold">Gentlemen (Tamu Pria)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Modern tailored dark emerald atau sharp charcoal suit dengan aksen pocket square mint green atau bowtie, dipadukan kemeja crisp white dress shirt.
          </p>
</div>
<div class="bg-surface-bright p-3 rounded-lg shadow-sm">
<div class="flex items-center gap-1.5 text-primary mb-1">
<span class="material-symbols-outlined text-[16px]">woman</span>
<span class="font-label-md text-label-md uppercase font-bold">Ladies (Tamu Wanita)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Chic architectural cocktail dress atau modern evening gown bernuansa fresh mint, sage green, emerald, sleek black, atau champagne silver yang anggun.
          </p>
</div>
</div>
</div>
</section>
<!-- SECTION 7: GALERI FOTO (GALERI BABAK 30) -->
<section class="px-gutter-mobile pb-space-lg">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">photo_library</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Galeri Babak 30</h3>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold">4 MOMEN</span>
</div>
<!-- 4 Images Grid Bento -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-2.5">
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
<!-- SECTION 8: KONFIRMASI KEHADIRAN TAMU VIP (RSVP) -->
<section class="px-gutter-mobile pb-space-lg" id="rsvp-section">
<div class="bg-surface-container rounded-xl p-space-md shadow-md">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary text-[22px]">how_to_reg</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Konfirmasi Kehadiran</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">
        Mohon mengisi konfirmasi kehadiran sebelum <span class="font-bold text-primary">20 November 2025</span> demi kelancaran tata letak jamuan makan malam.
      </p>
<form class="space-y-3.5" onsubmit="event.preventDefault(); alert('Terima kasih! Konfirmasi kehadiran Anda telah tersimpan dengan aman.');">
<!-- Field 1: Nama -->
<div>
<label class="block font-label-md text-label-md text-on-surface uppercase font-bold mb-1">Nama Lengkap Tamu</label>
<input class="w-full px-3 py-2.5 rounded-lg bg-surface-bright text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary shadow-inner" type="text" value="{{ $guestName }}"/>
</div>
<!-- Field 2: Jumlah Tamu -->
<div>
<label class="block font-label-md text-label-md text-on-surface uppercase font-bold mb-1">Jumlah Kehadiran</label>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center gap-2 p-2.5 rounded-lg bg-surface-bright cursor-pointer has-[:checked]:bg-secondary-container has-[:checked]:text-on-secondary-container">
<input class="accent-primary" name="pax" type="radio" value="1"/>
<span class="font-body-sm text-body-sm font-semibold">1 Orang</span>
</label>
<label class="flex items-center gap-2 p-2.5 rounded-lg bg-surface-bright cursor-pointer has-[:checked]:bg-secondary-container has-[:checked]:text-on-secondary-container">
<input checked="" class="accent-primary" name="pax" type="radio" value="2"/>
<span class="font-body-sm text-body-sm font-semibold">2 Orang (Pasangan)</span>
</label>
</div>
</div>
<!-- Field 3: Status Kehadiran -->
<div>
<label class="block font-label-md text-label-md text-on-surface uppercase font-bold mb-1">Kepastian Kehadiran</label>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center justify-center gap-1.5 p-2.5 rounded-lg bg-surface-bright cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-on-primary">
<input checked="" class="hidden" name="attendance" type="radio" value="hadir"/>
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span class="font-body-sm text-body-sm font-bold">Ya, Hadir</span>
</label>
<label class="flex items-center justify-center gap-1.5 p-2.5 rounded-lg bg-surface-bright cursor-pointer has-[:checked]:bg-error has-[:checked]:text-on-error">
<input class="hidden" name="attendance" type="radio" value="berhalangan"/>
<span class="material-symbols-outlined text-[18px]">cancel</span>
<span class="font-body-sm text-body-sm font-bold">Berhalangan</span>
</label>
</div>
</div>
<!-- Field 4: Ucapan & Doa -->
<div>
<label class="block font-label-md text-label-md text-on-surface uppercase font-bold mb-1">Pesan &amp; Doa Hangat</label>
<textarea class="w-full px-3 py-2.5 rounded-lg bg-surface-bright text-on-surface font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary shadow-inner" placeholder="Tuliskan ucapan selamat atau doa untuk babak ke-30 Reyhan..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full py-3 px-4 rounded-lg bg-primary text-on-primary font-label-lg text-label-lg uppercase tracking-wider font-bold flex items-center justify-center gap-2 shadow-md active:scale-[0.99] transition-transform" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
<span>Kirim Konfirmasi &amp; Doa</span>
</button>
</form>
</div>
</section>
<!-- SECTION 9: UNTAIAN DOA & HARAPAN (BUKU TAMU DIGITAL) -->
<section class="px-gutter-mobile pb-space-lg">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">rate_review</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Untaian Doa &amp; Harapan</h3>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold">BUKU TAMU</span>
</div>
<div class="space-y-2.5">
<!-- Comment 1 -->
<div class="bg-surface-container rounded-xl p-3.5 shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md flex items-center justify-center font-bold">
              AS
            </div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">Arya Senjaya</span>
<span class="font-label-sm text-[10px] text-primary block leading-none">Partner Architect</span>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Selamat menyambut usia 30, Rey! Semoga visi arsitektural dan ketenangan hidup semakin matang serta berdampak luas. Sampai jumpa di malam selebrasi!
        </p>
</div>
<!-- Comment 2 -->
<div class="bg-surface-container rounded-xl p-3.5 shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center font-bold">
              CA
            </div>
<div>
<span class="font-label-md text-label-md text-on-surface font-bold">Clara Anastasia</span>
<span class="font-label-sm text-[10px] text-primary block leading-none">Sahabat</span>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Chapter 30 is going to be your best chapter yet. Cannot wait to toast together at The Glasshouse! Proud of your journey always.
        </p>
</div>
</div>
</section>
<!-- SECTION 10: TANDA KASIH DIGITAL (DIGITAL ENVELOPE) -->
<section class="px-gutter-mobile pb-space-lg">
<div class="bg-surface-container-high rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary text-[22px]">featured_seasonal_and_gifts</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">Tanda Kasih Digital</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-4">
        Kehadiran dan doa restu Anda adalah anugerah terbesar bagi kami. Namun apabila Anda berkehendak memberikan tanda kasih, dapat disalurkan melalui rekening resmi:
      </p>
<div class="space-y-2.5">
<!-- Bank 1 Card -->
<div class="bg-surface-bright rounded-lg p-3 flex items-center justify-between shadow-sm mb-3">
<div>
<div class="font-label-sm text-label-sm text-primary uppercase font-bold">{{ $bankName1 }}</div>
<div class="font-body-md text-body-md font-bold text-on-surface tracking-wider mt-0.5" id="bca-acc">{{ $bankAccount1 }}</div>
<div class="font-body-sm text-[11px] text-on-surface-variant">a.n. {{ $bankHolder1 }}</div>
</div>
<button class="px-3 py-1.5 rounded bg-secondary-container text-on-secondary-container font-label-sm text-label-sm uppercase font-bold hover:bg-secondary hover:text-on-secondary transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-bright rounded-lg p-3 flex items-center justify-between shadow-sm">
<div>
<div class="font-label-sm text-label-sm text-secondary uppercase font-bold">{{ $bankName2 }}</div>
<div class="font-body-md text-body-md font-bold text-on-surface tracking-wider mt-0.5" id="mandiri-acc">{{ $bankAccount2 }}</div>
<div class="font-body-sm text-[11px] text-on-surface-variant">a.n. {{ $bankHolder2 }}</div>
</div>
<button class="px-3 py-1.5 rounded bg-secondary-container text-on-secondary-container font-label-sm text-label-sm uppercase font-bold hover:bg-secondary hover:text-on-secondary transition-colors" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- SECTION 11: CLOSING & FOOTER -->
<footer class="px-gutter-mobile pb-6 pt-2 flex flex-col items-center text-center">
<!-- Emblem Seal -->
<div class="w-20 h-20 mb-3 drop-shadow">
<img alt="{{ $couple->events->first()->title ?? 'Mint Soirée Chapter 30' }} Emblem Seal" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUa5nKhZ0fyl6HfSUiPmVfYSRkugaoIIVwHkk1ENHonrCXMjoMxptho-zDpnPvxzfHS5SwArIvMT9AJmWIksSEqiOFb0BawlfKgKS1ZE1TmBUIF7QjoHISS_Nbp8JKzK9PzMOIAA4lnzN2K8TuWzO8UDwFHaA4Res8LSgDUN-aVENIlxhskSils4ZdaPSKY1ReSqU0khblEOI4qiqC42YhbQwf4YG8aZ8TXg2SddA3"/>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">
      Sampai Jumpa di Malam Penuh Syukur &amp; Kebersamaan
    </h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5 max-w-xs leading-relaxed">
      Terima kasih atas persahabatan, inspirasi, dan kebersamaan yang telah memperkaya tiga dekade kehidupan ini.
    </p>
<div class="mt-4 pt-3 flex flex-col items-center">
<span class="font-label-sm text-label-sm text-primary uppercase tracking-widest font-extrabold">
        REYHAN DANENDRA &amp; KELUARGA BESAR
      </span>
<span class="font-body-sm text-[11px] text-on-surface-variant mt-0.5">
        Jakarta, Indonesia • Chapter 30 • 2025
      </span>
</div>
</footer>
<!-- Countdown Micro-interaction Script -->
<script>
    (function initCountdown() {
      let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
      function update() {
        const now = new Date().getTime();
        const diff = targetDate - now;
        if (diff > 0) {
          const days = Math.floor(diff / (1000 * 60 * 60 * 24));
          const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
          const secs = Math.floor((diff % (1000 * 60)) / 1000);
          
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
      setInterval(update, 1000);
      update();
      window.updateTargetDate = function(newDateStr) {
        if (newDateStr) {
          targetDate = new Date(newDateStr).getTime();
          update();
        }
      };
    })();
  </script>
</div></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(0,105,72,0.08)]" data-active-classes="text-primary font-bold"><div class="flex justify-around items-center h-20 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] py-1 transition-colors text-primary font-bold" data-path="undangan" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm tracking-wide mt-1">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] py-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="profil" href="#"><span class="material-symbols-outlined text-[22px]">celebration</span><span class="font-label-sm text-label-sm tracking-wide mt-1">Profil</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] py-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">calendar_today</span><span class="font-label-sm text-label-sm tracking-wide mt-1">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] py-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">pin_drop</span><span class="font-label-sm text-label-sm tracking-wide mt-1">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[54px] min-h-[44px] py-1 text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-sm text-label-sm tracking-wide mt-1">RSVP</span></a></div></nav>
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
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "18.00 - 22.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-bold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                const timeBg = (i % 2 === 0) ? "bg-secondary-container text-on-secondary-container" : "bg-primary text-on-primary";
                return `
                    <div class="bg-surface-container rounded-xl p-space-md flex gap-3 shadow-sm event-itinerary-item">
                        <div class="w-16 py-1.5 rounded-lg ${timeBg} flex flex-col items-center justify-center shrink-0">
                            <span class="font-headline-sm text-[13px] font-bold">${timeStr}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="font-label-sm text-[10px] text-primary uppercase font-bold tracking-wide block">SESI ${i + 1}</span>
                            <h4 class="font-headline-sm text-[16px] text-on-surface font-bold mt-0.5 leading-snug">${title}</h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-primary block mt-0.5 font-semibold">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'mint-soiree-geometric' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>