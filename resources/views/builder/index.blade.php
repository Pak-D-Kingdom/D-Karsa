<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Undangan Digital Sendiri | D'Karsa Builder</title>
    <meta name="description" content="Buat undangan pernikahan, khitanan, dan acara digital secara mandiri, cepat, dan mudah dengan D'Karsa.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
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
        .step-panel { display: none; }
        .step-panel.active { display: block; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .step-pill.active { background-color: #f63854; color: #ffffff; border-color: #f63854; box-shadow: 0 4px 12px rgba(246, 56, 84, 0.25); }
        .step-pill.completed { background-color: #fdf4f5; color: #cf2445; border-color: #f63854; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased">

    {{-- TOP NAVBAR --}}
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-ink/10 py-3.5 px-4 sm:px-8">
        <div class="max-w-5xl mx-auto flex items-center justify-between gap-4">
            <a href="{{ route('invitation.index') }}" class="flex items-center gap-2.5 group">
                <span class="w-9 h-9 rounded-full bg-brand text-white font-serif font-bold text-base grid place-items-center shadow-md group-hover:scale-105 transition">
                    DK
                </span>
                <div>
                    <b class="text-sm sm:text-base font-serif font-bold text-ink group-hover:text-brand transition block leading-tight">D'Karsa</b>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-ink3 block">Invitation Builder</span>
                </div>
            </a>

            <div class="flex items-center gap-2">
                <a href="{{ route('invitation.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold text-ink2 hover:text-brand hover:bg-sunk transition flex items-center gap-1.5 border border-ink/10">
                    <span>←</span> Beranda
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
        @if ($errors->any())
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
            $catMap = [
                'pernikahan'   => 'Pernikahan',
                'tahlilan'     => 'Tahlilan',
                'tahlil'       => 'Tahlilan',
                'doa bersama'  => 'Tahlilan',
                'haul'         => 'Tahlilan',
                'halalbihalal' => 'Halal Bihalal',
                'halal bihalal'=> 'Halal Bihalal',
                'khitanan'     => 'Khitanan',
                'khitan'       => 'Khitanan',
                'aqiqah'       => 'Aqiqah',
                'akikah'       => 'Aqiqah',
                'ultah'        => 'Ulang Tahun',
                'ulang tahun'  => 'Ulang Tahun',
                'syukuran'     => 'Syukuran',
            ];
            $selectedCat = $catMap[strtolower(trim($rawCat))] ?? ($rawCat ?: 'Pernikahan');
            $selectedTheme = request('theme');
            $selectedPackage = request('package');
        @endphp

        @if($selectedTheme || $selectedPackage)
            <div class="mb-6 p-4 rounded-2xl bg-brand/10 border border-brand/20 flex flex-wrap items-center justify-between gap-3 shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✨</span>
                    <div>
                        <b class="text-xs font-bold text-ink block">Pilihan Desain / Paket Terpilih</b>
                        <span class="text-xs text-brand font-semibold">
                            {{ $selectedTheme ? 'Tema: ' . $selectedTheme : '' }}
                            {{ $selectedTheme && $selectedPackage ? ' • ' : '' }}
                            {{ $selectedPackage ? $selectedPackage : '' }}
                        </span>
                    </div>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-brand text-white shadow-sm">
                    Tersambung Otomatis
                </span>
            </div>
        @endif

        {{-- BUILDER FORM --}}
        <form action="{{ route('invitation.store') }}" method="POST" enctype="multipart/form-data" id="invitationBuilderForm" class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-brand/15">
            @csrf
            <input type="hidden" name="selected_theme" value="{{ $selectedTheme }}">
            <input type="hidden" name="selected_package" value="{{ $selectedPackage }}">

            {{-- ========================================================
                 LANGKAH 1: KATEGORI & INFO UTAMA
            ======================================================== --}}
            <div id="stepPanel1" class="step-panel active space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 1</span>
                    <h2 class="font-serif text-2xl font-bold text-ink">Kategori Acara &amp; Sampul</h2>
                    <p class="text-xs text-ink2 mt-1">Pilih jenis perayaan dan kata pembuka yang akan tampil di bagian depan undangan.</p>
                </div>

                {{-- Pilihan Kategori --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2">Pilih Kategori Undangan *</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Pernikahan" class="peer sr-only" {{ $selectedCat === 'Pernikahan' ? 'checked' : '' }} onchange="updateCategoryTheme('Pernikahan')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">💍</span>
                                <b class="text-xs font-bold text-ink block">Pernikahan</b>
                                <span class="text-[10px] text-ink3">Wedding / Resepsi</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Tahlilan" class="peer sr-only" {{ $selectedCat === 'Tahlilan' ? 'checked' : '' }} onchange="updateCategoryTheme('Tahlilan')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">🕯️</span>
                                <b class="text-xs font-bold text-ink block">Tahlilan / Haul</b>
                                <span class="text-[10px] text-ink3">Doa &amp; Mengenang</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Khitanan" class="peer sr-only" {{ $selectedCat === 'Khitanan' ? 'checked' : '' }} onchange="updateCategoryTheme('Khitanan')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">✂️</span>
                                <b class="text-xs font-bold text-ink block">Khitanan</b>
                                <span class="text-[10px] text-ink3">Walimatul Khitan</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Aqiqah" class="peer sr-only" {{ $selectedCat === 'Aqiqah' ? 'checked' : '' }} onchange="updateCategoryTheme('Aqiqah')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">👶</span>
                                <b class="text-xs font-bold text-ink block">Aqiqah</b>
                                <span class="text-[10px] text-ink3">Tasyakuran Bayi</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Ulang Tahun" class="peer sr-only" {{ $selectedCat === 'Ulang Tahun' ? 'checked' : '' }} onchange="updateCategoryTheme('Ulang Tahun')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">🎂</span>
                                <b class="text-xs font-bold text-ink block">Ulang Tahun</b>
                                <span class="text-[10px] text-ink3">Milad / Sweet 17</span>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="Halal Bihalal" class="peer sr-only" {{ $selectedCat === 'Halal Bihalal' ? 'checked' : '' }} onchange="updateCategoryTheme('Halal Bihalal')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">🕌</span>
                                <b class="text-xs font-bold text-ink block">Halal Bihalal</b>
                                <span class="text-[10px] text-ink3">Silaturahmi Idul Fitri</span>
                            </div>
                        </label>

                        <label class="cursor-pointer col-span-2 sm:col-span-1">
                            <input type="radio" name="category" value="Syukuran" class="peer sr-only" {{ $selectedCat === 'Syukuran' ? 'checked' : '' }} onchange="updateCategoryTheme('Syukuran')">
                            <div class="p-3.5 rounded-2xl border-2 border-ink/15 bg-white text-center peer-checked:border-brand peer-checked:bg-blush transition h-full flex flex-col justify-center">
                                <span class="text-2xl block mb-1">🎉</span>
                                <b class="text-xs font-bold text-ink block">Syukuran / Reuni</b>
                                <span class="text-[10px] text-ink3">Rumah Baru / Temu Alumni</span>
                            </div>
                        </label>
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
                            <p class="text-[10px] text-ink3">Format JPG, PNG, atau WEBP (Maksimal 5MB). Foto ini akan menjadi latar belakang amplop pembuka.</p>
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
                                <img id="groomPreviewImg" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200" class="w-11 h-11 rounded-full object-cover border border-ink/20 shrink-0">
                                <input type="file" name="groom_photo" accept="image/*" onchange="previewImageFile(this, 'groomPreviewImg')"
                                       class="block w-full text-xs text-ink3 file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand/10 file:text-brand hover:file:bg-brand hover:file:text-white cursor-pointer">
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
                                <img id="bridePreviewImg" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200" class="w-11 h-11 rounded-full object-cover border border-ink/20 shrink-0">
                                <input type="file" name="bride_photo" accept="image/*" onchange="previewImageFile(this, 'bridePreviewImg')"
                                       class="block w-full text-xs text-ink3 file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand/10 file:text-brand hover:file:bg-brand hover:file:text-white cursor-pointer">
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
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 4</span>
                    <h2 class="font-serif text-2xl font-bold text-ink">Jadwal &amp; Lokasi Acara</h2>
                    <p class="text-xs text-ink2 mt-1">Atur waktu pelaksanaan Akad Nikah / Ibadah dan Resepsi Pernikahan beserta peta navigasi.</p>
                </div>

                {{-- Acara 1 --}}
                <div class="p-5 rounded-3xl bg-sunk/60 border border-ink/15 space-y-4">
                    <div class="flex items-center justify-between">
                        <b class="text-sm font-bold text-ink flex items-center gap-1.5">
                            <span id="event1HeaderTitle">💍 Acara 1: Akad Nikah / Pemberkatan</span>
                        </b>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white text-brand border border-brand/20">Wajib</span>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nama Acara</label>
                            <input type="text" name="event_1_title" id="event1TitleInput" value="{{ old('event_1_title') }}"
                                   placeholder="Contoh: Akad Nikah / Doa Bersama"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Tanggal Acara</label>
                            <input type="date" name="event_1_date" value="{{ old('event_1_date') }}"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Waktu (Mulai - Selesai)</label>
                            <div class="flex items-center gap-1">
                                <input type="text" name="event_1_start_time" value="{{ old('event_1_start_time') }}" placeholder="08:00 WIB" class="w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                <span>-</span>
                                <input type="text" name="event_1_end_time" value="{{ old('event_1_end_time') }}" placeholder="10:00 / Selesai" class="w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                            </div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nama Tempat / Gedung</label>
                            <input type="text" name="event_1_venue" id="event1VenueInput" value="{{ old('event_1_venue') }}"
                                   placeholder="Contoh: Masjid Agung Al-Azhar"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Tautan Google Maps</label>
                            <input type="url" name="event_1_maps_url" value="{{ old('event_1_maps_url') }}"
                                   placeholder="Contoh: https://maps.app.goo.gl/..."
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Alamat Lengkap</label>
                        <input type="text" name="event_1_address" value="{{ old('event_1_address') }}"
                               placeholder="Contoh: Jl. Sisingamangaraja No. 1, Kebayoran Baru, Jakarta Selatan"
                               class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>

                {{-- Acara 2 --}}
                <div class="p-5 rounded-3xl bg-blush/60 border border-brand/20 space-y-4">
                    <div class="flex items-center justify-between">
                        <b class="text-sm font-bold text-brand flex items-center gap-1.5">
                            <span id="event2HeaderTitle">🎉 Acara 2: Resepsi Pernikahan / Tasyakuran</span>
                        </b>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white text-ink2 border border-ink/15">Opsional</span>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nama Acara</label>
                            <input type="text" name="event_2_title" id="event2TitleInput" value="{{ old('event_2_title') }}"
                                   placeholder="Contoh: Resepsi Pernikahan / Ramah Tamah"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Tanggal Acara</label>
                            <input type="date" name="event_2_date" value="{{ old('event_2_date') }}"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Waktu (Mulai - Selesai)</label>
                            <div class="flex items-center gap-1">
                                <input type="text" name="event_2_start_time" value="{{ old('event_2_start_time') }}" placeholder="11:00 WIB" class="w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                                <span>-</span>
                                <input type="text" name="event_2_end_time" value="{{ old('event_2_end_time') }}" placeholder="14:00 / Selesai" class="w-1/2 rounded-2xl border border-ink/20 px-2 py-2.5 text-xs text-center font-semibold">
                            </div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Nama Tempat / Ballroom</label>
                            <input type="text" name="event_2_venue" id="event2VenueInput" value="{{ old('event_2_venue') }}"
                                   placeholder="Contoh: Grand Ballroom Menara 165"
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-ink2">Tautan Google Maps</label>
                            <input type="url" name="event_2_maps_url" value="{{ old('event_2_maps_url') }}"
                                   placeholder="Contoh: https://maps.app.goo.gl/..."
                                   class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-ink2">Alamat Lengkap</label>
                        <input type="text" name="event_2_address" value="{{ old('event_2_address') }}"
                               placeholder="Contoh: Jl. TB Simatupang Kav. 1, Cilandak Timur, Jakarta Selatan"
                               class="w-full rounded-2xl border border-ink/20 px-3.5 py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>
            </div>

            {{-- ========================================================
                 LANGKAH 5: AMPLOP DIGITAL & KADO
            ======================================================== --}}
            <div id="stepPanel5" class="step-panel space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Langkah 5</span>
                    <h2 class="font-serif text-2xl font-bold text-ink">Amplop Digital &amp; Tanda Kasih</h2>
                    <p class="text-xs text-ink2 mt-1">Berikan kemudahan bagi para tamu undangan yang ingin mengirimkan kado pernikahan secara *cashless*.</p>
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
                    <h2 class="font-serif text-2xl font-bold text-ink">Galeri Prewedding &amp; Musik</h2>
                    <p class="text-xs text-ink2 mt-1">Lengkapi undangan dengan foto-foto kenangan dan lagu romantis favorit.</p>
                </div>

                {{-- Pilihan Musik Latar --}}
                <div class="p-5 rounded-3xl bg-white border border-ink/15 shadow-sm space-y-3">
                    <b class="text-xs font-bold uppercase tracking-wider text-ink block">Pilihan Musik Latar (Autoplay Audio)</b>
                    <select name="music_url" class="w-full rounded-2xl border border-ink/20 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        <option value="wedding-melody.wav" selected>♫ Beautiful Wedding Melody (Instrumental Romantis Bawaan)</option>
                        <option value="https://assets.mixkit.co/music/preview/mixkit-romantic-wedding-640.mp3">♫ Romantic Wedding Acoustic (Gitar Akustik Lembut)</option>
                        <option value="https://assets.mixkit.co/music/preview/mixkit-wedding-piano-641.mp3">♫ Sweet Wedding Piano (Alunan Piano Manis)</option>
                    </select>
                    <p class="text-[10px] text-ink3">Musik akan diputar secara otomatis saat tamu menekan tombol "Buka Undangan".</p>
                </div>

                {{-- Upload Galeri Foto --}}
                <div class="p-5 rounded-3xl bg-sunk/50 border border-ink/15 space-y-3">
                    <div class="flex items-center justify-between">
                        <b class="text-xs font-bold uppercase tracking-wider text-ink block">Upload Foto Galeri (Prewedding)</b>
                        <span class="text-[11px] text-ink3">Bisa pilih beberapa foto sekaligus</span>
                    </div>

                    <input type="file" name="gallery_photos[]" multiple accept="image/*" onchange="previewGalleryFiles(this)"
                           class="block w-full text-xs text-ink3 file:mr-3 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-brand file:text-white hover:file:bg-accent cursor-pointer">
                    
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
            }
        };

        function updateCategoryTheme(cat) {
            const conf = categoryConfigs[cat] || categoryConfigs['Pernikahan'];

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
        }

        // Live Single Image Preview
        function previewImageFile(input, targetImgId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(targetImgId);
                    if (img) img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Live Multiple Gallery Previews
        function previewGalleryFiles(input) {
            const container = document.getElementById('galleryPreviews');
            if (!container) return;
            container.innerHTML = '';
            if (input.files) {
                Array.from(input.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'aspect-square rounded-xl bg-white border border-ink/15 overflow-hidden shadow-sm';
                        div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                        container.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        // Initialize category on page load
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

            const initialCat = @json($selectedCat) || 'Pernikahan';
            updateCategoryTheme(initialCat);
        });
    </script>
</body>
</html>
