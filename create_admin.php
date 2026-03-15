<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

// Hash the password using PHP's password_hash function
$hashedPassword = password_hash('ChangeMe123!', PASSWORD_BCRYPT);

// Insert or update admin user
DB::table('users')->updateOrInsert(
    ['email' => 'admin@constraal.example'],
    [
        'name' => 'Admin User',
        'email' => 'admin@constraal.example',
        'password' => $hashedPassword,
        'created_at' => now(),
        'updated_at' => now(),
    ]
);

echo "✓ Admin user created/updated successfully\n";
echo "Email: admin@constraal.example\n";
echo "Password: ChangeMe123!\n";
echo "\nLogin at: http://127.0.0.1:8000/login\n";
