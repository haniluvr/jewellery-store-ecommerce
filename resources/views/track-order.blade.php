@extends('layouts.app')

@section('title', 'Track Your Order — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        background: #fbfbfb;
        padding: 12rem 0 8rem 0;
        border-bottom: 1px solid #eee;
    }
    .track-section {
        padding: 8rem 0;
    }
    .track-form-container {
        max-width: 600px;
        margin: auto;
        padding: 4rem;
        border: 1px solid #f9f9f9;
        background: #fff;
    }
    .track-input {
        width: 100%;
        border-bottom: 2px solid #eee;
        padding: 1.5rem 0;
        margin-bottom: 3rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.2rem;
        text-transform: uppercase;
        outline: none;
        transition: border-color 0.3s ease;
    }
    .track-input:focus {
        border-color: #C5B391;
    }
    .track-label {
        font-family: 'Azeret Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.4rem;
        color: #999;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero text-center px-6">
        <nav class="mb-12" data-aos="fade-down">
            <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Client Services — Tracking</span>
        </nav>
        <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Acquisition Status</h1>
        <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
            Trace the journey of your Éclore piece from our atelier to your doorstep.
        </p>
    </header>

    <section class="track-section bg-white px-6">
        <div class="container mx-auto">
            <div class="track-form-container" data-aos="fade-up">
                <form action="#" method="GET">
                    <div class="mb-12">
                        <label class="track-label block mb-2">Order Identification</label>
                        <input type="text" placeholder="ECO-XXXXX" class="track-input">
                    </div>
                    <div class="mb-12">
                        <label class="track-label block mb-2">Acquisition Email</label>
                        <input type="email" placeholder="YOUR@EMAIL.COM" class="track-input">
                    </div>
                    <button type="submit" class="w-full bg-black text-white px-12 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#C5B391] transition-all">
                        LOCATE ACQUISITION
                    </button>
                </form>
            </div>

            <div class="text-center mt-20" data-aos="fade-up">
                <p class="font-azeret text-[10px] tracking-widest text-gray-400 uppercase leading-loose">
                    Need assistance with tracking? Our concierge is available at hello@eclorejewellery.shop.
                </p>
            </div>
        </div>
    </section>
</main>
@endsection
