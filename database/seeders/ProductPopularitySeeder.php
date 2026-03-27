<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPopularitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_popularity')->delete();

        $products = Product::all();

        foreach ($products as $product) {
            $wishlistCount = DB::table('wishlist_items')->where('product_id', $product->id)->count();
            $cartCount = DB::table('cart_items')->where('product_id', $product->id)->count();

            DB::table('product_popularity')->insert([
                'product_id' => $product->id,
                'sku' => $product->sku,
                'product_name' => $product->name,
                'wishlist_count' => $wishlistCount,
                'cart_count' => $cartCount,
                'total_popularity_score' => ($wishlistCount * 5) + ($cartCount * 10),
                'last_updated' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
