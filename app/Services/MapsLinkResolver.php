<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * Merapikan tautan Google Maps yang diketik pemesan.
 *
 * Tautan bagikan pendek ("maps.app.goo.gl/…") tidak memuat koordinat, jadi peta embed tidak bisa
 * mengikutinya. Tautan seperti itu diikuti dulu (sekali, lalu di-cache 30 hari) supaya tersimpan
 * sebagai tautan penuh berisi koordinat/nama tempat.
 */
class MapsLinkResolver
{
    private const SHORT_HOSTS = ['maps.app.goo.gl', 'goo.gl', 'g.co', 'maps.google.com', 'google.com'];

    /**
     * Kembalikan tautan absolut; tautan pendek diikuti sampai dapat tautan penuh.
     */
    public static function expand(?string $url): string
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '';
        }

        $absolute = self::absolute($url);
        if ($absolute === '') {
            return $url; // berupa alamat teks, bukan tautan
        }

        if (! self::isShortLink($absolute) || self::hasLocation($absolute)) {
            return $absolute;
        }

        return Cache::remember('maps:expand:'.md5($absolute), now()->addDays(30), function () use ($absolute) {
            return self::follow($absolute);
        });
    }

    /**
     * Jadikan tautan absolut: "maps.app.goo.gl/x" → "https://maps.app.goo.gl/x".
     */
    public static function absolute(string $url): string
    {
        $url = trim($url);
        if ($url === '') {
            return '';
        }
        if (str_starts_with($url, '//')) {
            return 'https:'.$url;
        }
        if (preg_match('~^https?://~i', $url)) {
            return $url;
        }

        return preg_match('~^[\w.-]+\.[a-z]{2,}([/?#]\S*)?$~i', $url) ? 'https://'.$url : '';
    }

    private static function isShortLink(string $url): bool
    {
        $host = strtolower((string) parse_url($url, PHP_URL_HOST));

        return in_array($host, self::SHORT_HOSTS, true);
    }

    /**
     * Sudah memuat titik lokasi? (koordinat atau nama tempat di path)
     */
    private static function hasLocation(string $url): bool
    {
        return (bool) preg_match('~@-?\d+\.\d+,-?\d+\.\d+~', $url)
            || (bool) preg_match('~!3d-?\d+\.\d+!4d-?\d+\.\d+~', $url)
            || str_contains($url, '/maps/place/');
    }

    /**
     * Ikuti rantai redirect Google (maksimal 4 lompatan).
     */
    private static function follow(string $url): string
    {
        if (app()->runningUnitTests()) {
            return $url;
        }

        $current = $url;

        for ($hop = 0; $hop < 4; $hop++) {
            try {
                $response = Http::withOptions(['allow_redirects' => false])
                    ->timeout(4)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; DKarsaBot/1.0)'])
                    ->get($current);
            } catch (Throwable $e) {
                return $url;
            }

            $location = $response->header('Location');
            if (! is_string($location) || $location === '') {
                return $current;
            }

            $current = self::absolute($location) ?: $url;
            if (self::hasLocation($current)) {
                return $current;
            }
        }

        return $current;
    }
}
