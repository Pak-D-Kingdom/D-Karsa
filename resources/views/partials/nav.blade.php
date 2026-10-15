<!-- partials/nav.blade.php -->
<header id="nav" aria-label="Navigasi utama" class="lp-nav">
    <a href="#top" class="inline-flex items-center gap-2.5 font-extrabold tracking-tight text-[15px] text-ink">
        <span class="w-8 h-8 rounded-full bg-accent-soft text-accent grid place-items-center font-serif italic text-sm font-bold border border-brand/20">
            DK
        </span>
        <span>D'Karsa</span>
    </a>

    <nav aria-label="Menu" class="hidden lg:flex items-center gap-1">
        <a href="#top" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Beranda</a>
        <a href="#desain" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Katalog Desain</a>
        <a href="#fitur" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Fitur &amp; Studio</a>
        <a href="#buku-tamu" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Buku Tamu</a>
        <span aria-hidden="true" class="w-[1px] h-4 mx-1.5 bg-ink/15"></span>
        <a href="#portofolio" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Portofolio</a>
        <a href="#harga" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">Harga Paket</a>
        <a href="#faq" class="px-3.5 py-2 rounded-full text-[13.5px] font-semibold text-ink2 hover:text-ink hover:bg-blush transition">FAQ</a>
    </nav>

    <div class="flex items-center gap-2">
        <a href="#harga" class="hidden sm:inline-flex px-3.5 py-2 rounded-full text-[13.5px] font-bold text-ink2 hover:text-ink transition">
            Daftar Harga
        </a>
        <a href="{{ route('invitation.create') }}" class="tbl tbl--utama !h-10 !pl-4 !pr-1.5 !text-[13.5px]">
            <span>✨ Buat Undangan</span>
            <span class="tbl__ikon !w-7 !h-7">
                <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
            </span>
        </a>
    </div>
</header>