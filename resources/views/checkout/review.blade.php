@extends('checkout.layout')

@section('title', 'Order Review')

@php
    $currentStep = 3;
@endphp

@section('content')
<div class="bg-white p-10 border border-gray-100">
    <h2 class="text-3xl text-[#1A1A1A] mb-12 pb-6 border-b border-gray-50 font-playfair">Review Acquisition</h2>
    
    <form action="{{ route('checkout.process') }}" method="POST" id="review-form">
        @csrf
        
        <!-- Shipping Information -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8 pb-3 border-b border-gray-50">
                <h3 class="text-xl text-[#1A1A1A] font-playfair">Delivery Mandate</h3>
                <a href="{{ route('checkout.index') }}" class="text-[9px] mono uppercase tracking-[0.2em] text-gray-400 hover:text-[#1A1A1A] transition-colors border-b border-gray-100 hover:border-[#1A1A1A] pb-1">
                    AMEND DETAILS
                </a>
            </div>
            <div class="p-8 border border-gray-50 bg-[#FAFAFA] grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Info columns -->
                <div class="space-y-6">
                    <div>
                        <p class="text-[9px] mono tracking-[0.2em] text-gray-400 uppercase mb-2">Recipient</p>
                        <p class="text-sm text-[#1A1A1A] font-light">{{ $shippingInfo['first_name'] }} {{ $shippingInfo['last_name'] }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] mono tracking-[0.2em] text-gray-400 uppercase mb-2">Concierge Reach</p>
                        <p class="text-sm text-[#1A1A1A] font-light leading-relaxed">{{ $shippingInfo['email'] }}<br>{{ $shippingInfo['phone'] }}</p>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <p class="text-[9px] mono tracking-[0.2em] text-gray-400 uppercase mb-2">Destination</p>
                        <p class="text-sm text-[#1A1A1A] leading-relaxed font-light">
                            {{ $shippingInfo['address_line_1'] }}
                            @if(isset($shippingInfo['address_line_2']) && $shippingInfo['address_line_2'])
                                <br>{{ $shippingInfo['address_line_2'] }}
                            @endif
                            <br>{{ $shippingInfo['city'] }}, {{ $shippingInfo['province'] ?? '' }}
                            <br>{{ $shippingInfo['region'] }} {{ $shippingInfo['zip_code'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payment Method -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8 pb-3 border-b border-gray-50">
                <h3 class="text-xl text-[#1A1A1A] font-playfair">Payment Summary</h3>
                <a href="{{ route('checkout.payment') }}" class="text-[9px] mono uppercase tracking-[0.2em] text-gray-400 hover:text-[#1A1A1A] transition-colors border-b border-gray-100 hover:border-[#1A1A1A] pb-1">
                    AMEND METHOD
                </a>
            </div>
            <div class="p-8 border border-gray-50 bg-[#FAFAFA]">
                @if($paymentInfo['payment_method'] === 'cod')
                    <div class="flex items-center">
                        <i data-lucide="banknote" class="w-4 h-4 text-gray-400 mr-4"></i>
                        <div>
                            <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">Cash on Delivery</p>
                            <p class="text-sm text-gray-400 font-light">Treasury settlement required upon receipt.</p>
                        </div>
                    </div>
                @elseif($paymentInfo['payment_method'] === 'existing' && $paymentMethod)
                    <div class="flex items-center">
                        @if($paymentMethod->isCard())
                            <i data-lucide="credit-card" class="w-4 h-4 text-gray-400 mr-4"></i>
                        @else
                            <i data-lucide="smartphone" class="w-4 h-4 text-gray-400 mr-4"></i>
                        @endif
                        <div>
                            <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">{{ $paymentMethod->getDisplayName() }}</p>
                            <p class="text-sm text-gray-400 font-light mono uppercase tracking-wider">
                                @if($paymentMethod->isCard())
                                    {{ $paymentMethod->getMaskedNumber() }} &middot; Exp {{ $paymentMethod->getFormattedExpiry() }}
                                @else
                                    {{ $paymentMethod->gcash_name }}
                                @endif
                            </p>
                        </div>
                    </div>
                @elseif($paymentInfo['payment_method'] === 'xendit')
                    <div class="flex items-center">
                        <i data-lucide="shield-check" class="w-4 h-4 text-gray-400 mr-4"></i>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">Digital Treasury Gateway</p>
                                    <p class="text-sm text-gray-400 font-light">Secure transaction via fortifed Xendit portal.</p>
                                </div>
                                <span class="text-[8px] text-[#B6965D] border border-gray-100 px-2 py-0.5 bg-white mono tracking-[0.25em] uppercase">SECURED</span>
                            </div>
                        </div>
                    </div>
                @elseif($paymentInfo['payment_method'] === 'new')
                    <div class="flex items-center">
                        @if($paymentInfo['new_payment_type'] === 'card')
                            <i data-lucide="credit-card" class="w-4 h-4 text-gray-400 mr-4"></i>
                            <div>
                                <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">Direct Transfer</p>
                                <p class="text-sm text-gray-400 font-light">{{ $paymentInfo['card_holder_name'] }}</p>
                            </div>
                        @else
                            <i data-lucide="smartphone" class="w-4 h-4 text-gray-400 mr-4"></i>
                            <div>
                                <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">Digital Wallet</p>
                                <p class="text-sm text-gray-400 font-light">{{ $paymentInfo['gcash_name'] }}</p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Order Items -->
        <div class="mb-12 border-t border-gray-50 pt-16">
            <h3 class="text-2xl text-[#1A1A1A] mb-10 font-playfair">Your Selection</h3>
            <div class="divide-y divide-gray-50">
                @foreach($cartItems as $item)
                <div class="flex items-center py-8 gap-8">
                    <div class="w-24 h-32 bg-gray-50 flex items-center justify-center flex-shrink-0 overflow-hidden border border-gray-100">
                        @if($item->product && $item->product->images)
                            @php
                                $images = is_string($item->product->images) ? json_decode($item->product->images, true) : $item->product->images;
                                $firstImage = is_array($images) && count($images) > 0 ? $images[0] : null;
                            @endphp
                            @if($firstImage)
                                <img src="{{ Storage::url($firstImage) }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                            @else
                                <i data-lucide="image" class="w-6 h-6 text-gray-200"></i>
                            @endif
                        @else
                            <i data-lucide="image" class="w-6 h-6 text-gray-200"></i>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">{{ $item->product_name }}</h4>
                        <p class="text-[9px] text-gray-400 mono mb-1 uppercase tracking-wider">SKU: {{ $item->product_sku }}</p>
                        <p class="text-[9px] text-gray-400 mono uppercase tracking-wider">Quantity: {{ $item->quantity }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-[#1A1A1A] font-light">€{{ number_format($item->total_price, 2) }}</p>
                        @if($item->quantity > 1)
                        <p class="text-[9px] text-gray-400 mono mt-2 uppercase tracking-wider">€{{ number_format($item->unit_price, 2) }} unit</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Order Notes -->
        <div class="mb-10">
            <label for="notes" class="form-label-premium">Order Notes (Optional)</label>
            <textarea id="notes" 
                      name="notes" 
                      rows="3" 
                      placeholder="Any special instructions or gift messages..."
                      class="form-input-premium bg-transparent resize-none"></textarea>
        </div>
        
        <!-- Terms and Conditions -->
        <div class="mb-10 mt-10 pt-8 border-t border-gray-100">
            <label class="flex items-start cursor-pointer group">
                <div class="mt-1">
                    <input type="checkbox" 
                           id="terms_accepted" 
                           name="terms_accepted" 
                           class="w-4 h-4 border border-gray-300 text-[#1A1A1A] rounded-none focus:ring-0 cursor-pointer"
                           required>
                </div>
                <span class="ml-3 text-sm text-gray-600 leading-relaxed font-light">
                    I agree to the <a href="#" class="text-[#1A1A1A] underline hover:text-[#B6965D] transition-colors">Terms and Conditions</a> 
                    and confirm I have read the <a href="#" class="text-[#1A1A1A] underline hover:text-[#B6965D] transition-colors">Privacy Policy</a>
                </span>
            </label>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center mt-16 pt-10 border-t border-gray-50 gap-6">
            <a href="{{ route('checkout.payment') }}" 
               class="w-full sm:w-auto text-[10px] text-gray-400 hover:text-[#1A1A1A] mono uppercase tracking-[0.25em] transition-colors text-center order-2 sm:order-1">
                Back to Payment
            </a>
            <button type="submit" 
                    id="place-order-btn"
                    class="btn-gold w-full sm:w-auto order-1 sm:order-2 disabled:opacity-50 disabled:cursor-not-allowed">
                CONFIRM ACQUISITION
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('review-form');
    const placeOrderBtn = document.getElementById('place-order-btn');
    const termsCheckbox = document.getElementById('terms_accepted');
    
    // Handle form submission
    form.addEventListener('submit', function(e) {
        if (!termsCheckbox.checked) {
            e.preventDefault();
            alert('Please accept the Terms and Conditions to continue.');
            return;
        }
        
        // Disable button to prevent double submission
        placeOrderBtn.disabled = true;
        placeOrderBtn.textContent = 'Processing...';
    });
    
    // Enable/disable place order button based on terms acceptance
    termsCheckbox.addEventListener('change', function() {
        placeOrderBtn.disabled = !this.checked;
    });
    
    // Initialize button state
    placeOrderBtn.disabled = !termsCheckbox.checked;
});
</script>
@endpush
