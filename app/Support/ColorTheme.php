<?php

namespace App\Support;

/**
 * Palet warna undangan: aturan "light-first" untuk semua tema siang/pastel.
 *
 * Hanya tiga palet malam (Midnight Navy, Cyber Neon, Dark Mode) yang boleh memakai latar gelap.
 * Tema jewel (Burgundy, Ruby, Plum, Chocolate, Bold Red) memakai halaman ivory + gerbang berwarna kaya.
 * Semua palet siang/pastel memakai halaman terang dengan kartu putih dan teks gelap.
 */
class ColorTheme
{
    /**
     * Registri palet sesuai aturan warna D'Karsa.
     *
     * @var array<string, array{mode: string, page: string, card: string, gate: string, text: string, accent: string}>
     */
    private const PALETTES = [
        // ---------- palet siang / pastel ----------
        'clean white' => ['mode' => 'light', 'page' => '#FFFFFF', 'card' => '#FAF8F5', 'gate' => '#F8F5F0', 'text' => '#1E293B', 'accent' => '#C5A059'],
        'soft pink' => ['mode' => 'light', 'page' => '#FFF5F7', 'card' => '#FFFFFF', 'gate' => '#FCE7EC', 'text' => '#4A2531', 'accent' => '#D47A92'],
        'dusty rose' => ['mode' => 'light', 'page' => '#FDF6F6', 'card' => '#FFFFFF', 'gate' => '#F5E1E4', 'text' => '#3D2328', 'accent' => '#B56576'],
        'sage green' => ['mode' => 'light', 'page' => '#F4F8F4', 'card' => '#FFFFFF', 'gate' => '#E3EDE4', 'text' => '#1E3323', 'accent' => '#5C8063'],
        'rose gold' => ['mode' => 'light', 'page' => '#FFF8F5', 'card' => '#FFFFFF', 'gate' => '#FBE9E2', 'text' => '#3D2622', 'accent' => '#C88270'],
        'blueberry milk' => ['mode' => 'light', 'page' => '#F4F7FC', 'card' => '#FFFFFF', 'gate' => '#E4ECF9', 'text' => '#1E2B42', 'accent' => '#6384B8'],
        'yellow sunshine' => ['mode' => 'light', 'page' => '#FFFDF2', 'card' => '#FFFFFF', 'gate' => '#FDF5C9', 'text' => '#3D2E10', 'accent' => '#D99B26'],
        'coral and peach' => ['mode' => 'light', 'page' => '#FFF7F4', 'card' => '#FFFFFF', 'gate' => '#FDE8E0', 'text' => '#3E241C', 'accent' => '#E07A5F'],
        'arctic frost' => ['mode' => 'light', 'page' => '#F5FAFD', 'card' => '#FFFFFF', 'gate' => '#E3F1FA', 'text' => '#182C3D', 'accent' => '#4889B5'],
        'pastel mix' => ['mode' => 'light', 'page' => '#FDF9FC', 'card' => '#FFFFFF', 'gate' => '#F5EBF7', 'text' => '#33223A', 'accent' => '#A374B5'],
        'citrus pop' => ['mode' => 'light', 'page' => '#FFFCF2', 'card' => '#FFFFFF', 'gate' => '#FFF1CC', 'text' => '#2D3319', 'accent' => '#E67E22'],
        'mint fresh' => ['mode' => 'light', 'page' => '#F2FBF8', 'card' => '#FFFFFF', 'gate' => '#DEF5EE', 'text' => '#14362F', 'accent' => '#2A9D8F'],
        'ocean blue' => ['mode' => 'light', 'page' => '#F3F8FC', 'card' => '#FFFFFF', 'gate' => '#E0EEF9', 'text' => '#102A43', 'accent' => '#1D6FA5'],
        'purple dream' => ['mode' => 'light', 'page' => '#FAF7FF', 'card' => '#FFFFFF', 'gate' => '#EFE6FC', 'text' => '#2A1B42', 'accent' => '#7E57C2'],
        'monochrome' => ['mode' => 'light', 'page' => '#FFFFFF', 'card' => '#F8FAFC', 'gate' => '#F1F5F9', 'text' => '#0F172A', 'accent' => '#1E293B'],
        'earth tone' => ['mode' => 'light', 'page' => '#FAF6F0', 'card' => '#FFFFFF', 'gate' => '#EFE6D8', 'text' => '#36281E', 'accent' => '#A67B5B'],
        'lavender haze' => ['mode' => 'light', 'page' => '#FAF8FC', 'card' => '#FFFFFF', 'gate' => '#EFEAF7', 'text' => '#2E2333', 'accent' => '#8C6FA3'],
        'orange energy' => ['mode' => 'light', 'page' => '#FFF8F2', 'card' => '#FFFFFF', 'gate' => '#FDE9D8', 'text' => '#3B2212', 'accent' => '#E06D2B'],
        'cherry blossom' => ['mode' => 'light', 'page' => '#FFF6F8', 'card' => '#FFFFFF', 'gate' => '#FCE4EC', 'text' => '#3D1C26', 'accent' => '#D86482'],
        'baby blue' => ['mode' => 'light', 'page' => '#F4FAFF', 'card' => '#FFFFFF', 'gate' => '#E1F0FD', 'text' => '#183047', 'accent' => '#4E8EC4'],
        'terracotta' => ['mode' => 'light', 'page' => '#FBF6F3', 'card' => '#FFFFFF', 'gate' => '#F3E3DC', 'text' => '#382018', 'accent' => '#C06044'],
        'mocha cream' => ['mode' => 'light', 'page' => '#FAF6F2', 'card' => '#FFFFFF', 'gate' => '#EFE6DD', 'text' => '#33241D', 'accent' => '#8D6E63'],
        'forest moss' => ['mode' => 'light', 'page' => '#F6F8F4', 'card' => '#FFFFFF', 'gate' => '#E4ECE0', 'text' => '#1C2E1E', 'accent' => '#3A5A40'],
        'emerald green' => ['mode' => 'light', 'page' => '#F4FBF7', 'card' => '#FFFFFF', 'gate' => '#E0F2E9', 'text' => '#103325', 'accent' => '#167956'],
        'glacier blue' => ['mode' => 'light', 'page' => '#F4F9FC', 'card' => '#FFFFFF', 'gate' => '#E2EEF7', 'text' => '#162B3A', 'accent' => '#3B7EA1'],
        'denim blue' => ['mode' => 'light', 'page' => '#F6F8FB', 'card' => '#FFFFFF', 'gate' => '#E5ECF5', 'text' => '#19273A', 'accent' => '#3D5A80'],

        // ---------- palet jewel: halaman ivory, gerbang berwarna kaya ----------
        'burgundy wine' => ['mode' => 'jewel', 'page' => '#FDF9F7', 'card' => '#FFFFFF', 'gate' => '#5E1926', 'text' => '#3A151C', 'accent' => '#801B2D'],
        'ruby luxe' => ['mode' => 'jewel', 'page' => '#FFF9FA', 'card' => '#FFFFFF', 'gate' => '#7A1C2E', 'text' => '#3D141C', 'accent' => '#9B1B30'],
        'plum velvet' => ['mode' => 'jewel', 'page' => '#FBF8FC', 'card' => '#FFFFFF', 'gate' => '#4A2556', 'text' => '#2D1636', 'accent' => '#6A357A'],
        'chocolate luxe' => ['mode' => 'jewel', 'page' => '#FAF6F2', 'card' => '#FFFFFF', 'gate' => '#4A3022', 'text' => '#2E1D14', 'accent' => '#6E4732'],
        'bold red' => ['mode' => 'jewel', 'page' => '#FFF8F7', 'card' => '#FFFFFF', 'gate' => '#8C1D24', 'text' => '#3B1215', 'accent' => '#B8232C'],

        // ---------- satu-satunya palet malam ----------
        'midnight navy' => ['mode' => 'night', 'page' => '#0F1E36', 'card' => '#162947', 'gate' => '#0A1526', 'text' => '#F8FAFC', 'accent' => '#D4AF37'],
        'cyber neon' => ['mode' => 'night', 'page' => '#121024', 'card' => '#1C1936', 'gate' => '#0D0B1A', 'text' => '#F8FAFC', 'accent' => '#00F0FF'],
        'dark mode' => ['mode' => 'night', 'page' => '#141619', 'card' => '#1E2126', 'gate' => '#0E1012', 'text' => '#F8FAFC', 'accent' => '#D4AF37'],
    ];

    /**
     * Palet untuk nama tertentu; nama tak dikenal diturunkan dari warna tema ($c).
     *
     * @param  array<string, string>  $fallbackColors
     * @return array{mode: string, page: string, card: string, gate: string, text: string, accent: string}
     */
    public static function forPalette(?string $palette, array $fallbackColors = []): array
    {
        $key = self::normalize($palette);

        if ($key !== '' && isset(self::PALETTES[$key])) {
            return self::PALETTES[$key];
        }

        return self::derive($fallbackColors);
    }

    /**
     * Palet malam? Dipakai untuk memutuskan apakah latar gelap boleh dipakai.
     */
    public static function isNight(array $theme): bool
    {
        return ($theme['mode'] ?? 'light') === 'night';
    }

    /**
     * @return array{mode: string, page: string, card: string, gate: string, text: string, accent: string}
     */
    private static function derive(array $colors): array
    {
        $deep = $colors['deep'] ?? ($colors['ink'] ?? '#1E293B');
        $bg = $colors['bg'] ?? '#FAF8F5';
        $surface = $colors['surface'] ?? '#FFFFFF';
        $ink = $colors['ink'] ?? '#1E293B';
        $accent = $colors['accent'] ?? '#C5A059';

        // Warna dasar gelap → anggap jewel/night: halaman tetap terang kecuali sangat gelap.
        if (self::luminance($deep) < 0.18) {
            return ['mode' => 'night', 'page' => $deep, 'card' => self::mix($deep, '#FFFFFF', 0.12), 'gate' => self::mix($deep, '#000000', 0.3), 'text' => '#F8FAFC', 'accent' => $accent];
        }

        if (self::luminance($deep) < 0.45) {
            return ['mode' => 'jewel', 'page' => '#FFFDF9', 'card' => '#FFFFFF', 'gate' => $deep, 'text' => $ink, 'accent' => $accent];
        }

        return ['mode' => 'light', 'page' => $bg, 'card' => $surface, 'gate' => $deep, 'text' => $ink, 'accent' => $accent];
    }

    private static function normalize(?string $name): string
    {
        $name = strtolower(trim((string) $name));
        $name = str_replace(['&', '_', '-'], [' and ', ' ', ' '], $name);
        $name = preg_replace('/\s+/', ' ', $name) ?? '';

        return trim($name);
    }

    /**
     * Rasio kontras WCAG antara dua warna hex (#rrggbb).
     */
    public static function contrastRatio(string $a, string $b): float
    {
        $l1 = self::luminance($a);
        $l2 = self::luminance($b);
        $light = max($l1, $l2);
        $dark = min($l1, $l2);

        return ($light + 0.05) / ($dark + 0.05);
    }

    /**
     * Pastikan warna teks/aksen tetap terbaca di atas latar tertentu.
     * Bila kontras terlalu rendah ("warnanya nyatu"), warna digeser ke arah hitam/putih
     * sampai ambang terpenuhi — warna pilihan pemesan tetap jadi patokan.
     */
    public static function readable(string $hex, string $background, float $minRatio = 4.5): string
    {
        $hex = self::normalizeHex($hex);
        $background = self::normalizeHex($background);

        if ($hex === '' || self::contrastRatio($hex, $background) >= $minRatio) {
            return $hex !== '' ? $hex : $background;
        }

        // Latar terang → gelapkan teks; latar gelap → terangkan teks.
        $target = self::luminance($background) > 0.4 ? '#000000' : '#FFFFFF';

        for ($step = 1; $step <= 10; $step++) {
            $candidate = self::mix($hex, $target, $step / 10);
            if (self::contrastRatio($candidate, $background) >= $minRatio) {
                return $candidate;
            }
        }

        return $target;
    }

    /**
     * Warna sekunder (muted/silver) yang diturunkan dari teks + latar, tetap terbaca.
     */
    public static function secondary(string $text, string $background, float $ratio = 0.34): string
    {
        $text = self::normalizeHex($text);
        $background = self::normalizeHex($background);

        if ($text === '' || $background === '') {
            return $text;
        }

        return self::readable(self::mix($text, $background, $ratio), $background, 4.5);
    }

    /**
     * Warna sekunder yang aman di dua latar sekaligus (halaman & kartu).
     * Dipakai supaya teks redup tidak hilang saat kartu dan halaman berbeda terang.
     */
    public static function secondaryOn(string $text, string $background, string $card, float $ratio = 0.34): string
    {
        $text = self::normalizeHex($text);
        $background = self::normalizeHex($background);
        $card = self::normalizeHex($card);

        if ($text === '' || $background === '' || $card === '') {
            return $text;
        }

        $candidate = self::readable(self::mix($text, $background, $ratio), $background, 4.5);

        for ($step = 1; $step <= 10; $step++) {
            if (self::contrastRatio($candidate, $card) >= 3.5) {
                return $candidate;
            }
            $candidate = self::mix($candidate, $text, 0.12);
        }

        return $text;
    }

    /**
     * Campur dua warna (ratio 0..1 = porsi warna kedua).
     */
    public static function blend(string $from, string $to, float $ratio): string
    {
        $from = self::normalizeHex($from);
        $to = self::normalizeHex($to);

        if ($from === '' || $to === '') {
            return $from !== '' ? $from : $to;
        }

        return self::mix($from, $to, max(0.0, min(1.0, $ratio)));
    }

    /**
     * Warna "gerbang"/permukaan dalam: turunan dari latar halaman + kartu pemesan,
     * supaya pintu, bingkai, dan tombol tidak kembali ke palet bawaan.
     */
    public static function gateTone(string $page, string $card): string
    {
        $page = self::normalizeHex($page);
        $card = self::normalizeHex($card);

        if ($page === '' || $card === '') {
            return $page !== '' ? $page : $card;
        }

        // Sedikit lebih dalam dari kartu agar daun pintu tetap terbaca sebagai bidang terpisah.
        $deeper = self::luminance($page) > 0.4 ? '#000000' : '#FFFFFF';

        return self::mix(self::mix($card, $page, 0.35), $deeper, 0.06);
    }

    /**
     * Latar gelap? Dipakai untuk memutuskan mode halaman setelah warna kustom dipasang.
     */
    public static function isDark(string $hex): bool
    {
        $hex = self::normalizeHex($hex);

        return $hex !== '' && self::luminance($hex) < 0.2;
    }

    /**
     * Warna teks di atas blok berwarna (mis. tombol emas): hitam hangat atau putih,
     * dipilih yang kontrasnya paling tinggi. Mencegah teks gelap di atas aksen gelap.
     */
    public static function onColor(string $background, string $light = '#F8FAFC', string $dark = '#141311'): string
    {
        $background = self::normalizeHex($background);

        if ($background === '') {
            return $dark;
        }

        return self::contrastRatio($light, $background) >= self::contrastRatio($dark, $background) ? $light : $dark;
    }

    private static function normalizeHex(string $hex): string
    {
        $hex = ltrim(trim($hex), '#');

        if (preg_match('/^[0-9a-fA-F]{3}$/', $hex)) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        return preg_match('/^[0-9a-fA-F]{6}$/', $hex) ? '#'.strtoupper($hex) : '';
    }

    private static function luminance(string $hex): float
    {
        $hex = ltrim(trim($hex), '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        if (strlen($hex) < 6) {
            return 0.5;
        }

        $rgb = [];
        foreach ([0, 2, 4] as $offset) {
            $channel = hexdec(substr($hex, $offset, 2)) / 255;
            $rgb[] = $channel <= 0.03928 ? $channel / 12.92 : (($channel + 0.055) / 1.055) ** 2.4;
        }

        return 0.2126 * $rgb[0] + 0.7152 * $rgb[1] + 0.0722 * $rgb[2];
    }

    private static function mix(string $from, string $to, float $ratio): string
    {
        $a = self::rgb($from);
        $b = self::rgb($to);

        return sprintf('#%02X%02X%02X',
            (int) round($a[0] + ($b[0] - $a[0]) * $ratio),
            (int) round($a[1] + ($b[1] - $a[1]) * $ratio),
            (int) round($a[2] + ($b[2] - $a[2]) * $ratio),
        );
    }

    /**
     * @return array{int, int, int}
     */
    private static function rgb(string $hex): array
    {
        $hex = ltrim(trim($hex), '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        if (strlen($hex) < 6) {
            return [255, 255, 255];
        }

        return [(int) hexdec(substr($hex, 0, 2)), (int) hexdec(substr($hex, 2, 2)), (int) hexdec(substr($hex, 4, 2))];
    }
}
