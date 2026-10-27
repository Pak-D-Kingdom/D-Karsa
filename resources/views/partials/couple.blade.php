<!-- partials/couple.blade.php (Katalog Desain & Tema Undangan D'Karsa Multi-Kategori) -->
<section id="desain" class="py-20 md:py-28 bg-[#faf7f2] border-y border-orange-100/80 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header + Category Summary --}}
        <div class="grid lg:grid-cols-12 gap-8 items-end mb-10">
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
        <div id="catalogTierBanner" class="hidden mb-6 p-5 rounded-2xl bg-white border-2 border-orange-400 shadow-md">
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
                <button type="button" onclick="filterCatalogByTier('semua')" class="text-xs font-bold text-ink3 hover:text-orange-600 px-3.5 py-2 rounded-xl bg-stone-100 hover:bg-orange-50 transition shrink-0 flex items-center gap-1.5 border border-stone-200 cursor-pointer">
                    <span>✕</span> Tampilkan Semua Desain
                </button>
            </div>
        </div>

        {{-- Search Toolbar & Filter Controls --}}
        <div class="space-y-3.5 mb-8">
            {{-- 1. Live Search Input & Real-time Counter --}}
            <div class="bg-white p-3 sm:p-4 rounded-2xl border border-stone-200/90 shadow-sm flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
                {{-- Search Box --}}
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400 text-sm">
                        🔍
                    </span>
                    <input type="text"
                           id="catalogSearchInput"
                           oninput="onCatalogSearchChange(this.value)"
                           placeholder="Cari desain / gaya / adat (contoh: Jawa, Batak, Floral, Snowfall, Khitan, Wisuda...)"
                           class="w-full pl-9 pr-9 py-2.5 text-xs sm:text-sm bg-stone-50 hover:bg-white focus:bg-white border border-stone-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 text-ink placeholder:text-stone-400 transition">
                    <button type="button"
                            id="catalogSearchClearBtn"
                            onclick="clearCatalogSearch()"
                            class="hidden absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-700 text-xs font-bold transition cursor-pointer"
                            title="Hapus pencarian">
                        ✕
                    </button>
                </div>

                {{-- Counter & Reset Button --}}
                <div class="flex items-center justify-between sm:justify-end gap-3 text-xs shrink-0 px-1">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-stone-600 font-medium">
                            Menampilkan <b id="catalogCountVisible" class="text-orange-600 font-extrabold">0</b> dari <b id="catalogCountTotal" class="text-stone-800 font-extrabold">0</b> desain
                        </span>
                    </div>

                    <button type="button"
                            id="catalogResetFilterBtn"
                            onclick="resetAllCatalogFilters()"
                            class="hidden px-2.5 py-1.5 rounded-lg bg-stone-100 hover:bg-orange-100 text-stone-700 hover:text-orange-800 text-[11px] font-bold border border-stone-200 transition items-center gap-1 cursor-pointer">
                        <span>↺</span> Reset Filter
                    </button>
                </div>
            </div>

            {{-- 2. Tier Filters --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none" id="tierFilters" role="group" aria-label="Saring menurut tingkat harga">
                <span class="text-xs font-bold uppercase tracking-wider text-ink3 mr-1 shrink-0">Tingkat Paket:</span>
                <button type="button" id="chipTier_semua" onclick="filterCatalogByTier('semua')" class="chip aktif">🌟 Semua Tingkat</button>
                <button type="button" id="chipTier_basic" onclick="filterCatalogByTier('basic')" class="chip border-emerald-300 text-emerald-800 hover:border-emerald-500">🟢 Desain Basic (Rp50k)</button>
                <button type="button" id="chipTier_premium" onclick="filterCatalogByTier('premium')" class="chip border-blue-300 text-blue-800 hover:border-blue-500">🔵 Desain Premium (Rp110k)</button>
                <button type="button" id="chipTier_eksklusif" onclick="filterCatalogByTier('eksklusif')" class="chip border-orange-300 text-orange-800 hover:border-orange-500">🟠 Desain Eksklusif (Rp180k)</button>
                <button type="button" id="chipTier_kustom" onclick="filterCatalogByTier('kustom')" class="chip border-purple-300 text-purple-800 hover:border-purple-600">✨ Desain Kustom (Full Request)</button>
            </div>

            {{-- 3. Category Filters --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none" id="themeFilters" role="group" aria-label="Saring menurut kategori acara">
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
            $themes = \App\Services\TemplateManager::getCatalogThemes();
        @endphp

        {{-- Responsive Catalog Grid --}}
        <div id="catalogGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($themes as $t)
                @php
                    $cardTier = $t['tier'] ?? 'eksklusif';
                    $isCustom = !empty($t['is_custom']);
                    $themeKey = $t['template_key'] ?? $t['key'] ?? \Illuminate\Support\Str::slug($t['name']);
                @endphp
                <article data-category="{{ strtolower($t['category'] ?? '') }}"
                         data-tier="{{ strtolower($cardTier) }}"
                         data-name="{{ strtolower($t['name'] ?? '') }}"
                         data-tags="{{ strtolower(($t['sub_category'] ?? '') . ' ' . ($t['desc'] ?? '') . ' ' . ($t['category_label'] ?? '') . ' ' . ($t['badge'] ?? '')) }}"
                         class="theme-card h-full bg-white rounded-3xl border border-stone-200/90 shadow-sm hover:shadow-xl hover:border-orange-300 p-4 flex flex-col justify-between group transition-all duration-300 hover:-translate-y-1">
                    <div>
                        {{-- Thumbnail Container: Aspect Ratio 16/10 dengan Badge Ringkas --}}
                        <figure class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-stone-100 shadow-xs cursor-pointer group/fig"
                                onclick="{{ $isCustom ? "selectPackageCustomRequest()" : "openThemePreviewModal('" . $themeKey . "')" }}">
                            <img src="{{ $t['img'] }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                 alt="{{ $t['name'] }}"
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/20 pointer-events-none"></div>
                            
                            {{-- Badge Kategori (Pojok Kiri Atas) --}}
                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider bg-white/95 text-ink shadow-xs backdrop-blur-xs pointer-events-none">
                                {{ $t['badge'] }}
                            </span>

                            {{-- Badge Harga/Paket (Pojok Kanan Atas) --}}
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider {{ $cardTier === 'basic' ? 'bg-emerald-600 text-white' : ($cardTier === 'premium' ? 'bg-blue-600 text-white' : ($cardTier === 'kustom' ? 'bg-purple-600 text-white' : 'bg-orange-600 text-white')) }} shadow-xs pointer-events-none">
                                {{ $t['price'] ?? 'Rp180.000' }}
                            </span>
                            
                            {{-- Centered Hover Live Preview Overlay Pill --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/40 backdrop-blur-[2px] pointer-events-none">
                                <span class="px-4 py-2 rounded-xl bg-white text-ink text-xs font-extrabold shadow-lg flex items-center gap-1.5 transform translate-y-2 group-hover:translate-y-0 transition duration-300">
                                    <span>{{ $isCustom ? '✨' : '👁️' }}</span> {{ $isCustom ? 'Konsultasi Desain Kustom' : 'Buka Demo Undangan' }}
                                </span>
                            </div>

                            @if(!$isCustom)
                                <button type="button"
                                        onclick="event.stopPropagation(); openLightbox('{{ $t['img'] }}')"
                                        class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-black/60 hover:bg-black/80 text-white text-[11px] font-bold backdrop-blur-xs shadow-xs transition z-10 flex items-center gap-1 cursor-pointer"
                                        title="Perbesar Foto">
                                    <span>🔍</span> Foto
                                </button>
                            @endif
                        </figure>

                        {{-- Metadata Ringkas: Judul & Deskripsi 2 Baris --}}
                        <div class="mt-4 px-1 cursor-pointer" onclick="{{ $isCustom ? 'selectPackageCustomRequest()' : "openThemePreviewModal('" . $themeKey . "')" }}">
                            @if(!empty($t['sub_category']))
                                <span class="text-[11px] font-bold text-orange-600 uppercase tracking-wider block mb-1 truncate">
                                    {{ $t['sub_category'] }}
                                </span>
                            @endif
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="font-serif text-lg sm:text-xl font-bold text-ink leading-tight group-hover:text-orange-600 transition truncate" title="{{ $t['name'] }}">
                                    {{ $t['name'] }}
                                </h3>
                                <svg aria-hidden="true" class="w-4 h-4 shrink-0 text-orange-500"><use href="#i-centang-biru"></use></svg>
                            </div>
                            <p class="text-xs text-ink3 mt-1.5 leading-relaxed line-clamp-2 min-h-[2.5rem]" title="{{ $t['desc'] }}">
                                {{ $t['desc'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Tombol Aksi Seragam --}}
                    <div class="mt-4 pt-3.5 border-t border-stone-100 flex items-center justify-between gap-2 px-1">
                        @if($isCustom)
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20D'Karsa,%20saya%20ingin%20request%20desain%20kustom%20undangan%20sesuai%20keinginan%20saya..."
                               target="_blank" rel="noopener"
                               class="px-3.5 py-2 rounded-xl bg-stone-100 text-ink text-xs font-bold hover:bg-orange-50 hover:text-orange-600 transition flex items-center justify-center gap-1.5 shrink-0">
                                <span>💬</span> WA
                            </a>
                            <button type="button"
                                    onclick="selectPackageCustomRequest()"
                                    class="flex-1 px-4 py-2 rounded-xl bg-gradient-to-r from-purple-600 to-orange-600 text-white text-xs font-extrabold hover:shadow-md transition text-center truncate cursor-pointer">
                                <span>Request Desain →</span>
                            </button>
                        @else
                            <button type="button"
                                    onclick="openThemePreviewModal('{{ $themeKey }}')"
                                    class="flex-1 px-3 py-2 rounded-xl bg-stone-100 text-ink text-xs font-bold hover:bg-orange-50 hover:text-orange-600 transition flex items-center justify-center gap-1.5 border border-stone-200/60 cursor-pointer">
                                <span>👁️</span> Demo
                            </button>
                            <button type="button"
                                    onclick="selectThemeAndOrder('{{ $t['name'] }}', '{{ $t['package_val'] }}', '{{ $t['event_cat'] }}', '{{ $t['sub_cat'] ?? '' }}')"
                                    class="flex-1 px-3.5 py-2 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs font-extrabold shadow-sm transition flex items-center justify-center gap-1 cursor-pointer">
                                <span>Pilih Desain →</span>
                            </button>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Empty State (Ketika tidak ada desain yang cocok dengan filter / pencarian) --}}
        <div id="catalogEmptyState" class="hidden text-center py-16 px-4 bg-white rounded-3xl border-2 border-dashed border-stone-200 my-6">
            <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-3xl mx-auto mb-4">
                🔍
            </div>
            <h3 class="font-serif text-xl sm:text-2xl font-bold text-ink">Tidak Ada Desain yang Cocok</h3>
            <p class="text-xs sm:text-sm text-ink2 mt-2 max-w-md mx-auto leading-relaxed">
                Tidak ditemukan template yang sesuai dengan kata kunci pencarian atau filter yang Anda pilih. Coba gunakan kata kunci lain atau reset filter.
            </p>
            <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                <button type="button" onclick="resetAllCatalogFilters()" class="px-5 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold transition shadow-sm cursor-pointer">
                    <span>↺</span> Reset Semua Filter &amp; Pencarian
                </button>
                <button type="button" onclick="selectPackageCustomRequest()" class="px-5 py-2.5 rounded-xl bg-stone-100 hover:bg-stone-200 text-ink text-xs font-bold transition cursor-pointer">
                    <span>✨</span> Request Desain Kustom Baru
                </button>
            </div>
        </div>

        {{-- Load More Section & Progress --}}
        <div id="catalogLoadMoreSection" class="mt-12 text-center flex flex-col items-center justify-center gap-3">
            <button type="button"
                    id="catalogLoadMoreBtn"
                    onclick="loadMoreCatalogThemes()"
                    class="inline-flex items-center gap-2 px-8 py-3.5 rounded-2xl bg-white hover:bg-orange-50 border-2 border-orange-500 text-orange-600 hover:text-orange-700 font-extrabold text-sm shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 cursor-pointer">
                <span>Muat Lebih Banyak Desain</span>
                <span id="catalogLoadMoreRemaining" class="px-2.5 py-0.5 rounded-full text-xs bg-orange-100 text-orange-700 font-bold">+9 Lagi</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <p class="text-xs text-ink3">
                Menampilkan <span id="catalogVisibleCountText" class="font-bold text-stone-700">0</span> dari <span id="catalogTotalCountText" class="font-bold text-stone-700">0</span> tema pilihan
            </p>
        </div>

        {{-- All Loaded Badge --}}
        <div id="catalogAllLoadedBadge" class="hidden mt-10 text-center">
            <div class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-orange-50 border border-orange-200 text-orange-800 text-xs font-bold shadow-xs">
                <span>✨</span>
                <span id="catalogAllLoadedText">Seluruh pilihan desain telah ditampilkan</span>
            </div>
        </div>
    </div>
</section>
