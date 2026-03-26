<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Product::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $subcategories = Category::whereNotNull('parent_id')->orderBy('category_order')->get();

        $prefixes = ['Éclore', 'Lumière', 'Soleil', 'Clair', 'Aura', 'Celestial', 'Opulence', 'Royal', 'Divine', 'Radiance'];
        $materials = ['18k Yellow Gold', 'Platinum', '18k White Gold', '14k Rose Gold', 'Sterling Silver'];
        $gemstones = ['Diamond', 'Sapphire', 'Emerald', 'Ruby', 'Aquamarine', 'Pearl', 'Opal', 'Morganite'];

        $productCount = 0;

        foreach ($subcategories as $sub) {
            for ($i = 1; $i <= 5; $i++) {
                $prefix = $prefixes[array_rand($prefixes)];
                $material = $materials[array_rand($materials)];
                $gemstone = $gemstones[array_rand($gemstones)];

                $name = "{$prefix} ".Str::singular($sub->name)." in {$material}";
                if (rand(0, 1)) {
                    $name .= " with {$gemstone}";
                }

                // SKU Logic: [A][BB][DD]
                // A = category_id (1-5)
                // BB = subcategory.category_order (01-25)
                // DD = item number (01-05)
                $sku = sprintf('%d%02d%02d', $sub->parent_id, $sub->category_order, $i);

                // Determine price point based on category and material
                $price = 0;
                $isPremium = (str_contains($material, 'Platinum') || str_contains($gemstone, 'Diamond'));
                
                if ($sub->parent_id == 3) { // Earrings
                    $price = $isPremium ? rand(90000, 370000) : rand(10000, 25000);
                } elseif ($sub->parent_id == 1) { // Rings
                    $price = $isPremium ? rand(45000, 150000) : rand(20000, 50000);
                } elseif ($sub->parent_id == 2) { // Necklaces
                    $price = $isPremium ? rand(120000, 450000) : rand(15000, 45000);
                } elseif ($sub->parent_id == 4) { // Bracelets
                    $price = $isPremium ? rand(80000, 250000) : rand(18000, 40000);
                } else { // Others/Accessories
                    $price = rand(15000, 120000);
                }

                $cost = $price * 0.45;

                Product::create([
                    'category_id' => $sub->parent_id,
                    'subcategory_id' => $sub->id,
                    'name' => $name,
                    'slug' => Str::slug($name).'-'.$sku,
                    'description' => "An exquisite masterpiece from our premium collection. This piece features handcrafted detailing in {$material}, epitomizing the elegance of Éclore Fine Jewelry.",
                    'short_description' => 'Elegant '.Str::lower($sub->name).' crafted with precision.',
                    'price' => $price,
                    'cost_price' => $cost,
                    'sale_price' => rand(0, 5) === 0 ? $price * 0.85 : null,
                    'tax_class' => 'standard',
                    'sku' => $sku,
                    'barcode' => 'BAR'.$sku.rand(100, 999),
                    'stock_quantity' => rand(2, 15),
                    'low_stock_threshold' => 2,
                    'manage_stock' => true,
                    'in_stock' => true,
                    'material' => $material,
                    'color' => 'Gold',
                    'gemstone' => $gemstone,
                    'diamonds' => rand(0, 2) === 0 ? '0.5ct' : 'None',
                    'images' => ['https://placehold.co/800x800/f4f1ea/333333?text=Eclore+Fine+Jewelry'],
                    'gallery' => [
                        'https://placehold.co/800x800/f4f1ea/333333?text=Detail+View',
                        'https://placehold.co/800x800/f4f1ea/333333?text=On+Model',
                    ],
                    'view_count' => rand(100, 2000),
                    'is_active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }
        }
    }
}
