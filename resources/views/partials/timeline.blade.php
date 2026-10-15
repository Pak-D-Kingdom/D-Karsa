<!-- partials/timeline.blade.php (Fitur Unggulan, D'Karsa Studio & Buku Tamu Digital) -->
<section id="fitur" class="py-20 md:py-28 motif motif--kiri">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8">
        {{-- Header: D'Karsa Studio & Layanan Terima Beres --}}
        <div class="max-w-2xl mb-12">
            <span class="alis">D'Karsa Studio &amp; Layanan Terima Beres</span>
            <h2 class="ow-h2 mt-3">
                Bebas <span class="t-script">berkreasi sendiri,</span> atau <span class="t-bold">terima beres</span>
            </h2>
            <p class="mt-3 text-ink2 text-base leading-relaxed">
                Fleksibel sepenuhnya. Anda bisa menyunting sendiri undangan kapan pun dari HP/laptop, atau serahkan seluruh pembuatan kepada tim desainer D'Karsa sampai siap disebarkan.
            </p>
        </div>

        {{-- 2 Main Service Mode Cards --}}
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Mode 01: Self-Service Studio --}}
            <article class="sel sel--motif flex flex-col justify-between p-7 md:p-8">
                <div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-serif text-3xl font-semibold text-brand leading-none">01</span>
                        <span class="text-[11px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full bg-accent-soft text-accent">D'Karsa Studio</span>
                    </div>
                    <h3 class="font-serif text-3xl font-semibold text-ink mt-4">Kustom Mandiri Ala Canva</h3>
                    <p class="text-sm text-ink2 mt-1">Atur sendiri tata letak, foto, musik latar, dan kalimat undangan</p>

                    <div class="mt-5 pt-5 border-t border-ink/10 space-y-3 text-sm text-ink2">
                        <div class="flex items-start gap-3">
                            <span class="poin__ikon !w-9 !h-9">✨</span>
                            <div>
                                <b class="block text-ink">Drag &amp; Drop Elemen Siap Pakai</b>
                                <span class="text-xs text-ink3">RSVP, amplop digital, hitung mundur, cerita cinta, dan galeri tinggal pasang.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="poin__ikon !w-9 !h-9">🔄</span>
                            <div>
                                <b class="block text-ink">Edit Tanpa Batas Kapan Saja</b>
                                <span class="text-xs text-ink3">Ubah jadwal, lokasi, atau foto bahkan setelah undangan aktif.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('invitation.create') }}" class="tbl tbl--kedua !h-11 !text-sm">
                        <span>Mulai Buat Sendiri</span>
                        <span class="tbl__ikon !w-8 !h-8">
                            <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
                        </span>
                    </a>
                </div>
            </article>

            {{-- Mode 02: Terima Beres by D'Karsa Team (Highlighted) --}}
            <article class="sel sel--merah flex flex-col justify-between p-7 md:p-8" style="box-shadow: 0 0 0 2px var(--brand), var(--shadow);">
                <div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-serif text-3xl font-semibold text-brand leading-none">02</span>
                        <span class="text-[11px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full bg-[#c81e3a] text-white">Paling Diminati</span>
                    </div>
                    <h3 class="font-serif text-3xl font-semibold text-ink mt-4">Layanan Terima Beres</h3>
                    <p class="text-sm text-ink2 mt-1">Cocok untuk pasangan sibuk — kirim data via WhatsApp, langsung jadi!</p>

                    <div class="mt-5 pt-5 border-t border-ink/10 space-y-3 text-sm text-ink2">
                        <div class="flex items-start gap-3">
                            <span class="poin__ikon !w-9 !h-9">⚡</span>
                            <div>
                                <b class="block text-ink">Pengerjaan Ekspres Hitungan Jam</b>
                                <span class="text-xs text-ink3">Tim D'Karsa merapikan foto, memasukkan lokasi Maps, &amp; menyusun acara.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="poin__ikon !w-9 !h-9">
                                <svg aria-hidden="true" class="w-4 h-4"><use href="#i-check-circle"></use></svg>
                            </span>
                            <div>
                                <b class="block text-ink">Gratis Revisi &amp; Panduan Sebar Tamu</b>
                                <span class="text-xs text-ink3">Didampingi tim support sampai hari H acara pernikahan selesai.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('invitation.create') }}" class="tbl tbl--utama !h-11 !text-sm">
                        <span>Pesan Undangan Sekarang</span>
                        <span class="tbl__ikon !w-8 !h-8">
                            <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
                        </span>
                    </a>
                </div>
            </article>
        </div>

        {{-- Sebar ke Tamu Tanpa Batas (Split Block like #tamu on our-wedding.link) --}}
        <div class="mt-16 grid lg:grid-cols-12 gap-8 items-center sel sel--merah !p-7 md:!p-11">
            <div class="lg:col-span-7 space-y-4">
                <span class="alis">Manajemen Tamu Undangan</span>
                <h3 class="ow-h2">
                    Sebar ke tamu <span class="t-script">tanpa batas</span> lewat WhatsApp
                </h3>
                <p class="text-ink2 text-sm md:text-base leading-relaxed">
                    Bagikan undangan ke tamu sebanyak apa pun lewat WhatsApp, link personal, atau QR Code. Nama setiap tamu tampil otomatis di sampul undangan secara eksklusif.
                </p>
                <div class="grid sm:grid-cols-2 gap-4 pt-2">
                    <div class="bg-white/90 rounded-2xl p-4 border border-ink/10">
                        <b class="text-sm font-bold text-ink block">✓ Link Nama Tamu Otomatis</b>
                        <span class="text-xs text-ink2 mt-1 block">Contoh: <code>d-karsa.id/laras-bima?to=Bpk+Hartono</code></span>
                    </div>
                    <div class="bg-white/90 rounded-2xl p-4 border border-ink/10">
                        <b class="text-sm font-bold text-ink block">✓ Import Tamu dari Excel</b>
                        <span class="text-xs text-ink2 mt-1 block">Unggah ratusan nama tamu sekaligus &amp; kirim pesan WA otomatis.</span>
                    </div>
                </div>
            </div>

            {{-- WhatsApp Chat Preview Card (.kp-wa from our-wedding.link) --}}
            <div class="lg:col-span-5">
                <div class="bg-white rounded-3xl p-6 shadow-xl border border-ink/10 relative">
                    <div class="flex items-center justify-between border-b border-ink/10 pb-3 mb-4">
                        <div class="flex items-center gap-2.5">
                            <span class="w-9 h-9 rounded-full bg-[#25d366]/15 text-[#128c7e] grid place-items-center font-bold text-sm">WA</span>
                            <div>
                                <b class="text-xs font-extrabold uppercase tracking-wider text-[#128c7e] block">Preview Pesan WhatsApp</b>
                                <span class="text-xs text-ink3">Otomatis menyertakan nama tamu</span>
                            </div>
                        </div>
                        <span class="text-[11px] font-semibold text-ink3">09.12 ✓✓</span>
                    </div>
                    <p class="text-xs md:text-sm text-ink2 leading-relaxed">
                        Kepada Yth. <b class="text-ink">Bpk. Hartono &amp; Keluarga</b>,<br>
                        Tanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu untuk hadir di acara pernikahan kami:
                    </p>
                    <div class="mt-3 p-3 rounded-2xl bg-blush border border-brand/20">
                        <span class="text-xs font-extrabold text-accent block">d-karsa.id/laras-bima?to=Bpk-Hartono</span>
                        <span class="text-[11px] text-ink3">Undangan Digital Resmi • Klik untuk membuka</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- 6-Card Bento Grid (.bento from our-wedding.link) --}}
        <div class="grid md:grid-cols-3 gap-4 mt-8">
            <div class="sel sel--merah flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">
                    <svg aria-hidden="true" class="w-5 h-5"><use href="#i-check-circle"></use></svg>
                </span>
                <div>
                    <h4 class="font-bold text-sm text-ink">Aktif Selamanya</h4>
                    <p class="text-xs text-ink2 mt-0.5">Tidak ada batas waktu aktif. Kenangan undangan digital bisa dibuka kapan pun.</p>
                </div>
            </div>
            <div class="sel sel--motif flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">
                    <svg aria-hidden="true" class="w-5 h-5"><use href="#i-gift"></use></svg>
                </span>
                <div>
                    <h4 class="font-bold text-sm text-ink">Amplop Digital &amp; QRIS</h4>
                    <p class="text-xs text-ink2 mt-0.5">Tamu bisa kirim tanda kasih langsung ke rekening BCA, Mandiri, atau e-Wallet kalian.</p>
                </div>
            </div>
            <div class="sel flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">⏰</span>
                <div>
                    <h4 class="font-bold text-sm text-ink">Zona Waktu Otomatis</h4>
                    <p class="text-xs text-ink2 mt-0.5">Mendukung tampilan waktu akurat untuk seluruh tamu.</p>
                    <div class="flex items-center gap-1.5 mt-1.5">
                        <span class="font-serif text-xs px-2.5 py-0.5 rounded-full bg-ink text-white">WIB</span>
                        <span class="font-serif text-xs px-2.5 py-0.5 rounded-full border border-ink/20 text-ink2">WITA</span>
                        <span class="font-serif text-xs px-2.5 py-0.5 rounded-full border border-ink/20 text-ink2">WIT</span>
                    </div>
                </div>
            </div>
            <div class="sel flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">
                    <svg aria-hidden="true" class="w-5 h-5"><use href="#i-map-pin"></use></svg>
                </span>
                <div>
                    <h4 class="font-bold text-sm text-ink">Navigasi Google Maps</h4>
                    <p class="text-xs text-ink2 mt-0.5">Tombol lokasi langsung membuka petunjuk arah akurat ke gedung acara.</p>
                </div>
            </div>
            <div class="sel sel--motif flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">
                    <svg aria-hidden="true" class="w-5 h-5"><use href="#i-music-notes"></use></svg>
                </span>
                <div>
                    <h4 class="font-bold text-sm text-ink">Musik Latar &amp; Lagu Kustom</h4>
                    <p class="text-xs text-ink2 mt-0.5">Pilih dari daftar lagu romantis atau unggah lagu favorit kalian sendiri (.mp3).</p>
                </div>
            </div>
            <div class="sel sel--merah flex items-start gap-3.5 !p-5">
                <span class="poin__ikon">
                    <svg aria-hidden="true" class="w-5 h-5"><use href="#i-chats-circle"></use></svg>
                </span>
                <div>
                    <h4 class="font-bold text-sm text-ink">RSVP &amp; Doa Real-Time</h4>
                    <p class="text-xs text-ink2 mt-0.5">Pantau jumlah tamu yang hadir dan baca doa restu langsung dari dasbor.</p>
                </div>
            </div>
        </div>

        {{-- Buku Tamu Digital Section (#buku-tamu from our-wedding.link) --}}
        <div id="buku-tamu" class="mt-20 pt-16 border-t border-ink/10">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="alis">Buku Tamu Digital QR Code</span>
                <h2 class="ow-h2 mt-3">
                    Hari H <span class="t-script">tanpa antre,</span> semua <span class="t-bold">tercatat otomatis</span>
                </h2>
                <p class="mt-3 text-ink2 text-base">
                    Aplikasi penerima tamu, layar sapa di gedung, struk souvenir, hingga laporan kehadiran Excel yang tersambung langsung dengan undangan D'Karsa.
                </p>
            </div>

            <ol class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4 list-none m-0 p-0">
                <li class="sel !p-5">
                    <span class="font-serif text-2xl font-bold text-brand">01</span>
                    <b class="block text-sm font-bold text-ink mt-2">Tamu Tiba Membawa QR</b>
                    <span class="text-xs text-ink2 mt-1 block">QR Code otomatis tersedia di dalam undangan tiap tamu.</span>
                </li>
                <li class="sel sel--motif !p-5">
                    <span class="font-serif text-2xl font-bold text-brand">02</span>
                    <b class="block text-sm font-bold text-ink mt-2">Kru Memindai QR</b>
                    <span class="text-xs text-ink2 mt-1 block">Scan cepat kurang dari 2 detik lewat HP/tablet penerima tamu.</span>
                </li>
                <li class="sel sel--merah !p-5">
                    <span class="font-serif text-2xl font-bold text-brand">03</span>
                    <b class="block text-sm font-bold text-ink mt-2">Tampil di Layar Sapa</b>
                    <span class="text-xs text-ink2 mt-1 block">Nama tamu muncul elegan di monitor pintu masuk venue.</span>
                </li>
                <li class="sel !p-5">
                    <span class="font-serif text-2xl font-bold text-brand">04</span>
                    <b class="block text-sm font-bold text-ink mt-2">Souvenir &amp; Meja VIP</b>
                    <span class="text-xs text-ink2 mt-1 block">Nomor meja dan penukaran souvenir langsung tercatat rapi.</span>
                </li>
                <li class="sel sel--motif !p-5">
                    <span class="font-serif text-2xl font-bold text-brand">05</span>
                    <b class="block text-sm font-bold text-ink mt-2">Rekap Laporan Excel</b>
                    <span class="text-xs text-ink2 mt-1 block">Unduh daftar seluruh tamu hadir &amp; nominal amplop selesai acara.</span>
                </li>
            </ol>
        </div>
    </div>
</section>