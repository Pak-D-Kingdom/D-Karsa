{{-- Paket Premium (Rp110.000): gerbang geser datar, kartu ornate, tiket bergerigi. --}}
    {{-- ================= GERBANG / AMPLOP (z-30 / z-35) ================= --}}
    @if($isCorporate)
        <div id="envelope-stage" class="env-hidden">
            <div class="env-flap" id="envFlap"></div>
            <div class="env-pocket" id="envPocket"></div>
        </div>
    @else
        <div id="gate-overlay">
            <div id="gate-veil" aria-hidden="true"></div>
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
                    {!! $icon('mail') !!} [ BUKA UNDANGAN ]
                </button>
            </div>
        </div>
    @endif

    {{-- ================= KONTEN (z-10) ================= --}}
    <main id="invitation-content" class="relative z-10 flex flex-col gap-8 px-5 pt-6 pb-40">
        @if($isCorporate)
            <div class="flex justify-center">
                <button type="button" class="btn-gold" id="btn-open-invitation" onclick="DKarsaOpen()">
                    {!! $icon('mail') !!} [ BUKA AMPLOP UNDANGAN ]
                </button>
            </div>
        @endif

        {{-- 1. HERO --}}
        <section class="reveal text-center">
            <div class="gal-hero mx-auto" style="width:clamp(140px,42vw,190px);height:clamp(190px,52vw,250px)">
                <img id="previewCoverPhotoImg" src="{{ $coverImg }}" alt="Potret {{ $hostName }}" style="height:100%">
            </div>
            <span class="eyebrow block mt-4">{{ $copy['eyebrow'] }}</span>
            <h1 class="serif text-[clamp(1.7rem,6vw,2.1rem)] leading-tight mt-1" style="color:var(--on-surface)">{{ $hostName }}</h1>
            @if($isWedding && ! empty($couple->quote))
                <p class="text-[13px] italic mt-3 mx-auto max-w-[19rem]" style="color:var(--muted)">&ldquo;{{ $couple->quote }}&rdquo;</p>
            @endif
            <p class="text-[13px] mt-2" style="color:var(--muted)">{{ $dateLong }}</p>
            <div class="sec-rule"><span></span><i></i><span></span></div>
        </section>

        {{-- 2. PROFIL --}}
        <section id="profil" class="reveal">
            <div class="flex items-end justify-between px-1 mb-2">
                <div>
                    <span class="eyebrow">{{ $isWedding ? 'KEDUA CALON' : $copy['profile'] }}</span>
                    <h2 class="serif text-[22px] mt-0.5" style="color:var(--on-surface)">
                        {{ $isWedding ? 'Mempelai' : ($cat === 'graduate' ? 'Wisudawan' : ($cat === 'birthday' ? 'Bintang Pesta' : 'Keluarga')) }}
                    </h2>
                </div>
                <span class="pill">{{ $palette }}</span>
            </div>
            @if($isWedding)
                <div class="card">
                    <div class="flex items-center gap-3">
                        <img loading="lazy" decoding="async" id="previewGroomPhotoImg" src="{{ $groomImg }}" alt="{{ $couple->groom_fullname ?? $couple->groom_name }}" style="width:86px;height:112px;border-radius:999px 999px 10px 10px;object-fit:cover;border:1px solid color-mix(in srgb, var(--gold) 45%, transparent)">
                        <div class="min-w-0">
                            <span class="hud" style="color:var(--silver)">MEMPELAI PUTRA</span>
                            <h3 class="serif text-[19px] leading-tight" style="color:var(--on-surface)">{{ $couple->groom_fullname ?? $couple->groom_name }}</h3>
                            <p class="text-[12px] mt-0.5" style="color:var(--muted)">Putra dari <span id="previewGroomParentsText">{{ \App\Services\TemplateManager::formatParentNames($couple->groom_father ?? null, $couple->groom_mother ?? null, $couple->groom_parents ?? 'Bapak & Ibu Keluarga') }}</span></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center my-4">
                        <span class="serif italic text-[22px]" style="color:var(--foil)">&amp;</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img loading="lazy" decoding="async" id="previewBridePhotoImg" src="{{ $brideImg }}" alt="{{ $couple->bride_fullname ?? $couple->bride_name }}" style="width:86px;height:112px;border-radius:999px 999px 10px 10px;object-fit:cover;border:1px solid color-mix(in srgb, var(--gold) 45%, transparent)">
                        <div class="min-w-0">
                            <span class="hud" style="color:var(--silver)">MEMPELAI PUTRI</span>
                            <h3 class="serif text-[19px] leading-tight" style="color:var(--on-surface)">{{ $couple->bride_fullname ?? $couple->bride_name }}</h3>
                            <p class="text-[12px] mt-0.5" style="color:var(--muted)">Putri dari <span id="previewBrideParentsText">{{ \App\Services\TemplateManager::formatParentNames($couple->bride_father ?? null, $couple->bride_mother ?? null, $couple->bride_parents ?? 'Bapak & Ibu Keluarga') }}</span></p>
                        </div>
                    </div>
                </div>
            @else
                <div class="card text-center">
                    <img loading="lazy" decoding="async" src="{{ $groomImg }}" alt="{{ $hostName }}" style="width:96px;height:96px;border-radius:999px;object-fit:cover;border:2px solid var(--foil);margin:0 auto">
                    <h3 class="serif text-[20px] mt-3" style="color:var(--on-surface)">{{ $couple->host_fullname ?? $hostName }}</h3>
                    @if($cat === 'birthday' && ! empty($couple->age_badge))
                        <span class="pill mt-2">🎉 {{ $couple->age_badge }}</span>
                    @endif
                    @if($cat === 'graduate')
                        <div class="grid grid-cols-2 gap-2 mt-4 text-left">
                            <div class="plaque"><span class="hud" style="color:var(--silver)">GELAR / JURUSAN</span><b class="block text-[13px] mt-1">{{ $couple->degree ?? 'Sarjana Komputer' }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">KAMPUS</span><b class="block text-[13px] mt-1">{{ $couple->campus ?? $venueName }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">ANGKATAN</span><b class="block text-[13px] mt-1">{{ $couple->class_year ?? $targetDate->format('Y') }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">PREDIKAT</span><b class="block text-[13px] mt-1">{{ $couple->honours ?? 'Cum Laude' }}</b></div>
                        </div>
                    @endif
                    @if($cat === 'aqiqah')
                        <div class="grid grid-cols-2 gap-2 mt-4 text-left">
                            <div class="plaque"><span class="hud" style="color:var(--silver)">TANGGAL LAHIR</span><b class="block text-[13px] mt-1">{{ $couple->birth_date ?? $targetDate->copy()->subMonths(2)->isoFormat('D MMM Y') }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">JAM LAHIR</span><b class="block text-[13px] mt-1">{{ $couple->birth_time ?? '07.15 WIB' }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">BERAT</span><b class="block text-[13px] mt-1">{{ $couple->birth_weight ?? '3,2 kg' }}</b></div>
                            <div class="plaque"><span class="hud" style="color:var(--silver)">PANJANG</span><b class="block text-[13px] mt-1">{{ $couple->birth_length ?? '49 cm' }}</b></div>
                        </div>
                    @endif
                    @if($cat === 'corporate')
                        <p class="text-[13px] mt-3" style="color:var(--muted)">{{ $couple->organizer_name ?? $hostName }} · {{ $couple->event_heading ?? 'Agenda Resmi' }}</p>
                    @endif
                </div>
            @endif
        </section>


        {{-- 4. COUNTDOWN --}}
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

        {{-- 5. ACARA / TIKET JADWAL --}}
        <section id="acara" class="reveal">
            <span class="eyebrow">{{ $copy['agenda'] }}</span>
            <h2 class="serif text-[22px] mt-0.5 mb-3" style="color:var(--on-surface)">{{ $isWedding ? 'Akad & Resepsi' : 'Jadwal Acara' }}</h2>
            <div class="space-y-3">
                @forelse($couple->events ?? collect() as $ev)
                    <div class="ticket">
                        <span class="notch l"></span><span class="notch r"></span>
                        <div class="flex items-center justify-between">
                            <span class="hud" style="color:var(--foil)">{{ strtoupper($ev->title ?: 'ACARA') }}</span>
                            {!! $icon('ticket') !!}
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

        {{-- 6. LOKASI: satu kartu peta per acara --}}
        <section id="lokasi" class="reveal">
            <div class="space-y-3">
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
                    <div class="card" id="map-card-event-{{ $venueIndex + 1 }}">
                        <span class="eyebrow">{{ strtoupper($cardTitle) }}</span>
                        <h2 class="serif text-[20px] mt-0.5" style="color:var(--on-surface)">{{ $cardVenue }}</h2>
                        @if($cardAddress !== '')
                            <p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $cardAddress }}</p>
                        @endif
                        <div class="mt-3">
                            <div class="map-facade" role="button" tabindex="0"
                                 data-map-src="{{ $cardEmbed }}"
                                 data-map-title="Peta {{ $cardVenue }}"
                                 onclick="DKarsaLoadMap(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaLoadMap(this);}">
                                <span class="map-facade-pin" aria-hidden="true">◉</span>
                                <b class="map-facade-label">Muat Peta Interaktif</b>
                                <span class="map-facade-note">{{ $cardVenue }}</span>
                            </div>
                        </div>
                        <a id="btn-map-event-{{ $venueIndex + 1 }}" href="{{ $cardDirections }}" target="_blank" rel="noopener noreferrer" class="btn-gold w-full mt-3" style="text-decoration:none">
                            {!! $icon('pin') !!} PETUNJUK GOOGLE MAPS
                        </a>
                    </div>
                @empty
                    <div class="card" id="map-card-event-1">
                        <span class="eyebrow">{{ $copy['venue'] }}</span>
                        <h2 class="serif text-[20px] mt-0.5" style="color:var(--on-surface)">{{ $venueName }}</h2>
                        @if($venueAddress !== '')<p class="text-[12.5px] mt-1" style="color:var(--muted)">{{ $venueAddress }}</p>@endif
                        <div class="mt-3">
                            <div class="map-facade" role="button" tabindex="0"
                                 data-map-src="{{ $mapsEmbed }}" data-map-title="Peta {{ $venueName }}"
                                 onclick="DKarsaLoadMap(this)" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaLoadMap(this);}">
                                <span class="map-facade-pin" aria-hidden="true">◉</span>
                                <b class="map-facade-label">Muat Peta Interaktif</b>
                                <span class="map-facade-note">{{ $venueName }}</span>
                            </div>
                        </div>
                        <a id="btn-map-event-1" href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="btn-gold w-full mt-3" style="text-decoration:none">
                            {!! $icon('pin') !!} PETUNJUK GOOGLE MAPS
                        </a>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- 7. GALERI --}}
        <section id="galeri" class="reveal">
            <span class="eyebrow">{{ $copy['gallery'] }}</span>
            <h2 class="serif text-[22px] mt-0.5 mb-3" style="color:var(--on-surface)">Momen Bahagia</h2>
            <div id="previewGalleryGrid" class="grid grid-cols-2 gap-2">
                @foreach($galleryItems->take(4) as $g)
                    <img loading="lazy" decoding="async" src="{{ \App\Services\TemplateManager::resolvePhotoUrl($g->image ?? '', $coverImg) }}" alt="Foto galeri" onclick="DKarsaLightbox(this.src)" style="width:100%;height:132px;object-fit:cover;border-radius:10px;border:1px solid color-mix(in srgb, var(--gold) 22%, transparent);cursor:pointer">
                @endforeach
            </div>
        </section>

        {{-- 8. RSVP --}}
        <section id="rsvp" class="reveal">
            <div class="card">
                <span class="eyebrow">{{ $copy['rsvp'] }}</span>
                <h2 class="serif text-[22px] mt-0.5" style="color:var(--on-surface)">{{ $isCorporate ? 'Registrasi Peserta' : 'Konfirmasi Kehadiran' }}</h2>
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

        {{-- 9. KARTU QR TAMU --}}
        @include('templates.partials.guest-pass')

        {{-- 10. KARTU ATM & KADO --}}
        @include('templates.partials.digital-gift')

        {{-- 11. UCAPAN & DOA --}}
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

        {{-- 12. PENUTUP --}}
        <section id="penutup" class="reveal text-center pb-4">
            <div class="flex justify-center">
                {!! $icon('sparkle') !!}
            </div>
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

