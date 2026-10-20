<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menunggu ACC Admin | D'Karsa</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: '#f63854',
                        accent: '#cf2445',
                        ink: '#1c1417',
                        ink2: '#4a3f43',
                        ink3: '#7a6f73',
                        blush: '#fdf4f5',
                        sunk: '#faf0f2',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #faf5f6; color: #1c1417; }
        .toast-show { transform: translateY(0); opacity: 1; pointer-events: auto; }
        .toast-hide { transform: translateY(1rem); opacity: 0; pointer-events: none; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <div class="max-w-xl w-full bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-amber-200 text-center space-y-6 my-auto">
        
        {{-- Pending Icon --}}
        <div class="w-20 h-20 rounded-full bg-amber-100 text-amber-600 mx-auto grid place-items-center text-4xl shadow-inner animate-pulse">
            ⏳
        </div>

        <div>
            <span class="inline-block px-3.5 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider mb-2">
                Menunggu Persetujuan Admin
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-ink leading-tight">
                Pendaftaran Undangan Berhasil!
            </h1>
            <p class="text-xs sm:text-sm text-ink2 mt-2 leading-relaxed">
                Terima kasih <b>{{ $couple->customer_name ?: $couple->groom_name }}</b>, data formulir undangan Anda telah berhasil kami terima.
            </p>
        </div>

        {{-- Order Summary Card --}}
        <div class="p-5 rounded-2xl bg-sunk/70 border border-ink/15 text-left space-y-3">
            <div class="flex items-center justify-between border-b border-ink/10 pb-2.5">
                <span class="text-xs font-bold uppercase tracking-wider text-ink3">Ringkasan Data:</span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-[11px] font-extrabold">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                    Menunggu ACC
                </span>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-xs">
                <div>
                    <span class="text-[11px] text-ink3 block">Nama Acara / Mempelai:</span>
                    <b class="text-ink font-semibold">
                        @if($couple->category === 'Pernikahan')
                            {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                        @else
                            {{ $couple->groom_fullname ?: $couple->groom_name }}
                        @endif
                    </b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">Kategori Acara:</span>
                    <b class="text-ink font-semibold">{{ $couple->category ?: 'Pernikahan' }}</b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">Tanggal Acara:</span>
                    <b class="text-ink font-semibold">{{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('d F Y') }}</b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">WhatsApp Pemesan:</span>
                    <b class="text-ink font-semibold">{{ $couple->customer_phone ?: '-' }}</b>
                </div>
            </div>
        </div>

        {{-- Important Notice Card --}}
        <div class="p-4 rounded-2xl bg-amber-50/80 border border-amber-300 text-left space-y-2">
            <b class="text-xs font-bold text-amber-950 flex items-center gap-1.5">
                <span>📢</span> Langkah Selanjutnya (Alur ACC Admin):
            </b>
            <ol class="text-[11.5px] text-amber-900 leading-relaxed list-decimal list-inside space-y-1">
                <li>Admin D'Karsa akan memeriksa kelengkapan data &amp; tata letak undangan Anda.</li>
                <li>Setelah disetujui (ACC), Admin akan <b>mengaktifkan tautan resmi</b> undangan Anda.</li>
                <li>Admin akan menghubungi nomor WhatsApp Anda (<b>{{ $couple->customer_phone ?: 'yang terdaftar' }}</b>) untuk menyerahkan tautan aktif siap sebar.</li>
            </ol>
        </div>

        {{-- Planned Link (Akan Aktif Setelah di-ACC) --}}
        <div class="p-4 rounded-2xl bg-white border border-ink/15 text-left space-y-2 shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-ink3 block">Rencana Tautan Undangan Utama:</span>
                <span class="text-[10px] text-amber-700 bg-amber-100 font-bold px-2 py-0.5 rounded">Belum Aktif</span>
            </div>
            <div class="flex items-center gap-2 bg-sunk/60 rounded-xl p-2.5 border border-ink/10">
                <input type="text" id="mainInviteLink" readonly value="{{ url('/undangan/' . $couple->slug) }}"
                       class="w-full text-xs font-mono font-bold text-ink2 bg-transparent focus:outline-none select-all cursor-not-allowed" title="Tautan akan aktif setelah di-ACC oleh Admin">
                <button type="button" onclick="copyMainLink()"
                        class="px-3.5 py-1.5 rounded-lg bg-ink/10 hover:bg-ink/20 text-ink text-xs font-bold shrink-0 transition">
                    Salin
                </button>
            </div>
            <p class="text-[10.5px] text-ink3 italic">
                * Tautan ini saat ini masih terkunci dan akan otomatis terbuka setelah di-ACC oleh admin.
            </p>
        </div>

        @php
            $categoryName = $couple->category ?? 'Pernikahan';
            if ($categoryName === 'Keagamaan' || str_contains(strtolower($categoryName), 'tahlil') || str_contains(strtolower($categoryName), 'pengajian')) {
                $guestPlaceholder = 'Contoh perorangan: Ustadz Syamsuddin, Bapak H. Mansur, Ibu Hj. Maryam';
            } elseif ($categoryName === 'Seminar & Event') {
                $guestPlaceholder = 'Contoh perorangan: dr. Bambang Sudiro, Ahmad Fauzi S.Kom, Peserta';
            } elseif ($categoryName === 'Ulang Tahun' || $categoryName === 'Wisuda') {
                $guestPlaceholder = 'Contoh perorangan: Kevin Pratama, Rina, Sahabat Dekat';
            } else {
                $guestPlaceholder = 'Contoh perorangan: Rian Hidayat, dr. Sarah Amanda, Bapak Hendra';
            }
        @endphp

        {{-- Generator Tautan Tamu & Pesan WhatsApp Mandiri --}}
        <div class="p-5 rounded-2xl bg-gradient-to-br from-pink-50/70 via-rose-50/40 to-white border border-pink-200/90 text-left space-y-3.5 shadow-sm">
            <div class="flex items-center justify-between flex-wrap gap-1">
                <span class="text-xs font-bold text-ink flex items-center gap-1.5">
                    <span class="text-brand text-base">💌</span> Buat Tautan Khusus Nama Tamu (Bebas &amp; Mandiri):
                </span>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-pink-100 text-pink-700 text-[10px] font-extrabold">
                    Tanpa Batas Tamu
                </span>
            </div>
            
            <p class="text-[11.5px] text-ink2 leading-relaxed">
                Ingin nama tamu perorangan (individu) atau keluarga tercantum khusus di cover saat tautan dibuka? Pilih cara yang paling praktis untuk Anda:
            </p>

            <!-- Mode Switcher Tabs -->
            <div class="flex items-center gap-1.5 p-1 bg-white/90 rounded-xl border border-pink-200 text-xs font-bold">
                <button type="button" id="tabModeSingle" onclick="switchGuestMode('single')"
                        class="flex-1 py-1.5 px-3 rounded-lg bg-brand text-white shadow-sm transition">
                    ✍️ Ketik 1 Per 1
                </button>
                <button type="button" id="tabModeBatch" onclick="switchGuestMode('batch')"
                        class="flex-1 py-1.5 px-3 rounded-lg text-ink3 hover:text-ink hover:bg-pink-100/50 transition">
                    📋 Tempel Banyak Nama (10 - 100+ Tamu)
                </button>
            </div>

            <!-- Single Guest Container -->
            <div id="singleGuestContainer" class="space-y-3">
                <div class="space-y-1.5">
                    <label for="guestNameInput" class="text-[11px] font-bold text-ink3 block">
                        Ketik Nama Tamu (Bisa Perorangan / Individu / Keluarga):
                    </label>
                    <div class="relative">
                        <input type="text" id="guestNameInput" placeholder="{{ $guestPlaceholder }}"
                               class="w-full text-xs font-medium text-ink bg-white rounded-xl px-3.5 py-2.5 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition"
                               oninput="updateGuestLink()">
                    </div>
                    <p class="text-[10px] text-ink3 italic">
                        * Bebas diisi nama perorangan (1 orang), gelar, ustadz/jamaah, teman, maupun rombongan keluarga.
                    </p>
                </div>

                {{-- Link Result Box --}}
                <div class="p-3 bg-white rounded-xl border border-pink-200 space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-ink3">Tautan Khusus untuk Tamu Ini:</span>
                        <span id="guestLabelBadge" class="text-[9.5px] font-bold px-1.5 py-0.5 bg-gray-100 text-gray-600 rounded">Format Otomatis</span>
                    </div>
                    <div class="flex items-center gap-2 bg-sunk/60 rounded-lg p-2 border border-ink/10">
                        <input type="text" id="guestInviteLink" readonly value="{{ url('/undangan/' . $couple->slug) }}"
                               class="w-full text-xs font-mono font-bold text-brand bg-transparent focus:outline-none select-all">
                        <button type="button" onclick="copyGuestLink()"
                                class="px-3 py-1 rounded-md bg-brand/10 hover:bg-brand/20 text-brand text-xs font-bold shrink-0 transition">
                            Salin Link
                        </button>
                    </div>
                </div>

                {{-- WhatsApp Share Button to Guest --}}
                <button type="button" onclick="shareWaGuest()"
                   class="w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition flex items-center justify-center gap-2 shadow-sm">
                    <span>📲</span> Kirim Pesan Undangan via WhatsApp ke Tamu Ini
                </button>
            </div>

            <!-- Batch Guests Container (Untuk 10 - 100+ Tamu Sekaligus) -->
            <div id="batchGuestContainer" class="hidden space-y-3">
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="batchGuestNamesInput" class="text-[11px] font-bold text-ink3 block">
                            Tempelkan (Paste) Daftar Nama Tamu (1 Nama Per Baris):
                        </label>
                        <span id="batchCountBadge" class="hidden text-[10px] font-bold text-brand bg-pink-100 px-2 py-0.5 rounded-full"></span>
                    </div>
                    <textarea id="batchGuestNamesInput" rows="6"
                              placeholder="Contoh:&#10;Ustadz Dr. H. Syamsuddin&#10;dr. Sarah Amanda&#10;Rian Hidayat&#10;Bapak Hendra Wijaya&#10;..."
                              class="w-full text-xs font-medium text-ink bg-white rounded-xl p-3 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-brand leading-relaxed"></textarea>
                    <p class="text-[10px] text-ink3 italic">
                        💡 Bisa copy-paste langsung dari kolom Excel atau pesan WA. Penomoran (1., 2., dll) otomatis dirapikan.
                    </p>
                </div>

                <div class="flex items-center justify-between gap-2 flex-wrap">
                    <button type="button" onclick="generateBatchLinks()"
                            class="py-2.5 px-4 rounded-xl bg-brand hover:bg-accent text-white font-bold text-xs transition shadow flex items-center gap-1.5">
                        <span>⚡</span> Buat Semua Tautan Tamu
                    </button>
                    <button type="button" id="btnCopyAllBatch" onclick="copyAllBatchLinks()"
                            class="hidden py-2 px-3 rounded-xl bg-pink-100 hover:bg-pink-200 text-pink-800 font-bold text-xs transition flex items-center gap-1">
                        <span>📋</span> Salin Semua Tautan (Untuk Excel)
                    </button>
                </div>

                <!-- Batch Results List Container -->
                <div id="batchResultsContainer" class="hidden space-y-2 max-h-60 overflow-y-auto p-2 bg-white rounded-xl border border-pink-200">
                </div>
            </div>
            
            <div class="p-2.5 rounded-xl bg-pink-100/50 border border-pink-200/60 text-[11px] text-ink2 space-y-1">
                <b class="text-ink font-semibold flex items-center gap-1">
                    <span>💡</span> Tips Praktis untuk 100+ Tamu:
                </b>
                <p class="leading-relaxed text-[10.5px]">
                    1. <b>Cara Cepat Sendiri:</b> Gunakan tab <i>"Tempel Banyak Nama"</i> di atas untuk menghasilkan 100 link seketika.<br>
                    2. <b>Melalui Admin:</b> Kirimkan daftar nama tamu ke WhatsApp Admin saat proses ACC, Admin dapat memasukkannya langsung ke sistem reservasi.
                </p>
            </div>
        </div>

        {{-- WhatsApp Confirm Button to Admin --}}
        @php
            $waCustomerMsg = "Halo Admin D'Karsa,\n\nSaya telah selesai membuat data undangan digital melalui website:\n" .
                "- Pemesan: " . ($couple->customer_name ?: $couple->groom_name) . "\n" .
                "- Acara: " . ($couple->category === 'Pernikahan' ? "{$couple->groom_name} & {$couple->bride_name}" : $couple->groom_name) . "\n" .
                "- Kode/Slug: {$couple->slug}\n" .
                "- Tanggal Acara: " . \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('d F Y') . "\n\n" .
                "Mohon bantuannya untuk diperiksa dan di-ACC agar link undangan resmi dapat diaktifkan. Terima kasih!";
            $waAdminUrl = "https://wa.me/6281234567890?text=" . urlencode($waCustomerMsg);
        @endphp

        <div class="space-y-2.5 pt-2">
            <a href="{{ $waAdminUrl }}" target="_blank"
               class="w-full py-3.5 px-5 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                <span>💬</span> Konfirmasi ke WhatsApp Admin Sekarang
            </a>
            <p class="text-[10.5px] text-ink3 text-center leading-relaxed">
                📎 <i>Ingin dibantu input daftar tamu oleh admin? Setelah chat WA terbuka, lampirkan file Excel/Word atau kirim daftar nama tamu via tombol lampiran (klip 📎) di WhatsApp.</i>
            </p>

            <div class="grid sm:grid-cols-2 gap-2.5 pt-1">
                <a href="{{ route('invitation.index') }}"
                   class="w-full py-3 px-4 rounded-xl bg-white border border-ink/15 text-ink2 hover:bg-sunk font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-1.5">
                    <span>←</span> Beranda
                </a>
                <a href="{{ route('invitation.create') }}"
                   class="w-full py-3 px-4 rounded-xl bg-white border border-ink/15 text-ink2 hover:bg-sunk font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-1.5">
                    <span>+</span> Buat Undangan Lain
                </a>
            </div>
        </div>

    </div>

    {{-- TOAST NOTIFICATION --}}
    <div id="toastNotification" class="fixed top-5 left-1/2 -translate-x-1/2 z-50 px-5 py-3 rounded-full bg-black/90 backdrop-blur-md text-white text-xs font-bold shadow-2xl transition-all duration-300 toast-hide flex items-center gap-2">
        <span>✓</span>
        <span>Tautan undangan disalin ke clipboard!</span>
    </div>

    <script>
        const baseUrl = "{{ url('/undangan/' . $couple->slug) }}";
        const coupleTitle = @json($couple->category === 'Pernikahan' ? ($couple->groom_name . ' & ' . $couple->bride_name) : ($couple->groom_fullname ?: $couple->groom_name));
        const eventDate = @json(\Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y'));
        const eventCategory = @json($couple->category ?? 'Pernikahan');

        function updateGuestLink() {
            const input = document.getElementById('guestNameInput').value.trim();
            const guestLinkInput = document.getElementById('guestInviteLink');
            const badge = document.getElementById('guestLabelBadge');
            
            if (input.length > 0) {
                const encodedName = encodeURIComponent(input);
                guestLinkInput.value = `${baseUrl}?to=${encodedName}`;
                badge.innerText = `Untuk: ${input}`;
                badge.className = "text-[9.5px] font-bold px-1.5 py-0.5 bg-brand/10 text-brand rounded truncate max-w-[150px]";
            } else {
                guestLinkInput.value = baseUrl;
                badge.innerText = "Format Otomatis";
                badge.className = "text-[9.5px] font-bold px-1.5 py-0.5 bg-gray-100 text-gray-600 rounded";
            }
        }

        function copyMainLink() {
            const copyText = document.getElementById("mainInviteLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value).then(() => {
                showToast("Tautan utama undangan disalin!");
            }).catch(() => {
                showToast("Tautan utama undangan disalin!");
            });
        }

        function copyGuestLink() {
            const copyText = document.getElementById("guestInviteLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value).then(() => {
                showToast("Tautan khusus tamu berhasil disalin!");
            }).catch(() => {
                showToast("Tautan khusus tamu berhasil disalin!");
            });
        }

        function shareWaGuest() {
            const guestName = document.getElementById('guestNameInput').value.trim() || 'Bapak/Ibu/Saudara/i';
            const guestLink = document.getElementById('guestInviteLink').value;
            
            let message = "";
            const isReligious = /keagamaan|pengajian|tahlil|doa|walimah|safar/i.test(eventCategory);

            if (isReligious) {
                message = `Kepada Yth. ${guestName},\n\n` +
                    `Assalamu'alaikum Warahmatullahi Wabarakatuh.\n\n` +
                    `Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara kami:\n\n` +
                    `*${coupleTitle}*\n` +
                    `🗓 Hari/Tanggal: ${eventDate}\n\n` +
                    `Untuk melihat susunan acara dan lokasi, silakan buka tautan undangan digital berikut:\n` +
                    `${guestLink}\n\n` +
                    `Kehadiran serta doa restu Bapak/Ibu/Saudara/i merupakan suatu kehormatan dan kebahagiaan bagi kami.\n\n` +
                    `Wassalamu'alaikum Warahmatullahi Wabarakatuh.`;
            } else {
                message = `Kepada Yth. ${guestName},\n\n` +
                    `Tanpa mengurangi rasa hormat, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara kami:\n\n` +
                    `*${coupleTitle}*\n` +
                    `🗓 Hari/Tanggal: ${eventDate}\n\n` +
                    `Untuk melihat informasi lengkap acara dan konfirmasi kehadiran (RSVP), silakan buka tautan undangan digital kami berikut:\n` +
                    `${guestLink}\n\n` +
                    `Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n` +
                    `Terima kasih!`;
            }

            const waShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;
            window.open(waShareUrl, '_blank');
        }

        function switchGuestMode(mode) {
            const tabSingle = document.getElementById('tabModeSingle');
            const tabBatch = document.getElementById('tabModeBatch');
            const singleCont = document.getElementById('singleGuestContainer');
            const batchCont = document.getElementById('batchGuestContainer');

            if (mode === 'single') {
                tabSingle.className = "flex-1 py-1.5 px-3 rounded-lg bg-brand text-white shadow-sm transition";
                tabBatch.className = "flex-1 py-1.5 px-3 rounded-lg text-ink3 hover:text-ink hover:bg-pink-100/50 transition";
                singleCont.classList.remove('hidden');
                batchCont.classList.add('hidden');
            } else {
                tabBatch.className = "flex-1 py-1.5 px-3 rounded-lg bg-brand text-white shadow-sm transition";
                tabSingle.className = "flex-1 py-1.5 px-3 rounded-lg text-ink3 hover:text-ink hover:bg-pink-100/50 transition";
                singleCont.classList.add('hidden');
                batchCont.classList.remove('hidden');
            }
        }

        let currentBatchResults = [];

        function generateBatchLinks() {
            const raw = document.getElementById('batchGuestNamesInput').value;
            const lines = raw.split(/\r?\n/);
            const resultsBox = document.getElementById('batchResultsContainer');
            const btnCopyAll = document.getElementById('btnCopyAllBatch');
            const badgeCount = document.getElementById('batchCountBadge');

            currentBatchResults = [];
            resultsBox.innerHTML = '';

            let count = 0;
            lines.forEach((line) => {
                let name = line.trim();
                name = name.replace(/^\d+[\.\)\-\s]+/, '').trim();
                if (!name) return;

                count++;
                const encoded = encodeURIComponent(name);
                const fullLink = `${baseUrl}?to=${encoded}`;
                currentBatchResults.push({ name, link: fullLink });

                const row = document.createElement('div');
                row.className = "p-2 rounded-xl bg-sunk/60 border border-pink-200/80 space-y-1 text-xs text-left";
                
                row.innerHTML = `
                    <div class="flex items-center justify-between">
                        <b class="text-ink font-semibold">${count}. ${name}</b>
                        <span class="text-[9px] px-1.5 py-0.5 rounded bg-pink-100 text-pink-700 font-bold">Siap Kirim</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <input type="text" readonly value="${fullLink}" class="w-full text-[10.5px] font-mono text-ink2 bg-white px-2 py-1 rounded border border-ink/10 select-all">
                        <button type="button" onclick="navigator.clipboard.writeText('${fullLink}').then(() => showToast('Tautan untuk ${name} disalin!'))" class="px-2.5 py-1 rounded bg-brand/10 hover:bg-brand text-brand hover:text-white font-bold text-[10px] shrink-0 transition">
                            Salin
                        </button>
                        <button type="button" onclick="shareWaForName('${encodeURIComponent(name)}', '${fullLink}')" class="px-2.5 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[10px] shrink-0 transition">
                            WA
                        </button>
                    </div>
                `;
                resultsBox.appendChild(row);
            });

            if (count > 0) {
                resultsBox.classList.remove('hidden');
                btnCopyAll.classList.remove('hidden');
                badgeCount.innerText = `${count} Tamu Dihasilkan`;
                badgeCount.classList.remove('hidden');
                showToast(`Berhasil membuat ${count} tautan tamu!`);
            } else {
                resultsBox.classList.add('hidden');
                btnCopyAll.classList.add('hidden');
                badgeCount.classList.add('hidden');
                alert('Silakan ketik atau tempelkan minimal 1 nama tamu terlebih dahulu.');
            }
        }

        function shareWaForName(encodedName, link) {
            const name = decodeURIComponent(encodedName);
            const isReligious = /keagamaan|pengajian|tahlil|doa|walimah|safar/i.test(eventCategory);
            let message = "";

            if (isReligious) {
                message = `Kepada Yth. ${name},\n\n` +
                    `Assalamu'alaikum Warahmatullahi Wabarakatuh.\n\n` +
                    `Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara kami:\n\n` +
                    `*${coupleTitle}*\n` +
                    `🗓 Hari/Tanggal: ${eventDate}\n\n` +
                    `Untuk melihat susunan acara dan lokasi, silakan buka tautan undangan digital berikut:\n` +
                    `${link}\n\n` +
                    `Kehadiran serta doa restu Bapak/Ibu/Saudara/i merupakan suatu kehormatan dan kebahagiaan bagi kami.\n\n` +
                    `Wassalamu'alaikum Warahmatullahi Wabarakatuh.`;
            } else {
                message = `Kepada Yth. ${name},\n\n` +
                    `Tanpa mengurangi rasa hormat, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara kami:\n\n` +
                    `*${coupleTitle}*\n` +
                    `🗓 Hari/Tanggal: ${eventDate}\n\n` +
                    `Untuk melihat informasi lengkap acara dan konfirmasi kehadiran (RSVP), silakan buka tautan undangan digital kami berikut:\n` +
                    `${link}\n\n` +
                    `Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n` +
                    `Terima kasih!`;
            }

            const waShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;
            window.open(waShareUrl, '_blank');
        }

        function copyAllBatchLinks() {
            if (currentBatchResults.length === 0) return;
            const textList = currentBatchResults.map((item, idx) => `${idx + 1}. ${item.name}: ${item.link}`).join('\n');
            navigator.clipboard.writeText(textList).then(() => {
                showToast(`Seluruh ${currentBatchResults.length} tautan disalin!`);
            }).catch(() => {
                showToast("Daftar tautan disalin!");
            });
        }

        function showToast(msg = "Tautan undangan disalin ke clipboard!") {
            const toast = document.getElementById('toastNotification');
            const textSpan = toast.querySelector('span:last-child');
            if (textSpan) textSpan.innerText = msg;
            toast.classList.remove('toast-hide');
            toast.classList.add('toast-show');
            setTimeout(() => {
                toast.classList.remove('toast-show');
                toast.classList.add('toast-hide');
            }, 3000);
        }
    </script>
</body>
</html>
