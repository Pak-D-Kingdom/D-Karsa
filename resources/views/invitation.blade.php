@extends('layouts.app')

@section('title')
    D'Karsa — Jasa Pembuatan &amp; Platform Undangan Pernikahan Digital No.1
@endsection

@section('meta_description')
    D'Karsa — Website undangan pernikahan digital, amplop digital QRIS, buku tamu ucapan online, dan layanan pembuatan undangan pernikahan online terima beres &amp; kustom.
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
        const CATALOG_PAGE_SIZE = 9;
        let currentCatalogPage = 1;
        let currentCatalogSearchQuery = '';

        const catalogCategoryAliases = {
            'semua': ['semua'],
            'pernikahan': ['pernikahan', 'wedding', 'pawiwahan', 'akad', 'resepsi'],
            'tahlilan': ['tahlilan', 'doa bersama', 'khusyuk', 'kirim doa'],
            'halalbihalal': ['halalbihalal', 'halal bihalal', 'silaturahmi', 'lebaran', 'syawalan'],
            'khitanan': ['khitanan', 'khitan', 'sunat', 'walimatul khitan'],
            'aqiqah': ['aqiqah', 'tasmiyah', 'baby', 'kelahiran'],
            'ultah': ['ultah', 'ulang tahun', 'birthday', 'milad'],
            'wisuda': ['wisuda', 'graduate', 'graduation', 'sarjana', 'kelulusan'],
            'formal': ['formal', 'acara formal', 'seminar', 'workshop', 'corporate', 'reuni', 'grand opening'],
            'syukuran': ['syukuran', 'selamatan', 'rumah baru', 'tasyakuran']
        };

        function applyCatalogFilters() {
            const selCat = (currentSelectedCategory || 'semua').toLowerCase();
            const allowedKeywords = catalogCategoryAliases[selCat] || [selCat];
            const search = (currentCatalogSearchQuery || '').trim().toLowerCase();

            const allCards = Array.from(document.querySelectorAll('#catalogGrid .theme-card'));
            if (!allCards.length) return;

            const matchingCards = [];

            allCards.forEach(card => {
                const cardCat = (card.dataset.category || '').toLowerCase();
                const cardTier = (card.dataset.tier || '').toLowerCase();
                const cardName = (card.dataset.name || '').toLowerCase();
                const cardTags = (card.dataset.tags || '').toLowerCase();

                const matchCat = (selCat === 'semua' || cardCat === 'semua' || cardCat === selCat || allowedKeywords.some(kw => cardCat.includes(kw)));
                const matchTier = (currentSelectedTier === 'semua' || cardTier === currentSelectedTier);
                const matchSearch = (!search || cardName.includes(search) || cardTags.includes(search) || cardCat.includes(search) || cardTier.includes(search));

                if (matchCat && matchTier && matchSearch) {
                    matchingCards.push(card);
                } else {
                    card.classList.add('hidden');
                }
            });

            const totalMatches = matchingCards.length;
            const maxVisible = currentCatalogPage * CATALOG_PAGE_SIZE;
            let visibleCount = 0;

            matchingCards.forEach((card, index) => {
                if (index < maxVisible) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Update Real-time Counters
            const countVisibleEl = document.getElementById('catalogCountVisible');
            const countTotalEl = document.getElementById('catalogCountTotal');
            const countVisibleTextEl = document.getElementById('catalogVisibleCountText');
            const countTotalTextEl = document.getElementById('catalogTotalCountText');

            if (countVisibleEl) countVisibleEl.textContent = visibleCount;
            if (countTotalEl) countTotalEl.textContent = totalMatches;
            if (countVisibleTextEl) countVisibleTextEl.textContent = visibleCount;
            if (countTotalTextEl) countTotalTextEl.textContent = totalMatches;

            // Empty State
            const emptyState = document.getElementById('catalogEmptyState');
            if (emptyState) {
                if (totalMatches === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }

            // Load More vs All Loaded Indicator
            const loadMoreSection = document.getElementById('catalogLoadMoreSection');
            const loadMoreRemaining = document.getElementById('catalogLoadMoreRemaining');
            const allLoadedBadge = document.getElementById('catalogAllLoadedBadge');
            const allLoadedText = document.getElementById('catalogAllLoadedText');

            if (totalMatches === 0) {
                if (loadMoreSection) loadMoreSection.classList.add('hidden');
                if (allLoadedBadge) allLoadedBadge.classList.add('hidden');
            } else if (visibleCount < totalMatches) {
                if (loadMoreSection) loadMoreSection.classList.remove('hidden');
                if (loadMoreRemaining) {
                    const remaining = totalMatches - visibleCount;
                    const nextBatch = Math.min(CATALOG_PAGE_SIZE, remaining);
                    loadMoreRemaining.textContent = `+${nextBatch} Lagi`;
                }
                if (allLoadedBadge) allLoadedBadge.classList.add('hidden');
            } else {
                if (loadMoreSection) loadMoreSection.classList.add('hidden');
                if (allLoadedBadge) {
                    allLoadedBadge.classList.remove('hidden');
                    if (allLoadedText) {
                        allLoadedText.textContent = `Seluruh ${totalMatches} pilihan desain telah ditampilkan`;
                    }
                }
            }

            // Search Clear Button & Reset Filter Button
            const searchClearBtn = document.getElementById('catalogSearchClearBtn');
            if (searchClearBtn) {
                if (search.length > 0) {
                    searchClearBtn.classList.remove('hidden');
                } else {
                    searchClearBtn.classList.add('hidden');
                }
            }

            const resetFilterBtn = document.getElementById('catalogResetFilterBtn');
            if (resetFilterBtn) {
                const isFiltered = (currentSelectedCategory !== 'semua' || currentSelectedTier !== 'semua' || search.length > 0);
                if (isFiltered) {
                    resetFilterBtn.classList.remove('hidden');
                    resetFilterBtn.classList.add('inline-flex');
                } else {
                    resetFilterBtn.classList.add('hidden');
                    resetFilterBtn.classList.remove('inline-flex');
                }
            }
        }

        // Muat Lebih Banyak Desain (Load More)
        function loadMoreCatalogThemes() {
            currentCatalogPage++;
            applyCatalogFilters();
        }

        // Live Search Input handler
        function onCatalogSearchChange(query) {
            currentCatalogSearchQuery = query || '';
            currentCatalogPage = 1;
            applyCatalogFilters();
        }

        // Clear Search
        function clearCatalogSearch() {
            const input = document.getElementById('catalogSearchInput');
            if (input) input.value = '';
            currentCatalogSearchQuery = '';
            currentCatalogPage = 1;
            applyCatalogFilters();
        }

        // Reset Semua Filter & Pencarian
        function resetAllCatalogFilters() {
            currentSelectedCategory = 'semua';
            currentSelectedTier = 'semua';
            currentCatalogSearchQuery = '';
            currentCatalogPage = 1;

            const searchInput = document.getElementById('catalogSearchInput');
            if (searchInput) searchInput.value = '';

            document.querySelectorAll('#themeFilters .chip').forEach(c => c.classList.remove('aktif'));
            const defaultCatChip = document.querySelector('#themeFilters .chip');
            if (defaultCatChip) defaultCatChip.classList.add('aktif');

            document.querySelectorAll('#tierFilters .chip').forEach(c => c.classList.remove('aktif'));
            const defaultTierChip = document.getElementById('chipTier_semua');
            if (defaultTierChip) defaultTierChip.classList.add('aktif');

            const banner = document.getElementById('catalogTierBanner');
            if (banner) banner.classList.add('hidden');

            applyCatalogFilters();
        }

        // Filter Katalog Desain Berdasarkan Kategori Acara
        function filterThemes(category, btn) {
            currentSelectedCategory = category;
            currentCatalogPage = 1;
            document.querySelectorAll('#themeFilters .chip').forEach(c => c.classList.remove('aktif'));
            if (btn) {
                btn.classList.add('aktif');
                try { btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' }); } catch (e) {}
            }
            applyCatalogFilters();
        }

        // Filter Katalog Desain Berdasarkan Tingkat Paket (Basic, Premium, Eksklusif, Kustom)
        function filterCatalogByTier(tier, packageName) {
            currentSelectedTier = tier;
            currentCatalogPage = 1;

            // Update status chip aktif di tier filters
            document.querySelectorAll('#tierFilters .chip').forEach(c => c.classList.remove('aktif'));
            const activeChip = document.getElementById('chipTier_' + tier);
            if (activeChip) {
                activeChip.classList.add('aktif');
                try { activeChip.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' }); } catch (e) {}
            }

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
                        descEl.textContent = 'Pilihan desain standar, bersih & esensial dengan harga paling murah/hemat. Silakan klik "Pilih Desain" pada tema yang Anda inginkan!';
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
            'walimatul-khitan-sahaja': {
                name: 'Walimatul Khitan Sahaja Berkah',
                category: 'Khitanan',
                subCat: 'Tasyakuran walimatul khitan',
                catKey: 'khitanan',
                badge: '✂️ Khitanan • Basic Sahaja',
                packageVal: 'Paket Basic - Rp50.000',
                desc: 'Undangan tasyakuran walimatul khitan bersih, hangat & islami bernuansa Sage Green & Emas dengan doa anak sholeh, rute acara & amplop tali asih.',
                coverBadge: 'WALIMATUL KHITAN',
                coverSubtitle: 'Tasyakuran Walimatul Khitan Putra Tercinta',
                coverTitle: 'Ahmad Fatih Al-Farisi',
                coverDate: 'Ahad, 24 Mei 2026',
                coverImg: 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700',
                quoteIcon: '✂️',
                quoteTitle: 'Doa Walimatul Khitan',
                quoteBody: '"Semoga Allah memberkahi khitanan putra kami, menjadikannya anak yang sholeh, cerdas, berbakti kepada kedua orang tua dan bermanfaat bagi sesama."',
                profileBadge: 'Jagoan Sholeh yang Dikhitan',
                profileName: 'Ahmad Fatih Al-Farisi',
                profileDesc: 'Putra Tercinta dari Bpk. Hendra Pratama & Ibu Rina Wijaya',
                locationName: 'Kediaman Keluarga Besar, Bandung',
                events: [
                    { title: 'Tasyakuran & Doa Khitan', time: '09:00 - 11:30 WIB', date: 'Ahad, 24 Mei 2026', place: 'Kediaman Keluarga Besar' },
                    { title: 'Walimah & Ramah Tamah', time: '11:30 - 14:30 WIB', date: 'Ahad, 24 Mei 2026', place: 'Kediaman Keluarga Besar' }
                ],
                giftTitle: 'Tali Asih / Kado Khitanan',
                giftDesc: 'Doa restu Anda merupakan karunia terindah bagi jagoan kami. Bagi yang ingin mengirimkan tali asih:',
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

        // ==========================================
        // 15 Template Baru Kategori Ulang Tahun
        // ==========================================
        themePreviews['celeste-royale-baby-blue'] = {
            name: 'Elegan Klasik Baby Blue',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Baby Blue',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemewahan perayaan sweet seventeen bertema Celeste Royale: palet sapphire baby blue & emas klasik, amplop royal wax seal, arch portrait showcase, dress code etiquette, galeri lookbook eksklusif & RSVP.',
            coverBadge: 'CELESTE ROYALE XVII',
            coverSubtitle: 'Celebrating 17 Sapphire Years',
            coverTitle: 'Seraphina Claire Bleu (Turning 17)',
            coverDate: 'Sabtu, 25 Oktober 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5',
            quoteIcon: '✨',
            quoteTitle: 'Celestial Grace',
            quoteBody: '"Under the moonlit sapphire sky, a fairytale chapter unfolds at seventeen."',
            profileBadge: 'The Birthday Debutante',
            profileName: 'Seraphina Claire Bleu',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Sapphire Blue & Classic Gold',
            locationName: 'The Carlton Grand Ballroom, Jakarta',
            events: [
                { title: 'Royal Welcome & Cocktail', time: '18:30 - 19:30 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Ballroom Foyer' },
                { title: 'Celeste Gala & Cake Ceremony', time: '19:30 - 22:00 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan doa restu sahabat tercinta adalah kado terindah bagi Seraphina:',
            wishTitle: 'Untaian Doa & Ucapan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['terra-epoque-terracotta'] = {
            name: 'Editorial Terracotta',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Terracotta',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Desain majalah editorial haute couture bertema Terra Époque XVII: palet terracotta hangat & earthy bronze, amplop segel monogram, countdown mekar 17 tahun, galeri lookbook editorial & RSVP.',
            coverBadge: 'TERRA ÉPOQUE XVII',
            coverSubtitle: 'A Haute Couture Milestone at Seventeen',
            coverTitle: 'Audrey Calista (Turning 17)',
            coverDate: 'Sabtu, 1 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoyFSvSZfWDr4PYn8k6kebaH2uIyhUhjyP0L7DD2Xjw63ACK7bhdej_A-7fYYA-Vq3QQG-zQMJ5RC2eWTi8TgYK3ZOfbbKdlNeAaQWDHnnHzZvHxSjbbGBiua7AHUowi36w7Ck9xC97P0-S0nAAwpUSrDjVi9HQw6fi4WZfwxTEmLqwonIEivueP7G3seJE9ThdPEbc30yvJ7jztsljuIVXcMhwEIctWKn-9527hP_',
            quoteIcon: '🍂',
            quoteTitle: 'Warmth of Youth',
            quoteBody: '"Like the warm golden sun casting grace upon the earth, seventeen begins with beauty and gratitude."',
            profileBadge: 'The Debutante',
            profileName: 'Audrey Calista',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Warm Terracotta & Earthy Chic',
            locationName: 'The Glass House Grand Ballroom, Jakarta',
            events: [
                { title: 'Sunset Cocktail & Welcome', time: '18:00 - 19:00 WIB', date: 'Sabtu, 1 November 2025', place: 'Garden Terrace' },
                { title: 'Époque Gala Dinner', time: '19:00 - 21:30 WIB', date: 'Sabtu, 1 November 2025', place: 'Glass Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum hangat sahabat adalah kado terindah bagi Audrey:',
            wishTitle: 'Untaian Doa & Harapan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['forest-moss-seventeen'] = {
            name: 'Elegan Klasik Forest Moss',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Forest Moss',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Pesona perayaan sweet seventeen bertema Forest Moss XVII: kemegahan nuansa hijau lumut hutan purba & emas antik, amplop heraldic crest, panduan dress code vintage, galeri kenangan & RSVP.',
            coverBadge: 'FOREST MOSS XVII',
            coverSubtitle: 'Enchanted Woods of Seventeen',
            coverTitle: 'Charlotte Vivienne (Turning 17)',
            coverDate: 'Sabtu, 8 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP',
            quoteIcon: '🌿',
            quoteTitle: 'Evergreen Grace',
            quoteBody: '"Like deep evergreen leaves in enchanted woods, seventeen unfolds in timeless grace."',
            profileBadge: 'The Birthday Star',
            profileName: 'Charlotte Vivienne',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Forest Green & Antique Gold',
            locationName: 'The St. Regis Grand Ballroom, Jakarta',
            events: [
                { title: 'Enchanted Twilight Reception', time: '18:30 - 19:30 WIB', date: 'Sabtu, 8 November 2025', place: 'Garden Foyer' },
                { title: 'Gala Dinner & Cake Ceremony', time: '19:30 - 22:00 WIB', date: 'Sabtu, 8 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa restu dan senyuman tulus Anda adalah anugerah terindah bagi Charlotte:',
            wishTitle: 'Untaian Doa & Berkah Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['emeraude-soiree-emerald'] = {
            name: 'Editorial Emerald Green',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Emerald Editorial',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemilau perayaan musim mekar ke-17 bertema Émeraude Soirée XVII: nuansa zamrud emerald mewah & tipografi editorial majalah, amplop digital couture, countdown jam pesta, galeri lookbook & kado.',
            coverBadge: 'ÉMERAUDE SOIRÉE XVII',
            coverSubtitle: 'High-Fashion Spring Awakening',
            coverTitle: 'Madeleine Vivienne (Turning 17)',
            coverDate: 'Sabtu, 15 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq',
            quoteIcon: '✨',
            quoteTitle: 'Emerald Glow',
            quoteBody: '"Under emerald chandeliers and starlit grace, seventeen unfolds into timeless splendor."',
            profileBadge: 'The Debutante',
            profileName: 'Madeleine Vivienne',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Emerald Green & Haute Couture',
            locationName: 'The Emerald Grand Ballroom, SCBD, Jakarta',
            events: [
                { title: 'Haute Cocktail Hour', time: '18:30 - 19:30 WIB', date: 'Sabtu, 15 November 2025', place: 'Emerald Foyer' },
                { title: 'Soirée Gala & Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 15 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa dan pelukan hangat sahabat adalah kado terindah bagi Madeleine:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['mocha-creme-seventeen'] = {
            name: 'Elegan Klasik Mocha Cream',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Mocha Cream',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kehangatan pesta sweet seventeen bernuansa Mocha Crème XVII: harmoni warna kopi susu moka, karamel lembut & arsitektur katedral, amplop lilin inisial, rundown gala dinner & kado digital.',
            coverBadge: 'MOCHA CRÈME XVII',
            coverSubtitle: 'Sweet Warmth of Seventeen',
            coverTitle: 'Genevieve Aurelia (Turning 17)',
            coverDate: 'Sabtu, 22 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl',
            quoteIcon: '☕',
            quoteTitle: 'Amber Warmth',
            quoteBody: '"Like warm sunlight filtered through amber crystals, seventeen begins with grace and laughter."',
            profileBadge: 'The Birthday Star',
            profileName: 'Genevieve Aurelia',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Mocha, Caramel & Creamy White',
            locationName: 'The Mulia Grand Ballroom, Jakarta',
            events: [
                { title: 'Welcome & High Tea', time: '17:30 - 18:30 WIB', date: 'Sabtu, 22 November 2025', place: 'Mulia Lounge' },
                { title: 'Mocha Gala Celebration', time: '18:30 - 21:30 WIB', date: 'Sabtu, 22 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum ceria sahabat adalah kado termanis bagi Genevieve:',
            wishTitle: 'Untaian Doa & Harapan Indah',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['chapter-30-soft-pink'] = {
            name: 'Geometris Soft Pink',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Chapter 30 Pink',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Perayaan kedewasaan usia 30 tahun bernuansa modern geometric soft pink: refleksi babak kehidupan baru, rundown pesta intim & gala toast, mozaik galeri perjalanan usia & RSVP.',
            coverBadge: 'CHAPTER 30: MODERN RADIANCE',
            coverSubtitle: 'Celebrating Three Decades of Radiance',
            coverTitle: 'Clara Vivienne (Turning 30)',
            coverDate: 'Sabtu, 29 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu',
            quoteIcon: '🌸',
            quoteTitle: 'Radiant Chapter',
            quoteBody: '"Entering thirty with boundless clarity, grateful heart, and modern radiance."',
            profileBadge: 'Milestone 30',
            profileName: 'Clara Vivienne',
            profileDesc: 'Celebrating Chapter 30 with beloved friends and family • Dress Code: Soft Pink & Chic Neutral',
            locationName: 'The Glasshouse Lounge, Kebayoran Baru, Jakarta',
            events: [
                { title: 'Intimate Welcome & Drinks', time: '18:30 - 19:30 WIB', date: 'Sabtu, 29 November 2025', place: 'Garden Terrace' },
                { title: 'Dinner & Milestone Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 29 November 2025', place: 'Glasshouse Lounge' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Asih',
            giftDesc: 'Doa terbaik dan tawa hangat Anda adalah kado paling bermakna bagi Clara:',
            wishTitle: 'Untaian Doa & Pesan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['midnight-soiree-navy'] = {
            name: 'Minimalis Modern Midnight Navy',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Midnight Navy',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain perayaan ulang tahun dewasa maskulin & prestisius bertema Midnight Soirée: palet biru malam pekat & aksen perak modern, amplop segel geometris, panduan cocktail attire & RSVP.',
            coverBadge: 'MIDNIGHT SOIRÉE: MILESTONE 35',
            coverSubtitle: 'Quiet Confidence at Thirty-Five',
            coverTitle: 'Adrian Wicaksono (Turning 35)',
            coverDate: 'Sabtu, 6 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6AtwKU1AzpfBSTFj3XjEmRw0vPFIRTZzX9ttciYelUfIjcTtnFjbuzz0QCoC_Ihg7jVXW9Of_Mko6R5ojZ30buJ2WjRGAhWvrD0O6ZsSr5zjEnvt5pNYPyQYB31jJGnfnHPEKGWtdQl8yUWMjOgDIiSClms-_ORe_H06CgXhzqBGZa8jW_mo_kxOJjgtsQZWvJa93zPFwGB7gIqvdHbqD50L7x_1jVSkMpGba_xQV',
            quoteIcon: '🍸',
            quoteTitle: 'Quiet Confidence',
            quoteBody: '"Entering thirty-five with clarity of mind, gratitude for every milestone, and quiet confidence."',
            profileBadge: 'Milestone 35',
            profileName: 'Adrian Wicaksono',
            profileDesc: 'Celebrating 35 Milestones • Dress Code: Midnight Navy & Modern Tailored',
            locationName: 'The Foundry Private Lounge, SCBD, Jakarta',
            events: [
                { title: 'Cocktail & Cigar Lounge', time: '19:00 - 20:00 WIB', date: 'Sabtu, 6 Desember 2025', place: 'Foundry Mezzanine' },
                { title: 'Dinner & Anniversary Toast', time: '20:00 - 22:30 WIB', date: 'Sabtu, 6 Desember 2025', place: 'Main Dining Room' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tanda Kasih',
            giftDesc: 'Kebersamaan dan doa tulus sahabat adalah kehormatan terbesar bagi Adrian:',
            wishTitle: 'Untaian Doa & Ucapan Selamat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['cyber-neon-futuristic'] = {
            name: 'Geometris Cyber Neon',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Cyber Neon 30',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Desain pesta ulang tahun futuristik bertema Cyber Neon: estetika grid fotonik, aksen cyan neon & dark mode berani, sound capsule HUD, countdown milidetik & VIP guest lounge pass.',
            coverBadge: 'PROTOCOL 3.0: CYBER SOIRÉE',
            coverSubtitle: 'Calibrated Focus at Thirty',
            coverTitle: 'Kevin Danuarta (Turning 30)',
            coverDate: 'Sabtu, 13 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27',
            quoteIcon: '⚡',
            quoteTitle: 'Future Horizons',
            quoteBody: '"Entering thirty with calibrated focus, bold ambitions, and endless frequencies ahead."',
            profileBadge: 'Protocol Host',
            profileName: 'Kevin Danuarta',
            profileDesc: 'Celebrating Milestone 3.0 • Dress Code: Cyber Chic, Black & Neon Accents',
            locationName: 'Sky Cyber Lounge Level 42, Menara Astra, Jakarta',
            events: [
                { title: 'VIP Check-In & Sound Lab', time: '19:30 - 20:30 WIB', date: 'Sabtu, 13 Desember 2025', place: 'Cyber Foyer' },
                { title: 'The Cyber Protocol & Afterparty', time: '20:30 - 23:00 WIB', date: 'Sabtu, 13 Desember 2025', place: 'Sky Horizon Stage' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Digital Vault',
            giftDesc: 'Terima kasih atas kehadiran & doa terbaik Anda dalam merayakan Protocol 3.0:',
            wishTitle: 'Untaian Doa & Pesan Fotonik',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['crimson-soiree-bold-red'] = {
            name: 'Minimalis Modern Bold Red',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Bold Crimson',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kemegahan perayaan milad / ulang tahun babak ke-30 bertema Crimson Soirée: palet merah tua berani, tipografi sans modern tajam, amplop wax seal interaktif, galeri foto & kado digital.',
            coverBadge: 'CRIMSON SOIRÉE: CHAPTER 30',
            coverSubtitle: 'Bold Conviction at Thirty',
            coverTitle: 'Devan Pramudya (Turning 30)',
            coverDate: 'Sabtu, 20 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7u7oze2fsIArA9JU5fPuG8VRUbvwwHHb-KrIZrb-6grSw-5gzRr9d4NRYCwUvgglHPZnAbpiZdgmk3igMYj48mQ4V025UwNyp4Fx7CIbNcmth1HzAEB1R2j4pjOFa-jPPPrbjQmkvXQ_WiyjHSsRC9wgK6k4YBYMP0XKDRia3Bl1xUKOKKioGxZoMpFsTa5WPAWTesi5lR01didVxEZIQeB1FjNStLAIn57-KXjk0',
            quoteIcon: '🍷',
            quoteTitle: 'Bold Milestone',
            quoteBody: '"Entering thirty with clarity, bold conviction, and deep gratitude for every milestone."',
            profileBadge: 'Chapter 30',
            profileName: 'Devan Pramudya',
            profileDesc: 'Celebrating Thirty Bold Years • Dress Code: Crimson Red & Black Tie',
            locationName: 'The Crimson Room, Grand Hyatt Jakarta',
            events: [
                { title: 'Welcome Drinks & Red Carpet', time: '18:30 - 19:30 WIB', date: 'Sabtu, 20 Desember 2025', place: 'Crimson Lounge' },
                { title: 'Gala Dinner & Milestone Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 20 Desember 2025', place: 'Grand Room' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa tulus dan kebersamaan sahabat adalah hadiah terindah bagi Devan:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['mint-soiree-geometric'] = {
            name: 'Geometris Mint Fresh',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Mint Geometric',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kesegaran perayaan ulang tahun dewasa bernuansa Mint Soirée: aksen hijau mint sejuk, motif prisma geometris modern, amplop digital segel kristal, agenda brunch pesta & kado digital.',
            coverBadge: 'MINT SOIRÉE: CHAPTER 30',
            coverSubtitle: 'Grounded Clarity & Creative Energy',
            coverTitle: 'Reyhan Danendra (Turning 30)',
            coverDate: 'Sabtu, 27 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBUa5nKhZ0fyl6HfSUiPmVfYSRkugaoIIVwHkk1ENHonrCXMjoMxptho-zDpnPvxzfHS5SwArIvMT9AJmWIksSEqiOFb0BawlfKgKS1ZE1TmBUIF7QjoHISS_Nbp8JKzK9PzMOIAA4lnzN2K8TuWzO8UDwFHaA4Res8LSgDUN-aVENIlxhskSils4ZdaPSKY1ReSqU0khblEOI4qiqC42YhbQwf4YG8aZ8TXg2SddA3',
            quoteIcon: '🌿',
            quoteTitle: 'Grounded Energy',
            quoteBody: '"Entering thirty with grounded clarity, creative energy, and deep gratitude for every milestone."',
            profileBadge: 'Chapter 30',
            profileName: 'Reyhan Danendra',
            profileDesc: 'Celebrating Milestone 30 • Dress Code: Fresh Mint & Crisp White',
            locationName: 'Botanica Glass Pavilion, Jakarta',
            events: [
                { title: 'Afternoon Brunch & Mocktails', time: '15:30 - 17:00 WIB', date: 'Sabtu, 27 Desember 2025', place: 'Garden Pavilion' },
                { title: 'Sunset Toast & Celebration', time: '17:00 - 19:30 WIB', date: 'Sabtu, 27 Desember 2025', place: 'Main Glasshouse' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Asih',
            giftDesc: 'Doa hangat dan kehadiran sahabat adalah pelengkap kebahagiaan Reyhan:',
            wishTitle: 'Untaian Doa & Pesan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['raden-arya-champagne'] = {
            name: 'Tradisional Nusantara Champagne Glow',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Champagne Glow',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kisah petualangan karakter original Raden Arya & Sang Garuda Kencana: kemegahan budaya Nusantara bernuansa champagne emas berkilau, kisah babak legenda, rundown pesta & kado tali asih.',
            coverBadge: 'RADEN ARYA & GARUDA KENCANA',
            coverSubtitle: 'Kisah Legenda Budaya Nusantara',
            coverTitle: 'Raden Arya (Mahkota Garuda)',
            coverDate: 'Sabtu, 3 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuChhiII7NyQNgNEyDo4e3CDUnEaXefFwGqaSvtNSDIPhz6aXNTOlJXQvHKBntUXt1qMiMahvcuAwQwiIlOA_ynwTckrAoAe22MkZSaeWq-Oicetc-U9aUDXK6HiQH936eBuz2FlXP9ubXfYT4RKlRGCaIl0sqsTHiS6GoZzzLL9O0xttgksHjHumHI28k1rMeMfz8gaCpUxHNP1ncnt_U92ZIHI7bmI9ySJ5AHyCV_W',
            quoteIcon: '🦅',
            quoteTitle: 'Lentera Harapan',
            quoteBody: '"Menyemai keberanian, merayakan kehangatan budi, dan menyalakan lentera harapan di setiap langkah."',
            profileBadge: 'Karakter Original',
            profileName: 'Raden Arya & Sang Garuda Kencana',
            profileDesc: 'Petualangan Legenda Keraton Amarta • Dress Code: Champagne Gold & Kain Wastra Nusantara',
            locationName: 'Pendopo Agung Keraton Amarta, Yogyakarta',
            events: [
                { title: 'Pahargyan & Sambutan Tamu', time: '18:30 - 19:30 WIB', date: 'Sabtu, 3 Januari 2026', place: 'Pendopo Sasana' },
                { title: 'Gala Peringatan Hari Jadi', time: '19:30 - 22:00 WIB', date: 'Sabtu, 3 Januari 2026', place: 'Bale Ageng' }
            ],
            giftTitle: '🎁 Kado Tali Asih & Tanda Tresna',
            giftDesc: 'Pangestu lan pandonga panjenengan sami karunia ingkang ageng:',
            wishTitle: 'Untaian Doa & Berkah Pangestu',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['kaelen-black-gold'] = {
            name: 'Bold Modern Black & Gold',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Black & Gold',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Epos karakter original Kaelen The Golden Alchemist bernuansa obsidian hitam & emas berkilau: lambang alkimia kencana, amplop digital orisinal, galeri konsep ilustrasi, RSVP & kado digital.',
            coverBadge: 'CHRONICLES OF KAELEN',
            coverSubtitle: 'The Golden Crucible Milestone',
            coverTitle: 'Kaelen The Golden Alchemist',
            coverDate: 'Sabtu, 10 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS',
            quoteIcon: '⚗️',
            quoteTitle: 'Golden Crucible',
            quoteBody: '"Di balik percikan alkimia kencana dan bayang-bayang obsidian, sebuah babak baru keberanian dimulai."',
            profileBadge: 'Original Character',
            profileName: 'Kaelen The Golden Alchemist',
            profileDesc: 'Epos Karakter Orisinal • Dress Code: Obsidian Black & Shimmering Gold',
            locationName: 'The Tribrata Grand Ballroom, Jakarta',
            events: [
                { title: 'The Alchemist Gathering', time: '18:30 - 19:30 WIB', date: 'Sabtu, 10 Januari 2026', place: 'Obsidian Foyer' },
                { title: 'The Crucible Gala & Feast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 10 Januari 2026', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Alchemical Vault',
            giftDesc: 'Kehadiran Anda dan untaian doa adalah permata paling berharga bagi Kaelen:',
            wishTitle: 'Untaian Doa & Catatan Alkimia',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['arya-nature-green'] = {
            name: 'Tradisional Nusantara Nature Green',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Nature Green',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Petualangan Raden Arya & Sang Rusa Kencana di rimba nusantara asri: palet hijau zamrud alam & motif batik dedaunan, kisah lore karakter, countdown pesta, galeri ilustrasi dongeng & RSVP.',
            coverBadge: 'ARYA & RUSA KENCANA',
            coverSubtitle: 'Petualangan Rimba Nusantara Asri',
            coverTitle: 'Raden Arya (Rusa Kencana)',
            coverDate: 'Sabtu, 17 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCjVy2TeXVgsz9WfnhHt8yTWrNagKryxUdKB3EEGikw2vGtgHqurtrWxXb5T52vnRnjs7N9leYwV98qlSXlCRO0JaRtl9rTUXAHDpvxrh55YhyoMme7DQYOs-aF4ITT9MlPSU8YlDReovsZuTGVgSGS53OJNngQQQgvM8zs_WrBAUCButfwPoJhZlxNYnY4slfWxpD7Ce7ock4ehzslrx2HIhowPQ9_NjYCkYTSfpx-',
            quoteIcon: '🌿',
            quoteTitle: 'Rimba Asri',
            quoteBody: '"Di mana daun berbisik dan akar merangkul bumi, di sanalah keberanian mekar memberikan perlindungan."',
            profileBadge: 'Karakter Orisinal',
            profileName: 'Raden Arya & Sang Rusa Kencana',
            profileDesc: 'Kisah Sahabat Rimba Nusantara • Dress Code: Nature Forest Green & Earth Tone',
            locationName: 'Hutan Kota by Plataran, GBK, Jakarta',
            events: [
                { title: 'Sambutan Rimba Asri', time: '16:00 - 17:30 WIB', date: 'Sabtu, 17 Januari 2026', place: 'Garden Amphitheater' },
                { title: 'Perayaan Syukuran Hari Jadi', time: '17:30 - 20:00 WIB', date: 'Sabtu, 17 Januari 2026', place: 'Plataran Glasshouse' }
            ],
            giftTitle: '🎁 Kado Hari Jadi & Tali Asih',
            giftDesc: 'Doa kebaikan dan kebersamaan Anda adalah berkah terindah bagi kami:',
            wishTitle: 'Untaian Doa & Pesan Sahabat Rimba',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['solaris-sunset-gradient'] = {
            name: 'Bold Modern Sunset Gradient',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Sunset Solaris',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Karakter orisinal Solaris The Sunset Guardian dalam kobaran gradien jingga senja & ungu kosmik: amplop digital perisai surya, rundown perayaan malam, konsep visual karakter & RSVP.',
            coverBadge: 'SOLARIS: SUNSET CONVERGENCE',
            coverSubtitle: 'The Guardian of Dusk & Dawn',
            coverTitle: 'Solaris The Sunset Guardian',
            coverDate: 'Sabtu, 24 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuClcfkEaZIvqACRX7sQ9n4fdhnAvglnuCHev9Jw3KNiN-290xidPlQ0OhLOyNpHsRS99zWpm1INpsj6pOEVbVYvo5aPGaarsVgzRfMmqp0GoVsO-KD0lgo2quIewVhhLCiZg4mtjMiI1t1mBy9OFj4A-RJbaUTetFR3wiuQMNHPz6-prW-q6bNU7ov7Mr0QmsryY24_vaJNpET9R9P6aAGpL-M17m8sfgL1GwzSQ1LO',
            quoteIcon: '🌅',
            quoteTitle: 'Sunset Hope',
            quoteBody: '"Di batas cakrawala senja di mana nyala api keberanian bertemu kehangatan harapan, kita berkumpul merayakan babak baru."',
            profileBadge: 'Original Guardian',
            profileName: 'Solaris The Sunset Guardian',
            profileDesc: 'Karakter Orisinal Solaris • Dress Code: Sunset Orange, Cosmic Purple & Gold',
            locationName: 'The Sky Ballroom Level 50, The Westin Jakarta',
            events: [
                { title: 'Dusk Gathering & Solar Pass', time: '18:00 - 19:30 WIB', date: 'Sabtu, 24 Januari 2026', place: 'Sky View Foyer' },
                { title: 'Convergence Gala & Night Show', time: '19:30 - 22:30 WIB', date: 'Sabtu, 24 Januari 2026', place: 'Main Sky Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Solar Vault',
            giftDesc: 'Kehadiran sahabat dan senyuman di senja ini adalah anugerah terbesar bagi Solaris:',
            wishTitle: 'Untaian Doa & Pesan Senja',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['raden-arya-warm-neutral'] = {
            name: 'Tradisional Nusantara Warm Neutral',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Warm Neutral',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kisah karakter original Raden Arya & Harimau Kencana dalam kehangatan palet krem netral & cokelat kayu pusaka: amplop segel cap kerajaan, rundown perayaan hari jadi, galeri & kado digital.',
            coverBadge: 'RADEN ARYA & HARIMAU KENCANA',
            coverSubtitle: 'Sahabat Rimba Kencana',
            coverTitle: 'Raden Arya (Harimau Kencana)',
            coverDate: 'Sabtu, 31 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99',
            quoteIcon: '🐅',
            quoteTitle: 'Lentera Kebaikan',
            quoteBody: '"Menapaki rimba kencana, merajut kebaikan budi pekerti, dan menyalakan lentera harapan bagi sesama."',
            profileBadge: 'Karakter Orisinal',
            profileName: 'Raden Arya & Harimau Kencana',
            profileDesc: 'Kisah Budi Luhur Keraton Nusantara • Dress Code: Warm Neutral, Cream & Wooden Brown',
            locationName: 'Plataran Dharmawangsa, Jakarta',
            events: [
                { title: 'Temu Ramah & Jamuan Teh Hangat', time: '17:30 - 18:30 WIB', date: 'Sabtu, 31 Januari 2026', place: 'Joglo Foyer' },
                { title: 'Tasyakuran & Perayaan Hari Jadi', time: '18:30 - 21:00 WIB', date: 'Sabtu, 31 Januari 2026', place: 'Pendopo Utama' }
            ],
            giftTitle: '🎁 Kado Hari Jadi & Tali Tresna',
            giftDesc: 'Pangestu dan doa tulus panjenengan sami adalah anugerah terindah:',
            wishTitle: 'Untaian Doa & Berkah Pangestu',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
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

        themePreviews['floral-midnight-navy'] = {
            name: 'Floral Midnight Navy',
            category: 'Acara Formal',
            subCat: 'Acara komunitas',
            catKey: 'formal',
            badge: '🌿 Nocturne Flora • Premium Komunitas',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain gala & malam keakraban komunitas eksklusif bernuansa floral midnight navy & emas: amplop digital interaktif, sambutan presidium, rundown protokoler, RSVP jamuan gala dinner & donasi filantropi.',
            coverBadge: 'NOCTURNE FLORA GALA',
            coverSubtitle: 'Malam Keakraban & Mahakarya Komunitas',
            coverTitle: 'Komunitas Ekosistem Kreatif Nusantara',
            coverDate: 'Sabtu, 24 Oktober 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdPljVOXr26UE8Ms4t7EAbv758xspjsN5NTZ42zOpq1UvndGHDlpT0hfYK8MbSQY6_iLQSb00sqTp4emTwyd3PJfa3tgVw_FrRi1i_gxtZ11LzVN4x0H-b5UYOjZ1tIxY7QDVUQvxQZdwKyJiSzM3FjIiTJ2mozHDTvWmKEOLWeHb5oPKeQ1P0-smKM6JqIONrmPRW4oicEjbJtCFnrVmNOXTqB8tKd4Wg74Ysla2tZmnsW9V8zp4rhQ',
            quoteIcon: '🌿',
            quoteTitle: 'Harmoni Dedikasi Nusantara',
            quoteBody: '"Kala malam menyulam keheningan, dedaunan inovasi mekar dalam harmoni. Bersama kita merayakan karya, dedikasi, serta jalinan erat yang melahirkan dampak bagi peradaban nusantara."',
            profileBadge: 'Presidium Kehormatan',
            profileName: 'Raden Mas Suryo Wicaksono, M.B.A.',
            profileDesc: 'Ketua Umum Presidium KEKN • Dress Code: Midnight Navy & Gold',
            locationName: 'The Glasshouse Grand Sanctuary, The Langham Surabaya',
            events: [
                { title: 'Registrasi Tamu, Red Carpet & Welcoming Cocktail', time: '18:00 - 19:00 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'Grand Foyer Level 4' },
                { title: 'Gala Dinner & Mahakarya Komunitas Award', time: '19:30 - 22:00 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'The Glasshouse Grand Sanctuary' }
            ],
            giftTitle: '🌿 Filantropi & Tali Asih Komunitas',
            giftDesc: 'Partisipasi dan donasi filantropi untuk kelancaran program keakraban & riset komunitas:',
            wishTitle: 'Untaian Doa & Aspirasi Mitra',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['rustic-coral-peach'] = {
            name: 'Rustic Coral & Peach',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ultah',
            badge: '🎂 Sweet 17 • Rustic Coral & Peach',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain perayaan sweet seventeen / milad bernuansa rustic coral, soft peach & warm terracotta: arched portrait cover, 4-capsule countdown timer, agenda dinner, polaroid memories gallery, RSVP interactive & kado digital.',
            coverBadge: 'SWEET 17 MILESTONE',
            coverSubtitle: 'A Chapter Begins with Joy & Gratitude',
            coverTitle: 'Clarissa Aurelia Putri (Turning 17)',
            coverDate: 'Sabtu, 18 Juli 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCl-58-aEOJBWynlMYOA7IdVehsRB3f9J6PFL-BvQbbtZIfWuOAys0DysZwqpqIA3S8TB-ZOIIKySBw2uPbyQrjOnoc49Buz2G-lFL_7ptJiySDdXJ7PlEHNLHAIDD8lRdHqSNUbfq2RWS_vSiOBK8_kWG-8C1BNvQDbr1toqz9GUUFCh_umM9i7vhVtrgW4S2DAoX4EaaUKI9cv4GcAPmKVK6WedYKYC9Eqtynoe7x7M5Wvw-LVVqr',
            quoteIcon: '🍑',
            quoteTitle: 'Chapter Seventeen',
            quoteBody: '"A chapter begins, full of dreams, laughter, and endless gratitude. Merayakan 17 tahun penuh cinta dan kebahagiaan bersama orang-orang tersayang."',
            profileBadge: 'The Birthday Star',
            profileName: 'Clarissa Aurelia Putri',
            profileDesc: 'Putri tercinta Bpk. Hendra & Ibu Maya • Dress Code: Terracotta & Coral Charm',
            locationName: 'The Glass House Garden Cafe & Bistro, Surabaya',
            events: [
                { title: 'Welcoming & Polaroid Photo Session', time: '17:30 - 18:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Garden Foyer' },
                { title: 'Sweet 17 Party, Tiup Lilin & Dinner Banquet', time: '18:30 - 21:30 WIB', date: 'Sabtu, 18 Juli 2026', place: 'Main Dining Hall & Glasshouse' }
            ],
            giftTitle: '🍑 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum sahabat adalah kado terindah bagi Clarissa:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['arctic-frost'] = {
            name: 'Korporat Profesional Arctic Frost',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ultah',
            badge: '❄️ Sweet 17 • Arctic Frost Gala',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain perayaan ulang tahun / sweet seventeen eksekutif bertema Arctic Frost Gala: sampul amplop digital protokol VIP, segel lilin perak monogram, profil frosted architecture, countdown timer glacial, timeline agenda korporat, retrospeksi galeri, RSVP VIP & kado digital.',
            coverBadge: 'THE 17TH ANNUAL GALA',
            coverSubtitle: 'A Glacial Journey to the Future',
            coverTitle: 'Adrian Pradipta Utama (Turning 17)',
            coverDate: 'Sabtu, 24 Oktober 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJ8VRzqgHLqjfaecEXxl_mqq2r5mo2T_pkyJQkpcYycDu2T4QqzjiF8ENab-zz8klUlMzMvOs5IsZu-qUy1ScQ8YcUxmNfUU3cO2Gb_6CLnK9t90fgbfBfjQgnsDVF0cfVbz90HF4sYqMDGIW2MOjP6OmS34tz8QstMKKZGR3kyxGXfUQKXF0GcmLFuYcldfg8XChTGmcl2RPdo7SJaoskAyQfFAM3CmnxQh5w7FyMASCV8m9RaexH4w',
            quoteIcon: '❄️',
            quoteTitle: 'Visi & Kedewasaan',
            quoteBody: '"Merayakan kedewasaan, integritas visi, dan babak baru kepemimpinan dalam suasana keanggunan Arctic Frost."',
            profileBadge: 'The Honored Host',
            profileName: 'Adrian Pradipta Utama',
            profileDesc: 'Putra Bpk. Hendra Pratama & Ibu Maya Kusuma • Dress Code: Glacial Blue & Silver',
            locationName: 'The Grand Glacial Ballroom, SCBD Surabaya',
            events: [
                { title: 'Red Carpet, Photo Wall & Cocktail Reception', time: '18:30 - 19:30 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'Grand Foyer Level 4' },
                { title: 'Keynote, Birthday Toast & Gala Dinner', time: '19:30 - 22:00 WIB', date: 'Sabtu, 24 Oktober 2026', place: 'The Grand Glacial Ballroom' }
            ],
            giftTitle: '❄️ Kado Eksklusif & Tanda Kasih',
            giftDesc: 'Kehadiran Anda dalam perayaan gala ke-17 adalah kehormatan bagi kami:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['editorial-cherry-blossom'] = {
            name: 'Editorial Cherry Blossom',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ultah',
            badge: '🌸 Sweet 17 • Cherry Blossom',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain majalah editorial perayaan Sweet 17 bernuansa Sakura Reverie: palet blush rouge cherry, kartu amplop digital haute couture, countdown mekar musim semi, lookbook galeri eksklusif, RSVP terintegrasi & kado digital.',
            coverBadge: 'SAKURA REVERIE XVII',
            coverSubtitle: 'Celebrating 17 Blossoming Years',
            coverTitle: 'Valerie Chloe (Turning 17)',
            coverDate: 'Sabtu, 15 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJhtrSUcdvHwhkHrBrClKMrW5a8kpnKOnlh-6q-0hx9sEyhBV9GOT_8sDq3n04GcWPXbnQ8A9f432QivdnFhH96RmmhwfhahULsBf0O2savDB2VAFE5qiAcNfM6CXTOO-ipu8s0qMJqxaWJPruQkbFN2BRVFEA5DHO7DqujCeVzTiQHVAUcO9MjJyyHUQdkkVdcUjVa4bLFXm_EDbgsmOv5AVsYC6QxoqwBNWf-u_f',
            quoteIcon: '🌸',
            quoteTitle: 'Bloom of Youth',
            quoteBody: '"Like cherry blossoms in spring, seventeen arrives with grace, dreams, and radiant beginnings."',
            profileBadge: 'The Debutante',
            profileName: 'Valerie Chloe',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Sakura Pink & Haute Couture',
            locationName: 'The St. Regis Grand Ballroom, Jakarta',
            events: [
                { title: 'Cocktail & Red Carpet Welcome', time: '18:30 - 19:30 WIB', date: 'Sabtu, 15 November 2025', place: 'Ballroom Foyer' },
                { title: 'Sweet Seventeen Gala & Dinner', time: '19:30 - 22:00 WIB', date: 'Sabtu, 15 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🌸 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum hangat sahabat adalah kado terindah bagi Valerie:',
            wishTitle: 'Untaian Doa & Harapan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['orange-energy'] = {
            name: 'Elegan Klasik Orange Energy',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ultah',
            badge: '✨ Sweet 17 • Orange Energy',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kemegahan perayaan sweet seventeen bertema Aura Soleil XVII: nuansa terracotta & warm gold glamour, amplop digital segel wax seal, countdown jam pesta, galeri golden hour, panduan dress code & kado digital.',
            coverBadge: 'AURA SOLEIL XVII',
            coverSubtitle: 'A Radiant Twilight Welcoming Seventeen Suns',
            coverTitle: 'Clarissa Aurelia (Turning 17)',
            coverDate: 'Sabtu, 28 Oktober 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBqyWfjlXiyQzbIj4wDK6La3Dsgmaab3t9hoCW0K9c0M4VGiiqAYB_l1InauHWNKEiVOFqfh0Gqc5JDDPbsKp2NflMaV01FLo99nmIFXDweDjITeCxMLKsS0mR-nA4W2rJKU2nd2SoZd8MRfjI2pKrOqs6H9PPeSqQYbK4x4W97NxYeIIzL1GWp1RfMkpCmvTc2jKRsYMiSpvnDU5dvSNrMnyGb3UFERSqZfLCCPb53nH4B-aE8hAa_tQ',
            quoteIcon: '✨',
            quoteTitle: 'Golden Radiance',
            quoteBody: '"Di fajar usia ketujuh belas ini, seberkas tawa dan pelita persahabatan adalah anugerah terindah."',
            profileBadge: 'The Debutante',
            profileName: 'Clarissa Aurelia',
            profileDesc: 'Putri tercinta Bpk. Robert & Ibu Maria • Dress Code: Sunset Orange & Champagne',
            locationName: 'The Grand Ballroom, Hotel Mulia Senayan Jakarta',
            events: [
                { title: 'Sunset Welcoming & Canapé', time: '18:30 - 19:30 WIB', date: 'Sabtu, 28 Oktober 2025', place: 'Ballroom Foyer' },
                { title: 'Aura Soleil Gala & Candle Celebration', time: '19:30 - 22:30 WIB', date: 'Sabtu, 28 Oktober 2025', place: 'The Grand Ballroom' }
            ],
            giftTitle: '✨ Tanda Kasih & Hadiah Digital',
            giftDesc: 'Doa restu Anda adalah anugerah terbesar bagi kami:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['rustic-purple-dream'] = {
            name: 'Rustic Purple Dream',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun remaja',
            catKey: 'ultah',
            badge: '💜 Ultah Remaja • Rustic Purple',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain perayaan ulang tahun remaja bernuansa lavender, sage botanic & kertas kraft rustic: sampul amplop segel lilin inisial, countdown hari bahagia, panduan dress code rustic, galeri momen ceria & RSVP.',
            coverBadge: 'SPECIAL MILESTONE • SWEET 17',
            coverSubtitle: 'The Sweet Seventeen of Aurellia Keisha',
            coverTitle: 'Aurellia Keisha Putri (Turning 17)',
            coverDate: 'Sabtu, 24 Mei 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDUX3W9wcx9qK6OeMxJ_-QWLWl7-ECMAH1p5ONi2MAbP5dw4k0F7qbBK-oWrw8eKQIl-zcl2x2-B1sHgvmwJ1JZEqtk6HT4CRHYJ9Anwp5IHwfZnXxvgTvN1UBhkdS1Zi5tLLpZLHceb7jUSp4WSZklz4ZrhN3zyuAUXAlVHtQqM4xd2N24mW2JIru3hQPW-PjV1xcb2qUNuSyaSzJsgsabSIvuVV2Ol0xvKeVrzANATdZUHWfPxUmrJg',
            quoteIcon: '💜',
            quoteTitle: 'Taman Kehidupan',
            quoteBody: '"Tujuh belas tahun penuh anugerah dan cinta. Setiap detik adalah kelopak bunga yang mekar di taman kehidupan."',
            profileBadge: 'The Birthday Girl',
            profileName: 'Aurellia Keisha Putri',
            profileDesc: 'Putri kedua Keluarga Besar Bpk. & Ibu Keisha • Dress Code: Touch of Lavender / Rustic Earth',
            locationName: 'The Lavender Rustic Greenhouse & Garden, Jakarta',
            events: [
                { title: 'Sunset Gathering & Garden Party', time: '16:30 - 18:00 WIB', date: 'Sabtu, 24 Mei 2025', place: 'Greenhouse Garden' },
                { title: 'Dinner Reception & Cake Ceremony', time: '18:30 - 20:00 WIB', date: 'Sabtu, 24 Mei 2025', place: 'Lavender Pavilion' }
            ],
            giftTitle: '💜 Tanda Kasih & Kado Digital',
            giftDesc: 'Doa restu Anda merupakan kado terindah bagi kami:',
            wishTitle: 'Untaian Doa & Harapan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['botanical-emerald'] = {
            name: 'Pawiwahan Adat Jawa Geometris',
            category: 'Pernikahan',
            subCat: 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
            catKey: 'pernikahan',
            badge: '👑 Adat Jawa • Geometris Keraton',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain sakral adat Jawa bergaya geometris kontemporer: ornamen Gunungan & Kawung, serat ulem panggih, alunan Ladrang Wilujeng, dan amplop digital kersaning rahayu.',
            coverBadge: 'SERAT ULEM PAWIWAHAN AGENG',
            coverSubtitle: 'Miwiti Lampahing Katresnan',
            coverTitle: 'Arya & Rania',
            coverDate: 'Sabtu, 25 Oktober 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBLZUvfr0iFuEWva6_hLE8cc4TfljTBNR7QQBSEHnmgI1iye2T-gnXeYfFTP7u0Dj-8jxZhi3341gmMy3O40kydQi6ZM8_g5XZNelWUJJMZWnRMOoHoKBbc0frCovnxgiKZwMNwxnDy_WVYDPe2EjPFAIshBkn27CA6rFLZgskjXBhHKr256NUsVu_Zh8hus45z_mBJreVmTyBnfAXauHh-PT4DmeteFuhgrBtYywasDgAQmsM7_ppW5g',
            quoteIcon: '👑',
            quoteTitle: 'QS. Ar-Rum: 21',
            quoteBody: '"Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."',
            profileBadge: 'Mempelai Pengantin',
            profileName: 'Raden Mas Arya & Raden Ajeng Rania',
            profileDesc: 'Putra Bpk. K.R.T. Hendro Purnomo & Putri Bpk. Ir. H. Bambang Wicaksono',
            locationName: 'Grand Ballroom Sasana Kencana Surabaya',
            events: [
                { title: 'Upacara Ijab Qobul & Panggih Penganten', time: '08:00 - 10:30 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Pendopo Sasana Kencana' },
                { title: 'Resepsi Ageng & Pahargyan', time: '11:00 - 14:00 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Grand Ballroom Sasana Kencana' }
            ],
            giftTitle: 'Kersaning Rahayu & Tanda Tresna',
            giftDesc: 'Doa restu panjenengan sami karunia ingkang ageng tumraping kawula sarimbit:',
            wishTitle: 'Untaian Doa & Berkah Pangestu',
            audioSrc: '{{ asset("audio/wedding-melody.wav") }}'
        };

        // ==========================================
        // 15 Template Baru Kategori Ulang Tahun
        // ==========================================
        themePreviews['celeste-royale-baby-blue'] = {
            name: 'Elegan Klasik Baby Blue',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Baby Blue',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemewahan perayaan sweet seventeen bertema Celeste Royale: palet sapphire baby blue & emas klasik, amplop royal wax seal, arch portrait showcase, dress code etiquette, galeri lookbook eksklusif & RSVP.',
            coverBadge: 'CELESTE ROYALE XVII',
            coverSubtitle: 'Celebrating 17 Sapphire Years',
            coverTitle: 'Seraphina Claire Bleu (Turning 17)',
            coverDate: 'Sabtu, 25 Oktober 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDo3jH7wHdS-iczIwb8fXQYoaGu5UVi1IG_NOJqIRvLtomSf2OqJKeX2z0hrfrQYuE2vOOaiMM7UAsyIwFv-WFWVjFEbLb7dUg6yr4c7rIG636_EnQB4JYlMQ9cqfXvvtD1_Y8p5DpvL1nabH4nPEABbUjZsPoC-ivM5e7kofMyGZlE51KE91OpzoiVck5YUuY-tA_V4dby1G4DAPE4IJj7bQfujdggUSI9uVnCpnL5',
            quoteIcon: '✨',
            quoteTitle: 'Celestial Grace',
            quoteBody: '"Under the moonlit sapphire sky, a fairytale chapter unfolds at seventeen."',
            profileBadge: 'The Birthday Debutante',
            profileName: 'Seraphina Claire Bleu',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Sapphire Blue & Classic Gold',
            locationName: 'The Carlton Grand Ballroom, Jakarta',
            events: [
                { title: 'Royal Welcome & Cocktail', time: '18:30 - 19:30 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Ballroom Foyer' },
                { title: 'Celeste Gala & Cake Ceremony', time: '19:30 - 22:00 WIB', date: 'Sabtu, 25 Oktober 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan doa restu sahabat tercinta adalah kado terindah bagi Seraphina:',
            wishTitle: 'Untaian Doa & Ucapan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['terra-epoque-terracotta'] = {
            name: 'Editorial Terracotta',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Terracotta',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Desain majalah editorial haute couture bertema Terra Époque XVII: palet terracotta hangat & earthy bronze, amplop segel monogram, countdown mekar 17 tahun, galeri lookbook editorial & RSVP.',
            coverBadge: 'TERRA ÉPOQUE XVII',
            coverSubtitle: 'A Haute Couture Milestone at Seventeen',
            coverTitle: 'Audrey Calista (Turning 17)',
            coverDate: 'Sabtu, 1 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoyFSvSZfWDr4PYn8k6kebaH2uIyhUhjyP0L7DD2Xjw63ACK7bhdej_A-7fYYA-Vq3QQG-zQMJ5RC2eWTi8TgYK3ZOfbbKdlNeAaQWDHnnHzZvHxSjbbGBiua7AHUowi36w7Ck9xC97P0-S0nAAwpUSrDjVi9HQw6fi4WZfwxTEmLqwonIEivueP7G3seJE9ThdPEbc30yvJ7jztsljuIVXcMhwEIctWKn-9527hP_',
            quoteIcon: '🍂',
            quoteTitle: 'Warmth of Youth',
            quoteBody: '"Like the warm golden sun casting grace upon the earth, seventeen begins with beauty and gratitude."',
            profileBadge: 'The Debutante',
            profileName: 'Audrey Calista',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Warm Terracotta & Earthy Chic',
            locationName: 'The Glass House Grand Ballroom, Jakarta',
            events: [
                { title: 'Sunset Cocktail & Welcome', time: '18:00 - 19:00 WIB', date: 'Sabtu, 1 November 2025', place: 'Garden Terrace' },
                { title: 'Époque Gala Dinner', time: '19:00 - 21:30 WIB', date: 'Sabtu, 1 November 2025', place: 'Glass Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum hangat sahabat adalah kado terindah bagi Audrey:',
            wishTitle: 'Untaian Doa & Harapan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['forest-moss-seventeen'] = {
            name: 'Elegan Klasik Forest Moss',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Forest Moss',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Pesona perayaan sweet seventeen bertema Forest Moss XVII: kemegahan nuansa hijau lumut hutan purba & emas antik, amplop heraldic crest, panduan dress code vintage, galeri kenangan & RSVP.',
            coverBadge: 'FOREST MOSS XVII',
            coverSubtitle: 'Enchanted Woods of Seventeen',
            coverTitle: 'Charlotte Vivienne (Turning 17)',
            coverDate: 'Sabtu, 8 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA8rWbYbidJhZCYMtIfEZyCdrsoPqqPmooG1t4tbMp9UoKql5mdA7hL1v5xAow-ELL6M_QibaUpdTyIBqksG5X1Gznb3rsZj__6MKzEFWqGkmVNWT9XSn2I4z-Vp714HIQGsKE5PSAvaMuBZt3jEEAV2ZgkmAZET_GPTbnf6nOQKYh_ZfsLl_2jJUkXBfwP6J49QuO13g1pxuV0kFgtP9_lHUlzIsZReiM2OBc1dGfP',
            quoteIcon: '🌿',
            quoteTitle: 'Evergreen Grace',
            quoteBody: '"Like deep evergreen leaves in enchanted woods, seventeen unfolds in timeless grace."',
            profileBadge: 'The Birthday Star',
            profileName: 'Charlotte Vivienne',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Forest Green & Antique Gold',
            locationName: 'The St. Regis Grand Ballroom, Jakarta',
            events: [
                { title: 'Enchanted Twilight Reception', time: '18:30 - 19:30 WIB', date: 'Sabtu, 8 November 2025', place: 'Garden Foyer' },
                { title: 'Gala Dinner & Cake Ceremony', time: '19:30 - 22:00 WIB', date: 'Sabtu, 8 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa restu dan senyuman tulus Anda adalah anugerah terindah bagi Charlotte:',
            wishTitle: 'Untaian Doa & Berkah Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['emeraude-soiree-emerald'] = {
            name: 'Editorial Emerald Green',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Emerald Editorial',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kemilau perayaan musim mekar ke-17 bertema Émeraude Soirée XVII: nuansa zamrud emerald mewah & tipografi editorial majalah, amplop digital couture, countdown jam pesta, galeri lookbook & kado.',
            coverBadge: 'ÉMERAUDE SOIRÉE XVII',
            coverSubtitle: 'High-Fashion Spring Awakening',
            coverTitle: 'Madeleine Vivienne (Turning 17)',
            coverDate: 'Sabtu, 15 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDbF-0PPxJ4Qk8_4h-rlB3NeQJgwFUNaGmn3nURqjVZ_-aXgPEWiNymynuPyTV9SfrFEMMwzSKzo1iJkA9JnoAdKDSrK-c8-7gW7FS6Ddbojo4lLYP9EFI0NfS9vT-Ety31I3WCCVXJUEeiDUaNBZieXDvWzKRjDneMvOiWByXFJFym7fvEV7WcaMup7tpMmzYXI-r_045Q2Hk0ZQE8zxBhCvdb3dDN94mh3IFRFNrq',
            quoteIcon: '✨',
            quoteTitle: 'Emerald Glow',
            quoteBody: '"Under emerald chandeliers and starlit grace, seventeen unfolds into timeless splendor."',
            profileBadge: 'The Debutante',
            profileName: 'Madeleine Vivienne',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Emerald Green & Haute Couture',
            locationName: 'The Emerald Grand Ballroom, SCBD, Jakarta',
            events: [
                { title: 'Haute Cocktail Hour', time: '18:30 - 19:30 WIB', date: 'Sabtu, 15 November 2025', place: 'Emerald Foyer' },
                { title: 'Soirée Gala & Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 15 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa dan pelukan hangat sahabat adalah kado terindah bagi Madeleine:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['mocha-creme-seventeen'] = {
            name: 'Elegan Klasik Mocha Cream',
            category: 'Ulang Tahun',
            subCat: 'Sweet seventeen',
            catKey: 'ulang-tahun',
            badge: '🎂 Sweet 17 • Mocha Cream',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kehangatan pesta sweet seventeen bernuansa Mocha Crème XVII: harmoni warna kopi susu moka, karamel lembut & arsitektur katedral, amplop lilin inisial, rundown gala dinner & kado digital.',
            coverBadge: 'MOCHA CRÈME XVII',
            coverSubtitle: 'Sweet Warmth of Seventeen',
            coverTitle: 'Genevieve Aurelia (Turning 17)',
            coverDate: 'Sabtu, 22 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAp0uzCMYn1RFPpTPjL0ezWD7beXQ33BDUS06PEWMKDhZzZ0jtmr-HFDTMTZ2kN5i86LofMMwZ8I2iccyrcr8oBR58RRyGpTamh6MNlRphn4iyi1lS_Wnxijej3dpRIRvRl6N3QRKUO4P9ClNvxgX83e7T-qx_3mEe9BvISWzrGSdWcmak_nTgsQiSGJPcPG0QJjqgu4pAScWoqHSM2onDA2Hq5OYj7eltphFh4ALl',
            quoteIcon: '☕',
            quoteTitle: 'Amber Warmth',
            quoteBody: '"Like warm sunlight filtered through amber crystals, seventeen begins with grace and laughter."',
            profileBadge: 'The Birthday Star',
            profileName: 'Genevieve Aurelia',
            profileDesc: 'Putri tercinta Keluarga Besar Handoko • Dress Code: Mocha, Caramel & Creamy White',
            locationName: 'The Mulia Grand Ballroom, Jakarta',
            events: [
                { title: 'Welcome & High Tea', time: '17:30 - 18:30 WIB', date: 'Sabtu, 22 November 2025', place: 'Mulia Lounge' },
                { title: 'Mocha Gala Celebration', time: '18:30 - 21:30 WIB', date: 'Sabtu, 22 November 2025', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Kehadiran dan senyum ceria sahabat adalah kado termanis bagi Genevieve:',
            wishTitle: 'Untaian Doa & Harapan Indah',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['chapter-30-soft-pink'] = {
            name: 'Geometris Soft Pink',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Chapter 30 Pink',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Perayaan kedewasaan usia 30 tahun bernuansa modern geometric soft pink: refleksi babak kehidupan baru, rundown pesta intim & gala toast, mozaik galeri perjalanan usia & RSVP.',
            coverBadge: 'CHAPTER 30: MODERN RADIANCE',
            coverSubtitle: 'Celebrating Three Decades of Radiance',
            coverTitle: 'Clara Vivienne (Turning 30)',
            coverDate: 'Sabtu, 29 November 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdxp8bI3ax_s_0AjVgSYZMyddCLhePBYvG-Te4tPDIR9cDk6doi5QKPDQoOTR-CcibCNL_bMANS_Bf1rCxzfOqr943Wx4NSk0VMJMCX3ldCkiL14lqG3onjZon8DC6gC2Mv-JxwArNiI4EagFxv_oAc3qYJ0r8QzNcJLp7uQAIQcnBFD8eDb1e6fWFju0yyv0SqDcW5Lx25dnt4Fe6nC-sL981jL6Mci5RbywAVUnu',
            quoteIcon: '🌸',
            quoteTitle: 'Radiant Chapter',
            quoteBody: '"Entering thirty with boundless clarity, grateful heart, and modern radiance."',
            profileBadge: 'Milestone 30',
            profileName: 'Clara Vivienne',
            profileDesc: 'Celebrating Chapter 30 with beloved friends and family • Dress Code: Soft Pink & Chic Neutral',
            locationName: 'The Glasshouse Lounge, Kebayoran Baru, Jakarta',
            events: [
                { title: 'Intimate Welcome & Drinks', time: '18:30 - 19:30 WIB', date: 'Sabtu, 29 November 2025', place: 'Garden Terrace' },
                { title: 'Dinner & Milestone Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 29 November 2025', place: 'Glasshouse Lounge' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Asih',
            giftDesc: 'Doa terbaik dan tawa hangat Anda adalah kado paling bermakna bagi Clara:',
            wishTitle: 'Untaian Doa & Pesan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['midnight-soiree-navy'] = {
            name: 'Minimalis Modern Midnight Navy',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Midnight Navy',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Desain perayaan ulang tahun dewasa maskulin & prestisius bertema Midnight Soirée: palet biru malam pekat & aksen perak modern, amplop segel geometris, panduan cocktail attire & RSVP.',
            coverBadge: 'MIDNIGHT SOIRÉE: MILESTONE 35',
            coverSubtitle: 'Quiet Confidence at Thirty-Five',
            coverTitle: 'Adrian Wicaksono (Turning 35)',
            coverDate: 'Sabtu, 6 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuB6AtwKU1AzpfBSTFj3XjEmRw0vPFIRTZzX9ttciYelUfIjcTtnFjbuzz0QCoC_Ihg7jVXW9Of_Mko6R5ojZ30buJ2WjRGAhWvrD0O6ZsSr5zjEnvt5pNYPyQYB31jJGnfnHPEKGWtdQl8yUWMjOgDIiSClms-_ORe_H06CgXhzqBGZa8jW_mo_kxOJjgtsQZWvJa93zPFwGB7gIqvdHbqD50L7x_1jVSkMpGba_xQV',
            quoteIcon: '🍸',
            quoteTitle: 'Quiet Confidence',
            quoteBody: '"Entering thirty-five with clarity of mind, gratitude for every milestone, and quiet confidence."',
            profileBadge: 'Milestone 35',
            profileName: 'Adrian Wicaksono',
            profileDesc: 'Celebrating 35 Milestones • Dress Code: Midnight Navy & Modern Tailored',
            locationName: 'The Foundry Private Lounge, SCBD, Jakarta',
            events: [
                { title: 'Cocktail & Cigar Lounge', time: '19:00 - 20:00 WIB', date: 'Sabtu, 6 Desember 2025', place: 'Foundry Mezzanine' },
                { title: 'Dinner & Anniversary Toast', time: '20:00 - 22:30 WIB', date: 'Sabtu, 6 Desember 2025', place: 'Main Dining Room' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tanda Kasih',
            giftDesc: 'Kebersamaan dan doa tulus sahabat adalah kehormatan terbesar bagi Adrian:',
            wishTitle: 'Untaian Doa & Ucapan Selamat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['cyber-neon-futuristic'] = {
            name: 'Geometris Cyber Neon',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Cyber Neon 30',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Desain pesta ulang tahun futuristik bertema Cyber Neon: estetika grid fotonik, aksen cyan neon & dark mode berani, sound capsule HUD, countdown milidetik & VIP guest lounge pass.',
            coverBadge: 'PROTOCOL 3.0: CYBER SOIRÉE',
            coverSubtitle: 'Calibrated Focus at Thirty',
            coverTitle: 'Kevin Danuarta (Turning 30)',
            coverDate: 'Sabtu, 13 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD3O39080xYBuY92ven8_nxqUEtJWtJmjc0ojiEfLTTSysF8QNGd-kKBEVnNM8sWiDiIPWApWm_NA-xXN5MxTWkFJG8vLQ_RLTOzMLXQ-aAG0ZnGf722OaoSDock9C6lfQPOe3Bo7SSwmeP8YPVX1XEbm28MTquRseGzv2S6Fw0KH0wNalbxipi41zHt1J3da-lcIma34ErsMEVOkGSJ_dlWZ4pSB8bKBzVG2wV3-27',
            quoteIcon: '⚡',
            quoteTitle: 'Future Horizons',
            quoteBody: '"Entering thirty with calibrated focus, bold ambitions, and endless frequencies ahead."',
            profileBadge: 'Protocol Host',
            profileName: 'Kevin Danuarta',
            profileDesc: 'Celebrating Milestone 3.0 • Dress Code: Cyber Chic, Black & Neon Accents',
            locationName: 'Sky Cyber Lounge Level 42, Menara Astra, Jakarta',
            events: [
                { title: 'VIP Check-In & Sound Lab', time: '19:30 - 20:30 WIB', date: 'Sabtu, 13 Desember 2025', place: 'Cyber Foyer' },
                { title: 'The Cyber Protocol & Afterparty', time: '20:30 - 23:00 WIB', date: 'Sabtu, 13 Desember 2025', place: 'Sky Horizon Stage' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Digital Vault',
            giftDesc: 'Terima kasih atas kehadiran & doa terbaik Anda dalam merayakan Protocol 3.0:',
            wishTitle: 'Untaian Doa & Pesan Fotonik',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['crimson-soiree-bold-red'] = {
            name: 'Minimalis Modern Bold Red',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Bold Crimson',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kemegahan perayaan milad / ulang tahun babak ke-30 bertema Crimson Soirée: palet merah tua berani, tipografi sans modern tajam, amplop wax seal interaktif, galeri foto & kado digital.',
            coverBadge: 'CRIMSON SOIRÉE: CHAPTER 30',
            coverSubtitle: 'Bold Conviction at Thirty',
            coverTitle: 'Devan Pramudya (Turning 30)',
            coverDate: 'Sabtu, 20 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7u7oze2fsIArA9JU5fPuG8VRUbvwwHHb-KrIZrb-6grSw-5gzRr9d4NRYCwUvgglHPZnAbpiZdgmk3igMYj48mQ4V025UwNyp4Fx7CIbNcmth1HzAEB1R2j4pjOFa-jPPPrbjQmkvXQ_WiyjHSsRC9wgK6k4YBYMP0XKDRia3Bl1xUKOKKioGxZoMpFsTa5WPAWTesi5lR01didVxEZIQeB1FjNStLAIn57-KXjk0',
            quoteIcon: '🍷',
            quoteTitle: 'Bold Milestone',
            quoteBody: '"Entering thirty with clarity, bold conviction, and deep gratitude for every milestone."',
            profileBadge: 'Chapter 30',
            profileName: 'Devan Pramudya',
            profileDesc: 'Celebrating Thirty Bold Years • Dress Code: Crimson Red & Black Tie',
            locationName: 'The Crimson Room, Grand Hyatt Jakarta',
            events: [
                { title: 'Welcome Drinks & Red Carpet', time: '18:30 - 19:30 WIB', date: 'Sabtu, 20 Desember 2025', place: 'Crimson Lounge' },
                { title: 'Gala Dinner & Milestone Toast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 20 Desember 2025', place: 'Grand Room' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Kasih',
            giftDesc: 'Doa tulus dan kebersamaan sahabat adalah hadiah terindah bagi Devan:',
            wishTitle: 'Untaian Doa & Pesan Sahabat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['mint-soiree-geometric'] = {
            name: 'Geometris Mint Fresh',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dewasa',
            catKey: 'ulang-tahun',
            badge: '🎂 Ultah Dewasa • Mint Geometric',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kesegaran perayaan ulang tahun dewasa bernuansa Mint Soirée: aksen hijau mint sejuk, motif prisma geometris modern, amplop digital segel kristal, agenda brunch pesta & kado digital.',
            coverBadge: 'MINT SOIRÉE: CHAPTER 30',
            coverSubtitle: 'Grounded Clarity & Creative Energy',
            coverTitle: 'Reyhan Danendra (Turning 30)',
            coverDate: 'Sabtu, 27 Desember 2025',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBUa5nKhZ0fyl6HfSUiPmVfYSRkugaoIIVwHkk1ENHonrCXMjoMxptho-zDpnPvxzfHS5SwArIvMT9AJmWIksSEqiOFb0BawlfKgKS1ZE1TmBUIF7QjoHISS_Nbp8JKzK9PzMOIAA4lnzN2K8TuWzO8UDwFHaA4Res8LSgDUN-aVENIlxhskSils4ZdaPSKY1ReSqU0khblEOI4qiqC42YhbQwf4YG8aZ8TXg2SddA3',
            quoteIcon: '🌿',
            quoteTitle: 'Grounded Energy',
            quoteBody: '"Entering thirty with grounded clarity, creative energy, and deep gratitude for every milestone."',
            profileBadge: 'Chapter 30',
            profileName: 'Reyhan Danendra',
            profileDesc: 'Celebrating Milestone 30 • Dress Code: Fresh Mint & Crisp White',
            locationName: 'Botanica Glass Pavilion, Jakarta',
            events: [
                { title: 'Afternoon Brunch & Mocktails', time: '15:30 - 17:00 WIB', date: 'Sabtu, 27 Desember 2025', place: 'Garden Pavilion' },
                { title: 'Sunset Toast & Celebration', time: '17:00 - 19:30 WIB', date: 'Sabtu, 27 Desember 2025', place: 'Main Glasshouse' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Tali Asih',
            giftDesc: 'Doa hangat dan kehadiran sahabat adalah pelengkap kebahagiaan Reyhan:',
            wishTitle: 'Untaian Doa & Pesan Hangat',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['raden-arya-champagne'] = {
            name: 'Tradisional Nusantara Champagne Glow',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Champagne Glow',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Kisah petualangan karakter original Raden Arya & Sang Garuda Kencana: kemegahan budaya Nusantara bernuansa champagne emas berkilau, kisah babak legenda, rundown pesta & kado tali asih.',
            coverBadge: 'RADEN ARYA & GARUDA KENCANA',
            coverSubtitle: 'Kisah Legenda Budaya Nusantara',
            coverTitle: 'Raden Arya (Mahkota Garuda)',
            coverDate: 'Sabtu, 3 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuChhiII7NyQNgNEyDo4e3CDUnEaXefFwGqaSvtNSDIPhz6aXNTOlJXQvHKBntUXt1qMiMahvcuAwQwiIlOA_ynwTckrAoAe22MkZSaeWq-Oicetc-U9aUDXK6HiQH936eBuz2FlXP9ubXfYT4RKlRGCaIl0sqsTHiS6GoZzzLL9O0xttgksHjHumHI28k1rMeMfz8gaCpUxHNP1ncnt_U92ZIHI7bmI9ySJ5AHyCV_W',
            quoteIcon: '🦅',
            quoteTitle: 'Lentera Harapan',
            quoteBody: '"Menyemai keberanian, merayakan kehangatan budi, dan menyalakan lentera harapan di setiap langkah."',
            profileBadge: 'Karakter Original',
            profileName: 'Raden Arya & Sang Garuda Kencana',
            profileDesc: 'Petualangan Legenda Keraton Amarta • Dress Code: Champagne Gold & Kain Wastra Nusantara',
            locationName: 'Pendopo Agung Keraton Amarta, Yogyakarta',
            events: [
                { title: 'Pahargyan & Sambutan Tamu', time: '18:30 - 19:30 WIB', date: 'Sabtu, 3 Januari 2026', place: 'Pendopo Sasana' },
                { title: 'Gala Peringatan Hari Jadi', time: '19:30 - 22:00 WIB', date: 'Sabtu, 3 Januari 2026', place: 'Bale Ageng' }
            ],
            giftTitle: '🎁 Kado Tali Asih & Tanda Tresna',
            giftDesc: 'Pangestu lan pandonga panjenengan sami karunia ingkang ageng:',
            wishTitle: 'Untaian Doa & Berkah Pangestu',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['kaelen-black-gold'] = {
            name: 'Bold Modern Black & Gold',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Black & Gold',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Epos karakter original Kaelen The Golden Alchemist bernuansa obsidian hitam & emas berkilau: lambang alkimia kencana, amplop digital orisinal, galeri konsep ilustrasi, RSVP & kado digital.',
            coverBadge: 'CHRONICLES OF KAELEN',
            coverSubtitle: 'The Golden Crucible Milestone',
            coverTitle: 'Kaelen The Golden Alchemist',
            coverDate: 'Sabtu, 10 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHz4UXFn4ociTnCF57fyzbl1d8EV5RzIgHGDKHUUGUJxdwTzmNR8VJBvLOT37tbVjfi2yBhv3BGeEeb4deY95-F_iIYCjGn2V37V1LT8ut29iYJkKAiF5Z-sujhcSqwpS6zrgL00SiULyGatn0SRjad9g8CG1gigruFni56bu8hcoMd12JY6hqdkOqutMlstqbKaO0xyq356KnzG76cPwstl2n07SH-sSpkSMIGaeS',
            quoteIcon: '⚗️',
            quoteTitle: 'Golden Crucible',
            quoteBody: '"Di balik percikan alkimia kencana dan bayang-bayang obsidian, sebuah babak baru keberanian dimulai."',
            profileBadge: 'Original Character',
            profileName: 'Kaelen The Golden Alchemist',
            profileDesc: 'Epos Karakter Orisinal • Dress Code: Obsidian Black & Shimmering Gold',
            locationName: 'The Tribrata Grand Ballroom, Jakarta',
            events: [
                { title: 'The Alchemist Gathering', time: '18:30 - 19:30 WIB', date: 'Sabtu, 10 Januari 2026', place: 'Obsidian Foyer' },
                { title: 'The Crucible Gala & Feast', time: '19:30 - 22:00 WIB', date: 'Sabtu, 10 Januari 2026', place: 'Grand Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Alchemical Vault',
            giftDesc: 'Kehadiran Anda dan untaian doa adalah permata paling berharga bagi Kaelen:',
            wishTitle: 'Untaian Doa & Catatan Alkimia',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['arya-nature-green'] = {
            name: 'Tradisional Nusantara Nature Green',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Nature Green',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Petualangan Raden Arya & Sang Rusa Kencana di rimba nusantara asri: palet hijau zamrud alam & motif batik dedaunan, kisah lore karakter, countdown pesta, galeri ilustrasi dongeng & RSVP.',
            coverBadge: 'ARYA & RUSA KENCANA',
            coverSubtitle: 'Petualangan Rimba Nusantara Asri',
            coverTitle: 'Raden Arya (Rusa Kencana)',
            coverDate: 'Sabtu, 17 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCjVy2TeXVgsz9WfnhHt8yTWrNagKryxUdKB3EEGikw2vGtgHqurtrWxXb5T52vnRnjs7N9leYwV98qlSXlCRO0JaRtl9rTUXAHDpvxrh55YhyoMme7DQYOs-aF4ITT9MlPSU8YlDReovsZuTGVgSGS53OJNngQQQgvM8zs_WrBAUCButfwPoJhZlxNYnY4slfWxpD7Ce7ock4ehzslrx2HIhowPQ9_NjYCkYTSfpx-',
            quoteIcon: '🌿',
            quoteTitle: 'Rimba Asri',
            quoteBody: '"Di mana daun berbisik dan akar merangkul bumi, di sanalah keberanian mekar memberikan perlindungan."',
            profileBadge: 'Karakter Orisinal',
            profileName: 'Raden Arya & Sang Rusa Kencana',
            profileDesc: 'Kisah Sahabat Rimba Nusantara • Dress Code: Nature Forest Green & Earth Tone',
            locationName: 'Hutan Kota by Plataran, GBK, Jakarta',
            events: [
                { title: 'Sambutan Rimba Asri', time: '16:00 - 17:30 WIB', date: 'Sabtu, 17 Januari 2026', place: 'Garden Amphitheater' },
                { title: 'Perayaan Syukuran Hari Jadi', time: '17:30 - 20:00 WIB', date: 'Sabtu, 17 Januari 2026', place: 'Plataran Glasshouse' }
            ],
            giftTitle: '🎁 Kado Hari Jadi & Tali Asih',
            giftDesc: 'Doa kebaikan dan kebersamaan Anda adalah berkah terindah bagi kami:',
            wishTitle: 'Untaian Doa & Pesan Sahabat Rimba',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['solaris-sunset-gradient'] = {
            name: 'Bold Modern Sunset Gradient',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Sunset Solaris',
            packageVal: 'Paket Eksklusif - Rp180.000',
            desc: 'Karakter orisinal Solaris The Sunset Guardian dalam kobaran gradien jingga senja & ungu kosmik: amplop digital perisai surya, rundown perayaan malam, konsep visual karakter & RSVP.',
            coverBadge: 'SOLARIS: SUNSET CONVERGENCE',
            coverSubtitle: 'The Guardian of Dusk & Dawn',
            coverTitle: 'Solaris The Sunset Guardian',
            coverDate: 'Sabtu, 24 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuClcfkEaZIvqACRX7sQ9n4fdhnAvglnuCHev9Jw3KNiN-290xidPlQ0OhLOyNpHsRS99zWpm1INpsj6pOEVbVYvo5aPGaarsVgzRfMmqp0GoVsO-KD0lgo2quIewVhhLCiZg4mtjMiI1t1mBy9OFj4A-RJbaUTetFR3wiuQMNHPz6-prW-q6bNU7ov7Mr0QmsryY24_vaJNpET9R9P6aAGpL-M17m8sfgL1GwzSQ1LO',
            quoteIcon: '🌅',
            quoteTitle: 'Sunset Hope',
            quoteBody: '"Di batas cakrawala senja di mana nyala api keberanian bertemu kehangatan harapan, kita berkumpul merayakan babak baru."',
            profileBadge: 'Original Guardian',
            profileName: 'Solaris The Sunset Guardian',
            profileDesc: 'Karakter Orisinal Solaris • Dress Code: Sunset Orange, Cosmic Purple & Gold',
            locationName: 'The Sky Ballroom Level 50, The Westin Jakarta',
            events: [
                { title: 'Dusk Gathering & Solar Pass', time: '18:00 - 19:30 WIB', date: 'Sabtu, 24 Januari 2026', place: 'Sky View Foyer' },
                { title: 'Convergence Gala & Night Show', time: '19:30 - 22:30 WIB', date: 'Sabtu, 24 Januari 2026', place: 'Main Sky Ballroom' }
            ],
            giftTitle: '🎁 Kado Ulang Tahun & Solar Vault',
            giftDesc: 'Kehadiran sahabat dan senyuman di senja ini adalah anugerah terbesar bagi Solaris:',
            wishTitle: 'Untaian Doa & Pesan Senja',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        themePreviews['raden-arya-warm-neutral'] = {
            name: 'Tradisional Nusantara Warm Neutral',
            category: 'Ulang Tahun',
            subCat: 'Ulang tahun dengan tema kartun atau karakter original',
            catKey: 'ulang-tahun',
            badge: '🎂 Karakter Original • Warm Neutral',
            packageVal: 'Paket Premium - Rp110.000',
            desc: 'Kisah karakter original Raden Arya & Harimau Kencana dalam kehangatan palet krem netral & cokelat kayu pusaka: amplop segel cap kerajaan, rundown perayaan hari jadi, galeri & kado digital.',
            coverBadge: 'RADEN ARYA & HARIMAU KENCANA',
            coverSubtitle: 'Sahabat Rimba Kencana',
            coverTitle: 'Raden Arya (Harimau Kencana)',
            coverDate: 'Sabtu, 31 Januari 2026',
            coverImg: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCBJvzfATdhJNsKqQFM8bcceCwM83vXIOapX9wCDy6S9Tr6GSCGTrPdd3B9Boj7nebgHuYxaF2d7eeFW4hG1_bbs2mAkobgH-1agTAglYsgyJiGlfRNvDsooFfKkvu_kStFgAYCrP3oAViQCp6PLzRb8vaRaGYXN5XqMn56bhAm65WFZtgn1nHI72acw3-du-ek6OGctqZvfKAWbg9egOiYki3KovzdvnnpVz3GkY99',
            quoteIcon: '🐅',
            quoteTitle: 'Lentera Kebaikan',
            quoteBody: '"Menapaki rimba kencana, merajut kebaikan budi pekerti, dan menyalakan lentera harapan bagi sesama."',
            profileBadge: 'Karakter Orisinal',
            profileName: 'Raden Arya & Harimau Kencana',
            profileDesc: 'Kisah Budi Luhur Keraton Nusantara • Dress Code: Warm Neutral, Cream & Wooden Brown',
            locationName: 'Plataran Dharmawangsa, Jakarta',
            events: [
                { title: 'Temu Ramah & Jamuan Teh Hangat', time: '17:30 - 18:30 WIB', date: 'Sabtu, 31 Januari 2026', place: 'Joglo Foyer' },
                { title: 'Tasyakuran & Perayaan Hari Jadi', time: '18:30 - 21:00 WIB', date: 'Sabtu, 31 Januari 2026', place: 'Pendopo Utama' }
            ],
            giftTitle: '🎁 Kado Hari Jadi & Tali Tresna',
            giftDesc: 'Pangestu dan doa tulus panjenengan sami adalah anugerah terindah:',
            wishTitle: 'Untaian Doa & Berkah Pangestu',
            audioSrc: '{{ asset("audio/celebration-melody.wav") }}'
        };

        // Extra alias mapping
        themePreviews['floral-midnight'] = themePreviews['floral-midnight-navy'];
        themePreviews['rustic-coral'] = themePreviews['rustic-coral-peach'];
        themePreviews['korporat-profesional'] = themePreviews['formal-corporate'];
        themePreviews['corporate-profesional'] = themePreviews['formal-corporate'];
        themePreviews['executive-corporate'] = themePreviews['formal-corporate'];
        themePreviews['botanical'] = themePreviews['botanical-emerald'];
        themePreviews['pawiwahan'] = themePreviews['botanical-emerald'];
        themePreviews['jawa-geometris'] = themePreviews['botanical-emerald'];

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
                { slug: 'botanical-emerald', name: 'Pawiwahan Adat Jawa', tag: 'Gunungan Geometris Keraton', icon: '👑', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/botanical-emerald' },
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
                { slug: 'walimatul-khitan-sahaja', name: 'Walimatul Khitan Sahaja', tag: 'Khitanan Sahaja Basic', icon: '✂️', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/walimatul-khitan-sahaja' },
                { slug: 'sweet-baby-pastel-aqiqah', name: 'Sweet Baby Pastel', tag: 'Aqiqah Bayi & Tasmiyah', icon: '🍼', iconBg: 'bg-pink-100 text-pink-700', demoUrl: '/demo/baby-aqiqah' },
                { slug: 'walimatul-khitan-berkah-sholeh', name: 'Walimatul Khitan Berkah', tag: 'Khitanan Islami Sholeh', icon: '🕌', iconBg: 'bg-blue-100 text-blue-700', demoUrl: '/demo/walimatul-khitan' },
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
                { slug: 'golden-luxury-birthday-milad', name: 'Golden Luxury Birthday', tag: 'Sweet 17th & Milad', icon: '🎂', iconBg: 'bg-yellow-100 text-yellow-800', demoUrl: '/demo/golden-birthday' },
                { slug: 'rustic-coral-peach', name: 'Rustic Coral & Peach', tag: 'Sweet 17th Terracotta & Peach', icon: '🍑', iconBg: 'bg-rose-100 text-rose-800', demoUrl: '/demo/rustic-coral-peach' },
                { slug: 'arctic-frost', name: 'Korporat Profesional Arctic Frost', tag: 'Sweet 17th Glacial VIP', icon: '❄️', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/arctic-frost' },
                { slug: 'editorial-cherry-blossom', name: 'Editorial Cherry Blossom', tag: 'Sweet 17th Sakura Reverie', icon: '🌸', iconBg: 'bg-pink-100 text-pink-800', demoUrl: '/demo/editorial-cherry-blossom' },
                { slug: 'orange-energy', name: 'Elegan Klasik Orange Energy', tag: 'Sweet 17th Aura Soleil', icon: '✨', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/orange-energy' },
                { slug: 'rustic-purple-dream', name: 'Rustic Purple Dream', tag: 'Ultah Remaja Lavender', icon: '💜', iconBg: 'bg-purple-100 text-purple-800', demoUrl: '/demo/rustic-purple-dream' },
                { slug: 'celeste-royale-baby-blue', name: 'Elegan Klasik Baby Blue', tag: 'Sweet 17th Sapphire & Gold', icon: '💎', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/celeste-royale-baby-blue' },
                { slug: 'terra-epoque-terracotta', name: 'Editorial Terracotta', tag: 'Sweet 17th Editorial Haute', icon: '🏺', iconBg: 'bg-amber-100 text-amber-800', demoUrl: '/demo/terra-epoque-terracotta' },
                { slug: 'forest-moss-seventeen', name: 'Elegan Klasik Forest Moss', tag: 'Sweet 17th Vintage Enchanted', icon: '🌲', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/forest-moss-seventeen' },
                { slug: 'emeraude-soiree-emerald', name: 'Editorial Emerald Green', tag: 'Sweet 17th Zamrud Editorial', icon: '💚', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/emeraude-soiree-emerald' },
                { slug: 'mocha-creme-seventeen', name: 'Elegan Klasik Mocha Cream', tag: 'Sweet 17th Moka & Karamel', icon: '🤎', iconBg: 'bg-stone-100 text-stone-800', demoUrl: '/demo/mocha-creme-seventeen' },
                { slug: 'chapter-30-soft-pink', name: 'Geometris Soft Pink', tag: 'Ultah Dewasa 30 Geometric', icon: '💖', iconBg: 'bg-pink-100 text-pink-700', demoUrl: '/demo/chapter-30-soft-pink' },
                { slug: 'midnight-soiree-navy', name: 'Minimalis Modern Midnight Navy', tag: 'Ultah Dewasa 35 Maskulin', icon: '🌌', iconBg: 'bg-indigo-100 text-indigo-800', demoUrl: '/demo/midnight-soiree-navy' },
                { slug: 'cyber-neon-futuristic', name: 'Geometris Cyber Neon', tag: 'Ultah Dewasa 30 Cyan Neon', icon: '⚡', iconBg: 'bg-cyan-100 text-cyan-800', demoUrl: '/demo/cyber-neon-futuristic' },
                { slug: 'crimson-soiree-bold-red', name: 'Minimalis Modern Bold Red', tag: 'Ultah Dewasa 30 Merah Berani', icon: '🍷', iconBg: 'bg-rose-100 text-rose-800', demoUrl: '/demo/crimson-soiree-bold-red' },
                { slug: 'mint-soiree-geometric', name: 'Geometris Mint Fresh', tag: 'Ultah Dewasa 30 Mint Sejuk', icon: '🍃', iconBg: 'bg-teal-100 text-teal-800', demoUrl: '/demo/mint-soiree-geometric' },
                { slug: 'raden-arya-champagne', name: 'Tradisional Nusantara Champagne Glow', tag: 'Karakter Nusantara Champagne', icon: '👑', iconBg: 'bg-yellow-100 text-yellow-800', demoUrl: '/demo/raden-arya-champagne' },
                { slug: 'kaelen-black-gold', name: 'Bold Modern Black & Gold', tag: 'Karakter Obsidian & Emas', icon: '⚔️', iconBg: 'bg-stone-100 text-stone-800', demoUrl: '/demo/kaelen-black-gold' },
                { slug: 'arya-nature-green', name: 'Tradisional Nusantara Nature Green', tag: 'Karakter Rusa Kencana Rimba', icon: '🦌', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/arya-nature-green' },
                { slug: 'solaris-sunset-gradient', name: 'Bold Modern Sunset Gradient', tag: 'Karakter Senja Jingga & Ungu', icon: '🌅', iconBg: 'bg-orange-100 text-orange-800', demoUrl: '/demo/solaris-sunset-gradient' },
                { slug: 'raden-arya-warm-neutral', name: 'Tradisional Nusantara Warm Neutral', tag: 'Karakter Harimau Kencana Krem', icon: '🐅', iconBg: 'bg-stone-100 text-stone-800', demoUrl: '/demo/raden-arya-warm-neutral' },
            ],
            'acara-formal': [
                { slug: 'clean-seminar', name: 'Clean Tech Seminar & Workshop', tag: 'Simposium & Konferensi Basic', icon: '🎙️', iconBg: 'bg-sky-100 text-sky-800', demoUrl: '/demo/clean-seminar' },
                { slug: 'reuni-akbar', name: 'Reuni Akbar Sapphire Silver', tag: 'Gala Dinner Alumni Navy', icon: '🥂', iconBg: 'bg-blue-100 text-blue-800', demoUrl: '/demo/reuni-akbar' },
                { slug: 'floral-midnight-navy', name: 'Floral Midnight Navy', tag: 'Acara Komunitas Eksklusif', icon: '🌿', iconBg: 'bg-emerald-100 text-emerald-800', demoUrl: '/demo/floral-midnight-navy' },
                { slug: 'formal-corporate', name: 'Korporat Profesional & Grand Opening', tag: 'Grand Opening & Bisnis VIP', icon: '🏢', iconBg: 'bg-indigo-100 text-indigo-800', demoUrl: '/demo/formal-corporate' }
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
            const bdaySlugs = ['celeste-royale-baby-blue', 'terra-epoque-terracotta', 'forest-moss-seventeen', 'emeraude-soiree-emerald', 'mocha-creme-seventeen', 'chapter-30-soft-pink', 'midnight-soiree-navy', 'cyber-neon-futuristic', 'crimson-soiree-bold-red', 'mint-soiree-geometric', 'raden-arya-champagne', 'kaelen-black-gold', 'arya-nature-green', 'solaris-sunset-gradient', 'raden-arya-warm-neutral'];
            if (bdaySlugs.includes(s) || cat.includes('ulang') || catKey === 'ulang-tahun' || catKey === 'ultah' || s.includes('cheerful') || s.includes('confetti') || s.includes('birthday') || s.includes('milad') || s.includes('ultah') || s.includes('ulang') || s.includes('rustic') || s.includes('coral') || s.includes('peach') || s.includes('arctic') || s.includes('frost') || s.includes('cherry') || s.includes('sakura') || s.includes('orange') || s.includes('soleil') || s.includes('purple') || s.includes('lavender')) {
                return 'ulang-tahun';
            }
            if (cat.includes('formal') || catKey === 'formal' || catKey === 'acara-formal' || s.includes('seminar') || s.includes('workshop') || s.includes('corporate') || s.includes('korporat') || s.includes('reuni') || s.includes('floral-midnight') || s.includes('midnight-navy') || s.includes('nocturne') || s.includes('komunitas')) {
                return 'acara-formal';
            }
            return 'pernikahan';
        }

        // Direct Map of Canonical Slugs to Demo Routes
        const demoUrlMap = {
            'botanical-emerald': '/demo/botanical-emerald',
            'botanical': '/demo/botanical-emerald',
            'pawiwahan': '/demo/botanical-emerald',
            'jawa-geometris': '/demo/botanical-emerald',
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
            'walimatul-khitan-sahaja': '/demo/walimatul-khitan-sahaja',
            'khitan-sahaja': '/demo/walimatul-khitan-sahaja',
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
            'rustic-coral-peach': '/demo/rustic-coral-peach',
            'rustic-coral': '/demo/rustic-coral-peach',
            'arctic-frost': '/demo/arctic-frost',
            'editorial-cherry-blossom': '/demo/editorial-cherry-blossom',
            'cherry-blossom': '/demo/editorial-cherry-blossom',
            'sakura-reverie': '/demo/editorial-cherry-blossom',
            'orange-energy': '/demo/orange-energy',
            'aura-soleil': '/demo/orange-energy',
            'rustic-purple-dream': '/demo/rustic-purple-dream',
            'purple-dream': '/demo/rustic-purple-dream',
            'celeste-royale-baby-blue': '/demo/celeste-royale-baby-blue',
            'terra-epoque-terracotta': '/demo/terra-epoque-terracotta',
            'forest-moss-seventeen': '/demo/forest-moss-seventeen',
            'emeraude-soiree-emerald': '/demo/emeraude-soiree-emerald',
            'mocha-creme-seventeen': '/demo/mocha-creme-seventeen',
            'chapter-30-soft-pink': '/demo/chapter-30-soft-pink',
            'midnight-soiree-navy': '/demo/midnight-soiree-navy',
            'cyber-neon-futuristic': '/demo/cyber-neon-futuristic',
            'crimson-soiree-bold-red': '/demo/crimson-soiree-bold-red',
            'mint-soiree-geometric': '/demo/mint-soiree-geometric',
            'raden-arya-champagne': '/demo/raden-arya-champagne',
            'kaelen-black-gold': '/demo/kaelen-black-gold',
            'arya-nature-green': '/demo/arya-nature-green',
            'solaris-sunset-gradient': '/demo/solaris-sunset-gradient',
            'raden-arya-warm-neutral': '/demo/raden-arya-warm-neutral',
            'clean-seminar': '/demo/clean-seminar',
            'clean-tech-seminar-workshop': '/demo/clean-seminar',
            'clean-tech-seminar': '/demo/clean-seminar',
            'reuni-akbar-temu-kangen': '/demo/reuni-akbar',
            'reuni-akbar': '/demo/reuni-akbar',
            'floral-midnight-navy': '/demo/floral-midnight-navy',
            'floral-midnight': '/demo/floral-midnight-navy',
            'executive-corporate-grand-opening': '/demo/formal-corporate',
            'formal-corporate': '/demo/formal-corporate',
            'korporat-profesional': '/demo/formal-corporate',
            'corporate-profesional': '/demo/formal-corporate',
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
                                 (item.slug === 'formal-corporate' && (activeSlug === 'executive-corporate-grand-opening' || activeSlug.includes('corporate') || activeSlug.includes('korporat'))) ||
                                 (item.slug === 'floral-midnight-navy' && (activeSlug.includes('floral-midnight') || activeSlug.includes('midnight-navy') || activeSlug.includes('nocturne'))) ||
                                 (item.slug === 'editorial-cherry-blossom' && (activeSlug.includes('cherry') || activeSlug.includes('sakura'))) ||
                                 (item.slug === 'orange-energy' && (activeSlug.includes('orange') || activeSlug.includes('soleil'))) ||
                                 (item.slug === 'rustic-purple-dream' && (activeSlug.includes('purple') || activeSlug.includes('lavender'))) ||
                                 (item.slug === 'rustic-coral-peach' && (activeSlug.includes('rustic') || activeSlug.includes('coral') || activeSlug.includes('peach'))) ||
                                 (item.slug === 'arctic-frost' && (activeSlug.includes('arctic') || activeSlug.includes('frost') || activeSlug.includes('glacial'))) ||
                                 (item.slug === 'botanical-emerald' && (activeSlug.includes('botanical') || activeSlug.includes('pawiwahan'))) ||
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
                                 (activeSlug.includes('sahaja') && item.slug === 'walimatul-khitan-sahaja') ||
                                 (!activeSlug.includes('sahaja') && (activeSlug.includes('walimatul-khitan') || activeSlug.includes('khitan') || activeSlug.includes('sunat')) && item.slug === 'walimatul-khitan-berkah-sholeh') ||
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
            const rawSlug = (slug || '').toLowerCase().trim();
            
            // Map legacy / alternative slugs to canonical themePreviews keys
            let matchedSlug = rawSlug;
            if (themePreviews[rawSlug]) {
                matchedSlug = rawSlug;
            } else
            if (rawSlug.includes('cherry') || rawSlug.includes('sakura')) {
                matchedSlug = 'editorial-cherry-blossom';
            } else if (rawSlug.includes('orange') || rawSlug.includes('soleil')) {
                matchedSlug = 'orange-energy';
            } else if (rawSlug.includes('purple') || rawSlug.includes('lavender')) {
                matchedSlug = 'rustic-purple-dream';
            } else if (rawSlug.includes('floral-midnight') || rawSlug.includes('midnight-navy') || rawSlug.includes('nocturne') || (rawSlug.includes('floral') && rawSlug.includes('navy')) || (rawSlug.includes('komunitas') && !rawSlug.includes('chibi'))) {
                matchedSlug = 'floral-midnight-navy';
            } else if (rawSlug.includes('rustic') || rawSlug.includes('coral') || rawSlug.includes('peach')) {
                matchedSlug = 'rustic-coral-peach';
            } else if (rawSlug.includes('arctic') || rawSlug.includes('frost') || rawSlug.includes('glacial')) {
                matchedSlug = 'arctic-frost';
            } else if (rawSlug.includes('botanical') || rawSlug.includes('pawiwahan') || (rawSlug.includes('jawa') && rawSlug.includes('geometris'))) {
                matchedSlug = 'botanical-emerald';
            } else if (rawSlug.includes('chibi') || rawSlug.includes('oriental')) {
                matchedSlug = 'chibi-red';
            } else if (rawSlug.includes('wildflower') || rawSlug.includes('rose-romance') || rawSlug.includes('elegant-rose')) {
                matchedSlug = 'wildflower-pink';
            } else if (rawSlug.includes('javanese') || rawSlug.includes('keraton')) {
                matchedSlug = '3d-javanese-royal';
            } else if (rawSlug.includes('minimalist') && !rawSlug.includes('snow')) {
                matchedSlug = 'simple-minimalist-floral';
            } else if (rawSlug.includes('snowfall') || rawSlug.includes('snow')) {
                matchedSlug = 'snowfall-minimalist-white';
            } else if (rawSlug.includes('batak')) {
                matchedSlug = 'batak-istimewa-heritage';
            } else if (rawSlug.includes('mosque') || rawSlug.includes('syiar')) {
                matchedSlug = 'green-mosque';
            } else if (rawSlug.includes('walimatus-safar') || rawSlug.includes('safar') || rawSlug.includes('ka\'bah') || rawSlug.includes('kiswah')) {
                matchedSlug = 'walimatus-safar';
            } else if (rawSlug.includes('ketupat') || rawSlug.includes('halal')) {
                matchedSlug = 'ketupat-raya-silaturahmi';
            } else if (rawSlug.includes('little-prince') || rawSlug.includes('prince') || rawSlug.includes('nordic')) {
                matchedSlug = 'little-prince';
            } else if (rawSlug.includes('royal-tasmiyah') || rawSlug.includes('tasmiyah') || rawSlug.includes('sultan')) {
                matchedSlug = 'royal-tasmiyah';
            } else if (rawSlug.includes('sahaja') || rawSlug.includes('khitan-sahaja')) {
                matchedSlug = 'walimatul-khitan-sahaja';
            } else if (rawSlug.includes('khitan') || rawSlug.includes('sunat')) {
                matchedSlug = 'walimatul-khitan-berkah-sholeh';
            } else if (rawSlug.includes('rumah-baru') || rawSlug.includes('syukuran')) {
                matchedSlug = 'tasyakuran-doa-rumah-baru';
            } else if (rawSlug.includes('tahlil') || rawSlug.includes('doa-bersama')) {
                matchedSlug = 'doa-bersama-tahlilan-khusyuk';
            } else if (rawSlug.includes('graduate') || rawSlug.includes('modern-graduate')) {
                matchedSlug = 'modern-graduate';
            } else if (rawSlug.includes('scholar') || rawSlug.includes('valedictorian') || rawSlug.includes('ivy')) {
                matchedSlug = 'scholar-luxury';
            } else if (rawSlug.includes('wisuda') || rawSlug.includes('sarjana') || rawSlug.includes('kelulusan')) {
                matchedSlug = 'wisuda-sarjana-prestasi-emas';
            } else if (rawSlug.includes('cheerful') || rawSlug.includes('confetti')) {
                matchedSlug = 'cheerful-birthday';
            } else if (rawSlug.includes('kid') || rawSlug.includes('anak') || rawSlug.includes('balon')) {
                matchedSlug = 'kids-birthday-party-balon-ceria';
            } else if (rawSlug.includes('golden') || rawSlug.includes('birthday') || rawSlug.includes('milad') || rawSlug.includes('ultah') || rawSlug.includes('ulang')) {
                matchedSlug = 'golden-birthday';
            } else if (rawSlug.includes('seminar') || rawSlug.includes('workshop') || rawSlug.includes('clean-seminar') || rawSlug.includes('clean-tech')) {
                matchedSlug = 'clean-seminar';
            } else if (rawSlug.includes('reuni') || rawSlug.includes('alumni')) {
                matchedSlug = 'reuni-akbar';
            } else if (rawSlug.includes('baby') || rawSlug.includes('pastel') || rawSlug.includes('aqiqah')) {
                matchedSlug = 'sweet-baby-pastel-aqiqah';
            } else if (rawSlug.includes('corporate') || rawSlug.includes('korporat') || rawSlug.includes('formal') || rawSlug.includes('opening')) {
                matchedSlug = 'formal-corporate';
            }

            const theme = themePreviews[matchedSlug] || themePreviews[rawSlug] || themePreviews['chibi-red'];
            currentCategoryKey = detectCategoryKey(matchedSlug, theme);
            currentPreviewSlug = matchedSlug;

            renderThemePreview(theme, matchedSlug);
            renderCategorySelectorGrid(matchedSlug, currentCategoryKey);

            // Determine target iframe url strictly matching the template
            let targetUrl = demoUrlMap[matchedSlug] || demoUrlMap[rawSlug] || ('/demo/' + matchedSlug);
            if (!targetUrl) {
                const catList = categoryTemplates[currentCategoryKey] || categoryTemplates['pernikahan'];
                const foundItem = catList.find(item => item.slug === matchedSlug || item.slug === rawSlug);
                if (foundItem && foundItem.demoUrl) {
                    targetUrl = foundItem.demoUrl;
                } else if (matchedSlug.includes('floral-midnight') || matchedSlug.includes('midnight-navy') || matchedSlug.includes('nocturne')) {
                    targetUrl = '/demo/floral-midnight-navy';
                } else if (matchedSlug.includes('rustic') || matchedSlug.includes('coral') || matchedSlug.includes('peach')) {
                    targetUrl = '/demo/rustic-coral-peach';
                } else if (matchedSlug.includes('arctic') || matchedSlug.includes('frost')) {
                    targetUrl = '/demo/arctic-frost';
                } else if (matchedSlug.includes('botanical') || matchedSlug.includes('pawiwahan')) {
                    targetUrl = '/demo/botanical-emerald';
                } else if (matchedSlug.includes('kid') || matchedSlug.includes('anak') || matchedSlug.includes('balon')) {
                    targetUrl = '/demo/kids-birthday';
                } else if (matchedSlug.includes('little-prince') || matchedSlug.includes('prince') || matchedSlug.includes('nordic')) {
                    targetUrl = '/demo/little-prince';
                } else if (matchedSlug.includes('royal-tasmiyah') || matchedSlug.includes('tasmiyah') || matchedSlug.includes('sultan')) {
                    targetUrl = '/demo/royal-tasmiyah';
                } else if (matchedSlug.includes('sahaja')) {
                    targetUrl = '/demo/walimatul-khitan-sahaja';
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
                    targetUrl = '/demo/golden-birthday';
                } else if (currentCategoryKey === 'aqiqah' || matchedSlug.includes('baby') || matchedSlug.includes('pastel') || matchedSlug.includes('aqiqah')) {
                    targetUrl = '/demo/baby-aqiqah';
                } else if (currentCategoryKey === 'acara-formal' || matchedSlug.includes('corporate') || matchedSlug.includes('korporat') || matchedSlug.includes('formal') || matchedSlug.includes('reuni') || matchedSlug.includes('seminar')) {
                    targetUrl = '/demo/formal-corporate';
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

        // Inisialisasi awal katalog desain (paginasi 9 kartu per batch & counter)
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => { applyCatalogFilters(); });
        } else {
            applyCatalogFilters();
        }
    </script>
@endpush