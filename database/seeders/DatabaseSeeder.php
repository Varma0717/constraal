<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            AdminRoleSeeder::class,
            AdminUserSeeder::class,
            HomepageSectionSeeder::class,
        ]);
    }
}
