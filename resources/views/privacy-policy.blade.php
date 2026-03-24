@extends('layouts.app')

@section('title', 'Éclore Journal - Privacy Policy')

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

    .sticky-nav {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    
    .sticky-nav::-webkit-scrollbar {
        display: none;
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
</style>
@endpush

@section('content')
<div class="legal-content min-h-screen">
    <!-- Editorial Header -->
    <header class="legal-header py-40 px-6">
        <div class="max-w-6xl mx-auto text-center relative z-10">
            <span class="font-azeret text-[10px] tracking-[0.5em] uppercase text-[#B6965D] mb-8 block" data-aos="fade-up">Jurisprudence & Mandate</span>
            <h1 class="font-playfair text-6xl md:text-8xl font-light mb-8 text-white" data-aos="fade-up" data-aos-delay="100">
                Privacy Policy
            </h1>
            <div class="flex items-center justify-center font-azeret text-[11px] tracking-[0.2em] text-white/50 uppercase" data-aos="fade-up" data-aos-delay="200">
                <span>Éclore Journal</span>
                <span class="dot-separator"></span>
                <span>Last Updated — October 2025</span>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row px-6 md:px-12">
        <!-- Minimalist Sticky Navigation -->
        <aside class="w-full lg:w-72 lg:sticky lg:top-32 lg:self-start my-20 lg:pr-12">
            <div class="border-l border-gray-100 py-4">
                <nav class="space-y-4 flex flex-col text-right">
                    <a href="#introduction" class="sidebar-link active">Introduction</a>
                    <a href="#information-we-collect" class="sidebar-link">Collection</a>
                    <a href="#how-we-use" class="sidebar-link">Utilization</a>
                    <a href="#how-we-share" class="sidebar-link">Dissemination</a>
                    <a href="#data-security" class="sidebar-link">Security Safeguards</a>
                    <a href="#data-retention" class="sidebar-link">Retention Period</a>
                    <a href="#cookies" class="sidebar-link">Tracking Architecture</a>
                    <a href="#privacy-rights" class="sidebar-link">User Sovereignty</a>
                    <a href="#children-privacy" class="sidebar-link">Minor Safeguarding</a>
                    <a href="#third-party-links" class="sidebar-link">External Ecosystems</a>
                    <a href="#data-transfers" class="sidebar-link">Global Flow</a>
                    <a href="#contact" class="sidebar-link">Concierge Reach</a>
                    <a href="#policy-changes" class="sidebar-link">Amendments</a>
                    <a href="#dpa-compliance" class="sidebar-link">DPA Compliance</a>
                </nav>
            </div>
        </aside>

        <!-- Refined Content Area -->
        <main id="content-area" class="flex-1 lg:pl-20 border-l border-gray-50 my-20">
            <!-- Introduction -->
            <section id="introduction" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">1.0 — Introduction</h2>
                <div class="legal-text space-y-8">
                    <p class="first-letter:text-6xl first-letter:font-playfair first-letter:mr-3 first-letter:float-left first-letter:text-[#B6965D]">
                        In our commitment to transparency and the quiet stewardship of your personal data at Éclore, we curate this Privacy Policy to detail how we capture and safeguard your information. Our purpose is the preservation of your digital privacy while delivering an unparalleled luxury experience.
                    </p>
                    <p>
                        We collect and utilize information across several distinct touchpoints:
                    </p>
                    <div class="pl-10 space-y-4">
                        <div class="flex items-start gap-6">
                            <span class="font-azeret text-[10px] text-[#B6965D] mt-2">[01]</span>
                            <p>Artisans and Merchants utilizing the Éclore infrastructure.</p>
                        </div>
                        <div class="flex items-start gap-6">
                            <span class="font-azeret text-[10px] text-[#B6965D] mt-2">[02]</span>
                            <p>Individual Collectors and Customers accessing our collections.</p>
                        </div>
                        <div class="flex items-start gap-6">
                            <span class="font-azeret text-[10px] text-[#B6965D] mt-2">[03]</span>
                            <p>Strategic Partners and Editorial contributors.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Information We Collect -->
            <section id="information-we-collect" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">2.0 — Information We Collect</h2>
                
                <h3 class="font-azeret">Direct Engagement Data</h3>
                <div class="legal-text grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Identity Artifacts</h4>
                        <p class="text-[13px] uppercase tracking-wider text-gray-400 font-azeret">Full Name / Email / Secure Cipher</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Logistics Detail</h4>
                        <p class="text-[13px] uppercase tracking-wider text-gray-400 font-azeret">Boutique Delivery Address / Contact Reach</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Acquisition History</h4>
                        <p class="text-[13px] uppercase tracking-wider text-gray-400 font-azeret">Treasury Records / Product Affiliation</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Digital Credentials</h4>
                        <p class="text-[13px] uppercase tracking-wider text-gray-400 font-azeret">Google OAuth / Interaction Tokens</p>
                    </div>
                </div>

                <h3 class="font-azeret">Automated Architecture Insights</h3>
                <p class="legal-text mb-12">
                    Upon traversing our digital domain, we systematically archive technical signatures to optimize your interface:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="border border-gray-100 p-8 hover:border-[#B6965D] transition-colors duration-500">
                        <h4 class="font-playfair text-lg mb-4">Device Origin</h4>
                        <p class="text-xs text-gray-500 font-azeret uppercase tracking-widest leading-loose">IP Protocol / System Environment / Browser Engine</p>
                    </div>
                    <div class="border border-gray-100 p-8 hover:border-[#B6965D] transition-colors duration-500">
                        <h4 class="font-playfair text-lg mb-4">Engagement Flux</h4>
                        <p class="text-xs text-gray-500 font-azeret uppercase tracking-widest leading-loose">Chronological Navigation / Dwell Metrics / Pathing</p>
                    </div>
                    <div class="border border-gray-100 p-8 hover:border-[#B6965D] transition-colors duration-500">
                        <h4 class="font-playfair text-lg mb-4">Geographic Orbit</h4>
                        <p class="text-xs text-gray-500 font-azeret uppercase tracking-widest leading-loose">Localized Optimization / Delivery Efficiency</p>
                    </div>
                </div>
            </section>

            <!-- Usage & Disclosure Logic -->
            <section id="how-we-use" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">3.0 — How We Use Your Information</h2>
                <div class="accent-card">
                    <div class="legal-text space-y-12">
                        <div>
                            <h3 class="!mt-0">Operational Mandate</h3>
                            <p>We process transactions with surgical precision, ensuring that from acquisition to delivery, your data facilitates a seamless journey. This includes payment orchestration via our secure partners (Xendit, GCash, Maya) and logistics fulfillment.</p>
                        </div>
                        <div>
                            <h3>Member Experience</h3>
                            <p>Maintaining your Éclore account requires precise verification protocols, order history archiving, and the preservation of your curated wishlists and preferences.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Dissemination -->
            <section id="how-we-share" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">4.0 — Dissemination (Third Parties)</h2>
                <div class="legal-text space-y-8">
                    <p>Éclore does not sell your personal artifacts. We share data only with trusted partners necessary for our operations:</p>
                    <ul class="pl-10 space-y-4 list-disc marker:text-[#B6965D]">
                        <li><strong>Treasury Partners:</strong> Secure payment gateways for transaction processing.</li>
                        <li><strong>Logistics Artisans:</strong> Courier services for boutique delivery.</li>
                        <li><strong>Technical Guardians:</strong> Infrastructure providers ensuring site integrity.</li>
                    </ul>
                </div>
            </section>

            <!-- Security & Safeguards -->
            <section id="data-security" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">5.0 — Data Security & Safeguards</h2>
                <div class="legal-text space-y-8">
                    <p>
                        Éclore employs a rigorous security architecture designed to shield your personal information from unauthorized access. Our protocols exceed standard industry benchmarks to ensure your digital legacy remains private.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16">
                        <div class="flex gap-6">
                            <div class="w-12 h-12 flex-shrink-0 bg-black flex items-center justify-center">
                                <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                            </div>
                            <div>
                                <h4 class="font-playfair text-xl mb-2">Cryptographic Layers</h4>
                                <p class="text-sm text-gray-500">Industry-leading SSL/TLS encryption for all data in transit.</p>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div class="w-12 h-12 flex-shrink-0 bg-black flex items-center justify-center">
                                <i data-lucide="lock" class="text-white w-6 h-6"></i>
                            </div>
                            <div>
                                <h4 class="font-playfair text-xl mb-2">Access Control</h4>
                                <p class="text-sm text-gray-500">Multi-factor authentication and strict least-privilege protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Retention Period -->
            <section id="data-retention" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">6.0 — Retention Period</h2>
                <p class="legal-text">
                    We archive your personal signatures only for the duration necessary to fulfill our operational mandates or as required by statutory regulations. Upon fulfillment, data is securely purged from our active architecture.
                </p>
            </section>

            <!-- Tracking Architecture -->
            <section id="cookies" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">7.0 — Tracking Architecture</h2>
                <p class="legal-text">
                    Éclore utilizes refined tracking artifacts (cookies) to curate your navigation. For a detailed taxonomy of our tracking protocols, please refer to our dedicated <a href="{{ route('cookie-policy') }}" class="text-[#B6965D] underline">Cookie Policy</a>.
                </p>
            </section>

            <!-- User Sovereignty -->
            <section id="privacy-rights" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">8.0 — User Sovereignty (Rights)</h2>
                <div class="legal-text space-y-6">
                    <p>As a collector of Éclore, you possess inherent digital rights over your information:</p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-6 font-azeret text-[10px] tracking-widest uppercase">
                        <li class="border border-gray-100 p-6">Right to Transparency</li>
                        <li class="border border-gray-100 p-6">Right to Correction</li>
                        <li class="border border-gray-100 p-6">Right to Erasure</li>
                        <li class="border border-gray-100 p-6">Right to Portability</li>
                    </ul>
                </div>
            </section>

            <!-- Minor Safeguarding -->
            <section id="children-privacy" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">9.0 — Minor Safeguarding</h2>
                <p class="legal-text">
                    Our collections are curated for an adult audience. We do not knowingly capture information from individuals under the age of 18. If you believe such data exists in our repository, please contact our concierge immediately.
                </p>
            </section>

            <!-- External Ecosystems -->
            <section id="third-party-links" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">10.0 — External Ecosystems</h2>
                <p class="legal-text">
                    Our Journal may contain paths to external digital domains. Éclore maintains no stewardship over the privacy protocols of these third-party ecosystems.
                </p>
            </section>

            <!-- Global Flow -->
            <section id="data-transfers" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">11.0 — Global Flow</h2>
                <p class="legal-text">
                    In providing a global luxury service, your information may traverse international borders. We ensure all global flows adhere to stringent data protection standards relative to your jurisdiction.
                </p>
            </section>

            <!-- Concierge Contact -->
            <section id="contact" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">12.0 — Concierge Reach</h2>
                <p class="legal-text mb-12">
                    For inquiries regarding your digital rights, data corrections, or general policy clarification, our privacy conciliators are available for consultation.
                </p>
                <div class="bg-[#1A1A1A] p-12 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 font-azeret text-[10px] tracking-[0.3em] uppercase">
                        <div>
                            <span class="text-[#B6965D] block mb-4">Direct Communication</span>
                            <a href="mailto:hello@eclorejewellery.shop" class="text-lg normal-case tracking-normal hover:text-[#B6965D] transition-colors">hello@eclorejewellery.shop</a>
                            <p class="mt-4">+63 (917) 123-4567</p>
                        </div>
                        <div>
                            <span class="text-[#B6965D] block mb-4">Boutique Address</span>
                            <p class="text-white/60 leading-relaxed">
                                123 Santa Rosa - Tagaytay Rd,<br>
                                Silang, 4118 Cavite<br>
                                Philippines
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Amendments -->
            <section id="policy-changes" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">13.0 — Amendments</h2>
                <p class="legal-text">
                    Éclore reserves the right to refine this Privacy Policy to reflect evolving regulatory mandates or architectural shifts. Collectors will be notified of significant amendments via their designated communication artifacts.
                </p>
            </section>

            <!-- DPA Compliance -->
            <section id="dpa-compliance" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">14.0 — Regulatory Sovereignty</h2>
                <div class="legal-text space-y-8">
                    <p>
                        Éclore operates in strict adherence to <strong>Republic Act No. 10173</strong>, or the <strong>Data Privacy Act of 2012</strong>. We respect your inherent right to control your personal information and maintain transparency at every digital intersection.
                    </p>
                    <p class="text-sm italic text-gray-400">
                        By utilizing the Éclore Journal and our boutique infrastructure, you acknowledge and accept the conditions set forth in this digital mandate.
                    </p>
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
