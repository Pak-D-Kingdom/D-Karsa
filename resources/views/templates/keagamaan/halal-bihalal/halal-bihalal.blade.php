<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Silaturahmi & Halal Bihalal') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Halal Bihalal & Silaturahmi Idul Fitri {{ $couple->groom_name }} - Merajut Ukhuwah & Saling Bermaafan.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Silaturahmi & Halal Bihalal') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Taqabbalallahu Minna Wa Minkum. Kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam silaturahmi halal bihalal keluarga {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200' }}">

    <!-- Google Fonts: Islamic Calligraphy & Elegant Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cinzel:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        raya: {
                            emerald: '#0D5C3A',
                            deep: '#073320',
                            card: '#136F47',
                            sage: '#2E7D32',
                            lightgreen: '#E8F5E9',
                            gold: '#D4AF37',
                            goldbright: '#FDF0CD',
                            sand: '#FAF8F2',
                            ink: '#0C2E1D',
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

        /* Ketupat Weave Background Pattern */
        .ketupat-pattern {
            background-color: #073320;
            background-image: radial-gradient(#D4AF37 0.75px, transparent 0.75px), radial-gradient(#2E7D32 0.75px, #073320 0.75px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
        }

        /* Lantern Gentle Sway */
        @keyframes swayLantern {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        .animate-lantern {
            transform-origin: top center;
            animation: swayLantern 4s ease-in-out infinite;
        }

        /* Gold Foil Shimmer */
        .gold-shimmer {
            background: linear-gradient(135deg, #FDF0CD 0%, #D4AF37 50%, #9E8024 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
<body class="ketupat-pattern text-slate-200 font-sans antialiased selection:bg-raya-gold selection:text-raya-deep">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200'
        );
        $hostImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '10:00 WIB';

        $hostName = $couple->groom_name ?? 'Keluarga Besar Bani H. Abdullah';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-raya-card border border-raya-gold/40 shadow-xl flex items-center justify-center text-raya-gold hover:scale-105 transition" title="Musik Takbiran / Gendang Raya">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 5s;">🕌</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-raya-card border border-raya-gold text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-raya-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         KETUPAT RAYA SILATURAHMI COVER SCREEN
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm bg-raya-emerald rounded-3xl p-7 text-center shadow-2xl border-2 border-raya-gold/50 overflow-hidden">
            
            <!-- Hanging Lanterns Icon -->
            <div class="flex justify-center gap-4 text-3xl mb-3 animate-lantern">
                <span>🏮</span>
                <span>✨</span>
                <span>🏮</span>
            </div>

            <!-- Arabic Eid Calligraphy -->
            <p class="font-amiri text-lg text-raya-goldbright font-bold mb-1">تَقَبَّلَ اللَّهُ مِنَّا وَمِنْكُمْ</p>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-cinzel font-bold uppercase tracking-[0.25em] bg-raya-gold/15 text-raya-gold border border-raya-gold/40 mb-3">
                {{ $couple->event_heading ?? "SILATURAHMI & HALAL BIHALAL" }}
            </span>

            <!-- Family / Host Photo Frame -->
            <div class="relative w-48 h-48 mx-auto rounded-2xl overflow-hidden border-2 border-raya-gold shadow-2xl my-3 bg-raya-deep">
                <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Halal Bihalal" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-raya-deep/80 via-transparent to-transparent"></div>
            </div>

            <!-- Host's Name & Greetings -->
            <div class="my-3">
                <p class="text-[10px] font-cinzel tracking-[0.25em] uppercase text-slate-300">MINAL AIDIN WAL FAIZIN</p>
                <h1 class="font-serif text-2xl font-bold gold-shimmer tracking-wide mt-1">
                    {{ $hostName }}
                </h1>
                <p class="text-xs text-raya-goldbright font-sans font-medium mt-1">
                    📅 {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Guest Card -->
            <div class="my-4 p-3 rounded-2xl bg-raya-card/80 border border-raya-gold/30 text-center">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-slate-300 block">KEPADA YTH:</span>
                <b class="text-sm font-sans font-bold text-white block mt-0.5">{{ $guest->name ?? 'Bapak / Ibu / Keluarga' }}</b>
            </div>

            <!-- Open Invitation Action -->
            <button type="button" onclick="openInvitation()" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-raya-gold to-[#A07C1C] hover:brightness-110 text-raya-deep font-cinzel text-xs font-bold uppercase tracking-[0.25em] shadow-lg transition flex items-center justify-center gap-2">
                <span>🕌</span> BUKA GERBANG SILATURAHMI
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Festive Eid Raya Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-raya-emerald text-slate-200 shadow-2xl relative border-x border-raya-gold/30">

        <!-- Top Header Hero -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-raya-card to-raya-emerald border-b border-raya-gold/25 relative">
            <span class="text-2xl text-raya-gold block mb-2">🕌 ─── ❖ ─── 🕌</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-cinzel uppercase tracking-[0.25em] bg-raya-gold/15 text-raya-gold border border-raya-gold/30 mb-2 font-semibold">
                {{ $couple->event_heading ?? "SILATURAHMI & HALAL BIHALAL" }}
            </span>
            <div class="relative w-28 h-28 mx-auto my-3 rounded-full overflow-hidden border-2 border-raya-gold shadow-lg bg-raya-deep">
                <img id="previewGroomPhotoImg" src="{{ $hostImg }}" alt="{{ $hostName }}" class="w-full h-full object-cover">
            </div>
            <h1 class="font-serif text-3xl font-bold gold-shimmer tracking-wide my-2 leading-tight">
                {{ $hostName }}
            </h1>
            <p class="text-xs text-slate-300 font-sans tracking-wider">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs text-raya-gold mt-2">
                📍 {{ $couple->venue_name ?? 'Kediaman Keluarga Besar' }}
            </p>
            @php
                $hbParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
            @endphp
            <p id="previewParentsContainer" class="text-xs text-raya-goldbright/90 mt-1.5 font-sans {{ empty($hbParents) ? 'hidden' : '' }}">
                Sesepuh / Tuan Rumah: <b id="previewParentsNames" class="text-white">{{ $hbParents }}</b>
            </p>
        </header>

        <!-- Ayat Ukhuwah & Greeting Section -->
        <section class="py-12 px-6 border-b border-raya-gold/20 text-center">
            <div class="p-6 rounded-3xl bg-raya-card border border-raya-gold/30 shadow-md">
                <p class="font-amiri text-lg text-raya-goldbright font-bold mb-2">
                    إِنَّمَا الْمُؤْمِنُونَ إِخْوَةٌ فَأَصْلِحُوا بَيْنَ أَخَوَيْكُمْ
                </p>
                <p class="font-serif text-xs text-slate-200 italic leading-relaxed">
                    "Sesungguhnya orang-orang mukmin itu bersaudara, karena itu damaikanlah antara kedua saudaramu dan bertakwalah kepada Allah agar kamu mendapat rahmat."
                </p>
                <span class="inline-block mt-3 text-[10px] font-cinzel text-raya-gold uppercase font-bold tracking-wider">
                    (QS. Al-Hujurat: 10)
                </span>

                <div class="my-4 w-12 h-px bg-raya-gold/50 mx-auto"></div>

                <p class="text-xs text-slate-300 italic">
                    "{{ $couple->quote ?? 'Mari satukan hati, sucikan diri, dan kuatkan tali silaturahmi di hari kemenangan nan fitri. Mohon maaf lahir dan batin atas segala khilaf.' }}"
                </p>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-12 px-6 bg-raya-card/40 border-b border-raya-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-raya-gold block mb-1">COUNTDOWN TO SILATURAHMI</span>
            <h3 class="font-serif text-xl font-bold text-white mb-6">Menghitung Hari Bertemu Kembali</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-raya-deep border border-raya-gold/40 text-center shadow">
                    <span id="cdDays" class="block font-serif text-2xl font-bold text-raya-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-raya-deep border border-raya-gold/40 text-center shadow">
                    <span id="cdHours" class="block font-serif text-2xl font-bold text-raya-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-raya-deep border border-raya-gold/40 text-center shadow">
                    <span id="cdMinutes" class="block font-serif text-2xl font-bold text-raya-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-raya-deep border border-raya-gold/40 text-center shadow">
                    <span id="cdSeconds" class="block font-serif text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Halal Bihalal') . ' - ' . $hostName);
                $calDetails = urlencode('Menghadiri silaturahmi akbar & halal bihalal keluarga.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-raya-deep hover:bg-raya-card text-raya-gold text-[10px] font-cinzel tracking-widest uppercase transition border border-raya-gold/40">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-14 px-6 border-b border-raya-gold/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-raya-gold block">AGENDA SILATURAHMI</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Susunan Acara Halal Bihalal 🕌</h2>
            </div>

            <div class="space-y-4 max-w-sm mx-auto">
                <div class="p-5 rounded-2xl bg-raya-card border border-raya-gold/30">
                    <div class="flex items-center justify-between text-raya-gold text-xs font-cinzel mb-1">
                        <span>SESI I • PEMBUKAAN &amp; TAUSIYAH</span>
                        <span>10:00 - 11:00 WIB</span>
                    </div>
                    <h3 class="font-serif text-base font-bold text-white">Kalam Ilahi &amp; Tausiyah Ukhuwah</h3>
                    <p class="text-xs text-slate-300 mt-1">Pembacaan ayat suci Al-Qur'an, sambutan perwakilan keluarga, tausiyah hikmah silaturahmi &amp; doa bersama.</p>
                </div>

                <div class="p-5 rounded-2xl bg-raya-card border border-raya-gold/50 shadow-md">
                    <div class="flex items-center justify-between text-raya-gold text-xs font-cinzel mb-1">
                        <span>SESI II • RAMAH TAMAH</span>
                        <span>11:00 - 14:00 WIB</span>
                    </div>
                    <h3 class="font-serif text-base font-bold text-white">Saling Bermaafan &amp; Santap Jamuan Lebaran</h3>
                    <p class="text-xs text-slate-300 mt-1">Prosesi musafahah saling memaafkan, menikmati ketupat sayur, opor ayam, rendang, serta foto bersama.</p>
                </div>
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-raya-card border border-raya-gold/40 text-center">
                <span class="text-[9px] font-cinzel uppercase tracking-[0.2em] text-raya-gold block mb-1">LOKASI SILATURAHMI</span>
                <h3 class="font-serif text-lg font-bold text-white">{{ $couple->venue_name ?? 'Kediaman Keluarga Besar' }}</h3>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Jl. Gandaria Tengah No. 20, Kebayoran Baru, Jakarta Selatan' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-raya-gold to-[#A07C1C] text-raya-deep text-xs font-cinzel font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Moments of Silaturahmi Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1543807535-eceef0bc6599?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-raya-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-raya-gold block mb-1">MEMORI UKHUWAH</span>
            <h2 class="font-serif text-2xl font-bold text-white mb-6">Momen Hangat Kebersamaan 📸</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl(
                            is_object($gal) ? ($gal->image ?? null) : ($gal ?? null),
                            'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800'
                        );
                    @endphp
                    <div class="p-2 rounded-xl bg-raya-card border border-raya-gold/30 shadow">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-raya-deep">
                            <img src="{{ $imgSrc }}" alt="Silaturahmi Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Tanda Kasih / Amplop Lebaran (Digital Gift) -->
        <section class="py-14 px-6 border-b border-raya-gold/20 text-center">
            <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-raya-gold block mb-1">AMPLOP HARI RAYA</span>
            <h2 class="font-serif text-2xl font-bold text-white mb-3">Tanda Kasih &amp; Tali Asih</h2>
            <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6 leading-relaxed">
                Kehadiran dan jabat tangan erat adalah anugerah terbesar. Namun bagi kerabat yang ingin berbagi tanda kasih / THR secara digital:
            </p>

            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-raya-card border border-raya-gold/40 shadow-xl text-center">
                <div class="inline-block px-3 py-1 bg-raya-deep text-raya-gold text-[10px] font-cinzel font-bold tracking-widest uppercase mb-2 border border-raya-gold/30">
                    {{ $couple->bank_name ?? 'BANK SYARIAH INDONESIA (BSI)' }}
                </div>
                <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '7123456789' }}
                </p>
                <p class="text-xs text-slate-400 mb-4">a.n {{ $couple->account_name ?? $hostName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '7123456789' }}', 'Nomor rekening tanda kasih disalin')" class="w-full py-2.5 rounded-lg bg-raya-gold/20 hover:bg-raya-gold/30 text-raya-gold text-xs font-cinzel font-bold uppercase tracking-wider border border-raya-gold/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-4 p-4 rounded-xl bg-raya-card border border-raya-gold/20 text-center">
                    <span class="text-[9px] font-cinzel text-raya-gold uppercase font-bold block mb-1">KIRIM PARCEL / HAMPERS LEBARAN</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat pengiriman parcel disalin')" class="mt-2 text-[10px] text-raya-gold hover:underline font-cinzel uppercase">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & Ucapan Silaturahmi Section -->
        <section class="py-14 px-6 border-b border-raya-gold/20">
            <div class="text-center mb-8">
                <span class="text-[9px] font-cinzel tracking-[0.25em] uppercase text-raya-gold block">BUKU TAMU SILATURAHMI</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Konfirmasi &amp; Ucapan Idul Fitri 🕌</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-raya-card p-6 rounded-2xl border border-raya-gold/30 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Nama Keluarga / Tamu</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-raya-deep border border-raya-gold/30 text-xs text-white focus:outline-none focus:border-raya-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-raya-deep border border-raya-gold/30 text-xs text-white focus:outline-none focus:border-raya-gold">
                            <option value="Hadir">InsyaAllah Hadir</option>
                            <option value="Tidak Hadir">Mohon Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">Menyesuaikan Jadwal</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-cinzel uppercase tracking-wider text-slate-300 mb-1">Untaian Doa &amp; Ucapan Maaf Lahir Batin</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan selamat hari raya & silaturahmi..." class="w-full px-4 py-2.5 rounded-xl bg-raya-deep border border-raya-gold/30 text-xs text-white focus:outline-none focus:border-raya-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-raya-gold to-[#A07C1C] text-raya-deep font-cinzel text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Salam Silaturahmi 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-serif text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Salam Dari Kerabat &amp; Sahabat</span>
                    <span class="text-xs font-sans text-raya-gold">{{ isset($wishes) ? count($wishes) : 0 }} Pesan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Keluarga';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-raya-card border border-raya-gold/25 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-raya-gold font-serif">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-raya-deep text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-raya-card border border-raya-gold/20 text-center text-xs text-slate-400 italic">
                            Belum ada salam. Jadilah yang pertama mengirimkan ucapan Idul Fitri!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-raya-deep text-slate-400 border-t border-raya-gold/30">
            <p class="font-serif text-xl text-raya-gold mb-1">{{ $hostName }}</p>
            <p class="text-xs text-slate-400 font-serif italic">Taqabbalallahu Minna Wa Minkum • Minal Aidin Wal Faizin</p>
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
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => cover.classList.add('hidden'), 1000);
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
                showToast('Salam silaturahmi berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Keluarga';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-raya-card border border-raya-gold/25 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-raya-gold font-serif">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-raya-deep text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas salam silaturahmi Anda!');
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
                item.className = 'p-2 rounded-xl bg-raya-card border border-raya-gold/30 shadow';
                item.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-raya-deep">
                        <img src="${url}" alt="Silaturahmi Moment ${idx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultHostImg = "{{ $hostImg }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = photoUrl;
                } else if (target === 'groom' || target === 'host' || target === 'person') {
                    const hostEl = document.getElementById('previewGroomPhotoImg');
                    if (hostEl) hostEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCoverPhotoImg');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'host' || target === 'person') {
                    const hostEl = document.getElementById('previewGroomPhotoImg');
                    if (hostEl) hostEl.src = defaultHostImg;
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
