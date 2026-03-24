@extends('layouts.app')

@section('title', 'Éclore Journal - Cookie Center')

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
    .legal-section h2 { font-family: 'Playfair Display', serif; font-weight: 300; letter-spacing: -0.01em; line-height: 1.2; }
    .legal-text { font-size: 15px; line-height: 1.8; color: #4A4A4A; }
    .preference-card { background: white; border: 1px solid #EEEEEE; padding: 2.5rem; transition: border-color 0.4s ease; margin-bottom: 1.5rem; }
    .preference-card:hover { border-color: #B6965D; }
    
    .toggle-switch {
        position: relative;
        width: 48px;
        height: 24px;
        background: #F0F0F0;
        border-radius: 20px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    .toggle-switch.active { background: #B6965D; }
    .toggle-knob {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 16px;
        height: 16px;
        background: white;
        border-radius: 50%;
        transition: transform 0.3s ease;
    }
    .toggle-switch.active .toggle-knob { transform: translateX(24px); }
</style>
@endpush

@section('content')
<div class="legal-content min-h-screen pb-40">
    <header class="legal-header py-40 px-6 text-center">
        <div class="max-w-6xl mx-auto relative z-10">
            <span class="font-azeret text-[10px] tracking-[0.5em] uppercase text-[#B6965D] mb-8 block" data-aos="fade-up">User Sovereignty</span>
            <h1 class="font-playfair text-6xl md:text-8xl font-light mb-8 text-white" data-aos="fade-up" data-aos-delay="100">Cookie Center</h1>
            <div class="max-w-3xl mx-auto font-azeret text-[11px] tracking-[0.1em] text-white/50 uppercase leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                You maintain complete control over the tracking technologies deployed during your visit. Customizing your preferences allows you to curate how we enhance your Éclore journey.
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-6 md:px-12 mt-20">
        <div id="preference-container">
            <!-- Essential -->
            <div class="preference-card flex items-center justify-between" data-aos="fade-up">
                <div class="pr-8">
                    <h4 class="font-playfair text-2xl mb-2 text-gray-900">Essential Infrastructure</h4>
                    <p class="text-sm text-gray-500 leading-relaxed font-light">Critical for foundational operations including authentication, security, and treasury transactions. These signatures cannot be deactivated.</p>
                </div>
                <div class="toggle-switch active opacity-50 cursor-not-allowed">
                    <div class="toggle-knob"></div>
                </div>
            </div>

            <!-- Performance -->
            <div class="preference-card flex items-center justify-between" data-aos="fade-up" data-aos-delay="100">
                <div class="pr-8">
                    <h4 class="font-playfair text-2xl mb-2 text-gray-900">Performance Metrics</h4>
                    <p class="text-sm text-gray-500 leading-relaxed font-light">Anonymous signatures that provide intelligence regarding how collectors traverse our Journal. Allows us to optimize the Éclore architecture.</p>
                </div>
                <div class="toggle-switch active" id="performance-toggle">
                    <div class="toggle-knob"></div>
                </div>
            </div>

            <!-- Functional -->
            <div class="preference-card flex items-center justify-between" data-aos="fade-up" data-aos-delay="200">
                <div class="pr-8">
                    <h4 class="font-playfair text-2xl mb-2 text-gray-900">Functional Artifacts</h4>
                    <p class="text-sm text-gray-500 leading-relaxed font-light">Enables enhanced features such as your jewelry wishlists, local currency preferences, and tailored collection displays.</p>
                </div>
                <div class="toggle-switch active" id="functional-toggle">
                    <div class="toggle-knob"></div>
                </div>
            </div>

            <!-- Marketing -->
            <div class="preference-card flex items-center justify-between" data-aos="fade-up" data-aos-delay="300">
                <div class="pr-8">
                    <h4 class="font-playfair text-2xl mb-2 text-gray-900">Marketing & Tailored Editorial</h4>
                    <p class="text-sm text-gray-500 leading-relaxed font-light">Allows us to share curated editorial narratives and collection alerts that align with your specific interests across the Éclore ecosystem.</p>
                </div>
                <div class="toggle-switch" id="marketing-toggle">
                    <div class="toggle-knob"></div>
                </div>
            </div>
        </div>

        <div class="mt-16 flex flex-col items-center gap-8" data-aos="fade-up" data-aos-delay="400">
            <button class="bg-[#1A1A1A] text-white px-20 py-5 font-azeret text-[10px] tracking-widest uppercase hover:bg-[#B6965D] transition-all">Save My Preferences</button>
            <p class="text-[9px] uppercase tracking-[0.2em] text-gray-400">Your preferences will endure across all Éclore domains.</p>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';
    const toggles = document.querySelectorAll('.toggle-switch:not(.opacity-50)');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            toggle.classList.toggle('active');
        });
    });
})();
</script>
@endsection
