@extends('layouts.app')

@section('title', 'Check Your Email | Éclore')

@push('styles')
<style>
    .verification-page {
        width: 100%;
        min-height: calc(100vh - 104px);
        background-image: url('{{ asset("frontend/assets/category-bracelet.webp") }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 4rem 1rem;
    }

    .verification-page::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1;
    }

    .glass-card {
        width: 100%;
        max-width: 900px;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        position: relative;
        z-index: 10;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .card-left {
        padding: 5rem 4rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(0, 0, 0, 0.2);
    }

    .card-right {
        padding: 5rem 4rem;
        background: rgba(255, 255, 255, 0.02);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 300;
        line-height: 1.1;
        letter-spacing: -0.02em;
        color: #fff;
        margin-bottom: 2rem;
    }

    .hero-description {
        font-family: 'Azeret Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.1em;
        line-height: 2.2;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
    }

    .form-label {
        font-family: 'Azeret Mono', monospace;
        font-size: 0.6rem;
        letter-spacing: 0.2em;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-input-premium {
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1rem 0;
        color: #fff;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .form-input-premium:focus {
        outline: none;
        border-bottom-color: #B6965D;
    }
    
    .form-input-premium[readonly] {
        opacity: 0.7;
        cursor: not-allowed;
        border-bottom-style: dashed;
    }

    .btn-gold {
        width: 100%;
        background: #B6965D;
        color: #fff;
        padding: 1.25rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: none;
        margin-top: 1rem;
        cursor: pointer;
        display: block;
        text-align: center;
    }

    .btn-gold:hover {
        background: #D4AF37;
        transform: translateY(-2px);
    }

    .status-message {
        font-family: 'Azeret Mono', monospace;
        font-size: 0.7rem;
        padding: 1.25rem;
        margin-bottom: 2rem;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: fadeIn 0.4s ease-out;
    }

    .status-message.success {
        background: rgba(182, 150, 93, 0.1);
        border-color: rgba(182, 150, 93, 0.3);
        color: #B6965D;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .glass-card {
            grid-template-columns: 1fr;
            margin: 0 1rem;
        }
        .card-left {
            border-right: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 4rem 2rem;
        }
        .card-right {
            padding: 4rem 2rem;
        }
    }
</style>
@endpush

@section('content')
<div class="verification-page">
    <div class="glass-card" data-aos="zoom-in">
        <!-- Sidebar Content -->
        <div class="card-left" data-aos="fade-right" data-aos-delay="200">
            <h1 class="hero-title">Check Your Email</h1>
            <p class="hero-description">
                A secure login link has been dispatched to your designated electronic address.
                <br><br>
                Please verify your inbox to seamlessly access the Éclore sanctuary.
            </p>
        </div>

        <!-- Action Form -->
        <div class="card-right" data-aos="fade-left" data-aos-delay="400">
            <div id="status-messages">
                <div class="status-message success">
                    <i data-lucide="check-circle" class="w-4 h-4"></i> Magic link successfully sent.
                </div>
            </div>

            <form class="space-y-8">
                <div class="form-group mb-10">
                    <label class="form-label">AUTHENTICATION EMAIL</label>
                    <input 
                        type="email" 
                        class="form-input-premium" 
                        placeholder="your@email.com"
                        value="{{ session('email') ?? '' }}"
                        readonly
                    >
                </div>

                <div class="flex flex-col gap-4">
                    <a href="{{ route('login') }}" class="btn-gold">
                        RETURN TO SIGN IN
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>
@endsection
