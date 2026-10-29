<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'The 17th Annual Gala & Celebration') . ' - ' . ($couple->groom_name ?? 'Adrian Pratama') }} | D'Karsa</title>
    <meta name="description" content="Official Executive Milestone Dossier of {{ $couple->groom_name ?? 'Adrian Pratama' }} - Arctic Frost Gala."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Hanken+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Arctic Frost Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-low": "#0d1c32",
                        "on-primary-container": "#00725e",
                        "on-background": "#d6e3ff",
                        "on-secondary-fixed": "#0c1e25",
                        "secondary": "#b7c9d4",
                        "primary-fixed-dim": "#38debb",
                        "on-secondary-fixed-variant": "#384952",
                        "inverse-on-surface": "#233148",
                        "primary": "#ffffff",
                        "inverse-primary": "#006b58",
                        "secondary-container": "#384952",
                        "tertiary": "#ffffff",
                        "surface-bright": "#2c3951",
                        "outline-variant": "#3c4a45",
                        "on-primary": "#00382d",
                        "on-surface-variant": "#bacac3",
                        "background": "#041329",
                        "surface-tint": "#38debb",
                        "primary-container": "#5ffbd6",
                        "inverse-surface": "#d6e3ff",
                        "surface-container": "#112036",
                        "on-primary-fixed": "#002019",
                        "surface": "#041329",
                        "outline": "#85948e",
                        "tertiary-fixed": "#cfe5fb",
                        "surface-container-high": "#1c2a41",
                        "on-tertiary-container": "#516779",
                        "surface-container-highest": "#27354c",
                        "on-tertiary": "#1d3343",
                        "primary-fixed": "#5ffbd6",
                        "error": "#ffb4ab",
                        "secondary-fixed-dim": "#b7c9d4",
                        "on-error-container": "#ffdad6",
                        "secondary-fixed": "#d3e5f0",
                        "tertiary-fixed-dim": "#b3c9de",
                        "on-secondary-container": "#a6b8c2",
                        "error-container": "#93000a",
                        "on-error": "#690005",
                        "on-tertiary-fixed": "#051d2d",
                        "surface-dim": "#041329",
                        "on-secondary": "#22333b",
                        "surface-variant": "#27354c",
                        "surface-container-lowest": "#010e24",
                        "on-surface": "#d6e3ff",
                        "on-primary-fixed-variant": "#005142",
                        "on-tertiary-fixed-variant": "#34495a",
                        "tertiary-container": "#cfe5fb"
                    },
                    fontFamily: {
                        "bodoni": ["'Bodoni Moda'", "serif"],
                        "grotesk": ["'Hanken Grotesk'", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            background-color: #041329;
            overflow-x: hidden;
            font-family: 'Hanken Grotesk', sans-serif;
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

        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spinSlow 12s linear infinite;
        }

        @keyframes pulseSubtle {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.03); }
        }
        .animate-pulse-subtle {
            animation: pulseSubtle 2.5s ease-in-out infinite;
        }

        @keyframes floatGentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        .animate-float {
            animation: floatGentle 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-surface font-grotesk text-on-surface antialiased overflow-hidden">

    @php
        $celebrantName = $couple->groom_name ?? 'Adrian Pratama';
        $celebrantNick = $couple->groom_nickname ?? 'Adrian';
        $heading = $couple->event_heading ?? 'The 17th Annual Gala & Celebration';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet Seventeen Milestone';
        $guestName = $guest->name ?? request('to') ?? request('guest') ?? 'Bapak / Ibu / Rekan Terhormat';
        $quote = $couple->quote ?? 'A Glacial Journey to the Future — Merayakan kedewasaan, integritas visi, dan babak baru kepemimpinan dalam suasana keanggunan Arctic Frost.';

        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJ8VRzqgHLqjfaecEXxl_mqq2r5mo2T_pkyJQkpcYycDu2T4QqzjiF8ENab-zz8klUlMzMvOs5IsZu-qUy1ScQ8YcUxmNfUU3cO2Gb_6CLnK9t90fgbfBfjQgnsDVF0cfVbz90HF4sYqMDGIW2MOjP6OmS34tz8QstMKKZGR3kyxGXfUQKXF0GcmLFuYcldfg8XChTGmcl2RPdo7SJaoskAyQfFAM3CmnxQh5w7FyMASCV8m9RaexH4w';
        $profileImg = !empty($couple->groom_photo)
            ? (str_starts_with($couple->groom_photo, 'http') ? $couple->groom_photo : asset('storage/' . $couple->groom_photo))
            : (!empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : $defaultProfileImg);

        $monogramImg = 'https://lh3.googleusercontent.com/aida/AEtjO1UJUpqe7kwI82f89rVPFjoRotQBuE_eWNA8ge2rR6ngoHA2SDA0duRl8K915fouABleQiZ7w_8N-E4OKALYtzlZkg3YOYZy8vOxRTDeAlzHC-5JcZyKVg627ruaVn2Q0j7NnvEfFy-ctnk7MHG5N2IMOdSgfMDAc3HeGpNs8_gE1vnh5diM_jpIhzHZaqyxNiL24PkLEn960vck7wj07glGCnJSLTpmRqH222Cvf7TmKXoPMCwMYRX2-Mo5';
        $coverImg = !empty($couple->cover_photo)
            ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo))
            : $monogramImg;

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? $couple->wedding_time : '18:30 WIB';

        $venueName = $couple->venue_name ?? 'The Grand Glacial Ballroom';
        $venueAddress = $couple->venue_address ?? 'SCBD Area, Jl. Raya Gubeng No. 17, Gubeng, Surabaya, Jawa Timur 60281';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));

        $parentsLine = '';
        if (!empty($couple->groom_father) && !empty($couple->groom_mother)) {
            $parentsLine = 'Putra tercinta dari: Bpk. ' . $couple->groom_father . ' & Ibu ' . $couple->groom_mother;
        } elseif (!empty($couple->groom_parents)) {
            $parentsLine = 'Putra tercinta dari: ' . $couple->groom_parents;
        } else {
            $parentsLine = 'Putra tercinta dari: Bpk. Hendra Pratama & Ibu Maya Kusuma';
        }

        // Bank / Digital Gift Info
        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'BANK BCA';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->account_number ?? '8291 0028 47';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->account_name ?? 'Adrian Pratama';

        $bankName2 = $couple->bank_name_2 ?? 'MANDIRI / GOPAY';
        $bankAccount2 = $couple->bank_account_2 ?? '0812 8847 2901';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Adrian Pratama';

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBOSbGYrZi6bIUxaZPZ8pINMIyDtZU3knnTegFBpNDxpXXICxDrrnbwb-9hZ8YhqsfwwcbaeXG02jfh8GNMQC-lMxvPZVYAbaLcaUkSK0dVO3loMshFz2KBtBeIvIBr72B9fDLST-zMTRETM7CJ9ndTwVHnrwlmnX85-3ecK1XNqPvBfOw0X8F5wLK9UPGnXfqI6iApK9s0i2sqygTXBZZXe3Q8x2OLRn_qIbPRfCK8JJk4J7xQ1AvIKw', 'caption' => 'Leadership 2024 • National Youth Forum'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA2iVptu0fF7s4g1x3ofqyegFOnWi0wsmSf-DDTXcPt-_e1zG4oapg9dVK5hClwJkBsffWLzM7dLegAyQLamgIRzQmFd19JdqFxPEhjStucDQpvqGj09oAMsCQdWnwSFhtH81po5YHU8SnYzkvMhDxM6_OBS62y6E5TES9pkudifH1OFW2h4dbAs3koL0blv48N3lgx55kiIQSmTQhdL8zQijrPgz8eq-2wPRyiJjiNemVI9zSrzoXKjA', 'caption' => 'The Arts • Classical Piano Recital'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBQ7s1xhuVDh-gABIxHizq3wwBT_cJ7FqtqqP6_qZouBXEbYBbjqf0TR_dpMAQZWv_GIWHzmNl_CmtI-SASpUH52ZTYZUWq2d5p2Mecs4hxlG5c7fdUpdH7YCn0UyoHs1FzaXrhI8u92IW6ptMiqEQZqY9Y9qGDwCZgUZPVbCAYrngvOliU8bFpiXZdDFCS7yUv2tyYIBJOEieh8ysOBU2eh7kTYVipTqMxznWGxEf6LCK5lESM6Tt3wg', 'caption' => 'Innovation • Tech Venture Award'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB_So72324PZSAp_UrT5sJRsDKzLXk9bb46ik0Rf_EBDBvPsnz4SrsbJ9Utry8QjF16gMxKg0YOOoCWVHlfO3EQiEm1ODyhcKfKfDpPfB0ynxO-Nh_LXs_5K1_P8wbkGm9_Ybw-OPywHqwGJkU2kRyTywOj_gp7bIosbynaEO1l2beeYEofe8mabW-bMbGmdntqEpa3e22ivbRESUsUn8ilpSCqzKoz-Bk1GkNq9Rgc_yZiM_zWKnkSSw', 'caption' => 'Camaraderie • Cherished Friendships'],
            ]);
        }

        // Dynamic Events
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Red Carpet & Cocktail Reception',
                    'date' => $eventDateFormatted,
                    'start_time' => '18:30 WIB',
                    'end_time' => '19:30 WIB',
                    'venue_name' => 'Grand Foyer Level 4',
                    'address' => 'Penyambutan tamu kehormatan, sesi potret photo wall eksklusif, serta chilled canapé service.',
                ],
                (object)[
                    'title' => 'Opening Keynote & Birthday Toast',
                    'date' => $eventDateFormatted,
                    'start_time' => '19:30 WIB',
                    'end_time' => '20:15 WIB',
                    'venue_name' => 'Main Ballroom Stage',
                    'address' => 'Sambutan keluarga, penayangan retrospeksi 17 tahun, dan prosesi pemotongan kue simbolis.',
                ],
                (object)[
                    'title' => 'Dinner Banquet & Chamber Orchestra',
                    'date' => $eventDateFormatted,
                    'start_time' => '20:15 WIB',
                    'end_time' => '21:30 WIB',
                    'venue_name' => 'Glacial VIP Dining Area',
                    'address' => 'Executive fine dining 4-course menu diiringi aransemen klasik kontemporer.',
                ],
                (object)[
                    'title' => 'Networking, Photo Session & After-Party Chill',
                    'date' => $eventDateFormatted,
                    'start_time' => '21:30 WIB',
                    'end_time' => 'Selesai',
                    'venue_name' => 'Arctic Lounge & Terrace',
                    'address' => 'Sesi interaktif santai, obrolan sahabat karib, dan persembahan musik akustik modern.',
                ],
            ]);
        }
    @endphp

    <!-- Background Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Feedback Toast -->
    <div id="toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 max-w-xs px-4 py-2.5 rounded-xl bg-surface-container-high border border-primary-fixed/40 text-on-surface text-xs font-medium text-center opacity-0 pointer-events-none transition-opacity duration-300 z-[120] shadow-2xl flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-primary-fixed text-[18px]">verified</span>
        <span id="toast-message">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: DIGITAL ENVELOPE (Tampilan Awal Eksklusif)
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-surface flex flex-col items-center justify-between px-3 sm:px-4 py-2.5 sm:py-4 transition-all duration-700 ease-in-out select-none">
        <!-- Ambient Glacial Shimmer Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-80 h-80 bg-primary-fixed/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/3 -right-20 w-64 h-64 bg-surface-container-highest/60 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-primary-fixed/5 rounded-full blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header Milestone Hierarchy -->
            <header class="relative z-10 w-full flex flex-col items-center text-center space-y-0.5 mb-0.5 max-w-sm shrink-0">
                <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-high/80 backdrop-blur-md shadow-sm border border-primary-fixed/20">
                    <span class="material-symbols-outlined text-primary-fixed text-xs">ac_unit</span>
                    <span class="text-[9px] text-primary-fixed uppercase tracking-widest font-semibold">Executive Milestone Dossier</span>
                </div>
                <p class="text-[9.5px] text-secondary tracking-widest uppercase mt-0.5">
                    {{ $heading }}
                </p>
                <h1 id="previewGroomNameCover" class="font-bodoni text-xl sm:text-2xl text-primary tracking-tight font-medium truncate mt-0.5">
                    {{ $celebrantName }}
                </h1>
            </header>

            <!-- Center Showcase (Monogram & Guest Card) -->
            <section class="relative z-10 w-full max-w-sm flex flex-col items-center my-auto py-0.5">
                <!-- Silver Wax Monogram Seal -->
                <div class="relative w-16 h-16 sm:w-18 sm:h-18 my-0.5 flex items-center justify-center rounded-full bg-surface-container-low p-1 shadow-lg group shrink-0">
                    <div class="absolute inset-0 rounded-full bg-primary-fixed/20 blur-sm"></div>
                    <img id="previewCoverPhotoImg" alt="Arctic Frost Gala Monogram" class="relative z-10 w-full h-full object-cover rounded-full ring-1 ring-primary-fixed/40" src="{{ $coverImg }}"/>
                </div>
                <span class="font-bodoni text-xs text-primary font-semibold mt-0.5">
                    XVII Arctic Summit
                </span>

                <!-- Dedicated Guest Name Card Badge -->
                <div class="w-full rounded-xl bg-surface-container-lowest/90 backdrop-blur-md p-2 flex flex-col space-y-0.5 text-center my-0.5 shadow-sm border border-outline-variant/20">
                    <span class="text-[8px] uppercase tracking-wider font-semibold text-on-surface-variant block">
                        Kepada Yth. Tamu Terhormat:
                    </span>
                    <h2 class="font-bodoni text-base text-primary font-semibold truncate" id="previewGuestNameCover">
                        {{ $guestName }}
                    </h2>
                    <span class="inline-block text-[7.5px] text-primary-fixed bg-surface-container-high px-2 py-0.5 rounded-full mx-auto border border-primary-fixed/20">
                        Confirmed Delegation Access
                    </span>
                </div>
            </section>

            <!-- Primary CTA Trigger "Buka Undangan" -->
            <footer class="w-full flex flex-col items-center gap-0.5 pt-0.5 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full relative flex items-center justify-center space-x-2 bg-primary-fixed hover:bg-primary-container text-on-primary-fixed py-2.5 px-4 rounded-xl text-xs font-semibold uppercase tracking-wider shadow-[0_10px_25px_-5px_rgba(95,251,214,0.35)] active:scale-95 transition-all duration-200 overflow-hidden cursor-pointer group pointer-events-auto">
                    <span class="material-symbols-outlined text-[16px]">drafts</span>
                    <span class="font-bold">Buka Undangan</span>
                    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </button>
                <p class="text-[9px] text-secondary text-center flex items-center justify-center gap-1 font-medium">
                    <span class="material-symbols-outlined text-[12px] text-primary-fixed">volume_up</span>
                    <span>Musik latar otomatis diputar</span>
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTENT WRAPPER (Terkunci Awal)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="hidden opacity-0 transition-opacity duration-700 w-full relative">
        <div class="min-h-screen max-w-md mx-auto relative flex flex-col bg-surface shadow-2xl overflow-x-hidden border-x border-surface-container-high">

            <!-- Fixed Top Header Bar (Centered in max-w-md) -->
            <header class="fixed top-0 max-w-md w-full left-1/2 -translate-x-1/2 z-40 bg-surface/90 backdrop-blur-xl border-b border-outline-variant/30 shadow-md">
                <div class="h-14 px-3 sm:px-4 flex items-center justify-between">
                    <div class="flex items-center gap-2 min-w-0">
                        <img alt="Arctic Frost Monogram" class="h-7 w-auto object-contain rounded-full ring-1 ring-primary-fixed/30 shrink-0" src="{{ $monogramImg }}"/>
                        <div class="flex flex-col min-w-0">
                            <span class="text-[9px] text-primary-fixed uppercase tracking-widest leading-none font-semibold">The Executive Gala</span>
                            <span class="font-bodoni text-xs sm:text-sm text-on-surface truncate font-semibold">Main Invitation Dossier</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <button id="header-music-btn" type="button" onclick="toggleMusic()" aria-label="Toggle Musik" class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-primary-fixed shadow-sm active:scale-95 transition-transform hover:bg-surface-bright cursor-pointer border border-primary-fixed/20">
                            <span id="header-music-icon" class="material-symbols-outlined text-[17px] animate-spin-slow">music_note</span>
                        </button>
                        <div class="w-8 h-8 rounded-full overflow-hidden ring-1 ring-primary-fixed/40">
                            <img alt="Profile" class="w-full h-full object-cover" src="{{ $profileImg }}"/>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Scrollable Area -->
            <main class="flex-1 w-full bg-surface pt-14 pb-24 flex flex-col">
                <div class="relative w-full overflow-hidden px-3 sm:px-4 flex flex-col gap-6 pt-4">

                    <!-- SECTION 1: Personal Guest Salutation & Hero Dossier -->
                    <section class="flex flex-col gap-4">
                        <!-- Formal VIP Salutation Pill -->
                        <div class="w-full bg-surface-container-low/95 rounded-full px-3 py-2 shadow-md flex items-center justify-between border border-primary-fixed/20">
                            <div class="flex items-center gap-2 min-w-0">
                                <span class="material-symbols-outlined text-primary-fixed text-[18px] shrink-0">verified</span>
                                <div class="flex flex-col min-w-0">
                                    <span class="text-[9px] text-secondary uppercase tracking-widest leading-none">VIP Protocol Invitation</span>
                                    <span class="text-xs text-on-surface truncate font-medium">Kepada Yth: <strong id="previewGuestNameMain" class="text-white">{{ $guestName }}</strong></span>
                                </div>
                            </div>
                            <span class="bg-primary-fixed/15 text-primary-fixed text-[9.5px] px-2 py-0.5 rounded-full shrink-0 tracking-widest font-semibold uppercase border border-primary-fixed/30">Exclusive</span>
                        </div>

                        <!-- Main Host Portrait Card with Frosted Architecture -->
                        <div class="relative w-full rounded-3xl bg-surface-container/70 shadow-2xl p-4 sm:p-5 flex flex-col items-center text-center overflow-hidden border border-outline-variant/30">
                            <!-- Ambient cyan crystal glow behind portrait -->
                            <div class="absolute -top-12 inset-x-12 h-36 bg-primary-fixed/15 blur-2xl rounded-full pointer-events-none"></div>

                            <!-- Celebrant Portrait Framed -->
                            <div class="relative w-40 h-40 sm:w-44 sm:h-44 rounded-full overflow-hidden shadow-2xl mt-1 mb-3 bg-surface-container-high border-2 border-primary-fixed/30 group">
                                <img id="previewGroomPhotoImg" alt="{{ $celebrantName }}" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="{{ $profileImg }}"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-background/70 via-transparent to-transparent pointer-events-none"></div>
                            </div>

                            <!-- Typography Badge & Headline -->
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high/80 text-primary-fixed-dim text-[10px] tracking-widest uppercase mb-1.5 border border-primary-fixed/20 font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-fixed animate-ping"></span>
                                <span id="previewSubCategoryBadge">{{ $subCategoryBadge }}</span>
                            </div>

                            <h1 id="previewGroomName" class="font-bodoni text-2xl sm:text-3xl text-primary tracking-tight uppercase leading-none mb-1 font-bold">
                                {{ $celebrantName }}
                            </h1>
                            <h2 id="previewEventHeading" class="font-bodoni text-base sm:text-lg text-primary-fixed tracking-wide italic font-normal mb-2">
                                {{ !empty($couple->event_heading) ? $couple->event_heading : 'Executive Gala & Celebration' }}
                            </h2>

                            <p id="previewEventQuote" class="text-xs text-secondary max-w-xs tracking-normal leading-relaxed mb-3">
                                {{ $quote }}
                            </p>

                            <p class="text-[11px] text-outline italic mb-3">
                                {{ $parentsLine }}
                            </p>

                            <!-- Event Date Chip -->
                            <div class="w-full bg-surface-container-highest/60 rounded-xl px-3 py-2 flex items-center justify-center gap-2 border border-outline-variant/20">
                                <span class="material-symbols-outlined text-primary-fixed text-[18px]">calendar_month</span>
                                <span class="text-xs sm:text-sm text-on-surface font-semibold tracking-wide">
                                    {{ $eventDateFormatted }}
                                </span>
                                <span class="text-xs text-secondary">| {{ $eventTimeFormatted }}</span>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 2: Live Glacial Countdown Timer -->
                    <section class="flex flex-col gap-2">
                        <div class="flex items-center justify-between px-1">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-primary-fixed text-[18px]">schedule</span>
                                <h3 class="text-xs text-on-surface uppercase tracking-widest font-bold">Hitung Mundur Acara</h3>
                            </div>
                            <span class="text-[10px] text-secondary tracking-widest uppercase">Waktu Indonesia Barat</span>
                        </div>

                        <!-- 4-Grid Countdown Modular Blocks -->
                        <div class="grid grid-cols-4 gap-2 w-full" id="countdown-wrapper">
                            <div class="bg-surface-container-high/90 rounded-xl p-2.5 flex flex-col items-center justify-center shadow-lg relative overflow-hidden border border-outline-variant/20">
                                <div class="absolute inset-x-0 top-0 h-0.5 bg-primary-fixed/40"></div>
                                <span class="font-bodoni text-xl sm:text-2xl text-primary font-bold leading-tight" id="timer-days">00</span>
                                <span class="text-[10px] text-secondary uppercase tracking-widest mt-0.5">Hari</span>
                            </div>
                            <div class="bg-surface-container-high/90 rounded-xl p-2.5 flex flex-col items-center justify-center shadow-lg relative overflow-hidden border border-outline-variant/20">
                                <div class="absolute inset-x-0 top-0 h-0.5 bg-primary-fixed/40"></div>
                                <span class="font-bodoni text-xl sm:text-2xl text-primary font-bold leading-tight" id="timer-hours">00</span>
                                <span class="text-[10px] text-secondary uppercase tracking-widest mt-0.5">Jam</span>
                            </div>
                            <div class="bg-surface-container-high/90 rounded-xl p-2.5 flex flex-col items-center justify-center shadow-lg relative overflow-hidden border border-outline-variant/20">
                                <div class="absolute inset-x-0 top-0 h-0.5 bg-primary-fixed/40"></div>
                                <span class="font-bodoni text-xl sm:text-2xl text-primary font-bold leading-tight" id="timer-minutes">00</span>
                                <span class="text-[10px] text-secondary uppercase tracking-widest mt-0.5">Menit</span>
                            </div>
                            <div class="bg-surface-container-high/90 rounded-xl p-2.5 flex flex-col items-center justify-center shadow-lg relative overflow-hidden border border-outline-variant/20">
                                <div class="absolute inset-x-0 top-0 h-0.5 bg-primary-fixed/40"></div>
                                <span class="font-bodoni text-xl sm:text-2xl text-primary-fixed font-bold leading-tight animate-pulse" id="timer-seconds">00</span>
                                <span class="text-[10px] text-secondary uppercase tracking-widest mt-0.5">Detik</span>
                            </div>
                        </div>

                        <!-- Add to Google Calendar Button -->
                        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? ($subCategoryBadge . ' Celebration')) . ' - ' . $celebrantName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Perayaan ' . $subCategoryBadge . ' ' . $celebrantName) }}&location={{ urlencode($venueName . ', ' . $venueAddress) }}" target="_blank" rel="noopener noreferrer" class="w-full mt-1 py-2.5 px-4 rounded-xl bg-surface-container-low hover:bg-surface-container-high text-primary-fixed text-xs font-semibold uppercase tracking-wider flex items-center justify-center gap-2 border border-primary-fixed/20 shadow-sm active:scale-95 transition-all">
                            <span class="material-symbols-outlined text-[16px]">calendar_add_on</span>
                            <span>Simpan ke Google Calendar</span>
                        </a>
                    </section>

                    <!-- SECTION 3: Event Rundown / Agenda Korporat -->
                    <section class="flex flex-col gap-3" id="agenda-section">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Susunan Acara</span>
                            <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Agenda Korporat &amp; Perayaan</h3>
                        </div>

                        <div class="bg-surface-container-low/80 rounded-xl p-4 sm:p-5 shadow-xl flex flex-col gap-4 relative border border-outline-variant/20">
                            <!-- Vertical Timeline Rail -->
                            <div class="absolute left-6 top-8 bottom-8 w-0.5 bg-surface-container-highest"></div>

                            <div id="itineraryContainer" class="flex flex-col gap-4 relative z-10">
                            @foreach($activeEvents as $index => $event)
                                <div class="relative flex items-start gap-3 pl-3">
                                    <div class="w-3.5 h-3.5 rounded-full {{ $index === 0 ? 'bg-primary-fixed shadow-md shadow-primary-fixed/40 ring-4 ring-surface-container-low' : 'bg-surface-container-highest ring-4 ring-surface-container-low' }} shrink-0 mt-1"></div>
                                    <div class="flex flex-col min-w-0">
                                        <span class="text-[10px] {{ $index === 0 ? 'text-primary-fixed' : 'text-secondary' }} font-bold tracking-widest uppercase">
                                            {{ $event->start_time ?? '18:30 WIB' }} — {{ $event->end_time ?? 'Selesai' }}
                                        </span>
                                        <h4 class="text-xs sm:text-sm text-on-surface font-semibold mt-0.5">
                                            {{ $event->title }}
                                        </h4>
                                        <p class="text-[11px] text-secondary mt-0.5 leading-relaxed">
                                            {{ $event->address ?? $event->venue_name ?? 'Rangkaian acara perayaan istimewa.' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 4: Photo Gallery (Galeri Prestasi & Memori) -->
                    <section class="flex flex-col gap-3" id="gallery-section">
                        <div class="flex items-end justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Retrospeksi Perjalanan</span>
                                <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Galeri Prestasi &amp; Memori</h3>
                            </div>
                            <span class="text-[10px] text-secondary tracking-widest uppercase">{{ count($activeGalleries) }} Sorotan</span>
                        </div>

                        <!-- 2x2 Clean Image Grid -->
                        <div class="grid grid-cols-2 gap-2.5 w-full" id="previewGalleryGrid">
                            @foreach($activeGalleries as $gallery)
                                <div class="group relative rounded-xl overflow-hidden bg-surface-container-low shadow-lg flex flex-col border border-outline-variant/20">
                                    <div class="aspect-square w-full overflow-hidden bg-surface-container-highest">
                                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $gallery->caption ?? 'Milestone' }}" src="{{ $gallery->image }}"/>
                                    </div>
                                    <div class="p-2 sm:p-2.5 bg-surface-container flex flex-col">
                                        <span class="text-[9px] text-primary-fixed font-semibold uppercase tracking-wider truncate">
                                            {{ explode('•', $gallery->caption ?? 'Milestone')[0] }}
                                        </span>
                                        <p class="text-[11px] text-on-surface truncate mt-0.5">
                                            {{ isset(explode('•', $gallery->caption ?? 'Milestone')[1]) ? trim(explode('•', $gallery->caption ?? 'Milestone')[1]) : ($gallery->caption ?? 'Sweet 17th Memory') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- SECTION 5: Location, Venue & Dress Code -->
                    <section class="flex flex-col gap-3" id="venue-section">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Informasi Kehadiran</span>
                            <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Lokasi &amp; Ketentuan Acara</h3>
                        </div>

                        <div class="bg-surface-container-low rounded-xl p-4 shadow-xl flex flex-col gap-3.5 border border-outline-variant/20">
                            <!-- Venue Header & Title -->
                            <div class="flex items-center gap-3 bg-surface-container/60 p-3 rounded-lg border border-outline-variant/30">
                                <div class="w-10 h-10 rounded-full bg-primary-fixed/15 flex items-center justify-center text-primary-fixed shrink-0">
                                    <span class="material-symbols-outlined text-[20px]">location_on</span>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span id="previewVenueNameMain" class="font-bodoni text-sm sm:text-base font-bold text-primary truncate">{{ $venueName }}</span>
                                    <span class="text-[11px] text-secondary">Surabaya, Jawa Timur, Indonesia</span>
                                </div>
                            </div>

                            <!-- Address details -->
                            <div class="flex flex-col gap-0.5">
                                <span class="text-[10px] text-secondary uppercase tracking-widest font-semibold">Alamat Lengkap</span>
                                <p id="previewVenueAddressMain" class="text-xs text-on-surface leading-relaxed">
                                    {{ $venueAddress }}
                                </p>
                            </div>

                            <!-- Action Map Button -->
                            <div class="pt-0.5">
                                <a class="w-full bg-primary-fixed hover:bg-primary-container text-on-primary-fixed rounded-lg py-3 px-4 flex items-center justify-center gap-2 shadow-md hover:shadow-primary-fixed/20 active:scale-95 transition-all text-xs font-semibold uppercase tracking-wider cursor-pointer" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined text-[18px]">directions</span>
                                    <span>Buka Petunjuk Arah (Google Maps)</span>
                                </a>
                            </div>

                            <!-- Dress Code Notice Box -->
                            <div class="bg-surface-container/70 rounded-xl p-3 flex flex-col gap-1.5 shadow-sm border border-outline-variant/20">
                                <div class="flex items-center gap-1.5 text-primary-fixed">
                                    <span class="material-symbols-outlined text-[18px]">checkroom</span>
                                    <span class="text-[11px] uppercase tracking-widest font-bold">Ketentuan Dress Code</span>
                                </div>
                                <p class="text-xs text-on-surface leading-relaxed">
                                    <strong>Corporate Formal / Black-Tie Optional</strong> dengan palet warna resmi <span class="text-primary-fixed font-semibold">Arctic Frost</span>.
                                </p>
                                <div class="flex items-center gap-1.5 mt-1 flex-wrap">
                                    <span class="px-2.5 py-0.5 rounded-full bg-surface-container-highest text-secondary text-[10px] font-semibold tracking-wider border border-outline-variant/20">Midnight Navy</span>
                                    <span class="px-2.5 py-0.5 rounded-full bg-surface-container-highest text-secondary text-[10px] font-semibold tracking-wider border border-outline-variant/20">Refined Silver</span>
                                    <span class="px-2.5 py-0.5 rounded-full bg-surface-container-highest text-primary-fixed-dim text-[10px] font-semibold tracking-wider border border-primary-fixed/20">Glacial Ice Blue</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 6: Tanda Kasih & Kado Digital (Cashless Gifting) -->
                    <section class="flex flex-col gap-3" id="gift-section">
                        <div class="flex flex-col text-center">
                            <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Tanda Kasih &amp; Kado Digital</span>
                            <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Amplop Digital &amp; Bingkisan</h3>
                            <p class="text-xs text-secondary mt-1 leading-relaxed max-w-xs mx-auto">
                                Doa restu Anda merupakan karunia terindah. Namun jika ingin memberikan tanda kasih secara cashless, dapat disalurkan melalui rekening resmi:
                            </p>
                        </div>

                        <div class="space-y-3">
                            <!-- Account 1 -->
                            <div class="bg-surface-container-low rounded-xl p-4 shadow-xl border border-outline-variant/20 flex flex-col gap-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-primary-fixed uppercase tracking-wider">{{ $bankName1 }}</span>
                                    <span class="material-symbols-outlined text-secondary text-[20px]">account_balance_wallet</span>
                                </div>
                                <div class="flex items-center justify-between mt-1">
                                    <div>
                                        <p class="font-mono text-sm sm:text-base font-bold text-white tracking-wider" id="bank-acc-1">{{ $bankAccount1 }}</p>
                                        <p class="text-[11px] text-secondary">a.n {{ $bankHolder1 }}</p>
                                    </div>
                                    <button type="button" onclick="copyText('{{ $bankAccount1 }}', 'Nomor rekening {{ $bankName1 }} berhasil disalin')" class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-bright text-primary-fixed text-xs font-semibold flex items-center gap-1 border border-primary-fixed/20 active:scale-95 transition-all cursor-pointer">
                                        <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                        <span>Salin</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Account 2 -->
                            <div class="bg-surface-container-low rounded-xl p-4 shadow-xl border border-outline-variant/20 flex flex-col gap-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-primary-fixed uppercase tracking-wider">{{ $bankName2 }}</span>
                                    <span class="material-symbols-outlined text-secondary text-[20px]">payments</span>
                                </div>
                                <div class="flex items-center justify-between mt-1">
                                    <div>
                                        <p class="font-mono text-sm sm:text-base font-bold text-white tracking-wider" id="bank-acc-2">{{ $bankAccount2 }}</p>
                                        <p class="text-[11px] text-secondary">a.n {{ $bankHolder2 }}</p>
                                    </div>
                                    <button type="button" onclick="copyText('{{ $bankAccount2 }}', 'Nomor e-wallet / rekening berhasil disalin')" class="px-3 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-bright text-primary-fixed text-xs font-semibold flex items-center gap-1 border border-primary-fixed/20 active:scale-95 transition-all cursor-pointer">
                                        <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                        <span>Salin</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 7: RSVP & Attendance Confirmation Form -->
                    <section class="flex flex-col gap-3" id="rsvp-section">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Konfirmasi Kehadiran</span>
                            <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Reservasi Kursi VIP (RSVP)</h3>
                            <p class="text-xs text-secondary mt-0.5">Mohon konfirmasi kesediaan kehadiran Anda untuk alokasi protokol tempat duduk.</p>
                        </div>

                        <form class="bg-surface-container-low rounded-xl p-4 sm:p-5 shadow-2xl flex flex-col gap-3 border border-outline-variant/20" id="rsvp-form" onsubmit="event.preventDefault(); handleRSVPSubmit();">
                            <!-- Input: Nama Lengkap -->
                            <div class="flex flex-col gap-1">
                                <label class="text-[10px] text-secondary uppercase tracking-widest font-semibold" for="guest-name">Nama Lengkap Tamu *</label>
                                <input class="w-full bg-surface-container-highest/60 text-on-surface text-xs rounded-lg px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-primary-fixed border border-outline-variant/30 placeholder:text-outline" id="guest-name" value="{{ $guestName !== 'Bapak / Ibu / Rekan Terhormat' ? $guestName : '' }}" placeholder="Contoh: Bpk. Hendra Gunawan / Sarah Anindya" required="" type="text"/>
                            </div>

                            <!-- Input: Instansi / Hubungan -->
                            <div class="flex flex-col gap-1">
                                <label class="text-[10px] text-secondary uppercase tracking-widest font-semibold" for="guest-relation">Instansi / Hubungan *</label>
                                <input class="w-full bg-surface-container-highest/60 text-on-surface text-xs rounded-lg px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-primary-fixed border border-outline-variant/30 placeholder:text-outline" id="guest-relation" placeholder="Contoh: Rekan Korporasi / Sahabat Karib / Kerabat" required="" type="text"/>
                            </div>

                            <!-- Radio: Status Kehadiran -->
                            <div class="flex flex-col gap-1">
                                <label class="text-[10px] text-secondary uppercase tracking-widest font-semibold">Konfirmasi Status Kehadiran *</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <label class="cursor-pointer flex items-center justify-center gap-1.5 p-2.5 rounded-lg bg-surface-container-highest/60 hover:bg-surface-container-high transition-all has-[:checked]:bg-primary-fixed/20 has-[:checked]:text-primary-fixed border border-outline-variant/20">
                                        <input checked="" class="hidden" name="attendance" type="radio" value="hadir"/>
                                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                        <span class="text-xs font-semibold">Pasti Hadir</span>
                                    </label>
                                    <label class="cursor-pointer flex items-center justify-center gap-1.5 p-2.5 rounded-lg bg-surface-container-highest/60 hover:bg-surface-container-high transition-all has-[:checked]:bg-error/20 has-[:checked]:text-error border border-outline-variant/20">
                                        <input class="hidden" name="attendance" type="radio" value="berhalangan"/>
                                        <span class="material-symbols-outlined text-[18px]">cancel</span>
                                        <span class="text-xs font-semibold">Berhalangan</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Select: Jumlah Tamu -->
                            <div class="flex flex-col gap-1">
                                <label class="text-[10px] text-secondary uppercase tracking-widest font-semibold" for="guest-count">Jumlah Tamu yang Hadir</label>
                                <div class="relative">
                                    <select class="w-full appearance-none bg-surface-container-highest/60 text-on-surface text-xs rounded-lg px-3 py-2.5 pr-8 focus:outline-none focus:ring-1 focus:ring-primary-fixed border border-outline-variant/30" id="guest-count">
                                        <option value="1">1 Orang (Tamu Utama)</option>
                                        <option value="2">2 Orang (Tamu Utama + 1 Pendamping)</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-2.5 top-2.5 pointer-events-none text-secondary text-[18px]">expand_more</span>
                                </div>
                            </div>

                            <!-- Textarea: Ucapan & Doa Harapan -->
                            <div class="flex flex-col gap-1">
                                <label class="text-[10px] text-secondary uppercase tracking-widest font-semibold" for="guest-message">Pesan, Doa &amp; Harapan untuk {{ $celebrantNick }}</label>
                                <textarea class="w-full bg-surface-container-highest/60 text-on-surface text-xs rounded-lg px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-primary-fixed border border-outline-variant/30 placeholder:text-outline" id="guest-message" placeholder="Sampaikan doa dan harapan terbaik Anda bagi babak baru kedewasaan {{ $celebrantNick }}..." rows="3"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button class="w-full py-3 px-4 rounded-lg bg-primary-fixed hover:bg-primary-container active:scale-[0.99] text-on-primary-fixed text-xs font-bold tracking-wider uppercase shadow-lg shadow-primary-fixed/20 flex items-center justify-center gap-1.5 transition-all cursor-pointer mt-1" id="rsvp-submit-btn" type="submit">
                                <span class="material-symbols-outlined text-[17px]">send</span>
                                <span>Kirim Konfirmasi Kehadiran</span>
                            </button>

                            <div class="hidden rounded-lg bg-primary-fixed/20 p-2.5 text-center text-primary-fixed text-xs font-medium border border-primary-fixed/30" id="rsvp-success-toast">
                                Terima kasih! Konfirmasi kehadiran Anda telah tersimpan secara resmi.
                            </div>
                        </form>
                    </section>

                    <!-- SECTION 8: Wishes & Guestbook Live Stream Display -->
                    <section class="flex flex-col gap-3">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-semibold">Buku Tamu Eksekutif</span>
                                <h3 class="font-bodoni text-lg sm:text-xl text-primary font-bold">Doa &amp; Ucapan Kehormatan</h3>
                            </div>
                            <div class="flex items-center gap-1 text-secondary text-xs">
                                <span class="material-symbols-outlined text-[16px] text-primary-fixed">forum</span>
                                <span id="wishes-count">3 Pesan</span>
                            </div>
                        </div>

                        <!-- Feed Container -->
                        <div class="flex flex-col gap-2.5" id="guestbook-stream">
                            <!-- Message 1 -->
                            <div class="bg-surface-container-low rounded-xl p-3 sm:p-3.5 shadow-md flex flex-col gap-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-surface-container-highest flex items-center justify-center text-primary-fixed text-xs font-bold border border-primary-fixed/20">
                                            B
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-xs text-on-surface font-semibold leading-tight">Bpk. Ir. Bambang Soedirgo</span>
                                            <span class="text-[10px] text-secondary">Mitra Korporasi Keluarga • Hadir</span>
                                        </div>
                                    </div>
                                    <span class="text-[9.5px] text-outline">10m lalu</span>
                                </div>
                                <p class="text-xs text-secondary leading-relaxed pl-9">
                                    “Selamat ulang tahun ke-17 ananda {{ $celebrantNick }}. Teruslah tumbuh menjadi pemimpin muda yang berintegritas tinggi dan visioner. Sukses selalu untuk perjalanan studi dan karier ke depan!”
                                </p>
                            </div>

                            <!-- Message 2 -->
                            <div class="bg-surface-container-low rounded-xl p-3 sm:p-3.5 shadow-md flex flex-col gap-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-surface-container-highest flex items-center justify-center text-primary-fixed text-xs font-bold border border-primary-fixed/20">
                                            C
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-xs text-on-surface font-semibold leading-tight">Clarissa Valery &amp; Tim</span>
                                            <span class="text-[10px] text-secondary">Rekan Siswa • Pasti Hadir</span>
                                        </div>
                                    </div>
                                    <span class="text-[9.5px] text-outline">1j lalu</span>
                                </div>
                                <p class="text-xs text-secondary leading-relaxed pl-9">
                                    “Happy Sweet 17th Bro {{ $celebrantNick }}! Looking forward to an amazing gala night. See you on the red carpet!”
                                </p>
                            </div>

                            <!-- Message 3 -->
                            <div class="bg-surface-container-low rounded-xl p-3 sm:p-3.5 shadow-md flex flex-col gap-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-surface-container-highest flex items-center justify-center text-primary-fixed text-xs font-bold border border-primary-fixed/20">
                                            D
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-xs text-on-surface font-semibold leading-tight">Drs. M. Taufik Hidayat</span>
                                            <span class="text-[10px] text-secondary">Kerabat Senior • Hadir</span>
                                        </div>
                                    </div>
                                    <span class="text-[9.5px] text-outline">3j lalu</span>
                                </div>
                                <p class="text-xs text-secondary leading-relaxed pl-9">
                                    “Semoga keberkahan dan masa depan yang gilang gemilang selalu menyertai langkah {{ $celebrantNick }} dalam menggapai cita-cita luhur.”
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 9: Executive Monogram Footer Seal -->
                    <div class="flex flex-col items-center justify-center text-center py-6 gap-1 opacity-90 border-t border-outline-variant/20 mt-2">
                        <span class="text-[10px] text-primary-fixed uppercase tracking-widest font-bold">— {{ strtoupper($celebrantName) }} —</span>
                        <span class="text-[11px] text-secondary">Official {{ $subCategoryBadge }} Gala Dossier • Surabaya, Jawa Timur {{ $targetDate->format('Y') }}</span>
                        <p class="text-[9.5px] text-outline pt-1">Dibuat dengan cinta di Jawa Timur, Indonesia</p>
                    </div>

                </div>
            </main>

            <!-- Floating Audio & Back-to-Top Bar (Centered in max-w-md) -->
            <div class="fixed bottom-20 max-w-md w-full left-1/2 -translate-x-1/2 px-4 z-40 pointer-events-none flex items-center justify-between">
                <!-- Music Player Pill -->
                <button id="floating-music-btn" type="button" onclick="toggleMusic()" aria-label="Toggle Musik" class="pointer-events-auto h-9 px-3 rounded-full bg-surface-container-low/95 backdrop-blur-md shadow-lg flex items-center gap-1.5 text-on-surface active:scale-95 transition-transform border border-primary-fixed/30 cursor-pointer">
                    <span id="music-icon" class="material-symbols-outlined text-primary-fixed text-[16px] animate-spin-slow">music_note</span>
                    <span id="music-title" class="text-[10.5px] font-semibold text-primary-fixed truncate max-w-[130px]">
                        Arctic Celebration
                    </span>
                </button>
                <!-- Scroll Back to Top Button -->
                <button type="button" aria-label="Kembali ke atas" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="pointer-events-auto w-9 h-9 rounded-full bg-surface-container-high/95 backdrop-blur-md shadow-lg flex items-center justify-center text-primary-fixed active:scale-90 transition-transform cursor-pointer border border-primary-fixed/30">
                    <span class="material-symbols-outlined text-[18px]">arrow_upward</span>
                </button>
            </div>

            <!-- Fixed Bottom Navigation Bar (Centered in max-w-md) -->
            <nav class="fixed bottom-0 max-w-md w-full left-1/2 -translate-x-1/2 z-50 bg-surface/95 backdrop-blur-xl shadow-2xl border-t border-outline-variant/30">
                <div class="flex items-center justify-around h-14 px-2">
                    <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-primary-fixed font-bold">
                        <span class="material-symbols-outlined text-[20px]">favorite</span>
                        <span class="text-[9.5px]">Undangan</span>
                    </a>
                    <a href="#agenda-section" onclick="document.querySelector('#agenda-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-secondary hover:text-primary-fixed transition-colors">
                        <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        <span class="text-[9.5px]">Acara</span>
                    </a>
                    <a href="#gallery-section" onclick="document.querySelector('#gallery-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-secondary hover:text-primary-fixed transition-colors">
                        <span class="material-symbols-outlined text-[20px]">photo_library</span>
                        <span class="text-[9.5px]">Galeri</span>
                    </a>
                    <a href="#rsvp-section" onclick="document.querySelector('#rsvp-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-secondary hover:text-primary-fixed transition-colors">
                        <span class="material-symbols-outlined text-[20px]">mark_email_read</span>
                        <span class="text-[9.5px]">RSVP</span>
                    </a>
                </div>
            </nav>

        </div>
    </div>

    <!-- ========================================================
         JAVASCRIPT INTERACTIONS & LIVE PREVIEW SYNC
         ======================================================== -->
    <script>
        // 1. Live Countdown Timer
        (function initCountdown() {
            const targetDateMs = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}").getTime();

            function update() {
                const now = new Date().getTime();
                const diff = targetDateMs - now;

                if (diff <= 0) {
                    const daysEl = document.getElementById('timer-days');
                    const hoursEl = document.getElementById('timer-hours');
                    const minsEl = document.getElementById('timer-minutes');
                    const secsEl = document.getElementById('timer-seconds');
                    if (daysEl) daysEl.innerText = "00";
                    if (hoursEl) hoursEl.innerText = "00";
                    if (minsEl) minsEl.innerText = "00";
                    if (secsEl) secsEl.innerText = "00";
                    return;
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const secs = Math.floor((diff % (1000 * 60)) / 1000);

                const daysEl = document.getElementById('timer-days');
                const hoursEl = document.getElementById('timer-hours');
                const minsEl = document.getElementById('timer-minutes');
                const secsEl = document.getElementById('timer-seconds');

                if (daysEl) daysEl.innerText = days < 10 ? '0' + days : days;
                if (hoursEl) hoursEl.innerText = hours < 10 ? '0' + hours : hours;
                if (minsEl) minsEl.innerText = mins < 10 ? '0' + mins : mins;
                if (secsEl) secsEl.innerText = secs < 10 ? '0' + secs : secs;
            }

            update();
            setInterval(update, 1000);
        })();

        // 2. Toast Controller
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');
            if (!toast || !toastMsg) return;
            toastMsg.innerText = message;
            toast.classList.remove('opacity-0', 'pointer-events-none');
            toast.classList.add('opacity-100');

            setTimeout(() => {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0', 'pointer-events-none');
            }, 2500);
        }

        // 3. Copy to Clipboard
        function copyText(text, successMsg) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showToast(successMsg || 'Nomor berhasil disalin!');
                }).catch(() => fallbackCopy(text, successMsg));
            } else {
                fallbackCopy(text, successMsg);
            }
        }

        function fallbackCopy(text, successMsg) {
            const tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            showToast(successMsg || 'Nomor berhasil disalin!');
        }

        // 4. Audio Controller
        let isAudioPlaying = false;
        const audioElement = document.getElementById('invitationAudio');
        const floatingMusicBtn = document.getElementById('floating-music-btn');
        const floatingMusicIcon = document.getElementById('music-icon');
        const headerMusicBtn = document.getElementById('header-music-btn');
        const headerMusicIcon = document.getElementById('header-music-icon');

        function playAudio() {
            if (audioElement && !isAudioPlaying) {
                audioElement.play().then(() => {
                    isAudioPlaying = true;
                    if (floatingMusicIcon) floatingMusicIcon.classList.add('animate-spin-slow');
                    if (headerMusicIcon) headerMusicIcon.classList.add('animate-spin-slow');
                }).catch(() => {
                    isAudioPlaying = false;
                });
            }
        }

        function toggleMusic() {
            if (!audioElement) return;
            if (isAudioPlaying) {
                audioElement.pause();
                isAudioPlaying = false;
                if (floatingMusicIcon) floatingMusicIcon.classList.remove('animate-spin-slow');
                if (headerMusicIcon) headerMusicIcon.classList.remove('animate-spin-slow');
                showToast('Musik dijeda');
            } else {
                playAudio();
                showToast('Memutar musik perayaan 🎶');
            }
        }

        // 5. Open Invitation Mechanism (Cover -> Main Content)
        function openInvitation() {
            const coverOverlay = document.getElementById('invitation-cover');
            const mainWrapper = document.getElementById('main-invitation-wrapper');

            // 1. Unhide main invitation content
            if (mainWrapper) {
                mainWrapper.classList.remove('hidden');
                void mainWrapper.offsetWidth; // Force reflow
                mainWrapper.classList.remove('opacity-0');
                mainWrapper.classList.add('opacity-100');
            }

            // 2. Unlock body & HTML scrolling
            document.body.classList.remove('overflow-hidden');
            document.documentElement.classList.remove('overflow-hidden');

            // 3. Smooth slide up & fade out cover overlay
            if (coverOverlay) {
                coverOverlay.classList.add('-translate-y-full', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    coverOverlay.classList.add('hidden');
                    window.scrollTo({ top: 0, behavior: 'instant' });
                    document.documentElement.scrollTop = 0;
                    document.body.scrollTop = 0;
                }, 700);
            }

            // 4. Auto-start celebration music
            playAudio();
        }

        window.openInvitation = openInvitation;
        window.triggerOpenEnvelope = openInvitation;

        // 6. Dynamic Gallery Renderer for Live Preview
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !Array.isArray(images) || images.length === 0) return;

            grid.innerHTML = images.map((item, idx) => {
                const imgUrl = typeof item === 'string' ? item : (item.image || item.url);
                const caption = (typeof item === 'object' && item.caption) ? item.caption : `Milestone • Sorotan #${idx + 1}`;
                const captionParts = caption.split('•');
                const category = captionParts[0] ? captionParts[0].trim() : 'Milestone';
                const detail = captionParts[1] ? captionParts[1].trim() : caption;

                return `
                    <div class="group relative rounded-xl overflow-hidden bg-surface-container-low shadow-lg flex flex-col border border-outline-variant/20">
                        <div class="aspect-square w-full overflow-hidden bg-surface-container-highest">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="${detail}" src="${imgUrl}"/>
                        </div>
                        <div class="p-2 sm:p-2.5 bg-surface-container flex flex-col">
                            <span class="text-[9px] text-primary-fixed font-semibold uppercase tracking-wider truncate">
                                ${category}
                            </span>
                            <p class="text-[11px] text-on-surface truncate mt-0.5">
                                ${detail}
                            </p>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Dynamic Events Renderer for Live Preview
        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = events.map((ev, index) => {
                const title = ev.title || 'Sesi Acara';
                const time = (ev.start_time || '18:30') + (ev.end_time ? ' — ' + ev.end_time : ' — Selesai');
                const desc = ev.address || ev.venue_name || ev.description || '';
                const isFirst = index === 0;
                return `
                    <div class="relative flex items-start gap-3 pl-3">
                        <div class="w-3.5 h-3.5 rounded-full ${isFirst ? 'bg-primary-fixed shadow-md shadow-primary-fixed/40 ring-4 ring-surface-container-low' : 'bg-surface-container-highest ring-4 ring-surface-container-low'} shrink-0 mt-1"></div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-[10px] ${isFirst ? 'text-primary-fixed' : 'text-secondary'} font-bold tracking-widest uppercase">
                                ${time}
                            </span>
                            <h4 class="text-xs sm:text-sm text-on-surface font-semibold mt-0.5">
                                ${title}
                            </h4>
                            ${desc ? `<p class="text-[11px] text-secondary mt-0.5 leading-relaxed">${desc}</p>` : ''}
                        </div>
                    </div>
                `;
            }).join('');
        }

        // 7. RSVP Submission
        function handleRSVPSubmit() {
            const nameInput = document.getElementById("guest-name");
            const relationInput = document.getElementById("guest-relation");
            const messageInput = document.getElementById("guest-message");
            const toast = document.getElementById("rsvp-success-toast");
            const submitBtn = document.getElementById("rsvp-submit-btn");
            const stream = document.getElementById("guestbook-stream");

            if (!nameInput || !nameInput.value.trim()) {
                showToast("Mohon isi nama lengkap tamu!");
                return;
            }

            submitBtn.disabled = true;
            submitBtn.classList.add("opacity-50");

            setTimeout(() => {
                if (toast) toast.classList.remove("hidden");
                submitBtn.classList.remove("opacity-50");
                submitBtn.disabled = false;

                // Prepend dynamically to guestbook stream
                if (messageInput && messageInput.value.trim() && stream) {
                    const initial = nameInput.value.trim().charAt(0).toUpperCase();
                    const newCard = document.createElement("div");
                    newCard.className = "bg-surface-container-low rounded-xl p-3 sm:p-3.5 shadow-md flex flex-col gap-1.5 border border-outline-variant/20 transition-all transform animate-fade-in";
                    newCard.innerHTML = `
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-primary-fixed/20 flex items-center justify-center text-primary-fixed text-xs font-bold border border-primary-fixed/30">
                                    ${initial}
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs text-on-surface font-semibold leading-tight">${nameInput.value.trim()}</span>
                                    <span class="text-[10px] text-primary-fixed font-medium">${relationInput.value.trim() || 'Tamu Terhormat'} • Baru Saja Dikonfirmasi</span>
                                </div>
                            </div>
                            <span class="text-[9.5px] text-outline">Barusan</span>
                        </div>
                        <p class="text-xs text-secondary leading-relaxed pl-9">
                            “${messageInput.value.trim()}”
                        </p>
                    `;
                    stream.prepend(newCard);
                }

                showToast("Konfirmasi kehadiran Anda berhasil dikirim!");
                if (messageInput) messageInput.value = "";
            }, 500);
        }

        // 8. Live Preview Synchronization Protocol via postMessage
        window.addEventListener('message', function (event) {
            const data = event.data;
            if (!data || typeof data !== 'object') return;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const targetId = data.target;
                const photoUrl = data.photoUrl || data.dataUrl || data.url;
                if (targetId === 'groom' || targetId === 'groom_photo' || targetId === 'cover' || targetId === 'cover_photo' || targetId === 'person') {
                    const coverPhoto = document.getElementById('previewCoverPhotoImg');
                    const groomPhoto = document.getElementById('previewGroomPhotoImg');
                    if (targetId === 'cover' || targetId === 'cover_photo') {
                        if (coverPhoto) coverPhoto.src = photoUrl;
                    } else {
                        if (groomPhoto) groomPhoto.src = photoUrl;
                    }
                }
            }

            if (data.type === 'RESET_PREVIEW_PHOTO') {
                const targetId = data.target;
                const defaultUrl = "{{ $defaultProfileImg }}";
                if (targetId === 'groom' || targetId === 'groom_photo' || targetId === 'cover' || targetId === 'cover_photo' || targetId === 'person') {
                    const coverPhoto = document.getElementById('previewCoverPhotoImg');
                    const groomPhoto = document.getElementById('previewGroomPhotoImg');
                    if (targetId === 'cover' || targetId === 'cover_photo') {
                        if (coverPhoto) coverPhoto.src = defaultUrl;
                    } else {
                        if (groomPhoto) groomPhoto.src = defaultUrl;
                    }
                }
            }

            if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            }

            if (data.type === 'UPDATE_PREVIEW_EVENTS') {
                const events = data.events;
                if (Array.isArray(events)) {
                    renderDynamicEvents(events);
                }
            }

            if (data.type === 'UPDATE_PREVIEW_PARENTS') {
                const formatted = data.formatted || data.groomParents;
                const pEl = document.querySelector('#previewGroomName ~ p.text-outline');
                if (pEl && formatted) {
                    pEl.innerText = formatted;
                }
            }

            if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const val = data.value;

                if (field === 'groom_name' || field === 'name') {
                    const nameCover = document.getElementById('previewGroomNameCover');
                    const nameMain = document.getElementById('previewGroomName');
                    if (nameCover) nameCover.innerText = val || "{{ $celebrantName }}";
                    if (nameMain) nameMain.innerText = val || "{{ $celebrantName }}";
                }

                if (field === 'sub_category') {
                    const subBadge = document.getElementById('previewSubCategoryBadge');
                    if (subBadge) subBadge.innerText = val || "{{ $subCategoryBadge }}";
                }

                if (field === 'event_heading') {
                    const hCover = document.querySelector('#invitation-cover p.text-secondary');
                    if (hCover) hCover.innerText = val || "{{ $heading }}";
                    const hMain = document.getElementById('previewEventHeading');
                    if (hMain) hMain.innerText = val || "Executive Gala & Celebration";
                }

                if (field === 'quote' || field === 'event_quote') {
                    const qEl = document.getElementById('previewEventQuote');
                    if (qEl) qEl.innerText = val || "{{ $quote }}";
                }

                if (field === 'venue_name') {
                    const vMain = document.getElementById('previewVenueNameMain');
                    if (vMain) vMain.innerText = val || "{{ $venueName }}";
                }

                if (field === 'guest_name' || field === 'to') {
                    const gCover = document.getElementById('previewGuestNameCover');
                    const gMain = document.getElementById('previewGuestNameMain');
                    if (gCover) gCover.innerText = val || "{{ $guestName }}";
                    if (gMain) gMain.innerText = val || "{{ $guestName }}";
                }
            }
        });

        // Notify parent iframe that preview is ready
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'arctic-frost' }, '*');
        }
    </script>
</body>
</html>
