<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Tasyakuran Aqiqah Buah Hati') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Tasyakuran Aqiqah & Tasmiyah Buah Hati Tercinta {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Tasyakuran Aqiqah Buah Hati') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Bismillah, dengan penuh rasa syukur atas karunia sang buah hati, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam tasyakuran aqiqah {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200' }}">

    <!-- Google Fonts: Whimsical Gentle Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Quicksand:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nursery: {
                            canvas: '#FBF9F5',
                            card: '#FFFFFF',
                            mint: '#6E9887',
                            softmint: '#EBF4F0',
                            sage: '#8FA89B',
                            cloud: '#F0F5F8',
                            gold: '#D8AB4C',
                            goldlight: '#FEF9EC',
                            ink: '#2B332E',
                            border: '#E8E3DA',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        quick: ['Quicksand', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Gentle cloud floating */
        @keyframes floatGentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float-cloud {
            animation: floatGentle 4.5s ease-in-out infinite;
        }

        /* Scalloped / Cloud Card Border */
        .nursery-card {
            background: #FFFFFF;
            border: 2px solid #EBE6DC;
            border-radius: 28px;
            box-shadow: 0 10px 30px -5px rgba(110, 152, 135, 0.08);
        }

        /* Starlight Dot Pattern */
        .starlight-pattern {
            background-color: #FBF9F5;
            background-image: radial-gradient(#D8AB4C 1px, transparent 1px), radial-gradient(#8FA89B 1px, #FBF9F5 1px);
            background-size: 32px 32px;
            background-position: 0 0, 16px 16px;
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
    </style>
</head>
<body class="starlight-pattern text-nursery-ink font-sans antialiased selection:bg-nursery-mint selection:text-white">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200');
        $babyImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB');

        $babyName = $couple->groom_name ?? 'Kenzie Al-Fatih Pratama';
        $babyNick = $couple->groom_nickname ?? 'Kenzie';
        $babyParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak Ahmad & Ibu Nurul Fatimah');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border border-nursery-border shadow-md flex items-center justify-center text-nursery-mint hover:scale-105 transition" title="Musik Pengiring">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🌙</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-nursery-ink text-white text-xs font-quick font-bold rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-nursery-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         NURSERY CLOUD & STARLIGHT COVER SCREEN
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-b from-[#EBF4F0] via-[#F4EFE6] to-[#E8F1F5] p-4 transition-all duration-700 ease-in-out">
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-15 mix-blend-overlay pointer-events-none" style="background-image: url('{{ $coverImg }}');"></div>
        <div class="relative w-full max-w-sm bg-white rounded-3xl p-7 text-center shadow-2xl border-2 border-nursery-mint/30 overflow-hidden">
            
            <!-- Floating Crescent Moon & Star -->
            <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-nursery-softmint flex items-center justify-center text-3xl animate-float-cloud">
                🌙
            </div>

            <!-- Arabic Bismillah Calligraphy -->
            <p class="font-serif text-lg text-nursery-mint font-bold mb-1">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] font-quick font-bold uppercase tracking-wider bg-nursery-goldlight text-nursery-gold border border-nursery-gold/30 mb-3">
                {{ $couple->event_heading ?? "TASYAKURAN AQIQAH & TASMIYAH" }}
            </span>

            <!-- Baby Photo in Cloud Beaded Frame -->
            <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden border-4 border-nursery-mint/40 p-1 bg-white shadow-xl my-3">
                <img id="previewBabyPhotoCoverImg" src="{{ $babyImg }}" alt="{{ $babyName }}" class="w-full h-full object-cover rounded-full">
            </div>

            <!-- Baby's Name -->
            <div class="my-3">
                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-nursery-ink leading-tight">
                    {{ $babyName }}
                </h1>
                <p class="text-xs text-nursery-mint font-quick font-bold uppercase tracking-wider mt-1">
                    Buah Hati Tercinta
                </p>
                <p class="text-xs text-slate-500 font-medium mt-1">
                    📅 {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Guest Card -->
            <div class="mt-4 p-3 rounded-2xl bg-nursery-softmint/60 border border-nursery-mint/30 text-center">
                <span class="text-[9px] font-quick uppercase tracking-wider text-nursery-mint font-bold block">UNDANGAN KEPADA YTH:</span>
                <b class="text-sm font-serif text-nursery-ink block mt-0.5">{{ $guest->name ?? 'Bapak / Ibu / Saudara/i' }}</b>
            </div>

            <!-- Open Invitation Action -->
            <button type="button" onclick="openInvitation()" class="mt-6 w-full py-3.5 rounded-2xl bg-nursery-mint hover:bg-[#5B8071] text-white font-quick text-xs font-bold uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-2">
                <span>🌙</span> BUKA UNDANGAN AQIQAH
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Sweet Nursery Tale Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[480px] mx-auto min-h-screen bg-nursery-canvas text-nursery-ink shadow-2xl relative border-x border-nursery-border">

        <!-- Top Header Hero -->
        <header class="pt-14 pb-10 px-6 text-center bg-gradient-to-b from-nursery-softmint to-nursery-canvas border-b border-nursery-border relative">
            <span class="text-2xl block mb-2">⭐ 🌙 ⭐</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] font-quick font-bold uppercase tracking-wider bg-white border border-nursery-mint/30 text-nursery-mint mb-2">
                {{ $couple->event_heading ?? "TASYAKURAN AQIQAH & TASMIYAH" }}
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-nursery-ink my-1">
                {{ $babyName }}
            </h1>
            <p class="text-xs font-quick font-bold text-nursery-gold uppercase tracking-wider">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs text-slate-500 mt-2">
                📍 {{ $couple->venue_name ?? 'Kediaman Keluarga' }}
            </p>
        </header>

        <!-- Prophetic Blessing & Prayer Section -->
        <section class="py-10 px-6">
            <div class="nursery-card p-6 text-center">
                <p class="font-serif text-base text-nursery-mint font-bold mb-2">
                    بَارَكَ اللهُ لَكَ فِي المَوهُوبِ لَكَ وَشَكَرْتَ الوَاهِبَ
                </p>
                <p class="font-serif text-xs text-slate-600 italic leading-relaxed">
                    "Semoga Allah memberkahimu atas karunia anak yang dianugerahkan kepadamu, semoga engkau senantiasa bersyukur kepada Sang Maha Pemberi, dan semoga ia tumbuh menjadi anak yang berbakti serta mencapai usia yang matang."
                </p>

                <div class="my-4 w-12 h-px bg-nursery-gold mx-auto"></div>

                <!-- Parents Introduction -->
                <p class="text-xs text-slate-500">
                    Merupakan anugerah terindah bagi kami orang tua:<br>
                    <b id="previewGroomParentsText" class="text-sm font-serif text-nursery-ink font-bold block mt-1">
                        {{ $babyParents }}
                    </b>
                </p>
            </div>
        </section>

        <!-- Baby Details / Birth Milestone Card -->
        <section class="py-6 px-6">
            <div class="p-6 rounded-3xl bg-white border-2 border-nursery-mint/20 shadow-sm text-center">
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden border-4 border-nursery-mint/30 shadow-md mb-4">
                    <img id="previewGroomPhotoImg" src="{{ $babyImg }}" alt="{{ $babyName }}" class="w-full h-full object-cover">
                </div>

                <span class="inline-block px-3 py-1 rounded-full bg-nursery-softmint text-nursery-mint text-[10px] font-quick font-bold uppercase mb-2">
                    BIODATA KELAHIRAN SI KECIL 👶
                </span>
                <h2 class="font-serif text-2xl font-bold text-nursery-ink">{{ $babyName }}</h2>
                @if(!empty($babyNick))
                    <p class="text-xs font-quick text-nursery-gold font-bold">Nama Panggilan: "{{ $babyNick }}"</p>
                @endif

                <div class="grid grid-cols-2 gap-3 max-w-xs mx-auto mt-5 text-left text-xs">
                    <div class="p-3 rounded-2xl bg-nursery-canvas border border-nursery-border">
                        <span class="text-[9px] font-quick text-slate-400 uppercase font-bold block">TANGGAL LAHIR</span>
                        <b class="text-nursery-ink">{{ $targetDate->subDays(14)->locale('id')->isoFormat('D MMMM Y') }}</b>
                    </div>
                    <div class="p-3 rounded-2xl bg-nursery-canvas border border-nursery-border">
                        <span class="text-[9px] font-quick text-slate-400 uppercase font-bold block">WAKTU LAHIR</span>
                        <b class="text-nursery-ink">06:15 WIB</b>
                    </div>
                    <div class="p-3 rounded-2xl bg-nursery-canvas border border-nursery-border">
                        <span class="text-[9px] font-quick text-slate-400 uppercase font-bold block">BERAT BADAN</span>
                        <b class="text-nursery-ink">3.350 Gram</b>
                    </div>
                    <div class="p-3 rounded-2xl bg-nursery-canvas border border-nursery-border">
                        <span class="text-[9px] font-quick text-slate-400 uppercase font-bold block">PANJANG BADAN</span>
                        <b class="text-nursery-ink">50 cm</b>
                    </div>
                </div>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-8 px-6 text-center">
            <h3 class="font-serif text-xl font-bold text-nursery-ink mb-4">Menghitung Hari Tasyakuran</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                    <span id="cdDays" class="block font-serif text-2xl font-bold text-nursery-mint">00</span>
                    <span class="text-[9px] font-quick uppercase text-slate-400 font-bold">Hari</span>
                </div>
                <div class="p-3 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                    <span id="cdHours" class="block font-serif text-2xl font-bold text-nursery-mint">00</span>
                    <span class="text-[9px] font-quick uppercase text-slate-400 font-bold">Jam</span>
                </div>
                <div class="p-3 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                    <span id="cdMinutes" class="block font-serif text-2xl font-bold text-nursery-mint">00</span>
                    <span class="text-[9px] font-quick uppercase text-slate-400 font-bold">Menit</span>
                </div>
                <div class="p-3 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                    <span id="cdSeconds" class="block font-serif text-2xl font-bold text-nursery-gold">00</span>
                    <span class="text-[9px] font-quick uppercase text-slate-400 font-bold">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Tasyakuran Aqiqah') . ' - ' . $babyName);
                $calDetails = urlencode('Menghadiri tasyakuran aqiqah & doa bersama buah hati tercinta.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white hover:bg-nursery-softmint text-nursery-mint text-xs font-quick font-bold border border-nursery-mint shadow-sm transition">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-10 px-6">
            <div class="text-center mb-6">
                <span class="text-xs font-quick font-bold uppercase tracking-wider text-nursery-mint block">SUSUNAN ACARA</span>
                <h2 class="font-serif text-2xl font-bold text-nursery-ink">Rangkaian Acara Aqiqah 🌙</h2>
            </div>

            <div class="space-y-3.5 max-w-sm mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @php
                        $icons = ['📖', '✂️', '🍲', '🌙', '🕌', '🎉'];
                    @endphp
                    @foreach($couple->events as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $eventDateFormatted;
                            $evTimeFormatted = !empty($ev->start_time) ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '') : '09:00 WIB';
                            $evVenue = $ev->venue_name ?? ($couple->venue_name ?? 'Kediaman Keluarga');
                            $evAddress = $ev->address ?? ($couple->venue_address ?? '');
                            $evMap = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                            $icon = $icons[$idx % count($icons)];
                        @endphp
                        <div class="p-4 rounded-2xl bg-white border border-nursery-border shadow-sm flex items-start gap-3.5 text-left">
                            <div class="w-11 h-11 rounded-2xl bg-nursery-softmint flex items-center justify-center text-xl shrink-0 mt-0.5">
                                {{ $icon }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-0.5">
                                    <span class="text-[10px] font-quick font-bold text-nursery-mint block">{{ $evTimeFormatted }}</span>
                                    <span class="text-[9px] font-quick text-slate-400 font-medium">{{ $evDateFormatted }}</span>
                                </div>
                                <h3 class="font-serif text-sm font-bold text-nursery-ink">{{ $ev->title ?? 'Rangkaian Acara ' . ($idx + 1) }}</h3>
                                <p class="text-xs text-nursery-ink/80 font-medium mt-0.5">{{ $evVenue }}</p>
                                @if(!empty($evAddress))
                                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $evAddress }}</p>
                                @endif
                                @if(!empty($evMap))
                                    <a href="{{ $evMap }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-[11px] font-quick font-bold text-nursery-mint hover:underline mt-2">
                                        <span>📍</span> Petunjuk Google Maps &rarr;
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 rounded-2xl bg-white border border-nursery-border shadow-sm flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-nursery-softmint flex items-center justify-center text-xl shrink-0">
                            📖
                        </div>
                        <div>
                            <span class="text-[10px] font-quick font-bold text-nursery-mint block">09:00 - 10:00 WIB</span>
                            <h3 class="font-serif text-sm font-bold text-nursery-ink">Pembacaan Maulid &amp; Doa Selamat</h3>
                            <p class="text-xs text-slate-500">Lantunan shalawat, pembacaan Maulid Diba', dan doa keberkahan si kecil.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white border border-nursery-mint/50 shadow-sm flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-nursery-goldlight flex items-center justify-center text-xl shrink-0">
                            ✂️
                        </div>
                        <div>
                            <span class="text-[10px] font-quick font-bold text-nursery-gold block">10:00 - 10:30 WIB</span>
                            <h3 class="font-serif text-sm font-bold text-nursery-ink">Prosesi Tasmiyah &amp; Cukur Rambut</h3>
                            <p class="text-xs text-slate-500">Pemberian nama resmi, potong rambut bayi, dan penimbangan sedekah perak/emas.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white border border-nursery-border shadow-sm flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-nursery-softmint flex items-center justify-center text-xl shrink-0">
                            🍲
                        </div>
                        <div>
                            <span class="text-[10px] font-quick font-bold text-nursery-mint block">10:30 WIB - Selesai</span>
                            <h3 class="font-serif text-sm font-bold text-nursery-ink">Ramah Tamah &amp; Santap Hidangan</h3>
                            <p class="text-xs text-slate-500">Menikmati jamuan olahan kambing aqiqah dan ramah tamah bersama keluarga besar.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Venue Details & Maps Button -->
            @php
                $mainVenue = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Kediaman Keluarga Besar');
                $mainAddress = $couple->venue_address ?? ($firstEvent->address ?? 'Jl. Cempaka Putih Timur No. 18, Jakarta Pusat');
                $mapLink = !empty($couple->maps_url) ? $couple->maps_url : (!empty($firstEvent->maps_url) ? $firstEvent->maps_url : ('https://maps.google.com/?q=' . urlencode($mainVenue . ' ' . $mainAddress)));
            @endphp
            <div class="max-w-sm mx-auto mt-6 p-5 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                <span class="text-[10px] font-quick uppercase text-nursery-gold font-bold block mb-1">LOKASI KEDIAMAN KAMI</span>
                <h3 class="font-serif text-base font-bold text-nursery-ink">{{ $mainVenue }}</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $mainAddress }}</p>
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-nursery-mint hover:bg-[#5B8071] text-white font-quick text-xs font-bold shadow transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Baby Photo Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800'],
                ];
            }
        @endphp
        <section class="py-10 px-6 text-center">
            <span class="text-xs font-quick font-bold uppercase tracking-wider text-nursery-mint block mb-1">NEWBORN ALBUM</span>
            <h2 class="font-serif text-2xl font-bold text-nursery-ink mb-6">Galeri Momen Buah Hati 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? '', 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800');
                    @endphp
                    <div class="rounded-2xl overflow-hidden border border-nursery-border bg-white shadow-sm p-1.5">
                        <div class="w-full h-36 rounded-xl overflow-hidden bg-nursery-canvas">
                            <img src="{{ $imgSrc }}" alt="Baby Memory {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tali Asih Si Kecil (Digital Gift) -->
        @php
            $hasBank1 = !empty($couple->bank_account_1) || !empty($couple->account_number);
            $hasBank2 = !empty($couple->bank_account_2);
            $hasGift = !empty($couple->gift_address);
        @endphp
        @if($hasBank1 || $hasBank2 || $hasGift)
        <section class="py-10 px-6 text-center">
            <span class="text-xs font-quick font-bold uppercase tracking-wider text-nursery-gold block mb-1">TALI ASIH &amp; HADIAH</span>
            <h2 class="font-serif text-2xl font-bold text-nursery-ink mb-3">Tali Asih Buah Hati</h2>
            <p class="text-xs text-slate-500 max-w-xs mx-auto mb-6 leading-relaxed">
                Untaian doa restu adalah karunia terbaik. Namun jika Bapak/Ibu bermaksud memberikan hadiah tanda kasih untuk tabungan si kecil:
            </p>

            <div class="space-y-4 max-w-xs mx-auto">
                @if($hasBank1)
                    @php
                        $bName1 = $couple->bank_name_1 ?? ($couple->bank_name ?? 'BSI (BANK SYARIAH INDONESIA)');
                        $bAcc1 = $couple->bank_account_1 ?? ($couple->account_number ?? '7192837465');
                        $bHolder1 = $couple->bank_holder_1 ?? ($couple->account_name ?? ($couple->groom_parents ?? $babyName));
                    @endphp
                    <div class="p-5 rounded-3xl bg-white border-2 border-nursery-mint/30 shadow-md text-center">
                        <div class="inline-block px-3 py-1 rounded-full bg-nursery-softmint text-nursery-mint text-xs font-quick font-bold uppercase mb-2">
                            {{ $bName1 }}
                        </div>
                        <p class="font-mono text-lg font-bold text-nursery-ink my-1">
                            {{ $bAcc1 }}
                        </p>
                        <p class="text-xs text-slate-500 mb-4">a.n {{ $bHolder1 }}</p>

                        <button type="button" onclick="copyToClipboard('{{ $bAcc1 }}', 'Nomor rekening {{ $bName1 }} disalin')" class="w-full py-2.5 rounded-xl bg-nursery-mint hover:bg-[#5B8071] text-white font-quick text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-1.5 shadow-sm cursor-pointer">
                            <span>📋</span> Salin Nomor Rekening
                        </button>
                    </div>
                @endif

                @if($hasBank2)
                    @php
                        $bName2 = $couple->bank_name_2 ?? 'BANK';
                        $bAcc2 = $couple->bank_account_2 ?? '';
                        $bHolder2 = $couple->bank_holder_2 ?? ($couple->groom_parents ?? $babyName);
                    @endphp
                    <div class="p-5 rounded-3xl bg-white border-2 border-nursery-mint/30 shadow-md text-center">
                        <div class="inline-block px-3 py-1 rounded-full bg-nursery-softmint text-nursery-mint text-xs font-quick font-bold uppercase mb-2">
                            {{ $bName2 }}
                        </div>
                        <p class="font-mono text-lg font-bold text-nursery-ink my-1">
                            {{ $bAcc2 }}
                        </p>
                        <p class="text-xs text-slate-500 mb-4">a.n {{ $bHolder2 }}</p>

                        <button type="button" onclick="copyToClipboard('{{ $bAcc2 }}', 'Nomor rekening {{ $bName2 }} disalin')" class="w-full py-2.5 rounded-xl bg-nursery-mint hover:bg-[#5B8071] text-white font-quick text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-1.5 shadow-sm cursor-pointer">
                            <span>📋</span> Salin Nomor Rekening
                        </button>
                    </div>
                @endif
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-2xl bg-white border border-nursery-border text-center shadow-sm">
                    <span class="text-[10px] font-quick text-nursery-gold uppercase font-bold block mb-1">KIRIM BINGKISAN / PERLENGKAPAN BAYI</span>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat pengiriman bingkisan disalin')" class="mt-2 text-xs text-nursery-mint font-quick font-bold hover:underline cursor-pointer">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>
        @endif

        <!-- Buku Tamu & RSVP Aqiqah -->
        <section class="py-10 px-6">
            <div class="text-center mb-6">
                <span class="text-xs font-quick font-bold uppercase tracking-wider text-nursery-mint block">DOA &amp; KEHADIRAN</span>
                <h2 class="font-serif text-2xl font-bold text-nursery-ink">Konfirmasi &amp; Doa Restu 🌙</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-white p-6 rounded-3xl border border-nursery-border shadow-md mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-3.5">
                        <label class="block text-xs font-quick font-bold text-nursery-ink mb-1">Nama Bapak / Ibu / Keluarga</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-nursery-canvas border border-nursery-border text-xs text-nursery-ink focus:outline-none focus:border-nursery-mint">
                    </div>

                    <div class="mb-3.5">
                        <label class="block text-xs font-quick font-bold text-nursery-ink mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-nursery-canvas border border-nursery-border text-xs font-quick text-nursery-ink focus:outline-none focus:border-nursery-mint">
                            <option value="Hadir">InsyaAllah Hadir</option>
                            <option value="Tidak Hadir">Mohon Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">Masih Disesuaikan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-quick font-bold text-nursery-ink mb-1">Untaian Doa Untuk Buah Hati</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan doa kebaikan untuk si kecil..." class="w-full px-4 py-2.5 rounded-xl bg-nursery-canvas border border-nursery-border text-xs text-nursery-ink focus:outline-none focus:border-nursery-mint"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-2xl bg-nursery-mint hover:bg-[#5B8071] text-white font-quick text-xs font-bold uppercase tracking-wider shadow-md transition">
                        Kirim Doa Keberkahan 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Stream -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-serif text-sm text-nursery-ink font-bold mb-2 flex items-center justify-between">
                    <span>Doa Dari Keluarga &amp; Sahabat</span>
                    <span class="text-xs text-nursery-mint font-quick">{{ isset($wishes) ? count($wishes) : 0 }} Doa</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Keluarga';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-2xl bg-white border border-nursery-border text-left shadow-sm">
                                <div class="flex items-center justify-between mb-1">
                                    <b class="text-xs text-nursery-mint font-serif">{{ $wName }}</b>
                                    <span class="text-[9px] font-quick px-2 py-0.5 rounded-full bg-nursery-softmint text-nursery-mint font-bold">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-2xl bg-white border border-nursery-border text-center text-xs text-slate-400 italic font-serif">
                            Belum ada doa tertulis. Jadilah yang pertama memberikan doa keberkahan!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-10 px-6 text-center bg-white border-t border-nursery-border">
            <p class="font-serif text-lg font-bold text-nursery-mint mb-1">{{ $babyName }}</p>
            <p class="text-xs text-slate-500 font-medium">Jazakumullahu Khairan Katsiran atas segenap doa &amp; silaturahmi.</p>
            <div class="mt-6 pt-4 border-t border-slate-100 text-[9px] text-slate-400 font-quick">
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
                    audioIcon.textContent = '🌙';
                }).catch(e => console.log('Audio autoplay:', e));
            }
        }

        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => cover.classList.add('hidden'), 700);
            }
            if (audioBtn) audioBtn.classList.remove('hidden');
            toggleAudio();
        }

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
                showToast('Alhamdulillah, doa restu berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Keluarga';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-2xl bg-white border border-nursery-border text-left shadow-sm';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1">
                            <b class="text-xs text-nursery-mint font-serif">${name}</b>
                            <span class="text-[9px] font-quick px-2 py-0.5 rounded-full bg-nursery-softmint text-nursery-mint font-bold">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas doa keberkahannya!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for live preview reset
        const defaultBabyPhoto = "{{ $babyImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultBabyParents = @json($babyParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIdx) => {
                const div = document.createElement('div');
                div.className = 'rounded-2xl overflow-hidden border border-nursery-border bg-white shadow-sm p-1.5';
                div.innerHTML = `
                    <div class="w-full h-36 rounded-xl overflow-hidden bg-nursery-canvas">
                        <img src="${imgUrl}" alt="Baby Memory ${gIdx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if ((event.data.target === 'groom' || event.data.target === 'baby') && event.data.dataUrl) {
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = event.data.dataUrl;
                    const el2 = document.getElementById('previewBabyPhotoCoverImg');
                    if (el2) el2.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' || event.data.target === 'baby') {
                    const url = event.data.defaultUrl || defaultBabyPhoto;
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = url;
                    const el2 = document.getElementById('previewBabyPhotoCoverImg');
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
                        pEl.textContent = defaultBabyParents;
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
