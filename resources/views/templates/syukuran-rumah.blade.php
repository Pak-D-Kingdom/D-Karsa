<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Tasyakuran Rumah Baru') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Tasyakuran & Doa Bersama Menempati Kediaman Baru {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Tasyakuran Rumah Baru') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Bismillah, dengan penuh rasa syukur atas karunia hunian baru, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam tasyakuran kediaman kami {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=1200' }}">

    <!-- Google Fonts: Warm Editorial & Modern Arabic Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        home: {
                            terracotta: '#C86D51',
                            clay: '#B3583C',
                            wood: '#4A3B32',
                            canvas: '#FAF8F5',
                            card: '#FFFFFF',
                            olive: '#606C38',
                            lightolive: '#EDF1E4',
                            warmborder: '#E8DFD3',
                            ink: '#2B231F',
                        }
                    },
                    fontFamily: {
                        amiri: ['Amiri', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Subtle linen texture */
        .linen-bg {
            background-color: #FAF8F5;
            background-image: radial-gradient(rgba(200, 109, 81, 0.06) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Earthy Card */
        .home-card {
            background: #FFFFFF;
            border: 1px solid #E8DFD3;
            border-radius: 24px;
            box-shadow: 0 8px 25px -4px rgba(74, 59, 50, 0.06);
        }

        /* Floating key animation */
        @keyframes floatKey {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(-5deg); }
        }
        .animate-key {
            animation: floatKey 4s ease-in-out infinite;
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
    </style>
</head>
<body class="linen-bg text-home-ink font-sans antialiased selection:bg-home-terracotta selection:text-white">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=1200'
        );
        $houseImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:30 WIB';

        $hostName = $couple->groom_name ?? 'Keluarga Bpk. Hendra & Ibu Maya';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border border-home-warmborder shadow-md flex items-center justify-center text-home-terracotta hover:scale-105 transition" title="Musik Pengiring">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🏡</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-home-wood text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-home-terracotta">🗝️</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         WARM TERRACOTTA HOUSE BLESSING COVER SCREEN
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain flex flex-col items-center justify-center bg-[#2B231F] p-3 sm:p-4 transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm bg-[#FAF8F5] text-home-ink rounded-3xl p-5 sm:p-7 text-center shadow-2xl border-2 border-home-terracotta/40 overflow-hidden my-auto">
            
            <!-- House Key Emblem -->
            <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-home-terracotta/15 flex items-center justify-center text-3xl animate-key">
                🗝️
            </div>

            <!-- Arabic Bismillah Calligraphy -->
            <p class="font-amiri text-lg text-home-terracotta font-bold mb-1">بَيْتِي جَنَّتِي • بِّسْمِ ٱللَّهِ</p>
            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] font-sans font-bold uppercase tracking-wider bg-home-terracotta/10 text-home-terracotta border border-home-terracotta/30 mb-3">
                {{ $couple->event_heading ?? "TASYAKURAN RUMAH BARU" }}
            </span>

            <!-- House Image Frame -->
            <div class="relative w-full h-44 mx-auto rounded-2xl overflow-hidden border border-home-warmborder shadow-lg my-3 bg-white">
                <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Rumah Baru" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                <span class="absolute bottom-2.5 left-3 text-[10px] text-white/90 font-medium tracking-wider">
                    🏡 Kediaman Baru Penuh Berkah
                </span>
            </div>

            <!-- Host's Name -->
            <div class="my-3">
                <h1 class="font-serif text-2xl font-bold text-home-ink leading-tight">
                    {{ $hostName }}
                </h1>
                <p class="text-xs text-home-olive font-sans font-semibold mt-1">
                    Doa Syukuran &amp; Potong Tumpeng
                </p>
                <p class="text-xs text-slate-500 font-medium mt-1">
                    📅 {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Guest Invitation Card -->
            <div class="my-4 p-3 rounded-2xl bg-white border border-home-warmborder text-center shadow-sm">
                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block">UNDANGAN KEPADA YTH:</span>
                <b class="text-sm font-serif text-home-ink block mt-0.5">{{ $guest->name ?? 'Bapak / Ibu / Tetangga & Kerabat' }}</b>
            </div>

            <!-- Buka Pintu Action -->
            <button type="button" onclick="openInvitation()" class="w-full py-3.5 rounded-2xl bg-home-terracotta hover:bg-home-clay text-white font-sans text-xs font-bold uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-2 relative z-20 pointer-events-auto cursor-pointer">
                <span>🗝️</span> BUKA PINTU KEDIAMAN KAMI
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (Cozy Earthy Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-home-canvas text-home-ink shadow-2xl relative border-x border-home-warmborder">

        <!-- Top Header Hero -->
        <header class="pt-16 pb-12 px-6 text-center bg-white border-b border-home-warmborder relative">
            <span class="text-2xl text-home-terracotta block mb-2">🌿 ── 🏡 ── 🌿</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] font-sans font-bold uppercase tracking-wider bg-home-lightolive text-home-olive mb-2">
                {{ $couple->event_heading ?? "TASYAKURAN MENEMPATI KEDIAMAN BARU" }}
            </span>
            <div class="relative w-28 h-28 mx-auto my-3 rounded-2xl overflow-hidden border-2 border-home-terracotta/40 shadow-md bg-home-canvas">
                <img id="previewGroomPhotoImg" src="{{ $houseImg }}" alt="{{ $hostName }}" class="w-full h-full object-cover">
            </div>
            <h1 class="font-serif text-3xl font-bold text-home-ink my-1">
                {{ $hostName }}
            </h1>
            <p class="text-xs font-bold text-home-terracotta tracking-wider uppercase">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs text-slate-500 mt-2">
                📍 {{ $couple->venue_name ?? 'Kediaman Baru Kami' }}
            </p>
            @php
                $srParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
            @endphp
            <p id="previewParentsContainer" class="text-xs text-home-terracotta mt-1.5 font-sans font-medium {{ empty($srParents) ? 'hidden' : '' }}">
                Tuan Rumah: <b id="previewParentsNames" class="text-home-ink">{{ $srParents }}</b>
            </p>
        </header>

        <!-- Doa Masuk Rumah & Blessing Section -->
        <section class="py-12 px-6 border-b border-home-warmborder text-center">
            <div class="home-card p-6 text-center">
                <p class="font-amiri text-lg text-home-terracotta font-bold mb-2">
                    اللَّهُمَّ إِنِّي أَسْأَلُكَ خَيْرَ الْمَوْلَجِ وَخَيْرَ الْمَخْرَجِ
                </p>
                <p class="font-serif text-xs text-slate-600 italic leading-relaxed">
                    "Ya Allah, sesungguhnya aku memohon kepada-Mu kebaikan tempat masuk dan kebaikan tempat keluar. Dengan nama Allah kami masuk dan dengan nama Allah kami keluar, dan kepada Allah Tuhan kami, kami bertawakal."
                </p>
                <span class="inline-block mt-3 text-[10px] font-sans text-home-olive uppercase font-bold tracking-wider">
                    (HR. Abu Daud No. 5096)
                </span>

                <div class="my-4 w-12 h-px bg-home-terracotta/40 mx-auto"></div>

                <p class="text-xs text-slate-600 italic leading-relaxed">
                    "{{ $couple->quote ?? 'Semoga rumah ini senantiasa dilimpahi keberkahan, ketenteraman, kedamaian, dan menjadi tempat terbaik untuk beribadah serta mendidik keluarga tercinta.' }}"
                </p>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-10 px-6 bg-white border-b border-home-warmborder text-center">
            <h3 class="font-serif text-xl font-bold text-home-ink mb-4">Menghitung Hari Tasyakuran</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-2xl bg-home-canvas border border-home-warmborder text-center shadow-sm">
                    <span id="cdDays" class="block font-serif text-2xl font-bold text-home-terracotta">00</span>
                    <span class="text-[9px] font-sans uppercase text-slate-400 font-bold">Hari</span>
                </div>
                <div class="p-3 rounded-2xl bg-home-canvas border border-home-warmborder text-center shadow-sm">
                    <span id="cdHours" class="block font-serif text-2xl font-bold text-home-terracotta">00</span>
                    <span class="text-[9px] font-sans uppercase text-slate-400 font-bold">Jam</span>
                </div>
                <div class="p-3 rounded-2xl bg-home-canvas border border-home-warmborder text-center shadow-sm">
                    <span id="cdMinutes" class="block font-serif text-2xl font-bold text-home-terracotta">00</span>
                    <span class="text-[9px] font-sans uppercase text-slate-400 font-bold">Menit</span>
                </div>
                <div class="p-3 rounded-2xl bg-home-canvas border border-home-warmborder text-center shadow-sm">
                    <span id="cdSeconds" class="block font-serif text-2xl font-bold text-home-olive">00</span>
                    <span class="text-[9px] font-sans uppercase text-slate-400 font-bold">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Tasyakuran Rumah Baru') . ' - ' . $hostName);
                $calDetails = urlencode('Menghadiri tasyakuran menempati rumah baru & doa bersama potong tumpeng.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white hover:bg-home-canvas text-home-terracotta text-xs font-sans font-bold border border-home-terracotta/40 shadow-sm transition">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-12 px-6 border-b border-home-warmborder">
            <div class="text-center mb-8">
                <span class="text-xs font-sans font-bold uppercase tracking-wider text-home-terracotta block">RUNDOWN ACARA</span>
                <h2 class="font-serif text-2xl font-bold text-home-ink">Susunan Acara Tasyakuran 🏡</h2>
            </div>

            <div class="space-y-3.5 max-w-sm mx-auto">
                <div class="p-4 rounded-2xl bg-white border border-home-warmborder shadow-sm flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-home-terracotta/15 flex items-center justify-center text-xl shrink-0">
                        📖
                    </div>
                    <div>
                        <span class="text-[10px] font-sans font-bold text-home-terracotta block">09:30 - 10:30 WIB</span>
                        <h3 class="font-serif text-sm font-bold text-home-ink">Khatam Qur'an &amp; Pembacaan Surah Al-Baqarah</h3>
                        <p class="text-xs text-slate-500">Lantunan ayat suci Al-Qur'an dan doa perlindungan untuk tempat tinggal baru.</p>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-white border border-home-terracotta/40 shadow-sm flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-home-lightolive flex items-center justify-center text-xl shrink-0">
                        🍚
                    </div>
                    <div>
                        <span class="text-[10px] font-sans font-bold text-home-olive block">10:30 - 11:15 WIB</span>
                        <h3 class="font-serif text-sm font-bold text-home-ink">Tausiyah Singkat &amp; Potong Tumpeng</h3>
                        <p class="text-xs text-slate-500">Tausiyah keberkahan keluarga sakinah dan prosesi potong tumpeng slametan.</p>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-white border border-home-warmborder shadow-sm flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-home-canvas flex items-center justify-center text-xl shrink-0">
                        🍲
                    </div>
                    <div>
                        <span class="text-[10px] font-sans font-bold text-slate-600 block">11:15 WIB - Selesai</span>
                        <h3 class="font-serif text-sm font-bold text-home-ink">Santap Siang Prasmanan &amp; Ramah Tamah</h3>
                        <p class="text-xs text-slate-500">Menikmati jamuan makan bersama tetangga, kerabat, dan sahabat dekat.</p>
                    </div>
                </div>
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-6 p-5 rounded-2xl bg-white border border-home-warmborder text-center shadow-sm">
                <span class="text-[10px] font-sans uppercase text-home-terracotta font-bold block mb-1">ALAMAT KEDIAMAN BARU</span>
                <h3 class="font-serif text-base font-bold text-home-ink">{{ $couple->venue_name ?? 'Kediaman Baru Kami' }}</h3>
                <p class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Cluster Harmony Hills Blok B-12, Jagakarsa, Jakarta Selatan' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-home-terracotta hover:bg-home-clay text-white font-sans text-xs font-bold shadow transition">
                        <span>📍</span> Buka Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- New Home Photo Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800'],
                ];
            }
        @endphp
        <section class="py-12 px-6 border-b border-home-warmborder text-center">
            <span class="text-xs font-sans font-bold uppercase tracking-wider text-home-olive block mb-1">SUDUT HUNIAN</span>
            <h2 class="font-serif text-2xl font-bold text-home-ink mb-6">Galeri Sudut Hangat Rumah 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl(
                            is_object($gal) ? ($gal->image ?? null) : ($gal ?? null),
                            'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800'
                        );
                    @endphp
                    <div class="rounded-2xl overflow-hidden border border-home-warmborder bg-white shadow-sm p-1.5">
                        <div class="w-full h-36 rounded-xl overflow-hidden bg-home-canvas">
                            <img src="{{ $imgSrc }}" alt="Home Corner {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tali Asih Rumah Baru (Digital Gift) -->
        <section class="py-12 px-6 border-b border-home-warmborder text-center">
            <span class="text-xs font-sans font-bold uppercase tracking-wider text-home-terracotta block mb-1">TALI ASIH &amp; KADO RUMAH</span>
            <h2 class="font-serif text-2xl font-bold text-home-ink mb-3">Tanda Kasih Kediaman Baru</h2>
            <p class="text-xs text-slate-600 max-w-xs mx-auto mb-6 leading-relaxed">
                Doa restu dan langkah kaki Anda ke rumah kami adalah hadiah terindah. Namun jika bermaksud memberikan tanda kasih:
            </p>

            <div class="max-w-xs mx-auto p-5 rounded-3xl bg-white border border-home-warmborder shadow-md text-center">
                <div class="inline-block px-3 py-1 rounded-full bg-home-canvas text-home-terracotta text-xs font-sans font-bold uppercase mb-2">
                    {{ $couple->bank_name ?? 'BCA' }}
                </div>
                <p class="font-mono text-lg font-bold text-home-ink my-1">
                    {{ $couple->account_number ?? '6801239874' }}
                </p>
                <p class="text-xs text-slate-500 mb-4">a.n {{ $couple->account_name ?? $hostName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '6801239874' }}', 'Nomor rekening tanda kasih disalin')" class="w-full py-2.5 rounded-xl bg-home-terracotta hover:bg-home-clay text-white font-sans text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-1.5 shadow-sm">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-2xl bg-white border border-home-warmborder text-center">
                    <span class="text-[10px] font-sans text-home-olive uppercase font-bold block mb-1">KIRIM KADO PERLENGKAPAN RUMAH</span>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat pengiriman kado disalin')" class="mt-2 text-xs text-home-terracotta font-sans font-bold hover:underline">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- Buku Tamu & RSVP Syukuran Rumah -->
        <section class="py-12 px-6 border-b border-home-warmborder">
            <div class="text-center mb-6">
                <span class="text-xs font-sans font-bold uppercase tracking-wider text-home-olive block">GUESTBOOK</span>
                <h2 class="font-serif text-2xl font-bold text-home-ink">Konfirmasi &amp; Doa Keberkahan 🏡</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-white p-6 rounded-3xl border border-home-warmborder shadow-md mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-3.5">
                        <label class="block text-xs font-sans font-bold text-home-ink mb-1">Nama Bapak / Ibu / Keluarga</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-home-canvas border border-home-warmborder text-xs text-home-ink focus:outline-none focus:border-home-terracotta">
                    </div>

                    <div class="mb-3.5">
                        <label class="block text-xs font-sans font-bold text-home-ink mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-home-canvas border border-home-warmborder text-xs text-home-ink focus:outline-none focus:border-home-terracotta">
                            <option value="Hadir">InsyaAllah Hadir</option>
                            <option value="Tidak Hadir">Mohon Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">Masih Disesuaikan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-sans font-bold text-home-ink mb-1">Untaian Doa Untuk Rumah Baru</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan doa keberkahan untuk kediaman baru..." class="w-full px-4 py-2.5 rounded-xl bg-home-canvas border border-home-warmborder text-xs text-home-ink focus:outline-none focus:border-home-terracotta"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-2xl bg-home-terracotta hover:bg-home-clay text-white font-sans text-xs font-bold uppercase tracking-wider shadow-md transition">
                        Kirim Doa Keberkahan 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Stream -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-serif text-sm text-home-ink font-bold mb-2 flex items-center justify-between">
                    <span>Doa Dari Tetangga &amp; Kerabat</span>
                    <span class="text-xs text-home-terracotta font-sans">{{ isset($wishes) ? count($wishes) : 0 }} Doa</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Keluarga';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-2xl bg-white border border-home-warmborder text-left shadow-sm">
                                <div class="flex items-center justify-between mb-1">
                                    <b class="text-xs text-home-terracotta font-serif">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded-full bg-home-canvas text-home-olive font-bold">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-2xl bg-white border border-home-warmborder text-center text-xs text-slate-400 italic font-serif">
                            Belum ada doa tertulis. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-10 px-6 text-center bg-white border-t border-home-warmborder">
            <p class="font-serif text-lg font-bold text-home-terracotta mb-1">{{ $hostName }}</p>
            <p class="text-xs text-slate-500 font-medium">Baitii Jannatii • Terima kasih atas doa &amp; silaturahmi Anda.</p>
            <div class="mt-6 pt-4 border-t border-slate-100 text-[9px] text-slate-400 font-sans">
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
                    audioIcon.textContent = '🏡';
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
                showToast('Doa keberkahan berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Keluarga';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-2xl bg-white border border-home-warmborder text-left shadow-sm';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1">
                            <b class="text-xs text-home-terracotta font-serif">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded-full bg-home-canvas text-home-olive font-bold">${attend}</span>
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

        // Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid) return;
            if (!images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url, idx) => {
                const item = document.createElement('div');
                item.className = 'rounded-2xl overflow-hidden border border-home-warmborder bg-white shadow-sm p-1.5';
                item.innerHTML = `
                    <div class="w-full h-36 rounded-xl overflow-hidden bg-home-canvas">
                        <img src="${url}" alt="Home Corner ${idx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultHouseImg = "{{ $houseImg }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if (target === 'groom' || target === 'house' || target === 'person') {
                    const houseEl = document.getElementById('previewGroomPhotoImg');
                    if (houseEl) houseEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'house' || target === 'person') {
                    const houseEl = document.getElementById('previewGroomPhotoImg');
                    if (houseEl) houseEl.src = defaultHouseImg;
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
