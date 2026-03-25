<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->truncate();

        $users = User::all();
        $statuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

        for ($i = 0; $i < 300; $i++) {
            $user = $users->random();
            $status = $statuses[array_rand($statuses)];
            $subtotal = rand(25000, 750000);

            DB::table('orders')->insert([
                'user_id' => $user->id,
                'order_number' => 'ORD-'.strtoupper(Str::random(8)),
                'status' => $status,
                'fulfillment_status' => ($status === 'delivered') ? 'delivered' : 'pending',
                'subtotal' => $subtotal,
                'tax_amount' => $subtotal * 0.12,
                'shipping_amount' => 500,
                'total_amount' => $subtotal * 1.12 + 500,
                'currency' => 'PHP',
                'billing_address' => json_encode(['street' => $user->street, 'city' => $user->city]),
                'shipping_address' => json_encode(['street' => $user->street, 'city' => $user->city]),
                'payment_method' => 'Credit Card',
                'payment_status' => ($status === 'cancelled') ? 'failed' : 'paid',
                'created_at' => now()->subDays(rand(1, 180)),
                'updated_at' => now(),
            ]);
        }
    }
}
