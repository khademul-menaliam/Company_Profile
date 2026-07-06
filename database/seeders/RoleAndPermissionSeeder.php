<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $ownerRole = Role::firstOrCreate(['name' => 'Owner']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $developerRole = Role::firstOrCreate(['name' => 'Developer']);

        $owner = User::where('email', 'owner@example.com')->first();
        if ($owner) {
            $owner->assignRole($ownerRole);
        }

        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->assignRole($adminRole);
        }

        $developer = User::where('email', 'developer@example.com')->first();
        if ($developer) {
            $developer->assignRole($developerRole);
        }
    }
}
