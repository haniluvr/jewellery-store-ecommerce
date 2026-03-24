@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title . ' | Éclore Journal')

@section('meta')
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif
    <meta property="og:title" content="{{ $page->meta_title ?: $page->title }}">
    <meta property="og:description" content="{{ $page->excerpt ?: Str::limit(strip_tags($page->content), 160) }}">
    @if($page->featured_image)
        <meta property="og:image" content="{{ asset('frontend/assets/'. $page->featured_image) }}">
    @endif
@endsection

@section('content')
<main class="bg-white min-h-screen">
    @if($page->type === 'news')
    <!-- Editorial Sub-nav -->
    <nav class="mt-20 z-40 bg-white/95 backdrop-blur-md border-b border-gray-50 py-4 shadow-sm mx-[15%]">
        <div class="max-w-[1400px] mx-auto px-4 md:px-12 flex items-center justify-between overflow-x-auto whitespace-nowrap scrollbar-hide">
            <div class="flex space-x-12 text-[9px] uppercase tracking-[0.3em] font-medium text-gray-500">
                <a href="{{ route('newsroom', ['category' => 'Latest']) }}" class="hover:text-black transition-colors">Latest</a>
                <a href="{{ route('newsroom', ['category' => 'Press Releases']) }}" class="{{ $page->category === 'Press Releases' ? 'text-black' : 'hover:text-black' }} transition-colors">Press Releases</a>
                <a href="{{ route('newsroom', ['category' => 'Exhibitions']) }}" class="{{ $page->category === 'Exhibitions' ? 'text-black' : 'hover:text-black' }} transition-colors">Exhibitions</a>
                <a href="{{ route('newsroom', ['category' => 'Insights']) }}" class="{{ $page->category === 'Insights' ? 'text-black' : 'hover:text-black' }} transition-colors">Insights</a>
            </div>
            <div class="hidden md:block">
                <span class="text-[9px] uppercase tracking-[0.2em] italic font-playfair text-gray-400">Éclore Editorial Journal</span>
            </div>
        </div>
    </nav>
    @endif

    <!-- Article Hero -->
    <header class="relative pt-24 pb-16 px-4 md:px-12 max-w-[1400px] mx-auto overflow-hidden">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto" data-aos="fade-up">
            @if($page->category)
                <span class="inline-block bg-[#B6965D]/10 text-[#B6965D] text-[10px] uppercase tracking-[0.4em] font-bold px-6 py-2 mb-8 rounded-full">{{ $page->category }}</span>
            @endif
            
            <h1 class="text-4xl md:text-7xl font-playfair font-light text-gray-900 leading-[1.1] mb-10">{{ $page->title }}</h1>
            
            @if($page->excerpt)
                <p class="text-xl md:text-2xl text-gray-500 font-light leading-relaxed mb-12 max-w-3xl italic">
                    "{{ $page->excerpt }}"
                </p>
            @endif

            <div class="flex items-center space-x-6 pb-12 border-b border-gray-100 w-full justify-center">
                <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-100">
                    <img src="{{ asset('frontend/assets/user-placeholder.webp') }}" class="w-full h-full object-cover" alt="Author">
                </div>
                <div class="flex flex-col items-start text-left">
                    <span class="text-[11px] uppercase font-bold text-gray-900 tracking-wider">Julianne de Mornay</span>
                    <div class="flex items-center space-x-3 text-[10px] text-gray-400 font-medium">
                        <span>{{ $page->published_at ? $page->published_at->format('M d, Y') : $page->created_at->format('M d, Y') }}</span>
                        <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                        <span>{{ ceil(str_word_count(strip_tags($page->content)) / 200) }} MIN READ</span>
                    </div>
                </div>
            </div>
        </div>

        @if($page->featured_image)
            <div class="mt-16 relative w-full aspect-[21/9] overflow-hidden shadow-2xl group" data-aos="zoom-out">
                <img src="{{ asset('frontend/assets/' . $page->featured_image) }}" 
                     alt="{{ $page->title }}" 
                     class="w-full h-full object-cover transition-transform duration-[4000ms] group-hover:scale-105">
                <div class="absolute inset-0 bg-black/5"></div>
            </div>
        @endif
    </header>

    <!-- Article Body -->
    <div class="max-w-[1400px] mx-auto px-4 md:px-12 pb-32">
        <div class="flex flex-col lg:flex-row gap-20">
            
            <!-- Left: Floating Share Tools -->
            <aside class="hidden lg:block w-16" data-aos="fade-right" data-aos-delay="400">
                <div class="sticky top-40 flex flex-col items-center space-y-8">
                    <span class="text-[9px] uppercase tracking-[0.3em] text-gray-400 transform -rotate-90 origin-center mb-8">Share</span>
                    <a href="#" class="p-3 bg-gray-50 rounded-full hover:bg-[#B6965D] hover:text-white transition-all text-gray-400">
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="p-3 bg-gray-50 rounded-full hover:bg-[#B6965D] hover:text-white transition-all text-gray-400">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="p-3 bg-gray-50 rounded-full hover:bg-[#B6965D] hover:text-white transition-all text-gray-400">
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </a>
                </div>
            </aside>

            <!-- Center: The Content -->
            <article class="flex-1 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="prose prose-lg prose-slate prose-headings:font-playfair prose-headings:font-light prose-h2:text-4xl prose-h2:mt-16 prose-h2:mb-8 prose-p:text-gray-600 prose-p:leading-[1.8] prose-p:mb-10 prose-img:shadow-xl prose-img:mx-auto prose-blockquote:font-playfair prose-blockquote:italic prose-blockquote:text-3xl prose-blockquote:border-l-4 prose-blockquote:border-[#B6965D] prose-blockquote:pl-8 prose-blockquote:py-4 prose-a:text-[#B6965D] hover:prose-a:underline">
                    {!! $page->content !!}
                </div>

                <!-- Article Bottom Meta -->
                <div class="mt-20 pt-10 border-t border-gray-100 flex flex-wrap items-center justify-between gap-8">
                    <div class="flex items-center space-x-4">
                        @foreach(explode(',', $page->meta_keywords) as $tag)
                            @if(trim($tag))
                                <span class="text-[10px] uppercase tracking-widest text-gray-400 bg-gray-50 px-4 py-1">#{{ trim($tag) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </article>

            <!-- Right: Content Navigation (ToC) -->
            <aside class="hidden xl:block w-64" data-aos="fade-left" data-aos-delay="400">
                <div class="sticky top-40 border-l border-gray-100 pl-10">
                    <h4 class="text-[10px] uppercase tracking-[0.4em] text-gray-900 font-bold mb-8 italic font-playfair">Chapters</h4>
                    <div id="content-toc" class="space-y-6">
                        @php
                            libxml_use_internal_errors(true);
                            $dom = new DOMDocument();
                            $htmlContent = mb_convert_encoding($page->content, 'HTML-ENTITIES', 'UTF-8');
                            @$dom->loadHTML($htmlContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                            $xpath = new DOMXPath($dom);
                            $headings = $xpath->query('//h2');
                            libxml_clear_errors();
                        @endphp

                        @foreach($headings as $index => $heading)
                            @php 
                                $hId = 'section-' . ($index + 1);
                            @endphp
                            <a href="#{{ $hId }}" class="toc-link block text-[10px] uppercase tracking-[0.2em] text-gray-400 hover:text-[#B6965D] transition-all group relative pl-0">
                                <span class="toc-line absolute left-0 top-1/2 -translate-y-1/2 w-0 h-px bg-[#B6965D] transition-all duration-300"></span>
                                <span class="toc-text transition-all duration-300 group-hover:pl-8">{{ $heading->textContent }}</span>
                            </a>
                        @endforeach
                        
                        @if($headings->length === 0)
                            <p class="text-[9px] text-gray-300 italic">No bookmarks for this story.</p>
                        @endif
                    </div>

                    <!-- Newsletter Mini -->
                    <div class="mt-20 bg-black p-8 text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <h5 class="text-[11px] uppercase tracking-widest font-bold mb-4 font-playfair italic underline decor-[#B6965D]">Inner Circle</h5>
                            <p class="text-[10px] text-gray-400 mb-6 leading-relaxed">Join for exclusive access to collection premieres.</p>
                            <a href="#" class="text-[9px] uppercase tracking-[0.3em] font-bold border-b border-white pb-1 hover:text-[#B6965D] hover:border-[#B6965D] transition-colors">Apply Now</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    @if($relatedArticles->count() > 0)
    <!-- Related Articles Section -->
    <section class="bg-gray-50 py-32">
        <div class="max-w-[1400px] mx-auto px-4 md:px-12">
            <h2 class="text-[12px] uppercase tracking-[0.5em] text-gray-400 mb-20 text-center font-playfair italic">Deepen Your Journey</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach($relatedArticles as $article)
                <div class="group cursor-pointer">
                    <a href="{{ url($article->slug) }}">
                        <div class="aspect-[16/10] overflow-hidden mb-8 shadow-sm relative">
                            <img src="{{ asset('frontend/assets/' . ($article->featured_image ?: 'necklace.webp')) }}" class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-110" alt="{{ $article->title }}">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-[#B6965D] mb-4 block">{{ $article->category }}</span>
                        <h3 class="text-2xl font-playfair font-light mb-4 text-gray-900 group-hover:text-[#B6965D] transition-colors">{{ $article->title }}</h3>
                        <p class="text-[11px] text-gray-500 leading-relaxed mb-6 font-light line-clamp-2">{{ $article->excerpt }}</p>
                        <span class="text-[9px] uppercase tracking-[0.2em] font-bold flex items-center group-hover:translate-x-2 transition-transform duration-300">EXPLORE STORY <i data-lucide="chevron-right" class="w-3 h-3 ml-2"></i></span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</main>

@push('styles')
<style>
    /* Content Headings Inject IDs */
    .prose h2 {
        scroll-margin-top: 150px;
    }
    
    .toc-link.active .toc-text {
        color: #B6965D;
        padding-left: 2rem;
    }
    
    .toc-link.active .toc-line {
        width: 1.5rem;
    }

    body {
        background-color: #fff !important;
    }

    /* Custom prose enhancements */
    .prose blockquote p:first-of-type::before, 
    .prose blockquote p:first-of-type::after {
        content: "";
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Automatically add IDs to headings if they don't have them
        const contentArea = document.querySelector('.prose');
        if (contentArea) {
            const h2s = contentArea.querySelectorAll('h2');
            h2s.forEach((h2, index) => {
                if (!h2.id) {
                    h2.id = 'section-' + (index + 1);
                }
            });
        }

        // ToC Active State Logic
        const sections = document.querySelectorAll('.prose h2');
        const tocLinks = document.querySelectorAll('.toc-link');

        function updateToC() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            tocLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', updateToC);
        updateToC();
    });
</script>
@endpush
@endsection
