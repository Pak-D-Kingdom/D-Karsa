<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ($couple->bride_name ? ' & ' . $couple->bride_name : '') }} | D'Karsa</title>
    <meta name="description" content="Undangan Digital Eksklusif {{ $couple->groom_name }} & {{ $couple->bride_name }} - Desain Editorial Minimalis Elegan.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ($couple->bride_name ? ' & ' . $couple->bride_name : '') }}">
    <meta property="og:description" content="Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200' }}">

    <!-- Google Fonts: Editorial Serif & Clean Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kinfolk: {
                            canvas: '#FAF7F2',
                            card: '#FFFFFF',
                            ink: '#1E2320',
                            charcoal: '#343B36',
                            muted: '#768078',
                            border: '#E3DDD4',
                            borderlight: '#EFEBE4',
                            sage: '#4F6856',
                            sagedark: '#3B4F41',
                            sagelight: '#EDF2EE',
                            gold: '#C5A880',
                            sand: '#F2EDE4',
                        }
                    },
                    fontFamily: {
                        italiana: ['Italiana', 'serif'],
                        editorial: ['Cormorant Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }

        /* Subtle film grain effect on canvas */
        .editorial-grain {
            background-color: #FAF7F2;
            background-image: radial-gradient(rgba(79, 104, 86, 0.04) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Delicate thin borders */
        .hairline-border {
            border: 1px solid rgba(227, 221, 212, 0.85);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #FAF7F2; }
        ::-webkit-scrollbar-thumb { background: #C5A880; border-radius: 3px; }

        /* Monogram emblem */
        .monogram-circle {
            background: linear-gradient(135deg, #FAF7F2 0%, #EDF2EE 100%);
            border: 1px solid #C5A880;
        }

        /* Toast animation */
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: fadeInOut 2.8s ease forwards;
        }
    </style>
</head>
<body class="editorial-grain text-kinfolk-ink font-sans antialiased selection:bg-kinfolk-sage selection:text-white overflow-hidden">

    @php
        $isNonWedding = (!empty($couple->category) && strtolower($couple->category) !== 'pernikahan');
        $coverImg = !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') || str_starts_with($couple->cover_photo, 'data:') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200';
        $groomImg = !empty($couple->groom_photo) ? (str_starts_with($couple->groom_photo, 'http') || str_starts_with($couple->groom_photo, 'data:') ? $couple->groom_photo : asset('storage/' . $couple->groom_photo)) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600';
        $brideImg = !empty($couple->bride_photo) ? (str_starts_with($couple->bride_photo, 'http') || str_starts_with($couple->bride_photo, 'data:') ? $couple->bride_photo : asset('storage/' . $couple->bride_photo)) : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600';
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $weddingTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB';

        $hasBride = !$isNonWedding && !empty($couple->bride_name) && $couple->bride_name !== 'Keluarga' && $couple->bride_name !== 'Keluarga Besar';
        
        $groomInitial = mb_substr($couple->groom_nickname ?? $couple->groom_name ?? 'G', 0, 1);
        $brideInitial = mb_substr($couple->bride_nickname ?? $couple->bride_name ?? 'B', 0, 1);

        $groomParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga Mempelai Pria');
        $brideParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga Mempelai Wanita');
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Toggle -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white/95 backdrop-blur hairline-border shadow-md flex items-center justify-center text-kinfolk-sage hover:text-kinfolk-sagedark transition-all hover:scale-105" title="Musik Pengiring">
            <span id="audioDiscIcon" class="text-lg animate-spin" style="animation-duration: 6s;">🌿</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-kinfolk-ink text-white text-xs tracking-wider rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-kinfolk-gold">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (Kinfolk Magazine Editorial Aesthetic)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-[#1C201D] text-white p-3 sm:p-4 overflow-y-auto transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm max-h-[96vh] bg-[#FAF7F2] text-kinfolk-ink rounded-none p-5 sm:p-7 shadow-2xl hairline-border flex flex-col justify-between my-auto">
            
            <!-- Top Editorial Header Bar -->
            <div class="flex items-center justify-between pb-2 border-b border-kinfolk-border text-[9px] tracking-[0.25em] uppercase text-kinfolk-muted font-medium">
                <span>VOL. 01 — THE UNION</span>
                <span>{{ $targetDate->format('Y') }}</span>
            </div>

            <!-- Monogram Seal & Event Subtitle -->
            <div class="my-2.5 text-center">
                <div class="inline-flex items-center justify-center w-11 h-11 rounded-full monogram-circle mb-1.5 shadow-inner">
                    <span class="font-editorial text-lg italic font-semibold text-kinfolk-sage">
                        {{ $groomInitial }}@if($hasBride)&amp;{{ $brideInitial }}@endif
                    </span>
                </div>
                <p class="font-editorial text-[10px] italic tracking-[0.2em] text-kinfolk-sage uppercase font-medium">
                    {{ $couple->event_heading ?? ($isNonWedding ? 'Official Invitation' : 'The Wedding Celebration') }}
                </p>
            </div>

            <!-- Cover Photo with Asymmetric Frame -->
            <div class="relative my-2">
                <div class="w-full h-36 sm:h-44 overflow-hidden bg-kinfolk-sand relative group">
                    <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Couple" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 filter contrast-[1.02]">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <span class="absolute bottom-2 left-3 text-[9px] tracking-[0.18em] uppercase text-white/95 font-light">
                        {{ $weddingDateFormatted }}
                    </span>
                </div>
                <!-- Fine Line Corner Decors -->
                <div class="absolute -top-1 -left-1 w-2.5 h-2.5 border-t-2 border-l-2 border-kinfolk-sage"></div>
                <div class="absolute -bottom-1 -right-1 w-2.5 h-2.5 border-b-2 border-r-2 border-kinfolk-sage"></div>
            </div>

            <!-- Names in High-Contrast Typography -->
            <div class="text-center my-2">
                <h1 class="font-italiana text-2xl sm:text-3xl text-kinfolk-ink tracking-wide leading-tight">
                    {{ $couple->groom_name }}
                    @if($hasBride)
                        <span class="inline-block font-editorial italic text-xl text-kinfolk-gold mx-1">&amp;</span>
                        {{ $couple->bride_name }}
                    @endif
                </h1>
                <p class="font-editorial text-xs text-kinfolk-muted italic mt-1 line-clamp-2">
                    "Two souls, one poetic symphony of love and quiet grace."
                </p>
            </div>

            <!-- Guest Personalized Greeting Card -->
            <div class="p-2.5 sm:p-3 bg-kinfolk-sand/60 border border-kinfolk-border text-center my-2">
                <span class="text-[8px] uppercase tracking-[0.2em] text-kinfolk-muted block mb-0.5 font-semibold">Special Invitation For:</span>
                <p class="font-italiana text-sm sm:text-base text-kinfolk-ink font-bold">{{ $guest->name ?? 'Tamu Terhormat' }}</p>
                @if(!empty($guest->seat_table))
                    <span class="inline-block mt-0.5 text-[9px] text-kinfolk-sage font-medium tracking-wider">Reserved: {{ $guest->seat_table }}</span>
                @endif
            </div>

            <!-- Open Invitation Action Button -->
            <button type="button" onclick="openInvitation()" class="w-full py-3 px-5 bg-kinfolk-sage hover:bg-kinfolk-sagedark text-white text-[11px] font-semibold uppercase tracking-[0.25em] transition-all duration-300 shadow-md flex items-center justify-center gap-2.5 group cursor-pointer active:scale-98">
                <span>Buka Undangan</span>
                <span class="transform transition-transform duration-300 group-hover:translate-x-1">→</span>
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (Minimalist Editorial Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[540px] mx-auto min-h-screen bg-white text-kinfolk-ink shadow-2xl relative border-x border-kinfolk-border">

        <!-- Top Editorial Masthead -->
        <header class="pt-16 pb-12 px-8 text-center border-b border-kinfolk-border bg-[#FAF7F2] relative">
            <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block mb-2">
                {{ $couple->event_heading ?? ($isNonWedding ? 'Undangan Eksklusif' : 'The Wedding Journal') }}
            </span>
            <h1 class="font-italiana text-4xl sm:text-5xl text-kinfolk-ink tracking-tight mt-1 mb-3">
                {{ $couple->groom_name }}
                @if($hasBride)
                    <span class="font-editorial italic font-normal text-3xl text-kinfolk-gold mx-1">&amp;</span>
                    {{ $couple->bride_name }}
                @endif
            </h1>
            <div class="inline-flex items-center gap-3 text-xs font-editorial italic text-kinfolk-muted tracking-wider">
                <span>{{ $weddingDateFormatted }}</span>
                <span>•</span>
                <span>{{ $couple->venue_name ?? 'Indonesia' }}</span>
            </div>
            
            <div class="mt-6 flex justify-center">
                <span class="w-12 h-px bg-kinfolk-gold"></span>
            </div>
        </header>

        <!-- Quote / Holy Scripture Section -->
        <section class="py-14 px-8 text-center bg-white border-b border-kinfolk-border">
            <div class="max-w-md mx-auto">
                <span class="text-xl text-kinfolk-gold block mb-3">❝</span>
                <p class="font-editorial text-lg sm:text-xl text-kinfolk-charcoal italic leading-relaxed">
                    {{ $couple->quote ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}
                </p>
                <span class="inline-block mt-4 text-[10px] tracking-[0.25em] text-kinfolk-muted uppercase font-semibold">
                    {{ $couple->quote_source ?? 'Ar-Rum: 21' }}
                </span>
            </div>
        </section>

        <!-- Couple Editorial Feature Section -->
        <section class="py-16 px-8 bg-[#FAF7F2] border-b border-kinfolk-border">
            <div class="text-center mb-12">
                <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block">THE PROTAGONISTS</span>
                <h2 class="font-italiana text-3xl text-kinfolk-ink mt-1">Mempelai Berbahagia</h2>
            </div>

            <!-- Groom Profile (Asymmetrical Offset) -->
            <div class="mb-14">
                <div class="relative max-w-xs mx-auto">
                    <!-- Photo with thin frame offset -->
                    <div class="w-64 h-80 mx-auto overflow-hidden bg-kinfolk-sand hairline-border shadow-lg relative">
                        <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_name }}" class="w-full h-full object-cover filter contrast-[1.03]">
                    </div>
                    <div class="absolute -bottom-3 -right-2 bg-kinfolk-sage text-white text-[9px] font-bold tracking-[0.2em] uppercase px-3 py-1.5 shadow">
                        01 / MEMPELAI PRIA
                    </div>
                </div>
                <div class="text-center mt-6">
                    <h3 class="font-italiana text-2xl text-kinfolk-ink font-medium">{{ $couple->groom_name }}</h3>
                    @if(!empty($couple->groom_nickname))
                        <p class="text-xs text-kinfolk-sage font-semibold uppercase tracking-widest mt-0.5">({{ $couple->groom_nickname }})</p>
                    @endif
                    @php
                        $groomParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga Mempelai Pria');
                    @endphp
                    <p class="font-editorial text-sm text-kinfolk-muted italic mt-2 leading-relaxed max-w-xs mx-auto">
                        Putra tercinta dari<br>
                        <span id="previewGroomParentsText" class="font-semibold text-kinfolk-charcoal not-italic">{{ $groomParentsFormatted }}</span>
                    </p>
                    @if(!empty($couple->groom_instagram))
                        <a href="https://instagram.com/{{ ltrim($couple->groom_instagram, '@') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[11px] text-kinfolk-muted hover:text-kinfolk-sage transition mt-3 font-medium">
                            <span>✦</span> {{ '@' . ltrim($couple->groom_instagram, '@') }}
                        </a>
                    @endif
                </div>
            </div>

            @if($hasBride)
                <!-- Divider Ampersand -->
                <div class="flex items-center justify-center my-8">
                    <span class="w-16 h-px bg-kinfolk-border"></span>
                    <span class="font-italiana text-3xl text-kinfolk-gold px-4">&amp;</span>
                    <span class="w-16 h-px bg-kinfolk-border"></span>
                </div>

                <!-- Bride Profile (Asymmetrical Counterpart) -->
                <div>
                    <div class="relative max-w-xs mx-auto">
                        <div class="w-64 h-80 mx-auto overflow-hidden bg-kinfolk-sand hairline-border shadow-lg relative">
                            <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_name }}" class="w-full h-full object-cover filter contrast-[1.03]">
                        </div>
                        <div class="absolute -bottom-3 -left-2 bg-kinfolk-gold text-white text-[9px] font-bold tracking-[0.2em] uppercase px-3 py-1.5 shadow">
                            02 / MEMPELAI WANITA
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <h3 class="font-italiana text-2xl text-kinfolk-ink font-medium">{{ $couple->bride_name }}</h3>
                        @if(!empty($couple->bride_nickname))
                            <p class="text-xs text-kinfolk-sage font-semibold uppercase tracking-widest mt-0.5">({{ $couple->bride_nickname }})</p>
                        @endif
                        @php
                            $brideParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga Mempelai Wanita');
                        @endphp
                        <p class="font-editorial text-sm text-kinfolk-muted italic mt-2 leading-relaxed max-w-xs mx-auto">
                            Putri tercinta dari<br>
                            <span id="previewBrideParentsText" class="font-semibold text-kinfolk-charcoal not-italic">{{ $brideParentsFormatted }}</span>
                        </p>
                        @if(!empty($couple->bride_instagram))
                            <a href="https://instagram.com/{{ ltrim($couple->bride_instagram, '@') }}" target="_blank" class="inline-flex items-center gap-1.5 text-[11px] text-kinfolk-muted hover:text-kinfolk-sage transition mt-3 font-medium">
                                <span>✦</span> {{ '@' . ltrim($couple->bride_instagram, '@') }}
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </section>

        <!-- Live Countdown Section -->
        <section class="py-14 px-8 bg-white text-center border-b border-kinfolk-border">
            <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block mb-2">COUNTDOWN TO CELEBRATION</span>
            <h3 class="font-italiana text-2xl text-kinfolk-ink mb-6">Menghitung Hari Bahagia</h3>
            
            <div id="countdownTimer" class="grid grid-cols-4 gap-3 max-w-sm mx-auto">
                <div class="p-3 bg-[#FAF7F2] hairline-border text-center">
                    <span id="cdDays" class="block font-italiana text-2xl sm:text-3xl text-kinfolk-ink font-bold">00</span>
                    <span class="text-[9px] uppercase tracking-[0.2em] text-kinfolk-muted">Hari</span>
                </div>
                <div class="p-3 bg-[#FAF7F2] hairline-border text-center">
                    <span id="cdHours" class="block font-italiana text-2xl sm:text-3xl text-kinfolk-ink font-bold">00</span>
                    <span class="text-[9px] uppercase tracking-[0.2em] text-kinfolk-muted">Jam</span>
                </div>
                <div class="p-3 bg-[#FAF7F2] hairline-border text-center">
                    <span id="cdMinutes" class="block font-italiana text-2xl sm:text-3xl text-kinfolk-ink font-bold">00</span>
                    <span class="text-[9px] uppercase tracking-[0.2em] text-kinfolk-muted">Menit</span>
                </div>
                <div class="p-3 bg-[#FAF7F2] hairline-border text-center">
                    <span id="cdSeconds" class="block font-italiana text-2xl sm:text-3xl text-kinfolk-sage font-bold">00</span>
                    <span class="text-[9px] uppercase tracking-[0.2em] text-kinfolk-muted">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Button -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ($hasBride ? ' & ' . $couple->bride_name : ''));
                $calDetails = urlencode('Menghadiri perayaan istimewa kami. Terima kasih atas doa dan kehadirannya.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-8">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 bg-kinfolk-sand hover:bg-kinfolk-border text-kinfolk-charcoal text-[11px] font-semibold tracking-[0.2em] uppercase hairline-border transition">
                    <span>📅</span> Tambahkan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Event Schedule & Itinerary Section -->
        <section class="py-16 px-8 bg-[#FAF7F2] border-b border-kinfolk-border">
            <div class="text-center mb-12">
                <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block">ITINERARY</span>
                <h2 class="font-italiana text-3xl text-kinfolk-ink mt-1">Rangkaian Acara</h2>
            </div>

            @php
                $eventItems = (isset($events) && count($events) > 0) 
                    ? $events 
                    : ((isset($couple->events) && count($couple->events) > 0) ? $couple->events : collect());
            @endphp

            <div id="itineraryContainer" class="space-y-8 max-w-md mx-auto">
                @if(count($eventItems) > 0)
                    @foreach($eventItems as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted;
                            
                            $evTimeFormatted = '';
                            if (!empty($ev->start_time)) {
                                $evTimeFormatted = $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : ' - Selesai');
                            } elseif (!empty($ev->time)) {
                                $evTimeFormatted = substr($ev->time, 0, 5) . ' WIB';
                            } else {
                                $evTimeFormatted = $weddingTimeFormatted;
                            }

                            $evVenue = $ev->venue_name ?? $couple->venue_name ?? 'Gedung Pertemuan';
                            $evAddress = $ev->address ?? $ev->venue_address ?? $couple->venue_address ?? 'Alamat lengkap acara';
                            $evMaps = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                        @endphp
                        <div class="bg-white p-7 hairline-border shadow-sm text-center relative">
                            <span class="text-[9px] tracking-[0.25em] uppercase text-kinfolk-gold font-bold block mb-1">SESI 0{{ $idx + 1 }}</span>
                            <h3 class="font-italiana text-2xl text-kinfolk-ink font-semibold">{{ $ev->title ?? ($idx === 0 ? ($isNonWedding ? 'Acara Utama' : 'Akad Nikah') : 'Resepsi Pernikahan') }}</h3>
                            <p class="font-editorial text-sm text-kinfolk-sage italic font-semibold mt-1">
                                {{ $evDateFormatted }}
                            </p>
                            <p class="text-xs text-kinfolk-charcoal mt-1 tracking-wider">
                                ⏰ {{ $evTimeFormatted }}
                            </p>
                            <div class="my-4 w-10 h-px bg-kinfolk-border mx-auto"></div>
                            <p class="font-italiana text-base font-bold text-kinfolk-ink">{{ $evVenue }}</p>
                            <p class="text-xs text-kinfolk-muted mt-1 leading-relaxed max-w-xs mx-auto">{{ $evAddress }}</p>
                            @if(!empty($evMaps))
                                <div class="mt-4">
                                    <a href="{{ $evMaps }}" target="_blank" class="inline-flex items-center gap-1.5 text-[10px] tracking-widest uppercase font-semibold text-kinfolk-sage hover:text-kinfolk-sagedark underline underline-offset-4 transition">
                                        <span>📍</span> Buka Peta Lokasi
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <!-- Default Event Card: Akad / Ceremony -->
                    <div class="bg-white p-7 hairline-border shadow-sm text-center relative">
                        <span class="text-[9px] tracking-[0.25em] uppercase text-kinfolk-gold font-bold block mb-1">SESI 01</span>
                        <h3 class="font-italiana text-2xl text-kinfolk-ink font-semibold">{{ $isNonWedding ? 'Acara Utama' : 'Akad Nikah' }}</h3>
                        <p class="font-editorial text-sm text-kinfolk-sage italic font-semibold mt-1">{{ $weddingDateFormatted }}</p>
                        <p class="text-xs text-kinfolk-charcoal mt-1 tracking-wider">⏰ 08:00 - 10:00 WIB</p>
                        <div class="my-4 w-10 h-px bg-kinfolk-border mx-auto"></div>
                        <p class="font-italiana text-base font-bold text-kinfolk-ink">{{ $couple->venue_name ?? 'Grand Ballroom' }}</p>
                        <p class="text-xs text-kinfolk-muted mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Jl. Melati Raya No. 12, Jakarta' }}</p>
                    </div>

                    <!-- Default Event Card: Resepsi / Reception -->
                    <div class="bg-white p-7 hairline-border shadow-sm text-center relative">
                        <span class="text-[9px] tracking-[0.25em] uppercase text-kinfolk-sage font-bold block mb-1">SESI 02</span>
                        <h3 class="font-italiana text-2xl text-kinfolk-ink font-semibold">{{ $isNonWedding ? 'Ramah Tamah & Jamuan' : 'Resepsi Pernikahan' }}</h3>
                        <p class="font-editorial text-sm text-kinfolk-sage italic font-semibold mt-1">{{ $weddingDateFormatted }}</p>
                        <p class="text-xs text-kinfolk-charcoal mt-1 tracking-wider">⏰ 11:00 - 14:00 WIB</p>
                        <div class="my-4 w-10 h-px bg-kinfolk-border mx-auto"></div>
                        <p class="font-italiana text-base font-bold text-kinfolk-ink">{{ $couple->venue_name ?? 'Grand Ballroom' }}</p>
                        <p class="text-xs text-kinfolk-muted mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Jl. Melati Raya No. 12, Jakarta' }}</p>
                    </div>
                @endif
            </div>

            <!-- Location Map Button -->
            <div class="mt-10 text-center">
                @php
                    $firstEventMap = (isset($eventItems) && count($eventItems) > 0) ? ($eventItems->first()->maps_url ?? null) : null;
                    $mapLink = !empty($firstEventMap) ? $firstEventMap : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? ''))));
                @endphp
                <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-8 py-3.5 bg-kinfolk-sage hover:bg-kinfolk-sagedark text-white text-[11px] font-semibold tracking-[0.25em] uppercase shadow transition">
                    <span>📍</span> Buka Petunjuk Arah (Google Maps)
                </a>
            </div>
        </section>

        <!-- Our Story / Journal Chapter Section -->
        @if(isset($stories) && count($stories) > 0)
            <section class="py-16 px-8 bg-white border-b border-kinfolk-border">
                <div class="text-center mb-12">
                    <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block">THE MEMOIR</span>
                    <h2 class="font-italiana text-3xl text-kinfolk-ink mt-1">Perjalanan Kasih</h2>
                </div>

                <div class="space-y-10 max-w-md mx-auto">
                    @foreach($stories as $sIndex => $story)
                        <div class="border-l-2 border-kinfolk-sage pl-5 py-1">
                            <span class="text-[10px] tracking-[0.25em] uppercase text-kinfolk-gold font-bold block">{{ $story->year ?? ('CHAPTER 0' . ($sIndex + 1)) }}</span>
                            <h3 class="font-italiana text-xl text-kinfolk-ink font-bold mt-1">{{ $story->title ?? 'Momen Berharga' }}</h3>
                            <p class="font-editorial text-sm text-kinfolk-muted italic mt-2 leading-relaxed">
                                "{{ $story->story ?? $story->content ?? '' }}"
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Editorial Visual Gallery Section -->
        @php
            $displayGalleries = (isset($galleries) && count($galleries) > 0) 
                ? $galleries 
                : ((isset($couple->galleries) && count($couple->galleries) > 0) ? $couple->galleries : collect());
            
            if (count($displayGalleries) === 0) {
                // If customer uploaded cover, groom, or bride photos, showcase them in the gallery
                $customCandidates = array_filter([
                    !empty($couple->cover_photo) ? (object)['image' => $couple->cover_photo] : null,
                    !empty($couple->groom_photo) ? (object)['image' => $couple->groom_photo] : null,
                    !empty($couple->bride_photo) ? (object)['image' => $couple->bride_photo] : null,
                ]);
                if (count($customCandidates) > 0) {
                    $displayGalleries = array_values($customCandidates);
                } else {
                    $displayGalleries = [
                        (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                        (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                        (object)['image' => 'https://images.unsplash.com/photo-1469371670807-013ccf25f16a?w=800'],
                        (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800'],
                    ];
                }
            }
        @endphp
        <section class="py-16 px-8 bg-[#FAF7F2] border-b border-kinfolk-border">
            <div class="text-center mb-10">
                <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block">VISUAL ARCHIVE</span>
                <h2 class="font-italiana text-3xl text-kinfolk-ink mt-1">Galeri Foto</h2>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-md mx-auto">
                @foreach($displayGalleries as $gIndex => $gal)
                    @php
                        $imgSrc = !empty($gal->image) ? (str_starts_with($gal->image, 'http') || str_starts_with($gal->image, 'data:') ? $gal->image : asset('storage/' . $gal->image)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800';
                        $spanClass = ($gIndex === 0) ? 'col-span-2 h-64' : 'h-48';
                    @endphp
                    <div class="{{ $spanClass }} overflow-hidden hairline-border bg-kinfolk-sand group relative">
                        <img src="{{ $imgSrc }}" alt="Gallery Image {{ $gIndex + 1 }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter contrast-[1.02]">
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Digital Envelope & Gift Section -->
        <section class="py-16 px-8 bg-white border-b border-kinfolk-border text-center">
            <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block mb-1">TANDA KASIH</span>
            <h2 class="font-italiana text-3xl text-kinfolk-ink mb-3">Amplop Digital</h2>
            <p class="font-editorial text-sm text-kinfolk-muted italic max-w-sm mx-auto mb-8 leading-relaxed">
                Doa restu Anda merupakan karunia terindah bagi kami. Namun jika Anda bermaksud memberikan tanda kasih, kami menyediakannya melalui rekening di bawah ini:
            </p>

            <div class="max-w-sm mx-auto p-7 bg-[#FAF7F2] hairline-border shadow-sm text-center">
                <div class="inline-block px-3 py-1 bg-kinfolk-sand border border-kinfolk-border text-[10px] font-bold tracking-[0.2em] text-kinfolk-sage uppercase mb-3">
                    {{ $couple->bank_name ?? 'BCA' }}
                </div>
                <p id="accountNumberText" class="font-mono text-xl text-kinfolk-ink font-semibold tracking-wider my-1">
                    {{ $couple->account_number ?? '1234567890' }}
                </p>
                <p class="text-xs text-kinfolk-muted mb-5">a.n {{ $couple->account_name ?? ($couple->groom_name ?? 'Mempelai') }}</p>
                
                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '1234567890' }}', 'Nomor rekening berhasil disalin')" class="inline-flex items-center gap-2 px-6 py-2.5 bg-kinfolk-sage hover:bg-kinfolk-sagedark text-white text-[10px] font-semibold tracking-[0.25em] uppercase transition">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-sm mx-auto mt-6 p-6 bg-white hairline-border text-center">
                    <span class="text-[9px] uppercase tracking-[0.2em] text-kinfolk-gold font-bold block mb-1">KIRIM KADO FISIK</span>
                    <p class="text-xs text-kinfolk-charcoal leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat kado fisik disalin')" class="mt-3 text-[10px] text-kinfolk-sage hover:underline tracking-wider uppercase font-semibold">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & Guest Book Wishes Section -->
        <section class="py-16 px-8 bg-[#FAF7F2] border-b border-kinfolk-border">
            <div class="text-center mb-10">
                <span class="text-[10px] tracking-[0.3em] uppercase text-kinfolk-sage font-semibold block">GUEST BOOK</span>
                <h2 class="font-italiana text-3xl text-kinfolk-ink mt-1">Konfirmasi &amp; Ucapan</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-md mx-auto bg-white p-7 hairline-border shadow-sm mb-10">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif
                    
                    <div class="mb-4">
                        <label class="block text-[10px] uppercase tracking-[0.2em] text-kinfolk-muted font-bold mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 bg-[#FAF7F2] hairline-border text-xs text-kinfolk-ink focus:outline-none focus:border-kinfolk-sage">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] uppercase tracking-[0.2em] text-kinfolk-muted font-bold mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 bg-[#FAF7F2] hairline-border text-xs text-kinfolk-ink focus:outline-none focus:border-kinfolk-sage">
                            <option value="Hadir">✓ Berkenan Hadir</option>
                            <option value="Tidak Hadir">✗ Maaf, Berhalangan Hadir</option>
                            <option value="Ragu-ragu">? Masih Ragu-ragu</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] uppercase tracking-[0.2em] text-kinfolk-muted font-bold mb-1">Doa &amp; Ucapan Selamat</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan pesan atau doa terbaik Anda..." class="w-full px-4 py-2.5 bg-[#FAF7F2] hairline-border text-xs text-kinfolk-ink focus:outline-none focus:border-kinfolk-sage"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 bg-kinfolk-sage hover:bg-kinfolk-sagedark text-white text-[11px] font-semibold tracking-[0.25em] uppercase transition">
                        Kirim Konfirmasi &amp; Ucapan
                    </button>
                </form>
            </div>

            <!-- Wishes Live Feed -->
            <div class="max-w-md mx-auto space-y-4">
                <h3 class="font-italiana text-lg text-kinfolk-ink font-semibold mb-3 flex items-center justify-between">
                    <span>Untaian Doa Tamu</span>
                    <span class="text-xs font-normal text-kinfolk-muted font-sans">{{ isset($wishes) ? count($wishes) : 0 }} Pesan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-96 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->sender_name ?? $wish->name ?? 'Tamu Undangan';
                                $wInitial = mb_substr($wName, 0, 1);
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 bg-white hairline-border text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-kinfolk-sand flex items-center justify-center text-[10px] font-bold text-kinfolk-sage">
                                            {{ $wInitial }}
                                        </div>
                                        <b class="text-xs text-kinfolk-ink">{{ $wName }}</b>
                                    </div>
                                    <span class="text-[9px] uppercase tracking-wider px-2 py-0.5 rounded bg-kinfolk-sand text-kinfolk-sage font-medium">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="font-editorial text-sm text-kinfolk-muted italic mt-1 pl-8">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-6 bg-white hairline-border text-center text-xs text-kinfolk-muted italic">
                            Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer Colophon -->
        <footer class="py-12 px-8 text-center bg-[#1C201D] text-white">
            <p class="font-italiana text-2xl text-kinfolk-sand mb-1">
                {{ $couple->groom_name }}@if($hasBride) &amp; {{ $couple->bride_name }}@endif
            </p>
            <p class="font-editorial text-xs italic text-kinfolk-muted tracking-wider">
                Terima kasih atas segala cinta, doa, dan kehadiran Anda.
            </p>
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between text-[10px] text-white/50 tracking-widest uppercase">
                <span>D'KARSA DIGITAL INVITATION</span>
                <span class="mt-2 sm:mt-0">© {{ date('Y') }} ALL RIGHTS RESERVED</span>
            </div>
        </footer>

    </main>

    <!-- Interactive Scripts -->
    <script>
        // Audio Toggle
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
                    audioIcon.textContent = '🌿';
                }).catch(e => console.log('Audio autoplay prevented:', e));
            }
        }

        // Open Invitation Action
        function openInvitation() {
            window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
            document.body.classList.remove('overflow-hidden');

            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    cover.classList.add('hidden');
                    window.scrollTo(0, 0);
                    document.documentElement.scrollTop = 0;
                    document.body.scrollTop = 0;
                }, 800);
            }
            if (audioBtn) audioBtn.classList.remove('hidden');
            toggleAudio();
        }

        // Clipboard Copy Helper with Toast
        function copyToClipboard(text, msg) {
            navigator.clipboard.writeText(text).then(() => {
                showToast(msg || 'Berhasil disalin');
            }).catch(() => {
                showToast('Gagal menyalin teks');
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
                showToast('Ucapan & RSVP berhasil dikirim!');
                
                // Prepend wish to feed
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('sender_name') || 'Tamu Undangan';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';
                    const init = name.charAt(0).toUpperCase();

                    const item = document.createElement('div');
                    item.className = 'p-4 bg-white hairline-border text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-kinfolk-sand flex items-center justify-center text-[10px] font-bold text-kinfolk-sage">${init}</div>
                                <b class="text-xs text-kinfolk-ink">${name}</b>
                            </div>
                            <span class="text-[9px] uppercase tracking-wider px-2 py-0.5 rounded bg-kinfolk-sand text-kinfolk-sage font-medium">${attend}</span>
                        </div>
                        <p class="font-editorial text-sm text-kinfolk-muted italic mt-1 pl-8">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih, konfirmasi tercatat!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for clean reset
        const defaultGroomPhoto = "{{ $groomImg }}";
        const defaultBridePhoto = "{{ $brideImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultGroomParents = @json($groomParentsFormatted ?? '');
        const defaultBrideParents = @json($brideParentsFormatted ?? '');

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIndex) => {
                const spanClass = (gIndex === 0) ? 'col-span-2 h-64' : 'h-48';
                const div = document.createElement('div');
                div.className = `${spanClass} overflow-hidden hairline-border bg-kinfolk-sand group relative`;
                div.innerHTML = `
                    <img src="${imgUrl}" alt="Gallery Image ${gIndex + 1}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter contrast-[1.02]">
                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                `;
                container.appendChild(div);
            });
        }

        function renderDynamicItinerary(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            
            container.innerHTML = '';
            events.forEach((ev, idx) => {
                const title = ev.title || (idx === 0 ? 'Akad Nikah / Acara Utama' : 'Resepsi Pernikahan');
                const date = ev.date || '{{ $weddingDateFormatted }}';
                const time = ev.start_time ? (ev.start_time + (ev.end_time ? ' - ' + ev.end_time : ' - Selesai')) : '{{ $weddingTimeFormatted }}';
                const venue = ev.venue_name || 'Lokasi Acara';
                const address = ev.address || 'Alamat lengkap acara';
                const maps = ev.maps_url || '';

                const card = document.createElement('div');
                card.className = 'bg-white p-7 hairline-border shadow-sm text-center relative';
                card.innerHTML = `
                    <span class="text-[9px] tracking-[0.25em] uppercase text-kinfolk-gold font-bold block mb-1">SESI 0${idx + 1}</span>
                    <h3 class="font-italiana text-2xl text-kinfolk-ink font-semibold">${title}</h3>
                    <p class="font-editorial text-sm text-kinfolk-sage italic font-semibold mt-1">${date}</p>
                    <p class="text-xs text-kinfolk-charcoal mt-1 tracking-wider">⏰ ${time}</p>
                    <div class="my-4 w-10 h-px bg-kinfolk-border mx-auto"></div>
                    <p class="font-italiana text-base font-bold text-kinfolk-ink">${venue}</p>
                    <p class="text-xs text-kinfolk-muted mt-1 leading-relaxed max-w-xs mx-auto">${address}</p>
                    ${maps ? `<div class="mt-4"><a href="${maps}" target="_blank" class="inline-flex items-center gap-1.5 text-[10px] tracking-widest uppercase font-semibold text-kinfolk-sage hover:text-kinfolk-sagedark underline underline-offset-4 transition"><span>📍</span> Buka Peta Lokasi</a></div>` : ''}
                `;
                container.appendChild(card);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' && event.data.dataUrl) {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                } else if (event.data.target === 'bride' && event.data.dataUrl) {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultGroomPhoto;
                } else if (event.data.target === 'bride') {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultBridePhoto;
                } else if (event.data.target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.defaultUrl || defaultCoverPhoto;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            } else if (event.data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(event.data.events)) {
                renderDynamicItinerary(event.data.events);
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                const gpEl = document.getElementById('previewGroomParentsText');
                if (gpEl) {
                    if (event.data.groomParents) {
                        gpEl.textContent = event.data.groomParents;
                    } else if (event.data.resetDefault) {
                        gpEl.textContent = defaultGroomParents;
                    }
                }
                const bpEl = document.getElementById('previewBrideParentsText');
                if (bpEl) {
                    if (event.data.brideParents) {
                        bpEl.textContent = event.data.brideParents;
                    } else if (event.data.resetDefault) {
                        bpEl.textContent = defaultBrideParents;
                    }
                }
            }
        });

        // Handshake: notify parent window that iframe is ready
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    </script>
</body>
</html>
