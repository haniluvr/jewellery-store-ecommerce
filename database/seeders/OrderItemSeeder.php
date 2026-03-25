<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_items')->truncate();

        $orders = DB::table('orders')->get();
        $products = Product::all();

        foreach ($orders as $order) {
            $numItems = rand(1, 3);
            for ($j = 0; $j < $numItems; $j++) {
                $product = $products->random();
                $qty = rand(1, 2);

                DB::table('order_items')->insert([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'quantity' => $qty,
                    'unit_price' => $product->price,
                    'total_price' => $product->price * $qty,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->created_at,
                ]);
            }
        }
    }
}
