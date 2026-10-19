<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }} | Wildflower Pink D'Karsa</title>
    <meta name="description" content="Undangan Digital Romantis {{ $couple->groom_name }} & {{ $couple->bride_name }} - Desain Wildflower Pink.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name }}">
    <meta property="og:description" content="Kami mengundang Anda untuk merayakan hari bahagia pernikahan kami.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blush: {
                            50: '#fff7f8',
                            100: '#ffeff1',
                            200: '#fde2e6',
                            300: '#f9cad2',
                            400: '#f4a5b4',
                            500: '#e5728a',
                            600: '#c94a65',
                            700: '#a3364e',
                            800: '#7e2439',
                            900: '#5c1626',
                        },
                        botanical: {
                            cream: '#fdfbf7',
                            sage: '#60725c',
                            darksage: '#3e4c3c',
                            gold: '#c59b27',
                            wax: '#b23b53',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        garamond: ['Cormorant Garamond', 'serif'],
                        script: ['Great Vibes', 'cursive'],
                        brush: ['Alex Brush', 'cursive'],
                        sans: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Falling Rose Petals */
        @keyframes petal-fall {
            0% { transform: translate3d(0, -30px, 0) rotate(0deg); opacity: 0; }
            15% { opacity: 0.85; }
            85% { opacity: 0.85; }
            100% { transform: translate3d(var(--sway, 30px), 105vh, 0) rotate(270deg); opacity: 0; }
        }
        .petal-particle {
            position: absolute;
            top: -20px;
            pointer-events: none;
            z-index: 25;
            color: #e5728a;
        }

        /* Wax Seal Pulse */
        @keyframes seal-pulse {
            0% { transform: scale(0.96); box-shadow: 0 0 0 0 rgba(178, 59, 83, 0.6); }
            70% { transform: scale(1.04); box-shadow: 0 0 0 16px rgba(178, 59, 83, 0); }
            100% { transform: scale(0.96); box-shadow: 0 0 0 0 rgba(178, 59, 83, 0); }
        }
        .wax-seal-btn {
            animation: seal-pulse 2.4s infinite;
        }

        /* Arch Windows & Watercolor Frames */
        .arch-window {
            border-top-left-radius: 130px;
            border-top-right-radius: 130px;
        }
        .floral-card {
            background: #ffffff;
            border: 1px solid #f9cad2;
            box-shadow: 0 10px 30px -5px rgba(229, 114, 138, 0.12);
        }

        /* Polaroid Photo Effect */
        .polaroid-frame {
            background: #ffffff;
            padding: 10px 10px 24px 10px;
            box-shadow: 0 8px 20px -3px rgba(0, 0, 0, 0.12);
            border-radius: 6px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .polaroid-frame:hover {
            transform: translateY(-4px) rotate(1deg);
        }
    </style>
</head>
<body class="bg-[#3a2026] text-neutral-800 font-sans antialiased selection:bg-blush-300 selection:text-blush-900">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200');
        $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600');
        $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $wfGroomParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bpk. Hendra & Ibu Ratna');
        $wfBrideParents = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bpk. Surya & Ibu Dewi');
    @endphp

    <!-- Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Control Button -->
    <div id="audioFloatingBtn" class="fixed top-6 right-6 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white/95 text-blush-700 border-2 border-blush-300 shadow-xl flex items-center justify-center hover:scale-110 transition active:scale-95" title="Musik Undangan">
            <span id="audioDiscIcon" class="text-xl animate-spin" style="animation-duration: 4s;">🌸</span>
        </button>
    </div>

    <!-- Ambient Falling Petals -->
    <div id="ambientPetalsContainer" class="fixed inset-0 pointer-events-none overflow-hidden z-30"></div>

    <!-- ========================================================
         COVER SCREEN (Wildflower Arched Window with Wax Seal)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-b from-[#fbf5f4] via-[#f7e6e9] to-[#edd0d6] text-blush-900 p-4 transition-all duration-700 ease-in-out">
        
        <!-- Center Arched Frame -->
        <div class="relative z-10 w-full max-w-sm bg-white/95 border-2 border-blush-200 rounded-[44px] arch-window p-7 sm:p-9 text-center shadow-2xl backdrop-blur-md">
            
            <!-- Delicate Botanical Wreath SVG Header -->
            <div class="w-16 h-16 mx-auto mb-3 flex items-center justify-center text-blush-500">
                <svg viewBox="0 0 100 100" class="w-full h-full fill-current">
                    <path d="M50 15 C30 15 15 30 15 50 C15 70 30 85 50 85 C70 85 85 70 85 50 C85 30 70 15 50 15 Z" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="4 3"/>
                    <circle cx="50" cy="50" r="28" fill="none" stroke="#c59b27" stroke-width="1"/>
                    <path d="M50 25 C52 35 60 40 70 42 C60 44 52 50 50 60 C48 50 40 44 30 42 C40 40 48 35 50 25 Z" fill="#b23b53" opacity="0.3"/>
                </svg>
            </div>

            <p class="font-garamond text-xs tracking-[0.25em] text-botanical-sage uppercase font-bold">
                {{ $couple->event_heading ?? "THE WEDDING CELEBRATION" }}
            </p>
            <p class="text-[10px] text-neutral-500 tracking-widest uppercase mt-0.5 mb-4">You're Cordially Invited</p>

            <!-- Arched Photo Preview Window -->
            <div class="w-44 h-56 mx-auto rounded-t-full rounded-b-2xl overflow-hidden border-2 border-blush-200 shadow-inner mb-4 relative bg-blush-100">
                <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-blush-900/40 via-transparent to-transparent"></div>
            </div>

            <!-- Couple Names -->
            <h1 class="font-script text-4xl sm:text-5xl text-blush-800 leading-tight">
                {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
            </h1>
            <p class="font-garamond text-sm text-neutral-600 mt-2 font-medium tracking-wide">
                {{ $weddingDateFormatted }}
            </p>

            <!-- Guest Tag Card -->
            <div class="mt-5 p-3 rounded-2xl bg-blush-50 border border-blush-200 text-xs">
                <span class="text-[10px] uppercase font-bold tracking-wider text-botanical-sage block">Kepada Yth.</span>
                <b class="text-sm text-blush-900 block mt-0.5">{{ $guest->name ?? 'Tamu Undangan' }}</b>
            </div>

            <!-- Wax Seal Pulsing Button ("Save Our Date") -->
            <button type="button" onclick="openInvitation()" class="wax-seal-btn mt-6 w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-botanical-wax to-blush-600 text-white font-garamond text-sm font-bold uppercase tracking-widest shadow-lg hover:brightness-110 active:scale-95 transition flex items-center justify-center gap-2">
                <span>💌</span> Buka Undangan
            </button>

            @if(!empty($isDemo))
                <div class="mt-3">
                    <span class="inline-block px-3 py-0.5 rounded-full text-[9px] font-bold bg-blush-100 text-blush-700">
                        Demo Template: Wildflower Pink
                    </span>
                </div>
            @endif
        </div>
    </div>

    <!-- ========================================================
         MAIN CONTENT (Wildflower Pink Botanical Editorial)
         ======================================================== -->
    <main id="mainContent" class="max-w-[480px] mx-auto min-h-screen bg-botanical-cream text-neutral-800 shadow-2xl relative overflow-hidden border-x border-blush-200">

        <!-- Top Romantic Arch Header -->
        <header class="relative pt-12 pb-16 px-6 text-center bg-gradient-to-b from-[#fbebee] to-botanical-cream rounded-b-[48px] border-b border-blush-200">
            <span class="text-botanical-sage text-sm block mb-1">🌿 🕊️ 🌿</span>
            <p class="font-garamond text-xs tracking-[0.2em] text-blush-700 uppercase font-semibold">The Wedding of</p>
            <h2 class="font-script text-5xl text-blush-800 my-2">
                {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
            </h2>
            <p class="font-garamond text-sm text-neutral-600">{{ $weddingDateFormatted }}</p>
            <p class="text-xs text-botanical-sage font-medium mt-1">📍 {{ $couple->venue_name ?? 'The Botanical Pavilion' }}</p>
        </header>

        <!-- Quote Section with Soft Botanical Border -->
        <section class="py-8 px-6">
            <div class="floral-card rounded-3xl p-6 text-center relative overflow-hidden">
                <span class="font-brush text-3xl text-blush-400 block mb-1">Love &amp; Devotion</span>
                <p class="font-garamond text-sm sm:text-base text-neutral-700 italic leading-relaxed">
                    "{{ $couple->quote ?? 'Two souls with but a single thought, two hearts that beat as one. Di bawah naungan cinta suci yang diridhoi Allah SWT.' }}"
                </p>
            </div>
        </section>

        <!-- ========================================================
             COUPLE PROFILES (Arched Portrait Windows)
             ======================================================== -->
        <section class="py-8 px-6 space-y-8">
            <div class="text-center">
                <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Mempelai Bahagia</span>
                <h3 class="font-serif text-2xl font-bold text-blush-900 mt-1">Groom &amp; Bride</h3>
                <div class="w-12 h-0.5 bg-blush-400 mx-auto mt-2"></div>
            </div>

            <!-- Groom Profile Card -->
            <div class="floral-card rounded-3xl p-6 text-center flex flex-col items-center">
                <div class="w-32 h-44 rounded-t-full rounded-b-2xl overflow-hidden border-2 border-blush-300 shadow-md mb-4 bg-blush-50">
                    <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_fullname }}" class="w-full h-full object-cover">
                </div>
                <span class="px-3 py-0.5 rounded-full bg-blush-100 text-blush-700 text-[10px] font-bold uppercase tracking-wider mb-1">
                    Mempelai Pria
                </span>
                <h4 class="font-serif text-xl font-bold text-neutral-900">{{ $couple->groom_fullname }}</h4>
                <p class="text-xs text-blush-600 font-medium mt-0.5">{{ $couple->groom_birth_order ?? 'Putra Pertama' }}</p>
                <p class="text-xs text-neutral-600 mt-1.5 leading-relaxed">
                    Putra dari <span id="previewGroomParentsText">{{ $wfGroomParents }}</span>
                    @if(!empty($couple->groom_city))
                        <br><span class="text-[11px] text-neutral-500 font-medium">{{ $couple->groom_city }}</span>
                    @endif
                </p>
            </div>

            <div class="text-center font-brush text-3xl text-blush-400">&amp;</div>

            <!-- Bride Profile Card -->
            <div class="floral-card rounded-3xl p-6 text-center flex flex-col items-center">
                <div class="w-32 h-44 rounded-t-full rounded-b-2xl overflow-hidden border-2 border-blush-300 shadow-md mb-4 bg-blush-50">
                    <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_fullname }}" class="w-full h-full object-cover">
                </div>
                <span class="px-3 py-0.5 rounded-full bg-blush-100 text-blush-700 text-[10px] font-bold uppercase tracking-wider mb-1">
                    Mempelai Wanita
                </span>
                <h4 class="font-serif text-xl font-bold text-neutral-900">{{ $couple->bride_fullname }}</h4>
                <p class="text-xs text-blush-600 font-medium mt-0.5">{{ $couple->bride_birth_order ?? 'Putri Pertama' }}</p>
                <p class="text-xs text-neutral-600 mt-1.5 leading-relaxed">
                    Putri dari <span id="previewBrideParentsText">{{ $wfBrideParents }}</span>
                    @if(!empty($couple->bride_city))
                        <br><span class="text-[11px] text-neutral-500 font-medium">{{ $couple->bride_city }}</span>
                    @endif
                </p>
            </div>
        </section>

        <!-- ========================================================
             SAVE THE DATE & COUNTDOWN (Circular Botanical Wreath)
             ======================================================== -->
        <section class="py-8 px-6">
            <div class="floral-card rounded-3xl p-7 text-center">
                <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Hitung Mundur</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Save The Date</h3>
                <p class="text-xs text-neutral-600 mt-1 mb-6">{{ $weddingDateFormatted }}</p>

                <div class="grid grid-cols-4 gap-2 mb-6">
                    <div class="p-3 rounded-2xl bg-blush-50 border border-blush-200">
                        <span id="wfDays" class="font-serif text-xl font-bold text-blush-800 block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-neutral-500 block mt-0.5">Hari</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-blush-50 border border-blush-200">
                        <span id="wfHours" class="font-serif text-xl font-bold text-blush-800 block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-neutral-500 block mt-0.5">Jam</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-blush-50 border border-blush-200">
                        <span id="wfMins" class="font-serif text-xl font-bold text-blush-800 block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-neutral-500 block mt-0.5">Menit</span>
                    </div>
                    <div class="p-3 rounded-2xl bg-blush-50 border border-blush-200">
                        <span id="wfSecs" class="font-serif text-xl font-bold text-blush-800 block">00</span>
                        <span class="text-[9px] uppercase tracking-wider text-neutral-500 block mt-0.5">Detik</span>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Pernikahan ' . $couple->groom_name . ' & ' . $couple->bride_name) }}&location={{ urlencode($couple->venue_name ?? 'Lokasi Acara') }}" 
                   target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-blush-600 hover:bg-blush-700 text-white text-xs font-bold uppercase tracking-wider font-garamond shadow transition">
                    <span>📅</span> Tambahkan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- ========================================================
             TIMELINE & EVENTS (Curved Floral Ribbon Path)
             ======================================================== -->
        <section class="py-8 px-6">
            <div class="text-center mb-6">
                <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Rangkaian Acara</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Wedding Agenda</h3>
                <div class="w-12 h-0.5 bg-blush-400 mx-auto mt-2"></div>
            </div>

            <div class="space-y-5">
                @forelse($couple->events as $ev)
                    <div class="floral-card rounded-3xl p-6 text-center space-y-2">
                        <span class="w-9 h-9 rounded-full bg-blush-100 text-blush-600 inline-flex items-center justify-center text-sm font-bold mb-1">
                            🌸
                        </span>
                        <h4 class="font-serif text-xl font-bold text-blush-900">{{ $ev->title }}</h4>
                        <p class="font-semibold text-xs text-neutral-800">
                            📅 {{ !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted }}
                        </p>
                        <p class="text-xs font-bold text-blush-600">
                            ⏰ {{ $ev->start_time ?? '09:00 WIB' }} - {{ $ev->end_time ?? 'Selesai' }}
                        </p>
                        <p class="text-xs font-bold text-neutral-900 pt-1">
                            🏛️ {{ $ev->venue_name }}
                        </p>
                        @if(!empty($ev->address))
                            <p class="text-[11px] text-neutral-500 px-4 leading-relaxed">{{ $ev->address }}</p>
                        @endif

                        @if(!empty($ev->maps_url))
                            <div class="pt-3">
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-blush-600 hover:bg-blush-700 text-white text-xs font-bold shadow transition">
                                    <span>📍</span> Petunjuk Google Maps
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="floral-card rounded-3xl p-6 text-center">
                        <h4 class="font-serif text-lg font-bold text-blush-900">Akad Nikah &amp; Resepsi</h4>
                        <p class="text-xs text-neutral-600 mt-2">{{ $couple->venue_name ?? 'Lokasi Acara' }}</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- ========================================================
             GALLERY (Polaroid Style Grid)
             ======================================================== -->
        @php
            $galleryItems = $couple->galleries && $couple->galleries->count() > 0 ? $couple->galleries : collect([
                (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
                (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800'],
            ]);
        @endphp

        <section class="py-8 px-6">
            <div class="text-center mb-6">
                <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Dokumentasi</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Our Sweet Moments</h3>
                <div class="w-12 h-0.5 bg-blush-400 mx-auto mt-2"></div>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-4">
                @foreach($galleryItems as $idx => $g)
                    @php
                        $gImg = \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800');
                    @endphp
                    <div class="polaroid-frame cursor-pointer" onclick="openLightbox('{{ $gImg }}')">
                        <div class="aspect-square rounded overflow-hidden bg-blush-50 mb-2">
                            <img src="{{ $gImg }}" alt="Foto {{ $idx+1 }}" class="w-full h-full object-cover">
                        </div>
                        <p class="font-brush text-sm text-center text-blush-700">Sweet Memories</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ========================================================
             DIGITAL ENVELOPE (Soft Pastel Envelope with Wax Seal)
             ======================================================== -->
        <section class="py-8 px-6">
            <div class="floral-card rounded-3xl p-6 sm:p-7 text-center">
                <div class="w-12 h-12 rounded-full bg-blush-100 text-blush-600 flex items-center justify-center mx-auto mb-2 text-xl">
                    🎁
                </div>
                <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Tanda Kasih</span>
                <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Amplop Digital</h3>
                <p class="text-xs text-neutral-600 mt-1 mb-5">
                    Doa restu Anda merupakan karunia terindah bagi kami. Bagi keluarga dan rekan yang ingin memberikan tanda kasih secara digital:
                </p>

                <div class="space-y-3">
                    @if(!empty($couple->bank_account_1))
                        <div class="p-3.5 rounded-2xl bg-blush-50/80 border border-blush-200 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-blush-700 uppercase tracking-wider block">{{ $couple->bank_name_1 ?? 'BANK' }}</span>
                                <b class="font-mono text-sm text-neutral-900 block mt-0.5">{{ $couple->bank_account_1 }}</b>
                                <span class="text-[11px] text-neutral-500 block">a.n {{ $couple->bank_holder_1 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_1 }}', this)" class="px-3 py-1 rounded-full bg-blush-600 text-white text-[11px] font-bold shadow hover:bg-blush-700 transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->bank_account_2))
                        <div class="p-3.5 rounded-2xl bg-blush-50/80 border border-blush-200 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-blush-700 uppercase tracking-wider block">{{ $couple->bank_name_2 ?? 'BANK' }}</span>
                                <b class="font-mono text-sm text-neutral-900 block mt-0.5">{{ $couple->bank_account_2 }}</b>
                                <span class="text-[11px] text-neutral-500 block">a.n {{ $couple->bank_holder_2 ?? 'Mempelai' }}</span>
                            </div>
                            <button type="button" onclick="copyText('{{ $couple->bank_account_2 }}', this)" class="px-3 py-1 rounded-full bg-blush-600 text-white text-[11px] font-bold shadow hover:bg-blush-700 transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(empty($couple->bank_account_1) && empty($couple->bank_account_2))
                        <div class="p-3.5 rounded-2xl bg-blush-50/80 border border-blush-200 text-left flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-blush-700 uppercase tracking-wider block">BCA (Demo)</span>
                                <b class="font-mono text-sm text-neutral-900 block mt-0.5">5420194821</b>
                                <span class="text-[11px] text-neutral-500 block">a.n {{ $couple->groom_name }}</span>
                            </div>
                            <button type="button" onclick="copyText('5420194821', this)" class="px-3 py-1 rounded-full bg-blush-600 text-white text-[11px] font-bold shadow hover:bg-blush-700 transition">
                                Salin
                            </button>
                        </div>
                    @endif

                    @if(!empty($couple->gift_address))
                        <div class="p-3.5 rounded-2xl bg-blush-50/60 border border-blush-200 text-xs text-neutral-600 text-left">
                            <b class="text-blush-700 block mb-0.5">📦 Kirim Kado Fisik:</b>
                            <p class="text-[11px] leading-relaxed">{{ $couple->gift_address }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- ========================================================
             RSVP & WISHES GUESTBOOK
             ======================================================== -->
        <section class="py-8 px-6">
            <div class="floral-card rounded-3xl p-6 sm:p-7">
                <div class="text-center mb-6">
                    <span class="font-garamond text-xs font-bold text-blush-600 tracking-[0.2em] uppercase block">Buku Tamu</span>
                    <h3 class="font-serif text-2xl font-bold text-neutral-900 mt-1">Wishes &amp; Prayers</h3>
                    <div class="w-12 h-0.5 bg-blush-400 mx-auto mt-2"></div>
                </div>

                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3.5 mb-7">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap Anda"
                               class="w-full px-4 py-2.5 rounded-xl border border-blush-200 bg-white text-xs focus:ring-2 focus:ring-blush-400 focus:outline-none">
                    </div>

                    <div>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-blush-200 bg-white text-xs focus:ring-2 focus:ring-blush-400 focus:outline-none">
                            <option value="hadir">🌸 InsyaAllah Hadir</option>
                            <option value="tidak_hadir">🍂 Mohon Maaf Belum Bisa Hadir</option>
                            <option value="ragu">🌱 Masih Ragu / Menyesuaikan</option>
                        </select>
                    </div>

                    <div>
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan manis & doa restu..."
                                  class="w-full p-3.5 rounded-xl border border-blush-200 bg-white text-xs focus:ring-2 focus:ring-blush-400 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-full bg-blush-600 hover:bg-blush-700 text-white text-xs font-bold uppercase tracking-wider font-garamond shadow transition">
                        Kirim Doa Restu 🕊️
                    </button>
                </form>

                <div class="space-y-3 max-h-72 overflow-y-auto pr-1" style="scrollbar-width: thin;">
                    @forelse($wishes as $w)
                        <div class="p-3.5 rounded-2xl bg-blush-50/70 border border-blush-200 text-xs">
                            <div class="flex items-center justify-between">
                                <b class="text-blush-800 font-serif">{{ $w->name }}</b>
                                <span class="text-[10px] text-neutral-400">{{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->diffForHumans() : 'Baru saja' }}</span>
                            </div>
                            <p class="text-neutral-700 mt-1 leading-relaxed">{{ $w->message }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6 text-neutral-400 text-xs">
                            Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="pt-8 pb-14 px-6 text-center bg-gradient-to-t from-[#edd0d6] to-botanical-cream border-t border-blush-200 text-neutral-700">
            <span class="text-blush-500 text-2xl block mb-2">🌸</span>
            <p class="font-serif text-lg font-bold text-blush-900">{{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</p>
            <p class="text-xs text-neutral-500 mt-1">Terima kasih atas doa dan kehadiran Anda.</p>
            <div class="mt-6 pt-4 border-t border-blush-200 text-[10px] text-neutral-400">
                Created with love by <b class="text-blush-700">D'Karsa</b> Digital Invitation
            </div>
        </footer>

    </main>

    <!-- Lightbox Modal -->
    <div id="lightboxModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-md flex items-center justify-center p-4" onclick="closeLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-blush-300 transition">&times;</button>
        <img id="lightboxImage" src="" alt="Enlarged" class="max-w-full max-h-[90vh] rounded-2xl border-2 border-blush-300 shadow-2xl" onclick="event.stopPropagation()">
    </div>

    <!-- Scripts -->
    <script>
        // 1. Open Invitation & Audio
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

            initFallingPetals();
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

        // 2. Falling Petals
        function initFallingPetals() {
            const container = document.getElementById('ambientPetalsContainer');
            if (!container) return;
            container.innerHTML = '';

            const petalColors = ['#f4a5b4', '#e5728a', '#ffcad4', '#ffffff', '#c94a65'];
            for (let i = 0; i < 20; i++) {
                const el = document.createElement('div');
                el.className = 'petal-particle';
                const size = Math.floor(Math.random() * 8) + 12;
                const left = Math.random() * 100;
                const dur = Math.random() * 8 + 14;
                const delay = -(Math.random() * 14);
                const sway = (Math.random() * 50 - 25) + 'px';
                const color = petalColors[Math.floor(Math.random() * petalColors.length)];

                el.style.left = left + '%';
                el.style.fontSize = size + 'px';
                el.style.color = color;
                el.style.setProperty('--sway', sway);
                el.style.animation = `petal-fall ${dur}s ease-in-out ${delay}s infinite`;
                el.innerHTML = '🌸';
                container.appendChild(el);
            }
        }

        // 3. Countdown
        const targetDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}");
        function updateWfCountdown() {
            const now = new Date().getTime();
            const diff = targetDate.getTime() - now;

            if (diff <= 0) {
                document.getElementById('wfDays').textContent = '00';
                document.getElementById('wfHours').textContent = '00';
                document.getElementById('wfMins').textContent = '00';
                document.getElementById('wfSecs').textContent = '00';
                return;
            }

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('wfDays').textContent = String(d).padStart(2, '0');
            document.getElementById('wfHours').textContent = String(h).padStart(2, '0');
            document.getElementById('wfMins').textContent = String(m).padStart(2, '0');
            document.getElementById('wfSecs').textContent = String(s).padStart(2, '0');
        }
        setInterval(updateWfCountdown, 1000);
        updateWfCountdown();

        // 4. Copy text
        function copyText(val, btn) {
            navigator.clipboard.writeText(val).then(() => {
                const oldText = btn.textContent;
                btn.textContent = 'Tersalin! ✓';
                btn.classList.add('!bg-green-600');
                setTimeout(() => {
                    btn.textContent = oldText;
                    btn.classList.remove('!bg-green-600');
                }, 2000);
            });
        }

        // 5. Lightbox
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
        const defaultGroomParents = @json($wfGroomParents);
        const defaultBrideParents = @json($wfBrideParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIndex) => {
                const div = document.createElement('div');
                div.className = 'polaroid-frame cursor-pointer';
                div.onclick = function() { openLightbox(imgUrl); };
                div.innerHTML = `
                    <div class="aspect-square rounded overflow-hidden bg-blush-50 mb-2">
                        <img src="${imgUrl}" alt="Foto ${gIndex+1}" class="w-full h-full object-cover">
                    </div>
                    <p class="font-brush text-sm text-center text-blush-700">Sweet Memories</p>
                `;
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
