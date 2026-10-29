<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Birthday Celebration') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Pesta Ulang Tahun Ceria {{ $couple->groom_name }}. Yuk hadir dan rayakan bersama!">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Birthday Celebration') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Pesta Ulang Tahun Ceria {{ $couple->groom_name }}. Yuk hadir dan rayakan bersama!">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200' }}">

    <!-- Google Fonts: Playful & Friendly Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        party: {
                            bg: '#FFFDF9',
                            card: '#FFFFFF',
                            coral: '#FF6B6B',
                            yellow: '#FFD166',
                            teal: '#06D6A0',
                            blue: '#118AB2',
                            dark: '#073B4C',
                            muted: '#5A6E72',
                            border: '#FFE5B4'
                        }
                    },
                    fontFamily: {
                        fredoka: ['Fredoka', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Floating Confetti Animation */
        @keyframes confettiFloat {
            0% { transform: translateY(0) rotate(0deg); opacity: 0.8; }
            50% { transform: translateY(-15px) rotate(180deg); opacity: 1; }
            100% { transform: translateY(0) rotate(360deg); opacity: 0.8; }
        }
        .confetti-dot {
            animation: confettiFloat 4s ease-in-out infinite;
        }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: toastSlide 2.8s ease forwards;
        }
        /* Hide scrollbars for app-like clean mobile experience */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-[#FFFDF9] text-party-dark font-sans antialiased selection:bg-party-coral selection:text-white relative overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200'
        );
        $starPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '15:30 WIB';

        $personName = $couple->groom_name ?? 'Birthday Star';
        $personFull = $couple->groom_fullname ?? $personName;
        $orderInfo = $couple->groom_birth_order ?? 'Turning Fun & Awesome';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border-2 border-party-coral shadow-xl flex items-center justify-center text-party-coral hover:scale-110 transition" title="Musik Pesta">
            <span id="audioDiscIcon" class="text-lg animate-bounce">🎈</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-party-dark text-white text-xs font-bold rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-party-yellow">✨</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: POP-UP PARTY ENVELOPE (Edge-to-Edge Full Screen)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-gradient-to-b from-[#FFF0F0] via-[#FFF9ED] to-[#E8F8F5] flex flex-col justify-between items-center px-3.5 py-2.5 sm:py-4 transition-all duration-700 ease-in-out text-party-dark select-none">
        <!-- Confetti Background Elements (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="confetti-dot absolute top-4 left-4 w-4 h-4 rounded-full bg-party-coral/40"></div>
            <div class="confetti-dot absolute top-8 right-6 w-3 h-3 rounded-full bg-party-yellow/60" style="animation-delay: 1s;"></div>
            <div class="confetti-dot absolute bottom-8 left-8 w-3 h-3 rounded-full bg-party-teal/50" style="animation-delay: 2s;"></div>
            <div class="confetti-dot absolute bottom-12 right-6 w-4 h-4 rounded-full bg-party-blue/40" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="min-h-full flex flex-col justify-between items-center my-auto w-full max-w-sm py-0.5 relative z-10">
            <!-- Header -->
            <header class="w-full flex flex-col items-center text-center shrink-0">
                <span id="previewHeadingCover" class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-party-coral/10 text-party-coral text-[9px] font-fredoka font-semibold uppercase tracking-wider mb-0.5">
                    🎉 Special Birthday Invitation
                </span>
            </header>

            <!-- Center Showcase -->
            <section class="w-full my-auto py-0.5 flex flex-col items-center text-center">
                <!-- Avatar Profile -->
                <div class="relative w-20 h-20 mx-auto rounded-full p-1 bg-gradient-to-tr from-party-coral via-party-yellow to-party-teal shadow-md my-1 shrink-0">
                    <div class="w-full h-full rounded-full overflow-hidden bg-party-bg">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Party" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute -bottom-1 -right-1 text-xl">🎂</span>
                </div>

                <!-- Celebrant Name & Subtitle -->
                <div class="mt-0.5 mb-0.5 w-full">
                    <h1 id="previewPersonNameCover" class="font-fredoka text-xl sm:text-2xl font-bold text-party-dark truncate">
                        {{ $personName }}
                    </h1>
                    <p class="text-[9.5px] font-semibold text-party-coral mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu -->
                <div class="w-full py-1 px-3 rounded-xl bg-white/90 backdrop-blur-md border border-party-yellow/40 text-center shadow-xs mt-0.5">
                    <span class="text-[7.5px] font-medium text-party-muted block uppercase tracking-wider">KEPADA SAHABAT TERSAYANG:</span>
                    <b id="previewGuestNameCover" class="text-xs font-bold text-party-dark block font-fredoka mt-0.5 truncate">{{ $guest->name ?? 'Teman & Sahabat' }}</b>
                </div>
            </section>

            <!-- Bottom Button -->
            <footer class="w-full pt-1 flex flex-col items-center gap-0.5 shrink-0">
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-2.5 px-4 rounded-xl bg-party-coral hover:bg-party-coral/90 active:scale-[0.98] text-white font-fredoka font-bold text-xs shadow-md transition flex items-center justify-center gap-1.5 relative z-20 pointer-events-auto cursor-pointer">
                    <span>🎁</span> <span>Buka Undangan Pesta</span> <span>&rarr;</span>
                </button>
                <p class="text-[8.5px] font-sans text-party-muted flex items-center gap-1">
                    <span>🎈</span> Musik Pesta Ceria diputar saat dibuka
                </p>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-white shadow-2xl relative border-x border-party-border/60">

        <!-- HERO HEADER BANNER -->
        <header class="relative bg-gradient-to-b from-[#FFF2EB] via-[#FFF9ED] to-white p-6 sm:p-8 text-center overflow-hidden">
            <div class="space-y-3">
                <span class="inline-block px-3 py-1 rounded-full bg-party-teal/15 text-party-teal text-[11px] font-fredoka font-bold tracking-wider uppercase">
                    🎈 Let's Celebrate Together!
                </span>
                
                <h2 class="font-fredoka text-3xl sm:text-4xl font-bold text-party-dark leading-tight">
                    {{ $couple->event_heading ?? "IT'S PARTY TIME!" }}
                </h2>

                <p class="text-xs text-party-muted max-w-xs mx-auto leading-relaxed">
                    Hari yang penuh tawa, kue manis, dan kenangan indah bersama orang-orang tercinta.
                </p>

                <!-- Big Birthday Star Portrait -->
                <div class="relative w-44 h-44 mx-auto rounded-3xl p-2 bg-gradient-to-tr from-party-coral via-party-yellow to-party-teal shadow-xl rotate-1 hover:rotate-0 transition duration-300">
                    <div class="w-full h-full rounded-2xl overflow-hidden bg-white">
                        <img id="previewGroomPhotoImg" src="{{ $starPhoto }}" alt="{{ $personName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="pt-2">
                    <h3 class="font-fredoka text-2xl font-bold text-party-dark">{{ $personFull }}</h3>
                    <p class="text-xs font-semibold text-party-coral">{{ $orderInfo }}</p>
                    
                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-2 text-[11px] text-party-muted">
                            Putra/Putri Tercinta dari:
                            <b id="previewParentsNames" class="block font-semibold text-party-dark">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER SECTION -->
        <section class="p-6 bg-[#FFFDF9] border-y border-party-border/50 text-center space-y-4">
            <span class="text-xs font-fredoka font-bold text-party-coral uppercase tracking-wider block">
                ⏰ Hitung Mundur Menuju Hari Pesta
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-white border border-party-coral/20 shadow-sm">
                    <b id="timerDays" class="block text-xl font-fredoka font-bold text-party-coral">00</b>
                    <span class="text-[10px] font-semibold text-party-muted">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-party-yellow/40 shadow-sm">
                    <b id="timerHours" class="block text-xl font-fredoka font-bold text-party-yellow">00</b>
                    <span class="text-[10px] font-semibold text-party-muted">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-party-teal/30 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-fredoka font-bold text-party-teal">00</b>
                    <span class="text-[10px] font-semibold text-party-muted">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-party-blue/30 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-fredoka font-bold text-party-blue">00</b>
                    <span class="text-[10px] font-semibold text-party-muted">Detik</span>
                </div>
            </div>

            <p class="text-xs font-medium text-party-dark">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-fredoka font-bold text-party-teal uppercase tracking-wider">Rangkaian Acara</span>
                <h3 class="font-fredoka text-2xl font-bold text-party-dark">Waktu &amp; Lokasi Pesta</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-[#FFF9F2] border-2 border-party-yellow/30 shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full bg-party-coral text-white text-[10px] font-fredoka font-bold">
                                    {{ $ev->title ?? 'Sesi Pesta ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-bold text-party-dark">
                                    {{ $ev->start_time ?? '15:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-fredoka text-lg font-bold text-party-dark">{{ $ev->venue_name ?? 'Tempat Pesta' }}</h4>
                                <p class="text-xs text-party-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap venue acara.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-party-blue hover:underline">
                                    <span>📍</span> <span>Buka Petunjuk Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-[#FFF9F2] border-2 border-party-yellow/30 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-full bg-party-coral text-white text-[10px] font-fredoka font-bold">
                            Pesta Ulang Tahun &amp; Potong Kue
                        </span>
                        <span class="text-xs font-bold text-party-dark">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-fredoka text-lg font-bold text-party-dark">{{ $couple->venue_name ?? 'Lokasi Acara' }}</h4>
                        <p class="text-xs text-party-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Kediaman Keluarga / Fun Party Hall' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-party-blue hover:underline">
                        <span>📍</span> <span>Buka Petunjuk Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Birthday Party') . ' - ' . $personName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Pesta Ulang Tahun Ceria ' . $personName) }}&location={{ urlencode($couple->venue_name ?? 'Lokasi Pesta') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-party-yellow text-party-dark font-fredoka font-bold text-xs shadow hover:bg-party-yellow/90 transition">
                    <span>📅</span> <span>Simpan ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- PHOTO MOMENTS GALLERY -->
        <section class="p-6 bg-[#FDF9F3] border-t border-party-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-fredoka font-bold text-party-coral uppercase tracking-wider">Potret Ceria</span>
                <h3 class="font-fredoka text-2xl font-bold text-party-dark">Galeri Momen Terbaik</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-sm border border-party-border/50">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Seru" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-sm border border-party-border/50">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-sm border border-party-border/50">
                        <img src="{{ $starPhoto }}" alt="Star Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DIGITAL GIFT / POCKET MONEY -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-white border-t border-party-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-fredoka font-bold text-party-blue uppercase tracking-wider">Kado &amp; Celengan Ceria</span>
                    <h3 class="font-fredoka text-2xl font-bold text-party-dark">Tanda Kasih Sahabat</h3>
                    <p class="text-xs text-party-muted max-w-xs mx-auto">
                        Doa restu Anda adalah kado terindah. Jika ingin memberikan tanda kasih secara digital:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-5 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-blue-900 font-fredoka">💳 {{ $couple->bank_name_1 ?? 'BANK' }}</span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-blue-200 text-blue-900">Transfer</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-party-dark block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-party-muted">a.n. {{ $couple->bank_holder_1 ?? $personName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3 py-1.5 rounded-xl bg-party-blue text-white text-xs font-bold hover:bg-blue-600 transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 text-left space-y-1.5">
                        <span class="text-xs font-bold text-amber-900 font-fredoka flex items-center gap-1">
                            <span>📦</span> Kirim Kado / Hadiah ke Alamat:
                        </span>
                        <p class="text-xs text-party-dark leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat kado berhasil disalin!')" class="mt-1 text-xs font-bold text-amber-800 underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & UCAPAN SELAMAT -->
        <section class="p-6 sm:p-8 bg-[#FFFDF9] border-t border-party-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-fredoka font-bold text-party-coral uppercase tracking-wider">Konfirmasi Kehadiran</span>
                <h3 class="font-fredoka text-2xl font-bold text-party-dark">Ucapan &amp; Doa Bahagia</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-white p-5 rounded-2xl border border-party-border/80 shadow-sm">
                @csrf
                <input type="hidden" name="category" value="Ulang Tahun">
                <input type="hidden" name="theme" value="Fun Minimalist & Cheerful Birthday">
                
                <div>
                    <label class="block text-xs font-bold text-party-dark mb-1">Nama Sahabat / Teman *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama kamu..." class="w-full px-3.5 py-2.5 rounded-xl border border-party-border text-xs focus:outline-none focus:ring-2 focus:ring-party-coral">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-bold text-party-dark mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl border border-party-border text-xs focus:outline-none focus:ring-2 focus:ring-party-coral bg-white">
                            <option value="hadir">Pastikan Hadir 🎉</option>
                            <option value="ragu">Masih Ragu</option>
                            <option value="tidak_hadir">Maaf Belum Bisa</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-party-dark mb-1">Jumlah Orang</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl border border-party-border text-xs focus:outline-none focus:ring-2 focus:ring-party-coral bg-white">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-party-dark mb-1">Ucapan Ulang Tahun &amp; Doa</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan ucapan selamat ulang tahun..." class="w-full px-3.5 py-2 rounded-xl border border-party-border text-xs focus:outline-none focus:ring-2 focus:ring-party-coral"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-party-coral hover:bg-party-coral/90 text-white font-fredoka font-bold text-xs shadow-md transition">
                    Kirim Ucapan &amp; Konfirmasi
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-white border border-party-border/60 shadow-xs space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-fredoka text-party-dark">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-party-coral font-bold">🎈 Hadir</span>
                            </div>
                            <p class="text-xs text-party-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-[#FFF2EB] border-t border-party-border/60 space-y-2">
            <span class="text-2xl">🎉🎂🎈</span>
            <p class="font-fredoka text-sm font-bold text-party-dark">
                Terima kasih atas kehadiran &amp; doa hangat Anda!
            </p>
            <p class="text-[11px] text-party-muted">
                {{ $couple->thank_you_note ?? 'Sampai jumpa di hari perayaan kami yang penuh keceriaan!' }}
            </p>
            <div class="pt-3 text-[10px] text-party-muted border-t border-party-border/40">
                Created with ❤️ by <b>D'Karsa Digital Invitation</b>
            </div>
        </footer>
    </main>

    <!-- ========================================================
         SCRIPTS: AUDIO, TIMER, RSVP & LIVE PREVIEW HANDSHAKE
         ======================================================== -->
    <script>
        // Cover Screen Dismissal & Audio Auto-play
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
                if (icon) icon.classList.add('animate-bounce');
            } else {
                audio.pause();
                if (icon) icon.classList.remove('animate-bounce');
            }
        }

        // Countdown Timer
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

        // Clipboard Helper
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

        // RSVP AJAX Submit
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
                showToast('Ucapan dan konfirmasi Anda berhasil dikirim!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Sahabat';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-white border border-party-border/60 shadow-xs space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-fredoka text-party-dark">${name}</b>
                            <span class="text-[10px] text-party-coral font-bold">🎈 Hadir</span>
                        </div>
                        <p class="text-xs text-party-muted leading-relaxed">"${message}"</p>
                    `;
                    container.prepend(item);
                }
                form.reset();
            })
            .catch(() => {
                showToast('Terima kasih atas ucapan dan konfirmasi kehadiran Anda!');
            })
            .finally(() => {
                btn.disabled = false;
                btn.textContent = 'Kirim Ucapan & Konfirmasi';
            });
        }

        // Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-white shadow-sm border border-party-border/50';
                item.innerHTML = `<img src="${url}" alt="Momen Seru" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultStarPhoto = "{{ $starPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'star') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'star') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultStarPhoto;
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
