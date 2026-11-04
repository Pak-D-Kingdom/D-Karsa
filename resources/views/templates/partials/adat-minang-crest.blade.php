{{--
    Crest Adat Minang — gonjong Rumah Gadang (default) atau Suntiang Gadang.
    Parameter: $tj (config tema), $cls (kelas ukuran).
--}}
@php
    $cls = $cls ?? 'w-12 h-10';
    $accent = $tj['c']['accent'];
    $accent2 = $tj['c']['accent2'];
    $deep = $tj['c']['deep'];
@endphp
@if(($tj['gate'] ?? 'gonjong') === 'songket')
    {{-- Suntiang Gadang: mahkota kipas berlapis --}}
    <svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
        <path d="M60 88 V44" stroke="{{ $accent }}" stroke-width="2"/>
        @foreach(range(0, 6) as $i)
            @php
                $ang = deg2rad(-90 + ($i - 3) * 22);
                $len = 40 - abs($i - 3) * 5;
                $x2 = 60 + cos($ang) * $len;
                $y2 = 44 + sin($ang) * $len;
            @endphp
            <path d="M60 44 L{{ round($x2, 1) }} {{ round($y2, 1) }}" stroke="{{ $accent }}" stroke-width="2" stroke-linecap="round"/>
            <circle cx="{{ round($x2, 1) }}" cy="{{ round($y2, 1) }}" r="4.4" fill="{{ $accent2 }}"/>
            <circle cx="{{ round($x2, 1) }}" cy="{{ round($y2, 1) }}" r="2" fill="{{ $deep }}"/>
        @endforeach
        <path d="M42 60 Q60 74 78 60" fill="none" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".8"/>
        <path d="M38 92 H82" stroke="{{ $accent }}" stroke-width="1.6"/>
        <circle cx="60" cy="40" r="3" fill="{{ $accent2 }}"/>
    </svg>
@else
    {{-- Gonjong: tanduk atap Rumah Gadang (puncak runcing, dua lengkung simetris) --}}
    <svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
        <path d="M4 90 C 28 86 48 62 57 22 L 61 10 L 65 22 C 74 62 94 86 118 90"
              fill="none" stroke="{{ $accent }}" stroke-width="3" stroke-linejoin="round" stroke-linecap="round"/>
        <path d="M16 88 C 36 82 52 62 59 30" fill="none" stroke="{{ $accent2 }}" stroke-width="1.3" opacity=".8"/>
        <path d="M106 88 C 86 82 70 62 63 30" fill="none" stroke="{{ $accent2 }}" stroke-width="1.3" opacity=".8"/>
        <path d="M26 84 C 42 78 54 62 60 38" fill="none" stroke="{{ $accent }}" stroke-width=".9" opacity=".45"/>
        <path d="M96 84 C 80 78 68 62 62 38" fill="none" stroke="{{ $accent }}" stroke-width=".9" opacity=".45"/>
        <circle cx="61" cy="9" r="3.2" fill="{{ $accent2 }}"/>
        <path d="M6 94 H114" stroke="{{ $accent2 }}" stroke-width="1.5" opacity=".75"/>
    </svg>
@endif
