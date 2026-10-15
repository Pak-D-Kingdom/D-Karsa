<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Menunggu Persetujuan Admin | D'Karsa</title>
    
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-amber-200 text-center space-y-6 my-auto">
        
        {{-- Pending Icon --}}
        <div class="w-20 h-20 rounded-full bg-amber-100 text-amber-600 mx-auto grid place-items-center text-4xl shadow-inner animate-pulse">
            ⏳
        </div>

        <div>
            <span class="inline-block px-3.5 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider mb-2">
                Menunggu ACC Admin
            </span>
            <h1 class="font-serif text-2xl sm:text-3xl font-bold text-ink leading-tight">
                Undangan Belum Aktif
            </h1>
            <p class="text-xs sm:text-sm text-ink2 mt-2 leading-relaxed">
                Undangan untuk 
                <b>
                    @if($couple->category === 'Pernikahan')
                        {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                    @else
                        {{ $couple->groom_fullname ?: $couple->groom_name }}
                    @endif
                </b> 
                sedang dalam proses peninjauan dan aktivasi oleh <b>Admin D'Karsa</b>.
            </p>
        </div>

        {{-- Notice Card --}}
        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/80 text-left space-y-2">
            <b class="text-xs font-bold text-amber-900 flex items-center gap-1.5">
                <span>ℹ️</span> Informasi untuk Pemilik Undangan:
            </b>
            <p class="text-[11.5px] text-amber-800 leading-relaxed">
                Tautan undangan digital Anda akan segera dapat diakses publik setelah disetujui (ACC) oleh admin. Admin akan menghubungi Anda melalui WhatsApp jika aktivasi telah selesai.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="space-y-2.5 pt-2">
            @php
                $waText = "Halo Admin D'Karsa, saya ingin menanyakan status aktivasi undangan digital saya:\n\n*Nama:* " . ($couple->customer_name ?: $couple->groom_name) . "\n*Kode/Slug:* {$couple->slug}\n\nMohon bantuannya untuk diperiksa dan di-ACC ya. Terima kasih!";
                $waAdminUrl = "https://wa.me/6281234567890?text=" . urlencode($waText);
            @endphp

            <a href="{{ $waAdminUrl }}" target="_blank"
               class="w-full py-3.5 px-5 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-2 shadow-lg">
                <span>💬</span> Hubungi Admin via WhatsApp
            </a>

            <a href="{{ route('invitation.index') }}"
               class="w-full py-3 px-5 rounded-2xl bg-white border border-ink/15 text-ink2 hover:bg-sunk font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-1.5">
                <span>←</span> Kembali ke Beranda
            </a>
        </div>

        <div class="pt-3 border-t border-ink/10 text-[11px] text-ink3">
            &copy; {{ date('Y') }} D'Karsa Digital Invitation Platform
        </div>

    </div>

</body>
</html>
