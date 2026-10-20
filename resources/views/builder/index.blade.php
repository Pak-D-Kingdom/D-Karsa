<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Undangan Digital Sendiri | D'Karsa Builder</title>
    <meta name="description" content="Buat undangan pernikahan, khitanan, dan acara digital secara mandiri, cepat, dan mudah dengan D'Karsa.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Beau+Rivage&family=Cinzel:wght@600;700;800&family=Great+Vibes&family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        cinzel: ['"Cinzel"', 'serif'],
                        cursive: ['"Beau Rivage"', '"Great Vibes"', 'cursive'],
                        script: ['"Alex Brush"', 'cursive'],
                        lora: ['"Lora"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: '#f63854',
                        accent: '#cf2445',
                        gold: '#d4af37',
                        ink: '#1c1417',
                        ink2: '#4a3f43',
                        ink3: '#7a6f73',
                        blush: '#fdf4f5',
                        sunk: '#faf0f2',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: #1c1417; background-color: #faf5f6; }
        .font-serif { font-family: 'Playfair Display', Georgia, serif; }
        .font-cinzel { font-family: 'Cinzel', Georgia, serif; }
        .font-cursive { font-family: 'Beau Rivage', 'Great Vibes', cursive; }
        .font-script { font-family: 'Alex Brush', cursive; }
        .font-lora { font-family: 'Lora', Georgia, serif; }

        .step-panel { display: none; }
        .step-panel.active { display: block; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .step-pill.active { background-color: #f63854; color: #ffffff; border-color: #f63854; box-shadow: 0 4px 12px rgba(246, 56, 84, 0.25); }
        .step-pill.completed { background-color: #fdf4f5; color: #cf2445; border-color: #f63854; }

        /* ========================================================
           PREMIUM & MULTI-THEME AMBIENT ANIMATIONS
        ======================================================== */
        @keyframes seal-pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 4px 16px rgba(183, 88, 115, 0.4), inset 0 2px 4px rgba(255,255,255,0.4); }
            50% { transform: scale(1.07); box-shadow: 0 8px 24px rgba(183, 88, 115, 0.7), inset 0 2px 4px rgba(255,255,255,0.6); }
        }
        .animate-seal-pulse { animation: seal-pulse 2.2s ease-in-out infinite; }

        @keyframes shine-sweep {
            0% { transform: translateX(-150%); }
            45%, 100% { transform: translateX(250%); }
        }
        .animate-shine { animation: shine-sweep 3s ease-in-out infinite; }

        @keyframes ambient-fall {
            0% { transform: translate3d(0, -20px, 0) rotate(0deg); opacity: 0; }
            12% { opacity: 0.85; }
            85% { opacity: 0.85; }
            100% { transform: translate3d(var(--sway, 25px), 620px, 0) rotate(360deg); opacity: 0; }
        }

        @keyframes gold-sparkle {
            0%, 100% { opacity: 0.2; transform: scale(0.85); }
            50% { opacity: 0.95; transform: scale(1.15); }
        }

        @keyframes pulse-glow-purple {
            0%, 100% { border-color: #a855f7; box-shadow: 0 0 16px rgba(168, 85, 247, 0.35); }
            50% { border-color: #f43f5e; box-shadow: 0 0 26px rgba(244, 63, 94, 0.55); }
        }
        .animate-pulse-glow { animation: pulse-glow-purple 2.5s ease-in-out infinite; }

        /* ========================================================
           PREVIEW THEME STYLING PRESETS (Comprehensive for Tiers)
        ======================================================== */
        /* 1. Floral Wreath (Tier Basic - Minimalist) */
        .theme-floral-wreath { background-color: #fcfbfa; color: #2d4a3e; font-family: 'Playfair Display', Georgia, serif; }
        .theme-floral-wreath .theme-card { background-color: rgba(255, 255, 255, 0.9); border-color: #d1ded5; color: #2d4a3e; }
        .theme-floral-wreath .theme-accent { color: #5a7d65; }
        .theme-floral-wreath .theme-border { border-color: #d1ded5; }

        /* 2. Rose Romance / Wildflower Pink (Tier Premium) */
        .theme-rose-romance { background-color: #fdf6f3; color: #4a2c35; font-family: 'Playfair Display', Georgia, serif; }
        .theme-rose-romance .theme-card { background-color: #ffffff; border-color: #f6d2dc; color: #4a2c35; }
        .theme-rose-romance .theme-accent { color: #b75873; }
        .theme-rose-romance .theme-border { border-color: #f6d2dc; }

        /* 3. Javanese Royal Keraton (Tier Eksklusif) */
        .theme-javanese-royal { background-color: #17110c; color: #f7eedb; font-family: 'Cinzel', Georgia, serif; }
        .theme-javanese-royal .theme-card { background-color: #241b14; border-color: #8c6d2d; color: #f7eedb; }
        .theme-javanese-royal .theme-accent { color: #d4af37; }
        .theme-javanese-royal .theme-border { border-color: #8c6d2d; }

        /* 4. Batak Heritage (Tier Eksklusif) */
        .theme-batak-heritage { background-color: #1e0e13; color: #fef3c7; font-family: 'Playfair Display', serif; }
        .theme-batak-heritage .theme-card { background-color: #2e151c; border-color: #92400e; color: #fef3c7; }
        .theme-batak-heritage .theme-accent { color: #f59e0b; }
        .theme-batak-heritage .theme-border { border-color: #92400e; }

        /* 5. Green Mosque Harmony (Tier Premium) */
        .theme-green-mosque { background-color: #0d281c; color: #f0fdf4; font-family: 'Playfair Display', serif; }
        .theme-green-mosque .theme-card { background-color: #153b2a; border-color: #047857; color: #f0fdf4; }
        .theme-green-mosque .theme-accent { color: #e5c07b; }
        .theme-green-mosque .theme-border { border-color: #047857; }

        /* 6. Snow White Modern Editorial (Tier Eksklusif) */
        .theme-snow-white { background-color: #f8fafc; color: #0f172a; font-family: 'Cinzel', sans-serif; }
        .theme-snow-white .theme-card { background-color: #ffffff; border-color: #e2e8f0; color: #0f172a; }
        .theme-snow-white .theme-accent { color: #475569; }
        .theme-snow-white .theme-border { border-color: #cbd5e1; }

        /* 7. Golden Birthday / Wisuda Emas (Tier Eksklusif) */
        .theme-golden-birthday { background-color: #0a0a0a; color: #ffffff; font-family: 'Cinzel', sans-serif; }
        .theme-golden-birthday .theme-card { background-color: #171717; border-color: #b45309; color: #ffffff; }
        .theme-golden-birthday .theme-accent { color: #fbbf24; }
        .theme-golden-birthday .theme-border { border-color: #b45309; }

        /* 8. Little Prince (Tier Basic) */
        .theme-little-prince { background-color: #fffdf7; color: #451a03; font-family: 'Plus Jakarta Sans', sans-serif; }
        .theme-little-prince .theme-card { background-color: #ffffff; border-color: #fde68a; color: #451a03; }
        .theme-little-prince .theme-accent { color: #d97706; }
        .theme-little-prince .theme-border { border-color: #fde68a; }

        /* 9. Khitan Berkah (Tier Premium) */
        .theme-khitan-berkah { background-color: #f0fdfa; color: #134e4a; font-family: 'Playfair Display', serif; }
        .theme-khitan-berkah .theme-card { background-color: #ffffff; border-color: #99f6e4; color: #134e4a; }
        .theme-khitan-berkah .theme-accent { color: #0d9488; }
        .theme-khitan-berkah .theme-border { border-color: #99f6e4; }

        /* 10. Baby Pastel Aqiqah (Tier Premium) */
        .theme-baby-aqiqah { background-color: #fffaf5; color: #4c0519; font-family: 'Playfair Display', serif; }
        .theme-baby-aqiqah .theme-card { background-color: #ffffff; border-color: #fecdd3; color: #4c0519; }
        .theme-baby-aqiqah .theme-accent { color: #f43f5e; }
        .theme-baby-aqiqah .theme-border { border-color: #fecdd3; }

        /* 11. Ketupat Raya Silaturahmi (Tier Basic) */
        .theme-ketupat-raya { background-color: #f4f9f6; color: #14532d; font-family: 'Playfair Display', serif; }
        .theme-ketupat-raya .theme-card { background-color: #ffffff; border-color: #bbf7d0; color: #14532d; }
        .theme-ketupat-raya .theme-accent { color: #16a34a; }
        .theme-ketupat-raya .theme-border { border-color: #bbf7d0; }

        /* 12. Syukuran Rumah (Tier Basic) */
        .theme-syukuran-rumah { background-color: #faf6f0; color: #451a03; font-family: 'Playfair Display', serif; }
        .theme-syukuran-rumah .theme-card { background-color: #ffffff; border-color: #fed7aa; color: #451a03; }
        .theme-syukuran-rumah .theme-accent { color: #b45309; }
        .theme-syukuran-rumah .theme-border { border-color: #fed7aa; }

        /* 13. Tahlilan Khusyuk (Tier Basic) */
        .theme-tahlilan-khusyuk { background-color: #0f172a; color: #f8fafc; font-family: 'Playfair Display', serif; }
        .theme-tahlilan-khusyuk .theme-card { background-color: #1e293b; border-color: #334155; color: #f8fafc; }
        .theme-tahlilan-khusyuk .theme-accent { color: #94a3b8; }
        .theme-tahlilan-khusyuk .theme-border { border-color: #334155; }

        /* 14. Reuni Akbar (Tier Premium) */
        .theme-reuni-akbar { background-color: #f8fafc; color: #0f172a; font-family: 'Plus Jakarta Sans', sans-serif; }
        .theme-reuni-akbar .theme-card { background-color: #ffffff; border-color: #bfdbfe; color: #0f172a; }
        .theme-reuni-akbar .theme-accent { color: #2563eb; }
        .theme-reuni-akbar .theme-border { border-color: #bfdbfe; }

        /* 15. Custom VIP (Tier Kustom) */
        .theme-custom-vip { background-color: #180f28; color: #f3e8ff; font-family: 'Playfair Display', serif; }
        .theme-custom-vip .theme-card { background-color: #26163f; border-color: #7e22ce; color: #f3e8ff; }
        .theme-custom-vip .theme-accent { color: #c084fc; }
        .theme-custom-vip .theme-border { border-color: #7e22ce; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased">

    {{-- TOP NAVBAR --}}
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-ink/10 py-3.5 px-4 sm:px-8 shadow-sm">
        <div class="max-w-5xl mx-auto flex items-center justify-between gap-3">
            <a href="{{ route('invitation.index') }}" class="flex items-center gap-2.5 group shrink-0">
                <span class="w-9 h-9 rounded-full bg-brand text-white font-serif font-bold text-base grid place-items-center shadow-md group-hover:scale-105 transition">
                    DK
                </span>
                <div>
                    <b class="text-sm sm:text-base font-serif font-bold text-ink group-hover:text-brand transition block leading-tight">D'Karsa</b>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-ink3 block">Invitation Builder</span>
                </div>
            </a>

            {{-- Top Bar Quick Actions: Template Selector, Preview, Reset, and Home --}}
            <div class="flex items-center gap-2">
                <button type="button" onclick="openTemplateModal()" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink hover:text-brand bg-sunk/80 hover:bg-sunk transition flex items-center gap-1.5 border border-ink/15 shadow-sm">
                    <span>🎨</span> <span class="hidden sm:inline">Pilih</span> <span>Template</span>
                </button>
                <button type="button" onclick="resetFormToTemplateDefaults()" class="px-3 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-rose-600 bg-sunk/80 hover:bg-rose-50 transition flex items-center gap-1 border border-ink/15 shadow-sm" title="Kembalikan semua isian ke data bawaan template">
                    <span>🔄</span> <span class="hidden sm:inline">Reset</span> <span>Default</span>
                </button>
                <button type="button" onclick="openPreviewModal()" class="px-4 py-1.5 rounded-full text-xs font-bold text-white bg-brand hover:bg-accent transition flex items-center gap-1.5 shadow-md shadow-brand/20">
                    <span>👁️</span> <span>Preview</span>
                </button>
                <a href="{{ route('invitation.index') }}" class="px-3 py-1.5 rounded-full text-xs font-bold text-ink3 hover:text-ink hover:bg-sunk transition flex items-center gap-1 border border-ink/10">
                    <span>←</span> <span class="hidden md:inline">Beranda</span>
                </a>
            </div>
        </div>
    </header>

    {{-- MAIN BUILDER CONTAINER --}}
    <main class="max-w-4xl w-full mx-auto px-4 py-8 sm:py-12 flex-1">
        
        {{-- Intro Banner --}}
        <div class="text-center max-w-2xl mx-auto mb-8 space-y-2">
            <span class="inline-block px-3.5 py-1 rounded-full bg-brand/10 text-brand text-xs font-bold uppercase tracking-widest">
                ✨ Self-Service Invitation Maker
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-ink leading-tight">
                Buat Undangan Digital Anda Sendiri
            </h1>
            <p class="text-xs sm:text-sm text-ink2">
                Isi formulir bertahap di bawah ini untuk menghasilkan undangan digital yang elegan, lengkap dengan musik, foto, jadwal acara, maps, dan amplop digital.
            </p>
        </div>

        {{-- Progress Bar & Stepper Tabs --}}
        <div class="bg-white rounded-3xl p-3 sm:p-5 shadow-sm border border-ink/10 mb-8">
            <div class="flex items-center justify-between mb-3 text-xs font-bold text-ink2 px-1">
                <span id="stepTitleDisplay">Langkah 1 dari 6: Kategori &amp; Info Utama</span>
                <span id="stepPercentDisplay" class="text-brand font-bold">16% Selesai</span>
            </div>
            
            <div class="w-full h-2 rounded-full bg-sunk overflow-hidden mb-4">
                <div id="progressBar" class="h-full bg-brand rounded-full transition-all duration-300" style="width: 16%;"></div>
            </div>

            <div class="flex items-center justify-between gap-1 overflow-x-auto pb-1 text-center" style="scrollbar-width: thin;">
                <button type="button" onclick="goToStep(1)" id="stepBtn1" class="step-pill active px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0">
                    <span>1.</span> <span>Kategori</span>
                </button>
                <button type="button" onclick="goToStep(2)" id="stepBtn2" class="step-pill px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0 text-ink2">
                    <span>2.</span> <span id="stepPill2Text">Mempelai</span>
                </button>
                <button type="button" onclick="goToStep(3)" id="stepBtn3" class="step-pill px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0 text-ink2">
                    <span>3.</span> <span id="stepPill3Text">Orang Tua</span>
                </button>
                <button type="button" onclick="goToStep(4)" id="stepBtn4" class="step-pill px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0 text-ink2">
                    <span>4.</span> Acara
                </button>
                <button type="button" onclick="goToStep(5)" id="stepBtn5" class="step-pill px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0 text-ink2">
                    <span>5.</span> Amplop
                </button>
                <button type="button" onclick="goToStep(6)" id="stepBtn6" class="step-pill px-3 py-1.5 rounded-full text-xs font-bold border border-ink/15 transition flex items-center gap-1 shrink-0 text-ink2">
                    <span>6.</span> Galeri &amp; Kontak
                </button>
            </div>
        </div>

        {{-- Validation Errors Display --}}
        @if (isset($errors) && $errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-300 text-rose-800 text-xs space-y-1">
                <b class="font-bold block">Mohon periksa kembali inputan Anda:</b>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $rawCat = request('category', 'Pernikahan');
            $rawSub = request('sub_category');

            // ========================================================
            // 6 BAB KATEGORI UNDANGAN DIGITAL BESERTA SUB-BAB LENGKAP
            // ========================================================
            $categoryChapters = [
                'Pernikahan' => [
                    'id' => 'pernikahan',
                    'number' => 1,
                    'title' => 'Undangan Pernikahan',
                    'badge' => 'Prioritas Utama',
                    'icon' => '💍',
                    'desc' => 'Pernikahan adat, minimalis modern, elegan floral & internasional',
                    'sub_categories' => [
                        'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                        'Minimalis modern',
                        'Elegan, floral, dan islami',
                        'Akad nikah dan resepsi',
                        'Undangan pernikahan internasional',
                    ],
                    'default_sub' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                ],
                'Ulang Tahun' => [
                    'id' => 'ultah',
                    'number' => 2,
                    'title' => 'Undangan Ulang Tahun',
                    'badge' => 'Pesta Ceria',
                    'icon' => '🎂',
                    'desc' => 'Ulang tahun anak, remaja, sweet seventeen, dewasa & karakter',
                    'sub_categories' => [
                        'Ulang tahun anak',
                        'Ulang tahun remaja',
                        'Sweet seventeen',
                        'Ulang tahun dewasa',
                        'Ulang tahun dengan tema kartun atau karakter original',
                    ],
                    'default_sub' => 'Sweet seventeen',
                ],
                'Aqiqah' => [
                    'id' => 'aqiqah',
                    'number' => 3,
                    'title' => 'Undangan Aqiqah dan Kelahiran',
                    'badge' => 'Buah Hati',
                    'icon' => '👶',
                    'desc' => 'Aqiqah anak, tasyakuran bayi, tasmiyah & syukuran khitanan',
                    'sub_categories' => [
                        'Aqiqah anak',
                        'Tasyakuran kelahiran bayi',
                        'Pemberian nama bayi',
                        'Tasyakuran khitanan',
                    ],
                    'default_sub' => 'Aqiqah anak',
                ],
                'Keagamaan' => [
                    'id' => 'keagamaan',
                    'number' => 4,
                    'title' => 'Undangan Keagamaan',
                    'badge' => 'Islami & Berkah',
                    'icon' => '🕌',
                    'desc' => 'Pengajian, tasyakuran, maulid, bukber, haji, tahlilan & halal bihalal',
                    'sub_categories' => [
                        'Pengajian',
                        'Tasyakuran',
                        'Maulid Nabi',
                        'Buka puasa bersama',
                        'Walimatus safar dan syukuran haji',
                        'Halal bihalal',
                        'Doa bersama & tahlilan',
                    ],
                    'default_sub' => 'Halal bihalal',
                ],
                'Wisuda' => [
                    'id' => 'wisuda',
                    'number' => 5,
                    'title' => 'Undangan Wisuda dan Kelulusan',
                    'badge' => 'Momen Kelulusan',
                    'icon' => '🎓',
                    'desc' => 'Wisuda kuliah sarjana/pasca, kelulusan sekolah & syukuran keluarga',
                    'sub_categories' => [
                        'Wisuda kuliah',
                        'Kelulusan sekolah',
                        'Perayaan kelulusan bersama keluarga',
                    ],
                    'default_sub' => 'Wisuda kuliah',
                ],
                'Acara Formal' => [
                    'id' => 'acara-formal',
                    'number' => 6,
                    'title' => 'Undangan Acara Formal',
                    'badge' => 'Bisnis & Instansi',
                    'icon' => '🏛️',
                    'desc' => 'Seminar, gathering perusahaan, grand opening bisnis & komunitas',
                    'sub_categories' => [
                        'Seminar dan workshop',
                        'Rapat dan gathering perusahaan',
                        'Grand opening bisnis',
                        'Peluncuran produk',
                        'Acara komunitas',
                    ],
                    'default_sub' => 'Grand opening bisnis',
                ],
            ];

            // Mapping keyword lama/URL ke 6 Bab Utama & Sub-Bab
            $catMap = [
                'pernikahan'   => ['cat' => 'Pernikahan', 'sub' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya'],
                'wedding'      => ['cat' => 'Pernikahan', 'sub' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya'],
                'ultah'        => ['cat' => 'Ulang Tahun', 'sub' => 'Sweet seventeen'],
                'ulang tahun'  => ['cat' => 'Ulang Tahun', 'sub' => 'Sweet seventeen'],
                'birthday'     => ['cat' => 'Ulang Tahun', 'sub' => 'Sweet seventeen'],
                'aqiqah'       => ['cat' => 'Aqiqah', 'sub' => 'Aqiqah anak'],
                'akikah'       => ['cat' => 'Aqiqah', 'sub' => 'Aqiqah anak'],
                'khitan'       => ['cat' => 'Aqiqah', 'sub' => 'Tasyakuran khitanan'],
                'khitanan'     => ['cat' => 'Aqiqah', 'sub' => 'Tasyakuran khitanan'],
                'keagamaan'    => ['cat' => 'Keagamaan', 'sub' => 'Pengajian'],
                'pengajian'    => ['cat' => 'Keagamaan', 'sub' => 'Pengajian'],
                'halalbihalal' => ['cat' => 'Keagamaan', 'sub' => 'Halal bihalal'],
                'halal bihalal'=> ['cat' => 'Keagamaan', 'sub' => 'Halal bihalal'],
                'tahlilan'     => ['cat' => 'Keagamaan', 'sub' => 'Doa bersama & tahlilan'],
                'tahlil'       => ['cat' => 'Keagamaan', 'sub' => 'Doa bersama & tahlilan'],
                'haul'         => ['cat' => 'Keagamaan', 'sub' => 'Doa bersama & tahlilan'],
                'syukuran'     => ['cat' => 'Keagamaan', 'sub' => 'Tasyakuran'],
                'wisuda'       => ['cat' => 'Wisuda', 'sub' => 'Wisuda kuliah'],
                'kelulusan'    => ['cat' => 'Wisuda', 'sub' => 'Kelulusan sekolah'],
                'formal'       => ['cat' => 'Acara Formal', 'sub' => 'Seminar dan workshop'],
                'acara formal' => ['cat' => 'Acara Formal', 'sub' => 'Seminar dan workshop'],
                'seminar'      => ['cat' => 'Acara Formal', 'sub' => 'Seminar dan workshop'],
                'gathering'    => ['cat' => 'Acara Formal', 'sub' => 'Rapat dan gathering perusahaan'],
            ];

            $matchedCat = $catMap[strtolower(trim($rawCat))] ?? null;
            if ($matchedCat) {
                $selectedCat = $matchedCat['cat'];
                $selectedSubCat = $rawSub ?: $matchedCat['sub'];
            } else {
                $selectedCat = isset($categoryChapters[$rawCat]) ? $rawCat : 'Pernikahan';
                $selectedSubCat = $rawSub ?: ($categoryChapters[$selectedCat]['default_sub'] ?? 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya');
            }
            $selectedTheme = request('theme');
            $selectedPackage = request('package');

            $categoryGalleryConfigs = [
                'Pernikahan' => [
                    'title' => 'Galeri Prewedding & Musik',
                    'desc' => 'Lengkapi undangan dengan foto-foto prewedding kenangan dan lagu romantis favorit.',
                    'label' => 'Upload Foto Galeri (Prewedding)',
                    'sub' => 'Bisa pilih beberapa foto prewedding atau momen bahagia sekaligus',
                    'step5Desc' => 'Berikan kemudahan bagi para tamu undangan yang ingin mengirimkan kado pernikahan secara cashless.',
                ],
                'Ulang Tahun' => [
                    'title' => 'Galeri Foto Ultah & Musik Pesta',
                    'desc' => 'Lengkapi undangan dengan koleksi foto terbaik yang berulang tahun dan lagu pesta yang ceria.',
                    'label' => 'Upload Foto Galeri (Foto Seru & Momen Ultah)',
                    'sub' => 'Bisa pilih beberapa foto terbaik dari masa ke masa',
                    'step5Desc' => 'Berikan kemudahan bagi sahabat dan keluarga yang ingin mengirimkan kado ulang tahun secara cashless.',
                ],
                'Aqiqah' => [
                    'title' => 'Galeri Foto Buah Hati & Musik',
                    'desc' => 'Lengkapi undangan dengan potret manis sang buah hati dan alunan musik hangat penuh kasih sayang.',
                    'label' => 'Upload Foto Galeri (Buah Hati / Momen Khitan)',
                    'sub' => 'Bisa pilih beberapa foto manis tumbuh kembang buah hati atau momen syukuran khitan',
                    'step5Desc' => 'Berikan kemudahan bagi kerabat yang ingin mengirimkan hadiah / kado untuk sang buah hati atau tali asih syukuran.',
                ],
                'Keagamaan' => [
                    'title' => 'Dokumentasi Syiar & Alunan Doa',
                    'desc' => 'Lengkapi undangan dengan dokumentasi silaturahmi, foto kenangan, dan alunan doa syahdu.',
                    'label' => 'Upload Foto Dokumentasi / Kenangan Acara',
                    'sub' => 'Bisa pilih beberapa foto kebersamaan keluarga, jamaah, atau kenangan almarhum',
                    'step5Desc' => 'Fasilitasi tanda kasih, sedekah jariyah, partisipasi konsumsi, atau tali asih silaturahmi.',
                ],
                'Wisuda' => [
                    'title' => 'Galeri Foto Wisuda & Musik',
                    'desc' => 'Lengkapi undangan dengan dokumentasi wisuda, foto toga, dan alunan musik kenangan masa studi.',
                    'label' => 'Upload Foto Wisuda & Momen Kelulusan',
                    'sub' => 'Bisa pilih beberapa foto wisuda, foto toga, atau foto bersama sahabat & keluarga',
                    'step5Desc' => 'Berikan kemudahan bagi keluarga dan teman yang ingin mengirimkan hadiah / kado wisuda secara cashless.',
                ],
                'Acara Formal' => [
                    'title' => 'Dokumentasi Acara & Audio Pengiring',
                    'desc' => 'Lengkapi undangan dengan foto pembicara, dokumentasi kegiatan, atau logo institusi & sponsor.',
                    'label' => 'Upload Foto Dokumentasi Acara / Poster',
                    'sub' => 'Bisa pilih beberapa foto kegiatan, foto venue, atau logo pendukung',
                    'step5Desc' => 'Fasilitasi kemudahan untuk registrasi tiket, tanda partisipasi, atau hadiah mitra bisnis.',
                ],
            ];
            $currentGalConf = $categoryGalleryConfigs[$selectedCat] ?? $categoryGalleryConfigs['Pernikahan'];

            $allTemplates = \App\Services\TemplateManager::getCatalogThemes();

            // Resolve initial template based on query parameters or category
            $currentTemplate = null;
            if ($selectedTheme) {
                $currentTemplate = collect($allTemplates)->firstWhere('name', $selectedTheme);
                if (!$currentTemplate) {
                    $resolvedKey = \App\Services\TemplateManager::resolveKey($selectedTheme, $selectedCat);
                    $currentTemplate = collect($allTemplates)->firstWhere('key', $resolvedKey);
                }
            }
            if (!$currentTemplate) {
                $currentTemplate = collect($allTemplates)->firstWhere('category_label', $selectedCat) ?: $allTemplates[0];
            }
            $selectedTheme = $currentTemplate['name'];
            if (!$selectedPackage) {
                $selectedPackage = $currentTemplate['package_val'];
            }
        @endphp

        @if($selectedTheme || $selectedPackage)
            <div class="mb-6 p-4 rounded-2xl bg-brand/10 border border-brand/20 flex flex-wrap items-center justify-between gap-3 shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✨</span>
                    <div>
                        <b class="text-xs font-bold text-ink block">Pilihan Desain / Paket Terpilih</b>
                        <span class="text-xs text-brand font-semibold">
                            Tema: {{ $selectedTheme }} • {{ $selectedPackage }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="openTemplateModal()" class="px-3 py-1 rounded-full text-xs font-bold bg-white text-ink hover:text-brand border border-ink/15 shadow-sm transition">
                        Ganti Desain
                    </button>
                    <button type="button" onclick="openPreviewModal()" class="px-3 py-1 rounded-full text-xs font-bold bg-brand text-white hover:bg-accent shadow-sm transition">
                        Preview
                    </button>
                </div>
            </div>
        @endif

        {{-- BUILDER FORM --}}
        <form action="{{ route('invitation.store') }}" method="POST" enctype="multipart/form-data" id="invitationBuilderForm" class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-brand/15">
            @csrf
            <input type="hidden" name="selected_theme" id="selectedThemeInput" value="{{ $selectedTheme }}">
            <input type="hidden" name="sub_category" id="hiddenSubCategoryInput" value="{{ $selectedSubCat }}">
            <input type="hidden" name="groom_photo_base64" id="groomPhotoBase64">
            <input type="hidden" name="bride_photo_base64" id="bridePhotoBase64">
            <input type="hidden" name="cover_photo_base64" id="coverPhotoBase64">
            <input type="hidden" name="gallery_photos_base64" id="galleryPhotosBase64">

            {{-- ========================================================
                 LANGKAH 1: KATEGORI (BAB & SUB-BAB) & INFO UTAMA
            ======================================================== --}}
            <div id="stepPanel1" class="step-panel active space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 1</span>
                    <h2 class="font-serif text-2xl font-bold text-ink">Bab &amp; Sub-Bab Kategori Acara</h2>
                    <p class="text-xs text-ink2 mt-1">Pilih bab kategori acara utama dan tentukan sub-pilihan spesifik sesuai konsep perayaan Anda.</p>
                </div>

                {{-- ========================================================
                     PILIHAN BAB & SUB-BAB KATEGORI (BERDASARKAN STRUKTUR BAB)
                ======================================================== --}}
                <div class="space-y-4">
                    <!-- 1. Header Bab -->
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-ink2">
                            1. Pilih Bab Kategori Undangan *
                        </label>
                        <span class="text-[11px] text-brand font-semibold">6 Bab Kategori</span>
                    </div>

                    <!-- 6 Bab Grid Cards -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3" id="chapterCategoryGrid">
                        @foreach($categoryChapters as $catKey => $chapter)
                            <label class="cursor-pointer group">
                                <input type="radio" name="category" value="{{ $catKey }}" class="peer sr-only" 
                                       {{ $selectedCat === $catKey ? 'checked' : '' }} 
                                       onchange="onSelectCategoryChapter('{{ $catKey }}')">
                                <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white group-hover:border-brand/40 peer-checked:border-brand peer-checked:bg-blush peer-checked:shadow-sm transition h-full flex flex-col justify-between relative overflow-hidden">
                                    <div>
                                        <div class="flex items-center justify-between gap-1 mb-1.5">
                                            <span class="text-[9px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $chapter['badge'] === 'Prioritas Utama' ? 'bg-brand text-white' : 'bg-sunk text-ink2' }}">
                                                Bab {{ $chapter['number'] }}
                                            </span>
                                            @if(!empty($chapter['badge']) && $chapter['badge'] === 'Prioritas Utama')
                                                <span class="text-[9px] font-bold text-brand flex items-center gap-0.5">
                                                    ★ Prioritas
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xl shrink-0">{{ $chapter['icon'] }}</span>
                                            <b class="text-xs font-bold text-ink leading-tight block">{{ $chapter['title'] }}</b>
                                        </div>
                                        <p class="text-[10px] text-ink3 line-clamp-2 leading-relaxed">
                                            {{ $chapter['desc'] }}
                                        </p>
                                    </div>
                                    <div class="mt-2.5 pt-2 border-t border-ink/10 flex items-center justify-between text-[10px] text-ink3">
                                        <span class="font-medium">{{ count($chapter['sub_categories']) }} Sub-Pilihan</span>
                                        <span class="text-brand font-bold text-xs opacity-0 peer-checked:opacity-100 transition">✓ Terpilih</span>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <!-- 2. Sub-Bab Selection Box (Dropdown) -->
                    <div id="subCategoryContainer" class="p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-sunk/80 via-blush/60 to-white border-2 border-brand/20 shadow-sm space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-brand/10 text-brand grid place-items-center text-xs font-bold">📋</span>
                                    <label for="subCategorySelect" class="text-xs font-bold text-ink uppercase tracking-wider">
                                        2. Pilih Sub-Bab / Spesifikasi Acara *
                                    </label>
                                </div>
                                <p class="text-[11px] text-ink2 mt-0.5" id="subCategoryHelperText">
                                    Pilih sub-kategori spesifik untuk perayaan <b id="subCatChapterNameDisplay" class="text-brand">{{ $categoryChapters[$selectedCat]['title'] ?? 'Undangan' }}</b>:
                                </p>
                            </div>
                            
                            <span id="activeSubCatBadge" class="self-start sm:self-auto text-[10px] font-bold px-3 py-1 rounded-full bg-white border border-brand/30 text-brand shadow-xs">
                                ✓ {{ $selectedSubCat }}
                            </span>
                        </div>

                        <!-- Dropdown Selector -->
                        <div class="relative">
                            <select name="sub_category" id="subCategorySelect" onchange="onSubCategoryChange(this.value)"
                                    class="w-full rounded-xl border border-ink/20 px-3.5 py-3 text-xs sm:text-sm font-semibold bg-white text-ink focus:outline-none focus:ring-2 focus:ring-brand shadow-sm cursor-pointer appearance-none pr-10">
                                @if(isset($categoryChapters[$selectedCat]))
                                    @foreach($categoryChapters[$selectedCat]['sub_categories'] as $subItem)
                                        <option value="{{ $subItem }}" {{ $selectedSubCat === $subItem ? 'selected' : '' }}>
                                            {{ $subItem }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-ink2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pilihan Paket & Tingkat Desain --}}
                <div class="space-y-2 pt-2 border-t border-ink/10">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Pilih Paket &amp; Tingkat Desain *</label>
                        <span class="text-[11px] text-brand font-semibold">4 Pilihan Tingkat</span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="selected_package" value="Paket Basic - Rp50.000" class="peer sr-only"
                                   {{ str_contains(strtolower($selectedPackage ?? ''), 'basic') || (!$selectedPackage && !request('theme')) ? 'checked' : '' }}
                                   onchange="onPackageSelect(this.value)">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-emerald-500 peer-checked:bg-emerald-50/50 transition h-full flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-emerald-800 block">🟢 Basic</span>
                                    <b class="text-sm font-bold text-ink block mt-0.5">Rp50.000</b>
                                    <span class="text-[10px] text-ink3 block mt-1">Desain Standar / Biasa</span>
                                </div>
                                <span class="text-[9px] font-bold text-emerald-700 bg-emerald-100 rounded-full py-0.5 px-2 mt-2">Paling Hemat</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="selected_package" value="Paket Premium - Rp110.000" class="peer sr-only"
                                   {{ str_contains(strtolower($selectedPackage ?? ''), 'premium') ? 'checked' : '' }}
                                   onchange="onPackageSelect(this.value)">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-blue-500 peer-checked:bg-blue-50/50 transition h-full flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-blue-800 block">🔵 Premium</span>
                                    <b class="text-sm font-bold text-ink block mt-0.5">Rp110.000</b>
                                    <span class="text-[10px] text-ink3 block mt-1">Desain Modern &amp; Elegan</span>
                                </div>
                                <span class="text-[9px] font-bold text-blue-700 bg-blue-100 rounded-full py-0.5 px-2 mt-2">+ Amplop Digital</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="selected_package" value="Paket Eksklusif - Rp180.000" class="peer sr-only"
                                   {{ str_contains(strtolower($selectedPackage ?? ''), 'eksklusif') ? 'checked' : '' }}
                                   onchange="onPackageSelect(this.value)">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-rose-50/50 transition h-full flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-brand block">🔴 Eksklusif</span>
                                    <b class="text-sm font-bold text-ink block mt-0.5">Rp180.000</b>
                                    <span class="text-[10px] text-ink3 block mt-1">Desain 3D &amp; Adat</span>
                                </div>
                                <span class="text-[9px] font-bold text-white bg-brand rounded-full py-0.5 px-2 mt-2">Tamu Tanpa Batas</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="selected_package" value="Paket Kustom - Rp280.000" class="peer sr-only"
                                   {{ str_contains(strtolower($selectedPackage ?? ''), 'kustom') || str_contains(strtolower($selectedPackage ?? ''), 'luxury') ? 'checked' : '' }}
                                   onchange="onPackageSelect(this.value)">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-purple-500 peer-checked:bg-purple-50/50 transition h-full flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-purple-800 block">✨ Kustom</span>
                                    <b class="text-sm font-bold text-ink block mt-0.5">Rp280.000</b>
                                    <span class="text-[10px] text-ink3 block mt-1">Request Desain Bebas</span>
                                </div>
                                <span class="text-[9px] font-bold text-purple-700 bg-purple-100 rounded-full py-0.5 px-2 mt-2">Full Request 1-on-1</span>
                            </div>
                        </label>
                    </div>

                    {{-- Dynamic Custom Request Box (appears if Kustom is chosen) --}}
                    <div id="customRequestBox" class="{{ str_contains(strtolower($selectedPackage ?? ''), 'kustom') || str_contains(strtolower($selectedPackage ?? ''), 'luxury') ? '' : 'hidden' }} mt-3 p-4 rounded-2xl bg-purple-50/80 border border-purple-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <b class="text-xs font-bold text-purple-900 flex items-center gap-1.5">
                                <span>🎨</span> Request Konsep Desain Sesuai Keinginan Anda
                            </b>
                            <span class="text-[10px] font-bold text-purple-700 bg-purple-100 px-2.5 py-0.5 rounded-full">Paket Kustom VIP</span>
                        </div>
                        <p class="text-[11px] text-purple-800 leading-relaxed">
                            Jelaskan konsep tema, kombinasi warna impian, ornamen adat langka, animasi latar, atau sertakan tautan referensi (Pinterest/Canva/Instagram) yang Anda inginkan:
                        </p>
                        <textarea name="custom_design_request" id="customDesignRequestInput" rows="2"
                                  placeholder="Contoh: Saya ingin tema perpaduan adat Bugis & modern dengan warna terracotta gold, ada animasi daun gugur, dan layout cover sinematik..."
                                  class="w-full rounded-xl border border-purple-300 p-3 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                    </div>
                </div>

                {{-- Template Desain Aktif Card (Bisa diganti kapan saja via modal & dipreview) --}}
                <div class="space-y-2 pt-2 border-t border-ink/10">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Template Desain Terpilih *</label>
                        <button type="button" onclick="openTemplateModal()" class="text-xs font-bold text-brand hover:underline flex items-center gap-1">
                            <span>🎨</span> <span>Katalog Template</span>
                        </button>
                    </div>

                    <div id="activeTemplateCard" class="p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-brand/5 via-blush to-amber-50/40 border-2 border-brand/20 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm">
                        <div class="flex items-center gap-4 w-full sm:w-auto">
                            <div class="relative w-16 h-20 sm:w-20 sm:h-24 rounded-xl overflow-hidden shadow-md border border-brand/20 shrink-0 bg-sunk">
                                <img id="activeTemplateImg" src="{{ $currentTemplate['img'] }}" alt="{{ $currentTemplate['name'] }}" class="w-full h-full object-cover">
                                <span class="absolute top-1 right-1 w-5 h-5 rounded-full bg-brand text-white text-[10px] grid place-items-center font-bold shadow">
                                    ✓
                                </span>
                            </div>
                            <div class="space-y-1">
                                <div class="flex flex-wrap items-center gap-1.5">
                                    <span id="activeTemplateBadge" class="text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full bg-brand text-white">
                                        {{ $currentTemplate['badge'] }}
                                    </span>
                                    <span id="activeTemplatePrice" class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white border border-ink/15 text-ink">
                                        {{ $currentTemplate['price'] }}
                                    </span>
                                </div>
                                <h3 id="activeTemplateTitle" class="font-serif text-lg sm:text-xl font-bold text-ink leading-tight">
                                    {{ $currentTemplate['name'] }}
                                </h3>
                                <p id="activeTemplateDesc" class="text-[11px] text-ink2 line-clamp-2 max-w-md">
                                    {{ $currentTemplate['desc'] }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 w-full sm:w-auto justify-end shrink-0 flex-wrap">
                            <button type="button" onclick="resetFormToTemplateDefaults()" class="px-3.5 py-2 rounded-xl text-xs font-bold text-ink2 hover:text-rose-600 bg-white hover:bg-rose-50 transition flex items-center gap-1.5 border border-ink/15 shadow-sm" title="Kembalikan semua input ke data default template">
                                <span>🔄</span> <span>Reset Default</span>
                            </button>
                            <button type="button" onclick="openTemplateModal()" class="px-4 py-2 rounded-xl text-xs font-bold text-ink hover:text-brand bg-white hover:bg-sunk transition flex items-center gap-1.5 border border-ink/15 shadow-sm">
                                <span>🎨</span> <span>Ganti Template</span>
                            </button>
                            <button type="button" onclick="openPreviewModal()" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-brand hover:bg-accent transition flex items-center gap-1.5 shadow-md shadow-brand/25">
                                <span>👁️</span> <span>Live Preview</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Judul / Event Heading --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">
                        Judul / Kata Pembuka (Event Heading)
                    </label>
                    <input type="text" name="event_heading" id="eventHeadingInput" value="{{ old('event_heading') }}"
                           placeholder="Contoh: WALIMATUL 'URSY"
                           class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    
                    {{-- Quick Chip Selectors --}}
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="text-[11px] text-ink3 self-center mr-1">Pilihan Cepat:</span>
                        <button type="button" onclick="setHeading('WALIMATUL \'URSY')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">Walimatul 'Ursy</button>
                        <button type="button" onclick="setHeading('THE WEDDING CELEBRATION OF')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">The Wedding</button>
                        <button type="button" onclick="setHeading('HOLY MATRIMONY & RECEPTION')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">Holy Matrimony</button>
                        <button type="button" onclick="setHeading('PAMASU-MASUON & RESEPSI')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">Adat Batak</button>
                    </div>
                </div>

                {{-- Tanggal Pernikahan / Acara Utama --}}
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Tanggal Hari-H Acara *</label>
                        <input type="date" name="wedding_date" value="{{ old('wedding_date') }}" required
                               class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>

                    {{-- URL Slug Kustom --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Tautan Khusus (Slug Link)</label>
                        <div class="flex items-center rounded-2xl border border-ink/20 overflow-hidden focus-within:ring-2 focus-within:ring-brand">
                            <span class="bg-sunk px-3 py-3 text-[11px] font-mono text-ink3 border-r border-ink/10">/undangan/</span>
                            <input type="text" name="slug" id="slugInput" value="{{ old('slug') }}" placeholder="Contoh: rizky-amanda"
                                   class="w-full px-3 py-3 text-xs font-semibold focus:outline-none">
                        </div>
                        <p class="text-[10px] text-ink3">Biarkan kosong untuk otomatis dibuat dari nama tokoh / mempelai.</p>
                    </div>
                </div>

                {{-- Foto Cover Utama --}}
                <div class="space-y-2 pt-2 border-t border-ink/10">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Foto Sampul Depan (Cover Photo)</label>
                    <div class="flex flex-col sm:flex-row items-center gap-4 p-4 rounded-2xl bg-sunk/50 border border-ink/10">
                        <div class="w-24 h-24 rounded-2xl bg-white border border-ink/15 overflow-hidden shrink-0 shadow-sm grid place-items-center">
                            <img id="coverPreviewImg" src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400" class="w-full h-full object-cover" alt="Preview Cover">
                        </div>
                        <div class="space-y-1.5 flex-1">
                            <input type="file" name="cover_photo" id="coverPhotoInput" accept="image/*" onchange="previewImageFile(this, 'coverPreviewImg')"
                                   class="block w-full text-xs text-ink3 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand file:text-white hover:file:bg-accent cursor-pointer">
                            <p class="text-[10px] text-ink3">Format JPG, PNG, atau WEBP (Maksimal 5 MB). Foto ini akan menjadi latar belakang amplop pembuka.</p>
                        </div>
                    </div>
                </div>

                {{-- Kutipan / Ayat / Doa --}}
                <div class="space-y-1.5 pt-2 border-t border-ink/10">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Kutipan Ayat Suci / Kata Mutiara (Quote)</label>
                    <textarea name="quote" id="quoteInput" rows="3"
                              placeholder="Tuliskan kutipan ayat suci, mutiara kata, atau doa restu (Contoh: QS. Ar-Rum: 21)..."
                              class="w-full rounded-2xl border border-ink/20 p-4 text-xs focus:outline-none focus:ring-2 focus:ring-brand leading-relaxed">{{ old('quote') }}</textarea>

                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="text-[11px] text-ink3 self-center mr-1">Contoh Teks Cepat:</span>
                        <button type="button" onclick="setQuote('islamic')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">QS. Ar-Rum: 21</button>
                        <button type="button" onclick="setQuote('christian')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">1 Korintus 13:4-7</button>
                        <button type="button" onclick="setQuote('general')" class="px-2.5 py-1 rounded-full bg-sunk hover:bg-brand/10 text-[11px] font-semibold text-ink2">Puisi Romantis</button>
                    </div>
                </div>
            </div>

            {{-- ========================================================
                 LANGKAH 2: INFORMASI TOKOH / MEMPELAI / YANG BERSANGKUTAN
            ======================================================== --}}
            <div id="stepPanel2" class="step-panel space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 2</span>
                    <h2 id="step2Title" class="font-serif text-2xl font-bold text-ink">Profil Mempelai</h2>
                    <p id="step2Desc" class="text-xs text-ink2 mt-1">Masukkan nama, gelar, urutan keluarga, dan foto masing-masing pihak.</p>
                </div>

                {{-- Urutan Tampil --}}
                <div id="displayOrderContainer" class="p-3.5 rounded-2xl bg-sunk/60 border border-ink/10 flex items-center justify-between gap-4">
                    <span id="displayOrderLabel" class="text-xs font-bold text-ink">Urutan Tampilan di Undangan:</span>
                    <div class="flex items-center gap-3 text-xs font-semibold">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="display_order" value="groom_first" checked class="text-brand focus:ring-brand">
                            <span id="labelOrderFirst">Pria Dulu</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="radio" name="display_order" value="bride_first" class="text-brand focus:ring-brand">
                            <span id="labelOrderSecond">Wanita Dulu</span>
                        </label>
                    </div>
                </div>

                {{-- Tokoh / Pihak 1 (Groom / Yang Bersangkutan / Almarhum) --}}
                <div class="p-5 rounded-3xl bg-blush/60 border border-brand/20 space-y-4">
                    <b class="text-sm font-bold text-brand flex items-center gap-2">
                        <span id="labelGroomTitle">🤵 Mempelai Pria</span>
                    </b>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="labelGroomNick" class="block text-xs font-bold uppercase tracking-wider text-ink2">Nama Panggilan *</label>
                            <input type="text" name="groom_name" id="groomNameInput" value="{{ old('groom_name') }}" required oninput="autoSuggestSlug()"
                                   placeholder="Contoh: Rizky"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="labelGroomFull" class="block text-xs font-bold uppercase tracking-wider text-ink2">Nama Lengkap &amp; Gelar</label>
                            <input type="text" name="groom_fullname" id="groomFullNameInput" value="{{ old('groom_fullname') }}"
                                   placeholder="Contoh: Rizky Pratama, S.Kom."
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="labelGroomExtra" class="block text-xs font-bold uppercase tracking-wider text-ink2">Urutan Anak (Birth Order)</label>
                            <input type="text" name="groom_birth_order" id="groomBirthOrderInput" value="{{ old('groom_birth_order') }}"
                                   placeholder="Contoh: Putra Pertama / Putra Kedua / Putra Bungsu"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="labelGroomPhoto" class="block text-xs font-bold uppercase tracking-wider text-ink2">Upload Foto Pria</label>
                            <div class="flex items-center gap-3">
                                <img id="groomPreviewImg" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200" class="w-12 h-12 rounded-full object-cover border border-ink/20 shrink-0 shadow-sm">
                                <div class="flex-1 space-y-1">
                                    <input type="file" name="groom_photo" id="groomPhotoInput" accept="image/*" onchange="previewImageFile(this, 'groomPreviewImg')"
                                           class="block w-full text-xs text-ink3 file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand/10 file:text-brand hover:file:bg-brand hover:file:text-white cursor-pointer">
                                    <div class="flex items-center justify-between gap-2 pt-0.5">
                                        <p class="text-[10px] text-ink3">Maksimal 5 MB</p>
                                        <button type="button" onclick="resetUploadedPhoto('groom', 'groomPhotoInput', 'groomPreviewImg', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200')" class="text-[10px] text-ink3 hover:text-brand underline cursor-pointer">Reset ke foto bawaan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tokoh / Pihak 2 (Bride / Pendamping / Ahli Waris) --}}
                <div class="p-5 rounded-3xl bg-blush/60 border border-brand/20 space-y-4">
                    <b class="text-sm font-bold text-brand flex items-center gap-2">
                        <span id="labelBrideTitle">👰 Mempelai Wanita</span>
                    </b>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="labelBrideNick" class="block text-xs font-bold uppercase tracking-wider text-ink2">Nama Panggilan *</label>
                            <input type="text" name="bride_name" id="brideNameInput" value="{{ old('bride_name') }}" oninput="autoSuggestSlug()"
                                   placeholder="Contoh: Amanda"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="labelBrideFull" class="block text-xs font-bold uppercase tracking-wider text-ink2">Nama Lengkap &amp; Gelar</label>
                            <input type="text" name="bride_fullname" id="brideFullNameInput" value="{{ old('bride_fullname') }}"
                                   placeholder="Contoh: Amanda Putri Sastro, S.E."
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="labelBrideExtra" class="block text-xs font-bold uppercase tracking-wider text-ink2">Urutan Anak (Birth Order)</label>
                            <input type="text" name="bride_birth_order" id="brideBirthOrderInput" value="{{ old('bride_birth_order') }}"
                                   placeholder="Contoh: Putri Kedua / Putri Bungsu / Putri Tunggal"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="labelBridePhoto" class="block text-xs font-bold uppercase tracking-wider text-ink2">Upload Foto Wanita</label>
                            <div class="flex items-center gap-3">
                                <img id="bridePreviewImg" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200" class="w-12 h-12 rounded-full object-cover border border-ink/20 shrink-0 shadow-sm">
                                <div class="flex-1 space-y-1">
                                    <input type="file" name="bride_photo" id="bridePhotoInput" accept="image/*" onchange="previewImageFile(this, 'bridePreviewImg')"
                                           class="block w-full text-xs text-ink3 file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand/10 file:text-brand hover:file:bg-brand hover:file:text-white cursor-pointer">
                                    <div class="flex items-center justify-between gap-2 pt-0.5">
                                        <p class="text-[10px] text-ink3">Maksimal 5 MB</p>
                                        <button type="button" onclick="resetUploadedPhoto('bride', 'bridePhotoInput', 'bridePreviewImg', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200')" class="text-[10px] text-ink3 hover:text-brand underline cursor-pointer">Reset ke foto bawaan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ========================================================
                 LANGKAH 3: KELUARGA & ORANG TUA / AHLI WARIS
            ======================================================== --}}
            <div id="stepPanel3" class="step-panel space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 3</span>
                    <h2 id="step3Title" class="font-serif text-2xl font-bold text-ink">Informasi Orang Tua &amp; Keluarga</h2>
                    <p id="step3Desc" class="text-xs text-ink2 mt-1">Informasi kedua orang tua yang mengundang dan memberikan restu.</p>
                </div>

                {{-- Keluarga 1 --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-4">
                    <b id="family1Title" class="text-xs font-bold uppercase tracking-wider text-ink block">Keluarga Mempelai Pria</b>
                    
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="family1FatherLabel" class="block text-xs font-semibold text-ink2">Nama Ayah</label>
                            <input type="text" name="groom_father" id="groomFatherInput" value="{{ old('groom_father') }}"
                                   placeholder="Contoh: Bapak Bambang Sudiro"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="family1MotherLabel" class="block text-xs font-semibold text-ink2">Nama Ibu</label>
                            <input type="text" name="groom_mother" id="groomMotherInput" value="{{ old('groom_mother') }}"
                                   placeholder="Contoh: Ibu Endang Sulastri"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label id="family1CityLabel" class="block text-xs font-semibold text-ink2">Kota Asal / Domisili Keluarga Pria</label>
                        <input type="text" name="groom_city" id="groomCityInput" value="{{ old('groom_city') }}"
                               placeholder="Contoh: Jakarta Selatan / Surabaya"
                               class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>

                {{-- Keluarga 2 --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-4">
                    <b id="family2Title" class="text-xs font-bold uppercase tracking-wider text-ink block">Keluarga Mempelai Wanita</b>
                    
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label id="family2FatherLabel" class="block text-xs font-semibold text-ink2">Nama Ayah</label>
                            <input type="text" name="bride_father" id="brideFatherInput" value="{{ old('bride_father') }}"
                                   placeholder="Contoh: Bapak Ir. Suryo Broto"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>

                        <div class="space-y-1.5">
                            <label id="family2MotherLabel" class="block text-xs font-semibold text-ink2">Nama Ibu</label>
                            <input type="text" name="bride_mother" id="brideMotherInput" value="{{ old('bride_mother') }}"
                                   placeholder="Contoh: Ibu Dewi Anggraini"
                                   class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label id="family2CityLabel" class="block text-xs font-semibold text-ink2">Kota Asal / Domisili Keluarga Wanita</label>
                        <input type="text" name="bride_city" id="brideCityInput" value="{{ old('bride_city') }}"
                               placeholder="Contoh: Bandung / Yogyakarta"
                               class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>
            </div>

            {{-- ========================================================
                 LANGKAH 4: RANGKAIAN ACARA (AKAD & RESEPSI)
            ======================================================== --}}
            <div id="stepPanel4" class="step-panel space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 4</span>
                        <h2 class="font-serif text-2xl font-bold text-ink">Jadwal &amp; Lokasi Acara</h2>
                        <p class="text-xs text-ink2 mt-1">Atur jadwal rangkaian acara (Akad Nikah, Resepsi, Syukuran, dll) beserta peta lokasi.</p>
                    </div>
                    <button type="button" onclick="addNewEventCard()" class="px-4 py-2 bg-brand/10 hover:bg-brand text-brand hover:text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 cursor-pointer shadow-sm active:scale-95">
                        <span class="text-sm font-extrabold">+</span> Tambah Acara Baru
                    </button>
                </div>

                {{-- Hidden dynamic inputs container for standard form submission --}}
                <div id="hiddenEventsInputsContainer"></div>

                {{-- Events List Container --}}
                <div id="eventsListContainer" class="space-y-4">
                    {{-- Acara 1 --}}
                    <div class="event-card-item p-5 rounded-3xl bg-sunk/60 border border-ink/15 space-y-4 relative transition-all" data-event-index="1">
                        <div class="flex items-center justify-between">
                            <b class="text-sm font-bold text-ink flex items-center gap-1.5">
                                <span class="event-header-label" id="event1HeaderTitle">💍 Acara 1: Akad Nikah / Pemberkatan</span>
                            </b>
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white text-brand border border-brand/20 event-badge">Acara Utama</span>
                                <button type="button" onclick="removeEventCard(this)" class="btn-remove-event text-xs text-ink3 hover:text-red-500 font-semibold p-1 transition hidden cursor-pointer" title="Hapus Acara Ini">
                                    🗑️ Hapus
                                </button>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-3">
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Nama Acara</label>
                                <input type="text" name="event_1_title" id="event1TitleInput" value="{{ old('event_1_title') }}"
                                       placeholder="Contoh: Akad Nikah / Doa Bersama"
                                       class="event-title-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Tanggal Acara</label>
                                <input type="date" name="event_1_date" value="{{ old('event_1_date') }}"
                                       class="event-date-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Waktu (Mulai - Selesai)</label>
                                <div class="flex items-center gap-1">
                                    <input type="text" name="event_1_start_time" value="{{ old('event_1_start_time') }}" placeholder="08:00 WIB" class="event-start-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                    <span>-</span>
                                    <input type="text" name="event_1_end_time" value="{{ old('event_1_end_time') }}" placeholder="10:00 / Selesai" class="event-end-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                </div>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Nama Tempat / Gedung</label>
                                <input type="text" name="event_1_venue" id="event1VenueInput" value="{{ old('event_1_venue') }}"
                                       placeholder="Contoh: Masjid Agung Al-Azhar"
                                       class="event-venue-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Tautan Google Maps</label>
                                <input type="url" name="event_1_maps_url" value="{{ old('event_1_maps_url') }}"
                                       placeholder="Contoh: https://maps.app.goo.gl/..."
                                       class="event-maps-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Alamat Lengkap</label>
                            <input type="text" name="event_1_address" value="{{ old('event_1_address') }}"
                                   placeholder="Contoh: Jl. Sisingamangaraja No. 1, Kebayoran Baru, Jakarta Selatan"
                                   class="event-address-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    {{-- Acara 2 --}}
                    <div class="event-card-item p-5 rounded-3xl bg-blush/60 border border-brand/20 space-y-4 relative transition-all" data-event-index="2">
                        <div class="flex items-center justify-between">
                            <b class="text-sm font-bold text-brand flex items-center gap-1.5">
                                <span class="event-header-label" id="event2HeaderTitle">🎉 Acara 2: Resepsi Pernikahan / Tasyakuran</span>
                            </b>
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white text-ink2 border border-ink/15 event-badge">Acara Pendukung</span>
                                <button type="button" onclick="removeEventCard(this)" class="btn-remove-event text-xs text-red-500 hover:text-red-700 font-semibold p-1 transition cursor-pointer" title="Hapus Acara Ini">
                                    🗑️ Hapus
                                </button>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-3">
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Nama Acara</label>
                                <input type="text" name="event_2_title" id="event2TitleInput" value="{{ old('event_2_title') }}"
                                       placeholder="Contoh: Resepsi Pernikahan / Ramah Tamah"
                                       class="event-title-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Tanggal Acara</label>
                                <input type="date" name="event_2_date" value="{{ old('event_2_date') }}"
                                       class="event-date-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Waktu (Mulai - Selesai)</label>
                                <div class="flex items-center gap-1">
                                    <input type="text" name="event_2_start_time" value="{{ old('event_2_start_time') }}" placeholder="11:00 WIB" class="event-start-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                    <span>-</span>
                                    <input type="text" name="event_2_end_time" value="{{ old('event_2_end_time') }}" placeholder="14:00 / Selesai" class="event-end-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                </div>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Nama Tempat / Ballroom</label>
                                <input type="text" name="event_2_venue" id="event2VenueInput" value="{{ old('event_2_venue') }}"
                                       placeholder="Contoh: Grand Ballroom Menara 165"
                                       class="event-venue-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-ink2">Tautan Google Maps</label>
                                <input type="url" name="event_2_maps_url" value="{{ old('event_2_maps_url') }}"
                                       placeholder="Contoh: https://maps.app.goo.gl/..."
                                       class="event-maps-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Alamat Lengkap</label>
                            <input type="text" name="event_2_address" value="{{ old('event_2_address') }}"
                                   placeholder="Contoh: Jl. TB Simatupang Kav. 1, Cilandak Timur, Jakarta Selatan"
                                   class="event-address-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>
                </div>

                {{-- Add Event Button --}}
                <button type="button" onclick="addNewEventCard()" class="w-full py-3.5 px-4 border-2 border-dashed border-brand/40 hover:border-brand rounded-2xl text-brand font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-2 bg-brand/5 hover:bg-brand/10 transition active:scale-[0.99] cursor-pointer">
                    <span class="text-base font-extrabold">+</span> Tambah Rangkaian Acara Baru
                </button>
            </div>

            {{-- ========================================================
                 LANGKAH 5: AMPLOP DIGITAL & KADO
            ======================================================== --}}
            <div id="stepPanel5" class="step-panel space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 5</span>
                    <h2 class="font-serif text-2xl font-bold text-ink">Amplop Digital &amp; Tanda Kasih</h2>
                    <p id="step5Desc" class="text-xs text-ink2 mt-1">{{ $currentGalConf['step5Desc'] }}</p>
                </div>

                {{-- Rekening 1 --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-4">
                    <b class="text-xs font-bold uppercase tracking-wider text-ink block">Rekening Bank 1 (Utama)</b>
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Pilihan Bank / e-Wallet</label>
                            <select name="bank_name_1" class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                                <option value="BCA" selected>Bank BCA</option>
                                <option value="Mandiri">Bank Mandiri</option>
                                <option value="BRI">Bank BRI</option>
                                <option value="BNI">Bank BNI</option>
                                <option value="BSI">Bank BSI (Syariah)</option>
                                <option value="Jago">Bank Jago</option>
                                <option value="Dana">Dana</option>
                                <option value="GoPay">GoPay</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nomor Rekening</label>
                            <input type="text" name="bank_account_1" value="{{ old('bank_account_1') }}" placeholder="Contoh: 1234567890"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Atas Nama Pemilik</label>
                            <input type="text" name="bank_holder_1" value="{{ old('bank_holder_1') }}" placeholder="Contoh: Rizky Pratama"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>
                </div>

                {{-- Rekening 2 --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-4">
                    <b class="text-xs font-bold uppercase tracking-wider text-ink block">Rekening Bank 2 (Opsional)</b>
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Pilihan Bank / e-Wallet</label>
                            <select name="bank_name_2" class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                                <option value="Mandiri" selected>Bank Mandiri</option>
                                <option value="BCA">Bank BCA</option>
                                <option value="BRI">Bank BRI</option>
                                <option value="BNI">Bank BNI</option>
                                <option value="BSI">Bank BSI (Syariah)</option>
                                <option value="Dana">Dana</option>
                                <option value="GoPay">GoPay</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nomor Rekening</label>
                            <input type="text" name="bank_account_2" value="{{ old('bank_account_2') }}" placeholder="Contoh: 987654321000"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Atas Nama Pemilik</label>
                            <input type="text" name="bank_holder_2" value="{{ old('bank_holder_2') }}" placeholder="Contoh: Amanda Putri Sastro"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>
                </div>

                {{-- Alamat Kado Fisik --}}
                <div class="p-5 rounded-3xl bg-sunk/50 border border-ink/15 space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Alamat Pengiriman Kado Fisik (Opsional)</label>
                    <textarea name="gift_address" rows="2" placeholder="Contoh: Jl. Bahagia Indah No. 12, Kebayoran Baru, Jakarta Selatan (Penerima: Rizky / 0812-3456-7890)"
                              class="w-full rounded-2xl border border-ink/20 p-3 text-xs focus:outline-none focus:ring-2 focus:ring-brand">{{ old('gift_address') }}</textarea>
                    <p class="text-[10px] text-ink3">Tamu dapat mengirim paket hadiah langsung ke alamat ini.</p>
                </div>

                {{-- Pesan Terima Kasih --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Pesan Terima Kasih / Penutup</label>
                    <textarea name="thank_you_note" rows="2" placeholder="Contoh: Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kami."
                              class="w-full rounded-2xl border border-ink/20 p-3 text-xs focus:outline-none focus:ring-2 focus:ring-brand">{{ old('thank_you_note') }}</textarea>
                </div>
            </div>

            {{-- ========================================================
                 LANGKAH 6: GALERI & REVIEW
            ======================================================== --}}
            <div id="stepPanel6" class="step-panel space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 6</span>
                    <h2 id="step6Title" class="font-serif text-2xl font-bold text-ink">{{ $currentGalConf['title'] }}</h2>
                    <p id="step6Desc" class="text-xs text-ink2 mt-1">{{ $currentGalConf['desc'] }}</p>
                </div>

                {{-- Pilihan Musik Latar --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-3">
                    <b id="musicSectionLabel" class="text-xs font-bold uppercase tracking-wider text-ink block">Pilihan Musik Latar (Autoplay Audio)</b>
                    <select name="music_url" id="musicUrlSelect" class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        <option value="wedding-melody.wav" selected>♫ Beautiful Melody (Instrumental Bawaan)</option>
                        <option value="https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3">♫ Melodi Akustik Syahdu &amp; Lembut</option>
                        <option value="https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3">♫ Sweet Piano Melody</option>
                    </select>
                    <p class="text-[10px] text-ink3">Musik akan diputar secara otomatis saat tamu menekan tombol "Buka Undangan".</p>
                </div>

                {{-- Upload Galeri Foto --}}
                <div class="p-5 rounded-3xl bg-sunk/50 border border-ink/15 space-y-3">
                    <div class="flex items-center justify-between">
                        <div>
                            <b id="galleryUploadLabel" class="text-xs font-bold uppercase tracking-wider text-ink block">{{ $currentGalConf['label'] }}</b>
                            <span id="galleryUploadSub" class="text-[11px] text-ink3">{{ $currentGalConf['sub'] }}</span>
                        </div>
                        <button type="button" onclick="resetGalleryPhotos()" class="text-[11px] text-ink3 hover:text-brand font-semibold underline cursor-pointer">↺ Kosongkan Galeri</button>
                    </div>

                    <input type="file" name="gallery_photos[]" multiple accept="image/*" onchange="previewGalleryFiles(this)"
                           class="block w-full text-xs text-ink3 file:mr-3 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand file:text-white hover:file:bg-accent cursor-pointer">
                    <p class="text-[10px] text-ink3 pt-1">Format JPG, PNG, atau WEBP (Maksimal 5 MB per foto). Bisa pilih beberapa foto sekaligus.</p>
                    
                    {{-- Gallery Preview Thumbnails Grid --}}
                    <div id="galleryPreviews" class="grid grid-cols-3 sm:grid-cols-6 gap-2.5 pt-2">
                        {{-- Injected dynamically --}}
                    </div>
                </div>

                {{-- Opsi Tampilkan di Portofolio / Katalog Publik --}}
                <div class="p-4 rounded-2xl bg-white border border-brand/20 flex items-center justify-between gap-3">
                    <div>
                        <b class="text-xs font-bold text-ink block">Tampilkan juga di Galeri Katalog Desain Beranda?</b>
                        <p class="text-[10.5px] text-ink3">Opsi ini memungkinkan undangan Anda dipamerkan sebagai contoh desain di halaman depan D'Karsa.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0">
                        <input type="checkbox" name="is_in_catalog" value="1" class="sr-only peer">
                        <div class="w-11 h-6 bg-ink/20 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand"></div>
                    </label>
                </div>

                {{-- Data Kontak Pemesan (Wajib Diisi untuk Verifikasi & ACC) --}}
                <div class="p-5 rounded-3xl bg-amber-50/80 border-2 border-amber-300/80 space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="w-9 h-9 rounded-2xl bg-amber-500 text-white flex items-center justify-center text-lg shrink-0 shadow-sm">
                            📱
                        </span>
                        <div>
                            <div class="flex items-center gap-2">
                                <b class="text-sm font-bold text-amber-950">Data Kontak Pemesan (Wajib Diisi)</b>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-200 text-amber-900 uppercase tracking-wide">Penting</span>
                            </div>
                            <p class="text-xs text-amber-800 mt-0.5 leading-relaxed">
                                Nomor WhatsApp aktif ini digunakan oleh <b>Admin D'Karsa</b> untuk memverifikasi data, meng-ACC, dan mengirimkan link undangan digital resmi Anda setelah disetujui.
                            </p>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3 pt-1">
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-amber-950">Nama Lengkap Pemesan *</label>
                            <input type="text" name="customer_name" id="customerNameInput" required value="{{ old('customer_name') }}"
                                   placeholder="Contoh: Rizky Kurniawan / Ibu Endang"
                                   class="w-full rounded-2xl border border-amber-300 bg-white px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-amber-950">Nomor WhatsApp Aktif *</label>
                            <input type="tel" name="customer_phone" id="customerPhoneInput" required value="{{ old('customer_phone') }}"
                                   placeholder="Contoh: 081234567890 atau 6281234567890"
                                   class="w-full rounded-2xl border border-amber-300 bg-white px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>
                </div>

                {{-- Ringkasan Review Card --}}
                <div class="p-5 rounded-3xl bg-blush border border-brand/30 space-y-2 text-center">
                    <span class="text-2xl">⏳</span>
                    <h4 class="font-serif text-lg font-bold text-brand">Alur Verifikasi &amp; ACC Admin</h4>
                    <p class="text-xs text-ink2 max-w-md mx-auto leading-relaxed">
                        Setelah Anda menekan tombol di bawah, formulir undangan akan disimpan dengan status <b>Menunggu ACC Admin</b>. Admin D'Karsa akan memeriksa data dan mengaktifkan tautan resmi undangan Anda.
                    </p>
                </div>
            </div>

            {{-- STEPPER NAVIGATION BUTTONS --}}
            <div class="mt-8 pt-5 border-t border-ink/10 flex items-center justify-between gap-3">
                <button type="button" id="prevBtn" onclick="prevStep()" class="px-5 py-3 rounded-full text-xs font-bold border border-ink/20 text-ink2 hover:bg-sunk transition flex items-center gap-1.5 opacity-0 pointer-events-none">
                    <span>←</span> Sebelumnya
                </button>

                <div class="flex items-center gap-3">
                    <button type="button" id="nextBtn" onclick="nextStep()" class="px-7 py-3 rounded-full text-xs font-bold bg-brand hover:bg-accent text-white shadow-lg transition flex items-center gap-1.5">
                        <span>Lanjut</span> <span>→</span>
                    </button>

                    <button type="submit" id="submitBtn" class="hidden px-8 py-3 rounded-full text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg transition flex items-center gap-2">
                        <span>🚀 Ajukan Undangan (Menunggu ACC)</span>
                    </button>
                </div>
            </div>

        </form>

    </main>

    {{-- FOOTER --}}
    <footer class="py-6 px-4 text-center text-xs text-ink3 border-t border-ink/10 bg-white">
        <p>&copy; {{ date('Y') }} D'Karsa Digital Invitation Platform. Seluruh Hak Cipta Dilindungi.</p>
    </footer>

    <!-- ========================================================
         FLOATING ACTION BUTTON (Selalu Muncul di Pojok Kanan Bawah)
    ======================================================== -->
    <div id="floatingPreviewBtn" class="fixed bottom-5 right-5 z-40">
        <button type="button" onclick="openPreviewModal()" class="group px-4 py-3 rounded-full bg-brand hover:bg-accent text-white font-bold text-xs sm:text-sm shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95 transition-all flex items-center gap-2 border-2 border-white">
            <span class="text-base animate-pulse">👁️</span>
            <span>Live Preview</span>
            <span class="hidden sm:inline text-white/80 font-normal">| D'Karsa</span>
        </button>
    </div>

    <!-- ========================================================
         MODAL PILIH TEMPLATE (Matching Screenshot 1)
    ======================================================== -->
    <div id="templateModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm p-2 sm:p-4 md:p-6 flex items-center justify-center">
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-ink/10 overflow-hidden flex flex-col max-h-[92vh] animate-in fade-in duration-200">
            <!-- Modal Header -->
            <div class="p-4 sm:p-6 border-b border-ink/10 flex items-center justify-between bg-white shrink-0">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-2xl bg-brand/10 text-brand grid place-items-center text-lg font-bold">🎨</span>
                    <div>
                        <h3 class="font-serif text-lg sm:text-2xl font-bold text-ink">Pilih Template Undangan</h3>
                        <p class="text-xs text-ink3 mt-0.5">Pilih template desain yang Anda sukai, sesuaikan dengan tema acara.</p>
                    </div>
                </div>
                <button type="button" onclick="closeTemplateModal()" class="w-9 h-9 rounded-full bg-sunk hover:bg-brand/10 text-ink2 hover:text-brand transition grid place-items-center text-lg font-bold">
                    ✕
                </button>
            </div>

            <!-- Filter Controls -->
            <div class="px-4 sm:px-6 py-3 bg-sunk/40 border-b border-ink/10 space-y-2.5 shrink-0">
                <!-- Category Filter Chips -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1" style="scrollbar-width: thin;">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-ink3 shrink-0 mr-1">Kategori:</span>
                    <button type="button" onclick="filterModalCategory('semua', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-brand text-white shadow-sm">Semua Acara</button>
                    <button type="button" onclick="filterModalCategory('pernikahan', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">💍 1. Pernikahan</button>
                    <button type="button" onclick="filterModalCategory('ultah', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">🎂 2. Ulang Tahun</button>
                    <button type="button" onclick="filterModalCategory('aqiqah', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">👶 3. Aqiqah & Kelahiran</button>
                    <button type="button" onclick="filterModalCategory('keagamaan', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">🕌 4. Keagamaan</button>
                    <button type="button" onclick="filterModalCategory('wisuda', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">🎓 5. Wisuda</button>
                    <button type="button" onclick="filterModalCategory('acara-formal', this)" class="modal-cat-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-ink2 border border-ink/15 hover:border-brand">🏛️ 6. Acara Formal</button>
                </div>

                <!-- Tier Filter Chips -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1" style="scrollbar-width: thin;">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-ink3 shrink-0 mr-1">Paket:</span>
                    <button type="button" onclick="filterModalTier('semua', this)" class="modal-tier-chip px-3 py-1 rounded-full text-xs font-bold transition bg-ink text-white shadow-sm">Semua Paket</button>
                    <button type="button" onclick="filterModalTier('basic', this)" class="modal-tier-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-emerald-800 border border-emerald-300 hover:bg-emerald-50">🟢 Basic (Rp50k)</button>
                    <button type="button" onclick="filterModalTier('premium', this)" class="modal-tier-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-blue-800 border border-blue-300 hover:bg-blue-50">🔵 Premium (Rp110k)</button>
                    <button type="button" onclick="filterModalTier('eksklusif', this)" class="modal-tier-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-rose-800 border border-rose-300 hover:bg-rose-50">🔴 Eksklusif (Rp180k)</button>
                    <button type="button" onclick="filterModalTier('kustom', this)" class="modal-tier-chip px-3 py-1 rounded-full text-xs font-bold transition bg-white text-purple-800 border border-purple-300 hover:bg-purple-50">✨ Kustom VIP (Rp280k)</button>
                </div>
            </div>

            <!-- Templates Grid Container -->
            <div class="p-4 sm:p-6 overflow-y-auto flex-1 bg-sunk/20" style="scrollbar-width: thin;">
                <div id="modalTemplatesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($allTemplates as $tmpl)
                        <div class="modal-template-card group relative bg-white rounded-2xl border-2 transition-all duration-200 overflow-hidden shadow-sm hover:shadow-md flex flex-col justify-between {{ $selectedTheme === $tmpl['name'] ? 'border-brand ring-2 ring-brand/30' : 'border-ink/10' }}"
                             data-name="{{ $tmpl['name'] }}"
                             data-category="{{ $tmpl['category'] }}"
                             data-tier="{{ $tmpl['tier'] }}"
                             data-price="{{ $tmpl['price'] }}"
                             data-package="{{ $tmpl['package_val'] }}"
                             data-eventcat="{{ $tmpl['category_label'] }}"
                             data-img="{{ $tmpl['img'] }}"
                             data-themeclass="{{ $tmpl['theme_css'] }}"
                             data-skin="{{ $tmpl['skin'] }}"
                             data-badge="{{ $tmpl['badge'] }}"
                             data-templatekey="{{ $tmpl['template_key'] ?? 'chibi-red' }}"
                             data-desc="{{ $tmpl['desc'] }}">

                            <div>
                                <!-- Image Thumbnail -->
                                <div class="relative aspect-[4/3] bg-sunk overflow-hidden">
                                    <img src="{{ $tmpl['img'] }}" alt="{{ $tmpl['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                                    <!-- Circular Pink Checkmark (Matching Screenshot 1) -->
                                    <div class="template-check-badge absolute top-3 right-3 w-7 h-7 rounded-full bg-brand text-white shadow-lg grid place-items-center text-sm font-bold border-2 border-white transition-transform {{ $selectedTheme === $tmpl['name'] ? 'scale-100' : 'scale-0' }}">
                                        ✓
                                    </div>

                                    <!-- Overlay Badges -->
                                    <div class="absolute bottom-2.5 left-2.5 right-2.5 flex items-center justify-between text-[10px] font-bold text-white">
                                        <span class="px-2 py-0.5 rounded-full bg-black/60 backdrop-blur-sm border border-white/20">
                                            {{ $tmpl['badge'] }}
                                        </span>
                                        <span class="px-2 py-0.5 rounded-full bg-brand/90 backdrop-blur-sm shadow">
                                            {{ $tmpl['price'] }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Card Content -->
                                <div class="p-4 space-y-1">
                                    <h4 class="font-serif text-base font-bold text-ink group-hover:text-brand transition leading-tight">
                                        {{ $tmpl['name'] }}
                                    </h4>
                                    <p class="text-xs text-ink3 line-clamp-2 leading-relaxed">
                                        {{ $tmpl['desc'] }}
                                    </p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="p-4 pt-0 grid grid-cols-2 gap-2 mt-2">
                                <button type="button" onclick="selectTemplate('{{ $tmpl['name'] }}', false)" class="btn-select-tmpl py-2 px-3 rounded-xl text-xs font-bold transition text-center flex items-center justify-center gap-1 {{ $selectedTheme === $tmpl['name'] ? 'bg-brand text-white' : 'bg-sunk/60 text-ink2 border border-ink/20 hover:border-brand hover:text-brand' }}">
                                    <span>{{ $selectedTheme === $tmpl['name'] ? '✓ Terpilih' : 'Pilih Template' }}</span>
                                </button>
                                <button type="button" onclick="previewSpecificTemplate('{{ $tmpl['name'] }}')" class="py-2 px-3 rounded-xl text-xs font-bold text-white bg-ink hover:bg-brand transition text-center flex items-center justify-center gap-1 shadow-sm">
                                    <span>👁️ Preview</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-4 sm:p-5 border-t border-ink/10 bg-white flex items-center justify-between shrink-0">
                <button type="button" onclick="closeTemplateModal()" class="px-5 py-2.5 rounded-full text-xs font-bold text-ink2 hover:text-ink bg-sunk hover:bg-ink/10 transition">
                    Tutup / Batal
                </button>
                <button type="button" onclick="closeTemplateModal()" class="px-6 py-2.5 rounded-full text-xs font-bold text-white bg-brand hover:bg-accent transition shadow-md shadow-brand/25 flex items-center gap-1.5">
                    <span>✓</span> <span>Gunakan Template Terpilih</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MODAL LIVE PREVIEW (Smartphone Frame - Matching Screenshot 2)
    ======================================================== -->
    <div id="livePreviewModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md p-2 sm:p-4 md:p-6 flex flex-col items-center justify-center">
        <!-- Floating Preview Top Bar -->
        <div class="w-full max-w-xl mx-auto mb-3 flex items-center justify-between gap-2 px-2 text-white">
            <div class="flex items-center gap-2">
                <span class="w-8 h-8 rounded-full bg-white/10 grid place-items-center text-sm">📱</span>
                <div>
                    <b class="text-xs sm:text-sm font-bold block leading-tight">Live Smartphone Preview</b>
                    <span id="prevCurrentThemeLabel" class="text-[10px] text-white/70 block">Tema: {{ $selectedTheme }}</span>
                </div>
            </div>

            <div class="flex items-center gap-2 flex-wrap justify-end">
                <!-- Use this template button (shown when previewing specific template demo) -->
                <button type="button" id="btnUseTemplateFromPreview" class="hidden px-3.5 py-1.5 rounded-full text-xs font-bold bg-brand hover:bg-accent text-white transition shadow flex items-center gap-1">
                    <span>✓</span> <span>Gunakan Template Ini</span>
                </button>

                <!-- Fullscreen Live Demo button -->
                <a id="btnBuilderFullscreenDemo" href="/demo/chibi-red" target="_blank" class="px-3 py-1.5 rounded-full text-xs font-bold bg-white text-ink hover:bg-neutral-100 transition shadow flex items-center gap-1">
                    <span>🌐</span> <span class="hidden sm:inline">Layar Penuh ↗</span>
                </a>

                <!-- Reset to template default data -->
                <button type="button" onclick="resetFormToTemplateDefaults()" class="px-3 py-1.5 rounded-full text-xs font-bold bg-white/15 hover:bg-rose-500 text-white transition border border-white/20 flex items-center gap-1" title="Kembalikan isian form & foto ke data bawaan template">
                    <span>🔄</span> <span class="hidden sm:inline">Reset Default</span>
                </button>

                <!-- Device Width Toggle -->
                <div class="bg-white/10 rounded-full p-0.5 border border-white/20 flex items-center text-[11px] font-bold">
                    <button type="button" id="btnDeviceMobile" onclick="setPreviewDevice(380)" class="px-2.5 py-1 rounded-full bg-brand text-white transition">
                        📱 380px
                    </button>
                    <button type="button" id="btnDeviceWide" onclick="setPreviewDevice(480)" class="px-2.5 py-1 rounded-full text-white/70 hover:text-white transition">
                        📲 480px
                    </button>
                </div>

                <button type="button" onclick="openTemplateModalFromPreview()" class="px-3 py-1.5 rounded-full text-xs font-bold bg-white/15 hover:bg-white/25 text-white transition border border-white/20 flex items-center gap-1">
                    <span>🎨</span> <span class="hidden sm:inline">Ganti Desain</span>
                </button>

                <button type="button" onclick="closePreviewModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/25 text-white transition grid place-items-center font-bold text-sm">
                    ✕
                </button>
            </div>
        </div>

        <!-- Interactive Guest Name Simulator for Preview (Melihat tampilan perorangan langsung di HP) -->
        <div class="w-full max-w-[380px] mx-auto mb-2 px-1 flex items-center gap-2">
            <div class="relative flex-1">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs">👤</span>
                <input type="text" id="previewGuestNameTestInput" placeholder="Tes nama tamu perorangan (mis: Ustadz Mansur / dr. Sarah)"
                       class="w-full pl-8 pr-3 py-1.5 rounded-full bg-white/20 text-white placeholder-white/70 text-xs font-semibold focus:outline-none focus:bg-white focus:text-ink focus:placeholder-ink3 transition border border-white/30 shadow-inner"
                       oninput="onPreviewGuestNameChange(this.value)">
            </div>
            <span class="text-[10px] text-white/90 bg-white/15 px-2.5 py-1 rounded-full border border-white/25 whitespace-nowrap font-medium" title="Ketik nama untuk melihat langsung di cover pembuka">
                Tes Tamu Cover
            </span>
        </div>

        <!-- Realistic Smartphone Chassis with Live Template Iframe -->
        <div id="phoneChassis" class="relative transition-all duration-300 w-full max-w-[380px] bg-[#1a181b] rounded-[48px] p-2.5 shadow-2xl border-4 border-neutral-700/80 ring-1 ring-white/15 flex flex-col h-[86vh]">
            <!-- Dynamic Island / Camera Notch -->
            <div class="w-24 h-4 bg-black rounded-full mx-auto mb-2 flex items-center justify-end px-3 shrink-0 shadow-inner">
                <span class="w-2 h-2 rounded-full bg-neutral-900 border border-neutral-700 block"></span>
            </div>

            <!-- Scrollable Screen Area with Live Template Iframe -->
            <div id="previewScreenScroll" class="relative w-full rounded-[36px] overflow-hidden flex-1 bg-white shadow-inner">
                <iframe id="builderLivePreviewIframe" src="/demo/chibi-red?preview=1" class="w-full h-full border-0 rounded-[36px]" allow="autoplay"></iframe>
            </div>

            <!-- Home indicator bar -->
            <div class="w-28 h-1 bg-neutral-600 rounded-full mx-auto mt-2 shrink-0"></div>
        </div>
    </div>

    {{-- INTERACTIVE JAVASCRIPT CONTROLS --}}
    <script>
        let currentStep = 1;
        const totalSteps = 6;

        const stepTitles = {
            1: 'Langkah 1 dari 6: Kategori & Info Utama',
            2: 'Langkah 2 dari 6: Profil Mempelai / Tokoh',
            3: 'Langkah 3 dari 6: Informasi Orang Tua & Keluarga',
            4: 'Langkah 4 dari 6: Jadwal & Lokasi Acara',
            5: 'Langkah 5 dari 6: Amplop Digital & Kado',
            6: 'Langkah 6 dari 6: Galeri, Musik & Kontak Pemesan'
        };

        function updateStepUI() {
            // Panels
            for (let i = 1; i <= totalSteps; i++) {
                const panel = document.getElementById(`stepPanel${i}`);
                const btn = document.getElementById(`stepBtn${i}`);
                if (panel) {
                    if (i === currentStep) {
                        panel.classList.add('active');
                    } else {
                        panel.classList.remove('active');
                    }
                }
                if (btn) {
                    btn.classList.remove('active', 'completed');
                    if (i === currentStep) {
                        btn.classList.add('active');
                    } else if (i < currentStep) {
                        btn.classList.add('completed');
                    }
                }
            }

            // Progress bar
            const percent = Math.round((currentStep / totalSteps) * 100);
            const progressBar = document.getElementById('progressBar');
            const percentDisplay = document.getElementById('stepPercentDisplay');
            const titleDisplay = document.getElementById('stepTitleDisplay');

            if (progressBar) progressBar.style.width = `${percent}%`;
            if (percentDisplay) percentDisplay.textContent = `${percent}% Selesai`;
            if (titleDisplay) titleDisplay.textContent = stepTitles[currentStep] || '';

            // Buttons
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');

            if (currentStep === 1) {
                prevBtn.classList.add('opacity-0', 'pointer-events-none');
            } else {
                prevBtn.classList.remove('opacity-0', 'pointer-events-none');
            }

            if (currentStep === totalSteps) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }

            // Scroll to top of form
            window.scrollTo({ top: 120, behavior: 'smooth' });
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepUI();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepUI();
            }
        }

        function goToStep(step) {
            if (step >= 1 && step <= totalSteps) {
                currentStep = step;
                updateStepUI();
            }
        }

        // Auto suggest clean slug
        function autoSuggestSlug() {
            const groom = document.getElementById('groomNameInput')?.value || '';
            const bride = document.getElementById('brideNameInput')?.value || '';
            const slugInput = document.getElementById('slugInput');
            if (slugInput && !slugInput.dataset.manualEdited) {
                const clean = (groom + '-' + bride).toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                slugInput.value = clean;
            }
        }

        document.getElementById('slugInput')?.addEventListener('input', function() {
            this.dataset.manualEdited = "true";
        });

        // Quick set heading
        function setHeading(text) {
            const input = document.getElementById('eventHeadingInput');
            if (input) {
                input.value = text;
                input.dataset.manualEdited = "true";
            }
        }

        // Quick set quote
        function setQuote(type) {
            const quoteEl = document.getElementById('quoteInput');
            if (!quoteEl) return;
            quoteEl.dataset.manualEdited = "true";
            if (type === 'islamic') {
                quoteEl.value = 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. (QS. Ar-Rum: 21)';
            } else if (type === 'christian') {
                quoteEl.value = 'Kasih itu sabar; kasih itu murah hati; ia tidak cemburu. Ia tidak memegahkan diri dan tidak sombong. Kasih tidak berkesudahan. (1 Korintus 13:4, 8)';
            } else if (type === 'general') {
                quoteEl.value = 'Dua jiwa yang bersatu, dua hati yang berpadu dalam ikatan cinta yang suci untuk melangkah bersama mengarungi perjalanan hidup selamanya.';
            }
        }

        // Data 6 Bab Kategori Undangan Beserta Sub-Pilihannya
        const categoryChaptersData = @json($categoryChapters);

        // Category change adaptations with dedicated non-wedding configurations
        const categoryConfigs = {
            'Pernikahan': {
                heading: "WALIMATUL 'URSY",
                quote: "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. (QS. Ar-Rum: 21)",
                slugPlaceholder: "rizky-amanda",
                step2Tab: "Mempelai",
                step2Title: "Profil Kedua Mempelai",
                step2Desc: "Masukkan nama panggilan, gelar, serta foto calon mempelai pria dan wanita.",
                showDisplayOrder: true,
                orderFirst: "Pria Dulu",
                orderSecond: "Wanita Dulu",

                // Tokoh 1
                person1Badge: "🤵 Mempelai Pria",
                person1NickLabel: "Nama Panggilan Pria *",
                person1NickPlaceholder: "Contoh: Rizky",
                person1FullLabel: "Nama Lengkap & Gelar Pria *",
                person1FullPlaceholder: "Contoh: Rizky Pratama, S.Kom.",
                person1ExtraLabel: "Urutan Anak (Birth Order)",
                person1ExtraPlaceholder: "Contoh: Putra Pertama / Putra Kedua",
                person1PhotoLabel: "Upload Foto Mempelai Pria",

                // Tokoh 2
                person2Badge: "👰 Mempelai Wanita",
                person2NickLabel: "Nama Panggilan Wanita *",
                person2NickPlaceholder: "Contoh: Amanda",
                person2FullLabel: "Nama Lengkap & Gelar Wanita",
                person2FullPlaceholder: "Contoh: Amanda Putri Sastro, S.E.",
                person2ExtraLabel: "Urutan Anak (Birth Order)",
                person2ExtraPlaceholder: "Contoh: Putri Kedua / Putri Bungsu",
                person2PhotoLabel: "Upload Foto Mempelai Wanita",

                // Step 3
                step3Tab: "Orang Tua",
                step3Title: "Informasi Orang Tua & Keluarga",
                step3Desc: "Informasi kedua orang tua yang mengundang dan memberikan restu.",
                family1Title: "Keluarga Mempelai Pria",
                family1FatherLabel: "Nama Ayah Mempelai Pria",
                family1MotherLabel: "Nama Ibu Mempelai Pria",
                family1CityLabel: "Kota Asal / Domisili Keluarga Pria",
                family2Title: "Keluarga Mempelai Wanita",
                family2FatherLabel: "Nama Ayah Mempelai Wanita",
                family2MotherLabel: "Nama Ibu Mempelai Wanita",
                family2CityLabel: "Kota Asal / Domisili Keluarga Wanita",

                // Step 4
                event1Header: "💍 Acara 1: Akad Nikah / Pemberkatan",
                event1Title: "Akad Nikah",
                event1VenuePlaceholder: "Contoh: Masjid Agung Al-Azhar",
                event2Header: "🎉 Acara 2: Resepsi Pernikahan",
                event2Title: "Resepsi Pernikahan",
                event2VenuePlaceholder: "Contoh: Grand Ballroom Menara 165",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi para tamu undangan yang ingin mengirimkan kado pernikahan secara cashless.",
                step6Title: "Galeri Prewedding & Musik",
                step6Desc: "Lengkapi undangan dengan foto-foto prewedding kenangan dan lagu romantis favorit.",
                galleryLabel: "Upload Foto Galeri (Prewedding)",
                gallerySub: "Bisa pilih beberapa foto prewedding atau momen bahagia sekaligus",
                musicLabel: "Pilihan Musik Latar Romantis (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Beautiful Wedding Melody (Instrumental Romantis Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Romantic Wedding Acoustic (Gitar Akustik Lembut)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Sweet Wedding Piano (Alunan Piano Manis)' }
                ],
            },

            'Tahlilan': {
                heading: "DOA BERSAMA & TAHLILAN",
                quote: "كُلُّ نَفْسٍ ذَائِقَةُ الْمَوْتِ ۗ وَإِنَّمَا تُوَفَّوْنَ أُجُورَكُمْ يَوْمَ الْقِيَامَةِ\n\"Setiap yang bernyawa akan merasakan mati. Dan hanya pada hari Kiamat sajalah diberikan dengan sempurna balasanmu.\" (QS. Ali 'Imran: 185)",
                slugPlaceholder: "tahlilan-alm-h-ahmad",
                step2Tab: "Data Almarhum",
                step2Title: "Data Almarhum / Almarhumah (Yang Didoakan)",
                step2Desc: "Masukkan data sosok yang bersangkutan / almarhum(ah) dan perwakilan keluarga yang mengundang.",
                showDisplayOrder: false,
                orderFirst: "Almarhum Dulu",
                orderSecond: "Keluarga Dulu",

                // Tokoh 1
                person1Badge: "🕯️ Yang Bersangkutan (Almarhum / Almarhumah)",
                person1NickLabel: "Nama Panggilan / Sebutan Singkat *",
                person1NickPlaceholder: "Contoh: Bpk. H. Ahmad",
                person1FullLabel: "Nama Lengkap & Bin / Binti *",
                person1FullPlaceholder: "Contoh: Alm. H. Ahmad Subarkah bin H. Mahmud",
                person1ExtraLabel: "Peringatan Wafat / Haul Ke-",
                person1ExtraPlaceholder: "Contoh: Memperingati 40 Hari / 100 Hari / 1 Tahun / Haul Ke-3",
                person1PhotoLabel: "Upload Foto Almarhum / Kenangan",

                // Tokoh 2
                person2Badge: "🤲 Keluarga Mengundang / Ahli Waris (Sohibul Hajat)",
                person2NickLabel: "Nama Singkat Perwakilan Keluarga",
                person2NickPlaceholder: "Contoh: Bpk. H. Ridwan & Keluarga",
                person2FullLabel: "Nama Keluarga Besar / Ahli Musibah",
                person2FullPlaceholder: "Contoh: Seluruh Anak, Cucu, & Ahli Waris Alm. H. Ahmad",
                person2ExtraLabel: "Hubungan dengan Almarhum",
                person2ExtraPlaceholder: "Contoh: Anak Kandung & Menantu / Seluruh Keluarga Besar",
                person2PhotoLabel: "Upload Foto Keluarga / Siluet (Opsional)",

                // Step 3
                step3Tab: "Ahli Waris",
                step3Title: "Informasi Keluarga & Ahli Waris",
                step3Desc: "Informasi keluarga duka dan perwakilan yang mengundang acara pengajian tahlil.",
                family1Title: "Keluarga Ahli Musibah / Tuan Rumah",
                family1FatherLabel: "Nama Ayah / Tokoh Tertua Keluarga",
                family1MotherLabel: "Nama Ibu / Sesepuh Keluarga",
                family1CityLabel: "Kota Domisili Keluarga",
                family2Title: "Perwakilan / Penanggung Jawab Acara",
                family2FatherLabel: "Nama Penanggung Jawab / Ketua Pengajian",
                family2MotherLabel: "Nama Pendamping / Humas Keluarga",
                family2CityLabel: "Kota / Alamat Kontak",

                // Step 4
                event1Header: "🕯️ Acara 1: Doa Bersama & Pembacaan Tahlil",
                event1Title: "Doa Bersama & Pembacaan Tahlil",
                event1VenuePlaceholder: "Contoh: Kediaman Keluarga Alm. H. Ahmad / Musholla Al-Ikhlas",
                event2Header: "🤲 Acara 2: Tausiyah & Ramah Tamah",
                event2Title: "Tausiyah Singkat & Ramah Tamah",
                event2VenuePlaceholder: "Contoh: Kediaman Keluarga Duka",

                // Step 5 & 6
                step5Desc: "Fasilitasi tanda kasih, sedekah jariyah, atau tali asih duka cita dari para tamu dan kerabat.",
                step6Title: "Foto Kenangan Almarhum & Audio Doa",
                step6Desc: "Lengkapi undangan dengan foto kenangan almarhum/almarhumah semasa hidup dan alunan doa syahdu.",
                galleryLabel: "Upload Foto Galeri (Kenangan Almarhum / Keluarga)",
                gallerySub: "Bisa pilih beberapa foto kenangan indah almarhum(ah) semasa hidup",
                musicLabel: "Pilihan Audio Latar / Doa Syahdu (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Alunan Dzikir & Sholawat Syahdu (Menenangkan Hati Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Instrumental Doa Religi Khidmat' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Alunan Melodi Tenang & Khusyuk' }
                ],
            },

            'Khitanan': {
                heading: "WALIMATUL KHITAN",
                quote: "Semoga ananda tercinta yang dikhitan tumbuh menjadi anak yang sholeh, cerdas, berbakti kepada kedua orang tua, serta bermanfaat bagi agama, nusa, dan bangsa. Aamiin ya Rabbal 'Alamin.",
                slugPlaceholder: "khitanan-fathan",
                step2Tab: "Anak Khitan",
                step2Title: "Profil Anak yang Dikhitan",
                step2Desc: "Masukkan data anak tercinta yang akan melaksanakan syukuran walimatul khitan.",
                showDisplayOrder: false,
                orderFirst: "Anak Dulu",
                orderSecond: "Orang Tua Dulu",

                // Tokoh 1
                person1Badge: "👦 Anak yang Dikhitan",
                person1NickLabel: "Nama Panggilan Anak *",
                person1NickPlaceholder: "Contoh: Fathan",
                person1FullLabel: "Nama Lengkap Anak *",
                person1FullPlaceholder: "Contoh: Muhammad Fathan Al-Ghifari",
                person1ExtraLabel: "Urutan Anak",
                person1ExtraPlaceholder: "Contoh: Putra Pertama / Putra Kedua",
                person1PhotoLabel: "Upload Foto Anak yang Dikhitan",

                // Tokoh 2
                person2Badge: "👨‍👩‍👦 Orang Tua / Wali yang Mengundang",
                person2NickLabel: "Nama Singkat Orang Tua",
                person2NickPlaceholder: "Contoh: Bpk. Hendra & Ibu Maya",
                person2FullLabel: "Nama Lengkap Kedua Orang Tua",
                person2FullPlaceholder: "Contoh: Hendra Wijaya, S.T. & Maya Puspita, S.Pd.",
                person2ExtraLabel: "Status Hubungan",
                person2ExtraPlaceholder: "Contoh: Ayah & Ibu Kandung",
                person2PhotoLabel: "Upload Foto Bersama Keluarga (Opsional)",

                // Step 3
                step3Tab: "Orang Tua",
                step3Title: "Informasi Orang Tua & Keluarga",
                step3Desc: "Informasi orang tua dan kakek-nenek ananda yang dikhitan.",
                family1Title: "Data Orang Tua Kandung",
                family1FatherLabel: "Nama Ayah Kandung",
                family1MotherLabel: "Nama Ibu Kandung",
                family1CityLabel: "Kota Domisili Keluarga",
                family2Title: "Keluarga Besar / Kakek-Nenek (Opsional)",
                family2FatherLabel: "Nama Kakek",
                family2MotherLabel: "Nama Nenek",
                family2CityLabel: "Kota Asal Kakek/Nenek",

                // Step 4
                event1Header: "✂️ Acara 1: Prosesi Syukuran Khitan",
                event1Title: "Prosesi Syukuran Khitan",
                event1VenuePlaceholder: "Contoh: Kediaman Keluarga / Rumah Utama",
                event2Header: "🎉 Acara 2: Tasyakuran & Ramah Tamah",
                event2Title: "Tasyakuran & Ramah Tamah",
                event2VenuePlaceholder: "Contoh: Gedung Serbaguna RW 05",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi kerabat yang ingin mengirimkan hadiah / tali asih syukuran khitan.",
                step6Title: "Galeri Foto Khitan & Musik",
                step6Desc: "Lengkapi undangan dengan foto keceriaan ananda tercinta dan alunan musik syukuran syahdu.",
                galleryLabel: "Upload Foto Galeri (Anak & Momen Syukuran Khitan)",
                gallerySub: "Bisa pilih beberapa foto ananda atau momen kebersamaan keluarga",
                musicLabel: "Pilihan Musik Latar Syukuran (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Melodi Syukuran Khitan (Ceria & Syahdu Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Akustik Ceria Tradisional' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Alunan Riang Walimatul Khitan' }
                ],
            },

            'Aqiqah': {
                heading: "TASYAKURAN AQIQAH",
                quote: "كُلُّ غُلَامٍ رَهِينَةٌ بِعَقِيقَتِهِ تُذْبَحُ عَنْهُ يَوْمَ سَابِعِهِ وَيُحْلَقُ وَيُسَمَّى\n\"Setiap anak tergadai dengan aqiqahnya, disembelihkan hewan untuknya pada hari ketujuh, dicukur rambutnya, dan diberi nama.\" (HR. Abu Dawud)",
                slugPlaceholder: "aqiqah-arkan",
                step2Tab: "Buah Hati",
                step2Title: "Profil Buah Hati (Bayi)",
                step2Desc: "Masukkan nama dan data bayi / buah hati tercinta yang melaksanakan aqiqah.",
                showDisplayOrder: false,
                orderFirst: "Bayi Dulu",
                orderSecond: "Orang Tua Dulu",

                // Tokoh 1
                person1Badge: "👶 Buah Hati / Bayi yang Diaqiqahkan",
                person1NickLabel: "Nama Panggilan Bayi *",
                person1NickPlaceholder: "Contoh: Arkan",
                person1FullLabel: "Nama Lengkap Bayi & Bin / Binti *",
                person1FullPlaceholder: "Contoh: Arkan Malik Ibrahim bin Rizky Pratama",
                person1ExtraLabel: "Urutan Anak & Tanggal Lahir",
                person1ExtraPlaceholder: "Contoh: Putra Pertama, lahir 12 Maret 2026",
                person1PhotoLabel: "Upload Foto Buah Hati",

                // Tokoh 2
                person2Badge: "👨‍👩‍👧 Orang Tua yang Berbahagia",
                person2NickLabel: "Nama Singkat Orang Tua",
                person2NickPlaceholder: "Contoh: Bpk. Rizky & Ibu Amanda",
                person2FullLabel: "Nama Lengkap Kedua Orang Tua",
                person2FullPlaceholder: "Contoh: Rizky Pratama & Amanda Putri",
                person2ExtraLabel: "Status Hubungan",
                person2ExtraPlaceholder: "Contoh: Ayah & Ibu Kandung",
                person2PhotoLabel: "Upload Foto Keluarga (Opsional)",

                // Step 3
                step3Tab: "Orang Tua",
                step3Title: "Informasi Orang Tua & Keluarga",
                step3Desc: "Informasi kedua orang tua dan kakek-nenek sang buah hati.",
                family1Title: "Orang Tua Kandung",
                family1FatherLabel: "Nama Ayah Kandung",
                family1MotherLabel: "Nama Ibu Kandung",
                family1CityLabel: "Kota Domisili",
                family2Title: "Kakek & Nenek (Opsional)",
                family2FatherLabel: "Nama Kakek",
                family2MotherLabel: "Nama Nenek",
                family2CityLabel: "Kota Asal Kakek/Nenek",

                // Step 4
                event1Header: "👶 Acara 1: Pencukuran Rambut & Tasmiyah",
                event1Title: "Pencukuran Rambut & Tasmiyah",
                event1VenuePlaceholder: "Contoh: Kediaman Keluarga Besar",
                event2Header: "🎉 Acara 2: Tasyakuran & Santap Siang",
                event2Title: "Tasyakuran & Santap Siang",
                event2VenuePlaceholder: "Contoh: Kediaman Keluarga Besar",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi kerabat yang ingin mengirimkan hadiah / kado untuk sang buah hati.",
                step6Title: "Galeri Foto Buah Hati & Musik",
                step6Desc: "Lengkapi undangan dengan potret manis sang buah hati dan alunan musik hangat penuh kasih sayang.",
                galleryLabel: "Upload Foto Galeri (Buah Hati & Bayi)",
                gallerySub: "Bisa pilih beberapa foto manis tumbuh kembang buah hati",
                musicLabel: "Pilihan Musik Latar Lembut (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Lullaby Kasih Buah Hati (Alunan Lembut Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Melodi Akustik Hangat Buah Hati' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Piano Manis Tasyakuran Aqiqah' }
                ],
            },

            'Ulang Tahun': {
                heading: "HAPPY BIRTHDAY CELEBRATION",
                quote: "Count your age by friends, not years. Count your life by smiles, not tears. Semoga bertambahnya usia membawa keberkahan, kebahagiaan, kesehatan, dan tercapainya segala cita-cita.",
                slugPlaceholder: "sweet-17-chelsea",
                step2Tab: "Yang Ultah",
                step2Title: "Profil yang Berulang Tahun",
                step2Desc: "Masukkan data orang yang berulang tahun dan keluarga / penyelenggara pesta.",
                showDisplayOrder: false,
                orderFirst: "Yang Ultah Dulu",
                orderSecond: "Orang Tua Dulu",

                // Tokoh 1
                person1Badge: "🎂 Yang Berulang Tahun",
                person1NickLabel: "Nama Panggilan *",
                person1NickPlaceholder: "Contoh: Chelsea",
                person1FullLabel: "Nama Lengkap *",
                person1FullPlaceholder: "Contoh: Chelsea Aurelia Putri",
                person1ExtraLabel: "Usia yang Dirayakan",
                person1ExtraPlaceholder: "Contoh: 17 Tahun (Sweet Seventeen) / Milad ke-5",
                person1PhotoLabel: "Upload Foto yang Berulang Tahun",

                // Tokoh 2
                person2Badge: "🎉 Orang Tua / Penyelenggara Acara",
                person2NickLabel: "Nama Singkat Pengundang",
                person2NickPlaceholder: "Contoh: Bpk. Bambang & Ibu Rina",
                person2FullLabel: "Nama Lengkap Keluarga / Orang Tua",
                person2FullPlaceholder: "Contoh: Keluarga Besar Bpk. Bambang Sudiro",
                person2ExtraLabel: "Keterangan",
                person2ExtraPlaceholder: "Contoh: Orang Tua Tercinta",
                person2PhotoLabel: "Upload Foto Keluarga / Suasana (Opsional)",

                // Step 3
                step3Tab: "Keluarga",
                step3Title: "Informasi Keluarga & Penyelenggara",
                step3Desc: "Informasi keluarga dan pendukung acara ulang tahun.",
                family1Title: "Orang Tua / Penyelenggara Utama",
                family1FatherLabel: "Nama Ayah / Tokoh Penyelenggara",
                family1MotherLabel: "Nama Ibu / Pendamping",
                family1CityLabel: "Kota Domisili",
                family2Title: "Keluarga Besar / Sahabat",
                family2FatherLabel: "Perwakilan Keluarga / Teman",
                family2MotherLabel: "Pendamping",
                family2CityLabel: "Kota Domisili",

                // Step 4
                event1Header: "🎂 Acara 1: Tiup Lilin & Doa Bersama",
                event1Title: "Tiup Lilin & Doa Bersama",
                event1VenuePlaceholder: "Contoh: Sky Garden Cafe & Resto",
                event2Header: "🎉 Acara 2: Pesta Ramah Tamah & Games",
                event2Title: "Pesta Ramah Tamah & Games",
                event2VenuePlaceholder: "Contoh: Sky Garden Ballroom",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi sahabat dan keluarga yang ingin mengirimkan kado ulang tahun secara cashless.",
                step6Title: "Galeri Foto Ultah & Musik Pesta",
                step6Desc: "Lengkapi undangan dengan koleksi foto terbaik yang berulang tahun dan lagu pesta yang ceria.",
                galleryLabel: "Upload Foto Galeri (Foto Seru & Momen Ultah)",
                gallerySub: "Bisa pilih beberapa foto terbaik dari masa ke masa",
                musicLabel: "Pilihan Musik Latar Pesta (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Happy Birthday Instrumental (Melodi Ceria Pesta Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Akustik Ceria Semarak Pesta' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Melodi Manis Sweet Birthday' }
                ],
            },

            'Halal Bihalal': {
                heading: "SILATURAHMI & HALAL BIHALAL",
                quote: "تَقَبَّلَ اللّهُ مِنَّا وَ مِنْكُمْ صِيَامَنَا وَ صِيَامَكُمْ\n\"Mari sambung tali silaturahmi, sucikan hati, dan pererat persaudaraan di hari yang fitri penuh berkah.\" Minal Aidin Wal Faidzin, Mohon Maaf Lahir dan Batin.",
                slugPlaceholder: "halal-bihalal-bani-sastro",
                step2Tab: "Tuan Rumah",
                step2Title: "Penyelenggara / Tuan Rumah Silaturahmi",
                step2Desc: "Masukkan nama tokoh tuan rumah, ketua panitia, atau perwakilan keluarga besar.",
                showDisplayOrder: false,
                orderFirst: "Tuan Rumah Dulu",
                orderSecond: "Panitia Dulu",

                // Tokoh 1
                person1Badge: "🕌 Tuan Rumah / Tokoh Utama Silaturahmi",
                person1NickLabel: "Nama Singkat Tuan Rumah / Trah *",
                person1NickPlaceholder: "Contoh: Bpk. H. Sulaiman / Bani Sastro",
                person1FullLabel: "Nama Lengkap Tuan Rumah & Gelar *",
                person1FullPlaceholder: "Contoh: Bpk. H. Sulaiman Danu, M.Si.",
                person1ExtraLabel: "Keluarga Besar / Paguyuban",
                person1ExtraPlaceholder: "Contoh: Trah Bani Danu / Paguyuban Warga",
                person1PhotoLabel: "Upload Foto Tuan Rumah / Logo Komunitas",

                // Tokoh 2
                person2Badge: "👥 Ketua Panitia / Perwakilan Acara",
                person2NickLabel: "Nama Ketua Panitia / Perwakilan",
                person2NickPlaceholder: "Contoh: Mas Danang Wijaya",
                person2FullLabel: "Nama Lengkap Panitia & Jabatan",
                person2FullPlaceholder: "Contoh: Danang Wijaya, S.T. (Ketua Panitia)",
                person2ExtraLabel: "Jabatan / Keterangan",
                person2ExtraPlaceholder: "Contoh: Ketua Panitia Halal Bihalal",
                person2PhotoLabel: "Upload Foto Panitia / Kegiatan (Opsional)",

                // Step 3
                step3Tab: "Panitia",
                step3Title: "Informasi Panitia & Penanggung Jawab",
                step3Desc: "Informasi penanggung jawab dan sekretariat acara silaturahmi.",
                family1Title: "Penasihat / Sesepuh Acara",
                family1FatherLabel: "Nama Sesepuh / Pembina 1",
                family1MotherLabel: "Nama Sesepuh / Pembina 2",
                family1CityLabel: "Kota Asal / Domisili",
                family2Title: "Sekretariat & Panitia Pelaksana",
                family2FatherLabel: "Nama Sekretaris Panitia",
                family2MotherLabel: "Nama Bendahara Panitia",
                family2CityLabel: "Kota Sekretariat",

                // Step 4
                event1Header: "🕌 Acara 1: Kajian Silaturahmi & Musafahah",
                event1Title: "Kajian Silaturahmi & Musafahah",
                event1VenuePlaceholder: "Contoh: Aula Gedung Serbaguna",
                event2Header: "🎉 Acara 2: Ramah Tamah & Santap Siang Bersama",
                event2Title: "Ramah Tamah & Santap Siang Bersama",
                event2VenuePlaceholder: "Contoh: Halaman Utama Gedung",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi para tamu yang ingin berpartisipasi atau mengirimkan tali asih silaturahmi.",
                step6Title: "Galeri Foto Silaturahmi & Musik",
                step6Desc: "Lengkapi undangan dengan dokumentasi silaturahmi kebersamaan dan alunan musik yang hangat.",
                galleryLabel: "Upload Foto Galeri (Dokumentasi Silaturahmi & Trah)",
                gallerySub: "Bisa pilih beberapa foto kebersamaan keluarga besar / komunitas",
                musicLabel: "Pilihan Musik Latar Silaturahmi (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Instrumental Silaturahmi Fitri (Alunan Hangat Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Gambus & Akustik Suci Idul Fitri' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Harmoni Damai Kekeluargaan' }
                ],
            },

            'Syukuran': {
                heading: "TASYAKURAN & SYUKURAN",
                quote: "لَئِنْ شَكَرْتُمْ لَأَزِيدَنَّكُمْ ۖ وَلَئِنْ كَفَرْتُمْ إِنَّ عَذَابِي لَشَدِيدٌ\n\"Sesungguhnya jika kamu bersyukur, pasti Kami akan menambah (nikmat) kepadamu.\" (QS. Ibrahim: 7)",
                slugPlaceholder: "syukuran-rumah-baru-bambang",
                step2Tab: "Tuan Rumah",
                step2Title: "Profil Tuan Rumah / Penyelenggara",
                step2Desc: "Masukkan nama pemilik hajat, keluarga yang bersyukur, atau pengurus acara.",
                showDisplayOrder: false,
                orderFirst: "Tuan Rumah Dulu",
                orderSecond: "Pendamping Dulu",

                // Tokoh 1
                person1Badge: "🏡 Tuan Rumah / Pemilik Hajat",
                person1NickLabel: "Nama Panggilan / Singkat Tuan Rumah *",
                person1NickPlaceholder: "Contoh: Bpk. Joko & Keluarga",
                person1FullLabel: "Nama Lengkap Tuan Rumah & Gelar *",
                person1FullPlaceholder: "Contoh: Ir. Joko Santoso & Dra. Sri Wahyuni",
                person1ExtraLabel: "Keterangan Hajat / Syukuran",
                person1ExtraPlaceholder: "Contoh: Tasyakuran Rumah Baru / Reuni Perak 25 Tahun",
                person1PhotoLabel: "Upload Foto Tuan Rumah / Rumah / Komunitas",

                // Tokoh 2
                person2Badge: "🤝 Pendamping / Perwakilan Acara (Opsional)",
                person2NickLabel: "Nama Singkat Pendamping",
                person2NickPlaceholder: "Contoh: Ibu Sri Wahyuni / Bpk. Andi",
                person2FullLabel: "Nama Lengkap Pendamping / Pasangan",
                person2FullPlaceholder: "Contoh: Dra. Sri Wahyuni (Istri) / Andi Pratama, S.E.",
                person2ExtraLabel: "Keterangan Hubungan",
                person2ExtraPlaceholder: "Contoh: Istri Tercinta / Koordinator Acara",
                person2PhotoLabel: "Upload Foto Pendamping (Opsional)",

                // Step 3
                step3Tab: "Keluarga",
                step3Title: "Informasi Keluarga & Tuan Rumah",
                step3Desc: "Informasi keluarga besar yang menyelenggarakan syukuran.",
                family1Title: "Keluarga Utama Tuan Rumah",
                family1FatherLabel: "Nama Kepala Keluarga / Ayah",
                family1MotherLabel: "Nama Ibu Rumah Tangga / Ibu",
                family1CityLabel: "Kota Domisili",
                family2Title: "Perwakilan Keluarga / Mitra",
                family2FatherLabel: "Nama Perwakilan 1",
                family2MotherLabel: "Nama Perwakilan 2",
                family2CityLabel: "Kota Domisili",

                // Step 4
                event1Header: "🏡 Acara 1: Doa Syukuran & Pembacaan Doa",
                event1Title: "Doa Syukuran & Pembacaan Doa",
                event1VenuePlaceholder: "Contoh: Kediaman Bpk. Joko Santoso",
                event2Header: "🎉 Acara 2: Ramah Tamah & Santap Bersama",
                event2Title: "Ramah Tamah & Santap Bersama",
                event2VenuePlaceholder: "Contoh: Kediaman Bpk. Joko Santoso",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi para tamu yang ingin mengirimkan kado atau tanda kasih syukuran.",
                step6Title: "Galeri Foto Syukuran & Musik",
                step6Desc: "Lengkapi undangan dengan dokumentasi momen syukuran dan alunan musik pengiring yang hangat.",
                galleryLabel: "Upload Foto Galeri (Dokumentasi Momen Syukuran)",
                gallerySub: "Bisa pilih beberapa foto kegiatan atau momen tasyakuran",
                musicLabel: "Pilihan Musik Latar Syukuran (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Instrumental Tasyakuran & Syukur (Alunan Harmonis Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Akustik Hangat Kebersamaan' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Piano Syahdu Tasyakuran' }
                ],
            },

            'Keagamaan': {
                heading: "UNDANGAN PENGAJIAN & SYIAR",
                quote: "مَنْ سَلَكَ طَرِيقًا يَلْتَمِسُ فِيهِ عِلْمًا سَهَّلَ اللَّهُ لَهُ بِهِ طَرِيقًا إِلَى الْجَنَّةِ\n\"Barangsiapa menempuh suatu jalan untuk mencari ilmu, maka Allah akan memudahkan baginya jalan menuju surga.\" (HR. Muslim)",
                slugPlaceholder: "pengajian-akbar-al-ikhlas",
                step2Tab: "Penyelenggara",
                step2Title: "Penyelenggara / Tuan Rumah Pengajian",
                step2Desc: "Masukkan nama tokoh tuan rumah, penceramah, atau perwakilan majelis taklim.",
                showDisplayOrder: false,
                orderFirst: "Tuan Rumah Dulu",
                orderSecond: "Panitia Dulu",

                // Tokoh 1
                person1Badge: "🕌 Penceramah / Tokoh Agama Utama",
                person1NickLabel: "Nama Singkat / Gelar *",
                person1NickPlaceholder: "Contoh: Ustadz H. Abdul Somad / Habib Novel",
                person1FullLabel: "Nama Lengkap & Gelar Ustadz / Tokoh *",
                person1FullPlaceholder: "Contoh: Ustadz Dr. H. M. Syafii, M.Ag.",
                person1ExtraLabel: "Keterangan Tokoh / Topik",
                person1ExtraPlaceholder: "Contoh: Pengasuh Ponpes / Penceramah Maulid Nabi",
                person1PhotoLabel: "Upload Foto Penceramah / Banner Acara",

                // Tokoh 2
                person2Badge: "👥 Tuan Rumah / Ketua Panitia",
                person2NickLabel: "Nama Ketua Panitia / Pengundang",
                person2NickPlaceholder: "Contoh: Bpk. H. Rahmat Hidayat",
                person2FullLabel: "Nama Lengkap Penyelenggara / Majelis",
                person2FullPlaceholder: "Contoh: Majelis Ta'lim Al-Ikhlas / DKM Masjid",
                person2ExtraLabel: "Keterangan",
                person2ExtraPlaceholder: "Contoh: Ketua DKM / Perwakilan Sohibul Hajat",
                person2PhotoLabel: "Upload Foto Masjid / Logo Majelis (Opsional)",

                // Step 3
                step3Tab: "Panitia",
                step3Title: "Informasi Majelis & Panitia Pelaksana",
                step3Desc: "Informasi penanggung jawab dan panitia pengajian.",
                family1Title: "Kepanitiaan / DKM",
                family1FatherLabel: "Nama Pembina Majelis",
                family1MotherLabel: "Nama Ketua Panitia",
                family1CityLabel: "Kota Domisili Majelis",
                family2Title: "Sekretariat & Hubungan Masyarakat",
                family2FatherLabel: "Nama Sekretaris Acara",
                family2MotherLabel: "Nama Narahubung / Humas",
                family2CityLabel: "Kota Sekretariat",

                // Step 4
                event1Header: "🕌 Acara 1: Tausiyah & Pengajian Inti",
                event1Title: "Tausiyah & Pengajian Akbar",
                event1VenuePlaceholder: "Contoh: Masjid Raya Baiturrahman",
                event2Header: "🎉 Acara 2: Doa Bersama & Santap Siang",
                event2Title: "Doa Bersama & Ramah Tamah",
                event2VenuePlaceholder: "Contoh: Halaman Utama Masjid",

                // Step 5 & 6
                step5Desc: "Fasilitasi sedekah jariyah, infak majelis, partisipasi konsumsi, atau tali asih silaturahmi.",
                step6Title: "Dokumentasi Syiar & Alunan Doa",
                step6Desc: "Lengkapi undangan dengan dokumentasi silaturahmi, foto kenangan, dan alunan doa syahdu.",
                galleryLabel: "Upload Foto Dokumentasi Kegiatan / Syiar",
                gallerySub: "Bisa pilih beberapa foto kebersamaan jamaah atau kegiatan majelis",
                musicLabel: "Pilihan Audio Pengiring Religi (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Alunan Sholawat & Dzikir Menenangkan (Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Instrumental Gambus Syahdu' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Harmoni Doa Khidmat' }
                ],
            },

            'Wisuda': {
                heading: "UNDANGAN WISUDA & KELULUSAN",
                quote: "Barangsiapa menempuh suatu jalan untuk menuntut ilmu, maka Allah akan memudahkan baginya jalan menuju surga. (HR. Muslim)\n\"Keberhasilan hari ini adalah buah dari ketekunan, doa orang tua, dan rahmat dari Allah SWT.\"",
                slugPlaceholder: "wisuda-sarjana-rizky",
                step2Tab: "Wisudawan",
                step2Title: "Profil Wisudawan / Wisudawati",
                step2Desc: "Masukkan data wisudawan yang merayakan kelulusan dan pendamping/orang tua tercinta.",
                showDisplayOrder: false,
                orderFirst: "Wisudawan Dulu",
                orderSecond: "Orang Tua Dulu",

                // Tokoh 1
                person1Badge: "🎓 Wisudawan / Wisudawati",
                person1NickLabel: "Nama Panggilan Wisudawan *",
                person1NickPlaceholder: "Contoh: Rizky",
                person1FullLabel: "Nama Lengkap & Gelar Kelulusan *",
                person1FullPlaceholder: "Contoh: Rizky Pratama, S.Kom. (Cumlaude)",
                person1ExtraLabel: "Program Studi & Universitas / Sekolah",
                person1ExtraPlaceholder: "Contoh: S1 Teknik Informatika - Universitas Indonesia",
                person1PhotoLabel: "Upload Foto Toga / Kelulusan",

                // Tokoh 2
                person2Badge: "👨‍👩‍👦 Orang Tua / Pendamping Wisuda",
                person2NickLabel: "Nama Singkat Orang Tua/Pendamping",
                person2NickPlaceholder: "Contoh: Bpk. Hendra & Ibu Ratna",
                person2FullLabel: "Nama Lengkap Orang Tua Tercinta",
                person2FullPlaceholder: "Contoh: Bpk. Hendra Pratama & Ibu Ratna Dewi",
                person2ExtraLabel: "Keterangan Hubungan",
                person2ExtraPlaceholder: "Contoh: Orang Tua Tercinta / Keluarga Besar",
                person2PhotoLabel: "Upload Foto Bersama Keluarga (Opsional)",

                // Step 3
                step3Tab: "Keluarga",
                step3Title: "Informasi Orang Tua & Keluarga Wisudawan",
                step3Desc: "Informasi keluarga yang menyelenggarakan syukuran kelulusan.",
                family1Title: "Keluarga Utama Wisudawan",
                family1FatherLabel: "Nama Ayah Wisudawan",
                family1MotherLabel: "Nama Ibu Wisudawan",
                family1CityLabel: "Kota Domisili Keluarga",
                family2Title: "Pendamping & Kerabat Dekat",
                family2FatherLabel: "Nama Kerabat / Saudara",
                family2MotherLabel: "Nama Pendamping / Sahabat",
                family2CityLabel: "Kota Domisili",

                // Step 4
                event1Header: "🎓 Acara 1: Prosesi Sidang Senat Terbuka / Wisuda",
                event1Title: "Prosesi Wisuda / Kelulusan",
                event1VenuePlaceholder: "Contoh: Balairung UI / Gedung Pertemuan",
                event2Header: "🎉 Acara 2: Syukuran Kelulusan & Ramah Tamah",
                event2Title: "Syukuran Kelulusan & Santap Bersama",
                event2VenuePlaceholder: "Contoh: Resto Grand Orchid / Rumah Keluarga",

                // Step 5 & 6
                step5Desc: "Berikan kemudahan bagi keluarga dan teman yang ingin mengirimkan hadiah / kado wisuda secara cashless.",
                step6Title: "Galeri Foto Wisuda & Musik",
                step6Desc: "Lengkapi undangan dengan dokumentasi wisuda, foto toga, dan alunan musik kenangan masa studi.",
                galleryLabel: "Upload Foto Wisuda & Momen Kelulusan",
                gallerySub: "Bisa pilih beberapa foto wisuda, foto toga, atau foto bersama sahabat & keluarga",
                musicLabel: "Pilihan Musik Latar Kelulusan (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Melodi Sukacita Kelulusan (Harmoni Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Akustik Semangat Masa Depan' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Piano Syukur Kelulusan' }
                ],
            },

            'Acara Formal': {
                heading: "UNDANGAN RESMI / FORMAL EVENT",
                quote: "Dengan hormat, kami mengundang Bapak/Ibu/Rekan-rekan sekalian untuk berkenan hadir dan berpartisipasi dalam agenda resmi ini.",
                slugPlaceholder: "grand-opening-dkarsa-hub",
                step2Tab: "Penyelenggara",
                step2Title: "Profil Penyelenggara & Tokoh Utama",
                step2Desc: "Masukkan data perusahaan/institusi pengundang dan penanggung jawab/pembicara acara.",
                showDisplayOrder: false,
                orderFirst: "Institusi Dulu",
                orderSecond: "Pembicara Dulu",

                // Tokoh 1
                person1Badge: "🏛️ Institusi / Perusahaan Penyelenggara",
                person1NickLabel: "Nama Brand / Singkat Perusahaan *",
                person1NickPlaceholder: "Contoh: PT D'Karsa Solusi Digital",
                person1FullLabel: "Nama Resmi Perusahaan / Komunitas *",
                person1FullPlaceholder: "Contoh: PT D'Karsa Solusi Digital Indonesia",
                person1ExtraLabel: "Bidang Usaha / Jenis Acara",
                person1ExtraPlaceholder: "Contoh: Teknologi Digital & Media Kreatif",
                person1PhotoLabel: "Upload Logo Perusahaan / Banner Acara",

                // Tokoh 2
                person2Badge: "🎤 Pembicara / Keynote Speaker / VIP (Opsional)",
                person2NickLabel: "Nama Singkat Tokoh / Keynote Speaker",
                person2NickPlaceholder: "Contoh: Bpk. Ridwan",
                person2FullLabel: "Nama Lengkap Tokoh & Gelar",
                person2FullPlaceholder: "Contoh: Ridwan Kamil, S.T., M.U.D. (Keynote Speaker)",
                person2ExtraLabel: "Jabatan / Keterangan Tokoh",
                person2ExtraPlaceholder: "Contoh: Direktur Utama / Keynote Speaker",
                person2PhotoLabel: "Upload Foto Pembicara / Poster (Opsional)",

                // Step 3
                step3Tab: "Panitia",
                step3Title: "Informasi Penyelenggara & Kontak Panitia",
                step3Desc: "Informasi panitia pelaksana dan narahubung resmi acara.",
                family1Title: "Kepanitiaan & Penanggung Jawab",
                family1FatherLabel: "Nama Ketua Panitia / Penyelenggara",
                family1MotherLabel: "Nama Sekretaris Panitia",
                family1CityLabel: "Kota Kantor / Sekretariat",
                family2Title: "Hubungan Masyarakat & Narahubung",
                family2FatherLabel: "Nama Humas / Contact Person 1",
                family2MotherLabel: "Nama Contact Person 2",
                family2CityLabel: "Nomor Narahubung / Info",

                // Step 4
                event1Header: "🏛️ Acara 1: Sesi Utama / Seminar / Grand Opening",
                event1Title: "Acara Peresmian & Keynote Session",
                event1VenuePlaceholder: "Contoh: Auditorium Utama Gedung Karsa Center",
                event2Header: "🤝 Acara 2: Ramah Tamah / Networking & Dinner",
                event2Title: "Networking Session & Ramah Tamah",
                event2VenuePlaceholder: "Contoh: Executive Lounge Lt. 5",

                // Step 5 & 6
                step5Desc: "Fasilitasi kemudahan untuk registrasi tiket, tanda partisipasi, atau hadiah mitra bisnis.",
                step6Title: "Dokumentasi Acara & Audio Pengiring",
                step6Desc: "Lengkapi undangan dengan foto pembicara, dokumentasi kegiatan, atau logo institusi & sponsor.",
                galleryLabel: "Upload Foto Dokumentasi Acara / Poster",
                gallerySub: "Bisa pilih beberapa foto kegiatan, foto venue, atau logo pendukung",
                musicLabel: "Pilihan Audio Pengiring Formal (Autoplay Audio)",
                musicOptions: [
                    { value: 'wedding-melody.wav', label: '♫ Instrumental Corporate Elegan (Audio Bawaan)' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3', label: '♫ Ambient Musik Elegan & Modern' },
                    { value: 'https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3', label: '♫ Harmoni Piano Formal & Tenang' }
                ],
            }
        };

        function updateCategoryTheme(cat, subCat = null) {
            let confKey = cat;

            // Sub-category sensitive branching
            if (cat === 'Aqiqah') {
                if (subCat && subCat.toLowerCase().includes('khitan')) {
                    confKey = 'Khitanan';
                } else {
                    confKey = 'Aqiqah';
                }
            } else if (cat === 'Keagamaan') {
                if (subCat && (subCat.toLowerCase().includes('tahlil') || subCat.toLowerCase().includes('doa bersama'))) {
                    confKey = 'Tahlilan';
                } else if (subCat && (subCat.toLowerCase().includes('halal') || subCat.toLowerCase().includes('silaturahmi'))) {
                    confKey = 'Halal Bihalal';
                } else if (subCat && (subCat.toLowerCase().includes('tasyakur') || subCat.toLowerCase().includes('syukuran'))) {
                    confKey = 'Syukuran';
                } else {
                    confKey = 'Keagamaan';
                }
            }

            const conf = categoryConfigs[confKey] || categoryConfigs[cat] || categoryConfigs['Pernikahan'];

            // 1. Heading & Quote in Step 1
            const heading = document.getElementById('eventHeadingInput');
            if (heading) {
                heading.placeholder = 'Contoh: ' + conf.heading;
                if (!heading.dataset.manualEdited) heading.value = '';
            }
            const quoteEl = document.getElementById('quoteInput');
            if (quoteEl) {
                quoteEl.placeholder = 'Contoh: ' + conf.quote;
                if (!quoteEl.dataset.manualEdited) quoteEl.value = '';
            }
            const slugInput = document.getElementById('slugInput');
            if (slugInput) slugInput.placeholder = 'Contoh: ' + conf.slugPlaceholder;

            // 2. Stepper Pills
            const stepPill2 = document.getElementById('stepPill2Text');
            if (stepPill2) stepPill2.textContent = conf.step2Tab;
            const stepPill3 = document.getElementById('stepPill3Text');
            if (stepPill3) stepPill3.textContent = conf.step3Tab;

            // 3. Step 2 Header
            const step2Title = document.getElementById('step2Title');
            if (step2Title) step2Title.textContent = conf.step2Title;
            const step2Desc = document.getElementById('step2Desc');
            if (step2Desc) step2Desc.textContent = conf.step2Desc;

            // 4. Urutan Tampil
            const displayOrderContainer = document.getElementById('displayOrderContainer');
            if (displayOrderContainer) {
                displayOrderContainer.style.display = conf.showDisplayOrder ? 'flex' : 'none';
            }
            const labelOrderFirst = document.getElementById('labelOrderFirst');
            if (labelOrderFirst) labelOrderFirst.textContent = conf.orderFirst;
            const labelOrderSecond = document.getElementById('labelOrderSecond');
            if (labelOrderSecond) labelOrderSecond.textContent = conf.orderSecond;

            // 5. Tokoh 1 (Groom / Yang Bersangkutan / Almarhum)
            const groomTitle = document.getElementById('labelGroomTitle');
            if (groomTitle) groomTitle.textContent = conf.person1Badge;
            const groomNick = document.getElementById('labelGroomNick');
            if (groomNick) groomNick.textContent = conf.person1NickLabel;
            const groomNickInput = document.getElementById('groomNameInput');
            if (groomNickInput) groomNickInput.placeholder = conf.person1NickPlaceholder;
            const groomFull = document.getElementById('labelGroomFull');
            if (groomFull) groomFull.textContent = conf.person1FullLabel;
            const groomFullInput = document.getElementById('groomFullNameInput');
            if (groomFullInput) groomFullInput.placeholder = conf.person1FullPlaceholder;
            const groomExtra = document.getElementById('labelGroomExtra');
            if (groomExtra) groomExtra.textContent = conf.person1ExtraLabel;
            const groomBirthOrderInput = document.getElementById('groomBirthOrderInput');
            if (groomBirthOrderInput) groomBirthOrderInput.placeholder = conf.person1ExtraPlaceholder;
            const groomPhoto = document.getElementById('labelGroomPhoto');
            if (groomPhoto) groomPhoto.textContent = conf.person1PhotoLabel;

            // 6. Tokoh 2 (Bride / Pendamping / Ahli Waris)
            const brideTitle = document.getElementById('labelBrideTitle');
            if (brideTitle) brideTitle.textContent = conf.person2Badge;
            const brideNick = document.getElementById('labelBrideNick');
            if (brideNick) brideNick.textContent = conf.person2NickLabel;
            const brideNickInput = document.getElementById('brideNameInput');
            if (brideNickInput) brideNickInput.placeholder = conf.person2NickPlaceholder;
            const brideFull = document.getElementById('labelBrideFull');
            if (brideFull) brideFull.textContent = conf.person2FullLabel;
            const brideFullInput = document.getElementById('brideFullNameInput');
            if (brideFullInput) brideFullInput.placeholder = conf.person2FullPlaceholder;
            const brideExtra = document.getElementById('labelBrideExtra');
            if (brideExtra) brideExtra.textContent = conf.person2ExtraLabel;
            const brideBirthOrderInput = document.getElementById('brideBirthOrderInput');
            if (brideBirthOrderInput) brideBirthOrderInput.placeholder = conf.person2ExtraPlaceholder;
            const bridePhoto = document.getElementById('labelBridePhoto');
            if (bridePhoto) bridePhoto.textContent = conf.person2PhotoLabel;

            // 7. Step 3 (Keluarga & Orang Tua)
            const step3Title = document.getElementById('step3Title');
            if (step3Title) step3Title.textContent = conf.step3Title;
            const step3Desc = document.getElementById('step3Desc');
            if (step3Desc) step3Desc.textContent = conf.step3Desc;
            const family1Title = document.getElementById('family1Title');
            if (family1Title) family1Title.textContent = conf.family1Title;
            const f1Father = document.getElementById('family1FatherLabel');
            if (f1Father) f1Father.textContent = conf.family1FatherLabel;
            const f1Mother = document.getElementById('family1MotherLabel');
            if (f1Mother) f1Mother.textContent = conf.family1MotherLabel;
            const f1City = document.getElementById('family1CityLabel');
            if (f1City) f1City.textContent = conf.family1CityLabel;

            const family2Title = document.getElementById('family2Title');
            if (family2Title) family2Title.textContent = conf.family2Title;
            const f2Father = document.getElementById('family2FatherLabel');
            if (f2Father) f2Father.textContent = conf.family2FatherLabel;
            const f2Mother = document.getElementById('family2MotherLabel');
            if (f2Mother) f2Mother.textContent = conf.family2MotherLabel;
            const f2City = document.getElementById('family2CityLabel');
            if (f2City) f2City.textContent = conf.family2CityLabel;

            // 8. Step 4 (Acara)
            const ev1Header = document.getElementById('event1HeaderTitle');
            if (ev1Header) ev1Header.textContent = conf.event1Header;
            const ev1Title = document.getElementById('event1TitleInput');
            if (ev1Title) {
                ev1Title.placeholder = 'Contoh: ' + conf.event1Title;
                if (!ev1Title.dataset.manualEdited) ev1Title.value = '';
            }
            const ev1Venue = document.getElementById('event1VenueInput');
            if (ev1Venue) ev1Venue.placeholder = conf.event1VenuePlaceholder;

            const ev2Header = document.getElementById('event2HeaderTitle');
            if (ev2Header) ev2Header.textContent = conf.event2Header;
            const ev2Title = document.getElementById('event2TitleInput');
            if (ev2Title) {
                ev2Title.placeholder = 'Contoh: ' + conf.event2Title;
                if (!ev2Title.dataset.manualEdited) ev2Title.value = '';
            }
            const ev2Venue = document.getElementById('event2VenueInput');
            if (ev2Venue) ev2Venue.placeholder = conf.event2VenuePlaceholder;

            // 9. Step 5 (Amplop Digital & Kado)
            const step5Desc = document.getElementById('step5Desc');
            if (step5Desc && conf.step5Desc) step5Desc.textContent = conf.step5Desc;

            // 10. Step 6 (Galeri & Musik)
            const step6Title = document.getElementById('step6Title');
            if (step6Title && conf.step6Title) step6Title.textContent = conf.step6Title;

            const step6Desc = document.getElementById('step6Desc');
            if (step6Desc && conf.step6Desc) step6Desc.textContent = conf.step6Desc;

            const galleryUploadLabel = document.getElementById('galleryUploadLabel');
            if (galleryUploadLabel && conf.galleryLabel) galleryUploadLabel.textContent = conf.galleryLabel;

            const galleryUploadSub = document.getElementById('galleryUploadSub');
            if (galleryUploadSub && conf.gallerySub) galleryUploadSub.textContent = conf.gallerySub;

            const musicSectionLabel = document.getElementById('musicSectionLabel');
            if (musicSectionLabel && conf.musicLabel) musicSectionLabel.textContent = conf.musicLabel;

            const musicSelect = document.getElementById('musicUrlSelect');
            if (musicSelect && conf.musicOptions && conf.musicOptions.length) {
                const curVal = musicSelect.value;
                musicSelect.innerHTML = '';
                conf.musicOptions.forEach((opt, idx) => {
                    const optEl = document.createElement('option');
                    optEl.value = opt.value;
                    optEl.textContent = opt.label;
                    if (opt.value === curVal || (!curVal && idx === 0)) {
                        optEl.selected = true;
                    }
                    musicSelect.appendChild(optEl);
                });
            }
        }

        // ========================================================
        // BAB & SUB-BAB CATEGORY SELECTION HANDLERS
        // ========================================================
        function onSelectCategoryChapter(catKey, subCat = null) {
            const chapter = categoryChaptersData[catKey];
            if (!chapter) return;

            // Update radio if not checked
            const radio = document.querySelector(`input[name="category"][value="${catKey}"]`);
            if (radio && !radio.checked) {
                radio.checked = true;
            }

            // Update Chapter Name Header display
            const chapterTitleEl = document.getElementById('subCatChapterNameDisplay');
            if (chapterTitleEl) {
                chapterTitleEl.textContent = chapter.title;
            }

            // Determine target sub-category
            const targetSub = subCat || chapter.default_sub || (chapter.sub_categories ? chapter.sub_categories[0] : '');

            // Populate Dropdown
            const selectEl = document.getElementById('subCategorySelect');
            if (selectEl && chapter.sub_categories) {
                selectEl.innerHTML = '';
                chapter.sub_categories.forEach(item => {
                    const opt = document.createElement('option');
                    opt.value = item;
                    opt.textContent = item;
                    if (item === targetSub) opt.selected = true;
                    selectEl.appendChild(opt);
                });
            }

            onSubCategoryChange(targetSub, false);
            updateCategoryTheme(catKey, targetSub);
        }

        function onSubCategoryChange(subCatVal, triggerThemeUpdate = true) {
            const hiddenInput = document.getElementById('hiddenSubCategoryInput');
            if (hiddenInput) hiddenInput.value = subCatVal;

            const selectEl = document.getElementById('subCategorySelect');
            if (selectEl && selectEl.value !== subCatVal) {
                selectEl.value = subCatVal;
            }

            const badge = document.getElementById('activeSubCatBadge');
            if (badge) {
                badge.textContent = '✓ ' + subCatVal;
            }

            if (triggerThemeUpdate) {
                const currentCat = document.querySelector('input[name="category"]:checked')?.value || 'Pernikahan';
                updateCategoryTheme(currentCat, subCatVal);
            }

            // Update Live preview display if element exists
            const prevSub = document.getElementById('prevSubCategoryDisplay');
            if (prevSub) {
                prevSub.textContent = subCatVal;
            }

            if (typeof updateLivePreviewContent === 'function') {
                updateLivePreviewContent();
            }
        }

        // Toggle Custom Request Box based on Package Selection
        function onPackageSelect(pkgVal) {
            const customBox = document.getElementById('customRequestBox');
            if (customBox) {
                if (pkgVal.toLowerCase().includes('kustom') || pkgVal.toLowerCase().includes('luxury')) {
                    customBox.classList.remove('hidden');
                } else {
                    customBox.classList.add('hidden');
                }
            }
        }

        // Live Single Image Preview & Sync
        function previewImageFile(input, targetImgId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const maxBytes = 5 * 1024 * 1024; // 5 MB
                if (file.size > maxBytes) {
                    const sizeMb = (file.size / (1024 * 1024)).toFixed(1);
                    alert(`Ukuran file foto terlalu besar (${sizeMb} MB).\n\nMaksimal ukuran file foto adalah 5 MB. Silakan pilih foto dengan ukuran yang lebih kecil atau kompres terlebih dahulu.`);
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const dataUrl = e.target.result;
                    const img = document.getElementById(targetImgId);
                    if (img) img.src = dataUrl;

                    let photoKey = null;
                    if (targetImgId.toLowerCase().includes('groom')) photoKey = 'groom';
                    else if (targetImgId.toLowerCase().includes('bride')) photoKey = 'bride';
                    else if (targetImgId.toLowerCase().includes('cover')) photoKey = 'cover';

                    if (photoKey) {
                        try {
                            sessionStorage.setItem('dkarsa_preview_' + photoKey + '_photo', dataUrl);
                        } catch(err) {
                            console.warn('Storage quota warning for preview photo', err);
                        }

                        // Sync with hidden base64 input for persistent form submission
                        const base64Input = document.getElementById(photoKey + 'PhotoBase64');
                        if (base64Input) base64Input.value = dataUrl;

                        // Send postMessage to live preview iframe for instant visual update
                        const iframe = document.getElementById('builderLivePreviewIframe');
                        if (iframe && iframe.contentWindow) {
                            iframe.contentWindow.postMessage({
                                type: 'UPDATE_PREVIEW_PHOTO',
                                target: photoKey,
                                photoUrl: dataUrl,
                                dataUrl: dataUrl
                            }, '*');
                        }
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetUploadedPhoto(type, inputId, previewImgId, fallbackUrl) {
            const input = document.getElementById(inputId);
            if (input) input.value = '';
            const img = document.getElementById(previewImgId);
            if (img) img.src = fallbackUrl;

            const base64Input = document.getElementById(type + 'PhotoBase64');
            if (base64Input) base64Input.value = '';

            try {
                sessionStorage.removeItem('dkarsa_preview_' + type + '_photo');
                localStorage.removeItem('dkarsa_preview_' + type + '_photo');
            } catch(e) {}

            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe && iframe.contentWindow) {
                iframe.contentWindow.postMessage({
                    type: 'RESET_PREVIEW_PHOTO',
                    target: type,
                    defaultUrl: fallbackUrl
                }, '*');
            }
            updateLivePreviewContent(false);
        }

        // ========================================================
        // DYNAMIC EVENTS MANAGEMENT (RANGKAIAN ACARA)
        // ========================================================
        function reindexEventCards() {
            const container = document.getElementById('eventsListContainer');
            if (!container) return;
            const cards = container.querySelectorAll('.event-card-item');

            cards.forEach((card, index) => {
                const num = index + 1;
                card.dataset.eventIndex = num;

                // Header title
                const headerLabel = card.querySelector('.event-header-label');
                if (headerLabel) {
                    const currentTitle = card.querySelector('.event-title-input')?.value.trim();
                    if (num === 1) {
                        headerLabel.textContent = `💍 Acara 1: ${currentTitle || 'Akad Nikah / Pemberkatan'}`;
                    } else if (num === 2) {
                        headerLabel.textContent = `🎉 Acara 2: ${currentTitle || 'Resepsi Pernikahan / Tasyakuran'}`;
                    } else {
                        headerLabel.textContent = `✨ Acara ${num}: ${currentTitle || 'Rangkaian Acara Tambahan'}`;
                    }
                }

                // Badge
                const badge = card.querySelector('.event-badge');
                if (badge) {
                    badge.textContent = (num === 1) ? 'Acara Utama' : `Acara ${num}`;
                }

                // Remove button
                const btnRemove = card.querySelector('.btn-remove-event');
                if (btnRemove) {
                    if (num === 1 && cards.length === 1) {
                        btnRemove.classList.add('hidden');
                    } else {
                        btnRemove.classList.remove('hidden');
                    }
                }
            });
        }

        function addNewEventCard(data = {}) {
            const container = document.getElementById('eventsListContainer');
            if (!container) return;
            const currentCount = container.querySelectorAll('.event-card-item').length;
            const nextIndex = currentCount + 1;

            const weddingDateVal = document.querySelector('input[name="wedding_date"]')?.value || '';
            const evDate = data.date || weddingDateVal;
            const evTitle = data.title || (nextIndex === 2 ? 'Resepsi Pernikahan' : `Rangkaian Acara ${nextIndex}`);
            const evStart = data.start_time || (nextIndex === 1 ? '08:00 WIB' : (nextIndex === 2 ? '11:00 WIB' : '19:00 WIB'));
            const evEnd = data.end_time || (nextIndex === 1 ? '10:00 WIB' : (nextIndex === 2 ? '14:00 WIB' : '21:00 WIB'));
            const evVenue = data.venue_name || '';
            const evMaps = data.maps_url || '';
            const evAddress = data.address || '';

            const card = document.createElement('div');
            card.className = 'event-card-item p-5 rounded-3xl bg-blush/60 border border-brand/20 space-y-4 relative transition-all animate-fadeIn';
            card.dataset.eventIndex = nextIndex;

            card.innerHTML = `
                <div class="flex items-center justify-between">
                    <b class="text-sm font-bold text-brand flex items-center gap-1.5">
                        <span class="event-header-label">✨ Acara ${nextIndex}: ${evTitle}</span>
                    </b>
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white text-ink2 border border-ink/15 event-badge">Acara ${nextIndex}</span>
                        <button type="button" onclick="removeEventCard(this)" class="btn-remove-event text-xs text-red-500 hover:text-red-700 font-semibold p-1 transition cursor-pointer" title="Hapus Acara Ini">
                            🗑️ Hapus
                        </button>
                    </div>
                </div>

                <div class="grid sm:grid-cols-3 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Nama Acara</label>
                        <input type="text" value="${evTitle}" placeholder="Contoh: Resepsi / Ramah Tamah / Syukuran"
                               class="event-title-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Tanggal Acara</label>
                        <input type="date" value="${evDate}"
                               class="event-date-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Waktu (Mulai - Selesai)</label>
                        <div class="flex items-center gap-1">
                            <input type="text" value="${evStart}" placeholder="11:00 WIB" class="event-start-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                            <span>-</span>
                            <input type="text" value="${evEnd}" placeholder="14:00 / Selesai" class="event-end-input w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                        </div>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Nama Tempat / Gedung</label>
                        <input type="text" value="${evVenue}" placeholder="Contoh: Gedung Serbaguna / Ballroom"
                               class="event-venue-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Tautan Google Maps</label>
                        <input type="url" value="${evMaps}" placeholder="Contoh: https://maps.app.goo.gl/..."
                               class="event-maps-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-ink2">Alamat Lengkap</label>
                    <input type="text" value="${evAddress}" placeholder="Contoh: Jl. TB Simatupang No. 12, Jakarta"
                           class="event-address-input w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                </div>
            `;

            // Attach change listeners
            card.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', () => {
                    const titleInput = card.querySelector('.event-title-input');
                    const headerLabel = card.querySelector('.event-header-label');
                    if (titleInput && headerLabel) {
                        headerLabel.textContent = `✨ Acara ${card.dataset.eventIndex}: ${titleInput.value || 'Acara Baru'}`;
                    }
                    syncEventsToFormAndPreview();
                });
            });

            container.appendChild(card);
            reindexEventCards();
            syncEventsToFormAndPreview();
        }

        function removeEventCard(btn) {
            const card = btn.closest('.event-card-item');
            if (!card) return;
            const container = document.getElementById('eventsListContainer');
            if (container && container.querySelectorAll('.event-card-item').length <= 1) {
                alert('Minimal harus ada 1 rangkaian acara.');
                return;
            }
            card.remove();
            reindexEventCards();
            syncEventsToFormAndPreview();
        }

        function syncEventsToFormAndPreview() {
            const container = document.getElementById('eventsListContainer');
            if (!container) return;
            const cards = container.querySelectorAll('.event-card-item');

            const hiddenContainer = document.getElementById('hiddenEventsInputsContainer');
            if (hiddenContainer) hiddenContainer.innerHTML = '';

            const eventsList = [];

            cards.forEach((card, idx) => {
                const title = card.querySelector('.event-title-input')?.value || '';
                const date = card.querySelector('.event-date-input')?.value || '';
                const start = card.querySelector('.event-start-input')?.value || '';
                const end = card.querySelector('.event-end-input')?.value || '';
                const venue = card.querySelector('.event-venue-input')?.value || '';
                const address = card.querySelector('.event-address-input')?.value || '';
                const maps = card.querySelector('.event-maps-input')?.value || '';

                eventsList.push({
                    title: title || `Acara ${idx + 1}`,
                    date: date,
                    start_time: start,
                    end_time: end,
                    venue_name: venue,
                    address: address,
                    maps_url: maps,
                    sort_order: idx + 1
                });

                // Generate hidden inputs for standard POST submission
                if (hiddenContainer) {
                    hiddenContainer.innerHTML += `
                        <input type="hidden" name="events[${idx}][title]" value="${title.replace(/"/g, '&quot;')}">
                        <input type="hidden" name="events[${idx}][date]" value="${date}">
                        <input type="hidden" name="events[${idx}][start_time]" value="${start.replace(/"/g, '&quot;')}">
                        <input type="hidden" name="events[${idx}][end_time]" value="${end.replace(/"/g, '&quot;')}">
                        <input type="hidden" name="events[${idx}][venue_name]" value="${venue.replace(/"/g, '&quot;')}">
                        <input type="hidden" name="events[${idx}][address]" value="${address.replace(/"/g, '&quot;')}">
                        <input type="hidden" name="events[${idx}][maps_url]" value="${maps.replace(/"/g, '&quot;')}">
                    `;
                }
            });

            // Sync with legacy event_1 and event_2 inputs if available
            if (eventsList.length > 0) {
                const ev1 = eventsList[0];
                const ev1TitleEl = document.getElementById('event1TitleInput');
                if (ev1TitleEl && ev1TitleEl !== cards[0].querySelector('.event-title-input')) ev1TitleEl.value = ev1.title;
            }
            if (eventsList.length > 1) {
                const ev2 = eventsList[1];
                const ev2TitleEl = document.getElementById('event2TitleInput');
                if (ev2TitleEl && ev2TitleEl !== cards[1].querySelector('.event-title-input')) ev2TitleEl.value = ev2.title;
            } else {
                const ev2TitleEl = document.getElementById('event2TitleInput');
                if (ev2TitleEl && !cards[1]) ev2TitleEl.value = '';
                const ev2VenueEl = document.getElementById('event2VenueInput');
                if (ev2VenueEl && !cards[1]) ev2VenueEl.value = '';
            }

            // PostMessage to live preview iframe for real-time instant rendering
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe && iframe.contentWindow) {
                iframe.contentWindow.postMessage({
                    type: 'UPDATE_PREVIEW_EVENTS',
                    events: eventsList
                }, '*');
            }

            // Trigger debounced query string preview refresh
            updateLivePreviewContent(false);
        }

        // Live Multiple Gallery Previews & Real-Time Sync
        function previewGalleryFiles(input) {
            const container = document.getElementById('galleryPreviews');
            if (!container) return;

            if (input.files && input.files.length > 0) {
                const files = Array.from(input.files);
                const maxBytes = 5 * 1024 * 1024; // 5 MB
                const oversizedFiles = files.filter(f => f.size > maxBytes);
                if (oversizedFiles.length > 0) {
                    const fileDetails = oversizedFiles.map(f => `• ${f.name} (${(f.size / (1024 * 1024)).toFixed(1)} MB)`).join('\n');
                    alert(`Ada foto galeri yang melebihi batas ukuran 5 MB:\n\n${fileDetails}\n\nMaksimal ukuran per file foto adalah 5 MB. Silakan pilih foto dengan ukuran yang lebih kecil atau kompres terlebih dahulu.`);
                    input.value = '';
                    return;
                }

                container.innerHTML = '';
                const dataUrls = [];
                let loadedCount = 0;

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const dataUrl = e.target.result;
                        dataUrls[index] = dataUrl;
                        loadedCount++;

                        const div = document.createElement('div');
                        div.className = 'aspect-square rounded-xl bg-white border border-ink/15 overflow-hidden shadow-sm relative group';
                        div.innerHTML = `<img src="${dataUrl}" class="w-full h-full object-cover">`;
                        container.appendChild(div);

                        if (loadedCount === files.length) {
                            const validUrls = dataUrls.filter(Boolean);
                            try {
                                sessionStorage.setItem('dkarsa_preview_gallery_photos', JSON.stringify(validUrls));
                            } catch(err) {
                                console.warn('Storage quota warning for gallery photos', err);
                            }

                            // Store in hidden base64 input for persistent form submission
                            const hiddenGal = document.getElementById('galleryPhotosBase64');
                            if (hiddenGal) hiddenGal.value = JSON.stringify(validUrls);

                            // Send postMessage to live preview iframe for instant visual update
                            const iframe = document.getElementById('builderLivePreviewIframe');
                            if (iframe && iframe.contentWindow) {
                                iframe.contentWindow.postMessage({
                                    type: 'UPDATE_PREVIEW_GALLERY',
                                    images: validUrls,
                                    photos: validUrls
                                }, '*');
                            }
                        }
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        function resetGalleryPhotos() {
            const input = document.querySelector('input[name="gallery_photos[]"]');
            if (input) input.value = '';
            const container = document.getElementById('galleryPreviews');
            if (container) container.innerHTML = '';
            const hiddenGal = document.getElementById('galleryPhotosBase64');
            if (hiddenGal) hiddenGal.value = '';

            try {
                sessionStorage.removeItem('dkarsa_preview_gallery_photos');
                localStorage.removeItem('dkarsa_preview_gallery_photos');
            } catch(e) {}

            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe && iframe.contentWindow) {
                iframe.contentWindow.postMessage({
                    type: 'RESET_PREVIEW_GALLERY'
                }, '*');
            }
        }

        // ========================================================
        // TEMPLATE SELECTION & LIVE PREVIEW CONTROLS
        // ========================================================
        const allTemplatesData = @json($allTemplates);
        let currentSelectedTheme = @json($selectedTheme) || 'Simple Minimalist Floral';
        let modalActiveCategory = 'semua';
        let modalActiveTier = 'semua';

        // Open Template Selection Modal
        function openTemplateModal() {
            const modal = document.getElementById('templateModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        // Close Template Selection Modal
        function closeTemplateModal() {
            const modal = document.getElementById('templateModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        // Filter modal by Category
        function filterModalCategory(cat, btn) {
            modalActiveCategory = cat;
            document.querySelectorAll('.modal-cat-chip').forEach(b => {
                b.classList.remove('bg-brand', 'text-white', 'shadow-sm');
                b.classList.add('bg-white', 'text-ink2');
            });
            if (btn) {
                btn.classList.add('bg-brand', 'text-white', 'shadow-sm');
                btn.classList.remove('bg-white', 'text-ink2');
            }
            applyModalFilters();
        }

        // Filter modal by Tier
        function filterModalTier(tier, btn) {
            modalActiveTier = tier;
            document.querySelectorAll('.modal-tier-chip').forEach(b => {
                b.classList.remove('bg-ink', 'text-white', 'shadow-sm');
            });
            if (btn) {
                btn.classList.add('bg-ink', 'text-white', 'shadow-sm');
            }
            applyModalFilters();
        }

        // Apply both filters to cards in modal
        function applyModalFilters() {
            const cards = document.querySelectorAll('.modal-template-card');
            const categoryGroups = {
                'keagamaan': ['keagamaan', 'tahlilan', 'halalbihalal', 'syukuran'],
                'aqiqah': ['aqiqah', 'khitanan'],
                'acara-formal': ['acara-formal', 'formal'],
                'formal': ['acara-formal', 'formal'],
                'pernikahan': ['pernikahan'],
                'ultah': ['ultah'],
                'wisuda': ['wisuda']
            };

            cards.forEach(card => {
                const cardCat = card.dataset.category || '';
                const cardEventCat = (card.dataset.eventcat || '').toLowerCase();
                const cardTier = card.dataset.tier || '';

                let matchCat = false;
                if (modalActiveCategory === 'semua' || cardCat === 'semua') {
                    matchCat = true;
                } else if (cardCat === modalActiveCategory) {
                    matchCat = true;
                } else if (categoryGroups[modalActiveCategory] && categoryGroups[modalActiveCategory].includes(cardCat)) {
                    matchCat = true;
                } else if (modalActiveCategory === 'acara-formal' && (cardCat === 'formal' || cardEventCat.includes('formal'))) {
                    matchCat = true;
                } else if (modalActiveCategory === 'keagamaan' && (cardEventCat.includes('keagamaan') || ['tahlilan', 'halalbihalal', 'syukuran', 'keagamaan'].includes(cardCat))) {
                    matchCat = true;
                } else if (modalActiveCategory === 'aqiqah' && (cardEventCat.includes('aqiqah') || ['aqiqah', 'khitanan'].includes(cardCat))) {
                    matchCat = true;
                }

                const matchTier = (modalActiveTier === 'semua') || (cardTier === modalActiveTier);

                if (matchCat && matchTier) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // Select a template
        function selectTemplate(tmplName, autoClose = true) {
            const tmpl = allTemplatesData.find(t => t.name === tmplName);
            if (!tmpl) return;

            currentSelectedTheme = tmpl.name;

            // If user hasn't uploaded files in current form session, ensure clean template default photos
            const hasGroomFile = (document.getElementById('groomPhotoInput')?.files?.length > 0) || !!document.getElementById('groomPhotoBase64')?.value;
            const hasBrideFile = (document.getElementById('bridePhotoInput')?.files?.length > 0) || !!document.getElementById('bridePhotoBase64')?.value;
            const hasCoverFile = (document.getElementById('coverPhotoInput')?.files?.length > 0) || !!document.getElementById('coverPhotoBase64')?.value;

            if (!hasGroomFile) {
                sessionStorage.removeItem('dkarsa_preview_groom_photo');
                localStorage.removeItem('dkarsa_preview_groom_photo');
                const b64G = document.getElementById('groomPhotoBase64');
                if (b64G) b64G.value = '';
                const gImg = document.getElementById('groomPreviewImg');
                if (gImg) gImg.src = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200';
            }
            if (!hasBrideFile) {
                sessionStorage.removeItem('dkarsa_preview_bride_photo');
                localStorage.removeItem('dkarsa_preview_bride_photo');
                const b64B = document.getElementById('bridePhotoBase64');
                if (b64B) b64B.value = '';
                const bImg = document.getElementById('bridePreviewImg');
                if (bImg) bImg.src = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200';
            }
            if (!hasCoverFile) {
                sessionStorage.removeItem('dkarsa_preview_cover_photo');
                localStorage.removeItem('dkarsa_preview_cover_photo');
                const b64C = document.getElementById('coverPhotoBase64');
                if (b64C) b64C.value = '';
                const cImg = document.getElementById('coverPreviewImg');
                if (cImg) cImg.src = tmpl.default_cover || tmpl.img;
            }

            // Synchronize Category Chapter & Sub-chapter if defined
            if (tmpl.category_label && typeof onSelectCategoryChapter === 'function') {
                const targetSub = tmpl.sub_category || null;
                onSelectCategoryChapter(tmpl.category_label, targetSub);
            }

            // Update hidden input
            const themeInput = document.getElementById('selectedThemeInput');
            if (themeInput) themeInput.value = tmpl.name;

            // Update Active Template Card in Step 1
            const cardImg = document.getElementById('activeTemplateImg');
            if (cardImg) cardImg.src = tmpl.img;
            const cardBadge = document.getElementById('activeTemplateBadge');
            if (cardBadge) cardBadge.textContent = tmpl.badge;
            const cardPrice = document.getElementById('activeTemplatePrice');
            if (cardPrice) cardPrice.textContent = tmpl.price;
            const cardTitle = document.getElementById('activeTemplateTitle');
            if (cardTitle) cardTitle.textContent = tmpl.name;
            const cardDesc = document.getElementById('activeTemplateDesc');
            if (cardDesc) cardDesc.textContent = tmpl.desc;

            // Synchronize matching Package Radio button in Step 1
            const pkgRadios = document.querySelectorAll('input[name="selected_package"]');
            pkgRadios.forEach(r => {
                if (r.value.includes(tmpl.tier.charAt(0).toUpperCase() + tmpl.tier.slice(1)) || 
                    (tmpl.tier === 'kustom' && r.value.includes('Kustom'))) {
                    r.checked = true;
                    onPackageSelect(r.value);
                }
            });

            // Update modal cards checkmark badge and selection buttons
            const cards = document.querySelectorAll('.modal-template-card');
            cards.forEach(card => {
                const isSelected = (card.dataset.name === tmpl.name);
                const checkBadge = card.querySelector('.template-check-badge');
                const selectBtn = card.querySelector('.btn-select-tmpl');

                if (isSelected) {
                    card.classList.add('border-brand', 'ring-2', 'ring-brand/30');
                    card.classList.remove('border-ink/10');
                    if (checkBadge) checkBadge.classList.replace('scale-0', 'scale-100');
                    if (selectBtn) {
                        selectBtn.classList.add('bg-brand', 'text-white');
                        selectBtn.classList.remove('bg-sunk/60', 'text-ink2');
                        selectBtn.textContent = '✓ Terpilih';
                    }
                } else {
                    card.classList.remove('border-brand', 'ring-2', 'ring-brand/30');
                    card.classList.add('border-ink/10');
                    if (checkBadge) checkBadge.classList.replace('scale-100', 'scale-0');
                    if (selectBtn) {
                        selectBtn.classList.remove('bg-brand', 'text-white');
                        selectBtn.classList.add('bg-sunk/60', 'text-ink2');
                        selectBtn.textContent = 'Pilih Template';
                    }
                }
            });

            const prevThemeLabel = document.getElementById('prevCurrentThemeLabel');
            if (prevThemeLabel) prevThemeLabel.textContent = 'Tema: ' + tmpl.name;

            // Trigger immediate preview iframe refresh with current form data
            updateLivePreviewContent(true);

            if (autoClose) {
                closeTemplateModal();
            }
        }

        // ========================================================
        // CANONICAL TEMPLATE RESOLVER & LIVE PREVIEW CONTROLS
        // ========================================================
        function getCanonicalTemplateKey(themeName) {
            const tmpl = allTemplatesData.find(t => t.name === themeName);
            if (tmpl && tmpl.template_key) {
                return tmpl.template_key;
            }
            const s = (themeName || '').toLowerCase();
            if (s.includes('batak') || s.includes('ulos') || s.includes('gorga')) return 'batak-heritage';
            if (s.includes('javanese') || s.includes('royal') || s.includes('keraton') || s.includes('jawa') || s.includes('adat')) return 'javanese-royal';
            if (s.includes('chibi') || s.includes('oriental') || s.includes('chinese')) return 'chibi-red';
            if (s.includes('wildflower') || s.includes('rose') || s.includes('pink')) return 'wildflower-pink';
            if (s.includes('wisuda') || s.includes('sarjana') || s.includes('kelulusan')) return 'wisuda-sarjana';
            if (s.includes('walimatul') || s.includes('khitan') || s.includes('sunat')) return 'walimatul-khitan';
            if (s.includes('halal') || s.includes('silaturahmi') || s.includes('ketupat')) return 'halal-bihalal';
            if (s.includes('syukuran-rumah') || s.includes('rumah baru') || s.includes('kediaman') || s.includes('tasyakuran rumah')) return 'syukuran-rumah';
            if (s.includes('tahlil') || s.includes('doa bersama') || s.includes('haul')) return 'tahlilan-khusyuk';
            if (s.includes('kids') || s.includes('anak') || s.includes('balon')) return 'kids-birthday';
            if (s.includes('golden') || s.includes('birthday') || s.includes('milad') || s.includes('ultah') || s.includes('ulang')) return 'golden-birthday';
            if (s.includes('baby') || s.includes('aqiqah') || s.includes('tasmiyah')) return 'baby-aqiqah';
            if (s.includes('snowfall') || s.includes('snow')) return 'snowfall-white';
            if (s.includes('minimalist') || s.includes('floral') || s.includes('editorial') || s.includes('basic')) return 'minimalist-floral';

            // Check selected category for non-wedding events
            const selectedCatVal = (document.querySelector('input[name="category"]:checked')?.value || 'Pernikahan').toLowerCase();
            if (selectedCatVal.includes('wisuda')) return 'wisuda-sarjana';
            if (selectedCatVal.includes('khitan')) return 'walimatul-khitan';
            if (selectedCatVal.includes('keagamaan')) return 'tahlilan-khusyuk';
            if (selectedCatVal.includes('ulang') || selectedCatVal.includes('ultah') || selectedCatVal.includes('birthday')) return 'golden-birthday';
            if (selectedCatVal.includes('aqiqah')) return 'baby-aqiqah';
            if (selectedCatVal.includes('formal') || selectedCatVal.includes('bisnis')) return 'formal-corporate';

            return 'chibi-red';
        }

        let previewDebounceTimer = null;

        // Build URLSearchParams from current builder form state
        function getLivePreviewParams() {
            const params = new URLSearchParams();
            params.set('preview', '1');

            const selectedCatVal = document.querySelector('input[name="category"]:checked')?.value || 'Pernikahan';
            const subCatVal = document.getElementById('hiddenSubCategoryInput')?.value || '';
            const headingVal = document.getElementById('eventHeadingInput')?.value || '';
            const weddingDateVal = document.querySelector('input[name="wedding_date"]')?.value || '';
            const quoteVal = document.getElementById('quoteInput')?.value || '';

            const groomNick = document.getElementById('groomNameInput')?.value || '';
            const groomFull = document.getElementById('groomFullNameInput')?.value || '';
            const groomOrder = document.getElementById('groomBirthOrderInput')?.value || '';
            const groomFather = document.querySelector('input[name="groom_father"]')?.value || '';
            const groomMother = document.querySelector('input[name="groom_mother"]')?.value || '';
            const groomCity = document.querySelector('input[name="groom_city"]')?.value || '';

            const brideNick = document.getElementById('brideNameInput')?.value || '';
            const brideFull = document.getElementById('brideFullNameInput')?.value || '';
            const brideOrder = document.getElementById('brideBirthOrderInput')?.value || '';
            const brideFather = document.querySelector('input[name="bride_father"]')?.value || '';
            const brideMother = document.querySelector('input[name="bride_mother"]')?.value || '';
            const brideCity = document.querySelector('input[name="bride_city"]')?.value || '';

            // Collect all events from dynamic event cards
            const events = [];
            const container = document.getElementById('eventsListContainer');
            if (container) {
                container.querySelectorAll('.event-card-item').forEach((card, idx) => {
                    const title = card.querySelector('.event-title-input')?.value || '';
                    const date = card.querySelector('.event-date-input')?.value || '';
                    const start = card.querySelector('.event-start-input')?.value || '';
                    const end = card.querySelector('.event-end-input')?.value || '';
                    const venue = card.querySelector('.event-venue-input')?.value || '';
                    const address = card.querySelector('.event-address-input')?.value || '';
                    const maps = card.querySelector('.event-maps-input')?.value || '';

                    if (title || venue || address) {
                        events.push({
                            title: title || `Acara ${idx + 1}`,
                            date: date || weddingDateVal,
                            start_time: start,
                            end_time: end,
                            venue_name: venue,
                            address: address,
                            maps_url: maps,
                            sort_order: idx + 1
                        });
                    }
                });
            }

            const bankName1 = document.querySelector('input[name="bank_name_1"]')?.value || '';
            const bankAcc1 = document.querySelector('input[name="bank_account_1"]')?.value || '';
            const bankHolder1 = document.querySelector('input[name="bank_holder_1"]')?.value || '';

            const bankName2 = document.querySelector('input[name="bank_name_2"]')?.value || '';
            const bankAcc2 = document.querySelector('input[name="bank_account_2"]')?.value || '';
            const bankHolder2 = document.querySelector('input[name="bank_holder_2"]')?.value || '';

            const giftAddress = document.querySelector('textarea[name="gift_address"]')?.value || '';

            if (selectedCatVal) params.set('category', selectedCatVal);
            if (subCatVal) params.set('sub_category', subCatVal);
            if (headingVal) params.set('event_heading', headingVal);
            if (weddingDateVal) params.set('wedding_date', weddingDateVal);
            if (quoteVal) params.set('quote', quoteVal);

            if (groomNick) params.set('groom_name', groomNick);
            if (groomFull) params.set('groom_fullname', groomFull);
            if (groomOrder) params.set('groom_birth_order', groomOrder);
            if (groomFather) params.set('groom_father', groomFather);
            if (groomMother) params.set('groom_mother', groomMother);
            if (groomCity) params.set('groom_city', groomCity);

            if (brideNick) params.set('bride_name', brideNick);
            if (brideFull) params.set('bride_fullname', brideFull);
            if (brideOrder) params.set('bride_birth_order', brideOrder);
            if (brideFather) params.set('bride_father', brideFather);
            if (brideMother) params.set('bride_mother', brideMother);
            if (brideCity) params.set('bride_city', brideCity);

            if (events.length > 0) {
                params.set('events_json', JSON.stringify(events));

                // Legacy parameters sync for backward compatibility
                params.set('event_1_title', events[0].title);
                if (events[0].date) params.set('event_1_date', events[0].date);
                if (events[0].start_time) params.set('event_1_start_time', events[0].start_time);
                if (events[0].end_time) params.set('event_1_end_time', events[0].end_time);
                if (events[0].venue_name) params.set('event_1_venue', events[0].venue_name);
                if (events[0].address) params.set('event_1_address', events[0].address);
                if (events[0].maps_url) params.set('event_1_maps_url', events[0].maps_url);

                if (events.length > 1) {
                    params.set('event_2_title', events[1].title);
                    if (events[1].date) params.set('event_2_date', events[1].date);
                    if (events[1].start_time) params.set('event_2_start_time', events[1].start_time);
                    if (events[1].end_time) params.set('event_2_end_time', events[1].end_time);
                    if (events[1].venue_name) params.set('event_2_venue', events[1].venue_name);
                    if (events[1].address) params.set('event_2_address', events[1].address);
                    if (events[1].maps_url) params.set('event_2_maps_url', events[1].maps_url);
                }
            }

            if (bankName1) params.set('bank_name_1', bankName1);
            if (bankAcc1) params.set('bank_account_1', bankAcc1);
            if (bankHolder1) params.set('bank_holder_1', bankHolder1);

            if (bankName2) params.set('bank_name_2', bankName2);
            if (bankAcc2) params.set('bank_account_2', bankAcc2);
            if (bankHolder2) params.set('bank_holder_2', bankHolder2);

            if (giftAddress) params.set('gift_address', giftAddress);

            if (previewGuestTestName) {
                params.set('to', previewGuestTestName);
            }

            return params;
        }

        let previewGuestTestName = '';
        function onPreviewGuestNameChange(val) {
            previewGuestTestName = val ? val.trim() : '';
            updateLivePreviewContent(false);
        }

        function updateLivePreviewContent(immediate = false) {
            if (previewDebounceTimer) {
                clearTimeout(previewDebounceTimer);
            }

            const executeUpdate = () => {
                const canonicalKey = getCanonicalTemplateKey(currentSelectedTheme);
                const params = getLivePreviewParams();
                const targetUrl = `/demo/${canonicalKey}?${params.toString()}`;

                const iframe = document.getElementById('builderLivePreviewIframe');
                if (iframe) {
                    const currentSrc = iframe.getAttribute('src');
                    if (currentSrc !== targetUrl) {
                        iframe.src = targetUrl;
                    }
                }

                const btnFs = document.getElementById('btnBuilderFullscreenDemo');
                if (btnFs) {
                    btnFs.href = targetUrl;
                }

                const label = document.getElementById('prevCurrentThemeLabel');
                if (label) {
                    label.textContent = 'Tema: ' + currentSelectedTheme;
                }
            };

            if (immediate) {
                executeUpdate();
            } else {
                previewDebounceTimer = setTimeout(executeUpdate, 350);
            }
        }

        let isCleanDemoMode = false;

        // Preview a specific template from within the modal (clean authentic demo)
        function previewSpecificTemplate(tmplName) {
            const tmpl = allTemplatesData.find(t => t.name === tmplName);
            const key = tmpl ? (tmpl.template_key || getCanonicalTemplateKey(tmpl.name)) : getCanonicalTemplateKey(tmplName);
            openPreviewModal(true, tmpl ? tmpl.name : tmplName, key);
        }

        // Open Template Modal from Preview
        function openTemplateModalFromPreview() {
            closePreviewModal();
            openTemplateModal();
        }

        // Open Live Preview Modal
        function openPreviewModal(cleanDemo = false, customThemeName = null, customKey = null) {
            isCleanDemoMode = !!cleanDemo;
            const themeToUse = customThemeName || currentSelectedTheme;
            const canonicalKey = customKey || getCanonicalTemplateKey(themeToUse);

            const iframe = document.getElementById('builderLivePreviewIframe');
            const label = document.getElementById('prevCurrentThemeLabel');
            const btnFs = document.getElementById('btnBuilderFullscreenDemo');
            const btnUseThis = document.getElementById('btnUseTemplateFromPreview');

            if (cleanDemo) {
                const targetUrl = `/demo/${canonicalKey}`;
                if (iframe && iframe.getAttribute('src') !== targetUrl) {
                    iframe.src = targetUrl;
                }
                if (btnFs) btnFs.href = targetUrl;
                if (label) label.textContent = 'Tema: ' + themeToUse + ' (Bawaan Default Template)';
                if (btnUseThis) {
                    btnUseThis.classList.remove('hidden');
                    btnUseThis.onclick = function() {
                        selectTemplate(themeToUse, true);
                        closePreviewModal();
                    };
                }
            } else {
                updateLivePreviewContent(true);
                if (btnUseThis) btnUseThis.classList.add('hidden');
            }

            const modal = document.getElementById('livePreviewModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        // Close Live Preview Modal
        function closePreviewModal() {
            isCleanDemoMode = false;
            const modal = document.getElementById('livePreviewModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        // Reset all builder form inputs, uploaded photos, and preview to template defaults
        function resetFormToTemplateDefaults() {
            if (!confirm('Kembalikan semua isian formulir dan foto ke data bawaan default template?')) return;

            // 1. Purge all preview keys from sessionStorage and localStorage
            ['groom_photo', 'bride_photo', 'cover_photo', 'gallery_photos', 'groom_father', 'groom_mother', 'bride_father', 'bride_mother'].forEach(k => {
                sessionStorage.removeItem('dkarsa_preview_' + k);
                localStorage.removeItem('dkarsa_preview_' + k);
            });

            // 2. Clear photo file inputs and base64 fields
            ['groom', 'bride', 'cover'].forEach(type => {
                const fileInput = document.getElementById(type + 'PhotoInput');
                if (fileInput) fileInput.value = '';
                const base64Input = document.getElementById(type + 'PhotoBase64');
                if (base64Input) base64Input.value = '';
            });
            const galFileInput = document.getElementById('galleryPhotosInput');
            if (galFileInput) galFileInput.value = '';
            const galBase64 = document.getElementById('galleryPhotosBase64');
            if (galBase64) galBase64.value = '';
            const galContainer = document.getElementById('galleryPreviews');
            if (galContainer) galContainer.innerHTML = '';

            // 3. Reset thumbnails to default template photos
            const tmpl = allTemplatesData.find(t => t.name === currentSelectedTheme) || allTemplatesData[0];
            const defaultCover = tmpl?.default_cover || tmpl?.img || 'https://images.unsplash.com/photo-1519741497674-611481863552?w=400';
            const defaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200';
            const defaultBride = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200';

            const groomImg = document.getElementById('groomPreviewImg');
            if (groomImg) groomImg.src = defaultGroom;
            const brideImg = document.getElementById('bridePreviewImg');
            if (brideImg) brideImg.src = defaultBride;
            const coverImg = document.getElementById('coverPreviewImg');
            if (coverImg) coverImg.src = defaultCover;

            // 4. Clear text inputs
            ['groomNameInput', 'groomFullNameInput', 'groomBirthOrderInput', 'groomFatherInput', 'groomMotherInput', 'groomCityInput',
             'brideNameInput', 'brideFullNameInput', 'brideBirthOrderInput', 'brideFatherInput', 'brideMotherInput', 'brideCityInput',
             'eventHeadingInput', 'quoteInput', 'slugInput'].forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = '';
                    delete el.dataset.manualEdited;
                }
            });
            const dateInput = document.querySelector('input[name="wedding_date"]');
            if (dateInput) dateInput.value = '';

            const guestTestInp = document.getElementById('previewGuestNameTestInput');
            if (guestTestInp) guestTestInp.value = '';
            previewGuestTestName = '';

            // 5. Update live preview iframe to clean default
            updateLivePreviewContent(true);
        }

        // Device toggle inside Preview Modal (380px vs 480px)
        function setPreviewDevice(width) {
            const chassis = document.getElementById('phoneChassis');
            const btnMob = document.getElementById('btnDeviceMobile');
            const btnWide = document.getElementById('btnDeviceWide');

            if (chassis) {
                chassis.style.maxWidth = width + 'px';
            }
            if (width === 380) {
                btnMob?.classList.add('bg-brand', 'text-white');
                btnMob?.classList.remove('text-white/70');
                btnWide?.classList.remove('bg-brand', 'text-white');
                btnWide?.classList.add('text-white/70');
            } else {
                btnWide?.classList.add('bg-brand', 'text-white');
                btnWide?.classList.remove('text-white/70');
                btnMob?.classList.remove('bg-brand', 'text-white');
                btnMob?.classList.add('text-white/70');
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', () => {
            ['eventHeadingInput', 'quoteInput', 'event1TitleInput', 'event2TitleInput'].forEach(id => {
                const el = document.getElementById(id);
                if (el && el.value.trim() !== '') {
                    el.dataset.manualEdited = "true";
                }
                el?.addEventListener('input', function() {
                    this.dataset.manualEdited = "true";
                });
            });

            // Clean any stale local storage from past sessions on initial load
            try {
                const hasFormErrors = @json(isset($errors) && $errors->any());
                if (!hasFormErrors) {
                    ['groom_photo', 'bride_photo', 'cover_photo', 'gallery_photos', 'groom_father', 'groom_mother', 'bride_father', 'bride_mother'].forEach(k => {
                        localStorage.removeItem('dkarsa_preview_' + k);
                        sessionStorage.removeItem('dkarsa_preview_' + k);
                    });
                }
            } catch(e) {}

            function sendLatestPreviewDataToIframe() {
                if (isCleanDemoMode) return;
                const iframe = document.getElementById('builderLivePreviewIframe');
                if (!iframe || !iframe.contentWindow) return;

                try {
                    const groomBase64 = document.getElementById('groomPhotoBase64')?.value;
                    if (groomBase64) {
                        iframe.contentWindow.postMessage({ type: 'UPDATE_PREVIEW_PHOTO', target: 'groom', photoUrl: groomBase64, dataUrl: groomBase64 }, '*');
                    }
                    const brideBase64 = document.getElementById('bridePhotoBase64')?.value;
                    if (brideBase64) {
                        iframe.contentWindow.postMessage({ type: 'UPDATE_PREVIEW_PHOTO', target: 'bride', photoUrl: brideBase64, dataUrl: brideBase64 }, '*');
                    }
                    const coverBase64 = document.getElementById('coverPhotoBase64')?.value;
                    if (coverBase64) {
                        iframe.contentWindow.postMessage({ type: 'UPDATE_PREVIEW_PHOTO', target: 'cover', photoUrl: coverBase64, dataUrl: coverBase64 }, '*');
                    }
                    const galleryBase64 = document.getElementById('galleryPhotosBase64')?.value;
                    if (galleryBase64) {
                        try {
                            const parsedGal = JSON.parse(galleryBase64);
                            if (Array.isArray(parsedGal) && parsedGal.length > 0) {
                                iframe.contentWindow.postMessage({ type: 'UPDATE_PREVIEW_GALLERY', images: parsedGal, photos: parsedGal }, '*');
                            }
                        } catch(e) {}
                    }
                } catch(e) {}

                syncEventsToFormAndPreview();
                syncParentsToPreview();
            }

            // Setup iframe load listener and handshake listener to post latest photos, gallery, and dynamic events
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe) {
                iframe.addEventListener('load', sendLatestPreviewDataToIframe);
            }

            window.addEventListener('message', (event) => {
                if (event.data && event.data.type === 'PREVIEW_IFRAME_READY') {
                    sendLatestPreviewDataToIframe();
                }
            });

            function formatParentsHelper(father, mother) {
                father = (father || '').trim();
                mother = (mother || '').trim();
                if (!father && !mother) return '';
                const fPref = father ? (father.match(/^(bpk|bapak|ayah|alm|almarhum|dr|drs|ir|prof|h\.)/i) ? father : 'Bpk. ' + father) : '';
                const mPref = mother ? (mother.match(/^(ibu|bunda|mama|umi|almh|almarhumah|dra|dr|ir|prof|hj\.)/i) ? mother : 'Ibu ' + mother) : '';
                if (fPref && mPref) return fPref + ' & ' + mPref;
                return fPref || mPref;
            }

            function syncParentsToPreview() {
                if (isCleanDemoMode) return;

                const gf = document.querySelector('input[name="groom_father"]')?.value?.trim() || '';
                const gm = document.querySelector('input[name="groom_mother"]')?.value?.trim() || '';
                const bf = document.querySelector('input[name="bride_father"]')?.value?.trim() || '';
                const bm = document.querySelector('input[name="bride_mother"]')?.value?.trim() || '';

                const gp = formatParentsHelper(gf, gm);
                const bp = formatParentsHelper(bf, bm);

                const iframe = document.getElementById('builderLivePreviewIframe');
                if (iframe && iframe.contentWindow) {
                    iframe.contentWindow.postMessage({
                        type: 'UPDATE_PREVIEW_PARENTS',
                        groomParents: gp,
                        brideParents: bp,
                        formatted: gp || bp,
                        resetDefault: (!gp && !bp)
                    }, '*');
                }
            }

            // Bind real-time input listeners to parents fields without prefilling old stale test data
            ['groom_father', 'groom_mother', 'bride_father', 'bride_mother'].forEach(field => {
                const input = document.querySelector(`input[name="${field}"]`);
                if (input) {
                    input.addEventListener('input', () => {
                        syncParentsToPreview();
                    });
                }
            });

            // Attach input listeners to event cards
            document.querySelectorAll('.event-card-item input').forEach(input => {
                input.addEventListener('input', () => {
                    const card = input.closest('.event-card-item');
                    if (card) {
                        const titleInput = card.querySelector('.event-title-input');
                        const headerLabel = card.querySelector('.event-header-label');
                        if (titleInput && headerLabel) {
                            const idx = card.dataset.eventIndex;
                            const icon = idx == 1 ? '💍' : (idx == 2 ? '🎉' : '✨');
                            headerLabel.textContent = `${icon} Acara ${idx}: ${titleInput.value || 'Acara Baru'}`;
                        }
                    }
                    syncEventsToFormAndPreview();
                });
            });

            const initialCat = @json($selectedCat) || 'Pernikahan';
            const initialSubCat = @json($selectedSubCat) || '';
            onSelectCategoryChapter(initialCat, initialSubCat);

            // Connect form live-binding listeners
            const form = document.getElementById('invitationBuilderForm');
            if (form) {
                form.addEventListener('input', () => updateLivePreviewContent(false));
                form.addEventListener('change', () => updateLivePreviewContent(false));
            }

            syncEventsToFormAndPreview();
            updateLivePreviewContent(true);
        });
    </script>
</body>
</html>
