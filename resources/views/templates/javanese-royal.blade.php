<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Serat Ulem') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }} | 3D Javanese Royal D'Karsa</title>
    <meta name="description" content="Serat Ulem Dhauping Penganten {{ $couple->groom_name }} & {{ $couple->bride_name }} - Nuansa Keraton Jawa 3D.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Serat Ulem') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }}">
    <meta property="og:description" content="Serat Ulem Dhauping Penganten. Mugi Gusti Kang Murbeng Dumadi tansah paring berkah lan karaharjan.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Great+Vibes&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        keraton: {
                            black: '#120d09',
                            dark: '#1b140e',
                            card: '#241a12',
                            gold: '#d4af37',
                            lightgold: '#f6e4a6',
                            bronze: '#8c6d2d',
                            cream: '#f9f5eb',
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        script: ['Great Vibes', 'cursive'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Ambient Floating Gold Dust */
        @keyframes gold-dust {
            0% { transform: translate3d(0, 100vh, 0) scale(0.5); opacity: 0; }
            20% { opacity: 0.8; }
            80% { opacity: 0.8; }
            100% { transform: translate3d(var(--sway, 20px), -10vh, 0) scale(1.2); opacity: 0; }
        }
        .dust-speck {
            position: absolute;
            bottom: -20px;
            pointer-events: none;
            border-radius: 50%;
            background: #d4af37;
            box-shadow: 0 0 6px #f6e4a6;
            z-index: 25;
        }

        /* 3D Floating Gunungan Wayang */
        @keyframes float-gunungan {
            0%, 100% { transform: translateY(0px) rotateY(0deg); }
            50% { transform: translateY(-10px) rotateY(6deg); }
        }
        .gunungan-3d {
            animation: float-gunungan 5s ease-in-out infinite;
            filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.45));
        }

        /* Royal Gold Pulse Button */
        @keyframes royal-pulse {
            0% { transform: scale(0.96); box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.7); }
            70% { transform: scale(1.04); box-shadow: 0 0 0 16px rgba(212, 175, 55, 0); }
            100% { transform: scale(0.96); box-shadow: 0 0 0 0 rgba(212, 175, 55, 0); }
        }
        .royal-pulse-btn {
            animation: royal-pulse 2.6s infinite;
        }

        /* Batik Parang / Royal Border */
        .batik-bg {
            background-color: #120d09;
            background-image: radial-gradient(#d4af37 0.8px, transparent 0.8px), radial-gradient(#8c6d2d 0.8px, #120d09 0.8px);
            background-size: 32px 32px;
            background-position: 0 0, 16px 16px;
        }
        .royal-card {
            background: #1e150f;
            border: 2px solid #8c6d2d;
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.8);
            position: relative;
        }
        .royal-card::before {
            content: "✦";
            position: absolute;
            top: 8px;
            left: 10px;
            color: #d4af37;
            font-size: 14px;
        }
        .royal-card::after {
            content: "✦";
            position: absolute;
            bottom: 8px;
            right: 10px;
            color: #d4af37;
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-black text-keraton-cream font-sans antialiased selection:bg-keraton-gold selection:text-black">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200');
        $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600');
        $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $jvGroomParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bpk. & Ibu Keluarga');
        $jvBrideParents = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bpk. & Ibu Keluarga');
    @endphp

    <!-- Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Control Button -->
    <div id="audioFloatingBtn" class="fixed top-6 right-6 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-keraton-dark text-keraton-gold border-2 border-keraton-gold shadow-2xl flex items-center justify-center hover:scale-110 transition active:scale-95" title="Gending / Musik Pengiring">
            <span id="audioDiscIcon" class="text-xl animate-spin" style="animation-duration: 5s;">🎵</span>
        </button>
    </div>

    <!-- Ambient Floating Gold Dust -->
    <div id="ambientGoldDust" class="fixed inset-0 pointer-events-none overflow-hidden z-30"></div>

    <!-- ========================================================
         COVER SCREEN (3D Gunungan Wayang Kulit & Royal Gold)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain flex flex-col bg-gradient-to-b from-[#140e0a] via-[#1b130d] to-[#0c0805] text-keraton-cream p-3 sm:p-4 transition-all duration-700 ease-in-out">
        <div class="min-h-full flex flex-col justify-center items-center my-auto py-2 sm:py-3 w-full">
            <div id="previewCoverBg" class="fixed inset-0 bg-cover bg-center opacity-20 mix-blend-luminosity pointer-events-none" style="background-image: url('{{ $coverImg }}');"></div>

            <!-- Center Royal Frame -->
            <div class="relative z-10 w-full max-w-sm sm:max-w-md bg-gradient-to-b from-[#221810]/95 to-[#150e09]/95 border-2 border-keraton-gold rounded-[32px] sm:rounded-[38px] p-5 sm:p-8 text-center shadow-[0_25px_60px_rgba(0,0,0,0.9)] backdrop-blur-md my-auto">
                
                <!-- 3D Wayang Gunungan Silhouette SVG -->
                <div class="w-16 h-22 sm:w-20 sm:h-28 mx-auto mb-1.5 gunungan-3d flex items-center justify-center text-keraton-gold">
                    <svg viewBox="0 0 100 130" class="w-full h-full fill-current">
                        <!-- Gunungan Wayang Shape -->
                        <path d="M50 5 Q70 30 85 65 Q95 90 90 115 L10 115 Q5 90 15 65 Q30 30 50 5 Z" fill="url(#goldGradient)" stroke="#f6e4a6" stroke-width="2"/>
                        <!-- Ornamen Pohon Hayat & Pintu Gapura -->
                        <rect x="42" y="85" width="16" height="30" rx="3" fill="#120d09" stroke="#d4af37" stroke-width="1.5"/>
                        <circle cx="50" cy="50" r="14" fill="none" stroke="#f6e4a6" stroke-width="1.5"/>
                        <path d="M50 20 L50 80 M35 50 L65 50" stroke="#f6e4a6" stroke-width="1.2"/>
                        <defs>
                            <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#d4af37" />
                                <stop offset="50%" stop-color="#8c6d2d" />
                                <stop offset="100%" stop-color="#f6e4a6" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <p class="font-cinzel text-[11px] sm:text-xs tracking-[0.3em] text-keraton-gold uppercase font-bold mt-1">
                    {{ $couple->event_heading ?? "SERAT ULEM PAHARGYAN" }}
                </p>
                <p class="text-[10px] sm:text-[11px] text-keraton-lightgold/80 tracking-widest uppercase mt-0.5 mb-2.5 sm:mb-3">Dhauping Penganten</p>

                <!-- Couple Names -->
                <div class="my-2.5 sm:my-4">
                    <h1 class="font-serif text-3xl sm:text-5xl font-bold text-white drop-shadow-md leading-tight">
                        {{ $couple->groom_name }}
                    </h1>
                    <div class="font-cinzel text-lg sm:text-xl text-keraton-gold my-0.5 sm:my-1 tracking-widest">&amp;</div>
                    <h1 class="font-serif text-3xl sm:text-5xl font-bold text-white drop-shadow-md leading-tight">
                        {{ $couple->bride_name }}
                    </h1>
                </div>

                <div class="w-16 sm:w-20 h-0.5 bg-keraton-gold/50 mx-auto my-2.5 sm:my-3"></div>

                <p class="font-cinzel text-[11px] sm:text-xs text-keraton-lightgold/90 mb-3 sm:mb-5 tracking-wider">
                    {{ $weddingDateFormatted }}
                </p>

                <!-- Guest Card -->
                <div class="p-2.5 sm:p-3.5 rounded-2xl bg-black/60 border border-keraton-gold/30 text-xs mb-4 sm:mb-6">
                    <span class="text-[9.5px] sm:text-[10px] text-keraton-lightgold/70 uppercase tracking-widest block font-cinzel">Katur Dhumateng Panjenenganipun:</span>
                    <b class="text-sm sm:text-base text-white block mt-0.5 sm:mt-1 font-serif">{{ $guest->name ?? 'Bapak / Ibu / Saudara/i' }}</b>
                </div>

                <!-- "Buka Serat Ulem" Royal Button -->
                <div class="pt-1">
                    <button type="button" onclick="openInvitation()" class="royal-pulse-btn w-full py-3 sm:py-3.5 px-6 rounded-full bg-gradient-to-r from-keraton-gold via-keraton-lightgold to-keraton-gold text-keraton-dark font-cinzel text-xs font-black uppercase tracking-widest shadow-2xl hover:brightness-110 active:scale-95 transition flex items-center justify-center gap-2 relative z-20 pointer-events-auto">
                        <span>📜</span> Buka Serat Ulem
                    </button>
                </div>

                @if(!empty($isDemo))
                    <div class="mt-3">
                        <span class="inline-block px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-bold bg-white/20 text-white/90 border border-white/20">
                            ✨ Mode Demo Template: Keraton Jawa Royal
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT (Royal Keraton Jawa)
         ======================================================== -->
    <main id="mainContent" class="max-w-[480px] mx-auto min-h-screen bg-keraton-dark text-keraton-cream shadow-2xl relative overflow-hidden batik-bg border-x-2 border-keraton-gold/40">

        <!-- Header Hero -->
        <header class="relative pt-10 pb-12 px-6 text-center bg-gradient-to-b from-[#2b1f15] to-keraton-dark rounded-b-[44px] border-b-2 border-keraton-gold shadow-xl">
            <span class="font-cinzel text-xs text-keraton-gold tracking-[0.25em] uppercase block mb-1">Serat Ulem Dhaup</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white my-2">
                {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
            </h2>
            <p class="font-cinzel text-xs text-keraton-lightgold">{{ $weddingDateFormatted }}</p>
            <div class="mt-3 inline-block px-4 py-1 rounded-full bg-black/40 border border-keraton-gold/40 text-[11px] text-keraton-gold font-medium font-cinzel">
                🏛️ {{ $couple->venue_name ?? 'Pendopo Agung Ndalem Mangkubumen' }}
            </div>
        </header>

        <!-- Doa / Serat Pembuka -->
        <section class="py-8 px-5">
            <div class="royal-card rounded-3xl p-6 text-center space-y-3">
                <span class="text-xs font-cinzel font-bold text-keraton-gold uppercase tracking-widest block">Atur Pambagyo Harjo</span>
                <h3 class="font-serif text-lg text-white">Bismillahirrohmanirrohim</h3>
                <p class="text-xs sm:text-sm text-keraton-cream/85 italic leading-relaxed font-serif">
                    "{{ $couple->quote ?? 'Mugi Gusti Kang Murbeng Dumadi tansah paring berkah, karaharjan, lan katentreman ing salebeting mbangun bale wisma, dados kulawarga ingkang sakinah, mawaddah, warahmah.' }}"
                </p>
            </div>
        </section>

        <!-- ========================================================
             MEMPELAI KAKUNG & MEMPELAI PUTRI
             ======================================================== -->
        <section class="py-6 px-5 space-y-6">
            <div class="text-center">
                <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Penganten Kekalih</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Mempelai Kakung &amp; Putri</h3>
                <div class="w-16 h-0.5 bg-keraton-gold mx-auto mt-2"></div>
            </div>

            <!-- Mempelai Kakung (Groom) -->
            <div class="royal-card rounded-3xl p-6 flex flex-col items-center text-center">
                <div class="relative w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-keraton-gold via-keraton-lightgold to-keraton-gold shadow-xl mb-4">
                    <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_fullname }}" class="w-full h-full rounded-full object-cover">
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-keraton-black text-keraton-gold text-[9px] font-bold font-cinzel uppercase tracking-wider border border-keraton-gold shadow">
                        Mempelai Kakung
                    </span>
                </div>
                <h4 class="font-serif text-xl font-bold text-white mt-2">{{ $couple->groom_fullname }}</h4>
                <p class="text-xs text-keraton-gold font-semibold mt-0.5 font-cinzel">{{ $couple->groom_birth_order ?? 'Putra Sulung' }}</p>
                <p class="text-xs text-keraton-cream/80 mt-1 leading-relaxed">
                    Putra saking <span id="previewGroomParentsText">{{ $jvGroomParents }}</span>
                    @if(!empty($couple->groom_city))
                        <br><span class="text-[11px] text-keraton-gold/80">{{ $couple->groom_city }}</span>
                    @endif
                </p>
            </div>

            <!-- Divider Keris / Gunungan -->
            <div class="flex items-center justify-center gap-3">
                <div class="flex-1 h-px bg-keraton-gold/40"></div>
                <span class="text-keraton-gold font-cinzel text-base">⚜️</span>
                <div class="flex-1 h-px bg-keraton-gold/40"></div>
            </div>

            <!-- Mempelai Putri (Bride) -->
            <div class="royal-card rounded-3xl p-6 flex flex-col items-center text-center">
                <div class="relative w-28 h-28 rounded-full p-1 bg-gradient-to-tr from-keraton-gold via-keraton-lightgold to-keraton-gold shadow-xl mb-4">
                    <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_fullname }}" class="w-full h-full rounded-full object-cover">
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-keraton-black text-keraton-gold text-[9px] font-bold font-cinzel uppercase tracking-wider border border-keraton-gold shadow">
                        Mempelai Putri
                    </span>
                </div>
                <h4 class="font-serif text-xl font-bold text-white mt-2">{{ $couple->bride_fullname }}</h4>
                <p class="text-xs text-keraton-gold font-semibold mt-0.5 font-cinzel">{{ $couple->bride_birth_order ?? 'Putri Penengah' }}</p>
                <p class="text-xs text-keraton-cream/80 mt-1 leading-relaxed">
                    Putri saking <span id="previewBrideParentsText">{{ $jvBrideParents }}</span>
                    @if(!empty($couple->bride_city))
                        <br><span class="text-[11px] text-keraton-gold/80">{{ $couple->bride_city }}</span>
                    @endif
                </p>
            </div>
        </section>

        <!-- ========================================================
             SAVE THE DATE & COUNTDOWN
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="royal-card rounded-3xl p-6 text-center">
                <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Dinten Pahargyan</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Petungan Dinten Sae</h3>
                <p class="text-xs text-keraton-cream/70 mt-1 mb-6">{{ $weddingDateFormatted }}</p>

                <div class="grid grid-cols-4 gap-2 mb-6">
                    <div class="p-3 rounded-2xl bg-black/60 border border-keraton-gold/40">
                        <span id="jvDays" class="font-serif text-2xl font-bold text-keraton-gold block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-keraton-lightgold/70 block mt-1 font-cinzel">Dinten</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-black/60 border border-keraton-gold/40">
                        <span id="jvHours" class="font-serif text-2xl font-bold text-keraton-gold block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-keraton-lightgold/70 block mt-1 font-cinzel">Jam</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-black/60 border border-keraton-gold/40">
                        <span id="jvMins" class="font-serif text-2xl font-bold text-keraton-gold block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-keraton-lightgold/70 block mt-1 font-cinzel">Menit</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-black/60 border border-keraton-gold/40">
                        <span id="jvSecs" class="font-serif text-2xl font-bold text-keraton-gold block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-keraton-lightgold/70 block mt-1 font-cinzel">Detik</span>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Dhaup') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Pahargyan Dhauping ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&location={{ urlencode($couple->venue_name ?? 'Lokasi Acara') }}" 
                   target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-keraton-gold hover:bg-keraton-lightgold text-keraton-dark font-cinzel text-xs font-bold uppercase tracking-widest shadow-lg transition">
                    <span>📅</span> Simpen Wekdal wonten Google Calendar
                </a>
            </div>
        </section>

        <!-- ========================================================
             AGENDA PAHARGYAN (TIMELINE)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="text-center mb-6">
                <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Tata Lampah Acara</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Agenda Pahargyan</h3>
                <div class="w-16 h-0.5 bg-keraton-gold mx-auto mt-2"></div>
            </div>

            <div class="space-y-5">
                @forelse($couple->events as $ev)
                    <div class="royal-card rounded-3xl p-6 text-center space-y-2">
                        <div class="w-10 h-10 rounded-full bg-keraton-gold/20 border border-keraton-gold text-keraton-gold flex items-center justify-center mx-auto text-sm font-bold">
                            ⚜️
                        </div>
                        <h4 class="font-serif text-xl font-bold text-keraton-gold">{{ $ev->title }}</h4>
                        <p class="font-semibold text-xs text-white">
                            📅 {{ !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted }}
                        </p>
                        <p class="text-xs font-bold text-keraton-lightgold">
                            ⏰ {{ $ev->start_time ?? '08:00 WIB' }} - {{ $ev->end_time ?? 'Selesai' }}
                        </p>
                        <p class="text-xs font-bold text-white pt-1">
                            🏛️ {{ $ev->venue_name }}
                        </p>
                        @if(!empty($ev->address))
                            <p class="text-[11px] text-keraton-cream/70 px-4 leading-relaxed">{{ $ev->address }}</p>
                        @endif

                        @if(!empty($ev->maps_url))
                            <div class="pt-3">
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-5 py-2 rounded-full bg-keraton-gold hover:bg-keraton-lightgold text-keraton-dark text-xs font-bold shadow-md transition font-cinzel">
                                    <span>📍</span> Peta Google Maps
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="royal-card rounded-3xl p-6 text-center">
                        <h4 class="font-serif text-lg font-bold text-keraton-gold">Akad Ijab Kabul &amp; Resepsi</h4>
                        <p class="text-xs text-keraton-cream/70 mt-2">{{ $couple->venue_name ?? 'Lokasi Acara' }}</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- ========================================================
             GALERI KENANGAN
             ======================================================== -->
        @php
            $galleryItems = $couple->galleries && $couple->galleries->count() > 0 ? $couple->galleries : collect([
                (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800'],
            ]);
        @endphp

        <section class="py-8 px-5">
            <div class="text-center mb-6">
                <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Dokumentasi</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Galeri Potret Bahagia</h3>
                <div class="w-16 h-0.5 bg-keraton-gold mx-auto mt-2"></div>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @foreach($galleryItems as $idx => $g)
                    @php
                        $gImg = \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800');
                    @endphp
                    <div class="aspect-square rounded-2xl overflow-hidden border border-keraton-gold/50 bg-black shadow-lg cursor-pointer group" onclick="openLightbox('{{ $gImg }}')">
                        <img src="{{ $gImg }}" alt="Foto {{ $idx+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ========================================================
             TANDA TRESNO / AMPLOP DIGITAL
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="royal-card rounded-3xl p-6 sm:p-7 text-center">
                <div class="w-12 h-12 rounded-full bg-keraton-gold/20 border border-keraton-gold flex items-center justify-center mx-auto mb-2 text-xl text-keraton-gold">
                    🪙
                </div>
                <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Tanda Tresno</span>
                <h3 class="font-serif text-2xl font-bold text-white mt-1">Amplop Digital</h3>
                <p class="text-xs text-keraton-cream/75 mt-1 mb-6 leading-relaxed">
                    Donga pangestu panjenengan sami punika dados nugraha ingkang tanpa upami. Tumrap panjenengan ingkang badhe maringi tandha katresnan sacara digital:
                </p>

                <div class="space-y-3">
                    @if(!empty($couple->bank_account_1))
                        <div class="p-3.5 rounded-2xl bg-black/60 border border-keraton-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-keraton-gold uppercase tracking-wider block font-cinzel">{{ $couple->bank_name_1 ?? 'BANK' }}</span>
                                <b class="font-mono text-sm text-white block mt-0.5">{{ $couple->bank_account_1 }}</b>
                                <span class="text-[11px] text-keraton-cream/60 block">a.n {{ $couple->bank_holder_1 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_1 }}', this)" class="px-3 py-1 rounded-full bg-keraton-gold text-keraton-dark text-[11px] font-bold font-cinzel uppercase shadow hover:bg-keraton-lightgold transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->bank_account_2))
                        <div class="p-3.5 rounded-2xl bg-black/60 border border-keraton-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-keraton-gold uppercase tracking-wider block font-cinzel">{{ $couple->bank_name_2 ?? 'BANK' }}</span>
                                <b class="font-mono text-sm text-white block mt-0.5">{{ $couple->bank_account_2 }}</b>
                                <span class="text-[11px] text-keraton-cream/60 block">a.n {{ $couple->bank_holder_2 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_2 }}', this)" class="px-3 py-1 rounded-full bg-keraton-gold text-keraton-dark text-[11px] font-bold font-cinzel uppercase shadow hover:bg-keraton-lightgold transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(empty($couple->bank_account_1) && empty($couple->bank_account_2))
                        <div class="p-3.5 rounded-2xl bg-black/60 border border-keraton-gold/40 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-keraton-gold uppercase tracking-wider block font-cinzel">BCA (Demo)</span>
                                <b class="font-mono text-sm text-white block mt-0.5">0372918291</b>
                                <span class="text-[11px] text-keraton-cream/60 block">a.n {{ $couple->groom_name }}</span>
                            </div>
                            <button type="button" onclick="copyText('0372918291', this)" class="px-3 py-1 rounded-full bg-keraton-gold text-keraton-dark text-[11px] font-bold font-cinzel uppercase shadow hover:bg-keraton-lightgold transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->gift_address))
                        <div class="p-3 rounded-2xl bg-black/40 border border-keraton-gold/20 text-xs text-keraton-cream/70 text-left">
                            <b class="text-keraton-gold block mb-0.5">📦 Kirim Kado Fisik:</b>
                            <p class="text-[11px] leading-relaxed">{{ $couple->gift_address }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- ========================================================
             BUKU RAWUH & DONGA PANGESTU (RSVP & WISHES)
             ======================================================== -->
        <section class="py-8 px-5">
            <div class="royal-card rounded-3xl p-6 sm:p-7">
                <div class="text-center mb-6">
                    <span class="font-cinzel text-xs font-bold text-keraton-gold tracking-[0.25em] uppercase block">Buku Rawuh</span>
                    <h3 class="font-serif text-2xl font-bold text-white mt-1">Donga Pangestu</h3>
                    <div class="w-16 h-0.5 bg-keraton-gold mx-auto mt-2"></div>
                </div>

                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3.5 mb-7">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Asma Jangkep Panjenengan"
                               class="w-full px-4 py-2.5 rounded-xl border border-keraton-gold/40 bg-black/50 text-white text-xs focus:ring-2 focus:ring-keraton-gold focus:outline-none">
                    </div>

                    <div>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-keraton-gold/40 bg-black/50 text-white text-xs focus:ring-2 focus:ring-keraton-gold focus:outline-none">
                            <option value="hadir">InsyaAllah Saged Rawuh</option>
                            <option value="tidak_hadir">Nyuwun Pangapunten Mboten Saged Rawuh</option>
                            <option value="ragu">Taksih Ngrancang Wekdal</option>
                        </select>
                    </div>

                    <div>
                        <textarea name="message" rows="3" required placeholder="Serat donga pangestu kagem penganten kekalih..."
                                  class="w-full p-3.5 rounded-xl border border-keraton-gold/40 bg-black/50 text-white text-xs focus:ring-2 focus:ring-keraton-gold focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-full bg-keraton-gold hover:bg-keraton-lightgold text-keraton-dark text-xs font-bold uppercase tracking-wider font-cinzel shadow transition">
                        Kintun Donga Pangestu 🕊️
                    </button>
                </form>

                <div class="space-y-3 max-h-72 overflow-y-auto pr-1" style="scrollbar-width: thin;">
                    @forelse($wishes as $w)
                        <div class="p-3.5 rounded-2xl bg-black/50 border border-keraton-gold/30 text-xs">
                            <div class="flex items-center justify-between">
                                <b class="text-keraton-gold font-serif">{{ $w->name }}</b>
                                <span class="text-[10px] text-keraton-cream/40">{{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->diffForHumans() : 'Nembe kemawon' }}</span>
                            </div>
                            <p class="text-keraton-cream/80 mt-1 leading-relaxed">{{ $w->message }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6 text-keraton-cream/40 text-xs">
                            Dereng wonten serat donga. Dados tiyang sepisanan ingkang maringi donga pangestu!
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="pt-8 pb-14 px-6 text-center bg-gradient-to-t from-black to-keraton-dark border-t-2 border-keraton-gold/50 text-keraton-cream/70">
            <span class="text-keraton-gold text-2xl block mb-2">⚜️</span>
            <p class="font-serif text-lg font-bold text-white">{{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</p>
            <p class="text-xs text-keraton-cream/60 mt-1">Matur nuwun sanget awit saking sih kawigatosan lan donga pangestunipun.</p>
            <div class="mt-6 pt-4 border-t border-keraton-gold/20 text-[10px] text-keraton-cream/40 font-cinzel">
                Karya adi luhung dening <b class="text-keraton-gold">D'Karsa</b> Digital Invitation
            </div>
        </footer>

    </main>

    <!-- Lightbox Modal -->
    <div id="lightboxModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-md flex items-center justify-center p-4" onclick="closeLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-keraton-gold transition">&times;</button>
        <img id="lightboxImage" src="" alt="Enlarged" class="max-w-full max-h-[90vh] rounded-2xl border-2 border-keraton-gold shadow-2xl" onclick="event.stopPropagation()">
    </div>

    <!-- Scripts -->
    <script>
        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            cover.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                cover.classList.add('hidden');
            }, 700);

            const audio = document.getElementById('invitationAudio');
            const floatingBtn = document.getElementById('audioFloatingBtn');
            if (audio) {
                audio.play().then(() => {
                    if (floatingBtn) floatingBtn.classList.remove('hidden');
                }).catch(e => {
                    if (floatingBtn) floatingBtn.classList.remove('hidden');
                });
            }

            initGoldDust();
        }

        function toggleAudio() {
            const audio = document.getElementById('invitationAudio');
            const disc = document.getElementById('audioDiscIcon');
            if (!audio) return;
            if (audio.paused) {
                audio.play();
                if (disc) disc.classList.add('animate-spin');
            } else {
                audio.pause();
                if (disc) disc.classList.remove('animate-spin');
            }
        }

        function initGoldDust() {
            const container = document.getElementById('ambientGoldDust');
            if (!container) return;
            container.innerHTML = '';

            for (let i = 0; i < 22; i++) {
                const el = document.createElement('div');
                el.className = 'dust-speck';
                const size = Math.floor(Math.random() * 4) + 2;
                const left = Math.random() * 100;
                const dur = Math.random() * 8 + 10;
                const delay = -(Math.random() * 10);
                const sway = (Math.random() * 40 - 20) + 'px';

                el.style.width = size + 'px';
                el.style.height = size + 'px';
                el.style.left = left + '%';
                el.style.setProperty('--sway', sway);
                el.style.animation = `gold-dust ${dur}s ease-in-out ${delay}s infinite`;
                container.appendChild(el);
            }
        }

        const targetDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}");
        function updateJvCountdown() {
            const now = new Date().getTime();
            const diff = targetDate.getTime() - now;

            if (diff <= 0) {
                document.getElementById('jvDays').textContent = '00';
                document.getElementById('jvHours').textContent = '00';
                document.getElementById('jvMins').textContent = '00';
                document.getElementById('jvSecs').textContent = '00';
                return;
            }

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('jvDays').textContent = String(d).padStart(2, '0');
            document.getElementById('jvHours').textContent = String(h).padStart(2, '0');
            document.getElementById('jvMins').textContent = String(m).padStart(2, '0');
            document.getElementById('jvSecs').textContent = String(s).padStart(2, '0');
        }
        setInterval(updateJvCountdown, 1000);
        updateJvCountdown();

        function copyText(val, btn) {
            navigator.clipboard.writeText(val).then(() => {
                const oldText = btn.textContent;
                btn.textContent = 'Kasalin! ✓';
                btn.classList.add('!bg-green-600', '!text-white');
                setTimeout(() => {
                    btn.textContent = oldText;
                    btn.classList.remove('!bg-green-600', '!text-white');
                }, 2000);
            });
        }

        function openLightbox(url) {
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            if (modal && img) {
                img.src = url;
                modal.classList.remove('hidden');
            }
        }
        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            if (modal) modal.classList.add('hidden');
        }

        if (new URLSearchParams(window.location.search).get('open') === '1') {
            setTimeout(openInvitation, 300);
        }

        // Default template assets & texts for live preview reset
        const defaultGroomPhoto = "{{ $groomImg }}";
        const defaultBridePhoto = "{{ $brideImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultGroomParents = @json($jvGroomParents);
        const defaultBrideParents = @json($jvBrideParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, idx) => {
                const div = document.createElement('div');
                div.className = 'aspect-square rounded-2xl overflow-hidden border border-keraton-gold/50 bg-black shadow-lg cursor-pointer group';
                div.onclick = function() { openLightbox(imgUrl); };
                div.innerHTML = `<img src="${imgUrl}" alt="Foto ${idx + 1}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">`;
                container.appendChild(div);
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
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
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
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.defaultUrl || defaultCoverPhoto}')`;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
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

        // Handshake: notify parent window that iframe is ready to receive data
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    </script>
</body>
</html>
