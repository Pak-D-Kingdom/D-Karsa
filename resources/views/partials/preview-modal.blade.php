<!-- partials/preview-modal.blade.php (Live Interactive Preview Modal D'Karsa) -->
<div id="themePreviewModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md overflow-y-auto p-3 sm:p-6 transition-all duration-300 opacity-0" aria-labelledby="modalThemeTitle" role="dialog" aria-modal="true">
    <div class="min-h-full flex items-center justify-center">
        {{-- Modal Window --}}
        <div class="relative bg-white text-ink w-full max-w-5xl rounded-[32px] shadow-2xl overflow-hidden border border-white/20 transform transition-all duration-300 scale-95" id="themePreviewBox">
            
            {{-- Top Modal Bar --}}
            <div class="px-6 py-4 bg-sunk/80 border-b border-ink/10 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span id="previewCategoryBadge" class="px-3 py-1 rounded-full text-xs font-bold bg-white text-accent border border-brand/20 shadow-sm flex items-center gap-1">
                        💍 Pernikahan
                    </span>
                    <div>
                        <h3 id="modalThemeTitle" class="font-serif text-xl sm:text-2xl font-bold text-ink leading-tight">3D Javanese Royal</h3>
                        <p id="modalThemePackage" class="text-xs text-ink3">Paket Rekomendasi: Paket Eksklusif - Rp180.000</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button type="button" onclick="orderCurrentPreviewTheme()" class="tbl tbl--utama !h-9 !px-4 !text-xs hidden sm:inline-flex">
                        <span>Pesan Tema Ini</span>
                        <span class="tbl__ikon !w-6 !h-6">
                            <svg aria-hidden="true" class="w-3 h-3"><use href="#i-arrow-up-right"></use></svg>
                        </span>
                    </button>
                    <button type="button" onclick="closeThemePreview()" class="w-9 h-9 rounded-full bg-white text-ink2 hover:text-ink hover:bg-blush border border-ink/10 grid place-items-center transition text-lg font-bold" title="Tutup Preview">
                        ✕
                    </button>
                </div>
            </div>

            {{-- Modal Body: Left Phone Mockup + Right Theme Info & Category Switcher --}}
            <div class="p-5 sm:p-8 grid lg:grid-cols-12 gap-8 items-start bg-gradient-to-b from-white to-blush/30">
                
                {{-- LEFT: Interactive Smartphone Frame Mockup --}}
                <div class="lg:col-span-6 flex flex-col items-center justify-center">
                    {{-- Device Wrapper --}}
                    <div class="relative w-full max-w-[340px] aspect-[9/18.5] bg-[#1a1215] rounded-[44px] p-3 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.5)] border-[5px] border-[#2d2226] ring-1 ring-white/10">
                        {{-- Speaker / Dynamic Island --}}
                        <div class="absolute top-4 left-1/2 -translate-x-1/2 w-28 h-4.5 bg-black rounded-full z-30 flex items-center justify-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#1b1416] mr-4"></span>
                            <span class="w-2 h-2 rounded-full bg-[#0a1828]"></span>
                        </div>

                        {{-- Floating Music Player Pill Inside Phone --}}
                        <div class="absolute top-12 right-6 z-20">
                            <button id="previewMusicBtn" type="button" onclick="togglePreviewMusic(this)" class="w-8 h-8 rounded-full bg-black/60 backdrop-blur-md text-white text-xs grid place-items-center shadow hover:scale-105 transition border border-white/20" title="Putar / Jeda Musik Undangan">
                                <span id="previewMusicIcon" class="text-[10px]">♫</span>
                            </button>
                            <audio id="previewAudio" loop preload="auto" src="{{ asset('audio/wedding-melody.wav') }}"></audio>
                        </div>

                        {{-- Screen Viewport --}}
                        <div id="phoneScreenScroll" class="relative w-full h-full rounded-[34px] overflow-y-auto overflow-x-hidden bg-white text-ink text-center select-none" style="scrollbar-width: thin;">
                            
                            {{-- COVER SECTION --}}
                            <div id="previewCover" class="relative min-h-full flex flex-col items-center justify-between p-6 text-white text-center" style="background: linear-gradient(180deg, rgba(18,10,12,0.3) 0%, rgba(18,10,12,0.85) 100%), url('https://images.unsplash.com/photo-1519741497674-611481863552?w=700') center/cover;">
                                <div class="pt-8 w-full">
                                    <span id="phoneCoverBadge" class="inline-block px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-[10px] font-bold uppercase tracking-widest text-white border border-white/30">
                                        WALIMATUL URUSY
                                    </span>
                                </div>

                                <div class="my-auto py-6 space-y-2">
                                    <p id="phoneCoverSubtitle" class="text-xs uppercase tracking-widest text-white/80 font-medium">The Wedding of</p>
                                    <h4 id="phoneCoverTitle" class="font-serif text-3xl font-bold text-white leading-tight">
                                        Rizky &amp; Amanda
                                    </h4>
                                    <p id="phoneCoverDate" class="text-xs text-white/85">Sabtu, 20 Juni 2026</p>
                                </div>

                                <div class="pb-6 w-full space-y-3">
                                    <div class="p-3 rounded-2xl bg-black/40 backdrop-blur-md border border-white/15 text-xs text-white/90">
                                        <p class="text-[10px] text-white/70">Kepada Yth:</p>
                                        <p class="font-bold text-sm text-white">Bapak/Ibu/Saudara/i</p>
                                        <p class="text-[10px] text-white/70 italic">*Mohon maaf bila ada kesalahan penulisan gelar</p>
                                    </div>
                                    <button type="button" onclick="openPhoneInvitation()" class="w-full py-2.5 px-4 rounded-full bg-brand hover:bg-accent text-white text-xs font-bold shadow-lg transition flex items-center justify-center gap-1.5 transform active:scale-95">
                                        <span>✉️</span> Buka Undangan
                                    </button>
                                </div>
                            </div>

                            {{-- INVITATION CONTENT (Scrollable after clicking Buka Undangan) --}}
                            <div id="previewContent" class="hidden p-5 space-y-8 bg-gradient-to-b from-[#fffcfc] to-[#fdf3f4] text-left">
                                
                                {{-- Quote / Ayat Section --}}
                                <div class="text-center pt-3 pb-2 border-b border-ink/10">
                                    <span id="phoneQuoteIcon" class="w-8 h-8 rounded-full bg-brand/10 text-brand inline-grid place-items-center text-sm mb-2">♥</span>
                                    <h5 id="phoneQuoteTitle" class="font-serif text-base font-bold text-ink">QS. Ar-Rum: 21</h5>
                                    <p id="phoneQuoteBody" class="text-[11.5px] text-ink2 italic mt-1 leading-relaxed">
                                        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."
                                    </p>
                                </div>

                                {{-- Main Profile / Host Section --}}
                                <div class="text-center space-y-3">
                                    <div class="w-20 h-20 rounded-full mx-auto overflow-hidden border-2 border-brand shadow">
                                        <img id="phoneProfileImg" src="https://images.unsplash.com/photo-1519741497674-611481863552?w=300" class="w-full h-full object-cover" alt="Foto">
                                    </div>
                                    <div>
                                        <span id="phoneProfileBadge" class="inline-block px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand/10 text-brand mb-1">
                                            Mempelai Bahagia
                                        </span>
                                        <h5 id="phoneProfileName" class="font-serif text-xl font-bold text-ink">Rizky Amanda &amp; Nabila Putri</h5>
                                        <p id="phoneProfileDesc" class="text-[11px] text-ink3 mt-0.5">Putra Bpk. Hendra &amp; Putri Bpk. Sastro</p>
                                    </div>
                                </div>

                                {{-- Interactive Countdown Box --}}
                                <div class="p-3.5 rounded-2xl bg-white shadow-sm border border-ink/10 text-center">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-accent mb-2">Menuju Hari Acara</p>
                                    <div class="grid grid-cols-4 gap-1 text-center">
                                        <div class="bg-blush rounded-xl p-1.5"><span class="font-serif text-lg font-bold text-ink block">48</span><span class="text-[9px] text-ink3 block">Hari</span></div>
                                        <div class="bg-blush rounded-xl p-1.5"><span class="font-serif text-lg font-bold text-ink block">12</span><span class="text-[9px] text-ink3 block">Jam</span></div>
                                        <div class="bg-blush rounded-xl p-1.5"><span class="font-serif text-lg font-bold text-ink block">30</span><span class="text-[9px] text-ink3 block">Menit</span></div>
                                        <div class="bg-blush rounded-xl p-1.5"><span class="font-serif text-lg font-bold text-ink block">45</span><span class="text-[9px] text-ink3 block">Detik</span></div>
                                    </div>
                                </div>

                                {{-- Event Schedules Card --}}
                                <div class="space-y-3">
                                    <h5 class="text-xs font-bold uppercase tracking-wider text-ink2 text-center">Rangkaian Acara</h5>
                                    <div id="phoneEventsList" class="space-y-2.5">
                                        {{-- Dynamic Events injected via JS --}}
                                    </div>
                                </div>

                                {{-- Google Maps Button Simulator --}}
                                <div class="p-3.5 rounded-2xl bg-white shadow-sm border border-ink/10 text-center space-y-2">
                                    <p class="text-xs font-bold text-ink" id="phoneLocationName">Grand Ballroom Hotel Mulia</p>
                                    <p class="text-[10px] text-ink3">Jl. Asia Afrika No. 1, Senayan, Jakarta Pusat</p>
                                    <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#4285F4] text-white text-[11px] font-bold shadow hover:bg-blue-600 transition">
                                        <span>📍</span> Buka di Google Maps
                                    </a>
                                </div>

                                {{-- Digital Envelope (Transfer / QRIS) --}}
                                <div class="p-3.5 rounded-2xl bg-white shadow-sm border border-brand/20 text-center space-y-2.5">
                                    <span class="text-xs font-bold text-brand block" id="phoneGiftTitle">💳 Tanda Kasih / Amplop Digital</span>
                                    <p class="text-[10.5px] text-ink3" id="phoneGiftDesc">Doa restu Anda adalah karunia terindah, jika ingin memberikan tanda kasih dapat melalui:</p>
                                    <div class="p-2.5 rounded-xl bg-sunk text-left flex items-center justify-between text-xs">
                                        <div>
                                            <b class="block text-ink text-[11px]">BCA • 1234 5678 90</b>
                                            <span class="text-[10px] text-ink3">a.n D'Karsa Official</span>
                                        </div>
                                        <button type="button" onclick="alert('Nomor rekening demo berhasil disalin!')" class="px-2.5 py-1 rounded-full bg-white text-ink text-[10px] font-bold border border-ink/15 shadow-sm">
                                            Salin
                                        </button>
                                    </div>
                                </div>

                                {{-- Guest Book / Wishes Simulator --}}
                                <div class="p-3.5 rounded-2xl bg-white shadow-sm border border-ink/10 space-y-2.5">
                                    <span class="text-xs font-bold text-ink block text-center" id="phoneWishTitle">Ucapan &amp; Doa Restu</span>
                                    <div class="space-y-2 text-[11px]">
                                        <div class="p-2 rounded-xl bg-blush">
                                            <b class="text-ink">Hendra &amp; Keluarga</b>
                                            <p class="text-ink2 mt-0.5">Selamat dan berkah selalu untuk acaranya! Semoga berjalan lancar dan penuh kebahagiaan.</p>
                                        </div>
                                        <div class="p-2 rounded-xl bg-blush">
                                            <b class="text-ink">Rina Fitriani</b>
                                            <p class="text-ink2 mt-0.5">Undangannya cantik banget! InsyaAllah kami hadir tepat waktu.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center pt-2 pb-4 text-[10px] text-ink3">
                                    Dibuat dengan cinta oleh <b>D'Karsa</b>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Simulator Tip --}}
                    <p class="text-xs text-ink3 mt-3 flex items-center gap-1.5">
                        <span>💡</span>
                        <span>Klik <b>Buka Undangan</b> di dalam layar HP untuk melihat isi lengkap.</span>
                    </p>
                </div>

                {{-- RIGHT: Theme Details, Category Switcher & Direct Order CTA --}}
                <div class="lg:col-span-6 space-y-6">
                    
                    {{-- Quick Category Switcher Tabs --}}
                    <div>
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-ink3 mb-2">Pilih Preview Kategori Acara:</label>
                        <div class="flex flex-wrap gap-1.5" id="previewCategoryTabs">
                            <button type="button" onclick="switchPreviewByCategory('pernikahan')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">💍 Pernikahan</button>
                            <button type="button" onclick="switchPreviewByCategory('tahlilan')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🕯️ Doa Bersama / Tahlilan</button>
                            <button type="button" onclick="switchPreviewByCategory('halalbihalal')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🕌 Halal Bihalal</button>
                            <button type="button" onclick="switchPreviewByCategory('khitanan')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">✂️ Khitanan</button>
                            <button type="button" onclick="switchPreviewByCategory('aqiqah')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">👶 Aqiqah</button>
                            <button type="button" onclick="switchPreviewByCategory('ultah')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🎂 Ulang Tahun</button>
                            <button type="button" onclick="switchPreviewByCategory('wisuda')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🎓 Wisuda</button>
                            <button type="button" onclick="switchPreviewByCategory('formal')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🏛️ Acara Formal</button>
                            <button type="button" onclick="switchPreviewByCategory('syukuran')" class="px-3 py-1.5 rounded-full text-xs font-bold border transition bg-white text-ink hover:border-brand">🎉 Syukuran</button>
                        </div>
                    </div>

                    {{-- Theme Description Box --}}
                    <div class="p-5 rounded-2xl bg-white border border-ink/10 shadow-sm space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold uppercase tracking-wider text-brand" id="modalCategorySub">Kategori: Pernikahan</span>
                            <span class="text-xs font-bold text-amber-500">★★★★★ Desain Terpopuler</span>
                        </div>
                        <h4 class="font-serif text-2xl font-bold text-ink" id="modalThemeName">3D Javanese Royal</h4>
                        <p class="text-sm text-ink2 leading-relaxed" id="modalThemeDesc">
                            Nuansa keraton Jawa klasik dengan animasi gunungan 3D, gending halus & doa restu.
                        </p>
                    </div>

                    {{-- Features Checklist Included in this Theme --}}
                    <div class="p-5 rounded-2xl bg-white border border-ink/10 shadow-sm space-y-3">
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
                        <button type="button" onclick="orderCurrentPreviewTheme()" class="w-full tbl tbl--utama !h-12 !text-base justify-between !px-6 shadow-md">
                            <span>✨ Pesan Desain Ini Sekarang</span>
                            <span class="tbl__ikon">
                                <svg aria-hidden="true" class="w-4 h-4"><use href="#i-arrow-up-right"></use></svg>
                            </span>
                        </button>
                        
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="consultPreviewViaWhatsApp()" class="flex-1 tbl tbl--kedua !h-11 !text-xs justify-center gap-2">
                                <svg aria-hidden="true" class="w-4 h-4 text-[#25d366]"><use href="#i-whatsapp-logo"></use></svg>
                                <span>Tanya Admin via WhatsApp</span>
                            </button>
                            <div class="flex items-center gap-1.5">
                                <button type="button" onclick="navPreviewTheme(-1)" class="w-11 h-11 rounded-full bg-white text-ink border border-ink/15 hover:border-brand hover:text-brand grid place-items-center transition text-sm font-bold shadow-sm" title="Tema Sebelumnya">
                                    ‹
                                </button>
                                <button type="button" onclick="navPreviewTheme(1)" class="w-11 h-11 rounded-full bg-white text-ink border border-ink/15 hover:border-brand hover:text-brand grid place-items-center transition text-sm font-bold shadow-sm" title="Tema Berikutnya">
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
