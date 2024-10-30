<?php

return [
    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('b0049e26cf17b5f1690f'),
            'secret' => env('6d08f81d6626394b179a'),
            'app_id' => env('1862661'),
            'options' => [
                'cluster' => env('ap1'),
                'useTLS' => true,
            ],
        ],
    ]
    
];