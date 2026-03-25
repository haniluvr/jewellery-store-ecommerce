@extends('layouts.app')

@section('title', 'Éclore Journal - ' . ($currentCategory ?? 'The Latest Stories'))

@section('content')
<main class="pt-24 min-h-screen bg-white">
    <!-- Breadcrumbs/Sub-nav -->
    <nav class="sticky top-16 z-40 bg-white/95 backdrop-blur-md border-b border-gray-50 py-4 shadow-sm mx-[15%]">
        <div class="max-w-[1400px] mx-auto px-4 md:px-12 flex items-center justify-between overflow-x-auto whitespace-nowrap scrollbar-hide">
            <div class="flex space-x-12 text-[9px] uppercase tracking-[0.3em] font-medium text-gray-500">
                <a href="{{ route('newsroom', ['category' => 'Latest']) }}" class="{{ $currentCategory === 'Latest' ? 'text-black' : 'hover:text-black' }} transition-colors">Latest</a>
                <a href="{{ route('newsroom', ['category' => 'Press Releases']) }}" class="{{ $currentCategory === 'Press Releases' ? 'text-black' : 'hover:text-black' }} transition-colors">Press Releases</a>
                <a href="{{ route('newsroom', ['category' => 'Exhibitions']) }}" class="{{ $currentCategory === 'Exhibitions' ? 'text-black' : 'hover:text-black' }} transition-colors">Exhibitions</a>
                <a href="{{ route('newsroom', ['category' => 'Insights']) }}" class="{{ $currentCategory === 'Insights' ? 'text-black' : 'hover:text-black' }} transition-colors">Insights</a>
            </div>
            <div class="hidden md:block">
                <span class="text-[9px] uppercase tracking-[0.2em] italic font-playfair text-gray-400">Éclore Editorial Journal</span>
            </div>
        </div>
    </nav>

    <!-- Magazine Feature Section -->
    <section class="max-w-[1400px] mx-auto px-4 md:px-12 py-16">
        <div class="flex flex-col xl:flex-row gap-16">
            @if($featuredStory)
            <!-- Main Story (Featured) -->
            <article class="xl:w-8/12 group" data-aos="fade-up">
                <div class="relative w-full aspect-[21/10] overflow-hidden bg-gray-100 mb-10 shadow-2xl">
                    <img src="{{ asset('frontend/assets/' . ($featuredStory->featured_image ?: 'necklace.webp')) }}" alt="{{ $featuredStory->title }}" class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-110">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <span class="bg-[#B6965D] text-white text-[8px] uppercase tracking-[0.4em] px-4 py-1 font-bold">{{ $featuredStory->category }}</span>
                    </div>
                </div>
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-7xl font-playfair font-light text-gray-900 leading-[1.1] mb-8">{{ $featuredStory->title }}</h1>
                    <div class="flex items-center space-x-6 mb-8 border-y border-gray-100 py-6">
                        <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('frontend/assets/user-placeholder.webp') }}" class="w-full h-full object-cover" alt="Author">
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase font-bold text-gray-900">Julianne de Mornay</span>
                            <span class="text-[9px] text-gray-400">Global Artistic Director • {{ $featuredStory->published_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <p class="text-gray-600 font-light leading-relaxed text-lg mb-10">
                        {{ $featuredStory->excerpt }}
                    </p>
                    <a href="{{ url($featuredStory->slug) }}" class="inline-flex items-center group">
                        <span class="text-[11px] uppercase tracking-[0.3em] font-medium text-gray-900">Read Entire Story</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-3 translate-x-0 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
            @endif

            <!-- Sidebar: Recent Highlights -->
            <aside class="xl:w-4/12" data-aos="fade-left" data-aos-delay="200">
                <div class="sticky top-32">
                    <h3 class="text-[11px] uppercase tracking-[0.4em] text-gray-400 mb-10 border-b border-gray-100 pb-4">Latest Highlights</h3>
                    <div class="space-y-12">
                        @forelse($highlights as $highlight)
                        <!-- Brief -->
                        <a href="{{ url($highlight->slug) }}" class="flex gap-6 group cursor-pointer">
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden bg-gray-50">
                                <img src="{{ asset('frontend/assets/' . ($highlight->featured_image ?: 'ring.webp')) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" alt="{{ $highlight->title }}">
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 mb-2 leading-snug group-hover:text-[#B6965D] transition-colors line-clamp-2">{{ $highlight->title }}</h4>
                                <span class="text-[9px] uppercase tracking-[0.2em] text-gray-400">{{ $highlight->category }} • {{ $highlight->published_at->format('d M') }}</span>
                            </div>
                        </a>
                        @empty
                        <p class="text-[10px] text-gray-400 italic">No news highlights available.</p>
                        @endforelse
                    </div>

                    <!-- Newsletter Sign Up Mini -->
                    <div class="mt-16 bg-[#fafafa] p-8 border border-gray-100">
                        <h5 class="text-xs uppercase tracking-[0.3em] font-medium mb-4">Éclore Newsletters</h5>
                        <p class="text-[10px] text-gray-400 leading-relaxed mb-6">Receive the latest news, collection launches and exhibition announcements from the world of Éclore.</p>
                        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex border-b border-gray-900 pb-1">
                            @csrf
                            <input type="email" name="email" placeholder="Your Address" class="bg-transparent border-none outline-none text-[10px] uppercase w-full" required>
                            <button type="submit" class="ml-2 text-[10px] uppercase tracking-widest font-bold">Join</button>
                        </form>
                        @if(session('success'))
                            <p class="mt-2 text-[8px] tracking-widest text-[#C5B391] uppercase">{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- Secondary Story Feed: Magazine Layout -->
    <section class="bg-[#fafafa] py-32 mt-16">
        <div class="max-w-[1400px] mx-auto px-4 md:px-12">
            <h2 class="text-[12px] uppercase tracking-[0.5em] text-gray-400 mb-20 text-center">In Depth</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                @forelse($stories as $index => $story)
                <!-- Card -->
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <a href="{{ url($story->slug) }}">
                        <div class="aspect-[16/10] overflow-hidden mb-8 shadow-sm">
                            <img src="{{ asset('frontend/assets/' . ($story->featured_image ?: 'bracelet.webp')) }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="{{ $story->title }}">
                        </div>
                        <div>
                            <span class="text-[9px] uppercase tracking-[0.3em] text-[#B6965D] mb-4 block">{{ $story->category }}</span>
                            <h3 class="text-2xl font-playfair font-light mb-4">{{ $story->title }}</h3>
                            <p class="text-xs text-gray-500 leading-relaxed mb-6 font-light line-clamp-3">{{ $story->excerpt }}</p>
                            <span class="text-[9px] flex items-center group-hover:text-[#B6965D] transition-colors">CONTINUE READING <i data-lucide="chevron-right" class="w-3 h-3 ml-2"></i></span>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-gray-400 font-light">No additional stories found for this category.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($stories->hasPages())
            <div class="mt-32 flex justify-center items-center">
                {{ $stories->links('pagination::simple-tailwind-newsroom') }}
            </div>
            @endif
        </div>
    </section>
</main>
@endsection
