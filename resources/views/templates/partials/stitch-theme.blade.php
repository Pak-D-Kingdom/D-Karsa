{{--
    D'Karsa — Stitch Invitation Shell.
    Mengikuti design project Stitch 8979726781266950837: obsidian + gold foil, Playfair Display,
    label Space Grotesk, kartu rounded-2xl, dock kaca, gerbang 2 daun dengan seal hub (atau amplop 3D
    untuk Acara Formal). Satu shell untuk 179 template × 4 paket; warna diambil dari $tj['c'].
--}}
@php
    $cat = $tj['culture'] ?? 'jawa';
    $isCorporate = $cat === 'corporate';
    // 9 archetype gerbang pernikahan (WED-001..090): bentuk pintu, segel, ornamen, partikel.
    $wed = \App\Services\TemplateManager::weddingArchetype($tj['key'] ?? '');
    $wedArt = $wed ? \App\Support\WeddingArchetypes::art($wed) : null;
    $defaultTier = 'eksklusif';
    $pkgName = strtolower((string) ($couple->package_name ?? ''));
    if (str_contains($pkgName, 'kustom') || str_contains($pkgName, 'luxury') || ! empty($couple->custom_design)) {
        $defaultTier = 'kustom';
    } elseif (str_contains($pkgName, 'premium')) {
        $defaultTier = 'premium';
    } elseif (str_contains($pkgName, 'basic')) {
        $defaultTier = 'basic';
    }
    $tierParam = in_array(request()->query('tier'), ['basic', 'premium', 'eksklusif', 'kustom'], true) ? request()->query('tier') : $defaultTier;
    $palette = $tj['palette'] ?? ($tj['name'] ?? '');
    $styleLabel = $tj['sub'] ?? '';

    $copy = match ($cat) {
        'birthday' => ['eyebrow' => 'UNDANGAN ULANG TAHUN', 'hero' => 'Perayaan Ulang Tahun', 'profile' => 'Yang Berulang Tahun', 'agenda' => 'Rundown Pesta', 'venue' => 'Lokasi Pesta', 'gallery' => 'Galeri Momen', 'rsvp' => 'Konfirmasi Kehadiran', 'wishes' => 'Ucapan & Doa', 'closing' => 'Sampai Jumpa di Pesta'],
        'aqiqah' => ['eyebrow' => 'UNDANGAN AQIQAH & KELAHIRAN', 'hero' => 'Tasyakuran Buah Hati', 'profile' => 'Buah Hati Kami', 'agenda' => 'Rundown Tasyakuran', 'venue' => 'Lokasi Tasyakuran', 'gallery' => 'Galeri Buah Hati', 'rsvp' => 'Konfirmasi Kehadiran', 'wishes' => 'Doa & Ucapan', 'closing' => 'Terima Kasih'],
        'religious' => ['eyebrow' => 'UNDANGAN KEAGAMAAN', 'hero' => 'Majelis & Tasyakuran', 'profile' => 'Tuan Rumah Majelis', 'agenda' => 'Rundown Majelis', 'venue' => 'Lokasi Majelis', 'gallery' => 'Galeri Majelis', 'rsvp' => 'Konfirmasi Jamaah', 'wishes' => 'Doa & Muhasabah', 'closing' => 'Jazakumullahu Khairan'],
        'graduate' => ['eyebrow' => 'UNDANGAN WISUDA & KELULUSAN', 'hero' => 'Syukuran Kelulusan', 'profile' => 'Wisudawan / Wisudawati', 'agenda' => 'Perjalanan Studi', 'venue' => 'Lokasi Syukuran', 'gallery' => 'Galeri Kelulusan', 'rsvp' => 'Konfirmasi Kehadiran', 'wishes' => 'Ucapan Selamat', 'closing' => 'Terima Kasih'],
        'corporate' => ['eyebrow' => 'UNDANGAN ACARA FORMAL', 'hero' => 'Agenda Resmi', 'profile' => 'Penyelenggara', 'agenda' => 'Rundown Acara', 'venue' => 'Venue & Akses', 'gallery' => 'Galeri Acara', 'rsvp' => 'Registrasi Peserta', 'wishes' => 'Papan Ucapan Selamat', 'closing' => 'Hormat Kami'],
        default => ['eyebrow' => 'UNDANGAN PERNIKAHAN', 'hero' => 'Pahargyan Dhaup Suci', 'profile' => 'Mempelai', 'agenda' => 'Rangkaian Acara', 'venue' => 'Lokasi Acara', 'gallery' => 'Galeri Bahagia', 'rsvp' => 'Konfirmasi Kehadiran', 'wishes' => 'Ucapan & Doa', 'closing' => 'Kami yang Berbahagia'],
    };
    $isWedding = ! in_array($cat, ['birthday', 'aqiqah', 'religious', 'graduate', 'corporate'], true);

    $hostName = $isWedding ? trim(($couple->groom_name ?? '') . ' & ' . ($couple->bride_name ?? '')) : (($couple->host_name ?? null) ?: ($couple->groom_name ?? 'Tamu'));
    $hostInitials = collect(preg_split('/\s*&\s*|\s+/', $hostName))->filter()->map(fn ($w) => mb_substr($w, 0, 1))->take(2)->implode('');
    $hostPhone = preg_replace('/\D/', '', (string) ($couple->customer_phone ?? '')) ?: '6281234567890';
    $firstEvent = ($couple->events ?? collect())->first();
    $venueName = $couple->venue_name ?? ($firstEvent->venue_name ?? 'Lokasi Acara');
    $venueAddress = $couple->venue_address ?? ($firstEvent->address ?? '');
    // Peta mengikuti tautan yang diisi pemesan; alamat hanya jadi cadangan.
    $mapQuery = trim(($venueName ?? '').' '.($venueAddress ?? ''));
    $mapsRaw = $mapsRaw = '';
    foreach ([($firstEvent->maps_url ?? null), ($couple->maps_url ?? null)] as $mapsCandidate) {
        $mapsCandidate = trim((string) $mapsCandidate);
        if ($mapsCandidate === '' || in_array($mapsCandidate, ['https://maps.google.com', 'http://maps.google.com', 'https://www.google.com/maps'], true)) {
            continue;
        }
        $mapsRaw = $mapsCandidate;
        break;
    }
    $mapsUrl = \App\Services\TemplateManager::mapDirectionsUrl($mapsRaw, $mapQuery);
    $mapsEmbed = \App\Services\TemplateManager::mapEmbedUrl($mapsRaw, $mapQuery);
    $dresscode = trim((string) (($couple->dresscode ?? null) ?: ''));

    // Warna dresscode pilihan pemesan (hex dipisah koma); kosong → pakai palet tema.
    $dresscodeColors = [];
    $rawDresscodeColors = trim((string) (($couple->dresscode_colors ?? null) ?: ''));
    if ($rawDresscodeColors !== '') {
        foreach (preg_split('/[,;]+/', $rawDresscodeColors) as $hexColor) {
            $hexColor = trim($hexColor);
            if (preg_match('/^#?[0-9a-fA-F]{6}$/', $hexColor)) {
                $dresscodeColors[] = str_starts_with($hexColor, '#') ? $hexColor : '#'.$hexColor;
            }
        }
    }
    $dresscodeColors = array_slice($dresscodeColors, 0, 4);
    $targetDate = ! empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date) : now()->addMonths(2);
    $dateLong = $targetDate->locale('id')->isoFormat('dddd, D MMMM Y');
    $coverImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->cover_photo ?? null, 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200');
    $groomImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->groom_photo ?? null, 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600');
    $brideImg = \App\Services\TemplateManager::resolvePhotoUrl($couple->bride_photo ?? null, 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600');
    $audioUrl = ! empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');
    $galleryItems = ($couple->galleries ?? collect())->count() > 0 ? $couple->galleries : collect([
        (object) ['image' => $coverImg],
        (object) ['image' => $groomImg],
        (object) ['image' => $brideImg],
        (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800'],
    ]);
    $story = collect();
    if (! empty($couple->story)) {
        $raw = $couple->story;
        if (is_string($raw)) { $decoded = json_decode($raw, true); $raw = is_array($decoded) ? $decoded : array_filter(array_map('trim', preg_split('/\r?\n/', $raw))); }
        foreach ((array) $raw as $beat) {
            if (is_array($beat)) { $story->push((object) ['year' => $beat['year'] ?? '', 'title' => $beat['title'] ?? '', 'text' => $beat['text'] ?? '']); }
            elseif (is_string($beat) && $beat !== '') {
                $parts = array_map('trim', explode('|', $beat));
                $story->push((object) ['year' => $parts[0] ?? '', 'title' => $parts[1] ?? '', 'text' => $parts[2] ?? ($parts[1] ?? $parts[0])]);
            }
        }
    }

    $banks = collect([
        ['name' => $couple->bank_name_1 ?? null, 'account' => $couple->bank_account_1 ?? null, 'holder' => $couple->bank_holder_1 ?? null],
        ['name' => $couple->bank_name_2 ?? null, 'account' => $couple->bank_account_2 ?? null, 'holder' => $couple->bank_holder_2 ?? null],
    ])->filter(fn ($b) => ! empty($b['account']));
    if ($banks->isEmpty()) { $banks = collect([['name' => 'BCA', 'account' => '0372918291', 'holder' => $couple->groom_name ?? 'Mempelai']]); }

    // Satu sumber harga & catatan paket (mengikuti label di layar Stitch).
    $tierMatrix = \App\Services\TemplateManager::tierMatrix();
    $tierInfo = $tierMatrix[$tierParam] ?? $tierMatrix['eksklusif'];
    $tierNote = $isCorporate ? $tierInfo['note_envelope'] : $tierInfo['note'];
    // Harga & pemilih paket hanya untuk halaman demo katalog — undangan jadi/uji tidak jualan.
    $showTierDock = request()->routeIs('invitation.demo');
    $tierMapJs = [];
    if ($showTierDock) {
        foreach ($tierMatrix as $tierKey => $tierRow) {
            $tierMapJs[$tierKey] = [
                'label' => strtoupper($tierRow['label']),
                'price' => $tierRow['price'],
                'note' => $isCorporate ? $tierRow['note_envelope'] : $tierRow['note'],
            ];
        }
    }

    $c = $tj['c'];

    // Aturan warna D'Karsa: palet siang/pastel & jewel memakai halaman terang.
    // Hanya Midnight Navy, Cyber Neon, dan Dark Mode yang boleh gelap.
    $colorTheme = \App\Support\ColorTheme::forPalette($palette, $c);
    $isNightPalette = \App\Support\ColorTheme::isNight($colorTheme);

    /* ---------- Studio kustom (paket Rp280.000) ----------
       Template tetap jadi fondasi; nilai di bawah hanya menimpa bagian yang dipilih pemesan.
       Saat tamu membuka link (?to=...), semua kontrol editor tidak ikut dirender. */
    $customRaw = $couple->custom_design ?? null;
    if (is_string($customRaw)) {
        $customRaw = json_decode($customRaw, true);
    }
    $custom = is_array($customRaw) ? $customRaw : [];
    $customColors = is_array($custom['colors'] ?? null) ? $custom['colors'] : [];
    foreach (['bg', 'card', 'accent', 'text', 'gate'] as $colorKey) {
        $hexValue = trim((string) ($customColors[$colorKey] ?? ''));
        if (preg_match('/^#?[0-9a-fA-F]{6}$/', $hexValue)) {
            $colorTheme[$colorKey === 'bg' ? 'page' : ($colorKey === 'card' ? 'card' : ($colorKey === 'text' ? 'text' : 'accent'))]
                = str_starts_with($hexValue, '#') ? $hexValue : '#'.$hexValue;
        }
    }
    if (! empty($custom['colors']['gate']) && preg_match('/^#?[0-9a-fA-F]{6}$/', (string) $custom['colors']['gate'])) {
        $gateHex = (string) $custom['colors']['gate'];
        $colorTheme['gate'] = str_starts_with($gateHex, '#') ? $gateHex : '#'.$gateHex;
    }

    // Direct URL parameter overrides for Kustom tier (cBg, cCard, cAcc, cTxt, etc.)
    // Nilai dibaca dari $kustomConfig (disaring controller) supaya tidak bisa menyuntik CSS.
    $kustomUrlColors = [
        'cBg' => 'page',
        'cCard' => 'card',
        'cAcc' => 'accent',
        'cTxt' => 'text',
    ];
    foreach ($kustomUrlColors as $paramName => $paletteKey) {
        $paramHex = trim((string) ($kustomConfig[$paramName] ?? ''));
        if ($paramHex !== '' && preg_match('/^#?[0-9a-fA-F]{6}$/', $paramHex)) {
            $colorTheme[$paletteKey] = str_starts_with($paramHex, '#') ? $paramHex : '#'.$paramHex;
        }
    }

    $isNightPalette = \App\Support\ColorTheme::isNight($colorTheme);

    $customGate = (string) ($kustomConfig['cGate'] ?? ($custom['gate'] ?? ''));
    $customParticle = (string) ($kustomConfig['cPart'] ?? ($custom['particle'] ?? ''));
    $customIntensity = (float) ($kustomConfig['cSpd'] ?? ($custom['intensity'] ?? 1));
    $customFont = (string) ($kustomConfig['cFont'] ?? ($custom['font'] ?? ''));
    $customFrame = (string) ($kustomConfig['cFrame'] ?? ($custom['frame'] ?? ''));
    $customOverlay = (int) ($kustomConfig['cOvr'] ?? ($custom['overlay'] ?? 55));
    $customGateLabel = trim((string) ($kustomConfig['cBtn'] ?? ($custom['gate_label'] ?? '')));
    $customQuoteText = trim((string) ($custom['quote_text'] ?? ''));
    $customQuoteSource = trim((string) ($custom['quote_source'] ?? ''));
    $customAudio = trim((string) ($custom['audio_url'] ?? ''));
    $customAudioStart = max(0, (int) ($custom['audio_start'] ?? 0));
    $customHidden = ! empty($kustomConfig['cHide'])
        ? array_filter(explode(',', (string) $kustomConfig['cHide']))
        : array_values(array_filter((array) ($custom['hide'] ?? []), 'is_string'));
    if (! empty($kustomConfig['cCov'])) {
        $coverImg = $kustomConfig['cCov'];
    }
    $icons = [
        'seal' => '<path d="M12 3l7 3v5c0 4.6-3 7.8-7 9.4C8 18.8 5 15.6 5 11V6z"/><path d="M12 15.2s-2.6-1.6-2.6-3.4A1.7 1.7 0 0112 10.6a1.7 1.7 0 012.6 1.2c0 1.8-2.6 3.4-2.6 3.4z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2.2"/><path d="M3.6 7.2l8.4 5.6 8.4-5.6"/>',
        'note' => '<circle cx="8" cy="12.5" r="2.4"/><path d="M10.4 12.5V4.6l7.2-1.6v7.9"/><circle cx="15.2" cy="11" r="2.4"/>',
        'pin' => '<path d="M12 21s7-5.7 7-11a7 7 0 10-14 0c0 5.3 7 11 7 11z"/><circle cx="12" cy="10" r="2.6"/>',
        'ticket' => '<path d="M4 8.5A1.5 1.5 0 015.5 7h13A1.5 1.5 0 0120 8.5v1.8a1.7 1.7 0 000 3.4v1.8a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 15.5v-1.8a1.7 1.7 0 000-3.4z"/><path d="M12 9.4v5.2"/>',
        'sparkle' => '<path d="M12 3.2l1.9 5.1 5.1 1.9-5.1 1.9L12 17.2l-1.9-5.1L5 10.2l5.1-1.9z"/><path d="M18.4 16.6l.8 2.1 2.1.8-2.1.8-.8 2.1-.8-2.1-2.1-.8 2.1-.8z"/>',
        'person' => '<circle cx="12" cy="8.2" r="3.8"/><path d="M4.6 20.6c.5-3.8 3.6-6.4 7.4-6.4s6.9 2.6 7.4 6.4"/>',
        'event' => '<rect x="3.4" y="5.2" width="17.2" height="15.4" rx="2.2"/><path d="M3.4 9.6h17.2M8.4 3.4v3.6M15.6 3.4v3.6"/>',
        'photo' => '<rect x="3.4" y="4.4" width="17.2" height="15.2" rx="2.2"/><circle cx="8.6" cy="9.6" r="1.6"/><path d="M20.6 15.8l-4.8-4.8L5 21"/>',
        'qr' => '<rect x="3.6" y="3.6" width="6.4" height="6.4" rx="1.2"/><rect x="14" y="3.6" width="6.4" height="6.4" rx="1.2"/><rect x="3.6" y="14" width="6.4" height="6.4" rx="1.2"/><path d="M14 14h2.6v2.6H14zM17.8 17.8h2.6v2.6h-2.6zM14 20.4h1.4M20.4 14v1.4"/>',
        'heart' => '<path d="M12 20.4s-7.4-4.6-7.4-9.6A4.2 4.2 0 0112 8.2a4.2 4.2 0 017.4 2.6c0 5-7.4 9.6-7.4 9.6z"/>',
    ];
    $icon = function (string $name, int $size = 18, float $width = 1.7) use ($icons): string {
        $body = $icons[$name] ?? '';

        return '<svg viewBox="0 0 24 24" width="' . $size . '" height="' . $size . '" fill="none" stroke="currentColor" '
            . 'stroke-width="' . $width . '" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" '
            . 'style="display:inline-block;vertical-align:-.18em">' . $body . '</svg>';
    };
    $hex2rgb = function (string $hex): string {
        $hex = ltrim($hex, '#');
        return hexdec(substr($hex, 0, 2)) . ',' . hexdec(substr($hex, 2, 2)) . ',' . hexdec(substr($hex, 4, 2));
    };
@endphp
<!DOCTYPE html>
<html lang="id" data-tier="{{ $tierParam }}" data-cat="{{ $cat }}" data-mode="{{ $colorTheme['mode'] }}" data-gate="{{ $customGate }}" data-font="{{ $customFont }}" data-frame="{{ $customFrame }}" data-custom-overlay="{{ $customOverlay }}" data-hide="{{ implode(',', $customHidden) }}"@if($wed) data-wed="{{ $wed }}"@endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>{{ $hostName }} — {{ $copy['hero'] }} | D'Karsa</title>
    <meta name="description" content="{{ $copy['eyebrow'] }} {{ $hostName }} — {{ $palette }}. Undangan digital D'Karsa.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    @if($customFont === 'heritage')
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
    @elseif($customFont === 'script')
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    @elseif($customFont === 'editorial')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @elseif($customFont === 'islamic')
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            @if($isNightPalette)
            --obsidian: {{ $colorTheme['page'] }};
            --navy: {{ $colorTheme['gate'] }};
            --surface: color-mix(in srgb, {{ $colorTheme['page'] }} 52%, #151311);
            --surface-container: {{ $colorTheme['card'] }};
            --surface-high: color-mix(in srgb, {{ $colorTheme['card'] }} 88%, {{ $colorTheme['page'] }});
            --gold: {{ $colorTheme['accent'] }};
            --foil: {{ $colorTheme['accent'] }};
            --gold-2: color-mix(in srgb, {{ $colorTheme['accent'] }} 40%, #FFFFFF);
            --silver: #C5BC9E;
            --on-surface: {{ $colorTheme['text'] }};
            --muted: color-mix(in srgb, {{ $colorTheme['text'] }} 62%, {{ $colorTheme['page'] }});
            --glass: rgba({{ $hex2rgb($colorTheme['gate']) }}, .72);
            --line: color-mix(in srgb, {{ $colorTheme['accent'] }} 28%, transparent);
            --line-strong: color-mix(in srgb, {{ $colorTheme['accent'] }} 55%, transparent);
            @else
            --obsidian: {{ $colorTheme['page'] }};
            --navy: {{ $colorTheme['gate'] }};
            --surface: {{ $colorTheme['page'] }};
            --surface-container: {{ $colorTheme['card'] }};
            --surface-high: color-mix(in srgb, {{ $colorTheme['card'] }} 92%, {{ $colorTheme['accent'] }});
            --gold: {{ $colorTheme['accent'] }};
            --foil: {{ $colorTheme['accent'] }};
            --gold-2: color-mix(in srgb, {{ $colorTheme['accent'] }} 55%, #FFFFFF);
            --silver: color-mix(in srgb, {{ $colorTheme['text'] }} 55%, {{ $colorTheme['page'] }});
            --on-surface: {{ $colorTheme['text'] }};
            --muted: color-mix(in srgb, {{ $colorTheme['text'] }} 66%, {{ $colorTheme['page'] }});
            --glass: rgba(255, 255, 255, .78);
            --line: color-mix(in srgb, {{ $colorTheme['accent'] }} 24%, transparent);
            --line-strong: color-mix(in srgb, {{ $colorTheme['accent'] }} 48%, transparent);
            @endif
            --dk-overlay: {{ $customOverlay }};
            /* alias untuk partial guest-pass & digital-gift */
            --bg: var(--surface);
            --ink: var(--on-surface);
            --soft: var(--muted);
            --accent: var(--gold);
            --accent-2: var(--gold-2);
            --deep: var(--navy);
            --accent-ink: var(--foil);
            --surface-2: var(--surface-container);
            --bg-page: var(--surface);
        }
        * { -webkit-tap-highlight-color: transparent; box-sizing: border-box; }
        html { scroll-behavior: smooth; overflow-x: clip; }
        body {
            margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; line-height: 1.6;
            background: var(--obsidian); color: var(--on-surface); overflow-x: clip;
            display: flex; justify-content: center;
        }
        .shell { width: 100%; max-width: 430px; min-height: 100dvh; position: relative; background: var(--surface); box-shadow: 0 0 60px rgba(0,0,0,.8); }
        .serif { font-family: 'Playfair Display', serif; }
        .label { font-family: 'Space Grotesk', sans-serif; text-transform: uppercase; letter-spacing: .18em; font-size: 10px; font-weight: 700; }
        .eyebrow { font-family: 'Space Grotesk', sans-serif; text-transform: uppercase; letter-spacing: .16em; font-size: 11px; font-weight: 700; color: var(--foil); }
        .hud { font-family: 'Space Grotesk', sans-serif; font-size: 10px; letter-spacing: .08em; font-weight: 600; }
        .muted { color: var(--muted); }
        .gold { color: var(--foil); }
        section[id] { scroll-margin-top: 92px; }

        /* ---------- latar taktil (z-0) ---------- */
        .bg-layer { position: fixed; inset: 0; z-index: 0; pointer-events: none; background: var(--surface); max-width: 430px; margin: 0 auto; }
        .bg-layer::after {
            content: ""; position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 1px 1px, rgba({{ $hex2rgb($c['accent']) }}, .16) 1px, transparent 0),
                radial-gradient(circle at 21px 21px, rgba({{ $hex2rgb($c['accent']) }}, .10) 1px, transparent 0);
            background-size: 42px 42px, 42px 42px;
            opacity: .5;
        }
        html[data-tier="basic"] .bg-layer::after { opacity: 0; }
        .page-photo { position: fixed; inset: 0; z-index: 0; pointer-events: none; max-width: 430px; margin: 0 auto; background-size: cover; background-position: center; opacity: .18;  }
        body.gate-locked .page-photo { opacity: 0; }

        /* ---------- top bar ---------- */
        .topbar { position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: 430px; z-index: 45; padding: 6px 20px 8px; background: color-mix(in srgb, var(--obsidian) 96%, transparent); box-shadow: 0 6px 18px -12px rgba(0,0,0,.45); }
        .topbar .row { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
        .topbar .dot { width: 8px; height: 8px; border-radius: 999px; background: var(--gold); box-shadow: 0 0 8px var(--gold); animation: pulse 2.4s ease-in-out infinite; }
        .topbar .pill { padding: 2px 8px; border-radius: 999px; background: var(--surface-high); color: var(--foil); white-space: nowrap; font-size: 9px; letter-spacing: .06em; }
        .topbar .row > span:last-child, .topbar .row > .pill { flex: 0 0 auto; }
        .topbar .eyebrow { font-size: 10px; }
        #top-customizer-dock { display: flex; align-items: center; justify-content: space-between; gap: 6px; overflow-x: auto; scrollbar-width: none; -webkit-overflow-scrolling: touch; }
        #top-customizer-dock::-webkit-scrollbar { display: none; }
        #top-customizer-dock > * { flex: 0 0 auto; }
        #top-customizer-dock .tier-pill { display: flex; gap: 2px; padding: 3px; border-radius: 999px; background: color-mix(in srgb, var(--navy) 72%, transparent); border: 1px solid color-mix(in srgb, var(--gold) 35%, transparent); }
        #top-customizer-dock button { border: 0; background: transparent; color: var(--on-surface); font-family: 'Space Grotesk', sans-serif; font-size: 9px; font-weight: 700; letter-spacing: .04em; padding: 4px 7px; border-radius: 999px; }
        #top-customizer-dock button[aria-pressed="true"] { background: var(--gold); color: #141311; }
        @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: .35; } }

        /* ---------- kartu ---------- */
        .card { position: relative; overflow: hidden; background: var(--surface-container); border-radius: 16px; padding: 20px; box-shadow: 0 18px 40px -30px rgba(0,0,0,.9); border: 1px solid color-mix(in srgb, var(--gold) 12%, transparent); }
        .card::before { content: ""; position: absolute; inset: 6px; border-radius: 12px; border: 1px solid color-mix(in srgb, var(--gold) 16%, transparent); pointer-events: none; }
        .card > * { position: relative; z-index: 1; }
        html[data-tier="basic"] .card { border-radius: 12px; box-shadow: none; }
        html[data-tier="basic"] .card::before { display: none; }
        html[data-tier="eksklusif"] .card, html[data-tier="kustom"] .card { background: linear-gradient(160deg, var(--surface-high), var(--surface-container) 55%, var(--navy)); border-color: color-mix(in srgb, var(--gold) 26%, transparent); }
        .sec-rule { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 10px; }
        .sec-rule span { height: 1px; width: 42px; background: linear-gradient(90deg, transparent, var(--gold)); }
        .sec-rule span:last-child { background: linear-gradient(270deg, transparent, var(--gold)); }
        .sec-rule i { width: 6px; height: 6px; transform: rotate(45deg); background: var(--gold); }
        .pill { display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; border-radius: 999px; font-family: 'Space Grotesk', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--foil); background: color-mix(in srgb, var(--gold) 14%, transparent); border: 1px solid color-mix(in srgb, var(--gold) 32%, transparent); }

        /* ---------- BASIC: sampul datar & kartu 1px (tanpa ornamen) ---------- */
        html[data-tier="basic"] .basic-cover { position: fixed; inset: 0; z-index: 30; display: flex; align-items: center; justify-content: center; background: var(--navy); padding: 28px; text-align: center; }
        html[data-tier="basic"] .basic-cover-inner { width: 100%; max-width: 340px; }
        html[data-tier="basic"] .basic-guest { background: color-mix(in srgb, var(--navy) 42%, #26231f); border: 1px solid rgba(255,255,255,.16); border-radius: 8px; padding: 12px; }
        html[data-tier="basic"] .basic-card { background: color-mix(in srgb, var(--navy) 55%, #151311); border: 1px solid rgba(255,255,255,.10); border-radius: 8px; padding: 16px; }
        html[data-tier="basic"] .basic-plaque { background: color-mix(in srgb, var(--navy) 72%, #151311); border-radius: 8px; padding: 8px 4px; text-align: center; }
        html[data-tier="basic"] .basic-row { background: color-mix(in srgb, var(--navy) 64%, #151311); border-radius: 8px; padding: 10px 12px; }
        html[data-tier="basic"] .basic-btn { display: flex; align-items: center; justify-content: center; width: 100%; min-height: 46px; border: 0; border-radius: 8px; background: var(--gold); color: #141311; font-family: 'Space Grotesk', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; cursor: pointer; }
        html[data-tier="basic"] .basic-btn:active { transform: scale(.98); }
        html[data-tier="basic"] .card { border-radius: 8px; }

        /* ---------- gerbang (z-30) ---------- */
        /* max-width 430px + margin auto: di desktop gerbang tetap selebar bingkai ponsel,
           jadi tampilan web dan mobile identik. */
        #gate-overlay { position: fixed; inset: 0; top: var(--topbar-h, 90px); z-index: 30; display: flex; align-items: center; justify-content: center; overflow: hidden; perspective: 1600px; perspective-origin: 50% 45%; max-width: 430px; margin-inline: auto; }
        #gate-overlay.gate-hidden { display: none; }
        .gate-door {
            position: absolute; top: 7%; bottom: 0; width: 50%;
            transition: transform 1.05s cubic-bezier(.16,1,.3,1), opacity .6s ease;
            backface-visibility: hidden;
            /* Lapisan luar = foil: setelah clip-path, tepi bentuk pintu jadi garis emas yang terbaca. */
            --door-angle: 90deg;
            background: linear-gradient(var(--door-angle), color-mix(in srgb, var(--foil) 96%, #fff) 0%, var(--gold) 16%, color-mix(in srgb, var(--gold) 60%, var(--navy)) 52%, color-mix(in srgb, var(--navy) 78%, #000) 100%);
            box-shadow: 0 22px 50px rgba(0,0,0,.55);
        }
        .gate-door.left { left: 0; transform-origin: left center; }
        .gate-door.right { right: 0; transform-origin: right center; --door-angle: 270deg; }
        .gate-door::before { content: ""; position: absolute; inset: 6px; pointer-events: none; opacity: 1;
            background-color: color-mix(in srgb, var(--navy) 62%, #5d574d);
            background-image:
                radial-gradient(120% 70% at 50% 0%, color-mix(in srgb, var(--gold) 18%, transparent), transparent 62%),
                linear-gradient(var(--door-angle, 165deg), color-mix(in srgb, var(--navy) 45%, #7a7367) 0%, color-mix(in srgb, var(--navy) 68%, #4a4741) 52%, color-mix(in srgb, var(--navy) 86%, #100e0c) 100%),
                repeating-linear-gradient(135deg, color-mix(in srgb, var(--foil) 12%, transparent) 0 1px, transparent 1px 18px);
        }
        .gate-door::after { content: ""; position: absolute; inset: 16px; border: 1px solid color-mix(in srgb, var(--foil) 30%, transparent); border-radius: 12px; pointer-events: none; }
        /* Sorot emas di tepi LUAR tiap daun, memudar ke arah tengah (segel tidak menutupinya). */
        .gate-door.left::before {
            box-shadow:
                inset 48px 0 60px -44px color-mix(in srgb, var(--foil) 34%, transparent),
                inset -40px 0 56px -44px rgba(0,0,0,.26);
        }
        /* Daun kanan dicerminkan (scaleX(-1)), jadi bayangan memakai nilai yang sama dengan daun kiri
           agar sorotnya tetap jatuh di tepi LUAR, bukan di tengah. */
        .gate-door.right::before {
            box-shadow:
                inset 48px 0 60px -44px color-mix(in srgb, var(--foil) 34%, transparent),
                inset -40px 0 56px -44px rgba(0,0,0,.26);
        }

        /* PREMIUM: dua daun datar lurus, tanpa kemiringan & tanpa relief */
        html[data-tier="premium"] .gate-door::before, html[data-tier="premium"] .gate-door::after { display: none; }
        html[data-tier="premium"] .gate-door.left { box-shadow: 2px 0 30px rgba(0,0,0,.6), inset 0 0 0 1px color-mix(in srgb, var(--foil) 14%, transparent); }
        html[data-tier="premium"] .gate-door.right { box-shadow: -2px 0 30px rgba(0,0,0,.6), inset 0 0 0 1px color-mix(in srgb, var(--foil) 14%, transparent); }

        /* EKSKLUSIF & KUSTOM: daun trapesium bersudut V (menyempit ke tengah) + relief timbul */
        html[data-tier="eksklusif"] .gate-door.left, html[data-tier="kustom"] .gate-door.left { width: 56%; clip-path: polygon(0 0, 100% 15%, 100% 85%, 0 100%); }
        html[data-tier="eksklusif"] .gate-door.right, html[data-tier="kustom"] .gate-door.right { width: 56%; clip-path: polygon(100% 0, 0 15%, 0 85%, 100% 100%); }
        /* Pernikahan: daun 56% digeser 6% keluar supaya tepi dalam keduanya bertemu tepat di 50%
           (garis emas di tengah, tidak ada celah gelap di sisi kiri). Non-pernikahan tetap tumpang tindih
           karena bentuk V-angle butuh tutupan di puncak tengah. */
        html[data-tier="eksklusif"][data-wed] .gate-door.left, html[data-tier="kustom"][data-wed] .gate-door.left { left: -6%; }
        html[data-tier="eksklusif"][data-wed] .gate-door.right, html[data-tier="kustom"][data-wed] .gate-door.right { right: -6%; }
        html[data-tier="eksklusif"] .gate-door, html[data-tier="kustom"] .gate-door {
            filter: drop-shadow(0 0 14px color-mix(in srgb, var(--foil) 42%, transparent)) drop-shadow(0 12px 30px rgba(0,0,0,.6));
        }


        /* BINGKAI TEATER PERMANEN (15%) — tetap ada setelah gerbang dibuka */
        #theatre-frame { position: fixed; inset: 0; z-index: 35; pointer-events: none; display: none; max-width: 430px; margin: 0 auto; }
        html[data-tier="eksklusif"] #theatre-frame, html[data-tier="kustom"] #theatre-frame { display: block; }
        #theatre-frame .pillar { position: absolute; top: 0; bottom: 0; width: 9%; background: linear-gradient(180deg, color-mix(in srgb, var(--navy) 88%, black), color-mix(in srgb, var(--navy) 70%, black)); box-shadow: inset 0 0 22px rgba(0,0,0,.7); }
        #theatre-frame .pillar.left { left: 0; border-right: 1px solid color-mix(in srgb, var(--foil) 40%, transparent); }
        #theatre-frame .pillar.right { right: 0; border-left: 1px solid color-mix(in srgb, var(--foil) 40%, transparent); }
        #theatre-frame .pillar::before { content: ""; position: absolute; inset: 12px 5px; border: 1px solid color-mix(in srgb, var(--foil) 22%, transparent); border-radius: 8px; }
        #theatre-frame .pillar::after { content: ""; position: absolute; inset: 0; opacity: .5; background-image: repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 26%, transparent) 0 1px, transparent 1px 13px), repeating-linear-gradient(-45deg, color-mix(in srgb, var(--foil) 26%, transparent) 0 1px, transparent 1px 13px); }
        #theatre-frame .pillar-cap { position: absolute; left: 50%; transform: translateX(-50%); width: 70%; height: 10px; border-radius: 999px; background: linear-gradient(90deg, transparent, var(--foil), transparent); opacity: .5; }
        #theatre-frame .pillar-cap.top { top: 14px; }
        #theatre-frame .pillar-cap.bottom { bottom: 14px; }

        #gate-seam { position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; margin-left: -1px; background: linear-gradient(180deg, transparent, var(--foil) 18%, var(--foil) 82%, transparent); box-shadow: 0 0 22px 3px rgba(229,193,88,.45); z-index: 2; }
        .gate-seal { position: relative; z-index: 40; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 0 20px; transform: translateY(-4%); transition: opacity .6s ease, transform .6s ease; }
        .gate-seal::before { content: ""; position: absolute; inset: -30px -16px -20px; z-index: -1; background: radial-gradient(58% 46% at 50% 34%, color-mix(in srgb, var(--navy) 92%, transparent) 0%, color-mix(in srgb, var(--navy) 55%, transparent) 55%, transparent 78%); pointer-events: none; }
        .gate-seal .medal { width: 80px; height: 80px; border-radius: 999px; padding: 2px; background: linear-gradient(145deg, var(--gold), var(--foil), var(--gold-2)); display: flex; align-items: center; justify-content: center; box-shadow: 0 0 34px rgba(229,193,88,.45); margin-bottom: 14px; animation: bob 3.6s ease-in-out infinite; }
        .gate-seal .medal > div { width: 100%; height: 100%; border-radius: 999px; background: var(--navy); display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 2px; }
        .gate-seal .tri { width: 0; height: 0; border-left: 7px solid transparent; border-right: 7px solid transparent; border-bottom: 9px solid color-mix(in srgb, var(--foil) 65%, transparent); margin: 2px 0 6px; }
        @keyframes bob { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
        .gate-seal .plate { padding: 12px 18px; border-radius: 14px; background: var(--glass); border: 1px solid var(--line); margin-bottom: 16px; }
        .btn-gold { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 48px; padding: 12px 26px; border: 0; border-radius: 999px; background: linear-gradient(90deg, var(--gold), var(--foil), var(--gold)); color: #141311; font-family: 'Space Grotesk', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; box-shadow: 0 0 24px rgba(229,193,88,.4); cursor: pointer; }
        .btn-gold:active { transform: scale(.96); }
        #gate-veil { position: absolute; inset: 0; background: color-mix(in srgb, var(--navy) 78%, #000); transition: opacity .5s ease; }

        /* amplop 3D (kategori formal) */
        #envelope-stage { position: fixed; inset: 0; z-index: 35; display: flex; align-items: center; justify-content: center; background: var(--obsidian); }
        #envelope-stage.env-hidden { display: none; }
        .env-flap { position: absolute; top: 0; left: 0; right: 0; height: 46%; background: linear-gradient(180deg, var(--navy), var(--surface-container)); transform-origin: top center; transition: transform .9s cubic-bezier(.16,1,.3,1); border-bottom: 2px solid var(--foil); }
        .env-flap.open { transform: rotateX(180deg); }
        .env-pocket { position: absolute; left: 0; right: 0; bottom: 0; height: 54%; background: linear-gradient(180deg, var(--surface-high), var(--navy)); border-top: 1px solid var(--line); transition: transform .9s cubic-bezier(.16,1,.3,1); }
        .env-pocket.open { transform: translate3d(0, 86%, 0); }


        /* ---------- EKSKLUSIF: bingkai samping, parallax, partikel ---------- */
        .gate-frame { position: absolute; top: 0; bottom: 0; width: 15%; z-index: 3; pointer-events: none; background: linear-gradient(180deg, color-mix(in srgb, var(--navy) 80%, #3b3936), var(--navy)); transition: opacity .6s ease; }
        .gate-frame.left { left: 0; border-right: 1px solid color-mix(in srgb, var(--foil) 35%, transparent); }
        .gate-frame.right { right: 0; border-left: 1px solid color-mix(in srgb, var(--foil) 35%, transparent); }
        .gate-frame::after { content: ""; position: absolute; inset: 18px 6px; border: 1px solid color-mix(in srgb, var(--foil) 18%, transparent); border-radius: 8px; }
        .gate-frame::before { content: ""; position: absolute; inset: 34px 10px; opacity: .5; background-image: repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 30%, transparent) 0 1px, transparent 1px 14px), repeating-linear-gradient(-45deg, color-mix(in srgb, var(--foil) 30%, transparent) 0 1px, transparent 1px 14px); }
        #parallax-particle-layer { position: fixed; inset: 0; z-index: 20; pointer-events: none; max-width: 430px; margin: 0 auto; overflow: hidden; }
        #parallax-particle-layer .orn { position: absolute; color: color-mix(in srgb, var(--foil) 40%, transparent); }
        #parallax-particle-layer .orn-1 { top: 14%; left: 8%; }
        #parallax-particle-layer .orn-2 { top: 42%; right: 9%; }
        #parallax-particle-layer .orn-3 { top: 66%; left: 12%; }
        #parallax-particle-layer .orn-4 { top: 86%; right: 14%; }
        #particle-canvas { position: fixed; inset: 0; z-index: 25; pointer-events: none; width: 100%; height: 100%; max-width: 430px; margin: 0 auto; }
        html[data-tier="basic"] #parallax-particle-layer, html[data-tier="basic"] #particle-canvas, html[data-tier="premium"] #parallax-particle-layer, html[data-tier="premium"] #particle-canvas { display: none; }

        .timeline { position: relative; padding-left: 22px; }
        .timeline::before { content: ""; position: absolute; left: 6px; top: 4px; bottom: 4px; width: 1px; background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--gold) 55%, transparent), transparent); }
        .timeline-item { position: relative; padding: 0 0 18px 4px; }
        .timeline-dot { position: absolute; left: -21px; top: 5px; width: 9px; height: 9px; border-radius: 999px; background: var(--foil); box-shadow: 0 0 10px color-mix(in srgb, var(--foil) 60%, transparent); }

        .bento { display: grid; grid-template-columns: 1fr 1fr; grid-auto-rows: 96px; gap: 8px; }
        .bento-main { grid-column: 1 / -1; grid-row: span 2; border-radius: 16px; overflow: hidden; border: 1px solid color-mix(in srgb, var(--gold) 30%, transparent); }
        .bento-main img, .bento-cell img { width: 100%; height: 100%; object-fit: cover; display: block; cursor: pointer; }
        .bento-cell { border-radius: 10px; overflow: hidden; border: 1px solid color-mix(in srgb, var(--gold) 22%, transparent); }

        /* ---------- KUSTOM: video, QRIS, bespoke dock ---------- */
        .video-poster { position: relative; display: block; width: 100%; border: 0; padding: 0; border-radius: 12px; overflow: hidden; cursor: pointer; }
        .video-poster img { width: 100%; height: 168px; object-fit: cover; display: block; opacity: .82; }
        .video-play { position: absolute; inset: 0; display: grid; place-items: center; font-size: 26px; color: var(--foil); background: rgba(0,0,0,.28); }
        #video-modal { position: fixed; inset: 0; z-index: 60; display: flex; align-items: center; justify-content: center; padding: 18px; background: rgba(0,0,0,.92); }
        #video-modal[hidden] { display: none; }
        .video-modal-card { width: 100%; max-width: 380px; }
        .video-frame { position: relative; padding-top: 56.25%; border-radius: 12px; overflow: hidden; background: #000; }
        .video-frame iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; }
        .qris-box { display: inline-flex; flex-direction: column; align-items: center; background: #fff; border-radius: 12px; padding: 12px; }
        .qris-grid { width: 132px; height: 132px; background:
            repeating-linear-gradient(90deg, #0F172A 0 6px, transparent 6px 12px),
            repeating-linear-gradient(0deg, #0F172A 0 6px, #fff 6px 12px);
            background-blend-mode: multiply; }
        #bespoke-dock { position: fixed; right: 8px; top: calc(var(--topbar-h, 86px) + 6px); z-index: 50; display: flex; flex-direction: column; align-items: flex-end; gap: 8px; }
        .bespoke-toggle { display: inline-flex; align-items: center; gap: 5px; padding: 8px 12px; border-radius: 999px; border: 1px solid var(--line-strong); background: color-mix(in srgb, var(--obsidian) 92%, transparent); color: var(--foil); font-family: 'Space Grotesk', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .08em; cursor: pointer; }
        #bespoke-panel { width: 196px; padding: 10px 12px; border-radius: 14px; border: 1px solid var(--line); background: color-mix(in srgb, var(--obsidian) 97%, transparent); display: flex; flex-direction: column; gap: 8px; }
        #bespoke-panel[hidden] { display: none; }
        .bespoke-row { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
        .bespoke-row .hud { color: var(--silver); }
        .bespoke-seg { display: flex; gap: 2px; }
        .bespoke-seg button { border: 1px solid var(--line); background: transparent; color: var(--muted); font-size: 9px; font-weight: 700; letter-spacing: .04em; padding: 3px 6px; border-radius: 6px; cursor: pointer; }
        .bespoke-seg button.is-on { background: var(--gold); border-color: var(--gold); color: #141311; }
        #bespokeColor, #bespokeBg, #bespokeCard, #bespokeTxt, .bespoke-row input[type="color"] { width: 40px; height: 24px; border: 1px solid var(--line); border-radius: 6px; background: transparent; padding: 0; cursor: pointer; }
        #gate-overlay.gate-arch .gate-door.left { clip-path: polygon(0 100%, 0 26%, 50% 0, 100% 26%, 100% 100%, 0 100%); }
        #gate-overlay.gate-arch .gate-door.right { clip-path: polygon(0 100%, 0 26%, 50% 0, 100% 26%, 100% 100%, 0 100%); }

        #gate-overlay.gate-cover { background: var(--navy); }
        #gate-overlay.gate-cover .gate-door,
        #gate-overlay.gate-cover #gate-seam,
        #gate-overlay.gate-cover .gate-frame { display: none; }
        #gate-overlay.gate-cover .gate-seal::before { display: none; }

        .env-seal { position: absolute; inset: 0; z-index: 40; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 24px; }
        .env-wax { width: 72px; height: 72px; border-radius: 999px; display: grid; place-items: center; color: #141311; background: radial-gradient(circle at 35% 30%, var(--foil), var(--gold) 62%, color-mix(in srgb, var(--gold) 70%, black)); box-shadow: 0 0 30px rgba(229,193,88,.5); }

        /* ---------- dock kaca ---------- */
        #bottom-hud { position: fixed; bottom: 10px; left: 0; right: 0; z-index: 50; display: flex; justify-content: center; padding: 0 12px calc(env(safe-area-inset-bottom, 0px)); }
        /* Fasad peta: iframe Google Maps baru dipasang saat diklik */
        .map-facade { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px;
            min-height: 168px; border-radius: 12px; cursor: pointer; text-align: center; padding: 16px;
            border: 1px dashed color-mix(in srgb, var(--foil) 34%, transparent);
            background: radial-gradient(circle at 50% 40%, color-mix(in srgb, var(--foil) 12%, transparent), transparent 72%),
                        color-mix(in srgb, var(--navy) 88%, #000); }
        .map-facade:hover, .map-facade:focus-visible { border-color: color-mix(in srgb, var(--foil) 62%, transparent); outline: none; }
        .map-facade-pin { font-size: 20px; color: var(--gold); }
        .map-facade-label { font-size: 12px; letter-spacing: .04em; text-transform: uppercase; color: var(--gold); }
        .map-facade-note { font-size: 11px; color: var(--muted); }
        .map-frame-wrap { position: relative; width: 100%; height: 180px; border-radius: 12px; overflow: hidden; }
        .map-frame-wrap .map-frame { position: absolute; top: -52px; left: 0; width: 100%; height: calc(100% + 52px); border: 0; border-radius: 0; display: block; }
        .map-frame { width: 100%; height: 180px; border: 0; border-radius: 12px; display: block; }

        /* Lewati layout/paint section di luar layar (biaya render awal turun) */
        #invitation-content > section { content-visibility: auto; contain-intrinsic-size: 1px 420px; }
        #invitation-content > section:first-of-type { content-visibility: visible; contain-intrinsic-size: auto; }

        .dock { width: 100%; max-width: 400px; height: 56px; border-radius: 999px; background: color-mix(in srgb, var(--obsidian) 96%, transparent); border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 4px; padding: 0 10px; box-shadow: 0 18px 40px -20px rgba(0,0,0,.9); overflow: hidden; }
        .dock a { display: flex; flex: 1 1 0; min-width: 0; flex-direction: column; align-items: center; justify-content: center; gap: 2px; color: var(--silver); text-decoration: none; }
        .dock a.is-active, .dock a:hover { color: var(--foil); }
        .dock a svg { flex: none; display: block; }
        .dock .lbl { font-family: 'Space Grotesk', sans-serif; font-size: 8.5px; line-height: 1.1; letter-spacing: .01em; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; text-align: center; }
        #audio-pill { width: 36px; height: 36px; border-radius: 999px; background: var(--navy); color: var(--foil); border: 1px solid var(--line-strong); display: flex; align-items: center; justify-content: center; }
        #audio-pill .mi { animation: spin 4s linear infinite; animation-play-state: paused; }
        #audio-pill.is-playing .mi { animation-play-state: running; }
        @keyframes spin { to { transform: rotate(360deg); } }

        html[data-tier="eksklusif"] #invitation-content, html[data-tier="kustom"] #invitation-content { padding-left: 2.9rem; padding-right: 2.9rem; }
        html[data-tier="eksklusif"] #bottom-hud, html[data-tier="kustom"] #bottom-hud { padding-left: 1.2rem; padding-right: 1.2rem; }
        html[data-tier="eksklusif"] #invitation-content, html[data-tier="kustom"] #invitation-content { padding-bottom: 8rem; }
        html[data-tier="eksklusif"] #theatre-frame .pillar::after, html[data-tier="kustom"] #theatre-frame .pillar::after { opacity: .62; }
        /* Di ponsel bingkai tier tidak boleh memakan lebar konten (kartu QR jadi sempit). */
        @media (max-width: 480px) {
            html[data-tier="eksklusif"] #invitation-content,
            html[data-tier="kustom"] #invitation-content { padding-left: 10px; padding-right: 10px; }
        }



        /* ================= 5-PLANE 2.5D PARALLAX (eksklusif & kustom) ================= */
        #parallax-plane-0-bg, #parallax-plane-1-midground, #parallax-plane-3-foreground, #parallax-plane-4-lens { display: none !important; }
        html[data-tier="eksklusif"] #parallax-plane-0-bg,
        html[data-tier="kustom"] #parallax-plane-0-bg {
            display: block !important; position: fixed; inset: 0; z-index: 0; pointer-events: none;
            max-width: 430px; margin: 0 auto;
            background:
                radial-gradient(circle at 50% calc(30% + var(--scroll-y, 0) * 0.04px), rgba(212,175,55,.24), transparent 70%),
                repeating-linear-gradient(135deg, color-mix(in srgb, var(--foil) 6%, transparent) 0 1px, transparent 1px 26px);
            transform: scale(1.1) translate3d(calc(var(--tilt-x, 0) * -8px * var(--depth-mult, 1)), calc(var(--scroll-y, 0) * -0.12px), 0);
        }
        html[data-tier="eksklusif"] #parallax-plane-1-midground,
        html[data-tier="kustom"] #parallax-plane-1-midground {
            display: block !important; position: fixed; inset-inline: 0; top: 56px; z-index: 5; pointer-events: none;
            max-width: 430px; margin: 0 auto; opacity: .2; color: var(--foil);
            transform: translate3d(calc(var(--tilt-x, 0) * -10px), calc(var(--sy, 0) * -0.18px), 0);
        }
        #parallax-plane-1-midground svg { width: 128%; height: auto; margin-left: -14%; display: block; }
        html[data-tier="eksklusif"] #parallax-plane-3-foreground,
        html[data-tier="kustom"] #parallax-plane-3-foreground {
            display: block !important; position: fixed; inset: 0; z-index: 22; pointer-events: none; overflow: hidden;
            max-width: 430px; margin: 0 auto;
        }
        .orn-hang { position: absolute; top: -10px; color: var(--foil); opacity: .85; transform-origin: top center; animation: sway 6s ease-in-out infinite alternate; }
        .orn-hang.left { left: 14px; }
        .orn-hang.right { right: 14px; animation-delay: -3s; }
        @keyframes sway { from { rotate: -3deg; } to { rotate: 3deg; } }
        html[data-tier="eksklusif"] .orn-hang, html[data-tier="kustom"] .orn-hang { translate: 0 calc(var(--sy, 0) * -0.35px); }
        html[data-tier="eksklusif"] #parallax-plane-4-lens,
        html[data-tier="kustom"] #parallax-plane-4-lens {
            display: block !important; position: fixed; inset: 0; z-index: 28; pointer-events: none; overflow: hidden;
            max-width: 430px; margin: 0 auto;
        }
        #parallax-plane-4-lens .bokeh { position: absolute; border-radius: 999px; opacity: .62; background: radial-gradient(circle, color-mix(in srgb, var(--foil) 55%, transparent), transparent 70%); }
        #parallax-plane-4-lens .b1 { width: 74px; height: 74px; left: 6%; top: 22%; }
        #parallax-plane-4-lens .b2 { width: 46px; height: 46px; right: 10%; top: 34%; }
        #parallax-plane-4-lens .b3 { width: 96px; height: 96px; left: 18%; bottom: 18%; }
        #parallax-plane-4-lens .b4 { width: 34px; height: 34px; right: 22%; bottom: 26%; }
        #parallax-plane-4-lens .b5 { width: 58px; height: 58px; right: 4%; top: 8%; }
        /* posisi bokeh & watermark diatur per-elemen oleh DKarsaParallaxEngine */

        /* Plane 2 — kartu masuk dengan scrub 3D (dihitung saat scroll saja) */
        html[data-tier="eksklusif"] main > section.reveal,
        html[data-tier="kustom"] main > section.reveal,
        html[data-tier="eksklusif"] body.js-reveal main > section.reveal.is-visible,
        html[data-tier="kustom"] body.js-reveal main > section.reveal.is-visible {
            transform: perspective(1000px) rotateX(calc(var(--card-tilt, 0) * 10deg)) translateY(calc(var(--card-y, 0) * 1px)) scale(calc(1 - var(--card-scale, 0) * 0.05)) !important;
            opacity: calc(1 - var(--card-fade, 0) * 0.75) !important;
        }
        html[data-tier="eksklusif"] .gal-hero img, html[data-tier="kustom"] .gal-hero img,
        html[data-tier="eksklusif"] .bento img, html[data-tier="kustom"] .bento img,
        html[data-tier="eksklusif"] .couple-portrait-img, html[data-tier="kustom"] .couple-portrait-img {
            transform: scale(1.16) translate3d(0, calc(var(--card-progress, 0) * -22px), 0);
        }

        /* ================= 3D HOLOGRAPHIC CARD TILT ================= */
        .holographic-foil-glare { position: absolute; inset: 0; pointer-events: none; border-radius: inherit; opacity: 0; transition: opacity .3s ease; mix-blend-mode: overlay;
            background: radial-gradient(circle at calc(50% + var(--tilt-x, 0) * 40%) calc(50% + var(--tilt-y, 0) * 40%), rgba(255,245,200,.45), rgba(212,175,55,.15) 40%, transparent 70%); }
        html[data-tier="eksklusif"] .atm-card:hover .holographic-foil-glare,
        html[data-tier="kustom"] .atm-card:hover .holographic-foil-glare,
        html[data-tier="eksklusif"] .qr-ticket-card:hover .holographic-foil-glare,
        html[data-tier="kustom"] .qr-ticket-card:hover .holographic-foil-glare { opacity: 1; }
        html[data-tier="eksklusif"] .atm-card, html[data-tier="kustom"] .atm-card,
        html[data-tier="eksklusif"] .qr-ticket-card, html[data-tier="kustom"] .qr-ticket-card {
            transform: perspective(900px) rotateX(calc(var(--tilt-y, 0) * 9deg)) rotateY(calc(var(--tilt-x, 0) * -9deg)) translateZ(12px);
            transition: transform .25s ease-out;
        }

        /* sparkle trail (kustom) */
        #sparkle-canvas { display: none; position: fixed; inset: 0; z-index: 45; pointer-events: none; max-width: 430px; margin: 0 auto; }
        html[data-tier="kustom"] #sparkle-canvas { display: block; }
        /* Layar sangat sempit: label disembunyikan agar ikon tidak berdesakan */
        @media (max-width: 380px) {
            .dock { height: 50px; padding: 0 8px; }
            .dock .lbl { display: none; }
            #audio-pill { width: 32px; height: 32px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .orn-hang, #parallax-plane-4-lens .bokeh { animation: none !important; }
            html[data-tier="eksklusif"] main > section.reveal, html[data-tier="kustom"] main > section.reveal { transform: none !important; opacity: 1 !important; }
        }


        /* ================= KUSTOM: panggung bespoke (beda dari Eksklusif) ================= */
        #parallax-plane-5-bespoke { display: none; position: fixed; inset: 0; z-index: 6; pointer-events: none; max-width: 430px; margin: 0 auto; }
        html[data-tier="kustom"] #parallax-plane-5-bespoke { display: grid; place-items: center; }
        #parallax-plane-5-bespoke .crest { position: relative; width: min(78vw, 320px); aspect-ratio: 1; border-radius: 999px; border: 2px solid color-mix(in srgb, var(--foil) 45%, transparent); opacity: .38; animation: crest-spin 70s linear infinite; box-shadow: 0 0 60px color-mix(in srgb, var(--foil) 18%, transparent), inset 0 0 40px color-mix(in srgb, var(--foil) 12%, transparent); }
        #parallax-plane-5-bespoke .crest::before { content: ""; position: absolute; inset: 22px; border-radius: 999px; border: 1px dashed color-mix(in srgb, var(--foil) 42%, transparent); }
        #parallax-plane-5-bespoke .crest::after { content: ""; position: absolute; inset: 42%; border-radius: 8px; transform: rotate(45deg); border: 1px solid color-mix(in srgb, var(--foil) 55%, transparent); background: radial-gradient(circle, color-mix(in srgb, var(--foil) 32%, transparent), transparent 72%); }
        @keyframes crest-spin { to { transform: rotate(360deg); } }
        .drape { display: none; position: absolute; top: 0; bottom: 0; width: 13%; pointer-events: none; z-index: 21;
            background:
                repeating-linear-gradient(90deg, color-mix(in srgb, var(--foil) 8%, transparent) 0 6px, transparent 6px 12px),
                linear-gradient(180deg, color-mix(in srgb, var(--foil) 34%, transparent), color-mix(in srgb, var(--surface) 55%, transparent) 48%, color-mix(in srgb, var(--foil) 22%, transparent));
            box-shadow: inset 0 0 26px color-mix(in srgb, var(--foil) 12%, transparent); }
        .drape.left { left: 0; border-right: 1px solid color-mix(in srgb, var(--foil) 22%, transparent); -webkit-mask-image: linear-gradient(90deg, #000 42%, transparent 100%); mask-image: linear-gradient(90deg, #000 42%, transparent 100%); }
        .drape.right { right: 0; border-left: 1px solid color-mix(in srgb, var(--foil) 22%, transparent); -webkit-mask-image: linear-gradient(270deg, #000 42%, transparent 100%); mask-image: linear-gradient(270deg, #000 42%, transparent 100%); }
        html[data-tier="kustom"] .drape { display: block; }
        html[data-tier="kustom"] #parallax-plane-3-foreground .orn-hang { display: none; }
        html[data-tier="kustom"] #parallax-plane-1-midground { opacity: .28; }
        html[data-tier="kustom"] #parallax-plane-0-bg {
            background:
                radial-gradient(circle at 50% calc(30% + var(--scroll-y, 0) * 0.04px), color-mix(in srgb, var(--foil) 26%, transparent), transparent 72%),
                conic-gradient(from calc(var(--scroll-y, 0) * 0.02deg) at 50% 38%, color-mix(in srgb, var(--foil) 9%, transparent), transparent 28%, color-mix(in srgb, var(--foil) 9%, transparent) 58%, transparent 86%);
        }
        html[data-tier="kustom"] #parallax-plane-4-lens .bokeh { opacity: .7; }
        #parallax-plane-4-lens .b6 { width: 120px; height: 120px; left: -4%; top: 58%; }
        #parallax-plane-4-lens .b7 { width: 28px; height: 28px; right: 34%; top: 12%; }
        html[data-tier="kustom"] main > section.reveal .card::after {
            content: ""; position: absolute; inset: 0; border-radius: inherit; pointer-events: none;
            background: linear-gradient(115deg, transparent 34%, rgba(255,245,200,.16) 50%, transparent 66%);
            background-size: 240% 100%; animation: foil-sweep 7s ease-in-out infinite;
        }
        @keyframes foil-sweep { 0% { background-position: 140% 0; } 55%, 100% { background-position: -40% 0; } }

        /* ---------- BASIC: ratakan QR & kado (tanpa foil/EMV/takik) + sembunyikan HUD ---------- */
        html[data-tier="basic"] #bottom-hud { display: none; }
        html[data-tier="basic"] .qr-ticket-card { border-radius: 8px !important; border-width: 1px !important; box-shadow: none !important; background: color-mix(in srgb, var(--navy) 38%, #151311) !important; }
        html[data-tier="basic"] .qr-ticket-card .qr-perf,
        html[data-tier="basic"] .qr-ticket-card .qr-notch,
        html[data-tier="basic"] .qr-ticket-card .qr-bracket,
        html[data-tier="basic"] .qr-ticket-card .qr-scan,
        html[data-tier="basic"] #qr-status-badge { display: none !important; }
        html[data-tier="basic"] #guest-qr-box { width: 148px; height: 148px; padding: 10px; border-radius: 8px; box-shadow: none !important; border-width: 1px !important; }
        html[data-tier="basic"] .atm-card { background: color-mix(in srgb, var(--navy) 38%, #151311) !important; border: 1px solid rgba(255,255,255,.14) !important; box-shadow: none !important; border-radius: 8px !important; color: var(--on-surface) !important; }
        html[data-tier="basic"] .atm-card::before, html[data-tier="basic"] .atm-card::after { display: none !important; }
        html[data-tier="basic"] .atm-card svg { display: none !important; }
        html[data-tier="basic"] #section-digital-gift .atm-card ~ .atm-card { display: none; }
        html[data-tier="basic"] .atm-number { color: var(--foil) !important; }
        html[data-tier="basic"] #guest-qr-mount { width: 124px; height: 124px; }
        html[data-tier="basic"] #guest-qr-mount svg { width: 100%; height: 100%; }
        html[data-tier="basic"] #section-guest-qr .qr-meta { display: flex; flex-direction: column; align-items: center; gap: 2px; text-align: center; padding: 4px 16px 0; }
        html[data-tier="basic"] #section-guest-qr .qr-meta > div { background: transparent !important; border: 0 !important; padding: 2px 0; }
        html[data-tier="basic"] #section-guest-qr .qr-meta > div:nth-child(3),
        html[data-tier="basic"] #section-guest-qr .qr-meta > div:nth-child(4) { display: none; }
        html[data-tier="basic"] #section-guest-qr .qr-hint { display: none; }


        /* ---------- PREMIUM: bingkai ganda + filigree sudut 2D ---------- */
        html[data-tier="premium"] .card { position: relative; }
        html[data-tier="premium"] .card::after { content: ""; position: absolute; inset: 5px; border-radius: 12px; border: 1px solid color-mix(in srgb, var(--gold) 20%, transparent); pointer-events: none; }
        html[data-tier="premium"] .card::before {
            content: ""; position: absolute; inset: 3px; border-radius: 12px; pointer-events: none; opacity: .6;
            background-image:
                linear-gradient(var(--gold), var(--gold)), linear-gradient(var(--gold), var(--gold)),
                linear-gradient(var(--gold), var(--gold)), linear-gradient(var(--gold), var(--gold)),
                linear-gradient(var(--gold), var(--gold)), linear-gradient(var(--gold), var(--gold)),
                linear-gradient(var(--gold), var(--gold)), linear-gradient(var(--gold), var(--gold));
            background-repeat: no-repeat;
            background-size: 16px 1px, 1px 16px, 16px 1px, 1px 16px, 16px 1px, 1px 16px, 16px 1px, 1px 16px;
            background-position: 0 0, 0 0, 100% 0, 100% 0, 0 100%, 0 100%, 100% 100%, 100% 100%;
        }


        /* Pil mengambang (pilih paket & bespoke) sembunyi saat scroll agar tidak menutupi konten */
        #top-customizer-dock, #bespoke-dock { transition: opacity .25s ease, transform .25s ease; }
        body.dk-pills-hidden #top-customizer-dock,
        body.dk-pills-hidden #bespoke-dock { opacity: 0; transform: translateY(8px); pointer-events: none; }

        main#invitation-content { padding-top: calc(var(--topbar-h, 86px) + 10px); }

        /* ---------- reveal ---------- */
        .reveal { opacity: 1; transform: none; transition: opacity .8s ease, transform .9s cubic-bezier(.16,1,.3,1); }
        body.js-reveal .reveal { opacity: 0; transform: translateY(22px); }
        body.js-reveal .reveal.is-visible { opacity: 1; transform: none; }
        html[data-tier="basic"] .reveal { transition: none; }

        /* ---------- komponen lain ---------- */
        .atm-card { position: relative; overflow: hidden; border-radius: 14px; padding: 16px; text-align: left; color: var(--gold-2); background: linear-gradient(135deg, color-mix(in srgb, var(--navy) 86%, black), color-mix(in srgb, var(--gold) 34%, var(--navy))); border: 1px solid color-mix(in srgb, var(--gold) 60%, transparent); box-shadow: 0 20px 38px -24px rgba(0,0,0,.8), inset 0 1px 0 color-mix(in srgb, var(--gold-2) 40%, transparent); }
        .atm-card::before { content: ""; position: absolute; inset: 0; opacity: .3; pointer-events: none; background-image: repeating-radial-gradient(circle at 18% 130%, transparent 0 11px, color-mix(in srgb, var(--gold-2) 22%, transparent) 11px 12px); }
        .atm-card::after { content: ""; position: absolute; inset: 6px; border-radius: 10px; border: 1px solid color-mix(in srgb, var(--gold-2) 22%, transparent); pointer-events: none; }
        .atm-number { font-variant-numeric: tabular-nums; letter-spacing: .16em; font-size: 15px; font-weight: 600; }
        .atm-label { font-family: 'Space Grotesk', sans-serif; font-size: 9px; letter-spacing: .18em; text-transform: uppercase; opacity: .85; }
        .gift-address { position: relative; border: 1px dashed color-mix(in srgb, var(--gold) 45%, transparent); border-radius: 10px; padding: 14px; background: color-mix(in srgb, var(--gold) 7%, transparent); }
        .field { width: 100%; min-height: 46px; padding: 0 14px; font-size: 14px; background: var(--surface-high); border: 1px solid color-mix(in srgb, var(--gold) 30%, transparent); border-radius: 10px; color: var(--on-surface); }
        textarea.field { padding: 12px 14px; min-height: 92px; resize: vertical; }
        .field:focus { outline: 2px solid color-mix(in srgb, var(--gold) 45%, transparent); outline-offset: 1px; }
        .toggle-card { display: flex; align-items: center; justify-content: center; gap: 5px; height: 46px; padding: 0 8px; border-radius: 10px; border: 1px solid color-mix(in srgb, var(--gold) 35%, transparent); background: var(--surface-high); color: var(--silver); font-size: 10px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; }
        .peer:checked ~ .toggle-card { background: var(--gold); border-color: var(--gold); color: #141311; }
        .note-card { position: relative; padding: 12px 14px; border-radius: 12px; background: var(--surface-high); border: 1px solid color-mix(in srgb, var(--gold) 16%, transparent); }
        .guestbook-feed { max-height: 20rem; overflow-y: auto; scrollbar-width: none; -webkit-mask-image: linear-gradient(180deg, #000 0, #000 86%, transparent 100%); mask-image: linear-gradient(180deg, #000 0, #000 86%, transparent 100%); }
        .guestbook-feed::-webkit-scrollbar { display: none; }
        .avatar-initial { width: 32px; height: 32px; border-radius: 999px; display: grid; place-items: center; font-size: 11px; font-weight: 700; color: var(--foil); background: var(--navy); border: 1px solid var(--line-strong); }
        .plaque { padding: 12px 6px; border-radius: 12px; background: linear-gradient(160deg, var(--surface-high), var(--navy)); border: 1px solid color-mix(in srgb, var(--gold) 22%, transparent); text-align: center; }
        .ticket { position: relative; border-radius: 16px; background: var(--navy); border: 1px solid var(--line); padding: 16px; overflow: hidden; }
        .ticket::before { content: ""; position: absolute; inset: 6px; border-radius: 12px; border: 1px solid color-mix(in srgb, var(--gold) 14%, transparent); pointer-events: none; }
        .ticket .notch { position: absolute; top: 50%; transform: translateY(-50%); width: 22px; height: 22px; border-radius: 999px; background: var(--surface); }
        .ticket .notch.l { left: -11px; }
        .ticket .notch.r { right: -11px; }
        html[data-tier="basic"] .ticket .notch { display: none; }
        .map-frame { width: 100%; height: 176px; border: 0; border-radius: 12px; filter: saturate(.9); }
        .gal-hero { border-radius: 160px 160px 12px 12px; overflow: hidden; border: 1px solid color-mix(in srgb, var(--gold) 35%, transparent); }
        .gal-hero img { width: 100%; height: 240px; object-fit: cover; display: block; }
        .gal-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
        .gal-grid img { width: 100%; height: 120px; object-fit: cover; border-radius: 10px; display: block; border: 1px solid color-mix(in srgb, var(--gold) 22%, transparent); }

        /* ---------- WEB / DESKTOP: shell sebagai bingkai ponsel di panggung ---------- */
        @media (min-width: 768px) {
            body { align-items: center; min-height: 100dvh; padding: 20px 0; background: #080706; }
            body::before { content: ""; position: fixed; inset: 0; pointer-events: none; z-index: 0;
                background: radial-gradient(46% 52% at 50% 42%, color-mix(in srgb, var(--navy) 46%, transparent), transparent 72%); }
            .shell { display: flex; flex-direction: column; height: calc(100dvh - 40px); min-height: 0; max-height: 920px; border-radius: 30px; overflow: hidden; border: 1px solid color-mix(in srgb, var(--foil) 30%, transparent); box-shadow: 0 40px 90px -30px rgba(0,0,0,.9), 0 0 0 8px color-mix(in srgb, var(--obsidian) 90%, transparent); }
            .shell > main, .shell > #gate-overlay { border-radius: 30px; }
            .shell > .topbar { flex: none; top: 20px; border-radius: 30px 30px 0 0; }
            #gate-overlay { top: calc(var(--topbar-h, 90px) + 20px); }
            #invitation-content { flex: 1 1 auto; min-height: 0; overflow-y: auto; overscroll-behavior: contain; -webkit-overflow-scrolling: touch; scrollbar-width: none; }
            #invitation-content::-webkit-scrollbar { display: none; }
            #bottom-hud { position: absolute; bottom: 18px; }
            .shell > .topbar { border-radius: 30px 30px 0 0; }
            #theatre-frame { top: 20px; bottom: 20px; border-radius: 30px; overflow: hidden; }
            #gate-overlay, #envelope-stage { border-radius: 30px; overflow: hidden; }
        }
        @media (min-width: 1100px) {
            body::after { content: "D\2019KARSA  \2022  DIGITAL INVITATION"; position: fixed; bottom: 22px; left: 0; right: 0; text-align: center; font-family: 'Space Grotesk', sans-serif; font-size: 10px; letter-spacing: .3em; color: color-mix(in srgb, var(--foil) 45%, transparent); pointer-events: none; }
        }


        /* ================= STUDIO KUSTOM (paket Rp280.000) ================= */
        html[data-font="heritage"] .serif, html[data-font="heritage"] .eyebrow { font-family: 'Cinzel', 'Playfair Display', serif; }
        html[data-font="script"] .serif { font-family: 'Great Vibes', 'Beau Rivage', cursive; font-weight: 400; }
        html[data-font="script"] .eyebrow, html[data-font="script"] .hud { font-family: 'Lora', Georgia, serif; letter-spacing: .1em; }
        html[data-font="editorial"] .serif { font-family: 'Playfair Display', serif; }
        html[data-font="editorial"] body, html[data-font="editorial"] .muted { font-family: 'Inter', 'Plus Jakarta Sans', sans-serif; }
        html[data-font="islamic"] .serif { font-family: 'Amiri', 'Playfair Display', serif; }
        html[data-font="islamic"] .eyebrow, html[data-font="islamic"] .hud { font-family: 'Montserrat', sans-serif; }

        /* Bingkai potret */
        html[data-frame="gunungan"] .couple-portrait { border-radius: 50% 50% 10px 10px / 42% 42% 10px 10px; }
        html[data-frame="siger"] .couple-portrait { border-radius: 46% 46% 12px 12px; }
        html[data-frame="bagonjong"] .couple-portrait { clip-path: polygon(50% 0%, 100% 18%, 100% 100%, 0% 100%, 0% 18%); border-radius: 8px; }
        html[data-frame="arch"] .couple-portrait { border-radius: 999px 999px 12px 12px; }
        html[data-frame="oval"] .couple-portrait { border-radius: 50%; }
        html[data-frame="pill"] .couple-portrait { border-radius: 999px; }
        html[data-frame="octagon"] .couple-portrait { clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%); border-radius: 0; }
        html[data-frame="rect"] .couple-portrait { border-radius: 10px; }

        /* Siluet gerbang */
        html[data-gate="gunungan"] .gate-door.left { clip-path: polygon(0 10%, 60% 10%, 100% 0, 100% 100%, 0 100%); }
        html[data-gate="gunungan"] .gate-door.right { clip-path: polygon(0 0, 40% 10%, 100% 10%, 100% 100%, 0 100%); }
        html[data-gate="mihrab"] .gate-door.left { clip-path: polygon(0 24%, 50% 0, 100% 0, 100% 100%, 0 100%); }
        html[data-gate="mihrab"] .gate-door.right { clip-path: polygon(0 0, 50% 0, 100% 24%, 100% 100%, 0 100%); }
        html[data-gate="candi"] .gate-door.left { clip-path: polygon(0 0, 58% 0, 58% 12%, 72% 12%, 72% 24%, 86% 24%, 86% 36%, 100% 36%, 100% 100%, 0 100%); }
        html[data-gate="candi"] .gate-door.right { clip-path: polygon(0 36%, 14% 36%, 14% 24%, 28% 24%, 28% 12%, 42% 12%, 42% 0, 100% 0, 100% 100%, 0 100%); }
        html[data-gate="arch"] .gate-door.left { clip-path: polygon(0 100%, 0 26%, 50% 0, 100% 26%, 100% 100%); }
        html[data-gate="arch"] .gate-door.right { clip-path: polygon(0 100%, 0 26%, 50% 0, 100% 26%, 100% 100%); }
        html[data-gate="straight"] .gate-door { clip-path: none; }

        /* Overlay foto sampul (keterbacaan teks) */
        .page-photo::after { content: ""; position: absolute; inset: 0; background: var(--surface); opacity: .55; }
        html[data-custom-overlay] .page-photo::after { opacity: calc(var(--dk-overlay, 55) / 100); }

        @media (prefers-reduced-motion: reduce) {
            .gate-seal .medal, #audio-pill .mi { animation: none; }
        }


        /* ================= PERFORMA (aturan 60FPS) ================= */
        /* Parallax dibatasi 2 lapisan ringan: midground (z-5) + foreground (z-22).
           Bokeh (plane-4) dan crest (plane-5) tidak lagi digambar. */
        html[data-tier] #parallax-plane-4-lens,
        html[data-tier] #parallax-plane-5-bespoke,
        #parallax-plane-4-lens,
        #parallax-plane-5-bespoke { display: none !important; }

        /* Bagian di bawah lipatan tidak dilayout sampai terlihat. */
        main#invitation-content > section { content-visibility: auto; contain-intrinsic-size: 1px 480px; }

        /* Gerbang: animasi transform tidak perlu will-change permanen. */
        body.gate-open .gate-door { will-change: auto; }

        /* Tidak ada filter blur / backdrop-filter pada elemen yang bergerak saat scroll. */
        .card,
        .ticket,
        .plaque,
        .topbar,
        .dock,
        #bespoke-panel,
        .gate-seal .plate,
        .gate-door,
        #parallax-plane-1-midground svg,
        #parallax-plane-3-foreground * { backdrop-filter: none !important; -webkit-backdrop-filter: none !important; }

        /* ================= MODE TERANG (siang, pastel, jewel) =================
           Aturan D'Karsa: hanya Midnight Navy, Cyber Neon, dan Dark Mode yang gelap.
           Semua palet lain memakai halaman terang + kartu putih + tinta gelap. */
        html[data-mode="light"] body,
        html[data-mode="jewel"] body { background: var(--obsidian); color: var(--on-surface); }

        html[data-mode="light"] .shell,
        html[data-mode="jewel"] .shell {
            background: var(--surface);
            box-shadow: 0 0 0 1px var(--line), 0 30px 60px -44px rgba(16, 42, 67, .45);
        }

        html[data-mode="light"] .bg-layer,
        html[data-mode="jewel"] .bg-layer { background: var(--surface); }

        html[data-mode="light"] .topbar,
        html[data-mode="jewel"] .topbar {
            background: rgba(255, 255, 255, .92);
            border-bottom: 1px solid var(--line);
            box-shadow: 0 8px 22px -22px rgba(16, 42, 67, .55);
        }

        html[data-mode="light"] .card,
        html[data-mode="jewel"] .card,
        html[data-mode="light"][data-tier="eksklusif"] .card,
        html[data-mode="light"][data-tier="kustom"] .card,
        html[data-mode="jewel"][data-tier="eksklusif"] .card,
        html[data-mode="jewel"][data-tier="kustom"] .card {
            background: var(--surface-container);
            border-color: var(--line);
            box-shadow: 0 16px 34px -30px rgba(16, 42, 67, .45);
        }

        html[data-mode="light"] .card::before,
        html[data-mode="jewel"] .card::before { border-color: var(--line); }

        html[data-mode="light"] .ticket,
        html[data-mode="jewel"] .ticket { background: var(--surface-container); border-color: var(--line); }

        html[data-mode="light"] .plaque,
        html[data-mode="jewel"] .plaque { background: var(--surface-high); border-color: var(--line); }

        html[data-mode="light"] .eyebrow,
        html[data-mode="jewel"] .eyebrow { color: var(--gold); }

        html[data-mode="light"] .pill,
        html[data-mode="jewel"] .pill { background: var(--surface-high); color: var(--gold); }

        html[data-mode="light"] .dock,
        html[data-mode="jewel"] .dock {
            background: rgba(255, 255, 255, .94);
            border-color: var(--line);
            box-shadow: 0 16px 34px -24px rgba(16, 42, 67, .5);
        }

        html[data-mode="light"] #audio-pill,
        html[data-mode="jewel"] #audio-pill { background: var(--surface-high); color: var(--gold); border-color: var(--line-strong); }

        html[data-mode="light"] .gate-door,
        html[data-mode="jewel"] .gate-door {
            background: linear-gradient(160deg, color-mix(in srgb, var(--navy) 88%, #FFFFFF), var(--navy) 55%, color-mix(in srgb, var(--navy) 76%, #000));
            border-color: var(--line-strong);
            box-shadow: 0 24px 48px -30px rgba(16, 42, 67, .5);
        }

        html[data-mode="light"] #gate-veil,
        html[data-mode="jewel"] #gate-veil { background: color-mix(in srgb, var(--surface) 74%, transparent); }

        html[data-mode="light"] .gate-seal .plate,
        html[data-mode="jewel"] .gate-seal .plate { background: rgba(255, 255, 255, .86); border-color: var(--line); }

        html[data-mode="light"] .gate-frame,
        html[data-mode="jewel"] .gate-frame {
            background: linear-gradient(180deg, color-mix(in srgb, var(--navy) 92%, #FFFFFF), var(--navy));
            border-color: var(--line-strong);
        }

        html[data-mode="light"] .field,
        html[data-mode="jewel"] .field { background: #FFFFFF; color: var(--on-surface); border-color: var(--line-strong); }

        html[data-mode="light"] #envelope-stage,
        html[data-mode="jewel"] #envelope-stage { background: var(--surface); }

        html[data-mode="light"] .atm-card,
        html[data-mode="jewel"] .atm-card { color: #FFFFFF; }

        /* Tier basic: kartu datar ikut terang. */
        html[data-mode="light"] .basic-card,
        html[data-mode="jewel"] .basic-card { background: var(--surface-container); border-color: var(--line); }
        html[data-mode="light"] .basic-row,
        html[data-mode="jewel"] .basic-row { background: var(--surface-high); }
        html[data-mode="light"] .basic-plaque,
        html[data-mode="jewel"] .basic-plaque { background: var(--surface-high); }
        html[data-mode="light"] .basic-guest,
        html[data-mode="jewel"] .basic-guest { background: rgba(255, 255, 255, .72); border-color: var(--line-strong); }

        /* Panggung desktop: jangan pakai hitam pekat untuk palet terang. */
        @media (min-width: 768px) {
            html[data-mode="light"] body,
            html[data-mode="jewel"] body { background: color-mix(in srgb, var(--obsidian) 88%, #0F172A 12%); }
            html[data-mode="light"] body::before,
            html[data-mode="jewel"] body::before { background: radial-gradient(46% 52% at 50% 42%, color-mix(in srgb, var(--navy) 26%, transparent), transparent 72%); }
            html[data-mode="light"] .shell,
            html[data-mode="jewel"] .shell { box-shadow: 0 40px 90px -44px rgba(16, 42, 67, .45), 0 0 0 8px rgba(255, 255, 255, .6); }
        }
    </style>
@include('templates.partials.wedding-archetypes')
</head>
<body class="gate-locked">
<audio id="bg-audio" loop preload="none" src="{{ $customAudio !== '' ? $customAudio : $audioUrl }}" data-start="{{ $customAudioStart }}"></audio>
<div class="bg-layer" aria-hidden="true"></div>
<div class="page-photo" aria-hidden="true" style="background-image:url('{{ $coverImg }}')"></div>

{{-- Bingkai teater permanen 15% (Eksklusif & Kustom) --}}
<div id="theatre-frame" aria-hidden="true">
    <span class="pillar left"><span class="pillar-cap top"></span><span class="pillar-cap bottom"></span></span>
    <span class="pillar right"><span class="pillar-cap top"></span><span class="pillar-cap bottom"></span></span>
</div>


{{-- ===== 5-PLANE 2.5D PARALLAX (aktif hanya Eksklusif & Kustom) ===== --}}
@php
    $silhouette = $wedArt['silhouette'] ?? match ($cat) {
        'birthday' => '<circle cx="200" cy="120" r="72"/><path d="M200 192v70" stroke="currentColor" stroke-width="3" fill="none"/><circle cx="120" cy="90" r="26"/><circle cx="286" cy="104" r="20"/>',
        'aqiqah' => '<path d="M80 250V160a120 120 0 0 1 240 0v90z"/><path d="M150 250v-60a50 50 0 0 1 100 0v60z" fill="#000" opacity=".35"/>',
        'religious' => '<path d="M70 250V158a130 130 0 0 1 260 0v92z"/><circle cx="330" cy="86" r="34"/><rect x="196" y="52" width="8" height="40"/>',
        'graduate' => '<path d="M60 250V150h40v100zM130 250V120h40v130zM210 250V120h40v130zM290 250V150h40v100z"/><path d="M40 120L200 40l160 80z"/>',
        'corporate' => '<path d="M200 30l130 62v96l-130 82-130-82V92z"/><path d="M200 96l64 30v56l-64 40-64-40v-56z" fill="#000" opacity=".3"/>',
        default => '<path d="M200 12c34 52 122 132 122 196 0 52-54 82-122 82S78 260 78 208C78 144 166 64 200 12z"/><path d="M200 96l62 132H138z" fill="#000" opacity=".28"/>',
    };
@endphp
<div id="parallax-plane-0-bg" aria-hidden="true"></div>
<div id="parallax-plane-1-midground" aria-hidden="true">
    <svg viewBox="0 0 400 300" fill="currentColor" aria-hidden="true">{!! $silhouette !!}</svg>
</div>
<div id="parallax-plane-3-foreground" aria-hidden="true">
    <span class="drape left"></span><span class="drape right"></span>
    <span class="orn-hang left">
        {!! $wedArt['ornament_left'] ?? '<svg width="54" height="150" viewBox="0 0 54 150" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M27 0v40"/><circle cx="27" cy="48" r="6"/><circle cx="27" cy="64" r="6"/><circle cx="27" cy="80" r="6"/><circle cx="27" cy="96" r="6"/><circle cx="27" cy="112" r="6"/><path d="M27 118v20" stroke-dasharray="2 4"/></svg>' !!}
    </span>
    <span class="orn-hang right">
        {!! $wedArt['ornament_right'] ?? '<svg width="46" height="140" viewBox="0 0 46 140" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M23 0v28"/><path d="M8 46h30l-5 40H13z"/><path d="M8 46l15-12 15 12"/><path d="M23 86v18"/><circle cx="23" cy="112" r="5"/></svg>' !!}
    </span>
</div>
<div id="parallax-plane-4-lens" aria-hidden="true">
    <span class="bokeh b1"></span><span class="bokeh b2"></span><span class="bokeh b3"></span>
    <span class="bokeh b4"></span><span class="bokeh b5"></span>
    <span class="bokeh b6"></span><span class="bokeh b7"></span>
</div>
<div id="parallax-plane-5-bespoke" aria-hidden="true">
    <span class="crest"></span>
</div>

<canvas id="sparkle-canvas" aria-hidden="true"></canvas>

<div class="shell">
    {{-- ================= TOP BAR ================= --}}
    <div class="topbar">
        <div class="row">
            <div class="flex items-center gap-1.5 min-w-0">
                <span class="dot"></span>
                <span class="eyebrow truncate">{{ $copy['eyebrow'] }}</span>
            </div>
            @if($showTierDock)
                <div class="pill"><span id="tier-pill-label">{{ strtoupper($tierParam) }}</span> • <span id="tier-pill-price">{{ $tierInfo['price'] }}</span></div>
            @endif
        </div>
        <div class="row mt-1">
            <span class="muted text-[11px] truncate">{{ $styleLabel ? $styleLabel . ' • ' : '' }}{{ $palette }}</span>
            <span class="hud" id="tier-note" style="color:var(--silver)">{{ $tierNote }}</span>
        </div>
        @if($showTierDock)
        <div class="row mt-1.5" id="top-customizer-dock" aria-label="Pratinjau paket">
            <div class="tier-pill">
                @foreach(['basic' => 'Basic', 'premium' => 'Premium', 'eksklusif' => 'Eksklusif', 'kustom' => 'Kustom'] as $tierKey => $tierLabel)
                    <button type="button" data-tier-btn="{{ $tierKey }}" onclick="DKarsaSetTier('{{ $tierKey }}')" aria-pressed="{{ $tierParam === $tierKey ? 'true' : 'false' }}">{{ $tierLabel }}</button>
                @endforeach
            </div>
            <span class="flex items-center gap-2">
                @if($tierParam === 'kustom')
                    <button type="button" class="bespoke-toggle" onclick="DKarsaBespokeToggle()" aria-expanded="false">✦ KUSTOM</button>
                @endif
                <span class="hud" style="color:var(--muted)">{{ $tierInfo['price'] }}</span>
            </span>
        </div>
        @endif
    </div>

    @include('templates.partials.tier-' . $tierParam . '-body')

    {{-- ================= DOCK ================= --}}
    <div id="bottom-hud">
        <nav class="dock" aria-label="Navigasi undangan">
            @foreach([
                ['#profil', 'PROFIL', 'person'],
                ['#acara', 'ACARA', 'event'],
                ['#galeri', 'GALERI', 'photo'],
                ['#section-guest-qr', 'QR TAMU', 'qr'],
                ['#doa', 'DOA', 'heart'],
            ] as [$href, $lbl, $ico])
                <a href="{{ $href }}" class="dock-link" data-nav="{{ ltrim($href, '#') }}">
                    {!! $icon($ico, 18, 1.6) !!}
                    <span class="lbl">{{ $lbl }}</span>
                </a>
            @endforeach
            <button type="button" id="audio-pill" onclick="DKarsaAudio()" aria-label="Putar atau jeda musik" aria-pressed="false">
                {!! $icon('note') !!}
            </button>
        </nav>
    </div>

    {{-- Konfirmasi RSVP: QR terbit + kirim pesan ke pemberi undangan --}}
    <div id="rsvp-success-modal" class="fixed inset-0 z-[62] hidden items-center justify-center p-5"
         style="background:rgba(0,0,0,.92)"
         onclick="if(event.target===this)DKarsaCloseRsvp()" role="dialog" aria-modal="true" aria-labelledby="rsvp-thanks-name">
        <div class="w-full max-w-[330px] rounded-3xl p-5 text-center"
             style="background:var(--surface);border:1px solid color-mix(in srgb,var(--accent) 45%,transparent);box-shadow:0 40px 80px -40px rgba(0,0,0,.9)">
            <span class="inline-block px-3 py-1 rounded-full text-[9px] font-bold tracking-[.18em] uppercase"
                  style="background:color-mix(in srgb,var(--accent) 20%,transparent);color:var(--accent-2)">Konfirmasi Terkirim</span>
            <h4 id="rsvp-thanks-name" class="serif text-lg mt-2" style="color:var(--ink)">Terima kasih</h4>
            <p class="text-[11px] mt-1 leading-relaxed" style="color:var(--soft)">
                QR check-in Anda sudah terbit. Tunjukkan di pintu masuk acara.
            </p>
            <div id="rsvp-qr-box" aria-label="QR check-in tamu"
                 style="width:184px;height:184px;margin:14px auto 0;padding:10px;background:#fff;border-radius:14px;box-shadow:0 0 0 1px rgba(212,175,55,.4)"></div>
            <p id="rsvp-qr-meta" class="text-[10.5px] font-mono mt-2" style="color:var(--soft)"></p>
            <a id="rsvp-wa-link" href="#" target="_blank" rel="noopener"
               class="mt-4 flex items-center justify-center gap-2 min-h-[44px] rounded-xl text-[11px] font-bold uppercase tracking-wider"
               style="background:#25d366;color:#062b14">
                <span aria-hidden="true">✆</span> Kirim ke Pemberi Undangan
            </a>
            <button type="button" onclick="DKarsaDownloadTicket(this)"
                    class="mt-2 w-full min-h-[42px] rounded-xl text-[11px] font-bold uppercase tracking-wider"
                    style="border:1px solid color-mix(in srgb,var(--ink) 20%,transparent);color:var(--ink)">
                Unduh E-Ticket
            </button>
            <button type="button" onclick="DKarsaCloseRsvp()"
                    class="mt-2 w-full min-h-[42px] rounded-xl text-[11px] font-bold uppercase tracking-wider"
                    style="background:color-mix(in srgb,var(--ink) 8%,transparent);color:var(--ink)">Tutup</button>
        </div>
    </div>

    {{-- lightbox --}}
    <div id="lightboxModal" style="position:fixed;inset:0;z-index:60;display:none;align-items:center;justify-content:center;background:rgba(0,0,0,.94);padding:16px" onclick="DKarsaCloseLightbox()">
        <img id="lightboxImage" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Foto" style="max-width:100%;max-height:90vh;border-radius:12px;border:1px solid var(--foil)">
    </div>
</div>

@if(in_array($cat, ['birthday', 'graduate'], true))
    <canvas id="confetti-canvas" aria-hidden="true" style="position:fixed;inset:0;z-index:45;pointer-events:none;max-width:430px;margin:0 auto"></canvas>
@endif

<script>
    /* ---------- gerbang / amplop ---------- */
    const DKarsaTier = () => document.documentElement.dataset.tier || 'eksklusif';
    let gateP = 0, gateOpen = false, gateUnlocked = false, gesturePx = 0, gatePhase = 'intro', gateDir = 1;
    const GATE_TRAVEL = 720;
    const IS_ENVELOPE = @json($isCorporate);

    function lockScroll() {
        window.scrollTo(0, 0);
        const main = document.getElementById('invitation-content');
        if (main) { main.style.overflowY = 'hidden'; main.scrollTop = 0; }
        document.documentElement.style.overflow = 'clip';
        document.body.style.overflowY = 'hidden';
    }
    function unlockScroll() {
        const main = document.getElementById('invitation-content');
        if (main) { main.style.overflowY = ''; }
        document.documentElement.style.overflow = '';
        document.body.style.overflowY = 'auto';
    }
    lockScroll();

    function applyGate(p) {
        const e = p < .86 ? p : .86 + (1 - Math.pow(1 - (p - .86) / .14, 2)) * .14;
        const veil = document.getElementById('gate-veil');
        if (veil) veil.style.opacity = String(p < .9 ? 1 : Math.max(0, 1 - (p - .9) / .1));
        const left = document.getElementById('gateDoorLeft');
        const right = document.getElementById('gateDoorRight');
        const seal = document.getElementById('gateSeal');
        if (left && right) {
            const premium = DKarsaTier() === 'premium';
            left.style.transform = premium
                ? `translate3d(${-100 * e}%,0,0)`
                : `translate3d(${-78 * e}%,0,0) rotateY(${-24 * e}deg) rotateZ(${-6 * e}deg)`;
            right.style.transform = premium
                ? `translate3d(${100 * e}%,0,0)`
                : `translate3d(${78 * e}%,0,0) rotateY(${24 * e}deg) rotateZ(${6 * e}deg)`;
            const fade = p > .88 ? Math.max(0, 1 - (p - .88) / .12) : 1;
            left.style.opacity = String(fade);
            right.style.opacity = String(fade);
        }
        const seam = document.getElementById('gate-seam');
        if (seam) seam.style.opacity = String(Math.max(0, 1 - p * 2.4));
        if (seal) { seal.style.opacity = String(Math.max(0, 1 - p * 2.2)); seal.style.transform = `scale(${1 - .06 * Math.min(1, p * 2)})`; }
        document.body.classList.toggle('gate-locked', p < .995);
    }

    let gateTween = 0;

    /* Klik tombol = gerbang terbuka sendiri (scroll/swipe tetap alternatif). */
    function DKarsaAnimateGate() {
        gatePhase = 'opening';
        const from = gateP;
        const t0 = performance.now();
        const dur = 1000;
        cancelAnimationFrame(gateTween);
        (function step(now) {
            const k = Math.min(1, (now - t0) / dur);
            const eased = 1 - Math.pow(1 - k, 3);
            renderGate(from + (1 - from) * eased);
            if (k < 1) { gateTween = requestAnimationFrame(step); }
        })(t0);
    }

    function renderGate(p) {
        gateP = Math.min(1, Math.max(0, p));
        applyGate(gateP);
        if (gateP >= .999) unlockContent();
    }

    function unlockContent() {
        if (gateUnlocked) return;
        gateUnlocked = true; gatePhase = 'open';
        unlockScroll();
        document.body.classList.remove('gate-locked');
        document.body.classList.add('gate-open');
        const gate = document.getElementById('gate-overlay');
        if (gate) gate.classList.add('gate-hidden');
        const env = document.getElementById('envelope-stage');
        if (env) env.classList.add('env-hidden');
        document.querySelectorAll('.reveal').forEach((el) => el.classList.add('is-visible'));
        if (window.DKarsaParticlesStart) window.DKarsaParticlesStart();
        // Section memakai content-visibility: ukur ulang offset setelah konten benar-benar tampil.
        try { window.dispatchEvent(new Event('resize')); } catch (e) {}
    }


    /* Ganti paket saat gerbang sudah terbuka → tutup kembali & tampilkan sampul paket baru. */
    function DKarsaRelockGate() {
        cancelAnimationFrame(gateTween);
        gateUnlocked = false;
        gateOpen = false;
        gatePhase = 'intro';
        gesturePx = 0;
        gateP = 0;
        document.body.classList.remove('gate-open');
        document.body.classList.add('gate-locked');
        if (window.DKarsaParticlesStop) window.DKarsaParticlesStop();
        const gate = document.getElementById('gate-overlay');
        if (gate) { gate.classList.remove('gate-hidden'); }
        const env = document.getElementById('envelope-stage');
        if (env) {
            env.classList.add('env-hidden');
            env.querySelectorAll('.open').forEach((el) => el.classList.remove('open'));
        }
        document.querySelectorAll('.reveal').forEach((el) => el.classList.remove('is-visible'));
        lockScroll();
        applyGate(0);
        window.scrollTo(0, 0);
        const main = document.getElementById('invitation-content');
        if (main) main.scrollTop = 0;
    }

    function DKarsaOpen() {
        const audio = document.getElementById('bg-audio');
        if (audio) {
            const offset = Number(audio.dataset.start || 0);
            if (offset > 0) {
                try { audio.currentTime = offset; } catch (e) {}
            }
            audio.play().catch(() => {});
        }
        const pill = document.getElementById('audio-pill');
        if (pill) { pill.classList.add('is-playing'); pill.setAttribute('aria-pressed', 'true'); }
        if (DKarsaTier() !== 'basic') DKarsaConfetti();
        if (DKarsaTier() === 'basic') {          // Basic: sampul datar memudar, tanpa kinematika daun
            unlockContent();
            return;
        }
        if (IS_ENVELOPE) {
            const env = document.getElementById('envelope-stage');
            if (env) env.classList.remove('env-hidden');
            lockScroll();
            gateOpen = true; gatePhase = 'intro'; gesturePx = 0;
            const flap = document.getElementById('envFlap');
            const pocket = document.getElementById('envPocket');
            setTimeout(() => { if (flap) flap.classList.add('open'); }, 120);
            setTimeout(() => { if (pocket) pocket.classList.add('open'); }, 620);
            setTimeout(() => { unlockContent(); }, 1500);
            return;
        }
        gateOpen = true; gesturePx = GATE_TRAVEL;
        DKarsaAnimateGate();
    }

    window.addEventListener('wheel', (ev) => {
        if (!gateOpen || gatePhase !== 'intro') return;
        const step = ev.deltaMode === 1 ? ev.deltaY * 16 : ev.deltaY * 1.9;
        ev.preventDefault();
        gesturePx = Math.max(0, Math.min(GATE_TRAVEL, gesturePx + Math.sign(step) * Math.min(Math.abs(step), 135)));
        renderGate(gesturePx / GATE_TRAVEL);
    }, { passive: false });

    let lastY = 0;
    window.addEventListener('touchstart', (ev) => { if (gateOpen) lastY = ev.touches[0].clientY; }, { passive: true });
    window.addEventListener('touchmove', (ev) => {
        if (!gateOpen || gatePhase !== 'intro') return;
        const d = lastY - ev.touches[0].clientY; lastY = ev.touches[0].clientY;
        if (ev.cancelable) ev.preventDefault();
        gesturePx = Math.max(0, Math.min(GATE_TRAVEL, gesturePx + Math.sign(d) * Math.min(Math.abs(d), 135)));
        renderGate(gesturePx / GATE_TRAVEL);
    }, { passive: false });

    /* ---------- confetti (ulang tahun & wisuda) ---------- */
    function DKarsaConfetti() {
        const cv = document.getElementById('confetti-canvas');
        if (!cv) return;
        const ctx = cv.getContext('2d');
        /* resolusi 1x: fill-rate jauh lebih murah di layar Retina */
        cv.width = innerWidth; cv.height = innerHeight;
        const colors = ['#E5C158', '#D4AF37', '#C5BC9E', '#f2ca50', '#ffdada'];
        const parts = Array.from({ length: 48 }, () => ({
            x: innerWidth / 2 + (Math.random() - .5) * 120,
            y: innerHeight * .32,
            vx: (Math.random() - .5) * 7,
            vy: Math.random() * -7 - 2,
            s: 3 + Math.random() * 4,
            r: Math.random() * Math.PI,
            c: colors[(Math.random() * colors.length) | 0]
        }));
        let frames = 0;
        (function loop() {
            ctx.clearRect(0, 0, cv.width, cv.height);
            parts.forEach((p) => {
                p.vy += .16; p.x += p.vx; p.y += p.vy; p.r += .06;
                ctx.save(); ctx.translate(p.x, p.y); ctx.rotate(p.r);
                ctx.fillStyle = p.c; ctx.globalAlpha = Math.max(0, 1 - frames / 120);
                ctx.fillRect(-p.s / 2, -p.s / 2, p.s, p.s * 1.6); ctx.restore();
            });
            if (++frames < 130) requestAnimationFrame(loop);
            else ctx.clearRect(0, 0, cv.width, cv.height);
        })();
    }


    /* ---------- parallax & partikel (eksklusif / kustom) ---------- */
    /* Satu listener pasif → satu rAF → satu CSS var (--sy). Tidak ada tulis style per elemen. */
    function DKarsaParallax() {
        const root = document.documentElement;
        if (DKarsaTier() === 'basic' || DKarsaTier() === 'premium') { root.style.setProperty('--sy', '0'); return; }
        let ticking = false;
        const apply = () => { ticking = false; root.style.setProperty('--sy', String(DKarsaScrollTop() | 0)); };
        const onScroll = () => { if (!ticking) { ticking = true; requestAnimationFrame(apply); } };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        apply();
    }

    /* ---------- partikel: 1x resolution, maks 14, stamp 24x24, lifecycle ---------- */
    const DKARSA_WED = @json($customParticle !== '' && $customParticle !== 'auto' ? $customParticle : $wed);
    const DKARSA_CUSTOM_INTENSITY = @json($customIntensity ?: 1);
    const DKARSA_HIDDEN_SECTIONS = @json($customHidden);

    /* Studio kustom: sembunyikan seksi yang dimatikan (beserta tautan HUD-nya). */
    (function hideCustomSections() {
        if (!Array.isArray(DKARSA_HIDDEN_SECTIONS) || !DKARSA_HIDDEN_SECTIONS.length) { return; }
        const map = {
            quotes: ['#doa-quote', '#quote', 'section[id="quote"]'],
            story: ['#cerita', '#section-story'],
            gallery: ['#galeri', '#section-gallery'],
            dresscode: ['#dresscode'],
            gift: ['#gift', '#section-digital-gift', '#amplop'],
            gift_address: ['#gift-address'],
            wishes: ['#ucapan', '#section-wishes']
        };
        DKARSA_HIDDEN_SECTIONS.forEach((key) => {
            (map[key] || []).forEach((sel) => {
                document.querySelectorAll(sel).forEach((el) => { el.style.display = 'none'; });
            });
        });
        const anchors = { ACARA: '#acara', GALERI: '#galeri', PROFIL: '#profil', DOA: '#doa' };
        document.querySelectorAll('#bottom-hud .dock-link').forEach((link) => {
            const label = (link.querySelector('.lbl') || {}).textContent || '';
            const target = anchors[label.trim()] || link.getAttribute('href');
            if (target && document.querySelector(target) && document.querySelector(target).style.display === 'none') {
                link.style.display = 'none';
            }
        });
    })();

    const DKARSA_PARTICLE_PRESETS = {
        jasmine:      { count: 14, rise: false, color: '#F7F3E6', glow: 0 },
        firefly:      { count: 14, rise: true,  color: '#E9D27A', glow: 1 },
        diamond:      { count: 12, rise: false, color: '#E5C158', glow: 0 },
        frangipani:   { count: 12, rise: false, color: '#FFF6E8', glow: 0 },
        bokeh:        { count: 10, rise: true,  color: '#E5C158', glow: 1 },
        petal:        { count: 14, rise: false, color: '#F2B8C6', glow: 0 },
        star:         { count: 14, rise: true,  color: '#F4D98B', glow: 1 },
        bubble:       { count: 12, rise: true,  color: '#EBD9A6', glow: 1 },
        sakura:       { count: 14, rise: false, color: '#F7D9E3', glow: 0 }
    };

    const DKARSA_PARTICLE_MAX = 14;

    function DKarsaParticles() {
        /* API selalu ada supaya pemanggil tidak perlu cek; jadi no-op bila tidak aktif. */
        if (!window.DKarsaParticlesStart) { window.DKarsaParticlesStart = function () {}; }
        if (!window.DKarsaParticlesStop) { window.DKarsaParticlesStop = function () {}; }
        const cv = document.getElementById('particle-canvas');
        if (!cv) return;
        if (DKarsaTier() === 'basic' || DKarsaTier() === 'premium') return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        const shape = (DKARSA_WED && DKARSA_PARTICLE_PRESETS[DKARSA_WED]) ? DKARSA_WED : 'default';
        const preset = Object.assign({}, DKARSA_PARTICLE_PRESETS[shape] || { count: 12, rise: false, color: '#E5C158', glow: 0 });

        /* Warna partikel mengikuti aksen tema (--gold) supaya tidak bertabrakan dengan palet. */
        const themeAccent = (getComputedStyle(document.documentElement).getPropertyValue('--gold') || '').trim();
        if (themeAccent) { preset.color = themeAccent; }
        const count = Math.min(DKARSA_PARTICLE_MAX, preset.count || DKARSA_PARTICLE_MAX);
        const ctx = cv.getContext('2d');

        let W = cv.clientWidth || 430;
        let H = cv.clientHeight || window.innerHeight;
        const fit = () => {
            W = cv.clientWidth || 430;
            H = cv.clientHeight || window.innerHeight;
            cv.width = Math.round(W);
            cv.height = Math.round(H);
        };
        fit();
        window.addEventListener('resize', fit);

        /* Bentuk digambar sekali ke canvas 24x24; loop hanya drawImage. */
        const stamp = document.createElement('canvas');
        stamp.width = 24; stamp.height = 24;
        let activeShape = shape;

        function bakeStamp(targetShape) {
            const sh = targetShape || activeShape;
            const c = stamp.getContext('2d');
            c.clearRect(0, 0, 24, 24);
            c.resetTransform ? c.resetTransform() : c.setTransform(1, 0, 0, 1, 0, 0);
            const r = sh === 'bokeh' ? 9 : 6;
            c.translate(12, 12);
            c.fillStyle = preset.color;
            c.globalAlpha = 0.62;
            if (preset.glow) { c.shadowColor = preset.color; c.shadowBlur = 6; }

            const petalStar = (radius, petals) => {
                for (let i = 0; i < petals; i++) {
                    const a = (i * Math.PI * 2) / petals;
                    c.beginPath();
                    c.ellipse(Math.cos(a) * radius * 0.9, Math.sin(a) * radius * 0.9, radius * 0.85, radius * 0.5, a, 0, Math.PI * 2);
                    c.fill();
                }
                c.beginPath(); c.arc(0, 0, radius * 0.42, 0, Math.PI * 2);
                c.fillStyle = 'rgba(255,255,255,.55)'; c.fill(); c.fillStyle = preset.color;
            };

            switch (sh) {
                case 'jasmine':
                case 'melati':
                    c.beginPath(); c.ellipse(0, 0, r * 0.55, r * 1.5, 0, 0, Math.PI * 2); c.fill();
                    break;
                case 'firefly':
                case 'fireflies':
                    c.beginPath(); c.arc(0, 0, r * 0.9, 0, Math.PI * 2); c.fill();
                    break;
                case 'diamond':
                case 'gold-diamond':
                    c.rotate(Math.PI / 4); c.fillRect(-r, -r, r * 2, r * 2);
                    break;
                case 'frangipani':
                    petalStar(r * 1.2, 5);
                    break;
                case 'bokeh': {
                    const g = c.createRadialGradient(0, 0, 0, 0, 0, r);
                    g.addColorStop(0, 'rgba(229,193,88,.42)');
                    g.addColorStop(1, 'rgba(229,193,88,0)');
                    c.fillStyle = g; c.beginPath(); c.arc(0, 0, r, 0, Math.PI * 2); c.fill();
                    break;
                }
                case 'petal':
                case 'rose':
                    c.beginPath();
                    c.moveTo(0, -r * 1.4);
                    c.bezierCurveTo(r * 1.3, -r * 0.4, r * 1.1, r * 1.1, 0, r * 1.4);
                    c.bezierCurveTo(-r * 1.1, r * 1.1, -r * 1.3, -r * 0.4, 0, -r * 1.4);
                    c.fill();
                    break;
                case 'star':
                case 'islamic-star':
                    c.beginPath();
                    for (let i = 0; i < 8; i++) {
                        const rad = i % 2 === 0 ? r * 1.3 : r * 0.55;
                        const a = (i * Math.PI) / 4;
                        const px = Math.cos(a) * rad, py = Math.sin(a) * rad;
                        i === 0 ? c.moveTo(px, py) : c.lineTo(px, py);
                    }
                    c.closePath(); c.fill();
                    break;
                case 'bubble':
                    c.beginPath(); c.arc(0, 0, r * 0.9, 0, Math.PI * 2);
                    c.strokeStyle = preset.color; c.lineWidth = 1.2; c.stroke();
                    c.globalAlpha = .35; c.fill();
                    break;
                case 'sakura':
                    petalStar(r * 1.1, 5);
                    break;
                case 'confetti':
                    c.rotate(Math.PI / 6);
                    c.fillRect(-r, -r * 0.45, r * 2, r * 0.9);
                    break;
                default:
                    c.beginPath(); c.ellipse(0, 0, r, r * 0.62, 0, 0, Math.PI * 2); c.fill();
            }
        }
        bakeStamp(shape);

        window.DKarsaParticlesBake = (shapeName, speedMult, newColor) => {
            if (!cv) return;
            if (shapeName === 'off') {
                cv.style.display = 'none';
                if (window.DKarsaParticlesStop) window.DKarsaParticlesStop();
                return;
            }
            cv.style.display = '';
            const aliases = {
                melati: 'jasmine',
                rose: 'petal',
                fireflies: 'firefly',
                'gold-diamond': 'diamond',
                'islamic-star': 'star'
            };
            const mapped = aliases[shapeName] || shapeName || activeShape;
            activeShape = mapped;
            if (newColor) { preset.color = newColor; }
            if (speedMult) { DKARSA_CUSTOM_INTENSITY = parseFloat(speedMult) || 1; }
            bakeStamp(activeShape);
            if (!running && window.DKarsaParticlesStart) {
                window.DKarsaParticlesStart();
            }
        };

        const items = Array.from({ length: count }, () => ({
            x: Math.random() * W,
            y: Math.random() * H,
            s: shape === 'bokeh' ? 14 + Math.random() * 10 : 8 + Math.random() * 8,
            vy: preset.rise ? -(0.25 + Math.random() * 0.6) : (0.25 + Math.random() * 0.5),
            vx: -0.2 + Math.random() * 0.4,
            a: 0.2 + Math.random() * 0.35,
            rot: Math.random() * Math.PI,
            spin: (Math.random() - 0.5) * 0.02,
            phase: Math.random() * Math.PI * 2
        }));

        let raf = 0, running = false;

        function frame() {
            if (!running) return;
            ctx.clearRect(0, 0, W, H);
            const t = performance.now() / 1000;

            for (let i = 0; i < items.length; i++) {
                const p = items[i];
                p.y += p.vy * DKARSA_CUSTOM_INTENSITY;
                p.x += (p.vx + (shape === 'petal' ? Math.sin(p.y * 0.03) * 0.5 : 0)) * DKARSA_CUSTOM_INTENSITY;
                p.rot += p.spin;

                if (p.y > H + 24) { p.y = -24; p.x = Math.random() * W; }
                if (p.y < -24) { p.y = H + 24; p.x = Math.random() * W; }
                if (p.x > W + 24) { p.x = -24; }
                if (p.x < -24) { p.x = W + 24; }

                ctx.globalAlpha = shape === 'firefly'
                    ? p.a * (0.4 + 0.6 * Math.abs(Math.sin(t * 1.2 + p.phase)))
                    : p.a;

                if (shape === 'jasmine' || shape === 'petal' || shape === 'frangipani' || shape === 'sakura' || shape === 'diamond') {
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.rot);
                    ctx.drawImage(stamp, -p.s / 2, -p.s / 2, p.s, p.s);
                    ctx.restore();
                } else {
                    ctx.drawImage(stamp, p.x - p.s / 2, p.y - p.s / 2, p.s, p.s);
                }
            }
            ctx.globalAlpha = 1;
            raf = requestAnimationFrame(frame);
        }

        window.DKarsaParticlesStart = () => {
            if (running) return;
            if (DKarsaTier() === 'basic' || DKarsaTier() === 'premium') return;
            running = true;
            raf = requestAnimationFrame(frame);
        };
        window.DKarsaParticlesStop = () => {
            running = false;
            cancelAnimationFrame(raf);
            ctx.clearRect(0, 0, W, H);
        };

        /* Berhenti saat tab disembunyikan; lanjut hanya bila gerbang sudah dibuka. */
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) { window.DKarsaParticlesStop(); }
            else if (document.body.classList.contains('gate-open')) { window.DKarsaParticlesStart(); }
        });
    }

    /* ---------- RSVP → QR terbit + kirim konfirmasi ke pemberi undangan ---------- */
    const DKARSA_HOST_PHONE = @json($hostPhone);
    const DKARSA_HOST_NAME = @json($hostName);
    const DKARSA_INVITE_URL = location.origin + location.pathname;

    function DKarsaRsvpSubmit(form, ev) {
        if (ev) { ev.preventDefault(); }
        const guest = window.DKarsaGuest;
        if (!guest) { return true; }

        const name = (form.querySelector('[name="name"]')?.value || '').trim();
        const count = form.querySelector('[name="guest_count"]')?.value || '1';
        const attend = form.querySelector('[name="attendance"]:checked')?.value || 'hadir';
        const hadir = !/tidak|ragu/i.test(attend);

        guest.state.to = name || guest.state.to;
        guest.state.pax = count + ' Orang';
        guest.state.status = hadir ? 'TERKONFIRMASI HADIR' : 'BERHALANGAN';
        guest.state.confirmed = true;
        guest.state.confirmedAt = new Date().toLocaleString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        guest.paint();

        // Simpan ke server tanpa meninggalkan halaman (form tetap terkirim).
        try {
            fetch(form.action, { method: 'POST', body: new FormData(form), headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .catch(() => {});
        } catch (e) {}

        const modal = document.getElementById('rsvp-success-modal');
        const thanks = document.getElementById('rsvp-thanks-name');
        const qrBox = document.getElementById('rsvp-qr-box');
        const meta = document.getElementById('rsvp-qr-meta');
        const wa = document.getElementById('rsvp-wa-link');

        if (thanks) { thanks.textContent = 'Terima kasih, ' + guest.state.to; }
        if (qrBox) { qrBox.innerHTML = window.DKarsaQR.svg(guest.payload(), 164); }
        if (meta) { meta.textContent = guest.state.id + ' • ' + guest.state.pax + ' • ' + guest.state.status; }
        if (wa) {
            const pesan = hadir
                ? 'Halo ' + DKARSA_HOST_NAME + ', saya *' + guest.state.to + '* mengonfirmasi HADIR di acara Anda (' + guest.state.pax + '). ID tiket: ' + guest.state.id + '. Terima kasih atas undangannya. ' + DKARSA_INVITE_URL
                : 'Halo ' + DKARSA_HOST_NAME + ', mohon maaf saya *' + guest.state.to + '* belum bisa hadir di acara Anda. Terima kasih atas undangannya. ' + DKARSA_INVITE_URL;
            wa.href = 'https://wa.me/' + DKARSA_HOST_PHONE + '?text=' + encodeURIComponent(pesan);
        }
        if (modal) { modal.classList.remove('hidden'); modal.classList.add('flex'); }
        return false;
    }

    function DKarsaCloseRsvp() {
        const modal = document.getElementById('rsvp-success-modal');
        if (modal) { modal.classList.add('hidden'); modal.classList.remove('flex'); }
        // Kartu e-ticket di halaman ikut berubah, bukan hanya pop-up.
        const section = document.getElementById('section-guest-qr');
        if (section && section.scrollIntoView) {
            setTimeout(() => { section.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 120);
        }
    }

    /* ---------- kustom: bespoke dock ---------- */
    function DKarsaBespokeToggle() {
        const panel = document.getElementById('bespoke-panel');
        if (!panel) { return; }
        panel.hidden = !panel.hidden;
        document.querySelectorAll('.bespoke-toggle').forEach((b) => b.setAttribute('aria-expanded', panel.hidden ? 'false' : 'true'));
    }
    function DKarsaGateStyle(kind) {
        const gate = document.getElementById('gate-overlay');
        if (gate) {
            gate.classList.toggle('gate-arch', kind === 'arch');
            gate.classList.toggle('gate-cover', kind === 'envelope');
        }
        document.querySelectorAll('[data-gate]').forEach((b) => b.classList.toggle('is-on', b.dataset.gate === kind));
    }
    const DKarsaLangDict = {
        id: { open: '[ BUKA UNDANGAN ]', qrTitle: 'E-Ticket Resepsi & QR Buku Tamu Digital', qrSub: 'AKSES BUKU TAMU DIGITAL', rsvp: 'Konfirmasi Kehadiran' },
        en: { open: '[ OPEN INVITATION ]', qrTitle: 'Reception E-Ticket & Digital Guest QR', qrSub: 'DIGITAL GUEST ACCESS', rsvp: 'Attendance Confirmation' }
    };
    function DKarsaLang(lang) {
        const dict = DKarsaLangDict[lang] || DKarsaLangDict.id;
        document.documentElement.lang = lang;
        const set = (sel, text) => { const el = document.querySelector(sel); if (el) el.textContent = text; };
        set('#btn-open-invitation', dict.open);
        set('#qr-ticket-title', dict.qrTitle);
        set('#qr-ticket-subtitle', dict.qrSub);
        set('#rsvp h2', dict.rsvp);
        document.querySelectorAll('[data-lang]').forEach((b) => b.classList.toggle('is-on', b.dataset.lang === lang));
    }

    /* ---------- kustom: video, seat lookup, wishlist ---------- */
    function DKarsaVideo() {
        const modal = document.getElementById('video-modal');
        const frame = document.getElementById('videoFrame');
        if (!modal) return;
        if (frame && !frame.src) frame.src = @json($couple->video_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ');
        modal.hidden = false;
    }
    function DKarsaCloseVideo() {
        const modal = document.getElementById('video-modal');
        const frame = document.getElementById('videoFrame');
        if (frame) frame.src = '';
        if (modal) modal.hidden = true;
    }
    function DKarsaSeatLookup() {
        const input = document.getElementById('seatLookupInput');
        const out = document.getElementById('seatLookupResult');
        if (!input || !out) return;
        const q = input.value.trim().toLowerCase();
        const guest = window.DKarsaGuest ? window.DKarsaGuest.state : { to: '', seat: '' };
        if (!q) { out.textContent = 'Masukkan nama atau nomor meja untuk melihat posisi.'; return; }
        const match = (guest.to || '').toLowerCase().includes(q) || (guest.seat || '').toLowerCase().includes(q);
        out.textContent = match
            ? 'Ditemukan: ' + guest.to + ' — ' + guest.seat
            : 'Tidak ada tamu yang cocok. Hubungi penerima tamu di meja registrasi.';
    }
    function DKarsaWishlist() {
        const picked = [...document.querySelectorAll('.wish-check:checked')].map((c) => c.parentElement.textContent.trim());
        if (window.DKarsaGuest) window.DKarsaGuest.toast(picked.length ? 'Wishlist disimpan: ' + picked.length + ' item' : 'Pilih hadiah terlebih dahulu');
    }

    function applyKustomConfig(cfg) {
        const sp = new URLSearchParams(window.location.search);
        const c = cfg || {};

        const tier = c.tier || sp.get('tier');
        if (tier) {
            document.documentElement.dataset.tier = tier;
        }

        // 1. Colors: cBg, cCard, cAcc, cTxt
        const cBg = c.cBg || sp.get('cBg');
        const cCard = c.cCard || sp.get('cCard');
        const cAcc = c.cAcc || sp.get('cAcc');
        const cTxt = c.cTxt || sp.get('cTxt');

        const rootStyle = document.documentElement.style;
        if (cBg) {
            rootStyle.setProperty('--bg-page', cBg);
            rootStyle.setProperty('--surface', cBg);
            rootStyle.setProperty('--obsidian', cBg);
            rootStyle.setProperty('--bg', cBg);
            const bespokeBg = document.getElementById('bespokeBg');
            if (bespokeBg && bespokeBg.value !== cBg) bespokeBg.value = cBg;
        }
        if (cCard) {
            rootStyle.setProperty('--bg-card', cCard);
            rootStyle.setProperty('--surface-container', cCard);
            rootStyle.setProperty('--surface-high', `color-mix(in srgb, ${cCard} 92%, var(--accent, #C9A050))`);
            rootStyle.setProperty('--surface-2', cCard);
            const bespokeCard = document.getElementById('bespokeCard');
            if (bespokeCard && bespokeCard.value !== cCard) bespokeCard.value = cCard;
        }
        if (cAcc) {
            rootStyle.setProperty('--accent', cAcc);
            rootStyle.setProperty('--gold', cAcc);
            rootStyle.setProperty('--foil', cAcc);
            rootStyle.setProperty('--accent-ink', cAcc);
            rootStyle.setProperty('--line', `color-mix(in srgb, ${cAcc} 24%, transparent)`);
            rootStyle.setProperty('--line-strong', `color-mix(in srgb, ${cAcc} 48%, transparent)`);
            const bespokeColor = document.getElementById('bespokeColor');
            if (bespokeColor && bespokeColor.value !== cAcc) bespokeColor.value = cAcc;
        }
        if (cTxt) {
            rootStyle.setProperty('--text-main', cTxt);
            rootStyle.setProperty('--on-surface', cTxt);
            rootStyle.setProperty('--ink', cTxt);
            const bespokeTxt = document.getElementById('bespokeTxt');
            if (bespokeTxt && bespokeTxt.value !== cTxt) bespokeTxt.value = cTxt;
        }

        // Re-tint Gate / Parallax / Particles
        const gate = document.getElementById('gate-overlay');
        const bespokePlane = document.getElementById('parallax-plane-5-bespoke');
        if (bespokePlane && cAcc) {
            const crest = bespokePlane.querySelector('.crest');
            if (crest) {
                crest.style.borderColor = `color-mix(in srgb, ${cAcc} 45%, transparent)`;
            }
        }
        if (window.DKarsaParticlesBake) {
            window.DKarsaParticlesBake(c.cPart || sp.get('cPart'), c.cSpd || sp.get('cSpd'), cAcc);
        }

        // 2. cGate: switch #gate-overlay & #parallax-foreground SVG archetype
        const cGate = c.cGate || sp.get('cGate');
        if (cGate) {
            document.documentElement.dataset.gate = cGate;
            if (gate) {
                gate.classList.remove('gate-arch', 'gate-cover', 'gate-gunungan', 'gate-mihrab', 'gate-candi', 'gate-straight');
                if (cGate === 'arch') gate.classList.add('gate-arch');
                else if (cGate === 'envelope' || cGate === 'cover') gate.classList.add('gate-cover');
                else if (cGate) gate.classList.add('gate-' + cGate);
            }
            const fore = document.getElementById('parallax-plane-3-foreground') || document.getElementById('parallax-foreground');
            if (fore) {
                fore.dataset.gate = cGate;
            }
        }

        // 3. cPart, cSpd: switch #particle-canvas stamp & speed
        const cPart = c.cPart || sp.get('cPart');
        const cSpd = c.cSpd || sp.get('cSpd');
        if (cPart) {
            document.documentElement.dataset.part = cPart;
        }
        const cv = document.getElementById('particle-canvas');
        if (cv) {
            if (cPart === 'off') {
                cv.style.display = 'none';
            } else {
                cv.style.display = '';
                if (window.DKarsaParticlesBake) {
                    window.DKarsaParticlesBake(cPart, cSpd, cAcc);
                }
            }
        }

        // 4. cFont, cFrame: update --font-heading/--font-body & portrait .couple-frame-shape
        const cFont = c.cFont || sp.get('cFont');
        if (cFont) {
            document.documentElement.dataset.font = cFont;
            const fontMap = {
                heritage: { heading: "'Cinzel', serif", body: "'Playfair Display', serif" },
                script: { heading: "'Great Vibes', cursive", body: "'Lora', serif" },
                editorial: { heading: "'Playfair Display', serif", body: "'Inter', sans-serif" },
                islamic: { heading: "'Amiri', serif", body: "'Montserrat', sans-serif" }
            };
            if (fontMap[cFont]) {
                rootStyle.setProperty('--font-heading', fontMap[cFont].heading);
                rootStyle.setProperty('--font-body', fontMap[cFont].body);
            }
        }

        const cFrame = c.cFrame || sp.get('cFrame');
        if (cFrame) {
            document.documentElement.dataset.frame = cFrame;
            document.querySelectorAll('.couple-frame-shape, .couple-portrait').forEach(el => {
                ['gunungan', 'siger', 'bagonjong', 'arch', 'oval', 'pill', 'octagon', 'rect',
                 'frame-gunungan', 'frame-siger', 'frame-bagonjong', 'frame-arch', 'frame-oval', 'frame-pill', 'frame-octagon', 'frame-rect'
                ].forEach(cls => el.classList.remove(cls));
                el.classList.add(cFrame);
                el.classList.add('frame-' + cFrame);
            });
        }

        // 5. cHide: toggle style.display = 'none' on unchecked sections & HUD icons
        const cHide = c.cHide !== undefined ? c.cHide : sp.get('cHide');
        if (cHide !== null && cHide !== undefined) {
            const hiddenKeys = Array.isArray(cHide) ? cHide : String(cHide).split(',').map(s => s.trim()).filter(Boolean);
            const sectionMap = {
                story: ['#story', '#section-story'],
                gallery: ['#galeri', '#gallery', '#section-gallery'],
                dresscode: ['#dresscode', '#section-dresscode'],
                gift: ['#gift', '#hadiah', '#section-digital-gift'],
                wishes: ['#rsvp', '#wishes', '#section-wishes', '#section-rsvp']
            };
            Object.entries(sectionMap).forEach(([key, selList]) => {
                const shouldHide = hiddenKeys.includes(key);
                selList.forEach(sel => {
                    const sec = document.querySelector(sel);
                    if (sec) sec.style.display = shouldHide ? 'none' : '';
                });
                const hudLink = document.querySelector(`.hud-dock a[href="#${key}"], .dock a[href="#${key}"]`);
                if (hudLink) hudLink.style.display = shouldHide ? 'none' : '';
            });
        }

        // 6. cCov, cOvr: set Cover/Hero backgroundImage & overlay scrim opacity
        const cCov = c.cCov || sp.get('cCov');
        if (cCov) {
            const coverEls = document.querySelectorAll('#coverScreen, .page-photo, #hero-cover');
            coverEls.forEach(el => {
                el.style.backgroundImage = `url("${cCov}")`;
                el.style.backgroundSize = 'cover';
                el.style.backgroundPosition = 'center';
            });
        }
        const cOvr = c.cOvr || sp.get('cOvr');
        if (cOvr) {
            const ovrVal = parseInt(cOvr, 10);
            if (!isNaN(ovrVal)) {
                rootStyle.setProperty('--dk-overlay', ovrVal);
                document.querySelectorAll('.page-photo::after, .cover-scrim, #hero-scrim').forEach(el => {
                    el.style.opacity = (ovrVal / 100);
                });
            }
        }

        // 7. cBtn: update #btn-open-invitation text
        const cBtn = c.cBtn || sp.get('cBtn');
        if (cBtn) {
            document.querySelectorAll('#btn-open-invitation, .btn-open-invitation, .btn-gold[onclick="DKarsaOpen()"]').forEach(btn => {
                btn.textContent = cBtn;
            });
        }

        // 8. Dresscode live sync from URL / config
        const ev2Dress = (c && c.event_2_dresscode !== undefined) ? c.event_2_dresscode : sp.get('event_2_dresscode');
        if (ev2Dress !== null && ev2Dress !== undefined) {
            const b2 = document.getElementById('event-2-dresscode-badge');
            if (b2) {
                b2.style.display = ev2Dress.trim() ? 'inline-flex' : 'none';
                b2.classList.toggle('hidden', !ev2Dress.trim());
                const t2 = b2.querySelector('.dresscode-text');
                if (t2) t2.textContent = ev2Dress.trim();
                else b2.textContent = '👔 Dresscode: ' + ev2Dress.trim();
            }
        }
        const ev1Dress = (c && (c.event_1_dresscode !== undefined || c.dresscode !== undefined)) ? (c.event_1_dresscode ?? c.dresscode) : (sp.get('event_1_dresscode') || sp.get('dresscode'));
        if (ev1Dress !== null && ev1Dress !== undefined) {
            const b1 = document.getElementById('event-1-dresscode-badge');
            if (b1) {
                b1.style.display = ev1Dress.trim() ? 'inline-flex' : 'none';
                b1.classList.toggle('hidden', !ev1Dress.trim());
                const t1 = b1.querySelector('.dresscode-text');
                if (t1) t1.textContent = ev1Dress.trim();
                else b1.textContent = '👔 Dresscode: ' + ev1Dress.trim();
            }
        }
    }
    window.applyKustomConfig = applyKustomConfig;

    document.addEventListener('DOMContentLoaded', () => {
        DKarsaParallax();
        DKarsaParticles();
        applyKustomConfig();

        const bespokeBg = document.getElementById('bespokeBg');
        if (bespokeBg) bespokeBg.addEventListener('input', (e) => applyKustomConfig({ cBg: e.target.value }));
        const bespokeCard = document.getElementById('bespokeCard');
        if (bespokeCard) bespokeCard.addEventListener('input', (e) => applyKustomConfig({ cCard: e.target.value }));
        const bespokeColor = document.getElementById('bespokeColor');
        if (bespokeColor) bespokeColor.addEventListener('input', (e) => applyKustomConfig({ cAcc: e.target.value }));
        const bespokeTxt = document.getElementById('bespokeTxt');
        if (bespokeTxt) bespokeTxt.addEventListener('input', (e) => applyKustomConfig({ cTxt: e.target.value }));
    });

    window.addEventListener('message', (event) => {
        if (!event.data) return;
        if (event.data.type === 'APPLY_KUSTOM_CONFIG') {
            applyKustomConfig(event.data.config);
        } else if (event.data.type === 'UPDATE_EVENT_DRESSCODE') {
            const idx = event.data.eventIndex;
            const dress = event.data.dresscode;
            const badge = document.getElementById('event-' + idx + '-dresscode-badge');
            if (badge) {
                badge.style.display = dress ? 'inline-flex' : 'none';
                badge.classList.toggle('hidden', !dress);
                const txt = badge.querySelector('.dresscode-text');
                if (txt) txt.textContent = dress;
                else badge.textContent = '👔 Dresscode: ' + dress;
            }
        } else if (event.data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(event.data.events)) {
            event.data.events.forEach((ev, i) => {
                const badge = document.getElementById('event-' + (i + 1) + '-dresscode-badge');
                if (badge) {
                    const dress = ev.dresscode || '';
                    badge.style.display = dress ? 'inline-flex' : 'none';
                    badge.classList.toggle('hidden', !dress);
                    const txt = badge.querySelector('.dresscode-text');
                    if (txt) txt.textContent = dress;
                    else badge.textContent = '👔 Dresscode: ' + dress;
                }
            });
        }
    });



    /* Studio kustom: nilai dari server (URL /demo atau tautan /p/{token}) diterapkan sebelum gate dibuka. */
    const kustomBootConfig = @json($kustomConfig ?? []);
    if (kustomBootConfig && Object.keys(kustomBootConfig).length) {
        try { applyKustomConfig(kustomBootConfig); } catch (e) {}
    }

    /* Tinggi topbar dinamis → padding-top konten */
    function DKarsaMeasureTopbar() {
        const bar = document.querySelector('.topbar');
        if (bar) { document.documentElement.style.setProperty('--topbar-h', Math.round(bar.getBoundingClientRect().height) + 'px'); }
    }

    /* Desktop: konten di-scroll di dalam main; mobile: window. */
    function DKarsaScroller() {
        const m = document.getElementById('invitation-content');
        return (m && m.scrollHeight > m.clientHeight + 8) ? m : null;
    }
    function DKarsaScrollTop() {
        const s = DKarsaScroller();
        return s ? s.scrollTop : (window.scrollY || document.documentElement.scrollTop || 0);
    }

    /* ================= 5-PLANE 2.5D PARALLAX (halus, satu loop) ================= */
    window.DKarsaParallaxEngine = (function () {
        const root = document.documentElement;
        const state = { y: 0, vel: 0, tx: 0, ty: 0, depth: 1 };

        let ticking = false, raf = 0, running = false;
        let targetY = 0, smoothY = 0, lastY = 0, lastT = 0, hideT = 0;
        let sections = [], cacheDirty = true;
        let midEl = null, ornEls = [], bokehEls = [];

        function highTier() { return DKarsaTier() === 'eksklusif' || DKarsaTier() === 'kustom'; }

        /* Offset section di-cache: tidak ada getBoundingClientRect di dalam frame. */
        function measure() {
            sections = [...document.querySelectorAll('main > section.reveal')].map((el) => ({
                el,
                top: el.offsetTop,
                height: el.offsetHeight
            }));
            cacheDirty = false;
        }

        function scrubCards(y) {
            if (cacheDirty) { measure(); }
            const vh = window.innerHeight;
            for (const s of sections) {
                const top = s.top - y;
                if (top > vh + 200 || top + s.height < -200) { continue; }
                const enter = Math.min(1, Math.max(0, (vh - top) / (vh * 0.55)));
                const inv = 1 - enter;
                s.el.style.setProperty('--card-tilt', inv.toFixed(3));
                s.el.style.setProperty('--card-y', (inv * 36).toFixed(1));
                s.el.style.setProperty('--card-scale', inv.toFixed(3));
                s.el.style.setProperty('--card-fade', inv.toFixed(3));
                s.el.style.setProperty('--card-progress', ((top + s.height / 2 - vh / 2) / vh).toFixed(3));
            }
        }

        function drivePlanes(y) {
            const vh = window.innerHeight;
            const tx = state.tx * state.depth;

            if (midEl) {
                const drift = Math.sin(y * 0.0022) * 58;
                midEl.style.transform = 'translate3d(' + (tx * -14).toFixed(1) + 'px,' + (drift - y * 0.28).toFixed(1) + 'px,0)';
            }

            for (let i = 0; i < ornEls.length; i++) {
                ornEls[i].style.translate = '0 ' + (state.tx * 18 + Math.sin(y * 0.004 + i * 1.7) * 16 - y * 0.48).toFixed(1) + 'px';
            }

            for (let i = 0; i < bokehEls.length; i++) {
                const span = vh + 200;
                const yy = (((y * 0.85 + i * 190) % span) + span) % span;
                bokehEls[i].style.transform = 'translate3d(' + (tx * 22).toFixed(1) + 'px,' + (-yy + 100).toFixed(1) + 'px,0)';
            }
        }

        /* Loop tunggal: hanya hidup saat posisi belum menyusul target (lerp → gerak halus). */
        function loop() {
            smoothY += (targetY - smoothY) * 0.18;
            if (Math.abs(targetY - smoothY) < 0.4) { smoothY = targetY; running = false; }

            state.y = smoothY;
            root.style.setProperty('--scroll-y', smoothY.toFixed(1));
            root.style.setProperty('--sy', String(Math.round(smoothY)));

            if (highTier()) { scrubCards(smoothY); drivePlanes(smoothY); }

            if (running) { raf = requestAnimationFrame(loop); }
        }

        function startLoop() {
            if (running) { return; }
            running = true;
            raf = requestAnimationFrame(loop);
        }

        function apply() {
            ticking = false;
            const raw = DKarsaScrollTop();
            const now = performance.now();
            const dt = Math.max(16, now - (lastT || now));
            state.vel = ((raw - lastY) / dt) * 16;
            window.__dkarsaVel = state.vel;
            lastY = raw; lastT = now;
            targetY = raw;

            root.style.setProperty('--scroll-vel', state.vel.toFixed(2));
            root.style.setProperty('--tilt-x', state.tx.toFixed(3));
            root.style.setProperty('--tilt-y', state.ty.toFixed(3));
            root.style.setProperty('--depth-mult', String(state.depth));

            const fast = Math.abs(state.vel) > 1.2;
            if (fast) {
                document.body.classList.add('dk-pills-hidden');
                clearTimeout(hideT);
            } else if (document.body.classList.contains('dk-pills-hidden') && !hideT) {
                hideT = setTimeout(() => {
                    document.body.classList.remove('dk-pills-hidden');
                    hideT = 0;
                }, 420);
            }

            startLoop();
        }

        function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(apply); } }

        function onPointer(e) {
            state.tx = (e.clientX / window.innerWidth - 0.5) * 2;
            state.ty = (e.clientY / window.innerHeight - 0.5) * 2;
            if (!running) { startLoop(); }
        }

        function injectGlare() {
            document.querySelectorAll('.atm-card, .qr-ticket-card').forEach((card) => {
                if (card.querySelector('.holographic-foil-glare')) { return; }
                const glare = document.createElement('div');
                glare.className = 'holographic-foil-glare';
                glare.setAttribute('aria-hidden', 'true');
                card.appendChild(glare);
            });
        }

        function setDepth(mult) {
            state.depth = [1, 1.5, 2].includes(mult) ? mult : 1;
            try { sessionStorage.setItem('dkarsa-depth', String(state.depth)); } catch (e) {}
            document.querySelectorAll('[data-depth]').forEach((b) => b.classList.toggle('is-on', Number(b.dataset.depth) === state.depth));
            onScroll();
        }

        function onResize() {
            cacheDirty = true;
            measure();
            onScroll();
        }

        function init() {
            try { setDepth(Number(sessionStorage.getItem('dkarsa-depth')) || 1); } catch (e) {}
            injectGlare();
            midEl = document.getElementById('parallax-plane-1-midground');
            ornEls = [...document.querySelectorAll('#parallax-plane-3-foreground .orn-hang')];
            bokehEls = [...document.querySelectorAll('#parallax-plane-4-lens .bokeh')];
            measure();
            window.addEventListener('scroll', onScroll, { passive: true });
            const scroller = document.getElementById('invitation-content');
            if (scroller) {
                // Desktop: #invitation-content yang menggulir, event-nya tidak sampai ke window.
                scroller.addEventListener('scroll', onScroll, { passive: true });
            }
            window.addEventListener('resize', onResize);
            if (window.matchMedia('(pointer: fine)').matches) {
                window.addEventListener('pointermove', onPointer, { passive: true });
            }
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) { running = false; cancelAnimationFrame(raf); }
                else { startLoop(); }
            });
            smoothY = targetY = DKarsaScrollTop();
            apply();
            loop();
        }

        if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
        DKarsaMeasureTopbar();
        window.addEventListener('resize', DKarsaMeasureTopbar);
        setTimeout(DKarsaMeasureTopbar, 400);
        setTimeout(() => { cacheDirty = true; measure(); }, 600);

        return { setDepth: setDepth, state: state, refresh: () => { cacheDirty = true; } };
    })();

    /* ================= KUSTOM: sparkle trail (1x, hanya aktif saat ada partikel) ================= */
    (function () {
        const cv = document.getElementById('sparkle-canvas');
        if (!cv) return;
        const ctx = cv.getContext('2d');
        let parts = [], raf = 0, running = false;
        const fit = () => { cv.width = innerWidth; cv.height = innerHeight; };
        fit(); window.addEventListener('resize', fit);

        function loop() {
            ctx.clearRect(0, 0, cv.width, cv.height);
            for (const p of parts) { p.x += p.vx; p.y += p.vy; p.vy += .02; p.life -= .03; }
            parts = parts.filter((p) => p.life > 0);
            for (const p of parts) {
                ctx.globalAlpha = Math.max(0, p.life); ctx.fillStyle = '#F2CA50';
                ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2); ctx.fill();
            }
            if (parts.length) { raf = requestAnimationFrame(loop); } else { running = false; ctx.clearRect(0, 0, cv.width, cv.height); }
        }

        function spawn(x, y) {
            if (DKarsaTier() !== 'kustom' || document.hidden) return;
            for (let i = 0; i < 2; i++) {
                parts.push({ x, y, vx: (Math.random() - .5) * 1.2, vy: -Math.random() * 1.4 - .2, life: 1, r: 1 + Math.random() * 2.2 });
            }
            if (parts.length > 48) parts = parts.slice(-48);
            if (!running) { running = true; raf = requestAnimationFrame(loop); }
        }

        window.addEventListener('pointermove', (e) => spawn(e.clientX, e.clientY), { passive: true });
        window.addEventListener('touchmove', (e) => { const t = e.touches[0]; if (t) spawn(t.clientX, t.clientY); }, { passive: true });
    })();

    /* ---------- label paket (harga + mekanisme + kuota) ---------- */
    const DKarsaTierMap = @json($tierMapJs);
    function DKarsaSyncTierLabel() {
        const info = DKarsaTierMap[DKarsaTier()];
        if (!info) return;
        const set = (id, text) => { const el = document.getElementById(id); if (el) el.textContent = text; };
        set('tier-pill-label', info.label);
        set('tier-pill-price', info.price);
        set('tier-note', info.note);
    }
    new MutationObserver(() => { DKarsaSyncTierLabel(); DKarsaRelockGate(); })
        .observe(document.documentElement, { attributes: true, attributeFilter: ['data-tier'] });

    /* ---------- audio ---------- */
    function DKarsaAudio() {
        const a = document.getElementById('bg-audio');
        const pill = document.getElementById('audio-pill');
        if (!a) return;
        if (a.paused) { a.play().catch(() => {}); } else { a.pause(); }
        const playing = !a.paused;
        if (pill) { pill.classList.toggle('is-playing', playing); pill.setAttribute('aria-pressed', playing ? 'true' : 'false'); }
    }

    /* ---------- countdown ---------- */
    const DKarsaTarget = new Date(@json($targetDate->toIso8601String())).getTime();
    function DKarsaTick() {
        const diff = DKarsaTarget - Date.now();
        const set = (id, v) => { const el = document.getElementById(id); if (el) el.textContent = String(v).padStart(2, '0'); };
        if (diff <= 0) { ['cdDays', 'cdHours', 'cdMinutes', 'cdSeconds'].forEach((id) => set(id, 0)); return; }
        set('cdDays', Math.floor(diff / 86400000));
        set('cdHours', Math.floor((diff % 86400000) / 3600000));
        set('cdMinutes', Math.floor((diff % 3600000) / 60000));
        set('cdSeconds', Math.floor((diff % 60000) / 1000));
    }
    DKarsaTick(); setInterval(DKarsaTick, 1000);

    /* ---------- peta: fasad → iframe saat diklik ---------- */
    function DKarsaLoadMap(el) {
        if (!el || el.dataset.loaded === '1') { return; }
        el.dataset.loaded = '1';
        const wrap = document.createElement('div');
        wrap.className = 'map-frame-wrap';
        const frame = document.createElement('iframe');
        frame.className = 'map-frame';
        frame.src = el.dataset.mapSrc || '';
        frame.loading = 'lazy';
        frame.referrerPolicy = 'no-referrer-when-downgrade';
        frame.title = el.dataset.mapTitle || 'Peta lokasi';
        wrap.appendChild(frame);
        el.replaceWith(wrap);
    }

    /* ---------- lightbox ---------- */
    function DKarsaLightbox(src) { const m = document.getElementById('lightboxModal'); document.getElementById('lightboxImage').src = src; m.style.display = 'flex'; }
    function DKarsaCloseLightbox() { document.getElementById('lightboxModal').style.display = 'none'; }

    /* ---------- dock spy ---------- */
    const dockLinks = [...document.querySelectorAll('.dock-link')];
    const dockTargets = dockLinks.map((a) => document.querySelector(a.getAttribute('href'))).filter(Boolean);
    function DKarsaSpy() {
        const y = DKarsaScrollTop() + innerHeight * .35;
        let active = 0;
        dockTargets.forEach((el, i) => { if (el.offsetTop <= y) active = i; });
        dockLinks.forEach((a, i) => a.classList.toggle('is-active', i === active));
    }
    window.addEventListener('scroll', DKarsaSpy, { passive: true });
    DKarsaSpy();

    /* ---------- RSVP: input angka + reveal ---------- */
    document.addEventListener('DOMContentLoaded', () => {
        document.body.classList.add('js-reveal');
        const io = 'IntersectionObserver' in window ? new IntersectionObserver((entries) => {
            entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } });
        }, { threshold: .06 }) : null;
        document.querySelectorAll('.reveal').forEach((el) => { io ? io.observe(el) : el.classList.add('is-visible'); });
        setTimeout(() => document.querySelectorAll('.reveal').forEach((el) => el.classList.add('is-visible')), 1500);

        const count = document.getElementById('guestCountInput');
        if (count) {
            count.addEventListener('input', () => {
                count.value = count.value.replace(/[^0-9]/g, '').slice(0, 2);
                if (count.value !== '' && +count.value > 20) count.value = '20';
            });
            document.querySelectorAll('input[name="attendance"]').forEach((r) => r.addEventListener('change', () => {
                const absent = document.querySelector('input[name="attendance"]:checked')?.value === 'tidak_hadir';
                count.disabled = absent; count.style.opacity = absent ? '.5' : '1';
                if (!absent && !count.value) count.value = '1';
            }));
        }
        if (new URLSearchParams(location.search).get('open') === '1') {
            DKarsaOpen();
            gesturePx = GATE_TRAVEL;
            renderGate(1);
            unlockContent();
        }
    });

    try { if (window.parent && window.parent !== window) window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*'); } catch (e) {}
</script>
@include('templates.partials.preview-media-bridge')
</body>
</html>
