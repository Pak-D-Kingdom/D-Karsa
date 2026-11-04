<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    | WhatsApp Cloud API (Meta) — dipakai untuk kirim undangan massal sekali klik.
    | Tanpa token & phone id, pengiriman berjalan dalam mode simulasi (dicatat, tidak dikirim).
    */
    'whatsapp' => [
        // cloud = WhatsApp Cloud API (Meta) · fonnte / wablas = gateway lokal · kosong = simulasi
        'provider' => env('WHATSAPP_PROVIDER', ''),
        'token' => env('WHATSAPP_TOKEN', ''),
        'phone_id' => env('WHATSAPP_PHONE_ID', ''),
        'template' => env('WHATSAPP_TEMPLATE', ''),
        'template_lang' => env('WHATSAPP_TEMPLATE_LANG', 'id'),
        'version' => env('WHATSAPP_API_VERSION', 'v21.0'),
        'fonnte_token' => env('FONNTE_TOKEN', ''),
        'wablas_token' => env('WABLAS_TOKEN', ''),
        'wablas_domain' => env('WABLAS_DOMAIN', ''),
    ],

    'midtrans' => [
        'server_key' => env('MIDTRANS_SERVER_KEY', ''),
        'client_key' => env('MIDTRANS_CLIENT_KEY', ''),
        'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    ],

];
