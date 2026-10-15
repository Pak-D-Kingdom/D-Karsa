<!-- partials/gift.blade.php (FAQ, Metode Pembayaran Resmi & Penutup D'Karsa) -->
<section id="faq" class="py-20 md:py-28 sec--blush">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8">
        {{-- FAQ Section (Pertanyaan yang sering masuk - our-wedding.link style) --}}
        <div class="grid lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-5 space-y-4">
                <span class="alis">Pusat Bantuan &amp; FAQ</span>
                <h2 class="ow-h2">
                    Pertanyaan yang <span class="t-script">sering</span> <span class="t-bold">ditanyakan</span>
                </h2>
                <p class="text-ink2 text-base leading-relaxed">
                    Masih ada hal yang ingin ditanyakan sebelum memesan undangan pernikahan digital? Tim support D'Karsa siap merespons dengan cepat di WhatsApp.
                </p>
                <div class="pt-2">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20konsultasi%20pembuatan%20undangan%20pernikahan%20digital"
                       target="_blank" rel="noopener"
                       class="tbl tbl--kedua !h-11 !text-sm inline-flex items-center gap-2">
                        <svg aria-hidden="true" class="w-4 h-4 text-[#25d366]"><use href="#i-whatsapp-logo"></use></svg>
                        <span>Chat Tim Support D'Karsa</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-3">
                <details class="faq-item" open>
                    <summary>
                        <span>Berapa lama undangan digital D'Karsa aktif?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Tidak ada batas waktu (aktif selamanya). Setelah undangan Anda diaktifkan, link undangan tetap bisa dibuka kapan pun sebagai kenangan digital.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Apakah harus mendesain sendiri dari nol?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Tidak perlu! Di D'Karsa tersedia layanan <b>Terima Beres</b>: Anda cukup memilih tema, mengirimkan data acara &amp; foto prewedding melalui WhatsApp, lalu tim kami yang menyusun semuanya hingga siap sebar. Jika ingin mengedit sendiri, fitur D'Karsa Studio juga tersedia.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Masih bisa direvisi atau diedit setelah undangan aktif?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Bisa kapan pun tanpa biaya tambahan! Anda dapat mengubah jam acara, titik lokasi peta, menambah foto galeri, mengganti lagu latar, maupun menambah daftar nama tamu kapan saja.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Apa itu Buku Tamu Digital QR Code?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Sistem penerima tamu modern untuk hari H: kru memindai QR Code tamu yang tertera di undangan, nama tamu langsung tampil di Layar Sapa gedung, penukaran souvenir tercatat, dan laporan kehadiran bisa diunduh dalam format Excel.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Bagaimana cara memesan dan melakukan pembayaran?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Pilih tema atau paket yang diinginkan, isi Formulir Pemesanan di halaman ini, atau klik tombol <b>Pesan Langsung via WA</b>. Pembayaran dapat dilakukan melalui QRIS, Virtual Account, atau transfer manual ke rekening resmi D'Karsa di bawah ini.
                    </div>
                </details>

                <details class="faq-item">
                    <summary>
                        <span>Apakah bisa naik (upgrade) paket setelah memesan?</span>
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-ink/5 pt-3">
                        Sangat bisa! Anda cukup membayar selisih harga paketnya saja. Link undangan tetap sama sehingga tautan yang sudah terlanjur dibagikan ke tamu tidak akan berubah.
                    </div>
                </details>
            </div>
        </div>

        {{-- Official Payment Channels for Ordering D'Karsa --}}
        <div class="mt-20 pt-14 border-t border-ink/10">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="alis">Pembayaran Resmi &amp; Aman</span>
                <h3 class="ow-h2 mt-3">
                    Rekening pembayaran <span class="t-script">resmi</span> <span class="t-bold">D'Karsa</span>
                </h3>
                <p class="mt-2 text-ink2 text-sm">
                    Seluruh transaksi pemesanan undangan digital menggunakan rekening resmi atas nama <b>D'Karsa Digital</b>.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                {{-- Bank Card 1 --}}
                <div class="sel sel--motif flex flex-col justify-between !p-7">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="poin__ikon">💳</span>
                            <span class="text-xs font-extrabold uppercase tracking-widest px-3 py-1 rounded-full bg-accent-soft text-accent">BANK BCA • RESMI</span>
                        </div>
                        <p class="font-serif text-3xl font-bold text-ink tracking-wider mt-5" id="rek1">1234 5678 90</p>
                        <p class="text-sm font-semibold text-ink2 mt-1">a.n. PT D'Karsa Digital Indonesia</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-ink/10 flex items-center justify-between">
                        <span class="text-xs text-ink3">Aktivasi instan tanpa biaya admin</span>
                        <button type="button" onclick="copyText('1234567890')" class="tbl tbl--kedua !h-9 !px-4 !text-xs">
                            Salin Rekening
                        </button>
                    </div>
                </div>

                {{-- Bank Card 2 --}}
                <div class="sel sel--merah flex flex-col justify-between !p-7">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="poin__ikon">🏦</span>
                            <span class="text-xs font-extrabold uppercase tracking-widest px-3 py-1 rounded-full bg-[#c81e3a] text-white">BANK MANDIRI / QRIS</span>
                        </div>
                        <p class="font-serif text-3xl font-bold text-ink tracking-wider mt-5" id="rek2">0987 6543 21</p>
                        <p class="text-sm font-semibold text-ink2 mt-1">a.n. PT D'Karsa Digital Indonesia</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-ink/10 flex items-center justify-between">
                        <span class="text-xs text-ink3">Menerima semua Bank &amp; e-Wallet</span>
                        <button type="button" onclick="copyText('0987654321')" class="tbl tbl--kedua !h-9 !px-4 !text-xs">
                            Salin Rekening
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Closing Banner styled like our-wedding.link's .penutup__kartu --}}
        <div class="mt-16 rounded-[32px] overflow-hidden grid lg:grid-cols-12 border border-ink/10 shadow-xl motif"
             style="background: linear-gradient(140deg, #fff, #fdecef);">
            <div class="lg:col-span-7 p-8 md:p-14 flex flex-col justify-center space-y-5">
                <span class="alis w-max">Siap Merancang Hari Bahagia?</span>
                <h3 class="ow-h2">
                    Mulai rancang hari <span class="t-script">bahagia</span> <span class="t-bold">kalian bersama D'Karsa</span>
                </h3>
                <p class="text-ink2 text-base max-w-[50ch]">
                    Pilih desain favorit, konsultasikan kebutuhan acara secara gratis, dan lihat hasilnya langsung dari HP dalam hitungan jam.
                </p>
                <div class="flex flex-wrap gap-3 pt-1">
                    <a href="{{ route('invitation.create') }}" class="tbl tbl--utama">
                        <span>Buat Undangan Sekarang</span>
                        <span class="tbl__ikon">
                            <svg aria-hidden="true" class="w-4 h-4"><use href="#i-arrow-up-right"></use></svg>
                        </span>
                    </a>
                    <a href="#desain" class="tbl tbl--kedua">Lihat Katalog Desain</a>
                </div>
            </div>
            <div class="lg:col-span-5 min-h-[280px] relative">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&q=80&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Pasangan bahagia menggunakan undangan digital D'Karsa">
            </div>
        </div>
    </div>
</section>

{{-- Floating WhatsApp Button (.wa-melayang from our-wedding.link) --}}
<a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20memesan%20undangan%20pernikahan%20digital"
   target="_blank" rel="noopener"
   aria-label="Tanya tim D'Karsa lewat WhatsApp"
   class="wa-melayang">
    <span class="wa-melayang__ikon">
        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-whatsapp-logo"></use></svg>
    </span>
    <span>Tanya D'Karsa</span>
</a>
