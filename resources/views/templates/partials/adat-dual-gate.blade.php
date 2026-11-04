{{--
    Sayap gerbang V-Angle (Z-30) — Akad & Resepsi (81–85).
    Panel arsitektural dengan emboss "AKAD NIKAH" (kiri) / "RESEPSI" (kanan) + segel lilin di belahan.
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
    $initials = $initials ?? '';
    $label = $side === 'left' ? 'AKAD NIKAH' : 'RESEPSI';
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="duFill{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="60%" stop-color="{{ $ink }}"/>
            <stop offset="100%" stop-color="{{ $deep }}"/>
        </linearGradient>
    </defs>
    <rect width="320" height="900" fill="url(#duFill{{ $uid }})"/>

    {{-- panel bertepi ganda --}}
    <rect x="16" y="16" width="288" height="868" fill="none" stroke="{{ $accent }}" stroke-width="2.4" opacity=".9"/>
    <rect x="30" y="30" width="260" height="840" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>

    {{-- emboss judul acara (tidak dicerminkan agar tetap terbaca) --}}
    <text x="160" y="300" text-anchor="middle" font-family="'EB Garamond', Georgia, serif"
          font-size="34" letter-spacing="6" fill="{{ $accent2 }}" opacity=".18">{{ $label }}</text>
    <text x="160" y="300" text-anchor="middle" font-family="'EB Garamond', Georgia, serif"
          font-size="34" letter-spacing="6" fill="none" stroke="{{ $accent }}" stroke-width=".7" opacity=".55">{{ $label }}</text>
    <path d="M96 330 H224" stroke="{{ $accent }}" stroke-width="1.2" opacity=".6"/>

    {{-- garis arsitektural --}}
    @foreach([70, 830] as $yy)
        <path d="M30 {{ $yy }} H290" stroke="{{ $accent }}" stroke-width="1" opacity=".35"/>
    @endforeach
    @for($g = 0; $g < 9; $g++)
        <path d="M30 {{ 360 + $g * 52 }} H290" stroke="{{ $accent }}" stroke-width=".7" opacity=".12"/>
    @endfor

    {{-- setengah segel lilin di tepi belahan (menyatu saat gerbang tertutup) --}}
    <g transform="translate(316 450)">
        <path d="M0 -34 A 34 34 0 0 0 0 34 Z" fill="{{ $accent }}" opacity=".92"/>
        <path d="M0 -34 A 34 34 0 0 0 0 34" fill="none" stroke="{{ $deep }}" stroke-width="1.4" opacity=".5"/>
        @if($side === 'left' && $initials !== '')
            <text x="-14" y="7" text-anchor="middle" font-family="'EB Garamond', Georgia, serif"
                  font-size="20" fill="{{ $deep }}" opacity=".9">{{ $initials }}</text>
        @endif
    </g>

    {{-- strip tepi dalam --}}
    <path d="M300 60 V840" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>
</svg>
