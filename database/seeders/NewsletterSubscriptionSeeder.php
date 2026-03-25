<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscription;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class NewsletterSubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_PH');

        for ($i = 0; $i < 50; $i++) {
            NewsletterSubscription::create([
                'email' => $faker->unique()->safeEmail,
                'is_active' => true,
            ]);
        }
    }
}
