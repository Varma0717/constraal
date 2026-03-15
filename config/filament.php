<?php

return [
    'default_filesystem_disk' => env('FILESYSTEM_DISK', 'local'),
    'path' => env('FILAMENT_PATH', 'filament-admin'),
    'domain' => null,
    'auth' => [
        'guard' => 'web',
    ],
    'pages' => [
        'namespace' => 'App\\Filament\\Pages',
    ],
    'resources' => [
        'namespace' => 'App\\Filament\\Resources',
    ],
    'widgets' => [
        'namespace' => 'App\\Filament\\Widgets',
    ],
];
