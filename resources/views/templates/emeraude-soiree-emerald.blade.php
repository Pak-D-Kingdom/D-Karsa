<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Émeraude Soirée XVII') . ' - ' . ($couple->groom_name ?? 'Madeleine Vivienne') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Madeleine Vivienne' }} - Sweet Seventeen - Editorial Emerald Green."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "on-surface-variant": "#404943", "secondary-fixed-dim": "#e9c349", "secondary-fixed": "#ffe088", "surface-container": "#eeeeea", "on-tertiary": "#ffffff", "outline": "#707973", "on-tertiary-fixed-variant": "#005137", "on-background": "#1a1c1a", "on-secondary-fixed-variant": "#574500", "primary-container": "#0f4d36", "primary-fixed-dim": "#98d3b5", "secondary": "#735c00", "surface-container-high": "#e8e8e4", "on-secondary-container": "#745c00", "on-error-container": "#93000a", "tertiary-fixed": "#a6f3cc", "surface-container-highest": "#e2e3df", "on-primary-fixed": "#002114", "on-tertiary-container": "#75c09c", "on-primary": "#ffffff", "surface-variant": "#e2e3df", "tertiary": "#003523", "surface-dim": "#dadad6", "surface-tint": "#306950", "outline-variant": "#c0c9c1", "inverse-on-surface": "#f1f1ed", "on-surface": "#1a1c1a", "on-tertiary-fixed": "#002114", "on-secondary-fixed": "#241a00", "primary": "#003523", "error": "#ba1a1a", "inverse-primary": "#98d3b5", "primary-fixed": "#b3f0d0", "tertiary-fixed-dim": "#8bd6b1", "tertiary-container": "#004e35", "error-container": "#ffdad6", "on-secondary": "#ffffff", "on-primary-container": "#82bd9f", "surface-container-lowest": "#ffffff", "secondary-container": "#fed65b", "background": "#f9faf6", "on-error": "#ffffff", "surface-bright": "#f9faf6", "on-primary-fixed-variant": "#145039", "inverse-surface": "#2f312f", "surface": "#f9faf6", "surface-container-low": "#f4f4f0" }, borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, spacing: { "space-sm": "0.5rem", "gutter-mobile": "1rem", "space-lg": "2rem", "space-md": "1rem", "margin": "4rem", "gutter": "1.5rem", "space-2xl": "5rem", "space-xl": "3.5rem", "margin-mobile": "1.25rem", "space-xs": "0.25rem" }, fontFamily: { "headline-lg": ["Bodoni Moda"], "headline-md": ["Bodoni Moda"], "label-caps-sm": ["Montserrat"], "headline-sm": ["Bodoni Moda"], "body-md": ["EB Garamond"], "body-lg": ["EB Garamond"], "display-hero-mobile": ["Bodoni Moda"], "headline-lg-mobile": ["Bodoni Moda"], "body-sm": ["EB Garamond"], "label-caps-lg": ["Montserrat"], "display-hero": ["Bodoni Moda"] }, fontSize: { "headline-lg": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "headline-md": ["28px", { "lineHeight": "36px", "letterSpacing": "0em", "fontWeight": "500" }], "label-caps-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.25em", "fontWeight": "600" }], "headline-sm": ["22px", { "lineHeight": "28px", "letterSpacing": "0.02em", "fontWeight": "600" }], "body-md": ["17px", { "lineHeight": "26px", "letterSpacing": "0.01em", "fontWeight": "400" }], "body-lg": ["20px", { "lineHeight": "32px", "letterSpacing": "0.01em", "fontWeight": "400" }], "display-hero-mobile": ["40px", { "lineHeight": "46px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "headline-lg-mobile": ["30px", { "lineHeight": "36px", "letterSpacing": "0em", "fontWeight": "400" }], "body-sm": ["14px", { "lineHeight": "22px", "letterSpacing": "0.01em", "fontWeight": "400" }], "label-caps-lg": ["12px", { "lineHeight": "16px", "letterSpacing": "0.2em", "fontWeight": "600" }], "display-hero": ["72px", { "lineHeight": "76px", "letterSpacing": "-0.02em", "fontWeight": "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Madeleine Vivienne';
        $celebrantNick = $couple->groom_nickname ?? 'Madeleine';
        $heading = $couple->event_heading ?? 'Émeraude Soirée XVII';
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
        $quote = $couple->quote ?? 'Under emerald chandeliers and starlit grace, seventeen unfolds into timeless splendor.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBhS57GdwXS7BcmAoPGMiaqAD6TDHSdOO5z0Ifzw2vW4w9BLS8nr0xUR1J4YA1I4dHcusw9bOCtthRNwB4HBpic7i1Pmc_2IeUSvzhlXA9nAC7-6RKYxRukb1qo_5xkVc7ltC4Xj2C1Xn-nwCGF_fDUcqO7HebRBVNnWc_WTAgDCyQWvMNDtuQnc0S43zVmR5RZviITPOuy7m_KMHxFUbA2iIF0J7ECB78VE28wp5vq';
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

        $venueName = $couple->venue_name ?? 'The Emerald Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Jl. Jenderal Sudirman Kav. 52-53, SCBD, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBhS57GdwXS7BcmAoPGMiaqAD6TDHSdOO5z0Ifzw2vW4w9BLS8nr0xUR1J4YA1I4dHcusw9bOCtthRNwB4HBpic7i1Pmc_2IeUSvzhlXA9nAC7-6RKYxRukb1qo_5xkVc7ltC4Xj2C1Xn-nwCGF_fDUcqO7HebRBVNnWc_WTAgDCyQWvMNDtuQnc0S43zVmR5RZviITPOuy7m_KMHxFUbA2iIF0J7ECB78VE28wp5vq', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCd-ENonzumyCYOCyrSUraxVo1b8fjifTsBBrSrfvMSJVqAGDkqfPSQYUQ9NN73mv043VtafFqw9S9KfGDSybPVmWb7hgHsTO_K_NCzqdAQPb3AZVLTq2Fbm80LAX7HmIovRGtjWrLNbMUL4kOgbTS3ezL0EElceoSvAlndIVf1ih5Hfy2Bar5UOLiGGlg6Yq5HKsKRfGV_mAJPdb4vP2yJDxSvU2BVoc7Sk8RUA1TM', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 w-full bg-surface flex flex-col"><div class="flex flex-col w-full min-w-0 px-4 py-3 select-none">
<!-- Interactive Envelope Experience Wrapper -->
<div class="relative w-full flex flex-col justify-between bg-surface-container-low rounded-lg shadow-xl overflow-hidden p-5 transition-all duration-700" id="envelope-viewport">
<!-- Editorial Masthead Header -->
<header class="flex flex-col items-center text-center space-y-1">
<div class="flex items-center justify-between w-full pb-1">
<span class="font-label-caps-sm text-label-caps-sm uppercase tracking-widest text-on-surface-variant opacity-80">
          ISSUE NO. 17
        </span>
<div class="flex items-center space-x-1 px-2 py-0.5 rounded-full bg-surface-container shadow-sm">
<span class="material-symbols-outlined text-secondary animate-pulse text-xs" style="font-variation-settings: 'FILL' 1;">music_note</span>
<span class="font-label-caps-sm text-label-caps-sm text-on-surface-variant truncate max-w-[170px]">
            Golden Waltz in E Minor
          </span>
</div>
<span class="font-label-caps-sm text-label-caps-sm uppercase tracking-widest text-on-surface-variant opacity-80">
          MMXXV
        </span>
</div>
<div class="w-full flex items-center justify-center space-x-2 pt-1">
<div class="h-px flex-1 bg-outline-variant opacity-40"></div>
<span class="font-label-caps-lg text-label-caps-lg uppercase tracking-widest text-secondary font-medium px-2">
          ÉMERAUDE SOIRÉE EDITION
        </span>
<div class="h-px flex-1 bg-outline-variant opacity-40"></div>
</div>
</header>
<!-- Center Stage: The Gala Seal & Guest Enclosure -->
<div class="my-auto flex flex-col items-center text-center space-y-4 pt-2 pb-2">
<!-- Titular Monogram Heading -->
<div class="space-y-1">
<p class="font-label-caps-sm text-label-caps-sm tracking-widest uppercase text-secondary font-semibold">
          THE SWEET SEVENTEEN SOIRÉE
        </p>
<h1 class="font-display-hero-mobile text-display-hero-mobile text-primary tracking-tight italic" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant italic px-4 max-w-xs mx-auto opacity-90">
          “Under emerald chandeliers and starlit grace, seventeen unfolds into timeless splendor.”
        </p>
</div>
<!-- Wax Seal Interactive Centerpiece -->
<div class="relative flex flex-col items-center justify-center group cursor-pointer" id="wax-seal-button">
<!-- Ambient Luminous Glow -->
<div class="absolute w-28 h-28 rounded-full bg-secondary-fixed opacity-30 blur-xl animate-pulse"></div>
<!-- Wax Seal Badge -->
<div class="relative w-24 h-24 rounded-full shadow-2xl transition-transform duration-500 transform group-hover:scale-105 active:scale-95 flex items-center justify-center bg-primary overflow-hidden">
<img alt="Émeraude Soirée XVII Medallion" class="w-full h-full object-cover transition-opacity duration-300" id="previewCoverPhotoImg" src="{{ $coverImg }}"/>
</div>
<!-- Tactile Cue -->
<div class="flex items-center space-x-1.5 mt-2 transition-opacity duration-300" id="seal-caption">
<span class="inline-block w-1.5 h-1.5 rounded-full bg-secondary animate-ping"></span>
<span class="font-label-caps-sm text-label-caps-sm text-secondary tracking-widest uppercase font-semibold">
            KETUK UNTUK MEMBUKA SEGEL
          </span>
</div>
</div>
<!-- Editorial Formal Enclosure Card -->
<div class="w-full max-w-sm bg-surface rounded shadow-md p-4 transition-all duration-500" id="invitation-card">
<div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1.5 pb-2 mb-2">
<span class="px-2 py-0.5 bg-primary-container text-on-primary text-[10px] tracking-wider uppercase rounded-xs shrink-0">
VIP INVITATION
</span>
<span class="text-[10px] tracking-wider text-secondary font-medium shrink-0 ml-auto sm:ml-0">
EXCLUSIVE ACCESS
</span>
</div>
<div class="space-y-1 text-center">
<p class="font-label-caps-sm text-label-caps-sm uppercase tracking-wider text-on-surface-variant font-medium">
            KEPADA YTH. BAPAK / IBU / SAUDARA/I:
          </p>
<div class="py-1">
<h2 class="font-headline-md text-headline-md text-primary font-normal tracking-wide" id="previewGuestNameCover">
              {{ $guestName }}
            </h2>
<p class="font-body-sm text-body-sm text-on-surface-variant italic">
              Di Tempat
            </p>
</div>
<p class="font-body-sm text-body-sm text-on-surface text-center px-1 pt-1 opacity-90 leading-relaxed">
            Merupakan kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan langkah berharga usia ketujuh belas penuh rasa syukur.
          </p>
</div>
</div>
</div>
<!-- Bottom Actions & Fine Event Metadata -->
<footer class="flex flex-col items-center text-center space-y-3 pt-2">
<!-- Primary Editorial Button -->
<button class="w-full max-w-xs flex items-center justify-center space-x-2 py-3.5 px-6 bg-primary-container text-on-primary shadow-lg rounded hover:bg-primary active:scale-98 transition-all duration-300" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-secondary-fixed text-lg" style="font-variation-settings: 'FILL' 1;">mail</span>
<span class="font-label-caps-lg text-label-caps-lg uppercase tracking-widest text-secondary-fixed font-semibold">
          BUKA UNDANGAN
        </span>
<span class="material-symbols-outlined text-secondary-fixed text-sm">arrow_forward</span>
</button>
<!-- Event Coordinates & RSVP Notice -->
<div class="space-y-1">
<p class="font-label-caps-sm text-label-caps-sm tracking-widest uppercase text-on-surface font-semibold">
          {{ strtoupper($eventDateFormatted) }} • THE ST. REGIS GRAND BALLROOM, JAKARTA
        </p>
<p class="font-label-caps-sm text-label-caps-sm tracking-widest text-on-surface-variant opacity-75">
          #EMERAUDESOIREEXVII • RSVP STRICTLY REQUIRED
        </p>
</div>
</footer>
<!-- Unsealed State Modal / Overlay (Revealed on Open) -->
<div class="absolute inset-0 bg-primary/95 text-on-primary p-6 flex flex-col justify-between items-center text-center opacity-0 pointer-events-none transition-opacity duration-500 z-30" id="unsealed-notification">
<div class="pt-4 flex flex-col items-center">
<span class="material-symbols-outlined text-secondary-fixed text-4xl mb-2" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-caps-sm text-label-caps-sm tracking-widest text-secondary-fixed uppercase">SEGEL RESMI DIBUKA</span>
</div>
<div class="space-y-3 px-2">
<h3 class="font-headline-lg-mobile text-headline-lg-mobile text-on-primary italic">
          Selamat Datang di Émeraude Soirée
        </h3>
<p class="font-body-md text-body-md text-on-primary-container max-w-xs mx-auto">
          Undangan digital eksklusif Anda telah divalidasi. Bersiaplah melangkah ke dalam malam penuh pesona dan kemegahan.
        </p>
</div>
<div class="w-full max-w-xs pb-4">
<button class="w-full py-3.5 px-6 bg-secondary-fixed text-on-secondary-fixed font-label-caps-lg text-label-caps-lg uppercase tracking-widest font-semibold rounded shadow-md transition-transform active:scale-95" id="proceed-btn" type="button">
          LANJUTKAN KE PROGRAM RESMI
        </button>
</div>
</div>
</div>
</div>
<script>
  (function () {
    const sealBtn = document.getElementById('wax-seal-button');
    const openBtn = document.getElementById('open-invite-btn');
    const modal = document.getElementById('unsealed-notification');
    const proceedBtn = document.getElementById('proceed-btn');
    const caption = document.getElementById('seal-caption');

    function triggerUnseal() {
      if (!modal) return;
      // Animate seal breaking
      if (caption) {
        caption.innerHTML = '<span class="font-label-caps-sm text-label-caps-sm text-secondary tracking-widest font-semibold">MEMBUKA AKSES...</span>';
      }
      
      // Gentle reveal
      setTimeout(() => {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
      }, 350);
    }

    if (sealBtn) {
      sealBtn.addEventListener('click', triggerUnseal);
    }

    if (openBtn) {
      openBtn.addEventListener('click', triggerUnseal);
    }

    if (proceedBtn) {
      proceedBtn.addEventListener('click', function () {
        // Emulate transitioning to page 2 / section narrative
        window.scrollTo({ top: window.innerHeight, behavior: 'smooth' });
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100', 'pointer-events-auto');
      });
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm"><div class="w-9 h-9 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-headline-sm text-headline-sm select-none">M</div><div class="flex flex-col"><span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase">Émeraude Soirée XVII</span><span class="font-body-sm text-body-sm text-on-surface-variant italic">Main Invitation</span></div></div><div class="flex items-center gap-space-sm"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Valse Musique" class="min-w-[44px] min-h-[44px] w-11 h-11 rounded-full flex items-center justify-center text-primary bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer"><span class="material-symbols-outlined text-[20px]">music_note</span></button><img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq"/></div></div></header><main class="flex-1 w-full bg-surface pt-16 pb-24"><div class="flex flex-col w-full space-y-12 pb-16">
<!-- 1. Editorial Hero & Debutante Showcase -->
<section class="flex flex-col items-center px-gutter-mobile pt-4 text-center">
<!-- Monogram Header Seal -->
<div class="relative w-20 h-20 mb-6 flex items-center justify-center">
<img alt="Émeraude Soirée XVII Monogram Emblem" class="w-full h-full object-contain drop-shadow-md" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq"/>
</div>
<!-- Editorial Badge -->
<div class="bg-surface-container-high px-4 py-1.5 rounded-full mb-5 shadow-sm">
<span class="font-label-caps-sm text-label-caps-sm text-secondary tracking-widest uppercase">
        Haute Couture Lookbook • Emerald Organza &amp; Gold
      </span>
</div>
<!-- Subtitle & Debutante Name -->
<p class="font-label-caps-lg text-label-caps-lg text-on-surface-variant uppercase tracking-widest mb-1">
      Celebrating 17 Radiant Years
    </p>
<h1 class="font-display-hero-mobile text-display-hero-mobile text-primary mb-3" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<!-- Poetic Quote -->
<p class="font-body-md text-body-md text-on-surface-variant italic max-w-xs mb-8">
      “Like deep emerald crystals catching the golden light, seventeen begins with grace, purpose, and everlasting dreams.”
    </p>
<!-- Arch Lookbook Debutante Portrait -->
<div class="relative w-full max-w-sm aspect-[3/4] rounded-t-[7rem] rounded-b-2xl overflow-hidden shadow-2xl bg-surface-container-low p-2">
<div class="w-full h-full rounded-t-[6.5rem] rounded-b-xl overflow-hidden relative">
<img alt="Madeleine Vivienne Sweet Seventeen Haute Couture Ballgown" class="w-full h-full object-cover object-top" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary/70 via-transparent to-transparent flex items-end p-5">
<div class="text-left text-on-primary">
<span class="font-label-caps-sm text-label-caps-sm tracking-widest text-secondary-fixed uppercase block">Look 01 • Gala Debutante</span>
<span class="font-headline-sm text-headline-sm">Mademoiselle Madeleine</span>
</div>
</div>
</div>
</div>
</section>
<!-- 2. Personalized VIP Guest Welcome Card -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md relative overflow-hidden">
<!-- Gold Foil Accent strip -->
<div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary-fixed via-secondary to-secondary-fixed"></div>
<div class="flex items-center justify-between mb-4">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest">
          Kartu Undangan Eksklusif
        </span>
<span class="material-symbols-outlined text-secondary text-[20px]">stars</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Kepada Yth. <span id="previewGuestNameMain">{{ $guestName }}</span>:</p>
<h2 class="font-headline-md text-headline-md text-primary mb-3" id="previewGuestNameMain">{{ $guestName }}</h2>
<div class="bg-surface-container-low rounded-lg p-3 mb-4 flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">table_restaurant</span>
</div>
<div>
<span class="font-label-caps-sm text-label-caps-sm text-on-surface-variant block uppercase">Meja Reservasi VIP</span>
<span class="font-body-md text-body-md font-semibold text-primary">Royal Émeraude VIP A-09 (2 Tamu)</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
        Merupakan suatu kehormatan dan kebahagiaan tak terhingga bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir serta membagikan doa restu di malam perayaan ke-17 Madeleine Vivienne.
      </p>
</div>
</section>
<!-- 3. Waktu & Live Countdown Timer -->
<section class="px-gutter-mobile">
<div class="bg-primary text-on-primary rounded-2xl p-6 shadow-xl relative overflow-hidden">
<div class="text-center mb-6">
<span class="font-label-caps-sm text-label-caps-sm text-secondary-fixed tracking-widest uppercase block mb-1">
          Save The Grand Soirée
        </span>
<h3 class="font-headline-sm text-headline-sm text-on-primary">
          {{ $eventDateFormatted }}
        </h3>
<p class="font-body-md text-body-md text-primary-fixed-dim mt-1">
          18.30 WIB – Selesai <span class="italic text-body-sm block">(Pintu Ballroom dibuka pukul 18.00 WIB)</span>
</p>
</div>
<!-- Live Countdown Grid -->
<div class="grid grid-cols-4 gap-2 mb-6" id="countdown-container">
<div class="bg-primary-container/80 rounded-lg p-3 text-center">
<span class="font-headline-sm text-headline-sm font-semibold text-secondary-fixed block" id="cd-days">312</span>
<span class="font-label-caps-sm text-label-caps-sm text-primary-fixed-dim uppercase">Hari</span>
</div>
<div class="bg-primary-container/80 rounded-lg p-3 text-center">
<span class="font-headline-sm text-headline-sm font-semibold text-secondary-fixed block" id="cd-hours">14</span>
<span class="font-label-caps-sm text-label-caps-sm text-primary-fixed-dim uppercase">Jam</span>
</div>
<div class="bg-primary-container/80 rounded-lg p-3 text-center">
<span class="font-headline-sm text-headline-sm font-semibold text-secondary-fixed block" id="cd-minutes">42</span>
<span class="font-label-caps-sm text-label-caps-sm text-primary-fixed-dim uppercase">Menit</span>
</div>
<div class="bg-primary-container/80 rounded-lg p-3 text-center">
<span class="font-headline-sm text-headline-sm font-semibold text-secondary-fixed block" id="cd-seconds">19</span>
<span class="font-label-caps-sm text-label-caps-sm text-primary-fixed-dim uppercase">Detik</span>
</div>
</div>
<a class="w-full bg-secondary-fixed text-on-secondary-fixed py-3.5 px-4 rounded-xl flex items-center justify-center gap-2 font-label-caps-lg text-label-caps-lg tracking-wider uppercase shadow-md active:scale-[0.98] transition-transform" href="https://calendar.google.com/calendar/render?action=TEMPLATE&amp;text=Sweet+Seventeen+Madeleine+Vivienne+-+Émeraude+Soirée&amp;dates=20251206T110000Z/20251206T160000Z&amp;details=Émeraude+Soirée+XVII+Madeleine+Vivienne+di+The+St.+Regis+Jakarta&amp;location=The+St.+Regis+Grand+Ballroom,+Jakarta" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
        Simpan ke Google Calendar
      </a>
<!-- Rundown Itinerary -->
<div class="mt-8 pt-6 border-t border-primary-container/90">
<h4 class="font-label-caps-lg text-label-caps-lg text-secondary-fixed uppercase tracking-wider text-center mb-6">
          Rundown Acara Utama
        </h4>
<div class="space-y-4" id="itineraryContainer">
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
    <div class="flex gap-4 items-start event-itinerary-item bg-primary-container/30 p-3.5 rounded-xl border border-secondary-fixed/20">
        <span class="font-label-caps-lg text-label-caps-lg text-secondary-fixed-dim pt-1 shrink-0 font-bold min-w-[70px]">{{ $evTimeStr }}</span>
        <div class="flex-1 min-w-0">
            <span class="text-[10px] text-secondary-fixed uppercase tracking-widest font-semibold block">SESI {{ $index + 1 }}</span>
            <p class="font-headline-sm text-[17px] text-on-primary font-bold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</p>
            <p class="font-body-sm text-body-sm text-primary-fixed-dim mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary-fixed block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary-fixed hover:underline mt-1">
                    <span class="material-symbols-outlined text-[13px]">near_me</span>
                    <span>Buka Google Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</div>
</div>
</section>
<!-- 4. Tema Pesta & Tata Busana (Dress Code Guide) -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md">
<div class="text-center mb-5">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block mb-1">
          Dress Code Lookbook
        </span>
<h3 class="font-headline-md text-headline-md text-primary">
          Émeraude Opulence
        </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
          Black Tie • Haute Couture Formal
        </p>
</div>
<!-- Palette Color Swatches -->
<div class="flex items-center justify-center gap-2 mb-6">
<div class="flex flex-col items-center">
<div class="w-8 h-8 rounded-full bg-[#0f4d36] shadow-sm"></div>
<span class="font-label-caps-sm text-[9px] text-on-surface-variant mt-1">Emerald</span>
</div>
<div class="flex flex-col items-center">
<div class="w-8 h-8 rounded-full bg-[#1b3b2b] shadow-sm"></div>
<span class="font-label-caps-sm text-[9px] text-on-surface-variant mt-1">Pine</span>
</div>
<div class="flex flex-col items-center">
<div class="w-8 h-8 rounded-full bg-[#d4af37] shadow-sm"></div>
<span class="font-label-caps-sm text-[9px] text-on-surface-variant mt-1">Gold</span>
</div>
<div class="flex flex-col items-center">
<div class="w-8 h-8 rounded-full bg-[#f5e6b8] shadow-sm"></div>
<span class="font-label-caps-sm text-[9px] text-on-surface-variant mt-1">Champagne</span>
</div>
<div class="flex flex-col items-center">
<div class="w-8 h-8 rounded-full bg-[#101c17] shadow-sm"></div>
<span class="font-label-caps-sm text-[9px] text-on-surface-variant mt-1">Midnight</span>
</div>
</div>
<!-- Guidelines Grid -->
<div class="grid grid-cols-1 gap-4">
<div class="bg-surface-container-low p-4 rounded-xl">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary text-[20px]">man</span>
<h4 class="font-label-caps-lg text-label-caps-lg text-primary uppercase">Tamu Pria (Gentlemen)</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Formal Tuxedo / Dark Suit dengan dasi kupu-kupu, atau Batik Tulis Sutra Eksklusif bermotif pakem bernuansa Deep Emerald / Black / Gold.
          </p>
</div>
<div class="bg-surface-container-low p-4 rounded-xl">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary text-[20px]">woman</span>
<h4 class="font-label-caps-lg text-label-caps-lg text-primary uppercase">Tamu Wanita (Ladies)</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Glamorous Evening Ballgown atau Chic Cocktail Dress bernuansa Emerald Green, Forest Pine, Champagne Gold, atau Bronze Glow.
          </p>
</div>
</div>
<!-- Caution Callout -->
<div class="mt-4 p-3 rounded-lg bg-surface-container flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-secondary">info</span>
<p class="font-body-sm text-body-sm italic">
          Mohon berkenan menghindari busana berwarna putih polos demi keselarasan dokumentasi debutante.
        </p>
</div>
</div>
</section>
<!-- 5. Galeri Foto Editorial ('Her Journey to 17') -->
<section class="px-gutter-mobile">
<div class="text-center mb-5">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block mb-1">
        Memoir Album
      </span>
<h3 class="font-headline-md text-headline-md text-primary">
        Her Journey to 17
      </h3>
</div>
<!-- Main Editorial Photo -->
<div class="relative w-full rounded-2xl overflow-hidden shadow-lg mb-3 aspect-[4/5] bg-surface-container-low">
<img alt="Madeleine Vivienne Chapter XVII Debutante Ball Gown Portrait" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-primary/80 to-transparent p-4 text-on-primary">
<span class="font-label-caps-sm text-label-caps-sm text-secondary-fixed block uppercase">Lookbook Act I</span>
<h4 class="font-headline-sm text-headline-sm">{{ $couple->events->first()->title ?? "Chapter XVII • The Debutante Ball" }}</h4>
</div>
</div>
<!-- 2-Column Photo Collage -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-3">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="rounded-xl overflow-hidden shadow-md bg-surface-container-low flex flex-col border border-outline-variant/30">
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
<!-- 6. Lokasi Acara & Peta Interaktif -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md">
<div class="text-center mb-5">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block mb-1">
          Venue &amp; Lokasi
        </span>
<h3 class="font-headline-md text-headline-md text-primary">
          The St. Regis Jakarta
        </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Grand Ballroom • Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan
        </p>
</div>
<!-- Static Map Card -->
<div class="w-full h-48 rounded-xl bg-cover bg-center shadow-inner mb-4 relative overflow-hidden" data-location="The St. Regis Jakarta, Rajawali Place, Jakarta Selatan" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA03pFB1Q41wieacD3_ftQd7QP4tPsoDSj6qtTKjUTRprvprLN1XM0G_EPCGfAPtm629ouhot6OQ442J6f31XWUGNn5wnEUppbcU9RkGXyT9v1OgujiosGG_xeWA6xIxg4O0EUsj4lJxOg-tfbXufL2Zv_BcwOzNDwJwt3Nzbf6LhYDyiPp_rfZEk2yY5K_6xiOgS7fGnDBl8ROVWdHXECJ5FeqQlUgaPGCPEVR8e-2')">
<div class="absolute top-3 right-3 bg-primary text-on-primary px-3 py-1 rounded-full shadow-md flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary-fixed">local_parking</span>
<span class="font-label-caps-sm text-label-caps-sm uppercase">VIP Valet Service</span>
</div>
</div>
<!-- Location Action Buttons -->
<div class="grid grid-cols-2 gap-3">
<a id="previewMapsLinkMain" class="bg-primary text-on-primary py-3 px-3 rounded-lg flex items-center justify-center gap-1.5 font-label-caps-lg text-label-caps-lg tracking-wider uppercase shadow-sm active:scale-95 transition-transform" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">explore</span>
          Buka Maps
        </a>
<button class="bg-surface-container-high text-on-surface py-3 px-3 rounded-lg flex items-center justify-center gap-1.5 font-label-caps-lg text-label-caps-lg tracking-wider uppercase shadow-sm active:scale-95 transition-transform" id="copy-address-btn" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
          Salin Alamat
        </button>
</div>
<p class="font-label-caps-sm text-secondary text-center mt-2 hidden" id="copy-toast">
        ✓ Alamat berhasil disalin ke clipboard
      </p>
</div>
</section>
<!-- 7. Formulir Konfirmasi Kehadiran (RSVP) -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md">
<div class="text-center mb-5">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block mb-1">
          R.S.V.P
        </span>
<h3 class="font-headline-md text-headline-md text-primary">
          Konfirmasi Tamu VIP
        </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Mohon konfirmasi kehadiran Anda sebelum <strong class="text-on-surface">20 November 2025</strong>
</p>
</div>
<form class="space-y-4" id="rsvp-form">
<div>
<label class="font-label-caps-sm text-label-caps-sm text-on-surface-variant uppercase tracking-wider block mb-1">
            Nama Lengkap Tamu
          </label>
<input class="w-full bg-surface-container-low text-on-surface px-4 py-3 rounded-lg focus:outline-none focus:bg-surface-container font-body-md text-body-md transition-colors" name="guest_name" required="" type="text" value="{{ $guestName }}"/>
</div>
<div>
<label class="font-label-caps-sm text-label-caps-sm text-on-surface-variant uppercase tracking-wider block mb-1">
            Jumlah Hadir
          </label>
<select class="w-full bg-surface-container-low text-on-surface px-4 py-3 rounded-lg focus:outline-none focus:bg-surface-container font-body-md text-body-md transition-colors" name="guest_count">
<option value="2">2 Orang ({{ $guestName }})</option>
<option value="1">1 Orang (Hanya Saya)</option>
</select>
</div>
<div>
<label class="font-label-caps-sm text-label-caps-sm text-on-surface-variant uppercase tracking-wider block mb-2">
            Status Kehadiran
          </label>
<div class="grid grid-cols-2 gap-3">
<label class="bg-surface-container-low p-3 rounded-lg flex items-center gap-2 cursor-pointer has-[:checked]:bg-primary-container has-[:checked]:text-on-primary transition-colors">
<input checked="" class="accent-secondary w-4 h-4" name="attendance" type="radio" value="hadir"/>
<span class="font-body-md text-body-md">Pasti Hadir</span>
</label>
<label class="bg-surface-container-low p-3 rounded-lg flex items-center gap-2 cursor-pointer has-[:checked]:bg-primary-container has-[:checked]:text-on-primary transition-colors">
<input class="accent-secondary w-4 h-4" name="attendance" type="radio" value="berhalangan"/>
<span class="font-body-md text-body-md">Berhalangan</span>
</label>
</div>
</div>
<div>
<label class="font-label-caps-sm text-label-caps-sm text-on-surface-variant uppercase tracking-wider block mb-1">
            Untaian Doa &amp; Harapan
          </label>
<textarea class="w-full bg-surface-container-low text-on-surface px-4 py-3 rounded-lg focus:outline-none focus:bg-surface-container font-body-md text-body-md transition-colors resize-none" name="blessing_message" placeholder="Tuliskan ucapan dan doa tulus untuk Madeleine Vivienne..." rows="3"></textarea>
</div>
<button class="w-full bg-primary text-on-primary py-4 px-4 rounded-xl flex items-center justify-center gap-2 font-label-caps-lg text-label-caps-lg tracking-widest uppercase shadow-md active:scale-95 transition-transform" type="submit">
<span class="material-symbols-outlined text-[20px] text-secondary-fixed">mail</span>
          Kirim Konfirmasi &amp; Doa Restu
        </button>
</form>
<div class="mt-4 p-4 rounded-xl bg-surface-container text-primary text-center hidden" id="rsvp-success">
<span class="material-symbols-outlined text-secondary text-[28px] block mb-1">check_circle</span>
<p class="font-headline-sm text-headline-sm">Terima Kasih, {{ $guestName }}!</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Konfirmasi kehadiran Anda telah tercatat pada Meja Royal Émeraude VIP A-09.</p>
</div>
</div>
</section>
<!-- 8. Buku Tamu Digital (Untaian Doa & Harapan) -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md">
<div class="flex items-center justify-between mb-4">
<div>
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block">
            Digital Guestbook
          </span>
<h3 class="font-headline-sm text-headline-sm text-primary">
            Untaian Doa &amp; Harapan
          </h3>
</div>
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-label-caps-sm">
          28
        </div>
</div>
<div class="space-y-4 divide-y divide-surface-container-high/60" id="wishes-list">
<div class="pt-3 first:pt-0">
<div class="flex items-center justify-between mb-1">
<span class="font-headline-sm text-[16px] text-primary">Alexander &amp; Brenda Tan</span>
<span class="font-label-caps-sm text-on-surface-variant text-[10px]">10 Menit Lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
            “Happy 17th Birthday dearest Madeleine! Semoga senantiasa bersinar terang seperti zamrud permata, penuh kebahagiaan, dan tercapai seluruh cita-cita luhurmu.”
          </p>
</div>
<div class="pt-3">
<div class="flex items-center justify-between mb-1">
<span class="font-headline-sm text-[16px] text-primary">Clarissa Valerie</span>
<span class="font-label-caps-sm text-on-surface-variant text-[10px]">1 Jam Lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
            “Can't wait for your magical night Madel! You look breathtaking in that couture emerald gown. Cheers to seventeen!”
          </p>
</div>
<div class="pt-3">
<div class="flex items-center justify-between mb-1">
<span class="font-headline-sm text-[16px] text-primary">Oma &amp; Opa Suryawijaya</span>
<span class="font-label-caps-sm text-on-surface-variant text-[10px]">3 Jam Lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
            “Cucu tersayang Madeleine, doa Oma &amp; Opa selalu menyertaimu. Tumbuhlah menjadi putri yang anggun, bijaksana, dan penuh kasih.”
          </p>
</div>
</div>
</div>
</section>
<!-- 9. Tanda Kasih Digital (Digital Gift Registry) -->
<section class="px-gutter-mobile">
<div class="bg-surface-container-lowest rounded-xl p-6 shadow-md">
<div class="text-center mb-5">
<span class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest block mb-1">
          Tanda Kasih Digital
        </span>
<h3 class="font-headline-md text-headline-md text-primary">
          Digital Gift Registry
        </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mx-auto">
          Doa restu Anda adalah anugerah terindah bagi kami. Namun apabila Anda berkehendak memberikan tanda kasih tanpa tunai:
        </p>
</div>
<div class="space-y-4">
<!-- Bank 1 Card -->
<div class="bg-surface-container-low p-4 rounded-xl flex items-center justify-between mb-3">
<div>
<span class="font-label-caps-sm text-label-caps-sm text-secondary font-bold block uppercase tracking-wider">{{ $bankName1 }}</span>
<span class="font-headline-sm text-[18px] text-primary block mt-0.5" id="bca-num">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary text-on-primary px-3.5 py-2 rounded-lg font-label-caps-sm text-label-caps-sm uppercase tracking-wider hover:opacity-90 active:scale-95 transition-all shadow-sm" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-low p-4 rounded-xl flex items-center justify-between">
<div>
<span class="font-label-caps-sm text-label-caps-sm text-secondary font-bold block uppercase tracking-wider">{{ $bankName2 }}</span>
<span class="font-headline-sm text-[18px] text-primary block mt-0.5" id="mandiri-num">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary text-on-primary px-3.5 py-2 rounded-lg font-label-caps-sm text-label-caps-sm uppercase tracking-wider hover:opacity-90 active:scale-95 transition-all shadow-sm" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</section>
<!-- 10. Closing & Monogram Wax Seal -->
<section class="px-gutter-mobile text-center pt-4 pb-8">
<div class="flex flex-col items-center">
<div class="w-24 h-24 mb-4">
<img alt="Émeraude Soirée XVII Seal" class="w-full h-full object-contain filter drop-shadow-lg" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq"/>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-1">
        Madeleine Vivienne
      </h3>
<p class="font-label-caps-sm text-label-caps-sm text-secondary uppercase tracking-widest mb-3">
        &amp; Keluarga Besar Suryawijaya
      </p>
<p class="font-body-md text-body-md text-on-surface-variant italic max-w-xs">
        Sampai jumpa di malam penuh keajaiban dan kemegahan zamrud.
      </p>
</div>
</section>
</div>
<script>
  // Dynamic Live Countdown Script
  (function initCountdown() {
    let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();

    function update() {
      const now = new Date().getTime();
      const difference = targetDate - now;

      if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        const cdDays = document.getElementById('cd-days');
        const cdHours = document.getElementById('cd-hours');
        const cdMin = document.getElementById('cd-minutes');
        const cdSec = document.getElementById('cd-seconds');

        if (cdDays) cdDays.textContent = String(days);
        if (cdHours) cdHours.textContent = String(hours).padStart(2, '0');
        if (cdMin) cdMin.textContent = String(minutes).padStart(2, '0');
        if (cdSec) cdSec.textContent = String(seconds).padStart(2, '0');
      }
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

  // Copy Venue Address micro-interaction
  const copyBtn = document.getElementById('copy-address-btn');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const address = 'The St. Regis Jakarta, Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan';
      navigator.clipboard.writeText(address).then(() => {
        const toast = document.getElementById('copy-toast');
        if (toast) {
          toast.classList.remove('hidden');
          setTimeout(() => toast.classList.add('hidden'), 3000);
        }
      });
    });
  }

  // RSVP Form submission micro-interaction
  const rsvpForm = document.getElementById('rsvp-form');
  if (rsvpForm) {
    rsvpForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(rsvpForm);
      const name = formData.get('guest_name') || 'Tamu Terhormat';
      const blessing = formData.get('blessing_message');

      if (blessing && blessing.trim()) {
        const wishesList = document.getElementById('wishes-list');
        if (wishesList) {
          const newWish = document.createElement('div');
          newWish.className = 'pt-3 animate-fade-in';
          newWish.innerHTML = `
            <div class="flex items-center justify-between mb-1">
              <span class="font-headline-sm text-[16px] text-primary">${name}</span>
              <span class="font-label-caps-sm text-secondary text-[10px]">Baru Saja</span>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant italic">
              &ldquo;${blessing.trim()}&rdquo;
            </p>
          `;
          wishesList.insertBefore(newWish, wishesList.firstChild);
        }
      }

      rsvpForm.classList.add('hidden');
      const successBox = document.getElementById('rsvp-success');
      if (successBox) successBox.classList.remove('hidden');
    });
  }
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-1px_12px_rgba(0,0,0,0.05)]" data-active-classes="text-primary font-semibold"><div class="flex justify-around items-center h-16 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] w-14 transition-colors text-primary font-semibold" data-path="main-invitation" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-caps-sm text-label-caps-sm tracking-normal capitalize mt-0.5">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] w-14 text-on-surface-variant hover:text-on-surface transition-colors" data-path="agenda" href="#"><span class="material-symbols-outlined text-[22px]">event_available</span><span class="font-label-caps-sm text-label-caps-sm tracking-normal capitalize mt-0.5">Agenda</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] w-14 text-on-surface-variant hover:text-on-surface transition-colors" data-path="galeri" href="#"><span class="material-symbols-outlined text-[22px]">photo_library</span><span class="font-label-caps-sm text-label-caps-sm tracking-normal capitalize mt-0.5">Galeri</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] w-14 text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-caps-sm text-label-caps-sm tracking-normal capitalize mt-0.5">RSVP</span></a><a class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] w-14 text-on-surface-variant hover:text-on-surface transition-colors" data-path="hadiah" href="#"><span class="material-symbols-outlined text-[22px]">featured_seasonal_and_gifts</span><span class="font-label-caps-sm text-label-caps-sm tracking-normal capitalize mt-0.5">Hadiah</span></a></div></nav>
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
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary-fixed hover:underline mt-1"><span class="material-symbols-outlined text-[13px]">near_me</span><span>Buka Google Maps</span></a>` : "";
                return `
                    <div class="flex gap-4 items-start event-itinerary-item bg-primary-container/30 p-3.5 rounded-xl border border-secondary-fixed/20">
                        <span class="font-label-caps-lg text-label-caps-lg text-secondary-fixed-dim pt-1 shrink-0 font-bold min-w-[70px]">${timeStr}</span>
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] text-secondary-fixed uppercase tracking-widest font-semibold block">SESI ${i + 1}</span>
                            <p class="font-headline-sm text-[17px] text-on-primary font-bold leading-snug">${title}</p>
                            <p class="font-body-sm text-body-sm text-primary-fixed-dim mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-secondary-fixed block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'emeraude-soiree-emerald' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>