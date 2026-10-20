<?php

namespace App\Services;

use App\Models\Couple;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MidtransService
{
    /**
     * Get package price in IDR integer
     */
    public static function getPackagePrice(?string $packageName): int
    {
        if (empty($packageName)) {
            return 50000;
        }

        $lower = strtolower($packageName);

        if (str_contains($lower, 'kustom') || str_contains($lower, 'luxury')) {
            return 280000;
        }
        if (str_contains($lower, 'eksklusif')) {
            return 180000;
        }
        if (str_contains($lower, 'premium') || str_contains($lower, 'gold')) {
            return 110000;
        }
        if (str_contains($lower, 'basic') || str_contains($lower, 'silver') || str_contains($lower, 'hemat')) {
            return 50000;
        }

        // Try extracting numeric digits
        if (preg_match('/(\d+)[.,]?(\d{3})/', $packageName, $matches)) {
            return (int)($matches[1] . $matches[2]);
        }

        return 50000;
    }

    /**
     * Generate unique D'Karsa invoice number (Midtrans Order ID)
     */
    public static function generateInvoiceNumber(): string
    {
        return 'INV-DK-' . date('Ymd') . '-' . strtoupper(Str::random(5));
    }

    public static function getServerKey(): string
    {
        return (string) config('services.midtrans.server_key', env('MIDTRANS_SERVER_KEY', ''));
    }

    public static function getClientKey(): string
    {
        return (string) config('services.midtrans.client_key', env('MIDTRANS_CLIENT_KEY', ''));
    }

    public static function isProduction(): bool
    {
        return (bool) config('services.midtrans.is_production', env('MIDTRANS_IS_PRODUCTION', false));
    }

    public static function getSnapUrl(): string
    {
        return static::isProduction()
            ? 'https://app.midtrans.com/snap/v1/transactions'
            : 'https://app.sandbox.midtrans.com/snap/v1/transactions';
    }

    public static function getSnapJsUrl(): string
    {
        return static::isProduction()
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    }

    /**
     * Check if Midtrans API Server Key is provided
     */
    public static function hasApiCredentials(): bool
    {
        return !empty(static::getServerKey());
    }

    /**
     * Verify Midtrans notification signature key (SHA512)
     */
    public static function verifySignature(string $orderId, string $statusCode, string $grossAmount, string $signatureKey): bool
    {
        $serverKey = static::getServerKey();
        if (empty($serverKey)) {
            return true;
        }

        $expected = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);
        return hash_equals($expected, $signatureKey);
    }

    /**
     * Create Snap Token from Midtrans API
     */
    public function createSnapToken(Couple $couple): ?string
    {
        if (!static::hasApiCredentials()) {
            return null;
        }

        try {
            $serverKey = static::getServerKey();
            $authHeader = 'Basic ' . base64_encode($serverKey . ':');

            $payload = [
                'transaction_details' => [
                    'order_id' => $couple->invoice_number,
                    'gross_amount' => (int) $couple->amount,
                ],
                'item_details' => [
                    [
                        'id' => $couple->invoice_number,
                        'price' => (int) $couple->amount,
                        'quantity' => 1,
                        'name' => "Undangan D'Karsa - " . ($couple->package_name ?: 'Paket Undangan'),
                    ]
                ],
                'customer_details' => [
                    'first_name' => $couple->customer_name ?: ($couple->groom_name ?: 'Pelanggan D\'Karsa'),
                    'phone' => $couple->customer_phone ?: '081234567890',
                ],
                'callbacks' => [
                    'finish' => route('invitation.success', $couple->slug),
                ],
            ];

            $response = Http::withHeaders([
                'Authorization' => $authHeader,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post(static::getSnapUrl(), $payload);

            if ($response->successful()) {
                $resData = $response->json();
                $token = $resData['token'] ?? null;
                if ($token) {
                    $couple->update(['payment_token' => $token]);
                    return $token;
                }
            }

            Log::warning("Midtrans Snap API Error: " . $response->body());
        } catch (\Throwable $e) {
            Log::error("Midtrans Snap API Exception: " . $e->getMessage());
        }

        return null;
    }

    /**
     * Mark couple as paid and immediately publish invitation
     */
    public function markAsPaid(Couple $couple, string $method = 'QRIS (Midtrans)', ?string $reference = null): void
    {
        $couple->update([
            'payment_status' => 'paid',
            'payment_method' => $method,
            'payment_token' => $reference ?: ($couple->payment_token ?: 'MIDTRANS-' . date('YmdHis')),
            'paid_at' => now(),
            'status' => 'published', // Instantly active!
        ]);
    }
}
