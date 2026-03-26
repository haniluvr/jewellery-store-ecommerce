<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display the Privacy Policy page.
     */
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    /**
     * Display the Terms of Service page.
     */
    public function termsOfService()
    {
        return view('terms-of-service');
    }

    /**
     * Display the Conditions of Sale page.
     */
    public function conditionsOfSale()
    {
        return view('conditions-of-sale');
    }

    /**
     * Display the Cookie Policy page.
     */
    public function cookiePolicy()
    {
        return view('cookie-policy');
    }

    /**
     * Display the Cookie Center page.
     */
    public function cookieCenter()
    {
        return view('cookie-center');
    }

    /**
     * Display the About page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the Collections page.
     */
    public function collections()
    {
        $heroProducts = \App\Models\Product::where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        $bestsellerProducts = \App\Models\Product::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        // Get a specific product for the Talisman section or a default one
        $talismanProduct = \App\Models\Product::where('is_active', true)
            ->where('slug', 'eternal-harmony-ring')
            ->first() ?: \App\Models\Product::where('is_active', true)->first();

        return view('collections', compact('heroProducts', 'bestsellerProducts', 'talismanProduct'));
    }

    /**
     * Display the Newsroom page.
     */
    public function newsroom(\Illuminate\Http\Request $request)
    {
        $currentCategory = $request->get('category', 'Latest');

        $query = \App\Models\CmsPage::published()
            ->where('type', 'blog')
            ->orderBy('published_at', 'desc');

        if ($currentCategory !== 'Latest') {
            $query->where('category', $currentCategory);
        }

        // Featured story (only for 'Latest' or if no specific category is selected, or just the top one for the category)
        $featuredStory = (clone $query)->where('is_featured', true)->first() ?: (clone $query)->first();

        // Recent Highlights (exclude featured)
        $highlights = (clone $query)->where('id', '!=', $featuredStory?->id)->limit(3)->get();

        // Secondary Feed with Pagination (6 per page)
        $stories = $query->where('id', '!=', $featuredStory?->id)
            ->paginate(6)
            ->withQueryString();

        // If AJAX, return JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $stories->items(),
                'meta' => [
                    'current_page' => $stories->currentPage(),
                    'last_page' => $stories->lastPage(),
                    'per_page' => $stories->perPage(),
                    'total' => $stories->total(),
                    'current_category' => $currentCategory,
                ],
            ]);
        }

        return view('newsroom', compact('featuredStory', 'highlights', 'stories', 'currentCategory'));
    }

    /**
     * Display the VIP Club page.
     */
    public function vipClub()
    {
        return view('vip-club');
    }

    /**
     * Display the Corporate Responsibility page.
     */
    public function corporateResponsibility()
    {
        return view('corporate-responsibility');
    }

    /**
     * Display the Help page.
     */
    public function help()
    {
        return view('help');
    }

    /**
     * Display the Accessibility page.
     */
    public function accessibility()
    {
        return view('accessibility');
    }

    /**
     * Display the Orders & Payments page.
     */
    public function ordersPayments()
    {
        return view('orders-payments');
    }

    /**
     * Display the Track Your Order page.
     */
    public function trackOrder()
    {
        return view('track-order');
    }

    /**
     * Display the Contact Us page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display the Boutiques & Appointments page.
     */
    public function boutiques()
    {
        return view('boutiques');
    }

    /**
     * Display the Care & Maintenance page.
     */
    public function care()
    {
        return view('care');
    }
}
