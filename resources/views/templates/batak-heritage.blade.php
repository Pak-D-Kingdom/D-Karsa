<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }} | Batak Istimewa Heritage D'Karsa</title>
    <meta name="description" content="Undangan Pernikahan Adat Batak Istimewa {{ $couple->groom_name }} & {{ $couple->bride_name }} - Sakral, Megah, Penuh Berkah Dalihan Na Tolu.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }}">
    <meta property="og:description" content="Horas! Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop' }}">

    <!-- Google Fonts: Dignified Regal Serifs & Clean Modern Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        batak: {
                            maroon: '#631321',
                            darkmaroon: '#420C15',
                            wine: '#78192A',
                            black: '#120B0D',
                            carddark: '#1C1215',
                            cardlight: '#26191D',
                            gold: '#D4AF37',
                            goldlight: '#F8ECC2',
                            goldmuted: '#9E8024',
                            ivory: '#FAF7F0',
                            linen: '#F4ECE1',
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Traditional Gorga Motif Border / Background Pattern */
        .gorga-bg {
            background-color: #120B0D;
            background-image: 
                radial-gradient(#D4AF37 0.75px, transparent 0.75px),
                radial-gradient(#631321 0.75px, #120B0D 0.75px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
        }

        /* Gold Foil Shimmer */
        .gold-shimmer {
            background: linear-gradient(135deg, #F8ECC2 0%, #D4AF37 50%, #A67C1E 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gorga Frame Border */
        .gorga-border {
            border: 2px solid #D4AF37;
            position: relative;
        }
        .gorga-border::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(212, 175, 55, 0.45);
            pointer-events: none;
        }

        /* Ulos Textile Border Ribbon */
        .ulos-ribbon {
            background: repeating-linear-gradient(
                90deg,
                #631321 0px,
                #631321 8px,
                #D4AF37 8px,
                #D4AF37 12px,
                #120B0D 12px,
                #120B0D 18px,
                #D4AF37 18px,
                #D4AF37 22px
            );
            height: 6px;
            width: 100%;
        }

        /* Toast animation */
        @keyframes toastFade {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: toastFade 2.8s ease forwards;
        }

        /* Hide scrollbars for app-like clean mobile experience */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="gorga-bg text-slate-200 font-sans antialiased selection:bg-batak-gold selection:text-batak-black overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop');
        $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600');
        $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $weddingTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB';

        $groomName = $couple->groom_name ?? 'Togu Manurung';
        $brideName = $couple->bride_name ?? 'Grace Boru Simanjuntak';
        $groomFull = $couple->groom_fullname ?? $groomName;
        $brideFull = $couple->bride_fullname ?? $brideName;

        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Pemberkatan Nikah Kudus',
                    'date' => $weddingDateFormatted,
                    'start_time' => '09:00',
                    'end_time' => '11:00',
                    'venue_name' => 'Gereja HKBP Sudirman Medan',
                    'address' => 'Ibadah sakramen pernikahan kudus, pengucapan janji setia di hadapan Tuhan dan jemaat.',
                ],
                (object)[
                    'title' => 'Pesta Unjuk & Mangulosi',
                    'date' => $weddingDateFormatted,
                    'start_time' => '11:30',
                    'end_time' => '17:30',
                    'venue_name' => 'Wisma Taman Sari Indah / Grand Ballroom',
                    'address' => 'Pasu-pasu raja, pembagian jambar juhut & jambar hepeng, prosesi Mangulosi oleh Hula-hula, serta manortor bersama diiringi Gondang Sabangunan.',
                ],
            ]);
        }
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-batak-carddark border border-batak-gold/50 shadow-2xl flex items-center justify-center text-batak-gold hover:scale-105 transition" title="Musik Gondang Batak">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 5s;">🧣</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-batak-carddark border border-batak-gold text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-batak-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         BATAK GORGA HERITAGE COVER SCREEN (Full Screen Mobile Cover)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-batak-darkmaroon gorga-bg flex flex-col justify-between items-center px-3 py-2 sm:py-4 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <!-- Ambient Batak Shimmer Glows (Clipped to prevent unwanted scrollbars) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-batak-gold/15 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-batak-wine/30 blur-3xl"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-batak-black/75 via-transparent to-batak-black/85"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            
            <!-- TOP BAR: Ulos Ribbon, Emblem & Horas Jala Gabe -->
            <header class="w-full flex flex-col items-center shrink-0">
                <div class="ulos-ribbon mb-1.5 shadow-sm"></div>

                <div class="flex flex-col items-center text-center">
                    <div class="w-8 h-8 rounded-xl bg-batak-darkmaroon border border-batak-gold/60 flex items-center justify-center shadow-md text-base mb-0.5">
                        🏛️
                    </div>
                    <p class="font-cinzel text-[9px] font-bold text-batak-goldlight tracking-[0.25em] uppercase">
                        HORAS JALA GABE
                    </p>
                    <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full text-[8px] font-cinzel font-bold uppercase tracking-[0.2em] bg-batak-gold/15 text-batak-gold border border-batak-gold/40 mt-0.5">
                        {{ $couple->event_heading ?? "THE BATAK HERITAGE WEDDING" }}
                    </span>
                </div>
            </header>

            <!-- CENTER SECTION: Couple Cover Picture & Sacred Names -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Panoramic/Portrait Cover Image Frame -->
                <div class="relative w-full max-w-[210px] h-24 sm:h-28 rounded-2xl overflow-hidden border-2 border-batak-gold shadow-xl my-1 bg-batak-black shrink-0">
                    <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Batak Wedding" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-batak-darkmaroon/85 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-1 inset-x-0 text-center">
                        <span class="text-[7.5px] font-cinzel text-batak-goldlight uppercase tracking-widest px-2 py-0.5 bg-black/60 rounded-full border border-batak-gold/30">
                            ULAON UNJUK &amp; PAMASUMASUON
                        </span>
                    </div>
                </div>

                <!-- Bride & Groom Sacred Names -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewNamesCover" class="font-serif text-base sm:text-lg font-bold gold-shimmer tracking-wide leading-tight truncate">
                        {{ $groomName }} <span class="text-batak-gold font-normal">&amp;</span> {{ $brideName }}
                    </h1>
                    <p id="previewDateCover" class="text-[9px] text-slate-300 font-sans mt-0.5">
                        📅 {{ $weddingDateFormatted }}
                    </p>
                </div>

                <!-- Guest Pass with Batak Kinship Honor (Dihonhon Tu Angkanina) -->
                <div class="w-full py-1 px-3 rounded-xl bg-batak-darkmaroon/90 backdrop-blur-md border border-batak-gold/40 text-center shadow-md mt-0.5">
                    <span class="text-[7px] font-cinzel uppercase tracking-[0.2em] text-batak-gold/90 block font-semibold">DIHONHON TU ANGKANINA:</span>
                    <b id="previewGuestNameCover" class="text-xs font-sans font-bold text-white block mt-0.5 truncate">
                        {{ $guest->name ?? 'Dongan Tubu, Boru, Bere & Tamu Na Sangap' }}
                    </b>
                </div>
            </section>

            <!-- BOTTOM SECTION: Full-width CTA Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-batak-gold via-[#edd292] to-batak-gold hover:brightness-110 active:scale-[0.98] text-batak-black font-cinzel text-[11px] font-black uppercase tracking-[0.2em] shadow-[0_6px_16px_rgba(212,175,55,0.4)] transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🧣</span> <span>BUKA UNDANGAN ADAT BATAK</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-slate-400 flex items-center gap-1">
                    <span class="text-batak-gold">♫</span> Musik Gondang Sabangunan diputar saat dibuka
                </p>
                <div class="ulos-ribbon mt-0.5 shadow-sm"></div>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (Batak Heritage Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-batak-carddark text-slate-200 shadow-2xl relative border-x border-batak-gold/30">

        <!-- Top Ulos Ribbon Header -->
        <div class="ulos-ribbon"></div>

        <!-- Top Header Hero -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-batak-maroon to-batak-carddark border-b border-batak-gold/25 relative">
            <span class="text-xl text-batak-gold block mb-2">✦ ─── 🏛️ ─── ✦</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-cinzel uppercase tracking-[0.25em] bg-batak-gold/15 text-batak-gold border border-batak-gold/30 mb-2 font-semibold">
                {{ $couple->event_heading ?? "PAMASUMASUON & ULAON UNJUK" }}
            </span>
            <h1 class="font-serif text-3xl font-bold gold-shimmer tracking-wide my-2 leading-tight">
                {{ $groomName }}
                <span class="block text-2xl text-batak-gold my-0.5">&amp;</span>
                {{ $brideName }}
            </h1>
            <p class="text-xs text-slate-300 font-sans tracking-wider">
                {{ $weddingDateFormatted }} • {{ $weddingTimeFormatted }}
            </p>
            <p class="text-xs text-batak-gold mt-2">
                📍 {{ $couple->venue_name ?? 'Gedung Pertemuan Adat Batak' }}
            </p>
        </header>

        <!-- Holy Scripture & Batak Blessing Section -->
        <section class="py-12 px-6 border-b border-batak-gold/20 text-center">
            <div class="p-6 rounded-3xl bg-batak-cardlight border border-batak-gold/30 shadow-md">
                <span class="text-2xl text-batak-gold block mb-2">❝</span>
                <p class="font-serif text-sm text-batak-goldlight font-bold mb-2">
                    "Jala di ginjang ni sasudena i solukkon hamu ma holong ni roha i, ai i do rahutrahut ni pardengganon."
                </p>
                <p class="font-sans text-xs text-slate-300 italic leading-relaxed">
                    "Dan di atas semuanya itu: kenakanlah kasih, sebagai pengikat yang mempersatukan dan menyempurnakan."
                </p>
                <span class="inline-block mt-3 text-[10px] font-cinzel text-batak-gold uppercase font-bold tracking-wider">
                    {{ $couple->quote_source ?? 'Kolose 3:14' }}
                </span>

                <div class="my-4 w-12 h-px bg-batak-gold/40 mx-auto"></div>

                <p class="text-xs text-slate-300 leading-relaxed font-sans">
                    Marhite holong dohot asi ni roha ni Tuhanta Pardenggan Basa i, dibagasan toruk ni roha dohot las ni roha, ro do hami manggokhon jala manjou hamu angka na pinarsangapan, Raja ni Dongan Tubu, Raja ni Boru, Bere, Ibebere, Raja ni Dongan Sahuta, nang Pariban.
                </p>
            </div>
        </section>

        <!-- Pangoli & Oroan (The Bride & Groom Profile) -->
        <section class="py-14 px-6 border-b border-batak-gold/20 text-center">
            <div class="text-center mb-10">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block">PANGOLI &amp; OROAN</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Mempelai Berbahagia</h2>
            </div>

            <!-- Groom (Pangoli) -->
            <div class="mb-12">
                <div class="relative w-48 h-56 mx-auto rounded-2xl overflow-hidden border-2 border-batak-gold shadow-2xl bg-batak-black mb-4">
                    <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $groomName }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 inset-x-0 p-2 bg-gradient-to-t from-batak-maroon to-transparent">
                        <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-batak-gold font-bold">
                            SANG MEMPELAI PRIA (PANGOLI)
                        </span>
                    </div>
                </div>
                <h3 class="font-serif text-xl font-bold text-white">{{ $groomFull }}</h3>
                <p class="text-xs text-batak-gold font-sans font-semibold mt-0.5">({{ $couple->groom_birth_order ?? 'Anak Panggoaran' }})</p>
                <p class="text-xs text-slate-300 mt-2 max-w-xs mx-auto leading-relaxed">
                    Putra terkasih dari:<br>
                    <b id="previewBatakGroomParentsText" class="text-white">{{ \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bpk. St. Drs. P. Manurung & Ibu E. Boru Hutabarat') }}</b>
                </p>
            </div>

            <!-- Ulos Ampersand Divider -->
            <div class="flex items-center justify-center my-6">
                <span class="w-16 h-px bg-batak-gold/40"></span>
                <span class="font-serif text-3xl text-batak-gold px-4">&amp;</span>
                <span class="w-16 h-px bg-batak-gold/40"></span>
            </div>

            <!-- Bride (Oroan) -->
            <div>
                <div class="relative w-48 h-56 mx-auto rounded-2xl overflow-hidden border-2 border-batak-gold shadow-2xl bg-batak-black mb-4">
                    <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $brideName }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 inset-x-0 p-2 bg-gradient-to-t from-batak-maroon to-transparent">
                        <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-batak-gold font-bold">
                            SANG MEMPELAI WANITA (OROAN)
                        </span>
                    </div>
                </div>
                <h3 class="font-serif text-xl font-bold text-white">{{ $brideFull }}</h3>
                <p class="text-xs text-batak-gold font-sans font-semibold mt-0.5">({{ $couple->bride_birth_order ?? 'Boru Sihasuhut' }})</p>
                <p class="text-xs text-slate-300 mt-2 max-w-xs mx-auto leading-relaxed">
                    Putri terkasih dari:<br>
                    <b id="previewBatakBrideParentsText" class="text-white">{{ \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bpk. Ir. R. Simanjuntak & Ibu M. Boru Panjaitan') }}</b>
                </p>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-12 px-6 bg-batak-maroon/40 border-b border-batak-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block mb-1">COUNTDOWN TO HOLY MATRIMONY</span>
            <h3 class="font-serif text-xl font-bold text-white mb-6">Menghitung Hari Pesta Unjuk</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-batak-carddark border border-batak-gold/40 text-center shadow">
                    <span id="cdDays" class="block font-serif text-2xl font-bold text-batak-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-batak-carddark border border-batak-gold/40 text-center shadow">
                    <span id="cdHours" class="block font-serif text-2xl font-bold text-batak-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-batak-carddark border border-batak-gold/40 text-center shadow">
                    <span id="cdMinutes" class="block font-serif text-2xl font-bold text-batak-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-batak-carddark border border-batak-gold/40 text-center shadow">
                    <span id="cdSeconds" class="block font-serif text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'The Wedding of') . ' ' . $groomName . ' & ' . $brideName);
                $calDetails = urlencode('Menghadiri pamasumasuon (pemberkatan nikah) dan ulaon unjuk adat Batak.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(6)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-batak-carddark hover:bg-batak-cardlight text-batak-gold text-[10px] font-cinzel tracking-widest uppercase transition border border-batak-gold/40">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Rangkaian Ulaon Adat & Pemberkatan (Itinerary) -->
        <section class="py-14 px-6 border-b border-batak-gold/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block">ULAON ADAT DOHOT PAMASUMASUON</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Rangkaian Acara Adat 🧣</h2>
            </div>

            <div id="itineraryContainer" class="space-y-4 max-w-sm mx-auto">
                @foreach($activeEvents as $index => $event)
                    <div class="p-5 rounded-2xl bg-batak-cardlight border border-batak-gold/30">
                        <div class="flex items-center justify-between text-batak-gold text-xs font-cinzel mb-1">
                            <span class="uppercase tracking-wider">{{ $event->title ?? 'Sesi Acara' }}</span>
                            <span>{{ !empty($event->start_time) ? substr($event->start_time, 0, 5) : '09:00' }}{{ !empty($event->end_time) ? ' - ' . substr($event->end_time, 0, 5) : '' }} WIB</span>
                        </div>
                        <h3 class="font-serif text-base font-bold text-white">{{ $event->title ?? 'Acara Pernikahan' }}</h3>
                        @if(!empty($event->venue_name))
                            <p class="text-xs text-batak-goldlight mt-1 font-medium">{{ $event->venue_name }}</p>
                        @endif
                        @if(!empty($event->address))
                            <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $event->address }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-batak-cardlight border border-batak-gold/40 text-center">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-batak-gold block mb-1">LOKASI GEREJA &amp; GEDUNG ADAT</span>
                <h3 class="font-serif text-lg font-bold text-white">{{ $couple->venue_name ?? 'Wisma Taman Sari Indah & HKBP' }}</h3>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Jl. Jenderal Sudirman No. 32, Medan, Sumatera Utara' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-batak-gold to-batak-goldmuted text-batak-black text-xs font-cinzel font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Galeri Foto Adat Batak -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-batak-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block mb-1">MOMEN KASIH</span>
            <h2 class="font-serif text-2xl font-bold text-white mb-6">Galeri Kenangan Indah 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? '', 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800');
                    @endphp
                    <div class="p-2 rounded-xl bg-batak-cardlight border border-batak-gold/30 shadow">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-batak-black">
                            <img src="{{ $imgSrc }}" alt="Batak Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tumpak Digital / Tanda Holong (Digital Gift) -->
        <section class="py-14 px-6 border-b border-batak-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block mb-1">TUMPAK DOHOT TANDA HOLONG</span>
            <h2 class="font-serif text-2xl font-bold text-white mb-3">Tumpak Digital Pengantin</h2>
            <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6 leading-relaxed">
                Doa restu hamu saluhutna nunga arga situtu di hami. Alai molo adong las ni roha laho mangalehon tanda holong marhite rekening digital:
            </p>

            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-batak-cardlight border border-batak-gold/40 shadow-xl text-center">
                <div class="inline-block px-3 py-1 bg-batak-darkmaroon text-batak-gold text-[10px] font-cinzel font-bold tracking-widest uppercase mb-2 border border-batak-gold/30">
                    {{ $couple->bank_name ?? 'BANK MANDIRI' }}
                </div>
                <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '1060012398745' }}
                </p>
                <p class="text-xs text-slate-400 mb-4">a.n {{ $couple->account_name ?? $groomName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '1060012398745' }}', 'Nomor rekening tumpak berhasil disalin')" class="w-full py-2.5 rounded-lg bg-batak-gold/20 hover:bg-batak-gold/30 text-batak-gold text-xs font-cinzel font-bold uppercase tracking-wider border border-batak-gold/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-xl bg-batak-cardlight border border-batak-gold/20 text-center">
                    <span class="text-[9px] font-cinzel text-batak-gold uppercase font-bold block mb-1">ALAMAT KIRIM KADO</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat kado disalin')" class="mt-2 text-[10px] text-batak-gold hover:underline font-cinzel uppercase">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & Doa Restu Batak Section -->
        <section class="py-14 px-6 border-b border-batak-gold/20">
            <div class="text-center mb-8">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-batak-gold block">GUESTBOOK &amp; PRAYERS</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Konfirmasi &amp; Doa Restu 🧣</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-batak-cardlight p-6 rounded-2xl border border-batak-gold/30 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Goar / Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama & Marga Anda" class="w-full px-4 py-2.5 rounded-xl bg-batak-carddark border border-batak-gold/30 text-xs text-white focus:outline-none focus:border-batak-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Konfirmasi Haroroan (Kehadiran)</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-batak-carddark border border-batak-gold/30 text-xs text-white focus:outline-none focus:border-batak-gold">
                            <option value="Hadir">Pasti Ro (Hadir)</option>
                            <option value="Tidak Hadir">Ndang Boi Ro (Berhalangan)</option>
                            <option value="Ragu-ragu">Dipatupa dope (Menyesuaikan)</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Hata Pasu-pasu (Untaian Doa &amp; Ucapan)</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan selamat & doa restu untuk kedua mempelai..." class="w-full px-4 py-2.5 rounded-xl bg-batak-carddark border border-batak-gold/30 text-xs text-white focus:outline-none focus:border-batak-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-batak-gold to-batak-goldmuted text-batak-black font-cinzel text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Hata Pasu-Pasu 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-serif text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Hata Pasu-pasu ni Angka Dongan</span>
                    <span class="text-xs font-sans text-batak-gold">{{ isset($wishes) ? count($wishes) : 0 }} Doa</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Keluarga';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-batak-cardlight border border-batak-gold/25 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-batak-gold font-serif">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-batak-carddark text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-batak-cardlight border border-batak-gold/20 text-center text-xs text-slate-400 italic">
                            Belum ada ucapan tertulis. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer Colophon -->
        <footer class="py-12 px-6 text-center bg-batak-black text-slate-400 border-t border-batak-gold/30">
            <p class="font-serif text-xl text-batak-gold mb-1">{{ $groomName }} &amp; {{ $brideName }}</p>
            <p class="text-xs text-slate-400 font-serif italic">Mauliate Situtu • Horas! Horas! Horas!</p>
            <div class="mt-6 pt-4 border-t border-white/10 text-[9px] text-slate-500 font-cinzel">
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
                    audioIcon.textContent = '🧣';
                }).catch(e => console.log('Audio error:', e));
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
                showToast('Hata pasu-pasu berhasil dikirim! Mauliate.');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Keluarga';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-batak-cardlight border border-batak-gold/25 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-batak-gold font-serif">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-batak-carddark text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Mauliate atas doa restu Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Live preview synchronization for photos & gallery
        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIdx) => {
                const div = document.createElement('div');
                div.className = 'p-2 rounded-xl bg-batak-cardlight border border-batak-gold/30 shadow';
                div.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-batak-black">
                        <img src="${imgUrl}" alt="Batak Moment ${gIdx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;

            container.innerHTML = events.map(ev => {
                const title = ev.title || 'Sesi Acara';
                const startTime = ev.start_time ? ev.start_time.substring(0, 5) : '09:00';
                const endTime = ev.end_time ? ' - ' + ev.end_time.substring(0, 5) : '';
                const venue = ev.venue_name ? `<p class="text-xs text-batak-goldlight mt-1 font-medium">${ev.venue_name}</p>` : '';
                const addr = ev.address ? `<p class="text-xs text-slate-300 mt-1 leading-relaxed">${ev.address}</p>` : '';
                return `
                    <div class="p-5 rounded-2xl bg-batak-cardlight border border-batak-gold/30">
                        <div class="flex items-center justify-between text-batak-gold text-xs font-cinzel mb-1">
                            <span class="uppercase tracking-wider">${title}</span>
                            <span>${startTime}${endTime} WIB</span>
                        </div>
                        <h3 class="font-serif text-base font-bold text-white">${title}</h3>
                        ${venue}
                        ${addr}
                    </div>
                `;
            }).join('');
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
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el && event.data.defaultUrl) el.src = event.data.defaultUrl;
                } else if (event.data.target === 'bride') {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el && event.data.defaultUrl) el.src = event.data.defaultUrl;
                } else if (event.data.target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el && event.data.defaultUrl) el.src = event.data.defaultUrl;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(event.data.events)) {
                renderDynamicEvents(event.data.events);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                if (event.data.groomParents) {
                    const el = document.getElementById('previewBatakGroomParentsText');
                    if (el) el.textContent = event.data.groomParents;
                }
                if (event.data.brideParents) {
                    const el = document.getElementById('previewBatakBrideParentsText');
                    if (el) el.textContent = event.data.brideParents;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = event.data.field;
                const value = event.data.value;
                if (field === 'event_heading') {
                    const el = document.getElementById('previewHeadingCover');
                    if (el) el.textContent = value;
                } else if (field === 'groom_name' || field === 'bride_name') {
                    const el = document.getElementById('previewNamesCover');
                    if (el) {
                        const gName = field === 'groom_name' ? value : '{{ $groomName }}';
                        const bName = field === 'bride_name' ? value : '{{ $brideName }}';
                        el.innerHTML = `${gName} <span class="text-batak-gold font-normal">&amp;</span> ${bName}`;
                    }
                } else if (field === 'guest_name' || field === 'to') {
                    const el = document.getElementById('previewGuestNameCover');
                    if (el) el.textContent = value;
                }
            }
        });

        // Handshake: notify parent window that iframe is ready
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    </script>
</body>
</html>
