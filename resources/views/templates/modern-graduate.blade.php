<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($couple->event_heading ?? 'Graduation Celebration') . ' - ' . $couple->groom_name }} | D'Karsa</title>
    <meta name="description" content="Syukuran Kelulusan & Wisuda {{ $couple->groom_name }}.">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Graduation Celebration') . ' - ' . $couple->groom_name }}">
    <meta property="og:description" content="Dengan rasa syukur dan bahagia kami mengundang Bapak/Ibu/Sahabat dalam perayaan kelulusan {{ $couple->groom_name }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200' }}">

    <!-- Google Fonts: Editorial Serif & Clean Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        grad: {
                            bg: '#FAFAFA',
                            card: '#FFFFFF',
                            ink: '#18181B',
                            muted: '#71717A',
                            border: '#E4E4E7',
                            blue: '#2563EB',
                            bluelight: '#EFF6FF',
                        }
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

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
<body class="bg-[#FAFAFA] text-grad-ink font-sans antialiased selection:bg-grad-blue selection:text-white relative overflow-x-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200'
        );
        $gradPhoto = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600'
        );
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '10:00 WIB';

        $gradName = $couple->groom_name ?? 'Alifian Pratama, S.T.';
        $gradFull = $couple->groom_fullname ?? $gradName;
        $orderInfo = $couple->groom_birth_order ?? 'Wisudawan Berprestasi';
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Floating Audio Button -->
    <div id="audioFloatingBtn" class="fixed top-5 right-5 z-40 hidden">
        <button type="button" onclick="toggleAudio()" class="w-12 h-12 rounded-full bg-white border border-grad-border shadow-xl flex items-center justify-center text-grad-blue hover:scale-105 transition" title="Audio Syukuran">
            <span id="audioDiscIcon" class="text-base animate-spin" style="animation-duration: 8s;">🎓</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-grad-ink text-white text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="text-grad-blue">✦</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN (MODERN EDITORIAL MONOGRAPH)
         ======================================================== -->
    <div id="coverScreen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4 transition-all duration-1000 ease-in-out">
        <div class="relative w-full max-w-sm bg-white rounded-3xl p-7 text-center shadow-2xl border border-grad-border overflow-hidden">
            
            <div class="space-y-4">
                <span class="inline-block px-3.5 py-1 rounded-full bg-grad-bluelight text-grad-blue text-[11px] font-bold tracking-wider uppercase border border-blue-200">
                    🎓 Graduation Announcement
                </span>

                <!-- Minimalist Square Frame with Rounded Corners -->
                <div class="relative w-36 h-48 mx-auto rounded-2xl overflow-hidden p-1 bg-grad-border shadow-md">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-grad-bg">
                        <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Graduation Cover" class="w-full h-full object-cover">
                    </div>
                </div>

                <div>
                    <span class="font-serif italic text-base text-grad-muted block">Class of Honors</span>
                    <h1 class="font-serif text-2xl sm:text-3xl font-bold text-grad-ink mt-0.5">
                        {{ $gradName }}
                    </h1>
                    <p class="text-xs text-grad-blue font-semibold mt-1">
                        {{ $orderInfo }}
                    </p>
                </div>

                <!-- Kepada Yth Tamu -->
                <div class="p-4 rounded-2xl bg-grad-bg border border-grad-border space-y-1">
                    <span class="text-[10px] text-grad-muted block uppercase tracking-wider">Kepada Sahabat &amp; Keluarga:</span>
                    <b class="text-sm font-serif font-bold text-grad-ink block">{{ $guest->name ?? 'Tamu Undangan Tercinta' }}</b>
                    <span class="text-[10px] text-grad-muted block">Kami mengundang Anda merayakan momen berharga ini</span>
                </div>

                <!-- Buka Undangan Button -->
                <button type="button" id="openInvitationBtn" onclick="openInvitation()" class="w-full py-3.5 px-6 rounded-2xl bg-grad-ink hover:bg-grad-blue text-white font-medium text-xs tracking-wider uppercase shadow-md transition flex items-center justify-center gap-2">
                    <span>🎓</span> <span>Buka Lembaran Wisuda</span> <span>✨</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER
         ======================================================== -->
    <main class="max-w-md mx-auto min-h-screen bg-white shadow-2xl relative border-x border-grad-border">

        <!-- HEADER SECTION -->
        <header class="p-7 sm:p-9 text-center bg-gradient-to-b from-grad-bg to-white space-y-4">
            <span class="text-2xl">🎓 📜 🏛️</span>
            
            <div class="space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-grad-blue">
                    {{ $couple->event_heading ?? "GRADUATION INVITATION & CELEBRATION" }}
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-grad-ink leading-tight">
                    Momen Kebanggaan
                </h2>
            </div>

            <p class="text-xs text-grad-muted italic leading-relaxed max-w-xs mx-auto">
                "Pendidikan adalah paspor untuk masa depan, karena hari esok adalah milik mereka yang mempersiapkannya hari ini."
            </p>

            <!-- Graduate Portrait Spotlight -->
            <div class="pt-2">
                <div class="relative w-44 h-56 mx-auto rounded-2xl overflow-hidden p-1.5 bg-gradient-to-b from-grad-blue/20 to-grad-border shadow-xl">
                    <div class="w-full h-full rounded-xl overflow-hidden bg-grad-bg">
                        <img id="previewGroomPhotoImg" src="{{ $gradPhoto }}" alt="{{ $gradName }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-4 space-y-1">
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold text-grad-ink">{{ $gradFull }}</h3>
                    <p class="text-xs font-semibold text-grad-blue">{{ $orderInfo }}</p>

                    @if(!empty($couple->groom_city))
                        <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-grad-bluelight text-grad-blue text-[11px] font-medium border border-blue-200">
                            🏛️ {{ $couple->groom_city }}
                        </span>
                    @endif

                    @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                        <div id="previewParentsContainer" class="mt-3 text-xs text-grad-muted pt-2 border-t border-grad-border/60">
                            Putra/Putri Tercinta dari:
                            <b id="previewParentsNames" class="block font-serif font-bold text-grad-ink text-sm mt-0.5">
                                {{ \App\Services\TemplateManager::formatParentNames($couple->groom_father, $couple->groom_mother) }}
                            </b>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- COUNTDOWN TIMER -->
        <section class="p-6 bg-grad-bg border-y border-grad-border text-center space-y-3">
            <span class="text-[11px] font-bold uppercase tracking-wider text-grad-blue block">
                ⏳ Menuju Prosesi Wisuda &amp; Tasyakuran
            </span>

            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                <div class="p-2.5 rounded-2xl bg-white border border-grad-border shadow-xs">
                    <b id="timerDays" class="block text-xl font-serif font-bold text-grad-ink">00</b>
                    <span class="text-[9px] text-grad-muted uppercase">Hari</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-grad-border shadow-xs">
                    <b id="timerHours" class="block text-xl font-serif font-bold text-grad-ink">00</b>
                    <span class="text-[9px] text-grad-muted uppercase">Jam</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-grad-border shadow-xs">
                    <b id="timerMinutes" class="block text-xl font-serif font-bold text-grad-ink">00</b>
                    <span class="text-[9px] text-grad-muted uppercase">Menit</span>
                </div>
                <div class="p-2.5 rounded-2xl bg-white border border-grad-border shadow-xs">
                    <b id="timerSeconds" class="block text-xl font-serif font-bold text-grad-ink">00</b>
                    <span class="text-[9px] text-grad-muted uppercase">Detik</span>
                </div>
            </div>

            <p class="text-xs font-serif text-grad-ink">
                📅 {{ $eventDateFormatted }} • 🕒 {{ $eventTimeFormatted }}
            </p>
        </section>

        <!-- EVENT DETAILS & SCHEDULE -->
        <section class="p-6 sm:p-8 space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-grad-blue">Rangkaian Acara</span>
                <h3 class="font-serif text-2xl font-bold text-grad-ink">Waktu &amp; Lokasi Wisuda</h3>
            </div>

            @if(isset($couple->events) && count($couple->events) > 0)
                <div class="space-y-4">
                    @foreach($couple->events as $idx => $ev)
                        <div class="p-5 rounded-2xl bg-grad-bg border border-grad-border space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-grad-ink text-white text-[10px] font-bold">
                                    {{ $ev->title ?? 'Sesi ' . ($idx + 1) }}
                                </span>
                                <span class="text-xs font-mono font-bold text-grad-blue">
                                    {{ $ev->start_time ?? '09:00' }} - {{ $ev->end_time ?? 'Selesai' }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-serif text-base font-bold text-grad-ink">{{ $ev->venue_name ?? 'Auditorium Kampus' }}</h4>
                                <p class="text-xs text-grad-muted mt-0.5 leading-relaxed">{{ $ev->address ?? 'Alamat lengkap auditorium / hall acara.' }}</p>
                            </div>

                            @if(!empty($ev->maps_url))
                                <a href="{{ $ev->maps_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-grad-blue hover:underline">
                                    <span>📍</span> <span>Buka Google Maps &rarr;</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 rounded-2xl bg-grad-bg border border-grad-border space-y-2.5">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-0.5 rounded-full bg-grad-ink text-white text-[10px] font-bold">
                            Sidang Terbuka &amp; Tasyakuran Keluarga
                        </span>
                        <span class="text-xs font-mono font-bold text-grad-blue">{{ $eventTimeFormatted }}</span>
                    </div>

                    <div>
                        <h4 class="font-serif text-base font-bold text-grad-ink">{{ $couple->venue_name ?? 'Auditorium Kampus' }}</h4>
                        <p class="text-xs text-grad-muted mt-0.5 leading-relaxed">{{ $couple->venue_address ?? 'Alamat venue acara wisuda.' }}</p>
                    </div>

                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-grad-blue hover:underline">
                        <span>📍</span> <span>Buka Google Maps &rarr;</span>
                    </a>
                </div>
            @endif

            <!-- Calendar Add Button -->
            <div class="text-center pt-1">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode(($couple->event_heading ?? 'Wisuda') . ' - ' . $gradName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Syukuran Wisuda ' . $gradName) }}&location={{ urlencode($couple->venue_name ?? 'Auditorium') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-grad-blue text-white text-xs font-medium shadow hover:bg-blue-700 transition">
                    <span>📅</span> <span>Simpan Tanggal ke Google Calendar</span>
                </a>
            </div>
        </section>

        <!-- PHOTO MOMENTS GALLERY -->
        <section class="p-6 bg-grad-bg border-t border-grad-border space-y-4">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-grad-blue">Dokumentasi Studi</span>
                <h3 class="font-serif text-2xl font-bold text-grad-ink">Galeri Momen Perjuangan</h3>
            </div>

            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-3">
                @if(isset($galleries) && count($galleries) > 0)
                    @foreach($galleries as $g)
                        <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-grad-border">
                            <img src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? null, $coverImg) }}" alt="Momen Wisuda" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-grad-border">
                        <img src="{{ $coverImg }}" alt="Cover Moment" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-grad-border">
                        <img src="{{ $gradPhoto }}" alt="Grad Moment" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- DIGITAL GIFT / APRESIASI WISUDA -->
        @if(!empty($couple->bank_account_1) || !empty($couple->gift_address))
            <section class="p-6 sm:p-8 bg-white border-t border-grad-border space-y-5 text-center">
                <div class="space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-grad-blue">Kado &amp; Tanda Apresiasi</span>
                    <h3 class="font-serif text-2xl font-bold text-grad-ink">Kado Wisudawan</h3>
                    <p class="text-xs text-grad-muted max-w-xs mx-auto">
                        Doa restu tulus adalah hadiah terindah. Bagi sahabat yang ingin memberikan apresiasi digital:
                    </p>
                </div>

                @if(!empty($couple->bank_account_1))
                    <div class="p-4 rounded-2xl bg-grad-bluelight/70 border border-blue-200 text-left space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-grad-blue font-serif">💳 {{ $couple->bank_name_1 ?? 'BANK' }}</span>
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded bg-blue-100 text-blue-900">Transfer</span>
                        </div>
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <b class="text-sm font-mono text-grad-ink block">{{ $couple->bank_account_1 }}</b>
                                <span class="text-xs text-grad-muted">a.n. {{ $couple->bank_holder_1 ?? $gradName }}</span>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $couple->bank_account_1 }}', 'Nomor rekening berhasil disalin!')" class="px-3.5 py-1.5 rounded-xl bg-grad-blue text-white text-xs font-medium hover:bg-blue-700 transition">
                                Salin
                            </button>
                        </div>
                    </div>
                @endif

                @if(!empty($couple->gift_address))
                    <div class="p-4 rounded-2xl bg-grad-bg border border-grad-border text-left space-y-1">
                        <span class="text-xs font-bold text-grad-ink flex items-center gap-1">
                            <span>📦</span> Kirim Kado / Hadiah ke Alamat:
                        </span>
                        <p class="text-xs text-grad-muted leading-relaxed">{{ $couple->gift_address }}</p>
                        <button type="button" onclick="copyToClipboard('{{ addslashes($couple->gift_address) }}', 'Alamat berhasil disalin!')" class="mt-1 text-xs font-bold text-grad-blue underline">
                            Salin Alamat Lengkap
                        </button>
                    </div>
                @endif
            </section>
        @endif

        <!-- RSVP & UCAPAN SELAMAT -->
        <section class="p-6 sm:p-8 bg-grad-bg border-t border-grad-border space-y-6">
            <div class="text-center space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-grad-blue">Buku Tamu</span>
                <h3 class="font-serif text-2xl font-bold text-grad-ink">Ucapan Selamat &amp; Kehadiran</h3>
            </div>

            <!-- Form RSVP -->
            <form id="rsvpForm" onsubmit="submitRsvp(event)" class="space-y-3.5 bg-white p-5 rounded-2xl border border-grad-border shadow-xs">
                @csrf
                <input type="hidden" name="category" value="Wisuda">
                <input type="hidden" name="theme" value="Modern Minimalist Graduation &amp; Syukuran">
                
                <div>
                    <label class="block text-xs font-bold text-grad-ink mb-1">Nama Sahabat / Kerabat *</label>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda..." class="w-full px-3.5 py-2.5 rounded-xl border border-grad-border text-xs focus:outline-none focus:ring-2 focus:ring-grad-blue">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-bold text-grad-ink mb-1">Kehadiran</label>
                        <select name="attendance" class="w-full px-3 py-2 rounded-xl border border-grad-border text-xs focus:outline-none focus:ring-2 focus:ring-grad-blue bg-white">
                            <option value="hadir">Pasti Hadir Merayakan 🎓</option>
                            <option value="ragu">Masih Ragu</option>
                            <option value="tidak_hadir">Berhalangan Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-grad-ink mb-1">Jumlah</label>
                        <select name="guest_count" class="w-full px-3 py-2 rounded-xl border border-grad-border text-xs focus:outline-none focus:ring-2 focus:ring-grad-blue bg-white">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3+ Orang</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-grad-ink mb-1">Ucapan Selamat Wisuda</label>
                    <textarea name="message" rows="3" placeholder="Tuliskan ucapan selamat dan doa..." class="w-full px-3.5 py-2 rounded-xl border border-grad-border text-xs focus:outline-none focus:ring-2 focus:ring-grad-blue"></textarea>
                </div>

                <button type="submit" id="btnSubmitRsvp" class="w-full py-3 rounded-xl bg-grad-ink hover:bg-grad-blue text-white font-medium text-xs tracking-wider uppercase shadow-md transition">
                    Kirim Ucapan &amp; Konfirmasi
                </button>
            </form>

            <!-- Wishes Feed Container -->
            <div id="wishesFeedContainer" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $w)
                        <div class="p-3.5 rounded-xl bg-white border border-grad-border shadow-xs space-y-1">
                            <div class="flex items-center justify-between">
                                <b class="text-xs font-serif text-grad-ink">{{ $w->name ?? $w->sender_name }}</b>
                                <span class="text-[10px] text-grad-blue font-semibold">🎓 Hadir</span>
                            </div>
                            <p class="text-xs text-grad-muted leading-relaxed">"{{ $w->message }}"</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="p-6 text-center bg-grad-bg border-t border-grad-border space-y-2">
            <span class="text-xl">🎓 📜 🏛️</span>
            <p class="font-serif text-sm font-bold text-grad-ink">
                Terima kasih atas doa &amp; dukungan Anda!
            </p>
            <p class="text-[11px] text-grad-muted">
                {{ $couple->thank_you_note ?? 'Langkah awal menuju pengabdian dan karya terbaik untuk masa depan.' }}
            </p>
            <div class="pt-3 text-[10px] text-grad-muted border-t border-grad-border/60">
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
                showToast('Ucapan dan konfirmasi kehadiran Anda berhasil dikirim!');
                const container = document.getElementById('wishesFeedContainer');
                if (container) {
                    const name = formData.get('name') || 'Sahabat';
                    const message = formData.get('message') || '';
                    const item = document.createElement('div');
                    item.className = 'p-3.5 rounded-xl bg-white border border-grad-border shadow-xs space-y-1';
                    item.innerHTML = `
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-serif text-grad-ink">${name}</b>
                            <span class="text-[10px] text-grad-blue font-semibold">🎓 Hadir</span>
                        </div>
                        <p class="text-xs text-grad-muted leading-relaxed">"${message}"</p>
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
                btn.textContent = 'Kirim Ucapan & Konfirmasi';
            });
        }

        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !images || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url) => {
                const item = document.createElement('div');
                item.className = 'aspect-square rounded-2xl overflow-hidden bg-white shadow-xs border border-grad-border';
                item.innerHTML = `<img src="${url}" alt="Momen Wisuda" class="w-full h-full object-cover">`;
                grid.appendChild(item);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultGradPhoto = "{{ $gradPhoto }}";

        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = photoUrl;
                } else if (target === 'groom' || target === 'person' || target === 'grad') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'person' || target === 'grad') {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = defaultGradPhoto;
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
