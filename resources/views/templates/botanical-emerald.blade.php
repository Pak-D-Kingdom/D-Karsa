<!-- Pawiwahan Adat Jawa Geometris — Arya & Rania -->
<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="web_standard" name="shell-type">
    <title>{{ ($couple->event_heading ?? 'Pawiwahan Ageng') . ' - ' . ($couple->groom_nickname ?? $couple->groom_name ?? 'Arya') . ' & ' . ($couple->bride_nickname ?? $couple->bride_name ?? 'Rania') }} | D'Karsa</title>
    <meta name="description" content="Pawiwahan Ageng Adat Jawa Geometris {{ ($couple->groom_name ?? 'Arya') }} & {{ ($couple->bride_name ?? 'Rania') }} - Serat Ulem Kersaning Rahayu.">

    <!-- Open Graph -->
    <meta property="og:title" content="Pawiwahan Ageng - {{ ($couple->groom_name ?? 'Arya') }} & {{ ($couple->bride_name ?? 'Rania') }}">
    <meta property="og:description" content="Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir serta memberikan doa restu.">
    <meta property="og:image" content="{{ !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBLZUvfr0iFuEWva6_hLE8cc4TfljTBNR7QQBSEHnmgI1iye2T-gnXeYfFTP7u0Dj-8jxZhi3341gmMy3O40kydQi6ZM8_g5XZNelWUJJMZWnRMOoHoKBbc0frCovnxgiKZwMNwxnDy_WVYDPe2EjPFAIshBkn27CA6rFLZgskjXBhHKr256NUsVu_Zh8hus45z_mBJreVmTyBnfAXauHh-PT4DmeteFuhgrBtYywasDgAQmsM7_ppW5g' }}">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
        .envelope-open-transition {
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease;
        }
        .envelope-hidden {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-variant": "#e1e2e6",
                        "error-container": "#ffdad6",
                        "background": "#f8f9fd",
                        "tertiary-container": "#c6a05b",
                        "primary": "#775a19",
                        "on-surface": "#191c1f",
                        "outline": "#7f7667",
                        "on-surface-variant": "#4e4639",
                        "inverse-surface": "#2e3134",
                        "on-tertiary-fixed-variant": "#5d4202",
                        "inverse-on-surface": "#eff1f5",
                        "surface-container-high": "#e7e8ec",
                        "on-secondary-fixed": "#241916",
                        "tertiary-fixed-dim": "#e9c178",
                        "on-tertiary-fixed": "#271900",
                        "secondary-fixed-dim": "#d6c2be",
                        "primary-fixed": "#ffdea5",
                        "surface": "#f8f9fd",
                        "on-background": "#191c1f",
                        "on-primary-fixed": "#261900",
                        "on-primary-fixed-variant": "#5d4201",
                        "surface-dim": "#d8dade",
                        "surface-container-highest": "#e1e2e6",
                        "on-secondary": "#ffffff",
                        "tertiary": "#78591b",
                        "error": "#ba1a1a",
                        "on-secondary-container": "#6e5f5c",
                        "secondary": "#6a5b58",
                        "primary-container": "#c5a059",
                        "surface-tint": "#775a19",
                        "outline-variant": "#d1c5b4",
                        "tertiary-fixed": "#ffdea7",
                        "on-primary-container": "#4e3700",
                        "secondary-container": "#f0dbd7",
                        "inverse-primary": "#e9c176",
                        "on-error-container": "#93000a",
                        "primary-fixed-dim": "#e9c176",
                        "surface-bright": "#f8f9fd",
                        "secondary-fixed": "#f2ded9",
                        "surface-container": "#eceef2",
                        "on-primary": "#ffffff",
                        "on-error": "#ffffff",
                        "on-tertiary-container": "#4f3700",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f2f3f7",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#514440"
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    spacing: {
                        "margin-desktop": "4rem",
                        "gutter": "1rem",
                        "margin": "1.25rem",
                        "space-3xl": "6rem",
                        "space-sm": "0.5rem",
                        "space-md": "1rem",
                        "space-xs": "0.25rem",
                        "margin-tablet": "2.5rem",
                        "space-2xl": "4rem",
                        "gutter-tablet": "1.5rem",
                        "gutter-desktop": "2rem",
                        "space-xl": "2.5rem",
                        "space-lg": "1.5rem"
                    },
                    fontFamily: {
                        "headline-md": ["Playfair Display"],
                        "body-md": ["Plus Jakarta Sans"],
                        "display-md-mobile": ["Playfair Display"],
                        "display-md": ["Playfair Display"],
                        "display-lg-mobile": ["Playfair Display"],
                        "body-lg": ["Plus Jakarta Sans"],
                        "title-lg": ["Plus Jakarta Sans"],
                        "label-sm": ["Plus Jakarta Sans"],
                        "label-md": ["Plus Jakarta Sans"],
                        "display-lg": ["Playfair Display"],
                        "headline-lg": ["Playfair Display"]
                    },
                    fontSize: {
                        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "500" }],
                        "body-md": ["14px", { lineHeight: "22px", fontWeight: "400" }],
                        "display-md-mobile": ["28px", { lineHeight: "36px", fontWeight: "400" }],
                        "display-md": ["40px", { lineHeight: "48px", letterSpacing: "-0.01em", fontWeight: "400" }],
                        "display-lg-mobile": ["36px", { lineHeight: "44px", letterSpacing: "-0.01em", fontWeight: "400" }],
                        "body-lg": ["16px", { lineHeight: "26px", fontWeight: "400" }],
                        "title-lg": ["18px", { lineHeight: "26px", letterSpacing: "0.02em", fontWeight: "600" }],
                        "label-sm": ["10px", { lineHeight: "14px", letterSpacing: "0.15em", fontWeight: "700" }],
                        "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.12em", fontWeight: "600" }],
                        "display-lg": ["56px", { lineHeight: "64px", letterSpacing: "-0.02em", fontWeight: "400" }],
                        "headline-lg": ["32px", { lineHeight: "40px", fontWeight: "500" }]
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-surface-container-lowest text-on-surface font-body-md text-body-md antialiased selection:bg-primary-fixed selection:text-on-primary-fixed">

    @php
        $defaultCover = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBLZUvfr0iFuEWva6_hLE8cc4TfljTBNR7QQBSEHnmgI1iye2T-gnXeYfFTP7u0Dj-8jxZhi3341gmMy3O40kydQi6ZM8_g5XZNelWUJJMZWnRMOoHoKBbc0frCovnxgiKZwMNwxnDy_WVYDPe2EjPFAIshBkn27CA6rFLZgskjXBhHKr256NUsVu_Zh8hus45z_mBJreVmTyBnfAXauHh-PT4DmeteFuhgrBtYywasDgAQmsM7_ppW5g';
        $defaultGroom = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDf_LBwnRrx914wAyi4u60d4JS9DEieQhH-9R6NDyoetyRYlArpPzaz7FK7qfxv3a5zsOhnRGO42UBs6HOzZ63YEcQadkdscYuEstVn6IEp75jLBZRtn2LGXFr4HCQtHDgesUMiKDqPQhIDG7EEqcHMcU0Z5hl1jyrBCN3d-m8QLuqMvy7nBOooBHItWKQLfSyDP-4RzmzKkGQ9NcCLjAP_cDlrljMql6wx_FJKhMgokt5O3044rBklUQ';
        $defaultBride = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBLZUvfr0iFuEWva6_hLE8cc4TfljTBNR7QQBSEHnmgI1iye2T-gnXeYfFTP7u0Dj-8jxZhi3341gmMy3O40kydQi6ZM8_g5XZNelWUJJMZWnRMOoHoKBbc0frCovnxgiKZwMNwxnDy_WVYDPe2EjPFAIshBkn27CA6rFLZgskjXBhHKr256NUsVu_Zh8hus45z_mBJreVmTyBnfAXauHh-PT4DmeteFuhgrBtYywasDgAQmsM7_ppW5g';

        $coverImg = !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') || str_starts_with($couple->cover_photo, 'data:') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : $defaultCover;
        $groomImg = !empty($couple->groom_photo) ? (str_starts_with($couple->groom_photo, 'http') || str_starts_with($couple->groom_photo, 'data:') ? $couple->groom_photo : asset('storage/' . $couple->groom_photo)) : $defaultGroom;
        $brideImg = !empty($couple->bride_photo) ? (str_starts_with($couple->bride_photo, 'http') || str_starts_with($couple->bride_photo, 'data:') ? $couple->bride_photo : asset('storage/' . $couple->bride_photo)) : $defaultBride;
        $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : \Carbon\Carbon::parse('2025-10-25 08:00:00');
        $weddingDateFormatted = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $weddingHeaderDate = $targetDate->format('d • m • Y');

        $groomNickname = $couple->groom_nickname ?? $couple->groom_name ?? 'Arya';
        $brideNickname = $couple->bride_nickname ?? $couple->bride_name ?? 'Rania';
        $groomFullName = $couple->groom_fullname ?? ($couple->groom_name ?? 'Raden Mas Arya Dananjaya, S.T.');
        $brideFullName = $couple->bride_fullname ?? ($couple->bride_name ?? 'Raden Ajeng Rania Paramitha, S.I.Kom.');

        $groomInitial = mb_substr($groomNickname, 0, 1);
        $brideInitial = mb_substr($brideNickname, 0, 1);
        $monogram = $groomInitial . ($brideInitial ?: '');

        $defaultGroomParents = 'Bpk. K.R.T. Hendro Purnomo & Ibu Dra. Endang Sri Rahayu';
        $defaultBrideParents = 'Bpk. Ir. H. Bambang Wicaksono & Ibu Hj. Siti Nurhasanah';

        $groomParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? $defaultGroomParents);
        $brideParentsFormatted = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? $defaultBrideParents);

        $calTitle = urlencode(($couple->event_heading ?? 'Pawiwahan Ageng') . ' ' . $groomNickname . ' & ' . $brideNickname);
        $calDetails = urlencode("Pawiwahan Ageng Adat Jawa " . $groomNickname . " & " . $brideNickname . "\nLokasi: " . ($couple->venue_name ?? 'Grand Ballroom Sasana Kencana Surabaya, Jawa Timur'));
        $calLocation = urlencode($couple->venue_name ?? 'Grand Ballroom Sasana Kencana Surabaya, Jawa Timur');
        $calDates = $targetDate->copy()->utc()->format('Ymd\THis\Z') . '/' . $targetDate->copy()->addHours(6)->utc()->format('Ymd\THis\Z');
        $googleCalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$calTitle}&dates={$calDates}&details={$calDetails}&location={$calLocation}";

        $bankName1 = $couple->bank_name_1 ?? 'BCA';
        $bankAcc1 = $couple->bank_account_1 ?? '8831 2940 182';
        $bankHolder1 = $couple->bank_holder_1 ?? 'Raden Mas Arya Dananjaya';

        $bankName2 = $couple->bank_name_2 ?? 'Mandiri';
        $bankAcc2 = $couple->bank_account_2 ?? '1370 0192 8472 1';
        $bankHolder2 = $couple->bank_holder_2 ?? 'Raden Ajeng Rania Paramitha';

        $guestDisplayName = $guestName ?? request('to') ?? 'Tamu Kehormatan & Keluarga';

        $fallbackGalleries = [
            'https://lh3.googleusercontent.com/aida-public/AB6AXuBLZUvfr0iFuEWva6_hLE8cc4TfljTBNR7QQBSEHnmgI1iye2T-gnXeYfFTP7u0Dj-8jxZhi3341gmMy3O40kydQi6ZM8_g5XZNelWUJJMZWnRMOoHoKBbc0frCovnxgiKZwMNwxnDy_WVYDPe2EjPFAIshBkn27CA6rFLZgskjXBhHKr256NUsVu_Zh8hus45z_mBJreVmTyBnfAXauHh-PT4DmeteFuhgrBtYywasDgAQmsM7_ppW5g',
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCCgC3XZx6lnkRWFq9LX1hKjigVEQ149-i-0A5V0MViuev4hY9wTGmXUj-Z6qNbd0cjpiT49kOT5juz_fgk4tmvU0YV5pCUafuNEuuo1OoSIOKzpVr2NpoGzKnUJKsks05jV_q4zDIWuRIo46gMpmypNc4_pHE3fFgdoSiSOH79ZfrzhB_M0QQEL0381pNMVPEI9NJicIMahz545afkcEUj2oppxFzkv0FbOKsonuWldb8Mf6ajEcyThA',
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCaNOmUdpFgJayWeTj4eBwkVgCFXhteW3uNkQQzWcM4JFmmZOZP0rED5GLuln21scYxy_6HntxpXRrxiXhgxT0KawOEZxy3Ljm9eLmkQs4HqteJrCr77DLneNSJbCBVIlK7MIRnbmK-doIssTQYmArxaeyPcRm1CBOICp7m6l0godUQdnwNQTgmtCGpojNqN07tipe4I0sqUjkhjNbljyklP7tRaq41wwOj9hYT_7UnyhgM5iRievxFZA',
            'https://lh3.googleusercontent.com/aida-public/AB6AXuDf_LBwnRrx914wAyi4u60d4JS9DEieQhH-9R6NDyoetyRYlArpPzaz7FK7qfxv3a5zsOhnRGO42UBs6HOzZ63YEcQadkdscYuEstVn6IEp75jLBZRtn2LGXFr4HCQtHDgesUMiKDqPQhIDG7EEqcHMcU0Z5hl1jyrBCN3d-m8QLuqMvy7nBOooBHItWKQLfSyDP-4RzmzKkGQ9NcCLjAP_cDlrljMql6wx_FJKhMgokt5O3044rBklUQ',
            'https://lh3.googleusercontent.com/aida-public/AB6AXuBY8WdADx1bktcTDd8lO6_swBojNH2-NOKgyva7VCATZpjxkwP9K1I806HQ8q66dFkdZe3vLgblIzygyy7LDVye7LY9D0vwnxfJym07p0RkAHNVh_8b_XReXgpCcTG-oS80vaNfqFZV1BX0xNlQ9L8Wjcttp0HtuFFgkhv9Hl1WlTAp6sqOeOHxrfn1k9UQbNO5lbyTLSotY-gCq60qdxb8n3YDiQQ03mbvyCwp1aoyqqyBRIbF0lnIIw',
        ];

        $userGalleries = (!empty($galleries) && count($galleries) > 0) ? $galleries : ((!empty($couple->galleries) && count($couple->galleries) > 0) ? $couple->galleries : collect([]));
        $g1 = $userGalleries[0]->image ?? $fallbackGalleries[0];
        $g2 = $userGalleries[1]->image ?? $fallbackGalleries[1];
        $g3 = $userGalleries[2]->image ?? $fallbackGalleries[2];
        $g4 = $userGalleries[3]->image ?? $fallbackGalleries[3];
        $g5 = $userGalleries[4]->image ?? $fallbackGalleries[4];
    @endphp

    <!-- Background Audio -->
    <audio id="invitationAudio" loop preload="auto" src="{{ $audioUrl }}"></audio>

    <!-- ========================================== -->
    <!-- 1. LUXURY DIGITAL ENVELOPE / OPENING COVER -->
    <!-- ========================================== -->
    <div id="envelopeScreen" class="fixed inset-0 z-50 bg-surface flex flex-col items-center justify-center overflow-y-auto overscroll-contain envelope-open-transition selection:bg-primary-fixed selection:text-on-primary-fixed p-3 sm:p-5">
        <!-- Ambient Melati Floating Motifs (Background Inline Vectors) -->
        <div class="fixed inset-0 pointer-events-none overflow-hidden opacity-25 select-none -z-10">
            <svg class="absolute -top-12 -left-12 w-80 h-80 text-primary-container/20 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 200 200">
                <!-- Minimalist Kawung Geometric Motif -->
                <circle cx="100" cy="100" r="70" stroke-width="0.75"></circle>
                <circle cx="100" cy="30" r="45" stroke-width="0.5"></circle>
                <circle cx="100" cy="170" r="45" stroke-width="0.5"></circle>
                <circle cx="30" cy="100" r="45" stroke-width="0.5"></circle>
                <circle cx="170" cy="100" r="45" stroke-width="0.5"></circle>
                <circle cx="100" cy="100" fill="currentColor" r="2"></circle>
            </svg>
            <svg class="absolute -bottom-16 -right-16 w-96 h-96 text-primary-container/15" fill="none" stroke="currentColor" viewBox="0 0 300 300">
                <!-- Stylized Gunungan Line Art Outline -->
                <path d="M150,20 L270,220 L220,220 L220,280 L80,280 L80,220 L30,220 Z" stroke-width="0.75"></path>
                <path d="M150,60 L230,200 L70,200 Z" stroke-dasharray="3 3" stroke-width="0.5"></path>
                <circle cx="150" cy="140" r="30" stroke-width="0.75"></circle>
                <line stroke-width="0.75" x1="150" x2="150" y1="20" y2="280"></line>
            </svg>
        </div>

        <div class="w-full max-w-sm sm:max-w-md flex flex-col items-center justify-center my-auto py-2">
            <!-- Top Status Bar: Cultural Badge & Compact Audio Pill -->
            <header class="w-full flex items-center justify-between mb-2.5 px-1 gap-2">
                <div class="inline-flex items-center gap-1.5 bg-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 rounded-full border border-primary/15 shadow-xs shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
                    <span class="font-label-sm text-[10px] text-on-surface-variant uppercase tracking-widest font-semibold whitespace-nowrap">Surat Serat Ulem</span>
                </div>
                <!-- Music Status Pill (Compact & Truncated) -->
                <button class="inline-flex items-center gap-1.5 bg-surface-container-lowest/90 backdrop-blur-md px-2.5 py-1 rounded-full border border-primary/15 shadow-xs hover:shadow-sm transition-all active:scale-95 overflow-hidden max-w-[170px]" id="envelopeMusicToggleBtn" onclick="toggleAudio()" type="button" title="Gending Pawiwahan">
                    <span class="material-symbols-outlined text-primary text-[14px] shrink-0" id="envelopeMusicIcon">volume_up</span>
                    <span class="font-label-sm text-[10px] text-on-surface-variant tracking-wider truncate whitespace-nowrap">
                        Gending Wilujeng
                    </span>
                    <span class="flex items-end gap-0.5 h-2.5 shrink-0">
                        <span class="w-0.5 h-2 bg-primary-container animate-[pulse_1s_infinite]"></span>
                        <span class="w-0.5 h-2.5 bg-primary-container animate-[pulse_1.4s_infinite]"></span>
                    </span>
                </button>
            </header>

            <!-- Main Luxury Digital Envelope Card -->
            <div class="w-full relative transition-transform duration-500 ease-out" id="envelopeWrapper">
                <!-- Royal Card Shell -->
                <div class="relative bg-surface-container-lowest/95 backdrop-blur-md rounded-[28px] sm:rounded-[32px] border border-primary/20 shadow-2xl overflow-hidden p-4 sm:p-6 text-center flex flex-col items-center">
                    <!-- Ornamental Corner Filigrees -->
                    <div class="absolute top-3 left-3 text-primary-container/30 pointer-events-none select-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 32 32">
                            <path d="M0,0 L32,0 M0,0 L0,32" stroke-width="1.25"></path>
                            <circle cx="8" cy="8" r="4" stroke-width="0.75"></circle>
                        </svg>
                    </div>
                    <div class="absolute top-3 right-3 text-primary-container/30 pointer-events-none select-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 32 32">
                            <path d="M32,0 L0,0 M32,0 L32,32" stroke-width="1.25"></path>
                            <circle cx="24" cy="8" r="4" stroke-width="0.75"></circle>
                        </svg>
                    </div>
                    <div class="absolute bottom-3 left-3 text-primary-container/30 pointer-events-none select-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 32 32">
                            <path d="M0,32 L32,32 M0,32 L0,0" stroke-width="1.25"></path>
                            <circle cx="8" cy="24" r="4" stroke-width="0.75"></circle>
                        </svg>
                    </div>
                    <div class="absolute bottom-3 right-3 text-primary-container/30 pointer-events-none select-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 32 32">
                            <path d="M32,32 L0,32 M32,32 L32,0" stroke-width="1.25"></path>
                            <circle cx="24" cy="24" r="4" stroke-width="0.75"></circle>
                        </svg>
                    </div>

                    <!-- Sacred Cultural Heading Pill -->
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed/25 text-primary mb-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-xs">spa</span>
                        <span class="font-label-sm text-[10px] tracking-[0.2em] uppercase font-bold">{{ $couple->event_heading ?? 'Pawiwahan Adat Jawa' }}</span>
                        <span class="material-symbols-outlined text-xs">spa</span>
                    </div>

                    <!-- Archival Subtitle -->
                    <p class="font-headline-md text-xs sm:text-sm italic text-secondary mb-0.5">
                        Kersaning Hyang Widhi
                    </p>

                    <!-- Main Names in Playfair Display -->
                    <h1 class="font-display-md text-2xl sm:text-3xl text-on-surface tracking-tight leading-tight my-1">
                        {{ $groomNickname }} <span class="text-primary font-display-md font-normal italic">&amp;</span> {{ $brideNickname }}
                    </h1>

                    <!-- The Couple Portrait Card Inside An Arched Royal Frame -->
                    <div class="relative w-20 h-24 sm:w-24 sm:h-28 rounded-t-full rounded-b-xl overflow-hidden border-2 border-primary/30 shadow-md my-2 bg-surface-container-high transition-transform duration-300 hover:scale-105 shrink-0">
                        <div class="absolute inset-0 rounded-t-full rounded-b-xl shadow-inner z-10 pointer-events-none bg-gradient-to-b from-primary/10 via-transparent to-black/30"></div>
                        <img id="previewCoverPhotoImg" class="w-full h-full object-cover object-top" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" src="{{ $coverImg }}" />
                    </div>

                    <!-- Date & Venue City -->
                    <p class="font-label-sm text-[10.5px] text-on-surface-variant uppercase tracking-wider mb-2 font-medium">
                        {{ $weddingDateFormatted }} • <span id="coverVenueCity">{{ $couple->venue_city ?? 'Jawa Timur' }}</span>
                    </p>

                    <!-- Recipient Guest Card Box (Luxury Calligraphy Card) -->
                    <div class="w-full bg-surface rounded-xl px-3.5 py-2.5 border border-primary/15 shadow-xs mb-3 text-center">
                        <p class="font-label-sm text-[9.5px] text-secondary uppercase tracking-[0.16em] mb-0.5">
                            Kepada Yth. Bapak / Ibu / Saudara / i:
                        </p>
                        <h2 class="font-headline-md text-sm sm:text-base text-on-surface font-semibold tracking-tight truncate py-0.5" id="guestNameDisplay">
                            {{ $guestDisplayName }}
                        </h2>
                        <div class="inline-flex items-center gap-1 text-on-surface-variant font-label-sm text-[9px] mt-0.5">
                            <span class="material-symbols-outlined text-primary text-[11px]">verified</span>
                            <span>Tamu Kehormatan Adat</span>
                        </div>
                    </div>

                    <!-- Primary Call to Action Button: Buka Undangan -->
                    <div class="w-full flex flex-col items-center">
                        <button id="btnOpenInvitation" class="w-full py-2.5 sm:py-3 px-5 bg-inverse-surface hover:bg-secondary text-surface-container-lowest rounded-full shadow-lg transition-all duration-300 flex items-center justify-center gap-2 group active:scale-95 relative overflow-hidden" onclick="openInvitationHandler()" type="button">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-primary-container/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <span class="material-symbols-outlined text-primary-fixed-dim text-lg transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5">
                                mark_email_read
                            </span>
                            <span class="font-title-lg text-xs sm:text-sm tracking-widest uppercase font-semibold text-white">
                                Buka Undangan
                            </span>
                            <span class="material-symbols-outlined text-primary-fixed-dim text-lg transition-transform duration-300 group-hover:translate-x-1">
                                arrow_forward
                            </span>
                        </button>
                        <!-- Sub-caption & Gending Direction -->
                        <div class="flex items-center gap-1.5 mt-2 text-on-surface-variant font-label-sm text-[9.5px]">
                            <span class="material-symbols-outlined text-primary text-[13px]">music_note</span>
                            <span>Sentuh tombol untuk membuka surat &amp; memutar gending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. MAIN INVITATION CONTENT PAGE           -->
    <!-- ========================================== -->
    <header class="fixed top-0 left-0 right-0 z-40 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_4px_20px_-4px_rgba(58,46,43,0.06)] border-b border-primary/10">
        <div class="max-w-6xl mx-auto px-gutter md:px-gutter-tablet h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center">
                    <span class="font-serif text-xs font-semibold text-primary">{{ $monogram }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif font-bold text-sm tracking-wide text-on-surface">{{ $groomNickname }} &amp; {{ $brideNickname }}</span>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-primary">{{ $weddingHeaderDate }}</span>
                </div>
            </div>

            <!-- Navigation Anchors -->
            <nav class="hidden md:flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-full border border-primary/10">
                <a href="#mempelai" class="px-3 py-1 rounded-full text-xs font-medium text-on-surface-variant hover:text-primary transition-colors">Mempelai</a>
                <a href="#acara" class="px-3 py-1 rounded-full text-xs font-medium text-on-surface-variant hover:text-primary transition-colors">Acara</a>
                <a href="#lokasi-peta" class="px-3 py-1 rounded-full text-xs font-medium text-on-surface-variant hover:text-primary transition-colors">Lokasi</a>
                <a href="#galeri" class="px-3 py-1 rounded-full text-xs font-medium text-on-surface-variant hover:text-primary transition-colors">Galeri</a>
                <a href="#rsvp-doa" class="px-3 py-1 rounded-full text-xs font-medium text-on-surface-variant hover:text-primary transition-colors">RSVP &amp; Doa</a>
            </nav>

            <div class="flex items-center gap-2">
                <button id="mainAudioBtn" onclick="toggleAudio()" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary/10 text-primary hover:bg-primary/20 transition-all text-xs font-medium" type="button">
                    <span id="mainAudioIcon" class="material-symbols-outlined text-[16px]">volume_up</span>
                    <span id="mainAudioLabel" class="hidden sm:inline">Play Gending</span>
                </button>
                <a href="#rsvp-doa" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold uppercase tracking-wider transition-all shadow-sm">
                    RSVP
                </a>
            </div>
        </div>
    </header>

    <main class="w-full pt-16 bg-surface-container-lowest min-h-screen">
        <div class="flex flex-col w-full">

            <!-- Top Ambient Geometric Ornament (Watermark subtle gold) -->
            <div class="relative w-full overflow-hidden bg-surface-container-lowest">
                <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

                <!-- SECTION 1: HERO / SERAT ULEM -->
                <section class="relative max-w-4xl mx-auto px-gutter md:px-gutter-tablet py-space-xl md:py-space-2xl text-center">
                    <!-- Cultural Header Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/10 text-primary mb-space-md">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M12 2L4 18h16L12 2zM12 6l5 10H7l5-10z"></path>
                        </svg>
                        <span class="font-label-sm text-label-sm uppercase tracking-widest font-semibold">Serat Ulem Pawiwahan Ageng</span>
                    </div>
                    <p class="font-headline-md text-headline-md text-primary italic font-serif mb-2">Kersaning Rahayu</p>
                    <h1 class="font-display-lg text-display-lg md:text-display-lg text-on-surface tracking-tight mb-2">
                        {{ $groomNickname }} <span class="font-headline-md text-primary font-normal italic">&amp;</span> {{ $brideNickname }}
                    </h1>
                    <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-[0.25em] mb-space-lg">
                        {{ $weddingDateFormatted }} • <span id="heroVenueCity">{{ $couple->venue_city ?? 'Jawa Timur' }}</span>
                    </p>

                    <!-- Minimalist Modern Gunungan Divider -->
                    <div class="flex items-center justify-center gap-3 my-space-md text-primary/40">
                        <span class="h-[1px] w-16 bg-primary/30"></span>
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 40 40">
                            <polygon points="20,4 34,34 6,34"></polygon>
                            <polygon points="20,12 29,30 11,30"></polygon>
                            <line x1="20" x2="20" y1="4" y2="34"></line>
                            <circle cx="20" cy="20" r="3"></circle>
                        </svg>
                        <span class="h-[1px] w-16 bg-primary/30"></span>
                    </div>

                    <!-- Main Featured Portrait Card -->
                    <div id="previewCover" class="relative mx-auto mt-space-md max-w-md p-3 bg-surface rounded-2xl shadow-xl shadow-primary/5">
                        <!-- Floating Corner Geometrics -->
                        <div class="absolute top-1 left-1 w-6 h-6 border-t border-l border-primary/40"></div>
                        <div class="absolute top-1 right-1 w-6 h-6 border-t border-r border-primary/40"></div>
                        <div class="absolute bottom-1 left-1 w-6 h-6 border-b border-l border-primary/40"></div>
                        <div class="absolute bottom-1 right-1 w-6 h-6 border-b border-r border-primary/40"></div>
                        <div class="relative overflow-hidden rounded-xl aspect-[3/4] bg-surface-container-high group">
                            <img id="previewCoverHeroImg" alt="{{ $groomNickname }} dan {{ $brideNickname }}" class="w-full h-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-105" src="{{ $coverImg }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-center text-on-secondary">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-primary-fixed drop-shadow">Pawiwahan Gagrak Ngayogyakarta</span>
                                <p class="font-headline-md text-headline-md font-serif text-surface-bright mt-0.5">{{ $groomNickname }} &amp; {{ $brideNickname }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formal Guest Invitation Pill & CTA -->
                    <div class="mt-space-xl bg-surface-container-low max-w-md mx-auto p-space-md rounded-xl text-center shadow-sm">
                        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
                        <h2 class="font-title-lg text-title-lg text-on-surface font-semibold mb-2" id="guest-name">{{ $guestDisplayName }}</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
                            Tanpa mengurangi rasa hormat, kami bermaksud mengundang Anda untuk hadir dan memberikan doa restu.
                        </p>
                        <a class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-inverse-surface text-on-secondary rounded-lg font-label-md text-label-md uppercase tracking-wider transition-all hover:bg-primary shadow-md" href="#acara">
                            <span class="material-symbols-outlined text-[18px]">drafts</span>
                            Buka Jadwal &amp; Lokasi
                        </a>
                    </div>
                </section>

                <!-- SECTION 2: KUTIPAN SUCI & KEARIFAN ADAT -->
                <section class="w-full bg-surface-container py-space-2xl">
                    <div class="max-w-2xl mx-auto px-gutter text-center">
                        <!-- Minimal Kawung Geometric Emblem -->
                        <div class="w-10 h-10 mx-auto mb-space-sm flex items-center justify-center text-primary">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 100 100">
                                <ellipse cx="50" cy="25" rx="14" ry="24" transform="rotate(0 50 25)"></ellipse>
                                <ellipse cx="50" cy="75" rx="14" ry="24" transform="rotate(0 50 75)"></ellipse>
                                <ellipse cx="25" cy="50" rx="14" ry="24" transform="rotate(90 25 50)"></ellipse>
                                <ellipse cx="75" cy="50" rx="14" ry="24" transform="rotate(90 75 50)"></ellipse>
                                <circle cx="50" cy="50" fill="currentColor" r="6"></circle>
                            </svg>
                        </div>
                        <p class="font-headline-md text-headline-md text-primary font-serif italic mb-space-md leading-relaxed">
                            “Garwa: Sigaraning Nyawa”
                        </p>
                        <blockquote class="font-body-lg text-body-lg text-on-surface-variant italic mb-space-md leading-relaxed">
                            “{{ $couple->quote ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}”
                        </blockquote>
                        <span class="font-label-md text-label-md text-primary font-semibold uppercase tracking-widest">
                            (QS. Ar-Rum: 21)
                        </span>
                        <div class="mt-4 text-xs font-mono tracking-widest text-on-surface-variant/80 uppercase">
                            Rukun Agawe Santosa • Tresna Kang Sejati
                        </div>
                    </div>
                </section>

                <!-- SECTION 3: PROFIL MEMPELAI (THE BRIDE & GROOM) -->
                <section class="max-w-5xl mx-auto px-gutter md:px-gutter-tablet py-space-3xl" id="mempelai">
                    <div class="text-center mb-space-2xl">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Panganten Sekar Kekalih</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Mempelai yang Berbahagia</h2>
                        <div class="w-12 h-0.5 bg-primary/40 mx-auto mt-2"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-space-xl items-stretch">
                        <!-- Groom Card -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow relative">
                            <div class="absolute top-4 right-4 text-primary/30">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold px-2.5 py-1 bg-primary/10 rounded">Mempelai Pria</span>
                            </div>
                            <div>
                                <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-primary/30 mb-space-lg mx-auto md:mx-0 shadow-sm">
                                    <img id="previewGroomPhotoImg" class="w-full h-full object-cover object-top" src="{{ $groomImg }}" alt="{{ $groomFullName }}">
                                </div>
                                <h3 id="previewGroomFullNameText" class="font-headline-md text-headline-md text-on-surface font-serif text-center md:text-left">
                                    {{ $groomFullName }}
                                </h3>
                                <p id="previewGroomParentsText" class="font-body-md text-body-md text-on-surface-variant mt-space-sm text-center md:text-left leading-relaxed">
                                    {{ $couple->groom_birth_order ?? 'Putra pertama' }} dari pasangan:<br>
                                    <strong class="text-on-surface font-medium">{{ $groomParentsFormatted }}</strong>
                                </p>
                                <p class="font-label-md text-label-md text-on-surface-variant/70 mt-3 text-center md:text-left flex items-center justify-center md:justify-start gap-1">
                                    <span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
                                    <span>{{ $couple->groom_city ?? 'Yogyakarta Hadiningrat' }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Bride Card -->
                        <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow relative">
                            <div class="absolute top-4 right-4 text-primary/30">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold px-2.5 py-1 bg-primary/10 rounded">Mempelai Wanita</span>
                            </div>
                            <div>
                                <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-primary/30 mb-space-lg mx-auto md:mx-0 shadow-sm">
                                    <img id="previewBridePhotoImg" class="w-full h-full object-cover object-top" src="{{ $brideImg }}" alt="{{ $brideFullName }}">
                                </div>
                                <h3 id="previewBrideFullNameText" class="font-headline-md text-headline-md text-on-surface font-serif text-center md:text-left">
                                    {{ $brideFullName }}
                                </h3>
                                <p id="previewBrideParentsText" class="font-body-md text-body-md text-on-surface-variant mt-space-sm text-center md:text-left leading-relaxed">
                                    {{ $couple->bride_birth_order ?? 'Putri kedua' }} dari pasangan:<br>
                                    <strong class="text-on-surface font-medium">{{ $brideParentsFormatted }}</strong>
                                </p>
                                <p class="font-label-md text-label-md text-on-surface-variant/70 mt-3 text-center md:text-left flex items-center justify-center md:justify-start gap-1">
                                    <span class="material-symbols-outlined text-[16px] text-primary">location_on</span>
                                    <span>{{ $couple->bride_city ?? 'Surabaya, Jawa Timur' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 4: COUNTDOWN & SAVE THE DATE -->
                <section class="w-full bg-surface-container-high py-space-2xl">
                    <div class="max-w-4xl mx-auto px-gutter text-center">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.2em] font-semibold">Wanci Dhauping Penganten</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif mt-1 mb-space-lg">Menuju Hari Bahagia</h2>
                        <!-- 4-Box Clean Countdown -->
                        <div class="grid grid-cols-4 gap-2 md:gap-4 max-w-xl mx-auto mb-space-xl" id="countdown-timer">
                            <div class="bg-surface-container-lowest p-3 md:p-4 rounded-xl shadow-sm">
                                <span class="font-headline-lg text-headline-lg text-primary font-serif block font-semibold" id="cd-days">00</span>
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Hari</span>
                            </div>
                            <div class="bg-surface-container-lowest p-3 md:p-4 rounded-xl shadow-sm">
                                <span class="font-headline-lg text-headline-lg text-primary font-serif block font-semibold" id="cd-hours">00</span>
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Jam</span>
                            </div>
                            <div class="bg-surface-container-lowest p-3 md:p-4 rounded-xl shadow-sm">
                                <span class="font-headline-lg text-headline-lg text-primary font-serif block font-semibold" id="cd-minutes">00</span>
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Menit</span>
                            </div>
                            <div class="bg-surface-container-lowest p-3 md:p-4 rounded-xl shadow-sm">
                                <span class="font-headline-lg text-headline-lg text-primary font-serif block font-semibold" id="cd-seconds">00</span>
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Detik</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-center gap-3">
                            <a class="inline-flex items-center gap-2 px-5 py-2.5 bg-inverse-surface text-on-secondary rounded-lg font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors shadow" href="{{ $googleCalUrl }}" target="_blank">
                                <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                                Simpan di Google Calendar
                            </a>
                        </div>
                    </div>
                </section>

                <!-- SECTION 5: RANGKAIAN PROSESI ADAT & ACARA -->
                <section class="max-w-5xl mx-auto px-gutter md:px-gutter-tablet py-space-3xl" id="acara">
                    <div class="text-center mb-space-2xl">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Tata Rakiting Adat</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Rangkaian Acara Pawiwahan</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-lg mx-auto">
                            Setiap tahapan prosesi sarat akan makna filosofi luhur memohon restu serta perlindungan dari Gusti Ingkang Maha Agung.
                        </p>
                    </div>

                    @php
                        $userEvents = (!empty($couple->events) && count($couple->events) > 0) ? $couple->events : null;
                    @endphp

                    @if($userEvents && count($userEvents) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                            @foreach($userEvents as $evt)
                                <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                                    <div class="flex items-center justify-between mb-space-md">
                                        <span class="px-3 py-1 bg-primary/10 text-primary rounded-full font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                            {{ $evt->sub_title ?? 'Prosesi Acara' }}
                                        </span>
                                        <span class="material-symbols-outlined text-primary text-2xl">celebration</span>
                                    </div>
                                    <div>
                                        <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-1">{{ $evt->title }}</h3>
                                        <p class="font-label-md text-label-md text-primary font-semibold mb-space-md">
                                            {{ !empty($evt->date) ? \Carbon\Carbon::parse($evt->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $weddingDateFormatted }}
                                        </p>
                                        <div class="space-y-2 text-on-surface-variant font-body-md text-body-md">
                                            <div class="flex items-start gap-2">
                                                <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">schedule</span>
                                                <span>{{ $evt->start_time ?? '09.00 WIB' }} - {{ $evt->end_time ?? 'Selesai' }}</span>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">location_on</span>
                                                <span>{{ $evt->venue_name ?? $couple->venue_name ?? 'Sasana Kriya TMII' }}</span>
                                            </div>
                                            @if(!empty($evt->address))
                                                <div class="flex items-start gap-2 text-xs text-on-surface-variant/80">
                                                    <span class="material-symbols-outlined text-[16px] text-primary shrink-0 mt-0.5">place</span>
                                                    <span>{{ $evt->address }}</span>
                                                </div>
                                            @endif
                                            @php
                                                $evtMapsTarget = !empty($evt->maps_url) && $evt->maps_url !== 'https://maps.google.com'
                                                    ? $evt->maps_url
                                                    : 'https://maps.google.com/?q=' . urlencode(($evt->venue_name ?? $couple->venue_name ?? 'Lokasi Acara') . ' ' . ($evt->address ?? ''));
                                            @endphp
                                            <div class="pt-2">
                                                <a href="{{ $evtMapsTarget }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:text-primary-container transition">
                                                    <span class="material-symbols-outlined text-[16px]">near_me</span>
                                                    <span>Petunjuk Google Maps &rarr;</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-space-lg pt-space-md bg-surface-container-low -mx-space-xl -mb-space-xl px-space-xl py-space-sm flex items-center justify-between">
                                        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tamu Kehormatan</span>
                                        <span class="material-symbols-outlined text-primary text-[18px]">verified</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Default 4 Javanese Processions -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                            <!-- Event Card 1: Siraman & Midodareni -->
                            <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-space-md">
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-fixed rounded-full font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                        Adat Sakral
                                    </span>
                                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-1">Siraman &amp; Midodareni</h3>
                                    <p class="font-label-md text-label-md text-primary font-semibold mb-space-md">
                                        Jumat, 24 Oktober 2025
                                    </p>
                                    <div class="space-y-2 text-on-surface-variant font-body-md text-body-md">
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">schedule</span>
                                            <span>15.00 - 21.00 WIB (Keluarga Inti)</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">location_on</span>
                                            <span>Kediaman Mempelai Putri (Ndalem Sasana Kencana), Surabaya, Jawa Timur</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">checkroom</span>
                                            <span>Busana: Batik Jawa Tradisional / Motif Klasik</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-space-lg pt-space-md bg-surface-container-low -mx-space-xl -mb-space-xl px-space-xl py-space-sm flex items-center justify-between">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Khusus Kerabat &amp; Sesepuh</span>
                                    <span class="material-symbols-outlined text-primary text-[18px]">verified</span>
                                </div>
                            </div>

                            <!-- Event Card 2: Akad Nikah -->
                            <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-space-md">
                                    <span class="px-3 py-1 bg-primary/10 text-primary rounded-full font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                        Ijab Kabul
                                    </span>
                                    <span class="material-symbols-outlined text-primary text-2xl">menu_book</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-1">Akad Nikah</h3>
                                    <p class="font-label-md text-label-md text-primary font-semibold mb-space-md">
                                        {{ $weddingDateFormatted }}
                                    </p>
                                    <div class="space-y-2 text-on-surface-variant font-body-md text-body-md">
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">schedule</span>
                                            <span>08.00 - 10.00 WIB</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">location_on</span>
                                            <span>Ruang Rama Shinta - Grand Ballroom Sasana Kriya TMII</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">checkroom</span>
                                            <span>Busana: Putih Bersih / Busana Muslim Formal</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-space-lg pt-space-md bg-surface-container-low -mx-space-xl -mb-space-xl px-space-xl py-space-sm flex items-center justify-between">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tamu Undangan Sesi I</span>
                                    <span class="material-symbols-outlined text-primary text-[18px]">group</span>
                                </div>
                            </div>

                            <!-- Event Card 3: Upacara Panggih Ageng -->
                            <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-space-md">
                                    <span class="px-3 py-1 bg-tertiary-container/20 text-tertiary rounded-full font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                        Adat Ngayogyakarta
                                    </span>
                                    <span class="material-symbols-outlined text-primary text-2xl">celebration</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-1">Upacara Adat Panggih</h3>
                                    <p class="font-label-md text-label-md text-primary font-semibold mb-space-md">
                                        {{ $weddingDateFormatted }}
                                    </p>
                                    <div class="space-y-2 text-on-surface-variant font-body-md text-body-md">
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">schedule</span>
                                            <span>10.30 - 11.30 WIB</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">info</span>
                                            <span>Balangan Gantal, Wijidadi (Injak Telur), Sinduran, Kacar Kucur &amp; Dhahar Klimah</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">music_note</span>
                                            <span>Iringan Gamelan Jawa Klasik Kodhok Ngorek</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-space-lg pt-space-md bg-surface-container-low -mx-space-xl -mb-space-xl px-space-xl py-space-sm flex items-center justify-between">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Prosesi Puncak Tradisi</span>
                                    <span class="material-symbols-outlined text-primary text-[18px]">auto_awesome</span>
                                </div>
                            </div>

                            <!-- Event Card 4: Resepsi Pawiwahan Ageng -->
                            <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                                <div class="flex items-center justify-between mb-space-md">
                                    <span class="px-3 py-1 bg-primary text-on-primary rounded-full font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                        Pahargyan Ageng
                                    </span>
                                    <span class="material-symbols-outlined text-primary text-2xl">loyalty</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-1">Resepsi Pawiwahan</h3>
                                    <p class="font-label-md text-label-md text-primary font-semibold mb-space-md">
                                        {{ $weddingDateFormatted }}
                                    </p>
                                    <div class="space-y-2 text-on-surface-variant font-body-md text-body-md">
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">schedule</span>
                                            <span>12.00 - 15.00 WIB</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">location_on</span>
                                            <span>{{ $couple->venue_name ?? 'Grand Ballroom Sasana Kriya, Taman Mini Indonesia Indah (TMII)' }}</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">checkroom</span>
                                            <span>Dresscode: Batik Formal / Busana Nasional / Kebaya</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-space-lg pt-space-md bg-surface-container-low -mx-space-xl -mb-space-xl px-space-xl py-space-sm flex items-center justify-between">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Seluruh Tamu Undangan</span>
                                    <span class="material-symbols-outlined text-primary text-[18px]">favorite</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>

                <!-- SECTION 6: INFORMASI LOKASI & PETUNJUK GOOGLE MAPS -->
                @php
                    $firstEvt = (!empty($couple->events) && count($couple->events) > 0) ? $couple->events[0] : null;
                    $mainVenueName = $couple->venue_name ?? ($firstEvt->venue_name ?? 'Grand Ballroom Sasana Kencana Surabaya');
                    $mainVenueAddress = $couple->venue_address ?? ($firstEvt->address ?? 'Jl. Mayjen Sungkono No. 89, Sawahan, Surabaya, Jawa Timur 60224');
                    $mainMapsUrl = !empty($couple->maps_url) && $couple->maps_url !== 'https://maps.google.com'
                        ? $couple->maps_url
                        : (!empty($firstEvt->maps_url) && $firstEvt->maps_url !== 'https://maps.google.com'
                            ? $firstEvt->maps_url
                            : 'https://maps.google.com/?q=' . urlencode($mainVenueName . ' ' . $mainVenueAddress));
                    $hasCustomDenah = !empty($couple->denah_img) || !empty($couple->map_image) || !empty($couple->sketch_img);
                    $customDenahUrl = $couple->denah_img ?? $couple->map_image ?? $couple->sketch_img ?? null;
                @endphp
                <section class="w-full bg-surface-container py-space-3xl" id="lokasi-peta">
                    <div class="max-w-4xl mx-auto px-gutter md:px-gutter-tablet">
                        <div class="text-center mb-space-2xl">
                            <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Papan Dununging Pahargyan</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Lokasi &amp; Petunjuk Rute</h2>
                            <div class="w-12 h-0.5 bg-primary/40 mx-auto mt-2"></div>
                        </div>

                        <!-- Card Lokasi Utama -->
                        <div class="bg-surface-container-lowest rounded-2xl p-4 sm:p-8 shadow-sm border border-primary/10 text-center relative overflow-hidden">
                            <!-- Background Subtle Cultural Motif -->
                            <div class="absolute -top-10 -right-10 w-40 h-40 text-primary-container/10 pointer-events-none select-none">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" stroke-width="1"></circle>
                                    <circle cx="50" cy="50" r="20" stroke-width="0.5"></circle>
                                </svg>
                            </div>

                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary mb-4 font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                                <span class="material-symbols-outlined text-base">location_on</span>
                                <span>Gedung &amp; Tempat Acara</span>
                            </div>

                            <h3 class="font-headline-md text-headline-md text-on-surface font-serif mb-3">
                                {{ $mainVenueName }}
                            </h3>

                            <p class="font-body-md text-body-md text-on-surface-variant max-w-xl mx-auto leading-relaxed mb-6">
                                {{ $mainVenueAddress }}
                            </p>

                            <!-- Primary Action: Open Google Maps -->
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-6">
                                <a href="{{ $mainMapsUrl }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 sm:px-8 py-3 bg-primary hover:bg-primary-container text-on-primary hover:text-on-primary-container rounded-full font-label-md text-xs sm:text-sm uppercase tracking-wider font-bold transition-all duration-300 shadow-md hover:shadow-lg active:scale-98 text-center max-w-full">
                                    <span class="material-symbols-outlined text-[18px]">near_me</span>
                                    <span>Buka Lokasi di Google Maps</span>
                                </a>
                            </div>

                            <!-- Petunjuk Navigasi & Kehadiran -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left border-t border-primary/10 pt-6 mt-2 max-w-2xl mx-auto">
                                <div class="flex items-start gap-2.5 text-xs sm:text-sm text-on-surface-variant">
                                    <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">navigation</span>
                                    <div>
                                        <strong class="text-on-surface font-semibold block mb-0.5">Navigasi GPS:</strong>
                                        Gunakan tautan Google Maps di atas untuk panduan rute terbaik langsung dari smartphone Anda.
                                    </div>
                                </div>
                                <div class="flex items-start gap-2.5 text-xs sm:text-sm text-on-surface-variant">
                                    <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">schedule</span>
                                    <div>
                                        <strong class="text-on-surface font-semibold block mb-0.5">Waktu Kehadiran:</strong>
                                        Disarankan hadir 15 menit sebelum acara dimulai demi kenyamanan dan kelancaran prosesi sakral.
                                    </div>
                                </div>
                            </div>

                            {{-- Fitur Denah Khusus Opsional (Hanya jika pengguna menyediakan denah khusus / petunjuk gedung) --}}
                            @if($hasCustomDenah)
                                <div class="mt-8 pt-6 border-t border-primary/10 text-center">
                                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider font-bold block mb-3">
                                        Ilustrasi Denah Khusus &amp; Petunjuk Gedung
                                    </span>
                                    <div class="max-w-xl mx-auto rounded-xl overflow-hidden border border-primary/20 shadow-sm">
                                        <img src="{{ str_starts_with($customDenahUrl, 'http') ? $customDenahUrl : asset('storage/' . $customDenahUrl) }}"
                                             alt="Denah Lokasi Acara"
                                             class="w-full h-auto object-contain bg-white">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- SECTION 7: GALERI KISAH KASIH (PHOTO MOSAIC) -->
                <section class="max-w-5xl mx-auto px-gutter md:px-gutter-tablet py-space-3xl" id="galeri">
                    <div class="text-center mb-space-2xl">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Riptaning Raras</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Kisah Kasih Geometris</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-1">Potret cinta dan pengabdian dalam nuansa budaya luhur Jawa</p>
                    </div>

                    <!-- Bento-style Editorial Gallery Layout with preview sync ID -->
                    <div id="previewGalleryGrid" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Main Highlight -->
                        <div class="md:col-span-2 relative aspect-[4/3] rounded-2xl overflow-hidden shadow-sm group">
                            <img alt="Foto pengantin adat Jawa {{ $groomNickname }} dan {{ $brideNickname }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700" src="{{ $g1 }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 via-transparent to-transparent flex items-end p-6">
                                <span class="text-on-secondary font-headline-md text-headline-md font-serif">Cunduk Mentul &amp; Paes Ageng</span>
                            </div>
                        </div>
                        <!-- Vertical Gallery Item -->
                        <div class="relative aspect-[3/4] md:aspect-auto rounded-2xl overflow-hidden shadow-sm group">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Gallery 2" src="{{ $g2 }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 via-transparent to-transparent flex items-end p-4">
                                <span class="text-on-secondary font-label-md text-label-md uppercase tracking-wider">Ndalem Joglo Heritage</span>
                            </div>
                        </div>
                        <!-- Row 2 item 1 -->
                        <div class="relative aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Gallery 3" src="{{ $g3 }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 via-transparent to-transparent flex items-end p-4">
                                <span class="text-on-secondary font-label-md text-label-md uppercase tracking-wider">Tali Asih Kalpika</span>
                            </div>
                        </div>
                        <!-- Row 2 item 2 -->
                        <div class="relative aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Gallery 4" src="{{ $g4 }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 via-transparent to-transparent flex items-end p-4">
                                <span class="text-on-secondary font-label-md text-label-md uppercase tracking-wider">Ageman Jawi</span>
                            </div>
                        </div>
                        <!-- Row 2 item 3 -->
                        <div class="relative aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Gallery 5" src="{{ $g5 }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 via-transparent to-transparent flex items-end p-4">
                                <span class="text-on-secondary font-label-md text-label-md uppercase tracking-wider">Guyub Rukun</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 8: RSVP & DOA RESTU -->
                <section class="w-full bg-surface-container py-space-3xl" id="rsvp-doa">
                    <div class="max-w-4xl mx-auto px-gutter md:px-gutter-tablet">
                        <div class="text-center mb-space-2xl">
                            <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Palapuran Rawuh</span>
                            <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Konfirmasi Kehadiran &amp; Doa Restu</h2>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-lg mx-auto">
                                Mohon kesediaan Bapak/Ibu/Saudara/i untuk melengkapi konfirmasi kehadiran demi kelancaran prosesi dan protokol acara.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-space-xl items-start">
                            <!-- Interactive RSVP Form -->
                            <div class="md:col-span-6 bg-surface-container-lowest p-5 sm:p-7 rounded-2xl shadow-sm border border-primary/10">
                                <h3 class="font-title-lg text-title-lg text-on-surface font-semibold mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary text-[20px]">how_to_reg</span>
                                    Formulir Konfirmasi
                                </h3>
                                <form class="space-y-4" id="rsvp-form" onsubmit="event.preventDefault(); submitRSVP();">
                                    <div>
                                        <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Nama Lengkap</label>
                                        <input class="w-full px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-xl text-sm border border-primary/15 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all" id="guest-input-name" placeholder="Contoh: Raden Bagus Prakoso" required="" type="text" value="{{ $guestDisplayName !== 'Tamu Kehormatan & Keluarga' ? $guestDisplayName : '' }}">
                                    </div>
                                    <div>
                                        <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                                        <input class="w-full px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-xl text-sm border border-primary/15 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all" id="guest-input-wa" placeholder="Contoh: 081234567890" required="" type="tel">
                                    </div>
                                    <div>
                                        <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Status Kehadiran</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-1">
                                            <label class="flex items-center gap-2.5 p-2.5 bg-surface-container-low hover:bg-surface-container-high rounded-xl cursor-pointer border border-primary/15 transition-all">
                                                <input checked="" class="accent-primary" name="attendance" type="radio" value="Hadir">
                                                <span class="text-xs font-semibold text-on-surface">Insya Allah Hadir</span>
                                            </label>
                                            <label class="flex items-center gap-2.5 p-2.5 bg-surface-container-low hover:bg-surface-container-high rounded-xl cursor-pointer border border-primary/15 transition-all">
                                                <input class="accent-primary" name="attendance" type="radio" value="Tidak Hadir">
                                                <span class="text-xs font-semibold text-on-surface">Berhalangan Hadir</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Jumlah Hadir</label>
                                            <select class="w-full px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-xl text-sm border border-primary/15 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" id="guest-count">
                                                <option value="1">1 Orang</option>
                                                <option value="2">2 Orang</option>
                                                <option value="3">3 Orang</option>
                                                <option value="4">4 Orang</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Sesi Undangan</label>
                                            <select class="w-full px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-xl text-sm border border-primary/15 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary truncate" id="guest-session">
                                                <option value="Akad">Akad Nikah (08.00)</option>
                                                <option selected="" value="Resepsi">Resepsi Pawiwahan (12.00)</option>
                                                <option value="Semua Sesi">Semua Rangkaian Acara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Untaian Doa &amp; Ucapan Restu</label>
                                        <textarea class="w-full px-3.5 py-2.5 bg-surface-container-low text-on-surface rounded-xl text-sm border border-primary/15 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all" id="guest-wishes" placeholder="Tuliskan doa kebaikan dan restu bagi kedua mempelai..." rows="3"></textarea>
                                    </div>
                                    <button class="w-full py-3 px-6 bg-inverse-surface hover:bg-secondary text-surface-container-lowest rounded-xl font-label-md text-xs sm:text-sm uppercase tracking-wider font-semibold hover:shadow-md transition-all flex items-center justify-center gap-2 shadow active:scale-98" type="submit">
                                        <span class="material-symbols-outlined text-[18px]">send</span>
                                        Kirim Konfirmasi &amp; Doa
                                    </button>
                                </form>
                            </div>

                            <!-- Live Guest Wishes Stream -->
                            <div class="md:col-span-6 bg-surface-container-lowest p-5 sm:p-7 rounded-2xl shadow-sm border border-primary/10 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-primary/10">
                                        <h3 class="font-title-lg text-title-lg text-on-surface font-semibold flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-[20px]">forum</span>
                                            Untaian Doa Restu
                                        </h3>
                                        <span class="px-2.5 py-1 bg-primary/10 text-primary rounded-full text-xs font-mono font-semibold" id="total-wishes-count">
                                            {{ (!empty($wishes) && count($wishes) > 0) ? count($wishes) . ' Doa Restu' : '3 Doa Restu' }}
                                        </span>
                                    </div>
                                    <div class="space-y-3 max-h-[460px] overflow-y-auto pr-1" id="wishes-list">
                                        @if(!empty($wishes) && count($wishes) > 0)
                                            @foreach($wishes as $w)
                                                <div class="bg-surface-container-low/60 border border-primary/10 p-3.5 sm:p-4 rounded-xl shadow-xs">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <strong class="font-title-lg text-on-surface text-sm">{{ $w->name ?? 'Sahabat Tercinta' }}</strong>
                                                        <span class="text-[11px] font-mono text-on-surface-variant">{{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->diffForHumans() : 'Baru saja' }}</span>
                                                    </div>
                                                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                                        {{ $w->message ?? 'Selamat berbahagia dan semoga rukun langgeng selamanya.' }}
                                                    </p>
                                                    <span class="inline-block mt-2 text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 bg-primary/10 text-primary rounded-full">
                                                        {{ ($w->attendance ?? 'hadir') === 'hadir' ? 'Insya Allah Hadir' : 'Berhalangan' }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        @else
                                            <!-- Preset Wishes 1 -->
                                            <div class="bg-surface-container-low/60 border border-primary/10 p-3.5 sm:p-4 rounded-xl shadow-xs">
                                                <div class="flex items-center justify-between mb-1">
                                                    <strong class="font-title-lg text-on-surface text-sm">GPH. Suryo Tedjomulyo</strong>
                                                    <span class="text-[11px] font-mono text-on-surface-variant">Baru saja</span>
                                                </div>
                                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                                    Nderek mangayubagya Raden Mas Arya kaliyan Raden Ajeng Rania. Mugi dados kulawarga ingkang sakinah, mawaddah, warahmah, tansah pinaringan berkah lan tentrem.
                                                </p>
                                                <span class="inline-block mt-2 text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 bg-primary/10 text-primary rounded-full">Insya Allah Hadir (2 Orang)</span>
                                            </div>
                                            <!-- Preset Wishes 2 -->
                                            <div class="bg-surface-container-low/60 border border-primary/10 p-3.5 sm:p-4 rounded-xl shadow-xs">
                                                <div class="flex items-center justify-between mb-1">
                                                    <strong class="font-title-lg text-on-surface text-sm">Prof. Dr. Ir. Gunawan Wibisono</strong>
                                                    <span class="text-[11px] font-mono text-on-surface-variant">2 jam lalu</span>
                                                </div>
                                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                                    Selamat mengarungi bahtera rumah tangga Mas Arya dan Mbak Rania. Semoga selalu saling melengkapi dan rukun langgeng selamanya. Amin yra.
                                                </p>
                                                <span class="inline-block mt-2 text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 bg-primary/10 text-primary rounded-full">Insya Allah Hadir</span>
                                            </div>
                                            <!-- Preset Wishes 3 -->
                                            <div class="bg-surface-container-low/60 border border-primary/10 p-3.5 sm:p-4 rounded-xl shadow-xs">
                                                <div class="flex items-center justify-between mb-1">
                                                    <strong class="font-title-lg text-on-surface text-sm">Dinda Ayuningtyas &amp; Rekan Kerja</strong>
                                                    <span class="text-[11px] font-mono text-on-surface-variant">4 jam lalu</span>
                                                </div>
                                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                                    Congratulations Rania &amp; Arya! Cantik dan gagah sekali, lancar-lancar prosesi panggih dan resepsinya!
                                                </p>
                                                <span class="inline-block mt-2 text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 bg-secondary-container text-on-secondary-fixed rounded-full">Insya Allah Hadir</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Toast notification -->
                                <div class="hidden mt-3 p-3 bg-primary text-on-primary rounded-lg text-xs flex items-center gap-2" id="rsvp-toast">
                                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                    <span>Matur nuwun! Doa dan konfirmasi kehadiran Anda telah tersimpan.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 9: TANDA KASIH (AMPLOP DIGITAL & KADO) -->
                <section class="max-w-4xl mx-auto px-gutter md:px-gutter-tablet py-space-3xl">
                    <div class="text-center mb-space-2xl">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-[0.25em] block mb-1">Tandha Asih Penganten</span>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-serif">Amplop Digital &amp; Kado Pernikahan</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-lg mx-auto">
                            Doa restu Anda merupakan karunia terindah bagi kami. Namun apabila Bapak/Ibu/Saudara/i bermaksud memberikan tanda kasih, dapat melalui sarana digital berikut:
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg max-w-3xl mx-auto">
                        <!-- Account Card 1: BCA -->
                        <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="font-label-md text-label-md font-bold uppercase tracking-wider text-primary">{{ $bankName1 }}</span>
                                    <span class="material-symbols-outlined text-primary text-2xl">account_balance</span>
                                </div>
                                <div class="text-xs text-on-surface-variant mb-1 uppercase tracking-wider">Nomor Rekening</div>
                                <div class="font-headline-md text-headline-md font-mono text-on-surface font-semibold tracking-wider mb-1" id="rekening-bca">
                                    {{ $bankAcc1 }}
                                </div>
                                <div class="text-sm font-medium text-on-surface">a.n. {{ $bankHolder1 }}</div>
                            </div>
                            <div class="mt-space-lg">
                                <button class="w-full py-2.5 px-4 bg-surface-container text-on-surface hover:bg-primary hover:text-on-primary rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center justify-center gap-2" onclick="copyToClipboard('rekening-bca', this)">
                                    <span class="material-symbols-outlined text-[16px]">content_copy</span>
                                    <span>Salin Nomor Rekening</span>
                                </button>
                            </div>
                        </div>

                        <!-- Account Card 2: Mandiri -->
                        <div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm relative overflow-hidden flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="font-label-md text-label-md font-bold uppercase tracking-wider text-primary">{{ $bankName2 }}</span>
                                    <span class="material-symbols-outlined text-primary text-2xl">credit_card</span>
                                </div>
                                <div class="text-xs text-on-surface-variant mb-1 uppercase tracking-wider">Nomor Rekening</div>
                                <div class="font-headline-md text-headline-md font-mono text-on-surface font-semibold tracking-wider mb-1" id="rekening-mandiri">
                                    {{ $bankAcc2 }}
                                </div>
                                <div class="text-sm font-medium text-on-surface">a.n. {{ $bankHolder2 }}</div>
                            </div>
                            <div class="mt-space-lg">
                                <button class="w-full py-2.5 px-4 bg-surface-container text-on-surface hover:bg-primary hover:text-on-primary rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center justify-center gap-2" onclick="copyToClipboard('rekening-mandiri', this)">
                                    <span class="material-symbols-outlined text-[16px]">content_copy</span>
                                    <span>Salin Nomor Rekening</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- QRIS Instant Gifting Accordion / Pill -->
                    <div class="mt-space-lg max-w-sm mx-auto bg-surface-container-low p-space-md rounded-xl text-center shadow-sm">
                        <span class="font-label-sm text-label-sm text-primary uppercase tracking-widest font-semibold block mb-2">QRIS Universal Barcode</span>
                        <div class="w-36 h-36 mx-auto bg-surface-container-lowest p-2 rounded-lg shadow-sm flex items-center justify-center mb-2">
                            <!-- Geometric clean QR Mockup -->
                            <svg class="w-full h-full text-on-surface" fill="currentColor" viewBox="0 0 100 100">
                                <rect fill="none" height="25" rx="3" stroke="currentColor" stroke-width="4" width="25" x="10" y="10"></rect>
                                <rect fill="currentColor" height="13" width="13" x="16" y="16"></rect>
                                <rect fill="none" height="25" rx="3" stroke="currentColor" stroke-width="4" width="25" x="65" y="10"></rect>
                                <rect fill="currentColor" height="13" width="13" x="71" y="16"></rect>
                                <rect fill="none" height="25" rx="3" stroke="currentColor" stroke-width="4" width="25" x="10" y="65"></rect>
                                <rect fill="currentColor" height="13" width="13" x="16" y="71"></rect>
                                <rect height="6" width="6" x="42" y="15"></rect>
                                <rect height="6" width="6" x="52" y="25"></rect>
                                <rect height="16" width="16" x="42" y="42"></rect>
                                <rect height="6" width="6" x="25" y="45"></rect>
                                <rect height="8" width="8" x="70" y="45"></rect>
                                <rect height="6" width="12" x="65" y="70"></rect>
                                <rect height="8" width="8" x="80" y="80"></rect>
                                <rect height="10" width="10" x="45" y="75"></rect>
                            </svg>
                        </div>
                        <p class="font-body-md text-xs text-on-surface-variant">Pindai melalui seluruh aplikasi Mobile Banking / E-Wallet</p>
                    </div>
                </section>

                <!-- SECTION 10: CLOSING & MATUR NUWUN -->
                <section class="w-full bg-surface-container-lowest py-space-3xl text-center relative overflow-hidden">
                    <div class="max-w-2xl mx-auto px-gutter relative z-10">
                        <div class="w-12 h-12 mx-auto mb-space-md text-primary flex items-center justify-center">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 40 40">
                                <polygon points="20,2 38,36 2,36"></polygon>
                                <line x1="20" x2="20" y1="2" y2="36"></line>
                                <circle cx="20" cy="18" fill="currentColor" opacity="0.3" r="4"></circle>
                            </svg>
                        </div>
                        <p class="font-headline-md text-headline-md text-primary font-serif italic mb-2">Matur Nuwun Sakalangkung</p>
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-space-xl">
                            Atas kehadiran, doa, dan restu tulus dari panjenengan sedaya, kami sekeluarga besar menghaturkan sembah nuwun ingkang tanpa pepindhan.
                        </p>
                        <div class="pt-space-md">
                            <p class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/80 mb-2">Keluwarga Ageng Mempelai</p>
                            <div class="flex flex-col md:flex-row justify-center items-center gap-4 text-on-surface font-title-lg text-title-lg">
                                <span>Kel. Bpk. Hendro Purnomo</span>
                                <span class="hidden md:inline text-primary">•</span>
                                <span>Kel. Bpk. Bambang Wicaksono</span>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full bg-surface-container-low text-on-surface pt-space-3xl pb-space-2xl border-t border-primary/10">
        <div class="max-w-4xl mx-auto px-gutter md:px-gutter-tablet text-center">
            <!-- Javanese Gunungan Royal Seal Emblem -->
            <div class="w-12 h-12 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center mx-auto mb-4 text-primary shadow-xs">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="M12,2 L19,16 L14,16 L14,21 L10,21 L10,16 L5,16 Z" stroke-linejoin="round"></path>
                    <circle cx="12" cy="11" fill="currentColor" r="1.5"></circle>
                </svg>
            </div>

            <h2 class="font-headline-lg text-2xl sm:text-3xl text-on-surface font-serif mb-2">Matur Nuwun</h2>

            <p class="font-body-md text-sm sm:text-base text-on-surface-variant max-w-lg mx-auto leading-relaxed mb-6">
                Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir serta memberikan doa restu kepada kedua mempelai.
            </p>

            <!-- Bride & Groom Names in Clean Stack on Mobile, Bullet on Desktop -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-1.5 sm:gap-3 mb-8 text-center">
                <span class="font-label-md text-xs sm:text-sm text-on-surface uppercase tracking-widest font-semibold" id="footerGroomName">
                    {{ $groomFullName }}
                </span>
                <span class="text-primary hidden sm:inline">•</span>
                <span class="font-label-md text-xs sm:text-sm text-on-surface uppercase tracking-widest font-semibold" id="footerBrideName">
                    {{ $brideFullName }}
                </span>
            </div>

            <!-- Footer Divider & Copyright -->
            <div class="pt-6 border-t border-primary/15 w-full max-w-xl mx-auto flex flex-col items-center justify-center text-center gap-1.5">
                <p class="font-label-sm text-[11px] text-on-surface-variant uppercase tracking-widest text-center">
                    © {{ date('Y') }} Pawiwahan Ageng Jawa. All rights reserved.
                </p>
                <p class="font-label-sm text-[10px] text-primary uppercase tracking-[0.2em] font-semibold text-center" id="footerVenueCity">
                    {{ $couple->venue_city ?? 'Jawa Timur' }}
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts: Countdown, Audio, Envelope, Clipboard, RSVP & Live Preview Sync -->
    <script>
        // 1. Audio Toggle Controller
        let isAudioPlaying = false;
        const audio = document.getElementById('invitationAudio');

        function toggleAudio() {
            if (!audio) return;
            if (isAudioPlaying) {
                audio.pause();
                isAudioPlaying = false;
                updateAudioUI(false);
            } else {
                audio.play().then(() => {
                    isAudioPlaying = true;
                    updateAudioUI(true);
                }).catch(e => console.warn('Audio play restricted:', e));
            }
        }

        function updateAudioUI(playing) {
            const envIcon = document.getElementById('envelopeMusicIcon');
            const mainIcon = document.getElementById('mainAudioIcon');
            const mainLabel = document.getElementById('mainAudioLabel');

            if (envIcon) envIcon.textContent = playing ? 'volume_up' : 'volume_off';
            if (mainIcon) mainIcon.textContent = playing ? 'volume_up' : 'volume_off';
            if (mainLabel) mainLabel.textContent = playing ? 'Jeda' : 'Play Gending';
        }

        // 2. Open Envelope Handler
        function openInvitationHandler() {
            const env = document.getElementById('envelopeScreen');
            if (env) {
                env.classList.add('envelope-hidden');
            }

            // Play background audio
            if (audio && !isAudioPlaying) {
                audio.play().then(() => {
                    isAudioPlaying = true;
                    updateAudioUI(true);
                }).catch(err => console.log('Autoplay policy caught:', err));
            }
        }


        // 3. Dynamic Guest Name from URL parameter
        (function initGuestName() {
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('to') || params.get('guest');
            if (guestParam) {
                const decoded = decodeURIComponent(guestParam);
                const displayElem = document.getElementById('guestNameDisplay');
                const heroGuestElem = document.getElementById('guest-name');
                const inputName = document.getElementById('guest-input-name');
                if (displayElem) displayElem.textContent = decoded;
                if (heroGuestElem) heroGuestElem.textContent = decoded;
                if (inputName) inputName.value = decoded;
            }
        })();

        // 4. Clipboard Copy Helper
        function copyToClipboard(elementId, buttonElem) {
            const el = document.getElementById(elementId);
            if (!el) return;
            const textToCopy = el.innerText.replace(/\s+/g, '');
            navigator.clipboard.writeText(textToCopy).then(() => {
                const originalHtml = buttonElem.innerHTML;
                buttonElem.innerHTML = '<span class="material-symbols-outlined text-[16px]">check</span><span>Tersalin!</span>';
                setTimeout(() => {
                    buttonElem.innerHTML = originalHtml;
                }, 2000);
            });
        }

        // 5. Interactive RSVP Wall Handler
        function submitRSVP() {
            const name = document.getElementById('guest-input-name').value.trim();
            const attendance = document.querySelector('input[name="attendance"]:checked')?.value || 'Hadir';
            const count = document.getElementById('guest-count')?.value || '1';
            const wishes = document.getElementById('guest-wishes').value.trim();

            if (!name) return;

            const list = document.getElementById('wishes-list');
            if (list) {
                const newCard = document.createElement('div');
                newCard.className = 'bg-surface-container-lowest p-4 rounded-xl shadow-sm transition-all duration-300';
                const badgeColor = attendance === 'Hadir' ? 'bg-primary/10 text-primary' : 'bg-surface-container-high text-on-surface-variant';
                const guestLabel = attendance === 'Hadir' ? `Insya Allah Hadir (${count} Orang)` : 'Berhalangan Hadir';

                newCard.innerHTML = `
                    <div class="flex items-center justify-between mb-1">
                        <strong class="font-title-lg text-title-lg text-on-surface text-sm">${name}</strong>
                        <span class="text-[11px] font-mono text-on-surface-variant">Baru saja</span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        ${wishes ? wishes : 'Mendoakan keberkahan dan kebahagiaan bagi kedua mempelai.'}
                    </p>
                    <span class="inline-block mt-2 text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 ${badgeColor} rounded">${guestLabel}</span>
                `;
                list.insertBefore(newCard, list.firstChild);
            }

            const toast = document.getElementById('rsvp-toast');
            if (toast) {
                toast.classList.remove('hidden');
                setTimeout(() => { toast.classList.add('hidden'); }, 4000);
            }

            document.getElementById('guest-wishes').value = '';
            const countBadge = document.getElementById('total-wishes-count');
            if (countBadge) {
                const currentTotal = parseInt(countBadge.innerText) || 3;
                countBadge.innerText = `${currentTotal + 1} Doa Restu`;
            }
        }

        // 6. Dynamic Countdown Timer
        (function initCountdown() {
            const targetTime = new Date('{{ $targetDate->toIso8601String() }}').getTime();

            function update() {
                const now = new Date().getTime();
                const distance = targetTime - now;

                if (distance < 0) {
                    const elDays = document.getElementById('cd-days');
                    const elHours = document.getElementById('cd-hours');
                    const elMins = document.getElementById('cd-minutes');
                    const elSecs = document.getElementById('cd-seconds');
                    if (elDays) elDays.innerText = '00';
                    if (elHours) elHours.innerText = '00';
                    if (elMins) elMins.innerText = '00';
                    if (elSecs) elSecs.innerText = '00';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                const elDays = document.getElementById('cd-days');
                const elHours = document.getElementById('cd-hours');
                const elMins = document.getElementById('cd-minutes');
                const elSecs = document.getElementById('cd-seconds');

                if (elDays) elDays.innerText = String(days).padStart(2, '0');
                if (elHours) elHours.innerText = String(hours).padStart(2, '0');
                if (elMins) elMins.innerText = String(minutes).padStart(2, '0');
                if (elSecs) elSecs.innerText = String(seconds).padStart(2, '0');
            }

            setInterval(update, 1000);
            update();
        })();

        // 7. Live Builder Synchronization (PREVIEW_IFRAME_READY, UPDATE_PREVIEW_PHOTO, etc.)
        window.addEventListener('message', function (event) {
            const data = event.data;
            if (!data || typeof data !== 'object') return;

            if (data.type === 'UPDATE_PREVIEW_PHOTO') {
                const target = data.target;
                const photoUrl = data.photoUrl;
                if (!photoUrl) return;

                if (target === 'cover') {
                    const cImg = document.getElementById('previewCoverPhotoImg');
                    if (cImg) cImg.src = photoUrl;
                    const heroImg = document.getElementById('previewCoverHeroImg');
                    if (heroImg) heroImg.src = photoUrl;
                } else if (target === 'groom') {
                    const gImg = document.getElementById('previewGroomPhotoImg');
                    if (gImg) gImg.src = photoUrl;
                } else if (target === 'bride') {
                    const bImg = document.getElementById('previewBridePhotoImg');
                    if (bImg) bImg.src = photoUrl;
                }
            }

            if (data.type === 'UPDATE_PREVIEW_PARENTS') {
                if (data.groomParents) {
                    const gEl = document.getElementById('previewGroomParentsText');
                    if (gEl) gEl.innerHTML = `Putra pertama dari pasangan:<br><strong class="text-on-surface font-medium">${data.groomParents}</strong>`;
                }
                if (data.brideParents) {
                    const bEl = document.getElementById('previewBrideParentsText');
                    if (bEl) bEl.innerHTML = `Putri kedua dari pasangan:<br><strong class="text-on-surface font-medium">${data.brideParents}</strong>`;
                }
            }

            if (data.type === 'UPDATE_PREVIEW_GALLERY') {
                const grid = document.getElementById('previewGalleryGrid');
                if (grid && Array.isArray(data.photos) && data.photos.length > 0) {
                    const images = grid.querySelectorAll('img');
                    data.photos.forEach((src, idx) => {
                        if (images[idx] && src) images[idx].src = src;
                    });
                }
            }

            if (data.type === 'UPDATE_PREVIEW_FIELD') {
                if (data.field === 'groom_name') {
                    const gEl = document.getElementById('previewGroomFullNameText');
                    if (gEl) gEl.textContent = data.value;
                    const fgEl = document.getElementById('footerGroomName');
                    if (fgEl) fgEl.textContent = data.value;
                } else if (data.field === 'bride_name') {
                    const bEl = document.getElementById('previewBrideFullNameText');
                    if (bEl) bEl.textContent = data.value;
                    const fbEl = document.getElementById('footerBrideName');
                    if (fbEl) fbEl.textContent = data.value;
                } else if (data.field === 'venue_city') {
                    const cCity = document.getElementById('coverVenueCity');
                    if (cCity) cCity.textContent = data.value;
                    const hCity = document.getElementById('heroVenueCity');
                    if (hCity) hCity.textContent = data.value;
                    const fCity = document.getElementById('footerVenueCity');
                    if (fCity) fCity.textContent = data.value;
                }
            }
        });

        // Handshake to parent frame
        window.addEventListener('DOMContentLoaded', function () {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        });
    </script>
</body>
</html>
