@php
    $heroTitle    = $heroTitle    ?? "D'Karsa";
    $heroCtaText  = $heroCtaText  ?? 'Buat Undangan Sekarang';
    $heroCtaLink  = $heroCtaLink  ?? '#pesan';
    $heroImage    = $heroImage    ?? null;
    $heroVideo    = $heroVideo    ?? null;
@endphp

{{-- HERO SECTION (D'Karsa Modern Luxury Digital Platform) --}}
<section class="relative min-h-[96vh] flex items-center overflow-hidden pt-28 pb-16"
         style="background: radial-gradient(45% 45% at 85% 18%, rgba(246,56,84,0.14) 0, transparent 70%), radial-gradient(40% 40% at 10% 80%, rgba(254,205,215,0.3) 0, transparent 70%), #fffcfc;">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8 w-full grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        {{-- Left Column: Brand Headline + Actions + Category Pills + Value Metrics --}}
        <div class="lg:col-span-7 space-y-6 z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-pink-200 shadow-sm text-xs font-bold text-ink">
                <span class="w-2 h-2 rounded-full bg-brand animate-ping"></span>
                <span class="text-brand font-extrabold uppercase tracking-wider text-[11px]">D'Karsa Digital Suite</span>
                <span class="text-ink/20">|</span>
                <span class="text-ink2 font-medium">Aktivasi Instan &amp; Desain Eksklusif</span>
            </div>

            <h1 class="font-serif text-3xl sm:text-5xl lg:text-[3.5rem] font-bold text-ink leading-[1.14] tracking-tight">
                Kreasikan Undangan Digital Berkelas, <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand via-accent to-pink-600 font-extrabold">Aktif Instan untuk Semua Momen</span>
            </h1>

            <p class="text-base md:text-[17.5px] text-ink2 max-w-[54ch] leading-relaxed">
                Rancang undangan online modern untuk <b>Pernikahan</b>, <b>Khitanan</b>, <b>Aqiqah</b>, <b>Ulang Tahun</b>, hingga <b>Syukuran Keluarga</b>. Kirim link nama tamu via WhatsApp tanpa batas, terintegrasi RSVP, musik latar, dan pembayaran otomatis Midtrans.
            </p>

            {{-- Event Category Quick Pills --}}
            <div class="flex flex-wrap items-center gap-2 pt-1">
                <button type="button" onclick="selectCategoryFilter('pernikahan')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>💍</span> Pernikahan
                </button>
                <button type="button" onclick="selectCategoryFilter('halalbihalal')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>🕌</span> Halal Bihalal
                </button>
                <button type="button" onclick="selectCategoryFilter('khitanan')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>✂️</span> Khitanan
                </button>
                <button type="button" onclick="selectCategoryFilter('aqiqah')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>👶</span> Aqiqah
                </button>
                <button type="button" onclick="selectCategoryFilter('ultah')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>🎂</span> Ulang Tahun
                </button>
                <button type="button" onclick="selectCategoryFilter('syukuran')" class="px-3.5 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/15 hover:border-brand hover:text-brand hover:bg-pink-50/50 transition shadow-sm flex items-center gap-1.5">
                    <span>🎉</span> Syukuran / Reuni
                </button>
            </div>

            {{-- Primary & Secondary CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <a href="{{ route('invitation.create') }}" class="px-7 py-3.5 rounded-2xl bg-gradient-to-r from-brand via-accent to-pink-600 text-white font-extrabold text-sm shadow-xl shadow-brand/25 hover:shadow-2xl hover:shadow-brand/35 hover:-translate-y-0.5 transition flex items-center gap-2">
                    <span>✨ Buat Undangan Sendiri</span>
                    <span class="text-base font-bold">→</span>
                </a>
                <a href="#desain" class="px-6 py-3.5 rounded-2xl bg-white text-ink font-bold text-sm border border-ink/15 hover:border-brand hover:text-brand shadow-sm hover:shadow transition flex items-center gap-2">
                    <span>🎨 Jelajahi 95+ Desain</span>
                </a>
            </div>

            {{-- 4-Pillar Value Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-6 border-t border-ink/10 max-w-2xl">
                <div class="p-3.5 rounded-2xl bg-white/90 border border-pink-100 shadow-sm space-y-1 hover:border-brand/40 transition">
                    <span class="text-xl block">⚡</span>
                    <b class="block text-xs font-extrabold text-ink">Aktivasi Instan</b>
                    <span class="block text-[11px] text-ink3 leading-snug">Otomatis via Midtrans</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/90 border border-pink-100 shadow-sm space-y-1 hover:border-brand/40 transition">
                    <span class="text-xl block">💌</span>
                    <b class="block text-xs font-extrabold text-ink">Tamu Tanpa Batas</b>
                    <span class="block text-[11px] text-ink3 leading-snug">Tautan WA personal</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/90 border border-pink-100 shadow-sm space-y-1 hover:border-brand/40 transition">
                    <span class="text-xl block">🎵</span>
                    <b class="block text-xs font-extrabold text-ink">Interaktif Penuh</b>
                    <span class="block text-[11px] text-ink3 leading-snug">RSVP, Musik, Galeri HD</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/90 border border-pink-100 shadow-sm space-y-1 hover:border-brand/40 transition">
                    <span class="text-xl block">💎</span>
                    <b class="block text-xs font-extrabold text-ink">95+ Desain 3D</b>
                    <span class="block text-[11px] text-ink3 leading-snug">Adat &amp; Modern mewah</span>
                </div>
            </div>
        </div>

        {{-- Right Column: Modern Device Portrait Showcase + Floating Interactive Pills --}}
        <div class="lg:col-span-5 relative flex justify-center">
            {{-- Ambient Blush Glow --}}
            <div aria-hidden="true" class="absolute -inset-6 rounded-full blur-3xl opacity-60 pointer-events-none"
                 style="background: radial-gradient(closest-side at 40% 40%, rgba(246,56,84,.25), transparent 70%), radial-gradient(closest-side at 70% 65%, rgba(255,210,220,.8), transparent);"></div>

            <div class="relative w-full max-w-[345px]">
                {{-- Sleek Device Frame --}}
                <div class="relative p-2.5 rounded-[40px] bg-gradient-to-b from-stone-200 via-stone-100 to-stone-300 shadow-2xl border border-white/80 aspect-[9/14] w-full overflow-hidden">
                    <div class="relative w-full h-full rounded-[32px] overflow-hidden bg-sunk">
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
                            <span class="px-3 py-1 rounded-full bg-black/50 backdrop-blur-md text-white text-[10px] font-extrabold tracking-wider uppercase border border-white/20">
                                Live Preview • D'Karsa
                            </span>
                            <span class="w-7 h-7 rounded-full bg-white/95 text-brand grid place-items-center text-xs font-bold shadow animate-pulse">
                                ♫
                            </span>
                        </div>

                        {{-- Bottom Invitation Sample inside phone --}}
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white space-y-1.5">
                            <span id="heroPreviewBadge" class="inline-block text-[10px] font-extrabold tracking-[0.16em] uppercase text-brand bg-white/95 px-2.5 py-0.5 rounded-full shadow-sm">
                                TEMA 3D JAVANESE ROYAL
                            </span>
                            <p id="heroPreviewTitle" class="font-serif text-3xl font-bold flex items-center gap-1.5 leading-tight">
                                Laras &amp; Bima
                                <span class="text-emerald-400 text-sm" title="Terverifikasi">✓</span>
                            </p>
                            <p class="text-[11.5px] text-white/80">Contoh tampilan interaktif di smartphone tamu</p>
                            <button type="button" onclick="openThemePreviewModal('3d-javanese-royal')" class="mt-2.5 w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-brand to-accent hover:opacity-95 text-white text-xs font-extrabold flex items-center justify-between shadow-lg transition">
                                <span>👁️ Buka Live Demo Interaktif</span>
                                <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Floating Pill 1: Top-Right Personal Guest Badge --}}
                <div class="hidden sm:flex items-center gap-2.5 absolute -top-3 -right-8 z-20 px-3.5 py-2.5 rounded-2xl bg-white/95 backdrop-blur-xl shadow-xl border border-pink-200">
                    <span class="w-8 h-8 rounded-full bg-pink-100 text-brand grid place-items-center text-sm font-bold">
                        💌
                    </span>
                    <div class="text-left">
                        <span class="block text-[9.5px] uppercase font-extrabold text-ink3">Tamu Khusus (VIP)</span>
                        <b class="block text-xs font-bold text-ink">Bapak Budi Santoso</b>
                    </div>
                </div>

                {{-- Floating Pill 2: Top-Left Rating & Users Badge --}}
                <div class="hidden sm:block absolute -left-7 top-14 z-20 px-4 py-2.5 rounded-2xl bg-white/95 backdrop-blur-xl shadow-xl border border-pink-100 text-left">
                    <div class="flex items-center gap-1 text-amber-500 text-xs">
                        ★★★★★
                    </div>
                    <span class="block font-serif text-lg font-extrabold text-ink leading-tight mt-0.5">51.000+</span>
                    <span class="block text-[10px] font-semibold text-ink3">Undangan Telah Terbit</span>
                </div>

                {{-- Floating Pill 3: Bottom-Left Interactive RSVP Card --}}
                <div class="hidden sm:flex items-center gap-3 absolute -left-8 bottom-16 z-20 px-3.5 py-2.5 rounded-2xl bg-[#1c1417]/90 backdrop-blur-xl shadow-2xl border border-white/20 text-white text-left">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <div>
                        <b class="block text-xs font-bold text-white">RSVP: 2 Tamu Hadir</b>
                        <span class="block text-[10px] text-white/70">Konfirmasi otomatis real-time</span>
                    </div>
                </div>

                {{-- Floating Pill 4: Bottom-Right Instant Activation Badge --}}
                <div class="hidden sm:flex items-center gap-2.5 absolute -right-6 -bottom-3 z-20 px-3.5 py-2.5 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-700 text-white shadow-xl border border-white/20 text-left">
                    <span class="text-base">⚡</span>
                    <div>
                        <b class="block text-xs font-extrabold text-white">Aktivasi Instan</b>
                        <span class="block text-[10px] text-white/90">Lunas via Midtrans</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
