<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Royal Aqiqah & Tasmiyah') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Kemegahan Tasyakuran Royal Aqiqah & Tasmiyah Buah Hati {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Royal Aqiqah & Tasmiyah') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan memohon ridho dan keberkahan Allah SWT, kami mengundang Bapak/Ibu/Saudara/i dalam Royal Aqiqah & Tasmiyah {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200' }}">

    <!-- Google Fonts: Royal Heritage Serif & Islamic Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        royal: {
                            emerald: '#062C21',
                            dark: '#031711',
                            card: '#0B3B2D',
                            cardlight: '#134E3C',
                            gold: '#D4AF37',
                            goldlight: '#F3E5AB',
                            goldbright: '#FFDF73',
                            border: '#8B732B',
                            cream: '#FCF9F2',
                            text: '#F5EFE6'
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        amiri: ['Amiri', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Royal Islamic Pattern Background */
        .royal-bg {
            background-color: #031711;
            background-image: radial-gradient(rgba(212, 175, 55, 0.15) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Gold Foil Glow Animation */
        @keyframes goldGlow {
            0%, 100% { box-shadow: 0 0 15px rgba(212, 175, 55, 0.3), inset 0 0 10px rgba(212, 175, 55, 0.2); }
            50% { box-shadow: 0 0 30px rgba(212, 175, 55, 0.6), inset 0 0 20px rgba(212, 175, 55, 0.4); }
        }
        .animate-gold-glow { animation: goldGlow 3s ease-in-out infinite; }

        /* Floating Lantern Sway */
        @keyframes lanternSway {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        .lantern-sway { transform-origin: top center; animation: lanternSway 4s ease-in-out infinite; }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active { animation: toastSlide 2.8s ease forwards; }
    </style>
</head>
<body class="royal-bg text-royal-text font-sans antialiased selection:bg-royal-gold selection:text-royal-dark relative overflow-x-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200'
        );
        $babyPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/lullaby-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:30 WIB';

        $babyName = $couple->groom_name ?? 'Pangeran Malik Al-Ghazi';
        $babyFull = $couple->groom_fullname ?? $babyName;
        $orderInfo = $couple->groom_birth_order ?? 'Putra Mahkota Pertama';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-royal-card border-2 border-royal-gold shadow-2xl flex items-center justify-center text-royal-goldbright hover:scale-110 transition" title="Audio Tasyakuran">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 7s;">👑</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-royal-card border border-royal-gold text-white text-xs font-cinzel rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-royal-goldbright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (ROYAL GOLD EMBOSSED ARCH)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm bg-gradient-to-b from-royal-card via-royal-emerald to-royal-dark rounded-3xl p-7 text-center shadow-2xl border-2 border-royal-gold animate-gold-glow overflow-hidden">
            
            <!-- Suspended Golden Lantern Icon -->
            <div class="lantern-sway mx-auto w-10 text-3xl mb-1 text-royal-gold">
                🏮
            </div>

            <div class="space-y-4">
                <span class="inline-block px-3.5 py-1 rounded-full bg-royal-gold/20 text-royal-goldbright text-[10px] font-cinzel font-bold tracking-[0.2em] uppercase border border-royal-gold/40">
                    👑 Royal Sultan Aqiqah
                </span>

                <!-- Royal Arch Frame Photo -->
                <div class="relative w-36 h-48 mx-auto rounded-t-full rounded-b-xl overflow-hidden p-1.5 bg-gradient-to-b from-royal-gold via-royal-border to-royal-emerald shadow-2xl">
                    <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-royal-dark">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Royal Cover" class="w-full h-full object-cover">
                    </div>
                </div>

                <div>
                    <span class="font-amiri text-lg text-royal-gold block">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</span>
                    <h1 class="font-cinzel text-xl sm:text-2xl font-bold text-royal-goldbright mt-1 tracking-wide">
                        {{ $babyName }}
                    </h1>
                    <p class="text-xs text-royal-text/80 mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu VIP -->
                <div class="p-4 rounded-2xl bg-royal-dark/80 border border-royal-gold/40 space-y-1">
                    <span class="text-[10px] font-cinzel text-royal-gold uppercase tracking-wider block">Undangan Kehormatan:</span>
                    <b class="text-sm font-cinzel font-bold text-white block">{{ $guest->name ?? 'Tamu Kehormatan' }}</b>
                    <span class="text-[10px] text-royal-text/70 block">Merupakan kehormatan atas kehadiran Bapak/Ibu</span>
                </div>

                <!-- Tombol Buka Undangan -->
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-royal-gold to-[#B8972E] hover:from-royal-goldbright hover:to-royal-gold text-royal-dark font-cinzel font-bold text-xs tracking-wider uppercase shadow-xl hover:scale-[1.02] active:scale-[0.98] transition flex items-center justify-center gap-2">
                    <span>✨</span> <span>Buka Lembaran Titah Kerajaan</span> <span>👑</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-royal-dark shadow-2xl relative border-x border-royal-border/60">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-royal-card via-royal-emerald to-royal-dark space-y-4 border-b border-royal-border/60">
            <span class="text-2xl text-royal-gold">⚜️ 🌙 ⚜️</span>
            
            <div class="space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-[0.2em] text-royal-gold">
                    {{ $couple->event_heading ?? "ROYAL TASYAKURAN AQIQAH & TASMIYAH" }}
                </span>
                <h2 class="font-cinzel text-2xl sm:text-3xl font-bold text-royal-goldbright leading-tight">
                    Titah Doa Keberkahan
                </h2>
            </div>

            <!-- Arabic Ayat / Doa Aqiqah -->
            <div class="p-4 rounded-2xl bg-royal-dark/60 border border-royal-gold/30 space-y-2">
                <p class="font-amiri text-lg text-royal-gold leading-relaxed" dir="rtl">
                    بَارَكَ اللهُ لَكَ فِي المَوْهُوْبِ لَكَ، وَشَكَرْتَ الوَاهِبَ، وَبَلَغَ أَشُدَّهُ، وَرُزِقْتَ بِرَّهُ
                </p>
                <p class="text-[11px] text-royal-text/80 italic leading-relaxed">
                    "Semoga Allah memberkahimu atas karunia sang buah hati, engkau bersyukur kepada Sang Maha Pemberi, ia tumbuh dewasa dan berbakti kepada kedua orang tua."
                </p>
            </div>

            <!-- Baby Crown Portrait -->
            <div class="pt-3">
                <div class="relative w-44 h-56 mx-auto rounded-t-full rounded-b-2xl overflow-hidden p-2 bg-gradient-to-b from-royal-gold via-royal-border to-royal-card shadow-2xl animate-gold-glow">
                    <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden bg-royal-dark">
                        <img id="previewGroomPhotoImg" src="{{ $babyPhoto }}" alt="{{ $babyName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-cinzel text-2xl font-bold text-royal-goldbright">{{ $babyFull }}</h3>
                    <p class="text-xs font-medium text-royal-gold">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-royal-gold/20 text-royal-gold text-[10px] font-semibold border border-royal-gold/30">
                            ⚖️ {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-royal-text/80 pt-2 border-t border-royal-border/40">
                            Putra/Putri Tercinta dari:
                            <b id="previewParentsNames" class="block font-cinzel font-bold text-royal-gold text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-royal-card/60 border-b border-royal-border/60 text-center space-y-3">
            <span class="text-[11px] font-cinzel font-bold uppercase tracking-[0.2em] text-royal-gold block">
                ⏳ Hitung Mundur Perhelatan Royal Aqiqah
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-royal-dark border border-royal-gold/40 shadow-sm">
                    <b id="timerDays" class="block text-xl font-cinzel font-bold text-royal-goldbright">00</b>
                    <span class="text-[9px] text-royal-text/70 uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-royal-dark border border-royal-gold/40 shadow-sm">
                    <b id="timerHours" class="block text-xl font-cinzel font-bold text-royal-goldbright">00</b>
                    <span class="text-[9px] text-royal-text/70 uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-royal-dark border border-royal-gold/40 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-cinzel font-bold text-royal-goldbright">00</b>
                    <span class="text-[9px] text-royal-text/70 uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-royal-dark border border-royal-gold/40 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-cinzel font-bold text-royal-goldbright">00</b>
                    <span class="text-[9px] text-royal-text/70 uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-cinzel text-royal-goldlight">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-royal-gold">Tata Rangkaian Acara</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Waktu &amp; Singgasana Perhelatan</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-royal-card border border-royal-gold/50 shadow-md space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-royal-gold to-[#B8972E] text-royal-dark text-[10px] font-cinzel font-bold uppercase">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-royal-goldbright">
                                    {{ $ev->start_time ?? '09:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-cinzel text-base font-bold text-white">{{ $ev->venue_name ?? 'Grand Ballroom Keraton' }}</h4>
                                <p class="text-xs text-royal-text/80 mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap lokasi perhelatan.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-royal-gold hover:underline">
                                    <span>📍</span> <span>Buka Navigasi Lokasi (Google Maps) &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-royal-card border border-royal-gold/50 shadow-md space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-royal-gold to-[#B8972E] text-royal-dark text-[10px] font-cinzel font-bold uppercase">
                            Prosesi Tasmiyah &amp; Jamuan Santap Sultan
                        </span>
                        <span class="text-xs font-mono font-bold text-royal-goldbright">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-cinzel text-base font-bold text-white">{{ $couple->venue_name ?? 'Kediaman Ageng Keluarga' }}</h4>
                        <p class="text-xs text-royal-text/80 mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat resmi kediaman keluarga besar.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-royal-gold hover:underline">
                        <span>📍</span> <span>Buka Navigasi Lokasi (Google Maps) &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Royal Aqiqah') . ' - ' . $babyName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Royal Aqiqah & Tasmiyah ' . $babyName) }}&location={{ urlencode($couple->venue_name ?? 'Grand Ballroom') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-royal-gold to-[#B8972E] text-royal-dark text-xs font-cinzel font-bold shadow-lg hover:scale-105 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- ROYAL MOMENTS GALLERY -->
        <section class="p-6 bg-royal-card/40 border-t border-royal-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-royal-gold">Galeri Singgasana</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Album Potret Mulia</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-royal-dark border border-royal-gold/40 shadow">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Mulia" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-royal-dark border border-royal-gold/40 shadow">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-royal-dark border border-royal-gold/40 shadow">
                        <img src="{{ $babyPhoto }}" alt="Baby Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DIGITAL GIFT / TALI ASIH SULTAN -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-royal-dark border-t border-royal-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-royal-gold">Amplop Kehormatan</span>
                    <h3 class="font-cinzel text-2xl font-bold text-white">Tali Asih Sang Pangeran</h3>
                    <p class="text-xs text-royal-text/80 max-w-xs mx-auto">
                        Doa restu tulus Anda adalah hadiah paling mulia. Fasilitas amplop digital bagi para tamu kehormatan:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-royal-card border border-royal-gold/60 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-cinzel font-bold text-royal-goldbright">💳 {{ $couple->bank_name_1 ?? 'BANK SYARIAH' }}</span>
                            <span class="text-[10px] font-cinzel font-bold px-2 py-0.5 rounded bg-royal-gold/20 text-royal-gold">Transfer Resmi</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-white block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-royal-text/70">a.n. {{ $couple->bank_holder_1 ?? $babyName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-royal-gold hover:bg-royal-goldbright text-royal-dark text-xs font-cinzel font-bold transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-royal-card/60 border border-royal-gold/30 text-left space-y-1">
                        <span class="text-xs font-cinzel font-bold text-royal-gold flex items-center gap-1">
                            <span>📦</span> Kirim Kado / Hadiah ke Istana Kediaman:
                        </span>
                        <p class="text-xs text-royal-text/80 leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat kado berhasil disalin!')" class="mt-1 text-xs font-bold text-royal-gold underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & BUKU TITAH TAMU -->
        <section class="p-6 sm:p-8 bg-royal-card/50 border-t border-royal-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-royal-gold">Konfirmasi Tamu VIP</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Buku Titah &amp; Doa Restu</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-royal-dark p-5 rounded-2xl border border-royal-gold/40 shadow-lg">
                @csrf
                <input type="hidden" name="category" value="Aqiqah">
                <input type="hidden" name="theme" value="Royal Sultan Baby &amp; Tasmiyah Gold">
                
                <div>
                    <label class="block text-xs font-cinzel font-bold text-royal-gold mb-1">Nama Tamu Kehormatan *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap & Gelar..." class="w-full px-3.5 py-2.5 rounded-xl bg-royal-card border border-royal-gold/40 text-xs text-white focus:outline-none focus:ring-2 focus:ring-royal-gold">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-royal-gold mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl bg-royal-card border border-royal-gold/40 text-xs text-white focus:outline-none focus:ring-2 focus:ring-royal-gold">
                            <option value="hadir">Pasti Hadir Memenuhi Titah 👑</option>
                            <option value="ragu">Masih Menyesuaikan Jadwal</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-royal-gold mb-1">Jumlah Rombongan</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl bg-royal-card border border-royal-gold/40 text-xs text-white focus:outline-none focus:ring-2 focus:ring-royal-gold">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang (VIP Table)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-cinzel font-bold text-royal-gold mb-1">Doa Kebaikan untuk Sang Pangeran</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan doa berkah & tahniah..." class="w-full px-3.5 py-2 rounded-xl bg-royal-card border border-royal-gold/40 text-xs text-white focus:outline-none focus:ring-2 focus:ring-royal-gold"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-gradient-to-r from-royal-gold to-[#B8972E] text-royal-dark font-cinzel font-bold text-xs uppercase tracking-wider shadow-md hover:scale-[1.01] transition">
                    Kirim Konfirmasi &amp; Doa Restu
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-royal-dark border border-royal-gold/30 shadow space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-cinzel text-royal-goldbright">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-royal-gold font-bold">👑 Hadir</span>
                            </div>
                            <p class="text-xs text-royal-text/80 leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-royal-dark border-t border-royal-border/60 space-y-2">
            <span class="text-2xl text-royal-gold">👑 ⚜️ 👑</span>
            <p class="font-cinzel text-sm font-bold text-royal-goldbright">
                Jazaakumullah Ahsanal Jaza
            </p>
            <p class="text-[11px] text-royal-text/70">
                {{ $couple->thank_you_note ?? 'Merupakan kehormatan tak terhingga atas doa restu Bapak/Ibu/Saudara/i sekalian.' }}
            </p>
            <div class="pt-3 text-[10px] text-royal-text/50 border-t border-royal-border/40">
                Created with ❤️ by <b>D'Karsa Digital Invitation</b>
            </div>
        </footer>
    </main>

    <!-- ========================================================
         SCRIPTS: AUDIO, TIMER, RSVP & LIVE PREVIEW HANDSHAKE
         ======================================================== -->
    <script>
        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.opacity = '0';
                cover.style.pointerEvents = 'none';
                setTimeout(() => { cover.classList.add('hidden'); }, 1000);
            }
            const floatingBtn = document.getElementById('audioFloatingBtn');
            if (floatingBtn) floatingBtn.classList.remove('hidden');

            const audio = document.getElementById('invitationAudio');
            if (audio) {
                audio.play().catch(() => {
                    console.log('Audio autoplay prevented by browser');
                });
            }
        }

        function toggleAudio() {
            const audio = document.getElementById('invitationAudio');
            const icon = document.getElementById('audioDiscIcon');
            if (!audio) return;
            if (audio.paused) {
                audio.play();
                if (icon) icon.classList.add('animate-spin');
            } else {
                audio.pause();
                if (icon) icon.classList.remove('animate-spin');
            }
        }

        const targetDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}").getTime();
        function updateTimer() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById('timerDays').innerText = "00";
                document.getElementById('timerHours').innerText = "00";
                document.getElementById('timerMinutes').innerText = "00";
                document.getElementById('timerSeconds').innerText = "00";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('timerDays').innerText = String(days).padStart(2, '0');
            document.getElementById('timerHours').innerText = String(hours).padStart(2, '0');
            document.getElementById('timerMinutes').innerText = String(minutes).padStart(2, '0');
            document.getElementById('timerSeconds').innerText = String(seconds).padStart(2, '0');
        }
        setInterval(updateTimer, 1000);
        updateTimer();

        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showToast(message || 'Teks berhasil disalin!');
            }).catch(() => {
                showToast('Gagal menyalin teks');
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMessage');
            if (toast && toastMsg) {
                toastMsg.textContent = msg;
                toast.classList.remove('hidden', 'toast-active');
                void toast.offsetWidth;
                toast.classList.add('toast-active');
                setTimeout(() => { toast.classList.add('hidden'); }, 2800);
            }
        }

        function submitRsvp(e) {
            e.preventDefault();
            const form = document.getElementById('rsvpForm');
            const btn = document.getElementById('btnSubmitRsvp');
            const formData = new FormData(form);

            btn.disabled = true;
            btn.textContent = 'Mengirimkan Titah...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Titah konfirmasi kehadiran Anda telah tercatat!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Tamu Kehormatan';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-royal-dark border border-royal-gold/30 shadow space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-cinzel text-royal-goldbright">${name}</b>
                            <span class="text-[10px] text-royal-gold font-bold">👑 Hadir</span>
                        </div>
                        <p class="text-xs text-royal-text/80 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas doa dan kehadiran Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = 'Kirim Konfirmasi & Doa Restu';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-royal-dark border border-royal-gold/40 shadow';
                item.innerHTML = `<img src="${url}" alt="Momen Mulia" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultBabyPhoto = "{{ $babyPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'baby') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'baby') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultBabyPhoto;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) renderDynamicGallery(photos);
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
