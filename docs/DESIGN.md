---
version: alpha-v2
name: D'Karsa Master Invitation System
description: Platform-wide master design spec for 90 luxury Indonesian digital wedding invitation templates — tactile materiality, V-angle scroll-linked gates, ultra-ornate inner cards, ceremonial typography.
colors:
  primary: "#0B231A"
  primary-soft: "#344C41"
  secondary: "#C9A050"
  tertiary: "#E8D3A2"
  neutral: "#FBF8F2"
  surface: "#FCF9F3"
  surface-raised: "#FFFFFF"
  obsidian: "#121915"
  ink: "#1C1C18"
  ink-muted: "#5A615C"
  outline: "#C9A050"
  error: "#BA1A1A"
typography:
  headline-display:
    fontFamily: EB Garamond
    fontSize: 48px
    fontWeight: 500
    lineHeight: 56px
    letterSpacing: "0.04em"
  headline-display-mobile:
    fontFamily: EB Garamond
    fontSize: 34px
    fontWeight: 500
    lineHeight: 42px
    letterSpacing: "0.03em"
  headline-lg:
    fontFamily: EB Garamond
    fontSize: 36px
    fontWeight: 500
    lineHeight: 44px
    letterSpacing: "0.02em"
  headline-md:
    fontFamily: EB Garamond
    fontSize: 26px
    fontWeight: 600
    lineHeight: 34px
  headline-sm:
    fontFamily: EB Garamond
    fontSize: 20px
    fontWeight: 600
    lineHeight: 28px
  body-lg:
    fontFamily: EB Garamond
    fontSize: 20px
    fontWeight: 400
    lineHeight: 32px
  body-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 15px
    fontWeight: 400
    lineHeight: 24px
  body-sm:
    fontFamily: Plus Jakarta Sans
    fontSize: 13px
    fontWeight: 400
    lineHeight: 20px
  label-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 13px
    fontWeight: 600
    lineHeight: 18px
    letterSpacing: "0.14em"
  label-sm:
    fontFamily: Plus Jakarta Sans
    fontSize: 10px
    fontWeight: 700
    lineHeight: 14px
    letterSpacing: "0.18em"
rounded:
  sm: 2px
  md: 4px
  lg: 8px
  xl: 12px
  arch: 160px
  full: 999px
spacing:
  xs: 4px
  sm: 8px
  md: 16px
  lg: 28px
  xl: 48px
  gutter-mobile: 16px
  gutter: 24px
  margin-mobile: 20px
  margin: 48px
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.tertiary}"
    borderColor: "{colors.secondary}"
    rounded: "{rounded.md}"
    padding: 14px
  button-secondary:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.primary}"
    borderColor: "{colors.secondary}"
    rounded: "{rounded.md}"
    padding: 14px
  chip-attendance:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.tertiary}"
    rounded: "{rounded.lg}"
    padding: 8px
  input-rsvp:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink}"
    borderColor: "{colors.secondary}"
    rounded: "{rounded.md}"
    padding: 12px
  card-heritage:
    backgroundColor: "{colors.surface-raised}"
    textColor: "{colors.ink}"
    borderColor: "{colors.secondary}"
    cornerFiligree: true
    doubleInsetBorder: true
    watermarkOpacity: 0.06
    rounded: "{rounded.lg}"
    padding: 24px
  card-event-ticket:
    backgroundColor: "{colors.surface-raised}"
    textColor: "{colors.ink}"
    borderColor: "{colors.secondary}"
    notchedCorners: true
    doubleInsetBorder: true
    rounded: "{rounded.lg}"
    padding: 24px
  card-gift-atm:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.tertiary}"
    borderColor: "{colors.secondary}"
    hasEmvChip: true
    guillochePattern: true
    rounded: "{rounded.xl}"
    padding: 20px
  audio-pill:
    backgroundColor: "{colors.obsidian}"
    textColor: "{colors.secondary}"
    borderColor: "{colors.secondary}"
    rounded: "{rounded.full}"
    size: 52px
  hud-dock:
    backgroundColor: "{colors.surface-raised}"
    textColor: "{colors.ink}"
    borderColor: "{colors.secondary}"
    tabs: ["MEMPELAI", "ACARA", "GALERI", "RSVP", "DOA"]
    rounded: "{rounded.sm}"
  gate-panel:
    backgroundColor: "{colors.obsidian}"
    textColor: "{colors.tertiary}"
    innerSeamBorder: "2px solid {colors.secondary}"
    partingTransform: "translate3d(±78%, 0, 0) rotate(±6deg) scale(1.05)"
    rounded: "{rounded.sm}"
  quote-block:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.primary-soft}"
    borderColor: "{colors.secondary}"
    cornerFiligree: true
    rounded: "{rounded.lg}"
    padding: 24px
---

## Overview

D'Karsa is an Indonesian luxury digital-invitation platform. This file is the **master spec** for a
collection of **90 production wedding-invitation websites** (Laravel Blade, HTML5, CSS3, vanilla JS,
PostgreSQL). It is the single source of truth: `docs/MASTER-INVITATION-BRIEF.md` holds the client brief,
`docs/template-registry.json` holds the per-template matrix (number, key, palette, hero layout, divider,
gallery, gate, sections).

Templates are **living vertical websites**, never posters, wireframes, plain white box stacks, galleries or
dashboards. Every template must feel tactile and ceremonial: real material surfaces, 2.5D layering,
atmospheric light, ultra-ornate inner cards, and D'Karsa's signature **V-Angle Split-Gate** choreography.

The platform layer (this file's tokens) is constant across all 90: emerald `#0B231A`, antique gold
`#C9A050`, champagne `#E8D3A2`, warm ivory `#FBF8F2`, obsidian `#121915`, EB Garamond display +
Plus Jakarta Sans for information. Per-template palettes override the platform layer — see
**Template Matrix**.

## Colors

- **Primary — Royal Emerald `#0B231A`:** structural anchors, primary buttons, luxury ATM gift cards, dark canvases.
- **Secondary — Antique Gold `#C9A050`:** inner gate seam borders, corner filigree, keylines, active states.
- **Tertiary — Champagne Gold `#E8D3A2`:** secondary inset borders, hover glow, soft metallic gradients.
- **Neutral — Warm Ivory `#FBF8F2` / Surface `#FCF9F3`:** the center reveal canvas, pressed cotton cardstock with subtle dot/batik grain.
- **Obsidian `#121915`:** night surfaces, envelope linings, gate wing panels.
- **Ink `#1C1C18`, Ink-muted `#5A615C`:** body copy and metadata.

Each of the 90 templates carries one named palette from `template-registry.json` (26 palettes, e.g.
Ocean Blue, Dusty Rose, Sage Green, Rose Gold, Blueberry Milk, Midnight Navy, Cyber Neon, Earth Tone).
Palette swap changes canvas, ink, accent and deep tone — **never** the cultural motifs.

## Typography

- **Display serif** carries the ceremonial voice: couple names, honorifics, section banners, poetic quotes.
  Per category: EB Garamond (Jawa), Cormorant Garamond (Sunda, Floral), Playfair Display (Minang),
  Literata (Nusantara), Space Grotesk (Minimalis), Amiri (Islami), Bodoni Moda (Akad, Internasional).
- **Body sans** carries logistics: dates, times, venue, RSVP inputs, countdown, guestbook.
  Plus Jakarta Sans, Work Sans, Manrope, DM Sans, Inter, Nunito Sans, Source Sans 3, Karla.
- **Micro-labels / overlines:** full caps, `0.14em`–`0.18em` tracking, sans only (e.g., `DUA JIWA SAWIJI ROSO`, `TATA LAMPAH`).
- Never set long body copy in a script or calligraphic face; never use more than two families per template.

## Layout, Z-Index & Persistent HUD

**Mobile-first lock:** interactive viewport 390–430px, `max-w-md mx-auto`. **Desktop 1440px:** either
*Split-Screen Showcase* (left 60% fixed editorial couple portrait + cultural artwork + music controller,
right 40% the scrollable invitation) or *Centered Luxury Mobile Container* flanked by the permanent 15%–20%
angled gate wings on the left and right edges.

**Z-index layering (2.5D depth, mandatory):**

| Layer | Role |
|---|---|
| `Z-0` | base canvas — tactile texture (songket, embossed batik, linen, carved wood, subtle dot grid) |
| `Z-10` | midground content — ornate corner-filigree cards, arched portraits, storyboard cards, ATM gift cards |
| `Z-20` | foreground ornament — corner botanicals, melati garlands, carved archways overlapping Z-10 card edges |
| `Z-30` | async V-angle split-gate — full-screen left/right cultural wings with luminous gold inner borders |
| `Z-40` | locked cover overlay — initial 100vh cover screen prior to clicking `[ Buka Undangan ]` |
| `Z-50` | persistent foreground HUD — bottom-center 5-tab navigation dock (`MEMPELAI \| ACARA \| GALERI \| RSVP \| DOA`) + bottom-right 52px circular audio button (`♪`) |

## Elevation, Depth & Anti-Plain-Box Architecture

Plain white rectangles with simple thin borders are **strictly forbidden**. Every inner card must apply:

1. **Corner Filigree & Double Inset Borders:** 1px outer gold/accent border (`40%` opacity) + 1px inner inset border offset by `4px`–`6px` with ornamental corner carvings (*ukiran sudut*) at all four corners.
2. **Surface Watermarks:** Subtle `5%–8%` opacity cultural or botanical motif watermark inside the card background so cards never look sterile.
3. **Crowned Section Headers:** Every section title (`Mempelai`, `Cerita Cinta`, `Rangkaian Acara`, `Galeri`, `Presensi`, `Buku Tamu`, `Tanda Kasih`) must be topped with a miniature cultural crest/emblem and flanked by left-right filigree dividers.
4. **Tinted Ambient Shadows:** Palette-deep undertone (`rgba(11,35,26,0.12)` → `rgba(18,25,21,0.28)`).

## Shapes & Framing

- **Couple Portraits:** Must be framed inside **Gold-Trimmed Arches (`160px 160px 8px 8px`), Ornate Oval Medallions, or Cultural Silhouette Masks** with 2.5D overlapping floral/carved clusters at the bottom edge of the portrait—never a plain square or simple angled rectangle.
- **Couple Connector:** Separate the Bride and Groom cards with an **Ornate Cultural Crest / Monogram Seal** flanked by horizontal flourishes—never a plain text `&`.
- **Event Cards:** Styled as **Royal Invitation Tickets** (with notched corners) or **Pointed Heritage Arches**.
- **Countdown Boxes:** Styled as **Embossed Gold-Trimmed Crest Plaques** with inner radial glow.

## Components

- **button-primary — Gilded:** emerald/deep fill, gold hairline border, gold uppercase label; subtle shimmer sweep.
- **button-secondary — Linen Foil:** ivory/translucent fill, 1px gold border, dark/gold label (`[ + SIMPAN KE KALENDER ]`).
- **Buka Undangan seal:** pulsing tactile CTA button or wax seal on the cover, `2.4s` breathe loop, ≥48px hit area.
- **hud-dock (`z-index: 50`):** fixed bottom-center bar with 5 icon+label tabs: `MEMPELAI`, `ACARA`, `GALERI`, `RSVP`, `DOA`.
- **audio-pill (`z-index: 50`):** fixed bottom-right corner, 52px circle, dark/obsidian fill with 1px gold border and `♪` / live soundwave icon.
- **gate-wing-left / gate-wing-right (`z-index: 30`):** `position: fixed; inset: 0; pointer-events: none;` symmetrical full-height panels with a bold `2px–3px` gold inner seam border and authentic cultural silhouette artwork across the wing surface.
- **card-heritage:** ornate container with corner filigree, double inset rules, and subtle motif watermark.
- **timeline-storyboard:** love story milestones housed inside individual ornate parchment/glass sub-cards connected by a gold scrollwork vine and diamond/medallion year badges (`2022`, `2025`, `2026`).
- **gallery-bento:** symmetrical Bento editorial layout (1 full-width arched Hero photo on top + 2x2 grid below, or horizontal filmstrip carousel) with thin inner gold frames—never an uneven 5-box grid with an empty corner gap.
- **guestbook-feed:** custom comment list of **Stamped Luxury Note Cards** (avatar initial circle, guest name, `✓ Hadir` emerald/gold pill badge, timestamp, quote watermark) with **hidden native scrollbars** (`scrollbar-width: none` + bottom gradient fade mask).
- **card-gift-atm:** realistic metallic/textured bank card (BCA / Mandiri) featuring a **gold EMV chip icon**, guilloche/batik surface pattern, bank logo, embossed-style account numbers, holder name, and `[ SALIN ]` pill button, paired with a ribbon-framed physical gift address box below.

## Opening Choreography (D'Karsa Signature V-Angle Split)

Mandatory 3-state asynchronous mechanic, identical logic in all 90 templates, different cultural skin.
The gate is real DOM, not a static background:

```html
<div class="gate-top-arch" aria-hidden="true"><svg class="gate-art">…cultural arch…</svg></div>
<div class="gate-wing-left"  aria-hidden="true"><span class="gate-seam"></span><svg class="gate-art">…cultural silhouette…</svg></div>
<div class="gate-wing-right" aria-hidden="true"><span class="gate-seam"></span><svg class="gate-art">…mirrored silhouette…</svg></div>
```

```css
.gate-wing-left, .gate-wing-right {
  position: fixed; top: 0; bottom: 0; width: 58%; z-index: 30;
  pointer-events: none; will-change: transform;
  background: var(--gate-surface); /* obsidian/deep tone + embossed motif — never a flat hex */
}
.gate-wing-left  { left: 0;  border-right: 2px solid var(--seam, #C9A050); }
.gate-wing-right { right: 0; border-left:  2px solid var(--seam, #C9A050); }

/* STATE 3 — progress p: 0 → 1 across the first 500px of scroll */
.gate-wing-left  { transform: translate3d(calc(-78% * var(--p)), 0, 0) rotate(calc(-6deg * var(--p))) scale(calc(1 + 0.05 * var(--p))); }
.gate-wing-right { transform: translate3d(calc( 78% * var(--p)), 0, 0) rotate(calc( 6deg * var(--p))) scale(calc(1 + 0.05 * var(--p))); }
```

| State | Trigger | What the guest sees |
|---|---|---|
| **1 — Locked Cover** (`Z-40`) | page load | 100vh cover: hero frame, couple names, date, `Kepada Yth. Bapak/Ibu/Saudara/i: [Nama Tamu]`, pulsing `[ Buka Undangan ]` seal. Wings shut with their gold seams meeting dead-centre, page scroll locked (`overflow: hidden`). |
| **2 — Async Gate** (0–800ms after tap) | `[ Buka Undangan ]` | cover text fades (`opacity 0`, `scale 0.95`), audio initialises, scroll unlocks, the gate stands whole in front of the invitation with the luminous seam still centred, plus the prompt *"Geser ke bawah untuk membuka undangan"* and a bouncing chevron. |
| **3 — V-Angle Parting** (scroll 0→500px) | first scroll | both wings tilt outward along the diagonal, opening an inverted-trapezoid light shaft that widens from the centre and uncovers Section 2 (Salam Pembuka) then Section 3 (Mempelai); 15%–20% of each wing stays anchored as the permanent stage frame. |

Rules:

- `--p` is clamped `0 → 1` over 500px and written once per frame inside `requestAnimationFrame`; never read layout inside the scroll handler.
- Wings are never translated off-screen and never removed from the DOM: at `p = 1` a 15%–20% angled frame still hugs both edges from cover to closing section.
- Wing surfaces must carry authentic cultural silhouette artwork (see **Cultural Dictionary**) behind a `2px–3px` gold inner seam with a slow shimmer sweep. Abstract circles or plain curved lines are forbidden.
- The **mid-scroll proof state (50%–70% open)** is the state every Stitch canvas, screenshot and design review must show — V shaft, ornamented wings, bottom dock, "Salam Pembuka" and "Mempelai" cards visible at once.

## Section Architecture — 12 Ornate Sections

Final order is binding for all 90 templates (countdown precedes map). Every section sits on the `Z-10` midground and must be built as an ornate heritage card — never a plain white box.

| # | Section | Anchor | Mandatory treatment |
|---|---|---|---|
| 1 | Cover & Async V-Angle Gate | `#cover` | State 1–3 per **Opening Choreography**; hero frame per template; guest badge + `[ Buka Undangan ]` seal. |
| 2 | Salam Pembuka & Quotes | `#salam` | Corner-filigree card, double inner hairline, cultural sub-title pill (e.g. `BATIK KAWUNG • PILAR KERATON`). Templates **64, 66, 68, 70, 72, 73–80** render Bismillah calligraphy + QS. Ar-Rum 21 translation inside an ornate arch frame. |
| 3 | Profil Mempelai | `#mempelai` | Two heritage cards, gold-trimmed arch / oval medallion / silhouette-mask portraits with 2.5D floral clusters, ornate crest connector (never a plain `&`), full name & title, birth order, parents, city, `@username` Instagram pill. |
| 4 | Cerita Cinta | `#cerita` | Parchment sub-card per milestone (`2022 — Awal Bertemu`, `2025 — Lamaran & Tunangan`, `2026 — Menuju Pelaminan`) strung on a gold scrollwork vine with glowing medallion year badges. |
| 5 | Rangkaian Acara | `#acara` | Separate royal-ticket / heritage-arch cards for **Akad Nikah & Panggih** and **Resepsi Pernikahan**: notched corners, double gold border, date ribbon, clock + pin icons, full venue, `[ + SIMPAN KE KALENDER ]` metallic pill, WIB/WITA/WIT. |
| 6 | Countdown Timer | `#countdown` | `MENUJU IKRAR SUCI` plaque with the event date and 4 embossed crest boxes (`HARI`, `JAM`, `MENIT`, `DETIK`) carrying inner glow + double border. |
| 7 | Peta & Lokasi | `#peta` | Ornate-framed map preview, custom pin marker, full address, high-contrast `[ Lihat Lokasi di Google Maps ]`. |
| 8 | Galeri Foto | `#galeri` | Symmetrical Bento: 1 full-width arched hero photo + 2×2 grid (or filmstrip carousel), thin gold inner frames, no empty corner cell. |
| 9 | Konfirmasi Kehadiran | `#rsvp` | `PRESENSI` corner-filigree card: gold-framed guest name input, `[ ✓ HADIR ]` / `[ ✕ BERHALANGAN ]` toggle cards, pax dropdown (1/2 orang), `[ KIRIM KONFIRMASI RSVP ]` with gold edge shimmer. |
| 10 | Ucapan & Doa | `#ucapan` | `BUKU TAMU` card: name input, message textarea, `[ KIRIM UCAPAN ]`, then stamped note cards (initial avatar, `✓ Hadir` pill, relative time, quote watermark) inside a fade-masked feed with no native scrollbar. |
| 11 | Tanda Kasih | `#kasih` | `TANDA KASIH` metallic ATM cards (BCA / Mandiri): EMV gold chip, guilloche/batik surface, bank logo, embossed account number, holder name, `[ SALIN ]`; ribbon-framed physical gift address box below. |
| 12 | Penutup & Branding | `#penutup` | Grand thank-you card, couple monogram, extended-family names, closing cultural/floral flourish, footer **"Designed with Love by D'Karsa"**. |

## Cultural Dictionary

Motifs are quarantined per category. A palette swap re-renders the motif in the assigned colours; it never replaces the motif.

| Category | Gate silhouette | Sanctioned motifs | Forbidden |
|---|---|---|---|
| Adat Jawa 01–18 | Gunungan wayang kulit / carved Gebyok | Batik Parang, Kawung, Truntum; Keraton Jogja–Solo pillars; Gunungan; Paes Ageng, Blangkon; roncean melati | Gonjong, Mega Mendung, Bali gates |
| Adat Sunda 19–30 | Mega Mendung cloud layers / Siger crown arch | Mega Mendung, Siger geometry, merak feather, Kujang, bamboo/Angklung texture (Rustic), Priangan botanicals | Wayang, Gunungan, Gonjong |
| Adat Minang 31–40 | Rumah Gadang gonjong roof | Ukiran Itik Pulang Petang, Pucuak Rabuang, Suntiang Gadang, Marawa/Songket geometry | Wayang, Mega Mendung, Siger |
| Adat Nusantara 41–48 | Tenun Ikat / Ulos curtain + carved arch | Tenun Ikat, Ulos, Songket, Nusantara carved pillars | Regional motifs outside the assigned region |
| Minimalis Modern 49–62 | Frosted-glass shutter / torn deckle-edge paper | Architectural hairline, metallic seam (Professional); torn paper + leaf shadow (Rustic) | Folk motifs, batik, wayang |
| Elegan & Floral 63–72 | 3D botanical arch + petal fall | Rose, peony, botanical vine, soft petals | Regional/religious motifs |
| Pernikahan Islami 73–80 | Mashrabiya lattice / Islamic dome arch | Mashrabiya, geometric arabesque, Bismillah calligraphy, Ar-Rum 21 | Figurative motifs, wayang, gonjong |
| Akad Nikah & Resepsi 81–85 | Symmetric embossed monogram panels, `Akad Nikah` / `Resepsi` | Monogram seal, architectural panel, ribbon | Folk motifs |
| Internasional 86–90 | Editorial double doors (Bold Modern) / royal Nusantara curtain (Tradisional Nusantara) | Editorial grid, Nusantara-fusion textile | Bilingual copy only here; no other template may use EN |

## Micro-Interactions & Persistent HUD

- **hud-dock (`Z-50`):** fixed bottom-centre bar with 5 icon+label tabs — `MEMPELAI`, `ACARA`, `GALERI`, `RSVP`, `DOA`. 44px minimum touch height, active tab marked with a gold hairline underline. It stays on screen in every state, including the locked cover.
- **audio-pill (`Z-50`):** fixed bottom-right 52px circle, obsidian fill, 1px gold border, `♪` / live soundwave; `aria-pressed` reflects playback state.
- **Sway:** corner botanicals, melati garlands and tassels drift on a 6–10s loop, `transform` only.
- **Shimmer:** a 4–6s specular sweep travels the gold, rose-gold or neon inner seams.
- **Elevation & focus:** cards lift `2px` and deepen their tinted shadow over `160ms`; inputs and buttons show a `2px` accent focus ring offset `2px`.
- All of the above are suppressed under `prefers-reduced-motion: reduce`, with content left fully visible.

## Theme Configuration Contract (Blade)

Each template ships as a thin Blade file that declares its identity and includes the shared shell:

```blade
@php
$tj = [
    'num' => 1, 'key' => 'jawa-keraton-agung', 'name' => 'Keraton Agung',
    'sub' => 'Minimalis Modern', 'palette' => 'Ocean Blue',
    'gate' => 'gunungan', 'hero' => 'arch', 'motif' => 'Batik Kawung',
    'cover' => 'https://…',
    'c' => ['bg' => '#F2F6F8', 'surface' => '#FFFFFF', 'ink' => '#0C2A3A',
            'soft' => '#4A6472', 'accent' => '#C9A050', 'accent2' => '#1B4F6B', 'deep' => '#08202E'],
];
@endphp
@include('templates.partials.<category>-theme')
```

- `/demo/{key}` renders the template with sample content; `?open=1` skips the cover so gate states can be reviewed without clicking.
- Published invitations render the same shell with real couple data from `/undangan/{slug}`.

## Template Matrix

Nine categories, 90 slots, sub-style axis alternating within each category (§15 of the brief):

| Range | Category | Count | Sub-style axis | Display / Body |
|---|---|---|---|---|
| 01–18 | Adat Jawa | 18 | Klasik Keraton → Modern Heritage | EB Garamond / Plus Jakarta Sans |
| 19–30 | Adat Sunda | 12 | Rustic → Korporat | Cormorant Garamond / Work Sans |
| 31–40 | Adat Minang | 10 | Geometris → Minimalis Modern | Playfair Display / Manrope |
| 41–48 | Adat Nusantara | 8 | Minimalis Modern → Geometris | Literata / DM Sans |
| 49–62 | Minimalis Modern | 14 | Korporat (Professional) → Rustic | Space Grotesk / Inter |
| 63–72 | Elegan & Floral | 10 | Pastel → Islami (even IDs) | Cormorant Garamond / Nunito Sans |
| 73–80 | Pernikahan Islami | 8 | Islami → Pastel | Amiri / Source Sans 3 |
| 81–85 | Akad Nikah & Resepsi | 5 | Minimalis Modern → Geometris | Bodoni Moda / Karla |
| 86–90 | Internasional | 5 | Bold Modern → Tradisional Nusantara | Bodoni Moda / Inter |

**Hero frame rotation (6 shapes, cycling per template):** full-bleed arch, oval medallion, split-diagonal, cultural silhouette mask (wayang / gonjong / tenun / arch / petal / mashrabiya / panel / editorial — always the template's own culture), overlapping editorial rectangles, floating glass card. The concrete assignment per slot lives in `docs/template-registry.json`.

## Accessibility Lock

- Body copy **≥ 15px** (16px preferred) at mobile widths, line-height ≥ 1.5; micro-labels never below 10px.
- Touch targets **44–48px**, never adjacent without 8px separation.
- Text contrast **WCAG AA (4.5:1)**; where a motif sits behind copy, add a translucent scrim or heritage card surface instead of lightening the text.
- Focus states are always visible and never removed for aesthetics.
- Content must never depend on JavaScript to be readable: scroll-reveal effects start from a visible state and only animate on top of it.
- `prefers-reduced-motion: reduce` disables gate parting, sway, shimmer and reveals without hiding anything.

## Governance

- **Version:** `alpha-v2`. This file and `docs/MASTER-INVITATION-BRIEF.md` are one unit; a change to one requires re-checking the other.
- **Precedence:** where Bagian 1 and Bagian 2 conflict, Bagian 2 wins on the six binding axes — section order, footer naming, V-Angle gate mechanics, anti-plain-box rules for inner sections, hero frame count, sub-style axis per category, and the Islamic verse mapping.
- **Derivation order:** brief → this spec → `docs/template-registry.json` → Blade templates. The registry is the machine-checked contract (90 unique keys, unique category × palette × frame combinations).
- **Gate:** every revision must pass `npx -y -p @google/design.md designmd lint docs/DESIGN.md` before it is copied into the Stitch design-system asset.
- **Immutability:** these rules are the foundation for Batch 1 through Batch 9 (9 categories, 01 → 90).
