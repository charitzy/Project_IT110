<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*', 'http://localhost:3000', 'https://c0c7-216-247-59-113.ngrok-free.app/it110/public/api',],

    'allowed_origins_patterns' => [],

    // 'allowed_headers' => ['*'],
    // 'exposed_headers' => [],

    'allowed_headers' => ['*', 'Content-Type', 'Authorization', 'ngrok-skip-browser-warning'],

    'exposed_headers' => ['ngrok-skip-browser-warning'],


    'max_age' => 0,

    'supports_credentials' => false,

];
