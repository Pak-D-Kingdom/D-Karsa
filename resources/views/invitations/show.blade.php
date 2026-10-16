@php
    $coverUrl = !empty($couple->cover_photo) ? (str_starts_with($couple->cover_photo, 'http') ? $couple->cover_photo : asset('storage/' . $couple->cover_photo)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200';
    $groomUrl = !empty($couple->groom_photo) ? (str_starts_with($couple->groom_photo, 'http') ? $couple->groom_photo : asset('storage/' . $couple->groom_photo)) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600';
    $brideUrl = !empty($couple->bride_photo) ? (str_starts_with($couple->bride_photo, 'http') ? $couple->bride_photo : asset('storage/' . $couple->bride_photo)) : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600';
    $audioUrl = !empty($couple->music_url) ? (str_starts_with($couple->music_url, 'http') ? $couple->music_url : asset('audio/' . $couple->music_url)) : asset('audio/wedding-melody.wav');

    $cat = $couple->category ?: 'Pernikahan';
    $subCat = $couple->sub_category ?: '';
    $catLower = strtolower($cat);
    $subLower = strtolower($subCat);

    $isWedding = ($catLower === 'pernikahan' || $catLower === 'wedding');
    $isTahlilan = in_array($catLower, ['tahlilan', 'tahlil', 'doa bersama', 'haul']) || str_contains($subLower, 'tahlil') || str_contains($subLower, 'doa bersama');
    $isKhitan = in_array($catLower, ['khitanan', 'khitan']) || str_contains($subLower, 'khitan');
    $isAqiqah = (in_array($catLower, ['aqiqah', 'akikah']) || str_contains($subLower, 'aqiqah') || str_contains($subLower, 'kelahiran')) && !$isKhitan;
    $isUltah = in_array($catLower, ['ulang tahun', 'ultah', 'birthday']) || str_contains($subLower, 'ulang tahun') || str_contains($subLower, 'sweet seventeen');
    $isWisuda = in_array($catLower, ['wisuda', 'kelulusan']) || str_contains($subLower, 'wisuda') || str_contains($subLower, 'kelulusan');
    $isFormal = in_array($catLower, ['acara formal', 'formal', 'seminar', 'gathering']) || str_contains($subLower, 'seminar') || str_contains($subLower, 'gathering') || str_contains($subLower, 'opening');
    $isSilaturahmi = (in_array($catLower, ['keagamaan', 'halal bihalal', 'halalbihalal', 'syukuran', 'pengajian']) || str_contains($subLower, 'pengajian') || str_contains($subLower, 'halal bihalal') || str_contains($subLower, 'syukuran') || str_contains($subLower, 'maulid') || str_contains($subLower, 'safari')) && !$isTahlilan;

    if ($isTahlilan) {
        $coverSubtitle = 'Mengenang & Mendoakan';
        $sectionBadge = 'Mengenang Almarhum / Almarhumah';
        $sectionTitle = 'Sosok yang Didoakan';
        $sectionQuote = 'Semoga Allah SWT mengampuni segala dosa dan khilafnya, melapangkan kuburnya, dan menempatkannya di tempat terbaik di surga-Nya.';
        $person1Label = 'Almarhum / Almarhumah';
        $person2Label = 'Keluarga Ahli Waris';
        $dividerText = '🤲 Doa Bersama 🤲';
        $navPersonIcon = '🕯️';
        $navPersonLabel = 'Almarhum';
        $galleryBadge = 'Kenangan Berharga';
        $galleryTitle = 'Galeri Kenangan Almarhum';
        $pageTitle = ($couple->event_heading ?: 'Doa & Tahlil') . ' ' . $couple->groom_name;
    } elseif ($isKhitan) {
        $coverSubtitle = 'Walimatul Khitan';
        $sectionBadge = 'Walimatul Khitan';
        $sectionTitle = 'Anak yang Dikhitan';
        $sectionQuote = 'Semoga ananda menjadi anak yang sholeh, cerdas, berbakti kepada orang tua, serta bermanfaat bagi agama, nusa, dan bangsa.';
        $person1Label = 'Anak yang Dikhitan';
        $person2Label = 'Orang Tua / Wali yang Mendampingi';
        $dividerText = '⭐';
        $navPersonIcon = '✂️';
        $navPersonLabel = 'Anak';
        $galleryBadge = 'Momen Syukuran';
        $galleryTitle = 'Galeri Foto Khitan';
        $pageTitle = ($couple->event_heading ?: 'Khitanan') . ' ' . $couple->groom_name;
    } elseif ($isAqiqah) {
        $coverSubtitle = 'Tasyakuran Aqiqah';
        $sectionBadge = 'Tasyakuran Aqiqah';
        $sectionTitle = 'Buah Hati Tercinta';
        $sectionQuote = 'Semoga sang buah hati tumbuh sehat, cerdas, berakhlak mulia, dan menjadi penyejuk hati bagi kedua orang tua.';
        $person1Label = 'Buah Hati yang Diaqiqahkan';
        $person2Label = 'Orang Tua yang Berbahagia';
        $dividerText = '👶';
        $navPersonIcon = '👶';
        $navPersonLabel = 'Bayi';
        $galleryBadge = 'Momen Buah Hati';
        $galleryTitle = 'Galeri Foto Buah Hati';
        $pageTitle = ($couple->event_heading ?: 'Tasyakuran Aqiqah') . ' ' . $couple->groom_name;
    } elseif ($isUltah) {
        $coverSubtitle = 'Hari Bahagia Ulang Tahun';
        $sectionBadge = 'Happy Birthday Celebration';
        $sectionTitle = 'Yang Berulang Tahun';
        $sectionQuote = 'Semoga bertambahnya usia membawa keberkahan, kebahagiaan, kesehatan, dan tercapainya segala cita-cita mulia.';
        $person1Label = 'Yang Berulang Tahun';
        $person2Label = 'Keluarga / Penyelenggara';
        $dividerText = '🎂';
        $navPersonIcon = '🎂';
        $navPersonLabel = 'Ultah';
        $galleryBadge = 'Momen Spesial';
        $galleryTitle = 'Galeri Foto Perayaan';
        $pageTitle = ($couple->event_heading ?: 'Ulang Tahun') . ' ' . $couple->groom_name;
    } elseif ($isWisuda) {
        $coverSubtitle = 'Perayaan Wisuda & Kelulusan';
        $sectionBadge = 'Momen Kelulusan';
        $sectionTitle = 'Wisudawan & Pendamping';
        $sectionQuote = 'Keberhasilan hari ini adalah awal dari masa depan yang gemilang. Terima kasih atas doa, bimbingan, dan dukungan keluarga serta sahabat tercinta.';
        $person1Label = 'Wisudawan / Wisudawati';
        $person2Label = 'Orang Tua / Pendamping Wisuda';
        $dividerText = '🎓';
        $navPersonIcon = '🎓';
        $navPersonLabel = 'Wisudawan';
        $galleryBadge = 'Momen Kelulusan';
        $galleryTitle = 'Galeri Foto Wisuda & Toga';
        $pageTitle = ($couple->event_heading ?: 'Wisuda') . ' ' . $couple->groom_name;
    } elseif ($isFormal) {
        $coverSubtitle = 'Undangan Resmi Perusahaan / Komunitas';
        $sectionBadge = 'Profil Acara Resmi';
        $sectionTitle = 'Penyelenggara & Pembicara';
        $sectionQuote = 'Merupakan suatu kehormatan dan kebanggaan bagi kami untuk mengundang Bapak/Ibu/Rekan-rekan sekalian dalam agenda resmi ini.';
        $person1Label = 'Institusi / Perusahaan Penyelenggara';
        $person2Label = 'Pembicara / VIP Guest';
        $dividerText = '🏛️';
        $navPersonIcon = '🏛️';
        $navPersonLabel = 'Penyelenggara';
        $galleryBadge = 'Dokumentasi Acara';
        $galleryTitle = 'Dokumentasi & Poster Kegiatan';
        $pageTitle = ($couple->event_heading ?: 'Acara Resmi') . ' ' . $couple->groom_name;
    } elseif ($isSilaturahmi) {
        $coverSubtitle = 'Silaturahmi & Kebersamaan';
        $sectionBadge = 'Silaturahmi & Kebersamaan';
        $sectionTitle = 'Tuan Rumah & Penyelenggara';
        $sectionQuote = 'Menjalin tali silaturahmi memperpanjang umur, memperluas rezeki, dan mempererat ukhuwah persaudaraan.';
        $person1Label = 'Tuan Rumah / Tokoh Utama';
        $person2Label = 'Panitia / Perwakilan Acara';
        $dividerText = '🤝';
        $navPersonIcon = '🏡';
        $navPersonLabel = 'Tuan Rumah';
        $galleryBadge = 'Dokumentasi Kebersamaan';
        $galleryTitle = 'Galeri Foto Silaturahmi';
        $pageTitle = ($couple->event_heading ?: 'Silaturahmi') . ' ' . $couple->groom_name;
    } else {
        $coverSubtitle = 'The Wedding Celebration of';
        $sectionBadge = 'Mempelai Bahagia';
        $sectionTitle = 'Sang Mempelai';
        $sectionQuote = 'Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan.';
        $person1Label = 'Mempelai Pria';
        $person2Label = 'Mempelai Wanita';
        $dividerText = '&';
        $navPersonIcon = '💍';
        $navPersonLabel = 'Mempelai';
        $galleryBadge = 'Momen Bahagia';
        $galleryTitle = 'Galeri Kenangan & Prewedding';
        $pageTitle = ($couple->event_heading ?: 'The Wedding of') . ' ' . $couple->groom_name . ' & ' . $couple->bride_name;
    }

    // Resolve Dynamic Theme Skin & Package Tier
    $selectedTheme = $couple->theme;
    $selectedPackage = $couple->package_name;

    $skin = 'skin-minimalist-floral';
    $themeCss = 'theme-floral-wreath';
    $tierBadge = 'Paket Basic - Rp50.000';

    if ($selectedTheme) {
        if (str_contains($selectedTheme, 'ChungDoi') || str_contains($selectedTheme, 'Wildflower') || str_contains($selectedTheme, 'Rose Romance')) {
            $skin = 'skin-wildflower';
            $themeCss = 'theme-rose-romance';
            $tierBadge = 'Paket Premium - Rp110.000';
        } elseif (str_contains($selectedTheme, 'Javanese') || str_contains($selectedTheme, 'Keraton')) {
            $skin = 'skin-javanese-royal';
            $themeCss = 'theme-javanese-royal';
            $tierBadge = 'Paket Eksklusif - Rp180.000';
        } elseif (str_contains($selectedTheme, 'Green Mosque')) {
            $skin = 'skin-islamic-dome';
            $themeCss = 'theme-green-mosque';
            $tierBadge = 'Paket Premium - Rp110.000';
        } elseif (str_contains($selectedTheme, 'Batak')) {
            $skin = 'skin-batak-heritage';
            $themeCss = 'theme-batak-heritage';
            $tierBadge = 'Paket Eksklusif - Rp180.000';
        } elseif (str_contains($selectedTheme, 'Golden Luxury') || str_contains($selectedTheme, 'Wisuda Sarjana')) {
            $skin = 'skin-golden-luxury';
            $themeCss = 'theme-golden-birthday';
            $tierBadge = 'Paket Eksklusif - Rp180.000';
        } elseif (str_contains($selectedTheme, 'SnowFall') || str_contains($selectedTheme, 'Reuni Akbar') || str_contains($selectedTheme, 'Executive')) {
            $skin = 'skin-snow-white';
            $themeCss = 'theme-snow-white';
            $tierBadge = 'Paket Eksklusif - Rp180.000';
        } elseif (str_contains($selectedTheme, 'Khitan Berkah')) {
            $skin = 'skin-islamic-dome';
            $themeCss = 'theme-khitan-berkah';
            $tierBadge = 'Paket Premium - Rp110.000';
        } elseif (str_contains($selectedTheme, 'Baby Pastel') || str_contains($selectedTheme, 'Little Prince')) {
            $skin = 'skin-baby-pastel';
            $themeCss = 'theme-baby-aqiqah';
            $tierBadge = 'Paket Premium - Rp110.000';
        } elseif (str_contains($selectedTheme, 'Ketupat')) {
            $skin = 'skin-ketupat-raya';
            $themeCss = 'theme-ketupat-raya';
            $tierBadge = 'Paket Basic - Rp50.000';
        } elseif (str_contains($selectedTheme, 'Custom') || str_contains($selectedTheme, 'Bebas')) {
            $skin = 'skin-custom-vip';
            $themeCss = 'theme-custom-vip';
            $tierBadge = 'Paket Kustom - Rp280.000';
        } elseif (str_contains($selectedTheme, 'Tahlilan')) {
            $skin = 'skin-minimalist-floral';
            $themeCss = 'theme-tahlilan-khusyuk';
            $tierBadge = 'Paket Basic - Rp50.000';
        } elseif (str_contains($selectedTheme, 'Syukuran')) {
            $skin = 'skin-minimalist-floral';
            $themeCss = 'theme-syukuran-rumah';
            $tierBadge = 'Paket Basic - Rp50.000';
        }
    } else {
        if ($selectedPackage && (str_contains($selectedPackage, '280') || str_contains($selectedPackage, 'Kustom'))) {
            $skin = 'skin-custom-vip';
            $themeCss = 'theme-custom-vip';
            $tierBadge = 'Paket Kustom - Rp280.000';
        } elseif ($selectedPackage && (str_contains($selectedPackage, '180') || str_contains($selectedPackage, 'Eksklusif'))) {
            if ($isWedding) {
                $skin = 'skin-javanese-royal';
                $themeCss = 'theme-javanese-royal';
            } elseif ($isUltah || $isWisuda) {
                $skin = 'skin-golden-luxury';
                $themeCss = 'theme-golden-birthday';
            } else {
                $skin = 'skin-snow-white';
                $themeCss = 'theme-snow-white';
            }
            $tierBadge = 'Paket Eksklusif - Rp180.000';
        } elseif ($selectedPackage && (str_contains($selectedPackage, '50') || str_contains($selectedPackage, 'Basic'))) {
            if ($isSilaturahmi) {
                $skin = 'skin-ketupat-raya';
                $themeCss = 'theme-ketupat-raya';
            } else {
                $skin = 'skin-minimalist-floral';
                $themeCss = 'theme-floral-wreath';
            }
            $tierBadge = 'Paket Basic - Rp50.000';
        } else {
            // Default: Premium
            if ($isWedding) {
                $skin = 'skin-wildflower';
                $themeCss = 'theme-rose-romance';
                $tierBadge = 'Paket Premium - Rp110.000';
            } elseif ($isKhitan || $isSilaturahmi) {
                $skin = 'skin-islamic-dome';
                $themeCss = 'theme-green-mosque';
                $tierBadge = 'Paket Premium - Rp110.000';
            } elseif ($isAqiqah) {
                $skin = 'skin-baby-pastel';
                $themeCss = 'theme-baby-aqiqah';
                $tierBadge = 'Paket Premium - Rp110.000';
            } elseif ($isUltah || $isWisuda) {
                $skin = 'skin-golden-luxury';
                $themeCss = 'theme-golden-birthday';
                $tierBadge = 'Paket Eksklusif - Rp180.000';
            } else {
                $skin = 'skin-snow-white';
                $themeCss = 'theme-snow-white';
                $tierBadge = 'Paket Premium - Rp110.000';
            }
        }
    }

    // Determine Target Event Date & Time for Countdown & Google Calendar
    $firstEvent = $couple->events->first();
    $eventDateStr = !empty($firstEvent?->date) 
        ? \Carbon\Carbon::parse($firstEvent->date)->format('Y-m-d') 
        : (!empty($couple->wedding_date) ? \Carbon\Carbon::parse($couple->wedding_date)->format('Y-m-d') : now()->addDays(7)->format('Y-m-d'));
    $eventTimeStr = !empty($firstEvent?->start_time) ? substr(trim($firstEvent->start_time), 0, 5) : '08:00';
    if (!preg_match('/^\d{2}:\d{2}$/', $eventTimeStr)) {
        $eventTimeStr = '08:00';
    }
    $targetEventCarbon = \Carbon\Carbon::parse("{$eventDateStr} {$eventTimeStr}:00");
    $targetEventIso = $targetEventCarbon->format('Y-m-d\TH:i:s');
    $gcalStart = $targetEventCarbon->copy()->setTimezone('UTC')->format('Ymd\THis\Z');
    $gcalEnd = $targetEventCarbon->copy()->addHours(3)->setTimezone('UTC')->format('Ymd\THis\Z');
    $gcalTitle = urlencode($pageTitle);
    $gcalDetails = urlencode('Undangan ' . ($couple->category ?: 'Spesial') . ' - ' . ($couple->groom_fullname ?: $couple->groom_name));
    $gcalLocation = urlencode($couple->venue_name ?: ($firstEvent?->venue_name ?: 'Lokasi Acara'));
    $gcalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$gcalTitle}&dates={$gcalStart}/{$gcalEnd}&details={$gcalDetails}&location={$gcalLocation}";
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} | Undangan Digital D'Karsa</title>
    
    {{-- Open Graph Meta for WhatsApp Sharing --}}
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="Kepada Yth. {{ $guest->name }}, kami mengundang Anda untuk hadir di hari bahagia dan penuh berkah kami.">
    <meta property="og:image" content="{{ $coverUrl }}">
    <meta property="og:type" content="article">
    
    {{-- Google Fonts (ChungDoi + Multitheme) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Beau+Rivage&family=Cinzel:wght@600;700;800&family=Great+Vibes&family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        cinzel: ['"Cinzel"', 'serif'],
                        cursive: ['"Beau Rivage"', '"Great Vibes"', 'cursive'],
                        script: ['"Alex Brush"', 'cursive'],
                        lora: ['"Lora"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: '#f63854',
                        accent: '#cf2445',
                        gold: '#d4af37',
                        'gold-light': '#fdf8ea',
                        ink: '#1c1417',
                        ink2: '#4a3f43',
                        ink3: '#7a6f73',
                        blush: '#fdf4f5',
                        sunk: '#faf0f2',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: #1c1417; background-color: #faf5f6; }
        .font-serif { font-family: 'Playfair Display', Georgia, serif; }
        .font-cinzel { font-family: 'Cinzel', Georgia, serif; }
        .font-cursive { font-family: 'Beau Rivage', 'Great Vibes', cursive; }
        .font-script { font-family: 'Alex Brush', cursive; }
        .font-lora { font-family: 'Lora', Georgia, serif; }
        .toast-show { transform: translateY(0); opacity: 1; pointer-events: auto; }
        .toast-hide { transform: translateY(1rem); opacity: 0; pointer-events: none; }

        /* ChungDoi & Multi-theme Keyframe Animations */
        @keyframes seal-pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 4px 16px rgba(183, 88, 115, 0.4), inset 0 2px 4px rgba(255,255,255,0.4); }
            50% { transform: scale(1.07); box-shadow: 0 8px 24px rgba(183, 88, 115, 0.7), inset 0 2px 4px rgba(255,255,255,0.6); }
        }
        .animate-seal-pulse { animation: seal-pulse 2.2s ease-in-out infinite; }

        @keyframes shine-sweep {
            0% { transform: translateX(-150%); }
            45%, 100% { transform: translateX(250%); }
        }
        .animate-shine { animation: shine-sweep 3s ease-in-out infinite; }

        @keyframes ambient-fall {
            0% { transform: translate3d(0, -20px, 0) rotate(0deg); opacity: 0; }
            12% { opacity: 0.85; }
            85% { opacity: 0.85; }
            100% { transform: translate3d(var(--sway, 25px), 100vh, 0) rotate(360deg); opacity: 0; }
        }

        @keyframes gold-sparkle {
            0%, 100% { opacity: 0.2; transform: scale(0.85); }
            50% { opacity: 0.95; transform: scale(1.15); }
        }

        @keyframes pulse-glow-purple {
            0%, 100% { border-color: #a855f7; box-shadow: 0 0 16px rgba(168, 85, 247, 0.35); }
            50% { border-color: #f43f5e; box-shadow: 0 0 26px rgba(244, 63, 94, 0.55); }
        }
        .animate-pulse-glow { animation: pulse-glow-purple 2.5s ease-in-out infinite; }

        /* Themed Scoped Overrides for Published Invitation */
        .theme-rose-romance, .theme-rose-romance main { background-color: #fdf6f3 !important; font-family: 'Playfair Display', Georgia, serif; }
        .theme-rose-romance .theme-accent { color: #b75873 !important; }
        
        .theme-javanese-royal, .theme-javanese-royal main, .theme-javanese-royal section { background-color: #17110c !important; color: #f7eedb !important; font-family: 'Cinzel', Georgia, serif; }
        .theme-javanese-royal h1, .theme-javanese-royal h2, .theme-javanese-royal h3, .theme-javanese-royal h4 { color: #d4af37 !important; }
        .theme-javanese-royal .bg-white, .theme-javanese-royal .bg-blush\/60, .theme-javanese-royal .bg-sunk { background-color: #241b14 !important; border-color: #8c6d2d !important; color: #f7eedb !important; }
        .theme-javanese-royal .text-ink, .theme-javanese-royal .text-ink2 { color: #f7eedb !important; }
        .theme-javanese-royal .text-ink3 { color: #c4b59d !important; }

        .theme-green-mosque, .theme-green-mosque main, .theme-green-mosque section { background-color: #0d281c !important; color: #f0fdf4 !important; }
        .theme-green-mosque h1, .theme-green-mosque h2, .theme-green-mosque h3, .theme-green-mosque h4 { color: #e5c07b !important; }
        .theme-green-mosque .bg-white, .theme-green-mosque .bg-blush\/60, .theme-green-mosque .bg-sunk { background-color: #153b2a !important; border-color: #047857 !important; color: #f0fdf4 !important; }
        .theme-green-mosque .text-ink, .theme-green-mosque .text-ink2 { color: #f0fdf4 !important; }

        .theme-golden-birthday, .theme-golden-birthday main, .theme-golden-birthday section { background-color: #0a0a0a !important; color: #ffffff !important; font-family: 'Cinzel', sans-serif; }
        .theme-golden-birthday h1, .theme-golden-birthday h2, .theme-golden-birthday h3, .theme-golden-birthday h4 { color: #fbbf24 !important; }
        .theme-golden-birthday .bg-white, .theme-golden-birthday .bg-blush\/60, .theme-golden-birthday .bg-sunk { background-color: #171717 !important; border-color: #b45309 !important; color: #ffffff !important; }
        .theme-golden-birthday .text-ink, .theme-golden-birthday .text-ink2 { color: #ffffff !important; }

        .theme-batak-heritage, .theme-batak-heritage main, .theme-batak-heritage section { background-color: #1e0e13 !important; color: #fef3c7 !important; }
        .theme-batak-heritage h1, .theme-batak-heritage h2, .theme-batak-heritage h3, .theme-batak-heritage h4 { color: #f59e0b !important; }
        .theme-batak-heritage .bg-white, .theme-batak-heritage .bg-blush\/60, .theme-batak-heritage .bg-sunk { background-color: #2e151c !important; border-color: #92400e !important; color: #fef3c7 !important; }
        .theme-batak-heritage .text-ink, .theme-batak-heritage .text-ink2 { color: #fef3c7 !important; }

        .theme-custom-vip, .theme-custom-vip main, .theme-custom-vip section { background-color: #180f28 !important; color: #f3e8ff !important; }
        .theme-custom-vip h1, .theme-custom-vip h2, .theme-custom-vip h3, .theme-custom-vip h4 { color: #c084fc !important; }
        .theme-custom-vip .bg-white, .theme-custom-vip .bg-blush\/60, .theme-custom-vip .bg-sunk { background-color: #26163f !important; border-color: #7e22ce !important; color: #f3e8ff !important; }
        .theme-custom-vip .text-ink, .theme-custom-vip .text-ink2 { color: #f3e8ff !important; }
    </style>
</head>
<body class="overflow-x-hidden antialiased select-none pb-24 md:pb-12">

    {{-- ADMIN PREVIEW BANNER (Visible only to authenticated admin) --}}
    @if(!empty($isAdminPreview))
        <div class="fixed top-0 left-0 right-0 z-[100] bg-amber-500 text-amber-950 px-4 py-2.5 text-xs font-bold shadow-xl flex items-center justify-between border-b border-amber-600">
            <div class="flex items-center gap-2">
                <span class="text-base">⚠️</span>
                <span><b>MODE PREVIEW ADMIN:</b> Undangan ini berstatus <u>Menunggu ACC</u> (Belum aktif untuk publik).</span>
            </div>
            <a href="/admin/couples" class="px-3.5 py-1 rounded-full bg-white text-amber-950 font-extrabold hover:bg-amber-100 transition shadow-sm text-xs">
                Admin Panel
            </a>
        </div>
    @endif

    {{-- AUDIO PLAYER --}}
    <audio id="invitationMusic" loop preload="auto" src="{{ $audioUrl }}"></audio>

    {{-- FLOATING MUSIC BUTTON --}}
    <button id="musicToggleBtn" type="button" onclick="toggleAudio()"
            class="fixed bottom-24 right-5 md:bottom-8 md:right-8 z-40 w-11 h-11 rounded-full bg-white/90 backdrop-blur-md text-brand shadow-lg border border-brand/30 grid place-items-center transition hover:scale-110 active:scale-95"
            title="Putar / Jeda Musik">
        <span id="musicDisc" class="text-base">♫</span>
    </button>

    {{-- 1. FULL-SCREEN OPENING COVER / ENVELOPE (Modal Screen) --}}
    <div id="openingCover" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 text-center text-white transition-transform duration-700 ease-in-out relative overflow-hidden"
         style="background: linear-gradient(180deg, rgba(20,12,15,0.55) 0%, rgba(20,12,15,0.92) 100%), url('{{ $coverUrl }}') center/cover no-repeat;">

        {{-- Dynamic Ambient Particles (Falling Petals / Snow / Gold Sparkles) --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            @if($skin === 'skin-wildflower')
                {{-- ChungDoi Falling Rose Petals --}}
                @for ($i = 0; $i < 12; $i++)
                    @php
                        $left = ($i * 8.5 + 3) . '%';
                        $dur = (4.5 + ($i % 4) * 0.9) . 's';
                        $del = (($i * 0.4) % 3) . 's';
                        $sway = (($i % 2 === 0 ? 1 : -1) * (20 + ($i % 3) * 15)) . 'px';
                    @endphp
                    <div class="absolute pointer-events-none text-rose-300 text-lg opacity-80"
                         style="left: {{ $left }}; top: -25px; --sway: {{ $sway }}; animation: ambient-fall {{ $dur }} linear {{ $del }} infinite;">
                        🌸
                    </div>
                @endfor
            @elseif($skin === 'skin-snow-white')
                {{-- Snow White Falling Snowflakes --}}
                @for ($i = 0; $i < 12; $i++)
                    @php
                        $left = ($i * 8.5 + 4) . '%';
                        $dur = (5 + ($i % 4) * 1.1) . 's';
                        $del = (($i * 0.5) % 3.5) . 's';
                        $sway = (($i % 2 === 0 ? 1 : -1) * (25 + ($i % 3) * 10)) . 'px';
                    @endphp
                    <div class="absolute pointer-events-none text-blue-100 text-base opacity-75"
                         style="left: {{ $left }}; top: -25px; --sway: {{ $sway }}; animation: ambient-fall {{ $dur }} linear {{ $del }} infinite;">
                        ❄
                    </div>
                @endfor
            @elseif($skin === 'skin-javanese-royal' || $skin === 'skin-golden-luxury')
                {{-- Royal Sparkling Gold Dust --}}
                <div class="absolute top-[20%] left-[15%] text-amber-300 text-sm" style="animation: gold-sparkle 2.5s ease-in-out infinite;">✦</div>
                <div class="absolute top-[35%] left-[82%] text-amber-300 text-base" style="animation: gold-sparkle 3.1s ease-in-out 0.8s infinite;">✦</div>
                <div class="absolute top-[65%] left-[22%] text-amber-300 text-sm" style="animation: gold-sparkle 2.8s ease-in-out 1.4s infinite;">✦</div>
                <div class="absolute top-[78%] left-[75%] text-amber-300 text-xs" style="animation: gold-sparkle 2.2s ease-in-out 0.4s infinite;">✦</div>
            @endif
        </div>

        {{-- Center Dynamic Envelope Card (Different Card Geometries per Theme/Skin) --}}
        <div class="max-w-md w-full relative z-10 my-auto">
            
            @if($skin === 'skin-wildflower')
                {{-- CHUNGDOI WILDFLOWER PINK SIGNATURE DOME ENVELOPE --}}
                <div class="rounded-t-[80px] rounded-b-3xl border-2 border-[#f2c1ce] bg-gradient-to-b from-[#fdf6f3] via-[#fffbf9] to-[#faedf0] text-[#4a2c35] p-6 sm:p-8 shadow-2xl relative overflow-hidden space-y-4">
                    
                    {{-- Pulsing Wax Seal with Heart Monogram --}}
                    <div class="w-14 h-14 -mt-2 mx-auto rounded-full bg-gradient-to-br from-[#d46a87] to-[#8d3f57] text-white flex items-center justify-center animate-seal-pulse shadow-lg border-2 border-white/80" title="Wax Seal Heart">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>

                    {{-- Botanical Corner Wildflower Sprigs --}}
                    <svg class="absolute top-2 left-2 w-16 h-16 text-[#b75873] opacity-80 pointer-events-none" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                        <path d="M 10 90 Q 25 50 80 15" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="80" cy="15" r="7" fill="#b75873" opacity="0.65"/>
                        <circle cx="60" cy="30" r="5" fill="#f472b6" opacity="0.6"/>
                        <circle cx="40" cy="50" r="4" fill="#fb7185" opacity="0.6"/>
                        <ellipse cx="68" cy="22" rx="4" ry="8" fill="#567c22" opacity="0.7" transform="rotate(-30 68 22)"/>
                        <ellipse cx="48" cy="42" rx="3.5" ry="7" fill="#567c22" opacity="0.7" transform="rotate(-35 48 42)"/>
                    </svg>
                    <svg class="absolute bottom-2 right-2 w-16 h-16 text-[#b75873] opacity-80 pointer-events-none" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                        <path d="M 90 10 Q 75 50 20 85" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="20" cy="85" r="7" fill="#b75873" opacity="0.65"/>
                        <circle cx="40" cy="70" r="5" fill="#f472b6" opacity="0.6"/>
                        <circle cx="60" cy="50" r="4" fill="#fb7185" opacity="0.6"/>
                        <ellipse cx="32" cy="78" rx="4" ry="8" fill="#567c22" opacity="0.7" transform="rotate(30 32 78)"/>
                        <ellipse cx="52" cy="58" rx="3.5" ry="7" fill="#567c22" opacity="0.7" transform="rotate(35 52 58)"/>
                    </svg>

                    <div>
                        <span class="inline-block px-3 py-0.5 rounded-full bg-[#fce7ed] text-[10px] font-bold uppercase tracking-widest text-[#b75873] border border-[#f2c1ce]">
                            {{ $couple->event_heading ?: "WALIMATUL 'URSY" }}
                        </span>
                        <p class="text-[11px] uppercase tracking-widest text-[#7a5c65] font-medium mt-2">{{ $coverSubtitle }}</p>
                        <h1 class="font-cursive text-4xl sm:text-5xl font-normal text-[#b75873] my-1 leading-tight drop-shadow-sm">
                            {{ $couple->groom_name }} <span class="font-serif text-3xl text-[#567c22]">&amp;</span> {{ $couple->bride_name }}
                        </h1>
                        <p class="font-lora text-xs font-semibold text-[#567c22] tracking-wider mt-1">
                            {{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    {{-- Guest Name Box --}}
                    <div class="p-4 rounded-2xl bg-white/80 backdrop-blur-sm border border-[#f2c1ce] shadow-sm space-y-1">
                        <p class="text-[10px] text-[#7a5c65] uppercase tracking-wider font-semibold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#b75873] tracking-wide">{{ $guest->name }}</h2>
                        @if(!empty($guest->category))
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase bg-[#fce7ed] text-[#b75873]">
                                Tamu {{ $guest->category }}
                            </span>
                        @endif
                        <p class="text-[10px] text-[#7a5c65]/80 italic pt-0.5">*Mohon maaf apabila ada kesalahan penulisan nama atau gelar</p>
                    </div>

                    {{-- Open Invitation Button with Shimmer Sweep Effect --}}
                    <div>
                        <button type="button" onclick="openInvitation()"
                                class="w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-[#d46a87] to-[#b75873] hover:from-[#c25875] hover:to-[#a44762] text-white font-bold text-xs uppercase tracking-widest shadow-lg transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 border border-white/40 relative overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent animate-shine pointer-events-none"></span>
                            <span class="text-base">✉️</span>
                            <span>Buka Undangan</span>
                        </button>
                    </div>

                </div>

            @elseif($skin === 'skin-javanese-royal')
                {{-- 3D JAVANESE ROYAL KERATON ENVELOPE --}}
                <div class="rounded-2xl border-2 border-[#d4af37] ring-1 ring-[#8c6d2d] bg-[#1a130e]/95 text-[#f7eedb] p-6 sm:p-8 shadow-2xl relative overflow-hidden space-y-4">
                    
                    {{-- 3D Gunungan Wayang SVG Ornament --}}
                    <div class="w-20 h-22 mx-auto flex items-center justify-center">
                        <svg class="w-16 h-20 text-[#d4af37]" viewBox="0 0 100 130" fill="currentColor">
                            <path d="M 50 5 C 40 25 22 52 14 78 C 6 102 20 118 50 122 C 80 118 94 102 86 78 C 78 52 60 25 50 5 Z" fill-opacity="0.2" stroke="currentColor" stroke-width="2"/>
                            <path d="M 50 14 C 44 28 30 52 22 74 C 14 94 26 108 50 112 C 74 108 86 94 78 74 C 70 52 56 28 50 14 Z" fill="none" stroke="currentColor" stroke-width="1.2" stroke-dasharray="2 2"/>
                            <path d="M 50 112 L 50 38 M 50 62 Q 35 52 28 42 M 50 78 Q 32 70 26 60 M 50 62 Q 65 52 72 42 M 50 78 Q 68 70 74 60" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <circle cx="50" cy="36" r="3.5" fill="currentColor"/>
                        </svg>
                    </div>

                    <div>
                        <span class="text-[9px] uppercase tracking-widest text-[#d4af37] font-cinzel font-bold block">KERATON NUSANTARA • EKSKLUSIF</span>
                        <h1 class="font-cinzel text-3xl sm:text-4xl font-bold text-[#d4af37] my-1 leading-tight drop-shadow-md">
                            @if($isWedding)
                                {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                            @else
                                {{ $couple->groom_fullname }}
                            @endif
                        </h1>
                        <div class="flex items-center justify-center gap-2 my-1 text-[#d4af37]">
                            <span class="text-xs">◆</span>
                            <div class="w-12 h-px bg-[#d4af37]"></div>
                            <span class="text-xs">⚜</span>
                            <div class="w-12 h-px bg-[#d4af37]"></div>
                            <span class="text-xs">◆</span>
                        </div>
                        <p class="font-cinzel text-[11px] font-bold text-[#f7eedb]/90 tracking-widest">
                            {{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    {{-- Guest Name Box --}}
                    <div class="p-4 rounded-2xl bg-[#241b14]/90 border border-[#8c6d2d] shadow-sm space-y-1">
                        <p class="text-[10px] text-[#f7eedb]/70 uppercase tracking-wider font-semibold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#d4af37] tracking-wide">{{ $guest->name }}</h2>
                        @if(!empty($guest->category))
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase bg-[#d4af37]/20 text-[#d4af37]">
                                Tamu {{ $guest->category }}
                            </span>
                        @endif
                    </div>

                    {{-- Open Button --}}
                    <div>
                        <button type="button" onclick="openInvitation()"
                                class="w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-[#d4af37] to-[#b48a27] hover:from-[#e5c04b] hover:to-[#c49a37] text-neutral-950 font-bold text-xs uppercase tracking-widest shadow-xl transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 border border-amber-200">
                            <span class="text-base">✉️</span>
                            <span>Buka Undangan</span>
                        </button>
                    </div>

                </div>

            @elseif($skin === 'skin-islamic-dome')
                {{-- GREEN MOSQUE & KHITAN DOME ENVELOPE --}}
                <div class="rounded-t-[85px] rounded-b-2xl border-2 border-emerald-500/70 bg-[#0d281c]/95 text-emerald-50 p-6 sm:p-8 shadow-2xl relative overflow-hidden space-y-4">
                    
                    {{-- Mosque Dome SVG with Bismillah --}}
                    <div class="mx-auto text-center">
                        <svg class="w-16 h-12 mx-auto text-[#e5c07b]" viewBox="0 0 100 65" fill="none" stroke="currentColor">
                            <path d="M 50 5 C 38 18 28 25 22 35 L 78 35 C 72 25 62 18 50 5 Z" fill="currentColor" fill-opacity="0.25" stroke-width="2"/>
                            <circle cx="50" cy="5" r="2.5" fill="currentColor"/>
                            <path d="M 15 22 L 15 48 M 85 22 L 85 48" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span class="font-serif text-xs block text-[#e5c07b] font-bold mt-1">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</span>
                    </div>

                    <div>
                        <span class="text-[9px] uppercase tracking-widest text-[#e5c07b] font-bold block">{{ $couple->event_heading ?: "UNDANGAN KEAGAMAAN" }}</span>
                        <h1 class="font-serif text-3xl sm:text-4xl font-bold text-[#e5c07b] my-1 leading-tight">
                            @if($isWedding)
                                {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                            @else
                                {{ $couple->groom_fullname }}
                            @endif
                        </h1>
                        <p class="text-xs font-semibold text-emerald-200 tracking-wider">
                            {{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    {{-- Guest Name Box --}}
                    <div class="p-4 rounded-2xl bg-[#153b2a]/90 border border-emerald-500/50 shadow-sm space-y-1">
                        <p class="text-[10px] text-emerald-200/70 uppercase tracking-wider font-semibold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#e5c07b] tracking-wide">{{ $guest->name }}</h2>
                    </div>

                    {{-- Open Button --}}
                    <div>
                        <button type="button" onclick="openInvitation()"
                                class="w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-500 hover:to-teal-600 text-white font-bold text-xs uppercase tracking-widest shadow-xl transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 border border-emerald-400">
                            <span class="text-base">✉️</span>
                            <span>Buka Undangan</span>
                        </button>
                    </div>

                </div>

            @else
                {{-- DEFAULT & MINIMALIST FLORAL ENVELOPE --}}
                <div class="rounded-3xl border-2 border-white/25 bg-black/40 backdrop-blur-md text-white p-6 sm:p-8 shadow-2xl relative overflow-hidden space-y-5">
                    
                    {{-- Monogram --}}
                    <div class="w-16 h-16 rounded-full mx-auto border-2 border-amber-300/60 bg-black/30 backdrop-blur-md grid place-items-center shadow-lg">
                        <span class="font-serif text-2xl font-bold text-amber-200">
                            @if($isWedding)
                                {{ substr($couple->groom_name, 0, 1) }} &amp; {{ substr($couple->bride_name, 0, 1) }}
                            @else
                                {{ substr($couple->groom_name, 0, 1) }}
                            @endif
                        </span>
                    </div>

                    <div>
                        <span class="inline-block px-4 py-1 rounded-full bg-white/20 backdrop-blur-md text-[11px] font-bold uppercase tracking-widest text-amber-100 border border-white/25">
                            {{ $couple->event_heading ?: ($isWedding ? "WALIMATUL 'URSY" : "UNDANGAN " . strtoupper($cat)) }}
                        </span>
                        <p class="text-xs uppercase tracking-widest text-white/80 font-medium mt-3">{{ $coverSubtitle }}</p>
                        @if($isWedding)
                            <h1 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-1 leading-tight tracking-tight drop-shadow-md">
                                {{ $couple->groom_name }} <span class="font-script text-5xl sm:text-6xl text-brand block sm:inline font-normal">&amp;</span> {{ $couple->bride_name }}
                            </h1>
                        @else
                            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-white mt-1 leading-tight tracking-tight drop-shadow-md">
                                {{ $couple->groom_fullname }}
                            </h1>
                            @if(!empty($couple->bride_name) && $couple->bride_name !== 'Keluarga')
                                <p class="text-xs text-amber-200 mt-2 font-medium tracking-wide">{{ $person2Label }}: {{ $couple->bride_name }}</p>
                            @endif
                        @endif
                        <p class="text-xs text-white/90 mt-2 font-medium tracking-wide">
                            {{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    {{-- Guest Name Box --}}
                    <div class="p-4 sm:p-5 rounded-3xl bg-black/40 backdrop-blur-md border border-white/20 text-white shadow-2xl space-y-1">
                        <p class="text-[11px] text-white/70 uppercase tracking-wider font-semibold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <h2 class="text-xl sm:text-2xl font-bold text-amber-200 tracking-wide">{{ $guest->name }}</h2>
                        @if(!empty($guest->category))
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase bg-white/20 text-white/90 mt-1">
                                Tamu {{ $guest->category }}
                            </span>
                        @endif
                        <p class="text-[10px] text-white/60 italic pt-1">*Mohon maaf apabila ada kesalahan penulisan nama atau gelar</p>
                    </div>

                    {{-- Open Invitation Button --}}
                    <div>
                        <button type="button" onclick="openInvitation()"
                                class="w-full py-3.5 px-6 rounded-full bg-brand hover:bg-accent text-white font-bold text-sm tracking-wide shadow-xl transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 border border-white/30 hover:shadow-brand/50">
                            <span class="text-lg">✉️</span>
                            <span>Buka Undangan</span>
                        </button>
                    </div>

                </div>
            @endif

        </div>
    </div>

    {{-- MAIN INVITATION CONTENT --}}
    <main id="mainInvitation" class="{{ $themeCss }} relative max-w-xl mx-auto bg-white shadow-2xl min-h-screen border-x border-ink/10">

        {{-- HERO SECTION --}}
        <section id="hero" class="relative min-h-[90vh] flex flex-col justify-end p-6 text-white text-center overflow-hidden"
                 style="background: linear-gradient(180deg, rgba(28,20,23,0.2) 0%, rgba(28,20,23,0.88) 100%), url('{{ $coverUrl }}') center/cover;">
            <div class="my-auto pt-16">
                <span class="inline-block px-3 py-1 rounded-full bg-black/40 backdrop-blur-md text-[10px] font-bold uppercase tracking-widest text-amber-200 border border-white/20">
                    {{ $couple->category ?: 'Undangan Spesial' }}
                </span>
                <p class="text-xs uppercase tracking-widest text-white/80 font-medium mt-3">{{ $coverSubtitle }}</p>
                @if($isWedding)
                    <h2 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-1">
                        {{ $couple->groom_name }} <span class="font-script text-5xl text-brand font-normal">&amp;</span> {{ $couple->bride_name }}
                    </h2>
                @else
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white mt-1">
                        {{ $couple->groom_fullname }}
                    </h2>
                    @if(!empty($couple->bride_name) && $couple->bride_name !== 'Keluarga')
                        <p class="text-xs text-amber-200 mt-1.5">{{ $person2Label }}: {{ $couple->bride_name }}</p>
                    @endif
                @endif
                <p class="text-xs text-white/85 mt-2">{{ \Carbon\Carbon::parse($couple->wedding_date)->translatedFormat('l, d F Y') }}</p>
            </div>

            <div class="pb-6">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md text-xs text-white">
                    <span>📍</span> {{ $couple->venue_name }}
                </div>
            </div>
        </section>

        {{-- AYAT SUCI & DOA --}}
        <section class="py-16 px-6 text-center bg-gradient-to-b from-[#fffcfc] to-[#fdf4f5] border-b border-ink/10">
            <span class="w-10 h-10 rounded-full bg-brand/10 text-brand inline-grid place-items-center text-lg mb-3">♥</span>
            <p class="font-serif text-2xl font-bold text-ink leading-relaxed">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <p class="text-xs text-ink2 mt-3 max-w-md mx-auto leading-relaxed">
                "{{ $couple->quote ?: 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
            </p>
            <b class="block font-serif text-sm font-bold text-accent mt-3">Doa &amp; Harapan Kami</b>
        </section>

        {{-- MEMPELAI / TOKOH ACARA SECTION --}}
        <section id="mempelai" class="py-16 px-6 text-center bg-white space-y-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">{{ $sectionBadge }}</span>
                <h3 class="font-serif text-3xl font-bold text-ink">{{ $sectionTitle }}</h3>
                <p class="text-xs text-ink2 mt-2 max-w-sm mx-auto">{{ $sectionQuote }}</p>
            </div>

            {{-- Tokoh 1 --}}
            <div class="space-y-4">
                <div class="w-40 h-40 rounded-full mx-auto overflow-hidden border-4 border-amber-200/80 shadow-xl bg-sunk">
                    <img src="{{ $groomUrl }}" class="w-full h-full object-cover" alt="{{ $couple->groom_fullname }}">
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold uppercase tracking-wider mb-1">
                        {{ $person1Label }}
                    </span>
                    <h4 class="font-serif text-2xl font-bold text-ink">{{ $couple->groom_fullname }}</h4>
                    <p class="text-xs text-ink2 mt-1 leading-relaxed">
                        @if(!empty($couple->groom_birth_order))
                            <span>{{ $couple->groom_birth_order }}</span><br>
                        @endif
                        @if(!empty($couple->groom_father) || !empty($couple->groom_mother))
                            <b>{{ $couple->groom_father }}</b>
                            @if(!empty($couple->groom_father) && !empty($couple->groom_mother)) &amp; @endif
                            <b>{{ $couple->groom_mother }}</b>
                        @endif
                        @if($couple->groom_city)
                            <span class="block text-[11px] text-ink3">({{ $couple->groom_city }})</span>
                        @endif
                    </p>
                </div>
            </div>

            {{-- Simbol Divider --}}
            <div class="font-script text-3xl sm:text-4xl text-brand font-normal leading-none my-2">{{ $dividerText }}</div>

            {{-- Tokoh 2 / Pendamping / Ahli Waris --}}
            @if(!empty($couple->bride_name) && $couple->bride_name !== 'Keluarga' && $couple->bride_fullname !== 'Keluarga Besar')
            <div class="space-y-4">
                <div class="w-40 h-40 rounded-full mx-auto overflow-hidden border-4 border-amber-200/80 shadow-xl bg-sunk">
                    <img src="{{ $brideUrl }}" class="w-full h-full object-cover" alt="{{ $couple->bride_fullname }}">
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold uppercase tracking-wider mb-1">
                        {{ $person2Label }}
                    </span>
                    <h4 class="font-serif text-2xl font-bold text-ink">{{ $couple->bride_fullname }}</h4>
                    <p class="text-xs text-ink2 mt-1 leading-relaxed">
                        @if(!empty($couple->bride_birth_order))
                            <span>{{ $couple->bride_birth_order }}</span><br>
                        @endif
                        @if($isWedding && (!empty($couple->bride_father) || !empty($couple->bride_mother)))
                            Putri dari <b>{{ $couple->bride_father }}</b>
                            @if(!empty($couple->bride_father) && !empty($couple->bride_mother)) &amp; @endif
                            <b>{{ $couple->bride_mother }}</b>
                        @endif
                        @if($couple->bride_city)
                            <span class="block text-[11px] text-ink3">({{ $couple->bride_city }})</span>
                        @endif
                    </p>
                </div>
            </div>
            @endif
        </section>

        {{-- COUNTDOWN SECTION --}}
        <section class="py-14 px-6 text-center bg-sunk border-y border-ink/10 space-y-5">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-accent block">Menghitung Hari</span>
                <h3 class="font-serif text-2xl font-bold text-ink mt-1">{{ $isWedding ? 'Menuju Hari Bahagia' : 'Menuju Hari Acara' }}</h3>
            </div>

            <div class="grid grid-cols-4 gap-2.5 max-w-sm mx-auto">
                <div class="bg-white rounded-2xl p-3 shadow-sm border border-ink/10">
                    <span id="cdDays" class="font-serif text-2xl sm:text-3xl font-bold text-brand block leading-tight">00</span>
                    <span class="text-[10px] uppercase font-bold text-ink3 mt-0.5 block">Hari</span>
                </div>
                <div class="bg-white rounded-2xl p-3 shadow-sm border border-ink/10">
                    <span id="cdHours" class="font-serif text-2xl sm:text-3xl font-bold text-brand block leading-tight">00</span>
                    <span class="text-[10px] uppercase font-bold text-ink3 mt-0.5 block">Jam</span>
                </div>
                <div class="bg-white rounded-2xl p-3 shadow-sm border border-ink/10">
                    <span id="cdMinutes" class="font-serif text-2xl sm:text-3xl font-bold text-brand block leading-tight">00</span>
                    <span class="text-[10px] uppercase font-bold text-ink3 mt-0.5 block">Menit</span>
                </div>
                <div class="bg-white rounded-2xl p-3 shadow-sm border border-ink/10">
                    <span id="cdSeconds" class="font-serif text-2xl sm:text-3xl font-bold text-brand block leading-tight">00</span>
                    <span class="text-[10px] uppercase font-bold text-ink3 mt-0.5 block">Detik</span>
                </div>
            </div>

            <div>
                <a href="{{ $gcalUrl }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-ink text-xs font-bold shadow border border-ink/15 hover:border-brand hover:text-brand transition">
                    <span>📅</span> Tambahkan ke Google Calendar
                </a>
            </div>
        </section>

        {{-- ACARA SECTION --}}
        <section id="acara" class="py-16 px-6 bg-white space-y-8">
            <div class="text-center">
                <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Jadwal Acara</span>
                <h3 class="font-serif text-3xl font-bold text-ink">Waktu &amp; Tempat</h3>
                <p class="text-xs text-ink2 mt-2">Dengan memohon rahmat Allah SWT, kami bermaksud menyelenggarakan:</p>
            </div>

            <div class="space-y-6">
                @foreach($couple->events as $event)
                    <div class="p-6 rounded-3xl bg-blush/60 border border-brand/20 shadow-sm text-center space-y-3">
                        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand text-white shadow-sm">
                            {{ $event->title }}
                        </span>
                        <div>
                            <p class="font-serif text-xl font-bold text-ink">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-xs font-bold text-accent mt-0.5">
                                Pukul {{ substr($event->start_time, 0, 5) }} - {{ substr($event->end_time, 0, 5) }} WIB
                            </p>
                        </div>
                        <div class="pt-1">
                            <b class="text-sm font-bold text-ink block">{{ $event->venue_name }}</b>
                            <p class="text-xs text-ink2 mt-0.5 leading-relaxed">{{ $event->address }}</p>
                        </div>
                        @if($event->maps_url)
                            <div class="pt-2">
                                <a href="{{ $event->maps_url }}" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-[#4285F4] text-white text-xs font-bold shadow hover:bg-blue-600 transition">
                                    <span>📍</span> Buka di Google Maps
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        {{-- LOVE STORY SECTION (HANYA JIKA PERNIKAHAN & MEMILIKI CERITA) --}}
        @if($isWedding && !empty($couple->story))
            <section class="py-16 px-6 bg-sunk/60 border-t border-ink/10 space-y-8">
                <div class="text-center">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Love Story</span>
                    <h3 class="font-serif text-3xl font-bold text-ink">Kisah Kami</h3>
                </div>

                <div class="max-w-md mx-auto p-6 rounded-3xl bg-white border border-ink/10 shadow-sm text-xs text-ink2 leading-relaxed whitespace-pre-line text-left">
                    {{ $couple->story }}
                </div>
            </section>
        @endif

        {{-- GALERI FOTO SECTION --}}
        @if($couple->galleries->count() > 0)
            <section id="galeri" class="py-16 px-6 bg-white space-y-8">
                <div class="text-center">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">{{ $galleryBadge ?? 'Momen Bahagia' }}</span>
                    <h3 class="font-serif text-3xl font-bold text-ink">{{ $galleryTitle ?? 'Galeri Kenangan' }}</h3>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    @foreach($couple->galleries as $g)
                        <div class="relative aspect-square rounded-2xl overflow-hidden bg-sunk shadow-sm cursor-pointer group"
                             onclick="showImagePopup('{{ $g->image }}')">
                            <img src="{{ $g->image }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $g->caption ?? 'Galeri' }}" loading="lazy">
                            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition duration-300 grid place-items-center">
                                <span class="text-white text-xs font-bold bg-black/60 px-3 py-1 rounded-full">🔍 Lihat</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- PERSONAL GUEST PASS QR CODE --}}
        <section class="py-14 px-6 bg-gradient-to-b from-white to-blush text-center space-y-4 border-t border-ink/10">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-accent block">VIP Guest Pass</span>
                <h3 class="font-serif text-2xl font-bold text-ink mt-1">Buku Tamu Digital QR Code</h3>
                <p class="text-xs text-ink2 mt-1">Tunjukkan kode QR ini kepada penerima tamu untuk absensi cepat tanpa antre.</p>
            </div>

            <div class="max-w-xs mx-auto p-6 rounded-3xl bg-white shadow-xl border border-brand/20 space-y-3">
                <div class="w-40 h-40 mx-auto bg-sunk rounded-2xl p-3 border border-ink/10 flex items-center justify-center">
                    {{-- Clean SVG QR Code Placeholder --}}
                    <svg viewBox="0 0 100 100" class="w-full h-full text-ink">
                        <rect x="5" y="5" width="30" height="30" fill="currentColor" rx="4" />
                        <rect x="10" y="10" width="20" height="20" fill="white" rx="2" />
                        <rect x="14" y="14" width="12" height="12" fill="currentColor" rx="2" />
                        
                        <rect x="65" y="5" width="30" height="30" fill="currentColor" rx="4" />
                        <rect x="70" y="10" width="20" height="20" fill="white" rx="2" />
                        <rect x="74" y="14" width="12" height="12" fill="currentColor" rx="2" />
                        
                        <rect x="5" y="65" width="30" height="30" fill="currentColor" rx="4" />
                        <rect x="10" y="70" width="20" height="20" fill="white" rx="2" />
                        <rect x="14" y="74" width="12" height="12" fill="currentColor" rx="2" />

                        <rect x="42" y="8" width="8" height="8" fill="currentColor" />
                        <rect x="52" y="18" width="8" height="8" fill="currentColor" />
                        <rect x="42" y="28" width="12" height="6" fill="currentColor" />
                        
                        <rect x="40" y="42" width="20" height="20" fill="#f63854" rx="4" />
                        
                        <rect x="15" y="45" width="10" height="8" fill="currentColor" />
                        <rect x="70" y="45" width="8" height="12" fill="currentColor" />
                        <rect x="80" y="58" width="12" height="8" fill="currentColor" />
                        
                        <rect x="45" y="70" width="15" height="8" fill="currentColor" />
                        <rect x="68" y="70" width="22" height="10" fill="currentColor" />
                        <rect x="50" y="82" width="12" height="10" fill="currentColor" />
                        <rect x="75" y="84" width="15" height="8" fill="currentColor" />
                    </svg>
                </div>
                <div>
                    <b class="text-sm font-bold text-ink block">{{ $guest->name }}</b>
                    <span class="text-xs text-brand font-semibold">Kuota: {{ $guest->quota ?? 2 }} Tamu Undangan</span>
                </div>
            </div>
        </section>

        {{-- AMPLOP DIGITAL SECTION --}}
        <section id="kado" class="py-16 px-6 bg-white space-y-8">
            <div class="text-center">
                <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Tanda Kasih</span>
                <h3 class="font-serif text-3xl font-bold text-ink">Amplop Digital</h3>
                <p class="text-xs text-ink2 mt-2 max-w-sm mx-auto">
                    Doa restu Anda merupakan karunia terindah bagi kami. Namun jika berkenan memberikan tanda kasih secara digital, dapat melalui rekening berikut:
                </p>
            </div>

            <div class="space-y-4 max-w-md mx-auto">
                @php
                    $bank1 = $couple->bank_account_1 ?: '1234567890';
                    $bankName1 = $couple->bank_name_1 ?: 'BCA';
                    $bankHolder1 = $couple->bank_holder_1 ?: $couple->groom_fullname;

                    $bank2 = $couple->bank_account_2;
                    $bankName2 = $couple->bank_name_2 ?: 'Mandiri';
                    $bankHolder2 = $couple->bank_holder_2 ?: $couple->bride_fullname;
                @endphp

                {{-- Bank 1 --}}
                <div class="p-5 rounded-2xl bg-gradient-to-br from-[#005baa]/10 to-[#005baa]/5 border border-[#005baa]/25 shadow-sm space-y-2">
                    <div class="flex items-center justify-between">
                        <b class="text-base font-bold text-[#005baa]">Bank {{ $bankName1 }}</b>
                        <span class="text-[10px] font-bold uppercase bg-white px-2 py-0.5 rounded-full text-ink2">{{ $person1Label }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-3 pt-1">
                        <div>
                            <span class="font-mono text-base font-bold text-ink tracking-wider block">{{ $bank1 }}</span>
                            <span class="text-xs text-ink3">a.n {{ $bankHolder1 }}</span>
                        </div>
                        <button type="button" onclick="copyAccount('{{ $bank1 }}', '{{ $bankName1 }}')"
                                class="px-3 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/20 shadow-sm hover:border-brand hover:text-brand transition">
                            Salin Rekening
                        </button>
                    </div>
                </div>

                {{-- Bank 2 --}}
                @if($bank2)
                    <div class="p-5 rounded-2xl bg-gradient-to-br from-[#003d79]/10 to-[#003d79]/5 border border-[#003d79]/25 shadow-sm space-y-2">
                        <div class="flex items-center justify-between">
                            <b class="text-base font-bold text-[#003d79]">Bank {{ $bankName2 }}</b>
                            <span class="text-[10px] font-bold uppercase bg-white px-2 py-0.5 rounded-full text-ink2">{{ $person2Label }}</span>
                        </div>
                        <div class="flex items-center justify-between gap-3 pt-1">
                            <div>
                                <span class="font-mono text-base font-bold text-ink tracking-wider block">{{ $bank2 }}</span>
                                <span class="text-xs text-ink3">a.n {{ $bankHolder2 }}</span>
                            </div>
                            <button type="button" onclick="copyAccount('{{ $bank2 }}', '{{ $bankName2 }}')"
                                    class="px-3 py-1.5 rounded-full bg-white text-ink text-xs font-bold border border-ink/20 shadow-sm hover:border-brand hover:text-brand transition">
                                Salin Rekening
                            </button>
                        </div>
                    </div>
                @endif

                {{-- Kirim Kado Fisik --}}
                @if($couple->gift_address)
                    <div class="p-5 rounded-2xl bg-sunk/60 border border-ink/10 text-center space-y-1.5">
                        <span class="text-lg">🎁</span>
                        <b class="text-xs font-bold text-ink block">Kirim Kado Fisik</b>
                        <p class="text-[11.5px] text-ink2 leading-relaxed">
                            {{ $couple->gift_address }}
                        </p>
                    </div>
                @endif
            </div>
        </section>

        {{-- RSVP & DO'A SECTION --}}
        <section id="rsvp" class="py-16 px-6 bg-gradient-to-b from-white to-[#fdf4f5] border-t border-ink/10 space-y-8">
            <div class="text-center">
                <span class="text-xs font-bold uppercase tracking-widest text-brand block mb-1">Buku Tamu</span>
                <h3 class="font-serif text-3xl font-bold text-ink">Konfirmasi &amp; Doa Restu</h3>
                <p class="text-xs text-ink2 mt-2">Mohon kesediaan Bapak/Ibu/Saudara/i untuk mengisi konfirmasi kehadiran &amp; doa.</p>
            </div>

            @if(session('wish_success'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-800 text-xs font-bold text-center">
                    ✓ {{ session('wish_success') }}
                </div>
            @endif

            {{-- Form RSVP --}}
            <form action="{{ route('invitation.wish') }}" method="POST" class="p-6 rounded-3xl bg-white shadow-xl border border-brand/20 space-y-4">
                @csrf
                <input type="hidden" name="couple_id" value="{{ $couple->id }}">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1">Nama Tamu *</label>
                    <input type="text" name="name" value="{{ $guest->name }}" required
                           class="w-full rounded-2xl border border-ink/15 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1">Konfirmasi Kehadiran *</label>
                    <select name="attendance" class="w-full rounded-2xl border border-ink/15 px-4 py-3 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand">
                        <option value="hadir" selected>✓ Hadir Memenuhi Undangan</option>
                        <option value="tidak_hadir">✗ Maaf, Berhalangan Hadir</option>
                        <option value="ragu">? Belum Pasti / Ragu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-ink2 mb-1">Pesan Doa &amp; Ucapan Selamat *</label>
                    <textarea name="message" rows="3" required placeholder="{{ $isWedding ? 'Tuliskan doa restu Anda untuk kedua mempelai...' : 'Tuliskan doa restu dan ucapan Anda...' }}"
                              class="w-full rounded-2xl border border-ink/15 px-4 py-3 text-xs focus:outline-none focus:ring-2 focus:ring-brand"></textarea>
                </div>

                <button type="submit" class="w-full py-3.5 px-6 rounded-full bg-brand hover:bg-accent text-white font-bold text-xs tracking-wider uppercase shadow-lg transition">
                    Kirim Doa Restu
                </button>
            </form>

            {{-- Wishes Stream --}}
            <div class="space-y-3 pt-4">
                <span class="text-xs font-bold uppercase tracking-widest text-ink block text-center">
                    Doa Restu dari Para Tamu ({{ $wishes->count() }})
                </span>

                <div class="space-y-2.5 max-h-80 overflow-y-auto pr-1" style="scrollbar-width: thin;">
                    @forelse($wishes as $w)
                        <div class="p-4 rounded-2xl bg-white shadow-sm border border-ink/10 space-y-1 text-left">
                            <div class="flex items-center justify-between gap-2">
                                <b class="text-xs font-bold text-ink">{{ $w->name }}</b>
                                <span class="text-[10px] text-ink3">{{ $w->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-ink2 leading-relaxed">{{ $w->message }}</p>
                        </div>
                    @empty
                        <p class="text-xs text-ink3 text-center py-4">Belum ada ucapan doa. Jadilah yang pertama mengirimkan doa!</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- PENUTUP & TERIMA KASIH --}}
        <section class="py-16 px-6 text-center bg-sunk space-y-4 border-t border-ink/10">
            <h3 class="font-serif text-2xl font-bold text-ink">Terima Kasih</h3>
            <p class="text-xs text-ink2 leading-relaxed max-w-sm mx-auto">
                {{ $couple->thank_you_note ?: 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kami.' }}
            </p>
            <p class="font-serif text-sm font-semibold text-ink pt-2">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>

            <div class="pt-4 space-y-1">
                <p class="text-xs font-bold text-ink">{{ $isWedding ? 'Kami yang berbahagia,' : 'Hormat kami,' }}</p>
                @if($isWedding)
                    <h4 class="font-serif text-2xl font-bold text-brand">{{ $couple->groom_name }} &amp; {{ $couple->bride_name }}</h4>
                    <p class="text-[11px] text-ink3">Beserta Keluarga Besar Kedua Mempelai</p>
                @else
                    <h4 class="font-serif text-2xl font-bold text-brand">{{ $couple->groom_fullname }}</h4>
                    <p class="text-[11px] text-ink3">Beserta Seluruh Keluarga Besar yang Mengundang</p>
                @endif
            </div>

            {{-- Brand Watermark --}}
            <div class="pt-10 pb-4 border-t border-ink/10 text-center space-y-1.5">
                <a href="{{ route('invitation.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-ink hover:text-brand transition">
                    <span class="w-5 h-5 rounded-full bg-brand text-white grid place-items-center text-[10px]">DK</span>
                    <span>Platform Undangan Digital D'Karsa</span>
                </a>
                <p class="text-[10px] text-ink3">Ingin membuat undangan digital elegan seperti ini? Kunjungi beranda D'Karsa.</p>
            </div>
        </section>

    </main>

    {{-- FLOATING BOTTOM NAVIGATION BAR (Mobile First) --}}
    <nav class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-ink/10 py-2 px-3 shadow-lg max-w-xl mx-auto flex items-center justify-around text-center">
        <a href="#hero" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
            <span class="text-base">🏠</span>
            <span>Beranda</span>
        </a>
        <a href="#mempelai" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
            <span class="text-base">{{ $navPersonIcon }}</span>
            <span>{{ $navPersonLabel }}</span>
        </a>
        <a href="#acara" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
            <span class="text-base">📅</span>
            <span>Acara</span>
        </a>
        @if($couple->galleries->count() > 0)
            <a href="#galeri" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
                <span class="text-base">📷</span>
                <span>Galeri</span>
            </a>
        @endif
        <a href="#kado" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
            <span class="text-base">🎁</span>
            <span>Kado</span>
        </a>
        <a href="#rsvp" class="flex flex-col items-center text-[10px] font-bold text-ink2 hover:text-brand transition">
            <span class="text-base">💬</span>
            <span>RSVP</span>
        </a>
    </nav>

    {{-- TOAST NOTIFICATION CONTAINER --}}
    <div id="toastNotification" class="fixed top-5 left-1/2 -translate-x-1/2 z-50 px-5 py-3 rounded-full bg-black/85 backdrop-blur-md text-white text-xs font-bold shadow-2xl transition-all duration-300 toast-hide flex items-center gap-2">
        <span id="toastIcon">✓</span>
        <span id="toastMsg">Nomor rekening berhasil disalin!</span>
    </div>

    {{-- LIGHTBOX POPUP MODAL --}}
    <div id="imageLightbox" class="fixed inset-0 z-50 hidden bg-black/90 p-4 items-center justify-center cursor-pointer" onclick="closeLightbox()">
        <img id="lightboxImg" src="" class="max-w-full max-h-[90vh] rounded-2xl shadow-2xl object-contain" alt="Perbesar Foto">
    </div>

    <script>
        // Open Invitation Envelope & Autoplay Audio
        function openInvitation() {
            const cover = document.getElementById('openingCover');
            const audio = document.getElementById('invitationMusic');
            const disc = document.getElementById('musicDisc');

            if (cover) {
                cover.style.transform = 'translateY(-100%)';
            }

            if (audio) {
                audio.play().then(() => {
                    if (disc) disc.classList.add('animate-spin');
                }).catch(() => {});
            }
        }

        // Toggle Audio
        function toggleAudio() {
            const audio = document.getElementById('invitationMusic');
            const disc = document.getElementById('musicDisc');
            if (!audio) return;

            if (audio.paused) {
                audio.play().then(() => {
                    if (disc) disc.classList.add('animate-spin');
                }).catch(() => {});
            } else {
                audio.pause();
                if (disc) disc.classList.remove('animate-spin');
            }
        }

        // Copy Account to Clipboard & Show Toast
        function copyAccount(accNumber, bankName) {
            navigator.clipboard.writeText(accNumber).then(() => {
                showToast(`Nomor rekening ${bankName} (${accNumber}) berhasil disalin!`);
            }).catch(() => {
                prompt('Salin nomor rekening:', accNumber);
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMsg');
            if (toast && toastMsg) {
                toastMsg.textContent = msg;
                toast.classList.remove('toast-hide');
                toast.classList.add('toast-show');
                setTimeout(() => {
                    toast.classList.remove('toast-show');
                    toast.classList.add('toast-hide');
                }, 3000);
            }
        }

        // Lightbox
        function showImagePopup(src) {
            const lb = document.getElementById('imageLightbox');
            const img = document.getElementById('lightboxImg');
            if (lb && img) {
                img.src = src;
                lb.classList.remove('hidden');
                lb.classList.add('flex');
            }
        }

        function closeLightbox() {
            const lb = document.getElementById('imageLightbox');
            if (lb) {
                lb.classList.add('hidden');
                lb.classList.remove('flex');
            }
        }

        // Live Countdown Timer
        const targetEventTime = new Date('{{ $targetEventIso }}').getTime();
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetEventTime - now;

            if (distance <= 0) {
                const cdD = document.getElementById('cdDays');
                const cdH = document.getElementById('cdHours');
                const cdM = document.getElementById('cdMinutes');
                const cdS = document.getElementById('cdSeconds');
                if (cdD) cdD.textContent = '00';
                if (cdH) cdH.textContent = '00';
                if (cdM) cdM.textContent = '00';
                if (cdS) cdS.textContent = '00';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const dEl = document.getElementById('cdDays');
            const hEl = document.getElementById('cdHours');
            const mEl = document.getElementById('cdMinutes');
            const sEl = document.getElementById('cdSeconds');

            if (dEl) dEl.textContent = String(days).padStart(2, '0');
            if (hEl) hEl.textContent = String(hours).padStart(2, '0');
            if (mEl) mEl.textContent = String(minutes).padStart(2, '0');
            if (sEl) sEl.textContent = String(seconds).padStart(2, '0');
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>
</html>
