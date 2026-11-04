{{--
    Crest Adat Nusantara — gerbang ukir / wajik tenun.
    Parameter: $tj, $cls.
--}}
@php
    $cls = $cls ?? 'w-12 h-10';
    $accent = $tj['c']['accent'];
    $accent2 = $tj['c']['accent2'];
@endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if(($tj['gate'] ?? 'ikat') === 'carved')
        <path d="M14 84 V44 L60 12 L106 44 V84" fill="none" stroke="{{ $accent }}" stroke-width="2.6" stroke-linejoin="round"/>
        <path d="M26 80 V48 L60 24 L94 48 V80" fill="none" stroke="{{ $accent2 }}" stroke-width="1.3" opacity=".8"/>
        <path d="M42 80 C 50 62 70 62 78 80" fill="none" stroke="{{ $accent }}" stroke-width="1.8"/>
        <path d="M60 34 V56" stroke="{{ $accent2 }}" stroke-width="1.4"/>
        <circle cx="60" cy="58" r="3" fill="{{ $accent2 }}"/>
        <path d="M10 88 H110" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".7"/>
    @else
        <path d="M60 8 L96 34 L60 60 L24 34 Z" fill="none" stroke="{{ $accent }}" stroke-width="2.6" stroke-linejoin="round"/>
        <path d="M60 20 L84 34 L60 48 L36 34 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1.3" opacity=".85"/>
        <path d="M60 30 L70 34 L60 38 L50 34 Z" fill="{{ $accent2 }}"/>
        @foreach([20, 100] as $x)
            <path d="M{{ $x }} 56 V86" stroke="{{ $accent }}" stroke-width="1.6" opacity=".7"/>
            <circle cx="{{ $x }}" cy="90" r="2.4" fill="{{ $accent2 }}"/>
        @endforeach
        <path d="M60 60 V88" stroke="{{ $accent }}" stroke-width="1.6" opacity=".7"/>
    @endif
</svg>
