<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'penggunas',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'penggunas',
        ],
    ],

    'providers' => [
        'penggunas' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Pengguna::class
        ]
    ]
];


