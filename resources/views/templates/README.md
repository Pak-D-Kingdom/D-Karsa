# Struktur Template Undangan D'Karsa

Semua template disusun mengikuti **Bab → Sub-Bab**, sama persis dengan pengkategorian di halaman katalog dan form pemesanan. Tidak ada file template di root folder ini.

```
templates/
├── pernikahan/            BAB 1 — Undangan Pernikahan (90)
│   ├── jawa/              18 template
│   ├── sunda/             12
│   ├── minang/            10
│   ├── nusantara/          9
│   ├── minimalis/         16
│   ├── floral/            11
│   ├── islami/             8
│   ├── akad/               5
│   ├── internasional/      5
│   └── oriental/           1  (Chibi Red)
├── ulang-tahun/           BAB 2 — Ulang Tahun (13)
│   ├── anak/               8
│   └── remaja/             5
├── aqiqah/                BAB 3 — Aqiqah & Kelahiran (25)
│   ├── aqiqah/             9
│   ├── kelahiran/          5
│   ├── tasmiyah/           5
│   └── khitanan/           6
├── keagamaan/             BAB 4 — Keagamaan (30)
│   ├── pengajian/          7
│   ├── tasyakuran/         6
│   ├── maulid/             4
│   ├── bukber/             4
│   ├── safar/              5
│   └── halal-bihalal/      4
├── wisuda/                BAB 5 — Wisuda & Kelulusan (18)
│   ├── wisuda/             9
│   ├── kelulusan/          5
│   └── syukuran/           4
├── acara-formal/          BAB 6 — Acara Formal (22)
│   ├── seminar/            7
│   ├── gathering/          5
│   ├── grand-opening/      4
│   ├── peluncuran/         3
│   └── komunitas/          3
└── partials/              shell bersama (adat-theme, event-theme, gate, crest, gallery)
```

## Menambah template baru

1. **Buat file** di folder yang sesuai, mis. `pernikahan/jawa/jawa-pringgondani.blade.php`.
   Isinya hanya array `$tj` + satu baris include:

   ```blade
   @php
       $tj = [
           'num' => 91, 'key' => 'jawa-pringgondani', 'name' => 'Pringgondani',
           'sub' => 'Adat Jawa', 'palette' => 'Sogan Klasik', 'culture' => 'jawa',
           'gate' => 'straight', 'hero' => 'arch', 'gallery' => 'collage',
           'cover' => 'https://…',
           'c' => [
               'bg' => '#FBF7EF', 'surface' => '#FFFFFF', 'ink' => '#241E14', 'soft' => '#6B5E4B',
               'accent' => '#B98F45', 'onAccent' => '#FFFFFF', 'accent2' => '#E8D6A8', 'deep' => '#3A2E1C',
           ],
       ];
   @endphp
   @include('templates.partials.adat-theme')
   ```

2. **Daftarkan path-nya** di `config/template-paths.php`:

   ```php
   'jawa-pringgondani' => 'templates.pernikahan.jawa.jawa-pringgondani',
   ```

3. **Daftarkan meta-nya** di `app/Services/TemplateManager.php`:
   - template adat → tambahkan baris di `adatJawaMeta()`
   - template event → tambahkan di `eventMeta()`

   lalu (opsional) tambahkan entri harga di `docs/template-pricing-catalog.json` agar muncul di filter katalog.

## Catatan

- `TemplateManager::viewPath($key)` adalah satu-satunya tempat yang menerjemahkan key → lokasi view. Kalau file dipindah, cukup ubah `config/template-paths.php`.
- Shell bersama (`partials/adat-theme.blade.php` untuk pernikahan, `partials/event-theme.blade.php` untuk 5 bab lainnya) **tidak perlu disentuh** untuk menambah varian baru — cukup palette + `$tj`.
- Cek cepat setelah menambah: `php artisan test --compact tests/Feature/AdatJawaTemplatesTest.php` (pernikahan) atau `tests/Feature/EventTemplatesTest.php` (bab 2–6).
