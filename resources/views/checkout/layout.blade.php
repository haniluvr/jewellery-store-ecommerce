<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Checkout') - Éclore</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/favicon.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- jQuery (required for app.js) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    
<style>
    :root {
        --eclore-black: #1A1A1A;
        --eclore-gold: #B6965D;
        --eclore-white: #FAFAFA;
        --eclore-gray: #eeeeee;
    }
    
    body {
        font-family: 'Outfit', sans-serif;
        background-color: var(--eclore-white);
        color: var(--eclore-black);
        -webkit-font-smoothing: antialiased;
    }
    
    .font-playfair { font-family: 'Playfair Display', serif; }
    .font-outfit { font-family: 'Outfit', sans-serif; }
    .font-azeret { font-family: 'Azeret Mono', monospace; }
    
    h1, h2, h3, h4, .playfair {
        font-family: 'Playfair Display', serif;
        font-weight: 400;
    }
    
    .mono {
        font-family: 'Azeret Mono', monospace;
        letter-spacing: 0.1em;
    }
    
    .btn-gold {
        background: var(--eclore-black);
        color: #fff;
        padding: 1.25rem 2.5rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid var(--eclore-black);
        border-radius: 0;
        display: inline-block;
        text-align: center;
        cursor: pointer;
    }
    
    .btn-gold:hover {
        background: transparent;
        color: var(--eclore-black);
        transform: translateY(-2px);
    }
    
    .btn-outline {
        background: transparent;
        color: var(--eclore-black);
        padding: 1.25rem 2.5rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid var(--eclore-gray);
        border-radius: 0;
        display: inline-block;
        text-align: center;
    }
    
    .btn-outline:hover {
        border-color: var(--eclore-black);
        background: var(--eclore-white);
    }
    
    .form-input-premium {
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 1px solid var(--eclore-gray);
        padding: 1.25rem 0;
        font-family: 'Outfit', sans-serif;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        border-radius: 0;
        color: var(--eclore-black);
    }
    
    .form-input-premium:focus {
        outline: none;
        border-bottom-color: var(--eclore-black);
    }
    
    .form-label-premium {
        font-family: 'Azeret Mono', monospace;
        font-size: 0.6rem;
        letter-spacing: 0.2em;
        color: #888;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        display: block;
    }

    .glass-sidebar {
        background: #fff;
        border: 1px solid var(--eclore-gray);
        border-top: 2px solid var(--eclore-black);
    }

    /* Step Indicator Customization */
    .step-line {
        height: 1px;
        background: var(--eclore-gray);
        flex-grow: 1;
        margin: 0 20px;
        position: relative;
    }
    .step-line.active {
        background: var(--eclore-black);
    }
    .step-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--eclore-gray);
        transition: all 0.3s ease;
    }
    .step-dot.active {
        background: var(--eclore-black);
        transform: scale(1.5);
    }
</style>

@stack('styles')
</head>
<body class="bg-[#FAFAFA] text-[#1A1A1A] antialiased">
    <!-- Checkout Header -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-1">
                    <a href="{{ route('home') }}" class="text-xs mono uppercase tracking-[0.3em] hover:text-[#B6965D] transition-colors">
                        ← Back to Boutique
                    </a>
                </div>
                <div class="flex-shrink-0 flex justify-center">
                    <a href="{{ route('home') }}" class="text-2xl md:text-3xl font-light text-[#1A1A1A] font-playfair tracking-[0.2em] uppercase">
                        ÉCLORE
                    </a>
                </div>
                <div class="flex-1 flex justify-end items-center space-x-6">
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-[9px] text-gray-400 mono uppercase tracking-wider">Concierge Service</span>
                        <a href="tel:+1234567890" class="text-xs text-[#1A1A1A] mono tracking-wider hover:text-[#B6965D]">CONSULT AN ADVISOR</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Progress Indicator -->
    @if(($currentStep ?? 1) < 5)
    <div class="bg-white border-b border-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center py-10">
                <div class="flex items-center w-full max-w-2xl px-4">
                    <!-- Step 1: Shipping -->
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="step-dot {{ $currentStep >= 1 ? 'active' : '' }} mb-4"></div>
                        <span class="text-[9px] mono tracking-[0.25em] uppercase {{ $currentStep >= 1 ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Shipping</span>
                    </div>
                    
                    <div class="step-line {{ $currentStep >= 2 ? 'active' : '' }} mb-6"></div>
                    
                    <!-- Step 2: Payment -->
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="step-dot {{ $currentStep >= 2 ? 'active' : '' }} mb-4"></div>
                        <span class="text-[9px] mono tracking-[0.25em] uppercase {{ $currentStep >= 2 ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Payment</span>
                    </div>
                    
                    <div class="step-line {{ $currentStep >= 3 ? 'active' : '' }} mb-6"></div>
                    
                    <!-- Step 3: Review -->
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="step-dot {{ $currentStep >= 3 ? 'active' : '' }} mb-4"></div>
                        <span class="text-[9px] mono tracking-[0.25em] uppercase {{ $currentStep >= 3 ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Review</span>
                    </div>
                    
                    <div class="step-line {{ $currentStep >= 4 ? 'active' : '' }} mb-6"></div>
                    
                    <!-- Step 4: Confirmation -->
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="step-dot {{ $currentStep >= 4 ? 'active' : '' }} mb-4"></div>
                        <span class="text-[9px] mono tracking-[0.25em] uppercase {{ $currentStep >= 4 ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Confirm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 {{ $currentStep == 5 ? 'lg:grid-cols-1' : 'lg:grid-cols-3' }} gap-8">
            <!-- Checkout Form -->
            <div class="{{ ($currentStep ?? 1) == 5 ? 'lg:col-span-1' : 'lg:col-span-2' }}">
                @yield('content')
            </div>
            
            <!-- Order Summary Sidebar (Hidden on Summary page) -->
            @if(($currentStep ?? 1) < 5)
            <div class="lg:col-span-1">
                <div class="p-10 sticky top-32 bg-white border border-gray-100 shadow-sm">
                    <h3 class="text-xl text-[#1A1A1A] mb-10 pb-5 border-b border-gray-50 font-playfair">Order Selection</h3>
                    
                    <!-- Cart Items -->
                    <div class="space-y-8 mb-10">
                        @foreach(($cartItems ?? []) as $item)
                        <div class="flex items-start space-x-6">
                            <div class="w-20 h-24 bg-gray-50 flex items-center justify-center overflow-hidden border border-gray-100">
                                @php
                                    $product = $item->product ?? null;
                                    $images = $product && $product->images 
                                        ? (is_string($product->images) ? json_decode($product->images, true) : $product->images)
                                        : null;
                                    $firstImage = is_array($images) && count($images) > 0 ? $images[0] : null;
                                @endphp
                                @if($firstImage)
                                    <img src="{{ Storage::url($firstImage) }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                @else
                                    <i data-lucide="image" class="w-6 h-6 text-gray-200"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0 pt-1">
                                <p class="text-[10px] text-[#1A1A1A] uppercase tracking-[0.2em] truncate mb-2">{{ $item->product_name }}</p>
                                <p class="text-[9px] text-gray-400 mono mb-3 uppercase tracking-wider">Quantity: {{ $item->quantity }}</p>
                                <div class="text-sm text-[#1A1A1A] font-light">
                                    €{{ number_format($item->total_price, 2) }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pricing Breakdown -->
                    <div class="border-t border-gray-50 pt-8 space-y-5">
                        <div class="flex justify-between text-[11px] mono uppercase tracking-wider">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="text-[#1A1A1A]">€{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-[11px] mono uppercase tracking-wider">
                            <span class="text-gray-400">Shipping</span>
                            <span class="text-[#1A1A1A] shipping-cost-display">
                                @php
                                    $shippingCostValue = $defaultShippingCost ?? $shippingCost ?? Session::get('checkout.shipping.shipping_cost', 0);
                                @endphp
                                @if($shippingCostValue == 0)
                                    <span class="text-[#B6965D]">Complimentary</span>
                                @else
                                    €{{ number_format($shippingCostValue, 2) }}
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between text-[11px] mono uppercase tracking-wider">
                            <span class="text-gray-400">Tax Incl. (12%)</span>
                            <span class="text-[#1A1A1A]">€{{ number_format($taxAmount, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-end border-t border-gray-100 pt-8 mt-4">
                            <span class="text-[11px] text-[#1A1A1A] uppercase tracking-[0.3em] font-medium">Total</span>
                            <span class="text-2xl text-[#1A1A1A] font-playfair order-summary-total total-display" data-total="{{ $total }}">€{{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    
                    @php
                        $shippingCostValue = $defaultShippingCost ?? $shippingCost ?? Session::get('checkout.shipping.shipping_cost', 0);
                    @endphp
                    @if($shippingCostValue == 0 && ($subtotal ?? 0) >= 5000)
                    <div class="mt-8 p-6 bg-gray-50 border-t border-b border-gray-100">
                        <div class="flex items-center justify-center text-center">
                            <span class="text-[9px] mono tracking-[0.2em] text-[#B6965D] uppercase">Complimentary White-Glove Shipping</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    
    @stack('scripts')
    
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
    
    <!-- PSGC Cloud API Integration for Address Selection -->
    <script>
        // Philippine Address API Integration (PSGC Cloud v2)
        const PSGC_API = 'https://psgc.cloud/api/v2';
        let regionsData = [];
        let currentRegionCode = '';
        let currentProvinceCode = '';
        let billingRegionsData = [];
        let billingCurrentRegionCode = '';
        let billingCurrentProvinceCode = '';
        
        // Load all regions
        async function loadRegions() {
            try {
                const response = await fetch(`${PSGC_API}/regions`);
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                
                const data = await response.json();
                
                // Extract array from response
                if (Array.isArray(data)) {
                    regionsData = data;
                } else if (data.data && Array.isArray(data.data)) {
                    regionsData = data.data;
                } else if (typeof data === 'object') {
                    // Try to find the array in the object
                    const possibleArrays = Object.values(data).filter(v => Array.isArray(v));
                    if (possibleArrays.length > 0) {
                        regionsData = possibleArrays[0];
                    } else {
                        throw new Error('No array found in API response');
                    }
                } else {
                    throw new Error('API response is not in expected format');
                }
                
                if (!Array.isArray(regionsData)) {
                    throw new Error('API response is not in expected format');
                }
                
                const regionSelect = document.getElementById('region');
                if (regionSelect) {
                    regionSelect.innerHTML = '<option value="">Select Region</option>';
                    regionSelect.disabled = false;
                    
                    // Only set required if the new address form is visible
                    if (regionSelect.hasAttribute('data-required')) {
                        const newAddressForm = document.getElementById('new-address-form');
                        if (newAddressForm && !newAddressForm.classList.contains('hidden')) {
                            regionSelect.setAttribute('required', 'required');
                        } else {
                            regionSelect.removeAttribute('required');
                        }
                    }
                    
                    regionsData.forEach(region => {
                        const option = document.createElement('option');
                        option.value = region.name;
                        option.setAttribute('data-code', region.code);
                        option.textContent = region.name;
                        regionSelect.appendChild(option);
                    });
                }
                
            } catch (error) {
                console.error('❌ Error loading regions:', error);
            }
        }
        
        // Load provinces for selected region using v2 nested endpoint
        async function loadProvinces(regionCodeOrName) {
            try {
                currentRegionCode = regionCodeOrName;
                const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/provinces`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const provinces = data.data || data;
                
                const provinceSelect = document.getElementById('province');
                
                // Special case: NCR or regions with no provinces - disable province and go directly to cities
                if (!Array.isArray(provinces) || provinces.length === 0 || 
                    regionCodeOrName.toLowerCase().includes('national capital region') ||
                    regionCodeOrName.toLowerCase().includes('ncr')) {
                    if (provinceSelect) {
                        provinceSelect.innerHTML = '<option value="">N/A (No provinces)</option>';
                        provinceSelect.disabled = true;
                        provinceSelect.removeAttribute('required');
                        // Clear any validation requirements
                        provinceSelect.value = '';
                    }
                    
                    // Load cities directly for this region (NCR)
                    await loadCitiesDirectly(regionCodeOrName);
                    return;
                }
                
                // Remove required from city/barangay when province is available (will be set when city is enabled)
                const citySelect = document.getElementById('city');
                const barangaySelect = document.getElementById('barangay');
                if (citySelect) {
                    citySelect.removeAttribute('required');
                }
                if (barangaySelect) {
                    barangaySelect.removeAttribute('required');
                }
                
                if (provinceSelect) {
                    provinceSelect.innerHTML = '<option value="">Select Province</option>';
                    provinceSelect.disabled = false;
                    
                    if (Array.isArray(provinces)) {
                        provinces.forEach(province => {
                            const option = document.createElement('option');
                            option.value = province.name;
                            option.setAttribute('data-code', province.code);
                            option.textContent = province.name;
                            provinceSelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading provinces:', error);
            }
        }
        
        // Load cities/municipalities directly for a region (for regions without provinces like NCR)
        async function loadCitiesDirectly(regionCodeOrName) {
            try {
                const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/cities-municipalities`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const cities = data.data || data;
                
                const citySelect = document.getElementById('city');
                if (citySelect) {
                    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                    citySelect.disabled = false;
                    
                    // Set required attribute only when enabled
                    if (citySelect.hasAttribute('data-required')) {
                        citySelect.setAttribute('required', 'required');
                    }
                    
                    if (Array.isArray(cities)) {
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.setAttribute('data-code', city.code);
                            option.textContent = `${city.name} (${city.type})`;
                            citySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading cities:', error);
            }
        }
        
        // Load cities/municipalities for selected province using v2 nested endpoint
        async function loadCities(provinceCodeOrName) {
            try {
                currentProvinceCode = provinceCodeOrName;
                const url = `${PSGC_API}/regions/${encodeURIComponent(currentRegionCode)}/provinces/${encodeURIComponent(provinceCodeOrName)}/cities-municipalities`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const cities = data.data || data;
                
                const citySelect = document.getElementById('city');
                if (citySelect) {
                    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                    citySelect.disabled = false;
                    
                    // Set required attribute only when enabled
                    if (citySelect.hasAttribute('data-required')) {
                        citySelect.setAttribute('required', 'required');
                    }
                    
                    if (Array.isArray(cities)) {
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.setAttribute('data-code', city.code);
                            option.textContent = `${city.name} (${city.type})`;
                            citySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading cities:', error);
            }
        }
        
        // Load barangays for selected city using v2 endpoint
        async function loadBarangays(cityCodeOrName) {
            try {
                const url = `${PSGC_API}/cities-municipalities/${encodeURIComponent(cityCodeOrName)}/barangays`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const barangays = data.data || data;
                
                const barangaySelect = document.getElementById('barangay');
                if (barangaySelect) {
                    barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                    barangaySelect.disabled = false;
                    
                    // Set required attribute only when enabled
                    if (barangaySelect.hasAttribute('data-required')) {
                        barangaySelect.setAttribute('required', 'required');
                    }
                    
                    if (Array.isArray(barangays)) {
                        barangays.forEach(barangay => {
                            const option = document.createElement('option');
                            option.value = barangay.name;
                            option.textContent = barangay.name;
                            barangaySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading barangays:', error);
            }
        }
        
        // Billing Address PSGC Functions
        async function loadBillingRegions() {
            try {
                const response = await fetch(`${PSGC_API}/regions`);
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                
                const data = await response.json();
                
                // Extract array from response
                if (Array.isArray(data)) {
                    billingRegionsData = data;
                } else if (data.data && Array.isArray(data.data)) {
                    billingRegionsData = data.data;
                } else if (typeof data === 'object') {
                    // Try to find the array in the object
                    const possibleArrays = Object.values(data).filter(v => Array.isArray(v));
                    if (possibleArrays.length > 0) {
                        billingRegionsData = possibleArrays[0];
                    } else {
                        throw new Error('No array found in billing API response');
                    }
                } else {
                    throw new Error('Billing API response is not in expected format');
                }
                
                if (!Array.isArray(billingRegionsData)) {
                    throw new Error('Billing API response is not in expected format');
                }
                
                const regionSelect = document.getElementById('billing-region');
                if (regionSelect) {
                    regionSelect.innerHTML = '<option value="">Select Region</option>';
                    billingRegionsData.forEach(region => {
                        const option = document.createElement('option');
                        option.value = region.name;
                        option.setAttribute('data-code', region.code);
                        option.textContent = region.name;
                        regionSelect.appendChild(option);
                    });
                }
                
            } catch (error) {
                console.error('❌ Error loading billing regions:', error);
            }
        }
        
        async function loadBillingProvinces(regionCodeOrName) {
            try {
                billingCurrentRegionCode = regionCodeOrName;
                const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/provinces`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const provinces = data.data || data;
                
                // Special case: Some regions (like NCR) have no provinces, go directly to cities
                if (!Array.isArray(provinces) || provinces.length === 0) {
                    const provinceSelect = document.getElementById('billing-province');
                    if (provinceSelect) {
                        provinceSelect.innerHTML = '<option value="">No provinces (loading cities...)</option>';
                        provinceSelect.disabled = true;
                    }
                    
                    // Load cities directly for this region
                    await loadBillingCitiesDirectly(regionCodeOrName);
                    return;
                }
                
                const provinceSelect = document.getElementById('billing-province');
                if (provinceSelect) {
                    provinceSelect.innerHTML = '<option value="">Select Province</option>';
                    provinceSelect.disabled = false;
                    
                    if (Array.isArray(provinces)) {
                        provinces.forEach(province => {
                            const option = document.createElement('option');
                            option.value = province.name;
                            option.setAttribute('data-code', province.code);
                            option.textContent = province.name;
                            provinceSelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading billing provinces:', error);
            }
        }
        
        async function loadBillingCitiesDirectly(regionCodeOrName) {
            try {
                const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/cities-municipalities`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const cities = data.data || data;
                
                const citySelect = document.getElementById('billing-city');
                if (citySelect) {
                    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                    citySelect.disabled = false;
                    
                    if (Array.isArray(cities)) {
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.setAttribute('data-code', city.code);
                            option.textContent = `${city.name} (${city.type})`;
                            citySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading billing cities:', error);
            }
        }
        
        async function loadBillingCities(provinceCodeOrName) {
            try {
                billingCurrentProvinceCode = provinceCodeOrName;
                const url = `${PSGC_API}/regions/${encodeURIComponent(billingCurrentRegionCode)}/provinces/${encodeURIComponent(provinceCodeOrName)}/cities-municipalities`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const cities = data.data || data;
                
                const citySelect = document.getElementById('billing-city');
                if (citySelect) {
                    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                    citySelect.disabled = false;
                    
                    if (Array.isArray(cities)) {
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.setAttribute('data-code', city.code);
                            option.textContent = `${city.name} (${city.type})`;
                            citySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading billing cities:', error);
            }
        }
        
        async function loadBillingBarangays(cityCodeOrName) {
            try {
                const url = `${PSGC_API}/cities-municipalities/${encodeURIComponent(cityCodeOrName)}/barangays`;
                
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                const barangays = data.data || data;
                
                const barangaySelect = document.getElementById('billing-barangay');
                if (barangaySelect) {
                    barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                    barangaySelect.disabled = false;
                    
                    if (Array.isArray(barangays)) {
                        barangays.forEach(barangay => {
                            const option = document.createElement('option');
                            option.value = barangay.name;
                            option.textContent = barangay.name;
                            barangaySelect.appendChild(option);
                        });
                    }
                }
                
            } catch (error) {
                console.error('❌ Error loading billing barangays:', error);
            }
        }
        
        // Set up cascading dropdowns
        document.addEventListener('DOMContentLoaded', function() {
            // Load regions on page load
            loadRegions();
            
            // Load billing regions on page load
            loadBillingRegions();
            
            // Region change handler
            const regionSelect = document.getElementById('region');
            if (regionSelect) {
                regionSelect.addEventListener('change', function() {
                    const selectedRegion = this.value;
                    if (selectedRegion) {
                        loadProvinces(selectedRegion);
                        // Reset dependent dropdowns
                        const citySelect = document.getElementById('city');
                        const barangaySelect = document.getElementById('barangay');
                        if (citySelect) {
                            citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                            citySelect.disabled = true;
                        }
                        if (barangaySelect) {
                            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                            barangaySelect.disabled = true;
                        }
                    }
                });
            }
            
            // Province change handler
            const provinceSelect = document.getElementById('province');
            if (provinceSelect) {
                provinceSelect.addEventListener('change', function() {
                    const selectedProvince = this.value;
                    if (selectedProvince) {
                        loadCities(selectedProvince);
                        // Reset dependent dropdowns
                        const barangaySelect = document.getElementById('barangay');
                        if (barangaySelect) {
                            barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                            barangaySelect.disabled = true;
                        }
                    }
                });
            }
            
            // City change handler
            const citySelect = document.getElementById('city');
            if (citySelect) {
                citySelect.addEventListener('change', function() {
                    const selectedCity = this.value;
                    if (selectedCity) {
                        loadBarangays(selectedCity);
                    }
                });
            }
            
            // Set up billing address cascading dropdowns
            const billingRegionSelect = document.getElementById('billing-region');
            const billingProvinceSelect = document.getElementById('billing-province');
            const billingCitySelect = document.getElementById('billing-city');
            const billingBarangaySelect = document.getElementById('billing-barangay');
            
            if (billingRegionSelect) {
                billingRegionSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const regionName = selectedOption.value;
                    const regionCode = selectedOption.getAttribute('data-code');
                    
                    
                    // Reset province code (important for regions without provinces)
                    billingCurrentProvinceCode = '';
                    
                    // Reset province, city and barangay
                    if (billingProvinceSelect) {
                        billingProvinceSelect.innerHTML = '<option value="">Select Province</option>';
                        billingProvinceSelect.disabled = true;
                    }
                    if (billingCitySelect) {
                        billingCitySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                        billingCitySelect.disabled = true;
                    }
                    if (billingBarangaySelect) {
                        billingBarangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                        billingBarangaySelect.disabled = true;
                    }
                    
                    if (regionName) {
                        loadBillingProvinces(regionName);
                    }
                });
            }
            
            if (billingProvinceSelect) {
                billingProvinceSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const provinceName = selectedOption.value;
                    const provinceCode = selectedOption.getAttribute('data-code');
                    
                    
                    // Reset city and barangay
                    if (billingCitySelect) {
                        billingCitySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                        billingCitySelect.disabled = true;
                    }
                    if (billingBarangaySelect) {
                        billingBarangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                        billingBarangaySelect.disabled = true;
                    }
                    
                    if (provinceName) {
                        loadBillingCities(provinceName);
                    }
                });
            }
            
            if (billingCitySelect) {
                billingCitySelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const cityName = selectedOption.value;
                    const cityCode = selectedOption.getAttribute('data-code');
                    
                    
                    // Reset barangay
                    if (billingBarangaySelect) {
                        billingBarangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                        billingBarangaySelect.disabled = true;
                    }
                    
                    if (cityName) {
                        loadBillingBarangays(cityName);
                    }
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
