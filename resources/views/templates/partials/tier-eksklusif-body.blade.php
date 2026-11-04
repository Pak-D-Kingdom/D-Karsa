{{--
    Paket EKSKLUSIF (Rp180.000) — 3D V-Angle Gate + 2.5D Parallax + Partikel.
    Mengikuti layar Stitch Eksklusif: gerbang V-angle dengan bingkai samping, lapisan parallax,
    partikel kelopak, kartu foil timbul, galeri bento 1+4, dresscode, live streaming.
--}}

{{-- Lapisan parallax & partikel (z-20 / z-25) --}}
<div id="parallax-particle-layer" aria-hidden="true">
    <span class="orn orn-1">{!! $icon('sparkle', 26, 1.2) !!}</span>
    <span class="orn orn-2">{!! $icon('heart', 22, 1.2) !!}</span>
    <span class="orn orn-3">{!! $icon('sparkle', 18, 1.2) !!}</span>
    <span class="orn orn-4">{!! $icon('seal', 20, 1.2) !!}</span>
</div>
<canvas id="particle-canvas" aria-hidden="true"></canvas>

{{-- Gerbang: amplop 3D untuk Acara Formal, V-Angle untuk kategori lain --}}
@if($isCorporate)
    <div id="envelope-stage" class="env-hidden">
        <div class="env-flap" id="envFlap"></div>
        <div class="env-pocket" id="envPocket"></div>
        <div class="env-seal" id="gateSeal">
            <span class="env-wax">{{ $icon('seal', 30, 1.4) }}</span>
            <span class="eyebrow mt-3">{{ $copy['hero'] }}</span>
            <h1 class="serif text-[24px] leading-tight mt-1" style="color:var(--foil)">{{ $hostName }}</h1>
            <p class="text-[12px] mt-1" style="color:var(--muted)">{{ $dateLong }}</p>
            <div class="plate mt-4" style="padding:10px 16px">
                <span class="hud" style="color:var(--silver)">KEPADA YTH.</span>
                <b id="gate-guest-name" class="block text-[15px] mt-0.5" style="color:var(--on-surface)">{{ $guest->name ?? 'Bapak/Ibu/Saudara/i Tamu Kehormatan' }}</b>
            </div>
            <button type="button" class="btn-gold mt-4" id="btn-open-invitation" onclick="DKarsaOpen()">
                {{ $icon('mail', 18, 1.7) }} [ BUKA AMPLOP UNDANGAN ]
            </button>
        </div>
    </div>
@else

<div id="gate-overlay">
    <div id="gate-veil" aria-hidden="true"></div>
    <div class="gate-frame left" aria-hidden="true"></div>
    <div class="gate-frame right" aria-hidden="true"></div>
    <div class="gate-door left" id="gateDoorLeft"></div>
    <div class="gate-door right" id="gateDoorRight"></div>
    <div id="gate-seam" aria-hidden="true"></div>
    <div class="gate-seal" id="gateSeal">
        <div class="plate">
            <span class="eyebrow">{{ $copy['hero'] }}</span>
            <h1 class="serif text-[26px] leading-tight mt-1" style="color:var(--foil)">{{ $hostName }}</h1>
            <p class="text-[12px] mt-1" style="color:var(--muted)">{{ $dateLong }}</p>
        </div>
        <div class="plate" style="margin-bottom:14px;padding:10px 16px">
            <span class="hud" style="color:var(--silver)">KEPADA YTH.</span>
            <b id="gate-guest-name" class="block text-[15px] mt-0.5" style="color:var(--on-surface)">{{ $guest->name ?? 'Bapak/Ibu/Saudara/i Tamu Kehormatan' }}</b>
        </div>
        <button type="button" class="btn-gold" id="btn-open-invitation" onclick="DKarsaOpen()">
            {!! $icon('mail', 18, 1.7) !!} [ {{ $isCorporate ? 'BUKA AMPLOP UNDANGAN' : 'BUKA UNDANGAN' }} ]
        </button>
    </div>
</div>
@endif

<main id="invitation-content" class="relative z-10 flex flex-col gap-8 px-5 pt-6 pb-32">
    {{-- 1. Hero --}}
    <section class="reveal text-center">
        <div class="gal-hero mx-auto" style="width:clamp(150px,46vw,200px);height:clamp(200px,56vw,262px)">
            <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Potret {{ $hostName }}" style="height:100%">
        </div>
        <span class="eyebrow block mt-4">{{ $copy['eyebrow'] }}</span>
        <h1 class="serif text-[clamp(1.75rem,6.4vw,2.2rem)] leading-tight mt-1" style="color:var(--on-surface)">{{ $hostName }}</h1>
        <p class="text-[13px] mt-2" style="color:var(--muted)">{{ $dateLong }}</p>
        <div class="sec-rule"><span></span><i></i><span></span></div>
    </section>

    {{-- 2. Ayat / kutipan --}}
    <section class="reveal">
        <div class="card text-center" style="padding:18px 20px">
            <span class="eyebrow">{{ $isWedding ? 'Ayat Suci' : 'Kutipan' }}</span>
            <p class="serif italic text-[15px] leading-relaxed mt-2" style="color:var(--on-surface)">
                &ldquo;{{ $couple->quote ?? 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup dari jenismu sendiri, supaya kamu merasa tenteram dan tenang di sampingnya.' }}&rdquo;
            </p>
            <span class="hud block mt-2" style="color:var(--foil)">{{ $isWedding ? 'QS. Ar-Rum : 21' : 'D\'Karsa Heritage' }}</span>
        </div>
    </section>

    {{-- 3. Mempelai / profil --}}
    <section id="profil" class="reveal">
        <div class="flex items-end justify-between px-1 mb-2">
            <div>
                <span class="eyebrow">{{ $isWedding ? 'KEDUA CALON' : $copy['profile'] }}</span>
                <h2 class="serif text-[22px] mt-0.5" style="color:var(--on-surface)">{{ $isWedding ? 'Mempelai' : 'Profil' }}</h2>
            </div>
            <span class="pill">{{ $palette }}</span>
        </div>
        @if($isWedding)
            <div class="grid grid-cols-2 gap-3">
                @foreach([
                    ['label' => 'PUTRA', 'name' => $couple->groom_fullname ?? $couple->groom_name, 'img' => $groomImg, 'parents' => \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga'), 'id' => 'previewGroomPhotoImg'],
                    ['label' => 'PUTRI', 'name' => $couple->bride_fullname ?? $couple->bride_name, 'img' => $brideImg, 'parents' => \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga'), 'id' => 'previewBridePhotoImg'],
                ] as $person)
                    <article class="card text-center" style="padding:14px 12px">
                        <img loading="lazy" decoding="async" id="{{ $person['id'] }}" src="{{ $person['img'] }}" alt="{{ $person['name'] }}" class="couple-portrait" style="width:100%;aspect-ratio:3/4;object-fit:cover;border-radius:110px 110px 10px 10px;border:1px solid color-mix(in srgb,var(--gold) 40%,transparent)">
                        <span class="hud block mt-2" style="color:var(--foil)">{{ $person['label'] }}</span>
                        <h3 class="serif text-[15px] leading-tight mt-0.5" style="color:var(--on-surface)">{{ $person['name'] }}</h3>
                        <p class="text-[11px] mt-1" style="color:var(--muted)">{{ $person['parents'] }}</p>
                    </article>
                @endforeach
            </div>
        @else
            <div class="card text-center">
                <img loading="lazy" decoding="async" src="{{ $groomImg }}" alt="{{ $hostName }}" style="width:104px;height:104px;border-radius:999px;object-fit:cover;border:2px solid var(--foil);margin:0 auto">
                <h3 class="serif text-[20px] mt-3" style="color:var(--on-surface)">{{ $couple->host_fullname ?? $hostName }}</h3>
                <p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $couple->organizer_name ?? $copy['profile'] }}</p>
            </div>
        @endif
    </section>

    {{-- 4. Cerita --}}
    @if($story->isNotEmpty())
        <section id="cerita" class="reveal">
            <span class="eyebrow">Perjalanan</span>
            <h2 class="serif text-[22px] mt-0.5 mb-3" style="color:var(--on-surface)">Langkah Menuju Hari Ini</h2>
            <div class="timeline">
                @foreach($story as $beat)
                    <div class="timeline-item">
                        <span class="timeline-dot"></span>
                        <span class="hud" style="color:var(--foil)">{{ $beat->year }}</span>
                        <h3 class="serif text-[16px] mt-0.5" style="color:var(--on-surface)">{{ $beat->title }}</h3>
                        <p class="text-[13px] mt-1" style="color:var(--muted)">{{ $beat->text }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- 5. Countdown --}}
    <section id="hitung" class="reveal">
        <div class="card text-center">
            <span class="eyebrow">Menuju {{ $copy['hero'] }}</span>
            <div class="grid grid-cols-4 gap-2 mt-3">
                @foreach(['cdDays' => 'HARI', 'cdHours' => 'JAM', 'cdMinutes' => 'MENIT', 'cdSeconds' => 'DETIK'] as $id => $lbl)
                    <div class="plaque">
                        <span id="{{ $id }}" class="serif text-[22px] font-bold block" style="color:var(--foil);font-variant-numeric:tabular-nums">00</span>
                        <span class="hud block mt-1" style="color:var(--silver)">{{ $lbl }}</span>
                    </div>
                @endforeach
            </div>
            <p class="text-[12px] mt-3" style="color:var(--muted)">{{ $dateLong }}</p>
        </div>
    </section>

    {{-- 6. Tiket acara --}}
    <section id="acara" class="reveal">
        <span class="eyebrow">{{ $copy['agenda'] }}</span>
        <h2 class="serif text-[22px] mt-0.5 mb-3" style="color:var(--on-surface)">{{ $isWedding ? 'Akad & Resepsi' : 'Jadwal Acara' }}</h2>
        <div class="space-y-3">
            @forelse($couple->events ?? collect() as $ev)
                <div class="ticket">
                    <span class="notch l"></span><span class="notch r"></span>
                    <div class="flex items-center justify-between">
                        <span class="hud" style="color:var(--foil)">{{ strtoupper($ev->title ?: 'ACARA') }}</span>
                        {!! $icon('ticket', 16, 1.5) !!}
                    </div>
                    <p class="text-[13px] mt-2" style="color:var(--on-surface)">
                        {{ ! empty($ev->date) ? \Carbon\Carbon::parse($ev->date)->locale('id')->isoFormat('dddd, D MMMM Y') : $dateLong }}
                    </p>
                    <p class="text-[12px]" style="color:var(--muted)">{{ $ev->start_time ?: '08.00' }}{{ ! empty($ev->end_time) ? ' — ' . $ev->end_time : '' }} WIB</p>
                    <p class="text-[13px] mt-1" style="color:var(--on-surface)">{{ $ev->venue_name ?: $venueName }}</p>
                    @if(! empty($ev->address))
                        <p class="text-[12px] mt-0.5" style="color:var(--muted)">{{ $ev->address }}</p>
                    @endif
                </div>
            @empty
                <div class="ticket">
                    <span class="notch l"></span><span class="notch r"></span>
                    <span class="hud" style="color:var(--foil)">ACARA</span>
                    <p class="text-[13px] mt-2">{{ $dateLong }} · {{ $venueName }}</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- 7. Lokasi --}}
    <section id="lokasi" class="reveal">
        <div class="card">
            <span class="eyebrow">{{ $copy['venue'] }}</span>
            <h2 class="serif text-[20px] mt-0.5" style="color:var(--on-surface)">{{ $venueName }}</h2>
            @if($venueAddress !== '')<p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $venueAddress }}</p>@endif
            <div class="map-facade mt-3" role="button" tabindex="0"
                     data-map-src="{{ $mapsEmbed }}"
                     data-map-title="Peta {{ $venueName }}"
                     onclick="DKarsaLoadMap(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaLoadMap(this);}">
                    <span class="map-facade-pin" aria-hidden="true">◉</span>
                    <b class="map-facade-label">Muat Peta Interaktif</b>
                    <span class="map-facade-note">{{ $venueName }}</span>
                </div>
            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" class="btn-gold w-full mt-3" style="text-decoration:none">
                {!! $icon('pin', 18, 1.6) !!} PETUNJUK GOOGLE MAPS
            </a>
        </div>
    </section>

    {{-- 8. Dresscode + live streaming --}}
    <section id="dresscode" class="reveal">
        <div class="card">
            <span class="eyebrow">Dresscode</span>
            <h2 class="serif text-[19px] mt-0.5" style="color:var(--on-surface)">Palet {{ $palette }}</h2>
            <div class="flex items-center gap-2 mt-3">
                @foreach([$c['accent'], $c['accent2'], $c['deep'], '#E5C158', '#e7e1de'] as $swatch)
                    <span style="width:34px;height:34px;border-radius:999px;background:{{ $swatch }};border:1px solid color-mix(in srgb,var(--gold) 45%,transparent)"></span>
                @endforeach
            </div>
            <div class="mt-4 flex items-center justify-between gap-2" style="border-top:1px solid color-mix(in srgb,var(--gold) 18%,transparent);padding-top:12px">
                <div>
                    <span class="hud" style="color:var(--silver)">LIVE STREAMING</span>
                    <p class="text-[12px]" style="color:var(--muted)">Saksikan acara secara langsung</p>
                </div>
                <a href="{{ $couple->live_stream_url ?? '#' }}" target="_blank" rel="noopener" class="pill">TONTON</a>
            </div>
        </div>
    </section>

    {{-- 9. Galeri bento 1+4 --}}
    <section id="galeri" class="reveal">
        <span class="eyebrow">{{ $copy['gallery'] }}</span>
        <h2 class="serif text-[22px] mt-0.5 mb-3" style="color:var(--on-surface)">Momen Bahagia</h2>
        <div id="previewGalleryGrid" class="bento">
            <div class="bento-main">
                <img loading="lazy" decoding="async" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($galleryItems[0]->image ?? '', $coverImg) }}" alt="Foto utama" onclick="DKarsaLightbox(this.src)">
            </div>
            @foreach($galleryItems->slice(1, 4) as $g)
                <div class="bento-cell">
                    <img loading="lazy" decoding="async" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', $coverImg) }}" alt="Foto galeri" onclick="DKarsaLightbox(this.src)">
                </div>
            @endforeach
        </div>
    </section>

    @if(! empty($bespoke))
        {{-- KUSTOM: Cinema Video Highlight --}}
        <section id="video" class="reveal">
            <div class="card">
                <span class="eyebrow">Cinema Highlight</span>
                <h2 class="serif text-[20px] mt-0.5" style="color:var(--on-surface)">Film Pendek Kami</h2>
                <button type="button" class="video-poster mt-3" onclick="DKarsaVideo()" aria-label="Putar video highlight">
                    <img loading="lazy" decoding="async" src="{{ $coverImg }}" alt="Poster video">
                    <span class="video-play">▶</span>
                </button>
            </div>
        </section>
    @endif

    {{-- 10. RSVP --}}
    <section id="rsvp" class="reveal">
        <div class="card">
            <span class="eyebrow">{{ $copy['rsvp'] }}</span>
            <h2 class="serif text-[22px] mt-0.5" style="color:var(--on-surface)">Konfirmasi Kehadiran</h2>
            <div class="sec-rule" style="justify-content:flex-start"><span></span><i></i><span></span></div>
            <form id="rsvp" action="{{ route('invitation.wish') }}" method="POST" onsubmit="return DKarsaRsvpSubmit(this, event)" class="space-y-3 mt-4">
                @csrf
                @if(! empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
                @if(! empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
                <input type="hidden" name="category" value="{{ $copy['eyebrow'] }}">
                <input type="hidden" name="message" value="Konfirmasi kehadiran melalui formulir RSVP.">
                <label class="block">
                    <span class="hud block mb-1" style="color:var(--silver)">NAMA LENGKAP</span>
                    <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Nama Lengkap Tamu" class="field">
                </label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="attendance" value="hadir" class="peer sr-only" checked>
                        <span class="toggle-card">✓ HADIR</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="attendance" value="tidak_hadir" class="peer sr-only">
                        <span class="toggle-card">✕ BERHALANGAN</span>
                    </label>
                </div>
                <label class="block">
                    <span class="hud block mb-1" style="color:var(--silver)">JUMLAH ORANG YANG HADIR</span>
                    <input type="number" name="guest_count" id="guestCountInput" class="field" value="1" min="1" max="20" step="1" inputmode="numeric" required>
                </label>
                <button type="submit" class="btn-gold w-full">KIRIM KONFIRMASI RSVP</button>
            </form>
        </div>
    </section>

    @if(! empty($bespoke))
        {{-- KUSTOM: Interactive Seat / Table Lookup --}}
        <section id="seat-lookup" class="reveal">
            <div class="card">
                <span class="eyebrow">Table Lookup</span>
                <h2 class="serif text-[19px] mt-0.5" style="color:var(--on-surface)">Cari Meja Anda</h2>
                <div class="flex gap-2 mt-3">
                    <input type="text" id="seatLookupInput" class="field" placeholder="Ketik nama tamu / nomor meja">
                    <button type="button" class="btn-gold" style="min-height:46px;padding:0 18px" onclick="DKarsaSeatLookup()">CARI</button>
                </div>
                <p id="seatLookupResult" class="text-[12.5px] mt-2" style="color:var(--muted)">Masukkan nama atau nomor meja untuk melihat posisi.</p>
            </div>
        </section>
    @endif

    {{-- 11. QR tamu (VIP boarding pass + laser scan) --}}
    @include('templates.partials.guest-pass')

    {{-- 12. Kado metalik --}}
    @include('templates.partials.digital-gift')

    @if(! empty($bespoke))
        {{-- KUSTOM: QRIS + Gift Wishlist --}}
        <section id="qris" class="reveal">
            <div class="card text-center">
                <span class="eyebrow">QRIS &amp; Wishlist</span>
                <h2 class="serif text-[19px] mt-0.5" style="color:var(--on-surface)">Hadiah Digital</h2>
                <div class="qris-box mt-3">
                    <div class="qris-grid" aria-hidden="true"></div>
                    <span class="hud block mt-2" style="color:var(--slate-ink)">SCAN QRIS</span>
                </div>
                <div class="mt-4 flex flex-col gap-2 text-left">
                    @foreach(['Sepeda lipat untuk bulan madu', 'Set peralatan dapur premium', 'Dana bulan madu Bali'] as $wish)
                        <label class="note-card flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="wish-check">
                            <span class="text-[12.5px]" style="color:var(--on-surface)">{{ $wish }}</span>
                        </label>
                    @endforeach
                </div>
                <button type="button" class="btn-gold w-full mt-3" onclick="DKarsaWishlist()">SIMPAN WISHLIST</button>
            </div>
        </section>
    @endif

    {{-- 13. Doa & ucapan --}}
    <section id="doa" class="reveal">
        <div class="card">
            <span class="eyebrow">{{ $copy['wishes'] }}</span>
            <h2 class="serif text-[22px] mt-0.5" style="color:var(--on-surface)">Ucapan &amp; Doa</h2>
            <div class="sec-rule" style="justify-content:flex-start"><span></span><i></i><span></span></div>
            <div class="guestbook-feed space-y-2 mt-4">
                @forelse($wishes ?? collect() as $w)
                    <div class="note-card">
                        <div class="flex items-center gap-2">
                            <span class="avatar-initial">{{ mb_substr($w->name ?? 'T', 0, 1) }}</span>
                            <div class="min-w-0 flex-1">
                                <b class="block text-[13px] truncate" style="color:var(--on-surface)">{{ $w->name }}</b>
                                <span class="text-[10px]" style="color:var(--muted)">{{ ! empty($w->created_at) ? \Carbon\Carbon::parse($w->created_at)->diffForHumans() : 'Baru saja' }}</span>
                            </div>
                        </div>
                        <p class="text-[13px] mt-1.5" style="color:var(--muted)">{{ $w->message }}</p>
                    </div>
                @empty
                    <p class="text-center text-[13px] py-4" style="color:var(--muted)">Belum ada ucapan. Jadilah yang pertama memberi doa restu.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 14. Penutup --}}
    <section id="penutup" class="reveal text-center pb-4">
        <div class="flex justify-center">{!! $icon('sparkle', 30, 1.3) !!}</div>
        <h2 class="serif italic text-[22px] mt-2" style="color:var(--on-surface)">Terima Kasih</h2>
        <p class="text-[13px] mt-2 mx-auto max-w-[19rem]" style="color:var(--muted)">Merupakan suatu kebahagiaan dan kehormatan bagi kami atas kehadiran serta doa restu Bapak/Ibu/Saudara/i.</p>
        <span class="eyebrow block mt-5">{{ $copy['closing'] }}</span>
        <p class="serif text-[18px] mt-1" style="color:var(--foil)">{{ $hostName }}</p>
        <p class="text-[11px] mt-1" style="color:var(--muted)">Beserta Seluruh Keluarga Besar</p>
        <div class="mt-6 flex flex-col items-center gap-1">
            <span class="hud" style="color:var(--muted)">{{ $tj['name'] }} • {{ $palette }}</span>
            <span class="hud" style="color:var(--muted)">Bespoke <b style="color:var(--foil)">D&rsquo;Karsa Heritage</b></span>
            <span class="text-[10px]" style="color:var(--muted)">&copy; {{ date('Y') }} D&rsquo;Karsa. All Rights Reserved.</span>
            <span class="text-[10px]" style="color:var(--muted);opacity:.85">Designed with Love by D&rsquo;Karsa</span>
        </div>
    </section>
</main>
