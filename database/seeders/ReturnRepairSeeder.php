<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReturnRepairSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('returns_repairs')->delete();

        $orders = DB::table('orders')->where('status', 'delivered')->take(10)->get();

        foreach ($orders as $order) {
            DB::table('returns_repairs')->insert([
                'rma_number' => 'RMA-'.rand(100000, 999999),
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'type' => rand(0, 1) ? 'return' : 'repair',
                'status' => 'requested',
                'reason' => 'Defective item',
                'description' => 'The clasp on the bracelet is loose.',
                'products' => json_encode([['product_id' => 1, 'quantity' => 1]]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
