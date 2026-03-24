@extends('layouts.app')

@section('title', 'Help & Client Services — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        background: #fbfbfb;
        padding: 12rem 0 8rem 0;
        border-bottom: 1px solid #eee;
    }
    .help-section {
        padding: 8rem 0;
    }
    .help-card {
        background: #fff;
        padding: 4rem;
        border: 1px solid #f0f0f0;
        height: 100%;
        transition: all 0.5s ease;
    }
    .help-card:hover {
        border-color: #C5B391;
    }
    .faq-heading {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 4rem;
        text-align: center;
    }
    .faq-item {
        margin-bottom: 3rem;
        border-bottom: 1px solid #f9f9f9;
        padding-bottom: 3rem;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero">
        <div class="container mx-auto px-6 text-center">
            <nav class="mb-12" data-aos="fade-down">
                <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Client Services — Help</span>
            </nav>
            <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Help & Concierge</h1>
            <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
                A dedicated space for our clients to find guidance on acquisitions, ownership, and Maison services.
            </p>
        </div>
    </header>

    <!-- Support Grid -->
    <section class="help-section bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-40">
                <div class="help-card" data-aos="fade-up" data-aos-delay="0">
                    <h3 class="font-playfair text-2xl mb-6">Inquiries</h3>
                    <p class="font-azeret text-[10px] tracking-widest text-gray-500 uppercase leading-loose mb-10">
                        General questions on our collections, bespoke services, and Maison heritage.
                    </p>
                    <a href="{{ route('contact') }}" class="font-azeret text-[10px] tracking-[0.4em] text-black border-b border-black pb-1 hover:text-[#C5B391] hover:border-[#C5B391] transition-all">MESSAGE US</a>
                </div>
                <div class="help-card" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="font-playfair text-2xl mb-6">Orders</h3>
                    <p class="font-azeret text-[10px] tracking-widest text-gray-500 uppercase leading-loose mb-10">
                        Tracking requests, payment clarification, and luxury shipping arrangements.
                    </p>
                    <a href="{{ route('orders-payments') }}" class="font-azeret text-[10px] tracking-[0.4em] text-black border-b border-black pb-1 hover:text-[#C5B391] hover:border-[#C5B391] transition-all">VIEW POLICIES</a>
                </div>
                <div class="help-card" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="font-playfair text-2xl mb-6">Care</h3>
                    <p class="font-azeret text-[10px] tracking-widest text-gray-500 uppercase leading-loose mb-10">
                        Guidance on maintaining the brilliance of your Éclore pieces over lifetimes.
                    </p>
                    <a href="#" class="font-azeret text-[10px] tracking-[0.4em] text-black border-b border-black pb-1 hover:text-[#C5B391] hover:border-[#C5B391] transition-all">READ GUIDE</a>
                </div>
                <div class="help-card" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="font-playfair text-2xl mb-6">Appointments</h3>
                    <p class="font-azeret text-[10px] tracking-widest text-gray-500 uppercase leading-loose mb-10">
                        Schedule a private viewing at one of our global flagship boutiques.
                    </p>
                    <a href="#" class="font-azeret text-[10px] tracking-[0.4em] text-black border-b border-black pb-1 hover:text-[#C5B391] hover:border-[#C5B391] transition-all">BOOK NOW</a>
                </div>
            </div>

            <!-- FAQ Sections -->
            <div class="max-w-4xl mx-auto border-t border-gray-100 pt-32">
                <h2 class="faq-heading">Frequently Asked Inquiries</h2>
                
                <div class="faq-item" data-aos="fade-up">
                    <h4 class="font-playfair text-xl mb-4 text-gray-900">How do I track my acquisition?</h4>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        Once your order is dispatched, you will receive a confirmation email containing your tracking information. You may also track your order via the link in our footer.
                    </p>
                </div>

                <div class="faq-item" data-aos="fade-up">
                    <h4 class="font-playfair text-xl mb-4 text-gray-900">What is the Éclore guarantee?</h4>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        Every masterpiece is accompanied by a Certificate of Authenticity and a lifetime limited warranty on craftsmanship.
                    </p>
                </div>

                <div class="faq-item" data-aos="fade-up">
                    <h4 class="font-playfair text-xl mb-4 text-gray-900">Do you offer bespoke design?</h4>
                    <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                        Yes, our Private Eye service offers bespoke design for those seeking singular, one-of-a-kind expressions of luxury. Please contact our concierge to begin.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
