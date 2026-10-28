<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>{{ ($couple->event_heading ?? 'Sweet 17th Birthday Celebration') . ' - ' . ($couple->groom_name ?? 'Clarissa Aurelia Putri') }} | D'Karsa</title>
    <meta name="description" content="Official Birthday Celebration of {{ $couple->groom_name ?? 'Clarissa Aurelia Putri' }} - Rustic Coral & Peach Milestone."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

    <!-- Tailwind CSS with Rustic Coral & Peach Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-bright": "#fdf9f3",
                        "outline-variant": "#ddc0ba",
                        "inverse-on-surface": "#f4f0ea",
                        "secondary-fixed": "#d5e7d4",
                        "on-surface-variant": "#57423d",
                        "primary-container": "#be543c",
                        "surface-container-low": "#f7f3ed",
                        "surface-container-high": "#ebe8e2",
                        "tertiary": "#7b542b",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#8a726c",
                        "on-surface": "#1c1c18",
                        "inverse-primary": "#ffb4a3",
                        "on-secondary-container": "#566757",
                        "on-secondary-fixed-variant": "#3b4b3c",
                        "on-error-container": "#93000a",
                        "secondary": "#526253",
                        "error": "#ba1a1a",
                        "on-primary-fixed": "#3d0600",
                        "primary": "#9e3c26",
                        "tertiary-container": "#966c41",
                        "on-tertiary": "#ffffff",
                        "primary-fixed": "#ffdad2",
                        "surface-container-highest": "#e6e2dc",
                        "surface-variant": "#e6e2dc",
                        "on-secondary-fixed": "#101f13",
                        "on-error": "#ffffff",
                        "on-primary-fixed-variant": "#822714",
                        "surface": "#fdf9f3",
                        "inverse-surface": "#31302d",
                        "secondary-container": "#d2e5d1",
                        "on-tertiary-fixed-variant": "#623f18",
                        "on-background": "#1c1c18",
                        "surface-container": "#f1ede7",
                        "primary-fixed-dim": "#ffb4a3",
                        "on-tertiary-fixed": "#2c1600",
                        "secondary-fixed-dim": "#b9cbb8",
                        "on-tertiary-container": "#fffbff",
                        "on-primary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "surface-tint": "#a13e28",
                        "background": "#fdf9f3",
                        "tertiary-fixed-dim": "#f0bd8b",
                        "tertiary-fixed": "#ffdcbd",
                        "surface-dim": "#dddad4"
                    },
                    fontFamily: {
                        "headline": ["'Playfair Display'", "serif"],
                        "body": ["'Plus Jakarta Sans'", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            background-color: #fdf9f3;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
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
<body class="bg-surface text-on-surface antialiased overflow-hidden min-h-screen relative" id="body-root">

    @php
        $birthdayName = $couple->groom_name ?? 'Clarissa Aurelia Putri';
        $birthdayFull = $couple->groom_fullname ?? $birthdayName;
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCl-58-aEOJBWynlMYOA7IdVehsRB3f9J6PFL-BvQbbtZIfWuOAys0DysZwqpqIA3S8TB-ZOIIKySBw2uPbyQrjOnoc49Buz2G-lFL_7ptJiySDdXJ7PlEHNLHAIDD8lRdHqSNUbfq2RWS_vSiOBK8_kWG-8C1BNvQDbr1toqz9GUUFCh_umM9i7vhVtrgW4S2DAoX4EaaUKI9cv4GcAPmKVK6WedYKYC9Eqtynoe7x7M5Wvw-LVVqr'
        );
        $profileImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            $coverImg
        );

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '18:00 – 21:30 WIB';

        $parentsInfo = $couple->groom_birth_order ?? \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, 'Putri tercinta dari Bpk. Hendra & Ibu Maya');
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet 17 Milestone';
        $heading = (!empty($couple->event_heading) && $couple->event_heading !== 'Sweet 17 Milestone') ? $couple->event_heading : $subCategoryBadge;
        $quote = $couple->quote ?? $couple->event_quote ?? '“A chapter begins, full of dreams, laughter, and endless gratitude. Merayakan 17 tahun penuh cinta dan kebahagiaan bersama orang-orang tersayang.”';
        $venueName = $couple->venue_name ?? 'The Glass House Garden Cafe & Bistro';
        $venueAddress = $couple->venue_address ?? 'Jl. Cempaka Putih No. 17, Gubeng, Surabaya, Jawa Timur';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));
        $guestName = $guest->name ?? request('guest_name') ?? 'Tamu Undangan Terkasih';

        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'Bank BCA';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->bank_account_number ?? $couple->account_number ?? '5271 8892 01';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->bank_account_holder ?? $couple->account_name ?? 'Clarissa Aurelia Putri';

        $bankName2 = $couple->bank_name_2 ?? 'GOPAY / DANA';
        $bankAccount2 = $couple->bank_account_2 ?? '0812 8847 2901';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Clarissa Aurelia Putri';

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCl-58-aEOJBWynlMYOA7IdVehsRB3f9J6PFL-BvQbbtZIfWuOAys0DysZwqpqIA3S8TB-ZOIIKySBw2uPbyQrjOnoc49Buz2G-lFL_7ptJiySDdXJ7PlEHNLHAIDD8lRdHqSNUbfq2RWS_vSiOBK8_kWG-8C1BNvQDbr1toqz9GUUFCh_umM9i7vhVtrgW4S2DAoX4EaaUKI9cv4GcAPmKVK6WedYKYC9Eqtynoe7x7M5Wvw-LVVqr', 'caption' => 'Pure Joy • 17'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCWmCR4mrIovBUY2xbQ05oaILA64tuEstfVPc5rcOxAxleByFRweE8FRTs44zyfiqQFK3kQiM2CBbRsX_Weg7LDOb-mR6vHmPko4ic1Wof5MP-Y0_YKLsTz8cBcPp5lPuLdTDI6LaQMUgfoyhSbgoHNNH4zmNa2e0oMQQG6nBlCOAmK2TqnNB-zoRNQrHPnY-KF_-Fdpdt5AApyx9OKUnK5puNg3l9T3lFOi9F-NBqsr9ONJS0V6coF', 'caption' => 'Garden Whimsy'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCGwNbw_sDTb7BKrnyEkqswaphgByMSPEBmQjg5kF3K4rWjxv4sH0o9VTpmEp5KGDFAxd3JAizGF792iYVD9rccP_TqpQ5mvmzlnn4gKQVq3hAYeNfV9hlWXHoJYaYK_2UcdMNsLhn2AYdrlqAGzO62t8cJTfYJh2MJrHDD66LdIjWn-byDFhJK-yJLngA8h14xfzj6fwwqsvGeL4vCuXaE3jaHv0nmboL9n5dOG3ThVz1btaUXbTYu', 'caption' => 'Sweet Confection'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD3CGWURhNrbM2oe2en-8NhJm6KdzdCBBr4GMa_uhOlLhBur2qmn6Mamh-WQTEvX0pqWkyjSgyy_057nDWZGgrKeM2ysMUMr0EnIZo6eyautYtXSl9qpNkRKHKlg9zjOgnynLfNPgyfgk7ldL4nv9Sgfa3r_4IiPA95z9k7p954Q1zIxfm7L0waMUIQcUErwA5f9IYjMUS32VQxulHCazufuxIOGBZVBfxMrYdfwyd0a2vmWy-iri_k', 'caption' => 'Golden Hour'],
            ]);
        }
    @endphp

    <!-- Background Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Feedback Toast -->
    <div id="toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 max-w-xs px-4 py-2.5 rounded-full bg-[#31302d] text-[#f4f0ea] text-xs font-medium text-center opacity-0 pointer-events-none transition-opacity duration-300 z-[120] shadow-xl flex items-center justify-center gap-2 border border-outline-variant/30">
        <span class="material-symbols-outlined text-inverse-primary text-[18px]">check_circle</span>
        <span id="toast-message">Pesan Berhasil</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: DIGITAL ENVELOPE (Tampilan Awal Eksklusif)
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-surface flex flex-col items-center justify-between px-3 sm:px-4 py-4 sm:py-6 transition-all duration-700 ease-in-out select-none">
        <!-- Decorative Ambient Gradient Backdrop -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-primary-fixed/30 via-surface to-surface-container-low pointer-events-none"></div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-2">
            <!-- Top Subtle Floating Ornaments -->
            <div class="relative w-full pt-2 px-2 flex flex-col items-center text-center z-10 shrink-0">
                <div class="flex items-center gap-2 mb-1.5 animate-float">
                    <span class="w-6 h-[1px] bg-outline-variant"></span>
                    <span class="material-symbols-outlined text-primary text-[18px]">spa</span>
                    <span id="previewSubCategoryBadge" class="text-[10px] sm:text-xs uppercase tracking-widest text-tertiary font-bold font-body">{{ $heading }}</span>
                    <span class="material-symbols-outlined text-primary text-[18px]">spa</span>
                    <span class="w-6 h-[1px] bg-outline-variant"></span>
                </div>
                <p class="text-[9px] sm:text-[10px] tracking-widest uppercase text-tertiary/90 font-medium">Official Digital Invitation</p>
            </div>

            <!-- Center Card: Arched Portrait Showcase & Recipient Envelope -->
            <div class="relative w-full max-w-[310px] px-2 flex flex-col items-center z-10 my-auto py-2">
                <!-- Arched Portrait Showcase with Delicate Rustic Border -->
                <div class="relative w-full aspect-[4/4.6] max-h-[28vh] rounded-t-[6.5rem] rounded-b-2xl overflow-hidden shadow-[0_16px_36px_-8px_rgba(61,46,40,0.20)] bg-surface-container border-[3px] border-surface-container-lowest">
                    <img id="previewCoverPhotoImg" alt="{{ $birthdayName }}" class="w-full h-full object-cover object-center scale-100 hover:scale-105 transition-transform duration-700" src="{{ $coverImg }}"/>
                    <!-- Soft Vignette Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-on-background/70 via-transparent to-transparent pointer-events-none"></div>
                    <!-- Overlay Name Badge -->
                    <div class="absolute bottom-2.5 inset-x-2.5 text-center text-on-primary">
                        <p class="text-[10px] sm:text-[11px] tracking-widest uppercase text-primary-fixed drop-shadow-sm font-semibold">The Joyous Milestone of</p>
                        <h2 id="previewGroomNameCover" class="font-headline text-lg sm:text-xl tracking-tight text-white drop-shadow-md truncate">
                            {{ $birthdayName }}
                        </h2>
                    </div>
                </div>

                <!-- Envelope Seal & Recipient Info -->
                <div class="w-full mt-3 bg-surface-container-lowest/95 backdrop-blur-md rounded-2xl p-3 sm:p-3.5 shadow-[0_8px_20px_-4px_rgba(61,46,40,0.08)] border border-outline-variant/40 text-center relative">
                    <!-- Decorative Envelope Stamp Icon -->
                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-7 h-7 rounded-full bg-primary text-on-primary shadow-md flex items-center justify-center">
                        <span class="material-symbols-outlined text-[16px]">mail</span>
                    </div>
                    <p class="text-[9.5px] uppercase tracking-wider text-tertiary pt-1 font-medium">Kepada Yth. Tamu Terhormat:</p>
                    <p id="previewGuestNameCover" class="font-headline text-sm sm:text-base text-primary font-semibold mt-0.5 truncate">
                        {{ $guestName }}
                    </p>
                    <p class="text-[10.5px] text-on-surface-variant italic mt-0.5">Di Tempat</p>
                </div>
            </div>

            <!-- Bottom CTA "Buka Undangan" -->
            <div class="relative w-full pb-2 px-2 flex flex-col items-center gap-2 z-10 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full max-w-[270px] py-3 px-6 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-semibold uppercase tracking-wider shadow-[0_10px_25px_-5px_rgba(158,60,38,0.4)] active:scale-95 transition-all flex items-center justify-center gap-2 animate-pulse-subtle group cursor-pointer pointer-events-auto">
                    <span class="material-symbols-outlined text-[20px] transition-transform group-hover:scale-110">drafts</span>
                    <span>Buka Undangan</span>
                </button>
                <p class="text-[10px] text-outline text-center flex items-center gap-1 font-medium">
                    <span class="material-symbols-outlined text-[14px] text-primary">volume_up</span>
                    <span>Musik latar otomatis diputar</span>
                </p>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER (Terkunci & Tersembunyi sebelum Buka Undangan)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="hidden opacity-0 transition-opacity duration-700 w-full relative">
        <div class="min-h-screen max-w-md mx-auto relative flex flex-col bg-surface shadow-[0_16px_36px_-8px_rgba(61,46,40,0.08)]">

            <!-- Fixed Top Header Bar (Centered within max-w-md) -->
            <header class="fixed top-0 max-w-md w-full left-1/2 -translate-x-1/2 z-40 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(61,46,40,0.04)] border-b border-outline-variant/20">
                <div class="h-14 px-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[20px]">local_florist</span>
                        <h1 class="font-headline text-base text-primary tracking-tight truncate">{{ $heading }}</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <button id="header-music-btn" type="button" onclick="toggleMusic()" aria-label="Putar Musik" class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-primary shadow-sm active:scale-95 transition-transform hover:bg-surface-container-high cursor-pointer">
                            <span id="header-music-icon" class="material-symbols-outlined text-[18px] animate-spin-slow">music_note</span>
                        </button>
                        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary shadow-sm">
                            <span class="material-symbols-outlined text-[17px]">celebration</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Scroll Area -->
            <main class="flex-1 w-full bg-surface pt-14 pb-24 flex flex-col">
                <div class="flex flex-col w-full pb-8 overflow-hidden selection:bg-primary-fixed selection:text-on-primary-fixed">

                    <!-- Ambient Botanical Background Ornaments & Hero -->
                    <div class="relative w-full px-4 pt-4 pb-6 flex flex-col items-center text-center">
                        <div class="flex items-center gap-2 mb-2.5">
                            <span class="w-7 h-[1px] bg-outline-variant"></span>
                            <span class="material-symbols-outlined text-primary text-[18px]">spa</span>
                            <span id="previewSubCategoryBadgeMain" class="text-xs uppercase tracking-widest text-tertiary font-bold">{{ $heading }}</span>
                            <span class="material-symbols-outlined text-primary text-[18px]">spa</span>
                            <span class="w-7 h-[1px] bg-outline-variant"></span>
                        </div>

                        <!-- Celebration Arched Floral Frame -->
                        <div class="relative w-full max-w-[290px] aspect-[4/4.8] rounded-t-[6.5rem] rounded-b-2xl overflow-hidden shadow-[0_16px_36px_-8px_rgba(61,46,40,0.14)] bg-surface-container mb-4 group border-2 border-surface-container-lowest">
                            <img id="previewGroomPhotoImg" alt="{{ $birthdayName }}" class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105" src="{{ $profileImg }}"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-surface-variant/70 via-transparent to-black/10 pointer-events-none"></div>
                            <div class="absolute bottom-2.5 right-2.5 bg-surface-bright/95 backdrop-blur-md px-2.5 py-1 rounded-full shadow-sm flex items-center gap-1.5 border border-outline-variant/30">
                                <span class="material-symbols-outlined text-primary text-[14px]">celebration</span>
                                <span id="previewSubCategoryPill" class="text-[10px] text-on-surface font-semibold">{{ $subCategoryBadge }}</span>
                            </div>
                        </div>

                        <!-- Profile & Dedication Headline -->
                        <div class="space-y-1.5 max-w-xs">
                            <p class="text-xs text-tertiary tracking-wider uppercase font-semibold">The Joyous Celebration of</p>
                            <h2 id="previewGroomName" class="font-headline text-2xl sm:text-3xl text-primary tracking-tight leading-tight">
                                {{ $birthdayName }}
                            </h2>
                            <p id="previewParentsText" class="text-xs text-on-surface-variant italic">
                                {{ $parentsInfo }}
                            </p>
                        </div>

                        <!-- Poetic Quote Banner -->
                        <div class="mt-4 p-4 rounded-2xl bg-surface-container-low shadow-sm max-w-sm relative border border-outline-variant/30">
                            <span class="material-symbols-outlined text-outline-variant/70 absolute -top-2.5 left-4 text-[22px]">format_quote</span>
                            <p id="previewEventQuote" class="font-headline text-sm sm:text-base leading-relaxed text-on-surface italic pt-1">
                                {{ $quote }}
                            </p>
                            <div class="flex justify-center items-center gap-1.5 mt-2.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Countdown Timer Section -->
                    <section class="px-4 my-2" id="countdown-grid">
                        <div class="bg-surface-container rounded-2xl p-4 sm:p-5 shadow-[0_8px_24px_-6px_rgba(61,46,40,0.06)] flex flex-col items-center border border-outline-variant/30">
                            <div class="flex items-center gap-1.5 mb-3">
                                <span class="material-symbols-outlined text-primary text-[18px]">hourglass_top</span>
                                <span class="text-xs uppercase tracking-wider text-on-surface font-bold">Hitung Mundur Hari Bahagia</span>
                            </div>

                            <!-- 4-Capsule Live Countdown -->
                            <div class="grid grid-cols-4 gap-2 w-full max-w-xs mb-4">
                                <div class="bg-surface-container-lowest rounded-2xl py-2.5 px-1 flex flex-col items-center shadow-sm border border-outline-variant/20">
                                    <span class="font-headline text-lg sm:text-xl text-primary font-bold" id="timer-days">00</span>
                                    <span class="text-[9.5px] text-on-surface-variant uppercase mt-0.5 font-medium">Hari</span>
                                </div>
                                <div class="bg-surface-container-lowest rounded-2xl py-2.5 px-1 flex flex-col items-center shadow-sm border border-outline-variant/20">
                                    <span class="font-headline text-lg sm:text-xl text-primary font-bold" id="timer-hours">00</span>
                                    <span class="text-[9.5px] text-on-surface-variant uppercase mt-0.5 font-medium">Jam</span>
                                </div>
                                <div class="bg-surface-container-lowest rounded-2xl py-2.5 px-1 flex flex-col items-center shadow-sm border border-outline-variant/20">
                                    <span class="font-headline text-lg sm:text-xl text-primary font-bold" id="timer-minutes">00</span>
                                    <span class="text-[9.5px] text-on-surface-variant uppercase mt-0.5 font-medium">Menit</span>
                                </div>
                                <div class="bg-surface-container-lowest rounded-2xl py-2.5 px-1 flex flex-col items-center shadow-sm border border-outline-variant/20">
                                    <span class="font-headline text-lg sm:text-xl text-tertiary font-bold animate-pulse" id="timer-seconds">00</span>
                                    <span class="text-[9.5px] text-on-surface-variant uppercase mt-0.5 font-medium">Detik</span>
                                </div>
                            </div>

                            <!-- Save to Google Calendar CTA -->
                            <a class="w-full max-w-xs py-2.5 px-4 rounded-full bg-secondary text-on-secondary flex items-center justify-center gap-2 shadow-sm active:scale-98 transition-all hover:bg-on-secondary-fixed-variant text-xs uppercase tracking-wider font-semibold"
                               href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Sweet 17 - ' . $birthdayName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Perayaan Ulang Tahun ' . $birthdayName) }}&location={{ urlencode($venueName . ', ' . $venueAddress) }}"
                               target="_blank" rel="noopener noreferrer">
                                <span class="material-symbols-outlined text-[18px]">calendar_add_on</span>
                                <span>Simpan ke Google Calendar</span>
                            </a>
                        </div>
                    </section>

                    <!-- Event Details & Sessions (Waktu & Acara) -->
                    <section class="px-4 my-4 space-y-3" id="agenda-section">
                        <div class="text-center mb-1">
                            <span class="text-[10px] sm:text-xs uppercase tracking-wider text-tertiary font-bold">Agenda Perayaan</span>
                            <h3 class="font-headline text-xl text-primary font-semibold">Waktu &amp; Rangkaian Acara</h3>
                        </div>

                        @php
                            $activeEvents = collect($couple->events ?? []);
                            if ($activeEvents->isEmpty()) {
                                $activeEvents = collect([
                                    (object)[
                                        'title' => 'Sweet 17 Party & Dinner',
                                        'date' => $eventDateFormatted,
                                        'start_time' => $eventTimeFormatted,
                                        'end_time' => '',
                                        'venue_name' => 'Utama • Birthday Dinner',
                                        'address' => $venueName . ', ' . $venueAddress,
                                    ]
                                ]);
                            }
                        @endphp

                        <div id="itineraryContainer" class="space-y-3">
                            @foreach($activeEvents as $idx => $ev)
                                <div class="bg-surface-container-low rounded-2xl p-4 shadow-sm space-y-3 border border-outline-variant/30">
                                    <div class="flex items-start gap-3">
                                        <div class="w-11 h-11 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0 mt-0.5">
                                            <span class="material-symbols-outlined text-[22px]">{{ $idx === 0 ? 'nightlife' : 'cake' }}</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed text-[10px] font-semibold mb-1">
                                                {{ $ev->venue_name ?? ($idx === 0 ? 'Utama • Birthday Dinner' : ('Sesi ' . ($idx + 1))) }}
                                            </span>
                                            <h4 class="font-headline text-base text-on-surface truncate font-semibold">
                                                {{ $ev->title ?? 'Rangkaian Acara Ulang Tahun' }}
                                            </h4>
                                            <p class="text-xs text-on-surface-variant mt-0.5 flex items-center gap-1.5">
                                                <span class="material-symbols-outlined text-[16px] text-tertiary">event</span>
                                                <span class="previewEventDate">{{ !empty($ev->date) ? (str_contains($ev->date, '-') ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $ev->date) : $eventDateFormatted }}</span>
                                            </p>
                                            <p class="text-xs text-on-surface-variant flex items-center gap-1.5 mt-0.5">
                                                <span class="material-symbols-outlined text-[16px] text-tertiary">schedule</span>
                                                <span class="previewEventTime">{{ $ev->start_time ?? $eventTimeFormatted }} {{ !empty($ev->end_time) ? '– ' . $ev->end_time : '' }}</span>
                                            </p>
                                            @if(!empty($ev->address))
                                                <p class="text-xs text-on-surface-variant mt-1 leading-relaxed">
                                                    {{ $ev->address }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    @if($idx === 0)
                                        <!-- Dress Code Specifier -->
                                        <div class="bg-surface-bright rounded-xl p-3 space-y-1.5 border border-outline-variant/20">
                                            <div class="flex items-center gap-1.5">
                                                <span class="material-symbols-outlined text-primary text-[16px]">checkroom</span>
                                                <span class="text-[11px] text-on-surface font-semibold uppercase">Dress Code Tamu Undangan</span>
                                            </div>
                                            <p class="text-xs text-on-surface-variant">
                                                Rustic Pastel / Nuansa Coral, Soft Peach, Terracotta &amp; Warm Earthy Cream.
                                            </p>
                                            <!-- Palette Swatch Badges -->
                                            <div class="flex items-center flex-wrap gap-2 pt-1">
                                                <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                                    <span class="w-3.5 h-3.5 rounded-full bg-primary shadow-inner"></span>
                                                    <span class="text-on-surface">Terracotta</span>
                                                </div>
                                                <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                                    <span class="w-3.5 h-3.5 rounded-full bg-primary-fixed-dim shadow-inner"></span>
                                                    <span class="text-on-surface">Peach</span>
                                                </div>
                                                <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                                    <span class="w-3.5 h-3.5 rounded-full bg-secondary-fixed shadow-inner"></span>
                                                    <span class="text-on-surface">Sage</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Venue & Maps Section -->
                    <section class="px-4 my-4" id="venue-section">
                        <div class="bg-surface-container rounded-2xl p-4 sm:p-5 shadow-sm space-y-3.5 border border-outline-variant/30">
                            <div class="flex items-center gap-2.5">
                                <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
                                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 id="previewVenueName" class="font-headline text-base text-on-surface font-semibold truncate">{{ $venueName }}</h3>
                                    <p class="text-[11px] text-tertiary">Lokasi &amp; Venue Acara</p>
                                </div>
                            </div>
                            <p id="previewVenueAddress" class="text-xs text-on-surface-variant leading-relaxed">
                                {{ $venueAddress }}
                            </p>

                            <!-- Direct Google Maps Action Button -->
                            <div class="pt-1">
                                <a class="w-full h-11 rounded-full bg-primary text-on-primary flex items-center justify-center gap-2 text-xs uppercase tracking-wider font-semibold shadow-md hover:brightness-105 active:scale-95 transition-all cursor-pointer"
                                   href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer">
                                    <span class="material-symbols-outlined text-[18px]">directions</span>
                                    <span>Buka Petunjuk Arah (Google Maps)</span>
                                </a>
                            </div>
                        </div>
                    </section>

                    <!-- Photo Gallery (Polaroid & Memory Grid) -->
                    <section class="px-4 my-5 space-y-3" id="gallery-section">
                        <div class="text-center">
                            <span class="text-[10px] sm:text-xs uppercase tracking-wider text-tertiary font-bold">Galeri Kenangan</span>
                            <h3 class="font-headline text-xl text-primary font-semibold">Moments of Seventeen</h3>
                            <p class="text-xs text-on-surface-variant">Langkah demi langkah menuju babak baru yang penuh warna</p>
                        </div>

                        <!-- Polaroid Aesthetic Collage (Dynamic & Synchronized) -->
                        <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 pt-2">
                            @foreach($activeGalleries as $idx => $gal)
                                @php
                                    $rotations = ['rotate-[-2deg]', 'rotate-[2deg]', 'rotate-[1.5deg]', 'rotate-[-1.5deg]'];
                                    $rot = $rotations[$idx % 4];
                                @endphp
                                <div class="bg-surface-bright p-2 rounded-xl shadow-md {{ $rot }} hover:rotate-0 transition-transform border border-outline-variant/30">
                                    <div class="aspect-square w-full rounded-lg overflow-hidden bg-surface-container-low mb-1.5">
                                        <img alt="{{ $gal->caption ?? 'Moment' }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? null, $coverImg) }}"/>
                                    </div>
                                    <p class="font-headline text-center text-xs text-tertiary italic tracking-wide truncate">
                                        {{ $gal->caption ?? ('Moment • ' . ($idx + 1)) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Interactive RSVP Form Section -->
                    <section class="px-4 my-5" id="rsvp-section">
                        <div class="bg-surface-container-low rounded-3xl p-5 shadow-[0_12px_32px_-6px_rgba(61,46,40,0.08)] border border-outline-variant/30">
                            <div class="text-center mb-4">
                                <div class="w-10 h-10 rounded-full bg-primary-fixed mx-auto mb-1.5 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-[22px]">mark_email_read</span>
                                </div>
                                <h3 class="font-headline text-lg sm:text-xl text-primary font-semibold">Konfirmasi Kehadiran</h3>
                                <p class="text-xs text-on-surface-variant mt-0.5">
                                    Mohon konfirmasi kehadiranmu agar kami dapat mempersiapkan jamuan terbaik.
                                </p>
                            </div>

                            <form id="rsvp-form" class="space-y-3" method="POST" action="{{ route('invitation.rsvp') }}">
                                @csrf
                                <input type="hidden" name="couple_id" value="{{ $couple->id ?? 1 }}">

                                <!-- Input Nama -->
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-on-surface font-semibold mb-1" for="guest-name">
                                        Nama Lengkap
                                    </label>
                                    <div class="relative">
                                        <input id="guest-name" name="name" type="text" required value="{{ $guestName !== 'Tamu Undangan Terkasih' ? $guestName : '' }}" placeholder="Contoh: Jessica Amanda"
                                               class="w-full h-11 px-3.5 rounded-xl bg-surface-container-lowest text-on-surface placeholder:text-outline text-xs focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30"/>
                                        <span class="material-symbols-outlined absolute right-3 top-2.5 text-outline text-[18px]">badge</span>
                                    </div>
                                </div>

                                <!-- Attendance Status Segmented Toggle -->
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-on-surface font-semibold mb-1">
                                        Status Kehadiran
                                    </label>
                                    <div class="grid grid-cols-2 gap-1.5 bg-surface-container p-1 rounded-2xl border border-outline-variant/20">
                                        <button id="btn-attend-yes" type="button" class="h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-primary text-on-primary shadow-sm transition-all cursor-pointer">
                                            <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                            <span>Pasti Hadir</span>
                                        </button>
                                        <button id="btn-attend-no" type="button" class="h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-transparent text-on-surface-variant hover:text-on-surface transition-all cursor-pointer">
                                            <span class="material-symbols-outlined text-[16px]">cancel</span>
                                            <span>Berhalangan</span>
                                        </button>
                                    </div>
                                    <input id="attend-status" name="attendance" type="hidden" value="Hadir"/>
                                </div>

                                <!-- Jumlah Tamu -->
                                <div id="pax-container">
                                    <label class="block text-xs uppercase tracking-wider text-on-surface font-semibold mb-1" for="pax-count">
                                        Jumlah Tamu (Pax)
                                    </label>
                                    <select id="pax-count" name="pax" class="w-full h-11 px-3.5 rounded-xl bg-surface-container-lowest text-on-surface text-xs focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30">
                                        <option value="1 Orang">1 Orang (Hanya Saya)</option>
                                        <option value="2 Orang">2 Orang (+ Teman / Pendamping)</option>
                                    </select>
                                </div>

                                <!-- Wishes / Doa -->
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-on-surface font-semibold mb-1" for="wishes-message">
                                        Ucapan &amp; Doa Hangat
                                    </label>
                                    <textarea id="wishes-message" name="message" rows="3" required placeholder="Tuliskan ucapan manis dan doa untuk hari bahagia ini..."
                                              class="w-full p-3 rounded-xl bg-surface-container-lowest text-on-surface placeholder:text-outline text-xs focus:outline-none focus:ring-2 focus:ring-primary shadow-sm resize-none border border-outline-variant/30"></textarea>
                                </div>

                                <!-- Submit CTA -->
                                <button type="submit" id="btn-submit-rsvp" class="w-full py-2.5 px-4 rounded-full bg-primary text-on-primary text-xs uppercase tracking-wider font-semibold shadow-md active:scale-95 transition-all flex items-center justify-center gap-2 hover:bg-primary-container cursor-pointer">
                                    <span class="material-symbols-outlined text-[18px]">send</span>
                                    <span>Kirim Konfirmasi RSVP</span>
                                </button>
                            </form>
                        </div>
                    </section>

                    <!-- Wishes Stream / Buku Tamu Digital -->
                    <section class="px-4 my-4 space-y-3" id="wishes-section">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-primary text-[18px]">favorite</span>
                                <h4 class="font-headline text-base text-on-surface font-semibold">Untaian Doa &amp; Harapan</h4>
                            </div>
                            <span id="wishes-count" class="text-[10px] bg-primary-fixed text-on-primary-fixed px-2.5 py-0.5 rounded-full font-semibold">
                                4 Ucapan
                            </span>
                        </div>

                        <!-- Feed Container -->
                        <div id="wishes-feed" class="space-y-2.5">
                            <div class="bg-surface-container rounded-2xl p-3.5 shadow-sm space-y-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-[10px]">
                                            NA
                                        </div>
                                        <span class="text-xs text-on-surface font-semibold">Nadia Az-Zahra</span>
                                    </div>
                                    <span class="text-[10px] text-secondary font-medium">Pasti Hadir</span>
                                </div>
                                <p class="text-xs text-on-surface-variant italic leading-relaxed">
                                    “Happy birthday {{ $birthdayName }} cantik! Semoga semakin bersinar, sukses studinya, dan makin bahagia selalu! See you at the party bestie! ♥”
                                </p>
                                <p class="text-[9.5px] text-outline text-right">Baru saja</p>
                            </div>

                            <div class="bg-surface-container rounded-2xl p-3.5 shadow-sm space-y-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-tertiary-fixed text-on-tertiary-fixed flex items-center justify-center font-bold text-[10px]">
                                            DA
                                        </div>
                                        <span class="text-xs text-on-surface font-semibold">Devan &amp; Family</span>
                                    </div>
                                    <span class="text-[10px] text-secondary font-medium">Pasti Hadir</span>
                                </div>
                                <p class="text-xs text-on-surface-variant italic leading-relaxed">
                                    “Selamat ulang tahun ke-17! Semoga tercapai segala cita-cita mulia dan senantiasa menjadi kebanggaan orang tua tercinta.”
                                </p>
                                <p class="text-[9.5px] text-outline text-right">2 jam yang lalu</p>
                            </div>

                            <div class="bg-surface-container rounded-2xl p-3.5 shadow-sm space-y-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold text-[10px]">
                                            SK
                                        </div>
                                        <span class="text-xs text-on-surface font-semibold">Stephanie Kusuma</span>
                                    </div>
                                    <span class="text-[10px] text-error font-medium">Berhalangan</span>
                                </div>
                                <p class="text-xs text-on-surface-variant italic leading-relaxed">
                                    “Happy Sweet Seventeen! Maaf belum bisa hadir langsung karena dinas luar kota, doa terbaik untukmu selalu! Sukses terus ya!”
                                </p>
                                <p class="text-[9.5px] text-outline text-right">Kemarin</p>
                            </div>
                        </div>
                    </section>

                    <!-- Digital Gift / Angpao & Tanda Kasih -->
                    <section class="px-4 my-5" id="gift-section">
                        <div class="bg-surface-container-lowest rounded-3xl p-5 shadow-[0_12px_32px_-6px_rgba(61,46,40,0.08)] text-center space-y-3.5 border border-outline-variant/30">
                            <div class="w-10 h-10 rounded-full bg-primary-fixed mx-auto flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[22px]">featured_seasonal_and_gifts</span>
                            </div>
                            <div>
                                <h4 class="font-headline text-lg text-primary font-semibold">Tanda Kasih &amp; Kado Digital</h4>
                                <p class="text-xs text-on-surface-variant mt-0.5 max-w-xs mx-auto">
                                    Doa restu Anda merupakan karunia terindah. Namun jika ingin memberikan tanda kasih secara cashless, dapat disalurkan melalui rekening berikut:
                                </p>
                            </div>

                            <!-- Bank Card 1 -->
                            <div class="bg-surface-container-low rounded-2xl p-3.5 text-left shadow-sm space-y-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-primary font-bold tracking-wider uppercase">{{ $bankName1 }}</span>
                                    <span class="material-symbols-outlined text-outline text-[18px]">account_balance_wallet</span>
                                </div>
                                <div class="flex items-center justify-between pt-0.5">
                                    <div>
                                        <p class="font-headline text-sm tracking-wider text-on-surface font-bold">{{ $bankAccount1 }}</p>
                                        <p class="text-[11px] text-on-surface-variant">a.n {{ $bankHolder1 }}</p>
                                    </div>
                                    <button type="button" onclick="copyToClipboard('{{ preg_replace('/[^0-9]/', '', $bankAccount1) }}', 'Nomor rekening {{ $bankName1 }} berhasil disalin!')"
                                            class="px-3 py-1 rounded-full bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary transition-colors flex items-center gap-1 text-[11px] font-semibold active:scale-95 cursor-pointer">
                                        <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                        <span>Salin</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Bank Card 2 (E-Wallet) -->
                            <div class="bg-surface-container-low rounded-2xl p-3.5 text-left shadow-sm space-y-1.5 border border-outline-variant/20">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-tertiary font-bold tracking-wider uppercase">{{ $bankName2 }}</span>
                                    <span class="material-symbols-outlined text-outline text-[18px]">payments</span>
                                </div>
                                <div class="flex items-center justify-between pt-0.5">
                                    <div>
                                        <p class="font-headline text-sm tracking-wider text-on-surface font-bold">{{ $bankAccount2 }}</p>
                                        <p class="text-[11px] text-on-surface-variant">a.n {{ $bankHolder2 }}</p>
                                    </div>
                                    <button type="button" onclick="copyToClipboard('{{ preg_replace('/[^0-9]/', '', $bankAccount2) }}', 'Nomor e-Wallet {{ $bankName2 }} berhasil disalin!')"
                                            class="px-3 py-1 rounded-full bg-surface-container-high text-tertiary hover:bg-tertiary hover:text-on-tertiary transition-colors flex items-center gap-1 text-[11px] font-semibold active:scale-95 cursor-pointer">
                                        <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                        <span>Salin</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Sweet Closing Warm Notes -->
                    <section class="px-4 text-center my-5 space-y-2.5">
                        <div class="flex justify-center items-center gap-2">
                            <span class="w-10 h-[1px] bg-outline-variant"></span>
                            <span class="material-symbols-outlined text-primary text-[18px]">favorite</span>
                            <span class="w-10 h-[1px] bg-outline-variant"></span>
                        </div>
                        <p class="font-headline text-base text-primary italic font-semibold">Sampai Jumpa di Hari Bahagia!</p>
                        <p class="text-xs text-on-surface-variant max-w-xs mx-auto leading-relaxed">
                            Kehadiran, pelukan hangat, serta doa restu teman-teman dan keluarga adalah kado paling berharga di ulang tahun ini.
                        </p>
                        <p class="text-xs uppercase tracking-widest text-tertiary font-bold pt-1">
                            {{ $birthdayName }} &amp; Keluarga Besar
                        </p>
                        <p class="text-[10px] text-outline pt-1">Dibuat dengan cinta di Jawa Timur, Indonesia</p>
                    </section>

                </div>
            </main>

            <!-- Floating Audio & Back-to-Top Bar (Centered in max-w-md) -->
            <div class="fixed bottom-20 max-w-md w-full left-1/2 -translate-x-1/2 px-4 z-40 pointer-events-none flex items-center justify-between">
                <!-- Music Player Pill -->
                <button id="floating-music-btn" type="button" onclick="toggleMusic()" aria-label="Toggle Musik" class="pointer-events-auto h-9 px-3 rounded-full bg-surface-container-lowest/95 backdrop-blur-md shadow-md flex items-center gap-1.5 text-on-surface active:scale-95 transition-transform border border-outline-variant/30 cursor-pointer">
                    <span id="music-icon" class="material-symbols-outlined text-primary text-[16px] animate-spin-slow">music_note</span>
                    <span id="music-title" class="text-[11px] font-semibold text-primary truncate max-w-[140px]">
                        Sweet Celebration Melody
                    </span>
                </button>
                <!-- Scroll Back to Top Button -->
                <button type="button" aria-label="Kembali ke atas" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="pointer-events-auto w-9 h-9 rounded-full bg-surface-container-high/95 backdrop-blur-md shadow-md flex items-center justify-center text-primary active:scale-90 transition-transform cursor-pointer border border-outline-variant/30">
                    <span class="material-symbols-outlined text-[18px]">arrow_upward</span>
                </button>
            </div>

            <!-- Fixed Bottom Navigation Bar (Centered in max-w-md) -->
            <nav class="fixed bottom-0 max-w-md w-full left-1/2 -translate-x-1/2 z-50 bg-surface/90 backdrop-blur-xl shadow-[0_-4px_20px_rgba(61,46,40,0.06)] border-t border-outline-variant/20">
                <div class="flex items-center justify-around h-14 px-2">
                    <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-primary font-bold">
                        <span class="material-symbols-outlined text-[20px]">favorite</span>
                        <span class="text-[9.5px]">Undangan</span>
                    </a>
                    <a href="#agenda-section" onclick="document.querySelector('#agenda-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-on-surface-variant hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        <span class="text-[9.5px]">Acara</span>
                    </a>
                    <a href="#gallery-section" onclick="document.querySelector('#gallery-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-on-surface-variant hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-[20px]">photo_library</span>
                        <span class="text-[9.5px]">Galeri</span>
                    </a>
                    <a href="#rsvp-section" onclick="document.querySelector('#rsvp-section')?.scrollIntoView({behavior: 'smooth'}); return false;" class="flex flex-col items-center justify-center min-w-[40px] text-on-surface-variant hover:text-primary transition-colors">
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
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                const daysEl = document.getElementById('timer-days');
                const hoursEl = document.getElementById('timer-hours');
                const minsEl = document.getElementById('timer-minutes');
                const secsEl = document.getElementById('timer-seconds');

                if (daysEl) daysEl.innerText = days < 10 ? '0' + days : days;
                if (hoursEl) hoursEl.innerText = hours < 10 ? '0' + hours : hours;
                if (minsEl) minsEl.innerText = minutes < 10 ? '0' + minutes : minutes;
                if (secsEl) secsEl.innerText = seconds < 10 ? '0' + seconds : seconds;
            }

            update();
            setInterval(update, 1000);
        })();

        // 2. RSVP Attendance Toggle Logic
        const btnYes = document.getElementById('btn-attend-yes');
        const btnNo = document.getElementById('btn-attend-no');
        const attendStatus = document.getElementById('attend-status');
        const paxContainer = document.getElementById('pax-container');

        if (btnYes && btnNo) {
            btnYes.addEventListener('click', () => {
                attendStatus.value = 'Hadir';
                btnYes.className = 'h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-primary text-on-primary shadow-sm transition-all cursor-pointer';
                btnNo.className = 'h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-transparent text-on-surface-variant hover:text-on-surface transition-all cursor-pointer';
                if (paxContainer) paxContainer.style.display = 'block';
            });

            btnNo.addEventListener('click', () => {
                attendStatus.value = 'Tidak Hadir';
                btnNo.className = 'h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-error text-on-error shadow-sm transition-all cursor-pointer';
                btnYes.className = 'h-10 rounded-xl text-xs tracking-wider flex items-center justify-center gap-1 bg-transparent text-on-surface-variant hover:text-on-surface transition-all cursor-pointer';
                if (paxContainer) paxContainer.style.display = 'none';
            });
        }

        // 3. Interactive RSVP Submission & Real-time Wishes Stream Insertion
        const rsvpForm = document.getElementById('rsvp-form');
        const wishesFeed = document.getElementById('wishes-feed');
        const wishesCountEl = document.getElementById('wishes-count');
        let currentCount = 4;

        if (rsvpForm) {
            rsvpForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const name = document.getElementById('guest-name')?.value.trim();
                const message = document.getElementById('wishes-message')?.value.trim();
                const status = attendStatus?.value || 'Hadir';

                if (!name || !message) return;

                const submitBtn = document.getElementById('btn-submit-rsvp');
                const origBtnText = submitBtn ? submitBtn.innerHTML : '';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="material-symbols-outlined text-[16px] animate-spin">refresh</span><span>Mengirim...</span>';
                }

                // AJAX RSVP submission to standard Laravel route
                const formData = new FormData(rsvpForm);
                fetch(rsvpForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    prependWishCard(name, message, status);
                    rsvpForm.reset();
                    showToast('Terima kasih! Konfirmasi RSVP & ucapanmu tersimpan.');
                })
                .catch(() => {
                    prependWishCard(name, message, status);
                    rsvpForm.reset();
                    showToast('Terima kasih atas ucapan dan doa restumu!');
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = origBtnText;
                    }
                });
            });
        }

        function prependWishCard(name, message, status) {
            if (!wishesFeed) return;
            const newCard = document.createElement('div');
            newCard.className = 'bg-surface-container rounded-2xl p-3.5 shadow-sm space-y-1.5 border-l-4 ' + (status === 'Hadir' ? 'border-primary' : 'border-error');

            const initials = name.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
            const statusTag = status === 'Hadir' 
                ? '<span class="text-[10px] text-secondary font-medium">Pasti Hadir</span>'
                : '<span class="text-[10px] text-error font-medium">Berhalangan</span>';

            newCard.innerHTML = `
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-[10px]">
                            ${initials}
                        </div>
                        <span class="text-xs text-on-surface font-semibold">${name}</span>
                    </div>
                    ${statusTag}
                </div>
                <p class="text-xs text-on-surface-variant italic leading-relaxed">&ldquo;${message}&rdquo;</p>
                <p class="text-[9.5px] text-outline text-right">Baru saja</p>
            `;

            wishesFeed.prepend(newCard);
            currentCount++;
            if (wishesCountEl) wishesCountEl.innerText = `${currentCount} Ucapan`;
        }

        // 4. Clipboard Helper with Toast Feedback
        function copyToClipboard(text, message) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showToast(message || 'Nomor rekening berhasil disalin!');
                }).catch(() => {
                    fallbackCopy(text, message);
                });
            } else {
                fallbackCopy(text, message);
            }
        }

        function fallbackCopy(text, message) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            showToast(message || 'Berhasil disalin');
        }

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
            }, 2800);
        }

        // 5. Audio Player Controller
        let isAudioPlaying = false;
        const audioElement = document.getElementById('invitationAudio');
        const floatingMusicBtn = document.getElementById('floating-music-btn');
        const floatingMusicIcon = document.getElementById('music-icon');
        const headerMusicBtn = document.getElementById('header-music-btn');
        const headerMusicIcon = document.getElementById('header-music-icon');

        function updateMusicState(playing) {
            isAudioPlaying = playing;
            if (playing) {
                if (floatingMusicIcon) {
                    floatingMusicIcon.classList.add('animate-spin-slow');
                    floatingMusicIcon.innerText = 'music_note';
                }
                if (headerMusicIcon) {
                    headerMusicIcon.classList.add('animate-spin-slow');
                    headerMusicIcon.innerText = 'music_note';
                }
                if (headerMusicBtn) {
                    headerMusicBtn.classList.remove('text-outline');
                    headerMusicBtn.classList.add('text-primary');
                }
            } else {
                if (floatingMusicIcon) {
                    floatingMusicIcon.classList.remove('animate-spin-slow');
                    floatingMusicIcon.innerText = 'music_off';
                }
                if (headerMusicIcon) {
                    headerMusicIcon.classList.remove('animate-spin-slow');
                    headerMusicIcon.innerText = 'music_off';
                }
                if (headerMusicBtn) {
                    headerMusicBtn.classList.add('text-outline');
                    headerMusicBtn.classList.remove('text-primary');
                }
            }
        }

        function playAudio() {
            if (audioElement) {
                audioElement.play().then(() => {
                    updateMusicState(true);
                }).catch(e => {
                    console.log('Audio autoplay handled by browser policy:', e);
                });
            }
        }

        function pauseAudio() {
            if (audioElement) {
                audioElement.pause();
                updateMusicState(false);
            }
        }

        function toggleMusic() {
            if (isAudioPlaying) {
                pauseAudio();
                showToast('Musik dijeda');
            } else {
                playAudio();
                showToast('Memutar musik perayaan 🎶');
            }
        }

        // 6. Interactive Envelope Open Experience (Tampilan Awal -> Isi Undangan)
        function openInvitation() {
            const coverOverlay = document.getElementById('invitation-cover');
            const mainWrapper = document.getElementById('main-invitation-wrapper');

            // 1. Unhide main invitation content and trigger fade in
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

        // 7. Dynamic Gallery Renderer for Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !Array.isArray(images) || images.length === 0) return;
            grid.innerHTML = '';

            const rotations = ['rotate-[-2deg]', 'rotate-[2deg]', 'rotate-[1.5deg]', 'rotate-[-1.5deg]'];
            images.forEach((url, idx) => {
                const rot = rotations[idx % 4];
                const item = document.createElement('div');
                item.className = `bg-surface-bright p-2 rounded-xl shadow-md ${rot} hover:rotate-0 transition-transform border border-outline-variant/30`;
                item.innerHTML = `
                    <div class="aspect-square w-full rounded-lg overflow-hidden bg-surface-container-low mb-1.5">
                        <img alt="Moment ${idx + 1}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" src="${url}"/>
                    </div>
                    <p class="font-headline text-center text-xs text-tertiary italic tracking-wide truncate">
                        Moment • ${idx + 1}
                    </p>
                `;
                grid.appendChild(item);
            });
        }

        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = '';
            events.forEach((ev, idx) => {
                const item = document.createElement('div');
                item.className = 'bg-surface-container-low rounded-2xl p-4 shadow-sm space-y-3 border border-outline-variant/30';
                const sessionLabel = ev.venue_name || (idx === 0 ? 'Utama • Birthday Dinner' : ('Sesi ' + (idx + 1)));
                const titleStr = ev.title || 'Rangkaian Acara Ulang Tahun';
                const dateStr = ev.date || '{{ $eventDateFormatted }}';
                const timeStr = (ev.start_time || '{{ $eventTimeFormatted }}') + (ev.end_time ? ' – ' + ev.end_time : '');
                const addrStr = ev.address ? `<p class="text-xs text-on-surface-variant mt-1 leading-relaxed">${ev.address}</p>` : '';

                let dressCodeHtml = '';
                if (idx === 0) {
                    dressCodeHtml = `
                    <div class="bg-surface-bright rounded-xl p-3 space-y-1.5 border border-outline-variant/20">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-primary text-[16px]">checkroom</span>
                            <span class="text-[11px] text-on-surface font-semibold uppercase">Dress Code Tamu Undangan</span>
                        </div>
                        <p class="text-xs text-on-surface-variant">
                            Rustic Pastel / Nuansa Coral, Soft Peach, Terracotta &amp; Warm Earthy Cream.
                        </p>
                        <div class="flex items-center flex-wrap gap-2 pt-1">
                            <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                <span class="w-3.5 h-3.5 rounded-full bg-primary shadow-inner"></span>
                                <span class="text-on-surface">Terracotta</span>
                            </div>
                            <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                <span class="w-3.5 h-3.5 rounded-full bg-primary-fixed-dim shadow-inner"></span>
                                <span class="text-on-surface">Peach</span>
                            </div>
                            <div class="flex items-center gap-1 bg-surface-container px-2 py-0.5 rounded-full text-[10px]">
                                <span class="w-3.5 h-3.5 rounded-full bg-secondary-fixed shadow-inner"></span>
                                <span class="text-on-surface">Sage</span>
                            </div>
                        </div>
                    </div>`;
                }

                item.innerHTML = `
                    <div class="flex items-start gap-3">
                        <div class="w-11 h-11 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0 mt-0.5">
                            <span class="material-symbols-outlined text-[22px]">${idx === 0 ? 'nightlife' : 'cake'}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed text-[10px] font-semibold mb-1">
                                ${sessionLabel}
                            </span>
                            <h4 class="font-headline text-base text-on-surface truncate font-semibold">
                                ${titleStr}
                            </h4>
                            <p class="text-xs text-on-surface-variant mt-0.5 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[16px] text-tertiary">event</span>
                                <span class="previewEventDate">${dateStr}</span>
                            </p>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1.5 mt-0.5">
                                <span class="material-symbols-outlined text-[16px] text-tertiary">schedule</span>
                                <span class="previewEventTime">${timeStr}</span>
                            </p>
                            ${addrStr}
                        </div>
                    </div>
                    ${dressCodeHtml}
                `;
                container.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultProfileImg = "{{ $profileImg }}";

        // 8. Live Preview postMessage Handshake & Listener
        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover' && photoUrl) {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if ((target === 'groom' || target === 'bride' || target === 'star' || target === 'person') && photoUrl) {
                    const profileEl = document.getElementById('previewGroomPhotoImg');
                    if (profileEl) profileEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if ((target === 'groom' || target === 'bride' || target === 'star' || target === 'person') && photoUrl) {
                    const profileEl = document.getElementById('previewGroomPhotoImg');
                    if (profileEl) profileEl.src = defaultProfileImg;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_EVENTS') {
                if (Array.isArray(data.events)) {
                    renderDynamicEvents(data.events);
                }
            } else if (data.type === 'UPDATE_PREVIEW_PARENTS') {
                const pEl = document.getElementById('previewParents');
                const formatted = data.formatted || data.groomParents;
                if (pEl && formatted) {
                    pEl.textContent = formatted;
                }
            } else if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const value = data.value;

                if (field === 'groom_name' || field === 'name') {
                    const n1 = document.getElementById('previewGroomNameCover');
                    const n2 = document.getElementById('previewGroomName');
                    if (n1) n1.textContent = value;
                    if (n2) n2.textContent = value;
                } else if (field === 'event_heading') {
                    const hEls = document.querySelectorAll('h1.font-headline');
                    hEls.forEach(el => el.textContent = value);
                } else if (field === 'quote' || field === 'event_quote') {
                    const qEl = document.getElementById('previewEventQuote');
                    if (qEl) qEl.textContent = value;
                } else if (field === 'guest_name') {
                    const gEl = document.getElementById('previewGuestNameCover');
                    const gInp = document.getElementById('guest-name');
                    if (gEl) gEl.textContent = value;
                    if (gInp) gInp.value = value;
                } else if (field === 'venue_name') {
                    const vEl = document.getElementById('previewVenueName');
                    if (vEl) vEl.textContent = value;
                } else if (field === 'venue_address') {
                    const aEl = document.getElementById('previewVenueAddress');
                    if (aEl) aEl.textContent = value;
                } else if (field === 'sub_category') {
                    const sEl = document.getElementById('previewSubCategoryBadge');
                    const sMain = document.getElementById('previewSubCategoryBadgeMain');
                    const sPill = document.getElementById('previewSubCategoryPill');
                    if (sEl) sEl.textContent = value;
                    if (sMain) sMain.textContent = value;
                    if (sPill) sPill.textContent = value;
                }
            }
        });

        // Handshake notify parent window that iframe is ready
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
        }
    </script>
</body>
</html>
