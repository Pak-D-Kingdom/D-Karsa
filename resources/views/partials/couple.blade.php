<!-- partials/couple.blade.php (Katalog Desain & Tema Undangan D'Karsa Multi-Kategori) -->
<section id="desain" class="py-20 md:py-28 sec--blush motif">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8">
        {{-- Section Header + Category Summary --}}
        <div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
            <div class="lg:col-span-7">
                <span class="alis">
                    <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                    Katalog Undangan Digital Multi-Kategori
                </span>
                <h2 class="ow-h2 mt-3">
                    <span class="t-bold">Semua Acara,</span> dari <span class="t-script">Pernikahan</span> hingga <span class="t-bold">Halal Bihalal &amp; Khitan</span>
                </h2>
                <p class="mt-3 text-ink2 text-base leading-relaxed max-w-2xl">
                    Pilih kategori acara kalian di bawah ini. Setiap undangan dilengkapi link nama tamu, musik latar, hitung mundur, peta lokasi, serta buku tamu &amp; konfirmasi kehadiran online.
                </p>
            </div>

            {{-- Category Quick Stats --}}
            <div class="lg:col-span-5 grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                <div class="bg-white/90 border border-ink/10 rounded-2xl p-3.5 shadow-sm">
                    <b class="block font-serif text-2xl font-bold text-brand leading-none">💍 Wedding</b>
                    <span class="text-xs font-bold text-ink mt-1 block">Pernikahan</span>
                    <span class="text-[11px] text-ink3">Adat &amp; Modern 3D</span>
                </div>
                <div class="bg-white/90 border border-ink/10 rounded-2xl p-3.5 shadow-sm">
                    <b class="block font-serif text-2xl font-bold text-brand leading-none">🕌 Khitan &amp; HBH</b>
                    <span class="text-xs font-bold text-ink mt-1 block">Khitan &amp; Halal Bihalal</span>
                    <span class="text-[11px] text-ink3">Islami &amp; Silaturahmi</span>
                </div>
                <div class="bg-white/90 border border-ink/10 rounded-2xl p-3.5 shadow-sm col-span-2 sm:col-span-1">
                    <b class="block font-serif text-2xl font-bold text-brand leading-none">🎉 Ultah &amp; Syukuran</b>
                    <span class="text-xs font-bold text-ink mt-1 block">Aqiqah &amp; Milad</span>
                    <span class="text-[11px] text-ink3">Ceria &amp; Doa Bersama</span>
                </div>
            </div>
        </div>

        {{-- Floating Tier Alert Banner when coming from Pricing Card click --}}
        <div id="catalogTierBanner" class="hidden mb-8 p-5 rounded-3xl bg-white border-2 border-brand/30 shadow-md">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-start gap-3.5">
                    <span class="w-10 h-10 rounded-2xl bg-brand/10 text-brand flex items-center justify-center text-xl shrink-0 mt-0.5">
                        🎨
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span id="tierBannerBadge" class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-brand text-white">
                                Filter Paket Terpilih
                            </span>
                            <h4 id="tierBannerTitle" class="font-serif text-lg sm:text-xl font-bold text-ink">
                                Menampilkan Pilihan Desain
                            </h4>
                        </div>
                        <p id="tierBannerDesc" class="text-xs sm:text-sm text-ink2 mt-1">
                            Silakan pilih desain yang Anda sukai di bawah ini.
                        </p>
                    </div>
                </div>
                <button type="button" onclick="filterCatalogByTier('semua')" class="text-xs font-bold text-ink3 hover:text-brand px-3.5 py-2 rounded-full bg-sunk hover:bg-brand/10 transition shrink-0 flex items-center gap-1.5 border border-ink/10">
                    <span>✕</span> Tampilkan Semua Desain
                </button>
            </div>
        </div>

        {{-- Filter Section: Tier / Paket & Event Categories --}}
        <div class="space-y-3 mb-9">
            {{-- 1. Tier Filters --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1" id="tierFilters" role="group" aria-label="Saring menurut tingkat harga">
                <span class="text-xs font-bold uppercase tracking-wider text-ink3 mr-1 shrink-0">Tingkat Desain:</span>
                <button type="button" id="chipTier_semua" onclick="filterCatalogByTier('semua')" class="chip aktif">🌟 Semua Tingkat</button>
                <button type="button" id="chipTier_basic" onclick="filterCatalogByTier('basic')" class="chip border-emerald-300 text-emerald-800 hover:border-emerald-500">🟢 Desain Basic (Rp50k)</button>
                <button type="button" id="chipTier_premium" onclick="filterCatalogByTier('premium')" class="chip border-blue-300 text-blue-800 hover:border-blue-500">🔵 Desain Premium (Rp110k)</button>
                <button type="button" id="chipTier_eksklusif" onclick="filterCatalogByTier('eksklusif')" class="chip border-rose-300 text-rose-800 hover:border-brand">🔴 Desain Eksklusif (Rp180k)</button>
                <button type="button" id="chipTier_kustom" onclick="filterCatalogByTier('kustom')" class="chip border-purple-300 text-purple-800 hover:border-purple-600">✨ Desain Kustom (Full Request)</button>
            </div>

            {{-- 2. Category Filters --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1" id="themeFilters" role="group" aria-label="Saring menurut kategori acara">
                <span class="text-xs font-bold uppercase tracking-wider text-ink3 mr-1 shrink-0">Kategori Acara:</span>
                <button type="button" onclick="filterThemes('semua', this)" class="chip aktif">Semua Acara</button>
                <button type="button" onclick="filterThemes('pernikahan', this)" class="chip">💍 Pernikahan</button>
                <button type="button" onclick="filterThemes('tahlilan', this)" class="chip">🕯️ Doa Bersama / Tahlilan</button>
                <button type="button" onclick="filterThemes('halalbihalal', this)" class="chip">🕌 Halal Bihalal</button>
                <button type="button" onclick="filterThemes('khitanan', this)" class="chip">✂️ Khitanan</button>
                <button type="button" onclick="filterThemes('aqiqah', this)" class="chip">👶 Aqiqah</button>
                <button type="button" onclick="filterThemes('ultah', this)" class="chip">🎂 Ulang Tahun</button>
                <button type="button" onclick="filterThemes('wisuda', this)" class="chip">🎓 Wisuda</button>
                <button type="button" onclick="filterThemes('formal', this)" class="chip">🏛️ Acara Formal</button>
                <button type="button" onclick="filterThemes('syukuran', this)" class="chip">🎉 Syukuran</button>
            </div>
        </div>

        @php
            $themes = [
                // ==========================================
                // 1. TIER BASIC: Desain Standar / Biasa Saja (Rp50.000)
                // ==========================================
                [
                    'name' => 'Simple Minimalist Floral',
                    'category' => 'pernikahan',
                    'tier' => 'basic',
                    'price' => 'Rp50.000',
                    'badge' => '💍 Pernikahan • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => 'Minimalis modern',
                    'desc' => 'Desain pernikahan bersih, minimalis & rapi dengan tipografi anggun, tata letak esensial & harga paling hemat.',
                    'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Ketupat Raya Silaturahmi',
                    'category' => 'halalbihalal',
                    'tier' => 'basic',
                    'price' => 'Rp50.000',
                    'badge' => '🕌 Halal Bihalal • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Keagamaan',
                    'sub_cat' => 'Halal bihalal',
                    'desc' => 'Desain silaturahmi Idul Fitri ceria dengan ornamen ketupat standar, jadwal halal bihalal & lokasi Google Maps.',
                    'img' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Little Prince Safari Khitan',
                    'category' => 'khitanan',
                    'tier' => 'basic',
                    'price' => 'Rp50.000',
                    'badge' => '✂️ Khitanan • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Aqiqah',
                    'sub_cat' => 'Tasyakuran khitanan',
                    'desc' => 'Tema khitanan anak yang simpel dan ceria, lengkap dengan link nama teman & keluarga.',
                    'img' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Tasyakuran & Doa Rumah Baru',
                    'category' => 'syukuran',
                    'tier' => 'basic',
                    'price' => 'Rp50.000',
                    'badge' => '🎉 Syukuran • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Keagamaan',
                    'sub_cat' => 'Tasyakuran',
                    'desc' => 'Undangan syukuran rumah baru, tahlilan, wisuda, atau doa bersama keluarga dan tetangga.',
                    'img' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Doa Bersama & Tahlilan Khusyuk',
                    'category' => 'tahlilan',
                    'tier' => 'basic',
                    'price' => 'Rp50.000',
                    'badge' => '🕯️ Doa Bersama • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Keagamaan',
                    'sub_cat' => 'Doa bersama & tahlilan',
                    'desc' => 'Desain tahlilan & haul mengenang almarhum/almarhumah bernuansa teduh khusyuk, teks doa jelas, hemat dan sopan untuk sanak kerabat.',
                    'img' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=700&q=80&auto=format&fit=crop',
                ],

                // ==========================================
                // 2. TIER PREMIUM: Desain Modern & Elegan (Rp110.000)
                // ==========================================
                [
                    'name' => 'Elegant Rose Romance (ChungDoi Wildflower)',
                    'category' => 'pernikahan',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '💍 Pernikahan • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => 'Elegan, floral, dan islami',
                    'desc' => 'Desain pernikahan modern ChungDoi Wildflower Pink: bingkai kubah lengkung, wax seal berdenyut, kaligrafi anggun & efek kelopak bunga jatuh.',
                    'img' => 'https://images.unsplash.com/photo-1519225424606-491ea8be74d2?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Green Mosque Harmony',
                    'category' => 'halalbihalal',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '🕌 Halal Bihalal • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Keagamaan',
                    'sub_cat' => 'Pengajian',
                    'desc' => 'Undangan Halal Bihalal keluarga besar / kantor bernuansa hijau sage, kubah masjid & ayat suci.',
                    'img' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Walimatul Khitan Berkah Sholeh',
                    'category' => 'khitanan',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '✂️ Khitanan • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Aqiqah',
                    'sub_cat' => 'Tasyakuran khitanan',
                    'desc' => 'Undangan syukuran khitanan islami dengan foto jagoan kecil, doa anak sholeh & amplop digital.',
                    'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Sweet Baby Pastel Aqiqah',
                    'category' => 'aqiqah',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '👶 Aqiqah • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Aqiqah',
                    'sub_cat' => 'Aqiqah anak',
                    'desc' => 'Tasyakuran kelahiran & aqiqah buah hati dengan warna pastel lembut, doa penyejuk hati & peta acara.',
                    'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Wisuda Sarjana Prestasi Emas',
                    'category' => 'wisuda',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '🎓 Wisuda • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Wisuda',
                    'sub_cat' => 'Wisuda kuliah',
                    'desc' => 'Perayaan wisuda sarjana berprestasi dengan foto toga resmi, jadwal sidang dan peta acara.',
                    'img' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Reuni Akbar & Temu Kangen',
                    'category' => 'formal',
                    'tier' => 'premium',
                    'price' => 'Rp110.000',
                    'badge' => '🏛️ Reuni & Formal • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Acara Formal',
                    'sub_cat' => 'Rapat dan gathering perusahaan',
                    'desc' => 'Undangan temu kangen alumni sekolah / kampus dengan konfirmasi kehadiran angkatan & galeri kenangan.',
                    'img' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80&auto=format&fit=crop',
                ],

                // ==========================================
                // 3. TIER EKSKLUSIF: Desain Mewah 3D & Adat (Rp180.000)
                // ==========================================
                [
                    'name' => '3D Javanese Royal',
                    'category' => 'pernikahan',
                    'tier' => 'eksklusif',
                    'price' => 'Rp180.000',
                    'badge' => '💍 Pernikahan • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                    'desc' => 'Nuansa keraton Jawa klasik dengan animasi gunungan 3D, gending halus, live streaming & doa restu.',
                    'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'SnowFall Minimalist White',
                    'category' => 'pernikahan',
                    'tier' => 'eksklusif',
                    'price' => 'Rp180.000',
                    'badge' => '💍 Pernikahan • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => 'Minimalis modern',
                    'desc' => 'Desain putih bersih bergaya editorial modern dengan efek partikel salju lembut dan video cover sinematik.',
                    'img' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Batak Istimewa Heritage',
                    'category' => 'pernikahan',
                    'tier' => 'eksklusif',
                    'price' => 'Rp180.000',
                    'badge' => '💍 Pernikahan • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                    'desc' => 'Ornamen ulos khas Batak dengan perpaduan warna marun & emas yang megah dan sakral.',
                    'img' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Golden Luxury Birthday / Milad',
                    'category' => 'ultah',
                    'tier' => 'eksklusif',
                    'price' => 'Rp180.000',
                    'badge' => '🎂 Ulang Tahun • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Ulang Tahun',
                    'sub_cat' => 'Sweet seventeen',
                    'desc' => 'Perayaan sweet seventeen / anniversary / milad dengan ornamen emas berkilau dan RSVP kehadiran tamu VIP.',
                    'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Executive Corporate & Grand Opening',
                    'category' => 'formal',
                    'tier' => 'eksklusif',
                    'price' => 'Rp180.000',
                    'badge' => '🏛️ Acara Formal • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Acara Formal',
                    'sub_cat' => 'Grand opening bisnis',
                    'desc' => 'Tata letak arsitektural minimalis premium untuk peresmian bisnis, seminar eksekutif & gala dinner perusahaan.',
                    'img' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700&q=80&auto=format&fit=crop',
                ],

                // ==========================================
                // 4. TIER KUSTOM: Full Request Desain Sesuai Keinginan (Rp280.000)
                // ==========================================
                [
                    'name' => 'Custom Request Desain Bebas Impianmu',
                    'category' => 'semua',
                    'tier' => 'kustom',
                    'price' => 'Rp280.000',
                    'badge' => '✨ Kustom • Full Request',
                    'package_val' => 'Paket Kustom - Rp280.000',
                    'event_cat' => 'Pernikahan',
                    'sub_cat' => '',
                    'desc' => 'Request tema baru dari nol sesuai keinginan Anda! Tim desainer D\'Karsa siap membuatkan konsep khusus berdasarkan warna, tema adat langka, atau referensi apapun.',
                    'img' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=700&q=80&auto=format&fit=crop',
                    'is_custom' => true,
                ],
            ];

            try {
                $customCatalogCouples = \App\Models\Couple::where('is_in_catalog', true)->get();
                foreach ($customCatalogCouples as $cc) {
                    $cImg = !empty($cc->cover_photo) ? (str_starts_with($cc->cover_photo, 'http') ? $cc->cover_photo : asset('storage/' . $cc->cover_photo)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700';
                    $cCatKey = strtolower(str_replace([' ', '/'], '', $cc->category ?? 'pernikahan'));
                    $themes[] = [
                        'name' => $cc->groom_name . ' & ' . $cc->bride_name,
                        'category' => $cCatKey,
                        'tier' => 'eksklusif',
                        'price' => 'Rp180.000',
                        'badge' => '⭐ ' . ($cc->category ?? 'Pernikahan') . ' • Klien',
                        'package_val' => 'Paket Eksklusif - Rp180.000',
                        'event_cat' => $cc->category ?? 'Pernikahan',
                        'desc' => $cc->quote ? \Illuminate\Support\Str::limit($cc->quote, 100) : 'Undangan digital karya D\'Karsa dengan desain interaktif dan responsif.',
                        'img' => $cImg,
                        'live_url' => url('/undangan/' . $cc->slug),
                    ];
                }
            } catch (\Exception $e) {}
        @endphp

        <div id="catalogGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($themes as $t)
                @php
                    $cardTier = $t['tier'] ?? 'eksklusif';
                    $isCustom = !empty($t['is_custom']);
                @endphp
                <article data-category="{{ $t['category'] }}" data-tier="{{ $cardTier }}" class="theme-card sel {{ $isCustom ? 'border-2 border-purple-400 bg-gradient-to-b from-white to-purple-50/50' : ($loop->iteration % 2 === 0 ? 'sel--merah' : 'sel--motif') }} !p-4 flex flex-col justify-between group transition duration-300 hover:-translate-y-1">
                    <div>
                        <figure class="relative aspect-[16/11] rounded-[18px] overflow-hidden bg-sunk shadow-sm cursor-pointer group/fig"
                                onclick="{{ !empty($t['live_url']) ? "window.open('{$t['live_url']}', '_blank')" : ($isCustom ? "selectPackageCustomRequest()" : "openThemePreviewModal('" . \Illuminate\Support\Str::slug($t['name']) . "')") }}">
                            <img src="{{ $t['img'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $t['name'] }}" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#120a0c]/85 via-transparent to-transparent"></div>
                            
                            {{-- Badge Kategori & Tier --}}
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider bg-white/95 text-ink shadow">
                                {{ $t['badge'] }}
                            </span>

                            {{-- Price Badge on Top Right --}}
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider {{ $cardTier === 'basic' ? 'bg-emerald-600 text-white' : ($cardTier === 'premium' ? 'bg-blue-600 text-white' : ($cardTier === 'kustom' ? 'bg-purple-600 text-white' : 'bg-brand text-white')) }} shadow">
                                {{ $t['price'] ?? 'Rp180.000' }}
                            </span>
                            
                            {{-- Centered Hover Live Preview Overlay Pill --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/35 backdrop-blur-[2px]">
                                <span class="px-4 py-2 rounded-full bg-white text-ink text-xs font-bold shadow-lg flex items-center gap-1.5 transform translate-y-2 group-hover:translate-y-0 transition duration-300">
                                    <span>{{ $isCustom ? '✨' : '👁️' }}</span> {{ $isCustom ? 'Konsultasi Desain Kustom' : 'Buka Demo Undangan' }}
                                </span>
                            </div>

                            @if(!$isCustom)
                                <button type="button" onclick="event.stopPropagation(); openLightbox('{{ $t['img'] }}')"
                                        class="absolute bottom-3 right-3 px-3 py-1 rounded-full bg-white/90 text-ink text-xs font-bold shadow hover:bg-white z-10" title="Perbesar Foto">
                                    🔍 Foto
                                </button>
                            @endif
                        </figure>

                        <div class="mt-4 px-1 cursor-pointer" onclick="{{ $isCustom ? 'selectPackageCustomRequest()' : "openThemePreviewModal('" . \Illuminate\Support\Str::slug($t['name']) . "')" }}">
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="font-serif text-2xl font-bold text-ink leading-tight group-hover:text-brand transition">{{ $t['name'] }}</h3>
                                <svg aria-hidden="true" class="w-4 h-4 shrink-0"><use href="#i-centang-biru"></use></svg>
                            </div>
                            <p class="text-xs text-ink2 mt-1.5 leading-relaxed">{{ $t['desc'] }}</p>
                        </div>
                    </div>

                    <div class="mt-5 pt-3.5 border-t border-ink/10 flex items-center justify-between gap-2 px-1">
                        @if($isCustom)
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20request%20desain%20kustom%20undangan%20sesuai%20keinginan%20saya..."
                               target="_blank" rel="noopener"
                               class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition flex items-center gap-1.5 shadow-sm">
                                <span>💬</span> Chat WA
                            </a>
                            <button type="button"
                                    onclick="selectPackageCustomRequest()"
                                    class="tbl tbl--utama !h-9 !pl-4 !pr-1.5 !text-xs !bg-gradient-to-r !from-purple-600 !to-brand">
                                <span>Request Desain Kustom</span>
                                <span class="tbl__ikon !w-6 !h-6">
                                    <svg aria-hidden="true" class="w-3 h-3"><use href="#i-arrow-up-right"></use></svg>
                                </span>
                            </button>
                        @else
                            <button type="button"
                                    onclick="{{ !empty($t['live_url']) ? "window.open('{$t['live_url']}', '_blank')" : "openThemePreviewModal('" . \Illuminate\Support\Str::slug($t['name']) . "')" }}"
                                    class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition flex items-center gap-1.5 shadow-sm">
                                <span>👁️</span> Lihat Preview
                            </button>
                            <button type="button"
                                    onclick="selectThemeAndOrder('{{ $t['name'] }}', '{{ $t['package_val'] }}', '{{ $t['event_cat'] }}', '{{ $t['sub_cat'] ?? '' }}')"
                                    class="tbl tbl--utama !h-9 !pl-4 !pr-1.5 !text-xs">
                                <span>Pilih &amp; Buat</span>
                                <span class="tbl__ikon !w-6 !h-6">
                                    <svg aria-hidden="true" class="w-3 h-3"><use href="#i-arrow-up-right"></use></svg>
                                </span>
                            </button>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>