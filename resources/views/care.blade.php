@extends('layouts.app')

@section('title', 'Jewellery Care & Maintenance — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        background: #000;
    }
    .hero-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.7;
    }
    .hero-content {
        position: relative;
        z-index: 10;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 1.5rem;
    }
    .care-section {
        padding: 10rem 0;
        background: #fff;
    }
    .care-grid {
        display: grid;
        grid-template-cols: 1fr;
        gap: 8rem;
    }
    @media (min-width: 1024px) {
        .care-grid {
            grid-template-cols: 1fr 1fr;
        }
    }
    .care-card {
        padding: 4rem;
        background: #fbfbfb;
        border: 1px solid #f0f0f0;
        transition: all 0.5s ease;
    }
    .care-card:hover {
        background: #fff;
        border-color: #C5B391;
        transform: translateY(-5px);
    }
    .process-number {
        font-family: 'Azeret Mono', monospace;
        font-size: 0.75rem;
        color: #C5B391;
        margin-bottom: 2rem;
        display: block;
        letter-spacing: 0.3em;
    }
    .care-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 2rem;
        color: #111;
    }
    .care-text {
        font-family: 'Azeret Mono', monospace;
        font-size: 11px;
        line-height: 2;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero Section -->
    <header class="editorial-hero">
        <img src="{{ asset('frontend/assets/care_hero_cleaning.png') }}" class="hero-image" alt="Jewellery Care">
        <div class="hero-content" data-aos="fade-in">
            <nav class="mb-12">
                <span class="font-azeret text-[10px] tracking-[0.4em] text-white/60 uppercase">Maison Services — Maintenance</span>
            </nav>
            <h1 class="font-playfair text-6xl md:text-9xl text-white mb-8 tracking-tight">Preserving Brilliance</h1>
            <p class="font-azeret text-xs tracking-[0.3em] text-white/80 uppercase max-w-2xl leading-loose">
                A guide to the enduring beauty of your Éclore masterpieces.
            </p>
        </div>
    </header>

    <!-- Content Sections -->
    <section class="care-section px-6">
        <div class="container mx-auto max-w-7xl">
            <div class="care-grid">
                <!-- Daily Precautions -->
                <div class="care-card" data-aos="fade-up">
                    <span class="process-number">01 / PRECAUTIONS</span>
                    <h2 class="care-title">Daily Rituals</h2>
                    <p class="care-text">
                        Jewellery should be the last thing you put on in the morning and the first thing you take off at night. Avoid contact with perfumes, lotions, and household chemicals which may dull the surface of gold and gemstones.
                    </p>
                </div>

                <!-- Cleaning -->
                <div class="care-card" data-aos="fade-up" data-aos-delay="100">
                    <span class="process-number">02 / CLEANSING</span>
                    <h2 class="care-title">Gentle Purification</h2>
                    <p class="care-text">
                        For diamonds and gold, a solution of warm water and mild soap with a soft-bristled brush is recommended. For delicate gems like opals and pearls, use only a damp, lint-free cloth.
                    </p>
                </div>

                <!-- Storage -->
                <div class="care-card" data-aos="fade-up">
                    <span class="process-number">03 / SANCTUARY</span>
                    <h2 class="care-title">Atmospheric Storage</h2>
                    <p class="care-text">
                        Store your pieces in their original silk-lined Éclore boxes or a fabric-lined jewellery case. Ensure pieces do not touch each other to prevent scratches, as diamonds are capable of scratching all other materials.
                    </p>
                </div>

                <!-- Professional Service -->
                <div class="care-card" data-aos="fade-up" data-aos-delay="100">
                    <span class="process-number">04 / EXPERTISE</span>
                    <h2 class="care-title">Professional Care</h2>
                    <p class="care-text">
                        We recommend an annual professional check-up at our atelier. Our master artisans will inspect the settings, prongs, and clasps to ensure the security and integrity of your acquisition.
                    </p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-40 text-center" data-aos="fade-up">
                <h3 class="font-playfair text-4xl mb-12 italic">Require assistance from our artisans?</h3>
                <div class="flex flex-col md:flex-row justify-center gap-8">
                    <a href="{{ route('boutiques') }}" class="bg-black text-white px-12 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#C5B391] transition-all">BOOK SERVICE APPOINTMENT</a>
                    <a href="{{ route('contact') }}" class="border border-black text-black px-12 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-black hover:text-white transition-all">CONSULT CONCIERGE</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
