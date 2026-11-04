{{--
    Sayap gerbang V-Angle (Z-30) — Minimalis Modern (non-etnis).
    Variant: $tj['gate'] = 'glass' (kaca buram arsitektural) | 'paper' (kertas deckle-edge + bayangan botani).
    Parameter: $tj, $side.
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
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="mdFill{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="{{ $surface }}"/>
            <stop offset="55%" stop-color="{{ $surface }}" stop-opacity=".92"/>
            <stop offset="100%" stop-color="{{ $deep }}" stop-opacity=".18"/>
        </linearGradient>
        <linearGradient id="mdSheen{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#fff" stop-opacity=".55"/>
            <stop offset="40%" stop-color="#fff" stop-opacity=".05"/>
            <stop offset="70%" stop-color="#fff" stop-opacity=".28"/>
            <stop offset="100%" stop-color="#fff" stop-opacity="0"/>
        </linearGradient>
    </defs>

    {{-- monogram pasangan: hanya di sayap kiri, di tepi belahan, agar muncul sekali saat gerbang tertutup --}}
    @if($tj['gate'] === 'glass' && $initials !== '' && $side === 'left')
        <g transform="translate(300 452)">
            <circle r="27" fill="{{ $deep }}" opacity=".92"/>
            <circle r="27" fill="none" stroke="{{ $ink }}" stroke-width="1" opacity=".35"/>
            <circle r="22" fill="none" stroke="{{ $ink }}" stroke-width="2.2" opacity=".85"/>
            <text x="0" y="7" text-anchor="middle" font-family="'EB Garamond', Georgia, serif"
                  font-size="19" letter-spacing="1.5" fill="{{ $surface }}" opacity="1">{{ $initials }}</text>
        </g>
    @endif

    @if($tj['gate'] === 'glass')
        {{-- kaca buram arsitektural: panel bening + rangka tipis --}}
        <rect width="320" height="900" fill="url(#mdFill{{ $uid }})"/>
        <rect width="320" height="900" fill="url(#mdSheen{{ $uid }})"/>
        <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
            {{-- garis kaca vertikal --}}
            @foreach([40, 96, 152, 208, 264] as $x)
                <path d="M{{ $x }} 0 V900" stroke="{{ $ink }}" stroke-width=".8" opacity=".07"/>
            @endforeach
            {{-- bayangan lembut di tepi dalam --}}
            <rect x="296" y="0" width="24" height="900" fill="{{ $deep }}" opacity=".06"/>
            {{-- rangka logam tipis --}}
            <rect x="10" y="10" width="300" height="880" fill="none" stroke="{{ $ink }}" stroke-width="1.6" opacity=".55"/>
            <rect x="22" y="22" width="276" height="856" fill="none" stroke="{{ $ink }}" stroke-width=".8" opacity=".22"/>
            {{-- handle horizontal --}}
            <rect x="262" y="430" width="52" height="7" rx="3.5" fill="{{ $ink }}" opacity=".7"/>
            <rect x="262" y="470" width="52" height="7" rx="3.5" fill="{{ $ink }}" opacity=".35"/>
            {{-- aksen warna template: satu garis tipis di tepi belahan --}}
            <path d="M316 60 V840" stroke="{{ $accent }}" stroke-width="2.4" opacity=".85"/>

        </g>
    @else
        {{-- kertas deckle-edge + bayangan botani --}}
        <rect width="320" height="900" fill="url(#mdFill{{ $uid }})"/>
        <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
            {{-- bayangan dedaunan (organik, lembut) --}}
            @foreach([[70, 180, 46, 18, -24], [120, 330, 60, 22, 12], [60, 520, 52, 20, -8], [130, 690, 66, 24, 18]] as [$cx, $cy, $rx, $ry, $rot])
                <ellipse cx="{{ $cx }}" cy="{{ $cy }}" rx="{{ $rx }}" ry="{{ $ry }}" fill="{{ $deep }}" opacity=".10"
                         transform="rotate({{ $rot }} {{ $cx }} {{ $cy }})"/>
                <ellipse cx="{{ $cx + 18 }}" cy="{{ $cy + 26 }}" rx="{{ $rx * 0.7 }}" ry="{{ $ry * 0.7 }}" fill="{{ $deep }}" opacity=".07"
                         transform="rotate({{ $rot + 24 }} {{ $cx }} {{ $cy }})"/>
            @endforeach
            {{-- tepi deckle (robek organik) di sisi belahan --}}
            <path d="M320 0 C 286 52 306 104 274 156 C 250 194 292 232 268 282 C 244 332 288 366 264 418
                     C 240 470 284 504 262 556 C 240 608 286 642 264 694 C 246 736 288 770 266 822
                     C 254 852 292 872 320 900 L320 0 Z"
                  fill="{{ $surface }}" opacity=".82"/>
            <path d="M320 0 C 286 52 306 104 274 156 C 250 194 292 232 268 282 C 244 332 288 366 264 418
                     C 240 470 284 504 262 556 C 240 608 286 642 264 694 C 246 736 288 770 266 822
                     C 254 852 292 872 320 900"
                  fill="none" stroke="{{ $accent }}" stroke-width="2" opacity=".55"/>
            {{-- bayangan tipis di belakang tepi robek, mempertegas siluet kertas --}}
            <path d="M320 0 C 286 52 306 104 274 156 C 250 194 292 232 268 282 C 244 332 288 366 264 418
                     C 240 470 284 504 262 556 C 240 608 286 642 264 694 C 246 736 288 770 266 822
                     C 254 852 292 872 320 900"
                  fill="none" stroke="{{ $deep }}" stroke-width="9" opacity=".18" transform="translate(7 0)"/>
            {{-- lapisan kertas kedua (tepi lebih dalam, offset) --}}
            <path d="M320 0 C 268 90 296 160 250 240 C 216 300 288 350 246 420 C 208 486 284 530 244 600
                     C 210 664 286 710 248 780 C 224 826 292 864 320 900 L320 900 L320 0 Z"
                  fill="{{ $surface }}" opacity=".55"/>
            <path d="M320 0 C 292 80 308 150 286 220 C 268 280 296 330 280 400 C 264 470 294 520 282 590
                     C 270 660 298 710 284 780 C 274 830 296 870 282 900"
                  fill="none" stroke="{{ $accent }}" stroke-width="1" opacity=".32"/>
            {{-- tirai dedaunan menggantung dari atas --}}
            @foreach([[240, 90, 26], [268, 210, 32], [246, 330, 24], [272, 470, 30], [250, 610, 26], [270, 740, 28]] as [$sx, $sy, $len])
                <path d="M{{ $sx }} 0 C {{ $sx - 8 }} {{ $sy }} {{ $sx + 10 }} {{ $sy + $len }} {{ $sx - 2 }} {{ $sy + $len * 2 }}"
                      fill="none" stroke="{{ $accent }}" stroke-width="1.3" opacity=".38"/>
                @foreach(range(0, 3) as $lf)
                    @php $ly = $sy + $lf * $len * 0.55; @endphp
                    <ellipse cx="{{ $sx - 10 }}" cy="{{ $ly }}" rx="11" ry="5" fill="{{ $accent }}" opacity=".22"
                             transform="rotate(-28 {{ $sx - 10 }} {{ $ly }})"/>
                    <ellipse cx="{{ $sx + 8 }}" cy="{{ $ly + 14 }}" rx="10" ry="4.5" fill="{{ $accent }}" opacity=".18"
                             transform="rotate(24 {{ $sx + 8 }} {{ $ly + 14 }})"/>
                @endforeach
            @endforeach
            {{-- serat kertas --}}
            @foreach(range(0, 22) as $f)
                <path d="M{{ 8 + ($f * 13) % 300 }} {{ 20 + $f * 39 }} h{{ 18 + ($f % 5) * 9 }}"
                      stroke="{{ $ink }}" stroke-width=".7" opacity=".06"/>
            @endforeach
            <rect x="12" y="12" width="296" height="876" fill="none" stroke="{{ $ink }}" stroke-width="1" opacity=".14"/>
        </g>
    @endif
</svg>
