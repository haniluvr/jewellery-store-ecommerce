<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestNotificationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notifications')->delete();
    }
}
