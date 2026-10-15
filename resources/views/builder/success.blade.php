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
                <span class="text-[11px] font-bold uppercase tracking-wider text-ink3 block">Rencana Tautan Undangan Anda:</span>
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

            <div class="grid sm:grid-cols-2 gap-2.5">
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
        function copyMainLink() {
            const copyText = document.getElementById("mainInviteLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value).then(() => {
                showToast();
            }).catch(() => {
                showToast();
            });
        }

        function showToast() {
            const toast = document.getElementById('toastNotification');
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
