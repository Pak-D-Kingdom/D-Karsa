<!-- partials/footer.blade.php -->
<footer class="bg-stone-900 text-white border-t border-stone-800 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="md:col-span-1 space-y-4">
                <a href="#top" class="inline-flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo D'Karsa" class="w-10 h-10 rounded-2xl object-cover shadow border border-orange-400 group-hover:scale-105 transition">
                    <div>
                        <span class="font-serif font-black text-xl text-white group-hover:text-orange-400 transition tracking-tight">D'Karsa</span>
                        <span class="text-[9.5px] uppercase font-bold tracking-widest text-stone-400 block">Digital Platform</span>
                    </div>
                </a>
                <p class="text-xs text-stone-400 leading-relaxed">
                    Platform ekosistem undangan digital multi-acara modern di Indonesia: Pernikahan, Aqiqah, Khitanan, Ulang Tahun, Wisuda, dan Syukuran. Dilengkapi manajemen tamu dan buku tamu ucapan online.
                </p>
                <div class="pt-1">
                    <span class="inline-block px-3 py-1 rounded-lg bg-white/10 text-orange-400 text-[11px] font-bold">
                        ✦ PT D'Karsa Digital Indonesia
                    </span>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-orange-400 mb-4">Katalog &amp; Fitur</h4>
                <ul class="space-y-2.5 text-xs text-stone-300">
                    <li><a href="#desain" class="hover:text-white transition">Katalog Desain Undangan</a></li>
                    <li><a href="#fitur" class="hover:text-white transition">Fitur Pintar D'Karsa</a></li>
                    <li><a href="#cara-kerja" class="hover:text-white transition">Pilihan Cara Kerja</a></li>
                    <li><a href="#harga" class="hover:text-white transition">Daftar Paket Harga</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-orange-400 mb-4">Pemesanan &amp; Support</h4>
                <ul class="space-y-2.5 text-xs text-stone-300">
                    <li><a href="{{ route('invitation.create') }}" class="hover:text-white transition">Buat Undangan Mandiri</a></li>
                    <li><a href="#portofolio" class="hover:text-white transition">Portofolio &amp; Ulasan</a></li>
                    <li><a href="#faq" class="hover:text-white transition">Pertanyaan Umum (FAQ)</a></li>
                    <li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="hover:text-white transition flex items-center gap-1.5">
                        <svg aria-hidden="true" class="w-3.5 h-3.5 text-emerald-400"><use href="#i-whatsapp-logo"></use></svg>
                        <span>Chat Support WhatsApp</span>
                    </a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-orange-400 mb-4">Lainnya</h4>
                <ul class="space-y-2.5 text-xs text-stone-300">
                    <li><a href="#wishes" class="hover:text-white transition">Kirim Testimoni Klien</a></li>
                    <li><a href="/admin" class="hover:text-white transition">Panel Dashboard Admin</a></li>
                </ul>
                <div class="mt-6 p-3.5 rounded-xl bg-white/5 border border-white/10 text-xs text-stone-400">
                    <b class="text-white block mb-0.5">Metode Pembayaran:</b>
                    <span>QRIS, BCA, Mandiri, BNI, BRI, Virtual Account &amp; E-Wallet</span>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-stone-800 flex flex-wrap items-center justify-between gap-4 text-xs text-stone-400">
            <span>© {{ date('Y') }} PT D'Karsa Digital Indonesia • Platform Undangan Digital Multi-Acara</span>
            <span>Rancang, Undang, Kelola &amp; Sambut dalam Satu Tempat</span>
        </div>
    </div>
</footer>