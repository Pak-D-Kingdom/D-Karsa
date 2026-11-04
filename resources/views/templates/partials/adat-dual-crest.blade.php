{{-- Crest Akad & Resepsi — dua cincin + segel. --}}
@php $cls = $cls ?? 'w-12 h-10'; $accent = $tj['c']['accent']; $accent2 = $tj['c']['accent2']; @endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    <circle cx="47" cy="46" r="21" fill="none" stroke="{{ $accent }}" stroke-width="2.2"/>
    <circle cx="73" cy="46" r="21" fill="none" stroke="{{ $accent2 }}" stroke-width="2.2"/>
    <path d="M60 34 V58 M48 46 H72" stroke="{{ $accent }}" stroke-width="1.2" opacity=".55"/>
    <path d="M30 84 H90" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".7"/>
</svg>
