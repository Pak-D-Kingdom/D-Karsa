<!-- partials/rsvp.blade.php (Paket Harga #harga & Formulir Pemesanan #pesan) -->
<section id="harga" class="py-20 md:py-28 bg-[#fffcf9] border-b border-orange-100/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Pricing Header --}}
        <div class="text-center max-w-2xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-100/80 border border-orange-200 text-xs font-bold text-orange-800 mb-3">
                <span class="text-orange-700 font-extrabold uppercase tracking-wider text-[11px]">Investasi Transparan</span>
                <span class="text-orange-300">•</span>
                <span class="text-ink2 font-medium">Tanpa Biaya Tersembunyi</span>
            </div>
            <h2 class="font-serif text-2xl sm:text-4xl lg:text-[2.75rem] font-bold text-ink tracking-tight leading-tight">
                Pilihan Paket Terjangkau, <br class="hidden sm:inline">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Fitur Lengkap Aktif Selamanya</span>
            </h2>
            <p class="mt-3 text-ink2 text-base">
                Pilih paket yang paling sesuai dengan kebutuhan acara Anda. Tanpa biaya langganan bulanan, pembayaran otomatis dan aman via Midtrans.
            </p>
        </div>

        {{-- 4 Pricing Package Cards: Basic, Premium, Eksklusif, Kustom --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            {{-- 1. Paket Basic (Paling Murah / Desain Standar) --}}
            <article class="p-6 sm:p-7 rounded-3xl bg-white border border-stone-200/90 shadow-sm hover:shadow-xl hover:border-orange-300 transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink">Basic</h3>
                        <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 text-[10px] font-black uppercase tracking-wider">
                            Standar
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Pilihan tema basic esensial dengan harga paling hemat dan ringan.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp50.000</span>
                        <span class="text-xs text-ink3 line-through">Rp110.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-stone-100 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span><b>Pilihan Desain Standar:</b> Tampilan bersih, minimalis &amp; cepat dibuka</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Bebas pilih semua kategori (Pernikahan, Khitan, Tahlil, Aqiqah)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Detail acara lengkap: jam, tanggal &amp; rute Google Maps</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Konfirmasi kehadiran tamu (RSVP) real-time</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Galeri 2 foto &amp; musik latar otomatis</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-stone-100 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-orange-600 flex items-center justify-between list-none">
                            <span>Fitur lengkap Basic</span>
                            <span class="text-sm font-bold transition group-open:rotate-180">↓</span>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Tata letak esensial &amp; mudah dibaca tamu</li>
                            <li>✓ Kutipan ayat pembuka / kata mutiara doa</li>
                            <li>✓ Biodata tokoh / mempelai &amp; orang tua</li>
                            <li>✓ Masa aktif selamanya tanpa biaya bulanan</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('basic', 'Paket Basic - Rp50.000')"
                        class="w-full mt-6 py-2.5 px-4 rounded-xl border border-stone-200 hover:border-orange-500 hover:text-orange-600 text-ink text-xs font-extrabold transition">
                    Pilih Desain Basic (Rp50.000)
                </button>
            </article>

            {{-- 2. Paket Premium (Menengah / Desain Modern) --}}
            <article class="p-6 sm:p-7 rounded-3xl bg-white border border-stone-200/90 shadow-sm hover:shadow-xl hover:border-orange-300 transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink">Premium</h3>
                        <span class="px-2.5 py-1 rounded-md bg-blue-100 text-blue-800 text-[10px] font-black uppercase tracking-wider">
                            Modern
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Pilihan desain modern &amp; elegan dengan amplop digital dan personalisasi tamu.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp110.000</span>
                        <span class="text-xs text-ink3 line-through">Rp250.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-stone-100 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span><b>Pilihan Desain Modern:</b> Transisi halus &amp; visual memukau</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Link nama tamu personal (hingga 100 tamu)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Amplop digital: rekening bank &amp; scan QRIS</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Buku tamu ucapan &amp; doa restu online</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Galeri 10 foto &amp; cerita perjalanan (Love Story)</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-stone-100 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-orange-600 flex items-center justify-between list-none">
                            <span>Fitur lengkap Premium</span>
                            <span class="text-sm font-bold transition group-open:rotate-180">↓</span>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Basic</li>
                            <li>✓ Bebas upload audio lagu MP3 sendiri</li>
                            <li>✓ Fitur kirim kado fisik via kurir</li>
                            <li>✓ Import daftar tamu dari file Excel</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('premium', 'Paket Premium - Rp110.000')"
                        class="w-full mt-6 py-2.5 px-4 rounded-xl border border-stone-200 hover:border-orange-500 hover:text-orange-600 text-ink text-xs font-extrabold transition">
                    Pilih Desain Premium (Rp110.000)
                </button>
            </article>

            {{-- 3. Paket Eksklusif (Highlight / Desain 3D & Mewah) --}}
            <article class="p-6 sm:p-7 rounded-3xl bg-white border-2 border-orange-500 shadow-xl shadow-orange-500/10 ring-4 ring-orange-500/10 flex flex-col justify-between relative">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink">Eksklusif</h3>
                        <span class="px-2.5 py-1 rounded-md bg-orange-600 text-white text-[10px] font-black uppercase tracking-wider">
                            Paling Populer
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Desain mewah 3D &amp; adat istimewa, tamu tanpa batas, dan siaran langsung.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-orange-600">Rp180.000</span>
                        <span class="text-xs text-ink3 line-through">Rp400.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-orange-100 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span><b>Pilihan Desain Mewah 3D &amp; Adat:</b> Ornamen royal nusantara</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Link nama tamu <b>tanpa batasan jumlah tamu</b></span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Undangan 2 bahasa (Indonesia &amp; English)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Siaran langsung (Live Streaming YouTube/IG)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-orange-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Galeri 20 foto, video prewedding sinematik</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-orange-100 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-orange-600 flex items-center justify-between list-none">
                            <span>Fitur lengkap Eksklusif</span>
                            <span class="text-sm font-bold transition group-open:rotate-180">↓</span>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Premium</li>
                            <li>✓ Layanan Terima Beres diprioritaskan</li>
                            <li>✓ Gratis gambar story pengumuman WA / IG</li>
                            <li>✓ Ganti gambar latar di tiap section</li>
                        </ul>
                    </details>
                </div>

                <button type="button" onclick="filterCatalogByTier('eksklusif', 'Paket Eksklusif - Rp180.000')"
                        class="w-full mt-6 py-3 px-4 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs font-black shadow-md shadow-orange-500/20 transition flex items-center justify-between">
                    <span>Pilih Desain Eksklusif (Rp180k)</span>
                    <span>→</span>
                </button>
            </article>

            {{-- 4. Paket Kustom (Full Request Desain Baru) --}}
            <article class="p-6 sm:p-7 rounded-3xl bg-white border border-purple-300 shadow-sm hover:shadow-xl hover:border-purple-500 transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2">
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink">Kustom</h3>
                        <span class="px-2.5 py-1 rounded-md bg-purple-600 text-white text-[10px] font-black uppercase tracking-wider">
                            Full Request
                        </span>
                    </div>
                    <p class="text-xs text-ink2 mt-1 min-h-[34px]">Request desain baru dari nol sesuai tema impian &amp; referensi Pinterest Anda.</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="font-serif text-4xl font-bold text-ink">Rp280.000</span>
                        <span class="text-xs text-ink3 line-through">Rp800.000</span>
                    </div>

                    <ul class="mt-5 pt-5 border-t border-stone-100 space-y-2.5 text-xs text-ink2">
                        <li class="flex items-start gap-2">
                            <span class="text-purple-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span><b>Request Desain Baru:</b> Dibuatkan tema khusus dari nol!</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-purple-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Bebas request ornamen adat, animasi, atau tema film</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-purple-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Konsultasi 1-on-1 dengan desainer D'Karsa</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-purple-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Sampul video sinematik + efek animasi visual unik</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-purple-600 font-bold shrink-0 mt-0.5">✓</span>
                            <span>Gratis aktivasi domain kustom sendiri</span>
                        </li>
                    </ul>

                    <details class="mt-4 pt-3 border-t border-stone-100 text-xs text-ink2 group">
                        <summary class="cursor-pointer font-bold text-purple-600 flex items-center justify-between list-none">
                            <span>Fitur lengkap Kustom</span>
                            <span class="text-sm font-bold transition group-open:rotate-180">↓</span>
                        </summary>
                        <ul class="mt-3 space-y-2 text-ink3">
                            <li>✓ Semua fitur di paket Eksklusif (All-In)</li>
                            <li>✓ Revisi desain fleksibel sampai puas</li>
                            <li>✓ QR Code Check-in Tamu &amp; Denah Meja VIP</li>
                            <li>✓ Pendampingan teknis prioritas VIP</li>
                        </ul>
                    </details>
                </div>

                <div class="mt-6 flex flex-col gap-2">
                    <button type="button" onclick="selectPackageCustomRequest()"
                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs font-black shadow-md transition flex items-center justify-between">
                        <span>✨ Request Desain Kustom</span>
                        <span>→</span>
                    </button>
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20tertarik%20dengan%20Paket%20Kustom%20(Rp280.000)..."
                       target="_blank" rel="noopener" class="text-center text-[11px] font-bold text-purple-700 hover:underline">
                        💬 Tanya Konsep via WhatsApp →
                    </a>
                </div>
            </article>
        </div>

        {{-- SELF-SERVICE BUILDER SPOTLIGHT & REVIEWS (#pesan) --}}
        <div id="pesan" class="mt-24 pt-16 border-t border-orange-100">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-100/80 border border-orange-200 text-xs font-bold text-orange-800 mb-3">
                    <span class="text-orange-700 font-extrabold uppercase tracking-wider text-[11px]">D'Karsa Instant Maker</span>
                    <span class="text-orange-300">•</span>
                    <span class="text-ink2 font-medium">Praktis &amp; Cepat</span>
                </div>
                <h3 class="font-serif text-2xl sm:text-4xl font-bold text-ink tracking-tight">
                    Rancang &amp; Buat <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Undangan Impian Anda</span> Secara Mandiri
                </h3>
                <p class="mt-3 text-ink2 text-base">
                    Gunakan builder mandiri D'Karsa untuk membuat undangan digital cantik Anda hanya dalam hitungan menit, langsung aktif otomatis setelah pembayaran.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                {{-- Self-Service Invitation Creator Showcase Card --}}
                <div class="lg:col-span-7 bg-white rounded-3xl border border-stone-200/90 shadow-sm p-6 sm:p-9">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 grid place-items-center text-lg font-bold">
                            ✨
                        </span>
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-orange-600">D'Karsa Self-Maker</span>
                            <h4 class="font-serif text-xl sm:text-2xl font-bold text-ink">Buat Undangan Sendiri dalam 4 Langkah</h4>
                        </div>
                    </div>

                    <p class="text-sm text-ink2 leading-relaxed mb-6">
                        Kini Anda tidak perlu lagi antre menunggu admin mengetik data Anda. Cukup gunakan <b>D'Karsa Self-Service Maker</b> untuk menyusun dan menyesuaikan isi undangan digital Anda secara mandiri dalam hitungan menit.
                    </p>

                    {{-- 4 Core Steps Flow --}}
                    <div class="grid sm:grid-cols-2 gap-3.5 mb-6">
                        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-4 hover:border-orange-300 transition">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-6 h-6 rounded-lg bg-orange-600 text-white flex items-center justify-center text-xs font-bold shrink-0">1</span>
                                <h5 class="text-xs font-extrabold uppercase tracking-wider text-ink">Pilih Kategori Acara</h5>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Pernikahan, Khitanan, Aqiqah, Halal Bihalal, Ulang Tahun, Wisuda, hingga Syukuran.
                            </p>
                        </div>

                        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-4 hover:border-orange-300 transition">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-6 h-6 rounded-lg bg-orange-600 text-white flex items-center justify-center text-xs font-bold shrink-0">2</span>
                                <h5 class="text-xs font-extrabold uppercase tracking-wider text-ink">Isi Data Tokoh &amp; Foto</h5>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Nama panggilan, gelar, biodata orang tua, serta upload foto galeri prewedding.
                            </p>
                        </div>

                        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-4 hover:border-orange-300 transition">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-6 h-6 rounded-lg bg-orange-600 text-white flex items-center justify-center text-xs font-bold shrink-0">3</span>
                                <h5 class="text-xs font-extrabold uppercase tracking-wider text-ink">Jadwal &amp; Google Maps</h5>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Tanggal &amp; jam acara, hitung mundur (countdown), serta navigasi peta rute GPS.
                            </p>
                        </div>

                        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-4 hover:border-orange-300 transition">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-6 h-6 rounded-lg bg-orange-600 text-white flex items-center justify-center text-xs font-bold shrink-0">4</span>
                                <h5 class="text-xs font-extrabold uppercase tracking-wider text-ink">Amplop Digital &amp; Musik</h5>
                            </div>
                            <p class="text-xs text-ink3 leading-relaxed">
                                Rekening bank/e-wallet untuk kado digital, lagu latar otomatis, dan buku tamu online.
                            </p>
                        </div>
                    </div>

                    {{-- Action CTA Buttons --}}
                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('invitation.create') }}" class="flex-1 py-3.5 px-6 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs sm:text-sm font-black shadow-md shadow-orange-500/20 transition flex items-center justify-center gap-2">
                            <span>✨ Mulai Buat Undangan Sekarang</span>
                            <span>→</span>
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20tanya%20seputar%20pembuatan%20undangan%20digital"
                           target="_blank" rel="noopener" class="py-3.5 px-5 rounded-xl border border-stone-200 hover:border-orange-400 text-ink hover:text-orange-600 text-xs sm:text-sm font-bold transition flex items-center justify-center gap-2">
                            <svg aria-hidden="true" class="w-4 h-4 text-emerald-500"><use href="#i-whatsapp-logo"></use></svg>
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