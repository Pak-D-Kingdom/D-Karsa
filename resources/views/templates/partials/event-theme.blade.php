{{--
    D'Karsa Event Theme — shared shell for 5 event categories (89 templates).
    Categories: birthday (V-angle gate), aqiqah (straight gate), religious (straight gate),
    graduate (straight gate), corporate (3D envelope). Config: $tj.
--}}
@php
    $tierParam = in_array(request()->query('tier'), ['basic', 'premium', 'eksklusif', 'kustom'], true) ? request()->query('tier') : 'eksklusif';
@endphp
<!DOCTYPE html>
<html lang="id" data-tier="{{ $tierParam }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $tj['name'] }} — {{ $couple->event_heading ?? 'Undangan' }} | D'Karsa</title>
    <meta name="description" content="Undangan digital {{ $tj['name'] }} ({{ $tj['palette'] }}) oleh D'Karsa.">
    <meta property="og:title" content="{{ $tj['name'] }} — {{ $couple->event_heading ?? 'Undangan' }}">
    <meta property="og:description" content="Undangan digital premium D'Karsa — dirancang dengan cinta.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --bg: #fbf9f4; --surface: #ffffff; --ink: #1b1a17; --soft: #5f5a52;
            --accent: #c9a050; --accent-2: #e6d3ae; --deep: #2a2a26;
            --line: rgba(0,0,0,.10);
            --accent-ink: color-mix(in srgb, var(--accent) 52%, var(--ink));
            --fil: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 28 28'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.4' stroke-linecap='round'%3E%3Cpath d='M2 26 V10 A8 8 0 0 1 10 2 H26'/%3E%3Cpath d='M7 26 V13 A6 6 0 0 1 13 7 H26' opacity='.5'/%3E%3Cpath d='M26 6 c-6 1 -9 4 -9 9 5 -1 9 -4 9 -9 Z'/%3E%3Cpath d='M6 26 c1 -6 4 -9 9 -9 -1 5 -4 9 -9 9 Z' opacity='.8'/%3E%3Ccircle cx='11' cy='11' r='1.4'/%3E%3C/g%3E%3C/svg%3E");
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.2'%3E%3Cpath d='M36 4 L68 36 L36 68 L4 36 Z'/%3E%3Cpath d='M36 16 L56 36 L36 56 L16 36 Z' opacity='.65'/%3E%3Cpath d='M0 36 H72 M36 0 V72' opacity='.35'/%3E%3C/g%3E%3C/svg%3E");
        }
        * { -webkit-tap-highlight-color: transparent; }
        html { scroll-behavior: smooth; overflow-x: clip; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; line-height: 1.6; background: var(--bg); color: var(--ink); overflow-x: clip; }
        .serif { font-family: 'Cormorant Garamond', serif; }
        .num { font-family: 'Space Grotesk', sans-serif; }
        .label { text-transform: uppercase; letter-spacing: .18em; font-size: 10px; font-weight: 700; }
        /* Paket basic: tanpa animasi dekoratif berulang; parallax/partikel milik eksklusif & kustom. */
        html[data-tier="basic"] .sway, html[data-tier="basic"] .balloon-field,
        html[data-tier="basic"] #confetti-canvas { display: none !important; }
        section[id] { scroll-margin-top: 16px; }

        /* Z-0 tactile canvas */
        .canvas-texture {
            background-color: var(--bg);
            background-image:
                radial-gradient(circle at 1px 1px, color-mix(in srgb, var(--accent) 26%, transparent) 1px, transparent 0),
                radial-gradient(circle at 21px 21px, color-mix(in srgb, var(--accent) 16%, transparent) 1px, transparent 0);
            background-size: 40px 40px, 40px 40px;
        }
        .page-photo {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
            background-size: cover; background-position: center;
            opacity: .42; filter: saturate(.92) brightness(1.02) blur(1.5px);
        }
        body.gate-locked .page-photo { opacity: 0; }

        /* Z-30 gate */
        #gateLayer { position: fixed; inset: 0; z-index: 40; pointer-events: none; perspective: 1400px; perspective-origin: center center; }
        .gate-wing {
            position: fixed; top: -3px; bottom: -3px; width: 52vw; z-index: 30; pointer-events: none; overflow: hidden;
            will-change: transform; backface-visibility: hidden;
            transition: transform var(--gate-dur, .9s) var(--gate-ease, cubic-bezier(.16,1,.3,1));
            background: var(--deep);
        }
        .gate-wing-left { left: 0; transform-origin: 0% 50%; border-right: 2.5px solid #c9a050; }
        .gate-wing-right { right: 0; transform-origin: 100% 50%; border-left: 2.5px solid #c9a050; }
        .gate-straight .gate-wing { width: 50vw; }
        .gate-wing svg { width: 100%; height: 100%; display: block; }
        .gate-wing::after {
            content: ''; position: absolute; top: 0; bottom: 0; width: 64px; pointer-events: none;
            opacity: var(--shade, 0); transition: opacity .3s ease;
        }
        .gate-wing-left::after { right: 0; background: linear-gradient(to left, rgba(0,0,0,.62), rgba(0,0,0,.18) 45%, rgba(0,0,0,0)); }
        .gate-wing-right::after { left: 0; background: linear-gradient(to right, rgba(0,0,0,.62), rgba(0,0,0,.18) 45%, rgba(0,0,0,0)); }
        #gateVeil {
            position: fixed; inset: 0; z-index: 1; pointer-events: none;
            background:
                repeating-linear-gradient(90deg, color-mix(in srgb, var(--accent) 10%, transparent) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(0deg, color-mix(in srgb, var(--accent) 7%, transparent) 0 1px, transparent 1px 28px),
                linear-gradient(168deg, var(--deep), color-mix(in srgb, var(--deep) 72%, var(--bg)));
        }
        body.gate-locked main { opacity: 0; transform: translateY(18px) scale(.994); filter: blur(7px); }
        main { transition: opacity .95s ease, transform 1.1s cubic-bezier(.16,1,.3,1), filter .95s ease; }
        #gateLayer.gate-hidden { display: none; }
        body.gate-open #gateLayer { z-index: 5; }

        /* Z-40 cover */
        body:not(.gate-open) #audioPill { opacity: 0; pointer-events: none; }
        #audioPill { transition: transform .25s ease, box-shadow .25s ease; }
        #audioPill:active { transform: scale(.93); }
        #audioPill.is-playing { box-shadow: 0 0 0 2px color-mix(in srgb, var(--accent) 55%, transparent), 0 12px 28px -10px rgba(0,0,0,.6); }
        #icoPause { display: none; }
        #audioPill.is-playing #icoPlay { display: none; }
        #audioPill.is-playing #icoPause { display: block; }
        .cover-card {
            background: color-mix(in srgb, var(--surface) 93%, transparent);
            -webkit-backdrop-filter: blur(16px) saturate(1.04); backdrop-filter: blur(16px) saturate(1.04);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
            border-radius: 20px;
            box-shadow: 0 34px 80px -26px rgba(0,0,0,.5);
        }
        .cover-scroll { scrollbar-width: none; -ms-overflow-style: none; }
        .cover-scroll::-webkit-scrollbar { width: 0; height: 0; display: none; }

        /* Hero frames */
        .hero-arch { border-radius: 999px 999px 18px 18px; overflow: hidden; }
        .hero-medallion { border-radius: 999px; overflow: hidden; }
        .hero-diagonal { clip-path: polygon(0 0, 100% 0, 100% 82%, 0 100%); overflow: hidden; }
        .hero-rects { overflow: visible; }
        .hero-rects img { box-shadow: 12px 12px 0 -2px var(--accent-2); }
        .hero-glass { border-radius: 22px; overflow: hidden; backdrop-filter: blur(14px); }

        /* Reveal */
        .reveal { opacity: 0; transform: translate3d(0, 26px, 0); transition: opacity .8s ease, transform .9s cubic-bezier(.16,1,.3,1); }
        .reveal.is-visible { opacity: 1; transform: none; }

        /* Micro-interactions */
        @keyframes breathe { 0%,100% { transform: scale(1); box-shadow: 0 0 0 0 color-mix(in srgb, var(--accent) 55%, transparent); } 60% { transform: scale(1.03); box-shadow: 0 0 0 16px transparent; } }
        .pulse-cta { animation: breathe 2.6s ease-in-out infinite; }
        @keyframes sway { 0%,100% { transform: rotate(-2.5deg); } 50% { transform: rotate(2.5deg); } }
        .sway { animation: sway 7s ease-in-out infinite; transform-origin: top center; }
        @keyframes shimmer { 0% { background-position: -140% 0; } 100% { background-position: 240% 0; } }
        .foil-line { background: linear-gradient(100deg, transparent 20%, var(--accent) 45%, var(--accent-2) 55%, transparent 80%); background-size: 200% 100%; animation: shimmer 7s linear infinite; height: 1px; }
        .shimmer-btn { position: relative; overflow: hidden; }
        .shimmer-btn::after { content: ""; position: absolute; inset: 0; background: linear-gradient(100deg, transparent 30%, color-mix(in srgb, var(--accent-2) 55%, transparent) 50%, transparent 70%); background-size: 220% 100%; animation: shimmer 4.5s linear infinite; pointer-events: none; }

        /* Anti-plain-box cards */
        .card {
            position: relative; overflow: hidden;
            background: color-mix(in srgb, var(--surface) 94%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 42%, transparent);
            box-shadow: 0 24px 50px -34px color-mix(in srgb, var(--deep) 70%, transparent);
        }
        .card::before { content: ""; position: absolute; inset: 5px; border-radius: inherit; pointer-events: none; border: 1px solid color-mix(in srgb, var(--accent) 26%, transparent); }
        .card::after {
            content: ""; position: absolute; inset: 0; pointer-events: none; border-radius: inherit;
            background-color: var(--accent); opacity: .06;
            -webkit-mask-image: var(--motif); mask-image: var(--motif);
            -webkit-mask-size: 76px 76px; mask-size: 76px 76px;
            -webkit-mask-repeat: repeat; mask-repeat: repeat;
        }
        .scard {
            position: relative; overflow: hidden;
            background: color-mix(in srgb, var(--surface) 96%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 18%, transparent);
            border-radius: 16px;
            box-shadow: 0 8px 22px -14px color-mix(in srgb, var(--deep) 55%, transparent);
        }
        .scard::after {
            content: ""; position: absolute; inset: 0; pointer-events: none; border-radius: inherit;
            background-color: var(--accent); opacity: .035;
            -webkit-mask-image: var(--motif); mask-image: var(--motif);
            -webkit-mask-size: 88px 88px; mask-size: 88px 88px; -webkit-mask-repeat: repeat; mask-repeat: repeat;
        }
        .scard::before { content: ""; position: absolute; inset: 4px; border-radius: 12px; pointer-events: none; border: 1px solid color-mix(in srgb, var(--accent) 22%, transparent); }
        .scard > * { position: relative; z-index: 1; }
        .card > * { position: relative; z-index: 1; }
        .fil { position: absolute; width: 22px; height: 22px; z-index: 2; pointer-events: none; background-color: var(--accent); opacity: .8; -webkit-mask: var(--fil) center / 100% 100% no-repeat; mask: var(--fil) center / 100% 100% no-repeat; }
        .fil-tl { top: 5px; left: 5px; }
        .fil-tr { top: 5px; right: 5px; transform: scaleX(-1); }
        .fil-bl { bottom: 5px; left: 5px; transform: scaleY(-1); }
        .fil-br { bottom: 5px; right: 5px; transform: scale(-1, -1); }

        /* Ornamental divider */
        .sec-rule { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 10px; }
        .sec-rule span { height: 1px; width: 40px; background: linear-gradient(90deg, transparent, color-mix(in srgb, var(--accent) 80%, transparent)); }
        .sec-rule span:last-child { background: linear-gradient(270deg, transparent, color-mix(in srgb, var(--accent) 80%, transparent)); }
        .sec-rule i { width: 6px; height: 6px; transform: rotate(45deg); background: var(--accent); opacity: .85; }
        .pill {
            display: inline-block; padding: 6px 12px; border-radius: 999px;
            font-size: 9px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase;
            color: var(--accent-ink); background: color-mix(in srgb, var(--accent) 14%, transparent);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
        }

        /* Countdown plaque */
        .plaque { position: relative; padding: 14px 6px; border-radius: 10px; background: linear-gradient(160deg, color-mix(in srgb, var(--deep) 94%, black), var(--deep)); box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent) 50%, transparent), inset 0 -10px 20px -14px black, 0 10px 22px -16px rgba(0,0,0,.85); }
        .plaque::after { content: ""; position: absolute; inset: 4px; border-radius: 7px; border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent); }

        /* Forms */
        .field { width: 100%; min-height: 48px; padding: 0 14px; font-size: 15px; line-height: 1.35; background: var(--surface); border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent); border-radius: 10px; color: var(--ink); }
        textarea.field { padding: 12px 14px; min-height: 96px; resize: vertical; }
        .field:focus { outline: 2px solid color-mix(in srgb, var(--accent) 55%, transparent); outline-offset: 1px; }
        .toggle-card { display: flex; align-items: center; justify-content: center; gap: 5px; height: 46px; min-height: 46px; padding: 0 6px; width: 100%; min-width: 0; border-radius: 10px; border: 1.5px solid color-mix(in srgb, var(--accent) 55%, transparent); background: var(--surface); color: var(--accent-ink); font-size: 10px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; white-space: nowrap; transition: all .2s ease; overflow: hidden; }
        .toggle-card .ic { font-size: 12px; line-height: 1; flex: 0 0 auto; }
        .toggle-card .txt { min-width: 0; overflow: hidden; text-overflow: ellipsis; }
        .peer:checked ~ .toggle-card { background: var(--deep); border-color: var(--deep); color: var(--accent-2); box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent) 45%, transparent); }

        /* Guestbook feed — no native scrollbar */
        .guestbook-feed { max-height: 21rem; overflow-y: auto; padding-right: 2px; scrollbar-width: none; -ms-overflow-style: none; -webkit-mask-image: linear-gradient(180deg, #000 0, #000 84%, transparent 100%); mask-image: linear-gradient(180deg, #000 0, #000 84%, transparent 100%); }
        .guestbook-feed::-webkit-scrollbar { width: 0; height: 0; display: none; }
        .note-card { position: relative; padding: 12px 14px; border-radius: 10px; background: color-mix(in srgb, var(--surface) 88%, var(--bg)); border: 1px solid color-mix(in srgb, var(--accent) 22%, transparent); }
        .note-card::after { content: "\201C"; position: absolute; right: 10px; bottom: -10px; font-family: 'Cormorant Garamond', serif; font-size: 46px; line-height: 1; color: var(--accent); opacity: .16; }
        .avatar-initial { width: 32px; height: 32px; border-radius: 999px; display: grid; place-items: center; font-size: 11px; font-weight: 700; color: var(--accent-2); background: color-mix(in srgb, var(--deep) 88%, black); border: 1px solid color-mix(in srgb, var(--accent) 55%, transparent); }
        .badge-hadir { display: inline-flex; align-items: center; gap: 4px; padding: 2px 8px; border-radius: 999px; font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--accent-2); background: color-mix(in srgb, var(--deep) 86%, transparent); border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent); }

        /* ATM metallic card */
        .atm-card { position: relative; overflow: hidden; border-radius: 14px; padding: 16px; text-align: left; color: var(--accent-2); background: linear-gradient(135deg, color-mix(in srgb, var(--deep) 86%, black), color-mix(in srgb, var(--accent) 36%, var(--deep))); border: 1px solid color-mix(in srgb, var(--accent) 65%, transparent); box-shadow: 0 20px 38px -24px rgba(0,0,0,.75), inset 0 1px 0 color-mix(in srgb, var(--accent-2) 40%, transparent); }
        .atm-card::before { content: ""; position: absolute; inset: 0; opacity: .3; pointer-events: none; background-image: repeating-radial-gradient(circle at 18% 130%, transparent 0 11px, color-mix(in srgb, var(--accent-2) 22%, transparent) 11px 12px); }
        .atm-card::after { content: ""; position: absolute; inset: 6px; border-radius: 10px; border: 1px solid color-mix(in srgb, var(--accent-2) 22%, transparent); pointer-events: none; }
        .atm-number { font-variant-numeric: tabular-nums; letter-spacing: .16em; font-size: 15px; font-weight: 600; text-shadow: 0 1px 0 rgba(0,0,0,.6), 0 -1px 0 color-mix(in srgb, var(--accent-2) 30%, transparent); }
        .atm-label { font-size: 9px; letter-spacing: .18em; text-transform: uppercase; opacity: .85; }
        .gift-address { position: relative; border: 1px dashed color-mix(in srgb, var(--accent) 50%, transparent); border-radius: 10px; padding: 14px; background: color-mix(in srgb, var(--accent) 7%, transparent); }

        /* Ticket notches */
        .card-ticket { overflow: visible; --notch: 10px; -webkit-mask-image: radial-gradient(circle var(--notch) at 0 50%, transparent 98%, #000 100%), radial-gradient(circle var(--notch) at 100% 50%, transparent 98%, #000 100%); -webkit-mask-composite: source-in; mask-image: radial-gradient(circle var(--notch) at 0 50%, transparent 98%, #000 100%), radial-gradient(circle var(--notch) at 100% 50%, transparent 98%, #000 100%); mask-composite: intersect; }
        .perf { border-top: 1px dashed color-mix(in srgb, var(--accent) 45%, transparent); margin: 14px 0; }
        .ribbon { display: inline-block; padding: 7px 18px; font-size: 10px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2); background: var(--deep); clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 50%, calc(100% - 10px) 100%, 10px 100%, 0 50%); }
        .btn-metal { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 44px; padding: 11px 20px; border-radius: 999px; font-size: 10px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: var(--accent-2); background: linear-gradient(180deg, color-mix(in srgb, var(--deep) 90%, white 10%), var(--deep)); border: 1px solid color-mix(in srgb, var(--accent) 75%, transparent); box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent-2) 45%, transparent), 0 10px 22px -16px rgba(0,0,0,.8); }

        /* Timeline (rundown/journey) */
        .story-timeline { position: relative; padding-left: 34px; }
        .story-timeline::before { content: ""; position: absolute; left: 13px; top: 4px; bottom: 4px; width: 2px; border-radius: 2px; background: linear-gradient(to bottom, color-mix(in srgb, var(--accent) 10%, transparent), color-mix(in srgb, var(--accent) 70%, transparent) 12%, color-mix(in srgb, var(--accent) 70%, transparent) 88%, color-mix(in srgb, var(--accent) 10%, transparent)); }
        .story-item { position: relative; margin-bottom: 16px; }
        .story-item:last-child { margin-bottom: 0; }
        .story-marker { position: absolute; left: -34px; top: 4px; width: 28px; height: 28px; display: grid; place-items: center; z-index: 1; background: var(--surface); border: 1.5px solid color-mix(in srgb, var(--accent) 70%, transparent); color: var(--accent-ink); border-radius: 999px; box-shadow: 0 6px 14px -8px color-mix(in srgb, var(--deep) 70%, transparent); }
        .story-marker b { font-size: 10px; font-weight: 800; letter-spacing: .02em; }
        .story-card { position: relative; padding: 14px 16px 16px; border-radius: 14px; background: var(--surface); border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent); box-shadow: 0 14px 30px -26px color-mix(in srgb, var(--deep) 80%, transparent); }
        .story-year { display: block; font-size: 10px; font-weight: 800; letter-spacing: .18em; text-transform: uppercase; color: var(--accent-ink); }

        /* Bento gallery: 1 arch hero + 2x2 */
        .bento-hero { position: relative; }
        .bento-hero button { display: block; width: 100%; overflow: hidden; border-radius: 160px 160px 12px 12px; border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent); }
        .bento-hero img { width: 100%; height: 240px; object-fit: cover; display: block; }
        .bento-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 8px; }
        .bento-grid button { overflow: hidden; border-radius: 12px; border: 1px solid color-mix(in srgb, var(--accent) 42%, transparent); }
        .bento-grid img { width: 100%; aspect-ratio: 1/1; object-fit: cover; display: block; }

        /* Gate hint */
        .gate-hint { position: fixed; left: 50%; bottom: 96px; transform: translateX(-50%); z-index: 55; display: none; flex-direction: column; align-items: center; gap: 5px; padding: 11px 18px; border-radius: 14px; pointer-events: none; text-align: center; background: color-mix(in srgb, var(--deep) 90%, transparent); border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent); backdrop-filter: blur(8px); box-shadow: 0 16px 34px -22px rgba(0,0,0,.7); }
        .gate-hint.is-on { display: flex; }
        .gate-hint span.gate-hint-label { font-size: 10px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2); }
        .gate-hint .chev { color: var(--accent-2); font-size: 18px; line-height: 1; animation: chev 1.4s ease-in-out infinite; }
        @keyframes chev { 0%, 100% { transform: translateY(0); opacity: .65; } 50% { transform: translateY(4px); opacity: 1; } }
        .gate-hint button { pointer-events: auto; margin-top: 3px; font-size: 10px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2); border-bottom: 1px solid color-mix(in srgb, var(--accent-2) 55%, transparent); padding-bottom: 1px; }

        /* HUD dock */
        .dock-bar { display: flex; align-items: center; justify-content: space-around; padding: 6px 4px; border-radius: 18px; background: color-mix(in srgb, var(--surface) 88%, transparent); backdrop-filter: blur(16px) saturate(120%); border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent); box-shadow: 0 18px 44px -24px rgba(0,0,0,.6); }
        .dock-link { position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 2px; min-width: 52px; min-height: 44px; padding: 6px 6px; color: color-mix(in srgb, var(--soft) 88%, transparent); transition: color .2s ease, transform .2s ease; }
        .dock-link:active { transform: scale(.94); }
        .dock-link .dock-label { font-size: 8.5px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        .dock-link::after { content: ""; position: absolute; left: 50%; bottom: 3px; width: 16px; height: 2px; transform: translateX(-50%) scaleX(0); background: var(--accent); transition: transform .25s ease; }
        .dock-link.is-active { color: var(--accent-ink); }
        .dock-link.is-active::after { transform: translateX(-50%) scaleX(1); }

        /* Confetti canvas (birthday) */
        #confetti-canvas { position: fixed; inset: 0; z-index: 45; pointer-events: none; }

        /* Balloons (birthday) */
        .balloon-field { position: fixed; inset: 0; pointer-events: none; z-index: 25; overflow: hidden; }
        .balloon { position: absolute; bottom: -24vh; border-radius: 50% 50% 50% 50% / 46% 46% 54% 54%; opacity: 0; animation: balloonUp linear infinite; }
        @keyframes balloonUp { 0% { transform: translateY(0) rotate(-3deg); opacity: 0; } 8% { opacity: .8; } 100% { transform: translateY(-130vh) rotate(6deg); opacity: 0; } }

        /* Envelope (corporate) */
        #envelope-stage { position: fixed; inset: 0; z-index: 35; pointer-events: none; perspective: 1200px; }
        .env-flap { position: absolute; left: 0; right: 0; top: 0; height: 50vh; transform-origin: top center; transition: transform .9s cubic-bezier(.16,1,.3,1); background: var(--deep); clip-path: polygon(0 0, 100% 0, 50% 100%); border-bottom: 2px solid #c9a050; }
        .env-flap.open { transform: rotateX(180deg); }
        .env-pocket { position: absolute; left: 0; right: 0; bottom: 0; height: 55vh; transition: transform .9s cubic-bezier(.16,1,.3,1); background: linear-gradient(168deg, var(--deep), color-mix(in srgb, var(--deep) 72%, var(--bg))); border-top: 2.5px solid #c9a050; }
        .env-pocket.open { transform: translate3d(0, 86%, 0); }
        #envelope-stage.env-hidden { display: none; }

        @media (prefers-reduced-motion: reduce) {
            .reveal.is-visible, .pulse-cta, .sway, .foil-line, .shimmer-btn::after, .gate-hint .chev, .balloon { animation: none !important; }
        }
    </style>
</head>
<body class="canvas-texture culture-{{ $tj['culture'] }} gate-{{ $tj['gate'] }}"
      style="--bg: {{ $tj['c']['bg'] }}; --surface: {{ $tj['c']['surface'] }}; --ink: {{ $tj['c']['ink'] }}; --soft: {{ $tj['c']['soft'] }}; --accent: {{ $tj['c']['accent'] }}; --accent-2: {{ $tj['c']['accent2'] }}; --deep: {{ $tj['c']['deep'] }}; --on-accent: {{ $tj['c']['onAccent'] ?? '#FFF8EE' }};">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo ?? null, $tj['cover']);
        $hostImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo ?? null, 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&q=80');
        $musicRaw = (string) ($couple->music_url ?? '');
        $audioUrl = $musicRaw === ''
            ? asset('audio/wedding-melody.wav')
            : (str_starts_with($musicRaw, 'http')
                ? $musicRaw
                : (str_starts_with($musicRaw, 'storage/') ? asset($musicRaw) : asset('audio/' . ltrim($musicRaw, '/'))));

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $dateLong = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');

        $hostName = $couple->groom_name ?? 'Nama';
        $hostFullname = $couple->groom_fullname ?? $hostName;
        $hostParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? '');

        $events = ($couple->events ?? collect());
        $firstEvent = $events->first();
        $venueName = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Lokasi Acara');
        $venueAddress = $firstEvent->address ?? ($couple->venue_address ?? 'Alamat acara akan diinformasikan lebih lanjut');
        // Tautan per acara menang atas tautan tingkat pasangan; placeholder "https://maps.google.com" diabaikan.
        $mapsRaw = '';
        foreach ([($firstEvent->maps_url ?? null), ($couple->maps_url ?? null)] as $mapsCandidate) {
            $mapsCandidate = trim((string) $mapsCandidate);
            if ($mapsCandidate === '' || in_array($mapsCandidate, ['https://maps.google.com', 'http://maps.google.com', 'https://www.google.com/maps'], true)) {
                continue;
            }
            $mapsRaw = $mapsCandidate;
            break;
        }
        $mapsUrl = \App\Services\TemplateManager::mapDirectionsUrl($mapsRaw, trim(($venueName ?? '') . ' ' . ($venueAddress ?? '')));

        $galleryItems = ($couple->galleries ?? collect());
        if ($galleryItems->isEmpty()) {
            $galleryItems = collect([
                (object) ['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=900&q=80'],
                (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80'],
                (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=900&q=80'],
                (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=900&q=80'],
                (object) ['image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=900&q=80'],
            ]);
        }
        $shot = fn ($item) => \App\Services\TemplateManager::resolvePhotoUrl($item->image ?? '', 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=900&q=80');
        $heroShot = $galleryItems->first();
        $bentoShots = $galleryItems->slice(1, 4)->values();

        $cat = $tj['culture'];
        $ageBadge = $couple->age_badge ?? '';
        $eventHeading = $couple->event_heading ?? 'UNDANGAN ACARA';
        $coverSubtitle = $couple->cover_subtitle ?? '';
        $quote = $couple->quote ?? '';
        $rundown = $couple->rundown ?? [];
        $initials = strtoupper(substr($hostName, 0, 1));
    @endphp

    <audio id="invitationAudio" loop preload="none" src="{{ $audioUrl }}"></audio>
    <div class="page-photo" aria-hidden="true" style="background-image:url('{{ $coverImg }}');"></div>

    {{-- ============ GATE (birthday V-angle / straight / corporate envelope) ============ --}}
    @if($cat !== 'corporate')
        <div id="gateLayer" class="gate-hidden {{ $tj['gate'] === 'straight' ? 'gate-straight' : '' }}">
            <div id="gateVeil" aria-hidden="true"></div>
            <div class="gate-wing gate-wing-left" id="gateWingLeft">
                @include('templates.partials.event-gate', ['tj' => $tj, 'side' => 'left'])
            </div>
            <div class="gate-wing gate-wing-right" id="gateWingRight">
                @include('templates.partials.event-gate', ['tj' => $tj, 'side' => 'right'])
            </div>
        </div>
    @endif

    @if($cat === 'birthday')
        <canvas id="confetti-canvas" aria-hidden="true"></canvas>
        <div class="balloon-field" aria-hidden="true">
            @foreach(range(1, 6) as $b)
                <span class="balloon" style="left: {{ 6 + $b * 14 }}%; width: {{ 34 + ($b % 3) * 10 }}px; height: {{ 44 + ($b % 3) * 12 }}px; background: radial-gradient(circle at 34% 28%, color-mix(in srgb, var(--accent-2) 60%, #fff), var(--accent)); animation-duration: {{ 9 + ($b % 4) * 2.5 }}s; animation-delay: -{{ $b * 1.7 }}s;"></span>
            @endforeach
        </div>
    @endif

    @if($cat === 'corporate')
        <div id="envelope-stage" class="env-hidden">
            <div class="env-flap" id="envFlap"></div>
            <div class="env-pocket" id="envPocket"></div>
        </div>
    @endif

    {{-- ============ Z-40 COVER ============ --}}
    <div id="coverScreen" class="fixed inset-0 z-40 flex items-center justify-center px-4 pt-5 pb-24 transition-all duration-700">
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ $coverImg }}'); opacity:.35;"></div>
        <div class="absolute inset-0" style="background:linear-gradient(180deg, color-mix(in srgb, var(--bg) 62%, transparent), color-mix(in srgb, var(--bg) 95%, transparent));"></div>

        <div class="relative w-full max-w-[400px]">
            <div class="cover-card relative w-full px-5 py-6 text-center max-h-[calc(100dvh-10rem)] overflow-y-auto cover-scroll">
                <div class="sway mx-auto mb-3 flex items-center justify-center rounded-t-full" style="width:64px;height:80px;background:linear-gradient(180deg, var(--accent), var(--deep));box-shadow:0 10px 26px color-mix(in srgb, var(--deep) 40%, transparent);">
                    @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-10 h-9'])
                </div>

                <span class="label" style="color:var(--accent-ink);">{{ $eventHeading }}</span>
                @if($coverSubtitle !== '')
                    <p class="text-[13px] mt-2 mx-auto" style="color:var(--soft);max-width:16rem;">{{ $coverSubtitle }}</p>
                @endif
                <h1 class="serif italic text-[clamp(1.65rem,4.8dvh,2.15rem)] leading-tight mt-2" style="color:var(--ink);">{{ $hostFullname }}</h1>
                @if($ageBadge !== '')
                    <span class="pill mt-2" style="font-size:12px;">{{ $ageBadge }}</span>
                @endif
                <p class="text-[13px] mt-1.5" style="color:var(--soft);">{{ $dateLong }}</p>

                <div class="hero-{{ $tj['hero'] }} mx-auto mt-3 w-[clamp(96px,19dvh,138px)] h-[clamp(108px,22dvh,168px)]" style="border:1px solid color-mix(in srgb, var(--accent) 55%, transparent);">
                    <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Potret {{ $hostName }}" class="w-full h-full object-cover">
                </div>

                <div class="mt-3 px-4 py-2.5 rounded-xl text-center" style="background:color-mix(in srgb, var(--surface) 16%, transparent);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);border:1px solid color-mix(in srgb, var(--accent) 26%, transparent);">
                    <span class="label block" style="color:var(--soft);">Kepada Yth.</span>
                    <b id="gate-guest-name" class="serif text-base block mt-1" style="color:var(--ink);">{{ $guest->name ?? 'Bapak/Ibu/Saudara/i' }}</b>
                    <span class="text-[11.5px] mt-0.5 block" style="color:color-mix(in srgb, var(--soft) 88%, var(--ink));">Tamu Kehormatan</span>
                </div>

                <button type="button" onclick="openInvitation()"
                        class="pulse-cta mt-4 w-full min-h-[48px] py-3.5 px-6 rounded-full text-[11px] font-bold uppercase tracking-[0.18em] flex items-center justify-center gap-2"
                        style="background:var(--accent);border:1px solid color-mix(in srgb, var(--deep) 22%, transparent);color:var(--on-accent);box-shadow:0 10px 24px color-mix(in srgb, var(--accent) 34%, transparent);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" style="width:18px;height:18px;"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>
                    <span>{{ $cat === 'corporate' ? 'Buka Amplop Undangan' : 'Buka Undangan' }}</span>
                </button>
                <p class="text-[11px] mt-2" style="color:var(--soft);">{{ $cat === 'corporate' ? 'Gulir layar untuk menelaah amanat undangan' : 'Geser ke bawah untuk membuka undangan' }}</p>
            </div>
            @if(!empty($isDemo))
                <span class="block mt-2 px-3 py-1.5 text-[9px] font-bold uppercase leading-relaxed" style="letter-spacing:.08em;overflow-wrap:anywhere;background:color-mix(in srgb, var(--accent) 18%, var(--bg));color:var(--accent-ink);border-radius:12px;">
                    Mode Demo • {{ $tj['name'] }}{{ strcasecmp(trim((string) $tj['name']), trim((string) $tj['palette'])) !== 0 ? ' (' . $tj['palette'] . ')' : '' }} — {{ $eventHeading }}{{ strcasecmp(trim((string) $eventHeading), trim((string) $tj['sub'])) !== 0 ? ' ' . $tj['sub'] : '' }}
                </span>
            @endif
        </div>
    </div>

    {{-- ============ Z-10 INVITATION ============ --}}
    <main class="relative z-10 max-w-[430px] mx-auto pb-32">

        @php
            $ico = [
                'cal' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 11h18"/></svg>',
                'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>',
                'pin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/></svg>',
                'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:20px;height:20px"><circle cx="12" cy="12" r="9"/><path d="M8 12.5l2.6 2.6L16 9.6"/></svg>',
                'spark' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.6 2.6M15.4 15.4L18 18M18 6l-2.6 2.6M8.6 15.4L6 18"/></svg>',
                'compass' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2 5-5 2 2-5z"/></svg>',
                'star' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><path d="M12 3l2.7 5.6 6.3.9-4.5 4.4 1 6.2L12 17.3 6.5 20l1-6.2L3 9.5l6.3-.9z"/></svg>',
                'gift' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><rect x="3" y="8" width="18" height="4"/><path d="M5 12v8h14v-8M12 8v12M12 8s-4.5-4.5-6-2 1 5 6 2zM12 8s4.5-4.5 6-2-1 5-6 2z"/></svg>',
                'cap' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><path d="M12 4L2 9l10 5 10-5zM6 11v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5"/></svg>',
            ];
        @endphp

        {{-- 2. Salam / Quotes --}}
        <section id="salam" class="px-5 pt-10 pb-4 text-center reveal">
            <div class="sway w-fit mx-auto">
                @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-10 h-9'])
            </div>
            @if(in_array($cat, ['aqiqah', 'religious'], true))
                <p class="mt-4" style="font-family:'Amiri', serif;font-size:1.6rem;line-height:2;color:var(--ink);direction:rtl;">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
                <p class="text-[11px] mt-1" style="color:var(--soft);letter-spacing:.08em;">Bismillahirrahmanirrahim</p>
            @endif
            <p class="serif text-[1.3rem] mt-3" style="color:var(--ink);">Assalamu&rsquo;alaikum Warahmatullahi Wabarakatuh</p>
            <p class="text-[15px] leading-relaxed mt-3" style="color:var(--soft);">
                {{ $cat === 'birthday' ? 'Dengan penuh suka cita, kami mengundang Bapak/Ibu/Saudara/i untuk hadir merayakan hari istimewa ini bersama kami.'
                    : ($cat === 'graduate' ? 'Puji syukur ke hadirat Tuhan Yang Maha Esa atas terselesaikannya studi dengan penuh berkah. Kami mengundang Bapak/Ibu/Saudara/i untuk berbagi kebahagiaan.'
                    : ($cat === 'corporate' ? 'Dengan hormat, kami mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara yang akan kami selenggarakan.'
                    : 'Dengan memohon rahmat dan karunia Tuhan Yang Maha Esa, kami mengundang Bapak/Ibu/Saudara/i untuk hadir memberikan doa restu.')) }}
            </p>

            <div class="scard mt-6 px-5 py-6">
                <div class="mx-auto mb-3" style="color:var(--accent-ink);">{!! $ico['spark'] !!}</div>
                <p class="serif italic text-[17px] leading-relaxed" style="color:var(--ink);">&ldquo;{{ $quote !== '' ? $quote : 'Semoga Tuhan senantiasa melimpahkan berkah, rahmat, dan kebahagiaan bagi kita semua.' }}&rdquo;</p>
                <span class="label mt-3 block" style="color:var(--accent-ink);">{{ $tj['motif'] }}</span>
            </div>
        </section>

        {{-- 2b. Blok khusus ACARA FORMAL (mengikuti desain Stitch: profil institusi → pembicara → pilar → VIP pass → rundown) --}}
        @if($cat === 'corporate')
        @php
            $corpOrg    = $couple->organizer_name ?? $hostName;
            $corpTag    = $couple->organizer_tag ?? 'Lembaga & Penyelenggara Resmi';
            $corpAbout  = $couple->organizer_about ?? 'Institusi penyelenggara forum eksekutif yang mempertemukan pemimpin, pengambil kebijakan, dan praktisi untuk membahas arah strategis organisasi.';
            $corpNumber = $couple->letter_number ?? '104/DK-SUMMIT/2025';
            $corpSeat   = $couple->seat_code ?? 'A-012';
            $corpSpeakers = $couple->speakers ?? [
                ['role' => 'Keynote Speaker I',  'name' => 'Dr. Aris Prasetyo, M.M.',   'title' => 'Komisaris Utama Lembaga Kebijakan Riset', 'topic' => 'Transformasi Model Bisnis Berkelanjutan 2030'],
                ['role' => 'Keynote Speaker II', 'name' => 'Maya Anggraini, B.Eng',    'title' => 'Direktur Operasional Global Tech Horizons', 'topic' => 'Orkestrasi AI & Produktivitas Budaya Kerja'],
                ['role' => 'Moderator Sesi Panel', 'name' => 'Hendra Wardhana, S.Sos., M.P.A.', 'title' => 'Sesi Tanya Jawab Interaktif', 'topic' => 'Diskusi meja bundar & perumusan rekomendasi'],
            ];
            $corpPillars = [
                ['icon' => '🤝', 'title' => 'Networking Eksklusif', 'desc' => 'Akses lounge C-Level & jejaring bilateral lintas industri.'],
                ['icon' => '🏅', 'title' => 'Sertifikat VIP',       'desc' => 'Penghargaan fisik berlapis foil emas dengan verifikasi digital.'],
                ['icon' => '🍽️', 'title' => 'Jamuan Eksekutif',     'desc' => 'Fine-dining prasmanan kurasi hotel bintang lima.'],
                ['icon' => '📚', 'title' => 'Privilege Materi',     'desc' => 'Buku putih riset tahunan dan arsip rekaman resolusi.'],
            ];
            $corpRundown = !empty($rundown) ? $rundown : [
                ['time' => '08.30 – 09.00 WIB', 'title' => 'Registrasi & Morning Coffee Reception', 'note' => 'Pemeriksaan QR Pass, pembagian souvenir eksklusif, & welcome drink.'],
                ['time' => '09.00 – 09.30 WIB', 'title' => 'Upacara Pembukaan', 'note' => 'Menyanyikan Indonesia Raya dan sambutan pembuka.'],
                ['time' => '09.30 – 11.30 WIB', 'title' => 'Keynote Session', 'note' => 'Pemaparan pembicara utama mengenai resiliensi strategi organisasi.'],
                ['time' => '11.30 – 12.30 WIB', 'title' => 'Q&A Panel & Diskusi Meja Bundar', 'note' => 'Dialog langsung bersama moderator dan perumusan butir rekomendasi.'],
                ['time' => '12.30 – Selesai',   'title' => 'Executive Lunch & Networking', 'note' => 'Santap siang, penyerahan cinderamata, dan foto bersama delegasi.'],
            ];
        @endphp

        {{-- Profil institusi penyelenggara --}}
        <section id="profil" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">Profil Institusi</span>
                <span class="block text-[10px] mt-1 tracking-[0.18em] uppercase" style="color:var(--soft);">{{ $corpTag }}</span>
                <h2 class="serif text-[1.7rem] mt-1.5" style="color:var(--ink);">{{ $corpOrg }}</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div class="scard mt-5 px-5 py-6">
                <p class="text-[14.5px] leading-relaxed text-center" style="color:var(--soft);">{{ $corpAbout }}</p>
                <div class="grid grid-cols-3 gap-2 mt-5">
                    @foreach([['14+','Tahun Dedikasi'],['500+','Mitra Korporasi'],['98%','Indeks Kepuasan']] as [$num, $lbl])
                        <div class="rounded-xl px-2 py-3 text-center" style="background:color-mix(in srgb, var(--accent) 8%, transparent);border:1px solid color-mix(in srgb, var(--accent) 22%, transparent);">
                            <b class="serif block text-[1.15rem] leading-none" style="color:var(--accent-ink);">{{ $num }}</b>
                            <span class="block text-[9px] mt-1.5 uppercase tracking-[0.1em]" style="color:var(--soft);">{{ $lbl }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Sorotan utama: para pembicara --}}
        <section id="sorotan" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">Sorotan Utama</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">Para Pembicara Kehormatan</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div class="mt-5 space-y-3">
                @foreach($corpSpeakers as $spk)
                    @php $isModerator = str_contains(strtolower((string) ($spk['role'] ?? '')), 'moderator'); @endphp
                    <div class="scard px-5 py-4" style="{{ $isModerator ? 'border-left:3px solid color-mix(in srgb, var(--accent) 60%, transparent);' : '' }}">
                        <div class="flex items-start gap-3">
                            <span class="shrink-0 grid place-items-center rounded-full" style="width:42px;height:42px;background:color-mix(in srgb, var(--accent) 12%, transparent);border:1px solid color-mix(in srgb, var(--accent) 32%, transparent);color:var(--accent-ink);font-weight:800;font-size:15px;">
                                {{ strtoupper(substr($spk['name'] ?? 'S', 0, 1)) }}
                            </span>
                            <div class="min-w-0">
                                <span class="label block" style="color:var(--accent-ink);font-size:9px;">{{ $spk['role'] ?? 'Pembicara' }}</span>
                                <b class="serif block text-[1.05rem] mt-0.5" style="color:var(--ink);">{{ $spk['name'] ?? '' }}</b>
                                <span class="block text-[12px] mt-0.5" style="color:var(--soft);">{{ $spk['title'] ?? '' }}</span>
                                @if(!empty($spk['topic']))
                                    <p class="text-[12px] mt-1.5 leading-relaxed" style="color:var(--soft);">Topik: {{ $spk['topic'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 4 pilar keistimewaan --}}
        <section id="pilar" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">Fasilitas &amp; Hak Istimewa</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">4 Pilar Keistimewaan Delegasi</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div class="grid grid-cols-2 gap-3 mt-5">
                @foreach($corpPillars as $pil)
                    <div class="scard px-4 py-4">
                        <span class="text-[1.1rem]">{{ $pil['icon'] }}</span>
                        <b class="serif block text-[0.98rem] mt-1.5" style="color:var(--ink);">{{ $pil['title'] }}</b>
                        <p class="text-[11.5px] mt-1 leading-relaxed" style="color:var(--soft);">{{ $pil['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- VIP ticket passport --}}
        <section id="tiket" class="px-5 py-8 reveal">
            <div class="rounded-2xl px-5 py-5" style="background:var(--deep);border:1px solid color-mix(in srgb, var(--accent-2) 45%, transparent);">
                <div class="flex items-center justify-between">
                    <span class="label" style="color:var(--accent-2);">VIP Ticket Passport</span>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full" style="background:rgba(255,255,255,.14);color:#fff;">SEAT: {{ $corpSeat }}</span>
                </div>
                <p class="serif text-[1.2rem] mt-3" style="color:#fff;">{{ $eventHeading }}</p>
                <div class="grid grid-cols-1 gap-2 mt-3 text-[12.5px]" style="color:rgba(255,255,255,.86);">
                    <div><span class="label" style="color:var(--accent-2);font-size:9px;">Tanggal</span><br>{{ $dateLong }}</div>
                    <div><span class="label" style="color:var(--accent-2);font-size:9px;">Waktu</span><br>{{ $firstEvent->time ?? '08.30 WIB – Selesai' }}</div>
                    <div><span class="label" style="color:var(--accent-2);font-size:9px;">Lokasi</span><br>{{ $venueName }}</div>
                </div>
                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($eventHeading) }}&dates={{ urlencode(($isoStart ?? now()->addDays(30))->format('Ymd\THis\Z') . '/' . ($isoStart ?? now()->addDays(30))->copy()->addHours(4)->format('Ymd\THis\Z')) }}&location={{ urlencode($venueName . ' ' . ($couple->venue_address ?? '')) }}"
                   target="_blank" rel="noopener"
                   class="block mt-4 text-center min-h-[42px] leading-[42px] rounded-lg text-[10.5px] font-bold uppercase tracking-[0.14em]"
                   style="background:rgba(255,255,255,.14);color:#fff;border:1px solid rgba(255,255,255,.3);text-decoration:none;">
                    + Simpan ke Kalender
                </a>
            </div>
        </section>

        {{-- Rundown resmi --}}
        <section id="rundown" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">Rundown Resmi</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">Jadwal Agenda Sidang</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div class="mt-5 space-y-3">
                @foreach($corpRundown as $i => $rd)
                    <div class="flex gap-3">
                        <span class="shrink-0 grid place-items-center rounded-full text-[11px] font-extrabold" style="width:30px;height:30px;background:var(--surface);border:1.5px solid color-mix(in srgb, var(--accent) 55%, transparent);color:var(--accent-ink);">{{ $i + 1 }}</span>
                        <div class="scard flex-1 px-4 py-3">
                            <span class="label block" style="color:var(--accent-ink);font-size:9px;">{{ is_array($rd) ? ($rd['time'] ?? '') : '' }}</span>
                            <b class="serif block text-[1rem] mt-0.5" style="color:var(--ink);">{{ is_array($rd) ? ($rd['title'] ?? '') : $rd }}</b>
                            @if(is_array($rd) && !empty($rd['note']))
                                <p class="text-[12px] mt-1 leading-relaxed" style="color:var(--soft);">{{ $rd['note'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        {{-- 3. Countdown --}}
        <section id="hitung" class="px-5 py-6 reveal">
            <div class="rounded-2xl px-5 py-6 text-center" style="background:var(--deep);border-top:2px solid color-mix(in srgb, var(--accent-2) 65%, transparent);box-shadow:0 14px 34px color-mix(in srgb, var(--deep) 32%, transparent);">
                <span class="label" style="color:var(--accent-2);">{{ $cat === 'birthday' ? 'Menghitung Hari Bahagia' : 'Menuju Hari Acara' }}</span>
                <h3 class="serif text-[1.05rem] mt-1.5 mb-4" style="color:rgba(255,255,255,.92);">{{ $dateLong }}</h3>
                <div class="grid grid-cols-4 gap-1.5">
                    @foreach([['cdDays', 'Hari'], ['cdHours', 'Jam'], ['cdMinutes', 'Menit'], ['cdSeconds', 'Detik']] as [$id, $lbl])
                        <div class="rounded-lg px-1 py-2.5" style="background:rgba(255,255,255,.10);min-width:0;">
                            <span id="{{ $id }}" class="serif block leading-none num" style="color:#fff;font-size:clamp(1.1rem,5.4vw,1.7rem);font-variant-numeric:tabular-nums;letter-spacing:-.01em;">00</span>
                            <span class="label mt-1.5 block" style="color:rgba(255,255,255,.82);font-size:.58rem;letter-spacing:.1em;">{{ $lbl }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if($cat !== 'corporate')
        {{-- 4. Profil (per category) --}}
        <section id="profil" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">{{ $cat === 'birthday' ? 'Sang Bintang Perayaan' : ($cat === 'graduate' ? 'Sang Wisudawan' : ($cat === 'corporate' ? 'Profil Penyelenggara' : 'Buah Hati Tercinta')) }}</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">{{ $cat === 'birthday' ? 'Yang Berbahagia' : ($cat === 'graduate' ? 'Profil Wisudawan' : ($cat === 'corporate' ? 'Tuan Rumah' : 'Profil')) }}</h2>
                <p class="text-[14px] mt-2 mx-auto" style="color:var(--soft);max-width:19rem;">{{ $hostParents }}</p>
            </div>

            <div class="scard mt-5 px-5 py-6 text-center">
                <div class="hero-{{ $tj['hero'] }} mx-auto w-[132px] h-[168px]" style="border:1px solid color-mix(in srgb, var(--accent) 45%, transparent);">
                    <img id="previewGroomPhotoImg" src="{{ $hostImg }}" alt="{{ $hostFullname }}" class="w-full h-full object-cover">
                </div>
                <span class="label block mt-4" style="color:var(--accent-ink);">{{ $hostParents !== '' ? 'Nama Lengkap' : '' }}</span>
                <h3 class="serif text-[1.3rem] mt-1" style="color:var(--ink);">{{ $hostFullname }}</h3>

                @if($cat === 'birthday' && $ageBadge !== '')
                    <div class="mt-4 inline-flex items-center justify-center rounded-full" style="width:92px;height:92px;background:radial-gradient(circle at 50% 30%, color-mix(in srgb, var(--accent) 40%, var(--deep)), var(--deep));border:2px solid color-mix(in srgb, var(--accent) 70%, transparent);box-shadow:0 16px 36px -8px color-mix(in srgb, var(--accent) 45%, transparent);">
                        <div class="text-center"><span class="num block text-[1.6rem] leading-none" style="color:var(--accent-2);">{{ $couple->age_number ?? '' }}</span><span class="label block mt-1" style="color:var(--accent-2);font-size:.55rem;">{{ $ageBadge }}</span></div>
                    </div>
                @endif

                @if($cat === 'aqiqah' && !empty($couple->birth_stats))
                    <div class="grid grid-cols-2 gap-2 mt-4">
                        @foreach($couple->birth_stats as $bs)
                            <div class="rounded-lg px-3 py-2.5" style="background:color-mix(in srgb, var(--accent) 10%, var(--surface));border:1px solid color-mix(in srgb, var(--accent) 28%, transparent);">
                                <span class="label block" style="color:var(--accent-ink);font-size:.55rem;">{{ $bs['label'] }}</span>
                                <b class="serif text-[1.05rem] block mt-0.5" style="color:var(--ink);">{{ $bs['value'] }}</b>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($cat === 'graduate' && !empty($couple->credentials))
                    <div class="grid grid-cols-2 gap-2 mt-4">
                        @foreach($couple->credentials as $cr)
                            <div class="rounded-lg px-3 py-2.5" style="background:color-mix(in srgb, var(--accent) 10%, var(--surface));border:1px solid color-mix(in srgb, var(--accent) 28%, transparent);">
                                <span class="label block" style="color:var(--accent-ink);font-size:.55rem;">{{ $cr['label'] }}</span>
                                <b class="serif text-[.95rem] block mt-0.5" style="color:var(--ink);">{{ $cr['value'] }}</b>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            @if($cat === 'aqiqah' && $tj['kind'] === 'tasmiyah' && !empty($couple->makna_nama))
                <div class="scard mt-4 px-5 py-5 text-center">
                    <span class="label block" style="color:var(--accent-ink);">Makna Nama</span>
                    <h3 class="serif text-[1.3rem] mt-1" style="color:var(--ink);">{{ $hostName }}</h3>
                    <p class="text-[14.5px] leading-relaxed mt-2" style="color:var(--soft);">{{ $couple->makna_nama }}</p>
                </div>
            @endif
        </section>

        {{-- 5. Spotlight / Rundown / Journey (per category) --}}
        @if($cat === 'corporate' && !empty($couple->spotlight))
            <section id="sorotan" class="px-5 py-8 reveal">
                <div class="text-center mb-5">
                    <span class="label block" style="color:var(--accent-ink);">Sorotan Utama</span>
                    <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">SOROTAN</h2>
                </div>
                <div class="scard px-5 py-5 text-center">
                    <div class="mx-auto mb-3" style="color:var(--accent-ink);">{!! $ico['star'] !!}</div>
                    <h3 class="serif text-[1.2rem]" style="color:var(--ink);">{{ $couple->spotlight }}</h3>
                    @if(!empty($couple->pillars))
                        <div class="grid grid-cols-2 gap-2 mt-4 text-left">
                            @foreach($couple->pillars as $pl)
                                <div class="rounded-lg px-3 py-3" style="background:color-mix(in srgb, var(--accent) 8%, var(--surface));border:1px solid color-mix(in srgb, var(--accent) 24%, transparent);">
                                    <b class="serif text-[1rem] block" style="color:var(--ink);">{{ $pl['title'] }}</b>
                                    <span class="text-[12.5px] block mt-1" style="color:var(--soft);">{{ $pl['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        @endif

        @if(!empty($rundown))
            <section id="rundown" class="px-5 py-8 reveal">
                <div class="text-center mb-5">
                    <span class="label block" style="color:var(--accent-ink);">{{ $cat === 'graduate' ? 'Perjalanan Akademik' : 'Susunan Acara' }}</span>
                    <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">{{ $cat === 'graduate' ? 'Perjalanan' : 'Rundown' }}</h2>
                </div>
                <div class="story-timeline">
                    @foreach($rundown as $i => $r)
                        <article class="story-item">
                            <span class="story-marker"><b>{{ sprintf('%02d', $i + 1) }}</b></span>
                            <div class="story-card">
                                <span class="story-year">{{ $r['time'] ?? '' }}</span>
                                <h3 class="serif text-[1.12rem] mt-1" style="color:var(--ink);">{{ $r['title'] }}</h3>
                                <p class="text-[13.5px] leading-relaxed mt-1.5" style="color:var(--soft);">{{ $r['text'] ?? '' }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- 6. Rangkaian Acara (ticket) --}}
        <section id="acara" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">Susunan Acara</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">{{ $cat === 'graduate' ? 'Jadwal Wisuda' : ($cat === 'birthday' ? 'Jadwal Pesta' : 'Rangkaian Acara') }}</h2>
            </div>
            <div class="space-y-4">
                @php
                    $eventList = $events->count() ? $events : collect([
                        (object) ['title' => 'Acara Utama', 'date' => null, 'start_time' => '09.00', 'end_time' => '12.00', 'venue_name' => null, 'address' => null],
                    ]);
                @endphp
                @foreach($eventList as $ev)
                    @php
                        $evStart = trim(str_replace('WIB', '', $ev->start_time ?? '09.00'));
                        $evEnd = trim(str_replace('WIB', '', $ev->end_time ?? 'Selesai'));
                        $evDate = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $dateLong;
                    @endphp
                    <article class="scard card-ticket px-5 py-5">
                        <div class="flex items-start justify-between gap-2 flex-wrap">
                            <div class="flex items-center gap-2">
                                <span style="color:var(--accent-ink);display:inline-flex;">{!! $loop->first ? $ico['star'] : $ico['spark'] !!}</span>
                                <h3 class="serif text-[1.15rem]" style="color:var(--ink);">{{ $ev->title ?? 'Acara' }}</h3>
                            </div>
                            <span class="shrink-0 px-2.5 py-1 rounded-full text-[9px] font-bold uppercase tracking-wider" style="background:var(--deep);color:var(--surface);">{{ $loop->first ? 'Acara Utama' : 'Rangkaian' }}</span>
                        </div>
                        <div class="mt-3 space-y-1.5">
                            <div class="flex items-center gap-2 text-[14px]"><span style="color:var(--accent-ink);display:inline-flex;">{!! $ico['cal'] !!}</span><b style="color:var(--ink);">{{ $evDate }}</b></div>
                            <div class="flex items-center gap-2 text-[14px]" style="color:var(--soft);"><span style="color:var(--accent-ink);display:inline-flex;">{!! $ico['clock'] !!}</span><span>Pukul {{ $evStart }} &ndash; {{ $evEnd }} WIB</span></div>
                            <div class="flex items-start gap-2 text-[14px]" style="color:var(--soft);"><span style="color:var(--accent-ink);display:inline-flex;margin-top:2px;">{!! $ico['pin'] !!}</span><span>{{ $ev->venue_name ?? $venueName }}</span></div>
                        </div>
                        <a href="{{ 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=' . urlencode($ev->title ?? 'Acara') . '&dates=' . $targetDate->format('Ymd\\THis') . '/' . $targetDate->copy()->addHours(4)->format('Ymd\\THis') . '&location=' . urlencode($ev->venue_name ?? $venueName) }}" target="_blank" rel="noopener"
                           class="mt-4 w-full min-h-[44px] rounded-lg flex items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-wider"
                           style="background:color-mix(in srgb, var(--ink) 14%, var(--surface));color:var(--ink);border:1px solid color-mix(in srgb, var(--accent) 34%, transparent);">
                            <span style="display:inline-flex;">{!! $ico['cal'] !!}</span> Simpan ke Kalender
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

        @endif

        {{-- 7. Peta --}}
        <section id="lokasi" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">{{ $cat === 'corporate' ? 'Lokasi & Protokol' : 'Petunjuk Arah' }}</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">{{ $cat === 'corporate' ? 'Panduan Kedatangan Tamu' : 'Lokasi Acara' }}</h2>
            </div>
            <div class="scard overflow-hidden">
                @php
                    $mapQuery = trim(($venueName ?? '') . ' ' . ($venueAddress ?? ''));
                    $mapEmbed = \App\Services\TemplateManager::mapEmbedUrl($mapsRaw ?? null, $mapQuery);
                @endphp
                <div class="relative w-full h-44 overflow-hidden" style="background:color-mix(in srgb, var(--deep) 10%, var(--bg));">
                    <iframe src="{{ $mapEmbed }}" title="Peta lokasi {{ $venueName }}" class="w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                </div>
                <div class="px-5 py-5">
                    <h4 class="serif text-[1.1rem]" style="color:var(--ink);">{{ $venueName }}</h4>
                    <p class="text-[14px] mt-1.5 leading-relaxed" style="color:var(--soft);">{{ $venueAddress }}</p>
                    @if($cat === 'corporate')
                        <div class="flex flex-wrap gap-1.5 mt-3">
                            @foreach(['Smart Casual / Business Formal', 'Valet VIP Parking Gratis', 'QR Check-in Meja Depan'] as $proto)
                                <span class="text-[10px] font-bold uppercase tracking-[0.06em] px-2.5 py-1 rounded-full" style="background:color-mix(in srgb, var(--accent) 12%, transparent);color:var(--accent-ink);border:1px solid color-mix(in srgb, var(--accent) 28%, transparent);">{{ $proto }}</span>
                            @endforeach
                        </div>
                    @endif
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" class="mt-4 w-full min-h-[46px] rounded-lg flex items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-wider" style="background:var(--deep);color:var(--accent-2);">
                        <span style="display:inline-flex;">{!! $ico['compass'] !!}</span> Petunjuk Google Maps
                    </a>
                </div>
            </div>
        </section>

        {{-- 8. Galeri Bento 1+4 --}}
        <section id="galeri" class="px-5 pt-10 pb-6 reveal">
            <div class="text-center mb-5">
                @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-10 h-9 mx-auto'])
                <span class="label block mt-2" style="color:var(--accent-ink);">Dokumentasi</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">Galeri</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div id="previewGalleryGrid">
                @if($heroShot)
                    <div class="bento-hero">
                        <button type="button" onclick="openLightbox('{{ $shot($heroShot) }}')">
                            <img src="{{ $shot($heroShot) }}" alt="Foto utama">
                        </button>
                    </div>
                @endif
                @if($bentoShots->isNotEmpty())
                    <div class="bento-grid">
                        @foreach($bentoShots as $i => $g)
                            <button type="button" onclick="openLightbox('{{ $shot($g) }}')">
                                <img src="{{ $shot($g) }}" alt="Foto {{ $i + 2 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- 9. RSVP --}}
        <section id="rsvp" class="px-5 py-10 reveal">
            <div class="card p-6">
                @include('templates.partials.adat-jawa-corners')
                <div class="text-center mb-5">
                    @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-9 h-8 mx-auto'])
                    <span class="label block mt-2" style="color:var(--accent-ink);">{{ $cat === 'corporate' ? 'Pendaftaran' : 'Presensi' }}</span>
                    <h2 class="serif text-[1.6rem] mt-1" style="color:var(--ink);">{{ $cat === 'corporate' ? 'Registrasi Peserta' : 'Konfirmasi Kehadiran' }}</h2>
                    <div class="sec-rule"><span></span><i></i><span></span></div>
                </div>
                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3">
                    @csrf
                    @if(!empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
                    @if(!empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
                    <input type="hidden" name="category" value="Tamu Undangan">
                    <input type="hidden" name="message" value="Konfirmasi kehadiran melalui formulir RSVP.">
                    @if($cat === 'corporate')
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap Peserta" class="field">
                        <input type="text" name="company" placeholder="Instansi / Perusahaan" class="field">
                        <div class="grid grid-cols-2 gap-2">
                            <input type="text" name="position" placeholder="Jabatan" class="field">
                            <input type="text" name="phone" placeholder="No. WhatsApp" class="field">
                        </div>
                        <label class="cursor-pointer block"><input type="radio" name="attendance" value="hadir" class="peer sr-only" checked><span class="toggle-card"><span class="ic">✓</span><span class="txt">Akan Hadir</span></span></label>
                        <button type="submit" class="shimmer-btn w-full min-h-[48px] py-3.5 text-[11px] font-bold uppercase tracking-[0.18em]" style="background: var(--deep); border:1px solid var(--accent); border-radius:10px; color: var(--accent-2);">Daftar &amp; Ambil Digital Pass</button>
                        <p class="text-[11px] text-center" style="color:var(--soft);">E-Ticket VIP dikirim ke WhatsApp peserta setelah pendaftaran.</p>
                    @else
                        <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap Tamu" class="field">
                        <div class="grid grid-cols-2 gap-2">
                            <label class="cursor-pointer"><input type="radio" name="attendance" value="hadir" class="peer sr-only" checked><span class="toggle-card"><span class="ic">✓</span><span class="txt">Hadir</span></span></label>
                            <label class="cursor-pointer"><input type="radio" name="attendance" value="tidak_hadir" class="peer sr-only"><span class="toggle-card"><span class="ic">✕</span><span class="txt">Berhalangan</span></span></label>
                        </div>
                        <label class="block">
                            <span class="label block mb-1.5" style="color:var(--accent-ink);">Jumlah Orang yang Hadir</span>
                            <input type="number" name="guest_count" id="guestCountInput" class="field" value="1" min="1" max="20" step="1" inputmode="numeric" placeholder="1" autocomplete="off" required style="text-align:center;font-weight:700;">
                        </label>
                        <button type="submit" class="shimmer-btn w-full min-h-[48px] py-3.5 text-[11px] font-bold uppercase tracking-[0.18em]" style="background: var(--deep); border:1px solid var(--accent); border-radius:10px; color: var(--accent-2);">Kirim Konfirmasi RSVP</button>
                    @endif
                </form>
            </div>
        </section>

        {{-- 10. Ucapan & Doa --}}
        @include('templates.partials.guest-pass')

        <section id="ucapan" class="px-5 py-10 reveal">
            <div class="card p-6">
                @include('templates.partials.adat-jawa-corners')
                <div class="text-center mb-5">
                    @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-9 h-8 mx-auto'])
                    <span class="label block mt-2" style="color:var(--accent-ink);">{{ $cat === 'corporate' ? 'Congratulatory Board' : 'Buku Tamu' }}</span>
                    <h2 class="serif text-[1.6rem] mt-1" style="color:var(--ink);">{{ $cat === 'corporate' ? 'Papan Ucapan Selamat' : ($cat === 'graduate' ? 'Ucapan' : 'Ucapan &amp; Doa') }}</h2>
                    <div class="sec-rule"><span></span><i></i><span></span></div>
                </div>
                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3 mb-6">
                    @csrf
                    @if(!empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
                    @if(!empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="field">
                    <textarea name="message" rows="3" required placeholder="{{ $cat === 'corporate' ? 'Tulis ucapan selamat & doa sukses untuk acara ini...' : 'Tulis ucapan dan doa restu...' }}" class="field"></textarea>
                    <button type="submit" class="w-full min-h-[48px] py-3 text-[11px] font-bold uppercase tracking-[0.18em]" style="border:1px solid var(--accent); color: var(--accent-ink); border-radius:10px;">{{ $cat === 'corporate' ? 'Kirim Ucapan Selamat' : 'Kirim Ucapan' }}</button>
                </form>
                <div class="guestbook-feed space-y-3">
                    @forelse($wishes as $w)
                        <div class="note-card">
                            <div class="flex items-center gap-2">
                                <span class="avatar-initial">{{ strtoupper(substr($w->name ?? 'T', 0, 1)) }}</span>
                                <div class="min-w-0 flex-1">
                                    <b class="serif text-[15px] block truncate" style="color:var(--ink);">{{ $w->name }}</b>
                                    <span class="text-[11px]" style="color:var(--soft);">{{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->locale('id')->diffForHumans() : 'Baru saja' }}</span>
                                </div>
                                @if(!empty($w->attendance) && in_array($w->attendance, ['hadir', 'Hadir']))
                                    <span class="badge-hadir">✓ Hadir</span>
                                @endif
                            </div>
                            <p class="text-[15px] mt-2 leading-relaxed" style="color:var(--soft);">{{ $w->message }}</p>
                        </div>
                    @empty
                        <p class="text-center text-[15px] py-4" style="color:var(--soft);">Belum ada ucapan. Jadilah yang pertama memberi doa restu.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- 11. Kartu ATM Metalik & Kado (#section-digital-gift) — wajib di semua kategori --}}
        @include('templates.partials.digital-gift')

        @if($cat === 'corporate')
        {{-- 11b. Karangan Bunga / Standing Flower (khusus acara formal) --}}
        <section id="bunga" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">Tanda Penghormatan</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);">Kirim Karangan Bunga</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>
            <div class="scard px-5 py-5">
                <p class="text-[13px] leading-relaxed" style="color:var(--soft);">Bagi relasi atau institusi yang berkenan mengirimkan ucapan selamat dalam bentuk standing flower, dapat dialamatkan ke:</p>
                <div id="flowerAddress" class="mt-3 p-3 rounded-xl" style="background:color-mix(in srgb, var(--accent) 7%, transparent);border:1px dashed color-mix(in srgb, var(--accent) 42%, transparent);">
                    <b class="serif block text-[1rem]" style="color:var(--ink);">{{ $venueName }} — Concierge {{ $eventHeading }}</b>
                    <p class="text-[12.5px] mt-1 leading-relaxed" style="color:var(--soft);">{{ $venueAddress }}</p>
                    <p class="text-[12px] mt-2" style="color:var(--soft);">PIC Florist: Ibu Anita (0811-9876-5432)</p>
                </div>
                <button type="button" onclick="copyFlowerAddress(this)"
                        class="mt-3 w-full min-h-[44px] rounded-lg text-[11px] font-bold uppercase tracking-[0.14em]"
                        style="background:var(--deep);color:var(--accent-2);border:1px solid color-mix(in srgb, var(--accent) 45%, transparent);">
                    Salin Alamat Lengkap
                </button>
            </div>
        </section>
        @endif

        {{-- 12. Penutup --}}
        <section id="penutup" class="px-5 pt-10 pb-12 text-center reveal">
            <div class="sway w-fit mx-auto">
                @include('templates.partials.event-crest', ['tj' => $tj, 'cls' => 'w-12 h-10'])
            </div>
            <h2 class="serif italic text-[1.55rem] mt-4" style="color:var(--ink);">Terima Kasih</h2>
            <p class="text-[15px] leading-relaxed mt-3 mx-auto" style="color:var(--soft);max-width:20rem;">Merupakan suatu kebahagiaan dan kehormatan bagi kami atas kehadiran serta doa restu Bapak/Ibu/Saudara/i.</p>
            <div class="mx-auto mt-6" style="width:48px;height:4px;background:var(--accent);opacity:.85;border-radius:999px;"></div>
            <span class="label block mt-5" style="color:var(--accent-ink);">Kami yang Berbahagia</span>
            <p class="serif text-[1.35rem] mt-2" style="color:var(--ink);">{{ $hostFullname }}</p>
            <p class="text-[12px] mt-2 leading-relaxed mx-auto" style="color:var(--soft);max-width:18rem;">Beserta Seluruh Keluarga Besar</p>
            <div class="mt-7 flex flex-col items-center gap-1">
                <span class="label" style="color:var(--soft);letter-spacing:.14em;">Bespoke {{ $eventHeading }} &mdash; <b style="color:var(--accent-ink);">D&rsquo;Karsa Heritage</b></span>
                <span class="text-[10px] mt-1" style="color:var(--soft);">&copy; {{ date('Y') }} D&rsquo;Karsa. All Rights Reserved.</span>
                <span class="text-[10px] mt-0.5" style="color:var(--soft);opacity:.85;">Designed with Love by D&rsquo;Karsa</span>
            </div>
        </section>
    </main>

    {{-- gate hint --}}
    <div id="gateHint" class="gate-hint" aria-live="polite">
        <span class="gate-hint-label">Geser ke bawah untuk membuka undangan</span>
        <span class="chev" aria-hidden="true">⌄</span>
        <button type="button" onclick="skipGate()">Buka sekarang</button>
    </div>

    {{-- HUD dock --}}
    @php
        $dock = match ($cat) {
            'birthday' => [['#profil', 'Profil', 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM2 20c0-3.3 3.1-6 7-6s7 2.7 7 6M16 20c0-2.7 2-5 4.5-5.7'], ['#acara', 'Acara', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#galeri', 'Galeri', 'M3 5h18v14H3zM3 15l5-5 4 4 3-3 6 6'], ['#section-guest-qr', 'VIP QR', 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm-3.5 9.2 2.4 2.4 4.6-4.8'], ['#ucapan', 'Doa', 'M12 20s-7-4.4-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.6-7 9-7 9Z']],
            'graduate' => [['#profil', 'Profil', 'M12 4L2 9l10 5 10-5zM6 11v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5'], ['#rundown', 'Perjalanan', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#acara', 'Acara', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#galeri', 'Galeri', 'M3 5h18v14H3zM3 15l5-5 4 4 3-3 6 6'], ['#ucapan', 'Ucapan', 'M12 20s-7-4.4-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.6-7 9-7 9Z']],
            'religious' => [['#salam', 'Tema', 'M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.6 2.6M15.4 15.4L18 18M18 6l-2.6 2.6M8.6 15.4L6 18'], ['#acara', 'Acara', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#rundown', 'Rundown', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#lokasi', 'Lokasi', 'M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z'], ['#ucapan', 'Doa', 'M12 20s-7-4.4-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.6-7 9-7 9Z']],
            'corporate' => [['#profil', 'Profil', 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM2 20c0-3.3 3.1-6 7-6s7 2.7 7 6M16 20c0-2.7 2-5 4.5-5.7'], ['#sorotan', 'Sorotan', 'M12 3l2.7 5.6 6.3.9-4.5 4.4 1 6.2L12 17.3 6.5 20l1-6.2L3 9.5l6.3-.9z'], ['#rundown', 'Agenda', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#lokasi', 'Lokasi', 'M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z'], ['#rsvp', 'Registrasi', 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm-3.5 9.2 2.4 2.4 4.6-4.8']],
            default => [['#profil', 'Profil', 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM2 20c0-3.3 3.1-6 7-6s7 2.7 7 6M16 20c0-2.7 2-5 4.5-5.7'], ['#acara', 'Acara', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'], ['#galeri', 'Galeri', 'M3 5h18v14H3zM3 15l5-5 4 4 3-3 6 6'], ['#rsvp', 'RSVP & QR', 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm-3.5 9.2 2.4 2.4 4.6-4.8'], ['#ucapan', 'Doa', 'M12 20s-7-4.4-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.6-7 9-7 9Z']],
        };
    @endphp
    <nav id="mainDock" class="fixed bottom-0 inset-x-0 z-50 mx-auto max-w-[430px] px-3 pb-3">
        <div class="dock-bar">
            @foreach($dock as [$href, $lbl, $path])
                <a href="{{ $href }}" class="dock-link" data-nav="{{ ltrim($href, '#') }}">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="{{ $path }}"/></svg>
                    <span class="dock-label">{{ $lbl }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    <button type="button" id="audioPill" onclick="toggleAudio()" class="fixed bottom-[86px] right-4 z-50 w-[48px] h-[48px] rounded-full flex items-center justify-center" style="background: var(--deep); border:1.5px solid var(--accent); color: var(--accent-2); box-shadow: 0 12px 28px -10px rgba(0,0,0,.6);" title="Musik pengiring" aria-label="Putar atau jeda musik" aria-pressed="false">
        <svg id="icoPlay" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
        <svg id="icoPause" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><rect x="6" y="5" width="4" height="14" rx="1"/><rect x="14" y="5" width="4" height="14" rx="1"/></svg>
    </button>

    <div id="lightboxModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4" style="background: rgba(0,0,0,.92);">
        <button type="button" onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <img id="lightboxImage" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Foto" class="max-w-full" style="border-radius:10px; border:1px solid var(--accent);">
    </div>

    <script>
        const GATE_TRAVEL = 720;
        const GATE_KIND = '{{ $tj['gate'] }}';
        // Dibaca ulang setiap gestur supaya sakelar tier di dock langsung berlaku tanpa reload.
        function gateTier() { return document.documentElement.dataset.tier || 'eksklusif'; }
        const IS_ENVELOPE = GATE_KIND === 'envelope';
        let gateOpen = false, gateP = 0, gateUnlocked = false, gatePhase = 'intro', gateDir = 1, gesturePx = 0;

        function lockScrollKeep() { document.documentElement.style.overflow = 'clip'; document.body.style.overflowY = 'hidden'; }
        function lockScroll() { window.scrollTo(0, 0); lockScrollKeep(); }
        function unlockScroll() { document.documentElement.style.overflow = ''; document.body.style.overflowY = 'auto'; }
        lockScroll();

        function applyGate(p) {
            const e = p < 0.86 ? p : 0.86 + (1 - Math.pow(1 - (p - 0.86) / 0.14, 2)) * 0.14;
            const veil = document.getElementById('gateVeil');
            if (veil) veil.style.opacity = String(p < 0.90 ? 1 : Math.max(0, 1 - (p - 0.90) / 0.10));

            if (IS_ENVELOPE) {
                const flap = document.getElementById('envFlap');
                const pocket = document.getElementById('envPocket');
                if (flap) flap.classList.toggle('open', p > 0.02);
                if (pocket) pocket.classList.toggle('open', p > 0.3);
                document.body.classList.toggle('gate-locked', p < 0.995);
                return;
            }

            const left = document.getElementById('gateWingLeft');
            const right = document.getElementById('gateWingRight');
            const straight = GATE_KIND === 'straight' || gateTier() === 'premium';
            const fade = p > 0.88 ? Math.max(0, 1 - (p - 0.88) / 0.12) : 1;
            if (left) {
                left.style.transform = straight
                    ? `translate3d(${-82 * e}%,0,0)`
                    : `translate3d(${-78 * e}%,0,0) rotate(${-6 * e}deg) scale(${1 + 0.05 * e})`;
                left.style.opacity = String(fade);
            }
            if (right) {
                right.style.transform = straight
                    ? `translate3d(${82 * e}%,0,0)`
                    : `translate3d(${78 * e}%,0,0) rotate(${6 * e}deg) scale(${1 + 0.05 * e})`;
                right.style.opacity = String(fade);
            }
            const layer = document.getElementById('gateLayer');
            if (layer) layer.style.setProperty('--shade', String(0.12 + 0.6 * e));
            document.body.classList.toggle('gate-locked', p < 0.995);
            if (layer) layer.classList.toggle('gate-behind', p >= 0.995);
        }

        function renderGate(p) {
            gateP = Math.min(1, Math.max(0, p));
            applyGate(gateP);
            if (gateP >= 0.999) unlockContent();
            const hint = document.getElementById('gateHint');
            if (hint) hint.classList.toggle('is-on', gateOpen && gateP < 0.995);
            if (gateP >= 1) unlockContent();
        }

        function skipGate() { gesturePx = GATE_TRAVEL; renderGate(1); }

        function unlockContent() {
            if (gateUnlocked) return;
            gateUnlocked = true; gatePhase = 'open';
            unlockScroll();
            document.body.classList.add('gate-open');
            const hint = document.getElementById('gateHint');
            if (hint) hint.classList.remove('is-on');
            const env = document.getElementById('envelope-stage');
            if (env) env.classList.add('env-hidden');
            updateDockSpy();
        }

        function pushGateGesture(delta) {
            if (!gateOpen) return false;
            delta = Math.sign(delta) * Math.min(Math.abs(delta), 135);
            gesturePx = Math.max(0, Math.min(GATE_TRAVEL, gesturePx + gateDir * delta));
            renderGate(gesturePx / GATE_TRAVEL);
            return true;
        }

        function startClosing(delta, dir) {
            if (gatePhase !== 'open') return false;
            gatePhase = 'close'; document.body.classList.remove('gate-open');
            gateDir = dir; gateUnlocked = false; gesturePx = GATE_TRAVEL; lockScrollKeep();
            pushGateGesture(delta); return true;
        }
        function atPageTop() { return window.scrollY <= 0; }
        function atPageBottom() { return window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2; }

        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            cover.style.opacity = '0'; cover.style.transform = 'scale(.95)';
            setTimeout(() => { cover.style.display = 'none'; }, 620);

            if (gateTier() === 'basic') {
                // Paket Basic: sampul surat datar memudar, tanpa gerbang/amplop 3D.
                const layer = document.getElementById('gateLayer');
                const env = document.getElementById('envelope-stage');
                if (layer) layer.classList.add('gate-hidden');
                if (env) env.classList.add('env-hidden');
                unlockScroll();
                gateOpen = false; gatePhase = 'open'; gateUnlocked = true;
                document.body.classList.remove('gate-locked');
                document.body.classList.add('gate-open');
                document.documentElement.style.setProperty('--gate-main', '1');
            } else if (IS_ENVELOPE) {
                const env = document.getElementById('envelope-stage');
                env.classList.remove('env-hidden');
                lockScroll();
                gateOpen = true; gatePhase = 'intro'; gateDir = 1; gateUnlocked = false; gesturePx = 0;
                renderGate(0);
            } else {
                document.getElementById('gateLayer').classList.remove('gate-hidden');
                lockScroll();
                gateOpen = true; gatePhase = 'intro'; gateDir = 1; gateUnlocked = false; gesturePx = 0;
                renderGate(0);
            }

            const audio = document.getElementById('invitationAudio');
            if (audio) audio.play().catch(() => {});
            const pill = document.getElementById('audioPill');
            if (pill) pill.setAttribute('aria-pressed', 'true');
            revealAll();
            updateDockSpy();
        }

        window.addEventListener('wheel', (ev) => {
            if (!gateOpen) return;
            const step = ev.deltaMode === 1 ? ev.deltaY * 16 : ev.deltaMode === 2 ? ev.deltaY * 120 : ev.deltaY * 1.9;
            if (gatePhase === 'open') {
                if ((atPageBottom() && step > 0) || (atPageTop() && step < 0)) { ev.preventDefault(); startClosing(step, atPageBottom() ? -1 : 1); }
                return;
            }
            ev.preventDefault(); pushGateGesture(step);
        }, { passive: false });

        let lastTouchY = 0;
        window.addEventListener('touchstart', (ev) => { if (gateOpen) lastTouchY = ev.touches[0].clientY; }, { passive: true });
        window.addEventListener('touchmove', (ev) => {
            if (!gateOpen) return;
            const delta = lastTouchY - ev.touches[0].clientY;
            lastTouchY = ev.touches[0].clientY;
            if (gatePhase === 'open') {
                if ((atPageBottom() && delta > 6) || (atPageTop() && delta < -6)) { if (ev.cancelable) ev.preventDefault(); startClosing(delta, atPageBottom() ? -1 : 1); }
                return;
            }
            if (ev.cancelable) ev.preventDefault();
            pushGateGesture(delta);
        }, { passive: false });

        const dockLinks = Array.from(document.querySelectorAll('.dock-link'));
        const dockTargets = dockLinks.map((a) => document.querySelector(a.getAttribute('href'))).filter(Boolean);
        dockLinks.forEach((link) => {
            link.addEventListener('click', (ev) => {
                if (!gateOpen || gatePhase === 'open') return;
                ev.preventDefault();
                gesturePx = GATE_TRAVEL; renderGate(1);
                const target = document.querySelector(link.getAttribute('href'));
                if (target) setTimeout(() => target.scrollIntoView({ behavior: 'smooth' }), 160);
            });
        });

        function updateDockSpy() {
            if (!dockTargets.length) return;
            const y = window.scrollY + window.innerHeight * 0.35;
            let active = 0;
            dockTargets.forEach((el, i) => { if (el.offsetTop <= y) active = i; });
            dockLinks.forEach((a, i) => a.classList.toggle('is-active', i === active));
        }

        const targetDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}").getTime();
        function tick() {
            const diff = targetDate - Date.now();
            const set = (id, v) => { const el = document.getElementById(id); if (el) el.textContent = String(v).padStart(2, '0'); };
            if (diff <= 0) { ['cdDays','cdHours','cdMinutes','cdSeconds'].forEach(id => set(id, 0)); return; }
            set('cdDays', Math.floor(diff / 86400000));
            set('cdHours', Math.floor((diff % 86400000) / 3600000));
            set('cdMinutes', Math.floor((diff % 3600000) / 60000));
            set('cdSeconds', Math.floor((diff % 60000) / 1000));
        }
        setInterval(tick, 1000); tick();

        function syncAudioUI() {
            const audio = document.getElementById('invitationAudio');
            const playing = !!(audio && !audio.paused);
            const pill = document.getElementById('audioPill');
            if (pill) {
                pill.classList.toggle('is-playing', playing);
                pill.setAttribute('aria-pressed', playing ? 'true' : 'false');
                pill.setAttribute('aria-label', playing ? 'Jeda musik' : 'Putar musik');
            }
        }
        function toggleAudio() { const a = document.getElementById('invitationAudio'); if (!a) return; a.paused ? a.play().catch(()=>{}) : a.pause(); syncAudioUI(); }

        function copyFlowerAddress(btn) {
            const box = document.getElementById('flowerAddress');
            const text = box ? box.innerText.trim() : '';
            const done = () => { const old = btn.textContent; btn.textContent = 'ALAMAT TERSALIN'; setTimeout(() => btn.textContent = old, 1800); };
            if (navigator.clipboard) { navigator.clipboard.writeText(text).then(done).catch(done); } else { done(); }
        }

        function copyText(val, btn) {
            const done = () => { const old = btn.textContent; btn.textContent = 'Tersalin ✓'; setTimeout(() => { btn.textContent = old; }, 1800); };
            if (navigator.clipboard) navigator.clipboard.writeText(val).then(done).catch(done); else done();
        }
        function openLightbox(url) { const m = document.getElementById('lightboxModal'); document.getElementById('lightboxImage').src = url; m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeLightbox() { const m = document.getElementById('lightboxModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function revealAll() {
            const els = Array.from(document.querySelectorAll('.reveal'));
            if (!els.length) return;
            if (!('IntersectionObserver' in window)) { els.forEach(el => el.classList.add('is-visible')); return; }
            const io = new IntersectionObserver((entries) => { entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } }); }, { threshold: 0.05 });
            els.forEach(el => io.observe(el));
            setTimeout(() => els.forEach(el => el.classList.add('is-visible')), 1200);
        }
        revealAll();
        updateDockSpy();

        {{-- birthday confetti --}}
        @if($cat === 'birthday')
        (function () {
            const canvas = document.getElementById('confetti-canvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let pieces = [], running = false, raf = null;
            const COLORS = [getComputedStyle(document.body).getPropertyValue('--accent').trim(), getComputedStyle(document.body).getPropertyValue('--accent-2').trim(), '#f4c430', '#e63956', '#38bdf8', '#a3e635'];
            function resize() { canvas.width = innerWidth; canvas.height = innerHeight; }
            resize(); addEventListener('resize', resize);
            function spawn(n) {
                for (let i = 0; i < n; i++) pieces.push({
                    x: Math.random() * canvas.width, y: -20 - Math.random() * canvas.height * 0.4,
                    w: 6 + Math.random() * 8, h: 8 + Math.random() * 10,
                    c: COLORS[Math.floor(Math.random() * COLORS.length)],
                    vy: 2.4 + Math.random() * 3.6, vx: -1.4 + Math.random() * 2.8,
                    rot: Math.random() * Math.PI, vr: -0.12 + Math.random() * 0.24,
                });
            }
            function frame() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                pieces.forEach((p) => { p.y += p.vy; p.x += p.vx; p.rot += p.vr; if (p.y > canvas.height + 30) { p.y = -20; p.x = Math.random() * canvas.width; } ctx.save(); ctx.translate(p.x, p.y); ctx.rotate(p.rot); ctx.fillStyle = p.c; ctx.fillRect(-p.w/2, -p.h/2, p.w, p.h); ctx.restore(); });
                if (running) raf = requestAnimationFrame(frame);
            }
            window.burstConfetti = function () { if (!running) { running = true; spawn(120); frame(); } setTimeout(() => { running = false; if (raf) cancelAnimationFrame(raf); pieces = []; ctx.clearRect(0,0,canvas.width,canvas.height); }, 2200); };
            const cta = document.querySelector('#coverScreen button');
            if (cta) cta.addEventListener('click', () => setTimeout(window.burstConfetti, 300), { once: true });
        })();
        @endif

        window.addEventListener('scroll', () => { updateDockSpy(); }, { passive: true });

        if (new URLSearchParams(window.location.search).get('open') === '1') {
            document.getElementById('coverScreen').style.display = 'none';
            if (IS_ENVELOPE) { document.getElementById('envelope-stage').classList.remove('env-hidden'); gateOpen = true; gesturePx = GATE_TRAVEL; renderGate(1); unlockScroll(); }
            else { document.getElementById('gateLayer').classList.remove('gate-hidden'); gateOpen = true; gesturePx = GATE_TRAVEL; renderGate(1); unlockScroll(); }
        }

        try { if (window.parent && window.parent !== window) window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*'); } catch (e) {}
    </script>
@include('templates.partials.preview-media-bridge')
</body>
</html>
