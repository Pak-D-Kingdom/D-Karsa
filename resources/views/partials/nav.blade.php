<!-- partials/nav.blade.php -->
<header id="nav-wrapper" class="w-full h-16 sm:h-20 relative">
    <div id="nav" aria-label="Navigasi utama" class="fixed top-0 left-0 right-0 z-50 w-full bg-white/95 backdrop-blur-xl border-b border-orange-100 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-3 sm:gap-4">
            {{-- Logo Brand --}}
            <a href="#top" class="inline-flex items-center gap-2 sm:gap-3 group shrink-0 min-w-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo D'Karsa" class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl sm:rounded-2xl object-cover shadow-sm border border-orange-200 group-hover:scale-105 transition duration-300 shrink-0">
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <span class="font-serif font-black text-lg sm:text-xl text-ink group-hover:text-orange-600 transition tracking-tight">D'Karsa</span>
                        <span class="hidden sm:inline-block text-[9px] font-extrabold uppercase tracking-widest text-orange-700 bg-orange-100/90 px-2 py-0.5 rounded-full">Suite</span>
                    </div>
                    <span class="text-[9px] sm:text-[10px] uppercase font-bold tracking-wider sm:tracking-widest text-ink3 block truncate">Digital Platform</span>
                </div>
            </a>

            {{-- Desktop Menu Links --}}
            <nav aria-label="Menu Navigasi" class="hidden lg:flex items-center gap-1">
                <a href="#top" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Beranda</a>
                <a href="#desain" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Katalog Desain</a>
                <a href="#fitur" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Fitur Pintar</a>
                <a href="#cara-kerja" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Cara Kerja</a>
                <a href="#portofolio" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Portofolio</a>
                <a href="#harga" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">Paket Harga</a>
                <a href="#faq" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 transition">FAQ</a>
            </nav>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20tanya%20seputar%20undangan%20digital"
                   target="_blank" rel="noopener"
                   class="hidden sm:inline-flex px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-orange-600 hover:bg-orange-50/70 border border-ink/10 transition items-center gap-1.5">
                    <svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-500"><use href="#i-whatsapp-logo"></use></svg>
                    <span>Tanya CS</span>
                </a>
                <a href="{{ route('invitation.create') }}" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl text-xs sm:text-sm font-extrabold text-white bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 shadow-md shadow-orange-500/25 hover:shadow-lg hover:shadow-orange-500/35 hover:-translate-y-0.5 active:translate-y-0 transition flex items-center gap-1.5 sm:gap-2 whitespace-nowrap">
                    <span>✨ Buat Undangan</span>
                    <span class="text-sm font-bold">→</span>
                </a>
            </div>
        </div>
    </div>
</header>

<style>
    #nav {
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform;
    }
    #nav.-translate-y-full {
        transform: translateY(-100%);
    }
</style>

<script>
    (() => {
        const nav = document.getElementById('nav');
        if (!nav) return;

        let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;
        let ticking = false;

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
                    const delta = currentScrollY - lastScrollY;

                    if (currentScrollY <= 40) {
                        // Di area paling atas: selalu tampilkan navbar di posisi normal
                        nav.classList.remove('-translate-y-full');
                    } else if (delta > 6 && currentScrollY > 80) {
                        // Scroll ke bawah: navbar sembunyi (slide up) mengikuti arah scroll
                        nav.classList.add('-translate-y-full');
                    } else if (delta < -6) {
                        // Scroll ke atas: navbar muncul kembali (slide down) mengikuti arah scroll
                        nav.classList.remove('-translate-y-full');
                    }

                    lastScrollY = Math.max(0, currentScrollY);
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    })();
</script>
