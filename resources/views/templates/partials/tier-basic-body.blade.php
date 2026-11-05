{{--
    Paket BASIC (Rp50.000) — Essential Clean Edition.
    Mengikuti layar Stitch "[Jawa #001] Basic": sampul datar yang memudar, kartu 1px tanpa ornamen,
    galeri 2×2, QR ringkas, dua kartu ATM (BCA + Mandiri), tanpa daun gerbang / parallax / partikel.
--}}

{{-- Sampul datar: satu lapis, memudar saat dibuka --}}
<div id="gate-overlay" class="basic-cover">
    <div class="basic-cover-inner">
        <span class="eyebrow">{{ $copy['eyebrow'] }}</span>
        <h1 class="serif text-[27px] leading-tight mt-1" style="color:var(--on-surface)">{{ $hostName }}</h1>
        <p class="text-[12px] mt-1" style="color:var(--muted)">{{ $dateLong }}</p>

        <div class="basic-guest mt-6">
            <span class="hud" style="color:var(--silver)">KEPADA YTH.</span>
            <b id="gate-guest-name" class="block text-[15px] mt-0.5" style="color:var(--on-surface)">{{ $guest->name ?? 'Bapak/Ibu/Saudara/i Tamu Kehormatan' }}</b>
        </div>

        <button type="button" class="basic-btn mt-5" id="btn-open-invitation" onclick="DKarsaOpen()">
            {{ strtoupper($isCorporate ? '[ BUKA AMPLOP UNDANGAN ]' : '[ BUKA UNDANGAN ]') }}
        </button>
    </div>
</div>

<main id="invitation-content" class="relative z-10 flex flex-col gap-5 px-5 pt-5 pb-32">
    {{-- 1. Salam --}}
    <section class="reveal text-center pt-2">
        <span class="eyebrow">{{ $copy['eyebrow'] }}</span>
        <h2 class="serif text-[22px] mt-1" style="color:var(--on-surface)">{{ $copy['hero'] }}</h2>
        <p class="text-[13px] mt-2 mx-auto max-w-[19rem]" style="color:var(--muted)">
            {{ $isWedding ? 'Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan putra-putri kami.' : 'Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara kami.' }}
        </p>
    </section>

    {{-- 2. Profil --}}
    <section id="profil" class="reveal flex flex-col gap-3">
        @if($isWedding)
            @foreach([
                ['label' => 'MEMPELAI PUTRA', 'name' => $couple->groom_fullname ?? $couple->groom_name, 'img' => $groomImg, 'parents' => \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga'), 'id' => 'previewGroomPhotoImg'],
                ['label' => 'MEMPELAI PUTRI', 'name' => $couple->bride_fullname ?? $couple->bride_name, 'img' => $brideImg, 'parents' => \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga'), 'id' => 'previewBridePhotoImg'],
            ] as $person)
                <article class="basic-card">
                    <div class="flex items-center gap-3">
                        <img loading="lazy" decoding="async" id="{{ $person['id'] }}" src="{{ $person['img'] }}" alt="{{ $person['name'] }}" style="width:64px;height:64px;border-radius:8px;object-fit:cover">
                        <div class="min-w-0 text-left">
                            <span class="hud" style="color:var(--foil)">{{ $person['label'] }}</span>
                            <h3 class="serif text-[17px] leading-tight" style="color:var(--on-surface)">{{ $person['name'] }}</h3>
                            <p class="text-[12px]" style="color:var(--muted)">Putra/i dari {{ $person['parents'] }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <article class="basic-card text-center">
                <img loading="lazy" decoding="async" src="{{ $groomImg }}" alt="{{ $hostName }}" style="width:96px;height:96px;border-radius:8px;object-fit:cover;margin:0 auto">
                <h3 class="serif text-[19px] mt-2" style="color:var(--on-surface)">{{ $couple->host_fullname ?? $hostName }}</h3>
                <p class="text-[12px] mt-1" style="color:var(--muted)">{{ $couple->organizer_name ?? $copy['profile'] }}</p>
            </article>
        @endif
    </section>

    {{-- 3. Acara + hitung mundur --}}
    <section id="acara" class="reveal basic-card">
        <div class="text-center">
            <span class="eyebrow">{{ $copy['agenda'] }}</span>
            <h3 class="serif text-[19px] mt-1" style="color:var(--on-surface)">{{ $dateLong }}</h3>
        </div>
        <div class="flex flex-col gap-2 mt-3 text-left">
            @forelse($couple->events ?? collect() as $ev)
                <div class="basic-row">
                    <span class="hud" style="color:var(--foil)">{{ strtoupper($ev->title ?: 'ACARA') }}</span>
                    <p class="text-[13px]" style="color:var(--on-surface)">{{ $ev->start_time ?: '08.00' }}{{ ! empty($ev->end_time) ? ' — ' . $ev->end_time : '' }} WIB</p>
                    <p class="text-[12px]" style="color:var(--muted)">{{ $ev->venue_name ?: $venueName }}</p>
                </div>
            @empty
                <div class="basic-row">
                    <span class="hud" style="color:var(--foil)">ACARA</span>
                    <p class="text-[13px]" style="color:var(--on-surface)">{{ $dateLong }} · {{ $venueName }}</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- 4. Lokasi: satu kartu datar per acara --}}
    <section id="lokasi" class="reveal basic-card text-left">
        @php $venueCards = ($couple->events ?? collect()); @endphp
        @forelse($venueCards as $venueIndex => $venueEvent)
            @php
                $cardVenue = trim((string) ($venueEvent->venue_name ?: $venueName));
                $cardAddress = trim((string) ($venueEvent->address ?? ''));
                $cardQuery = trim($cardVenue . ' ' . $cardAddress);
                $cardRaw = trim((string) ($venueEvent->maps_url ?? ''));
                if (in_array($cardRaw, ['https://maps.google.com', 'http://maps.google.com', 'https://www.google.com/maps'], true)) {
                    $cardRaw = '';
                }
                $cardEmbed = \App\Services\TemplateManager::mapEmbedUrl($cardRaw, $cardQuery);
                $cardDirections = \App\Services\TemplateManager::mapDirectionsUrl($cardRaw, $cardQuery);
                $cardTitle = trim((string) ($venueEvent->title ?: 'Acara ' . ($venueIndex + 1)));
            @endphp
            <div class="basic-row mt-3" id="map-card-event-{{ $venueIndex + 1 }}">
                <span class="eyebrow">{{ strtoupper($cardTitle) }}</span>
                <h3 class="text-[15px] font-semibold mt-1" style="color:var(--on-surface)">{{ $cardVenue }}</h3>
                @if($cardAddress !== '')
                    <p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $cardAddress }}</p>
                @endif
                <div class="map-facade mt-3" role="button" tabindex="0"
                     data-map-src="{{ $cardEmbed }}"
                     data-map-title="Peta {{ $cardVenue }}"
                     onclick="DKarsaLoadMap(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaLoadMap(this);}">
                    <span class="map-facade-pin" aria-hidden="true">◉</span>
                    <b class="map-facade-label">Muat Peta Interaktif</b>
                    <span class="map-facade-note">{{ $cardVenue }}</span>
                </div>
                <a id="btn-map-event-{{ $venueIndex + 1 }}" href="{{ $cardDirections }}" target="_blank" rel="noopener noreferrer" class="basic-btn mt-3" style="text-decoration:none">[ PETUNJUK GOOGLE MAPS ]</a>
            </div>
        @empty
            <span class="eyebrow">{{ $copy['venue'] }}</span>
            <h3 class="text-[15px] font-semibold mt-1" style="color:var(--on-surface)">{{ $venueName }}</h3>
            @if($venueAddress !== '')
                <p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $venueAddress }}</p>
            @endif
            <div class="map-facade mt-3" role="button" tabindex="0"
                 data-map-src="{{ $mapsEmbed }}" data-map-title="Peta {{ $venueName }}"
                 onclick="DKarsaLoadMap(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaLoadMap(this);}">
                <span class="map-facade-pin" aria-hidden="true">◉</span>
                <b class="map-facade-label">Muat Peta Interaktif</b>
                <span class="map-facade-note">{{ $venueName }}</span>
            </div>
            <a id="btn-map-event-1" href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="basic-btn mt-3" style="text-decoration:none">[ PETUNJUK GOOGLE MAPS ]</a>
        @endforelse
    </section>

    {{-- 5. Galeri 2×2 --}}
    <section id="galeri" class="reveal">
        <div class="flex items-center justify-between mb-2">
            <span class="eyebrow">{{ $copy['gallery'] }}</span>
            <span class="hud" style="color:var(--silver)">2 FOTO</span>
        </div>
        <div id="previewGalleryGrid" class="flex flex-col gap-2">
            @foreach($galleryItems->take(2) as $g)
                <img loading="lazy" decoding="async" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', $coverImg) }}" alt="Foto galeri" onclick="DKarsaLightbox(this.src)" style="width:100%;height:176px;object-fit:cover;border-radius:8px;cursor:pointer">
            @endforeach
        </div>
    </section>

    {{-- 6. RSVP --}}
    <section id="rsvp" class="reveal basic-card text-left">
        <div class="flex items-center justify-between">
            <div>
                <span class="eyebrow">{{ $copy['rsvp'] }}</span>
                <h3 class="serif text-[19px] mt-0.5" style="color:var(--on-surface)">Konfirmasi Kehadiran</h3>
            </div>
            <span class="pill">KUOTA: 100 TAMU</span>
        </div>
        <form id="rsvp" action="{{ route('invitation.wish') }}" method="POST" onsubmit="return DKarsaRsvpSubmit(this, event)" class="space-y-3 mt-3">
            @csrf
            @if(! empty($couple->id))<input type="hidden" name="couple_id" value="{{ $couple->id }}">@endif
            @if(! empty($guest->slug))<input type="hidden" name="guest_slug" value="{{ $guest->slug }}">@endif
            <input type="hidden" name="category" value="{{ $copy['eyebrow'] }}">
            <input type="hidden" name="message" value="Konfirmasi kehadiran melalui formulir RSVP.">
            <label class="block">
                <span class="hud block mb-1" style="color:var(--silver)">NAMA LENGKAP</span>
                <input type="text" name="name" required value="{{ $guest->name ?? '' }}" placeholder="Ketik nama Anda" class="field">
            </label>
            <div class="grid grid-cols-3 gap-2">
                @foreach(['hadir' => 'HADIR', 'ragu' => 'RAGU', 'tidak_hadir' => 'TIDAK'] as $val => $lbl)
                    <label class="cursor-pointer">
                        <input type="radio" name="attendance" value="{{ $val }}" class="peer sr-only" @checked($val === 'hadir')>
                        <span class="toggle-card">{{ $lbl }}</span>
                    </label>
                @endforeach
            </div>
            <label class="block">
                <span class="hud block mb-1" style="color:var(--silver)">JUMLAH TAMU</span>
                <input type="number" name="guest_count" id="guestCountInput" class="field" value="1" min="1" max="20" step="1" inputmode="numeric" required>
            </label>
            <button type="submit" class="basic-btn w-full">[ KIRIM KONFIRMASI RSVP ]</button>
        </form>
    </section>

    {{-- 7. QR tamu --}}
    @include('templates.partials.guest-pass')

    {{-- 8. Kado: dua kartu ATM + alamat --}}
    @include('templates.partials.digital-gift')

    {{-- 9. Doa & ucapan --}}
    <section id="doa" class="reveal basic-card text-left">
        <span class="eyebrow">{{ $copy['wishes'] }}</span>
        <h3 class="serif text-[19px] mt-0.5" style="color:var(--on-surface)">Ucapan &amp; Doa</h3>
        <div class="guestbook-feed space-y-2 mt-3">
            @forelse($wishes ?? collect() as $w)
                <div class="basic-row">
                    <b class="block text-[13px]" style="color:var(--on-surface)">{{ $w->name }}</b>
                    <p class="text-[12.5px] mt-0.5" style="color:var(--muted)">{{ $w->message }}</p>
                </div>
            @empty
                <p class="text-center text-[13px] py-3" style="color:var(--muted)">Belum ada ucapan.</p>
            @endforelse
        </div>
    </section>

    {{-- 10. Penutup --}}
    <section id="penutup" class="reveal text-center pb-2">
        <p class="text-[13px] mx-auto max-w-[19rem] italic" style="color:var(--muted)">Merupakan suatu kehormatan atas kehadiran dan doa restu Bapak/Ibu/Saudara/i.</p>
        <span class="eyebrow block mt-4">{{ $copy['closing'] }}</span>
        <p class="serif text-[17px] mt-1" style="color:var(--foil)">{{ $hostName }}</p>
        <div class="mt-5 flex flex-col items-center gap-1">
            <span class="hud" style="color:var(--muted)">{{ $tj['name'] }} • {{ $palette }}</span>
            <span class="text-[10px]" style="color:var(--muted)">&copy; {{ date('Y') }} D&rsquo;Karsa</span>
            <span class="text-[10px]" style="color:var(--muted);opacity:.85">Designed with Love by D&rsquo;Karsa</span>
        </div>
    </section>
</main>
