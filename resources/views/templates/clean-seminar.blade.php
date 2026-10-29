<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Professional Workshop & Seminar') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Resmi Workshop Profesional & Seminar {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Professional Workshop & Seminar') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Kami mengundang Bapak/Ibu pimpinan instansi & praktisi untuk menghadiri sesi workshop & seminar {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200' }}">

    <!-- Google Fonts: Technical Grotesk & Clean Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tech: {
                            bg: '#F8FAFC',
                            card: '#FFFFFF',
                            slate: '#0F172A',
                            muted: '#64748B',
                            border: '#E2E8F0',
                            blue: '#0284C7',
                            cyan: '#06B6D4',
                            bluelight: '#F0F9FF'
                        }
                    },
                    fontFamily: {
                        mono: ['"Space Grotesk"', 'monospace'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Blueprint Grid Accent */
        .tech-grid {
            background-color: #F8FAFC;
            background-image: linear-gradient(rgba(2, 132, 199, 0.05) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(2, 132, 199, 0.05) 1px, transparent 1px);
            background-size: 24px 24px;
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
<body class="tech-grid text-tech-slate font-sans antialiased selection:bg-tech-blue selection:text-white relative overflow-x-hidden overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200'
        );
        $speakerPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB';

        $eventHost = $couple->groom_name ?? 'Inovasi Bisnis Nusantara';
        $eventFull = $couple->groom_fullname ?? $eventHost;
        $orderInfo = $couple->groom_birth_order ?? 'Seminar & Workshop Eksekutif';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border border-tech-border shadow-xl flex items-center justify-center text-tech-blue hover:scale-105 transition" title="Audio Background">
            <span id="audioDiscIcon" class="text-base animate-pulse">📊</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-tech-slate text-white text-xs font-mono rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-tech-cyan">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (DELEGATE ACCREDITATION PASS - Full Screen Mobile)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-[#0F172A] flex flex-col justify-between items-center px-3.5 py-3 sm:py-5 transition-all duration-700 ease-in-out text-slate-200 select-none">
        <!-- Ambient Tech Glows (Clipped to prevent unwanted scrollbars) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-blue-600/20 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-cyan-600/15 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header Bar -->
            <header class="w-full flex flex-col items-center shrink-0">
                <div class="w-full flex items-center justify-between pb-1.5 border-b border-white/10 text-[8.5px] font-mono tracking-widest text-slate-400 uppercase">
                    <span>SEMINAR &amp; WORKSHOP</span>
                    <span>PASS: #SEM-{{ strtoupper(substr(md5($eventHost), 0, 4)) }}</span>
                </div>
                <div class="mt-1 flex flex-col items-center text-center">
                    <span id="previewHeadingCover" class="inline-block px-2.5 py-0.5 rounded-full text-[8.5px] font-mono font-bold tracking-[0.2em] uppercase bg-tech-blue/20 text-sky-400 border border-tech-blue/40">
                        {{ $couple->event_heading ?? "PROFESSIONAL EXECUTIVE WORKSHOP" }}
                    </span>
                </div>
            </header>

            <!-- Center Showcase (Photo, Host, Date, Guest Pass) -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Cover Picture Frame -->
                <div class="relative w-20 h-24 mx-auto rounded-2xl overflow-hidden p-1 bg-slate-800/80 border border-tech-blue/40 shadow-xl my-1 shrink-0">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-slate-900">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Seminar Cover" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Host & Order -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewGroomNameCover" class="font-mono text-base sm:text-lg font-bold text-white truncate">
                        {{ $eventHost }}
                    </h1>
                    <p class="text-[9.5px] text-sky-400 font-mono mt-0.5">
                        {{ $orderInfo }}
                    </p>
                    <p class="text-[9px] text-slate-400 font-mono mt-0.5">
                        📅 {{ $eventDateFormatted }}
                    </p>
                </div>

                <!-- Kepada Yth Peserta Delegasi -->
                <div class="w-full py-1 px-3 rounded-xl bg-slate-800/90 backdrop-blur-md border border-white/10 shadow-sm text-center mt-0.5">
                    <span class="text-[7.5px] font-mono text-slate-400 block uppercase tracking-wider font-semibold">Undangan Resmi Delegasi:</span>
                    <b id="previewGuestNameCover" class="text-xs sm:text-sm font-mono font-bold text-white block mt-0.5 truncate">{{ $guest->name ?? 'Mitra Delegasi / Peserta' }}</b>
                </div>
            </section>

            <!-- Bottom CTA Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-1 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 sm:py-3 px-5 rounded-xl bg-tech-blue hover:bg-sky-600 text-white font-mono font-bold text-xs uppercase tracking-wider shadow-[0_8px_20px_rgba(37,99,235,0.4)] transition flex items-center justify-center gap-2 cursor-pointer pointer-events-auto">
                    <span>📊</span> <span>Buka Akses Seminar Pass</span> <span>&rarr;</span>
                </button>
                <p class="text-[9px] font-mono text-slate-400 flex items-center gap-1">
                    <span class="text-sky-400">♫</span> Audio latar diputar saat dokumen dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-white shadow-2xl relative border-x border-tech-border">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-tech-bluelight/70 to-white space-y-4 border-b border-tech-border">
            <span class="text-2xl">📊 🏛️ 💡</span>
            
            <div class="space-y-1">
                <span class="text-xs font-mono font-bold uppercase tracking-widest text-tech-blue">
                    {{ $couple->event_heading ?? "PROFESSIONAL SEMINAR & WORKSHOP" }}
                </span>
                <h2 class="font-mono text-2xl sm:text-3xl font-bold text-tech-slate leading-tight">
                    Transformasi &amp; Wawasan Masa Depan
                </h2>
            </div>

            <p class="text-xs text-tech-muted leading-relaxed max-w-xs mx-auto">
                {{ $couple->quote ?? "Menghadirkan narasumber ahli, diskusi strategis, serta networking antarpelaku industri untuk mengakselerasi pertumbuhan." }}
            </p>

            <!-- Keynote / Host Spotlight -->
            <div class="pt-2">
                <div class="relative w-40 h-48 mx-auto rounded-2xl overflow-hidden p-1.5 bg-gradient-to-b from-tech-blue/30 to-tech-border shadow-xl">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-tech-bg">
                        <img id="previewGroomPhotoImg" src="{{ $speakerPhoto }}" alt="{{ $eventHost }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-mono text-xl font-bold text-tech-slate">{{ $eventFull }}</h3>
                    <p class="text-xs font-semibold text-tech-blue">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-tech-bluelight text-tech-blue text-[11px] font-medium border border-blue-200">
                            🏢 {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-tech-muted pt-2 border-t border-tech-border/60">
                            Organized by:
                            <b id="previewParentsNames" class="block font-mono font-bold text-tech-slate text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-tech-bg border-b border-tech-border text-center space-y-3">
            <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-tech-blue block">
                ⏳ Hitung Mundur Sesi Dimulai
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-white border border-tech-border shadow-xs">
                    <b id="timerDays" class="block text-xl font-mono font-bold text-tech-slate">00</b>
                    <span class="text-[9px] text-tech-muted uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-tech-border shadow-xs">
                    <b id="timerHours" class="block text-xl font-mono font-bold text-tech-slate">00</b>
                    <span class="text-[9px] text-tech-muted uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-tech-border shadow-xs">
                    <b id="timerMinutes" class="block text-xl font-mono font-bold text-tech-slate">00</b>
                    <span class="text-[9px] text-tech-muted uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-tech-border shadow-xs">
                    <b id="timerSeconds" class="block text-xl font-mono font-bold text-tech-slate">00</b>
                    <span class="text-[9px] text-tech-muted uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-mono text-tech-slate">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- AGENDA & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-tech-blue">Rundown Sesi</span>
                <h3 class="font-mono text-2xl font-bold text-tech-slate">Jadwal &amp; Lokasi Seminar</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-tech-bg border border-tech-border space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-tech-slate text-white text-[10px] font-mono font-bold uppercase">
                                    {{ $ev->title ?? 'Session ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-tech-blue">
                                    {{ $ev->start_time ?? '09:00' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-mono text-base font-bold text-tech-slate">{{ $ev->venue_name ?? 'Convention Hall' }}</h4>
                                <p class="text-xs text-tech-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap tempat pelaksanaan seminar.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-tech-blue hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-tech-bg border border-tech-border space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-tech-slate text-white text-[10px] font-mono font-bold uppercase">
                            Keynote Seminar &amp; Workshop Session
                        </span>
                        <span class="text-xs font-mono font-bold text-tech-blue">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-mono text-base font-bold text-tech-slate">{{ $couple->venue_name ?? 'Convention Center' }}</h4>
                        <p class="text-xs text-tech-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat lokasi seminar.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-tech-blue hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-1">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Seminar') . ' - ' . $eventHost) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Workshop & Seminar ' . $eventHost) }}&location={{ urlencode($couple->venue_name ?? 'Convention Hall') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-tech-blue text-white text-xs font-mono font-medium shadow hover:bg-sky-600 transition">
                    <span>📅</span> <span>Simpan Jadwal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- DOKUMENTASI & MEDIA GALLERY -->
        <section class="p-6 bg-tech-bg border-t border-tech-border space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-tech-blue">Dokumentasi</span>
                <h3 class="font-mono text-2xl font-bold text-tech-slate">Galeri Kegiatan &amp; Mitra</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-tech-border">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Kegiatan Seminar" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-tech-border">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-tech-border">
                        <img src="{{ $speakerPhoto }}" alt="Speaker Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- KONTRIBUSI REGISTRASI / REKENING KEGIATAN -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-white border-t border-tech-border space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-tech-blue">Registrasi / Rekening</span>
                    <h3 class="font-mono text-2xl font-bold text-tech-slate">Informasi Tiket &amp; Partisipasi</h3>
                    <p class="text-xs text-tech-muted max-w-xs mx-auto">
                        Fasilitas penyelesaian investasi tiket atau donasi kemitraan secara cashless:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-tech-bluelight border border-blue-200 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold text-tech-blue">💳 {{ $couple->bank_name_1 ?? 'BANK' }}</span>
                            <span class="text-[10px] font-mono font-semibold px-2 py-0.5 rounded bg-blue-100 text-blue-900">Official Account</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-tech-slate block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-tech-muted">a.n. {{ $couple->bank_holder_1 ?? $eventHost }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-tech-blue text-white text-xs font-mono font-medium hover:bg-sky-600 transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-tech-bg border border-tech-border text-left space-y-1">
                        <span class="text-xs font-mono font-bold text-tech-slate flex items-center gap-1">
                            <span>🏢</span> Alamat Sekretariat Panitia:
                        </span>
                        <p class="text-xs text-tech-muted leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat berhasil disalin!')" class="mt-1 text-xs font-bold text-tech-blue underline">
                            Salin Alamat
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & KONFIRMASI DELEGASI -->
        <section class="p-6 sm:p-8 bg-tech-bg border-t border-tech-border space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-tech-blue">Konfirmasi Delegasi</span>
                <h3 class="font-mono text-2xl font-bold text-tech-slate">Registrasi Kehadiran Peserta</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-white p-5 rounded-2xl border border-tech-border shadow-xs">
                @csrf
                <input type="hidden" name="category" value="Acara Formal">
                <input type="hidden" name="theme" value="Clean Workshop &amp; Seminar Profesional">
                
                <div>
                    <label class="block text-xs font-mono font-bold text-tech-slate mb-1">Nama Lengkap &amp; Instansi *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Peserta / Instansi..." class="w-full px-3.5 py-2.5 rounded-xl border border-tech-border text-xs focus:outline-none focus:ring-2 focus:ring-tech-blue">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-mono font-bold text-tech-slate mb-1">Status Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl border border-tech-border text-xs focus:outline-none focus:ring-2 focus:ring-tech-blue bg-white font-mono">
                            <option value="hadir">Konfirmasi Hadir 📊</option>
                            <option value="ragu">Tentatif</option>
                            <option value="tidak_hadir">Berhalangan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-mono font-bold text-tech-slate mb-1">Jumlah Peserta</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl border border-tech-border text-xs focus:outline-none focus:ring-2 focus:ring-tech-blue bg-white font-mono">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang (Delegasi)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-tech-slate mb-1">Catatan / Topik Minat Diskusi</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan catatan atau topik pertanyaan untuk narasumber..." class="w-full px-3.5 py-2 rounded-xl border border-tech-border text-xs focus:outline-none focus:ring-2 focus:ring-tech-blue"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-tech-blue hover:bg-sky-600 text-white font-mono font-bold text-xs uppercase tracking-wider shadow-md transition">
                    Konfirmasi Kehadiran Seminar
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-white border border-tech-border shadow-xs space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-mono text-tech-slate">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] font-mono text-tech-blue font-semibold">✓ Konfirmasi</span>
                            </div>
                            <p class="text-xs text-tech-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-tech-bg border-t border-tech-border space-y-2">
            <span class="text-xl">📊 🏛️ 💡</span>
            <p class="font-mono text-sm font-bold text-tech-slate">
                Terima kasih atas partisipasi aktif Anda!
            </p>
            <p class="text-[11px] text-tech-muted">
                {{ $couple->thank_you_note ?? 'Sampai jumpa di hari pelaksanaan seminar & workshop.' }}
            </p>
            <div class="pt-3 text-[10px] text-tech-muted border-t border-tech-border/60 font-mono">
                Powered by <b>D'Karsa Digital Invitation</b>
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
            btn.textContent = 'Memproses...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Konfirmasi delegasi Anda berhasil dikirim!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Peserta';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-white border border-tech-border shadow-xs space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-mono text-tech-slate">${name}</b>
                            <span class="text-[10px] font-mono text-tech-blue font-semibold">✓ Konfirmasi</span>
                        </div>
                        <p class="text-xs text-tech-muted leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Konfirmasi Kehadiran Seminar';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-tech-border';
                item.innerHTML = `<img src="${url}" alt="Dokumentasi Seminar" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultSpeakerPhoto = "{{ $speakerPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'speaker') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'speaker') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultSpeakerPhoto;
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
