<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Syukuran Wisuda Sarjana') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Resmi Syukuran Wisuda Sarjana & Peraihan Gelar Akademik {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Syukuran Wisuda Sarjana') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam syukuran wisuda sarjana {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200' }}">

    <!-- Google Fonts: Classical Academic & Serif Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        academy: {
                            navy: '#0B132B',
                            navylight: '#152244',
                            deep: '#070C1B',
                            gold: '#D4AF37',
                            goldbright: '#F3E5AB',
                            goldborder: 'rgba(212, 175, 55, 0.35)',
                            parchment: '#FBF9F5',
                            cream: '#F4EFE6',
                            ink: '#1A1E29',
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        garamond: ['EB Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Classical Guilloché Certificate Border */
        .diploma-border {
            border: 2px solid #D4AF37;
            position: relative;
        }
        .diploma-border::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(212, 175, 55, 0.45);
            pointer-events: none;
        }

        /* Gold Foil Shimmer */
        .gold-leaf {
            background: linear-gradient(135deg, #F3E5AB 0%, #D4AF37 50%, #AA820A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Laurel Crest Medal */
        .crest-circle {
            background: radial-gradient(circle, #152244 0%, #0B132B 100%);
            border: 2px solid #D4AF37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
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
<body class="bg-academy-deep text-slate-200 font-sans antialiased selection:bg-academy-gold selection:text-academy-navy overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200'
        );
        $gradImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB');

        $gradName = $couple->groom_name ?? 'Muhammad Rizky Pratama, S.Kom';
        $gradNick = $couple->groom_nickname ?? 'Rizky';
    @endphp

    <!-- Background Music -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-academy-navy border border-academy-gold/40 shadow-xl flex items-center justify-center text-academy-gold hover:scale-105 transition" title="Musik Kehormatan">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🎓</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-academy-navy border border-academy-gold text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-academy-gold">📜</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         ACADEMIC DIPLOMA SCROLL COVER SCREEN (Full Screen Mobile)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-academy-deep flex flex-col justify-between items-center px-3.5 py-3 sm:py-5 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <div class="absolute inset-0 opacity-15 pointer-events-none">
            <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Wisuda" class="w-full h-full object-cover">
        </div>
        <!-- Ambient Academy Glows (Clipped to prevent unwanted scrollbars) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-academy-gold/15 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-blue-900/30 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header Bar: Commencement Ribbon & Crest -->
            <header class="w-full flex flex-col items-center shrink-0">
                <div class="w-full flex items-center justify-between pb-1.5 border-b border-academy-gold/30 text-[8.5px] font-cinzel tracking-[0.25em] text-academy-gold uppercase">
                    <span>COMMENCEMENT</span>
                    <span>CLASS OF {{ $targetDate->format('Y') }}</span>
                </div>
                <div class="mt-1 flex flex-col items-center text-center">
                    <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full text-[8.5px] font-cinzel font-bold tracking-[0.2em] uppercase bg-academy-gold/15 text-academy-gold border border-academy-gold/30">
                        {{ $couple->event_heading ?? "GRADUATION CEREMONY" }}
                    </span>
                </div>
            </header>

            <!-- Center Showcase (Portrait, Graduate Name, Guest Card) -->
            <section class="w-full my-auto py-1 flex flex-col items-center text-center">
                <!-- Graduate Portrait -->
                <div class="relative w-20 h-24 mx-auto rounded-xl overflow-hidden border-2 border-academy-gold/60 shadow-xl my-1 shrink-0">
                    <img id="previewGroomPhotoImg" src="{{ $gradImg }}" alt="{{ $gradName }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-academy-navy/70 via-transparent to-transparent pointer-events-none"></div>
                </div>

                <!-- Graduate Title -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-cinzel text-base sm:text-lg font-black gold-leaf tracking-wide leading-tight truncate">
                        {{ $gradName }}
                    </h1>
                    <p class="font-garamond text-xs text-slate-300 italic mt-0.5">
                        {{ $couple->sub_category ?? 'Fakultas Ilmu Komputer & Teknologi Informasi' }}
                    </p>
                    <p class="text-[9px] text-academy-gold font-sans font-semibold mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Guest Card -->
                <div class="w-full py-1 px-3 rounded-xl bg-academy-navy/90 backdrop-blur-md border border-academy-gold/30 text-center shadow-md mt-0.5">
                    <span class="text-[7.5px] font-cinzel uppercase tracking-[0.2em] text-slate-400 block font-semibold">KEPADA YTH:</span>
                    <p id="previewGuestNameCover" class="font-sans text-xs sm:text-sm font-bold text-white mt-0.5 truncate">{{ $guest->name ?? 'Bapak / Ibu / Saudara/i' }}</p>
                </div>
            </section>

            <!-- Footer: Buka Undangan Action -->
            <footer class="w-full pt-1 flex flex-col items-center gap-1 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full py-2.5 sm:py-3 px-5 rounded-xl bg-gradient-to-r from-academy-gold to-[#B38F24] hover:brightness-110 active:scale-[0.98] text-academy-navy font-cinzel text-xs font-bold uppercase tracking-[0.22em] shadow-[0_8px_20px_rgba(212,175,55,0.4)] transition flex items-center justify-center gap-2 cursor-pointer pointer-events-auto">
                    <span>📜</span> <span>BUKA DOKUMEN KELULUSAN</span> <span>&rarr;</span>
                </button>
                <p class="text-[9px] font-sans text-slate-400 flex items-center gap-1">
                    <span class="text-academy-gold">♫</span> Musik kehormatan diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Ivy League Academic Prestige)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-academy-navy text-slate-200 shadow-2xl relative border-x border-academy-gold/30">

        <!-- Top Header Masthead -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-academy-navylight to-academy-navy border-b border-academy-gold/25 relative">
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-cinzel uppercase tracking-[0.25em] bg-academy-gold/15 text-academy-gold border border-academy-gold/30 mb-3 font-semibold">
                {{ $couple->event_heading ?? "SYUKURAN WISUDA SARJANA" }}
            </span>
            <h1 class="font-cinzel text-3xl sm:text-4xl font-extrabold gold-leaf tracking-wide my-2 leading-tight">
                {{ $gradName }}
            </h1>
            <p class="font-garamond text-sm text-slate-300 italic">
                {{ $couple->sub_category ?? 'Fakultas Ilmu Komputer • Universitas Indonesia' }}
            </p>
            <div class="mt-4 flex items-center justify-center gap-2 text-xs text-academy-gold">
                <span>🏛️</span>
                <span>{{ $couple->venue_name ?? 'Auditorium Utama Kampus' }}</span>
            </div>
        </header>

        <!-- Graduate Profile & Honors Section -->
        <section class="py-14 px-6 border-b border-academy-gold/20 text-center">
            <div class="relative w-48 h-56 mx-auto mb-6 rounded-2xl overflow-hidden border-2 border-academy-gold shadow-2xl">
                <img id="previewGroomPhotoImg2" src="{{ $gradImg }}" alt="{{ $gradName }}" class="w-full h-full object-cover">
                <div class="absolute bottom-0 inset-x-0 p-2 bg-gradient-to-t from-academy-navy via-academy-navy/70 to-transparent">
                    <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-academy-gold font-bold">
                        SARJANA KOMPUTER (S.Kom)
                    </span>
                </div>
            </div>

            <!-- Cum Laude / Honors Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-academy-navylight border border-academy-gold text-academy-gold text-xs font-cinzel font-bold mb-4">
                <span>🏅</span> LULUS DENGAN PREDIKAT PUJIAN
            </div>

            <h2 class="font-cinzel text-2xl font-bold text-white">{{ $gradName }}</h2>
            @php
                $gradParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
            @endphp
            <p id="previewParentsContainer" class="text-xs text-slate-400 font-garamond italic mt-1 max-w-sm mx-auto leading-relaxed {{ empty($gradParents) ? 'hidden' : '' }}">
                Putra/Putri tercinta dari: <br>
                <b id="previewParentsNames" class="text-white font-sans not-italic text-sm">{{ $gradParents }}</b>
            </p>

            <!-- Thesis Highlight Card -->
            <div class="max-w-sm mx-auto mt-6 p-5 rounded-xl bg-academy-navylight/70 border border-academy-gold/30 text-left">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-academy-gold font-bold block mb-1">KARYA TULIS ILMIAH / SKRIPSI</span>
                <p class="font-garamond text-sm text-slate-200 italic leading-relaxed">
                    "{{ $couple->quote ?? 'Implementasi Kecerdasan Buatan dan Big Data Analytics untuk Optimalisasi Layanan Publik Berkelanjutan di Era Digital.' }}"
                </p>
            </div>
        </section>

        <!-- Countdown to Graduation Day -->
        <section class="py-12 px-6 bg-academy-navylight/40 border-b border-academy-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-academy-gold block mb-1">COMMENCEMENT COUNTDOWN</span>
            <h3 class="font-cinzel text-xl font-bold text-white mb-6">Menghitung Hari Prosesi Wisuda</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-academy-navy border border-academy-gold/40 text-center shadow">
                    <span id="cdDays" class="block font-cinzel text-2xl font-bold text-academy-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-academy-navy border border-academy-gold/40 text-center shadow">
                    <span id="cdHours" class="block font-cinzel text-2xl font-bold text-academy-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-academy-navy border border-academy-gold/40 text-center shadow">
                    <span id="cdMinutes" class="block font-cinzel text-2xl font-bold text-academy-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-academy-navy border border-academy-gold/40 text-center shadow">
                    <span id="cdSeconds" class="block font-cinzel text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Wisuda Sarjana') . ' - ' . $gradName);
                $calDetails = urlencode('Menghadiri sidang terbuka wisuda & syukuran kelulusan sarjana.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-academy-navy hover:bg-academy-navylight text-academy-gold text-[10px] font-cinzel tracking-widest uppercase transition border border-academy-gold/40">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-14 px-6 border-b border-academy-gold/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-academy-gold block">AGENDA ACARA</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Rangkaian Prosesi &amp; Syukuran</h2>
            </div>

            <div class="space-y-4 max-w-sm mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @foreach($couple->events as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $eventDateFormatted;
                            $evTimeFormatted = !empty($ev->start_time) ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '') : '09:00 WIB';
                            $evVenue = $ev->venue_name ?? ($couple->venue_name ?? 'Lokasi Acara');
                            $evAddress = $ev->address ?? ($couple->venue_address ?? '');
                            $evMap = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                        @endphp
                        <div class="p-5 rounded-2xl bg-academy-navylight border border-academy-gold/40 hover:border-academy-gold/80 transition text-left shadow">
                            <div class="flex items-center justify-between text-academy-gold text-xs font-cinzel mb-1">
                                <span class="font-bold tracking-wider">{{ $ev->title ?? 'SESI ' . ($idx + 1) }}</span>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-academy-navy border border-academy-gold/30 text-academy-gold">{{ $evTimeFormatted }}</span>
                            </div>
                            <h3 class="font-cinzel text-base font-bold text-white mt-1">{{ $evVenue }}</h3>
                            <p class="text-xs text-academy-gold font-medium mt-0.5">📅 {{ $evDateFormatted }}</p>
                            @if(!empty($evAddress))
                                <p class="text-xs text-slate-300 mt-1.5 leading-relaxed">{{ $evAddress }}</p>
                            @endif
                            @if(!empty($evMap))
                                <div class="mt-3 text-left">
                                    <a href="{{ $evMap }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-[11px] font-cinzel font-bold text-academy-gold hover:underline">
                                        <span>📍</span> Buka Google Maps &rarr;
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <!-- Sesi 1 -->
                    <div class="p-5 rounded-2xl bg-academy-navylight border border-academy-gold/30">
                        <div class="flex items-center justify-between text-academy-gold text-xs font-cinzel mb-1">
                            <span>SESI I • SIDANG TERBUKA</span>
                            <span>08:30 - 11:30 WIB</span>
                        </div>
                        <h3 class="font-cinzel text-base font-bold text-white">Prosesi Pelantikan &amp; Pemindahan Kuncir Toga</h3>
                        <p class="text-xs text-slate-300 mt-1">Upacara wisuda resmi dipimpin Senat Guru Besar dan Rektor universitas.</p>
                    </div>

                    <!-- Sesi 2 -->
                    <div class="p-5 rounded-2xl bg-academy-navylight border border-academy-gold/50 shadow-md">
                        <div class="flex items-center justify-between text-academy-gold text-xs font-cinzel mb-1">
                            <span>SESI II • RAMAH TAMAH</span>
                            <span>12:30 - 15:30 WIB</span>
                        </div>
                        <h3 class="font-cinzel text-base font-bold text-white">Syukuran &amp; Jamuan Makan Keluarga</h3>
                        <p class="text-xs text-slate-300 mt-1">Doa bersama, santap siang prasmanan, sesi foto toga kehormatan bersama keluarga &amp; sahabat.</p>
                    </div>
                @endif
            </div>

            <!-- Venue Details & Maps Button -->
            @php
                $mainVenue = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Balairung Utama Universitas');
                $mainAddress = $couple->venue_address ?? ($firstEvent->address ?? 'Kompleks Kampus UI Depok, Jawa Barat');
                $mapLink = !empty($couple->maps_url) ? $couple->maps_url : (!empty($firstEvent->maps_url) ? $firstEvent->maps_url : ('https://maps.google.com/?q=' . urlencode($mainVenue . ' ' . $mainAddress)));
            @endphp
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-academy-navylight border border-academy-gold/40 text-center shadow">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-academy-gold block mb-1">LOKASI &amp; RUANG PERTEMUAN</span>
                <h3 class="font-cinzel text-lg font-bold text-white">{{ $mainVenue }}</h3>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $mainAddress }}</p>
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-academy-gold to-[#B38F24] text-academy-navy text-xs font-cinzel font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Buka Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Campus & Memories Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-academy-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-academy-gold block mb-1">CAMPUS MEMOIR</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-6">Momen Perjalanan Kuliah 🎓</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl(
                            is_object($gal) ? ($gal->image ?? null) : ($gal ?? null),
                            'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800'
                        );
                    @endphp
                    <div class="p-2 rounded-xl bg-academy-navylight border border-academy-gold/30 shadow">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-academy-navy">
                            <img src="{{ $imgSrc }}" alt="Campus Memory {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tanda Kasih / Tali Asih Sarjana (Digital Gift) -->
        <section class="py-14 px-6 border-b border-academy-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-academy-gold block mb-1">TALI ASIH SARJANA</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-3">Tanda Kasih &amp; Apresiasi</h2>
            <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6 leading-relaxed">
                Doa restu dan dukungan Bapak/Ibu/Sahabat sekalian adalah anugerah terbesar. Jika berkenan memberikan tanda kasih tali asih:
            </p>

            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-academy-navylight border border-academy-gold/40 shadow-xl text-center">
                <div class="inline-block px-3 py-1 bg-academy-navy text-academy-gold text-[10px] font-cinzel font-bold tracking-widest uppercase mb-2 border border-academy-gold/30">
                    {{ $couple->bank_name ?? 'BANK MANDIRI' }}
                </div>
                <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '1370019283746' }}
                </p>
                <p class="text-xs text-slate-400 mb-4">a.n {{ $couple->account_name ?? $gradName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '1370019283746' }}', 'Nomor rekening tali asih disalin')" class="w-full py-2.5 rounded-lg bg-academy-gold/20 hover:bg-academy-gold/30 text-academy-gold text-xs font-cinzel font-bold uppercase tracking-wider border border-academy-gold/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-xl bg-academy-navylight border border-academy-gold/20 text-center">
                    <span class="text-[9px] font-cinzel text-academy-gold uppercase font-bold block mb-1">KIRIM HADIAH / BUKET BUNGA</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat pengiriman bunga disalin')" class="mt-2 text-[10px] text-academy-gold hover:underline font-cinzel uppercase">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & Wishes Section -->
        <section class="py-14 px-6 border-b border-academy-gold/20">
            <div class="text-center mb-8">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-academy-gold block">GUESTBOOK OF CONGRATULATIONS</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Konfirmasi &amp; Ucapan Selamat</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-academy-navylight p-6 rounded-2xl border border-academy-gold/30 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-academy-navy border border-academy-gold/30 text-xs text-white focus:outline-none focus:border-academy-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-academy-navy border border-academy-gold/30 text-xs text-white focus:outline-none focus:border-academy-gold">
                            <option value="Hadir">🎓 Hadir Mengucapkan Selamat</option>
                            <option value="Tidak Hadir">✗ Mohon Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">? Menyesuaikan Jadwal</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Untaian Doa &amp; Ucapan Sukses</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan selamat kelulusan & doa masa depan..." class="w-full px-4 py-2.5 rounded-xl bg-academy-navy border border-academy-gold/30 text-xs text-white focus:outline-none focus:border-academy-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-academy-gold to-[#B38F24] text-academy-navy font-cinzel text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Doa Restu &amp; Ucapan 🎓
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-cinzel text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Ucapan Kerabat &amp; Rekan</span>
                    <span class="text-xs font-sans text-academy-gold">{{ isset($wishes) ? count($wishes) : 0 }} Pesan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Sahabat';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-academy-navylight border border-academy-gold/25 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-academy-gold font-cinzel">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-academy-navy text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-200 mt-1 leading-relaxed font-garamond italic">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-academy-navylight border border-academy-gold/20 text-center text-xs text-slate-400 italic">
                            Belum ada ucapan. Jadilah yang pertama memberikan ucapan selamat!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-academy-deep text-slate-400 border-t border-academy-gold/30">
            <p class="font-cinzel text-xl text-academy-gold mb-1">{{ $gradName }}</p>
            <p class="text-xs text-slate-400 font-garamond italic">Ad Maiora Natus Sum • Lahir Untuk Hal-Hal Yang Lebih Besar</p>
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
                    audioIcon.textContent = '🎓';
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
                showToast('Ucapan & Doa berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Sahabat';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-academy-navylight border border-academy-gold/25 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-academy-gold font-cinzel">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-academy-navy text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-200 mt-1 leading-relaxed font-garamond italic">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas ucapan selamat Anda!');
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
                item.className = 'p-2 rounded-xl bg-academy-navylight border border-academy-gold/30 shadow';
                item.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-academy-navy">
                        <img src="${url}" alt="Campus Memory ${idx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultGradImg = "{{ $gradImg }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if (target === 'groom' || target === 'graduate' || target === 'person') {
                    const gradEl1 = document.getElementById('previewGroomPhotoImg');
                    const gradEl2 = document.getElementById('previewGroomPhotoImg2');
                    if (gradEl1) gradEl1.src = photoUrl;
                    if (gradEl2) gradEl2.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'graduate' || target === 'person') {
                    const gradEl1 = document.getElementById('previewGroomPhotoImg');
                    const gradEl2 = document.getElementById('previewGroomPhotoImg2');
                    if (gradEl1) gradEl1.src = defaultGradImg;
                    if (gradEl2) gradEl2.src = defaultGradImg;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_PARENTS') {
                const containerEl = document.getElementById('previewParentsContainer');
                const parentsEl = document.getElementById('previewParentsNames');
                const formatted = data.formatted || data.groomParents;
                if (parentsEl && formatted) {
                    parentsEl.textContent = formatted;
                    if (containerEl) containerEl.classList.remove('hidden');
                }
            }
        });

        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
        }
    </script>
</body>
</html>
