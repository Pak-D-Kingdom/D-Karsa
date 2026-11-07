<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TemplateManager
{
    /**
     * Definisi seluruh template desain digital D'Karsa
     */
    /** Lokasi view template mengikuti struktur folder templates/{bab}/{sub-bab}/. */
    public static function viewPath(string $key): string
    {
        $map = config('template-paths', []);

        return $map[$key] ?? ('templates.'.$key);
    }

    public static function all(): array
    {
        $base = [
            'chibi-red' => [
                'key' => 'chibi-red',
                'name' => 'Chibi Red Oriental',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Pernikahan',
                'blade' => self::viewPath('chibi-red'),
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
                'blade' => self::viewPath('wildflower-pink'),
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
                'blade' => self::viewPath('javanese-royal'),
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
                'blade' => self::viewPath('batak-heritage'),
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
                'blade' => self::viewPath('minimalist-floral'),
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
                'blade' => self::viewPath('snowfall-white'),
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
                'blade' => self::viewPath('tahlilan-khusyuk'),
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
                'blade' => self::viewPath('wisuda-sarjana'),
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
                'blade' => self::viewPath('golden-birthday'),
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
                'blade' => self::viewPath('baby-aqiqah'),
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
                'blade' => self::viewPath('formal-corporate'),
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
                'blade' => self::viewPath('halal-bihalal'),
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
                'blade' => self::viewPath('walimatul-khitan'),
                'desc' => 'Undangan tasyakuran walimatul khitan bernuansa sapphire blue & emas: profil jagoan cilik berbaju koko dan peci, jadwal syukuran & doa selamat, serta tali asih anak sholeh.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=1200&q=80&auto=format&fit=crop',
                'badge' => '✂️ Khitanan • Premium',
                'demo_route' => '/demo/walimatul-khitan',
            ],
            'walimatul-khitan-sahaja' => [
                'key' => 'walimatul-khitan-sahaja',
                'name' => 'Walimatul Khitan Sahaja Berkah',
                'package' => 'Paket Basic - Rp50.000',
                'tier' => 'basic',
                'category' => 'Aqiqah',
                'blade' => self::viewPath('walimatul-khitan-sahaja'),
                'desc' => 'Desain tasyakuran walimatul khitan bersih, hangat & islami bernuansa Sage Green & Emas Lembut: doa anak sholeh, profil jagoan cilik, jadwal walimah, Google Maps dan amplop tali asih.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1200&q=80&auto=format&fit=crop',
                'badge' => '✂️ Khitanan • Basic Sahaja',
                'demo_route' => '/demo/walimatul-khitan-sahaja',
            ],
            'kids-birthday' => [
                'key' => 'kids-birthday',
                'name' => 'Kids Birthday Party Balon Ceria',
                'package' => 'Paket Premium - Rp110.000',
                'tier' => 'premium',
                'category' => 'Ulang Tahun',
                'blade' => self::viewPath('kids-birthday'),
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
                'blade' => self::viewPath('syukuran-rumah'),
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
                'blade' => self::viewPath('cheerful-birthday'),
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
                'blade' => self::viewPath('little-prince'),
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
                'blade' => self::viewPath('royal-tasmiyah'),
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
                'blade' => self::viewPath('green-mosque'),
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
                'blade' => self::viewPath('walimatus-safar'),
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
                'blade' => self::viewPath('modern-graduate'),
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
                'blade' => self::viewPath('scholar-luxury'),
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
                'blade' => self::viewPath('clean-seminar'),
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
                'blade' => self::viewPath('reuni-akbar'),
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
                'blade' => self::viewPath('chibi-red'),
                'desc' => 'Request tema baru dari nol sesuai keinginan Anda! Tim desainer D\'Karsa siap membuatkan konsep khusus berdasarkan warna, tema adat langka, atau referensi apapun.',
                'img' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80&auto=format&fit=crop',
                'badge' => '✨ Kustom • Full Request',
                'demo_route' => '/buat-undangan?theme=Custom+Request&package=Paket+Kustom+-+Rp280.000',
            ],
        ];

        // Adat Jawa suite 01–10 (master: docs/template-registry.json)
        $modern = self::adatJawaTemplates() + self::eventTemplates();
        $all = $base + $modern;

        // 179 template Stitch = suite modern (4 paket). Sisanya template legacy lama: route tetap hidup,
        // tetapi tidak ditawarkan di katalog/builder supaya website hanya menjual 179 × 4 paket.
        foreach ($all as $key => $tpl) {
            $all[$key]['legacy'] = ! isset($modern[$key]) && $key !== 'custom-request';
            $all[$key]['tiers'] = ['basic', 'premium', 'eksklusif', 'kustom'];
        }

        return $all;
    }

    /**
     * Metadata 10 template Adat Jawa (slot 01–10) — sumber tunggal untuk katalog & demo.
     *
     * @return array<int, array<string, string>>
     */
    private static function adatJawaMeta(): array
    {
        return [
            1 => ['key' => 'jawa-keraton-agung', 'name' => 'Keraton Agung', 'sub' => 'Minimalis Modern', 'palette' => 'Ocean Blue', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Batik Kawung & Pilar Keraton', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            2 => ['key' => 'jawa-sekar-kedhaton', 'name' => 'Sekar Kedhaton', 'sub' => 'Geometris', 'palette' => 'Clean White', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Geometri Kawung & Gebyok Putih', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            3 => ['key' => 'jawa-gunungan-emas', 'name' => 'Gunungan Emas', 'sub' => 'Minimalis Modern', 'palette' => 'Dusty Rose', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'diagonal', 'gallery' => 'column', 'motif' => 'Truntum & Roncean Melati', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            4 => ['key' => 'jawa-batik-parang', 'name' => 'Batik Parang', 'sub' => 'Geometris', 'palette' => 'Sage Green', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'mask', 'gallery' => 'mosaic', 'motif' => 'Geometri Truntum & Parang', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            5 => ['key' => 'jawa-gebyok-ukir', 'name' => 'Gebyok Ukir', 'sub' => 'Minimalis Modern', 'palette' => 'Rose Gold', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Gunungan Rose Gold & Kawung', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            6 => ['key' => 'jawa-melati-kraton', 'name' => 'Melati Kraton', 'sub' => 'Geometris', 'palette' => 'Blueberry Milk', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'glass', 'gallery' => 'column', 'motif' => 'Geometri Kawung & Melati', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            7 => ['key' => 'jawa-sogan-klasik', 'name' => 'Sogan Klasik', 'sub' => 'Minimalis Modern', 'palette' => 'Yellow Sunshine', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'arch', 'gallery' => 'collage', 'motif' => 'Parang Sogan & Pilar Keraton', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            8 => ['key' => 'jawa-wijaya-kusuma', 'name' => 'Wijaya Kusuma', 'sub' => 'Geometris', 'palette' => 'Plum Velvet', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Geometri Wijaya Kusuma', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            9 => ['key' => 'jawa-sekar-jagad', 'name' => 'Sekar Jagad', 'sub' => 'Minimalis Modern', 'palette' => 'Monochrome', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'diagonal', 'gallery' => 'column', 'motif' => 'Parang Grayscale & Wayang', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            10 => ['key' => 'jawa-prada-ayu', 'name' => 'Prada Ayu', 'sub' => 'Geometris', 'palette' => 'Coral & Peach', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'mask', 'gallery' => 'collage', 'motif' => 'Geometri Kawung & Ukiran Prada', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            11 => ['key' => 'jawa-arctic-frost', 'name' => 'Arctic Frost', 'sub' => 'Minimalis Modern', 'palette' => 'Arctic Frost', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Gunungan Salju & Kawung', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            12 => ['key' => 'jawa-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Geometris', 'palette' => 'Purple Dream', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'medallion', 'gallery' => 'column', 'motif' => 'Geometri Kawung & Ungu', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            13 => ['key' => 'jawa-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Minimalis Modern', 'palette' => 'Burgundy Wine', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'diagonal', 'gallery' => 'collage', 'motif' => 'Gebyok Ukir & Parang', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            14 => ['key' => 'jawa-ruby-luxe', 'name' => 'Ruby Luxe', 'sub' => 'Geometris', 'palette' => 'Ruby Luxe', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'mask', 'gallery' => 'mosaic', 'motif' => 'Truntum & Prada Emas', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            15 => ['key' => 'jawa-pastel-mix', 'name' => 'Pastel Mix', 'sub' => 'Minimalis Modern', 'palette' => 'Pastel Mix', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Kawung Pastel & Melati', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            16 => ['key' => 'jawa-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Geometris', 'palette' => 'Citrus Pop', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'glass', 'gallery' => 'collage', 'motif' => 'Geometri Kawung & Daun', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            17 => ['key' => 'jawa-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Minimalis Modern', 'palette' => 'Soft Pink', 'culture' => 'jawa', 'gate' => 'gunungan', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Wayang Rose Gold & Melati', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            18 => ['key' => 'jawa-midnight-navy', 'name' => 'Midnight Navy', 'sub' => 'Geometris', 'palette' => 'Midnight Navy', 'culture' => 'jawa', 'gate' => 'gebyok', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Parang Emas & Kawung', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            19 => ['key' => 'sunda-mega-mendung', 'name' => 'Mega Mendung', 'sub' => 'Rustic', 'palette' => 'Sage Green', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'arch', 'gallery' => 'column', 'motif' => 'Mega Mendung & Anyaman Bambu', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            20 => ['key' => 'sunda-siger-wangi', 'name' => 'Siger Wangi', 'sub' => 'Korporat Profesional', 'palette' => 'Rose Gold', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'medallion', 'gallery' => 'mosaic', 'motif' => 'Siger & Bulu Merak', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            21 => ['key' => 'sunda-parahyangan', 'name' => 'Parahyangan', 'sub' => 'Rustic', 'palette' => 'Blueberry Milk', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Mega Mendung & Anyaman Bambu', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            22 => ['key' => 'sunda-kembang-peuteuy', 'name' => 'Kembang Peuteuy', 'sub' => 'Korporat', 'palette' => 'Yellow Sunshine', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'glass', 'gallery' => 'column', 'motif' => 'Siger & Kembang Peuteuy', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            23 => ['key' => 'sunda-ratu-sunda', 'name' => 'Ratu Sunda', 'sub' => 'Rustic', 'palette' => 'Plum Velvet', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'arch', 'gallery' => 'collage', 'motif' => 'Siger & Kain Songket', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            24 => ['key' => 'sunda-angklung-kasih', 'name' => 'Angklung Kasih', 'sub' => 'Korporat', 'palette' => 'Monochrome', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Bambu Angklung & Mega Mendung', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            25 => ['key' => 'sunda-priangan-lembut', 'name' => 'Priangan Lembut', 'sub' => 'Rustic', 'palette' => 'Coral & Peach', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'diagonal', 'gallery' => 'column', 'motif' => 'Mega Mendung & Melati Priangan', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            26 => ['key' => 'sunda-sangkuriang', 'name' => 'Sangkuriang', 'sub' => 'Korporat', 'palette' => 'Arctic Frost', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'mask', 'gallery' => 'collage', 'motif' => 'Siger & Siluet Tangkuban Parahu', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            27 => ['key' => 'sunda-dayang-sumbi', 'name' => 'Dayang Sumbi', 'sub' => 'Rustic', 'palette' => 'Purple Dream', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'rects', 'gallery' => 'mosaic', 'motif' => 'Mega Mendung & Bulu Merak', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            28 => ['key' => 'sunda-citarum-ayu', 'name' => 'Citarum Ayu', 'sub' => 'Korporat', 'palette' => 'Burgundy Wine', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'glass', 'gallery' => 'column', 'motif' => 'Siger & Tenun Citarum', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            29 => ['key' => 'sunda-bunga-kantil', 'name' => 'Bunga Kantil', 'sub' => 'Rustic', 'palette' => 'Ruby Luxe', 'culture' => 'sunda', 'gate' => 'megamendung', 'hero' => 'arch', 'gallery' => 'collage', 'motif' => 'Kembang Kantil & Mega Mendung', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            30 => ['key' => 'sunda-cireundeu-asih', 'name' => 'Cireundeu Asih', 'sub' => 'Korporat', 'palette' => 'Pastel Mix', 'culture' => 'sunda', 'gate' => 'siger', 'hero' => 'medallion', 'gallery' => 'mosaic', 'motif' => 'Siger & Anyaman Cireundeu', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            31 => ['key' => 'minang-rumah-gadang', 'name' => 'Rumah Gadang', 'sub' => 'Geometris', 'palette' => 'Burgundy Wine', 'culture' => 'minang', 'gate' => 'gonjong', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Gonjong & Songket Burgundy', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            32 => ['key' => 'minang-gonjong-amah', 'name' => 'Gonjong Amah', 'sub' => 'Minimalis Modern', 'palette' => 'Ruby Luxe', 'culture' => 'minang', 'gate' => 'songket', 'hero' => 'glass', 'gallery' => 'collage', 'motif' => 'Suntiang & Ukiran Emas', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            33 => ['key' => 'minang-suntiang-permata', 'name' => 'Suntiang Permata', 'sub' => 'Geometris', 'palette' => 'Pastel Mix', 'culture' => 'minang', 'gate' => 'gonjong', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Songket Geometris & Pucuak Rabuang', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            34 => ['key' => 'minang-songket-padang', 'name' => 'Songket Padang', 'sub' => 'Minimalis Modern', 'palette' => 'Citrus Pop', 'culture' => 'minang', 'gate' => 'songket', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Gonjong & Songket Citrus', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            35 => ['key' => 'minang-ranah-minang', 'name' => 'Ranah Minang', 'sub' => 'Geometris', 'palette' => 'Soft Pink', 'culture' => 'minang', 'gate' => 'gonjong', 'hero' => 'diagonal', 'gallery' => 'column', 'motif' => 'Ukiran Minang & Bulu Suntiang', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            36 => ['key' => 'minang-bundo-kanduang', 'name' => 'Bundo Kanduang', 'sub' => 'Minimalis Modern', 'palette' => 'Midnight Navy', 'culture' => 'minang', 'gate' => 'songket', 'hero' => 'mask', 'gallery' => 'mosaic', 'motif' => 'Songket Tenun & Gonjong Malam', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            37 => ['key' => 'minang-siti-nurbaya', 'name' => 'Siti Nurbaya', 'sub' => 'Geometris', 'palette' => 'Cyber Neon', 'culture' => 'minang', 'gate' => 'gonjong', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Gonjong Neon & Kisi Songket', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            38 => ['key' => 'minang-singgalang', 'name' => 'Singgalang', 'sub' => 'Minimalis Modern', 'palette' => 'Bold Red', 'culture' => 'minang', 'gate' => 'songket', 'hero' => 'glass', 'gallery' => 'column', 'motif' => 'Ukiran Merah & Tanduk Gonjong', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            39 => ['key' => 'minang-marawa-pusako', 'name' => 'Marawa Pusako', 'sub' => 'Geometris', 'palette' => 'Mint Fresh', 'culture' => 'minang', 'gate' => 'gonjong', 'hero' => 'arch', 'gallery' => 'collage', 'motif' => 'Songket Mint & Anyaman Bambu', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            40 => ['key' => 'minang-anak-daro', 'name' => 'Anak Daro', 'sub' => 'Minimalis Modern', 'palette' => 'Ocean Blue', 'culture' => 'minang', 'gate' => 'songket', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Gonjong Samudra & Songket Perak', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            41 => ['key' => 'nusantara-tenun-ikat', 'name' => 'Tenun Ikat', 'sub' => 'Minimalis Modern', 'palette' => 'Dusty Rose', 'culture' => 'nusantara', 'gate' => 'ikat', 'hero' => 'arch', 'gallery' => 'column', 'motif' => 'Tenun Ikat & Gerbang Ukir', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            42 => ['key' => 'nusantara-ulos-hela', 'name' => 'Ulos Hela', 'sub' => 'Geometris', 'palette' => 'Sage Green', 'culture' => 'nusantara', 'gate' => 'carved', 'hero' => 'medallion', 'gallery' => 'collage', 'motif' => 'Ulos Hela & Ukir Batak', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            43 => ['key' => 'nusantara-nusantara-raya', 'name' => 'Nusantara Raya', 'sub' => 'Minimalis Modern', 'palette' => 'Rose Gold', 'culture' => 'nusantara', 'gate' => 'ikat', 'hero' => 'diagonal', 'gallery' => 'mosaic', 'motif' => 'Songket & Lengkung Klasik', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            44 => ['key' => 'nusantara-wastra-timur', 'name' => 'Wastra Timur', 'sub' => 'Geometris', 'palette' => 'Blueberry Milk', 'culture' => 'nusantara', 'gate' => 'carved', 'hero' => 'mask', 'gallery' => 'column', 'motif' => 'Wastra Timur & Kisi Tenun', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            45 => ['key' => 'nusantara-toraja-tallu', 'name' => 'Toraja Tallu', 'sub' => 'Minimalis Modern', 'palette' => 'Yellow Sunshine', 'culture' => 'nusantara', 'gate' => 'ikat', 'hero' => 'rects', 'gallery' => 'collage', 'motif' => 'Ukiran Toraja & Tenun Tallu', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            46 => ['key' => 'nusantara-dayak-ranying', 'name' => 'Dayak Ranying', 'sub' => 'Geometris', 'palette' => 'Plum Velvet', 'culture' => 'nusantara', 'gate' => 'carved', 'hero' => 'glass', 'gallery' => 'mosaic', 'motif' => 'Motif Dayang & Songket Ungu', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            47 => ['key' => 'nusantara-bunga-cengkeh', 'name' => 'Bunga Cengkeh', 'sub' => 'Minimalis Modern', 'palette' => 'Monochrome', 'culture' => 'nusantara', 'gate' => 'ikat', 'hero' => 'arch', 'gallery' => 'filmstrip', 'motif' => 'Tenun Ikat Monokrom', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            48 => ['key' => 'nusantara-sabu-raijua', 'name' => 'Sabu Raijua', 'sub' => 'Geometris', 'palette' => 'Coral & Peach', 'culture' => 'nusantara', 'gate' => 'carved', 'hero' => 'medallion', 'gallery' => 'collage', 'motif' => 'Ukir Sabu & Tenun Raijua', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            49 => ['key' => 'minimalis-aria', 'name' => 'Aria', 'sub' => 'Korporat', 'palette' => 'Citrus Pop', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'diagonal', 'gallery' => 'mosaic', 'motif' => 'Kaca Arsitektural', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            50 => ['key' => 'minimalis-bening', 'name' => 'Bening', 'sub' => 'Rustic', 'palette' => 'Soft Pink', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'mask', 'gallery' => 'filmstrip', 'motif' => 'Kertas Deckle & Botani Kering', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            51 => ['key' => 'minimalis-nadi', 'name' => 'Nadi', 'sub' => 'Korporat', 'palette' => 'Midnight Navy', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'rects', 'gallery' => 'column', 'motif' => 'Kaca Arsitektural & Monogram', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            52 => ['key' => 'minimalis-ruang', 'name' => 'Ruang', 'sub' => 'Rustic', 'palette' => 'Cyber Neon', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'glass', 'gallery' => 'mosaic', 'motif' => 'Kertas Robek & Neon Botani', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            53 => ['key' => 'minimalis-kanvas', 'name' => 'Kanvas', 'sub' => 'Korporat', 'palette' => 'Bold Red', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'arch', 'gallery' => 'filmstrip', 'motif' => 'Kaca Metalik & Grid Editorial', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            54 => ['key' => 'minimalis-selaras', 'name' => 'Selaras', 'sub' => 'Rustic', 'palette' => 'Mint Fresh', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'medallion', 'gallery' => 'column', 'motif' => 'Kertas Deckle & Eucalyptus', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            55 => ['key' => 'minimalis-lumen', 'name' => 'Lumen', 'sub' => 'Korporat', 'palette' => 'Ocean Blue', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'diagonal', 'gallery' => 'collage', 'motif' => 'Kaca Buram & Garis Metalik', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            56 => ['key' => 'minimalis-sudut', 'name' => 'Sudut', 'sub' => 'Rustic', 'palette' => 'Clean White', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'mask', 'gallery' => 'filmstrip', 'motif' => 'Kertas Katun Putih & Bunga Kering', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            57 => ['key' => 'minimalis-grafik', 'name' => 'Grafik', 'sub' => 'Korporat', 'palette' => 'Dusty Rose', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'rects', 'gallery' => 'column', 'motif' => 'Kaca & Bingkai Taupe', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            58 => ['key' => 'minimalis-sunyi', 'name' => 'Sunyi', 'sub' => 'Rustic', 'palette' => 'Sage Green', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'glass', 'gallery' => 'collage', 'motif' => 'Kertas Parchment & Ranting Zaitun', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            59 => ['key' => 'minimalis-kaca', 'name' => 'Kaca', 'sub' => 'Korporat', 'palette' => 'Rose Gold', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Bingkai Rose-Gold & Kaca', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            60 => ['key' => 'minimalis-aksara', 'name' => 'Aksara', 'sub' => 'Rustic', 'palette' => 'Blueberry Milk', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'medallion', 'gallery' => 'column', 'motif' => 'Kertas Krim & Bunga Lavender', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            61 => ['key' => 'minimalis-monoline', 'name' => 'Monoline', 'sub' => 'Korporat', 'palette' => 'Yellow Sunshine', 'culture' => 'modern', 'gate' => 'glass', 'hero' => 'diagonal', 'gallery' => 'collage', 'motif' => 'Kaca & Monogram Editorial', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            62 => ['key' => 'minimalis-rona', 'name' => 'Rona', 'sub' => 'Rustic', 'palette' => 'Plum Velvet', 'culture' => 'modern', 'gate' => 'paper', 'hero' => 'mask', 'gallery' => 'mosaic', 'motif' => 'Beludru Plum & Botani Beri', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            63 => ['key' => 'floral-rosalind', 'name' => 'Rosalind', 'sub' => 'Pastel', 'palette' => 'Clean White', 'culture' => 'floral', 'gate' => 'pastel', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Mawar Putih & Baby’s Breath', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            64 => ['key' => 'floral-peony-putih', 'name' => 'Peony Putih', 'sub' => 'Islami', 'palette' => 'Dusty Rose', 'culture' => 'floral', 'gate' => 'islami', 'hero' => 'glass', 'gallery' => 'collage', 'motif' => 'Lengkung Islami & Garland Mawar', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            65 => ['key' => 'floral-taman-ayu', 'name' => 'Taman Ayu', 'sub' => 'Pastel', 'palette' => 'Sage Green', 'culture' => 'floral', 'gate' => 'pastel', 'hero' => 'arch', 'gallery' => 'mosaic', 'motif' => 'Eucalyptus & Peony Gading', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            66 => ['key' => 'floral-anggrek-bulan', 'name' => 'Anggrek Bulan', 'sub' => 'Islami', 'palette' => 'Rose Gold', 'culture' => 'floral', 'gate' => 'islami', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Kisi Arabesque & Mawar Blush', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            67 => ['key' => 'floral-bunga-kertas', 'name' => 'Bunga Kertas', 'sub' => 'Pastel', 'palette' => 'Blueberry Milk', 'culture' => 'floral', 'gate' => 'pastel', 'hero' => 'diagonal', 'gallery' => 'column', 'motif' => 'Hortensia Biru-Violet', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            68 => ['key' => 'floral-magnolia', 'name' => 'Magnolia', 'sub' => 'Islami', 'palette' => 'Yellow Sunshine', 'culture' => 'floral', 'gate' => 'islami', 'hero' => 'mask', 'gallery' => 'mosaic', 'motif' => 'Geometri Floral Keemasan', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            69 => ['key' => 'floral-lavender-fields', 'name' => 'Lavender Fields', 'sub' => 'Pastel', 'palette' => 'Plum Velvet', 'culture' => 'floral', 'gate' => 'pastel', 'hero' => 'rects', 'gallery' => 'filmstrip', 'motif' => 'Lilac & Anggrek Ungu', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            70 => ['key' => 'floral-sakura-lembut', 'name' => 'Sakura Lembut', 'sub' => 'Islami', 'palette' => 'Monochrome', 'culture' => 'floral', 'gate' => 'islami', 'hero' => 'glass', 'gallery' => 'column', 'motif' => 'Tinta Botani Hitam-Putih', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            71 => ['key' => 'floral-daisy-pagi', 'name' => 'Daisy Pagi', 'sub' => 'Pastel', 'palette' => 'Coral & Peach', 'culture' => 'floral', 'gate' => 'pastel', 'hero' => 'arch', 'gallery' => 'collage', 'motif' => 'Peony Coral & Kertas Krem', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            72 => ['key' => 'floral-rosewood', 'name' => 'Rosewood', 'sub' => 'Islami', 'palette' => 'Arctic Frost', 'culture' => 'floral', 'gate' => 'islami', 'hero' => 'medallion', 'gallery' => 'filmstrip', 'motif' => 'Bunga Es & Lengkung Perak', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            73 => ['key' => 'islami-ar-rum-21', 'name' => 'Ar-Rum 21', 'sub' => 'Islami', 'palette' => 'Burgundy Wine', 'culture' => 'islami', 'gate' => 'mashrabiya', 'hero' => 'arch', 'gallery' => 'column', 'motif' => 'Mashrabiya Burgundy & Kaligrafi', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            74 => ['key' => 'islami-nurul-iman', 'name' => 'Nurul Iman', 'sub' => 'Pastel', 'palette' => 'Ruby Luxe', 'culture' => 'islami', 'gate' => 'dome', 'hero' => 'medallion', 'gallery' => 'collage', 'motif' => 'Geometri Emas & Mawar Ruby', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            75 => ['key' => 'islami-baarakallahu', 'name' => 'Baarakallahu', 'sub' => 'Islami', 'palette' => 'Pastel Mix', 'culture' => 'islami', 'gate' => 'mashrabiya', 'hero' => 'diagonal', 'gallery' => 'mosaic', 'motif' => 'Lengkung Maroko Pastel', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            76 => ['key' => 'islami-misykah', 'name' => 'Misykah', 'sub' => 'Pastel', 'palette' => 'Citrus Pop', 'culture' => 'islami', 'gate' => 'dome', 'hero' => 'mask', 'gallery' => 'column', 'motif' => 'Kisi Geometris Citrus', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            77 => ['key' => 'islami-mihrab-cinta', 'name' => 'Mihrab Cinta', 'sub' => 'Islami', 'palette' => 'Soft Pink', 'culture' => 'islami', 'gate' => 'mashrabiya', 'hero' => 'rects', 'gallery' => 'collage', 'motif' => 'Kubah Rose-Gold & Mashrabiya', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            78 => ['key' => 'islami-salam-khusyuk', 'name' => 'Salam Khusyuk', 'sub' => 'Pastel', 'palette' => 'Midnight Navy', 'culture' => 'islami', 'gate' => 'dome', 'hero' => 'glass', 'gallery' => 'mosaic', 'motif' => 'Bintang Malam & Kisi Emas', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            79 => ['key' => 'islami-zahra-and-ahmad', 'name' => 'Zahra & Ahmad', 'sub' => 'Islami', 'palette' => 'Cyber Neon', 'culture' => 'islami', 'gate' => 'mashrabiya', 'hero' => 'arch', 'gallery' => 'filmstrip', 'motif' => 'Geometri Neon Sakral', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            80 => ['key' => 'islami-barokah-jannah', 'name' => 'Barokah Jannah', 'sub' => 'Pastel', 'palette' => 'Bold Red', 'culture' => 'islami', 'gate' => 'dome', 'hero' => 'medallion', 'gallery' => 'collage', 'motif' => 'Bingkai Merah & Rose Pastel', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
            81 => ['key' => 'akad-dua-janji', 'name' => 'Dua Janji', 'sub' => 'Minimalis Modern', 'palette' => 'Rose Gold', 'culture' => 'dual', 'gate' => 'seal', 'hero' => 'diagonal', 'gallery' => 'mosaic', 'motif' => 'Panel Ganda Akad–Resepsi', 'cover' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80'],
            82 => ['key' => 'akad-sakral-and-syahdu', 'name' => 'Sakral & Syahdu', 'sub' => 'Geometris', 'palette' => 'Blueberry Milk', 'culture' => 'dual', 'gate' => 'seal', 'hero' => 'mask', 'gallery' => 'filmstrip', 'motif' => 'Panel Periwinkle & Segel', 'cover' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80'],
            83 => ['key' => 'akad-satu-hari-dua-acara', 'name' => 'Satu Hari Dua Acara', 'sub' => 'Minimalis Modern', 'palette' => 'Yellow Sunshine', 'culture' => 'dual', 'gate' => 'seal', 'hero' => 'rects', 'gallery' => 'column', 'motif' => 'Dua Acara Satu Hari', 'cover' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&q=80'],
            84 => ['key' => 'akad-khitbah', 'name' => 'Khitbah', 'sub' => 'Geometris', 'palette' => 'Plum Velvet', 'culture' => 'dual', 'gate' => 'seal', 'hero' => 'glass', 'gallery' => 'mosaic', 'motif' => 'Panel Plum & Segel Lilin', 'cover' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1200&q=80'],
            85 => ['key' => 'akad-akad-and-resepsi', 'name' => 'Akad & Resepsi', 'sub' => 'Minimalis Modern', 'palette' => 'Monochrome', 'culture' => 'dual', 'gate' => 'seal', 'hero' => 'arch', 'gallery' => 'filmstrip', 'motif' => 'Panel Monokrom Editorial', 'cover' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=1200&q=80'],
            86 => ['key' => 'internasional-maison', 'name' => 'Maison', 'sub' => 'Bold Modern', 'palette' => 'Earth Tone', 'culture' => 'intl', 'gate' => 'editorial', 'hero' => 'rects', 'gallery' => 'column', 'motif' => 'Pintu Majalah Terracotta', 'cover' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1200&q=80'],
            87 => ['key' => 'internasional-editorial-vows', 'name' => 'Editorial Vows', 'sub' => 'Tradisional Nusantara', 'palette' => 'Lavender Haze', 'culture' => 'intl', 'gate' => 'fusion', 'hero' => 'glass', 'gallery' => 'collage', 'motif' => 'Songket Lavender & Bingkai Editorial', 'cover' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?w=1200&q=80'],
            88 => ['key' => 'internasional-nusantara-fusion', 'name' => 'Nusantara Fusion', 'sub' => 'Bold Modern', 'palette' => 'Chocolate Luxe', 'culture' => 'intl', 'gate' => 'editorial', 'hero' => 'arch', 'gallery' => 'filmstrip', 'motif' => 'Pintu Cokelat & Champagne', 'cover' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&q=80'],
            89 => ['key' => 'internasional-the-grand-affair', 'name' => 'The Grand Affair', 'sub' => 'Tradisional Nusantara', 'palette' => 'Orange Energy', 'culture' => 'intl', 'gate' => 'fusion', 'hero' => 'medallion', 'gallery' => 'column', 'motif' => 'Ukir Tenun Oranye & Bingkai Modern', 'cover' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&q=80'],
            90 => ['key' => 'internasional-bilingual-bliss', 'name' => 'Bilingual Bliss', 'sub' => 'Bold Modern', 'palette' => 'Cherry Blossom', 'culture' => 'intl', 'gate' => 'editorial', 'hero' => 'diagonal', 'gallery' => 'collage', 'motif' => 'Pintu Sakura & Geometri Putih', 'cover' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=1200&q=80'],
        ];
    }

    /**
     * Entri katalog TemplateManager::all() untuk 20 template Adat Jawa & Sunda.
     */
    private static function adatJawaTemplates(): array
    {
        $themes = [];

        foreach (self::adatJawaMeta() as $num => $t) {
            $themes[$t['key']] = [
                'key' => $t['key'],
                'name' => $t['name'].(trim((string) $t['name']) === trim((string) $t['palette']) ? '' : ' ('.$t['palette'].')'),
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => 'Pernikahan',
                'blade' => self::viewPath($t['key']),
                'desc' => sprintf(
                    '%s %02d — %s: %s, gate %s, hero frame %s, galeri %s, palette %s. Lengkap dengan akad & resepsi terpisah, countdown, peta, RSVP, buku tamu, dan kado digital.',
                    ($t['culture'] ?? 'jawa') === 'sunda' ? 'Adat Sunda' : 'Adat Jawa',
                    $num,
                    $t['sub'],
                    $t['motif'],
                    $t['gate'] === 'gebyok' ? 'Gebyok ukir' : ($t['gate'] === 'siger' ? 'Siger Sunda' : ($t['gate'] === 'megamendung' ? 'Mega Mendung' : 'Gunungan wayang')),
                    $t['hero'],
                    $t['gallery'],
                    $t['palette']
                ),
                'img' => $t['cover'],
                'default_cover' => $t['cover'],
                'badge' => '💍 Pernikahan • '.self::adatCultureLabel($t['culture'] ?? 'jawa').' '.sprintf('%02d', $num),
                'demo_route' => '/demo/'.$t['key'],
            ];
        }

        return $themes;
    }

    /**
     * Entri katalog builder untuk 10 template Adat Jawa.
     */
    /**
     * Label budaya untuk katalog/demo (Jawa, Sunda, Minang).
     */
    private static function adatCultureLabel(?string $culture): string
    {
        return match ($culture) {
            'sunda' => 'Adat Sunda',
            'minang' => 'Adat Minang',
            'nusantara' => 'Adat Nusantara',
            'modern' => 'Minimalis Modern',
            'floral' => 'Elegan & Floral',
            'islami' => 'Islami',
            'dual' => 'Akad & Resepsi',
            'intl' => 'Internasional',
            default => 'Adat Jawa',
        };
    }

    private static function adatJawaCatalogThemes(): array
    {
        $themes = [];

        foreach (self::adatJawaMeta() as $num => $t) {
            $themes[] = [
                'key' => $t['key'],
                'template_key' => $t['key'],
                'name' => $t['name'].' — '.self::adatCultureLabel($t['culture'] ?? 'jawa').' '.sprintf('%02d', $num),
                'category' => 'pernikahan',
                'category_label' => 'Pernikahan',
                'sub_category' => self::adatCultureLabel($t['culture'] ?? 'jawa').' '.$t['sub'],
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => '💍 Pernikahan • '.self::adatCultureLabel($t['culture'] ?? 'jawa').' '.sprintf('%02d', $num),
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => 'Pernikahan',
                'sub_cat' => self::adatCultureLabel($t['culture'] ?? 'jawa'),
                'theme_css' => 'theme-javanese-royal',
                'skin' => 'skin-javanese-royal',
                'desc' => sprintf('%s %s — %s, palette %s, hero frame %s, galeri %s.', self::adatCultureLabel($t['culture'] ?? 'jawa'), $t['sub'], $t['motif'], $t['palette'], $t['hero'], $t['gallery']),
                'img' => $t['cover'],
                'default_cover' => $t['cover'],
                'live_url' => url('/demo/'.$t['key']),
            ];
        }

        return $themes;
    }

    /**
     * Data demo untuk 10 template Adat Jawa.
     */
    private static function adatJawaDemoConfigs(Carbon $weddingDate): array
    {
        $groomPhotos = [
            'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&q=80',
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80',
        ];
        $bridePhotos = [
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&q=80',
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=800&q=80',
        ];
        $galleries = [
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=900&q=80',
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=900&q=80',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=900&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=900&q=80',
        ];

        $venue = [
            'jawa' => [
                'label' => 'Adat Jawa', 'groom_city' => 'Surakarta', 'bride_city' => 'Yogyakarta',
                'venue' => 'Grand Ballroom Hotel Majapahit, Surabaya',
                'akad' => 'Sasana Handrawina, Hotel Majapahit',
                'address' => 'Jl. Tunjungan No. 65, Genteng, Surabaya, Jawa Timur',
                'maps' => 'https://maps.google.com/?q=Hotel+Majapahit+Surabaya',
                'gift' => 'Jl. Tunjungan No. 65, Surabaya (Penerima: Arya / 0812-3456-7890)',
            ],
            'sunda' => [
                'label' => 'Adat Sunda', 'groom_city' => 'Bandung', 'bride_city' => 'Bogor',
                'venue' => 'Gedung Merdeka, Bandung',
                'akad' => 'Aula Utama Gedung Merdeka',
                'address' => 'Jl. Asia Afrika No. 65, Bandung, Jawa Barat',
                'maps' => 'https://maps.google.com/?q=Gedung+Merdeka+Bandung',
                'gift' => 'Jl. Asia Afrika No. 65, Bandung (Penerima: Arya / 0812-3456-7890)',
            ],
            'nusantara' => [
                'label' => 'Adat Nusantara', 'groom_city' => 'Makassar', 'bride_city' => 'Denpasar',
                'venue' => 'Taman Budaya Bali, Denpasar',
                'akad' => 'Pendopo Taman Budaya Bali',
                'address' => 'Jl. Nusa Indah No. 1, Denpasar Timur, Bali',
                'maps' => 'https://maps.google.com/?q=Taman+Budaya+Bali+Denpasar',
                'gift' => 'Jl. Nusa Indah No. 1, Denpasar (Penerima: Arya / 0812-3456-7890)',
            ],
            'modern' => [
                'label' => 'Minimalis Modern', 'groom_city' => 'Jakarta', 'bride_city' => 'Bandung',
                'venue' => 'The Grand Ballroom, Jakarta',
                'akad' => 'Sky Chapel, The Grand Ballroom',
                'address' => 'Jl. Jenderal Sudirman Kav. 52-53, Jakarta Selatan',
                'maps' => 'https://maps.google.com/?q=Grand+Ballroom+Sudirman+Jakarta',
                'gift' => 'Jl. Jenderal Sudirman Kav. 52-53, Jakarta (Penerima: Arya / 0812-3456-7890)',
            ],
            'islami' => [
                'label' => 'Islami', 'groom_city' => 'Jakarta', 'bride_city' => 'Bekasi',
                'venue' => 'Masjid Agung Al-Azhar, Jakarta',
                'akad' => 'Ruang Utama Masjid Agung Al-Azhar',
                'address' => 'Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan',
                'maps' => 'https://maps.google.com/?q=Masjid+Agung+Al-Azhar+Jakarta',
                'gift' => 'Jl. Sisingamangaraja, Jakarta (Penerima: Arya / 0812-3456-7890)',
            ],
            'dual' => [
                'label' => 'Akad & Resepsi', 'groom_city' => 'Jakarta', 'bride_city' => 'Bandung',
                'venue' => 'The Grand Ballroom, Jakarta',
                'akad' => 'Masjid Baiturrahman, Jakarta',
                'address' => 'Jl. Jenderal Sudirman Kav. 52-53, Jakarta Selatan',
                'maps' => 'https://maps.google.com/?q=Grand+Ballroom+Sudirman+Jakarta',
                'gift' => 'Jl. Jenderal Sudirman Kav. 52-53, Jakarta (Penerima: Arya / 0812-3456-7890)',
            ],
            'intl' => [
                'label' => 'Internasional', 'groom_city' => 'Jakarta', 'bride_city' => 'Singapore',
                'venue' => 'Plataran Komodo Resort, Labuan Bajo',
                'akad' => 'The Chapel at Plataran Komodo',
                'address' => 'Waecicu Beach, Labuan Bajo, Nusa Tenggara Timur',
                'maps' => 'https://maps.google.com/?q=Plataran+Komodo+Resort',
                'gift' => 'Waecicu Beach, Labuan Bajo (Penerima: Arya / 0812-3456-7890)',
            ],
            'floral' => [
                'label' => 'Elegan & Floral', 'groom_city' => 'Bandung', 'bride_city' => 'Bogor',
                'venue' => 'Plataran Menteng, Jakarta',
                'akad' => 'The Glasshouse Plataran Menteng',
                'address' => 'Jl. HOS Cokroaminoto No. 42, Menteng, Jakarta Pusat',
                'maps' => 'https://maps.google.com/?q=Plataran+Menteng+Jakarta',
                'gift' => 'Jl. HOS Cokroaminoto No. 42, Jakarta (Penerima: Arya / 0812-3456-7890)',
            ],
            'minang' => [
                'label' => 'Adat Minang', 'groom_city' => 'Padang', 'bride_city' => 'Bukittinggi',
                'venue' => 'Istano Basa Pagaruyung, Batusangkar',
                'akad' => 'Balairung Adat Istano Basa Pagaruyung',
                'address' => 'Jl. Sultan Alam Bagagarsyah, Batusangkar, Tanah Datar, Sumatra Barat',
                'maps' => 'https://maps.google.com/?q=Istano+Basa+Pagaruyung',
                'gift' => 'Jl. Jenderal Sudirman No. 12, Padang (Penerima: Arya / 0812-3456-7890)',
            ],
        ];

        $configs = [];

        foreach (self::adatJawaMeta() as $num => $t) {
            $culture = $t['culture'] ?? 'jawa';
            $v = $venue[$culture] ?? $venue['jawa'];
            $configs[$t['key']] = [
                'slug' => $t['key'].'-demo',
                'category' => 'Pernikahan',
                'sub_category' => self::adatCultureLabel($t['culture'] ?? 'jawa').' '.$t['sub'],
                'theme' => $t['name'].(trim((string) $t['name']) === trim((string) $t['palette']) ? '' : ' ('.$t['palette'].')'),
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'UNDANGAN PERNIKAHAN',
                'groom_name' => 'Arya',
                'groom_fullname' => 'Raden Arya Dananjaya, S.T., M.Sc.',
                'groom_birth_order' => 'Putra Pambayun',
                'groom_father' => 'Bpk. Ir. Bambang Dananjaya',
                'groom_mother' => 'Ibu Hj. Siti Fatimah',
                'groom_city' => $v['groom_city'],
                'groom_photo' => $groomPhotos[$num % 2],
                'bride_name' => 'Kinanthi',
                'bride_fullname' => 'Dyah Sekar Kinanthi, S.Pd., M.A.',
                'bride_birth_order' => 'Putri Wuragil',
                'bride_father' => 'Bpk. Dr. Ahmad Kusuma',
                'bride_mother' => 'Ibu Hj. Sri Rahayu',
                'bride_city' => $v['bride_city'],
                'bride_photo' => $bridePhotos[$num % 2],
                'cover_photo' => $t['cover'],
                'wedding_date' => $weddingDate->copy(),
                'venue_name' => $v['venue'],
                'quote' => 'Semoga Tuhan Yang Maha Pemurah senantiasa melimpahkan berkah, keselamatan, dan ketenteraman dalam membangun rumah tangga, menjadi keluarga yang sakinah, mawaddah, warahmah.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '1234 5678 90',
                'bank_holder_1' => 'Raden Arya Dananjaya',
                'bank_name_2' => 'Mandiri',
                'bank_account_2' => '1370 0192 8374',
                'bank_holder_2' => 'Dyah Sekar Kinanthi',
                'gift_address' => $v['gift'],
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object) [
                        'title' => 'Akad Nikah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08.00 WIB',
                        'end_time' => '10.00 WIB',
                        'venue_name' => $v['akad'],
                        'address' => $v['address'],
                        'maps_url' => $v['maps'],
                        'sort_order' => 1,
                    ],
                    (object) [
                        'title' => 'Resepsi Pernikahan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11.30 WIB',
                        'end_time' => '14.00 WIB',
                        'venue_name' => $v['venue'],
                        'address' => $v['address'],
                        'maps_url' => $v['maps'],
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect(array_map(
                    fn ($url, $i) => (object) ['image' => $url, 'sort_order' => $i + 1],
                    $galleries,
                    array_keys($galleries)
                )),
            ];
        }

        return $configs;
    }

    // ============================================================
    // EVENT CATEGORY SUITE (Ulang Tahun / Aqiqah / Keagamaan / Wisuda / Acara Formal)
    // ============================================================

    /**
     * Meta 89 template event (5 kategori). Sumber tunggal untuk template, katalog & demo.
     *
     * @return array<int, array<string, string>>
     */
    public static function eventMeta(): array
    {
        $meta = [];
        $meta[] = ['key' => 'birthday-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Geometris', 'palette' => 'Citrus Pop', 'culture' => 'birthday', 'motif' => 'Balon Geometris & Konfeti', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'birthday-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Minimalis', 'palette' => 'Soft Pink', 'culture' => 'birthday', 'motif' => 'Kelinci & Balon Pastel', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'birthday-midnight-navy', 'name' => 'Midnight Navy', 'sub' => 'Remaja', 'palette' => 'Midnight Navy', 'culture' => 'birthday', 'motif' => 'Galaksi & Bintang', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'birthday-cyber-neon', 'name' => 'Cyber Neon', 'sub' => 'Remaja', 'palette' => 'Cyber Neon', 'culture' => 'birthday', 'motif' => 'Arcade Neon', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'birthday-bold-red', 'name' => 'Bold Red', 'sub' => 'Anak', 'palette' => 'Bold Red', 'culture' => 'birthday', 'motif' => 'Karnaval Sirkus', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'birthday-mint-fresh', 'name' => 'Mint Fresh', 'sub' => 'Minimalis', 'palette' => 'Mint Fresh', 'culture' => 'birthday', 'motif' => 'Mint & Melon Segar', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'birthday-ocean-blue', 'name' => 'Ocean Blue', 'sub' => 'Anak', 'palette' => 'Ocean Blue', 'culture' => 'birthday', 'motif' => 'Pelaut & Bahari', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'birthday-clean-white', 'name' => 'Clean White', 'sub' => 'Minimalis', 'palette' => 'Clean White', 'culture' => 'birthday', 'motif' => 'Kue Putih Elegan', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'birthday-plum-velvet', 'name' => 'Plum Velvet', 'sub' => 'Sweet 17', 'palette' => 'Plum Velvet', 'culture' => 'birthday', 'motif' => 'Plum Velvet Debut', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'birthday-monochrome', 'name' => 'Monochrome', 'sub' => 'Sweet 17', 'palette' => 'Monochrome', 'culture' => 'birthday', 'motif' => 'Monokrom VIP', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'aqiqah-yellow-sunshine', 'name' => 'Yellow Sunshine', 'sub' => 'Aqiqah', 'palette' => 'Yellow Sunshine', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'arch', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-plum-velvet', 'name' => 'Plum Velvet', 'sub' => 'Aqiqah', 'palette' => 'Plum Velvet', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'medallion', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-monochrome', 'name' => 'Monochrome', 'sub' => 'Aqiqah', 'palette' => 'Monochrome', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'diagonal', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-coral-peach', 'name' => 'Coral & Peach', 'sub' => 'Aqiqah', 'palette' => 'Coral & Peach', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'rects', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-arctic-frost', 'name' => 'Arctic Frost', 'sub' => 'Aqiqah', 'palette' => 'Arctic Frost', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'glass', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Aqiqah', 'palette' => 'Purple Dream', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'arch', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Aqiqah', 'palette' => 'Burgundy Wine', 'culture' => 'aqiqah', 'motif' => 'Fanoos & Mihrab', 'hero' => 'medallion', 'kind' => 'aqiqah'];
        $meta[] = ['key' => 'aqiqah-earth-tone', 'name' => 'Earth Tone', 'sub' => 'Kelahiran', 'palette' => 'Earth Tone', 'culture' => 'aqiqah', 'motif' => 'Pohon Kehidupan', 'hero' => 'diagonal', 'kind' => 'birth'];
        $meta[] = ['key' => 'aqiqah-lavender-haze', 'name' => 'Lavender Haze', 'sub' => 'Kelahiran', 'palette' => 'Lavender Haze', 'culture' => 'aqiqah', 'motif' => 'Pohon Kehidupan', 'hero' => 'rects', 'kind' => 'birth'];
        $meta[] = ['key' => 'aqiqah-chocolate-luxe', 'name' => 'Chocolate Luxe', 'sub' => 'Kelahiran', 'palette' => 'Chocolate Luxe', 'culture' => 'aqiqah', 'motif' => 'Pohon Kehidupan', 'hero' => 'glass', 'kind' => 'birth'];
        $meta[] = ['key' => 'aqiqah-orange-energy', 'name' => 'Orange Energy', 'sub' => 'Kelahiran', 'palette' => 'Orange Energy', 'culture' => 'aqiqah', 'motif' => 'Pohon Kehidupan', 'hero' => 'arch', 'kind' => 'birth'];
        $meta[] = ['key' => 'aqiqah-cherry-blossom', 'name' => 'Cherry Blossom', 'sub' => 'Kelahiran', 'palette' => 'Cherry Blossom', 'culture' => 'aqiqah', 'motif' => 'Pohon Kehidupan', 'hero' => 'medallion', 'kind' => 'birth'];
        $meta[] = ['key' => 'tasmiyah-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Tasmiyah', 'palette' => 'Citrus Pop', 'culture' => 'aqiqah', 'motif' => 'Mashrabiya & Makna Nama', 'hero' => 'diagonal', 'kind' => 'tasmiyah'];
        $meta[] = ['key' => 'tasmiyah-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Tasmiyah', 'palette' => 'Soft Pink', 'culture' => 'aqiqah', 'motif' => 'Mashrabiya & Makna Nama', 'hero' => 'rects', 'kind' => 'tasmiyah'];
        $meta[] = ['key' => 'tasmiyah-midnight-navy', 'name' => 'Midnight Navy', 'sub' => 'Tasmiyah', 'palette' => 'Midnight Navy', 'culture' => 'aqiqah', 'motif' => 'Mashrabiya & Makna Nama', 'hero' => 'glass', 'kind' => 'tasmiyah'];
        $meta[] = ['key' => 'tasmiyah-pastel-cyber', 'name' => 'Pastel Mix', 'sub' => 'Tasmiyah', 'palette' => 'Pastel Mix', 'culture' => 'aqiqah', 'motif' => 'Mashrabiya & Makna Nama', 'hero' => 'arch', 'kind' => 'tasmiyah'];
        $meta[] = ['key' => 'khitanan-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Khitanan', 'palette' => 'Purple Dream', 'culture' => 'aqiqah', 'motif' => 'Lengkung Keraton Islami', 'hero' => 'medallion', 'kind' => 'khitan'];
        $meta[] = ['key' => 'khitanan-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Khitanan', 'palette' => 'Burgundy Wine', 'culture' => 'aqiqah', 'motif' => 'Lengkung Keraton Islami', 'hero' => 'diagonal', 'kind' => 'khitan'];
        $meta[] = ['key' => 'khitanan-ruby-luxe', 'name' => 'Ruby Luxe', 'sub' => 'Khitanan', 'palette' => 'Ruby Luxe', 'culture' => 'aqiqah', 'motif' => 'Lengkung Keraton Islami', 'hero' => 'rects', 'kind' => 'khitan'];
        $meta[] = ['key' => 'khitanan-pastel-mix', 'name' => 'Pastel Mix', 'sub' => 'Khitanan', 'palette' => 'Pastel Mix', 'culture' => 'aqiqah', 'motif' => 'Lengkung Keraton Islami', 'hero' => 'glass', 'kind' => 'khitan'];
        $meta[] = ['key' => 'pengajian-plum-velvet', 'name' => 'Plum Velvet', 'sub' => 'Pengajian', 'palette' => 'Plum Velvet', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'arch', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'pengajian-monochrome', 'name' => 'Monochrome', 'sub' => 'Pengajian', 'palette' => 'Monochrome', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'medallion', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'pengajian-coral-peach', 'name' => 'Coral & Peach', 'sub' => 'Pengajian', 'palette' => 'Coral & Peach', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'diagonal', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'pengajian-arctic-frost', 'name' => 'Arctic Frost', 'sub' => 'Pengajian', 'palette' => 'Arctic Frost', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'rects', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'pengajian-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Pengajian', 'palette' => 'Purple Dream', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'glass', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'pengajian-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Pengajian', 'palette' => 'Burgundy Wine', 'culture' => 'religious', 'motif' => 'Mihrab Masjid', 'hero' => 'arch', 'kind' => 'pengajian'];
        $meta[] = ['key' => 'tasyakuran-clean-white', 'name' => 'Clean White', 'sub' => 'Tasyakuran', 'palette' => 'Clean White', 'culture' => 'religious', 'motif' => 'Lengkung Botani', 'hero' => 'medallion', 'kind' => 'tasyakuran'];
        $meta[] = ['key' => 'tasyakuran-dusty-rose', 'name' => 'Dusty Rose', 'sub' => 'Tasyakuran', 'palette' => 'Dusty Rose', 'culture' => 'religious', 'motif' => 'Lengkung Botani', 'hero' => 'diagonal', 'kind' => 'tasyakuran'];
        $meta[] = ['key' => 'tasyakuran-sage-green', 'name' => 'Sage Green', 'sub' => 'Tasyakuran', 'palette' => 'Sage Green', 'culture' => 'religious', 'motif' => 'Lengkung Botani', 'hero' => 'rects', 'kind' => 'tasyakuran'];
        $meta[] = ['key' => 'tasyakuran-rose-gold', 'name' => 'Rose Gold', 'sub' => 'Tasyakuran', 'palette' => 'Rose Gold', 'culture' => 'religious', 'motif' => 'Lengkung Botani', 'hero' => 'glass', 'kind' => 'tasyakuran'];
        $meta[] = ['key' => 'maulid-cyber-neon', 'name' => 'Cyber Neon', 'sub' => 'Maulid', 'palette' => 'Cyber Neon', 'culture' => 'religious', 'motif' => 'Kubah Nabawi', 'hero' => 'arch', 'kind' => 'maulid'];
        $meta[] = ['key' => 'maulid-bold-red', 'name' => 'Bold Red', 'sub' => 'Maulid', 'palette' => 'Bold Red', 'culture' => 'religious', 'motif' => 'Kubah Nabawi', 'hero' => 'medallion', 'kind' => 'maulid'];
        $meta[] = ['key' => 'maulid-mint-fresh', 'name' => 'Mint Fresh', 'sub' => 'Maulid', 'palette' => 'Mint Fresh', 'culture' => 'religious', 'motif' => 'Kubah Nabawi', 'hero' => 'diagonal', 'kind' => 'maulid'];
        $meta[] = ['key' => 'maulid-ocean-blue', 'name' => 'Ocean Blue', 'sub' => 'Maulid', 'palette' => 'Ocean Blue', 'culture' => 'religious', 'motif' => 'Kubah Nabawi', 'hero' => 'rects', 'kind' => 'maulid'];
        $meta[] = ['key' => 'bukber-pastel-mix', 'name' => 'Pastel Mix', 'sub' => 'Bukber', 'palette' => 'Pastel Mix', 'culture' => 'religious', 'motif' => 'Lentera Ramadan', 'hero' => 'glass', 'kind' => 'bukber'];
        $meta[] = ['key' => 'bukber-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Bukber', 'palette' => 'Citrus Pop', 'culture' => 'religious', 'motif' => 'Lentera Ramadan', 'hero' => 'arch', 'kind' => 'bukber'];
        $meta[] = ['key' => 'bukber-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Bukber', 'palette' => 'Soft Pink', 'culture' => 'religious', 'motif' => 'Lentera Ramadan', 'hero' => 'medallion', 'kind' => 'bukber'];
        $meta[] = ['key' => 'bukber-midnight-navy', 'name' => 'Midnight Navy', 'sub' => 'Bukber', 'palette' => 'Midnight Navy', 'culture' => 'religious', 'motif' => 'Lentera Ramadan', 'hero' => 'diagonal', 'kind' => 'bukber'];
        $meta[] = ['key' => 'safar-arctic-frost', 'name' => 'Arctic Frost', 'sub' => 'Walimatus Safar', 'palette' => 'Arctic Frost', 'culture' => 'religious', 'motif' => 'Lengkung Haramain', 'hero' => 'rects', 'kind' => 'safar'];
        $meta[] = ['key' => 'safar-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Walimatus Safar', 'palette' => 'Purple Dream', 'culture' => 'religious', 'motif' => 'Lengkung Haramain', 'hero' => 'glass', 'kind' => 'safar'];
        $meta[] = ['key' => 'safar-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Walimatus Safar', 'palette' => 'Burgundy Wine', 'culture' => 'religious', 'motif' => 'Lengkung Haramain', 'hero' => 'arch', 'kind' => 'safar'];
        $meta[] = ['key' => 'safar-ruby-luxe', 'name' => 'Ruby Luxe', 'sub' => 'Walimatus Safar', 'palette' => 'Ruby Luxe', 'culture' => 'religious', 'motif' => 'Lengkung Haramain', 'hero' => 'medallion', 'kind' => 'safar'];
        $meta[] = ['key' => 'halalbi-yellow-sunshine', 'name' => 'Yellow Sunshine', 'sub' => 'Halal Bihalal', 'palette' => 'Yellow Sunshine', 'culture' => 'religious', 'motif' => 'Anyaman Ketupat', 'hero' => 'diagonal', 'kind' => 'halalbi'];
        $meta[] = ['key' => 'halalbi-plum-velvet', 'name' => 'Plum Velvet', 'sub' => 'Halal Bihalal', 'palette' => 'Plum Velvet', 'culture' => 'religious', 'motif' => 'Anyaman Ketupat', 'hero' => 'rects', 'kind' => 'halalbi'];
        $meta[] = ['key' => 'halalbi-monochrome', 'name' => 'Monochrome', 'sub' => 'Halal Bihalal', 'palette' => 'Monochrome', 'culture' => 'religious', 'motif' => 'Anyaman Ketupat', 'hero' => 'glass', 'kind' => 'halalbi'];
        $meta[] = ['key' => 'wisuda-cherry-blossom', 'name' => 'Cherry Blossom', 'sub' => 'Bold Modern', 'palette' => 'Cherry Blossom', 'culture' => 'graduate', 'motif' => 'Pilar Kampus & Laurel', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'wisuda-baby-blue', 'name' => 'Baby Blue', 'sub' => 'Tradisional Nusantara', 'palette' => 'Baby Blue', 'culture' => 'graduate', 'motif' => 'Batik Gebyok & Toga', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'wisuda-terracotta', 'name' => 'Terracotta', 'sub' => 'Bold Modern', 'palette' => 'Terracotta', 'culture' => 'graduate', 'motif' => 'Pilar Kampus & Laurel', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'wisuda-forest-moss', 'name' => 'Forest Moss', 'sub' => 'Tradisional Nusantara', 'palette' => 'Forest Moss', 'culture' => 'graduate', 'motif' => 'Batik Gebyok & Toga', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'wisuda-emerald-green', 'name' => 'Emerald Green', 'sub' => 'Bold Modern', 'palette' => 'Emerald Green', 'culture' => 'graduate', 'motif' => 'Pilar Kampus & Laurel', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'wisuda-mocha-cream', 'name' => 'Mocha Cream', 'sub' => 'Tradisional Nusantara', 'palette' => 'Mocha Cream', 'culture' => 'graduate', 'motif' => 'Batik Gebyok & Toga', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'kelulusan-dark-mode', 'name' => 'Dark Mode', 'sub' => 'Tropical', 'palette' => 'Dark Mode', 'culture' => 'graduate', 'motif' => 'Palem Tropis', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'kelulusan-denim-blue', 'name' => 'Denim Blue', 'sub' => 'Vintage', 'palette' => 'Denim Blue', 'culture' => 'graduate', 'motif' => 'Gerbang Besi Yearbook', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'kelulusan-earth-tone', 'name' => 'Earth Tone', 'sub' => 'Tropical', 'palette' => 'Earth Tone', 'culture' => 'graduate', 'motif' => 'Palem Tropis', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'kelulusan-lavender-haze', 'name' => 'Lavender Haze', 'sub' => 'Vintage', 'palette' => 'Lavender Haze', 'culture' => 'graduate', 'motif' => 'Gerbang Besi Yearbook', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'kelulusan-chocolate-luxe', 'name' => 'Chocolate Luxe', 'sub' => 'Tropical', 'palette' => 'Chocolate Luxe', 'culture' => 'graduate', 'motif' => 'Palem Tropis', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'syukuran-ruby-luxe', 'name' => 'Ruby Luxe', 'sub' => 'Watercolor', 'palette' => 'Ruby Luxe', 'culture' => 'graduate', 'motif' => 'Lengkung Watercolor', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'syukuran-pastel-mix', 'name' => 'Pastel Mix', 'sub' => 'Floral', 'palette' => 'Pastel Mix', 'culture' => 'graduate', 'motif' => 'Lengkung Floral', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'syukuran-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Watercolor', 'palette' => 'Citrus Pop', 'culture' => 'graduate', 'motif' => 'Lengkung Watercolor', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'syukuran-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Floral', 'palette' => 'Soft Pink', 'culture' => 'graduate', 'motif' => 'Lengkung Floral', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'seminar-coral-peach', 'name' => 'Coral & Peach', 'sub' => 'Seminar', 'palette' => 'Coral & Peach', 'culture' => 'corporate', 'motif' => 'Grid Editorial', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'seminar-arctic-frost', 'name' => 'Arctic Frost', 'sub' => 'Seminar', 'palette' => 'Arctic Frost', 'culture' => 'corporate', 'motif' => 'Grid Editorial', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'seminar-purple-dream', 'name' => 'Purple Dream', 'sub' => 'Seminar', 'palette' => 'Purple Dream', 'culture' => 'corporate', 'motif' => 'Grid Editorial', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'seminar-burgundy-wine', 'name' => 'Burgundy Wine', 'sub' => 'Seminar', 'palette' => 'Burgundy Wine', 'culture' => 'corporate', 'motif' => 'Grid Editorial', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'seminar-ruby-luxe', 'name' => 'Ruby Luxe', 'sub' => 'Seminar', 'palette' => 'Ruby Luxe', 'culture' => 'corporate', 'motif' => 'Grid Editorial', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'gathering-baby-blue', 'name' => 'Baby Blue', 'sub' => 'Gathering', 'palette' => 'Baby Blue', 'culture' => 'corporate', 'motif' => 'Batik Nusantara', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'gathering-terracotta', 'name' => 'Terracotta', 'sub' => 'Gathering', 'palette' => 'Terracotta', 'culture' => 'corporate', 'motif' => 'Batik Nusantara', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'gathering-forest-moss', 'name' => 'Forest Moss', 'sub' => 'Gathering', 'palette' => 'Forest Moss', 'culture' => 'corporate', 'motif' => 'Batik Nusantara', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'gathering-emerald-green', 'name' => 'Emerald Green', 'sub' => 'Gathering', 'palette' => 'Emerald Green', 'culture' => 'corporate', 'motif' => 'Batik Nusantara', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'grandopening-lavender-haze', 'name' => 'Lavender Haze', 'sub' => 'Grand Opening', 'palette' => 'Lavender Haze', 'culture' => 'corporate', 'motif' => 'Botanical', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'grandopening-chocolate-luxe', 'name' => 'Chocolate Luxe', 'sub' => 'Grand Opening', 'palette' => 'Chocolate Luxe', 'culture' => 'corporate', 'motif' => 'Botanical', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'grandopening-orange-energy', 'name' => 'Orange Energy', 'sub' => 'Grand Opening', 'palette' => 'Orange Energy', 'culture' => 'corporate', 'motif' => 'Botanical', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'grandopening-cherry-blossom', 'name' => 'Cherry Blossom', 'sub' => 'Grand Opening', 'palette' => 'Cherry Blossom', 'culture' => 'corporate', 'motif' => 'Botanical', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'launching-glacier-blue', 'name' => 'Glacier Blue', 'sub' => 'Peluncuran Produk', 'palette' => 'Glacier Blue', 'culture' => 'corporate', 'motif' => 'Editorial', 'hero' => 'rects', 'kind' => ''];
        $meta[] = ['key' => 'launching-dark-mode', 'name' => 'Dark Mode', 'sub' => 'Peluncuran Produk', 'palette' => 'Dark Mode', 'culture' => 'corporate', 'motif' => 'Editorial', 'hero' => 'glass', 'kind' => ''];
        $meta[] = ['key' => 'launching-denim-blue', 'name' => 'Denim Blue', 'sub' => 'Peluncuran Produk', 'palette' => 'Denim Blue', 'culture' => 'corporate', 'motif' => 'Editorial', 'hero' => 'arch', 'kind' => ''];
        $meta[] = ['key' => 'komunitas-pastel-mix', 'name' => 'Pastel Mix', 'sub' => 'Acara Komunitas', 'palette' => 'Pastel Mix', 'culture' => 'corporate', 'motif' => 'Watercolor', 'hero' => 'medallion', 'kind' => ''];
        $meta[] = ['key' => 'komunitas-citrus-pop', 'name' => 'Citrus Pop', 'sub' => 'Acara Komunitas', 'palette' => 'Citrus Pop', 'culture' => 'corporate', 'motif' => 'Watercolor', 'hero' => 'diagonal', 'kind' => ''];
        $meta[] = ['key' => 'komunitas-soft-pink', 'name' => 'Soft Pink', 'sub' => 'Acara Komunitas', 'palette' => 'Soft Pink', 'culture' => 'corporate', 'motif' => 'Watercolor', 'hero' => 'rects', 'kind' => ''];

        return $meta;
    }

    private static function eventCategoryLabel(?string $culture): string
    {
        return match ($culture) {
            'birthday' => 'Ulang Tahun',
            'aqiqah' => 'Aqiqah',
            'religious' => 'Keagamaan',
            'graduate' => 'Wisuda',
            'corporate' => 'Acara Formal',
            default => 'Acara',
        };
    }

    private static function eventTemplates(): array
    {
        $themes = [];
        foreach (self::eventMeta() as $t) {
            $themes[$t['key']] = [
                'key' => $t['key'],
                'name' => $t['name'].(trim((string) $t['name']) === trim((string) $t['palette']) ? '' : ' ('.$t['palette'].')'),
                'package' => 'Paket Eksklusif - Rp180.000',
                'tier' => 'eksklusif',
                'category' => self::eventCategoryLabel($t['culture']),
                'blade' => self::viewPath($t['key']),
                'desc' => sprintf('%s — %s, %s, hero frame %s, galeri bento. Lengkap dengan cover, countdown, peta, RSVP, buku tamu & kado digital.', self::eventCategoryLabel($t['culture']), $t['sub'], $t['motif'], $t['hero']),
                'img' => self::eventCover($t['culture']),
                'default_cover' => self::eventCover($t['culture']),
                'badge' => self::eventEmoji($t['culture']).' '.self::eventCategoryLabel($t['culture']).' • '.$t['sub'],
                'demo_route' => '/demo/'.$t['key'],
            ];
        }

        return $themes;
    }

    private static function eventEmoji(?string $culture): string
    {
        return match ($culture) {
            'birthday' => '🎂', 'aqiqah' => '👶', 'religious' => '🕌', 'graduate' => '🎓', 'corporate' => '🏛️', default => '✨',
        };
    }

    private static function eventCover(?string $culture): string
    {
        return match ($culture) {
            'birthday' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1200&q=80',
            'aqiqah' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=1200&q=80',
            'religious' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200&q=80',
            'graduate' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80',
            'corporate' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1200&q=80',
            default => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&q=80',
        };
    }

    private static function eventCatalogThemes(): array
    {
        $themes = [];
        foreach (self::eventMeta() as $t) {
            $themes[] = [
                'key' => $t['key'],
                'template_key' => $t['key'],
                'name' => $t['name'].' — '.self::eventCategoryLabel($t['culture']),
                'category' => self::eventCatalogKey($t['culture']),
                'category_label' => self::eventCategoryLabel($t['culture']),
                'sub_category' => $t['sub'],
                'tier' => 'eksklusif',
                'price' => 'Rp180.000',
                'badge' => self::eventEmoji($t['culture']).' '.self::eventCategoryLabel($t['culture']).' • '.$t['sub'],
                'package_val' => 'Paket Eksklusif - Rp180.000',
                'event_cat' => self::eventCategoryLabel($t['culture']),
                'sub_cat' => $t['sub'],
                'theme_css' => 'theme-event-'.$t['culture'],
                'skin' => 'skin-event-'.$t['culture'],
                'desc' => sprintf('%s %s — %s, palette %s, hero frame %s.', self::eventCategoryLabel($t['culture']), $t['sub'], $t['motif'], $t['palette'], $t['hero']),
                'img' => self::eventCover($t['culture']),
                'default_cover' => self::eventCover($t['culture']),
                'live_url' => url('/demo/'.$t['key']),
            ];
        }

        return $themes;
    }

    private static function eventCatalogKey(?string $culture): string
    {
        return match ($culture) {
            'birthday' => 'ultah', 'aqiqah' => 'aqiqah', 'religious' => 'keagamaan', 'graduate' => 'wisuda', 'corporate' => 'formal', default => 'acara',
        };
    }

    private static function eventDemoConfigs(Carbon $weddingDate): array
    {
        $photos = [
            'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&q=80',
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80',
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&q=80',
        ];
        $galleries = [
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=900&q=80',
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=900&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=900&q=80',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=900&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=900&q=80',
        ];

        $venue = [
            'birthday' => ['city' => 'Jakarta', 'venue' => 'Grand Ballroom, Jakarta', 'address' => 'Jl. Sudirman Kav. 52, Jakarta Selatan', 'maps' => 'https://maps.google.com/?q=Grand+Ballroom+Sudirman'],
            'aqiqah' => ['city' => 'Bandung', 'venue' => 'Kediaman Keluarga, Bandung', 'address' => 'Jl. Dago Pakar, Bandung', 'maps' => 'https://maps.google.com/?q=Dago+Pakar+Bandung'],
            'religious' => ['city' => 'Jakarta', 'venue' => 'Masjid Agung, Jakarta', 'address' => 'Jl. Sisingamangaraja, Jakarta Selatan', 'maps' => 'https://maps.google.com/?q=Masjid+Agung+Jakarta'],
            'graduate' => ['city' => 'Bandung', 'venue' => 'Aula Kampus, Bandung', 'address' => 'Jl. Dipatiukur, Bandung', 'maps' => 'https://maps.google.com/?q=Aula+Kampus+Bandung'],
            'corporate' => ['city' => 'Jakarta', 'venue' => 'Ballroom Hotel, Jakarta', 'address' => 'Jl. Asia Afrika, Jakarta', 'maps' => 'https://maps.google.com/?q=Ballroom+Hotel+Jakarta'],
        ];

        $hosts = [
            'birthday' => ['name' => 'Aisyah', 'fullname' => 'Aisyah Zahra Ramadhani', 'father' => 'Bpk. Ahmad Ramadhani', 'mother' => 'Ibu Siti Nurjanah'],
            'aqiqah' => ['name' => 'Muhammad Al-Fatih', 'fullname' => 'Muhammad Al-Fatih Ramadhan', 'father' => 'Bpk. Irfan Maulana', 'mother' => 'Ibu Nisa Rahmawati'],
            'religious' => ['name' => 'Panitia Pengajian', 'fullname' => 'Keluarga Besar Bpk. H. Ahmad', 'father' => 'Bpk. H. Ahmad', 'mother' => 'Ibu Hj. Siti'],
            'graduate' => ['name' => 'Rizky Pratama', 'fullname' => 'Rizky Pratama, S.T., M.T.', 'father' => 'Bpk. Ir. Bambang', 'mother' => 'Ibu Ratna Dewi'],
            'corporate' => ['name' => 'PT Karsa Karya', 'fullname' => 'PT Karsa Karya Indonesia', 'father' => 'Direktur Utama', 'mother' => 'Direktur Operasional'],
        ];

        $configs = [];
        foreach (self::eventMeta() as $t) {
            $culture = $t['culture'];
            $v = $venue[$culture];
            $h = $hosts[$culture];
            $quoteByCulture = match ($culture) {
                'corporate' => 'Kami menghaturkan terima kasih atas perhatian dan kehadiran Bapak/Ibu dalam agenda resmi ini. Kehadiran Anda menjadi bagian penting dari keberhasilan dan sinergi bersama.',
                'birthday' => 'Selamat bertambah usia! Semoga tahun yang baru membawa limpahan kebahagiaan, kesehatan prima, dan langkah-langkah yang penuh berkah.',
                'graduate' => 'Hari ini adalah awal perjalanan baru. Ilmu dan pengalaman yang diraih menjadi lentera untuk melangkah lebih jauh dan memberi manfaat seluas-luasnya.',
                'aqiqah' => 'Ya Allah, berkahilah anak ini dalam kehidupannya dan jadikanlah ia anak yang berbakti kepada kedua orang tua serta berguna bagi agama dan nusa bangsa.',
                'religious' => 'Ingatlah, hanya dengan mengingat Allah hati menjadi tenteram. Semoga majelis ini mendatangkan keberkahan dan mempererat ukhuwah.',
                default => 'Semoga Tuhan Yang Maha Esa senantiasa melimpahkan berkah, rahmat, dan kebahagiaan bagi kita semua.',
            };

            $cfg = [
                'slug' => $t['key'].'-demo',
                'category' => self::eventCategoryLabel($culture),
                'sub_category' => $t['sub'],
                'theme' => $t['name'].(trim((string) $t['name']) === trim((string) $t['palette']) ? '' : ' ('.$t['palette'].')'),
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => $t['sub'],
                'cover_subtitle' => self::eventCategoryLabel($culture).' • '.$t['motif'],
                'groom_name' => $h['name'],
                'groom_fullname' => $h['fullname'],
                'groom_father' => $h['father'],
                'groom_mother' => $h['mother'],
                'groom_city' => $v['city'],
                'groom_photo' => $photos[array_sum(array_map('ord', str_split($t['key']))) % 3],
                'cover_photo' => self::eventCover($culture),
                'wedding_date' => $weddingDate->copy(),
                'venue_name' => $v['venue'],
                'venue_address' => $v['address'],
                'quote' => $quoteByCulture,
                'bank_name_1' => 'BCA',
                'bank_account_1' => '8820 3948 21',
                'bank_holder_1' => $h['fullname'],
                'gift_address' => $v['address'].' (Penerima: '.$h['name'].' / 0812-3456-7890)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object) ['title' => 'Acara Utama', 'date' => $weddingDate->copy()->format('Y-m-d'), 'start_time' => '09.00 WIB', 'end_time' => '12.00 WIB', 'venue_name' => $v['venue'], 'address' => $v['address'], 'maps_url' => $v['maps'], 'sort_order' => 1],
                ]),
                'galleries' => collect(array_map(fn ($url, $i) => (object) ['image' => $url, 'sort_order' => $i + 1], $galleries, array_keys($galleries))),
            ];
            if ($culture === 'birthday') {
                $cfg['age_badge'] = $t['sub'] === 'Sweet 17' ? 'Sweet 17' : 'Turning 5!';
                $cfg['age_number'] = $t['sub'] === 'Sweet 17' ? '17' : '5';
                $cfg['rundown'] = [
                    ['time' => '15.30', 'title' => 'Sambutan & Games', 'text' => 'Sambutan hangat keluarga dan sesi games seru bersama para tamu.'],
                    ['time' => '16.30', 'title' => 'Tiup Lilin & Potong Kue', 'text' => 'Momen puncak meniup lilin dan memotong kue ulang tahun.'],
                    ['time' => '17.30', 'title' => 'Ramah Tamah', 'text' => 'Sesi foto bersama dan ramah tamah penuh kehangatan.'],
                ];
            }
            if ($culture === 'aqiqah') {
                $cfg['birth_stats'] = [
                    ['label' => 'Tanggal Lahir', 'value' => '14 April 2026'],
                    ['label' => 'Waktu', 'value' => '09.30 WIB'],
                    ['label' => 'Berat', 'value' => '3,2 kg'],
                    ['label' => 'Panjang', 'value' => '49 cm'],
                ];
                if ($t['kind'] === 'tasmiyah') {
                    $cfg['makna_nama'] = 'Nama ini dipilih dengan doa agar sang buah hati tumbuh menjadi pribadi yang saleh, cerdas, dan bermanfaat bagi sesama.';
                }
                if ($t['kind'] === 'khitan') {
                    $cfg['event_heading'] = 'Walimatul Khitan';
                }
            }
            if ($culture === 'religious') {
                $cfg['rundown'] = [
                    ['time' => '08.00', 'title' => 'Pembukaan & Tausiyah', 'text' => 'Pembukaan acara dan tausiyah oleh ustadz/penceramah.'],
                    ['time' => '09.30', 'title' => 'Doa Bersama', 'text' => 'Doa bersama dan dzikir penuh kekhusyukan.'],
                    ['time' => '11.00', 'title' => 'Ramah Tamah', 'text' => 'Sesi ramah tamah dan santap siang bersama.'],
                ];
            }
            if ($culture === 'graduate') {
                $cfg['credentials'] = [
                    ['label' => 'Perguruan Tinggi', 'value' => 'Universitas Indonesia'],
                    ['label' => 'Fakultas / Jurusan', 'value' => 'Teknik / Informatika'],
                    ['label' => 'Gelar', 'value' => 'S.T., M.T.'],
                    ['label' => 'Predikat', 'value' => 'Cum Laude'],
                ];
                $cfg['rundown'] = [
                    ['time' => '2018', 'title' => 'Memulai Studi', 'text' => 'Langkah pertama memasuki dunia perkuliahan.'],
                    ['time' => '2022', 'title' => 'Skripsi & Sidang', 'text' => 'Menyelesaikan penelitian dan sidang sarjana.'],
                    ['time' => '2026', 'title' => 'Wisuda', 'text' => 'Puncak perjalanan akademik yang membanggakan.'],
                ];
            }
            if ($culture === 'corporate') {
                $cfg['spotlight'] = $t['sub'] === 'Seminar' ? 'Keynote Speaker & Sesi Panel' : ($t['sub'] === 'Grand Opening' ? 'Voucher Grand Opening' : ($t['sub'] === 'Peluncuran Produk' ? 'Produk Unggulan & Spesifikasi' : 'Board of Directors'));
                $cfg['pillars'] = [
                    ['title' => 'Visi', 'text' => 'Membangun masa depan yang lebih baik.'],
                    ['title' => 'Misi', 'text' => 'Memberikan nilai terbaik bagi pelanggan.'],
                    ['title' => 'Inovasi', 'text' => 'Terus bertumbuh dan berinovasi.'],
                    ['title' => 'Kolaborasi', 'text' => 'Bersinergi dengan seluruh mitra.'],
                ];
                $cfg['rundown'] = [
                    ['time' => '08.00', 'title' => 'Registrasi', 'text' => 'Pendaftaran ulang dan penyerahan e-ticket.'],
                    ['time' => '09.00', 'title' => 'Pembukaan', 'text' => 'Sambutan dan pembukaan acara.'],
                    ['time' => '10.00', 'title' => 'Sesi Utama', 'text' => 'Acara inti dan sesi utama.'],
                    ['time' => '12.00', 'title' => 'Networking', 'text' => 'Ramah tamah dan sesi networking.'],
                ];
            }
            $configs[$t['key']] = $cfg;
        }

        return $configs;
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

        return asset('storage/'.ltrim($path, '/'));
    }

    /**
     * Tautan "Petunjuk Google Maps" yang aman dipakai di <a href>.
     * Menerima tautan Google Maps apa pun (share pendek, /maps/place/…, koordinat, atau alamat teks)
     * dan selalu mengembalikan URL absolut — tautan tanpa skema seperti "maps.app.goo.gl/abc" dulu
     * dianggap path relatif sehingga tombolnya 404.
     */
    public static function mapDirectionsUrl(?string $raw, ?string $fallbackQuery = ''): string
    {
        $raw = trim((string) $raw);
        $fallbackQuery = trim((string) $fallbackQuery);

        if ($raw === '') {
            return self::mapsSearchUrl($fallbackQuery);
        }

        if (preg_match('#^(https?:)?//#i', $raw)) {
            $url = str_starts_with($raw, '//') ? 'https:'.$raw : $raw;

            // Tautan embed bukan untuk dibuka di tab baru.
            if (str_contains($url, 'output=embed')) {
                return preg_replace('/[?&]output=embed/i', '', $url);
            }

            // Hanya alamat peta "kosong" (mis. https://maps.google.com) yang dialihkan ke pencarian alamat.
            if (self::isBareMapHome($url)) {
                return self::mapsSearchUrl($fallbackQuery !== '' ? $fallbackQuery : $raw);
            }

            return $url;
        }

        if (self::looksLikeHost($raw)) {
            return 'https://'.$raw;
        }

        return self::mapsSearchUrl($raw);
    }

    /**
     * URL iframe peta yang mengikuti tautan pembeli (koordinat/nama tempat) dan bukan hanya teks alamat.
     */
    public static function mapEmbedUrl(?string $raw, ?string $fallbackQuery = ''): string
    {
        $raw = trim((string) $raw);
        $fallbackQuery = trim((string) $fallbackQuery);

        $query = self::mapQueryFromUrl($raw);
        if ($query === '') {
            $query = $raw !== '' && ! self::looksLikeHost($raw) && ! preg_match('#^(https?:)?//#i', $raw)
                ? $raw
                : $fallbackQuery;
        }
        if ($query === '') {
            $query = 'Indonesia';
        }

        return 'https://www.google.com/maps?q='.urlencode($query).'&z=16&output=embed';
    }

    /**
     * Ambil bagian yang bisa dipakai sebagai query peta dari sebuah tautan Google Maps.
     */
    private static function mapQueryFromUrl(string $raw): string
    {
        if ($raw === '') {
            return '';
        }

        // Koordinat: /@-7.2575,112.7521,15z atau !3d-7.2575!4d112.7521
        if (preg_match('#@(-?\d+\.\d+),(-?\d+\.\d+)#', $raw, $m)) {
            return $m[1].','.$m[2];
        }
        if (preg_match('#!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)#', $raw, $m)) {
            return $m[1].','.$m[2];
        }

        // Parameter query yang sudah berupa pencarian/koordinat.
        $parts = parse_url($raw, PHP_URL_QUERY);
        if (is_string($parts)) {
            parse_str($parts, $params);
            foreach (['query', 'q', 'destination', 'center', 'll'] as $key) {
                if (! empty($params[$key]) && is_string($params[$key])) {
                    return trim(str_replace('+', ' ', $params[$key]));
                }
            }
        }

        // Nama tempat: /maps/place/Belia+Cosmetic/@…
        if (preg_match('#/maps/place/([^/@?]+)#', $raw, $m)) {
            $name = trim(urldecode(str_replace('+', ' ', $m[1])));

            return $name;
        }

        return '';
    }

    private static function mapsSearchUrl(string $query): string
    {
        $query = trim($query);

        return $query === ''
            ? 'https://www.google.com/maps'
            : 'https://www.google.com/maps/search/?api=1&query='.urlencode($query);
    }

    private static function looksLikeHost(string $value): bool
    {
        return (bool) preg_match('~^[\w.-]+\.[a-z]{2,}([/?#].*)?$~i', $value);
    }

    /**
     * Alamat peta "kosong" tanpa titik atau nama tempat (mis. https://maps.google.com).
     * Hanya kasus ini yang dialihkan ke pencarian alamat; tautan pendek asli dibiarkan apa adanya
     * supaya tombol petunjuk arah selalu mengikuti isi field peta.
     */
    private static function isBareMapHome(string $url): bool
    {
        $host = strtolower((string) parse_url($url, PHP_URL_HOST));
        $path = trim((string) parse_url($url, PHP_URL_PATH), '/');
        $query = (string) parse_url($url, PHP_URL_QUERY);

        $mapHosts = ['maps.google.com', 'maps.google.co.id', 'www.google.com', 'google.com', 'maps.app.goo.gl', 'goo.gl', 'g.co'];

        return in_array($host, $mapHosts, true) && $path === '' && $query === '';
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

        if (! $hasFather && ! $hasMother) {
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
        $raw = strtolower(trim((string) $themeName));
        $cat = strtolower(trim((string) $category));
        $sub = strtolower(trim((string) $subCategory));

        // 1. Check exact key match first
        if (array_key_exists($raw, self::all())) {
            return $raw;
        }

        // 1a. Palet menang lebih dulu untuk budaya baru (nama kategori bisa memuat kata palet).
        $earlyPalettes = [
            'floral' => ['coral' => 'floral-daisy-pagi', 'arctic frost' => 'floral-rosewood', 'clean white' => 'floral-rosalind',
                'dusty rose' => 'floral-peony-putih', 'sage green' => 'floral-taman-ayu', 'rose gold' => 'floral-anggrek-bulan',
                'blueberry' => 'floral-bunga-kertas', 'yellow sunshine' => 'floral-magnolia', 'plum velvet' => 'floral-lavender-fields',
                'monochrome' => 'floral-sakura-lembut'],
            'islami' => ['burgundy' => 'islami-ar-rum-21', 'ruby' => 'islami-nurul-iman', 'pastel mix' => 'islami-baarakallahu',
                'citrus' => 'islami-misykah', 'soft pink' => 'islami-mihrab-cinta', 'midnight navy' => 'islami-salam-khusyuk',
                'cyber neon' => 'islami-zahra-and-ahmad', 'bold red' => 'islami-barokah-jannah'],
            'dual' => ['rose gold' => 'akad-dua-janji', 'blueberry' => 'akad-sakral-and-syahdu',
                'yellow sunshine' => 'akad-satu-hari-dua-acara', 'plum velvet' => 'akad-khitbah', 'monochrome' => 'akad-akad-and-resepsi'],
            'intl' => ['earth tone' => 'internasional-maison', 'lavender' => 'internasional-editorial-vows',
                'chocolate' => 'internasional-nusantara-fusion', 'orange' => 'internasional-the-grand-affair',
                'cherry blossom' => 'internasional-bilingual-bliss'],
        ];
        $earlyCulture = null;
        if (str_contains($raw, 'floral')) {
            $earlyCulture = 'floral';
        } elseif (str_contains($raw, 'islami')) {
            $earlyCulture = 'islami';
        } elseif (str_contains($raw, 'akad') || str_contains($raw, 'resepsi')) {
            $earlyCulture = 'dual';
        } elseif (str_contains($raw, 'internasional') || str_contains($raw, 'bilingual') || str_contains($raw, 'fusion')) {
            $earlyCulture = 'intl';
        }
        if ($earlyCulture !== null) {
            foreach ($earlyPalettes[$earlyCulture] as $needle => $earlyKey) {
                if (str_contains($raw, $needle)) {
                    return $earlyKey;
                }
            }
        }

        // 1b. Adat Jawa suite 01–10 (master: docs/template-registry.json).
        // Distinctive names always win; palette names only count with a Jawa context.
        $adatNames = [
            'jawa-keraton-agung' => 'keraton agung',
            'jawa-sekar-kedhaton' => 'sekar kedhaton',
            'jawa-gunungan-emas' => 'gunungan emas',
            'jawa-batik-parang' => 'batik parang',
            'jawa-gebyok-ukir' => 'gebyok ukir',
            'jawa-melati-kraton' => 'melati kraton',
            'jawa-sogan-klasik' => 'sogan klasik',
            'jawa-wijaya-kusuma' => 'wijaya kusuma',
            'jawa-sekar-jagad' => 'sekar jagad',
            'jawa-prada-ayu' => 'prada ayu',
            'jawa-arctic-frost' => 'arctic frost',
            'jawa-purple-dream' => 'purple dream',
            'jawa-burgundy-wine' => 'burgundy',
            'jawa-ruby-luxe' => 'ruby luxe',
            'jawa-pastel-mix' => 'pastel mix',
            'jawa-citrus-pop' => 'citrus pop',
            'jawa-soft-pink' => 'soft pink',
            'jawa-midnight-navy' => 'midnight navy',
            'sunda-mega-mendung' => 'mega mendung',
            'sunda-siger-wangi' => 'siger wangi',
            'sunda-parahyangan' => 'parahyangan',
            'sunda-kembang-peuteuy' => 'kembang peuteuy',
            'sunda-ratu-sunda' => 'ratu sunda',
            'sunda-angklung-kasih' => 'angklung',
            'sunda-priangan-lembut' => 'priangan lembut',
            'sunda-sangkuriang' => 'sangkuriang',
            'sunda-dayang-sumbi' => 'dayang sumbi',
            'sunda-citarum-ayu' => 'citarum',
            'sunda-bunga-kantil' => 'bunga kantil',
            'sunda-cireundeu-asih' => 'cireundeu',
            'minang-rumah-gadang' => 'rumah gadang',
            'minang-gonjong-amah' => 'gonjong amah',
            'minang-suntiang-permata' => 'suntiang permata',
            'minang-songket-padang' => 'songket padang',
            'minang-ranah-minang' => 'ranah minang',
            'minang-bundo-kanduang' => 'bundo kanduang',
            'minang-siti-nurbaya' => 'siti nurbaya',
            'minang-singgalang' => 'singgalang',
            'minang-marawa-pusako' => 'marawa pusako',
            'minang-anak-daro' => 'anak daro',
            'nusantara-tenun-ikat' => 'tenun ikat',
            'nusantara-ulos-hela' => 'ulos hela',
            'nusantara-nusantara-raya' => 'nusantara raya',
            'nusantara-wastra-timur' => 'wastra timur',
            'nusantara-toraja-tallu' => 'toraja tallu',
            'nusantara-dayak-ranying' => 'dayak ranying',
            'nusantara-bunga-cengkeh' => 'bunga cengkeh',
            'nusantara-sabu-raijua' => 'sabu raijua',
            'minimalis-aria' => 'aria',
            'minimalis-bening' => 'bening',
            'minimalis-nadi' => 'nadi',
            'minimalis-ruang' => 'ruang',
            'minimalis-kanvas' => 'kanvas',
            'minimalis-selaras' => 'selaras',
            'minimalis-lumen' => 'lumen',
            'minimalis-sudut' => 'sudut',
            'minimalis-grafik' => 'grafik',
            'minimalis-sunyi' => 'sunyi',
            'minimalis-kaca' => 'kaca',
            'minimalis-aksara' => 'aksara',
            'minimalis-monoline' => 'monoline',
            'minimalis-rona' => 'rona',
            'floral-rosalind' => 'rosalind',
            'floral-peony-putih' => 'peony putih',
            'floral-taman-ayu' => 'taman ayu',
            'floral-anggrek-bulan' => 'anggrek bulan',
            'floral-bunga-kertas' => 'bunga kertas',
            'floral-magnolia' => 'magnolia',
            'floral-lavender-fields' => 'lavender fields',
            'floral-sakura-lembut' => 'sakura lembut',
            'floral-daisy-pagi' => 'daisy pagi',
            'floral-rosewood' => 'rosewood',
            'islami-ar-rum-21' => 'ar-rum',
            'islami-nurul-iman' => 'nurul iman',
            'islami-baarakallahu' => 'baarakallahu',
            'islami-misykah' => 'misykah',
            'islami-mihrab-cinta' => 'mihrab cinta',
            'islami-salam-khusyuk' => 'salam khusyuk',
            'islami-zahra-and-ahmad' => 'zahra',
            'islami-barokah-jannah' => 'barokah jannah',
            'akad-dua-janji' => 'dua janji',
            'akad-sakral-and-syahdu' => 'sakral',
            'akad-satu-hari-dua-acara' => 'satu hari dua acara',
            'akad-khitbah' => 'khitbah',
            'akad-akad-and-resepsi' => 'akad & resepsi',
            'internasional-maison' => 'maison',
            'internasional-editorial-vows' => 'editorial vows',
            'internasional-nusantara-fusion' => 'nusantara fusion',
            'internasional-the-grand-affair' => 'grand affair',
            'internasional-bilingual-bliss' => 'bilingual bliss',
        ];
        $isSundaString = str_contains($raw, 'sunda');
        $isJawaString = str_contains($raw, 'jawa') || str_contains($raw, 'keraton');
        $isMinangString = str_contains($raw, 'minang') || str_contains($raw, 'padang') || str_contains($raw, 'gonjong');
        $isIntlString = str_contains($raw, 'internasional') || str_contains($raw, 'bilingual') || str_contains($raw, 'fusion');
        $isFloralString = str_contains($raw, 'floral');
        $isIslamiString = str_contains($raw, 'islami') && ! $isFloralString;
        $isDualString = str_contains($raw, 'akad') || str_contains($raw, 'resepsi');
        $isNusantaraString = ! $isIntlString && (str_contains($raw, 'nusantara') || str_contains($raw, 'tenun') || str_contains($raw, 'ulos')
            || str_contains($raw, 'toraja') || str_contains($raw, 'dayak') || str_contains($raw, 'wastra')
            || str_contains($raw, 'sabu') || str_contains($raw, 'cengkeh'));
        $isModernString = str_contains($raw, 'minimalis modern') || str_contains($raw, 'modern');
        foreach ($adatNames as $adatKey => $needle) {
            // Nama khas satu budaya tidak boleh menyerobot budaya lain (mis. "Adat Sunda — Arctic Frost").
            if ($isSundaString && ! str_starts_with($adatKey, 'sunda-')) {
                continue;
            }
            if ($isMinangString && ! str_starts_with($adatKey, 'minang-')) {
                continue;
            }
            if ($isNusantaraString && ! str_starts_with($adatKey, 'nusantara-')) {
                continue;
            }
            if ($isModernString && ! str_starts_with($adatKey, 'minimalis-')) {
                continue;
            }
            if ($isIntlString && ! str_starts_with($adatKey, 'internasional-')) {
                continue;
            }
            if ($isFloralString && ! str_starts_with($adatKey, 'floral-')) {
                continue;
            }
            if ($isIslamiString && ! str_starts_with($adatKey, 'islami-')) {
                continue;
            }
            if ($isDualString && ! str_starts_with($adatKey, 'akad-')) {
                continue;
            }
            if ($isJawaString && (str_starts_with($adatKey, 'sunda-') || str_starts_with($adatKey, 'minang-')
                || str_starts_with($adatKey, 'nusantara-') || str_starts_with($adatKey, 'minimalis-'))) {
                continue;
            }
            if (str_contains($raw, $needle)) {
                return $adatKey;
            }
        }

        $isJawaContext = str_contains($raw, 'jawa') || str_contains($raw, 'keraton') || str_contains($cat, 'jawa');
        if ($isJawaContext) {
            $adatPalettes = [
                'ocean blue' => 'jawa-keraton-agung',
                'clean white' => 'jawa-sekar-kedhaton',
                'dusty rose' => 'jawa-gunungan-emas',
                'sage green' => 'jawa-batik-parang',
                'rose gold' => 'jawa-gebyok-ukir',
                'blueberry' => 'jawa-melati-kraton',
                'yellow sunshine' => 'jawa-sogan-klasik',
                'plum velvet' => 'jawa-wijaya-kusuma',
                'monochrome' => 'jawa-sekar-jagad',
                'coral' => 'jawa-prada-ayu',
                'arctic frost' => 'jawa-arctic-frost',
                'purple dream' => 'jawa-purple-dream',
                'burgundy' => 'jawa-burgundy-wine',
                'ruby' => 'jawa-ruby-luxe',
                'pastel mix' => 'jawa-pastel-mix',
                'citrus' => 'jawa-citrus-pop',
                'soft pink' => 'jawa-soft-pink',
                'midnight navy' => 'jawa-midnight-navy',
            ];
            foreach ($adatPalettes as $needle => $adatKey) {
                if (str_contains($raw, $needle)) {
                    return $adatKey;
                }
            }
        }

        // 1c. Adat Sunda suite 19–20.
        $isSundaContext = str_contains($raw, 'sunda') || str_contains($cat, 'sunda') || str_contains($sub, 'sunda');
        if ($isSundaContext) {
            $sundaPalettes = [
                'sage green' => 'sunda-mega-mendung',
                'sage' => 'sunda-mega-mendung',
                'rose gold' => 'sunda-siger-wangi',
                'rose' => 'sunda-siger-wangi',
                'blueberry' => 'sunda-parahyangan',
                'yellow sunshine' => 'sunda-kembang-peuteuy',
                'plum velvet' => 'sunda-ratu-sunda',
                'monochrome' => 'sunda-angklung-kasih',
                'coral' => 'sunda-priangan-lembut',
                'arctic frost' => 'sunda-sangkuriang',
                'purple dream' => 'sunda-dayang-sumbi',
                'burgundy' => 'sunda-citarum-ayu',
                'ruby' => 'sunda-bunga-kantil',
                'pastel mix' => 'sunda-cireundeu-asih',
            ];
            foreach ($sundaPalettes as $needle => $sundaKey) {
                if (str_contains($raw, $needle)) {
                    return $sundaKey;
                }
            }

            return 'sunda-mega-mendung';
        }

        // 1d. Adat Minang suite 31–40.
        $isMinangContext = str_contains($raw, 'minang') || str_contains($raw, 'padang')
            || str_contains($raw, 'gonjong') || str_contains($cat, 'minang') || str_contains($sub, 'minang');
        if ($isMinangContext) {
            $minangPalettes = [
                'burgundy' => 'minang-rumah-gadang',
                'ruby' => 'minang-gonjong-amah',
                'pastel mix' => 'minang-suntiang-permata',
                'citrus' => 'minang-songket-padang',
                'soft pink' => 'minang-ranah-minang',
                'midnight navy' => 'minang-bundo-kanduang',
                'cyber neon' => 'minang-siti-nurbaya',
                'bold red' => 'minang-singgalang',
                'mint' => 'minang-marawa-pusako',
                'ocean blue' => 'minang-anak-daro',
            ];
            foreach ($minangPalettes as $needle => $minangKey) {
                if (str_contains($raw, $needle)) {
                    return $minangKey;
                }
            }

            return 'minang-rumah-gadang';
        }

        // 1e. Adat Nusantara lainnya 41–48.
        $isNusantaraContext = str_contains($raw, 'nusantara') || str_contains($raw, 'tenun') || str_contains($raw, 'ulos')
            || str_contains($raw, 'toraja') || str_contains($raw, 'dayak') || str_contains($raw, 'wastra')
            || str_contains($raw, 'sabu') || str_contains($raw, 'cengkeh') || str_contains($cat, 'nusantara');
        if ($isNusantaraContext) {
            $nusantaraPalettes = [
                'dusty rose' => 'nusantara-tenun-ikat',
                'sage green' => 'nusantara-ulos-hela',
                'rose gold' => 'nusantara-nusantara-raya',
                'blueberry' => 'nusantara-wastra-timur',
                'yellow sunshine' => 'nusantara-toraja-tallu',
                'plum velvet' => 'nusantara-dayak-ranying',
                'monochrome' => 'nusantara-bunga-cengkeh',
                'coral' => 'nusantara-sabu-raijua',
            ];
            foreach ($nusantaraPalettes as $needle => $nusantaraKey) {
                if (str_contains($raw, $needle)) {
                    return $nusantaraKey;
                }
            }

            return 'nusantara-tenun-ikat';
        }

        // 1f. Minimalis Modern 49–60 (non-etnis).
        $isModernContext = str_contains($raw, 'minimalis') || str_contains($cat, 'minimalis')
            || str_contains($raw, 'korporat') || str_contains($raw, 'rustic');
        if ($isModernContext) {
            $modernPalettes = [
                'citrus' => 'minimalis-aria',
                'soft pink' => 'minimalis-bening',
                'midnight navy' => 'minimalis-nadi',
                'cyber neon' => 'minimalis-ruang',
                'bold red' => 'minimalis-kanvas',
                'mint' => 'minimalis-selaras',
                'ocean blue' => 'minimalis-lumen',
                'clean white' => 'minimalis-sudut',
                'dusty rose' => 'minimalis-grafik',
                'sage green' => 'minimalis-sunyi',
                'rose gold' => 'minimalis-kaca',
                'blueberry' => 'minimalis-aksara',
                'yellow sunshine' => 'minimalis-monoline',
                'plum velvet' => 'minimalis-rona',
            ];
            foreach ($modernPalettes as $needle => $modernKey) {
                if (str_contains($raw, $needle)) {
                    return $modernKey;
                }
            }

            return 'minimalis-aria';
        }

        // 1g. Elegan & Floral 63–70.
        $isFloralContext = str_contains($raw, 'floral') || str_contains($raw, 'pastel floral')
            || (str_contains($raw, 'islami') && str_contains($cat, 'floral')) || str_contains($cat, 'floral');
        if ($isFloralContext) {
            $floralPalettes = [
                'coral' => 'floral-daisy-pagi',
                'arctic frost' => 'floral-rosewood',
                'clean white' => 'floral-rosalind',
                'dusty rose' => 'floral-peony-putih',
                'sage green' => 'floral-taman-ayu',
                'rose gold' => 'floral-anggrek-bulan',
                'blueberry' => 'floral-bunga-kertas',
                'yellow sunshine' => 'floral-magnolia',
                'plum velvet' => 'floral-lavender-fields',
                'monochrome' => 'floral-sakura-lembut',
            ];
            foreach ($floralPalettes as $needle => $floralKey) {
                if (str_contains($raw, $needle)) {
                    return $floralKey;
                }
            }

            return 'floral-rosalind';
        }

        // 1h. Islami 73–80.
        $isIslamiContext = str_contains($raw, 'islami') || str_contains($cat, 'islami')
            || str_contains($raw, 'mashrabiya') || str_contains($raw, 'kubah');
        if ($isIslamiContext) {
            $islamiPalettes = [
                'burgundy' => 'islami-ar-rum-21',
                'ruby' => 'islami-nurul-iman',
                'pastel mix' => 'islami-baarakallahu',
                'citrus' => 'islami-misykah',
                'soft pink' => 'islami-mihrab-cinta',
                'midnight navy' => 'islami-salam-khusyuk',
                'cyber neon' => 'islami-zahra-and-ahmad',
                'bold red' => 'islami-barokah-jannah',
            ];
            foreach ($islamiPalettes as $needle => $islamiKey) {
                if (str_contains($raw, $needle)) {
                    return $islamiKey;
                }
            }

            return 'islami-ar-rum-21';
        }

        // 1i. Akad & Resepsi 81–85.
        $isDualContext = str_contains($raw, 'akad') || str_contains($cat, 'akad')
            || str_contains($raw, 'resepsi') || str_contains($raw, 'dual');
        if ($isDualContext) {
            $dualPalettes = [
                'rose gold' => 'akad-dua-janji',
                'blueberry' => 'akad-sakral-and-syahdu',
                'yellow sunshine' => 'akad-satu-hari-dua-acara',
                'plum velvet' => 'akad-khitbah',
                'monochrome' => 'akad-akad-and-resepsi',
            ];
            foreach ($dualPalettes as $needle => $dualKey) {
                if (str_contains($raw, $needle)) {
                    return $dualKey;
                }
            }

            return 'akad-dua-janji';
        }

        // 1j. Internasional bilingual 86–90.
        $isIntlContext = str_contains($raw, 'internasional') || str_contains($raw, 'bilingual')
            || str_contains($raw, 'fusion') || str_contains($cat, 'internasional');
        if ($isIntlContext) {
            $intlPalettes = [
                'earth tone' => 'internasional-maison',
                'lavender' => 'internasional-editorial-vows',
                'chocolate' => 'internasional-nusantara-fusion',
                'orange' => 'internasional-the-grand-affair',
                'cherry blossom' => 'internasional-bilingual-bliss',
            ];
            foreach ($intlPalettes as $needle => $intlKey) {
                if (str_contains($raw, $needle)) {
                    return $intlKey;
                }
            }

            return 'internasional-maison';
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
        if (str_contains($raw, 'green mosque') || str_contains($raw, 'syiar') || (str_contains($raw, 'pengajian') && ! str_contains($raw, 'rumah'))) {
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
        if (str_contains($raw, 'sahaja') || str_contains($raw, 'khitan-sahaja') || str_contains($raw, 'walimatul-khitan-sahaja') || (str_contains($raw, 'khitan') && (str_contains($raw, 'basic') || str_contains($cat, 'basic')))) {
            return 'walimatul-khitan-sahaja';
        }
        if (str_contains($cat, 'khitan') || str_contains($raw, 'khitan') || str_contains($raw, 'sunat') || str_contains($sub, 'khitan')) {
            return 'walimatul-khitan';
        }

        // 4. Halal Bihalal & Silaturahmi Idul Fitri
        if (str_contains($raw, 'halal') || str_contains($raw, 'ketupat') || str_contains($raw, 'silaturahmi')
            || str_contains($sub, 'halal') || str_contains($cat, 'halalbihalal')) {
            return 'halal-bihalal';
        }

        // 5. Syukuran Rumah Baru / Tasyakuran Usaha
        if (str_contains($raw, 'rumah') || (str_contains($raw, 'syukuran') && ! str_contains($raw, 'khitan'))
            || (str_contains($sub, 'tasyakuran') && ! str_contains($sub, 'khitan'))
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
        $themes = [
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
            [
                'key' => 'walimatul-khitan-sahaja',
                'template_key' => 'walimatul-khitan-sahaja',
                'name' => 'Walimatul Khitan Sahaja Berkah',
                'category' => 'khitanan',
                'category_label' => 'Khitanan',
                'sub_category' => 'Tasyakuran walimatul khitan',
                'tier' => 'basic',
                'price' => 'Rp50.000',
                'badge' => '✂️ Khitanan • Basic Sahaja',
                'package_val' => 'Paket Basic - Rp50.000',
                'event_cat' => 'Khitanan',
                'sub_cat' => 'Tasyakuran walimatul khitan',
                'theme_css' => 'theme-khitan-sahaja',
                'skin' => 'skin-khitan-sahaja',
                'desc' => 'Desain tasyakuran walimatul khitan bersih, hangat & islami bernuansa Sage Green & Emas Lembut: doa anak sholeh, rundown acara walimah, rute lokasi & amplop tali asih jagoan.',
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=700&q=80&auto=format&fit=crop',
                'default_cover' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1200&q=80&auto=format&fit=crop',
                'live_url' => url('/demo/walimatul-khitan-sahaja'),
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
            // 3b. TIER EKSKLUSIF: Adat Jawa suite 01–10
            // ==========================================
            ...self::adatJawaCatalogThemes(),

            // ==========================================
            // 3c. TIER EKSKLUSIF: 89 template event (non-pernikahan)
            // ==========================================
            ...self::eventCatalogThemes(),

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

        // Yang ditawarkan hanya 179 template suite modern (× 4 paket). Template legacy tetap hidup di
        // /demo/{key} untuk tautan lama, tetapi tidak lagi muncul di galeri builder.
        $legacyKeys = array_keys(array_filter(self::all(), fn ($t) => ! empty($t['legacy'])));

        $themes = array_values(array_filter($themes, fn ($t) => ! in_array($t['key'] ?? '', $legacyKeys, true)));

        // Setiap template modern dijual dalam 4 paket (Stitch: satu desain × 4 catatan paket),
        // jadi katalog menyimpan matriks harga + catatan per paket, bukan satu tier tetap.
        $tierMatrix = self::tierMatrix();

        return array_map(function (array $t) use ($tierMatrix) {
            if (empty($t['is_custom'])) {
                $t['tiers'] = $tierMatrix;
            }

            return $t;
        }, $themes);
    }

    /**
     * Matriks 4 paket — sumber tunggal harga & catatan desain per paket.
     *
     * Catatan mengikuti label pada layar Stitch (mis. `SLIDING GATE • 300 TAMU`,
     * `3D ENVELOPE + PARALLAX • UNLIMITED VIP`): mekanisme pembuka + kuota tamu.
     *
     * @return array<string, array{label: string, price: string, note: string, note_envelope: string, color: string}>
     */
    public static function tierMatrix(): array
    {
        return [
            'basic' => [
                'label' => 'Basic',
                'price' => 'Rp50.000',
                'note' => 'FLAT COVER • 100 TAMU',
                'note_envelope' => 'FLAT COVER • 100 TAMU',
                'color' => 'emerald',
            ],
            'premium' => [
                'label' => 'Premium',
                'price' => 'Rp110.000',
                'note' => 'SLIDING GATE • 300 TAMU',
                'note_envelope' => '3D ENVELOPE • 300 TAMU',
                'color' => 'blue',
            ],
            'eksklusif' => [
                'label' => 'Eksklusif',
                'price' => 'Rp180.000',
                'note' => '3D V-ANGLE GATE • UNLIMITED',
                'note_envelope' => '3D ENVELOPE + PARALLAX • UNLIMITED',
                'color' => 'orange',
            ],
            'kustom' => [
                'label' => 'Kustom',
                'price' => 'Rp280.000',
                'note' => 'BESPOKE STUDIO • UNLIMITED VIP',
                'note_envelope' => 'BESPOKE STUDIO • UNLIMITED VIP',
                'color' => 'purple',
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
                'event_heading' => 'LỄ THÀNH HÔN • THE WEDDING',
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
                    (object) [
                        'title' => 'Akad Nikah / Lễ Vu Quy',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:30 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Masjid Raya Al-Azhar Senayan',
                        'address' => 'Jl. Sisingamangaraja No. 1, Kebayoran Baru, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                    (object) ['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 4],
                    (object) ['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800', 'sort_order' => 5],
                    (object) ['image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800', 'sort_order' => 6],
                ]),
            ],
            'wildflower-pink' => [
                'slug' => 'wildflower-pink-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Elegan, floral, dan islami',
                'theme' => 'Wildflower Pink (Rose Romance)',
                'package_name' => 'Paket Premium - Rp110.000',
                'event_heading' => 'THE WEDDING CELEBRATION',
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
                    (object) [
                        'title' => 'Sacred Holy Matrimony & Akad',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'The Botanical Pavilion, Glasshouse Dago',
                        'address' => 'Jl. Dago Pakar Timur No. 88, Ciburial, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'javanese-royal' => [
                'slug' => 'javanese-royal-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Jawa, Sunda, Minang, dan lainnya',
                'theme' => '3D Javanese Royal Keraton',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'SERAT ULEM PAHARGYAN',
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
                'quote' => 'Semoga Tuhan Yang Maha Pemurah senantiasa melimpahkan berkah, keselamatan, dan ketenteraman dalam membangun rumah tangga.',
                'bank_name_1' => 'BCA',
                'bank_account_1' => '0372918291',
                'bank_holder_1' => 'Dananjaya Wicaksono',
                'bank_name_2' => 'Mandiri',
                'bank_account_2' => '1370009827361',
                'bank_holder_2' => 'Sekarwangi Prabaningrum',
                'gift_address' => 'Ndalem Dananjayan, Jl. Wijilan No. 24, Panembahan, Kraton, Yogyakarta (081328901234)',
                'music_url' => 'wedding-melody.wav',
                'events' => collect([
                    (object) [
                        'title' => 'Akad Ijab Kabul & Panggih Adat Jawa',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Gedhong Dalem Pendopo Agung',
                        'address' => 'Ndalem Mangkubumen, Kadipaten, Kraton, Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'batak-heritage' => [
                'slug' => 'batak-heritage-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Pernikahan adat Batak (Toba, Karo, Simalungun)',
                'theme' => 'Batak Istimewa Heritage',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'HORAS JALA GABE',
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
                    (object) [
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
                    (object) [
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
                    (object) ['year' => '2021', 'title' => 'Pardomuan Parjolo (Awal Pertemuan)', 'content' => 'Tuhan mempertemukan kami di persekutuan pemuda gereja di kota Medan.'],
                    (object) ['year' => '2024', 'title' => 'Marhusip & Patua Hata', 'content' => 'Dengan doa dan restu kedua orang tua serta kerabat Dalihan Na Tolu, kami mengikat janji untuk melangkah ke jenjang pernikahan kudus.'],
                ]),
                'galleries' => collect([
                    (object) ['image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 3],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 4],
                ]),
            ],
            'minimalist-floral' => [
                'slug' => 'minimalist-floral-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'theme' => 'Simple Minimalist Floral',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'THE WEDDING INVITATION',
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
                    (object) [
                        'title' => 'Akad Nikah / Holy Matrimony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'The Glass Pavilion Surabaya',
                        'address' => 'Jl. Mayjen Sungkono No. 100, Surabaya',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                ]),
            ],
            'snowfall-white' => [
                'slug' => 'snowfall-white-demo',
                'category' => 'Pernikahan',
                'sub_category' => 'Minimalis modern',
                'theme' => 'SnowFall Minimalist White',
                'package_name' => 'Paket Eksklusif - Rp180.000',
                'event_heading' => 'THE WEDDING MONOGRAPH',
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
                    (object) [
                        'title' => 'The Holy Matrimony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '10:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'The Glasshouse Chapel, St. Regis Jakarta',
                        'address' => 'Rajawali Place, Kuningan, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800', 'sort_order' => 3],
                ]),
            ],
            'tahlilan-khusyuk' => [
                'slug' => 'tahlilan-khusyuk-demo',
                'category' => 'Keagamaan',
                'sub_category' => 'Doa bersama & tahlilan',
                'theme' => 'Doa Bersama & Tahlilan Khusyuk',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'UNDANGAN DOA BERSAMA & TAHLIL',
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
                    (object) [
                        'title' => 'Shalat Jenazah / Doa Bersama Ba\'da Ashar',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '17:00 WIB',
                        'venue_name' => 'Masjid Jami\' Al-Hidayah',
                        'address' => 'Jl. Condet Raya No. 17, Kramat Jati, Jakarta Timur',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Sidang Terbuka & Pelantikan Wisuda Sarjana',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Balairung Utama Kampus UI',
                        'address' => 'Kampus UI Depok, Jawa Barat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800', 'sort_order' => 3],
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
                    (object) [
                        'title' => 'Welcoming & Red Carpet Photo',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '18:30 WIB',
                        'end_time' => '19:30 WIB',
                        'venue_name' => 'Sky Lounge Photo Booth Area',
                        'address' => 'Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 3],
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
                    (object) [
                        'title' => 'Prosesi Tasmiyah & Cukur Rambut',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Buah Batu No. 45, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Press Conference & Ribbon Cutting Ceremony',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Lobby Tower Thamrin Nine',
                        'address' => 'Jl. M.H. Thamrin No. 9, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Tausiyah Silaturahmi & Doa Bersama',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Aula Masjid Jami Al-Ikhlas',
                        'address' => 'Jl. Kebagusan Raya No. 45, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=800', 'sort_order' => 2],
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
                'groom_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
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
                    (object) [
                        'title' => 'Doa Bersama & Tausiyah Khitanan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Bpk. Irfan',
                        'address' => 'Jl. Gegerkalong Hilir No. 18, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800', 'sort_order' => 2],
                ]),
            ],
            'walimatul-khitan-sahaja' => [
                'slug' => 'khitan-sahaja-demo',
                'category' => 'Khitanan',
                'sub_category' => 'Tasyakuran walimatul khitan',
                'theme' => 'Walimatul Khitan Sahaja Berkah',
                'package_name' => 'Paket Basic - Rp50.000',
                'event_heading' => 'TASYAKURAN WALIMATUL KHITAN',
                'groom_name' => 'Ahmad Fatih Al-Farisi',
                'groom_fullname' => 'Ahmad Fatih Al-Farisi',
                'groom_nickname' => 'Fatih',
                'groom_birth_order' => 'Putra Pertama Tercinta',
                'groom_father' => 'Bpk. Hendra Pratama',
                'groom_mother' => 'Ibu Rina Wijaya',
                'groom_parents' => 'Bpk. Hendra Pratama & Ibu Rina Wijaya',
                'groom_city' => 'Bandung',
                'groom_photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
                'bride_name' => 'Keluarga Besar',
                'bride_fullname' => 'Keluarga Besar Bpk. Hendra Pratama & Ibu Rina Wijaya',
                'bride_birth_order' => 'Keluarga Penyelenggara',
                'bride_father' => null,
                'bride_mother' => null,
                'bride_city' => 'Bandung',
                'bride_photo' => null,
                'cover_photo' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1200&q=80&auto=format&fit=crop',
                'wedding_date' => $weddingDate,
                'venue_name' => 'Kediaman Keluarga Besar',
                'venue_address' => 'Jl. Cisangkuy No. 42, Citarum, Kec. Bandung Wetan, Kota Bandung',
                'google_maps_link' => 'https://maps.google.com/?q=Bandung',
                'quote' => 'Dan hendaklah berkhitan bagi kaum laki-laki karena hal itu mensucikan diri dan menyempurnakan fitrah keislaman.',
                'bank_name_1' => 'Bank Mandiri',
                'bank_account_1' => '1310018899221',
                'bank_holder_1' => 'Hendra Pratama',
                'bank_name_2' => 'BCA',
                'bank_account_2' => '0148899123',
                'bank_holder_2' => 'Rina Wijaya',
                'gift_address' => 'Jl. Cisangkuy No. 42, Citarum, Kec. Bandung Wetan, Bandung 40115',
                'music_url' => 'islamic-melody.wav',
                'events' => collect([
                    (object) [
                        'title' => 'Tasyakuran & Doa Khitan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Besar',
                        'address' => 'Jl. Cisangkuy No. 42, Citarum, Bandung',
                        'maps_url' => 'https://maps.google.com/?q=Bandung',
                        'sort_order' => 1,
                    ],
                    (object) [
                        'title' => 'Walimah & Ramah Tamah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '11:30 WIB',
                        'end_time' => '14:30 WIB',
                        'venue_name' => 'Kediaman Keluarga Besar',
                        'address' => 'Jl. Cisangkuy No. 42, Citarum, Bandung',
                        'maps_url' => 'https://maps.google.com/?q=Bandung',
                        'sort_order' => 2,
                    ],
                ]),
                'galleries' => collect([
                    (object) ['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=800', 'sort_order' => 2],
                    (object) ['image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800', 'sort_order' => 3],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800', 'sort_order' => 4],
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
                    (object) [
                        'title' => 'Games Seru & Pertunjukan Sulap Ceria',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '16:30 WIB',
                        'venue_name' => 'Funworld Kids Party Room',
                        'address' => 'Mall Grand Galaxy Lt. 2, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Pengajian Khataman & Doa Selamat',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:30 WIB (Ba\'da Isya)',
                        'end_time' => '20:30 WIB',
                        'venue_name' => 'Kediaman Baru Hendra Pratama',
                        'address' => 'Cluster Gardenia Hills Blok C-12, BSD City',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Games Seru & Pentas Badut Sulap',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '15:30 WIB',
                        'end_time' => '16:30 WIB',
                        'venue_name' => 'Kidz Playground Hall',
                        'address' => 'Jl. Kemang Timur No. 12, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Cukur Rambut & Doa Tasmiyah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '10:30 WIB',
                        'venue_name' => 'Kediaman Keluarga',
                        'address' => 'Jl. Dago Asri No. 15, Bandung',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Prosesi Marhaba, Cukur Rambut & Tasmiyah',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'Pendopo Agung Ndalem Heritage',
                        'address' => 'Jl. Kemasan No. 24, Kotagede, Yogyakarta',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Shalat Berjamaah, Dzikir & Pembacaan Sholawat',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '19:00 WIB (Ba\'da Isya)',
                        'end_time' => '20:00 WIB',
                        'venue_name' => 'Ruang Utama Masjid Raya Al-Hikmah',
                        'address' => 'Jl. Kebayoran Baru No. 10, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Pengajian Manasik, Dzikir & Tausiyah Pelepasan',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:00 WIB',
                        'venue_name' => 'Aula Al-Kautsar',
                        'address' => 'Jl. Tebet Barat Raya No. 12, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Upacara Wisuda & Sidang Terbuka Senat UI',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '08:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'Balairung UI Kampus Depok',
                        'address' => 'Kampus Baru UI, Jl. Margonda Raya, Depok',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Master Commencement Ceremony & Hooding',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '12:00 WIB',
                        'venue_name' => 'Plenary Hall JCC Senayan',
                        'address' => 'Jl. Gatot Subroto No. 1, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Keynote Presentation: Future of AI Ecosystem',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '09:00 WIB',
                        'end_time' => '11:30 WIB',
                        'venue_name' => 'Auditorium Utama Menara Mandiri',
                        'address' => 'Jl. Jend. Sudirman Kav. 54-55, Jakarta Selatan',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 2],
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
                    (object) [
                        'title' => 'Registrasi, Nostalgia Photo Booth & Welcome Drink',
                        'date' => $weddingDate->copy()->format('Y-m-d'),
                        'start_time' => '16:00 WIB',
                        'end_time' => '18:00 WIB',
                        'venue_name' => 'Foyer Grand Ballroom Hotel Mulia',
                        'address' => 'Jl. Asia Afrika No. 8, Gelora, Senayan, Jakarta Pusat',
                        'maps_url' => 'https://maps.google.com',
                        'sort_order' => 1,
                    ],
                    (object) [
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
                    (object) ['image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800', 'sort_order' => 1],
                    (object) ['image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800', 'sort_order' => 2],
                ]),
            ],
        ];

        $configs += self::adatJawaDemoConfigs($weddingDate);
        $configs += self::eventDemoConfigs($weddingDate);

        $data = $configs[$key] ?? $configs['chibi-red'];

        // Apply overrides (e.g. from query params or form data)
        foreach ($overrides as $k => $v) {
            if ($v !== null && $v !== '') {
                $data[$k] = $v;
            }
        }

        // Harmonize bank attributes across different template conventions
        if (! empty($data['bank_name_1'])) {
            $data['bank_name'] = $data['bank_name_1'];
        } elseif (! empty($data['bank_name'])) {
            $data['bank_name_1'] = $data['bank_name'];
        }

        if (! empty($data['bank_account_1'])) {
            $data['account_number'] = $data['bank_account_1'];
        } elseif (! empty($data['account_number'])) {
            $data['bank_account_1'] = $data['account_number'];
        }

        if (! empty($data['bank_holder_1'])) {
            $data['account_name'] = $data['bank_holder_1'];
        } elseif (! empty($data['account_name'])) {
            $data['bank_holder_1'] = $data['account_name'];
        }

        // Harmonize date, venue, and address from custom events override if specifically provided
        if (! empty($overrides['events']) && count($overrides['events']) > 0) {
            $firstEv = is_array($overrides['events']) ? (object) $overrides['events'][0] : $overrides['events']->first();
            if ($firstEv) {
                if (empty($overrides['wedding_date']) && ! empty($firstEv->date)) {
                    try {
                        $data['wedding_date'] = Carbon::parse($firstEv->date);
                    } catch (\Exception $e) {
                    }
                }
                if (! empty($firstEv->start_time)) {
                    $data['wedding_time'] = $firstEv->start_time;
                }
                if (empty($overrides['venue_name']) && ! empty($firstEv->venue_name)) {
                    $data['venue_name'] = $firstEv->venue_name;
                }
                if (! empty($firstEv->address)) {
                    $data['venue_address'] = $firstEv->address;
                    $data['address'] = $firstEv->address;
                }
                if (! empty($firstEv->maps_url)) {
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

        // Studio kustom: nilai dari builder disimpan sebagai array/json.
        $customDesign = $overrides['custom_design'] ?? null;
        if (is_string($customDesign)) {
            $customDesign = json_decode($customDesign, true);
        }
        $data['custom_design'] = is_array($customDesign) ? $customDesign : null;

        // Return as object matching Eloquent Couple interface
        return (object) $data;
    }

    /**
     * Generate Mock Guest Object for Demo Preview
     */
    /**
     * Archetype gerbang pernikahan (9 tipe) berdasarkan sub-bab katalog.
     * Non-pernikahan mengembalikan null (gerbang memakai bentuk bawaan per tier).
     */
    public static function weddingArchetype(?string $templateKey): ?string
    {
        static $cache = [];

        $key = trim((string) $templateKey);
        if ($key === '') {
            return null;
        }

        if (! array_key_exists($key, $cache)) {
            $file = base_path('docs/template-pricing-catalog.json');
            $sub = null;

            if (is_file($file)) {
                $rows = json_decode((string) file_get_contents($file), true) ?: [];
                foreach ($rows as $row) {
                    if (($row['template_key'] ?? '') === $key) {
                        $sub = $row['l2_subbab'] ?? null;
                        break;
                    }
                }
            }

            $map = [
                'Pernikahan Adat Jawa' => 'jawa',
                'Pernikahan Adat Sunda' => 'sunda',
                'Pernikahan Adat Minang' => 'minang',
                'Pernikahan Adat Nusantara lainnya' => 'nusantara',
                'Pernikahan Minimalis Modern' => 'minimalis',
                'Pernikahan Elegan dan Floral' => 'floral',
                'Pernikahan Islami' => 'islami',
                'Akad Nikah dan Resepsi' => 'akad',
                'Pernikahan Internasional' => 'internasional',
            ];

            $cache[$key] = $sub !== null ? ($map[$sub] ?? null) : null;
        }

        return $cache[$key];
    }

    public static function getDemoGuest(?string $guestName = null): object
    {
        // Tautan memakai tanda hubung (Bapak-Andi-Wijaya) → tampilkan dengan spasi.
        $name = trim(urldecode((string) $guestName));
        if ($name !== '' && ! str_contains($name, ' ') && str_contains($name, '-')) {
            $name = str_replace('-', ' ', $name);
        }
        $name = $name !== '' ? preg_replace('/\s+/', ' ', $name) : 'Bapak / Ibu / Saudara/i';

        return (object) [
            'name' => $name,
            'slug' => Str::slug($name),
            'category' => 'Tamu Kehormatan',
            'quota' => 2,
        ];
    }

    /**
     * Generate Sample Wishes
     */
    public static function getDemoWishes(): Collection
    {
        return collect([
            (object) [
                'sender_name' => 'Budi Santoso & Keluarga',
                'name' => 'Budi Santoso & Keluarga',
                'message' => 'Selamat dan sukses selalu! Semoga senantiasa dipenuhi keberkahan, rahmat, dan kebahagiaan.',
                'created_at' => Carbon::now()->subHours(2),
            ],
            (object) [
                'sender_name' => 'Dinda & Rekan Sahabat',
                'name' => 'Dinda & Rekan Sahabat',
                'message' => 'Desain undangannya cantik sekali! Turut berbahagia dan semoga acaranya berjalan lancar.',
                'created_at' => Carbon::now()->subHours(5),
            ],
            (object) [
                'sender_name' => 'Keluarga Besar Bani Sastro',
                'name' => 'Keluarga Besar Bani Sastro',
                'message' => 'Barakallahu fiikum. Turut berbahagia dan insyaAllah kami hadir mendoakan.',
                'created_at' => Carbon::now()->subDay(),
            ],
        ]);
    }
}
