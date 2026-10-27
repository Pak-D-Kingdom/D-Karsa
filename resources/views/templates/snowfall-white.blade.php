<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $couple->event_heading ?? 'The Wedding Celebration' }} — {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        snow: {
                            pure: '#FFFFFF',
                            ice: '#F8FAFC',
                            frost: '#F1F5F9',
                            silver: '#E2E8F0',
                            border: '#CBD5E1',
                            dark: '#0F172A',
                            charcoal: '#1E293B',
                            slate: '#475569',
                            muted: '#64748B',
                            accent: '#334155',
                            glow: '#94A3B8'
                        }
                    },
                    fontFamily: {
                        cormorant: ['"Cormorant Garamond"', 'serif'],
                        cinzel: ['"Cinzel"', 'serif'],
                        montserrat: ['"Montserrat"', 'sans-serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Cormorant Garamond, Cinzel, Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Montserrat:wght@200;300;400;500;600&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #0F172A;
            color: #0F172A;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Pure Snowfall Canvas Overlay */
        #snowCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 40;
        }

        .platinum-border {
            border: 1px solid rgba(203, 213, 225, 0.7);
        }

        .frosted-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .frosted-glass-dark {
            background: rgba(15, 23, 42, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* Subtle Luxury Glow */
        .snow-glow {
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.6), 0 0 50px rgba(226, 232, 240, 0.3);
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: floatSlow 6s ease-in-out infinite;
        }

        @keyframes pulseSoft {
            0%, 100% { opacity: 0.85; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.02); }
        }
        .animate-pulse-soft {
            animation: pulseSoft 4s ease-in-out infinite;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(15px); }
            15% { opacity: 1; transform: translateY(0); }
            85% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-15px); }
        }
        .toast-active {
            animation: fadeInOut 2.8s ease forwards;
        }
    </style>
</head>
<body class="bg-slate-900 text-snow-dark font-sans antialiased selection:bg-slate-800 selection:text-white overflow-hidden">

    @php
        $isNonWedding = (!empty($couple->category) && strtolower($couple->category) !== 'pernikahan');
        $coverImg = !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') || str_starts_with($couple->cover_photo, 'data:') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80&auto=format&fit=crop';
        $groomImg = !empty($couple->groom_photo) ? (str_starts_with($couple->groom_photo, 'http') || str_starts_with($couple->groom_photo, 'data:') ? $couple->groom_photo : asset('storage/' . $couple->groom_photo)) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600';
        $brideImg = !empty($couple->bride_photo) ? (str_starts_with($couple->bride_photo, 'http') || str_starts_with($couple->bride_photo, 'data:') ? $couple->bride_photo : asset('storage/' . $couple->bride_photo)) : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600';
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $weddingTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '09:00 WIB';

        $hasBride = !$isNonWedding && !empty($couple->bride_name) && $couple->bride_name !== 'Keluarga' && $couple->bride_name !== 'Keluarga Besar';
        
        $groomInitial = mb_substr($couple->groom_nickname ?? $couple->groom_name ?? 'N', 0, 1);
        $brideInitial = mb_substr($couple->bride_nickname ?? $couple->bride_name ?? 'C', 0, 1);
    @endphp

    <!-- Real Falling Snow Particle Canvas -->
    <canvas id="snowCanvas"></canvas>

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Toggle -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full frosted-glass-dark shadow-2xl flex items-center justify-center text-white border border-white/20 transition-all hover:scale-105 active:scale-95" title="Musik Pengiring">
            <span id="audioDiscIcon" class="text-lg animate-spin" style="animation-duration: 6s;">❄️</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-snow-dark text-white text-xs tracking-wider rounded-full shadow-2xl flex items-center gap-2 border border-white/20">
        <span class="text-sky-300">❄️</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (SnowFall Minimalist White Editorial)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-slate-950 text-white p-2.5 sm:p-4 transition-all duration-700 ease-in-out flex flex-col">
        <div class="min-h-full flex flex-col justify-center items-center my-auto py-2 sm:py-3 w-full">
            <div class="relative w-full max-w-sm bg-white text-snow-dark p-4 sm:p-6 shadow-2xl platinum-border flex flex-col justify-between my-auto">
                
                <!-- Soft Crystalline Glow Backdrop (Contained inside absolute mask) -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none rounded-[inherit]">
                    <div class="absolute -top-16 -right-16 w-40 h-40 bg-sky-100/60 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-16 -left-16 w-40 h-40 bg-slate-100/60 rounded-full blur-3xl"></div>
                </div>

                <!-- Top Editorial Header Bar -->
                <div class="relative z-10 flex items-center justify-between pb-2 border-b border-snow-silver text-[9px] tracking-[0.25em] uppercase text-snow-muted font-medium font-montserrat">
                    <span>HAUTE COUTURE • VOL. VII</span>
                    <span>{{ $targetDate->format('Y') }}</span>
                </div>

                <!-- Monogram Seal & Event Subtitle -->
                <div class="relative z-10 my-1.5 sm:my-2.5 text-center">
                    <div class="inline-flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-snow-ice border border-snow-silver mb-1 shadow-sm">
                        <span class="font-cormorant text-lg sm:text-xl italic font-semibold text-snow-charcoal">
                            {{ $groomInitial }}@if($hasBride)&amp;{{ $brideInitial }}@endif
                        </span>
                    </div>
                    <p class="font-montserrat text-[8.5px] sm:text-[9px] tracking-[0.25em] text-snow-slate uppercase font-semibold">
                        {{ $couple->event_heading ?? ($isNonWedding ? 'Official Invitation' : 'The Wedding Celebration') }}
                    </p>
                </div>

                <!-- Cover Photo with Crisp Platinum Frame -->
                <div class="relative z-10 my-1.5 sm:my-2">
                    <div class="w-full h-30 sm:h-40 max-h-[26vh] overflow-hidden bg-snow-frost relative group border border-snow-silver/60">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Couple" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 filter contrast-[1.02] brightness-[0.98]">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
                        <span class="absolute bottom-2 left-2.5 text-[8.5px] sm:text-[9px] font-montserrat tracking-[0.2em] uppercase text-white font-medium">
                            {{ $weddingDateFormatted }}
                        </span>
                    </div>
                </div>

                <!-- Names in High-Fashion Cormorant Serif -->
                <div class="relative z-10 text-center my-1.5 sm:my-2">
                    <h1 class="font-cormorant text-2xl sm:text-3xl text-snow-dark tracking-tight leading-tight font-light">
                        {{ $couple->groom_name }}
                        @if($hasBride)
                            <span class="inline-block font-cormorant italic text-xl sm:text-2xl text-snow-muted mx-1">&amp;</span>
                            {{ $couple->bride_name }}
                        @endif
                    </h1>
                    <p class="font-cormorant italic text-[11px] sm:text-xs text-snow-muted mt-0.5 sm:mt-1">
                        "Like gentle snow falling upon winter silence, our hearts unite in grace."
                    </p>
                </div>

                <!-- Guest Personalized Greeting Card -->
                <div class="relative z-10 p-2.5 sm:p-3 bg-snow-ice/90 border border-snow-silver text-center my-1.5 sm:my-2">
                    <span class="text-[7.5px] sm:text-[8px] font-montserrat uppercase tracking-[0.25em] text-snow-muted block mb-0.5 font-bold">Special Invitation For:</span>
                    <p class="font-cormorant text-sm sm:text-base text-snow-dark font-semibold">{{ $guest->name ?? 'Tamu Terhormat' }}</p>
                    @if(!empty($guest->seat_table))
                        <span class="inline-block mt-0.5 text-[8.5px] sm:text-[9px] font-montserrat text-snow-slate font-medium tracking-wider">Table: {{ $guest->seat_table }}</span>
                    @endif
                </div>

                <!-- Open Invitation Action Button -->
                <div class="relative z-20 pt-1">
                    <button type="button" onclick="openInvitation()" class="w-full py-3 sm:py-3.5 px-5 sm:px-6 bg-snow-dark hover:bg-slate-800 text-white text-[10px] sm:text-xs font-montserrat font-semibold uppercase tracking-[0.25em] transition-all duration-300 shadow-md flex items-center justify-center gap-2 group cursor-pointer active:scale-98 pointer-events-auto">
                        <span>Buka Undangan</span>
                        <span class="transform transition-transform duration-300 group-hover:translate-x-1.5">→</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT CONTAINER (SnowFall Minimalist White Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[540px] mx-auto min-h-screen bg-white text-snow-dark shadow-2xl relative border-x border-snow-silver/60">

        <!-- Top Editorial Masthead -->
        <header class="pt-16 pb-12 px-8 text-center border-b border-snow-silver bg-snow-ice/50 relative">
            <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-2">
                {{ $couple->event_heading ?? ($isNonWedding ? 'Undangan Eksklusif' : 'The Wedding Monograph') }}
            </span>
            <h1 class="font-cormorant text-4xl sm:text-5xl text-snow-dark tracking-tight mt-1 mb-2 font-light">
                {{ $couple->groom_name }}
                @if($hasBride)
                    <span class="font-cormorant italic font-light text-3xl text-snow-muted mx-1">&amp;</span>
                    {{ $couple->bride_name }}
                @endif
            </h1>
            <div class="inline-flex items-center gap-2.5 text-xs font-montserrat text-snow-muted tracking-widest uppercase">
                <span>{{ $weddingDateFormatted }}</span>
                <span>•</span>
                <span>{{ $couple->venue_name ?? 'Indonesia' }}</span>
            </div>
            
            <div class="mt-6 flex justify-center">
                <span class="w-16 h-px bg-snow-silver"></span>
            </div>
        </header>

        <!-- Quote / Holy Scripture Section -->
        <section class="py-14 px-8 text-center bg-white border-b border-snow-silver">
            <div class="max-w-md mx-auto">
                <span class="text-2xl text-sky-400 block mb-3 font-cormorant">❄</span>
                <p class="font-cormorant text-xl sm:text-2xl text-snow-charcoal italic leading-relaxed font-light">
                    {{ $couple->quote ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}
                </p>
                <span class="inline-block mt-4 text-[9px] font-montserrat tracking-[0.3em] text-snow-muted uppercase font-bold">
                    {{ $couple->quote_source ?? 'QS. Ar-Rum: 21' }}
                </span>
            </div>
        </section>

        <!-- Couple Profile Section (High-Fashion Monochromatic Gallery) -->
        <section class="py-16 px-6 sm:px-8 border-b border-snow-silver bg-snow-ice/30">
            <div class="text-center mb-12">
                <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-1">THE COUPLE</span>
                <h2 class="font-cormorant text-3xl sm:text-4xl text-snow-dark font-light">Mempelai Berbahagia</h2>
            </div>

            <div class="space-y-12 max-w-md mx-auto">
                <!-- Groom Card -->
                <div class="bg-white p-6 sm:p-8 platinum-border shadow-sm text-center relative group">
                    <div class="w-32 h-40 sm:w-36 sm:h-44 mx-auto mb-5 overflow-hidden bg-snow-frost relative border border-snow-silver">
                        <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter contrast-[1.03]">
                    </div>
                    <span class="text-[9px] font-montserrat tracking-[0.25em] uppercase text-snow-muted font-bold block mb-1">
                        {{ $isNonWedding ? 'Penyelenggara Acara' : 'Mempelai Pria' }}
                    </span>
                    <h3 class="font-cormorant text-2xl sm:text-3xl font-semibold text-snow-dark">
                        {{ $couple->groom_fullname ?? $couple->groom_name }}
                    </h3>
                    @php
                        $snowGroomParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
                    @endphp
                    @if(!empty($snowGroomParents))
                        <p class="font-cormorant italic text-sm text-snow-slate mt-2">
                            {{ $couple->groom_birth_order ?? 'Putra tercinta dari' }}<br>
                            <span id="previewSnowGroomParentsText" class="font-medium text-snow-dark">{{ $snowGroomParents }}</span>
                        </p>
                    @endif
                </div>

                @if($hasBride)
                    <div class="text-center font-cormorant italic text-3xl text-snow-silver my-2">&amp;</div>

                    <!-- Bride Card -->
                    <div class="bg-white p-6 sm:p-8 platinum-border shadow-sm text-center relative group">
                        <div class="w-32 h-40 sm:w-36 sm:h-44 mx-auto mb-5 overflow-hidden bg-snow-frost relative border border-snow-silver">
                            <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter contrast-[1.03]">
                        </div>
                        <span class="text-[9px] font-montserrat tracking-[0.25em] uppercase text-snow-muted font-bold block mb-1">
                            Mempelai Wanita
                        </span>
                        <h3 class="font-cormorant text-2xl sm:text-3xl font-semibold text-snow-dark">
                            {{ $couple->bride_fullname ?? $couple->bride_name }}
                        </h3>
                        @php
                            $snowBrideParents = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? '');
                        @endphp
                        @if(!empty($snowBrideParents))
                            <p class="font-cormorant italic text-sm text-snow-slate mt-2">
                                {{ $couple->bride_birth_order ?? 'Putri tercinta dari' }}<br>
                                <span id="previewSnowBrideParentsText" class="font-medium text-snow-dark">{{ $snowBrideParents }}</span>
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </section>

        <!-- Events Schedule & Venue Details -->
        <section class="py-16 px-6 sm:px-8 border-b border-snow-silver bg-white">
            <div class="text-center mb-12">
                <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-1">ITINERARY</span>
                <h2 class="font-cormorant text-3xl sm:text-4xl text-snow-dark font-light">Rangkaian Acara</h2>
            </div>

            <div class="space-y-6 max-w-md mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @foreach($couple->events as $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted;
                        @endphp
                        <div class="p-6 sm:p-8 bg-snow-ice/40 platinum-border text-center relative hover:bg-white transition-all duration-300">
                            <span class="text-[9px] font-montserrat tracking-[0.3em] uppercase text-sky-700 font-bold block mb-2">
                                ❄ {{ $ev->title ?? 'Acara Utama' }}
                            </span>
                            <h3 class="font-cormorant text-2xl text-snow-dark font-semibold mb-2">
                                {{ $ev->title ?? 'Akad Nikah / Pemberkatan' }}
                            </h3>
                            <p class="font-cormorant italic text-base text-snow-slate mb-1">
                                {{ $evDateFormatted }}
                            </p>
                            <p class="font-montserrat text-xs text-snow-muted tracking-wider mb-4">
                                {{ $ev->start_time ?? '09:00 WIB' }} - {{ $ev->end_time ?? 'Selesai' }}
                            </p>
                            <div class="pt-4 border-t border-snow-silver/60">
                                <b class="font-cormorant text-lg text-snow-dark block">{{ $ev->venue_name ?? $couple->venue_name ?? 'Lokasi Acara' }}</b>
                                <p class="text-xs text-snow-slate mt-1 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap acara' }}</p>
                                @if(!empty($ev->maps_url))
                                    <a href="{{ $ev->maps_url }}" target="_blank" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 bg-snow-dark hover:bg-slate-800 text-white text-[10px] font-montserrat font-semibold tracking-[0.2em] uppercase transition shadow-sm">
                                        <span>Buka Google Maps</span>
                                        <span>↗</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback Single Event -->
                    <div class="p-6 sm:p-8 bg-snow-ice/40 platinum-border text-center">
                        <span class="text-[9px] font-montserrat tracking-[0.3em] uppercase text-sky-700 font-bold block mb-2">
                            ❄ Acara Utama
                        </span>
                        <h3 class="font-cormorant text-2xl text-snow-dark font-semibold mb-2">
                            {{ $couple->event_heading ?? 'Resepsi Pernikahan' }}
                        </h3>
                        <p class="font-cormorant italic text-base text-snow-slate mb-1">
                            {{ $weddingDateFormatted }}
                        </p>
                        <p class="font-montserrat text-xs text-snow-muted tracking-wider mb-4">
                            {{ $weddingTimeFormatted }} - Selesai
                        </p>
                        <div class="pt-4 border-t border-snow-silver/60">
                            <b class="font-cormorant text-lg text-snow-dark block">{{ $couple->venue_name ?? 'The Grand Ballroom' }}</b>
                            <p class="text-xs text-snow-slate mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Alamat venue utama pernikahan' }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Countdown Timer Clock -->
            <div class="mt-12 p-6 bg-snow-ice/60 platinum-border text-center max-w-md mx-auto">
                <span class="text-[9px] font-montserrat tracking-[0.3em] uppercase text-snow-muted font-bold block mb-4">
                    COUNTDOWN TO THE BIG DAY
                </span>
                <div class="grid grid-cols-4 gap-2 sm:gap-3">
                    <div class="p-3 bg-white border border-snow-silver">
                        <span id="cdDays" class="font-cormorant text-2xl sm:text-3xl font-light text-snow-dark block leading-none">00</span>
                        <span class="text-[9px] font-montserrat tracking-widest text-snow-muted uppercase mt-1 block">Hari</span>
                    </div>
                    <div class="p-3 bg-white border border-snow-silver">
                        <span id="cdHours" class="font-cormorant text-2xl sm:text-3xl font-light text-snow-dark block leading-none">00</span>
                        <span class="text-[9px] font-montserrat tracking-widest text-snow-muted uppercase mt-1 block">Jam</span>
                    </div>
                    <div class="p-3 bg-white border border-snow-silver">
                        <span id="cdMinutes" class="font-cormorant text-2xl sm:text-3xl font-light text-snow-dark block leading-none">00</span>
                        <span class="text-[9px] font-montserrat tracking-widest text-snow-muted uppercase mt-1 block">Menit</span>
                    </div>
                    <div class="p-3 bg-white border border-snow-silver">
                        <span id="cdSeconds" class="font-cormorant text-2xl sm:text-3xl font-light text-snow-dark block leading-none">00</span>
                        <span class="text-[9px] font-montserrat tracking-widest text-snow-muted uppercase mt-1 block">Detik</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Monochromatic Wedding Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800'],
                ];
            }
        @endphp
        <section class="py-16 px-6 sm:px-8 border-b border-snow-silver bg-white text-center">
            <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-1">MOMENTS OF ETERNITY</span>
            <h2 class="font-cormorant text-3xl sm:text-4xl text-snow-dark font-light mb-8">Galeri Cerita Kasih</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-md mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $gImgSrc = \App\Services\TemplateManager::resolvePhotoUrl(
                            is_object($gal) ? ($gal->image ?? null) : ($gal ?? null),
                            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'
                        );
                    @endphp
                    <div class="p-1 bg-snow-ice border border-snow-silver overflow-hidden shadow-sm">
                        <div class="aspect-[4/5] overflow-hidden bg-snow-silver/30">
                            <img src="{{ $gImgSrc }}" alt="Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Pure White Digital Envelope & Gift Registry -->
        <section class="py-16 px-6 sm:px-8 border-b border-snow-silver bg-snow-ice/20">
            <div class="text-center mb-10">
                <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-1">WEDDING GIFT</span>
                <h2 class="font-cormorant text-3xl sm:text-4xl text-snow-dark font-light">Tanda Kasih Digital</h2>
                <p class="font-cormorant italic text-sm text-snow-muted mt-2 max-w-sm mx-auto">
                    Doa restu Anda adalah anugerah terindah bagi kami. Jika ingin memberikan tanda kasih secara digital:
                </p>
            </div>

            <div class="space-y-4 max-w-md mx-auto">
                @php
                    $bankName1 = $couple->bank_name_1 ?? 'BCA';
                    $bankAcc1 = $couple->bank_account_1 ?? '8720194821';
                    $bankHolder1 = $couple->bank_holder_1 ?? $couple->groom_name;

                    $bankName2 = $couple->bank_name_2 ?? 'Mandiri';
                    $bankAcc2 = $couple->bank_account_2 ?? '1370019482910';
                    $bankHolder2 = $couple->bank_holder_2 ?? ($hasBride ? $couple->bride_name : 'Keluarga');
                @endphp

                <!-- Bank Card 1 -->
                <div class="p-5 bg-white platinum-border text-center relative shadow-sm">
                    <span class="text-[10px] font-montserrat tracking-widest uppercase text-snow-muted font-bold block mb-1">{{ $bankName1 }}</span>
                    <b class="font-mono text-lg text-snow-dark tracking-wider block mb-1">{{ $bankAcc1 }}</b>
                    <span class="text-xs text-snow-slate block mb-4">a.n. {{ $bankHolder1 }}</span>
                    <button type="button" onclick="copyToClipboard('{{ $bankAcc1 }}', 'Nomor rekening {{ $bankName1 }} berhasil disalin!')" class="px-5 py-2 bg-snow-ice hover:bg-snow-silver text-snow-dark border border-snow-silver text-[10px] font-montserrat font-semibold tracking-widest uppercase transition">
                        Salin Rekening
                    </button>
                </div>

                <!-- Bank Card 2 -->
                <div class="p-5 bg-white platinum-border text-center relative shadow-sm">
                    <span class="text-[10px] font-montserrat tracking-widest uppercase text-snow-muted font-bold block mb-1">{{ $bankName2 }}</span>
                    <b class="font-mono text-lg text-snow-dark tracking-wider block mb-1">{{ $bankAcc2 }}</b>
                    <span class="text-xs text-snow-slate block mb-4">a.n. {{ $bankHolder2 }}</span>
                    <button type="button" onclick="copyToClipboard('{{ $bankAcc2 }}', 'Nomor rekening {{ $bankName2 }} berhasil disalin!')" class="px-5 py-2 bg-snow-ice hover:bg-snow-silver text-snow-dark border border-snow-silver text-[10px] font-montserrat font-semibold tracking-widest uppercase transition">
                        Salin Rekening
                    </button>
                </div>
            </div>
        </section>

        <!-- RSVP & Wishes Section -->
        <section class="py-16 px-6 sm:px-8 border-b border-snow-silver bg-white">
            <div class="text-center mb-10">
                <span class="text-[9px] font-montserrat tracking-[0.35em] uppercase text-snow-muted font-bold block mb-1">GUESTBOOK &amp; RSVP</span>
                <h2 class="font-cormorant text-3xl sm:text-4xl text-snow-dark font-light">Doa &amp; Konfirmasi</h2>
            </div>

            <!-- Form -->
            <div class="max-w-md mx-auto bg-snow-ice/30 p-6 sm:p-8 platinum-border mb-10">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[9px] font-montserrat uppercase tracking-[0.2em] text-snow-muted font-bold mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 bg-white platinum-border text-xs text-snow-dark focus:outline-none focus:border-slate-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[9px] font-montserrat uppercase tracking-[0.2em] text-snow-muted font-bold mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 bg-white platinum-border text-xs text-snow-dark focus:outline-none focus:border-slate-500">
                            <option value="hadir">✓ Hadir Bersama Pasangan / Keluarga</option>
                            <option value="hadir_sendiri">✓ Hadir Sendiri</option>
                            <option value="tidak_hadir">✕ Mohon Maaf, Belum Dapat Hadir</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[9px] font-montserrat uppercase tracking-[0.2em] text-snow-muted font-bold mb-1">Doa &amp; Ucapan Selamat</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan dan doa terbaik Anda..." class="w-full px-4 py-2.5 bg-white platinum-border text-xs text-snow-dark focus:outline-none focus:border-slate-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 bg-snow-dark hover:bg-slate-800 text-white text-[10px] font-montserrat font-semibold tracking-[0.25em] uppercase transition">
                        Kirim Doa Restu &amp; RSVP
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-md mx-auto space-y-4">
                <h3 class="font-cormorant text-xl text-snow-dark font-semibold mb-3 flex items-center justify-between">
                    <span>Untaian Doa Tamu</span>
                    <span class="text-xs font-normal text-snow-muted font-montserrat">{{ isset($wishes) ? count($wishes) : 0 }} Pesan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-96 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->sender_name ?? $wish->name ?? 'Tamu Undangan';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 bg-snow-ice/50 platinum-border text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs font-cormorant font-bold text-snow-dark">{{ $wName }}</b>
                                    <span class="text-[9px] font-montserrat uppercase tracking-wider px-2 py-0.5 rounded bg-white text-snow-slate border border-snow-silver">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="font-cormorant italic text-sm text-snow-slate mt-1">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-6 bg-snow-ice/30 platinum-border text-center text-xs text-snow-muted italic font-cormorant">
                            Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer Colophon -->
        <footer class="py-12 px-8 text-center bg-slate-950 text-white">
            <p class="font-cormorant text-2xl text-snow-silver mb-1 font-light">
                {{ $couple->groom_name }}@if($hasBride) &amp; {{ $couple->bride_name }}@endif
            </p>
            <p class="font-cormorant text-xs italic text-snow-muted tracking-wider">
                Terima kasih atas segala cinta, doa, dan kehadiran Anda.
            </p>
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between text-[9px] font-montserrat text-white/40 tracking-widest uppercase">
                <span>D'KARSA DIGITAL INVITATION</span>
                <span class="mt-2 sm:mt-0">© {{ date('Y') }} ALL RIGHTS RESERVED</span>
            </div>
        </footer>

    </main>

    <!-- Snowfall Particle Animation Engine & Scripts -->
    <script>
        // Snowfall Particle Animation Engine
        (function initSnowfall() {
            const canvas = document.getElementById('snowCanvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const particles = [];
            const particleCount = Math.min(50, Math.floor(width / 20));

            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    radius: Math.random() * 2.5 + 0.8,
                    speedY: Math.random() * 0.8 + 0.4,
                    speedX: Math.random() * 0.5 - 0.25,
                    opacity: Math.random() * 0.7 + 0.3
                });
            }

            function drawSnow() {
                ctx.clearRect(0, 0, width, height);
                ctx.fillStyle = '#FFFFFF';

                for (let i = 0; i < particles.length; i++) {
                    const p = particles[i];
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255, 255, 255, ${p.opacity})`;
                    ctx.fill();

                    p.y += p.speedY;
                    p.x += p.speedX;

                    if (p.y > height) {
                        p.y = -5;
                        p.x = Math.random() * width;
                    }
                    if (p.x > width) p.x = 0;
                    if (p.x < 0) p.x = width;
                }
                requestAnimationFrame(drawSnow);
            }
            drawSnow();
        })();

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
                    audioIcon.textContent = '❄️';
                }).catch(e => console.log('Audio autoplay prevented:', e));
            }
        }

        // Open Invitation Action (Zero Vertical Jump)
        function openInvitation() {
            window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
            document.body.classList.remove('overflow-hidden');

            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.pointerEvents = 'none';
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

        // Countdown Timer Engine
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
                showToast('Doa restu Anda berhasil dikirim! Terima kasih.');
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Tamu Undangan';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 bg-snow-ice/50 platinum-border text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs font-cormorant font-bold text-snow-dark">${name}</b>
                            <span class="text-[9px] font-montserrat uppercase tracking-wider px-2 py-0.5 rounded bg-white text-snow-slate border border-snow-silver">${attend}</span>
                        </div>
                        <p class="font-cormorant italic text-sm text-snow-slate mt-1">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas doa restu Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for clean reset
        const defaultSnowGroomPhoto = "{{ $groomImg }}";
        const defaultSnowBridePhoto = "{{ $brideImg }}";
        const defaultSnowCoverPhoto = "{{ $coverImg }}";
        const defaultSnowGroomParents = @json($snowGroomParents ?? '');
        const defaultSnowBrideParents = @json($snowBrideParents ?? '');

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIndex) => {
                const div = document.createElement('div');
                div.className = 'p-1 bg-snow-ice border border-snow-silver overflow-hidden shadow-sm';
                div.innerHTML = `
                    <div class="aspect-[4/5] overflow-hidden bg-snow-silver/30">
                        <img src="${imgUrl}" alt="Moment ${gIndex + 1}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;
            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const photoUrl = data.photoUrl || data.dataUrl;
                if (data.target === 'groom' && photoUrl) {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (data.target === 'bride' && photoUrl) {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = photoUrl;
                } else if (data.target === 'cover' && photoUrl) {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                if (data.target === 'groom') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = data.defaultUrl || defaultSnowGroomPhoto;
                } else if (data.target === 'bride') {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = data.defaultUrl || defaultSnowBridePhoto;
                } else if (data.target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = data.defaultUrl || defaultSnowCoverPhoto;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_PARENTS') {
                const gpEl = document.getElementById('previewSnowGroomParentsText');
                if (gpEl) {
                    if (data.groomParents) {
                        gpEl.textContent = data.groomParents;
                    } else if (data.resetDefault) {
                        gpEl.textContent = defaultSnowGroomParents;
                    }
                }
                const bpEl = document.getElementById('previewSnowBrideParentsText');
                if (bpEl) {
                    if (data.brideParents) {
                        bpEl.textContent = data.brideParents;
                    } else if (data.resetDefault) {
                        bpEl.textContent = defaultSnowBrideParents;
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
