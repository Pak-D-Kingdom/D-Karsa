<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Valedictorian Commencement Gala') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Perhelatan Akbar Wisuda Prestasi & Commencement Gala {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Valedictorian Commencement Gala') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan penuh kehormatan kami mengundang Bapak/Ibu/Rekan dalam Sidang Terbuka & Commencement Gala {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200' }}">

    <!-- Google Fonts: Ivy League Cinzel & Haute Couture Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ivy: {
                            navy: '#0A192F',
                            dark: '#050C1A',
                            card: '#112240',
                            cardlight: '#1B325B',
                            gold: '#DFB76C',
                            goldbright: '#F3D289',
                            border: '#8A6D3B',
                            silver: '#CCD6F6',
                            text: '#E6F1FF'
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        /* Ivy Geometric Crest Texture */
        .ivy-mesh {
            background-color: #050C1A;
            background-image: radial-gradient(rgba(223, 183, 108, 0.15) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        /* Gold Medal Pulse */
        @keyframes medalPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 15px rgba(223, 183, 108, 0.4); }
            50% { transform: scale(1.06); box-shadow: 0 0 30px rgba(223, 183, 108, 0.7); }
        }
        .animate-medal { animation: medalPulse 3s ease-in-out infinite; }

        /* Toast animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active { animation: toastSlide 2.8s ease forwards; }
    </style>
</head>
<body class="ivy-mesh text-ivy-text font-sans antialiased selection:bg-ivy-gold selection:text-ivy-dark relative overflow-x-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200'
        );
        $valedictorianPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '08:30 WIB';

        $gradName = $couple->groom_name ?? 'Farhan Maulana, S.Kom., M.Cs.';
        $gradFull = $couple->groom_fullname ?? $gradName;
        $orderInfo = $couple->groom_birth_order ?? 'Summa Cum Laude • Valedictorian';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-ivy-card border-2 border-ivy-gold shadow-2xl flex items-center justify-center text-ivy-goldbright hover:scale-110 transition" title="Audio Hymne Kelulusan">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 7s;">🏆</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-ivy-card border border-ivy-gold text-white text-xs font-cinzel rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-ivy-goldbright">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (IVY LEAGUE COMMENCEMENT SEAL)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm bg-gradient-to-b from-ivy-card via-ivy-navy to-ivy-dark rounded-3xl p-7 text-center shadow-2xl border-2 border-ivy-gold animate-medal overflow-hidden">
            
            <div class="mx-auto text-3xl mb-1 text-ivy-gold">
                🏆
            </div>

            <div class="space-y-4">
                <span class="inline-block px-3.5 py-1 rounded-full bg-ivy-gold/20 text-ivy-goldbright text-[10px] font-cinzel font-bold tracking-[0.2em] uppercase border border-ivy-gold/40">
                    🎖️ Magna Cum Laude Honors
                </span>

                <!-- Crest Framed Portrait -->
                <div class="relative w-36 h-48 mx-auto rounded-2xl overflow-hidden p-1.5 bg-gradient-to-b from-ivy-gold via-ivy-border to-ivy-card shadow-2xl">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-ivy-dark">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Cover Honors" class="w-full h-full object-cover">
                    </div>
                </div>

                <div>
                    <span class="font-cinzel text-xs text-ivy-gold tracking-[0.2em] uppercase block">Academic Distinction</span>
                    <h1 class="font-cinzel text-xl sm:text-2xl font-bold text-white mt-1">
                        {{ $gradName }}
                    </h1>
                    <p class="text-xs text-ivy-goldbright font-semibold mt-0.5">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu Kehormatan -->
                <div class="p-4 rounded-2xl bg-ivy-dark/80 border border-ivy-gold/40 space-y-1">
                    <span class="text-[10px] font-cinzel text-ivy-gold uppercase tracking-wider block">Undangan Kehormatan:</span>
                    <b class="text-sm font-cinzel font-bold text-white block">{{ $guest->name ?? 'Tamu Kehormatan' }}</b>
                    <span class="text-[10px] text-ivy-silver block">Merupakan kebanggaan atas kehadiran Bapak/Ibu</span>
                </div>

                <!-- Buka Undangan Button -->
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-ivy-gold to-[#B8972E] hover:from-ivy-goldbright hover:to-ivy-gold text-ivy-dark font-cinzel font-bold text-xs uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-2">
                    <span>🎖️</span> <span>Buka Lembaran Kehormatan</span> <span>📜</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-ivy-dark shadow-2xl relative border-x border-ivy-border/60">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-ivy-card via-ivy-navy to-ivy-dark space-y-4 border-b border-ivy-border/60">
            <span class="text-2xl text-ivy-gold">🏛️ 🎓 🏆</span>
            
            <div class="space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-[0.2em] text-ivy-gold">
                    {{ $couple->event_heading ?? "COMMENCEMENT & VALEDICTORIAN GALA" }}
                </span>
                <h2 class="font-cinzel text-2xl sm:text-3xl font-bold text-white leading-tight">
                    Puncak Prestasi &amp; Syukuran
                </h2>
            </div>

            <p class="text-xs text-ivy-silver italic leading-relaxed max-w-xs mx-auto">
                "Perjalanan panjang ribuan mil berawal dari sebuah langkah tekad. Hari ini kami merayakan dedikasi, integritas, dan ilmu yang barakah."
            </p>

            <!-- Valedictorian Spotlight Photo -->
            <div class="pt-3">
                <div class="relative w-44 h-56 mx-auto rounded-2xl overflow-hidden p-2 bg-gradient-to-b from-ivy-gold via-ivy-border to-ivy-card shadow-2xl">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-ivy-dark">
                        <img id="previewGroomPhotoImg" src="{{ $valedictorianPhoto }}" alt="{{ $gradName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-cinzel text-2xl font-bold text-ivy-goldbright">{{ $gradFull }}</h3>
                    <p class="text-xs font-semibold text-ivy-gold">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3.5 py-0.5 rounded-full bg-ivy-gold/20 text-ivy-gold text-[11px] font-medium border border-ivy-gold/40">
                            🏛️ {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-ivy-silver pt-2 border-t border-ivy-border/40">
                            Kebanggaan dan Bakti kepada:
                            <b id="previewParentsNames" class="block font-cinzel font-bold text-ivy-gold text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-ivy-card/60 border-b border-ivy-border/60 text-center space-y-3">
            <span class="text-[11px] font-cinzel font-bold uppercase tracking-[0.2em] text-ivy-gold block">
                ⏳ Hitung Mundur Prosesi Wisuda Kehormatan
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-ivy-dark border border-ivy-gold/30 shadow-sm">
                    <b id="timerDays" class="block text-xl font-cinzel font-bold text-ivy-goldbright">00</b>
                    <span class="text-[9px] text-ivy-silver uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-ivy-dark border border-ivy-gold/30 shadow-sm">
                    <b id="timerHours" class="block text-xl font-cinzel font-bold text-ivy-goldbright">00</b>
                    <span class="text-[9px] text-ivy-silver uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-ivy-dark border border-ivy-gold/30 shadow-sm">
                    <b id="timerMinutes" class="block text-xl font-cinzel font-bold text-ivy-goldbright">00</b>
                    <span class="text-[9px] text-ivy-silver uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-ivy-dark border border-ivy-gold/30 shadow-sm">
                    <b id="timerSeconds" class="block text-xl font-cinzel font-bold text-ivy-goldbright">00</b>
                    <span class="text-[9px] text-ivy-silver uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-cinzel text-ivy-silver">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-ivy-gold">Rangkaian Acara</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Waktu &amp; Tempat Perhelatan</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-ivy-card border border-ivy-gold/40 shadow-md space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-ivy-gold to-[#B8972E] text-ivy-dark text-[10px] font-cinzel font-bold uppercase">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-ivy-goldbright">
                                    {{ $ev->start_time ?? '08:30' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-cinzel text-base font-bold text-white">{{ $ev->venue_name ?? 'Auditorium Kampus' }}</h4>
                                <p class="text-xs text-ivy-silver mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap auditorium / convention hall.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-ivy-gold hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-ivy-card border border-ivy-gold/40 shadow-md space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-ivy-gold to-[#B8972E] text-ivy-dark text-[10px] font-cinzel font-bold uppercase">
                            Sidang Terbuka &amp; Commencement Dinner
                        </span>
                        <span class="text-xs font-mono font-bold text-ivy-goldbright">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-cinzel text-base font-bold text-white">{{ $couple->venue_name ?? 'Grand Ballroom Kampus' }}</h4>
                        <p class="text-xs text-ivy-silver mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat auditorium kampus.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-ivy-gold hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Wisuda') . ' - ' . $gradName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(4)->format('Ymd\THis\Z') }}&details={{ urlencode('Commencement Gala & Wisuda ' . $gradName) }}&location={{ urlencode($couple->venue_name ?? 'Grand Ballroom') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-ivy-gold to-[#B8972E] text-ivy-dark text-xs font-cinzel font-bold shadow-lg hover:scale-105 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- PHOTO MOMENTS GALLERY -->
        <section class="p-6 bg-ivy-card/30 border-t border-ivy-border/60 space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-ivy-gold">Dokumentasi Kehormatan</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Album Mahasiswa Berprestasi</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-ivy-dark border border-ivy-gold/30 shadow">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Wisuda" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-ivy-dark border border-ivy-gold/30 shadow">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-ivy-dark border border-ivy-gold/30 shadow">
                        <img src="{{ $valedictorianPhoto }}" alt="Valedictorian Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DIGITAL GIFT / DANA APRESIASI AKADEMIK -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-ivy-dark border-t border-ivy-border/60 space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-ivy-gold">Apresiasi &amp; Kado</span>
                    <h3 class="font-cinzel text-2xl font-bold text-white">Tanda Kasih Wisudawan</h3>
                    <p class="text-xs text-ivy-silver max-w-xs mx-auto">
                        Doa restu tulus adalah kehormatan bagi kami. Fasilitas tanda kasih digital bagi sahabat &amp; kerabat:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-ivy-card border border-ivy-gold/50 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-cinzel font-bold text-ivy-goldbright">💳 {{ $couple->bank_name_1 ?? 'BANK' }}</span>
                            <span class="text-[10px] font-cinzel font-bold px-2 py-0.5 rounded bg-ivy-gold/20 text-ivy-gold">Transfer</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-white block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-ivy-silver">a.n. {{ $couple->bank_holder_1 ?? $gradName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-ivy-gold hover:bg-ivy-goldbright text-ivy-dark text-xs font-cinzel font-bold transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-ivy-card/60 border border-ivy-gold/30 text-left space-y-1">
                        <span class="text-xs font-cinzel font-bold text-ivy-gold flex items-center gap-1">
                            <span>📦</span> Kirim Karangan Bunga / Kado ke Alamat:
                        </span>
                        <p class="text-xs text-ivy-silver leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat berhasil disalin!')" class="mt-1 text-xs font-bold text-ivy-gold underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & BUKU UCAPAN VIP -->
        <section class="p-6 sm:p-8 bg-ivy-card/50 border-t border-ivy-border/60 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-cinzel font-bold uppercase tracking-widest text-ivy-gold">Konfirmasi Tamu VIP</span>
                <h3 class="font-cinzel text-2xl font-bold text-white">Buku Ucapan &amp; Kehadiran</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-ivy-dark p-5 rounded-2xl border border-ivy-gold/40 shadow-lg">
                @csrf
                <input type="hidden" name="category" value="Wisuda">
                <input type="hidden" name="theme" value="Grand Valedictorian &amp; Ivy Honor Eksklusif">
                
                <div>
                    <label class="block text-xs font-cinzel font-bold text-ivy-gold mb-1">Nama Tamu Kehormatan *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap & Gelar..." class="w-full px-3.5 py-2.5 rounded-xl bg-ivy-card border border-ivy-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-ivy-gold">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-ivy-gold mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl bg-ivy-card border border-ivy-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-ivy-gold">
                            <option value="hadir">Pasti Hadir Merayakan 🏆</option>
                            <option value="ragu">Masih Menyesuaikan Jadwal</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-cinzel font-bold text-ivy-gold mb-1">Jumlah Rombongan</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl bg-ivy-card border border-ivy-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-ivy-gold">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang (VIP Table)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-cinzel font-bold text-ivy-gold mb-1">Ucapan &amp; Harapan Sukses</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan pesan ucapan selamat wisuda..." class="w-full px-3.5 py-2 rounded-xl bg-ivy-card border border-ivy-gold/30 text-xs text-white focus:outline-none focus:ring-2 focus:ring-ivy-gold"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-gradient-to-r from-ivy-gold to-[#B8972E] text-ivy-dark font-cinzel font-bold text-xs uppercase tracking-wider shadow-md hover:scale-[1.01] transition">
                    Kirim Konfirmasi Kehadiran
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-ivy-dark border border-ivy-gold/30 shadow space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-cinzel text-ivy-goldbright">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-ivy-gold font-bold">🎖️ Hadir</span>
                            </div>
                            <p class="text-xs text-ivy-silver leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-ivy-dark border-t border-ivy-border/60 space-y-2">
            <span class="text-2xl text-ivy-gold">🏆 🎓 🏛️</span>
            <p class="font-cinzel text-sm font-bold text-ivy-goldbright">
                Per Aspera Ad Astra
            </p>
            <p class="text-[11px] text-ivy-silver">
                {{ $couple->thank_you_note ?? 'Melalui jerih payah menuju bintang-bintang. Terima kasih atas doa restu Bapak/Ibu/Rekan sekalian.' }}
            </p>
            <div class="pt-3 text-[10px] text-ivy-silver/50 border-t border-ivy-border/40">
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
                setTimeout(() => { cover.classList.add('hidden'); }, 1000);
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
                showToast('Konfirmasi kehadiran Anda telah tercatat!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Tamu Kehormatan';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-ivy-dark border border-ivy-gold/30 shadow space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-cinzel text-ivy-goldbright">${name}</b>
                            <span class="text-[10px] text-ivy-gold font-bold">🎖️ Hadir</span>
                        </div>
                        <p class="text-xs text-ivy-silver leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Kirim Konfirmasi Kehadiran';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-ivy-dark border border-ivy-gold/30 shadow';
                item.innerHTML = `<img src="${url}" alt="Momen Wisuda" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultValedictorianPhoto = "{{ $valedictorianPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'valedictorian') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'valedictorian') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultValedictorianPhoto;
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
