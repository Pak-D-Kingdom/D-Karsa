@php
    /**
     * Template 09 — Adat Jawa / Minimalis Modern / Monochrome
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `collage`, palette per tema.
     */
    $tj = [
        'num' => 9,
        'key' => 'jawa-sekar-jagad',
        'name' => 'Sekar Jagad',
        'sub' => 'Minimalis Modern',
        'palette' => 'Monochrome',
        'culture' => 'jawa',
        'gate' => 'gunungan',
        'hero' => 'diagonal',
        'gallery' => 'column',
        'motif' => 'Parang Grayscale & Wayang',
        'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80',
        'c' => [
            'bg' => '#F4F4F4',
            'surface' => '#FFFFFF',
            'ink' => '#1A1A1A',
            'soft' => '#5C5C5C',
            'accent' => '#9A9A9A', 'onAccent' => '#111111',
            'accent2' => '#D8D8D8',
            'deep' => '#111111',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
