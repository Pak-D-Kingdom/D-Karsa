@php
    $heroTitle    = $heroTitle    ?? "D'Karsa";
    $heroCtaText  = $heroCtaText  ?? 'Buat Undangan Sekarang';
    $heroCtaLink  = $heroCtaLink  ?? '#pesan';
    $heroImage    = $heroImage    ?? null;
    $heroVideo    = $heroVideo    ?? null;
@endphp

{{-- HERO SECTION (D'Karsa Digital Wedding Platform - Our Wedding Link Style) --}}
<section class="relative min-h-[96vh] flex items-center overflow-hidden motif pt-28 pb-16"
         style="background: radial-gradient(55% 60% at 90% 15%, #fde0e6 0, transparent 70%), radial-gradient(45% 50% at 3% 98%, #fcece6 0, transparent 70%), var(--bg);">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8 w-full grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        {{-- Left Column: Editorial Text + Actions + Category Pills + 4-Step Workflow --}}
        <div class="lg:col-span-7 space-y-6 z-10">
            <span class="alis">
                <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                Platform Undangan Digital Serbaguna No.1 D'Karsa
            </span>

            <h1 class="ow-h1">
                Platform <span class="t-script">undangan digital</span>
                <span class="t-bold block sm:inline">untuk Semua Acara</span>
            </h1>

            <p class="text-base md:text-[17.5px] text-ink2 max-w-[54ch] leading-relaxed">
                Rancang undangan digital interaktif untuk <b>Pernikahan</b>, <b>Halal Bihalal</b>, <b>Khitanan</b>, <b>Aqiqah</b>, <b>Ulang Tahun</b>, hingga <b>Syukuran Keluarga</b>. Sebar link nama tamu tanpa batas via WhatsApp, terima beres dalam hitungan jam!
            </p>

            {{-- Event Category Quick Pills --}}
            <div class="flex flex-wrap items-center gap-2 pt-1">
                <button type="button" onclick="selectCategoryFilter('pernikahan')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>💍</span> Pernikahan
                </button>
                <button type="button" onclick="selectCategoryFilter('halalbihalal')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>🕌</span> Halal Bihalal
                </button>
                <button type="button" onclick="selectCategoryFilter('khitanan')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>✂️</span> Khitanan
                </button>
                <button type="button" onclick="selectCategoryFilter('aqiqah')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>👶</span> Aqiqah
                </button>
                <button type="button" onclick="selectCategoryFilter('ultah')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>🎂</span> Ulang Tahun
                </button>
                <button type="button" onclick="selectCategoryFilter('syukuran')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand transition shadow-sm flex items-center gap-1.5">
                    <span>🎉</span> Syukuran / Reuni
                </button>
            </div>

            {{-- Primary & Secondary CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-3 pt-1">
                <a href="{{ route('invitation.create') }}" class="tbl tbl--utama">
                    <span>✨ Buat Undangan Sendiri</span>
                    <span class="tbl__ikon">
                        <svg aria-hidden="true" class="w-4 h-4"><use href="#i-arrow-up-right"></use></svg>
                    </span>
                </a>
                <a href="#desain" class="tbl tbl--kedua">
                    Lihat Katalog Kategori
                </a>
            </div>

            {{-- 4-Column Workflow Bar (.langkah from our-wedding.link) --}}
            <ol aria-label="Alur D'Karsa" class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-5 max-w-2xl list-none m-0 p-0">
                <li class="relative pt-3">
                    <div class="absolute top-0 inset-x-0 h-[3px] rounded-full bg-brand"></div>
                    <b class="block text-sm font-extrabold text-ink">1. Rancang</b>
                    <span class="block text-xs text-ink2 mt-0.5 leading-snug">95+ desain siap pakai atau D'Karsa Studio</span>
                </li>
                <li class="relative pt-3">
                    <div class="absolute top-0 inset-x-0 h-[3px] rounded-full bg-brand/60"></div>
                    <b class="block text-sm font-extrabold text-ink">2. Undang</b>
                    <span class="block text-xs text-ink2 mt-0.5 leading-snug">Sebar link nama tamu &amp; WA tanpa batas</span>
                </li>
                <li class="relative pt-3">
                    <div class="absolute top-0 inset-x-0 h-[3px] rounded-full bg-brand/40"></div>
                    <b class="block text-sm font-extrabold text-ink">3. Kelola</b>
                    <span class="block text-xs text-ink2 mt-0.5 leading-snug">RSVP, ucapan doa, meja &amp; amplop digital</span>
                </li>
                <li class="relative pt-3">
                    <div class="absolute top-0 inset-x-0 h-[3px] rounded-full bg-brand/25"></div>
                    <b class="block text-sm font-extrabold text-ink">4. Sambut</b>
                    <span class="block text-xs text-ink2 mt-0.5 leading-snug">Buku tamu QR Code &amp; layar sapa di hari H</span>
                </li>
            </ol>
        </div>

        {{-- Right Column: Phone Portrait Showcase + Floating Glass Stat Cards --}}
        <div class="lg:col-span-5 relative flex justify-center">
            {{-- Ambient Blush Glow --}}
            <div aria-hidden="true" class="absolute -inset-6 rounded-full blur-2xl opacity-70 pointer-events-none"
                 style="background: radial-gradient(closest-side at 35% 38%, rgba(246,56,84,.28), transparent 72%), radial-gradient(closest-side at 68% 64%, rgba(255,210,220,.75), transparent);"></div>

            <div class="relative w-full max-w-[345px]">
                <div class="hp-frame aspect-[9/14] w-full overflow-hidden">
                    <div class="relative w-full h-full rounded-[26px] overflow-hidden bg-sunk">
                        @if($heroVideo)
                            <video id="heroVideo" class="w-full h-full object-cover" autoplay muted loop playsinline>
                                <source src="{{ $heroVideo }}" type="video/mp4" />
                            </video>
                        @elseif($heroImage)
                            <img src="{{ $heroImage }}" class="w-full h-full object-cover" alt="Preview Undangan Digital D'Karsa" />
                        @else
                            <img id="heroPreviewImg" src="https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80&auto=format&fit=crop" class="w-full h-full object-cover transition-all duration-500" alt="Preview Undangan Digital D'Karsa" />
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1b1416]/90 via-[#1b1416]/25 to-transparent"></div>

                        {{-- Top Demo Pill inside phone --}}
                        <div class="absolute top-4 inset-x-4 flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-black/45 backdrop-blur-md text-white text-[10px] font-bold tracking-wider uppercase border border-white/20">
                                Live Preview • D'Karsa
                            </span>
                            <span class="w-7 h-7 rounded-full bg-white/90 text-accent grid place-items-center text-xs font-bold shadow">
                                ♫
                            </span>
                        </div>

                        {{-- Bottom Invitation Sample inside phone --}}
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                            <span id="heroPreviewBadge" class="text-[10px] font-extrabold tracking-[0.18em] uppercase text-brand bg-white/95 px-2.5 py-0.5 rounded-full">
                                TEMA 3D JAVANESE ROYAL
                            </span>
                            <p id="heroPreviewTitle" class="font-serif text-3xl font-semibold mt-2 flex items-center gap-1.5">
                                Laras &amp; Bima
                                <svg aria-hidden="true" class="w-4 h-4"><use href="#i-centang-biru"></use></svg>
                            </p>
                            <p class="text-xs text-white/80 mt-0.5">Contoh tampilan undangan di HP tamu</p>
                            <button type="button" onclick="openThemePreviewModal('3d-javanese-royal')" class="mt-3 w-full py-2.5 px-4 rounded-full bg-cta hover:bg-accent text-white text-xs font-bold flex items-center justify-between shadow-lg transition">
                                <span>👁️ Buka Live Demo Interaktif</span>
                                <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Floating Card 1: Top-Right Blush Glass Badge (51.213 pasangan) --}}
                <div class="hidden sm:block absolute -top-4 -right-6 z-20 px-4 py-3 rounded-2xl backdrop-blur-xl shadow-lg border border-white/70"
                     style="background: linear-gradient(140deg, rgba(253,228,234,.92), rgba(250,204,214,.74));">
                    <span class="block font-serif text-2xl font-bold leading-none text-[#a3163a]">
                        51.213+
                    </span>
                    <span class="block text-[11px] font-semibold text-ink2 mt-1">pasangan memakai D'Karsa</span>
                </div>

                {{-- Floating Card 2: Top-Left White Glass Badge (95 Desain) --}}
                <div class="hidden sm:block absolute -left-8 top-14 z-20 px-4 py-3 rounded-2xl backdrop-blur-xl shadow-lg border border-white/85"
                     style="background: linear-gradient(155deg, rgba(255,255,255,.94), rgba(253,240,243,.78));">
                    <span class="block font-serif text-2xl font-bold leading-none text-ink">95+ Tema</span>
                    <span class="block text-[11px] font-semibold text-ink2 mt-0.5">Adat, Minimalis &amp; 3D Luxury</span>
                </div>

                {{-- Floating Card 3: Bottom-Left Dark Glass Badge (831.784 RSVP) --}}
                <div class="hidden sm:block absolute -left-8 bottom-20 z-20 px-4 py-3 rounded-2xl backdrop-blur-xl shadow-xl border border-white/20 max-w-[220px]"
                     style="background: linear-gradient(150deg, rgba(32,22,26,.88), rgba(32,22,26,.70));">
                    <span class="block font-serif text-2xl font-bold text-white leading-none">831.784+</span>
                    <span class="block text-[11px] text-white/80 mt-1">konfirmasi kehadiran &amp; QR tamu</span>
                </div>

                {{-- Floating Card 4: Bottom-Right Rose Crimson Badge (Mulai Rp50rb) --}}
                <div class="hidden sm:block absolute -right-5 -bottom-4 z-20 px-4 py-3 rounded-2xl shadow-xl text-white border border-white/25"
                     style="background: linear-gradient(145deg, rgba(230,42,73,.95), rgba(186,22,56,.88));">
                    <span class="block font-serif text-2xl font-bold leading-none">Mulai Rp50rb</span>
                    <span class="block text-[11px] text-white/90 mt-0.5">Aktif selamanya • Revisi fleksibel</span>
                </div>
            </div>
        </div>
    </div>
</section>
