{{--
    Sayap gerbang V-Angle (Z-30) — Internasional bilingual (86–90).
    Variant: $tj['gate'] = 'editorial' (pintu majalah tipografi besar) | 'fusion' (songket/ukir + bingkai editorial).
--}}
@php
    $side = $side ?? 'left';
    $mirror = $side === 'right';
    $uid = $tj['num'] . '-' . $side;
    $accent = $tj['c']['accent'];
    $accent2 = $tj['c']['accent2'];
    $deep = $tj['c']['deep'];
    $ink = $tj['c']['ink'];
    $surface = $tj['c']['surface'];
    $bgHex = ltrim($tj['c']['bg'], '#');
    $bgLum = (hexdec(substr($bgHex, 0, 2)) * 0.299) + (hexdec(substr($bgHex, 2, 2)) * 0.587) + (hexdec(substr($bgHex, 4, 2)) * 0.114);
    $gold = $bgLum < 90 ? '#E8C87A' : '#C9A050';
    $word = $side === 'left' ? 'THE' : 'WEDDING';
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="edFill{{ $uid }}" x1="0" y1="0" x2="0.4" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        <linearGradient id="edVig{{ $uid }}" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#000" stop-opacity=".32"/>
            <stop offset="55%" stop-color="#000" stop-opacity="0"/>
            <stop offset="100%" stop-color="#000" stop-opacity=".42"/>
        </linearGradient>
        <pattern id="edSongket{{ $uid }}" width="56" height="56" patternUnits="userSpaceOnUse">
            <g fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".3">
                <path d="M28 4 L52 28 L28 52 L4 28 Z"/>
                <path d="M28 16 L40 28 L28 40 L16 28 Z" opacity=".7"/>
            </g>
        </pattern>
    </defs>

    @if($tj['gate'] === 'fusion')
        <rect width="320" height="900" fill="url(#edFill{{ $uid }})"/>
        <rect width="320" height="900" fill="url(#edSongket{{ $uid }})"/>
        {{-- bingkai editorial --}}
        <rect x="14" y="14" width="292" height="872" fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
        {{-- ukiran nusantara di badan sayap --}}
        @foreach(range(0, 4) as $r)
            @php $cy = 180 + $r * 160; @endphp
            <g transform="translate(150 {{ $cy }})" opacity=".8">
                <path d="M-40 20 C -24 -16 0 -26 20 -12 C 32 -4 28 12 12 16" fill="none" stroke="{{ $gold }}" stroke-width="2"/>
                <path d="M40 20 C 24 -16 0 -26 -20 -12 C -32 -4 -28 12 -12 16" fill="none" stroke="{{ $gold }}" stroke-width="2"/>
                <circle r="3" fill="{{ $gold }}"/>
            </g>
        @endforeach
    @else
        <rect width="320" height="900" fill="url(#edFill{{ $uid }})"/>
        {{-- kedalaman panel: bevel dalam + vignette + garis engsel --}}
        <rect x="10" y="10" width="300" height="880" fill="none" stroke="{{ $gold }}" stroke-width="1" opacity=".55"/>
        <rect x="22" y="22" width="276" height="856" fill="none" stroke="{{ $accent2 }}" stroke-width=".8" opacity=".28"/>
        <rect x="0" y="0" width="320" height="900" fill="url(#edVig{{ $uid }})" opacity=".9"/>
        <rect x="288" y="0" width="10" height="900" fill="{{ $gold }}" opacity=".16"/>
        <path d="M286 0 V900" stroke="{{ $gold }}" stroke-width="2" opacity=".55"/>
        <path d="M0 96 H320 M0 804 H320" stroke="{{ $accent2 }}" stroke-width=".9" opacity=".35"/>
        {{-- tipografi editorial besar, vertikal --}}
        <text transform="translate(150 450) rotate(-90)" text-anchor="middle"
              font-family="'EB Garamond', Georgia, serif" font-size="86" letter-spacing="8"
              fill="{{ $accent2 }}" opacity=".92">{{ $word }}</text>
        <text transform="translate(206 450) rotate(-90)" text-anchor="middle"
              font-family="'Plus Jakarta Sans', system-ui, sans-serif" font-size="15" letter-spacing="7"
              fill="{{ $accent }}" opacity=".8">D&rsquo;KARSA &mdash; 2026</text>
        {{-- garis tipis editorial --}}
        <path d="M120 60 V840" stroke="{{ $accent }}" stroke-width="1" opacity=".45"/>
        <path d="M232 60 V840" stroke="{{ $accent }}" stroke-width="1" opacity=".25"/>
    @endif

    {{-- strip tepi dalam --}}
    <path d="M300 60 V840" stroke="{{ $gold }}" stroke-width="1.4" opacity=".6"/>
</svg>
