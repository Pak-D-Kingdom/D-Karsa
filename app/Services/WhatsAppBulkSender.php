<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Pengirim undangan WhatsApp massal.
 *
 * Provider (env WHATSAPP_PROVIDER):
 *  - cloud  : WhatsApp Cloud API Meta (WHATSAPP_TOKEN + WHATSAPP_PHONE_ID, opsional template)
 *  - fonnte : gateway Fonnte (FONNTE_TOKEN)
 *  - wablas : gateway Wablas (WABLAS_TOKEN + WABLAS_DOMAIN)
 *  - kosong : mode simulasi — tidak ada request keluar, hanya dicatat di log
 */
class WhatsAppBulkSender
{
    public function provider(): string
    {
        $provider = strtolower(trim((string) config('services.whatsapp.provider', '')));

        return in_array($provider, ['cloud', 'fonnte', 'wablas'], true) ? $provider : 'simulasi';
    }

    public function isConfigured(): bool
    {
        return match ($this->provider()) {
            'cloud' => $this->token() !== '' && $this->phoneId() !== '',
            'fonnte' => trim((string) config('services.whatsapp.fonnte_token', '')) !== '',
            'wablas' => trim((string) config('services.whatsapp.wablas_token', '')) !== ''
                && trim((string) config('services.whatsapp.wablas_domain', '')) !== '',
            default => false,
        };
    }

    public function mode(): string
    {
        return $this->isConfigured() ? $this->provider() : 'simulasi';
    }

    /**
     * Kirim satu undangan.
     *
     * @return array{ok: bool, simulated: bool, error: ?string}
     */
    public function send(string $phone, string $name, string $link): array
    {
        $target = $this->normalizePhone($phone);

        if ($target === '') {
            return ['ok' => false, 'simulated' => false, 'error' => 'Nomor tidak valid'];
        }

        if (! $this->isConfigured()) {
            // Mode simulasi: tidak ada request keluar, hanya catat.
            Log::info('WA simulasi', ['to' => $target, 'name' => $name, 'link' => $link]);

            return ['ok' => true, 'simulated' => true, 'error' => null];
        }

        $message = $this->messageText($name, $link);

        try {
            $response = match ($this->provider()) {
                'cloud' => Http::withToken($this->token())->acceptJson()->timeout(20)
                    ->post($this->cloudEndpoint(), $this->cloudPayload($target, $name, $link)),
                'fonnte' => Http::withHeaders(['Authorization' => (string) config('services.whatsapp.fonnte_token')])
                    ->acceptJson()->timeout(20)
                    ->asForm()->post('https://api.fonnte.com/send', [
                        'target' => $target,
                        'message' => $message,
                        'countryCode' => '62',
                    ]),
                'wablas' => Http::withHeaders(['Authorization' => (string) config('services.whatsapp.wablas_token')])
                    ->acceptJson()->timeout(20)
                    ->post('https://'.trim((string) config('services.whatsapp.wablas_domain'), '/').'/api/v2/send-message', [
                        'phone' => $target,
                        'message' => $message,
                    ]),
                default => null,
            };
        } catch (\Throwable $e) {
            return ['ok' => false, 'simulated' => false, 'error' => $e->getMessage()];
        }

        if (! $response) {
            return ['ok' => false, 'simulated' => false, 'error' => 'Provider tidak dikenal'];
        }

        if ($response->successful()) {
            return ['ok' => true, 'simulated' => false, 'error' => null];
        }

        $error = data_get($response->json(), 'error.message')
            ?: data_get($response->json(), 'reason')
            ?: ('HTTP '.$response->status());

        return ['ok' => false, 'simulated' => false, 'error' => is_string($error) ? $error : json_encode($error)];
    }

    public function messageText(string $name, string $link): string
    {
        return 'Undangan untuk '.$name.': '.$link;
    }

    /**
     * @return array<string, mixed>
     */
    private function cloudPayload(string $to, string $name, string $link): array
    {
        $template = (string) config('services.whatsapp.template', '');

        if ($template !== '') {
            return [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => $template,
                    'language' => ['code' => (string) config('services.whatsapp.template_lang', 'id')],
                    'components' => [[
                        'type' => 'body',
                        'parameters' => [
                            ['type' => 'text', 'text' => $name],
                            ['type' => 'text', 'text' => $link],
                        ],
                    ]],
                ],
            ];
        }

        return [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => [
                'preview_url' => true,
                'body' => $this->messageText($name, $link),
            ],
        ];
    }

    private function cloudEndpoint(): string
    {
        return 'https://graph.facebook.com/'.config('services.whatsapp.version', 'v21.0')
            .'/'.$this->phoneId().'/messages';
    }

    private function token(): string
    {
        return trim((string) config('services.whatsapp.token', ''));
    }

    private function phoneId(): string
    {
        return trim((string) config('services.whatsapp.phone_id', ''));
    }

    public function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone) ?? '';

        if ($digits === '') {
            return '';
        }

        if (str_starts_with($digits, '0')) {
            $digits = '62'.substr($digits, 1);
        } elseif (str_starts_with($digits, '8')) {
            $digits = '62'.$digits;
        }

        return strlen($digits) >= 9 ? $digits : '';
    }
}
