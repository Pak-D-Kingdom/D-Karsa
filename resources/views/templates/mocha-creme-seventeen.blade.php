<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Mocha Crème XVII') . ' - ' . ($couple->groom_name ?? 'Genevieve Aurelia') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Genevieve Aurelia' }} - Sweet Seventeen - Elegan Klasik Mocha Cream."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..700;1,400..700&amp;family=Manrope:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "on-error-container": "#93000a", "on-tertiary-fixed": "#2e150b", "surface-bright": "#fcf9f4", "on-secondary-fixed": "#261900", "on-primary-fixed": "#2b1613", "primary-fixed-dim": "#e3beb8", "surface-dim": "#dcdad5", "on-tertiary-container": "#b58b7c", "on-primary-container": "#ae8d87", "on-primary-fixed-variant": "#5b403c", "surface-tint": "#745853", "secondary-fixed-dim": "#e9c176", "secondary-container": "#fed488", "primary-container": "#3e2723", "on-tertiary-fixed-variant": "#603f33", "tertiary": "#2a1208", "tertiary-container": "#42261b", "on-surface": "#1c1c19", "outline": "#827472", "on-error": "#ffffff", "error": "#ba1a1a", "secondary-fixed": "#ffdea5", "outline-variant": "#d3c3c0", "on-secondary-container": "#785a1a", "on-tertiary": "#ffffff", "surface-container-lowest": "#ffffff", "error-container": "#ffdad6", "surface": "#fcf9f4", "primary-fixed": "#ffdad4", "inverse-on-surface": "#f3f0eb", "on-secondary-fixed-variant": "#5d4201", "on-primary": "#ffffff", "surface-container-high": "#ebe8e3", "inverse-primary": "#e3beb8", "surface-variant": "#e5e2dd", "background": "#fcf9f4", "on-background": "#1c1c19", "on-surface-variant": "#504442", "tertiary-fixed-dim": "#ebbcac", "primary": "#271310", "surface-container-low": "#f6f3ee", "secondary": "#775a19", "surface-container-highest": "#e5e2dd", "on-secondary": "#ffffff", "inverse-surface": "#31302d", "surface-container": "#f0ede9", "tertiary-fixed": "#ffdbcf" }, borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, spacing: { "space-xs": "0.25rem", "space-lg": "1.75rem", "space-sm": "0.5rem", "space-xl": "3rem", "gutter-desktop": "2rem", "gutter": "1.25rem", "space-md": "1rem", "margin-desktop": "3rem", "margin": "1.25rem" }, fontFamily: { "body-sm": ["Manrope"], "headline-lg-mobile": ["EB Garamond"], "body-md": ["Manrope"], "label-lg": ["EB Garamond"], "display-lg-mobile": ["EB Garamond"], "headline-sm": ["EB Garamond"], "display-lg": ["EB Garamond"], "label-md": ["EB Garamond"], "label-sm": ["Manrope"], "headline-md": ["EB Garamond"], "headline-lg": ["EB Garamond"], "body-lg": ["Manrope"] }, fontSize: { "body-sm": ["13px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "400" }], "headline-lg-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "0.01em", "fontWeight": "500" }], "body-md": ["15px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "400" }], "label-lg": ["16px", { "lineHeight": "22px", "letterSpacing": "0.15em", "fontWeight": "600" }], "display-lg-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "0em", "fontWeight": "400" }], "headline-sm": ["20px", { "lineHeight": "28px", "letterSpacing": "0.03em", "fontWeight": "600" }], "display-lg": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.18em", "fontWeight": "500" }], "label-sm": ["11px", { "lineHeight": "16px", "letterSpacing": "0.12em", "fontWeight": "600" }], "headline-md": ["26px", { "lineHeight": "34px", "letterSpacing": "0.02em", "fontWeight": "500" }], "headline-lg": ["36px", { "lineHeight": "44px", "letterSpacing": "0.01em", "fontWeight": "500" }], "body-lg": ["17px", { "lineHeight": "28px", "letterSpacing": "0.01em", "fontWeight": "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Genevieve Aurelia';
        $celebrantNick = $couple->groom_nickname ?? 'Genevieve';
        $heading = $couple->event_heading ?? 'Mocha Crème XVII';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet seventeen';
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
        $quote = $couple->quote ?? 'Like warm sunlight filtered through amber crystals, seventeen begins with grace and laughter.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl';
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

        $venueName = $couple->venue_name ?? 'The Mulia Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Jl. Asia Afrika No. 6, Gelora, Tanah Abang, Jakarta Pusat';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl', 'caption' => 'Momen Bahagia #1'],
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
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_12px_rgba(62,39,35,0.06)]"><div class="h-16 px-gutter flex items-center justify-between"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 rounded-full bg-surface-container flex items-center justify-center text-primary-container shadow-[0_2px_8px_rgba(62,39,35,0.08)]"><span class="material-symbols-outlined text-[20px]">auto_awesome</span></div><div class="flex flex-col"><span class="font-label-md text-label-md text-secondary uppercase tracking-[0.2em]">XVII Mocha Crème</span><span class="font-body-sm text-body-sm text-on-surface-variant font-medium">Undangan</span></div></div><div class="flex items-center gap-space-xs"><button aria-label="Music Toggle" class="w-11 h-11 flex items-center justify-center rounded-full text-primary-container hover:bg-surface-container transition-all cursor-pointer" type="button" id="music-fab" onclick="toggleMusic()"><span class="material-symbols-outlined text-[22px]">music_note</span></button><img alt="Profile" class="w-8 h-8 rounded-full object-cover shadow-[0_2px_6px_rgba(62,39,35,0.12)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl"/></div></div></header><main class="flex flex-col relative w-full pt-16 pb-20 bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- Audio & Ambient Toast Banner -->
<div class="px-gutter pt-4 pb-2">
<div class="bg-surface-container rounded-full px-4 py-2 flex items-center justify-between shadow-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-secondary animate-pulse" style="font-variation-settings: 'FILL' 1;">volume_up</span>
<span class="font-body-sm text-body-sm text-on-surface-variant italic">Playing: Clair de Lune (Harp &amp; Strings Arr.)</span>
</div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest font-semibold">VIP Royal Invitation</span>
</div>
</div>
<!-- 1. Debutante Hero Showcase -->
<section class="px-gutter pt-3 pb-8 flex flex-col items-center text-center">
<!-- Arch Cathedral Framing Wrapper -->
<div class="relative w-full max-w-[340px] pt-3 pb-2 flex flex-col items-center">
<!-- Decorative Filigree Crown Tag -->
<div class="bg-primary-container text-on-primary-container rounded-full px-4 py-1.5 shadow-md flex items-center gap-1.5 mb-3">
<span class="material-symbols-outlined text-[15px] text-secondary-fixed">workspace_premium</span>
<span class="font-label-sm text-label-sm tracking-[0.2em] text-secondary-fixed uppercase">The Debutante • XVII Conservatory Gala</span>
</div>
<!-- Cathedral Arch Frame -->
<div class="relative w-full aspect-[3/4.2] rounded-t-[140px] rounded-b-xl overflow-hidden shadow-xl bg-surface-container-high p-2">
<div class="w-full h-full rounded-t-[132px] rounded-b-lg overflow-hidden relative">
<img alt="Genevieve Aurelia Debutante Haute Couture" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700 ease-out" src="{{ $profileImg }}" id="previewGroomPhotoImg"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/10 to-transparent"></div>
<!-- Inner Bottom Caption inside Arch -->
<div class="absolute bottom-3 left-3 right-3 text-left">
<span class="inline-block bg-primary/70 backdrop-blur-md text-surface-container-lowest font-label-sm text-label-sm px-2.5 py-0.5 rounded-full mb-1">
              Look 01 : Debutante Haute Couture
            </span>
<p class="font-body-sm text-body-sm text-surface-bright/90 line-clamp-1">
              Genevieve Aurelia in Bespoke Mocha Organza &amp; Gilded Lace
            </p>
</div>
</div>
</div>
</div>
<!-- Typography Block -->
<div class="mt-4 flex flex-col items-center max-w-sm">
<div class="flex items-center gap-2 mb-1.5">
<span class="w-8 h-[1px] bg-secondary/50"></span>
<span class="font-label-md text-label-md text-secondary tracking-[0.25em] uppercase">Celebrating 17 Golden Blossoms</span>
<span class="w-8 h-[1px] bg-secondary/50"></span>
</div>
<h1 class="font-display-lg-mobile text-display-lg-mobile text-primary tracking-normal leading-tight my-1" id="previewGroomNameCover">{{ $celebrantName }}</h1>
<p class="font-headline-sm text-headline-sm italic text-surface-tint mt-2 max-w-xs leading-relaxed">
        “Like warm sunlight filtered through amber crystals, seventeen begins with grace, purpose, and everlasting dreams.”
      </p>
<div class="flex items-center gap-3 mt-4 text-on-surface-variant font-label-md text-label-md">
<span>EST. 2008</span>
<span class="text-secondary">•</span>
<span>JAKARTA, INDONESIA</span>
<span class="text-secondary">•</span>
<span>DECEMBER 2025</span>
</div>
</div>
</section>
<!-- 2. Guest Honor Card (Kepada Yth) -->
<section class="px-gutter my-2">
<div class="bg-surface-container rounded-xl p-5 shadow-md relative overflow-hidden">
<!-- Ambient watermark motif -->
<div class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-secondary-fixed/20 pointer-events-none blur-2xl"></div>
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-2">
<div class="w-9 h-9 rounded-full bg-primary-container text-secondary-fixed flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
<div>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.16em] block">Kartu Undangan Eksklusif</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Kepada Yth. Tamu Kehormatan:</span>
</div>
</div>
<span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2.5 py-1 rounded-full uppercase tracking-wider font-semibold">
          VIP Guest
        </span>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/80 rounded-lg p-3.5 backdrop-blur-sm">
<p class="font-headline-md text-headline-md text-primary font-medium tracking-wide">
          <span id="previewGuestNameCover">{{ $guestName }}</span>
        </p>
<div class="flex items-center gap-2 mt-1.5 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">table_restaurant</span>
<span class="font-semibold text-primary">Meja Reservasi VIP:</span>
<span class="bg-surface-container px-2 py-0.5 rounded text-on-surface">Royal Mocha A-08 (2 Tamu)</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-3 leading-relaxed">
        Merupakan sebuah kehormatan dan sukacita yang teramat mendalam bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir serta melimpahkan doa restu pada perayaan hari istimewa putri kami.
      </p>
</div>
</section>
<!-- 3. Date, Countdown & Rundown Acara -->
<section class="px-gutter my-6">
<div class="bg-surface-container-high rounded-xl p-5 shadow-sm">
<div class="text-center mb-4">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] font-semibold block">Waktu &amp; Rangkaian Acara</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary mt-1">Agenda Malam Resepsi</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">{{ $eventDateFormatted }} • 18.30 WIB - Selesai</p>
<span class="font-body-sm text-body-sm text-secondary italic block mt-0.5">(Pintu Ballroom dibuka 18.00 WIB)</span>
</div>
<!-- Live Countdown 4-box display -->
<div class="grid grid-cols-4 gap-2 my-4">
<div class="bg-primary-container text-on-primary-container rounded-lg p-2.5 text-center shadow-inner flex flex-col items-center justify-center">
<span class="font-headline-md text-headline-md text-secondary-fixed leading-none" id="days-val">42</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1 tracking-wider">Hari</span>
</div>
<div class="bg-primary-container text-on-primary-container rounded-lg p-2.5 text-center shadow-inner flex flex-col items-center justify-center">
<span class="font-headline-md text-headline-md text-secondary-fixed leading-none" id="hours-val">16</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1 tracking-wider">Jam</span>
</div>
<div class="bg-primary-container text-on-primary-container rounded-lg p-2.5 text-center shadow-inner flex flex-col items-center justify-center">
<span class="font-headline-md text-headline-md text-secondary-fixed leading-none" id="mins-val">35</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1 tracking-wider">Menit</span>
</div>
<div class="bg-primary-container text-on-primary-container rounded-lg p-2.5 text-center shadow-inner flex flex-col items-center justify-center">
<span class="font-headline-md text-headline-md text-secondary-fixed leading-none" id="secs-val">20</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1 tracking-wider">Detik</span>
</div>
</div>
<!-- Google Calendar Button -->
<button class="w-full bg-surface-container-lowest hover:bg-surface-container py-2.5 px-4 rounded-lg flex items-center justify-center gap-2 text-primary font-body-sm text-body-sm font-semibold transition-colors shadow-sm mb-5" onclick="handleAddToCalendar()">
<span class="material-symbols-outlined text-[18px] text-secondary">event_available</span>
<span>Simpan ke Google Calendar</span>
</button>
<!-- Rundown Timeline -->
<div class="flex flex-col gap-3.5" id="itineraryContainer">
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
    <div class="bg-surface-container-lowest/90 rounded-lg p-3.5 flex gap-3 items-start shadow-sm event-itinerary-item border border-secondary/20">
        <div class="bg-secondary-container/40 text-on-secondary-container rounded-md p-1.5 mt-0.5 flex items-center justify-center">
            <span class="material-symbols-outlined text-[18px]">celebration</span>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-md text-label-md text-primary font-semibold">{{ $event->title ?? ("Acara " . ($index + 1)) }}</span>
                <span class="font-body-sm text-body-sm text-secondary font-medium">{{ $evTimeStr }}</span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary font-medium block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary hover:underline mt-1 font-semibold">
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
<!-- 4. Tema Pesta & Dress Code Guide -->
<section class="px-gutter my-4">
<div class="bg-surface-container rounded-xl p-5 shadow-sm">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-[20px] text-secondary">styler</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.18em] font-semibold">Dress Code &amp; Etiquette</span>
</div>
<h2 class="font-headline-md text-headline-md text-primary">Mocha Crème Élégance</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
        A Timeless Classical Gala of Warm Hues &amp; Golden Sparkle
      </p>
<!-- Color Palette Swatches -->
<div class="mt-4 mb-5">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-2 font-medium">
          Panduan Palet Warna Undangan:
        </span>
<div class="grid grid-cols-5 gap-2">
<div class="flex flex-col items-center">
<div class="w-full aspect-square rounded-lg bg-[#3E2723] shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface mt-1 text-center line-clamp-1">Espresso</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full aspect-square rounded-lg bg-[#795548] shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface mt-1 text-center line-clamp-1">Cappuccino</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full aspect-square rounded-lg bg-[#D4AF67] shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface mt-1 text-center line-clamp-1">Gold Foil</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full aspect-square rounded-lg bg-[#F0EAE1] shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface mt-1 text-center line-clamp-1">Latte Crème</span>
</div>
<div class="flex flex-col items-center">
<div class="w-full aspect-square rounded-lg bg-[#1C1C19] shadow-sm"></div>
<span class="font-label-sm text-[10px] text-on-surface mt-1 text-center line-clamp-1">Midnight</span>
</div>
</div>
</div>
<!-- Specific Guidelines for Guests -->
<div class="space-y-3">
<div class="bg-surface-container-lowest p-3.5 rounded-lg">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span class="font-label-md text-label-md text-primary font-semibold">Tamu Pria (Gentlemen)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Formal Tuxedo / Dark Espresso Suit / Dark Navy Suit dengan dasi kupu-kupu atau kemeja Batik Tulis Sutra Eksklusif lengan panjang.
          </p>
</div>
<div class="bg-surface-container-lowest p-3.5 rounded-lg">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-[18px] text-secondary">female</span>
<span class="font-label-md text-label-md text-primary font-semibold">Tamu Wanita (Ladies)</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Glamorous Haute Couture Evening Ballgown / Chic Cocktail Dress bernuansa Mocha Cream, Warm Cappuccino, Champagne Gold, atau Bronze.
          </p>
</div>
<!-- Courtesy Note -->
<div class="bg-secondary-container/30 text-on-secondary-container p-3 rounded-lg flex items-start gap-2.5">
<span class="material-symbols-outlined text-[18px] text-secondary mt-0.5">info</span>
<p class="font-body-sm text-body-sm leading-snug">
<strong>Catatan Etiket:</strong> Mohon berkenan menghindari busana berwarna putih polos demi keselarasan estetika dokumentasi sang debutante.
          </p>
</div>
</div>
</div>
</section>
<!-- 5. Galeri Foto (Her Journey to 17) -->
<section class="px-gutter my-6">
<div class="text-center mb-4">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] font-semibold block">Her Journey to 17</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary">Koleksi Momen Penuh Cerita</h2>
</div>
<div class="flex flex-col gap-3">
<!-- Main Feature Card -->
<div class="bg-surface-container rounded-xl overflow-hidden shadow-md">
<div class="w-full aspect-[4/3] overflow-hidden relative">
<img alt="Chapter XVII The Debutante Ball portrait" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
<div class="absolute inset-0 bg-gradient-to-t from-primary/75 via-transparent to-transparent"></div>
<div class="absolute bottom-3 left-4 right-4">
<span class="font-label-sm text-label-sm text-secondary-fixed uppercase tracking-wider block">Portofolio Resital</span>
<h3 class="font-headline-sm text-headline-sm text-surface-bright">{{ $couple->events->first()->title ?? 'Chapter XVII • The Debutante Ball' }}</h3>
</div>
</div>
</div>
<!-- Supporting 2-grid cards -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-3">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant/30">
    <div class="relative w-full aspect-square bg-surface-container-high overflow-hidden">
      <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-2 flex flex-col">
        <span class="font-title-md text-[12px] text-primary truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 6. Peta Lokasi & Venue -->
<section class="px-gutter my-4">
<div class="bg-surface-container rounded-xl p-5 shadow-sm">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-[20px] text-secondary">pin_drop</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.18em] font-semibold">Tempat Perayaan</span>
</div>
<h2 class="font-headline-md text-headline-md text-primary">The St. Regis Grand Ballroom</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">
        Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan 12910
      </p>
<!-- Map View -->
<div class="mt-4 rounded-lg overflow-hidden shadow-sm relative">
<div class="w-full h-44 bg-cover bg-center" data-location="The St. Regis Jakarta, Rajawali Place, Jakarta Selatan" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB-j2Fw0rO1sCl7znJUeGkQZfPPylCg75wh6EMyKiDa3G9TaW7XeghE0aE652IxmUOr1JU5jQau4LHYGQ4y2fB4sFVg2HR4VV7NSRPofXoXDK7EXKwDi7jVVbH4byk0FSjFOv02Axv-O0Gx24zleyFHOPl3tR6IY6MQBcchCm8V6mheanMnvuBHy8--Vumzt4ZovueawejG8Q8hkJT7tWy3DUDKAQ85nJpLkLJfZGMF')"></div>
<div class="bg-surface-container-high px-3 py-2 flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-secondary">local_parking</span>
<span class="font-body-sm text-body-sm text-on-surface font-medium">VIP Valet &amp; Drop-off Lobby Utama</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia</span>
</div>
</div>
<!-- Action Buttons -->
<div class="grid grid-cols-2 gap-2.5 mt-4">
<a id="previewMapsLinkMain" class="bg-primary text-on-primary rounded-lg py-2.5 px-3 flex items-center justify-center gap-1.5 font-body-sm text-body-sm font-semibold shadow-sm hover:opacity-90 transition-opacity" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">navigation</span>
<span>Buka Maps</span>
</a>
<button class="bg-surface-container-lowest text-primary rounded-lg py-2.5 px-3 flex items-center justify-center gap-1.5 font-body-sm text-body-sm font-semibold shadow-sm hover:bg-surface-container transition-colors" id="copy-addr-btn" onclick="handleCopyAddress()">
<span class="material-symbols-outlined text-[18px] text-secondary">content_copy</span>
<span id="copy-addr-text">Salin Alamat</span>
</button>
</div>
</div>
</section>
<!-- 7. RSVP Form (Konfirmasi Kehadiran Tamu VIP) -->
<section class="px-gutter my-6">
<div class="bg-surface-container-high rounded-xl p-5 shadow-md">
<div class="text-center mb-4">
<div class="w-10 h-10 rounded-full bg-primary-container text-secondary-fixed mx-auto flex items-center justify-center mb-2 shadow-sm">
<span class="material-symbols-outlined text-[20px]">mark_email_read</span>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary">Konfirmasi Kehadiran VIP</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
          Mohon konfirmasi kesediaan hadir Anda sebelum <strong>1 Desember 2025</strong>
</p>
</div>
<form class="space-y-4" id="rsvp-form" onsubmit="handleRsvpSubmit(event)">
<!-- Guest Name Input -->
<div>
<label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1 font-semibold">
            Nama Lengkap Tamu Kehormatan
          </label>
<div class="relative">
<input class="w-full bg-surface-container-lowest text-on-surface rounded-lg px-3.5 py-2.5 font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-secondary shadow-sm" placeholder="Masukkan nama tamu" required="" type="text" value="{{ $guestName }}"/>
<span class="material-symbols-outlined absolute right-3 top-3 text-[18px] text-on-surface-variant">person</span>
</div>
</div>
<!-- Guest Count Selector -->
<div>
<label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1 font-semibold">
            Jumlah Kehadiran
          </label>
<select class="w-full bg-surface-container-lowest text-on-surface rounded-lg px-3.5 py-2.5 font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-secondary shadow-sm">
<option selected="" value="2">2 Tamu ({{ $guestName }} - Meja A-08)</option>
<option value="1">1 Tamu (Hadir Sendiri)</option>
</select>
</div>
<!-- Attendance Radio Chips -->
<div>
<label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1.5 font-semibold">
            Status Kehadiran
          </label>
<div class="grid grid-cols-2 gap-2">
<label class="cursor-pointer bg-primary text-on-primary rounded-lg p-2.5 flex items-center justify-center gap-2 shadow-sm font-body-sm text-body-sm font-semibold">
<input checked="" class="accent-secondary-fixed" name="attendance" type="radio" value="hadir"/>
<span>Ya, Pasti Hadir</span>
</label>
<label class="cursor-pointer bg-surface-container-lowest text-on-surface-variant hover:text-on-surface rounded-lg p-2.5 flex items-center justify-center gap-2 shadow-sm font-body-sm text-body-sm font-medium">
<input class="accent-secondary-fixed" name="attendance" type="radio" value="absen"/>
<span>Maaf, Berhalangan</span>
</label>
</div>
</div>
<!-- Wishes Textarea -->
<div>
<label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-1 font-semibold">
            Untaian Doa &amp; Harapan untuk Genevieve
          </label>
<textarea class="w-full bg-surface-container-lowest text-on-surface rounded-lg p-3 font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-secondary shadow-sm resize-none" placeholder="Tuliskan pesan, untaian doa, dan harapan tulus untuk Genevieve Aurelia..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary-container hover:bg-tertiary text-surface-bright py-3 rounded-lg flex items-center justify-center gap-2 font-label-md text-label-md tracking-wider uppercase shadow-md transition-all active:scale-[0.98]" id="rsvp-submit-btn" type="submit">
<span class="material-symbols-outlined text-[18px] text-secondary-fixed">send</span>
<span>Kirim Konfirmasi &amp; Doa Restu</span>
</button>
</form>
</div>
</section>
<!-- 8. Buku Tamu Digital (Untaian Doa & Harapan) -->
<section class="px-gutter my-4">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[20px] text-secondary">menu_book</span>
<h2 class="font-headline-md text-headline-md text-primary">Buku Tamu Digital</h2>
</div>
<span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2.5 py-0.5 rounded-full font-semibold">
        32 Doa Diterima
      </span>
</div>
<!-- Scrollable Wishes Deck -->
<div class="space-y-3" id="guestbook-list">
<div class="bg-surface-container rounded-xl p-4 shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-primary-container text-secondary-fixed flex items-center justify-center font-bold text-xs">
              AT
            </div>
<div>
<span class="font-label-md text-label-md text-primary font-semibold block leading-tight">Alexander &amp; Brenda Tan</span>
<span class="font-body-sm text-[11px] text-secondary">Family Friend</span>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">2 jam lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic leading-relaxed">
          “Selamat menyambut 17 tahun penuh gemilang, Genevieve sayang! Semoga selalu menjadi inspirasi, penuh keceriaan, dan Tuhan membimbing setiap impianmu menuju kesuksesan luar biasa.”
        </p>
</div>
<div class="bg-surface-container rounded-xl p-4 shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-xs">
              CV
            </div>
<div>
<span class="font-label-md text-label-md text-primary font-semibold block leading-tight">Clarissa Valerie</span>
<span class="font-body-sm text-[11px] text-secondary">Sahabat Sekolah</span>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">5 jam lalu</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic leading-relaxed">
          “Can't wait to see you shine on the dance floor, my prettiest debutante! Happy sweet seventeen Gen, you deserve all the purest joy in this world!”
        </p>
</div>
<div class="bg-surface-container rounded-xl p-4 shadow-sm">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-2">
<div class="w-7 h-7 rounded-full bg-surface-container-highest text-primary flex items-center justify-center font-bold text-xs">
              OS
            </div>
<div>
<span class="font-label-md text-label-md text-primary font-semibold block leading-tight">Oma &amp; Opa Suryawidjaja</span>
<span class="font-body-sm text-[11px] text-secondary">Keluarga Besar</span>
</div>
</div>
<span class="font-body-sm text-[11px] text-on-surface-variant">Kemarin</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic leading-relaxed">
          “Cucu kami yang tercinta, tumbuhlah terus dalam kelembutan budi pekerti, ketaatan pada Tuhan, dan kegigihan meraih masa depan emas. Doa Oma dan Opa menyertaimu selalu.”
        </p>
</div>
</div>
</section>
<!-- 9. Digital Gift Registry (Tanda Kasih Digital) -->
<section class="px-gutter my-6">
<div class="bg-surface-container rounded-xl p-5 shadow-sm text-center">
<div class="w-10 h-10 rounded-full bg-secondary-container/50 text-on-secondary-container mx-auto flex items-center justify-center mb-2">
<span class="material-symbols-outlined text-[20px]">featured_seasonal_and_gifts</span>
</div>
<h2 class="font-headline-md text-headline-md text-primary">Tanda Kasih Digital</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mx-auto mt-1 leading-relaxed">
        Doa restu Anda merupakan karunia terindah bagi Genevieve. Apabila berkenan memberikan tanda kasih tanpa tunai:
      </p>
<!-- Bank Cards -->
<div class="space-y-3 mt-4 text-left">
<!-- Bank 1 Card -->
<div class="bg-surface-container-lowest rounded-lg p-3.5 flex items-center justify-between shadow-sm">
<div>
<div class="font-label-sm text-label-sm text-secondary uppercase font-bold">{{ $bankName1 }}</div>
<div class="font-headline-sm text-headline-sm text-primary tracking-wider mt-0.5" id="bca-acc">{{ $bankAccount1 }}</div>
<div class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder1 }}</div>
</div>
<button class="bg-surface-container text-primary hover:bg-primary hover:text-on-primary px-3 py-1.5 rounded-md text-label-sm uppercase font-semibold transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-lowest rounded-lg p-3.5 flex items-center justify-between shadow-sm">
<div>
<div class="font-label-sm text-label-sm text-secondary uppercase font-bold">{{ $bankName2 }}</div>
<div class="font-headline-sm text-headline-sm text-primary tracking-wider mt-0.5" id="mandiri-acc">{{ $bankAccount2 }}</div>
<div class="font-body-sm text-[12px] text-on-surface-variant">a.n. {{ $bankHolder2 }}</div>
</div>
<button class="bg-surface-container text-primary hover:bg-primary hover:text-on-primary px-3 py-1.5 rounded-md text-label-sm uppercase font-semibold transition-colors shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
@endif
</div>
</section>
<!-- 10. Penutup & Salam Hangat (Wax Seal Closing Mark) -->
<footer class="px-gutter pt-4 pb-12 flex flex-col items-center text-center">
<!-- Wax Seal Image Emblem -->
<div class="relative w-20 h-20 mb-3 drop-shadow-lg hover:rotate-6 transition-transform duration-500">
<img alt="XVII Mocha Crème Debutante Golden Wax Seal" class="w-full h-full object-contain" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<span class="font-label-md text-label-md text-secondary tracking-[0.2em] uppercase font-semibold">Salam Hangat Penuh Syukur</span>
<h3 class="font-headline-lg-mobile text-headline-lg-mobile text-primary mt-1">Genevieve Aurelia &amp; Keluarga</h3>
<p class="font-headline-sm text-headline-sm italic text-surface-tint max-w-xs mt-2 leading-relaxed">
      “Sampai jumpa di malam penuh kehangatan, cinta, dan kemegahan kenangan.”
    </p>
<div class="w-16 h-[1px] bg-secondary/40 my-4"></div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
      #GenevieveXVII • #MochaCremeElegance • 2025
    </p>
</footer>
</div>
<script>
  // Simple Live Countdown Logic for Demonstration
  let secondsLeft = 42 * 86400 + 16 * 3600 + 35 * 60 + 20;
  setInterval(() => {
    if (secondsLeft > 0) {
      secondsLeft--;
      const d = Math.floor(secondsLeft / 86400);
      const h = Math.floor((secondsLeft % 86400) / 3600);
      const m = Math.floor((secondsLeft % 3600) / 60);
      const s = secondsLeft % 60;
      const dEl = document.getElementById('days-val');
      const hEl = document.getElementById('hours-val');
      const mEl = document.getElementById('mins-val');
      const sEl = document.getElementById('secs-val');
      if (dEl) dEl.innerText = d;
      if (hEl) hEl.innerText = String(h).padStart(2, '0');
      if (mEl) mEl.innerText = String(m).padStart(2, '0');
      if (sEl) sEl.innerText = String(s).padStart(2, '0');
    }
  }, 1000);

  function handleAddToCalendar() {
    const title = encodeURIComponent("XVII Sweet Seventeen Debutante: Genevieve Aurelia");
    const details = encodeURIComponent("Grand Reception of Genevieve Aurelia. St. Regis Grand Ballroom Jakarta. Dress code: Mocha Crème Elegance.");
    const location = encodeURIComponent("The St. Regis Jakarta, Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4");
    const dates = "20251213T110000Z/20251213T160000Z";
    window.open(`https://calendar.google.com/calendar/render?action=TEMPLATE&text=${title}&dates=${dates}&details=${details}&location=${location}`, '_blank');
  }

  function handleCopyAddress() {
    const addr = "The St. Regis Jakarta, Rajawali Place, Jl. H.R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan 12910";
    navigator.clipboard.writeText(addr).then(() => {
      const btn = document.getElementById('copy-addr-text');
      if (btn) {
        btn.innerText = "Tersalin!";
        setTimeout(() => { btn.innerText = "Salin Alamat"; }, 2000);
      }
    });
  }

  function handleCopyAccount(accNum, el) {
    navigator.clipboard.writeText(accNum).then(() => {
      const origText = el.innerHTML;
      el.innerHTML = '<span class="material-symbols-outlined text-[16px] text-secondary">check</span><span>Tersalin!</span>';
      setTimeout(() => {
        el.innerHTML = origText;
      }, 2000);
    });
  }

  function handleRsvpSubmit(e) {
    e.preventDefault();
    const btn = document.getElementById('rsvp-submit-btn');
    if (btn) {
      btn.innerHTML = '<span class="material-symbols-outlined text-[18px] text-secondary-fixed animate-spin">sync</span><span>Menyimpan Reservasi...</span>';
      setTimeout(() => {
        btn.innerHTML = '<span class="material-symbols-outlined text-[18px] text-secondary-fixed">check_circle</span><span>Terima Kasih! Konfirmasi Tersimpan</span>';
        btn.classList.remove('bg-primary-container');
        btn.classList.add('bg-secondary');
      }, 1000);
    }
  }
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-4px_20px_rgba(62,39,35,0.06)]" data-active-classes="text-primary-container font-semibold"><div class="flex justify-around items-center h-16 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 transition-colors text-primary-container font-semibold" data-path="undangan" href="#"><span class="material-symbols-outlined text-[22px]">mail</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="agenda" href="#"><span class="material-symbols-outlined text-[22px]">calendar_today</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Agenda</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="galeri" href="#"><span class="material-symbols-outlined text-[22px]">photo_library</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Galeri</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">RSVP</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-surface-variant hover:text-primary transition-colors" data-path="hadiah" href="#"><span class="material-symbols-outlined text-[22px]">featured_seasonal_and_gifts</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Hadiah</span></a></div></nav>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <main class="relative w-full min-h-screen flex flex-col justify-center items-center bg-surface pt-safe pb-safe"><div class="flex flex-col w-full max-w-[480px] mx-auto px-4 py-2 relative select-none">
<!-- Subtle Classical Corner Accents -->
<div class="absolute top-2 left-2 w-8 h-8 pointer-events-none opacity-40 text-secondary">
<svg class="w-full h-full" fill="currentColor" viewbox="0 0 40 40">
<path d="M0,0 L18,0 C12,0 0,12 0,18 Z M4,4 L12,4 C8,4 4,8 4,12 Z M2,2 L26,2 C18,2 2,18 2,26 Z"></path>
</svg>
</div>
<div class="absolute top-2 right-2 w-8 h-8 pointer-events-none opacity-40 text-secondary rotate-90">
<svg class="w-full h-full" fill="currentColor" viewbox="0 0 40 40">
<path d="M0,0 L18,0 C12,0 0,12 0,18 Z M4,4 L12,4 C8,4 4,8 4,12 Z M2,2 L26,2 C18,2 2,18 2,26 Z"></path>
</svg>
</div>
<!-- Audio Pill & Classical Top Masthead -->
<header class="flex flex-col items-center justify-center text-center pt-2 pb-1 space-y-2">
<div class="flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high/90 shadow-sm">
<span class="material-symbols-outlined text-secondary text-[16px]">music_note</span>
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium tracking-wider">Nocturne in E-flat Major — Chopin</span>
<div class="flex items-end gap-0.5 h-3 ml-0.5">
<span class="w-0.5 h-3 bg-secondary rounded-full animate-pulse"></span>
<span class="w-0.5 h-2 bg-secondary rounded-full animate-bounce"></span>
<span class="w-0.5 h-3.5 bg-secondary rounded-full animate-pulse"></span>
<span class="w-0.5 h-1.5 bg-secondary rounded-full animate-bounce"></span>
</div>
</div>
<div class="flex items-center justify-center gap-2">
<span class="w-6 h-[1px] bg-secondary-fixed-dim"></span>
<p class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">
        ROYAL XVII SOIRÉE • SEVENTEEN RADIANT DREAMS
      </p>
<span class="w-6 h-[1px] bg-secondary-fixed-dim"></span>
</div>
</header>
<!-- Interactive Wax Seal Area -->
<section class="flex flex-col items-center justify-center my-1 relative">
<div class="relative group cursor-pointer transition-transform duration-300 active:scale-95" id="wax-seal-wrapper">
<div class="w-24 h-24 rounded-full p-1 bg-surface-container-low shadow-xl flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-tr from-secondary/20 via-transparent to-secondary/30 rounded-full pointer-events-none"></div>
<img alt="Monogram Royal XVII Wax Seal" class="w-20 h-20 rounded-full object-cover shadow-inner transition-transform duration-500 group-hover:rotate-6" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl"/>
</div>
<div class="absolute inset-0 rounded-full bg-secondary/20 animate-ping opacity-0 pointer-events-none" id="unseal-ripple"></div>
</div>
<button class="mt-1 flex items-center gap-1.5 font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary font-semibold hover:text-primary transition-colors" id="btn-unseal" type="button">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
      TAP TO UNSEAL
      <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
</button>
</section>
<!-- Celebrant Title & Subtitle -->
<section class="flex flex-col items-center text-center px-2 py-1">
<span class="font-label-md text-label-md uppercase tracking-[0.22em] text-on-surface-variant font-medium">
      THE SWEET SEVENTEEN SOIRÉE OF
    </span>
<h1 class="font-display-lg-mobile text-display-lg-mobile text-primary tracking-tight mt-0.5 leading-none" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<p class="font-headline-sm text-headline-sm italic text-secondary font-normal mt-1 max-w-[340px] leading-snug opacity-95">
      “Like warm sunlight filtered through amber crystals, seventeen begins with timeless grace.”
    </p>
</section>
<!-- Interactive Stationery Envelope Card -->
<section class="mt-2 mb-2 w-full">
<div class="bg-surface-container-low rounded-xl p-4 shadow-md flex flex-col items-center text-center relative overflow-hidden">
<!-- Fine Metallic Foil Inset Decorator -->
<div class="absolute inset-1 rounded-lg pointer-events-none bg-gradient-to-b from-secondary/15 via-transparent to-secondary/10"></div>
<!-- VIP Badge -->
<div class="relative z-10 inline-flex items-center gap-1 px-3 py-0.5 rounded-full bg-secondary-container shadow-sm mb-2.5">
<span class="material-symbols-outlined text-on-secondary-container text-[14px]" style="font-variation-settings: 'FILL' 1;">stars</span>
<span class="font-label-sm text-label-sm tracking-widest uppercase font-semibold text-on-secondary-container">
          VIP INVITATION • EXCLUSIVE ACCESS
        </span>
</div>
<!-- Recipient Callout -->
<div class="relative z-10 w-full flex flex-col items-center space-y-0.5">
<p class="font-label-sm text-label-sm tracking-[0.16em] uppercase text-on-surface-variant font-medium">
          KEPADA YTH. BAPAK / IBU / SAUDARA/I:
        </p>
<div class="py-1">
<p class="font-headline-md text-headline-md text-primary font-serif font-medium tracking-normal">
            <span id="previewGuestNameMain">{{ $guestName }}</span>
          </p>
</div>
<p class="font-body-sm text-body-sm text-secondary font-medium tracking-wide">
          Di Tempat
        </p>
</div>
<!-- Welcome Paragraph -->
<div class="relative z-10 mt-3 pt-2 bg-surface-container-lowest/60 rounded-lg p-2.5 shadow-sm w-full">
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga langkah usia ketujuh belas yang penuh kehangatan dan rasa syukur.
        </p>
</div>
</div>
</section>
<!-- CTA Action Button -->
<section class="w-full flex flex-col items-center px-2 mb-2">
<button class="w-full py-3 px-6 rounded-xl bg-primary-container text-surface-bright shadow-lg hover:bg-primary transition-all duration-300 flex items-center justify-center gap-3 active:scale-[0.98] group" id="btn-open-invitation" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-secondary-fixed text-[20px] transition-transform duration-300 group-hover:-translate-y-0.5" style="font-variation-settings: 'FILL' 1;">mark_email_read</span>
<span class="font-label-lg text-label-lg tracking-[0.18em] uppercase text-surface-bright font-semibold">BUKA UNDANGAN</span>
<span class="material-symbols-outlined text-secondary-fixed text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
</button>
</section>
<!-- Bottom Metadata & Event Details -->
<footer class="flex flex-col items-center text-center space-y-1 pb-1">
<div class="flex items-center justify-center gap-1.5 text-on-surface-variant">
<span class="material-symbols-outlined text-secondary text-[15px]">calendar_today</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">
        SABTU, 13 DESEMBER 2025
      </span>
</div>
<div class="flex items-center justify-center gap-1 text-on-surface-variant">
<span class="material-symbols-outlined text-secondary text-[15px]">location_on</span>
<span class="font-body-sm text-body-sm font-medium">
        The St. Regis Grand Ballroom, Jakarta
      </span>
</div>
<p class="font-label-sm text-label-sm tracking-[0.2em] text-outline uppercase font-semibold pt-0.5">
      #GENEVIEVEXVII • RSVP STRICTLY REQUIRED
    </p>
</footer>
</div>
<script>
  (function () {
    const seal = document.getElementById('wax-seal-wrapper');
    const ripple = document.getElementById('unseal-ripple');
    const openBtn = document.getElementById('btn-open-invitation');
    const unsealLabel = document.getElementById('btn-unseal');

    function triggerUnsealFeedback() {
      if (!ripple) return;
      ripple.classList.remove('opacity-0');
      ripple.classList.add('opacity-100');
      setTimeout(() => {
        ripple.classList.remove('opacity-100');
        ripple.classList.add('opacity-0');
      }, 700);
    }

    if (seal) {
      seal.addEventListener('click', triggerUnsealFeedback);
    }
    if (unsealLabel) {
      unsealLabel.addEventListener('click', triggerUnsealFeedback);
    }

    if (openBtn) {
      openBtn.addEventListener('click', function () {
        triggerUnsealFeedback();
        const originalContent = openBtn.innerHTML;
        openBtn.innerHTML = `
          <span class="material-symbols-outlined text-secondary-fixed text-[20px] animate-spin">progress_activity</span>
          <span class="font-label-lg text-label-lg tracking-[0.18em] uppercase text-surface-bright font-semibold">MEMBUKA...</span>
        `;
        setTimeout(() => {
          openBtn.innerHTML = originalContent;
          window.dispatchEvent(new CustomEvent('invitation:open', { detail: { guest: '{{ $guestName }}' } }));
          if (typeof openInvitation === 'function') openInvitation();
        }, 800);
      });
    }
  })();
</script></main>
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
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Google Maps</span></a>` : "";
                return `
                    <div class="bg-surface-container-lowest/90 rounded-lg p-3.5 flex gap-3 items-start shadow-sm event-itinerary-item border border-secondary/20">
                        <div class="bg-secondary-container/40 text-on-secondary-container rounded-md p-1.5 mt-0.5 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px]">celebration</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1">
                                <span class="font-label-md text-label-md text-primary font-semibold">${title}</span>
                                <span class="font-body-sm text-body-sm text-secondary font-medium">${timeStr}</span>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-snug">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[10px] text-secondary font-medium block mt-0.5">${dateStr}</span>` : ""}
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'mocha-creme-seventeen' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>