<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Golden Birthday Celebration') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="VIP Birthday Invitation {{ $couple->groom_name }} - A Night of Golden Glamour & Celebration.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Golden Birthday Celebration') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="You're exclusively invited to celebrate the milestone birthday of {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1200' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Syne:wght@500;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        noir: {
                            base: '#0A0B0E',
                            deep: '#0F1117',
                            card: '#161922',
                            cardlight: '#1F2432',
                            border: '#2E3547',
                            goldborder: 'rgba(230, 175, 46, 0.35)',
                            gold: '#F4C430',
                            goldbright: '#FFE57F',
                            goldmuted: '#C5A059',
                            champagne: '#F7E7CE',
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        syne: ['Syne', 'sans-serif'],
                        mono: ['Space Grotesk', 'monospace'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        
        /* Shimmer Gold Text */
        .gold-shimmer {
            background: linear-gradient(135deg, #FFE57F 0%, #F4C430 40%, #C5A059 70%, #FFF2B2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gold Foil Glow */
        .gold-glow {
            text-shadow: 0 0 25px rgba(244, 196, 48, 0.4);
        }

        /* VIP Card Holographic Border */
        .vip-ticket {
            background: linear-gradient(145deg, #161922 0%, #0F1117 100%);
            border: 1px solid rgba(244, 196, 48, 0.4);
            box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.8), 0 0 30px rgba(244, 196, 48, 0.15);
        }

        /* Ambient Sparkle Dots */
        @keyframes floatBokeh {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
            50% { transform: translateY(-15px) scale(1.15); opacity: 0.8; }
        }
        .bokeh-dot {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244, 196, 48, 0.8) 0%, transparent 70%);
            pointer-events: none;
            animation: floatBokeh 6s ease-in-out infinite;
        }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 25px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: toastSlide 2.8s ease forwards;
        }
    </style>
</head>
<body class="bg-noir-base text-slate-200 font-sans antialiased selection:bg-noir-gold selection:text-noir-base">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo, 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1200');
        $celebrantImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600');
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $firstEvent = isset($couple->events) && count($couple->events) > 0 ? (is_array($couple->events) ? (object)$couple->events[0] : $couple->events->first()) : null;
        $rawEventDate = !empty($firstEvent->date) ? $firstEvent->date : ($couple->wedding_date ?? null);
        $targetDate = !empty($rawEventDate) ? \Carbon\Carbon::parse($rawEventDate) : now()->addDays(20);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($firstEvent->start_time) 
            ? $firstEvent->start_time . (!empty($firstEvent->end_time) ? ' - ' . $firstEvent->end_time : '')
            : (!empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '19:00 WIB');

        $celebrantName = $couple->groom_name ?? 'Jessica Veranda';
        $celebrantNick = $couple->groom_nickname ?? 'Jessica';
        $gbParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');
    @endphp

    <!-- Background Music -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-noir-card border border-noir-gold/40 shadow-2xl flex items-center justify-center text-noir-gold hover:text-noir-goldbright transition hover:scale-105" title="Musik Pesta">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 5s;">🥂</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-noir-card border border-noir-gold/50 text-white text-xs tracking-wider rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-noir-gold">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         VIP PASS COVER SCREEN (Modern Luxury Nightclub & Gatsby)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain flex flex-col items-center justify-center bg-black/95 p-3 sm:p-4 transition-all duration-1000 ease-in-out">
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center opacity-20 pointer-events-none" style="background-image: url('{{ $coverImg }}');"></div>
        
        <!-- Background Ambient Bokeh -->
        <div class="bokeh-dot w-48 h-48 top-12 left-8" style="animation-delay: 0s;"></div>
        <div class="bokeh-dot w-64 h-64 bottom-16 right-6" style="animation-delay: 2.5s;"></div>

        <div class="relative w-full max-w-sm vip-ticket rounded-2xl p-5 sm:p-7 text-center shadow-2xl overflow-hidden backdrop-blur-md my-auto">
            
            <!-- Metallic Ticket Ribbon -->
            <div class="flex items-center justify-between pb-3.5 border-b border-white/10 text-[9px] font-mono tracking-[0.25em] text-noir-gold/80 uppercase">
                <span>VIP PASS #{{ rand(1000, 9999) }}</span>
                <span>EXCLUSIVE ACCESS</span>
            </div>

            <!-- Spotlight Monogram -->
            <div class="my-5 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-tr from-noir-cardlight to-noir-deep border border-noir-gold/50 shadow-inner mb-3">
                    <span class="text-2xl">🍸</span>
                </div>
                <span class="inline-block px-3 py-1 rounded-full text-[9px] font-mono font-bold tracking-[0.25em] uppercase bg-noir-gold/10 text-noir-gold border border-noir-gold/30">
                    {{ $couple->event_heading ?? "A GOLDEN SOIRÉE" }}
                </span>
            </div>

            <!-- Celebrant Photo Frame -->
            <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden border-2 border-noir-gold shadow-2xl my-4">
                <img id="previewCelebrantPhotoCoverImg" src="{{ $celebrantImg }}" alt="{{ $celebrantName }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            </div>

            <!-- Event Headings -->
            <div class="my-3">
                <p class="text-[10px] tracking-[0.3em] uppercase text-slate-400 font-mono">CELEBRATING THE BIRTHDAY OF</p>
                <h1 class="font-cinzel text-2xl sm:text-3xl font-extrabold gold-shimmer tracking-wider mt-1">
                    {{ $celebrantName }}
                </h1>
                <p class="text-xs text-noir-champagne font-mono mt-1 tracking-widest">
                    {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Guest Invitation Admit One Card -->
            <div class="my-5 p-3.5 rounded-xl bg-noir-cardlight/70 border border-white/10 text-center">
                <span class="text-[9px] font-mono uppercase tracking-[0.25em] text-slate-400 block">ADMIT ONE VIP:</span>
                <p class="font-syne text-sm font-bold text-white mt-0.5">{{ $guest->name ?? 'Tamu Spesial' }}</p>
                @if(!empty($guest->seat_table))
                    <span class="inline-block mt-0.5 text-[10px] text-noir-gold font-mono">TABLE: {{ $guest->seat_table }}</span>
                @endif
            </div>

            <!-- Unlock Invitation Action -->
            <button type="button" onclick="openInvitation()" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-noir-gold via-[#FFE57F] to-noir-gold text-noir-base font-syne text-xs font-black uppercase tracking-[0.25em] shadow-lg hover:brightness-110 transition flex items-center justify-center gap-2 relative z-20 pointer-events-auto cursor-pointer">
                <span>✦</span> BUKA UNDANGAN VIP
            </button>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION CONTAINER (Luxury Nightlife Architecture)
         ======================================================== -->
    <main id="mainContent" class="max-w-[500px] mx-auto min-h-screen bg-noir-deep text-slate-200 shadow-2xl relative border-x border-noir-border">

        <!-- Header Hero Banner -->
        <header class="pt-16 pb-12 px-6 text-center relative overflow-hidden bg-gradient-to-b from-noir-card to-noir-deep border-b border-noir-border">
            <span class="inline-block px-3.5 py-1 rounded-full text-[9px] font-mono uppercase tracking-[0.3em] bg-noir-gold/15 text-noir-gold border border-noir-gold/30 mb-3 font-semibold">
                {{ $couple->event_heading ?? "EXCLUSIVE BIRTHDAY BASH" }}
            </span>
            <h1 class="font-cinzel text-3xl sm:text-4xl font-black gold-shimmer tracking-wider my-2">
                {{ $celebrantName }}
            </h1>
            <p class="text-xs text-slate-300 font-mono tracking-widest">
                {{ $eventDateFormatted }} • {{ $eventTimeFormatted }}
            </p>
            <div class="mt-4 flex items-center justify-center gap-2 text-xs text-noir-gold">
                <span>📍</span>
                <span class="font-medium">{{ $couple->venue_name ?? 'The Grand Sky Lounge' }}</span>
            </div>
        </header>

        <!-- Birthday Star Spotlight Profile -->
        <section class="py-14 px-6 border-b border-noir-border text-center">
            <div class="relative w-52 h-52 mx-auto mb-6">
                <!-- Rotating Decorative Ring -->
                <div class="absolute inset-0 rounded-full border border-dashed border-noir-gold/50 animate-spin" style="animation-duration: 25s;"></div>
                <div class="w-48 h-48 mx-auto mt-2 rounded-full overflow-hidden border-2 border-noir-gold shadow-2xl">
                    <img id="previewGroomPhotoImg" src="{{ $celebrantImg }}" alt="{{ $celebrantName }}" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-noir-gold text-noir-base text-[10px] font-mono font-bold tracking-widest uppercase shadow-md whitespace-nowrap">
                    BIRTHDAY CELEBRANT
                </div>
            </div>

            <h2 class="font-cinzel text-2xl font-bold text-white mt-4">{{ $celebrantName }}</h2>
            @if(!empty($celebrantNick))
                <p class="text-xs font-mono text-noir-gold tracking-widest mt-1">"{{ $celebrantNick }}"</p>
            @endif

            <p class="text-xs text-slate-300 italic max-w-sm mx-auto mt-4 leading-relaxed font-sans">
                "{{ $couple->quote ?? 'Life is a collection of moments made unforgettable by the people we share them with. Let us raise a toast to another year of dreams, laughter, and endless adventure!' }}"
            </p>

            @if(!empty($gbParents))
                <div class="mt-4 pt-3 border-t border-dashed border-noir-gold/20 text-xs text-slate-400 font-mono">
                    Putra / Putri tercinta dari:<br>
                    <b id="previewGroomParentsText" class="text-white font-sans text-sm block mt-0.5">{{ $gbParents }}</b>
                </div>
            @endif

            @if(!empty($couple->groom_instagram))
                <div class="mt-4">
                    <a href="https://instagram.com/{{ ltrim($couple->groom_instagram, '@') }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-noir-gold hover:text-white transition font-mono">
                        <span>📸</span> {{ '@' . ltrim($couple->groom_instagram, '@') }}
                    </a>
                </div>
            @endif
        </section>

        <!-- Live Countdown Section -->
        <section class="py-12 px-6 bg-noir-card/60 border-b border-noir-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-noir-gold block mb-1">COUNTDOWN TO PARTY</span>
            <h3 class="font-syne text-xl font-bold text-white mb-6">Menghitung Jam Perayaan</h3>

            <div id="countdownTimer" class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto">
                <div class="p-3 rounded-xl bg-noir-deep border border-noir-gold/30 text-center shadow">
                    <span id="cdDays" class="block font-mono text-2xl font-bold text-noir-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Hari</span>
                </div>
                <div class="p-3 rounded-xl bg-noir-deep border border-noir-gold/30 text-center shadow">
                    <span id="cdHours" class="block font-mono text-2xl font-bold text-noir-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Jam</span>
                </div>
                <div class="p-3 rounded-xl bg-noir-deep border border-noir-gold/30 text-center shadow">
                    <span id="cdMinutes" class="block font-mono text-2xl font-bold text-noir-gold">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Menit</span>
                </div>
                <div class="p-3 rounded-xl bg-noir-deep border border-noir-gold/30 text-center shadow">
                    <span id="cdSeconds" class="block font-mono text-2xl font-bold text-white">00</span>
                    <span class="text-[8px] uppercase tracking-wider text-slate-400 font-mono">Detik</span>
                </div>
            </div>

            <!-- Add to Calendar Link -->
            @php
                $calTitle = urlencode(($couple->event_heading ?? 'Birthday Celebration') . ' - ' . $celebrantName);
                $calDetails = urlencode('Menghadiri perayaan pesta ulang tahun istimewa. Dress code: Black Tie & Gold.');
                $calLocation = urlencode(($couple->venue_name ?? '') . ', ' . ($couple->venue_address ?? ''));
                $calStart = $targetDate->format('Ymd\THis');
                $calEnd = $targetDate->copy()->addHours(4)->format('Ymd\THis');
                $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calStart}/{$calEnd}&details={$calDetails}&location={$calLocation}";
            @endphp
            <div class="mt-6">
                <a href="{{ $googleCalUrl }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-noir-cardlight hover:bg-noir-border text-noir-gold text-[10px] font-mono tracking-widest uppercase transition border border-noir-gold/30">
                    <span>📅</span> Save to Google Calendar
                </a>
            </div>
        </section>

        <!-- Party Itinerary & Dress Code Section -->
        <section class="py-14 px-6 border-b border-noir-border">
            <div class="text-center mb-10">
                <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-noir-gold block">PARTY TIMELINE</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Rangkaian Acara Pesta</h2>
            </div>

            <div class="space-y-4 max-w-sm mx-auto">
                @if(isset($couple->events) && count($couple->events) > 0)
                    @foreach($couple->events as $idx => $ev)
                        @php
                            $evDateFormatted = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $eventDateFormatted;
                            $evTimeFormatted = !empty($ev->start_time) ? $ev->start_time . (!empty($ev->end_time) ? ' - ' . $ev->end_time : '') : '19:00 WIB';
                            $evVenue = $ev->venue_name ?? ($couple->venue_name ?? 'VIP Ballroom');
                            $evAddress = $ev->address ?? ($couple->venue_address ?? '');
                            $evMap = !empty($ev->maps_url) ? $ev->maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode($evVenue . ' ' . $evAddress)));
                        @endphp
                        <div class="p-5 rounded-2xl bg-noir-card border border-noir-gold/40 hover:border-noir-gold/80 transition text-left">
                            <div class="flex items-center justify-between text-noir-gold text-xs font-mono mb-1">
                                <span class="font-bold tracking-wider">{{ $ev->title ?? 'SESI ' . sprintf('%02d', $idx + 1) }}</span>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-black/60 border border-noir-gold/30 text-noir-gold">{{ $evTimeFormatted }}</span>
                            </div>
                            <h3 class="font-syne text-base font-bold text-white mt-1">{{ $evVenue }}</h3>
                            <p class="text-xs text-noir-champagne font-mono mt-0.5">📅 {{ $evDateFormatted }}</p>
                            @if(!empty($evAddress))
                                <p class="text-xs text-slate-300 mt-1.5 leading-relaxed">{{ $evAddress }}</p>
                            @endif
                            @if(!empty($evMap))
                                <div class="mt-3 text-left">
                                    <a href="{{ $evMap }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-[11px] font-mono font-bold text-noir-gold hover:underline">
                                        <span>📍</span> Google Maps Direction &rarr;
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <!-- Sesi 1 -->
                    <div class="p-5 rounded-2xl bg-noir-card border border-white/10 hover:border-noir-gold/40 transition">
                        <div class="flex items-center justify-between text-noir-gold text-xs font-mono mb-1">
                            <span>SESI 01</span>
                            <span>18:30 - 19:30 WIB</span>
                        </div>
                        <h3 class="font-syne text-base font-bold text-white">Red Carpet &amp; Welcome Drinks</h3>
                        <p class="text-xs text-slate-400 mt-1">Registrasi tamu VIP, foto bersama di photo booth eksklusif &amp; mocktail reception.</p>
                    </div>

                    <!-- Sesi 2 -->
                    <div class="p-5 rounded-2xl bg-noir-card border border-noir-gold/50 shadow-md">
                        <div class="flex items-center justify-between text-noir-gold text-xs font-mono mb-1">
                            <span>SESI UTAMA</span>
                            <span>19:30 - 20:30 WIB</span>
                        </div>
                        <h3 class="font-syne text-base font-bold text-white">Birthday Toast &amp; Candle Blowing</h3>
                        <p class="text-xs text-slate-300 mt-1">Prosesi tiup lilin perayaan, pemotongan kue tart, doa bersama, dan pesan dari sahabat.</p>
                    </div>

                    <!-- Sesi 3 -->
                    <div class="p-5 rounded-2xl bg-noir-card border border-white/10 hover:border-noir-gold/40 transition">
                        <div class="flex items-center justify-between text-noir-gold text-xs font-mono mb-1">
                            <span>SESI 03</span>
                            <span>20:30 - 22:00 WIB</span>
                        </div>
                        <h3 class="font-syne text-base font-bold text-white">Gala Dinner &amp; Music Celebration</h3>
                        <p class="text-xs text-slate-400 mt-1">Santap malam prasmanan eksklusif, live acoustic music, ramah tamah &amp; fun games.</p>
                    </div>
                @endif
            </div>

            <!-- Dress Code Pill -->
            <div class="max-w-sm mx-auto mt-6 p-4 rounded-xl bg-noir-cardlight/50 border border-white/10 text-center flex items-center justify-center gap-3">
                <span class="text-lg">👔</span>
                <div class="text-left text-xs">
                    <b class="text-white block font-syne">DRESS CODE:</b>
                    <span class="text-slate-400">Glamorous Black, Gold, or Elegant Cocktail Attire</span>
                </div>
            </div>

            <!-- Venue Details & Maps Button -->
            <div class="max-w-sm mx-auto mt-8 p-6 rounded-2xl bg-noir-card border border-noir-gold/30 text-center">
                <span class="text-[9px] font-mono uppercase tracking-[0.2em] text-noir-gold block mb-1">LOCATION &amp; VENUE</span>
                <h3 class="font-syne text-lg font-bold text-white">{{ $couple->venue_name ?? 'The Grand Sky Lounge' }}</h3>
                <p class="text-xs text-slate-400 mt-1 leading-relaxed">{{ $couple->venue_address ?? 'Rooftop Fl. 28, Pacific Tower, SCBD Jakarta Selatan' }}</p>
                
                @php
                    $mapLink = !empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($couple->venue_name ?? '') . ' ' . ($couple->venue_address ?? '')));
                @endphp
                <div class="mt-4">
                    <a href="{{ $mapLink }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-noir-gold to-noir-goldbright text-noir-base text-xs font-syne font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        <span>📍</span> Petunjuk Arah (Google Maps)
                    </a>
                </div>
            </div>
        </section>

        <!-- Polaroid Milestone Gallery -->
        @php
            $displayGalleries = $galleries ?? [];
            if (empty($displayGalleries) || count($displayGalleries) === 0) {
                $displayGalleries = [
                    (object)['image' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800'],
                    (object)['image' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=800'],
                ];
            }
        @endphp
        <section class="py-14 px-6 border-b border-noir-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-noir-gold block mb-1">MOMENTS OF JOY</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-6">Galeri Momen Berharga</h2>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
                @foreach($displayGalleries as $gIdx => $gal)
                    @php
                        $imgSrc = \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? '', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800');
                    @endphp
                    <div class="p-2 rounded-xl bg-noir-card border border-white/10 shadow hover:border-noir-gold/50 transition">
                        <div class="w-full h-36 rounded-lg overflow-hidden bg-noir-base">
                            <img src="{{ $imgSrc }}" alt="Celebration Moment {{ $gIdx + 1 }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Digital Birthday Wishing Well / Gift Section -->
        <section class="py-14 px-6 border-b border-noir-border text-center">
            <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-noir-gold block mb-1">BIRTHDAY GIFT &amp; WISHES</span>
            <h2 class="font-cinzel text-2xl font-bold text-white mb-3">Kado &amp; Tanda Kasih</h2>
            <p class="text-xs text-slate-400 max-w-xs mx-auto mb-8 leading-relaxed">
                Kehadiran dan kebersamaan Anda adalah kado paling berharga. Namun jika ingin memberikan tanda kasih secara digital:
            </p>

            <!-- Metallic Black-Gold Credit Card Style -->
            <div class="max-w-xs mx-auto p-6 rounded-2xl bg-gradient-to-tr from-noir-card to-[#231e36] border border-noir-gold/40 shadow-2xl text-left relative overflow-hidden">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-mono text-xs font-bold text-noir-gold tracking-widest uppercase">{{ $couple->bank_name ?? 'BCA DIGITAL' }}</span>
                    <span class="text-xs">💳</span>
                </div>
                
                <p class="text-[9px] font-mono text-slate-400 uppercase tracking-widest">ACCOUNT NUMBER</p>
                <p class="font-mono text-lg font-bold text-white tracking-wider my-1">
                    {{ $couple->account_number ?? '8801234567' }}
                </p>
                <p class="text-xs text-noir-champagne mb-4">a.n {{ $couple->account_name ?? $celebrantName }}</p>

                <button type="button" onclick="copyToClipboard('{{ $couple->account_number ?? '8801234567' }}', 'Nomor rekening kado berhasil disalin')" class="w-full py-2.5 rounded-lg bg-noir-gold/20 hover:bg-noir-gold/30 text-noir-gold text-xs font-mono font-bold uppercase tracking-wider border border-noir-gold/40 transition flex items-center justify-center gap-2">
                    <span>📋</span> Salin Nomor Rekening
                </button>
            </div>

            @if(!empty($couple->gift_address))
                <div class="max-w-xs mx-auto mt-5 p-4 rounded-xl bg-noir-card border border-white/10 text-center">
                    <span class="text-[9px] font-mono text-noir-gold uppercase font-bold block mb-1">KIRIM KADO KE ALAMAT</span>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ $couple->gift_address }}</p>
                    <button type="button" onclick="copyToClipboard('{{ $couple->gift_address }}', 'Alamat pengiriman kado disalin')" class="mt-2 text-[10px] text-noir-gold hover:underline font-mono uppercase">
                        Salin Alamat
                    </button>
                </div>
            @endif
        </section>

        <!-- RSVP & VIP Guest Wishes Section -->
        <section class="py-14 px-6 border-b border-noir-border">
            <div class="text-center mb-8">
                <span class="text-[9px] font-mono tracking-[0.3em] uppercase text-noir-gold block">VIP GUESTBOOK</span>
                <h2 class="font-cinzel text-2xl font-bold text-white mt-1">Konfirmasi &amp; Ucapan</h2>
            </div>

            <!-- RSVP Form -->
            <div class="max-w-sm mx-auto bg-noir-card p-6 rounded-2xl border border-white/10 shadow-lg mb-8">
                <form id="rsvpForm" action="{{ Route::has('invitation.wish') ? route('invitation.wish') : '#' }}" method="POST" onsubmit="handleFormSubmit(event, this)">
                    @csrf
                    @if(!empty($couple->id))
                        <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                    @endif

                    <div class="mb-4">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Nama Sahabat / Tamu</label>
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="w-full px-4 py-2.5 rounded-xl bg-noir-deep border border-white/15 text-xs text-white focus:outline-none focus:border-noir-gold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Konfirmasi Kehadiran</label>
                        <select name="attendance" class="w-full px-4 py-2.5 rounded-xl bg-noir-deep border border-white/15 text-xs text-white focus:outline-none focus:border-noir-gold">
                            <option value="Hadir">🥂 Hadir Merayakan</option>
                            <option value="Tidak Hadir">✗ Maaf, Berhalangan</option>
                            <option value="Ragu-ragu">? Menyesuaikan Jadwal</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 mb-1">Pesan &amp; Ucapan Ulang Tahun</label>
                        <textarea name="message" rows="3" required placeholder="Tuliskan harapan & doa untuk yang berulang tahun..." class="w-full px-4 py-2.5 rounded-xl bg-noir-deep border border-white/15 text-xs text-white focus:outline-none focus:border-noir-gold"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-noir-gold to-noir-goldbright text-noir-base font-syne text-xs font-bold uppercase tracking-wider shadow hover:brightness-110 transition">
                        Kirim Ucapan Ulang Tahun ✨
                    </button>
                </form>
            </div>

            <!-- Wishes Feed -->
            <div class="max-w-sm mx-auto space-y-3">
                <h3 class="font-syne text-sm text-white font-bold mb-2 flex items-center justify-between">
                    <span>Ucapan Sahabat Terdekat</span>
                    <span class="text-xs font-mono text-noir-gold">{{ isset($wishes) ? count($wishes) : 0 }} Pesan</span>
                </h3>

                <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @if(isset($wishes) && count($wishes) > 0)
                        @foreach($wishes as $wish)
                            @php
                                $wName = $wish->name ?? $wish->sender_name ?? 'Sahabat';
                                $wAttend = $wish->attendance ?? 'Hadir';
                            @endphp
                            <div class="p-4 rounded-xl bg-noir-card border border-white/10 text-left">
                                <div class="flex items-center justify-between mb-1.5">
                                    <b class="text-xs text-noir-gold font-syne">{{ $wName }}</b>
                                    <span class="text-[9px] font-mono px-2 py-0.5 rounded bg-noir-deep text-slate-300">
                                        {{ $wAttend }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                                    "{{ $wish->message ?? $wish->comment ?? '' }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 rounded-xl bg-noir-card border border-white/10 text-center text-xs text-slate-400 italic">
                            Belum ada ucapan. Jadilah yang pertama mengucapkan selamat!
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-black text-slate-400 border-t border-noir-border">
            <p class="font-cinzel text-xl text-noir-gold mb-1">{{ $celebrantName }}</p>
            <p class="text-xs text-slate-500 font-mono tracking-wider">A NIGHT TO REMEMBER • THANK YOU</p>
            <div class="mt-6 pt-4 border-t border-white/10 text-[9px] text-slate-600 font-mono">
                D'KARSA DIGITAL INVITATION • © {{ date('Y') }}
            </div>
        </footer>

    </main>

    <!-- Scripts -->
    <script>
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
                    audioIcon.textContent = '🥂';
                }).catch(e => console.log('Audio playback:', e));
            }
        }

        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            if (cover) {
                cover.style.opacity = '0';
                cover.style.transform = 'translateY(-100%)';
                setTimeout(() => cover.classList.add('hidden'), 1000);
            }
            if (audioBtn) audioBtn.classList.remove('hidden');
            toggleAudio();
        }

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
                
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Sahabat';
                    const message = formData.get('message') || '';
                    const attend = formData.get('attendance') || 'Hadir';

                    const item = document.createElement('div');
                    item.className = 'p-4 rounded-xl bg-noir-card border border-white/10 text-left';
                    item.innerHTML = `
                        <div class="flex items-center justify-between mb-1.5">
                            <b class="text-xs text-noir-gold font-syne">${name}</b>
                            <span class="text-[9px] font-mono px-2 py-0.5 rounded bg-noir-deep text-slate-300">${attend}</span>
                        </div>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas ucapan Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Default template assets & texts for live preview reset
        const defaultCelebrantPhoto = "{{ $celebrantImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultCelebrantParents = @json($gbParents);

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || images.length === 0) return;

            container.innerHTML = '';
            images.forEach((imgUrl, gIdx) => {
                const div = document.createElement('div');
                div.className = 'p-2 rounded-xl bg-noir-card border border-white/10 shadow hover:border-noir-gold/50 transition';
                div.innerHTML = `
                    <div class="w-full h-36 rounded-lg overflow-hidden bg-noir-base">
                        <img src="${imgUrl}" alt="Celebration Moment ${gIdx + 1}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                `;
                container.appendChild(div);
            });
        }

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            if (event.data.type === 'UPDATE_PREVIEW_PHOTO') {
                if ((event.data.target === 'groom' || event.data.target === 'celebrant') && event.data.dataUrl) {
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = event.data.dataUrl;
                    const el2 = document.getElementById('previewCelebrantPhotoCoverImg');
                    if (el2) el2.src = event.data.dataUrl;
                } else if (event.data.target === 'cover' && event.data.dataUrl) {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${event.data.dataUrl}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = event.data.dataUrl;
                }
            } else if (event.data.type === 'RESET_PREVIEW_PHOTO') {
                if (event.data.target === 'groom' || event.data.target === 'celebrant') {
                    const url = event.data.defaultUrl || defaultCelebrantPhoto;
                    const el1 = document.getElementById('previewGroomPhotoImg');
                    if (el1) el1.src = url;
                    const el2 = document.getElementById('previewCelebrantPhotoCoverImg');
                    if (el2) el2.src = url;
                } else if (event.data.target === 'cover') {
                    const url = event.data.defaultUrl || defaultCoverPhoto;
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${url}')`;
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = url;
                }
            } else if (event.data.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(event.data.images)) {
                renderDynamicGallery(event.data.images);
            } else if (event.data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            } else if (event.data.type === 'UPDATE_PREVIEW_PARENTS') {
                const pEl = document.getElementById('previewGroomParentsText');
                if (pEl) {
                    if (event.data.groomParents) {
                        pEl.textContent = event.data.groomParents;
                    } else if (event.data.resetDefault) {
                        pEl.textContent = defaultCelebrantParents;
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
