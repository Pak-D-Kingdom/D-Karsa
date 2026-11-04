{{--
    Sayap gerbang V-Angle (Z-30) — Adat Nusantara (tenun ikat / gerbang ukir).
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
    $bgHex = ltrim($tj['c']['bg'], '#');
    $bgLum = (hexdec(substr($bgHex, 0, 2)) * 0.299) + (hexdec(substr($bgHex, 2, 2)) * 0.587) + (hexdec(substr($bgHex, 4, 2)) * 0.114);
    $gold = $bgLum < 90 ? '#E8C87A' : '#C9A050';
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="nuFill{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $deep }}"/>
            <stop offset="100%" stop-color="{{ $ink }}"/>
        </linearGradient>
        {{-- tenun ikat: kisi wajik dengan tepi kabur (efek ikat) --}}
        <pattern id="nuIkat{{ $uid }}" width="64" height="64" patternUnits="userSpaceOnUse">
            <path d="M32 6 L58 32 L32 58 L6 32 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.4" opacity=".2"/>
            <path d="M32 10 L54 32 L32 54 L10 32 Z" fill="none" stroke="{{ $gold }}" stroke-width="3" opacity=".07"/>
            <path d="M32 22 L42 32 L32 42 L22 32 Z" fill="{{ $gold }}" opacity=".12"/>
            <path d="M0 32 H64 M32 0 V64" stroke="{{ $gold }}" stroke-width=".8" opacity=".1"/>
            {{-- gerigi ikat: tepi motif "berdarah" karena benang diikat sebelum dicelup --}}
            @for($t = 0; $t < 10; $t++)
                <path d="M{{ 10 + $t * 5 }} {{ 20 + ($t % 3) * 2 }} v4 M{{ 12 + $t * 5 }} {{ 38 - ($t % 3) * 2 }} v4"
                      stroke="{{ $gold }}" stroke-width="1.1" opacity=".16"/>
            @endfor
            @for($t = 0; $t < 6; $t++)
                <path d="M{{ 8 + $t * 9 }} 32 h5 M{{ 46 + ($t % 2) * 3 }} {{ 12 + $t * 6 }} h4"
                      stroke="{{ $gold }}" stroke-width="1" opacity=".13"/>
            @endfor
        </pattern>
        <linearGradient id="nuSheen{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#fff" stop-opacity=".10"/>
            <stop offset="45%" stop-color="#fff" stop-opacity="0"/>
            <stop offset="100%" stop-color="#fff" stop-opacity=".05"/>
        </linearGradient>
    </defs>

    <rect width="320" height="900" fill="url(#nuFill{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#nuIkat{{ $uid }})"/>
    <rect width="320" height="900" fill="url(#nuSheen{{ $uid }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        @if($tj['gate'] === 'carved')
            {{-- ============ GERBANG UKIR NUSANTARA ============ --}}
            <rect x="16" y="70" width="288" height="760" fill="{{ $surface }}" opacity=".95" stroke="{{ $gold }}" stroke-width="3"/>
            <rect x="30" y="84" width="260" height="732" fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".8"/>
            {{-- puncak gerbang berundak (candi/toraja) --}}
            @foreach(range(0, 3) as $s)
                <path d="M{{ 96 + $s * 14 }} {{ 70 - $s * 12 }} L160 {{ 24 - $s * 12 }} L{{ 224 - $s * 14 }} {{ 70 - $s * 12 }}"
                      fill="none" stroke="{{ $gold }}" stroke-width="2" opacity="{{ 0.9 - $s * 0.2 }}"/>
            @endforeach
            {{-- papan ukir: motif tanduk kerbau & spiral dayak --}}
            @foreach(range(0, 3) as $r)
                @php $cy = 170 + $r * 190; @endphp
                <g transform="translate(160 {{ $cy }})">
                    <path d="M-52 18 C -34 -18 0 -30 22 -14 C 34 -4 30 14 14 18 C 2 21 -8 12 -4 2"
                          fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
                    <path d="M52 18 C 34 -18 0 -30 -22 -14 C -34 -4 -30 14 -14 18 C -2 21 8 12 4 2"
                          fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
                    <circle cx="0" cy="26" r="3.4" fill="{{ $accent2 }}"/>
                </g>
                <path d="M46 {{ $cy + 60 }} H274" stroke="{{ $gold }}" stroke-width="1" opacity=".3"/>
            @endforeach
            {{-- paku & gelang pintu --}}
            @foreach([[48, 100], [272, 100], [48, 800], [272, 800]] as [$sx, $sy])
                <circle cx="{{ $sx }}" cy="{{ $sy }}" r="4" fill="{{ $gold }}" opacity=".85"/>
            @endforeach
            <rect x="258" y="452" width="40" height="60" rx="7" fill="none" stroke="{{ $gold }}" stroke-width="1.8"/>
            <circle cx="278" cy="482" r="15" fill="none" stroke="{{ $gold }}" stroke-width="2.6"/>
        @else
            {{-- ============ TIRAI TENUN IKAT ============ --}}
            @for($b = 0; $b < 7; $b++)
                @php $top = 96 + $b * 108; @endphp
                <rect x="12" y="{{ $top }}" width="296" height="96" fill="{{ $surface }}" opacity=".05"/>
                <path d="M12 {{ $top }} H308 M12 {{ $top + 96 }} H308" stroke="{{ $gold }}" stroke-width="1.2" opacity=".45"/>
                @foreach([44, 100, 156, 212, 268] as $cx)
                    <g transform="translate({{ $cx }} {{ $top + 48 }})">
                        <path d="M0 -30 L24 0 L0 30 L-24 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="3" opacity=".10"/>
                        <path d="M0 -22 L17 0 L0 22 L-17 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.6" opacity=".8"/>
                        <path d="M0 -10 L8 0 L0 10 L-8 0 Z" fill="{{ $gold }}" opacity=".5"/>
                    </g>
                @endforeach
            @endfor
            {{-- rumbai di tepi bawah --}}
            @foreach(range(0, 15) as $f)
                <path d="M{{ 14 + $f * 19 }} 852 V{{ 872 + ($f % 3) * 6 }}" stroke="{{ $gold }}" stroke-width="1.5" opacity=".6"/>
            @endforeach
        @endif

        {{-- motif ikonik ikat: patola (wajik berkait) & mamuli (omega) --}}
        @if($tj['gate'] === 'ikat')
            @foreach([200, 620] as $by)
                <g transform="translate(0 {{ $by }})" opacity=".85">
                    @foreach([40, 104, 168, 232, 296] as $bx)
                        <g transform="translate({{ $bx }} 0)">
                            <path d="M0 -18 L18 0 L0 18 L-18 0 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.6"/>
                            <path d="M0 -18 L0 -30 M18 0 L30 0 M0 18 L0 30 M-18 0 L-30 0" stroke="{{ $gold }}" stroke-width="1.6"/>
                            <path d="M0 -9 L9 0 L0 9 L-9 0 Z" fill="{{ $gold }}" opacity=".55"/>
                        </g>
                    @endforeach
                </g>
            @endforeach
            <g transform="translate(160 430)" opacity=".9">
                <path d="M-34 -14 C -34 -34 -12 -40 0 -26 C 12 -40 34 -34 34 -14 C 34 4 18 16 0 30 C -18 16 -34 4 -34 -14 Z"
                      fill="none" stroke="{{ $gold }}" stroke-width="2"/>
                <path d="M-16 -10 C -16 -20 -4 -22 0 -14 C 4 -22 16 -20 16 -10 C 16 0 8 8 0 16 C -8 8 -16 0 -16 -10 Z"
                      fill="none" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".8"/>
            </g>
        @endif

        {{-- strip tepi dalam (bertahan saat gerbang terbuka) --}}
        <path d="M296 110 V820" stroke="{{ $gold }}" stroke-width="1.4" opacity=".65"/>
        @foreach(range(0, 7) as $s)
            <g transform="translate(298 {{ 150 + $s * 96 }})">
                <path d="M-8 10 L0 -10 L8 10 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.4" opacity=".8"/>
            </g>
        @endforeach
    </g>

    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".85"/>
    <rect x="16" y="16" width="288" height="868" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".5"/>
</svg>
