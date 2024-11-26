<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '1097022782456-g7ou22d9gns9b9nb8jhc7hsb95uipl1h.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback'
    ],
    'facebook' => [
        'client_id' => '2121869558250715',
        'client_secret' =>  '9525a4e875fc464c9824bb7cf4ac7a28',
        'redirect' => 'http://localhost:8000/auth/facebook/callback'
    ],
];
