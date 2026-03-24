<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing categories (disable foreign key checks temporarily)
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            [
                'id' => 1,
                'name' => 'Rings',
                'slug' => 'rings',
                'description' => 'Engagement, wedding bands, and statement rings.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Necklaces & Pendants',
                'slug' => 'necklaces-pendants',
                'description' => 'Fine chains, statement necklaces, and elegant pendants.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Earrings',
                'slug' => 'earrings',
                'description' => 'From classic studs to elegant chandelier earrings.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Bracelets & Bangles',
                'slug' => 'bracelets-bangles',
                'description' => 'Tennis bracelets, cuffs, and delicate chain bracelets.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'id' => 5,
                'name' => 'Timepieces & Fine Accessories',
                'slug' => 'timepieces-fine-accessories',
                'description' => 'Luxury watches, cufflinks, and other fine accessories.',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        // Create main categories
        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create subcategories
        $subcategories = [
            // Rings
            ['name' => 'Engagement Rings', 'slug' => 'engagement-rings', 'parent_id' => 1],
            ['name' => 'Wedding Bands', 'slug' => 'wedding-bands', 'parent_id' => 1],
            ['name' => 'Statement Rings', 'slug' => 'statement-rings', 'parent_id' => 1],
            ['name' => 'Gemstone Rings', 'slug' => 'gemstone-rings', 'parent_id' => 1],
            ['name' => 'Signet & Mens Rings', 'slug' => 'signet-mens-rings', 'parent_id' => 1],

            // Necklaces & Pendants
            ['name' => 'Solitaire Pendants', 'slug' => 'solitaire-pendants', 'parent_id' => 2],
            ['name' => 'Statement Necklaces', 'slug' => 'statement-necklaces', 'parent_id' => 2],
            ['name' => 'Fine Chains', 'slug' => 'fine-chains', 'parent_id' => 2],
            ['name' => 'Lockets & Charms', 'slug' => 'lockets-charms', 'parent_id' => 2],
            ['name' => 'Chokers & Collars', 'slug' => 'chokers-collars', 'parent_id' => 2],

            // Earrings
            ['name' => 'Diamond Studs', 'slug' => 'diamond-studs', 'parent_id' => 3],
            ['name' => 'Drop & Dangle Earrings', 'slug' => 'drop-dangle-earrings', 'parent_id' => 3],
            ['name' => 'Hoop Earrings', 'slug' => 'hoop-earrings', 'parent_id' => 3],
            ['name' => 'Chandelier Earrings', 'slug' => 'chandelier-earrings', 'parent_id' => 3],
            ['name' => 'Ear Cuffs & Climbers', 'slug' => 'ear-cuffs-climbers', 'parent_id' => 3],

            // Bracelets & Bangles
            ['name' => 'Tennis Bracelets', 'slug' => 'tennis-bracelets', 'parent_id' => 4],
            ['name' => 'Charm Bracelets', 'slug' => 'charm-bracelets', 'parent_id' => 4],
            ['name' => 'Cuff Bracelets', 'slug' => 'cuff-bracelets', 'parent_id' => 4],
            ['name' => 'Bangle Sets', 'slug' => 'bangle-sets', 'parent_id' => 4],
            ['name' => 'Chain Bracelets', 'slug' => 'chain-bracelets', 'parent_id' => 4],

            // Timepieces & Fine Accessories
            ['name' => 'Luxury Womens Watches', 'slug' => 'luxury-womens-watches', 'parent_id' => 5],
            ['name' => 'Mens Dress Watches', 'slug' => 'mens-dress-watches', 'parent_id' => 5],
            ['name' => 'Jewelry Boxes & Travel Cases', 'slug' => 'jewelry-boxes-travel-cases', 'parent_id' => 5],
            ['name' => 'Cufflinks & Tie Bars', 'slug' => 'cufflinks-tie-bars', 'parent_id' => 5],
            ['name' => 'Brooches & Pins', 'slug' => 'brooches-pins', 'parent_id' => 5],
        ];

        foreach ($subcategories as $subcategory) {
            Category::create([
                'name' => $subcategory['name'],
                'slug' => $subcategory['slug'],
                'description' => null,
                'is_active' => true,
                'sort_order' => 0,
                'parent_id' => $subcategory['parent_id'],
            ]);
        }
    }
}
