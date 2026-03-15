<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the bcrypt algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the options that should be used when passwords
    | are hashed using the Bcrypt algorithm. An explanation of each value
    | has been included so make sure to read the documentation in full.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the options that should be used when passwords
    | are hashed using the Argon2 algorithm. An explanation of each value
    | has been included so make sure to read the documentation in full.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 2,
        'time' => 4,
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon2id Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the options that should be used when passwords
    | are hashed using the Argon2id algorithm. An explanation of each value
    | has been included so make sure to read the documentation in full.
    |
    */

    'argon2id' => [
        'memory' => 65536,
        'threads' => 2,
        'time' => 4,
        'verify' => true,
    ],

];
