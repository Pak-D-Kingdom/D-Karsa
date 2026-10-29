<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Walimatul Khitan Berkah') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Tasyakuran Walimatul Khitan {{ $couple->groom_name }} - Menuju Kesucian & Ketaatan Beragama.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Walimatul Khitan Berkah') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Bismillah, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam tasyakuran walimatul khitan putra tercinta kami {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200' }}">

    <!-- Google Fonts: Islamic Classical & Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Cinzel:wght@600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        prince: {
                            sapphire: '#0F2537',
                            deep: '#091622',
                            card: '#16324F',
                            cardlight: '#1F4266',
                            gold: '#D4AF37',
                            goldbright: '#F5E296',
                            goldmuted: '#9E8024',
                            border: 'rgba(212, 175, 55, 0.35)',
                            sand: '#F7F4EC',
                            ink: '#0C1B2A',
                        }
                    },
                    fontFamily: {
                        amiri: ['Amiri', 'serif'],
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

        /* Islamic Archway (Mihrab) Shape */
        .mihrab-arch {
            border-top-left-radius: 90px;
            border-top-right-radius: 90px;
        }

        /* Gold Shimmer Text */
        .gold-shimmer {
            background: linear-gradient(135deg, #F5E296 0%, #D4AF37 50%, #9E8024 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Andalusian Geometric Pattern Canvas */
        .andalusian-bg {
            background-color: #091622;
            background-image: radial-gradient(#D4AF37 0.75px, transparent 0.75px), radial-gradient(#1F4266 0.75px, #091622 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
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
<body class="andalusian-bg text-slate-200 font-sans antialiased selection:bg-prince-gold selection:text-prince-sapphire overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200');
        $boyImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB');

        $boyName = $couple->groom_name ?? 'Fatih Al-Ayyubi';
        $boyNick = $couple->groom_nickname ?? 'Fatih';
        $boyParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak H. Syamsuddin & Ibu Hj. Marwah');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-prince-card border border-prince-gold/40 shadow-xl flex items-center justify-center text-prince-gold hover:scale-105 transition" title="Musik Qasidah / Marawis">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 5s;">🕌</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-prince-card border border-prince-gold text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-prince-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         ANDALUSIAN MIHRAB ARCHWAY COVER SCREEN (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-[#0B1528] andalusian-bg flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <!-- Ambient Royal Sapphire Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ $coverImg }}');"></div>
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-prince-gold/15 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-blue-950/40 blur-3xl"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-transparent to-black/85"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="w-8 h-8 mx-auto mb-1 rounded-xl bg-prince-card border border-prince-gold/50 flex items-center justify-center text-base shadow-inner text-prince-gold">
                    ۞
                </div>
                <p class="font-amiri text-base text-prince-goldbright font-bold mb-0.5">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full text-[8.5px] font-cinzel font-bold uppercase tracking-[0.2em] bg-prince-gold/15 text-prince-gold border border-prince-gold/40">
                    {{ $couple->event_heading ?? "WALIMATUL KHITAN" }}
                </span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Young Prince Photo in Arched Mihrab Frame -->
                <div class="relative w-20 h-24 mx-auto mihrab-arch overflow-hidden border-2 border-prince-gold shadow-xl my-1 bg-prince-deep shrink-0">
                    <img id="previewBoyPhotoCoverImg" src="{{ $boyImg }}" alt="{{ $boyName }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-prince-sapphire/80 via-transparent to-transparent"></div>
                </div>

                <!-- Boy's Name -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <p class="text-[9px] font-cinzel tracking-[0.2em] uppercase text-slate-300">TASYAKURAN KHITANAN PUTRA KAMI</p>
                    <h1 id="previewBoyNameCover" class="font-cinzel text-lg sm:text-xl font-extrabold gold-shimmer tracking-wider mt-0.5 truncate">
                        {{ $boyName }}
                    </h1>
                    <p class="text-[9.5px] text-prince-goldbright font-sans font-medium mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Guest Invitation Card -->
                <div class="w-full py-1 px-3 rounded-xl bg-prince-card/90 backdrop-blur-md border border-prince-gold/30 text-center shadow-md mt-0.5">
                    <span class="text-[7.5px] font-cinzel uppercase tracking-[0.2em] text-slate-400 block font-medium">KEPADA YTH:</span>
                    <b id="previewGuestNameCover" class="text-xs font-sans font-bold text-white block mt-0.5 truncate">{{ $guest->name ?? 'Bapak / Ibu / Saudara/i' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button id="open-invitation-btn" type="button" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-prince-gold to-prince-goldmuted hover:brightness-110 active:scale-[0.98] text-prince-sapphire font-cinzel text-xs font-bold uppercase tracking-[0.2em] shadow-lg transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🕌</span> <span>BUKA UNDANGAN KHITAN</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-slate-400 flex items-center gap-1">
                    <span class="text-prince-gold">♫</span> Musik Qasidah & Marawis diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Royal Islamic Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-prince-sapphire text-slate-200 shadow-2xl relative border-x border-prince-gold/30">

        <!-- Header Hero Banner -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-prince-card to-prince-sapphire border-b border-prince-gold/25 relative">
            <span class="text-2xl text-prince-gold block mb-2">۞ ─── ❖ ─── ۞</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-cinzel uppercase tracking-[0.25em] bg-prince-gold/15 text-prince-gold border border-prince-gold/30 mb-2 font-semibold">
                {{ $couple->event_heading ?? "WALIMATUL KHITAN ANAK SHOLEH" }}
            </span>
            <h1 class="font-cinzel text-3xl sm:text-4xl font-extrabold gold-shimmer tracking-wider my-2">
                {{ $boyName }}
            </h1>
            <p class="text-xs text-slate-300 font-sans tracking-wider">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs text-prince-gold mt-2">
                📍 {{ $couple->venue_name ?? 'Kediaman Keluarga Besar' }}
            </p>
        </header>

        <!-- Prophetic Hadith & Prayer Section -->
        <section class="py-12 px-6 border-b border-prince-gold/20 text-center">
            <div class="p-6 rounded-3xl bg-prince-card border border-prince-gold/30 shadow-md">
                <p class="font-amiri text-lg text-prince-goldbright font-bold mb-2">
                    الْفِطْرَةُ خَمْسٌ: الْخِتَانُ، وَالِاسْتِحْدَادُ، وَقَصُّ الشَّارِبِ، وَتَقْلِيمُ الأَظْفَارِ، وَنَتْفُ الآبَاطِ
                </p>
                <p class="font-serif text-xs text-slate-300 italic leading-relaxed">
                    "Fitrah itu ada lima perkara: khitan (bersunat), mencukur bulu kemaluan, memotong kumis, memotong kuku, dan mencabut bulu ketiak."
                </p>
                <span class="inline-block mt-3 text-[10px] font-cinzel text-prince-gold uppercase font-bold tracking-wider">
                    (HR. Bukhari No. 5889 &amp; Muslim No. 257)
                </span>

                <div class="my-4 w-12 h-px bg-prince-gold/50 mx-auto"></div>

                <!-- Parents Introduction -->
                <p class="text-xs text-slate-400">
                    Dengan memohon ridho dan rahmat Allah SWT, kami orang tua:<br>
                    <b id="previewGroomParentsText" class="text-sm font-sans text-white block mt-1">
                        {{ $boyParents }}
                    </b>
                </p>
            </div>
        </section>

        <!-- Young Prince Profile Section -->
        <section class="py-12 px-6 border-b border-prince-gold/20 text-center">
            <div class="relative w-48 h-56 mx-auto mihrab-arch overflow-hidden border-2 border-prince-gold shadow-2xl mb-4 bg-prince-deep">
                <img id="previewGroomPhotoImg" src="{{ $boyImg }}" alt="{{ $boyName }}" class="w-full h-full object-cover">
                <div class="absolute bottom-0 inset-x-0 p-2 bg-gradient-to-t from-prince-sapphire to-transparent">
                    <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-prince-gold font-bold">
                        SANG JAGOAN CILIK
                    </span>
                </div>
            </div>

            <h2 class="font-cinzel text-2xl font-bold text-white">{{ $boyName }}</h2>
            @if(!empty($boyNick))
                <p class="text-xs font-sans text-prince-gold font-bold mt-0.5">Panggilan Akrab: "{{ $boyNick }}"</p>
            @endif

            <p class="text-xs text-slate-300 italic max-w-sm mx-auto mt-3 leading-relaxed font-serif">
                "{{ $couple->quote ?? 'Semoga ananda tumbuh menjadi anak yang sholeh, berbakti kepada kedua orang tua, cerdas, berakhlak mulia, serta bermanfaat bagi agama, nusa, dan bangsa.' }}"
            </p>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-12 px-6 bg-prince-card/40 border-b border-prince-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-prince-gold block mb-1">COUNTDOWN TO CELEBRATION</span>
            <h3 class="font-cinzel text-xl font-bold text-white mb-6">Menghitung Hari Tasyakuran Khitan</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-prince-sapphire border border-prince-gold/40 text-center shadow">
                    <span id="cdDays" class="block font-cinzel text-2xl font-bold text-prince-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-prince-sapphire border border-prince-gold/40 text-center shadow">
                    <span id="cdHours" class="block font-cinzel text-2xl font-bold text-prince-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-prince-sapphire border border-prince-gold/40 text-center shadow">
                    <span id="cdMinutes" class="block font-cinzel text-2xl font-bold text-prince-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-prince-sapphire border border-prince-gold/40 text-center shadow">
                    <span id="cdSeconds" class="block font-cinzel text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Walimatul Khitan') . ' - ' . $boyName);
                $calDetails = urlencode('Menghadiri tasyakuran walimatul khitan & doa bersama anak sholeh.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-prince-card hover:bg-prince-cardlight text-prince-gold text-[10px] font-cinzel tracking-widest uppercase transition border border-prince-gold/40">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-14 px-6 border-b border-prince-gold/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-prince-gold block">AGENDA TASYAKURAN</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Rangkaian Acara Khitanan 🕌</h2>
            </div>

            <div class="space-y-4 max-w-sm mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @foreach($couple->events as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $eventDateFormatted;
                            $evTimeFormatted = !empty($ev->start_time) ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '') : '09:00 WIB';
                            $evVenue = $ev->venue_name ?? ($couple->venue_name ?? 'Kediaman Keluarga');
                            $evAddress = $ev->address ?? ($couple->venue_address ?? '');
                            $evMap = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                        @endphp
                        <div class="p-5 rounded-2xl bg-prince-card border border-prince-gold/30 hover:border-prince-gold/60 transition shadow text-left">
                            <div class="flex items-center justify-between text-prince-gold text-xs font-cinzel mb-1">
                                <span class="font-bold tracking-wider">{{ $ev->title ?? 'SESI ' . ($idx + 1) }}</span>
                                <span class="text-[11px] font-sans font-medium px-2 py-0.5 rounded bg-prince-deep border border-prince-gold/30 text-prince-goldbright">{{ $evTimeFormatted }}</span>
                            </div>
                            <h3 class="font-cinzel text-base font-bold text-white mt-1">{{ $evVenue }}</h3>
                            <p class="text-xs text-prince-goldbright font-medium mt-0.5">📅 {{ $evDateFormatted }}</p>
                            @if(!empty($evAddress))
                                <p class="text-xs text-slate-300 mt-1.5 leading-relaxed">{{ $evAddress }}</p>
                            @endif
                            @if(!empty($evMap))
                                <div class="mt-3 text-left">
                                    <a href="{{ $evMap }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-[11px] font-cinzel font-bold text-prince-gold hover:text-prince-goldbright transition">
                                        <span>📍</span> Petunjuk Google Maps &rarr;
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="p-5 rounded-2xl bg-prince-card border border-prince-gold/30">
                        <div class="flex items-center justify-between text-prince-gold text-xs font-cinzel mb-1">
                            <span>SESI I • PENGAJIAN &amp; DOA</span>
                            <span>08:30 - 10:00 WIB</span>
                        </div>
                        <h3 class="font-cinzel text-base font-bold text-white">Tausiyah Khitan &amp; Sholawat Nabi</h3>
                        <p class="text-xs text-slate-300 mt-1">Pembacaan ayat suci Al-Qur'an, shalawat marawis, tausiyah hikmah khitan &amp; doa selamat.</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-prince-card border border-prince-gold/50 shadow-md">
                        <div class="flex items-center justify-between text-prince-gold text-xs font-cinzel mb-1">
                            <span>SESI II • RAMAH TAMAH</span>
                            <span>10:30 - 14:00 WIB</span>
                        </div>
                        <h3 class="font-cinzel text-base font-bold text-white">Jamuan Santap Siang &amp; Silaturahmi</h3>
                        <p class="text-xs text-slate-300 mt-1">Ramah tamah, santap hidangan prasmanan, sesi foto jagoan cilik &amp; pemberian tali asih.</p>
                    </div>
                @endif
            </div>

            <!-- Venue Details & Maps Button -->
            @php
                $mainVenue = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Kediaman Keluarga Besar');
                $mainAddress = $couple->venue_address ?? ($firstEvent->address ?? 'Jl. Menteng Raya No. 15, Jakarta Pusat');
                $mapLink = !empty($couple->maps_url) ? $couple->maps_url : (!empty($firstEvent->maps_url) ? $firstEvent->maps_url : ('https://maps.google.com/?q=' . urlencode($mainVenue . ' ' . $mainAddress)));
            @endphp
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-prince-card border border-prince-gold/40 text-center shadow-lg">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-prince-gold block mb-1">LOKASI KEDIAMAN KAMI</span>
                <h3 class="font-cinzel text-lg font-bold text-white">{{ $mainVenue }}</h3>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $mainAddress }}</p>
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-prince-gold to-prince-goldmuted text-prince-sapphire text-xs font-cinzel font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Candid Photo Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-prince-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-prince-gold block mb-1">ALBUM FOTO</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-6">Momen Sang Jagoan Cilik 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? '', 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800');
                    @endphp
                    <div class="p-2 rounded-xl bg-prince-card border border-prince-gold/30 shadow">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-prince-deep">
                            <img src="{{ $imgSrc }}" alt="Boy Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tali Asih Anak Sholeh (Digital Gift) -->
        @php
            $hasBank1 = !empty($couple->bank_account_1) || !empty($couple->account_number);
            $hasBank2 = !empty($couple->bank_account_2);
            $hasGift = !empty($couple->gift_address);
        @endphp
        @if($hasBank1 || $hasBank2 || $hasGift)
        <section class="py-14 px-6 border-b border-prince-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-prince-gold block mb-1">TALI ASIH KHITAN</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-3">Tanda Kasih Anak Sholeh</h2>
            <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6 leading-relaxed">
                Doa restu Bapak/Ibu/Saudara/i adalah hadiah paling utama. Namun bagi yang ingin memberikan tali asih tabungan jagoan cilik:
            </p>

            <div class="space-y-4 max-w-xs mx-auto">
                @if($hasBank1)
                    @php
                        $bName1 = $couple->bank_name_1 ?? ($couple->bank_name ?? 'BANK SYARIAH INDONESIA (BSI)');
                        $bAcc1 = $couple->bank_account_1 ?? ($couple->account_number ?? '7891029384');
                        $bHolder1 = $couple->bank_holder_1 ?? ($couple->account_name ?? ($couple->groom_parents ?? $boyName));
                    @endphp
                    <div class="p-6 rounded-2xl bg-prince-card border border-prince-gold/40 shadow-xl text-center">
                        <div class="inline-block px-3 py-1 bg-prince-deep text-prince-gold text-[10px] font-cinzel font-bold tracking-widest uppercase mb-2 border border-prince-gold/30">
                            {{ $bName1 }}
                        </div>
                        <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                            {{ $bAcc1 }}
                        </p>
                        <p class="text-xs text-slate-400 mb-4">a.n {{ $bHolder1 }}</p>

                        <button type="button" onclick="copyToClipboard('{{ $bAcc1 }}', 'Nomor rekening {{ $bName1 }} disalin')" class="w-full py-2.5 rounded-lg bg-prince-gold/20 hover:bg-prince-gold/30 text-prince-gold text-xs font-cinzel font-bold uppercase tracking-wider border border-prince-gold/40 transition flex items-center justify-center gap-2 cursor-pointer">
                            <span>📋</span> Salin Nomor Rekening
                        </button>
                    </div>
                @endif

                @if($hasBank2)
                    @php
                        $bName2 = $couple->bank_name_2 ?? 'BANK';
                        $bAcc2 = $couple->bank_account_2 ?? '';
                        $bHolder2 = $couple->bank_holder_2 ?? ($couple->groom_parents ?? $boyName);
                    @endphp
                    <div class="p-6 rounded-2xl bg-prince-card border border-prince-gold/40 shadow-xl text-center">
                        <div class="inline-block px-3 py-1 bg-prince-deep text-prince-gold text-[10px] font-cinzel font-bold tracking-widest uppercase mb-2 border border-prince-gold/30">
                            {{ $bName2 }}
                        </div>
                        <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                            {{ $bAcc2 }}
                        </p>
                        <p class="text-xs text-slate-400 mb-4">a.n {{ $bHolder2 }}</p>

                        <button type="button" onclick="copyToClipboard('{{ $bAcc2 }}', 'Nomor rekening {{ $bName2 }} disalin')" class="w-full py-2.5 rounded-lg bg-prince-gold/20 hover:bg-prince-gold/30 text-prince-gold text-xs font-cinzel font-bold uppercase tracking-wider border border-prince-gold/40 transition flex items-center justify-center gap-2 cursor-pointer">
                            <span>📋</span> Salin Nomor Rekening
                        </button>
                    </div>
                @endif
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-xl bg-prince-card border border-prince-gold/20 text-center shadow">
                    <span class="text-[9px] font-cinzel text-prince-gold uppercase font-bold block mb-1">KIRIM KADO / BINGKISAN</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat kado disalin')" class="mt-2 text-[10px] text-prince-gold hover:underline font-cinzel uppercase cursor-pointer">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>
        @endif

        <!-- RSVP & Doa Restu Section -->
        <section class="py-14 px-6 border-b border-prince-gold/20">
            <div class="text-center mb-8">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-prince-gold block">GUESTBOOK &amp; PRAYERS</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Konfirmasi &amp; Doa Restu 🕌</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-prince-card p-6 rounded-2xl border border-prince-gold/30 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-prince-deep border border-prince-gold/30 text-xs text-white focus:outline-none focus:border-prince-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-prince-deep border border-prince-gold/30 text-xs text-white focus:outline-none focus:border-prince-gold">
                            <option value="Hadir">InsyaAllah Hadir</option>
                            <option value="Tidak Hadir">Mohon Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">Menyesuaikan Jadwal</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Untaian Doa Untuk Sang Jagoan</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan doa kebaikan untuk ananda tercinta..." class="w-full px-4 py-2.5 rounded-xl bg-prince-deep border border-prince-gold/30 text-xs text-white focus:outline-none focus:border-prince-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-prince-gold to-prince-goldmuted text-prince-sapphire font-cinzel text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Doa Restu Khitan 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-cinzel text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Doa Dari Kerabat &amp; Sahabat</span>
                    <span class="text-xs font-sans text-prince-gold">{{ isset($wishes) ? count($wishes) : 0 }} Doa</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Keluarga';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-prince-card border border-prince-gold/25 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-prince-gold font-cinzel">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-prince-deep text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-prince-card border border-prince-gold/20 text-center text-xs text-slate-400 italic">
                            Belum ada doa. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-prince-deep text-slate-400 border-t border-prince-gold/30">
            <p class="font-cinzel text-xl text-prince-gold mb-1">{{ $boyName }}</p>
            <p class="text-xs text-slate-400 font-serif italic">Jazakumullahu Khairan Katsiran • Terima kasih atas doa &amp; silaturahmi Anda.</p>
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
                    audioIcon.textContent = '🕌';
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
                showToast('Doa restu berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Keluarga';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-prince-card border border-prince-gold/25 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-prince-gold font-cinzel">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-prince-deep text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas doa restunya!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for live preview reset
        const defaultBoyPhoto = "{{ $boyImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultBoyParents = @json($boyParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIdx) => {
                const div = document.createElement('div');
                div.className = 'p-2 rounded-xl bg-prince-card border border-prince-gold/30 shadow';
                div.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-prince-deep">
                        <img src="${imgUrl}" alt="Boy Moment ${gIdx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if ((event.data.target === 'groom' || event.data.target === 'boy') && event.data.dataUrl) {
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = event.data.dataUrl;
                    const el2 = document.getElementById('previewBoyPhotoCoverImg');
                    if (el2) el2.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' || event.data.target === 'boy') {
                    const url = event.data.defaultUrl || defaultBoyPhoto;
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = url;
                    const el2 = document.getElementById('previewBoyPhotoCoverImg');
                    if (el2) el2.src = url;
                } else if (event.data.target === 'cover') {
                    const url = event.data.defaultUrl || defaultCoverPhoto;
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${url}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = url;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                const pEl = document.getElementById('previewGroomParentsText');
                if (pEl) {
                    if (event.data.groomParents) {
                        pEl.textContent = event.data.groomParents;
                    } else if (event.data.resetDefault) {
                        pEl.textContent = defaultBoyParents;
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
