{{--
    Crest Elegan & Floral — mekar mawar (pastel) atau bintang arabesque (islami).
--}}
@php
    $cls = $cls ?? 'w-12 h-10';
    $accent = $tj['c']['accent'];
    $accent2 = $tj['c']['accent2'];
    $deep = $tj['c']['deep'];
@endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if(($tj['gate'] ?? 'pastel') === 'islami')
        <path d="M60 12 L68 36 L92 44 L68 52 L60 76 L52 52 L28 44 L52 36 Z" fill="none" stroke="{{ $accent }}" stroke-width="2.4"/>
        <path d="M60 26 L64 40 L78 44 L64 48 L60 62 L56 48 L42 44 L56 40 Z" fill="{{ $accent2 }}" opacity=".45"/>
        <circle cx="60" cy="44" r="3" fill="{{ $accent2 }}"/>
        <path d="M24 84 H96" stroke="{{ $accent }}" stroke-width="1.4" opacity=".7"/>
        <path d="M32 84 c 6 -10 14 -10 18 0 M70 84 c 4 -10 12 -10 18 0" fill="none" stroke="{{ $accent }}" stroke-width="1.2" opacity=".6"/>
    @else
        @foreach([0, 60, 120, 180, 240, 300] as $ang)
            <ellipse cx="60" cy="34" rx="13" ry="17" fill="{{ $accent }}" opacity=".75"
                     transform="rotate({{ $ang }} 60 44)"/>
        @endforeach
        @foreach([30, 90, 150, 210, 270, 330] as $ang)
            <ellipse cx="60" cy="38" rx="8" ry="11" fill="{{ $accent2 }}" opacity=".85"
                     transform="rotate({{ $ang }} 60 44)"/>
        @endforeach
        <circle cx="60" cy="44" r="4.5" fill="{{ $deep }}" opacity=".8"/>
        <path d="M60 60 C 56 74 64 82 60 92" fill="none" stroke="{{ $accent }}" stroke-width="1.4" opacity=".7"/>
        <ellipse cx="52" cy="76" rx="9" ry="4" fill="{{ $accent }}" opacity=".5" transform="rotate(-24 52 76)"/>
        <ellipse cx="68" cy="82" rx="8" ry="3.6" fill="{{ $accent }}" opacity=".45" transform="rotate(22 68 82)"/>
    @endif
</svg>
