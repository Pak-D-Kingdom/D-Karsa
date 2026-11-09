<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Kisah Arya: Rusa Kencana Rimba Asri') . ' - ' . ($couple->groom_name ?? 'Arya & Sang Rusa Kencana') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Arya & Sang Rusa Kencana' }} - Tema Karakter Original - Tradisional Nusantara Nature Green."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100..900&family=EB+Garamond:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Custom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config={darkMode:"class",theme:{extend:{"colors":{"tertiary-fixed-dim":"#9fd1ba","background":"#fcf9f1","on-primary-container":"#83a590","surface":"#fcf9f1","tertiary-fixed":"#bbeed6","on-tertiary-fixed-variant":"#1f4f3e","outline":"#727973","on-tertiary":"#ffffff","surface-bright":"#fcf9f1","surface-container-low":"#f6f3eb","secondary":"#775a19","surface-tint":"#456553","surface-dim":"#dcdad2","on-primary-fixed-variant":"#2d4d3c","inverse-surface":"#31312b","on-background":"#1c1c17","primary-fixed-dim":"#abcfb8","secondary-fixed-dim":"#e9c176","secondary-container":"#fed488","outline-variant":"#c1c8c2","on-tertiary-fixed":"#002116","on-secondary-fixed-variant":"#5d4201","surface-container":"#f1eee6","error":"#ba1a1a","surface-container-high":"#ebe8e0","on-secondary":"#ffffff","error-container":"#ffdad6","secondary-fixed":"#ffdea5","tertiary":"#00261a","on-tertiary-container":"#78a893","surface-variant":"#e5e2db","on-primary-fixed":"#002113","inverse-primary":"#abcfb8","on-secondary-container":"#785a1a","on-surface":"#1c1c17","primary":"#032517","on-secondary-fixed":"#261900","inverse-on-surface":"#f3f1e9","primary-fixed":"#c7ebd4","primary-container":"#1b3b2b","on-surface-variant":"#424843","surface-container-highest":"#e5e2db","on-primary":"#ffffff","on-error":"#ffffff","tertiary-container":"#083d2d","on-error-container":"#93000a","surface-container-lowest":"#ffffff"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"space-lg":"1.75rem","space-sm":"0.5rem","space-xs":"0.25rem","space-xl":"3rem","gutter":"1rem","margin-desktop":"3rem","space-md":"1rem","margin":"1.25rem","gutter-desktop":"2rem"},"fontFamily":{"label-md":["EB Garamond"],"title-md":["EB Garamond"],"display-lg":["EB Garamond"],"body-lg":["Be Vietnam Pro"],"headline-md":["EB Garamond"],"display-lg-mobile":["EB Garamond"],"body-sm":["Be Vietnam Pro"],"body-md":["Be Vietnam Pro"],"headline-sm":["EB Garamond"],"display-md-mobile":["EB Garamond"],"label-sm":["Be Vietnam Pro"],"display-md":["EB Garamond"],"headline-lg":["EB Garamond"]},"fontSize":{"label-md":["14px",{"lineHeight":"18px","letterSpacing":"0.14em","fontWeight":"600"}],"title-md":["19px",{"lineHeight":"26px","letterSpacing":"0.03em","fontWeight":"500"}],"display-lg":["56px",{"lineHeight":"64px","letterSpacing":"0.02em","fontWeight":"400"}],"body-lg":["17px",{"lineHeight":"28px","fontWeight":"400"}],"headline-md":["26px",{"lineHeight":"34px","letterSpacing":"0.01em","fontWeight":"600"}],"display-lg-mobile":["38px",{"lineHeight":"46px","letterSpacing":"0.02em","fontWeight":"400"}],"body-sm":["13px",{"lineHeight":"20px","fontWeight":"400"}],"body-md":["15px",{"lineHeight":"24px","fontWeight":"400"}],"headline-sm":["22px",{"lineHeight":"30px","letterSpacing":"0em","fontWeight":"600"}],"display-md-mobile":["32px",{"lineHeight":"40px","letterSpacing":"0.02em","fontWeight":"500"}],"label-sm":["11px",{"lineHeight":"16px","letterSpacing":"0.06em","fontWeight":"500"}],"display-md":["44px",{"lineHeight":"52px","letterSpacing":"0.03em","fontWeight":"500"}],"headline-lg":["32px",{"lineHeight":"40px","letterSpacing":"0.02em","fontWeight":"600"}]}}}}
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
        $celebrantName = $couple->groom_name ?? 'Arya & Sang Rusa Kencana';
        $celebrantNick = $couple->groom_nickname ?? 'Arya';
        $heading = $couple->event_heading ?? 'Kisah Arya: Rusa Kencana Rimba Asri';
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
        $quote = $couple->quote ?? 'Di mana daun berbisik dan akar merangkul bumi, di sanalah keberanian mekar memberikan perlindungan.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCjVy2TeXVgsz9WfnhHt8yTWrNagKryxUdKB3EEGikw2vGtgHqurtrWxXb5T52vnRnjs7N9leYwV98qlSXlCRO0JaRtl9rTUXAHDpvxrh55YhyoMme7DQYOs-aF4ITT9MlPSU8YlDReovsZuTGVgSGS53OJNngQQQgvM8zs_WrBAUCButfwPoJhZlxNYnY4slfWxpD7Ce7ock4ehzslrx2HIhowPQ9_NjYCkYTSfpx-';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrtK73EzVB6qsOCiNXitAZEn2S7fGDPm1btsXIBiwZ-05Sf6qn_MrR81GSYmHZpeRm1vCoCSJy09T8ugKH8G8Sdq4WR8Mm6EKKn-24cXPzBj6PZXIR9pihSCk6D-XWVA5FsQu0XxhFrGTYOpjsNNE9U1CC5CSU1ynDNP0j4n3bAjbE62wMpBw4K8dzNCFTYeFVkJq_OY33laZclW7VuIshoYRmGP04Oa_TZxkPVjw0';
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

        $venueName = $couple->venue_name ?? 'Hutan Kota by Plataran';
        $venueAddress = $couple->venue_address ?? 'Kompleks Gelora Bung Karno, Jl. Jenderal Sudirman, Jakarta Pusat';
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
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCjVy2TeXVgsz9WfnhHt8yTWrNagKryxUdKB3EEGikw2vGtgHqurtrWxXb5T52vnRnjs7N9leYwV98qlSXlCRO0JaRtl9rTUXAHDpvxrh55YhyoMme7DQYOs-aF4ITT9MlPSU8YlDReovsZuTGVgSGS53OJNngQQQgvM8zs_WrBAUCButfwPoJhZlxNYnY4slfWxpD7Ce7ock4ehzslrx2HIhowPQ9_NjYCkYTSfpx-', 'caption' => 'Momen Bahagia #1'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrtK73EzVB6qsOCiNXitAZEn2S7fGDPm1btsXIBiwZ-05Sf6qn_MrR81GSYmHZpeRm1vCoCSJy09T8ugKH8G8Sdq4WR8Mm6EKKn-24cXPzBj6PZXIR9pihSCk6D-XWVA5FsQu0XxhFrGTYOpjsNNE9U1CC5CSU1ynDNP0j4n3bAjbE62wMpBw4K8dzNCFTYeFVkJq_OY33laZclW7VuIshoYRmGP04Oa_TZxkPVjw0', 'caption' => 'Momen Bahagia #2'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA6nlpFHhE7zyKTcM906wQMyyDI0CxLHZ5z1QxUhUq98SDijXTsr51V9ugPguJL7tv2xt7WcZ5dwievh0FTXmHY55o685TcZG6qDhyFE4sicNX8AzVZ346zLD0HswMQmbAKOQWlcM58Ya7vJhyp_9rSLGZiGfv4qb_OpJeOUKSNWUHcrYHUlAxYxLPToM9DnY3To_45cjy6jrDoLcQDXj5ZWpekIlqxJBxeN4ZwDxoa', 'caption' => 'Momen Bahagia #3'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBGW_NRA4ImxT5bRRcIFW0IIN9qSXpvokkSbnume-N_fCBUE96RDakhvWgB5zxRuU64qrLBxbRX36GEpz8dAxgcblt_vY80wBjwWZCm3VNBloFL439cS3ZoqUPufrx9wbVOaUNUGlCWWz9PAGBTNmcW5czDiUnKLvU_sw2Q9DxAKi8x2TzH4J0d0a82Ni-tEiNF-7tLSNyy2ezppMzsfE6JMjoXOdk_Rsf-Kw1zfUSt', 'caption' => 'Momen Bahagia #4'],
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
        <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(27,59,43,0.06)]"><div class="h-16 max-w-[520px] mx-auto px-margin flex items-center justify-between"><div class="flex items-center gap-space-sm"><div class="w-11 h-11 flex items-center justify-center text-secondary"><span class="material-symbols-outlined text-[24px]">filter_vintage</span></div><div class="flex flex-col"><span class="font-label-md text-label-md uppercase tracking-[0.14em] text-secondary">Pawiwahan Ageng</span><h1 class="font-headline-sm text-headline-sm text-primary tracking-normal leading-none truncate max-w-[200px]" id="previewGroomNameCover">{{ $celebrantName }}</h1></div></div><div class="flex items-center gap-space-sm"><button aria-label="Putar Musik Gamelan" class="w-11 h-11 rounded-full flex items-center justify-center text-primary-container hover:text-secondary transition-colors" id="open-envelope-btn" onclick="openInvitation()"><span class="material-symbols-outlined text-[20px]">music_note</span></button><img alt="Profile" class="w-8 h-8 rounded-full object-cover shadow-[0_0_0_1px_rgba(119,90,25,0.4)]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjVy2TeXVgsz9WfnhHt8yTWrNagKryxUdKB3EEGikw2vGtgHqurtrWxXb5T52vnRnjs7N9leYwV98qlSXlCRO0JaRtl9rTUXAHDpvxrh55YhyoMme7DQYOs-aF4ITT9MlPSU8YlDReovsZuTGVgSGS53OJNngQQQgvM8zs_WrBAUCButfwPoJhZlxNYnY4slfWxpD7Ce7ock4ehzslrx2HIhowPQ9_NjYCkYTSfpx-"/></div></div></header><main class="flex flex-col relative w-full flex-grow px-margin pt-16 pb-24 bg-surface max-w-[520px] mx-auto min-h-screen"><div class="flex flex-col w-full space-y-space-lg text-on-surface">
<!-- 1. Header & Ambiance Banner -->
<section class="flex flex-col gap-space-xs">
<div class="bg-primary-container text-on-primary-container rounded-xl p-space-sm shadow-md flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<span class="material-symbols-outlined text-secondary-container text-[20px] animate-pulse">spa</span>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed truncate">Perayaan Ke-7 & Peluncuran Karakter</span>
<span class="font-body-sm text-body-sm text-surface-container-highest truncate">♫ Gamelan Laras Pelog & Lingsir Rimba Mengalun</span>
</div>
</div>
<button aria-label="Jeda Musik" class="flex-shrink-0 w-8 h-8 rounded-full bg-primary text-secondary-fixed flex items-center justify-center shadow-sm" id="toggleAudioBtn">
<span class="material-symbols-outlined text-[18px]" id="audioIcon">equalizer</span>
</button>
</div>
</section>
<!-- 2. Hero Section & Original Character Showcase -->
<section class="flex flex-col items-center text-center">
<div class="relative w-full rounded-xl overflow-hidden shadow-xl bg-primary-container">
<div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/30 to-transparent z-10 pointer-events-none"></div>
<img alt="Arya Sang Penjaga Alam & Sang Rusa Kencana" class="w-full aspect-[3/4] object-cover object-top" src="{{ $profileImg }}" id="previewGroomPhotoImg"/>
<div class="absolute top-space-sm left-space-sm z-20">
<span class="bg-primary/85 backdrop-blur-md text-secondary-fixed text-label-sm font-label-sm px-space-sm py-1 rounded-full uppercase tracking-wider shadow-sm flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary-fixed">token</span>
          Maha Karya Nusantara
        </span>
</div>
<div class="absolute bottom-0 inset-x-0 p-space-md z-20 text-on-primary flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary-fixed-dim uppercase tracking-[0.2em] mb-1">Ksatria Rimba Belantara</span>
<h2 class="font-headline-lg text-headline-lg text-surface-bright leading-tight drop-shadow-sm">Raden Arya & Sang Rusa Kencana</h2>
<div class="w-12 h-0.5 bg-secondary-fixed my-space-xs rounded-full"></div>
<p class="font-title-md text-title-md italic text-surface-container-high max-w-[90%]">
          “Di mana daun berbisik dan akar merangkul bumi, di sanalah keberanian mekar membela pusaka pertiwi.”
        </p>
</div>
</div>
</section>
<!-- 3. Guest Honor Reservation Card -->
<section class="bg-surface-container-low rounded-xl p-space-md shadow-md flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[22px]">workspace_premium</span>
<span class="font-label-md text-label-md uppercase text-secondary tracking-widest">Surat Kehormatan Tamu</span>
</div>
<span class="bg-secondary-container text-on-secondary-container text-label-sm font-label-sm px-2 py-0.5 rounded-full">VIP ACCESS</span>
</div>
<div class="bg-surface-container rounded-lg p-space-sm flex flex-col gap-1 mt-1">
<span class="font-body-sm text-body-sm text-on-surface-variant">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
<p class="font-headline-sm text-headline-sm text-primary"><span id="previewGuestNameCover">{{ $guestName }}</span></p>
</div>
<div class="flex items-start gap-space-xs mt-1 p-space-sm bg-primary/5 rounded-lg">
<span class="material-symbols-outlined text-primary-container text-[20px] mt-0.5">chair</span>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-primary font-semibold">Alokasi Tempat Duduk Kehormatan</span>
<span class="font-body-md text-body-md text-on-surface">Bale Rimba Kencana Suite 01 <span class="text-secondary font-medium">(2 Tamu Khusus)</span></span>
<span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Konfirmasi kehadiran ditutup sebelum 1 Desember 2025.</span>
</div>
</div>
</section>
<!-- 4. Kisah Karakter Orisinal (Lore & Story Acts) -->
<section class="flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Legenda Nusantara</span>
<h3 class="font-headline-md text-headline-md text-primary">Kisah Sang Tokoh: Arya Penjaga Alam</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
</div>
<div class="space-y-space-sm">
<!-- Babak I -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="w-7 h-7 rounded-full bg-primary text-secondary-fixed flex items-center justify-center font-label-sm text-label-sm font-bold">I</span>
<h4 class="font-title-md text-title-md text-primary font-semibold">Pusaka Daun Emas Pasundan</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Terlahir di lingkar lereng pegunungan Parahyangan, Arya dianugerahi kepekaan mendengar suara dahan yang patah dan bisikan air terjun purba. Sejak belia, ia menjaga keseimbangan rimba dengan penuh cinta dan laku budi.
        </p>
</div>
<!-- Babak II -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="w-7 h-7 rounded-full bg-primary text-secondary-fixed flex items-center justify-center font-label-sm text-label-sm font-bold">II</span>
<h4 class="font-title-md text-title-md text-primary font-semibold">Ikatan Sahabat Rusa Kencana</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Di belantara kabut halimun, Arya menyelamatkan seekor anak rusa mistis bertanduk emas yang terlilit jerat pemburu. Sejak detik itu, keduanya terikat ikatan suci, menjadi pelindung satwa yang tak terpisahkan.
        </p>
</div>
<!-- Babak III -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="w-7 h-7 rounded-full bg-primary text-secondary-fixed flex items-center justify-center font-label-sm text-label-sm font-bold">III</span>
<h4 class="font-title-md text-title-md text-primary font-semibold">Lentera Lestari Nusantara</h4>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Menginjak usia ke-7, Arya memulai perjalanannya membagikan lentera kesadaran agar anak-anak di seantero nusantara turut merawat pohon purba, sungai bening, dan keanekaragaman hayati tanah air.
        </p>
</div>
</div>
<!-- 3 Nilai Luhur -->
<div class="grid grid-cols-3 gap-space-xs text-center mt-space-xs">
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[22px] mb-1">shield</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">Keberanian</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px] leading-tight mt-0.5">Teguh bela alam</span>
</div>
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[22px] mb-1">favorite</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">Budi Asih</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px] leading-tight mt-0.5">Rendah hati sesama</span>
</div>
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[22px] mb-1">forest</span>
<span class="font-label-sm text-label-sm font-semibold text-primary">Cinta Semesta</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px] leading-tight mt-0.5">Harmoni rimba</span>
</div>
</div>
</section>
<!-- 5. Detail Acara & Hitung Mundur Waktu (Live Countdown) -->
<section class="bg-primary text-on-primary rounded-xl p-space-md shadow-xl flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary-fixed uppercase tracking-widest">Waktu & Tatap Muka</span>
<h3 class="font-headline-md text-headline-md text-surface-bright">{{ $eventDateFormatted }}</h3>
<p class="font-body-sm text-body-sm text-tertiary-fixed-dim mt-0.5">Pukul 16.00 – 21.00 WIB (Gerbang Rimba dibuka 15.30 WIB)</p>
</div>
<!-- Live Countdown Timer -->
<div class="grid grid-cols-4 gap-space-xs text-center" id="countdownGrid">
<div class="bg-primary-container rounded-lg py-space-sm px-1 shadow-inner flex flex-col items-center">
<span class="font-headline-md text-headline-md text-secondary-fixed font-bold leading-none" id="cdDays">00</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1">Hari</span>
</div>
<div class="bg-primary-container rounded-lg py-space-sm px-1 shadow-inner flex flex-col items-center">
<span class="font-headline-md text-headline-md text-secondary-fixed font-bold leading-none" id="cdHours">00</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1">Jam</span>
</div>
<div class="bg-primary-container rounded-lg py-space-sm px-1 shadow-inner flex flex-col items-center">
<span class="font-headline-md text-headline-md text-secondary-fixed font-bold leading-none" id="cdMinutes">00</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1">Menit</span>
</div>
<div class="bg-primary-container rounded-lg py-space-sm px-1 shadow-inner flex flex-col items-center">
<span class="font-headline-md text-headline-md text-secondary-fixed font-bold leading-none" id="cdSeconds">00</span>
<span class="font-label-sm text-label-sm text-on-primary-container uppercase mt-1">Detik</span>
</div>
</div>
<a class="w-full bg-secondary text-on-secondary rounded-lg py-space-sm font-label-md text-label-md uppercase tracking-wider text-center shadow-md flex items-center justify-center gap-space-xs hover:bg-secondary-fixed-dim hover:text-on-secondary-fixed transition-colors" href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Perayaan+Ke-7+%26+Peluncuran+Karakter+Arya+Sang+Penjaga+Alam&dates=20251206T090000Z/20251206T140000Z&details=Perayaan+Ulang+Tahun+ke-7+Raden+Arya+Wijayakusuma+dan+Peluncuran+Karakter+Orisinal+Nusantara.&location=Hutan+Kota+by+Plataran,+GBK+Senayan,+Jakarta" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
      Simpan ke Google Calendar
    </a>
<!-- Rundown -->
<div class="bg-primary-container/70 rounded-xl p-space-sm flex flex-col gap-space-xs mt-space-xs" id="itineraryContainer">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed text-center mb-1 font-bold">Susunan Acara (Rundown Perayaan)</span>
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
    <div class="flex items-start gap-space-sm py-1 event-itinerary-item">
        <span class="font-label-sm text-label-sm text-secondary-container font-bold w-16 flex-shrink-0">{{ $evTimeStr }}</span>
        <div class="flex flex-col flex-1 min-w-0">
            <span class="font-title-md text-title-md text-surface-bright leading-tight font-bold">{{ $event->title ?? ("Acara " . ($index + 1)) }}</span>
            <span class="font-body-sm text-body-sm text-on-primary-container mt-0.5">{{ $evVenue }}@if(!empty($evAddress)) &bull; {{ $evAddress }}@endif</span>
            @if(!empty($evDateStr))
                <span class="text-[10px] text-secondary-fixed block mt-0.5">📅 {{ $evDateStr }}</span>
            @endif
            @if(!empty($evMaps))
                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary-container hover:underline mt-1 font-bold">
                    <span class="material-symbols-outlined text-[13px]">location_on</span>
                    <span>Buka Maps</span>
                </a>
            @endif
        </div>
    </div>
@endforeach
</div>
</section>
<!-- 6. Panduan Tata Busana (Dress Code Guide) -->
<section class="bg-surface-container-low rounded-xl p-space-md shadow-md flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Tata Krama Penampilan</span>
<h3 class="font-headline-md text-headline-md text-primary">Nusantara Nature Green & Batik Keraton</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
</div>
<!-- Color Palette Swatches -->
<div class="flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm uppercase text-on-surface-variant font-semibold">Palet Warna Utama:</span>
<div class="grid grid-cols-5 gap-space-xs">
<div class="flex flex-col items-center gap-1">
<div class="w-full h-10 rounded-lg bg-primary shadow-inner"></div>
<span class="font-label-sm text-label-sm text-[10px] text-center text-on-surface truncate w-full">Forest Moss</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-10 rounded-lg bg-secondary shadow-inner"></div>
<span class="font-label-sm text-label-sm text-[10px] text-center text-on-surface truncate w-full">Antique Gold</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-10 rounded-lg bg-surface-container-highest shadow-inner"></div>
<span class="font-label-sm text-label-sm text-[10px] text-center text-on-surface truncate w-full">Ivory Silk</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-10 rounded-lg bg-secondary-container shadow-inner"></div>
<span class="font-label-sm text-label-sm text-[10px] text-center text-on-surface truncate w-full">Teak Wood</span>
</div>
<div class="flex flex-col items-center gap-1">
<div class="w-full h-10 rounded-lg bg-tertiary-fixed-dim shadow-inner"></div>
<span class="font-label-sm text-label-sm text-[10px] text-center text-on-surface truncate w-full">Sage Leaf</span>
</div>
</div>
</div>
<!-- Gender Guidance Cards -->
<div class="grid grid-cols-2 gap-space-sm">
<div class="bg-surface-container rounded-lg p-space-sm flex flex-col gap-1">
<div class="flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-[18px]">man</span>
<span class="font-label-sm text-label-sm font-bold uppercase">Panduan Pria</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-snug">
          Beskap modern atau kemeja batik tulis bernuansa hijau botani, dipadu celana kain gelap rapi.
        </p>
</div>
<div class="bg-surface-container rounded-lg p-space-sm flex flex-col gap-1">
<div class="flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-[18px]">woman</span>
<span class="font-label-sm text-label-sm font-bold uppercase">Panduan Wanita</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-snug">
          Kebaya modern anggun / gaun tenun nusantara palet forest moss green atau sage dengan selendang emas.
        </p>
</div>
</div>
</section>
<!-- 7. Galeri Karya & Eksplorasi Artistik -->
<section class="flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Eksplorasi Artistik</span>
<h3 class="font-headline-md text-headline-md text-primary">Koleksi Visual Karakter</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
</div>
<div id="galleryGridContainer" class="grid grid-cols-2 gap-space-sm">
@foreach($activeGalleries as $idx => $gal)
  @php
    $galUrl = \App\Services\TemplateManager::resolvePhotoUrl(is_object($gal) ? ($gal->image ?? null) : (is_array($gal) ? ($gal['image'] ?? null) : $gal), $profileImg);
    $galCaption = is_object($gal) ? ($gal->caption ?? null) : (is_array($gal) ? ($gal['caption'] ?? null) : null);
  @endphp
  <div class="bg-surface-container-low rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant/30">
    <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
      <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ $galUrl }}" alt="{{ $galCaption ?? ('Foto Galeri #' . ($idx + 1)) }}"/>
    </div>
    @if(!empty($galCaption))
      <div class="p-space-xs flex flex-col">
        <span class="font-body-sm text-[12px] text-primary truncate">{{ $galCaption }}</span>
      </div>
    @endif
  </div>
@endforeach
</div>
</section>
<!-- 8. Peta Lokasi & Akses Venue -->
<section class="bg-surface-container-low rounded-xl p-space-md shadow-md flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Penunjuk Arah & Lokasi</span>
<h3 class="font-headline-md text-headline-md text-primary">Hutan Kota by Plataran</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Gelora Bung Karno, Senayan, Jakarta Pusat</p>
</div>
<!-- Map container -->
<div class="w-full h-52 bg-cover bg-center rounded-lg shadow-inner relative flex items-end p-space-sm" data-location="Hutan Kota by Plataran, Senayan, Jakarta" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDv8hrfoYlPSC1ndw2v4d287a-BX2UL1XaneNmLoNEsRGKRCxLwShYlmeWcj3F8TsBL1mce0KGf4JN91NfQKiTm9ZBEK1wX7XkI2g8JJ3ECYNp2Eq3zyY_6cNSpjlbJb6p124PfZuEMvwQxgIUB8YoX0RGzF_m5pgWSqmiDhdKEx2PoCXTLS6XbXlcaSPTjCOD6ABQo2RzoHlAfU-P4EYJ8Kc4161pdevrUok0UiZv0')">
<div class="bg-surface/90 backdrop-blur-md rounded-lg p-space-xs text-on-surface shadow-md flex items-center gap-space-xs w-full">
<span class="material-symbols-outlined text-secondary text-[24px]">location_on</span>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm font-bold text-primary truncate">Bale Rimba Utama Plataran</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px] truncate">Pintu Masuk 7 GBK (Akses Khusus Plataran)</span>
</div>
</div>
</div>
<!-- VIP Services Grid -->
<div class="grid grid-cols-3 gap-space-xs text-center">
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[20px]">local_parking</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Valet VIP</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[10px]">Lobi Utama</span>
</div>
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[20px]">electric_rickshaw</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Golf Shuttle</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[10px]">Tersedia 24 Jam</span>
</div>
<div class="bg-surface-container rounded-lg p-space-xs flex flex-col items-center">
<span class="material-symbols-outlined text-secondary text-[20px]">verified_user</span>
<span class="font-label-sm text-label-sm font-semibold text-primary mt-1">Akses Khusus</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[10px]">Pintu Barat GBK</span>
</div>
</div>
<div class="flex gap-space-xs mt-space-xs">
<a id="previewMapsLinkMain" class="flex-1 bg-primary text-on-primary py-space-sm rounded-lg font-label-md text-label-md uppercase tracking-wider text-center flex items-center justify-center gap-1 shadow-sm hover:bg-primary-container transition-colors" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[18px]">map</span>
        Buka Google Maps
      </a>
<button class="bg-surface-container text-primary px-space-md py-space-sm rounded-lg font-label-md text-label-md uppercase tracking-wider flex items-center justify-center gap-1 shadow-sm hover:bg-surface-variant transition-colors" id="copyAddressBtn">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span id="copyText">Salin</span>
</button>
</div>
</section>
<!-- 9. Formulir Konfirmasi Kehadiran Tamu (RSVP) -->
<section class="bg-surface-container-low rounded-xl p-space-md shadow-md flex flex-col gap-space-md" id="rsvpSection">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Konfirmasi Kehadiran</span>
<h3 class="font-headline-md text-headline-md text-primary">Buku Reservasi Tamu</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
</div>
<form class="flex flex-col gap-space-sm" id="rsvpForm">
<!-- Nama Tamu -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Nama Tamu Terhormat</label>
<input class="w-full bg-surface-container text-primary font-title-md text-title-md p-space-sm rounded-lg focus:outline-none focus:ring-0" readonly="" type="text" value="{{ $guestName }}"/>
</div>
<!-- Kehadiran Radio -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Kepastian Kehadiran</label>
<div class="space-y-1.5 mt-0.5">
<label class="flex items-center gap-space-xs p-space-xs rounded-lg bg-surface-container cursor-pointer hover:bg-surface-container-high transition-colors">
<input checked="" class="accent-primary w-4 h-4" name="attendance" type="radio" value="hadir_berdua"/>
<span class="font-body-md text-body-md text-on-surface">🌿 Ya, Kami Hadir Berdua</span>
</label>
<label class="flex items-center gap-space-xs p-space-xs rounded-lg bg-surface-container cursor-pointer hover:bg-surface-container-high transition-colors">
<input class="accent-primary w-4 h-4" name="attendance" type="radio" value="hadir_sendiri"/>
<span class="font-body-md text-body-md text-on-surface">Ya, Hadir Sendiri</span>
</label>
<label class="flex items-center gap-space-xs p-space-xs rounded-lg bg-surface-container cursor-pointer hover:bg-surface-container-high transition-colors">
<input class="accent-primary w-4 h-4" name="attendance" type="radio" value="tidak_hadir"/>
<span class="font-body-md text-body-md text-on-surface">Mohon Maaf, Berhalangan</span>
</label>
</div>
</div>
<!-- Pendamping Anak -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Membawa Buah Hati / Anak?</label>
<select class="w-full bg-surface-container text-on-surface font-body-md text-body-md p-space-sm rounded-lg focus:outline-none">
<option value="0">Tidak Membawa Anak</option>
<option value="1">Ya, Membawa 1 Anak (Aktivitas Rimba Cilik)</option>
<option value="2">Ya, Membawa 2 Anak (Aktivitas Rimba Cilik)</option>
</select>
</div>
<!-- Pesan & Doa -->
<div class="flex flex-col gap-1">
<label class="font-label-sm text-label-sm uppercase font-semibold text-on-surface-variant">Untaian Doa & Pesan Restu untuk Arya</label>
<textarea class="w-full bg-surface-container text-on-surface font-body-md text-body-md p-space-sm rounded-lg focus:outline-none" id="rsvpMessage" placeholder="Tuliskan ucapan selamat ulang tahun ke-7 dan doa tulus untuk Raden Arya..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary text-secondary-fixed py-space-sm rounded-lg font-label-md text-label-md uppercase tracking-widest shadow-md flex items-center justify-center gap-space-xs hover:bg-primary-container transition-colors mt-space-xs" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
        Kirim Konfirmasi Kehadiran
      </button>
<div class="hidden p-space-sm bg-primary-fixed text-on-primary-fixed rounded-lg text-center font-body-sm text-body-sm" id="rsvpSuccessAlert">
        Matur nuwun sanget! Konfirmasi kehadiran Anda telah tersimpan di Buku Tamu Kencana.
      </div>
</form>
</section>
<!-- 10. Buku Tamu Digital (Untaian Doa Tamu Kencana) -->
<section class="flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Gema Kasih Kerabat</span>
<h3 class="font-headline-md text-headline-md text-primary">Untaian Doa Tamu Kencana</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
</div>
<div class="space-y-space-sm" id="guestbookFeed">
<div class="bg-surface-container-low rounded-xl p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="font-title-md text-title-md text-primary font-semibold">Kanjeng Raden Mas Danang</span>
<span class="bg-secondary-container text-on-secondary-container text-label-sm font-label-sm px-1.5 py-0.2 rounded">Kerabat</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant text-[11px]">10 mnt lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-snug">
          “Selamat menginjak usia ke-7 Raden Arya ksatria cilik. Semoga terus mencintai dan memelihara keindahan alam Nusantara dengan ketulusan hati.”
        </p>
</div>
<div class="bg-surface-container-low rounded-xl p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="font-title-md text-title-md text-primary font-semibold">Dr. Maya & Keluarga</span>
<span class="bg-surface-container-highest text-on-surface-variant text-label-sm font-label-sm px-1.5 py-0.2 rounded">Sahabat</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant text-[11px]">1 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-snug">
          “Karakter Arya dan Rusa Kencana sungguh memukau! Sungguh terharu melihat nilai kelestarian diajarkan dengan begitu indah sejak dini. Kami pasti hadir berdua!”
        </p>
</div>
<div class="bg-surface-container-low rounded-xl p-space-sm shadow-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="font-title-md text-title-md text-primary font-semibold">Bimasena & Dira</span>
<span class="bg-surface-container-highest text-on-surface-variant text-label-sm font-label-sm px-1.5 py-0.2 rounded">Tamu Undangan</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant text-[11px]">3 jam lalu</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface leading-snug">
          “Rahayu untuk Raden Arya. Doa terbaik agar tumbuh menjadi pribadi ksatria pelindung bumi yang berbudi pekerti luhur.”
        </p>
</div>
</div>
</section>
<!-- 11. Tanda Kasih Digital (Angpau / Gift Registry) -->
<section class="bg-surface-container-low rounded-xl p-space-md shadow-md flex flex-col gap-space-md">
<div class="text-center flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-widest">Tanda Kasih Kencana</span>
<h3 class="font-headline-md text-headline-md text-primary">Bingkisan & Dana Konservasi</h3>
<div class="w-10 h-0.5 bg-secondary-fixed my-1 rounded-full"></div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 text-center max-w-[90%]">
        Doa restu Anda adalah anugerah terindah. Bila berkenan memberikan tanda kasih, sebagian akan disalurkan ke Program Penanaman Pohon Rimba Cilik Nusantara.
      </p>
</div>
<div class="space-y-space-sm">
<!-- BCA Card -->
<!-- Bank 1 Card -->
<div class="bg-surface-container rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs mb-3">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-primary font-bold uppercase">{{ $bankName1 }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-on-surface font-mono tracking-wider" id="bcaAcc">{{ $bankAccount1 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder1 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded-lg text-label-sm font-semibold uppercase hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount1 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@if(!empty($bankAccount2))
<!-- Bank 2 Card -->
<div class="bg-surface-container rounded-xl p-space-md shadow-sm flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-secondary font-bold uppercase">{{ $bankName2 }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">Rekening Resmi</span>
</div>
<div class="flex items-center justify-between">
<div>
<span class="font-headline-sm text-headline-sm text-on-surface font-mono tracking-wider" id="mandiriAcc">{{ $bankAccount2 }}</span>
<span class="font-body-sm text-body-sm text-on-surface-variant block">a.n. {{ $bankHolder2 }}</span>
</div>
<button class="bg-primary text-on-primary px-3 py-1.5 rounded-lg text-label-sm font-semibold uppercase hover:opacity-90 active:scale-95 transition-all shadow-xs" onclick="navigator.clipboard.writeText('{{ $bankAccount2 }}'); const b=this; b.innerText='Tersalin ✓'; setTimeout(()=>b.innerText='Salin Rekening', 2000);" type="button">
  Salin Rekening
</button>
</div>
</div>
@endif
</section>
<!-- 12. Penutup Tradisional -->
<section class="flex flex-col items-center text-center p-space-md gap-space-sm">
<div class="w-20 h-20 rounded-full overflow-hidden shadow-lg p-1 bg-surface-container">
<img alt="Segel Keraton Nusantara Nature Green" class="w-full h-full object-contain" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
<div class="flex flex-col items-center">
<span class="font-label-md text-label-md text-secondary uppercase tracking-[0.2em]">Matur Nuwun Sanget</span>
<h3 class="font-headline-md text-headline-md text-primary mt-1">Keluarga Besar Arya Wijayakusuma</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[85%] mt-space-xs">
        Merupakan kehormatan dan kebahagiaan tak terhingga bagi kami atas kehadiran serta doa restu Bapak/Ibu/Saudara/i sekalian.
      </p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant text-label-sm font-label-sm mt-space-xs">
<span>Rahayu Lestari</span>
<span>•</span>
<span>Nusantara 2025</span>
</div>
</section>
<script>
    // Live Countdown Timer
    function updateCountdown() {
      let targetDate = new Date("{{ $targetDate->toIso8601String() }}").getTime();
      const now = new Date().getTime();
      const difference = targetDate - now;

      if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        const dEl = document.getElementById('cdDays');
        const hEl = document.getElementById('cdHours');
        const mEl = document.getElementById('cdMinutes');
        const sEl = document.getElementById('cdSeconds');

        if (dEl) dEl.innerText = String(days).padStart(2, '0');
        if (hEl) hEl.innerText = String(hours).padStart(2, '0');
        if (mEl) mEl.innerText = String(minutes).padStart(2, '0');
        if (sEl) sEl.innerText = String(seconds).padStart(2, '0');
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

    // Copy Address Button Micro-interaction
    const copyBtn = document.getElementById('copyAddressBtn');
    if (copyBtn) {
      copyBtn.addEventListener('click', function() {
        navigator.clipboard.writeText('{{ addslashes($venueAddress) }}');
        const copyTextEl = document.getElementById('copyText');
        if (copyTextEl) {
          copyTextEl.innerText = 'Tersalin!';
          setTimeout(() => { copyTextEl.innerText = 'Salin'; }, 2000);
        }
      });
    }

    // RSVP submission interaction
    const rsvpForm = document.getElementById('rsvpForm');
    if (rsvpForm) {
      rsvpForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const alertEl = document.getElementById('rsvpSuccessAlert');
        const msgEl = document.getElementById('rsvpMessage');
        const feed = document.getElementById('guestbookFeed');

        if (alertEl) alertEl.classList.remove('hidden');

        if (msgEl && msgEl.value.trim() !== '' && feed) {
          const newCard = document.createElement('div');
          newCard.className = 'bg-surface-container-low rounded-xl p-space-sm shadow-sm flex flex-col gap-1 transition-all animate-fadeIn';
          newCard.innerHTML = `
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-space-xs">
                <span class="font-title-md text-title-md text-primary font-semibold">{{ $guestName }}</span>
                <span class="bg-secondary-container text-on-secondary-container text-label-sm font-label-sm px-1.5 py-0.2 rounded">Tamu Kehormatan</span>
              </div>
              <span class="font-label-sm text-label-sm text-on-surface-variant text-[11px]">Baru saja</span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface leading-snug">
              “${msgEl.value.trim()}”
            </p>
          `;
          feed.insertBefore(newCard, feed.firstChild);
          msgEl.value = '';
        }
      });
    }

    // Audio Playback toggle micro-interaction
    const toggleBtn = document.getElementById('toggleAudioBtn');
    const audioIcon = document.getElementById('audioIcon');
    let isPlaying = true;
    if (toggleBtn && audioIcon) {
      toggleBtn.addEventListener('click', function() {
        isPlaying = !isPlaying;
        audioIcon.innerText = isPlaying ? 'equalizer' : 'volume_off';
      });
    }
  </script>
</div></main><nav class="fixed bottom-0 w-full z-50 pb-safe bg-primary/95 backdrop-blur-xl shadow-[0_-4px_24px_rgba(3,37,23,0.18)]" data-active-classes="text-secondary-fixed font-semibold scale-105"><div class="max-w-[520px] mx-auto h-20 px-space-xs flex items-center justify-around"><a aria-current="page" class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 transition-all text-secondary-fixed font-semibold scale-105" data-path="undangan" href="#"><span class="material-symbols-outlined text-[22px]">mark_email_read</span><span class="font-label-sm text-label-sm mt-0.5 tracking-wider">Undangan</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-primary-container hover:text-secondary-fixed transition-all" data-path="kisah" href="#"><span class="material-symbols-outlined text-[22px]">auto_stories</span><span class="font-label-sm text-label-sm mt-0.5 tracking-wider">Kisah</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-primary-container hover:text-secondary-fixed transition-all" data-path="jadwal" href="#"><span class="material-symbols-outlined text-[22px]">event_available</span><span class="font-label-sm text-label-sm mt-0.5 tracking-wider">Jadwal</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-primary-container hover:text-secondary-fixed transition-all" data-path="lokasi" href="#"><span class="material-symbols-outlined text-[22px]">pin_drop</span><span class="font-label-sm text-label-sm mt-0.5 tracking-wider">Lokasi</span></a><a class="flex flex-col items-center justify-center min-w-[56px] min-h-[44px] py-1 text-on-primary-container hover:text-secondary-fixed transition-all" data-path="rsvp" href="#"><span class="material-symbols-outlined text-[22px]">edit_calendar</span><span class="font-label-sm text-label-sm mt-0.5 tracking-wider">RSVP</span></a></div></nav>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT (Isi Undangan Utama)
         ======================================================== -->
    <div id="invitation-main" class="w-full max-w-md mx-auto relative overflow-hidden transition-opacity duration-700 min-h-screen">
        <main class="flex flex-col relative w-full flex-grow bg-surface min-h-screen"><div class="flex flex-col w-full items-center justify-between px-margin py-space-sm relative overflow-hidden select-none" id="envelope-root">
<!-- Subtle Filigree Ambient Canvas Watermark -->
<div class="absolute inset-0 pointer-events-none opacity-5 flex items-center justify-center">
<svg class="w-[120%] h-[120%]" fill="none" stroke="currentColor" viewbox="0 0 400 400">
<path class="text-secondary stroke-[1.5]" d="M200,20 C240,80 340,100 340,160 C340,240 260,260 200,380 C140,260 60,240 60,160 C60,100 160,80 200,20 Z"></path>
<circle class="text-primary stroke-[1]" cx="200" cy="200" r="140"></circle>
<circle class="text-secondary stroke-[1]" cx="200" cy="200" r="90"></circle>
<path class="text-primary stroke-[1]" d="M120,200 Q200,120 280,200 Q200,280 120,200 Z"></path>
<path class="text-secondary stroke-[0.75]" d="M200,60 L200,340 M60,200 L340,200"></path>
</svg>
</div>
<!-- Audio Floating Medallion (Controller) -->
<div class="fixed bottom-space-md right-space-md z-40">
<button aria-label="Putar Musik" class="w-11 h-11 rounded-full bg-primary-container text-secondary-fixed flex items-center justify-center shadow-lg active:scale-95 transition-transform" id="music-fab" onclick="toggleMusic()">
<span class="material-symbols-outlined text-title-md font-title-md animate-spin" id="audio-icon" style="animation-duration: 8s;">graphic_eq</span>
</button>
</div>
<!-- Top Badges & Ambience Status Section -->
<div class="w-full flex flex-col items-center gap-space-xs z-10 text-center">
<div class="inline-flex items-center gap-1.5 px-space-sm py-0.5 rounded-full bg-surface-container-high text-secondary">
<span class="font-label-sm text-label-sm font-semibold tracking-widest uppercase">✦ Kisah Maha Karya Nusantara • Edisi Alam Kencana ✦</span>
</div>
<div class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container text-on-surface-variant">
<span class="material-symbols-outlined text-[13px] text-secondary">music_note</span>
<span class="font-label-sm text-label-sm tracking-wide italic">Kidung Laras Rimba & Gamelan Serenade</span>
</div>
</div>
<!-- Grand Royal Header Section -->
<div class="w-full flex flex-col items-center text-center mt-space-sm z-10 max-w-[460px]">
<span class="font-label-md text-label-md text-secondary tracking-[0.22em] uppercase font-semibold">
      Perayaan Ulang Tahun Karakter Orisinal
    </span>
<h1 class="font-display-md-mobile text-display-md-mobile text-primary font-semibold tracking-wide my-0.5" id="previewGroomNameTitle">{{ $celebrantName }}</h1>
<div class="px-space-md py-1">
<p class="font-title-md text-title-md text-on-surface-variant italic font-normal leading-relaxed">
        “Merawat kelestarian alam dwipantara, merayakan kehangatan budi pekerti, dan menyalakan lentera harapan di tanah Nusantara.”
      </p>
</div>
</div>
<!-- Center Interaction: Sacred Royal Wax Seal (Segel Lilin Nusantara) -->
<div class="flex flex-col items-center my-space-xs z-20">
<div class="relative cursor-pointer group flex items-center justify-center" id="seal-trigger">
<!-- Ambient Golden Glow -->
<div class="absolute w-36 h-36 rounded-full bg-secondary-container opacity-40 blur-xl group-hover:opacity-75 transition-opacity"></div>
<!-- Wax Seal Image Component -->
<div class="relative w-28 h-28 rounded-full overflow-hidden shadow-2xl flex items-center justify-center transform group-hover:scale-105 active:scale-95 transition-all duration-300" id="wax-seal-wrapper">
<img alt="Segel Keraton Nusantara Nature Green" class="w-full h-full object-contain" src="{{ $coverImg }}" id="previewCoverPhotoImg"/>
</div>
</div>
<!-- Interactive Prompt Pill -->
<button class="mt-space-xs inline-flex items-center gap-1.5 px-space-sm py-0.5 rounded-full bg-surface-container-highest text-secondary text-center shadow-sm hover:bg-secondary-container transition-colors" id="tap-seal-pill">
<span class="font-label-sm text-label-sm font-semibold tracking-wider">◆ KETUK UNTUK MEMBUKA SEGEL KENCANA ◆</span>
</button>
</div>
<!-- Guest Envelope Pass Card (Bento Pass) -->
<div class="w-full max-w-[480px] bg-surface-container-low rounded-xl p-space-md shadow-md z-10 relative flex flex-col gap-space-xs">
<!-- Top Pass Pill -->
<div class="flex items-center justify-between w-full">
<div class="px-space-xs py-0.5 rounded bg-surface-container-highest text-secondary">
<span class="font-label-sm text-label-sm font-semibold">★ <span id="previewGuestNameMain">{{ $guestName }}</span></span>
</div>
<div class="px-space-xs py-0.5 rounded bg-surface-container text-on-surface-variant">
<span class="font-label-sm text-label-sm">PASS: NO. 008-RIMBA</span>
</div>
</div>
<!-- Salutation & Guest Identity -->
<div class="flex flex-col mt-0.5">
<span class="font-label-sm text-label-sm text-on-surface-variant tracking-wider uppercase">
        Kepada Yth. Bapak / Ibu / Saudara/i:
      </span>
<div class="flex items-baseline justify-between mt-0.5">
<h2 class="font-headline-md text-headline-md text-primary font-bold">
          {{ $guestName }}
        </h2>
<span class="font-body-sm text-body-sm text-secondary font-medium italic">
          Di Tempat
        </span>
</div>
</div>
<!-- Warm Royal Courtesy Note -->
<p class="font-body-sm text-body-sm text-on-surface-variant leading-tight">
      Merupakan suatu kehormatan agung bagi kami menyambut kehadiran Anda dalam perjumpaan penuh harmoni alam dan sukacita kencana ini.
    </p>
</div>
<!-- Action CTA & Ceremonial Footer Meta -->
<div class="w-full max-w-[480px] flex flex-col items-center gap-space-xs z-10 mt-space-xs">
<!-- High-Contrast Primary CTA Button -->
<button class="w-full py-space-sm px-space-md rounded-lg bg-primary text-on-primary flex items-center justify-center gap-2 shadow-lg active:scale-[0.99] transition-all duration-200" id="open-envelope-btn">
<span class="material-symbols-outlined text-headline-sm font-headline-sm text-secondary-fixed">mail</span>
<span class="font-label-md text-label-md text-on-primary tracking-widest font-semibold uppercase">
        Buka Undangan (Buka Envelope) →
      </span>
</button>
<!-- Meta Details & Dresscode -->
<div class="w-full flex flex-col items-center text-center gap-1">
<div class="flex items-center justify-center gap-2 text-on-surface-variant flex-wrap">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">calendar_month</span>
<span class="font-body-sm text-body-sm font-medium">{{ $eventDateFormatted }}</span>
</div>
<span class="text-outline-variant font-label-sm text-label-sm">•</span>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
<span class="font-body-sm text-body-sm">Plataran Hutan Kota GBK, Jakarta</span>
</div>
</div>
<div class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container text-on-secondary-container">
<span class="material-symbols-outlined text-[12px] text-secondary">styler</span>
<span class="font-label-sm text-label-sm tracking-wide font-medium">
          DRESS CODE: TRADISIONAL KONTEMPORER / NATURE GREEN & BATIK KERATON
        </span>
</div>
</div>
</div>
<!-- Micro-interaction Royal Flourish Script -->
<script>
    (function() {
      const sealWrapper = document.getElementById('wax-seal-wrapper');
      const sealTrigger = document.getElementById('seal-trigger');
      const openBtn = document.getElementById('open-envelope-btn');
      const tapPill = document.getElementById('tap-seal-pill');
      const audioBtn = document.getElementById('audio-toggle-btn');
      const audioIcon = document.getElementById('audio-icon');

      let isOpened = false;
      let isPlaying = true;

      function triggerOpenAnimation() {
        if (isOpened) return;
        isOpened = true;

        if (sealWrapper) {
          sealWrapper.style.transform = 'scale(1.15) rotate(12deg)';
          sealWrapper.style.filter = 'drop-shadow(0 0 15px rgba(197, 160, 89, 0.8))';
          setTimeout(() => {
            sealWrapper.style.transform = 'scale(0.95) rotate(-6deg)';
          }, 200);
        }

        if (tapPill) {
          tapPill.innerHTML = '<span class="font-label-sm text-label-sm font-semibold tracking-wider text-secondary">✦ SEGEL TERBUKA • SILAKAN MASUK ✦</span>';
        }

        if (openBtn) {
          openBtn.classList.remove('bg-primary');
          openBtn.classList.add('bg-primary-container');
          openBtn.innerHTML = '<span class="material-symbols-outlined text-headline-sm font-headline-sm text-secondary-fixed">drafts</span><span class="font-label-md text-label-md text-secondary-fixed tracking-widest font-semibold uppercase">Sampul Dibuka... Membawa Anda Masuk →</span>';
        }
      }

      if (sealTrigger) sealTrigger.addEventListener('click', triggerOpenAnimation);
      if (tapPill) tapPill.addEventListener('click', triggerOpenAnimation);
      if (openBtn) openBtn.addEventListener('click', triggerOpenAnimation);

      if (audioBtn && audioIcon) {
        audioBtn.addEventListener('click', function() {
          isPlaying = !isPlaying;
          if (isPlaying) {
            audioIcon.classList.add('animate-spin');
            audioIcon.textContent = 'graphic_eq';
          } else {
            audioIcon.classList.remove('animate-spin');
            audioIcon.textContent = 'volume_off';
          }
        });
      }
    })();
  </script>
</div></main>
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
            const header = `<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed text-center mb-1 font-bold">Susunan Acara (Rundown Perayaan)</span>`;
            container.innerHTML = header + events.map((ev, i) => {
                const title = ev.title || `Acara ${i + 1}`;
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "16.00 - 21.00 WIB";
                const venue = ev.venue_name || "";
                const addr = ev.address || "";
                const dateStr = ev.date ? `📅 ${ev.date}` : "";
                const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-[11px] text-secondary-container hover:underline mt-1 font-bold"><span class="material-symbols-outlined text-[13px]">location_on</span><span>Buka Maps</span></a>` : "";
                return `
                    <div class="flex items-start gap-space-sm py-1 event-itinerary-item">
                        <span class="font-label-sm text-label-sm text-secondary-container font-bold w-16 flex-shrink-0">${timeStr}</span>
                        <div class="flex flex-col flex-1 min-w-0">
                            <span class="font-title-md text-title-md text-surface-bright leading-tight font-bold">${title}</span>
                            <span class="font-body-sm text-body-sm text-on-primary-container mt-0.5">${venue}${addr ? " &bull; " + addr : ""}</span>
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'arya-nature-green' }, '*');
        }
    </script>
    @include('templates.partials.preview-sync')
</body>
</html>