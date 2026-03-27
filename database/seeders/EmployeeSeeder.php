<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::query()->delete();

        Employee::create([
            'first_name' => 'Hannah',
            'last_name' => 'Marquez',
            'email' => 'hannah@eclore.com',
            'personal_email' => 'hvniluvr@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'status' => 'active',
            'department' => 'Management',
            'position' => 'Owner',
            'two_factor_enabled' => false,
        ]);
    }
}
