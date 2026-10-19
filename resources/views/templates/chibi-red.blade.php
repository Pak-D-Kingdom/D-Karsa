<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Digital {{ $couple->groom_name }} & {{ $couple->bride_name }} - Dibuat dengan cinta oleh D'Karsa.">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }}">
    <meta property="og:description" content="Buka undangan digital pernikahan kami. Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80&auto=format&fit=crop' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;800&family=Great+Vibes&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,700;1,400;1,600&family=Noto+Serif+SC:wght@600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN for standalone preview fidelity) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        crimson: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            600: '#e11d48',
                            800: '#9f1239',
                            900: '#881337',
                            950: '#4c0519',
                        },
                        oriental: {
                            red: '#850014',
                            darkred: '#5a000e',
                            gold: '#dfb76c',
                            lightgold: '#f9e7b8',
                            cream: '#fdf9f2',
                            card: '#ffffff',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        cinzel: ['Cinzel', 'serif'],
                        script: ['Great Vibes', 'cursive'],
                        sans: ['Montserrat', 'sans-serif'],
                        chinese: ['Noto Serif SC', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Ambient Falling Confetti & Sakura */
        @keyframes ambient-fall {
            0% { transform: translate3d(0, -20px, 0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.9; }
            90% { opacity: 0.9; }
            100% { transform: translate3d(var(--sway, 25px), 105vh, 0) rotate(360deg); opacity: 0; }
        }
        .confetti-dot {
            position: absolute;
            top: -20px;
            pointer-events: none;
            border-radius: 50%;
            z-index: 25;
        }

        /* Pulsing Glow Animation */
        @keyframes pulse-ring {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(223, 183, 108, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 16px rgba(223, 183, 108, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(223, 183, 108, 0); }
        }
        .pulse-btn {
            animation: pulse-ring 2.5s infinite;
        }

        /* 3D Carousel Cylinder Gallery */
        .carousel-scene {
            perspective: 1000px;
            width: 100%;
            height: 290px;
            position: relative;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-cylinder {
            width: 210px;
            height: 260px;
            position: absolute;
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.2, 0.85, 0.4, 1.2);
        }
        .carousel-card {
            position: absolute;
            width: 200px;
            height: 250px;
            left: 5px;
            top: 5px;
            border-radius: 18px;
            overflow: hidden;
            border: 3px solid #dfb76c;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
            cursor: pointer;
            backface-visibility: hidden;
            transition: filter 0.3s, transform 0.3s;
        }

        /* Oriental Borders & Dividers */
        .oriental-pattern {
            background-color: #fdf9f2;
            background-image: radial-gradient(#dfb76c 0.75px, transparent 0.75px), radial-gradient(#850014 0.75px, #fdf9f2 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }
        .oriental-card {
            background: #ffffff;
            border: 2px solid #dfb76c;
            box-shadow: 0 12px 30px -8px rgba(133, 0, 20, 0.15);
            position: relative;
        }
        .oriental-card::before, .oriental-card::after {
            content: "❖";
            position: absolute;
            color: #dfb76c;
            font-size: 13px;
        }
        .oriental-card::before { top: 6px; left: 8px; }
        .oriental-card::after { bottom: 6px; right: 8px; }

        /* Calendar Styles */
        .calendar-table th {
            padding: 6px 2px;
            font-size: 11px;
            color: #850014;
            font-weight: 700;
            text-align: center;
        }
        .calendar-table td {
            padding: 8px 2px;
            font-size: 12px;
            text-align: center;
            font-weight: 500;
        }
        .calendar-day-active {
            background: #850014;
            color: #ffffff !important;
            font-weight: 800 !important;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            box-shadow: 0 0 10px rgba(133, 0, 20, 0.5);
            position: relative;
        }
        .calendar-day-active::after {
            content: "♥";
            position: absolute;
            top: -5px;
            right: -4px;
            font-size: 10px;
            color: #dfb76c;
        }

        /* Smooth scroll */
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#2d0006] text-neutral-800 font-sans antialiased selection:bg-oriental-gold selection:text-oriental-darkred">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80&auto=format&fit=crop');
        $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600');
        $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo, 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');
        
        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $cbGroomParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bpk. & Ibu Keluarga');
        $cbBrideParents = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bpk. & Ibu Keluarga');
    @endphp

    <!-- Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Control Button -->
    <div id="audioFloatingBtn" class="fixed top-6 right-6 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-oriental-darkred/90 text-oriental-gold border-2 border-oriental-gold shadow-2xl flex items-center justify-center hover:scale-110 transition active:scale-95" title="Nyalakan / Jeda Musik">
            <span id="audioDiscIcon" class="text-xl animate-spin" style="animation-duration: 4s;">💿</span>
        </button>
    </div>

    <!-- Falling Confetti & Sakura Petals Container -->
    <div id="ambientContainer" class="fixed inset-0 pointer-events-none overflow-hidden z-30"></div>

    <!-- ========================================================
         COVER SCREEN (Chibi Red Style Envelope)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-b from-[#6b020e] via-[#850014] to-[#400008] text-white p-4 transition-all duration-700 ease-in-out">
        
        <!-- Background Glow & Circular Oriental Motif -->
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-overlay" style="background-image: url('{{ $coverImg }}');"></div>
        <div class="absolute w-[450px] h-[450px] rounded-full border border-oriental-gold/30 opacity-40 animate-pulse pointer-events-none"></div>
        <div class="absolute w-[520px] h-[520px] rounded-full border border-oriental-gold/15 pointer-events-none"></div>

        <!-- Center Envelope Content Card -->
        <div class="relative z-10 w-full max-w-md bg-gradient-to-b from-[#8f0016]/95 to-[#5a000e]/95 border-2 border-oriental-gold/70 rounded-[36px] p-8 sm:p-10 text-center shadow-[0_20px_50px_rgba(0,0,0,0.6)] backdrop-blur-sm">
            
            <!-- Song Hỷ (Double Happiness 囍) Oriental Emblem -->
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-tr from-[#69000f] to-[#aa0f24] border-2 border-oriental-gold flex items-center justify-center shadow-lg">
                <span class="font-chinese text-3xl font-bold text-oriental-gold leading-none">囍</span>
            </div>

            <p class="font-cinzel text-xs tracking-[0.25em] text-oriental-gold uppercase mb-1 font-semibold">
                {{ $couple->event_heading ?? "WALIMATUL 'URSY" }}
            </p>
            <p class="text-xs text-white/80 tracking-widest uppercase mb-4">The Wedding Celebration of</p>

            <!-- Couple Names -->
            <div class="my-5">
                <h1 class="font-script text-5xl sm:text-6xl text-oriental-lightgold drop-shadow-md leading-tight">
                    {{ $couple->groom_name }}
                </h1>
                <div class="font-cinzel text-xl text-oriental-gold my-1 tracking-widest">&amp;</div>
                <h1 class="font-script text-5xl sm:text-6xl text-oriental-lightgold drop-shadow-md leading-tight">
                    {{ $couple->bride_name }}
                </h1>
            </div>

            <div class="w-24 h-[1px] bg-oriental-gold/40 mx-auto my-4"></div>

            <p class="font-serif text-sm text-white/90 mb-6 tracking-wide">
                {{ $weddingDateFormatted }}
            </p>

            <!-- Guest Tag Card -->
            <div class="p-3.5 rounded-2xl bg-black/40 border border-oriental-gold/30 text-xs mb-7">
                <p class="text-[11px] text-white/70 uppercase tracking-widest">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                <p class="font-bold text-base text-oriental-lightgold mt-1">{{ $guest->name ?? 'Tamu Undangan' }}</p>
                <p class="text-[10px] text-white/60 italic mt-0.5">*Mohon maaf bila ada kesalahan penulisan nama/gelar</p>
            </div>

            <!-- "Buka Undangan" Seal Button (Mở Thiệp Style) -->
            <button type="button" onclick="openInvitation()" class="pulse-btn w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-oriental-gold via-[#edd292] to-oriental-gold text-oriental-darkred font-cinzel text-xs font-extrabold uppercase tracking-widest shadow-xl hover:brightness-110 active:scale-95 transition flex items-center justify-center gap-2">
                <span>✉️</span> Buka Undangan
            </button>

            @if(!empty($isDemo))
                <div class="mt-4">
                    <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold bg-white/20 text-white/90 border border-white/20">
                        ✨ Mode Demo Template: Chibi Red Oriental
                    </span>
                </div>
            @endif
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main id="mainContent" class="max-w-[480px] mx-auto min-h-screen bg-oriental-cream text-neutral-800 shadow-2xl relative overflow-hidden oriental-pattern border-x border-oriental-gold/30">

        <!-- Header Hero Banner with Oriental Arch -->
        <header class="relative pt-10 pb-12 px-6 text-center text-white bg-gradient-to-b from-[#850014] to-[#60000e] rounded-b-[40px] shadow-lg border-b-4 border-oriental-gold overflow-hidden">
            <div id="previewHeaderBg" class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-overlay" style="background-image: url('{{ $coverImg }}');"></div>

            <div class="relative z-10">
                <span class="font-chinese text-2xl text-oriental-gold block mb-2">囍</span>
                <p class="font-cinzel text-[11px] tracking-[0.2em] text-oriental-lightgold uppercase">Walimatul 'Ursy</p>
                <h2 class="font-script text-4xl sm:text-5xl text-white my-3 leading-tight">
                    {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                </h2>
                <p class="font-serif text-xs text-white/80">{{ $weddingDateFormatted }}</p>
                <div class="mt-3 inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-black/30 border border-oriental-gold/40 text-[11px] text-oriental-lightgold font-medium">
                    <span>📍</span> {{ $couple->venue_name ?? 'Lokasi Acara' }}
                </div>
            </div>
        </header>

        <!-- Quote / Sambutan Ayat Section -->
        <section class="py-10 px-5">
            <div class="oriental-card rounded-3xl p-6 text-center">
                <span class="font-chinese text-xl text-oriental-red block mb-1">百年好合</span>
                <span class="text-xs uppercase tracking-widest text-oriental-gold font-bold block mb-2 font-cinzel">Ar-Rum : 21</span>
                <p class="text-xs sm:text-sm text-neutral-700 italic leading-relaxed font-serif">
                    "{{ $couple->quote ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>
            </div>
        </section>

        <!-- ========================================================
             COUPLE SECTION (Horizontal Banners with Red & Gold Trim)
             ======================================================== -->
        <section class="py-6 px-5 space-y-6">
            <div class="text-center">
                <span class="font-cinzel text-xs font-bold text-oriental-red tracking-[0.2em] uppercase block">Sang Mempelai</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Mempelai Bahagia</h3>
                <div class="w-16 h-0.5 bg-oriental-gold mx-auto mt-2"></div>
            </div>

            <!-- Groom Card -->
            <div class="oriental-card rounded-3xl p-6 flex flex-col items-center text-center">
                <div class="relative w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-oriental-gold via-[#fff1cc] to-oriental-gold shadow-lg mb-4">
                    <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_fullname }}" class="w-full h-full rounded-full object-cover">
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-oriental-red text-white text-[10px] font-bold tracking-wider uppercase border border-oriental-gold shadow">
                        Mempelai Pria
                    </span>
                </div>
                <h4 class="font-serif text-xl font-bold text-neutral-900 mt-2">{{ $couple->groom_fullname }}</h4>
                <p class="text-xs text-oriental-red font-semibold mt-0.5">{{ $couple->groom_birth_order ?? 'Putra Pertama' }}</p>
                <p class="text-xs text-neutral-600 mt-1 leading-relaxed">
                    Putra dari <span id="previewGroomParentsText">{{ $cbGroomParents }}</span>
                    @if(!empty($couple->groom_city))
                        <br><span class="text-[11px] text-neutral-500 font-medium">{{ $couple->groom_city }}</span>
                    @endif
                </p>
            </div>

            <!-- Double Happiness Divider -->
            <div class="flex items-center justify-center gap-3">
                <div class="flex-1 h-px bg-oriental-gold/40"></div>
                <span class="w-9 h-9 rounded-full bg-oriental-red text-oriental-gold font-chinese text-lg font-bold flex items-center justify-center shadow">囍</span>
                <div class="flex-1 h-px bg-oriental-gold/40"></div>
            </div>

            <!-- Bride Card -->
            <div class="oriental-card rounded-3xl p-6 flex flex-col items-center text-center">
                <div class="relative w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-oriental-gold via-[#fff1cc] to-oriental-gold shadow-lg mb-4">
                    <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_fullname }}" class="w-full h-full rounded-full object-cover">
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-oriental-red text-white text-[10px] font-bold tracking-wider uppercase border border-oriental-gold shadow">
                        Mempelai Wanita
                    </span>
                </div>
                <h4 class="font-serif text-xl font-bold text-neutral-900 mt-2">{{ $couple->bride_fullname }}</h4>
                <p class="text-xs text-oriental-red font-semibold mt-0.5">{{ $couple->bride_birth_order ?? 'Putri Bungsu' }}</p>
                <p class="text-xs text-neutral-600 mt-1 leading-relaxed">
                    Putri dari <span id="previewBrideParentsText">{{ $cbBrideParents }}</span>
                    @if(!empty($couple->bride_city))
                        <br><span class="text-[11px] text-neutral-500 font-medium">{{ $couple->bride_city }}</span>
                    @endif
                </p>
            </div>
        </section>

        <!-- ========================================================
             SAVE THE DATE & REAL CALENDAR MONTH GRID (Interactive Calendar)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="oriental-card rounded-3xl p-6 text-center">
                <span class="font-cinzel text-xs font-bold text-oriental-red tracking-[0.2em] uppercase block">Save The Date</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Hari Bahagia Kami</h3>
                <p class="text-xs text-neutral-600 mt-1 mb-5">{{ $weddingDateFormatted }}</p>

                <!-- Month Header -->
                <div class="bg-oriental-red text-oriental-lightgold py-2 px-4 rounded-xl font-cinzel font-bold text-xs uppercase tracking-widest mb-3 flex items-center justify-between">
                    <span>❖</span>
                    <span id="calendarMonthHeader">{{ $targetDate->locale('id')->isoFormat('MMMM Y') }}</span>
                    <span>❖</span>
                </div>

                <!-- Calendar Table -->
                <table class="w-full calendar-table mb-6">
                    <thead>
                        <tr>
                            <th class="text-oriental-red">MIN</th>
                            <th>SEN</th>
                            <th>SEL</th>
                            <th>RAB</th>
                            <th>KAM</th>
                            <th>JUM</th>
                            <th>SAB</th>
                        </tr>
                    </thead>
                    <tbody id="calendarGridBody">
                        <!-- Populated by JavaScript below -->
                    </tbody>
                </table>

                <!-- Countdown Timer -->
                <div class="grid grid-cols-4 gap-2 pt-4 border-t border-oriental-gold/40 text-center">
                    <div class="p-2 rounded-xl bg-oriental-red text-white shadow-sm">
                        <span id="countDays" class="font-serif text-xl sm:text-2xl font-bold block leading-none">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-oriental-lightgold block mt-1">Hari</span>
                    </div>
                    <div class="p-2 rounded-xl bg-oriental-red text-white shadow-sm">
                        <span id="countHours" class="font-serif text-xl sm:text-2xl font-bold block leading-none">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-oriental-lightgold block mt-1">Jam</span>
                    </div>
                    <div class="p-2 rounded-xl bg-oriental-red text-white shadow-sm">
                        <span id="countMinutes" class="font-serif text-xl sm:text-2xl font-bold block leading-none">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-oriental-lightgold block mt-1">Menit</span>
                    </div>
                    <div class="p-2 rounded-xl bg-oriental-red text-white shadow-sm">
                        <span id="countSeconds" class="font-serif text-xl sm:text-2xl font-bold block leading-none">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-oriental-lightgold block mt-1">Detik</span>
                    </div>
                </div>

                <!-- Google Calendar Button -->
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Pernikahan ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&location={{ urlencode($couple->venue_name ?? 'Lokasi Acara') }}" 
                   target="_blank" rel="noopener"
                   class="mt-6 inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-oriental-red hover:bg-oriental-darkred text-white text-xs font-bold tracking-wider uppercase font-cinzel transition shadow">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- ========================================================
             EVENTS & TIMELINE SECTION (Split Columns with Knot Motifs)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="text-center mb-6">
                <span class="font-cinzel text-xs font-bold text-oriental-red tracking-[0.2em] uppercase block">Agenda Acara</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Rangkaian Acara</h3>
                <div class="w-16 h-0.5 bg-oriental-gold mx-auto mt-2"></div>
            </div>

            <div class="space-y-5">
                @forelse($couple->events as $ev)
                    <div class="oriental-card rounded-3xl p-6 text-center space-y-3">
                        <div class="w-10 h-10 rounded-full bg-oriental-red/10 border border-oriental-red text-oriental-red font-chinese font-bold text-lg mx-auto flex items-center justify-center">
                            {{ $loop->iteration === 1 ? '吉' : '福' }}
                        </div>

                        <h4 class="font-serif text-xl font-bold text-oriental-red">{{ $ev->title }}</h4>
                        
                        <div class="space-y-1 text-xs text-neutral-700">
                            <p class="font-semibold text-neutral-900">
                                📅 {{ !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted }}
                            </p>
                            <p class="font-bold text-oriental-red">
                                ⏰ {{ $ev->start_time ?? '08:00 WIB' }} - {{ $ev->end_time ?? 'Selesai' }}
                            </p>
                            <p class="font-bold text-neutral-900 pt-1">
                                🏛️ {{ $ev->venue_name }}
                            </p>
                            @if(!empty($ev->address))
                                <p class="text-[11px] text-neutral-500 leading-relaxed px-4">{{ $ev->address }}</p>
                            @endif
                        </div>

                        @if(!empty($ev->maps_url))
                            <div class="pt-2">
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-5 py-2 rounded-full bg-oriental-red hover:bg-oriental-darkred text-white text-xs font-bold shadow-md transition font-cinzel">
                                    <span>📍</span> Petunjuk Google Maps
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="oriental-card rounded-3xl p-6 text-center">
                        <h4 class="font-serif text-lg font-bold text-oriental-red">Akad Nikah &amp; Resepsi</h4>
                        <p class="text-xs text-neutral-600 mt-2">{{ $couple->venue_name ?? 'Lokasi Acara' }}</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- ========================================================
             3D CYLINDRICAL CAROUSEL GALLERY (3D Carousel Spec)
             ======================================================== -->
        @php
            $galleryItems = $couple->galleries && $couple->galleries->count() > 0 ? $couple->galleries : collect([
                (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800'],
            ]);
            $galCount = $galleryItems->count();
        @endphp

        <section class="py-8 px-5">
            <div class="text-center mb-4">
                <span class="font-cinzel text-xs font-bold text-oriental-red tracking-[0.2em] uppercase block">Momen Bahagia</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Galeri Foto Kenangan</h3>
                <div class="w-16 h-0.5 bg-oriental-gold mx-auto mt-2"></div>
                <p class="text-[11px] text-neutral-500 mt-1">Klik atau putar untuk melihat potret momen indah kami</p>
            </div>

            <!-- 3D Cylindrical Carousel Viewport -->
            <div class="carousel-scene" id="galleryScene">
                <div class="carousel-cylinder" id="previewGalleryGrid">
                    @foreach($galleryItems as $idx => $g)
                        @php
                            $gImg = \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800');
                            $angle = ($idx * (360 / max(1, $galCount)));
                        @endphp
                        <div class="carousel-card" 
                             style="transform: rotateY({{ $angle }}deg) translateZ(240px);"
                             onclick="openLightbox('{{ $gImg }}')">
                            <img src="{{ $gImg }}" alt="Galeri {{ $idx+1 }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Carousel Controls -->
            <div class="flex items-center justify-center gap-4 mt-2">
                <button type="button" onclick="rotateGallery(-1)" class="w-10 h-10 rounded-full bg-oriental-red text-white flex items-center justify-center shadow hover:bg-oriental-darkred transition" title="Foto Sebelumnya">
                    ‹
                </button>
                <span class="text-xs font-cinzel text-oriental-red font-bold">Putar Galeri 3D</span>
                <button type="button" onclick="rotateGallery(1)" class="w-10 h-10 rounded-full bg-oriental-red text-white flex items-center justify-center shadow hover:bg-oriental-darkred transition" title="Foto Berikutnya">
                    ›
                </button>
            </div>
        </section>

        <!-- ========================================================
             DIGITAL ENVELOPE (LÌ XÌ / ANGPAO MERAH)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="bg-gradient-to-br from-[#8f0016] to-[#55000d] rounded-3xl p-6 sm:p-7 text-white text-center border-2 border-oriental-gold shadow-2xl relative overflow-hidden">
                
                <!-- Gold Foil Stamp Decoration -->
                <div class="w-14 h-14 rounded-full bg-oriental-gold/20 border-2 border-oriental-gold flex items-center justify-center mx-auto mb-3">
                    <span class="font-chinese text-2xl font-bold text-oriental-gold">福</span>
                </div>

                <span class="font-cinzel text-xs font-bold text-oriental-lightgold tracking-[0.2em] uppercase block">Tanda Kasih</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Amplop Digital (Angpao)</h3>
                <p class="text-xs text-white/80 mt-2 mb-6 leading-relaxed">
                    Doa restu Anda adalah karunia terindah bagi kami. Bagi keluarga dan sahabat yang ingin memberikan tanda kasih secara digital:
                </p>

                <div class="space-y-4">
                    @if(!empty($couple->bank_account_1))
                        <div class="p-4 rounded-2xl bg-black/40 border border-oriental-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-oriental-lightgold uppercase tracking-widest block">{{ $couple->bank_name_1 ?? 'BANK' }}</span>
                                <b class="font-mono text-base text-white block mt-0.5" id="bankAcc1">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-white/70 block">a.n {{ $couple->bank_holder_1 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_1 }}', this)" class="px-3.5 py-1.5 rounded-full bg-oriental-gold text-oriental-darkred text-xs font-bold uppercase tracking-wider hover:brightness-110 active:scale-95 transition shadow">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->bank_account_2))
                        <div class="p-4 rounded-2xl bg-black/40 border border-oriental-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-oriental-lightgold uppercase tracking-widest block">{{ $couple->bank_name_2 ?? 'BANK' }}</span>
                                <b class="font-mono text-base text-white block mt-0.5" id="bankAcc2">{{ $couple->bank_account_2 }}</b>
                                <span class="text-xs text-white/70 block">a.n {{ $couple->bank_holder_2 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_2 }}', this)" class="px-3.5 py-1.5 rounded-full bg-oriental-gold text-oriental-darkred text-xs font-bold uppercase tracking-wider hover:brightness-110 active:scale-95 transition shadow">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(empty($couple->bank_account_1) && empty($couple->bank_account_2))
                        <div class="p-4 rounded-2xl bg-black/40 border border-oriental-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-oriental-lightgold uppercase tracking-widest block">BCA (Contoh Demo)</span>
                                <b class="font-mono text-base text-white block mt-0.5">8820394821</b>
                                <span class="text-xs text-white/70 block">a.n {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</span>
                            </div>
                            <button type="button" onclick="copyText('8820394821', this)" class="px-3.5 py-1.5 rounded-full bg-oriental-gold text-oriental-darkred text-xs font-bold uppercase tracking-wider hover:brightness-110 transition shadow">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->gift_address))
                        <div class="p-3.5 rounded-2xl bg-black/30 border border-white/10 text-xs text-white/80 text-left">
                            <b class="text-oriental-lightgold block mb-1">📦 Kirim Kado Fisik:</b>
                            <p class="text-[11px] leading-relaxed">{{ $couple->gift_address }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- ========================================================
             RSVP & WISHES (Buku Tamu Online dengan Stempel Merah)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="oriental-card rounded-3xl p-6 sm:p-7">
                <div class="text-center mb-6">
                    <span class="font-cinzel text-xs font-bold text-oriental-red tracking-[0.2em] uppercase block">Buku Tamu</span>
                    <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Konfirmasi Kehadiran &amp; Doa Restu</h3>
                    <div class="w-16 h-0.5 bg-oriental-gold mx-auto mt-2"></div>
                </div>

                <!-- Form Wishes / RSVP -->
                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-4 mb-8">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div>
                        <label class="block text-xs font-bold text-neutral-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda"
                               class="w-full px-4 py-2.5 rounded-xl border border-oriental-gold/50 bg-white text-xs focus:ring-2 focus:ring-oriental-red focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-700 uppercase tracking-wider mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-oriental-gold/50 bg-white text-xs focus:ring-2 focus:ring-oriental-red focus:outline-none">
                            <option value="hadir">InsyaAllah Hadir</option>
                            <option value="tidak_hadir">Mohon Maaf Belum Bisa Hadir</option>
                            <option value="ragu">Masih Ragu / Menyesuaikan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-neutral-700 uppercase tracking-wider mb-1">Untaian Doa &amp; Ucapan</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan selamat & doa restu..."
                                  class="w-full p-4 rounded-xl border border-oriental-gold/50 bg-white text-xs focus:ring-2 focus:ring-oriental-red focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-full bg-oriental-red hover:bg-oriental-darkred text-white text-xs font-bold uppercase tracking-wider font-cinzel shadow-lg transition">
                        Kirim Doa Restu 🕊️
                    </button>
                </form>

                <!-- Wishes Feed List -->
                <div class="space-y-3 max-h-80 overflow-y-auto pr-1" style="scrollbar-width: thin;">
                    @forelse($wishes as $w)
                        <div class="p-3.5 rounded-2xl bg-white border border-oriental-gold/40 shadow-sm">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-bold text-oriental-red">{{ $w->name }}</b>
                                <span class="text-[10px] text-neutral-400">{{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->diffForHumans() : 'Baru saja' }}</span>
                            </div>
                            <p class="text-xs text-neutral-700 mt-1 leading-relaxed">{{ $w->message }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6 text-neutral-400 text-xs">
                            Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="pt-8 pb-16 px-6 text-center text-white bg-gradient-to-t from-[#400008] to-[#780016] border-t-2 border-oriental-gold">
            <span class="font-chinese text-3xl text-oriental-gold block mb-2">囍</span>
            <p class="font-serif text-lg font-bold text-white">{{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</p>
            <p class="text-xs text-white/70 mt-1">Terima kasih atas doa restu dan kehadiran Anda.</p>
            <div class="mt-6 pt-4 border-t border-white/10 text-[10px] text-white/50">
                Created with passion by <b class="text-oriental-gold">D'Karsa</b> Digital Invitation
            </div>
        </footer>

    </main>

    <!-- Lightbox Modal for Photo Gallery -->
    <div id="lightboxModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-md flex items-center justify-center p-4" onclick="closeLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-oriental-gold transition">&times;</button>
        <img id="lightboxImage" src="" alt="Enlarged" class="max-w-full max-h-[90vh] rounded-2xl border-2 border-oriental-gold shadow-2xl" onclick="event.stopPropagation()">
    </div>

    <!-- Interactive Scripts -->
    <script>
        // 1. Audio and Cover Opening
        let isAudioPlaying = false;
        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            cover.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                cover.classList.add('hidden');
            }, 700);

            // Play music automatically
            const audio = document.getElementById('invitationAudio');
            const floatingBtn = document.getElementById('audioFloatingBtn');
            if (audio) {
                audio.play().then(() => {
                    isAudioPlaying = true;
                    if (floatingBtn) floatingBtn.classList.remove('hidden');
                }).catch(e => {
                    console.log('Audio autoplay prevented by browser. Click floating button to play.');
                    if (floatingBtn) floatingBtn.classList.remove('hidden');
                });
            }

            // Spawn ambient confetti
            initAmbientConfetti();
        }

        function toggleAudio() {
            const audio = document.getElementById('invitationAudio');
            const disc = document.getElementById('audioDiscIcon');
            if (!audio) return;
            if (audio.paused) {
                audio.play();
                isAudioPlaying = true;
                if (disc) disc.classList.add('animate-spin');
            } else {
                audio.pause();
                isAudioPlaying = false;
                if (disc) disc.classList.remove('animate-spin');
            }
        }

        // 2. Ambient Falling Confetti and Sakura
        function initAmbientConfetti() {
            const container = document.getElementById('ambientContainer');
            if (!container) return;
            container.innerHTML = '';

            const colors = ['#dfb76c', '#e11d48', '#850014', '#ffffff', '#ffd700'];
            for (let i = 0; i < 24; i++) {
                const el = document.createElement('div');
                el.className = 'confetti-dot';
                const size = Math.floor(Math.random() * 8) + 6;
                const left = Math.random() * 100;
                const dur = Math.random() * 10 + 12;
                const delay = -(Math.random() * 12);
                const sway = (Math.random() * 60 - 30) + 'px';
                const color = colors[Math.floor(Math.random() * colors.length)];

                el.style.width = size + 'px';
                el.style.height = size + 'px';
                el.style.left = left + '%';
                el.style.backgroundColor = color;
                el.style.setProperty('--sway', sway);
                el.style.animation = `ambient-fall ${dur}s ease-in-out ${delay}s infinite`;
                container.appendChild(el);
            }
        }

        // 3. 3D Cylindrical Gallery Rotation
        let currentRotation = 0;
        const totalCards = {{ $galCount }};
        const anglePerCard = 360 / Math.max(1, totalCards);

        function rotateGallery(direction) {
            currentRotation += direction * anglePerCard;
            const cylinder = document.getElementById('previewGalleryGrid') || document.getElementById('galleryCylinder');
            if (cylinder) {
                cylinder.style.transform = `rotateY(${-currentRotation}deg)`;
            }
        }

        // Auto rotate 3D carousel gently every 4 seconds
        setInterval(() => {
            rotateGallery(1);
        }, 4000);

        // 4. Generate Real Calendar Month Grid
        const targetWeddingDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}");
        function buildCalendar() {
            const year = targetWeddingDate.getFullYear();
            const month = targetWeddingDate.getMonth(); // 0-indexed
            const activeDay = targetWeddingDate.getDate();

            const firstDayIndex = new Date(year, month, 1).getDay(); // 0 is Sunday
            const totalDaysInMonth = new Date(year, month + 1, 0).getDate();

            const gridBody = document.getElementById('calendarGridBody');
            if (!gridBody) return;
            gridBody.innerHTML = '';

            let currentDay = 1;
            let finished = false;

            for (let row = 0; row < 6; row++) {
                if (finished) break;
                const tr = document.createElement('tr');

                for (let col = 0; col < 7; col++) {
                    const td = document.createElement('td');
                    if (row === 0 && col < firstDayIndex) {
                        td.innerHTML = '<span class="text-neutral-300"></span>';
                    } else if (currentDay > totalDaysInMonth) {
                        td.innerHTML = '<span class="text-neutral-300"></span>';
                        finished = true;
                    } else {
                        if (currentDay === activeDay) {
                            td.innerHTML = `<span class="calendar-day-active">${currentDay}</span>`;
                        } else {
                            td.innerHTML = `<span class="text-neutral-700">${currentDay}</span>`;
                        }
                        currentDay++;
                    }
                    tr.appendChild(td);
                }
                gridBody.appendChild(tr);
            }
        }
        buildCalendar();

        // 5. Countdown Timer
        function updateCountdown() {
            const now = new Date().getTime();
            const diff = targetWeddingDate.getTime() - now;

            if (diff <= 0) {
                document.getElementById('countDays').textContent = '00';
                document.getElementById('countHours').textContent = '00';
                document.getElementById('countMinutes').textContent = '00';
                document.getElementById('countSeconds').textContent = '00';
                return;
            }

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('countDays').textContent = String(d).padStart(2, '0');
            document.getElementById('countHours').textContent = String(h).padStart(2, '0');
            document.getElementById('countMinutes').textContent = String(m).padStart(2, '0');
            document.getElementById('countSeconds').textContent = String(s).padStart(2, '0');
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();

        // 6. Copy text helper
        function copyText(val, btn) {
            navigator.clipboard.writeText(val).then(() => {
                const oldText = btn.textContent;
                btn.textContent = 'Tersalin! ✓';
                btn.classList.add('!bg-green-600', '!text-white');
                setTimeout(() => {
                    btn.textContent = oldText;
                    btn.classList.remove('!bg-green-600', '!text-white');
                }, 2000);
            });
        }

        // 7. Lightbox
        function openLightbox(url) {
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            if (modal && img) {
                img.src = url;
                modal.classList.remove('hidden');
            }
        }
        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            if (modal) modal.classList.add('hidden');
        }

        // Auto open if query parameter ?open=1 is passed
        if (new URLSearchParams(window.location.search).get('open') === '1') {
            setTimeout(openInvitation, 300);
        }

        // Default template assets & texts for live preview reset
        const defaultGroomPhoto = "{{ $groomImg }}";
        const defaultBridePhoto = "{{ $brideImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultGroomParents = @json($cbGroomParents);
        const defaultBrideParents = @json($cbBrideParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid') || document.getElementById('galleryCylinder');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, idx) => {
                const angle = idx * (360 / images.length);
                const card = document.createElement('div');
                card.className = 'carousel-card';
                card.style.transform = `rotateY(${angle}deg) translateZ(240px);`;
                card.onclick = function() { openLightbox(imgUrl); };
                card.innerHTML = `<img src="${imgUrl}" alt="Galeri ${idx + 1}" class="w-full h-full object-cover">`;
                container.appendChild(card);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' && event.data.dataUrl) {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                } else if (event.data.target === 'bride' && event.data.dataUrl) {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                    const bg1 = document.getElementById('previewCoverBg');
                    if (bg1) bg1.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const bg2 = document.getElementById('previewHeaderBg');
                    if (bg2) bg2.style.backgroundImage = `url('${event.data.dataUrl}')`;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultGroomPhoto;
                } else if (event.data.target === 'bride') {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultBridePhoto;
                } else if (event.data.target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultCoverPhoto;
                    const bg1 = document.getElementById('previewCoverBg');
                    if (bg1) bg1.style.backgroundImage = `url('${event.data.defaultUrl || defaultCoverPhoto}')`;
                    const bg2 = document.getElementById('previewHeaderBg');
                    if (bg2) bg2.style.backgroundImage = `url('${event.data.defaultUrl || defaultCoverPhoto}')`;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                const gpEl = document.getElementById('previewGroomParentsText');
                if (gpEl) {
                    if (event.data.groomParents) {
                        gpEl.textContent = event.data.groomParents;
                    } else if (event.data.resetDefault) {
                        gpEl.textContent = defaultGroomParents;
                    }
                }
                const bpEl = document.getElementById('previewBrideParentsText');
                if (bpEl) {
                    if (event.data.brideParents) {
                        bpEl.textContent = event.data.brideParents;
                    } else if (event.data.resetDefault) {
                        bpEl.textContent = defaultBrideParents;
                    }
                }
            }
        });

        // Handshake: notify parent window that iframe is ready to receive data
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    </script>
</body>
</html>
