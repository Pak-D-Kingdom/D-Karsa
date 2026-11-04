{{--
    Crest budaya untuk header seksi & cover.
    Parameter: $tj (config tema), $kind ('gunungan'|'gebyok', default ikut tema), $cls (kelas ukuran).
--}}
@php
    $kind = $kind ?? $tj['gate'];
    $cls = $cls ?? 'w-14 h-12';
@endphp
<svg viewBox="0 0 100 84" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if($kind === 'gebyok')
        <path d="M50 5 L87 42 L50 79 L13 42 Z" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="2"/>
        <path d="M50 19 L73 42 L50 65 L27 42 Z" fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1.1" opacity=".8"/>
        <ellipse cx="50" cy="33" rx="5" ry="8" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1"/>
        <ellipse cx="50" cy="51" rx="5" ry="8" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1"/>
        <ellipse cx="41" cy="42" rx="8" ry="5" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1"/>
        <ellipse cx="59" cy="42" rx="8" ry="5" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1"/>
        <circle cx="50" cy="42" r="2.2" fill="{{ $tj['c']['accent'] }}"/>
    @else
        <path d="M50 4 C64 24 78 42 84 62 L84 78 L16 78 L16 62 C22 42 36 24 50 4 Z"
              fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="2"/>
        <path d="M50 16 C60 32 70 46 74 62 L74 72 L26 72 L26 62 C30 46 40 32 50 16 Z"
              fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1" opacity=".7"/>
        <path d="M50 24 V70 M34 48 H66" stroke="{{ $tj['c']['accent'] }}" stroke-width="1.2" opacity=".85"/>
        <path d="M30 78 L42 62 L54 78 M46 78 L58 66 L70 78" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1" opacity=".7"/>
        <circle cx="50" cy="48" r="6" fill="none" stroke="{{ $tj['c']['accent'] }}" stroke-width="1.2" opacity=".8"/>
    @endif
</svg>
