{{--
    Sayap gerbang V-Angle (Z-30) — Elegan & Floral.
    Variant: $tj['gate'] = 'pastel' (taman bunga 3D) | 'islami' (lengkung runcing + arabesque + floral).
    Parameter: $tj, $side, $initials.
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
    $bg = $tj['c']['bg'];
    $bgHex = ltrim($tj['c']['bg'], '#');
    $bgLum = (hexdec(substr($bgHex, 0, 2)) * 0.299) + (hexdec(substr($bgHex, 2, 2)) * 0.587) + (hexdec(substr($bgHex, 4, 2)) * 0.114);
    $gold = $bgLum < 90 ? '#E8C87A' : '#C9A050';
@endphp
<svg viewBox="0 0 320 900" preserveAspectRatio="none" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="flFill{{ $uid }}" x1="0" y1="0" x2="0.6" y2="1">
            @if($tj['gate'] === 'islami')
                <stop offset="0%" stop-color="{{ $deep }}"/>
                <stop offset="55%" stop-color="{{ $ink }}"/>
                <stop offset="100%" stop-color="{{ $deep }}"/>
            @else
                <stop offset="0%" stop-color="{{ $surface }}"/>
                <stop offset="55%" stop-color="{{ $bg }}"/>
                <stop offset="100%" stop-color="{{ $surface }}"/>
            @endif
        </linearGradient>
        {{-- kelopak: gradasi radial memberi kesan volume 3D --}}
        <radialGradient id="flPetal{{ $uid }}" cx="34%" cy="30%" r="78%">
            @if($tj['gate'] === 'islami')
                <stop offset="0%" stop-color="{{ $accent2 }}"/>
                <stop offset="55%" stop-color="{{ $accent }}"/>
                <stop offset="100%" stop-color="{{ $deep }}"/>
            @else
                <stop offset="0%" stop-color="#FFFFFF"/>
                <stop offset="52%" stop-color="{{ $accent2 }}"/>
                <stop offset="100%" stop-color="{{ $accent }}"/>
            @endif
        </radialGradient>
        <radialGradient id="flBud{{ $uid }}" cx="36%" cy="28%" r="80%">
            @if($tj['gate'] === 'islami')
                <stop offset="0%" stop-color="{{ $surface }}"/>
                <stop offset="60%" stop-color="{{ $accent2 }}"/>
                <stop offset="100%" stop-color="{{ $accent }}"/>
            @else
                <stop offset="0%" stop-color="#FFFFFF"/>
                <stop offset="62%" stop-color="{{ $surface }}"/>
                <stop offset="100%" stop-color="{{ $accent2 }}"/>
            @endif
        </radialGradient>
        <clipPath id="flClip{{ $uid }}"><rect x="6" y="6" width="308" height="888"/></clipPath>
        <pattern id="flLattice{{ $uid }}" width="72" height="72" patternUnits="userSpaceOnUse">
            <g fill="none" stroke="{{ $gold }}" stroke-width="1" opacity=".16">
                <path d="M36 4 L68 36 L36 68 L4 36 Z"/>
                <path d="M36 16 L56 36 L36 56 L16 36 Z"/>
                <path d="M0 36 H72 M36 0 V72"/>
            </g>
        </pattern>
    </defs>

    <rect width="320" height="900" fill="url(#flFill{{ $uid }})"/>
    @if($tj['gate'] === 'islami')
        <rect width="320" height="900" fill="url(#flLattice{{ $uid }})"/>
    @endif

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        @if($tj['gate'] === 'islami')
            {{-- ===== LENGKUNG RUNCIK ISLAMI ===== --}}
            <path d="M34 900 V320 Q34 150 168 34 Q302 150 302 320 V900"
                  fill="none" stroke="{{ $gold }}" stroke-width="3.2"/>
            <path d="M52 900 V330 Q52 172 168 66 Q284 172 284 330 V900"
                  fill="none" stroke="{{ $gold }}" stroke-width="1.2" opacity=".65"/>
            {{-- puncak lengkung: bintang arabesque --}}
            <g transform="translate(168 96)">
                <path d="M0 -26 L7 -7 L26 0 L7 7 L0 26 L-7 7 L-26 0 L-7 -7 Z" fill="none" stroke="{{ $gold }}" stroke-width="1.6"/>
                <circle r="3.4" fill="{{ $gold }}"/>
            </g>
            {{-- arabesque sulur di badan lengkung --}}
            @foreach(range(0, 5) as $a)
                @php $ay = 200 + $a * 118; @endphp
                <path d="M60 {{ $ay }} c 30 -26 60 -6 52 22 c -8 26 -46 20 -40 -12"
                      fill="none" stroke="{{ $gold }}" stroke-width="1.5" opacity=".5"/>
                <path d="M276 {{ $ay }} c -30 -26 -60 -6 -52 22 c 8 26 46 20 40 -12"
                      fill="none" stroke="{{ $gold }}" stroke-width="1.5" opacity=".5"/>
            @endforeach
        @else
            {{-- ===== TAMAN BUNGA 3D ===== --}}
            <g clip-path="url(#flClip{{ $uid }})">
                <ellipse cx="150" cy="110" rx="140" ry="115" fill="{{ $accent }}" opacity=".14"/>
                <ellipse cx="170" cy="800" rx="150" ry="125" fill="{{ $accent }}" opacity=".12"/>
            </g>
        @endif

        {{-- ===== RONCENGAN BUNGA (dipakai kedua varian) ===== --}}
        @php
            $clusters = $tj['gate'] === 'islami'
                ? [[70, 250, 1.0], [250, 360, 0.8], [86, 500, 0.9], [246, 640, 0.85], [96, 780, 1.0], [250, 862, 0.75]]
                : [[80, 150, 1.15], [200, 240, 0.95], [96, 360, 1.0], [214, 470, 0.9], [88, 600, 1.05], [206, 720, 1.0], [110, 840, 1.1]];
        @endphp
        @foreach($clusters as [$cx, $cy, $sc])
            <g transform="translate({{ $cx }} {{ $cy }}) scale({{ $sc }})">
                {{-- daun --}}
                @foreach([[-34, 10, -32], [30, 16, 26], [-18, 34, -12], [24, 38, 18]] as [$lx, $ly, $rot])
                    <ellipse cx="{{ $lx }}" cy="{{ $ly }}" rx="26" ry="11" fill="{{ $accent }}" opacity=".55"
                             transform="rotate({{ $rot }} {{ $lx }} {{ $ly }})"/>
                    <path d="M{{ $lx - 22 }} {{ $ly }} H{{ $lx + 22 }}" stroke="{{ $deep }}" stroke-width=".8" opacity=".25"
                          transform="rotate({{ $rot }} {{ $lx }} {{ $ly }})"/>
                @endforeach
                {{-- bunga utama: kelopak bertumpuk --}}
                @foreach(range(0, 5) as $p)
                    @php $ang = $p * 60; @endphp
                    <ellipse cx="0" cy="-13" rx="15" ry="20" fill="url(#flPetal{{ $uid }})" opacity=".95"
                             stroke="{{ $accent }}" stroke-width=".7" stroke-opacity=".45"
                             transform="rotate({{ $ang }})"/>
                @endforeach
                @foreach(range(0, 4) as $p)
                    @php $ang = 36 + $p * 72; @endphp
                    <ellipse cx="0" cy="-8" rx="9" ry="12" fill="url(#flBud{{ $uid }})" opacity=".9"
                             transform="rotate({{ $ang }})"/>
                @endforeach
                <circle r="4.2" fill="{{ $gold }}" opacity=".9"/>
                {{-- kuntum kecil --}}
                @foreach([[-30, -26], [34, -18], [8, -44]] as [$bx, $by])
                    <circle cx="{{ $bx }}" cy="{{ $by }}" r="5.5" fill="url(#flBud{{ $uid }})" opacity=".9"/>
                @endforeach
            </g>
        @endforeach

        {{-- ===== RONCENGAN MELATI DI TEPI BELAHAN (bertahan saat gerbang terbuka) ===== --}}
        <path d="M300 60 C 288 220 292 380 300 540 C 306 660 300 780 296 880"
              fill="none" stroke="{{ $accent }}" stroke-width="1.4" opacity="{{ $tj['gate'] === 'islami' ? '.7' : '.55' }}"/>
        @foreach(range(0, 9) as $m)
            @php $my = 90 + $m * 88; @endphp
            <g transform="translate({{ 299 + ($m % 2 ? 7 : -6) }} {{ $my }})">
                <circle r="7.5" fill="url(#flBud{{ $uid }})" opacity=".95"/>
                <circle r="3" fill="{{ $gold }}" opacity=".85"/>
            </g>
        @endforeach
    </g>

    <rect x="4" y="4" width="312" height="892" fill="none" stroke="{{ $gold }}" stroke-width="2" opacity=".8"/>
</svg>
