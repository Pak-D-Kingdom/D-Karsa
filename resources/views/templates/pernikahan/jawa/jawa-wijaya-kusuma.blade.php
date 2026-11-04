@php
    /**
     * Template 08 — Adat Jawa / Geometris / Plum Velvet
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `column`, palette per tema.
     */
    $tj = [
        'num' => 8,
        'key' => 'jawa-wijaya-kusuma',
        'name' => 'Wijaya Kusuma',
        'sub' => 'Geometris',
        'palette' => 'Plum Velvet',
        'culture' => 'jawa',
        'gate' => 'gebyok',
        'hero' => 'medallion',
        'gallery' => 'filmstrip',
        'motif' => 'Geometri Wijaya Kusuma',
        'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80',
        'c' => [
            'bg' => '#F6EFF6',
            'surface' => '#FEFBFF',
            'ink' => '#2E1B2E',
            'soft' => '#6B5570',
            'accent' => '#B486A8', 'onAccent' => '#141311',
            'accent2' => '#E6D2E2',
            'deep' => '#241224',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
