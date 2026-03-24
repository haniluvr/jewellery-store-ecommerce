@extends('layouts.app')

@section('title', 'Corporate Responsibility — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        background: #fbfbfb;
        padding: 12rem 0 8rem 0;
        border-bottom: 1px solid #eee;
    }
    .content-section {
        padding: 8rem 0;
    }
    .responsibility-card {
        background: #fff;
        padding: 4rem;
        border: 1px solid #f0f0f0;
        height: 100%;
        transition: all 0.5s ease;
    }
    .responsibility-card:hover {
        border-color: #C5B391;
        transform: translateY(-5px);
    }
    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        color: #C5B391;
        line-height: 1;
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero">
        <div class="container mx-auto px-6 text-center">
            <nav class="mb-12" data-aos="fade-down">
                <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Our Maison — Commitment</span>
            </nav>
            <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Corporate Responsibility</h1>
            <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
                Defining luxury through ethical craftsmanship, sustainable sourcing, and a legacy of social integrity.
            </p>
        </div>
    </header>

    <!-- Core Pillars -->
    <section class="content-section bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="responsibility-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-number">01</div>
                    <h3 class="font-playfair text-3xl mb-6">Ethical Sourcing</h3>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        We partner exclusively with RJC-certified suppliers, ensuring every gemstone and gram of gold is traced from origin to atelier with complete transparency.
                    </p>
                </div>
                <div class="responsibility-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number">02</div>
                    <h3 class="font-playfair text-3xl mb-6">Sustainable Craft</h3>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        Our ateliers utilize circular waste management and rely on renewable energy sources, minimizing our carbon footprint while maximizing artistic excellence.
                    </p>
                </div>
                <div class="responsibility-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number">03</div>
                    <h3 class="font-playfair text-3xl mb-6">Social Legacy</h3>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        Investing in the next generation of artisans through our apprenticeship programs and local community development initiatives across our global supply chain.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="py-32 bg-[#FAF9F6] border-y border-gray-100">
        <div class="container mx-auto px-6 text-center max-w-4xl">
            <p class="font-playfair text-3xl md:text-5xl italic text-gray-800 leading-tight mb-12">
                "True luxury cannot exist without conscience. At Éclore, our responsibility is to ensure the beauty we create today does not come at the cost of tomorrow."
            </p>
            <p class="font-azeret text-[10px] tracking-[0.4em] text-[#C5B391] uppercase">— Board of Sustainability, Éclore</p>
        </div>
    </section>

    <!-- Certification Banner -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-around items-center opacity-40">
                <span class="font-playfair text-2xl">RJC Certified</span>
                <span class="font-playfair text-2xl">Ethically Sourced</span>
                <span class="font-playfair text-2xl">Conflict Free</span>
                <span class="font-playfair text-2xl">Recycled Gold</span>
            </div>
        </div>
    </section>
</main>
@endsection
