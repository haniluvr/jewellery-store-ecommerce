<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_reviews')->delete();

        $products = Product::all();
        $users = User::all();

        $reviews = [
            'Absolutely stunning! The craftsmanship is incredible.',
            'Brought this for my wife and she loves it. Very elegant.',
            'The diamonds are so sparkly! Better than the pictures.',
            'Great quality and fast shipping. Highly recommend Éclore.',
            'A bit expensive but worth every cent for the luxury feel.',
            'The packaging was beautiful. Felt like a real luxury experience.',
        ];

        for ($i = 0; $i < 200; $i++) {
            $product = $products->random();
            $user = $users->random();

            DB::table('product_reviews')->insert([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'order_id' => rand(1, 300),
                'rating' => rand(4, 5),
                'review' => $reviews[array_rand($reviews)],
                'is_approved' => true,
                'created_at' => now()->subDays(rand(1, 90)),
            ]);
        }
    }
}
