<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Aura Soleil XVII') . ' - ' . ($couple->groom_name ?? 'Clarissa Aurelia') }} | D'Karsa</title>
    <meta name="description" content="Sweet Seventeen Celebration of {{ $couple->groom_name ?? 'Clarissa Aurelia' }} - Aura Soleil."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Orange Energy Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#9f3c16",
                        "primary-container": "#bf542c",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#fffbff",
                        "secondary": "#735c00",
                        "secondary-container": "#fed65b",
                        "on-secondary-container": "#745c00",
                        "secondary-fixed": "#ffe088",
                        "secondary-fixed-dim": "#e9c349",
                        "tertiary": "#9d3f00",
                        "tertiary-container": "#c45100",
                        "on-tertiary": "#ffffff",
                        "surface": "#fff8f6",
                        "on-surface": "#251916",
                        "surface-variant": "#f5ddd8",
                        "on-surface-variant": "#57423b",
                        "surface-container": "#ffe9e4",
                        "surface-container-low": "#fff1ed",
                        "surface-container-high": "#fbe3de",
                        "surface-container-highest": "#f5ddd8",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#fff8f6",
                        "outline": "#8a726a",
                        "outline-variant": "#dec0b7",
                        "background": "#fff8f6",
                        "on-background": "#251916"
                    },
                    fontFamily: {
                        "serif": ["'Playfair Display'", "serif"],
                        "sans": ["'Plus Jakarta Sans'", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #fff8f6;
            color: #251916;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased overflow-hidden">

    @php
        $celebrantName = $couple->groom_name ?? 'Clarissa Aurelia';
        $celebrantNick = $couple->groom_nickname ?? 'Clarissa';
        $heading = $couple->event_heading ?? 'Aura Soleil XVII';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet Seventeen Celebration';
        $guestName = $guest->name ?? request('to') ?? request('guest') ?? 'Jonathan & Partner';
        $quote = $couple->quote ?? 'A radiant twilight welcoming seventeen suns — Di fajar usia ketujuh belas ini, seberkas tawa dan pelita persahabatan adalah anugerah terindah.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBqyWfjlXiyQzbIj4wDK6La3Dsgmaab3t9hoCW0K9c0M4VGiiqAYB_l1InauHWNKEiVOFqfh0Gqc5JDDPbsKp2NflMaV01FLo99nmIFXDweDjITeCxMLKsS0mR-nA4W2rJKU2nd2SoZd8MRfjI2pKrOqs6H9PPeSqQYbK4x4W97NxYeIIzL1GWp1RfMkpCmvTc2jKRsYMiSpvnDU5dvSNrMnyGb3UFERSqZfLCCPb53nH4B-aE8hAa_tQ';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = $defaultCoverImg;
        $profileImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            $coverImg
        );

        $monogramImg = 'https://lh3.googleusercontent.com/aida/AEtjO1V_NUu0T76eI08GVZrlUWkIuZfCgIBPR3aHR8YCWEVI1-INzxsgIyL_ulGYZW9wgvfqZV9LlbjgQRxyk0d9tdtBLJj48QSm8ZZ9oP-AQfMxITbfjGvflJHkjpIQP9l5QzJz8U7C-wxTrJdd_UU_LCHTXYoig2kuB8CzwlFbtUxGuZMCXTjWNnZyUoZ0hPKp1I1jej_oE5zilpzF2uKduabR1TFUN9B0_l3du5Lrs1rToD2GU9OKP-N07js';

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? $couple->wedding_time : '18.30 WIB – 22.30 WIB';

        $venueName = $couple->venue_name ?? 'The Grand Ballroom, Hotel Mulia Senayan';
        $venueAddress = $couple->venue_address ?? 'Jl. Asia Afrika No.6, Gelora, Tanah Abang, Jakarta Pusat 10270';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));

        $familyLine = !empty($couple->groom_parents) ? $couple->groom_parents : (!empty($couple->groom_father) && !empty($couple->groom_mother) ? ('Bpk. ' . $couple->groom_father . ' & Ibu ' . $couple->groom_mother) : 'Keluarga Besar');

        // Bank / Digital Gift Info
        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'BCA Digital';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->account_number ?? '8820 1792 01';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->account_name ?? 'Clarissa Aurelia';

        $bankName2 = $couple->bank_name_2 ?? 'Bank Mandiri';
        $bankAccount2 = $couple->bank_account_2 ?? '137 00 9821 3401';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Clarissa Aurelia';

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBqyWfjlXiyQzbIj4wDK6La3Dsgmaab3t9hoCW0K9c0M4VGiiqAYB_l1InauHWNKEiVOFqfh0Gqc5JDDPbsKp2NflMaV01FLo99nmIFXDweDjITeCxMLKsS0mR-nA4W2rJKU2nd2SoZd8MRfjI2pKrOqs6H9PPeSqQYbK4x4W97NxYeIIzL1GWp1RfMkpCmvTc2jKRsYMiSpvnDU5dvSNrMnyGb3UFERSqZfLCCPb53nH4B-aE8hAa_tQ', 'caption' => 'Golden Hour Elegance • 2025'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAzlcrv0NEuFjtAhBhQoRIZWLakeu8Ugu4QZ5ohZ00tkDpkskOKsS85ica-cirw--m19gS9SJjsCvd7lnGP5BTrkPlt9aT-3Izh360XHhv2GPmaW0uswoYu1RJUzxCbauAoCjVPdNOn_5VF_S8_YBzRwKLcTN59Mq7qeLe5sL1DAH-wniC3h2UQhnC2EwyfY_unMxP9pDVZ6450wgrQge53ig11MgDxGdOWKISl8h4-jTcYcdVqUxYzPg', 'caption' => 'Sweet Memories'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAcKD4D2as3kWcaXrxoqyuxTWpAsw9_HXkQ1tvmraF2mS-Z_orl9v7qd23kcIbyHoUl3u3zmwoIdHa7AwGTxvotOVw4apl3mAFFXG-vlPde1H8zu1-bIiQ73oidIDmyL4EhdBF04Znyewi3BQPY3MPnQ6nem1S5k8Aw12CjkHfhhSlaycZYEFEHubLGJoJ4WLvETd_aP_JyTJ862vtEZw_fNAh2zDscYKsXNENmocctkkR9GQNspwCkFQ', 'caption' => 'Celebration Bloom'],
            ]);
        }

        // Dynamic Events
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Evening Welcome & Canapé',
                    'date' => $eventDateFormatted,
                    'start_time' => '18:30 WIB',
                    'end_time' => '19:30 WIB',
                    'venue_name' => $venueName,
                    'address' => 'The Grand Ballroom, Hotel Mulia — Penyambutan tamu kehormatan & welcome drink santai.',
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1,
                ],
                (object)[
                    'title' => 'Golden Hour Gala & 17 Candle Celebration',
                    'date' => $eventDateFormatted,
                    'start_time' => '19:30 WIB',
                    'end_time' => '21:30 WIB',
                    'venue_name' => 'Main Ballroom Stage',
                    'address' => 'Prosesi perayaan 17 lilin, sambutan keluarga besar, dan jamuan santap malam.',
                    'maps_url' => $mapsUrl,
                    'sort_order' => 2,
                ],
            ]);
        }
    @endphp

    <!-- Background Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Feedback Toast -->
    <div id="toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 max-w-xs px-4 py-2.5 rounded-full bg-on-surface text-surface text-xs font-medium text-center opacity-0 pointer-events-none transition-opacity duration-300 z-[120] shadow-2xl flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-secondary-container text-[18px]">verified</span>
        <span id="toast-message">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: DIGITAL ENVELOPE (Tampilan Awal Amplop)
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-surface flex flex-col items-center justify-between px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out select-none">
        <!-- Ambient Warm Sunset Glow Background Orbs (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-primary-container/20 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-secondary-fixed/25 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header Crest -->
            <header class="flex flex-col items-center text-center w-full shrink-0">
                <div class="flex items-center gap-2 mb-0.5">
                    <span class="w-6 h-[1px] bg-secondary/40"></span>
                    <span class="material-symbols-outlined text-secondary text-xs">sparkles</span>
                    <span class="w-6 h-[1px] bg-secondary/40"></span>
                </div>
                <p id="previewSubCategoryCover" class="text-[9.5px] uppercase tracking-[0.25em] text-secondary font-semibold">
                    {{ $subCategoryBadge }}
                </p>
            </header>

            <!-- Center Showcase (Monogram, Name, Guest Card) -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Monogram / Cover Photo Badge -->
                <div class="relative w-20 h-20 flex items-center justify-center p-1 my-0.5 group">
                    <div class="absolute inset-0 rounded-full bg-surface-container-high/60 shadow-md backdrop-blur-sm"></div>
                    <div class="relative w-full h-full rounded-full overflow-hidden bg-surface-container-lowest shadow-inner flex items-center justify-center border border-outline-variant/30">
                        <img id="previewCoverPhotoImg" alt="Cover Photo" class="w-full h-full object-cover rounded-full" src="{{ $coverImg }}"/>
                    </div>
                </div>

                <!-- Debutante Name Title -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-serif text-xl sm:text-2xl text-primary tracking-tight font-semibold truncate">
                        {{ $celebrantName }}
                    </h1>
                    <p id="previewQuoteCover" class="text-[11px] text-on-surface-variant italic mt-0.5 max-w-xs mx-auto line-clamp-1">
                        “{{ $quote }}”
                    </p>
                </div>

                <!-- Guest Recipient Framed Plaque -->
                <div class="w-full bg-surface-container-lowest/90 backdrop-blur-md rounded-xl p-2 shadow-md my-0.5 flex flex-col items-center text-center border border-outline-variant/30">
                    <span class="text-[8px] text-on-surface-variant uppercase tracking-wider font-medium block">
                        Kepada Yth. Bapak/Ibu/Saudara/i:
                    </span>
                    <h2 id="previewGuestNameCover" class="font-serif text-base sm:text-lg text-on-surface font-semibold tracking-wide truncate mt-0.5">
                        {{ $guestName }}
                    </h2>
                    <span class="text-[9.5px] text-on-surface-variant font-medium italic">Di Tempat</span>
                </div>
            </section>

            <!-- Primary CTA Button -->
            <footer class="w-full flex flex-col items-center gap-0.5 pt-0.5 shrink-0">
                <button id="openInvitationBtn" type="button" class="w-full py-2.5 px-4 rounded-full bg-gradient-to-r from-primary-container via-primary to-tertiary text-on-primary shadow-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-xl active:scale-[0.98] font-semibold text-xs uppercase tracking-wider cursor-pointer pointer-events-auto">
                    <span class="material-symbols-outlined text-secondary-container text-base">mark_email_read</span>
                    <span>Buka Undangan</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </button>

                <div class="flex items-center gap-1 text-[9px] text-on-surface-variant">
                    <span class="material-symbols-outlined text-primary text-[12px] animate-spin" style="animation-duration: 4s;">music_note</span>
                    <span>Putar Musik Latar saat dibuka</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN SCREEN: ISI UNDANGAN UTAMA (Aura Soleil XVII)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="w-full min-h-screen bg-surface relative pb-28 opacity-0 transition-opacity duration-700">

        <!-- Fixed Top Header -->
        <header class="fixed top-0 inset-x-0 z-40 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
            <div class="h-16 px-4 max-w-md mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img id="previewGroomPhotoHeader" alt="{{ $celebrantName }}" class="h-8 w-8 rounded-full object-cover border border-primary/20 shadow-sm" src="{{ $profileImg }}"/>
                    <div class="flex flex-col">
                        <span id="previewGroomNameHeader" class="font-serif text-sm font-semibold tracking-tight text-primary leading-tight">{{ $heading }}</span>
                        <span class="text-[10px] uppercase tracking-widest text-secondary font-bold">Undangan Utama</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button id="headerMusicToggle" aria-label="Ambient Music Toggle" class="w-10 h-10 rounded-full flex items-center justify-center bg-secondary-container/30 text-primary transition-all duration-300 active:scale-95">
                        <span id="headerMusicIcon" class="material-symbols-outlined text-[20px] animate-pulse">music_note</span>
                    </button>
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary">
                        <span class="material-symbols-outlined text-[16px]">celebration</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Stream bounded within max-w-md mx-auto -->
        <main class="w-full max-w-md mx-auto px-4 pt-20 space-y-8">

            <!-- SECTION 1: HERO & CELEBRANT REVEAL -->
            <section class="flex flex-col items-center pt-2 text-center relative">
                <div class="w-16 h-16 mb-2 relative flex items-center justify-center">
                    <img alt="Emblem Aura Soleil XVII" class="w-full h-full object-contain filter drop-shadow-sm" src="{{ $monogramImg }}"/>
                </div>

                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed mb-2">
                    <span class="material-symbols-outlined text-[13px]">hotel_class</span>
                    <span id="previewSubCategoryBadge" class="text-[10px] uppercase tracking-[0.25em] font-bold">
                        {{ $subCategoryBadge }}
                    </span>
                </div>

                <p class="font-serif text-xl sm:text-2xl italic text-primary leading-tight mb-4">
                    Celebrating 17 Radiant Years
                </p>

                <!-- Arched Luxury Celebrant Portrait Frame -->
                <div class="relative w-full max-w-[280px] mx-auto mb-4 group">
                    <div class="absolute inset-0 rounded-t-[140px] rounded-b-2xl bg-gradient-to-b from-secondary-fixed via-primary to-tertiary opacity-30 blur-md transform scale-[1.02]"></div>
                    <div class="relative rounded-t-[136px] rounded-b-xl overflow-hidden shadow-xl bg-surface-container-high aspect-[3/4.2]">
                        <img id="previewGroomPhotoImg" alt="{{ $celebrantName }}" class="w-full h-full object-cover object-top" src="{{ $profileImg }}"/>
                        <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end pb-3 px-3 text-center">
                            <span class="text-[10px] uppercase tracking-widest text-secondary-fixed font-bold">The Debutante</span>
                            <span id="previewGroomNameHero" class="font-serif text-2xl text-surface font-semibold drop-shadow">{{ $celebrantName }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-2 text-secondary mb-1">
                    <span class="w-6 h-[1px] bg-secondary-fixed-dim"></span>
                    <span class="text-xs uppercase tracking-[0.2em] text-on-surface-variant font-bold">{{ $heading }}</span>
                    <span class="w-6 h-[1px] bg-secondary-fixed-dim"></span>
                </div>
            </section>

            <!-- SECTION 2: PERSONALIZED GUEST WELCOME -->
            <section class="bg-surface-container-low rounded-2xl p-5 shadow-sm relative overflow-hidden text-center border border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary absolute top-2 left-2 text-[18px] opacity-60">auto_awesome</span>
                <span class="material-symbols-outlined text-secondary absolute bottom-2 right-2 text-[18px] opacity-60">auto_awesome</span>
                <p class="text-xs text-on-surface-variant uppercase tracking-widest mb-1.5 font-medium">Kepada Yth. Tamu Kehormatan</p>
                <h3 id="previewGuestNameMain" class="font-serif text-2xl text-primary font-semibold mb-3">
                    {{ $guestName }}
                </h3>
                <p id="previewQuote" class="text-sm text-on-surface leading-relaxed italic max-w-xs mx-auto">
                    “{{ $quote }}”
                </p>
                <p class="text-xs text-secondary uppercase tracking-widest mt-3 font-semibold">
                    — {{ $celebrantName }} & {{ $familyLine }} —
                </p>
            </section>

            <!-- SECTION 3: EVENT SCHEDULE & LIVE COUNTDOWN -->
            <section class="bg-surface-container rounded-2xl p-5 shadow-sm flex flex-col items-center text-center border border-outline-variant/30 space-y-4">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center mb-2 shadow-md">
                        <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                    </div>
                    <span class="text-xs uppercase tracking-widest text-secondary mb-1 font-bold">Jadwal & Agenda Acara</span>
                    <h4 id="previewEventDate" class="font-serif text-xl text-on-surface font-semibold mb-0.5">{{ $eventDateFormatted }}</h4>
                    <p id="previewEventTime" class="text-sm text-on-surface-variant">{{ $eventTimeFormatted }}</p>
                </div>

                <!-- Live Dynamic Events / Agenda Sesi Cards Container -->
                <div id="itineraryContainer" class="w-full space-y-3.5 text-left">
                    @foreach($activeEvents as $index => $event)
                        @php
                            $evDateStr = $eventDateFormatted;
                            if (!empty($event->date)) {
                                try {
                                    $evDateStr = \Carbon\Carbon::parse($event->date)->locale('id')->isoFormat('dddd, D MMMM Y');
                                } catch (\Exception $e) {
                                    $evDateStr = $event->date;
                                }
                            }
                            $evTimeStr = trim(($event->start_time ?? '') . (!empty($event->end_time) ? ' - ' . $event->end_time : ''));
                            if (empty($evTimeStr)) $evTimeStr = $eventTimeFormatted;
                            $evVenue = $event->venue_name ?? $venueName;
                            $evAddress = $event->address ?? '';
                            $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
                        @endphp
                        <div class="bg-surface-container-low rounded-xl p-4 border border-outline-variant/30 shadow-sm flex flex-col gap-2.5">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] uppercase font-bold tracking-wider">
                                    <span class="material-symbols-outlined text-[13px]">celebration</span>
                                    Sesi {{ $index + 1 }}
                                </span>
                                <span class="text-xs text-primary font-bold">{{ $evTimeStr }}</span>
                            </div>
                            <div>
                                <h4 class="font-serif text-lg text-primary font-semibold leading-snug">{{ $event->title ?? ('Acara ' . ($index + 1)) }}</h4>
                                <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-medium mt-1">
                                    <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                                    <span>{{ $evDateStr }}</span>
                                </div>
                            </div>
                            <div class="bg-surface-container/70 rounded-lg p-2.5 flex items-start gap-2 border border-outline-variant/20">
                                <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                                <div class="min-w-0">
                                    <span class="font-semibold text-xs text-on-surface block">{{ $evVenue }}</span>
                                    @if(!empty($evAddress))
                                        <p class="text-[11px] text-on-surface-variant mt-0.5 leading-relaxed">{{ $evAddress }}</p>
                                    @endif
                                </div>
                            </div>
                            @if(!empty($evMaps))
                                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="w-full py-2 px-3 rounded-lg bg-surface-container-highest hover:bg-primary hover:text-on-primary text-primary text-xs uppercase font-bold tracking-wider flex items-center justify-center gap-1.5 border border-outline-variant/30 transition-all">
                                    <span class="material-symbols-outlined text-[15px]">directions</span>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Countdown Container -->
                <div class="w-full bg-surface-container-lowest/90 backdrop-blur-sm rounded-xl p-3 shadow-inner border border-outline-variant/20">
                    <div class="grid grid-cols-4 gap-2 text-center" id="countdown-timer">
                        <div class="flex flex-col items-center bg-surface-container-high/60 rounded-lg py-2">
                            <span class="font-serif text-xl text-primary font-bold" id="days-val">00</span>
                            <span class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Hari</span>
                        </div>
                        <div class="flex flex-col items-center bg-surface-container-high/60 rounded-lg py-2">
                            <span class="font-serif text-xl text-primary font-bold" id="hours-val">00</span>
                            <span class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Jam</span>
                        </div>
                        <div class="flex flex-col items-center bg-surface-container-high/60 rounded-lg py-2">
                            <span class="font-serif text-xl text-primary font-bold" id="mins-val">00</span>
                            <span class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Menit</span>
                        </div>
                        <div class="flex flex-col items-center bg-surface-container-high/60 rounded-lg py-2">
                            <span class="font-serif text-xl text-primary font-bold" id="secs-val">00</span>
                            <span class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Detik</span>
                        </div>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($heading . ' - ' . $celebrantName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Sweet Seventeen Celebration of ' . $celebrantName) }}&location={{ urlencode($venueName . ', ' . $venueAddress) }}" target="_blank" rel="noopener noreferrer" class="w-full py-3 px-4 rounded-full bg-secondary-container text-on-secondary-container text-xs uppercase tracking-wider font-bold flex items-center justify-center gap-2 shadow-sm active:scale-95 transition-transform">
                    <span class="material-symbols-outlined text-[18px]">event_upcoming</span>
                    <span>Simpan ke Google Calendar</span>
                </a>
            </section>

            <!-- SECTION 4: THEME & DRESS CODE -->
            <section class="bg-surface-container-low rounded-2xl p-5 shadow-sm border border-outline-variant/30 space-y-4">
                <div class="flex items-center gap-2 mb-1">
                    <span class="material-symbols-outlined text-primary text-[22px]">styler</span>
                    <h4 class="font-serif text-lg text-on-surface font-semibold">Tema & Tata Busana</h4>
                </div>
                <div>
                    <span class="text-xs text-secondary uppercase tracking-widest block mb-0.5 font-bold">Tema Malam</span>
                    <p class="font-serif text-base text-primary italic">Aura Soleil: A Night of Radiant Warmth & Golden Glamour</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant uppercase tracking-widest block mb-2 font-semibold">Palet Warna Undangan</span>
                    <div class="flex items-center gap-2">
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full h-8 rounded-lg bg-[#C85A32] shadow-sm mb-1"></div>
                            <span class="text-[10px] text-on-surface-variant">Terracotta</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full h-8 rounded-lg bg-[#FF7A30] shadow-sm mb-1"></div>
                            <span class="text-[10px] text-on-surface-variant">Tangerine</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full h-8 rounded-lg bg-[#FED65B] shadow-sm mb-1"></div>
                            <span class="text-[10px] text-on-surface-variant">Champagne</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full h-8 rounded-lg bg-[#251916] shadow-sm mb-1"></div>
                            <span class="text-[10px] text-on-surface-variant">Midnight</span>
                        </div>
                    </div>
                </div>

                <!-- Detail Busana -->
                <div class="grid grid-cols-2 gap-3 text-left pt-1">
                    <div class="bg-surface-container rounded-xl p-3 border border-outline-variant/20">
                        <div class="flex items-center gap-1.5 text-primary mb-1">
                            <span class="material-symbols-outlined text-[16px]">man</span>
                            <span class="text-xs font-bold uppercase">Pria</span>
                        </div>
                        <p class="text-xs text-on-surface-variant leading-snug">
                            Formal Suit, Black Tie Tuxedo, atau Batik Sutra Lengan Panjang.
                        </p>
                    </div>
                    <div class="bg-surface-container rounded-xl p-3 border border-outline-variant/20">
                        <div class="flex items-center gap-1.5 text-primary mb-1">
                            <span class="material-symbols-outlined text-[16px]">woman</span>
                            <span class="text-xs font-bold uppercase">Wanita</span>
                        </div>
                        <p class="text-xs text-on-surface-variant leading-snug">
                            Glamorous Evening Gown bernuansa Sunset Orange, Gold, atau Champagne.
                        </p>
                    </div>
                </div>
            </section>

            <!-- SECTION 5: MOMENTS GALLERY -->
            <section class="space-y-3">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-secondary font-bold block">Galeri Kenangan</span>
                        <h4 class="font-serif text-lg text-on-surface font-semibold">Her Journey to 17</h4>
                    </div>
                    <span class="material-symbols-outlined text-primary text-[22px]">collections_bookmark</span>
                </div>

                <div id="previewGalleryGrid" class="grid grid-cols-2 gap-2.5">
                    @if(isset($activeGalleries[0]))
                    <div class="col-span-2 relative rounded-2xl overflow-hidden shadow-md aspect-[16/9] border border-outline-variant/30">
                        <img alt="Hero gallery" class="w-full h-full object-cover object-center" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($activeGalleries[0]->image ?? null, $coverImg) }}"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-3">
                            <p class="font-serif text-sm text-surface font-medium">{{ $activeGalleries[0]->caption ?? 'Golden Hour Elegance • 2025' }}</p>
                        </div>
                    </div>
                    @endif

                    @foreach($activeGalleries->slice(1) as $idx => $gal)
                    <div class="relative rounded-2xl overflow-hidden shadow-sm aspect-square bg-surface-container-high border border-outline-variant/30">
                        <img class="w-full h-full object-cover" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? null, $coverImg) }}" alt="Gallery item"/>
                        <div class="absolute bottom-1 right-1 bg-surface-container-lowest/80 backdrop-blur-sm rounded-full p-1 text-primary">
                            <span class="material-symbols-outlined text-[14px] block">fullscreen</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- SECTION 6: VENUE & LOCATION (NO MAP DENAH / BUTTON DIRECT ACTION) -->
            <section class="bg-surface-container-low rounded-2xl p-5 shadow-sm flex flex-col gap-3.5 border border-outline-variant/30">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[22px]">location_on</span>
                    <div>
                        <span class="text-xs uppercase tracking-widest text-secondary font-bold block">Lokasi Perayaan</span>
                        <h4 id="previewVenueNameMain" class="font-serif text-lg text-on-surface font-semibold">{{ $venueName }}</h4>
                    </div>
                </div>

                <p id="previewVenueAddressMain" class="text-sm text-on-surface-variant leading-relaxed">
                    {{ $venueAddress }}
                </p>

                <!-- Direct Navigation Action Buttons (No Static Map Denah Image) -->
                <div class="flex flex-col gap-2.5 pt-1">
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="py-3 px-4 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs uppercase tracking-wider text-center flex items-center justify-center gap-2 shadow-md active:scale-95 transition-all font-semibold">
                        <span class="material-symbols-outlined text-[18px]">directions</span>
                        <span>Buka Petunjuk Arah (Google Maps)</span>
                    </a>

                    <button type="button" class="py-2.5 px-4 rounded-full bg-surface-container-highest text-on-surface text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 active:scale-95 transition-all font-semibold" onclick="navigator.clipboard.writeText('{{ addslashes($venueName . ', ' . $venueAddress) }}'); showToast('Alamat berhasil disalin ke clipboard!');">
                        <span class="material-symbols-outlined text-[16px]">content_copy</span>
                        <span>Salin Alamat Lengkap</span>
                    </button>
                </div>
            </section>

            <!-- SECTION 7: RSVP & INTERACTIVE WISHES BOARD -->
            <section class="space-y-4">
                <div class="bg-surface-container rounded-2xl p-5 shadow-sm border border-outline-variant/30">
                    <div class="text-center mb-4">
                        <span class="text-xs uppercase tracking-widest text-secondary block mb-1 font-bold">Konfirmasi Kehadiran</span>
                        <h4 class="font-serif text-xl text-primary font-semibold">RSVP Undangan</h4>
                        <p class="text-xs text-on-surface-variant">Mohon konfirmasi kehadiran Anda untuk perayaan sweet seventeen ini.</p>
                    </div>

                    <form class="flex flex-col gap-3" onsubmit="event.preventDefault(); document.getElementById('rsvp-alert').classList.remove('hidden'); showToast('RSVP terkirim!');">
                        <div>
                            <label class="text-xs uppercase text-on-surface-variant block mb-1 font-semibold">Nama Lengkap</label>
                            <input class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-xl text-sm outline-none shadow-sm border border-outline-variant/30" required="" type="text" value="{{ $guestName }}"/>
                        </div>
                        <div>
                            <label class="text-xs uppercase text-on-surface-variant block mb-1 font-semibold">Jumlah Tamu</label>
                            <select class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-xl text-sm outline-none shadow-sm border border-outline-variant/30">
                                <option>1 Orang (Hadir Sendiri)</option>
                                <option selected>2 Orang (Jonathan & Partner)</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-xs uppercase text-on-surface-variant block mb-1 font-semibold">Konfirmasi Kehadiran</label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="flex items-center gap-2 p-2.5 rounded-xl bg-surface-container-lowest cursor-pointer shadow-sm border border-outline-variant/20">
                                    <input checked="" class="accent-primary" name="attendance" type="radio" value="hadir"/>
                                    <span class="text-xs uppercase font-medium">Pasti Hadir</span>
                                </label>
                                <label class="flex items-center gap-2 p-2.5 rounded-xl bg-surface-container-lowest cursor-pointer shadow-sm border border-outline-variant/20">
                                    <input class="accent-primary" name="attendance" type="radio" value="absen"/>
                                    <span class="text-xs uppercase font-medium">Berhalangan</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs uppercase text-on-surface-variant block mb-1 font-semibold">Ucapan & Doa Restu</label>
                            <textarea class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-xl text-sm outline-none shadow-sm resize-none border border-outline-variant/30" placeholder="Tuliskan doa serta harapan terindah untuk {{ $celebrantName }}..." rows="3"></textarea>
                        </div>
                        <button class="w-full py-3.5 mt-1 rounded-full bg-gradient-to-r from-primary to-primary-container text-on-primary text-xs uppercase tracking-wider font-semibold flex items-center justify-center gap-2 shadow-md active:scale-95 transition-all" type="submit">
                            <span class="material-symbols-outlined text-[18px]">send</span>
                            <span>Kirim Konfirmasi & Ucapan</span>
                        </button>
                    </form>

                    <div class="hidden mt-3 p-3 rounded-xl bg-secondary-container text-on-secondary-container text-center text-xs tracking-wide font-medium" id="rsvp-alert">
                        Terima kasih! Konfirmasi dan doa indah Anda telah tersimpan dengan hangat. ✨
                    </div>
                </div>

                <!-- Wishes Feed -->
                <div class="bg-surface-container-low rounded-2xl p-5 shadow-sm border border-outline-variant/30 space-y-3">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-tertiary-container text-[20px]">favorite</span>
                            <h4 class="font-serif text-base text-on-surface font-semibold">Untaian Doa & Harapan</h4>
                        </div>
                        <span class="text-[11px] text-secondary uppercase tracking-widest font-bold">Terbaru</span>
                    </div>

                    <div class="flex flex-col gap-2.5">
                        <div class="p-3.5 rounded-xl bg-surface-container-lowest shadow-sm border border-outline-variant/20">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-serif text-sm text-primary font-semibold">Valencia & Fam</span>
                                <span class="text-[10px] text-on-surface-variant">10 Menit lalu</span>
                            </div>
                            <p class="text-xs text-on-surface leading-relaxed">
                                Happy sweet 17th {{ $celebrantName }} tersayang! May your seventeen shine as bright as your golden dress. Can’t wait to celebrate with you tonight! ✨🥂
                            </p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-surface-container-lowest shadow-sm border border-outline-variant/20">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-serif text-sm text-primary font-semibold">Kevin Sanjaya</span>
                                <span class="text-[10px] text-on-surface-variant">1 Jam lalu</span>
                            </div>
                            <p class="text-xs text-on-surface leading-relaxed">
                                Selamat ulang tahun ke-17 {{ $celebrantName }}! Sukses selalu dalam studi dan cita-citanya, tetap jadi pribadi yang ceria dan penuh kehangatan.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 8: DIGITAL GIFT REGISTRY -->
            <section class="bg-surface-container-high rounded-2xl p-5 shadow-sm text-center border border-outline-variant/30">
                <div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed mx-auto mb-2 flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">redeem</span>
                </div>
                <h4 class="font-serif text-lg text-primary font-semibold mb-1">Tanda Kasih & Hadiah Digital</h4>
                <p class="text-xs text-on-surface-variant max-w-xs mx-auto mb-4 leading-relaxed">
                    Doa restu Anda adalah anugerah terbesar bagi kami. Namun jika Anda berkenan memberikan tanda kasih digital untuk tabungan masa depan {{ $celebrantName }}:
                </p>

                <div class="space-y-2.5">
                    <!-- Bank 1 -->
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 shadow-sm flex items-center justify-between border border-outline-variant/20">
                        <div class="text-left">
                            <span class="text-[10px] text-secondary uppercase tracking-widest font-bold block">{{ $bankName1 }}</span>
                            <span class="font-serif text-lg text-on-surface font-bold tracking-wider">{{ $bankAccount1 }}</span>
                            <span class="text-xs text-on-surface-variant block">a.n. {{ $bankHolder1 }}</span>
                        </div>
                        <button class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center active:scale-95 transition-transform" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount1) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[18px]">copy_all</span>
                        </button>
                    </div>

                    <!-- Bank 2 -->
                    @if(!empty($bankAccount2))
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 shadow-sm flex items-center justify-between border border-outline-variant/20">
                        <div class="text-left">
                            <span class="text-[10px] text-secondary uppercase tracking-widest font-bold block">{{ $bankName2 }}</span>
                            <span class="font-serif text-lg text-on-surface font-bold tracking-wider">{{ $bankAccount2 }}</span>
                            <span class="text-xs text-on-surface-variant block">a.n. {{ $bankHolder2 }}</span>
                        </div>
                        <button class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center active:scale-95 transition-transform" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount2) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[18px]">copy_all</span>
                        </button>
                    </div>
                    @endif
                </div>
            </section>

            <!-- SECTION 9: CLOSING & ELEGANT FOOTER -->
            <footer class="pb-8 text-center flex flex-col items-center">
                <div class="w-12 h-12 mb-2">
                    <img alt="Emblem Aura Soleil XVII" class="w-full h-full object-contain filter drop-shadow-sm opacity-90" src="{{ $monogramImg }}"/>
                </div>
                <p class="font-serif text-xl text-primary font-semibold italic mb-1">
                    Sampai Berjumpa di Malam Cahaya
                </p>
                <p class="text-xs text-on-surface-variant mb-3 max-w-xs">
                    Merupakan sebuah sukacita tak terhingga menyambut kehadiran Anda.
                </p>
                <span id="previewGroomNameClosing" class="text-xs uppercase tracking-[0.2em] text-secondary font-bold">
                    — {{ $celebrantName }} & {{ $familyLine }} —
                </span>
                <span class="text-[9px] text-outline uppercase tracking-[0.25em] mt-3">#AuraSoleilXVII • D'Karsa Digital</span>
            </footer>
        </main>

        <!-- Sticky Bottom Navigation Bar (Centered within max-w-md frame) -->
        <nav class="fixed bottom-0 inset-x-0 z-40 bg-surface/90 backdrop-blur-xl shadow-[0_-4px_20px_rgba(200,90,50,0.06)] border-t border-outline-variant/30">
            <div class="h-16 max-w-md mx-auto px-2 flex items-center justify-around">
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-primary font-bold" href="#">
                    <span class="material-symbols-outlined text-[20px]">mark_email_read</span>
                    <span class="text-[9px] uppercase tracking-wider">Undangan</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#previewEventDate">
                    <span class="material-symbols-outlined text-[20px]">event</span>
                    <span class="text-[9px] uppercase tracking-wider">Acara</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#previewVenueNameMain">
                    <span class="material-symbols-outlined text-[20px]">near_me</span>
                    <span class="text-[9px] uppercase tracking-wider">Lokasi</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#rsvp-alert">
                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                    <span class="text-[9px] uppercase tracking-wider">Ucapan</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Scripts: Open Cover, Audio, Countdown, Toast & PostMessage -->
    <script>
        const coverEl = document.getElementById('invitation-cover');
        const mainEl = document.getElementById('main-invitation-wrapper');
        const openBtn = document.getElementById('openInvitationBtn');
        const sealBtn = document.getElementById('waxSealBtn');
        const audioEl = document.getElementById('invitationAudio');
        let isAudioPlaying = false;

        function openInvitation() {
            if (!coverEl || !mainEl) return;

            if (audioEl) {
                audioEl.play().then(() => {
                    isAudioPlaying = true;
                    updateAudioIcons(true);
                }).catch(() => {
                    isAudioPlaying = false;
                    updateAudioIcons(false);
                });
            }

            coverEl.classList.add('opacity-0', 'pointer-events-none', '-translate-y-8');
            setTimeout(() => {
                coverEl.classList.add('hidden');
                coverEl.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
                mainEl.classList.remove('opacity-0');
            }, 500);
        }
        window.openInvitation = openInvitation;

        if (openBtn) openBtn.addEventListener('click', openInvitation);
        if (sealBtn) sealBtn.addEventListener('click', openInvitation);

        function updateAudioIcons(playing) {
            const hIcon = document.getElementById('headerMusicIcon');
            if (hIcon) {
                hIcon.textContent = playing ? 'music_note' : 'music_off';
                if (playing) hIcon.classList.add('animate-pulse');
                else hIcon.classList.remove('animate-pulse');
            }
        }

        const headerMusicToggle = document.getElementById('headerMusicToggle');
        if (headerMusicToggle && audioEl) {
            headerMusicToggle.addEventListener('click', () => {
                if (isAudioPlaying) {
                    audioEl.pause();
                    isAudioPlaying = false;
                    updateAudioIcons(false);
                } else {
                    audioEl.play().then(() => {
                        isAudioPlaying = true;
                        updateAudioIcons(true);
                    }).catch(console.warn);
                }
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');
            if (toast && toastMsg) {
                toastMsg.innerText = msg;
                toast.classList.remove('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'pointer-events-none');
                }, 2500);
            }
        }

        // Live Countdown Logic
        (function() {
            const target = new Date("{{ $targetDate->format('Y-m-d\TH:i:s') }}").getTime();
            function updateCountdown() {
                const now = new Date().getTime();
                const diff = target - now;

                if (diff > 0) {
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const secs = Math.floor((diff % (1000 * 60)) / 1000);

                    const dEl = document.getElementById('days-val');
                    const hEl = document.getElementById('hours-val');
                    const mEl = document.getElementById('mins-val');
                    const sEl = document.getElementById('secs-val');

                    if (dEl) dEl.innerText = String(days).padStart(2, '0');
                    if (hEl) hEl.innerText = String(hours).padStart(2, '0');
                    if (mEl) mEl.innerText = String(mins).padStart(2, '0');
                    if (sEl) sEl.innerText = String(secs).padStart(2, '0');
                }
            }
            setInterval(updateCountdown, 1000);
            updateCountdown();
        })();

        // Default Fallback Assets
        const defaultCoverImg = "{{ $coverImg }}";
        const defaultProfileImg = "{{ $profileImg }}";

        // Dynamic Gallery Renderer for Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !Array.isArray(images) || images.length === 0) return;
            grid.innerHTML = '';

            const firstImg = images[0];
            const topCard = document.createElement('div');
            topCard.className = 'col-span-2 relative rounded-2xl overflow-hidden shadow-md aspect-[16/9] border border-outline-variant/30';
            topCard.innerHTML = `
                <img alt="Hero gallery" class="w-full h-full object-cover object-center dynamic-gal-hero"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-3">
                    <p class="font-serif text-sm text-surface font-medium">Golden Hour Elegance • 2025</p>
                </div>
            `;
            const heroImg = topCard.querySelector('.dynamic-gal-hero');
            if (heroImg) heroImg.src = firstImg;
            grid.appendChild(topCard);

            if (images.length > 1) {
                images.slice(1).forEach((imgUrl, idx) => {
                    const item = document.createElement('div');
                    item.className = 'relative rounded-2xl overflow-hidden shadow-sm aspect-square bg-surface-container-high border border-outline-variant/30';
                    item.innerHTML = `
                        <img class="w-full h-full object-cover dynamic-gal-item" alt="Gallery item ${idx + 2}"/>
                        <div class="absolute bottom-1 right-1 bg-surface-container-lowest/80 backdrop-blur-sm rounded-full p-1 text-primary">
                            <span class="material-symbols-outlined text-[14px] block">fullscreen</span>
                        </div>
                    `;
                    const itemImg = item.querySelector('.dynamic-gal-item');
                    if (itemImg) itemImg.src = imgUrl;
                    grid.appendChild(item);
                });
            }
        }

        function escapeHtml(text) {
            if (!text) return '';
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        // Dynamic Events / Agenda Sesi Renderer for Live Preview Synchronization
        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = '';
            events.forEach((ev, idx) => {
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(' - ') || 'Waktu akan dikonfirmasi';
                const dateStr = ev.date || "{{ $eventDateFormatted }}";
                const venueStr = ev.venue_name || "{{ $venueName }}";
                const addressStr = ev.address || '';
                const mapsUrl = ev.maps_url || "{{ $mapsUrl }}";

                const card = document.createElement('div');
                card.className = 'bg-surface-container-low rounded-xl p-4 border border-outline-variant/30 shadow-sm flex flex-col gap-2.5';
                card.innerHTML = `
                    <div class="flex items-center justify-between gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] uppercase font-bold tracking-wider">
                            <span class="material-symbols-outlined text-[13px]">celebration</span>
                            Sesi ${idx + 1}
                        </span>
                        <span class="text-xs text-primary font-bold">${timeStr}</span>
                    </div>
                    <div>
                        <h4 class="font-serif text-lg text-primary font-semibold leading-snug">${escapeHtml(ev.title || ('Acara ' + (idx + 1)))}</h4>
                        <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-medium mt-1">
                            <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                            <span>${escapeHtml(dateStr)}</span>
                        </div>
                    </div>
                    <div class="bg-surface-container/70 rounded-lg p-2.5 flex items-start gap-2 border border-outline-variant/20">
                        <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                        <div class="min-w-0">
                            <span class="font-semibold text-xs text-on-surface block">${escapeHtml(venueStr)}</span>
                            ${addressStr ? `<p class="text-[11px] text-on-surface-variant mt-0.5 leading-relaxed">${escapeHtml(addressStr)}</p>` : ''}
                        </div>
                    </div>
                    ${mapsUrl ? `
                        <a href="${mapsUrl}" target="_blank" rel="noopener noreferrer" class="w-full py-2 px-3 rounded-lg bg-surface-container-highest hover:bg-primary hover:text-on-primary text-primary text-xs uppercase font-bold tracking-wider flex items-center justify-center gap-1.5 border border-outline-variant/30 transition-all">
                            <span class="material-symbols-outlined text-[15px]">directions</span>
                            <span>Petunjuk Arah Google Maps</span>
                        </a>
                    ` : ''}
                `;
                container.appendChild(card);
            });
        }

        // PostMessage for Builder Live Preview Synchronization
        window.addEventListener('message', function(event) {
            const data = event.data;
            if (!data || typeof data !== 'object') return;

            if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const val = data.value;

                if (field === 'groom_name' || field === 'name') {
                    const elCover = document.getElementById('previewGroomNameCover');
                    const elHero = document.getElementById('previewGroomNameHero');
                    const elClosing = document.getElementById('previewGroomNameClosing');
                    if (elCover) elCover.innerText = val || "{{ $celebrantName }}";
                    if (elHero) elHero.innerText = val || "{{ $celebrantName }}";
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

                if (field === 'venue_name') {
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
            } else if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl || data.url;

                if ((target === 'cover' || target === 'cover_photo') && photoUrl) {
                    const coverEl = document.getElementById('previewCoverPhotoImg') || document.getElementById('previewCoverPhoto');
                    if (coverEl) coverEl.src = photoUrl;
                } else if ((target === 'groom' || target === 'groom_photo' || target === 'bride' || target === 'star' || target === 'person' || !target) && photoUrl) {
                    const profileEl = document.getElementById('previewGroomPhotoImg') || document.getElementById('previewGroomPhoto');
                    if (profileEl) profileEl.src = photoUrl;
                    const headerPhotoEl = document.getElementById('previewGroomPhotoHeader');
                    if (headerPhotoEl) headerPhotoEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover' || target === 'cover_photo') {
                    const coverEl = document.getElementById('previewCoverPhotoImg') || document.getElementById('previewCoverPhoto');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'groom_photo' || target === 'bride' || target === 'star' || target === 'person' || !target) {
                    const profileEl = document.getElementById('previewGroomPhotoImg') || document.getElementById('previewGroomPhoto');
                    if (profileEl) profileEl.src = defaultProfileImg;
                    const headerPhotoEl = document.getElementById('previewGroomPhotoHeader');
                    if (headerPhotoEl) headerPhotoEl.src = defaultProfileImg;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_EVENTS') {
                const evs = data.events;
                if (Array.isArray(evs)) {
                    renderDynamicEvents(evs);
                }
            } else if (data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            }
        });

        // Notify parent iframe
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'orange-energy' }, '*');
        }
    </script>
</body>
</html>
