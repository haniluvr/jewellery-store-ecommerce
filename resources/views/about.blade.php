@extends('layouts.app')

@section('title', 'Éclore Journal - Our Heritage')

@section('content')
<style>
    .about-hero {
        min-height: 90vh;
        background-color: #1A1A1A;
        background-image: linear-gradient(rgba(26,26,26,0.6), rgba(26,26,26,0.6)), url('{{ asset("frontend/assets/about-hero.webp") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
    }

    .font-playfair { font-family: 'Playfair Display', serif; }
    .font-azeret { font-family: 'Azeret Mono', monospace; }
    
    .section-padding { padding: 8rem 1.5rem; }
    @media (min-width: 768px) { .section-padding { padding: 12rem 4rem; } }
    @media (min-width: 1024px) { .section-padding { padding: 15rem 6rem; } }

    .gold-text { color: #B6965D; }
    .gold-bg { background-color: #B6965D; }

    .line-accent {
        width: 60px;
        height: 1px;
        background: #B6965D;
        margin: 2.5rem 0;
    }

    /* Scroll indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 4rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        z-index: 20;
    }

    .scroll-line {
        width: 1px;
        height: 80px;
        background: linear-gradient(to bottom, transparent, white);
        animation: scrollLine 2.5s infinite ease-in-out;
    }

    @keyframes scrollLine {
        0% { transform: scaleY(0); transform-origin: top; }
        50% { transform: scaleY(1); transform-origin: top; }
        51% { transform: scaleY(1); transform-origin: bottom; }
        100% { transform: scaleY(0); transform-origin: bottom; }
    }

    .circular-text-wrapper {
        position: relative;
        width: 320px;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circular-text {
        position: absolute;
        width: 100%;
        height: 100%;
        animation: rotateText 25s linear infinite;
    }

    @keyframes rotateText {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .philosophies-grid div {
        border-right: 1px solid #F0F0F0;
        padding: 0 3rem;
    }

    .philosophies-grid div:last-child {
        border-right: none;
    }
</style>

<div class="about-wrapper bg-[#FAFAFA]">
    <!-- Hero Section -->
    <section class="about-hero" data-aos="fade">
        <div class="max-w-4xl px-4 relative z-10">
            <span class="font-azeret text-[10px] uppercase tracking-[0.6em] text-[#B6965D] mb-8 block transition-all" data-aos="fade-up" data-aos-delay="200">Our Heritage</span>
            <h1 class="hero-title text-6xl md:text-8xl lg:text-9xl font-playfair font-light mb-12 text-white leading-[1.1]" data-aos="fade-up" data-aos-delay="400">
                The Essence <br> of <span class="italic">Éclore</span>
            </h1>
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="600">
                <div class="w-px h-24 bg-[#B6965D]/50"></div>
            </div>
            <div class="scroll-indicator">
                <span class="font-azeret text-[9px] uppercase tracking-[0.4em] font-light text-white/40">Continuum</span>
                <div class="scroll-line"></div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="section-padding bg-white overflow-hidden border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-20 lg:gap-32">
                <div class="w-full lg:w-[55%]" data-aos="fade-right">
                    <span class="font-azeret text-[10px] gold-text uppercase tracking-[0.4em] font-bold mb-6 block">A Legacy of Lapidary Art</span>
                    <h2 class="text-5xl md:text-7xl font-playfair font-light mb-10 leading-[1.1] text-[#1A1A1A]">Beyond Time, <br> Within Reach</h2>
                    <div class="line-accent"></div>
                    <div class="text-gray-500 font-light leading-relaxed space-y-8 text-lg">
                        <p class="first-letter:text-5xl first-letter:font-playfair first-letter:mr-3 first-letter:float-left first-letter:text-[#B6965D]">
                            Founded on the principles of timeless structural beauty and unparalleled diamond craftsmanship, Éclore was born from a passion for the extraordinary. We believe that every gem carries a soul, a memory, and a promise of brilliance.
                        </p>
                        <p>
                            Our journey began in a moonlit atelier in Silang, where the sparkle of raw tourmaline and the rhythmic polish of the lapidary wheel sparked a vision: to create jewellery that doesn't just adorn the body, but narrates the unique legacy of the person it shines upon.
                        </p>
                        <p>
                            Today, Éclore stands as a bastion of luxury minimalism, where the "Art of Detail" is practiced in every facet of an emerald and every hand-poured setting of 18k gold. We bridge the gap between discerning collectors and the masters of Filipino jewellery design.
                        </p>
                    </div>
                </div>
                <div class="w-full lg:w-[45%] flex justify-center" data-aos="fade-left">
                    <div class="circular-text-wrapper scale-[120%] lg:scale-[180%]">
                        <svg class="circular-text" viewBox="0 0 100 100">
                            <path id="circlePath" d="M 50, 50 m -40, 0 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0" fill="transparent" />
                            <text class="font-azeret text-[3.2px] uppercase tracking-[0.5em] fill-[#B6965D] font-medium opacity-60">
                                <textPath xlink:href="#circlePath">
                                    Artisan Heritage • Rare Conflict-Free Gems • Éclore Excellence • Hand-Polished Gold • 
                                </textPath>
                            </text>
                        </svg>
                        <div class="w-24 h-24 flex items-center justify-center">
                             <img src="{{ asset('frontend/assets/favicon.png') }}" alt="Éclore" class="w-full h-full object-contain grayscale opacity-20">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Grid -->
    <section class="section-padding bg-[#FAFAFA]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 philosophies-grid">
                <div class="text-center md:text-left mb-16 md:mb-0" data-aos="fade-up">
                    <span class="font-azeret text-[10px] text-[#B6965D] mb-4 block tracking-[0.3em] uppercase">Ethos 01</span>
                    <h3 class="font-playfair text-3xl font-light mb-6 text-[#1A1A1A]">Integrity</h3>
                    <p class="text-gray-500 font-light text-base leading-relaxed">We source our gemstones with deep respect for the earth and the Kimberley Process, ensuring every stone is as ethical as it is profound.</p>
                </div>
                <div class="text-center md:text-left mb-16 md:mb-0" data-aos="fade-up" data-aos-delay="100">
                    <span class="font-azeret text-[10px] text-[#B6965D] mb-4 block tracking-[0.3em] uppercase">Ethos 02</span>
                    <h3 class="font-playfair text-3xl font-light mb-6 text-[#1A1A1A]">Excellence</h3>
                    <p class="text-gray-500 font-light text-base leading-relaxed">Our master jewelers blend traditional hand-forging with modern microscopic precision to achieve perfection in every setting.</p>
                </div>
                <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="200">
                    <span class="font-azeret text-[10px] text-[#B6965D] mb-4 block tracking-[0.3em] uppercase">Ethos 03</span>
                    <h3 class="font-playfair text-3xl font-light mb-6 text-[#1A1A1A]">Continuum</h3>
                    <p class="text-gray-500 font-light text-base leading-relaxed">Gems are the bridge between eras. We craft masterpieces intended to become family heirlooms, enduring through generations of legacy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Full Width Quote -->
    <section class="section-padding bg-white">
        <div class="max-w-4xl mx-auto text-center px-6">
            <div class="flex justify-center mb-12">
                <div class="w-12 h-12 bg-[#B6965D] rounded-full flex items-center justify-center opacity-10">
                    <i data-lucide="quote" class="w-6 h-6 text-black"></i>
                </div>
            </div>
            <h2 class="font-playfair text-4xl md:text-5xl font-light italic leading-relaxed text-[#1A1A1A]" data-aos="zoom-in">
                "Simplicity is the final layer of sophistication. In every Éclore creation, we find the silent balance between the monumental and the intimate."
            </h2>
            <div class="mt-12 flex items-center justify-center gap-4">
                <div class="w-8 h-px bg-gray-200"></div>
                <span class="font-azeret text-[10px] uppercase tracking-[0.5em] text-[#B6965D]">The Éclore Philosopher</span>
                <div class="w-8 h-px bg-gray-200"></div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-32 bg-[#1A1A1A] text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_#B6965D_0%,_transparent_70%)]"></div>
        </div>
        <div class="max-w-3xl mx-auto px-6 relative z-10" data-aos="fade-up">
            <h2 class="font-playfair text-5xl md:text-6xl font-light mb-10 leading-tight">Begin Your <br> Own Legacy</h2>
            <p class="text-white/40 mb-16 max-w-lg mx-auto font-azeret text-[11px] tracking-widest leading-relaxed uppercase">
                Explore our curated collection of artisanal masterpieces, each waiting to anchor your narrative.
            </p>
            <a href="{{ route('catalogue') }}" class="group relative inline-flex items-center overflow-hidden border border-[#B6965D] px-16 py-5">
                <span class="font-azeret text-[10px] uppercase tracking-[0.4em] relative z-10 text-[#B6965D] group-hover:text-white transition-colors duration-500">Shop Collection</span>
                <div class="absolute inset-x-0 bottom-0 h-0 bg-[#B6965D] transition-all duration-500 group-hover:h-full"></div>
            </a>
        </div>
    </section>
</div>
@endsection
@endsection
