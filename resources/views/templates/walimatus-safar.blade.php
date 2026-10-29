<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Walimatus Safar Haji & Umrah') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Walimatus Safar & Doa Keberangkatan Ibadah Haji/Umrah ke Tanah Suci Makkah & Madinah {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Walimatus Safar Haji & Umrah') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Labbaik Allahumma Labbaik. Dengan kerendahan hati kami memohon maaf dan mengundang Bapak/Ibu dalam Walimatus Safar {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200' }}">

    <!-- Google Fonts: Grand Kiswah Gold & Arabic Display -->
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
                        safar: {
                            black: '#0C0A09',
                            card: '#1C1917',
                            cardlight: '#292524',
                            gold: '#D4AF37',
                            goldlight: '#FEF08A',
                            goldbright: '#FACC15',
                            border: '#785A1D',
                            text: '#F5F5F4',
                            muted: '#A8A29E'
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

        /* Kaaba Kiswah Golden Mesh */
        .kiswah-bg {
            background-color: #0C0A09;
            background-image: linear-gradient(rgba(212, 175, 55, 0.08) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(212, 175, 55, 0.08) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        /* Gold Foil Ambient Shimmer */
        @keyframes goldShimmer {
            0%, 100% { border-color: rgba(212, 175, 55, 0.4); box-shadow: 0 0 15px rgba(212, 175, 55, 0.2); }
            50% { border-color: rgba(250, 204, 21, 0.8); box-shadow: 0 0 25px rgba(250, 204, 21, 0.45); }
        }
        .gold-shimmer { animation: goldShimmer 3s ease-in-out infinite; }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active { animation: toastSlide 2.8s ease forwards; }
        /* Hide scrollbars for app-like clean mobile experience */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="kiswah-bg text-safar-text font-sans antialiased selection:bg-safar-gold selection:text-safar-black relative overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200'
        );
        $pilgrimPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/islamic-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '19:30 WIB';

        $pilgrimName = $couple->groom_name ?? 'Bpk. H. Rahmat & Ibu Hj. Siti';
        $pilgrimFull = $couple->groom_fullname ?? $pilgrimName;
        $orderInfo = $couple->groom_birth_order ?? 'Calon Jamaah Haji / Umrah Mubarok';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-safar-card border-2 border-safar-gold shadow-2xl flex items-center justify-center text-safar-goldbright hover:scale-110 transition" title="Alunan Talbiyah & Doa">
            <span id="audioDiscIcon" class="text-base animate-pulse">🕋</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-safar-card border border-safar-gold text-white text-xs font-cinzel rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-safar-goldbright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: KISWAH GOLD ARCH GATE (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-[#0C0F17] kiswah-bg flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-safar-text select-none">
        <!-- Ambient Gold Shimmer Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-safar-gold/15 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-amber-950/30 blur-3xl"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-transparent to-black/85"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="text-2xl mb-1 text-safar-gold">
                    🕋
                </div>
                <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full bg-safar-gold/20 text-safar-goldbright text-[8.5px] font-cinzel font-bold tracking-[0.2em] uppercase border border-safar-gold/40">
                    {{ $couple->event_heading ?? "✨ Walimatus Safar Eksklusif" }}
                </span>
                <span class="font-amiri text-sm text-safar-gold block mt-1">لَبَّيْكَ اللَّهُمَّ لَبَّيْكَ</span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Archway Frame -->
                <div class="relative w-20 h-24 mx-auto rounded-t-full rounded-b-xl overflow-hidden p-1 bg-gradient-to-b from-safar-gold via-safar-border to-safar-card shadow-xl my-1 shrink-0">
                    <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-black">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Safar" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Pilgrim Name & Subtitle -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewHostNameCover" class="font-cinzel text-lg sm:text-xl font-bold text-white tracking-wide truncate">
                        {{ $pilgrimName }}
                    </h1>
                    <p class="text-[9.5px] text-safar-muted mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu Jamaah -->
                <div class="w-full py-1 px-3 rounded-xl bg-black/80 backdrop-blur-md border border-safar-gold/30 text-center shadow-md mt-0.5">
                    <span class="text-[7.5px] font-cinzel text-safar-muted uppercase tracking-wider block font-medium">KEPADA YTH. BAPAK/IBU/SAUDARA/I:</span>
                    <b id="previewGuestNameCover" class="text-xs font-cinzel font-bold text-safar-goldbright block mt-0.5 truncate">{{ $guest->name ?? 'Tamu Undangan Tercinta' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-safar-gold to-[#B8972E] hover:from-safar-goldbright hover:to-safar-gold active:scale-[0.98] text-safar-black font-cinzel font-bold text-xs uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🤲</span> <span>Buka Lembaran Doa Walimatus Safar</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-safar-muted flex items-center gap-1">
                    <span class="text-safar-gold">♫</span> Alunan Talbiyah & Doa diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-safar-black shadow-2xl relative border-x border-safar-border/60">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-safar-card via-safar-black to-black space-y-4 border-b border-safar-border/60">
            <span class="text-2xl text-safar-gold">🕋 🌙 🕊️</span>
            
            <div class="space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-[0.2em] text-safar-gold">
                    {{ $couple->event_heading ?? "WALIMATUS SAFAR HAJI & UMRAH" }}
                </span>
                <h2 class="font-cinzel text-2xl sm:text-3xl font-bold text-white leading-tight">
                    Menjemput Panggilan Baitullah
                </h2>
            </div>

            <!-- Talbiyah Box -->
            <div class="p-4 rounded-2xl bg-safar-card/60 border border-safar-gold/40 space-y-2">
                <p class="font-amiri text-lg text-safar-goldbright leading-relaxed" dir="rtl">
                    لَبَّيْكَ اللَّهُمَّ لَبَّيْكَ، لَبَّيْكَ لاَ شَرِيْكَ لَكَ لَبَّيْكَ، إِنَّ الْحَمْدَ وَالنِّعْمَةَ لَكَ وَالْمُلْكَ لاَ شَرِيْكَ لَكَ
                </p>
                <p class="text-[11px] text-safar-muted italic leading-relaxed">
                    "Aku penuhi panggilan-Mu ya Allah, aku penuhi panggilan-Mu. Tiada sekutu bagi-Mu. Sesungguhnya segala puji, nikmat, dan kerajaan adalah milik-Mu."
                </p>
            </div>

            <!-- Pilgrim Portrait Spotlight -->
            <div class="pt-3">
                <div class="relative w-40 h-52 mx-auto rounded-t-full rounded-b-2xl overflow-hidden p-1.5 bg-gradient-to-b from-safar-gold via-safar-border to-safar-card shadow-xl">
                    <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden bg-black">
                        <img id="previewGroomPhotoImg" src="{{ $pilgrimPhoto }}" alt="{{ $pilgrimName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-cinzel text-2xl font-bold text-safar-goldbright">{{ $pilgrimFull }}</h3>
                    <p class="text-xs font-medium text-safar-gold">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-safar-gold/20 text-safar-gold text-[10px] font-semibold border border-safar-gold/30">
                            ✈️ {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-safar-muted pt-2 border-t border-safar-border/40">
                            Shohibul Hajat / Keluarga Penyelenggara:
                            <b id="previewParentsNames" class="block font-cinzel font-bold text-safar-gold text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-safar-card/60 border-b border-safar-border/60 text-center space-y-3">
            <span class="text-[11px] font-cinzel font-bold uppercase tracking-[0.2em] text-safar-gold block">
                ⏳ Hitung Mundur Keberangkatan Menuju Tanah Suci
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-black border border-safar-gold/30 shadow-sm">
                    <b id="timerDays" class="block text-xl font-cinzel font-bold text-safar-goldbright">00</b>
                    <span class="text-[9px] text-safar-muted uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-safar-gold/30 shadow-sm">
                    <b id="timerHours" class="block text-xl font-cinzel font-bold text-safar-goldbright">00</b>
                    <span class="text-[9px] text-safar-muted uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-safar-gold/30 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-cinzel font-bold text-safar-goldbright">00</b>
                    <span class="text-[9px] text-safar-muted uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-safar-gold/30 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-cinzel font-bold text-safar-goldbright">00</b>
                    <span class="text-[9px] text-safar-muted uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-cinzel text-safar-goldlight">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-safar-gold">Agenda Safar</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Waktu &amp; Lokasi Pertemuan</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-safar-card border border-safar-gold/40 shadow-md space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-safar-gold text-safar-black text-[10px] font-cinzel font-bold uppercase">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-safar-goldbright">
                                    {{ $ev->start_time ?? '19:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-cinzel text-base font-bold text-white">{{ $ev->venue_name ?? 'Kediaman / Masjid Al-Barkah' }}</h4>
                                <p class="text-xs text-safar-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap tempat pelaksanaan majelis.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-safar-gold hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-safar-card border border-safar-gold/40 shadow-md space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-safar-gold text-safar-black text-[10px] font-cinzel font-bold uppercase">
                            Walimatus Safar &amp; Doa Pelepasan
                        </span>
                        <span class="text-xs font-mono font-bold text-safar-goldbright">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-cinzel text-base font-bold text-white">{{ $couple->venue_name ?? 'Kediaman Shohibul Hajat' }}</h4>
                        <p class="text-xs text-safar-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat kediaman shohibul hajat.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-safar-gold hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Walimatus Safar') . ' - ' . $pilgrimName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Walimatus Safar Haji & Umrah ' . $pilgrimName) }}&location={{ urlencode($couple->venue_name ?? 'Kediaman') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-safar-gold to-[#B8972E] text-safar-black text-xs font-cinzel font-bold shadow-lg hover:scale-105 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- DOKUMENTASI & KENANGAN GALLERY -->
        <section class="p-6 bg-safar-card/30 border-t border-safar-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-safar-gold">Dokumentasi Silaturahmi</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Album Kenangan &amp; Manasik</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-safar-gold/30 shadow">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Dokumentasi Safar" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-safar-gold/30 shadow">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-safar-gold/30 shadow">
                        <img src="{{ $pilgrimPhoto }}" alt="Pilgrim Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- TALI ASIH & BEKAL BERKAH -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-safar-black border-t border-safar-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-safar-gold">Tanda Kasih</span>
                    <h3 class="font-cinzel text-2xl font-bold text-white">Tali Asih Musafir Mubarok</h3>
                    <p class="text-xs text-safar-muted max-w-xs mx-auto">
                        Doa restu tulus adalah bekal terbaik bagi kami. Bagi keluarga yang ingin menyalurkan tanda kasih:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-safar-card border border-safar-gold/50 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-cinzel font-bold text-safar-goldbright">💳 {{ $couple->bank_name_1 ?? 'BANK SYARIAH' }}</span>
                            <span class="text-[10px] font-cinzel font-bold px-2 py-0.5 rounded bg-safar-gold/20 text-safar-gold">Transfer</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-white block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-safar-muted">a.n. {{ $couple->bank_holder_1 ?? $pilgrimName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-safar-gold hover:bg-safar-goldbright text-safar-black text-xs font-cinzel font-bold transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-safar-card/60 border border-safar-gold/30 text-left space-y-1">
                        <span class="text-xs font-cinzel font-bold text-safar-gold flex items-center gap-1">
                            <span>📦</span> Alamat Kediaman Calon Jamaah:
                        </span>
                        <p class="text-xs text-safar-muted leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat berhasil disalin!')" class="mt-1 text-xs font-bold text-safar-gold underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- TITIP DOA DI TANAH SUCI & RSVP -->
        <section class="p-6 sm:p-8 bg-safar-card/50 border-t border-safar-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-safar-gold">Titip Doa &amp; Konfirmasi</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Titipan Doa di Depan Ka'bah / Raudhah</h3>
                <p class="text-xs text-safar-muted max-w-xs mx-auto">
                    InsyaAllah kami akan membaca dan mengaminkan doa-doa Anda di tempat-tempat mustajab di Tanah Suci.
                </p>
            </div>

            <!-- Form RSVP & Titip Doa -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-black p-5 rounded-2xl border border-safar-gold/40 shadow-lg">
                @csrf
                <input type="hidden" name="category" value="Keagamaan">
                <input type="hidden" name="theme" value="Walimatus Safar Haji &amp; Umrah Mubarok">
                
                <div>
                    <label class="block text-xs font-cinzel font-bold text-safar-gold mb-1">Nama Jamaah / Keluarga *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap..." class="w-full px-3.5 py-2.5 rounded-xl bg-safar-card border border-safar-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-safar-gold">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-safar-gold mb-1">Kehadiran Acara</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl bg-safar-card border border-safar-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-safar-gold">
                            <option value="hadir">InsyaAllah Hadir 🤲</option>
                            <option value="ragu">Masih Menyesuaikan</option>
                            <option value="tidak_hadir">Berhalangan (Titip Doa)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-safar-gold mb-1">Jumlah Hadir</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl bg-safar-card border border-safar-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-safar-gold">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-cinzel font-bold text-safar-gold mb-1">Untaian Doa / Titipan Doa di Tanah Suci</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan titipan doa yang ingin dibacakan di Multazam / Raudhah..." class="w-full px-3.5 py-2 rounded-xl bg-safar-card border border-safar-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-safar-gold"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-gradient-to-r from-safar-gold to-[#B8972E] text-safar-black font-cinzel font-bold text-xs uppercase tracking-wider shadow-md hover:scale-[1.01] transition">
                    Kirim Titipan Doa &amp; Konfirmasi
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-black border border-safar-gold/30 shadow space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-cinzel text-safar-goldbright">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-safar-gold font-bold">🕋 Titip Doa</span>
                            </div>
                            <p class="text-xs text-safar-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-black border-t border-safar-border/60 space-y-2">
            <span class="text-2xl text-safar-gold">🕋 🕊️ 🌙</span>
            <p class="font-cinzel text-sm font-bold text-safar-goldbright">
                Hajjun Mabrur wa Sa'yun Masykur
            </p>
            <p class="text-[11px] text-safar-muted">
                {{ $couple->thank_you_note ?? 'Semoga Allah SWT menerima seluruh amal ibadah kita dan membalasnya dengan haji mabrur serta ampunan yang luas.' }}
            </p>
            <div class="pt-3 text-[10px] text-safar-muted/50 border-t border-safar-border/40">
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
                cover.style.pointerEvents = 'none';
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    cover.classList.add('hidden');
                    cover.style.display = 'none';
                    document.body.classList.remove('overflow-hidden');
                }, 700);
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
        window.openInvitation = openInvitation;

        function toggleAudio() {
            const audio = document.getElementById('invitationAudio');
            const icon = document.getElementById('audioDiscIcon');
            if (!audio) return;
            if (audio.paused) {
                audio.play();
                if (icon) icon.classList.add('animate-pulse');
            } else {
                audio.pause();
                if (icon) icon.classList.remove('animate-pulse');
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
            btn.textContent = 'Mengirimkan Titip Doa...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Titipan doa Anda telah kami simpan!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Jamaah';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-black border border-safar-gold/30 shadow space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-cinzel text-safar-goldbright">${name}</b>
                            <span class="text-[10px] text-safar-gold font-bold">🕋 Titip Doa</span>
                        </div>
                        <p class="text-xs text-safar-muted leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Kirim Titipan Doa & Konfirmasi';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-black border border-safar-gold/30 shadow';
                item.innerHTML = `<img src="${url}" alt="Dokumentasi Safar" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultPilgrimPhoto = "{{ $pilgrimPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'pilgrim') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'pilgrim') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultPilgrimPhoto;
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
