{{--
    Crest for event categories (per-category emblem).
    Parameters: $tj (config), $cls (size class).
--}}
@php
    $cls = $cls ?? 'w-14 h-12';
    $accent = $tj['c']['accent'] ?? '#C9A050';
    $accent2 = $tj['c']['accent2'] ?? '#E6D3AE';
    $cat = $tj['culture'] ?? 'birthday';
@endphp
<svg viewBox="0 0 100 84" class="{{ $cls }}" aria-hidden="true" focusable="false">
    @if($cat === 'birthday')
        {{-- star milestone + balloon --}}
        <path d="M50 8 L60 34 L88 36 L66 53 L74 80 L50 64 L26 80 L34 53 L12 36 L40 34 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
        <path d="M50 22 L56 38 L72 40 L59 50 L63 66 L50 57 L37 66 L41 50 L28 40 L44 38 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
        <circle cx="50" cy="45" r="4" fill="{{ $accent }}"/>
    @elseif($cat === 'aqiqah')
        @if($tj['kind'] === 'birth')
            <path d="M50 8 C 30 30 22 52 26 76 L 74 76 C 78 52 70 30 50 8 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 24 C 38 40 34 54 36 66 M 64 66 C 66 54 62 40 50 24" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
            <circle cx="50" cy="14" r="3" fill="{{ $accent }}"/>
        @elseif($tj['kind'] === 'tasmiyah')
            <path d="M50 8 L76 34 L50 60 L24 34 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 22 L64 34 L50 46 L36 34 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
            <path d="M50 30 H70 M50 30 V34 M50 38 H30" stroke="{{ $accent }}" stroke-width="1.2" opacity=".8"/>
        @elseif($tj['kind'] === 'khitan')
            <path d="M50 6 C 68 24 78 48 76 74 L 24 74 C 22 48 32 24 50 6 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 22 C 60 36 66 50 66 64 L 34 64 C 34 50 40 36 50 22 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
            <circle cx="50" cy="46" r="5" fill="none" stroke="{{ $accent }}" stroke-width="1.2"/>
        @else
            <path d="M50 6 C 66 26 76 50 74 74 L 26 74 C 24 50 34 26 50 6 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 22 C 60 38 64 52 64 66 L 36 66 C 36 52 40 38 50 22 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
            <path d="M50 40 V60 M40 50 H60" stroke="{{ $accent }}" stroke-width="1.2" opacity=".8"/>
        @endif
    @elseif($cat === 'religious')
        @if($tj['kind'] === 'maulid')
            <path d="M50 12 C 30 30 24 48 28 66 L 72 66 C 76 48 70 30 50 12 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 30 V60" stroke="{{ $accent2 }}" stroke-width="1" opacity=".7"/>
            <circle cx="50" cy="40" r="4" fill="none" stroke="{{ $accent }}" stroke-width="1.2"/>
        @elseif($tj['kind'] === 'bukber')
            <path d="M42 10 L58 10 L66 30 L60 32 L58 40 L42 40 L40 32 L34 30 Z" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
            <path d="M50 40 V48 M42 48 H58" stroke="{{ $accent }}" stroke-width="1.2" opacity=".8"/>
        @elseif($tj['kind'] === 'safar')
            <path d="M50 10 L66 26 L66 64 L50 76 L34 64 L34 26 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 22 L60 32 L60 60 L50 68 L40 60 L40 32 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
        @elseif($tj['kind'] === 'halalbi')
            <path d="M50 12 L66 22 L66 60 L50 70 L34 60 L34 22 Z" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
            <path d="M50 22 L58 28 L58 54 L50 60 L42 54 L42 28 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
        @elseif($tj['kind'] === 'tasyakuran')
            <path d="M50 10 C 68 24 76 48 72 70 C 60 78 40 78 28 70 C 24 48 32 24 50 10 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <circle cx="50" cy="46" r="7" fill="none" stroke="{{ $accent }}" stroke-width="1.2"/>
            <circle cx="50" cy="46" r="2.5" fill="{{ $accent }}"/>
        @else
            <path d="M50 8 C 68 26 78 50 74 72 L 26 72 C 22 50 32 26 50 8 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
            <path d="M50 24 C 60 38 66 50 66 64 L 34 64 C 34 50 40 38 50 24 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
            <path d="M50 38 V58" stroke="{{ $accent }}" stroke-width="1.2" opacity=".8"/>
        @endif
    @elseif($cat === 'graduate')
        <path d="M50 6 L78 18 L50 30 L22 18 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
        <path d="M36 24 V44 C 36 52 42 56 50 56 C 58 56 64 52 64 44 V24" fill="none" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".9"/>
        <path d="M22 18 V52" stroke="{{ $accent }}" stroke-width="1.2" opacity=".6"/>
        <circle cx="50" cy="70" r="3" fill="{{ $accent }}"/>
    @else
        {{-- corporate: monogram seal --}}
        <path d="M50 8 L72 28 L72 54 C 72 66 60 76 50 80 C 40 76 28 66 28 54 L28 28 Z" fill="none" stroke="{{ $accent }}" stroke-width="2"/>
        <path d="M50 20 L64 34 L64 54 C 64 62 56 68 50 72 C 44 68 36 62 36 54 L36 34 Z" fill="none" stroke="{{ $accent2 }}" stroke-width="1" opacity=".8"/>
        <path d="M50 34 V58 M38 46 H62" stroke="{{ $accent }}" stroke-width="1.2" opacity=".8"/>
    @endif
</svg>
