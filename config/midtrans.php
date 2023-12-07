<?php
return [
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3ds' => env('MIDTRANS_IS_3DS', true),
    // 'appendNotifUrl' => env('MIDTRANS_APPEND_NOTIF_URL', ''),
    // 'overrideNotifUrl' => env('MIDTRANS_OVERRIDE_NOTIF_URL', ''),
    // 'paymentIdempotencyKey' => env('MIDTRANS_PAYMENT_IDEMPOTENCY_KEY', 'Unique-ID'),
];
