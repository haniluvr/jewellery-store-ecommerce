@extends('layouts.app')

@section('title', 'Éclore Journal - Conditions of Sale')

@push('styles')
<style>
    .legal-content { background-color: #FAFAFA; color: #1A1A1A; }
    .legal-header {
        background: linear-gradient(to bottom, #1A1A1A 0%, #2A2A2A 100%);
        color: #FFFFFF;
        position: relative;
        overflow: hidden;
    }
    .legal-header::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(182, 150, 93, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }
    .sidebar-link {
        font-family: 'Azeret Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #999999;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border-right: 1px solid transparent;
        padding-right: 2rem;
    }
    .sidebar-link.active { color: #1A1A1A; border-right: 2px solid #B6965D; }
    .sidebar-link:hover { color: #B6965D; }
    .legal-section h2 { font-family: 'Playfair Display', serif; font-weight: 300; letter-spacing: -0.01em; line-height: 1.2; }
    .legal-section h3 {
        font-family: 'Azeret Mono', monospace;
        font-size: 11px;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: #B6965D;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
    }
    .legal-text { font-size: 15px; line-height: 1.8; color: #4A4A4A; }
    .accent-card { background: white; border: 1px solid #EEEEEE; padding: 3rem; position: relative; }
    .accent-card::before { content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: #B6965D; }
    #content-area section { scroll-margin-top: 100px; }
    .dot-separator { width: 4px; height: 4px; background: #B6965D; border-radius: 50%; display: inline-block; margin: 0 1rem; vertical-align: middle; }
</style>
@endpush

@section('content')
<div class="legal-content min-h-screen">
    <header class="legal-header py-40 px-6 text-center">
        <div class="max-w-6xl mx-auto relative z-10">
            <span class="font-azeret text-[10px] tracking-[0.5em] uppercase text-[#B6965D] mb-8 block" data-aos="fade-up">Treasury Mandate</span>
            <h1 class="font-playfair text-6xl md:text-8xl font-light mb-8 text-white" data-aos="fade-up" data-aos-delay="100">Conditions of Sale</h1>
            <div class="flex items-center justify-center font-azeret text-[11px] tracking-[0.2em] text-white/50 uppercase" data-aos="fade-up" data-aos-delay="200">
                <span>Éclore Boutique</span>
                <span class="dot-separator"></span>
                <span>Last Updated — October 2025</span>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row px-6 md:px-12 mt-20">
        <aside class="w-full lg:w-72 lg:sticky lg:top-32 lg:self-start lg:pr-12">
            <div class="border-l border-gray-100 py-4">
                <nav class="space-y-4 flex flex-col text-right">
                    <a href="#acquisition" class="sidebar-link active">Acquisition</a>
                    <a href="#authenticity" class="sidebar-link">Authenticity</a>
                    <a href="#valuation" class="sidebar-link">Valuation</a>
                    <a href="#diamond-sourcing" class="sidebar-link">Sourcing</a>
                    <a href="#custom-orders" class="sidebar-link">Bespoke</a>
                    <a href="#shipping" class="sidebar-link">Logistics</a>
                    <a href="#returns" class="sidebar-link">Restitution</a>
                    <a href="#warranty" class="sidebar-link">Guarantee</a>
                </nav>
            </div>
        </aside>

        <main id="content-area" class="flex-1 lg:pl-20 border-l border-gray-50">
            <section id="acquisition" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">1.0 — Acquisition Protocol</h2>
                <div class="legal-text space-y-8">
                    <p class="first-letter:text-6xl first-letter:font-playfair first-letter:mr-3 first-letter:float-left first-letter:text-[#B6965D]">
                        Acquiring a piece from the Éclore collection signifies more than a transaction; it is an entry into our heritage. By confirming your order, you agree to these Conditions of Sale.
                    </p>
                    <p>Orders are subject to acceptance by Éclore. Given the finite nature of our artisanal production, we reserve the right to limit the quantity of items acquired per collector.</p>
                </div>
            </section>

            <section id="authenticity" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">2.0 — Certificate of Authenticity</h2>
                <div class="accent-card">
                    <p class="legal-text">Every Éclore creation is accompanied by a Certificate of Authenticity, documenting the specifications of the precious metals and gemstones utilized. For significant diamonds and rare gems, a GIA or equivalent international certification will be provided.</p>
                </div>
            </section>

            <section id="valuation" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">3.0 — Valuation & Pricing</h2>
                <div class="legal-text space-y-8">
                    <p>Prices are displayed in Philippine Peso (PHP). Due to the volatility of the precious metals and gemstone markets, Éclore reserves the right to adjust pricing at any time without prior notice.</p>
                    <div class="bg-white border border-gray-100 p-8">
                        <span class="font-azeret text-[10px] text-[#B6965D] block mb-4">Taxation</span>
                        <p class="text-sm">Value Added Tax (VAT) is included in the terminal price unless otherwise specified for international acquisitions.</p>
                    </div>
                </div>
            </section>

            <section id="diamond-sourcing" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">4.0 — Ethical Sourcing</h2>
                <div class="legal-text space-y-8">
                    <p>Éclore is committed to the highest standards of ethics. We strictly procure diamonds through the Kimberley Process, ensuring all stones are conflict-free and ethically mined.</p>
                    <p>Our metals are sourced from certified refineries that adhere to global environmental and fair-labor standards.</p>
                </div>
            </section>

            <section id="custom-orders" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">5.0 — Bespoke (Custom) Creations</h2>
                <div class="legal-text space-y-8">
                    <p>Bespoke services require a specialized consultation. A non-refundable deposit of 50% is required to initialize the design and sourcing phase of any custom masterpiece.</p>
                    <p class="text-sm italic text-gray-400">Custom orders are final sales and are not eligible for return or exchange.</p>
                </div>
            </section>

            <section id="shipping" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">6.0 — High-Value Logistics</h2>
                <div class="legal-text space-y-8">
                    <p>Given the value of our pieces, all deliveries require a signature from a person of legal age at the designated boutique address. We utilize specialized luxury couriers equipped with real-time tracking architecture.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="border border-gray-100 p-6">
                            <h4 class="font-playfair text-lg mb-2">Insurance</h4>
                            <p class="text-xs text-gray-500 uppercase tracking-widest leading-loose">All shipments are fully insured by Éclore until the moment of signature.</p>
                        </div>
                        <div class="border border-gray-100 p-6">
                            <h4 class="font-playfair text-lg mb-2">Packaging</h4>
                            <p class="text-xs text-gray-500 uppercase tracking-widest leading-loose">Items are housed in anti-tamper, unmarked containers to ensure discretion.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="returns" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">7.0 — Restitution (Returns)</h2>
                <div class="legal-text space-y-8">
                    <p>Collectors may request return of their acquisition within 7 days of delivery, provided the security seal remains intact and the piece is in its pristine, unworn state.</p>
                    <p>Refunds are processed back to the original treasury route after inspection by our quality assurance artisans.</p>
                </div>
            </section>

            <section id="contact" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">8.0 — Boutique Concierge</h2>
                <div class="bg-[#1A1A1A] p-12 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 font-azeret text-[10px] tracking-[0.3em] uppercase">
                        <div>
                            <span class="text-[#B6965D] block mb-4">Direct Contact</span>
                            <a href="mailto:hello@eclorejewellery.shop" class="text-lg normal-case tracking-normal">hello@eclorejewellery.shop</a>
                            <p class="mt-4">+63 (917) 123-4567</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
(function() {
    'use strict';
    function initSidebarActive() {
        const sections = document.querySelectorAll('#content-area section');
        const links = document.querySelectorAll('.sidebar-link');
        window.addEventListener('scroll', () => {
            let current = '';
            const scrollPos = window.scrollY + 150;
            sections.forEach(section => {
                if (scrollPos >= section.offsetTop) current = section.getAttribute('id');
            });
            links.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
            });
        });
        links.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                window.scrollTo({ top: document.querySelector(targetId).offsetTop - 100, behavior: 'smooth' });
            });
        });
    }
    initSidebarActive();
})();
</script>
@endsection
