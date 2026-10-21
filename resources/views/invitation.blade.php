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

        const catalogCategoryAliases = {
            'semua': ['semua'],
            'pernikahan': ['pernikahan', 'wedding'],
            'tahlilan': ['tahlilan', 'doa bersama'],
            'halalbihalal': ['halalbihalal', 'halal bihalal'],
            'khitanan': ['khitanan', 'khitan', 'sunat'],
            'aqiqah': ['aqiqah', 'tasmiyah', 'baby'],
            'ultah': ['ultah', 'ulang tahun', 'birthday', 'milad'],
            'wisuda': ['wisuda', 'graduate', 'graduation', 'sarjana'],
            'formal': ['formal', 'acara formal', 'seminar', 'workshop', 'corporate', 'reuni'],
            'syukuran': ['syukuran', 'selamatan', 'rumah baru']
        };

        function applyCatalogFilters() {
            const selCat = (currentSelectedCategory || 'semua').toLowerCase();
            const allowedKeywords = catalogCategoryAliases[selCat] || [selCat];

            document.querySelectorAll('#catalogGrid .theme-card').forEach(card => {
                const cardCat = (card.dataset.category || '').toLowerCase();
                const cardTier = card.dataset.tier || '';

                const matchCat = (selCat === 'semua' || cardCat === 'semua' || cardCat === selCat || allowedKeywords.some(kw => cardCat.includes(kw)));
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
        function selectThemeAndOrder(themeName, packageVal, eventCat, subCat) {
            const params = new URLSearchParams();
            if (eventCat) params.append('category', eventCat);
            if (subCat) params.append('sub_category', subCat);
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
                subCat: 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Nuansa keraton Jawa klasik dengan animasi gunungan 3D, gending halus & doa restu.',
                coverBadge: 'WALIMATUL URUSY',
                coverSubtitle: 'The Wedding of',
                coverTitle: 'Rizky & Amanda',
                coverDate: 'Sabtu, 20 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700&q=80&auto=format&fit=crop',
                quoteIcon: '♥',
                quoteTitle: 'QS. Ar-Rum: 21',
                quoteBody: '"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."',
                profileBadge: 'Mempelai Bahagia',
                profileName: 'Rizky Pratama, S.T. & Amanda Putri, S.Ds.',
                profileDesc: 'Putra Bpk. Hendra & Ibu Rina — Putri Bpk. Sastro & Ibu Hartati',
                locationName: 'Grand Ballroom Hotel Mulia, Senayan',
                events: [
                    { title: 'Akad Nikah', time: '08:00 - 10:00 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Masjid Agung Al-Ikhlas' },
                    { title: 'Resepsi Pernikahan', time: '11:00 - 14:00 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Grand Ballroom Hotel Mulia' }
                ],
                giftTitle: '💳 Tanda Kasih / Amplop Digital',
                giftDesc: 'Doa restu Anda adalah karunia terindah, jika ingin memberikan tanda kasih dapat melalui:',
                wishTitle: 'Ucapan & Doa Restu'
            },
            'simple-minimalist-floral': {
                name: 'Simple Minimalist Floral',
                category: 'Pernikahan',
                subCat: 'Minimalis modern',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Desain pernikahan bersih, minimalis & rapi dengan tipografi anggun, tata letak esensial & harga paling hemat.',
                coverBadge: 'WALIMATUL URUSY',
                coverSubtitle: 'The Wedding of',
                coverTitle: 'Aditya & Ratna',
                coverDate: 'Ahad, 14 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700',
                quoteIcon: '🌿',
                quoteTitle: 'QS. An-Nur: 32',
                quoteBody: '"Dan nikahkanlah orang-orang yang masih membujang di antara kamu... Jika mereka miskin, Allah akan memberi kemampuan kepada mereka dengan karunia-Nya."',
                profileBadge: 'Mempelai Bahagia',
                profileName: 'Aditya Pratama & Ratna Sari',
                profileDesc: 'Putra Bpk. Hartono & Ibu Sumiati — Putri Bpk. Wahyudi & Ibu Sri Lestari',
                locationName: 'Gedung Pertemuan Graha Sarina, Surakarta',
                events: [
                    { title: 'Akad Nikah', time: '08:00 - 10:00 WIB', date: 'Ahad, 14 Juni 2026', place: 'Masjid Agung Solo' },
                    { title: 'Syukuran & Resepsi', time: '11:00 - 14:00 WIB', date: 'Ahad, 14 Juni 2026', place: 'Graha Sarina Main Hall' }
                ],
                giftTitle: '💳 Tanda Kasih / Amplop Digital',
                giftDesc: 'Doa restu Anda adalah karunia terindah, jika ingin memberikan tanda kasih dapat melalui:',
                wishTitle: 'Ucapan & Doa Restu'
            },
            'chibi-red': {
                name: 'Chibi Red Oriental',
                category: 'Pernikahan',
                subCat: 'Minimalis modern',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Oriental Red',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Desain pernikahan oriental modern Chibi Red: kaligrafi merah emas, Song Hỷ badge (囍), kalender tanggal interaktif, galeri silinder 3D, dan amplop digital angpao.',
                coverBadge: 'LỄ THÀNH HÔN • THE WEDDING',
                coverSubtitle: 'Together with our families',
                coverTitle: 'Rizky & Amanda',
                coverDate: 'Sabtu, 20 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=700&q=80&auto=format&fit=crop',
                quoteIcon: '囍',
                quoteTitle: 'Janji Suci Dua Hati',
                quoteBody: '"Dan di antara tanda-tanda kebesaran-Nya diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri agar kamu merasa tenteram bersamanya."',
                profileBadge: 'Mempelai Bahagia',
                profileName: 'Rizky Pratama, S.Kom & Amanda Putri, S.Ds',
                profileDesc: 'Putra Bpk. Hendra Pratama & Putri Bpk. Surya Wijaya',
                locationName: 'Grand Oriental Ballroom, Hotel Mulia Jakarta',
                events: [
                    { title: 'Akad Nikah / Lễ Vu Quy', time: '08:30 - 10:30 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Masjid Raya Al-Azhar Senayan' },
                    { title: 'Resepsi Pernikahan / Lễ Thành Hôn', time: '11:30 - 14:30 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Grand Oriental Ballroom, Hotel Mulia' }
                ],
                giftTitle: '🧧 Angpao Digital & Tanda Kasih',
                giftDesc: 'Doa restu Anda adalah karunia terindah bagi kami. Jika ingin memberikan tanda kasih atau angpao digital:',
                wishTitle: 'Untaian Doa & Ucapan Bahagia'
            },
            'chibi-red-oriental': {
                name: 'Chibi Red Oriental',
                category: 'Pernikahan',
                subCat: 'Minimalis modern',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Oriental Red',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Desain pernikahan oriental modern Chibi Red: kaligrafi merah emas, Song Hỷ badge (囍), kalender tanggal interaktif, galeri silinder 3D, dan amplop digital angpao.',
                coverBadge: 'LỄ THÀNH HÔN • THE WEDDING',
                coverSubtitle: 'Together with our families',
                coverTitle: 'Rizky & Amanda',
                coverDate: 'Sabtu, 20 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=700&q=80&auto=format&fit=crop',
                quoteIcon: '囍',
                quoteTitle: 'Janji Suci Dua Hati',
                quoteBody: '"Dan di antara tanda-tanda kebesaran-Nya diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri agar kamu merasa tenteram bersamanya."',
                profileBadge: 'Mempelai Bahagia',
                profileName: 'Rizky Pratama, S.Kom & Amanda Putri, S.Ds',
                profileDesc: 'Putra Bpk. Hendra Pratama & Putri Bpk. Surya Wijaya',
                locationName: 'Grand Oriental Ballroom, Hotel Mulia Jakarta',
                events: [
                    { title: 'Akad Nikah / Lễ Vu Quy', time: '08:30 - 10:30 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Masjid Raya Al-Azhar Senayan' },
                    { title: 'Resepsi Pernikahan / Lễ Thành Hôn', time: '11:30 - 14:30 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Grand Oriental Ballroom, Hotel Mulia' }
                ],
                giftTitle: '🧧 Angpao Digital & Tanda Kasih',
                giftDesc: 'Doa restu Anda adalah karunia terindah bagi kami. Jika ingin memberikan tanda kasih atau angpao digital:',
                wishTitle: 'Untaian Doa & Ucapan Bahagia'
            },
            'wildflower-pink': {
                name: 'Wildflower Pink',
                category: 'Pernikahan',
                subCat: 'Elegan, floral, dan islami',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Desain pernikahan modern Wildflower Pink: bingkai kubah lengkung, wax seal berdenyut, kaligrafi anggun & efek kelopak bunga jatuh.',
                coverBadge: 'THE WEDDING OF',
                coverSubtitle: 'Together with our families',
                coverTitle: 'Rian & Dania',
                coverDate: 'Sabtu, 22 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=700',
                quoteIcon: '🌸',
                quoteTitle: 'Rose Romance',
                quoteBody: '"Dua hati bersatu dalam janji suci pernikahan, melangkah bersama dalam ikatan cinta dan ridha Ilahi."',
                profileBadge: 'Pasangan Berbahagia',
                profileName: 'dr. Rian Nugraha & Dania Saraswati, S.Ked.',
                profileDesc: 'Putra Bpk. dr. Nugraha, Sp.A & Putri Bpk. Ir. Gunawan, M.T.',
                locationName: 'The Glass Pavilion Ballroom, Bandung',
                events: [
                    { title: 'Akad Nikah', time: '08:30 - 10:30 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Pavilion Glass Chapel' },
                    { title: 'Gala Resepsi & Dinner', time: '18:30 - 21:00 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Grand Ballroom Pavilion' }
                ],
                giftTitle: '💳 Amplop Digital & Kado Pernikahan',
                giftDesc: 'Doa restu Bapak/Ibu/Saudara/i adalah hadiah terindah. Jika ingin mengirimkan tanda kasih:',
                wishTitle: 'Untaian Doa & Harapan Indah'
            },
            'elegant-rose-romance': {
                name: 'Elegant Rose Romance',
                category: 'Pernikahan',
                subCat: 'Elegan, floral, dan islami',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Desain pernikahan modern Wildflower Pink: bingkai kubah lengkung, wax seal berdenyut, kaligrafi anggun & efek kelopak bunga jatuh.',
                coverBadge: 'THE WEDDING OF',
                coverSubtitle: 'Together with our families',
                coverTitle: 'Rian & Dania',
                coverDate: 'Sabtu, 22 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=700',
                quoteIcon: '🌸',
                quoteTitle: 'Rose Romance',
                quoteBody: '"Dua hati bersatu dalam janji suci pernikahan, melangkah bersama dalam ikatan cinta dan ridha Ilahi."',
                profileBadge: 'Pasangan Berbahagia',
                profileName: 'dr. Rian Nugraha & Dania Saraswati, S.Ked.',
                profileDesc: 'Putra Bpk. dr. Nugraha, Sp.A & Putri Bpk. Ir. Gunawan, M.T.',
                locationName: 'The Glass Pavilion Ballroom, Bandung',
                events: [
                    { title: 'Akad Nikah', time: '08:30 - 10:30 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Pavilion Glass Chapel' },
                    { title: 'Gala Resepsi & Dinner', time: '18:30 - 21:00 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Grand Ballroom Pavilion' }
                ],
                giftTitle: '💳 Amplop Digital & Kado Pernikahan',
                giftDesc: 'Doa restu Bapak/Ibu/Saudara/i adalah hadiah terindah. Jika ingin mengirimkan tanda kasih:',
                wishTitle: 'Untaian Doa & Harapan Indah'
            },
            'snowfall-minimalist-white': {
                name: 'SnowFall Minimalist White',
                category: 'Pernikahan',
                subCat: 'Minimalis modern',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Luxury',
                packageVal: 'Paket Luxury - Rp280.000',
                desc: 'Desain putih bersih bergaya editorial modern dengan efek partikel lembut dan video cover.',
                coverBadge: 'THE WEDDING CELEBRATION',
                coverSubtitle: 'The Wedding Celebration of',
                coverTitle: 'Bima & Laras',
                coverDate: 'Minggu, 12 Juli 2026',
                coverImg: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700',
                quoteIcon: '💍',
                quoteTitle: 'A Beautiful Beginning',
                quoteBody: '"True love stories never have endings, they are filled with endless grace, prayer, and mutual devotion."',
                profileBadge: 'Mempelai Bahagia',
                profileName: 'Bima Arya & Larasati Dewi',
                profileDesc: 'Putra Pertama Bpk. Bambang & Putri Kedua Bpk. Yulianto',
                locationName: 'The Glass House Garden, Bogor',
                events: [
                    { title: 'Holy Matrimony / Akad', time: '09:00 - 11:00 WIB', date: 'Minggu, 12 Juli 2026', place: 'Glass Chapel Pavilion' },
                    { title: 'Wedding Reception', time: '12:00 - 15:00 WIB', date: 'Minggu, 12 Juli 2026', place: 'Garden Terrace The Glass House' }
                ],
                giftTitle: '💳 Wedding Gift / Digital Envelope',
                giftDesc: 'Your presence and prayers are the greatest gift. If you wish to honor us with a gift:',
                wishTitle: 'Wishes & Blessings'
            },
            'batak-istimewa-heritage': {
                name: 'Batak Istimewa Heritage',
                category: 'Pernikahan',
                subCat: 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                catKey: 'pernikahan',
                badge: '💍 Pernikahan • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Ornamen ulos khas Batak dengan perpaduan warna marun & emas yang elegan dan sakral.',
                coverBadge: 'PAMASU-MASUON & UNJUK',
                coverSubtitle: 'Ulaon Unjuk & Pamasu-masuon',
                coverTitle: 'Faishal & Dhira',
                coverDate: 'Sabtu, 15 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=700&q=80&auto=format&fit=crop',
                quoteIcon: '🌺',
                quoteTitle: 'Dongan Tubu, Boru, Bere & Ibebere',
                quoteBody: '"Tumpak ma Debata mamasu-masu pardengganan on, marparbue ma holong nasida tu saleleng ni lelengna."',
                profileBadge: 'Pengantin Berbahagia',
                profileName: 'Faishal Hutapea & Dhira Simanjuntak',
                profileDesc: 'Anak ni Bpk. St. M. Hutapea & Boru ni Bpk. Ir. R. Simanjuntak',
                locationName: 'Wisma Batak Mulia Hall, Medan',
                events: [
                    { title: 'Pamasu-masuon', time: '08:30 - 10:30 WIB', date: 'Sabtu, 15 Agustus 2026', place: 'Gereja HKBP Sudirman' },
                    { title: 'Pesta Adat Batak & Resepsi', time: '11:00 - Selesai', date: 'Sabtu, 15 Agustus 2026', place: 'Wisma Batak Mulia' }
                ],
                giftTitle: '💳 Tanda Holong / Tumpak Digital',
                giftDesc: 'Tumpak ma Debata mamasu-masu pardengganan on. Molo adong roha ni dongan tubu mangalehon tanda holong:',
                wishTitle: 'Hata Sigabe-gabe & Tangiang'
            },
            'doa-bersama-tahlilan-khusyuk': {
                name: 'Doa Bersama & Tahlilan Khusyuk',
                category: 'Keagamaan',
                subCat: 'Doa bersama & tahlilan',
                catKey: 'tahlilan',
                badge: '🕯️ Doa Bersama • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Desain tahlilan & haul mengenang almarhum/almarhumah bernuansa teduh khusyuk, teks doa jelas, hemat dan sopan untuk sanak kerabat.',
                coverBadge: 'DOA BERSAMA & TAHLILAN',
                coverSubtitle: 'Mengenang 100 Hari Almarhum',
                coverTitle: 'Alm. Bpk. H. Soedirman Wibowo',
                coverDate: 'Kamis Malam Jumat, 28 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=700',
                quoteIcon: '🕯️',
                quoteTitle: 'Surat Al-Fajr: 27-30',
                quoteBody: '"Wahai jiwa yang tenang! Kembalilah kepada Tuhanmu dengan hati yang ridha dan diridhai-Nya. Maka masuklah ke dalam golongan hamba-hamba-Ku, dan masuklah ke dalam surga-Ku."',
                profileBadge: 'Almarhum Tercinta',
                profileName: 'Alm. Bpk. H. Soedirman Wibowo bin Sastro',
                profileDesc: 'Wafat pada 14 Syaban 1446 H • Semoga Allah melapangkan kuburnya dan menempatkan di sisi-Nya.',
                locationName: 'Kediaman Keluarga Besar Alm. Bpk. H. Soedirman',
                events: [
                    { title: 'Pembacaan Surat Yasin & Tahlil', time: '18:30 WIB (Ba\'da Maghrib) - Selesai', date: 'Kamis, 28 Mei 2026', place: 'Kediaman Keluarga Besar' },
                    { title: 'Tausiyah Khusyuk & Doa Arwah', time: '19:45 WIB (Ba\'da Isya) - 21:00 WIB', date: 'Kamis, 28 Mei 2026', place: 'Kediaman Keluarga Besar' }
                ],
                giftTitle: 'Sedekah Jariyah & Tali Asih',
                giftDesc: 'Bagi keluarga dan kerabat yang ingin menyalurkan sedekah jariyah / doa atas nama Almarhum:',
                wishTitle: 'Doa Khusyuk & Belasungkawa',
                audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
            },
            'green-mosque-harmony': {
                name: 'Green Mosque Harmony',
                category: 'Keagamaan',
                subCat: 'Pengajian',
                catKey: 'halalbihalal',
                badge: '🕌 Halal Bihalal • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan Halal Bihalal keluarga besar / kantor bernuansa hijau sage, kubah masjid & ayat suci.',
                coverBadge: 'SILATURAHMI IDUL FITRI 1447 H',
                coverSubtitle: 'Undangan Silaturahmi & Halal Bihalal',
                coverTitle: 'Keluarga Besar Bani Sastro',
                coverDate: 'Ahad, 12 April 2026',
                coverImg: 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=700',
                quoteIcon: '🕌',
                quoteTitle: 'Hadits Silaturahmi',
                quoteBody: '"Barangsiapa yang ingin dilapangkan rezekinya dan dipanjangkan umurnya, hendaklah ia menyambung tali silaturahmi." (HR. Bukhari & Muslim)',
                profileBadge: 'Tuan Rumah Silaturahmi',
                profileName: 'Keluarga Besar Bani Sastro',
                profileDesc: 'Tuan Rumah: Bpk. H. Ahmad Sastro & Ibu Hj. Siti Aminah',
                locationName: 'Graha Kencana Hall, Surabaya',
                events: [
                    { title: 'Tausiyah & Silaturahmi', time: '09:00 - 11:30 WIB', date: 'Ahad, 12 April 2026', place: 'Graha Kencana Main Hall' },
                    { title: 'Ramah Tamah & Makan Bersama', time: '11:30 - Selesai', date: 'Ahad, 12 April 2026', place: 'Dining Hall Graha Kencana' }
                ],
                giftTitle: 'Tali Asih & Infaq Silaturahmi',
                giftDesc: 'Silaturahmi dan kebersamaan adalah berkah utama. Jika ingin berpartisipasi dalam infaq silaturahmi:',
                wishTitle: 'Doa & Ucapan Silaturahmi',
                audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
            },
            'ketupat-raya-silaturahmi': {
                name: 'Ketupat Raya Silaturahmi',
                category: 'Keagamaan',
                subCat: 'Halal bihalal',
                catKey: 'halalbihalal',
                badge: '🕌 Halal Bihalal • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Desain silaturahmi Idul Fitri ceria dengan ornamen ketupat, jadwal halal bihalal & lokasi Google Maps.',
                coverBadge: 'HALAL BIHALAL KELUARGA BESAR',
                coverSubtitle: 'Silaturahmi Idul Fitri 1447 H',
                coverTitle: 'Keluarga Trah Marto Diharjo',
                coverDate: 'Senin, 13 April 2026',
                coverImg: 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700',
                quoteIcon: '✨',
                quoteTitle: 'Minal Aidin Wal Faizin',
                quoteBody: '"Semoga Allah menerima amal ibadah puasa kita dan senantiasa melimpahkan berkah persaudaraan."',
                profileBadge: 'Paguyuban Keluarga',
                profileName: 'Trah Marto Diharjo',
                profileDesc: 'Ketua Paguyuban: Bpk. Bambang Marto & Ibu Sri Rejeki',
                locationName: 'Pendopo Ndalem Ageng, Solo',
                events: [
                    { title: 'Temu Kangen & Sungkeman', time: '09:30 - 12:00 WIB', date: 'Senin, 13 April 2026', place: 'Pendopo Ndalem Ageng' },
                    { title: 'Santap Siang Bersama', time: '12:00 - 15:00 WIB', date: 'Senin, 13 April 2026', place: 'Pendopo Ndalem Ageng' }
                ],
                giftTitle: 'Partisipasi Acara / Kas Paguyuban',
                giftDesc: 'Tanda kasih untuk kas paguyuban keluarga dan kegiatan silaturahmi bersama:',
                wishTitle: 'Ucapan Maaf Lahir & Batin',
                audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
            },
            'walimatul-khitan-berkah-sholeh': {
                name: 'Walimatul Khitan Berkah Sholeh',
                category: 'Aqiqah',
                subCat: 'Tasyakuran khitanan',
                catKey: 'khitanan',
                badge: '✂️ Khitanan • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan syukuran khitanan islami dengan foto jagoan kecil, doa anak sholeh & amplop digital.',
                coverBadge: 'WALIMATUL KHITAN',
                coverSubtitle: 'Syukuran & Walimatul Khitan',
                coverTitle: 'M. Rayyan Al-Fatih',
                coverDate: 'Ahad, 17 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700',
                quoteIcon: '✂️',
                quoteTitle: 'Doa Walimatul Khitan',
                quoteBody: '"Ya Allah, berkahilah khitanan putra kami, jadikanlah ia anak yang sholeh, berbakti kepada kedua orang tua dan bermanfaat bagi sesama."',
                profileBadge: 'Jagoan Sholeh yang Dikhitan',
                profileName: 'Muhammad Rayyan Al-Fatih',
                profileDesc: 'Putra Tercinta dari Bpk. Hendra Gunawan & Ibu Rina Wijaya',
                locationName: 'Gedung Serbaguna Al-Falah, Bandung',
                events: [
                    { title: 'Tasyakuran & Doa Khitan', time: '10:00 - 12:00 WIB', date: 'Ahad, 17 Mei 2026', place: 'Auditorium Al-Falah' },
                    { title: 'Ramah Tamah & Hadroh', time: '12:00 - 14:30 WIB', date: 'Ahad, 17 Mei 2026', place: 'Hall Serbaguna Al-Falah' }
                ],
                giftTitle: 'Tali Asih / Hadiah Khitanan',
                giftDesc: 'Doa restu adalah karunia terbaik bagi jagoan kami. Jika ingin memberikan tanda kasih untuk khitanan:',
                wishTitle: 'Doa & Ucapan Selamat Khitan',
                audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
            },
            'little-prince-safari-khitan': {
                name: 'Little Prince Safari Khitan',
                category: 'Aqiqah',
                subCat: 'Tasyakuran khitanan',
                catKey: 'khitanan',
                badge: '✂️ Khitanan • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Tema khitanan anak yang ceria dan penuh petualangan, lengkap dengan link nama teman & keluarga.',
                coverBadge: 'KHITANAN JAGOAN KECIL',
                coverSubtitle: 'Tasyakuran Khitanan Putra Kami',
                coverTitle: 'Kenzo Alvaro Pratama',
                coverDate: 'Minggu, 24 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700',
                quoteIcon: '👑',
                quoteTitle: 'Anak Hebat & Pemberani',
                quoteBody: '"Selamat untuk jagoan cilik kita yang telah dikhitan! Semoga tumbuh cerdas, sholeh, dan ceria selalu."',
                profileBadge: 'Jagoan Pemberani',
                profileName: 'Kenzo Alvaro Pratama',
                profileDesc: 'Putra dari Bpk. Dimas Pratama & Ibu Maya Anggraini',
                locationName: 'Kidz Playground Garden, Tangerang',
                events: [
                    { title: 'Tasyakuran & Dongeng Anak', time: '10:00 - 12:00 WIB', date: 'Minggu, 24 Mei 2026', place: 'Kidz Playground Hall' },
                    { title: 'Makan Bersama & Goodie Bag', time: '12:00 - 14:00 WIB', date: 'Minggu, 24 Mei 2026', place: 'Kidz Garden Area' }
                ],
                giftTitle: 'Kado Khitanan Anak',
                giftDesc: 'Bagi teman-teman dan keluarga yang ingin memberikan kado atau tali asih untuk Kenzo:',
                wishTitle: 'Pesan & Ucapan Semangat',
                audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
            },
            'sweet-baby-pastel-aqiqah': {
                name: 'Sweet Baby Pastel Aqiqah',
                category: 'Aqiqah',
                subCat: 'Aqiqah anak',
                catKey: 'aqiqah',
                badge: '👶 Aqiqah • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Tasyakuran kelahiran & aqiqah buah hati dengan warna pastel lembut, doa penyejuk hati & peta acara.',
                coverBadge: 'TASYAKURAN AQIQAH & TASMIYAH',
                coverSubtitle: 'Tasyakuran Kelahiran & Aqiqah',
                coverTitle: 'Dania Azkadina Putri',
                coverDate: 'Sabtu, 2 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700',
                quoteIcon: '👶',
                quoteTitle: 'Doa Keberkahan Aqiqah',
                quoteBody: '"Semoga Allah memberkahimu atas buah hati yang dianugerahkan kepadamu, engkau bersyukur kepada Sang Maha Pemberi, dan ia tumbuh dewasa dalam kebaikan."',
                profileBadge: 'Buah Hati Tercinta',
                profileName: 'Dania Azkadina Putri',
                profileDesc: 'Arti Nama: Gadis cerdas pembawa berkah. Putri Bpk. Rizky & Ibu Nabila',
                locationName: 'Kediaman Bpk. Rizky & Ibu Nabila',
                events: [
                    { title: 'Prosesi Tasmiyah & Cukur Rambut', time: '09:00 - 10:30 WIB', date: 'Sabtu, 2 Mei 2026', place: 'Kediaman Keluarga' },
                    { title: 'Doa Bersama & Santap Siang', time: '10:30 - 13:00 WIB', date: 'Sabtu, 2 Mei 2026', place: 'Kediaman Keluarga' }
                ],
                giftTitle: 'Kado Buah Hati & Amplop Kasih',
                giftDesc: 'Doa Anda adalah anugerah terbesar bagi malaikat kecil kami. Jika ingin memberikan tanda kasih:',
                wishTitle: 'Doa Keberkahan untuk Buah Hati',
                audioSrc: '{{ asset("audio/lullaby-melody.wav") }}'
            },
            'golden-luxury-birthday-milad': {
                name: 'Golden Luxury Birthday / Milad',
                category: 'Ulang Tahun',
                subCat: 'Sweet seventeen',
                catKey: 'ultah',
                badge: '🎂 Ulang Tahun • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Perayaan sweet seventeen / anniversary / milad dengan ornamen emas berkilau dan RSVP kehadiran tamu.',
                coverBadge: 'YOU\'RE INVITED TO CELEBRATE',
                coverSubtitle: 'Sweet 17th Birthday Celebration',
                coverTitle: 'Jessica Olivia Sweet 17th',
                coverDate: 'Sabtu, 18 Juli 2026',
                coverImg: 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700',
                quoteIcon: '🎉',
                quoteTitle: 'Celebrate Moments with Joy',
                quoteBody: '"Count your age by friends, not years. Terima kasih sudah menjadi sahabat terbaik dalam hidupku!"',
                profileBadge: 'Birthday Star',
                profileName: 'Jessica Olivia Santoso',
                profileDesc: 'Sweet 17th Birthday Bash • Dress Code: Glam in Black & Gold',
                locationName: 'Sky Lounge Rooftop Cafe, Jakarta',
                events: [
                    { title: 'Welcoming & Red Carpet Photo', time: '18:30 - 19:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Sky Lounge Photo Booth' },
                    { title: 'Dinner, Games & DJ Performance', time: '19:30 - 22:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Sky Lounge Main Hall' }
                ],
                giftTitle: 'Birthday Gift / Cashless Envelope',
                giftDesc: 'Kehadiran teman-teman adalah kado terbaik! Bagi yang ingin mengirimkan birthday gift:',
                wishTitle: 'Birthday Wishes & Greetings',
                audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
            },
            'wisuda-sarjana-prestasi-emas': {
                name: 'Wisuda Sarjana Prestasi Emas',
                category: 'Wisuda',
                subCat: 'Wisuda kuliah',
                catKey: 'wisuda',
                badge: '🎓 Wisuda • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Perayaan wisuda sarjana berprestasi dengan foto toga resmi, jadwal sidang dan peta acara.',
                coverBadge: 'GRADUATION CELEBRATION',
                coverSubtitle: 'Syukuran Kelulusan & Wisuda',
                coverTitle: 'Farhan Maulana, S.Kom.',
                coverDate: 'Sabtu, 19 September 2026',
                coverImg: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700',
                quoteIcon: '🎓',
                quoteTitle: 'Perjuangan & Rasa Syukur',
                quoteBody: '"Alhamdulillah atas karunia gelar Sarjana Komputer (S.Kom). Terima kasih tak terhingga untuk kedua orang tua, dosen, dan sahabat tercinta yang selalu mendukung."',
                profileBadge: 'Wisudawan Berprestasi',
                profileName: 'Farhan Maulana, S.Kom.',
                profileDesc: 'Sarjana Ilmu Komputer • Universitas Indonesia (IPK 3.89 - Magna Cum Laude)',
                locationName: 'Balairung Universitas & Grand Mercure Hall',
                events: [
                    { title: 'Sidang Terbuka Wisuda Sarjana', time: '08:00 - 11:30 WIB', date: 'Sabtu, 19 September 2026', place: 'Balairung Utama Kampus' },
                    { title: 'Tasyakuran & Ramah Tamah Keluarga', time: '13:00 - 16:00 WIB', date: 'Sabtu, 19 September 2026', place: 'Grand Mercure Ballroom C' }
                ],
                giftTitle: '🎁 Hadiah Wisuda & Kado Virtual',
                giftDesc: 'Kehadiran dan ucapan selamat adalah hadiah paling berharga. Bagi kerabat yang ingin memberikan kado wisuda:',
                wishTitle: 'Ucapan Selamat & Doa Sukses',
                audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
            },
            'executive-corporate-grand-opening': {
                name: 'Executive Corporate & Grand Opening',
                category: 'Acara Formal',
                subCat: 'Grand opening bisnis',
                catKey: 'formal',
                badge: '🏛️ Acara Formal • Eksklusif',
                packageVal: 'Paket Eksklusif - Rp180.000',
                desc: 'Tata letak arsitektural minimalis premium untuk peresmian bisnis, seminar eksekutif & gala dinner perusahaan.',
                coverBadge: 'CORDIALLY INVITED',
                coverSubtitle: 'Grand Opening & Gala Dinner',
                coverTitle: 'PT Nusantara Digital Solusindo',
                coverDate: 'Senin, 5 Oktober 2026',
                coverImg: 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700',
                quoteIcon: '🏛️',
                quoteTitle: 'Inovasi Tanpa Batas',
                quoteBody: '"Bersama melangkah menuju era transformasi digital baru. Kami mengundang rekan bisnis, investor, dan mitra strategis dalam peresmian kantor pusat kami."',
                profileBadge: 'Tuan Rumah / Dewan Direksi',
                profileName: 'Direksi PT Nusantara Digital Solusindo',
                profileDesc: 'Office Tower Thamrin Nine Lt. 42, Jakarta Pusat',
                locationName: 'Grand Ballroom Ritz-Carlton Pacific Place',
                events: [
                    { title: 'Press Conference & Ribbon Cutting Ceremony', time: '09:00 - 11:30 WIB', date: 'Senin, 5 Oktober 2026', place: 'Lobby Tower Thamrin Nine' },
                    { title: 'Executive Gala Dinner & Networking', time: '18:30 - 21:30 WIB', date: 'Senin, 5 Oktober 2026', place: 'Grand Ballroom Ritz-Carlton' }
                ],
                giftTitle: 'Karangan Bunga & Ucapan Kemitraan',
                giftDesc: 'Kehadiran Anda adalah kehormatan bagi kami. Untuk konfirmasi pengiriman karangan bunga ucapan atau cinderamata kemitraan:',
                wishTitle: 'Ucapan Selamat & Harapan Kemitraan',
                audioSrc: '{{ asset("audio/wedding-melody.wav") }}'
            },
            'tasyakuran-doa-rumah-baru': {
                name: 'Tasyakuran & Doa Rumah Baru',
                category: 'Keagamaan',
                subCat: 'Tasyakuran',
                catKey: 'syukuran',
                badge: '🎉 Syukuran • Basic',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Undangan syukuran rumah baru, tahlil, wisuda, atau doa bersama keluarga dan tetangga.',
                coverBadge: 'TASYAKURAN MENEMPATI RUMAH BARU',
                coverSubtitle: 'Tasyakuran & Doa Bersama',
                coverTitle: 'Keluarga Bpk. Bambang & Ibu Rini',
                coverDate: 'Sabtu, 6 Juni 2026',
                coverImg: 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700',
                quoteIcon: '🏡',
                quoteTitle: 'Baiti Jannati — Rumahku Surgaku',
                quoteBody: '"Ya Allah, jadikanlah rumah ini tempat yang penuh kedamaian, keberkahan rezeki, dan naungan kasih sayang."',
                profileBadge: 'Keluarga Tuan Rumah',
                profileName: 'Keluarga Bpk. Bambang Irawan',
                profileDesc: 'Cluster Grand Harmoni Blok D No. 12, Bekasi',
                locationName: 'Kediaman Baru Bpk. Bambang',
                events: [
                    { title: 'Doa Bersama & Khataman Quran', time: '16:00 - 18:00 WIB', date: 'Sabtu, 6 Juni 2026', place: 'Kediaman Baru' },
                    { title: 'Santap Malam & Ramah Tamah', time: '19:00 - Selesai', date: 'Sabtu, 6 Juni 2026', place: 'Kediaman Baru' }
                ],
                giftTitle: 'Tanda Syukur & Tali Asih',
                giftDesc: 'Doa restu dan kehadiran tetangga serta kerabat adalah keberkahan bagi rumah kami:',
                wishTitle: 'Doa Keberkahan Rumah & Keluarga',
                audioSrc: '{{ asset("audio/wedding-melody.wav") }}'
            },
            'reuni-akbar-temu-kangen': {
                name: 'Reuni Akbar & Temu Kangen',
                category: 'Acara Formal',
                subCat: 'Rapat dan gathering perusahaan',
                catKey: 'formal',
                badge: '🎉 Reuni • Premium',
                packageVal: 'Paket Premium - Rp110.000',
                desc: 'Undangan temu kangen alumni sekolah / kampus dengan konfirmasi kehadiran angkatan & galeri kenangan.',
                coverBadge: 'REUNI AKBAR SATU DEKADE',
                coverSubtitle: 'Temu Kangen & Reuni Akbar',
                coverTitle: 'Alumni SMAN 1 Angkatan 2015',
                coverDate: 'Sabtu, 8 Agustus 2026',
                coverImg: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700',
                quoteIcon: '🤝',
                quoteTitle: 'Merajut Kembali Persahabatan',
                quoteBody: '"Waktu boleh berlalu, tapi kenangan putih abu-abu akan selalu hidup di hati kita. Mari bersua dan bernostalgia bersama!"',
                profileBadge: 'Panitia Pelaksana Reuni',
                profileName: 'Ikatan Alumni SMAN 1 (2015)',
                profileDesc: 'Tema: "Kembali Bertemu, Mengukir Rindu" • Dresscode: Casual Vintage',
                locationName: 'Grand Convention Center Hall A, Yogyakarta',
                events: [
                    { title: 'Registrasi QR Code & Foyer', time: '09:00 - 10:30 WIB', date: 'Sabtu, 8 Agustus 2026', place: 'Grand Convention Foyer' },
                    { title: 'Nostalgia & Doa Bersama Guru', time: '10:30 - 15:00 WIB', date: 'Sabtu, 8 Agustus 2026', place: 'Grand Convention Hall A' }
                ],
                giftTitle: 'Kontribusi Acara & Kas Alumni',
                giftDesc: 'Partisipasi dan donasi konsumsi / kas alumni untuk kelancaran temu kangen satu dekade:',
                wishTitle: 'Salam Hangat & Jejak Kenangan',
                audioSrc: '{{ asset("audio/wedding-melody.wav") }}'
            }
        };

        themePreviews['wisuda-sarjana'] = themePreviews['wisuda-sarjana-prestasi-emas'];
        themePreviews['golden-birthday'] = themePreviews['golden-luxury-birthday-milad'];
        themePreviews['baby-aqiqah'] = themePreviews['sweet-baby-pastel-aqiqah'];
        themePreviews['formal-corporate'] = themePreviews['executive-corporate-grand-opening'];
        themePreviews['halal-bihalal'] = themePreviews['ketupat-raya-silaturahmi'];
        themePreviews['syukuran-rumah'] = themePreviews['tasyakuran-doa-rumah-baru'];

        // Aliases for slug variants
        themePreviews['modern-graduate-editorial'] = themePreviews['modern-graduate'];
        themePreviews['clean-tech-seminar-workshop'] = themePreviews['clean-seminar'];
        themePreviews['clean-tech-seminar'] = themePreviews['clean-seminar'];
        themePreviews['cheerful-confetti-birthday'] = themePreviews['cheerful-birthday'];
        themePreviews['green-mosque-syiar'] = themePreviews['green-mosque'];
        themePreviews['green-mosque-syiar-tabligh-akbar'] = themePreviews['green-mosque'];
        themePreviews['green-mosque-harmony'] = themePreviews['green-mosque'];
        themePreviews['walimatus-safar-mubarok'] = themePreviews['walimatus-safar'];
        themePreviews['walimatul-khitan'] = {
            name: 'Walimatul Khitan Berkah Sholeh',
            category: 'Aqiqah',
            subCat: 'Tasyakuran khitanan',
            catKey: 'khitanan',
            badge: '✂️ Khitanan • Premium',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Undangan syukuran khitanan islami dengan foto jagoan kecil, doa anak sholeh & amplop digital.',
            coverBadge: 'WALIMATUL KHITAN',
            coverSubtitle: 'Tasyakuran Putra Tercinta',
            coverTitle: 'Muhammad Rayyan Al-Ghifari',
            coverDate: 'Sabtu, 20 Juni 2026',
            coverImg: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700',
            quoteIcon: '✂️',
            quoteTitle: 'Menuju Generasi Sholeh',
            quoteBody: '"Khitan adalah sunnah mulia. Semoga ananda tumbuh menjadi putra yang sholeh, tangguh, dan berbakti."',
            profileBadge: 'Jagoan Cilik Tercinta',
            profileName: 'Muhammad Rayyan Al-Ghifari',
            profileDesc: 'Putra Bpk. Irfan Maulana & Ibu Nisa Rahmawati',
            locationName: 'Kediaman Keluarga & Gedung Pertemuan, Bandung',
            events: [
                { title: 'Doa Bersama & Tausiyah Khitanan', time: '09:00 - 10:30 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Kediaman Bpk. Irfan' },
                { title: 'Tasyakuran & Santap Siang', time: '10:30 - 13:00 WIB', date: 'Sabtu, 20 Juni 2026', place: 'Gedung Pertemuan Al-Muhajirin' }
            ],
            giftTitle: 'Tali Asih Si Jagoan Cilik',
            giftDesc: 'Doa dan kehadiran Anda adalah hadiah terindah. Bagi yang ingin mengirimkan tali asih:',
            wishTitle: 'Doa & Ucapan untuk Jagoan Cilik',
            audioSrc: '{{ asset("audio/lullaby-melody.wav") }}'
        };
        themePreviews['walimatul-khitan-berkah-sholeh'] = themePreviews['walimatul-khitan'];
        themePreviews['little-prince-safari-khitan'] = themePreviews['little-prince'];
        themePreviews['little-prince-nordic'] = themePreviews['little-prince'];
        themePreviews['little-prince-nordic-aqiqah'] = themePreviews['little-prince'];
        themePreviews['royal-tasmiyah-sultan'] = themePreviews['royal-tasmiyah'];
        themePreviews['royal-tasmiyah-aqiqah-sultan'] = themePreviews['royal-tasmiyah'];
        themePreviews['sweet-baby-pastel'] = themePreviews['sweet-baby-pastel-aqiqah'];

        themePreviews['kids-birthday'] = {
            name: 'Kids Birthday Party Balon Ceria',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun anak',
            catKey: 'ultah',
            badge: '🎈 Ultah Anak • Ceria',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Pesta ulang tahun anak penuh warna ceria, konfeti & balon: perayaan usia si kecil, rundown games seru, tiup lilin bersama sahabat, kado celengan ceria.',
            coverBadge: 'HAPPY BIRTHDAY PARTY',
            coverSubtitle: 'Ayo Bergembira Bersama!',
            coverTitle: 'Rayyan Arsakha (Turning 5)',
            coverDate: 'Minggu, 16 Agustus 2026',
            coverImg: 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=700',
            quoteIcon: '🎈',
            quoteTitle: 'Hari Penuh Ceria & Tawa',
            quoteBody: '"Ayo teman-teman tersayang, datang ya ke pesta ulang tahunku! Kita main games bareng, tiup lilin, dan bawa pulang goodie bag seru!"',
            profileBadge: 'The Birthday Boy',
            profileName: 'Rayyan Arsakha Pratama',
            profileDesc: 'Putra Tercinta Papa Irfan & Mama Nisa',
            locationName: 'Funworld Kids Party Room & Cafe, Mall Grand Galaxy',
            events: [
                { title: 'Games Seru & Pertunjukan Sulap', time: '15:30 - 16:30 WIB', date: 'Minggu, 16 Agustus 2026', place: 'Funworld Party Room' },
                { title: 'Tiup Lilin, Potong Kue & Goodie Bag', time: '16:30 - 18:00 WIB', date: 'Minggu, 16 Agustus 2026', place: 'Funworld Dining Area' }
            ],
            giftTitle: 'Celengan Ceria & Kado Mainan',
            giftDesc: 'Kehadiran dan senyum teman-teman adalah kado terindah:',
            wishTitle: 'Kartu Ucapan Selamat Ulang Tahun',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };
        themePreviews['kids-birthday-party-balon-ceria'] = themePreviews['kids-birthday'];

        themePreviews['cheerful-birthday'] = {
            name: 'Cheerful Confetti Birthday',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun anak & remaja',
            catKey: 'ultah',
            badge: '🎈 Ultah • Fun Minimalist',
            packageVal: 'Paket Basic - Rp50.000',
            desc: 'Desain ulang tahun ceria & hemat dengan aksen konfeti pastel, countdown jam pesta, rundown games seru, kado kadoan dan ucapan doa sahabat.',
            coverBadge: 'BIRTHDAY PARTY CELEBRATION',
            coverSubtitle: 'Ayo Bergembira Bersama!',
            coverTitle: 'Arkan Pratama (Turning 7)',
            coverDate: 'Sabtu, 18 Juli 2026',
            coverImg: 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=700',
            quoteIcon: '🎈',
            quoteTitle: 'Tawa & Kebahagiaan',
            quoteBody: '"Bertambah satu tahun usiaku penuh tawa, cerita, dan kebahagiaan. Yuk teman-teman hadir dan seru-seruan bareng di pesta ulang tahunku!"',
            profileBadge: 'The Birthday Boy',
            profileName: 'Muhammad Arkan Pratama',
            profileDesc: 'Putra Bpk. Rizky Pratama & Ibu Nabila Safitri',
            locationName: 'Kidz Playground & Family Cafe, Kemang',
            events: [
                { title: 'Games Seru & Pentas Sulap', time: '15:30 - 16:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Kidz Playground Hall' },
                { title: 'Tiup Lilin, Potong Kue & Goodie Bag', time: '16:30 - 18:00 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Kidz Playground Dining' }
            ],
            giftTitle: '🎁 Celengan Ceria & Kado',
            giftDesc: 'Kehadiran dan senyum teman-teman adalah kado terindah:',
            wishTitle: 'Kartu Ucapan Selamat Ulang Tahun',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['little-prince'] = {
            name: 'Little Prince Nordic Aqiqah',
            category: 'Aqiqah',
            subCat: 'Aqiqah & kelahiran buah hati',
            catKey: 'aqiqah',
            badge: '👶 Aqiqah • Basic Nordic',
            packageVal: 'Paket Basic - Rp50.000',
            desc: 'Desain aqiqah & tasmiyah minimalis gaya Skandinavia yang hangat: profil kelahiran, rincian tasyakuran kambing, doa penyejuk hati & peta kediaman.',
            coverBadge: 'TASYAKURAN AQIQAH & TASMIYAH',
            coverSubtitle: 'Welcoming Our Precious Blessing',
            coverTitle: 'Muhammad Rayyan Al-Fatih',
            coverDate: 'Ahad, 15 Maret 2026',
            coverImg: 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700',
            quoteIcon: '👶',
            quoteTitle: 'Doa Penyejuk Hati',
            quoteBody: '"Semoga Allah memberkahi buah hati kami, menjadikannya anak yang sholeh, berbakti kepada orang tua, cerdas, serta bermanfaat bagi sesama."',
            profileBadge: 'Buah Hati Tercinta',
            profileName: 'Muhammad Rayyan Al-Fatih',
            profileDesc: 'Putra Pertama Bpk. Fajar Ramadhan & Ibu Anisa Rahmawati',
            locationName: 'Kediaman Bpk. Fajar & Ibu Anisa, Bandung',
            events: [
                { title: 'Cukur Rambut & Doa Tasmiyah', time: '09:00 - 10:30 WIB', date: 'Ahad, 15 Maret 2026', place: 'Kediaman Keluarga' },
                { title: 'Tasyakuran Aqiqah & Santap Siang', time: '10:30 - 13:00 WIB', date: 'Ahad, 15 Maret 2026', place: 'Kediaman Keluarga' }
            ],
            giftTitle: '👶 Tali Kasih Buah Hati',
            giftDesc: 'Doa dan restu Anda adalah karunia terindah bagi keluarga kami:',
            wishTitle: 'Untaian Doa & Ucapan Selamat',
            audioSrc: '{{ asset("audio/lullaby-melody.wav") }}'
        };

        themePreviews['royal-tasmiyah'] = {
            name: 'Royal Tasmiyah & Aqiqah Sultan',
            category: 'Aqiqah',
            subCat: 'Tasmiyah & aqiqah',
            catKey: 'aqiqah',
            badge: '👑 Aqiqah • Royal Sultan',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemewahan tasyakuran pemberian nama (tasmiyah) & aqiqah buah hati beraksen zamrud royal & border emas keraton.',
            coverBadge: 'MAJELIS TASMIYAH & AQIQAH SULTAN',
            coverSubtitle: 'The Blessing of Royalty',
            coverTitle: 'Raden Mas Sultan Daniswara Al-Ghifari',
            coverDate: 'Sabtu, 25 April 2026',
            coverImg: 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=700',
            quoteIcon: '👑',
            quoteTitle: 'Bait Doa & Risalah Mulia',
            quoteBody: '"Rasa syukur tak terhingga atas anugerah putra tercinta. Semoga menjadi penerus risalah mulia, berbudi luhur, dan berilmu amaliyah."',
            profileBadge: 'Putra Sultan Tercinta',
            profileName: 'Raden Mas Sultan Daniswara',
            profileDesc: 'Putra Bpk. Dr. Danang Wibowo & Ibu Hj. Sekar Arum, M.Si',
            locationName: 'Pendopo Agung Ndalem Heritage, Kotagede',
            events: [
                { title: 'Prosesi Marhaba & Tasmiyah', time: '09:00 - 11:00 WIB', date: 'Sabtu, 25 April 2026', place: 'Pendopo Agung Ndalem' },
                { title: 'Tasyakuran Jamuan Tamu', time: '11:30 - 14:00 WIB', date: 'Sabtu, 25 April 2026', place: 'Gedung Bale Ndalem' }
            ],
            giftTitle: '👑 Tali Kasih Ananda',
            giftDesc: 'Doa restu Anda merupakan karunia terindah:',
            wishTitle: 'Untaian Doa & Restu',
            audioSrc: '{{ asset("audio/lullaby-melody.wav") }}'
        };

        themePreviews['green-mosque'] = {
            name: 'Green Mosque Syiar & Tabligh Akbar',
            category: 'Keagamaan',
            subCat: 'Pengajian & syiar',
            catKey: 'keagamaan',
            badge: '🕌 Syiar • Green Mosque',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain tabligh akbar & pengajian umum bernuansa kubah hijau zamrud Islami.',
            coverBadge: 'TABLIGH AKBAR & TAUSIYAH',
            coverSubtitle: 'Menjemput Ridho Illahi',
            coverTitle: 'K.H. Ahmad Syarifuddin, M.A.',
            coverDate: 'Sabtu, 9 Mei 2026',
            coverImg: 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=700',
            quoteIcon: '🕌',
            quoteTitle: 'Ukhuwah Islamiyah',
            quoteBody: '"Menuntut ilmu adalah kewajiban bagi setiap muslim. Mari rapatkan shaf dan raih keberkahan dalam majelis ilmu."',
            profileBadge: 'Penceramah Utama',
            profileName: 'K.H. Ahmad Syarifuddin, M.A.',
            profileDesc: 'Pengasuh Pondok Pesantren & Dai Nasional',
            locationName: 'Masjid Raya Al-Hikmah, Kebayoran Baru',
            events: [
                { title: 'Shalat Berjamaah & Dzikir', time: '19:00 - 20:00 WIB', date: 'Sabtu, 9 Mei 2026', place: 'Ruang Utama Masjid' },
                { title: 'Tausiyah Akbar & Doa Bersama', time: '20:00 - 22:00 WIB', date: 'Sabtu, 9 Mei 2026', place: 'Ruang Utama Masjid' }
            ],
            giftTitle: '🕌 Infaq Dakwah & Masjid',
            giftDesc: 'Infaq dan shadaqah untuk operasional dakwah:',
            wishTitle: 'Doa Jamaah & Kehadiran',
            audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
        };

        themePreviews['walimatus-safar'] = {
            name: 'Walimatus Safar Haji & Umrah Mubarok',
            category: 'Keagamaan',
            subCat: 'Walimatus safar haji & umrah',
            catKey: 'keagamaan',
            badge: '🕋 Haji & Umrah • Eksklusif',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemuliaan safar ke Baitullah bernuansa Ka\'bah Kiswah hitam & emas kaligrafi.',
            coverBadge: 'WALIMATUS SAFAR HAJI & UMRAH',
            coverSubtitle: 'Labbaik Allahumma Labbaik',
            coverTitle: 'Bpk. H. Bambang Hermanto & Istri',
            coverDate: 'Ahad, 17 Mei 2026',
            coverImg: 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=700',
            quoteIcon: '🕋',
            quoteTitle: 'Baitullah Al-Haram',
            quoteBody: '"Labbaik Allahumma Labbaik. Mohon dimaafkan segala khilaf lahir batin, dan doakan kami agar kembali membawa haji yang mabrur."',
            profileBadge: 'Calon Jamaah Haji',
            profileName: 'Bpk. H. Bambang Hermanto & Ibu Hj. Siti',
            profileDesc: 'Calon Jamaah Haji Kloter 14 JKS',
            locationName: 'Kediaman Bpk. Bambang & Aula Al-Kautsar',
            events: [
                { title: 'Pengajian & Tausiyah Pelepasan', time: '09:00 - 11:00 WIB', date: 'Ahad, 17 Mei 2026', place: 'Aula Al-Kautsar' },
                { title: 'Ramah Tamah Pamitan', time: '11:00 - 13:00 WIB', date: 'Ahad, 17 Mei 2026', place: 'Kediaman Keluarga' }
            ],
            giftTitle: '🕋 Titip Doa & Sedekah Safar',
            giftDesc: 'Titipan doa dan sedekah safar menuju tanah suci:',
            wishTitle: 'Untaian Doa Mabrur',
            audioSrc: '{{ asset("audio/islamic-melody.wav") }}'
        };

        themePreviews['modern-graduate'] = {
            name: 'Modern Graduate Editorial',
            category: 'Wisuda',
            subCat: 'Wisuda sarjana',
            catKey: 'wisuda',
            badge: '🎓 Wisuda • Basic Editorial',
            packageVal: 'Paket Basic - Rp50.000',
            desc: 'Desain wisuda minimalis monokrom gaya majalah editorial.',
            coverBadge: 'GRADUATION COMMENCEMENT',
            coverSubtitle: 'Class of 2026',
            coverTitle: 'Faris Al-Ghifari, S.T.',
            coverDate: 'Sabtu, 22 Agustus 2026',
            coverImg: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=700',
            quoteIcon: '🎓',
            quoteTitle: 'Langkah Awal Pengabdian',
            quoteBody: '"Sebuah akhir yang menjadi awal babak baru pengabdian. Terima kasih kepada orang tua dan sahabat tercinta."',
            profileBadge: 'The Graduate',
            profileName: 'Faris Al-Ghifari, S.T.',
            profileDesc: 'Sarjana Teknik Informatika • IPK 3.92 (Cum Laude)',
            locationName: 'Balairung Universitas Indonesia, Depok',
            events: [
                { title: 'Upacara Wisuda UI', time: '08:00 - 12:00 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Balairung Kampus UI' },
                { title: 'Syukuran & Sesi Foto', time: '13:00 - 16:00 WIB', date: 'Sabtu, 22 Agustus 2026', place: 'Plaza Rektorat UI' }
            ],
            giftTitle: '🎓 Apresiasi Sarjana',
            giftDesc: 'Kado apresiasi kelulusan sarjana:',
            wishTitle: 'Kartu Ucapan & Doa Sukses',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['scholar-luxury'] = {
            name: 'Valedictorian Scholar Luxury Gala',
            category: 'Wisuda',
            subCat: 'Wisuda sarjana & magister',
            catKey: 'wisuda',
            badge: '🎓 Wisuda • Valedictorian Gala',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Perayaan wisuda kehormatan ala Ivy League bernuansa midnight navy & emas royal.',
            coverBadge: 'VALEDICTORIAN COMMENCEMENT GALA',
            coverSubtitle: 'Honoring Academic Excellence',
            coverTitle: 'Kresna Adiputra, M.B.A., B.Eng',
            coverDate: 'Sabtu, 5 September 2026',
            coverImg: 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=700',
            quoteIcon: '🏆',
            quoteTitle: 'Excellence in Action',
            quoteBody: '"Excellence is not an act, but a habit. Syukur mendalam atas diraihnya predikat tertinggi."',
            profileBadge: 'Valedictorian Honor',
            profileName: 'Kresna Adiputra, M.B.A.',
            profileDesc: 'Valedictorian • Master of Business Administration',
            locationName: 'Grand Ballroom The Ritz-Carlton Mega Kuningan',
            events: [
                { title: 'Commencement Ceremony', time: '09:00 - 12:00 WIB', date: 'Sabtu, 5 September 2026', place: 'Plenary Hall JCC' },
                { title: 'Valedictorian Gala Dinner', time: '18:30 - 21:30 WIB', date: 'Sabtu, 5 September 2026', place: 'The Ritz-Carlton Ballroom' }
            ],
            giftTitle: '🏆 Scholar Fellowship',
            giftDesc: 'Tanda kasih fellowship & kehormatan wisuda:',
            wishTitle: 'Ucapan Rekan & Mitra',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['clean-seminar'] = {
            name: 'Clean Tech Seminar & Workshop',
            category: 'Acara Formal',
            subCat: 'Seminar & workshop',
            catKey: 'formal',
            badge: '🎙️ Seminar • Basic Tech',
            packageVal: 'Paket Basic - Rp50.000',
            desc: 'Desain simposium, lokakarya & seminar interaktif dengan barcode/QR.',
            coverBadge: 'NATIONAL TECH SUMMIT & WORKSHOP',
            coverSubtitle: 'Innovating Digital Ecosystem',
            coverTitle: 'Indonesia AI Summit 2026',
            coverDate: 'Kamis, 15 Oktober 2026',
            coverImg: 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=700',
            quoteIcon: '🎙️',
            quoteTitle: 'Visi Teknologi Masa Depan',
            quoteBody: '"Membangun ekosistem teknologi masa depan yang inklusif, etis, dan berdampak nyata."',
            profileBadge: 'Keynote Speaker',
            profileName: 'Dr. Aris Sudarsono',
            profileDesc: 'Principal AI Researcher & Founder TechLabs',
            locationName: 'Auditorium Menara Mandiri, Jakarta Selatan',
            events: [
                { title: 'Keynote Presentation', time: '09:00 - 11:30 WIB', date: 'Kamis, 15 Oktober 2026', place: 'Auditorium Utama' },
                { title: 'Technical Workshop', time: '13:00 - 16:00 WIB', date: 'Kamis, 15 Oktober 2026', place: 'Workshop Room 1' }
            ],
            giftTitle: '🎙️ Donasi Yayasan Summit',
            giftDesc: 'Dukungan penyelenggaraan konferensi:',
            wishTitle: 'Testimoni & RSVP Delegasi',
            audioSrc: '{{ asset("audio/wedding-melody.wav") }}'
        };

        themePreviews['reuni-akbar'] = {
            name: 'Reuni Akbar Sapphire Silver',
            category: 'Acara Formal',
            subCat: 'Reuni akbar',
            catKey: 'formal',
            badge: '🥂 Reuni • Sapphire Silver',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain temu kangen alumni bernuansa sapphire navy & silver.',
            coverBadge: 'REUNI AKBAR & GALA DINNER',
            coverSubtitle: 'Satu Dekade Bersama',
            coverTitle: 'Alumni SMAN 1 Angkatan 2016',
            coverDate: 'Sabtu, 24 Oktober 2026',
            coverImg: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700',
            quoteIcon: '🥂',
            quoteTitle: 'Nostalgia Putih Abu-Abu',
            quoteBody: '"Waktu berlalu begitu cepat, namun kenangan takkan pernah pudar. Mari merajut kembali tali silaturahmi."',
            profileBadge: 'Keluarga Alumni',
            profileName: 'Alumni SMAN 1 Angkatan 2016',
            profileDesc: 'Dresscode: Navy Blue & Touch of Silver',
            locationName: 'Grand Ballroom Hotel Mulia Senayan, Jakarta',
            events: [
                { title: 'Registrasi & Welcome Drink', time: '16:00 - 18:00 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'Foyer Grand Ballroom' },
                { title: 'Gala Dinner & Live Music', time: '19:00 - 22:00 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'Grand Ballroom Mulia' }
            ],
            giftTitle: '🥂 Kas Reuni & Donasi Alumni',
            giftDesc: 'Kontribusi donasi kas alumni & kegiatan sosial:',
            wishTitle: 'Pesan Sahabat Alumni',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        const audioTracks = {
            'pernikahan': '{{ asset("audio/wedding-melody.wav") }}',
            'tahlilan': '{{ asset("audio/islamic-melody.wav") }}',
            'halalbihalal': '{{ asset("audio/islamic-melody.wav") }}',
            'khitanan': '{{ asset("audio/lullaby-melody.wav") }}',
            'aqiqah': '{{ asset("audio/lullaby-melody.wav") }}',
            'ultah': '{{ asset("audio/celebration-melody.wav") }}',
            'wisuda': '{{ asset("audio/celebration-melody.wav") }}',
            'formal': '{{ asset("audio/wedding-melody.wav") }}',
            'syukuran': '{{ asset("audio/wedding-melody.wav") }}',
        };

        const categoryTemplates = {
            'pernikahan': [
                { slug: 'chibi-red', name: 'Chibi Red Oriental', tag: 'Oriental Red & 3D', icon: '囍', iconBg: 'bg-red-100 text-red-700', demoUrl: '/demo/chibi-red' },
                { slug: 'wildflower-pink', name: 'Wildflower Pink', tag: 'Kubah Lengkung & Lilin', icon: '🌸', iconBg: 'bg-pink-100 text-pink-700', demoUrl: '/demo/wildflower-pink' },
                { slug: '3d-javanese-royal', name: '3D Javanese Royal', tag: 'Keraton Gunungan 3D', icon: '👑', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/javanese-royal' },
                { slug: 'simple-minimalist-floral', name: 'Minimalist Floral', tag: 'Clean Editorial Modern', icon: '🌿', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/minimalist-floral' },
                { slug: 'snowfall-minimalist-white', name: 'SnowFall Minimalist', tag: 'Pure White Snowfall', icon: '❄️', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/snowfall-white' },
                { slug: 'batak-istimewa-heritage', name: 'Batak Istimewa', tag: 'Ulos Marun & Emas', icon: '🧣', iconBg: 'bg-rose-100 text-rose-800', demoUrl: '/demo/batak-heritage' }
            ],
            'keagamaan': [
                { slug: 'doa-bersama-tahlilan-khusyuk', name: 'Doa Bersama & Tahlilan', tag: 'Khusyuk & Sopan', icon: '🕯️', iconBg: 'bg-slate-100 text-slate-800', demoUrl: '/demo/tahlilan-khusyuk' },
                { slug: 'ketupat-raya-silaturahmi', name: 'Ketupat Raya Silaturahmi', tag: 'Halal Bihalal & Silaturahmi', icon: '✨', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/halal-bihalal' },
                { slug: 'tasyakuran-doa-rumah-baru', name: 'Tasyakuran Rumah Baru', tag: 'Syukuran & Doa Bersama', icon: '🏡', iconBg: 'bg-teal-100 text-teal-800', demoUrl: '/demo/syukuran-rumah' },
                { slug: 'green-mosque', name: 'Green Mosque Syiar', tag: 'Tabligh Akbar & Tausiyah', icon: '🕌', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/green-mosque' },
                { slug: 'walimatus-safar', name: 'Walimatus Safar Mubarok', tag: 'Haji & Umrah Ka\'bah Kiswah', icon: '🕋', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/walimatus-safar' }
            ],
            'aqiqah': [
                { slug: 'little-prince', name: 'Little Prince Nordic', tag: 'Aqiqah Bayi Nordic Basic', icon: '👶', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/little-prince' },
                { slug: 'sweet-baby-pastel-aqiqah', name: 'Sweet Baby Pastel', tag: 'Aqiqah Bayi & Tasmiyah', icon: '🍼', iconBg: 'bg-pink-100 text-pink-700', demoUrl: '/demo/baby-aqiqah' },
                { slug: 'walimatul-khitan-berkah-sholeh', name: 'Walimatul Khitan Berkah', tag: 'Khitanan Islami Sholeh', icon: '✂️', iconBg: 'bg-blue-100 text-blue-700', demoUrl: '/demo/walimatul-khitan' },
                { slug: 'royal-tasmiyah', name: 'Royal Tasmiyah Sultan', tag: 'Tasmiyah & Aqiqah Mewah', icon: '👑', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/royal-tasmiyah' }
            ],
            'wisuda': [
                { slug: 'modern-graduate', name: 'Modern Graduate Editorial', tag: 'Monokrom Majalah Basic', icon: '📜', iconBg: 'bg-slate-100 text-slate-800', demoUrl: '/demo/modern-graduate' },
                { slug: 'wisuda-sarjana-prestasi-emas', name: 'Wisuda Sarjana Emas', tag: 'Wisuda & Kelulusan', icon: '🎓', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/wisuda-sarjana' },
                { slug: 'scholar-luxury', name: 'Scholar Luxury Gala', tag: 'Valedictorian Ivy League', icon: '🏆', iconBg: 'bg-blue-100 text-blue-800', demoUrl: '/demo/scholar-luxury' }
            ],
            'ulang-tahun': [
                { slug: 'cheerful-birthday', name: 'Cheerful Confetti Birthday', tag: 'Pesta Ceria Fun Minimalist', icon: '🎉', iconBg: 'bg-orange-100 text-orange-800', demoUrl: '/demo/cheerful-birthday' },
                { slug: 'kids-birthday-party-balon-ceria', name: 'Kids Birthday Balon Ceria', tag: 'Pesta Ceria Anak & Games', icon: '🎈', iconBg: 'bg-pink-100 text-pink-700', demoUrl: '/demo/kids-birthday' },
                { slug: 'golden-luxury-birthday-milad', name: 'Golden Luxury Birthday', tag: 'Sweet 17th & Milad', icon: '🎂', iconBg: 'bg-yellow-100 text-yellow-800', demoUrl: '/demo/golden-birthday' }
            ],
            'acara-formal': [
                { slug: 'clean-seminar', name: 'Clean Tech Seminar & Workshop', tag: 'Simposium & Konferensi Basic', icon: '🎙️', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/clean-seminar' },
                { slug: 'reuni-akbar', name: 'Reuni Akbar Sapphire Silver', tag: 'Gala Dinner Alumni Navy', icon: '🥂', iconBg: 'bg-blue-100 text-blue-800', demoUrl: '/demo/reuni-akbar' },
                { slug: 'executive-corporate-grand-opening', name: 'Executive Corporate', tag: 'Grand Opening & Bisnis', icon: '🏢', iconBg: 'bg-indigo-100 text-indigo-800', demoUrl: '/demo/formal-corporate' }
            ]
        };

        let currentPreviewSlug = 'chibi-red';
        let currentCategoryKey = 'pernikahan';

        function detectCategoryKey(slug, theme) {
            const s = (slug || '').toLowerCase();
            const cat = theme && theme.category ? theme.category.toLowerCase() : '';
            const catKey = theme && theme.catKey ? theme.catKey.toLowerCase() : '';
            const sub = theme && theme.subCat ? theme.subCat.toLowerCase() : '';

            if (cat === 'keagamaan' || catKey === 'keagamaan' || catKey === 'tahlilan' || catKey === 'halalbihalal' || catKey === 'syukuran' 
                || s.includes('tahlil') || s.includes('doa') || s.includes('haul') || s.includes('mosque') || s.includes('ketupat') || s.includes('syukuran') || sub.includes('tahlil') || sub.includes('doa')) {
                return 'keagamaan';
            }
            if (cat === 'aqiqah' || catKey === 'aqiqah' || catKey === 'khitanan' || s.includes('aqiqah') || s.includes('khitan') || sub.includes('aqiqah') || sub.includes('khitan')) {
                return 'aqiqah';
            }
            if (cat === 'wisuda' || catKey === 'wisuda' || s.includes('wisuda') || s.includes('sarjana') || s.includes('graduate') || sub.includes('wisuda') || sub.includes('sarjana')) {
                return 'wisuda';
            }
            if (cat.includes('ulang tahun') || catKey === 'ultah' || s.includes('cheerful') || s.includes('confetti') || s.includes('birthday') || s.includes('milad') || s.includes('ultah') || s.includes('ulang')) {
                return 'ulang-tahun';
            }
            if (cat.includes('formal') || catKey === 'formal' || s.includes('seminar') || s.includes('workshop') || s.includes('corporate') || s.includes('reuni')) {
                return 'acara-formal';
            }
            return 'pernikahan';
        }

        // Direct Map of Canonical Slugs to Demo Routes
        const demoUrlMap = {
            'chibi-red': '/demo/chibi-red',
            'wildflower-pink': '/demo/wildflower-pink',
            '3d-javanese-royal': '/demo/javanese-royal',
            'javanese-royal': '/demo/javanese-royal',
            'simple-minimalist-floral': '/demo/minimalist-floral',
            'minimalist-floral': '/demo/minimalist-floral',
            'snowfall-minimalist-white': '/demo/snowfall-white',
            'snowfall-white': '/demo/snowfall-white',
            'batak-istimewa-heritage': '/demo/batak-heritage',
            'batak-heritage': '/demo/batak-heritage',
            'ketupat-raya-silaturahmi': '/demo/halal-bihalal',
            'halal-bihalal': '/demo/halal-bihalal',
            'green-mosque': '/demo/green-mosque',
            'green-mosque-syiar': '/demo/green-mosque',
            'green-mosque-harmony': '/demo/green-mosque',
            'green-mosque-syiar-tabligh-akbar': '/demo/green-mosque',
            'walimatus-safar': '/demo/walimatus-safar',
            'walimatus-safar-mubarok': '/demo/walimatus-safar',
            'walimatul-khitan-berkah-sholeh': '/demo/walimatul-khitan',
            'walimatul-khitan': '/demo/walimatul-khitan',
            'little-prince': '/demo/little-prince',
            'little-prince-nordic': '/demo/little-prince',
            'little-prince-nordic-aqiqah': '/demo/little-prince',
            'royal-tasmiyah': '/demo/royal-tasmiyah',
            'royal-tasmiyah-sultan': '/demo/royal-tasmiyah',
            'royal-tasmiyah-aqiqah-sultan': '/demo/royal-tasmiyah',
            'sweet-baby-pastel': '/demo/baby-aqiqah',
            'sweet-baby-pastel-aqiqah': '/demo/baby-aqiqah',
            'baby-aqiqah': '/demo/baby-aqiqah',
            'tasyakuran-doa-rumah-baru': '/demo/syukuran-rumah',
            'syukuran-rumah': '/demo/syukuran-rumah',
            'doa-bersama-tahlilan-khusyuk': '/demo/tahlilan-khusyuk',
            'tahlilan-khusyuk': '/demo/tahlilan-khusyuk',
            'modern-graduate': '/demo/modern-graduate',
            'modern-graduate-editorial': '/demo/modern-graduate',
            'wisuda-sarjana-prestasi-emas': '/demo/wisuda-sarjana',
            'wisuda-sarjana': '/demo/wisuda-sarjana',
            'scholar-luxury': '/demo/scholar-luxury',
            'cheerful-birthday': '/demo/cheerful-birthday',
            'cheerful-confetti-birthday': '/demo/cheerful-birthday',
            'kids-birthday-party-balon-ceria': '/demo/kids-birthday',
            'kids-birthday': '/demo/kids-birthday',
            'golden-luxury-birthday-milad': '/demo/golden-birthday',
            'golden-birthday': '/demo/golden-birthday',
            'clean-seminar': '/demo/clean-seminar',
            'clean-tech-seminar-workshop': '/demo/clean-seminar',
            'clean-tech-seminar': '/demo/clean-seminar',
            'reuni-akbar-temu-kangen': '/demo/reuni-akbar',
            'reuni-akbar': '/demo/reuni-akbar',
            'executive-corporate-grand-opening': '/demo/formal-corporate',
            'formal-corporate': '/demo/formal-corporate',
        };

        function renderCategorySelectorGrid(activeSlug, catKey) {
            const grid = document.getElementById('previewThemeSelectorGrid');
            const catBadge = document.getElementById('previewCategoryFilterLabel');
            if (!grid) return;

            const labelMap = {
                'pernikahan': '💍 Kategori: Pernikahan',
                'keagamaan': '🕯️ Kategori: Keagamaan',
                'aqiqah': '👶 Kategori: Aqiqah & Khitan',
                'wisuda': '🎓 Kategori: Wisuda',
                'ulang-tahun': '🎂 Kategori: Ulang Tahun',
                'acara-formal': '🏢 Kategori: Acara Formal'
            };
            if (catBadge) {
                catBadge.textContent = labelMap[catKey] || ('Kategori: ' + catKey);
            }

            const list = categoryTemplates[catKey] || categoryTemplates['pernikahan'];
            grid.innerHTML = list.map(item => {
                const isActive = (item.slug === activeSlug || 
                                 (activeSlug.includes('chibi') && item.slug === 'chibi-red') || 
                                 ((activeSlug.includes('wildflower') || activeSlug.includes('rose')) && item.slug === 'wildflower-pink') ||
                                 (activeSlug.includes('javanese') && item.slug === '3d-javanese-royal') ||
                                 ((activeSlug.includes('wisuda') || activeSlug.includes('sarjana') || activeSlug.includes('graduate')) && item.slug.includes(activeSlug)) ||
                                 ((activeSlug.includes('cheerful') || activeSlug.includes('confetti')) && item.slug === 'cheerful-birthday') ||
                                 ((activeSlug.includes('birthday') || activeSlug.includes('milad') || activeSlug.includes('golden')) && item.slug.includes('golden')) ||
                                 ((activeSlug.includes('seminar') || activeSlug.includes('workshop')) && item.slug === 'clean-seminar') ||
                                 ((activeSlug.includes('mosque') || activeSlug.includes('syiar')) && item.slug === 'green-mosque') ||
                                 ((activeSlug.includes('safar') || activeSlug.includes('haji')) && item.slug === 'walimatus-safar') ||
                                 ((activeSlug.includes('halal') || activeSlug.includes('ketupat')) && item.slug === 'ketupat-raya-silaturahmi') ||
                                 ((activeSlug.includes('little-prince') || activeSlug.includes('prince') || activeSlug.includes('nordic')) && item.slug === 'little-prince') ||
                                 ((activeSlug.includes('royal-tasmiyah') || activeSlug.includes('tasmiyah') || activeSlug.includes('sultan')) && item.slug === 'royal-tasmiyah') ||
                                 ((activeSlug.includes('walimatul-khitan') || activeSlug.includes('khitan') || activeSlug.includes('sunat')) && item.slug === 'walimatul-khitan-berkah-sholeh') ||
                                 ((activeSlug.includes('baby') || activeSlug.includes('pastel')) && item.slug === 'sweet-baby-pastel-aqiqah'));
                const activeStyle = isActive 
                    ? 'border-brand bg-brand/5 ring-2 ring-brand/30 shadow-md font-bold' 
                    : 'border-ink/15 bg-white hover:border-brand shadow-sm';
                
                return `
                    <button type="button" onclick="openThemePreviewModal('${item.slug}')" class="p-2.5 rounded-xl border text-left transition flex items-center gap-2 ${activeStyle}">
                        <span class="w-8 h-8 rounded-lg ${item.iconBg} flex items-center justify-center text-sm font-bold shrink-0">${item.icon}</span>
                        <div class="min-w-0 flex-1">
                            <b class="text-xs text-ink block truncate">${item.name}</b>
                            <span class="text-[10px] text-brand block truncate">${item.tag}</span>
                        </div>
                    </button>
                `;
            }).join('');
        }

        function openThemePreviewModal(slug) {
            const rawSlug = (slug || '').toLowerCase();
            
            // Map legacy / alternative slugs to canonical themePreviews keys
            let matchedSlug = rawSlug;
            if (rawSlug.includes('chibi') || rawSlug.includes('oriental')) matchedSlug = 'chibi-red';
            else if (rawSlug.includes('wildflower') || rawSlug.includes('rose-romance') || rawSlug.includes('elegant-rose')) matchedSlug = 'wildflower-pink';
            else if (rawSlug.includes('javanese') || rawSlug.includes('keraton')) matchedSlug = '3d-javanese-royal';
            else if (rawSlug.includes('minimalist') && !rawSlug.includes('snow')) matchedSlug = 'simple-minimalist-floral';
            else if (rawSlug.includes('snowfall') || rawSlug.includes('snow')) matchedSlug = 'snowfall-minimalist-white';
            else if (rawSlug.includes('batak')) matchedSlug = 'batak-istimewa-heritage';
            else if (rawSlug.includes('mosque') || rawSlug.includes('syiar')) matchedSlug = 'green-mosque';
            else if (rawSlug.includes('walimatus-safar') || rawSlug.includes('safar') || rawSlug.includes('ka\'bah') || rawSlug.includes('kiswah')) matchedSlug = 'walimatus-safar';
            else if (rawSlug.includes('ketupat') || rawSlug.includes('halal')) matchedSlug = 'ketupat-raya-silaturahmi';
            else if (rawSlug.includes('little-prince') || rawSlug.includes('prince') || rawSlug.includes('nordic')) matchedSlug = 'little-prince';
            else if (rawSlug.includes('royal-tasmiyah') || rawSlug.includes('tasmiyah') || rawSlug.includes('sultan')) matchedSlug = 'royal-tasmiyah';
            else if (rawSlug.includes('khitan') || rawSlug.includes('sunat')) matchedSlug = 'walimatul-khitan-berkah-sholeh';
            else if (rawSlug.includes('rumah-baru') || rawSlug.includes('syukuran')) matchedSlug = 'tasyakuran-doa-rumah-baru';
            else if (rawSlug.includes('tahlil') || rawSlug.includes('doa-bersama')) matchedSlug = 'doa-bersama-tahlilan-khusyuk';
            else if (rawSlug.includes('graduate') || rawSlug.includes('modern-graduate')) matchedSlug = 'modern-graduate';
            else if (rawSlug.includes('scholar') || rawSlug.includes('valedictorian') || rawSlug.includes('ivy')) matchedSlug = 'scholar-luxury';
            else if (rawSlug.includes('wisuda') || rawSlug.includes('sarjana') || rawSlug.includes('kelulusan')) matchedSlug = 'wisuda-sarjana-prestasi-emas';
            else if (rawSlug.includes('cheerful') || rawSlug.includes('confetti')) matchedSlug = 'cheerful-birthday';
            else if (rawSlug.includes('kid') || rawSlug.includes('anak') || rawSlug.includes('balon')) matchedSlug = 'kids-birthday-party-balon-ceria';
            else if (rawSlug.includes('golden') || rawSlug.includes('birthday') || rawSlug.includes('milad') || rawSlug.includes('ultah') || rawSlug.includes('ulang')) matchedSlug = 'golden-birthday';
            else if (rawSlug.includes('seminar') || rawSlug.includes('workshop') || rawSlug.includes('clean-seminar') || rawSlug.includes('clean-tech')) matchedSlug = 'clean-seminar';
            else if (rawSlug.includes('reuni') || rawSlug.includes('alumni')) matchedSlug = 'reuni-akbar';
            else if (rawSlug.includes('baby') || rawSlug.includes('pastel') || rawSlug.includes('aqiqah')) matchedSlug = 'sweet-baby-pastel-aqiqah';
            else if (rawSlug.includes('corporate') || rawSlug.includes('formal') || rawSlug.includes('opening')) matchedSlug = 'executive-corporate-grand-opening';

            const theme = themePreviews[matchedSlug] || themePreviews[rawSlug] || themePreviews['chibi-red'];
            currentCategoryKey = detectCategoryKey(matchedSlug, theme);
            currentPreviewSlug = matchedSlug;

            renderThemePreview(theme, matchedSlug);
            renderCategorySelectorGrid(matchedSlug, currentCategoryKey);

            // Determine target iframe url strictly matching the template
            let targetUrl = demoUrlMap[matchedSlug] || demoUrlMap[rawSlug];
            if (!targetUrl) {
                const catList = categoryTemplates[currentCategoryKey] || categoryTemplates['pernikahan'];
                const foundItem = catList.find(item => item.slug === matchedSlug || item.slug === rawSlug);
                if (foundItem && foundItem.demoUrl) {
                    targetUrl = foundItem.demoUrl;
                } else if (matchedSlug.includes('kid') || matchedSlug.includes('anak') || matchedSlug.includes('balon')) {
                    targetUrl = '/demo/kids-birthday';
                } else if (matchedSlug.includes('little-prince') || matchedSlug.includes('prince') || matchedSlug.includes('nordic')) {
                    targetUrl = '/demo/little-prince';
                } else if (matchedSlug.includes('royal-tasmiyah') || matchedSlug.includes('tasmiyah') || matchedSlug.includes('sultan')) {
                    targetUrl = '/demo/royal-tasmiyah';
                } else if (matchedSlug.includes('khitan') || matchedSlug.includes('sunat')) {
                    targetUrl = '/demo/walimatul-khitan';
                } else if (matchedSlug.includes('rumah-baru') || matchedSlug.includes('syukuran')) {
                    targetUrl = '/demo/syukuran-rumah';
                } else if (matchedSlug.includes('mosque') || matchedSlug.includes('syiar')) {
                    targetUrl = '/demo/green-mosque';
                } else if (matchedSlug.includes('safar') || matchedSlug.includes('haji') || matchedSlug.includes('umrah')) {
                    targetUrl = '/demo/walimatus-safar';
                } else if (matchedSlug.includes('halal') || matchedSlug.includes('ketupat')) {
                    targetUrl = '/demo/halal-bihalal';
                } else if (currentCategoryKey === 'wisuda' || matchedSlug.includes('wisuda') || matchedSlug.includes('sarjana') || matchedSlug.includes('graduate')) {
                    targetUrl = '/demo/modern-graduate';
                } else if (currentCategoryKey === 'ulang-tahun' || matchedSlug.includes('birthday') || matchedSlug.includes('milad') || matchedSlug.includes('ultah') || matchedSlug.includes('ulang')) {
                    targetUrl = '/demo/cheerful-birthday';
                } else if (currentCategoryKey === 'aqiqah' || matchedSlug.includes('baby') || matchedSlug.includes('pastel') || matchedSlug.includes('aqiqah')) {
                    targetUrl = '/demo/baby-aqiqah';
                } else if (currentCategoryKey === 'acara-formal' || matchedSlug.includes('corporate') || matchedSlug.includes('formal') || matchedSlug.includes('reuni') || matchedSlug.includes('seminar')) {
                    targetUrl = '/demo/clean-seminar';
                } else if (currentCategoryKey === 'keagamaan') {
                    targetUrl = '/demo/tahlilan-khusyuk';
                } else {
                    targetUrl = '/demo/chibi-red';
                }
            }

            const iframe = document.getElementById('previewModalIframe');
            if (iframe) iframe.src = targetUrl;
            const btnFs = document.getElementById('btnModalFullscreenDemo');
            if (btnFs) btnFs.href = targetUrl;
            const btnFsMob = document.getElementById('btnModalFullscreenDemoMobile');
            if (btnFsMob) btnFsMob.href = targetUrl;
            const btnFsBtm = document.getElementById('btnModalFullscreenDemoBottom');
            if (btnFsBtm) btnFsBtm.href = targetUrl;

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
            const iframe = document.getElementById('previewModalIframe');
            if (iframe) {
                iframe.src = 'about:blank';
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

        function renderThemePreview(theme, key) {
            // Header Info
            const catBadge = document.getElementById('previewCategoryBadge');
            const modalTitle = document.getElementById('modalThemeTitle');
            const modalPkg = document.getElementById('modalThemePackage');
            const catSub = document.getElementById('modalCategorySub');
            const nameEl = document.getElementById('modalThemeName');
            const descEl = document.getElementById('modalThemeDesc');

            if (catBadge && theme) catBadge.textContent = theme.badge;
            if (modalTitle && theme) modalTitle.textContent = theme.name;
            if (modalPkg && theme) modalPkg.textContent = 'Paket Rekomendasi: ' + theme.packageVal;
            if (catSub && theme) catSub.textContent = 'Kategori: ' + theme.category;
            if (nameEl && theme) nameEl.textContent = theme.name;
            if (descEl && theme) descEl.textContent = theme.desc;
        }

        function orderCurrentPreviewTheme() {
            const theme = themePreviews[currentPreviewSlug];
            closeThemePreview();
            if (theme) {
                selectThemeAndOrder(theme.name, theme.packageVal, theme.category, theme.subCat || '');
            }
        }

        function consultPreviewViaWhatsApp() {
            const theme = themePreviews[currentPreviewSlug];
            const name = theme ? theme.name : 'Undangan Digital';
            const cat = theme ? theme.category : 'Umum';
            const text = `Halo Admin *D'Karsa*, saya sedang melihat preview tema *${name}* (Kategori: ${cat}) di website. Saya ingin bertanya lebih lanjut tentang pemesanan tema ini.`;
            window.open(`https://wa.me/6281234567890?text=${encodeURIComponent(text)}`, '_blank');
        }

        function navPreviewTheme(dir) {
            const list = categoryTemplates[currentCategoryKey] || categoryTemplates['pernikahan'];
            let idx = list.findIndex(item => item.slug === currentPreviewSlug);
            if (idx === -1) idx = 0;
            idx = (idx + dir + list.length) % list.length;
            openThemePreviewModal(list[idx].slug);
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