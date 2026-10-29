<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Kids Birthday Party') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Pesta Ulang Tahun Anak {{ $couple->groom_name }} - Penuh Warna, Ceria & Menyenangkan!">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Kids Birthday Party') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Ayo datang dan seru-seruan bersama merayakan ulang tahun {{ $couple->groom_name }}!">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200' }}">

    <!-- Google Fonts: Playful Chubby Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Sniglet:wght@800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        candy: {
                            yellow: '#FFD166',
                            yellowlight: '#FFF6D6',
                            pink: '#FF6B8B',
                            pinklight: '#FFEBF0',
                            blue: '#4ECDC4',
                            bluelight: '#E8F9F8',
                            purple: '#9D4EDD',
                            purplelight: '#F4EBFA',
                            orange: '#FA824C',
                            canvas: '#FFFDF9',
                            ink: '#2B2D42',
                        }
                    },
                    fontFamily: {
                        fredoka: ['Fredoka', 'sans-serif'],
                        sniglet: ['Sniglet', 'cursive'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Floating Balloon Animation */
        @keyframes balloonFloat {
            0%, 100% { transform: translateY(0px) rotate(-3deg); }
            50% { transform: translateY(-14px) rotate(3deg); }
        }
        .animate-balloon-slow {
            animation: balloonFloat 4s ease-in-out infinite;
        }

        /* Washi Tape Effect for Polaroids */
        .washi-tape {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%) rotate(-2deg);
            width: 70px;
            height: 18px;
            background-color: rgba(255, 209, 102, 0.85);
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
            z-index: 10;
        }

        /* Confetti Dot Pattern */
        .confetti-pattern {
            background-color: #FFFDF9;
            background-image: radial-gradient(#FF6B8B 1.5px, transparent 1.5px), radial-gradient(#4ECDC4 1.5px, #FFFDF9 1.5px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
        }

        /* Playful Card Box */
        .playful-card {
            background: #FFFFFF;
            border: 2px solid #F0ECE1;
            border-radius: 28px;
            box-shadow: 0 8px 24px -4px rgba(255, 107, 139, 0.08);
        }

        /* Toast animation */
        @keyframes toastPop {
            0% { opacity: 0; transform: translate(-50%, 20px) scale(0.9); }
            15% { opacity: 1; transform: translate(-50%, 0) scale(1); }
            85% { opacity: 1; transform: translate(-50%, 0) scale(1); }
            100% { opacity: 0; transform: translate(-50%, -15px) scale(0.95); }
        }
        .toast-active {
            animation: toastPop 2.8s ease forwards;
        }
        /* Hide scrollbars for app-like clean mobile experience */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="confetti-pattern text-candy-ink font-sans antialiased selection:bg-candy-yellow selection:text-candy-ink overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200');
        $kidImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '15:30 WIB');

        $kidName = $couple->groom_name ?? 'Arkan Danendra';
        $kidNick = $couple->groom_nickname ?? 'Arkan';
        $kidParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Ayah & Bunda Tercinta');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border-2 border-candy-yellow shadow-lg flex items-center justify-center text-candy-pink hover:scale-110 transition" title="Musik Ceria">
            <span id="audioDiscIcon" class="text-xl animate-spin" style="animation-duration: 4s;">🎈</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-candy-ink text-white text-xs font-bold font-fredoka rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-candy-yellow">🍭</span>
        <span id="toastMessage">Teks berhasil disalin!</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (Playful Surprise Gift Box Modal - Edge-to-Edge)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-gradient-to-b from-[#FFF2B2] via-[#FFD6E0] to-[#E2F7F5] confetti-pattern flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-candy-ink select-none">
        <!-- Ambient Balloons & Confetti (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ $coverImg }}');"></div>
            <div class="confetti-dot absolute top-4 left-4 w-4 h-4 rounded-full bg-candy-pink/40"></div>
            <div class="confetti-dot absolute top-8 right-6 w-3 h-3 rounded-full bg-candy-yellow/60"></div>
            <div class="confetti-dot absolute bottom-8 left-8 w-3 h-3 rounded-full bg-candy-teal/50"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="flex justify-center items-center gap-2 mb-1 animate-balloon-slow">
                    <span class="text-2xl">🎈</span>
                    <span class="text-2xl">🎂</span>
                    <span class="text-2xl">🎉</span>
                </div>
                <span id="previewHeadingCover" class="inline-block px-3 py-0.5 rounded-full text-[9px] font-extrabold uppercase tracking-wider bg-candy-yellow text-candy-ink shadow-xs font-fredoka">
                    {{ $couple->event_heading ?? "KIDS BIRTHDAY PARTY" }}
                </span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Kid Photo in Playful Arched Frame -->
                <div class="relative w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-full overflow-hidden border-3 border-candy-pink p-1 bg-white shadow-lg my-1 shrink-0">
                    <img id="previewKidPhotoCoverImg" src="{{ $kidImg }}" alt="{{ $kidName }}" class="w-full h-full object-cover rounded-full">
                </div>

                <!-- Kid's Name & Celebration -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewKidNameCover" class="font-fredoka text-xl sm:text-2xl font-extrabold text-candy-ink leading-tight truncate">
                        {{ $kidName }}
                    </h1>
                    <p class="text-xs font-fredoka font-semibold text-candy-purple mt-0.5">
                        Merayakan Ulang Tahun Penuh Ceria 🎪
                    </p>
                    <p class="text-[9.5px] text-slate-500 font-medium mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Guest Invitation Card -->
                <div class="w-full py-1 px-3 rounded-xl bg-candy-yellowlight/90 backdrop-blur-md border border-dashed border-candy-yellow text-center shadow-xs mt-0.5">
                    <span class="text-[7.5px] font-fredoka uppercase tracking-widest text-candy-orange font-bold block">UNDANGAN SPESIAL UNTUK SAHABAT:</span>
                    <b id="previewGuestNameCover" class="text-xs font-fredoka text-candy-ink block mt-0.5 truncate">{{ $guest->name ?? 'Teman Cilik Tersayang' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-candy-pink to-candy-orange hover:brightness-105 active:scale-[0.98] text-white font-fredoka text-xs font-bold uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🎁</span> <span>BUKA KOTAK PESTA!</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-slate-500 flex items-center gap-1">
                    <span class="text-candy-pink">♫</span> Musik Pesta Ceria diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Candy Carnival Storybook)
         ======================================================== -->
    <main id="mainContent" class="max-w-[480px] mx-auto min-h-screen bg-candy-canvas text-candy-ink shadow-2xl relative border-x border-[#F0ECE1]">

        <!-- Top Header Hero -->
        <header class="pt-14 pb-10 px-6 text-center bg-gradient-to-b from-[#FFF5DC] to-candy-canvas relative overflow-hidden">
            <div class="flex justify-center gap-3 text-2xl mb-2">
                <span>🧁</span>
                <span>🎪</span>
                <span>🚀</span>
            </div>
            <span class="inline-block px-3.5 py-1 rounded-full text-xs font-bold uppercase bg-candy-pinklight text-candy-pink font-fredoka">
                {{ $couple->event_heading ?? "PESTA ULANG TAHUN ANAK" }}
            </span>
            <h1 class="font-fredoka text-4xl font-extrabold text-candy-ink mt-2 mb-1">
                {{ $kidName }}
            </h1>
            <p class="text-sm font-fredoka font-semibold text-candy-purple">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs font-medium text-slate-500 mt-2">
                📍 {{ $couple->venue_name ?? 'Kidz Fun Kingdom & Cafe' }}
            </p>
        </header>

        <!-- Birthday Kid Profile & Sweet Message -->
        <section class="py-10 px-6">
            <div class="playful-card p-6 text-center relative overflow-hidden">
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden border-4 border-candy-yellow shadow-lg mb-4">
                    <img id="previewGroomPhotoImg" src="{{ $kidImg }}" alt="{{ $kidName }}" class="w-full h-full object-cover">
                </div>

                <span class="inline-block px-3 py-1 rounded-full bg-candy-bluelight text-candy-blue text-xs font-fredoka font-bold mb-2">
                    THE BIRTHDAY STAR ⭐
                </span>
                <h2 class="font-fredoka text-2xl font-bold text-candy-ink">{{ $kidName }}</h2>
                @if(!empty($kidNick))
                    <p class="text-xs font-fredoka text-candy-orange font-semibold">Panggilan: "{{ $kidNick }}"</p>
                @endif

                <p class="text-xs text-slate-600 mt-3 leading-relaxed font-sans italic">
                    "{{ $couple->quote ?? 'Tumbuhlah menjadi anak yang ceria, sehat, penuh rasa ingin tahu, dan selalu menebarkan senyum bahagia untuk semua orang di sekitarmu.' }}"
                </p>

                <div class="mt-4 pt-4 border-t border-dashed border-slate-200 text-xs text-slate-500">
                    Penuh Kasih Dari:<br>
                    <b id="previewGroomParentsText" class="text-candy-ink font-fredoka">{{ $kidParents }}</b>
                </div>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-8 px-6 text-center">
            <h3 class="font-fredoka text-xl font-bold text-candy-ink mb-4">⏰ Menghitung Hari Pesta Seru</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-2xl bg-candy-yellowlight border-2 border-candy-yellow text-center shadow-sm">
                    <span id="cdDays" class="block font-fredoka text-2xl font-bold text-candy-ink">00</span>
                    <span class="text-[9px] font-fredoka uppercase text-candy-orange font-bold">Hari</span>
                </div>
                <div class="p-3 rounded-2xl bg-candy-pinklight border-2 border-candy-pink text-center shadow-sm">
                    <span id="cdHours" class="block font-fredoka text-2xl font-bold text-candy-ink">00</span>
                    <span class="text-[9px] font-fredoka uppercase text-candy-pink font-bold">Jam</span>
                </div>
                <div class="p-3 rounded-2xl bg-candy-bluelight border-2 border-candy-blue text-center shadow-sm">
                    <span id="cdMinutes" class="block font-fredoka text-2xl font-bold text-candy-ink">00</span>
                    <span class="text-[9px] font-fredoka uppercase text-candy-blue font-bold">Menit</span>
                </div>
                <div class="p-3 rounded-2xl bg-candy-purplelight border-2 border-candy-purple text-center shadow-sm">
                    <span id="cdSeconds" class="block font-fredoka text-2xl font-bold text-candy-ink">00</span>
                    <span class="text-[9px] font-fredoka uppercase text-candy-purple font-bold">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Kids Birthday Party') . ' - ' . $kidName);
                $calDetails = urlencode('Pesta ulang tahun seru bersama sahabat cilik. Jangan lupa bawa kado ceria!');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(3)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white hover:bg-candy-yellowlight text-candy-ink text-xs font-fredoka font-bold border-2 border-candy-yellow shadow-sm transition">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Party Quest & Rundown Itinerary -->
        <section class="py-10 px-6">
            <div class="text-center mb-6">
                <span class="text-xs font-fredoka font-bold uppercase tracking-wider text-candy-pink block">PARTY RUNDOWN</span>
                <h2 class="font-fredoka text-2xl font-extrabold text-candy-ink">Petualangan Seru Pesta 🎪</h2>
            </div>

            <div class="space-y-3.5 max-w-sm mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @php
                        $partyIcons = ['🎈', '🎂', '🎉', '🎁', '🎪', '🤹'];
                    @endphp
                    @foreach($couple->events as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $eventDateFormatted;
                            $evTimeFormatted = !empty($ev->start_time) ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '') : '15:30 WIB';
                            $evVenue = $ev->venue_name ?? ($couple->venue_name ?? 'Tempat Pesta Ceria');
                            $evAddress = $ev->address ?? ($couple->venue_address ?? '');
                            $evMap = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                            $pIcon = $partyIcons[$idx % count($partyIcons)];
                        @endphp
                        <div class="p-4 rounded-2xl bg-white border-2 border-candy-yellow/60 flex items-start gap-3.5 shadow-sm text-left">
                            <div class="w-11 h-11 rounded-2xl bg-candy-yellowlight flex items-center justify-center text-xl shrink-0 mt-0.5">
                                {{ $pIcon }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-0.5">
                                    <span class="text-[10px] font-fredoka font-bold text-candy-orange block">{{ $evTimeFormatted }}</span>
                                    <span class="text-[9px] font-fredoka text-slate-400 font-medium">{{ $evDateFormatted }}</span>
                                </div>
                                <h3 class="font-fredoka text-sm font-bold text-candy-ink">{{ $ev->title ?? 'Rangkaian Pesta ' . ($idx + 1) }}</h3>
                                <p class="text-xs text-candy-ink/80 font-medium mt-0.5">{{ $evVenue }}</p>
                                @if(!empty($evAddress))
                                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $evAddress }}</p>
                                @endif
                                @if(!empty($evMap))
                                    <a href="{{ $evMap }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-[11px] font-fredoka font-bold text-candy-orange hover:underline mt-2">
                                        <span>📍</span> Petunjuk Google Maps &rarr;
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 rounded-2xl bg-white border-2 border-[#F0ECE1] flex items-center gap-3.5 shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-candy-yellowlight flex items-center justify-center text-xl shrink-0">
                            🤹
                        </div>
                        <div>
                            <span class="text-[10px] font-fredoka font-bold text-candy-orange block">15:30 - 16:00 WIB</span>
                            <h3 class="font-fredoka text-sm font-bold text-candy-ink">Kedatangan &amp; Sambutan Badut</h3>
                            <p class="text-xs text-slate-500">Tamu sahabat cilik tiba, foto di booth balon &amp; welcome snacks.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white border-2 border-candy-pink/50 flex items-center gap-3.5 shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-candy-pinklight flex items-center justify-center text-xl shrink-0">
                            🎯
                        </div>
                        <div>
                            <span class="text-[10px] font-fredoka font-bold text-candy-pink block">16:00 - 16:45 WIB</span>
                            <h3 class="font-fredoka text-sm font-bold text-candy-ink">Fun Games &amp; Atraksi Sulap</h3>
                            <p class="text-xs text-slate-500">Games seru berhadiah banyak hadiah menarik untuk semua anak!</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white border-2 border-candy-yellow flex items-center gap-3.5 shadow-md">
                        <div class="w-11 h-11 rounded-2xl bg-candy-yellow flex items-center justify-center text-xl shrink-0">
                            🎂
                        </div>
                        <div>
                            <span class="text-[10px] font-fredoka font-bold text-candy-orange block">16:45 - 17:15 WIB</span>
                            <h3 class="font-fredoka text-sm font-bold text-candy-ink">Tiup Lilin &amp; Potong Kue Tart</h3>
                            <p class="text-xs text-slate-500">Menyanyikan lagu ulang tahun, tiup lilin, dan makan kue bersama.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white border-2 border-[#F0ECE1] flex items-center gap-3.5 shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-candy-bluelight flex items-center justify-center text-xl shrink-0">
                            🛍️
                        </div>
                        <div>
                            <span class="text-[10px] font-fredoka font-bold text-candy-blue block">17:15 WIB - Selesai</span>
                            <h3 class="font-fredoka text-sm font-bold text-candy-ink">Bagi Goodie Bag Ceria</h3>
                            <p class="text-xs text-slate-500">Pembagian paket bingkisan &amp; foto bersama teman-teman.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-6 p-5 rounded-2xl bg-white border-2 border-[#F0ECE1] text-center shadow-sm">
                <span class="text-[10px] font-fredoka uppercase text-candy-purple font-bold block mb-1">LOKASI PESTA KAMI</span>
                <h3 class="font-fredoka text-base font-bold text-candy-ink">{{ $couple->venue_name ?? 'Kidz Kingdom Playground' }}</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Mall Central Park Lt. 2, Jl. Letjen S. Parman No. 28, Jakarta Barat' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-candy-yellow hover:bg-[#F2C24B] text-candy-ink font-fredoka text-xs font-bold shadow transition">
                        <span>📍</span> Buka Peta Lokasi (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Polaroid Gallery with Washi Tape -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800'],
                ];
            }
        @endphp
        <section class="py-10 px-6 text-center">
            <span class="text-xs font-fredoka font-bold uppercase tracking-wider text-candy-blue block mb-1">CANDID MOMENTS</span>
            <h2 class="font-fredoka text-2xl font-extrabold text-candy-ink mb-6">Galeri Senyum Si Kecil 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-4 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? '', 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800');
                        $rotations = ['-rotate-2', 'rotate-2', 'rotate-1', '-rotate-1'];
                        $rotClass = $rotations[$gIdx % 4];
                    @endphp
                    <div class="relative bg-white p-2.5 pb-5 rounded-2xl shadow-md border border-[#F0ECE1] transform {{ $rotClass }} hover:rotate-0 hover:scale-105 transition duration-300">
                        <div class="washi-tape"></div>
                        <div class="w-full h-32 rounded-xl overflow-hidden bg-slate-100">
                            <img src="{{ $imgSrc }}" alt="Kid Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Celengan Ceria / Kado Si Kecil (Digital Gift) -->
        <section class="py-10 px-6 text-center">
            <span class="text-xs font-fredoka font-bold uppercase tracking-wider text-candy-pink block mb-1">TALI ASIH</span>
            <h2 class="font-fredoka text-2xl font-extrabold text-candy-ink mb-3">Celengan Ceria Si Kecil 🐷</h2>
            <p class="text-xs text-slate-500 max-w-xs mx-auto mb-6 leading-relaxed">
                Doa dan kehadiran sahabat cilik adalah kebahagiaan terbesar. Bagi yang ingin berbagi tanda kasih untuk tabungan masa depan si kecil:
            </p>

            <div class="max-w-xs mx-auto p-5 rounded-3xl bg-white border-2 border-candy-yellow shadow-md text-center">
                <div class="inline-block px-3 py-1 rounded-full bg-candy-yellowlight text-candy-orange text-xs font-fredoka font-bold uppercase mb-2">
                    {{ $couple->bank_name ?? 'BCA' }}
                </div>
                <p class="font-fredoka text-lg font-bold text-candy-ink my-1">
                    {{ $couple->account_number ?? '5540123987' }}
                </p>
                <p class="text-xs text-slate-500 mb-4">a.n {{ $couple->account_name ?? ($couple->groom_parents ?? $kidName) }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '5540123987' }}', 'Nomor celengan berhasil disalin! 🍬')" class="w-full py-2.5 rounded-xl bg-candy-yellow hover:bg-[#F2C24B] text-candy-ink font-fredoka text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-1.5 shadow-sm">
                    <span>📋</span> Salin Nomor Tabungan
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-2xl bg-white border border-[#F0ECE1] text-center">
                    <span class="text-[10px] font-fredoka text-candy-purple uppercase font-bold block mb-1">KIRIM KADO MAINAN / BINGKISAN</span>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat kado berhasil disalin!')" class="mt-2 text-xs text-candy-pink font-fredoka font-bold hover:underline">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- Buku Tamu & RSVP Ceria -->
        <section class="py-10 px-6">
            <div class="text-center mb-6">
                <span class="text-xs font-fredoka font-bold uppercase tracking-wider text-candy-purple block">GUESTBOOK</span>
                <h2 class="font-fredoka text-2xl font-extrabold text-candy-ink">Ucapan Selamat &amp; RSVP 🎈</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-white p-6 rounded-3xl border-2 border-[#F0ECE1] shadow-md mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-3.5">
                        <label class="block text-xs font-fredoka font-bold text-candy-ink mb-1">Nama Sahabat Cilik / Keluarga</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Contoh: Tante Sarah & Arka" class="w-full px-4 py-2.5 rounded-xl bg-candy-canvas border border-[#F0ECE1] text-xs font-sans text-candy-ink focus:outline-none focus:border-candy-yellow">
                    </div>

                    <div class="mb-3.5">
                        <label class="block text-xs font-fredoka font-bold text-candy-ink mb-1">Apakah Kamu Akan Datang?</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-candy-canvas border border-[#F0ECE1] text-xs font-fredoka text-candy-ink focus:outline-none focus:border-candy-yellow">
                            <option value="Hadir">🎈 Pasti Datang Bawa Kado!</option>
                            <option value="Tidak Hadir">😿 Maaf, Belum Bisa Ikut</option>
                            <option value="Ragu-ragu">❓ Masih Disesuaikan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-fredoka font-bold text-candy-ink mb-1">Pesan / Doa Untuk Si Kecil</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan harapan & doa untuk si kecil tercinta..." class="w-full px-4 py-2.5 rounded-xl bg-candy-canvas border border-[#F0ECE1] text-xs font-sans text-candy-ink focus:outline-none focus:border-candy-yellow"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-candy-pink to-candy-orange text-white font-fredoka text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-105 transition">
                        Kirim Ucapan Ceria 🎉
                    </button>
                </form>
            </div>

            <!-- Wishes Stream -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-fredoka text-sm text-candy-ink font-bold mb-2 flex items-center justify-between">
                    <span>Doa Dari Teman &amp; Keluarga</span>
                    <span class="text-xs text-candy-pink">{{ isset($wishes) ? count($wishes) : 0 }} Ucapan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Sahabat Cilik';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-2xl bg-white border border-[#F0ECE1] text-left shadow-sm">
                                <div class="flex items-center justify-between mb-1">
                                    <b class="text-xs text-candy-purple font-fredoka">{{ $wName }}</b>
                                    <span class="text-[9px] font-fredoka px-2 py-0.5 rounded-full bg-candy-yellowlight text-candy-orange font-bold">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-2xl bg-white border border-[#F0ECE1] text-center text-xs text-slate-400 italic font-fredoka">
                            Belum ada ucapan. Ayo jadi yang pertama kirim doa ceria!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-10 px-6 text-center bg-white border-t border-[#F0ECE1]">
            <p class="font-fredoka text-xl font-bold text-candy-pink mb-1">Terima Kasih Banyak! 🍭</p>
            <p class="text-xs text-slate-500 font-medium">Sampai bertemu di pesta ulang tahun {{ $kidName }}!</p>
            <div class="mt-6 pt-4 border-t border-slate-100 text-[9px] text-slate-400 font-fredoka">
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
                    audioIcon.textContent = '🎈';
                }).catch(e => console.log('Audio autoplay:', e));
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
                showToast(msg || 'Berhasil disalin! 🍬');
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
                showToast('Hore! Ucapan berhasil dikirim! 🎈');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Sahabat Cilik';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-2xl bg-white border border-[#F0ECE1] text-left shadow-sm';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1">
                            <b class="text-xs text-candy-purple font-fredoka">${name}</b>
                            <span class="text-[9px] font-fredoka px-2 py-0.5 rounded-full bg-candy-yellowlight text-candy-orange font-bold">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas doa cerianya!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for live preview reset
        const defaultKidPhoto = "{{ $kidImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultKidParents = @json($kidParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            const rotations = ['-rotate-2', 'rotate-2', 'rotate-1', '-rotate-1'];
            images.forEach((imgUrl, gIdx) => {
                const rotClass = rotations[gIdx % 4];
                const div = document.createElement('div');
                div.className = `relative bg-white p-2.5 pb-5 rounded-2xl shadow-md border border-[#F0ECE1] transform ${rotClass} hover:rotate-0 hover:scale-105 transition duration-300`;
                div.innerHTML = `
                    <div class="washi-tape"></div>
                    <div class="w-full h-32 rounded-xl overflow-hidden bg-slate-100">
                        <img src="${imgUrl}" alt="Kid Moment ${gIdx + 1}" class="w-full h-full object-cover">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if ((event.data.target === 'groom' || event.data.target === 'kid') && event.data.dataUrl) {
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = event.data.dataUrl;
                    const el2 = document.getElementById('previewKidPhotoCoverImg');
                    if (el2) el2.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' || event.data.target === 'kid') {
                    const url = event.data.defaultUrl || defaultKidPhoto;
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = url;
                    const el2 = document.getElementById('previewKidPhotoCoverImg');
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
                        pEl.textContent = defaultKidParents;
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
