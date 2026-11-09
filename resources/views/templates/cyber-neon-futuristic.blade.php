<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Protocol 3.0: The Cyber Soirée') . ' - ' . ($couple->groom_name ?? 'Kevin Danuarta') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Kevin Danuarta' }} - Ulang Tahun Dewasa - Geometris Cyber Neon."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&amp;family=Space+Mono:ital,wght@0,400;0,700;1,400&amp;family=Syne:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "surface-container-highest": "#34343a", "on-tertiary-fixed-variant": "#6600b7", "on-surface-variant": "#b9cacb", "surface": "#121318", "error": "#ffb4ab", "surface-container-high": "#292a2f", "surface-bright": "#38393f", "on-primary": "#00363a", "on-tertiary-fixed": "#2b0052", "on-primary-container": "#006970", "inverse-surface": "#e3e1e9", "on-tertiary": "#470083", "primary": "#dbfcff", "surface-container": "#1e1f25", "surface-container-lowest": "#0d0e13", "primary-fixed-dim": "#00dbe9", "on-primary-fixed-variant": "#004f54", "inverse-on-surface": "#2f3036", "on-tertiary-container": "#8031d1", "on-secondary-fixed-variant": "#8f0044", "tertiary-fixed-dim": "#dbb8ff", "inverse-primary": "#006970", "primary-fixed": "#7df4ff", "outline-variant": "#3b494b", "secondary-fixed": "#ffd9e1", "surface-container-low": "#1a1b21", "tertiary-fixed": "#efdbff", "on-background": "#e3e1e9", "tertiary-container": "#e8d0ff", "background": "#121318", "on-primary-fixed": "#002022", "on-secondary-fixed": "#3f001a", "secondary-fixed-dim": "#ffb1c4", "error-container": "#93000a", "on-secondary": "#65002e", "surface-dim": "#121318", "tertiary": "#fcf3ff", "secondary-container": "#ff4a8d", "outline": "#849495", "on-secondary-container": "#590028", "on-error-container": "#ffdad6", "primary-container": "#00f0ff", "on-error": "#690005", "secondary": "#ffb1c4", "surface-variant": "#34343a", "surface-tint": "#00dbe9", "on-surface": "#e3e1e9" }, borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, spacing: { "space-sm": "0.5rem", "space-md": "1rem", "space-xs": "0.25rem", "margin": "3rem", "space-lg": "1.5rem", "gutter-mobile": "1rem", "space-2xl": "4rem", "margin-mobile": "1.25rem", "gutter": "1.5rem", "space-xl": "2.5rem" }, fontFamily: { "label-cyber-sm": ["Space Mono"], "label-cyber-md": ["Space Mono"], "display-hero-mobile": ["Syne"], "display-hero": ["Syne"], "headline-md": ["Syne"], "body-lg": ["Space Grotesk"], "label-cyber-lg": ["Space Mono"], "headline-lg": ["Syne"], "headline-lg-mobile": ["Syne"], "headline-sm": ["Syne"], "body-md": ["Space Grotesk"], "body-sm": ["Space Grotesk"] }, fontSize: { "label-cyber-sm": ["10px", { lineHeight: "14px", letterSpacing: "0.18em", fontWeight: "400" }], "label-cyber-md": ["12px", { lineHeight: "16px", letterSpacing: "0.12em", fontWeight: "400" }], "display-hero-mobile": ["44px", { lineHeight: "48px", letterSpacing: "-0.02em", fontWeight: "800" }], "display-hero": ["72px", { lineHeight: "76px", letterSpacing: "-0.03em", fontWeight: "800" }], "headline-md": ["28px", { lineHeight: "34px", letterSpacing: "0.01em", fontWeight: "600" }], "body-lg": ["18px", { lineHeight: "28px", letterSpacing: "0.01em", fontWeight: "400" }], "label-cyber-lg": ["14px", { lineHeight: "18px", letterSpacing: "0.15em", fontWeight: "700" }], "headline-lg": ["40px", { lineHeight: "48px", letterSpacing: "-0.01em", fontWeight: "700" }], "headline-lg-mobile": ["30px", { lineHeight: "36px", letterSpacing: "0em", fontWeight: "700" }], "headline-sm": ["20px", { lineHeight: "26px", letterSpacing: "0.02em", fontWeight: "600" }], "body-md": ["15px", { lineHeight: "24px", letterSpacing: "0.01em", fontWeight: "400" }], "body-sm": ["13px", { lineHeight: "20px", letterSpacing: "0.02em", fontWeight: "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Kevin Danuarta';
        $celebrantNick = $couple->groom_nickname ?? 'Kevin';
        $heading = $couple->event_heading ?? 'Protocol 3.0: The Cyber Soirée';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang tahun dewasa';
        $guestName = !empty($guest->name) ? $guest->name : (request('to') ?? request('guest') ?? 'Bapak / Ibu / Saudara/i');
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Main Ceremony & Keynote Reflections',
                    'date' => !empty($couple->wedding_date) ? (is_string($couple->wedding_date) ? $couple->wedding_date : $couple->wedding_date->format('Y-m-d')) : now()->format('Y-m-d'),
                    'start_time' => $couple->wedding_time ?? '19.00 WIB',
                    'end_time' => '22.00 WIB',
                    'venue_name' => $venueName,
                    'address' => $venueAddress,
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1
                ]
            ]);
        }
        $quote = $couple->quote ?? 'Entering thirty with calibrated focus, bold ambitions, and endless frequencies ahead.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCgaZjXqvAIx0urz3u4TcDVgVise_kbN654ApHEABTAnmpVLQzcgZ-yEEWvDGcjmV_9JD3yHSbaRfubp6aeV1mAYAdEj3oBcRDnb-JkPop3UqwWsJb3PxKn72Zw5W8x0GFwGv2y7UdflrGVvW63Ve3opJV43Mg-_rtb3Yau0rKy8m-HxHdUfoV_3CzGkHwJ1ZnkuHGx8-AYe8AaT0m8JKH2cf44JpEw526sP9BD88pw';
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

        $venueName = $couple->venue_name ?? 'Sky Cyber Lounge level 42';
        $venueAddress = $couple->venue_address ?? 'Menara Astra, Jl. Jenderal Sudirman Kav. 5, Jakarta Pusat';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCgaZjXqvAIx0urz3u4TcDVgVise_kbN654ApHEABTAnmpVLQzcgZ-yEEWvDGcjmV_9JD3yHSbaRfubp6aeV1mAYAdEj3oBcRDnb-JkPop3UqwWsJb3PxKn72Zw5W8x0GFwGv2y7UdflrGVvW63Ve3opJV43Mg-_rtb3Yau0rKy8m-HxHdUfoV_3CzGkHwJ1ZnkuHGx8-AYe8AaT0m8JKH2cf44JpEw526sP9BD88pw', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAQ5pPPFF_pWYi2xgvVHCqo4fEk5fwgxCax1m2U8tJCp5THdPPd7FbbVeJn-4WzsqyHUaIxCvPp0RazidRMPeMMpXA15JvUCFgoJUimjM16WwH7gEfZvaw9MqYWmyDl3-2GqumDd1DAMmQ8BIbVOA0SqXN-kvRIU6wXi0mecBIc3vkSATdgP4byoVbwsqLUJ4fZR4_HCzNnMe1_9geBL_SqW11eSiUlS1F2iZE_TpmP', 'caption' => 'Momen Bahagia #3'],
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
        <main class="flex-1 w-full bg-surface relative flex flex-col justify-center items-center"><div class="flex flex-col w-full max-w-md mx-auto min-w-0 relative px-space-md py-space-sm items-center justify-between overflow-hidden select-none">
<!-- Atmospheric Photonic Background Blooms -->
<div class="absolute -top-16 -left-16 w-56 h-56 rounded-full bg-secondary-container/20 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/3 -right-20 w-64 h-64 rounded-full bg-primary-container/15 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-4 left-1/4 w-72 h-44 rounded-full bg-on-tertiary-container/20 blur-3xl pointer-events-none"></div>
<!-- Ambient Digital Grid Backdrop Overlay -->
<div class="absolute inset-0 bg-repeat opacity-10 pointer-events-none" style="background-image: radial-gradient(circle, #00f0ff 1px, transparent 1px); background-size: 24px 24px;"></div>
<!-- Header HUD: Telemetry & Sound Capsule -->
<header class="w-full flex flex-col gap-1.5 items-center relative z-10 pt-1">
<div class="w-full flex items-center justify-between px-3 py-1.5 rounded-lg bg-surface-container-lowest/90 backdrop-blur-md shadow-sm">
<div class="flex items-center gap-2 min-w-0">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-container opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-primary-container"></span>
</span>
<p class="font-label-cyber-sm text-label-cyber-sm text-primary tracking-widest uppercase truncate">
          SYS.ONLINE // CH.30 • JAKARTA
        </p>
</div>
<div class="flex items-center gap-1.5 bg-surface-container px-2 py-0.5 rounded">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary tracking-wider font-semibold">ULTRA_VIP</span>
</div>
</div>
<!-- Music Player Indicator Pill -->
<div class="flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high/80 backdrop-blur-sm shadow-md">
<span class="material-symbols-outlined text-primary text-[14px]">graphic_eq</span>
<p class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant tracking-wider uppercase truncate">
        SYNTHWAVE ODYSSEY — CH.30
      </p>
<!-- Equalizer Visualizer Micro -->
<div class="flex items-end gap-0.5 h-3 ml-1">
<div class="w-0.5 bg-primary-container h-full animate-pulse"></div>
<div class="w-0.5 bg-primary h-2/3 animate-pulse delay-75"></div>
<div class="w-0.5 bg-secondary h-4/5 animate-pulse delay-150"></div>
<div class="w-0.5 bg-primary-container h-1/2 animate-pulse delay-100"></div>
</div>
</div>
</header>
<!-- Central Visual Core: Holographic Seal & Celebrant Hero -->
<section class="flex flex-col items-center text-center my-2 relative z-10 w-full">
<!-- Emblem Showcase Container -->
<div class="relative flex items-center justify-center p-3 mb-1">
<!-- Glow Pod -->
<div class="absolute inset-0 bg-primary-container/10 rounded-full blur-xl scale-90"></div>
<!-- Central Seal Emblem Image -->
<div class="relative w-36 h-36 flex items-center justify-center transition-transform active:scale-95 duration-200">
<img alt="Cyber Neon Chapter 30 Emblem" class="w-full h-full object-contain filter drop-shadow-[0_0_16px_rgba(0,240,255,0.45)]" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
<!-- Pulsing Prompt Micro-Badge -->
<div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/80 mb-2">
<span class="text-secondary font-label-cyber-sm text-label-cyber-sm tracking-widest animate-pulse font-bold">
        ◆ TAP TO ACCESS ENCRYPTED PROTOCOL ◆
      </span>
</div>
<!-- Milestone Hierarchy & Celebrant Typography -->
<p class="font-label-cyber-sm text-label-cyber-sm text-primary tracking-widest uppercase mb-0.5">
      CELEBRATING THREE DECADES OF EVOLUTION
    </p>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-primary font-bold tracking-tight filter drop-shadow-[0_0_12px_rgba(219,252,255,0.3)]" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mt-0.5 leading-tight">
      “Entering thirty with calibrated focus, bold ambitions, and endless frequencies ahead.”
    </p>
</section>
<!-- VIP Digital Clearance Invitation Card -->
<section class="w-full relative z-10 px-0.5 mb-2">
<div class="w-full p-3.5 rounded-xl bg-surface-container-low/95 backdrop-blur-md shadow-xl flex flex-col gap-2 relative overflow-hidden">
<!-- Top Cyber Neon Accent Line -->
<div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-primary-container to-transparent"></div>
<!-- Bottom Neon Accent Line -->
<div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-secondary-container to-transparent"></div>
<!-- Clearance Tag -->
<div class="flex items-center justify-between">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary font-bold tracking-wider">
          ★ VIP ACCESS GRANTED
        </span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant tracking-widest">
          LVL.ULTRA
        </span>
</div>
<!-- Guest Salutation Dossier -->
<div class="bg-surface-container-lowest/80 p-2.5 rounded-lg flex flex-col items-center text-center">
<p class="font-label-cyber-sm text-label-cyber-sm text-outline tracking-wider uppercase mb-0.5">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </p>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-wide" id="previewGuestNameCover">
          {{ $guestName }}
        </p>
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim italic">
          Di Tempat
        </span>
</div>
<!-- Formal Body Copy -->
<p class="font-body-sm text-body-sm text-on-surface-variant text-center leading-snug px-1">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk merayakan momen perayaan ulang tahun ke-30 yang penuh energi masa depan dan rasa syukur.
      </p>
</div>
</section>
<!-- CTA Action Suite & Metadata -->
<footer class="w-full flex flex-col items-center gap-2 relative z-10 pb-1">
<!-- Primary High-Impact Cyber Button -->
<button class="w-full py-3 px-4 rounded-lg bg-primary-container text-on-primary font-label-cyber-lg text-label-cyber-lg font-bold tracking-wider uppercase shadow-xl flex items-center justify-center gap-2 transition-all duration-200 active:scale-98" id="open-invitation-btn" onclick="openInvitation()">
<span class="material-symbols-outlined text-[18px]">bolt</span>
<span>BUKA UNDANGAN (ENTER SOIRÉE)</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
<!-- Event Coordinates Telemetry Matrix -->
<div class="w-full flex flex-col items-center text-center gap-0.5 pt-0.5">
<div class="flex items-center gap-1.5 font-label-cyber-sm text-label-cyber-sm text-primary font-medium tracking-wide">
<span class="material-symbols-outlined text-[12px] text-primary-fixed-dim">event_seat</span>
<span>{{ strtoupper($eventDateFormatted) }} • AETHER SKYBAR, JAKARTA</span>
</div>
<p class="font-label-cyber-sm text-label-cyber-sm text-outline tracking-wider">
        DRESS CODE: CYBER TECHWEAR &amp; NEON NOIR • RSVP MANDATORY
      </p>
</div>
</footer>
</div>
<script>
  // Micro-interaction: Telemetry interactive vibration & sound pulse feedback
  const ctaBtn = document.getElementById('open-envelope-cta');
  if (ctaBtn) {
    ctaBtn.addEventListener('click', () => {
      ctaBtn.classList.add('opacity-90', 'scale-95');
      setTimeout(() => {
        ctaBtn.classList.remove('opacity-90', 'scale-95');
        // Dispatch custom envelope launch signal if parent listener exists
        window.dispatchEvent(new CustomEvent('cyberEnvelopeOpened', { detail: { guest: '{{ $guestName }}' } }));
      }, 180);
    });
  }
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-sm"><div class="relative flex items-center justify-center w-3 h-3"><span class="absolute inline-flex w-full h-full rounded-full bg-primary-container opacity-75 animate-ping"></span><span class="relative inline-flex w-2 h-2 rounded-full bg-primary-fixed-dim shadow-[0_0_8px_rgba(0,240,255,0.8)]"></span></div><div class="flex flex-col"><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-widest text-primary-fixed-dim">CYBER NEON 30 // VIP</span><h1 class="font-headline-sm text-headline-sm uppercase tracking-wider text-on-surface" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-sm"><button aria-label="Audio Ambient Toggle" class="w-11 h-11 flex items-center justify-center rounded-lg bg-surface-container-high text-primary-fixed-dim hover:text-primary hover:bg-surface-variant transition-colors" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[20px]">volume_up</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 flex flex-col relative w-full pt-16 pb-20 bg-surface"><div class="flex flex-col w-full px-gutter-mobile space-y-space-xl">
<!-- 1. Hero Section & Celebrant Portrait -->
<section class="flex flex-col items-center pt-space-md">
<!-- Milestone System Tag -->
<div class="flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container-high text-primary-fixed-dim shadow-[0_0_12px_rgba(0,219,233,0.15)] mb-space-md">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container animate-pulse"></span>
<span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-widest text-center">SYSTEM ACTIVE • CHAPTER 30 • BORN 1995 • JAKARTA</span>
</div>
<!-- Tech Crosshair Frame Portrait -->
<div class="relative w-full max-w-[340px] aspect-[4/5] rounded-xl overflow-hidden bg-surface-container-lowest shadow-[0_0_30px_rgba(0,240,255,0.2)]">
<!-- High-tech angular corner markers -->
<div class="absolute top-2 left-2 z-20 font-label-cyber-sm text-primary-fixed-dim text-[11px] leading-none select-none">┌ [01_LOC]</div>
<div class="absolute top-2 right-2 z-20 font-label-cyber-sm text-secondary text-[11px] leading-none select-none">[SYS] ┐</div>
<div class="absolute bottom-2 left-2 z-20 font-label-cyber-sm text-primary-fixed-dim text-[11px] leading-none select-none">└ [NEO_JKT]</div>
<div class="absolute bottom-2 right-2 z-20 font-label-cyber-sm text-secondary text-[11px] leading-none select-none">[30_V1] ┘</div>
<!-- Tech scanline overlay effect -->
<div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent via-primary-fixed-dim/5 to-surface-container-lowest/90 pointer-events-none"></div>
<!-- Celebrant Image -->
<img alt="Kevin Danuarta - Chapter 30 Celebrant" class="w-full h-full object-cover object-top filter contrast-[1.05]" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<!-- Ambient bottom badge inside image -->
<div class="absolute bottom-4 inset-x-4 z-20 flex justify-between items-end">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary uppercase tracking-widest px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md">STATUS: ARCHITECT</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-widest px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md">ID: KD-199530</span>
</div>
</div>
<!-- Celebrant Name & Philosophy Statement -->
<div class="flex flex-col items-center text-center mt-space-lg max-w-sm">
<span class="font-label-cyber-md text-label-cyber-md text-secondary-fixed-dim uppercase tracking-[0.25em] mb-1">THE 30TH FREQUENCY</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile font-bold tracking-tight text-on-surface uppercase">
        KEVIN DANUARTA
      </h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-space-sm px-space-xs leading-relaxed">
        “Entering thirty with calibrated focus, deep gratitude for every node of connection, and quiet excitement for the next horizon.”
      </p>
</div>
</section>
<!-- 2. Guest Verification & VIP Lounge Card -->
<section class="w-full">
<div class="relative bg-surface-container-low rounded-xl p-space-lg shadow-[0_8px_24px_rgba(0,0,0,0.4)] overflow-hidden">
<!-- Glow ambient backdrop -->
<div class="absolute -top-12 -right-12 w-32 h-32 rounded-full bg-primary-fixed-dim/10 blur-2xl pointer-events-none"></div>
<!-- VIP Header -->
<div class="flex flex-wrap items-center justify-between gap-x-4 gap-y-2 mb-space-md">
<div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded bg-secondary-container text-on-secondary-container shadow-[0_0_10px_rgba(255,74,141,0.3)] shrink-0">
<span class="material-symbols-outlined text-[14px]">verified</span>
<span class="text-[9.5px] font-mono font-bold tracking-wider uppercase">VIP PASS VERIFIED</span>
</div>
<span class="text-[9.5px] font-mono text-primary-fixed-dim tracking-wider shrink-0 ml-auto sm:ml-0">POD: A-09 // SYNCED</span>
</div>
<!-- Guest Addressing -->
<div class="space-y-1">
<span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">KEPADA YTH. TAMU KEHORMATAN:</span>
<h3 class="text-xl sm:text-2xl font-bold text-primary tracking-wide" id="previewGuestNameMain">{{ $guestName }}</h3>
</div>
<!-- VIP Detail Segment -->
<div class="mt-space-md p-space-md rounded-lg bg-surface-container-high space-y-2">
<div class="flex items-start gap-space-sm">
<span class="material-symbols-outlined text-primary-fixed-dim text-[20px] mt-0.5">meeting_room</span>
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">ALOKASI VIP LOUNGE</span>
<span class="font-body-md text-body-md font-medium text-on-surface">QUANTUM LOUNGE POD A-09</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary tracking-wide">Kapasitas: 2 Tamu Terdaftar</span>
</div>
</div>
</div>
<!-- Warm Greeting Note -->
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-md italic leading-relaxed">
        Merupakan suatu kehormatan dan sukacita mendalam bagi saya untuk merayakan fase kehidupan ini bersama Anda yang telah menjadi bagian tak tergantikan dalam perjalanan ini.
      </p>
</div>
</section>
<!-- 3. Profil Singkat (Life Journey Evolution) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim uppercase tracking-widest">BIOGRAPHY TELEMETRY</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">SEKILAS PERJALANAN &amp; EVOLUSI // CHAPTER 30</h3>
</div>
<!-- Timeline Container -->
<div class="relative pl-6 space-y-space-lg">
<!-- Continuous vertical cyan laser indicator -->
<div class="absolute left-2 top-2 bottom-2 w-0.5 bg-gradient-to-b from-primary-fixed-dim via-secondary to-primary-container opacity-50 shadow-[0_0_8px_rgba(0,219,233,0.5)]"></div>
<!-- Node 01 -->
<div class="relative flex flex-col space-y-1">
<div class="absolute -left-[27px] top-1.5 w-3 h-3 rotate-45 bg-primary-fixed-dim shadow-[0_0_8px_rgba(0,219,233,0.8)]"></div>
<div class="flex items-center gap-space-xs">
<span class="px-2 py-0.5 rounded bg-surface-container-high font-label-cyber-sm text-label-cyber-sm text-primary uppercase">NODE 01 (1995 - 2015)</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">THE FOUNDATIONS</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Masa pembentukan karakter, eksplorasi dunia komputasi, apresiasi seni audio-visual, serta peletakan fondasi nilai dan integritas kehidupan.
        </p>
</div>
<!-- Node 02 -->
<div class="relative flex flex-col space-y-1">
<div class="absolute -left-[27px] top-1.5 w-3 h-3 rotate-45 bg-secondary shadow-[0_0_8px_rgba(255,177,196,0.8)]"></div>
<div class="flex items-center gap-space-xs">
<span class="px-2 py-0.5 rounded bg-surface-container-high font-label-cyber-sm text-label-cyber-sm text-secondary uppercase">NODE 02 (2016 - 2024)</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">VENTURE &amp; RESILIENCE</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Membangun ekosistem teknologi, mengarungi fase ketahanan bisnis, merintis inovasi kreatif, dan memupuk lingkar pertemanan bermakna.
        </p>
</div>
<!-- Node 03 -->
<div class="relative flex flex-col space-y-1">
<div class="absolute -left-[27px] top-1.5 w-3 h-3 rotate-45 bg-tertiary-fixed-dim shadow-[0_0_8px_rgba(219,184,255,0.8)]"></div>
<div class="flex items-center gap-space-xs">
<span class="px-2 py-0.5 rounded bg-surface-container-high font-label-cyber-sm text-label-cyber-sm text-tertiary-fixed-dim uppercase">NODE 03 (2025 &amp; BEYOND)</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">CLARITY &amp; SYNTHESIS</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Melangkah ke dekade 30 dengan ketenangan batin terkalibrasi, visi berdampak bagi komunitas, serta eksplorasi karya tanpa batasan konvensional.
        </p>
</div>
</div>
<!-- Persona chip -->
<div class="flex items-center gap-space-sm p-space-md rounded-xl bg-surface-container-high shadow-md">
<span class="material-symbols-outlined text-primary-fixed-dim text-[22px]">hub</span>
<p class="font-label-cyber-sm text-label-cyber-sm text-primary uppercase tracking-wider">
        Tech innovator by day, modular synth explorer &amp; night cyclist by starlight.
      </p>
</div>
</section>
<!-- 4. Jadwal Acara & Live Countdown -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-widest">TIMELOCK PROTOCOL</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">{{ $couple->events->first()->title ?? "Jadwal Acara & Countdown" }}</h3>
</div>
<!-- Event Date Badge -->
<div class="flex items-center justify-center p-space-md rounded-xl bg-surface-container-low text-center shadow-lg">
<div class="flex flex-col items-center">
<div class="flex items-center gap-2 text-primary mb-1">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
<span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">LOKAKARYA MOMEN SPESIAL</span>
</div>
<span id="previewWeddingDateFormatted" class="preview-wedding-date-text font-headline-sm text-headline-sm text-on-surface font-bold">{{ strtoupper($eventDateFormatted) }}</span>
<span class="font-label-cyber-md text-label-cyber-md text-secondary-fixed-dim mt-0.5">19.00 WIB – SELESAI</span>
</div>
</div>
<!-- 4-Box Digital Countdown HUD -->
<div class="grid grid-cols-4 gap-2 text-center" id="cyber-countdown">
<div class="flex flex-col p-space-sm rounded-lg bg-surface-container-high shadow-[0_0_12px_rgba(0,240,255,0.1)]">
<span class="font-headline-md text-headline-md font-bold text-primary" id="hud-days">00</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">HARI</span>
</div>
<div class="flex flex-col p-space-sm rounded-lg bg-surface-container-high shadow-[0_0_12px_rgba(0,240,255,0.1)]">
<span class="font-headline-md text-headline-md font-bold text-primary" id="hud-hours">00</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">JAM</span>
</div>
<div class="flex flex-col p-space-sm rounded-lg bg-surface-container-high shadow-[0_0_12px_rgba(0,240,255,0.1)]">
<span class="font-headline-md text-headline-md font-bold text-primary" id="hud-mins">00</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">MENIT</span>
</div>
<div class="flex flex-col p-space-sm rounded-lg bg-surface-container-high shadow-[0_0_12px_rgba(255,74,141,0.2)]">
<span class="font-headline-md text-headline-md font-bold text-secondary" id="hud-secs">00</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">DETIK</span>
</div>
</div>
<!-- Calendar CTA -->
<button class="w-full flex items-center justify-center gap-space-sm py-3 px-4 rounded-xl bg-surface-container-high text-primary hover:bg-surface-bright active:scale-[0.99] transition shadow-md" onclick="saveToGoogleCalendar()">
<span class="material-symbols-outlined text-[20px] text-primary-fixed-dim">event_available</span>
<span class="font-label-cyber-md text-label-cyber-md font-bold uppercase tracking-wider">⚡ SIMPAN KE GOOGLE CALENDAR</span>
</button>
<!-- Rundown Cards -->
<div class="space-y-space-sm mt-space-md" id="itineraryContainer">
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
        if (empty($evTimeStr)) $evTimeStr = "19.00 - Selesai";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
        $timeBg = ($index % 2 === 0) ? "bg-secondary-container text-on-secondary-container" : "bg-surface-container-high text-primary";
    @endphp
    <div class="flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low shadow-sm event-itinerary-item">
        <div class="flex flex-col items-center justify-center min-w-[64px] px-2 py-1.5 rounded {{ $timeBg }} font-label-cyber-sm text-label-cyber-sm font-bold">
            {{ $evTimeStr }}
        </div>
        <div class="flex flex-col min-w-0 flex-1">
            <span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-wide">SESI {{ $index + 1 }}</span>
            <span class="font-body-md text-body-md font-medium text-on-surface truncate">{{ $event->title ?? ("Acara " . ($index + 1)) }}</span>
            <span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</span>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary-fixed-dim block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1">
                    <span class="material-symbols-outlined text-[13px]">navigation</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</section>
<!-- 5. Lokasi Acara & Interactive Map -->
<section class="w-full space-y-space-md" id="section-lokasi">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim uppercase tracking-widest">COORDINATES PROTOCOL</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">LOKASI ACARA</h3>
</div>
<!-- Venue Card -->
<div class="bg-surface-container-low rounded-xl p-space-md sm:p-space-lg shadow-lg space-y-3">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-[10px] text-secondary uppercase tracking-wider">VENUE LOCATION</span>
<h4 class="text-base sm:text-lg text-primary font-bold tracking-tight" id="previewVenueNameMain">{{ $venueName }}</h4>
<span class="text-xs text-on-surface-variant mt-0.5" id="previewVenueSub">{{ !empty($couple->events[0]->title) ? $couple->events[0]->title : 'Acara Utama' }}</span>
</div>
<div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center text-primary-fixed-dim">
<span class="material-symbols-outlined text-[20px]">location_city</span>
</div>
</div>
<!-- Address Box -->
<div class="p-3 rounded-lg bg-surface-container-high flex items-start gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px] mt-0.5 shrink-0">pin_drop</span>
<p class="text-xs text-on-surface leading-relaxed" id="previewVenueAddressMain">
{{ $venueAddress }}
</p>
</div>
<!-- Map Pipeline Div -->
<div class="w-full h-36 rounded-xl bg-cover bg-center overflow-hidden relative shadow-inner" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCzKCiPKraAmIi82jCvklHyfGDOOsKVsNrUZs3Iy_W0FaQVIUd-ZRvBqZYtYBIRXUBLQsaqWALsAqpVnUDwTMo8c5oiw2WXcOs7eMe6Nj2oV5ZRR8piYrPluUcVE93QurViPS4D6EYtpmX4twYy_YnsnaUpOBOSRjHC8m0Kj9-vh-jnhIneOi41A1fox_wJhiymTfgOahgRTKy-XdrsiXLzsqUT11YMZuTUDeiiiJv0')">
<div class="absolute inset-0 bg-surface/30 backdrop-blur-[2px] flex items-center justify-center">
<div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest/90 text-primary-fixed-dim shadow-lg">
<span class="material-symbols-outlined text-[16px]">satellite_alt</span>
<span class="font-label-cyber-sm text-[10px] uppercase" id="previewRadarVenue">{{ strtoupper($venueName) }} // RADAR LOCKED</span>
</div>
</div>
</div>
<!-- Location Note -->
<div class="flex items-center gap-2 px-1">
<span class="material-symbols-outlined text-primary text-[16px] shrink-0">local_parking</span>
<span class="text-[11px] text-on-surface-variant leading-tight" id="previewVenueNote">Akses lokasi &amp; area parkir: {{ $venueName }}</span>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-2 pt-1">
<a id="previewMapsLinkMain" class="flex items-center justify-center gap-1.5 py-2.5 px-2 rounded-lg bg-primary-container text-on-primary text-xs font-bold uppercase shadow-[0_0_12px_rgba(0,240,255,0.25)] hover:opacity-90 active:scale-[0.98] transition" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[16px]">navigation</span>
<span>BUKA MAPS</span>
</a>
<button id="previewCopyAddressBtn" class="flex items-center justify-center gap-1.5 py-2.5 px-2 rounded-lg bg-surface-container-high text-on-surface text-xs font-bold uppercase hover:bg-surface-bright active:scale-[0.98] transition" onclick="copyToClipboard('{{ addslashes($venueAddress) }}', 'Alamat lokasi berhasil disalin')">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
<span>SALIN ALAMAT</span>
</button>
</div>
</div>
</section>
<!-- 6. Tema & Panduan Tata Busana (Dress Code) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-widest">AESTHETIC CODEX</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">PANDUAN BUSANA: CYBER NOIR &amp; NEON GLAMOUR</h3>
</div>
<!-- Palette Swatches -->
<div class="bg-surface-container-low rounded-xl p-space-md space-y-space-sm">
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase">APPROVED COLOR PALETTE SPECTRUM</span>
<div class="grid grid-cols-5 gap-2">
<div class="flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-primary-container shadow-[0_0_10px_rgba(0,240,255,0.4)]"></div>
<span class="font-label-cyber-sm text-[9px] text-on-surface-variant">CYAN</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-secondary-container shadow-[0_0_10px_rgba(255,74,141,0.4)]"></div>
<span class="font-label-cyber-sm text-[9px] text-on-surface-variant">MAGENTA</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-surface-container-lowest"></div>
<span class="font-label-cyber-sm text-[9px] text-on-surface-variant">OBSIDIAN</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-inverse-surface"></div>
<span class="font-label-cyber-sm text-[9px] text-on-surface-variant">SILVER</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-8 rounded bg-on-tertiary"></div>
<span class="font-label-cyber-sm text-[9px] text-on-surface-variant">VIOLET</span>
</div>
</div>
</div>
<!-- Male & Female Guides -->
<div class="grid grid-cols-1 gap-space-sm">
<!-- Tamu Pria -->
<div class="p-space-md rounded-xl bg-surface-container-high space-y-1">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">man</span>
<span class="font-label-cyber-md text-label-cyber-md font-bold text-primary uppercase">TAMU PRIA</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Avant-garde tailored dark blazer, techwear formal / dark suit dengan aksen neon minimalist atau batik modern monokrom futuristik.
        </p>
</div>
<!-- Tamu Wanita -->
<div class="p-space-md rounded-xl bg-surface-container-high space-y-1">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[20px]">woman</span>
<span class="font-label-cyber-md text-label-cyber-md font-bold text-secondary uppercase">TAMU WANITA</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Chic cyberpunk architectural cocktail dress, futuristic metallic evening gown, or sleek neon-accented elegant ensemble.
        </p>
</div>
</div>
</section>
<!-- 7. Galeri Foto (Cyber Archive: Vignettes of Life) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim uppercase tracking-widest">VISUAL REPOSITORIES</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">GALERI ARSIP // {{ strtoupper($couple->events->first()->title ?? 'Vignettes of Chapter 30') }}</h3>
</div>
<!-- Gallery Grid -->
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
<!-- 8. Formulir Konfirmasi Kehadiran (RSVP Protocol) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-widest">ACCESS TELEMETRY</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">KONFIRMASI KEHADIRAN (RSVP PROTOCOL)</h3>
</div>
<!-- RSVP Form -->
<div class="bg-surface-container-low rounded-xl p-space-lg shadow-xl space-y-space-md">
<form class="space-y-space-md" id="rsvp-form" onsubmit="handleRsvpSubmit(event)">
<!-- Guest Name -->
<div class="space-y-1">
<label class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase tracking-wider block" for="rsvp-name">
            NAMA LENGKAP TAMU
          </label>
<input class="w-full px-space-md py-3 rounded-lg bg-surface-container-high text-on-surface font-body-md focus:bg-surface-bright focus:outline-none transition" id="rsvp-name" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Attendance Count -->
<div class="space-y-1">
<label class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase tracking-wider block" for="rsvp-pax">
            JUMLAH TAMU (PAX)
          </label>
<select class="w-full px-space-md py-3 rounded-lg bg-surface-container-high text-on-surface font-body-md focus:bg-surface-bright focus:outline-none transition" id="rsvp-pax">
<option selected="" value="2">2 Tamu ({{ $guestName }})</option>
<option value="1">1 Tamu (Hadir Sendiri)</option>
</select>
</div>
<!-- Attendance Status -->
<div class="space-y-2">
<span class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase tracking-wider block">
            STATUS KONFIRMASI KEHADIRAN
          </span>
<div class="grid grid-cols-2 gap-space-sm">
<label class="flex items-center gap-space-sm p-3 rounded-lg bg-surface-container-high cursor-pointer hover:bg-surface-bright transition">
<input checked="" class="accent-primary-container w-4 h-4" name="rsvp_status" type="radio" value="hadir"/>
<span class="font-label-cyber-sm text-label-cyber-sm text-primary font-bold uppercase">⚡ YA, PASTI HADIR</span>
</label>
<label class="flex items-center gap-space-sm p-3 rounded-lg bg-surface-container-high cursor-pointer hover:bg-surface-bright transition">
<input class="accent-error w-4 h-4" name="rsvp_status" type="radio" value="berhalangan"/>
<span class="font-label-cyber-sm text-label-cyber-sm text-error font-bold uppercase">✕ BERHALANGAN</span>
</label>
</div>
</div>
<!-- Wishes / Notes Textarea -->
<div class="space-y-1">
<label class="font-label-cyber-sm text-label-cyber-sm text-on-surface-variant uppercase tracking-wider block" for="rsvp-notes">
            PESAN, DOA &amp; FREKUENSI HARAPAN
          </label>
<textarea class="w-full p-space-md rounded-lg bg-surface-container-high text-on-surface font-body-md focus:bg-surface-bright focus:outline-none placeholder:text-on-surface-variant/50 transition" id="rsvp-notes" placeholder="Tuliskan ucapan selamat ulang tahun untuk Kevin..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full py-3.5 rounded-xl bg-primary-container text-on-primary font-label-cyber-lg text-label-cyber-lg uppercase tracking-wider shadow-[0_0_20px_rgba(0,240,255,0.4)] hover:opacity-95 active:scale-[0.99] transition flex items-center justify-center gap-2" id="rsvp-submit-btn" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
          TRANSMIT CONFIRMATION (KIRIM RSVP)
        </button>
<div class="hidden p-space-md rounded-lg bg-surface-container-high text-primary font-label-cyber-sm text-label-cyber-sm text-center" id="rsvp-alert">
          ✓ TRANSMISI BERHASIL. DATA TERVERIFIKASI PADA POD QUANTUM A-09!
        </div>
</form>
</div>
</section>
<!-- 9. Buku Tamu Digital (Wishes Feed) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim uppercase tracking-widest">FREQUENCY RECEPTION</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">BUKU TAMU DIGITAL // WISHES FEED</h3>
</div>
<!-- Feed Cards -->
<div class="space-y-space-sm" id="wishes-stream">
<!-- Message 1 -->
<div class="p-space-md rounded-xl bg-surface-container-low space-y-2 shadow-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-xs">
              AR
            </div>
<span class="font-body-md text-body-md font-bold text-on-surface">Arya Pratama</span>
</div>
<span class="font-label-cyber-sm text-[10px] text-on-surface-variant">T-MINUS 2H // VERIFIED</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          “Welcome to Chapter 30, Vin! Selalu kagum sama etos inovasi dan kebaikan lo. Semoga dekade baru ini membawa kedamaian, kesehatan paripurna, dan terobosan karya yang makin masif!”
        </p>
<div class="flex items-center gap-1 text-primary-fixed-dim text-xs">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-cyber-sm text-[10px]">18 RESONANCES</span>
</div>
</div>
<!-- Message 2 -->
<div class="p-space-md rounded-xl bg-surface-container-low space-y-2 shadow-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-xs">
              SL
            </div>
<span class="font-body-md text-body-md font-bold text-on-surface">Stella L. &amp; Tim SCBD</span>
</div>
<span class="font-label-cyber-sm text-[10px] text-on-surface-variant">T-MINUS 5H // VERIFIED</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          “Happy milestone birthday Kevin Danuarta! Can’t wait to celebrate tonight at Aether Skybar. Cheers to more modular synth jams and futuristic visions!”
        </p>
<div class="flex items-center gap-1 text-secondary text-xs">
<span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
<span class="font-label-cyber-sm text-[10px]">24 RESONANCES</span>
</div>
</div>
</div>
</section>
<!-- 10. Tanda Kasih Digital (Gift Registry) -->
<section class="w-full space-y-space-md">
<div class="flex flex-col">
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-widest">DIGITAL TOKEN ENVELOPE</span>
<h3 class="font-headline-sm text-headline-sm uppercase text-on-surface font-bold">TANDA KASIH DIGITAL (GIFT REGISTRY)</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
      Kehadiran, doa tulus, dan restu Anda adalah anugerah terbesar bagi kami. Namun jika Anda berkenan memberikan tanda kasih digital untuk melengkapi momen ini, sarana berikut telah disiapkan:
    </p>
<!-- Bank Cards -->
<div class="space-y-space-sm">
<!-- Bank 1 Card -->
<div class="p-space-md rounded-xl bg-surface-container border border-outline/30 flex items-center justify-between shadow-sm mb-3">
<div class="space-y-1">
<span class="font-label-caps text-label-caps text-secondary-fixed">{{ $bankName1 }}</span>
<p class="font-headline-sm text-headline-sm text-primary font-bold tracking-wider" id="accBCA">{{ $bankAccount1 }}</p>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary/20 text-primary hover:bg-primary hover:text-on-primary px-3 py-2 rounded-lg font-label-caps text-label-caps uppercase transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="p-space-md rounded-xl bg-surface-container border border-outline/30 flex items-center justify-between shadow-sm">
<div class="space-y-1">
<span class="font-label-caps text-label-caps text-secondary-fixed">{{ $bankName2 }}</span>
<p class="font-headline-sm text-headline-sm text-primary font-bold tracking-wider" id="accMandiri">{{ $bankAccount2 }}</p>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary/20 text-primary hover:bg-primary hover:text-on-primary px-3 py-2 rounded-lg font-label-caps text-label-caps uppercase transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</div>
</section>
<!-- 11. Closing Section -->
<section class="w-full flex flex-col items-center text-center space-y-space-md pt-space-lg pb-space-xl">
<!-- Emblem Seal https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27 -->
<div class="relative w-32 h-32 flex items-center justify-center">
<div class="absolute inset-0 rounded-full bg-primary-fixed-dim/20 blur-xl"></div>
<img alt="Chapter 30 Official Cyber Emblem Seal" class="w-28 h-28 object-contain relative z-10 filter drop-shadow-[0_0_16px_rgba(0,240,255,0.6)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27"/>
</div>
<!-- Closing Message -->
<div class="space-y-space-xs max-w-sm">
<span class="font-label-cyber-sm text-label-cyber-sm text-primary-fixed-dim uppercase tracking-[0.2em]">SYNCHRONIZATION COMPLETE</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">SAMPAI JUMPA DI FREKUENSI 30</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed px-space-sm">
        Dengan kerendahan hati dan sukacita mendalam, terima kasih atas kehadiran, persahabatan, dan energi positif yang Anda alirkan sepanjang tiga dekade ini.
      </p>
</div>
<!-- Sign-off -->
<div class="flex flex-col items-center space-y-1">
<span class="font-label-cyber-md text-label-cyber-md text-primary font-bold tracking-widest uppercase">KEVIN DANUARTA &amp; FAMILY</span>
<span class="font-label-cyber-sm text-label-cyber-sm text-secondary tracking-widest">#KEVINDANUARTA30 #CYBERNEONSOIRÉE</span>
</div>
</section>
</div>
<script>
  // Countdown Timer Logic targeting Nov 29, 2025 19:00:00 WIB (UTC+7)
  function initCountdown() {
    let eventTime = new Date("{{ $targetDate->toIso8601String() }}").getTime();

    function update() {
      const now = new Date().getTime();
      const diff = eventTime - now;

      if (diff <= 0) {
        document.getElementById('hud-days').innerText = '00';
        document.getElementById('hud-hours').innerText = '00';
        document.getElementById('hud-mins').innerText = '00';
        document.getElementById('hud-secs').innerText = '00';
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const secs = Math.floor((diff % (1000 * 60)) / 1000);

      document.getElementById('hud-days').innerText = String(days).padStart(2, '0');
      document.getElementById('hud-hours').innerText = String(hours).padStart(2, '0');
      document.getElementById('hud-mins').innerText = String(mins).padStart(2, '0');
      document.getElementById('hud-secs').innerText = String(secs).padStart(2, '0');
    }

    update();
    setInterval(update, 1000);

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        eventTime = new Date(newDateStr).getTime();
        update();
      }
    };
  }

  // Google Calendar Integration
  function saveToGoogleCalendar() {
    const title = encodeURIComponent('Kevin Danuarta 30th Birthday: Cyber Neon Soirée');
    const details = encodeURIComponent('VIP Milestone 30th Soirée celebration for Kevin Danuarta at Aether Skybar & Ultra Lounge Level 67, SCBD Jakarta.');
    const location = encodeURIComponent('Aether Skybar Level 67, Treasury Tower, District 8 SCBD, Jakarta');
    const dates = '20251129T120000Z/20251129T190000Z'; // 19:00 to 02:00 WIB (+7)
    const url = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${title}&dates=${dates}&details=${details}&location=${location}`;
    window.open(url, '_blank');
  }

  // Address copy helper
  function copyAddress() {
    const addr = "Treasury Tower, District 8 SCBD, Jl. Jend. Sudirman Kav 52-53, Jakarta Selatan";
    navigator.clipboard.writeText(addr).then(() => {
      alert("Alamat berhasil disalin ke clipboard!");
    });
  }

  // Bank account copy helper
  function copyAccount(accNumber, btn) {
    navigator.clipboard.writeText(accNumber).then(() => {
      const orig = btn.innerText;
      btn.innerText = "TERSALIN ✓";
      setTimeout(() => {
        btn.innerText = orig;
      }, 2000);
    });
  }

  // RSVP submission interaction
  function handleRsvpSubmit(e) {
    e.preventDefault();
    const name = document.getElementById('rsvp-name').value;
    const notes = document.getElementById('rsvp-notes').value;
    const alertBox = document.getElementById('rsvp-alert');
    const submitBtn = document.getElementById('rsvp-submit-btn');

    submitBtn.disabled = true;
    submitBtn.innerText = "TRANSMITTING DATA...";

    setTimeout(() => {
      alertBox.classList.remove('hidden');
      submitBtn.innerText = "DATA TRANSMITTED ✓";

      // Dynamically add guest wish if provided
      if (notes.trim()) {
        const feed = document.getElementById('wishes-stream');
        const newCard = document.createElement('div');
        newCard.className = "p-space-md rounded-xl bg-surface-container-low space-y-2 shadow-sm animate-pulse";
        newCard.innerHTML = `
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-xs">
                ${name.substring(0, 2).toUpperCase()}
              </div>
              <span class="font-body-md text-body-md font-bold text-on-surface">${name}</span>
            </div>
            <span class="font-label-cyber-sm text-[10px] text-primary-fixed-dim">JUST NOW // LIVE</span>
          </div>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            &ldquo;${notes}&rdquo;
          </p>
          <div class="flex items-center gap-1 text-primary-fixed-dim text-xs">
            <span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">favorite</span>
            <span class="font-label-cyber-sm text-[10px]">1 RESONANCE</span>
          </div>
        `;
        feed.prepend(newCard);
      }
    }, 800);
  }

  // Run countdown on mount
  initCountdown();
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/85 backdrop-blur-xl shadow-[0_-1px_12px_rgba(0,0,0,0.2)]" data-active-classes="text-primary-fixed-dim"><div class="h-20 px-space-xs flex items-center justify-around"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] gap-0.5 transition-colors text-primary-fixed-dim" data-path="undangan-utama" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_unread</span><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] gap-0.5 text-on-surface-variant hover:text-on-surface transition-colors" data-path="profil" href="#"><span class="material-symbols-outlined text-[22px]">badge</span><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">Profil</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] gap-0.5 text-on-surface-variant hover:text-on-surface transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">schedule</span><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] gap-0.5 text-on-surface-variant hover:text-on-surface transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">location_on</span><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] gap-0.5 text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-cyber-sm text-label-cyber-sm uppercase tracking-wider">RSVP</span></a></div></nav>
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
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "19.00 - Selesai";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1"><span class="material-symbols-outlined text-[13px]">navigation</span><span>Buka Maps</span></a>` : "";
                const timeBg = (i % 2 === 0) ? "bg-secondary-container text-on-secondary-container" : "bg-surface-container-high text-primary";
                return `
                    <div class="flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low shadow-sm event-itinerary-item">
                        <div class="flex flex-col items-center justify-center min-w-[64px] px-2 py-1.5 rounded ${timeBg} font-label-cyber-sm text-label-cyber-sm font-bold">
                            ${timeStr}
                        </div>
                        <div class="flex flex-col min-w-0 flex-1">
                            <span class="font-label-cyber-sm text-label-cyber-sm text-secondary uppercase tracking-wide">SESI ${i + 1}</span>
                            <span class="font-body-md text-body-md font-medium text-on-surface truncate">${title}</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</span>
                            ${dateStr ? `<span class="text-[10px] text-primary-fixed-dim block mt-0.5">${dateStr}</span>` : ""}
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
                    const elM = document.getElementById('previewMapsLinkMain');
                    if (elM) elM.href = val || '{{ $mapsUrl }}';
                }

                if (field === 'venue_name' || field === 'event_1_venue') {
                    const elV = document.getElementById('previewVenueNameMain');
                    if (elV) elV.innerText = val || '{{ $venueName }}';
                    const elR = document.getElementById('previewRadarVenue');
                    if (elR) elR.innerText = (val || '{{ $venueName }}').toUpperCase() + ' // RADAR LOCKED';
                    const elN = document.getElementById('previewVenueNote');
                    if (elN) elN.innerText = 'Akses lokasi: ' + (val || '{{ $venueName }}');
                }

                if (field === 'venue_address' || field === 'event_1_address') {
                    const elA = document.getElementById('previewVenueAddressMain');
                    if (elA) elA.innerText = val || '{{ $venueAddress }}';
                }

                if (field === 'venue_name_only') {
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
                const elM = document.getElementById('previewMapsLinkMain');
                if (elM && ev0.maps_url) elM.href = ev0.maps_url;
                const elV = document.getElementById('previewVenueNameMain');
                if (elV && ev0.venue_name) elV.innerText = ev0.venue_name;
                const elA = document.getElementById('previewVenueAddressMain');
                if (elA && ev0.address) elA.innerText = ev0.address;
                const elR = document.getElementById('previewRadarVenue');
                if (elR && ev0.venue_name) elR.innerText = ev0.venue_name.toUpperCase() + ' // RADAR LOCKED';
                const elN = document.getElementById('previewVenueNote');
                if (elN && ev0.venue_name) elN.innerText = 'Akses lokasi: ' + ev0.venue_name;
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'cyber-neon-futuristic' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>