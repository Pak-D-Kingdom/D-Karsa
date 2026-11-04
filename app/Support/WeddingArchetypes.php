<?php

namespace App\Support;

/**
 * 9 archetype gerbang pernikahan (WED-001..WED-090).
 *
 * Setiap archetype punya: segel medali, siluet latar (plane 1), ornamen gantung
 * (plane 3), dan gaya partikel sendiri — supaya sub-bab pernikahan tidak sekadar
 * berganti warna. Bentuk pintu (clip-path) & pola panel ada di
 * resources/views/templates/partials/wedding-archetypes.blade.php.
 */
class WeddingArchetypes
{
    public const KEYS = ['jawa', 'sunda', 'minang', 'nusantara', 'minimalis', 'floral', 'islami', 'akad', 'internasional'];

    /**
     * @return array{label: string, seal: string, silhouette: string, ornament_left: string, ornament_right: string, particle: string}
     */
    public static function art(string $archetype): array
    {
        return self::ART[$archetype] ?? self::ART['jawa'];
    }

    public static function label(string $archetype): string
    {
        return self::ART[$archetype]['label'] ?? 'Adat Jawa';
    }

    private const ART = [
        /* 1. Adat Jawa — Gunungan wayang, ronce melati, kuntum melati jatuh */
        'jawa' => [
            'label' => 'Gunungan & Gebyok Jawa',
            'particle' => 'jasmine',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M16 3c4 5 11 12 11 17 0 5-5 8-11 8S5 25 5 20C5 15 12 8 16 3Z"/><path d="M16 11l6 12H10l6-12Z" fill="currentColor" opacity=".35" stroke="none"/><path d="M16 3v6"/></svg>',
            'silhouette' => '<path d="M200 10c30 46 108 118 108 172 0 46-48 72-108 72S92 228 92 182C92 128 170 56 200 10z"/><path d="M200 84l58 126H142z" fill="#000" opacity=".3"/><path d="M128 262h144" stroke="currentColor" stroke-width="2" fill="none"/>',
            'ornament_left' => '<svg width="52" height="150" viewBox="0 0 52 150" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M26 0v36"/><circle cx="26" cy="44" r="5.5"/><circle cx="26" cy="60" r="5.5"/><circle cx="26" cy="76" r="5.5"/><circle cx="26" cy="92" r="5.5"/><path d="M26 98v18" stroke-dasharray="2 4"/><path d="M14 124h24l-4 22H18z"/></svg>',
            'ornament_right' => '<svg width="44" height="140" viewBox="0 0 44 140" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M22 0v26"/><path d="M8 44h28l-5 38H13z"/><path d="M8 44l14-12 14 12"/><path d="M22 82v16"/><circle cx="22" cy="108" r="5"/></svg>',
        ],

        /* 2. Adat Sunda — Siger, mega mendung, kunang-kunang naik */
        'sunda' => [
            'label' => 'Siger & Mega Mendung',
            'particle' => 'firefly',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M6 22c0-5 4-9 10-9s10 4 10 9"/><path d="M9 22V12M13 22V8M16 22V5M19 22V8M23 22V12"/><circle cx="9" cy="10" r="1.6" fill="currentColor"/><circle cx="13" cy="6" r="1.6" fill="currentColor"/><circle cx="16" cy="3.5" r="1.8" fill="currentColor"/><circle cx="19" cy="6" r="1.6" fill="currentColor"/><circle cx="23" cy="10" r="1.6" fill="currentColor"/><path d="M4 25h24"/></svg>',
            'silhouette' => '<path d="M20 210c40-40 60-40 90-16 26-42 78-42 104 0 34-24 58-22 88 14 22-16 52-8 58 18H20v-16z"/><path d="M40 262h320" stroke="currentColor" stroke-width="2" fill="none"/><path d="M120 262V180h40v82zM240 262V170h34v92z"/>',
            'ornament_left' => '<svg width="70" height="120" viewBox="0 0 70 120" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M6 24c14-12 34-12 46 0M4 46c16-12 38-12 52 0M10 68c12-10 28-10 38 0"/><path d="M34 0v16"/><circle cx="34" cy="20" r="3" fill="currentColor"/><path d="M34 80v26" stroke-dasharray="3 5"/></svg>',
            'ornament_right' => '<svg width="70" height="120" viewBox="0 0 70 120" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M64 24c-14-12-34-12-46 0M66 46c-16-12-38-12-52 0M60 68c-12-10-28-10-38 0"/><path d="M36 0v16"/><circle cx="36" cy="20" r="3" fill="currentColor"/><path d="M36 80v26" stroke-dasharray="3 5"/></svg>',
        ],

        /* 3. Adat Minang — Rumah Gadang, suntiang, belah ketupat */
        'minang' => [
            'label' => 'Bagonjong & Suntiang',
            'particle' => 'diamond',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M16 4l4 7 8 1-6 6 2 8-8-4-8 4 2-8-6-6 8-1 4-7Z"/><circle cx="16" cy="16" r="2.4" fill="currentColor"/></svg>',
            'silhouette' => '<path d="M20 200c22-52 40-52 62 0 22-52 40-52 62 0 22-52 40-52 62 0 22-52 40-52 62 0"/><path d="M40 262V200h300v62z" opacity=".55"/><path d="M120 262v-40h36v40zM240 262v-40h36v40z" fill="#000" opacity=".35"/>',
            'ornament_left' => '<svg width="60" height="130" viewBox="0 0 60 130" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M30 0v22"/><path d="M14 22h32l-6 26H20z"/><path d="M20 48l10 16 10-16"/><path d="M30 64v28" stroke-dasharray="3 4"/><path d="M18 100l12 12 12-12"/></svg>',
            'ornament_right' => '<svg width="60" height="130" viewBox="0 0 60 130" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M30 0v22"/><path d="M14 22h32l-6 26H20z"/><path d="M20 48l10 16 10-16"/><path d="M30 64v28" stroke-dasharray="3 4"/><path d="M18 100l12 12 12-12"/></svg>',
        ],

        /* 4. Nusantara lainnya — Candi Bentar, phinisi, kamboja */
        'nusantara' => [
            'label' => 'Candi Bentar & Phinisi',
            'particle' => 'frangipani',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M16 4l11 6v8l-11 8-11-8v-8l11-6Z"/><path d="M16 10v14M10 12l12 10M22 12L10 22" opacity=".6"/><path d="M5 27h22"/></svg>',
            'silhouette' => '<path d="M30 262V150h26v112zM60 262V120h30v142zM104 262V150h24v112zM272 262V150h24v112zM316 262V120h30v142zM362 262V150h26v112z"/><path d="M170 262c0-30 20-52 48-52s48 22 48 52" fill="none" stroke="currentColor" stroke-width="3"/><path d="M196 210l22-60 22 60z" fill="none" stroke="currentColor" stroke-width="3"/>',
            'ornament_left' => '<svg width="66" height="128" viewBox="0 0 66 128" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M33 0v18"/><path d="M8 34c12-16 38-16 50 0"/><path d="M4 50c14-18 44-18 58 0"/><path d="M10 66c10-14 36-14 46 0"/><path d="M33 66v30" stroke-dasharray="3 5"/><path d="M22 96c6 10 16 10 22 0"/></svg>',
            'ornament_right' => '<svg width="66" height="128" viewBox="0 0 66 128" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M33 0v18"/><path d="M8 34c12-16 38-16 50 0"/><path d="M4 50c14-18 44-18 58 0"/><path d="M10 66c10-14 36-14 46 0"/><path d="M33 66v30" stroke-dasharray="3 5"/><path d="M22 96c6 10 16 10 22 0"/></svg>',
        ],

        /* 5. Minimalis modern — lengkung asimetris, bokeh naik */
        'minimalis' => [
            'label' => 'Architecture Minimalis',
            'particle' => 'bokeh',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><circle cx="16" cy="16" r="11"/><path d="M16 5v22" opacity=".45"/><text x="16" y="20" text-anchor="middle" font-family="Georgia,serif" font-size="9" fill="currentColor" stroke="none">A&amp;B</text></svg>',
            'silhouette' => '<circle cx="120" cy="120" r="76" fill="none" stroke="currentColor" stroke-width="3"/><circle cx="290" cy="180" r="52" fill="none" stroke="currentColor" stroke-width="3"/><path d="M180 262V150a70 70 0 0 1 140 0v112" fill="none" stroke="currentColor" stroke-width="3"/><path d="M20 262h360" stroke="currentColor" stroke-width="2"/>',
            'ornament_left' => '<svg width="60" height="90" viewBox="0 0 60 90" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M4 10h40M4 26h52M4 42h34M4 58h46M4 74h28" opacity=".5"/><circle cx="46" cy="46" r="12" opacity=".5"/></svg>',
            'ornament_right' => '<svg width="60" height="90" viewBox="0 0 60 90" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M16 10h40M4 26h52M22 42h34M10 58h46M28 74h28" opacity=".5"/><circle cx="14" cy="46" r="12" opacity=".5"/></svg>',
        ],

        /* 6. Elegan & floral — conservatory, mawar, kelopak */
        'floral' => [
            'label' => 'Conservatory & Rose',
            'particle' => 'petal',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><circle cx="16" cy="16" r="5"/><path d="M16 11c-3-5 3-8 5-4s-2 6-5 4Zm5 5c5-3 8 3 4 5s-6-2-4-5Zm-5 5c3 5-3 8-5 4s2-6 5-4Zm-5-5c-5 3-8-3-4-5s6 2 4 5Z"/><path d="M16 4v3M16 25v3M4 16h3M25 16h3" opacity=".6"/></svg>',
            'silhouette' => '<path d="M200 30c60 0 110 50 110 110v122H90V140C90 80 140 30 200 30Z" fill="none" stroke="currentColor" stroke-width="3"/><path d="M200 30v232M120 120c30-20 130-20 160 0M110 170c34-22 146-22 180 0" fill="none" stroke="currentColor" stroke-width="2" opacity=".7"/><circle cx="200" cy="96" r="26" fill="none" stroke="currentColor" stroke-width="2"/>',
            'ornament_left' => '<svg width="70" height="150" viewBox="0 0 70 150" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M18 0c0 24 12 34 12 54s-14 26-14 46 10 24 10 40"/><circle cx="26" cy="40" r="9"/><circle cx="16" cy="70" r="7"/><circle cx="30" cy="96" r="8"/><path d="M40 20c8 10 8 24 0 34" opacity=".6"/></svg>',
            'ornament_right' => '<svg width="70" height="150" viewBox="0 0 70 150" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M52 0c0 24-12 34-12 54s14 26 14 46-10 24-10 40"/><circle cx="44" cy="40" r="9"/><circle cx="54" cy="70" r="7"/><circle cx="40" cy="96" r="8"/><path d="M30 20c-8 10-8 24 0 34" opacity=".6"/></svg>',
        ],

        /* 7. Islami — mihrab, mashrabiya, bintang naik */
        'islami' => [
            'label' => 'Mihrab & Mashrabiya',
            'particle' => 'star',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M16 3l3.6 7.4 8.4 1.2-6 5.9 1.4 8.3L16 22l-7.4 3.8 1.4-8.3-6-5.9 8.4-1.2L16 3Z"/><path d="M16 26v3" opacity=".7"/></svg>',
            'silhouette' => '<path d="M200 24c40 0 70 30 70 70v168H130V94c0-40 30-70 70-70Z" fill="none" stroke="currentColor" stroke-width="3"/><path d="M200 70l14 30 32 4-23 22 5 32-28-15-28 15 5-32-23-22 32-4 14-30Z" fill="none" stroke="currentColor" stroke-width="2" opacity=".8"/><path d="M40 262V150a60 60 0 0 1 60-60M360 262V150a60 60 0 0 0-60-60" fill="none" stroke="currentColor" stroke-width="2"/>',
            'ornament_left' => '<svg width="56" height="140" viewBox="0 0 56 140" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M28 0v20"/><path d="M14 26h28l-4 30H18z"/><path d="M18 56h20l-3 12H21z"/><path d="M28 68v18" stroke-dasharray="3 4"/><circle cx="28" cy="98" r="8"/><path d="M20 98a8 8 0 0 1 16 0" fill="currentColor" opacity=".3"/></svg>',
            'ornament_right' => '<svg width="56" height="140" viewBox="0 0 56 140" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M28 0v20"/><path d="M14 26h28l-4 30H18z"/><path d="M18 56h20l-3 12H21z"/><path d="M28 68v18" stroke-dasharray="3 4"/><circle cx="28" cy="98" r="8"/><path d="M20 98a8 8 0 0 1 16 0" fill="currentColor" opacity=".3"/></svg>',
        ],

        /* 8. Akad & Resepsi — dual ceremony, cincin, gelembung */
        'akad' => [
            'label' => 'Akad Pagi & Resepsi Malam',
            'particle' => 'bubble',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><circle cx="12" cy="14" r="6"/><circle cx="20" cy="14" r="6"/><path d="M12 20l4 6 4-6"/><path d="M16 6v2" opacity=".7"/></svg>',
            'silhouette' => '<path d="M60 262V120a60 60 0 0 1 120 0v142" fill="none" stroke="currentColor" stroke-width="3"/><path d="M220 262V120a60 60 0 0 1 120 0v142" fill="none" stroke="currentColor" stroke-width="3"/><circle cx="200" cy="80" r="30" fill="none" stroke="currentColor" stroke-width="2"/><path d="M200 58v44M178 80h44" stroke="currentColor" stroke-width="2" opacity=".6"/>',
            'ornament_left' => '<svg width="60" height="130" viewBox="0 0 60 130" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M30 0v18"/><path d="M10 26c10-10 30-10 40 0"/><path d="M30 26v20"/><path d="M14 56h32M18 68h24M22 80h16"/><circle cx="30" cy="100" r="10"/></svg>',
            'ornament_right' => '<svg width="60" height="130" viewBox="0 0 60 130" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M30 0v18"/><path d="M8 30l8 8 8-8 8 8 8-8 8 8" opacity=".8"/><path d="M30 38v26"/><path d="M18 76l6 12 6-12 6 12 6-12"/><circle cx="30" cy="104" r="8"/></svg>',
        ],

        /* 9. Internasional — boiserie, mahkota, sakura */
        'internasional' => [
            'label' => 'Palace Boiserie & Crown',
            'particle' => 'sakura',
            'seal' => '<svg width="26" height="26" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M6 14l4-6 6 3 6-3 4 6-2 10H8L6 14Z"/><path d="M8 24h16l-2 5H10l-2-5Z"/><circle cx="16" cy="13" r="2" fill="currentColor"/><path d="M16 6V3"/></svg>',
            'silhouette' => '<path d="M40 262V120h36v142zM96 262V96h36v166zM152 262V120h36v142zM212 262V120h36v142zM268 262V96h36v166zM324 262V120h36v142z"/><path d="M30 96h340" stroke="currentColor" stroke-width="4"/><path d="M120 96l40-46 40 46 40-46 40 46" fill="none" stroke="currentColor" stroke-width="3"/>',
            'ornament_left' => '<svg width="66" height="140" viewBox="0 0 66 140" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M6 8c18 6 26 22 22 40-4 18 4 32 18 40"/><path d="M10 30c12-2 20 6 20 18" opacity=".6"/><circle cx="22" cy="26" r="5"/><circle cx="36" cy="46" r="4"/><path d="M44 70v30" stroke-dasharray="3 5"/><path d="M36 108l8 10 8-10"/></svg>',
            'ornament_right' => '<svg width="66" height="140" viewBox="0 0 66 140" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M60 8c-18 6-26 22-22 40 4 18-4 32-18 40"/><path d="M56 30c-12-2-20 6-20 18" opacity=".6"/><circle cx="44" cy="26" r="5"/><circle cx="30" cy="46" r="4"/><path d="M22 70v30" stroke-dasharray="3 5"/><path d="M30 108l-8 10-8-10"/></svg>',
        ],
    ];
}
