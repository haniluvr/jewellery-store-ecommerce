<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderFulfillmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_fulfillment')->delete();

        $orders = DB::table('orders')->whereIn('status', ['shipped', 'delivered', 'processing'])->get();

        foreach ($orders as $order) {
            DB::table('order_fulfillment')->insert([
                'order_id' => $order->id,
                'items_packed' => true,
                'label_printed' => true,
                'shipped' => $order->status !== 'processing',
                'carrier' => 'LBC Express',
                'tracking_number' => 'LBC-'.rand(1000000, 9999999),
                'packed_at' => now()->subDays(2),
                'shipped_at' => $order->status !== 'processing' ? now()->subDay() : null,
                'packed_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
