@extends('layouts.app')

@section('title', 'Reset Password | Éclore')

@push('styles')
<style>
    .verification-page {
        width: 100%;
        min-height: calc(100vh - 104px);
        background-image: url('{{ asset("frontend/assets/category-rings.webp") }}');
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

    .form-group {
        margin-bottom: 2rem;
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

    .password-container {
        position: relative;
    }
    
    .password-toggle {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.5);
        padding: 0.5rem;
        transition: color 0.3s ease;
    }
    
    .password-toggle:hover {
        color: #B6965D;
    }

    /* Password Strength Display */
    .password-strength {
        margin-top: 0.5rem;
    }
    
    .strength-bar {
        width: 100%;
        height: 2px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 1px;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }
    
    .strength-fill {
        height: 100%;
        transition: all 0.3s ease;
        border-radius: 1px;
        width: 0;
    }
    
    .strength-weak .strength-fill { background: #ef4444; width: 25%; }
    .strength-fair .strength-fill { background: #f59e0b; width: 50%; }
    .strength-good .strength-fill { background: #10b981; width: 75%; }
    .strength-strong .strength-fill { background: #059669; width: 100%; }
    
    .strength-text {
        font-size: 0.6rem;
        font-family: 'Azeret Mono', monospace;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
    
    .strength-weak .strength-text { color: #ef4444; }
    .strength-fair .strength-text { color: #f59e0b; }
    .strength-good .strength-text { color: #10b981; }
    .strength-strong .strength-text { color: #059669; }

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
        cursor: pointer;
    }

    .btn-gold:hover {
        background: #D4AF37;
        transform: translateY(-2px);
    }
    
    .btn-gold:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
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
            <h1 class="hero-title">Reset Password</h1>
            <p class="hero-description">
                Restore your access to the Éclore sanctuary.
                <br><br>
                Please enter your new signature passphrase below to continue your journey.
            </p>
        </div>

        <!-- Action Form -->
        <div class="card-right" data-aos="fade-left" data-aos-delay="400">
            <div id="status-messages"></div>

            <form id="reset-password-form">
                @csrf
                <input type="hidden" id="token" name="token" value="{{ $token }}">
                
                <!-- New Password -->
                <div class="form-group">
                    <label for="password" class="form-label">NEW PASSPHRASE</label>
                    <div class="password-container">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input-premium" 
                            placeholder="••••••••••••"
                            required
                            minlength="8"
                        >
                        <button type="button" class="password-toggle" id="toggle-password">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="password-strength" style="display: none;">
                        <div class="strength-bar">
                            <div class="strength-fill"></div>
                        </div>
                        <div class="strength-text"></div>
                    </div>
                </div>
                
                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">CONFIRM PASSPHRASE</label>
                    <div class="password-container">
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-input-premium" 
                            placeholder="••••••••••••"
                            required
                        >
                        <button type="button" class="password-toggle" id="toggle-password-confirmation">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="btn-gold" id="reset-submit">
                        <span id="reset-text">RESTORE ACCESS</span>
                        <span id="reset-loading" style="display: none;">
                            <i data-lucide="loader-2" class="w-4 h-4 inline-block animate-spin mr-2"></i>
                            PROCESSING...
                        </span>
                    </button>
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
    
    // Password toggle functionality
    const passwordToggle = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    const confirmToggle = document.getElementById('toggle-password-confirmation');
    const confirmInput = document.getElementById('password_confirmation');
    
    if (passwordToggle && passwordInput) {
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.setAttribute('data-lucide', type === 'password' ? 'eye' : 'eye-off');
            lucide.createIcons();
        });
    }
    
    if (confirmToggle && confirmInput) {
        confirmToggle.addEventListener('click', function() {
            const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.setAttribute('data-lucide', type === 'password' ? 'eye' : 'eye-off');
            lucide.createIcons();
        });
    }
    
    // Password strength checker
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });
    }
    
    // Form submission
    const form = document.getElementById('reset-password-form');
    const submitBtn = document.getElementById('reset-submit');
    const resetText = document.getElementById('reset-text');
    const resetLoading = document.getElementById('reset-loading');
    const statusMessages = document.getElementById('status-messages');
    
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const token = document.getElementById('token').value;
            
            // Validate passwords match
            if (password !== passwordConfirmation) {
                showMessage('error', 'Passwords do not match.');
                return;
            }
            
            // Validate password strength
            if (password.length < 8) {
                showMessage('error', 'Password must be at least 8 characters long.');
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            resetText.style.display = 'none';
            resetLoading.style.display = 'inline';
            
            // Clear previous messages
            statusMessages.innerHTML = '';
            
            try {
                const response = await fetch('/reset-password', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        token: token,
                        password: password,
                        password_confirmation: passwordConfirmation
                    })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showMessage('success', 'Access restored successfully! You will be redirected to the sanctuary.');
                    setTimeout(() => {
                        window.location.href = '/';
                    }, 2000);
                } else {
                    showMessage('error', result.message || 'Verification failed. Please try again.');
                }
            } catch (error) {
                console.error('Error resetting password:', error);
                showMessage('error', 'A connection error occurred. Please try again.');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                resetText.style.display = 'inline';
                resetLoading.style.display = 'none';
            }
        });
    }
    
    function checkPasswordStrength(password) {
        const strengthContainer = document.getElementById('password-strength');
        const strengthText = strengthContainer.querySelector('.strength-text');
        
        if (password.length === 0) {
            strengthContainer.style.display = 'none';
            return;
        }
        
        strengthContainer.style.display = 'block';
        
        let score = 0;
        let feedback = '';
        
        if (password.length >= 8) score++;
        if (password.length >= 12) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;
        
        strengthContainer.className = 'password-strength';
        
        if (score < 3) {
            strengthContainer.classList.add('strength-weak');
            feedback = 'Weak';
        } else if (score < 4) {
            strengthContainer.classList.add('strength-fair');
            feedback = 'Fair';
        } else if (score < 6) {
            strengthContainer.classList.add('strength-good');
            feedback = 'Good';
        } else {
            strengthContainer.classList.add('strength-strong');
            feedback = 'Strong';
        }
        
        strengthText.textContent = feedback;
    }
    
    function showMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `status-message ${type}`;
        messageDiv.innerHTML = `<i data-lucide="${type === 'success' ? 'check-circle' : 'alert-circle'}" class="w-4 h-4"></i> ${message}`;
        statusMessages.appendChild(messageDiv);
        
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        if (type === 'success') {
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }
    }
});
</script>
@endsection