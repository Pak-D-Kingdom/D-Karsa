{{--
    Galeri — 4 varian layout, dipilih per template lewat $tj['gallery'].
    Varian: collage | mosaic | filmstrip | column
--}}
@php
    $variant = $tj['gallery'] ?? 'collage';
    $seed = (int) ($tj['num'] ?? 1) % 3;
    $imgs = collect();
    if (!empty($heroShot)) { $imgs->push($shot($heroShot)); }
    foreach ($floatShots as $g) { $imgs->push($shot($g)); }
    foreach ($extraShots as $g) { $imgs->push($shot($g)); }
    $imgs = $imgs->values();
@endphp

<div id="previewGalleryGrid" class="gal gal-{{ $variant }}" data-variant="{{ $variant }}" data-seed="{{ $seed }}">
    @switch($variant)
        @case('mosaic')
            <div class="mo-grid">
                @foreach($imgs->take(5) as $i => $url)
                    @php $cls = ['mo-a', 'mo-b', 'mo-c', 'mo-d', 'mo-e'][$i] ?? 'mo-e'; @endphp
                    <button type="button" class="{{ $cls }}" onclick="openLightbox('{{ $url }}')">
                        <img src="{{ $url }}" alt="Foto {{ $i + 1 }}">
                    </button>
                @endforeach
            </div>
            @break

        @case('filmstrip')
            <div class="fs-track">
                @foreach($imgs as $i => $url)
                    <button type="button" class="fs-card" onclick="openLightbox('{{ $url }}')">
                        <img src="{{ $url }}" alt="Foto {{ $i + 1 }}">
                    </button>
                @endforeach
            </div>
            <div class="fs-meta">
                <span class="fs-count"><b>01</b> / {{ str_pad($imgs->count(), 2, '0', STR_PAD_LEFT) }}</span>
                <span class="fs-hint">Geser foto</span>
            </div>
            @break





        @case('column')
            <div class="col-list">
                @foreach($imgs as $i => $url)
                    <figure class="col-item {{ $i % 2 === 0 ? 'col-left' : 'col-right' }}">
                        <button type="button" onclick="openLightbox('{{ $url }}')">
                            <img src="{{ $url }}" alt="Foto {{ $i + 1 }}">
                        </button>
                        <figcaption>{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</figcaption>
                    </figure>
                @endforeach
            </div>
            @break

        @default
            @if($imgs->isNotEmpty())
                <div class="gf-hero">
                    <button type="button" class="gallery-hero" onclick="openLightbox('{{ $imgs[0] }}')">
                        <img src="{{ $imgs[0] }}" alt="Foto utama">
                    </button>
                </div>
                @if($imgs->count() > 1)
                    <div class="gf-cluster gf-seed{{ $seed }}">
                        @foreach($imgs->slice(1, 4) as $i => $url)
                            <button type="button" class="gf-item gf-i{{ $i }}" data-speed="{{ [0.22, -0.3, 0.34, -0.18][$i % 4] }}"
                                    onclick="openLightbox('{{ $url }}')">
                                <span class="gf-mat"><img src="{{ $url }}" alt="Foto {{ $i + 2 }}"></span>
                            </button>
                        @endforeach
                    </div>
                @endif
                @if($imgs->count() > 5)
                    <div class="filmstrip mt-6">
                        @foreach($imgs->slice(5) as $i => $url)
                            <button type="button" class="gallery-cell" onclick="openLightbox('{{ $url }}')">
                                <img src="{{ $url }}" alt="Foto {{ $i + 6 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            @endif
    @endswitch
</div>
