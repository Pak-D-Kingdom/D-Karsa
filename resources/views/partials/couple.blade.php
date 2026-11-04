<!-- partials/couple.blade.php (Katalog Desain & Tema Undangan D'Karsa Multi-Kategori) -->
<section id="desain" class="py-20 md:py-28 bg-[#faf7f2] border-y border-orange-100/80 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header + Category Summary --}}
        <div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
            <div class="lg:col-span-7">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-orange-100/80 border border-orange-200 text-xs font-bold text-orange-800 mb-3">
                    <span class="text-orange-700 font-extrabold uppercase tracking-wider text-[11px]">Koleksi Desain Terlengkap</span>
                    <span class="text-orange-300">•</span>
                    <span class="text-ink2 font-medium">95+ Pilihan Tema Siap Pakai</span>
                </div>
                <h2 class="font-serif text-2xl sm:text-4xl lg:text-[2.75rem] font-bold text-ink tracking-tight leading-tight">
                    Pilihan Desain Memukau untuk <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Setiap Momen Bahagia Anda</span>
                </h2>
                <p class="mt-3 text-ink2 text-base leading-relaxed max-w-2xl">
                    Pilih desain favorit Anda berdasarkan kategori acara atau paket harga. Setiap undangan sudah dilengkapi tautan nama WhatsApp personal, audio player musik latar, hitung mundur hari H, peta rute, dan amplop digital.
                </p>
            </div>

            {{-- Category Quick Stats Counters --}}
            <div class="lg:col-span-5 grid grid-cols-2 sm:grid-cols-3 gap-3">
                <div class="bg-white border border-orange-100 rounded-2xl p-4 shadow-sm hover:border-orange-300 transition">
                    <b class="block font-serif text-2xl font-bold text-orange-600 leading-none">💍 Wedding</b>
                    <span class="text-xs font-bold text-ink mt-1.5 block">Pernikahan</span>
                    <span class="text-[11px] text-ink3">Adat &amp; Modern 3D</span>
                </div>
                <div class="bg-white border border-orange-100 rounded-2xl p-4 shadow-sm hover:border-orange-300 transition">
                    <b class="block font-serif text-2xl font-bold text-orange-600 leading-none">🕌 Khitan &amp; HBH</b>
                    <span class="text-xs font-bold text-ink mt-1.5 block">Khitan &amp; Silaturahmi</span>
                    <span class="text-[11px] text-ink3">Islami &amp; Syar'i</span>
                </div>
                <div class="bg-white border border-orange-100 rounded-2xl p-4 shadow-sm col-span-2 sm:col-span-1 hover:border-orange-300 transition">
                    <b class="block font-serif text-2xl font-bold text-orange-600 leading-none">🎉 Ultah &amp; Aqiqah</b>
                    <span class="text-xs font-bold text-ink mt-1.5 block">Milad &amp; Wisuda</span>
                    <span class="text-[11px] text-ink3">Ceria &amp; Doa Bersama</span>
                </div>
            </div>
        </div>

        {{-- Floating Tier Alert Banner when coming from Pricing Card click --}}
        <div id="catalogTierBanner" class="hidden mb-8 p-5 rounded-2xl bg-white border-2 border-orange-400 shadow-md">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-start gap-3.5">
                    <span class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl shrink-0 mt-0.5">
                        🎨
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span id="tierBannerBadge" class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-orange-600 text-white">
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
                <button type="button" onclick="filterCatalogByTier('semua')" class="text-xs font-bold text-ink3 hover:text-orange-600 px-3.5 py-2 rounded-xl bg-stone-100 hover:bg-orange-50 transition shrink-0 flex items-center gap-1.5 border border-stone-200">
                    <span>✕</span> Tampilkan Semua Desain
                </button>
            </div>
        </div>

        {{-- Filter Section: Tier / Paket & Event Categories --}}
        <div class="space-y-3.5 mb-10">
            {{-- 1. Tier Filters --}}
            <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-ink3">Tingkat Paket</span>
                    <span id="tierActiveLabel" class="text-[11px] font-bold text-orange-600">Semua Tingkat</span>
                </div>
                <div class="flex gap-1.5 overflow-x-auto pb-1 -mx-1 px-1 snap-x [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" id="tierFilters" style="-webkit-mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%);mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%)" role="group" aria-label="Saring menurut tingkat harga">
                    <button type="button" id="chipTier_semua" onclick="filterCatalogByTier('semua')" class="chip aktif shrink-0 snap-start">🌟 <span class="hidden sm:inline">Semua Tingkat</span><span class="sm:hidden">Semua</span></button>
                    <button type="button" id="chipTier_basic" onclick="filterCatalogByTier('basic')" class="chip shrink-0 snap-start border-emerald-300 text-emerald-800 hover:border-emerald-500">🟢 <span class="hidden sm:inline">Desain Basic (Rp50k)</span><span class="sm:hidden">Basic</span></button>
                    <button type="button" id="chipTier_premium" onclick="filterCatalogByTier('premium')" class="chip shrink-0 snap-start border-blue-300 text-blue-800 hover:border-blue-500">🔵 <span class="hidden sm:inline">Desain Premium (Rp110k)</span><span class="sm:hidden">Premium</span></button>
                    <button type="button" id="chipTier_eksklusif" onclick="filterCatalogByTier('eksklusif')" class="chip shrink-0 snap-start border-orange-300 text-orange-800 hover:border-orange-500">🟠 <span class="hidden sm:inline">Desain Eksklusif (Rp180k)</span><span class="sm:hidden">Eksklusif</span></button>
                    <button type="button" id="chipTier_kustom" onclick="filterCatalogByTier('kustom')" class="chip shrink-0 snap-start border-purple-300 text-purple-800 hover:border-purple-600">✨ <span class="hidden sm:inline">Desain Kustom (Full Request)</span><span class="sm:hidden">Kustom</span></button>
                </div>
            </div>

            {{-- 2. Pengkategorian bertingkat: Bab -> Sub-Bab -> Gaya -> Warna (dilipat di mobile) --}}
            <button type="button" id="filterPanelToggle" onclick="toggleFilterPanel()"
                    class="w-full flex items-center justify-between rounded-2xl border border-stone-200 bg-white px-4 py-3 text-left">
                <span class="text-[11px] font-bold uppercase tracking-wider text-ink3">Filter &amp; Kategori</span>
                <span class="flex items-center gap-2">
                    <span id="filterPanelSummary" class="text-[11px] font-bold text-orange-600">Semua Bab</span>
                    <span id="filterPanelChevron" class="text-ink3 text-xs">▴</span>
                </span>
            </button>
            <div id="filterPanel" class="rounded-2xl border border-stone-200 bg-white px-3.5 py-3 space-y-2.5 overflow-hidden">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-ink3">Pengkategorian Template</span>
                    <span class="flex items-center gap-2.5">
                        <span id="catalogCount" class="text-[11px] font-bold text-orange-600">— template</span>
                        <button type="button" onclick="resetCascade()" class="text-[11px] font-bold text-ink3 hover:text-orange-600">↺ Reset</button>
                    </span>
                </div>

                {{-- Setiap baris = satu kriteria, satu garis bisa digeser (tidak menumpuk ke bawah) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-2.5 [&>*]:min-w-0">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-11 shrink-0 text-[9.5px] font-bold uppercase tracking-wider text-ink3">Bab</span>
                    <div id="babChips" style="-webkit-mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%);mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%)" class="flex flex-nowrap gap-1.5 overflow-x-auto pb-0.5 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" role="group" aria-label="Pilih bab kategori"></div>
                </div>

                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-11 shrink-0 text-[9.5px] font-bold uppercase tracking-wider text-ink3">Sub</span>
                    <div class="relative flex-1 min-w-0">
                        <select id="subSelect" onchange="pickSub(this.value)"
                                class="w-full rounded-lg border border-stone-300 px-2.5 py-[7px] text-[11px] font-semibold bg-white text-ink focus:outline-none focus:ring-2 focus:ring-orange-400 appearance-none pr-8 cursor-pointer">
                            <option value="semua">Semua Sub-Bab</option>
                        </select>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-ink3 text-[10px]">▾</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-11 shrink-0 text-[9.5px] font-bold uppercase tracking-wider text-ink3">Gaya</span>
                    <div class="relative flex-1 min-w-0">
                        <select id="styleSelect" onchange="pickStyle(this.value)"
                                class="w-full rounded-lg border border-stone-300 px-2.5 py-[7px] text-[11px] font-semibold bg-white text-ink focus:outline-none focus:ring-2 focus:ring-orange-400 appearance-none pr-8 cursor-pointer">
                            <option value="semua">Semua Gaya</option>
                        </select>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-ink3 text-[10px]">▾</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-11 shrink-0 text-[9.5px] font-bold uppercase tracking-wider text-ink3">Warna</span>
                    <div id="colorSwatches" style="-webkit-mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%);mask-image:linear-gradient(90deg,#000 calc(100% - 18px),transparent 100%)" class="flex flex-nowrap gap-1.5 items-center overflow-x-auto pb-0.5 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"></div>
                </div>
                </div>

                <p class="text-[10.5px] text-ink3 leading-snug" id="catalogHint">Geser baris untuk melihat pilihan lain.</p>
            </div>
        </div>

        @php
            $themes = \App\Services\TemplateManager::getCatalogThemes();
            $catalogJson = [];
            $catalogFile = base_path('docs/template-pricing-catalog.json');
            if (is_file($catalogFile)) {
                $catalogJson = json_decode((string) file_get_contents($catalogFile), true) ?: [];
            }
            $catalogMeta = [];
            foreach ($catalogJson as $ci) {
                $catalogMeta[$ci['template_key']] = $ci;
            }
            $babByEventCat = [
                'Pernikahan' => 'BAB 1', 'Ulang Tahun' => 'BAB 2', 'Aqiqah' => 'BAB 3',
                'Khitanan' => 'BAB 3', 'Keagamaan' => 'BAB 4', 'Wisuda' => 'BAB 5', 'Acara Formal' => 'BAB 6',
            ];
        @endphp

        <div id="catalogGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($themes as $t)
                @php
                    $cardTier = $t['tier'] ?? 'eksklusif';
                    $isCustom = !empty($t['is_custom']);
                @endphp
                @php
                    $ci = $catalogMeta[$t['template_key'] ?? $t['key'] ?? ''] ?? null;
                    $babCode = $ci['l1_bab'] ?? ($babByEventCat[$t['event_cat'] ?? ''] ?? 'BAB 1');
                    $subName = $ci['l2_subbab'] ?? ($t['sub_cat'] ?? '');
                    $styleName = $ci['l3_style'] ?? '';
                    $colorName = $ci['l4_color_name'] ?? '';
                    // Satu desain × 4 paket (catatan paket mengikuti layar Stitch).
                    $tierMatrix = $t['tiers'] ?? [];
                    $tierKeys = $tierMatrix ? array_keys($tierMatrix) : [$cardTier];
                    $tierPrices = $tierMatrix ? array_map(fn ($row) => $row['price'], $tierMatrix) : [$cardTier => ($t['price'] ?? 'Rp180.000')];
                    $tierNotes = $tierMatrix ? array_map(fn ($row) => $row['note'], $tierMatrix) : [];
                    $cardPrice = $t['price'] ?? ($tierPrices[$cardTier] ?? 'Rp180.000');
                @endphp
                <article data-category="{{ $t['category'] }}" data-tier="{{ $cardTier }}" data-tiers="{{ implode(',', $tierKeys) }}" data-tier-prices="{{ json_encode($tierPrices) }}" data-tier-notes="{{ json_encode($tierNotes) }}" data-bab="{{ $babCode }}" data-subbab="{{ $subName }}" data-style="{{ $styleName }}" data-color="{{ $colorName }}" class="theme-card bg-white rounded-3xl border border-stone-200/90 shadow-sm hover:shadow-xl hover:border-orange-300 p-4 flex flex-col justify-between group transition duration-300 hover:-translate-y-1">
                    <div>
                        <figure class="relative aspect-[16/11] rounded-2xl overflow-hidden bg-stone-100 shadow-xs cursor-pointer group/fig"
                                onclick="{{ $isCustom ? "selectPackageCustomRequest()" : "openThemePreviewModal('" . ($t['template_key'] ?? $t['key'] ?? \Illuminate\Support\Str::slug($t['name'])) . "')" }}">
                            <img src="{{ $t['img'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $t['name'] }}" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            
                            {{-- Badge Kategori & Tier --}}
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider bg-white/95 text-ink shadow-xs">
                                {{ $t['badge'] }}
                            </span>

                            {{-- Price Badge on Top Right --}}
                            <span data-js-price data-js-default="{{ $cardPrice }}" class="absolute top-3 right-3 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider {{ $cardTier === 'basic' ? 'bg-emerald-600 text-white' : ($cardTier === 'premium' ? 'bg-blue-600 text-white' : ($cardTier === 'kustom' ? 'bg-purple-600 text-white' : 'bg-orange-600 text-white')) }} shadow-xs">
                                {{ $cardPrice }}
                            </span>
                            
                            {{-- Centered Hover Live Preview Overlay Pill --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/40 backdrop-blur-[2px]">
                                <span class="px-4 py-2 rounded-xl bg-white text-ink text-xs font-extrabold shadow-lg flex items-center gap-1.5 transform translate-y-2 group-hover:translate-y-0 transition duration-300">
                                    <span>{{ $isCustom ? '✨' : '👁️' }}</span> {{ $isCustom ? 'Konsultasi Desain Kustom' : 'Buka Demo Undangan' }}
                                </span>
                            </div>

                            @if(!$isCustom)
                                <button type="button" onclick="event.stopPropagation(); openLightbox('{{ $t['img'] }}')"
                                        class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-white/90 text-ink text-xs font-bold shadow-xs hover:bg-white z-10" title="Perbesar Foto">
                                    🔍 Foto
                                </button>
                            @endif
                        </figure>

                        <div class="mt-4 px-1 cursor-pointer" onclick="{{ $isCustom ? 'selectPackageCustomRequest()' : "openThemePreviewModal('" . ($t['template_key'] ?? $t['key'] ?? \Illuminate\Support\Str::slug($t['name'])) . "')" }}">
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="font-serif text-xl sm:text-2xl font-bold text-ink leading-tight group-hover:text-orange-600 transition">{{ $t['name'] }}</h3>
                                <svg aria-hidden="true" class="w-4 h-4 shrink-0 text-orange-500"><use href="#i-centang-biru"></use></svg>
                            </div>
                            <p class="text-xs text-ink2 mt-1.5 leading-relaxed">{{ $t['desc'] }}</p>
                            <p class="js-tier-note hidden mt-1.5 text-[11px] font-extrabold uppercase tracking-wider text-orange-700"></p>
                        </div>
                    </div>

                    <div class="mt-5 pt-3.5 border-t border-stone-100 flex items-center justify-between gap-2 px-1">
                        @if($isCustom)
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20request%20desain%20kustom%20undangan%20sesuai%20keinginan%20saya..."
                               target="_blank" rel="noopener"
                               class="px-3.5 py-2 rounded-xl bg-stone-100 text-ink text-xs font-bold hover:bg-orange-50 hover:text-orange-600 transition flex items-center gap-1.5">
                                <span>💬</span> Chat WA
                            </a>
                            <button type="button"
                                    onclick="selectPackageCustomRequest()"
                                    class="px-4 py-2 rounded-xl bg-gradient-to-r from-purple-600 to-orange-600 text-white text-xs font-extrabold hover:shadow-md transition flex items-center gap-1.5">
                                <span>Request Desain Kustom →</span>
                            </button>
                        @else
                            <button type="button"
                                    onclick="{{ $isCustom ? "selectPackageCustomRequest()" : "openThemePreviewModal('" . ($t['template_key'] ?? $t['key'] ?? \Illuminate\Support\Str::slug($t['name'])) . "')" }}"
                                    class="px-3.5 py-2 rounded-xl bg-stone-100 text-ink text-xs font-bold hover:bg-orange-50 hover:text-orange-600 transition flex items-center gap-1.5">
                                <span>👁️</span> Lihat Demo
                            </button>
                            <button type="button"
                                    onclick="selectThemeAndOrder('{{ $t['name'] }}', '{{ $t['package_val'] }}', '{{ $t['event_cat'] }}', '{{ $t['sub_cat'] ?? '' }}')"
                                    class="px-4 py-2 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs font-extrabold shadow-sm transition flex items-center gap-1.5">
                                <span>Pilih Desain Ini →</span>
                            </button>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>