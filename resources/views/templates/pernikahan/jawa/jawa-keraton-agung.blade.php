@php
    /**
     * Template 01 — Adat Jawa / Minimalis Modern / Ocean Blue
     * Shell bersama: gate V-Angle, hero frame, 12 seksi, galeri varian `collage`, palette per tema.
     */
    $tj = [
        'num' => 1,
        'key' => 'jawa-keraton-agung',
        'name' => 'Keraton Agung',
        'sub' => 'Minimalis Modern',
        'palette' => 'Ocean Blue',
        'culture' => 'jawa',
        'gate' => 'gunungan',
        'hero' => 'arch',
        'gallery' => 'mosaic',
        'motif' => 'Batik Kawung & Pilar Keraton',
        'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80',
        'c' => [
            'bg' => '#F2F6F8',
            'surface' => '#FDFEFF',
            'ink' => '#0C2A3A',
            'soft' => '#4A6472',
            'accent' => '#C9A050', 'onAccent' => '#141311',
            'accent2' => '#E6D3AE',
            'deep' => '#0A1F2B',
        ],
    ];
@endphp
@include('templates.partials.stitch-theme')
