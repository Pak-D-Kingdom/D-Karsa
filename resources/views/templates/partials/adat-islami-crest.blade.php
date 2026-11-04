{{-- Crest Islami — bintang delapan penjuru + bulan sabit. --}}
@php $cls = $cls ?? 'w-12 h-10'; $accent = $tj['c']['accent']; $accent2 = $tj['c']['accent2']; @endphp
<svg viewBox="0 0 120 100" class="{{ $cls }}" aria-hidden="true" focusable="false">
    <path d="M60 14 L70 38 L94 48 L70 58 L60 82 L50 58 L26 48 L50 38 Z" fill="none" stroke="{{ $accent }}" stroke-width="2.4"/>
    <path d="M60 28 L65 42 L79 48 L65 54 L60 68 L55 54 L41 48 L55 42 Z" fill="{{ $accent2 }}" opacity=".45"/>
    <circle cx="60" cy="46" r="6" fill="none" stroke="{{ $accent }}" stroke-width="1.6"/>
    <circle cx="63" cy="44" r="4.6" fill="{{ $tj['c']['surface'] }}"/>
    <path d="M28 86 H92" stroke="{{ $accent2 }}" stroke-width="1.4" opacity=".7"/>
</svg>
