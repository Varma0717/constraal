<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin user
        $superAdmin = Admin::updateOrCreate(
            ['email' => 'super@admin.constraal.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('SuperAdmin@123'), // Change this in production!
                'is_active' => true,
            ]
        );

        // Attach Super Admin role
        $superAdminRole = \App\Models\AdminRole::where('name', 'Super Admin')->first();
        if ($superAdminRole) {
            $superAdmin->roles()->syncWithoutDetaching([$superAdminRole->id]);
        }

        // Create main admin user
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@constraal.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin@123'),
                'is_active' => true,
            ]
        );

        // Attach Admin role
        $adminRole = \App\Models\AdminRole::where('name', 'Admin')->first();
        if ($adminRole) {
            $admin->roles()->syncWithoutDetaching([$adminRole->id]);
        }

        echo "Admin users created successfully!\n";
        echo "Super Admin Email: super@admin.constraal.com (Password: SuperAdmin@123)\n";
        echo "Admin Email: admin@constraal.com (Password: Admin@123)\n";
    }
}
