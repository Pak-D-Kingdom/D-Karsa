<!-- partials/timeline.blade.php (Fitur Pintar, Cara Kerja & Buku Tamu Digital D'Karsa) -->
<section id="fitur" class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decorative Background Grid --}}
    <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(#fed7aa_1px,transparent_1px)] [background-size:24px_24px] opacity-40 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-50 border border-orange-200 text-xs font-bold text-orange-800 mb-3 shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
                <span>TEKNOLOGI &amp; FITUR UNGGULAN D'KARSA</span>
            </div>
            <h2 class="font-serif text-2xl sm:text-4xl lg:text-[2.75rem] font-bold text-ink tracking-tight leading-tight">
                Dirancang untuk Kemudahan Anda, <br class="hidden sm:inline">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Memukau Setiap Tamu Undangan</span>
            </h2>
            <p class="mt-4 text-ink2 text-base sm:text-lg leading-relaxed">
                Nikmati fitur terlengkap tanpa batasan. Dari pembuatan super cepat, personalisasi nama tamu tanpa batas, hingga integrasi buku tamu QR Code di lokasi acara.
            </p>
        </div>

        {{-- 6 Modern D'Karsa Feature Cards --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            {{-- Feature 1: Instant Activation --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-500 text-white grid place-items-center text-xl shadow-md shadow-orange-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        ⚡
                    </div>
                    <h3 class="font-bold text-lg text-ink">Aktivasi Instan &amp; Otomatis</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Terintegrasi dengan payment gateway Midtrans. Undangan langsung aktif detik itu juga setelah pembayaran QRIS atau Virtual Account selesai.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-orange-600">
                    <span>Otomatis 24/7 Tanpa Menunggu</span>
                </div>
            </div>

            {{-- Feature 2: Unlimited WhatsApp Generator --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white grid place-items-center text-xl shadow-md shadow-emerald-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        💌
                    </div>
                    <h3 class="font-bold text-lg text-ink">Kirim Nama Tamu Sepuasnya</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Generate ribuan link personal tamu secara instan. Setiap tamu akan melihat namanya tertera eksklusif pada amplop dan sampul undangan.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-emerald-700">
                    <span>Tanpa Batasan Jumlah Tamu</span>
                </div>
            </div>

            {{-- Feature 3: Digital Envelope & QRIS --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-500 text-white grid place-items-center text-xl shadow-md shadow-orange-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        💳
                    </div>
                    <h3 class="font-bold text-lg text-ink">Amplop Digital &amp; QRIS Kado</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Tamu yang berhalangan hadir dapat mengirimkan tanda kasih dan kado secara mudah melalui scan QRIS atau transfer rekening bank resmi Anda.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-orange-600">
                    <span>100% Masuk ke Rekening Anda</span>
                </div>
            </div>

            {{-- Feature 4: Interactive RSVP & Wishes --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white grid place-items-center text-xl shadow-md shadow-blue-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        💬
                    </div>
                    <h3 class="font-bold text-lg text-ink">Konfirmasi RSVP &amp; Doa Restu</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Pantau jumlah tamu hadir secara real-time untuk efisiensi catering. Tamu juga dapat menyampaikan untaian doa dan ucapan langsung di undangan.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-blue-700">
                    <span>Rekap Data Real-Time</span>
                </div>
            </div>

            {{-- Feature 5: Precision Google Maps Navigation --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-500 to-orange-600 text-white grid place-items-center text-xl shadow-md shadow-red-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        📍
                    </div>
                    <h3 class="font-bold text-lg text-ink">Navigasi Peta Rute Presisi</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Tamu tidak akan tersesat. Tombol navigasi otomatis membuka rute tercepat via Google Maps langsung ke titik koordinat gedung atau rumah Anda.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-orange-600">
                    <span>1-Klik Buka Google Maps</span>
                </div>
            </div>

            {{-- Feature 6: QR Code Check-in System --}}
            <div class="p-7 rounded-2xl bg-[#fffdfb] border border-orange-200/80 shadow-sm hover:shadow-xl hover:border-orange-400 hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white grid place-items-center text-xl shadow-md shadow-purple-500/20 mb-5 group-hover:scale-110 transition duration-300">
                        📱
                    </div>
                    <h3 class="font-bold text-lg text-ink">QR Code Check-in Meja Tamu</h3>
                    <p class="text-sm text-ink2 mt-2 leading-relaxed">
                        Sistem penerima tamu modern: scan QR Code tiap tamu di pintu masuk gedung dalam hitungan detik. Penukaran souvenir dan meja VIP tercatat rapi.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-orange-100 flex items-center gap-1.5 text-xs font-extrabold text-purple-700">
                    <span>Bebas Antrean di Hari H</span>
                </div>
            </div>
        </div>

        {{-- Section ID #cara-kerja: 2 Pilihan Cara Pembuatan --}}
        <div id="cara-kerja" class="mt-24 pt-16 border-t border-orange-100">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-50 border border-orange-200 text-xs font-bold text-orange-800 mb-3">
                    <span>FLEKSIBEL SEPENUHNYA</span>
                </div>
                <h3 class="font-serif text-2xl sm:text-4xl font-bold text-ink tracking-tight">
                    Dua Cara Praktis Membuat Undangan di D'Karsa
                </h3>
                <p class="mt-3 text-ink2 text-base">
                    Pilih sesuai preferensi Anda: edit mandiri dalam hitungan menit, atau serahkan semua kepada tim profesional kami.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-stretch">
                
                {{-- Opsi 1: D'Karsa Studio (Mandiri) --}}
                <div class="p-8 rounded-3xl bg-white border border-stone-200 shadow-sm hover:border-orange-300 transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-lg bg-orange-100 text-orange-800 font-extrabold text-xs uppercase tracking-wider">
                                Mode Mandiri (Self-Service)
                            </span>
                            <span class="text-xs font-semibold text-ink3">Selesai 5-10 Menit</span>
                        </div>
                        <h4 class="font-serif text-2xl font-bold text-ink">D'Karsa Self-Maker</h4>
                        <p class="text-sm text-ink2 mt-2 leading-relaxed">
                            Formulir intuitif yang memandu Anda mengisi data mempelai, jadwal acara, upload foto, dan memilih lagu latar sendiri.
                        </p>

                        <ul class="mt-6 space-y-3 text-sm text-ink2">
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 grid place-items-center text-xs font-bold">✓</span>
                                <span>Preview langsung di layar smartphone saat mengisi form</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 grid place-items-center text-xs font-bold">✓</span>
                                <span>Bebas revisi dan ubah data kapan saja tanpa biaya</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 grid place-items-center text-xs font-bold">✓</span>
                                <span>Aktivasi instan otomatis setelah checkout Midtrans</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 pt-6 border-t border-stone-100">
                        <a href="{{ route('invitation.create') }}" class="w-full py-3.5 px-6 rounded-xl bg-stone-900 hover:bg-orange-600 text-white font-extrabold text-sm transition flex items-center justify-center gap-2">
                            <span>Mulai Buat Sendiri Sekarang</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>

                {{-- Opsi 2: Layanan Terima Beres (Highlight) --}}
                <div class="p-8 rounded-3xl bg-gradient-to-br from-orange-500 via-amber-500 to-orange-600 text-white shadow-xl shadow-orange-500/20 flex flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-lg bg-white/20 backdrop-blur-md text-white font-black text-xs uppercase tracking-wider border border-white/30">
                                ★ Paling Banyak Dipilih
                            </span>
                            <span class="text-xs font-bold text-white/90">Bebas Repot</span>
                        </div>
                        <h4 class="font-serif text-2xl font-bold text-white">Layanan Terima Beres</h4>
                        <p class="text-sm text-white/90 mt-2 leading-relaxed">
                            Cukup kirimkan teks acara dan foto melalui WhatsApp. Desainer kami yang akan merapikan dan menyiapkan undangan sampai siap Anda sebar.
                        </p>

                        <ul class="mt-6 space-y-3 text-sm text-white/95">
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white text-orange-600 grid place-items-center text-xs font-black">✓</span>
                                <span>Didampingi tim desainer berpengalaman sampai hari H</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white text-orange-600 grid place-items-center text-xs font-black">✓</span>
                                <span>Pengerjaan ekspres hitungan jam siap disebarkan</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-white text-orange-600 grid place-items-center text-xs font-black">✓</span>
                                <span>Gratis konsultasi tema kustom dan panduan broadcast WA</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 pt-6 border-t border-white/20 relative z-10">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20memesan%20undangan%20digital%20layanan%20Terima%20Beres"
                           target="_blank" rel="noopener"
                           class="w-full py-3.5 px-6 rounded-xl bg-white hover:bg-orange-50 text-orange-600 font-extrabold text-sm shadow-md transition flex items-center justify-center gap-2">
                            <span>Pesan via WhatsApp (Terima Beres)</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section ID #buku-tamu: Sistem Check-in Tamu Modern --}}
        <div id="buku-tamu" class="mt-24 pt-16 border-t border-orange-100">
            <div class="p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#1c1512] to-[#2b1f1a] text-white shadow-2xl relative overflow-hidden">
                <div class="grid lg:grid-cols-12 gap-8 items-center relative z-10">
                    <div class="lg:col-span-7 space-y-4">
                        <span class="inline-block px-3 py-1 rounded-lg bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs font-extrabold uppercase tracking-wider">
                            Fitur Eksklusif Buku Tamu Digital
                        </span>
                        <h3 class="font-serif text-2xl sm:text-4xl font-bold text-white tracking-tight">
                            Buku Tamu QR Code Cepat, Registrasi Tanpa Antrean
                        </h3>
                        <p class="text-stone-300 text-sm sm:text-base leading-relaxed">
                            Tamu Anda cukup menunjukkan QR Code pribadi yang ada di undangannya. Petugas resepsionis memindai menggunakan smartphone dan daftar hadir langsung tersimpan rapi.
                        </p>
                        <div class="grid sm:grid-cols-3 gap-3 pt-2">
                            <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                                <b class="block text-sm font-bold text-white">&lt; 2 Detik</b>
                                <span class="text-xs text-stone-300">Scan QR Super Cepat</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                                <b class="block text-sm font-bold text-white">Layar Sapa</b>
                                <span class="text-xs text-stone-300">Nama Tampil di Monitor</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                                <b class="block text-sm font-bold text-white">Ekspor Excel</b>
                                <span class="text-xs text-stone-300">Rekap Tamu Siap Unduh</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 flex justify-center">
                        <div class="w-full max-w-sm p-6 rounded-2xl bg-white text-ink text-center shadow-xl space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 grid place-items-center mx-auto text-xl font-bold">
                                📱
                            </div>
                            <div>
                                <h5 class="font-bold text-base text-ink">Buku Tamu Digital D'Karsa</h5>
                                <p class="text-xs text-ink3 mt-1">Dukung acara formal, pernikahan, &amp; temu kangen</p>
                            </div>
                            <div class="p-3 rounded-xl bg-stone-50 border border-stone-200 text-xs font-mono text-orange-700">
                                [SCAN QR] Tamu: Bpk. Bambang • Hadir (Meja VIP 04)
                            </div>
                            <a href="{{ route('invitation.create') }}" class="block w-full py-2.5 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-extrabold text-xs transition">
                                Aktifkan Fitur Buku Tamu →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>