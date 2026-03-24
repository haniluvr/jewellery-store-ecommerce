@extends('layouts.app')

@section('title', 'Collections - Éclore')

@section('content')
<style>
/* Sticky filter bar styles */
.sticky-filter-bar {
    position: sticky;
    top: 64px;
    z-index: 40;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-top: 1px solid #f3f4f6;
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.3s ease;
}

/* Stuck state - white background when scrolled */
.sticky-filter-bar.is-stuck {
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
}

.filter-group {
    margin: 0.7rem 0;
}

.sort-group,
.room-group {
    font-size: 0.875rem; /* 14px - match base text size */
}

.sort-group select,
.room-group select {
    background-color: rgba(255, 255, 255, 0.5);
    font-size: 0.875rem; /* 14px */
    color: #374151; /* gray-700 - match text color */
    font-weight: 500;
    line-height: 1.5;
}

.sticky-filter-bar.is-stuck .sort-group select,
.sticky-filter-bar.is-stuck .room-group select {
    background-color: white;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.sort-group span,
.room-group span {
    font-size: 0.875rem; /* 14px */
    color: #6b7280; /* gray-500 */
    font-weight: 400;
}

@media (max-width: 1200px) {
    .sticky-filter-bar {
        margin: 0 -2rem;
        padding-left: 2rem;
        padding-right: 2rem;
    }
}

@media (max-width: 768px) {
    .sticky-filter-bar {
        margin: 0 -1rem;
        padding-left: 1rem;
        padding-right: 1rem;
        top: 60px;
    }
    
    .sticky-filter-bar .flex {
        flex-direction: column;
        gap: 1rem;
    }
    
    .sticky-filter-bar .filter-group {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
    }
}

/* Pagination styles */
.pagination-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-top: 3rem;
    padding: 1.5rem 0;
}

.pagination-btn {
    padding: 0.5rem 1rem;
    border: 1px solid #ddd;
    background-color: white;
    color: #555;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.875rem;
    font-weight: 500;
    min-width: 40px;
    text-align: center;
}

.pagination-btn:hover:not(:disabled) {
    background-color: rgba(255, 255, 255, 0.5);
    border-color: #1a1a1a;
    color: #1a1a1a;
}

.pagination-btn.active {
    background-color: #B6965D;
    color: white;
    border-color: #B6965D;
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.filter-btn.active {
    color: #B6965D;
    border-bottom-color: #B6965D;
}

/* Hero Section for Products Page */
.products-hero {
    width: 100%;
    min-height: 90vh;
    background-image: url('{{ asset("frontend/assets/category-earrings.webp") }}');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
}

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3rem, 10vw, 8rem);
    font-weight: 300;
    line-height: 0.9;
    letter-spacing: -0.02em;
    margin-bottom: 2rem;
    color: #fff;
}

.hero-border-b {
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.hero-border-r {
    border-right: 1px solid rgba(255, 255, 255, 0.2);
}

.date-dot {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: transparent;
    margin-bottom: 8px;
}

.date-dot.active {
    background: #B6965D;
}

.btn-discover {
    display: inline-flex;
    align-items: center;
    color: white;
    background-color: transparent;
    border-bottom: 1px solid rgba(255, 255, 255, 0.5);
    padding-bottom: 6px;
    font-size: 0.7rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.btn-discover:hover {
    color: #B6965D;
    border-color: #B6965D;
}
</style>

<!-- Section 1: Hero Redesign for Products -->
@php
    $today = \Carbon\Carbon::now();
    $dates = [];
    for ($i = -3; $i <= 3; $i++) {
        $dates[] = $today->copy()->addDays($i)->day;
    }

    // Fetch products for hero showcase
    try {
        $heroProducts = \App\Models\Product::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(5)
            ->get();
            
        if ($heroProducts->isEmpty()) {
            $heroProducts = \App\Models\Product::where('is_active', true)
                ->latest()
                ->take(5)
                ->get();
        }
    } catch (\Exception $e) {
        $heroProducts = collect();
    }

    $leftProduct = $heroProducts->first();
    $carouselProducts = $heroProducts->skip(1);
@endphp

<section class="products-hero pb-20">
    <div class="hero-overlay"></div>

    <div class="relative z-10 flex flex-col items-center justify-center text-center px-6 pt-20 pb-20">
        <h1 class="hero-title !mb-6" data-aos="fade-up">
            Jewellery Catalogue
        </h1>
    </div>

    <!-- Date Bar -->
    <div class="relative z-10 hero-border-b w-full" data-aos="fade-in">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end pb-8">
                @foreach($dates as $index => $day)
                <div class="flex flex-col items-center {{ $index === 3 ? 'text-white' : 'text-white/40' }}">
                    <div class="date-dot {{ $index === 3 ? 'active' : '' }}"></div>
                    <span class="text-[11px] font-azeret">{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Middle Description Section -->
    <div class="relative z-10 hero-border-b w-full bg-black/10 backdrop-blur-[2px]" data-aos="fade-up">
        <div class="mx-auto px-0">
            <div class="flex flex-col md:flex-row">
                <!-- Left: Label -->
                <div class="md:w-1/3 hero-border-r p-12 lg:p-16 flex flex-col justify-center items-center md:items-start text-center md:text-left">
                    <a href="#products" class="btn-discover text-white border-white/30 hover:border-white">
                        EXPLORE COLLECTIONS
                    </a>
                </div>
                <!-- Right: Text Content -->
                <div class="md:w-2/3 p-12 lg:p-16 border-t md:border-t-0 border-white/10">
                    <p class="text-[11px] lg:text-sm font-azeret tracking-[0.1em] text-white/90 leading-loose uppercase">
                        OUR CURATED SELECTIONS: DISCOVER THE ESSENCE OF ETERNAL ELEGANCE IN EVERY PIECE. FROM RARE GEMSTONES TO MASTERFULLY CRAFTED PRECIOUS METALS, EACH CREATION IS A TESTAMENT TO OUR HERITAGE OF EXCELLENCE AND PASSION FOR BEAUTY.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!-- Sticky Filters and Sort -->
    <div class="sticky-filter-bar border-y border-gray-100">
        <div class="container mx-auto flex justify-between items-center md:px-12 lg:px-0">
            <!-- Left Side: Filter By -->
            <div class="flex items-center gap-12">
                <div class="flex items-center gap-3">
                    <i data-lucide="sliders-horizontal" class="w-4 h-4 text-gray-400"></i>
                    <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-900">Filter By:</span>
                </div>
                
                <div class="flex items-center gap-6">
                    <!-- Color -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-color">
                            <option value="">Color</option>
                            <option value="gold">Gold</option>
                            <option value="rose-gold">Rose Gold</option>
                            <option value="white-gold">White Gold</option>
                            <option value="silver">Silver</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>

                    <!-- Material -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-material">
                            <option value="">Material</option>
                            <option value="18k-gold">18K Gold</option>
                            <option value="platinum">Platinum</option>
                            <option value="sterling-silver">Sterling Silver</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>

                    <!-- Gemstone -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-gemstone">
                            <option value="">Gemstone</option>
                            <option value="diamond">Diamond</option>
                            <option value="ruby">Ruby</option>
                            <option value="sapphire">Sapphire</option>
                            <option value="emerald">Emerald</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>

                    <!-- Diamonds -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-diamonds">
                            <option value="">Diamonds</option>
                            <option value="natural">Natural</option>
                            <option value="lab-grown">Lab Grown</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>

                    <!-- Price -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-price">
                            <option value="">Price</option>
                            <option value="under-50k">Under ₱50,000</option>
                            <option value="50k-100k">₱50,000 - ₱100,000</option>
                            <option value="over-100k">Over ₱100,000</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>

                    <!-- Category -->
                    <div class="relative group w-[110px]">
                        <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="filter-category">
                            <option value="all">Category</option>
                            <option value="rings">Rings</option>
                            <option value="necklaces-pendants">Necklaces</option>
                            <option value="earrings">Earrings</option>
                            <option value="bracelets-bangles">Bracelets</option>
                            <option value="timepieces-fine-accessories">Timepieces</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                    </div>
                </div>
            </div>

            <!-- Vertical Separator -->
            <div class="hidden lg:block h-20 border-l border-gray-200 mx-4"></div>

            <!-- Right Side: Sort By -->
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3">
                    <i data-lucide="arrow-up-down" class="w-3.5 h-3.5 text-gray-400"></i>
                    <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-gray-900">Sort By:</span>
                </div>
                <div class="relative group w-[160px]">
                    <select class="appearance-none bg-transparent border-none py-2 px-2 w-full text-[10px] uppercase tracking-[0.15em] font-medium text-gray-700 hover:text-[#B6965D] cursor-pointer focus:ring-0" id="sort-select">
                        <option value="popularity">Relevance</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="newest">Newest Arrival</option>
                    </select>
                    <i data-lucide="chevron-down" class="absolute right-0 top-1/2 -translate-y-1/2 w-3 h-3 text-gray-400 pointer-events-none transition-transform group-hover:text-[#B6965D]"></i>
                </div>
            </div>
        </div>
    </div>
<!-- products listing -->
<section class="featured-jewellery bg-white pt-5 px-24" id="products">
    <!-- Product Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12 px-4 md:px-12 lg:px-12 mt-12" id="product-grid" data-page="products">
        <!-- Products will be injected here -->
    </div>
    
    <!-- Pagination -->
    <div class="pagination-container" id="pagination-container">
        <!-- Pagination will be injected here -->
    </div>
</section>
@endsection

@push('scripts')
<script>
// Wishlist Logic for Hero Section
function setHeartState(productId, inWishlist) {
    const icons = document.querySelectorAll(`[id^="hero-heart-${productId}"]`);
    const btns = document.querySelectorAll(`[id^="hero-wish-${productId}"]`);
    
    icons.forEach(icon => {
        if (inWishlist) {
            icon.style.fill  = '#B6965D';
            icon.style.color = '#B6965D';
        } else {
            icon.style.fill  = 'none';
            icon.style.color = '';
        }
    });
    
    btns.forEach(btn => {
        if (inWishlist) btn.classList.add('wishlist-active');
        else btn.classList.remove('wishlist-active');
    });
}

async function initHeroWishlist() {
    if (!window.api) return;
    const btns = document.querySelectorAll('.hero-wishlist-btn');
    
    btns.forEach(async (btn) => {
        const productId = btn.getAttribute('data-product-id');
        if (!productId) return;

        try {
            const res = await window.api.checkWishlist(productId);
            setHeartState(productId, res.in_wishlist);
        } catch(e) {}

        btn.addEventListener('click', async function(e) {
            e.preventDefault(); e.stopPropagation();
            try {
                const res = await window.api.toggleWishlist(productId);
                if (res && res.success !== false) {
                    const added = res.was_added ?? (res.action === 'added');
                    setHeartState(productId, added);
                    if (typeof updateWishlistOffcanvas === 'function') updateWishlistOffcanvas();
                    if (typeof updateWishlistCount === 'function') updateWishlistCount();
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                }
            } catch(err) {
                console.error('Wishlist toggle failed:', err);
            }
        });
    });
}

// Sticky filter bar scroll detection
document.addEventListener('DOMContentLoaded', function() {
    // Force Lucide icons to render (especially for footer/header)
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    initHeroWishlist();
    
    const stickyBar = document.querySelector('.sticky-filter-bar');
    const productsSection = document.getElementById('products');
    
    if (!stickyBar || !productsSection) return;
    
    const stickyBarTop = stickyBar.offsetTop;
    
    function checkSticky() {
        const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollPosition > stickyBarTop - 64) {
            stickyBar.classList.add('is-stuck');
        } else {
            stickyBar.classList.remove('is-stuck');
        }
    }
    
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                checkSticky();
                ticking = false;
            });
            ticking = true;
        }
    });
    
    checkSticky();
});
</script>
@endpush
