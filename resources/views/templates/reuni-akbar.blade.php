<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Gala Reuni Akbar') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Malam Keakraban & Temu Kangen Gala Reuni Akbar {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Gala Reuni Akbar') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Mengikat kembali cerita lama dan merajut masa depan dalam Gala Reuni Akbar {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200' }}">

    <!-- Google Fonts: Syne & Modern Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        reuni: {
                            navy: '#0F172A',
                            card: '#1E293B',
                            cardlight: '#334155',
                            blue: '#3B82F6',
                            bluebright: '#60A5FA',
                            silver: '#E2E8F0',
                            border: '#475569',
                            text: '#F8FAFC'
                        }
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Nostalgia Shimmer Grid */
        .reuni-bg {
            background-color: #0F172A;
            background-image: radial-gradient(rgba(59, 130, 246, 0.12) 1px, transparent 1px);
            background-size: 28px 28px;
        }

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
<body class="reuni-bg text-reuni-text font-sans antialiased selection:bg-reuni-blue selection:text-white relative overflow-x-hidden overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200'
        );
        $alumniPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '18:30 WIB';

        $alumniGroup = $couple->groom_name ?? 'Ikatan Alumni Lintas Angkatan';
        $alumniFull = $couple->groom_fullname ?? $alumniGroup;
        $orderInfo = $couple->groom_birth_order ?? 'Gala Dinner & Networking Night';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-reuni-card border-2 border-reuni-blue shadow-2xl flex items-center justify-center text-reuni-bluebright hover:scale-110 transition" title="Audio Nostalgia">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 7s;">🥂</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-reuni-card border border-reuni-blue text-white text-xs font-syne rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-reuni-bluebright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (ALUMNI GALA VIP ACCESS PASS - Full Screen Mobile)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-[#0F172A] reuni-bg flex flex-col justify-between items-center px-3.5 py-3 sm:py-5 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <!-- Ambient Reuni Glows (Clipped to prevent unwanted scrollbars) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-blue-600/20 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-sky-600/15 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header Bar -->
            <header class="w-full flex flex-col items-center shrink-0">
                <span class="inline-block px-3.5 py-1 rounded-full bg-reuni-blue/20 text-reuni-bluebright text-[9px] font-syne font-bold tracking-[0.2em] uppercase border border-reuni-blue/40 mb-1">
                    🥂 Gala Reuni Akbar &amp; Temu Kangen
                </span>
                <span id="previewHeadingCover" class="font-syne text-xs text-reuni-bluebright tracking-wider uppercase block">
                    {{ $couple->event_heading ?? "GRAND REUNION & ALUMNI GALA DINNER" }}
                </span>
            </header>

            <!-- Center Showcase (Photo, Group, Date, Guest Pass) -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Polaroid Style Memory Frame -->
                <div class="relative w-20 h-24 mx-auto rounded-2xl overflow-hidden p-1 bg-gradient-to-b from-reuni-blue/40 to-reuni-card shadow-2xl my-1 shrink-0">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-black">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Reuni" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Group Name & Order -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-syne text-base sm:text-lg font-bold text-white truncate">
                        {{ $alumniGroup }}
                    </h1>
                    <p class="text-[9.5px] text-reuni-silver/80 mt-0.5">
                        {{ $orderInfo }}
                    </p>
                    <p class="text-[9px] text-slate-400 font-mono mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Kepada Yth Alumni / Tamu -->
                <div class="w-full py-1 px-3 rounded-xl bg-slate-900/90 backdrop-blur-md border border-reuni-blue/30 shadow-sm text-center mt-0.5">
                    <span class="text-[7.5px] font-syne text-reuni-bluebright uppercase tracking-wider block font-semibold">Undangan Resmi Alumni:</span>
                    <b id="previewGuestNameCover" class="text-xs sm:text-sm font-syne font-bold text-white block mt-0.5 truncate">{{ $guest->name ?? 'Sahabat Alumni' }}</b>
                </div>
            </section>

            <!-- Bottom CTA Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-1 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 sm:py-3 px-5 rounded-xl bg-gradient-to-r from-reuni-blue to-blue-700 hover:from-reuni-bluebright hover:to-reuni-blue text-white font-syne font-bold text-xs uppercase tracking-wider shadow-[0_8px_20px_rgba(37,99,235,0.4)] transition flex items-center justify-center gap-2 cursor-pointer pointer-events-auto">
                    <span>🥂</span> <span>Buka Akses Gala Reuni</span> <span>&rarr;</span>
                </button>
                <p class="text-[9px] text-slate-400 flex items-center gap-1">
                    <span class="text-reuni-bluebright">♫</span> Audio nostalgia diputar saat dokumen dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-black shadow-2xl relative border-x border-reuni-border/60">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-reuni-card via-reuni-navy to-black space-y-4 border-b border-reuni-border/60">
            <span class="text-2xl">🥂 🏛️ 🌟</span>
            
            <div class="space-y-1">
                <span class="text-xs font-syne font-bold uppercase tracking-[0.2em] text-reuni-bluebright">
                    {{ $couple->event_heading ?? "GRAND REUNION & ALUMNI GALA DINNER" }}
                </span>
                <h2 class="font-syne text-2xl sm:text-3xl font-bold text-white leading-tight">
                    Menyambung Cerita, Merajut Asa
                </h2>
            </div>

            <p class="text-xs text-reuni-silver/80 leading-relaxed max-w-xs mx-auto">
                {{ $couple->quote ?? "Waktu boleh berlalu dan jarak boleh memisahkan, namun kenangan masa-masa berjuang bersama akan selalu abadi di dalam hati." }}
            </p>

            <!-- Alumni Photo Wall Spotlight -->
            <div class="pt-3">
                <div class="relative w-44 h-52 mx-auto rounded-2xl overflow-hidden p-2 bg-gradient-to-b from-reuni-blue/40 to-reuni-card shadow-2xl">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-black">
                        <img id="previewGroomPhotoImg" src="{{ $alumniPhoto }}" alt="{{ $alumniGroup }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-syne text-xl sm:text-2xl font-bold text-white">{{ $alumniFull }}</h3>
                    <p class="text-xs font-semibold text-reuni-bluebright">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3.5 py-0.5 rounded-full bg-reuni-blue/20 text-reuni-bluebright text-[11px] font-medium border border-reuni-blue/40">
                            📍 {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-reuni-silver/70 pt-2 border-t border-reuni-border/40">
                            Panitia Pelaksana &amp; Dewan Pembina:
                            <b id="previewParentsNames" class="block font-syne font-bold text-white text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-reuni-card/60 border-b border-reuni-border/60 text-center space-y-3">
            <span class="text-[11px] font-syne font-bold uppercase tracking-[0.2em] text-reuni-bluebright block">
                ⏳ Menuju Malam Keakraban Reuni Akbar
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-black border border-reuni-blue/30 shadow-sm">
                    <b id="timerDays" class="block text-xl font-syne font-bold text-reuni-bluebright">00</b>
                    <span class="text-[9px] text-reuni-silver/70 uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-reuni-blue/30 shadow-sm">
                    <b id="timerHours" class="block text-xl font-syne font-bold text-reuni-bluebright">00</b>
                    <span class="text-[9px] text-reuni-silver/70 uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-reuni-blue/30 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-syne font-bold text-reuni-bluebright">00</b>
                    <span class="text-[9px] text-reuni-silver/70 uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-black border border-reuni-blue/30 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-syne font-bold text-reuni-bluebright">00</b>
                    <span class="text-[9px] text-reuni-silver/70 uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-syne text-reuni-silver">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- DRESS CODE & HIGHLIGHT CARD -->
        <section class="p-6 bg-reuni-card/40 border-b border-reuni-border/60">
            <div class="p-4 rounded-2xl bg-gradient-to-r from-reuni-blue/20 to-indigo-900/30 border border-reuni-blue/40 flex items-center justify-between gap-3">
                <div class="space-y-0.5">
                    <span class="text-[10px] font-syne font-bold uppercase tracking-wider text-reuni-bluebright block">Dress Code Guide</span>
                    <b class="text-sm font-syne text-white block">Smart Casual / Formal Navy &amp; Silver</b>
                    <span class="text-[11px] text-reuni-silver/80 block">Sentuhan busana elegan bertema reuni.</span>
                </div>
                <span class="text-3xl shrink-0">👔</span>
            </div>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-syne font-bold uppercase tracking-widest text-reuni-bluebright">Rundown Acara</span>
                <h3 class="font-syne text-2xl font-bold text-white">Waktu &amp; Singgasana Reuni</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-reuni-card border border-reuni-blue/40 shadow-md space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-reuni-blue text-white text-[10px] font-syne font-bold uppercase">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-reuni-bluebright">
                                    {{ $ev->start_time ?? '18:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-syne text-base font-bold text-white">{{ $ev->venue_name ?? 'Grand Ballroom' }}</h4>
                                <p class="text-xs text-reuni-silver/80 mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap tempat pelaksanaan reuni.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-reuni-bluebright hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-reuni-card border border-reuni-blue/40 shadow-md space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-reuni-blue text-white text-[10px] font-syne font-bold uppercase">
                            Gala Dinner &amp; Malam Keakraban
                        </span>
                        <span class="text-xs font-mono font-bold text-reuni-bluebright">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-syne text-base font-bold text-white">{{ $couple->venue_name ?? 'Grand Ballroom Hotel' }}</h4>
                        <p class="text-xs text-reuni-silver/80 mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat venue acara reuni.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-reuni-bluebright hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Gala Reuni') . ' - ' . $alumniGroup) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Gala Reuni Akbar ' . $alumniGroup) }}&location={{ urlencode($couple->venue_name ?? 'Ballroom') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-reuni-blue to-blue-700 text-white text-xs font-syne font-bold shadow-lg hover:scale-105 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- NOSTALGIA PHOTO WALL GALLERY -->
        <section class="p-6 bg-reuni-card/30 border-t border-reuni-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-syne font-bold uppercase tracking-widest text-reuni-bluebright">Nostalgia Wall</span>
                <h3 class="font-syne text-2xl font-bold text-white">Album Kenangan Sahabat</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-reuni-blue/30 shadow">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Reuni" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-reuni-blue/30 shadow">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-black border border-reuni-blue/30 shadow">
                        <img src="{{ $alumniPhoto }}" alt="Alumni Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DANA KONTRIBUSI / KAS REUNI -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-black border-t border-reuni-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-syne font-bold uppercase tracking-widest text-reuni-bluebright">Kas &amp; Kontribusi Alumni</span>
                    <h3 class="font-syne text-2xl font-bold text-white">Investasi Tiket &amp; Donasi Kas</h3>
                    <p class="text-xs text-reuni-silver/80 max-w-xs mx-auto">
                        Fasilitas kontribusi kehadiran atau iuran kas alumni secara cashless:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-reuni-card border border-reuni-blue/50 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-syne font-bold text-reuni-bluebright">💳 {{ $couple->bank_name_1 ?? 'BANK' }}</span>
                            <span class="text-[10px] font-syne font-bold px-2 py-0.5 rounded bg-reuni-blue/20 text-reuni-bluebright">Rekening Resmi</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-white block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-reuni-silver/70">a.n. {{ $couple->bank_holder_1 ?? $alumniGroup }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening kas alumni berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-reuni-blue hover:bg-blue-600 text-white text-xs font-syne font-bold transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-reuni-card/60 border border-reuni-blue/30 text-left space-y-1">
                        <span class="text-xs font-syne font-bold text-reuni-bluebright flex items-center gap-1">
                            <span>🏢</span> Sekretariat Ikatan Alumni:
                        </span>
                        <p class="text-xs text-reuni-silver/80 leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat sekretariat berhasil disalin!')" class="mt-1 text-xs font-bold text-reuni-bluebright underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & BUKU KENANGAN ALUMNI -->
        <section class="p-6 sm:p-8 bg-reuni-card/50 border-t border-reuni-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-syne font-bold uppercase tracking-widest text-reuni-bluebright">Buku Tamu Reuni</span>
                <h3 class="font-syne text-2xl font-bold text-white">Konfirmasi Kehadiran Alumni</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-black p-5 rounded-2xl border border-reuni-blue/40 shadow-lg">
                @csrf
                <input type="hidden" name="category" value="Acara Formal">
                <input type="hidden" name="theme" value="Gala Reuni Akbar &amp; Alumni Gathering">
                
                <div>
                    <label class="block text-xs font-syne font-bold text-reuni-bluebright mb-1">Nama Lengkap &amp; Angkatan *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama & Angkatan (Contoh: Budi - Angkatan 2015)..." class="w-full px-3.5 py-2.5 rounded-xl bg-reuni-card border border-reuni-blue/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-reuni-blue">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-syne font-bold text-reuni-bluebright mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl bg-reuni-card border border-reuni-blue/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-reuni-blue font-syne">
                            <option value="hadir">Pastikan Hadir 🥂</option>
                            <option value="ragu">Masih Menyesuaikan</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-syne font-bold text-reuni-bluebright mb-1">Jumlah</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl bg-reuni-card border border-reuni-blue/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-reuni-blue font-syne">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang (+Pasangan)</option>
                            <option value="3">3+ Orang (Keluarga)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-syne font-bold text-reuni-bluebright mb-1">Pesan Nostalgia &amp; Salam untuk Sahabat</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan pesan nostalgia atau kenangan seru..." class="w-full px-3.5 py-2 rounded-xl bg-reuni-card border border-reuni-blue/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-reuni-blue"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-gradient-to-r from-reuni-blue to-blue-700 text-white font-syne font-bold text-xs uppercase tracking-wider shadow-md hover:scale-[1.01] transition">
                    Konfirmasi Kehadiran Alumni
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-black border border-reuni-blue/30 shadow space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-syne text-reuni-bluebright">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-reuni-blue font-bold">🥂 Hadir</span>
                            </div>
                            <p class="text-xs text-reuni-silver/80 leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-black border-t border-reuni-border/60 space-y-2">
            <span class="text-2xl text-reuni-bluebright">🥂 🌟 🏛️</span>
            <p class="font-syne text-sm font-bold text-white">
                Sampai Jumpa di Panggung Reuni Akbar!
            </p>
            <p class="text-[11px] text-reuni-silver/70">
                {{ $couple->thank_you_note ?? 'Terima kasih atas semangat kebersamaan dan ukhuwah alumni yang terus menyala.' }}
            </p>
            <div class="pt-3 text-[10px] text-reuni-silver/40 border-t border-reuni-border/40 font-syne">
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
            btn.textContent = 'Memproses...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Konfirmasi kehadiran alumni berhasil dikirim!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Alumni';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-black border border-reuni-blue/30 shadow space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-syne text-reuni-bluebright">${name}</b>
                            <span class="text-[10px] text-reuni-blue font-bold">🥂 Hadir</span>
                        </div>
                        <p class="text-xs text-reuni-silver/80 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas konfirmasi kehadiran Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = 'Konfirmasi Kehadiran Alumni';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-black border border-reuni-blue/30 shadow';
                item.innerHTML = `<img src="${url}" alt="Momen Reuni" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultAlumniPhoto = "{{ $alumniPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'alumni') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'alumni') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultAlumniPhoto;
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
