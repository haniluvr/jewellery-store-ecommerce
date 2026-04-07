@extends('layouts.app')

@section('title', 'Collections | Éclore Journal')

@section('content')
<main class="bg-white min-h-screen">
    
    <!-- Section 1: Hero Slider - Collection 2025/26 -->
    <section class="max-w-full mx-auto pt-32 mb-32 overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-start mb-16 px-32" data-aos="fade-down">
            <h1 class="text-6xl md:text-[8rem] font-playfair font-light text-gray-900 leading-[0.85] tracking-tight">
                Collection<br>2025/26
            </h1>
            <div class="flex space-x-4 mt-8 md:mt-0">
                <button onclick="moveHeroCarousel(-1)" class="w-12 h-12 flex items-center justify-center border border-gray-100 hover:border-black transition-all group">
                    <i data-lucide="arrow-left" class="w-4 h-4 text-gray-300 group-hover:text-black"></i>
                </button>
                <button onclick="moveHeroCarousel(1)" class="w-12 h-12 flex items-center justify-center border border-gray-100 hover:border-black transition-all group">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-gray-300 group-hover:text-black"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-hidden w-full">
            <div id="hero-carousel-container" class="flex transition-transform duration-1000 ease-in-out gap-8">
                @foreach($heroProducts as $index => $product)
                @php
                    $imgs = (is_array($product->images) && count($product->images) > 0) ? $product->images : ['products/default.webp'];
                    $img1 = storage_url($imgs[0]);
                    $img2 = (count($imgs) > 1) ? storage_url($imgs[1]) : $img1;
                    $imagesJson = json_encode([$img1, $img2]);
                    $uKey = 'hero-' . $product->id . '-' . $index;
                @endphp
                <div class="min-w-[80vw] md:min-w-[420px] bg-[#f9f9f9] aspect-[10/13] relative group/card flex flex-col items-center justify-center p-12 overflow-hidden border border-gray-100 cursor-pointer">
                    <!-- Wishlist Heart -->
                    <button class="icon-wishlist-btn absolute top-8 left-8 opacity-0 group-hover/card:opacity-100 transition-all duration-500 z-20 hover:scale-110 p-2 rounded-full"
                        data-product-id="{{ $product->id }}"
                        id="icon-wish-{{ $uKey }}">
                        <i data-lucide="heart" class="w-5 h-5 text-gray-300 transition-all" id="icon-heart-{{ $uKey }}"></i>
                    </button>

                    <!-- Internal Image Browsing -->
                    <div class="relative w-full h-full flex items-center justify-center">
                        <button onclick="changeInternalImg(this, -1, event)" class="absolute left-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                            <i data-lucide="chevron-left" class="w-6 h-6 text-black"></i>
                        </button>

                        <img data-images="{{ $imagesJson }}" data-current="0" src="{{ $img1 }}" alt="{{ $product->name }}" class="icon-main-img w-4/5 h-4/5 object-contain transition-all duration-700" style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.08));">

                        <button onclick="changeInternalImg(this, 1, event)" class="absolute right-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                            <i data-lucide="chevron-right" class="w-6 h-6 text-black"></i>
                        </button>
                    </div>

                    <!-- Text Content -->
                    <div class="absolute bottom-12 left-0 w-full text-center px-4">
                        <h3 class="font-playfair text-3xl text-[#1a1a1a] mb-2 tracking-tight">{{ $product->name }}</h3>
                        <span class="text-gray-400 text-[10px] tracking-[0.3em] font-azeret uppercase">[{{ number_format($product->price, 2) }} €]</span>
                        <div class="mt-4 opacity-0 group-hover/card:opacity-100 transition-opacity duration-500">
                            <a href="{{ route('products.show', $product->slug) }}" class="text-[10px] tracking-[0.3em] uppercase font-bold text-[#B6965D]">DETAILS →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 2: Jewelry Typographic Menu -->
    <section class="max-w-[1400px] mx-auto py-32 px-4 md:px-12 text-center mb-16">
        <span class="text-[10px] uppercase tracking-[0.6em] text-gray-400 mb-6 block">Jewelry</span>
        <a href="{{ route('catalogue') }}" class="text-[11px] uppercase tracking-[0.4em] font-bold border-b border-black pb-2 hover:text-[#B6965D] hover:border-[#B6965D] transition-colors mb-24 inline-block">VIEW ALL SECTIONS</a>
        
        <div class="relative max-w-5xl mx-auto flex flex-col space-y-6 items-center">
            <!-- Pendants -->
            <div class="group relative flex items-center justify-center py-6 cursor-pointer w-full">
                <div class="absolute w-28 h-28 -left-12 lg:-left-32 opacity-0 group-hover:opacity-100 transition-all duration-700 transform translate-x-12 group-hover:translate-x-0 overflow-hidden z-20" style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));">
                    <img src="{{ asset('frontend/assets/earrings.webp') }}" class="w-full h-full object-contain" alt="Small Pendant">
                </div>
                <h2 class="text-6xl md:text-8xl font-playfair font-light text-gray-900 group-hover:italic transition-all duration-700">Pendants</h2>
            </div>
            
            <!-- Chains -->
            <div class="group relative flex items-center justify-center py-6 cursor-pointer w-full">
                <h2 class="text-6xl md:text-8xl font-playfair font-light text-gray-900 group-hover:italic transition-all duration-700">Chains</h2>
            </div>

            <!-- Diamond Jewelry -->
            <div class="group relative flex items-center justify-center py-6 cursor-pointer w-full">
                <div class="absolute w-auto h-[120%] -right-12 lg:-right-32 opacity-0 group-hover:opacity-100 transition-all duration-700 transform -translate-x-12 group-hover:translate-x-0 overflow-hidden z-20" style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));">
                    <img src="{{ asset('frontend/assets/bracelet.webp') }}" class="w-auto h-full object-cover" alt="Model Detail">
                </div>
                <h2 class="text-6xl md:text-8xl font-playfair font-light text-gray-900 group-hover:italic transition-all duration-700">Diamond Jewelry</h2>
            </div>

            <!-- Rings -->
            <div class="group relative flex items-center justify-center py-6 cursor-pointer w-full">
                <h2 class="text-6xl md:text-8xl font-playfair font-light text-gray-900 group-hover:italic transition-all duration-700 flex items-center">
                    <i data-lucide="arrow-right" class="w-16 h-16 mr-10 opacity-0 group-hover:opacity-100 -translate-x-12 group-hover:translate-x-0 transition-all duration-700 text-[#B6965D]"></i> Rings
                </h2>
            </div>

            <!-- Necklace -->
            <div class="group relative flex items-center justify-center py-6 cursor-pointer w-full">
                <div class="absolute w-auto h-[180%] -left-20 lg:-left-48 top-0 opacity-0 group-hover:opacity-100 transition-all duration-700 transform translate-y-12 group-hover:translate-y-0 overflow-hidden z-20 rotate-[-5deg]" style="filter: drop-shadow(0 20px 50px rgba(0,0,0,0.12));">
                    <img src="{{ asset('frontend/assets/necklace-2.webp') }}" class="w-full h-full object-contain" alt="Necklace Detail">
                </div>
                <h2 class="text-6xl md:text-8xl font-playfair font-light text-gray-900 group-hover:italic transition-all duration-700">Necklace</h2>
            </div>
        </div>
        
        <p class="text-[10px] text-gray-400 mt-40 tracking-[0.5em] font-medium opacity-50 uppercase">@Éclore.Journal</p>
    </section>

    <!-- Section 3: Talisman (Image 3) -->
    <section class="max-w-full mx-auto bg-[#F2F2F2] mb-32 relative">
        <div class="flex flex-col lg:flex-row items-stretch">
            <!-- Left Info Panel -->
            <div class="lg:w-1/2 p-12 md:p-24 flex flex-col justify-between" data-aos="fade-right">
                <div class="mb-24">
                    <h2 class="text-6xl md:text-8xl font-playfair font-light text-[#1a1a1a] leading-[1.05] tracking-tight mb-16">
                        These pieces are <br> your talisman and <br> a reminder
                    </h2>
                </div>

                @if($talismanProduct)
                @php
                    $tImgs = (is_array($talismanProduct->images) && count($talismanProduct->images) > 0) ? $talismanProduct->images : ['products/default.webp'];
                    $tImg1 = storage_url($tImgs[0]);
                    $tImg2 = (count($tImgs) > 1) ? storage_url($tImgs[1]) : $tImg1;
                    $tImagesJson = json_encode([$tImg1, $tImg2]);
                    $tKey = 'talisman-' . $talismanProduct->id;
                @endphp
                <div class="w-full max-w-md bg-white aspect-[4/5] relative group/card flex flex-col items-center justify-center p-12 overflow-hidden border border-gray-100 cursor-pointer shadow-sm">
                    <!-- Wishlist Heart -->
                    <button class="icon-wishlist-btn absolute top-8 left-8 opacity-0 group-hover/card:opacity-100 transition-all duration-500 z-20 hover:scale-110 p-2 rounded-full"
                        data-product-id="{{ $talismanProduct->id }}"
                        id="icon-wish-{{ $tKey }}">
                        <i data-lucide="heart" class="w-5 h-5 text-gray-300 transition-all" id="icon-heart-{{ $tKey }}"></i>
                    </button>

                    <!-- Internal Image Browsing -->
                    <div class="relative w-full h-full flex items-center justify-center">
                        <button onclick="changeInternalImg(this, -1, event)" class="absolute left-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                            <i data-lucide="chevron-left" class="w-6 h-6 text-black"></i>
                        </button>

                        <img data-images="{{ $tImagesJson }}" data-current="0" src="{{ $tImg1 }}" alt="{{ $talismanProduct->name }}" class="icon-main-img w-4/5 h-4/5 object-contain transition-all duration-700" style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.08));">

                        <button onclick="changeInternalImg(this, 1, event)" class="absolute right-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                            <i data-lucide="chevron-right" class="w-6 h-6 text-black"></i>
                        </button>
                    </div>

                    <!-- Text Content -->
                    <div class="absolute bottom-12 left-0 w-full text-center px-4">
                        <h3 class="font-playfair text-3xl text-[#1a1a1a] mb-2 tracking-tight">{{ $talismanProduct->name }}</h3>
                        <span class="text-gray-400 text-[10px] tracking-[0.3em] font-azeret uppercase">[{{ number_format($talismanProduct->price, 2) }} €]</span>
                        <div class="mt-4 opacity-0 group-hover/card:opacity-100 transition-opacity duration-500">
                            <a href="{{ route('products.show', $talismanProduct->slug) }}" class="text-[10px] tracking-[0.3em] uppercase font-bold text-[#B6965D]">DETAILS →</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Visual Panel -->
            <div class="lg:w-1/2 relative min-h-[75%] md:min-h-screen overflow-hidden" data-aos="fade-left">
                <img src="{{ asset('frontend/assets/collection-section.webp') }}" class="w-full h-full object-cover" alt="Lifestyle Statement"
            </div>
        </div>
    </section>

    <!-- Section 4: Bestsellers (Using Home Product Card Style) -->
    <section class="max-w-full mx-auto py-32 md:px-12 text-center mb-32">
        <span class="text-[10px] uppercase tracking-[0.8em] text-gray-400 mb-6 block font-medium">Bestsellers</span>
        <a href="{{ route('catalogue') }}" class="text-[11px] uppercase tracking-[0.4em] font-bold border-b border-black pb-2 hover:text-[#B6965D] hover:border-[#B6965D] transition-colors mb-24 inline-block">VIEW COLLECTION</a>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-0 border-l border-t border-gray-100" data-aos="fade-up">
            @foreach($bestsellerProducts as $index => $prod)
            @php
                $pImgs = (is_array($prod->images) && count($prod->images) > 0) ? $prod->images : ['products/default.webp'];
                $img1 = storage_url($pImgs[0]);
                $img2 = (count($pImgs) > 1) ? storage_url($pImgs[1]) : $img1;
                $imagesJson = json_encode([$img1, $img2]);
                $uKey = 'best-' . $prod->id . '-' . $index;
            @endphp
            <div class="bg-[#fcfcfc] aspect-[4/5] relative group/card flex flex-col items-center justify-center p-12 overflow-hidden border-r border-b border-gray-100">
                <!-- Wishlist Heart -->
                <button class="icon-wishlist-btn absolute top-8 left-8 opacity-0 group-hover/card:opacity-100 transition-all duration-500 z-20 hover:scale-110 p-2 rounded-full"
                    data-product-id="{{ $prod->id }}"
                    id="icon-wish-{{ $uKey }}">
                    <i data-lucide="heart" class="w-5 h-5 text-gray-300 transition-all" id="icon-heart-{{ $uKey }}"></i>
                </button>

                <!-- Internal Image Browsing -->
                <div class="relative w-full h-full flex items-center justify-center">
                    <button onclick="changeInternalImg(this, -1, event)" class="absolute left-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                        <i data-lucide="chevron-left" class="w-5 h-5 text-black"></i>
                    </button>

                    <img data-images="{{ $imagesJson }}" data-current="0" src="{{ $img1 }}" alt="{{ $prod->name }}" class="icon-main-img w-4/5 h-4/5 object-contain transition-all duration-700" style="filter: drop-shadow(0 15px 30px rgba(0,0,0,0.06));">

                    <button onclick="changeInternalImg(this, 1, event)" class="absolute right-0 top-1/2 -translate-y-1/2 opacity-0 group-hover/card:opacity-40 hover:opacity-100 transition-opacity z-20">
                        <i data-lucide="chevron-right" class="w-5 h-5 text-black"></i>
                    </button>
                </div>

                <!-- Text Content -->
                <div class="absolute bottom-12 left-0 w-full text-center px-4">
                    <h3 class="font-playfair text-2xl text-[#1a1a1a] mb-2 tracking-tight">{{ $prod->name }}</h3>
                    <span class="text-gray-400 text-[10px] tracking-[0.3em] font-azeret uppercase">[{{ number_format($prod->price, 2) }}]</span>
                    <div class="mt-4 opacity-0 group-hover/card:opacity-100 transition-opacity duration-500">
                        <a href="{{ route('products.show', $prod->slug) }}" class="text-[10px] tracking-[0.3em] uppercase font-bold text-[#B6965D]">DETAILS →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section 5: Brand Statement (Image 3) -->
    <section class="max-w-full mx-auto py-32 px-4 md:px-12 bg-[#fcfcfc]">
        <div class="mb-24 text-right">
            <h2 class="text-4xl md:text-6xl font-playfair font-light text-gray-900 leading-tight">
                Éclore is jewelry crafted <br>
                by light and inspired by nature. <span class="text-gray-300 italic">We create pure</span> <br>
                <span class="text-gray-300 italic">forms and sparkling stones, inspired by history,</span> <br>
                that you'll want to wear every day.
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row gap-20 items-start">
            <div class="lg:w-1/3" data-aos="fade-right">
                <p class="text-[12px] text-gray-500 leading-loose font-light mb-16 uppercase tracking-[0.2em] max-w-sm">
                    Founded in 2012, Lumi is more than just a brand, it's a philosophy. Inspired by the rugged beauty of Scandinavia, we create jewelry where every line is a reflection of the Northern Lights.
                </p>
                <a href="{{ route('about') }}" class="text-[11px] uppercase tracking-[0.5em] font-bold border-b border-black pb-2 hover:text-[#B6965D] hover:border-[#B6965D] transition-all inline-block">READ IN FULL</a>
            </div>

            <div class="lg:w-2/3 flex gap-12 items-start" data-aos="fade-left">
                <div class="w-3/4 grayscale hover:grayscale-0 transition-all duration-1000 transform hover:-translate-y-4" style="filter: drop-shadow(0 40px 80px rgba(0,0,0,0.15));">
                    <img src="{{ asset('frontend/assets/brand-statement-1.webp') }}" class="w-full h-auto" alt="Packaging">
                </div>
                <div class="w-1/4 grayscale hover:grayscale-0 transition-all duration-1000 transform hover:-translate-y-8 mb-24" style="filter: drop-shadow(0 30px 60px rgba(0,0,0,0.1));">
                    <img src="{{ asset('frontend/assets/brand-statement-2.webp') }}" class="w-full h-auto" alt="Art Detail">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('styles')
<style>
    .font-playfair {
        font-family: 'Playfair Display', serif !important;
    }
    
    #hero-carousel-container::-webkit-scrollbar {
        display: none;
    }
    #hero-carousel-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .icon-main-img {
        transition: all 0.7s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
</style>
@endpush

@push('scripts')
<script>
    // ── Hero Carousel Logic ──
    let currentHeroIdx = 0;
    const heroContainer = document.getElementById('hero-carousel-container');
    const heroItemsCount = {{ count($heroProducts) }};
    
    function moveHeroCarousel(dir) {
        if (!heroContainer) return;
        currentHeroIdx = (currentHeroIdx + dir + heroItemsCount) % heroItemsCount;
        
        // Horizontal scroll animation
        const itemWidth = heroContainer.children[0].offsetWidth + 32; // item + gap
        heroContainer.style.transform = `translateX(-${currentHeroIdx * itemWidth}px)`;
    }

    // ── Internal Image Browsing (Match Home) ──
    function changeInternalImg(btn, direction, event) {
        event.stopPropagation();
        const container = btn.closest('.group\\/card');
        const img = container.querySelector('.icon-main-img');
        const images = JSON.parse(img.dataset.images);
        let current = parseInt(img.dataset.current);
        
        current = (current + direction + images.length) % images.length;
        
        img.style.opacity = '0';
        img.style.transform = 'scale(0.95)';
        setTimeout(() => {
            img.src = images[current];
            img.dataset.current = current;
            img.style.opacity = '1';
            img.style.transform = 'scale(1)';
        }, 300);
    }

    // Initialize Wishlist (Reuse home logic if needed, but assuming global scripts exist)
    document.addEventListener('DOMContentLoaded', () => {
        // Initial setup for hero buttons if any logic needed
    });
</script>
@endpush
