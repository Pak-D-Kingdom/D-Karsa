<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Terra Époque XVII') . ' - ' . ($couple->groom_name ?? 'Audrey Calista') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Audrey Calista' }} - Sweet Seventeen - Editorial Terracotta."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&amp;family=EB+Garamond:ital,wght@0,400..700;1,400..700&amp;family=Montserrat:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = { darkMode: "class", theme: { extend: { colors: { "tertiary": "#7d5013", "on-error-container": "#93000a", "on-primary-fixed-variant": "#7f2a11", "surface-bright": "#fff8f6", "on-primary-fixed": "#3b0900", "primary": "#983d22", "secondary": "#9c432c", "on-primary-container": "#fff7f5", "tertiary-fixed": "#ffddba", "on-secondary-fixed": "#3c0800", "on-error": "#ffffff", "surface-container-lowest": "#ffffff", "inverse-primary": "#ffb5a0", "on-secondary-container": "#762712", "on-tertiary-fixed-variant": "#663d00", "on-secondary": "#ffffff", "on-secondary-fixed-variant": "#7d2c17", "inverse-on-surface": "#ffede8", "outline": "#89726c", "primary-fixed-dim": "#ffb5a0", "on-primary": "#ffffff", "error": "#ba1a1a", "on-surface-variant": "#56423d", "surface-dim": "#ecd5ce", "primary-container": "#b85437", "tertiary-container": "#99682a", "on-surface": "#251915", "surface-container-high": "#fbe3dc", "outline-variant": "#ddc0b9", "surface-container": "#ffe9e3", "surface-variant": "#f5ded6", "surface": "#fff8f6", "secondary-container": "#ff8f73", "on-tertiary": "#ffffff", "error-container": "#ffdad6", "secondary-fixed": "#ffdbd2", "on-background": "#251915", "secondary-fixed-dim": "#ffb4a2", "background": "#fff8f6", "surface-container-low": "#fff1ed", "on-tertiary-fixed": "#2b1700", "surface-container-highest": "#f5ded6", "primary-fixed": "#ffdbd1", "inverse-surface": "#3b2d29", "on-tertiary-container": "#fff7f2", "tertiary-fixed-dim": "#f8bb75", "surface-tint": "#9f4126" }, borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, spacing: { "margin-mobile": "1.25rem", "space-md": "1.25rem", "space-sm": "0.75rem", "margin": "3.5rem", "space-xs": "0.375rem", "space-xl": "3.5rem", "gutter": "1.5rem", "space-lg": "2rem", "gutter-mobile": "1rem" }, fontFamily: { "headline-sm": ["Bodoni Moda"], "headline-xl": ["Bodoni Moda"], "headline-lg-mobile": ["Bodoni Moda"], "label-lg": ["Montserrat"], "label-sm": ["Montserrat"], "body-lg": ["EB Garamond"], "headline-xl-mobile": ["Bodoni Moda"], "headline-lg": ["Bodoni Moda"], "label-md": ["Montserrat"], "body-sm": ["EB Garamond"], "body-md": ["EB Garamond"], "headline-md": ["Bodoni Moda"], "quote-display": ["Bodoni Moda"] }, fontSize: { "headline-sm": ["22px", { "lineHeight": "30px", "fontWeight": "500" }], "headline-xl": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "400" }], "headline-lg-mobile": ["32px", { "lineHeight": "38px", "letterSpacing": "0em", "fontWeight": "400" }], "label-lg": ["13px", { "lineHeight": "18px", "letterSpacing": "0.18em", "fontWeight": "600" }], "label-sm": ["9px", { "lineHeight": "14px", "letterSpacing": "0.25em", "fontWeight": "700" }], "body-lg": ["20px", { "lineHeight": "32px", "fontWeight": "400" }], "headline-xl-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "headline-lg": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.01em", "fontWeight": "400" }], "label-md": ["11px", { "lineHeight": "16px", "letterSpacing": "0.22em", "fontWeight": "600" }], "body-sm": ["15px", { "lineHeight": "22px", "fontWeight": "400" }], "body-md": ["17px", { "lineHeight": "26px", "fontWeight": "400" }], "headline-md": ["28px", { "lineHeight": "36px", "fontWeight": "400" }], "quote-display": ["26px", { "lineHeight": "38px", "fontWeight": "400" }] } } } }
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
        $celebrantName = $couple->groom_name ?? 'Audrey Calista';
        $celebrantNick = $couple->groom_nickname ?? 'Audrey';
        $heading = $couple->event_heading ?? 'Terra Époque XVII';
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
        $quote = $couple->quote ?? 'Like the warm golden sun casting grace upon the earth, seventeen begins with beauty and gratitude.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoyFSvSZfWDr4PYn8k6kebaH2uIyhUhjyP0L7DD2Xjw63ACK7bhdej_A-7fYYA-Vq3QQG-zQMJ5RC2eWTi8TgYK3ZOfbbKdlNeAaQWDHnnHzZvHxSjbbGBiua7AHUowi36w7Ck9xC97P0-S0nAAwpUSrDjVi9HQw6fi4WZfwxTEmLqwonIEivueP7G3seJE9ThdPEbc30yvJ7jztsljuIVXcMhwEIctWKn-9527hP_';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBT7kKeXcl91r7qCsCwqEjeJ7v1spO1KGy1bELtmSvOP6upo9-0b5xty6hGHgUaoKnt2GZgxZ26z742VykJAs5Z1m8gWqpb-dttJSfrIPkgoV90HSuna4qWpFRlbykpsqZTAzMsbzib4EE_Q0iN7kV2E_WHudL2IxTqbB6LEOuhKvm7-bYZU3LL8bOWeAblrRomYXg5CCSvgo42gjs3gUgaDVOLJy6tvDtSSseIdt7v';
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

        $venueName = $couple->venue_name ?? 'The Glass House Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Jl. Senopati No. 45, Kebayoran Baru, Jakarta Selatan';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoyFSvSZfWDr4PYn8k6kebaH2uIyhUhjyP0L7DD2Xjw63ACK7bhdej_A-7fYYA-Vq3QQG-zQMJ5RC2eWTi8TgYK3ZOfbbKdlNeAaQWDHnnHzZvHxSjbbGBiua7AHUowi36w7Ck9xC97P0-S0nAAwpUSrDjVi9HQw6fi4WZfwxTEmLqwonIEivueP7G3seJE9ThdPEbc30yvJ7jztsljuIVXcMhwEIctWKn-9527hP_', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBT7kKeXcl91r7qCsCwqEjeJ7v1spO1KGy1bELtmSvOP6upo9-0b5xty6hGHgUaoKnt2GZgxZ26z742VykJAs5Z1m8gWqpb-dttJSfrIPkgoV90HSuna4qWpFRlbykpsqZTAzMsbzib4EE_Q0iN7kV2E_WHudL2IxTqbB6LEOuhKvm7-bYZU3LL8bOWeAblrRomYXg5CCSvgo42gjs3gUgaDVOLJy6tvDtSSseIdt7v', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwIh5DZYi_sxwmc9ONXtWKV5wSbpRo34g-afuwzPelm0q9NcqHC-cVnFIeYhHNIBvU0hoOYnWhHqa7kOAI1B-cguC6R7gXxXJpeo7qXrG6bglV-N1bsDlnvChpQTLA0bSXkgkAIOfNtrT5JQ0mil_ISDeqW-w7TSRA2kpt4Rrnbo4h2IRFSaUAZdxfllVbg5gTo1hQEnCDRIilUKj000TG4ak3AWCaqOVNYkKGaca0', 'caption' => 'Momen Bahagia #3'],
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
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-16 px-margin-mobile flex items-center justify-between gap-space-sm"><div class="flex items-center gap-space-xs"><img alt="Terra Epoque XVII Monogram Emblem" class="h-8 w-auto object-contain" src="{{ $coverImg }}" id="previewCoverPhotoImg"/><div class="flex flex-col"><span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Terra Époque XVII</span><h1 class="font-headline-sm text-headline-sm text-on-surface tracking-tight leading-none" id="previewGroomNameCover">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-xs"><button aria-label="Putar Musik Latar" class="w-11 h-11 flex items-center justify-center rounded-full text-primary hover:bg-surface-container transition-colors" type="button" id="open-envelope-btn" onclick="openInvitation()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div></div></div></header><main class="flex-1 w-full bg-surface pt-16 pb-24"><div class="flex flex-col w-full">
<!-- 1. Top Editorial Banner -->
<div class="w-full bg-surface-container-high py-2.5 px-margin-mobile flex items-center justify-between">
<span class="font-label-sm text-label-sm tracking-[0.28em] text-primary uppercase">Volume XVII • Issue No. 1</span>
<span class="font-label-sm text-label-sm tracking-[0.25em] text-tertiary font-semibold uppercase">The Debutante • Special Editorial Edition</span>
</div>
<!-- 2. Hero Section (Grand Arched Editorial Lookbook) -->
<section class="px-margin-mobile pt-space-md pb-space-lg flex flex-col items-center text-center">
<div class="relative w-full max-w-[340px] aspect-[4/5] rounded-t-[170px] rounded-b-lg overflow-hidden bg-surface-container shadow-md">
<img alt="Audrey Calista Haute Couture Terracotta Gown" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg"/>
<div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-transparent to-transparent flex flex-col justify-end p-5 text-surface-bright">
<span class="font-label-sm text-label-sm tracking-[0.25em] uppercase text-tertiary-fixed">Haute Couture Lookbook</span>
<span class="font-body-sm text-body-sm italic opacity-95">Audrey Calista in Bespoke Terracotta Tulle &amp; Gilded Beads</span>
</div>
</div>
<!-- Editorial Monogram & Headline -->
<div class="mt-space-md flex flex-col items-center">
<span class="font-label-md text-label-md text-primary tracking-[0.22em] uppercase">Celebrating 17 Radiant Years</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary-container mt-1">Audrey Calista</h2>
<div class="w-12 h-0.5 bg-secondary-container rounded-full my-space-xs"></div>
<p class="font-quote-display text-quote-display italic text-on-surface-variant max-w-[320px] mt-1 leading-snug">
        “Like the warm golden sun casting grace upon the earth, seventeen begins with beauty, purpose, and dreams.”
      </p>
</div>
</section>
<!-- 3. Guest Honor Card (Kepada Yth. Tamu Kehormatan) -->
<section class="px-margin-mobile pb-space-lg">
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm relative overflow-hidden">
<div class="flex items-center gap-space-xs mb-space-xs">
<span class="material-symbols-outlined text-primary text-[20px]">drafts</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Kartu Undangan Eksklusif</span>
</div>
<span class="font-label-md text-label-md text-on-surface-variant uppercase block">Kepada Yth. Tamu Kehormatan:</span>
<h3 class="font-headline-sm text-headline-sm text-primary mt-0.5"><span id="previewGuestNameCover">{{ $guestName }}</span></h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed">
        Merupakan suatu kehormatan dan kebahagiaan yang tak terhingga bagi kami sekeluarga apabila Bapak/Ibu/Sahabat berkenan hadir dan melingkupi malam istimewa ini dengan kehangatan doa, tawa, serta restu terbaik.
      </p>
<div class="mt-space-sm pt-space-xs flex items-center justify-between bg-surface-container rounded-lg px-3 py-2">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary text-[18px]">verified</span>
<span class="font-label-sm text-label-sm uppercase text-on-surface">Meja Reservasi: Royal Terracotta A-04</span>
</div>
<span class="font-label-sm text-label-sm text-primary uppercase font-bold">2 Tamu</span>
</div>
</div>
</section>
<!-- 4. Rundown, Waktu Acara & Live Countdown -->
<section class="px-margin-mobile pb-space-lg flex flex-col gap-space-md">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm">
<div class="flex items-center justify-between mb-space-xs">
<span class="font-label-sm text-label-sm tracking-[0.25em] uppercase text-primary">Waktu &amp; Tanggal Acara</span>
<span class="material-symbols-outlined text-primary text-[20px]">event_available</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $eventDateFormatted }}</h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
        18.30 WIB – Selesai
      </p>
<div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 bg-surface-container-high rounded text-primary">
<span class="material-symbols-outlined text-[16px]">door_open</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider">Pintu Ballroom Dibuka Pukul 18.00 WIB</span>
</div>
<!-- Live Countdown Blocks -->
<div class="grid grid-cols-4 gap-2 mt-space-md text-center" id="countdown-grid">
<div class="bg-surface-container-lowest rounded-lg p-2.5 shadow-sm">
<span class="font-headline-sm text-headline-sm text-primary block leading-none" id="cd-days">45</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mt-1 block">Hari</span>
</div>
<div class="bg-surface-container-lowest rounded-lg p-2.5 shadow-sm">
<span class="font-headline-sm text-headline-sm text-primary block leading-none" id="cd-hours">18</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mt-1 block">Jam</span>
</div>
<div class="bg-surface-container-lowest rounded-lg p-2.5 shadow-sm">
<span class="font-headline-sm text-headline-sm text-primary block leading-none" id="cd-minutes">20</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mt-1 block">Menit</span>
</div>
<div class="bg-surface-container-lowest rounded-lg p-2.5 shadow-sm">
<span class="font-headline-sm text-headline-sm text-primary block leading-none" id="cd-seconds">35</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mt-1 block">Detik</span>
</div>
</div>
<!-- Calendar CTA -->
<a class="mt-space-md w-full bg-primary hover:bg-primary-container text-on-primary py-3.5 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors" href="https://calendar.google.com/calendar/render?action=TEMPLATE&amp;text=Terra+Epoque+XVII+-+Audrey+Calista+Sweet+Seventeen&amp;dates=20251018T113000Z/20251018T160000Z&amp;details=Terra+Epoque+XVII:+An+Autumnal+Symphony+of+Terracotta+Elegance+%26+Haute+Couture&amp;location=The+Langham+Grand+Ballroom,+District+8,+SCBD,+Jakarta+Selatan" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
<span class="font-label-lg text-label-lg uppercase tracking-[0.18em]">Simpan ke Google Calendar</span>
</a>
</div>
<!-- Micro Itinerary Rundown -->
<div class="bg-surface-container-low rounded-xl p-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary block mb-space-sm font-bold">Urutan Acara Utama</span>
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
    <div class="flex items-start gap-3 event-itinerary-item">
        <span class="font-headline-sm text-headline-sm text-tertiary-container leading-none font-bold">{{ sprintf("%02d", $index + 1) }}</span>
        <div class="flex-1 min-w-0">
            <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface block font-bold">{{ $evTimeStr }} &bull; {{ $event->title ?? ("Acara " . ($index + 1)) }}</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</p>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-primary block mt-0.5 font-semibold">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold">
                    <span class="material-symbols-outlined text-[13px]">location_on</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</div>
</section>
<!-- 5. Tema Pesta & Panduan Tata Busana (Dress Code) -->
<section class="px-margin-mobile pb-space-lg">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">palette</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Tema &amp; Moodboard Warna</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight">Terra Époque</h3>
<p class="font-body-sm text-body-sm italic text-on-surface-variant mt-0.5">
        An Autumnal Symphony of Terracotta Elegance &amp; Haute Couture
      </p>
<!-- Color Palette Swatches -->
<div class="mt-space-sm pt-space-xs flex items-center justify-between gap-1.5">
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-10 rounded bg-[#b85437] shadow-sm"></div>
<span class="font-label-sm text-[8px] uppercase tracking-wider text-on-surface-variant mt-1.5 text-center">Terracotta</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-10 rounded bg-[#8a3620] shadow-sm"></div>
<span class="font-label-sm text-[8px] uppercase tracking-wider text-on-surface-variant mt-1.5 text-center">Burnt Rust</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-10 rounded bg-[#d49b58] shadow-sm"></div>
<span class="font-label-sm text-[8px] uppercase tracking-wider text-on-surface-variant mt-1.5 text-center">Bronze Gold</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-10 rounded bg-[#faefe9] shadow-sm"></div>
<span class="font-label-sm text-[8px] uppercase tracking-wider text-on-surface-variant mt-1.5 text-center">Warm Cream</span>
</div>
<div class="flex-1 flex flex-col items-center">
<div class="w-full h-10 rounded bg-[#231713] shadow-sm"></div>
<span class="font-label-sm text-[8px] uppercase tracking-wider text-on-surface-variant mt-1.5 text-center">Espresso</span>
</div>
</div>
<!-- Dress Code Guides -->
<div class="mt-space-md grid grid-cols-1 gap-space-sm">
<div class="bg-surface-container-low p-space-sm rounded-lg">
<div class="flex items-center gap-1.5 text-primary mb-1">
<span class="material-symbols-outlined text-[18px]">man</span>
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Tamu Pria (Gentlemen)</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Formal Tuxedo / Dark Navy atau Espresso Suit dengan Terracotta pocket square, atau Batik Sutra Tulis Eksklusif bernuansa tembaga hangat.
          </p>
</div>
<div class="bg-surface-container-low p-space-sm rounded-lg">
<div class="flex items-center gap-1.5 text-primary mb-1">
<span class="material-symbols-outlined text-[18px]">woman</span>
<span class="font-label-md text-label-md uppercase tracking-wider font-semibold">Tamu Wanita (Ladies)</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Glamorous Haute Couture Evening Ballgown atau Chic Cocktail Dress nuansa Terracotta, Copper Bronze, Warm Sunset, atau Champagne.
          </p>
<div class="mt-2 py-1 px-2.5 bg-surface-container-high rounded text-primary flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">info</span>
<span class="font-label-sm text-label-sm uppercase">Catatan: Mohon berkenan menghindari gaun putih polos.</span>
</div>
</div>
</div>
</div>
</section>
<!-- 6. Galeri Foto (Her Journey to 17) -->
<section class="px-margin-mobile pb-space-lg">
<div class="flex flex-col mb-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Her Journey to 17</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Lookbook &amp; Portofolio</h3>
</div>
<div class="grid grid-cols-1 gap-space-sm">
<!-- Main Feature Card -->
<div class="bg-surface-container rounded-xl overflow-hidden shadow-sm">
<div class="aspect-[3/4] w-full overflow-hidden bg-surface-container-high">
<img alt="Lookbook Studio Edition Audrey Calista" class="w-full h-full object-cover" src="{{ $profileImg }}" id="previewGroomPhotoImg">
</div>
<div class="p-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-tertiary block">Editorial Feature</span>
<h4 class="font-headline-sm text-headline-sm text-primary mt-0.5">{{ $couple->events->first()->title ?? "Chapter XVII • The Debutante" }}</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-normal">
            Bespoke layered terracotta organza gown with intricate champagne and golden embroidery by Indonesian couture artisan.
          </p>
</div>
</div>
<!-- Supporting 2-Col Grid -->
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-sm">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant/30">
    <div class="aspect-square w-full overflow-hidden bg-surface-container-high">
      <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-space-xs flex flex-col">
        <span class="font-label-md text-label-md text-on-surface font-semibold truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 7. Peta Lokasi & Navigasi -->
<section class="px-margin-mobile pb-space-lg">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">location_on</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Lokasi Resepsi</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">The Langham Grand Ballroom</h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
        District 8, SCBD Lot 28, Senayan, Kebayoran Baru, Jakarta Selatan
      </p>
<!-- Map Display Snippet -->
<div class="mt-space-sm rounded-lg overflow-hidden relative shadow-inner">
<div class="w-full h-44 bg-cover bg-center" data-location="The Langham, Jakarta District 8 SCBD" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD80L1C8vI-mcrvtQYiDFLFFXLf2sbq_l4JFNM0WoNcQJ-8q3DSKZSIinikmjE0NtoXhufpYige6dHfMeJyx_XPkFbDLK31ifH8DTiveeghGz70_QSARF6ZPqscmKBReQfyWSNkYugE8sleb8xnKDHWZeTWZMr6M5TDZitIQmZx1KwkfWaROItbR6fGrsTHwjKPdvZZuFlKHoZdEPSsSVtA0PiP0ATjcrA9gJLPFH-a')"></div>
<div class="absolute bottom-2 left-2 right-2 bg-surface-bright/95 backdrop-blur-sm p-2 rounded flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[18px]">local_parking</span>
<span class="font-label-sm text-label-sm uppercase text-on-surface">VIP Valet Parking &amp; Drop-off Lobby Utama Tersedia</span>
</div>
</div>
<!-- Action Buttons -->
<div class="mt-space-md grid grid-cols-2 gap-space-sm">
<a id="previewMapsLinkMain" class="bg-primary hover:bg-primary-container text-on-primary py-3 px-3 rounded-lg flex items-center justify-center gap-1.5 transition-colors text-center" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">directions</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Buka Maps</span>
</a>
<button class="bg-surface-container-high hover:bg-surface-container-highest text-primary py-3 px-3 rounded-lg flex items-center justify-center gap-1.5 transition-colors text-center" id="copy-address-btn" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span class="font-label-md text-label-md uppercase tracking-wider" id="copy-btn-text">Salin Alamat</span>
</button>
</div>
</div>
</section>
<!-- 8. Konfirmasi Kehadiran (RSVP) -->
<section class="px-margin-mobile pb-space-lg">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">how_to_reg</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Konfirmasi Kehadiran (RSVP)</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Pastikan Kehadiran Anda</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
        Mohon berkenan mengonfirmasi sebelum tanggal <strong class="text-primary font-semibold">5 Oktober 2025</strong> demi kenyamanan penataan tempat duduk VIP.
      </p>
<form class="mt-space-md flex flex-col gap-space-sm" id="rsvp-form" onsubmit="event.preventDefault(); handleRsvpSubmit();">
<!-- Nama Lengkap Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface" for="rsvp-name">Nama Lengkap Tamu</label>
<input class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-lg font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary" id="rsvp-name" required="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Jumlah Tamu Selector -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface" for="rsvp-count">Jumlah Tamu Hadir</label>
<select class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-lg font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary" id="rsvp-count">
<option value="2">2 Orang (Bapak/Ibu {{ $guestName }})</option>
<option value="1">1 Orang (Hanya Saya)</option>
</select>
</div>
<!-- Attendance Status -->
<div class="flex flex-col gap-1.5">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface">Status Kehadiran</span>
<div class="grid grid-cols-2 gap-2">
<label class="flex items-center gap-2 p-2.5 bg-surface-container-lowest rounded-lg cursor-pointer">
<input checked="" class="text-primary accent-primary" name="attendance" type="radio" value="hadir"/>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Ya, Pasti Hadir</span>
</label>
<label class="flex items-center gap-2 p-2.5 bg-surface-container-lowest rounded-lg cursor-pointer">
<input class="text-primary accent-primary" name="attendance" type="radio" value="absen"/>
<span class="font-body-sm text-body-sm text-on-surface font-medium">Maaf, Berhalangan</span>
</label>
</div>
</div>
<!-- Ucapan & Doa Restu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface" for="rsvp-notes">Ucapan &amp; Doa Restu</label>
<textarea class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-lg font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary" id="rsvp-notes" placeholder="Tuliskan pesan hangat dan doa restu untuk Audrey Calista..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="mt-2 w-full bg-primary hover:bg-primary-container text-on-primary py-3.5 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors" id="rsvp-submit-btn" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
<span class="font-label-lg text-label-lg uppercase tracking-[0.18em]">Kirim Konfirmasi &amp; Doa</span>
</button>
</form>
<!-- Feedback Banner -->
<div class="hidden mt-3 p-3 bg-tertiary-fixed text-on-tertiary-fixed rounded-lg text-center font-body-md text-body-md" id="rsvp-feedback">
        Terima kasih, konfirmasi dan doa restu Anda telah tercatat dengan anggun dalam buku tamu digital kami.
      </div>
</div>
</section>
<!-- 9. Untaian Doa & Harapan (Wishes & Guestbook) -->
<section class="px-margin-mobile pb-space-lg">
<div class="flex items-center justify-between mb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Untaian Doa &amp; Harapan</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Buku Tamu Digital</h3>
</div>
<div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</div>
</div>
<div class="flex flex-col gap-space-sm" id="wishes-list">
<!-- Item 1 -->
<div class="bg-surface-container-low rounded-xl p-space-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-md text-label-md text-primary font-semibold">Clarissa Aurelia</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">2 jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
          “Happy Sweet 17th, Audrey tercantik! May your seventeenth year sparkle as radiant as the golden sun and your gorgeous terracotta gown! Can’t wait to dance with you!”
        </p>
</div>
<!-- Item 2 -->
<div class="bg-surface-container-low rounded-xl p-space-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-md text-label-md text-primary font-semibold">Keluarga Besar Handoko</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">5 jam yang lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
          “Selamat melangkah ke usia 17 tahun untuk ananda Audrey Calista. Semoga selalu menjadi kebanggaan keluarga, penuh berkat, prestasi, dan kebahagiaan abadi.”
        </p>
</div>
<!-- Item 3 -->
<div class="bg-surface-container-low rounded-xl p-space-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-md text-label-md text-primary font-semibold">Valerie Chloe &amp; Circle</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Kemarin</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed">
          “Counting down the days to celebrate our favorite girl! Audrey, you look like royalty in this editorial sneak peek. See you on the ballroom floor!”
        </p>
</div>
</div>
</section>
<!-- 10. Tanda Kasih Digital (Digital Token of Appreciation / Hadiah) -->
<section class="px-margin-mobile pb-space-lg">
<div class="bg-surface-container rounded-xl p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-1">
<span class="material-symbols-outlined text-primary text-[20px]">featured_seasonal_and_gifts</span>
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-primary">Tanda Kasih Digital</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Digital Gift Registry</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
        Kehadiran dan doa restu Bapak/Ibu/Sahabat sekalian merupakan kado paling bermakna bagi kami. Namun apabila berkehendak memberikan tanda kasih secara digital, kami sediakan saluran rekening resmi berikut:
      </p>
<div class="mt-space-md space-y-space-sm">
<!-- Bank 1 Card -->
<div class="bg-surface-container-lowest rounded-lg p-space-sm shadow-sm flex flex-col gap-2 mb-3">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-primary tracking-wider">{{ $bankName1 }}</span>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-on-surface block tracking-wide font-semibold">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider hover:opacity-90 active:scale-95 transition-all" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container-lowest rounded-lg p-space-sm shadow-sm flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md font-bold text-primary tracking-wider">{{ $bankName2 }}</span>
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-on-surface block tracking-wide font-semibold">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider hover:opacity-90 active:scale-95 transition-all" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@endif
</section>
<!-- 11. Closing Gratitude & Monogram Wax Seal -->
<section class="px-margin-mobile pt-space-xs pb-space-xl flex flex-col items-center text-center">
<div class="w-20 h-20 mb-space-sm rounded-full overflow-hidden shadow-md">
<img alt="Terra Epoque XVII Golden Wax Seal" class="w-full h-full object-cover" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<span class="font-label-sm text-label-sm tracking-[0.25em] uppercase text-primary">Sampai Berjumpa di Malam Penuh Cahaya</span>
<h3 class="font-headline-sm text-headline-sm text-primary-container mt-1">Audrey Calista &amp; Keluarga Besar</h3>
<p class="font-body-md text-body-md italic text-on-surface-variant max-w-[280px] mt-1">
      “Terima kasih atas setiap cinta, doa tulus, dan kebersamaan yang terukir abadi.”
    </p>
<div class="mt-space-md w-8 h-0.5 bg-secondary-container rounded-full"></div>
<span class="font-label-sm text-[8px] uppercase tracking-[0.3em] text-on-surface-variant mt-2">Terra Époque XVII • Jakarta 2025</span>
</section>
</div>
<script>
  // Countdown Timer Micro-Interaction
  let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
  function updateCountdown() {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance > 0) {
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('cd-days').textContent = days;
      document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
      document.getElementById('cd-minutes').textContent = String(minutes).padStart(2, '0');
      document.getElementById('cd-seconds').textContent = String(seconds).padStart(2, '0');
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

  // Copy Address Action
  const copyAddressBtn = document.getElementById('copy-address-btn');
  const copyBtnText = document.getElementById('copy-btn-text');
  if (copyAddressBtn) {
    copyAddressBtn.addEventListener('click', () => {
      const address = "The Langham Grand Ballroom, District 8, SCBD Lot 28, Senayan, Jakarta Selatan";
      navigator.clipboard.writeText(address).then(() => {
        copyBtnText.textContent = "Tersalin!";
        setTimeout(() => {
          copyBtnText.textContent = "Salin Alamat";
        }, 2500);
      });
    });
  }

  // Copy Account Number helper
  function copyToClipboard(text, btnElement) {
    navigator.clipboard.writeText(text).then(() => {
      const originalText = btnElement.innerHTML;
      btnElement.innerHTML = `<span class="font-label-sm text-label-sm uppercase font-semibold text-primary">Tersalin!</span>`;
      setTimeout(() => {
        btnElement.innerHTML = originalText;
      }, 2500);
    });
  }

  // RSVP submission interaction
  function handleRsvpSubmit() {
    const name = document.getElementById('rsvp-name').value;
    const notes = document.getElementById('rsvp-notes').value;
    const feedback = document.getElementById('rsvp-feedback');
    const submitBtn = document.getElementById('rsvp-submit-btn');

    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-75');

    setTimeout(() => {
      feedback.classList.remove('hidden');
      if (notes.trim()) {
        const wishesList = document.getElementById('wishes-list');
        const newWish = document.createElement('div');
        newWish.className = "bg-surface-container-low rounded-xl p-space-sm transition-all";
        newWish.innerHTML = `
          <div class="flex items-center justify-between mb-1">
            <span class="font-label-md text-label-md text-primary font-semibold">${name}</span>
            <span class="font-label-sm text-label-sm text-on-surface-variant">Baru saja</span>
          </div>
          <p class="font-body-sm text-body-sm text-on-surface leading-relaxed">&ldquo;${notes}&rdquo;</p>
        `;
        wishesList.prepend(newWish);
      }
      submitBtn.innerHTML = `
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
        <span class="font-label-lg text-label-lg uppercase tracking-[0.18em]">Terkonfirmasi</span>
      `;
    }, 600);
  }
</script></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(0,0,0,0.04)]" data-active-classes="text-primary font-semibold"><div class="flex justify-around items-center h-16 px-space-xs"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[56px] h-12 transition-colors text-primary font-semibold" data-path="undangan-utama" href="#"><span class="material-symbols-outlined text-[20px]">mark_email_read</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-12 text-on-surface-variant hover:text-on-surface transition-colors" data-path="agenda" href="#"><span class="material-symbols-outlined text-[20px]">calendar_today</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Agenda</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-12 text-on-surface-variant hover:text-on-surface transition-colors" data-path="galeri" href="#"><span class="material-symbols-outlined text-[20px]">photo_camera</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Galeri</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-12 text-on-surface-variant hover:text-on-surface transition-colors" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[20px]">how_to_reg</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">RSVP</span></a><a class="flex flex-col items-center justify-center min-w-[56px] h-12 text-on-surface-variant hover:text-on-surface transition-colors" data-path="hadiah" href="#"><span class="material-symbols-outlined text-[20px]">featured_seasonal_and_gifts</span><span class="font-label-sm text-label-sm tracking-wider uppercase mt-0.5">Hadiah</span></a></div></nav>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <main class="flex-1 w-full bg-surface relative flex flex-col"><div class="flex flex-col w-full relative overflow-hidden px-margin-mobile py-space-sm pb-space-lg">
<!-- Subtle decorative ambient background glows (no borders) -->
<div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-secondary-container/20 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -right-24 w-80 h-80 rounded-full bg-tertiary-fixed-dim/25 blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-20 left-1/4 w-72 h-72 rounded-full bg-primary-fixed/30 blur-3xl pointer-events-none"></div>
<!-- Editorial Top Masthead Bar -->
<header class="w-full flex flex-col items-center pt-space-xs pb-space-sm relative z-10">
<div class="flex items-center justify-between w-full text-on-surface-variant/80 font-label-sm text-label-sm tracking-widest uppercase">
<span>NO. XVII</span>
<span class="inline-flex items-center gap-1.5 text-primary font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary inline-block animate-pulse"></span>
        TERRA ÉPOQUE
      </span>
<span>ED. 2025</span>
</div>
<div class="w-full h-px bg-outline-variant/40 mt-space-xs mb-1"></div>
<p class="font-label-sm text-label-sm text-tertiary tracking-widest uppercase text-center mt-1">
      PRIVATE CELEBRATION CATALOGUE • JAKARTA
    </p>
</header>
<!-- Interactive Music Ambient Bar (Pill) -->
<div class="w-full flex justify-center my-space-xs relative z-10">
<button aria-label="Toggle Background Music" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm tracking-wider uppercase transition-all duration-300 hover:bg-surface-container-highest shadow-sm active:scale-95" id="audio-toggle-btn" onclick="toggleMusic()">
<span class="material-symbols-outlined text-primary text-base transition-transform duration-700 animate-spin" id="music-disc-icon" style="animation-duration: 4s;">album</span>
<span class="text-on-surface" id="music-status-text">Golden Hour Waltz — Terra Époque</span>
<span class="w-2 h-2 rounded-full bg-primary" id="music-indicator"></span>
</button>
</div>
<!-- Wax Seal Emblem Section -->
<div class="flex flex-col items-center justify-center my-space-sm relative z-10">
<div class="relative group cursor-pointer" id="wax-seal-button">
<div class="absolute inset-0 rounded-full bg-primary-container/20 blur-xl scale-110 group-hover:scale-125 transition-transform duration-500"></div>
<div class="relative w-28 h-28 flex items-center justify-center rounded-full bg-surface-container-lowest shadow-md p-1 transition-transform duration-300 active:scale-95">
<img alt="Terra Époque XVII Audrey Calista Golden Wax Seal" class="w-full h-full object-contain rounded-full shadow-inner select-none pointer-events-none" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoyFSvSZfWDr4PYn8k6kebaH2uIyhUhjyP0L7DD2Xjw63ACK7bhdej_A-7fYYA-Vq3QQG-zQMJ5RC2eWTi8TgYK3ZOfbbKdlNeAaQWDHnnHzZvHxSjbbGBiua7AHUowi36w7Ck9xC97P0-S0nAAwpUSrDjVi9HQw6fi4WZfwxTEmLqwonIEivueP7G3seJE9ThdPEbc30yvJ7jztsljuIVXcMhwEIctWKn-9527hP_"/>
</div>
<span class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-surface-container-highest text-primary font-label-sm text-label-sm px-2.5 py-0.5 rounded-full uppercase tracking-widest shadow-sm whitespace-nowrap">
        TAP TO UNSEAL
      </span>
</div>
</div>
<!-- Debutante Monogram Titles -->
<section class="text-center relative z-10 px-space-xs my-space-xs">
<p class="font-label-md text-label-md text-primary tracking-widest uppercase mb-1 font-semibold">
      THE SWEET SEVENTEEN SOIRÉE
    </p>
<h1 class="font-headline-xl-mobile text-headline-xl-mobile text-on-surface tracking-tight leading-none mb-2" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<p class="font-body-md text-body-md italic text-on-surface-variant max-w-xs mx-auto leading-snug">
      “A golden warmth unfolding seventeen radiant horizons.”
    </p>
</section>
<!-- Floating Editorial Envelope Card -->
<article class="w-full bg-surface-container-low rounded-xl shadow-md p-space-md my-space-sm relative z-10 overflow-hidden">
<!-- Card Top Accents -->
<div class="flex items-center justify-between gap-2 mb-space-sm">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-surface-container-high text-primary font-label-sm text-label-sm tracking-widest font-semibold uppercase">
<span class="material-symbols-outlined text-sm">stars</span>
        VIP INVITATION
      </span>
<span class="font-label-sm text-label-sm text-on-surface-variant/70 tracking-widest uppercase">
        EXCLUSIVE ACCESS
      </span>
</div>
<!-- Recipient Meta -->
<div class="bg-surface-container-lowest rounded-lg p-space-sm shadow-sm mb-space-sm">
<span class="block font-label-sm text-label-sm text-on-surface-variant/80 tracking-widest uppercase mb-1">
        Kepada Yth. Bapak / Ibu / Saudara/i:
      </span>
<div class="flex items-baseline justify-between gap-2">
<h2 class="font-headline-sm text-headline-sm text-primary tracking-normal font-semibold" id="guest-name-display">
          <span id="previewGuestNameMain">{{ $guestName }}</span>
        </h2>
<span class="font-label-sm text-label-sm text-tertiary uppercase tracking-wider">
          Di Tempat
        </span>
</div>
</div>
<!-- Editorial Courtesy Note -->
<p class="font-body-sm text-body-sm text-on-surface leading-relaxed text-justify mb-space-sm">
      Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk turut merayakan momen berharga langkah usia ketujuh belas yang penuh kehangatan dan rasa syukur.
    </p>
<!-- Primary Interactive Button -->
<button class="w-full group relative flex items-center justify-center gap-3 py-3.5 px-6 rounded-full bg-primary-container text-on-primary-container font-label-lg text-label-lg uppercase tracking-widest shadow-md transition-all duration-300 hover:bg-primary active:scale-98" id="open-invitation-btn" type="button" onclick="openInvitation()">
<span class="material-symbols-outlined text-lg transition-transform duration-300 group-hover:scale-110">drafts</span>
<span>Buka Undangan</span>
<span class="material-symbols-outlined text-base transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
</button>
</article>
<!-- Interactive RSVP & Itinerary Sneak Peek Modal Overlay (Hidden initially, triggered smoothly) -->
<div class="fixed inset-x-0 bottom-0 z-50 transform translate-y-full transition-transform duration-500 ease-out bg-surface-container-lowest rounded-t-2xl shadow-xl max-w-lg mx-auto p-space-md flex flex-col gap-space-sm max-h-[85vh] overflow-y-auto" id="envelope-preview-drawer">
<div class="w-12 h-1 bg-outline-variant/60 rounded-full mx-auto mb-1"></div>
<div class="flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary tracking-widest uppercase font-semibold">TERRA ÉPOQUE XVII</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Undangan Terbuka</h3>
</div>
<button aria-label="Tutup" class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high" id="close-drawer-btn">
<span class="material-symbols-outlined text-lg">close</span>
</button>
</div>
<div class="bg-surface-container-low rounded-xl p-space-sm flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-lg">calendar_today</span>
<span class="font-label-md text-label-md font-semibold tracking-wider uppercase text-on-surface">{{ $eventDateFormatted }}</span>
</div>
<div class="flex items-start gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-lg text-primary shrink-0 mt-0.5">location_on</span>
<div>
<p class="font-label-md text-label-md font-semibold text-on-surface">The Langham Grand Ballroom</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">District 8, SCBD, Jakarta Selatan</p>
</div>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-lg text-primary">schedule</span>
<p class="font-body-sm text-body-sm text-on-surface">18.30 WIB — Cocktail Reception &amp; Gala</p>
</div>
</div>
<!-- Wardrobe Dress Code Chip -->
<div class="bg-surface-container-high rounded-xl p-space-sm flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">palette</span>
<div>
<span class="block font-label-sm text-label-sm text-primary font-semibold uppercase tracking-widest">Dress Code</span>
<span class="font-label-md text-label-md text-on-surface">Terracotta, Champagne &amp; Bronze</span>
</div>
</div>
<span class="font-label-sm text-label-sm px-2.5 py-1 rounded bg-surface-container text-tertiary font-semibold uppercase">Formal</span>
</div>
<!-- Confirm Attendance Quick Button -->
<a class="w-full text-center py-3 rounded-full bg-primary text-on-primary font-label-lg text-label-lg tracking-widest uppercase transition-opacity hover:opacity-90 shadow" href="#rsvp" id="confirm-rsvp-action">
      Konfirmasi Kehadiran (RSVP)
    </a>
</div>
<!-- Drawer Backdrop -->
<div class="fixed inset-0 bg-inverse-surface/40 backdrop-blur-sm z-40 hidden transition-opacity duration-300" id="drawer-backdrop"></div>
<!-- Event Metadata Footer -->
<footer class="w-full text-center relative z-10 pt-space-xs pb-space-sm flex flex-col items-center gap-1.5">
<div class="flex items-center justify-center gap-2 font-label-sm text-label-sm text-on-surface-variant font-semibold tracking-widest uppercase">
<span>18 OKTOBER 2025</span>
<span class="w-1 h-1 rounded-full bg-primary"></span>
<span>THE LANGHAM JAKARTA</span>
</div>
<div class="flex items-center justify-center gap-3 font-label-sm text-label-sm text-tertiary tracking-widest uppercase">
<span>#TerraEpoqueXVII</span>
<span>•</span>
<span>RSVP STRICTLY REQUIRED</span>
</div>
</footer>
</div>
<script>
  (function() {
    // Dynamic URL Guest Parsing for personalised experience
    try {
      const urlParams = new URLSearchParams(window.location.search);
      const guestParam = urlParams.get('to') || urlParams.get('guest');
      if (guestParam) {
        const guestEl = document.getElementById('guest-name-display');
        if (guestEl) {
          guestEl.textContent = decodeURIComponent(guestParam);
        }
      }
    } catch (e) {}

    // Audio micro-interaction indicator
    const audioBtn = document.getElementById('audio-toggle-btn');
    const musicDisc = document.getElementById('music-disc-icon');
    const musicStatus = document.getElementById('music-status-text');
    const musicIndicator = document.getElementById('music-indicator');
    let isPlaying = true;

    if (audioBtn) {
      audioBtn.addEventListener('click', function() {
        isPlaying = !isPlaying;
        if (isPlaying) {
          musicDisc.classList.add('animate-spin');
          musicStatus.textContent = 'Golden Hour Waltz — Terra Époque';
          musicIndicator.classList.remove('bg-outline');
          musicIndicator.classList.add('bg-primary');
        } else {
          musicDisc.classList.remove('animate-spin');
          musicStatus.textContent = 'Musik Dijeda (Ketuk untuk putar)';
          musicIndicator.classList.remove('bg-primary');
          musicIndicator.classList.add('bg-outline');
        }
      });
    }

    // Modal drawer unseal interaction
    const openBtn = document.getElementById('open-invitation-btn');
    const sealBtn = document.getElementById('wax-seal-button');
    const drawer = document.getElementById('envelope-preview-drawer');
    const backdrop = document.getElementById('drawer-backdrop');
    const closeBtn = document.getElementById('close-drawer-btn');
    const confirmRsvpBtn = document.getElementById('confirm-rsvp-action');

    function openEnvelope() {
      if (drawer && backdrop) {
        backdrop.classList.remove('hidden');
        setTimeout(() => {
          backdrop.classList.remove('opacity-0');
          drawer.classList.remove('translate-y-full');
        }, 10);
      }
    }

    function closeEnvelope() {
      if (drawer && backdrop) {
        drawer.classList.add('translate-y-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => {
          backdrop.classList.add('hidden');
        }, 300);
      }
    }

    if (openBtn) openBtn.addEventListener('click', openInvitation);
    if (sealBtn) sealBtn.addEventListener('click', openEnvelope);
    if (closeBtn) closeBtn.addEventListener('click', closeEnvelope);
    if (backdrop) backdrop.addEventListener('click', closeEnvelope);
    if (confirmRsvpBtn) {
      confirmRsvpBtn.addEventListener('click', function(e) {
        closeEnvelope();
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
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-semibold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                const idxStr = String(i + 1).padStart(2, "0");
                return `
                    <div class="flex items-start gap-3 event-itinerary-item">
                        <span class="font-headline-sm text-headline-sm text-tertiary-container leading-none font-bold">${idxStr}</span>
                        <div class="flex-1 min-w-0">
                            <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface block font-bold">${timeStr} &bull; ${title}</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</p>
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'terra-epoque-terracotta' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>