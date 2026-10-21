<!-- partials/preview-modal.blade.php (Live Interactive Preview Modal D'Karsa) -->
<div id="themePreviewModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md overflow-y-auto p-2 sm:p-6 transition-all duration-300 opacity-0" aria-labelledby="modalThemeTitle" role="dialog" aria-modal="true">
    <div class="min-h-full flex items-center justify-center">
        {{-- Modal Window --}}
        <div class="relative bg-white text-ink w-full max-w-5xl rounded-[24px] sm:rounded-[32px] shadow-2xl overflow-hidden border border-white/20 transform transition-all duration-300 scale-95" id="themePreviewBox">
            
            {{-- Top Modal Bar (Mobile Optimized: No Horizontal Overflow) --}}
            <div class="px-3.5 sm:px-6 py-3 sm:py-4 bg-sunk/90 border-b border-ink/10">
                <div class="flex items-center justify-between gap-2.5 sm:gap-4">
                    {{-- Left: Category Badge & Theme Title --}}
                    <div class="flex items-center gap-2 sm:gap-3 min-w-0 flex-1">
                        <span id="previewCategoryBadge" class="shrink-0 px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-white text-accent border border-brand/20 shadow-sm flex items-center gap-1">
                            💍 Pernikahan
                        </span>
                        <div class="min-w-0 flex-1">
                            <h3 id="modalThemeTitle" class="font-serif text-sm sm:text-xl md:text-2xl font-bold text-ink leading-tight truncate">Chibi Red Oriental</h3>
                            <p id="modalThemePackage" class="text-[10px] sm:text-xs text-ink3 truncate">Paket Rekomendasi: Paket Premium - Rp110.000</p>
                        </div>
                    </div>

                    {{-- Right: Fullscreen Demo & Close Actions --}}
                    <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                        <a id="btnModalFullscreenDemo" href="/demo/chibi-red" target="_blank" class="hidden sm:inline-flex px-3.5 py-1.5 rounded-full bg-white text-ink hover:text-brand border border-ink/15 text-xs font-bold transition items-center gap-1.5 shadow-sm whitespace-nowrap">
                            <span>🌐</span> Buka Layar Penuh ↗
                        </a>
                        <button type="button" onclick="orderCurrentPreviewTheme()" class="tbl tbl--utama !h-9 !px-4 !text-xs hidden md:inline-flex">
                            <span>Pesan Desain Ini</span>
                            <span class="tbl__ikon !w-6 !h-6">
                                <svg aria-hidden="true" class="w-3 h-3"><use href="#i-arrow-up-right"></use></svg>
                            </span>
                        </button>
                        <button type="button" onclick="closeThemePreview()" class="w-8 sm:w-9 h-8 sm:h-9 rounded-full bg-white text-ink hover:text-brand hover:bg-rose-50 border border-ink/15 grid place-items-center transition text-base sm:text-lg font-bold shadow-sm shrink-0" title="Tutup Preview">
                            ✕
                        </button>
                    </div>
                </div>

                {{-- Mobile Quick Action Bar (Visible strictly on mobile screens < sm) --}}
                <div class="mt-2.5 pt-2 border-t border-ink/5 flex sm:hidden items-center justify-between gap-2">
                    <span class="text-[11px] text-ink3 flex items-center gap-1.5">
                        <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Mode Demo Interaktif
                    </span>
                    <a id="btnModalFullscreenDemoMobile" href="/demo/chibi-red" target="_blank" class="px-3 py-1 rounded-full bg-white text-brand hover:bg-brand hover:text-white border border-brand/20 text-[11px] font-bold transition flex items-center gap-1 shadow-2xs whitespace-nowrap">
                        <span>🌐</span> Buka Layar Penuh ↗
                    </a>
                </div>
            </div>

            {{-- Modal Body: Left Live Phone Preview with Real Template iFrame + Right Theme Info & Category Switcher --}}
            <div class="p-3.5 sm:p-8 grid lg:grid-cols-12 gap-6 sm:gap-8 items-start bg-gradient-to-b from-white to-blush/30">
                
                {{-- LEFT: Interactive Smartphone Frame Mockup with Live iFrame Player --}}
                <div class="lg:col-span-6 flex flex-col items-center justify-center">
                    {{-- Device Chassis (Optimized for Mobile and Desktop Viewports) --}}
                    <div class="relative w-full max-w-[310px] sm:max-w-[340px] aspect-[9/18.5] bg-[#1a1215] rounded-[38px] sm:rounded-[44px] p-2 sm:p-2.5 shadow-[0_20px_50px_-15px_rgba(0,0,0,0.5)] border-[4px] sm:border-[5px] border-[#2d2226] ring-1 ring-white/10">
                        {{-- Speaker / Dynamic Island --}}
                        <div class="absolute top-3 sm:top-4 left-1/2 -translate-x-1/2 w-24 sm:w-28 h-3.5 sm:h-4 bg-black rounded-full z-30 flex items-center justify-center pointer-events-none">
                            <span class="w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-[#1b1416] mr-3 sm:mr-4"></span>
                            <span class="w-1.5 sm:w-2 h-1.5 sm:h-2 rounded-full bg-[#0a1828]"></span>
                        </div>

                        {{-- Screen Viewport hosting true live template --}}
                        <div class="relative w-full h-full rounded-[30px] sm:rounded-[34px] overflow-hidden bg-white shadow-inner">
                            <iframe id="previewModalIframe" src="/demo/chibi-red" class="w-full h-full border-0 rounded-[30px] sm:rounded-[34px]" allow="autoplay"></iframe>
                        </div>
                    </div>

                    {{-- Simulator Tip & Fullscreen Link --}}
                    <div class="mt-3 text-center">
                        <a id="btnModalFullscreenDemoBottom" href="/demo/chibi-red" target="_blank" class="text-xs font-bold text-brand hover:underline inline-flex items-center gap-1.5">
                            <span>🌐</span> Buka Tampilan Layar Penuh (Desktop &amp; Mobile) ↗
                        </a>
                        <p class="text-[11px] text-ink3 mt-0.5">
                            Interaktif: animasi partikel, putar musik, hitung mundur &amp; galeri 3D.
                        </p>
                    </div>
                </div>

                {{-- RIGHT: Theme Details, Template Switcher & Direct Order CTA --}}
                <div class="lg:col-span-6 space-y-6">
                    
                    {{-- Template Selector Chips (Filtered Strictly by Category) --}}
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-ink3">Pilihan Desain Template:</label>
                            <span id="previewCategoryFilterLabel" class="text-[11px] font-bold text-brand bg-brand/10 px-2.5 py-0.5 rounded-full">Kategori: Pernikahan</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2" id="previewThemeSelectorGrid">
                            {{-- Dynamically populated per category via JavaScript --}}
                        </div>
                    </div>

                    {{-- Theme Description Box --}}
                    <div class="p-4 sm:p-5 rounded-2xl bg-white border border-ink/10 shadow-sm space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold uppercase tracking-wider text-brand" id="modalCategorySub">Kategori: Pernikahan</span>
                            <span class="text-xs font-bold text-amber-500">★★★★★ Desain Terpopuler</span>
                        </div>
                        <h4 class="font-serif text-xl sm:text-2xl font-bold text-ink" id="modalThemeName">Chibi Red Oriental</h4>
                        <p class="text-xs sm:text-sm text-ink2 leading-relaxed" id="modalThemeDesc">
                            Desain pernikahan oriental modern Chibi Red: kaligrafi merah emas, Song Hỷ badge (囍), kalender tanggal interaktif, galeri silinder 3D, dan amplop digital angpao.
                        </p>
                    </div>

                    {{-- Features Checklist Included in this Theme --}}
                    <div class="p-4 sm:p-5 rounded-2xl bg-white border border-ink/10 shadow-sm space-y-3">
                        <h5 class="text-xs font-extrabold uppercase tracking-wider text-ink">Fitur Lengkap yang Anda Dapatkan:</h5>
                        <ul class="grid sm:grid-cols-2 gap-2 text-xs text-ink2 font-medium">
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Link Nama Tamu Tanpa Batas (WhatsApp)</li>
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Musik Latar Otomatis / Custom Song</li>
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Navigasi Lokasi Peta Google Maps</li>
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Amplop Digital QRIS &amp; Transfer Rekening</li>
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Konfirmasi RSVP &amp; Buku Tamu Online</li>
                            <li class="flex items-center gap-2"><svg aria-hidden="true" class="w-3.5 h-3.5 text-brand shrink-0"><use href="#i-centang-biru"></use></svg> Masa Aktif Selamanya (Tanpa Kadaluarsa)</li>
                        </ul>
                    </div>

                    {{-- Order Action Buttons --}}
                    <div class="space-y-3 pt-2">
                        <button type="button" onclick="orderCurrentPreviewTheme()" class="w-full tbl tbl--utama !h-12 !text-sm sm:!text-base justify-between !px-5 sm:!px-6 shadow-md">
                            <span>✨ Pesan Desain Ini Sekarang</span>
                            <span class="tbl__ikon !w-7 !h-7 sm:!w-8 sm:!h-8">
                                <svg aria-hidden="true" class="w-3.5 h-3.5 sm:w-4 sm:h-4"><use href="#i-arrow-up-right"></use></svg>
                            </span>
                        </button>
                        
                        <div class="flex items-center gap-2 sm:gap-3">
                            <button type="button" onclick="consultPreviewViaWhatsApp()" class="flex-1 tbl tbl--kedua !h-11 !px-3 sm:!px-4 !text-xs justify-center gap-2">
                                <svg aria-hidden="true" class="w-4 h-4 text-[#25d366] shrink-0"><use href="#i-whatsapp-logo"></use></svg>
                                <span class="truncate">Tanya Admin via WhatsApp</span>
                            </button>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <button type="button" onclick="navPreviewTheme(-1)" class="w-10 sm:w-11 h-10 sm:h-11 rounded-full bg-white text-ink border border-ink/15 hover:border-brand hover:text-brand grid place-items-center transition text-sm font-bold shadow-sm" title="Tema Sebelumnya">
                                    ‹
                                </button>
                                <button type="button" onclick="navPreviewTheme(1)" class="w-10 sm:w-11 h-10 sm:h-11 rounded-full bg-white text-ink border border-ink/15 hover:border-brand hover:text-brand grid place-items-center transition text-sm font-bold shadow-sm" title="Tema Berikutnya">
                                    ›
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
