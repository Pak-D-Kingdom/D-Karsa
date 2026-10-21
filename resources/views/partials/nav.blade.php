<!-- partials/nav.blade.php -->
<header id="nav" aria-label="Navigasi utama" class="fixed z-40 top-3 left-1/2 -translate-x-1/2 w-[calc(100%-28px)] max-w-[1160px] h-16 flex items-center justify-between gap-3 px-4 sm:px-6 rounded-full bg-white/90 backdrop-blur-md border border-pink-100 shadow-lg shadow-pink-900/5 transition-all">
    <a href="#top" class="inline-flex items-center gap-3 group">
        <img src="{{ asset('images/logo.png') }}" alt="Logo D'Karsa" class="w-9 h-9 rounded-full object-cover shadow border border-amber-300 group-hover:scale-105 transition">
        <div>
            <span class="font-serif font-extrabold text-base text-ink group-hover:text-brand transition leading-none block">D'Karsa</span>
            <span class="text-[9.5px] uppercase font-bold tracking-widest text-ink3 block">Digital Invitation</span>
        </div>
    </a>

    <nav aria-label="Menu" class="hidden lg:flex items-center gap-1.5">
        <a href="#top" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Beranda</a>
        <a href="#desain" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Katalog Desain</a>
        <a href="#fitur" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Fitur &amp; Studio</a>
        <a href="#buku-tamu" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Buku Tamu</a>
        <span aria-hidden="true" class="w-px h-4 mx-1 bg-ink/15"></span>
        <a href="#portofolio" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Portofolio</a>
        <a href="#harga" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">Harga Paket</a>
        <a href="#faq" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-pink-50 transition">FAQ</a>
    </nav>

    <div class="flex items-center gap-2">
        <a href="{{ route('invitation.create') }}" class="px-5 py-2.5 rounded-full text-xs font-extrabold text-white bg-gradient-to-r from-brand via-accent to-pink-600 hover:opacity-95 shadow-md shadow-pink-500/25 transition flex items-center gap-1.5">
            <span>✨ Buat Undangan</span>
            <span class="text-sm">→</span>
        </a>
    </div>
</header>