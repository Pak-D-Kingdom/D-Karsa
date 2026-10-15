<!-- partials/footer.blade.php -->
<footer class="bg-sunk border-t border-ink/10 pt-14 pb-10">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-1">
                <a href="#top" class="inline-flex items-center gap-2.5 font-extrabold text-base text-ink">
                    <span class="w-8 h-8 rounded-full bg-accent-soft text-accent grid place-items-center font-serif italic text-sm font-bold border border-brand/20">
                        DK
                    </span>
                    <span>D'Karsa</span>
                </a>
                <p class="text-xs text-ink3 mt-3 max-w-xs leading-relaxed">
                    Platform &amp; jasa pembuatan undangan pernikahan digital modern, buku tamu QR Code, serta ekosistem pernikahan digital dari PT D'Karsa Digital Indonesia.
                </p>
            </div>

            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-ink3 mb-3">Produk &amp; Layanan</h2>
                <ul class="space-y-2 text-sm font-medium text-ink2">
                    <li><a href="#desain" class="hover:text-ink">Katalog Desain Undangan</a></li>
                    <li><a href="#fitur" class="hover:text-ink">D'Karsa Studio &amp; Terima Beres</a></li>
                    <li><a href="#buku-tamu" class="hover:text-ink">Buku Tamu Digital QR</a></li>
                    <li><a href="#harga" class="hover:text-ink">Daftar Paket Harga</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-ink3 mb-3">Pemesanan &amp; Bantuan</h2>
                <ul class="space-y-2 text-sm font-medium text-ink2">
                    <li><a href="{{ route('invitation.create') }}" class="hover:text-ink">Buat Undangan Sendiri</a></li>
                    <li><a href="#portofolio" class="hover:text-ink">Portofolio &amp; Testimoni</a></li>
                    <li><a href="#faq" class="hover:text-ink">Pertanyaan Umum (FAQ)</a></li>
                    <li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="hover:text-ink">Chat Support WhatsApp</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-ink3 mb-3">Lainnya</h2>
                <ul class="space-y-2 text-sm font-medium text-ink2">
                    <li><a href="#wishes" class="hover:text-ink">Kirim Ulasan Klien</a></li>
                    <li><a href="/admin" class="hover:text-ink">Panel Admin D'Karsa</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-ink/10 flex flex-wrap items-center justify-between gap-4 text-xs text-ink3">
            <span>© {{ date('Y') }} PT D'Karsa Digital Indonesia • Platform Undangan Pernikahan Digital</span>
            <span>Rancang, Undang, Kelola &amp; Sambut dalam Satu Tempat ♥</span>
        </div>
    </div>
</footer>