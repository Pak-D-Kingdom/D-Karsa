{{--
    Crest Minimalis Modern — monogram garis (tanpa motif etnis).
    Parameter: $tj, $cls.
--}}
@php
    $cls = $cls ?? 'w-12 h-10';
    $accent = $tj['c']['accent'];
    $accent2 = $tj['c']['accent2'];
@endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if(($tj['gate'] ?? 'glass') === 'paper')
        <path d="M60 16 C 82 16 92 34 92 52 C 92 74 76 86 60 86 C 44 86 28 74 28 52 C 28 34 38 16 60 16 Z"
              fill="none" stroke="{{ $accent }}" stroke-width="2.2"/>
        <path d="M60 30 V74 M46 46 H74" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".85"/>
        <path d="M36 92 H84" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".6"/>
    @else
        <rect x="30" y="22" width="60" height="60" fill="none" stroke="{{ $accent }}" stroke-width="2.2"/>
        <path d="M30 42 H90" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".7"/>
        <path d="M60 22 V82" stroke="{{ $accent2 }}" stroke-width="1.2" opacity=".5"/>
        <circle cx="60" cy="62" r="3" fill="{{ $accent2 }}"/>
    @endif
</svg>
