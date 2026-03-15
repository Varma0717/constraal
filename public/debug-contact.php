<?php

/**
 * Temporary diagnostic script — DELETE after debugging
 * Access via: https://your-domain.com/debug-contact.php
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "<h2>Contact Form Diagnostics</h2><pre>";

// 1. Check Inquiry model cast
echo "1. Inquiry model metadata cast:\n";
$inquiry = new \App\Models\Inquiry();
$casts = $inquiry->getCasts();
echo "   metadata cast = " . ($casts['metadata'] ?? 'NOT SET') . "\n\n";

// 2. Check inquiries table columns
echo "2. Inquiries table columns:\n";
try {
    $columns = \Illuminate\Support\Facades\Schema::getColumnListing('inquiries');
    echo "   " . implode(', ', $columns) . "\n\n";
} catch (\Exception $e) {
    echo "   ERROR: " . $e->getMessage() . "\n\n";
}

// 3. Check subscribers table columns
echo "3. Subscribers table columns:\n";
try {
    $columns = \Illuminate\Support\Facades\Schema::getColumnListing('subscribers');
    echo "   " . implode(', ', $columns) . "\n\n";
} catch (\Exception $e) {
    echo "   ERROR: " . $e->getMessage() . "\n\n";
}

// 4. Try creating a test inquiry with metadata
echo "4. Test Inquiry::create with metadata:\n";
try {
    $test = \App\Models\Inquiry::create([
        'name' => 'TEST_DIAGNOSTIC',
        'email' => 'test@test.com',
        'type' => 'General',
        'message' => 'Diagnostic test',
        'status' => 'New',
        'metadata' => json_encode(['test' => true]),
    ]);
    echo "   SUCCESS — ID: " . $test->id . "\n";
    // Clean up
    $test->delete();
    echo "   (cleaned up)\n\n";
} catch (\Exception $e) {
    echo "   FAILED: " . $e->getMessage() . "\n\n";
}

// 5. Try with array metadata (the real use case)
echo "5. Test Inquiry::create with array metadata:\n";
try {
    $test = \App\Models\Inquiry::create([
        'name' => 'TEST_DIAGNOSTIC_2',
        'email' => 'test@test.com',
        'type' => 'Partnership',
        'message' => 'Diagnostic test',
        'status' => 'New',
        'metadata' => ['company' => 'Test Co'],
    ]);
    echo "   SUCCESS — ID: " . $test->id . "\n";
    $test->delete();
    echo "   (cleaned up)\n\n";
} catch (\Exception $e) {
    echo "   FAILED: " . $e->getMessage() . "\n\n";
}

// 6. Check mail config
echo "6. Mail config:\n";
echo "   Driver: " . config('mail.default') . "\n";
echo "   From: " . config('mail.from.address') . "\n\n";

// 7. Check latest log errors
echo "7. Latest log errors:\n";
$logFile = storage_path('logs/laravel.log');
if (file_exists($logFile)) {
    $lines = file($logFile);
    $errorLines = [];
    foreach (array_slice($lines, -100) as $line) {
        if (stripos($line, 'ERROR') !== false) {
            $errorLines[] = trim(substr($line, 0, 200));
        }
    }
    if ($errorLines) {
        foreach (array_slice($errorLines, -5) as $e) {
            echo "   " . $e . "\n";
        }
    } else {
        echo "   No recent errors\n";
    }
} else {
    echo "   Log file not found\n";
}

echo "</pre>";
echo "<p><strong>DELETE this file after debugging!</strong></p>";
