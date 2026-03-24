@extends('layouts.app')

@section('title', 'Verify Your Email | Éclore')

@push('styles')
<style>
    .verification-page {
        width: 100%;
        min-height: calc(100vh - 104px);
        background-image: url('{{ asset("frontend/assets/category-earrings.webp") }}');
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
    }

    .btn-gold:hover {
        background: #D4AF37;
        transform: translateY(-2px);
    }

    .btn-outline {
        width: 100%;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        padding: 1.25rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: 1rem;
    }

    .btn-outline:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 1);
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

    .status-message.error {
        background: rgba(239, 68, 68, 0.1);
        border-color: rgba(239, 68, 68, 0.3);
        color: #ef4444;
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
            <h1 class="hero-title">Verify Your Email</h1>
            <p class="hero-description">
                Welcome to the Éclore sanctuary. We have dispatched a verification link to your electronic address. 
                <br><br>
                Please follow the link to confirm your identity and unlock the full experience of our curated collections.
            </p>
        </div>

        <!-- Action Form -->
        <div class="card-right" data-aos="fade-left" data-aos-delay="400">
            <div id="status-messages"></div>

            <form id="resend-verification-form" class="space-y-8">
                @csrf
                <div class="form-group mb-10">
                    <label for="email" class="form-label">AUTHENTICATION EMAIL</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input-premium" 
                        placeholder="your@email.com"
                        value="{{ old('email', session('verification_email')) }}"
                        required
                    >
                </div>

                <div class="flex flex-col gap-4">
                    <button type="submit" class="btn-gold" id="resend-btn">
                        <span id="resend-text">RESEND VERIFICATION</span>
                        <span id="resend-loading" style="display: none;">
                            <i data-lucide="loader-2" class="w-4 h-4 inline-block animate-spin mr-2"></i>
                            PROCESSING...
                        </span>
                    </button>
                    
                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-white/10"></div>
                        </div>
                        <div class="relative flex justify-center text-[8px] uppercase tracking-[0.3em] text-white/30">
                            <span class="bg-transparent px-4">OR</span>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="btn-outline">
                        SIGN IN INSTEAD
                    </a>
                    <a href="{{ route('home') }}" class="btn-outline">
                        RETURN TO HOME
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    // Get email from sessionStorage if available
    const emailFromStorage = sessionStorage.getItem('verification_email');
    if (emailFromStorage) {
        const emailInput = document.getElementById('email');
        if (emailInput && !emailInput.value) {
            emailInput.value = emailFromStorage;
        }
        // Clear from sessionStorage after using it
        sessionStorage.removeItem('verification_email');
    }
    
    // Handle resend verification form
    const resendForm = document.getElementById('resend-verification-form');
    const resendBtn = document.getElementById('resend-btn');
    const resendText = document.getElementById('resend-text');
    const resendLoading = document.getElementById('resend-loading');
    const statusMessages = document.getElementById('status-messages');
    
    if (resendForm) {
        resendForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const email = formData.get('email');
            
            // Show loading state
            resendBtn.disabled = true;
            resendText.style.display = 'none';
            resendLoading.style.display = 'inline-flex';
            
            // Clear previous messages
            statusMessages.innerHTML = '';
            
            try {
                const response = await fetch('{{ route("auth.resend-verification") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showMessage('success', 'Verification email sent! Please check your inbox.');
                } else {
                    showMessage('error', result.message || 'Failed to send verification email. Please try again.');
                }
            } catch (error) {
                console.error('Error sending verification email:', error);
                showMessage('error', 'Error sending verification email. Please try again.');
            } finally {
                // Reset button state
                resendBtn.disabled = false;
                resendText.style.display = 'inline';
                resendLoading.style.display = 'none';
            }
        });
    }
    
    function showMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `status-message ${type}`;
        messageDiv.innerHTML = `<i data-lucide="${type === 'success' ? 'check-circle' : 'alert-circle'}" class="w-4 h-4"></i> ${message}`;
        statusMessages.appendChild(messageDiv);
        
        // Re-initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        // Auto-hide success messages after 5 seconds
        if (type === 'success') {
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }
    }
});
</script>
@endsection