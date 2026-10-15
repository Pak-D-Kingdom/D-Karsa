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

        {{-- Filter Chips with Event Categories --}}
        <div role="group" aria-label="Saring menurut kategori acara" class="flex flex-wrap items-center gap-2 mb-9" id="themeFilters">
            <button type="button" onclick="filterThemes('semua', this)" class="chip aktif">🌟 Semua Acara</button>
            <button type="button" onclick="filterThemes('pernikahan', this)" class="chip">💍 Pernikahan</button>
            <button type="button" onclick="filterThemes('halalbihalal', this)" class="chip">🕌 Halal Bihalal</button>
            <button type="button" onclick="filterThemes('khitanan', this)" class="chip">✂️ Khitanan</button>
            <button type="button" onclick="filterThemes('aqiqah', this)" class="chip">👶 Aqiqah</button>
            <button type="button" onclick="filterThemes('ultah', this)" class="chip">🎂 Ulang Tahun</button>
            <button type="button" onclick="filterThemes('syukuran', this)" class="chip">🎉 Syukuran &amp; Reuni</button>
        </div>

        @php
            $themes = [
                // PERNIKAHAN
                [
                    'name' => '3D Javanese Royal',
                    'category' => 'pernikahan',
                    'badge' => '💍 Pernikahan • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Pernikahan',
                    'desc' => 'Nuansa keraton Jawa klasik dengan animasi gunungan 3D, gending halus & doa restu.',
                    'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'SnowFall Minimalist White',
                    'category' => 'pernikahan',
                    'badge' => '💍 Pernikahan • Luxury',
                    'package_val' => 'Paket Luxury - Rp280.000',
                    'event_cat' => 'Pernikahan',
                    'desc' => 'Desain putih bersih bergaya editorial modern dengan efek partikel lembut dan video cover.',
                    'img' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Batak Istimewa Heritage',
                    'category' => 'pernikahan',
                    'badge' => '💍 Pernikahan • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Pernikahan',
                    'desc' => 'Ornamen ulos khas Batak dengan perpaduan warna marun & emas yang elegan dan sakral.',
                    'img' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700&q=80&auto=format&fit=crop',
                ],

                // HALAL BIHALAL
                [
                    'name' => 'Green Mosque Harmony',
                    'category' => 'halalbihalal',
                    'badge' => '🕌 Halal Bihalal • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Halal Bihalal',
                    'desc' => 'Undangan Halal Bihalal keluarga besar / kantor bernuansa hijau sage, kubah masjid & ayat suci.',
                    'img' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Ketupat Raya Silaturahmi',
                    'category' => 'halalbihalal',
                    'badge' => '🕌 Halal Bihalal • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Halal Bihalal',
                    'desc' => 'Desain silaturahmi Idul Fitri ceria dengan ornamen ketupat, jadwal halal bihalal & lokasi Google Maps.',
                    'img' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700&q=80&auto=format&fit=crop',
                ],

                // KHITANAN
                [
                    'name' => 'Walimatul Khitan Berkah Sholeh',
                    'category' => 'khitanan',
                    'badge' => '✂️ Khitanan • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Khitanan',
                    'desc' => 'Undangan syukuran khitanan islami dengan foto jagoan kecil, doa anak sholeh & amplop digital.',
                    'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Little Prince Safari Khitan',
                    'category' => 'khitanan',
                    'badge' => '✂️ Khitanan • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Khitanan',
                    'desc' => 'Tema khitanan anak yang ceria dan penuh petualangan, lengkap dengan link nama teman & keluarga.',
                    'img' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700&q=80&auto=format&fit=crop',
                ],

                // AQIQAH
                [
                    'name' => 'Sweet Baby Pastel Aqiqah',
                    'category' => 'aqiqah',
                    'badge' => '👶 Aqiqah • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Aqiqah',
                    'desc' => 'Tasyakuran kelahiran & aqiqah buah hati dengan warna pastel lembut, doa penyejuk hati & peta acara.',
                    'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                ],

                // ULANG TAHUN
                [
                    'name' => 'Golden Luxury Birthday / Milad',
                    'category' => 'ultah',
                    'badge' => '🎂 Ulang Tahun • Eksklusif',
                    'package_val' => 'Paket Eksklusif - Rp180.000',
                    'event_cat' => 'Ulang Tahun',
                    'desc' => 'Perayaan sweet seventeen / anniversary / milad dengan ornamen emas berkilau dan RSVP kehadiran tamu.',
                    'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700&q=80&auto=format&fit=crop',
                ],

                // SYUKURAN / REUNI
                [
                    'name' => 'Tasyakuran & Doa Rumah Baru',
                    'category' => 'syukuran',
                    'badge' => '🎉 Syukuran • Basic',
                    'package_val' => 'Paket Basic - Rp50.000',
                    'event_cat' => 'Syukuran',
                    'desc' => 'Undangan syukuran rumah baru, tahlil, wisuda, atau doa bersama keluarga dan tetangga.',
                    'img' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700&q=80&auto=format&fit=crop',
                ],
                [
                    'name' => 'Reuni Akbar & Temu Kangen',
                    'category' => 'syukuran',
                    'badge' => '🎉 Reuni • Premium',
                    'package_val' => 'Paket Premium - Rp110.000',
                    'event_cat' => 'Syukuran',
                    'desc' => 'Undangan temu kangen alumni sekolah / kampus dengan konfirmasi kehadiran angkatan & galeri kenangan.',
                    'img' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80&auto=format&fit=crop',
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
                        'badge' => '⭐ ' . ($cc->category ?? 'Pernikahan') . ' • Klien',
                        'package_val' => 'Paket Eksklusif',
                        'event_cat' => $cc->category ?? 'Pernikahan',
                        'desc' => $cc->quote ? \Illuminate\Support\Str::limit($cc->quote, 100) : 'Undangan digital karya D\'Kreasi dengan desain interaktif dan responsif.',
                        'img' => $cImg,
                        'live_url' => url('/undangan/' . $cc->slug),
                    ];
                }
            } catch (\Exception $e) {}
        @endphp

        <div id="catalogGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($themes as $t)
                <article data-category="{{ $t['category'] }}" class="theme-card sel {{ $loop->iteration % 2 === 0 ? 'sel--merah' : 'sel--motif' }} !p-4 flex flex-col justify-between group transition duration-300 hover:-translate-y-1">
                    <div>
                        <figure class="relative aspect-[16/11] rounded-[18px] overflow-hidden bg-sunk shadow-sm cursor-pointer group/fig"
                                onclick="{{ !empty($t['live_url']) ? "window.open('{$t['live_url']}', '_blank')" : "openThemePreviewModal('" . \Illuminate\Support\Str::slug($t['name']) . "')" }}">
                            <img src="{{ $t['img'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $t['name'] }}" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#120a0c]/85 via-transparent to-transparent"></div>
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider bg-white/95 text-ink shadow">
                                {{ $t['badge'] }}
                            </span>
                            
                            {{-- Centered Hover Live Preview Overlay Pill --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/35 backdrop-blur-[2px]">
                                <span class="px-4 py-2 rounded-full bg-white text-ink text-xs font-bold shadow-lg flex items-center gap-1.5 transform translate-y-2 group-hover:translate-y-0 transition duration-300">
                                    <span>👁️</span> Buka Demo Undangan
                                </span>
                            </div>

                            <button type="button" onclick="event.stopPropagation(); openLightbox('{{ $t['img'] }}')"
                                    class="absolute bottom-3 right-3 px-3 py-1 rounded-full bg-white/90 text-ink text-xs font-bold shadow hover:bg-white z-10" title="Perbesar Foto">
                                🔍 Foto
                            </button>
                        </figure>

                        <div class="mt-4 px-1 cursor-pointer" onclick="openThemePreviewModal('{{ \Illuminate\Support\Str::slug($t['name']) }}')">
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="font-serif text-2xl font-bold text-ink leading-tight group-hover:text-brand transition">{{ $t['name'] }}</h3>
                                <svg aria-hidden="true" class="w-4 h-4 shrink-0"><use href="#i-centang-biru"></use></svg>
                            </div>
                            <p class="text-xs text-ink2 mt-1.5 leading-relaxed">{{ $t['desc'] }}</p>
                        </div>
                    </div>

                    <div class="mt-5 pt-3.5 border-t border-ink/10 flex items-center justify-between gap-2 px-1">
                        <button type="button"
                                onclick="{{ !empty($t['live_url']) ? "window.open('{$t['live_url']}', '_blank')" : "openThemePreviewModal('" . \Illuminate\Support\Str::slug($t['name']) . "')" }}"
                                class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition flex items-center gap-1.5 shadow-sm">
                            <span>👁️</span> Lihat Preview
                        </button>
                        <button type="button"
                                onclick="selectThemeAndOrder('{{ $t['name'] }}', '{{ $t['package_val'] }}', '{{ $t['event_cat'] }}')"
                                class="tbl tbl--utama !h-9 !pl-4 !pr-1.5 !text-xs">
                            <span>Pilih &amp; Pesan</span>
                            <span class="tbl__ikon !w-6 !h-6">
                                <svg aria-hidden="true" class="w-3 h-3"><use href="#i-arrow-up-right"></use></svg>
                            </span>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>