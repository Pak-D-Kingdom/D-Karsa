@php
    /**
     * Template 02 — Adat Jawa / Geometris / Clean White
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `mosaic`, palette per tema.
     */
    $tj = [
        'num' => 2,
        'key' => 'jawa-sekar-kedhaton',
        'name' => 'Sekar Kedhaton',
        'sub' => 'Geometris',
        'palette' => 'Clean White',
        'culture' => 'jawa',
        'gate' => 'gebyok',
        'hero' => 'medallion',
        'gallery' => 'filmstrip',
        'motif' => 'Geometri Kawung & Gebyok Putih',
        'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80',
        'c' => [
            'bg' => '#FBF9F4',
            'surface' => '#FFFFFF',
            'ink' => '#1B1A17',
            'soft' => '#5F5A52',
            'accent' => '#B08D57', 'onAccent' => '#141311',
            'accent2' => '#E8D3AE',
            'deep' => '#2A2A26',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
