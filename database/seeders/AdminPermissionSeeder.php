<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPermissionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin_permissions')->delete();
        $roles = ['super_admin', 'admin', 'manager', 'staff'];
        $permissions = ['manage_products', 'manage_orders', 'manage_users', 'view_reports', 'manage_settings'];

        foreach ($roles as $role) {
            foreach ($permissions as $permission) {
                DB::table('admin_permissions')->insert([
                    'role' => $role,
                    'permission' => $permission,
                    'granted' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
