<!-- partials/rsvp.blade.php (Paket Harga #harga & Formulir Pemesanan #pesan) -->
<section id="harga" class="py-20 md:py-28 motif">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8">
        {{-- Pricing Header --}}
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="alis">Paket Undangan D'Karsa</span>
            <h2 class="ow-h2 mt-3">
                Harga <span class="t-script">bersahabat,</span> fitur dan desain <span class="t-bold">paling lengkap!</span>
            </h2>
            <p class="mt-3 text-ink2 text-base">
                Pilih paket sesuai kebutuhan acara Anda. Bisa pesan terima beres (dibuatkan tim D'Karsa) atau susun mandiri, aktif selamanya tanpa biaya bulanan.
            </p>
        </div>

        {{-- 4 Pricing Package Cards: Basic, Premium, Eksklusif, Kustom --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            {{-- 1. Paket Basic (Paling Murah / Desain Standar) --}}
            <article class="paket border border-ink/15 hover:border-brand/40 transition">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Basic</h3>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-extrabold uppercase tracking-wider">
                            Desain Standar
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Pilihan tema &amp; kategori undangan digital basic (desain biasa/simpel &amp; esensial).</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp50.000</span>
                        <span class="text-xs text-ink3 line-through">Rp110.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span><b>Pilihan Desain Standar:</b> Tampilan bersih, minimalis &amp; biasa saja (ringan &amp; cepat)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Bebas pilih semua kategori (Pernikahan, Khitan, Tahlil, Aqiqah, dll.)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Detail acara lengkap: tanggal, jam, hitung mundur &amp; rute Google Maps</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Konfirmasi kehadiran tamu (RSVP) &amp; simpan kalender HP</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri 2 foto &amp; musik latar autoplay</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Fitur lengkap Basic</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Desain layout esensial &amp; mudah dibaca tamu</li>
                            <li>✓ Kutipan ayat pembuka / kata mutiara doa</li>
                            <li>✓ Biodata tokoh / mempelai &amp; orang tua</li>
                            <li>✓ Tombol navigasi rute lokasi otomatis</li>
                            <li>✓ Masa aktif selamanya tanpa biaya bulanan</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('basic', 'Paket Basic - Rp50.000')"
                        class="tbl tbl--kedua w-full justify-center !mt-6 !h-11 !text-xs font-bold hover:!border-brand hover:!text-brand transition">
                    Pilih Desain Basic (Rp50.000)
                </button>
            </article>

            {{-- 2. Paket Premium (Menengah / Desain Modern) --}}
            <article class="paket border border-ink/15 hover:border-brand/40 transition">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Premium</h3>
                        <span class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-800 text-[10px] font-extrabold uppercase tracking-wider">
                            Desain Modern
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Pilihan desain modern &amp; elegan dengan amplop digital dan personalisasi tamu.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp110.000</span>
                        <span class="text-xs text-ink3 line-through">Rp250.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span><b>Pilihan Desain Modern &amp; Elegan:</b> Tata letak cantik dengan transisi halus</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Link undangan nama personal tiap tamu (hingga 100 tamu)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Amplop digital: transfer rekening bank &amp; scan QRIS</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Buku tamu: kirim ucapan doa restu secara online</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri sampai 10 foto &amp; cerita perjalanan (Love Story)</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Fitur lengkap Premium</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Basic</li>
                            <li>✓ Bebas pilih tema Basic &amp; Premium</li>
                            <li>✓ Upload audio lagu MP3 pilihan sendiri</li>
                            <li>✓ Fitur kirim kado fisik via kurir</li>
                            <li>✓ Import daftar nama tamu dari Excel</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('premium', 'Paket Premium - Rp110.000')"
                        class="tbl tbl--kedua w-full justify-center !mt-6 !h-11 !text-xs font-bold hover:!border-brand hover:!text-brand transition">
                    Pilih Desain Premium (Rp110.000)
                </button>
            </article>

            {{-- 3. Paket Eksklusif (Rekomendasi / Desain 3D & Mewah) --}}
            <article class="paket paket--saran">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Eksklusif</h3>
                        <span class="px-2.5 py-1 rounded-full bg-[#c81e3a] text-white text-[10px] font-extrabold uppercase tracking-wider">
                            Rekomendasi
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Desain mewah 3D &amp; adat istimewa, tamu tanpa batas, dan siaran langsung.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-brand">Rp180.000</span>
                        <span class="text-xs text-ink3 line-through">Rp400.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span><b>Pilihan Desain Mewah 3D &amp; Adat:</b> Ornamen royal nusantara &amp; visual eksklusif</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Link nama tamu <b>tanpa batas jumlah tamu</b></span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Undangan 2 bahasa (Indonesia &amp; Inggris)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Sematkan siaran langsung (Live Streaming YouTube/IG)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri 20 foto, video sinematik &amp; teaser prewedding</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Fitur lengkap Eksklusif</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Premium</li>
                            <li>✓ Bebas pilih seluruh koleksi tema katalog</li>
                            <li>✓ Layanan Terima Beres diprioritaskan</li>
                            <li>✓ Gratis gambar story pengumuman WA / Instagram</li>
                            <li>✓ Ganti gambar latar di tiap bagian undangan</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('eksklusif', 'Paket Eksklusif - Rp180.000')"
                        class="tbl tbl--utama w-full justify-between !pl-5 !mt-6 !h-11 !text-xs font-bold shadow-md shadow-brand/20">
                    <span>Pilih Desain Eksklusif (Rp180.000)</span>
                    <span class="tbl__ikon !w-7 !h-7">
                        <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
                    </span>
                </button>
            </article>

            {{-- 4. Paket Kustom (Paling Mahal / Request Desain Sesuai Keinginan Customer) --}}
            <article class="paket border-2 border-brand/40 bg-gradient-to-b from-white to-blush/60 hover:shadow-xl transition relative">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Kustom</h3>
                        <span class="px-2.5 py-1 rounded-full bg-gradient-to-r from-purple-600 to-brand text-white text-[10px] font-extrabold uppercase tracking-wider shadow-sm">
                            ★ Full Request
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Bisa request desain baru dari nol sesuai tema, konsep &amp; keinginan customer.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp280.000</span>
                        <span class="text-xs text-ink3 line-through">Rp800.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span><b>Request Desain Sesuai Keinginan:</b> Dibuatkan tema khusus dari nol!</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Bebas request warna, ornamen adat langka, animasi, atau referensi Pinterest</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Konsultasi &amp; diskusi 1-on-1 dengan desainer D'Karsa sampai cocok</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Sampul video sinematik + efek animasi visual unik</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Gratis aktivasi Custom Domain sendiri (contoh: <i>nama.com</i>)</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Semua keistimewaan Kustom</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Eksklusif (All-In Tanpa Batas)</li>
                            <li>✓ Revisi desain fleksibel sampai customer puas</li>
                            <li>✓ QR Code Check-in Tamu &amp; Denah Meja VIP</li>
                            <li>✓ Kamera Tamu Interaktif (Disposable Camera)</li>
                            <li>✓ Pendampingan teknis prioritas VIP</li>
                        </ul>
                    </details>
                </div>

                <div class="mt-6 flex flex-col gap-2">
                    <button type="button" onclick="selectPackageCustomRequest()"
                            class="tbl tbl--utama w-full justify-between !pl-5 !h-11 !text-xs font-bold shadow-md shadow-brand/20">
                        <span>✨ Request Desain Kustom</span>
                        <span class="tbl__ikon !w-7 !h-7">
                            <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
                        </span>
                    </button>
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20tertarik%20dengan%20Paket%20Kustom%20(Rp280.000).%20Saya%20ingin%20request%20desain%20undangan%20sesuai%20keinginan%20saya..."
                       target="_blank" rel="noopener" class="text-center text-[11px] font-bold text-accent hover:underline py-1">
                        💬 Tanya / Konsultasi Konsep via WhatsApp →
                    </a>
                </div>
            </article>
        </div>

        {{-- SELF-SERVICE BUILDER SPOTLIGHT & REVIEWS (#pesan) --}}
        <div id="pesan" class="mt-24 pt-16 border-t border-ink/10">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="alis">
                    <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                    Self-Service Builder &amp; Ulasan Klien
                </span>
                <h2 class="ow-h2 mt-3">
                    Rancang &amp; buat <span class="t-script">undangan impianmu</span> <span class="t-bold">secara mandiri</span>
                </h2>
                <p class="mt-3 text-ink2 text-base">
                    Gunakan builder mandiri D'Karsa untuk membuat undangan digital cantik Anda hanya dalam hitungan menit, atau simak ulasan hangat dan pengalaman dari mereka yang telah merayakannya bersama kami.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                {{-- Self-Service Invitation Creator Showcase Card --}}
                <div class="lg:col-span-7 sel sel--merah !p-7 md:!p-9">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="poin__ikon">
                            <svg aria-hidden="true" class="w-5 h-5"><use href="#i-check-circle"></use></svg>
                        </span>
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-wider text-accent">Self-Service Builder</span>
                            <h3 class="font-serif text-2xl md:text-3xl font-semibold text-ink">Buat Undangan Sendiri di D'Karsa</h3>
                        </div>
                    </div>

                    <p class="text-sm md:text-base text-ink2 leading-relaxed mb-6">
                        Kini Anda tidak perlu lagi antre menunggu admin mengetik data Anda. Cukup gunakan <b>D'Karsa Self-Service Maker</b> untuk menyusun dan menyesuaikan isi undangan digital Anda secara mandiri dalam 6 langkah praktis.
                    </p>

                    {{-- 4 Core Steps Flow --}}
                    <div class="grid sm:grid-cols-2 gap-3.5 mb-6">
                        <div class="bg-white/90 border border-brand/15 rounded-2xl p-4 shadow-sm hover:border-brand/40 transition">
                            <div class="flex items-center gap-2.5 mb-1.5">
                                <span class="w-6 h-6 rounded-full bg-brand text-white flex items-center justify-center text-xs font-bold shrink-0">1</span>
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-ink">Pilih Kategori Acara</h4>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Pernikahan, Khitanan, Aqiqah, Halal Bihalal, Ulang Tahun, Syukuran, hingga Tahlilan/Haul.
                            </p>
                        </div>

                        <div class="bg-white/90 border border-brand/15 rounded-2xl p-4 shadow-sm hover:border-brand/40 transition">
                            <div class="flex items-center gap-2.5 mb-1.5">
                                <span class="w-6 h-6 rounded-full bg-brand text-white flex items-center justify-center text-xs font-bold shrink-0">2</span>
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-ink">Data Mempelai / Tokoh</h4>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Nama panggilan, nama lengkap, gelar, biodata orang tua &amp; upload foto profil responsif.
                            </p>
                        </div>

                        <div class="bg-white/90 border border-brand/15 rounded-2xl p-4 shadow-sm hover:border-brand/40 transition">
                            <div class="flex items-center gap-2.5 mb-1.5">
                                <span class="w-6 h-6 rounded-full bg-brand text-white flex items-center justify-center text-xs font-bold shrink-0">3</span>
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-ink">Jadwal &amp; Google Maps</h4>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Tanggal &amp; jam acara, hitung mundur (countdown), serta navigasi peta rute otomatis.
                            </p>
                        </div>

                        <div class="bg-white/90 border border-brand/15 rounded-2xl p-4 shadow-sm hover:border-brand/40 transition">
                            <div class="flex items-center gap-2.5 mb-1.5">
                                <span class="w-6 h-6 rounded-full bg-brand text-white flex items-center justify-center text-xs font-bold shrink-0">4</span>
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-ink">Amplop Digital &amp; Musik</h4>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Rekening bank/e-wallet untuk kado digital, lagu latar autoplay, dan buku tamu online.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Highlights Badges --}}
                    <div class="flex flex-wrap items-center gap-2 mb-7 pt-1">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-[11px] font-bold text-accent border border-brand/20 shadow-2xs">
                            <svg aria-hidden="true" class="w-3.5 h-3.5 text-brand"><use href="#i-check"></use></svg>
                            Selesai 5-10 Menit
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-[11px] font-bold text-accent border border-brand/20 shadow-2xs">
                            <svg aria-hidden="true" class="w-3.5 h-3.5 text-brand"><use href="#i-check"></use></svg>
                            Live Preview Mobile
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-[11px] font-bold text-accent border border-brand/20 shadow-2xs">
                            <svg aria-hidden="true" class="w-3.5 h-3.5 text-brand"><use href="#i-check"></use></svg>
                            Verifikasi ACC Admin
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-[11px] font-bold text-accent border border-brand/20 shadow-2xs">
                            <svg aria-hidden="true" class="w-3.5 h-3.5 text-brand"><use href="#i-check"></use></svg>
                            Sebar Tamu Tanpa Batas
                        </span>
                    </div>

                    {{-- Action CTA Buttons --}}
                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('invitation.create') }}" class="tbl tbl--utama flex-1 justify-between !pl-6 !py-3.5 shadow-md shadow-brand/25">
                            <span class="font-bold">✨ Mulai Buat Undangan Sekarang</span>
                            <span class="tbl__ikon !w-9 !h-9">
                                <svg aria-hidden="true" class="w-4 h-4"><use href="#i-arrow-up-right"></use></svg>
                            </span>
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20tanya%20seputar%20pembuatan%20undangan%20digital"
                           target="_blank" rel="noopener" class="tbl tbl--kedua justify-center gap-2 !px-5 !py-3.5">
                            <svg aria-hidden="true" class="w-4 h-4 text-[#25d366]"><use href="#i-whatsapp-logo"></use></svg>
                            <span>Tanya CS via WA</span>
                        </a>
                    </div>
                </div>

                {{-- Customer Reviews / Testimonials Feed --}}
                <div class="lg:col-span-5">
                    @include('partials.wishes')
                </div>
            </div>
        </div>
    </div>
</section>