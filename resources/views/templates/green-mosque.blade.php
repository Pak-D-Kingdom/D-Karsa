<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Syiar & Pengajian Akbar') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Syiar Islam, Pengajian Akbar & Silaturahmi {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Syiar & Pengajian Akbar') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan mengharap ridho dan rahmat Allah SWT, kami mengundang kaum muslimin & muslimat dalam acara {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200' }}">

    <!-- Google Fonts: Elegant Islamic Serif & Modern Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mosque: {
                            deep: '#0D281C',
                            darker: '#081D14',
                            card: '#153B2A',
                            cardlight: '#1D4D38',
                            gold: '#E5C07B',
                            goldbright: '#FAD896',
                            border: '#047857',
                            borderlight: '#10B981',
                            text: '#F0FDF4',
                            muted: '#A7F3D0'
                        }
                    },
                    fontFamily: {
                        amiri: ['Amiri', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Subtle Islamic Geometrics */
        .mosque-pattern {
            background-color: #081D14;
            background-image: radial-gradient(rgba(229, 192, 123, 0.12) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* Lantern Glow */
        @keyframes lanternGlow {
            0%, 100% { opacity: 0.6; transform: scale(0.98); }
            50% { opacity: 1; transform: scale(1.04); }
        }
        .lantern-pulse { animation: lanternGlow 3.5s ease-in-out infinite; }

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
<body class="mosque-pattern text-mosque-text font-sans antialiased selection:bg-mosque-gold selection:text-mosque-darker relative overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200'
        );
        $personPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/islamic-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '19:30 WIB';

        $hostName = $couple->groom_name ?? 'Majelis Ta\'lim & Jamaah Masjid';
        $hostFull = $couple->groom_fullname ?? $hostName;
        $orderInfo = $couple->groom_birth_order ?? 'Syiar & Silaturahmi Ukhuwah';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-mosque-card border-2 border-mosque-gold shadow-2xl flex items-center justify-center text-mosque-goldbright hover:scale-110 transition" title="Audio Sholawat & Doa">
            <span id="audioDiscIcon" class="text-base animate-pulse">🕌</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-mosque-card border border-mosque-gold text-white text-xs font-serif rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-mosque-goldbright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: GREEN MOSQUE DOME (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-[#064E3B] mosque-pattern flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-mosque-text select-none">
        <!-- Ambient Green Shimmer Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-mosque-gold/15 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-emerald-950/40 blur-3xl"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/75"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="lantern-pulse text-2xl mb-1 text-mosque-gold">
                    🕌
                </div>
                <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full bg-mosque-gold/20 text-mosque-goldbright text-[8.5px] font-bold tracking-wider uppercase border border-mosque-gold/40">
                    {{ $couple->event_heading ?? "🌿 Undangan Majelis & Syiar Islam" }}
                </span>
                <span class="font-amiri text-sm text-mosque-gold block mt-1">السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Islamic Archway Dome Photo Frame -->
                <div class="relative w-20 h-24 mx-auto rounded-t-full rounded-b-xl overflow-hidden p-1 bg-gradient-to-b from-mosque-gold via-mosque-border to-mosque-card shadow-xl my-1 shrink-0">
                    <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-mosque-darker">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Mosque" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Host Name & Subtitle -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewHostNameCover" class="font-serif text-lg sm:text-xl font-bold text-white tracking-wide truncate">
                        {{ $hostName }}
                    </h1>
                    <p class="text-[9.5px] text-mosque-muted mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu Jamaah -->
                <div class="w-full py-1 px-3 rounded-xl bg-mosque-darker/90 backdrop-blur-md border border-mosque-gold/30 text-center shadow-md mt-0.5">
                    <span class="text-[7.5px] text-mosque-muted uppercase tracking-wider block font-medium">KEPADA YTH. BAPAK/IBU/JAMAAH:</span>
                    <b id="previewGuestNameCover" class="text-xs font-serif font-bold text-mosque-goldbright block mt-0.5 truncate">{{ $guest->name ?? 'Jamaah Tercinta' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-mosque-gold to-[#C59B4B] hover:brightness-110 active:scale-[0.98] text-mosque-darker font-serif font-bold text-xs uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🤲</span> <span>Buka Lembaran Silaturahmi</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-mosque-muted flex items-center gap-1">
                    <span class="text-mosque-gold">♫</span> Audio Sholawat & Doa diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-mosque-darker shadow-2xl relative border-x border-mosque-border/60">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-mosque-card via-mosque-deep to-mosque-darker space-y-4 border-b border-mosque-border/60">
            <span class="text-2xl text-mosque-gold">🕌 🌙 🌿</span>
            
            <div class="space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-mosque-gold">
                    {{ $couple->event_heading ?? "MAJELIS PENGAJIAN & TASYAKURAN" }}
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-white leading-tight">
                    Syiar &amp; Ukhuwah Islamiyah
                </h2>
            </div>

            <!-- Ayat Al-Qur'an Card -->
            <div class="p-4 rounded-2xl bg-mosque-darker/60 border border-mosque-gold/30 space-y-2">
                <p class="font-amiri text-lg text-mosque-goldbright leading-relaxed" dir="rtl">
                    يٰٓاَيُّهَا النَّاسُ اِنَّا خَلَقْنٰكُمْ مِّنْ ذَكَرٍ وَّاُنْثٰى وَجَعَلْنٰكُمْ شُعُوْبًا وَّقَبَاۤىِٕلَ لِتَعَارَفُوْا
                </p>
                <p class="text-[11px] text-mosque-muted italic leading-relaxed">
                    "Wahai manusia! Sungguh, Kami telah menciptakan kamu dari seorang laki-laki dan seorang perempuan, kemudian Kami jadikan kamu berbangsa-bangsa dan bersuku-suku agar kamu saling mengenal." (QS. Al-Hujurat: 13)
                </p>
            </div>

            <!-- Host Spotlight Portrait -->
            <div class="pt-3">
                <div class="relative w-40 h-52 mx-auto rounded-t-full rounded-b-2xl overflow-hidden p-1.5 bg-gradient-to-b from-mosque-gold via-mosque-border to-mosque-card shadow-xl">
                    <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden bg-mosque-darker">
                        <img id="previewGroomPhotoImg" src="{{ $personPhoto }}" alt="{{ $hostName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-serif text-2xl font-bold text-mosque-goldbright">{{ $hostFull }}</h3>
                    <p class="text-xs font-medium text-mosque-gold">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-mosque-gold/15 text-mosque-gold text-[10px] font-semibold border border-mosque-gold/30">
                            📍 {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-mosque-muted pt-2 border-t border-mosque-border/40">
                            Penyelenggara / Tuan Rumah:
                            <b id="previewParentsNames" class="block font-serif font-bold text-mosque-gold text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-mosque-card/50 border-b border-mosque-border/60 text-center space-y-3">
            <span class="text-[11px] font-serif font-bold uppercase tracking-wider text-mosque-gold block">
                ⏳ Menuju Waktu Majelis Dimulai
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-mosque-darker border border-mosque-gold/30 shadow-sm">
                    <b id="timerDays" class="block text-xl font-serif font-bold text-mosque-goldbright">00</b>
                    <span class="text-[9px] text-mosque-muted uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-mosque-darker border border-mosque-gold/30 shadow-sm">
                    <b id="timerHours" class="block text-xl font-serif font-bold text-mosque-goldbright">00</b>
                    <span class="text-[9px] text-mosque-muted uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-mosque-darker border border-mosque-gold/30 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-serif font-bold text-mosque-goldbright">00</b>
                    <span class="text-[9px] text-mosque-muted uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-mosque-darker border border-mosque-gold/30 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-serif font-bold text-mosque-goldbright">00</b>
                    <span class="text-[9px] text-mosque-muted uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-serif text-mosque-muted">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT SCHEDULE & DETAILS -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-mosque-gold">Rangkaian Acara</span>
                <h3 class="font-serif text-2xl font-bold text-white">Waktu &amp; Tempat Pelaksanaan</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-mosque-card border border-mosque-gold/40 shadow-md space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-mosque-gold text-mosque-darker text-[10px] font-bold">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-mosque-goldbright">
                                    {{ $ev->start_time ?? '19:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-serif text-base font-bold text-white">{{ $ev->venue_name ?? 'Masjid Jami\' / Aula Majelis' }}</h4>
                                <p class="text-xs text-mosque-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap tempat pelaksanaan majelis.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-mosque-gold hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-mosque-card border border-mosque-gold/40 shadow-md space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-mosque-gold text-mosque-darker text-[10px] font-bold">
                            Tausiyah, Dzikir &amp; Doa Bersama
                        </span>
                        <span class="text-xs font-mono font-bold text-mosque-goldbright">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-serif text-base font-bold text-white">{{ $couple->venue_name ?? 'Masjid / Aula Majelis' }}</h4>
                        <p class="text-xs text-mosque-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat tempat pelaksanaan majelis.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-mosque-gold hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Majelis Pengajian') . ' - ' . $hostName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Majelis Syiar & Pengajian ' . $hostName) }}&location={{ urlencode($couple->venue_name ?? 'Masjid') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-mosque-gold to-[#C59B4B] text-mosque-darker text-xs font-serif font-bold shadow-lg hover:scale-105 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- DOKUMENTASI KEGIATAN GALLERY -->
        <section class="p-6 bg-mosque-card/30 border-t border-mosque-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-mosque-gold">Dokumentasi Majelis</span>
                <h3 class="font-serif text-2xl font-bold text-white">Potret Syiar &amp; Ukhuwah</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-mosque-darker border border-mosque-gold/30 shadow">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Dokumentasi Majelis" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-mosque-darker border border-mosque-gold/30 shadow">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-mosque-darker border border-mosque-gold/30 shadow">
                        <img src="{{ $personPhoto }}" alt="Person Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- INFAQ & SEDEKAH JARIYAH -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-mosque-darker border-t border-mosque-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-widest text-mosque-gold">Infaq &amp; Sedekah</span>
                    <h3 class="font-serif text-2xl font-bold text-white">Tali Asih Syiar Ukhuwah</h3>
                    <p class="text-xs text-mosque-muted max-w-xs mx-auto">
                        Bagi Bapak/Ibu/Jamaah yang berkehendak menyalurkan infaq / sedekah jariyah secara digital:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-mosque-card border border-mosque-gold/50 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-serif font-bold text-mosque-goldbright">💳 {{ $couple->bank_name_1 ?? 'BANK SYARIAH' }}</span>
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded bg-mosque-gold/20 text-mosque-gold">Infaq / Sedekah</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-white block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-mosque-muted">a.n. {{ $couple->bank_holder_1 ?? $hostName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening infaq berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-mosque-gold hover:bg-mosque-goldbright text-mosque-darker text-xs font-serif font-bold transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-mosque-card/50 border border-mosque-gold/30 text-left space-y-1">
                        <span class="text-xs font-serif font-bold text-mosque-gold flex items-center gap-1">
                            <span>📦</span> Alamat Sekretariat / Posko Majelis:
                        </span>
                        <p class="text-xs text-mosque-muted leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat posko berhasil disalin!')" class="mt-1 text-xs font-bold text-mosque-gold underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & DOA JAMAAH -->
        <section class="p-6 sm:p-8 bg-mosque-card/40 border-t border-mosque-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-mosque-gold">Buku Tamu Jamaah</span>
                <h3 class="font-serif text-2xl font-bold text-white">Konfirmasi Kehadiran &amp; Doa</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-mosque-darker p-5 rounded-2xl border border-mosque-gold/40 shadow-lg">
                @csrf
                <input type="hidden" name="category" value="Keagamaan">
                <input type="hidden" name="theme" value="Green Mosque Harmony Syiar &amp; Pengajian">
                
                <div>
                    <label class="block text-xs font-serif font-bold text-mosque-gold mb-1">Nama Jamaah / Keluarga *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap..." class="w-full px-3.5 py-2.5 rounded-xl bg-mosque-card border border-mosque-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-mosque-gold">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-serif font-bold text-mosque-gold mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl bg-mosque-card border border-mosque-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-mosque-gold">
                            <option value="hadir">InsyaAllah Hadir 🕌</option>
                            <option value="ragu">Masih Menyesuaikan</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-serif font-bold text-mosque-gold mb-1">Jumlah Jamaah</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl bg-mosque-card border border-mosque-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-mosque-gold">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang (Rombongan)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-serif font-bold text-mosque-gold mb-1">Doa Kebaikan &amp; Silaturahmi</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan untaian doa dan salam ukhuwah..." class="w-full px-3.5 py-2 rounded-xl bg-mosque-card border border-mosque-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-mosque-gold"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-gradient-to-r from-mosque-gold to-[#C59B4B] text-mosque-darker font-serif font-bold text-xs uppercase tracking-wider shadow-md hover:scale-[1.01] transition">
                    Kirim Doa &amp; Konfirmasi
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-mosque-darker border border-mosque-gold/30 shadow space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-serif text-mosque-goldbright">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-mosque-gold font-bold">🌿 Hadir</span>
                            </div>
                            <p class="text-xs text-mosque-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-mosque-darker border-t border-mosque-border/60 space-y-2">
            <span class="text-2xl text-mosque-gold">🕌 🌿 🌙</span>
            <p class="font-serif text-sm font-bold text-mosque-goldbright">
                Jazaakumullah Khairan Katsiran
            </p>
            <p class="text-[11px] text-mosque-muted">
                {{ $couple->thank_you_note ?? 'Semoga Allah SWT senantiasa melimpahkan hidayah dan rahmat-Nya kepada kita semua.' }}
            </p>
            <div class="pt-3 text-[10px] text-mosque-muted/60 border-t border-mosque-border/40">
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
            btn.textContent = 'Mengirimkan Doa...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Doa dan konfirmasi kehadiran Anda telah tercatat!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Jamaah';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-mosque-darker border border-mosque-gold/30 shadow space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-serif text-mosque-goldbright">${name}</b>
                            <span class="text-[10px] text-mosque-gold font-bold">🌿 Hadir</span>
                        </div>
                        <p class="text-xs text-mosque-muted leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Kirim Doa & Konfirmasi';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-mosque-darker border border-mosque-gold/30 shadow';
                item.innerHTML = `<img src="${url}" alt="Dokumentasi Majelis" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultPersonPhoto = "{{ $personPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'host') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'host') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultPersonPhoto;
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
