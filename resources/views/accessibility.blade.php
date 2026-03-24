@extends('layouts.app')

@section('title', 'Accessibility — Éclore Maison')

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
    .policy-item {
        margin-bottom: 4rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    .policy-item h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: #1a1a1a;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero text-center px-6">
        <nav class="mb-12" data-aos="fade-down">
            <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Our Commitment — Accessibility</span>
        </nav>
        <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Accessibility Statement</h1>
        <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
            Éclore is dedicated to ensuring beauty is accessible to all, through inclusive digital experiences and boutique design.
        </p>
    </header>

    <section class="content-section bg-white">
        <div class="container mx-auto px-6">
            <div class="policy-item" data-aos="fade-up">
                <h2>Our Vision</h2>
                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                    We believe every individual deserves an effortless experience within our Maison. Whether you are navigating our digital corridors or visiting an Éclore flagship, we strive to remove barriers through innovation and empathetic design.
                </p>
            </div>

            <div class="policy-item" data-aos="fade-up">
                <h2>Digital Standards</h2>
                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                    Our web experience is built to comply with WCAG 2.1 Level AA standards. We continuously refine our interface for screen readers, keyboard navigation, and visual contrast to ensure the essence of Éclore reaches everyone.
                </p>
            </div>

            <div class="policy-item" data-aos="fade-up">
                <h2>Boutique Access</h2>
                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                    Our physical flagships are designed with barrier-free entries and intuitive wayfinding. Private viewing suites are fully accessible and prepared to welcome all guests personally.
                </p>
            </div>

            <div class="policy-item" data-aos="fade-up">
                <h2>Concierge Assistance</h2>
                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                    Should you encounter any difficulty navigating our services, our dedicated concierge team is available to provide personal assistance via hello@eclorejewellery.shop. We are here to ensure your journey with us is one of complete clarity.
                </p>
            </div>
        </div>
    </section>
</main>
@endsection
