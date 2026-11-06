Design an ultra-premium, deeply immersive collection of 90 distinct, production-oriented digital wedding invitation website templates for D'Karsa, an Indonesian luxury digital invitation platform.

1. Project Objective & Technical Foundation
- Create 90 ready-made, mobile-first (with seamless desktop responsiveness) interactive wedding invitation websites.
- Target Implementation: Laravel Blade templates, HTML5, modern CSS3 (animations, backdrop-filter, custom properties), and JavaScript (Intersection Observer, scroll-linked animations, async state transitions), backed by PostgreSQL.
- Design actual, living, vertically scrollable wedding invitation websites—NOT static posters, flat wireframes, marketplace galleries, or admin dashboards.
- Brand Identity: Display "D'Karsa" consistently as the sole platform brand in the footer and subtle watermark areas.
- Language: Natural, poetic Indonesian wedding copy (except templates 86–90 which require a Bilingual Indonesian-English interface).

2. Visual Richness, Materiality & "Living UI" Direction (CRITICAL)
To make every template feel alive, tangible, and breathtaking, avoid flat, sterile backgrounds and plain white boxes. Apply multi-layered depth and tactile realism across all designs:
- Tactile Surface Textures: Render backgrounds and cards with realistic material depth—woven Songket threads with subtle metallic sheen, embossed Batik fabric textures, warm hand-carved Gebyok/Ukiran wood grain, organic cotton/linen paper fibers, or sleek frosted glassmorphism.
- 2.5D Layered Depth & Parallax: Construct every section with a distinct Foreground (overlapping floral corners, hanging ornaments, floating motifs, permanent side gate frames), Midground (interactive ornate content cards, framed couple portraits), and Background (textured canvas, subtle ambient lighting).
- Atmospheric Lighting & Shadows: Use soft, multi-layered drop shadows, ambient warm glows, gold/silver foil specular highlights on traditional borders, and delicate vignette framing so elements pop organically off the screen.
- Editorial Typography: Pair expressive, high-contrast display serifs, calligraphic scripts, or bold architectural headers with highly legible sans-serif body text. Use refined typographic hierarchy for couple initials, dates, and quotes.

3. Asynchronous Opening & D'Karsa Signature "V-Angle Split-Gate" Choreography
Every template must feel like a theatrical experience from the very first tap. Design clear visual states for the interactive opening sequence:
- State 1: The Locked Cover: Full-viewport hero cover featuring the couple's names, wedding date, guest name placeholder ("Kepada Yth. Bapak/Ibu/Saudara/i"), rich thematic framing, and a pulsing/glowing "Buka Undangan" button.
- State 2: Async Transition Gate (Post-Click): Clicking "Buka Undangan" smoothly transitions the cover out, initializes the floating audio player, and brings in a signature Cultural/Stylistic Gate with a central luminous gold seam that temporarily covers the viewport.
- State 3: Scroll-Linked "V-Angle" Parting Reveal: As the user begins scrolling down, the two gate wings part outward at a diagonal tilt (`translate3d(±78%, 0, 0) rotate(±6deg)`), creating an inverted-trapezoid / V-shaped light shaft down the center that progressively reveals the Welcome Section underneath while keeping 15%–20% of the wings anchored along the left and right edges as a permanent 2.5D stage frame:
  * Adat Jawa (01–18): Twin ornate gold-rimmed Wayang Kulit Gunungan or intricately carved wooden Gebyok doors part diagonally to the left and right on scroll, accompanied by subtle floating Melati buds.
  * Adat Sunda (19–30): Layered Mega Mendung cloud illustrations, Siger-crowned arches, and cascading Melati flower curtains gently tilt and part outward as the user scrolls.
  * Adat Minang (31–40): Majestic Rumah Gadang (Gonjong) curved gates, golden Suntiang motifs, and heavy woven Songket drapes slide open dramatically at a V-angle on scroll.
  * Adat Nusantara (41–48): Richly textured Tenun Ikat / Ulos woven curtains and traditional Nusantara carved wooden archways open progressively on scroll.
  * Minimalis Modern (49–62): Sleek architectural split-screens, frosted glass shutters with metallic hairlines, or torn organic paper layers glide apart with smooth easing.
  * Elegan & Floral (63–72): Lush, blooming 3D-style botanical arches and animated floating flower petals part gently outward on scroll.
  * Pernikahan Islami (73–80): Intricate geometric Mashrabiya lattice doors or illuminated Islamic dome arches open reverently with a soft golden glow.
  * Akad Nikah & Resepsi (81–85): A dual-panel architectural split curtain labeled "Akad" and "Resepsi" parts horizontally/diagonally to reveal a structured dual-event timeline.
  * Internasional (86–90): High-fashion editorial magazine double-doors or luxury Nusantara-fusion theatrical curtains parting to reveal a bilingual interface.

4. Ambient Micro-Interactions & Fixed HUD (Continuous Life)
Keep the page alive while scrolling through subtle, non-intrusive UI details:
- Persistent Bottom Navigation Dock (`MEMPELAI | ACARA | GALERI | RSVP | DOA`) centered at the bottom and a circular Vinyl/Audio toggle button (`♪`) fixed in the bottom-right corner.
- Gentle swaying motion on corner botanicals, Melati garlands, or traditional tassels.
- Soft shimmer effects across metallic gold, rose-gold, or neon inner seam borders.
- Smooth card elevation and focus states on buttons, gallery photos, and form inputs.

5. Complete Invitation Architecture & Ornate Section Flow
Adapt the composition and visual rhythm per template so no two layouts feel identical, incorporating these essential sections (styled as ornate heritage cards, never plain white boxes):
1. Interactive Opening Cover & Async V-Angle Scroll Gate.
2. Welcome & Blessing Section: Poetic Indonesian invitation intro or Islamic Salam/Quranic verse (Surah Ar-Rum: 21) framed in ornate thematic borders with a cultural subtitle pill.
3. Couple Profiles (Mempelai Pria & Wanita): Arch/Medallion portrait frames with 2.5D overlapping florals/carvings, full names, parent names ("Putra/Putri dari..."), social media pills, separated by an ornate cultural crest (never a plain "&").
4. Love Story (Cerita Cinta): An interactive scrollwork timeline where each milestone sits inside its own elevated parchment/ornate sub-card with glowing year medallions.
5. Event Schedule (Rangkaian Acara): Royal ticket/arch-styled cards for Akad Nikah and Resepsi with corner filigree, showing day, date ribbon, time (WIB/WITA/WIT), venue name, and a "Simpan ke Kalender" action.
6. Live Countdown Timer: 4 distinct, embossed crest/plaque metric boxes (Hari, Jam, Menit, Detik) with clear typographic hierarchy.
7. Venue & Navigation: Styled map preview card with ornate frame, full physical address, and a prominent "Lihat Lokasi di Google Maps" button.
8. Curated Photo Gallery: Symmetrical Bento editorial grid (e.g., 1 full-width arched hero photo on top + 2x2 grid below, never an awkward 5-square gap) or filmstrip carousel with thin gold inner frames.
9. Interactive RSVP Form: Ornate corner-filigree form card with Guest Name input, interactive toggle cards for Attendance Status (Hadir / Berhalangan), Number of Pax dropdown, and a shimmering submit button.
10. Live Digital Guestbook (Ucapan & Doa): Message submission input paired with a seamless fade-masked feed (no bulky grey browser scrollbars) of stamped note cards showing avatar initials, timestamp, and attendance badges ("✓ Hadir").
11. Digital Wedding Gift (Tanda Kasih / Kado Digital): Realistic metallic/textured ATM bank cards (with EMV gold chip icon, embossed-style account numbers, bank logo, and "Salin Rekening" button) + framed physical gift address box.
12. Grand Closing & D'Karsa Footer: Heartfelt thank-you note, couple's monogram/initials, grand final cultural/floral ornament, and "Designed with Love by D'Karsa" branding.

6. Strict Originality & Quality Guardrails
- Cultural Accuracy: Never mix regional motifs (keep Javanese Batik/Gunungan, Sundanese Mega Mendung/Siger, and Minang Gonjong/Ukiran strictly within their designated templates).
- Contrast & Readability: Even with rich traditional textures and bold color palettes, ensure WCAG-friendly text contrast using smart card backdrops, subtle gradients, or translucent overlays behind typography.
- Zero Template Fatigue: Vary hero layouts, section dividers, and gallery grids across all 90 designs.
---

# BAGIAN 2 — STRICT RULES (v2, mengikat)

> Addendum ini melengkapi dan **mengikat** Bagian 1. Bila terjadi konflik, aturan v2 menang pada:
> urutan 12 seksi, penamaan footer, mekanisme V-Angle Split-Gate, aturan Anti-Plain-Box pada seksi dalam,
> jumlah hero frame, sumbu sub-style per kategori, dan pemetaan ayat Islami.
> Canonical turunan teknis: `docs/DESIGN.md` (token + aturan) dan `docs/template-registry.json` (90 slot).

## 7. Role & Objective

Bertindak sebagai **Principal Luxury UI/UX Architect + Indonesian Cultural Art Director**. Hasil akhir: 90 website
undangan pernikahan digital yang distinct dan production-ready untuk brand **D'Karsa**, dikonversi langsung ke
Laravel Blade (HTML5, Tailwind/CSS3, Alpine.js/GSAP, PostgreSQL). Setiap desain adalah undangan hidup, berlapis,
dan sangat kaya ornamen — bukan poster statis, bukan kotak-kotak putih polos, dan bukan halaman web generik.

## 8. Strict Negative Constraints (zero-error & anti-boring guardrails)

- **NO SAAS / MARKETPLACE UI:** tanpa grid pemilihan template, tabel harga, tombol login, avatar profil,
  shopping cart, atau tombol "Pilih template ini".
- **NO STANDARD WEBSITE CHROME:** tanpa top navigation bar (Home, About, Contact, Blog), hamburger menu,
  search bar, breadcrumb, atau footer korporat multi-kolom. Gunakan HANYA fixed bottom navigation dock.
- **NO CULTURAL CROSS-CONTAMINATION:** gate/ornamen Bali, Gonjong Minang, atau Mega Mendung Sunda tidak boleh
  muncul di template Jawa; Wayang/Gunungan Jawa atau motif Minang tidak boleh muncul di template Sunda;
  motif Jawa/Sunda tidak boleh muncul di template Minang.
- **NO ABSTRACT / MINIMALIST LINES ON CULTURAL GATES:** dilarang menggambar lingkaran/garis lengkung abstrak polos
  pada sayap gerbang adat. Permukaan `.gate-wing-left` dan `.gate-wing-right` WAJIB berisi siluet ukiran/motif
  budaya autentik yang utuh dan detail.
- **NO PLAIN WHITE BOXES (CRITICAL):** dilarang keras merender kartu Mempelai, Rangkaian Acara, Countdown, RSVP,
  Buku Tamu, atau Kado Digital sebagai kotak putih polos dengan border tipis standar. Setiap kartu WAJIB memiliki
  *corner filigree* (ukiran sudut), *double inset gold/accent hairline border*, dan *watermark* motif budaya/floral
  (5%–8% opacity) di dalam permukaan kartu.
- **NO UGLY NATIVE SCROLLBARS:** dilarang menampilkan scrollbar vertikal abu-abu bawaan browser yang tebal di dalam
  area feed Ucapan & Doa (Buku Tamu). Gunakan *fade-mask* halus di tepi bawah atau custom 2px gold track.
- **NO AWKWARD GALLERY GAPS:** dilarang membuat grid galeri 2 kolom berisi 5 kotak sejajar yang menyisakan 1 ruang
  kosong ganjil di kanan bawah.
- **NO LOREM IPSUM / ENGLISH PLACEHOLDER:** selain 86–90 (Bilingual), 100% copy, label tombol, dan placeholder
  form dalam Bahasa Indonesia baku, sopan, dan puitis.
- **NO FLAT / DEAD BACKGROUNDS & ILLEGIBLE TEXT:** tidak ada background berupa hex color polos tanpa tekstur/pola,
  dan tidak ada teks tanpa kontras WCAG AA yang memadai.

## 9. Viewport, Fixed HUD & Layout Architecture (mobile-first lock)

- **Kanvas utama:** mobile-first interactive viewport 390px–430px.
- **Desktop (1440px):** pilih salah satu — **Split-Screen Showcase** (kiri 60%: portrait editorial couple
  fixed + cultural artwork + music controller; kanan 40%: kanvas undangan yang scroll vertikal) atau
  **Centered Luxury Mobile Container** dengan ambient blurred cultural background + sayap gerbang V-Angle yang
  mengapit di sisi kiri dan kanan layar.
- **Z-index layering (2.5D depth):**
  - `Z-0` base canvas — tekstur taktil (songket, batik emboss, linen, carved wood, matte architectural) + pola titik/motif halus.
  - `Z-10` midground content — kartu heritage berukir sudut, framed arch portrait, sub-kartu timeline, kartu ATM kado digital, drop shadow berlapis.
  - `Z-20` foreground ornamental frame — corner botanical, melati garland, carved archway, partikel mengapung yang sedikit menimpa tepi kartu Z-10.
  - `Z-30` async V-Angle split-gate — pintu/curtain/wayang full-screen dengan garis tepi emas dalam yang membelah miring saat scroll dan menyisakan 15%–20% bingkai permanen di kiri-kanan.
  - `Z-40` cover overlay — layar sampul terkunci sebelum tombol `[ Buka Undangan ]` diklik.
  - `Z-50` persistent foreground HUD — selalu tampil di bagian bawah layar:
    1. **Bottom Center Navigation Dock:** bar melayang berisi 5 tab ikon+teks: `MEMPELAI` | `ACARA` | `GALERI` | `RSVP` | `DOA`.
    2. **Bottom Right Audio Controller:** tombol bulat `52px` berbingkai emas dengan ikon nada `♪` / vinyl soundwave.

## 10. Asynchronous 3-State Opening Choreography (D'Karsa Signature V-Angle Split)

- **STATE 1 — THE LOCKED COVER (100vh overlay, `z-index: 40`).** Hero frame tematik, nama pasangan, tanggal, dan
  badge tamu `Kepada Yth. Bapak/Ibu/Saudara/i: [Nama Tamu Undangan]`. CTA utama taktil `[ Buka Undangan ]` dengan
  ikon envelope/budaya. Di belakangnya, `.gate-wing-left` dan `.gate-wing-right` tertutup rapat di tengah
  mempertemukan garis tepi emasnya. Scroll terkunci (`overflow: hidden`).
- **STATE 2 — ASYNC GATE TRIGGER (0–800ms).** Klik `[ Buka Undangan ]` → teks cover fade out (`opacity 0`,
  `scale 0.95`), state musik aktif, scroll di-unlock (`overflow-y: auto`), gate budaya berdiri utuh di depan konten
  undangan dengan garis belahan emas vertikal tepat di tengah layar, disertai prompt bawah
  *"Geser ke bawah untuk membuka undangan"* + chevron bouncing.
- **STATE 3 — SCROLL-LINKED "V-ANGLE" PARTING REVEAL (0–500px scroll).** Saat user melakukan scroll ke bawah, kedua
  sayap gerbang TIDAK bergeser rata ke samping, melainkan membuka keluar dengan kemiringan diagonal membentuk
  **celah cahaya trapesium terbalik / huruf V (V-shaped light shaft)** yang kian melebar dari tengah untuk
  menyingkap Seksi 2 (Salam Pembuka) dan Seksi 3 (Mempelai) di belakangnya.
  Spesifikasi siluet & ornamen di permukaan sayap gate per kategori:
  1. **Adat Jawa 01–18** — sepasang siluet **Gunungan Wayang Kulit** ber-gold foil detail, sulur Batik Kawung/Parang,
     atau ukiran kayu **Gebyok** pada permukaan sayap, dengan melati jatuh halus.
  2. **Adat Sunda 19–30** — kontur awan **Batik Mega Mendung** berlapis, geometri mahkota Siger, dan tirai untaian
     bunga melati di sepanjang tepi belahan.
  3. **Adat Minang 31–40** — siluet atap tanduk **Rumah Gadang (Gonjong)**, ukiran emas *Pucuak Rabuang / Itik
     Pulang Petang*, dan tenun geometris Songket Minang.
  4. **Adat Nusantara 41–48** — tenun autentik **Tenun Ikat / Ulos / Songket** + pilar arch kayu ukir Nusantara.
  5. **Minimalis Modern 49–62** — frosted-glass shutter arsitektural dengan *double metallic hairline* (Professional)
     atau panel kertas *torn deckle-edge* organik dengan bayangan dedaunan (Rustic).
  6. **Elegan & Floral 63–72** — botanical arch bunga mawar/peony 3D mekar + sulur bunga di sepanjang garis belahan.
  7. **Pernikahan Islami 73–80** — kisi-kisi geometris suci **Mashrabiya** atau kontur arch kubah Islami dengan
     radial glow keemasan hangat.
  8. **Akad Nikah & Resepsi 81–85** — panel arsitektural simetris ber-emboss segel monogram dengan label
     "Akad Nikah" (kiri) dan "Resepsi" (kanan).
  9. **Internasional 86–90** — editorial double doors Vogue-style (Bold Modern) atau curtain tekstil royal
     Nusantara (Tradisional Nusantara), membuka ke UI bilingual.

## 11. Gate Animation & Asset Architecture (wajib dibangun sebagai DOM nyata)

- **Struktur dua sayap dengan Garis Tepi Emas Dalam (Luminous Inner Seam):**
  Setiap gate dibangun sebagai DUA panel simetris penuh viewport (`position: fixed; inset: 0; z-index: 30; pointer-events: none;`):
  - `.gate-wing-left` — 50%–60% kiri, wajib memiliki `border-right: 2px solid #C9A050` (atau warna aksen emas/metalik palet) yang tegas di tepi dalamnya.
  - `.gate-wing-right` — 50%–60% kanan (cerminan sayap kiri), wajib memiliki `border-left: 2px solid #C9A050` yang bertemu rapat di tengah layar saat `0px` scroll.
  - `.gate-top-arch` (opsional) — arch header budaya di bagian atas yang terangkat `translateY(-40%)` saat scroll.
- **Fisika Membuka V-Angle pada STATE 3 (scroll 0→500px, hardware-accelerated):**
  - `.gate-wing-left` → `transform: translate3d(-78%, 0, 0) rotate(-6deg) scale(1.05)`
  - `.gate-wing-right` → `translate3d(78%, 0, 0) rotate(6deg) scale(1.05)`
  - **Permanent Side Framing (Wajib):** Jangan pernah menghilangkan sayap ke `0%` atau menggesernya keluar layar 100%. Sisakan **15%–20% bagian luar** `.gate-wing-left` dan `.gate-wing-right` (beserta garis tepi miring emasnya) tetap mengapit sisi kiri dan kanan viewport secara permanen selama user men-scroll seluruh isi undangan dari atas hingga penutup!
- **Visual proof untuk Stitch canvas:** tampilkan **mid-scroll V-angle parting state (50%–70% terbuka)** di viewport
  Hero/Welcome, sehingga celah miring berbentuk V, sayap berornamen di kiri-kanan, dock bawah, dan kartu "Salam Pembuka" + "Mempelai" terlihat jelas secara bersamaan.

## 12. Cultural & Visual Dictionary (strict authenticity — "sangat kental adat")

- **Adat Jawa 01–18:** Batik Parang / Kawung / Truntum autentik, pilar Keraton Jogja–Solo, siluet Gunungan,
  ikonografi halus Paes Ageng / Blangkon, roncean melati.
- **Adat Sunda 19–30:** motif Mega Mendung autentik, geometri Siger Sunda, ornamen bulu Merak, siluet Kujang,
  tekstur bambu/Angklung (sub-style Rustic), botanikal Priangan.
- **Adat Minang 31–40:** siluet Bagonjong, Ukiran Minang (Itik Pulang Petang / Pucuak Rabuang), Suntiang
  Gadang, tenun Marawa/Songket geometris.
- **Adaptasi palet:** saat tema tradisional dipasangkan palet modern/terang (mis. "Adat Jawa — Yellow
  Sunshine", "Adat Minang — Cyber Neon"), motif autentik TIDAK boleh hilang — render ulang Batik, Gebyok,
  atau Gonjong memakai palet yang ditugaskan sehingga budaya dan warna sama-sama akurat.

## 13. Mandatory Ultra-Ornate Section Blueprint (urutan final & aturan kemewahan komponen)

Setiap seksi yang berada di kanvas tengah (`z-index: 10`) di balik bukaan gerbang V-Angle WAJIB mengikuti standar
visual berlapis berikut (dilarang membuat kotak putih polos):

1. **Cover & Async V-Angle Gate** — sesuai §10–§11.
2. **Salam Pembuka & Quotes** — kartu berbingkai ukiran sudut + double inner hairline border. Menampilkan badge
   sub-judul budaya di atas (mis. `BATIK KAWUNG • PILAR KERATON`), diikuti doa/sapaan puitis. Untuk **64, 66, 68, 70, 72, 73–80**
   wajib kaligrafi Bismillah + terjemahan QS. Ar-Rum: 21 di dalam arch frame berornamen.
3. **Profil Mempelai (Luxury Heritage Cards)** — diawali header seksi bermahkota emblem budaya + sub-judul puitis
   (mis. `DUA JIWA SAWIJI ROSO — Mempelai`). Dua kartu mempelai (Pria & Wanita) dengan:
   - Bingkai Kartu: Arch-topped atau double-bordered heritage card dengan *corner filigree* (ukiran sudut emas) dan watermark motif 6% opacity di latar kartu.
   - Bingkai Foto: Portrait mempelai WAJIB di dalam **Gold-Trimmed Arch, Ornate Oval Medallion, atau Silhouette Mask** dengan hiasan bunga/ornamen 2.5D di tepi bawah foto (bukan foto kotak/potongan miring polos).
   - Pemisah "&": Di antara kartu mempelai pria dan wanita, gunakan **Emblem Mahkota / Monogram Crest Berornamen** yang diapit sulur kiri-kanan (bukan huruf `&` kecil biasa).
   - Info Lengkap: Nama lengkap & gelar, urutan lahir ("Putra Pambayun / Putri Bungsu"), nama kedua orang tua, nama kota, dan tombol pill `@username` Instagram berikon.
4. **Cerita Cinta (Elevated Storyboard Timeline)** — header bermahkota emblem (`LELAKON ASMORO — Cerita Cinta`).
   Bukan sekadar teks di samping garis lurus! Setiap milestone ("2022 — Awal Bertemu", "2025 — Lamaran & Tunangan",
   "2026 — Menuju Pelaminan") WAJIB berada di dalam **Sub-Kartu Berornamen / Parchment Card** masing-masing,
   dihubungkan oleh garis sulur emas dengan titik tahun berbentuk medali berlian/bintang emas yang menyala.
5. **Rangkaian Acara (Royal Ticket / Arch Schedule Cards)** — header (`TATA LAMPAH — Rangkaian Acara`). Dua kartu
   terpisah (**Akad Nikah & Panggih** dan **Resepsi Pernikahan**) yang didesain menyerupai **Tiket Undangan Kerajaan
   (notched corners) atau Kubah/Arch Keraton** dengan border ganda emas, tanggal di dalam pita/badge terstruktur,
   ikon jam & pin lokasi, nama gedung & alamat lengkap, serta tombol pill metalik `[ + SIMPAN KE KALENDER ]`.
6. **Countdown Timer (Embossed Crest Plaques)** — kartu bertajuk `MENUJU IKRAR SUCI` yang memuat tanggal acara dan
   4 kotak metrik horizontal (`HARI`, `JAM`, `MENIT`, `DETIK`) bergaya **Plakat Emas Berukir / Ornate Crest Badges**
   dengan efek *inner glow* dan *double border* (bukan kotak warna solid polos).
7. **Peta & Lokasi** — preview peta berbingkai ukiran sudut + penanda pin kustom + tombol kontras tinggi
   `[ Lihat Lokasi di Google Maps ]`.
8. **Galeri Foto (Bento Editorial Grid & Carousel)** — dilarang menyisakan ruang kosong ganjil (seperti 5 foto kotak
   sejajar). Gunakan tata letak **Bento Editorial Simetris**: 1 foto Hero besar berbingkai *Arch* (100% width) di atas,
   diikuti grid 2x2 simetris di bawahnya (atau filmstrip carousel horizontal), di mana setiap foto memiliki bingkai
   garis emas tipis di bagian dalam.
9. **Konfirmasi Kehadiran (Luxury RSVP Card)** — kartu berukir sudut (`PRESENSI — Konfirmasi Kehadiran`) berisi:
   input "Nama Lengkap Tamu" berbingkai aksen emas, 2 tombol kartu pilihan interaktif berikon (`[ ✓ HADIR ]` /
   `[ ✕ BERHALANGAN ]`), dropdown "Jumlah Tamu — 1 Orang / 2 Orang", dan tombol utama `[ KIRIM KONFIRMASI RSVP ]`
   dengan kilau tepi emas.
10. **Ucapan & Doa (Stamped Guestbook Feed — Tanpa Native Scrollbar)** — kartu (`BUKU TAMU — Ucapan & Doa`) berisi
    input nama, textarea ucapan, dan tombol `[ KIRIM UCAPAN ]`. Di bawahnya terdapat daftar ucapan tamu di mana:
    - Setiap ucapan tampil seperti **Kartu Surat Berstempel (Stamped Luxury Note Card)** lengkap dengan lingkaran
      inisial avatar, nama pengirim, pill badge status (`✓ Hadir` hijau/emas), waktu ("2 jam yang lalu"), dan
      watermark tanda kutip `"`.
    - **Wajib Tanpa Scrollbar Kasar:** Hilangkan scrollbar abu-abu tebal di sisi kanan; gunakan *bottom gradient fade-mask*
      atau *micro 2px gold track*.
11. **Tanda Kasih / Kado Digital (Realistic Metallic ATM Cards)** — kartu (`TANDA KASIH — Kado Digital`) yang merender
    rekening bank (BCA / Mandiri) menyerupai **Kartu ATM / Kartu Kredit Logam Mewah (Luxury Metallic Bank Cards)**
    lengkap dengan ilustrasi **Chip Emas EMV**, tekstur guilloche/batik halus di permukaan kartu, logo bank di sudut
    atas, nomor rekening bergaya *embossed*, nama pemilik, dan tombol taktil `[ SALIN ]`. Dilengkapi boks alamat
    pengiriman kado fisik berbingkai pita di bagian bawah.
12. **Penutup & Branding** — kartu ucapan terima kasih yang megah, monogram inisial pasangan, nama keluarga besar,
    flourish budaya/floral penutup, dan footer **"Designed with Love by D'Karsa"**.

## 14. Typography, Contrast & Accessibility Lock

- Body font minimum **15px–16px** (mobile, ramah tamu usia lanjut).
- Touch target tombol minimum **44px–48px**, radius jelas, elevasi hover/active, label kontras tinggi.
- **Visual diversity:** rotasi 6 Hero Frame Shape — *full-bleed arch, oval medallion, split-diagonal,
  Wayang/Gonjong silhouette mask, overlapping editorial rectangles, floating glass card* — sehingga setiap
  ID template terasa bespoke.

## 15. Sub-style Axis per Kategori (mengikat, dipakai di nama template)

| Kategori | Sub-style (bergantian) |
|---|---|
| Adat Jawa 01–18 | Klasik Keraton → Modern Heritage |
| Adat Sunda 19–30 | Rustic → Korporat |
| Adat Minang 31–40 | Geometris → Minimalis Modern |
| Adat Nusantara 41–48 | Minimalis Modern → Geometris |
| Minimalis Modern 49–62 | Korporat (Professional) → Rustic |
| Elegan & Floral 63–72 | Pastel → Islami (ID genap: 64, 66, 68, 70, 72) |
| Pernikahan Islami 73–80 | Islami → Pastel |
| Akad Nikah & Resepsi 81–85 | Minimalis Modern → Geometris |
| Internasional 86–90 | Bold Modern → Tradisional Nusantara |

## 16. Lock

Seluruh aturan Bagian 1 + Bagian 2 di atas adalah fondasi immutable untuk Batch 1 s.d. Batch 9
(9 kategori = 9 batch produksi, 01→90).
