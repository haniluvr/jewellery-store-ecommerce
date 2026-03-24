@extends('layouts.app')

@section('title', 'Éclore Journal - Terms of Service')

@push('styles')
<style>
    /* Section specific styles */
    .legal-content {
        background-color: #FAFAFA;
        color: #1A1A1A;
    }
    
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

    .sidebar-link.active {
        color: #1A1A1A;
        border-right: 2px solid #B6965D;
    }

    .sidebar-link:hover {
        color: #B6965D;
    }

    .legal-section h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 300;
        letter-spacing: -0.01em;
        line-height: 1.2;
    }

    .legal-section h3 {
        font-family: 'Azeret Mono', monospace;
        font-size: 11px;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: #B6965D;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
    }

    .legal-text {
        font-size: 15px;
        line-height: 1.8;
        color: #4A4A4A;
    }

    .accent-card {
        background: white;
        border: 1px solid #EEEEEE;
        padding: 3rem;
        position: relative;
    }

    .accent-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: #B6965D;
    }

    #content-area section {
        scroll-margin-top: 100px;
    }

    .dot-separator {
        width: 4px;
        height: 4px;
        background: #B6965D;
        border-radius: 50%;
        display: inline-block;
        margin: 0 1rem;
        vertical-align: middle;
    }

    .term-number {
        font-family: 'Azeret Mono', monospace;
        font-size: 10px;
        color: #B6965D;
        margin-right: 1rem;
    }
</style>
@endpush

@section('content')
<div class="legal-content min-h-screen">
    <!-- Editorial Header -->
    <header class="legal-header py-40 px-6">
        <div class="max-w-6xl mx-auto text-center relative z-10">
            <span class="font-azeret text-[10px] tracking-[0.5em] uppercase text-[#B6965D] mb-8 block" data-aos="fade-up">Statutory Agreement</span>
            <h1 class="font-playfair text-6xl md:text-8xl font-light mb-8 text-white" data-aos="fade-up" data-aos-delay="100">
                Terms of Service
            </h1>
            <div class="flex items-center justify-center font-azeret text-[11px] tracking-[0.2em] text-white/50 uppercase" data-aos="fade-up" data-aos-delay="200">
                <span>Éclore Journal</span>
                <span class="dot-separator"></span>
                <span>Version 2.4 — October 2025</span>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row px-6 md:px-12">
        <!-- Minimalist Sticky Navigation -->
        <aside class="w-full lg:w-72 lg:sticky lg:top-32 lg:self-start my-20 lg:pr-12">
            <div class="border-l border-gray-100 py-4">
                <nav class="space-y-4 flex flex-col text-right">
                    <a href="#introduction" class="sidebar-link active">Mandate</a>
                    <a href="#user-accounts" class="sidebar-link">Accounts</a>
                    <a href="#prohibited-use" class="sidebar-link">Conduct</a>
                    <a href="#intellectual-property" class="sidebar-link">Ownership</a>
                    <a href="#payment-pricing" class="sidebar-link">Treasury</a>
                    <a href="#refund-cancellation" class="sidebar-link">Restitution</a>
                    <a href="#shipping-delivery" class="sidebar-link">Logistics</a>
                    <a href="#limitation-liability" class="sidebar-link">Liability</a>
                    <a href="#warranty-disclaimer" class="sidebar-link">Warranties</a>
                    <a href="#dispute-resolution" class="sidebar-link">Resolution</a>
                    <a href="#governing-law" class="sidebar-link">Jurisdiction</a>
                    <a href="#contact" class="sidebar-link">Concierge</a>
                </nav>
            </div>
        </aside>

        <!-- Refined Content Area -->
        <main id="content-area" class="flex-1 lg:pl-20 border-l border-gray-50 my-20">
            <!-- Introduction -->
            <section id="introduction" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">1.0 — The Mandate</h2>
                <div class="legal-text space-y-8">
                    <p class="first-letter:text-6xl first-letter:font-playfair first-letter:mr-3 first-letter:float-left first-letter:text-[#B6965D]">
                        Welcome to Éclore. These Terms of Service constitute a legally binding agreement governing your access to and use of Éclore's boutique e-commerce platform, website, and bespoke services.
                    </p>
                    <p>
                        By traversing our digital domain, initializing an account, or acquiring a masterpiece from our collections, you commit to these Terms. Should you find any provision inconsistent with your intent, we respectfully request that you cease use of our services.
                    </p>
                    <div class="accent-card mt-12">
                        <h3 class="!mt-0">The House of Éclore</h3>
                        <p>Éclore is a premier Filipino e-commerce platform dedicated to the curation of high-end, artisanal jewellery. We bridge the gap between discerning collectors and master jewelers, preserving traditional metalwork and lapidary arts through a modern luxury lens.</p>
                        <ul class="mt-8 space-y-2 font-azeret text-[10px] tracking-widest uppercase text-gray-400">
                            <li><span class="text-[#B6965D]">Locus</span> Silang, Cavite, Philippines</li>
                            <li><span class="text-[#B6965D]">Registry</span> hello@eclorejewellery.shop</li>
                            <li><span class="text-[#B6965D]">Direct</span> +63 (917) 123-4567</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- User Accounts -->
            <section id="user-accounts" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">2.0 — Account Stewardship</h2>
                <div class="legal-text space-y-8">
                    <p>To engage with the Éclore ecosystem, members must maintain the highest standards of eligibility and security.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="!mt-0">Eligibility</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4">
                                    <span class="term-number">[2.1]</span>
                                    <span>Legal age of majority (18 years or older).</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span class="term-number">[2.2]</span>
                                    <span>Authentic identity verification via Secure Email.</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="!mt-0">Security</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4">
                                    <span class="term-number">[2.3]</span>
                                    <span>Confidentiality of cryptographic access tokens.</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span class="term-number">[2.4]</span>
                                    <span>Responsibility for all activity under the account.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Prohibited Use -->
            <section id="prohibited-use" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">3.0 — Code of Conduct</h2>
                <p class="legal-text mb-12">
                    In preservation of the Éclore aesthetic and community, members agree to refrain from:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 font-azeret text-[9px] tracking-[0.2em] uppercase text-gray-500">
                    <div class="border border-gray-100 p-6">Automated Extraction & Scrapers</div>
                    <div class="border border-gray-100 p-6">Identity Obfuscation</div>
                    <div class="border border-gray-100 p-6">Intellectual Infringement</div>
                    <div class="border border-gray-100 p-6">Treasury Fraud & Disputes</div>
                    <div class="border border-gray-100 p-6">Malicious Code Injection</div>
                    <div class="border border-gray-100 p-6">Unsanctioned Resale</div>
                </div>
            </section>

            <!-- Intellectual Property -->
            <section id="intellectual-property" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">4.0 — Proprietary Ownership</h2>
                <div class="legal-text space-y-8">
                    <p>Every element within the Éclore platform — from the curvature of our digital interfaces to the high-resolution imagery of our pieces — is the exclusive intellectual property of Éclore.</p>
                    <div class="pl-10 border-l border-[#B6965D] space-y-6 italic text-gray-500">
                        <p>"The Éclore mark, our editorial content, and the structural design of our boutique are protected by Philippine and International Intellectual Property statutes."</p>
                    </div>
                </div>
            </section>

            <!-- Payment and Pricing -->
            <section id="payment-pricing" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">5.0 — Treasury & Acquisition</h2>
                <div class="legal-text space-y-8">
                    <p>All acquisitions are conducted in <strong>Philippine Peso (PHP)</strong>. Pricing is subject to the fluctuations of artisan craftsmanship and material availability.</p>
                    
                    <h3 class="font-azeret">Secure Payment Orchestration</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-white border border-gray-100 p-4 text-center">
                            <span class="font-azeret text-[9px] text-gray-400">Xendit Vault</span>
                        </div>
                        <div class="bg-white border border-gray-100 p-4 text-center">
                            <span class="font-azeret text-[9px] text-gray-400">GCash Direct</span>
                        </div>
                        <div class="bg-white border border-gray-100 p-4 text-center">
                            <span class="font-azeret text-[9px] text-gray-400">Maya Digital</span>
                        </div>
                        <div class="bg-white border border-gray-100 p-4 text-center">
                            <span class="font-azeret text-[9px] text-gray-400">Boutique COD</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Refund and Cancellation -->
            <section id="refund-cancellation" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">6.0 — Restitution Mandate</h2>
                <div class="legal-text space-y-8">
                    <p>We provide a <strong>7-day window</strong> for the return of items that fail to meet our rigorous quality benchmarks upon delivery.</p>
                    <div class="accent-card">
                        <h4 class="font-playfair text-xl mb-6">Eligible for Restitution</h4>
                        <ul class="space-y-3 font-azeret text-[10px] tracking-wide uppercase text-gray-500">
                            <li>Structural Manufacturing Defects</li>
                            <li>Discrepancy in Product Specification</li>
                            <li>Damage sustained during House Logistics</li>
                        </ul>
                        <p class="mt-8 text-xs italic text-gray-400">Items altered by the collector or custom-made pieces are exempt from standard returns.</p>
                    </div>
                </div>
            </section>

            <!-- Shipping and Delivery -->
            <section id="shipping-delivery" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">7.0 — Global Logistics</h2>
                <div class="legal-text space-y-8">
                    <p>Domestic fulfillments are orchestrated through our network of luxury logistics partners. Tracking architecture is available within the Member Dashboard.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-8 border border-gray-50">
                            <h4 class="font-playfair text-lg mb-2">Metropolitan</h4>
                            <p class="font-azeret text-[10px] text-[#B6965D]">7–14 Business Days</p>
                        </div>
                        <div class="p-8 border border-gray-50">
                            <h4 class="font-playfair text-lg mb-2">Provincial</h4>
                            <p class="font-azeret text-[10px] text-[#B6965D]">10–21 Business Days</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Limitation of Liability -->
            <section id="limitation-liability" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">8.0 — Limitation of Liability</h2>
                <div class="legal-text bg-[#1A1A1A] text-white/70 p-12 font-azeret text-[11px] tracking-wide leading-relaxed uppercase">
                    TO THE MAXIMUM EXTENT PERMITTED BY LAW, ÉCLORE SHALL NOT BE LIABLE FOR INDIRECT, INCIDENTAL, OR PUNITIVE DAMAGES ARISING FROM THE USE OF OUR BOUTIQUE. OUR TOTAL LIABILITY IS LIMITED TO THE AMOUNT PAID FOR THE PRODUCT IN QUESTION.
                </div>
            </section>

            <!-- Warranty Disclaimer -->
            <section id="warranty-disclaimer" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">9.0 — The Artisan Guarantee</h2>
                <div class="legal-text space-y-8">
                    <p>Éclore provides a limited <strong>6-month artisan warranty</strong> covering structural integrity and manufacturing craftsmanship of our jewellery pieces.</p>
                    <p class="text-sm text-gray-400 italic">"Natural variations in stones, including inclusions and subtle color shifts, are celebrated as certificates of authenticity and are not considered defects."</p>
                </div>
            </section>

            <!-- Dispute Resolution -->
            <section id="dispute-resolution" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">10.0 — Harmony & Resolution</h2>
                <p class="legal-text">
                    In the spirit of artisanal excellence, Éclore seeks to resolve any collectors' concerns through direct dialogue. Any dispute arising from your acquisition journey shall first be submitted to our Boutique Concierge for an amicable resolution process before pursuing formal digital arbitration.
                </p>
            </section>

            <!-- Jurisdiction -->
            <section id="governing-law" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">11.0 — Regulatory Jurisdiction</h2>
                <p class="legal-text">
                    These Terms and your relationship with Éclore shall be governed by and construed in accordance with the laws of the <strong>Republic of the Philippines</strong>. Any formal legal proceedings shall be conducted exclusively within the competent courts of <strong>Cavite</strong>, where our boutique heritage resides.
                </p>
            </section>

            <!-- Concierge Contact -->
            <section id="contact" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">12.0 — Boutique Concierge</h2>
                <div class="bg-[#B6965D] p-12 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div>
                            <h4 class="font-playfair text-2xl mb-4">Concierge Support</h4>
                            <p class="font-azeret text-[10px] tracking-[0.2em] leading-relaxed uppercase">
                                For inquiries regarding these Terms or your acquisition journey, our concierge team is available.
                            </p>
                        </div>
                        <div class="space-y-4 font-azeret text-[11px] tracking-widest uppercase">
                            <p>hello@eclorejewellery.shop</p>
                            <p>+63 (917) 123-4567</p>
                            <p class="pt-4 border-t border-white/20">Mon — Sat / 09:00 — 18:00</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Acceptance -->
            <section class="border-t border-gray-100 pt-12 pb-20">
                <p class="font-playfair text-2xl text-gray-900 italic">
                    By accessing the Éclore Journal and our boutique ecosystem, you acknowledge full acceptance of these Terms.
                </p>
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
        
        function setActive() {
            let current = '';
            const scrollPos = window.scrollY + 150;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollPos >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            links.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', setActive);
        setActive();

        // Smooth scroll with offset
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebarActive);
    } else {
        initSidebarActive();
    }
})();
</script>
@endsection
