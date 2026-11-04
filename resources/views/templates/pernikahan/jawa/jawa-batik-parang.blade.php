@php
    /**
     * Template 04 — Adat Jawa / Geometris / Sage Green
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `column`, palette per tema.
     */
    $tj = [
        'num' => 4,
        'key' => 'jawa-batik-parang',
        'name' => 'Batik Parang',
        'sub' => 'Geometris',
        'palette' => 'Sage Green',
        'culture' => 'jawa',
        'gate' => 'gebyok',
        'hero' => 'mask',
        'gallery' => 'mosaic',
        'motif' => 'Geometri Truntum & Parang',
        'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80',
        'c' => [
            'bg' => '#F3F6F1',
            'surface' => '#FDFEFA',
            'ink' => '#22301F',
            'soft' => '#5C6B52',
            'accent' => '#A8B58C', 'onAccent' => '#141311',
            'accent2' => '#D9E2C8',
            'deep' => '#1C2A18',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
