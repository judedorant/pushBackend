<?php

return [

    // 'paths' => ['api/*', 'sanctum/csrf-cookie'],
    // // 'paths' => ['*'],

    // 'allowed_methods' => ['*'],
    // 'allowed_origins' => [env('FRONTEND_URL', 'http://bac-dev08:8081')],
    

    // 'allowed_origins_patterns' => [],

    // 'allowed_headers' => ['*'],

    // 'exposed_headers' => [],

    // 'max_age' => 0,

    // 'supports_credentials' => true,


    // ===================================

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Adjust paths as needed

    'allowed_methods' => ['*'], // Allow all HTTP methods

    // 'allowed_origins' => [env('FRONTEND_URL', 'http://bac-dev08:8081')],
    // 'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],
    // 'allowed_origins' => [env('FRONTEND_URL', 'http://bac-dev08:80')],
    'allowed_origins' => ['*'],

    
    // 'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3001')],

    // 'allowed_origins_patterns' => ["*bac-dev08*"],

    'allowed_headers' => ['*'], // Customize allowed headers

    // 'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization'], // Customize allowed headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Allow credentials (cookies, authorization headers, etc.)
];
