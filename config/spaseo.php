<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the cache
    | to be allowed to remain idle before it expires.
    |
    */

    'cache_lifetime' => env('SPA_CACHE_LIFETIME', 60),

    /*
    |--------------------------------------------------------------------------
    | Route Lifetime
    |--------------------------------------------------------------------------
    |
    | This array of routes will allow you to specify the cache lifetime
    | of specific routes. By default each route will use the 'cache_lifetime'
    | as the amount of minutes that vue will be cached.
    |
    */

    'routes' => [

//        '/' => 60, (1 hour)
//        '/about' => 1440, (1 day)
//        '/contact' => 43200, (30 days)

    ],

];
