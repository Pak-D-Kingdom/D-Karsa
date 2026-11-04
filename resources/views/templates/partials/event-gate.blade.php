{{--
    Gate art for event categories (birthday V-angle / aqiqah / religious / graduate straight doors).
    Parameters: $tj (config), $side ('left'|'right').
    One <g> mirrored for right side; keep ornaments slim near the inner seam.
--}}
@php
    $accent = $tj['c']['accent'] ?? '#C9A050';
    $accent2 = $tj['c']['accent2'] ?? '#E6D3AE';
    $deep = $tj['c']['deep'] ?? '#2a2a26';
    $cat = $tj['culture'] ?? 'birthday';
    $mirror = $side === 'right';
@endphp
<svg viewBox="0 0 320 640" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="eg-{{ $side }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" stop-color="{{ $deep }}" stop-opacity=".98"/>
            <stop offset=".55" stop-color="{{ $deep }}"/>
            <stop offset="1" stop-color="{{ $accent }}" stop-opacity=".22"/>
        </linearGradient>
    </defs>
    <rect width="320" height="640" fill="url(#eg-{{ $side }})"/>

    <g @if($mirror) transform="translate(320,0) scale(-1,1)" @endif>
        @if($cat === 'birthday')
            {{-- balloons + garland strands hugging the inner seam --}}
            <g stroke="{{ $accent }}" fill="none" stroke-width="1.2" opacity=".8">
                <path d="M292 40 C 300 80 296 120 290 160 C 284 200 288 240 292 280 C 296 320 290 360 292 400 C 294 440 288 480 290 520 C 292 560 288 600 290 640"/>
                <path d="M280 40 C 288 90 284 140 278 190 C 272 240 276 290 280 340 C 284 390 278 440 280 490 C 282 540 278 590 280 640" opacity=".5"/>
            </g>
            <g fill="{{ $accent }}" opacity=".55">
                <circle cx="291" cy="60" r="7"/><circle cx="283" cy="120" r="6"/><circle cx="289" cy="190" r="8"/><circle cx="281" cy="260" r="6"/><circle cx="291" cy="330" r="7"/><circle cx="283" cy="410" r="8"/><circle cx="289" cy="490" r="6"/><circle cx="281" cy="570" r="7"/>
            </g>
            <g stroke="{{ $accent2 }}" stroke-width="1" fill="none" opacity=".6">
                <path d="M300 100 l-6 -14 m0 14 l6 -14"/>
                <path d="M300 220 l-6 -14 m0 14 l6 -14"/>
                <path d="M300 360 l-6 -14 m0 14 l6 -14"/>
                <path d="M300 500 l-6 -14 m0 14 l6 -14"/>
            </g>
        @elseif($cat === 'aqiqah')
            @if(in_array($tj['kind'], ['aqiqah', ''], true))
                {{-- Mihrab domes / fanoos stack --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.3">
                    <path d="M292 90 h-18 a9 9 0 0 1 0-18 h18" opacity=".9"/>
                    <path d="M292 210 h-26 a13 13 0 0 1 0-26 h26" opacity=".8"/>
                    <path d="M292 350 h-18 a9 9 0 0 1 0-18 h18" opacity=".9"/>
                    <path d="M292 470 h-26 a13 13 0 0 1 0-26 h26" opacity=".8"/>
                </g>
                <g fill="{{ $accent2 }}" opacity=".5">
                    <circle cx="286" cy="81" r="3"/><circle cx="280" cy="198" r="3.5"/><circle cx="286" cy="341" r="3"/><circle cx="280" cy="458" r="3.5"/>
                </g>
            @elseif($tj['kind'] === 'birth')
                {{-- tree of life cradle arch --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M290 120 C 270 140 250 160 250 190 C 250 250 290 300 290 360" opacity=".9"/>
                    <path d="M290 120 C 300 140 312 160 312 190 C 312 250 290 300 290 360" opacity=".5"/>
                    <path d="M290 200 l-22 -26 M290 240 l22 -22 M290 290 l-18 -18" opacity=".7"/>
                </g>
            @elseif($tj['kind'] === 'tasmiyah')
                {{-- mashrabiya lattice --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1">
                    <path d="M286 60 L306 80 L286 100 L266 80 Z"/>
                    <path d="M286 180 L306 200 L286 220 L266 200 Z"/>
                    <path d="M286 300 L306 320 L286 340 L266 320 Z"/>
                    <path d="M286 420 L306 440 L286 460 L266 440 Z"/>
                    <path d="M286 540 L306 560 L286 580 L266 560 Z"/>
                </g>
                <g fill="{{ $accent2 }}" opacity=".5"><circle cx="286" cy="80" r="3"/><circle cx="286" cy="200" r="3"/><circle cx="286" cy="320" r="3"/><circle cx="286" cy="440" r="3"/><circle cx="286" cy="560" r="3"/></g>
            @else
                {{-- khitan: royal keraton islamic arches --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.3">
                    <path d="M292 100 h-30 a15 15 0 0 1 0-30 h30" opacity=".9"/>
                    <path d="M292 100 h-24 v-40" opacity=".6"/>
                    <path d="M292 300 h-30 a15 15 0 0 1 0-30 h30" opacity=".9"/>
                    <path d="M292 500 h-30 a15 15 0 0 1 0-30 h30" opacity=".9"/>
                </g>
                <g fill="{{ $accent2 }}" opacity=".5"><circle cx="283" cy="72" r="3"/><circle cx="283" cy="272" r="3"/><circle cx="283" cy="472" r="3"/></g>
            @endif
        @elseif($cat === 'religious')
            @if($tj['kind'] === 'maulid')
                {{-- nabawi dome + sholawat seal --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M290 130 h-22 a30 30 0 0 1 0-60 h22" opacity=".9"/>
                    <path d="M290 130 h-22 v-18" opacity=".5"/>
                    <path d="M268 70 l0 -30 m8 18 l0 -30" opacity=".5"/>
                    <circle cx="279" cy="100" r="8" opacity=".7"/>
                </g>
            @elseif($tj['kind'] === 'bukber')
                {{-- art deco ramadan lanterns --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M290 90 h-20 l-10 18 v-8 l10 18 h20 l-10 -18 v8 z" opacity=".85"/>
                    <path d="M290 250 h-20 l-10 18 v-8 l10 18 h20 l-10 -18 v8 z" opacity=".85"/>
                    <path d="M290 410 h-20 l-10 18 v-8 l10 18 h20 l-10 -18 v8 z" opacity=".85"/>
                    <path d="M280 60 v12 M280 234 v12 M280 394 v12" opacity=".5"/>
                </g>
            @elseif($tj['kind'] === 'safar')
                {{-- haramain arch --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.3">
                    <path d="M292 120 h-28 a14 14 0 0 1 0-28 h28" opacity=".9"/>
                    <path d="M292 120 h-28 v-50" opacity=".5"/>
                    <path d="M278 56 v-24" opacity=".6"/>
                    <path d="M292 360 h-28 a14 14 0 0 1 0-28 h28" opacity=".9"/>
                    <path d="M292 600 h-28 a14 14 0 0 1 0-28 h28" opacity=".9"/>
                </g>
            @elseif($tj['kind'] === 'halalbi')
                {{-- eid ketupat weave --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1">
                    <path d="M272 60 l24 14 l-24 14 l-24 -14 z"/>
                    <path d="M272 180 l24 14 l-24 14 l-24 -14 z"/>
                    <path d="M272 300 l24 14 l-24 14 l-24 -14 z"/>
                    <path d="M272 420 l24 14 l-24 14 l-24 -14 z"/>
                    <path d="M272 540 l24 14 l-24 14 l-24 -14 z"/>
                </g>
                <path d="M272 74 l24 14 M248 74 l24 -14 M272 194 l24 14 M248 194 l24 -14" stroke="{{ $accent }}" stroke-width=".8" opacity=".5"/>
            @elseif($tj['kind'] === 'tasyakuran')
                {{-- botanical watercolor arch --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.1">
                    <path d="M290 110 C 268 110 254 130 254 160 C 254 210 290 250 290 300" opacity=".85"/>
                    <path d="M262 150 c 4 -8 10 -12 18 -12 M262 180 c 4 -6 10 -10 16 -10 M262 210 c 4 -5 8 -8 12 -8" opacity=".6"/>
                    <path d="M290 380 C 270 380 256 400 256 430 C 256 480 290 520 290 570" opacity=".85"/>
                </g>
            @else
                {{-- pengajian: mosque mihrab --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.3">
                    <path d="M292 120 h-32 a16 16 0 0 1 0-32 h32" opacity=".9"/>
                    <path d="M292 120 h-32 v-52" opacity=".5"/>
                    <path d="M260 52 a8 8 0 0 1 8 -8 a8 8 0 0 1 8 8" opacity=".7"/>
                    <path d="M292 360 h-32 a16 16 0 0 1 0-32 h32" opacity=".9"/>
                    <path d="M292 600 h-32 a16 16 0 0 1 0-32 h32" opacity=".9"/>
                </g>
                <g fill="{{ $accent2 }}" opacity=".5"><circle cx="276" cy="96" r="3.5"/><circle cx="276" cy="336" r="3.5"/><circle cx="276" cy="576" r="3.5"/></g>
            @endif
        @elseif($cat === 'graduate')
            @if($tj['sub'] === 'Tradisional Nusantara')
                {{-- nusantara batik gebyok + toga crest --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.1">
                    <path d="M290 90 h-26 l-13 -20 v-10 l13 20 h26 z" opacity=".85"/>
                    <path d="M290 300 h-26 l-13 -20 v-10 l13 20 h26 z" opacity=".85"/>
                    <path d="M290 510 h-26 l-13 -20 v-10 l13 20 h26 z" opacity=".85"/>
                </g>
                <path d="M277 90 l-9 -14 M277 300 l-9 -14 M277 510 l-9 -14" stroke="{{ $accent2 }}" stroke-width="1" opacity=".6"/>
            @elseif($tj['sub'] === 'Tropical')
                {{-- tropical palms --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M290 80 C 268 110 250 150 250 200" opacity=".85"/>
                    <path d="M252 150 c 8 -14 18 -20 30 -22 M260 180 c 6 -10 14 -15 22 -16" opacity=".6"/>
                    <path d="M290 360 C 270 390 254 430 254 480" opacity=".85"/>
                    <path d="M256 430 c 8 -14 18 -20 30 -22 M264 460 c 6 -10 14 -15 22 -16" opacity=".6"/>
                </g>
            @elseif($tj['sub'] === 'Vintage')
                {{-- yearbook iron gates --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M282 40 v560 M306 40 v560" opacity=".6"/>
                    <path d="M282 90 h24 M282 210 h24 M282 330 h24 M282 450 h24 M282 570 h24" opacity=".5"/>
                    <path d="M294 90 a6 6 0 0 1 0 12 M294 210 a6 6 0 0 1 0 12 M294 330 a6 6 0 0 1 0 12 M294 450 a6 6 0 0 1 0 12" opacity=".7"/>
                </g>
            @else
                {{-- university pillars + laurel wreath --}}
                <g stroke="{{ $accent }}" fill="none" stroke-width="1.2">
                    <path d="M282 60 h-12 v520 h12" opacity=".85"/>
                    <path d="M282 60 h-12 v-8" opacity=".5"/>
                    <path d="M288 140 c -4 10 -10 14 -18 14 c -8 0 -14 -4 -18 -14" opacity=".7"/>
                    <path d="M288 300 c -4 10 -10 14 -18 14 c -8 0 -14 -4 -18 -14" opacity=".7"/>
                    <path d="M288 460 c -4 10 -10 14 -18 14 c -8 0 -14 -4 -18 -14" opacity=".7"/>
                </g>
                <g fill="{{ $accent2 }}" opacity=".5"><circle cx="270" cy="74" r="3"/><circle cx="270" cy="314" r="3"/><circle cx="270" cy="474" r="3"/></g>
            @endif
        @endif
    </g>
</svg>
