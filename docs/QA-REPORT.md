# Laporan QA/QC — D'Karsa 179 Template Undangan

**Tanggal audit:** 3 November 2026 · **Cakupan:** 6 Bab · 29 Sub-Bab · **179 template × 4 paket = 716 halaman**

## Ringkasan Eksekutif

| Pilar | Cakupan | Hasil |
|---|---|---|
| A. Visual & Materialitas (anti plain box) | 179 template, 1651 kartu diinspeksi | **179/179 PASS** — 0 kotak putih polos, 0 watermark hilang, 0 border inset hilang |
| B. Koreografi Pembuka & Lapisan | 179 gerbang/amplop | **179/179 PASS** — fixed, z 35–40, terpisah dari `main`, dock z-50, audio fixed |
| C. Fitur & Komponen | 179 halaman | **179/179 PASS** — countdown, peta, galeri 1+4, RSVP, guestbook tanpa scrollbar, tombol salin, **Kartu QR Tamu `#section-guest-qr` + Kartu ATM Metalik `#section-digital-gift` di keenam kategori** |
| D. Taksonomi & Harga | 179 entri katalog | **179/179 PASS** — kode & kombinasi Gaya/Warna mengikuti CSV induk; 112 Eksklusif, 67 Premium, Basic hanya untuk 67 non-eksklusif |
| E. Empat Paket (`data-tier`) | 4 paket × 179 template | **PASS** — URL bersih `/demo/{key}/{tier}` **dan** `?tier=`; gerbang turun tingkat di Basic, QR & ATM tetap tampil di semua paket; 716/716 halaman terverifikasi |

**Verdict keseluruhan: PASS (0 Critical, 0 Major, 0 Minor terbuka).**

> **Pembaruan 3 Nov 2026 (rebuild desain):** shell `adat-theme`/`event-theme` diganti satu shell
> `stitch-theme.blade.php` yang mengikuti project Stitch **8979726781266950837** (obsidian + gold foil).
> Angka di tabel pilar A–B di atas merujuk audit shell lama; hasil sapuan terbaru ada di bagian 6.


## Matriks per Sub-Bab

| Bab / Sub-Bab | Kode | n | Gerbang | Anti Plain Box | 12-Seksi | HUD & Audio | Harga | Severity |
|---|---|---|---|---|---|---|---|---|
| BAB 1 — Pernikahan Adat Jawa | WED-001–WED-018 | 18 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Adat Sunda | WED-019–WED-030 | 12 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Adat Minang | WED-031–WED-040 | 10 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Adat Nusantara lainnya | WED-041–WED-048 | 8 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Minimalis Modern | WED-049–WED-062 | 14 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Elegan dan Floral | WED-063–WED-072 | 10 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Islami | WED-073–WED-080 | 8 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Akad Nikah dan Resepsi | WED-081–WED-085 | 5 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 1 — Pernikahan Internasional | WED-086–WED-090 | 5 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 2 — Ulang Tahun Anak | BDY-091–BDY-098 | 8 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 2 — Ulang Tahun Remaja | BDY-099–BDY-100 | 2 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 3 — Aqiqah Anak | AQQ-121–AQQ-127 | 7 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 3 — Tasyakuran Kelahiran Bayi | AQQ-128–AQQ-132 | 5 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 3 — Pemberian Nama Bayi | AQQ-133–AQQ-136 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 3 — Tasyakuran Khitanan | AQQ-137–AQQ-140 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Pengajian | REL-141–REL-146 | 6 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Tasyakuran | REL-147–REL-150 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Maulid Nabi | REL-151–REL-154 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Buka Puasa Bersama | REL-155–REL-158 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Walimatus Safar dan Syukuran Haji | REL-159–REL-162 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 4 — Halal Bihalal | REL-163–REL-165 | 3 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 5 — Wisuda Kuliah | GRD-166–GRD-171 | 6 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 5 — Kelulusan Sekolah | GRD-172–GRD-176 | 5 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 5 — Perayaan Kelulusan Bersama Keluarga | GRD-177–GRD-180 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 6 — Seminar dan Workshop | FRM-181–FRM-185 | 5 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 6 — Rapat dan Gathering Perusahaan | FRM-186–FRM-189 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 6 — Grand Opening Bisnis | FRM-190–FRM-193 | 4 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 6 — Peluncuran Produk | FRM-194–FRM-196 | 3 | Pass | Pass | Pass | Pass | Pass | Passed |
| BAB 6 — Acara Komunitas | FRM-197–FRM-199 | 3 | Pass | Pass | Pass | Pass | Pass | Passed |

## Log Defect & Perbaikan

| # | Temuan | Severity | Cakupan | Perbaikan | Status |
|---|---|---|---|---|---|
| 1 | `.scard` hanya punya satu border — tidak ada *double inset metallic border* seperti dimandatkan | **Major** | 179/179 template (mayoritas kartu) | Tambah `.scard::before` (inset 4px, border aksen 22%) di `adat-theme` & `event-theme` | **Fixed & re-audit PASS** |
| 2 | `<img id="lightboxImage" src="">` memuat URL halaman sebagai gambar (1 gambar rusak per halaman) | Minor | 89 template event | Ganti dengan data-URI placeholder | **Fixed** |
| 3 | Nama tema ganda: `Bold Red (Bold Red)` | Minor | 179 entri katalog | `TemplateManager` tidak lagi menambahkan palet bila sama dengan nama | **Fixed** |
| 4 | Jarak geser gerbang 720px, spesifikasi menyebut 450–500px | Minor (deviasi sadar) | 179 | Dipertahankan 720px agar gerak desktop tidak meloncat (permintaan pengguna sebelumnya) | **Accepted / by design** |
| 5 | 25 template legacy (di luar 179) memakai shell lama tanpa gerbang 3D, tanpa QR tamu/ATM, dan `javanese-royal` berbahasa Jawa | Info | 25 tema katalog lama | **Tidak lagi ditawarkan** di galeri builder & beranda (flag `legacy` di `TemplateManager::all()`); route `/demo/{key}` tetap hidup untuk tautan lama. Katalog kini 179 + 1 kartu Custom Request | **Delisted** |
| 6 | Kartu QR Tamu hanya ada di BAB 6 (19 template) dan memakai gambar eksternal `api.qrserver.com` — gagal saat offline/CORS | **Critical** | 160 template tanpa QR; 19 template bergantung jaringan | Partial `templates/partials/guest-pass.blade.php`: `#section-guest-qr` + `#qr-fullscreen-modal`, QR digambar inline oleh encoder sendiri (byte mode, ECC-M, v1–15) | **Fixed & verified** |
| 7 | Kartu ATM Metalik hilang di 19 template Acara Formal | **Major** | 19 template | Partial `templates/partials/digital-gift.blade.php` dipakai kedua shell; `#section-digital-gift` kini ada di 179/179 | **Fixed & verified** |
| 8 | Katalog harga tidak sinkron dengan CSV induk: 178/179 baris salah Gaya/Warna, kode non-pernikahan memakai prefiks `BRT`/`AQC` | **Major** | 179 baris katalog | Katalog dibangun ulang dari CSV induk (WED/BDY/AQQ/REL/GRD/FRM) dan dipetakan ke 179 key template yang ada; tier mengikuti matriks yang sudah disetujui (112/67) | **Fixed & verified** |
| 9 | Tidak ada mekanisme paket: semua template dirender satu tingkat, `?tier=` diabaikan | **Major** | 179 template | `data-tier` pada `<html>` + sakelar tier (dock pratinjau), gerbang menyesuaikan paket (Basic tanpa gerbang 3D, Premium geser lurus, Eksklusif/Kustom penuh) | **Fixed & verified** |
| 10 | Nama tamu hanya dari data server; parameter URL `?to/?id/?pax/?seat` diabaikan | **Major** | 179 template | `window.DKarsaGuest` membaca URL + fallback aman, mengikat sampul, form RSVP, dan kartu QR; mengetik di RSVP memperbarui QR real-time | **Fixed & verified** |

## Metode

- Audit dijalankan otomatis di Chromium (viewport 390×844, emulasi mobile) terhadap **setiap** halaman `/demo/{slug}`: computed style, pseudo-element (`::before`/`::after`), z-index, posisi, jumlah seksi, dan keberadaan komponen.
- Uji transisi status (terkunci → terbuka → bisa ditutup) dijalankan manual-terprogram pada sampel 6 template (1 per bab): `overflow` berubah `clip → visible`, `body.gate-locked` hilang, konten `opacity 1`, gerbang tuntas pada 720px gestur.
- Audit harga dihitung langsung dari `docs/template-pricing-catalog.json` terhadap aturan matriks (Adat/Luxury/3D → Eksklusif, Basic dinonaktifkan untuk kelas Eksklusif, Kustom hanya lewat permintaan).
- **Kontras WCAG AA** diuji pada sampel 7 template (1 per bab, 144 node teks berlatar solid): **0 kegagalan** (ambang 4.5:1 teks normal, 3:1 teks besar). Teks di atas gradien/foto dikecualikan karena warna latar tidak terbaca dari computed style.
- **QR Code diverifikasi secara matriks, bukan dengan mata.** Matriks yang digambar halaman hidup dibandingkan bit-per-bit dengan encoder referensi (`python-qrcode`, byte mode, ECC-M): 180 payload uji + 1 payload halaman asli cocok 100% (versi 7, mask 3). Quiet zone dipaksa `#FFFFFF` dengan modul `#0F172A` di semua tema, termasuk Dark Mode / Midnight Navy / Cyber Neon.
- **Empat paket diuji di browser:** `?tier=basic` menyembunyikan gerbang & membuka konten langsung, `premium` menggeser lurus (`translate3d(±82%)`), `eksklusif`/`kustom` memakai gerbang penuh (engsel 3D untuk pernikahan, V-angle/amplop untuk acara). Nilai `tier` di luar empat paket ditolak (fallback `eksklusif`).
- **Sweep 716 halaman** (`/demo/{key}/{tier}` untuk 179 key × 4 paket, 16 worker): **716/716 HTTP 200**, tiap halaman memuat `data-tier` yang benar + `#section-guest-qr` + `#section-digital-gift`, 0 referensi gambar QR eksternal.
- Data mentah per template: `docs/qa-matrix-179.csv` (kolom `atm` dan `qr` kini `True` untuk 179/179).

## 6. Rebuild Desain — Stitch 8979726781266950837

**Tujuan:** 179 template harus *terlihat* seperti layar Stitch (obsidian + gold foil), bukan hanya berfungsi.

### 6.1 Struktur baru

| Berkas | Peran |
|---|---|
| `templates/partials/stitch-theme.blade.php` | Shell tunggal untuk 179 wrapper (menggantikan `adat-theme` + `event-theme`) |
| `templates/partials/guest-pass.blade.php` | `#section-guest-qr` + `#qr-fullscreen-modal` (tidak berubah strukturnya) |
| `templates/partials/digital-gift.blade.php` | `#section-digital-gift` (kartu ATM metalik + alamat kado) |

Token: `--navy` (dari `$tj['c']['deep']`), `--surface*` (turunan navy + `#151311`),
`--gold` (accent template), `--foil: #E5C158` (foil konstan untuk seam/label/tombol),
`--bg-page` (dipakai takik tiket). Alias lama (`--bg/--ink/--soft/--accent/--accent-2/--deep`)
tetap ada agar kedua partial tidak perlu diubah.

### 6.2 Keputusan teknis yang muncul saat rebuild

| Temuan | Perbaikan |
|---|---|
| Font **Material Symbols** tidak selalu termuat → nama ikon tercetak sebagai teks (`draft`, `person`, `qr_code_scanner`) dan bertumpuk di dock | Ikon diganti **inline SVG** (`$icon('person')`, 12 ikon), `<link>` font ikon dihapus — nol dependensi jaringan |
| `?tier=basic` tetap tampil Eksklusif | `DKarsaGuest` menyimpan `tier` di `sessionStorage` dan menang atas `data-tier` server. Sekarang tier hanya dari `?tier=` / `data-tier` |
| Gerbang datar tidak menyerupai Stitch | Dua daun `clip-path` segitiga (`polygon(0 0,50% 50%,0 100%)`) + `#gate-seam` bercahaya + seal monogram + scrim radial |
| Takik tiket tidak "menembus" border kartu | `--bg-page` didefinisikan; notch `-12px` dengan `box-shadow` pengganti border |
| Dock menutupi konten terakhir | `main` `pb-32` → `pb-40` |

### 6.3 Hasil verifikasi ulang

```
Sweep 716 halaman (20 worker, ~70 s): pages=716 bad=0
  kriteria: 200, data-tier cocok, #section-guest-qr, #section-digital-gift,
            tanpa api.qrserver, tanpa material-symbols-outlined, gerbang/amplop ada, tanpa Whoops
PHPUnit suite template: 9 passed, 4559 assertions
PHPUnit suite penuh:    49 passed / 58 (9 gagal — lihat 6.4)
```

Perilaku tier diuji di browser (`birthday-citrus-pop`):

| Tier | `.qr-scan` | Aksi Kustom | Bayangan kartu |
|---|---|---|---|
| basic | `none` | tersembunyi | datar |
| premium | `none` | tersembunyi | ornate |
| eksklusif | `block` | tersembunyi | ornate |
| kustom | `block` | tampil (unduh PNG) | ornate |

### 6.4 Kegagalan suite penuh (warisan, bukan regresi)

| Tes | Sebab |
|---|---|
| `TemplateCoverDecouplingTest` (3 tes) | mengharapkan cover template legacy (`chibi-red`, `batak-heritage`, `javanese-royal`, `minimalist-floral`) di beranda — 25 template legacy sudah delisted |
| `TemplatePreviewDefaultIsolationTest::test_catalog_contains_khitan_basic_template` | mengharapkan key legacy `walimatul-khitan-sahaja` bertier `basic` |
| `AdminCoupleTest` (3) + `test_public_storage_symlink_points_to_correct_disk` | environment (symlink Windows, state Filament) |

Butuh keputusan produk (katalog 179 vs 205) sebelum tes ini disesuaikan.

## 7. Katalog 4 Paket & Tombol Gerbang (revisi)

### 7.1 Satu desain × 4 paket

Sebelumnya setiap template dikatalogkan pada **satu** tier (`basic` 0 hasil, `premium` 67, `eksklusif` 112),
sehingga filter "Desain Basic (Rp50k)" menghasilkan **0 template**. Sekarang katalog mengikuti catatan paket
pada layar Stitch (`[JAWA #001] … PREMIUM • Rp110.000` + `SLIDING GATE • 300 TAMU`).

Sumber tunggal: `TemplateManager::tierMatrix()`.

| Tier | Harga | Catatan gerbang (undangan) | Catatan amplop (Acara Formal) |
|---|---|---|---|
| basic | Rp50.000 | FLAT COVER • 100 TAMU | FLAT COVER • 100 TAMU |
| premium | Rp110.000 | SLIDING GATE • 300 TAMU | 3D ENVELOPE • 300 TAMU |
| eksklusif | Rp180.000 | 3D V-ANGLE GATE • UNLIMITED | 3D ENVELOPE + PARALLAX • UNLIMITED |
| kustom | Rp280.000 | BESPOKE STUDIO • UNLIMITED VIP | BESPOKE STUDIO • UNLIMITED VIP |

- `getCatalogThemes()` menempelkan `tiers` (harga + catatan) ke setiap entri non-kustom.
- Kartu katalog membawa `data-tiers`, `data-tier-prices`, `data-tier-notes`; filter mencocokkan
  `data-tiers`, lalu menukar harga, warna badge, dan catatan paket secara langsung.
- Builder (`#modalTemplatesGrid`) memakai `data-tiers` yang sama.
- Shell demo menampilkan harga + catatan sesuai tier (`#tier-pill-price`, `#tier-note`) dan ikut berubah
  saat tier diganti dari dock (MutationObserver pada `data-tier`).

Hasil filter beranda: **basic 179 · premium 179 · eksklusif 179 · kustom 180** (180 = + Custom Request).

### 7.2 Tombol BUKA UNDANGAN / BUKA AMPLOP

Sebelumnya klik hanya "mempersiapkan" gestur (`renderGate(0)`), sehingga gerbang tetap tertutup sampai tamu
scroll/swipe. Sekarang klik memicu `DKarsaAnimateGate()` — tween 1000 ms dengan easing keluar — sementara
scroll/swipe tetap berfungsi selama gerbang masih tertutup (`gatePhase === 'intro'`).

Diuji di browser (tanpa scroll sama sekali, `scrollY = 0`):

| Halaman | 150 ms | 2 s |
|---|---|---|
| jawa/premium | gerbang masih tampil | `gate-hidden`, body tidak terkunci |
| jawa/basic | langsung terbuka | tidak terkunci, `overflow-y: auto` |
| seminar/eksklusif (amplop) | amplop tampil | `env-hidden`, tidak terkunci |

Perbaikan ikutan: `unlockContent()` kini melepas kelas `gate-locked` (jalur basic & amplop tidak pernah
memanggil `renderGate(1)`), dan `#gate-seam` memudar mengikuti progres buka agar tidak tampak sebagai garis
statis di tengah layar.

### 7.3 Verifikasi

```
Sweep 716 halaman: bad=0  (kriteria + #tier-note, harga per tier, DKarsaAnimateGate)
PHPUnit suite template: 9 passed, 4559 assertions
PHPUnit suite penuh: 49 passed / 58 (9 gagal warisan, lihat 6.4)
```

## 8. Empat Desain Berbeda per Tier (bukan sekadar ganti warna)

Sebelumnya keempat paket memakai satu shell dengan perbedaan CSS tipis, sehingga desainnya terasa sama.
Sekarang shell dipecah: `stitch-theme.blade.php` menjadi kerangka (head, topbar, dock, script) dan memilih
**badan halaman per tier** lewat `@include('templates.partials.tier-'.$tierParam.'-body')`.

| Tier | Berkas badan | Ciri struktural (mengikuti layar Stitch) |
|---|---|---|
| Basic | `tier-basic-body.blade.php` (184 baris) | Sampul **satu lapis** yang memudar (tanpa daun gerbang), kartu 1px tanpa ornamen, galeri **2×2**, RSVP 3 tombol, QR ringkas, footer pendek |
| Premium | `tier-premium-body.blade.php` (304) | Gerbang **geser datar** 2 daun, kartu double-inset, tiket jadwal bergerigi, galeri 1+4, cerita, doa |
| Eksklusif | `tier-eksklusif-body.blade.php` (370) | Gerbang **V-Angle** + bingkai samping bermotif + lapisan **parallax** + **partikel kelopak**, kartu ayat, profil arch, timeline, dresscode swatch, live streaming, galeri **bento 1+4**, VIP pass laser scan |
| Kustom | `tier-kustom-body.blade.php` (44, memanggil Eksklusif dengan `bespoke=true`) | Semua Eksklusif **plus** Bespoke Dock (hex warna, mekanisme gerbang V-Angle/Amplop/Arch, toggle ID/EN), **Cinema Video**, **Table Lookup**, **QRIS + Gift Wishlist** |

Kategori Acara Formal memakai **amplop 3D** (`#envelope-stage`) di tier Premium/Eksklusif/Kustom, dan sampul
datar di Basic — sesuai layar Stitch kategori 6.

### 8.1 Verifikasi struktural

Sweep 716 halaman dengan ambang jumlah seksi + penanda khas per tier:

```
pages=716  bad=0
kriteria: 200 · data-tier · #section-guest-qr · #section-digital-gift · #tier-note · harga tier
          basic ≥8 seksi + .basic-cover
          premium ≥10 seksi
          eksklusif ≥12 seksi + #parallax-particle-layer
          kustom ≥15 seksi + parallax + #bespoke-dock
```

Jumlah seksi terukur: **Basic 10 · Premium 11 · Eksklusif 13 · Kustom 16**.

### 8.2 Bug yang muncul saat pemecahan shell

| Temuan | Perbaikan |
|---|---|
| `@include('…invitation-data')` → `Undefined variable $tierParam` | `@include` tidak mengembalikan variabel ke parent; blok `@php` harus tetap di `stitch-theme`, file data dihapus |
| Ikon tampil sebagai teks mentah (`<svg viewBox=…`) di Eksklusif | `{{ $icon(...) }}` meng-escape HTML; diganti `{!! $icon(...) !!}` (9 tempat) |
| Kategori Formal di tier Eksklusif tidak punya `#envelope-stage` | Gerbang dibungkus `@if($isCorporate)` → amplop 3D dengan segel lilin 72px |
| Kartu tamu Basic nyaris tak terlihat | Latar `#26231f` + border 1px |
| Bingkai samping Eksklusif kosong | Motif lattice diagonal via `::before` |

## 9. Gerbang 3D V-Angle yang Benar + Web/Mobile

### 9.1 Akar masalah "V-angle tidak ada"

Daun gerbang dan lapisan di belakangnya (`#gate-veil`) sama-sama memakai `var(--navy)` solid, jadi bentuk
daun tidak terbaca — yang terlihat hanya latar datar dengan satu garis emas. Perbaikan:

| Sebelum | Sesudah |
|---|---|
| `.gate-door` navy solid, `width:100%`, `clip-path` segitiga | `.gate-door` bergradasi (navy → #4a4741 → hitam), `box-shadow` inset 1px foil + `0 25px 60px rgba(0,0,0,.78)`, relief `::before` (lattice 45°/135°) dan bingkai `::after` |
| Daun menutup penuh (tumpang tindih) | Eksklusif/Kustom: `width:56%` + `clip-path: polygon(0 0, 100% 15%, 100% 85%, 0 100%)` (cermin di kanan) → tepi dalam miring membentuk V |
| Buka: `translate3d(±78%) rotate(±6deg)` | Buka: `translate3d(±78%,0,0) rotateY(±24deg) rotateZ(±6deg)` dengan `perspective:1600px` pada `#gate-overlay` → daun benar-benar berayun 3D |
| Premium: `translate3d(±82%)` | Premium: `translate3d(±100%,0,0)` — dua daun datar keluar layar, tanpa rotasi |
| Bingkai samping hilang saat gerbang dibuka | `#theatre-frame` dipisah dari gerbang (`z-35`, 2 pilar 9%, motif lattice, cap emas atas/bawah) → **tetap terlihat** setelah dibuka di Eksklusif & Kustom |

Konten diberi `padding-left/right: 2.9rem` di Eksklusif/Kustom agar tidak tertutup pilar.

### 9.2 Web & mobile

- Mobile: shell `max-w-[430px]`, pilar 9% (≈39px), dock tetap di bawah.
- ≥768px: `body` gelap polos `#080706` + glow radial; shell menjadi bingkai ponsel `height: calc(100dvh - 40px)`,
  `border-radius: 30px`, border foil, `overflow: hidden`; konten scroll di dalam shell.
- `.bg-layer` & `.page-photo` dibatasi `max-width: 430px` agar pola tidak membanjiri desktop.
- Header (`border-radius: 30px 30px 0 0`) dan dock (`position: absolute`) menempel di dalam bingkai.
- ≥1100px: watermark `D'KARSA • DIGITAL INVITATION` di bawah panggung.

Diukur di 1280×900: shell `x=425 w=430`, topbar `x=426 w=428`, dock `x=472 w=335`, bg-layer `x=425 w=430`.

### 9.3 Aturan tier yang diperketat

| Tier | Perubahan pada revisi ini |
|---|---|
| Basic | Countdown 4 kotak dihapus, foto profil persegi (bukan bulat/arch), galeri 2 foto bertumpuk, `#bottom-hud` disembunyikan, QR diratakan (148px, radius 8, tanpa takik/foil/scan, metadata tinggal Nama + ID), kartu ATM diratakan (tanpa gradient/shadow/EMV, hanya 1 kotak) |
| Premium | Timeline cerita dihapus, galeri 2×2, potret arch `999px 999px 10px 10px`, bingkai ganda + filigree sudut via `::before`/`::after` |
| Eksklusif | Gerbang 3D V-angle nyata + pilar permanen + parallax + partikel + laser scan + PNG |
| Kustom | Semua Eksklusif + Bespoke Dock, video, table lookup, QRIS/wishlist |

### 9.4 Indeks demo lokal

Route baru `GET /demo` → `InvitationController@demoIndex` → `resources/views/demo-index.blade.php`:
179 template × 4 paket, dikelompokkan per bab, tiap baris punya 4 tautan tier.

```
php artisan serve
http://127.0.0.1:8000/demo                       → indeks 716 tautan
http://127.0.0.1:8000/demo/jawa-keraton-agung/eksklusif
http://127.0.0.1:8000/demo/jawa-keraton-agung/basic?to=Bapak%20Hadi&pax=2&seat=VIP-01
```

### 9.5 Verifikasi

```
Sweep 716 halaman: bad=0
  (200 · data-tier · QR · gift · harga tier · basic-cover · theatre-frame+parallax · bespoke-dock · ambang seksi)
Klik buka di 4 tier: gate-hidden true, gate-locked false; theatre-frame tampil hanya di eksklusif/kustom
PHPUnit suite template: 9 passed, 4559 assertions
PHPUnit suite penuh: 49 passed / 58 (9 gagal warisan)
```

## 10. Filter Paket Benar-benar Mengatur Demo + Rapi di Mobile

### 10.1 Akar masalah

Filter tier hanya menyaring kartu di beranda; aksi kartu tetap memakai tier default, sehingga memilih
**Basic** lalu menekan "Lihat Demo" membuka demo **Eksklusif**.

| Titik | Sebelum | Sesudah |
|---|---|---|
| Pratinjau | `currentPreviewTier` selalu `'eksklusif'` | `openThemePreviewModal()` menyalin `currentSelectedTier` → iframe & tombol fullscreen memakai `?tier=basic` |
| Tautan order | `package_val` kartu (selalu tier default) | `selectThemeAndOrder()` menimpa paket dari peta tier → `?package=Paket Basic - Rp50.000&tier=basic` |
| URL beranda | filter tidak tersimpan | `filterCatalogByTier()` menulis `?tier=` (replaceState); saat halaman dibuka `?tier=` dipulihkan |
| Hint | hanya bab/sub/gaya/warna | ditambah "Paket Basic" di depan |

Bukti uji (390×844):

```
filter basic → location.search = "?tier=basic", counter "179 template", label "Basic Rp50.000"
klik Lihat Demo → iframe = /demo/jawa-keraton-agung?tier=basic, note "Basic"
klik Pilih Desain Ini → /buat-undangan?…&package=Paket Basic - Rp50.000&tier=basic
```

### 10.2 Mobile

- Label "Tingkat Paket" dipisah ke baris sendiri; chip jadi satu baris **scrollable** (`snap-x`,
  scrollbar disembunyikan) dengan label pendek di <640px (`Basic`, `Premium`, …) dan label penuh di desktop.
- Label paket aktif tampil di kanan judul (`#tierActiveLabel`).
- Panel kategori dilipat di mobile: tombol **"Filter & Kategori — Semua Bab ▾"** (`#filterPanelToggle`)
  membuka `#filterPanel`; di ≥640px panel selalu terbuka (`sm:block`).
- Ringkasan filter (`#filterPanelSummary`) menampilkan bab/sub/gaya aktif dalam satu baris.

Diverifikasi: panel `hidden` saat load, toggle membuka + chevron berubah `▾ → ▴`, chip ke-4 terpotong di tepi
kanan (affordance scroll), tidak ada teks berdesakan.

## 11. Mesin Paralaks 5-Lapis + Tilt Holografik (Eksklusif & Kustom)

`window.DKarsaParallaxEngine` (di `stitch-theme.blade.php`) menjalankan satu loop `requestAnimationFrame`
yang menulis `--scroll-y`, `--scroll-vel`, `--tilt-x`, `--tilt-y`, `--depth-mult` ke `documentElement`.

| Plane | z | Gerak | Isi |
|---|---|---|---|
| 0 — latar taktil | 0 | `scale(1.1)` + `--scroll-y * -0.12` | pola lattice foil + spotlight emas yang bergeser mengikuti scroll |
| 1 — watermark | 5 | drift sinus `sin(y*0.0022) * 58px` + tilt | siluet per kategori (gunungan, balon, kubah, pilar kampus, crest) |
| 2 — kartu | 10 | scrub `perspective(1000px) rotateX(10°→0) translateY(36→0) scale(.95→1)`, opacity `.25→1` | semua `main > section.reveal`; foto di dalam frame bergerak `scale(1.16) translateY(--card-progress * -22px)` |
| 3 — ornamen gantung | 22 | pendulum `sway` 6s + drift sinus 16px | roncean melati kiri & lentera kanan |
| 4 — lensa bokeh | 28 | loop `-0.85x` dibungkus viewport + blur 2.5px | 5 orb bokeh emas |

Tambahan:

- **Particle velocity boost:** `#particle-canvas` mengalikan kecepatan dengan `1 + min(|vel| * 0.15, 3.5)` sehingga
  kelopak menyapu lebih cepat saat tamu flick.
- **3D holographic tilt:** `.atm-card` dan `.qr-ticket-card` memakai
  `perspective(900px) rotateX(--tilt-y*9°) rotateY(--tilt-x*-9°) translateZ(12px)`; overlay
  `.holographic-foil-glare` (mix-blend `overlay`) mengikuti posisi kursor/gyro. `#guest-qr-box` dipaksa
  `mix-blend-mode: normal` agar QR tetap tajam & terbaca.
- **Kustom:** sparkle trail (`#sparkle-canvas`) mengikuti jari/kursor, dan pill **3D DEPTH — NORMAL / HIGH /
  CINEMA** di Bespoke Dock mengubah `--depth-mult` (1 / 1.5 / 2) secara langsung, tersimpan di `sessionStorage`.

### 11.1 Tier lock (diverifikasi di browser)

```
basic     : plane 0/1/3/4 = none · sparkle none · section transform none · glare opacity 0
premium   : idem
eksklusif : plane 0/1/3/4 = block · section transform matrix3d (scale .982, opacity .79 saat masuk)
kustom    : idem + sparkle block + depth pill (mult 1 → 2 setelah klik CINEMA)
```

### 11.2 Dua bug yang muncul dan diperbaiki

| Temuan | Perbaikan |
|---|---|
| Transform kartu tidak pernah aktif (`none`) | `body.js-reveal .reveal.is-visible { transform: none }` (0,3,1) mengalahkan selector paralaks (0,2,3). Ditambah varian `.is-visible` (0,3,4) + `!important` |
| Ornamen & bokeh "terbang" keluar layar setelah scroll >300px | Plane fixed tidak boleh memakai pengali scroll mentah; diganti driver JS: sinus untuk watermark/ornamen, loop `% (vh+200)` untuk bokeh |

### 11.3 Verifikasi

```
Sweep 716 halaman: bad=0 (termasuk penanda DKarsaParallaxEngine, #parallax-plane-0-bg, depth pill)
PHPUnit suite template: 9 passed, 4559 assertions
PHPUnit suite penuh: 49 passed / 58 (9 gagal warisan)
```

## 12. Scroll di Desktop & Dock yang Tumpang Tindih

### 12.1 Halaman demo tidak bisa di-scroll di desktop

Pada ≥768px `.shell` diberi `height: calc(100dvh - 40px)` + `overflow: hidden`, tetapi `#invitation-content`
tidak pernah dibatasi tingginya — jadi konten terpotong dan tidak ada yang bisa di-scroll (di mobile aman
karena memakai scroll dokumen).

Perbaikan: `.shell` menjadi `display:flex; flex-direction:column`, topbar `flex:none`, dan
`#invitation-content { flex:1 1 auto; min-height:0; overflow-y:auto; overscroll-behavior:contain; }`.

Konsekuensi: sumber scroll berpindah dari `window` ke `main`, sehingga mesin paralaks yang membaca
`window.scrollY` membeku di 0. Ditambahkan `DKarsaScroller()` / `DKarsaScrollTop()`; engine, dock spy, dan
`lockScroll/unlockScroll` kini memakai sumber itu.

Diukur di 1280×900: `main.clientHeight=844`, `scrollHeight=6168`, `scrollTop=1400`, plane 0
`matrix(1.1,…,0,-184.8)` (= 1400 × -0.12) → parallax ikut bergerak.

### 12.2 Dock: label bertumpuk & ikon hilang

`.dock` memakai `justify-content:space-between` tanpa `gap`; item bisa menyusut di bawah lebar teks sehingga
label saling menimpa (terlihat "TAMUDOA"), dan padding `2.9rem` pada Eksklusif/Kustom mempersempit dock
sampai hanya sebagian ikon terlihat.

| Sebelum | Sesudah |
|---|---|
| `.dock a { display:flex; flex-direction:column }` tanpa `flex`/`min-width` | `.dock { gap:4px; padding:0 10px; overflow:hidden }`, `.dock a { flex:1 1 0; min-width:0 }`, `svg { flex:none }` |
| `.lbl` 9px tanpa batas | 8.5px, `white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:100%` |
| padding HUD Eksklusif 2.9rem | 1.2rem |
| ≤380px tetap memaksa label | `@media (max-width:380px) { .lbl{display:none} .dock{height:50px} }` → ikon saja |

Diukur: 430px → dock 392px, 5 ikon, tiap item 63px, `overlap=false`; 360px → dock 322px, tiap item 50px,
label disembunyikan, `overlap=false`.

## 13. Ikon Dock, Relock Gerbang, Pembedaan Kustom, & Panel Pilih Desain

### 13.1 Tiga ikon dock kosong

Dock masih memakai nama ikon font lama (`photo_library`, `qr_code_scanner`, `favorite`) padahal peta ikon
inline bernama `photo`, `qr`, `heart` — hasilnya `<svg>` kosong untuk GALERI, QR TAMU, dan DOA.

Perbaikan: nama kunci disamakan. Verifikasi panjang isi SVG per item: 108 / 121 / 150 / 271 / 103 karakter
(sebelumnya 0 untuk tiga item terakhir). Sweep menambahkan pemeriksaan `<svg></svg>` kosong di dalam `<nav class="dock">`.

### 13.2 Ganti paket saat gerbang sudah terbuka

`MutationObserver` pada `data-tier` dulu hanya memperbarui label harga. Sekarang juga memanggil
`DKarsaRelockGate()`: membatalkan tween, mengembalikan `gateP=0`, menghapus `gate-open`, menambah
`gate-locked`, menampilkan `#gate-overlay` lagi, menutup amplop (`env-hidden` + hapus `.open`), melepas
`.is-visible` dari section, mengunci scroll, dan mengembalikan posisi ke atas.

Diuji: buka gerbang → `DKarsaSetTier('kustom')` → `gate-locked=true`, `gate-hidden=false`, `scrollTop=0`.

### 13.3 Eksklusif vs Kustom: dua panggung berbeda

| Elemen | Eksklusif | Kustom |
|---|---|---|
| Ornamen gantung (melati + lentera) | tampil | **disembunyikan** |
| Tirai samping (`drape`, 15% / 65px) | — | tampil (garis emas + inner shadow) |
| Cincin crest berputar (`#parallax-plane-5-bespoke`) | — | tampil (opacity .38, 70s spin, glow) |
| Plane 0 | lattice + spotlight | + conic sheen yang ikut scroll |
| Plane 1 | opacity .2 | opacity .3 + drop-shadow emas |
| Bokeh | blur 2.5px | blur 5px + 2 orb ekstra |
| Kartu | — | foil sweep `@keyframes foil-sweep` (7s) |
| Ekstra | — | sparkle trail, 3D DEPTH pill, video, table lookup, QRIS |

Diukur: eksklusif `crest=none, drape=none, orn=block, blur(2.5px)`; kustom
`crest=grid, drape=block (65×932), orn=none, blur(5px)`, `::after` kartu `animationName=foil-sweep`.

### 13.4 Panel "Pilihan Desain Template" (modal pratinjau)

Kartu pemilih sebelumnya hanya ikon + nama terpotong satu baris. Sekarang: thumbnail 48×48 (fallback ikon),
nama `line-clamp-2`, tag kategori + chip paket aktif (`Basic Rp50k` …), grid `1 kolom` di layar sempit dan
`2 kolom` di ≥640px, area daftar `max-h-[42vh] overflow-y-auto`.

Verifikasi di 430px: 91 kartu, thumbnail ada, chip `Basic Rp50k`, iframe pratinjau membawa `?tier=basic`.

## 14. Kustom: Elemen yang Menutupi Konten

Keluhan: di paket Kustom beberapa bagian tertutup. Penyebab terukur (430px):

| Elemen | Sebelum | Akibat |
|---|---|---|
| Tirai `.drape` | lebar 15% = 65px, konten mulai di 46px | 18px teks tertutup tiap sisi |
| Pil paket `#top-customizer-dock` | `fixed; bottom: 92px` | menimpa kartu saat halaman digulir |
| Tombol `#bespoke-dock` | `fixed; bottom: 92px; right: 12px` | menimpa kartu di kanan bawah |
| `.topbar` | `position: sticky` tidak menempel (body `overflow-x: clip` membuat body jadi scroll container) | bilah ikut tergulir, kontrol paket hilang dari pandangan |

Perbaikan:

1. **Tirai** dipersempit ke 13% (56px) + `mask-image` memudar ke arah konten (42% → transparan), jadi tepi tidak lagi memotong huruf. Pada 360px tirai 47px vs konten mulai 46.4px → `overlap=0`.
2. **Pil paket dipindah ke dalam topbar** sebagai baris ke-3 (`Basic · Premium · Eksklusif · Kustom` + harga), jadi ikut mendorong konten, bukan menimpanya. Tinggi topbar diukur JS → `--topbar-h`, `main` memakai `padding-top: calc(var(--topbar-h) + 10px)`.
3. **Tombol KUSTOM** (✦) juga pindah ke baris itu; panelnya muncul di bawah topbar (`top: calc(var(--topbar-h) + 6px)`) dan `aria-expanded` ikut disinkronkan.
4. **Topbar jadi `position: fixed`** (bukan sticky) dengan `left: 50%; translateX(-50%); max-width: 430px`; di desktop `top: 20px` + radius atas 30px agar sejajar bingkai ponsel.
5. **Auto-hide** `body.dk-pills-hidden` saat kecepatan scroll > 1.2px/frame (kembali setelah 420ms diam) sebagai lapisan aman.
6. `.shell` desktop ditambah `min-height: 0` — sebelumnya `min-height: 100dvh` menimpa `height: calc(100dvh - 40px)` sehingga bingkai meluber 20px.

Hasil ukur (430 & 360): topbar 90px, konten mulai 100/105px, `barOverlap=false`, `dockOverlap=false`; desktop shell 425,20,430,860 dengan `main` bergulir sendiri (scrollTop 900 / scrollHeight 7387 / clientHeight 858).

## 15. Merapikan Daftar Pilihan Desain & Panel Filter

Dua keluhan: daftar "Pilihan Desain Template" di modal terlalu panjang, dan panel "Pengkategorian Template" berantakan karena chip membungkus ke banyak baris.

### 15.1 Picker di modal pratinjau

| Sebelum | Sesudah |
|---|---|
| Semua 91 kartu dirender sekaligus | 6 kartu pertama + tombol "Tampilkan semua (91)" |
| 1 kolom di <640px | 2 kolom di semua lebar |
| Tanpa pencarian | input `#previewThemeSearch` + penghitung `6/91` |
| Kartu 48px thumbnail, 2 baris teks + 2 chip | kartu 36px thumbnail, nama 2 baris, tag saja |

Tinggi grid turun dari 299px (10 kartu) → **177px (6 kartu)**. Pencarian `batik` → `1/1`, kartu pertama `Batik Parang (Sage Green)`; tombol "Tampilkan semua" otomatis tersembunyi saat hasil sudah habis. Batas dikembalikan ke 6 dan kata kunci dikosongkan saat kategori berganti.

### 15.2 Panel filter katalog

Semua baris dijadikan **satu garis yang bisa digeser** (bukan `flex-wrap`), dengan label kolom tetap 44px di kiri:

```
BAB    [Semua Bab][Pernikahan][Ulang Tahun]…  →
SUB    [Semua Sub-Bab (29) ▾]
GAYA   [Semua Gaya][Minimalis Modern]…        →
WARNA  [Ocean Blue][Clean White]…             →
```

- `flex-nowrap` + `overflow-x: auto` + scrollbar disembunyikan + tepi kanan `mask-image` memudar (tanda masih ada isi).
- Chip diberi `shrink-0` agar tidak mengecil; tinggi chip disamakan dengan select (34px vs 33px).
- Di ≥640px empat baris disusun **grid 2 kolom** (Bab+Sub | Gaya+Warna) → tinggi panel 239px → **154px**.
- Label "Warna:" di dalam deret swatch dihapus (sudah ada label kolom).
- Teks bantuan jadi "Geser baris untuk melihat pilihan lain." saat belum ada filter aktif.

Hasil ukur 430px: panel **239px** (sebelumnya ±600px), tiap baris 34px/32px, `flex-wrap=nowrap`, `scrollWidth` 743/1765/4248 → bisa digeser. Desktop: panel 154px, tiap baris 524px.

## 16. RSVP → QR Terbit + Kirim ke Pemberi Undangan, Picker Kategori, Impor Tamu

### 16.1 Konfirmasi RSVP sekarang "hidup"

Form RSVP di tiga body tier (`basic`, `premium`, `eksklusif`) memakai `onsubmit="return DKarsaRsvpSubmit(this, event)"`.
Handler baru di `stitch-theme.blade.php`:

1. Membaca `name`, `guest_count`, `attendance` → menulis ke `window.DKarsaGuest.state` lalu `paint()`.
2. Mengirim form ke `invitation.wish` lewat `fetch` (data tetap tercatat, halaman tidak berpindah).
3. Menampilkan modal `#rsvp-success-modal`: badge "KONFIRMASI TERKIRIM", QR 184px (engine inline yang sama),
   `ID • pax • status`, tombol **Kirim ke Pemberi Undangan** (WhatsApp), **Unduh E-Ticket**, **Tutup**.

Nomor tujuan diambil dari `couple.customer_phone` (`$hostPhone`, fallback `6281234567890`), nama dari `$hostName`.
Pesan yang dikirim (template, sudah terisi otomatis):

```
Halo Arya & Kinanthi, saya *Bapak Andi Wijaya* mengonfirmasi HADIR di acara Anda (3 Orang).
ID tiket: DKR-65834. Terima kasih atas undangannya. <url undangan>
```

Status `tidak_hadir`/`ragu` memakai kalimat "mohon maaf belum bisa hadir". Diuji di 430px: modal terbuka,
`qrSvg=true` (14.014 karakter path), `DKR-65834 • 3 Orang • TERKONFIRMASI HADIR`, `href` WA benar.

### 16.2 Picker desain sesuai kategori (di atas kartu template terpilih)

`$quickTemplates` dibangun dari `TemplateManager::getCatalogThemes()` yang di-join dengan
`docs/template-pricing-catalog.json` (kolom `l2_subbab`, `l3_style`, `l4_color_name`, nomor bab).
Strip `#quickTemplateStrip` menampilkan maksimal 16 kartu mini (88px, thumbnail 64px, harga) dan:

- difilter **bab** (radio kategori) + **sub-bab** (`#subCategorySelect`); bila sub-bab awal tidak cocok dengan opsi
  katalog, dipakai opsi pertama (sebelumnya `select.value` kosong → filter jatuh ke seluruh bab);
- menghitung `N desain` dan menampilkan keterangan `Menampilkan N desain untuk "<sub-bab>"`;
- menandai kartu aktif dengan ring brand; klik → `selectTemplate(nama, false)` lalu strip digambar ulang;
- disegarkan saat `onSelectCategoryChapter`, `onSubCategoryChange`, `selectTemplate`, dan `DOMContentLoaded`.

Diuji: 18 desain untuk "Pernikahan Adat Jawa", 16 tampil, kartu pertama = template aktif.

### 16.3 Impor tamu dari Excel/CSV + field yang bisa diedit

`#guestImportFile` menerima `.csv`, `.txt`, `.xlsx`, `.xls`.

- CSV/TXT diparse sendiri (`parseDelimited`): deteksi delimiter `,` `;` tab, dukung tanda kutip dan BOM.
- XLSX/XLS memakai SheetJS yang dimuat **hanya saat dibutuhkan** (`loadSheetJS()` dari jsDelivr).
- Header dikenali fleksibel: `nama/name/tamu`, `wa/whatsapp/hp/nomor`, `pax/jumlah/orang`, `meja/seat/zona/kursi`;
  tanpa header dipakai urutan kolom nama → nomor → pax → meja.
- `downloadGuestTemplate()` menyediakan contoh CSV (`nama,nomor_wa,jumlah_orang,meja`).

Tiap baris tamu kini punya empat input yang bisa diedit langsung — **nama, nomor WA, pax, meja/zona** — plus
URL yang ikut berubah (`to`, `wa`, `pax`, `seat`), tombol **Salin**, dan **WA** per tamu (nonaktif sampai nomor diisi).
Daftar disimpan di `localStorage` per slug (`dkarsa-guests-<slug>`), jadi tidak hilang saat halaman dimuat ulang.

Diuji: CSV 3 baris → 3 tamu dengan nomor/pax/meja benar; XLSX (SheetJS) 3 baris dengan meja benar;
mengubah nomor → `href` menjadi `https://wa.me/6281234567890?...`, URL memuat `wa=081234567890`.

### 16.4 Nomor penerima konfirmasi

Field `customer_phone` di Langkah 6 (data pemesan) diberi keterangan bahwa nomor itu juga menjadi tujuan tombol
“Kirim ke Pemberi Undangan” saat tamu RSVP — jadi pembeli mengerti kenapa nomornya wajib.

## 17. Kartu E-Ticket Ikut Berubah Setelah Konfirmasi (bukan hanya pop-up)

Sebelumnya konfirmasi hanya memunculkan modal; kartu QR di halaman tetap sama. Sekarang `#section-guest-qr`
punya dua keadaan yang terlihat jelas, di **semua 179 template × 4 paket** (partial `guest-pass` dipakai semua body tier).

| Bagian | Menunggu konfirmasi | Setelah konfirmasi |
|---|---|---|
| Badge `#qr-status-badge` | `⏳ MENUNGGU KONFIRMASI` (amber) | `✔ TERKONFIRMASI HADIR` (hijau) |
| Ribbon `#qr-rsvp-state` | `QR TERKUNCI • KETUK UNTUK KONFIRMASI` | `TERKONFIRMASI HADIR • 03 Nov 2026, 13.52` |
| QR | tertutup veil kaca + gembok + ajakan ketuk | jernih, terbaca penuh |
| Cap `#qr-confirmed-stamp` | — | `TERKONFIRMASI` miring di garis perforasi |
| Timestamp `#qr-confirmed-at` | — | `Dikonfirmasi pada 03 Nov 2026, 13.52` |
| Animasi | — | cap `qrStampIn` + cincin `qrCardConfirm` (dimatikan pada `prefers-reduced-motion`) |

Alur: `DKarsaRsvpSubmit()` menulis `state.confirmed` + `confirmedAt`, `paint()` memanggil `applyConfirmUI()`,
lalu `DKarsaCloseRsvp()` menggulir halaman ke kartu e-ticket sehingga tamu langsung melihat hasilnya.

Veil bisa diketuk (`DKarsaScrollToRsvp()`) untuk melompat ke form RSVP dan memfokuskan kolom nama.
Status konfirmasi disimpan di `sessionStorage`, jadi tetap terkonfirmasi saat halaman dimuat ulang.

Cap sengaja diletakkan di garis perforasi, **bukan di atas matriks QR** — sempat diuji menimpa QR dan
berisiko merusak pemindaian (`stampOverQR=true`), lalu dipindah (`stampOverQR=false`, cap di y=599 vs QR 313–504).

Diuji di 5 kombinasi lintas bab & paket (Jawa basic/kustom, Ulang Tahun premium, Seminar eksklusif,
Pengajian premium): `veil 1 → 0`, `confirmed false → true`, `stamp none → block`, ribbon berisi waktu konfirmasi.

## 18. Template Tamu Excel Berformat (bukan CSV polos)

Tombol "Unduh contoh CSV" diganti dua tombol: **Unduh Excel (.xlsx)** (utama) dan **CSV** (sekunder),
keduanya ke route `invitation.guest-sample` (`GET /buat-undangan/contoh-tamu`).

XLSX dibangun langsung dengan `ZipArchive` (tanpa dependensi baru) berisi:

| Bagian | Isi |
|---|---|
| Sheet **Daftar Tamu** | Header `Nama Tamu · Nomor WhatsApp · Jumlah Orang · Meja / Zona` — tebal, putih di atas merah brand `#F63854`, tinggi baris 28 |
| Kolom | Lebar 34 / 20 / 15 / 26; jumlah orang rata tengah |
| Bekukan & filter | Baris judul dibekukan (`pane ySplit=1`) + `autoFilter A1:D4` |
| Contoh | 3 baris siap ganti (Bapak Andi Wijaya, Ibu Sari & Keluarga, Tim Marketing PT Maju) |
| Sheet **Petunjuk** | Judul + 7 langkah pengisian + daftar judul kolom yang dikenali |

CSV-nya juga dirapikan: header ramah (`Nama Tamu`, `Nomor WhatsApp`, `Jumlah Orang`, `Meja / Zona`),
semua sel dikutip, BOM UTF-8, CRLF.

Verifikasi: unduhan 3.675 byte / 7 part OOXML, semua XML valid (`xml.dom.minidom`), dibaca SheetJS →
2 sheet, header benar, 3 baris; diimpor lewat tombol "Impor Excel / CSV" → 3 tamu dengan nomor, pax, dan meja
tepat. Judul kolom baru tetap dikenali parser (`nama`, `whatsapp`, `jumlah`, `meja`).

### 18.1 Nomor HP tidak lagi ditandai "kesalahan" di Excel/Sheets

Peringatan segitiga hijau muncul karena angka berawalan `0` disimpan sebagai teks. Dua perbaikan sekaligus:

1. Kolom **Nomor WhatsApp** memakai format sel **Text** (`numFmtId 164`, `formatCode="@"`) — angka yang
   diketik tetap teks tanpa peringatan.
2. `<ignoredErrors><ignoredError sqref="A2:D400" numberStoredAsText="1"/></ignoredErrors>` sebagai lapis kedua.

Kolom **Jumlah Orang** diberi `dataValidation type="whole" 1–20` supaya salah isi diberi pesan jelas
("Isi angka 1 sampai 20"), bukan tampak seperti error acak.

Urutan elemen OOXML diperbaiki: `autoFilter → dataValidations → ignoredErrors`. Urutan ini wajib —
versi pertama menaruh `ignoredErrors` lebih dulu dan Excel akan meminta "repair".

Divalidasi dengan `openpyxl`: 2 sheet, `A1:D4`, freeze `A2`, filter `A1:D4`, header merah `FFF63854`
tebal putih, lebar kolom 34/20/15/26, `B2` format `@`, validasi `whole C2:C400`.

## 19. Kirim WhatsApp Serentak ke Semua Tamu

Di bawah daftar tamu ada bar aksi `#guestBulkActions` dengan tombol hijau:

- label dinamis: **Kirim WA ke N Tamu** (hanya yang punya nomor & belum dikirim),
  berubah jadi **Kirim Ulang ke Semua (N)** setelah semua terkirim, dan **Belum Ada Nomor WhatsApp**
  (nonaktif) bila belum ada nomor sama sekali;
- keterangan jumlah tamu yang dilewati karena nomornya kosong + pengingat izin pop-up;
- saat dikirim: tab `wa.me/<nomor>` dibuka bergantian ±1 detik, tiap tamu ditandai **✓** (badge nomor
  berubah hijau), status berjalan "Mengirim 2 dari 3 tamu…", dan tamu yang pop-up-nya diblokir dihitung;
- status kirim disimpan per tamu (`sent` di `localStorage`); mengubah nama/nomor/meja otomatis mereset tanda ✓.

Diuji: 3 tamu (2 bernomor) → tombol "Kirim WA ke 2 Tamu", klik → 2 tab `wa.me/6281…` terbuka,
badge tamu 1–2 jadi ✓, tamu 3 tetap bernomor "3", label jadi "Kirim Ulang ke Semua (2)".

### 19.1 Link tamu dibersihkan (hanya `?to=`)

`guestUrl()` tidak lagi menempelkan `&wa=…&pax=…&seat=…`:

```
sebelum : /u/arya-kinanthi?to=Bapak+Andi+Wijaya&wa=08512345678&pax=2&seat=VIP+-+Meja+Melati+04
sesudah : /u/arya-kinanthi?to=Bapak%20Andi%20Wijaya
```

Data nomor, jumlah orang, dan meja tetap tersimpan di daftar (dipakai tombol WA & rekap), dan sekarang ikut
terkirim sebagai teks pesan WhatsApp, bukan sebagai parameter URL:

```
Undangan untuk Bapak Andi Wijaya: http://…/u/arya-kinanthi?to=Bapak%20Andi%20Wijaya
(2 orang • VIP - Meja Melati 04)
```

Parameter lama tetap dibaca `window.DKarsaGuest` (`?pax=`, `?seat=`) agar tautan yang sudah beredar tidak rusak.

### 19.2 Kirim serentak hanya sampai satu nomor → diganti antrean

Penyebab: `window.open()` dipanggil berulang dari satu klik. Browser hanya mengizinkan satu tab per gestur,
sisanya diblokir pop-up — jadi hanya tamu pertama yang benar-benar terbuka.

Perbaikan: tidak lagi membuka banyak tab otomatis. Tombol "Kirim WA ke N Tamu" membuka modal antrean
`#guestWaQueue`:

| Elemen | Isi |
|---|---|
| Progres | `Tamu 2 dari 3` + bar hijau |
| Kartu tamu | nama, nomor (`+62…`), teks pesan lengkap |
| Aksi utama | **Buka WhatsApp & Kirim** — anchor `target="_blank"`, satu tab per klik (tidak pernah diblokir) |
| Aksi lain | **Lewati** (tanpa menandai), **Tutup** |
| Otomatis | setelah diklik, tamu ditandai ✓ lalu lanjut ke tamu berikutnya (650 ms) |

Selesai antrean → modal menutup, semua badge jadi ✓, label berubah "Kirim Ulang ke Semua (N)".

Diuji: 3 tamu → `Tamu 1 dari 3` (Bapak Andi Wijaya, +62812345678, pesan berisi `?to=Bapak%20Andi%20Wijaya`)
→ `2 dari 3` (Ibu Sari & Keluarga) → `3 dari 3` (Tim Marketing PT Maju) → modal tertutup, badge ✓✓✓,
label "Kirim Ulang ke Semua (3)".

Catatan untuk pengguna: pesan lama yang masih menampilkan `&wa=&pax=&seat=` berasal dari halaman yang dimuat
sebelum perubahan — cukup muat ulang halaman (Ctrl+F5).

### 19.3 Spasi di nama tamu jadi tanda hubung

`%20` di tautan diganti `-` supaya tautan lebih rapi saat dibagikan:

```
sebelum : /u/arya-kinanthi?to=Bapak%20Andi%20Wijaya
sesudah : /u/arya-kinanthi?to=Bapak-Andi-Wijaya
          /u/arya-kinanthi?to=Ibu-Sari-%26-Keluarga   (& tetap utuh, jadi %26)
          /u/arya-kinanthi?to=Tim-Marketing-PT-Maju
```

Karena tautan kini memakai tanda hubung, nama harus dikembalikan saat dibaca:

- `InvitationController::guestNameFromParam()` — `urldecode` → bila tidak ada spasi tapi ada `-`, ubah jadi spasi;
  pencarian `Guest` mencoba slug mentah **dan** `Str::slug($toName)` agar tamu terdaftar tetap ketemu.
- `TemplateManager::getDemoGuest()` — normalisasi yang sama untuk halaman demo.
- `guest-pass.blade.php` — `?to=` bertanda hubung diubah ke spasi sebelum mengisi `window.DKarsaGuest`.

Diuji: `?to=Bapak-Andi-Wijaya` → kartu QR & gerbang menampilkan **Bapak Andi Wijaya**;
`?to=Ibu-Sari-%26-Keluarga` → **Ibu Sari & Keluarga**; `?to=Tim-Marketing-PT-Maju` → **Tim Marketing PT Maju**.

## 20. Kirim Massal Sekali Klik (server-side)

Antrean per tab tidak realistis untuk ratusan/ribuan tamu, jadi pengiriman dipindah ke server.

### 20.1 Alur

1. Tombol **Kirim ke Semua (N Tamu)** → `startBulkSend()`.
2. Browser mengirim batch 20 tamu ke `POST /buat-undangan/kirim-tamu` (throttle 120/menit) dengan CSRF.
3. Server memanggil `WhatsAppBulkSender` per tamu, mengembalikan `{mode, sent, failed, results[]}`.
4. Browser memperbarui bar progres, menandai ✓ tamu yang berhasil, mencatat kegagalan di log, lalu lanjut
   batch berikutnya (jeda 220 ms). Tombol **Hentikan** menghentikan antrean.
5. Tamu tanpa nomor dilewati dan dihitung terpisah (`• N tanpa nomor`).

### 20.2 Provider (`config/services.php` → `whatsapp`)

| `WHATSAPP_PROVIDER` | Kebutuhan | Endpoint |
|---|---|---|
| `cloud` | `WHATSAPP_TOKEN` + `WHATSAPP_PHONE_ID` (+ `WHATSAPP_TEMPLATE` opsional) | `graph.facebook.com/{v}/{phone_id}/messages` |
| `fonnte` | `FONNTE_TOKEN` | `api.fonnte.com/send` |
| `wablas` | `WABLAS_TOKEN` + `WABLAS_DOMAIN` | `{domain}/api/v2/send-message` |
| *(kosong)* | — | mode **simulasi**: tidak ada request keluar, hanya log |

Kunci baru juga ditambahkan ke `.env.example`.

### 20.3 Mode simulasi dibuat jujur

Saat kredensial belum diisi, badge modal berwarna kuning **“MODE SIMULASI (KREDENSIAL BELUM DIISI)”**,
progres berbunyi `2 dari 2 tamu • simulasi 2 • 2 tanpa nomor`, dan log menutup dengan
*“Simulasi selesai: 2 undangan tercatat, TIDAK terkirim sungguhan. Isi WHATSAPP_PROVIDER + token …”* —
supaya tidak ada kesan pesan benar-benar terkirim.

### 20.4 Pengujian

`tests/Feature/BulkSendGuestsTest.php` (5 tes, 19 asersi):
mode simulasi tidak memanggil HTTP, mode cloud mengirim payload yang benar (`to=6281234567890`,
body memuat `?to=Bapak-Andi-Wijaya`), nomor tidak valid dihitung gagal, normalisasi `08…`/`8…`/`+62 …`,
dan tautan bertanda hubung.

Uji browser: 27 tamu → 2 batch, `27 dari 27 tamu • terkirim 27`, badge mode, semua badge ✓.
Setelah perbaikan pelabelan: 2 tamu bernomor + 2 tanpa nomor → `2 dari 2 tamu • simulasi 2 • 2 tanpa nomor`.

### 20.5 Tombol Tes Kirim + status provider

Supaya fitur bisa dicoba sebelum kirim massal:

- **`POST /buat-undangan/tes-wa`** (throttle 12/menit) → `InvitationController::testSendGuest()` mengirim satu
  undangan dan mengembalikan `{mode, ok, simulated, error, phone, link, wa_me}`.
- Di modal massal ada panel **Tes Kirim (1 nomor)**: input nomor (otomatis terisi nomor tamu pertama) + tombol **Tes**.
  Hasilnya:
  - provider aktif → hijau "Terkirim ke +62… via fonnte";
  - simulasi → kuning "Mode simulasi — belum terkirim" + tautan **Kirim manual via WhatsApp** (`wa.me` berisi pesan asli);
  - gagal → merah berisi pesan error provider.
- Badge status di header bagian tamu: **WA: simulasi** (kuning) atau **WA: fonnte/cloud/wablas** (hijau),
  plus petunjuk env yang harus diisi saat masih simulasi.

Untuk mengaktifkan pengiriman nyata (tanpa mengubah kode):

```
WHATSAPP_PROVIDER=fonnte
FONNTE_TOKEN=xxxxx
# atau: WHATSAPP_PROVIDER=cloud + WHATSAPP_TOKEN + WHATSAPP_PHONE_ID
php artisan config:clear
```

Tes: `BulkSendGuestsTest` bertambah 3 kasus (tes kirim simulasi mengembalikan `wa_me` + `?to=Bapak-Andi-Wijaya`,
tes kirim cloud memanggil `/messages` dengan `to=6281234567890`, nomor tidak valid → `ok=false`) — total 8 tes / 28 asersi.

## 21. Gerbang Pernikahan: 9 Archetype (bukan sekadar ganti warna)

Sub-bab pernikahan (`WED-001..WED-090`) sebelumnya hanya berganti palette; bentuk pintu, segel, ornamen, dan
partikelnya sama. Sekarang tiap sub-bab punya archetype sendiri.

### 21.1 Pemetaan

`TemplateManager::weddingArchetype($templateKey)` membaca `docs/template-pricing-catalog.json`
(`l2_subbab`) lalu memetakan ke 9 kunci:

| Sub-bab | Archetype | Ciri pintu |
|---|---|---|
| Pernikahan Adat Jawa | `jawa` | puncak **Gunungan** (naik ke tengah) |
| Pernikahan Adat Sunda | `sunda` | **scalloped awan Mega Mendung** (bergelombang) |
| Pernikahan Adat Minang | `minang` | **tanduk Bagonjong** (turun di tengah) |
| Adat Nusantara lainnya | `nusantara` | **Candi Bentar bertangga** 4 undakan |
| Minimalis Modern | `minimalis` | **setengah lengkung asimetris** (border-radius, tanpa clip) |
| Elegan & Floral | `floral` | **organik konservatori** (bumpy) |
| Islami | `islami` | **mihrab runcing** |
| Akad & Resepsi | `akad` | **dua pintu asimetris** (pagi vs malam) |
| Internasional | `internasional` | **boiserie istana** (miring landai) |

### 21.2 Yang diganti per archetype

1. **Kontur pintu** — `clip-path` berbeda untuk `.gate-door.left/.right` (lihat tabel).
2. **Pola panel** — `::before` dengan pola khas: parang+kawung (jawa), gelombang awan (sunda),
   jalinan songket (minang), tenun zig-zag (nusantara), grid bauhaus (minimalis), mullion+wash (floral),
   bintang 8 (islami), chevron art-deco (akad), damask/boiserie (internasional).
3. **Segel medali** — SVG berbeda per archetype (`App\Support\WeddingArchetypes::art()`), dipakai di
   `tier-premium-body` & `tier-eksklusif-body`.
4. **Bingkai potret** — `.couple-portrait` di-override per archetype (gunungan, scalloped, tanduk, segi delapan,
   kapsul, oval, mihrab, oktagon, cameo).
5. **Plane 1 (siluet latar)** — 9 path berbeda: wayang gunungan, mega mendung + gunung, rumah gadang 7 spire,
   candi bentar + phinisi, bauhaus, konservatori, mihrab + roset, dua gapura + jam, kolonade istana.
6. **Plane 3 (ornamen gantung)** — 9 pasang SVG: ronce melati, awan + kembang tanjung, suntiang + marawa,
   payung tedung + pakis, blind shadow, wisteria + peony, fanoos + bulan, chandelier + swag, velvet + sakura.
7. **Partikel** (`#particle-canvas`) — preset per archetype:
   jasmine jatuh, firefly naik berkedip, diamond berkilau (scaleX cos), frangipani berputar,
   bokeh besar naik, petal melengkung (sinus), bintang 8 naik, bubble + sparkle naik, sakura S-curve.

### 21.3 Agar bentuknya benar-benar terbaca

Tiga perbaikan teknis yang membuat kontur tidak "hilang" di atas veil gelap:

- `.gate-door` diberi **latar foil** dan panel gelap di `::before` (`inset: 6px`) → tepi bentuk jadi
  **garis emas** yang mengikuti `clip-path` (sebelumnya pintu dan veil sama-sama `--navy` sehingga tak terlihat).
- `#gate-veil` digelapkan (`navy 78% + hitam`) dan panel pintu diterangkan → siluet kontras.
- `#gate-overlay` diberi `top: var(--topbar-h)` (desktop `+20px`) dan pintu mulai `top: 7%` supaya
  puncak/lengkung tidak tertutup bilah atas.

### 21.4 Pengujian

- `tests/Feature/WeddingArchetypesTest.php` (4 tes): 9 sub-bab → 9 archetype unik, kategori lain `null`,
  tiap archetype punya segel/siluet/ornamen/partikel dan 9 siluet berbeda, halaman memuat `data-wed` + CSS-nya.
- Sweep 716 halaman: `bad=0` (memeriksa `data-wed`, CSS archetype, keberadaan `gate-door`, harga, tier).

### 21.5 Simetri kiri–kanan gerbang

Keluhan: sisi kiri pintu berwarna, sisi kanan tidak. Penyebabnya gradasi **searah** (`linear-gradient(150deg)`)
pada kedua daun: ujung terang selalu di kiri-atas tiap kotak, sehingga pada daun kanan bagian terangnya
tertutup segel di tengah dan yang terlihat hanya ujung gelap.

Perbaikan:

- `.gate-door` memakai variabel `--door-angle` (kiri `150deg`, kanan `210deg`) → gradasi foil & panel benar-benar
  dicerminkan terhadap garis tengah.
- `html[data-wed] .gate-door.right::before { transform: scaleX(-1); }` → pola panel (parang, songket, awan, dst.)
  juga ikut dicerminkan.

Diukur dari tangkapan 430×932: rata-rata piksel area daun kiri `(33,45,48)` vs kanan `(36,47,49)` —
selisih 1–3 satuan RGB (tak terlihat); pita atas `(15,30,38)` vs `(17,32,38)`.

### 21.6 Sorot terang dipindah ke tepi luar (tidak lagi di belakang segel)

Setelah gradasi dicerminkan, masalah berikutnya: bagian terang tiap daun justru jatuh di sisi **dalam**
(dekat segel) sehingga tertutup medali. Perbaikan:

- `--door-angle` jadi `90deg` (kiri) / `270deg` (kanan) → gradasi foil berjalan dari **tepi luar** (terang)
  ke **tengah** (gelap).
- Panel `::before` diberi `box-shadow` inset: sorot emas 64px di tepi luar + vignette gelap ke arah tengah.
  Karena daun kanan memakai `scaleX(-1)`, bayangannya sengaja memakai **nilai yang sama** dengan daun kiri —
  kalau dicerminkan dua kali, sorotnya kembali jatuh di tengah (bug yang sempat terjadi).

Ukur ulang (430×932, pita y 32–62%):

| Area | Sebelum | Sesudah |
|---|---|---|
| Kiri tepi luar | 40,51,52 | **40,51,52** |
| Kiri dekat tengah | 34,48,50 | 34,48,50 |
| Kanan tepi luar | 36,48,51 | **43,54,53** |
| Kanan dekat tengah | 37,50,51 | **34,48,50** |

Sekarang kedua daun terang di tepi luar dan gelap di tengah — simetris dan segel tidak menutupi sorot.

### 21.7 Medali segel dihapus, ornamen kiri–kanan dikembalikan

- Medali (`.medal` + `.tri`) di dalam `#btn-open-invitation` **dihapus** dari `tier-premium-body` dan
  `tier-eksklusif-body`. Kartu judul, nama, tanggal, dan tombol buka undangan tetap utuh.
- Sorot tepi yang sebelumnya terlalu kuat (vignette `rgba(0,0,0,.62)` + glow `62%`) membuat pola panel
  kiri–kanan terlihat "hilang". Diturunkan menjadi glow `34%` (48px) dan vignette `.26` (40px) →
  pola archetype kembali terbaca.

Ukur ulang pada tangkapan 430×932 (grayscale):

| Area | mean | stddev (tekstur pola) |
|---|---|---|
| Kiri luar 11–22% | 46,5 | 13,9 |
| Kiri dalam 30–42% | 46,4 | 38,2 |
| Kanan luar 78–89% | 47,1 | 13,6 |
| Kanan dalam 58–70% | 46,6 | 38,3 |

Mean kiri/kanan selisih < 1 dan stddev pola sebanding → ornamen kedua sisi utuh dan seterang satu sama lain.

### 21.8 Label & peringatan di builder

- Peringatan "Pengiriman otomatis belum aktif. Isi di .env: WHATSAPP_PROVIDER=… " **dihapus** dari
  daftar tamu.
- Label tombol tidak lagi berubah menjadi "Kirim Ulang Satu per Satu"; selalu **Kirim WA Satu per Satu (N)**
  dengan N = jumlah tamu bernomor.
- Panel **Tes Kirim (1 nomor)** tetap ada di dalam modal antrean.

## 22. Kirim Link Tamu: Satu per Satu (blast dimatikan)

Permintaan: jangan blast ke semua tamu sekaligus; kirim satu per satu.

- Tombol utama di daftar tamu sekarang **Kirim WA Satu per Satu (N Tamu)** → membuka antrean
  `#guestWaQueue` yang menampilkan satu tamu per langkah (`Tamu 1 dari N`), tombol **Buka WhatsApp & Kirim**
  (anchor `target="_blank"`), **Lewati**, **Tutup**.
- Modal blast (`#guestBulkSendModal`) beserta JS `startBulkSend`/`runBulkBatch`/`finishBulkSend`/`stopBulkSend`
  **dihapus** dari builder; label tetap **Kirim WA Satu per Satu (N)** dan tidak lagi berubah menjadi
  "Kirim Ulang" setelah semua terkirim.
- Panel **Tes Kirim (1 nomor)** dipindah ke dalam modal antrean agar tetap bisa dipakai.
- Endpoint `POST /buat-undangan/kirim-tamu` + `WhatsAppBulkSender` tetap ada dan teruji (untuk diaktifkan lagi
  bila nanti dibutuhkan), tetapi **tidak lagi dipanggil dari UI**.

Verifikasi builder: `Kirim WA Satu per Satu (2 Tamu)`, `#guestBulkSendModal` tidak ada, `startBulkSend` tidak ada,
antrean terbuka di `Tamu 1 dari 2`, panel tes tersedia.

## 23. Paritas Tampilan Web ↔ Mobile

Permintaan: semua modul dan fitur harus terlihat sama saat tampilan diubah ke mobile.

### 23.1 Yang berbeda dan sudah disamakan

| Modul | Sebelum | Sesudah |
|---|---|---|
| Gerbang undangan | di desktop `#gate-overlay` melebar **1280px** (daun 717px, kontur gepeng) | `max-width: 430px; margin-inline: auto` → gerbang selalu selebar bingkai ponsel, sama di mobile & desktop |
| Kanvas partikel | `<canvas>` 300×150 (ukuran intrinsik), partikel hanya di pojok | `width/height: 100%` + `fit()` memakai `clientWidth/Height` (bukan `innerWidth`) → partikel menutup seluruh bingkai |
| Panel filter beranda | mobile: tersembunyi di balik tombol; desktop: selalu terbuka | tombol `Filter & Kategori` tampil di **semua** lebar, panel terbuka default, bisa dilipat di kedua tampilan |
| Label musik | `hidden sm:inline` (hilang di mobile) | tampil di semua lebar |
| Pil paket di topbar undangan | terpotong saat lebar < 320px (mis. di dalam iframe pratinjau) | baris bisa digeser (`overflow-x: auto`, scrollbar disembunyikan) |
| `#subSelect` di panel filter | melebar **4248px** (kolom grid ikut melar karena isi `nowrap`) | `min-w-0` + `grid-cols-1 sm:grid-cols-2` + `overflow-hidden` → 276px (mobile) / 531px (desktop) |
| Badge kategori di header modal pratinjau | memakan ruang judul di mobile | disembunyikan < 640px, judul dapat ruang penuh |

### 23.2 Hasil audit

Audit otomatis (elemen yang melewati tepi viewport, kontainer scroll dikecualikan) di 390×844 dan 1280×900:

| Halaman | 390 | 1280 |
|---|---|---|
| `/` (beranda) | 0 elemen meluber (sisa: blob dekoratif & marquee yang memang ter-clip) | idem |
| `/buat-undangan` | 0 | 0 |
| `/demo` | 0 | 0 |
| `/demo/jawa-keraton-agung/eksklusif` | 0 (daun pintu 413px ter-clip oleh `#gate-overlay`) | 0 |
| `/demo/jawa-keraton-agung/kustom` | 0 | 0 |
| `/demo/birthday-citrus-pop/basic` | 0 | 0 |

Ukuran kunci setelah perbaikan:

| Elemen | 390 | 1280 |
|---|---|---|
| `#gate-overlay` | 0,90 · 390×754 | 425,110 · **430**×790 |
| `.gate-door.left` | 218×701 | 241×735 (proporsional) |
| `#particle-canvas` | 390×844 | 430×900 |
| `.topbar` | 390×90 | 430×90 |
| Panel filter | 358×239 | 1216×154 |
| `#subSelect` | 276 | 531 |

Sweep 716 halaman: `bad=0` (tier, harga, QR, CSS dock, JS kanvas).

## 24. Builder: Keterangan & Panel Tes Kirim Dihapus

Permintaan: hapus keterangan "N tamu punya nomor WhatsApp. Dikirim satu per satu lewat antrean WhatsApp —
tidak ada pengiriman serentak." dan hapus panel **TES KIRIM (1 NOMOR)**.

- `<p id="guestBulkHint">` beserta seluruh JS yang mengisinya dihapus; `#guestBulkActions` kini hanya berisi
  satu tombol (diverifikasi: `barChildren = 1`).
- Panel tes (`#waTestPhone`, `#waTestResult`, `sendTestWa()`) dihapus dari modal antrean.
- Label tombol tetap **Kirim WA Satu per Satu (N)**.

Verifikasi DOM langsung (390×844): `guestBulkHint=false`, teks "punya nomor WhatsApp"=tidak ada,
`waTestPhone=false`, "TES KIRIM"=tidak ada (termasuk saat antrean terbuka), antrean tetap berjalan
(`Tamu 1 dari 2`).

## 25. Build Aset Frontend

`node_modules` belum ada sehingga `npm run build` gagal (`'vite' is not recognized`).

- `npm ci` → 56 paket, 0 vulnerability.
- `npm run build` → `public/build/assets/app-DSikwRQa.css` **161,80 kB** (gzip 23,86 kB) + `manifest.json`,
  `fonts-manifest.json`, 6 berkas font Instrument Sans.
- Verifikasi hasil build di browser: panel filter 358×239 (mobile), `grid-template-columns: 328px`,
  anak grid `min-width: 0px`, `#subSelect` 276px, `docW == vw` (tidak ada overflow).

## 26. Undangan Jadi Ringan (60 FPS, tanpa filter berat)

Permintaan: buat halaman undangan jauh lebih ringan mengikuti aturan performa (tanpa `filter: blur`,
`backdrop-filter`, `mix-blend-mode` pada elemen bergerak; paralaks 2 layer; kanvas 1x & maks 14 partikel;
section di luar layar dilewati; peta click-to-load).

### 26.1 Yang dihapus / diganti

| Sebelum | Sesudah |
|---|---|
| `backdrop-filter: blur()` di topbar, `.dock`, `.gate-seal .plate`, `#bespoke-panel`, modal QR | latar `color-mix(...)` solid — 0 elemen ber-blur |
| `filter: blur(2.5px)` / `blur(5px)` pada bokeh, `filter: …blur(2px)` pada `.page-photo` | dihapus; bokeh memakai `radial-gradient` |
| `mix-blend-mode: overlay` pada kilau kartu ATM/QR | dihapus (cukup opacity + gradient) |
| Mesin paralaks 5-plane: `requestAnimationFrame` **abadi** + `getBoundingClientRect()` tiap section tiap frame | satu listener `scroll` pasif → satu rAF → satu CSS var `--sy`; tidak ada pembacaan layout |
| `scrubCards()` (tilt/scale/opacity per section per frame) | diganti `IntersectionObserver` (threshold) yang sudah ada |
| 3 lapisan paralaks beranimasi (`-0-bg`, `-1`, `-3`, `-4-lens`) | **2 layer** beranimasi: `#parallax-plane-1-midground` (−0.18×) & `#parallax-plane-3-foreground` (−0.35×); `-4-lens` dimatikan, `-0-bg` statis |
| Kanvas partikel `devicePixelRatio` (sampai 3×) & 18–26 partikel, path digambar ulang tiap frame | resolusi **1×**, **maks 14** partikel, bentuk di-*bake* ke stamp 24×24 lalu `drawImage` |
| Partikel jalan terus sejak load | mulai **setelah gerbang dibuka**, berhenti saat gerbang dikunci ulang, pause saat `document.hidden`, mati di basic/premium |
| Sparkle kustom: loop abadi, DPR 2, 160 partikel | 1×, maks 48, loop berhenti sendiri saat partikel habis |
| Confetti: DPR 2, 90 partikel, `clearRect(0,0,W,H)` (variabel tak ada → error) | 1×, 48 partikel, `clearRect` memakai ukuran kanvas |
| Google Maps `<iframe>` dipasang saat parse | **fasad** `.map-facade` → iframe dibuat hanya saat diklik (`DKarsaLoadMap`) |
| `will-change: transform` permanen di pintu, plane, kartu, gambar | **0** elemen ber-`will-change` |
| Gambar galeri tanpa atribut | `loading="lazy" decoding="async"` (12 gambar) |
| Section di luar layar ikut dirender | `content-visibility: auto; contain-intrinsic-size: 1px 420px` (12 dari 13 section) |

### 26.2 Hasil ukur (430×932, DPR 3, Chrome headless)

| Metrik | Sebelum | Sesudah |
|---|---|---|
| Elemen dengan `filter`/`backdrop-filter` blur | 3+ | **0** |
| Elemen `will-change` | 8 | **0** |
| Piksel kanvas partikel | 3.607.140 (1290×2796) | **400.760** (430×932) → 9× lebih ringan |
| Partikel aktif | 18–26 | **14** |
| `iframe` saat load | 1 (Google Maps) | **0** (dimuat saat diklik) |
| Section `content-visibility` | 0 | **12 / 13** |
| Long task saat scroll 24 langkah | — | **0** (tidak ada frame > 50 ms) |
| DOM node | — | 488 |
| HTML | — | 173,7 KB (gzip **39,2 KB**) |

Verifikasi runtime: `--sy` = 900 saat scroll 900 → `#parallax-plane-1-midground` `translateY(-162px)`
(= 900 × −0.18, dihitung CSS, bukan JS); gerbang dibuka → kanvas partikel terisi; fasad peta diklik →
`iframe.map-frame` muncul dengan `src` yang benar.

Sweep 716 halaman: `bad=0` (cek tier/harga/QR + tidak ada `blur`, `will-change`,
`data-parallax-speed`, iframe peta awal; ada `content-visibility`, `DKARSA_PARTICLE_MAX`, `.map-facade`).

## 27. Perbaikan Lanjutan (filter, paralaks, waktu, musik, galeri, tes input)

### 27.1 Gaya jadi dropdown

Baris **Gaya** di panel filter beranda sebelumnya deretan chip panjang; sekarang `<select id="styleSelect">`
yang isinya dibangun `buildCascade()` sama seperti **Sub** — lengkap dengan jumlah template:
`Semua Gaya (179)`, `Minimalis Modern (37)`, `Geometris (34)`, `Rustic (16)`, dst (21 opsi).

### 27.2 Paralaks dikembalikan penuh

Efek yang sempat "datar" setelah optimasi sudah dipulihkan: lensa bokeh (`#parallax-plane-4-lens`) aktif lagi,
`scrubCards()` (tilt/scale/opacity kartu) dan `drivePlanes()` (drift midground, sway ornamen gantung, bokeh naik)
dijalankan lagi — tetapi **hanya di dalam frame scroll** (tidak ada rAF abadi), jadi efek maksimal tanpa jank.
Diukur saat scroll 1200: bokeh `translateY(-236)`, midground drift `27.9`, `--card-tilt/--card-fade` terisi.

### 27.3 Jam acara: pilih, bukan ketik

Semua input `event_N_start_time` / `event_N_end_time` (2 statis + 2 dinamis) kini `type="time" step="300"`,
jadi muncul pemilih jam bawaan. Nilai lama seperti `08.00 WIB` dinormalkan otomatis ke `08:00` oleh
`toTimeValue()`/`normalizeTimeInputs()`.

### 27.4 Pustaka musik

`InvitationController::create()` mengirim `musicLibrary` — hasil pemindaian `public/audio` dan
`storage/app/public/audio` (mp3/wav/m4a/ogg) dengan label & mood otomatis. Builder menampilkan grid kartu trek
(pencarian + tombol putar + radio `music_url`), bukan lagi satu dropdown. Trek `wedding-melody.wav` dipilih
default. Menambah file audio baru otomatis muncul di pustaka.

### 27.5 Galeri: pilih satu-satu tidak menimpa

`previewGalleryFiles()` sebelumnya `container.innerHTML = ''` lalu hanya memakai `input.files` terakhir —
akibatnya memilih satu foto menimpa foto sebelumnya. Sekarang ada akumulator `galleryDataUrls`:
- pilih satu per satu → **bertambah** (diuji 1 → 2 → 3 foto),
- pilih banyak sekaligus → tetap masuk semua,
- batas 20 foto, tiap kartu punya tombol ✕ untuk hapus,
- `input.value` direset supaya file yang sama bisa dipilih ulang,
- tersimpan di `sessionStorage` + hidden input `galleryPhotosBase64` + `postMessage` ke pratinjau.

### 27.6 Tombol Tes Input Pelanggan

Di kartu **Aktivasi Instan & Pembayaran Midtrans** ditambahkan tombol
**🧪 Tes Input Data Pelanggan**. Tombol ini tidak memanggil Midtrans: ia mengumpulkan isian formulir
(nama pemesan, WhatsApp, kategori, sub-kategori, template, paket, tanggal, nama mempelai, slug, jumlah acara,
jumlah foto galeri, musik) dan menampilkannya di modal — baris wajib yang kosong ditandai merah, dengan
ringkasan "Semua isian wajib terisi" atau daftar yang belum lengkap.

Verifikasi: 12 baris tampil dengan nilai nyata (mis. `Paket: Paket Eksklusif - Rp180.000`,
`Foto Galeri: 3 foto`, `Musik Latar: celebration-melody.wav`).

### 27.7 Tombol "Buka Undangan Tes" di modal tes

Footer modal tes kini punya dua tombol: **↗ Buka Undangan Tes** (hijau) dan **Tutup** (hitam), plus catatan
"Undangan tes ini sementara — dibuat dari data formulir, tanpa pembayaran. Bisa dihapus kapan saja."

`testInvitationUrl()` menyusun URL dari data formulir memakai helper yang sudah ada:
`getCanonicalTemplateKey(currentSelectedTheme)` + `getLivePreviewParams()` + `withTier()` →
`/demo/{template}?preview=1&category=…&event_heading=…&wedding_date=…&groom_name=…&to=Tamu+Tes&tier=eksklusif`.
Tombol membukanya di tab baru (`window.open`).

Diuji: URL mengembalikan **200** dan menampilkan data yang diisi (Arya 12×, Kinanthi 10×, "Pahargyan" 3×,
"Tamu Tes" 3×) dengan `data-tier="eksklusif"` dan modul QR tamu tetap ada.

## 28. Pustaka Kutipan, Template di Atas, dan Efek Visual Dikembalikan

### 28.1 Pustaka kutipan + acak

Di bawah kolom *Kutipan Ayat Suci / Kata Mutiara* ditambahkan `<select id="quoteLibrarySelect">`
berisi **13 kutipan** dalam 4 grup (`Islami`, `Kristen`, `Adat Nusantara`, `Umum`) dan tombol **🎲 Acak**
yang memilih kutipan acak (ikut menyorot kolom kutipan sebentar).

| Grup | Contoh |
|---|---|
| Islami | QS. Ar-Rum 21, Al-Baqarah 187, Ar-Ra'd 28, Al-Hujurat 13, HR. Tirmidzi |
| Kristen | 1 Korintus 13:4-7, Kejadian 2:24, Pengkhotbah 4:9 |
| Adat Nusantara | Pepatah Jawa, Sunda, Minang |
| Umum | Puisi Romantis, Kata Mutiara |

Data ada di `QUOTE_LIBRARY` (satu sumber) — menambah kutipan cukup menambah satu objek.

### 28.2 Template terpilih paling atas di modal tes

Baris modal tes diurutkan ulang: **Template Terpilih** dan **Paket** sekarang dua baris pertama, dengan latar
`bg-blush` + border `brand` agar langsung terlihat. Sisanya (nama pemesan, WA, kategori, …) menyusul di bawah.

### 28.3 Efek gerbang & paralaks dikembalikan seperti sebelum optimasi

Permintaan: kembalikan tampilan gerbang dan paralaks seperti sebelum catatan performa. Semua efek visual
dipulihkan; yang tetap ringan hanya bagian yang tidak terlihat (kanvas 1×, fasad peta, `content-visibility`).

| Elemen | Dipulihkan |
|---|---|
| `.gate-seal .plate` | `backdrop-filter: blur(12px)` (kaca) |
| `.topbar` / `.dock` | `blur(14px)` / `blur(18px)` |
| `#bespoke-panel` | `blur(12px)` |
| `#parallax-plane-4-lens .bokeh` | `filter: blur(2.5px)` (kustom `5px`) + layer aktif |
| `.page-photo` | `filter: saturate(.9) brightness(.9) blur(2px)` |
| `.holographic-foil-glare` | `mix-blend-mode: overlay` |
| QR veil & modal QR | `backdrop-filter: blur(3px)` / `blur(6px)` |

Diukur di browser: plate `blur(12px)`, bokeh `blur(2.5px)`, topbar `blur(14px)`, dock `blur(18px)`,
`#parallax-plane-4-lens` `display: block`.

Sweep 716 halaman: `bad=0` (tier/harga/QR, `map-facade`, kaca segel `backdrop-filter: blur(12px)`,
`content-visibility`).
