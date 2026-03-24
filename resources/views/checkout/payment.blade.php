@extends('checkout.layout')

@section('title', 'Payment Method')

@php
    $currentStep = 2;
@endphp

@section('content')
<div class="bg-white p-10 border border-gray-100">
    <h2 class="text-3xl text-[#1A1A1A] mb-12 pb-6 border-b border-gray-50 font-playfair">Payment Method</h2>
    
    <form action="{{ route('checkout.validate-payment') }}" method="POST" id="payment-form">
        @csrf
        
        <!-- Payment Loading Indicator -->
        <div id="payment-loading" class="hidden bg-gray-50 border border-gray-200 text-[#1A1A1A] px-6 py-4 mb-8">
            <div class="flex items-center mono text-xs tracking-widest uppercase">
                <div class="animate-spin h-3 w-3 border-b-2 border-[#1A1A1A] mr-3"></div>
                Initializing Secure Gateway...
            </div>
        </div>
        
        <!-- Payment Method Selection -->
        <div class="space-y-6 mb-12">
            <!-- Cash on Delivery -->
            <div class="payment-method-option p-8 border transition-all duration-300 {{ old('payment_method') == 'cod' ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }} {{ !$codEligible ? 'opacity-50' : '' }}" style="transition: none !important;">
                <label class="flex items-start {{ !$codEligible ? 'cursor-not-allowed' : 'cursor-pointer' }}">
                    <input type="radio" 
                           name="payment_method" 
                           value="cod" 
                           class="custom-radio mt-1 mr-6"
                           {{ old('payment_method') == 'cod' ? 'checked' : '' }}
                           {{ !$codEligible ? 'disabled' : '' }}
                           onclick="updatePaymentMethodBorders(this);"
                           onchange="updatePaymentMethodBorders(this);">
                    <div class="flex-1">
                        <div class="flex items-center mb-3">
                            <i data-lucide="banknote" class="w-4 h-4 text-gray-400 mr-4"></i>
                            <span class="text-[10px] text-[#1A1A1A] tracking-[0.2em] uppercase font-medium {{ !$codEligible ? 'text-gray-400' : '' }}">Cash on Delivery</span>
                        </div>
                        <p class="text-sm {{ !$codEligible ? 'text-gray-400' : 'text-gray-400' }} font-light mb-0 leading-relaxed">
                            Complete your exquisite acquisition with treasury settlement upon receipt.
                            @if(!$codEligible)
                                <span class="text-red-400 text-[9px] mono uppercase tracking-wider block mt-3">(Limited to orders under €50.00)</span>
                            @endif
                        </p>
                </div>
            </label>
            </div>
            
            <!-- Saved Payment Methods -->
            @if($paymentMethods->count() > 0)
                @foreach($paymentMethods as $paymentMethod)
                <div class="payment-method-option p-8 border transition-all duration-300 {{ old('payment_method') == 'existing' && old('payment_method_id') == $paymentMethod->id ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }}" style="transition: none !important;">
                    <label class="flex items-start cursor-pointer">
                        <input type="radio" 
                               name="payment_method" 
                               value="existing" 
                               data-payment-method-id="{{ $paymentMethod->id }}"
                               class="custom-radio mt-1 mr-6"
                               {{ old('payment_method') == 'existing' && old('payment_method_id') == $paymentMethod->id ? 'checked' : '' }}
                               onclick="updatePaymentMethodBorders(this);"
                               onchange="updatePaymentMethodBorders(this);">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    @if($paymentMethod->isCard())
                                        <i data-lucide="credit-card" class="w-4 h-4 text-gray-400 mr-4"></i>
                                    @else
                                        <i data-lucide="smartphone" class="w-4 h-4 text-gray-400 mr-4"></i>
                                    @endif
                                    <span class="text-[10px] text-[#1A1A1A] tracking-[0.2em] uppercase font-medium">{{ $paymentMethod->getDisplayName() }}</span>
                                    @if($paymentMethod->is_default)
                                        <span class="ml-4 px-2 py-0.5 text-[8px] mono tracking-[0.2em] bg-[#1A1A1A] text-white uppercase">PRIMARY</span>
                                    @endif
                                </div>
                                @if($paymentMethod->isCard() && $paymentMethod->isExpired())
                                    <span class="text-red-500 text-[8px] mono tracking-[0.2em] uppercase border border-red-100 px-2 py-0.5">EXPIRED</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-400 font-light mb-0">
                                @if($paymentMethod->isCard())
                                    {{ $paymentMethod->getMaskedNumber() }} &middot; Valid until {{ $paymentMethod->getFormattedExpiry() }}
                                @else
                                    {{ $paymentMethod->gcash_name }}
                                @endif
                            </p>
                        </div>
                    </label>
                </div>
                @endforeach
            @endif
            
            <!-- Online Payment via Xendit -->
            <div class="payment-method-option p-8 border transition-all duration-300 {{ old('payment_method') == 'xendit' || old('payment_method') == 'new' || !old('payment_method') ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }}" style="transition: none !important;">
                <label class="flex items-start cursor-pointer">
                    <input type="radio" 
                           name="payment_method" 
                           value="xendit" 
                           class="custom-radio mt-1 mr-6"
                           {{ old('payment_method') == 'xendit' || old('payment_method') == 'new' || !old('payment_method') ? 'checked' : '' }}
                           onclick="updatePaymentMethodBorders(this);"
                           onchange="updatePaymentMethodBorders(this);">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <i data-lucide="credit-card" class="w-4 h-4 text-gray-400 mr-4"></i>
                                <span class="text-[10px] text-[#1A1A1A] tracking-[0.2em] uppercase font-medium">Digital Treasury Gateway</span>
                            </div>
                            <div class="flex items-center border border-gray-100 px-2 py-0.5 bg-white">
                                <span class="text-[8px] mono tracking-[0.2em] text-[#B6965D] uppercase mt-0.5">SECURE PORTAL</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-400 font-light mb-6 leading-relaxed">
                            Process your acquisition securely via our premium encrypted gateway.
                        </p>
                        <div class="flex items-center gap-6 flex-wrap">
                            <span class="text-[9px] mono tracking-[0.2em] text-gray-400 uppercase">CURATED PARTNERS &middot;</span>
                            <span class="text-[9px] mono tracking-[0.25em] text-[#1A1A1A] uppercase">VISA</span>
                            <span class="text-[9px] mono tracking-[0.25em] text-[#1A1A1A] uppercase">Mastercard</span>
                            <span class="text-[9px] mono tracking-[0.25em] text-[#1A1A1A] uppercase">GCash</span>
                            <span class="text-[9px] mono tracking-[0.25em] text-[#1A1A1A] uppercase">PayMaya</span>
                        </div>
                </div>
            </label>
        </div>
    </div>
        
        <!-- Hidden field for payment method ID -->
        <input type="hidden" name="payment_method_id" id="payment_method_id" value="">
        
        <!-- COD Form -->
        <div id="cod-form" class="hidden mb-12">
            <div class="bg-gray-50 border border-gray-100 p-8">
                <div class="flex items-start">
                    <i data-lucide="info" class="w-4 h-4 text-[#B6965D] mr-4 mt-1 flex-shrink-0"></i>
                    <p class="text-sm text-gray-400 leading-relaxed font-light">
                        Please ensure the corresponding treasury is available upon arrival. A digital authentication of payment will be issued post-settlement.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Xendit Payment Info -->
        <div id="xendit-form" class="hidden mb-12">
            <div class="bg-gray-50 border border-gray-100 p-8">
                <div class="flex items-start">
                    <i data-lucide="shield-check" class="w-4 h-4 text-[#B6965D] mr-4 mt-1 flex-shrink-0"></i>
                    <div class="text-sm text-gray-400 leading-relaxed">
                        <p class="text-[#1A1A1A] text-[9px] mono uppercase tracking-[0.2em] mb-3 font-medium">PROTECTED ENVIRONMENT</p>
                        <p class="font-light">You will be securely redirected to a high-encryption portal. Your credentials remain private and are never stored within the atelier's archives.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center mt-16 pt-10 border-t border-gray-50 gap-6">
            <a href="{{ route('checkout.index') }}" 
               class="w-full sm:w-auto text-[10px] text-gray-400 hover:text-[#1A1A1A] mono uppercase tracking-[0.25em] transition-colors text-center order-2 sm:order-1">
                Back to Shipping
            </a>
            <button type="submit" 
                    id="continue-to-review-btn"
                    class="btn-gold w-full sm:w-auto order-1 sm:order-2">
                REVIEW ORDER
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function updatePaymentMethodBorders(selectedRadio) {
    if (!selectedRadio) return;
    
    // Update borders instantly - no transitions, no hover effects, no delays
    document.querySelectorAll('.payment-method-option').forEach(option => {
        // Force remove all transitions and inline styles immediately
        option.style.setProperty('transition', 'none', 'important');
        option.style.setProperty('transition-duration', '0s', 'important');
        option.style.borderColor = ''; // Clear any inline border color
        
        // Get the radio button within this option
        const radioInOption = option.querySelector('input[type="radio"][name="payment_method"]');
        const isSelected = radioInOption && (radioInOption === selectedRadio || radioInOption.checked);
        
        // Remove all border classes first
        option.classList.remove('border-[#1A1A1A]', 'bg-gray-50', 'border-gray-200');
        
        if (isSelected) {
            option.classList.add('border-[#1A1A1A]', 'bg-gray-50');
        } else {
            option.classList.add('border-gray-200');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Get payment method radios and forms
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const codForm = document.getElementById('cod-form');
    const existingPaymentForm = document.getElementById('existing-payment-form');
    const xenditForm = document.getElementById('xendit-form');
    const paymentMethodIdField = document.getElementById('payment_method_id');
    
    // Initialize borders for selected payment method
    const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
    if (selectedMethod) {
        updatePaymentMethodBorders(selectedMethod);
    }
    
    // Handle payment method selection
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            updatePaymentMethodBorders(this);
            
            // Hide all forms
            if (codForm) codForm.classList.add('hidden');
            if (existingPaymentForm) existingPaymentForm.classList.add('hidden');
            if (xenditForm) xenditForm.classList.add('hidden');
            
            // Clear payment_method_id
            if (paymentMethodIdField) {
                paymentMethodIdField.value = '';
            }
            
            // Show appropriate form
            if (this.value === 'cod') {
                if (codForm) codForm.classList.remove('hidden');
            } else if (this.value === 'existing') {
                const selectedRadio = document.querySelector('input[name="payment_method"][value="existing"]:checked');
                if (selectedRadio && paymentMethodIdField) {
                    const paymentMethodId = selectedRadio.getAttribute('data-payment-method-id');
                    if (paymentMethodId) {
                        paymentMethodIdField.value = paymentMethodId;
                    }
                }
                if (existingPaymentForm) existingPaymentForm.classList.remove('hidden');
            } else if (this.value === 'xendit') {
                if (xenditForm) xenditForm.classList.remove('hidden');
            }
        });
    });
    
    // Initialize form visibility based on selected method
    if (selectedMethod) {
        selectedMethod.dispatchEvent(new Event('change'));
    }
    
    // Form submission handler
    const paymentForm = document.getElementById('payment-form');
    if (paymentForm) {
        paymentForm.addEventListener('submit', function(e) {
            const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
            
            if (!selectedMethod) {
                e.preventDefault();
                alert('Please select a payment method.');
                return false;
            }
            
            // For COD, ensure payment_method_id is cleared
            if (selectedMethod.value === 'cod') {
                if (paymentMethodIdField) {
                    paymentMethodIdField.value = '';
                }
            }
            
            // For xendit, also clear payment_method_id
            if (selectedMethod.value === 'xendit') {
                if (paymentMethodIdField) {
                    paymentMethodIdField.value = '';
                }
            }
            
            // Disable button to prevent double submission
            const continueBtn = document.getElementById('continue-to-review-btn');
            if (continueBtn) {
                continueBtn.disabled = true;
                continueBtn.textContent = 'Processing...';
            }
        });
    }
});
</script>
@endpush
