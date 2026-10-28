<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ($couple->event_heading ?? 'Sakura Reverie XVII') . ' - ' . ($couple->groom_name ?? 'Valerie Chloe') }} | D'Karsa</title>
    <meta name="description" content="Sweet Seventeen Celebration of {{ $couple->groom_name ?? 'Valerie Chloe' }} - Sakura Reverie."/>

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet"/>

    <!-- Tailwind CSS with Cherry Blossom Palette -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#981652",
                        "on-primary": "#ffffff",
                        "primary-container": "#b8336a",
                        "on-primary-container": "#ffdfe6",
                        "secondary": "#8a4a65",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#ffb0ce",
                        "on-secondary-container": "#7c3f59",
                        "secondary-fixed": "#ffd9e5",
                        "on-secondary-fixed": "#390721",
                        "tertiary": "#941e53",
                        "on-tertiary": "#ffffff",
                        "surface": "#fff8f8",
                        "on-surface": "#2b1422",
                        "surface-variant": "#ffd8eb",
                        "on-surface-variant": "#574147",
                        "surface-container": "#ffe8f2",
                        "surface-container-low": "#fff0f5",
                        "surface-container-high": "#ffe0ee",
                        "surface-container-highest": "#ffd8eb",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#8a7177",
                        "outline-variant": "#ddbfc6",
                        "background": "#fff8f8",
                        "on-background": "#2b1422"
                    },
                    fontFamily: {
                        "bodoni": ["'Bodoni Moda'", "serif"],
                        "garamond": ["'EB Garamond'", "serif"],
                        "work": ["'Work Sans'", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #fff8f8;
            color: #2b1422;
            overflow-x: hidden;
            font-family: 'EB Garamond', serif;
            -webkit-tap-highlight-color: transparent;
        }

        * {
            box-sizing: border-box;
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

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased overflow-hidden">

    @php
        $celebrantName = $couple->groom_name ?? 'Valerie Chloe';
        $celebrantNick = $couple->groom_nickname ?? 'Valerie';
        $heading = $couple->event_heading ?? 'Sakura Reverie XVII';
        $subCategoryBadge = !empty($couple->sub_category) ? $couple->sub_category : 'Sweet Seventeen Celebration';
        $guestName = $guest->name ?? request('to') ?? request('guest') ?? 'Jonathan & Partner';
        $quote = $couple->quote ?? 'Like cherry blossoms in spring, seventeen arrives with grace, dreams, and radiant beginnings.';

        $defaultCoverImg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJhtrSUcdvHwhkHrBrClKMrW5a8kpnKOnlh-6q-0hx9sEyhBV9GOT_8sDq3n04GcWPXbnQ8A9f432QivdnFhH96RmmhwfhahULsBf0O2savDB2VAFE5qiAcNfM6CXTOO-ipu8s0qMJqxaWJPruQkbFN2BRVFEA5DHO7DqujCeVzTiQHVAUcO9MjJyyHUQdkkVdcUjVa4bLFXm_EDbgsmOv5AVsYC6QxoqwBNWf-u_f';
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->cover_photo ?? null,
            $defaultCoverImg
        );
        $defaultProfileImg = $defaultCoverImg;
        $profileImg = \App\Services\TemplateManager::resolvePhotoUrl(
            $couple->groom_photo ?? null,
            $coverImg
        );

        $monogramImg = 'https://lh3.googleusercontent.com/aida/AEtjO1VE8j-xrK67GDkn2lmVk8GH3pWqVZvExsmPZXDycSfMy_ajZS_VGbThF4PT1QJN2cau1VrFbXJ1ZNORJXastjUI3r01kP1tJzWX6jtGZu9Yz5u22taFNRONZ_-DxctOiuAlOelxrspdEKPbW7IwSZ4G-lEsc88fLWi2ah9tcFwhkXXiJ52vFtSSu6J7ZejZ0DvgHxVMFoBwRG3cab679QTBlM9ldT-iJn7tI9Rxjwq4';

        $audioUrl = !empty($couple->music_url)
            ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url))
            : asset('audio/celebration-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(1);
        $eventDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $eventTimeFormatted = !empty($couple->wedding_time) ? $couple->wedding_time : '18.30 WIB - Selesai';

        $venueName = $couple->venue_name ?? 'The St. Regis Grand Ballroom';
        $venueAddress = $couple->venue_address ?? 'Rajawali Place, Jl. H. R. Rasuna Said Kav. B/4, Setiabudi, Jakarta Selatan, DKI Jakarta 12950';
        $mapsUrl = !empty($couple->google_maps_url) ? $couple->google_maps_url : (!empty($couple->maps_url) ? $couple->maps_url : ('https://maps.google.com/?q=' . urlencode(($venueName ?? '') . ' ' . ($venueAddress ?? ''))));

        $familyLine = !empty($couple->groom_parents) ? $couple->groom_parents : (!empty($couple->groom_father) && !empty($couple->groom_mother) ? ('Bpk. ' . $couple->groom_father . ' & Ibu ' . $couple->groom_mother) : 'Keluarga Besar Handoko');

        // Bank / Digital Gift Info
        $bankName1 = $couple->bank_name_1 ?? $couple->bank_name ?? 'Bank BCA';
        $bankAccount1 = $couple->bank_account_1 ?? $couple->account_number ?? '873 019 4421';
        $bankHolder1 = $couple->bank_holder_1 ?? $couple->account_name ?? 'Valerie Chloe Handoko';

        $bankName2 = $couple->bank_name_2 ?? 'Bank Mandiri';
        $bankAccount2 = $couple->bank_account_2 ?? '137 00 2938 1092';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Valerie Chloe Handoko';

        // Dynamic Galleries
        $activeGalleries = collect($galleries ?? $couple->galleries ?? []);
        if ($activeGalleries->isEmpty()) {
            $activeGalleries = collect([
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCwl95-PpdynC6dSm3krwqk19-gLNppbfdFsTIvjMvxTbRQd2tnr5YP09-dAm46kwoRr7VFpixG_Dkpsq3P7H40soAmO3H3d2RaYGAiu4gfEKK_jIK1UUhoNN1z5WdyYmIuCK-VUvuLiPffOT_AqWMqXhoCLAtY79uCbOobX-kUhSMafvW3BelUo8jJ3SIBCOhs7BCi0yqRHzm60jcnjvANmRj1JN9oRp7sWN3stLah', 'caption' => 'Chapter XVII • The Debut', 'subtitle' => 'Bloom of Youth'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBowQhecJK1YEViJauscIjLhSHjh_6TGwuo8DAsGK182rIionnravxZFynvGpPtZ1q0yEMG8y1Pse70B9nGkFa8sv2fwcCxWP2YZBE5rCx4VYx8L3eO0XdfX90Tr3h7hn83FkHuRJnnPhlB4vadudFLAarKDTG3M1xs9JVm83VhrbgQ5feXXvlFgjni54sKPfkRsLbK4_sCZL-7GhDMTdBkwqZii-_CrXp27jSnuT-x', 'caption' => 'Spring Prelude', 'subtitle' => 'Masa Kecil Penuh Tawa'],
                (object)['image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDj6fJaNRv3xkvP_Rdhe1DiwzZZNcw42QQSYZTVhlLkr9ZnYYs41tbTfi87eVQGU1K3s8D0Qgu8sVJnKizMduJcbQ3fwjjYCy2whX98T-PQLj_kB-EwJDCOXdRwP-n-ovqVVd54A4gRCckm9Nk7QitVvbqZBOVw4tFUdntOe8RfFZXX8BfPBMjicKVYyqJfF7n4XffOmRBFgsmC0yC9e9X2qARxSCt8AV4FPun8MkqY', 'caption' => 'Gala Rehearsal', 'subtitle' => 'Langkah Anggun Menuju 17'],
            ]);
        }

        // Dynamic Events
        $activeEvents = collect($couple->events ?? []);
        if ($activeEvents->isEmpty()) {
            $activeEvents = collect([
                (object)[
                    'title' => 'Red Carpet & Cocktail Reception',
                    'date' => $eventDateFormatted,
                    'start_time' => '18:30 WIB',
                    'end_time' => '19:30 WIB',
                    'venue_name' => $venueName,
                    'address' => 'The St. Regis Grand Ballroom — Sesi potret photo wall eksklusif & penyambutan tamu kehormatan.',
                    'maps_url' => $mapsUrl,
                    'sort_order' => 1,
                ],
                (object)[
                    'title' => 'Opening Ceremony & 17 Wishes Toast',
                    'date' => $eventDateFormatted,
                    'start_time' => '19:30 WIB',
                    'end_time' => '21:30 WIB',
                    'venue_name' => 'Main Ballroom Stage',
                    'address' => 'Prosesi perayaan 17 lilin, sambutan keluarga besar, dinner banquet & ramah tamah.',
                    'maps_url' => $mapsUrl,
                    'sort_order' => 2,
                ],
            ]);
        }
    @endphp

    <!-- Background Audio Element -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- Feedback Toast -->
    <div id="toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 max-w-xs px-4 py-2.5 rounded-xl bg-on-surface text-surface text-xs font-medium text-center opacity-0 pointer-events-none transition-opacity duration-300 z-[120] shadow-2xl flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-secondary-container text-[18px]">verified</span>
        <span id="toast-message">Teks berhasil disalin</span>
    </div>

    <!-- ========================================================
         COVER SCREEN: DIGITAL ENVELOPE (Tampilan Awal Amplop)
         ======================================================== -->
    <div id="invitation-cover" class="fixed inset-0 z-50 overflow-y-auto overscroll-contain bg-surface flex flex-col items-center justify-between px-4 py-6 transition-all duration-700 ease-in-out select-none">
        <!-- Floating Petals Blur Decoration -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute -top-6 left-8 w-12 h-12 rounded-full bg-secondary-container/25 blur-xl animate-pulse"></div>
            <div class="absolute top-1/4 right-3 w-16 h-16 rounded-full bg-primary/20 blur-2xl"></div>
            <div class="absolute bottom-1/3 left-2 w-20 h-20 rounded-full bg-surface-container-high/40 blur-2xl"></div>
        </div>

        <div class="relative z-10 flex flex-col items-center w-full max-w-md mx-auto pt-2">
            <!-- 1. Top Editorial Issue Header -->
            <header class="flex flex-col items-center text-center space-y-1 py-3 w-full">
                <div class="inline-flex items-center space-x-2 px-3 py-1 bg-surface-container-low rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
                    <p class="font-work text-[10px] tracking-widest text-on-surface-variant uppercase font-semibold">
                        ISSUE NO. 17 • SAKURA REVERIE EDITION
                    </p>
                </div>
                <div class="w-12 h-px bg-primary/20 my-1"></div>
            </header>

            <!-- 2. Centered Prominent Luxury Monogram / Cover Photo -->
            <div class="relative my-3 flex items-center justify-center">
                <div class="absolute inset-0 rounded-full bg-surface-container-high/60 blur-md scale-110"></div>
                <div class="relative p-1.5 rounded-full bg-surface-container-lowest shadow-sm flex items-center justify-center">
                    <div class="relative w-28 h-28 rounded-full overflow-hidden flex items-center justify-center bg-surface-container-low border border-outline-variant/30">
                        <img id="previewCoverPhotoImg" alt="Cover Photo" class="w-full h-full object-cover rounded-full" src="{{ $coverImg }}"/>
                    </div>
                </div>
                <!-- Japanese Hanko Style Stamp Badge -->
                <div class="absolute -bottom-1 -right-2 bg-primary text-on-primary font-work text-[10px] px-2 py-0.5 rounded shadow-sm flex items-center space-x-0.5 font-bold">
                    <span>XVII</span>
                    <span class="text-[8px] opacity-75">印</span>
                </div>
            </div>

            <!-- 3. Debutante Editorial Title Hierarchy -->
            <div class="text-center my-3 px-2">
                <p id="previewSubCategoryCover" class="font-work text-[11px] text-secondary uppercase tracking-[0.25em] mb-1 font-semibold">
                    {{ $subCategoryBadge }}
                </p>
                <h1 id="previewGroomNameCover" class="font-bodoni text-[36px] sm:text-[42px] text-on-surface tracking-tight leading-none mb-2 font-normal">
                    {{ $celebrantName }}
                </h1>
                <p id="previewQuoteCover" class="font-garamond text-base text-on-surface-variant italic max-w-xs mx-auto">
                    “{{ $quote }}”
                </p>
            </div>

            <!-- 4. Luxury Digital Envelope Card -->
            <div class="w-full bg-surface-container-lowest rounded-xl shadow-md p-5 my-3 relative overflow-hidden transition-all duration-300 border border-outline-variant/30">
                <div class="flex items-center justify-between mb-4">
                    <div class="inline-flex items-center space-x-1.5 bg-surface-container-high px-2.5 py-1 rounded-full">
                        <span class="material-symbols-outlined text-[13px] text-primary">spa</span>
                        <span class="font-work text-[10px] text-primary tracking-widest uppercase font-semibold">VIP INVITATION</span>
                    </div>
                    <div class="flex items-center space-x-1 text-secondary">
                        <span class="font-work text-[10px] tracking-widest uppercase font-medium">PRIVATE ACCESS</span>
                    </div>
                </div>

                <!-- Recipient Attention Section -->
                <div class="bg-surface-container-low rounded-lg p-4 text-center my-2 relative">
                    <p class="font-work text-on-surface-variant tracking-widest text-[10px] uppercase mb-1 font-medium">
                        KEPADA YTH. BAPAK / IBU / SAUDARA/I :
                    </p>
                    <div class="py-1">
                        <p id="previewGuestNameCover" class="font-bodoni text-2xl text-primary font-medium tracking-tight">
                            {{ $guestName }}
                        </p>
                        <span class="inline-block mt-0.5 font-garamond text-sm text-secondary italic">
                            Di Tempat
                        </span>
                    </div>
                </div>

                <p class="font-garamond text-sm text-on-surface-variant text-center my-3 leading-relaxed px-1">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran Anda untuk merayakan mekarnya usia ketujuh belas yang penuh memori indah.
                </p>

                <!-- Wax Seal Monogram Accent Row -->
                <div class="flex items-center justify-center space-x-3 my-2">
                    <div class="w-8 h-px bg-surface-container-high"></div>
                    <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bodoni text-[11px] shadow-sm font-bold">
                        <span>XVII</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center text-[12px]">
                        <span class="material-symbols-outlined text-primary text-[14px]">local_florist</span>
                    </div>
                    <div class="w-8 h-px bg-surface-container-high"></div>
                </div>
            </div>

            <!-- 5. Primary Call To Action Button -->
            <div class="w-full flex flex-col items-center space-y-3 mt-1">
                <button id="open-envelope-btn" type="button" class="w-full bg-primary hover:bg-primary-container text-on-primary py-3.5 px-6 rounded-full shadow-lg active:scale-95 transition transform duration-150 flex items-center justify-center space-x-2 font-work text-[12px] tracking-[0.2em] uppercase font-semibold">
                    <span class="material-symbols-outlined text-lg">mail</span>
                    <span>BUKA UNDANGAN</span>
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </button>

                <!-- Music Autoplay Toggle Pill Badge -->
                <div class="flex items-center space-x-2 bg-surface-container-high/80 px-3.5 py-1.5 rounded-full cursor-pointer transition hover:bg-surface-container-highest" id="music-indicator">
                    <span class="material-symbols-outlined text-primary text-sm animate-bounce">graphic_eq</span>
                    <span class="font-work text-[11px] text-on-surface-variant truncate">
                        Putar Musik Latar Otomatis
                    </span>
                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                </div>
            </div>

            <!-- 6. Bottom Metadata & Location Summary -->
            <footer class="mt-6 text-center space-y-1 w-full pb-2">
                <div class="inline-flex items-center justify-center space-x-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-sm text-primary">calendar_today</span>
                    <p class="font-work tracking-widest text-[10px] uppercase font-semibold">
                        {{ $eventDateFormatted }}
                    </p>
                </div>
                <div>
                    <p class="font-work text-[10px] text-secondary tracking-widest uppercase">
                        {{ $venueName }}
                    </p>
                </div>
            </footer>
        </div>
    </div>

    <!-- ========================================================
         MAIN SCREEN: ISI UNDANGAN UTAMA (Sakura Reverie XVII)
         ======================================================== -->
    <div id="main-invitation-wrapper" class="w-full min-h-screen bg-surface relative pb-28 opacity-0 transition-opacity duration-700">

        <!-- Fixed Top Floating Header -->
        <header class="fixed top-0 inset-x-0 z-40 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
            <div class="h-16 px-4 max-w-md mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img id="previewGroomPhotoHeader" alt="{{ $celebrantName }}" class="h-8 w-8 rounded-full object-cover border border-primary/20 shadow-sm" src="{{ $profileImg }}"/>
                    <div class="flex flex-col">
                        <span id="previewGroomNameHeader" class="font-work text-[11px] text-primary tracking-[0.2em] uppercase font-semibold">{{ $celebrantName }}</span>
                        <span class="font-bodoni text-sm text-on-surface tracking-tight -mt-0.5">Undangan Ulang Tahun</span>
                    </div>
                </div>
                <div class="flex items-center gap-1.5">
                    <button id="headerMusicToggle" aria-label="Toggle Music" class="w-10 h-10 flex items-center justify-center rounded-full text-primary hover:bg-surface-container transition-colors">
                        <span id="headerMusicIcon" class="material-symbols-outlined text-[20px] animate-pulse">music_note</span>
                    </button>
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary">
                        <span class="material-symbols-outlined text-[16px]">celebration</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Stream Container (Strictly bounded to max-w-md mx-auto) -->
        <main class="w-full max-w-md mx-auto px-4 pt-20 space-y-8">

            <!-- 1. Editorial Hero Section -->
            <section class="flex flex-col items-center text-center pt-2">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed mb-4">
                    <span class="material-symbols-outlined text-[14px]">local_florist</span>
                    <span id="previewSubCategoryBadge" class="font-work text-[10px] tracking-[0.2em] uppercase font-semibold">
                        {{ $subCategoryBadge }}
                    </span>
                </div>

                <!-- Editorial Arch Framing -->
                <div class="relative w-full max-w-[320px] aspect-[4/5] rounded-t-full rounded-b-2xl overflow-hidden shadow-xl bg-surface-container-high border-2 border-surface-container">
                    <img id="previewGroomPhotoImg" class="w-full h-full object-cover object-top" src="{{ $profileImg }}" alt="{{ $celebrantName }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-on-surface/70 via-transparent to-transparent flex flex-col justify-end p-4 text-left">
                        <span class="font-work text-surface-container text-[10px] uppercase tracking-[0.25em] font-semibold">{{ $heading }}</span>
                        <span id="previewGroomNameHero" class="font-bodoni text-2xl text-surface font-normal italic">{{ $celebrantName }}</span>
                    </div>
                </div>

                <div class="mt-4 flex flex-col items-center">
                    <h1 id="previewGroomNameTitle" class="font-bodoni text-3xl sm:text-4xl text-on-surface tracking-tight font-medium">
                        {{ $celebrantName }}
                    </h1>
                    <p class="font-work text-xs text-primary tracking-[0.25em] uppercase mt-1.5 font-semibold">
                        Celebrating 17 Blossoming Years
                    </p>
                    <div class="w-12 h-px bg-outline-variant my-3.5"></div>
                    <p id="previewQuote" class="font-garamond text-base sm:text-lg italic text-on-surface-variant max-w-xs leading-relaxed">
                        “{{ $quote }}”
                    </p>
                </div>
            </section>

            <!-- 2. Guest Honor Card (Tamu Kehormatan) -->
            <section class="bg-surface-container-low rounded-2xl p-5 text-center shadow-sm relative overflow-hidden border border-outline-variant/30">
                <div class="absolute -right-6 -bottom-6 opacity-10 text-primary pointer-events-none">
                    <span class="material-symbols-outlined text-[130px]">spa</span>
                </div>
                <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Kepada Yth. Tamu Kehormatan</span>
                <h2 id="previewGuestNameMain" class="font-bodoni text-2xl text-on-surface mt-2 font-medium">
                    {{ $guestName }}
                </h2>
                <div class="w-8 h-px bg-outline-variant mx-auto my-3"></div>
                <p class="font-garamond text-sm sm:text-base text-on-surface-variant leading-relaxed">
                    Merupakan suatu kehormatan dan kebahagiaan yang tak terhingga bagi kami sekeluarga apabila Bapak/Ibu/Sahabat berkenan hadir dan berbagi kehangatan doa pada perayaan musim mekar ke-17 putri kami tercinta.
                </p>
                <p class="font-work text-[11px] text-secondary uppercase tracking-widest mt-2 font-semibold">
                    {{ $familyLine }}
                </p>
            </section>

            <!-- 3. Jadwal Acara & Interactive Countdown -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Rundown & Agenda</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Waktu & Tempat</h2>
                </div>

                <div class="bg-surface-container rounded-2xl p-4 flex flex-col gap-3 shadow-sm border border-outline-variant/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Hari & Tanggal</span>
                            <span id="previewEventDate" class="font-bodoni text-lg text-on-surface font-semibold">{{ $eventDateFormatted }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-[20px]">schedule</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Waktu Resepsi</span>
                            <span id="previewEventTime" class="font-garamond text-base text-on-surface font-medium">{{ $eventTimeFormatted }}</span>
                        </div>
                    </div>
                </div>

                <!-- Live Dynamic Events / Agenda Sesi Cards Container -->
                <div id="itineraryContainer" class="space-y-3">
                    @foreach($activeEvents as $index => $event)
                        @php
                            $evDateStr = $eventDateFormatted;
                            if (!empty($event->date)) {
                                try {
                                    $evDateStr = \Carbon\Carbon::parse($event->date)->locale('id')->isoFormat('dddd, D MMMM Y');
                                } catch (\Exception $e) {
                                    $evDateStr = $event->date;
                                }
                            }
                            $evTimeStr = trim(($event->start_time ?? '') . (!empty($event->end_time) ? ' - ' . $event->end_time : ''));
                            if (empty($evTimeStr)) $evTimeStr = $eventTimeFormatted;
                            $evVenue = $event->venue_name ?? $venueName;
                            $evAddress = $event->address ?? '';
                            $evMaps = !empty($event->maps_url) ? $event->maps_url : $mapsUrl;
                        @endphp
                        <div class="bg-surface-container rounded-2xl p-4 flex flex-col gap-2.5 shadow-sm border border-outline-variant/30 text-left">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-work text-[10px] tracking-wider uppercase font-semibold">
                                    <span class="material-symbols-outlined text-[13px]">celebration</span>
                                    Sesi {{ $index + 1 }}
                                </span>
                                <span class="font-work text-[11px] text-primary font-semibold">{{ $evTimeStr }}</span>
                            </div>
                            <div>
                                <h3 class="font-bodoni text-lg text-on-surface font-semibold leading-snug">{{ $event->title ?? ('Acara ' . ($index + 1)) }}</h3>
                                <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-work mt-1">
                                    <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                                    <span>{{ $evDateStr }}</span>
                                </div>
                            </div>
                            <div class="bg-surface-container-high/60 rounded-xl p-3 flex flex-col gap-1 text-xs">
                                <div class="flex items-start gap-2">
                                    <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                                    <div class="min-w-0">
                                        <span class="font-semibold text-on-surface font-work text-xs block">{{ $evVenue }}</span>
                                        @if(!empty($evAddress))
                                            <p class="text-[11px] text-on-surface-variant font-garamond leading-relaxed mt-0.5">{{ $evAddress }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(!empty($evMaps))
                                <a href="{{ $evMaps }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 w-full py-2 px-3 rounded-xl bg-surface-container-highest hover:bg-primary hover:text-on-primary text-primary text-[11px] font-work uppercase tracking-wider font-semibold border border-outline-variant/30 transition-colors">
                                    <span class="material-symbols-outlined text-[15px]">directions</span>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Countdown Timer Grid -->
                <div class="grid grid-cols-4 gap-2 pt-1" id="countdown-grid">
                    <div class="bg-surface-container-high rounded-xl p-2.5 flex flex-col items-center justify-center shadow-sm">
                        <span class="font-bodoni text-2xl text-primary font-bold" id="cd-days">00</span>
                        <span class="font-work text-[9px] text-on-surface-variant tracking-wider uppercase mt-1 font-semibold">Hari</span>
                    </div>
                    <div class="bg-surface-container-high rounded-xl p-2.5 flex flex-col items-center justify-center shadow-sm">
                        <span class="font-bodoni text-2xl text-primary font-bold" id="cd-hours">00</span>
                        <span class="font-work text-[9px] text-on-surface-variant tracking-wider uppercase mt-1 font-semibold">Jam</span>
                    </div>
                    <div class="bg-surface-container-high rounded-xl p-2.5 flex flex-col items-center justify-center shadow-sm">
                        <span class="font-bodoni text-2xl text-primary font-bold" id="cd-mins">00</span>
                        <span class="font-work text-[9px] text-on-surface-variant tracking-wider uppercase mt-1 font-semibold">Menit</span>
                    </div>
                    <div class="bg-surface-container-high rounded-xl p-2.5 flex flex-col items-center justify-center shadow-sm">
                        <span class="font-bodoni text-2xl text-primary font-bold" id="cd-secs">00</span>
                        <span class="font-work text-[9px] text-on-surface-variant tracking-wider uppercase mt-1 font-semibold">Detik</span>
                    </div>
                </div>

                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($heading . ' - ' . $celebrantName) }}&dates={{ $targetDate->format('Ymd\THis\Z') }}/{{ $targetDate->copy()->addHours(3)->format('Ymd\THis\Z') }}&details={{ urlencode('Sweet Seventeen Celebration of ' . $celebrantName) }}&location={{ urlencode($venueName . ', ' . $venueAddress) }}" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-primary-container text-on-primary rounded-xl py-3 px-4 flex items-center justify-center gap-2 shadow-md transition-all active:scale-[0.98] font-work text-[11px] uppercase tracking-wider font-semibold">
                    <span class="material-symbols-outlined text-[18px]">event</span>
                    <span>Simpan ke Google Calendar</span>
                </a>
            </section>

            <!-- 4. Tema Pesta & Dress Code (Editorial Style Guide) -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Style & Etiquette</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Tema & Tata Busana</h2>
                    <p class="font-garamond text-base italic text-on-surface-variant mt-1 max-w-xs mx-auto">
                        Sakura Reverie: An Enchanted Evening of Cherry Blossoms & Haute Couture
                    </p>
                </div>

                <!-- Color Palette Swatches -->
                <div class="bg-surface-container-low rounded-2xl p-4 shadow-sm border border-outline-variant/30">
                    <span class="font-work text-[10px] text-on-surface-variant tracking-widest uppercase block mb-3 text-center font-semibold">Inspirasi Palet Warna Busana</span>
                    <div class="flex justify-between items-center gap-1.5 px-1">
                        <div class="flex flex-col items-center gap-1">
                            <div class="w-9 h-9 rounded-full bg-[#fce7f0] shadow-sm border border-outline-variant/30"></div>
                            <span class="font-work text-[10px] text-on-surface-variant">Sakura</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="w-9 h-9 rounded-full bg-[#f4a6c4] shadow-sm border border-outline-variant/30"></div>
                            <span class="font-work text-[10px] text-on-surface-variant">Petal</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="w-9 h-9 rounded-full bg-[#b8336a] shadow-sm"></div>
                            <span class="font-work text-[10px] text-on-surface-variant">Rouge</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="w-9 h-9 rounded-full bg-[#e6c887] shadow-sm"></div>
                            <span class="font-work text-[10px] text-on-surface-variant">Champagne</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="w-9 h-9 rounded-full bg-[#2c1523] shadow-sm"></div>
                            <span class="font-work text-[10px] text-on-surface-variant">Plum</span>
                        </div>
                    </div>
                </div>

                <!-- Dress Code Cards -->
                <div class="grid grid-cols-1 gap-3">
                    <div class="bg-surface-container rounded-xl p-4 flex gap-3.5 items-start shadow-sm border border-outline-variant/30">
                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center text-primary shrink-0">
                            <span class="material-symbols-outlined text-[22px]">man</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-work text-[11px] text-primary tracking-widest uppercase font-semibold">Tamu Pria (Gentlemen)</span>
                            <p class="font-garamond text-sm text-on-surface mt-1 leading-snug">
                                Formal Tuxedo / Dark Suit paired with pink or wine pocket square, atau Batik Sutra Lengan Panjang Eksklusif.
                            </p>
                        </div>
                    </div>
                    <div class="bg-surface-container rounded-xl p-4 flex gap-3.5 items-start shadow-sm border border-outline-variant/30">
                        <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center text-primary shrink-0">
                            <span class="material-symbols-outlined text-[22px]">woman</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-work text-[11px] text-primary tracking-widest uppercase font-semibold">Tamu Wanita (Ladies)</span>
                            <p class="font-garamond text-sm text-on-surface mt-1 leading-snug">
                                Glamorous Evening Gown / Chic Cocktail Dress dalam nuansa pastel pink, cherry blossoms, champagne, atau rose gold hues.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. Galeri Foto Kenangan ('Her Journey to 17') -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Editorial Lookbook</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Her Journey to 17</h2>
                    <p class="font-garamond text-sm text-on-surface-variant mt-0.5">Potret kenangan dan pesona masa mekar {{ $celebrantName }}</p>
                </div>

                <!-- Gallery Spread -->
                <div id="previewGalleryGrid" class="flex flex-col space-y-3">
                    @if(isset($activeGalleries[0]))
                    <div class="bg-surface-container-low rounded-2xl p-2.5 shadow-sm border border-outline-variant/30">
                        <div class="relative w-full aspect-[4/5] rounded-xl overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($activeGalleries[0]->image ?? null, $coverImg) }}" alt="Gallery 1"/>
                            <div class="absolute top-3 left-3 bg-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 rounded text-primary font-work text-[9px] uppercase tracking-widest font-semibold">
                                Chapter XVII • The Debut
                            </div>
                        </div>
                        <div class="p-2 pt-3 flex justify-between items-baseline">
                            <span class="font-bodoni text-lg text-on-surface font-medium">{{ $activeGalleries[0]->subtitle ?? 'Bloom of Youth' }}</span>
                            <span class="font-work text-xs text-on-surface-variant">{{ $activeGalleries[0]->caption ?? 'Kyoto Edition' }}</span>
                        </div>
                    </div>
                    @endif

                    @if($activeGalleries->count() > 1)
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($activeGalleries->slice(1) as $idx => $gal)
                        <div class="bg-surface-container-low rounded-2xl p-2 shadow-sm flex flex-col border border-outline-variant/30">
                            <div class="relative w-full aspect-square rounded-xl overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($gal->image ?? null, $coverImg) }}" alt="Gallery Item"/>
                                <div class="absolute bottom-2 left-2 bg-on-surface/70 backdrop-blur-sm px-2 py-0.5 rounded text-surface font-work text-[8px] uppercase tracking-wider">
                                    Memories
                                </div>
                            </div>
                            <div class="p-1.5 pt-2">
                                <span class="font-bodoni text-sm text-on-surface font-medium block truncate">{{ $gal->caption ?? ('Moment • ' . ($idx + 2)) }}</span>
                                <span class="font-garamond text-xs text-on-surface-variant block truncate">{{ $gal->subtitle ?? 'Masa Penuh Tawa' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </section>

            <!-- 6. Peta Lokasi & Navigasi (Venue Location - NO STATIC MAP / BUTTON ONLY) -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">The Destination</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Lokasi Perayaan</h2>
                </div>

                <div class="bg-surface-container-low rounded-2xl p-5 shadow-sm flex flex-col gap-3.5 border border-outline-variant/30">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 id="previewVenueNameMain" class="font-bodoni text-xl text-on-surface font-semibold">{{ $venueName }}</h3>
                            <p class="font-work text-xs text-primary tracking-wider uppercase font-medium mt-0.5">Grand Ballroom</p>
                        </div>
                        <div class="px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[10px] font-work font-semibold uppercase flex items-center gap-1 shrink-0">
                            <span class="material-symbols-outlined text-[13px]">local_parking</span>
                            <span>VIP Valet</span>
                        </div>
                    </div>

                    <p id="previewVenueAddressMain" class="font-garamond text-sm text-on-surface-variant leading-relaxed">
                        {{ $venueAddress }}
                    </p>

                    <!-- Direct Navigation Action Buttons (No Static Map Denah Image) -->
                    <div class="flex flex-col gap-2.5 pt-1">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-primary-container text-on-primary rounded-xl py-3.5 px-4 flex items-center justify-center gap-2 font-work text-[11px] tracking-wider uppercase active:scale-[0.98] transition-all shadow-md font-semibold">
                            <span class="material-symbols-outlined text-[18px]">directions</span>
                            <span>Buka Petunjuk Arah (Google Maps)</span>
                        </a>

                        <button type="button" class="w-full bg-surface-container-highest text-on-surface rounded-xl py-2.5 px-3 flex items-center justify-center gap-1.5 font-work text-[11px] tracking-wider uppercase active:scale-95 transition-all" onclick="navigator.clipboard.writeText('{{ addslashes($venueName . ', ' . $venueAddress) }}'); showToast('Alamat berhasil disalin ke clipboard!');">
                            <span class="material-symbols-outlined text-[16px]">content_copy</span>
                            <span>Salin Alamat Lengkap</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- 7. Formulir RSVP Interaktif -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Reservation of Honor</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Konfirmasi Kehadiran</h2>
                    <p class="font-garamond text-sm text-on-surface-variant max-w-xs mx-auto mt-1">
                        Mohon konfirmasi kehadiran sebelum perayaan untuk reservasi jamuan makan malam eksklusif.
                    </p>
                </div>

                <form class="bg-surface-container-low rounded-2xl p-5 shadow-sm flex flex-col space-y-4 border border-outline-variant/30" onsubmit="event.preventDefault(); document.getElementById('rsvp-success').classList.remove('hidden'); showToast('Konfirmasi RSVP tersimpan!');">
                    <div class="flex flex-col gap-1">
                        <label class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Nama Lengkap</label>
                        <input class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-xl font-garamond text-base focus:outline-none focus:ring-1 focus:ring-primary shadow-sm border border-outline-variant/30" required="" type="text" value="{{ $guestName }}"/>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Jumlah Tamu</label>
                        <select class="w-full bg-surface-container-lowest text-on-surface px-3.5 py-2.5 rounded-xl font-garamond text-base focus:outline-none focus:ring-1 focus:ring-primary shadow-sm border border-outline-variant/30">
                            <option>1 Orang</option>
                            <option selected>2 Orang (Tamu & Partner)</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2 pt-1">
                        <label class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Kehadiran</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input checked="" class="accent-primary w-4 h-4" name="attendance" type="radio" value="hadir"/>
                                <span class="font-garamond text-sm sm:text-base text-on-surface font-medium">Ya, Pasti Hadir</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input class="accent-primary w-4 h-4" name="attendance" type="radio" value="berhalangan"/>
                                <span class="font-garamond text-sm sm:text-base text-on-surface-variant">Maaf, Berhalangan</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-work text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Kolom Ucapan & Doa Restu</label>
                        <textarea class="w-full bg-surface-container-lowest text-on-surface p-3 rounded-xl font-garamond text-base focus:outline-none focus:ring-1 focus:ring-primary shadow-sm border border-outline-variant/30 resize-none" placeholder="Tuliskan pesan & doa hangat untuk {{ $celebrantName }}..." rows="3"></textarea>
                    </div>
                    <button class="w-full bg-primary hover:bg-primary-container text-on-primary py-3.5 rounded-xl font-work text-[11px] uppercase tracking-wider shadow-md transition-all active:scale-[0.98] font-semibold" type="submit">
                        Kirim Konfirmasi & Doa Restu
                    </button>
                    <div class="hidden p-3 rounded-xl bg-secondary-fixed text-on-secondary-fixed text-center font-garamond text-sm transition-all" id="rsvp-success">
                        ✨ Terima kasih! Konfirmasi dan doa Anda telah kami terima dengan penuh sukacita.
                    </div>
                </form>
            </section>

            <!-- 8. Untaian Doa & Harapan (Wishes Stream) -->
            <section class="flex flex-col space-y-3">
                <div class="flex justify-between items-end">
                    <div>
                        <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Love & Blessings</span>
                        <h2 class="font-bodoni text-2xl text-on-surface font-medium">Untaian Doa & Harapan</h2>
                    </div>
                    <span class="font-work text-xs text-on-surface-variant">Terbaru</span>
                </div>

                <div class="flex flex-col space-y-2.5">
                    <div class="bg-surface-container-low rounded-xl p-4 shadow-sm border border-outline-variant/30">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bodoni text-base font-semibold text-on-surface">Clarissa Aurelia</span>
                            <span class="font-work text-[10px] text-on-surface-variant">10 Menit Lalu</span>
                        </div>
                        <p class="font-garamond text-sm text-on-surface-variant leading-relaxed">
                            “Happy sweet 17th birthday Valerie cantik! Semoga mekar semakin anggun, sukses selalu studinya, dan dikelilingi kebahagiaan tanpa akhir! See you at the gala! 🌸✨”
                        </p>
                    </div>
                    <div class="bg-surface-container-low rounded-xl p-4 shadow-sm border border-outline-variant/30">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bodoni text-base font-semibold text-on-surface">Uncle Hendra & Tante Jessica</span>
                            <span class="font-work text-[10px] text-on-surface-variant">1 Jam Lalu</span>
                        </div>
                        <p class="font-garamond text-sm text-on-surface-variant leading-relaxed">
                            “Selamat menginjak usia 17 tahun, keponakan tersayang. Doa terbaik dari kami agar senantiasa dilindungi Tuhan dan menjadi berkat bagi sesama. Sukses acaranya!”
                        </p>
                    </div>
                </div>
            </section>

            <!-- 9. Tanda Kasih Digital (Angpau Digital / Gift Registry) -->
            <section class="flex flex-col space-y-4">
                <div class="text-center">
                    <span class="font-work text-[10px] text-primary tracking-[0.2em] uppercase font-semibold">Love & Token of Appreciation</span>
                    <h2 class="font-bodoni text-2xl text-on-surface font-medium">Tanda Kasih Digital</h2>
                    <p class="font-garamond text-sm text-on-surface-variant max-w-xs mx-auto mt-1 leading-relaxed">
                        Doa restu Anda merupakan karunia terindah bagi kami. Namun jika ingin memberikan tanda kasih secara digital, Anda dapat melalui rekening berikut:
                    </p>
                </div>

                <div class="bg-surface-container rounded-2xl p-4 shadow-sm flex flex-col space-y-3 border border-outline-variant/30">
                    <!-- Bank 1 -->
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 flex justify-between items-center shadow-sm border border-outline-variant/20">
                        <div class="flex flex-col min-w-0 pr-2">
                            <span class="font-work text-[10px] text-primary uppercase font-bold tracking-widest">{{ $bankName1 }}</span>
                            <span class="font-bodoni text-lg text-on-surface font-semibold tracking-wider mt-0.5">{{ $bankAccount1 }}</span>
                            <span class="font-garamond text-xs text-on-surface-variant truncate">a.n {{ $bankHolder1 }}</span>
                        </div>
                        <button class="bg-secondary-fixed text-on-secondary-fixed px-3 py-1.5 rounded-lg font-work text-[10px] uppercase font-semibold active:scale-95 transition-transform flex items-center gap-1 shrink-0" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount1) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[14px]">content_copy</span>
                            Salin
                        </button>
                    </div>

                    <!-- Bank 2 -->
                    @if(!empty($bankAccount2))
                    <div class="bg-surface-container-lowest rounded-xl p-3.5 flex justify-between items-center shadow-sm border border-outline-variant/20">
                        <div class="flex flex-col min-w-0 pr-2">
                            <span class="font-work text-[10px] text-primary uppercase font-bold tracking-widest">{{ $bankName2 }}</span>
                            <span class="font-bodoni text-lg text-on-surface font-semibold tracking-wider mt-0.5">{{ $bankAccount2 }}</span>
                            <span class="font-garamond text-xs text-on-surface-variant truncate">a.n {{ $bankHolder2 }}</span>
                        </div>
                        <button class="bg-secondary-fixed text-on-secondary-fixed px-3 py-1.5 rounded-lg font-work text-[10px] uppercase font-semibold active:scale-95 transition-transform flex items-center gap-1 shrink-0" onclick="navigator.clipboard.writeText('{{ preg_replace('/[^0-9]/', '', $bankAccount2) }}'); showToast('Nomor rekening berhasil disalin!');">
                            <span class="material-symbols-outlined text-[14px]">content_copy</span>
                            Salin
                        </button>
                    </div>
                    @endif
                </div>
            </section>

            <!-- 10. Closing Editorial Section -->
            <section class="flex flex-col items-center text-center pb-8 pt-4 space-y-3">
                <div class="w-16 h-16 rounded-full bg-surface-container-high p-1.5 flex items-center justify-center shadow-sm">
                    <img alt="Sakura Reverie XVII Emblem" class="w-full h-full object-cover rounded-full" src="{{ $monogramImg }}"/>
                </div>
                <div class="space-y-1">
                    <h2 class="font-bodoni text-2xl text-on-surface italic font-medium">
                        Sampai Berjumpa di Malam Penuh Bunga
                    </h2>
                    <p class="font-garamond text-sm text-on-surface-variant">
                        Dengan penuh cinta dan rasa syukur,
                    </p>
                </div>
                <div class="pt-1">
                    <span id="previewGroomNameClosing" class="font-bodoni text-xl text-primary font-medium tracking-tight block">{{ $celebrantName }}</span>
                    <span class="font-work text-[11px] text-on-surface-variant uppercase tracking-[0.2em] mt-0.5 block">& {{ $familyLine }}</span>
                </div>
                <div class="w-16 h-px bg-outline-variant my-2"></div>
                <span class="font-work text-[9px] text-outline uppercase tracking-[0.25em]">#SakuraReverieXVII • D'Karsa Digital</span>
            </section>
        </main>

        <!-- Sticky Bottom Navigation Bar (Centered within max-w-md frame) -->
        <nav class="fixed bottom-0 inset-x-0 z-40 bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(43,20,34,0.06)] border-t border-outline-variant/30">
            <div class="max-w-md mx-auto flex justify-around items-center h-16 px-2">
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-primary" href="#">
                    <span class="material-symbols-outlined text-[20px]">mark_email_read</span>
                    <span class="font-work text-[9px] tracking-wider uppercase font-semibold">Undangan</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-primary transition-colors" href="#countdown-grid">
                    <span class="material-symbols-outlined text-[20px]">schedule</span>
                    <span class="font-work text-[9px] tracking-wider uppercase">Waktu</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-primary transition-colors" href="#previewVenueNameMain">
                    <span class="material-symbols-outlined text-[20px]">location_on</span>
                    <span class="font-work text-[9px] tracking-wider uppercase">Lokasi</span>
                </a>
                <a class="flex flex-col items-center justify-center gap-0.5 min-w-[50px] text-on-surface-variant hover:text-primary transition-colors" href="#rsvp-success">
                    <span class="material-symbols-outlined text-[20px]">how_to_reg</span>
                    <span class="font-work text-[9px] tracking-wider uppercase">RSVP</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Scripts: Open Cover, Audio, Countdown, Toast & PostMessage -->
    <script>
        // Open Envelope Transition
        const coverEl = document.getElementById('invitation-cover');
        const mainEl = document.getElementById('main-invitation-wrapper');
        const openBtn = document.getElementById('open-envelope-btn');
        const audioEl = document.getElementById('invitationAudio');
        let isAudioPlaying = false;

        function openInvitation() {
            if (!coverEl || !mainEl) return;
            
            // Audio attempt
            if (audioEl) {
                audioEl.play().then(() => {
                    isAudioPlaying = true;
                    updateAudioIcons(true);
                }).catch(() => {
                    isAudioPlaying = false;
                    updateAudioIcons(false);
                });
            }

            coverEl.classList.add('opacity-0', 'pointer-events-none', '-translate-y-8');
            setTimeout(() => {
                coverEl.classList.add('hidden');
                coverEl.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
                mainEl.classList.remove('opacity-0');
            }, 500);
        }
        window.openInvitation = openInvitation;

        if (openBtn) {
            openBtn.addEventListener('click', openInvitation);
        }

        // Audio controls
        function updateAudioIcons(playing) {
            const hIcon = document.getElementById('headerMusicIcon');
            if (hIcon) {
                hIcon.textContent = playing ? 'music_note' : 'music_off';
                if (playing) hIcon.classList.add('animate-pulse');
                else hIcon.classList.remove('animate-pulse');
            }
        }

        const headerMusicToggle = document.getElementById('headerMusicToggle');
        if (headerMusicToggle && audioEl) {
            headerMusicToggle.addEventListener('click', () => {
                if (isAudioPlaying) {
                    audioEl.pause();
                    isAudioPlaying = false;
                    updateAudioIcons(false);
                } else {
                    audioEl.play().then(() => {
                        isAudioPlaying = true;
                        updateAudioIcons(true);
                    }).catch(console.warn);
                }
            });
        }

        // Toast feedback notification
        function showToast(msg) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');
            if (toast && toastMsg) {
                toastMsg.innerText = msg;
                toast.classList.remove('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'pointer-events-none');
                }, 2500);
            }
        }

        // Countdown Timer Logic
        (function() {
            const target = new Date("{{ $targetDate->format('Y-m-d\TH:i:s') }}").getTime();
            function updateCountdown() {
                const now = new Date().getTime();
                const diff = target - now;
                if (diff > 0) {
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const secs = Math.floor((diff % (1000 * 60)) / 1000);

                    const dEl = document.getElementById('cd-days');
                    const hEl = document.getElementById('cd-hours');
                    const mEl = document.getElementById('cd-mins');
                    const sEl = document.getElementById('cd-secs');

                    if (dEl) dEl.innerText = String(days).padStart(2, '0');
                    if (hEl) hEl.innerText = String(hours).padStart(2, '0');
                    if (mEl) mEl.innerText = String(mins).padStart(2, '0');
                    if (sEl) sEl.innerText = String(secs).padStart(2, '0');
                }
            }
            setInterval(updateCountdown, 1000);
            updateCountdown();
        })();

        // Default Fallback Assets
        const defaultCoverImg = "{{ $coverImg }}";
        const defaultProfileImg = "{{ $profileImg }}";

        // Dynamic Gallery Renderer for Live Preview Synchronization
        function renderDynamicGallery(images) {
            const grid = document.getElementById('previewGalleryGrid');
            if (!grid || !Array.isArray(images) || images.length === 0) return;
            grid.innerHTML = '';

            const firstImg = images[0];
            const topCard = document.createElement('div');
            topCard.className = 'bg-surface-container-low rounded-2xl p-2.5 shadow-sm border border-outline-variant/30';
            topCard.innerHTML = `
                <div class="relative w-full aspect-[4/5] rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover dynamic-gal-hero" alt="Gallery 1"/>
                    <div class="absolute top-3 left-3 bg-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 rounded text-primary font-work text-[9px] uppercase tracking-widest font-semibold">
                        Chapter XVII • The Debut
                    </div>
                </div>
                <div class="p-2 pt-3 flex justify-between items-baseline">
                    <span class="font-bodoni text-lg text-on-surface font-medium">Bloom of Youth</span>
                    <span class="font-work text-xs text-on-surface-variant">Moment 1</span>
                </div>
            `;
            const heroImg = topCard.querySelector('.dynamic-gal-hero');
            if (heroImg) heroImg.src = firstImg;
            grid.appendChild(topCard);

            if (images.length > 1) {
                const subGrid = document.createElement('div');
                subGrid.className = 'grid grid-cols-2 gap-3';
                images.slice(1).forEach((imgUrl, idx) => {
                    const subCard = document.createElement('div');
                    subCard.className = 'bg-surface-container-low rounded-2xl p-2 shadow-sm flex flex-col border border-outline-variant/30';
                    subCard.innerHTML = `
                        <div class="relative w-full aspect-square rounded-xl overflow-hidden">
                            <img class="w-full h-full object-cover dynamic-gal-item" alt="Gallery Item ${idx + 2}"/>
                            <div class="absolute bottom-2 left-2 bg-on-surface/70 backdrop-blur-sm px-2 py-0.5 rounded text-surface font-work text-[8px] uppercase tracking-wider">
                                Memories
                            </div>
                        </div>
                        <div class="p-1.5 pt-2">
                            <span class="font-bodoni text-sm text-on-surface font-medium block truncate">Moment • ${idx + 2}</span>
                            <span class="font-garamond text-xs text-on-surface-variant block truncate">Sweet Memory</span>
                        </div>
                    `;
                    const itemImg = subCard.querySelector('.dynamic-gal-item');
                    if (itemImg) itemImg.src = imgUrl;
                    subGrid.appendChild(subCard);
                });
                grid.appendChild(subGrid);
            }
        }

        function escapeHtml(text) {
            if (!text) return '';
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        // Dynamic Events / Agenda Sesi Renderer for Live Preview Synchronization
        function renderDynamicEvents(events) {
            const container = document.getElementById('itineraryContainer');
            if (!container || !Array.isArray(events) || events.length === 0) return;
            container.innerHTML = '';
            events.forEach((ev, idx) => {
                const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(' - ') || 'Waktu akan dikonfirmasi';
                const dateStr = ev.date || "{{ $eventDateFormatted }}";
                const venueStr = ev.venue_name || "{{ $venueName }}";
                const addressStr = ev.address || '';
                const mapsUrl = ev.maps_url || "{{ $mapsUrl }}";

                const card = document.createElement('div');
                card.className = 'bg-surface-container rounded-2xl p-4 flex flex-col gap-2.5 shadow-sm border border-outline-variant/30 text-left';
                card.innerHTML = `
                    <div class="flex items-center justify-between gap-2">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-work text-[10px] tracking-wider uppercase font-semibold">
                            <span class="material-symbols-outlined text-[13px]">celebration</span>
                            Sesi ${idx + 1}
                        </span>
                        <span class="font-work text-[11px] text-primary font-semibold">${timeStr}</span>
                    </div>
                    <div>
                        <h3 class="font-bodoni text-lg text-on-surface font-semibold leading-snug">${escapeHtml(ev.title || ('Acara ' + (idx + 1)))}</h3>
                        <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-work mt-1">
                            <span class="material-symbols-outlined text-primary text-[15px]">calendar_today</span>
                            <span>${escapeHtml(dateStr)}</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-high/60 rounded-xl p-3 flex flex-col gap-1 text-xs">
                        <div class="flex items-start gap-2">
                            <span class="material-symbols-outlined text-primary text-[16px] shrink-0 mt-0.5">location_on</span>
                            <div class="min-w-0">
                                <span class="font-semibold text-on-surface font-work text-xs block">${escapeHtml(venueStr)}</span>
                                ${addressStr ? `<p class="text-[11px] text-on-surface-variant font-garamond leading-relaxed mt-0.5">${escapeHtml(addressStr)}</p>` : ''}
                            </div>
                        </div>
                    </div>
                    ${mapsUrl ? `
                        <a href="${mapsUrl}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 w-full py-2 px-3 rounded-xl bg-surface-container-highest hover:bg-primary hover:text-on-primary text-primary text-[11px] font-work uppercase tracking-wider font-semibold border border-outline-variant/30 transition-colors">
                            <span class="material-symbols-outlined text-[15px]">directions</span>
                            <span>Petunjuk Arah Google Maps</span>
                        </a>
                    ` : ''}
                `;
                container.appendChild(card);
            });
        }

        // PostMessage for Builder Live Preview Synchronization
        window.addEventListener('message', function(event) {
            const data = event.data;
            if (!data || typeof data !== 'object') return;

            if (data.type === 'UPDATE_PREVIEW_FIELD') {
                const field = data.field;
                const val = data.value;

                if (field === 'groom_name' || field === 'name') {
                    const elCover = document.getElementById('previewGroomNameCover');
                    const elTitle = document.getElementById('previewGroomNameTitle');
                    const elHero = document.getElementById('previewGroomNameHero');
                    const elHeader = document.getElementById('previewGroomNameHeader');
                    const elClosing = document.getElementById('previewGroomNameClosing');
                    if (elCover) elCover.innerText = val || "{{ $celebrantName }}";
                    if (elTitle) elTitle.innerText = val || "{{ $celebrantName }}";
                    if (elHero) elHero.innerText = val || "{{ $celebrantName }}";
                    if (elHeader) elHeader.innerText = val || "{{ $celebrantName }}";
                    if (elClosing) elClosing.innerText = val || "{{ $celebrantName }}";
                }

                if (field === 'sub_category') {
                    const elSubCover = document.getElementById('previewSubCategoryCover');
                    const elSubBadge = document.getElementById('previewSubCategoryBadge');
                    if (elSubCover) elSubCover.innerText = val || "{{ $subCategoryBadge }}";
                    if (elSubBadge) elSubBadge.innerText = val || "{{ $subCategoryBadge }}";
                }

                if (field === 'quote' || field === 'event_quote') {
                    const elQCover = document.getElementById('previewQuoteCover');
                    const elQ = document.getElementById('previewQuote');
                    if (elQCover) elQCover.innerText = `“${val || '{{ $quote }}'}”`;
                    if (elQ) elQ.innerText = `“${val || '{{ $quote }}'}”`;
                }

                if (field === 'venue_name') {
                    const elV = document.getElementById('previewVenueNameMain');
                    if (elV) elV.innerText = val || "{{ $venueName }}";
                }

                if (field === 'venue_address') {
                    const elA = document.getElementById('previewVenueAddressMain');
                    if (elA) elA.innerText = val || "{{ $venueAddress }}";
                }

                if (field === 'guest_name' || field === 'to') {
                    const elGCover = document.getElementById('previewGuestNameCover');
                    const elGMain = document.getElementById('previewGuestNameMain');
                    if (elGCover) elGCover.innerText = val || "{{ $guestName }}";
                    if (elGMain) elGMain.innerText = val || "{{ $guestName }}";
                }
            } else if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl || data.dataUrl || data.url;

                if ((target === 'cover' || target === 'cover_photo') && photoUrl) {
                    const coverEl = document.getElementById('previewCoverPhotoImg') || document.getElementById('previewCoverPhoto');
                    if (coverEl) coverEl.src = photoUrl;
                } else if ((target === 'groom' || target === 'groom_photo' || target === 'bride' || target === 'star' || target === 'person' || !target) && photoUrl) {
                    const profileEl = document.getElementById('previewGroomPhotoImg') || document.getElementById('previewGroomPhoto');
                    if (profileEl) profileEl.src = photoUrl;
                    const headerPhotoEl = document.getElementById('previewGroomPhotoHeader');
                    if (headerPhotoEl) headerPhotoEl.src = photoUrl;
                }
            } else if (data.type === 'RESET_PREVIEW_PHOTO') {
                const target = data.target;
                if (target === 'cover' || target === 'cover_photo') {
                    const coverEl = document.getElementById('previewCoverPhotoImg') || document.getElementById('previewCoverPhoto');
                    if (coverEl) coverEl.src = defaultCoverImg;
                } else if (target === 'groom' || target === 'groom_photo' || target === 'bride' || target === 'star' || target === 'person' || !target) {
                    const profileEl = document.getElementById('previewGroomPhotoImg') || document.getElementById('previewGroomPhoto');
                    if (profileEl) profileEl.src = defaultProfileImg;
                    const headerPhotoEl = document.getElementById('previewGroomPhotoHeader');
                    if (headerPhotoEl) headerPhotoEl.src = defaultProfileImg;
                }
            } else if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const photos = data.photos || data.images;
                if (Array.isArray(photos)) {
                    renderDynamicGallery(photos);
                }
            } else if (data.type === 'UPDATE_PREVIEW_EVENTS') {
                const evs = data.events;
                if (Array.isArray(evs)) {
                    renderDynamicEvents(evs);
                }
            } else if (data.type === 'RESET_PREVIEW_GALLERY') {
                window.location.reload();
            }
        });

        // Notify parent iframe
        if (window.parent && window.parent !== window) {
            window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY', template: 'editorial-cherry-blossom' }, '*');
        }
    </script>
</body>
</html>
