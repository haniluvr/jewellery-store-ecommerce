@extends('layouts.app')

@section('title', 'Éclore Journal - Cookie Policy')

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
    .cookie-tag {
        font-family: 'Azeret Mono', monospace;
        font-size: 9px;
        letter-spacing: 0.1em;
        padding: 4px 12px;
        background: #F0F0F0;
        color: #1A1A1A;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')
<div class="legal-content min-h-screen">
    <header class="legal-header py-40 px-6 text-center">
        <div class="max-w-6xl mx-auto relative z-10">
            <span class="font-azeret text-[10px] tracking-[0.5em] uppercase text-[#B6965D] mb-8 block" data-aos="fade-up">Tracking Architecture</span>
            <h1 class="font-playfair text-6xl md:text-8xl font-light mb-8 text-white" data-aos="fade-up" data-aos-delay="100">Cookie Policy</h1>
            <div class="flex items-center justify-center font-azeret text-[11px] tracking-[0.2em] text-white/50 uppercase" data-aos="fade-up" data-aos-delay="200">
                <span>Éclore Journal</span>
                <span class="dot-separator"></span>
                <span>Last Updated — October 2025</span>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row px-6 md:px-12 mt-20">
        <aside class="w-full lg:w-72 lg:sticky lg:top-32 lg:self-start lg:pr-12">
            <div class="border-l border-gray-100 py-4">
                <nav class="space-y-4 flex flex-col text-right">
                    <a href="#introduction" class="sidebar-link active">Mandate</a>
                    <a href="#types-of-cookies" class="sidebar-link">Taxonomy</a>
                    <a href="#essential-cookies" class="sidebar-link">Essential</a>
                    <a href="#performance-cookies" class="sidebar-link">Performance</a>
                    <a href="#functional-cookies" class="sidebar-link">Functional</a>
                    <a href="#marketing-cookies" class="sidebar-link">Marketing</a>
                    <a href="#managing-cookies" class="sidebar-link">Preferences</a>
                </nav>
            </div>
        </aside>

        <main id="content-area" class="flex-1 lg:pl-20 border-l border-gray-50">
            <section id="introduction" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">1.0 — Tracking & Cookies</h2>
                <div class="legal-text space-y-8">
                    <p class="first-letter:text-6xl first-letter:font-playfair first-letter:mr-3 first-letter:float-left first-letter:text-[#B6965D]">
                        To cultivate an unparalleled digital experience at Éclore, we utilize cookies and similar technologies. These digital signatures allow us to understand your preferences and optimize your navigation through our curated collections.
                    </p>
                    <p>By traversing our Journal and Boutique, you consent to the utilization of these technologies in accordance with this mandate.</p>
                </div>
            </section>

            <section id="types-of-cookies" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">2.0 — Cookie Taxonomy</h2>
                <div class="legal-text grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Session Signatures</h4>
                        <p class="text-sm text-gray-500">Transient cookies that culminate upon the closure of your browser session.</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-playfair text-xl">Persistent Artifacts</h4>
                        <p class="text-sm text-gray-500">Permanent signatures that endure until their specific expiry period or manual removal.</p>
                    </div>
                </div>
            </section>

            <section id="essential-cookies" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">3.0 — Essential Architecture</h2>
                <div class="legal-text space-y-8">
                    <p>These cookies are critical for the foundational operation of our boutique. They facilitate secure authentication, treasury transactions, and the preservation of your bag during navigation.</p>
                    <div class="accent-card">
                        <span class="cookie-tag">Non-Negotiable</span>
                        <h4 class="font-playfair text-lg mt-4 mb-2">Auth & Session</h4>
                        <p class="text-xs text-gray-500 font-azeret uppercase tracking-widest leading-loose">XSRF-TOKEN / eclore_session / remember_web</p>
                    </div>
                </div>
            </section>

            <section id="#performance-cookies" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">4.0 — Performance Metrics</h2>
                <div class="legal-text space-y-8">
                    <p>We utilize performance signatures to aggregate anonymous data regarding how visitors navigate the Éclore Journal. This intelligence is used exclusively to improve the architecture of our platform.</p>
                    <div class="border border-gray-100 p-8">
                        <span class="cookie-tag">Analytics</span>
                        <h4 class="font-playfair text-lg mt-4 mb-2">Visitor Analytics</h4>
                        <p class="text-xs text-gray-500 font-azeret uppercase tracking-widest leading-loose">_ga / _gid / _gat / _ga_property_id</p>
                    </div>
                </div>
            </section>

            <section id="managing-cookies" class="pb-24" data-aos="fade-up">
                <h2 class="text-4xl text-gray-900 mb-12">5.0 — User Sovereignty</h2>
                <div class="legal-text space-y-8">
                    <p>You maintain full sovereignty over your tracking preferences. You may adjust these settings via our <strong>Cookie Center</strong> or through your browser's internal control panel.</p>
                    <div class="bg-[#1A1A1A] p-12 text-white">
                        <h4 class="font-playfair text-2xl mb-6">Curate Your Experience</h4>
                        <p class="font-azeret text-[10px] tracking-[0.2em] leading-relaxed uppercase mb-8">
                            To manage specific tracking protocols, please visit our dedicated curation portal.
                        </p>
                        <a href="{{ route('cookie-center') }}" class="inline-block border border-[#B6965D] text-[#B6965D] px-8 py-3 font-azeret text-[10px] tracking-widest uppercase hover:bg-[#B6965D] hover:text-white transition-all">Go to Cookie Center</a>
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
