<!-- partials/gift.blade.php (FAQ, Metode Pembayaran Resmi & Penutup D'Karsa) -->
<section id="faq" class="py-20 md:py-28 bg-[#faf7f2] border-b border-orange-100/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- FAQ Section --}}
        <div class="grid lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-5 space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-100/80 border border-orange-200 text-xs font-bold text-orange-800 mb-1">
                    <span class="text-orange-700 font-extrabold uppercase tracking-wider text-[11px]">Pusat Informasi</span>
                    <span class="text-orange-300">•</span>
                    <span class="text-ink2 font-medium">Bantuan &amp; FAQ</span>
                </div>
                <h2 class="font-serif text-2xl sm:text-4xl lg:text-[2.75rem] font-bold text-ink tracking-tight leading-tight">
                    Segala Hal yang Perlu Anda Ketahui <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Sebelum Memesan</span>
                </h2>
                <p class="text-ink2 text-base leading-relaxed">
                    Masih ada hal yang ingin ditanyakan seputar pembuatan undangan online? Tim customer support D'Karsa siap melayani dengan ramah melalui WhatsApp 24 jam.
                </p>
                <div class="pt-2">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20konsultasi%20pembuatan%20undangan%20digital"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-stone-200 hover:border-orange-400 text-ink hover:text-orange-600 font-bold text-sm shadow-xs transition">
                        <svg aria-hidden="true" class="w-4 h-4 text-emerald-500"><use href="#i-whatsapp-logo"></use></svg>
                        <span>Chat Tim Support D'Karsa</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-3.5">
                <details class="faq-item p-1" open>
                    <summary>
                        <span>Berapa lama undangan digital D'Karsa aktif?</span>
                        <svg aria-hidden="true" class="w-4 h-4 text-orange-600"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-stone-100 pt-3">
                        Tidak ada batas waktu (aktif selamanya). Setelah undangan Anda diaktifkan, link undangan tetap dapat dibuka kapan pun sebagai kenangan digital berharga.
                    </div>
                </details>

                <details class="faq-item p-1">
                    <summary>
                        <span>Apakah harus mendesain sendiri dari nol?</span>
                        <svg aria-hidden="true" class="w-4 h-4 text-orange-600"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-stone-100 pt-3">
                        Tidak perlu! Di D'Karsa tersedia opsi <b>Layanan Terima Beres</b>: Anda cukup memilih tema, mengirimkan data acara &amp; foto via WhatsApp, lalu tim kami yang menyiapkan semuanya hingga siap Anda sebarkan.
                    </div>
                </details>

                <details class="faq-item p-1">
                    <summary>
                        <span>Masih bisa direvisi setelah undangan aktif?</span>
                        <svg aria-hidden="true" class="w-4 h-4 text-orange-600"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-stone-100 pt-3">
                        Bisa kapan pun tanpa biaya tambahan! Anda dapat mengubah jam acara, rute peta, menambah foto galeri, mengganti lagu latar, maupun menambah daftar nama tamu kapan saja.
                    </div>
                </details>

                <details class="faq-item p-1">
                    <summary>
                        <span>Apa itu Buku Tamu Digital QR Code?</span>
                        <svg aria-hidden="true" class="w-4 h-4 text-orange-600"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-stone-100 pt-3">
                        Sistem penerima tamu modern: petugas memindai QR Code tamu di meja depan, nama tamu muncul di layar sapa gedung, penukaran souvenir tercatat, dan rekap kehadiran langsung siap diunduh dalam format Excel.
                    </div>
                </details>

                <details class="faq-item p-1">
                    <summary>
                        <span>Bagaimana cara melakukan pembayaran?</span>
                        <svg aria-hidden="true" class="w-4 h-4 text-orange-600"><use href="#i-caret-down"></use></svg>
                    </summary>
                    <div class="px-5 pb-4 text-sm text-ink2 leading-relaxed border-t border-stone-100 pt-3">
                        Pembayaran sangat praktis dan otomatis via Midtrans (scan QRIS GoPay/ShopeePay/BCA Mobile, Virtual Account semua bank) atau transfer langsung ke rekening resmi PT D'Karsa Digital Indonesia.
                    </div>
                </details>
            </div>
        </div>

        {{-- Official Payment Channels --}}
        <div class="mt-20 pt-16 border-t border-orange-100">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-xs font-bold text-emerald-800 mb-3">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>100% AMAN &amp; TERVERIFIKASI RESMI</span>
                </div>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-ink tracking-tight">
                    Metode Pembayaran <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Resmi D'Karsa</span>
                </h3>
                <p class="mt-2 text-ink2 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
                    Mendukung pembayaran instan otomatis via Midtrans Gateway serta transfer manual ke rekening bank resmi perusahaan.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                {{-- Bank Card 1 --}}
                <div class="p-7 rounded-3xl bg-white border border-stone-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">💳</span>
                            <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-md bg-blue-100 text-blue-800">BANK BCA • RESMI</span>
                        </div>
                        <p class="font-serif text-3xl font-bold text-ink tracking-wider mt-5" id="rek1">1234 5678 90</p>
                        <p class="text-sm font-semibold text-ink2 mt-1">a.n. PT D'Karsa Digital Indonesia</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                        <span class="text-xs text-ink3">Aktivasi otomatis tanpa biaya admin</span>
                        <button type="button" onclick="copyText('1234567890')" class="px-3.5 py-1.5 rounded-lg bg-orange-100 hover:bg-orange-200 text-orange-800 text-xs font-bold transition">
                            Salin Rekening
                        </button>
                    </div>
                </div>

                {{-- Bank Card 2 --}}
                <div class="p-7 rounded-3xl bg-white border border-stone-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">🏦</span>
                            <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-md bg-orange-100 text-orange-800">BANK MANDIRI / QRIS</span>
                        </div>
                        <p class="font-serif text-3xl font-bold text-ink tracking-wider mt-5" id="rek2">0987 6543 21</p>
                        <p class="text-sm font-semibold text-ink2 mt-1">a.n. PT D'Karsa Digital Indonesia</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                        <span class="text-xs text-ink3">Mendukung semua Bank &amp; QRIS e-Wallet</span>
                        <button type="button" onclick="copyText('0987654321')" class="px-3.5 py-1.5 rounded-lg bg-orange-100 hover:bg-orange-200 text-orange-800 text-xs font-bold transition">
                            Salin Rekening
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Closing CTA Banner --}}
        <div class="mt-16 rounded-3xl overflow-hidden grid lg:grid-cols-12 border border-orange-200 shadow-xl bg-gradient-to-br from-white via-orange-50/60 to-amber-100/40 relative">
            <div class="lg:col-span-7 p-5 sm:p-8 md:p-14 flex flex-col justify-center space-y-4 sm:space-y-5 relative z-10 min-w-0">
                <div class="inline-flex flex-wrap items-center gap-1.5 sm:gap-2 px-3 sm:px-3.5 py-1.5 rounded-xl bg-white border border-orange-200 shadow-xs text-xs font-bold text-ink max-w-full">
                    <span class="text-orange-600 font-extrabold uppercase tracking-wider text-[10px] sm:text-[11px] shrink-0">Mulai Sekarang</span>
                    <span class="text-stone-300 hidden sm:inline">•</span>
                    <span class="text-ink2 font-medium text-[11px] sm:text-xs">Konsultasi Gratis Tanpa Komitmen</span>
                </div>
                <h3 class="font-serif text-2xl sm:text-4xl font-bold text-ink tracking-tight leading-tight">
                    Siap Membagikan Kebahagiaan <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Bersama D'Karsa?</span>
                </h3>
                <p class="text-ink2 text-sm sm:text-base max-w-[50ch] leading-relaxed">
                    Pilih desain favorit Anda sekarang, bagikan detail momen spesial, dan miliki undangan online berkelas yang siap sebar dalam hitungan menit.
                </p>
                <div class="flex flex-wrap gap-2.5 sm:gap-3 pt-2">
                    <a href="{{ route('invitation.create') }}" class="px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-extrabold text-xs sm:text-sm shadow-md shadow-orange-500/25 hover:shadow-lg hover:shadow-orange-500/35 transition flex items-center gap-2">
                        <span>Buat Undangan Sekarang</span>
                        <span>→</span>
                    </a>
                    <a href="#desain" class="px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl bg-white hover:bg-stone-50 text-ink border border-stone-200 font-bold text-xs sm:text-sm transition">
                        Lihat Katalog Desain
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 min-h-[300px] relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&q=80&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Momen bahagia undangan digital D'Karsa">
                <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-white via-transparent to-transparent"></div>
            </div>
        </div>
    </div>
</section>

{{-- Floating WhatsApp Quick Contact Button --}}
<a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20memesan%20undangan%20digital"
   target="_blank" rel="noopener"
   aria-label="Tanya tim D'Karsa lewat WhatsApp"
   class="fixed z-40 right-4 sm:right-6 bottom-5 sm:bottom-6 h-12 px-4 rounded-full bg-stone-900 hover:bg-emerald-600 text-white shadow-xl hover:shadow-2xl transition duration-300 flex items-center gap-2.5 text-xs font-bold border border-white/20 hover:-translate-y-0.5">
    <span class="w-7 h-7 rounded-full bg-emerald-500 text-white grid place-items-center text-sm shadow-xs">
        <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-whatsapp-logo"></use></svg>
    </span>
    <span>Tanya D'Karsa</span>
</a>
