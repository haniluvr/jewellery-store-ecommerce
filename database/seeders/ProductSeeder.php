<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing products
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define category and subcategory mappings for jewelry
        $categoryMappings = [
            1 => [ // Rings
                'subcategories' => [
                    1 => ['name' => 'Engagement Ring', 'min_qty' => 3],
                    2 => ['name' => 'Wedding Band', 'min_qty' => 5],
                    3 => ['name' => 'Statement Ring', 'min_qty' => 2],
                    4 => ['name' => 'Gemstone Ring', 'min_qty' => 4],
                    5 => ['name' => 'Signet Ring', 'min_qty' => 3],
                ],
                'materials' => ['18k Yellow Gold', 'Platinum', '18k White Gold', '14k Rose Gold'],
                'gems' => ['Diamond', 'Sapphire', 'Emerald', 'Ruby', 'Moissanite', 'Pearl'],
                'weight_range' => [0.01, 0.05], // approx kg
            ],
            2 => [ // Necklaces & Pendants
                'subcategories' => [
                    1 => ['name' => 'Solitaire Pendant', 'min_qty' => 4],
                    2 => ['name' => 'Statement Necklace', 'min_qty' => 2],
                    3 => ['name' => 'Fine Chain', 'min_qty' => 10],
                    4 => ['name' => 'Locket', 'min_qty' => 5],
                    5 => ['name' => 'Choker', 'min_qty' => 3],
                ],
                'materials' => ['18k Yellow Gold', 'Platinum', '18k White Gold', '14k Rose Gold', 'Sterling Silver'],
                'gems' => ['Diamond', 'Sapphire', 'Emerald', 'Pearl', 'Opal', 'None'],
                'weight_range' => [0.02, 0.15],
            ],
            3 => [ // Earrings
                'subcategories' => [
                    1 => ['name' => 'Diamond Studs', 'min_qty' => 8],
                    2 => ['name' => 'Drop Earrings', 'min_qty' => 5],
                    3 => ['name' => 'Hoop Earrings', 'min_qty' => 6],
                    4 => ['name' => 'Chandelier Earrings', 'min_qty' => 2],
                    5 => ['name' => 'Ear Cuffs', 'min_qty' => 4],
                ],
                'materials' => ['18k Yellow Gold', 'Platinum', '18k White Gold', '14k Rose Gold'],
                'gems' => ['Diamond', 'Sapphire', 'Ruby', 'Pearl', 'Aquamarine', 'None'],
                'weight_range' => [0.01, 0.04],
            ],
            4 => [ // Bracelets & Bangles
                'subcategories' => [
                    1 => ['name' => 'Tennis Bracelet', 'min_qty' => 3],
                    2 => ['name' => 'Charm Bracelet', 'min_qty' => 4],
                    3 => ['name' => 'Cuff Bracelet', 'min_qty' => 5],
                    4 => ['name' => 'Bangle Set', 'min_qty' => 4],
                    5 => ['name' => 'Chain Bracelet', 'min_qty' => 8],
                ],
                'materials' => ['18k Yellow Gold', 'Platinum', '18k White Gold', '14k Rose Gold'],
                'gems' => ['Diamond', 'Sapphire', 'Emerald', 'None'],
                'weight_range' => [0.03, 0.20],
            ],
            5 => [ // Timepieces & Fine Accessories
                'subcategories' => [
                    1 => ['name' => 'Luxury Womens Watch', 'min_qty' => 2],
                    2 => ['name' => 'Mens Dress Watch', 'min_qty' => 2],
                    3 => ['name' => 'Jewelry Box', 'min_qty' => 5],
                    4 => ['name' => 'Cufflinks', 'min_qty' => 4],
                    5 => ['name' => 'Brooch', 'min_qty' => 3],
                ],
                'materials' => ['Stainless Steel', '18k Yellow Gold', 'Platinum', 'Leather', 'Walnut Wood'],
                'gems' => ['Diamond', 'Sapphire', 'None'],
                'weight_range' => [0.10, 1.50],
            ],
        ];

        $prefixes = ['Éternelle', 'Lumière', 'Soleil', 'Clair', 'Aura', 'Celestial', 'Opulence', 'Royal', 'Divine', 'Radiance'];
        
        $priceRanges = [
            1 => [ // Rings
                1 => [45000, 250000], // Engagement
                2 => [15000, 60000],  // Wedding
                3 => [30000, 150000], // Statement
                4 => [25000, 120000], // Gemstone
                5 => [20000, 80000],  // Signet
            ],
            2 => [ // Necklaces
                1 => [25000, 120000],
                2 => [50000, 300000],
                3 => [10000, 40000],
                4 => [15000, 45000],
                5 => [20000, 85000],
            ],
            3 => [ // Earrings
                1 => [20000, 150000],
                2 => [30000, 180000],
                3 => [15000, 60000],
                4 => [45000, 250000],
                5 => [10000, 35000],
            ],
            4 => [ // Bracelets
                1 => [60000, 400000],
                2 => [15000, 45000],
                3 => [25000, 95000],
                4 => [30000, 120000],
                5 => [12000, 50000],
            ],
            5 => [ // Timepieces
                1 => [80000, 500000],
                2 => [80000, 500000],
                3 => [5000, 25000],
                4 => [15000, 45000],
                5 => [20000, 75000],
            ],
        ];

        $productCount = 0;
        $targetCount = 100;
        $usedProductNames = [];
        $skuItemCounters = [];

        foreach ($categoryMappings as $categoryId => $categoryData) {
            $subcategoryIds = array_keys($categoryData['subcategories']);
            $productsForThisCategory = 20;

            for ($i = 0; $i < $productsForThisCategory; $i++) {
                $subcategoryId = $subcategoryIds[array_rand($subcategoryIds)];
                $subcategoryData = $categoryData['subcategories'][$subcategoryId];

                $prefix = $prefixes[array_rand($prefixes)];
                $material = $categoryData['materials'][array_rand($categoryData['materials'])];
                $gem = $categoryData['gems'][array_rand($categoryData['gems'])];
                
                $gemText = $gem !== 'None' ? " with $gem" : "";
                $productName = "{$prefix} {$subcategoryData['name']}{$gemText}";
                
                // Ensure unique name
                $attempts = 0;
                while (in_array($productName, $usedProductNames) && $attempts < 10) {
                    $prefix = $prefixes[array_rand($prefixes)];
                    $productName = "{$prefix} {$subcategoryData['name']}{$gemText} " . rand(1, 100);
                    $attempts++;
                }
                $usedProductNames[] = $productName;

                $slug = Str::slug($productName);
                
                $basePrice = rand($priceRanges[$categoryId][$subcategoryId][0], $priceRanges[$categoryId][$subcategoryId][1]);
                $costPrice = (int) round($basePrice * 0.4, 2); 
                $salePrice = (rand(1, 100) <= 20) ? (int) round($basePrice * 0.85, 2) : null;
                $stockQuantity = rand($subcategoryData['min_qty'], $subcategoryData['min_qty'] + 10);
                $weight = rand((int)($categoryData['weight_range'][0] * 100), (int)($categoryData['weight_range'][1] * 100)) / 100;

                // Placeholder image for jewelry
                $mainImage = "https://placehold.co/800x800/f4f1ea/333333?text=Eclore+Fine+Jewelry&font=playfair-display";
                $galleryImages = [
                    "https://placehold.co/800x800/f4f1ea/333333?text=Detail+1&font=playfair-display",
                    "https://placehold.co/800x800/f4f1ea/333333?text=Detail+2&font=playfair-display"
                ];

                $description = "Crafted with the utmost precision, the {$productName} embodies eternal elegance. Set in radiant {$material}, this piece is designed to be cherished across generations. A masterclass in fine jewelry craftsmanship.";
                $shortDescription = "Elegant {$subcategoryData['name']} crafted in {$material}.";

                $subCode = $categoryId * 10 + $subcategoryId;
                $nextItem = ($skuItemCounters[$subCode] ?? 0) + 1;
                $skuItemCounters[$subCode] = $nextItem;
                $sku = sprintf('%d%02d%02d', (int) $categoryId, (int) $subCode, (int) $nextItem);

                Product::create([
                    'category_id' => $categoryId,
                    'subcategory_id' => $subcategoryId,
                    'room_category' => ['jewelry'],
                    'name' => $productName,
                    'slug' => $slug,
                    'description' => $description,
                    'short_description' => $shortDescription,
                    'price' => $basePrice,
                    'cost_price' => $costPrice,
                    'sale_price' => $salePrice,
                    'sku' => $sku,
                    'barcode' => str_pad(rand(1000000000, 9999999999), 13, '0', STR_PAD_LEFT),
                    'stock_quantity' => $stockQuantity,
                    'low_stock_threshold' => $subcategoryData['min_qty'],
                    'manage_stock' => true,
                    'in_stock' => $stockQuantity > 0,
                    'weight' => $weight,
                    'dimensions' => "N/A",
                    'tax_class' => 'standard',
                    'material' => $material,
                    'images' => [$mainImage],
                    'gallery' => $galleryImages,
                    'featured' => (rand(1, 100) <= 15), 
                    'is_active' => true,
                    'view_count' => rand(500, 5000),
                    'sort_order' => $productCount + 1,
                    'meta_data' => [
                        'keywords' => 'jewelry, luxury, ' . $material . ', ' . $subcategoryData['name'],
                        'og_title' => $productName,
                        'og_description' => $shortDescription,
                        'og_image' => $mainImage,
                    ],
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);

                $productCount++;
            }
        }

        $this->command->info("Created {$productCount} jewelry products successfully!");
    }
}
