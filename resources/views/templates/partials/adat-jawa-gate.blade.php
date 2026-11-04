{{--
    Sayap gerbang V-Angle (Z-30) — siluet budaya autentik, bukan garis abstrak.
    Dipakai oleh templates/partials/adat-jawa-theme.blade.php.
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
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="gateFill{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        <pattern id="gateWeave{{ $uid }}" width="48" height="48" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
            <path d="M0 24 Q12 8 24 24 T48 24" fill="none" stroke="{{ $accent }}" stroke-width="1" opacity=".16"/>
            <path d="M0 38 Q12 22 24 38 T48 38" fill="none" stroke="{{ $accent2 }}" stroke-width=".8" opacity=".10"/>
        </pattern>
    </defs>

    {{-- Z-0 : permukaan kayu/kain bergradasi + tenun halus --}}
    <rect width="320" height="900" fill="url(#gateFill{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#gateWeave{{ $uid }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        @if($tj['gate'] === 'gebyok')
            {{-- ============ GEBYOK : pintu ukir kayu Keraton ============ --}}
            @for($g = 0; $g < 11; $g++)
                <path d="M18 {{ 44 + $g * 80 }} C92 {{ 24 + $g * 80 }} 232 {{ 62 + $g * 80 }} 304 {{ 34 + $g * 80 }}"
                      fill="none" stroke="{{ $ink }}" stroke-width=".9" opacity=".14"/>
            @endfor

            <rect x="26" y="50" width="268" height="800" fill="{{ $surface }}" opacity=".93" stroke="{{ $accent }}" stroke-width="3"/>
            <rect x="42" y="66" width="236" height="768" fill="none" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".8"/>

            {{-- mahkota ukir --}}
            <path d="M112 50 L160 12 L208 50" fill="none" stroke="{{ $accent }}" stroke-width="2.4"/>
            <circle cx="160" cy="34" r="4" fill="{{ $accent }}"/>

            @for($i = 0; $i < 3; $i++)
                @php
                    $top = 84 + $i * 250;
                    $mid = $top + 100;
                @endphp
                <rect x="60" y="{{ $top }}" width="200" height="226" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
                <rect x="70" y="{{ $top + 10 }}" width="180" height="206" fill="none" stroke="{{ $accent2 }}" stroke-width=".9" opacity=".6"/>

                {{-- medali kawung --}}
                <circle cx="160" cy="{{ $mid }}" r="54" fill="none" stroke="{{ $accent }}" stroke-width="1.8" opacity="1"/>
                <circle cx="160" cy="{{ $mid }}" r="41" fill="none" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".85"/>
                <ellipse cx="160" cy="{{ $mid - 22 }}" rx="10" ry="15" fill="none" stroke="{{ $accent }}" stroke-width="1.7"/>
                <ellipse cx="160" cy="{{ $mid + 22 }}" rx="10" ry="15" fill="none" stroke="{{ $accent }}" stroke-width="1.7"/>
                <ellipse cx="138" cy="{{ $mid }}" rx="15" ry="10" fill="none" stroke="{{ $accent }}" stroke-width="1.7"/>
                <ellipse cx="182" cy="{{ $mid }}" rx="15" ry="10" fill="none" stroke="{{ $accent }}" stroke-width="1.7"/>
                <circle cx="160" cy="{{ $mid }}" r="4.5" fill="{{ $accent }}"/>

                {{-- sulur sudut ukiran --}}
                <path d="M76 {{ $top + 16 }} q14 10 4 22" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".75"/>
                <path d="M244 {{ $top + 16 }} q-14 10 -4 22" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".75"/>
                <path d="M76 {{ $top + 210 }} q14 -10 4 -22" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".75"/>
                <path d="M244 {{ $top + 210 }} q-14 -10 -4 -22" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".75"/>
            @endfor

            {{-- ring pintu di tepi belahan --}}
            <rect x="258" y="418" width="42" height="66" rx="8" fill="none" stroke="{{ $accent }}" stroke-width="1.6" opacity=".9"/>
            <path d="M279 424 V440" stroke="{{ $accent }}" stroke-width="2.4"/>
            <circle cx="279" cy="456" r="17" fill="none" stroke="{{ $accent }}" stroke-width="2.6"/>
            <circle cx="279" cy="456" r="7" fill="{{ $accent }}" opacity=".55"/>
            <circle cx="279" cy="456" r="7" fill="none" stroke="{{ $accent2 }}" stroke-width="1.4"/>
        @else
            {{-- ============ GUNUNGAN : wayang kulit ============ --}}
            <ellipse cx="152" cy="792" rx="118" ry="15" fill="{{ $ink }}" opacity=".5"/>

            <path d="M158 92 C216 176 264 302 278 428 C292 556 288 652 266 712 L234 776 L82 776 L50 712 C28 652 24 556 38 428 C52 302 100 176 158 92 Z"
                  fill="{{ $deep }}" stroke="{{ $accent }}" stroke-width="2.6" stroke-linejoin="round"/>
            <path d="M158 126 C206 202 248 314 260 430 C272 548 268 636 250 690 L226 748 L90 748 L66 690 C48 636 44 548 56 430 C68 314 110 202 158 126 Z"
                  fill="none" stroke="{{ $accent2 }}" stroke-width="1.1" opacity=".55"/>

            {{-- pohon hayat --}}
            <path d="M158 176 V740" stroke="{{ $accent }}" stroke-width="2" opacity=".95"/>
            <path d="M158 300 C126 268 96 262 72 272" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
            <path d="M158 300 C190 268 220 262 244 272" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
            <path d="M158 402 C122 368 88 362 62 374" fill="none" stroke="{{ $accent }}" stroke-width="1.4" opacity=".85"/>
            <path d="M158 402 C194 368 228 362 254 374" fill="none" stroke="{{ $accent }}" stroke-width="1.4" opacity=".85"/>
            <path d="M158 502 C126 472 96 468 74 478" fill="none" stroke="{{ $accent }}" stroke-width="1.2" opacity=".7"/>
            <path d="M158 502 C190 472 220 468 242 478" fill="none" stroke="{{ $accent }}" stroke-width="1.2" opacity=".7"/>

            @foreach([[96, 262, -25], [220, 262, 25], [86, 362, -20], [230, 362, 20], [98, 468, -15], [218, 468, 15]] as [$cx, $cy, $rot])
                <ellipse cx="{{ $cx }}" cy="{{ $cy }}" rx="12" ry="6" fill="none" stroke="{{ $accent2 }}"
                         stroke-width="1" opacity=".7" transform="rotate({{ $rot }} {{ $cx }} {{ $cy }})"/>
            @endforeach

            {{-- gunung kembar --}}
            <path d="M74 776 L128 660 L182 776 Z" fill="none" stroke="{{ $accent }}" stroke-width="1.6" opacity=".9"/>
            <path d="M134 776 L188 676 L242 776 Z" fill="none" stroke="{{ $accent }}" stroke-width="1.6" opacity=".9"/>

            {{-- kori / candi --}}
            <path d="M126 776 V716 h20 v-16 h24 v16 h20 v60" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M138 776 V726 h40 v50" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".7"/>

            {{-- medali kawung --}}
            @foreach([[110, 566], [206, 566], [158, 632]] as [$cx, $cy])
                <g transform="translate({{ $cx }} {{ $cy }})">
                    <ellipse cx="0" cy="-13" rx="7" ry="10" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".8"/>
                    <ellipse cx="0" cy="13" rx="7" ry="10" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".8"/>
                    <ellipse cx="-13" cy="0" rx="10" ry="7" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".8"/>
                    <ellipse cx="13" cy="0" rx="10" ry="7" fill="none" stroke="{{ $accent }}" stroke-width="1.1" opacity=".8"/>
                    <circle r="2.4" fill="{{ $accent }}"/>
                </g>
            @endforeach

            {{-- roncean melati di tepi belahan --}}
            <path d="M300 118 C288 198 292 278 300 358" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".6"/>
            @foreach(range(0, 6) as $m)
                <circle cx="{{ 300 + ($m % 2 ? 6 : -4) }}" cy="{{ 140 + $m * 34 }}" r="4.2"
                        fill="{{ $surface }}" stroke="{{ $accent }}" stroke-width="1" opacity=".9"/>
            @endforeach
        @endif
    </g>

    {{-- bingkai ganda (tidak ikut dicerminkan) --}}
    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $accent }}" stroke-width="2" opacity=".85"/>
    <rect x="16" y="16" width="288" height="868" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>
</svg>
