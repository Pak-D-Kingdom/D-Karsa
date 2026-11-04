{{-- Crest Editorial — monogram dalam bingkai tipis. --}}
@php $cls = $cls ?? 'w-12 h-10'; $accent = $tj['c']['accent']; $accent2 = $tj['c']['accent2']; @endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    <rect x="30" y="22" width="60" height="60" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
    <path d="M30 40 H90" stroke="{{ $accent2 }}" stroke-width="1" opacity=".7"/>
    <path d="M60 22 V82" stroke="{{ $accent2 }}" stroke-width="1" opacity=".4"/>
    <circle cx="60" cy="60" r="3" fill="{{ $accent2 }}"/>
    <path d="M24 90 H96" stroke="{{ $accent }}" stroke-width="1.2" opacity=".6"/>
</svg>
