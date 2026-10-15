@extends('layouts.app')

@section('title')
    D'Karsa — Jasa Pembuatan &amp; Platform Undangan Pernikahan Digital No.1
@endsection

@section('meta_description')
    D'Karsa — Website undangan pernikahan digital, buku tamu QR Code, dan layanan pembuatan undangan pernikahan online terima beres &amp; kustom.
@endsection

@section('content')
    @include('partials.nav')
    @include('partials.hero', ['couple' => $couple, 'guest' => $guest])
    @include('partials.couple', ['couple' => $couple])
    @include('partials.timeline', ['events' => $couple->events, 'invitation' => $couple])
    @include('partials.gallery', ['galleries' => $couple->galleries])
    @include('partials.rsvp', ['invitation' => $couple, 'guest' => $guest, 'wishes' => $wishes])
    @include('partials.gift', ['couple' => $couple])
    @include('partials.footer', ['couple' => $couple])
    @include('partials.preview-modal')
    @include('partials.lightbox')
    @include('partials.musicfab')
@endsection

@push('scripts')
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/lightbox/lightbox.min.js') }}"></script>
    <script>
        if (typeof AOS !== 'undefined') { AOS.init({once:true, duration:800}); }

        const music = document.getElementById('bgMusic');
        const musicBtn = document.getElementById('musicBtn');
        const musicIcon = document.getElementById('musicIcon') || musicBtn;
        let playing = false;

        if (musicBtn && music) {
            musicBtn.addEventListener('click', () => {
                if (playing) {
                    music.pause();
                    playing = false;
                    musicIcon.textContent = '♪';
                } else {
                    music.play().then(() => {
                        playing = true;
                        musicIcon.textContent = '♫';
                    }).catch(() => {});
                }
            });
        }

        // Quick Category Jump from Hero section
        function selectCategoryFilter(category) {
            const btn = Array.from(document.querySelectorAll('#themeFilters .chip')).find(b => b.getAttribute('onclick')?.includes(category));
            filterThemes(category, btn);
            const section = document.getElementById('desain');
            if (section) section.scrollIntoView({ behavior: 'smooth' });
        }

        let currentSelectedCategory = 'semua';
        let currentSelectedTier = 'semua';

        function applyCatalogFilters() {
            document.querySelectorAll('#catalogGrid .theme-card').forEach(card => {
                const cardCat = card.dataset.category || '';
                const cardTier = card.dataset.tier || '';

                const matchCat = (currentSelectedCategory === 'semua' || cardCat === currentSelectedCategory || cardCat === 'semua');
                const matchTier = (currentSelectedTier === 'semua' || cardTier === currentSelectedTier);

                if (matchCat && matchTier) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Filter Katalog Desain Berdasarkan Kategori Acara
        function filterThemes(category, btn) {
            currentSelectedCategory = category;
            document.querySelectorAll('#themeFilters .chip').forEach(c => c.classList.remove('aktif'));
            if (btn) btn.classList.add('aktif');
            applyCatalogFilters();
        }

        // Filter Katalog Desain Berdasarkan Tingkat Paket (Basic, Premium, Eksklusif, Kustom)
        function filterCatalogByTier(tier, packageName) {
            currentSelectedTier = tier;

            // Update status chip aktif di tier filters
            document.querySelectorAll('#tierFilters .chip').forEach(c => c.classList.remove('aktif'));
            const activeChip = document.getElementById('chipTier_' + tier);
            if (activeChip) activeChip.classList.add('aktif');

            // Update Banner Informasi Tier
            const banner = document.getElementById('catalogTierBanner');
            const titleEl = document.getElementById('tierBannerTitle');
            const descEl = document.getElementById('tierBannerDesc');
            const badgeEl = document.getElementById('tierBannerBadge');

            if (banner && titleEl && descEl) {
                if (tier === 'semua') {
                    banner.classList.add('hidden');
                } else {
                    banner.classList.remove('hidden');
                    if (tier === 'basic') {
                        if (badgeEl) { badgeEl.textContent = 'Paket Basic (Rp50.000)'; badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-600 text-white'; }
                        titleEl.textContent = 'Koleksi Desain Paket Basic (Rp50.000)';
                        descEl.textContent = 'Pilihan desain standar, bersih & esensial dengan harga paling murah/hemat. Silakan klik "Pilih & Buat" pada desain yang Anda inginkan!';
                    } else if (tier === 'premium') {
                        if (badgeEl) { badgeEl.textContent = 'Paket Premium (Rp110.000)'; badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-blue-600 text-white'; }
                        titleEl.textContent = 'Koleksi Desain Paket Premium (Rp110.000)';
                        descEl.textContent = 'Pilihan desain modern & elegan dengan animasi transisi halus, amplop digital QRIS/Bank, dan ucapan doa restu tamu.';
                    } else if (tier === 'eksklusif') {
                        if (badgeEl) { badgeEl.textContent = 'Paket Eksklusif (Rp180.000)'; badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-brand text-white'; }
                        titleEl.textContent = 'Koleksi Desain Paket Eksklusif (Rp180.000)';
                        descEl.textContent = 'Pilihan desain mewah 3D royal nusantara, video sinematik, siaran langsung, dan link nama tamu tanpa batas.';
                    } else if (tier === 'kustom') {
                        if (badgeEl) { badgeEl.textContent = 'Paket Kustom (Rp280.000)'; badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-purple-600 text-white'; }
                        titleEl.textContent = 'Paket Kustom: Full Request Desain Baru';
                        descEl.textContent = 'Bisa request desain baru dari nol sesuai keinginan customer! Diskusikan tema, warna, ornamen, atau referensi impian Anda langsung dengan desainer D\'Karsa.';
                    }
                }
            }

            applyCatalogFilters();

            // Scroll halus ke katalog
            const catalogSec = document.getElementById('desain');
            if (catalogSec) {
                catalogSec.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Aksi Request Desain Kustom
        function selectPackageCustomRequest() {
            window.location.href = "{{ route('invitation.create') }}?package=" + encodeURIComponent('Paket Kustom - Rp280.000') + "&theme=" + encodeURIComponent('Custom Desain Sesuai Request');
        }

        // Live Preview Tema di Layar HP Hero
        function previewThemeOnPhone(name, img, badge) {
            const heroImg = document.getElementById('heroPreviewImg');
            const heroBadge = document.getElementById('heroPreviewBadge');
            const heroTitle = document.getElementById('heroPreviewTitle');
            if (heroImg) heroImg.src = img;
            if (heroBadge) heroBadge.textContent = badge ? badge.toUpperCase() : name.toUpperCase();
            if (heroTitle) heroTitle.innerHTML = name + ' <svg aria-hidden="true" class="w-4 h-4"><use href="#i-centang-biru"></use></svg>';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Dynamic change based on selected Category in Order Form
        function onCategoryChange(cat) {
            const labelName = document.getElementById('labelName');
            const inputName = document.getElementById('orderName');
            if (!labelName || !inputName) return;

            switch(cat) {
                case 'Halal Bihalal':
                    labelName.textContent = 'Nama Keluarga Besar / Instansi / Tuan Rumah *';
                    inputName.placeholder = 'Contoh: Keluarga Besar Bani Sastro / Alumni SMAN 1';
                    break;
                case 'Khitanan':
                    labelName.textContent = 'Nama Anak yang Dikhitan & Orang Tua *';
                    inputName.placeholder = 'Contoh: Muhammad Fatih (Putra Bpk. Hendra & Ibu Rina)';
                    break;
                case 'Aqiqah':
                    labelName.textContent = 'Nama Buah Hati & Orang Tua *';
                    inputName.placeholder = 'Contoh: Aisyah Putri (Putri Bpk. Rizky & Ibu Nabila)';
                    break;
                case 'Ulang Tahun':
                    labelName.textContent = 'Nama yang Berulang Tahun & Usia *';
                    inputName.placeholder = 'Contoh: Jessica Olivia (Sweet 17th Birthday)';
                    break;
                case 'Syukuran':
                    labelName.textContent = 'Nama Tuan Rumah / Acara Syukuran *';
                    inputName.placeholder = 'Contoh: Syukuran Rumah Baru Bpk. Bambang & Keluarga';
                    break;
                default:
                    labelName.textContent = 'Nama Pasangan / Pemesan *';
                    inputName.placeholder = 'Contoh: Rizky & Nabila';
                    break;
            }
        }

        // Pilih Tema dari Katalog & Alihkan Langsung ke Halaman Buat Undangan Sendiri (/buat-undangan)
        function selectThemeAndOrder(themeName, packageVal, eventCat) {
            const params = new URLSearchParams();
            if (eventCat) params.append('category', eventCat);
            if (themeName) params.append('theme', themeName);
            if (packageVal) params.append('package', packageVal);
            const query = params.toString() ? '?' + params.toString() : '';
            window.location.href = "{{ route('invitation.create') }}" + query;
        }

        // Pilih Paket Harga & Alihkan Langsung ke Halaman Buat Undangan Sendiri (/buat-undangan)
        function selectPackageAndOrder(packageVal) {
            const params = new URLSearchParams();
            if (packageVal) params.append('package', packageVal);
            const query = params.toString() ? '?' + params.toString() : '';
            window.location.href = "{{ route('invitation.create') }}" + query;
        }

        // Pesan Cepat via WhatsApp dengan Data Form
        function orderViaWhatsApp() {
            const category = document.getElementById('orderCategory')?.value || 'Pernikahan';
            const name = document.getElementById('orderName')?.value || 'Tuan Rumah / Pemesan';
            const wa = document.getElementById('orderWa')?.value || '-';
            const pkg = document.getElementById('orderPackage')?.value || 'Paket Eksklusif - Rp180.000';
            const theme = document.getElementById('orderTheme')?.value || 'Tema Rekomendasi';
            const mode = document.getElementById('orderMode')?.value || "Terima Beres (Dibuatkan Tim D'Karsa)";
            const notes = document.getElementById('orderNotes')?.value || '-';

            const text = `Halo Admin *D'Karsa*, saya ingin memesan undangan digital:\n\n` +
                         `• *Kategori Acara*: ${category}\n` +
                         `• *Nama Pemesan/Acara*: ${name}\n` +
                         `• *No. WhatsApp*: ${wa}\n` +
                         `• *Pilihan Paket*: ${pkg}\n` +
                         `• *Pilihan Tema*: ${theme}\n` +
                         `• *Layanan*: ${mode}\n` +
                         `• *Catatan Request*: ${notes}\n\n` +
                         `Mohon info langkah selanjutnya. Terima kasih!`;

            window.open(`https://wa.me/6281234567890?text=${encodeURIComponent(text)}`, '_blank');
        }

        function copyText(t) {
            navigator.clipboard.writeText(t);
            alert('Nomor rekening resmi D\'Karsa berhasil disalin: ' + t);
        }

        function openLightbox(src) {
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lightboxImg');
            if (lb && lbImg) {
                lbImg.src = src;
                lb.classList.remove('hidden');
                lb.classList.add('flex');
            }
        }

        // ============================================
        // LIVE INTERACTIVE PREVIEW MODAL LOGIC
        // ============================================
        const themePreviews = {
            '3d-javanese-royal': {
                name: '3D Javanese Royal',
                category: 'Pernikahan',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Nuansa keraton Jawa klasik dengan animasi gunungan 3D, gending halus & doa restu.',
                coverBadge: 'WALIMATUL URUSY',
                coverTitle: 'Rizky & Amanda',
                coverDate: 'Sabtu, 20 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700',
                quoteTitle: 'QS. Ar-Rum: 21',
                quoteBody: '"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."',
                profileName: 'Rizky Pratama, S.T. & Amanda Putri, S.Ds.',
                profileDesc: 'Putra Bpk. Hendra & Ibu Rina — Putri Bpk. Sastro & Ibu Hartati',
                locationName: 'Grand Ballroom Hotel Mulia, Senayan',
                events: [
                    { title: 'Akad Nikah', time: '08:00 - 10:00 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Masjid Agung Al-Ikhlas' },
                    { title: 'Resepsi Pernikahan', time: '11:00 - 14:00 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Grand Ballroom Hotel Mulia' }
                ]
            },
            'snowfall-minimalist-white': {
                name: 'SnowFall Minimalist White',
                category: 'Pernikahan',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Luxury',
                packageVal: 'Paket Luxury - Rp280.000',
                desc: 'Desain putih bersih bergaya editorial modern dengan efek partikel lembut dan video cover.',
                coverBadge: 'THE WEDDING CELEBRATION',
                coverTitle: 'Bima & Laras',
                coverDate: 'Minggu, 12 Juli 2026',
                coverImg: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700',
                quoteTitle: 'A Beautiful Beginning',
                quoteBody: '"True love stories never have endings, they are filled with endless grace, prayer, and mutual devotion."',
                profileName: 'Bima Arya & Larasati Dewi',
                profileDesc: 'Putra Pertama Bpk. Bambang & Putri Kedua Bpk. Yulianto',
                locationName: 'The Glass House Garden, Bogor',
                events: [
                    { title: 'Holy Matrimony / Akad', time: '09:00 - 11:00 WIB', date: 'Minggu, 12 Juli 2026', place: 'Glass Chapel Pavilion' },
                    { title: 'Wedding Reception', time: '12:00 - 15:00 WIB', date: 'Minggu, 12 Juli 2026', place: 'Garden Terrace The Glass House' }
                ]
            },
            'batak-istimewa-heritage': {
                name: 'Batak Istimewa Heritage',
                category: 'Pernikahan',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Ornamen ulos khas Batak dengan perpaduan warna marun & emas yang elegan dan sakral.',
                coverBadge: 'PAMASU-MASUON & UNJUK',
                coverTitle: 'Faishal & Dhira',
                coverDate: 'Sabtu, 15 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700',
                quoteTitle: 'Dongan Tubu, Boru, Bere & Ibebere',
                quoteBody: '"Tumpak ma Debata mamasu-masu pardengganan on, marparbue ma holong nasida tu saleleng ni lelengna."',
                profileName: 'Faishal Hutapea & Dhira Simanjuntak',
                profileDesc: 'Anak ni Bpk. St. M. Hutapea & Boru ni Bpk. Ir. R. Simanjuntak',
                locationName: 'Wisma Batak Mulia Hall, Medan',
                events: [
                    { title: 'Pamasu-masuon', time: '08:30 - 10:30 WIB', date: 'Sabtu, 15 Agustus 2026', place: 'Gereja HKBP Sudirman' },
                    { title: 'Pesta Adat Batak & Resepsi', time: '11:00 - Selesai', date: 'Sabtu, 15 Agustus 2026', place: 'Wisma Batak Mulia' }
                ]
            },
            'green-mosque-harmony': {
                name: 'Green Mosque Harmony',
                category: 'Halal Bihalal',
                catKey: 'halalbihalal',
                badge: '🕌 Halal Bihalal • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan Halal Bihalal keluarga besar / kantor bernuansa hijau sage, kubah masjid & ayat suci.',
                coverBadge: 'SILATURAHMI IDUL FITRI 1447 H',
                coverTitle: 'Keluarga Besar Bani Sastro',
                coverDate: 'Ahad, 12 April 2026',
                coverImg: 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=700',
                quoteTitle: 'Hadits Silaturahmi',
                quoteBody: '"Barangsiapa yang ingin dilapangkan rezekinya dan dipanjangkan umurnya, hendaklah ia menyambung tali silaturahmi." (HR. Bukhari & Muslim)',
                profileName: 'Keluarga Besar Bani Sastro',
                profileDesc: 'Tuan Rumah: Bpk. H. Ahmad Sastro & Ibu Hj. Siti Aminah',
                locationName: 'Graha Kencana Hall, Surabaya',
                events: [
                    { title: 'Tausiyah & Silaturahmi', time: '09:00 - 11:30 WIB', date: 'Ahad, 12 April 2026', place: 'Graha Kencana Main Hall' },
                    { title: 'Ramah Tamah & Makan Bersama', time: '11:30 - Selesai', date: 'Ahad, 12 April 2026', place: 'Dining Hall Graha Kencana' }
                ]
            },
            'ketupat-raya-silaturahmi': {
                name: 'Ketupat Raya Silaturahmi',
                category: 'Halal Bihalal',
                catKey: 'halalbihalal',
                badge: '🕌 Halal Bihalal • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Desain silaturahmi Idul Fitri ceria dengan ornamen ketupat, jadwal halal bihalal & lokasi Google Maps.',
                coverBadge: 'HALAL BIHALAL KELUARGA BESAR',
                coverTitle: 'Keluarga Trah Marto Diharjo',
                coverDate: 'Senin, 13 April 2026',
                coverImg: 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700',
                quoteTitle: 'Minal Aidin Wal Faizin',
                quoteBody: '"Semoga Allah menerima amal ibadah puasa kita dan senantiasa melimpahkan berkah persaudaraan."',
                profileName: 'Trah Marto Diharjo',
                profileDesc: 'Ketua Paguyuban: Bpk. Bambang Marto & Ibu Sri Rejeki',
                locationName: 'Pendopo Ndalem Ageng, Solo',
                events: [
                    { title: 'Temu Kangen & Sungkeman', time: '09:30 - 12:00 WIB', date: 'Senin, 13 April 2026', place: 'Pendopo Ndalem Ageng' },
                    { title: 'Santap Siang Bersama', time: '12:00 - 15:00 WIB', date: 'Senin, 13 April 2026', place: 'Pendopo Ndalem Ageng' }
                ]
            },
            'walimatul-khitan-berkah-sholeh': {
                name: 'Walimatul Khitan Berkah Sholeh',
                category: 'Khitanan',
                catKey: 'khitanan',
                badge: '✂️ Khitanan • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan syukuran khitanan islami dengan foto jagoan kecil, doa anak sholeh & amplop digital.',
                coverBadge: 'WALIMATUL KHITAN',
                coverTitle: 'M. Rayyan Al-Fatih',
                coverDate: 'Ahad, 17 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700',
                quoteTitle: 'Doa Walimatul Khitan',
                quoteBody: '"Ya Allah, berkahilah khitanan putra kami, jadikanlah ia anak yang sholeh, berbakti kepada kedua orang tua dan bermanfaat bagi sesama."',
                profileName: 'Muhammad Rayyan Al-Fatih',
                profileDesc: 'Putra Tercinta dari Bpk. Hendra Gunawan & Ibu Rina Wijaya',
                locationName: 'Gedung Serbaguna Al-Falah, Bandung',
                events: [
                    { title: 'Tasyakuran & Doa Khitan', time: '10:00 - 12:00 WIB', date: 'Ahad, 17 Mei 2026', place: 'Auditorium Al-Falah' },
                    { title: 'Ramah Tamah & Hadroh', time: '12:00 - 14:30 WIB', date: 'Ahad, 17 Mei 2026', place: 'Hall Serbaguna Al-Falah' }
                ]
            },
            'little-prince-safari-khitan': {
                name: 'Little Prince Safari Khitan',
                category: 'Khitanan',
                catKey: 'khitanan',
                badge: '✂️ Khitanan • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Tema khitanan anak yang ceria dan penuh petualangan, lengkap dengan link nama teman & keluarga.',
                coverBadge: 'KHITANAN JAGOAN KECIL',
                coverTitle: 'Kenzo Alvaro Pratama',
                coverDate: 'Minggu, 24 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700',
                quoteTitle: 'Anak Hebat & Pemberani',
                quoteBody: '"Selamat untuk jagoan cilik kita yang telah dikhitan! Semoga tumbuh cerdas, sholeh, dan ceria selalu."',
                profileName: 'Kenzo Alvaro Pratama',
                profileDesc: 'Putra dari Bpk. Dimas Pratama & Ibu Maya Anggraini',
                locationName: 'Kidz Playground Garden, Tangerang',
                events: [
                    { title: 'Tasyakuran & Dongeng Anak', time: '10:00 - 12:00 WIB', date: 'Minggu, 24 Mei 2026', place: 'Kidz Playground Hall' },
                    { title: 'Makan Bersama & Goodie Bag', time: '12:00 - 14:00 WIB', date: 'Minggu, 24 Mei 2026', place: 'Kidz Garden Area' }
                ]
            },
            'sweet-baby-pastel-aqiqah': {
                name: 'Sweet Baby Pastel Aqiqah',
                category: 'Aqiqah',
                catKey: 'aqiqah',
                badge: '👶 Aqiqah • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Tasyakuran kelahiran & aqiqah buah hati dengan warna pastel lembut, doa penyejuk hati & peta acara.',
                coverBadge: 'TASYAKURAN AQIQAH & TASMIYAH',
                coverTitle: 'Dania Azkadina Putri',
                coverDate: 'Sabtu, 2 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700',
                quoteTitle: 'Doa Keberkahan Aqiqah',
                quoteBody: '"Semoga Allah memberkahimu atas buah hati yang dianugerahkan kepadamu, engkau bersyukur kepada Sang Maha Pemberi, dan ia tumbuh dewasa dalam kebaikan."',
                profileName: 'Dania Azkadina Putri',
                profileDesc: 'Arti Nama: Gadis cerdas pembawa berkah. Putri Bpk. Rizky & Ibu Nabila',
                locationName: 'Kediaman Bpk. Rizky & Ibu Nabila',
                events: [
                    { title: 'Prosesi Tasmiyah & Cukur Rambut', time: '09:00 - 10:30 WIB', date: 'Sabtu, 2 Mei 2026', place: 'Kediaman Keluarga' },
                    { title: 'Doa Bersama & Santap Siang', time: '10:30 - 13:00 WIB', date: 'Sabtu, 2 Mei 2026', place: 'Kediaman Keluarga' }
                ]
            },
            'golden-luxury-birthday-milad': {
                name: 'Golden Luxury Birthday / Milad',
                category: 'Ulang Tahun',
                catKey: 'ultah',
                badge: '🎂 Ulang Tahun • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Perayaan sweet seventeen / anniversary / milad dengan ornamen emas berkilau dan RSVP kehadiran tamu.',
                coverBadge: 'YOU\'RE INVITED TO CELEBRATE',
                coverTitle: 'Jessica Olivia Sweet 17th',
                coverDate: 'Sabtu, 18 Juli 2026',
                coverImg: 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700',
                quoteTitle: 'Celebrate Moments with Joy',
                quoteBody: '"Count your age by friends, not years. Terima kasih sudah menjadi sahabat terbaik dalam hidupku!"',
                profileName: 'Jessica Olivia Santoso',
                profileDesc: 'Sweet 17th Birthday Bash • Dress Code: Glam in Black & Gold',
                locationName: 'Sky Lounge Rooftop Cafe, Jakarta',
                events: [
                    { title: 'Welcoming & Red Carpet Photo', time: '18:30 - 19:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Sky Lounge Photo Booth' },
                    { title: 'Dinner, Games & DJ Performance', time: '19:30 - 22:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Sky Lounge Main Hall' }
                ]
            },
            'tasyakuran-doa-rumah-baru': {
                name: 'Tasyakuran & Doa Rumah Baru',
                category: 'Syukuran',
                catKey: 'syukuran',
                badge: '🎉 Syukuran • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Undangan syukuran rumah baru, tahlil, wisuda, atau doa bersama keluarga dan tetangga.',
                coverBadge: 'TASYAKURAN MENEMPATI RUMAH BARU',
                coverTitle: 'Keluarga Bpk. Bambang & Ibu Rini',
                coverDate: 'Sabtu, 6 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700',
                quoteTitle: 'Baiti Jannati — Rumahku Surgaku',
                quoteBody: '"Ya Allah, jadikanlah rumah ini tempat yang penuh kedamaian, keberkahan rezeki, dan naungan kasih sayang."',
                profileName: 'Keluarga Bpk. Bambang Irawan',
                profileDesc: 'Cluster Grand Harmoni Blok D No. 12, Bekasi',
                locationName: 'Kediaman Baru Bpk. Bambang',
                events: [
                    { title: 'Doa Bersama & Khataman Quran', time: '16:00 - 18:00 WIB', date: 'Sabtu, 6 Juni 2026', place: 'Kediaman Baru' },
                    { title: 'Santap Malam & Ramah Tamah', time: '19:00 - Selesai', date: 'Sabtu, 6 Juni 2026', place: 'Kediaman Baru' }
                ]
            },
            'reuni-akbar-temu-kangen': {
                name: 'Reuni Akbar & Temu Kangen',
                category: 'Syukuran',
                catKey: 'syukuran',
                badge: '🎉 Reuni • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan temu kangen alumni sekolah / kampus dengan konfirmasi kehadiran angkatan & galeri kenangan.',
                coverBadge: 'REUNI AKBAR SATU DEKADE',
                coverTitle: 'Alumni SMAN 1 Angkatan 2015',
                coverDate: 'Sabtu, 8 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700',
                quoteTitle: 'Merajut Kembali Persahabatan',
                quoteBody: '"Waktu boleh berlalu, tapi kenangan putih abu-abu akan selalu hidup di hati kita. Mari bersua dan bernostalgia bersama!"',
                profileName: 'Ikatan Alumni SMAN 1 (2015)',
                profileDesc: 'Tema: "Kembali Bertemu, Mengukir Rindu" • Dresscode: Casual Vintage',
                locationName: 'Grand Convention Center Hall A, Yogyakarta',
                events: [
                    { title: 'Registrasi QR Code & Foyer', time: '09:00 - 10:30 WIB', date: 'Sabtu, 8 Agustus 2026', place: 'Grand Convention Foyer' },
                    { title: 'Nostalgia & Doa Bersama Guru', time: '10:30 - 15:00 WIB', date: 'Sabtu, 8 Agustus 2026', place: 'Grand Convention Hall A' }
                ]
            }
        };

        const audioTracks = {
            'pernikahan': '{{ asset("audio/wedding-melody.wav") }}',
            'halalbihalal': '{{ asset("audio/islamic-melody.wav") }}',
            'khitanan': '{{ asset("audio/islamic-melody.wav") }}',
            'aqiqah': '{{ asset("audio/lullaby-melody.wav") }}',
            'ultah': '{{ asset("audio/celebration-melody.wav") }}',
            'syukuran': '{{ asset("audio/wedding-melody.wav") }}',
        };

        let currentPreviewSlug = '3d-javanese-royal';
        const previewKeys = Object.keys(themePreviews);

        function openThemePreviewModal(slug) {
            const theme = themePreviews[slug] || themePreviews['3d-javanese-royal'];
            currentPreviewSlug = themePreviews[slug] ? slug : '3d-javanese-royal';
            renderThemePreview(theme);

            const modal = document.getElementById('themePreviewModal');
            const box = document.getElementById('themePreviewBox');
            if (modal && box) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    box.classList.remove('scale-95');
                    box.classList.add('scale-100');
                }, 10);
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeThemePreview() {
            const modal = document.getElementById('themePreviewModal');
            const box = document.getElementById('themePreviewBox');
            const audioEl = document.getElementById('previewAudio');
            const musicIcon = document.getElementById('previewMusicIcon');

            if (audioEl) {
                audioEl.pause();
                audioEl.currentTime = 0;
            }
            if (musicIcon) {
                musicIcon.classList.remove('animate-spin');
                musicIcon.textContent = '♫';
            }

            if (modal && box) {
                modal.classList.add('opacity-0');
                box.classList.add('scale-95');
                box.classList.remove('scale-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }, 250);
            }
        }

        function renderThemePreview(theme) {
            // Header Info
            const catBadge = document.getElementById('previewCategoryBadge');
            const modalTitle = document.getElementById('modalThemeTitle');
            const modalPkg = document.getElementById('modalThemePackage');
            const catSub = document.getElementById('modalCategorySub');
            const nameEl = document.getElementById('modalThemeName');
            const descEl = document.getElementById('modalThemeDesc');

            if (catBadge) catBadge.textContent = theme.badge;
            if (modalTitle) modalTitle.textContent = theme.name;
            if (modalPkg) modalPkg.textContent = 'Paket Rekomendasi: ' + theme.packageVal;
            if (catSub) catSub.textContent = 'Kategori: ' + theme.category;
            if (nameEl) nameEl.textContent = theme.name;
            if (descEl) descEl.textContent = theme.desc;

            // Audio setup for this theme
            const audioEl = document.getElementById('previewAudio');
            const musicIcon = document.getElementById('previewMusicIcon');
            const targetAudio = theme.audioSrc || audioTracks[theme.catKey] || audioTracks['pernikahan'];
            if (audioEl) {
                audioEl.pause();
                audioEl.currentTime = 0;
                audioEl.src = targetAudio;
                audioEl.load();
            }
            if (musicIcon) {
                musicIcon.classList.remove('animate-spin');
                musicIcon.textContent = '♫';
            }

            // Reset Phone Screen to Cover view
            const cover = document.getElementById('previewCover');
            const content = document.getElementById('previewContent');
            const scrollBox = document.getElementById('phoneScreenScroll');
            if (cover) {
                cover.classList.remove('hidden');
                cover.style.background = `linear-gradient(180deg, rgba(18,10,12,0.35) 0%, rgba(18,10,12,0.88) 100%), url('${theme.coverImg}') center/cover`;
            }
            if (content) content.classList.add('hidden');
            if (scrollBox) scrollBox.scrollTop = 0;

            // Phone Cover Elements
            const pCoverBadge = document.getElementById('phoneCoverBadge');
            const pCoverTitle = document.getElementById('phoneCoverTitle');
            const pCoverDate = document.getElementById('phoneCoverDate');
            if (pCoverBadge) pCoverBadge.textContent = theme.coverBadge;
            if (pCoverTitle) pCoverTitle.textContent = theme.coverTitle;
            if (pCoverDate) pCoverDate.textContent = theme.coverDate;

            // Phone Content Elements
            const pQuoteTitle = document.getElementById('phoneQuoteTitle');
            const pQuoteBody = document.getElementById('phoneQuoteBody');
            const pProfileImg = document.getElementById('phoneProfileImg');
            const pProfileName = document.getElementById('phoneProfileName');
            const pProfileDesc = document.getElementById('phoneProfileDesc');
            const pLocName = document.getElementById('phoneLocationName');

            if (pQuoteTitle) pQuoteTitle.textContent = theme.quoteTitle;
            if (pQuoteBody) pQuoteBody.textContent = theme.quoteBody;
            if (pProfileImg) pProfileImg.src = theme.coverImg;
            if (pProfileName) pProfileName.textContent = theme.profileName;
            if (pProfileDesc) pProfileDesc.textContent = theme.profileDesc;
            if (pLocName) pLocName.textContent = theme.locationName;

            // Render Events List in Phone
            const eventsBox = document.getElementById('phoneEventsList');
            if (eventsBox && theme.events) {
                eventsBox.innerHTML = theme.events.map(ev => `
                    <div class="p-3 rounded-xl bg-white shadow-sm border border-ink/10">
                        <b class="text-xs font-bold text-ink block">${ev.title}</b>
                        <p class="text-[10.5px] text-accent mt-0.5">📅 ${ev.date} • ${ev.time}</p>
                        <p class="text-[10px] text-ink3 mt-0.5">📍 ${ev.place}</p>
                    </div>
                `).join('');
            }

            // Update category pills inside modal
            document.querySelectorAll('#previewCategoryTabs button').forEach(btn => {
                if (btn.getAttribute('onclick')?.includes(theme.catKey)) {
                    btn.classList.add('bg-brand', 'text-white', 'border-brand');
                    btn.classList.remove('bg-white', 'text-ink');
                } else {
                    btn.classList.remove('bg-brand', 'text-white', 'border-brand');
                    btn.classList.add('bg-white', 'text-ink');
                }
            });
        }

        function openPhoneInvitation() {
            const cover = document.getElementById('previewCover');
            const content = document.getElementById('previewContent');
            const scrollBox = document.getElementById('phoneScreenScroll');
            const audioEl = document.getElementById('previewAudio');
            const musicIcon = document.getElementById('previewMusicIcon');

            if (cover && content) {
                cover.classList.add('hidden');
                content.classList.remove('hidden');
                if (scrollBox) scrollBox.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Autoplay music upon opening invitation
            if (audioEl) {
                const playPromise = audioEl.play();
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        if (musicIcon) {
                            musicIcon.classList.add('animate-spin');
                            musicIcon.textContent = '♫';
                        }
                    }).catch((err) => {
                        console.log('Audio autoplay deferral:', err);
                    });
                }
            }
        }

        function togglePreviewMusic(btn) {
            const audioEl = document.getElementById('previewAudio');
            const musicIcon = document.getElementById('previewMusicIcon') || btn?.querySelector('span');
            if (!audioEl) return;

            if (audioEl.paused) {
                const playPromise = audioEl.play();
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        if (musicIcon) {
                            musicIcon.classList.add('animate-spin');
                            musicIcon.textContent = '♫';
                        }
                    }).catch((err) => console.log('Audio play error:', err));
                }
            } else {
                audioEl.pause();
                if (musicIcon) {
                    musicIcon.classList.remove('animate-spin');
                    musicIcon.textContent = '⏸';
                }
            }
        }

        function orderCurrentPreviewTheme() {
            const theme = themePreviews[currentPreviewSlug];
            closeThemePreview();
            if (theme) {
                selectThemeAndOrder(theme.name, theme.packageVal, theme.category);
            }
        }

        function consultPreviewViaWhatsApp() {
            const theme = themePreviews[currentPreviewSlug];
            const name = theme ? theme.name : 'Undangan Digital';
            const cat = theme ? theme.category : 'Umum';
            const text = `Halo Admin *D'Karsa*, saya sedang melihat preview tema *${name}* (Kategori: ${cat}) di website. Saya ingin bertanya lebih lanjut tentang pemesanan tema ini.`;
            window.open(`https://wa.me/6281234567890?text=${encodeURIComponent(text)}`, '_blank');
        }

        function switchPreviewByCategory(category) {
            const foundKey = previewKeys.find(k => themePreviews[k].catKey === category);
            if (foundKey) {
                openThemePreviewModal(foundKey);
            }
        }

        function navPreviewTheme(dir) {
            let idx = previewKeys.indexOf(currentPreviewSlug);
            idx = (idx + dir + previewKeys.length) % previewKeys.length;
            openThemePreviewModal(previewKeys[idx]);
        }

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeThemePreview();
        });

        // Close on backdrop click
        document.getElementById('themePreviewModal')?.addEventListener('click', (e) => {
            if (e.target.id === 'themePreviewModal') closeThemePreview();
        });
    </script>
@endpush