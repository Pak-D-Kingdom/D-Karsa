@php
    $heroTitle    = $heroTitle    ?? "D'Karsa";
    $heroCtaText  = $heroCtaText  ?? 'Buat Undangan Sekarang';
    $heroCtaLink  = $heroCtaLink  ?? '#pesan';
    $heroImage    = $heroImage    ?? null;
    $heroVideo    = $heroVideo    ?? null;
@endphp

{{-- HERO SECTION (D'Karsa Signature Modern Multi-Event Digital Platform) --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden py-14 lg:py-20 bg-gradient-to-b from-[#fffcf9] via-white to-[#fff8f2]">
    {{-- Modern Ambient Background Glows --}}
    <div aria-hidden="true" class="absolute -top-40 -right-32 w-96 h-96 rounded-full bg-gradient-to-br from-orange-400/15 via-amber-300/10 to-transparent blur-3xl pointer-events-none"></div>
    <div aria-hidden="true" class="absolute top-1/2 -left-32 w-80 h-80 rounded-full bg-gradient-to-tr from-amber-400/10 via-orange-300/10 to-transparent blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            {{-- Left Column: Brand Headline, Live Personalization Simulator & CTAs --}}
            <div class="lg:col-span-7 space-y-6 text-left">
                
                {{-- Platform Eyebrow Badge --}}
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-xl bg-orange-50/90 border border-orange-200/90 text-xs font-bold text-ink shadow-xs">
                    <span class="px-2 py-0.5 rounded-md bg-gradient-to-r from-orange-500 to-amber-500 text-white text-[10px] font-black uppercase tracking-wider">
                        PLATFORM DIGITAL NO. 1
                    </span>
                    <span class="text-orange-950/40">|</span>
                    <span class="text-orange-900 font-semibold">Aktif Instan &amp; Personalisasi Tamu Tanpa Batas</span>
                </div>

                {{-- Main Headline --}}
                <h1 class="font-serif text-3xl sm:text-5xl lg:text-[3.5rem] font-bold text-ink leading-[1.14] tracking-tight">
                    Momen Berharga, Dimulai dari <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-extrabold">Undangan yang Berkesan</span>
                </h1>

                {{-- Subtitle Description --}}
                <p class="text-base sm:text-lg text-ink2 max-w-[58ch] leading-relaxed">
                    Kreasikan undangan digital eksklusif untuk <b>Pernikahan</b>, <b>Aqiqah</b>, <b>Khitanan</b>, <b>Ulang Tahun</b>, <b>Wisuda</b>, hingga <b>Syukuran</b>. Dilengkapi musik latar otomatis, galeri prewedding, hitung mundur, amplop digital QRIS, dan sebar link nama tamu via WhatsApp sepuasnya.
                </p>

                {{-- Interactive Live WhatsApp Guest Link Simulator (D'Karsa Unique Feature) --}}
                <div class="p-4 rounded-2xl bg-white border border-orange-200/80 shadow-sm space-y-2.5 max-w-xl">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-extrabold uppercase tracking-wider text-orange-700 flex items-center gap-1.5">
                            <span>✨</span> Fitur Link Tamu Otomatis (Coba Ketik Nama):
                        </span>
                        <span class="text-[11px] text-ink3 hidden sm:inline">Ketik nama di bawah ini</span>
                    </div>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                        <div class="relative flex-1">
                            <input id="demoGuestNameInput" type="text" value="Bpk. Hendra & Keluarga" 
                                   oninput="updateHeroDemoLink(this.value)"
                                   placeholder="Ketik nama tamu (contoh: Jessica & Sahabat)"
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-orange-200 text-xs font-bold text-ink bg-orange-50/30 focus:outline-none focus:ring-2 focus:ring-orange-500/30 focus:border-orange-500 transition">
                        </div>
                        <button type="button" onclick="copyHeroDemoLink()" 
                                class="px-4 py-2.5 rounded-xl bg-orange-100 hover:bg-orange-200 text-orange-800 text-xs font-extrabold transition flex items-center justify-center gap-1.5 shrink-0">
                            <span>📋</span> Salin Link Tamu
                        </button>
                    </div>
                    <div class="text-[11.5px] text-ink3 flex items-center gap-1.5 pt-0.5 overflow-hidden">
                        <span class="text-emerald-600 font-bold shrink-0">Preview URL:</span>
                        <code id="demoGuestLinkResult" class="px-2 py-0.5 rounded bg-stone-100 text-orange-700 font-mono text-[11px] truncate">
                            d-karsa.id/laras-bima?to=Bpk.+Hendra+%26+Keluarga
                        </code>
                    </div>
                </div>

                {{-- Primary & Secondary CTA Action Buttons --}}
                <div class="flex flex-wrap items-center gap-3 pt-1">
                    <a href="{{ route('invitation.create') }}" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-white font-extrabold text-sm shadow-lg shadow-orange-500/25 hover:shadow-xl hover:shadow-orange-500/35 hover:-translate-y-0.5 active:translate-y-0 transition flex items-center gap-2.5">
                        <span>🚀 Buat Undangan Sendiri</span>
                        <span class="text-base font-bold">→</span>
                    </a>
                    <a href="#desain" class="px-6 py-3.5 rounded-xl bg-white text-ink font-bold text-sm border border-stone-200 hover:border-orange-400 hover:text-orange-600 hover:bg-orange-50/60 shadow-xs hover:shadow transition flex items-center gap-2">
                        <span>🎨 Lihat 95+ Pilihan Desain</span>
                    </a>
                </div>

                {{-- 3 Key Trust Metrics Strip --}}
                <div class="grid grid-cols-3 gap-3 pt-4 border-t border-orange-100 max-w-xl">
                    <div class="p-2.5 rounded-xl bg-white/80 border border-orange-100/80 shadow-2xs">
                        <b class="block text-sm font-extrabold text-ink">51.000+</b>
                        <span class="block text-[11px] text-ink3">Undangan Terbit</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white/80 border border-orange-100/80 shadow-2xs">
                        <b class="block text-sm font-extrabold text-orange-600">4.9 / 5.0</b>
                        <span class="block text-[11px] text-ink3">Ulasan Kepuasan</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white/80 border border-orange-100/80 shadow-2xs">
                        <b class="block text-sm font-extrabold text-ink">100% Instan</b>
                        <span class="block text-[11px] text-ink3">Midtrans Auto ACC</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Interactive Multi-Category Template Showcase Window --}}
            <div class="lg:col-span-5 relative flex justify-center">
                {{-- Ambient Orange Aura --}}
                <div aria-hidden="true" class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-orange-400/20 to-amber-300/20 blur-2xl pointer-events-none"></div>

                <div class="relative w-full max-w-[390px] rounded-3xl bg-white p-3.5 shadow-2xl border border-orange-100">
                    
                    {{-- Quick Category Filter Switcher Tabs inside the Showcase Deck --}}
                    <div class="flex items-center gap-1.5 overflow-x-auto pb-2 mb-2 border-b border-orange-100" id="heroCategoryQuickTabs">
                        <button type="button" onclick="switchHeroCategoryPreview('pernikahan')" class="hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-extrabold bg-orange-600 text-white transition shrink-0" data-hero-cat="pernikahan">
                            💍 Pernikahan
                        </button>
                        <button type="button" onclick="switchHeroCategoryPreview('aqiqah')" class="hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-100 hover:bg-orange-50 text-ink2 hover:text-orange-600 transition shrink-0" data-hero-cat="aqiqah">
                            👶 Aqiqah
                        </button>
                        <button type="button" onclick="switchHeroCategoryPreview('khitanan')" class="hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-100 hover:bg-orange-50 text-ink2 hover:text-orange-600 transition shrink-0" data-hero-cat="khitanan">
                            ✂️ Khitanan
                        </button>
                        <button type="button" onclick="switchHeroCategoryPreview('ultah')" class="hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-100 hover:bg-orange-50 text-ink2 hover:text-orange-600 transition shrink-0" data-hero-cat="ultah">
                            🎂 Ulang Tahun
                        </button>
                        <button type="button" onclick="switchHeroCategoryPreview('wisuda')" class="hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-100 hover:bg-orange-50 text-ink2 hover:text-orange-600 transition shrink-0" data-hero-cat="wisuda">
                            🎓 Wisuda
                        </button>
                    </div>

                    {{-- Main Visual Card Chassis --}}
                    <div class="relative rounded-2xl overflow-hidden aspect-[9/13.5] bg-stone-900 shadow-inner group">
                        @if($heroVideo)
                            <video id="heroVideo" class="w-full h-full object-cover" autoplay muted loop playsinline>
                                <source src="{{ $heroVideo }}" type="video/mp4" />
                            </video>
                        @elseif($heroImage)
                            <img src="{{ $heroImage }}" class="w-full h-full object-cover" alt="Preview Undangan Digital D'Karsa" />
                        @else
                            <img id="heroPreviewImg" src="https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80&auto=format&fit=crop" class="w-full h-full object-cover transition-all duration-500" alt="Preview Undangan Digital D'Karsa" />
                        @endif

                        {{-- Dark Gradient Overlay for Contrast --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/25 to-black/30"></div>

                        {{-- Top Header Pill inside Template Card --}}
                        <div class="absolute top-3.5 inset-x-3.5 flex items-center justify-between z-10">
                            <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-white text-[10px] font-black tracking-wider uppercase border border-white/20">
                                D'Karsa Live Experience
                            </span>
                            <span class="w-8 h-8 rounded-full bg-white/95 text-orange-600 grid place-items-center text-xs font-bold shadow-md animate-pulse" title="Musik Autoplay Aktif">
                                ♫
                            </span>
                        </div>

                        {{-- Floating Mini Badge Top-Left: RSVP Real-time --}}
                        <div class="absolute top-14 left-3.5 z-10 px-2.5 py-1.5 rounded-xl bg-white/95 backdrop-blur-md shadow-md border border-orange-200 text-left">
                            <span class="block text-[9px] uppercase font-black text-orange-600 leading-none">Konfirmasi RSVP</span>
                            <b class="block text-[11px] font-bold text-ink mt-0.5">2 Tamu Konfirmasi Hadir</b>
                        </div>

                        {{-- Bottom Invitation Card Information --}}
                        <div class="absolute inset-x-0 bottom-0 p-5 text-white space-y-2 z-10">
                            <div class="flex items-center gap-2">
                                <span id="heroPreviewBadge" class="text-[10px] font-extrabold tracking-wider uppercase text-white bg-orange-600 px-2.5 py-0.5 rounded-full shadow-xs">
                                    TEMA 3D JAVANESE ROYAL
                                </span>
                                <span class="text-[10px] font-semibold text-white/80 bg-black/40 px-2 py-0.5 rounded-full backdrop-blur-xs">
                                    Desain Eksklusif
                                </span>
                            </div>

                            <p id="heroPreviewTitle" class="font-serif text-2xl sm:text-3xl font-bold flex items-center gap-1.5 leading-tight">
                                Laras &amp; Bima
                                <span class="text-emerald-400 text-sm" title="Terverifikasi">✓</span>
                            </p>

                            <p class="text-xs text-white/85 leading-snug">
                                Tampilan interaktif responsif di smartphone tamu dengan navigasi Google Maps &amp; amplop digital QRIS.
                            </p>

                            {{-- Direct Live Demo Modal Button --}}
                            <button type="button" onclick="openThemePreviewModal('3d-javanese-royal')" 
                                    class="mt-2 w-full py-3 px-4 rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-white text-xs font-extrabold flex items-center justify-between shadow-lg shadow-orange-500/30 transition">
                                <span class="flex items-center gap-1.5">
                                    <span>👁️</span> Buka Demo Lengkap Undangan Ini
                                </span>
                                <span>→</span>
                            </button>
                        </div>
                    </div>

                    {{-- Bottom Feature Chips attached to Showcase Chassis --}}
                    <div class="mt-3 grid grid-cols-2 gap-2 text-left">
                        <div class="p-2.5 rounded-xl bg-orange-50/70 border border-orange-200/60">
                            <span class="block text-[10px] uppercase font-extrabold text-orange-800">💳 Amplop Digital</span>
                            <span class="block text-xs font-bold text-ink mt-0.5">BCA, Mandiri &amp; QRIS</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-emerald-50/70 border border-emerald-200/60">
                            <span class="block text-[10px] uppercase font-extrabold text-emerald-800">⚡ Status Undangan</span>
                            <span class="block text-xs font-bold text-ink mt-0.5">Aktif Selamanya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- In-Hero JavaScript for Live Link Simulator & Category Preview Switcher --}}
<script>
    function updateHeroDemoLink(name) {
        const clean = encodeURIComponent(name || 'Bpk. Hendra & Keluarga');
        const url = 'd-karsa.id/laras-bima?to=' + clean;
        const resEl = document.getElementById('demoGuestLinkResult');
        if (resEl) resEl.textContent = url;
    }

    function copyHeroDemoLink() {
        const resEl = document.getElementById('demoGuestLinkResult');
        if (resEl) {
            navigator.clipboard.writeText('https://' + resEl.textContent.trim());
            alert('Tautan WhatsApp personal berhasil disalin: https://' + resEl.textContent.trim());
        }
    }

    const heroCatData = {
        'pernikahan': {
            slug: '3d-javanese-royal',
            name: 'Laras & Bima',
            badge: 'TEMA 3D JAVANESE ROYAL',
            img: 'https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80&auto=format&fit=crop'
        },
        'aqiqah': {
            slug: 'sweet-baby-pastel-aqiqah',
            name: 'Aisyah Putri Humaira',
            badge: 'TEMA SWEET BABY PASTEL',
            img: 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=900&q=80&auto=format&fit=crop'
        },
        'khitanan': {
            slug: 'walimatul-khitan-berkah-sholeh',
            name: 'Muhammad Rayyan Al-Fatih',
            badge: 'TEMA WALIMATUL KHITAN',
            img: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=900&q=80&auto=format&fit=crop'
        },
        'ultah': {
            slug: 'cheerful-confetti-birthday',
            name: 'Jessica Olivia (Sweet 17th)',
            badge: 'TEMA CHEERFUL BIRTHDAY',
            img: 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=900&q=80&auto=format&fit=crop'
        },
        'wisuda': {
            slug: 'modern-graduate-editorial',
            name: 'Farhan Maulana, S.Kom.',
            badge: 'TEMA MODERN GRADUATE',
            img: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=900&q=80&auto=format&fit=crop'
        }
    };

    function switchHeroCategoryPreview(cat) {
        document.querySelectorAll('#heroCategoryQuickTabs .hero-cat-btn').forEach(btn => {
            if (btn.dataset.heroCat === cat) {
                btn.className = 'hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-extrabold bg-orange-600 text-white transition shrink-0';
            } else {
                btn.className = 'hero-cat-btn px-2.5 py-1 rounded-lg text-[11px] font-bold bg-stone-100 hover:bg-orange-50 text-ink2 hover:text-orange-600 transition shrink-0';
            }
        });

        const data = heroCatData[cat];
        if (data) {
            const imgEl = document.getElementById('heroPreviewImg');
            const badgeEl = document.getElementById('heroPreviewBadge');
            const titleEl = document.getElementById('heroPreviewTitle');
            if (imgEl) imgEl.src = data.img;
            if (badgeEl) badgeEl.textContent = data.badge;
            if (titleEl) titleEl.innerHTML = data.name + ' <span class="text-emerald-400 text-sm" title="Terverifikasi">✓</span>';
        }
    }
</script>
