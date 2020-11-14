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
        'client_id' => '908993880949-t32gnlr7acs0s2h7i2h45o8ubfe58oh5.apps.googleusercontent.com',
        'client_secret' => '4N4poy_U-JiDRENiIld7rYVi',
        'redirect' => env('GOOGLE_REDIRECT_URL', 'http://localhost:8000/oauth/google/callback'),
    ],
    'github' => [
        'client_id' => '49571ebb2a2dcab1f641',
        'client_secret' => '653a0c021d1af60ce058c38b06b30578b72745bd',
        'redirect' => env('http://localhost:8000/oauth/github/callback'),
    ],
    'facebook' => [
        'client_id'     => '801830443710715',
        'client_secret' => '566dfd820b3edefd5cc4df0d151284b0',
        'redirect'      => env('FACEBOOK_REDIRECT_URI', 'http://localhost:8000/oauth/facebook/callback'),
    ]
];
