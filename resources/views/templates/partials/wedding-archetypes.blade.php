{{--
    9 Archetype gerbang pernikahan (WED-001..WED-090).
    Bentuk pintu (clip-path), pola panel, segel, dan bingkai potret berbeda fisik per sub-bab.
    Aktif hanya saat $wed terisi (kategori pernikahan).
--}}
@if (! empty($wed))
<style>
    /* ============================================================
       1. ADAT JAWA — puncak Gunungan (wayang)
       ============================================================ */
    html[data-wed="jawa"] .gate-door.left { clip-path: polygon(0% 10%, 60% 10%, 100% 0%, 100% 100%, 0% 100%); }
    html[data-wed="jawa"] .gate-door.right { clip-path: polygon(0% 0%, 40% 10%, 100% 10%, 100% 100%, 0% 100%); }
    html[data-wed="jawa"] .gate-door::before {
        background-image:
            repeating-linear-gradient(122deg, color-mix(in srgb, var(--foil) 16%, transparent) 0 2px, transparent 2px 16px),
            radial-gradient(circle at 12px 12px, color-mix(in srgb, var(--foil) 14%, transparent) 0 3px, transparent 3px),
            radial-gradient(circle at 30px 30px, color-mix(in srgb, var(--foil) 12%, transparent) 0 3px, transparent 3px);
        background-size: auto, 42px 42px, 42px 42px;
        opacity: 1;
    }
    html[data-wed="jawa"] .gate-seal .medal { border-radius: 50% 50% 46% 46% / 58% 58% 42% 42%; }
    html[data-wed="jawa"] .couple-portrait { border-radius: 50% 50% 8px 8px / 34% 34% 4% 4% !important; }

    /* ============================================================
       2. ADAT SUNDA — lengkung awan Mega Mendung (scalloped)
       ============================================================ */
    html[data-wed="sunda"] .gate-door.left { clip-path: polygon(0 16%, 14% 6%, 28% 18%, 42% 5%, 56% 17%, 70% 4%, 84% 15%, 100% 6%, 100% 100%, 0 100%); }
    html[data-wed="sunda"] .gate-door.right { clip-path: polygon(0 6%, 16% 15%, 30% 4%, 44% 17%, 58% 5%, 72% 18%, 86% 6%, 100% 16%, 100% 100%, 0 100%); }
    html[data-wed="sunda"] .gate-door::before {
        background-image:
            radial-gradient(60% 40% at 30% 20%, color-mix(in srgb, var(--foil) 18%, transparent) 0 40%, transparent 42%),
            radial-gradient(60% 40% at 70% 55%, color-mix(in srgb, var(--foil) 14%, transparent) 0 40%, transparent 42%),
            repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 9%, transparent) 0 1px, transparent 1px 9px);
        background-size: 120% 70%, 120% 70%, auto;
        opacity: 1;
    }
    html[data-wed="sunda"] .gate-seal .medal { border-radius: 46% 46% 40% 40% / 52% 52% 48% 48%; }
    html[data-wed="sunda"] .couple-portrait { border-radius: 50% 50% 10px 10px / 26% 26% 6% 6% !important; }

    /* ============================================================
       3. ADAT MINANG — tanduk Bagonjong (melengkung ke atas)
       ============================================================ */
    html[data-wed="minang"] .gate-door.left { clip-path: polygon(0% 0%, 30% 12%, 70% 12%, 100% 2%, 100% 100%, 0% 100%); }
    html[data-wed="minang"] .gate-door.right { clip-path: polygon(0% 2%, 30% 12%, 70% 12%, 100% 0%, 100% 100%, 0% 100%); }
    html[data-wed="minang"] .gate-door::before {
        background-image:
            repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 20%, transparent) 0 1px, transparent 1px 14px),
            repeating-linear-gradient(-45deg, color-mix(in srgb, var(--foil) 20%, transparent) 0 1px, transparent 1px 14px),
            repeating-linear-gradient(90deg, color-mix(in srgb, var(--foil) 8%, transparent) 0 1px, transparent 1px 28px);
        opacity: 1;
    }
    html[data-wed="minang"] .gate-seal .medal { border-radius: 42% 42% 999px 999px; }
    html[data-wed="minang"] .couple-portrait { border-radius: 48% 48% 8px 8px / 30% 30% 4% 4% !important; }

    /* ============================================================
       4. ADAT NUSANTARA — Candi Bentar bertangga
       ============================================================ */
    html[data-wed="nusantara"] .gate-door.left { clip-path: polygon(0% 0%, 58% 0%, 58% 12%, 72% 12%, 72% 24%, 86% 24%, 86% 36%, 100% 36%, 100% 100%, 0% 100%); }
    html[data-wed="nusantara"] .gate-door.right { clip-path: polygon(42% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 36%, 14% 36%, 14% 24%, 28% 24%, 28% 12%, 42% 12%); }
    html[data-wed="nusantara"] .gate-door::before {
        background-image:
            repeating-linear-gradient(90deg, color-mix(in srgb, var(--foil) 18%, transparent) 0 2px, transparent 2px 12px),
            repeating-linear-gradient(0deg, color-mix(in srgb, var(--foil) 12%, transparent) 0 2px, transparent 2px 12px);
        opacity: 1;
    }
    html[data-wed="nusantara"] .gate-seal .medal { border-radius: 18px; }
    html[data-wed="nusantara"] .couple-portrait { border-radius: 6px !important; clip-path: polygon(12% 0, 88% 0, 100% 10%, 100% 90%, 88% 100%, 12% 100%, 0 90%, 0 10%); }

    /* ============================================================
       5. MINIMALIS MODERN — setengah lengkung asimetris
       ============================================================ */
    html[data-wed="minimalis"] .gate-door.left { clip-path: none; border-top-right-radius: 160px; border-top-left-radius: 6px; }
    html[data-wed="minimalis"] .gate-door.right { clip-path: none; border-top-left-radius: 160px; border-top-right-radius: 6px; }
    html[data-wed="minimalis"] .gate-door::before {
        background-image:
            repeating-linear-gradient(90deg, color-mix(in srgb, var(--foil) 7%, transparent) 0 1px, transparent 1px 32px),
            repeating-linear-gradient(0deg, color-mix(in srgb, var(--foil) 7%, transparent) 0 1px, transparent 1px 32px);
        opacity: 1;
    }
    html[data-wed="minimalis"] .gate-door::after { border-radius: 12px; inset: 22px; opacity: .5; }
    html[data-wed="minimalis"] .gate-seal .medal { border-radius: 999px; box-shadow: 0 0 0 1px color-mix(in srgb, var(--foil) 55%, transparent), 0 0 34px rgba(229,193,88,.25); }
    html[data-wed="minimalis"] .couple-portrait { border-radius: 999px 999px 12px 12px !important; }

    /* ============================================================
       6. ELEGAN & FLORAL — konservatori botanikal
       ============================================================ */
    html[data-wed="floral"] .gate-door.left { clip-path: polygon(0% 22%, 18% 10%, 42% 0%, 68% 8%, 88% 2%, 100% 18%, 100% 100%, 0% 100%); }
    html[data-wed="floral"] .gate-door.right { clip-path: polygon(0% 18%, 12% 2%, 32% 8%, 58% 0%, 82% 10%, 100% 22%, 100% 100%, 0% 100%); }
    html[data-wed="floral"] .gate-door::before {
        background-image:
            repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 16%, transparent) 0 1px, transparent 1px 26px),
            repeating-linear-gradient(-45deg, color-mix(in srgb, var(--foil) 16%, transparent) 0 1px, transparent 1px 26px),
            radial-gradient(circle at 20% 70%, color-mix(in srgb, var(--foil) 12%, transparent) 0 18%, transparent 20%);
        opacity: 1;
    }
    html[data-wed="floral"] .gate-seal .medal { border-radius: 46% 54% 48% 52% / 52% 46% 54% 48%; }
    html[data-wed="floral"] .couple-portrait { border-radius: 50% !important; }

    /* ============================================================
       7. ISLAMI — mihrab runcing
       ============================================================ */
    html[data-wed="islami"] .gate-door.left { clip-path: polygon(0% 100%, 0% 30%, 100% 0%, 100% 100%); }
    html[data-wed="islami"] .gate-door.right { clip-path: polygon(0% 0%, 100% 30%, 100% 100%, 0% 100%); }
    html[data-wed="islami"] .gate-door::before {
        background-image:
            repeating-conic-gradient(from 0deg at 50% 50%, color-mix(in srgb, var(--foil) 14%, transparent) 0deg 45deg, transparent 45deg 90deg);
        background-size: 34px 34px;
        opacity: 1;
    }
    html[data-wed="islami"] .gate-seal .medal { border-radius: 46% 46% 10px 10px; clip-path: polygon(50% 0%, 100% 26%, 100% 100%, 0 100%, 0 26%); }
    html[data-wed="islami"] .couple-portrait { border-radius: 50% 50% 6px 6px / 40% 40% 3% 3% !important; }

    /* ============================================================
       8. AKAD & RESEPSI — dua pintu asimetris (pagi vs malam)
       ============================================================ */
    html[data-wed="akad"] .gate-door.left { clip-path: polygon(0% 100%, 0% 24%, 34% 4%, 100% 0%, 100% 100%); }
    html[data-wed="akad"] .gate-door.right { clip-path: polygon(0% 0%, 66% 4%, 100% 24%, 100% 100%, 0% 100%); }
    html[data-wed="akad"] .gate-door.left::before {
        background-image: repeating-linear-gradient(135deg, color-mix(in srgb, var(--foil) 20%, transparent) 0 1px, transparent 1px 20px);
        opacity: 1;
    }
    html[data-wed="akad"] .gate-door.right::before {
        background-image: repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 20%, transparent) 0 1px, transparent 1px 20px);
        opacity: 1;
    }
    html[data-wed="akad"] .gate-seal .medal { border-radius: 10px; transform: rotate(45deg); }
    html[data-wed="akad"] .gate-seal .medal > div { transform: rotate(-45deg); border-radius: 8px; }
    html[data-wed="akad"] .couple-portrait { border-radius: 10px !important; clip-path: polygon(50% 0, 100% 18%, 100% 82%, 50% 100%, 0 82%, 0 18%); }

    /* ============================================================
       9. INTERNASIONAL — boiserie istana
       ============================================================ */
    html[data-wed="internasional"] .gate-door.left { clip-path: polygon(0% 12%, 100% 0%, 100% 100%, 0% 100%); }
    html[data-wed="internasional"] .gate-door.right { clip-path: polygon(0% 0%, 100% 12%, 100% 100%, 0% 100%); }
    html[data-wed="internasional"] .gate-door::before {
        background-image:
            repeating-linear-gradient(0deg, color-mix(in srgb, var(--foil) 18%, transparent) 0 2px, transparent 2px 34px),
            repeating-linear-gradient(90deg, color-mix(in srgb, var(--foil) 18%, transparent) 0 2px, transparent 2px 34px),
            repeating-linear-gradient(45deg, color-mix(in srgb, var(--foil) 8%, transparent) 0 1px, transparent 1px 18px);
        opacity: 1;
    }
    html[data-wed="internasional"] .gate-door::after { border-radius: 0; inset: 20px; border-width: 2px; }
    html[data-wed="internasional"] .gate-seal .medal { border-radius: 999px; box-shadow: 0 0 0 3px color-mix(in srgb, var(--foil) 30%, transparent), 0 0 34px rgba(229,193,88,.35); }
    html[data-wed="internasional"] .couple-portrait { border-radius: 50% 50% 0 0 / 40% 40% 0 0 !important; }

    /* Pola panel berlaku untuk premium (tanpa ::before bawaan) juga */
    html[data-tier="premium"][data-wed] .gate-door::before { display: block; }

    /* Daun kanan = cermin daun kiri supaya pola & pencahayaan simetris */
    html[data-wed] .gate-door.right::before { transform: scaleX(-1); }
</style>
@endif
