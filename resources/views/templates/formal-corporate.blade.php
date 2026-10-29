<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Official Executive Summit') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Resmi Peresmian, Gala Dinner & Forum Strategis {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Official Executive Summit') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan hormat kami mengundang Bapak/Ibu pimpinan instansi & mitra strategis untuk menghadiri perhelatan resmi {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200' }}">

    <!-- Google Fonts: Swiss Tech & High-End Executive Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Syne:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        exec: {
                            slate: '#0B1120',
                            card: '#131D31',
                            cardlight: '#1E2B45',
                            cobalt: '#2563EB',
                            cobaltbright: '#60A5FA',
                            silver: '#E2E8F0',
                            border: '#283858',
                            hairline: 'rgba(96, 165, 250, 0.25)',
                        }
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        mono: ['Space Grotesk', 'monospace'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Architectural Grid Mesh */
        .swiss-grid {
            background-color: #0B1120;
            background-image: linear-gradient(rgba(37, 99, 235, 0.08) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(37, 99, 235, 0.08) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Executive Lanyard Card */
        .lanyard-pass {
            background: linear-gradient(160deg, #131D31 0%, #0E1626 100%);
            border: 1px solid rgba(96, 165, 250, 0.35);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7), 0 0 25px rgba(37, 99, 235, 0.2);
        }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: toastSlide 2.8s ease forwards;
        }

        /* Hide scrollbars for app-like clean viewport */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="swiss-grid text-slate-200 font-sans antialiased selection:bg-exec-cobalt selection:text-white overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200'
        );
        $corpLogo = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '08:30 WIB';

        $corpName = $couple->groom_name ?? 'PT Mega Inovasi Nusantara Tbk';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-exec-card border border-exec-border shadow-2xl flex items-center justify-center text-exec-cobaltbright hover:scale-105 transition" title="Audio Keynote">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🏛️</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-exec-card border border-exec-cobalt text-white text-xs font-mono rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-exec-cobaltbright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         EXECUTIVE DELEGATE PASS COVER SCREEN (Full Screen Mobile Cover)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-exec-slate swiss-grid flex flex-col justify-between items-center px-3.5 py-3 sm:py-5 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <!-- Ambient Executive Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-exec-cobalt/25 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-exec-cobaltbright/15 blur-3xl"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#131D31]/80 via-transparent to-[#0B1120]/90"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            
            <!-- TOP BAR: Security Level & Doc Ref -->
            <header class="w-full flex flex-col items-center shrink-0">
                <div class="w-full flex items-center justify-between pb-1.5 border-b border-white/10 text-[8.5px] font-mono tracking-[0.2em] text-slate-400 uppercase">
                    <span class="flex items-center gap-1.5 text-exec-cobaltbright font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-exec-cobaltbright animate-ping"></span>
                        SECURITY LEVEL: VIP
                    </span>
                    <span>DOC REF: #{{ rand(10000, 99999) }}</span>
                </div>

                <!-- Logo & Heading Pill -->
                <div class="mt-1.5 flex flex-col items-center text-center">
                    <div class="w-10 h-10 rounded-xl bg-exec-cobalt/20 border border-exec-cobalt/40 p-0.5 mb-1 shadow-md shadow-exec-cobalt/20 overflow-hidden">
                        <img id="previewGroomPhotoImg" src="{{ $corpLogo }}" alt="{{ $corpName }}" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full text-[8.5px] font-mono font-bold tracking-[0.2em] uppercase bg-exec-cobalt/15 text-exec-cobaltbright border border-exec-cobalt/30">
                        {{ $couple->event_heading ?? "ANNUAL STRATEGIC SUMMIT" }}
                    </span>
                </div>
            </header>

            <!-- CENTER SECTION: Panoramic Cover Picture & Institution Details -->
            <section class="w-full my-auto py-1 flex flex-col items-center text-center">
                <!-- Panoramic Cover Image Frame -->
                <div class="relative w-full h-24 sm:h-28 rounded-xl overflow-hidden border border-white/15 shadow-xl my-1 bg-exec-card shrink-0">
                    <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Corporate Event" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-exec-slate/85 via-transparent to-transparent pointer-events-none"></div>
                </div>

                <!-- Host Institution Name & Details -->
                <div class="mt-1 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-syne text-base sm:text-lg font-black text-white tracking-wide leading-tight truncate">
                        {{ $corpName }}
                    </h1>
                    <p id="previewSubCategoryBadge" class="font-mono text-[10px] text-exec-cobaltbright mt-0.5 tracking-wider uppercase font-semibold">
                        {{ $couple->sub_category ?? 'Grand Opening & Gala Dinner' }}
                    </p>
                    <p id="previewEventDateCover" class="text-[9.5px] text-slate-300 font-sans mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Official Delegate Card (Kepada Yth) -->
                <div class="w-full py-1.5 px-3 rounded-xl bg-exec-card/90 backdrop-blur-md border border-white/10 text-center shadow-md mt-1">
                    <span class="text-[8px] font-mono uppercase tracking-[0.2em] text-slate-400 block font-semibold">OFFICIAL DELEGATE PASS:</span>
                    <p id="previewGuestNameCover" class="font-syne text-xs sm:text-sm font-bold text-white mt-0.5 truncate">
                        {{ $guest->name ?? 'Pimpinan Delegasi / Mitra Strategis' }}
                    </p>
                    <span class="inline-block text-[7.5px] font-mono text-exec-cobaltbright tracking-widest uppercase mt-0.5">Confirmed VIP Access</span>
                </div>
            </section>

            <!-- BOTTOM SECTION: Full-width CTA Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-1 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full py-2.5 sm:py-3 px-5 rounded-xl bg-exec-cobalt hover:bg-blue-600 active:scale-[0.98] text-white font-syne text-xs font-bold uppercase tracking-[0.22em] shadow-[0_10px_25px_-5px_rgba(37,99,235,0.6)] transition-all flex items-center justify-center gap-2 cursor-pointer pointer-events-auto">
                    <span>✦</span> BUKA DOKUMEN RESMI <span>&rarr;</span>
                </button>
                <p class="text-[9px] font-mono text-slate-400 flex items-center gap-1">
                    <span class="text-exec-cobaltbright">♫</span> Audio resmi diputar saat dokumen dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (Swiss Architectural Layout)
         ======================================================== -->
    <main id="mainContent" class="max-w-[520px] mx-auto min-h-screen bg-exec-slate text-slate-200 shadow-2xl relative border-x border-exec-border">

        <!-- Top Header Masthead -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-exec-card to-exec-slate border-b border-exec-border relative">
            <span id="previewEventHeading" class="inline-block px-3.5 py-1 rounded-full text-[9px] font-mono uppercase tracking-[0.3em] bg-exec-cobalt/20 text-exec-cobaltbright border border-exec-cobalt/30 mb-3 font-semibold">
                {{ $couple->event_heading ?? "EXECUTIVE GALA & SUMMIT" }}
            </span>
            <div class="relative w-20 h-20 mx-auto my-3 rounded-2xl overflow-hidden border border-exec-cobalt/40 shadow-lg bg-exec-card">
                <img id="previewGroomPhotoImg2" src="{{ $corpLogo }}" alt="{{ $corpName }}" class="w-full h-full object-cover">
            </div>
            <h1 id="previewGroomName" class="font-syne text-2xl sm:text-3xl font-black text-white tracking-wide my-2 leading-tight">
                {{ $corpName }}
            </h1>
            <p id="previewEventDateTime" class="text-xs font-mono text-slate-400 tracking-wider">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <div class="mt-4 flex items-center justify-center gap-2 text-xs text-exec-cobaltbright font-mono">
                <span>📍</span>
                <span id="previewVenueName">{{ $couple->venue_name ?? 'Grand Ballroom, The Ritz-Carlton' }}</span>
            </div>
        </header>

        <!-- Foreword / Keynote Executive Statement -->
        <section class="py-12 px-6 border-b border-exec-border text-center">
            <div class="p-6 rounded-2xl bg-exec-card border border-white/10 shadow-lg">
                <span class="text-[9px] font-mono uppercase tracking-[0.25em] text-exec-cobaltbright font-bold block mb-2">PENGANTAR RESMI DIREKSI</span>
                <p id="previewQuote" class="font-sans text-xs sm:text-sm text-slate-300 italic leading-relaxed">
                    "{{ $couple->quote ?? 'Kolaborasi dan inovasi berkelanjutan adalah kunci utama dalam membangun ekosistem bisnis yang berdaya saing global. Merupakan kehormatan bagi kami untuk menyambut kehadiran Bapak/Ibu sekalian.' }}"
                </p>

                <div class="my-4 w-12 h-px bg-exec-cobalt/40 mx-auto"></div>

                @php
                    $fcParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
                @endphp
                <p id="previewParentsContainer" class="text-xs text-slate-400 {{ empty($fcParents) ? 'hidden' : '' }}">
                    Dewan Direksi &amp; Panitia Pelaksana:<br>
                    <b id="previewParentsNames" class="text-sm font-syne text-white block mt-1">
                        {{ $fcParents }}
                    </b>
                </p>
            </div>
        </section>

        <!-- Countdown to Summit Day -->
        <section class="py-12 px-6 bg-exec-card/40 border-b border-exec-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-exec-cobaltbright block mb-1">COUNTDOWN TO SUMMIT</span>
            <h3 class="font-syne text-xl font-bold text-white mb-6">Menghitung Waktu Pembukaan</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-exec-slate border border-exec-border text-center shadow">
                    <span id="cdDays" class="block font-mono text-2xl font-bold text-exec-cobaltbright">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-exec-slate border border-exec-border text-center shadow">
                    <span id="cdHours" class="block font-mono text-2xl font-bold text-exec-cobaltbright">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-exec-slate border border-exec-border text-center shadow">
                    <span id="cdMinutes" class="block font-mono text-2xl font-bold text-exec-cobaltbright">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-exec-slate border border-exec-border text-center shadow">
                    <span id="cdSeconds" class="block font-mono text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Official Executive Summit') . ' - ' . $corpName);
                $calDetails = urlencode('Menghadiri perhelatan resmi corporate executive summit & gala dinner.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-exec-cardlight hover:bg-exec-border text-exec-cobaltbright text-[10px] font-mono tracking-widest uppercase transition border border-exec-border">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Executive Run of Show (Itinerary) -->
        <section class="py-14 px-6 border-b border-exec-border">
            <div class="text-center mb-10">
                <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-exec-cobaltbright block">RUN OF SHOW</span>
                <h2 class="font-syne text-2xl font-bold text-white mt-1">Agenda Acara &amp; Timeline 🏛️</h2>
            </div>

            @php
                $activeEvents = collect($couple->events ?? []);
                if ($activeEvents->isEmpty()) {
                    $activeEvents = collect([
                        (object)[
                            'title' => 'VIP Delegate Check-in & Coffee Reception',
                            'start_time' => '08:30 WIB',
                            'end_time' => '09:30 WIB',
                            'venue_name' => 'SESI I • REGISTRASI & NETWORKING',
                            'address' => 'Pemeriksaan tanda kepesertaan delegasi, welcome drink, dan interaksi networking antar eksekutif.'
                        ],
                        (object)[
                            'title' => 'Keynote Speech & Ribbon Cutting Ceremony',
                            'start_time' => '09:30 WIB',
                            'end_time' => '11:30 WIB',
                            'venue_name' => 'SESI II • KEYNOTE & LAUNCHING',
                            'address' => 'Sambutan jajaran pimpinan kementerian/lembaga, pemutaran video roadmap strategis, dan seremoni peresmian.'
                        ],
                        (object)[
                            'title' => 'Executive Luncheon & Entertainment',
                            'start_time' => '12:00 WIB',
                            'end_time' => '14:30 WIB',
                            'venue_name' => 'SESI III • GALA DINNER',
                            'address' => 'Santap siang eksklusif, hiburan orkestra simfoni, dan penandatanganan nota kesepahaman (MoU).'
                        ]
                    ]);
                }
            @endphp

            <div id="itineraryContainer" class="space-y-4 max-w-sm mx-auto">
                @foreach($activeEvents as $idx => $ev)
                    <div class="p-5 rounded-2xl bg-exec-card {{ $idx === 1 ? 'border border-exec-cobalt/50 shadow-md' : 'border border-white/10' }}">
                        <div class="flex items-center justify-between text-exec-cobaltbright text-xs font-mono mb-1">
                            <span>{{ !empty($ev->venue_name) ? strtoupper($ev->venue_name) : ('SESI ' . ($idx + 1)) }}</span>
                            <span>{{ $ev->start_time ?? '' }} {{ !empty($ev->end_time) ? ' - ' . $ev->end_time : '' }}</span>
                        </div>
                        <h3 class="font-syne text-base font-bold text-white">{{ $ev->title ?? ('Agenda ' . ($idx + 1)) }}</h3>
                        <p class="text-xs text-slate-300 mt-1">{{ $ev->address ?? $ev->description ?? 'Rangkaian agenda resmi perhelatan eksekutif.' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-exec-card border border-white/10 text-center">
                <span class="text-[9px] font-mono uppercase tracking-[0.2em] text-exec-cobaltbright block mb-1">LOKASI &amp; VENUE RESMI</span>
                <h3 id="previewVenueNameMain" class="font-syne text-lg font-bold text-white">{{ $couple->venue_name ?? 'Grand Ballroom, The Ritz-Carlton' }}</h3>
                <p id="previewVenueAddress" class="text-xs text-slate-400 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Mega Kuningan Barat No. 1, Jakarta Selatan' }}</p>
                
                @php
                    $mapLink = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? ''))));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-exec-cobalt hover:bg-blue-600 text-white text-xs font-syne font-bold uppercase tracking-wider shadow transition">
                        <span>📍</span> Buka Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Visual Archive (Galeri Acara) -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-exec-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-exec-cobaltbright block mb-1">CORPORATE ARCHIVE</span>
            <h2 class="font-syne text-2xl font-bold text-white mb-6">Dokumentasi &amp; Kilas Balik 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl(
                            is_object($gal) ? ($gal->image ?? null) : ($gal ?? null),
                            'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800'
                        );
                    @endphp
                    <div class="p-2 rounded-xl bg-exec-card border border-white/10 shadow">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-exec-slate">
                            <img src="{{ $imgSrc }}" alt="Corporate Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Informasi Rekening Kemitraan (Digital Sponsorship / Gift) -->
        <section class="py-14 px-6 border-b border-exec-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-exec-cobaltbright block mb-1">INFORMASI KEMITRAAN</span>
            <h2 class="font-syne text-2xl font-bold text-white mb-3">Rekening Resmi Acara</h2>
            <p class="text-xs text-slate-400 max-w-xs mx-auto mb-6 leading-relaxed">
                Untuk konfirmasi sponsorship, kemitraan strategis, dan administrasi delegasi dapat dilakukan melalui rekening resmi perhelatan:
            </p>

            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-exec-card border border-exec-cobalt/40 shadow-xl text-center">
                <div class="inline-block px-3 py-1 bg-exec-slate text-exec-cobaltbright text-[10px] font-mono font-bold tracking-widest uppercase mb-2 border border-exec-cobalt/30">
                    {{ $couple->bank_name ?? 'BANK MANDIRI (CORPORATE)' }}
                </div>
                <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '1370009988776' }}
                </p>
                <p class="text-xs text-slate-400 mb-4">a.n {{ $couple->account_name ?? $corpName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '1370009988776' }}', 'Nomor rekening resmi berhasil disalin')" class="w-full py-2.5 rounded-lg bg-exec-cobalt/20 hover:bg-exec-cobalt/30 text-exec-cobaltbright text-xs font-mono font-bold uppercase tracking-wider border border-exec-cobalt/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-xl bg-exec-card border border-white/10 text-center">
                    <span class="text-[9px] font-mono text-exec-cobaltbright uppercase font-bold block mb-1">SEKRETARIAT PANITIA</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat sekretariat disalin')" class="mt-2 text-[10px] text-exec-cobaltbright hover:underline font-mono uppercase">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & Delegate Guestbook Section -->
        <section class="py-14 px-6 border-b border-exec-border">
            <div class="text-center mb-8">
                <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-exec-cobaltbright block">DELEGATE CONFIRMATION</span>
                <h2 class="font-syne text-2xl font-bold text-white mt-1">Konfirmasi Delegasi &amp; Ucapan</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-exec-card p-6 rounded-2xl border border-white/10 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Nama Delegasi &amp; Instansi</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama & Perusahaan/Instansi" class="w-full px-4 py-2.5 rounded-xl bg-exec-slate border border-white/15 text-xs text-white focus:outline-none focus:border-exec-cobalt">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-exec-slate border border-white/15 text-xs text-white focus:outline-none focus:border-exec-cobalt">
                            <option value="Hadir">✓ Hadir Penuh (In-Person)</option>
                            <option value="Tidak Hadir">✗ Diwakilkan / Berhalangan</option>
                            <option value="Ragu-ragu">? Menyesuaikan Jadwal Dinas</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Ucapan Sukses &amp; Harapan Kerjasama</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan selamat atas peresmian & kerjasama strategis..." class="w-full px-4 py-2.5 rounded-xl bg-exec-slate border border-white/15 text-xs text-white focus:outline-none focus:border-exec-cobalt"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-exec-cobalt hover:bg-blue-600 text-white font-syne text-xs font-bold uppercase tracking-wider shadow transition">
                        Kirim Konfirmasi Kehadiran 🏛️
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-syne text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Apresiasi Mitra Strategis</span>
                    <span class="text-xs font-mono text-exec-cobaltbright">{{ isset($wishes) ? count($wishes) : 0 }} Delegasi</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Mitra Delegasi';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-exec-card border border-white/10 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-white font-syne">{{ $wName }}</b>
                                    <span class="text-[9px] font-mono px-2 py-0.5 rounded bg-exec-slate text-exec-cobaltbright">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-exec-card border border-white/10 text-center text-xs text-slate-400 italic">
                            Belum ada konfirmasi tercatat. Jadilah mitra pertama yang mengonfirmasi!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-black text-slate-500 border-t border-exec-border">
            <p class="font-syne text-lg text-white mb-1">{{ $corpName }}</p>
            <p class="text-xs text-slate-500 font-mono tracking-wider">OFFICIAL CORRESPONDENCE • THANK YOU</p>
            <div class="mt-6 pt-4 border-t border-white/10 text-[9px] text-slate-600 font-mono">
                D'KARSA DIGITAL INVITATION • © {{ date('Y') }}
            </div>
        </footer>

    </main>

    <!-- Scripts -->
    <script>
        const audio = document.getElementById('invitationAudio');
        const audioBtn = document.getElementById('audioFloatingBtn');
        const audioIcon = document.getElementById('audioDiscIcon');
        let isPlaying = false;

        function toggleAudio() {
            if (!audio) return;
            if (isPlaying) {
                audio.pause();
                isPlaying = false;
                audioIcon.classList.remove('animate-spin');
                audioIcon.textContent = '🔇';
            } else {
                audio.play().then(() => {
                    isPlaying = true;
                    audioIcon.classList.add('animate-spin');
                    audioIcon.textContent = '🏛️';
                }).catch(e => console.log('Audio playback:', e));
            }
        }

        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.pointerEvents = 'none';
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    cover.classList.add('hidden');
                    cover.style.display = 'none';
                    document.body.classList.remove('overflow-hidden');
                }, 700);
            }
            if (audioBtn) audioBtn.classList.remove('hidden');
            toggleAudio();
        }
        window.openInvitation = openInvitation;

        function copyToClipboard(text, msg) {
            navigator.clipboard.writeText(text).then(() => {
                showToast(msg || 'Berhasil disalin');
            }).catch(() => {
                showToast('Gagal menyalin');
            });
        }

        function showToast(text) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMessage');
            if (!toast || !toastMsg) return;
            toastMsg.textContent = text;
            toast.classList.remove('hidden');
            toast.classList.add('toast-active');
            setTimeout(() => {
                toast.classList.remove('toast-active');
                toast.classList.add('hidden');
            }, 2800);
        }

        // Live Countdown Clock
        const targetDateMs = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}").getTime();
        function updateCountdown() {
            const now = new Date().getTime();
            const diff = targetDateMs - now;

            if (diff > 0) {
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById('cdDays').textContent = String(days).padStart(2, '0');
                document.getElementById('cdHours').textContent = String(hours).padStart(2, '0');
                document.getElementById('cdMinutes').textContent = String(minutes).padStart(2, '0');
                document.getElementById('cdSeconds').textContent = String(seconds).padStart(2, '0');
            } else {
                document.getElementById('cdDays').textContent = '00';
                document.getElementById('cdHours').textContent = '00';
                document.getElementById('cdMinutes').textContent = '00';
                document.getElementById('cdSeconds').textContent = '00';
            }
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();

        // AJAX RSVP and Wishes Submission
        function handleFormSubmit(e, form) {
            e.preventDefault();
            const formData = new FormData(form);
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.textContent;
            btn.disabled = true;
            btn.textContent = 'Mengirim...';

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Konfirmasi delegasi berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Mitra Delegasi';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-exec-card border border-white/10 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-white font-syne">${name}</b>
                            <span class="text-[9px] font-mono px-2 py-0.5 rounded bg-exec-slate text-exec-cobaltbright">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas konfirmasi kehadiran Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid) return;
            if (!images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url, idx) => {
                const item = document.createElement('div');
                item.className = 'p-2 rounded-xl bg-exec-card border border-white/10 shadow';
                item.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-exec-slate">
                        <img src="${url}" alt="Corporate Moment ${idx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
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
                item.className = 'p-5 rounded-2xl bg-exec-card ' + (idx === 1 ? 'border border-exec-cobalt/50 shadow-md' : 'border border-white/10');
                const sessionLabel = ev.venue_name ? ev.venue_name.toUpperCase() : ('SESI ' + (idx + 1));
                const timeStr = (ev.start_time || '') + (ev.end_time ? ' - ' + ev.end_time : '');
                const titleStr = ev.title || ('Agenda ' + (idx + 1));
                const descStr = ev.address || ev.description || 'Rangkaian agenda resmi perhelatan eksekutif.';
                item.innerHTML = `
                    <div class="flex items-center justify-between text-exec-cobaltbright text-xs font-mono mb-1">
                        <span>${sessionLabel}</span>
                        <span>${timeStr}</span>
                    </div>
                    <h3 class="font-syne text-base font-bold text-white">${titleStr}</h3>
                    <p class="text-xs text-slate-300 mt-1">${descStr}</p>
                `;
                container.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultCorpLogo = "{{ $corpLogo }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if (target === 'groom' || target === 'corporate' || target === 'logo' || target === 'person') {
                    const logoEl1 = document.getElementById('previewGroomPhotoImg');
                    const logoEl2 = document.getElementById('previewGroomPhotoImg2');
                    if (logoEl1) logoEl1.src = photoUrl;
                    if (logoEl2) logoEl2.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'corporate' || target === 'logo' || target === 'person') {
                    const logoEl1 = document.getElementById('previewGroomPhotoImg');
                    const logoEl2 = document.getElementById('previewGroomPhotoImg2');
                    if (logoEl1) logoEl1.src = defaultCorpLogo;
                    if (logoEl2) logoEl2.src = defaultCorpLogo;
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
                const containerEl = document.getElementById('previewParentsContainer');
                const parentsEl = document.getElementById('previewParentsNames');
                const formatted = data.formatted || data.groomParents;
                if (parentsEl && formatted) {
                    parentsEl.textContent = formatted;
                    if (containerEl) containerEl.classList.remove('hidden');
                }
            } else if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const value = data.value;
                if (field === 'groom_name') {
                    const e1 = document.getElementById('previewGroomNameCover');
                    const e2 = document.getElementById('previewGroomName');
                    if (e1) e1.textContent = value;
                    if (e2) e2.textContent = value;
                } else if (field === 'event_heading') {
                    const e1 = document.getElementById('previewHeadingCover');
                    const e2 = document.getElementById('previewEventHeading');
                    if (e1) e1.textContent = value;
                    if (e2) e2.textContent = value;
                } else if (field === 'quote') {
                    const e = document.getElementById('previewQuote');
                    if (e) e.textContent = '"' + value + '"';
                } else if (field === 'venue_name') {
                    const e1 = document.getElementById('previewVenueName');
                    const e2 = document.getElementById('previewVenueNameMain');
                    if (e1) e1.textContent = value;
                    if (e2) e2.textContent = value;
                } else if (field === 'guest_name' || field === 'to') {
                    const e = document.getElementById('previewGuestNameCover');
                    if (e) e.textContent = value;
                } else if (field === 'sub_category') {
                    const e = document.getElementById('previewSubCategoryBadge');
                    if (e) e.textContent = value;
                }
            }
        });

        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
        }
    </script>
</body>
</html>
