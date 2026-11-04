{{--
    Adat Jawa — shared shell untuk template 01–10.
    Mengikuti docs/MASTER-INVITATION-BRIEF.md (Bagian 1 + Bagian 2 v2) dan docs/DESIGN.md alpha-v2.
    Config: $tj (lihat TemplateManager::adatJawaMeta()).
--}}
@php
    $tierParam = in_array(request()->query('tier'), ['basic', 'premium', 'eksklusif', 'kustom'], true) ? request()->query('tier') : 'eksklusif';
@endphp
<!DOCTYPE html>
<html lang="id" data-tier="{{ $tierParam }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $couple->groom_name }} &amp; {{ $couple->bride_name }} — {{ $tj['name'] }} | D'Karsa</title>
    <meta name="description" content="Undangan pernikahan {{ $couple->groom_name }} & {{ $couple->bride_name }} — {{ $tj['name'] }}, adat {{ ['sunda' => 'Sunda', 'minang' => 'Minang', 'nusantara' => 'Nusantara', 'modern' => 'Modern', 'floral' => 'Elegan & Floral', 'islami' => 'Islami', 'dual' => 'Akad & Resepsi', 'intl' => 'Internasional'][$tj['culture'] ?? 'jawa'] ?? 'Jawa' }} oleh D'Karsa.">
    <meta property="og:title" content="{{ $couple->groom_name }} & {{ $couple->bride_name }} — {{ $tj['name'] }}">
    <meta property="og:description" content="Undangan pernikahan adat Jawa. Semoga Tuhan senantiasa melimpahkan berkah dan keselamatan.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if(in_array($tj['culture'] ?? 'jawa', ['islami'], true))
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --bg: #fbf9f4;
            --surface: #ffffff;
            --ink: #1b1a17;
            --soft: #5f5a52;
            --accent: #b08d57;
            --accent-2: #e6d3ae;
            --deep: #2a2a26;
            --line: rgba(0, 0, 0, 0.10);
            --accent-ink: color-mix(in srgb, var(--accent) 46%, var(--ink));
            --fil: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 28 28'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.4' stroke-linecap='round'%3E%3Cpath d='M2 26 V10 A8 8 0 0 1 10 2 H26'/%3E%3Cpath d='M7 26 V13 A6 6 0 0 1 13 7 H26' opacity='.5'/%3E%3Cpath d='M26 6 c-6 1 -9 4 -9 9 5 -1 9 -4 9 -9 Z'/%3E%3Cpath d='M6 26 c1 -6 4 -9 9 -9 -1 5 -4 9 -9 9 Z' opacity='.8'/%3E%3Ccircle cx='11' cy='11' r='1.4'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-gunungan {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.4'%3E%3Cpath d='M-6 30 Q9 10 24 30 T54 30 T84 30'/%3E%3Cpath d='M-6 48 Q9 28 24 48 T54 48 T84 48' opacity='.6'/%3E%3Cpath d='M-6 12 Q9 -8 24 12 T54 12 T84 12' opacity='.6'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-gebyok {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.5'%3E%3Cellipse cx='36' cy='20' rx='9' ry='13'/%3E%3Cellipse cx='36' cy='52' rx='9' ry='13'/%3E%3Cellipse cx='20' cy='36' rx='13' ry='9'/%3E%3Cellipse cx='52' cy='36' rx='13' ry='9'/%3E%3Ccircle cx='36' cy='36' r='3'/%3E%3C/g%3E%3C/svg%3E");
        }

        body.motif-megamendung {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='96' height='64' viewBox='0 0 96 64'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.4'%3E%3Cpath d='M0 40 C 12 24, 24 24, 32 38 C 40 22, 56 22, 64 36 C 72 20, 88 20, 96 34'/%3E%3Cpath d='M0 54 C 12 38, 24 38, 32 52 C 40 36, 56 36, 64 50 C 72 34, 88 34, 96 48' opacity='.6'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-siger {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 64 64'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.3'%3E%3Cpath d='M8 56 C 12 34, 22 20, 32 12 C 42 20, 52 34, 56 56'/%3E%3Cpath d='M18 56 L32 26 L46 56' opacity='.6'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-rose {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.2'%3E%3Ccircle cx='40' cy='40' r='16'/%3E%3Ccircle cx='40' cy='40' r='9'/%3E%3Cpath d='M40 24 C 52 30 52 50 40 56 C 28 50 28 30 40 24 Z' opacity='.6'/%3E%3Cpath d='M56 40 C 50 52 30 52 24 40 C 30 28 50 28 56 40 Z' opacity='.4'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-arabesque {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.2'%3E%3Cpath d='M36 4 L68 36 L36 68 L4 36 Z'/%3E%3Cpath d='M36 16 L56 36 L36 56 L16 36 Z' opacity='.65'/%3E%3Cpath d='M0 36 H72 M36 0 V72' opacity='.35'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-ikat {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 64 64'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.3'%3E%3Cpath d='M32 6 L58 32 L32 58 L6 32 Z'/%3E%3Cpath d='M32 18 L46 32 L32 46 L18 32 Z' opacity='.7'/%3E%3Cpath d='M32 27 L37 32 L32 37 L27 32 Z'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-carved {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.3'%3E%3Cpath d='M14 46 C 22 26 34 22 44 30 C 52 36 48 48 38 48 C 30 48 28 40 34 36'/%3E%3Cpath d='M58 26 C 50 46 38 50 28 42' opacity='.55'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-glass {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23000' stroke-width='1'%3E%3Cpath d='M0 40 H80 M40 0 V80' opacity='.5'/%3E%3Crect x='12' y='12' width='56' height='56'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-paper {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='90' height='90' viewBox='0 0 90 90'%3E%3Cg fill='none' stroke='%23000' stroke-width='1'%3E%3Cpath d='M10 70 C 30 60 40 40 36 18' opacity='.6'/%3E%3Cpath d='M36 30 C 48 26 58 34 56 46 C 46 50 38 42 36 30 Z' opacity='.5'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-gonjong {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.3'%3E%3Cpath d='M2 52 C 16 50 30 38 36 18 C 38 12 42 10 46 12 C 50 14 50 20 48 26 C 44 40 54 48 70 52'/%3E%3Cpath d='M8 60 C 22 56 34 46 40 30' opacity='.6'/%3E%3Cpath d='M14 66 C 28 62 40 52 46 36' opacity='.35'/%3E%3C/g%3E%3C/svg%3E");
        }
        body.motif-songket {
            --motif: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='56' height='56' viewBox='0 0 56 56'%3E%3Cg fill='none' stroke='%23000' stroke-width='1.2'%3E%3Cpath d='M28 4 L52 28 L28 52 L4 28 Z'/%3E%3Cpath d='M28 14 L42 28 L28 42 L14 28 Z' opacity='.65'/%3E%3Cpath d='M0 28 H56 M28 0 V56' opacity='.35'/%3E%3Ccircle cx='28' cy='28' r='2'/%3E%3C/g%3E%3C/svg%3E");
        }

        * { -webkit-tap-highlight-color: transparent; }
        html { scroll-behavior: smooth; overflow-x: clip; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; line-height: 1.6; background: var(--bg); color: var(--ink); overflow-x: clip; }
        .serif { font-family: 'EB Garamond', serif; }
        /* Paket basic & premium: tanpa animasi dekoratif berulang (parallax/partikel hanya untuk eksklusif & kustom). */
        html[data-tier="basic"] .sway, html[data-tier="premium"] .sway,
        html[data-tier="basic"] .pulse-cta { animation: none !important; }
        .label { font-family: 'Plus Jakarta Sans', sans-serif; text-transform: uppercase; letter-spacing: 0.18em; font-size: 10px; font-weight: 700; }
        section[id] { scroll-margin-top: 16px; }

        /* ---------- Z-0 : kanvas taktil ---------- */
        .canvas-texture {
            background-color: var(--bg);
            background-image:
                radial-gradient(circle at 1px 1px, color-mix(in srgb, var(--accent) 26%, transparent) 1px, transparent 0),
                radial-gradient(circle at 21px 21px, color-mix(in srgb, var(--accent) 16%, transparent) 1px, transparent 0);
            background-size: 40px 40px, 40px 40px;
        }
        .canvas-texture::after {
            content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
            background: radial-gradient(120% 80% at 50% 0%, transparent 40%, color-mix(in srgb, var(--deep) 14%, transparent) 100%);
        }

        /* ---------- halo di belakang judul agar teks tetap jelas di atas foto ---------- */
        main > section > .text-center { position: relative; isolation: isolate; }
        main > section > .text-center::before {
            content: ""; position: absolute; inset: -10px -14px; z-index: -1; border-radius: 16px;
            background: radial-gradient(72% 70% at 50% 50%,
                color-mix(in srgb, var(--bg) 92%, transparent) 0%,
                color-mix(in srgb, var(--bg) 70%, transparent) 55%,
                transparent 100%);
            pointer-events: none;
        }

        /* ---------- latar foto redup ---------- */
        .page-photo {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
            background-size: cover; background-position: center;
            opacity: .42; filter: saturate(.92) brightness(1.02) blur(1.5px);
        }
        body.gate-locked .page-photo { opacity: 0; }


        /* ---------- Z-30 : sayap gerbang V-Angle ---------- */
        .gate-wing {
            position: fixed; top: 0; bottom: 0; width: 50%; z-index: 30; pointer-events: none; overflow: hidden;
            will-change: transform; backface-visibility: hidden;
            transition: transform var(--gate-dur, 1.05s) var(--gate-ease, cubic-bezier(.16,1,.3,1)), box-shadow var(--gate-dur, 1.05s) ease;
            background: var(--deep);
            box-shadow: 0 0 60px -10px rgba(0,0,0,.6);
        }
        .gate-wing-left { left: 0; border-right: 3px solid #c9a050; box-shadow: 3px 0 16px rgba(201,160,80,.38); }
        .gate-wing-right { right: 0; border-left: 3px solid #c9a050; box-shadow: -3px 0 16px rgba(201,160,80,.38); }
        .gate-wing svg { width: 100%; height: 100%; display: block; }
        /* foto gerbang Stitch: satu render dibelah dua, kiri & kanan */
        .gate-photo {
            position: absolute; top: 0; height: 100%; width: 100vw; max-width: none; left: 0;
            object-fit: cover; object-position: center center; z-index: 0; pointer-events: none;
            filter: saturate(.9) contrast(1.03) brightness(.98);
        }
        .gate-photo-right { left: -50vw; }
        .gate-wing > svg { position: relative; z-index: 1; }
        /* tint palet supaya render menyatu dengan tema */
        .gate-wing.has-photo::before {
            content: ""; position: absolute; inset: 0; z-index: 0; pointer-events: none;
            background: linear-gradient(165deg,
                color-mix(in srgb, var(--deep) 26%, transparent),
                color-mix(in srgb, var(--deep) 48%, transparent));
            mix-blend-mode: multiply;
        }
        .gate-wing.has-photo > svg { opacity: 0; }
        .gate-wing.has-photo { border-color: color-mix(in srgb, #c9a050 45%, #14130f); border-width: 2px; box-shadow: 2px 0 12px rgba(0,0,0,.5); }
        .gate-wing.has-photo.gate-wing-right { box-shadow: -2px 0 12px rgba(0,0,0,.5); }

        /* serat tenun songket: gradient murah, tanpa filter SVG */
        .culture-minang .gate-wing::after {
            content: ""; position: absolute; inset: 0; pointer-events: none; z-index: 2;
            background-image:
                repeating-linear-gradient(90deg, rgba(255,255,255,.055) 0 1px, transparent 1px 3px),
                repeating-linear-gradient(0deg, rgba(0,0,0,.05) 0 1px, transparent 1px 3px);
        }
        .gate-hidden .gate-wing { opacity: 0; transition: opacity .6s ease; }
        /* Setelah gerbang terbuka penuh, sayap turun ke belakang konten supaya tidak menutupi teks. */
        .gate-behind .gate-wing { z-index: 5; }

        /* ---------- Z-40 : cover ---------- */
        body:not(.gate-open) #audioPill { opacity: 0; pointer-events: none; }
        #audioPill { transition: transform .25s ease, box-shadow .25s ease; }
        #audioPill:active { transform: scale(.93); }
        #audioPill.is-playing { box-shadow: 0 0 0 2px color-mix(in srgb, var(--accent) 55%, transparent), 0 12px 28px -10px rgba(0,0,0,.6); }
        #icoPause { display: none; }
        #audioPill.is-playing #icoPlay { display: none; }
        #audioPill.is-playing #icoPause { display: block; }
        .cover-card {
            background: color-mix(in srgb, var(--surface) 93%, transparent);
            -webkit-backdrop-filter: blur(16px) saturate(1.04);
            backdrop-filter: blur(16px) saturate(1.04);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
            border-radius: 20px;
            box-shadow: 0 34px 80px -26px rgba(0,0,0,.5);
        }
        .cover-scroll { scrollbar-width: none; -ms-overflow-style: none; }
        .cover-scroll::-webkit-scrollbar { width: 0; height: 0; display: none; }

        /* ---------- Hero frames ---------- */
        .hero-arch { border-radius: 999px 999px 18px 18px; overflow: hidden; }
        .hero-medallion { border-radius: 999px; overflow: hidden; }
        .hero-diagonal { clip-path: polygon(0 0, 100% 0, 100% 82%, 0 100%); overflow: hidden; }
        .hero-mask { clip-path: polygon(50% 0%, 88% 26%, 100% 100%, 0% 100%, 12% 26%); overflow: hidden; }
        .hero-rects { overflow: visible; }
        .hero-rects img { box-shadow: 12px 12px 0 -2px var(--accent-2); }
        .hero-glass { border-radius: 22px; overflow: hidden; backdrop-filter: blur(14px); }

        /* ---------- Reveal (konten selalu terlihat tanpa JS) ---------- */
        /* ---------- Animasi baca: gerak mengikuti tema budaya ---------- */
        .reveal {
            opacity: 0;
            transform: translate3d(var(--rev-x, 0px), var(--rev-y, 26px), 0)
                       scale(var(--rev-s, 1)) rotate(var(--rev-r, 0deg));
            transition: opacity var(--rev-dur, .8s) ease,
                        transform var(--rev-dur, .9s) var(--rev-ease, cubic-bezier(.16,1,.3,1));
            will-change: opacity, transform;
        }
        .reveal.is-visible { opacity: 1; transform: none; }
        .reveal > .scard, .reveal > .card, .reveal > .gf-item, .reveal > .mo-grid > * {
            opacity: 0;
            transform: translate3d(0, calc(var(--rev-y, 26px) * .6), 0) scale(var(--rev-s, 1));
            transition: opacity .7s ease, transform var(--rev-dur, .85s) var(--rev-ease, cubic-bezier(.16,1,.3,1));
        }
        .reveal.is-visible > .scard, .reveal.is-visible > .card,
        .reveal.is-visible > .gf-item, .reveal.is-visible > .mo-grid > * { opacity: 1; transform: none; }
        .reveal.is-visible > *:nth-child(2) { transition-delay: calc(var(--rev-step, .07s) * 1); }
        .reveal.is-visible > *:nth-child(3) { transition-delay: calc(var(--rev-step, .07s) * 2); }
        .reveal.is-visible > *:nth-child(4) { transition-delay: calc(var(--rev-step, .07s) * 3); }
        .reveal.is-visible > *:nth-child(5) { transition-delay: calc(var(--rev-step, .07s) * 4); }
        .reveal.is-visible > *:nth-child(n+6) { transition-delay: calc(var(--rev-step, .07s) * 5); }

        /* Jawa — tenang, naik perlahan */
        .culture-jawa { --rev-y: 30px; --rev-dur: 1s; --rev-step: .09s; --gate-dur: 1.05s; }
        /* Sunda — lembut, sedikit miring seperti kain */
        .culture-sunda { --rev-y: 24px; --rev-r: -1.4deg; --rev-dur: 1.05s; --rev-step: .08s; --gate-dur: 1.15s; }
        /* Minang — tegas & geometris */
        .culture-minang { --rev-y: 18px; --rev-s: .965; --rev-dur: .8s; --rev-ease: cubic-bezier(.22,.61,.36,1); --rev-step: .06s; --gate-dur: .9s; }
        /* Nusantara — menyapu dari samping */
        .culture-nusantara { --rev-x: 26px; --rev-y: 0px; --rev-dur: .9s; --rev-step: .07s; --gate-dur: 1s; }
        /* Minimalis Modern — cepat & presisi */
        .culture-modern { --rev-y: 12px; --rev-dur: .62s; --rev-ease: cubic-bezier(.22,.61,.36,1); --rev-step: .05s; --gate-dur: .8s; --gate-ease: cubic-bezier(.22,.61,.36,1); }
        /* Floral — mekar: membesar lalu menetap */
        .culture-floral { --rev-y: 20px; --rev-s: 1.03; --rev-dur: 1.15s; --rev-ease: cubic-bezier(.25,.8,.3,1); --rev-step: .1s; --gate-dur: 1.3s; --gate-ease: cubic-bezier(.25,.8,.3,1); }
        /* Islami — khusyuk, lambat */
        .culture-islami { --rev-y: 26px; --rev-dur: 1.1s; --rev-step: .09s; --gate-dur: 1.2s; }
        /* Akad & Resepsi — dua ketukan */
        .culture-dual { --rev-y: 16px; --rev-s: .98; --rev-dur: .78s; --rev-step: .06s; --gate-dur: .88s; }
        /* Internasional — editorial, geser dari kiri */
        .culture-intl { --rev-x: -30px; --rev-y: 0px; --rev-dur: .82s; --rev-step: .07s; --gate-dur: .82s; }
        @keyframes revealUp { from { opacity: 0; transform: translateY(22px); } to { opacity: 1; transform: none; } }

        /* ---------- Micro-interactions ---------- */
        @keyframes breathe { 0%,100% { transform: scale(1); box-shadow: 0 0 0 0 color-mix(in srgb, var(--accent) 55%, transparent); } 60% { transform: scale(1.03); box-shadow: 0 0 0 16px transparent; } }
        .pulse-cta { animation: breathe 2.6s ease-in-out infinite; }
        @keyframes sway { 0%,100% { transform: rotate(-2.5deg); } 50% { transform: rotate(2.5deg); } }
        .sway { animation: sway 7s ease-in-out infinite; transform-origin: top center; }
        @keyframes shimmer { 0% { background-position: -140% 0; } 100% { background-position: 240% 0; } }
        .foil-line { background: linear-gradient(100deg, transparent 20%, var(--accent) 45%, var(--accent-2) 55%, transparent 80%); background-size: 200% 100%; animation: shimmer 7s linear infinite; height: 1px; }
        .shimmer-btn { position: relative; overflow: hidden; }
        .shimmer-btn::after { content: ""; position: absolute; inset: 0; background: linear-gradient(100deg, transparent 30%, color-mix(in srgb, var(--accent-2) 55%, transparent) 50%, transparent 70%); background-size: 220% 100%; animation: shimmer 4.5s linear infinite; pointer-events: none; }

        /* ---------- Kartu heritage (anti plain-box) ---------- */
        .card {
            position: relative; overflow: hidden;
            background: color-mix(in srgb, var(--surface) 94%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 42%, transparent);
            box-shadow: 0 24px 50px -34px color-mix(in srgb, var(--deep) 70%, transparent);
        }
        .card::before {
            content: ""; position: absolute; inset: 5px; border-radius: inherit; pointer-events: none;
            border: 1px solid color-mix(in srgb, var(--accent) 26%, transparent);
        }
        .culture-sunda .card::after { opacity: .085; }
        .culture-minang .card::after { opacity: .08; }
        .culture-nusantara .card::after { opacity: .075; }
        .culture-floral .card::after { opacity: .07; }


        /* ---------- Gerbang: cahaya & napas ---------- */
        /* layer gerbang harus jadi stacking context sendiri, kalau tidak cahaya tertutup <main> */
        #gateLayer { position: fixed; inset: 0; z-index: 40; pointer-events: none; perspective: 1400px; perspective-origin: center center; }
        body.gate-locked main {
            opacity: 0; transform: translateY(18px) scale(.994); filter: blur(7px);
            will-change: opacity, transform, filter;
        }
        main { transition: opacity .95s ease, transform 1.1s cubic-bezier(.16,1,.3,1), filter .95s ease; }
        /* kilau emas menyapu sekali saat gerbang selesai terbuka */
        .gate-shine {
            position: fixed; inset: 0; z-index: 45; pointer-events: none; opacity: 0;
            background: linear-gradient(to bottom, transparent 0%, color-mix(in srgb, var(--accent-2) 70%, transparent) 46%, transparent 100%);
        }
        body.gate-done .gate-shine { animation: shineSweep 1.15s ease-out forwards; }
        @keyframes shineSweep {
            0%   { opacity: 0; transform: translateY(55%) scaleY(.6); }
            28%  { opacity: .85; }
            100% { opacity: 0; transform: translateY(-55%) scaleY(.6); }
        }
        #gateVeil {
            position: fixed; inset: 0; z-index: 1; pointer-events: none;
            background-size: cover; background-position: center;
            background:
                repeating-linear-gradient(90deg, color-mix(in srgb, var(--accent) 10%, transparent) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(0deg, color-mix(in srgb, var(--accent) 7%, transparent) 0 1px, transparent 1px 28px),
                linear-gradient(168deg, var(--deep), color-mix(in srgb, var(--deep) 72%, var(--bg)));
        }
        .gate-wing-left { transform-origin: 0% 50%; }
        .gate-wing-right { transform-origin: 100% 50%; }
        .gate-wing::after {
            content: ''; position: absolute; top: 0; bottom: 0; width: 64px; pointer-events: none;
            opacity: var(--shade, 0); transition: opacity .3s ease;
        }
        .gate-wing-left::after { right: 0; background: linear-gradient(to left, rgba(0,0,0,.62), rgba(0,0,0,.18) 45%, rgba(0,0,0,0)); }
        .gate-wing-right::after { left: 0; background: linear-gradient(to right, rgba(0,0,0,.62), rgba(0,0,0,.18) 45%, rgba(0,0,0,0)); }
        #gateLayer.gate-hidden { display: none; }
        /* setelah terbuka: gerbang menjadi bingkai latar, di belakang teks & gambar */
        body.gate-open #gateLayer { z-index: 5; }
        .gate-wing.gate-dragging { transition-duration: .12s; }
        .gate-idle .gate-wing-left { animation: gateBreath 7s ease-in-out infinite; }
        .gate-idle .gate-wing-right { animation: gateBreathR 7s ease-in-out infinite; }
        @keyframes gateBreath { 0%,100% { transform: translate3d(0,0,0); } 50% { transform: translate3d(0,-.45%,0); } }
        @keyframes gateBreathR { 0%,100% { transform: translate3d(0,0,0); } 50% { transform: translate3d(0,.45%,0); } }

        /* ---------- Bilingual (Internasional 86–90) ---------- */
        .i18n .en { display: none; }
        html.lang-en .i18n .id { display: none; }
        html.lang-en .i18n .en { display: inline; }
        .lang-toggle {
            position: fixed; top: 12px; right: 12px; z-index: 50;
            display: flex; align-items: center; gap: 6px;
            padding: 5px 10px; border-radius: 999px;
            background: color-mix(in srgb, var(--surface) 88%, transparent);
            -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px);
            border: 1px solid color-mix(in srgb, var(--accent) 40%, transparent);
            box-shadow: 0 6px 18px -10px rgba(0,0,0,.5);
        }
        .lang-toggle button {
            font-size: 10px; font-weight: 800; letter-spacing: .14em; text-transform: uppercase;
            color: var(--soft); background: none; border: 0; padding: 3px 5px; cursor: pointer;
        }
        .lang-toggle button.is-on { color: var(--accent-ink); }
        .lang-toggle span { font-size: 10px; color: color-mix(in srgb, var(--soft) 60%, transparent); }

        /* ---------- Kelopak jatuh (Elegan & Floral) ---------- */
        .petal-field { position: fixed; inset: 0; pointer-events: none; z-index: 32; overflow: hidden; }
        .petal {
            position: absolute; top: -8vh; width: 9px; height: 9px;
            border-radius: 62% 38% 55% 45%;
            background: radial-gradient(circle at 32% 30%, color-mix(in srgb, var(--surface) 80%, #fff), var(--accent) 72%);
            opacity: 0;
            animation-name: petalFall; animation-timing-function: linear; animation-iteration-count: infinite;
        }
        @keyframes petalFall {
            0% { transform: translate3d(0,-10vh,0) rotate(0deg); opacity: 0; }
            8% { opacity: .55; }
            90% { opacity: .32; }
            100% { transform: translate3d(var(--drift, 30px), 108vh, 0) rotate(300deg); opacity: 0; }
        }

        /* ---------- Pemutar musik piringan hitam (Elegan & Floral) ---------- */
        .culture-floral #audioPill {
            width: 54px; height: 54px; border-radius: 50%;
            background:
                repeating-radial-gradient(circle at 50% 50%, #14161c 0 2px, #23262f 2px 4px);
            border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
            box-shadow: 0 10px 26px rgba(0,0,0,.38);
            animation: vinylSpin 9s linear infinite;
        }
        .culture-floral #audioPill::before {
            content: ""; position: absolute; left: 50%; top: 50%; width: 20px; height: 20px;
            transform: translate(-50%,-50%); border-radius: 50%;
            background: radial-gradient(circle, var(--accent) 0 42%, var(--surface) 43% 100%);
            box-shadow: inset 0 0 0 1px rgba(0,0,0,.25);
        }
        .culture-floral #audioPill { color: var(--deep); }
        .culture-floral #audioPill.is-paused { animation-play-state: paused; }
        @keyframes vinylSpin { to { transform: rotate(360deg); } }
        /* Minimalis Modern: tanpa motif etnis */
        .culture-modern .card::after, .culture-modern .scard::after { display: none; }
        .card::after {
            content: ""; position: absolute; inset: 0; pointer-events: none; border-radius: inherit;
            background-color: var(--accent); opacity: .065;
            -webkit-mask-image: var(--motif); mask-image: var(--motif);
            -webkit-mask-size: 76px 76px; mask-size: 76px 76px;
            -webkit-mask-repeat: repeat; mask-repeat: repeat;
        }

        /* ---------- Kartu gaya Stitch (seksi awal: cover→peta) ---------- */
        .scard {
            position: relative; overflow: hidden;
            background: color-mix(in srgb, var(--surface) 96%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 18%, transparent);
            border-radius: 16px;
            box-shadow: 0 8px 22px -14px color-mix(in srgb, var(--deep) 55%, transparent);
        }
        .sub-geometris .scard { border-radius: 6px; }
        .scard::after {
            content: ""; position: absolute; inset: 0; pointer-events: none; border-radius: inherit;
            background-color: var(--accent); opacity: .035;
            -webkit-mask-image: var(--motif); mask-image: var(--motif);
            -webkit-mask-size: 88px 88px; mask-size: 88px 88px;
            -webkit-mask-repeat: repeat; mask-repeat: repeat;
        }
        .scard::before { content: ""; position: absolute; inset: 4px; border-radius: 12px; pointer-events: none; border: 1px solid color-mix(in srgb, var(--accent) 22%, transparent); }
        .scard > * { position: relative; z-index: 1; }
        .fil {
            position: absolute; width: 22px; height: 22px; z-index: 2; pointer-events: none;
            background-color: var(--accent); opacity: .8;
            -webkit-mask: var(--fil) center / 100% 100% no-repeat;
            mask: var(--fil) center / 100% 100% no-repeat;
        }
        .fil-tl { top: 5px; left: 5px; }
        .fil-tr { top: 5px; right: 5px; transform: scaleX(-1); }
        .fil-bl { bottom: 5px; left: 5px; transform: scaleY(-1); }
        .fil-br { bottom: 5px; right: 5px; transform: scale(-1, -1); }

        /* Sub-style: Geometris (genap) vs Minimalis (ganjil) */
        .sub-geometris .card { border-radius: 4px; }
        .sub-geometris .kicker-rule { width: 34px; height: 34px; border: 1px solid var(--accent); transform: rotate(45deg); margin: 0 auto; }
        .sub-minimalis .card { border-radius: 16px; }
        .sub-korporat .card, .sub-korporat .scard { border-radius: 4px; }
        .sub-rustic .card, .sub-rustic .scard { border-radius: 18px; }
        .sub-minimalis .kicker-rule { width: 56px; height: 1px; background: var(--accent); margin: 0 auto; }

        /* ---------- Ornamen seksi ---------- */
        .sec-rule { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 10px; }
        .sec-rule span { height: 1px; width: 40px; background: linear-gradient(90deg, transparent, color-mix(in srgb, var(--accent) 80%, transparent)); }
        .sec-rule span:last-child { background: linear-gradient(270deg, transparent, color-mix(in srgb, var(--accent) 80%, transparent)); }
        .sec-rule i { width: 6px; height: 6px; transform: rotate(45deg); background: var(--accent); opacity: .85; }
        .pill {
            display: inline-block; padding: 6px 12px; border-radius: 999px;
            font-size: 9px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase;
            color: var(--accent-ink);
            background: color-mix(in srgb, var(--accent) 14%, transparent);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
        }

        /* ---------- Cerita cinta : sub-kartu parchment ---------- */
        .story-vine { position: relative; padding-left: 38px; }
        .story-vine::before {
            content: ""; position: absolute; left: 15px; top: 10px; bottom: 10px; width: 1px;
            background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--accent) 75%, transparent), transparent);
        }
        .story-item { position: relative; margin-bottom: 16px; }
        .story-badge {
            position: absolute; left: -40px; top: 14px; width: 34px; height: 34px; display: grid; place-items: center;
            border-radius: 999px; background: radial-gradient(circle at 50% 30%, color-mix(in srgb, var(--accent) 34%, var(--deep)), var(--deep));
            border: 1px solid color-mix(in srgb, var(--accent) 70%, transparent);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--bg) 92%, transparent), 0 0 0 4px color-mix(in srgb, var(--accent) 30%, transparent);
            z-index: 2;
        }
        .story-badge span { font-size: 9px; letter-spacing: .04em; color: var(--accent-2); }

        /* ---------- Tiket acara ---------- */
        .card-ticket {
            overflow: visible;
            --notch: 10px;
            -webkit-mask-image: radial-gradient(circle var(--notch) at 0 50%, transparent 98%, #000 100%),
                                radial-gradient(circle var(--notch) at 100% 50%, transparent 98%, #000 100%);
            -webkit-mask-composite: source-in;
            mask-image: radial-gradient(circle var(--notch) at 0 50%, transparent 98%, #000 100%),
                        radial-gradient(circle var(--notch) at 100% 50%, transparent 98%, #000 100%);
            mask-composite: intersect;
        }
        .perf { border-top: 1px dashed color-mix(in srgb, var(--accent) 45%, transparent); margin: 14px 0; }
        .ribbon {
            display: inline-block; padding: 7px 18px; font-size: 10px; font-weight: 700;
            letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2); background: var(--deep);
            clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 50%, calc(100% - 10px) 100%, 10px 100%, 0 50%);
        }
        .btn-metal {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            min-height: 44px; padding: 11px 20px; border-radius: 999px;
            font-size: 10px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase;
            color: var(--accent-2);
            background: linear-gradient(180deg, color-mix(in srgb, var(--deep) 90%, white 10%), var(--deep));
            border: 1px solid color-mix(in srgb, var(--accent) 75%, transparent);
            box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent-2) 45%, transparent), 0 10px 22px -16px rgba(0,0,0,.8);
        }

        /* ---------- Countdown : plakat crest ---------- */
        .plaque {
            position: relative; padding: 14px 6px; border-radius: 10px;
            background: linear-gradient(160deg, color-mix(in srgb, var(--deep) 94%, black), var(--deep));
            box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent) 50%, transparent), inset 0 -10px 20px -14px black, 0 10px 22px -16px rgba(0,0,0,.85);
        }
        .plaque::after { content: ""; position: absolute; inset: 4px; border-radius: 7px; border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent); }

        /* ---------- Petunjuk gerbang (selama belum terbuka) ---------- */
        .gate-hint {
            position: fixed; left: 50%; bottom: 96px; transform: translateX(-50%); z-index: 55;
            display: none; flex-direction: column; align-items: center; gap: 5px;
            padding: 11px 18px; border-radius: 14px; pointer-events: none; text-align: center;
            background: color-mix(in srgb, var(--deep) 90%, transparent);
            border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
            backdrop-filter: blur(8px);
            box-shadow: 0 16px 34px -22px rgba(0,0,0,.7);
        }
        .gate-hint.is-on { display: flex; }
        .gate-hint span.gate-hint-label { font-size: 10px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2); }
        .gate-hint .chev { color: var(--accent-2); font-size: 18px; line-height: 1; animation: chev 1.4s ease-in-out infinite; }
        @keyframes chev { 0%, 100% { transform: translateY(0); opacity: .65; } 50% { transform: translateY(4px); opacity: 1; } }
        .gate-hint button {
            pointer-events: auto; margin-top: 3px; font-size: 10px; font-weight: 700;
            letter-spacing: .14em; text-transform: uppercase; color: var(--accent-2);
            border-bottom: 1px solid color-mix(in srgb, var(--accent-2) 55%, transparent);
            padding-bottom: 1px;
        }

        /* ---------- Galeri melayang (foto terangkat + parallax) ---------- */
        .gf-hero { position: relative; }
        .gf-hero .gallery-hero { border-radius: 160px 160px 12px 12px; }
        .gf-hero .gallery-hero img { height: 240px; }
        .gf-cluster { position: relative; height: 442px; margin-top: 26px; }
        .gf-item {
            position: absolute; padding: 0; background: none; border: 0; cursor: pointer;
            transform: translate3d(0, var(--dy, 0px), 0);
            will-change: transform;
        }
        .gf-mat {
            position: relative; display: block; padding: 9px;
            background: color-mix(in srgb, var(--surface) 97%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 48%, transparent);
            box-shadow: 0 20px 36px -22px color-mix(in srgb, var(--deep) 80%, transparent),
                        inset 0 0 0 1px color-mix(in srgb, var(--accent) 18%, transparent);
            transform: rotate(var(--rot, 0deg));
            transition: transform .45s cubic-bezier(.22,.61,.36,1), box-shadow .45s ease;
            animation: gfBob 8s ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }
        .gf-mat::after {
            content: ""; position: absolute; inset: 5px; pointer-events: none;
            border: 1px solid color-mix(in srgb, var(--accent) 24%, transparent);
        }
        .gf-mat img { display: block; width: 100%; aspect-ratio: 4 / 5; object-fit: cover; }
        .gf-item:active .gf-mat, .gf-item:focus-visible .gf-mat {
            transform: rotate(0deg) scale(1.03);
            box-shadow: 0 28px 46px -20px rgba(0,0,0,.55);
        }
        @keyframes gfBob { 0%, 100% { translate: 0 0; } 50% { translate: 0 -8px; } }
        .gf-i0 { left: -2%;  top: 0;   width: 54%; --rot: -7deg; --delay: 0s;   z-index: 1; }
        .gf-i1 { right: -3%; top: 10%; width: 42%; --rot: 8deg;  --delay: 1.1s; z-index: 3; }
        .gf-i2 { left: 0;    top: 41%; width: 49%; --rot: -4deg; --delay: 2.2s; z-index: 4; }
        .gf-i3 { right: 0;   top: 47%; width: 36%; --rot: 6deg;  --delay: .6s;  z-index: 2; }
        /* pita kertas (washi tape) pada dua cetakan — ciri khas kolase */
        .gf-item:nth-child(odd) .gf-mat::before {
            content: ""; position: absolute; top: -12px; left: -10px; width: 64px; height: 20px;
            transform: rotate(-8deg);
            background: color-mix(in srgb, var(--accent) 34%, transparent);
            border: 1px solid color-mix(in srgb, var(--accent) 50%, transparent);
            box-shadow: 0 2px 6px -4px rgba(0,0,0,.5);
        }

        /* ---------- Galeri bento (fallback lama, tak terpakai) ---------- */
        .gallery-hero { display: block; width: 100%; overflow: hidden; border-radius: 160px 160px 12px 12px; border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent); }
        .gallery-hero img { width: 100%; height: 260px; object-fit: cover; display: block; }
        .gallery-cell { display: block; overflow: hidden; border-radius: 8px; border: 1px solid color-mix(in srgb, var(--accent) 38%, transparent); }
        .gallery-cell img { width: 100%; height: 100%; aspect-ratio: 1 / 1; object-fit: cover; display: block; }
        .filmstrip { display: flex; gap: 8px; overflow-x: auto; padding-bottom: 4px; scrollbar-width: none; -ms-overflow-style: none; }
        .filmstrip::-webkit-scrollbar { display: none; }
        .filmstrip button { flex: 0 0 92px; }


        /* ---------- Perjalanan cerita: timeline ---------- */
        .story-timeline { position: relative; padding-left: 34px; }
        .story-timeline::before {
            content: ""; position: absolute; left: 13px; top: 4px; bottom: 4px; width: 2px; border-radius: 2px;
            background: linear-gradient(to bottom,
                color-mix(in srgb, var(--accent) 10%, transparent),
                color-mix(in srgb, var(--accent) 70%, transparent) 12%,
                color-mix(in srgb, var(--accent) 70%, transparent) 88%,
                color-mix(in srgb, var(--accent) 10%, transparent));
        }
        .story-item { position: relative; margin-bottom: 16px; }
        .story-item:last-child { margin-bottom: 0; }
        .story-marker {
            position: absolute; left: -34px; top: 4px; width: 28px; height: 28px;
            display: grid; place-items: center; z-index: 1;
            background: var(--surface); border: 1.5px solid color-mix(in srgb, var(--accent) 70%, transparent);
            color: var(--accent-ink); border-radius: 999px;
            box-shadow: 0 6px 14px -8px color-mix(in srgb, var(--deep) 70%, transparent);
        }
        .story-marker b { font-size: 10px; font-weight: 800; letter-spacing: .02em; }
        .story-card {
            position: relative; padding: 14px 16px 16px; border-radius: 14px;
            background: var(--surface);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
            box-shadow: 0 14px 30px -26px color-mix(in srgb, var(--deep) 80%, transparent);
        }
        .story-year { display: block; font-size: 10px; font-weight: 800; letter-spacing: .18em; text-transform: uppercase; color: var(--accent-ink); }

        /* Jawa — intan keraton */
        .culture-jawa .story-marker { border-radius: 7px; transform: rotate(45deg); }
        .culture-jawa .story-marker b { transform: rotate(-45deg); }
        /* Sunda — bulat lembut */
        .culture-sunda .story-timeline::before { width: 3px; opacity: .85; }
        .culture-sunda .story-marker { border-radius: 999px; border-style: double; border-width: 3px; }
        /* Minang — tegas geometris */
        .culture-minang .story-marker { border-radius: 3px; }
        .culture-minang .story-card { border-radius: 6px; border-left: 3px solid color-mix(in srgb, var(--accent) 80%, transparent); }
        /* Nusantara — garis tenun */
        .culture-nusantara .story-timeline::before {
            width: 4px; background-image: repeating-linear-gradient(180deg,
                color-mix(in srgb, var(--accent) 75%, transparent) 0 6px,
                transparent 6px 12px);
            background-color: transparent;
        }
        .culture-nusantara .story-marker { border-radius: 4px; }
        /* Minimalis Modern — ringkas */
        .culture-modern .story-marker { width: 22px; height: 22px; left: -31px; border-width: 1px; }
        .culture-modern .story-marker b { font-size: 9px; }
        .culture-modern .story-timeline { padding-left: 30px; }
        .culture-modern .story-card { border-radius: 10px; box-shadow: none; }
        /* Floral — kelopak */
        .culture-floral .story-marker { border-radius: 50% 0 50% 50%; border-width: 2px; width: 28px; height: 28px; }
        .culture-floral .story-timeline::before { background: linear-gradient(to bottom, color-mix(in srgb, var(--accent) 65%, transparent), color-mix(in srgb, var(--accent-2) 85%, transparent)); }
        /* Islami — lengkung mihrab */
        .culture-islami .story-marker { border-radius: 999px 999px 6px 6px; height: 32px; width: 26px; left: -33px; }
        /* Akad & Resepsi — dua ketukan */
        .culture-dual .story-card { border-left: 3px solid var(--accent); }
        /* Internasional — editorial bernomor besar */
        .culture-intl .story-marker { border-radius: 0; background: var(--deep); color: var(--accent-2); border-color: var(--deep); width: 26px; height: 26px; }
        .culture-intl .story-timeline::before { width: 1px; }
        .culture-intl .story-card { border-radius: 2px; }

        /* ---------- RSVP ---------- */
        /* ---------- Kontrol formulir (rapi di 320–430px) ---------- */
        .field {
            width: 100%; min-height: 48px; padding: 0 14px; font-size: 15px; line-height: 1.35;
            background: var(--surface);
            border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
            border-radius: 10px; color: var(--ink);
        }
        textarea.field { padding: 12px 14px; min-height: 96px; resize: vertical; }
        select.field {
            appearance: none; -webkit-appearance: none; padding-right: 44px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23888' stroke-width='2' stroke-linecap='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 14px center;
        }
        .field:focus { outline: 2px solid color-mix(in srgb, var(--accent) 55%, transparent); outline-offset: 1px; }
        .field-num { text-align: center; font-weight: 700; letter-spacing: .04em; -moz-appearance: textfield; }
        .field-num::-webkit-outer-spin-button, .field-num::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        .toggle-card {
            display: flex; align-items: center; justify-content: center; gap: 5px;
            height: 46px; min-height: 46px; padding: 0 6px; width: 100%; min-width: 0;
            border-radius: 10px; border: 1.5px solid color-mix(in srgb, var(--accent) 55%, transparent);
            background: var(--surface); color: var(--accent-ink);
            font-size: 10px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase;
            white-space: nowrap; transition: all .2s ease; overflow: hidden;
        }
        .toggle-card .ic { font-size: 12px; line-height: 1; flex: 0 0 auto; }
        .toggle-card .txt { min-width: 0; overflow: hidden; text-overflow: ellipsis; }
        .peer:checked ~ .toggle-card { background: var(--deep); border-color: var(--deep); color: var(--accent-2); box-shadow: inset 0 1px 0 color-mix(in srgb, var(--accent) 45%, transparent); }

        /* ---------- Buku tamu : kartu berstempel tanpa scrollbar native ---------- */
        .guestbook-feed {
            max-height: 21rem; overflow-y: auto; padding-right: 2px;
            scrollbar-width: none; -ms-overflow-style: none;
            -webkit-mask-image: linear-gradient(180deg, #000 0, #000 84%, transparent 100%);
            mask-image: linear-gradient(180deg, #000 0, #000 84%, transparent 100%);
        }
        .guestbook-feed::-webkit-scrollbar { width: 0; height: 0; display: none; }
        .note-card {
            position: relative; padding: 12px 14px; border-radius: 10px;
            background: color-mix(in srgb, var(--surface) 88%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 22%, transparent);
        }
        .note-card::after { content: "\201C"; position: absolute; right: 10px; bottom: -10px; font-family: 'EB Garamond', serif; font-size: 46px; line-height: 1; color: var(--accent); opacity: .16; }
        .avatar-initial {
            width: 32px; height: 32px; border-radius: 999px; display: grid; place-items: center;
            font-size: 11px; font-weight: 700; color: var(--accent-2);
            background: color-mix(in srgb, var(--deep) 88%, black);
            border: 1px solid color-mix(in srgb, var(--accent) 55%, transparent);
        }
        .badge-hadir {
            display: inline-flex; align-items: center; gap: 4px; padding: 2px 8px; border-radius: 999px;
            font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
            color: var(--accent-2); background: color-mix(in srgb, var(--deep) 86%, transparent);
            border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
        }

        /* ---------- Kado digital : kartu ATM logam ---------- */
        .atm-card {
            position: relative; overflow: hidden; border-radius: 14px; padding: 16px; text-align: left;
            color: var(--accent-2);
            background: linear-gradient(135deg, color-mix(in srgb, var(--deep) 86%, black), color-mix(in srgb, var(--accent) 36%, var(--deep)));
            border: 1px solid color-mix(in srgb, var(--accent) 65%, transparent);
            box-shadow: 0 20px 38px -24px rgba(0,0,0,.75), inset 0 1px 0 color-mix(in srgb, var(--accent-2) 40%, transparent);
        }
        .atm-card::before {
            content: ""; position: absolute; inset: 0; opacity: .3; pointer-events: none;
            background-image: repeating-radial-gradient(circle at 18% 130%, transparent 0 11px, color-mix(in srgb, var(--accent-2) 22%, transparent) 11px 12px);
        }
        .atm-card::after { content: ""; position: absolute; inset: 6px; border-radius: 10px; border: 1px solid color-mix(in srgb, var(--accent-2) 22%, transparent); pointer-events: none; }
        .atm-number { font-variant-numeric: tabular-nums; letter-spacing: .16em; font-size: 15px; font-weight: 600; text-shadow: 0 1px 0 rgba(0,0,0,.6), 0 -1px 0 color-mix(in srgb, var(--accent-2) 30%, transparent); }
        .atm-label { font-size: 9px; letter-spacing: .18em; text-transform: uppercase; opacity: .85; }
        .gift-address { position: relative; border: 1px dashed color-mix(in srgb, var(--accent) 50%, transparent); border-radius: 10px; padding: 14px; background: color-mix(in srgb, var(--accent) 7%, transparent); }

        /* ---------- Crest connector ---------- */
        .crest-connector { display: flex; align-items: center; gap: 14px; }
        .crest-connector > span.serif { padding: 0 6px; }
        .crest-connector .flourish { flex: 1; height: 1px; background: linear-gradient(90deg, transparent, color-mix(in srgb, var(--accent) 70%, transparent)); }
        .crest-connector .flourish:last-child { background: linear-gradient(270deg, transparent, color-mix(in srgb, var(--accent) 70%, transparent)); }
        .crest-seal {
            position: relative; width: 58px; height: 58px; display: grid; place-items: center; border-radius: 999px;
            background: radial-gradient(circle at 50% 30%, color-mix(in srgb, var(--surface) 94%, var(--bg)), color-mix(in srgb, var(--accent) 12%, var(--surface)));
            border: 1px solid color-mix(in srgb, var(--accent) 60%, transparent);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--bg) 92%, transparent), 0 0 0 5px color-mix(in srgb, var(--accent) 26%, transparent);
        }
        .crest-seal b { position: relative; z-index: 1; font-size: 14px; letter-spacing: .04em; color: var(--accent-ink); }
        .crest-seal svg { position: absolute; inset: 0; margin: auto; width: 46px; height: 40px; opacity: .18; }

        /* ---------- Z-50 : HUD ---------- */
        .dock-bar {
            display: flex; align-items: center; justify-content: space-around; padding: 6px 4px; border-radius: 18px;
            background: color-mix(in srgb, var(--surface) 88%, transparent);
            backdrop-filter: blur(16px) saturate(120%);
            border: 1px solid color-mix(in srgb, var(--accent) 30%, transparent);
            box-shadow: 0 18px 44px -24px rgba(0,0,0,.6);
        }
        .dock-link {
            position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 2px; min-width: 52px; min-height: 44px; padding: 6px 6px;
            color: color-mix(in srgb, var(--soft) 88%, transparent); transition: color .2s ease, transform .2s ease;
        }
        .dock-link:active { transform: scale(.94); }
        .dock-link .dock-label { font-size: 8.5px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        .dock-link::after {
            content: ""; position: absolute; left: 50%; bottom: 3px; width: 16px; height: 2px;
            transform: translateX(-50%) scaleX(0); background: var(--accent); transition: transform .25s ease;
        }
        .dock-link.is-active { color: var(--accent-ink); }
        .dock-link.is-active::after { transform: translateX(-50%) scaleX(1); }

        /* ---------- Galeri: varian mosaic / filmstrip / column ---------- */
        .mo-grid { display: grid; grid-template-columns: repeat(4, 1fr); grid-auto-rows: 92px; gap: 8px; }
        .mo-grid button {
            position: relative; overflow: hidden; padding: 0; border-radius: 10px;
            border: 1px solid color-mix(in srgb, var(--accent) 42%, transparent);
            box-shadow: 0 18px 34px -26px color-mix(in srgb, var(--deep) 85%, transparent);
        }
        .mo-grid img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .mo-a { grid-column: span 2; grid-row: span 3; border-radius: 130px 130px 10px 10px !important; }
        .mo-b { grid-column: span 2; grid-row: span 2; }
        .mo-c, .mo-d { grid-column: span 1; grid-row: span 2; }
        .mo-e { grid-column: span 4; grid-row: span 1; }

        .fs-track {
            display: flex; gap: 10px; overflow-x: auto; scroll-snap-type: x mandatory;
            scrollbar-width: none; -ms-overflow-style: none; padding-bottom: 6px;
        }
        .fs-track::-webkit-scrollbar { display: none; }
        .fs-card {
            flex: 0 0 78%; scroll-snap-align: center; padding: 0; overflow: hidden;
            border-radius: 16px; border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
            box-shadow: 0 20px 36px -26px color-mix(in srgb, var(--deep) 85%, transparent);
        }
        .fs-card img { width: 100%; height: 300px; object-fit: cover; display: block; }
        .fs-meta { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-top: 10px; padding-right: 2px; }
        .fs-count {
            flex: 0 0 auto; padding: 4px 10px; border-radius: 999px;
            font-size: 10px; letter-spacing: .14em; font-weight: 700; color: var(--ink);
            background: color-mix(in srgb, var(--surface) 92%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 38%, transparent);
        }
        .fs-count b { color: var(--accent-ink); }
        .fs-hint {
            flex: 1 1 auto; text-align: right; font-size: 9px; letter-spacing: .14em;
            text-transform: uppercase; color: var(--soft); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; padding-right: 2px;
        }

        .col-list { position: relative; display: flex; flex-direction: column; gap: 18px; }
        .col-list::before {
            content: ""; position: absolute; left: 50%; top: 6px; bottom: 6px; width: 1px;
            background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--accent) 60%, transparent), transparent);
        }
        .col-item { position: relative; width: 74%; margin: 0; }
        .col-left { align-self: flex-start; }
        .col-right { align-self: flex-end; }
        .col-item button {
            display: block; width: 100%; padding: 0; overflow: hidden; border-radius: 12px;
            border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
            box-shadow: 0 18px 34px -26px color-mix(in srgb, var(--deep) 85%, transparent);
        }
        .col-left button { border-radius: 120px 120px 10px 10px; }
        .col-item img { width: 100%; height: 210px; object-fit: cover; display: block; }
        .col-item figcaption {
            position: absolute; top: 8px; padding: 2px 8px; border-radius: 999px;
            font-size: 9px; font-weight: 700; letter-spacing: .16em; color: var(--accent-ink);
            background: color-mix(in srgb, var(--surface) 92%, var(--bg));
            border: 1px solid color-mix(in srgb, var(--accent) 35%, transparent);
        }
        .col-left figcaption { right: -6px; }
        .col-right figcaption { left: -6px; }

        /* kolase: variasi susunan per template (seed = nomor template % 3) */
        .gf-seed1 .gf-i0 { left: 2%;  top: 2%;  width: 48%; --rot: 6deg;  z-index: 2; }
        .gf-seed1 .gf-i1 { right: 4%; top: 12%; width: 40%; --rot: -5deg; z-index: 4; }
        .gf-seed1 .gf-i2 { left: 10%; top: 44%; width: 42%; --rot: 7deg;  z-index: 1; }
        .gf-seed1 .gf-i3 { right: 0;  top: 40%; width: 46%; --rot: -3deg; z-index: 3; }
        .gf-seed2 .gf-i0 { left: 4%;  top: 0;   width: 44%; --rot: -3deg; z-index: 3; }
        .gf-seed2 .gf-i1 { right: 0;  top: 6%;  width: 52%; --rot: 5deg;  z-index: 1; }
        .gf-seed2 .gf-i2 { left: 0;   top: 38%; width: 50%; --rot: -6deg; z-index: 2; }
        .gf-seed2 .gf-i3 { right: 6%; top: 48%; width: 40%; --rot: 4deg;  z-index: 4; }

        #lightboxModal img { max-height: 88vh; }

        @media (prefers-reduced-motion: reduce) {
            .reveal.is-visible, .pulse-cta, .sway, .foil-line, .shimmer-btn::after, .gf-mat, .gate-hint .chev { animation: none !important; }
        }
    </style>
</head>
<body class="canvas-texture culture-{{ $tj['culture'] ?? 'jawa' }} motif-{{ $tj['gate'] }} {{ $tj['sub'] === 'Geometris' ? 'sub-geometris' : ($tj['sub'] === 'Korporat' ? 'sub-korporat' : ($tj['sub'] === 'Rustic' ? 'sub-rustic' : 'sub-minimalis')) }}"
      style="--bg: {{ $tj['c']['bg'] }}; --surface: {{ $tj['c']['surface'] }}; --ink: {{ $tj['c']['ink'] }}; --soft: {{ $tj['c']['soft'] }}; --accent: {{ $tj['c']['accent'] }}; --accent-2: {{ $tj['c']['accent2'] }}; --deep: {{ $tj['c']['deep'] }}; --on-accent: {{ $tj['c']['onAccent'] ?? '#FFF8EE' }};">

    @php
        $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo ?? null, $tj['cover']);
        $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo ?? null, 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&q=80');
        $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo ?? null, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&q=80');
        $musicRaw = (string) ($couple->music_url ?? '');
        $audioUrl = $musicRaw === ''
            ? asset('audio/wedding-melody.wav')
            : (str_starts_with($musicRaw, 'http')
                ? $musicRaw
                : (str_starts_with($musicRaw, 'storage/') ? asset($musicRaw) : asset('audio/' . ltrim($musicRaw, '/'))));

        $targetDate = !empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
        $dateLong = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
        $groomParents = \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga');
        $brideParents = \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga');

        $events = ($couple->events ?? collect());
        $firstEvent = $events->first();
        $venueName = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Gedung Pahargyan');
        $venueAddress = $firstEvent->address ?? ($couple->venue_address ?? 'Alamat acara akan diinformasikan lebih lanjut');
        $mapsUrl = $firstEvent->maps_url ?? ('https://www.google.com/maps/search/?api=1&query=' . urlencode($venueName));

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
        $floatShots = $galleryItems->slice(1, 4)->values();
        $extraShots = $galleryItems->slice(5)->values();

        // Cerita perjalanan: pakai isian user (kolom `story`) kalau ada, kalau tidak pakai contoh
        $storyDefault = [
            ['year' => '2022', 'title' => 'Awal Bertemu', 'text' => 'Pertemuan pertama di halaman keraton saat sebuah pertunjukan tari. Dari pandangan pertama, cinta mulai tumbuh.'],
            ['year' => '2025', 'title' => 'Lamaran & Tunangan', 'text' => 'Keluarga besar datang bersilaturahmi, membawa cincin sebagai tanda niat suci membangun rumah tangga.'],
            ['year' => '2026', 'title' => 'Menuju Pelaminan', 'text' => 'Dengan berkah Tuhan, ijab kabul akan diucapkan, menyatukan dua hati menjadi satu keluarga.'],
        ];
        $story = $storyDefault;
        $rawStory = trim((string) ($couple->story ?? ''));
        if ($rawStory !== '') {
            $decoded = json_decode($rawStory, true);
            if (is_array($decoded) && !empty($decoded)) {
                $story = collect($decoded)
                    ->map(fn ($it) => [
                        'year'  => (string) ($it['year'] ?? ''),
                        'title' => (string) ($it['title'] ?? ''),
                        'text'  => (string) ($it['text'] ?? ''),
                    ])
                    ->filter(fn ($it) => $it['title'] !== '' || $it['text'] !== '')
                    ->values()->all();
            } else {
                // teks biasa: satu baris = satu momen ("2022 | Awal Bertemu | cerita...")
                $story = collect(preg_split('/\r?\n/', $rawStory))
                    ->map(function ($line) {
                        $parts = array_map('trim', explode('|', $line));
                        return [
                            'year'  => $parts[0] ?? '',
                            'title' => $parts[1] ?? ($parts[0] ?? ''),
                            'text'  => $parts[2] ?? '',
                        ];
                    })
                    ->filter(fn ($it) => $it['title'] !== '')
                    ->values()->all();
            }
        }

        $initials = strtoupper(substr($couple->groom_name ?? 'A', 0, 1)) . '&' . strtoupper(substr($couple->bride_name ?? 'K', 0, 1));
        $calendarUrl = 'https://calendar.google.com/calendar/render?action=TEMPLATE'
            . '&text=' . urlencode('Pawiwahan ' . $couple->groom_name . ' & ' . $couple->bride_name)
            . '&dates=' . $targetDate->format('Ymd\THis') . '/' . $targetDate->copy()->addHours(5)->format('Ymd\THis')
            . '&details=' . urlencode('Pahargyan pawiwahan adat Jawa')
            . '&location=' . urlencode($venueName);
    @endphp

    <audio id="invitationAudio" loop preload="none" src="{{ $audioUrl }}"></audio>

    <!-- latar foto redup (dari foto pembuka) -->
    <div class="page-photo" aria-hidden="true" style="background-image:url('{{ $coverImg }}');"></div>
    <div class="gate-shine" aria-hidden="true"></div>

    @php
        // Render gerbang dari Stitch, satu per template, dicocokkan dengan palet & budaya
        $gateByTemplate = [
            'akad-akad-and-resepsi' => 'images/gates/gate-59b03e04353d4f74a9c6539b9ddd460f.jpg',
            'akad-dua-janji' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'akad-khitbah' => 'images/gates/gate-2c8feeadad5b493397d5414fd167c471.jpg',
            'akad-sakral-and-syahdu' => 'images/gates/gate-e6787d6912364e919194a81f98d20db4.jpg',
            'akad-satu-hari-dua-acara' => 'images/gates/gate-f2f9a51efe154f2a9cf0283f03fac29e.jpg',
            'floral-anggrek-bulan' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'floral-bunga-kertas' => 'images/gates/gate-f8e44133b9bc47199733f830530a6ee4.jpg',
            'floral-daisy-pagi' => 'images/gates/gate-83d79cb825fd4be19e4b0da0fff026c1.jpg',
            'floral-lavender-fields' => 'images/gates/gate-b3473a3585464bbc8350b92b60fd848f.jpg',
            'floral-magnolia' => 'images/gates/gate-f2f9a51efe154f2a9cf0283f03fac29e.jpg',
            'floral-peony-putih' => 'images/gates/gate-3655d88f0257441daac16ba4983de7ed.jpg',
            'floral-rosalind' => 'images/gates/gate-92d6d33786ad47eba3a61871bc74a8da.jpg',
            'floral-rosewood' => 'images/gates/gate-fd960814f490448f9824a360dcb68cad.jpg',
            'floral-sakura-lembut' => 'images/gates/gate-07b3592946f74b90b87466d352736f7d.jpg',
            'floral-taman-ayu' => 'images/gates/gate-842c7ef3f1b145fea2aed91c8cf7b8f8.jpg',
            'internasional-bilingual-bliss' => 'images/gates/gate-42e7d41693f0419cbbc04bdd67cc01f8.jpg',
            'internasional-maison' => 'images/gates/gate-1101943a1bd5411b9c8da08108b2a287.jpg',
            'internasional-nusantara-fusion' => 'images/gates/gate-1101943a1bd5411b9c8da08108b2a287.jpg',
            'internasional-the-grand-affair' => 'images/gates/gate-b443af3a72c94fd49303d0e91a99ed34.jpg',
            'islami-ar-rum-21' => 'images/gates/gate-f8e1fe4c8e01427ca825cc4b89e17df2.jpg',
            'islami-baarakallahu' => 'images/gates/gate-7c25bc8f33a34e1189c9e9b1d373f742.jpg',
            'islami-barokah-jannah' => 'images/gates/gate-b6e4bbdb2ccc414fb28430ed590bfc31.jpg',
            'islami-mihrab-cinta' => 'images/gates/gate-4c99e08f48ca4bd1bed751b1175441e4.jpg',
            'islami-misykah' => 'images/gates/gate-d4f87a23f21c4f98bd384d48b9f9c927.jpg',
            'islami-nurul-iman' => 'images/gates/gate-b6e4bbdb2ccc414fb28430ed590bfc31.jpg',
            'islami-salam-khusyuk' => 'images/gates/gate-7c25bc8f33a34e1189c9e9b1d373f742.jpg',
            'islami-zahra-and-ahmad' => 'images/gates/gate-69f6389bc2804f49a4b27cbcd2a17f07.jpg',
            'jawa-arctic-frost' => 'images/gates/gate-8d5bfd38f0914da9a5ea3ad6955eccf3.jpg',
            'jawa-batik-parang' => 'images/gates/gate-4cb5b7a0849b499bbfc88fae3d3372eb.jpg',
            'jawa-burgundy-wine' => 'images/gates/gate-23e1399f5e0946a6964d1957bcb9b6bf.jpg',
            'jawa-citrus-pop' => 'images/gates/gate-d4f87a23f21c4f98bd384d48b9f9c927.jpg',
            'jawa-gebyok-ukir' => 'images/gates/gate-83d79cb825fd4be19e4b0da0fff026c1.jpg',
            'jawa-gunungan-emas' => 'images/gates/gate-3655d88f0257441daac16ba4983de7ed.jpg',
            'jawa-keraton-agung' => 'images/gates/gate-8edb8acf1f554912ae1440495b80a9f2.jpg',
            'jawa-melati-kraton' => 'images/gates/gate-e6787d6912364e919194a81f98d20db4.jpg',
            'jawa-midnight-navy' => 'images/gates/gate-f2f9a51efe154f2a9cf0283f03fac29e.jpg',
            'jawa-pastel-mix' => 'images/gates/gate-086bb7c5b6e74856bc609e04b060e593.jpg',
            'jawa-prada-ayu' => 'images/gates/gate-83d79cb825fd4be19e4b0da0fff026c1.jpg',
            'jawa-purple-dream' => 'images/gates/gate-086bb7c5b6e74856bc609e04b060e593.jpg',
            'jawa-ruby-luxe' => 'images/gates/gate-b6e4bbdb2ccc414fb28430ed590bfc31.jpg',
            'jawa-sekar-jagad' => 'images/gates/gate-d4fee2cccc4747c19afadbe91bdfd0f1.jpg',
            'jawa-sekar-kedhaton' => 'images/gates/gate-92d6d33786ad47eba3a61871bc74a8da.jpg',
            'jawa-soft-pink' => 'images/gates/gate-b42855e5f1984408b0faad20e87e17f8.jpg',
            'jawa-sogan-klasik' => 'images/gates/gate-d4f87a23f21c4f98bd384d48b9f9c927.jpg',
            'jawa-wijaya-kusuma' => 'images/gates/gate-915cca9069fe427aa3d038f016db1b05.jpg',
            'minang-anak-daro' => 'images/gates/gate-8bc3611b2ef640168142667d34f912c5.jpg',
            'minang-bundo-kanduang' => 'images/gates/gate-8bc3611b2ef640168142667d34f912c5.jpg',
            'minang-gonjong-amah' => 'images/gates/gate-d2801fec5f1f45058f1aa3dc94b29b90.jpg',
            'minang-marawa-pusako' => 'images/gates/gate-9b0d9392ca0b47d3ab30f1f17b989b6a.jpg',
            'minang-ranah-minang' => 'images/gates/gate-21d444e82af64e1f828d8fafa968b5a8.jpg',
            'minang-rumah-gadang' => 'images/gates/gate-f8e1fe4c8e01427ca825cc4b89e17df2.jpg',
            'minang-singgalang' => 'images/gates/gate-6b076af11ccb4583bbaceed2377205b6.jpg',
            'minang-siti-nurbaya' => 'images/gates/gate-69f6389bc2804f49a4b27cbcd2a17f07.jpg',
            'minang-songket-padang' => 'images/gates/gate-a11fd006b2c74d208a88f6f16691badf.jpg',
            'minang-suntiang-permata' => 'images/gates/gate-9f18726ac8af45a2afa43167ae4e6dc3.jpg',
            'minimalis-aksara' => 'images/gates/gate-f8e44133b9bc47199733f830530a6ee4.jpg',
            'minimalis-aria' => 'images/gates/gate-5d7dc7348f4b406c819a26238dc1c9b2.jpg',
            'minimalis-bening' => 'images/gates/gate-4c99e08f48ca4bd1bed751b1175441e4.jpg',
            'minimalis-grafik' => 'images/gates/gate-35b4947e946d4c62a46a112195b1a47f.jpg',
            'minimalis-kaca' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'minimalis-kanvas' => 'images/gates/gate-b6e4bbdb2ccc414fb28430ed590bfc31.jpg',
            'minimalis-lumen' => 'images/gates/gate-e83dd9baf04a4c08863b135b05696573.jpg',
            'minimalis-monoline' => 'images/gates/gate-f2f9a51efe154f2a9cf0283f03fac29e.jpg',
            'minimalis-nadi' => 'images/gates/gate-f2f9a51efe154f2a9cf0283f03fac29e.jpg',
            'minimalis-rona' => 'images/gates/gate-b3473a3585464bbc8350b92b60fd848f.jpg',
            'minimalis-ruang' => 'images/gates/gate-b8559fcf58374bf8908c5753837c39af.jpg',
            'minimalis-selaras' => 'images/gates/gate-9b0d9392ca0b47d3ab30f1f17b989b6a.jpg',
            'minimalis-sudut' => 'images/gates/gate-7932afef933247dba0e42854485869e1.jpg',
            'minimalis-sunyi' => 'images/gates/gate-4cb5b7a0849b499bbfc88fae3d3372eb.jpg',
            'nusantara-bunga-cengkeh' => 'images/gates/gate-8a4968c937ab44839214c382c9ab6a68.jpg',
            'nusantara-dayak-ranying' => 'images/gates/gate-b3473a3585464bbc8350b92b60fd848f.jpg',
            'nusantara-nusantara-raya' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'nusantara-sabu-raijua' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'nusantara-tenun-ikat' => 'images/gates/gate-0dd5e96c3b6b402aae97dee4bfed3375.jpg',
            'nusantara-toraja-tallu' => 'images/gates/gate-d37b299a7b154eb5be820e68c2689390.jpg',
            'nusantara-ulos-hela' => 'images/gates/gate-99e9b3954dda49e6b38c8fe837c18649.jpg',
            'nusantara-wastra-timur' => 'images/gates/gate-f8e44133b9bc47199733f830530a6ee4.jpg',
            'sunda-angklung-kasih' => 'images/gates/gate-07b3592946f74b90b87466d352736f7d.jpg',
            'sunda-bunga-kantil' => 'images/gates/gate-d5dcbe24d1ef42e5b772e5cd96270aac.jpg',
            'sunda-cireundeu-asih' => 'images/gates/gate-1f59615645144e1d9cceb3e64f41c0c4.jpg',
            'sunda-citarum-ayu' => 'images/gates/gate-63de113405a749b7a794b09a813da4c8.jpg',
            'sunda-dayang-sumbi' => 'images/gates/gate-1f59615645144e1d9cceb3e64f41c0c4.jpg',
            'sunda-kembang-peuteuy' => 'images/gates/gate-c1609c6a5b024709867f385c919d6906.jpg',
            'sunda-mega-mendung' => 'images/gates/gate-842c7ef3f1b145fea2aed91c8cf7b8f8.jpg',
            'sunda-parahyangan' => 'images/gates/gate-1c218c2c1f8c47ad94c7e4fa312eb2cc.jpg',
            'sunda-priangan-lembut' => 'images/gates/gate-1b568528da05447281a71af87493f3e7.jpg',
            'sunda-ratu-sunda' => 'images/gates/gate-2c8feeadad5b493397d5414fd167c471.jpg',
            'sunda-sangkuriang' => 'images/gates/gate-fd960814f490448f9824a360dcb68cad.jpg',
            'sunda-siger-wangi' => 'images/gates/gate-d71fc2a9085245cfa1a9ae253754b233.jpg'
        ];
        $gatePhotos = [
            'jawa' => 'images/gates/gate-8edb8acf1f554912ae1440495b80a9f2.jpg',
            'sunda' => 'images/gates/gate-1b568528da05447281a71af87493f3e7.jpg',
            'minang' => 'images/gates/gate-21d444e82af64e1f828d8fafa968b5a8.jpg',
            'nusantara' => 'images/gates/gate-15b61f2289954ebab05a9986658d77ac.jpg',
            'modern' => 'images/gates/gate-0911e30637d3465fb9de79ed35f10d96.jpg',
            'floral' => 'images/gates/gate-21f6a629dfe64b9a9b39275d694bab66.jpg',
            'islami' => 'images/gates/gate-07d7158868d64809b3070602cb96b93e.jpg',
            'dual' => 'images/gates/gate-17932834cf5c4ba5a6a423bb4ea7d17b.jpg',
            'intl' => 'images/gates/gate-1101943a1bd5411b9c8da08108b2a287.jpg',
        ];
        $gatePhoto = $gateByTemplate[$tj['key']] ?? $gatePhotos[$tj['culture'] ?? 'jawa'] ?? null;
    @endphp

    <!-- ============ Z-30 : V-Angle split gate ============ -->
    <div id="gateLayer" class="gate-hidden">
        <div id="gateVeil" aria-hidden="true"></div>
        <div class="gate-wing gate-wing-left {{ $gatePhoto ? 'has-photo' : '' }}" id="gateWingLeft">
            @if($gatePhoto)
                <img class="gate-photo gate-photo-left" src="{{ asset($gatePhoto) }}" alt="" aria-hidden="true"
                     onerror="this.remove(); this.closest('.gate-wing')?.classList.remove('has-photo')">
            @endif
            @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-gate', ['tj' => $tj, 'side' => 'left', 'initials' => $initials])
        </div>
        <div class="gate-wing gate-wing-right {{ $gatePhoto ? 'has-photo' : '' }}" id="gateWingRight">
            @if($gatePhoto)
                <img class="gate-photo gate-photo-right" src="{{ asset($gatePhoto) }}" alt="" aria-hidden="true"
                     onerror="this.remove(); this.closest('.gate-wing')?.classList.remove('has-photo')">
            @endif
            @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-gate', ['tj' => $tj, 'side' => 'right', 'initials' => $initials])
        </div>
    </div>

    @if(($tj['culture'] ?? 'jawa') === 'floral')
        <div class="petal-field" aria-hidden="true">
            @foreach(range(1, 12) as $pt)
                <span class="petal" style="left: {{ 3 + $pt * 7.7 }}%; animation-duration: {{ 9 + ($pt % 5) * 2 }}s; animation-delay: -{{ $pt * 0.9 }}s; --drift: {{ ($pt % 2 ? 1 : -1) * (18 + $pt * 3) }}px;"></span>
            @endforeach
        </div>
    @endif

    @if(($tj['culture'] ?? 'jawa') === 'intl')
        <div class="lang-toggle" id="langToggle" role="group" aria-label="Pilih bahasa / Choose language">
            <button type="button" data-lang="id" class="is-on" aria-pressed="true">ID</button>
            <span>|</span>
            <button type="button" data-lang="en" aria-pressed="false">EN</button>
        </div>
    @endif

    <!-- ============ Z-40 : locked cover (gaya Stitch) ============ -->
    <div id="coverScreen" class="fixed inset-0 z-40 flex items-center justify-center px-4 pt-5 pb-24 transition-all duration-700">
        <div id="previewCoverBg" class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ $coverImg }}'); opacity:.35;"></div>
        <div class="absolute inset-0" style="background:linear-gradient(180deg, color-mix(in srgb, var(--bg) 62%, transparent), color-mix(in srgb, var(--bg) 95%, transparent));"></div>

        <div class="relative w-full max-w-[400px]">
        <div class="cover-card relative w-full px-5 py-6 text-center max-h-[calc(100dvh-10rem)] overflow-y-auto cover-scroll">
            {{-- emblem kultural dalam blok gradasi rounded-t-full --}}
            <div class="sway mx-auto mb-3 flex items-center justify-center rounded-t-full"
                 style="width:64px;height:80px;background:linear-gradient(180deg, var(--accent), var(--deep));box-shadow:0 10px 26px color-mix(in srgb, var(--deep) 40%, transparent);">
                @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-10 h-9'])
            </div>

            <span class="label" style="color:var(--accent-ink);">Undangan Pernikahan</span>
            <p class="text-[13px] mt-2 mx-auto" style="color:var(--soft);max-width:16rem;">
                Maha Suci Tuhan yang telah menciptakan makhluk-Nya berpasang-pasangan
            </p>
            <h1 class="serif italic text-[clamp(1.65rem,4.8dvh,2.15rem)] leading-tight mt-2" style="color:var(--ink);">
                {{ $couple->groom_name }}<span style="color:var(--accent-ink);"> &amp; </span>{{ $couple->bride_name }}
            </h1>
            <p class="text-[13px] mt-1.5" style="color:var(--soft);">{{ $dateLong }}</p>

            <div class="hero-{{ $tj['hero'] }} mx-auto mt-3 w-[clamp(96px,19dvh,138px)] h-[clamp(108px,22dvh,168px)]" style="border:1px solid color-mix(in srgb, var(--accent) 55%, transparent);">
                <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Potret {{ $couple->groom_name }} & {{ $couple->bride_name }}" class="w-full h-full object-cover">
            </div>

            {{-- placard tamu (kaca buram) --}}
            <div class="mt-3 px-4 py-2.5 rounded-xl text-center"
                 style="background:color-mix(in srgb, var(--surface) 16%, transparent);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);border:1px solid color-mix(in srgb, var(--accent) 26%, transparent);">
                <span class="label block" style="color:var(--soft);">Kepada Yth.</span>
                <b id="gate-guest-name" class="serif text-base block mt-1" style="color:var(--ink);">{{ $guest->name ?? 'Bapak/Ibu/Saudara/i' }}</b>
                <span class="text-[11.5px] mt-0.5 block" style="color:color-mix(in srgb, var(--soft) 88%, var(--ink));">Tamu Kehormatan</span>
            </div>

            <button type="button" onclick="openInvitation()"
                    class="pulse-cta mt-4 w-full min-h-[48px] py-3.5 px-6 rounded-full text-[11px] font-bold uppercase tracking-[0.18em] flex items-center justify-center gap-2"
                    style="background:var(--accent);border:1px solid color-mix(in srgb, var(--deep) 22%, transparent);color:var(--on-accent);box-shadow:0 10px 24px color-mix(in srgb, var(--accent) 34%, transparent);">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" style="width:18px;height:18px;"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>
                <span>Buka Undangan</span>
            </button>
            <p class="text-[11px] mt-2" style="color:var(--soft);">Geser ke bawah untuk membuka undangan</p>

        </div>
            @if(!empty($isDemo))
                <span class="block mt-2 px-3 py-1.5 text-[9px] font-bold uppercase leading-relaxed"
                      style="letter-spacing:.08em;overflow-wrap:anywhere;background:color-mix(in srgb, var(--accent) 18%, var(--bg));color:var(--accent-ink);border-radius:12px;">
                    Mode Demo • {{ $tj['name'] }}{{ strcasecmp(trim((string) $tj['name']), trim((string) $tj['palette'])) !== 0 ? ' (' . $tj['palette'] . ')' : '' }} — Adat {{ ['sunda' => 'Sunda', 'minang' => 'Minang', 'nusantara' => 'Nusantara', 'modern' => 'Modern', 'floral' => 'Elegan & Floral', 'islami' => 'Islami', 'dual' => 'Akad & Resepsi', 'intl' => 'Internasional'][$tj['culture'] ?? 'jawa'] ?? 'Jawa' }} {{ $tj['sub'] }}
                </span>
            @endif
        </div>
    </div>

    <!-- ============ Z-10 : invitation ============ -->
    <main class="relative z-10 max-w-[430px] mx-auto pb-32">

        @php
            $ico = [
                'cal' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 11h18"/></svg>',
                'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>',
                'pin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/></svg>',
                'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:20px;height:20px"><circle cx="12" cy="12" r="9"/><path d="M8 12.5l2.6 2.6L16 9.6"/></svg>',
                'spark' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.6 2.6M15.4 15.4L18 18M18 6l-2.6 2.6M8.6 15.4L6 18"/></svg>',
                'rings' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:20px;height:20px"><circle cx="9.2" cy="14.5" r="5.2"/><circle cx="14.8" cy="14.5" r="5.2"/><path d="M9.2 9.3l2.8-4 2.8 4"/></svg>',
                'compass' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="width:18px;height:18px"><circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2 5-5 2 2-5z"/></svg>',
            ];
        @endphp

        <!-- 2. Salam & Doa (gaya Stitch: kartu ayat) -->
        <section id="salam" class="px-5 pt-10 pb-4 text-center reveal">
            <div class="sway w-fit mx-auto">
                @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-10 h-9'])
            </div>
            @if(($tj['culture'] ?? 'jawa') === 'islami')
                <p class="mt-4" style="font-family:'Amiri', 'Traditional Arabic', serif;font-size:1.6rem;line-height:2;color:var(--ink);direction:rtl;">
                    بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
                </p>
                <p class="text-[11px] mt-1" style="color:var(--soft);letter-spacing:.08em;">Bismillahirrahmanirrahim</p>
            @endif
            <p class="serif text-[1.3rem] mt-3" style="color:var(--ink);">Assalamu&rsquo;alaikum Warahmatullahi Wabarakatuh</p>
            <p class="text-[15px] leading-relaxed mt-3" style="color:var(--soft);">
                Dengan memohon rahmat dan karunia Tuhan Yang Maha Esa, melalui undangan ini kami sekeluarga
                mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara pernikahan putra-putri kami.
            </p>

            <div class="scard mt-6 px-5 py-6">
                <div class="mx-auto mb-3" style="color:var(--accent-ink);">{!! $ico['spark'] !!}</div>
                @if(($tj['culture'] ?? 'jawa') === 'islami')
                    <p class="serif italic text-[16px] leading-relaxed" style="color:var(--ink);">
                        &ldquo;Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu
                        dari jenismu sendiri, agar kamu merasa tenteram, dan Dia menjadikan di antaramu rasa kasih dan sayang.&rdquo;
                    </p>
                    <span class="label mt-3 block" style="color:var(--accent-ink);">QS. Ar-Rum: 21</span>
                @else
                    <p class="serif italic text-[17px] leading-relaxed" style="color:var(--ink);">
                        &ldquo;{{ $couple->quote ?? 'Semoga Tuhan senantiasa melimpahkan berkah, keselamatan, dan ketenangan dalam membangun rumah tangga.' }}&rdquo;
                    </p>
                    <span class="label mt-3 block" style="color:var(--accent-ink);">{{ $tj['motif'] }}</span>
                @endif
            </div>
        </section>

        <!-- 3. Countdown (gaya Stitch: kartu gelap) -->
        <section id="hitung" class="px-5 py-6 reveal">
            <div class="rounded-2xl px-5 py-6 text-center" style="background:var(--deep);border-top:2px solid color-mix(in srgb, var(--accent-2) 65%, transparent);box-shadow:0 14px 34px color-mix(in srgb, var(--deep) 32%, transparent);">
                <span class="label" style="color:var(--accent-2);">Menghitung Hari Bahagia</span>
                <h3 class="serif text-[1.05rem] mt-1.5 mb-4" style="color:rgba(255,255,255,.92);">{{ $dateLong }}</h3>
                <div class="grid grid-cols-4 gap-1.5">
                    @foreach([['cdDays', 'Hari'], ['cdHours', 'Jam'], ['cdMinutes', 'Menit'], ['cdSeconds', 'Detik']] as [$id, $lbl])
                        <div class="rounded-lg px-1 py-2.5" style="background:rgba(255,255,255,.10);min-width:0;">
                            <span id="{{ $id }}" class="serif block leading-none"
                                  style="color:#fff;font-size:clamp(1.1rem,5.4vw,1.7rem);font-variant-numeric:tabular-nums;letter-spacing:-.01em;">00</span>
                            <span class="label mt-1.5 block" style="color:rgba(255,255,255,.82);font-size:.58rem;letter-spacing:.1em;">{{ $lbl }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 4. Mempelai (gaya Stitch) -->
        <section id="mempelai" class="px-5 py-8 reveal">
            <div class="text-center">
                <span class="label block" style="color:var(--accent-ink);">Dua Jiwa Satu Rasa</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);"><span class="i18n"><span class="id">Kedua Mempelai</span><span class="en">The Couple</span></span></h2>
                <p class="text-[14px] mt-2 mx-auto" style="color:var(--soft);max-width:19rem;">
                    Dengan memohon ridho dan rahmat Tuhan Yang Maha Esa, kami bermaksud melangsungkan
                    akad pernikahan putra-putri kami:
                </p>
            </div>

            <div class="scard mt-5 px-5 py-6 text-center">
                <div class="hero-{{ $tj['hero'] }} mx-auto w-[132px] h-[168px]" style="border:1px solid color-mix(in srgb, var(--accent) 45%, transparent);">
                    <img id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_fullname }}" class="w-full h-full object-cover">
                </div>
                <span class="label block mt-4" style="color:var(--accent-ink);">Calon Pengantin Pria</span>
                <h3 class="serif text-[1.3rem] mt-1" style="color:var(--ink);">{{ $couple->groom_fullname }}</h3>
                <p class="text-[14px] mt-2 leading-relaxed" style="color:var(--soft);">
                    {{ $couple->groom_birth_order ?? 'Putra' }} dari<br>
                    <span class="font-semibold" id="previewGroomParentsText" style="color:var(--ink);">{{ $groomParents }}</span>
                </p>
                @if(!empty($couple->groom_city))
                    <span class="inline-flex items-center gap-1 mt-2 label" style="color:var(--accent-ink);">
                        <span style="display:inline-flex;width:14px;height:14px;">{!! $ico['pin'] !!}</span>{{ $couple->groom_city }}
                    </span>
                @endif
                @if(!empty($couple->groom_instagram))
                    <a href="https://instagram.com/{{ ltrim($couple->groom_instagram, '@') }}" target="_blank" rel="noopener"
                       class="pill mt-3 inline-block">@ {{ ltrim($couple->groom_instagram, '@') }}</a>
                @endif
            </div>

            <div class="crest-connector my-5">
                <span class="flourish"></span>
                <div class="crest-seal">
                    @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-10 h-9'])
                    <b class="serif">{{ $initials }}</b>
                </div>
                <span class="flourish"></span>
            </div>

            <div class="scard px-5 py-6 text-center">
                <div class="hero-{{ $tj['hero'] }} mx-auto w-[132px] h-[168px]" style="border:1px solid color-mix(in srgb, var(--accent) 45%, transparent);">
                    <img id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_fullname }}" class="w-full h-full object-cover">
                </div>
                <span class="label block mt-4" style="color:var(--accent-ink);">Calon Pengantin Wanita</span>
                <h3 class="serif text-[1.3rem] mt-1" style="color:var(--ink);">{{ $couple->bride_fullname }}</h3>
                <p class="text-[14px] mt-2 leading-relaxed" style="color:var(--soft);">
                    {{ $couple->bride_birth_order ?? 'Putri' }} dari<br>
                    <span class="font-semibold" id="previewBrideParentsText" style="color:var(--ink);">{{ $brideParents }}</span>
                </p>
                @if(!empty($couple->bride_city))
                    <span class="inline-flex items-center gap-1 mt-2 label" style="color:var(--accent-ink);">
                        <span style="display:inline-flex;width:14px;height:14px;">{!! $ico['pin'] !!}</span>{{ $couple->bride_city }}
                    </span>
                @endif
                @if(!empty($couple->bride_instagram))
                    <a href="https://instagram.com/{{ ltrim($couple->bride_instagram, '@') }}" target="_blank" rel="noopener"
                       class="pill mt-3 inline-block">@ {{ ltrim($couple->bride_instagram, '@') }}</a>
                @endif
            </div>
        </section>

        <!-- 5. Cerita Cinta -->
        @if(!empty($story))
        <section id="cerita" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">Perjalanan Kami</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);"><span class="i18n"><span class="id">Cerita Cinta</span><span class="en">Our Story</span></span></h2>
            </div>
            <div class="story-timeline">
                @foreach($story as $i => $s)
                    <article class="story-item">
                        <span class="story-marker"><b>{{ sprintf('%02d', $i + 1) }}</b></span>
                        <div class="story-card">
                            <span class="story-year">{{ $s['year'] }}</span>
                            <h3 class="serif text-[1.12rem] mt-1" style="color:var(--ink);">{{ $s['title'] }}</h3>
                            <p class="text-[13.5px] leading-relaxed mt-1.5" style="color:var(--soft);">{{ $s['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
        @endif

        <!-- 6. Rangkaian Acara (gaya Stitch: Akad & Resepsi terpisah) -->
        <section id="acara" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">Susunan Acara</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);"><span class="i18n"><span class="id">Rangkaian Acara</span><span class="en">Event Schedule</span></span></h2>
            </div>

            <div class="space-y-4">
                @php
                    $eventList = $events->count() ? $events : collect([
                        (object) ['title' => 'Akad Nikah', 'date' => null, 'start_time' => '08.00', 'end_time' => '10.00', 'venue_name' => null, 'address' => null],
                        (object) ['title' => 'Resepsi Pernikahan', 'date' => null, 'start_time' => '11.00', 'end_time' => '14.00', 'venue_name' => null, 'address' => null],
                    ]);
                @endphp
                @foreach($eventList as $ev)
                    @php
                        $isAkad = $loop->first;
                        $evStart = trim(str_replace('WIB', '', $ev->start_time ?? '08.00'));
                        $evEnd = trim(str_replace('WIB', '', $ev->end_time ?? 'Selesai'));
                        $evDate = !empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $dateLong;
                    @endphp
                    <article class="scard px-5 py-5">
                        <div class="flex items-start justify-between gap-2 flex-wrap">
                            <div class="flex items-center gap-2">
                                <span style="color:var(--accent-ink);display:inline-flex;">{!! $isAkad ? $ico['rings'] : $ico['spark'] !!}</span>
                                <h3 class="serif text-[1.15rem]" style="color:var(--ink);">{{ $ev->title ?? 'Acara' }}</h3>
                            </div>
                            <span class="shrink-0 px-2.5 py-1 rounded-full text-[9px] font-bold uppercase tracking-wider"
                                  style="background:{{ $isAkad ? 'var(--deep)' : 'color-mix(in srgb, var(--accent) 22%, var(--surface))' }};color:{{ $isAkad ? 'var(--surface)' : 'var(--accent-ink)' }};">
                                {{ $isAkad ? 'Keluarga & Kerabat' : 'Tamu Undangan' }}
                            </span>
                        </div>
                        <div class="mt-3 space-y-1.5">
                            <div class="flex items-center gap-2 text-[14px]">
                                <span style="color:var(--accent-ink);display:inline-flex;">{!! $ico['cal'] !!}</span>
                                <b style="color:var(--ink);">{{ $evDate }}</b>
                            </div>
                            <div class="flex items-center gap-2 text-[14px]" style="color:var(--soft);">
                                <span style="color:var(--accent-ink);display:inline-flex;">{!! $ico['clock'] !!}</span>
                                <span>Pukul {{ $evStart }} &ndash; {{ $evEnd }} WIB</span>
                            </div>
                            <div class="flex items-start gap-2 text-[14px]" style="color:var(--soft);">
                                <span style="color:var(--accent-ink);display:inline-flex;margin-top:2px;">{!! $ico['pin'] !!}</span>
                                @php
                                    $evVenue = $ev->venue_name ?? $venueName;
                                    $evAddr = $ev->address ?? '';
                                    $evParts = array_filter(array_map('trim', explode(',', $evAddr)), function ($part) use ($evVenue) {
                                        return $part !== '' && ! str_contains(strtolower($evVenue), strtolower($part));
                                    });
                                    $evAddrClean = implode(', ', $evParts);
                                @endphp
                                <span>{{ $evVenue }}@if($evAddrClean !== ''), {{ $evAddrClean }}@endif</span>
                            </div>
                        </div>
                        <a href="{{ $calendarUrl }}" target="_blank" rel="noopener"
                           class="mt-4 w-full min-h-[44px] rounded-lg flex items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-wider"
                           style="background:color-mix(in srgb, var(--ink) 14%, var(--surface));color:var(--ink);border:1px solid color-mix(in srgb, var(--accent) 34%, transparent);">
                            <span style="display:inline-flex;">{!! $ico['cal'] !!}</span>
                            Simpan {{ $isAkad ? 'Akad' : 'Resepsi' }} ke Kalender
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- 7. Petunjuk Arah & Peta (gaya Stitch) -->
        <section id="lokasi" class="px-5 py-8 reveal">
            <div class="text-center mb-5">
                <span class="label block" style="color:var(--accent-ink);">Petunjuk Arah</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);"><span class="i18n"><span class="id">Lokasi Acara</span><span class="en">Venue</span></span></h2>
            </div>
            <div class="scard overflow-hidden">
                @php
                    $mapQuery = trim(($venueName ?? '') . ' ' . ($venueAddress ?? ''));
                    $mapEmbed = 'https://www.google.com/maps?q=' . urlencode($mapQuery !== '' ? $mapQuery : ($venueName ?? 'Indonesia')) . '&z=16&output=embed';
                @endphp
                <div class="relative w-full h-44 overflow-hidden" style="background:color-mix(in srgb, var(--deep) 10%, var(--bg));">
                    <iframe
                        src="{{ $mapEmbed }}"
                        title="Peta lokasi {{ $venueName }}"
                        class="w-full h-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen></iframe>
                </div>
                <div class="px-5 py-5">
                    <h4 class="serif text-[1.1rem]" style="color:var(--ink);">{{ $venueName }}</h4>
                    <p class="text-[14px] mt-1.5 leading-relaxed" style="color:var(--soft);">{{ $venueAddress }}</p>
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener"
                       class="mt-4 w-full min-h-[46px] rounded-lg flex items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-wider"
                       style="background:var(--deep);color:var(--accent-2);">
                        <span style="display:inline-flex;">{!! $ico['compass'] !!}</span>
                        Petunjuk Google Maps
                    </a>
                </div>
            </div>
        </section>

        @if(($tj['culture'] ?? 'jawa') === 'dual' && $events->count() > 1)
            @php $akad = $events->first(); @endphp
            <section id="lokasi-akad" class="px-5 py-8 reveal">
                <div class="text-center mb-5">
                    <span class="label block" style="color:var(--accent-ink);">Lokasi Akad</span>
                    <h2 class="serif text-[1.7rem] mt-1" style="color:var(--ink);"><span class="i18n"><span class="id">Akad Nikah</span><span class="en">Akad Ceremony</span></span></h2>
                </div>
                <div class="scard overflow-hidden">
                    @php
                        $akadQuery = trim(($akad->venue_name ?? $venueName) . ' ' . ($akad->address ?? ''));
                        $akadEmbed = 'https://www.google.com/maps?q=' . urlencode($akadQuery) . '&z=16&output=embed';
                    @endphp
                    <div class="relative w-full h-40 overflow-hidden" style="background:color-mix(in srgb, var(--deep) 10%, var(--bg));">
                        <iframe src="{{ $akadEmbed }}" title="Peta lokasi akad" class="w-full h-full border-0"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                    </div>
                    <div class="px-5 py-5">
                        <h4 class="serif text-[1.05rem]" style="color:var(--ink);">{{ $akad->venue_name ?? $venueName }}</h4>
                        <p class="text-[14px] mt-1.5 leading-relaxed" style="color:var(--soft);">{{ $akad->address ?? $venueAddress }}</p>
                        <a href="{{ $akad->maps_url ?? $mapsUrl }}" target="_blank" rel="noopener"
                           class="mt-4 w-full min-h-[46px] rounded-lg flex items-center justify-center gap-2 text-[11px] font-bold uppercase tracking-wider"
                           style="background:var(--accent);color:var(--on-accent);">
                            Petunjuk ke Akad
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <!-- 8. Galeri (bento) -->
        <section id="galeri" class="px-5 pt-10 pb-20 reveal">
            <div class="text-center mb-5">
                @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-10 h-9 mx-auto'])
                <span class="label block mt-2" style="color: var(--accent-ink);">Dokumentasi</span>
                <h2 class="serif text-[1.7rem] mt-1" style="color: var(--ink);">Galeri</h2>
                <div class="sec-rule"><span></span><i></i><span></span></div>
            </div>

            @include('templates.partials.gallery', [
                'tj' => $tj, 'heroShot' => $heroShot, 'floatShots' => $floatShots,
                'extraShots' => $extraShots, 'shot' => $shot, 'couple' => $couple,
            ])
        </section>

        <!-- 9. RSVP -->
        <section id="rsvp" class="px-5 py-10 reveal">
            <div class="card p-6">
                @include('templates.partials.adat-jawa-corners')
                <div class="text-center mb-5">
                    @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-9 h-8 mx-auto'])
                    <span class="label block mt-2" style="color: var(--accent-ink);">Presensi</span>
                    <h2 class="serif text-[1.6rem] mt-1" style="color: var(--ink);"><span class="i18n"><span class="id">Konfirmasi Kehadiran</span><span class="en">RSVP</span></span></h2>
                    <div class="sec-rule"><span></span><i></i><span></span></div>
                </div>
                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3">
                    @csrf
                    @if(!empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
                    @if(!empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
                    <input type="hidden" name="category" value="Tamu Undangan">
                    <input type="hidden" name="message" value="Konfirmasi kehadiran melalui formulir RSVP.">

                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap Tamu" class="field">

                    @if(($tj['culture'] ?? 'jawa') === 'dual')
                        <label class="block text-left">
                            <span class="label block mb-1" style="color:var(--accent-ink);">Konfirmasi per Acara</span>
                            <select name="attendance" class="field">
                                <option value="hadir_akad">Hadir di Akad</option>
                                <option value="hadir_resepsi">Hadir di Resepsi</option>
                                <option value="hadir_keduanya" selected>Hadir di Keduanya</option>
                                <option value="tidak_hadir">Berhalangan</option>
                            </select>
                        </label>
                    @else
                        <div class="grid grid-cols-2 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="attendance" value="hadir" class="peer sr-only" checked>
                                <span class="toggle-card"><span class="ic">✓</span><span class="txt">Hadir</span></span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="attendance" value="tidak_hadir" class="peer sr-only">
                                <span class="toggle-card"><span class="ic">✕</span><span class="txt">Berhalangan</span></span>
                            </label>
                        </div>
                    @endif

                    <label class="block">
                        <span class="label block mb-1.5" style="color:var(--accent-ink);">Jumlah Orang yang Hadir</span>
                        <input type="number" name="guest_count" id="guestCountInput" class="field field-num"
                               value="1" min="1" max="20" step="1" inputmode="numeric" pattern="[0-9]*"
                               placeholder="1" autocomplete="off" required>
                    </label>

                    <script>
                        (function () {
                            const input = document.getElementById('guestCountInput');
                            if (!input) return;
                            const radios = document.querySelectorAll('input[name="attendance"]');
                            const sync = () => {
                                const chosen = document.querySelector('input[name="attendance"]:checked');
                                const absent = chosen && chosen.value === 'tidak_hadir';
                                input.disabled = absent;
                                input.style.opacity = absent ? '.5' : '1';
                                if (!absent && (!input.value || +input.value < 1)) input.value = '1';
                            };
                            radios.forEach(r => r.addEventListener('change', sync));
                            input.addEventListener('input', () => {
                                input.value = input.value.replace(/[^0-9]/g, '').slice(0, 2);
                                if (input.value !== '' && +input.value > 20) input.value = '20';
                            });
                            sync();
                        })();
                    </script>

                    <button type="submit" class="shimmer-btn w-full min-h-[48px] py-3.5 text-[11px] font-bold uppercase tracking-[0.18em]"
                            style="background: var(--deep); border:1px solid var(--accent); border-radius:10px; color: var(--accent-2);">
                        Kirim Konfirmasi RSVP
                    </button>
                </form>
            </div>
        </section>

        @include('templates.partials.guest-pass')

        <!-- 10. Ucapan & Doa -->
        <section id="ucapan" class="px-5 py-10 reveal">
            <div class="card p-6">
                @include('templates.partials.adat-jawa-corners')
                <div class="text-center mb-5">
                    @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-9 h-8 mx-auto'])
                    <span class="label block mt-2" style="color: var(--accent-ink);">Buku Tamu</span>
                    <h2 class="serif text-[1.6rem] mt-1" style="color: var(--ink);"><span class="i18n"><span class="id">Ucapan &amp; Doa</span><span class="en">Wishes &amp; Prayers</span></span></h2>
                    <div class="sec-rule"><span></span><i></i><span></span></div>
                </div>

                <form action="{{ route('invitation.wish') }}" method="POST" class="space-y-3 mb-6">
                    @csrf
                    @if(!empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
                    @if(!empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Anda" class="field">
                    <textarea name="message" rows="3" required placeholder="Tulis ucapan dan doa restu untuk kedua mempelai..." class="field"></textarea>
                    <button type="submit" class="w-full min-h-[48px] py-3 text-[11px] font-bold uppercase tracking-[0.18em]"
                            style="border:1px solid var(--accent); color: var(--accent-ink); border-radius:10px;">
                        Kirim Ucapan
                    </button>
                </form>

                <div class="guestbook-feed space-y-3">
                    @forelse($wishes as $w)
                        <div class="note-card">
                            <div class="flex items-center gap-2">
                                <span class="avatar-initial">{{ strtoupper(substr($w->name ?? 'T', 0, 1)) }}</span>
                                <div class="min-w-0 flex-1">
                                    <b class="serif text-[15px] block truncate" style="color: var(--ink);">{{ $w->name }}</b>
                                    <span class="text-[11px]" style="color: var(--soft);">
                                        {{ !empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->locale('id')->diffForHumans() : 'Baru saja' }}
                                    </span>
                                </div>
                                @if(!empty($w->attendance) && in_array($w->attendance, ['hadir', 'Hadir']))
                                    <span class="badge-hadir">✓ Hadir</span>
                                @endif
                            </div>
                            <p class="text-[15px] mt-2 leading-relaxed" style="color: var(--soft);">{{ $w->message }}</p>
                        </div>
                    @empty
                        <p class="text-center text-[15px] py-4" style="color: var(--soft);">Belum ada ucapan. Jadilah yang pertama memberi doa restu.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 11. Tanda Kasih / Kartu ATM Metalik (#section-digital-gift) -->
        @include('templates.partials.digital-gift')

        <!-- 12. Penutup (mengikuti layar Stitch: ornamen → terima kasih → kami yang berbahagia → brand) -->
        <section id="penutup" class="px-5 pt-10 pb-12 text-center reveal">
            <div class="sway w-fit mx-auto">
                @include('templates.partials.adat-' . ($tj['culture'] ?? 'jawa') . '-crest', ['cls' => 'w-12 h-10'])
            </div>

            @php
                $thanks = match ($tj['culture'] ?? 'jawa') {
                    'jawa' => 'Matur Nuwun',
                    'sunda' => 'Hatur Nuhun',
                    'minang' => 'Tarimo Kasih',
                    'nusantara' => 'Terima Kasih',
                    default => null,
                };
            @endphp
            @if($thanks)
                <span class="label block mt-4" style="color:var(--accent-ink);letter-spacing:.22em;">{{ $thanks }}</span>
            @endif
            <h2 class="serif italic text-[1.55rem] {{ $thanks ? 'mt-1' : 'mt-4' }}" style="color:var(--ink);">
                <span class="i18n"><span class="id">Terima Kasih</span><span class="en">Thank You</span></span>
            </h2>
            <p class="text-[15px] leading-relaxed mt-3 mx-auto" style="color:var(--soft);max-width:20rem;">
                <span class="i18n"><span class="id">Merupakan suatu kebahagiaan dan kehormatan bagi kami atas kehadiran serta doa restu Bapak/Ibu/Saudara/i.</span><span class="en">It is a joy and an honour for us to receive your presence and blessings.</span></span>
            </p>

            <div class="mx-auto mt-6" style="width:48px;height:4px;background:var(--accent);opacity:.85;border-radius:999px;"></div>

            <span class="label block mt-5" style="color:var(--accent-ink);">
                <span class="i18n"><span class="id">Kami yang Berbahagia</span><span class="en">With Warm Regards</span></span>
            </span>
            <p class="serif text-[1.35rem] mt-2" style="color:var(--ink);">{{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</p>
            <p class="text-[12px] mt-2 leading-relaxed mx-auto" style="color:var(--soft);max-width:18rem;">
                <span class="i18n"><span class="id">Beserta Seluruh Keluarga Besar</span><span class="en">Together with Our Beloved Families</span></span>
            </p>

            <div class="mt-7 flex flex-col items-center gap-1">
                <span class="label" style="color:var(--soft);letter-spacing:.14em;">
                    @php
                        $brandLine = match ($tj['culture'] ?? 'jawa') {
                            'sunda' => 'Bespoke Sundanese Invitation',
                            'minang' => 'Bespoke Minang Invitation',
                            'nusantara' => 'Bespoke Nusantara Invitation',
                            'modern' => 'Bespoke Modern Invitation',
                            'floral' => 'Bespoke Floral Invitation',
                            'islami' => 'Bespoke Islamic Invitation',
                            'dual' => 'Bespoke Dual Ceremony Invitation',
                            'intl' => 'Bespoke International Invitation',
                            default => 'Bespoke Javanese Invitation',
                        };
                    @endphp
                    {{ $brandLine }} &mdash; <b style="color:var(--accent-ink);">D&rsquo;Karsa Heritage</b>
                </span>
                <span class="text-[10px] mt-1" style="color:var(--soft);">&copy; {{ date('Y') }} D&rsquo;Karsa. All Rights Reserved.</span>
                <span class="text-[10px] mt-0.5" style="color:var(--soft);opacity:.85;">Designed with Love by D&rsquo;Karsa</span>
            </div>
        </section>
    </main>

    <!-- ============ Z-55 : petunjuk gerbang ============ -->
    <div id="gateHint" class="gate-hint" aria-live="polite">
        <span class="gate-hint-label">Geser ke bawah untuk membuka undangan</span>
        <span class="chev" aria-hidden="true">⌄</span>
        <button type="button" onclick="skipGate()">Buka sekarang</button>
    </div>

    <!-- ============ Z-50 : persistent HUD ============ -->
    <nav id="mainDock" class="fixed bottom-0 inset-x-0 z-50 mx-auto max-w-[430px] px-3 pb-3">
        <div class="dock-bar">
            @foreach([
                ['#mempelai', 'Mempelai', 'Couple', 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM2 20c0-3.3 3.1-6 7-6s7 2.7 7 6M16 20c0-2.7 2-5 4.5-5.7'],
                ['#acara', 'Acara', 'Events', 'M4 7h16v13H4zM8 3v4M16 3v4M4 11h16'],
                ['#galeri', 'Galeri', 'Gallery', 'M3 5h18v14H3zM3 15l5-5 4 4 3-3 6 6'],
                ['#rsvp', 'RSVP & QR', 'RSVP & QR', 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm-3.5 9.2 2.4 2.4 4.6-4.8'],
                ['#ucapan', 'Doa', 'Wishes', 'M12 20s-7-4.4-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.6-7 9-7 9Z'],
            ] as [$href, $lbl, $en, $path])
                <a href="{{ $href }}" class="dock-link" data-nav="{{ ltrim($href, '#') }}">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="{{ $path }}"/>
                    </svg>
                    <span class="dock-label"><span class="i18n"><span class="id">{{ $lbl }}</span><span class="en">{{ $en }}</span></span></span>
                </a>
            @endforeach
        </div>
    </nav>

    <button type="button" id="audioPill" onclick="toggleAudio()"
            class="fixed bottom-[86px] right-4 z-50 w-[52px] h-[52px] rounded-full flex items-center justify-center"
            style="background: var(--deep); border:1px solid var(--accent); color: var(--accent-2); box-shadow: 0 12px 28px -10px rgba(0,0,0,.6);"
            title="Musik pengiring" aria-label="Putar atau jeda musik" aria-pressed="false">
        <svg id="icoPlay" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
        <svg id="icoPause" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><rect x="6" y="5" width="4" height="14" rx="1"/><rect x="14" y="5" width="4" height="14" rx="1"/></svg>
    </button>

    <!-- Lightbox -->
    <div id="lightboxModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4" style="background: rgba(0,0,0,.92);">
        <button type="button" onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <img id="lightboxImage" src="" alt="Foto" class="max-w-full" style="border-radius:10px; border:1px solid var(--accent);">
    </div>

    <script>
        /* ---------- Opening choreography (3 state) ---------- */
        // Gerbang selalu dianimasikan (bukan dilewati) — hanya ornamen dekoratif yang ikut aturan reduced-motion.
        const GATE_TRAVEL = 720;
        // Dibaca ulang setiap gestur supaya sakelar tier di dock langsung berlaku tanpa reload.
        function gateTier() { return document.documentElement.dataset.tier || 'eksklusif'; }
        let gateOpen = false;
        let gateP = 0;
        let gateUnlocked = false;
        let gatePhase = 'intro';   // intro | open | close
        let gateDir = 1;           // +1 = scroll turun membuka, -1 = scroll naik membuka (tutup di ujung bawah)
        let gesturePx = 0;

        // Layar terkunci: isi undangan tidak boleh bergerak selama gerbang menutup.
        function lockScrollKeep() {
            document.documentElement.style.overflow = 'clip';
            document.body.style.overflowY = 'hidden';
        }
        function lockScroll() {
            window.scrollTo(0, 0);
            lockScrollKeep();
        }
        function unlockScroll() {
            document.documentElement.style.overflow = '';
            document.body.style.overflowY = 'auto';
        }
        lockScroll();

        let gateTarget = 0, gateShown = 0, gateRaf = null;

        function applyGate(p) {
            // easing halus + sedikit "napas" saat hampir terbuka
            // linear supaya gerak mengikuti gestur; hanya ujung akhir yang di-ease-out
            const e = p < 0.86 ? p : 0.86 + (1 - Math.pow(1 - (p - 0.86) / 0.14, 2)) * 0.14;
            // pintu 3D: engsel di tepi luar, ayun 96° seperti pintu asli (prototype Stitch)
            const door = 74 * e;            // berhenti di 74° supaya daun pintu tetap terlihat
            const scale = 1 - 0.02 * e;
            const shadowX = 25 * e;
            const shadowA = (0.6 * e).toFixed(2);
            const left = document.getElementById('gateWingLeft');
            const right = document.getElementById('gateWingRight');
            // veil menutup penuh sampai gerbang hampir habis, lalu silang-tindih dengan konten
            const veiled = p < 0.90 ? 1 : Math.max(0, 1 - (p - 0.90) / 0.10);
            const veil = document.getElementById('gateVeil');
            if (veil) veil.style.opacity = String(veiled);
            const mainClear = p < 0.90 ? 0 : Math.min(1, (p - 0.90) / 0.10);
            const fade = p > 0.88 ? Math.max(0, 1 - (p - 0.88) / 0.12) : 1;
            if (left) {
                left.style.transform = gateTier() === 'premium'
                    ? `translate3d(${-82 * e}%,0,0)`
                    : `rotateY(${-door}deg) scale(${scale})`;
                left.style.boxShadow = gateTier() === 'premium' ? 'none' : `${shadowX}px 0 40px -10px rgba(0,0,0,${shadowA})`;
                left.style.opacity = String(fade);
            }
            if (right) {
                right.style.transform = gateTier() === 'premium'
                    ? `translate3d(${82 * e}%,0,0)`
                    : `rotateY(${door}deg) scale(${scale})`;
                right.style.boxShadow = gateTier() === 'premium' ? 'none' : `${-shadowX}px 0 40px -10px rgba(0,0,0,${shadowA})`;
                right.style.opacity = String(fade);
            }
            const layerShade = document.getElementById('gateLayer');
            if (layerShade) layerShade.style.setProperty('--shade', String(0.12 + 0.6 * e));
            document.documentElement.style.setProperty('--gate-clear', String(e));
            document.documentElement.style.setProperty('--gate-main', String(mainClear));
            document.body.classList.toggle('gate-locked', p < 0.995);
            const layer = document.getElementById('gateLayer');
            if (layer) layer.classList.toggle('gate-behind', p >= 0.995);
        }

        function renderGate(p) {
            gateP = Math.min(1, Math.max(0, p));
            gateTarget = gateP;
            gateShown = gateP;
            applyGate(gateP);
            if (gateP >= 0.999) unlockContent();
            const layer = document.getElementById('gateLayer');
            if (layer) layer.classList.toggle('gate-idle', gateP <= 0.001);

            const hint = document.getElementById('gateHint');
            if (hint) {
                hint.classList.toggle('is-on', gateOpen && gateP < 0.995);
                const label = hint.querySelector('.gate-hint-label');
                if (label) {
                    label.textContent = gatePhase === 'close'
                        ? 'Geser untuk membuka undangan'
                        : 'Geser ke bawah untuk membuka undangan';
                }
            }

            if (gateP >= 1) unlockContent();
        }

        function skipGate() {
            gesturePx = GATE_TRAVEL;
            renderGate(1);
        }

        function unlockContent() {
            if (gateUnlocked) return;
            gateUnlocked = true;
            gatePhase = 'open';
            unlockScroll();
            document.body.classList.add('gate-done');
            document.body.classList.add('gate-open');   // bingkai V jadi latar (di belakang konten)
            setTimeout(() => document.body.classList.remove('gate-done'), 1400);
            const hint = document.getElementById('gateHint');
            if (hint) hint.classList.remove('is-on');
            updateDockSpy();
            updateGalleryParallax();
        }

        function pushGateGesture(delta) {
            if (!gateOpen) return false;
            if (gatePhase === 'intro' && window.scrollY !== 0) window.scrollTo(0, 0);
            delta = Math.sign(delta) * Math.min(Math.abs(delta), 135);   // satu gestur tidak boleh meloncat
            gesturePx = Math.max(0, Math.min(GATE_TRAVEL, gesturePx + gateDir * delta));
            renderGate(gesturePx / GATE_TRAVEL);
            return true;
        }

        /* Menutup lagi: saat user mendorong melewati ujung atas atau ujung bawah halaman. */
        function startClosing(delta, dir) {
            if (gatePhase !== 'open') return false;
            gatePhase = 'close';
            document.body.classList.remove('gate-open');
            gateDir = dir;
            gateUnlocked = false;
            gesturePx = GATE_TRAVEL;
            lockScrollKeep();
            pushGateGesture(delta);
            return true;
        }

        function atPageTop() { return window.scrollY <= 0; }
        function atPageBottom() {
            return window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2;
        }

        function openInvitation() {
            const cover = document.getElementById('coverScreen');
            cover.style.opacity = '0';
            cover.style.transform = 'scale(.95)';
            setTimeout(() => { cover.style.display = 'none'; }, 620);

            if (gateTier() === 'basic') {
                // Paket Basic: tanpa kinematika dua daun — sampul datar memudar, isi langsung terbaca.
                const layer = document.getElementById('gateLayer');
                if (layer) layer.classList.add('gate-hidden');
                unlockScroll();
                gateOpen = false;
                gatePhase = 'open';
                gateUnlocked = true;
                document.body.classList.remove('gate-locked');
                document.body.classList.add('gate-open');
                document.documentElement.style.setProperty('--gate-main', '1');
            } else {
                document.getElementById('gateLayer').classList.remove('gate-hidden');
                lockScroll();
                gateOpen = true;
                gatePhase = 'intro';
                gateDir = 1;
                gateUnlocked = false;
                gesturePx = 0;
                renderGate(0);
            }

            const audio = document.getElementById('invitationAudio');
            if (audio) audio.play().catch(() => {});
            const pill = document.getElementById('audioPill');
            if (pill) pill.setAttribute('aria-pressed', 'true');

            revealAll();
            updateDockSpy();
        }

        /* ---------- Gestur gerbang: buka di atas, tutup lagi di ujung atas/bawah ---------- */
        window.addEventListener('wheel', (ev) => {
            if (!gateOpen) return;
            // Normalisasi deltaMode: 0 = pixel, 1 = baris, 2 = halaman.
            const step = ev.deltaMode === 1 ? ev.deltaY * 16 : ev.deltaMode === 2 ? ev.deltaY * 120 : ev.deltaY * 1.9;

            if (gatePhase === 'open') {
                const bottomClose = atPageBottom() && step > 0;
                const topClose = atPageTop() && step < 0;
                if (bottomClose || topClose) {
                    ev.preventDefault();
                    startClosing(step, bottomClose ? -1 : 1);
                }
                return;
            }

            ev.preventDefault();
            pushGateGesture(step);
        }, { passive: false });

        let lastTouchY = 0;
        window.addEventListener('touchstart', (ev) => {
            if (!gateOpen) return;
            lastTouchY = ev.touches[0].clientY;
        }, { passive: true });

        window.addEventListener('touchmove', (ev) => {
            if (!gateOpen) return;
            const delta = lastTouchY - ev.touches[0].clientY;   // > 0 = geser ke atas (scroll turun)
            lastTouchY = ev.touches[0].clientY;

            if (gatePhase === 'open') {
                const bottomClose = atPageBottom() && delta > 6;
                const topClose = atPageTop() && delta < -6;
                if (bottomClose || topClose) {
                    if (ev.cancelable) ev.preventDefault();
                    startClosing(delta, bottomClose ? -1 : 1);
                }
                return;
            }

            if (ev.cancelable) ev.preventDefault();
            pushGateGesture(delta);
        }, { passive: false });

        window.addEventListener('keydown', (ev) => {
            if (!gateOpen) return;
            const down = ['ArrowDown', 'PageDown', ' ', 'Spacebar', 'Enter'].includes(ev.key);
            const up = ['ArrowUp', 'PageUp'].includes(ev.key);
            if (!down && !up) return;

            if (gatePhase === 'open') {
                const bottomClose = atPageBottom() && down;
                const topClose = atPageTop() && up;
                if (bottomClose || topClose) {
                    ev.preventDefault();
                    startClosing(down ? 140 : -140, bottomClose ? -1 : 1);
                }
                return;
            }

            ev.preventDefault();
            pushGateGesture(down ? 140 : -140);
        });

        let gateTicking = false;
        window.addEventListener('scroll', () => {
            if (gateTicking) return;
            gateTicking = true;
            requestAnimationFrame(() => {
                updateDockSpy();
                updateGalleryParallax();
                gateTicking = false;
            });
        }, { passive: true });

        /* ---------- Dock spy ---------- */
        const dockLinks = Array.from(document.querySelectorAll('.dock-link'));
        const dockTargets = dockLinks.map((a) => document.querySelector(a.getAttribute('href'))).filter(Boolean);

        // Selama gerbang menutup, tab dock membuka gerbang dulu baru melompat.
        dockLinks.forEach((link) => {
            link.addEventListener('click', (ev) => {
                if (!gateOpen || gatePhase === 'open') return;
                ev.preventDefault();
                gesturePx = GATE_TRAVEL;
                renderGate(1);
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

        /* ---------- Toggle bahasa (ID/EN) ---------- */
        const langToggle = document.getElementById('langToggle');
        if (langToggle) {
            langToggle.addEventListener('click', (ev) => {
                const btn = ev.target.closest('button[data-lang]');
                if (!btn) return;
                const lang = btn.dataset.lang;
                document.documentElement.classList.toggle('lang-en', lang === 'en');
                langToggle.querySelectorAll('button[data-lang]').forEach((b) => {
                    const on = b.dataset.lang === lang;
                    b.classList.toggle('is-on', on);
                    b.setAttribute('aria-pressed', on ? 'true' : 'false');
                });
            });
        }



        /* ---------- Countdown ---------- */
        const targetDate = new Date("{{ $targetDate->format('Y-m-d H:i:s') }}").getTime();
        function tick() {
            const diff = targetDate - Date.now();
            const set = (id, v) => { const el = document.getElementById(id); if (el) el.textContent = String(v).padStart(2, '0'); };
            if (diff <= 0) { ['cdDays', 'cdHours', 'cdMinutes', 'cdSeconds'].forEach(id => set(id, 0)); return; }
            set('cdDays', Math.floor(diff / 86400000));
            set('cdHours', Math.floor((diff % 86400000) / 3600000));
            set('cdMinutes', Math.floor((diff % 3600000) / 60000));
            set('cdSeconds', Math.floor((diff % 60000) / 1000));
        }
        setInterval(tick, 1000); tick();

        /* ---------- Audio ---------- */
        function syncAudioUI() {
            const audio = document.getElementById('invitationAudio');
            const playing = !!(audio && !audio.paused);
            const pill = document.getElementById('audioPill');
            if (pill) {
                pill.classList.toggle('is-playing', playing);
                pill.setAttribute('aria-pressed', playing ? 'true' : 'false');
                pill.setAttribute('aria-label', playing ? 'Jeda musik' : 'Putar musik');
                pill.setAttribute('title', playing ? 'Jeda musik' : 'Putar musik');
            }
        }
        function playAudio() {
            const audio = document.getElementById('invitationAudio');
            if (!audio) return;
            audio.play().catch(() => {});
            syncAudioUI();
        }
        function pauseAudio() {
            const audio = document.getElementById('invitationAudio');
            if (!audio) return;
            audio.pause();
            syncAudioUI();
        }
        function toggleAudio() {
            const audio = document.getElementById('invitationAudio');
            if (!audio) return;
            audio.paused ? playAudio() : pauseAudio();
        }

        /* ---------- Utility ---------- */
        function copyText(val, btn) {
            const done = () => {
                const old = btn.textContent;
                btn.textContent = 'Tersalin ✓';
                setTimeout(() => { btn.textContent = old; }, 1800);
            };
            if (navigator.clipboard) navigator.clipboard.writeText(val).then(done).catch(done);
            else done();
        }

        function openLightbox(url) {
            const m = document.getElementById('lightboxModal');
            document.getElementById('lightboxImage').src = url;
            m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeLightbox() {
            const m = document.getElementById('lightboxModal');
            m.classList.add('hidden'); m.classList.remove('flex');
        }

        /* ---------- Reveal ---------- */
        function revealAll() {
            const els = Array.from(document.querySelectorAll('.reveal'));
            if (!els.length) return;

            if (!('IntersectionObserver' in window)) {
                els.forEach(el => el.classList.add('is-visible'));
                return;
            }

            const io = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        e.target.classList.add('is-visible');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.05 });

            els.forEach(el => io.observe(el));

            // Jaring aman: undangan tidak boleh pernah tertinggal tak terlihat.
            setTimeout(() => els.forEach(el => el.classList.add('is-visible')), 1200);
        }
        revealAll();
        updateDockSpy();
        updateGalleryParallax();

        if (new URLSearchParams(window.location.search).get('open') === '1') {
            document.getElementById('coverScreen').style.display = 'none';
            document.getElementById('gateLayer').classList.remove('gate-hidden');
            gateOpen = true;
            gesturePx = GATE_TRAVEL;
            renderGate(1);
            unlockScroll();
        }

        /* ---------- Builder live-preview bridge ---------- */
        const defaultGroomPhoto = "{{ $groomImg }}";
        const defaultBridePhoto = "{{ $brideImg }}";
        const defaultCoverPhoto = "{{ $coverImg }}";
        const defaultGroomParents = @json($groomParents);
        const defaultBrideParents = @json($brideParents);

        function updateGalleryParallax() {
            const cluster = document.querySelector('.gf-cluster');
            if (!cluster) return;
            const rect = cluster.getBoundingClientRect();
            const vh = window.innerHeight || 1;
            const prog = Math.max(0, Math.min(1, (vh - rect.top) / (vh + rect.height)));
            cluster.querySelectorAll('.gf-item').forEach((el) => {
                const speed = parseFloat(el.dataset.speed || '0.22');
                el.style.setProperty('--dy', `${((prog - 0.5) * 96 * speed).toFixed(1)}px`);
            });
        }

        const galleryVariant = '{{ $tj['gallery'] ?? 'collage' }}';
        const gallerySeed = {{ (int) ($tj['num'] ?? 1) % 3 }};

        function galleryMarkup(images) {
            if (galleryVariant === 'mosaic') {
                const cls = ['mo-a', 'mo-b', 'mo-c', 'mo-d', 'mo-e'];
                return `<div class="mo-grid">${images.slice(0, 5).map((u, i) => `
                    <button type="button" class="${cls[i] || 'mo-e'}" onclick="openLightbox('${u}')">
                        <img src="${u}" alt="Foto ${i + 1}">
                    </button>`).join('')}</div>`;
            }
            if (galleryVariant === 'filmstrip') {
                return `<div class="fs-track">${images.map((u, i) => `
                    <button type="button" class="fs-card" onclick="openLightbox('${u}')">
                        <img src="${u}" alt="Foto ${i + 1}">
                    </button>`).join('')}</div>
                    <div class="fs-meta">
                        <span class="fs-count"><b>01</b> / ${String(images.length).padStart(2, '0')}</span>
                        <span class="fs-hint">Geser foto</span>
                    </div>`;
            }
            if (galleryVariant === 'column') {
                return `<div class="col-list">${images.map((u, i) => `
                    <figure class="col-item ${i % 2 === 0 ? 'col-left' : 'col-right'}">
                        <button type="button" onclick="openLightbox('${u}')"><img src="${u}" alt="Foto ${i + 1}"></button>
                        <figcaption>${String(i + 1).padStart(2, '0')}</figcaption>
                    </figure>`).join('')}</div>`;
            }

            const hero = images[0];
            const cells = images.slice(1, 5);
            const rest = images.slice(5);
            return `
                <div class="gf-hero">
                    <button type="button" class="gallery-hero" onclick="openLightbox('${hero}')">
                        <img src="${hero}" alt="Foto utama">
                    </button>
                </div>
                ${cells.length ? `<div class="gf-cluster gf-seed${gallerySeed}">${cells.map((url, i) => `
                    <button type="button" class="gf-item gf-i${i}" data-speed="${[0.22, -0.3, 0.34, -0.18][i % 4]}" onclick="openLightbox('${url}')">
                        <span class="gf-mat"><img src="${url}" alt="Foto ${i + 2}"></span>
                    </button>`).join('')}</div>` : ''}
                ${rest.length ? `<div class="filmstrip mt-6">${rest.map((url, i) => `
                    <button type="button" class="gallery-cell" onclick="openLightbox('${url}')">
                        <img src="${url}" alt="Foto ${i + 6}">
                    </button>`).join('')}</div>` : ''}`;
        }

        function bindGalleryExtras() {
            const track = document.querySelector('.fs-track');
            if (!track || track.dataset.bound) return;
            track.dataset.bound = '1';
            track.addEventListener('scroll', () => {
                const step = track.clientWidth * 0.78;
                const idx = Math.min(track.children.length, Math.round(track.scrollLeft / step) + 1);
                const b = document.querySelector('.fs-count b');
                if (b) b.textContent = String(idx).padStart(2, '0');
            }, { passive: true });
        }

        function renderDynamicGallery(images) {
            const container = document.getElementById('previewGalleryGrid');
            if (!container || !Array.isArray(images) || !images.length) return;
            container.innerHTML = galleryMarkup(images);
            updateGalleryParallax();
            bindGalleryExtras();
        }

        window.addEventListener('message', function (event) {
            const d = event.data; if (!d) return;
            if (d.type === 'UPDATE_PREVIEW_PHOTO' && d.dataUrl) {
                const map = { groom: 'previewGroomPhotoImg', bride: 'previewBridePhotoImg', cover: 'previewCoverPhotoImg' };
                const el = document.getElementById(map[d.target]);
                if (el) el.src = d.dataUrl;
                if (d.target === 'cover') {
                    const bg = document.getElementById('previewCoverBg');
                    if (bg) bg.style.backgroundImage = `url('${d.dataUrl}')`;
                }
            } else if (d.type === 'RESET_PREVIEW_PHOTO') {
                const map = { groom: ['previewGroomPhotoImg', defaultGroomPhoto], bride: ['previewBridePhotoImg', defaultBridePhoto], cover: ['previewCoverPhotoImg', defaultCoverPhoto] };
                const conf = map[d.target];
                if (conf) {
                    const el = document.getElementById(conf[0]);
                    if (el) el.src = d.defaultUrl || conf[1];
                    if (d.target === 'cover') {
                        const bg = document.getElementById('previewCoverBg');
                        if (bg) bg.style.backgroundImage = `url('${d.defaultUrl || conf[1]}')`;
                    }
                }
            } else if (d.type === 'UPDATE_PREVIEW_GALLERY' && Array.isArray(d.images)) {
                renderDynamicGallery(d.images);
            } else if (d.type === 'UPDATE_PREVIEW_STORY' && Array.isArray(d.items)) {
                const wrap = document.querySelector('#cerita .story-timeline');
                const esc = (v) => String(v == null ? '' : v).replace(/[&<>"']/g, (ch) => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));
                if (wrap) {
                    wrap.innerHTML = d.items.map((it, i) => `
                        <article class="story-item">
                            <span class="story-marker"><b>${String(i + 1).padStart(2, '0')}</b></span>
                            <div class="story-card">
                                <span class="story-year">${esc(it.year)}</span>
                                <h3 class="serif text-[1.12rem] mt-1" style="color:var(--ink);">${esc(it.title)}</h3>
                                <p class="text-[13.5px] leading-relaxed mt-1.5" style="color:var(--soft);">${esc(it.text)}</p>
                            </div>
                        </article>`).join('');
                }
            } else if (d.type === 'UPDATE_PREVIEW_PARENTS') {
                const gp = document.getElementById('previewGroomParentsText');
                const bp = document.getElementById('previewBrideParentsText');
                if (gp) gp.textContent = d.groomParents || (d.resetDefault ? defaultGroomParents : gp.textContent);
                if (bp) bp.textContent = d.brideParents || (d.resetDefault ? defaultBrideParents : bp.textContent);
            }
        });

        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch (e) {}
    </script>
@include('templates.partials.preview-media-bridge')
</body>
</html>
