<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database in the correct sequence.
     */
    public function run(): void
    {
        // Disable foreign key checks for truncation
        Schema::disableForeignKeyConstraints();

        $this->call([
            EmployeeSeeder::class,         // Core Staff
            CategorySeeder::class,         // Jewelry Categories (IDs 1-5)
            ProductSeeder::class,          // Jewelry Products (SKU A+BB+DD)
            FilipinoUserSeeder::class,     // 150+ Filipino Users
            WishlistItemSeeder::class,     // ~400 items
            CartItemSeeder::class,         // ~350 items
            OrderSeeder::class,            // ~300 orders
            OrderItemSeeder::class,        // Line items for orders
            OrderFulfillmentSeeder::class, // Empty/Placeholder as requested
            OrderActivitySeeder::class,    // Empty/Placeholder as requested
            ProductReviewSeeder::class,    // ~200 reviews
            ProductPopularitySeeder::class, // Trigger popularity calculation/placeholder
            ReturnRepairSeeder::class,     // Empty/Placeholder as requested
            AdminPermissionSeeder::class,  // To be kept
            TestNotificationSeeder::class, // To be kept
            ShippingMethodSeeder::class,   // To be kept
            PaymentGatewaySeeder::class,   // To be kept
            CmsNewsroomSeeder::class,      // Combined CMS and Newsroom
            AppointmentSeeder::class,      // Fake Boutique Appointments
            NewsletterSubscriptionSeeder::class, // Fake Guest Subscribers
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
