@extends('layouts.app')

@section('title', 'Orders & Payments — Éclore Maison')

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
    .payment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 3rem;
        margin: 4rem 0;
    }
    .payment-card {
        background: #fff;
        padding: 3rem;
        border: 1px solid #f9f9f9;
        transition: all 0.3s ease;
    }
    .payment-card:hover {
        border-color: #eee;
    }
    .payment-card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero text-center px-6">
        <nav class="mb-12" data-aos="fade-down">
            <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Client Services — Guidance</span>
        </nav>
        <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Orders & Payments</h1>
        <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
            A guide to safe acquisitions and the white-glove delivery experience at Éclore.
        </p>
    </header>

    <section class="content-section bg-white px-6">
        <div class="container mx-auto">
            <!-- Ordering Process -->
            <div class="max-w-4xl mx-auto mb-32" data-aos="fade-up">
                <h2 class="font-playfair text-4xl mb-12 border-b border-gray-100 pb-8">Securing Your Masterpiece</h2>
                <div class="space-y-12">
                    <div>
                        <h4 class="font-azeret text-[10px] tracking-[0.4em] text-[#C5B391] uppercase mb-4">Phase I: Confirmation</h4>
                        <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                            Upon placing your order, you will receive a digital receipt. Each piece is meticulously inspected at our central atelier before dispatch. This signature process ensures the Éclore standard is upheld for every acquisition.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="max-w-4xl mx-auto mb-32">
                <h2 class="font-playfair text-4xl mb-12 border-b border-gray-100 pb-8" data-aos="fade-up">Methods of Payment</h2>
                <div class="payment-grid">
                    <div class="payment-card" data-aos="fade-up" data-aos-delay="0">
                        <h3>Cards</h3>
                        <p class="font-azeret text-[10px] tracking-widest text-gray-400 uppercase leading-loose">
                            We accept Visa, Mastercard, and American Express. All transactions are encrypted with the highest bank-grade security protocols.
                        </p>
                    </div>
                    <div class="payment-card" data-aos="fade-up" data-aos-delay="100">
                        <h3>Digital</h3>
                        <p class="font-azeret text-[10px] tracking-widest text-gray-400 uppercase leading-loose">
                            Seamless acquisitions via Apple Pay and Google Pay are available on our mobile corridors.
                        </p>
                    </div>
                    <div class="payment-card" data-aos="fade-up" data-aos-delay="200">
                        <h3>Transfers</h3>
                        <p class="font-azeret text-[10px] tracking-widest text-gray-400 uppercase leading-loose">
                            For High Jewellery acquisitions exceeding $10,000, secure bank wire transfers can be arranged through our concierge.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Delivery -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up">
                <h2 class="font-playfair text-4xl mb-12 border-b border-gray-100 pb-8">Luxury Fulfillment</h2>
                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest mb-12">
                   Every Éclore piece is shipped via insured white-glove couriers. Complimentary shipping is extended to all acquisitions globally. Signature on delivery is mandatory to ensure the safe passage of your heirloom.
                </p>
                <a href="{{ route('track-order') }}" class="inline-block bg-black text-white px-12 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#C5B391] transition-all">TRACK YOUR SHIPMENT</a>
            </div>
        </div>
    </section>
</main>
@endsection
