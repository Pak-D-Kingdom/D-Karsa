@extends('layouts.app')

@section('title')
    {{ $hero['title'] }} – Layanan Undangan Digital
@endsection

@section('meta_description')
    {{ $hero['subtitle'] }} – Pesan undangan online cepat.
@endsection

@section('content')
        'heroVideo'    => $hero['heroVideo'] ?? null,
        'heroTitle'    => $hero['title'],
        'heroSubtitle' => $hero['subtitle'],
        'heroCtaText'  => $hero['ctaText'],
        'heroCtaLink'  => $hero['ctaLink'],
        'heroImage'    => $hero['heroImage'] ?? null,
        // $hero['videoUrl'] could be passed as $heroVideo if you have a video.
    ])

    <section class="max-w-5xl mx-auto px-6 py-12 text-center">
        <h2 class="font-serif text-3xl md:text-4xl font-semibold mb-4">Kenapa Pilih Kami?</h2>
        <ul class="grid md:grid-cols-3 gap-6 text-left">
            <li class="p-4 bg-white rounded-lg shadow">
                <p class="font-semibold text-gold mb-2">Desain Premium</p>
                <p class="text-sm text-ink/70">Template modern, dapat di‑custom sesuai tema.</p>
            </li>
            <li class="p-4 bg-white rounded-lg shadow">
                <p class="font-semibold text-gold mb-2">Mudah di‑Update</p>
                <p class="text-sm text-ink/70">Ubah konten kapanpun lewat admin Filament.</p>
            </li>
            <li class="p-4 bg-white rounded-lg shadow">
                <p class="font-semibold text-gold mb-2">Tanpa Batas Guest</p>
                <p class="text-sm text-ink/70">Undangan dapat dibagikan via link atau QR.</p>
            </li>
        </ul>
    </section>

    <section class="text-center py-12 bg-cream">
        <a href="{{ route('order.create') }}" class="bg-primary text-cream rounded-full px-8 py-3 font-medium hover:bg-primary/80 transition">
            {{ $hero['ctaText'] }}
        </a>
    </section>

    @include('partials.footer', ['couple' => (object)['groom_name'=>'','bride_name'=>'']])
@endsection
