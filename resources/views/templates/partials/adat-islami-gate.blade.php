{{--
    Sayap gerbang V-Angle (Z-30) — Islami (73–80).
    Variant: $tj['gate'] = 'mashrabiya' (kisi kayu bercahaya) | 'dome' (lengkung kubah tersinari).
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
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="isFill{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        {{-- cahaya hangat dari arah belahan --}}
        <radialGradient id="isGlow{{ $uid }}" cx="100%" cy="45%" r="85%">
            <stop offset="0%" stop-color="{{ $gold }}" stop-opacity=".55"/>
            <stop offset="45%" stop-color="{{ $gold }}" stop-opacity=".14"/>
            <stop offset="100%" stop-color="{{ $gold }}" stop-opacity="0"/>
        </radialGradient>
        {{-- kisi mashrabiya: bintang delapan penjuru --}}
        <pattern id="isLattice{{ $uid }}" width="64" height="64" patternUnits="userSpaceOnUse">
            <g fill="none" stroke="{{ $gold }}" stroke-width="1.4" opacity=".55">
                <path d="M32 2 L62 32 L32 62 L2 32 Z"/>
                <path d="M32 10 L54 32 L32 54 L10 32 Z" opacity=".8"/>
                <path d="M10 10 L54 54 M54 10 L10 54" opacity=".45"/>
                <circle cx="32" cy="32" r="4"/>
            </g>
        </pattern>
    </defs>

    <rect width="320" height="900" fill="url(#isFill{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#isGlow{{ $uid }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        @if($tj['gate'] === 'dome')
            {{-- ===== LENGKUNG KUBAH TERSINARI ===== --}}
            <path d="M36 900 V340 Q36 150 168 40 Q300 150 300 340 V900"
                  fill="none" stroke="{{ $gold }}" stroke-width="3.4"/>
            <path d="M54 900 V352 Q54 176 168 72 Q282 176 282 352 V900"
                  fill="none" stroke="{{ $gold }}" stroke-width="1.3" opacity=".7"/>
            {{-- bulan sabit di puncak --}}
            <g transform="translate(168 96)">
                <circle r="15" fill="none" stroke="{{ $gold }}" stroke-width="2"/>
                <circle cx="6" cy="-3" r="12" fill="{{ $ink }}"/>
                <path d="M0 -26 L0 -34" stroke="{{ $gold }}" stroke-width="1.6"/>
            </g>
            {{-- geometri islami di badan kubah --}}
            @foreach(range(0, 4) as $a)
                @php $ay = 230 + $a * 132; @endphp
                <g transform="translate(168 {{ $ay }})" opacity=".7">
                    <path d="M0 -30 L26 0 L0 30 L-26 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.3"/>
                    <path d="M0 -15 L13 0 L0 15 L-13 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1" opacity=".7"/>
                    <circle r="3" fill="{{ $gold }}"/>
                </g>
            @endforeach
        @else
            {{-- ===== PINTU KISI MASHRABIYA ===== --}}
            <rect x="18" y="60" width="286" height="790" fill="url(#isLattice{{ $uid }})"/>
            <rect x="18" y="60" width="286" height="790" fill="none" stroke="{{ $gold }}" stroke-width="3.2"/>
            <rect x="32" y="74" width="258" height="762" fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".75"/>
            {{-- ambang atas berundak --}}
            @foreach(range(0, 2) as $st)
                <path d="M{{ 96 + $st * 16 }} {{ 60 - $st * 12 }} L160 {{ 18 - $st * 12 }} L{{ 224 - $st * 16 }} {{ 60 - $st * 12 }}"
                      fill="none" stroke="{{ $gold }}" stroke-width="2" opacity="{{ 0.9 - $st * 0.2 }}"/>
            @endforeach
            {{-- paku kuningan --}}
            @foreach([[34, 76], [288, 76], [34, 834], [288, 834]] as [$sx, $sy])
                <circle cx="{{ $sx }}" cy="{{ $sy }}" r="4.4" fill="{{ $gold }}" opacity=".9"/>
            @endforeach
            {{-- pegangan & gelang pintu --}}
            <rect x="262" y="440" width="38" height="58" rx="7" fill="none" stroke="{{ $gold }}" stroke-width="1.8"/>
            <circle cx="281" cy="469" r="14" fill="none" stroke="{{ $gold }}" stroke-width="2.4"/>
        @endif

        {{-- strip tepi dalam: bertahan saat gerbang terbuka --}}
        <path d="M298 90 V830" stroke="{{ $gold }}" stroke-width="1.6" opacity=".8"/>
        @foreach(range(0, 8) as $s)
            <g transform="translate(300 {{ 120 + $s * 88 }})">
                <path d="M0 -9 L9 0 L0 9 L-9 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.4" opacity=".85"/>
            </g>
        @endforeach
    </g>

    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
</svg>
