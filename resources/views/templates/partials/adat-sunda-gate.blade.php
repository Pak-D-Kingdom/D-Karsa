{{--
    Sayap gerbang V-Angle — Adat Sunda.
    Mega Mendung berlapis + arch Siger + roncean melati, dicerminkan per sisi.
    Parameter: $tj, $side ('left' | 'right').
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
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="sdFill{{ $uid }}" x1="0" y1="0" x2="0.4" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        <pattern id="sdWeave{{ $uid }}" width="26" height="26" patternUnits="userSpaceOnUse" patternTransform="rotate(35)">
            <path d="M0 0 V26" stroke="{{ $accent }}" stroke-width="1" opacity=".12"/>
            <path d="M0 13 H26" stroke="{{ $accent2 }}" stroke-width=".8" opacity=".08"/>
        </pattern>
    </defs>

    <rect width="320" height="900" fill="url(#sdFill{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#sdWeave{{ $uid }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        {{-- ===== Mega Mendung berlapis ===== --}}
        @for($c = 0; $c < 6; $c++)
            @php
                $y = 520 + $c * 62;
                $op = 0.85 - $c * 0.11;
                $col = $c % 2 === 0 ? $accent : $accent2;
            @endphp
            <path d="M0 {{ $y }}
                     C 40 {{ $y - 34 }}, 78 {{ $y - 34 }}, 104 {{ $y - 6 }}
                     C 128 {{ $y - 40 }}, 168 {{ $y - 40 }}, 194 {{ $y - 8 }}
                     C 220 {{ $y - 42 }}, 262 {{ $y - 42 }}, 288 {{ $y - 10 }}
                     C 300 {{ $y - 26 }}, 312 {{ $y - 24 }}, 320 {{ $y - 14 }}"
                  fill="none" stroke="{{ $col }}" stroke-width="{{ 2.4 - $c * 0.2 }}" opacity="{{ $op }}"/>
            <path d="M0 {{ $y + 16 }}
                     C 44 {{ $y - 14 }}, 84 {{ $y - 14 }}, 110 {{ $y + 10 }}
                     C 136 {{ $y - 18 }}, 176 {{ $y - 18 }}, 202 {{ $y + 8 }}
                     C 230 {{ $y - 20 }}, 268 {{ $y - 20 }}, 294 {{ $y + 6 }}"
                  fill="none" stroke="{{ $col }}" stroke-width="1.2" opacity="{{ $op * 0.6 }}"/>
        @endfor

        {{-- ===== Siger: arch mahkota di tepi belahan ===== --}}
        <path d="M292 250 C 276 190, 236 148, 186 132" fill="none" stroke="{{ $accent }}" stroke-width="2.6"/>
        <path d="M292 262 C 274 200, 234 158, 182 142" fill="none" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".7"/>
        @for($s = 0; $s < 7; $s++)
            @php
                $ang = deg2rad(196 + $s * 15);
                $x1 = 240 + cos($ang) * 26;
                $y1 = 196 + sin($ang) * 26;
                $x2 = 240 + cos($ang) * 74;
                $y2 = 196 + sin($ang) * 74;
            @endphp
            <path d="M{{ round($x1,1) }} {{ round($y1,1) }} L{{ round($x2,1) }} {{ round($y2,1) }}"
                  stroke="{{ $accent }}" stroke-width="2" opacity=".95"/>
            <circle cx="{{ round($x2,1) }}" cy="{{ round($y2,1) }}" r="3.4" fill="{{ $accent2 }}"/>
        @endfor
        <circle cx="240" cy="196" r="8" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
        <circle cx="240" cy="196" r="3" fill="{{ $accent2 }}"/>
        {{-- mahkota Siger bergerigi di tepi belahan --}}
        <path d="M304 232 L292 186 L282 210 L272 164 L260 210 L250 186 L238 232"
              fill="none" stroke="{{ $accent }}" stroke-width="2.4" stroke-linejoin="round"/>
        <path d="M304 244 L238 244" stroke="{{ $accent2 }}" stroke-width="1.6" opacity=".85"/>
        @foreach([272, 260, 250] as $px)
            <circle cx="{{ $px }}" cy="{{ $px === 272 ? 176 : ($px === 260 ? 190 : 196) }}" r="2.6" fill="{{ $accent2 }}"/>
        @endforeach

        {{-- ===== Roncean melati di tepi belahan ===== --}}
        <path d="M300 96 C 288 200, 292 320, 300 440" fill="none" stroke="{{ $accent2 }}" stroke-width="1.1" opacity=".65"/>
        @foreach(range(0, 9) as $m)
            @php $cy = 112 + $m * 38; $cx = 300 + ($m % 2 ? 7 : -5); @endphp
            <g transform="translate({{ $cx }} {{ $cy }})" opacity=".95">
                @for($p = 0; $p < 5; $p++)
                    @php $pa = deg2rad($p * 72); @endphp
                    <ellipse cx="{{ round(cos($pa) * 6.4, 1) }}" cy="{{ round(sin($pa) * 6.4, 1) }}" rx="4.4" ry="3.2"
                             fill="{{ $surface }}" stroke="{{ $accent }}" stroke-width=".9" opacity=".95"/>
                @endfor
                <circle r="2.4" fill="{{ $accent2 }}"/>
            </g>
        @endforeach

        {{-- kujang halus di badan sayap --}}
        <path d="M96 700 C 120 640, 128 596, 120 548 C 150 574, 156 620, 132 700 Z"
              fill="none" stroke="{{ $accent }}" stroke-width="1.6" opacity=".55"/>

        {{-- strip tepi dalam (yang tetap terlihat saat sayap terbuka): emblem Siger + awan --}}
        {{-- siger ramping di strip tepi dalam (satu-satunya zona yang tersisa saat sayap terbuka) --}}
        <g fill="none" stroke="{{ $accent2 }}" stroke-width="2.6" stroke-linejoin="round" opacity=".95">
            <path d="M272 402 L288 366 L304 402"/>
            <path d="M272 436 L288 400 L304 436" opacity=".78"/>
            <path d="M272 470 L288 434 L304 470" opacity=".58"/>
        </g>
        <circle cx="288" cy="350" r="4" fill="{{ $accent }}"/>
        <path d="M270 486 H306" stroke="{{ $accent }}" stroke-width="1.6" opacity=".85"/>
        <g transform="translate(272 640) scale(.8)" opacity=".9">
            <path d="M-22 12 C -14 0, -6 0, 0 10 C 6 0, 14 0, 22 12"
                  fill="none" stroke="{{ $accent2 }}" stroke-width="2" stroke-linejoin="round"/>
            <path d="M-22 20 C -14 8, -6 8, 0 18 C 6 8, 14 8, 22 20"
                  fill="none" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".7"/>
        </g>
    </g>

    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $accent }}" stroke-width="2" opacity=".85"/>
    <rect x="16" y="16" width="288" height="868" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>
</svg>
