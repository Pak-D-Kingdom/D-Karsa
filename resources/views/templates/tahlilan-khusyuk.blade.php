<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Doa Bersama & Tahlilan') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Doa Bersama, Tahlilan & Peringatan Haul Mengenang {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Doa Bersama & Tahlilan') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Bismillah, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam pembacaan Surah Yasin, Tahlil dan Doa Bersama mengenang almarhum/almarhumah {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=1200' }}">

    <!-- Google Fonts: Classical Arabic & Dignified Serif Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        serene: {
                            forest: '#132419',
                            card: '#1B3324',
                            cardlight: '#23422E',
                            deep: '#0B1710',
                            gold: '#C5A869',
                            goldbright: '#F3E7C4',
                            border: 'rgba(197, 168, 105, 0.35)',
                            parchment: '#F9F7F2',
                            ink: '#111D15',
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

        /* Antique Book Frame */
        .antique-frame {
            border: 2px solid #C5A869;
            position: relative;
        }
        .antique-frame::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(197, 168, 105, 0.4);
            pointer-events: none;
        }

        /* Subtle sacred starry pattern */
        .sacred-bg {
            background-color: #0B1710;
            background-image: radial-gradient(#C5A869 0.75px, transparent 0.75px), radial-gradient(#23422E 0.75px, #0B1710 0.75px);
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
    </style>
</head>
<body class="sacred-bg text-slate-200 font-sans antialiased selection:bg-serene-gold selection:text-serene-forest">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=1200');
        $personImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addDays(14);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '19:30 WIB (Ba’da Isya)';

        $deceasedName = $couple->groom_name ?? 'Almarhum H. Ahmad Dahlan bin H. Abdullah';
        $thParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Keluarga Besar Almarhum & Seluruh Anak Cucu');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-serene-card border border-serene-gold/40 shadow-xl flex items-center justify-center text-serene-gold hover:scale-105 transition" title="Lantunan Doa">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🕯️</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-serene-card border border-serene-gold text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-serene-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         SURAH YASIN & TAHLIL BOOK COVER SCREEN
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 transition-all duration-1000 ease-in-out">
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-15 pointer-events-none" style="background-image: url('{{ $coverImg }}');"></div>
        <div class="relative w-full max-w-sm bg-serene-forest rounded-3xl p-7 text-center shadow-2xl antique-frame overflow-hidden">
            
            <!-- Candle & Moon Emblem -->
            <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-serene-card border border-serene-gold/50 flex items-center justify-center text-2xl shadow-inner">
                🕯️
            </div>

            <!-- Inna Lillahi Calligraphy -->
            <p class="font-amiri text-lg text-serene-goldbright font-bold mb-1">إِنَّا لِلَّهِ وَإِنَّا إِلَيْهِ رَاجِعُونَ</p>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-sans font-bold uppercase tracking-[0.2em] bg-serene-gold/15 text-serene-gold border border-serene-gold/30 mb-3">
                {{ $couple->event_heading ?? "DOA BERSAMA & TAHLILAN" }}
            </span>

            <!-- Deceased Photo Frame -->
            <div class="relative w-44 h-48 mx-auto rounded-xl overflow-hidden border-2 border-serene-gold/60 shadow-xl my-3 bg-serene-deep">
                <img id="previewGroomPhotoImg" src="{{ $personImg }}" alt="{{ $deceasedName }}" class="w-full h-full object-cover filter contrast-[1.02]">
                <div class="absolute inset-0 bg-gradient-to-t from-serene-forest/80 via-transparent to-transparent"></div>
            </div>

            <!-- In Memoriam Name -->
            <div class="my-3">
                <p class="text-[10px] uppercase tracking-[0.25em] text-slate-400 font-sans">MENGENANG KEPULANGAN:</p>
                <h1 class="font-serif text-2xl font-bold text-white tracking-wide mt-1">
                    {{ $deceasedName }}
                </h1>
                <p class="text-xs text-serene-goldbright font-sans font-medium mt-1">
                    📅 {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Guest Card -->
            <div class="my-4 p-3 rounded-2xl bg-serene-card/80 border border-serene-gold/30 text-center">
                <span class="text-[9px] uppercase tracking-[0.2em] text-slate-400 block">KEPADA YTH:</span>
                <b class="text-sm font-sans font-bold text-white block mt-0.5">{{ $guest->name ?? 'Bapak / Ibu / Jamaah' }}</b>
            </div>

            <!-- Open Document Action -->
            <button type="button" onclick="openInvitation()" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-serene-gold to-[#9A7D3C] hover:brightness-110 text-serene-forest font-sans text-xs font-bold uppercase tracking-[0.25em] shadow-lg transition flex items-center justify-center gap-2">
                <span>🕯️</span> BUKA LEMBAR DOA KHUSYUK
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (Serene Sacred Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-serene-forest text-slate-200 shadow-2xl relative border-x border-serene-gold/30">

        <!-- Top Header Hero -->
        <header class="pt-16 pb-12 px-6 text-center bg-gradient-to-b from-serene-card to-serene-forest border-b border-serene-gold/25 relative">
            <span class="text-2xl text-serene-gold block mb-2">🕯️ ─── ❖ ─── 🕯️</span>
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-sans uppercase tracking-[0.25em] bg-serene-gold/15 text-serene-gold border border-serene-gold/30 mb-2 font-semibold">
                {{ $couple->event_heading ?? "DOA BERSAMA, TAHLILAN & HAUL" }}
            </span>
            <h1 class="font-serif text-2xl sm:text-3xl font-bold text-white tracking-wide my-2 leading-tight">
                {{ $deceasedName }}
            </h1>
            <p class="text-xs text-slate-300 font-sans tracking-wider">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <p class="text-xs text-serene-gold mt-2">
                📍 {{ $couple->venue_name ?? 'Kediaman Keluarga Besar' }}
            </p>
        </header>

        <!-- Ayat Ketenangan Jiwa (Surah Al-Fajr: 27-30) -->
        <section class="py-12 px-6 border-b border-serene-gold/20 text-center">
            <div class="p-6 rounded-3xl bg-serene-card border border-serene-gold/30 shadow-md">
                <p class="font-amiri text-lg text-serene-goldbright font-bold mb-2 leading-loose">
                    يَٰٓأَيَّتُهَا ٱلنَّفْسُ ٱلْمُطْمَئِنَّةُ • ٱرْجِعِىٓ إِلَىٰ رَبِّكِ رَاضِيَةً مَّرْضِيَّةً • فَٱدْخُلِى فِى عِبَٰدِى • وَٱدْخُلِى جَنَّتِى
                </p>
                <p class="font-serif text-xs text-slate-200 italic leading-relaxed">
                    "Wahai jiwa yang tenang! Kembalilah kepada Tuhanmu dengan hati yang ridha dan diridhai-Nya. Maka masuklah ke dalam golongan hamba-hamba-Ku, dan masuklah ke dalam surga-Ku."
                </p>
                <span class="inline-block mt-3 text-[10px] font-sans text-serene-gold uppercase font-bold tracking-wider">
                    (QS. Al-Fajr: 27-30)
                </span>

                <div class="my-4 w-12 h-px bg-serene-gold/50 mx-auto"></div>

                <p class="text-xs text-slate-300 italic">
                    "{{ $couple->quote ?? 'Tiada yang lebih berharga selain untaian doa dan bacaan ayat suci Al-Qur’an yang dikirimkan untuk almarhum/almarhumah tercinta. Semoga Allah SWT mengampuni segala dosa beliau dan menempatkannya di tempat termulia.' }}"
                </p>

                <p class="text-xs text-slate-400 mt-4">
                    Keluarga Besar / Ahli Waris yang Mengundang:<br>
                    <b id="previewGroomParentsText" class="text-sm font-sans text-white block mt-1">
                        {{ $thParents }}
                    </b>
                </p>
            </div>
        </section>

        <!-- Live Countdown Section -->
        <section class="py-12 px-6 bg-serene-card/40 border-b border-serene-gold/20 text-center">
            <span class="text-[9px] font-sans tracking-[0.25em] uppercase text-serene-gold block mb-1">COUNTDOWN TO MAJLIS</span>
            <h3 class="font-serif text-xl font-bold text-white mb-6">Menghitung Waktu Majlis Tahlil</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-serene-forest border border-serene-gold/40 text-center shadow">
                    <span id="cdDays" class="block font-serif text-2xl font-bold text-serene-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-serene-forest border border-serene-gold/40 text-center shadow">
                    <span id="cdHours" class="block font-serif text-2xl font-bold text-serene-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-serene-forest border border-serene-gold/40 text-center shadow">
                    <span id="cdMinutes" class="block font-serif text-2xl font-bold text-serene-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-serene-forest border border-serene-gold/40 text-center shadow">
                    <span id="cdSeconds" class="block font-serif text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-sans">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Tahlilan & Doa Bersama') . ' - ' . $deceasedName);
                $calDetails = urlencode('Menghadiri pembacaan Surah Yasin, Tahlil dan Doa Bersama.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(3)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-serene-forest hover:bg-serene-card text-serene-gold text-[10px] font-sans tracking-widest uppercase transition border border-serene-gold/40">
                    <span>📅</span> Simpan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Itinerary Schedule Section -->
        <section class="py-14 px-6 border-b border-serene-gold/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-sans tracking-[0.25em] uppercase text-serene-gold block">AGENDA ACARA</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Susunan Acara Tahlilan 🕯️</h2>
            </div>

            <div class="space-y-4 max-w-sm mx-auto">
                <div class="p-5 rounded-2xl bg-serene-card border border-serene-gold/30">
                    <div class="flex items-center justify-between text-serene-gold text-xs font-sans mb-1">
                        <span>SESI I • SHOLAT &amp; YASIN</span>
                        <span>19:30 - 20:15 WIB</span>
                    </div>
                    <h3 class="font-serif text-base font-bold text-white">Sholat Isya Berjamaah &amp; Pembacaan Surah Yasin</h3>
                    <p class="text-xs text-slate-300 mt-1">Diawali sholat Isya berjamaah dilanjutkan pembacaan Surah Yasin secara khusyuk dipimpin ustadz.</p>
                </div>

                <div class="p-5 rounded-2xl bg-serene-card border border-serene-gold/50 shadow-md">
                    <div class="flex items-center justify-between text-serene-gold text-xs font-sans mb-1">
                        <span>SESI II • TAHLIL &amp; DOA</span>
                        <span>20:15 - 21:00 WIB</span>
                    </div>
                    <h3 class="font-serif text-base font-bold text-white">Pembacaan Tahlil, Tahmid &amp; Doa Arwah</h3>
                    <p class="text-xs text-slate-300 mt-1">Lantunan dzikir tahlil, pembacaan doa khusus arwah almarhum/almarhumah serta tausiyah haul.</p>
                </div>

                <div class="p-5 rounded-2xl bg-serene-card border border-serene-gold/30">
                    <div class="flex items-center justify-between text-serene-gold text-xs font-sans mb-1">
                        <span>SESI III • JAMUAN</span>
                        <span>21:00 WIB - Selesai</span>
                    </div>
                    <h3 class="font-serif text-base font-bold text-white">Ramah Tamah &amp; Santap Hidangan Bersama</h3>
                    <p class="text-xs text-slate-300 mt-1">Menikmati jamuan makan malam dan ramah tamah bersama para jamaah serta keluarga besar.</p>
                </div>
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-serene-card border border-serene-gold/40 text-center">
                <span class="text-[9px] uppercase tracking-[0.2em] text-serene-gold block mb-1">LOKASI KEDIAMAN DUKA</span>
                <h3 class="font-serif text-lg font-bold text-white">{{ $couple->venue_name ?? 'Kediaman Keluarga Almarhum' }}</h3>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Jl. Tebet Barat Raya No. 45, Jakarta Selatan' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-serene-gold to-[#9A7D3C] text-serene-forest text-xs font-sans font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Sedekah Jariyah & Santunan (Digital Gift) -->
        <section class="py-14 px-6 border-b border-serene-gold/20 text-center">
            <span class="text-[9px] tracking-[0.25em] uppercase text-serene-gold block mb-1">SEDEKAH JARIYAH</span>
            <h2 class="font-serif text-2xl font-bold text-white mb-3">Infaq &amp; Sedekah Jariyah</h2>
            <p class="text-xs text-slate-300 max-w-xs mx-auto mb-6 leading-relaxed">
                Bagi Bapak/Ibu/Saudara/i yang berkehendak menyalurkan sedekah jariyah / santunan atas nama almarhum/almarhumah:
            </p>

            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-serene-card border border-serene-gold/40 shadow-xl text-center">
                <div class="inline-block px-3 py-1 bg-serene-forest text-serene-gold text-[10px] font-sans font-bold tracking-widest uppercase mb-2 border border-serene-gold/30">
                    {{ $couple->bank_name ?? 'BSI (BANK SYARIAH INDONESIA)' }}
                </div>
                <p class="font-mono text-xl font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '7100223344' }}
                </p>
                <p class="text-xs text-slate-400 mb-4">a.n {{ $couple->account_name ?? 'Infaq Sedekah Almarhum' }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '7100223344' }}', 'Nomor rekening sedekah jariyah disalin')" class="w-full py-2.5 rounded-lg bg-serene-gold/20 hover:bg-serene-gold/30 text-serene-gold text-xs font-sans font-bold uppercase tracking-wider border border-serene-gold/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>
        </section>

        <!-- Buku Doa & Al-Fatihah Section -->
        <section class="py-14 px-6 border-b border-serene-gold/20">
            <div class="text-center mb-8">
                <span class="text-[9px] tracking-[0.25em] uppercase text-serene-gold block">LEMBAR DOA ARWAH</span>
                <h2 class="font-serif text-2xl font-bold text-white mt-1">Untaian Doa &amp; Al-Fatihah 🕯️</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-serene-card p-6 rounded-2xl border border-serene-gold/30 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] uppercase tracking-wider text-slate-300 mb-1">Nama Lengkap Jamaah / Keluarga</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-serene-forest border border-serene-gold/30 text-xs text-white focus:outline-none focus:border-serene-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] uppercase tracking-wider text-slate-300 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-serene-forest border border-serene-gold/30 text-xs text-white focus:outline-none focus:border-serene-gold">
                            <option value="Hadir">InsyaAllah Hadir Berjamaah</option>
                            <option value="Tidak Hadir">Mendoakan dari Kediaman</option>
                            <option value="Ragu-ragu">Menyesuaikan Waktu</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] uppercase tracking-wider text-slate-300 mb-1">Untaian Doa / Bacaan Al-Fatihah</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan doa kebaikan dan permohonan ampunan untuk almarhum/almarhumah..." class="w-full px-4 py-2.5 rounded-xl bg-serene-forest border border-serene-gold/30 text-xs text-white focus:outline-none focus:border-serene-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-serene-gold to-[#9A7D3C] text-serene-forest font-sans text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Untaian Doa Khusyuk 🕊️
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-serif text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Doa Dari Kerabat &amp; Jamaah</span>
                    <span class="text-xs font-sans text-serene-gold">{{ isset($wishes) ? count($wishes) : 0 }} Doa</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Jamaah';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-serene-card border border-serene-gold/25 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-serene-gold font-serif">{{ $wName }}</b>
                                    <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-serene-forest text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-serene-card border border-serene-gold/20 text-center text-xs text-slate-400 italic">
                            Belum ada doa tertulis. Jadilah yang pertama mengirimkan Al-Fatihah!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-serene-deep text-slate-400 border-t border-serene-gold/30">
            <p class="font-serif text-xl text-serene-gold mb-1">{{ $deceasedName }}</p>
            <p class="text-xs text-slate-400 font-serif italic">Jazakumullahu Khairan Katsiran • Terima kasih atas doa tulus Anda.</p>
            <div class="mt-6 pt-4 border-t border-white/10 text-[9px] text-slate-500 font-sans">
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
                    audioIcon.textContent = '🕯️';
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
                showToast('Untaian doa berhasil dikirim!');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Jamaah';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-serene-card border border-serene-gold/25 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-serene-gold font-serif">${name}</b>
                            <span class="text-[9px] font-sans px-2 py-0.5 rounded bg-serene-forest text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-200 mt-1 leading-relaxed font-serif italic">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas untaian doa Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for live preview reset
        const defaultPersonPhoto = "{{ $personImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultFamilyParents = @json($thParents);

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if ((event.data.target === 'groom' || event.data.target === 'person') && event.data.dataUrl) {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' || event.data.target === 'person') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultPersonPhoto;
                } else if (event.data.target === 'cover') {
                    const url = event.data.defaultUrl || defaultCoverPhoto;
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${url}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = url;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                const pEl = document.getElementById('previewGroomParentsText');
                if (pEl) {
                    if (event.data.groomParents) {
                        pEl.textContent = event.data.groomParents;
                    } else if (event.data.resetDefault) {
                        pEl.textContent = defaultFamilyParents;
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
