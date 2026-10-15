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

        {{-- 4 Pricing Package Cards (.harga & .paket from our-wedding.link) --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            {{-- 1. Paket Basic --}}
            <article class="paket">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Basic</h3>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Undangan inti untuk mengabarkan acara.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp50.000</span>
                        <span class="text-xs text-ink3 line-through">Rp110.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Detail acara: tanggal, jam, dan lokasi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Konfirmasi kehadiran tamu (RSVP)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Tamu bisa simpan tanggal ke kalender HP</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri sampai 2 foto &amp; musik latar</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Semua fitur Basic</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Pilihan desain standar</li>
                            <li>✓ Kutipan atau ayat pembuka</li>
                            <li>✓ Profil mempelai &amp; nama orang tua</li>
                            <li>✓ Tombol petunjuk arah Google Maps</li>
                            <li>✓ Jadwal acara tanpa batas (akad, resepsi)</li>
                            <li>✓ Masa aktif undangan selamanya</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="selectPackageAndOrder('Paket Basic - Rp50.000')"
                        class="tbl tbl--kedua w-full justify-center !mt-6 !h-11 !text-xs">
                    Pilih Paket Basic
                </button>
            </article>

            {{-- 2. Paket Premium --}}
            <article class="paket">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Premium</h3>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Ucapan, amplop digital, dan link nama tamu.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp110.000</span>
                        <span class="text-xs text-ink3 line-through">Rp250.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Link undangan nama tamu (sampai 100 tamu)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Amplop digital transfer rekening &amp; QRIS</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Tamu bisa kirim ucapan dan doa restu</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri sampai 10 foto &amp; kisah cinta</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Semua fitur Premium</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Basic</li>
                            <li>✓ Cerita perjalanan cinta (Love Story)</li>
                            <li>✓ Musik latar dari daftar atau upload MP3 sendiri</li>
                            <li>✓ Pilihan tema desain Premium</li>
                            <li>✓ Import daftar tamu dari Excel</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="selectPackageAndOrder('Paket Premium - Rp110.000')"
                        class="tbl tbl--kedua w-full justify-center !mt-6 !h-11 !text-xs">
                    Pilih Paket Premium
                </button>
            </article>

            {{-- 3. Paket Eksklusif (Rekomendasi / .paket--saran) --}}
            <article class="paket paket--saran">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Eksklusif</h3>
                        <span class="px-2.5 py-1 rounded-full bg-[#c81e3a] text-white text-[10px] font-extrabold uppercase tracking-wider">
                            Rekomendasi
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Link nama tamu tanpa batas, dua bahasa, dan siaran langsung.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-brand">Rp180.000</span>
                        <span class="text-xs text-ink3 line-through">Rp400.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Link nama tiap tamu <b>tanpa batas</b> jumlah tamu</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Undangan 2 bahasa (Indonesia atau Inggris)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Siaran langsung (Live Streaming) di undangan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Galeri sampai 20 foto &amp; video prewedding</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Semua fitur Eksklusif</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Premium</li>
                            <li>✓ Semua desain Basic, Premium &amp; Eksklusif</li>
                            <li>✓ Layanan Terima Beres diprioritaskan</li>
                            <li>✓ Gratis undangan versi gambar untuk Story WA/IG</li>
                            <li>✓ Ganti gambar latar di tiap bagian undangan</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="selectPackageAndOrder('Paket Eksklusif - Rp180.000')"
                        class="tbl tbl--utama w-full justify-between !pl-5 !mt-6 !h-11 !text-xs">
                    <span>Pilih Paket Eksklusif</span>
                    <span class="tbl__ikon !w-7 !h-7">
                        <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
                    </span>
                </button>
            </article>

            {{-- 4. Paket Luxury --}}
            <article class="paket">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-3xl font-bold text-ink">Luxury</h3>
                        <span class="px-2.5 py-1 rounded-full bg-ink text-white text-[10px] font-extrabold uppercase tracking-wider">
                            All-In VIP
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Semua desain, sampul video, dan isi berbeda per tamu.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp280.000</span>
                        <span class="text-xs text-ink3 line-through">Rp800.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-ink/10 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Bebas pilih <b>semua desain Luxury 3D</b></span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Sampul undangan berupa video sinematik</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Isi jadwal bisa dibedakan per kelompok tamu</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-brand shrink-0 mt-0.5"><use href="#i-check"></use></svg>
                            <span>Denah meja VIP &amp; QR Code Buku Tamu</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-ink/10 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-accent flex items-center justify-between list-none">
                            <span>Semua fitur Luxury</span>
                            <svg aria-hidden="true" class="w-3.5 h-3.5 transition group-open:rotate-180"><use href="#i-caret-down"></use></svg>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Eksklusif</li>
                            <li>✓ Alamat link undangan rapi tanpa kode acak</li>
                            <li>✓ Kamera tamu interaktif (Disposable Camera)</li>
                            <li>✓ Gratis aktivasi custom domain sendiri</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="selectPackageAndOrder('Paket Luxury - Rp280.000')"
                        class="tbl tbl--kedua w-full justify-center !mt-6 !h-11 !text-xs">
                    Pilih Paket Luxury
                </button>
            </article>
        </div>

        {{-- ORDER / REQUEST FORM SECTION (#pesan) --}}
        <div id="pesan" class="mt-24 pt-16 border-t border-ink/10">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="alis">
                    <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                    Formulir Pemesanan Undangan Digital
                </span>
                <h2 class="ow-h2 mt-3">
                    Pesan &amp; buat <span class="t-script">undangan impianmu</span> <span class="t-bold">sekarang</span>
                </h2>
                <p class="mt-3 text-ink2 text-base">
                    Isi data singkat di bawah ini untuk memesan atau berkonsultasi. Tim D'Karsa siap membuatkan undangan digital terbaik untuk hari bahagia &amp; acara spesial Anda (Pernikahan, Halal Bihalal, Khitanan, Aqiqah, Ulang Tahun, dan Syukuran).
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                {{-- Customer Order Form Card --}}
                <div class="lg:col-span-7 sel sel--merah !p-7 md:!p-9">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="poin__ikon">
                            <svg aria-hidden="true" class="w-5 h-5"><use href="#i-check-circle"></use></svg>
                        </span>
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-wider text-accent">Order &amp; Custom Request</span>
                            <h3 class="font-serif text-2xl font-semibold text-ink">Form Pemesanan Undangan D'Karsa</h3>
                        </div>
                    </div>

                    @if(session('rsvp_success'))
                        <div class="mb-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-4 py-3.5 text-sm font-medium">
                            ✓ {{ session('rsvp_success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-5 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl px-4 py-3.5 text-sm">
                            <ul class="list-disc ml-4">
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="orderForm" method="POST" action="{{ route('invitation.rsvp') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="attendance" value="hadir">
                        <input type="hidden" name="guest_count" value="1">

                        {{-- Event Category Selection --}}
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Kategori Acara *</label>
                            <select id="orderCategory" name="category" onchange="onCategoryChange(this.value)"
                                    class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-bold text-accent focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">
                                <option value="Pernikahan" selected>💍 Undangan Pernikahan (Wedding)</option>
                                <option value="Halal Bihalal">🕌 Undangan Halal Bihalal &amp; Silaturahmi</option>
                                <option value="Khitanan">✂️ Undangan Khitanan / Walimatul Khitan</option>
                                <option value="Aqiqah">👶 Undangan Aqiqah &amp; Tasyakuran Anak</option>
                                <option value="Ulang Tahun">🎂 Undangan Ulang Tahun / Milad</option>
                                <option value="Syukuran">🎉 Undangan Syukuran, Reuni &amp; Acara Lainnya</option>
                            </select>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label id="labelName" class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Nama Pasangan / Tuan Rumah *</label>
                                <input id="orderName" name="name" value="{{ old('name') }}" required
                                       class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition"
                                       placeholder="Contoh: Rizky & Nabila / Keluarga Bpk. H. Ahmad">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Nomor WhatsApp Aktif *</label>
                                <input id="orderWa" name="whatsapp" value="{{ old('whatsapp') }}" required
                                       class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition"
                                       placeholder="Contoh: 081234567890">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Pilih Paket Undangan *</label>
                                <select id="orderPackage" name="package" class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">
                                    <option value="Paket Eksklusif - Rp180.000" selected>★ Paket Eksklusif - Rp180.000 (Rekomendasi)</option>
                                    <option value="Paket Basic - Rp50.000">Paket Basic - Rp50.000</option>
                                    <option value="Paket Premium - Rp110.000">Paket Premium - Rp110.000</option>
                                    <option value="Paket Luxury - Rp280.000">Paket Luxury - Rp280.000 (All-In VIP)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Pilih Desain / Tema *</label>
                                <select id="orderTheme" name="theme" class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">
                                    <optgroup label="💍 Tema Pernikahan">
                                        <option value="3D Javanese Royal">3D Javanese Royal</option>
                                        <option value="SnowFall Minimalist White">SnowFall Minimalist White</option>
                                        <option value="Batak Istimewa Heritage">Batak Istimewa Heritage</option>
                                        <option value="Glass Wonder Castle">Glass Wonder Castle</option>
                                        <option value="Lotus In Blush Red">Lotus In Blush Red</option>
                                    </optgroup>
                                    <optgroup label="🕌 Tema Halal Bihalal">
                                        <option value="Green Mosque Harmony">Green Mosque Harmony</option>
                                        <option value="Ketupat Raya Silaturahmi">Ketupat Raya Silaturahmi</option>
                                    </optgroup>
                                    <optgroup label="✂️ Tema Khitanan">
                                        <option value="Walimatul Khitan Berkah Sholeh">Walimatul Khitan Berkah Sholeh</option>
                                        <option value="Little Prince Safari Khitan">Little Prince Safari Khitan</option>
                                    </optgroup>
                                    <optgroup label="👶 Tema Aqiqah">
                                        <option value="Sweet Baby Pastel Aqiqah">Sweet Baby Pastel Aqiqah</option>
                                    </optgroup>
                                    <optgroup label="🎂 Tema Ulang Tahun">
                                        <option value="Golden Luxury Birthday / Milad">Golden Luxury Birthday / Milad</option>
                                    </optgroup>
                                    <optgroup label="🎉 Tema Syukuran & Reuni">
                                        <option value="Tasyakuran & Doa Rumah Baru">Tasyakuran & Doa Rumah Baru</option>
                                        <option value="Reuni Akbar & Temu Kangen">Reuni Akbar & Temu Kangen</option>
                                    </optgroup>
                                    <option value="Custom Desain Sesuai Request">✨ Custom Desain Sesuai Request</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Metode Pengerjaan</label>
                            <select id="orderMode" name="service_mode" class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">
                                <option value="Terima Beres (Dibuatkan Tim D'Karsa)">✓ Terima Beres (Dibuatkan penuh oleh Tim D'Karsa)</option>
                                <option value="Edit Mandiri di D'Karsa Studio">Edit Mandiri di D'Karsa Studio</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1.5">Tanggal Acara &amp; Catatan Request (Opsional)</label>
                            <textarea id="orderNotes" name="message" rows="3"
                                      class="w-full rounded-2xl border border-ink/15 px-4 py-3.5 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition"
                                      placeholder="Tuliskan rencana tanggal acara (Pernikahan / Halal Bihalal / Khitanan / Aqiqah / Ulang Tahun / Syukuran), request warna/tema, atau pertanyaan untuk tim D'Karsa...">{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-2 flex flex-col sm:flex-row gap-3">
                            <button type="submit" class="tbl tbl--utama flex-1 justify-between !pl-6">
                                <span>Kirim Pesanan Undangan</span>
                                <span class="tbl__ikon">
                                    <svg aria-hidden="true" class="w-4 h-4"><use href="#i-arrow-up-right"></use></svg>
                                </span>
                            </button>
                            <button type="button" onclick="orderViaWhatsApp()" class="tbl tbl--kedua justify-center gap-2 !px-5">
                                <svg aria-hidden="true" class="w-4 h-4 text-[#25d366]"><use href="#i-whatsapp-logo"></use></svg>
                                <span>Pesan Langsung via WA</span>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Customer Reviews / Testimonials Feed --}}
                <div class="lg:col-span-5">
                    @include('partials.wishes')
                </div>
            </div>
        </div>
    </div>
</section>