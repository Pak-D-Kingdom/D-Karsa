<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($couple->event_heading ?? 'Nocturne Flora Gala') . ' - ' . ($couple->groom_name ?? 'KEKN') }} | D'Karsa</title>

    <!-- Open Graph -->
    <meta property="og:title" content="{{ ($couple->event_heading ?? 'Nocturne Flora Gala') . ' - ' . ($couple->groom_name ?? 'KEKN') }}">
    <meta property="og:description" content="Surat Kehormatan VIP & Undangan Resmi {{ $couple->groom_name ?? 'Komunitas Ekosistem Kreatif Nusantara' }}.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200' }}">

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "error": "#ffb4ab",
                        "primary-fixed-dim": "#e9c349",
                        "on-secondary-fixed": "#111a36",
                        "on-error-container": "#ffdad6",
                        "surface-dim": "#0a122a",
                        "on-tertiary": "#1b324b",
                        "on-secondary": "#262f4c",
                        "inverse-surface": "#dbe1ff",
                        "error-container": "#93000a",
                        "on-surface-variant": "#d0c5af",
                        "surface-container": "#171e37",
                        "on-tertiary-fixed": "#021d35",
                        "background": "#0a122a",
                        "on-tertiary-container": "#314761",
                        "surface-container-low": "#131a33",
                        "on-primary-container": "#554300",
                        "on-tertiary-fixed-variant": "#324863",
                        "surface-container-lowest": "#050d25",
                        "on-secondary-fixed-variant": "#3d4664",
                        "outline": "#99907c",
                        "outline-variant": "#4d4635",
                        "tertiary-fixed-dim": "#b2c8e8",
                        "surface-container-highest": "#2c344d",
                        "surface-variant": "#2c344d",
                        "on-primary": "#3c2f00",
                        "tertiary-fixed": "#d2e4ff",
                        "on-secondary-container": "#abb4d7",
                        "on-primary-fixed": "#241a00",
                        "primary": "#f2ca50",
                        "secondary-container": "#3d4664",
                        "secondary-fixed-dim": "#bdc5e9",
                        "inverse-primary": "#735c00",
                        "on-error": "#690005",
                        "tertiary": "#bad0f1",
                        "tertiary-container": "#9eb5d4",
                        "on-surface": "#dbe1ff",
                        "on-background": "#dbe1ff",
                        "secondary": "#bdc5e9",
                        "on-primary-fixed-variant": "#574500",
                        "secondary-fixed": "#dbe1ff",
                        "surface-tint": "#e9c349",
                        "primary-fixed": "#ffe088",
                        "surface": "#0a122a",
                        "primary-container": "#d4af37",
                        "surface-container-high": "#212942",
                        "surface-bright": "#313852",
                        "inverse-on-surface": "#282f49"
                    },
                    fontFamily: {
                        "display-hero": ["Playfair Display", "serif"],
                        "headline": ["Playfair Display", "serif"],
                        "body": ["Plus Jakarta Sans", "sans-serif"],
                        "sans": ["Plus Jakarta Sans", "sans-serif"]
                    }
                }
            }
        };
    </script>

    <style>
        html { scroll-behavior: smooth; }
        * { box-sizing: border-box; }
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined', 'Material Icons', sans-serif !important;
            font-weight: normal;
            font-style: normal;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }

        /* Custom delicate dark scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a122a;
        }
        ::-webkit-scrollbar-thumb {
            background: #212942;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #f2ca50;
        }

        /* Ambient subtle pulse */
        @keyframes goldGlow {
            0%, 100% { opacity: 0.35; transform: scale(1); }
            50% { opacity: 0.65; transform: scale(1.05); }
        }
        .gold-glow-animate {
            animation: goldGlow 4s ease-in-out infinite;
        }

        /* Toast slide animation */
        @keyframes toastSlide {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            15% { opacity: 1; transform: translate(-50%, 0); }
            85% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -15px); }
        }
        .toast-active {
            animation: toastSlide 2.8s ease forwards;
        }
    </style>
</head>
<body class="bg-background font-body text-on-surface antialiased selection:bg-primary-container selection:text-on-primary-container min-h-screen relative overflow-hidden">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCdPljVOXr26UE8Ms4t7EAbv758xspjsN5NTZ42zOpq1UvndGHDlpT0hfYK8MbSQY6_iLQSb00sqTp4emTwyd3PJfa3tgVw_FrRi1i_gxtZ11LzVN4x0H-b5UYOjZ1tIxY7QDVUQvxQZdwKyJiSzM3FjIiTJ2mozHDTvWmKEOLWeHb5oPKeQ1P0-smKM6JqIONrmPRW4oicEjbJtCFnrVmNOXTqB8tKd4Wg74Ysla2tZmnsW9V8zp4rhQ'
        );
        $presidiumImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? $couple->bride_photo ?? null,
            'https://lh3.googleusercontent.com/aida-public/AB6AXuBWr2uZbfhztQ65QOVHf4iAdfSAqUzv_ZZk_8IyGD8qnINZrHK7MjT15SCS-pH-Z8UNbZy9D03OkSJdxawRY6J2UujvGOStXMy6t8SB0t-G7NXIK8idQSxT7u0dvbOrWe1EcRHSvTE2xrHjzn7U7YcFXistayRhu6lAVDuYxVru13eLZRJTvzFeGG50Uywkh0JbNtawUCiar-czizR8dGxj_m2UXoYDGXPSlGpVRb60KAAu0l-VNfaRZw'
        );
        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? substr($couple->wedding_time, 0, 5) . ' WIB' : '18.00 WIB';

        $orgName = $couple->groom_name ?? 'Komunitas Ekosistem Kreatif Nusantara (KEKN)';
        $speakerName = $couple->bride_name ?? 'Raden Mas Suryo Wicaksono, M.B.A.';
        $speakerTitle = $couple->bride_birth_order ?? 'Ketua Umum Presidium KEKN Masa Bakti 2023–2026';
        $heading = $couple->event_heading ?? 'Nocturne Flora: Malam Keakraban & Mahakarya Komunitas';
        $quote = $couple->quote ?? $couple->event_quote ?? '“Kala malam menyulam keheningan, dedaunan inovasi mekar dalam harmoni. Bersama kita merayakan karya, dedikasi, serta jalinan erat yang melahirkan dampak bagi peradaban nusantara.”';
        $venueName = $couple->venue_name ?? 'The Glasshouse Grand Sanctuary';
        $venueAddress = $couple->venue_address ?? 'The Langham Ballroom, Surabaya, Jawa Timur';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));
        $guestName = $guest->name ?? request('guest_name') ?? 'Dr. Adrian Pratama, M.Sc. & Rekanan';

        $bankName = $couple->bank_name_1 ?? $couple->bank_name ?? 'Bank Mandiri';
        $bankAccount = $couple->bank_account_1 ?? $couple->bank_account_number ?? $couple->account_number ?? '137-00-2025-8888';
        $bankHolder = $couple->bank_holder_1 ?? $couple->bank_account_holder ?? $couple->account_name ?? 'Yayasan Ekosistem Kreatif Nusantara';

        // Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdPljVOXr26UE8Ms4t7EAbv758xspjsN5NTZ42zOpq1UvndGHDlpT0hfYK8MbSQY6_iLQSb00sqTp4emTwyd3PJfa3tgVw_FrRi1i_gxtZ11LzVN4x0H-b5UYOjZ1tIxY7QDVUQvxQZdwKyJiSzM3FjIiTJ2mozHDTvWmKEOLWeHb5oPKeQ1P0-smKM6JqIONrmPRW4oicEjbJtCFnrVmNOXTqB8tKd4Wg74Ysla2tZmnsW9V8zp4rhQ', 'caption' => 'Nuansa Ballroom'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD1dDk66VCWkjrr5z6ONdNdWS0nXQrHxPb-jcg-xSv1PZEXj0qif5rlohpkcHLHmRSPSuRuWYSwCMGSBKay3RHVTEuRkoLWK2Zs727dnKEtH6NxbmcbfUYeG3mjXNrrlICZ20OLkga-AaaQPtHVcbHcj0TKu05JSkcc1UKD-5OWyHAnMIYxQLl3q0HkpNZ7oYgvVm7XGDEwtxZs5O1dsVHGoIjgZvP5o2Co4gHEP9a4_4QUQlTme3NmJQ', 'caption' => 'Simfoni Malam'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCMFvkxRJTeS5-_nDi3mtvYJ2AbWKvbyQ9M4E-A90Jzo3FoeWyxnU-GIyS9_9_oWkIbzJBrtE0D7170CKkK_at8RcQvPgh9bp250NrCMieXsVR3TdumpXHtowUcwYU2RWlGDHhB6QkDr4P9DfVWBoh94SKokwpqs0yfnZ44RxvQ50bW6unHobyCRigIgDEm7Urs7sks7ISp-WL3P0eGNmaw3zvV92Tz_xNc4DFBl8KH_159C_yhPYxt6A', 'caption' => 'Perjamuan Gastronomi'],
            ]);
        }

        // Events / Rundown
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Registrasi Tamu, Red Carpet, Welcoming Cocktail & Networking',
                    'date' => $eventDateFormatted,
                    'start_time' => '18:00 WIB',
                    'end_time' => '19:00 WIB',
                    'venue_name' => 'Grand Foyer',
                    'address' => 'Penyambutan selamat datang, sesi foto latar media resmi karpet merah, dan ramah tamah dengan sajian artisanal mocktail.',
                ],
                (object)[
                    'title' => 'Pembukaan Resmi, Lagu Kebangsaan & Sambutan Dewan Kehormatan',
                    'date' => $eventDateFormatted,
                    'start_time' => '19:00 WIB',
                    'end_time' => '19:30 WIB',
                    'venue_name' => 'Main Ballroom Stage',
                    'address' => 'Prosesi khidmat menyanyikan Indonesia Raya, doa bersama lintas iman, dan sambutan Dewan Presidium KEKN.',
                ],
                (object)[
                    'title' => 'Gala Dinner 5-Course & Pemutaran Dokumenter Kiprah Komunitas',
                    'date' => $eventDateFormatted,
                    'start_time' => '19:30 WIB',
                    'end_time' => '20:30 WIB',
                    'venue_name' => 'All VIP Tables',
                    'address' => 'Perjamuan santap malam istimewa diracik oleh Master Executive Chef, diiringi pemutaran film dokumenter kiprah komunitas.',
                ],
                (object)[
                    'title' => 'Penganugerahan Insan Berprestasi (Community Excellence Awards)',
                    'date' => $eventDateFormatted,
                    'start_time' => '20:30 WIB',
                    'end_time' => '21:30 WIB',
                    'venue_name' => 'Puncak Acara',
                    'address' => 'Pemberian trofi mahakarya berlapis emas untuk kategori inovasi, dedikasi anggota terbaik, dan mitra strategis.',
                ],
                (object)[
                    'title' => 'Pertunjukan Orkestra Botani & Ramah Tamah Malam Keakraban',
                    'date' => $eventDateFormatted,
                    'start_time' => '21:30 WIB',
                    'end_time' => '22:30 WIB',
                    'venue_name' => 'Glasshouse Garden',
                    'address' => 'Resital orkestra malam, sesi bersulang apresiasi bersama, foto keluarga besar presidium, dan penyerahan suvenir.',
                ],
            ]);
        }
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Toast Notification -->
    <div id="toastNotification" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 hidden px-5 py-2.5 bg-surface-container-high border border-primary/40 text-on-surface text-xs font-medium rounded-full shadow-2xl flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[18px]">verified</span>
        <span id="toastMessage">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: INTERACTIVE DIGITAL ENVELOPE (Tampilan Awal Eksklusif)
         ======================================================== -->
    <div class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-background flex flex-col items-center justify-center px-2 sm:px-6 py-3 sm:py-6 transition-all duration-700 ease-in-out" id="envelope-cover">
        <!-- Atmospheric Ambient Glows (Clipped) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute w-[380px] sm:w-[600px] h-[380px] sm:h-[600px] -top-20 sm:-top-32 -left-20 sm:-left-32 bg-primary/10 rounded-full blur-[90px] sm:blur-[140px]"></div>
            <div class="absolute w-[340px] sm:w-[500px] h-[340px] sm:h-[500px] -bottom-16 sm:-bottom-24 -right-16 sm:-right-24 bg-tertiary-container/15 rounded-full blur-[100px] sm:blur-[160px]"></div>
        </div>

        <div class="min-h-full flex flex-col justify-center items-center my-auto py-2 sm:py-3 w-full">
            <!-- Envelope Container Assembly -->
            <div class="relative w-full max-w-[820px] transition-all duration-700 mx-auto" id="envelope-wrapper">
                    
                    <!-- Top Decorative Monogram Seal Ribbon -->
                    <div class="flex items-center justify-center gap-2 sm:gap-4 mb-2 sm:mb-3">
                        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
                        <div class="flex items-center gap-1.5 text-primary px-3 py-0.5 sm:py-1 bg-surface-container-high/60 backdrop-blur-md rounded-full shadow-lg border border-primary/20">
                            <span class="material-symbols-outlined text-[14px]">diamond</span>
                            <span class="text-[9px] sm:text-xs uppercase tracking-[0.2em] text-primary font-bold">Surat Kehormatan VIP</span>
                        </div>
                        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
                    </div>

                    <!-- Outer Envelope Body (Midnight Slate with Filigree Border) -->
                    <div class="relative bg-surface-container-lowest/90 backdrop-blur-2xl rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.85)] p-1.5 sm:p-4 overflow-hidden border border-primary/20">
                        <!-- Subtle Foil Vector Backdrop -->
                        <svg class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" preserveAspectRatio="none" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
                            <circle class="text-primary" cx="400" cy="300" fill="none" r="340" stroke="currentColor" stroke-dasharray="8 6" stroke-width="0.75"></circle>
                            <circle class="text-primary" cx="400" cy="300" fill="none" r="280" stroke="currentColor" stroke-width="0.5"></circle>
                            <path class="text-primary" d="M50,50 Q400,200 750,50 M50,550 Q400,400 750,550" fill="none" stroke="currentColor" stroke-width="0.5"></path>
                        </svg>

                        <!-- Simulated Physical Envelope Flap Fold -->
                        <div class="relative z-20 w-full transition-transform duration-700 origin-top" id="envelope-flap">
                            <div class="w-full bg-gradient-to-b from-surface-container-high/90 to-surface-container/70 backdrop-blur-xl rounded-t-xl py-3 sm:py-5 px-2 sm:px-4 flex flex-col items-center justify-center shadow-md relative overflow-hidden border-b border-primary/15">
                                <!-- Corner Botanical Accents -->
                                <span class="material-symbols-outlined text-primary/35 absolute top-1.5 sm:top-2 left-2.5 sm:left-4 text-[18px] sm:text-[24px]">potted_plant</span>
                                <span class="material-symbols-outlined text-primary/35 absolute top-1.5 sm:top-2 right-2.5 sm:right-4 text-[18px] sm:text-[24px]">potted_plant</span>
                                
                                <!-- Wax Seal Stamp Button -->
                                <button aria-label="Buka Amplop Undangan" class="group relative flex flex-col items-center justify-center transform hover:scale-105 active:scale-95 transition-all duration-300 focus:outline-none cursor-pointer" id="wax-seal-btn" type="button" onclick="triggerOpenEnvelope()">
                                    <!-- Golden Radial Aura -->
                                    <span class="absolute inset-0 w-20 h-20 -translate-x-2 -translate-y-2 rounded-full bg-primary/20 blur-xl group-hover:bg-primary/35 transition-colors"></span>
                                    
                                    <!-- Wax Seal Medallion -->
                                    <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-[#8f7124] via-primary to-[#ffea9f] p-[2.5px] shadow-[0_10px_25px_rgba(0,0,0,0.7),inset_0_2px_4px_rgba(255,255,255,0.4)] flex items-center justify-center">
                                        <div class="w-full h-full rounded-full bg-gradient-to-br from-surface-container-lowest to-surface-container-high flex flex-col items-center justify-center p-1 text-center shadow-inner">
                                            <span class="material-symbols-outlined text-primary text-[18px] sm:text-[22px] mb-0.5 group-hover:rotate-12 transition-transform">filter_vintage</span>
                                            <span class="font-headline text-[9px] sm:text-[10px] leading-tight text-primary font-bold tracking-widest uppercase">VIP</span>
                                            <span class="text-[7px] sm:text-[8px] text-on-surface-variant tracking-tighter">GALA</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Seal Subtitle -->
                                    <span class="mt-1.5 text-[9px] sm:text-[11px] text-primary tracking-[0.2em] uppercase opacity-90 group-hover:opacity-100 flex items-center gap-1 font-bold">
                                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                        Ketuk Segel Emas
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Inside Card Slot (Formal VIP Letter) -->
                        <div class="relative z-10 -mt-1 bg-gradient-to-b from-surface-container to-surface-container-low rounded-xl p-2.5 sm:p-4 shadow-xl flex flex-col items-center text-center border border-primary/20" id="invitation-card-preview">
                            <span class="text-[8px] sm:text-[9px] uppercase text-primary tracking-widest font-bold">
                                Surat Undangan Resmi • Gala Kepresisian
                            </span>

                            <p class="text-[9px] sm:text-[10px] text-on-surface-variant uppercase tracking-wider mt-0.5">
                                Kepada Yth. Bapak / Ibu / Rekan Komunitas:
                            </p>

                            <h2 id="previewGuestNameCover" class="font-headline text-base sm:text-lg text-on-surface font-semibold tracking-tight truncate max-w-full my-0.5">
                                {{ $guestName }}
                            </h2>

                            <p class="text-[10px] text-on-surface-variant leading-relaxed line-clamp-1 max-w-sm">
                                <span id="previewHeadingCover" class="text-on-surface font-medium italic">{{ $heading }}</span>
                            </p>

                            <!-- Invitation Card Meta Quick-Row -->
                            <div class="flex items-center justify-center gap-3 text-[10px] text-on-surface-variant my-1">
                                <span>📅 {{ $eventDateFormatted }}</span>
                                <span>•</span>
                                <span>🏛️ {{ $venueName }}</span>
                            </div>

                            <!-- Primary CTA Button to Open & Scroll -->
                            <div class="flex flex-col items-center gap-1 mt-1 w-full max-w-xs">
                                <button type="button" id="open-invitation-btn" onclick="triggerOpenEnvelope()" class="w-full py-2.5 px-5 rounded-full bg-gradient-to-r from-primary-container via-primary to-primary-container text-on-primary text-xs tracking-wider uppercase font-bold shadow-[0_0_15px_rgba(212,175,55,0.35)] hover:shadow-[0_0_25px_rgba(212,175,55,0.5)] active:scale-[0.98] transition-all flex items-center justify-center gap-1.5 cursor-pointer relative z-30 pointer-events-auto">
                                    <span>Buka Surat Undangan</span>
                                    <span class="material-symbols-outlined text-[15px]">arrow_downward</span>
                                </button>
                            </div>
                        </div>

                            <p class="text-[9px] sm:text-[10px] text-on-surface-variant/80 mt-2">
                                Tekan tombol untuk membuka lembar protokoler, jadwal acara lengkap, serta reservasi meja.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================
         MAIN INVITATION WRAPPER (Terkunci & Tersembunyi sebelum Buka Undangan)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="hidden opacity-0 transition-opacity duration-700 w-full relative">

        <main class="w-full bg-background relative">
            <!-- Ambient Background Glows -->
            <div class="fixed inset-0 pointer-events-none -z-10 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(44,52,77,0.45),rgba(10,18,42,0))]"></div>

            <div class="flex flex-col w-full relative">

                <!-- ========================================================
                     STICKY VIP NAVIGATION BAR (Revealed upon opening)
                     ======================================================== -->
                <aside class="sticky top-0 z-40 w-full transition-all duration-500 opacity-0 pointer-events-none backdrop-blur-xl bg-surface-container-lowest/90 border-b border-primary/20 shadow-lg py-2 px-3 sm:px-6 flex items-center justify-between" id="sticky-bar">
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">local_florist</span>
                    <span class="text-xs font-semibold text-on-surface truncate max-w-[150px] sm:max-w-xs">{{ $orgName }}</span>
                </div>
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <a href="#agenda-acara" class="px-2.5 py-1 rounded-full text-[10px] sm:text-xs font-semibold text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition">Rundown</a>
                    <a href="#venue-section" class="px-2.5 py-1 rounded-full text-[10px] sm:text-xs font-semibold text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition">Lokasi</a>
                    <a href="#rsvp-section" class="px-2.5 py-1 rounded-full text-[10px] sm:text-xs font-bold text-on-primary bg-primary rounded-full hover:brightness-110 transition">RSVP</a>
                    <button type="button" onclick="toggleAudio()" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-surface-container-high border border-primary/30 flex items-center justify-center text-primary hover:scale-105 transition ml-1 cursor-pointer" title="Putar / Jeda Musik">
                        <span id="audioStickyIcon" class="material-symbols-outlined text-[16px] animate-spin" style="animation-duration: 6s;">music_note</span>
                    </button>
                </div>
            </aside>

            <!-- ========================================================
                 SECTION 2: GRAND WELCOME & HERO TITLE
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 pt-6 sm:pt-8 pb-10 w-full" id="invitation-body">
                <div class="relative rounded-2xl bg-surface-container-low/90 backdrop-blur-xl p-4 sm:p-6 md:p-10 overflow-hidden shadow-2xl border border-primary/20">
                    <div class="absolute -right-24 -top-24 w-72 sm:w-96 h-72 sm:h-96 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>

                    <div class="relative z-10 flex flex-col items-center text-center max-w-4xl mx-auto">
                        <!-- Embellished Botanical Laurel Icon Header -->
                        <div class="flex items-center gap-2 sm:gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] rotate-12">local_florist</span>
                            <span class="text-[10px] sm:text-xs font-bold text-primary tracking-[0.25em] uppercase">Malam Anugerah &amp; Silaturahmi Akbar</span>
                            <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] -rotate-12">local_florist</span>
                        </div>

                        <span class="text-[10px] sm:text-xs text-on-surface-variant uppercase tracking-widest mb-1">
                            Annual Community Gala &amp; Awards 2025
                        </span>

                        <h1 id="previewEventHeading" class="font-display-hero text-2xl sm:text-3xl md:text-5xl text-on-surface font-semibold tracking-tight text-balance leading-tight my-2">
                            {{ $heading }}
                        </h1>

                        <div class="h-1 w-20 sm:w-28 bg-gradient-to-r from-transparent via-primary to-transparent my-3 rounded-full"></div>

                        <p class="text-xs sm:text-base text-primary-fixed-dim font-medium tracking-wide">
                            {{ $eventDateFormatted }} • {{ $venueName }}
                        </p>

                        <!-- Quote Block with Laurel styling -->
                        <div class="relative my-4 sm:my-6 p-4 sm:p-6 bg-surface-container-high/40 rounded-xl max-w-2xl border border-primary/10">
                            <span class="material-symbols-outlined text-primary/30 text-[26px] sm:text-[34px] absolute -top-3.5 -left-1">format_quote</span>
                            <p id="previewEventQuote" class="font-headline text-sm sm:text-base md:text-lg text-on-surface/90 italic font-normal leading-relaxed">
                                {{ $quote }}
                            </p>
                            <div class="mt-3 flex items-center justify-center gap-2">
                                <span class="h-px w-8 bg-primary/40"></span>
                                <span class="text-[9px] sm:text-[10px] text-primary tracking-widest uppercase font-bold">Dewan Presidium {{ $orgName }}</span>
                                <span class="h-px w-8 bg-primary/40"></span>
                            </div>
                        </div>

                        <!-- Featured Cover Image -->
                        <div class="relative w-full rounded-2xl overflow-hidden aspect-[16/9] shadow-2xl my-4 border border-primary/20">
                            <img id="previewCover" src="{{ $coverImg }}" alt="Cover Gala" class="w-full h-full object-cover">
                        </div>

                        <!-- Hero Atmosphere Imagery Grid (Gallery Showcase) -->
                        <div class="w-full mt-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[16px]">photo_library</span> Dokumentasi &amp; Suasana Gala
                                </span>
                                <span class="text-[10px] text-on-surface-variant">Arsip Kehormatan</span>
                            </div>

                            <div id="previewGalleryGrid" class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4 w-full">
                                @foreach($activeGalleries as $idx => $gal)
                                    <div class="relative rounded-xl overflow-hidden aspect-[4/3] shadow-lg group border border-primary/15 bg-surface-container">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ !empty($gal->image) ? (str_starts_with($gal->image, 'http') ? $gal->image : asset('storage/' . $gal->image)) : 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800' }}" alt="Dokumentasi Gala {{ $idx + 1 }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/90 via-surface-container-lowest/30 to-transparent flex flex-col justify-end p-3">
                                            <span class="text-[9px] text-primary uppercase font-bold tracking-wider">Momen {{ $idx + 1 }}</span>
                                            <span class="text-xs sm:text-sm font-semibold text-on-surface">{{ $gal->caption ?? 'Perayaan Mahakarya Komunitas' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 3: PROFIL KOMUNITAS & PRESIDIUM
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 py-6 sm:py-10 w-full" id="profil-komunitas">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-3">
                    <div>
                        <div class="flex items-center gap-1.5 text-primary mb-1">
                            <span class="material-symbols-outlined text-[18px]">nature_people</span>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest">Pilar Keberlanjutan &amp; Gerakan</span>
                        </div>
                        <h2 id="previewGroomName" class="font-headline text-xl sm:text-2xl md:text-3xl text-on-surface font-semibold">
                            {{ $orgName }}
                        </h2>
                    </div>
                    <p class="text-xs sm:text-sm text-on-surface-variant max-w-md leading-relaxed">
                        {{ $couple->groom_birth_order ?? 'Wadah kolaborasi lintas disiplin yang menghubungkan inovator, akademisi, kreator, dan pemangku kebijakan.' }}
                    </p>
                </div>

                <!-- Metrics Bento Showcase -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-4 mb-6 sm:mb-8">
                    <div class="bg-surface-container rounded-xl p-3 sm:p-5 shadow-md flex flex-col justify-between hover:bg-surface-container-high transition-colors border border-primary/10">
                        <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] mb-2">groups</span>
                        <div>
                            <span class="font-headline text-xl sm:text-3xl text-primary font-bold">25K+</span>
                            <p class="text-xs sm:text-sm text-on-surface mt-1 font-semibold">Anggota Aktif</p>
                            <p class="text-[10px] sm:text-xs text-on-surface-variant">Ekosistem terhubung</p>
                        </div>
                    </div>
                    <div class="bg-surface-container rounded-xl p-3 sm:p-5 shadow-md flex flex-col justify-between hover:bg-surface-container-high transition-colors border border-primary/10">
                        <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] mb-2">map</span>
                        <div>
                            <span class="font-headline text-xl sm:text-3xl text-primary font-bold">38</span>
                            <p class="text-xs sm:text-sm text-on-surface mt-1 font-semibold">Provinsi Aktif</p>
                            <p class="text-[10px] sm:text-xs text-on-surface-variant">Sabang ke Merauke</p>
                        </div>
                    </div>
                    <div class="bg-surface-container rounded-xl p-3 sm:p-5 shadow-md flex flex-col justify-between hover:bg-surface-container-high transition-colors border border-primary/10">
                        <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] mb-2">handshake</span>
                        <div>
                            <span class="font-headline text-xl sm:text-3xl text-primary font-bold">140+</span>
                            <p class="text-xs sm:text-sm text-on-surface mt-1 font-semibold">Kolaborasi Mitra</p>
                            <p class="text-[10px] sm:text-xs text-on-surface-variant">Riset, seni &amp; sosial</p>
                        </div>
                    </div>
                    <div class="bg-surface-container rounded-xl p-3 sm:p-5 shadow-md flex flex-col justify-between hover:bg-surface-container-high transition-colors border border-primary/10">
                        <span class="material-symbols-outlined text-primary text-[20px] sm:text-[26px] mb-2">volunteer_activism</span>
                        <div>
                            <span class="font-headline text-xl sm:text-3xl text-primary font-bold">Rp 4.2M</span>
                            <p class="text-xs sm:text-sm text-on-surface mt-1 font-semibold">Dana Dampak</p>
                            <p class="text-[10px] sm:text-xs text-on-surface-variant">Beasiswa &amp; bakti sosial</p>
                        </div>
                    </div>
                </div>

                <!-- Presidium Welcome Address Panel -->
                <div class="bg-gradient-to-r from-surface-container to-surface-container-low rounded-2xl p-4 sm:p-6 md:p-8 shadow-xl flex flex-col md:flex-row gap-4 sm:gap-8 items-center border border-primary/20">
                    <div class="w-24 h-24 sm:w-36 sm:h-36 md:w-44 md:h-44 rounded-full overflow-hidden shrink-0 shadow-[0_0_24px_rgba(212,175,55,0.25)] relative border-2 border-primary/40 bg-surface-container-high">
                        <img id="previewGroomPhotoImg" class="w-full h-full object-cover" src="{{ $presidiumImg }}" alt="{{ $speakerName }}">
                    </div>
                    <div class="flex-1 flex flex-col gap-1 text-center md:text-left">
                        <div class="inline-flex items-center justify-center md:justify-start gap-1 text-primary mb-1">
                            <span class="material-symbols-outlined text-[16px]">record_voice_over</span>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider">Sambutan Tokoh Kehormatan</span>
                        </div>
                        <h3 id="previewBrideName" class="font-headline text-lg sm:text-2xl text-on-surface font-semibold">
                            {{ $speakerName }}
                        </h3>
                        <p class="text-xs text-primary mb-2 font-medium">{{ $speakerTitle }}</p>
                        <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">
                            “Gala tahunan ini bukan sekadar jamuan formal, melainkan panggung apresiasi bagi setiap tetes keringat anggota komunitas kita. Di bawah kubah botani The Langham, mari kita rayakan persahabatan, meneguhkan komitmen, dan merajut babak baru kemajuan bangsa.”
                        </p>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 4: AGENDA ACARA (FORMAL ITINERARY)
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 py-6 sm:py-10 w-full" id="agenda-acara">
                <div class="text-center max-w-2xl mx-auto mb-6 sm:mb-8">
                    <div class="inline-flex items-center gap-1.5 text-primary mb-1">
                        <span class="material-symbols-outlined text-[18px]">hourglass_top</span>
                        <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest">Rangkaian Acara Resmi</span>
                    </div>
                    <h2 class="font-headline text-xl sm:text-2xl md:text-3xl text-on-surface font-semibold">
                        Rundown &amp; Tata Laksana Gala Malam
                    </h2>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-1.5">
                        Diharapkan hadir tepat waktu demi kelancaran prosesi karpet merah dan pembukaan protokoler kenegaraan.
                    </p>
                </div>

                <!-- Timeline Layout with Golden Central/Lateral Rail -->
                <div id="itineraryContainer" class="relative max-w-3xl mx-auto flex flex-col gap-3.5 sm:gap-5 before:absolute before:top-4 before:bottom-4 before:left-3.5 sm:before:left-6 before:w-0.5 before:bg-gradient-to-b before:from-primary/60 before:via-primary/20 before:to-transparent">
                    @foreach($activeEvents as $idx => $ev)
                        <div class="relative pl-9 sm:pl-16 group">
                            <div class="absolute left-3.5 sm:left-6 top-2 w-3.5 h-3.5 rounded-full bg-primary shadow-[0_0_12px_rgba(212,175,55,0.8)] -translate-x-1/2"></div>
                            <div class="bg-surface-container rounded-xl p-3 sm:p-4 shadow-md group-hover:bg-surface-container-high transition-all border border-primary/10">
                                <div class="flex flex-wrap items-center justify-between gap-1 mb-1">
                                    <span class="text-[10px] sm:text-xs text-primary uppercase font-bold tracking-wider">
                                        {{ $ev->start_time ?? '' }} {{ !empty($ev->end_time) ? '– ' . $ev->end_time : '' }}
                                    </span>
                                    <span class="text-[9px] sm:text-[10px] bg-surface-container-highest px-2 py-0.5 rounded text-on-surface-variant font-medium">
                                        {{ $ev->venue_name ?? 'Ballroom' }}
                                    </span>
                                </div>
                                <h4 class="font-headline text-sm sm:text-base text-on-surface font-semibold">
                                    {{ $ev->title ?? 'Agenda Sesi' }}
                                </h4>
                                <p class="text-xs text-on-surface-variant mt-1 leading-relaxed">
                                    {{ $ev->address ?? $ev->description ?? 'Deskripsi agenda protokoler resmi.' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Dress Code Callout Card -->
                <div class="mt-6 sm:mt-10 p-3.5 sm:p-5 rounded-2xl bg-surface-container-high/60 backdrop-blur-md flex flex-col md:flex-row items-center justify-between gap-3 shadow-lg border border-primary/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-[20px]">styler</span>
                        </div>
                        <div>
                            <span class="text-[9px] sm:text-xs text-primary uppercase tracking-widest font-bold">Ketentuan Busana Resmi (Dress Code)</span>
                            <p class="text-xs sm:text-sm text-on-surface font-semibold mt-0.5">
                                Formal Black Tie / Midnight Navy with Gold Accent / Batik Tulis Sutra Formal
                            </p>
                            <p class="text-[10px] sm:text-xs text-on-surface-variant mt-0.5">Pria: Tuxedo / Jas Gelap / Batik Formal Panjang. Wanita: Gaun Malam Panjang / Kebaya Anggun.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0 bg-surface-container-lowest/80 px-2.5 py-1 rounded-full border border-primary/20">
                        <span class="material-symbols-outlined text-primary text-[14px]">verified_user</span>
                        <span class="text-[10px] sm:text-xs text-on-surface font-medium">Protokol Kehormatan Berlaku</span>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 5: LOKASI & VENUE KEHORMATAN
                 ======================================================== -->
            <section class="relative max-w-[860px] mx-auto px-3 sm:px-6 py-6 sm:py-8 w-full" id="venue-section">
                <div class="bg-surface-container/70 rounded-3xl p-5 sm:p-7 md:p-8 shadow-2xl border border-primary/20 flex flex-col gap-4">
                    <div>
                        <div class="flex items-center gap-1.5 text-primary mb-1">
                            <span class="material-symbols-outlined text-[18px]">pin_drop</span>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest">Venue &amp; Navigasi Kehormatan</span>
                        </div>
                        <h2 id="previewVenueName" class="font-headline text-xl sm:text-2xl md:text-3xl text-on-surface font-semibold">
                            {{ $venueName }}
                        </h2>
                        <p id="previewVenueAddress" class="text-xs sm:text-sm text-primary font-medium mt-1">{{ $venueAddress }}</p>
                    </div>

                    <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">
                        Terletak di kawasan megah Jawa Timur, memadukan arsitektur langit-langit kaca berkilau dengan tata botani malam bernuansa flora midnight navy dan ornamen emas neoklasik yang anggun.
                    </p>

                    <!-- Access Highlights -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <div class="flex items-start gap-2 bg-surface-container-high/60 p-3 rounded-xl border border-primary/10">
                            <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">local_parking</span>
                            <div>
                                <span class="text-xs font-semibold text-on-surface">Layanan Valet Gratis VIP</span>
                                <p class="text-[11px] text-on-surface-variant">Tersedia di Lobby Utama dengan menunjukkan kartu undangan digital ini.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-2 bg-surface-container-high/60 p-3 rounded-xl border border-primary/10">
                            <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">elevator</span>
                            <div>
                                <span class="text-xs font-semibold text-on-surface">Akses Lift Pribadi Ballroom</span>
                                <p class="text-[11px] text-on-surface-variant">Lantai 3 (The Glasshouse Mezzanine). Meja registrasi VIP terletak tepat di sisi barat selasar.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Google Maps Action Button -->
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a class="px-6 py-3 rounded-full bg-primary hover:brightness-110 text-on-primary text-xs sm:text-sm font-bold shadow-lg hover:shadow-primary/30 transition-all flex items-center gap-2 cursor-pointer" href="{{ $mapsUrl }}" rel="noopener noreferrer" target="_blank">
                            <span class="material-symbols-outlined text-[18px]">directions</span>
                            <span>Buka Petunjuk Arah (Google Maps)</span>
                        </a>
                        <button class="px-5 py-3 rounded-full bg-surface-container-high text-on-surface hover:text-primary text-xs font-semibold transition-all flex items-center gap-1.5 border border-primary/20 cursor-pointer" onclick="alert('Jadwal Nocturne Botanical Gala telah disiapkan untuk kalender Anda: {{ $eventDateFormatted }} ({{ $eventTimeFormatted }}).')" type="button">
                            <span class="material-symbols-outlined text-[16px]">calendar_add_on</span>
                            <span>Simpan ke Kalender</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 6: RSVP & RESERVASI MEJA GALA
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 py-6 sm:py-10 w-full" id="rsvp-section">
                <div class="bg-surface-container-low rounded-3xl p-4 sm:p-6 md:p-8 shadow-2xl overflow-hidden relative border border-primary/20">
                    <div class="absolute -left-20 -bottom-20 w-72 sm:w-80 h-72 sm:h-80 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-8">
                        <!-- Left Side: RSVP Explanation & Live Counter -->
                        <div class="lg:col-span-5 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-1.5 text-primary mb-1">
                                    <span class="material-symbols-outlined text-[18px]">event_seat</span>
                                    <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest">Konfirmasi Kehadiran Tamu</span>
                                </div>
                                <h2 class="font-headline text-xl sm:text-2xl md:text-3xl text-on-surface font-semibold leading-tight">
                                    Reservasi Meja &amp; Jamuan Gala
                                </h2>
                                <p class="text-xs sm:text-sm text-on-surface-variant mt-2 leading-relaxed">
                                    Demi kelancaran jamuan gastronomi 5-course dan penataan tempat duduk eksklusif, mohon kiranya konfirmasi dapat kami terima melalui form resmi berikut:
                                </p>
                                <div class="mt-3 inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-high text-primary text-xs font-medium border border-primary/20">
                                    <span class="material-symbols-outlined text-[16px]">alarm</span>
                                    <span>Batas Reservasi: H-5 Sebelum Acara</span>
                                </div>
                            </div>

                            <!-- Capacity Counter Badge -->
                            <div class="bg-surface-container rounded-2xl p-3 sm:p-4 mt-5 shadow-md border border-primary/15">
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="text-[10px] text-on-surface-variant uppercase font-bold">Kapasitas Meja VIP</span>
                                    <span class="text-xs text-primary font-bold">184 / 200 Terkonfirmasi</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-primary-fixed-dim to-primary rounded-full transition-all duration-1000" style="width: 92%;"></div>
                                </div>
                                <p class="text-[10px] text-on-surface-variant mt-1.5">
                                    Sisa 16 kursi kehormatan dialokasikan untuk delegasi terundang.
                                </p>
                            </div>

                            <!-- VIP Concierge Hotline -->
                            <div class="mt-3.5 flex items-center gap-2 text-on-surface-variant text-xs">
                                <span class="material-symbols-outlined text-primary text-[18px]">support_agent</span>
                                <span>Bantuan Meja Protokoler: WhatsApp (+62 811-2025-9988)</span>
                            </div>
                        </div>

                        <!-- Right Side: The Interactive Reservation Form -->
                        <div class="lg:col-span-7 bg-surface-container-highest/30 backdrop-blur-md rounded-2xl p-3.5 sm:p-5 md:p-7 shadow-lg border border-primary/20">
                            <form action="{{ route('invitation.rsvp') }}" method="POST" class="space-y-3" id="gala-rsvp-form">
                                @csrf
                                <input type="hidden" name="couple_id" value="{{ $couple->id ?? 1 }}">

                                <!-- Full Name -->
                                <div class="flex flex-col gap-1">
                                    <label class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold" for="rsvp-name">
                                        Nama Lengkap &amp; Gelar Kehormatan <span class="text-primary">*</span>
                                    </label>
                                    <input class="w-full bg-surface-container-low/80 text-on-surface placeholder:text-on-surface-variant/50 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-primary shadow-inner border border-primary/20" id="rsvp-name" name="name" required="" type="text" value="{{ $guestName }}">
                                </div>

                                <!-- Email & WhatsApp Phone -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                    <div class="flex flex-col gap-1">
                                        <label class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold" for="rsvp-email">
                                            Alamat Surel (Email)
                                        </label>
                                        <input class="w-full bg-surface-container-low/80 text-on-surface placeholder:text-on-surface-variant/50 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-primary shadow-inner border border-primary/20" id="rsvp-email" name="email" placeholder="nama@instansi.id" type="email">
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <label class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold" for="rsvp-phone">
                                            Nomor WhatsApp VIP
                                        </label>
                                        <input class="w-full bg-surface-container-low/80 text-on-surface placeholder:text-on-surface-variant/50 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-primary shadow-inner border border-primary/20" id="rsvp-phone" name="phone" placeholder="+62 812-xxxx-xxxx" type="tel">
                                    </div>
                                </div>

                                <!-- Attendance Radio Selection -->
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold">
                                        Konfirmasi Kehadiran <span class="text-primary">*</span>
                                    </span>
                                    <div class="grid grid-cols-3 gap-2">
                                        <label class="flex items-center gap-1.5 bg-surface-container-low/90 p-2 rounded-lg cursor-pointer hover:bg-surface-container-high transition-colors border border-primary/15 text-center justify-center">
                                            <input checked="" class="text-primary focus:ring-primary w-3.5 h-3.5 accent-primary" name="attendance" type="radio" value="Hadir">
                                            <span class="text-[11px] sm:text-xs text-on-surface font-medium">Hadir</span>
                                        </label>
                                        <label class="flex items-center gap-1.5 bg-surface-container-low/90 p-2 rounded-lg cursor-pointer hover:bg-surface-container-high transition-colors border border-primary/15 text-center justify-center">
                                            <input class="text-primary focus:ring-primary w-3.5 h-3.5 accent-primary" name="attendance" type="radio" value="+ Pendamping">
                                            <span class="text-[11px] sm:text-xs text-on-surface font-medium">+ Pendamping</span>
                                        </label>
                                        <label class="flex items-center gap-1.5 bg-surface-container-low/90 p-2 rounded-lg cursor-pointer hover:bg-surface-container-high transition-colors border border-primary/15 text-center justify-center">
                                            <input class="text-primary focus:ring-primary w-3.5 h-3.5 accent-primary" name="attendance" type="radio" value="Berhalangan">
                                            <span class="text-[11px] sm:text-xs text-on-surface font-medium">Berhalangan</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Dietary Preference -->
                                <div class="flex flex-col gap-1">
                                    <label class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold" for="rsvp-diet">
                                        Preferensi Menu Makan Malam
                                    </label>
                                    <select class="w-full bg-surface-container-low/80 text-on-surface rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-primary shadow-inner border border-primary/20" id="rsvp-diet" name="dietary">
                                        <option class="bg-surface-container text-on-surface" value="standard">Menu Mahakarya Standar (Daging Sapi Wagyu &amp; Jamur Morel)</option>
                                        <option class="bg-surface-container text-on-surface" value="pescatarian">Pescatarian (Barramundi Panggang Rempah Tropis)</option>
                                        <option class="bg-surface-container text-on-surface" value="vegetarian">Vegetarian / Vegan Gourmand</option>
                                        <option class="bg-surface-container text-on-surface" value="halal-non-seafood">Bebas Alergi Seafood &amp; Kacang (Allergy Safe)</option>
                                    </select>
                                </div>

                                <!-- Wishes & Salutations -->
                                <div class="flex flex-col gap-1">
                                    <label class="text-[10px] sm:text-xs text-on-surface uppercase tracking-wider font-bold" for="rsvp-notes">
                                        Pesan Harapan / Ucapan Selamat untuk Komunitas
                                    </label>
                                    <textarea class="w-full bg-surface-container-low/80 text-on-surface placeholder:text-on-surface-variant/50 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-primary shadow-inner border border-primary/20" id="rsvp-notes" name="message" placeholder="Tuliskan ucapan selamat atau pesan inspiratif bagi kemajuan ekosistem..." rows="2"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-0.5">
                                    <button class="w-full py-2.5 px-5 rounded-full bg-gradient-to-r from-primary-container via-primary to-primary-container text-on-primary text-xs tracking-wider uppercase font-bold shadow-lg hover:shadow-[0_0_24px_rgba(212,175,55,0.4)] transition-all flex items-center justify-center gap-1.5 cursor-pointer" id="submit-rsvp-btn" type="submit">
                                        <span class="material-symbols-outlined text-[16px]">send</span>
                                        <span>Kirim Konfirmasi Reservasi</span>
                                    </button>
                                </div>

                                <p class="hidden text-center text-xs text-primary bg-primary/10 py-2 px-3 rounded-lg mt-2 border border-primary/30" id="rsvp-success-msg">
                                    ✓ Konfirmasi Anda telah berhasil tercatat dalam Sistem Protokol Presidium. Terima kasih atas partisipasi Anda.
                                </p>
                            </form>

                            <!-- Wishes Feed Container -->
                            <div class="mt-5 pt-3 border-t border-primary/20">
                                <span class="text-[11px] font-bold text-primary uppercase tracking-wider block mb-2">Untaian Doa &amp; Apresiasi Tamu</span>
                                <div id="wishesFeedContainer" class="space-y-2 max-h-48 overflow-y-auto pr-1" style="scrollbar-width: thin;">
                                    @forelse($wishes as $w)
                                        <div class="bg-surface-container/80 p-2.5 rounded-lg border border-primary/15 text-left">
                                            <div class="flex items-center justify-between mb-0.5">
                                                <b class="text-[11px] text-on-surface font-semibold">{{ $w->name ?? 'Mitra Delegasi' }}</b>
                                                <span class="text-[9px] text-primary bg-primary/10 px-2 py-0.5 rounded font-mono">{{ $w->attendance ?? 'Hadir' }}</span>
                                            </div>
                                            <p class="text-[11px] text-on-surface-variant leading-relaxed">"{{ $w->message ?? '' }}"</p>
                                        </div>
                                    @empty
                                        <div class="bg-surface-container/80 p-2.5 rounded-lg border border-primary/15 text-left">
                                            <div class="flex items-center justify-between mb-0.5">
                                                <b class="text-[11px] text-on-surface font-semibold">Dewan Pengawas KEKN</b>
                                                <span class="text-[9px] text-primary bg-primary/10 px-2 py-0.5 rounded font-mono">Pasti Hadir</span>
                                            </div>
                                            <p class="text-[11px] text-on-surface-variant leading-relaxed">"Selamat dan sukses atas penyelenggaraan Nocturne Flora Gala 2025. Teruslah berkarya untuk nusantara."</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 7: DANA ABADI & FILANTROPI KOMUNITAS
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 py-5 sm:py-8 w-full" id="donasi-section">
                <div class="rounded-2xl bg-surface-container p-4 sm:p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-5 shadow-xl border border-primary/20">
                    <div class="max-w-xl text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start gap-1.5 text-primary mb-1">
                            <span class="material-symbols-outlined text-[18px]">account_balance</span>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest">Partisipasi &amp; Filantropi</span>
                        </div>
                        <h3 class="font-headline text-lg sm:text-xl text-on-surface font-semibold">
                            Dana Abadi &amp; Konservasi Bakti Nusantara
                        </h3>
                        <p class="text-xs sm:text-sm text-on-surface-variant mt-1.5 leading-relaxed">
                            Bagi para patron dan mitra yang berkehendak mendukung beasiswa generasi kreator muda serta pelestarian inovasi nusantara, kontribusi dapat disalurkan melalui rekening resmi:
                        </p>
                    </div>

                    <!-- Bank Card with Copy Action -->
                    <div class="bg-surface-container-high/80 rounded-xl p-3.5 sm:p-4 flex flex-col gap-1 w-full sm:w-auto sm:min-w-[280px] shadow-md border border-primary/20">
                        <div class="flex items-center justify-between text-on-surface-variant">
                            <span class="text-[10px] uppercase font-bold text-primary">{{ $bankName }}</span>
                            <span class="text-[10px] text-primary bg-primary/15 px-2 py-0.5 rounded font-medium">Rekening Resmi</span>
                        </div>
                        <div class="font-headline text-base sm:text-lg text-on-surface font-mono tracking-wider my-0.5" id="bank-number">
                            {{ $bankAccount }}
                        </div>
                        <span class="text-[10px] sm:text-[11px] text-on-surface-variant">a.n. {{ $bankHolder }}</span>
                        <button class="mt-2 py-1.5 px-3 bg-surface-container-highest hover:bg-primary hover:text-on-primary text-on-surface text-[10px] uppercase font-bold rounded transition-colors flex items-center justify-center gap-1.5 shadow-sm cursor-pointer border border-primary/20" id="copy-bank-btn" onclick="copyToClipboard('{{ preg_replace('/[^0-9]/', '', $bankAccount) }}', 'Nomor Rekening {{ $bankName }} telah disalin.')" type="button">
                            <span class="material-symbols-outlined text-[14px]">content_copy</span>
                            <span>Salin Nomor Rekening</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- ========================================================
                 SECTION 8: PENUTUP & UCAPAN TAKZIM
                 ======================================================== -->
            <section class="relative max-w-[1200px] mx-auto px-3 sm:px-6 py-6 sm:py-10 w-full text-center">
                <div class="max-w-2xl mx-auto flex flex-col items-center">
                    <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center mb-2.5 shadow-md border border-primary/30">
                        <span class="material-symbols-outlined text-primary text-[18px]">spa</span>
                    </div>
                    <h3 class="font-headline text-lg sm:text-2xl text-on-surface font-semibold">
                        Terima Kasih atas Sinergi &amp; Dedikasi Anda
                    </h3>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-1.5 leading-relaxed">
                        Merupakan suatu kehormatan dan kebahagiaan tak terhingga bagi kami untuk menyambut kehadiran Anda di malam penuh kehangatan, inspirasi, dan apresiasi bersama.
                    </p>
                    <div class="mt-3.5 pt-3.5 border-t border-primary/20 flex flex-col items-center gap-1">
                        <span class="text-[10px] sm:text-xs text-primary tracking-widest uppercase font-bold">Panitia Pelaksana Nocturne Gala 2025</span>
                        <span class="text-[10px] sm:text-[11px] text-on-surface-variant">Dewan Presidium &amp; Komite Kehormatan {{ $orgName }}</span>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- ========================================================
         FOOTER
         ======================================================== -->
    <footer class="w-full bg-surface-container-lowest relative mt-6 border-t border-primary/20">
        <div class="max-w-[1200px] mx-auto px-3 sm:px-6 py-6 sm:py-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start mb-6">
                <div class="md:col-span-5 flex flex-col gap-1.5">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[20px]">local_florist</span>
                        <span class="font-headline text-base sm:text-lg text-on-surface tracking-wide">The Nocturne Gala</span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-on-surface-variant max-w-sm leading-relaxed">
                        Perayaan tahunan apresiasi karya, inovasi, dan kemitraan kolaboratif. Dibuat dengan dedikasi di Jawa Timur, Indonesia.
                    </p>
                    <span class="text-[9px] sm:text-[10px] text-primary uppercase font-bold mt-0.5">Patron Protocol &amp; Formal Dress Required</span>
                </div>

                <div class="md:col-span-4 flex flex-col gap-1">
                    <span class="text-[9px] sm:text-[10px] text-primary tracking-widest uppercase font-bold mb-0.5">Presidium &amp; Komite Kehormatan</span>
                    <p class="text-xs text-on-surface-variant">{{ $orgName }}</p>
                    <p class="text-[11px] text-on-surface-variant mt-0.5">Bernaung dalam gerakan kolaborasi ekosistem kreatif nusantara.</p>
                </div>

                <div class="md:col-span-3 flex flex-col gap-1">
                    <span class="text-[9px] sm:text-[10px] text-primary tracking-widest uppercase font-bold mb-0.5">Meja Narahubung VIP</span>
                    <span class="text-xs text-on-surface-variant flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[14px] text-primary">mail</span>
                        concierge@kekn.org
                    </span>
                    <span class="text-xs text-on-surface-variant flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[14px] text-primary">call</span>
                        WhatsApp VIP (+62 811-2025-9988)
                    </span>
                    <span class="text-[10px] sm:text-[11px] text-on-surface-variant mt-0.5">Jawa Timur, Indonesia</span>
                </div>
            </div>

            <div class="pt-3.5 flex flex-col sm:flex-row items-center justify-between gap-2.5 bg-surface-container-low/40 rounded-xl px-3.5 py-2 border border-primary/10">
                <span class="text-[10px] sm:text-[11px] text-on-surface-variant text-center sm:text-left">© 2025 {{ $orgName }}. All rights reserved. By Invitation Only.</span>
                <nav class="flex items-center gap-3.5 text-xs">
                    <a class="text-primary font-bold hover:underline" href="#invitation-body">Undangan</a>
                    <a class="text-on-surface-variant hover:text-primary transition-colors" href="#agenda-acara">Rundown</a>
                    <a class="text-on-surface-variant hover:text-primary transition-colors" href="#rsvp-section">Reservasi</a>
                </nav>
            </div>
        </div>
    </footer>

    </div><!-- /#main-invitation-wrapper -->

    <!-- ========================================================
         JAVASCRIPT MICRO-INTERACTIONS & LIVE PREVIEW SYNC
         ======================================================== -->
    <script>
        let isAudioPlaying = false;
        const audioElement = document.getElementById('invitationAudio');
        const audioStickyIcon = document.getElementById('audioStickyIcon');

        function playAudio() {
            if (audioElement) {
                audioElement.play().then(() => {
                    isAudioPlaying = true;
                    if (audioStickyIcon) {
                        audioStickyIcon.classList.add('animate-spin');
                        audioStickyIcon.textContent = 'music_note';
                    }
                }).catch(e => {
                    console.log('Autoplay notice:', e);
                });
            }
        }

        function pauseAudio() {
            if (audioElement) {
                audioElement.pause();
                isAudioPlaying = false;
                if (audioStickyIcon) {
                    audioStickyIcon.classList.remove('animate-spin');
                    audioStickyIcon.textContent = 'music_off';
                }
            }
        }

        function toggleAudio() {
            if (isAudioPlaying) {
                pauseAudio();
            } else {
                playAudio();
            }
        }

        function triggerOpenEnvelope() {
            const envelopeCover = document.getElementById('envelope-cover');
            const envelopeFlap = document.getElementById('envelope-flap');
            const stickyBar = document.getElementById('sticky-bar');
            const mainWrapper = document.getElementById('main-invitation-wrapper');

            // 1. Animate envelope flap & wax seal
            if (envelopeFlap) {
                envelopeFlap.classList.add('-rotate-180', 'opacity-30');
            }

            // 2. Unhide main content and trigger smooth fade in
            if (mainWrapper) {
                mainWrapper.classList.remove('hidden');
                void mainWrapper.offsetWidth; // Force browser layout reflow
                mainWrapper.classList.remove('opacity-0');
                mainWrapper.classList.add('opacity-100');
            }

            // 3. Unlock document scrolling
            document.body.classList.remove('overflow-hidden');
            document.documentElement.classList.remove('overflow-hidden');

            // 4. Slide & fade out cover overlay smoothly
            if (envelopeCover) {
                envelopeCover.classList.add('opacity-0', 'pointer-events-none', '-translate-y-full');
                setTimeout(() => {
                    envelopeCover.classList.add('hidden');
                    window.scrollTo({ top: 0, behavior: 'instant' });
                    document.documentElement.scrollTop = 0;
                    document.body.scrollTop = 0;
                }, 700);
            }

            // 5. Reveal sticky VIP navigation bar
            if (stickyBar) {
                stickyBar.classList.remove('opacity-0', 'pointer-events-none');
                stickyBar.classList.add('opacity-100');
            }

            // 6. Play ambient background audio
            playAudio();
        }

        // Global aliases for maximum compatibility
        function openInvitation() {
            triggerOpenEnvelope();
        }
        window.openInvitation = triggerOpenEnvelope;
        window.triggerOpenEnvelope = triggerOpenEnvelope;

        function copyToClipboard(text, msg) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showToast(msg || 'Berhasil disalin ke clipboard');
                }).catch(() => {
                    fallbackCopy(text, msg);
                });
            } else {
                fallbackCopy(text, msg);
            }
        }

        function fallbackCopy(text, msg) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            showToast(msg || 'Berhasil disalin');
        }

        function showToast(text) {
            const toast = document.getElementById('toastNotification');
            const toastMessage = document.getElementById('toastMessage');
            if (toast && toastMessage) {
                toastMessage.textContent = text;
                toast.classList.remove('hidden', 'toast-active');
                void toast.offsetWidth;
                toast.classList.add('toast-active');
                setTimeout(() => {
                    toast.classList.add('hidden');
                    toast.classList.remove('toast-active');
                }, 2800);
            }
        }

        // AJAX RSVP Handling
        const rsvpForm = document.getElementById('gala-rsvp-form');
        if (rsvpForm) {
            rsvpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = document.getElementById('submit-rsvp-btn');
                const originalContent = submitBtn ? submitBtn.innerHTML : '';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="material-symbols-outlined text-[16px] animate-spin">refresh</span><span>Memproses...</span>';
                }

                const formData = new FormData(rsvpForm);
                fetch(rsvpForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    const successMsg = document.getElementById('rsvp-success-msg');
                    if (successMsg) successMsg.classList.remove('hidden');

                    const feed = document.getElementById('wishesFeedContainer');
                    if (feed) {
                        const name = formData.get('name') || 'Mitra Delegasi';
                        const message = formData.get('message') || '';
                        const attend = formData.get('attendance') || 'Hadir';

                        const item = document.createElement('div');
                        item.className = 'bg-surface-container/80 p-2.5 rounded-lg border border-primary/15 text-left';
                        item.innerHTML = `
                            <div class="flex items-center justify-between mb-0.5">
                                <b class="text-[11px] text-on-surface font-semibold">${name}</b>
                                <span class="text-[9px] text-primary bg-primary/10 px-2 py-0.5 rounded font-mono">${attend}</span>
                            </div>
                            <p class="text-[11px] text-on-surface-variant leading-relaxed">"${message}"</p>
                        `;
                        feed.prepend(item);
                    }
                    showToast('Konfirmasi reservasi berhasil dikirim!');
                })
                .catch(() => {
                    const successMsg = document.getElementById('rsvp-success-msg');
                    if (successMsg) successMsg.classList.remove('hidden');
                    showToast('Terima kasih atas konfirmasi kehadiran Anda!');
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalContent;
                    }
                });
            });
        }

        // Live Dynamic Gallery Renderer
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !Array.isArray(images) || images.length === 0) return;
            grid.innerHTML = '';
            images.forEach((url, idx) => {
                const item = document.createElement('div');
                item.className = 'relative rounded-xl overflow-hidden aspect-[4/3] shadow-lg group border border-primary/15 bg-surface-container';
                item.innerHTML = `
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="${url}" alt="Dokumentasi ${idx + 1}">
                    <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/90 via-surface-container-lowest/30 to-transparent flex flex-col justify-end p-3">
                        <span class="text-[9px] text-primary uppercase font-bold tracking-wider">Momen ${idx + 1}</span>
                        <span class="text-xs sm:text-sm font-semibold text-on-surface">Dokumentasi Acara Komunitas</span>
                    </div>
                `;
                grid.appendChild(item);
            });
        }

        // Live Dynamic Events / Itinerary Renderer
        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = '';
            events.forEach((ev, idx) => {
                const node = document.createElement('div');
                node.className = 'relative pl-9 sm:pl-16 group';
                node.innerHTML = `
                    <div class="absolute left-3.5 sm:left-6 top-2 w-3.5 h-3.5 rounded-full bg-primary shadow-[0_0_12px_rgba(212,175,55,0.8)] -translate-x-1/2"></div>
                    <div class="bg-surface-container rounded-xl p-3 sm:p-4 shadow-md group-hover:bg-surface-container-high transition-all border border-primary/10">
                        <div class="flex flex-wrap items-center justify-between gap-1 mb-1">
                            <span class="text-[10px] sm:text-xs text-primary uppercase font-bold tracking-wider">
                                ${ev.start_time || ''} ${ev.end_time ? '– ' + ev.end_time : ''}
                            </span>
                            <span class="text-[9px] sm:text-[10px] bg-surface-container-highest px-2 py-0.5 rounded text-on-surface-variant font-medium">
                                ${ev.venue_name || 'Ballroom'}
                            </span>
                        </div>
                        <h4 class="font-headline text-sm sm:text-base text-on-surface font-semibold">
                            ${ev.title || 'Agenda Sesi ' + (idx + 1)}
                        </h4>
                        <p class="text-xs text-on-surface-variant mt-1 leading-relaxed">
                            ${ev.address || ev.description || 'Deskripsi agenda protokoler resmi.'}
                        </p>
                    </div>
                `;
                container.appendChild(node);
            });
        }

        const defaultCoverImg = "{{ $coverImg }}";
        const defaultPresidiumImg = "{{ $presidiumImg }}";

        // Listen for postMessage from Builder Live Preview
        window.addEventListener('message', function(event) {
            if (!event.data) return;
            const data = event.data;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl;

                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCover');
                    if (coverEl) coverEl.src = photoUrl;
                } else if (target === 'groom' || target === 'bride' || target === 'presidium' || target === 'speaker' || target === 'logo' || target === 'person') {
                    const photoEl = document.getElementById('previewGroomPhotoImg');
                    if (photoEl) photoEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover') {
                    const coverEl = document.getElementById('previewCover');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'bride' || target === 'presidium' || target === 'speaker' || target === 'logo' || target === 'person') {
                    const photoEl = document.getElementById('previewGroomPhotoImg');
                    if (photoEl) photoEl.src = defaultPresidiumImg;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_EVENTS') {
                if (Array.isArray(data.events)) {
                    renderDynamicEvents(data.events);
                }
            } else if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const value = data.value;
                if (field === 'groom_name') {
                    const el = document.getElementById('previewGroomName');
                    if (el) el.textContent = value;
                } else if (field === 'bride_name') {
                    const el = document.getElementById('previewBrideName');
                    if (el) el.textContent = value;
                } else if (field === 'event_heading') {
                    const el = document.getElementById('previewEventHeading');
                    const el2 = document.getElementById('previewHeadingCover');
                    if (el) el.textContent = value;
                    if (el2) el2.textContent = value;
                } else if (field === 'quote' || field === 'event_quote') {
                    const el = document.getElementById('previewEventQuote');
                    if (el) el.textContent = value;
                } else if (field === 'guest_name') {
                    const el = document.getElementById('previewGuestNameCover');
                    const inp = document.getElementById('rsvp-name');
                    if (el) el.textContent = value;
                    if (inp) inp.value = value;
                }
            }
        });

        // Handshake with parent builder frame
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
        }
    </script>
</body>
</html>
