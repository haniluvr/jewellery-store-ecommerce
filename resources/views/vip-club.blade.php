@extends('layouts.app')

@section('title', 'VIP Club — Éclore Private Circle')

@push('styles')
<style>
    /* Hero Scroll Experience */
    .hero-scroll-container {
        height: 180vh; /* Reduced height for tighter transition */
        position: relative;
    }

    .hero-sticky-frame {
        position: sticky;
        top: 104px; /* Offset for navbar height */
        height: calc(100vh - 104px);
        width: 100%;
        overflow: hidden;
        background: white;
    }

    /* Fixed-position feel background within the sticky frame */
    .hero-sticky-frame {
        background: white; /* Base color for the fade-off */
    }

    .sand-backdrop {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
        transition: opacity 0.5s ease-out;
    }

    /* Layered Elements */
    .hero-layer {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .image-tile {
        width: 32rem;
        height: 44rem;
        box-shadow: 0 50px 100px rgba(0,0,0,0.4);
        position: relative;
        z-index: 30;
        pointer-events: auto;
    }

    .image-tile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-main-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 7vw, 6rem); /* Slightly smaller for better centered fit */
        color: #1a1a1a;
        text-align: center;
        line-height: 1.1;
        z-index: 20;
        opacity: 0;
        /* Start from a true center or slightly below for the reveal */
        transform: translateY(5rem);
        max-width: 90%;
    }

    /* Invitation Card Styles (Image 2) */
    .invitation-section {
        background: white;
        position: relative;
        z-index: 50;
    }

    .invitation-card {
        background: #DED6C4;
        padding: 4rem;
        width: 32rem;
        height: 40rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        position: relative;
        box-shadow: 20px 20px 60px rgba(0,0,0,0.1);
    }

    .invitation-polaroid {
        background: #FDFBFA;
        padding: 1.5rem;
        padding-bottom: 5rem;
        width: 32rem;
        height: 40rem;
        box-shadow: 20px 20px 60px rgba(0,0,0,0.1);
        transform: rotate(-1deg);
    }

    /* Experience Section (Image 3) */
    .experience-text-behind {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 10vw, 8rem);
        color: rgba(0,0,0,0.05);
        line-height: 1.1;
        text-align: center;
        white-space: nowrap;
        pointer-events: none;
    }

    .experience-floating-image {
        position: absolute;
        width: 12rem;
        height: 16rem;
        z-index: 20;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        background: white;
        padding: 0.8rem;
        padding-bottom: 2.5rem;
        transition: transform 0.1s linear;
    }

    /* Membership Marquee (Image 5) */
    .marquee-container {
        display: flex;
        gap: 2rem;
        animation: marquee 40s linear infinite;
        width: max-content;
    }

    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .signature {
        font-family: 'Ms Madi', cursive, serif;
    }

    .paper-texture {
        background-image: url("https://www.transparenttextures.com/patterns/natural-paper.png");
    }

    .partner-grid-item {
        border: 1px solid rgba(255,255,255,0.1);
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .partner-grid-item:hover {
        background: rgba(255,255,255,0.05);
        border-color: rgba(255,255,255,0.3);
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Ms+Madi&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="relative z-10">
    <!-- Hero Scroll Experience (Stage 1-5 from Images) -->
    <section class="hero-scroll-container" id="hero-scene">
        <div class="hero-sticky-frame">
            <!-- Fixed-depth background -->
            <img src="{{ asset('frontend/assets/vip-hero-1.webp') }}" class="sand-backdrop grayscale-[20%]" alt="Sand Texture">

            <!-- Title Layer (Behind/Around Image) -->
            <div class="hero-layer" id="layer-title">
                <div class="hero-main-title">
                    Welcome To Éclore Private<br>Circle. A World Beyond Luxury,<br>Reserved Only For The Few<br>Who Value Eternity.</span>
                </div>
            </div>

            <!-- Image Tile Layer (Front) -->
            <div class="hero-layer" id="layer-image">
                <div class="image-tile" id="hero-tile">
                    <img src="{{ asset('frontend/assets/vip-hero-2.webp') }}" alt="Artistry">
                    <div class="absolute bottom-10 left-0 w-full text-center px-12 pointer-events-none">
                        <p class="font-azeret text-[10px] tracking-[0.4em] uppercase text-white/80 leading-relaxed">
                            An invitation-only society created for those who value discretion.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Invitation Layout (Exact Image 2 Copy) -->
    <section class="invitation-section relative min-h-screen py-30 overflow-hidden flex items-center justify-center">
        <!-- Background Columns -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend/assets/vip-invitation-1.webp') }}" alt="Salon" class="w-full h-full object-cover grayscale-[20%]">
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-2">
                <div class="invitation-polaroid paper-texture" data-aos="fade-right">
                    <img src="{{ asset('frontend/assets/vip-ceo.webp') }}" alt="Portrait" class="w-full h-full object-cover">
                    <p class="font-azeret text-[11px] tracking-[0.4em] text-center text-gray-400 uppercase mt-4">A House Of Timeless Beauty.</p>
                </div>

                <div class="invitation-card paper-texture" data-aos="fade-left">
                    <div class="flex flex-col h-full justify-center px-10">
                        <p class="font-playfair text-2xl md:text-3xl text-gray-800 leading-normal italic mb-16">
                            "It Is My Pleasure To Invite You To Éclore, A Refined Space Created For Those Who Value Timeless Beauty And Quiet Sophistication."
                        </p>
                        <div class="text-right mt-10">
                            <p class="signature text-5xl text-[#C5B391] mb-2">Warmly,<br>Charlotte Marais</p>
                        </div>
                    </div>
                    <div class="absolute bottom-8 left-0 w-full flex justify-between px-10 font-azeret text-[8px] tracking-[0.4em] text-gray-400 uppercase border-t border-black/5 pt-4">
                        <span>TIMELESS.</span>
                        <span>PERSONAL.</span>
                        <span>PARIS INSPIRED.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Layout (Exact Image 3 Design) -->
    @php
        $today = now();
        $dates = [];
        for ($i = -3; $i <= 3; $i++) { $dates[] = $today->copy()->addDays($i)->day; }
    @endphp
    <section class="bg-[#F9F9F9] pt-16 pb-2 relative overflow-hidden">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mx-auto opacity-30 border-t">
                @foreach($dates as $index => $day)
                <div class="flex flex-col items-center {{ $index === 3 ? 'text-black' : 'text-gray-400' }}">
                    <div class="date-dot w-1 h-1 rounded-full mb-2 {{ $index === 3 ? 'bg-black' : 'bg-gray-300' }}"></div>
                    <span class="font-azeret text-[11px]">{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="relative flex flex-col items-center justify-center space-y-[-2rem] min-h-[120vh]">
            <div class="relative z-10">
                <div class="experience-text-behind group hover:text-gray-200 transition-colors">Personal Advisory</div>
                <div class="experience-floating-image left-[10%] top-[-20%] transform -rotate-12" data-speed="2">
                     <img src="{{ asset('frontend/assets/vip-membership-6.webp') }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="relative z-10">
                <div class="experience-text-behind group hover:text-gray-200 transition-colors">Maison Collaborations</div>
                <div class="experience-floating-image right-[5%] top-0 rotate-6" data-speed="-1.5">
                     <img src="{{ asset('frontend/assets/vip-membership-3.webp') }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="relative z-30 py-20">
                <h2 class="font-playfair text-8xl md:text-[10rem] text-gray-900 drop-shadow-sm">Private Viewings</h2>
            </div>

            <div class="relative z-10">
                <div class="experience-text-behind group hover:text-gray-200 transition-colors">Invitational Only Events</div>
                <div class="experience-floating-image right-[20%] bottom-[-30%] -rotate-6" data-speed="2.5">
                     <img src="{{ asset('frontend/assets/vip-membership-5.webp') }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Partner Bar -->
        <div class="flex flex-wrap justify-around items-center gap-x-12 gap-y-6">
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">HERMES</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">CHANEL</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">GUCCI</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">BOTTEGA VENETA</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">PORSCHE</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">APPLE</span>
            <span class="text-lg text-gray-300">●</span>
            <span class="text-[10px] tracking-[0.3em] uppercase text-gray-400 font-light">GIVENCHY</span>
            <span class="text-lg text-gray-300">●</span>
        </div>
    </section>

    <!-- Partners & Friends (Image 1 Style) -->
    <section class="bg-[#141414] pt-32 border-b border-white/5">
        <div class="container mx-auto px-6 text-center mb-32">
            <h2 class="font-playfair text-5xl md:text-7xl text-white mb-16" data-aos="fade-up">Partners & Friends</h2>
            
            <div class="flex flex-wrap justify-center items-center gap-4 max-w-5xl mx-auto">
                <div class="partner-grid-item w-24 h-24 md:w-32 md:h-32">
                    <img src="{{ asset('frontend/assets/partner-bottega-veneta-logo.webp') }}" class="w-full h-auto object-contain opacity-60">
                </div>
                <div class="partner-grid-item w-24 h-24 md:w-32 md:h-32">
                    <img src="{{ asset('frontend/assets/partner-givenchy-logo.webp') }}" class="w-full h-auto object-contain opacity-60">
                </div>
                <div class="partner-grid-item w-24 h-24 md:w-32 md:h-32">
                    <img src="{{ asset('frontend/assets/partner-hermes-logo.webp') }}" class="w-full h-auto object-contain opacity-60">
                </div>
                <div class="partner-grid-item w-24 h-24 md:w-32 md:h-32">
                    <img src="{{ asset('frontend/assets/partner-versace-logo.webp') }}" class="w-full h-auto object-contain opacity-60">
                </div>
                <div class="partner-grid-item w-24 h-24 md:w-32 md:h-32">
                    <img src="{{ asset('frontend/assets/partner-gucci-logo.webp') }}" class="w-full h-auto object-contain opacity-60">
                </div>
            </div>
        </div>

        <!-- Lifestyle Grid (Merged into Image 1 visual flow) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:h-[90vh]">
            <div class="relative group overflow-hidden">
                <img src="{{ asset('frontend/assets/vip-partner-1.webp') }}" class="w-full h-full object-cover grayscale transition-transform duration-1000 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all"></div>
            </div>
            <div class="relative group overflow-hidden">
                <img src="{{ asset('frontend/assets/vip-partner-2.webp') }}" class="w-full h-full object-cover grayscale transition-transform duration-1000 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all"></div>
            </div>
        </div>
    </section>

    <!-- Membership section on top of marquee (Image 2 Style) -->
    <section class="bg-white pt-40 pb-2 overflow-hidden">
        <div class="container mx-auto px-6 mb-32">
             <div class="flex flex-col md:flex-row justify-between items-start gap-12 max-w-7xl mx-auto">
                  <div class="max-w-xl">
                      <h2 class="font-playfair text-7xl md:text-9xl text-gray-900 leading-[0.9] mb-10" data-aos="fade-up">Access & Membership</h2>
                      <div class="flex items-center gap-4">
                          <div class="flex gap-1.5">
                              <span class="w-2.5 h-2.5 bg-black rounded-full"></span>
                              <span class="w-2.5 h-2.5 bg-black rounded-full"></span>
                          </div>
                          <span class="font-azeret text-[12px] tracking-[0.4em] text-gray-300 uppercase">[CIRCLE]</span>
                      </div>
                  </div>
                  <div class="max-w-md md:text-right" data-aos="fade-left">
                       <p class="font-azeret text-[11px] text-gray-500 tracking-widest leading-loose uppercase mb-12">
                           EXCLUSIVE ACCESS TO FORTHCOMING COLLECTIONS, PRIVATE PRESENTATIONS, AND INVITATION-ONLY GATHERINGS THROUGHOUT THE YEAR. MEMBERSHIP IS EXTENDED PERSONALLY FOLLOWING A PRIVATE APPOINTMENT AT OUR BOUTIQUE. WE LOOK FORWARD TO WELCOMING YOU.
                       </p>
                       <a href="{{ route('boutiques') }}" class="inline-flex items-center gap-4 bg-black text-white px-10 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#B6965D] transition-all">
                           <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                           Private Appointment
                       </a>
                  </div>
             </div>
        </div>

        <!-- Marquee Row -->
        <div class="marquee-container">
            @php
                $marqueeImgs = [
                    'vip-membership-1.webp', // Swapping for more "lifestyle" vibe as in image 2
                    'vip-membership-2.webp',
                    'vip-membership-3.webp',
                    'vip-membership-4.webp',
                    'vip-membership-5.webp'
                ];
                $allImgs = array_merge($marqueeImgs, $marqueeImgs, $marqueeImgs);
            @endphp
            @foreach($allImgs as $img)
            <div class="w-[30rem] flex-shrink-0 grayscale-[20%] hover:grayscale-0 transition-all duration-700">
                <img src="{{ asset('frontend/assets/'.$img) }}" class="w-full aspect-[4/5] object-cover">
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scene = document.getElementById('hero-scene');
        const tile = document.getElementById('hero-tile');
        const backdrop = document.querySelector('.sand-backdrop');
        const titleLayer = document.querySelector('.hero-main-title');

        window.addEventListener('scroll', function() {
            const rect = scene.getBoundingClientRect();
            const sceneHeight = scene.offsetHeight;
            const sceneTop = window.pageYOffset;
            
            // Progress through the scene (0 to 1)
            let progress = sceneTop / (sceneHeight - window.innerHeight);
            progress = Math.max(0, Math.min(1, progress));

            // 1. Background Fade-off into White (Reference Video Logic: Fades early)
            let backdropOpacity = 1 - (progress * 1.8); 
            if (backdrop) backdrop.style.opacity = Math.max(0, backdropOpacity);

            // 2. The Frame (Rapid Move Up)
            // Starts centered, moves up to clear viewport
            let tileMove = progress * 150; // High speed
            tile.style.transform = `translateY(${-tileMove}vh)`;

            // 3. The Text Layers (Slow Move + Fast Fade)
            // Title fade
            let titleFade = progress * 4; // reaches 1.0 at 25% progress for earlier reveal
            titleLayer.style.opacity = Math.min(1, titleFade);
            // Smaller vertical movement to keep it more "centered" looking
            titleLayer.style.transform = `translateY(${-progress * 10}vh)`;

            // Floating Polaroids inside Experience
            const floaters = document.querySelectorAll('.experience-floating-image');
            floaters.forEach(el => {
                const speed = parseFloat(el.getAttribute('data-speed')) || 2;
                const parent = el.closest('section');
                const pRect = parent.getBoundingClientRect();
                const offset = (window.innerHeight / 2) - (pRect.top + pRect.height / 2);
                if(Math.abs(offset) < 1500) {
                    el.style.transform = `translateY(${-offset * (speed/15)}px)`;
                }
            });
        });

        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({ duration: 1500, once: true });
        }
    });
</script>
@endpush
