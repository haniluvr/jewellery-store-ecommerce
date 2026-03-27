<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsNewsroomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cms_pages')->delete();

        $pages = [
            [
                'title' => 'The Art of Savoir-Faire',
                'slug' => 'art-of-savoir-faire',
                'content' => '<h1>Craftsmanship at its finest</h1><p>Every Éclore creation is a journey through time and tradition.</p>',
                'excerpt' => 'A deep dive into the ancestral techniques that define our jewelry.',
                'type' => 'blog',
                'category' => 'Insights',
                'featured_image' => 'necklace.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'New Collection: Celestial Dreams',
                'slug' => 'celestial-dreams-launch',
                'content' => '<h1>Inspired by the Cosmos</h1><p>Our latest collection captures the ethereal beauty of the stars.</p>',
                'excerpt' => 'Explore the inspiration behind our most ambitious collection yet.',
                'type' => 'blog',
                'category' => 'Latest',
                'featured_image' => 'ring.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Éclore at the Grand Palais',
                'slug' => 'grand-palais-exhibition',
                'content' => '<h1>A Parisian Tribute</h1><p>An exclusive exhibition showcasing a century of high jewelry.</p>',
                'excerpt' => 'Join us for a retrospective exhibition in the heart of Paris.',
                'type' => 'blog',
                'category' => 'Exhibitions',
                'featured_image' => 'bracelet.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'The Rarity of Pink Diamonds',
                'slug' => 'pink-diamond-insights',
                'content' => '<h1>Nature\'s Most Precious Gift</h1><p>Discover why pink diamonds are the pinnacle of gemstone collecting.</p>',
                'excerpt' => 'An expert look at the world\'s rarest and most coveted gemstones.',
                'type' => 'blog',
                'category' => 'Insights',
                'featured_image' => 'earrings.webp',
                'is_featured' => false,
            ],
            [
                'title' => '2026 Sustainability Report',
                'slug' => 'sustainability-report-2026',
                'content' => '<h1>Our Commitment</h1><p>We are proud to announce our path to 100% recycled gold by 2030.</p>',
                'excerpt' => 'Learn about our dedication to ethical sourcing and craftsmanship.',
                'type' => 'blog',
                'category' => 'Press Releases',
                'featured_image' => 'about-hero.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Mastering the Pear Cut',
                'slug' => 'mastering-pear-cut',
                'content' => '<h1>Precision and Grace</h1><p>The pear cut requires unparalleled skill to achieve perfect symmetry.</p>',
                'excerpt' => 'A technical look at one of jewelry design\'s most challenging cuts.',
                'type' => 'blog',
                'category' => 'Insights',
                'featured_image' => 'necklace.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Milano Jewelry Week Showcase',
                'slug' => 'milano-jewelry-week',
                'content' => '<h1>Italian Elegance</h1><p>Éclore returns to Milan for an week-long celebration of design.</p>',
                'excerpt' => 'Highlights from our recent presentation in the fashion capital.',
                'type' => 'blog',
                'category' => 'Exhibitions',
                'featured_image' => 'ring.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Holiday Gift Guide: The Gold Edit',
                'slug' => 'gold-edit-gift-guide',
                'content' => '<h1>Timeless Gifts</h1><p>Curated selections for the most special people in your life.</p>',
                'excerpt' => 'Discover the perfect expressions of love from our gold collection.',
                'type' => 'blog',
                'category' => 'Latest',
                'featured_image' => 'bracelet.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Strategic Partnership with Global Artisans',
                'slug' => 'artisan-partnership',
                'content' => '<h1>Preserving Heritage</h1><p>We are expanding our network of master craftspeople globally.</p>',
                'excerpt' => 'Official announcement regarding our new heritage preservation initiative.',
                'type' => 'blog',
                'category' => 'Press Releases',
                'featured_image' => 'earrings.webp',
                'is_featured' => false,
            ],
        ];

        foreach ($pages as $page) {
            DB::table('cms_pages')->insert(array_merge($page, [
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'meta_title' => $page['title'].' | Éclore Journal',
                'meta_description' => $page['excerpt'],
                'meta_keywords' => 'jewelry, luxury, éclore',
            ]));
        }
    }
}
