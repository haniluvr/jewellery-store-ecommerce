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
        DB::table('orders')->delete();

        $users = User::all();
        $statuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

        for ($i = 0; $i < 300; $i++) {
            $user = $users->random();
            $status = $statuses[array_rand($statuses)];
            $trackingNumber = in_array($status, ['shipped', 'delivered']) ? 'EK'.strtoupper(Str::random(10)) : null;
            $shippedAt = in_array($status, ['shipped', 'delivered']) ? now()->subDays(rand(1, 30)) : null;
            $deliveredAt = ($status === 'delivered') ? ($shippedAt ? $shippedAt->copy()->addDays(rand(1, 5)) : now()->subDays(rand(1, 5))) : null;
            $subtotal = rand(1000, 50000);

            DB::table('orders')->insert([
                'user_id' => $user->id,
                'order_number' => 'ORD-'.strtoupper(Str::random(8)),
                'status' => $status,
                'fulfillment_status' => ($status === 'delivered') ? 'delivered' : (($status === 'shipped') ? 'shipped' : 'pending'),
                'tracking_number' => $trackingNumber,
                'carrier' => $trackingNumber ? ['DHL', 'FedEx', 'UPS', 'LBC'][array_rand(['DHL', 'FedEx', 'UPS', 'LBC'])] : null,
                'shipped_at' => $shippedAt,
                'delivered_at' => $deliveredAt,
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
