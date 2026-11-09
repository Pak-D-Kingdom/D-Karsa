<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Kisah Raden Arya: Mahkota Garuda Kencana') . ' - ' . ($couple->groom_name ?? 'Raden Arya & Sang Garuda') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Raden Arya & Sang Garuda' }} - Tema Karakter Original - Tradisional Nusantara Champagne Glow."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "on-secondary-container": "#785f4d", "surface-container-high": "#fde3d6", "outline": "#7f7667", "surface-container": "#ffeadf", "on-primary-container": "#4e3700", "secondary-fixed": "#fedcc5", "surface-container-low": "#fff1eb", "on-primary-fixed-variant": "#5d4201", "on-tertiary-container": "#602c00", "tertiary-fixed": "#ffdcc7", "primary": "#775a19", "secondary": "#725947", "on-surface-variant": "#4e4639", "on-background": "#261911", "background": "#fff8f5", "secondary-container": "#fedcc5", "on-secondary-fixed-variant": "#594231", "surface": "#fff8f5", "on-tertiary-fixed-variant": "#723600", "inverse-on-surface": "#ffede5", "surface-variant": "#f7ddd0", "surface-bright": "#fff8f5", "on-primary-fixed": "#261900", "on-error": "#ffffff", "primary-container": "#c5a059", "on-secondary": "#ffffff", "primary-fixed": "#ffdea5", "surface-tint": "#775a19", "on-tertiary-fixed": "#311300", "on-surface": "#261911", "error": "#ba1a1a", "tertiary": "#964900", "on-primary": "#ffffff", "on-tertiary": "#ffffff", "tertiary-container": "#f9872c", "inverse-primary": "#e9c176", "inverse-surface": "#3d2d24", "error-container": "#ffdad6", "primary-fixed-dim": "#e9c176", "secondary-fixed-dim": "#e1c0aa", "tertiary-fixed-dim": "#ffb787", "outline-variant": "#d1c5b4", "surface-container-lowest": "#ffffff", "on-error-container": "#93000a", "on-secondary-fixed": "#29180a", "surface-container-highest": "#f7ddd0", "surface-dim": "#efd5c8" }, borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, spacing: { "space-lg": "1.5rem", "margin-mobile": "1.25rem", "space-xl": "2.5rem", "gutter": "1.5rem", "margin": "3rem", "space-sm": "0.5rem", "space-md": "1rem", "space-xs": "0.25rem", "gutter-mobile": "1rem" }, fontFamily: { "display-lg": ["EB Garamond"], "headline-lg": ["EB Garamond"], "body-lg": ["Plus Jakarta Sans"], "title-lg": ["EB Garamond"], "headline-lg-mobile": ["EB Garamond"], "label-md": ["Plus Jakarta Sans"], "display-lg-mobile": ["EB Garamond"], "body-md": ["Plus Jakarta Sans"], "label-lg": ["Plus Jakarta Sans"], "headline-sm": ["EB Garamond"], "label-sm": ["Plus Jakarta Sans"], "body-sm": ["Plus Jakarta Sans"], "headline-md": ["EB Garamond"] }, fontSize: { "display-lg": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.01em", "fontWeight": "500" }], "headline-lg": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.005em", "fontWeight": "600" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "title-lg": ["18px", { "lineHeight": "26px", "letterSpacing": "0.02em", "fontWeight": "700" }], "headline-lg-mobile": ["30px", { "lineHeight": "38px", "fontWeight": "600" }], "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.06em", "fontWeight": "600" }], "display-lg-mobile": ["38px", { "lineHeight": "46px", "letterSpacing": "-0.01em", "fontWeight": "500" }], "body-md": ["15px", { "lineHeight": "24px", "fontWeight": "400" }], "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.04em", "fontWeight": "600" }], "headline-sm": ["22px", { "lineHeight": "30px", "fontWeight": "600" }], "label-sm": ["10px", { "lineHeight": "14px", "letterSpacing": "0.08em", "fontWeight": "700" }], "body-sm": ["13px", { "lineHeight": "20px", "fontWeight": "400" }], "headline-md": ["28px", { "lineHeight": "36px", "fontWeight": "600" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Raden Arya & Sang Garuda';
        $celebrantNick = $couple->groom_nickname ?? 'Arya';
        $heading = $couple->event_heading ?? 'Kisah Raden Arya: Mahkota Garuda Kencana';
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
        $quote = $couple->quote ?? 'Menyemai keberanian, merayakan kehangatan budi, dan menyalakan lentera harapan di setiap langkah.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuChhiII7NyQNgNEyDo4e3CDUnEaXefFwGqaSvtNSDIPhz6aXNTOlJXQvHKBntUXt1qMiMahvcuAwQwiIlOA_ynwTckrAoAe22MkZSaeWq-Oicetc-U9aUDXK6HiQH936eBuz2FlXP9ubXfYT4RKlRGCaIl0sqsTHiS6GoZzzLL9O0xttgksHjHumHI28k1rMeMfz8gaCpUxHNP1ncnt_U92ZIHI7bmI9ySJ5AHyCV_W';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAndyHQyiEp9j5JIF_ZXi9QdOUKQPru672n3HfIWYqHdZp24KhL1XWZn3awRuXQqQmkthkUQthKvGVW5UPAWkBL_2OG9VEr_0nxblb-C9Alqmq1Bn7rajedOzaLGo5OhmbOBwdJ2OkwZ4hPajDt-1ZA-HYARLPcfkdH7-PL_DyCef5t-pqdjS7PU1rGSrv8s9B2h7s_eA4FkxWgG8Gn7nDYiUzXdxUrS1H1QHJ0TdxC';
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

        $venueName = $couple->venue_name ?? 'Pendopo Agung Keraton Amarta';
        $venueAddress = $couple->venue_address ?? 'Jl. Taman Sari No. 12, Yogyakarta';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuChhiII7NyQNgNEyDo4e3CDUnEaXefFwGqaSvtNSDIPhz6aXNTOlJXQvHKBntUXt1qMiMahvcuAwQwiIlOA_ynwTckrAoAe22MkZSaeWq-Oicetc-U9aUDXK6HiQH936eBuz2FlXP9ubXfYT4RKlRGCaIl0sqsTHiS6GoZzzLL9O0xttgksHjHumHI28k1rMeMfz8gaCpUxHNP1ncnt_U92ZIHI7bmI9ySJ5AHyCV_W', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAndyHQyiEp9j5JIF_ZXi9QdOUKQPru672n3HfIWYqHdZp24KhL1XWZn3awRuXQqQmkthkUQthKvGVW5UPAWkBL_2OG9VEr_0nxblb-C9Alqmq1Bn7rajedOzaLGo5OhmbOBwdJ2OkwZ4hPajDt-1ZA-HYARLPcfkdH7-PL_DyCef5t-pqdjS7PU1rGSrv8s9B2h7s_eA4FkxWgG8Gn7nDYiUzXdxUrS1H1QHJ0TdxC', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAILgBhSarRN2yl0JL9rfvSq0pIy4MQdCFacXGkKORtdAjVvssReK4YJ3gacws8OW4C84zBrOlqkERfI7wbi6mbvgpjGkcuESkBdkS6EGX8rrBiX-3y1QhKWjJoD9xRIp1-CvTFsgBPYelAYf3elUJdZSaZFNTDMJKS5gW0skL4_mtGfGxBPouYAOVtzbxggBzb1p5DV5jox4934CzPzzX8SjaGVE0IXdZyEPvxaeqW', 'caption' => 'Momen Bahagia #3'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCETGEdyYmDysqbOmHoEbQYQYxUd8NBYZX-o58CCl-5NdUUHLkyO3h0JumAb-RgQbVh0mzuNJyxQy03NM03bM-OF3TNgLckQLdpyqp2wZqhHyrimH_-_fzhgxTwZIav9YJDh-z6hmj0w88_ydOUuLlzRs9cSy5mNNo-Dsyf4QeT0qfsq15-cinS0AM-6kuyQatBN4DNkHlSf0f0_DTQu5zFoP4GJyuF4U1VVG64Gei5', 'caption' => 'Momen Bahagia #4'],
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
        <main class="flex-1 flex flex-col relative w-full min-h-full bg-surface pt-safe pb-8"><div class="flex flex-col w-full min-h-full relative select-none px-4 py-2 justify-between">
<!-- Subtle Ornamental Cultural Ambient Accents -->
<div class="pointer-events-none absolute -top-12 -right-12 w-48 h-48 rounded-full bg-primary-fixed/20 blur-3xl"></div>
<div class="pointer-events-none absolute -bottom-10 -left-10 w-44 h-44 rounded-full bg-tertiary-fixed/25 blur-2xl"></div>
<!-- Header Section: Cultural Badge & Audio Teaser -->
<div class="flex flex-col items-center gap-1.5 w-full text-center z-10">
<div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-surface-container-high/80 text-on-surface-variant shadow-sm backdrop-blur-sm">
<span class="font-label-sm text-primary">✦</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant">Kisah {{ $couple->events->first()->title ?? "Maha Karya Nusantara" }} • Edisi Spesial</span>
<span class="font-label-sm text-primary">✦</span>
</div>
<button class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-low text-secondary shadow-sm active:scale-95 transition-transform duration-200" id="audioToggleBtn" type="button" onclick="toggleMusic()">
<span class="material-symbols-outlined text-[15px] text-primary" id="audioIcon" style="font-variation-settings: 'FILL' 1;">music_note</span>
<span class="font-label-sm text-label-sm text-secondary-fixed-variant">♪ Gamelan Serenade &amp; Champagne Harmony</span>
</button>
</div>
<!-- Central Interactive Royal Wax Seal -->
<div class="flex flex-col items-center justify-center my-1 z-10">
<div class="relative group cursor-pointer" id="sealButton">
<!-- Ambient Halo Glow behind Seal -->
<div class="absolute inset-0 rounded-full bg-primary-container/30 blur-xl scale-125 animate-pulse"></div>
<!-- Concentric Decorative Medallion Ring -->
<div class="relative w-28 h-28 sm:w-32 sm:h-32 rounded-full p-1 bg-gradient-to-tr from-primary-container via-primary-fixed to-primary-container shadow-xl flex items-center justify-center transition-transform duration-300 active:scale-95">
<div class="w-full h-full rounded-full p-1 bg-surface-container-highest flex items-center justify-center">
<img alt="Segel Kencana Royal Wax Emblem" class="w-full h-full object-contain rounded-full drop-shadow-md transition-transform duration-500 hover:rotate-6" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
</div>
<!-- Interactive Seal Prompt Indicator -->
<div class="mt-1 flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-surface-container/90 shadow-sm">
<span class="font-label-sm text-primary">◆</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-primary font-bold">Ketuk Untuk Membuka Segel Kencana</span>
<span class="font-label-sm text-primary">◆</span>
</div>
</div>
<!-- Celebrant & Theme Header -->
<div class="flex flex-col items-center text-center px-2 z-10">
<span class="font-label-sm text-label-sm tracking-widest uppercase text-secondary font-semibold">
      Perayaan Ulang Tahun Karakter Orisinal
    </span>
<h1 class="font-headline-lg-mobile text-headline-lg-mobile text-primary tracking-tight mt-0.5 mb-1 leading-tight" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<!-- Ornamental Central Divider -->
<div class="flex items-center justify-center gap-2 w-32 my-0.5">
<span class="h-px bg-outline-variant flex-1"></span>
<span class="material-symbols-outlined text-[13px] text-primary" style="font-variation-settings: 'FILL' 1;">diamond</span>
<span class="h-px bg-outline-variant flex-1"></span>
</div>
<p class="font-title-lg text-body-sm italic text-on-surface-variant max-w-xs leading-snug">
      “Menyemai keberanian, merayakan kehangatan budi, dan menyalakan lentera harapan di tanah Nusantara.”
    </p>
</div>
<!-- VIP Guest Specification Card -->
<div class="relative w-full max-w-sm mx-auto rounded-xl p-3 bg-surface-container-lowest/90 shadow-md backdrop-blur-md z-10 my-1 overflow-hidden">
<!-- Subtle Golden Batik Parang Corner Accents -->
<div class="absolute top-0 right-0 w-12 h-12 bg-primary-fixed/15 rounded-bl-full pointer-events-none"></div>
<div class="absolute bottom-0 left-0 w-12 h-12 bg-secondary-fixed/20 rounded-tr-full pointer-events-none"></div>
<div class="relative flex flex-col items-center text-center gap-1">
<div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container">
<span class="material-symbols-outlined text-[12px] text-tertiary" style="font-variation-settings: 'FILL' 1;">stars</span>
<span class="font-label-sm text-label-sm uppercase font-semibold">Tamu Kehormatan • Access Pass: No. 007-NUSA</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-0.5">
        Kepada Yth. Bapak/Ibu/Saudara/i:
      </span>
<!-- Guest Name Plate -->
<div class="w-full py-1 px-3 rounded-lg bg-surface-container-low shadow-sm">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-wide" id="previewGuestNameCover">
          {{ $guestName }}
        </span>
</div>
<span class="font-label-md text-label-md text-secondary">Di Tempat</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-tight mt-0.5">
        Merupakan kehormatan agung bagi kami menyambut kehadiran Anda dalam perayaan berbalut tradisi dan sukacita kencana ini.
      </p>
</div>
</div>
<!-- Primary Call to Action Button -->
<div class="flex flex-col items-center w-full max-w-xs mx-auto z-10 my-0.5">
<button class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-primary via-primary-container to-primary text-on-primary font-label-lg text-label-lg tracking-wider uppercase font-bold shadow-lg hover:shadow-xl active:scale-95 transition-all duration-200 flex items-center justify-center gap-2 relative overflow-hidden group cursor-pointer" id="openInvitationBtn" type="button" onclick="openInvitation()">
<span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 pointer-events-none"></span>
<span class="material-symbols-outlined text-[18px]">drafts</span>
<span>Buka Undangan (Buka Envelope)</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</div>
<!-- Bottom Event Micro-Info & Dress Code -->
<div class="flex flex-col items-center text-center gap-1 z-10 pb-1">
<div class="flex items-center justify-center gap-1.5 text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-primary" style="font-variation-settings: 'FILL' 1;">event</span>
<span class="font-body-sm text-body-sm font-medium">{{ $eventDateFormatted }}</span>
<span class="text-outline-variant">•</span>
<span class="material-symbols-outlined text-[14px] text-primary" style="font-variation-settings: 'FILL' 1;">location_on</span>
<span class="font-body-sm text-body-sm font-medium">Sasana Kriya TMII Jakarta</span>
</div>
<div class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container text-on-secondary-container">
<span class="material-symbols-outlined text-[12px] text-tertiary" style="font-variation-settings: 'FILL' 1;">checkroom</span>
<span class="font-label-sm text-label-sm uppercase font-semibold">
        Dress Code: Tradisional Kontemporer / Champagne Glow &amp; Batik Keraton
      </span>
</div>
</div>
</div>
<script>
  (function () {
    var audioBtn = document.getElementById('audioToggleBtn');
    var audioIcon = document.getElementById('audioIcon');
    var isPlaying = false;

    if (audioBtn && audioIcon) {
      audioBtn.addEventListener('click', function () {
        isPlaying = !isPlaying;
        if (isPlaying) {
          audioIcon.innerText = 'volume_up';
          audioBtn.classList.add('bg-primary-fixed');
        } else {
          audioIcon.innerText = 'music_note';
          audioBtn.classList.remove('bg-primary-fixed');
        }
      });
    }

    var sealBtn = document.getElementById('sealButton');
    var openBtn = document.getElementById('openInvitationBtn');

    function triggerOpenEnvelope(e) {
      if (e) e.preventDefault();
      var btn = openBtn;
      if (btn) {
        btn.classList.add('scale-95');
        setTimeout(function () {
          btn.classList.remove('scale-95');
          if (typeof openInvitation === 'function') openInvitation();
        }, 180);
      } else {
        if (typeof openInvitation === 'function') openInvitation();
      }
    }

    if (sealBtn) {
      sealBtn.addEventListener('click', triggerOpenEnvelope);
    }
    if (openBtn) {
      openBtn.addEventListener('click', triggerOpenEnvelope);
    }
  })();
</script></main>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <header class="fixed top-0 inset-x-0 z-50 bg-surface/85 backdrop-blur-xl pt-safe shadow-[0_1px_12px_rgba(197,160,89,0.08)] max-w-md mx-auto"><div class="h-16 px-gutter-mobile flex items-center justify-between"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-primary text-[20px]">auto_awesome</span><h1 class="font-title-lg text-title-lg tracking-wide text-on-surface" id="previewGroomNameTitle">{{ $celebrantName }}</h1></div><div class="flex items-center gap-space-xs"><button type="button" id="music-fab" onclick="toggleMusic()" aria-label="Toggle Musik" class="w-11 h-11 rounded-full flex items-center justify-center text-primary hover:bg-surface-container transition-colors cursor-pointer"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 flex flex-col relative w-full pt-16 pb-24 bg-surface"><div class="flex flex-col w-full relative">
<!-- Ambient Gold Sparks Animation Canvas -->
<div class="relative w-full px-gutter-mobile flex flex-col gap-space-lg pt-space-md">
<!-- 1. Top Milestone Tag & Audio Widget Indicator -->
<div class="flex flex-col items-center text-center gap-space-xs">
<div class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-secondary-container/60 shadow-sm">
<span class="material-symbols-outlined text-[15px] text-primary" style="font-variation-settings: 'FILL' 1;">stars</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface font-bold">Perayaan Ulang Tahun Ke-7 &amp; Peluncuran Karakter</span>
</div>
<div class="flex items-center justify-center gap-space-sm w-full py-1">
<span class="h-[1px] w-12 bg-gradient-to-r from-transparent to-primary-container"></span>
<span class="material-symbols-outlined text-primary text-[14px]">spa</span>
<span class="h-[1px] w-12 bg-gradient-to-l from-transparent to-primary-container"></span>
</div>
<div class="flex items-center gap-space-xs text-secondary bg-surface-container-low px-space-sm py-0.5 rounded-full shadow-sm">
<span class="material-symbols-outlined text-[14px] text-tertiary animate-pulse">graphic_eq</span>
<span class="font-label-sm text-label-sm tracking-normal">Gamelan Degung Laras Kencana Sedang Mengalun</span>
</div>
</div>
<!-- 2. Hero Section: Original Character Illustration -->
<div class="relative flex flex-col items-center bg-surface-container-low rounded-xl shadow-md p-space-md overflow-hidden">
<!-- Ornate Header Accent -->
<div class="flex items-center justify-between w-full px-space-sm pb-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">filter_vintage</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">{{ $couple->events->first()->title ?? "Maha Karya Nusantara" }}</span>
<span class="material-symbols-outlined text-primary text-[20px]">filter_vintage</span>
</div>
<!-- Main Portrait Frame -->
<div class="relative w-full aspect-[3/4] max-h-[460px] rounded-xl overflow-hidden shadow-lg bg-surface-container-high flex items-center justify-center">
<img alt="Raden Arya dan Sang Garuda Kencana" class="w-full h-full object-cover object-center" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<!-- Golden Ambient Gradient Scrim -->
<div class="absolute inset-0 bg-gradient-to-t from-on-background/80 via-transparent to-on-background/20 pointer-events-none"></div>
<div class="absolute bottom-space-md inset-x-space-md flex flex-col items-center text-center text-on-primary">
<span class="font-label-sm text-label-sm uppercase tracking-widest bg-primary/80 backdrop-blur-sm px-space-sm py-0.5 rounded-full mb-1">
            Tokoh Ksatria Cilik Nusantara
          </span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-inverse-on-surface drop-shadow-md">
            Raden Arya &amp; Garuda Kencana
          </h2>
</div>
</div>
<!-- Character Narrative Description -->
<div class="flex flex-col items-center text-center px-space-xs pt-space-md">
<p class="font-body-md text-body-md text-on-surface-variant italic leading-relaxed">
          “Kisah keberanian tunas bangsa berpadu luhurnya warisan leluhur. Selamat datang di perjamuan penuh kehangatan, cahaya lentera, dan keajaiban budaya.”
        </p>
<div class="flex items-center gap-space-xs mt-space-sm">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
</div>
</div>
</div>
<!-- 3. Guest Name Card (Kepada Yth) -->
<div class="bg-surface-container rounded-xl p-space-md shadow-sm relative overflow-hidden">
<div class="flex flex-col items-center text-center gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Undangan Kehormatan</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Kepada Yth. Bapak / Ibu / Saudara/i:</span>
<h3 class="font-headline-sm text-headline-sm text-primary font-bold mt-0.5">
          <span id="previewGuestNameMain">{{ $guestName }}</span>
        </h3>
<div class="mt-space-xs inline-flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-1 rounded-full shadow-sm">
<span class="material-symbols-outlined text-primary text-[16px]">chair</span>
<span class="font-label-md text-label-md text-on-secondary-container">Meja Reservasi VIP: Bale Kencana Suite 01</span>
</div>
</div>
</div>
<!-- 4. Lore & Karakter Orisinal (3 Babak) -->
<div class="flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Kisah Sang Tokoh</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Kisah Raden Arya</h3>
</div>
<!-- Story Cards -->
<div class="grid grid-cols-1 gap-space-sm">
<!-- Babak 1 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex gap-space-md shadow-sm">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center shrink-0 text-primary">
<span class="material-symbols-outlined text-[20px]">castle</span>
</div>
<div class="flex flex-col gap-0.5">
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold">Babak I</span>
<h4 class="font-title-lg text-title-lg text-on-surface">Ksatria Cilik di Bumi Pasundan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Tumbuh dalam dekapan tata krama luhur kraton, Raden Arya memegang teguh ajaran budi pekerti serta kecintaan mendalam pada tanah air sejak usia dini.
            </p>
</div>
</div>
<!-- Babak 2 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex gap-space-md shadow-sm">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center shrink-0 text-on-primary-fixed">
<span class="material-symbols-outlined text-[20px]">flight</span>
</div>
<div class="flex flex-col gap-0.5">
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold">Babak II</span>
<h4 class="font-title-lg text-title-lg text-on-surface">Persahabatan Garuda Emas</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Bertemu Sang Garuda Kencana penjaga gemintang. Menjadi lambang setia kawan yang membimbing setiap langkah keberanian melewati rimba tantangan.
            </p>
</div>
</div>
<!-- Babak 3 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex gap-space-md shadow-sm">
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center shrink-0 text-tertiary">
<span class="material-symbols-outlined text-[20px]">lightbulb</span>
</div>
<div class="flex flex-col gap-0.5">
<span class="font-label-sm text-label-sm uppercase text-secondary font-bold">Babak III</span>
<h4 class="font-title-lg text-title-lg text-on-surface">Misi Lentera Kebudayaan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Mengajak generasi muda Nusantara untuk bangga berbusana adat, mencintai pusaka luhur, dan menerangi masa depan dengan kejujuran hati.
            </p>
</div>
</div>
</div>
<!-- Character Attribute Badges -->
<div class="grid grid-cols-3 gap-space-xs text-center">
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex flex-col items-center">
<span class="material-symbols-outlined text-primary text-[20px]">shield</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold mt-1">Keberanian</span>
<span class="font-label-sm text-[9px] text-outline">Tanpa Pamrih</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex flex-col items-center">
<span class="material-symbols-outlined text-primary text-[20px]">favorite</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold mt-1">Budi Luhur</span>
<span class="font-label-sm text-[9px] text-outline">Tata Krama</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm flex flex-col items-center">
<span class="material-symbols-outlined text-primary text-[20px]">public</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold mt-1">Cinta Pertiwi</span>
<span class="font-label-sm text-[9px] text-outline">Rasa Bangga</span>
</div>
</div>
</div>
<!-- 5. Detail Acara & Countdown Timer -->
<div class="bg-inverse-surface text-inverse-on-surface rounded-xl p-space-md shadow-xl flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs text-primary-fixed">
<span class="material-symbols-outlined text-[20px]">event</span>
<span class="font-label-md text-label-md tracking-wider uppercase font-bold">Waktu &amp; Tanggal Acara</span>
</div>
<span class="font-label-sm text-label-sm bg-surface-container-highest/20 text-primary-fixed-dim px-2 py-0.5 rounded">Tahun 2025</span>
</div>
<div class="flex flex-col text-center items-center gap-1">
<h3 class="font-headline-md text-headline-md text-primary-fixed font-bold">{{ $eventDateFormatted }}</h3>
<p class="font-body-sm text-body-sm text-surface-container-highest">
          Pukul 16.00 – 21.00 WIB
        </p>
<span class="font-label-sm text-label-sm text-tertiary-fixed-dim">Pintu Gerbang Kencana dibuka pukul 15.30 WIB</span>
</div>
<!-- Live Countdown Blocks -->
<div class="grid grid-cols-4 gap-space-xs text-center my-space-xs" id="countdown-wrapper">
<div class="bg-on-background/60 p-space-xs rounded flex flex-col">
<span class="font-headline-md text-headline-md text-primary-fixed font-bold" id="cd-days">246</span>
<span class="font-label-sm text-[10px] uppercase text-surface-variant">Hari</span>
</div>
<div class="bg-on-background/60 p-space-xs rounded flex flex-col">
<span class="font-headline-md text-headline-md text-primary-fixed font-bold" id="cd-hours">14</span>
<span class="font-label-sm text-[10px] uppercase text-surface-variant">Jam</span>
</div>
<div class="bg-on-background/60 p-space-xs rounded flex flex-col">
<span class="font-headline-md text-headline-md text-primary-fixed font-bold" id="cd-mins">32</span>
<span class="font-label-sm text-[10px] uppercase text-surface-variant">Menit</span>
</div>
<div class="bg-on-background/60 p-space-xs rounded flex flex-col">
<span class="font-headline-md text-headline-md text-primary-fixed font-bold" id="cd-secs">50</span>
<span class="font-label-sm text-[10px] uppercase text-surface-variant">Detik</span>
</div>
</div>
<!-- Add to Calendar Button -->
<a class="w-full py-2.5 px-space-md rounded bg-primary-container text-on-primary-container font-label-md text-label-md font-bold uppercase tracking-wider text-center flex items-center justify-center gap-space-xs shadow-md active:scale-95 transition-transform" href="https://calendar.google.com" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
        Simpan ke Google Calendar
      </a>
<!-- Rundown Acara -->
<div class="flex flex-col gap-space-sm pt-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary-fixed font-bold">Rundown Agenda Perayaan</span>
<div class="flex flex-col gap-space-xs" id="itineraryContainer">
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
        if (empty($evTimeStr)) $evTimeStr = "16.00 - 21.00 WIB";
        $evVenue = $event->venue_name ?? $venueName;
        $evAddress = $event->address ?? "";
        $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
    @endphp
    <div class="flex items-start gap-space-sm p-space-xs rounded bg-on-background/40 event-itinerary-item">
        <span class="font-label-md text-label-md font-bold text-primary-fixed shrink-0">{{ $evTimeStr }}</span>
        <div class="flex flex-col flex-1 min-w-0">
            <span class="font-body-sm text-body-sm text-inverse-on-surface font-semibold leading-snug">{{ $event->title ?? ("Acara " . ($index + 1)) }}</span>
            <span class="font-body-sm text-[12px] text-surface-variant">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</span>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary-fixed block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary-fixed hover:underline mt-1 font-semibold">
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
</div>
</div>
<!-- 6. Panduan Busana (Dress Code) -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="material-symbols-outlined text-primary text-[24px]">styler</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-1">Panduan Busana Acara</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Tema: Nusantara Champagne Glow &amp; Batik Keraton</p>
</div>
<!-- Color Swatches -->
<div class="flex items-center justify-center gap-space-sm py-space-xs">
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-primary-container shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Champagne</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-surface-container-lowest shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Ivory Silk</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-secondary shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Teak Wood</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-tertiary-container shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Amber Glow</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-8 h-8 rounded-full bg-primary shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface-variant">Bronze</span>
</div>
</div>
<!-- Male & Female Guides -->
<div class="grid grid-cols-2 gap-space-sm text-left">
<div class="bg-surface-container p-space-sm rounded-lg flex flex-col gap-1">
<div class="flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-[18px]">man</span>
<span class="font-label-md text-label-md font-bold">Pria</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant leading-snug">
            Batik keraton lengan panjang, beskap modern bernuansa champagne gold, atau kemeja formal beraksen etnik.
          </p>
</div>
<div class="bg-surface-container p-space-sm rounded-lg flex flex-col gap-1">
<div class="flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-[18px]">woman</span>
<span class="font-label-md text-label-md font-bold">Wanita</span>
</div>
<p class="font-body-sm text-[12px] text-on-surface-variant leading-snug">
            Kebaya modern anggun, gaun tenun nusantara berpalet champagne ivory, dengan selendang beraksen emas.
          </p>
</div>
</div>
</div>
<!-- 7. Galeri Visual Karakter & Konsep -->
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between px-space-xs">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Eksplorasi Artistik</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Galeri Karya &amp; Kostum</h3>
</div>
<span class="material-symbols-outlined text-primary">photo_library</span>
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
      <div class="p-2 flex flex-col">
        <span class="font-body-sm text-[12px] text-primary truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
<!-- 8. Lokasi Acara & Peta (Sasana Kriya TMII) -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Pelataran Perjamuan</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $venueName }}</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Mandira Room, Taman Mini Indonesia Indah (TMII), Cipayung, Jakarta Timur
        </p>
</div>
<!-- Static Map Location View -->
<div class="w-full h-44 rounded-xl bg-cover bg-center shadow-inner relative overflow-hidden flex items-end p-space-sm" data-location="Sasana Kriya TMII Jakarta Timur" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDH98RO1JaE-zI0OVnvjHM6uUB1u7a1b3PzmBm5SD6TFtUxsjO0kBXLh1UxtV0ZTqzOfi8J6FvPodQXVsATyR8-_PsktGl_5txfSCx27jHOsic1G8WHGqNstfsMBTogykw3Tm9omTLorIXflzrxozo4O22kGbQef7GSnmZks1gRiTBKWBKycDn-jt3WYnF6Hm5-Y8RRoNL5jHG9O1e0AYJEP8zJDB67rZwRGPZkTURB')">
<div class="bg-surface/90 backdrop-blur-md px-space-sm py-1 rounded flex items-center gap-space-xs text-on-surface shadow-sm">
<span class="material-symbols-outlined text-primary text-[18px]">location_on</span>
<span class="font-label-sm text-label-sm font-bold">Mandira Room, Sasana Kriya</span>
</div>
</div>
<!-- Facility badges -->
<div class="flex items-center justify-between text-on-surface-variant bg-surface-container p-space-xs rounded-lg font-label-sm text-[11px]">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px] text-primary">local_parking</span> VIP Valet Gratis</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px] text-primary">directions_bus</span> Shuttle Kencana</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px] text-primary">security</span> Akses Khusus VIP</span>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm">
<a id="previewMapsLinkMain" class="flex-1 py-2 px-space-sm bg-primary text-on-primary rounded font-label-md text-label-md font-bold uppercase tracking-wider text-center flex items-center justify-center gap-space-xs shadow active:scale-95 transition-transform" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[16px]">map</span>
          Buka Google Maps
        </a>
<button class="flex-1 py-2 px-space-sm bg-surface-container text-on-surface rounded font-label-md text-label-md font-bold uppercase tracking-wider flex items-center justify-center gap-space-xs active:scale-95 transition-transform" id="btn-copy-address" onclick="copyToClipboard('{{ addslashes($venueAddress) }}', 'Alamat lokasi berhasil disalin'">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
          Salin Alamat
        </button>
</div>
<span class="hidden text-center font-label-sm text-label-sm text-primary font-bold transition-opacity" id="copy-toast">
        Alamat Berhasil Disalin ke Clipboard!
      </span>
</div>
<!-- 9. Formulir RSVP Interaktif -->
<div class="bg-surface-container rounded-xl p-space-md shadow-md flex flex-col gap-space-md">
<div class="flex flex-col items-center text-center">
<span class="material-symbols-outlined text-primary text-[24px]">edit_calendar</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface mt-1">Konfirmasi Kehadiran (RSVP)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Mohon berkenan mengonfirmasi kehadiran Anda sebelum tanggal 25 November 2025.
        </p>
</div>
<form class="flex flex-col gap-space-sm" id="rsvp-form" onsubmit="handleRSVPSubmit(event)">
<!-- Nama Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface font-semibold">Nama Tamu Undangan</label>
<input class="w-full px-space-md py-2.5 rounded bg-surface-container-lowest text-on-surface focus:outline-none focus:bg-surface-container-low font-body-md text-body-md" id="rsvp-name" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Opsi Kehadiran -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface font-semibold">Status Konfirmasi</label>
<div class="grid grid-cols-1 gap-1.5">
<label class="flex items-center gap-space-sm p-space-xs rounded bg-surface-container-lowest cursor-pointer">
<input checked="" class="accent-primary w-4 h-4" name="attendance" type="radio" value="Hadir Berdua"/>
<span class="font-body-sm text-body-sm text-on-surface">Ya, Kami Hadir Berdua</span>
</label>
<label class="flex items-center gap-space-sm p-space-xs rounded bg-surface-container-lowest cursor-pointer">
<input class="accent-primary w-4 h-4" name="attendance" type="radio" value="Hadir Sendiri"/>
<span class="font-body-sm text-body-sm text-on-surface">Ya, Hadir Sendiri</span>
</label>
<label class="flex items-center gap-space-sm p-space-xs rounded bg-surface-container-lowest cursor-pointer">
<input class="accent-primary w-4 h-4" name="attendance" type="radio" value="Berhalangan"/>
<span class="font-body-sm text-body-sm text-on-surface">Mohon Maaf, Berhalangan Hadir</span>
</label>
</div>
</div>
<!-- Jumlah Anak / Tambahan -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface font-semibold">Jumlah Anak Pendamping</label>
<select class="w-full px-space-md py-2.5 rounded bg-surface-container-lowest text-on-surface focus:outline-none font-body-md text-body-md" id="rsvp-kids">
<option value="0">Tidak membawa anak</option>
<option value="1">1 Anak (Termasuk Goodie Bag)</option>
<option value="2">2 Anak (Termasuk Goodie Bag)</option>
<option value="3+">3 atau lebih</option>
</select>
</div>
<!-- Ucapan Doa / Pesan -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface font-semibold">Untaian Doa &amp; Ucapan Selamat</label>
<textarea class="w-full px-space-md py-2 rounded bg-surface-container-lowest text-on-surface focus:outline-none font-body-md text-body-md" id="rsvp-wishes" placeholder="Tuliskan doa restu untuk Raden Arya..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full mt-space-xs py-3 rounded bg-primary text-on-primary font-label-lg text-label-lg font-bold uppercase tracking-wider text-center flex items-center justify-center gap-space-xs shadow-md active:scale-95 transition-transform" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
          Kirim Konfirmasi Kehadiran
        </button>
</form>
<!-- Feedback Success Message -->
<div class="hidden p-space-md bg-secondary-container text-on-secondary-container rounded-lg text-center flex flex-col items-center gap-1 animate-fadeIn" id="rsvp-success-card">
<span class="material-symbols-outlined text-primary text-[28px]">verified</span>
<span class="font-title-lg text-title-lg font-bold">Matur Nuwun!</span>
<p class="font-body-sm text-body-sm">
          Konfirmasi kehadiran Anda telah tercatat pada daftar tamu Bale Kencana Suite 01. Sampai jumpa di hari bahagia!
        </p>
</div>
</div>
<!-- 10. Buku Tamu Digital (Untaian Doa Restu) -->
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between px-space-xs">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Buku Tamu Digital</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Untaian Doa Tamu Kencana</h3>
</div>
<span class="material-symbols-outlined text-primary text-[20px]">forum</span>
</div>
<!-- Feed Ucapan -->
<div class="flex flex-col gap-space-sm" id="wishes-feed">
<!-- Comment 1 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-1 shadow-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-primary font-bold">Keluarga Raden Mas Dimas</span>
<span class="font-label-sm text-[10px] text-outline">10 Menit yang lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
            “Sugeng tanggap warsa Raden Arya yang ke-7! Semoga tumbuh menjadi ksatria pelindung budaya, berbakti pada orang tua, dan senantiasa dirahmati Tuhan Yang Maha Esa.”
          </p>
</div>
<!-- Comment 2 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-1 shadow-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-primary font-bold">Tante Sekar &amp; Om Bramantyo</span>
<span class="font-label-sm text-[10px] text-outline">1 Jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
            “Keren sekali konsep Raden Arya &amp; Garuda Kencana! Tidak sabar menyaksikan teater animasinya langsung di TMII. Sehat dan makin cerdas ya anak ganteng!”
          </p>
</div>
<!-- Comment 3 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-1 shadow-sm">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-primary font-bold">Sahabat Cilik: Kenzo &amp; Arka</span>
<span class="font-label-sm text-[10px] text-outline">3 Jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
            “Happy birthday Arya sahabat terbaik! Mau foto bareng Garuda Kencana nanti di photobooth ya!”
          </p>
</div>
</div>
</div>
<!-- 11. Tanda Kasih Digital (Angpau / Gift Registry) -->
<!-- Bank 1 Card -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs border border-outline-variant/30 mb-3">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-secondary uppercase font-bold">{{ $bankName1 }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-primary font-mono tracking-wider block" id="bcaAcc">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded-lg text-label-sm font-semibold uppercase hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs border border-outline-variant/30">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-secondary uppercase font-bold">{{ $bankName2 }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-primary font-mono tracking-wider block" id="mandiriAcc">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded-lg text-label-sm font-semibold uppercase hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@endif
<!-- 12. Footer / Penutup Megah -->
<div class="flex flex-col items-center text-center gap-space-sm pt-space-md pb-space-lg">
<!-- Nusantara Royal Seal -->
<div class="w-24 h-24 rounded-full overflow-hidden shadow-md flex items-center justify-center bg-surface-container">
<img alt="Segel Keraton Nusantara Champagne Glow" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuChhiII7NyQNgNEyDo4e3CDUnEaXefFwGqaSvtNSDIPhz6aXNTOlJXQvHKBntUXt1qMiMahvcuAwQwiIlOA_ynwTckrAoAe22MkZSaeWq-Oicetc-U9aUDXK6HiQH936eBuz2FlXP9ubXfYT4RKlRGCaIl0sqsTHiS6GoZzzLL9O0xttgksHjHumHI28k1rMeMfz8gaCpUxHNP1ncnt_U92ZIHI7bmI9ySJ5AHyCV_W"/>
</div>
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Keluarga Besar</span>
<h4 class="font-title-lg text-title-lg text-on-surface">Raden Mas Wijayakusuma &amp; Dyah Ayu Pratiwi</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 italic max-w-xs mx-auto">
          “Atas kehadiran dan limpahan doa restu Bapak, Ibu, serta Saudara/i sekalian, kami sekeluarga menghaturkan terima kasih yang tulus dan mendalam.”
        </p>
</div>
<div class="flex items-center gap-space-sm w-full py-1">
<span class="h-[1px] flex-1 bg-gradient-to-r from-transparent to-primary-container"></span>
<span class="font-label-md text-label-md text-primary tracking-widest uppercase font-bold">Matur Nuwun</span>
<span class="h-[1px] flex-1 bg-gradient-to-l from-transparent to-primary-container"></span>
</div>
<span class="font-label-sm text-label-sm text-outline tracking-wider">
        Sampai Jumpa di Pelataran Kencana TMII
      </span>
</div>
</div>
</div>
<script>
  // Countdown Timer Micro-interaction
  (function initCountdown() {
    let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
    function updateCD() {
      const now = new Date().getTime();
      const diff = targetDate - now;
      if (diff > 0) {
        const d = Math.floor(diff / (1000 * 60 * 60 * 24));
        const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const s = Math.floor((diff % (1000 * 60)) / 1000);
        const elD = document.getElementById('cd-days');
        const elH = document.getElementById('cd-hours');
        const elM = document.getElementById('cd-mins');
        const elS = document.getElementById('cd-secs');
        if (elD) elD.textContent = d;
        if (elH) elH.textContent = h;
        if (elM) elM.textContent = m;
        if (elS) elS.textContent = s;
      }
    }
    updateCD();
    setInterval(updateCD, 1000);

    window.updateTargetDate = function(newDateStr) {
      if (newDateStr) {
        targetDate = new Date(newDateStr).getTime();
        updateCD();
      }
    };
  })();

  // Copy Address Action
  function copyVenueAddress() {
    const addr = "{{ $venueName }} - Mandira Room, Taman Mini Indonesia Indah (TMII), Jakarta Timur";
    navigator.clipboard.writeText(addr).then(() => {
      const toast = document.getElementById('copy-toast');
      if (toast) {
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 3000);
      }
    }).catch(() => {});
  }

  // Copy Bank Account
  function copyAccount(accNumber, btn) {
    navigator.clipboard.writeText(accNumber).then(() => {
      const originalHTML = btn.innerHTML;
      btn.innerHTML = `<span class="material-symbols-outlined text-[20px] text-primary">done</span>`;
      setTimeout(() => {
        btn.innerHTML = originalHTML;
      }, 2000);
    }).catch(() => {});
  }

  // Handle RSVP Submit & Append to Wishes
  function handleRSVPSubmit(e) {
    e.preventDefault();
    const name = document.getElementById('rsvp-name').value;
    const wishes = document.getElementById('rsvp-wishes').value;
    const form = document.getElementById('rsvp-form');
    const successCard = document.getElementById('rsvp-success-card');
    const wishesFeed = document.getElementById('wishes-feed');

    if (form && successCard) {
      form.classList.add('hidden');
      successCard.classList.remove('hidden');
    }

    if (wishes && wishes.trim() !== '' && wishesFeed) {
      const newCard = document.createElement('div');
      newCard.className = 'bg-surface-container-low p-space-md rounded-xl flex flex-col gap-1 shadow-sm animate-fadeIn';
      newCard.innerHTML = `
        <div class="flex items-center justify-between">
          <span class="font-label-md text-label-md text-primary font-bold">\${name}</span>
          <span class="font-label-sm text-[10px] text-outline">Baru saja</span>
        </div>
        <p class="font-body-sm text-body-sm text-on-surface leading-relaxed">&ldquo;\${wishes}&rdquo;</p>
      `;
      wishesFeed.prepend(newCard);
    }
  }
</script></main><nav class="fixed bottom-0 inset-x-0 z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-4px_24px_rgba(197,160,89,0.12)]" data-active-classes="text-primary font-bold"><div class="flex items-center justify-around h-16 px-space-xs"><a aria-current="page" class="min-w-[44px] min-h-[44px] flex flex-col items-center justify-center gap-0.5 transition-colors text-primary font-bold" data-path="undangan-utama" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm tracking-wider uppercase">Undangan</span></a><a class="min-w-[44px] min-h-[44px] flex flex-col items-center justify-center gap-0.5 text-on-surface-variant hover:text-primary transition-colors" data-path="cerita" href="#"><span class="material-symbols-outlined text-[22px]">history_edu</span><span class="font-label-sm text-label-sm tracking-wider uppercase">Cerita</span></a><a class="min-w-[44px] min-h-[44px] flex flex-col items-center justify-center gap-0.5 text-on-surface-variant hover:text-primary transition-colors" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">calendar_month</span><span class="font-label-sm text-label-sm tracking-wider uppercase">Jadwal</span></a><a class="min-w-[44px] min-h-[44px] flex flex-col items-center justify-center gap-0.5 text-on-surface-variant hover:text-primary transition-colors" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">near_me</span><span class="font-label-sm text-label-sm tracking-wider uppercase">Lokasi</span></a><a class="min-w-[44px] min-h-[44px] flex flex-col items-center justify-center gap-0.5 text-on-surface-variant hover:text-primary transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">how_to_reg</span><span class="font-label-sm text-label-sm tracking-wider uppercase">RSVP</span></a></div></nav>
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

        // PostMessage listener for Live Preview iframe
        
        window.renderDynamicEvents = function(events) {
            const container = document.getElementById("itineraryContainer");
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "16.00 - 21.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary-fixed hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="flex items-start gap-space-sm p-space-xs rounded bg-on-background/40 event-itinerary-item">
                        <span class="font-label-md text-label-md font-bold text-primary-fixed shrink-0">${timeStr}</span>
                        <div class="flex flex-col flex-1 min-w-0">
                            <span class="font-body-sm text-body-sm text-inverse-on-surface font-semibold leading-snug">${title}</span>
                            <span class="font-body-sm text-[12px] text-surface-variant">${venue}${addr ? " &bull; " + addr : ""}</span>
                            ${dateStr ? `<span class="text-[10px] text-primary-fixed block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'raden-arya-champagne' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>