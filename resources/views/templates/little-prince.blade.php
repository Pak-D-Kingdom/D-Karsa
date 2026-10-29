<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Tasyakuran Aqiqah') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Undangan Tasyakuran Kelahiran & Aqiqah Buah Hati {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Tasyakuran Aqiqah') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan penuh rasa syukur kami mengundang kehadiran Bapak/Ibu dalam tasyakuran aqiqah buah hati kami {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200' }}">

    <!-- Google Fonts: Nordic Soft Serif & Warm Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Alex+Brush&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nordic: {
                            bg: '#FAF6F0',
                            card: '#FFFFFF',
                            amber: '#D97706',
                            amberlight: '#FEF3C7',
                            sage: '#52796F',
                            text: '#2D3142',
                            muted: '#6C757D',
                            border: '#E8E2D8'
                        }
                    },
                    fontFamily: {
                        serif: ['Lora', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        script: ['Alex Brush', 'cursive']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Gentle Star Twinkle */
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1.1); }
        }
        .star-twinkle { animation: twinkle 3s ease-in-out infinite; }

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
<body class="bg-[#FAF6F0] text-nordic-text font-sans antialiased selection:bg-nordic-amber selection:text-white relative overflow-hidden">

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

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB');

        $babyName = $couple->groom_name ?? 'Muhammad Al-Fatih';
        $babyFull = $couple->groom_fullname ?? $babyName;
        $babyNick = $couple->groom_nickname ?? 'Fatih';
        $orderInfo = $couple->groom_birth_order ?? 'Putra Pertama Tercinta';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border border-nordic-amber/40 shadow-xl flex items-center justify-center text-nordic-amber hover:scale-105 transition" title="Alunan Doa & Musik">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 8s;">🌙</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-nordic-text text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-nordic-amber">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: WARM NORDIC EMBRACE (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-gradient-to-b from-[#F5EFE6] via-[#FAF6F0] to-[#EAE0D5] flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-nordic-text select-none">
        <!-- Ambient Nordic Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-nordic-amber/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-amber-900/10 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <span id="previewHeadingCover" class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-nordic-amber/10 text-nordic-amber text-[9px] font-bold tracking-wider uppercase mb-0.5">
                    {{ $couple->event_heading ?? "⭐ Tasyakuran Kelahiran & Aqiqah" }}
                </span>
                <span class="font-script text-xl text-nordic-amber block leading-tight">Welcome Little Angel</span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Baby Portrait Frame (Nordic Arched Dome) -->
                <div class="relative w-20 h-24 mx-auto rounded-t-full rounded-b-xl overflow-hidden p-1 bg-gradient-to-b from-nordic-amber/30 to-nordic-border shadow-md my-1 shrink-0">
                    <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-nordic-bg">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Baby Cover" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Baby's Name & Subtitle -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewBabyNameCover" class="font-serif text-lg sm:text-xl font-bold text-nordic-text truncate">
                        {{ $babyName }}
                    </h1>
                    <p class="text-[9.5px] text-nordic-muted mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu -->
                <div class="w-full py-1 px-3 rounded-xl bg-white/90 backdrop-blur-md border border-nordic-border/70 text-center shadow-xs mt-0.5">
                    <span class="text-[7.5px] text-nordic-muted uppercase tracking-wider block font-medium">KEPADA YTH. BAPAK/IBU/SAUDARA/I:</span>
                    <b id="previewGuestNameCover" class="text-xs font-serif font-bold text-nordic-text block mt-0.5 truncate">{{ $guest->name ?? 'Tamu Undangan Tercinta' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-nordic-amber hover:bg-amber-700 active:scale-[0.98] text-white font-medium text-xs shadow-md transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>💌</span> <span>Buka Undangan Tasyakuran</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-nordic-muted flex items-center gap-1">
                    <span class="text-nordic-amber">♫</span> Alunan Doa & Musik diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-white shadow-2xl relative border-x border-nordic-border">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-nordic-bg to-white space-y-4">
            <span class="text-xl">🌙 ✨ 🕊️</span>
            
            <div class="space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-nordic-amber">
                    {{ $couple->event_heading ?? "TASYAKURAN AQIQAH & TASMIYAH" }}
                </span>
                <h2 class="font-serif text-3xl font-bold text-nordic-text leading-tight">
                    Doa &amp; Rasa Syukur
                </h2>
            </div>

            <p class="text-xs text-nordic-muted italic leading-relaxed max-w-xs mx-auto">
                "Semoga Allah memberkahimu atas buah hati yang dianugerahkan kepadamu, engkau bersyukur kepada Sang Maha Pemberi, dan ia tumbuh dewasa dalam ketaatan dan kebaikan."
            </p>

            <!-- Baby Photo Spotlight -->
            <div class="pt-2">
                <div class="relative w-40 h-48 mx-auto rounded-t-full rounded-b-2xl overflow-hidden p-1.5 bg-gradient-to-b from-nordic-amber/40 to-nordic-border shadow-lg">
                    <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden bg-nordic-bg">
                        <img id="previewGroomPhotoImg" src="{{ $babyPhoto }}" alt="{{ $babyName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-serif text-2xl font-bold text-nordic-text">{{ $babyFull }}</h3>
                    <p class="text-xs font-medium text-nordic-amber">{{ $orderInfo }}</p>
                    
                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-nordic-amberlight text-nordic-amber text-[10px] font-semibold">
                            ⚖️ {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-nordic-muted pt-2 border-t border-nordic-border/60">
                            Buah hati tercinta dari:
                            <b id="previewParentsNames" class="block font-serif font-bold text-nordic-text text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-nordic-bg border-y border-nordic-border text-center space-y-3">
            <span class="text-[11px] font-bold uppercase tracking-wider text-nordic-amber block">
                ⏳ Menuju Hari Tasyakuran
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-white border border-nordic-border shadow-xs">
                    <b id="timerDays" class="block text-xl font-serif font-bold text-nordic-text">00</b>
                    <span class="text-[9px] text-nordic-muted uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-nordic-border shadow-xs">
                    <b id="timerHours" class="block text-xl font-serif font-bold text-nordic-text">00</b>
                    <span class="text-[9px] text-nordic-muted uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-nordic-border shadow-xs">
                    <b id="timerMinutes" class="block text-xl font-serif font-bold text-nordic-text">00</b>
                    <span class="text-[9px] text-nordic-muted uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-nordic-border shadow-xs">
                    <b id="timerSeconds" class="block text-xl font-serif font-bold text-nordic-text">00</b>
                    <span class="text-[9px] text-nordic-muted uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-medium text-nordic-text">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-nordic-amber">Jadwal Acara</span>
                <h3 class="font-serif text-2xl font-bold text-nordic-text">Waktu &amp; Tempat Pelaksanaan</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-nordic-bg/70 border border-nordic-border space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-nordic-amber text-white text-[10px] font-bold">
                                    {{ $ev->title ?? 'Rangkaian Acara ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-bold text-nordic-text">
                                    {{ $ev->start_time ?? '09:00' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-serif text-base font-bold text-nordic-text">{{ $ev->venue_name ?? 'Kediaman Keluarga' }}</h4>
                                <p class="text-xs text-nordic-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap tempat pelaksanaan acara.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-nordic-amber hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-nordic-bg/70 border border-nordic-border space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-nordic-amber text-white text-[10px] font-bold">
                            Tasyakuran, Cukur Rambut &amp; Doa Bersama
                        </span>
                        <span class="text-xs font-bold text-nordic-text">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-serif text-base font-bold text-nordic-text">{{ $couple->venue_name ?? 'Kediaman Keluarga' }}</h4>
                        <p class="text-xs text-nordic-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat kediaman keluarga besar.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-nordic-amber hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-1">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Aqiqah') . ' - ' . $babyName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Tasyakuran Kelahiran & Aqiqah ' . $babyName) }}&location={{ urlencode($couple->venue_name ?? 'Kediaman Keluarga') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-nordic-text text-white text-xs font-medium shadow hover:bg-nordic-amber transition">
                    <span>📅</span> <span>Simpan ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- BABY MOMENTS GALLERY -->
        <section class="p-6 bg-nordic-bg border-t border-nordic-border space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-nordic-amber">Album Kenangan</span>
                <h3 class="font-serif text-2xl font-bold text-nordic-text">Potret Tumbuh Kembang</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-nordic-border">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Buah Hati" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-nordic-border">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-nordic-border">
                        <img src="{{ $babyPhoto }}" alt="Baby Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DIGITAL GIFT / TABUNGAN BUAH HATI -->
        @php
            $hasBank1 = !empty($couple->bank_account_1) || !empty($couple->account_number);
            $hasBank2 = !empty($couple->bank_account_2);
            $hasGift = !empty($couple->gift_address);
        @endphp
        @if($hasBank1 || $hasBank2 || $hasGift)
            <section class="p-6 sm:p-8 bg-white border-t border-nordic-border space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-nordic-amber">Tanda Kasih &amp; Hadiah</span>
                    <h3 class="font-serif text-2xl font-bold text-nordic-text">Tabungan Buah Hati</h3>
                    <p class="text-xs text-nordic-muted max-w-xs mx-auto">
                        Doa restu Anda merupakan hadiah paling bermakna. Jika ingin mengirimkan tali asih secara digital:
                    </p>
                </div>

                <div class="space-y-3">
                    @if($hasBank1)
                        @php
                            $bName1 = $couple->bank_name_1 ?? ($couple->bank_name ?? 'BANK');
                            $bAcc1 = $couple->bank_account_1 ?? ($couple->account_number ?? '');
                            $bHolder1 = $couple->bank_holder_1 ?? ($couple->account_name ?? ($couple->groom_parents ?? $babyName));
                        @endphp
                        <div class="p-4 rounded-2xl bg-nordic-bg border border-nordic-border text-left space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-nordic-amber font-serif">💳 {{ $bName1 }}</span>
                                <span class="text-[10px] font-semibold px-2 py-0.5 rounded bg-amber-100 text-amber-900">Transfer</span>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div>
                                    <b class="text-sm font-mono text-nordic-text block">{{ $bAcc1 }}</b>
                                    <span class="text-xs text-nordic-muted">a.n. {{ $bHolder1 }}</span>
                                </div>
                                <button type="button" onclick="copyToClipboard('{{ $bAcc1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-nordic-amber text-white text-xs font-medium hover:bg-amber-700 transition cursor-pointer">
                                    Salin
                                </button>
                            </div>
                        </div>
                    @endif

                    @if($hasBank2)
                        @php
                            $bName2 = $couple->bank_name_2 ?? 'BANK';
                            $bAcc2 = $couple->bank_account_2 ?? '';
                            $bHolder2 = $couple->bank_holder_2 ?? ($couple->groom_parents ?? $babyName);
                        @endphp
                        <div class="p-4 rounded-2xl bg-nordic-bg border border-nordic-border text-left space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-nordic-amber font-serif">💳 {{ $bName2 }}</span>
                                <span class="text-[10px] font-semibold px-2 py-0.5 rounded bg-amber-100 text-amber-900">Transfer</span>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div>
                                    <b class="text-sm font-mono text-nordic-text block">{{ $bAcc2 }}</b>
                                    <span class="text-xs text-nordic-muted">a.n. {{ $bHolder2 }}</span>
                                </div>
                                <button type="button" onclick="copyToClipboard('{{ $bAcc2 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-nordic-amber text-white text-xs font-medium hover:bg-amber-700 transition cursor-pointer">
                                    Salin
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-amber-50/50 border border-nordic-border text-left space-y-1">
                        <span class="text-xs font-bold text-nordic-text flex items-center gap-1">
                            <span>📦</span> Kirim Kado / Hadiah ke Kediaman:
                        </span>
                        <p class="text-xs text-nordic-muted leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat kado berhasil disalin!')" class="mt-1 text-xs font-bold text-nordic-amber underline cursor-pointer">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & UCAPAN DOA -->
        <section class="p-6 sm:p-8 bg-nordic-bg border-t border-nordic-border space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-nordic-amber">Buku Tamu</span>
                <h3 class="font-serif text-2xl font-bold text-nordic-text">Doa &amp; Kehadiran</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-white p-5 rounded-2xl border border-nordic-border shadow-xs">
                @csrf
                <input type="hidden" name="category" value="Aqiqah">
                <input type="hidden" name="theme" value="Nordic Little Prince Baby Aqiqah">
                
                <div>
                    <label class="block text-xs font-bold text-nordic-text mb-1">Nama Tamu / Kerabat *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda..." class="w-full px-3.5 py-2.5 rounded-xl border border-nordic-border text-xs focus:outline-none focus:ring-2 focus:ring-nordic-amber">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-bold text-nordic-text mb-1">Konfirmasi</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl border border-nordic-border text-xs focus:outline-none focus:ring-2 focus:ring-nordic-amber bg-white">
                            <option value="hadir">InsyaAllah Hadir 🌿</option>
                            <option value="ragu">Masih Ragu</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-nordic-text mb-1">Jumlah</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl border border-nordic-border text-xs focus:outline-none focus:ring-2 focus:ring-nordic-amber bg-white">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-nordic-text mb-1">Doa untuk Sang Buah Hati</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan doa kebaikan..." class="w-full px-3.5 py-2 rounded-xl border border-nordic-border text-xs focus:outline-none focus:ring-2 focus:ring-nordic-amber"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-nordic-amber hover:bg-amber-700 text-white font-medium text-xs shadow-md transition">
                    Kirim Doa &amp; Konfirmasi Kehadiran
                </button>
            </form>

            <!-- Feed Ucapan -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-white border border-nordic-border shadow-xs space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-serif text-nordic-text">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-nordic-amber font-semibold">🌿 Doa Baik</span>
                            </div>
                            <p class="text-xs text-nordic-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-nordic-bg border-t border-nordic-border space-y-2">
            <span class="text-xl">🌙 🕊️</span>
            <p class="font-serif text-sm font-bold text-nordic-text">
                Jazaakumullah Khairan Katsiran
            </p>
            <p class="text-[11px] text-nordic-muted">
                {{ $couple->thank_you_note ?? 'Terima kasih atas doa, restu, dan kehadiran Bapak/Ibu/Saudara/i sekalian.' }}
            </p>
            <div class="pt-3 text-[10px] text-nordic-muted border-t border-nordic-border/60">
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
            btn.textContent = 'Mengirimkan...';

            fetch("{{ route('invitation.rsvp') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                showToast('Doa dan konfirmasi Anda berhasil dikirim!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Kerabat';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-white border border-nordic-border shadow-xs space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-serif text-nordic-text">${name}</b>
                            <span class="text-[10px] text-nordic-amber font-semibold">🌿 Doa Baik</span>
                        </div>
                        <p class="text-xs text-nordic-muted leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Kirim Doa & Konfirmasi Kehadiran';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-nordic-border';
                item.innerHTML = `<img src="${url}" alt="Momen Buah Hati" class="w-full h-full object-cover">`;
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
