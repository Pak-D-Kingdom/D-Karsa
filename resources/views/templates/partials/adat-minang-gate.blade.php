{{--
    Sayap gerbang V-Angle (Z-30) — Adat Minang.
    Pintu Rumah Gadang berukir + tirai Songket Minang, beratap gonjong di tepi belahan.
    Parameter: $tj (config tema), $side ('left' | 'right').
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
    // benang emas songket: konstan D'Karsa, lebih terang untuk tema gelap
    $bgHex = ltrim($tj['c']['bg'], '#');
    $bgLum = (hexdec(substr($bgHex, 0, 2)) * 0.299)
        + (hexdec(substr($bgHex, 2, 2)) * 0.587)
        + (hexdec(substr($bgHex, 4, 2)) * 0.114);
    $gold = $bgLum < 90 ? '#E8C87A' : '#C9A050';
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="mnFill{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        {{-- tenun songket: kisi belah ketupat + benang emas --}}
        <pattern id="mnSongket{{ $uid }}" width="56" height="56" patternUnits="userSpaceOnUse">
            <path d="M28 4 L52 28 L28 52 L4 28 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".26"/>
            <path d="M28 14 L42 28 L28 42 L14 28 Z" fill="none" stroke="{{ $gold }}" stroke-width=".9" opacity=".18"/>
            <path d="M0 28 H56 M28 0 V56" stroke="{{ $gold }}" stroke-width=".7" opacity=".10"/>
            <circle cx="28" cy="28" r="1.7" fill="{{ $gold }}" opacity=".3"/>
        </pattern>
        <linearGradient id="mnSheen{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#fff" stop-opacity=".12"/>
            <stop offset="38%" stop-color="#fff" stop-opacity="0"/>
            <stop offset="72%" stop-color="#fff" stop-opacity=".05"/>
            <stop offset="100%" stop-color="#fff" stop-opacity="0"/>
        </linearGradient>
    </defs>

    <rect width="320" height="900" fill="url(#mnFill{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#mnSongket{{ $uid }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        {{-- ===== atap gonjong: menjulang ke tepi belahan, membentuk tanduk saat kedua sayap menutup ===== --}}
        <path d="M-6 250 C 80 236 170 196 246 128 C 276 100 300 62 312 14 L 320 6 L 320 -8 L -6 -8 Z"
              fill="{{ $deep }}" stroke="{{ $gold }}" stroke-width="3" stroke-linejoin="round"/>
        <path d="M-6 250 C 80 236 170 196 246 128 C 276 100 300 62 312 14 L 320 6 L 320 -8 L -6 -8 Z"
              fill="#FFFFFF" opacity=".055"/>
        {{-- pita ridge emas tebal di tepi bawah atap --}}
        <path d="M-6 250 C 80 236 170 196 246 128 C 276 100 300 62 312 14"
              fill="none" stroke="{{ $gold }}" stroke-width="6" opacity=".55" stroke-linecap="round"/>
        <path d="M-6 250 C 80 236 170 196 246 128 C 276 100 300 62 312 14"
              fill="none" stroke="{{ $gold }}" stroke-width="1.6" opacity=".95"/>
        {{-- puncak tanduk yang melengkung keluar --}}
        <path d="M312 14 C 322 24 320 46 306 58 C 300 36 302 22 312 14 Z" fill="{{ $gold }}" opacity=".85"/>
        {{-- garis sirap bertingkat --}}
        @for($r = 0; $r < 6; $r++)
            <path d="M-6 {{ 240 - $r * 24 }} C 82 {{ 226 - $r * 24 }} 172 {{ 186 - $r * 24 }} 248 {{ 118 - $r * 24 }}"
                  fill="none" stroke="{{ $gold }}" stroke-width="{{ $r === 0 ? 1.8 : .9 }}" opacity="{{ $r === 0 ? 0.55 : 0.22 }}"/>
        @endfor
        {{-- sirap gerigi di tepi bawah atap --}}
        @for($t = 0; $t < 14; $t++)
            <path d="M{{ 4 + $t * 23 }} {{ 254 + $t * 0.9 }} l10 16 l10 -18"
                  fill="none" stroke="{{ $gold }}" stroke-width="1.1" opacity=".38"/>
        @endfor

        @if($tj['gate'] === 'songket')
            {{-- ============ TIRAI SONGKET MINANG ============ --}}
            <rect x="12" y="262" width="296" height="620" fill="{{ $surface }}" opacity=".05"/>
            <rect x="14" y="264" width="292" height="596" fill="url(#mnSheen{{ $uid }})"/>
            {{-- lipatan kain: gradasi gelap-terang bergelombang --}}
            <linearGradient id="mnFold{{ $uid }}" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#000" stop-opacity=".5"/>
                <stop offset=".16" stop-color="#000" stop-opacity=".04"/>
                <stop offset=".34" stop-color="#000" stop-opacity=".46"/>
                <stop offset=".5" stop-color="#000" stop-opacity=".04"/>
                <stop offset=".68" stop-color="#000" stop-opacity=".46"/>
                <stop offset=".84" stop-color="#000" stop-opacity=".04"/>
                <stop offset="1" stop-color="#000" stop-opacity=".5"/>
            </linearGradient>
            <rect x="14" y="264" width="292" height="520" fill="url(#mnFold{{ $uid }})"/>
            @foreach(range(0, 3) as $f)
                <path d="M{{ 58 + $f * 68 }} 268 C {{ 44 + $f * 68 }} 440 {{ 70 + $f * 68 }} 640 {{ 52 + $f * 68 }} 860"
                      fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".26"/>
            @endforeach
            {{-- pinggiran songket: pita emas + kisi wajik --}}
            <rect x="14" y="264" width="292" height="616" fill="none" stroke="{{ $gold }}" stroke-width="2.4" opacity=".9"/>
            <rect x="26" y="276" width="268" height="592" fill="none" stroke="{{ $gold }}" stroke-width="1" opacity=".5"/>
            @for($b = 0; $b < 5; $b++)
                @php $top = 292 + $b * 116; @endphp
                <path d="M14 {{ $top }} H306" stroke="{{ $gold }}" stroke-width="1.2" opacity=".45"/>
                @foreach([52, 108, 164, 220, 276] as $cx)
                    <g transform="translate({{ $cx }} {{ $top + 58 }})">
                        <path d="M0 -34 L26 0 L0 34 L-26 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.8" opacity=".9"/>
                        <path d="M0 -20 L15 0 L0 20 L-15 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".65"/>
                        <path d="M0 -8 L6 0 L0 8 L-6 0 Z" fill="{{ $gold }}" opacity=".55"/>
                    </g>
                @endforeach
                <path d="M14 {{ $top + 58 }} H306" stroke="{{ $gold }}" stroke-width=".8" opacity=".28"/>
            @endfor
            {{-- tepi bawah bergelombang + rumbai emas (di atas dock, tetap terlihat) --}}
            <path d="M14 742 q 22 18 44 0 t 44 0 t 44 0 t 44 0 t 44 0 t 44 0 V830 H14 Z"
                  fill="{{ $ink }}" opacity=".94"/>
            <path d="M14 742 q 22 18 44 0 t 44 0 t 44 0 t 44 0 t 44 0 t 44 0"
                  fill="none" stroke="{{ $gold }}" stroke-width="2.2" opacity=".9"/>
            @foreach(range(0, 17) as $f)
                <path d="M{{ 20 + $f * 17 }} {{ 752 + ($f % 2) * 4 }} V{{ 784 + ($f % 3) * 6 }}"
                      stroke="{{ $gold }}" stroke-width="1.7" opacity=".75"/>
                <circle cx="{{ 20 + $f * 17 }}" cy="{{ 786 + ($f % 3) * 6 }}" r="1.9" fill="{{ $gold }}" opacity=".8"/>
            @endforeach
        @else
            {{-- ============ PINTU UKIR RUMAH GADANG ============ --}}
            <rect x="20" y="256" width="280" height="624" fill="{{ $ink }}" opacity=".96" stroke="{{ $gold }}" stroke-width="3"/>
            <rect x="20" y="256" width="280" height="624" fill="url(#mnSongket{{ $uid }})" opacity=".5"/>
            <rect x="34" y="270" width="252" height="596" fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".8"/>
            {{-- jalur songket di puncak pintu --}}
            <rect x="34" y="270" width="252" height="46" fill="{{ $gold }}" opacity=".14"/>
            <rect x="34" y="316" width="252" height="2" fill="{{ $gold }}" opacity=".55"/>

            {{-- papan vertikal --}}
            @foreach(range(1, 6) as $p)
                <path d="M{{ 34 + $p * 36 }} 270 V866" stroke="{{ $ink }}" stroke-width=".8" opacity=".12"/>
            @endforeach

            {{-- ukiran itik pulang petang: deret spiral berulang --}}
            @foreach(range(0, 4) as $row)
                @php $cy = 306 + $row * 112; @endphp
                @foreach([70, 124, 178, 232] as $cx)
                    <g transform="translate({{ $cx }} {{ $cy }})">
                        <path d="M0 -20 L18 4 L0 28 L-18 4 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.4" opacity=".75"/>
                        <path d="M0 -8 L8 4 L0 16 L-8 4 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".6"/>
                    </g>
                @endforeach
            @endforeach
            {{-- ukiran kaluak paku: sulur pakis menggulung --}}
            @foreach([[160, 430], [160, 580], [160, 730]] as [$cx, $cy])
                <g transform="translate({{ $cx }} {{ $cy }})">
                    <path d="M0 34 C 0 6 14 -12 34 -12 C 50 -12 56 -2 50 6 C 45 13 34 10 36 0"
                          fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".92" stroke-linecap="round"/>
                    <path d="M0 34 C 0 6 -14 -12 -34 -12 C -50 -12 -56 -2 -50 6 C -45 13 -34 10 -36 0"
                          fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".92" stroke-linecap="round"/>
                    <circle cx="0" cy="34" r="3" fill="{{ $gold }}" opacity=".8"/>
                </g>
            @endforeach

            {{-- pucuak rabuang: chevron bertumpuk di puncak pintu --}}
            @foreach(range(0, 2) as $c)
                <path d="M{{ 118 + $c * 14 }} {{ 252 + $c * 16 }} L160 {{ 214 + $c * 16 }} L{{ 202 - $c * 14 }} {{ 252 + $c * 16 }}"
                      fill="none" stroke="{{ $accent2 }}" stroke-width="2" opacity="{{ 0.9 - $c * 0.22 }}"/>
            @endforeach

            {{-- paku emas --}}
            @foreach([[52, 236], [268, 236], [52, 852], [268, 852], [160, 862]] as [$sx, $sy])
                <circle cx="{{ $sx }}" cy="{{ $sy }}" r="4" fill="{{ $gold }}" opacity=".85"/>
            @endforeach

            {{-- gelang pintu di tepi belahan --}}
            <rect x="260" y="470" width="40" height="62" rx="7" fill="none" stroke="{{ $gold }}" stroke-width="1.8"/>
            <circle cx="280" cy="501" r="16" fill="none" stroke="{{ $gold }}" stroke-width="2.6"/>
            <circle cx="280" cy="501" r="6" fill="{{ $gold }}" opacity=".7"/>
        @endif

        {{-- strip tepi dalam: tetap terlihat saat sayap terbuka --}}
        <path d="M292 262 V866" stroke="{{ $gold }}" stroke-width="1.3" opacity=".6"/>
        @foreach(range(0, 6) as $s)
            <g transform="translate(296 {{ 300 + $s * 84 }})">
                <path d="M-10 12 L0 -12 L10 12 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.5" opacity=".8"/>
                <path d="M0 -4 L0 12" stroke="{{ $accent2 }}" stroke-width="1" opacity=".6"/>
            </g>
        @endforeach
    </g>

    {{-- bingkai ganda --}}
    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
    <rect x="16" y="16" width="288" height="868" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>
</svg>
