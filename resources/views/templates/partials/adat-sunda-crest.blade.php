{{--
    Crest Adat Sunda — Siger (mahkota) atau Mega Mendung.
    Parameter: $tj, $kind ('siger'|'megamendung', default ikut tema), $cls.
--}}
@php
    $kind = $kind ?? $tj['gate'];
    $cls = $cls ?? 'w-14 h-12';
@endphp
<svg viewBox="0 0 100 84" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if($kind === 'siger')
        {{-- Siger: kipas mahkota bertingkat --}}
        <path d="M14 74 C 20 46, 34 26, 50 14 C 66 26, 80 46, 86 74" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="2"/>
        @for($i = 0; $i < 5; $i++)
            @php
                $ang = deg2rad(212 + $i * 16);
                $x1 = 50 + cos($ang) * 8;  $y1 = 70 + sin($ang) * 8;
                $x2 = 50 + cos($ang) * 40; $y2 = 70 + sin($ang) * 40;
            @endphp
            <path d="M{{ round($x1,1) }} {{ round($y1,1) }} L{{ round($x2,1) }} {{ round($y2,1) }}" stroke="{{ $tj['c']['accent'] }}" stroke-width="1.8"/>
            <circle cx="{{ round($x2,1) }}" cy="{{ round($y2,1) }}" r="2.6" fill="{{ $tj['c']['accent2'] }}"/>
        @endfor
        <path d="M22 74 H78" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1.4" opacity=".8"/>
        <path d="M30 62 C 40 56, 60 56, 70 62" fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1" opacity=".7"/>
    @else
        {{-- Mega Mendung: awan berlapis --}}
        @for($i = 0; $i < 3; $i++)
            @php $y = 40 + $i * 14; @endphp
            <path d="M10 {{ $y }} C 22 {{ $y - 16 }}, 36 {{ $y - 16 }}, 46 {{ $y - 2 }}
                     C 56 {{ $y - 18 }}, 74 {{ $y - 18 }}, 84 {{ $y - 4 }}
                     C 90 {{ $y - 12 }}, 94 {{ $y - 10 }}, 96 {{ $y - 6 }}"
                  fill="none" stroke="{{ $i === 0 ? $tj['c']['accent'] : $tj['c']['accent2'] }}"
                  stroke-width="{{ 2 - $i * 0.4 }}" opacity="{{ 1 - $i * 0.25 }}"/>
        @endfor
        <path d="M18 66 C 34 56, 66 56, 82 66" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1.4" opacity=".8"/>
        <circle cx="50" cy="66" r="2.6" fill="{{ $tj['c']['accent2'] }}"/>
    @endif
</svg>
