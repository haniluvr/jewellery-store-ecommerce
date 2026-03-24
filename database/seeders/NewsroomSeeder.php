<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'title' => 'The Grand Éclore Exhibition at Palais d\'Or',
                'slug' => 'grand-eclore-exhibition-palais-dor',
                'excerpt' => 'From the historic ateliers of Paris to the shimmering horizons of Capri, our journey has always been defined by an unyielding pursuit of excellence.',
                'content' => 'Full article content about the exhibition at Palais d\'Or goes here. It was a night of ultimate luxury where heritage met innovation.',
                'type' => 'news',
                'category' => 'Exhibitions',
                'is_featured' => true,
                'featured_image' => 'necklace.webp',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Sustainable Craftsmanship: The New Ethical Sourcing Standard',
                'slug' => 'sustainable-craftsmanship-ethical-sourcing',
                'excerpt' => 'An exploration into how Éclore is leading the industry in conflict-free diamonds and recycled gold.',
                'content' => 'The beauty of a jewel should never be overshadowed by its origin. At Éclore, we believe in radical transparency...',
                'type' => 'news',
                'category' => 'Insights',
                'is_featured' => false,
                'featured_image' => 'ring.webp',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Éclore Appoints New Head of Design for High Jewellery',
                'slug' => 'new-head-of-design-appointment',
                'excerpt' => 'Julianne de Mornay joins the house as the new Global Artistic Director, bringing a vision of modern romanticism.',
                'content' => 'With over two decades of experience in the Place Vendôme, Julianne brings a fresh perspective to our heritage...',
                'type' => 'news',
                'category' => 'Press Releases',
                'is_featured' => false,
                'featured_image' => 'earrings.webp',
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Unveiling the "Radiance of the Sun" Yellow Diamond',
                'slug' => 'radiance-of-the-sun-yellow-diamond',
                'excerpt' => 'A 45-carat masterpiece that captures the essence of eternal light.',
                'content' => 'The centerpiece of our new high jewellery collection, this rare fancy yellow diamond took 18 months to cut and polish...',
                'type' => 'news',
                'category' => 'Press Releases',
                'is_featured' => false,
                'featured_image' => 'necklace.webp',
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'The Lost Art of Hand Chasing in Modern Horology',
                'slug' => 'lost-art-hand-chasing-horology',
                'excerpt' => 'How our master engravers are keeping ancient techniques alive in the digital age.',
                'content' => 'In a world of mass production, the human touch remains our most precious tool. Every dial in our watch series...',
                'type' => 'news',
                'category' => 'Insights',
                'is_featured' => false,
                'featured_image' => 'bracelet.webp',
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'A Night of Brilliance: Oscar Pre-Show Soirée in Beverly Hills',
                'slug' => 'oscar-pre-show-soiree-beverly-hills',
                'excerpt' => 'Éclore hosts an exclusive preview for the world\'s most watched red carpet.',
                'content' => 'The stars aligned at the Beverly Hills Hotel for an intimate evening showcasing our latest red carpet arrivals...',
                'type' => 'news',
                'category' => 'Exhibitions',
                'is_featured' => false,
                'featured_image' => 'ring.webp',
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Heritage Reimagined: The Collaboration with Louvre Museum',
                'slug' => 'heritage-reimagined-louvre-collaboration',
                'excerpt' => 'How classical architecture influences the geometry of our "Legacy" collection.',
                'content' => 'The symmetry of the Louvre\'s wings and the play of light in its pyramid find new life in our geometric motifs...',
                'type' => 'news',
                'category' => 'Exhibitions',
                'is_featured' => false,
                'featured_image' => 'necklace.webp',
                'published_at' => now()->subDays(22),
            ],
            [
                'title' => 'Opening of Our New Flagship Boutique in Ginza, Tokyo',
                'slug' => 'new-flagship-boutique-ginza-tokyo',
                'excerpt' => 'Éclore expands its presence in Japan with a stunning three-story concept store.',
                'content' => 'Marrying Japanese minimalism with Parisian flair, the Ginza flagship is a sanctuary of luxury craftsmanship...',
                'type' => 'news',
                'category' => 'Press Releases',
                'is_featured' => false,
                'featured_image' => 'bracelet.webp',
                'published_at' => now()->subDays(28),
            ],
            [
                'title' => 'Masterclass: The Symbiosis of Gemstones and Light',
                'slug' => 'masterclass-gemstones-light-symbiosis',
                'excerpt' => 'Our chief gemologist explains the physics of brilliance in emerald-cut stones.',
                'content' => 'Understanding how light enters and exits a stone is fundamental to designing a piece that breathes...',
                'type' => 'news',
                'category' => 'Insights',
                'is_featured' => false,
                'featured_image' => 'earrings.webp',
                'published_at' => now()->subDays(35),
            ],
        ];

        foreach ($stories as $story) {
            \App\Models\CmsPage::create(array_merge($story, [
                'is_active' => true,
                'sort_order' => 0,
            ]));
        }
    }
}
