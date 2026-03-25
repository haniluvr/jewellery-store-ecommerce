<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cart_items')->truncate();

        $users = User::all();
        $products = Product::all();

        for ($i = 0; $i < 350; $i++) {
            $user = $users->random();
            $product = $products->random();
            $qty = rand(1, 2);

            DB::table('cart_items')->insert([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'unit_price' => $product->price,
                'total_price' => $product->price * $qty,
                'product_name' => $product->name,
                'product_sku' => $product->sku,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
