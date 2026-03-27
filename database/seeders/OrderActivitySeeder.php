<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_activities')->delete();

        $orders = DB::table('orders')->take(100)->get();

        foreach ($orders as $order) {
            DB::table('order_activities')->insert([
                'order_id' => $order->id,
                'admin_id' => 1,
                'action' => 'status_updated',
                'old_value' => 'pending',
                'new_value' => $order->status,
                'notes' => 'Order processed by super admin.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
