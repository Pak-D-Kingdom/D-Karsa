@php
    /**
     * Template 18 — Adat Jawa / Geometris / Midnight Navy
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `mosaic`, palette per tema.
     */
    $tj = [
        'num' => 18,
        'key' => 'jawa-midnight-navy',
        'name' => 'Midnight Navy',
        'sub' => 'Geometris',
        'palette' => 'Midnight Navy',
        'culture' => 'jawa',
        'gate' => 'gebyok',
        'hero' => 'medallion',
        'gallery' => 'filmstrip',
        'motif' => 'Parang Emas & Kawung',
        'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80',
        'c' => [
            'bg' => '#0F1A2B',
            'surface' => '#16243A',
            'ink' => '#F3F6FB',
            'soft' => '#A9B8CC',
            'accent' => '#C9A050', 'onAccent' => '#060C16',
            'accent2' => '#E8D3A2',
            'deep' => '#060C16',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
