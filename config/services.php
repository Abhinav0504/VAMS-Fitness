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


    'paytm-wallet' => [
        'env' => env('PAYTM_ENVIRONMENT'), // values : (local | production)
        'merchant_id' => env('PAYTM_MERCHANT_ID'),
        'merchant_key' => env('PAYTM_MERCHANT_KEY'),
        'merchant_website' => env('PAYTM_MERCHANT_WEBSITE'),
        'channel' => env('PAYTM_CHANNEL'),
        'industry_type' => env('PAYTM_INDUSTRY_TYPE'),
],

    'google' => [
        'client_id' => '275838996165-1i66enm9tqpm1a1dvgfoih7lgtoif2t1.apps.googleusercontent.com',
        'client_secret' => 'pz9N5t1-llE7VVlfcCNsj3WN',
        'redirect' => 'https://vams-fitness.herokuapp.com/googlestatus'],

        'twitter' => [
            'client_id' => '0pq50jEz4kARAadujyBiBqu4a',
            'client_secret' => 'RvQDLueK8TxuoEEXcM1vyX0g0dAUBdnLM9PpBJwtwQDv4Dbkwa',
            'redirect' => 'https://vams-fitness.herokuapp.com/twitterstatus',
        ],

        'github' => [
            'client_id' => env('GITHUB_ID'),
            'client_secret' => env('GITHUB_SECRET'),
            'redirect' => env('GITHUB_URL'),
        ],
        


];
