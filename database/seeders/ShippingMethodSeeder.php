<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingMethodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shipping_methods')->delete();
        DB::table('shipping_methods')->insert([
            ['name' => 'Standard Shipping', 'description' => '3-5 business days', 'type' => 'flat_rate', 'cost' => 150, 'is_active' => true, 'created_at' => now()],
            ['name' => 'Express Delivery', 'description' => 'Next day delivery', 'type' => 'flat_rate', 'cost' => 450, 'is_active' => true, 'created_at' => now()],
            ['name' => 'Store Pickup', 'description' => 'Pick up from our Makati boutique', 'type' => 'free_shipping', 'cost' => 0, 'is_active' => true, 'created_at' => now()],
        ]);
    }
}
