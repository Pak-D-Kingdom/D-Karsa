<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Walimatul Khitan Sahaja') . ' - ' . ($couple->groom_name ?? 'Ahmad Fatih') }} | D'Karsa</title>
    <meta name="description" content="Undangan Tasyakuran Walimatul Khitan {{ $couple->groom_name ?? 'Ahmad Fatih' }} - Menuju Kesucian & Ketaatan Beragama.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Walimatul Khitan Sahaja') . ' - ' . ($couple->groom_name ?? 'Ahmad Fatih') }}">
    <meta property="og:description" content="Bismillah, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam tasyakuran walimatul khitan putra tercinta kami {{ $couple->groom_name ?? 'Ahmad Fatih' }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=1200' }}">

    <!-- Google Fonts: Amiri (Arabic), Playfair Display, Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sahaja: {
                            base: '#FBF9F5',
                            cream: '#F4EFE6',
                            card: '#FFFFFF',
                            green: '#2C5E43',
                            greendark: '#1E4330',
                            greenlight: '#EAF2EC',
                            greensoft: '#D2E3D6',
                            ochre: '#C07A3E',
                            amber: '#DFA563',
                            amberlight: '#FDF3E7',
                            ink: '#232D28',
                            muted: '#627368',
                            border: 'rgba(44, 94, 67, 0.15)'
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

        /* Modern Islamic Arch */
        .sahaja-arch {
            border-top-left-radius: 110px;
            border-top-right-radius: 110px;
        }

        .sahaja-arch-card {
            border-top-left-radius: 60px;
            border-top-right-radius: 60px;
        }

        /* Subtle Pattern */
        .sahaja-pattern {
            background-color: #FBF9F5;
            background-image: radial-gradient(#2C5E43 0.6px, transparent 0.6px), radial-gradient(#C07A3E 0.6px, #FBF9F5 0.6px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
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
        /* Hide scrollbars for app-like clean mobile experience */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="sahaja-pattern text-sahaja-ink font-sans antialiased selection:bg-sahaja-green selection:text-white relative overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1200'
        );
        $boyImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600'
        );
        $galleryList = isset($galleries) && count($galleries) > 0 ? $galleries : (
            isset($couple->galleries) && count($couple->galleries) > 0 ? $couple->galleries : collect([
                (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800'],
            ])
        );
        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/islamic-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0
            ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first())
            : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB');

        $boyName = $couple->groom_name ?? 'Ahmad Fatih Al-Farisi';
        $boyFull = $couple->groom_fullname ?? $boyName;
        $boyNick = $couple->groom_nickname ?? 'Fatih';
        $boyOrder = $couple->groom_birth_order ?? 'Putra Pertama Tercinta';
        $boyParents = \App\Services\TemplateManager::formatParentNames(
            $couple->groom_father ?? null,
            $couple->groom_mother ?? null,
            $couple->groom_parents ?? 'Bpk. Hendra Pratama & Ibu Rina Wijaya'
        );
        $guestName = $guest->name ?? request()->query('to', 'Tamu Undangan');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white/90 backdrop-blur-md border border-sahaja-green/30 shadow-xl flex items-center justify-center text-sahaja-green hover:scale-105 transition" title="Putar / Jeda Musik">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 6s;">🌿</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-sahaja-greendark text-white text-xs font-semibold rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-sahaja-amber">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         INTERACTIVE ENVELOPE COVER SCREEN (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-sahaja-base sahaja-pattern flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-sahaja-ink select-none">
        <!-- Ambient Soft Shimmer Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ $coverImg }}');"></div>
            <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-sahaja-green/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-sahaja-ochre/15 blur-3xl"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest bg-sahaja-greenlight text-sahaja-green border border-sahaja-green/30 mb-0.5">
                    <span>✂️</span>
                    <span id="previewHeadingCover">{{ $couple->event_heading ?? "WALIMATUL KHITAN" }}</span>
                </div>
                <p class="font-amiri text-base text-sahaja-green font-bold mb-0.5">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                <p class="text-[10px] text-sahaja-muted font-medium">Undangan Tasyakuran &amp; Walimatul Khitan</p>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Young Hero Photo in Soft Arched Frame -->
                <div class="relative w-20 h-24 mx-auto sahaja-arch overflow-hidden border-2 border-sahaja-green/40 shadow-md my-1 bg-sahaja-cream shrink-0">
                    <img id="previewCover" src="{{ $coverImg }}" class="w-full h-full object-cover" alt="{{ $boyName }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                </div>

                <!-- Boy's Name -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewBoyNameCover" class="font-serif text-lg sm:text-xl font-bold text-sahaja-greendark truncate">
                        {{ $boyName }}
                    </h1>
                    <p class="text-[9.5px] font-semibold text-sahaja-ochre mt-0.5">
                        {{ $boyOrder }}
                    </p>
                </div>

                <!-- Recipient Box -->
                <div class="w-full bg-white/90 backdrop-blur-md rounded-xl p-2 border border-sahaja-green/20 shadow-xs text-center mt-0.5">
                    <p class="text-[7.5px] uppercase tracking-wider text-sahaja-muted block font-medium">KEPADA YTH. BAPAK/IBU/SAUDARA/I:</p>
                    <p id="previewGuestNameCover" class="font-bold text-sahaja-greendark text-xs truncate mt-0.5">{{ $guestName }}</p>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-sahaja-green hover:bg-sahaja-greendark active:scale-[0.98] text-white text-xs font-bold uppercase tracking-wider shadow-lg transition duration-300 flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>Buka Undangan</span>
                    <span class="text-xs">✉️</span>
                    <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-sahaja-muted flex items-center gap-1">
                    <span class="text-sahaja-green">♫</span> Musik latar islami diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (MOBILE APP CONTAINER)
         ======================================================== -->
    <main class="w-full max-w-md mx-auto min-h-screen bg-sahaja-base shadow-2xl relative border-x border-sahaja-green/10 pb-20">

        <!-- HERO SECTION -->
        <header class="relative px-6 pt-12 pb-8 text-center overflow-hidden">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-sahaja-greenlight text-sahaja-green border border-sahaja-green/20 mb-3">
                <span>✂️</span>
                <span>Walimatul Khitan</span>
            </div>

            <h2 class="font-amiri text-2xl text-sahaja-green font-bold my-2">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</h2>
            <p class="text-xs text-sahaja-muted font-medium max-w-xs mx-auto mb-6">
                Assalamu'alaikum Warahmatullahi Wabarakatuh
            </p>

            <!-- Hero Arched Portrait -->
            <div class="relative w-56 h-64 mx-auto sahaja-arch overflow-hidden border-4 border-white shadow-2xl bg-sahaja-cream my-4">
                <img id="previewGroomPhotoImg" src="{{ $boyImg }}" class="w-full h-full object-cover" alt="{{ $boyName }}">
                <div class="absolute inset-0 bg-gradient-to-t from-sahaja-greendark/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-3 inset-x-0 text-center text-white px-2">
                    <span class="text-[10px] font-semibold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-0.5 rounded-full">Jagoan Sholeh</span>
                </div>
            </div>

            <h1 class="font-serif text-3xl font-extrabold text-sahaja-greendark mt-4 mb-1">
                {{ $boyFull }}
            </h1>
            <p class="text-xs font-bold text-sahaja-ochre mb-2">
                ( {{ $boyNick }} )
            </p>
            <p class="text-xs text-sahaja-muted max-w-xs mx-auto leading-relaxed">
                {{ $boyOrder }} dari pasangan tercinta:<br>
                <b id="previewGroomParentsText" class="text-sahaja-greendark font-bold">{{ $boyParents }}</b>
            </p>
        </header>

        <!-- DO'A & SUNNAH KHITAN SECTION -->
        <section class="px-6 py-6">
            <div class="bg-sahaja-cream/70 rounded-3xl p-6 text-center border border-sahaja-green/15 shadow-sm">
                <div class="w-10 h-10 mx-auto rounded-full bg-sahaja-greenlight text-sahaja-green flex items-center justify-center text-lg mb-3 shadow-xs">
                    📖
                </div>
                <p class="font-amiri text-lg text-sahaja-greendark font-bold leading-relaxed mb-2">
                    الْفِطْرَةُ خَمْسٌ: الْخِتَانُ، وَالِاسْتِحْدَادُ، وَقَصُّ الشَّارِبِ، وَتَقْلِيمُ الأَظْفَارِ، وَنَتْفُ الآبَاطِ
                </p>
                <p class="text-xs text-sahaja-muted italic leading-relaxed mb-4">
                    "Fitrah itu ada lima: Khitan, mencukur bulu kemaluan, memotong kumis, memotong kuku, dan mencabut bulu ketiak."<br>
                    <span class="font-semibold text-sahaja-greendark">(HR. Bukhari & Muslim)</span>
                </p>
                <div class="h-px w-24 bg-sahaja-green/20 mx-auto my-3"></div>
                <p class="text-xs text-sahaja-ink leading-relaxed">
                    {{ $couple->quote ?? 'Semoga putra kami tumbuh menjadi anak yang sholeh, berakhlak mulia, berbakti kepada kedua orang tua, cerdas, dan senantiasa bermanfaat bagi sesama serta agama.' }}
                </p>
            </div>
        </section>

        <!-- COUNTDOWN TIMER SECTION -->
        <section class="px-6 py-4">
            <div class="bg-gradient-to-br from-sahaja-greendark to-sahaja-green rounded-3xl p-6 text-white text-center shadow-lg">
                <p class="text-[10px] uppercase tracking-widest text-sahaja-amber font-bold mb-1">Menghitung Hari Bahagia</p>
                <p class="font-serif text-lg font-bold mb-4">{{ $eventDateFormatted }}</p>

                <!-- Grid Countdown Units -->
                <div class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto mb-4" id="countdownGrid">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-2.5 border border-white/15">
                        <span id="cdDays" class="block font-serif text-2xl font-bold">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-slate-200">Hari</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-2.5 border border-white/15">
                        <span id="cdHours" class="block font-serif text-2xl font-bold">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-slate-200">Jam</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-2.5 border border-white/15">
                        <span id="cdMinutes" class="block font-serif text-2xl font-bold">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-slate-200">Menit</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-2.5 border border-white/15">
                        <span id="cdSeconds" class="block font-serif text-2xl font-bold">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-slate-200">Detik</span>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Walimatul Khitan ' . $boyName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Tasyakuran Walimatul Khitan ' . $boyFull) }}&location={{ urlencode($firstEvent->venue_name ?? ($couple->venue_name ?? 'Kediaman Keluarga')) }}" 
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/20 hover:bg-white/30 text-white text-[11px] font-bold tracking-wider transition border border-white/25">
                    <span>📅</span>
                    <span>Simpan ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- AGENDA & DETAIL ACARA SECTION -->
        <section class="px-6 py-6" id="agendaAcara">
            <div class="text-center mb-6">
                <span class="text-[10px] font-bold uppercase tracking-widest text-sahaja-ochre">Agenda Tasyakuran</span>
                <h3 class="font-serif text-2xl font-bold text-sahaja-greendark">Rangkaian Acara</h3>
            </div>

            @php
                $eventList = isset($couple->events) && count($couple->events) > 0 ? $couple->events : [
                    (object)[
                        'title' => 'Tasyakuran & Doa Khitan',
                        'date' => $targetDate->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => $couple->venue_name ?? 'Kediaman Keluarga Besar',
                        'address' => $couple->venue_address ?? 'Jl. Cisangkuy No. 42, Citarum, Bandung',
                        'maps_url' => $couple->google_maps_link ?? 'https://maps.google.com/?q=Bandung',
                    ],
                    (object)[
                        'title' => 'Walimah & Ramah Tamah',
                        'date' => $targetDate->format('Y-m-d'),
                        'start_time' => '11:30 WIB',
                        'end_time' => '14:30 WIB',
                        'venue_name' => $couple->venue_name ?? 'Kediaman Keluarga Besar',
                        'address' => $couple->venue_address ?? 'Jl. Cisangkuy No. 42, Citarum, Bandung',
                        'maps_url' => $couple->google_maps_link ?? 'https://maps.google.com/?q=Bandung',
                    ],
                ];
            @endphp

            <div class="space-y-4">
                @foreach($eventList as $idx => $ev)
                    @php
                        $evDate = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date) : $targetDate;
                        $evTime = !empty($ev->start_time) 
                            ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '')
                            : '09:00 - Selesai';
                    @endphp
                    <div class="bg-white rounded-3xl p-6 border border-sahaja-green/15 shadow-sm text-center">
                        <div class="w-12 h-12 mx-auto rounded-2xl bg-sahaja-greenlight text-sahaja-green flex items-center justify-center text-xl mb-3 shadow-inner">
                            {{ $idx === 0 ? '🕌' : '🍽️' }}
                        </div>
                        <h4 class="font-serif text-lg font-bold text-sahaja-greendark mb-1">{{ $ev->title }}</h4>
                        <div class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-sahaja-cream text-sahaja-greendark mb-3">
                            {{ $evDate->locale('id')->isoFormat('dddd, D MMMM Y') }} • {{ $evTime }}
                        </div>

                        <p class="text-xs font-bold text-sahaja-ink mb-1">{{ $ev->venue_name ?? ($couple->venue_name ?? 'Kediaman Keluarga') }}</p>
                        <p class="text-xs text-sahaja-muted mb-4 leading-relaxed">{{ $ev->address ?? ($couple->venue_address ?? 'Alamat lengkap kediaman keluarga') }}</p>

                        @if(!empty($ev->maps_url) || !empty($couple->google_maps_link))
                            <a href="{{ $ev->maps_url ?? ($couple->google_maps_link ?? 'https://maps.google.com') }}" 
                               target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-sahaja-green hover:bg-sahaja-greendark text-white text-xs font-bold transition shadow-xs">
                                <span>📍</span>
                                <span>Petunjuk Arah Google Maps</span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <!-- GALERI FOTO JAGOAN CILIK -->
        <section class="px-6 py-6">
            <div class="text-center mb-6">
                <span class="text-[10px] font-bold uppercase tracking-widest text-sahaja-ochre">Momen Ceria</span>
                <h3 class="font-serif text-2xl font-bold text-sahaja-greendark">Galeri Foto Jagoan</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @foreach($galleryList as $g)
                    @php
                        $gRaw = is_object($g) ? ($g->image ?? null) : (is_array($g) ? ($g['image'] ?? null) : $g);
                        $imgUrl = \App\Services\TemplateManager::resolvePhotoUrl($gRaw, 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800');
                    @endphp
                    <div class="aspect-square rounded-2xl overflow-hidden border border-sahaja-green/15 shadow-sm bg-sahaja-cream group">
                        <img src="{{ $imgUrl }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Galeri Khitanan" loading="lazy">
                    </div>
                @endforeach
            </div>
        </section>

        <!-- TALI ASIH & AMPLOP DIGITAL -->
        <section class="px-6 py-6" id="amplopDigital">
            <div class="bg-white rounded-3xl p-6 border border-sahaja-green/15 shadow-sm text-center">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-sahaja-amberlight text-sahaja-ochre flex items-center justify-center text-xl mb-3 shadow-inner">
                    🎁
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-sahaja-ochre">Tanda Kasih</span>
                <h3 class="font-serif text-2xl font-bold text-sahaja-greendark mb-2">Tali Asih Khitanan</h3>
                <p class="text-xs text-sahaja-muted mb-6 leading-relaxed">
                    Doa restu Anda merupakan karunia terindah bagi jagoan kami. Bagi keluarga dan sahabat yang ingin memberikan tali asih atau kado khitanan:
                </p>

                <!-- Rekening 1 -->
                @php
                    $bName1 = $couple->bank_name_1 ?: ($couple->bank_name ?? 'Bank Mandiri');
                    $bAcc1 = $couple->bank_account_1 ?: ($couple->account_number ?? '1310018899221');
                    $bHolder1 = $couple->bank_holder_1 ?: ($couple->account_name ?? 'Hendra Pratama');

                    $bName2 = $couple->bank_name_2 ?? null;
                    $bAcc2 = $couple->bank_account_2 ?? null;
                    $bHolder2 = $couple->bank_holder_2 ?? null;
                @endphp

                <div class="space-y-3 mb-6">
                    <div class="p-4 rounded-2xl bg-sahaja-base border border-sahaja-green/15 text-left flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-sahaja-green block">{{ $bName1 }}</span>
                            <span class="font-mono text-sm font-bold text-sahaja-greendark block my-0.5" id="rekText1">{{ $bAcc1 }}</span>
                            <span class="text-[11px] text-sahaja-muted block">a.n. {{ $bHolder1 }}</span>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $bAcc1 }}', 'Nomor rekening {{ $bName1 }} berhasil disalin!')" 
                                class="px-3 py-1.5 rounded-xl bg-sahaja-greenlight hover:bg-sahaja-green hover:text-white text-sahaja-green text-xs font-bold transition flex items-center gap-1 shrink-0">
                            <span>📋</span>
                            <span>Salin</span>
                        </button>
                    </div>

                    @if(!empty($bAcc2) && !empty($bName2))
                        <div class="p-4 rounded-2xl bg-sahaja-base border border-sahaja-green/15 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-sahaja-green block">{{ $bName2 }}</span>
                                <span class="font-mono text-sm font-bold text-sahaja-greendark block my-0.5" id="rekText2">{{ $bAcc2 }}</span>
                                <span class="text-[11px] text-sahaja-muted block">a.n. {{ $bHolder2 }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $bAcc2 }}', 'Nomor rekening {{ $bName2 }} berhasil disalin!')" 
                                    class="px-3 py-1.5 rounded-xl bg-sahaja-greenlight hover:bg-sahaja-green hover:text-white text-sahaja-green text-xs font-bold transition flex items-center gap-1 shrink-0">
                                <span>📋</span>
                                <span>Salin</span>
                            </button>
                        </div>
                    @endif
                </div>

                @if(!empty($couple->gift_address))
                    <div class="pt-4 border-t border-sahaja-green/10 text-left">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-sahaja-ochre block mb-1">📦 Kirim Kado Fisik ke Alamat:</span>
                        <p class="text-xs text-sahaja-ink leading-relaxed mb-2">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat pengiriman berhasil disalin!')" 
                                class="text-xs font-bold text-sahaja-green hover:underline inline-flex items-center gap-1">
                            <span>📋</span>
                            <span>Salin Alamat Lengkap</span>
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <!-- BUKU TAMU & DOA RESTU (RSVP / WISHES) -->
        <section class="px-6 py-6" id="bukuTamu">
            <div class="bg-white rounded-3xl p-6 border border-sahaja-green/15 shadow-sm">
                <div class="text-center mb-6">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-sahaja-ochre">Doa & Harapan</span>
                    <h3 class="font-serif text-2xl font-bold text-sahaja-greendark">Ucapan Selamat & Restu</h3>
                </div>

                <!-- Form Doa -->
                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3 mb-6">
                    @csrf
                    <input type="hidden" name="couple_id" value="{{ $couple->id ?? 1 }}">
                    <div>
                        <label class="block text-[11px] font-bold text-sahaja-greendark mb-1">Nama Anda</label>
                        <input type="text" name="name" value="{{ $guestName !== 'Tamu Undangan' ? $guestName : '' }}" placeholder="Nama Lengkap / Kerabat" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-sahaja-green/20 text-xs focus:outline-none focus:ring-2 focus:ring-sahaja-green bg-sahaja-base">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-sahaja-greendark mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-3.5 py-2.5 rounded-xl border border-sahaja-green/20 text-xs focus:outline-none focus:ring-2 focus:ring-sahaja-green bg-sahaja-base">
                            <option value="Hadir">Insya Allah Hadir</option>
                            <option value="Masih Ragu">Belum Pasti</option>
                            <option value="Tidak Hadir">Mohon Maaf, Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-sahaja-greendark mb-1">Doa Restu untuk Jagoan Sholeh</label>
                        <textarea name="message" rows="3" placeholder="Tuliskan ucapan selamat & doa keberkahan..." required
                                  class="w-full px-3.5 py-2.5 rounded-xl border border-sahaja-green/20 text-xs focus:outline-none focus:ring-2 focus:ring-sahaja-green bg-sahaja-base"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 rounded-xl bg-sahaja-green hover:bg-sahaja-greendark text-white text-xs font-bold uppercase tracking-wider transition shadow-md">
                        Kirim Doa Restu
                    </button>
                </form>

                <!-- List Doa Restu -->
                <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $w)
                            <div class="p-3.5 rounded-2xl bg-sahaja-base border border-sahaja-green/10">
                                <div class="flex items-center justify-between mb-1">
                                    <b class="text-xs font-bold text-sahaja-greendark">{{ $w->name ?? 'Sahabat' }}</b>
                                    <span class="text-[9px] px-2 py-0.5 rounded-full bg-sahaja-greenlight text-sahaja-green font-bold">
                                        {{ $w->attendance ?? 'Doa Restu' }}
                                    </span>
                                </div>
                                <p class="text-xs text-sahaja-ink leading-relaxed">{{ $w->message }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-3.5 rounded-2xl bg-sahaja-base border border-sahaja-green/10">
                            <div class="flex items-center justify-between mb-1">
                                <b class="text-xs font-bold text-sahaja-greendark">Keluarga Bpk. H. Ahmad</b>
                                <span class="text-[9px] px-2 py-0.5 rounded-full bg-sahaja-greenlight text-sahaja-green font-bold">Hadir</span>
                            </div>
                            <p class="text-xs text-sahaja-ink leading-relaxed">Selamat atas khitanan ananda {{ $boyNick }}! Semoga tumbuh jadi anak yang sholeh, cerdas, berbakti kepada kedua orang tua dan menjadi kebanggaan keluarga.</p>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-sahaja-base border border-sahaja-green/10">
                            <div class="flex items-center justify-between mb-1">
                                <b class="text-xs font-bold text-sahaja-greendark">Ustadz Mansur & Keluarga</b>
                                <span class="text-[9px] px-2 py-0.5 rounded-full bg-sahaja-greenlight text-sahaja-green font-bold">Hadir</span>
                            </div>
                            <p class="text-xs text-sahaja-ink leading-relaxed">Barakallahu fiikum. Selamat dikhitan jagoan cilik! Semoga lekas pulih dan senantiasa dalam lindungan Allah SWT.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- FOOTER & THANKS -->
        <footer class="px-6 py-10 text-center">
            <p class="text-xs text-sahaja-muted mb-2">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.</p>
            <p class="font-serif text-sm font-bold text-sahaja-greendark mb-4">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
            <p class="text-xs font-bold text-sahaja-greendark">Kami yang berbahagia,</p>
            <p class="text-xs text-sahaja-ochre font-bold mb-6">Keluarga Besar {{ $boyParents }}</p>

            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sahaja-cream border border-sahaja-green/15 text-[10px] text-sahaja-muted font-medium">
                <span>Undangan Digital D'Karsa</span>
            </div>
        </footer>
    </main>

    <!-- ========================================================
         SCRIPTS & PREVIEW HANDSHAKE
         ======================================================== -->
    <script>
        // Opening Invitation Handler
        let audioPlaying = false;
        const bgAudio = document.getElementById('invitationAudio');
        const audioFloatingBtn = document.getElementById('audioFloatingBtn');
        const audioDiscIcon = document.getElementById('audioDiscIcon');

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

            if (audioFloatingBtn) {
                audioFloatingBtn.classList.remove('hidden');
            }

            if (bgAudio) {
                bgAudio.play().then(() => {
                    audioPlaying = true;
                    if (audioDiscIcon) audioDiscIcon.classList.add('animate-spin');
                }).catch(() => {
                    audioPlaying = false;
                    if (audioDiscIcon) audioDiscIcon.classList.remove('animate-spin');
                });
            }
        }
        window.openInvitation = openInvitation;

        function toggleAudio() {
            if (!bgAudio) return;
            if (audioPlaying) {
                bgAudio.pause();
                audioPlaying = false;
                if (audioDiscIcon) audioDiscIcon.classList.remove('animate-spin');
            } else {
                bgAudio.play().then(() => {
                    audioPlaying = true;
                    if (audioDiscIcon) audioDiscIcon.classList.add('animate-spin');
                }).catch(() => {});
            }
        }

        // Copy to clipboard helper
        function copyToClipboard(text, message) {
            if (!text) return;
            navigator.clipboard.writeText(text).then(() => {
                showToast(message || 'Berhasil disalin ke clipboard!');
            }).catch(() => {
                showToast('Gagal menyalin teks');
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMessage');
            if (!toast) return;
            if (toastMsg) toastMsg.textContent = msg;
            toast.classList.remove('hidden');
            toast.classList.remove('toast-active');
            void toast.offsetWidth; // Trigger reflow
            toast.classList.add('toast-active');
            setTimeout(() => {
                toast.classList.add('hidden');
                toast.classList.remove('toast-active');
            }, 2900);
        }

        // Live Countdown calculation
        (function initCountdown() {
            const targetDateStr = "{{ $targetDate->format('Y-m-d H:i:s') }}";
            const target = new Date(targetDateStr.replace(/-/g, "/")).getTime();

            function updateTimer() {
                const now = new Date().getTime();
                const diff = target - now;

                if (diff <= 0) {
                    const daysEl = document.getElementById('cdDays');
                    const hrsEl = document.getElementById('cdHours');
                    const minsEl = document.getElementById('cdMinutes');
                    const secsEl = document.getElementById('cdSeconds');
                    if (daysEl) daysEl.textContent = '00';
                    if (hrsEl) hrsEl.textContent = '00';
                    if (minsEl) minsEl.textContent = '00';
                    if (secsEl) secsEl.textContent = '00';
                    return;
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                const dEl = document.getElementById('cdDays');
                const hEl = document.getElementById('cdHours');
                const mEl = document.getElementById('cdMinutes');
                const sEl = document.getElementById('cdSeconds');

                if (dEl) dEl.textContent = String(days).padStart(2, '0');
                if (hEl) hEl.textContent = String(hours).padStart(2, '0');
                if (mEl) mEl.textContent = String(minutes).padStart(2, '0');
                if (sEl) sEl.textContent = String(seconds).padStart(2, '0');
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        })();

        // Default template assets & texts for live preview reset
        const defaultCoverPhoto = @json($coverImg);
        const defaultBoyPhoto = @json($boyImg);
        const defaultBoyParents = @json($boyParents);
        const defaultGalleries = @json(collect($galleryList)->map(function($g) { return is_object($g) ? ($g->image ?? '') : (is_array($g) ? ($g['image'] ?? '') : (string)$g); })->filter()->values()->all());

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIdx) => {
                const div = document.createElement('div');
                div.className = 'aspect-square rounded-2xl overflow-hidden border border-sahaja-green/15 shadow-sm bg-sahaja-cream group';
                div.innerHTML = `<img src="${imgUrl}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Galeri Khitanan ${gIdx + 1}" loading="lazy">`;
                container.appendChild(div);
            });
        }

        // Builder Live Preview Handshake & Image Sync
        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const d = event.data;

            if (d.type === 'UPDATE_PREVIEW_PHOTO') {
                const photoSrc = d.dataUrl || d.photoUrl || d.src;
                if (!photoSrc) return;

                if (d.target === 'cover' || d.targetId === 'previewCover' || d.targetId === 'previewCoverBg' || d.targetId === 'previewCoverPhotoImg') {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${photoSrc}')`;
                    const el = document.getElementById('previewCover');
                    if (el) el.src = photoSrc;
                    const el2 = document.getElementById('previewCoverPhotoImg');
                    if (el2) el2.src = photoSrc;
                } else if (d.target === 'groom' || d.target === 'boy' || d.targetId === 'previewGroomPhotoImg') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoSrc;
                    const coverEl = document.getElementById('previewCover');
                    if (coverEl && (coverEl.src === defaultCoverPhoto || coverEl.src === defaultBoyPhoto)) {
                        coverEl.src = photoSrc;
                        const bg = document.getElementById('previewCoverBg');
                        if (bg) bg.style.backgroundImage = `url('${photoSrc}')`;
                    }
                }
            } else if (d.type === 'RESET_PREVIEW_PHOTO') {
                if (d.target === 'cover') {
                    const url = d.defaultUrl || defaultCoverPhoto;
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${url}')`;
                    const el = document.getElementById('previewCover');
                    if (el) el.src = url;
                    const el2 = document.getElementById('previewCoverPhotoImg');
                    if (el2) el2.src = url;
                } else if (d.target === 'groom' || d.target === 'boy') {
                    const url = d.defaultUrl || defaultBoyPhoto;
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = url;
                }
            } else if (d.type === 'UPDATE_PREVIEW_GALLERY') {
                const imgs = d.images || d.photos;
                if (Array.isArray(imgs) && imgs.length > 0) {
                    renderDynamicGallery(imgs);
                }
            } else if (d.type === 'RESET_PREVIEW_GALLERY') {
                renderDynamicGallery(defaultGalleries);
            } else if (d.type === 'UPDATE_PREVIEW_PARENTS') {
                const pEl = document.getElementById('previewGroomParentsText');
                if (pEl) {
                    if (d.groomParents) {
                        pEl.textContent = d.groomParents;
                    } else if (d.resetDefault) {
                        pEl.textContent = defaultBoyParents;
                    }
                }
            }
        });

        // Notify parent iframe that preview is ready
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    </script>
</body>
</html>
