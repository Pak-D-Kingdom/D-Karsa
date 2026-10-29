<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Rustic Purple Dream') . ' - ' . ($couple->groom_name ?? 'Aurellia Keisha Putri') }} | D'Karsa</title>
    <meta name="description" content="Perayaan Ulang Tahun {{ $couple->groom_name ?? 'Aurellia Keisha Putri' }} - Rustic Purple Dream."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Rustic Purple Dream Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#53345f",
                        "primary-container": "#6c4b78",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#e9c0f4",
                        "primary-fixed": "#f8d8ff",
                        "secondary": "#6d5b44",
                        "secondary-container": "#f8dfc1",
                        "on-secondary-container": "#74614a",
                        "secondary-fixed": "#f8dfc1",
                        "tertiary": "#33442a",
                        "tertiary-container": "#4a5c40",
                        "tertiary-fixed": "#d4e9c4",
                        "on-tertiary-fixed": "#101f09",
                        "background": "#fff7fc",
                        "on-background": "#211826",
                        "surface": "#fff7fc",
                        "on-surface": "#211826",
                        "surface-variant": "#eeddf2",
                        "on-surface-variant": "#4c444d",
                        "surface-container": "#fae8fd",
                        "surface-container-low": "#fdefff",
                        "surface-container-high": "#f4e3f8",
                        "surface-container-highest": "#eeddf2",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#fff7fc",
                        "outline": "#7d747d",
                        "outline-variant": "#cec3cd"
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
            background-color: #fff7fc;
            color: #211826;
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
<body class="bg-background text-on-surface antialiased overflow-hidden">

    @php
        $celebrantName = $couple->groom_name ?? 'Aurellia Keisha Putri';
        $celebrantNick = $couple->groom_nickname ?? 'Aurellia';
        $heading = $couple->event_heading ?? 'Rustic Purple Dream';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Ulang Tahun Remaja • Sweet 17';
        $guestName = $guest->name ?? request('to') ?? request('guest') ?? 'Sahabat & Keluarga Terkasih';
        $quote = $couple->quote ?? 'Tujuh belas tahun penuh anugerah dan cinta. Setiap detik adalah kelopak bunga yang mekar di taman kehidupan.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDUX3W9wcx9qK6OeMxJ_-QWLWl7-ECMAH1p5ONi2MAbP5dw4k0F7qbBK-oWrw8eKQIl-zcl2x2-B1sHgvmwJ1JZEqtk6HT4CRHYJ9Anwp5IHwfZnXxvgTvN1UBhkdS1Zi5tLLpZLHceb7jUSp4WSZklz4ZrhN3zyuAUXAlVHtQqM4xd2N24mW2JIru3hQPW-PjV1xcb2qUNuSyaSzJsgsabSIvuVV2Ol0xvKeVrzANATdZUHWfPxUmrJg';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDldcZjbtPn4RRDd5IokKWGnZaBYDkjtF7J-n5vtLksDj_KVTcL30mntZHk7QmKyMrODoocXS1WhKKor0Zmgw5QUL3kkScEbXOm3sFrmk7col5WOxd9sZ3IkkU9QCipMhOuj6py_I0o_Gnykxcvnw0ossw0xp7TR2B2vjyDy27IHeT6_Nbc4jNdlSI-R50F_67KoGGJOy7AuOHnrnH9fdaHAYqjVxFPxK2vShRvPGjSo6sbGIH7_ebvxA';
        $profileImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            $defaultProfileImg
        );

        $botanicalImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDUX3W9wcx9qK6OeMxJ_-QWLWl7-ECMAH1p5ONi2MAbP5dw4k0F7qbBK-oWrw8eKQIl-zcl2x2-B1sHgvmwJ1JZEqtk6HT4CRHYJ9Anwp5IHwfZnXxvgTvN1UBhkdS1Zi5tLLpZLHceb7jUSp4WSZklz4ZrhN3zyuAUXAlVHtQqM4xd2N24mW2JIru3hQPW-PjV1xcb2qUNuSyaSzJsgsabSIvuVV2Ol0xvKeVrzANATdZUHWfPxUmrJg';

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? $couple->wedding_time : '16.30 - 20.00 WIB';

        $venueName = $couple->venue_name ?? 'The Lavender Rustic Greenhouse & Garden';
        $venueAddress = $couple->venue_address ?? 'Jl. Cempaka Putih No. 17, Jakarta Pusat (Area Garden Belakang)';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));

        $familyLine = !empty($couple->groom_parents) ? $couple->groom_parents : (!empty($couple->groom_father) && !empty($couple->groom_mother) ? ('Bpk. ' . $couple->groom_father . ' & Ibu ' . $couple->groom_mother) : 'Keluarga Besar Bpk. & Ibu Keisha');

        // Bank / Digital Gift Info
        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'Bank BCA';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->account_number ?? '5420 8912 34';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->account_name ?? 'Aurellia Keisha Putri';

        $bankName2 = $couple->bank_name_2 ?? 'Bank Mandiri';
        $bankAccount2 = $couple->bank_account_2 ?? '137 00 5819 2041';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Aurellia Keisha Putri';

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDldcZjbtPn4RRDd5IokKWGnZaBYDkjtF7J-n5vtLksDj_KVTcL30mntZHk7QmKyMrODoocXS1WhKKor0Zmgw5QUL3kkScEbXOm3sFrmk7col5WOxd9sZ3IkkU9QCipMhOuj6py_I0o_Gnykxcvnw0ossw0xp7TR2B2vjyDy27IHeT6_Nbc4jNdlSI-R50F_67KoGGJOy7AuOHnrnH9fdaHAYqjVxFPxK2vShRvPGjSo6sbGIH7_ebvxA', 'caption' => 'Bunga Lavender & Tawa'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBTOFute75zX2EaW1jQYKKYf-_nJ73J5PTLIQqCOtS0YJtByXvRUZXFCFyx22ODyD1sjlGipZtH5vC-oEUyVgVWzuNSkF3uJx923Rd0shHm6Fqo8v8Q7gMMXe_7X4KJx5r1JINu7at82XJugXLboAkeCrvbuG5CG_P-TR1HNTlYT5VfniNYdEfGa2OiWD10c7hY1SP3668IQHNDEFLwY-l-fZYM7plDfYqdq4B1QgbUsC3faUSYTyQwpw', 'caption' => 'Dekorasi Rustic Garden'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDUX3W9wcx9qK6OeMxJ_-QWLWl7-ECMAH1p5ONi2MAbP5dw4k0F7qbBK-oWrw8eKQIl-zcl2x2-B1sHgvmwJ1JZEqtk6HT4CRHYJ9Anwp5IHwfZnXxvgTvN1UBhkdS1Zi5tLLpZLHceb7jUSp4WSZklz4ZrhN3zyuAUXAlVHtQqM4xd2N24mW2JIru3hQPW-PjV1xcb2qUNuSyaSzJsgsabSIvuVV2Ol0xvKeVrzANATdZUHWfPxUmrJg', 'caption' => 'Harmoni Bunga Kering & Nuansa Hangat'],
            ]);
        }

        // Dynamic Events
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Sunset Gathering & Garden Games',
                    'date' => $eventDateFormatted,
                    'start_time' => '16:30 WIB',
                    'end_time' => '18:00 WIB',
                    'venue_name' => $venueName,
                    'address' => 'The Lavender Greenhouse & Garden — Penyambutan tamu & live acoustic opening.',
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1,
                ],
                (object)[
                    'title' => 'Intimate Dinner & Celebration Night',
                    'date' => $eventDateFormatted,
                    'start_time' => '18:30 WIB',
                    'end_time' => '21:00 WIB',
                    'venue_name' => 'Main Rustic Courtyard',
                    'address' => 'Prosesi perayaan ulang tahun, tiup lilin, potong kue & santap malam bersama.',
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
        <span class="material-symbols-outlined text-secondary-container text-[18px]">verified</span>
        <span id="toast-message">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: SAMPUL AMPLOP INTERAKTIF
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-background flex flex-col items-center justify-between px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out select-none">
        <!-- Ambient orbs (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-surface-container blur-3xl opacity-60"></div>
            <div class="absolute top-1/2 -right-24 w-80 h-80 rounded-full bg-secondary-container blur-3xl opacity-30"></div>
            <div class="absolute -bottom-20 left-1/4 w-80 h-80 rounded-full bg-surface-container-high blur-3xl opacity-70"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Top Banner -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-high/80 text-primary shadow-sm backdrop-blur-sm mb-0.5">
                    <span class="material-symbols-outlined text-[12px] text-tertiary">local_florist</span>
                    <span id="previewSubCategoryCover" class="text-[9.5px] uppercase tracking-widest text-primary font-bold">{{ $subCategoryBadge }}</span>
                    <span class="material-symbols-outlined text-[12px] text-tertiary">local_florist</span>
                </div>
                <p class="font-serif text-[11px] text-secondary italic tracking-wider">
                    The Sweet Seventeen of
                </p>
            </header>

            <!-- Center Showcase (Photo, Name, Guest Card) -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Cover Photo Banner -->
                <div class="relative w-full h-24 rounded-xl overflow-hidden shadow-md border border-outline-variant/30 my-0.5 shrink-0">
                    <img id="previewCoverPhotoImg" alt="Cover Photo" class="w-full h-full object-cover object-center" src="{{ $coverImg }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-primary/10"></div>
                    <div class="absolute bottom-1 left-2.5 right-2.5 flex items-center justify-between text-on-primary">
                        <span class="text-[9px] tracking-wider font-medium opacity-90 flex items-center gap-1 text-white">
                            <span class="material-symbols-outlined text-[11px]">spa</span> Rustic Purple Dream
                        </span>
                        <span class="text-[8.5px] bg-primary/80 backdrop-blur-md px-2 py-0.5 rounded-full tracking-wider uppercase text-white font-bold">
                            Chapter 17
                        </span>
                    </div>
                </div>

                <!-- Celebrant Name & Date -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-serif text-xl sm:text-2xl text-primary tracking-tight font-semibold truncate drop-shadow-sm">
                        {{ $celebrantName }}
                    </h1>
                    <p class="text-[9.5px] uppercase tracking-widest text-secondary font-bold mt-0.5">
                        {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Recipient Tag Card -->
                <div class="w-full bg-surface-container-lowest/90 backdrop-blur-md rounded-xl p-2 shadow-sm text-center mt-0.5 border border-outline-variant/30">
                    <span class="text-[8px] uppercase tracking-wider text-on-surface-variant font-medium block">
                        Kepada Yth. Bapak/Ibu/Saudara/i:
                    </span>
                    <p id="previewGuestNameCover" class="font-serif text-base sm:text-lg text-primary font-semibold tracking-tight truncate mt-0.5">
                        {{ $guestName }}
                    </p>
                    <span class="text-[9.5px] text-secondary tracking-normal italic">di Tempat</span>
                </div>
            </section>

            <!-- CTA Button -->
            <footer class="w-full flex flex-col items-center gap-0.5 pt-0.5 shrink-0">
                <button id="btnOpenInvitation" type="button" class="w-full py-2.5 px-4 rounded-xl bg-primary hover:bg-primary-container text-on-primary text-xs uppercase font-bold tracking-wider shadow-lg active:scale-95 transition-all flex items-center justify-center space-x-2 cursor-pointer pointer-events-auto">
                    <span class="material-symbols-outlined text-[16px]">drafts</span>
                    <span>Buka Undangan</span>
                    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </button>

                <div class="flex items-center space-x-1.5 text-on-surface-variant text-[9px]">
                    <span class="material-symbols-outlined text-[12px] text-primary">volume_up</span>
                    <span>Musik latar otomatis diputar</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN SCREEN: ISI UNDANGAN UTAMA (Rustic Purple Dream)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="w-full min-h-screen bg-surface relative pb-28 opacity-0 transition-opacity duration-700">

        <!-- Fixed Top Header -->
        <header class="fixed top-0 inset-x-0 z-40 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.03)]">
            <div class="h-16 max-w-md mx-auto px-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[22px]">filter_vintage</span>
                    <span id="previewGroomNameHeader" class="font-serif text-base tracking-wide text-primary font-semibold truncate">{{ $heading }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <button id="headerMusicToggle" aria-label="Putar Musik Latar" class="w-10 h-10 rounded-full bg-surface-container-high/80 text-primary flex items-center justify-center transition-transform hover:scale-105 active:scale-95">
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

            <!-- 1. Hero / Dynamic Cover Card -->
            <section class="relative w-full rounded-2xl bg-surface-container-low p-5 shadow-sm overflow-hidden flex flex-col items-center text-center border border-outline-variant/30">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high/90 text-primary mb-3 shadow-sm">
                    <span class="material-symbols-outlined text-[14px]">mail</span>
                    <span id="previewGuestNameMainTag" class="text-xs uppercase tracking-wider font-semibold">Kepada Yth: {{ $guestName }}</span>
                </div>

                <div class="inline-flex items-center gap-1 px-3 py-0.5 rounded-full bg-secondary-fixed/60 text-on-secondary-container mb-2">
                    <span class="material-symbols-outlined text-[13px]">spa</span>
                    <span id="previewSubCategoryBadge" class="text-[10px] uppercase tracking-wider font-bold">{{ $subCategoryBadge }}</span>
                </div>

                <h1 id="previewGroomNameTitle" class="font-serif text-3xl sm:text-4xl text-primary tracking-tight mb-2 font-semibold">
                    {{ $celebrantName }}
                </h1>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-lowest text-secondary mb-4 shadow-sm border border-outline-variant/20">
                    <span class="material-symbols-outlined text-[15px]">calendar_month</span>
                    <span id="previewEventDateHero" class="text-xs font-semibold">{{ $eventDateFormatted }}</span>
                </div>

                <!-- Arched Portrait Frame -->
                <div class="relative w-full max-w-[260px] aspect-[4/5] mx-auto rounded-t-full rounded-b-2xl overflow-hidden shadow-lg p-1.5 bg-surface-container-lowest border border-outline-variant/30">
                    <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden relative">
                        <img id="previewGroomPhotoImg" alt="{{ $celebrantName }}" class="w-full h-full object-cover object-center" src="{{ $profileImg }}"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/20 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                    <div class="absolute bottom-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md rounded-full px-3 py-1 flex items-center gap-1 shadow-sm text-primary">
                        <span class="material-symbols-outlined text-[15px]">spa</span>
                        <span class="text-xs font-bold">17th Blooms</span>
                    </div>
                </div>

                <p id="previewQuoteHero" class="text-sm text-on-surface-variant mt-3 max-w-xs mx-auto leading-relaxed italic">
                    “{{ $quote }}”
                </p>
            </section>

            <!-- 2. Meaningful Quote Card -->
            <section class="w-full rounded-2xl bg-surface-container p-5 text-center relative overflow-hidden shadow-sm border border-outline-variant/30">
                <div class="w-8 h-8 mx-auto mb-2 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[18px]">format_quote</span>
                </div>
                <blockquote id="previewQuote" class="font-serif text-lg text-primary italic mb-2">
                    “{{ $quote }}”
                </blockquote>
                <p class="text-xs text-secondary leading-relaxed font-medium">
                    Rasa syukur yang mendalam atas bimbingan keluarga dan kehangatan sahabat tercinta di setiap langkah.
                </p>
                <p class="text-xs text-on-surface-variant uppercase tracking-widest mt-2 font-bold">
                    {{ $familyLine }}
                </p>
            </section>

            <!-- 3. Countdown Timer Section -->
            <section class="w-full rounded-2xl bg-surface-container-high p-5 shadow-sm flex flex-col items-center border border-outline-variant/30">
                <div class="flex items-center gap-1.5 mb-3 text-primary">
                    <span class="material-symbols-outlined text-[20px]">hourglass_top</span>
                    <span class="text-xs font-bold uppercase tracking-wider">Menghitung Hari Bahagia</span>
                </div>

                <!-- 4-Grid Countdown Pods -->
                <div class="grid grid-cols-4 gap-2 w-full max-w-xs mb-4 text-center" id="countdown-timer">
                    <div class="bg-surface-container-lowest rounded-xl p-2.5 shadow-sm flex flex-col items-center justify-center border border-outline-variant/20">
                        <span class="font-serif text-xl text-primary font-bold" id="cd-days">00</span>
                        <span class="text-[10px] text-on-surface-variant uppercase font-semibold">Hari</span>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-2.5 shadow-sm flex flex-col items-center justify-center border border-outline-variant/20">
                        <span class="font-serif text-xl text-primary font-bold" id="cd-hours">00</span>
                        <span class="text-[10px] text-on-surface-variant uppercase font-semibold">Jam</span>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-2.5 shadow-sm flex flex-col items-center justify-center border border-outline-variant/20">
                        <span class="font-serif text-xl text-primary font-bold" id="cd-mins">00</span>
                        <span class="text-[10px] text-on-surface-variant uppercase font-semibold">Menit</span>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-2.5 shadow-sm flex flex-col items-center justify-center border border-outline-variant/20">
                        <span class="font-serif text-xl text-primary font-bold" id="cd-secs">00</span>
                        <span class="text-[10px] text-on-surface-variant uppercase font-semibold">Detik</span>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($heading . ' - ' . $celebrantName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Sweet Seventeen Celebration of ' . $celebrantName) }}&location={{ urlencode($venueName . ', ' . $venueAddress) }}" target="_blank" rel="noopener noreferrer" class="w-full max-w-xs inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-surface-container-lowest text-primary shadow-sm transition hover:bg-surface active:scale-95 text-xs uppercase font-bold border border-outline-variant/30">
                    <span class="material-symbols-outlined text-[18px]">event</span>
                    <span>Simpan ke Google Calendar</span>
                </a>
            </section>

            <!-- 4. Event Details & Dress Code -->
            <section class="w-full rounded-2xl bg-surface-container-lowest p-5 shadow-sm space-y-3.5 border border-outline-variant/30">
                <div class="flex items-center gap-1.5 text-primary mb-1">
                    <span class="material-symbols-outlined text-[22px]">celebration</span>
                    <h2 class="font-serif text-xl font-semibold">Detail Acara</h2>
                </div>

                <!-- Live Dynamic Events / Agenda Sesi Cards Container -->
                <div id="itineraryContainer" class="space-y-3">
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
                        <div class="p-3.5 rounded-xl bg-surface-container-low flex flex-col gap-2.5 border border-outline-variant/20 shadow-sm text-left">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-fixed text-primary text-[10px] uppercase font-bold tracking-wider">
                                    <span class="material-symbols-outlined text-[13px]">celebration</span>
                                    Sesi {{ $index + 1 }}
                                </span>
                                <span class="text-xs text-primary font-bold">{{ $evTimeStr }}</span>
                            </div>
                            <div>
                                <h3 class="font-serif text-base text-primary font-semibold leading-snug">{{ $event->title ?? ('Acara ' . ($index + 1)) }}</h3>
                                <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-medium mt-1">
                                    <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                                    <span>{{ $evDateStr }}</span>
                                </div>
                            </div>
                            <div class="bg-surface-container-lowest/80 rounded-lg p-2.5 flex items-start gap-2 border border-outline-variant/15">
                                <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                                <div class="min-w-0">
                                    <span class="font-semibold text-xs text-primary block">{{ $evVenue }}</span>
                                    @if(!empty($evAddress))
                                        <p class="text-[11px] text-on-surface-variant leading-relaxed mt-0.5">{{ $evAddress }}</p>
                                    @endif
                                </div>
                            </div>
                            @if(!empty($evMaps))
                                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="w-full py-2 px-3 rounded-lg bg-surface-container-lowest hover:bg-primary hover:text-on-primary text-primary text-xs uppercase font-bold tracking-wider flex items-center justify-center gap-1.5 border border-outline-variant/25 transition-all shadow-sm">
                                    <span class="material-symbols-outlined text-[15px]">directions</span>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="p-3.5 rounded-xl bg-surface-container-low flex items-start gap-3 border border-outline-variant/20">
                    <div class="w-9 h-9 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-container shrink-0">
                        <span class="material-symbols-outlined text-[18px]">styler</span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] text-secondary uppercase font-bold">Aturan Pakaian (Dress Code)</span>
                        <p class="text-sm text-primary font-semibold">Touch of Lavender / Rustic Earth</p>
                        <div class="flex items-center gap-1.5 mt-1.5">
                            <span class="w-4 h-4 rounded-full bg-[#D8C7E3] inline-block shadow-inner" title="Soft Lavender"></span>
                            <span class="w-4 h-4 rounded-full bg-[#B8CDAA] inline-block shadow-inner" title="Sage Green"></span>
                            <span class="w-4 h-4 rounded-full bg-[#E5D5C5] inline-block shadow-inner" title="Warm Beige"></span>
                            <span class="w-4 h-4 rounded-full bg-[#53345F] inline-block shadow-inner" title="Deep Plum"></span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. Photo Gallery Grid -->
            <section class="w-full space-y-3">
                <div class="text-center mb-2">
                    <span class="font-serif text-sm text-secondary italic">Sweet Memories</span>
                    <h2 class="font-serif text-xl text-primary font-semibold">Galeri Momen Ceria</h2>
                </div>

                <div id="previewGalleryGrid" class="grid grid-cols-2 gap-2.5">
                    @if(isset($activeGalleries[0]))
                    <div class="rounded-2xl overflow-hidden bg-surface-container-lowest p-2 shadow-sm flex flex-col border border-outline-variant/30">
                        <img alt="Gallery 1" class="w-full aspect-[4/5] object-cover rounded-xl" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($activeGalleries[0]->image ?? null, $coverImg) }}"/>
                        <p class="text-xs text-secondary text-center mt-2 font-medium">{{ $activeGalleries[0]->caption ?? 'Bunga Lavender & Tawa' }}</p>
                    </div>
                    @endif

                    @if(isset($activeGalleries[1]))
                    <div class="rounded-2xl overflow-hidden bg-surface-container-lowest p-2 shadow-sm flex flex-col border border-outline-variant/30">
                        <img alt="Gallery 2" class="w-full aspect-[4/5] object-cover rounded-xl" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($activeGalleries[1]->image ?? null, $coverImg) }}"/>
                        <p class="text-xs text-secondary text-center mt-2 font-medium">{{ $activeGalleries[1]->caption ?? 'Dekorasi Rustic Garden' }}</p>
                    </div>
                    @endif

                    @if(isset($activeGalleries[2]))
                    <div class="col-span-2 rounded-2xl overflow-hidden bg-surface-container-lowest p-2 shadow-sm flex flex-col border border-outline-variant/30">
                        <img alt="Gallery 3" class="w-full aspect-[16/9] object-cover rounded-xl" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($activeGalleries[2]->image ?? null, $coverImg) }}"/>
                        <p class="text-xs text-secondary text-center mt-2 font-medium">{{ $activeGalleries[2]->caption ?? 'Harmoni Bunga Kering & Nuansa Hangat' }}</p>
                    </div>
                    @endif
                </div>
            </section>

            <!-- 6. Venue & Google Maps Navigation (NO MAP DENAH / BUTTON DIRECT ACTION) -->
            <section class="w-full rounded-2xl bg-surface-container-lowest p-5 shadow-sm flex flex-col space-y-3.5 border border-outline-variant/30">
                <div class="flex items-center gap-2 text-primary">
                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                    <h3 class="font-serif text-lg font-semibold">Lokasi Perayaan</h3>
                </div>

                <div>
                    <h4 id="previewVenueNameMain" class="font-serif text-base text-primary font-semibold">{{ $venueName }}</h4>
                    <p id="previewVenueAddressMain" class="text-xs text-on-surface-variant mt-1 leading-relaxed">
                        {{ $venueAddress }}
                    </p>
                </div>

                <!-- Direct Navigation Action Buttons (No Static Map Denah Image) -->
                <div class="flex flex-col gap-2.5 pt-1">
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="w-full py-3 px-4 rounded-xl bg-primary hover:bg-primary-container text-on-primary text-xs uppercase font-bold flex items-center justify-center gap-2 shadow-md transition active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">directions</span>
                        <span>Buka Petunjuk Arah di Google Maps</span>
                    </a>

                    <button type="button" class="w-full py-2.5 px-4 rounded-xl bg-surface-container-high text-on-surface text-xs uppercase font-semibold flex items-center justify-center gap-1.5 active:scale-95 transition-all" onclick="navigator.clipboard.writeText('{{ addslashes($venueName . ', ' . $venueAddress) }}'); showToast('Alamat berhasil disalin ke clipboard!');">
                        <span class="material-symbols-outlined text-[16px]">content_copy</span>
                        <span>Salin Alamat Lengkap</span>
                    </button>
                </div>
            </section>

            <!-- 7. Interactive RSVP & Wishes Form -->
            <section class="w-full rounded-2xl bg-surface-container-lowest p-5 shadow-sm space-y-4 border border-outline-variant/30" id="rsvp-section">
                <div class="text-center">
                    <span class="font-serif text-xs text-secondary italic">Kehadiran Sahabat</span>
                    <h2 class="font-serif text-xl text-primary font-semibold">Konfirmasi Kehadiran (RSVP)</h2>
                    <p class="text-xs text-on-surface-variant mt-1">
                        Mohon konfirmasi kehadiran demi kenyamanan jamuan bersama.
                    </p>
                </div>

                <form class="space-y-3" onsubmit="event.preventDefault(); document.getElementById('rsvp-alert').classList.remove('hidden'); showToast('Konfirmasi RSVP tersimpan!');">
                    <div class="space-y-1">
                        <label class="text-[10px] text-primary uppercase font-bold block">Nama Lengkap</label>
                        <input class="w-full px-3.5 py-2.5 rounded-xl bg-surface-container-low text-on-surface text-xs outline-none focus:ring-1 focus:ring-primary transition border border-outline-variant/20" required="" type="text" value="{{ $guestName }}"/>
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] text-primary uppercase font-bold block">Konfirmasi Kehadiran</span>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer">
                                <input checked="" class="sr-only peer" name="attendance" type="radio" value="1 Orang"/>
                                <div class="py-2 text-center rounded-xl bg-surface-container-low text-on-surface-variant text-xs peer-checked:bg-tertiary-container peer-checked:text-on-tertiary-container transition font-medium border border-outline-variant/20">
                                    1 Hadir
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input class="sr-only peer" name="attendance" type="radio" value="2 Orang"/>
                                <div class="py-2 text-center rounded-xl bg-surface-container-low text-on-surface-variant text-xs peer-checked:bg-tertiary-container peer-checked:text-on-tertiary-container transition font-medium border border-outline-variant/20">
                                    2 Hadir
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input class="sr-only peer" name="attendance" type="radio" value="Berhalangan"/>
                                <div class="py-2 text-center rounded-xl bg-surface-container-low text-on-surface-variant text-xs peer-checked:bg-secondary-container peer-checked:text-on-secondary-container transition font-medium border border-outline-variant/20">
                                    Absen
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] text-primary uppercase font-bold block">Ucapan & Doa Hangat</label>
                        <textarea class="w-full px-3.5 py-2.5 rounded-xl bg-surface-container-low text-on-surface text-xs outline-none focus:ring-1 focus:ring-primary transition resize-none border border-outline-variant/20" placeholder="Tuliskan harapan dan doa terindah untuk {{ $celebrantName }}..." rows="3"></textarea>
                    </div>
                    <button class="w-full py-3 px-4 rounded-xl bg-primary hover:bg-primary-container text-on-primary text-xs uppercase font-bold flex items-center justify-center gap-2 shadow-md transition active:scale-95" type="submit">
                        <span class="material-symbols-outlined text-[18px]">send</span>
                        <span>Kirim Konfirmasi RSVP</span>
                    </button>
                    <div class="hidden p-3 rounded-xl bg-tertiary-fixed text-on-tertiary-fixed text-center text-xs transition" id="rsvp-alert">
                        Terima kasih banyak! Konfirmasi dan doa Anda telah tersimpan dengan manis. ✨
                    </div>
                </form>

                <!-- Guestbook Stream -->
                <div class="pt-2 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <h4 class="font-serif text-sm text-primary font-semibold">Untaian Doa & Harapan</h4>
                        <span class="text-[10px] text-secondary font-bold uppercase">Terbaru</span>
                    </div>
                    <div class="space-y-2">
                        <div class="p-3 rounded-xl bg-surface-container-low space-y-1 border border-outline-variant/20">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-primary font-bold">Clara Natasha</span>
                                <span class="text-[10px] text-outline">10 mnt lalu</span>
                            </div>
                            <p class="text-xs text-on-surface-variant leading-relaxed">
                                Happy sweet 17th {{ $celebrantName }} sayang! Semoga makin cantik, sukses cita-citanya, dan selalu dikelilingi kebahagiaan! Can't wait to celebrate! ✨💜
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 8. Digital Gift / Tanda Kasih -->
            <section class="w-full rounded-2xl bg-surface-container-low p-5 shadow-sm text-center border border-outline-variant/30 space-y-3">
                <div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-container mx-auto flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">redeem</span>
                </div>
                <h4 class="font-serif text-lg text-primary font-semibold">Tanda Kasih Digital</h4>
                <p class="text-xs text-on-surface-variant max-w-xs mx-auto leading-relaxed">
                    Doa restu Anda merupakan kado terindah bagi kami. Namun jika ingin memberikan tanda kasih secara digital, Anda dapat melalui rekening berikut:
                </p>

                <div class="space-y-2.5 text-left">
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 flex items-center justify-between border border-outline-variant/20 shadow-sm">
                        <div>
                            <span class="text-[10px] text-primary uppercase font-bold tracking-widest block">{{ $bankName1 }}</span>
                            <span class="font-serif text-base text-on-surface font-bold tracking-wider">{{ $bankAccount1 }}</span>
                            <span class="text-xs text-on-surface-variant block">a.n {{ $bankHolder1 }}</span>
                        </div>
                        <button class="bg-secondary-fixed text-on-secondary-container px-3 py-1.5 rounded-lg text-xs uppercase font-bold active:scale-95 transition-transform flex items-center gap-1" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount1) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[14px]">content_copy</span>
                            Salin
                        </button>
                    </div>

                    @if(!empty($bankAccount2))
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 flex items-center justify-between border border-outline-variant/20 shadow-sm">
                        <div>
                            <span class="text-[10px] text-primary uppercase font-bold tracking-widest block">{{ $bankName2 }}</span>
                            <span class="font-serif text-base text-on-surface font-bold tracking-wider">{{ $bankAccount2 }}</span>
                            <span class="text-xs text-on-surface-variant block">a.n {{ $bankHolder2 }}</span>
                        </div>
                        <button class="bg-secondary-fixed text-on-secondary-container px-3 py-1.5 rounded-lg text-xs uppercase font-bold active:scale-95 transition-transform flex items-center gap-1" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount2) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[14px]">content_copy</span>
                            Salin
                        </button>
                    </div>
                    @endif
                </div>
            </section>

            <!-- 9. Closing Section -->
            <footer class="pb-8 text-center flex flex-col items-center">
                <span class="material-symbols-outlined text-primary text-[28px] mb-1">spa</span>
                <p class="font-serif text-lg text-primary font-semibold italic mb-1">
                    Sampai Berjumpa di Hari Bahagia
                </p>
                <p class="text-xs text-on-surface-variant mb-2">
                    Merupakan sebuah kehormatan menyambut kehadiran Anda.
                </p>
                <span id="previewGroomNameClosing" class="text-xs uppercase tracking-[0.2em] text-secondary font-bold">
                    {{ $celebrantName }} & {{ $familyLine }}
                </span>
                <span class="text-[9px] text-outline uppercase tracking-[0.25em] mt-3">#RusticPurpleDream • D'Karsa Digital</span>
            </footer>
        </main>

        <!-- Sticky Bottom Navigation Bar (Centered within max-w-md frame) -->
        <nav class="fixed bottom-0 inset-x-0 z-40 bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(83,52,95,0.06)] border-t border-outline-variant/30">
            <div class="h-16 max-w-md mx-auto px-2 flex items-center justify-around">
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-primary font-bold" href="#">
                    <span class="material-symbols-outlined text-[20px]">mark_email_read</span>
                    <span class="text-[9px] uppercase tracking-wider">Undangan</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#previewEventDateHero">
                    <span class="material-symbols-outlined text-[20px]">event</span>
                    <span class="text-[9px] uppercase tracking-wider">Waktu</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#previewVenueNameMain">
                    <span class="material-symbols-outlined text-[20px]">near_me</span>
                    <span class="text-[9px] uppercase tracking-wider">Lokasi</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-on-surface transition-colors" href="#rsvp-section">
                    <span class="material-symbols-outlined text-[20px]">favorite</span>
                    <span class="text-[9px] uppercase tracking-wider">RSVP</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Scripts: Open Cover, Audio, Countdown, Toast & PostMessage -->
    <script>
        const coverEl = document.getElementById('invitation-cover');
        const mainEl = document.getElementById('main-invitation-wrapper');
        const openBtn = document.getElementById('btnOpenInvitation');
        const sealRing = document.getElementById('waxSealRing');
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
        if (sealRing) sealRing.addEventListener('click', openInvitation);

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

            images.forEach((imgUrl, idx) => {
                const item = document.createElement('div');
                const isWide = (idx % 3 === 2);
                item.className = `${isWide ? 'col-span-2' : 'col-span-1'} rounded-2xl overflow-hidden bg-surface-container-lowest p-2 shadow-sm flex flex-col border border-outline-variant/30`;
                item.innerHTML = `
                    <img alt="Gallery ${idx + 1}" class="w-full ${isWide ? 'aspect-[16/9]' : 'aspect-[4/5]'} object-cover rounded-xl dynamic-gal-item"/>
                    <p class="text-xs text-secondary text-center mt-2 font-medium">Moment • ${idx + 1}</p>
                `;
                const itemImg = item.querySelector('.dynamic-gal-item');
                if (itemImg) itemImg.src = imgUrl;
                grid.appendChild(item);
            });
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
                card.className = 'p-3.5 rounded-xl bg-surface-container-low flex flex-col gap-2.5 border border-outline-variant/20 shadow-sm text-left';
                card.innerHTML = `
                    <div class="flex items-center justify-between gap-2">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-fixed text-primary text-[10px] uppercase font-bold tracking-wider">
                            <span class="material-symbols-outlined text-[13px]">celebration</span>
                            Sesi ${idx + 1}
                        </span>
                        <span class="text-xs text-primary font-bold">${timeStr}</span>
                    </div>
                    <div>
                        <h3 class="font-serif text-base text-primary font-semibold leading-snug">${escapeHtml(ev.title || ('Acara ' + (idx + 1)))}</h3>
                        <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-medium mt-1">
                            <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                            <span>${escapeHtml(dateStr)}</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest/80 rounded-lg p-2.5 flex items-start gap-2 border border-outline-variant/15">
                        <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                        <div class="min-w-0">
                            <span class="font-semibold text-xs text-primary block">${escapeHtml(venueStr)}</span>
                            ${addressStr ? `<p class="text-[11px] text-on-surface-variant leading-relaxed mt-0.5">${escapeHtml(addressStr)}</p>` : ''}
                        </div>
                    </div>
                    ${mapsUrl ? `
                        <a href="${mapsUrl}" target="_blank" rel="noopener noreferrer" class="w-full py-2 px-3 rounded-lg bg-surface-container-lowest hover:bg-primary hover:text-on-primary text-primary text-xs uppercase font-bold tracking-wider flex items-center justify-center gap-1.5 border border-outline-variant/25 transition-all shadow-sm">
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
                    const elTitle = document.getElementById('previewGroomNameTitle');
                    const elClosing = document.getElementById('previewGroomNameClosing');
                    if (elCover) elCover.innerText = val || "{{ $celebrantName }}";
                    if (elTitle) elTitle.innerText = val || "{{ $celebrantName }}";
                    if (elClosing) elClosing.innerText = `${val || '{{ $celebrantName }}'} & {{ $familyLine }}`;
                }

                if (field === 'sub_category') {
                    const elSubCover = document.getElementById('previewSubCategoryCover');
                    const elSubBadge = document.getElementById('previewSubCategoryBadge');
                    if (elSubCover) elSubCover.innerText = val || "{{ $subCategoryBadge }}";
                    if (elSubBadge) elSubBadge.innerText = val || "{{ $subCategoryBadge }}";
                }

                if (field === 'quote' || field === 'event_quote') {
                    const elQHero = document.getElementById('previewQuoteHero');
                    const elQ = document.getElementById('previewQuote');
                    if (elQHero) elQHero.innerText = `“${val || '{{ $quote }}'}”`;
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
                    const elGMain = document.getElementById('previewGuestNameMainTag');
                    if (elGCover) elGCover.innerText = val || "{{ $guestName }}";
                    if (elGMain) elGMain.innerText = `Kepada Yth: ${val || '{{ $guestName }}'}`;
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
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover' || target === 'cover_photo') {
                    const coverEl = document.getElementById('previewCoverPhotoImg') || document.getElementById('previewCoverPhoto');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'groom_photo' || target === 'bride' || target === 'star' || target === 'person' || !target) {
                    const profileEl = document.getElementById('previewGroomPhotoImg') || document.getElementById('previewGroomPhoto');
                    if (profileEl) profileEl.src = defaultProfileImg;
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
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'rustic-purple-dream' }, '*');
        }
    </script>
</body>
</html>
