<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Owner User',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Developer User',
            'email' => 'developer@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            RoleAndPermissionSeeder::class,
            SiteSettingsSeeder::class,
            CompanySectionSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
