@extends('checkout.layout')

@section('title', 'Shipping Information')

@php
    $currentStep = 1;
@endphp

@section('content')
<div class="bg-white p-10 border border-gray-100">
    <h2 class="text-3xl text-[#1A1A1A] mb-12 pb-6 border-b border-gray-50 font-playfair">Shipping Details</h2>
    
    <form action="{{ route('checkout.validate-shipping') }}" method="POST" id="shipping-form">
        @csrf
        <input type="hidden" name="address_option" id="address_option" value="{{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') }}">
        
        <!-- Address Selection -->
        <div class="mb-12">
            <label class="form-label-premium mb-6">Select Destination</label>
            <div class="space-y-6">
                <!-- Default Address Option -->
                <label class="flex items-start p-8 border transition-all duration-300 cursor-pointer {{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') === 'default' && $isDefaultAddressComplete ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }}" style="transition: none !important;">
                    <input type="radio" 
                           name="address_option_radio" 
                           value="default" 
                           class="custom-radio mt-1 mr-6"
                           {{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') === 'default' && $isDefaultAddressComplete ? 'checked' : '' }}
                           {{ !$isDefaultAddressComplete ? 'disabled' : '' }}
                           onchange="document.getElementById('address_option').value='default'; toggleAddressForms();">
                <div class="flex-1">
                        <div class="text-[10px] text-[#1A1A1A] tracking-[0.2em] uppercase mb-3 font-medium">Primary Atelier Address</div>
                        <div class="text-sm text-gray-400 leading-relaxed font-light">
                            @if($isDefaultAddressComplete && ($user->street || $user->city || $user->province))
                                {{ $user->street ?? '' }}<br>
                                {{ $user->barangay ?? '' }}{{ $user->barangay ? ', ' : '' }}{{ $user->city ?? '' }}<br>
                                @if($user->province)
                                    {{ $user->province }}{{ $user->region ? ', ' : '' }}
                                @endif
                                {{ $user->region ?? '' }} {{ $user->zip_code ?? '' }}
                            @else
                                <span class="text-red-400">Address profile incomplete</span>
                            @endif
                        </div>
                        @if(!$isDefaultAddressComplete)
                            <div class="mt-6 p-4 bg-red-50/30 border border-red-100 text-[9px] text-red-500 mono tracking-[0.2em] uppercase">
                                Please provide an alternative address below or 
                                <a href="{{ route('account') }}" class="underline hover:text-red-700">complete profile</a>.
                            </div>
                        @endif
                </div>
            </label>
            
                <!-- New Address Option -->
                <label class="flex items-start p-8 border transition-all duration-300 cursor-pointer {{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') === 'custom' ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }}" style="transition: none !important;">
                    <input type="radio" 
                           name="address_option_radio" 
                           value="custom" 
                           class="custom-radio mt-1 mr-6"
                           {{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') === 'custom' || !$isDefaultAddressComplete ? 'checked' : '' }}
                           onchange="document.getElementById('address_option').value='custom'; toggleAddressForms();">
                    <div class="flex-1">
                        <div class="text-[10px] text-[#1A1A1A] tracking-[0.2em] uppercase mb-3 font-medium">Alternative Destination</div>
                        <div class="text-sm text-gray-400 font-light">Enter a unique delivery location for this acquisition.</div>
                </div>
            </label>
        </div>
    </div>
    
        <!-- New Address Form -->
        <div id="new-address-form" class="space-y-6 mt-4 {{ old('address_option', $isDefaultAddressComplete ? 'default' : 'custom') === 'default' ? 'hidden' : '' }}">
            <!-- Street | Barangay -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="address_line_1" class="form-label-premium">Street *</label>
                    <input type="text" 
                           id="address_line_1" 
                           name="address_line_1" 
                           value="{{ old('address_line_1', $user->street) }}"
                           class="form-input-premium @error('address_line_1') border-red-500 @enderror"
                           required>
                    @error('address_line_1')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="barangay" class="form-label-premium">Barangay *</label>
                    <select id="barangay" 
                            name="barangay" 
                            class="form-input-premium @error('barangay') border-red-500 @enderror"
                            data-required="true">
                        <option value="">Select Barangay</option>
                    </select>
                    @error('barangay')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- City | ZIP Code -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="city" class="form-label-premium">City/Municipality *</label>
                    <select id="city" 
                            name="city" 
                            class="form-input-premium @error('city') border-red-500 @enderror"
                            data-required="true">
                        <option value="">Select City/Municipality</option>
                    </select>
                    @error('city')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="zip_code" class="form-label-premium">ZIP Code *</label>
                    <input type="text" 
                           id="zip_code" 
                           name="zip_code" 
                           value="{{ old('zip_code', $user->zip_code) }}"
                           class="form-input-premium @error('zip_code') border-red-500 @enderror"
                           required>
                    @error('zip_code')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Province | Region -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="province" class="form-label-premium">Province</label>
                    <select id="province" 
                            name="province" 
                            class="form-input-premium @error('province') border-red-500 @enderror"
                            disabled>
                        <option value="">Select Province (Optional)</option>
                    </select>
                    @error('province')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="region" class="form-label-premium">Region *</label>
                    <select id="region" 
                            name="region" 
                            class="form-input-premium @error('region') border-red-500 @enderror"
                            data-required="true">
                        <option value="">Select Region</option>
                    </select>
                    @error('region')
                        <p class="mt-2 text-xs text-red-500 mono uppercase">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Save as Default Checkbox -->
            @if(!$isDefaultAddressComplete)
            <div class="mt-8">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" 
                           name="save_as_default" 
                           value="1"
                           class="w-4 h-4 border border-gray-300 text-[#1A1A1A] rounded-none focus:ring-0">
                    <span class="ml-3 text-sm text-gray-600">Save this address to my profile</span>
                </label>
            </div>
            @endif
        </div>
        
        <!-- Shipping Method Selection -->
        <div class="mb-12 mt-16 border-t border-gray-50 pt-16">
            <h3 class="text-2xl text-[#1A1A1A] mb-10 font-playfair">Delivery Mode</h3>
            
            <!-- Auto-detected Free Shipping -->
            @if($freeShippingMethod)
                <div class="mb-6 p-8 border bg-white shipping-method-option rounded-none" data-method-id="{{ $freeShippingMethod->id }}" style="transition: none !important;">
                    <div class="flex items-start">
                        <input type="radio" 
                               name="shipping_method_radio" 
                               value="free" 
                               class="custom-radio mt-1 mr-6" 
                               checked
                               onchange="updateShippingMethod('free', {{ $freeShippingMethod->id }}, 0);" 
                               onclick="updateShippingMethodBorders(this);">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">{{ $freeShippingMethod->name }}</div>
                                    <div class="text-sm text-gray-400 font-light">{{ $freeShippingMethod->description }}</div>
                                    <div class="text-[9px] text-[#B6965D] mono mt-4 uppercase tracking-[0.15em]">Estimated Delivery: {{ $freeShippingMethod->getEstimatedDeliveryDays() }}</div>
                                </div>
                                <div class="text-[10px] mono tracking-[0.25em] text-[#B6965D] uppercase">COMPLIMENTARY</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Auto-detected Weight-Based Shipping -->
            @if($weightBasedMethod && $totalWeight > 0 && !$freeShippingMethod)
                <div class="mb-6 p-8 border bg-white shipping-method-option rounded-none" data-method-id="{{ $weightBasedMethod->id }}" style="transition: none !important;">
                    <div class="flex items-start">
                        <input type="radio" 
                               name="shipping_method_radio" 
                               value="weight" 
                               class="custom-radio mt-1 mr-6" 
                               checked
                               onchange="updateShippingMethod('weight', {{ $weightBasedMethod->id }}, {{ $weightBasedMethod->calculateCost($subtotal, $totalWeight) }});" 
                               onclick="updateShippingMethodBorders(this);">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">{{ $weightBasedMethod->name }}</div>
                                    <div class="text-sm text-gray-400 font-light">{{ $weightBasedMethod->description }}</div>
                                    <div class="text-[9px] text-gray-400 mono mt-4 uppercase tracking-wider">Weight: {{ number_format($totalWeight, 2) }} kg &middot; Delivery: {{ $weightBasedMethod->getEstimatedDeliveryDays() }}</div>
                                </div>
                                <div class="text-sm text-[#1A1A1A] font-light">€{{ number_format($weightBasedMethod->calculateCost($subtotal, $totalWeight), 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Flat Rate Options (only if no free/weight-based) -->
            @if(!$freeShippingMethod && (!$weightBasedMethod || $totalWeight == 0))
                <div class="space-y-6">
                    @forelse($availableShippingMethods as $method)
                        <label class="flex items-start p-8 border transition-all duration-300 cursor-pointer shipping-method-option {{ $loop->first ? 'border-[#1A1A1A] bg-[#FAFAFA]' : 'border-gray-100 hover:border-gray-200' }}" data-method-id="{{ $method['id'] }}" style="transition: none !important;">
                            <input type="radio" 
                                   name="shipping_method_radio" 
                                   value="flat_{{ $method['id'] }}" 
                                   class="custom-radio mt-1 mr-6"
                                   {{ $loop->first ? 'checked' : '' }}
                                   onchange="updateShippingMethod('flat', {{ $method['id'] }}, {{ $method['cost'] }});" 
                                   onclick="updateShippingMethodBorders(this);">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] mb-2 font-medium">{{ $method['name'] }}</div>
                                        <div class="text-sm text-gray-400 font-light">{{ $method['description'] }}</div>
                                        <div class="text-[9px] text-gray-400 mono mt-4 uppercase tracking-wider">Estimated Delivery: {{ $method['estimated_days'] }}</div>
                                    </div>
                                    <div class="text-sm text-[#1A1A1A] font-light">€{{ number_format($method['cost'], 2) }}</div>
                                </div>
                            </div>
                        </label>
                    @empty
                        <div class="p-10 border border-gray-100 bg-gray-50 text-center">
                            <p class="text-[10px] text-gray-400 mono tracking-[0.2em] uppercase">No localized delivery options found. Please contact our concierge.</p>
                        </div>
                    @endforelse
                </div>
            @endif
            
            <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="{{ $defaultShippingMethod ? $defaultShippingMethod->id : ($availableShippingMethods->first()['id'] ?? '') }}">
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex flex-col sm:flex-row justify-between items-center mt-16 pt-10 border-t border-gray-50 gap-6">
                <a href="{{ route('home') }}" 
                   class="w-full sm:w-auto text-[10px] text-gray-400 hover:text-[#1A1A1A] mono uppercase tracking-[0.25em] transition-colors text-center order-2 sm:order-1">
                    Return to Collections
                </a>
                <button type="submit" 
                        id="continue-to-payment-btn"
                        class="btn-gold w-full sm:w-auto order-1 sm:order-2">
                    CONTINUE TO PAYMENT
                </button>
            </div>
        </form>
</div>
@endsection

@push('scripts')
<script>
// PSGC functions are loaded from checkout/layout.blade.php
// We use the loadRegions() function from there

function toggleAddressForms() {
    const addressOptionRadio = document.querySelector('input[name="address_option_radio"]:checked');
    const addressOption = addressOptionRadio ? addressOptionRadio.value : 'default';
    const newAddressForm = document.getElementById('new-address-form');
    const defaultAddressOption = document.querySelector('input[name="address_option_radio"][value="default"]')?.closest('label');
    const newAddressOptionLabel = document.querySelector('input[name="address_option_radio"][value="custom"]')?.closest('label');
    
    // Remove all transitions for instant updates
    if (newAddressForm) {
        newAddressForm.style.transition = 'none';
        newAddressForm.style.transitionDuration = '0s';
    }
    if (defaultAddressOption) {
        defaultAddressOption.style.transition = 'none';
        defaultAddressOption.style.transitionDuration = '0s';
    }
    if (newAddressOptionLabel) {
        newAddressOptionLabel.style.transition = 'none';
        newAddressOptionLabel.style.transitionDuration = '0s';
    }
    
    if (addressOption === 'custom') {
        newAddressForm.classList.remove('hidden');
        // No border on the form itself
        
        // Set required attributes on custom address fields when form is visible
        const customFields = newAddressForm.querySelectorAll('[data-required="true"]');
        customFields.forEach(field => {
            if (!field.disabled) {
                field.setAttribute('required', 'required');
            }
        });
        
        // Update hidden input
        const hiddenInput = document.getElementById('address_option');
        if (hiddenInput) hiddenInput.value = 'custom';
        
        // Remove border from default address option, add to new
        if (defaultAddressOption) {
            defaultAddressOption.classList.remove('border-[#1A1A1A]', 'bg-gray-50');
            defaultAddressOption.classList.add('border-gray-200');
            defaultAddressOption.style.borderColor = 'rgb(229, 231, 235)';
        }
        if (newAddressOptionLabel) {
            newAddressOptionLabel.classList.add('border-[#1A1A1A]', 'bg-gray-50');
            newAddressOptionLabel.classList.remove('border-gray-200');
            newAddressOptionLabel.style.borderColor = 'rgb(26, 26, 26)';
        }
    } else {
        newAddressForm.classList.add('hidden');
        // No border on the form itself
        
        // Remove required attributes from custom address fields when form is hidden
        const customFields = newAddressForm.querySelectorAll('[data-required="true"]');
        customFields.forEach(field => {
            field.removeAttribute('required');
        });
        
        // Update hidden input
        const hiddenInput = document.getElementById('address_option');
        if (hiddenInput) hiddenInput.value = 'default';
        
        // Add border to default address option, remove from new
        if (defaultAddressOption) {
            defaultAddressOption.classList.add('border-[#1A1A1A]', 'bg-gray-50');
            defaultAddressOption.classList.remove('border-gray-200');
            defaultAddressOption.style.borderColor = 'rgb(26, 26, 26)';
        }
        if (newAddressOptionLabel) {
            newAddressOptionLabel.classList.remove('border-[#1A1A1A]', 'bg-gray-50');
            newAddressOptionLabel.classList.add('border-gray-200');
            newAddressOptionLabel.style.borderColor = 'rgb(229, 231, 235)';
        }
    }
}

function updateShippingMethod(type, methodId, cost) {
    document.getElementById('shipping_method_id').value = methodId;
    
    // Update right sidebar Order Summary
    const shippingCostDisplay = document.querySelector('.order-summary-sidebar .shipping-cost-display');
    const totalDisplay = document.querySelector('.order-summary-sidebar .total-display');
    
    if (shippingCostDisplay && totalDisplay) {
        const subtotal = {{ $subtotal }};
        const taxAmount = {{ $taxAmount }};
        const total = subtotal + cost + taxAmount;
        
        if (cost == 0) {
            shippingCostDisplay.innerHTML = '<span class="text-[#B6965D]">Complimentary</span>';
        } else {
            shippingCostDisplay.textContent = '€' + cost.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
        
        totalDisplay.textContent = '€' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
}

function updateShippingMethodBorders(selectedRadio) {
    if (!selectedRadio) return;
    
    // Update borders instantly - no transitions, no hover effects, no delays
    document.querySelectorAll('.shipping-method-option').forEach(option => {
        // Force remove all transitions and inline styles immediately
        option.style.setProperty('transition', 'none', 'important');
        option.style.setProperty('transition-duration', '0s', 'important');
        option.style.borderColor = ''; // Clear any inline border color
        
        // Get the radio button within this option
        const radioInOption = option.querySelector('input[type="radio"][name="shipping_method_radio"]');
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

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Load regions using PSGC API from layout
    if (typeof loadRegions === 'function') {
        loadRegions();
    } else {
        // Fallback: Try calling after a short delay to ensure layout script is loaded
        setTimeout(() => {
            if (typeof loadRegions === 'function') {
                loadRegions();
            }
        }, 100);
    }
    // Initialize address form visibility
    toggleAddressForms();
    
    // Initialize shipping method borders on page load
    const selectedShippingMethod = document.querySelector('input[name="shipping_method_radio"]:checked');
    if (selectedShippingMethod) {
        updateShippingMethodBorders(selectedShippingMethod);
    }
    
    // Add event listeners to all shipping method radios - update border immediately on click
    document.querySelectorAll('input[name="shipping_method_radio"]').forEach(radio => {
        radio.addEventListener('click', function() {
            // Update border immediately on click (before change event)
            updateShippingMethodBorders(this);
        });
        radio.addEventListener('change', function() {
            // Also update on change as backup
            updateShippingMethodBorders(this);
        });
    });
    
    // Update address option borders when changed
    document.querySelectorAll('input[name="address_option_radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            toggleAddressForms();
        });
    });
    
    // Ensure form submits correctly
    const shippingForm = document.getElementById('shipping-form');
    const continueBtn = document.getElementById('continue-to-payment-btn');
    
    if (shippingForm && continueBtn) {
        // Add click handler to button to ensure form submits
        continueBtn.addEventListener('click', function(e) {
            // Check if shipping method is selected
            const shippingMethodId = document.getElementById('shipping_method_id').value;
            if (!shippingMethodId) {
                e.preventDefault();
                alert('Please select a shipping method.');
                return false;
            }
            
            // Check if address is selected/entered
            const addressOption = document.getElementById('address_option');
            if (addressOption && addressOption.value === 'custom') {
                // Check required fields for new address
                const requiredFields = shippingForm.querySelectorAll('#new-address-form [required]');
                let isValid = true;
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                    alert('Please fill in all required address fields.');
                    return false;
                }
            }
            
            // Allow form to submit
            return true;
        });
        
        // Also handle form submission - but don't prevent if validation passes
        shippingForm.addEventListener('submit', function(e) {
            const shippingMethodId = document.getElementById('shipping_method_id').value;
            if (!shippingMethodId) {
                e.preventDefault();
                e.stopPropagation();
                alert('Please select a shipping method.');
                return false;
            }
            
            // Check if custom address is selected and form is visible
            const addressOption = document.getElementById('address_option');
            const newAddressForm = document.getElementById('new-address-form');
            const isCustomAddressVisible = newAddressForm && !newAddressForm.classList.contains('hidden');
            
            if (addressOption && addressOption.value === 'custom' && isCustomAddressVisible) {
                // Make sure region is selected (required)
                const regionSelect = document.getElementById('region');
                if (!regionSelect || !regionSelect.value || !regionSelect.value.trim()) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Please select a region.');
                    return false;
                }
                
                // Check if province is required (only if not NCR and not disabled)
                const provinceSelect = document.getElementById('province');
                const citySelect = document.getElementById('city');
                
                // If province is disabled, that means NCR - check city instead
                if (provinceSelect && !provinceSelect.disabled && !provinceSelect.value) {
                    // Province is enabled but not selected - this might be okay depending on validation
                }
                
                // Check city is selected (only if enabled)
                if (citySelect && !citySelect.disabled && (!citySelect.value || !citySelect.value.trim())) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Please select a city/municipality.');
                    return false;
                }
                
                // Check barangay (only if enabled and has value)
                const barangaySelect = document.getElementById('barangay');
                if (barangaySelect && !barangaySelect.disabled && (!barangaySelect.value || barangaySelect.value === '')) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Please select a barangay.');
                    return false;
                }
                
                // Check required text fields
                const streetInput = document.getElementById('address_line_1');
                const zipInput = document.getElementById('zip_code');
                
                if (!streetInput || !streetInput.value.trim()) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Please enter a street address.');
                    return false;
                }
                
                if (!zipInput || !zipInput.value.trim()) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Please enter a ZIP code.');
                    return false;
                }
            }
            
            // Allow form to submit
            return true;
        });
    }
});
</script>
@endpush
