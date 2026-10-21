<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Str;

class TemplateManager
{
    /**
     * Definisi seluruh template desain digital D'Karsa
     */
    public static function all(): array
    {
        return [
            'chibi-red' => [
                'key' => 'chibi-red',
                'name' => 'Chibi Red Oriental',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Pernikahan',
                'blade' => 'templates.chibi-red',
                'desc' => 'Desain pernikahan oriental modern Chibi Red: kaligrafi merah emas, Song Hỷ badge (囍), kalender tanggal interaktif, galeri silinder 3D, dan amplop digital angpao.',
                'img' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Oriental Red',
                'demo_route' => '/demo/chibi-red',
            ],
            'wildflower-pink' => [
                'key' => 'wildflower-pink',
                'name' => 'Wildflower Pink (Rose Romance)',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Pernikahan',
                'blade' => 'templates.wildflower-pink',
                'desc' => 'Desain pernikahan modern Wildflower Pink: bingkai kubah lengkung (arched frame), wax seal berdenyut, kaligrafi anggun, kelopak mawar berguguran, dan tata letak floral romantis.',
                'img' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Wildflower Pink',
                'demo_route' => '/demo/wildflower-pink',
            ],
            'javanese-royal' => [
                'key' => 'javanese-royal',
                'name' => '3D Javanese Royal Keraton',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Pernikahan',
                'blade' => 'templates.javanese-royal',
                'desc' => 'Nuansa kemegahan keraton Jawa dengan animasi 3D gunungan wayang kulit, ornamen batik parang emas, serat ulem berwibawa, dan atmosfer gending halus.',
                'img' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Royal Adat 3D',
                'demo_route' => '/demo/javanese-royal',
            ],
            'batak-heritage' => [
                'key' => 'batak-heritage',
                'name' => 'Batak Istimewa Heritage',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Pernikahan',
                'blade' => 'templates.batak-heritage',
                'desc' => 'Desain pernikahan adat Batak Istimewa bernuansa marun & emas: motif Gorga Batak sakral, tenun ulos ragi hotang, tata ulaon unjuk, pasu-pasu raja, dan gondang sabangunan.',
                'img' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Batak Heritage',
                'demo_route' => '/demo/batak-heritage',
            ],
            'minimalist-floral' => [
                'key' => 'minimalist-floral',
                'name' => 'Simple Minimalist Floral',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Pernikahan',
                'blade' => 'templates.minimalist-floral',
                'desc' => 'Desain bersih modern bergaya majalah editorial dengan tipografi elegan, garis halus sage botanical, dan ruang putih yang lapang nan estetis.',
                'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Minimalis Modern',
                'demo_route' => '/demo/minimalist-floral',
            ],
            'snowfall-white' => [
                'key' => 'snowfall-white',
                'name' => 'SnowFall Minimalist White',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Pernikahan',
                'blade' => 'templates.snowfall-white',
                'desc' => 'Desain pernikahan editorial monokrom serba putih dengan animasi partikel salju jatuh (snowfall), tipografi haute couture Cormorant Garamond, dan kemewahan minimalis mutlak.',
                'img' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80&auto=format&fit=crop',
                'badge' => '💍 Pernikahan • Snowfall White',
                'demo_route' => '/demo/snowfall-white',
            ],
            'tahlilan-khusyuk' => [
                'key' => 'tahlilan-khusyuk',
                'name' => 'Doa Bersama & Tahlilan Khusyuk',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Keagamaan',
                'blade' => 'templates.tahlilan-khusyuk',
                'desc' => 'Desain tahlilan & haul mengenang almarhum/almarhumah bernuansa teduh khusyuk, kaligrafi doa jelas, jadwal tahlil, dan sedekah jariyah santunan.',
                'img' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🕯️ Doa Bersama • Khusyuk',
                'demo_route' => '/demo/tahlilan-khusyuk',
            ],
            'wisuda-sarjana' => [
                'key' => 'wisuda-sarjana',
                'name' => 'Wisuda Sarjana Prestasi Emas',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Wisuda',
                'blade' => 'templates.wisuda-sarjana',
                'desc' => 'Desain resmi syukuran kelulusan dan wisuda sarjana berprestasi: toga kehormatan, profil gelar sarjana, jadwal sidang terbuka, dan ucapan selamat.',
                'img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🎓 Wisuda • Prestasi Emas',
                'demo_route' => '/demo/wisuda-sarjana',
            ],
            'golden-birthday' => [
                'key' => 'golden-birthday',
                'name' => 'Golden Luxury Birthday / Milad',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Ulang Tahun',
                'blade' => 'templates.golden-birthday',
                'desc' => 'Desain perayaan ulang tahun meriah bernuansa emas & pesta malam: balon berkilau, foto birthday star, countdown jam pesta, kado digital & ucapan selamat.',
                'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🎂 Ulang Tahun • Eksklusif',
                'demo_route' => '/demo/golden-birthday',
            ],
            'baby-aqiqah' => [
                'key' => 'baby-aqiqah',
                'name' => 'Sweet Baby Pastel Aqiqah & Khitan',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Aqiqah',
                'blade' => 'templates.baby-aqiqah',
                'desc' => 'Desain tasyakuran aqiqah & walimatul khitan buah hati bernuansa pastel lembut: doa keberkahan bayi, jadwal tasmiyah & aqiqah, serta kado tali asih.',
                'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'badge' => '👶 Aqiqah & Khitan • Premium',
                'demo_route' => '/demo/baby-aqiqah',
            ],
            'formal-corporate' => [
                'key' => 'formal-corporate',
                'name' => 'Executive Corporate & Grand Opening',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Acara Formal',
                'blade' => 'templates.formal-corporate',
                'desc' => 'Tata letak eksekutif presisi untuk peresmian bisnis, gala dinner korporat, seminar VIP & temu kangen reuni akbar dengan RSVP mitra strategis.',
                'img' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🏛️ Acara Formal • Eksklusif',
                'demo_route' => '/demo/formal-corporate',
            ],
            'halal-bihalal' => [
                'key' => 'halal-bihalal',
                'name' => 'Ketupat Raya Silaturahmi & Halal Bihalal',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Keagamaan',
                'blade' => 'templates.halal-bihalal',
                'desc' => 'Desain silaturahmi & Halal Bihalal Idul Fitri ceria bernuansa hijau zamrud Islami: salam maaf lahir batin, jadwal ramah tamah keluarga/kantor, lokasi Google Maps, dan kado hari raya.',
                'img' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🕌 Halal Bihalal • Basic',
                'demo_route' => '/demo/halal-bihalal',
            ],
            'walimatul-khitan' => [
                'key' => 'walimatul-khitan',
                'name' => 'Walimatul Khitan Berkah Sholeh',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Aqiqah',
                'blade' => 'templates.walimatul-khitan',
                'desc' => 'Undangan tasyakuran walimatul khitan bernuansa sapphire blue & emas: profil jagoan cilik berbaju koko dan peci, jadwal syukuran & doa selamat, serta tali asih anak sholeh.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200&q=80&auto=format&fit=crop',
                'badge' => '✂️ Khitanan • Premium',
                'demo_route' => '/demo/walimatul-khitan',
            ],
            'kids-birthday' => [
                'key' => 'kids-birthday',
                'name' => 'Kids Birthday Party Balon Ceria',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Ulang Tahun',
                'blade' => 'templates.kids-birthday',
                'desc' => 'Desain pesta ulang tahun anak penuh warna ceria, konfeti & balon: perayaan usia si kecil, rundown games seru, tiup lilin bersama sahabat, kado celengan ceria.',
                'img' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🎈 Ultah Anak • Ceria',
                'demo_route' => '/demo/kids-birthday',
            ],
            'syukuran-rumah' => [
                'key' => 'syukuran-rumah',
                'name' => 'Tasyakuran & Doa Rumah Baru',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Keagamaan',
                'blade' => 'templates.syukuran-rumah',
                'desc' => 'Desain tasyakuran menempati kediaman / tempat usaha baru bernuansa hangat terracotta & kayu: doa Baitii Jannatii, jadwal pengajian & potong tumpeng, Google Maps alamat baru.',
                'img' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🏡 Syukuran • Rumah Baru',
                'demo_route' => '/demo/syukuran-rumah',
            ],
            'cheerful-birthday' => [
                'key' => 'cheerful-birthday',
                'name' => 'Fun Minimalist & Cheerful Birthday',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Ulang Tahun',
                'blade' => 'templates.cheerful-birthday',
                'desc' => 'Desain pesta ulang tahun ceria bernuansa pastel & konfeti warna-warni: hitung mundur jam pesta, kue ulang tahun, galeri momen seru, dan kado digital.',
                'img' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🎈 Ultah • Basic Ceria',
                'demo_route' => '/demo/cheerful-birthday',
            ],
            'little-prince' => [
                'key' => 'little-prince',
                'name' => 'Nordic Little Prince Baby Aqiqah',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Aqiqah',
                'blade' => 'templates.little-prince',
                'desc' => 'Tasyakuran kelahiran & aqiqah bernuansa Nordic minimalis: bingkai lengkung lembut, detail kelahiran buah hati, doa penyejuk hati & peta kediaman keluarga.',
                'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'badge' => '👶 Aqiqah • Basic Nordic',
                'demo_route' => '/demo/little-prince',
            ],
            'royal-tasmiyah' => [
                'key' => 'royal-tasmiyah',
                'name' => 'Royal Sultan Baby & Tasmiyah Gold',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Aqiqah',
                'blade' => 'templates.royal-tasmiyah',
                'desc' => 'Kemegahan perhelatan aqiqah & tasmiyah berbalut mahkota emas & hijau zamrud kesultanan: kaligrafi doa Arab, lentera gantung berdenyut, jamuan santap & tali asih sultan.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200&q=80&auto=format&fit=crop',
                'badge' => '👑 Aqiqah • Royal Eksklusif',
                'demo_route' => '/demo/royal-tasmiyah',
            ],
            'green-mosque' => [
                'key' => 'green-mosque',
                'name' => 'Green Mosque Harmony Syiar & Pengajian',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Keagamaan',
                'blade' => 'templates.green-mosque',
                'desc' => 'Desain syiar Islam & pengajian akbar berbingkai kubah masjid hijau zamrud & emas: kutipan ayat Al-Qur\'an, jadwal tausiyah & dzikir, Google Maps, dan infaq jariyah.',
                'img' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🕌 Keagamaan • Premium Syiar',
                'demo_route' => '/demo/green-mosque',
            ],
            'walimatus-safar' => [
                'key' => 'walimatus-safar',
                'name' => 'Walimatus Safar Haji & Umrah Mubarok',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Keagamaan',
                'blade' => 'templates.walimatus-safar',
                'desc' => 'Desain megah berbalut kaligrafi emas Kiswah Ka\'bah untuk walimatus safar calon jamaah haji/umrah: talbiyah agung, doa musafir, titipan doa di Tanah Suci & jadwal manasik.',
                'img' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🕋 Safar Haji • Eksklusif',
                'demo_route' => '/demo/walimatus-safar',
            ],
            'modern-graduate' => [
                'key' => 'modern-graduate',
                'name' => 'Modern Minimalist Graduation & Syukuran',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Wisuda',
                'blade' => 'templates.modern-graduate',
                'desc' => 'Desain kelulusan & wisuda bersih bernuansa editorial monokrom: emblem toga, profil wisudawan & gelar sarjana, jadwal sidang terbuka, dan buku ucapan selamat.',
                'img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🎓 Wisuda • Basic Minimalis',
                'demo_route' => '/demo/modern-graduate',
            ],
            'scholar-luxury' => [
                'key' => 'scholar-luxury',
                'name' => 'Grand Valedictorian & Ivy Honor Eksklusif',
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Wisuda',
                'blade' => 'templates.scholar-luxury',
                'desc' => 'Kemewahan prestisius Ivy League berbalut midnight navy & stempel medali emas kehormatan: penghormatan Summa Cum Laude, commencement gala, countdown & apresiasi wisudawan.',
                'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🏆 Wisuda • Eksklusif Valedictorian',
                'demo_route' => '/demo/scholar-luxury',
            ],
            'clean-seminar' => [
                'key' => 'clean-seminar',
                'name' => 'Clean Workshop & Seminar Profesional',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Acara Formal',
                'blade' => 'templates.clean-seminar',
                'desc' => 'Tata letak modern & fungsional untuk seminar bisnis, workshop & simposium: profil pembicara ahli, rundown sesi terstruktur, Google Calendar, dan konfirmasi delegasi pass.',
                'img' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80&auto=format&fit=crop',
                'badge' => '📊 Formal • Basic Seminar',
                'demo_route' => '/demo/clean-seminar',
            ],
            'reuni-akbar' => [
                'key' => 'reuni-akbar',
                'name' => 'Gala Reuni Akbar & Alumni Gathering',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Acara Formal',
                'blade' => 'templates.reuni-akbar',
                'desc' => 'Desain temu kangen alumni bernuansa sapphire navy & silver: nostalgia dinding foto polaroid, panduan dress code, countdown jam reuni, konfirmasi kehadiran & donasi kas.',
                'img' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1200&q=80&auto=format&fit=crop',
                'badge' => '🥂 Reuni Akbar • Premium Gathering',
                'demo_route' => '/demo/reuni-akbar',
            ],
            'custom-request' => [
                'key' => 'custom-request',
                'name' => 'Custom Request Desain Bebas Impianmu',
                'package' => 'Paket Kustom - Rp280.000',
                'tier' => 'kustom',
                'category' => 'Pernikahan',
                'blade' => 'templates.chibi-red',
                'desc' => 'Request tema baru dari nol sesuai keinginan Anda! Tim desainer D\'Karsa siap membuatkan konsep khusus berdasarkan warna, tema adat langka, atau referensi apapun.',
                'img' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80&auto=format&fit=crop',
                'badge' => '✨ Kustom • Full Request',
                'demo_route' => '/buat-undangan?theme=Custom+Request&package=Paket+Kustom+-+Rp280.000',
            ],
        ];
    }

    /**
     * Resolusi URL foto (mendukung storage public, full URL http/https, dan data URL base64)
     */
    public static function resolvePhotoUrl(?string $path, ?string $fallback = ''): string
    {
        if (empty($path)) {
            return $fallback ?? asset('images/placeholder-cover.svg');
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, 'data:') || str_starts_with($path, '/')) {
            return $path;
        }
        return asset('storage/' . ltrim($path, '/'));
    }

    /**
     * Format nama kedua orang tua mempelai dengan gelar kehormatan rapi & konsisten
     */
    public static function formatParentNames(?string $father, ?string $mother, ?string $fallback = ''): string
    {
        $father = trim($father ?? '');
        $mother = trim($mother ?? '');

        $hasFather = ($father !== '');
        $hasMother = ($mother !== '');

        if (!$hasFather && !$hasMother) {
            return $fallback ?? '';
        }

        $formattedFather = '';
        if ($hasFather) {
            $alreadyHasTitle = preg_match('/^(bpk|bapak|ayah|alm|almarhum|dr|drs|ir|prof|h|haji)(\.|\b)/i', $father);
            $formattedFather = $alreadyHasTitle ? $father : "Bpk. {$father}";
        }

        $formattedMother = '';
        if ($hasMother) {
            $alreadyHasTitle = preg_match('/^(ibu|bunda|mama|umi|almh|almarhumah|dra|dr|ir|prof|hj|hajjah)(\.|\b)/i', $mother);
            $formattedMother = $alreadyHasTitle ? $mother : "Ibu {$mother}";
        }

        if ($hasFather && $hasMother) {
            return "{$formattedFather} & {$formattedMother}";
        } elseif ($hasFather) {
            return $formattedFather;
        } else {
            return $formattedMother;
        }
    }

    /**
     * Resolve string tema / request ke key template kanonikal
     */
    public static function resolveKey(?string $themeName, ?string $category = null, ?string $subCategory = null): string
    {
        $raw = strtolower(trim((string)$themeName));
        $cat = strtolower(trim((string)$category));
        $sub = strtolower(trim((string)$subCategory));

        // 1. Check exact key match first
        if (array_key_exists($raw, self::all())) {
            return $raw;
        }

        // Specific template keyword matching
        if (str_contains($raw, 'cheerful') || str_contains($raw, 'confetti') || str_contains($raw, 'fun minimalist')) {
            return 'cheerful-birthday';
        }
        if (str_contains($raw, 'golden') || str_contains($raw, 'luxury birthday') || str_contains($raw, 'milad')) {
            return 'golden-birthday';
        }
        if (str_contains($raw, 'little prince') || str_contains($raw, 'prince') || str_contains($raw, 'nordic')) {
            return 'little-prince';
        }
        if (str_contains($raw, 'royal tasmiyah') || str_contains($raw, 'tasmiyah') || str_contains($raw, 'sultan')) {
            return 'royal-tasmiyah';
        }
        if (str_contains($raw, 'green mosque') || str_contains($raw, 'syiar') || (str_contains($raw, 'pengajian') && !str_contains($raw, 'rumah'))) {
            return 'green-mosque';
        }
        if (str_contains($raw, 'walimatus safar') || str_contains($raw, 'safar') || str_contains($raw, 'haji') || str_contains($raw, 'umrah')) {
            return 'walimatus-safar';
        }
        if (str_contains($raw, 'modern graduate') || str_contains($raw, 'graduate') || str_contains($raw, 'modern-graduate')) {
            return 'modern-graduate';
        }
        if (str_contains($raw, 'scholar luxury') || str_contains($raw, 'valedictorian') || str_contains($raw, 'ivy')) {
            return 'scholar-luxury';
        }
        if (str_contains($raw, 'clean seminar') || str_contains($raw, 'clean tech') || str_contains($raw, 'seminar') || str_contains($raw, 'workshop') || str_contains($raw, 'clean-seminar')) {
            return 'clean-seminar';
        }
        if (str_contains($raw, 'reuni') || str_contains($raw, 'alumni')) {
            return 'reuni-akbar';
        }

        // 2. Wisuda / Kelulusan / Graduation
        if ($cat === 'wisuda' || str_contains($cat, 'wisuda') || str_contains($cat, 'graduation')
            || str_contains($raw, 'wisuda') || str_contains($raw, 'sarjana') || str_contains($raw, 'graduation')
            || str_contains($sub, 'wisuda') || str_contains($sub, 'kelulusan') || str_contains($sub, 'sarjana')) {
            return 'wisuda-sarjana';
        }

        // 3. Khitanan / Sunatan Anak
        if (str_contains($cat, 'khitan') || str_contains($raw, 'khitan') || str_contains($raw, 'sunat') || str_contains($sub, 'khitan')) {
            return 'walimatul-khitan';
        }

        // 4. Halal Bihalal & Silaturahmi Idul Fitri
        if (str_contains($raw, 'halal') || str_contains($raw, 'ketupat') || str_contains($raw, 'silaturahmi') 
            || str_contains($sub, 'halal') || str_contains($cat, 'halalbihalal')) {
            return 'halal-bihalal';
        }

        // 5. Syukuran Rumah Baru / Tasyakuran Usaha
        if (str_contains($raw, 'rumah') || (str_contains($raw, 'syukuran') && !str_contains($raw, 'khitan'))
            || (str_contains($sub, 'tasyakuran') && !str_contains($sub, 'khitan'))
            || str_contains($cat, 'syukuran')) {
            return 'syukuran-rumah';
        }

        // 6. Keagamaan (Tahlilan, Doa Bersama, Haul Almarhum)
        if (str_contains($raw, 'tahlil') || str_contains($raw, 'doa bersama') || str_contains($raw, 'haul') 
            || str_contains($sub, 'tahlil') || str_contains($sub, 'doa bersama') || $cat === 'tahlilan') {
            return 'tahlilan-khusyuk';
        }

        // 7. Ulang Tahun Anak (Kids Party / Balon / Karakter)
        if (str_contains($raw, 'kid') || str_contains($raw, 'anak') || str_contains($sub, 'anak') || str_contains($sub, 'karakter')) {
            return 'kids-birthday';
        }

        // 8. Ulang Tahun (Sweet 17th / Milad / Remaja / Dewasa)
        if ($cat === 'ulang-tahun' || str_contains($cat, 'ulang') || str_contains($cat, 'ultah') || str_contains($cat, 'birthday')
            || str_contains($raw, 'ulang') || str_contains($raw, 'ultah') || str_contains($raw, 'birthday') || str_contains($raw, 'milad')) {
            return 'golden-birthday';
        }

        // 9. Aqiqah (Kelahiran Bayi / Tasmiyah)
        if ($cat === 'aqiqah' || str_contains($cat, 'aqiqah') || str_contains($raw, 'aqiqah') || str_contains($raw, 'baby') 
            || str_contains($raw, 'tasmiyah') || str_contains($sub, 'aqiqah') || str_contains($sub, 'bayi') || str_contains($sub, 'nama')) {
            return 'baby-aqiqah';
        }

        // 10. Acara Formal (Corporate, Grand Opening, Reuni, Bisnis)
        if ($cat === 'acara-formal' || str_contains($cat, 'formal') || str_contains($cat, 'corporate')
            || str_contains($raw, 'formal') || str_contains($raw, 'corporate') || str_contains($raw, 'opening')
            || str_contains($sub, 'formal') || str_contains($sub, 'corporate') || str_contains($sub, 'opening')) {
            return 'formal-corporate';
        }

        // 11. General Keagamaan fallback
        if ($cat === 'keagamaan' || str_contains($cat, 'keagamaan')) {
            return 'tahlilan-khusyuk';
        }

        // 12. Chibi Red / Oriental
        if (str_contains($raw, 'chibi') || str_contains($raw, 'oriental') || str_contains($raw, 'red') || str_contains($raw, 'chinese')) {
            return 'chibi-red';
        }

        // 13. Wildflower Pink / Rose Romance
        if (str_contains($raw, 'wildflower') || str_contains($raw, 'rose romance') || str_contains($raw, 'rose')) {
            return 'wildflower-pink';
        }

        // 14. Batak Istimewa Heritage
        if (str_contains($raw, 'batak') || str_contains($raw, 'ulos') || str_contains($raw, 'gorga') || str_contains($sub, 'batak')) {
            return 'batak-heritage';
        }

        // 15. Javanese Royal / Adat / Keraton
        if (str_contains($raw, 'javanese') || str_contains($raw, 'keraton') || str_contains($raw, 'jawa') || str_contains($raw, 'royal')) {
            return 'javanese-royal';
        }

        // 16. SnowFall Minimalist White / Pure White Editorial
        if (str_contains($raw, 'snowfall') || str_contains($raw, 'snow') || str_contains($raw, 'white') || str_contains($raw, 'couture')) {
            return 'snowfall-white';
        }

        // 17. Custom Request
        if (str_contains($raw, 'custom') || str_contains($raw, 'kustom') || str_contains($raw, 'vip request')) {
            return 'custom-request';
        }

        // 18. Minimalist Floral / Modern Editorial / Faris & Zahra
        if (str_contains($raw, 'minimalist') || str_contains($raw, 'floral') || str_contains($raw, 'basic') || str_contains($raw, 'editorial') || str_contains($raw, 'faris') || str_contains($raw, 'zahra')) {
            return 'minimalist-floral';
        }

        // Default wedding template
        return 'chibi-red';
    }

    /**
     * Dapatkan detail metadata template tertentu
     */
    public static function get(string $key): array
    {
        $all = self::all();
        $normalized = self::resolveKey($key);
        return $all[$normalized] ?? $all['chibi-red'];
    }

    /**
     * Dapatkan URL gambar cover default kanonikal untuk template tertentu
     */
    public static function getDefaultCoverImage(?string $templateKey): string
    {
        if (empty($templateKey)) {
            return 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80&auto=format&fit=crop';
        }
        $key = self::resolveKey($templateKey);
        $all = self::all();
        if (isset($all[$key]['default_cover'])) {
            return $all[$key]['default_cover'];
        }
        if (isset($all[$key]['img'])) {
            return $all[$key]['img'];
        }
        return 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80&auto=format&fit=crop';
    }

    /**
     * Dapatkan daftar seluruh tema katalog resmi D'Karsa untuk halaman Home & Builder
     */
    public static function getCatalogThemes(): array
    {
        return [
            // ==========================================
            // 1. TIER BASIC: Desain Standar / Biasa Saja (Rp50.000)
            // ==========================================
            [
                'key' => 'minimalist-floral',
                'template_key' => 'minimalist-floral',
                'name' => 'Simple Minimalist Floral',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '💍 Pernikahan • Basic',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Minimalis modern',
                'theme_css' => 'theme-floral-wreath',
                'skin' => 'skin-minimalist-floral',
                'desc' => 'Desain pernikahan bersih, minimalis & rapi dengan tipografi anggun, tata letak esensial & harga paling hemat.',
                'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/minimalist-floral'),
            ],
            [
                'key' => 'halal-bihalal',
                'template_key' => 'halal-bihalal',
                'name' => 'Ketupat Raya Silaturahmi & Halal Bihalal',
                'category' => 'halalbihalal',
                'category_label' => 'Keagamaan',
                'sub_category' => 'Halal bihalal',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🕌 Halal Bihalal • Basic',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Keagamaan',
                'sub_cat' => 'Halal bihalal',
                'theme_css' => 'theme-ketupat-raya',
                'skin' => 'skin-ketupat-raya',
                'desc' => 'Desain silaturahmi Idul Fitri ceria bernuansa hijau zamrud Islami: salam maaf lahir batin, jadwal ramah tamah keluarga/kantor, lokasi Google Maps, dan kado hari raya.',
                'img' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/halal-bihalal'),
            ],
            [
                'key' => 'syukuran-rumah',
                'template_key' => 'syukuran-rumah',
                'name' => 'Tasyakuran & Doa Rumah Baru',
                'category' => 'syukuran',
                'category_label' => 'Keagamaan',
                'sub_category' => 'Tasyakuran',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🏡 Syukuran • Rumah Baru',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Keagamaan',
                'sub_cat' => 'Tasyakuran',
                'theme_css' => 'theme-syukuran-rumah',
                'skin' => 'skin-minimalist-floral',
                'desc' => 'Undangan syukuran rumah baru bernuansa hangat terracotta & kayu, doa Baitii Jannatii, potong tumpeng dan peta kediaman baru.',
                'img' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/syukuran-rumah'),
            ],
            [
                'key' => 'tahlilan-khusyuk',
                'template_key' => 'tahlilan-khusyuk',
                'name' => 'Doa Bersama & Tahlilan Khusyuk',
                'category' => 'tahlilan',
                'category_label' => 'Keagamaan',
                'sub_category' => 'Doa bersama & tahlilan',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🕯️ Doa Bersama • Basic',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Keagamaan',
                'sub_cat' => 'Doa bersama & tahlilan',
                'theme_css' => 'theme-tahlilan-khusyuk',
                'skin' => 'skin-minimalist-floral',
                'desc' => 'Desain tahlilan & haul mengenang almarhum/almarhumah bernuansa teduh khusyuk, teks doa jelas, hemat dan sopan untuk sanak kerabat.',
                'img' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/tahlilan-khusyuk'),
            ],
            [
                'key' => 'cheerful-birthday',
                'template_key' => 'cheerful-birthday',
                'name' => 'Cheerful Confetti Birthday',
                'category' => 'ultah',
                'category_label' => 'Ulang Tahun',
                'sub_category' => 'Ulang tahun anak & remaja',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🎈 Ultah • Fun Minimalist',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Ulang Tahun',
                'sub_cat' => 'Ulang tahun anak & remaja',
                'theme_css' => 'theme-kids-party',
                'skin' => 'skin-kids-party',
                'desc' => 'Desain ulang tahun ceria & hemat dengan aksen konfeti pastel, countdown jam pesta, rundown games seru, kado kadoan dan ucapan doa sahabat.',
                'img' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/cheerful-birthday'),
            ],
            [
                'key' => 'little-prince',
                'template_key' => 'little-prince',
                'name' => 'Little Prince Nordic Aqiqah',
                'category' => 'aqiqah',
                'category_label' => 'Aqiqah',
                'sub_category' => 'Aqiqah & kelahiran buah hati',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '👶 Aqiqah • Basic Nordic',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Aqiqah',
                'sub_cat' => 'Aqiqah & kelahiran buah hati',
                'theme_css' => 'theme-little-prince',
                'skin' => 'skin-baby-pastel',
                'desc' => 'Desain aqiqah & tasmiyah minimalis gaya Skandinavia yang hangat: profil kelahiran, rincian tasyakuran kambing, doa penyejuk hati & peta kediaman.',
                'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/little-prince'),
            ],
            [
                'key' => 'modern-graduate',
                'template_key' => 'modern-graduate',
                'name' => 'Modern Graduate Editorial',
                'category' => 'wisuda',
                'category_label' => 'Wisuda',
                'sub_category' => 'Wisuda sarjana',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🎓 Wisuda • Basic Editorial',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Wisuda',
                'sub_cat' => 'Wisuda sarjana',
                'theme_css' => 'theme-snow-white',
                'skin' => 'skin-minimalist-floral',
                'desc' => 'Desain wisuda minimalis monokrom gaya majalah editorial: pengumuman gelar sarjana, jadwal upacara wisuda, live stream YouTube & ucapan apresiasi.',
                'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/modern-graduate'),
            ],
            [
                'key' => 'clean-seminar',
                'template_key' => 'clean-seminar',
                'name' => 'Clean Tech Seminar & Workshop',
                'category' => 'formal',
                'category_label' => 'Acara Formal',
                'sub_category' => 'Seminar & workshop',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '🎙️ Seminar • Basic Tech',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Acara Formal',
                'sub_cat' => 'Seminar & workshop',
                'theme_css' => 'theme-snow-white',
                'skin' => 'skin-minimalist-floral',
                'desc' => 'Desain simposium, lokakarya & seminar interaktif: profil pembicara (keynote), tiket barcode/QR, jadwal sesi materi & tautan registrasi Google Forms.',
                'img' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/clean-seminar'),
            ],

            // ==========================================
            // 2. TIER PREMIUM: Desain Modern & Elegan (Rp110.000)
            // ==========================================
            [
                'key' => 'chibi-red',
                'template_key' => 'chibi-red',
                'name' => 'Chibi Red Oriental',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '💍 Pernikahan • Oriental Red',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Minimalis modern',
                'theme_css' => 'theme-rose-romance',
                'skin' => 'skin-wildflower',
                'desc' => 'Desain pernikahan oriental modern Chibi Red: kaligrafi merah emas, Song Hỷ badge (囍), kalender tanggal interaktif, galeri silinder 3D, dan amplop digital angpao.',
                'img' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/chibi-red'),
            ],
            [
                'key' => 'wildflower-pink',
                'template_key' => 'wildflower-pink',
                'name' => 'Wildflower Pink (Rose Romance)',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Elegan, floral, dan islami',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '💍 Pernikahan • Wildflower Pink',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Elegan, floral, dan islami',
                'theme_css' => 'theme-rose-romance',
                'skin' => 'skin-wildflower',
                'desc' => 'Desain pernikahan modern Wildflower Pink: bingkai kubah lengkung, wax seal berdenyut, kaligrafi anggun & efek kelopak bunga jatuh.',
                'img' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/wildflower-pink'),
            ],
            [
                'key' => 'walimatul-khitan',
                'template_key' => 'walimatul-khitan',
                'name' => 'Walimatul Khitan Berkah Sholeh',
                'category' => 'khitanan',
                'category_label' => 'Aqiqah',
                'sub_category' => 'Tasyakuran khitanan',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '✂️ Khitanan • Premium',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Aqiqah',
                'sub_cat' => 'Tasyakuran khitanan',
                'theme_css' => 'theme-khitan-berkah',
                'skin' => 'skin-islamic-dome',
                'desc' => 'Undangan syukuran khitanan islami berbingkai sapphire blue & emas dengan profil jagoan cilik, doa anak sholeh & amplop digital.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/walimatul-khitan'),
            ],
            [
                'key' => 'baby-aqiqah',
                'template_key' => 'baby-aqiqah',
                'name' => 'Sweet Baby Pastel Aqiqah & Khitan',
                'category' => 'aqiqah',
                'category_label' => 'Aqiqah',
                'sub_category' => 'Aqiqah anak',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '👶 Aqiqah & Khitan • Premium',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Aqiqah',
                'sub_cat' => 'Aqiqah anak',
                'theme_css' => 'theme-baby-aqiqah',
                'skin' => 'skin-baby-pastel',
                'desc' => 'Tasyakuran kelahiran & aqiqah buah hati dengan warna pastel lembut, scallop cloud manis, doa penyejuk hati & peta acara.',
                'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/baby-aqiqah'),
            ],
            [
                'key' => 'kids-birthday',
                'template_key' => 'kids-birthday',
                'name' => 'Kids Birthday Party Balon Ceria',
                'category' => 'ultah',
                'category_label' => 'Ulang Tahun',
                'sub_category' => 'Ulang tahun anak',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '🎈 Ultah Anak • Ceria',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Ulang Tahun',
                'sub_cat' => 'Ulang tahun anak',
                'theme_css' => 'theme-kids-party',
                'skin' => 'skin-kids-party',
                'desc' => 'Pesta ulang tahun anak penuh warna ceria, konfeti & balon: perayaan usia si kecil, rundown games seru, tiup lilin bersama sahabat, kado celengan ceria.',
                'img' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/kids-birthday'),
            ],
            [
                'key' => 'wisuda-sarjana',
                'template_key' => 'wisuda-sarjana',
                'name' => 'Wisuda Sarjana Prestasi Emas',
                'category' => 'wisuda',
                'category_label' => 'Wisuda',
                'sub_category' => 'Wisuda kuliah',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '🎓 Wisuda • Prestasi Emas',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Wisuda',
                'sub_cat' => 'Wisuda kuliah',
                'theme_css' => 'theme-golden-birthday',
                'skin' => 'skin-golden-luxury',
                'desc' => 'Perayaan wisuda sarjana berprestasi dengan bingkai aksen emas berkilau, foto toga resmi, jadwal sidang dan peta acara.',
                'img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/wisuda-sarjana'),
            ],
            [
                'key' => 'green-mosque',
                'template_key' => 'green-mosque',
                'name' => 'Green Mosque Syiar & Tabligh Akbar',
                'category' => 'keagamaan',
                'category_label' => 'Keagamaan',
                'sub_category' => 'Pengajian & syiar',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '🕌 Syiar • Green Mosque',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Keagamaan',
                'sub_cat' => 'Pengajian & syiar',
                'theme_css' => 'theme-green-mosque',
                'skin' => 'skin-islamic-dome',
                'desc' => 'Desain tabligh akbar, pengajian umum & maulid nabi bernuansa kubah hijau zamrud: profil muballigh/ustadz, countdown waktu tausiyah, rute masjid & infaq dakwah.',
                'img' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/green-mosque'),
            ],
            [
                'key' => 'reuni-akbar',
                'template_key' => 'reuni-akbar',
                'name' => 'Reuni Akbar Sapphire Silver',
                'category' => 'formal',
                'category_label' => 'Acara Formal',
                'sub_category' => 'Reuni akbar',
                'tier' => 'premium',
                'price' => 'Rp110.000',
                'badge' => '🥂 Reuni • Sapphire Silver',
                'package_val' => 'Paket Premium - Rp110.000',
                'event_cat' => 'Acara Formal',
                'sub_cat' => 'Reuni akbar',
                'theme_css' => 'theme-reuni-akbar',
                'skin' => 'skin-snow-white',
                'desc' => 'Desain temu kangen alumni bernuansa sapphire navy & silver: nostalgia dinding foto polaroid, panduan dress code, countdown jam reuni, konfirmasi kehadiran & donasi kas.',
                'img' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/reuni-akbar'),
            ],

            // ==========================================
            // 3. TIER EKSKLUSIF: Desain Mewah 3D & Adat (Rp180.000)
            // ==========================================
            [
                'key' => 'javanese-royal',
                'template_key' => 'javanese-royal',
                'name' => '3D Javanese Royal Keraton',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '💍 Pernikahan • Royal Adat 3D',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                'theme_css' => 'theme-javanese-royal',
                'skin' => 'skin-javanese-royal',
                'desc' => 'Nuansa kemegahan keraton Jawa klasik dengan animasi gunungan 3D wayang kulit, ornamen batik parang emas, serat ulem berwibawa, dan atmosfer gending halus.',
                'img' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/javanese-royal'),
            ],
            [
                'key' => 'snowfall-white',
                'template_key' => 'snowfall-white',
                'name' => 'SnowFall Minimalist White',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '💍 Pernikahan • Snowfall White',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Minimalis modern',
                'theme_css' => 'theme-snow-white',
                'skin' => 'skin-snow-white',
                'desc' => 'Kemewahan editorial monokrom serba putih dengan animasi partikel salju jatuh (snowfall), tipografi haute couture Cormorant Garamond, dan kemewahan minimalis mutlak.',
                'img' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/snowfall-white'),
            ],
            [
                'key' => 'batak-heritage',
                'template_key' => 'batak-heritage',
                'name' => 'Batak Istimewa Heritage',
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Batak (Toba, Karo, Simalungun)',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '💍 Pernikahan • Batak Heritage',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => 'Pernikahan adat Batak (Toba, Karo, Simalungun)',
                'theme_css' => 'theme-batak-heritage',
                'skin' => 'skin-batak-heritage',
                'desc' => 'Desain pernikahan adat Batak Istimewa bernuansa marun & emas: motif Gorga Batak sakral, tenun ulos ragi hotang, tata ulaon unjuk, pasu-pasu raja, dan gondang sabangunan.',
                'img' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/batak-heritage'),
            ],
            [
                'key' => 'golden-birthday',
                'template_key' => 'golden-birthday',
                'name' => 'Golden Luxury Birthday / Milad',
                'category' => 'ultah',
                'category_label' => 'Ulang Tahun',
                'sub_category' => 'Sweet seventeen',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '🎂 Ulang Tahun • Eksklusif',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Ulang Tahun',
                'sub_cat' => 'Sweet seventeen',
                'theme_css' => 'theme-golden-birthday',
                'skin' => 'skin-golden-luxury',
                'desc' => 'Perayaan sweet seventeen / anniversary / milad bernuansa emas & pesta malam: balon berkilau, foto birthday star, countdown jam pesta, kado digital & ucapan selamat.',
                'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/golden-birthday'),
            ],
            [
                'key' => 'formal-corporate',
                'template_key' => 'formal-corporate',
                'name' => 'Executive Corporate & Grand Opening',
                'category' => 'formal',
                'category_label' => 'Acara Formal',
                'sub_category' => 'Grand opening bisnis',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '🏛️ Acara Formal • Eksklusif',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Acara Formal',
                'sub_cat' => 'Grand opening bisnis',
                'theme_css' => 'theme-snow-white',
                'skin' => 'skin-snow-white',
                'desc' => 'Tata letak eksekutif presisi untuk peresmian bisnis, gala dinner korporat, seminar VIP & temu kangen reuni akbar dengan RSVP mitra strategis.',
                'img' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/formal-corporate'),
            ],
            [
                'key' => 'royal-tasmiyah',
                'template_key' => 'royal-tasmiyah',
                'name' => 'Royal Tasmiyah & Aqiqah Sultan',
                'category' => 'aqiqah',
                'category_label' => 'Aqiqah',
                'sub_category' => 'Tasmiyah & aqiqah',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '👑 Aqiqah • Royal Sultan',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Aqiqah',
                'sub_cat' => 'Tasmiyah & aqiqah',
                'theme_css' => 'theme-javanese-royal',
                'skin' => 'skin-javanese-royal',
                'desc' => 'Kemewahan tasyakuran pemberian nama (tasmiyah) & aqiqah buah hati beraksen zamrud royal & border emas keraton: kaligrafi bismillah megah, doa tasyakuran & bingkisan digital.',
                'img' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/royal-tasmiyah'),
            ],
            [
                'key' => 'walimatus-safar',
                'template_key' => 'walimatus-safar',
                'name' => 'Walimatus Safar Haji & Umrah Mubarok',
                'category' => 'keagamaan',
                'category_label' => 'Keagamaan',
                'sub_category' => 'Walimatus safar haji & umrah',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '🕋 Haji & Umrah • Eksklusif',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Keagamaan',
                'sub_cat' => 'Walimatus safar haji & umrah',
                'theme_css' => 'theme-golden-birthday',
                'skin' => 'skin-golden-luxury',
                'desc' => 'Kemuliaan safar ke Baitullah bernuansa Ka\'bah Kiswah hitam & emas kaligrafi: doa safar mabrur, jadwal manasik & pamitan, titik kumpul & titip doa tanah suci.',
                'img' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/walimatus-safar'),
            ],
            [
                'key' => 'scholar-luxury',
                'template_key' => 'scholar-luxury',
                'name' => 'Valedictorian Scholar Luxury Gala',
                'category' => 'wisuda',
                'category_label' => 'Wisuda',
                'sub_category' => 'Wisuda sarjana & magister',
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '🎓 Wisuda • Valedictorian Gala',
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Wisuda',
                'sub_cat' => 'Wisuda sarjana & magister',
                'theme_css' => 'theme-golden-birthday',
                'skin' => 'skin-golden-luxury',
                'desc' => 'Perayaan wisuda kehormatan ala Ivy League bernuansa midnight navy & emas royal: penganugerahan predikat Cum Laude, galeri sidang skripsi, jadwal gala dinner & amplop tanda kasih.',
                'img' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/scholar-luxury'),
            ],

            // ==========================================
            // 4. TIER KUSTOM: Full Request Desain Sesuai Keinginan (Rp280.000)
            // ==========================================
            [
                'key' => 'custom-request',
                'template_key' => 'custom-request',
                'name' => 'Custom Request Desain Bebas Impianmu',
                'category' => 'semua',
                'category_label' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                'tier' => 'kustom',
                'price' => 'Rp280.000',
                'badge' => '✨ Kustom • Full Request',
                'package_val' => 'Paket Kustom - Rp280.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => '',
                'theme_css' => 'theme-custom-vip',
                'skin' => 'skin-custom-vip',
                'desc' => 'Request tema baru dari nol sesuai keinginan Anda! Tim desainer D\'Karsa siap membuatkan konsep khusus berdasarkan warna, tema adat langka, atau referensi apapun.',
                'img' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80&auto=format&fit=crop',
                'is_custom' => true,
            ],
        ];
    }

    /**
     * Generate Mock / Demo Couple Data khusus untuk template yang dipilih
     */
    public static function getDemoCouple(string $templateKey, array $overrides = []): object
    {
        $key = self::resolveKey($templateKey);
        $weddingDate = Carbon::now()->addMonths(2)->setHour(9)->setMinute(0);

        // Template specific default mock data
        $configs = [
            'chibi-red' => [
                'slug' => 'chibi-red-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'theme' => 'Chibi Red Oriental',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => "LỄ THÀNH HÔN • THE WEDDING",
                'groom_name' => 'Rizky',
                'groom_fullname' => 'Rizky Pratama, S.Kom',
                'groom_birth_order' => 'Putra Pertama',
                'groom_father' => 'Bpk. Hendra Pratama',
                'groom_mother' => 'Ibu Ratna Dewi',
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Amanda',
                'bride_fullname' => 'Amanda Putri, S.Ds',
                'bride_birth_order' => 'Putri Bungsu',
                'bride_father' => 'Bpk. Surya Wijaya',
                'bride_mother' => 'Ibu Laksmi Astuti',
                'bride_city' => 'Bandung',
                'bride_photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Grand Oriental Ballroom, Hotel Mulia Jakarta',
                'quote' => 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8820394821',
                'bank_holder_1' => 'Rizky Pratama',
                'bank_name_2' => 'Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Amanda Putri',
                'gift_address' => 'Jl. Asia Afrika No. 8, Senayan, Jakarta Pusat (Penerima: Amanda / 081234567890)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Akad Nikah / Lễ Vu Quy',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:30 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Masjid Raya Al-Azhar Senayan',
                        'address' => 'Jl. Sisingamangaraja No. 1, Kebayoran Baru, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Resepsi Pernikahan / Lễ Thành Hôn',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:30 WIB',
                        'end_time' => '14:30 WIB',
                        'venue_name' => 'Grand Oriental Ballroom, Hotel Mulia',
                        'address' => 'Jl. Asia Afrika No. 8, Gelora, Senayan, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                    (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 4],
                    (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800', 'sort_order' => 5],
                    (object)['image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800', 'sort_order' => 6],
                ]),
            ],
            'wildflower-pink' => [
                'slug' => 'wildflower-pink-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Elegan, floral, dan islami',
                'theme' => 'Wildflower Pink (Rose Romance)',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => "THE WEDDING CELEBRATION",
                'groom_name' => 'Arkan',
                'groom_fullname' => 'Muhammad Arkan Pratama, B.Eng',
                'groom_birth_order' => 'Putra Kedua',
                'groom_father' => 'Bpk. Ir. Bambang Hermanto',
                'groom_mother' => 'Ibu Hj. Siti Nurhaliza',
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Clarissa',
                'bride_fullname' => 'Clarissa Bella Anggraini, S.Ked',
                'bride_birth_order' => 'Putri Pertama',
                'bride_father' => 'Bpk. Dr. Adrian Setiawan, Sp.A',
                'bride_mother' => 'Ibu drg. Ratna Kusuma',
                'bride_city' => 'Bandung',
                'bride_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'The Botanical Glasshouse, Pine Forest Bandung',
                'quote' => 'Two souls with but a single thought, two hearts that beat as one. Di bawah naungan cinta suci yang diridhoi Allah SWT.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '5420194821',
                'bank_holder_1' => 'Muhammad Arkan',
                'bank_name_2' => 'BSI (Bank Syariah)',
                'bank_account_2' => '7192830192',
                'bank_holder_2' => 'Clarissa Bella',
                'gift_address' => 'The Botanical Villa No. 12, Dago Atas, Bandung (Clarissa / 081987654321)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Sacred Holy Matrimony & Akad',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'The Botanical Pavilion, Glasshouse Dago',
                        'address' => 'Jl. Dago Pakar Timur No. 88, Ciburial, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Wedding Dinner & Reception',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '17:30 WIB',
                        'end_time' => '21:00 WIB',
                        'venue_name' => 'Pine Garden Amphitheatre',
                        'address' => 'The Botanical Glasshouse Resort, Dago Atas, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'javanese-royal' => [
                'slug' => 'javanese-royal-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                'theme' => '3D Javanese Royal Keraton',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => "SERAT ULEM PAHARGYAN",
                'groom_name' => 'Dananjaya',
                'groom_fullname' => 'Raden Mas Dananjaya Wicaksono, M.M',
                'groom_birth_order' => 'Putra Sulung',
                'groom_father' => 'K.R.T. Hardjodipuro',
                'groom_mother' => 'R.Ay. Sri Hastuti',
                'groom_city' => 'Yogyakarta',
                'groom_photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Sekarwangi',
                'bride_fullname' => 'Raden Ajeng Sekarwangi Prabaningrum, S.H',
                'bride_birth_order' => 'Putri Penengah',
                'bride_father' => 'K.R.T. Sasongko Brotodiningrat',
                'bride_mother' => 'R.Ay. Endang Puspitasari',
                'bride_city' => 'Surakarta',
                'bride_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Pendopo Agung Ndalem Mangkubumen, Yogyakarta',
                'quote' => 'Mugi Gusti Kang Murbeng Dumadi tansah paring berkah, karaharjan, lan katentreman ing salebeting mbangun bale wisma.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '0372918291',
                'bank_holder_1' => 'Dananjaya Wicaksono',
                'bank_name_2' => 'Mandiri',
                'bank_account_2' => '1370009827361',
                'bank_holder_2' => 'Sekarwangi Prabaningrum',
                'gift_address' => 'Ndalem Dananjayan, Jl. Wijilan No. 24, Panembahan, Kraton, Yogyakarta (081328901234)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Akad Ijab Kabul & Panggih Adat Jawa',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Gedhong Dalem Pendopo Agung',
                        'address' => 'Ndalem Mangkubumen, Kadipaten, Kraton, Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Resepsi Pahargyan Ageng',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:00 WIB',
                        'end_time' => '14:00 WIB',
                        'venue_name' => 'Sasana Hinggil Dwi Abad',
                        'address' => 'Alun-alun Kidul, Kraton, Kota Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'batak-heritage' => [
                'slug' => 'batak-heritage-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Batak (Toba, Karo, Simalungun)',
                'theme' => 'Batak Istimewa Heritage',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => "HORAS JALA GABE",
                'groom_name' => 'Togu Manurung',
                'groom_fullname' => 'Togu Kevin Manurung, S.T.',
                'groom_nickname' => 'Togu',
                'groom_parents' => 'Bpk. St. Drs. P. Manurung & Ibu E. Boru Hutabarat',
                'groom_birth_order' => 'Anak Panggoaran (Putra Sulung)',
                'groom_father' => 'St. Drs. P. Manurung',
                'groom_mother' => 'E. Boru Hutabarat',
                'groom_city' => 'Medan',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Grace Boru Simanjuntak',
                'bride_fullname' => 'Grace Yohana Boru Simanjuntak, S.E.',
                'bride_nickname' => 'Grace',
                'bride_parents' => 'Bpk. Ir. R. Simanjuntak & Ibu M. Boru Panjaitan',
                'bride_birth_order' => 'Boru Sihasuhut (Putri Sulung)',
                'bride_father' => 'Ir. R. Simanjuntak',
                'bride_mother' => 'M. Boru Panjaitan',
                'bride_city' => 'Balige, Toba',
                'bride_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'wedding_time' => '09:00:00',
                'venue_name' => 'Gedung Mulia & HKBP Sudirman Medan',
                'venue_address' => 'Jl. Jenderal Sudirman No. 32, Medan, Sumatera Utara',
                'maps_url' => 'https://maps.google.com/?q=HKBP+Sudirman+Medan',
                'quote' => 'Jala di ginjang ni sasudena i solukkon hamu ma holong ni roha i, ai i do rahutrahut ni pardengganon. (Kolose 3:14)',
                'quote_source' => 'Poda ni Debata • Kolose 3:14',
                'bank_name' => 'BANK MANDIRI',
                'account_number' => '1060012398745',
                'account_name' => 'Togu Kevin Manurung',
                'bank_name_1' => 'Bank Mandiri',
                'bank_account_1' => '1060012398745',
                'bank_holder_1' => 'Togu Kevin Manurung',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '8210345678',
                'bank_holder_2' => 'Grace Yohana Simanjuntak',
                'gift_address' => 'Kediaman Keluarga Manurung, Jl. Sei Batang Hari No. 45, Babura, Medan Sunggal (081260123456)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Pamasumasuon (Pemberkatan Nikah Kudus)',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'time' => '09:00:00',
                        'venue_name' => 'Gereja HKBP Sudirman Medan',
                        'venue_address' => 'Jl. Jenderal Sudirman No. 32, Medan Kota, Sumatera Utara',
                        'address' => 'Jl. Jenderal Sudirman No. 32, Medan Kota, Sumatera Utara',
                        'maps_url' => 'https://maps.google.com/?q=HKBP+Sudirman+Medan',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Ulaon Unjuk & Pesta Adat Batak',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:30 WIB',
                        'end_time' => '17:30 WIB',
                        'time' => '11:30:00',
                        'venue_name' => 'Wisma Taman Sari Indah / Grand Ballroom',
                        'venue_address' => 'Jl. Kapten Muslim No. 88, Helvetia, Medan',
                        'address' => 'Jl. Kapten Muslim No. 88, Helvetia, Medan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'stories' => collect([
                    (object)['year' => '2021', 'title' => 'Pardomuan Parjolo (Awal Pertemuan)', 'content' => 'Tuhan mempertemukan kami di persekutuan pemuda gereja di kota Medan.'],
                    (object)['year' => '2024', 'title' => 'Marhusip & Patua Hata', 'content' => 'Dengan doa dan restu kedua orang tua serta kerabat Dalihan Na Tolu, kami mengikat janji untuk melangkah ke jenjang pernikahan kudus.'],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'minimalist-floral' => [
                'slug' => 'minimalist-floral-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'theme' => 'Simple Minimalist Floral',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => "THE WEDDING INVITATION",
                'groom_name' => 'Julian',
                'groom_fullname' => 'Julian Mahendra',
                'groom_birth_order' => 'Putra Pertama',
                'groom_father' => 'Bpk. Hendrawan',
                'groom_mother' => 'Ibu Melati',
                'groom_city' => 'Surabaya',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Michelle',
                'bride_fullname' => 'Michelle Anastasia',
                'bride_birth_order' => 'Putri Kedua',
                'bride_father' => 'Bpk. Tanoto',
                'bride_mother' => 'Ibu Fenny',
                'bride_city' => 'Surabaya',
                'bride_photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'The Glass Pavillion, Surabaya',
                'quote' => 'Simplicity is the keynote of all true elegance. We begin our lifetime journey with honest love, respect, and mutual prayer.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '0182749102',
                'bank_holder_1' => 'Julian Mahendra',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '0182749103',
                'bank_holder_2' => 'Michelle Anastasia',
                'gift_address' => 'Jl. Dharmahusada Indah No. 5, Mulyorejo, Surabaya (081234123456)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Akad Nikah / Holy Matrimony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'The Glass Pavilion Surabaya',
                        'address' => 'Jl. Mayjen Sungkono No. 100, Surabaya',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Intimate Luncheon & Reception',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '12:00 WIB',
                        'end_time' => '15:00 WIB',
                        'venue_name' => 'Main Dining Hall, The Glass Pavilion',
                        'address' => 'Jl. Mayjen Sungkono No. 100, Surabaya',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                ]),
            ],
            'snowfall-white' => [
                'slug' => 'snowfall-white-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'theme' => 'SnowFall Minimalist White',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => "THE WEDDING MONOGRAPH",
                'groom_name' => 'Nicholas',
                'groom_fullname' => 'Nicholas Kevin Wijaya, B.A.',
                'groom_birth_order' => 'Putra Pertama',
                'groom_father' => 'Bpk. Ir. Robert Wijaya',
                'groom_mother' => 'Ibu Diana Kusuma',
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Catherine',
                'bride_fullname' => 'Catherine Valerie Hartono, B.Des.',
                'bride_birth_order' => 'Putri Tunggal',
                'bride_father' => 'Bpk. Henry Hartono',
                'bride_mother' => 'Ibu Linda Tan',
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'wedding_time' => '10:00:00',
                'venue_name' => 'The St. Regis Grand Glasshouse',
                'venue_address' => 'Rajawali Place, Jl. H. R. Rasuna Said Kav. B/4, Kuningan, Jakarta Selatan',
                'quote' => 'Like gentle snow falling upon winter silence, our hearts unite in grace and timeless elegance.',
                'quote_source' => 'The Union Journal',
                'cover_photo' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80&auto=format&fit=crop',
                'music_url' => 'wedding-melody.wav',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '7190284910',
                'bank_holder_1' => 'Nicholas Kevin Wijaya',
                'bank_name_2' => 'Mandiri',
                'bank_account_2' => '1260009841234',
                'bank_holder_2' => 'Catherine Valerie',
                'events' => collect([
                    (object)[
                        'title' => 'The Holy Matrimony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'The Glasshouse Chapel, St. Regis Jakarta',
                        'address' => 'Rajawali Place, Kuningan, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Evening Gala & Celebration',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '18:30 WIB',
                        'end_time' => '21:30 WIB',
                        'venue_name' => 'Astor Ballroom, St. Regis Jakarta',
                        'address' => 'Rajawali Place, Kuningan, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                ]),
            ],
            'tahlilan-khusyuk' => [
                'slug' => 'tahlilan-khusyuk-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Doa bersama & tahlilan',
                'theme' => 'Doa Bersama & Tahlilan Khusyuk',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => "UNDANGAN DOA BERSAMA & TAHLIL",
                'groom_name' => 'Almarhum H. Ahmad Dahlan',
                'groom_fullname' => 'Almarhum H. Ahmad Dahlan bin H. Mansyur',
                'groom_birth_order' => 'Sosok yang Didoakan',
                'groom_father' => 'Alm. H. Mansyur',
                'groom_mother' => 'Almh. Hj. Aminah',
                'groom_city' => 'Wafat: 15 Ramadhan 1447 H / 2026 M',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Bani Mansyur',
                'bride_birth_order' => 'Keluarga Penyelenggara',
                'bride_father' => 'Bpk. H. Rahmat',
                'bride_mother' => 'Ibu Hj. Halimah',
                'bride_city' => 'Jakarta Timur',
                'bride_photo' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Alm. H. Ahmad Dahlan & Masjid Jami Al-Hidayah',
                'quote' => 'Semoga Allah SWT mengampuni segala dosa dan khilaf almarhum, menerima seluruh amal ibadahnya, melapangkan kuburnya, dan menempatkannya di Jannatun Na’im.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7129384910',
                'bank_holder_1' => 'Infaq / Sedekah Jariyah Alm. H. Ahmad Dahlan',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '4120394821',
                'bank_holder_2' => 'H. Rahmat (Perwakilan Keluarga)',
                'gift_address' => 'Kediaman Keluarga, Jl. Condet Raya No. 17, Kramat Jati, Jakarta Timur (081298765432)',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Shalat Jenazah / Doa Bersama Ba\'da Ashar',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '17:00 WIB',
                        'venue_name' => 'Masjid Jami\' Al-Hidayah',
                        'address' => 'Jl. Condet Raya No. 17, Kramat Jati, Jakarta Timur',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Pembacaan Surah Yasin, Tahlil & Tausiyah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:30 WIB (Ba\'da Isya)',
                        'end_time' => '21:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Alm. H. Ahmad Dahlan',
                        'address' => 'Jl. Condet Raya No. 17, Kramat Jati, Jakarta Timur',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800', 'sort_order' => 2],
                ]),
            ],
            'wisuda-sarjana' => [
                'slug' => 'wisuda-sarjana-demo',
                'category' => 'Wisuda',
                'sub_category' => 'Wisuda kuliah',
                'theme' => 'Wisuda Sarjana Prestasi Emas',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'GRADUATION CELEBRATION',
                'groom_name' => 'Farhan Maulana, S.Kom.',
                'groom_fullname' => 'Farhan Maulana, S.Kom. (Cum Laude)',
                'groom_birth_order' => 'Wisudawan Berprestasi',
                'groom_father' => 'Bpk. Hendra Maulana',
                'groom_mother' => 'Ibu Dra. Siti Aminah',
                'groom_city' => 'Universitas Indonesia • Fakultas Ilmu Komputer (IPK 3.89)',
                'groom_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Bpk. Hendra Maulana',
                'bride_birth_order' => 'Keluarga Pendamping',
                'bride_father' => 'Bpk. Hendra Maulana',
                'bride_mother' => 'Ibu Dra. Siti Aminah',
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Balairung Utama Universitas Indonesia & Grand Mercure Hall',
                'quote' => 'Alhamdulillah atas karunia gelar Sarjana Komputer (S.Kom). Terima kasih tak terhingga untuk kedua orang tua, dosen, dan sahabat tercinta yang selalu membimbing dan mendoakan.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8271039481',
                'bank_holder_1' => 'Farhan Maulana',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Farhan Maulana',
                'gift_address' => 'Kediaman Keluarga, Jl. Salihara No. 24, Pasar Minggu, Jakarta Selatan (081287654321)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Sidang Terbuka & Pelantikan Wisuda Sarjana',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Balairung Utama Kampus UI',
                        'address' => 'Kampus UI Depok, Jawa Barat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tasyakuran & Ramah Tamah Keluarga',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '13:00 WIB',
                        'end_time' => '16:00 WIB',
                        'venue_name' => 'Grand Mercure Ballroom C',
                        'address' => 'Jl. TB Simatupang No. 8, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800', 'sort_order' => 3],
                ]),
            ],
            'golden-birthday' => [
                'slug' => 'golden-birthday-demo',
                'category' => 'Ulang Tahun',
                'sub_category' => 'Sweet seventeen / Ulang tahun anak',
                'theme' => 'Golden Luxury Birthday / Milad',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'BIRTHDAY CELEBRATION',
                'groom_name' => 'Jessica Olivia',
                'groom_fullname' => 'Jessica Olivia Santoso',
                'groom_birth_order' => 'Glam in Black & Gold',
                'groom_father' => 'Bpk. Hendra Santoso',
                'groom_mother' => 'Ibu Maria Christine',
                'groom_city' => 'Sweet 17th Birthday Bash',
                'groom_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Sahabat & Keluarga',
                'bride_fullname' => 'Keluarga Besar Bpk. Hendra Santoso',
                'bride_birth_order' => 'Keluarga Penyelenggara',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Sky Lounge Rooftop Cafe, Jakarta',
                'quote' => 'Count your age by friends, not years. Count your life by smiles, not tears. Terima kasih sudah menjadi sahabat dan keluarga terbaik dalam hidupku!',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '5210984712',
                'bank_holder_1' => 'Jessica Olivia Santoso',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Jessica Olivia Santoso',
                'gift_address' => 'Kediaman Keluarga, Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan (081298765432)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Welcoming & Red Carpet Photo',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '18:30 WIB',
                        'end_time' => '19:30 WIB',
                        'venue_name' => 'Sky Lounge Photo Booth Area',
                        'address' => 'Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Dinner, Games & Candle Blowing Ceremony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:30 WIB',
                        'end_time' => '22:00 WIB',
                        'venue_name' => 'Sky Lounge Main Hall',
                        'address' => 'Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800', 'sort_order' => 2],
                    (object)['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 3],
                ]),
            ],
            'baby-aqiqah' => [
                'slug' => 'baby-aqiqah-demo',
                'category' => 'Aqiqah',
                'sub_category' => 'Aqiqah & Walimatul Khitan',
                'theme' => 'Sweet Baby Pastel Aqiqah & Khitan',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'TASYAKURAN AQIQAH & KHITAN',
                'groom_name' => 'Dania Azkadina Putri',
                'groom_fullname' => 'Dania Azkadina Putri',
                'groom_birth_order' => 'Putri Pertama Tercinta',
                'groom_father' => 'Bpk. Rizky Pratama',
                'groom_mother' => 'Ibu Nabila Safitri',
                'groom_city' => 'Lahir: 15 Maret 2026 • 3.2 Kg',
                'groom_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Bpk. Rizky & Ibu Nabila',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Bandung',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Bpk. Rizky & Ibu Nabila, Bandung',
                'quote' => 'Semoga Allah memberkahimu atas buah hati yang dianugerahkan kepadamu, engkau bersyukur kepada Sang Maha Pemberi, dan ia tumbuh dewasa dalam ketaatan dan kebaikan.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7182930491',
                'bank_holder_1' => 'Rizky Pratama (Tabungan Buah Hati)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '4120938172',
                'bank_holder_2' => 'Rizky Pratama',
                'gift_address' => 'Jl. Buah Batu No. 45, Bandung (081234567890)',
                'music_url' => 'lullaby-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Prosesi Tasmiyah & Cukur Rambut',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Buah Batu No. 45, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Doa Bersama, Tasyakuran & Santap Siang',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:30 WIB',
                        'end_time' => '13:00 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Buah Batu No. 45, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
                ]),
            ],
            'formal-corporate' => [
                'slug' => 'formal-corporate-demo',
                'category' => 'Acara Formal',
                'sub_category' => 'Grand opening & gala dinner',
                'theme' => 'Executive Corporate & Grand Opening',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'CORDIALLY INVITED',
                'groom_name' => 'PT Nusantara Digital Solusindo',
                'groom_fullname' => 'PT Nusantara Digital Solusindo',
                'groom_birth_order' => 'Formal Executive / Black Tie',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Office Tower Thamrin Nine Lt. 42, Jakarta Pusat',
                'groom_photo' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Mitra & Rekan Bisnis',
                'bride_fullname' => 'Dewan Direksi & Komisaris',
                'bride_birth_order' => 'Manajemen',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Pusat',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Grand Ballroom Ritz-Carlton Pacific Place, Jakarta',
                'quote' => 'Bersama melangkah menuju era inovasi dan transformasi digital berkelanjutan. Kami mengundang seluruh rekan bisnis dan mitra strategis dalam peresmian kantor pusat kami.',
                'bank_name_1' => 'Bank Mandiri',
                'bank_account_1' => '1240098765432',
                'bank_holder_1' => 'PT Nusantara Digital Solusindo',
                'gift_address' => 'Office Tower Thamrin Nine Lt. 42, Jl. M.H. Thamrin No. 9, Jakarta Pusat (081188990011)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Press Conference & Ribbon Cutting Ceremony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Lobby Tower Thamrin Nine',
                        'address' => 'Jl. M.H. Thamrin No. 9, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Executive Gala Dinner & Strategic Networking',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '18:30 WIB',
                        'end_time' => '21:30 WIB',
                        'venue_name' => 'Grand Ballroom Ritz-Carlton',
                        'address' => 'SCBD Lot 28, Jl. Jend. Sudirman, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800', 'sort_order' => 2],
                ]),
            ],
            'halal-bihalal' => [
                'slug' => 'halal-bihalal-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Halal bihalal',
                'theme' => 'Ketupat Raya Silaturahmi & Halal Bihalal',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'SILATURAHMI & HALAL BIHALAL',
                'groom_name' => 'Keluarga Besar Bpk. H. Rahmat',
                'groom_fullname' => 'Keluarga Besar Bpk. H. Rahmat & Ibu Hj. Siti',
                'groom_birth_order' => 'Tuan Rumah Silaturahmi',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Bani Mansyur',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Keluarga & Gedung Serbaguna Al-Ikhlas',
                'quote' => 'Taqabbalallahu Minna Wa Minkum. Menyambung tali kasih, mempererat persaudaraan, dan saling memaafkan dengan hati yang tulus di hari yang penuh kemenangan.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7129384910',
                'bank_holder_1' => 'H. Rahmat (Tali Asih Silaturahmi)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '4120394821',
                'bank_holder_2' => 'H. Rahmat',
                'gift_address' => 'Kediaman Bpk. H. Rahmat, Jl. Kebagusan Raya No. 45, Pasar Minggu, Jakarta Selatan (081298765432)',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Tausiyah Silaturahmi & Doa Bersama',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Aula Masjid Jami Al-Ikhlas',
                        'address' => 'Jl. Kebagusan Raya No. 45, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Ramah Tamah & Santap Bersama Ketupat',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:30 WIB',
                        'end_time' => '13:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Besar Bpk. H. Rahmat',
                        'address' => 'Jl. Kebagusan Raya No. 45, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=800', 'sort_order' => 2],
                ]),
            ],
            'walimatul-khitan' => [
                'slug' => 'walimatul-khitan-demo',
                'category' => 'Aqiqah',
                'sub_category' => 'Tasyakuran khitanan',
                'theme' => 'Walimatul Khitan Berkah Sholeh',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'TASYAKURAN WALIMATUL KHITAN',
                'groom_name' => 'Muhammad Rayyan Al-Ghifari',
                'groom_fullname' => 'Muhammad Rayyan Al-Ghifari',
                'groom_birth_order' => 'Putra Pertama Tercinta',
                'groom_father' => 'Bpk. Irfan Maulana',
                'groom_mother' => 'Ibu Nisa Rahmawati',
                'groom_city' => 'Bandung',
                'groom_photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Bpk. Irfan & Ibu Nisa',
                'bride_birth_order' => 'Keluarga Penyelenggara',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Bandung',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Keluarga & Gedung Pertemuan Al-Muhajirin',
                'quote' => 'Semoga ananda tumbuh menjadi putra yang sholeh, tangguh, berbakti kepada kedua orang tua, cerdas, dan bermanfaat bagi agama serta sesama.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7192830192',
                'bank_holder_1' => 'Irfan Maulana (Tabungan Rayyan)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '0182749102',
                'bank_holder_2' => 'Irfan Maulana',
                'gift_address' => 'Jl. Gegerkalong Hilir No. 18, Sukasari, Kota Bandung (081320987654)',
                'music_url' => 'lullaby-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Doa Bersama & Tausiyah Khitanan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Bpk. Irfan',
                        'address' => 'Jl. Gegerkalong Hilir No. 18, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tasyakuran & Santap Siang Ramah Tamah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:30 WIB',
                        'end_time' => '13:00 WIB',
                        'venue_name' => 'Gedung Pertemuan Al-Muhajirin',
                        'address' => 'Jl. Gegerkalong Hilir No. 20, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=800', 'sort_order' => 2],
                ]),
            ],
            'kids-birthday' => [
                'slug' => 'kids-birthday-demo',
                'category' => 'Ulang Tahun',
                'sub_category' => 'Ulang tahun anak',
                'theme' => 'Kids Birthday Party Balon Ceria',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'KIDS BIRTHDAY PARTY',
                'groom_name' => 'Rayyan Arsakha',
                'groom_fullname' => 'Rayyan Arsakha Pratama (Turning 5)',
                'groom_birth_order' => 'The Birthday Boy',
                'groom_father' => 'Papa Irfan',
                'groom_mother' => 'Mama Nisa',
                'groom_city' => 'Pesta Balon Ceria',
                'groom_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Sahabat & Teman Ceria',
                'bride_fullname' => 'Sahabat & Teman TK Al-Azhar',
                'bride_birth_order' => 'Sahabat Ceria',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Kota Bandung',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Funworld Kids Party Room & Cafe, Mall Grand Galaxy',
                'quote' => 'Ayo teman-teman tersayang, datang ya ke pesta ulang tahunku! Kita main games bareng, tiup lilin, makan kue lezat, dan bawa pulang goodie bag seru!',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '5210984712',
                'bank_holder_1' => 'Irfan Maulana (Celengan Ceria Rayyan)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Irfan Maulana',
                'gift_address' => 'Jl. Gegerkalong Hilir No. 18, Sukasari, Bandung (081320987654)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Games Seru & Pertunjukan Sulap Ceria',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '16:30 WIB',
                        'venue_name' => 'Funworld Kids Party Room',
                        'address' => 'Mall Grand Galaxy Lt. 2, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tiup Lilin, Potong Kue & Goodie Bag',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '16:30 WIB',
                        'end_time' => '18:00 WIB',
                        'venue_name' => 'Funworld Dining Cafe',
                        'address' => 'Mall Grand Galaxy Lt. 2, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
                ]),
            ],
            'syukuran-rumah' => [
                'slug' => 'syukuran-rumah-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Tasyakuran',
                'theme' => 'Tasyakuran & Doa Rumah Baru',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'TASYAKURAN RUMAH BARU',
                'groom_name' => 'Keluarga Hendra Pratama',
                'groom_fullname' => 'Keluarga Bpk. Hendra Pratama & Ibu Ratna Dewi',
                'groom_birth_order' => 'Tuan Rumah Kediaman Baru',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Cluster Gardenia Hills Blok C-12, BSD City',
                'groom_photo' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Hendra & Ratna',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Tangerang Selatan',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Baru Keluarga Hendra Pratama',
                'quote' => 'Baitii Jannatii - Rumahku Surgaku. Semoga rumah baru ini senantiasa dilimpahi keberkahan rezeki, ketenteraman keluarga, dan rahmat dari Allah SWT.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '4120394821',
                'bank_holder_1' => 'Hendra Pratama',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Hendra Pratama',
                'gift_address' => 'Cluster Gardenia Hills Blok C-12, Jl. BSD Boulevard, Tangerang Selatan (081298765432)',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Pengajian Khataman & Doa Selamat',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:30 WIB (Ba\'da Isya)',
                        'end_time' => '20:30 WIB',
                        'venue_name' => 'Kediaman Baru Hendra Pratama',
                        'address' => 'Cluster Gardenia Hills Blok C-12, BSD City',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Potong Tumpeng & Ramah Tamah Warga',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '20:30 WIB',
                        'end_time' => '22:00 WIB',
                        'venue_name' => 'Kediaman Baru Hendra Pratama',
                        'address' => 'Cluster Gardenia Hills Blok C-12, BSD City',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800', 'sort_order' => 2],
                ]),
            ],
            'cheerful-birthday' => [
                'slug' => 'cheerful-birthday-demo',
                'category' => 'Ulang Tahun',
                'sub_category' => 'Ulang tahun anak & remaja',
                'theme' => 'Cheerful Confetti Birthday',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'BIRTHDAY CELEBRATION',
                'groom_name' => 'Arkan',
                'groom_fullname' => 'Muhammad Arkan Pratama',
                'groom_birth_order' => 'Ulang Tahun ke-7',
                'groom_father' => 'Bpk. Rizky Pratama',
                'groom_mother' => 'Ibu Nabila Safitri',
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Sahabat & Teman',
                'bride_fullname' => 'Teman-Teman Sekolah & Sahabat Ceria',
                'bride_birth_order' => 'Teman',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kidz Playground & Family Cafe, Kemang',
                'quote' => 'Bertambah satu tahun usiaku penuh tawa, cerita, dan kebahagiaan. Yuk teman-teman hadir dan seru-seruan bareng di pesta ulang tahunku!',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8820194821',
                'bank_holder_1' => 'Rizky Pratama (Tabungan Ceria Arkan)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Rizky Pratama',
                'gift_address' => 'Jl. Kemang Timur No. 12, Mampang Prapatan, Jakarta Selatan (081234567890)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Games Seru & Pentas Badut Sulap',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '16:30 WIB',
                        'venue_name' => 'Kidz Playground Hall',
                        'address' => 'Jl. Kemang Timur No. 12, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tiup Lilin, Potong Kue & Pembagian Goodie Bag',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '16:30 WIB',
                        'end_time' => '18:00 WIB',
                        'venue_name' => 'Kidz Playground Hall',
                        'address' => 'Jl. Kemang Timur No. 12, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800', 'sort_order' => 2],
                ]),
            ],
            'little-prince' => [
                'slug' => 'little-prince-demo',
                'category' => 'Aqiqah',
                'sub_category' => 'Aqiqah & kelahiran buah hati',
                'theme' => 'Little Prince Nordic Aqiqah',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'TASYAKURAN AQIQAH & TASMIYAH',
                'groom_name' => 'Rayyan',
                'groom_fullname' => 'Muhammad Rayyan Al-Fatih',
                'groom_birth_order' => 'Putra Pertama Tercinta',
                'groom_father' => 'Bpk. Fajar Ramadhan',
                'groom_mother' => 'Ibu Anisa Rahmawati',
                'groom_city' => 'Lahir di Bandung • 10 Maret 2026 • 3.3 Kg',
                'groom_photo' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Fajar & Anisa',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Bandung',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Bpk. Fajar & Ibu Anisa',
                'quote' => 'Semoga Allah memberkahi buah hati kami, menjadikannya anak yang sholeh, berbakti kepada orang tua, cerdas, serta bermanfaat bagi nusa dan bangsa.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7182930491',
                'bank_holder_1' => 'Fajar Ramadhan (Tabungan Rayyan)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '4120938172',
                'bank_holder_2' => 'Fajar Ramadhan',
                'gift_address' => 'Jl. Dago Asri No. 15, Dago, Coblong, Bandung (081234567890)',
                'music_url' => 'lullaby-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Cukur Rambut & Doa Tasmiyah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Dago Asri No. 15, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tasyakuran Aqiqah & Santap Siang',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:30 WIB',
                        'end_time' => '13:00 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Dago Asri No. 15, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
                ]),
            ],
            'royal-tasmiyah' => [
                'slug' => 'royal-tasmiyah-demo',
                'category' => 'Aqiqah',
                'sub_category' => 'Tasmiyah & aqiqah',
                'theme' => 'Royal Tasmiyah & Aqiqah Sultan',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'MAJELIS TASMIYAH & AQIQAH SULTAN',
                'groom_name' => 'Sultan Daniswara',
                'groom_fullname' => 'Raden Mas Sultan Daniswara Al-Ghifari',
                'groom_birth_order' => 'Putra Pertama Tercinta',
                'groom_father' => 'Bpk. Dr. H. Danang Wibowo',
                'groom_mother' => 'Ibu Hj. Sekar Arum, M.Si',
                'groom_city' => 'Lahir di Yogyakarta • 15 Januari 2026 • 3.5 Kg',
                'groom_photo' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Keraton',
                'bride_fullname' => 'Keluarga Besar Trah Wibowokusumo',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Yogyakarta',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Pendopo Agung Ndalem Heritage, Kotagede',
                'quote' => 'Bismillahir Rahmanir Rahim. Rasa syukur tak terhingga atas anugerah putra tercinta. Semoga menjadi penerus risalah mulia, berbudi luhur, berilmu amaliyah dan beramal ilmiah.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7192830491',
                'bank_holder_1' => 'Danang Wibowo (Tali Kasih Ananda)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '8820193821',
                'bank_holder_2' => 'Danang Wibowo',
                'gift_address' => 'Ndalem Danang Wibowo, Jl. Kemasan No. 24, Kotagede, Yogyakarta (081234567890)',
                'music_url' => 'lullaby-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Prosesi Marhaba, Cukur Rambut & Tasmiyah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'Pendopo Agung Ndalem Heritage',
                        'address' => 'Jl. Kemasan No. 24, Kotagede, Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tasyakuran Santap Siang & Jamuan Tamu',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:30 WIB',
                        'end_time' => '14:00 WIB',
                        'venue_name' => 'Gedung Bale Ndalem Kotagede',
                        'address' => 'Jl. Kemasan No. 24, Kotagede, Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 2],
                ]),
            ],
            'green-mosque' => [
                'slug' => 'green-mosque-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Pengajian & syiar',
                'theme' => 'Green Mosque Syiar & Tabligh Akbar',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'TABLIGH AKBAR & TAUSIYAH SYIAR ISLAM',
                'groom_name' => 'K.H. Ahmad Syarifuddin, M.A.',
                'groom_fullname' => 'K.H. Ahmad Syarifuddin, M.A. (Pengasuh Ponpes)',
                'groom_birth_order' => 'Penceramah / Muballigh Utama',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'DKM Masjid Raya Al-Hikmah & Pengurus Pengajian',
                'groom_photo' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'DKM & Jamaah',
                'bride_fullname' => 'Dewan Kemakmuran Masjid Raya Al-Hikmah',
                'bride_birth_order' => 'Panitia Penyelenggara',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Masjid Raya Al-Hikmah, Kebayoran Baru',
                'quote' => 'Menuntut ilmu adalah kewajiban bagi setiap muslim. Mari rapatkan shaf, eratkan ukhuwah islamiyah, dan raih keberkahan dalam majelis ilmu yang penuh rahmat.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7192038492',
                'bank_holder_1' => 'DKM Masjid Raya Al-Hikmah (Infaq & Sedekah)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'DKM Masjid Raya Al-Hikmah',
                'gift_address' => 'Sekretariat DKM Masjid Raya Al-Hikmah, Jl. Kebayoran Baru No. 10, Jakarta Selatan (081298765432)',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Shalat Berjamaah, Dzikir & Pembacaan Sholawat',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:00 WIB (Ba\'da Isya)',
                        'end_time' => '20:00 WIB',
                        'venue_name' => 'Ruang Utama Masjid Raya Al-Hikmah',
                        'address' => 'Jl. Kebayoran Baru No. 10, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Tausiyah Akbar & Doa Keselamatan Bangsa',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '20:00 WIB',
                        'end_time' => '22:00 WIB',
                        'venue_name' => 'Ruang Utama Masjid Raya Al-Hikmah',
                        'address' => 'Jl. Kebayoran Baru No. 10, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 2],
                ]),
            ],
            'walimatus-safar' => [
                'slug' => 'walimatus-safar-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Walimatus safar haji & umrah',
                'theme' => 'Walimatus Safar Haji & Umrah Mubarok',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'WALIMATUS SAFAR HAJI & UMRAH',
                'groom_name' => 'Bpk. H. Bambang Hermanto',
                'groom_fullname' => 'Bpk. H. Bambang Hermanto & Ibu Hj. Siti Nurhaliza',
                'groom_birth_order' => 'Calon Jamaah Haji Kloter 14 JKS',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Ibu Hj. Siti Nurhaliza',
                'bride_fullname' => 'Ibu Hj. Siti Nurhaliza',
                'bride_birth_order' => 'Calon Jamaah Haji',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Selatan',
                'bride_photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=600&q=80&auto=format&fit=crop',
                'cover_photo' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Bpk. Bambang Hermanto & Aula Al-Kautsar',
                'quote' => 'Labbaik Allahumma Labbaik, Labbaika Laa Syariika Laka Labbaik. Mohon dimaafkan segala khilaf lahir batin, dan doakan kami agar diberi kesehatan, kemudahan, serta kembali membawa haji yang mabrur.',
                'bank_name_1' => 'BSI (Bank Syariah)',
                'bank_account_1' => '7192830192',
                'bank_holder_1' => 'Bambang Hermanto (Titip Doa & Sedekah Safar)',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '5420194821',
                'bank_holder_2' => 'Bambang Hermanto',
                'gift_address' => 'Jl. Tebet Barat Dalam No. 34, Tebet, Jakarta Selatan (081288990011)',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Pengajian Manasik, Dzikir & Tausiyah Pelepasan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'Aula Al-Kautsar',
                        'address' => 'Jl. Tebet Barat Raya No. 12, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Ramah Tamah Pamitan & Doa Mabrur',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:00 WIB',
                        'end_time' => '13:00 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Tebet Barat Dalam No. 34, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 2],
                ]),
            ],
            'modern-graduate' => [
                'slug' => 'modern-graduate-demo',
                'category' => 'Wisuda',
                'sub_category' => 'Wisuda sarjana',
                'theme' => 'Modern Graduate Editorial',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'GRADUATION COMMENCEMENT',
                'groom_name' => 'Faris',
                'groom_fullname' => 'Faris Al-Ghifari, S.T.',
                'groom_birth_order' => 'Sarjana Teknik Informatika • IPK 3.92 (Cum Laude)',
                'groom_father' => 'Bpk. Ir. Ahmad Sudirman',
                'groom_mother' => 'Ibu Dra. Ratna Kusuma',
                'groom_city' => 'Universitas Indonesia, Depok',
                'groom_photo' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga & Sahabat',
                'bride_fullname' => 'Keluarga Besar Bpk. Ahmad Sudirman',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Depok',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Balairung Universitas Indonesia, Kampus UI Depok',
                'quote' => 'Sebuah akhir yang menjadi awal babak baru pengabdian. Terima kasih kepada orang tua, dosen, dan sahabat tercinta yang selalu membersamai perjuangan ini.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '7120194821',
                'bank_holder_1' => 'Faris Al-Ghifari (Apresiasi Sarjana)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Faris Al-Ghifari',
                'gift_address' => 'Jl. Margonda Raya No. 100, Pondok Cina, Beji, Depok (081234567890)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Upacara Wisuda & Sidang Terbuka Senat UI',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'Balairung UI Kampus Depok',
                        'address' => 'Kampus Baru UI, Jl. Margonda Raya, Depok',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Sesi Foto Bersama & Syukuran Wisuda',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '13:00 WIB',
                        'end_time' => '16:00 WIB',
                        'venue_name' => 'Plaza Rektorat Universitas Indonesia',
                        'address' => 'Kampus Baru UI, Pondok Cina, Depok',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 2],
                ]),
            ],
            'scholar-luxury' => [
                'slug' => 'scholar-luxury-demo',
                'category' => 'Wisuda',
                'sub_category' => 'Wisuda sarjana & magister',
                'theme' => 'Valedictorian Scholar Luxury Gala',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'VALEDICTORIAN COMMENCEMENT GALA',
                'groom_name' => 'Kresna',
                'groom_fullname' => 'Kresna Adiputra, M.B.A., B.Eng',
                'groom_birth_order' => 'Valedictorian • Master of Business Administration',
                'groom_father' => 'Bpk. Prof. Dr. Ir. Gunawan Adiputra',
                'groom_mother' => 'Ibu Dr. Maya Kartika, Sp.A',
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Adiputra',
                'bride_fullname' => 'Keluarga Besar Prof. Gunawan Adiputra',
                'bride_birth_order' => 'Keluarga',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Grand Ballroom The Ritz-Carlton Mega Kuningan, Jakarta',
                'quote' => 'Excellence is not an act, but a habit. Syukur mendalam atas diraihnya gelar kehormatan magister bisnis dengan predikat tertinggi. Mari rayakan bersama!',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8820194821',
                'bank_holder_1' => 'Kresna Adiputra (Scholar Fellowship)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Kresna Adiputra',
                'gift_address' => 'Kuningan Suites Tower A No. 18, Jl. Setiabudi Selatan No. 1, Jakarta Selatan (081234567890)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Master Commencement Ceremony & Hooding',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'Plenary Hall JCC Senayan',
                        'address' => 'Jl. Gatot Subroto No. 1, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Valedictorian Gala Dinner & Celebration',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '18:30 WIB',
                        'end_time' => '21:30 WIB',
                        'venue_name' => 'Grand Ballroom The Ritz-Carlton Mega Kuningan',
                        'address' => 'Jl. DR. Ide Anak Agung Gde Agung Kav. E.1.1, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 2],
                ]),
            ],
            'clean-seminar' => [
                'slug' => 'clean-seminar-demo',
                'category' => 'Acara Formal',
                'sub_category' => 'Seminar & workshop',
                'theme' => 'Clean Tech Seminar & Workshop',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'NATIONAL TECH SUMMIT & WORKSHOP',
                'groom_name' => 'Indonesia AI Summit 2026',
                'groom_fullname' => 'Dr. Aris Sudarsono (Keynote Speaker)',
                'groom_birth_order' => 'Principal AI Researcher & Founder TechLabs',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Jakarta Convention Center (JCC) Senayan',
                'groom_photo' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Panitia Penyelenggara',
                'bride_fullname' => 'Komite Indonesia Digital Foundation',
                'bride_birth_order' => 'Organizing Committee',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta Pusat',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Auditorium Utama Menara Mandiri, Jakarta',
                'quote' => 'Membangun ekosistem teknologi masa depan yang inklusif, etis, dan berdampak nyata. Bergabunglah bersama 500+ delegasi dan pemimpin industri digital.',
                'bank_name_1' => 'Bank Mandiri',
                'bank_account_1' => '1240098765432',
                'bank_holder_1' => 'Yayasan Indonesia Digital Summit',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '8820394821',
                'bank_holder_2' => 'Yayasan Indonesia Digital Summit',
                'gift_address' => 'Sekretariat Summit, Menara Mandiri Lt. 12, Jl. Jend. Sudirman Kav. 54-55, Jakarta (081188990011)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Keynote Presentation: Future of AI Ecosystem',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Auditorium Utama Menara Mandiri',
                        'address' => 'Jl. Jend. Sudirman Kav. 54-55, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Hands-on Technical Workshop & Networking',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '13:00 WIB',
                        'end_time' => '16:00 WIB',
                        'venue_name' => 'Workshop Room 1 & 2, Menara Mandiri',
                        'address' => 'Jl. Jend. Sudirman Kav. 54-55, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 2],
                ]),
            ],
            'reuni-akbar' => [
                'slug' => 'reuni-akbar-demo',
                'category' => 'Acara Formal',
                'sub_category' => 'Reuni akbar',
                'theme' => 'Reuni Akbar Sapphire Silver',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'REUNI AKBAR & GALA DINNER',
                'groom_name' => 'Alumni SMAN 1 Angkatan 2016',
                'groom_fullname' => 'Satu Dekade Merajut Cerita, Merawat Persaudaraan',
                'groom_birth_order' => 'Dresscode: Navy Blue & Touch of Silver',
                'groom_father' => null,
                'groom_mother' => null,
                'groom_city' => 'Jakarta Selatan',
                'groom_photo' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Panitia Reuni',
                'bride_fullname' => 'Panitia Reuni Akbar Satu Dekade SMAN 1',
                'bride_birth_order' => 'Panitia',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Jakarta',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Grand Ballroom Hotel Mulia Senayan, Jakarta',
                'quote' => 'Waktu berlalu begitu cepat, namun kenangan putih abu-abu takkan pernah pudar. Mari kembali bertegur sapa, bertukar cerita, dan merajut kembali tali silaturahmi.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8820394821',
                'bank_holder_1' => 'Dimas Prasetyo (Kas Reuni & Donasi Alumni)',
                'bank_name_2' => 'Bank Mandiri',
                'bank_account_2' => '1370019283741',
                'bank_holder_2' => 'Dimas Prasetyo',
                'gift_address' => 'Sekretariat Alumni SMAN 1, Jl. Budi Utomo No. 7, Jakarta Pusat (081298765432)',
                'music_url' => 'celebration-melody.wav',
                'events' => collect([
                    (object)[
                        'title' => 'Registrasi, Nostalgia Photo Booth & Welcome Drink',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '16:00 WIB',
                        'end_time' => '18:00 WIB',
                        'venue_name' => 'Foyer Grand Ballroom Hotel Mulia',
                        'address' => 'Jl. Asia Afrika No. 8, Gelora, Senayan, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object)[
                        'title' => 'Gala Dinner, Awarding & Live Music Performance',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:00 WIB',
                        'end_time' => '22:00 WIB',
                        'venue_name' => 'Grand Ballroom Hotel Mulia Senayan',
                        'address' => 'Jl. Asia Afrika No. 8, Gelora, Senayan, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object)['image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800', 'sort_order' => 1],
                    (object)['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 2],
                ]),
            ],
        ];

        $data = $configs[$key] ?? $configs['chibi-red'];
        
        // Apply overrides (e.g. from query params or form data)
        foreach ($overrides as $k => $v) {
            if ($v !== null && $v !== '') {
                $data[$k] = $v;
            }
        }

        // Harmonize bank attributes across different template conventions
        if (!empty($data['bank_name_1'])) {
            $data['bank_name'] = $data['bank_name_1'];
        } elseif (!empty($data['bank_name'])) {
            $data['bank_name_1'] = $data['bank_name'];
        }

        if (!empty($data['bank_account_1'])) {
            $data['account_number'] = $data['bank_account_1'];
        } elseif (!empty($data['account_number'])) {
            $data['bank_account_1'] = $data['account_number'];
        }

        if (!empty($data['bank_holder_1'])) {
            $data['account_name'] = $data['bank_holder_1'];
        } elseif (!empty($data['account_name'])) {
            $data['bank_holder_1'] = $data['account_name'];
        }

        // Harmonize date, venue, and address from custom events override if specifically provided
        if (!empty($overrides['events']) && count($overrides['events']) > 0) {
            $firstEv = is_array($overrides['events']) ? (object)$overrides['events'][0] : $overrides['events']->first();
            if ($firstEv) {
                if (empty($overrides['wedding_date']) && !empty($firstEv->date)) {
                    try {
                        $data['wedding_date'] = \Carbon\Carbon::parse($firstEv->date);
                    } catch (\Exception $e) {}
                }
                if (!empty($firstEv->start_time)) {
                    $data['wedding_time'] = $firstEv->start_time;
                }
                if (empty($overrides['venue_name']) && !empty($firstEv->venue_name)) {
                    $data['venue_name'] = $firstEv->venue_name;
                }
                if (!empty($firstEv->address)) {
                    $data['venue_address'] = $firstEv->address;
                    $data['address'] = $firstEv->address;
                }
                if (!empty($firstEv->maps_url)) {
                    $data['maps_url'] = $firstEv->maps_url;
                }
            }
        }

        // Dynamically format groom_parents & bride_parents
        $data['groom_parents'] = self::formatParentNames(
            $data['groom_father'] ?? null,
            $data['groom_mother'] ?? null,
            $data['groom_parents'] ?? 'Bapak & Ibu Keluarga Mempelai Pria'
        );

        $data['bride_parents'] = self::formatParentNames(
            $data['bride_father'] ?? null,
            $data['bride_mother'] ?? null,
            $data['bride_parents'] ?? 'Bapak & Ibu Keluarga Mempelai Wanita'
        );

        // Return as object matching Eloquent Couple interface
        return (object)$data;
    }

    /**
     * Generate Mock Guest Object for Demo Preview
     */
    public static function getDemoGuest(?string $guestName = null): object
    {
        $name = !empty($guestName) ? $guestName : 'Bapak / Ibu / Saudara/i';
        return (object)[
            'name' => $name,
            'slug' => Str::slug($name),
            'category' => 'Tamu Kehormatan',
            'quota' => 2,
        ];
    }

    /**
     * Generate Sample Wishes
     */
    public static function getDemoWishes(): \Illuminate\Support\Collection
    {
        return collect([
            (object)[
                'sender_name' => 'Budi Santoso & Keluarga',
                'name' => 'Budi Santoso & Keluarga',
                'message' => 'Selamat dan sukses selalu! Semoga senantiasa dipenuhi keberkahan, rahmat, dan kebahagiaan.',
                'created_at' => Carbon::now()->subHours(2),
            ],
            (object)[
                'sender_name' => 'Dinda & Rekan Sahabat',
                'name' => 'Dinda & Rekan Sahabat',
                'message' => 'Desain undangannya cantik sekali! Turut berbahagia dan semoga acaranya berjalan lancar.',
                'created_at' => Carbon::now()->subHours(5),
            ],
            (object)[
                'sender_name' => 'Keluarga Besar Bani Sastro',
                'name' => 'Keluarga Besar Bani Sastro',
                'message' => 'Barakallahu fiikum. Turut berbahagia dan insyaAllah kami hadir mendoakan.',
                'created_at' => Carbon::now()->subDay(),
            ],
        ]);
    }


}

