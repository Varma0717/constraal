<?php

/**
 * Cache clearing script for Azure (when SSH is not available).
 * Access via: https://staging.constraal.com/clear-cache.php
 * DELETE THIS FILE after use for security.
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<pre>\n";
echo "=== Constraal Cache Clear ===\n\n";

// Clear application cache
Illuminate\Support\Facades\Artisan::call('cache:clear');
echo "✓ Application cache cleared\n";

// Clear route cache
Illuminate\Support\Facades\Artisan::call('route:clear');
echo "✓ Route cache cleared\n";

// Clear view cache
Illuminate\Support\Facades\Artisan::call('view:clear');
echo "✓ View cache cleared\n";

// Clear config cache
Illuminate\Support\Facades\Artisan::call('config:clear');
echo "✓ Config cache cleared\n";

echo "\n=== All caches cleared successfully ===\n";
echo "\n⚠ DELETE this file (clear-cache.php) after use!\n";
echo "</pre>";
