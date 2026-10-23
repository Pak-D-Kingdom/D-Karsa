<!DOCTYPE html>
<html lang="id" class="scroll-smooth lp-html overflow-x-hidden">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="theme-color" content="#fffcfc">
    <title>@yield('title', 'Undangan Pernikahan')</title>
    <meta name="description" content="@yield('meta_description', 'Undangan pernikahan digital')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        script: ['"Alex Brush"', 'cursive'],
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        cream: '#fffcfc',
                        blush: '#fff8f3',
                        sunk: '#fef3ec',
                        ink: '#1b1416',
                        ink2: '#55474b',
                        ink3: '#75686c',
                        brand: '#f97316',
                        accent: '#ea580c',
                        cta: '#f97316',
                        'accent-soft': '#ffedd5',
                        gold: '#f59e0b',
                        sage: '#8FA98B',
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --bg: #fffcfc;
            --bg-blush: #fff8f3;
            --bg-sunk: #fef3ec;
            --surface: #ffffff;
            --ink: #1b1416;
            --ink-2: #55474b;
            --ink-3: #75686c;
            --line: rgba(27, 20, 22, 0.09);
            --line-2: rgba(27, 20, 22, 0.16);
            --brand: #f97316;
            --accent: #ea580c;
            --cta: #f97316;
            --accent-soft: #ffedd5;
            --shadow: 0 30px 60px -32px rgba(234, 88, 12, 0.28), 0 8px 24px -16px rgba(27, 20, 22, 0.18);
            --shadow-s: 0 14px 30px -18px rgba(234, 88, 12, 0.25);
            --font-serif: "Playfair Display", Georgia, serif;
            --font-script: "Alex Brush", cursive;
            --font-sans: "Plus Jakarta Sans", ui-sans-serif, system-ui, sans-serif;
            --r-card: 1.5rem;
            --ease: cubic-bezier(0.32, 0.72, 0, 1);
            --kawung: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='44' height='44'%3E%3Cg fill='none' stroke='%23ea580c' stroke-width='.9'%3E%3Cellipse cx='22' cy='11' rx='5.5' ry='9'/%3E%3Cellipse cx='22' cy='33' rx='5.5' ry='9'/%3E%3Cellipse cx='11' cy='22' rx='9' ry='5.5'/%3E%3Cellipse cx='33' cy='22' rx='9' ry='5.5'/%3E%3Ccircle cx='22' cy='22' r='1.6'/%3E%3Ccircle r='2'/%3E%3Ccircle cx='44' r='2'/%3E%3Ccircle cy='44' r='2'/%3E%3Ccircle cx='44' cy='44' r='2'/%3E%3C/g%3E%3C/svg%3E");
        }
        html, body {
            max-width: 100vw;
            overflow-x: hidden;
        }
        body {
            background: var(--bg);
            color: var(--ink);
            font-family: var(--font-sans);
            overflow-x: hidden;
            width: 100%;
        }
        body.lock { overflow: hidden; }

        /* D'Karsa Signature Typography */
        .dk-h1, .dk-h2, .ow-h1, .ow-h2 {
            font-family: var(--font-serif);
            font-weight: 700;
            letter-spacing: -0.025em;
            color: var(--ink);
            text-wrap: balance;
        }
        .dk-h1, .ow-h1 { font-size: clamp(2.3rem, 4.4vw, 3.8rem); line-height: 1.15; }
        .dk-h2, .ow-h2 { font-size: clamp(1.85rem, 3.6vw, 2.9rem); line-height: 1.2; }
        .t-script {
            font-family: var(--font-serif);
            font-style: italic;
            font-weight: 700;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 60%, #c2410c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            padding: 0 0.1em;
        }
        .t-bold {
            font-family: var(--font-sans);
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--ink);
        }

        /* D'Karsa Modern Gradient & Heading Utilities */
        .dk-gradient-text {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #c2410c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Modern Eyebrow Pill (.alis) */
        .alis {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 1.1rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #c2410c;
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            border: 1px solid rgba(249, 115, 22, 0.25);
            box-shadow: 0 2px 8px -2px rgba(249, 115, 22, 0.15);
        }

        /* Modern D'Karsa Buttons (.tbl) */
        .tbl {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            white-space: nowrap;
            height: 3.25rem;
            padding: 0 1.5rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: -0.01em;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }
        .tbl:active { transform: scale(0.98); }
        .tbl__ikon {
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            display: grid;
            place-items: center;
            transition: transform 0.3s ease;
        }
        .tbl:hover .tbl__ikon { transform: translateX(3px); }
        .tbl--utama {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 60%, #c2410c 100%);
            color: #fff;
            box-shadow: 0 12px 28px -8px rgba(234, 88, 12, 0.45);
            border: 1px solid rgba(255,255,255,0.25);
        }
        .tbl--utama:hover {
            box-shadow: 0 16px 34px -8px rgba(234, 88, 12, 0.6);
            transform: translateY(-2px);
        }
        .tbl--utama .tbl__ikon { background: rgba(255,255,255,0.25); color: #fff; }
        .tbl--kedua {
            color: var(--ink);
            background: #fff;
            border: 1.5px solid rgba(27, 20, 22, 0.12);
            box-shadow: 0 4px 14px -4px rgba(27, 20, 22, 0.06);
        }
        .tbl--kedua:hover {
            border-color: var(--brand);
            color: var(--brand);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px -6px rgba(249, 115, 22, 0.2);
        }

        /* Sections & Kawung Motif */
        .sec--blush {
            background: linear-gradient(180deg, var(--bg), var(--bg-blush) 16%, var(--bg-blush) 84%, var(--bg));
        }
        .motif { position: relative; isolation: isolate; }
        .motif::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background-image: var(--kawung);
            background-size: 44px 44px;
            opacity: 0.11;
            -webkit-mask-image: radial-gradient(65% 55% at 85% 15%, #000 0, transparent 75%);
            mask-image: radial-gradient(65% 55% at 85% 15%, #000 0, transparent 75%);
        }
        .motif--kiri::before {
            -webkit-mask-image: radial-gradient(60% 60% at 12% 75%, #000 0, transparent 75%);
            mask-image: radial-gradient(60% 60% at 12% 75%, #000 0, transparent 75%);
        }

        /* Floating Pill Navbar (.lp-nav) */
        .lp-nav {
            position: fixed;
            z-index: 40;
            top: 12px;
            left: 50%;
            transform: translateX(-50%);
            width: min(1160px, calc(100% - 28px));
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            padding: 0 0.5rem 0 1.15rem;
            border-radius: 999px;
            background: hsla(0, 0%, 100%, 0.84);
            -webkit-backdrop-filter: blur(16px) saturate(160%);
            backdrop-filter: blur(16px) saturate(160%);
            box-shadow: inset 0 0 0 1px var(--line), 0 18px 40px -28px rgba(120, 30, 50, 0.42);
            transition: transform 0.5s var(--ease), opacity 0.4s var(--ease);
        }

        /* Bento & Cards (.sel) */
        .sel {
            border-radius: var(--r-card);
            padding: 1.6rem;
            background: #fff;
            box-shadow: 0 0 0 1px var(--line), var(--shadow-s);
            position: relative;
            overflow: hidden;
            isolation: isolate;
        }
        .sel--merah {
            background: linear-gradient(155deg, #fff, #fff4ed);
        }
        .sel--motif::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background-image: var(--kawung);
            background-size: 44px 44px;
            opacity: 0.08;
            -webkit-mask-image: linear-gradient(200deg, #000, transparent 65%);
            mask-image: linear-gradient(200deg, #000, transparent 65%);
        }
        .poin__ikon {
            width: 2.6rem;
            height: 2.6rem;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: var(--accent);
            background: var(--accent-soft);
            flex-shrink: 0;
        }

        /* Phone Mockup Frame (.hp) */
        .hp-frame {
            position: relative;
            padding: 10px;
            border-radius: 36px;
            background: linear-gradient(150deg, rgba(255,255,255,0.95), rgba(255,255,255,0.45));
            -webkit-backdrop-filter: blur(16px) saturate(1.8);
            backdrop-filter: blur(16px) saturate(1.8);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.95), 0 0 0 1px rgba(251, 146, 60, 0.3), 0 46px 80px -42px rgba(234, 88, 12, 0.4), 0 16px 34px -22px rgba(27,20,22,0.28);
        }

        /* Marquee Gallery */
        .marquee {
            overflow: hidden;
            -webkit-mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
            mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
        }
        .marquee__jalur {
            display: flex;
            gap: 1rem;
            width: max-content;
            animation: lp-geser 48s linear infinite;
        }
        .marquee:hover .marquee__jalur, .marquee.dijeda .marquee__jalur {
            animation-play-state: paused;
        }
        @keyframes lp-geser {
            to { transform: translateX(calc(-50% - 0.5rem)); }
        }

        /* Pricing Package Card (.paket) */
        .paket {
            border-radius: var(--r-card);
            padding: 1.75rem 1.5rem;
            background: #fff;
            box-shadow: 0 0 0 1px var(--line), var(--shadow-s);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
        }
        .paket:hover {
            transform: translateY(-4px);
        }
        .paket--saran {
            background: linear-gradient(160deg, #fff 35%, #fff4ed);
            box-shadow: 0 0 0 2px var(--brand), var(--shadow);
        }

        /* Filter Chip (.chip) */
        .chip {
            height: 2.5rem;
            padding: 0 1.15rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--ink-2);
            background: #fff;
            box-shadow: inset 0 0 0 1px var(--line-2);
            transition: all 0.25s var(--ease);
            cursor: pointer;
        }
        .chip:hover {
            color: var(--ink);
            box-shadow: inset 0 0 0 1px var(--ink);
        }
        .chip.aktif {
            background: var(--ink);
            color: #fff;
            box-shadow: none;
        }

        /* FAQ Accordion (details) */
        .faq-item {
            border-radius: 1.15rem;
            background: #fff;
            box-shadow: 0 0 0 1px var(--line), 0 8px 20px -14px rgba(120, 30, 50, 0.18);
            overflow: hidden;
            transition: box-shadow 0.3s var(--ease);
        }
        .faq-item[open] {
            box-shadow: 0 0 0 1.5px var(--brand), var(--shadow-s);
        }
        .faq-item summary {
            list-style: none;
            cursor: pointer;
            padding: 1.15rem 1.35rem;
            font-weight: 700;
            font-size: 0.96rem;
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .faq-item summary::-webkit-details-marker { display: none; }
        .faq-item summary svg {
            transition: transform 0.3s var(--ease);
            flex-shrink: 0;
        }
        .faq-item[open] summary svg {
            transform: rotate(180deg);
            color: var(--brand);
        }

        /* Floating WhatsApp Button (.wa-melayang) */
        .wa-melayang {
            position: fixed;
            z-index: 45;
            right: 18px;
            bottom: 18px;
            height: 48px;
            padding: 0 1.1rem 0 0.75rem;
            border-radius: 999px;
            background: #1b1416;
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 18px 34px -12px rgba(27, 20, 22, 0.55);
            transition: transform 0.35s var(--ease), background-color 0.3s var(--ease);
        }
        .wa-melayang:hover {
            transform: translateY(-2px);
            background: #25d366;
            color: #fff;
        }
        .wa-melayang__ikon {
            width: 32px;
            height: 32px;
            border-radius: 999px;
            background: #25d366;
            color: #fff;
            display: grid;
            place-items: center;
        }
    </style>
    @stack('head')
</head>
<body class="antialiased" id="top">
    {{-- SVG Icon Sprites --}}
    <svg width="0" height="0" aria-hidden="true" style="position:absolute">
        <symbol id="i-arrow-up-right" viewBox="0 0 256 256" fill="currentColor">
            <path d="M198,64V168a6,6,0,0,1-12,0V78.48L68.24,196.24a6,6,0,0,1-8.48-8.48L177.52,70H88a6,6,0,0,1,0-12H192A6,6,0,0,1,198,64Z"></path>
        </symbol>
        <symbol id="i-arrow-right" viewBox="0 0 256 256" fill="currentColor">
            <path d="M220.24,132.24l-72,72a6,6,0,0,1-8.48-8.48L201.51,134H40a6,6,0,0,1,0-12H201.51L139.76,60.24a6,6,0,0,1,8.48-8.48l72,72A6,6,0,0,1,220.24,132.24Z"></path>
        </symbol>
        <symbol id="i-check" viewBox="0 0 256 256" fill="currentColor">
            <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path>
        </symbol>
        <symbol id="i-caret-down" viewBox="0 0 256 256" fill="currentColor">
            <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
        </symbol>
        <symbol id="i-centang-biru" viewBox="0 0 16 16">
            <circle cx="8" cy="8" r="4.6" fill="#fff"></circle>
            <path fill="#0095f6" d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
        </symbol>
        <symbol id="i-map-pin" viewBox="0 0 256 256" fill="currentColor">
            <path d="M128,66a38,38,0,1,0,38,38A38,38,0,0,0,128,66Zm0,64a26,26,0,1,1,26-26A26,26,0,0,1,128,130Zm0-112a86.1,86.1,0,0,0-86,86c0,30.91,14.34,63.74,41.47,94.94a252.32,252.32,0,0,0,41.09,38,6,6,0,0,0,6.88,0,252.32,252.32,0,0,0,41.09-38c27.13-31.2,41.47-64,41.47-94.94A86.1,86.1,0,0,0,128,18Zm0,206.51C113,212.93,54,163.62,54,104a74,74,0,0,1,148,0C202,163.62,143,212.93,128,224.51Z"></path>
        </symbol>
        <symbol id="i-gift" viewBox="0 0 256 256" fill="currentColor">
            <path d="M216,74H174.74a46.41,46.41,0,0,0,6-4.48,27.56,27.56,0,0,0,9.22-20A30.63,30.63,0,0,0,158.5,18a27.56,27.56,0,0,0-20,9.22A57.1,57.1,0,0,0,128,45.76a57.1,57.1,0,0,0-10.48-18.53A27.56,27.56,0,0,0,97.5,18,30.63,30.63,0,0,0,66,49.51a27.56,27.56,0,0,0,9.22,20,45.74,45.74,0,0,0,6,4.48H40A14,14,0,0,0,26,88v32a14,14,0,0,0,14,14h2v66a14,14,0,0,0,14,14H200a14,14,0,0,0,14-14V134h2a14,14,0,0,0,14-14V88A14,14,0,0,0,216,74Z"></path>
        </symbol>
        <symbol id="i-chats-circle" viewBox="0 0 256 256" fill="currentColor">
            <path d="M229.93,186.58A78,78,0,0,0,168.16,74.42,78,78,0,1,0,26.07,138.58L18.58,164A14,14,0,0,0,36,181.42l25.46-7.49a78,78,0,0,0,26.39,7.63,78,78,0,0,0,106.77,40.37L220,229.42A14,14,0,0,0,237.42,212Z"></path>
        </symbol>
        <symbol id="i-check-circle" viewBox="0 0 256 256" fill="currentColor">
            <path d="M172.24,99.76a6,6,0,0,1,0,8.48l-56,56a6,6,0,0,1-8.48,0l-24-24a6,6,0,0,1,8.48-8.48L112,151.51l51.76-51.75A6,6,0,0,1,172.24,99.76ZM230,128A102,102,0,1,1,128,26,102.12,102.12,0,0,1,230,128Zm-12,0a90,90,0,1,0-90,90A90.1,90.1,0,0,0,218,128Z"></path>
        </symbol>
        <symbol id="i-music-notes" viewBox="0 0 256 256" fill="currentColor">
            <path d="M211.69,19.27a6,6,0,0,0-5.15-1.09l-128,32A6,6,0,0,0,74,56V170.11A34,34,0,1,0,86,196V108.68l116-29v58.43A34,34,0,1,0,214,164V24A6,6,0,0,0,211.69,19.27Z"></path>
        </symbol>
        <symbol id="i-whatsapp-logo" viewBox="0 0 256 256" fill="currentColor">
            <path d="M152.58,145.23l23,11.48A24,24,0,0,1,152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155ZM232,128A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-40,24a8,8,0,0,0-4.42-7.16l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88A40,40,0,0,0,192,152Z"></path>
        </symbol>
    </svg>

    @yield('content')
    @stack('scripts')
</body>
</html>
