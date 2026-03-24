@extends('layouts.app')

@section('title', 'My Account | Éclore - Sustainable Luxury Jewellery')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background-color: #fafafa;
        color: #1a1a1a;
    }
    
    .font-playfair {
        font-family: 'Playfair Display', serif;
    }

    /* Luxury Gold Accent */
    :root {
        --eclore-gold: #B6965D;
        --eclore-gold-light: #d4bc8d;
        --eclore-black: #1a1a1a;
    }

    .text-gold { color: var(--eclore-gold); }
    .bg-gold { background-color: var(--eclore-gold); }
    .border-gold { border-color: var(--eclore-gold); }

    /* Account Page Layout */
    .account-sidebar {
        border-right: 1px solid #eee;
    }

    .sidebar-link {
        position: relative;
        padding: 0.75rem 0;
        transition: all 0.3s ease;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .sidebar-link::after {
        content: '';
        position: absolute;
        bottom: 0.5rem;
        left: 0;
        width: 0;
        height: 1px;
        background-color: var(--eclore-gold);
        transition: width 0.3s ease;
    }

    .sidebar-link:hover {
        color: var(--eclore-gold);
    }

    .sidebar-link.active {
        color: var(--eclore-gold);
        font-weight: 500;
    }

    .sidebar-link.active::after {
        width: 2rem;
    }

    /* Section Styling */
    .content-section {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 500;
        margin-bottom: 2rem;
        position: relative;
    }

    .section-subtitle {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: #333;
    }

    /* Form Elements */
    .form-label {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #666;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 0;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;
        font-size: 0.95rem;
        transition: border-color 0.3s ease;
        border-radius: 0;
    }

    .form-input:focus {
        outline: none;
        border-bottom-color: var(--eclore-gold);
    }

    .form-input:disabled {
        color: #999;
        border-bottom-style: dashed;
    }

    .save-button {
        background-color: var(--eclore-black);
        color: white;
        padding: 1rem 2.5rem;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.75rem;
        transition: all 0.3s ease;
        border: 1px solid var(--eclore-black);
    }

    .save-button:hover {
        background-color: transparent;
        color: var(--eclore-black);
    }

    /* Custom Toggle */
    .custom-toggle {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .custom-toggle input { opacity: 0; width: 0; height: 0; }
    
    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #eee;
        transition: .4s;
        border-radius: 20px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 14px; width: 14px;
        left: 3px; bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider { background-color: var(--eclore-gold); }
    input:checked + .toggle-slider:before { transform: translateX(20px); }

    /* Cards */
    .luxury-card {
        background: white;
        padding: 2rem;
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .luxury-card:hover {
        border-color: var(--eclore-gold-light);
    }

    /* Orders Filter */
    .order-filter-tab {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 0.5rem 0;
        color: #999;
        position: relative;
        transition: color 0.3s ease;
    }

    .order-filter-tab.active {
        color: var(--eclore-black);
        font-weight: 600;
    }

    .order-filter-tab.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--eclore-gold);
    }

    /* Checkbox */
    .account-item-checkbox {
        appearance: none;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
    }

    .account-item-checkbox:checked {
        background-color: var(--eclore-gold);
        border-color: var(--eclore-gold);
    }

    .account-item-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 10px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Select All Button */
    .account-select-all-btn {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--eclore-gold);
        border-bottom: 1px solid var(--eclore-gold);
        padding-bottom: 2px;
        transition: all 0.3s ease;
    }

    .account-select-all-btn:hover {
        color: var(--eclore-black);
        border-bottom-color: var(--eclore-black);
    }

</style>
@endpush

@section('content')
<!-- Main Content -->
<div class="container mx-auto px-4 py-20 pt-32">
    <div class="flex flex-col md:flex-row gap-16">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 account-sidebar md:pr-12">
            <div class="mb-16" data-aos="fade-up">
                <h1 class="font-playfair text-4xl mb-2">{{ $user->name }}</h1>
                <p class="text-[10px] text-gray-400 tracking-[0.3em] uppercase">{{ $user->email }}</p>
            </div>
            
            <nav class="flex flex-col space-y-6" data-aos="fade-up" data-aos-delay="100">
                <a href="#" class="sidebar-link active" data-target="my-details-section">My Details</a>
                <a href="#" class="sidebar-link" data-target="address-book-section">Address Book</a>
                <a href="#" class="sidebar-link" data-target="my-orders-section">My Orders</a>
                <a href="#" class="sidebar-link" data-target="my-wishlist-section">Wishlist</a>
                <a href="#" class="sidebar-link" data-target="my-cart-section">My Cart</a>
                <a href="#" class="sidebar-link" data-target="payment-methods-section">Payment Methods</a>
                <a href="#" class="sidebar-link" data-target="newsletter-section">Newsletter</a>
                <a href="#" class="sidebar-link" data-target="account-settings-section">Settings</a>
            </nav>

            <div class="mt-20 pt-10 border-t border-gray-100" data-aos="fade-up" data-aos-delay="200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-[10px] text-gray-400 tracking-[0.3em] uppercase hover:text-red-500 transition-colors">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="w-full md:w-3/4">
            <!-- My Details Section -->
            <div id="my-details-section" class="content-section" data-aos="fade-up">
                <h2 class="section-title">My Details</h2>
                
                <div class="space-y-16">
                    <!-- Personal Information -->
                    <div class="luxury-card">
                        <h3 class="section-subtitle">Personal Information</h3>
                        <p class="text-sm text-gray-400 mb-10">Manage your identity and contact details.</p>
                        
                        <form id="personal-info-form">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10 mb-12">
                                <div>
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-input" required>
                                </div>
                                <div>
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-input" required>
                                </div>
                                <div>
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-input" required>
                                    <p id="username-error" class="text-[10px] text-red-500 mt-2 hidden"></p>
                                </div>
                                <div>
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" id="phone-input" value="{{ $user->phone ?? '' }}" class="form-input" data-original-phone="{{ $user->phone ?? '' }}" placeholder="09xxxxxxxxx" maxlength="11">
                                    <p id="phone-error" class="text-[10px] text-red-500 mt-2 hidden">Phone number cannot be removed.</p>
                                    <p id="phone-format-error" class="text-[10px] text-red-500 mt-2 hidden">Invalid phone number format.</p>
                                </div>
                            </div>
                            <button type="submit" class="save-button">Save Changes</button>
                        </form>
                    </div>

                    <!-- E-mail Address -->
                    <div class="luxury-card">
                        <h3 class="section-subtitle">E-mail Address</h3>
                        <p class="text-sm text-gray-400 mb-10">Keep your primary contact information up to date.</p>
                        
                        <form id="email-form">
                            <div class="max-w-xl space-y-10 mb-12">
                                <div>
                                    <label class="form-label">Electronic Mail</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-input" required>
                                </div>
                                <div>
                                    <label class="form-label">Confirm with Password</label>
                                    <input type="password" name="password" id="email-password" class="form-input" required placeholder="••••••••">
                                    <p id="email-password-error" class="text-[10px] text-red-500 mt-2 hidden">Incorrect password provided.</p>
                                </div>
                            </div>
                            <button type="submit" class="save-button">Update Email</button>
                        </form>
                    </div>

                    <!-- Password -->
                    <div class="luxury-card">
                        <h3 class="section-subtitle">
                            @if($user->hasPassword())
                                Security Setting
                            @else
                                Secure Your Account
                            @endif
                        </h3>
                        <p class="text-sm text-gray-400 mb-10">
                            @if($user->hasPassword())
                                Update your password to ensure continued account security.
                            @else
                                Add a personal password for exclusive access to your collections.
                            @endif
                        </p>
                        
                        <form id="password-form">
                            <div class="max-w-xl space-y-10 mb-12">
                                @if($user->hasPassword())
                                    <div>
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password" id="current-password" class="form-input" required placeholder="••••••••">
                                        <p id="current-password-error" class="text-[10px] text-red-500 mt-2 hidden">Invalid current password.</p>
                                    </div>
                                @endif
                                <div>
                                    <label class="form-label">
                                        {{ $user->hasPassword() ? 'New Password' : 'Create Password' }}
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="new_password" id="new-password" class="form-input" required placeholder="••••••••">
                                        <button type="button" class="absolute right-0 bottom-2 text-gray-400 hover:text-gold transition-colors">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    <div id="password-requirements" class="mt-4 space-y-2 hidden">
                                        <p id="req-length" class="text-[9px] tracking-widest uppercase flex items-center gap-3">
                                            <i data-lucide="circle" class="req-icon w-2 h-2"></i> 8+ Characters
                                        </p>
                                        <p id="req-lowercase" class="text-[9px] tracking-widest uppercase flex items-center gap-3">
                                            <i data-lucide="circle" class="req-icon w-2 h-2"></i> Lowercase Letter
                                        </p>
                                        <p id="req-uppercase" class="text-[9px] tracking-widest uppercase flex items-center gap-3">
                                            <i data-lucide="circle" class="req-icon w-2 h-2"></i> Uppercase Letter
                                        </p>
                                        <p id="req-number" class="text-[9px] tracking-widest uppercase flex items-center gap-3">
                                            <i data-lucide="circle" class="req-icon w-2 h-2"></i> Numeric Digit
                                        </p>
                                        <p id="req-special" class="text-[9px] tracking-widest uppercase flex items-center gap-3">
                                            <i data-lucide="circle" class="req-icon w-2 h-2"></i> Special Symbol
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Recapitulate Password</label>
                                    <div class="relative">
                                        <input type="password" name="new_password_confirmation" id="confirm-password" class="form-input" required placeholder="••••••••">
                                        <button type="button" class="absolute right-0 bottom-2 text-gray-400 hover:text-gold transition-colors">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    <p id="confirm-password-error" class="text-[10px] text-red-500 mt-2 hidden">Passwords do not align.</p>
                                </div>
                            </div>
                            <button type="submit" class="save-button" id="password-submit-btn">Update Security</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Address Book Section -->
            <div id="address-book-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Address Book</h2>
                
                <div class="space-y-16">
                    <!-- Current Addresses -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <!-- Shipping Address -->
                        <div class="luxury-card flex flex-col h-full">
                            <div class="flex justify-between items-start mb-8">
                                <h3 class="section-subtitle mb-0">Shipping Address</h3>
                                <span class="text-[9px] tracking-[0.3em] uppercase text-gold font-semibold">Primary</span>
                            </div>
                            
                            <div class="flex-grow space-y-2 text-sm text-gray-500 mb-10">
                                <p class="text-black font-medium">{{ $user->first_name }} {{ $user->last_name }}</p>
                                @if($user->street || $user->city || $user->province || $user->address)
                                    <p>{{ $user->address ?? $user->street }}</p>
                                    <p>{{ $user->barangay ? $user->barangay . ',' : '' }} {{ $user->city_municipality ?? $user->city ?? '' }}</p>
                                    <p>{{ $user->province ?? '' }} {{ $user->zip_code ?? '' }}</p>
                                    <p>{{ $user->region ?? '' }}</p>
                                @else
                                    <p class="italic text-gray-400">No primary destination specified.</p>
                                @endif
                            </div>
                            
                            <div class="pt-6 border-t border-gray-100">
                                <button onclick="showEditAddressForm()" class="text-[10px] tracking-[0.2em] uppercase text-black hover:text-gold transition-colors flex items-center gap-3">
                                    <i data-lucide="edit-3" class="w-3 h-3"></i> {{ ($user->street || $user->city || $user->province || $user->address) ? 'Modify Details' : 'Add Details' }}
                                </button>
                            </div>
                        </div>

                        <!-- Add New Address Placeholder -->
                        <div class="border border-dashed border-gray-200 p-12 flex flex-col items-center justify-center text-center group cursor-pointer hover:border-gold transition-colors" onclick="showAddAddressForm()">
                            <div class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center mb-6 group-hover:border-gold group-hover:bg-gold/5 transition-all">
                                <i data-lucide="plus" class="w-5 h-5 text-gray-400 group-hover:text-gold"></i>
                            </div>
                            <h4 class="font-playfair text-lg mb-2">New Destination</h4>
                            <p class="text-xs text-gray-400 tracking-widest uppercase">Add a shipping location</p>
                        </div>
                    </div>

                    <!-- Edit Address Form (Hidden by default) -->
                    <div id="edit-address-form" class="luxury-card bg-white" style="display: none;">
                        <h3 class="section-subtitle mb-8">{{ ($user->street || $user->city || $user->province || $user->address) ? 'Modify Primary Address' : 'Set Primary Address' }}</h3>
                        <form id="update-address-form">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10 mb-12">
                                <div>
                                    <label class="form-label">Regional District</label>
                                    <select name="region" id="region-select" class="form-input" required>
                                        <option value="">Select Region</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Province / State</label>
                                    <select name="province" id="province-select" class="form-input" required {{ !$user->province ? 'disabled' : '' }}>
                                        <option value="">Select Province</option>
                                        @if($user->province)
                                            <option value="{{ $user->province }}" selected>{{ $user->province }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">City / Municipality</label>
                                    <select name="city" id="city-select" class="form-input" required {{ !$user->city && !$user->city_municipality ? 'disabled' : '' }}>
                                        <option value="">Select City</option>
                                        @php $currentCity = $user->city_municipality ?? $user->city; @endphp
                                        @if($currentCity)
                                            <option value="{{ $currentCity }}" selected>{{ $currentCity }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Barangay / Neighborhood</label>
                                    <select name="barangay" id="barangay-select" class="form-input" required {{ !$user->barangay ? 'disabled' : '' }}>
                                        <option value="">Select Barangay</option>
                                        @if($user->barangay)
                                            <option value="{{ $user->barangay }}" selected>{{ $user->barangay }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="form-label">Detailed Address</label>
                                    <input type="text" name="street" value="{{ $user->address ?? $user->street }}" class="form-input" required placeholder="House No., Street Name, Phase/Subdivision">
                                </div>
                                <div>
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="zip_code" value="{{ $user->zip_code }}" class="form-input" required maxlength="4">
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-8">
                                <button type="submit" class="save-button">Confirm Address</button>
                                <button type="button" onclick="hideEditAddressForm()" class="text-[10px] tracking-[0.2em] uppercase text-gray-400 hover:text-black transition-colors">Discard</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- My Orders Section -->
            <div id="my-orders-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">My Orders</h2>
                
                <div class="luxury-card">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
                        <p class="text-sm text-gray-400">Track your current and previous acquisitions.</p>
                        
                        <!-- Order Status Filter Tabs -->
                        <nav class="flex gap-8 border-b border-gray-100 w-full md:w-auto overflow-x-auto" id="order-filter-tabs">
                            <button onclick="filterOrders('all')" class="order-filter-tab active" data-status="all">All</button>
                            <button onclick="filterOrders('pending')" class="order-filter-tab" data-status="pending">Pending</button>
                            <button onclick="filterOrders('processing')" class="order-filter-tab" data-status="processing">Processing</button>
                            <button onclick="filterOrders('shipped')" class="order-filter-tab" data-status="shipped">Shipped</button>
                            <button onclick="filterOrders('delivered')" class="order-filter-tab" data-status="delivered">Delivered</button>
                            <button onclick="filterOrders('cancelled')" class="order-filter-tab" data-status="cancelled">Cancelled</button>
                        </nav>
                    </div>
                    
                    <div id="orders-container">
                        @include('partials.orders-list', ['orders' => $orders])
                    </div>
                </div>
            </div>

            <!-- My Wishlist Section -->
            <div id="my-wishlist-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Wishlist</h2>
                
                <div class="luxury-card">
                    <p class="text-sm text-gray-400 mb-12">Your curated selection of Éclore masterpieces.</p>
                    
                    @if($wishlistItems->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-10">
                            @foreach($wishlistItems as $item)
                            <div class="group">
                                <div class="aspect-[4/5] bg-[#f9f9f9] mb-6 relative overflow-hidden flex items-center justify-center cursor-pointer" 
                                     onclick="openQuickView({{ $item->product->id ?? 'null' }}, '{{ $item->product->slug ?? '' }}')">
                                    @if($item->product && $item->product->image)
                                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <i data-lucide="package" class="text-gray-200 w-12 h-12"></i>
                                    @endif
                                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <h3 class="font-playfair text-base mb-2 cursor-pointer hover:text-gold transition-colors" 
                                    onclick="openQuickView({{ $item->product->id ?? 'null' }}, '{{ $item->product->slug ?? '' }}')">
                                    {{ $item->product->name ?? 'Product' }}
                                </h3>
                                <p class="text-[11px] tracking-widest uppercase text-gray-400">₱{{ number_format($item->product->price ?? 0, 2) }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-20">
                            <i data-lucide="heart" class="text-gray-100 w-16 h-16 mx-auto mb-6"></i>
                            <h3 class="font-playfair text-xl mb-4">Your collection is empty</h3>
                            <a href="{{ route('catalogue') }}" class="text-[10px] tracking-[0.3em] uppercase text-gold hover:text-black transition-colors font-semibold">Examine Products</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- My Cart Section -->
            <div id="my-cart-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Shopping Cart</h2>
                
                <div class="luxury-card">
                    <div class="flex items-center justify-between mb-12">
                        <p class="text-sm text-gray-400">Items selected for acquisition.</p>
                        @if($cartItems->count() > 0)
                            <button type="button" class="account-select-all-btn" id="account-select-all-cart-items">Select All</button>
                        @endif
                    </div>

                    @if($cartItems->count() > 0)
                        <div class="space-y-12">
                            <div class="divide-y divide-gray-100">
                                @foreach($cartItems as $item)
                                <div class="cart-item flex flex-col md:flex-row items-center gap-10 py-10 first:pt-0" data-product-id="{{ $item->product_id }}">
                                    <!-- Selection -->
                                    <div class="account-item-selection">
                                        <input type="checkbox" 
                                               class="account-item-checkbox" 
                                               data-product-id="{{ $item->product_id }}"
                                               data-item-total="{{ $item->total_price }}"
                                               checked>
                                    </div>
                                    
                                    <!-- Visual -->
                                    <div class="w-32 h-32 bg-[#f9f9f9] flex-shrink-0 flex items-center justify-center">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="package" class="text-gray-200 w-10 h-10"></i>
                                        @endif
                                    </div>
                                    
                                    <!-- Details -->
                                    <div class="flex-grow">
                                        <h3 class="font-playfair text-xl mb-2">{{ $item->product->name ?? 'Product' }}</h3>
                                        <p class="text-[10px] text-gray-400 tracking-widest uppercase mb-4">Unit: ₱{{ number_format($item->product->price ?? 0, 2) }}</p>
                                        <p class="text-lg font-medium text-black item-total-price">₱{{ number_format($item->total_price ?? 0, 2) }}</p>
                                    </div>
                                    
                                    <!-- Controls -->
                                    <div class="flex items-center gap-12">
                                        <div class="flex items-center border border-gray-100 py-2 px-4 gap-6">
                                            <button class="decrease-qty hover:text-gold transition-colors" data-product-id="{{ $item->product_id }}">
                                                <i data-lucide="minus" class="w-3 h-3"></i>
                                            </button>
                                            <span class="text-xs font-semibold min-w-[20px] text-center">{{ $item->quantity }}</span>
                                            <button class="increase-qty hover:text-gold transition-colors" data-product-id="{{ $item->product_id }}">
                                                <i data-lucide="plus" class="w-3 h-3"></i>
                                            </button>
                                        </div>
                                        
                                        <button class="remove-cart-item text-gray-300 hover:text-red-400 transition-colors" data-product-id="{{ $item->product_id }}">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <!-- Cart Summary -->
                            <div class="mt-12 pt-12 border-t border-gray-100 flex flex-col items-end">
                                <div class="text-right mb-10">
                                    <p class="text-[10px] text-gray-400 tracking-[0.3em] uppercase mb-2">Estimated Acquisition</p>
                                    <div class="flex items-baseline gap-4 justify-end">
                                        <span class="text-sm text-gray-500">Subtotal (<span id="cart-total-qty">{{ $cartItems->sum('quantity') }}</span>)</span>
                                        <span class="text-4xl font-playfair text-black" id="cart-total-price">₱{{ number_format($cartTotal ?? 0, 2) }}</span>
                                    </div>
                                </div>
                                
                                <div class="flex flex-col md:flex-row gap-6 w-full md:w-auto">
                                    <button onclick="window.location.href='{{ route('catalogue') }}'" class="px-12 py-4 border border-black text-[10px] tracking-[0.2em] uppercase font-semibold hover:bg-black hover:text-white transition-all">
                                        Continue Shopping
                                    </button>
                                    <button onclick="window.open('{{ route('checkout.index') }}', '_blank')" class="px-12 py-4 bg-black text-white text-[10px] tracking-[0.2em] uppercase font-semibold border border-black hover:bg-transparent hover:text-black transition-all">
                                        Proceed to Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-20">
                            <i data-lucide="shopping-cart" class="text-gray-100 w-16 h-16 mx-auto mb-6"></i>
                            <h3 class="font-playfair text-xl mb-4">Your cart is unoccupied</h3>
                            <a href="{{ route('catalogue') }}" class="text-[10px] tracking-[0.3em] uppercase text-gold hover:text-black transition-colors font-semibold">Browse Catalogue</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Payment Methods Section -->
            <div id="payment-methods-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Payment Methods</h2>
                
                <div class="luxury-card">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
                        <p class="text-sm text-gray-400">Manage your preferred secure acquisition methods.</p>
                        <button id="add-payment-method-btn" onclick="showAddPaymentMethodForm()" class="text-[10px] tracking-[0.2em] uppercase text-gold hover:text-black transition-colors font-semibold">
                            + Add Acquisition Method
                        </button>
                    </div>

                    <!-- Payment Methods List -->
                    <div id="payment-methods-list" class="space-y-6">
                        <!-- Methods will be dynamically populated -->
                    </div>
                    
                    <!-- Empty State -->
                    <div id="payment-methods-empty" class="text-center py-20 hidden">
                        <i data-lucide="credit-card" class="text-gray-100 w-16 h-16 mx-auto mb-6"></i>
                        <h3 class="font-playfair text-xl mb-4">No methods archived</h3>
                        <p class="text-sm text-gray-400 max-w-xs mx-auto">Archive a payment method to ensure a swifter experience during your next acquisition.</p>
                    </div>

                    <!-- Add/Edit Payment Method Form -->
                    <div id="add-payment-method-form" class="mt-16 pt-16 border-t border-gray-100" style="display: none;">
                        <h3 class="section-subtitle">New Acquisition Method</h3>
                        <form id="payment-method-form" class="space-y-12">
                            <!-- Payment Type -->
                            <div class="flex gap-12 border-b border-gray-50 pb-8">
                                <label class="flex items-center cursor-pointer group">
                                    <input type="radio" name="payment_type" value="card" class="account-item-checkbox rounded-full mr-4" checked>
                                    <span class="text-[11px] tracking-widest uppercase text-gray-500 group-hover:text-black transition-colors">Credit / Debit Card</span>
                                </label>
                                <label class="flex items-center cursor-pointer group">
                                    <input type="radio" name="payment_type" value="gcash" class="account-item-checkbox rounded-full mr-4">
                                    <span class="text-[11px] tracking-widest uppercase text-gray-500 group-hover:text-black transition-colors">GCash</span>
                                </label>
                            </div>
                            
                            <!-- Fields Container -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <!-- Card Fields -->
                                <div id="card-fields" class="contents">
                                    <div class="md:col-span-2">
                                        <label class="form-label">Card Number</label>
                                        <input type="text" name="card_number" id="card-number" class="w-full form-input" placeholder="0000 0000 0000 0000" maxlength="19">
                                    </div>
                                    <div>
                                        <label class="form-label">Expiration (MM/YY)</label>
                                        <input type="text" name="card_expiry" id="card-expiry" class="w-full form-input" placeholder="MM/YY" maxlength="5">
                                    </div>
                                    <div>
                                        <label class="form-label">Security Code (CVV)</label>
                                        <input type="text" name="card_cvv" id="card-cvv" class="w-full form-input" placeholder="000" maxlength="4">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="form-label">Cardholder Name</label>
                                        <input type="text" name="card_holder_name" class="w-full form-input" placeholder="As it appears on the card">
                                    </div>
                                </div>
                                
                                <!-- GCash Fields -->
                                <div id="gcash-fields" class="contents" style="display: none;">
                                    <div class="md:col-span-2">
                                        <label class="form-label">GCash Mobile Number</label>
                                        <input type="text" name="gcash_number" id="gcash-number" class="w-full form-input" placeholder="09XXXXXXXXX" maxlength="11">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="form-label">Account Name</label>
                                        <input type="text" name="gcash_name" class="w-full form-input" placeholder="As registered with GCash">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Billing Address -->
                            <div class="space-y-10 pt-6">
                                <h4 class="text-[10px] tracking-[0.3em] uppercase font-bold text-gray-300">Billing Address</h4>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="md:col-span-2">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" name="billing_address_line_1" class="w-full form-input" placeholder="Number and street name">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="form-label">Apt, Suite, Unit (Optional)</label>
                                        <input type="text" name="billing_address_line_2" class="w-full form-input" placeholder="Apartment, building, floor">
                                    </div>
                                    <div>
                                        <label class="form-label">Region</label>
                                        <select name="billing_region" id="billing-region" class="w-full form-input" required>
                                            <option value="">Select Region</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Province</label>
                                        <select name="billing_province" id="billing-province" class="w-full form-input" required disabled>
                                            <option value="">Select Province</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">City / Municipality</label>
                                        <select name="billing_city" id="billing-city" class="w-full form-input" required disabled>
                                            <option value="">Select Municipality</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Barangay</label>
                                        <select name="billing_barangay" id="billing-barangay" class="w-full form-input" disabled>
                                            <option value="">Select Barangay</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">ZIP Code</label>
                                        <input type="text" name="billing_zip_code" class="w-full form-input" placeholder="4-digit code">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-4 py-4">
                                <input type="checkbox" name="is_default" class="account-item-checkbox">
                                <span class="text-[10px] tracking-widest uppercase text-gray-400">Establish as primary method</span>
                            </div>
                            
                            <div class="flex flex-col md:flex-row gap-6">
                                <button type="submit" class="save-button flex-1">Archive Method</button>
                                <button type="button" onclick="hideAddPaymentMethodForm()" class="px-12 py-4 border border-gray-200 text-[10px] tracking-[0.2em] uppercase font-semibold hover:border-black transition-all">Discard</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div id="newsletter-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Correspondence</h2>
                
                <div class="luxury-card">
                    <p class="text-sm text-gray-400 mb-12">Curate which narratives and opportunities your House receives from the House of Éclore.</p>
                    
                    <div class="divide-y divide-gray-50">
                        <div class="flex items-center justify-between py-10 group first:pt-0">
                            <div>
                                <h3 class="font-playfair text-xl mb-1 group-hover:text-gold transition-colors">Product Revelations</h3>
                                <p class="text-xs text-gray-400">Be the first to examine our new collections and bespoke masterpieces.</p>
                            </div>
                            <label class="custom-toggle">
                                <input type="checkbox" {{ $user->newsletter_product_updates ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between py-10 group">
                            <div>
                                <h3 class="font-playfair text-xl mb-1 group-hover:text-gold transition-colors">Privileged Offers</h3>
                                <p class="text-xs text-gray-400">Receive exclusive invitations and private acquisition opportunities.</p>
                            </div>
                            <label class="custom-toggle">
                                <input type="checkbox" {{ $user->newsletter_special_offers ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Settings Section -->
            <div id="account-settings-section" class="content-section" style="display: none;" data-aos="fade-up">
                <h2 class="section-title">Security & Protocol</h2>
                
                <div class="luxury-card space-y-12">
                    <p class="text-sm text-gray-400 mb-4">Fortify your digital sanctuary and manage your authentication protocols.</p>
                    
                    <div class="divide-y divide-gray-50">
                        <!-- Password -->
                        <div class="flex items-center justify-between py-8 first:pt-0">
                            <div>
                                <h3 class="font-playfair text-xl mb-1">Access Credentials</h3>
                                <p class="text-xs text-gray-400">Rotate your security phrase for continued protection.</p>
                            </div>
                            <button onclick="goToPasswordSection()" class="text-[10px] tracking-[0.2em] uppercase text-gold hover:text-black transition-colors font-semibold">Initiate Change</button>
                        </div>
                        
                        <!-- 2FA -->
                        <div class="flex items-center justify-between py-8">
                            <div>
                                <h3 class="font-playfair text-xl mb-1">Dual-Factor Protection</h3>
                                <p class="text-xs text-gray-400">Add a verification layer to ensure only you may access your collection.</p>
                                <div id="two-factor-status" class="mt-2">
                                    <span id="two-factor-status-text" class="text-[9px] uppercase tracking-[0.2em] text-gray-300">Synchronizing...</span>
                                </div>
                            </div>
                            <button id="two-factor-toggle" class="text-[10px] tracking-[0.2em] uppercase text-gold hover:text-black transition-colors font-semibold" onclick="toggleTwoFactor()">Synchronizing...</button>
                        </div>
                        
                        <!-- Delete Account -->
                        <div class="flex items-center justify-between py-8">
                            <div>
                                <h3 class="font-playfair text-xl mb-1">Archive Dissolution</h3>
                                <p class="text-xs text-gray-400">Permanently remove your digital presence from the House of Éclore.</p>
                            </div>
                            <button onclick="showDeleteAccountModal()" class="text-[10px] tracking-[0.2em] uppercase text-red-400 hover:text-red-700 transition-colors font-semibold underline underline-offset-8">Dissolve Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->

<!-- Delete Account -->
<div id="delete-account-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-6">
    <div class="bg-white p-12 max-w-lg w-full border border-gray-100 shadow-2xl relative" data-aos="zoom-in">
        <div class="text-center mb-10">
            <h3 class="font-playfair text-3xl mb-4">Account Dissolution</h3>
            <p class="text-sm text-gray-400 font-light max-w-xs mx-auto">Confirming this protocol will permanently remove your account and history. This is irreversible.</p>
        </div>
        
        <form id="delete-account-form" class="space-y-8">
            <div>
                <label class="form-label">
                    @if($user->isSsoUser() && !$user->hasPassword())
                        Confirm Email Address
                    @else
                        Security Phrase Confirmation
                    @endif
                </label>
                <input type="{{ $user->isSsoUser() && !$user->hasPassword() ? 'email' : 'password' }}" 
                       id="delete-account-confirmation" 
                       class="w-full form-input" 
                       required 
                       placeholder="Enter credentials to proceed">
                <p id="delete-confirmation-error" class="text-[10px] text-red-500 mt-2 hidden uppercase tracking-widest font-bold"></p>
            </div>
            
            <div>
                <label class="form-label">Dissolution Rationale (Optional)</label>
                <textarea id="delete-account-reason" class="w-full form-input" rows="3" placeholder="Share your reason for departure..."></textarea>
            </div>
            
            <div class="flex flex-col gap-4 pt-6">
                <button type="submit" class="w-full py-4 bg-red-600 text-white text-[10px] tracking-[0.2em] uppercase font-semibold hover:bg-red-700 transition-colors">Confirm Dissolution</button>
                <button type="button" onclick="hideDeleteAccountModal()" class="w-full py-4 border border-gray-200 text-[10px] tracking-[0.2em] uppercase font-semibold hover:border-black transition-colors">Relinquish Request</button>
            </div>
        </form>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-6">
    <div class="bg-white p-12 max-w-2xl w-full border border-gray-100 shadow-2xl overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-start mb-12">
            <div>
                <h3 class="font-playfair text-4xl mb-2">Refined Opinion</h3>
                <p id="reviewProductName" class="text-[10px] text-gold tracking-[0.3em] font-bold uppercase"></p>
            </div>
            <button onclick="closeReviewModal()" class="text-gray-300 hover:text-black transition-colors">
                <i data-lucide="x" class="w-8 h-8"></i>
            </button>
        </div>
        
        <form id="reviewForm" onsubmit="submitReview(event)" class="space-y-12">
            <input type="hidden" id="reviewProductId" name="product_id">
            <input type="hidden" id="reviewOrderId" name="order_id">
            <input type="hidden" id="reviewRatingValue" name="rating" value="0">
            
            <!-- Rating -->
            <div>
                <label class="form-label mb-8">Masterpiece Evaluation</label>
                <div class="flex gap-6">
                    @for($i = 1; $i <= 5; $i++)
                    <button type="button" onclick="setRating({{ $i }})" class="transition-transform active:scale-95">
                        <i id="star-{{ $i }}" data-lucide="star" class="w-10 h-10 text-gray-100 hover:text-gold transition-colors"></i>
                    </button>
                    @endfor
                </div>
            </div>
            
            <div>
                <label class="form-label">Subject Rationale (Optional)</label>
                <input type="text" id="reviewTitle" name="title" class="w-full form-input" placeholder="Capturing the essence of your review">
            </div>
            
            <div>
                <label class="form-label">Articulation of Experience</label>
                <textarea id="reviewText" name="review" rows="5" class="w-full form-input" required minlength="10" placeholder="Kindly share your detailed testimony regarding this masterpiece..."></textarea>
                <p class="text-[10px] text-gray-300 mt-2 uppercase tracking-[0.2em]">Minimal 10 characters required</p>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6 pt-4">
                <button type="submit" class="save-button flex-1">Submit Testimony</button>
                <button type="button" onclick="closeReviewModal()" class="px-12 py-4 border border-gray-200 text-[10px] tracking-[0.2em] uppercase font-semibold hover:border-black transition-all">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Refund Request Modal -->
<div id="refundModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-6">
    <div class="bg-white p-12 max-w-2xl w-full border border-gray-100 shadow-2xl overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-start mb-12">
            <div>
                <h3 class="font-playfair text-4xl mb-2">Acquisition Reversal</h3>
                <p id="refundProductName" class="text-[10px] text-gold tracking-[0.3em] font-bold uppercase"></p>
            </div>
            <button onclick="closeRefundModal()" class="text-gray-300 hover:text-black transition-colors">
                <i data-lucide="x" class="w-8 h-8"></i>
            </button>
        </div>
        
        <form id="refundForm" onsubmit="submitRefundRequest(event)" class="space-y-12">
            <input type="hidden" id="refundProductId" name="product_id">
            <input type="hidden" id="refundOrderId" name="order_id">
            <input type="hidden" id="refundOrderItemId" name="order_item_id">
            
            <div>
                <label class="form-label">Nature of the Reversal</label>
                <select id="refundReason" name="reason" required class="w-full form-input bg-transparent cursor-pointer">
                    <option value="">Select a rationale...</option>
                    <option value="defective">Defective Masterpiece</option>
                    <option value="item_not_as_described">Variance from Description</option>
                    <option value="item_does_not_fit">Dimensions Incorrect</option>
                    <option value="quality_issues">Composition Concerns</option>
                    <option value="customer_dissatisfaction">Expectation Not Met</option>
                    <option value="wrong_item">Incorrect Piece Received</option>
                    <option value="other">Alternative Rationale</option>
                </select>
            </div>
            
            <div>
                <label class="form-label">Detailed Rationale</label>
                <textarea id="refundDescription" name="description" required minlength="10" rows="4" class="w-full form-input" placeholder="Elaborate on the necessity for this protocol..."></textarea>
                <p class="text-[10px] text-gray-300 mt-2 uppercase tracking-widest"><span id="refundDescriptionCount">0</span> / 1000 characters archived</p>
            </div>
            
            <div>
                <label class="form-label">Evidentiary Imagery (Optional)</label>
                <p class="text-[9px] text-gray-400 mb-4 tracking-widest uppercase leading-relaxed">Provide up to 5 visual documentations to expedite the reversal (max 2MB each)</p>
                <input type="file" id="refundPhotos" name="photos[]" multiple accept="image/*" class="w-full form-input text-[10px]">
                <div id="refundPhotoPreview" class="mt-8 grid grid-cols-5 gap-4 hidden"></div>
            </div>
            
            <div id="refundErrorMessage" class="hidden">
                <div class="p-6 border border-red-50 text-red-600 bg-red-50 text-[10px] uppercase tracking-widest leading-relaxed">
                    <p id="refundErrorText"></p>
                </div>
            </div>
            
            <div id="refundSuccessMessage" class="hidden">
                <div class="p-6 border border-green-50 text-green-700 bg-green-50 text-[10px] uppercase tracking-widest leading-relaxed">
                    <p id="refundSuccessText"></p>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6 pt-6">
                <button type="submit" id="refundSubmitBtn" class="save-button flex-1">
                    <span id="refundSubmitText">Initiate Reversal</span>
                    <span id="refundSubmitLoading" class="hidden">Processing Protocol...</span>
                </button>
                <button type="button" onclick="closeRefundModal()" class="px-12 py-4 border border-gray-200 text-[10px] tracking-[0.2em] uppercase font-semibold hover:border-black transition-all">Cancel Protocol</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('frontend/js/payment-methods.js') }}"></script>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        // Initialize account cart selection functionality
        initializeAccountCartSelection();

        // Handle sidebar navigation
        const sectionLinks = document.querySelectorAll('.sidebar-link');
        const contentSections = document.querySelectorAll('.content-section');
        
        // Show first section by default
        const firstSection = document.getElementById('my-details-section');
        if (firstSection) {
            firstSection.style.display = 'block';
        }
        
        // Add active class to first link
        const firstLink = document.querySelector('[data-target="my-details-section"]');
        if (firstLink) {
            firstLink.classList.add('active');
        }
        
        sectionLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                sectionLinks.forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Hide all content sections
                contentSections.forEach(section => {
                    section.style.display = 'none';
                });
                
                // Show the corresponding content section
                const targetId = this.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.style.display = 'block';
                    
                    // Initialize PSGC functions when address book section is accessed
                    if (targetId === 'address-book-section' && regionsData.length === 0) {
                        loadRegions().catch(error => {
                            console.error('Failed to load regions:', error);
                        });
                    }
                }
            });
        });

        // Phone validation and auto-formatting
        const phoneInput = document.getElementById('phone-input');
        const phoneError = document.getElementById('phone-error');
        const phoneFormatError = document.getElementById('phone-format-error');
        
        if (phoneInput) {
            // Auto-format phone number (add 0 if starts with 9)
            phoneInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, ''); // Remove non-digits
                
                // If user starts typing with 9 and it's the first character, add 0
                if (value.length > 0 && value[0] === '9') {
                    value = '0' + value;
                    this.value = value;
                }
                
                // Only allow digits
                this.value = value;
                
                const originalPhone = this.getAttribute('data-original-phone');
                const currentValue = this.value.trim();
                
                // Hide format error initially
                if (phoneFormatError) {
                    phoneFormatError.classList.add('hidden');
                }
                
                // Show error if user had a phone and is trying to clear it
                if (originalPhone && !currentValue) {
                    if (phoneError) {
                        phoneError.classList.remove('hidden');
                    }
                    this.classList.add('border-red-500');
                } else {
                    if (phoneError) {
                        phoneError.classList.add('hidden');
                    }
                    
                    // Validate Philippine phone format (10-11 digits, starts with 0 or 9)
                    if (currentValue.length > 0) {
                        const isValidLength = currentValue.length >= 10 && currentValue.length <= 11;
                        const startsCorrectly = currentValue[0] === '0' || currentValue[0] === '9';
                        
                        if (!isValidLength || !startsCorrectly) {
                            if (phoneFormatError) {
                                phoneFormatError.classList.remove('hidden');
                            }
                            this.classList.add('border-red-500');
                        } else {
                            if (phoneFormatError) {
                                phoneFormatError.classList.add('hidden');
                            }
                            this.classList.remove('border-red-500');
                        }
                    } else {
                        this.classList.remove('border-red-500');
                    }
                }
            });
            
            // Prevent non-numeric input
            phoneInput.addEventListener('keypress', function(e) {
                if (e.key && !/[0-9]/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
                    e.preventDefault();
                }
            });
        }

        // Username input validation and error clearing
        const usernameInput = document.querySelector('input[name="username"]');
        const usernameError = document.getElementById('username-error');
        
        if (usernameInput && usernameError) {
            // Clear any existing errors on page load
            usernameError.classList.add('hidden');
            usernameInput.classList.remove('border-red-500');
            
            usernameInput.addEventListener('input', function() {
                // Clear error when user starts typing
                usernameError.classList.add('hidden');
                this.classList.remove('border-red-500');
            });
        }

        // Handle personal information form submission
        const personalInfoForm = document.getElementById('personal-info-form');
        if (personalInfoForm) {
            personalInfoForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Get current user data for comparison
                const currentUser = {
                    first_name: '{{ $user->first_name }}',
                    last_name: '{{ $user->last_name }}',
                    username: '{{ $user->username }}',
                    email: '{{ $user->email }}',
                    phone: '{{ $user->phone ?? "" }}'
                };
                
                // Only validate fields that have actually changed
                const formData = new FormData(this);
                const allData = Object.fromEntries(formData);
                
                // Validate username only if it has changed
                const usernameInputs = document.querySelectorAll('input[name="username"]');
                
                // Find the username input within the personal info form, not the login modal
                const personalInfoForm = document.getElementById('personal-info-form');
                const usernameInput = personalInfoForm ? personalInfoForm.querySelector('input[name="username"]') : null;
                const usernameError = document.getElementById('username-error');
                
                
                if (usernameInput && usernameError) {
                    
                    const username = usernameInput.value.trim();
                    const hasChanged = username !== currentUser.username;
                    
                    
                    if (hasChanged) {
                        // Clear any existing errors
                        usernameError.classList.add('hidden');
                        usernameInput.classList.remove('border-red-500');
                        
                        // Basic username validation
                        if (!username || username.length === 0) {
                            usernameError.textContent = 'Username is required.';
                            usernameError.classList.remove('hidden');
                            usernameInput.classList.add('border-red-500');
                            return;
                        }
                        
                        // Username format validation (alphanumeric, underscore, hyphen, 3-20 characters)
                        const usernameRegex = /^[a-zA-Z0-9_-]{3,20}$/;
                        if (!usernameRegex.test(username)) {
                            usernameError.textContent = 'Username must be 3-20 characters long and contain only letters, numbers, underscores, and hyphens.';
                            usernameError.classList.remove('hidden');
                            usernameInput.classList.add('border-red-500');
                            return;
                        }
                    } else {
                        // Username hasn't changed, make sure error is hidden
                        usernameError.classList.add('hidden');
                        usernameInput.classList.remove('border-red-500');
                    }
                }
                
                // Validate phone only if it has changed
                if (allData.phone !== undefined && allData.phone !== currentUser.phone) {
                    const phoneInput = document.getElementById('phone-input');
                    if (phoneInput) {
                        const originalPhone = phoneInput.getAttribute('data-original-phone');
                        const currentValue = phoneInput.value.trim();
                        
                        if (originalPhone && !currentValue) {
                            showNotification('Phone number cannot be removed once added', 'error');
                            return;
                        }
                        
                        // Validate Philippine phone format if phone is provided
                        if (currentValue.length > 0) {
                            const isValidLength = currentValue.length >= 10 && currentValue.length <= 11;
                            const startsCorrectly = currentValue[0] === '0' || currentValue[0] === '9';
                            
                            if (!isValidLength || !startsCorrectly) {
                                showNotification('Please enter a valid Philippine phone number (10-11 digits)', 'error');
                                return;
                            }
                        }
                    }
                }
                
                // Check each field and only include if it has changed
                const data = {};
                if (allData.first_name && allData.first_name !== currentUser.first_name) {
                    data.first_name = allData.first_name;
                }
                if (allData.last_name && allData.last_name !== currentUser.last_name) {
                    data.last_name = allData.last_name;
                }
                if (usernameInput && usernameInput.value.trim() !== currentUser.username) {
                    data.username = usernameInput.value.trim();
                }
                if (allData.email && allData.email !== currentUser.email) {
                    data.email = allData.email;
                    data.password = allData.password; // Include password for email changes
                }
                if (allData.phone !== undefined && allData.phone !== currentUser.phone) {
                    data.phone = allData.phone;
                }
                
                
                // If no fields have changed, show message and return
                if (Object.keys(data).length === 0) {
                    showNotification('No changes detected', 'info');
                    return;
                }
                
                try {
                    const response = await fetch('/api/account/profile/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showNotification('Personal information updated successfully!', 'success');
                        // Update the original phone value after successful save
                        if (phoneInput && data.phone) {
                            phoneInput.setAttribute('data-original-phone', data.phone);
                        }
                        // Force refresh the page
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        // Check if error is related to username
                        if (result.message && (result.message.toLowerCase().includes('username') || result.message.toLowerCase().includes('taken'))) {
                            if (usernameError) {
                                usernameError.textContent = result.message;
                                usernameError.classList.remove('hidden');
                            }
                            if (usernameInput) {
                                usernameInput.classList.add('border-red-500');
                            }
                        } else {
                            showNotification(result.message || 'Failed to update personal information', 'error');
                        }
                    }
                } catch (error) {
                    showNotification('An error occurred while updating personal information', 'error');
                }
            });
        }

        // Clear email password error when user starts typing
        const emailPasswordInput = document.getElementById('email-password');
        const emailPasswordError = document.getElementById('email-password-error');
        
        if (emailPasswordInput && emailPasswordError) {
            emailPasswordInput.addEventListener('input', function() {
                emailPasswordError.classList.add('hidden');
                this.classList.remove('border-red-500');
            });
        }

        // Handle email form submission
        const emailForm = document.getElementById('email-form');
        if (emailForm) {
            emailForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);
                
                // Hide any previous errors
                const emailPasswordError = document.getElementById('email-password-error');
                const emailPasswordInput = document.getElementById('email-password');
                if (emailPasswordError) {
                    emailPasswordError.classList.add('hidden');
                }
                if (emailPasswordInput) {
                    emailPasswordInput.classList.remove('border-red-500');
                }
                
                // Check if password is provided
                if (!data.password || data.password.trim() === '') {
                    if (emailPasswordError) {
                        emailPasswordError.textContent = 'Password is required to change email.';
                        emailPasswordError.classList.remove('hidden');
                    }
                    if (emailPasswordInput) {
                        emailPasswordInput.classList.add('border-red-500');
                    }
                    return;
                }
                
                try {
                    const response = await fetch('/api/account/profile/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showNotification('Email updated successfully!', 'success');
                        // Clear password field
                        if (emailPasswordInput) {
                            emailPasswordInput.value = '';
                        }
                        // Force refresh the page
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        // Check if error is related to incorrect password
                        if (result.message && result.message.toLowerCase().includes('password')) {
                            if (emailPasswordError) {
                                emailPasswordError.textContent = 'Current password is incorrect.';
                                emailPasswordError.classList.remove('hidden');
                            }
                            if (emailPasswordInput) {
                                emailPasswordInput.classList.add('border-red-500');
                            }
                        } else {
                            showNotification(result.message || 'Failed to update email', 'error');
                        }
                    }
                } catch (error) {
                    showNotification('An error occurred while updating email', 'error');
                }
            });
        }

        // Password validation
        const newPasswordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const passwordRequirements = document.getElementById('password-requirements');
        const confirmPasswordError = document.getElementById('confirm-password-error');
        
        // Show password requirements when user starts typing
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', function() {
                const password = this.value;
                
                // Show requirements box
                if (password.length > 0) {
                    passwordRequirements.classList.remove('hidden');
                } else {
                    passwordRequirements.classList.add('hidden');
                }
                
                // Validate each requirement
                validatePasswordRequirement('req-length', password.length >= 8);
                validatePasswordRequirement('req-lowercase', /[a-z]/.test(password));
                validatePasswordRequirement('req-uppercase', /[A-Z]/.test(password));
                validatePasswordRequirement('req-number', /[0-9]/.test(password));
                validatePasswordRequirement('req-special', /[!@#$%^&*(),.?":{}|<>]/.test(password));
                
                // Check if confirm password matches
                if (confirmPasswordInput.value) {
                    validatePasswordMatch();
                }
            });
        }
        
        // Validate password match when user types in confirm password
        if (confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);
        }
        
        function validatePasswordRequirement(reqId, isValid) {
            const reqElement = document.getElementById(reqId);
            if (reqElement) {
                const icon = reqElement.querySelector('.req-icon');
                if (isValid) {
                    reqElement.classList.remove('text-gray-400');
                    reqElement.classList.add('text-green-600');
                    icon.setAttribute('data-lucide', 'check');
                } else {
                    reqElement.classList.remove('text-green-600');
                    reqElement.classList.add('text-gray-400');
                    icon.setAttribute('data-lucide', 'x');
                }
                // Reinitialize the icon
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }
        }
        
        function validatePasswordMatch() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (confirmPassword && newPassword !== confirmPassword) {
                confirmPasswordError.classList.remove('hidden');
                confirmPasswordInput.classList.add('border-red-500');
            } else {
                confirmPasswordError.classList.add('hidden');
                confirmPasswordInput.classList.remove('border-red-500');
            }
        }
        
        function isPasswordValid(password) {
            return password.length >= 8 &&
                   /[a-z]/.test(password) &&
                   /[A-Z]/.test(password) &&
                   /[0-9]/.test(password) &&
                   /[!@#$%^&*(),.?":{}|<>]/.test(password);
        }

        // Handle password form submission
        const passwordForm = document.getElementById('password-form');
        if (passwordForm) {
            passwordForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);
                
                // Validate new password requirements
                if (!isPasswordValid(data.new_password)) {
                    showNotification('Password does not meet the requirements', 'error');
                    return;
                }
                
                // Validate password confirmation
                if (data.new_password !== data.new_password_confirmation) {
                    showNotification('Passwords do not match', 'error');
                    confirmPasswordError.classList.remove('hidden');
                    return;
                }
                
                try {
                    const response = await fetch('/api/account/password/change', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showNotification('Password changed successfully!', 'success');
                        passwordForm.reset();
                        passwordRequirements.classList.add('hidden');
                        confirmPasswordError.classList.add('hidden');
                        // Reset all requirement icons
                        ['req-length', 'req-lowercase', 'req-uppercase', 'req-number', 'req-special'].forEach(reqId => {
                            validatePasswordRequirement(reqId, false);
                        });
                        // Force refresh the page
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        // Check if error is related to current password
                        if (result.message && result.message.toLowerCase().includes('current password')) {
                            document.getElementById('current-password-error').classList.remove('hidden');
                            document.getElementById('current-password').classList.add('border-red-500');
                            // Don't show notification for password errors - inline error is enough
                        } else {
                            // Show notification for other errors
                            showNotification(result.message || 'Failed to change password', 'error');
                        }
                    }
                } catch (error) {
                    showNotification('An error occurred while changing password', 'error');
                }
            });
        }
        
        // Clear current password error when user starts typing
        const currentPasswordInput = document.getElementById('current-password');
        if (currentPasswordInput) {
            currentPasswordInput.addEventListener('input', function() {
                document.getElementById('current-password-error').classList.add('hidden');
                this.classList.remove('border-red-500');
            });
        }

        // Password visibility toggle functionality
        function initPasswordToggle(inputId) {
            const input = document.getElementById(inputId);
            if (!input) return;
            
            const toggleButton = input.parentElement.querySelector('[data-lucide="eye"], [data-lucide="eye-off"]');
            if (!toggleButton) return;
            
            toggleButton.addEventListener('click', function() {
                const type = input.getAttribute('type');
                
                if (type === 'password') {
                    input.setAttribute('type', 'text');
                    this.setAttribute('data-lucide', 'eye-off');
                } else {
                    input.setAttribute('type', 'password');
                    this.setAttribute('data-lucide', 'eye');
                }
                
                // Reinitialize Lucide icons to update the icon
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        }
        
        // Initialize password toggles for new and confirm password fields
        initPasswordToggle('new-password');
        initPasswordToggle('confirm-password');

        // Newsletter toggle functionality
        const newsletterToggles = document.querySelectorAll('#newsletter-section input[type="checkbox"]');
        newsletterToggles.forEach(toggle => {
            toggle.addEventListener('change', async function() {
                const isEnabled = this.checked;
                const type = this.closest('.flex').querySelector('h3').textContent.toLowerCase().includes('product') ? 'product_updates' : 'special_offers';
                
                try {
                    const response = await fetch('/api/account/newsletter/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                            [type]: isEnabled
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                        showNotification('Newsletter preferences updated successfully!', 'success');
            } else {
                        showNotification(result.message || 'Failed to update newsletter preferences', 'error');
                        // Revert the toggle if the request failed
                        this.checked = !isEnabled;
            }
        } catch (error) {
                    showNotification('An error occurred while updating newsletter preferences', 'error');
                    // Revert the toggle if the request failed
                    this.checked = !isEnabled;
                }
            });
        });

        // Address form functionality
        const updateAddressForm = document.getElementById('update-address-form');
        if (updateAddressForm) {
            updateAddressForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Get form data manually to include disabled fields
                const regionSelect = document.getElementById('region-select');
                const provinceSelect = document.getElementById('province-select');
                const citySelect = document.getElementById('city-select');
                const barangaySelect = document.getElementById('barangay-select');
                
                const data = {
                    street: this.querySelector('input[name="street"]').value,
                    region: regionSelect ? regionSelect.value : '',
                    province: provinceSelect ? provinceSelect.value : '', // Include even if disabled/empty
                    city: citySelect ? citySelect.value : '',
                    barangay: barangaySelect ? barangaySelect.value : '',
                    zip_code: this.querySelector('input[name="zip_code"]').value
                };
                
                
                try {
                    const response = await fetch('/api/account/address/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showNotification('Address updated successfully!', 'success');
                        hideEditAddressForm();
                        // Refresh the page to show updated address
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        showNotification(result.message || 'Failed to update address', 'error');
                    }
                } catch (error) {
                    console.error('Error updating address:', error);
                    showNotification('An error occurred while updating address', 'error');
                }
            });
        }
    });

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
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('❌ API Error Response:', errorText);
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
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
            
            const regionSelect = document.getElementById('region-select');
            if (regionSelect) {
                regionSelect.innerHTML = '<option value="">Select Region</option>';
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
            
            // Fallback to static regions data
            regionsData = [
                { name: 'National Capital Region (NCR)', code: 'NCR' },
                { name: 'Cordillera Administrative Region (CAR)', code: 'CAR' },
                { name: 'Region I (Ilocos Region)', code: '01' },
                { name: 'Region II (Cagayan Valley)', code: '02' },
                { name: 'Region III (Central Luzon)', code: '03' },
                { name: 'Region IV-A (CALABARZON)', code: '04A' },
                { name: 'Region IV-B (MIMAROPA)', code: '04B' },
                { name: 'Region V (Bicol Region)', code: '05' },
                { name: 'Region VI (Western Visayas)', code: '06' },
                { name: 'Region VII (Central Visayas)', code: '07' },
                { name: 'Region VIII (Eastern Visayas)', code: '08' },
                { name: 'Region IX (Zamboanga Peninsula)', code: '09' },
                { name: 'Region X (Northern Mindanao)', code: '10' },
                { name: 'Region XI (Davao Region)', code: '11' },
                { name: 'Region XII (SOCCSKSARGEN)', code: '12' },
                { name: 'Region XIII (Caraga)', code: '13' },
                { name: 'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)', code: 'BARMM' }
            ];
            
            const regionSelect = document.getElementById('region-select');
            if (regionSelect) {
                regionSelect.innerHTML = '<option value="">Select Region</option>';
                regionsData.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.name;
                    option.setAttribute('data-code', region.code);
                    option.textContent = region.name;
                    regionSelect.appendChild(option);
                });
            }
            
            showNotification('Using offline regions data. Some features may be limited.', 'warning');
        }
    }
    
    // Load provinces for selected region using v2 nested endpoint
    async function loadProvinces(regionCodeOrName) {
        try {
            currentRegionCode = regionCodeOrName;
            const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/provinces`;
            
            const response = await fetch(url);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('❌ Response error:', errorText);
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Extract provinces array from response (v2 API wraps in {data: [...]})
            const provinces = data.data || data;
            
            
            // Special case: Some regions (like NCR) have no provinces, go directly to cities
            if (!Array.isArray(provinces) || provinces.length === 0) {
                
                // Skip province selection and load cities directly
                const provinceSelect = document.getElementById('province-select');
                if (provinceSelect) {
                    provinceSelect.innerHTML = '<option value="">No provinces (loading cities...)</option>';
                    provinceSelect.disabled = true;
                }
                
                // Load cities directly for this region
                await loadCitiesDirectly(regionCodeOrName);
                return;
            }
            
            const provinceSelect = document.getElementById('province-select');
            if (provinceSelect) {
                provinceSelect.innerHTML = '<option value="">Select Province</option>';
                provinceSelect.disabled = false;
                
                provinces.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.name;
                    option.setAttribute('data-code', province.code);
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            }
            
        } catch (error) {
            console.error('❌ Error loading provinces:', error);
            
            // Fallback for NCR (no provinces, load cities directly)
            if (regionCodeOrName === 'National Capital Region (NCR)' || regionCodeOrName === 'NCR') {
                await loadCitiesDirectly(regionCodeOrName);
                return;
            }
            
            showNotification('Failed to load provinces. Please try again.', 'error');
        }
    }
    
    // Load cities/municipalities directly for a region (for regions without provinces like NCR)
    async function loadCitiesDirectly(regionCodeOrName) {
        try {
            const url = `${PSGC_API}/regions/${encodeURIComponent(regionCodeOrName)}/cities-municipalities`;
            
            const response = await fetch(url);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('❌ Response error:', errorText);
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Extract cities array from response (v2 API wraps in {data: [...]})
            const cities = data.data || data;
            
            const citySelect = document.getElementById('city-select');
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
            console.error('❌ Error loading cities:', error);
            
            // Fallback for NCR cities
            if (regionCodeOrName === 'National Capital Region (NCR)' || regionCodeOrName === 'NCR') {
                const ncrCities = [
                    { name: 'Caloocan', type: 'City' },
                    { name: 'Las Piñas', type: 'City' },
                    { name: 'Makati', type: 'City' },
                    { name: 'Malabon', type: 'City' },
                    { name: 'Mandaluyong', type: 'City' },
                    { name: 'Manila', type: 'City' },
                    { name: 'Marikina', type: 'City' },
                    { name: 'Muntinlupa', type: 'City' },
                    { name: 'Navotas', type: 'City' },
                    { name: 'Parañaque', type: 'City' },
                    { name: 'Pasay', type: 'City' },
                    { name: 'Pasig', type: 'City' },
                    { name: 'Pateros', type: 'Municipality' },
                    { name: 'Quezon City', type: 'City' },
                    { name: 'San Juan', type: 'City' },
                    { name: 'Taguig', type: 'City' },
                    { name: 'Valenzuela', type: 'City' }
                ];
                
                const citySelect = document.getElementById('city-select');
                if (citySelect) {
                    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                    citySelect.disabled = false;
                    
                    ncrCities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name;
                        option.textContent = `${city.name} (${city.type})`;
                        citySelect.appendChild(option);
                    });
                }
                
                showNotification('Using offline NCR cities data.', 'warning');
                return;
            }
            
            showNotification('Failed to load cities. Please try again.', 'error');
        }
    }
    
    // Load cities/municipalities for selected province using v2 nested endpoint
    async function loadCities(provinceCodeOrName) {
        try {
            currentProvinceCode = provinceCodeOrName;
            const url = `${PSGC_API}/regions/${encodeURIComponent(currentRegionCode)}/provinces/${encodeURIComponent(provinceCodeOrName)}/cities-municipalities`;
            
            const response = await fetch(url);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('❌ Response error:', errorText);
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Extract cities array from response (v2 API wraps in {data: [...]})
            const cities = data.data || data;
            
            const citySelect = document.getElementById('city-select');
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
            console.error('❌ Error loading cities:', error);
            showNotification('Failed to load cities. Please try again.', 'error');
        }
    }
    
    // Load barangays for selected city using v2 endpoint
    async function loadBarangays(cityCodeOrName) {
        try {
            // Use the direct cities-municipalities endpoint to get barangays
            const url = `${PSGC_API}/cities-municipalities/${encodeURIComponent(cityCodeOrName)}/barangays`;
            
            const response = await fetch(url);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('❌ Response error:', errorText);
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Extract barangays array from response (v2 API wraps in {data: [...]})
            const barangays = data.data || data;
            
            const barangaySelect = document.getElementById('barangay-select');
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
            console.error('❌ Error loading barangays:', error);
            showNotification('Failed to load barangays. Please try again.', 'error');
        }
    }
    
    // Billing Address PSGC Functions
    async function loadBillingRegions() {
        try {
            const response = await fetch(`${PSGC_API}/regions`);
            const data = await response.json();
            billingRegionsData = data.data || data;
            
            const regionSelect = document.getElementById('billing-region');
            if (regionSelect) {
                regionSelect.innerHTML = '<option value="">Select Region</option>';
                
                if (Array.isArray(billingRegionsData)) {
                    billingRegionsData.forEach(region => {
                        const option = document.createElement('option');
                        option.value = region.name;
                        option.setAttribute('data-code', region.code);
                        option.textContent = region.name;
                        regionSelect.appendChild(option);
                    });
                }
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
    const regionSelect = document.getElementById('region-select');
    const provinceSelect = document.getElementById('province-select');
    const citySelect = document.getElementById('city-select');
    const barangaySelect = document.getElementById('barangay-select');
    
    if (regionSelect) {
        regionSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const regionName = selectedOption.value;
            const regionCode = selectedOption.getAttribute('data-code');
            
            
            // Reset province code (important for regions without provinces)
            currentProvinceCode = '';
            
            // Reset province, city and barangay
            if (provinceSelect) {
                provinceSelect.innerHTML = '<option value="">Select Province</option>';
                provinceSelect.disabled = true;
            }
            if (citySelect) {
                citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                citySelect.disabled = true;
            }
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            // Clear zip code
            const zipCodeInput = document.querySelector('input[name="zip_code"]');
            if (zipCodeInput) {
                zipCodeInput.value = '';
            }
            
            if (regionName) {
                loadProvinces(regionName);
            }
        });
    }
    
    if (provinceSelect) {
        provinceSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const provinceName = selectedOption.value;
            const provinceCode = selectedOption.getAttribute('data-code');
            
            
            // Reset city and barangay
            if (citySelect) {
                citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                citySelect.disabled = true;
            }
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            // Clear zip code
            const zipCodeInput = document.querySelector('input[name="zip_code"]');
            if (zipCodeInput) {
                zipCodeInput.value = '';
            }
            
            if (provinceName) {
                loadCities(provinceName);
            }
        });
    }
    
    if (citySelect) {
        citySelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const cityName = selectedOption.value;
            const cityCode = selectedOption.getAttribute('data-code');
            
            
            // Reset barangay
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            if (cityName) {
                loadBarangays(cityName);
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

    // Address form helper functions
    async function showEditAddressForm() {
        document.getElementById('edit-address-form').style.display = 'block';
        
        // Load regions if not already loaded
        if (regionsData.length === 0) {
            await loadRegions();
        }
        
        // Set up event listeners for address form elements
        setupAddressFormEventListeners();
        
        // Scroll to the edit form
        document.getElementById('edit-address-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function hideEditAddressForm() {
        document.getElementById('edit-address-form').style.display = 'none';
    }

    function showAddAddressForm() {
        showNotification('Add new address functionality coming soon!', 'info');
    }

    // Set up event listeners for address form elements
    function setupAddressFormEventListeners() {
        // Region select event listener
        const regionSelect = document.getElementById('region-select');
        if (regionSelect) {
            // Remove existing event listeners to prevent duplicates
            regionSelect.removeEventListener('change', handleRegionChange);
            regionSelect.addEventListener('change', handleRegionChange);
        }

        // Province select event listener
        const provinceSelect = document.getElementById('province-select');
        if (provinceSelect) {
            provinceSelect.removeEventListener('change', handleProvinceChange);
            provinceSelect.addEventListener('change', handleProvinceChange);
        }

        // City select event listener
        const citySelect = document.getElementById('city-select');
        if (citySelect) {
            citySelect.removeEventListener('change', handleCityChange);
            citySelect.addEventListener('change', handleCityChange);
        }
    }

    // Event handlers for address form
    async function handleRegionChange(event) {
        const selectedRegion = event.target.value;
        if (selectedRegion) {
            // Reset dependent selects
            const provinceSelect = document.getElementById('province-select');
            const citySelect = document.getElementById('city-select');
            const barangaySelect = document.getElementById('barangay-select');
            
            if (provinceSelect) {
                provinceSelect.innerHTML = '<option value="">Select Province</option>';
                provinceSelect.disabled = true;
            }
            if (citySelect) {
                citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                citySelect.disabled = true;
            }
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            // Load provinces for selected region
            await loadProvinces(selectedRegion);
        }
    }

    async function handleProvinceChange(event) {
        const selectedProvince = event.target.value;
        if (selectedProvince) {
            // Reset dependent selects
            const citySelect = document.getElementById('city-select');
            const barangaySelect = document.getElementById('barangay-select');
            
            if (citySelect) {
                citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                citySelect.disabled = true;
            }
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            // Load cities for selected province
            await loadCities(selectedProvince);
        }
    }

    async function handleCityChange(event) {
        const selectedCity = event.target.value;
        if (selectedCity) {
            // Reset dependent selects
            const barangaySelect = document.getElementById('barangay-select');
            
            if (barangaySelect) {
                barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                barangaySelect.disabled = true;
            }
            
            // Load barangays for selected city
            await loadBarangays(selectedCity);
        }
    }

    // Helper function for notifications
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg ${
            type === 'success' ? 'bg-green-500 text-white' : 
            type === 'error' ? 'bg-red-500 text-white' : 
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Navigate to password section in My Details
    function goToPasswordSection() {
        // Hide all content sections
        const contentSections = document.querySelectorAll('.content-section');
        contentSections.forEach(section => {
            section.style.display = 'none';
        });
        
        // Show My Details section
        const myDetailsSection = document.getElementById('my-details-section');
        if (myDetailsSection) {
            myDetailsSection.style.display = 'block';
        }
        
        // Remove active class from all sidebar links
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        sidebarLinks.forEach(link => link.classList.remove('active'));
        
        // Add active class to My Details link
        const myDetailsLink = document.querySelector('[data-target="my-details-section"]');
        if (myDetailsLink) {
            myDetailsLink.classList.add('active');
        }
        
        // Scroll to password form
        setTimeout(() => {
            const passwordForm = document.getElementById('password-form');
            if (passwordForm) {
                passwordForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                
                // Focus on the current password field after scrolling
                setTimeout(() => {
                    const currentPasswordInput = document.getElementById('current-password');
                    if (currentPasswordInput) {
                        currentPasswordInput.focus();
                    }
                }, 500);
            }
        }, 100);
    }

    // Show delete account modal
    function showDeleteAccountModal() {
        const modal = document.getElementById('delete-account-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Reinitialize Lucide icons for the modal
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    }

    // Hide delete account modal
    function hideDeleteAccountModal() {
        const modal = document.getElementById('delete-account-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            
            // Clear form
            document.getElementById('delete-account-confirmation').value = '';
            document.getElementById('delete-account-reason').value = '';
            document.getElementById('delete-confirmation-error').classList.add('hidden');
        }
    }

    // Handle delete account form submission
    const deleteAccountForm = document.getElementById('delete-account-form');
    if (deleteAccountForm) {
        deleteAccountForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const isGoogleSso = {{ $user->isSsoUser() && !$user->hasPassword() ? 'true' : 'false' }};
            const confirmationValue = document.getElementById('delete-account-confirmation').value;
            const reason = document.getElementById('delete-account-reason').value;
            const errorElement = document.getElementById('delete-confirmation-error');
            
            // Hide previous errors
            if (errorElement) {
                errorElement.classList.add('hidden');
            }
            
            try {
                const requestBody = {
                    reason: reason
                };
                
                // Add password or email based on user type
                if (isGoogleSso) {
                    requestBody.email = confirmationValue;
                } else {
                    requestBody.password = confirmationValue;
                }
                
                const response = await fetch('/api/account/archive', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(requestBody)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showNotification('Account deleted successfully. Redirecting...', 'success');
                    
                    // Redirect after a short delay
                    setTimeout(() => {
                        window.location.href = result.redirect || '/';
                    }, 1500);
                } else {
                    if (result.message && (result.message.toLowerCase().includes('password') || result.message.toLowerCase().includes('email'))) {
                        if (errorElement) {
                            errorElement.textContent = result.message;
                            errorElement.classList.remove('hidden');
                        }
                    } else {
                        showNotification(result.message || 'Failed to delete account', 'error');
                    }
                }
            } catch (error) {
                console.error('Error deleting account:', error);
                showNotification('An error occurred while deleting your account', 'error');
            }
        });
    }

    // Close modal when clicking outside
    document.getElementById('delete-account-modal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            hideDeleteAccountModal();
        }
    });

    // Cart quantity controls
    document.addEventListener('click', async function(e) {
        // Increase quantity
        if (e.target.closest('.increase-qty')) {
            const button = e.target.closest('.increase-qty');
            const productId = button.getAttribute('data-product-id');
            const quantitySpan = button.previousElementSibling;
            const currentQty = parseInt(quantitySpan.textContent);
            
            try {
                const response = await fetch('/api/cart/update', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ 
                        product_id: productId, 
                        quantity: currentQty + 1 
                    })
                });
                
                const result = await response.json();
                if (result.success) {
                    // Update quantity display
                    quantitySpan.textContent = currentQty + 1;
                    updateCartSummary();
                    showNotification('Cart updated', 'success');
                } else {
                    showNotification(result.message || 'Failed to update quantity', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            }
        }
        
        // Decrease quantity
        if (e.target.closest('.decrease-qty')) {
            const button = e.target.closest('.decrease-qty');
            const productId = button.getAttribute('data-product-id');
            const quantitySpan = button.nextElementSibling;
            const currentQty = parseInt(quantitySpan.textContent);
            
            if (currentQty <= 1) {
                showNotification('Quantity cannot be less than 1', 'error');
                return;
            }
            
            try {
                const response = await fetch('/api/cart/update', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ 
                        product_id: productId, 
                        quantity: currentQty - 1 
                    })
                });
                
                const result = await response.json();
                if (result.success) {
                    // Update quantity display
                    quantitySpan.textContent = currentQty - 1;
                    updateCartSummary();
                    showNotification('Cart updated', 'success');
                } else {
                    showNotification(result.message || 'Failed to update quantity', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            }
        }
        
        // Remove item
        if (e.target.closest('.remove-cart-item')) {
            if (!confirm('Are you sure you want to remove this item from your cart?')) {
                return;
            }
            
            const button = e.target.closest('.remove-cart-item');
            const productId = button.getAttribute('data-product-id');
            const cartItem = button.closest('.cart-item');
            
            try {
                const response = await fetch('/api/cart/remove', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ product_id: productId })
                });
                
                const result = await response.json();
                if (result.success) {
                    // Remove item from DOM
                    cartItem.remove();
                    updateCartSummary();
                    showNotification('Item removed from cart', 'success');
                    
                    // Check if cart is empty
                    const remainingItems = document.querySelectorAll('.cart-item');
                    if (remainingItems.length === 0) {
                        location.reload(); // Reload to show empty state
                    }
                } else {
                    showNotification(result.message || 'Failed to remove item', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            }
        }
    });

    // Function to update cart summary
    async function updateCartSummary() {
        try {
            const response = await fetch('/api/cart');
            const result = await response.json();
            
            if (result.success) {
                const items = result.data?.cart_items || result.items || [];
                const totalQuantity = items.reduce((sum, item) => sum + item.quantity, 0); // Sum of all quantities
                const totalPrice = items.reduce((sum, item) => sum + item.total_price, 0);
                
                // Update each individual item's displayed price
                items.forEach(item => {
                    const cartItem = document.querySelector(`.cart-item[data-product-id="${item.product_id}"]`);
                    if (cartItem) {
                        const priceElement = cartItem.querySelector('.item-total-price');
                        if (priceElement) {
                            priceElement.textContent = `₱${parseFloat(item.total_price).toFixed(2)}`;
                        }
                    }
                });
                
                // Update subtotal display
                const totalQtyElement = document.getElementById('cart-total-qty');
                const totalPriceElement = document.getElementById('cart-total-price');
                
                if (totalQtyElement) totalQtyElement.textContent = totalQuantity;
                if (totalPriceElement) totalPriceElement.textContent = `₱${totalPrice.toFixed(2)}`;
            }
        } catch (error) {
            console.error('Error updating cart summary:', error);
        }
    }

    // Toggle Order Details Accordion (only one open at a time)
    function toggleOrderDetails(orderId) {
        const detailsElement = document.getElementById(orderId + '-details');
        const button = document.querySelector(`[onclick="toggleOrderDetails('${orderId}')"]`);
        const chevronIcon = button.querySelector('.chevron-icon');
        const viewDetailsText = button.querySelector('.view-details-text');
        
        // Check if this accordion is currently open
        const isCurrentlyOpen = !detailsElement.classList.contains('hidden');
        
        // Close all other open accordions first
        closeAllOrderDetails();
        
        // If this accordion wasn't open, open it
        if (!isCurrentlyOpen) {
            // Show details
            detailsElement.classList.remove('hidden');
            detailsElement.classList.add('block');
            chevronIcon.style.transform = 'rotate(180deg)';
            viewDetailsText.textContent = 'Hide Details';
            
            // Reinitialize Lucide icons for the new content
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    }

    // Close all order details accordions
    function closeAllOrderDetails() {
        // Find all order details elements
        const allDetailsElements = document.querySelectorAll('[id$="-details"]');
        
        allDetailsElements.forEach(detailsElement => {
            if (!detailsElement.classList.contains('hidden')) {
                // Get the order ID from the details element ID
                const orderId = detailsElement.id.replace('-details', '');
                const button = document.querySelector(`[onclick="toggleOrderDetails('${orderId}')"]`);
                
                if (button) {
                    const chevronIcon = button.querySelector('.chevron-icon');
                    const viewDetailsText = button.querySelector('.view-details-text');
                    
                    // Hide details
                    detailsElement.classList.add('hidden');
                    detailsElement.classList.remove('block');
                    
                    if (chevronIcon) {
                        chevronIcon.style.transform = 'rotate(0deg)';
                    }
                    if (viewDetailsText) {
                        viewDetailsText.textContent = 'View Details';
                    }
                }
            }
        });
    }

    // View Receipt function
    function viewReceipt(orderNumber) {
        window.open(`/account/receipt/${orderNumber}`, '_blank');
    }

    // Open Review Modal
    function openReviewModal(productId, orderId, productName) {
        const modal = document.getElementById('reviewModal');
        const modalProductName = document.getElementById('reviewProductName');
        const reviewForm = document.getElementById('reviewForm');
        
        // Set product name
        modalProductName.textContent = productName;
        
        // Set hidden form values
        document.getElementById('reviewProductId').value = productId;
        document.getElementById('reviewOrderId').value = orderId;
        
        // Reset form
        reviewForm.reset();
        setRating(0);
        
        // Show modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Close Review Modal
    function closeReviewModal() {
        const modal = document.getElementById('reviewModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Set Rating
    let selectedRating = 0;
    function setRating(rating) {
        selectedRating = rating;
        document.getElementById('reviewRatingValue').value = rating;
        
        // Update star display
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById(`star-${i}`);
            if (i <= rating) {
                star.classList.add('text-yellow-400');
                star.classList.remove('text-gray-300');
            } else {
                star.classList.add('text-gray-300');
                star.classList.remove('text-yellow-400');
            }
        }
        
        // Reinitialize Lucide icons to apply color changes
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Submit Review
    async function submitReview(event) {
        event.preventDefault();
        
        const form = event.target;
        const formData = new FormData(form);
        
        // Validate rating
        if (selectedRating === 0) {
            showNotification('Please select a rating', 'error');
            return;
        }
        
        // Validate review text
        const reviewText = formData.get('review');
        if (!reviewText || reviewText.trim().length < 10) {
            showNotification('Review must be at least 10 characters', 'error');
            return;
        }
        
        try {
            const response = await fetch('/api/reviews/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'include',
                body: JSON.stringify({
                    product_id: formData.get('product_id'),
                    order_id: formData.get('order_id'),
                    rating: formData.get('rating'),
                    title: formData.get('title'),
                    review: reviewText
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                showNotification(result.message, 'success');
                closeReviewModal();
                
                // Reload orders to update the "Write Review" button (preserving current filter)
                loadOrdersPage(1, currentOrderStatus);
            } else {
                showNotification(result.message || 'Failed to submit review', 'error');
            }
        } catch (error) {
            console.error('Error submitting review:', error);
            showNotification('An error occurred while submitting your review', 'error');
        }
    }

    // Open Refund Modal
    function openRefundModal(productId, orderId, orderItemId, productName) {
        const modal = document.getElementById('refundModal');
        const modalProductName = document.getElementById('refundProductName');
        const refundForm = document.getElementById('refundForm');
        
        // Set product name
        modalProductName.textContent = productName;
        
        // Set hidden form values
        document.getElementById('refundProductId').value = productId;
        document.getElementById('refundOrderId').value = orderId;
        document.getElementById('refundOrderItemId').value = orderItemId;
        
        // Reset form
        refundForm.reset();
        document.getElementById('refundDescriptionCount').textContent = '0';
        document.getElementById('refundNotesCount').textContent = '0';
        document.getElementById('refundPhotoPreview').classList.add('hidden');
        document.getElementById('refundPhotoPreview').innerHTML = '';
        document.getElementById('refundErrorMessage').classList.add('hidden');
        document.getElementById('refundSuccessMessage').classList.add('hidden');
        document.getElementById('refundSubmitBtn').disabled = false;
        document.getElementById('refundSubmitText').classList.remove('hidden');
        document.getElementById('refundSubmitLoading').classList.add('hidden');
        
        // Add character counters
        const descriptionField = document.getElementById('refundDescription');
        const notesField = document.getElementById('refundCustomerNotes');
        
        descriptionField.addEventListener('input', function() {
            document.getElementById('refundDescriptionCount').textContent = this.value.length;
        });
        
        notesField.addEventListener('input', function() {
            document.getElementById('refundNotesCount').textContent = this.value.length;
        });
        
        // Add photo preview
        const photoInput = document.getElementById('refundPhotos');
        photoInput.addEventListener('change', function(e) {
            const preview = document.getElementById('refundPhotoPreview');
            preview.innerHTML = '';
            
            if (e.target.files.length > 0) {
                preview.classList.remove('hidden');
                
                Array.from(e.target.files).slice(0, 5).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-20 object-cover rounded-lg border border-gray-300';
                        img.alt = `Preview ${index + 1}`;
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                preview.classList.add('hidden');
            }
        });
        
        // Show modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Reinitialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Close Refund Modal
    function closeRefundModal() {
        const modal = document.getElementById('refundModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Submit Refund Request
    async function submitRefundRequest(event) {
        event.preventDefault();
        
        const form = event.target;
        const formData = new FormData(form);
        
        // Hide previous messages
        document.getElementById('refundErrorMessage').classList.add('hidden');
        document.getElementById('refundSuccessMessage').classList.add('hidden');
        
        // Validate description
        const description = formData.get('description');
        if (!description || description.trim().length < 10) {
            document.getElementById('refundErrorText').textContent = 'Description must be at least 10 characters';
            document.getElementById('refundErrorMessage').classList.remove('hidden');
            return;
        }
        
        // Validate reason
        const reason = formData.get('reason');
        if (!reason) {
            document.getElementById('refundErrorText').textContent = 'Please select a reason for the refund';
            document.getElementById('refundErrorMessage').classList.remove('hidden');
            return;
        }
        
        // Disable submit button
        const submitBtn = document.getElementById('refundSubmitBtn');
        submitBtn.disabled = true;
        document.getElementById('refundSubmitText').classList.add('hidden');
        document.getElementById('refundSubmitLoading').classList.remove('hidden');
        
        try {
            const response = await fetch('{{ route("account.refund-request.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'include',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                document.getElementById('refundSuccessText').textContent = result.message || 'Refund request submitted successfully!';
                document.getElementById('refundSuccessMessage').classList.remove('hidden');
                
                // Reload orders after a short delay
                setTimeout(() => {
                    closeRefundModal();
                    // Reload orders to update the refund request status (preserving current filter)
                    if (typeof loadOrdersPage === 'function') {
                        loadOrdersPage(1, currentOrderStatus);
                    } else {
                        location.reload();
                    }
                }, 2000);
            } else {
                // Show error message
                const errorMsg = result.message || (result.errors ? Object.values(result.errors).flat().join(', ') : 'Failed to submit refund request');
                document.getElementById('refundErrorText').textContent = errorMsg;
                document.getElementById('refundErrorMessage').classList.remove('hidden');
                
                // Re-enable submit button
                submitBtn.disabled = false;
                document.getElementById('refundSubmitText').classList.remove('hidden');
                document.getElementById('refundSubmitLoading').classList.add('hidden');
            }
        } catch (error) {
            console.error('Error submitting refund request:', error);
            document.getElementById('refundErrorText').textContent = 'An error occurred while submitting your refund request. Please try again.';
            document.getElementById('refundErrorMessage').classList.remove('hidden');
            
            // Re-enable submit button
            submitBtn.disabled = false;
            document.getElementById('refundSubmitText').classList.remove('hidden');
            document.getElementById('refundSubmitLoading').classList.add('hidden');
        }
    }

    // Order Filtering
    let currentOrderStatus = 'all';
    
    async function filterOrders(status) {
        currentOrderStatus = status;
        
        // Update active tab
        document.querySelectorAll('.order-filter-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelector(`[data-status="${status}"]`).classList.add('active');
        
        // Load filtered orders
        await loadOrdersPage(1, status);
    }

    // AJAX Pagination for Orders
    async function loadOrdersPage(page, status = null) {
        try {
            // Use current status if not provided
            if (status === null) {
                status = currentOrderStatus;
            }
            
            // Show loading state
            const ordersContainer = document.getElementById('orders-container');
            if (ordersContainer) {
                ordersContainer.style.opacity = '0.5';
                ordersContainer.style.pointerEvents = 'none';
            }

            // Build URL with status filter
            let url = `/api/account/orders?page=${page}`;
            if (status && status !== 'all') {
                url += `&status=${status}`;
            }

            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'include'
            });

            const result = await response.json();

            if (result.success) {
                // Update the orders container with new content
                if (ordersContainer) {
                    ordersContainer.innerHTML = result.html;
                    ordersContainer.style.opacity = '1';
                    ordersContainer.style.pointerEvents = 'auto';
                    
                    // Reinitialize Lucide icons for the new content
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                }
            } else {
                console.error('Failed to load orders:', result.message);
                showNotification('Failed to load orders', 'error');
            }
        } catch (error) {
            console.error('Error loading orders:', error);
            showNotification('An error occurred while loading orders', 'error');
        } finally {
            // Remove loading state
            const ordersContainer = document.getElementById('orders-container');
            if (ordersContainer) {
                ordersContainer.style.opacity = '1';
                ordersContainer.style.pointerEvents = 'auto';
            }
        }
    }

    // Function to open quick view modal for wishlist items
    async function openQuickView(productId, productSlug) {
        if (!productId) {
            console.error('Product ID is required');
            return;
        }

        try {
            // Fetch product data
            const response = await fetch(`/api/products/id/${productId}`);
            if (!response.ok) {
                throw new Error('Failed to fetch product data');
            }
            
            const result = await response.json();
            
            if (!result.success) {
                throw new Error(result.message || 'Failed to fetch product data');
            }
            
            const product = result.data;
            
            // Fill modal with product information
            await fillQuickViewModal(product);
            
            // Show modal
            if (typeof window.showmodalQuickView === 'function') {
                window.showmodalQuickView();
            } else {
                // Fallback method
                const modal = document.getElementById('modalQuickView');
                if (modal) {
                    modal.classList.remove('hidden');
                }
            }
            
            // Re-init icons after modal opens
            setTimeout(() => {
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }, 100);
            
        } catch (error) {
            console.error('Error opening quick view:', error);
            showNotification('Failed to load product details', 'error');
        }
    }
    
    // ── Account Cart Selection Functions ──
    
    // Initialize account cart selection functionality
    function initializeAccountCartSelection() {
        
        // Remove existing event listeners to prevent duplicates
        const itemCheckboxes = document.querySelectorAll('.account-item-checkbox');
        
        itemCheckboxes.forEach((checkbox, index) => {
            // Remove existing event listeners by cloning the element
            const newCheckbox = checkbox.cloneNode(true);
            checkbox.parentNode.replaceChild(newCheckbox, checkbox);
            
            // Add fresh event listener
            newCheckbox.addEventListener('change', function() {
                updateAccountCartSubtotal();
                updateAccountSelectAllButton();
            });
        });
        
        // Add event listener to select all button
        const selectAllBtn = document.getElementById('account-select-all-cart-items');
        if (selectAllBtn) {
            
            // Remove existing event listeners
            const newSelectAllBtn = selectAllBtn.cloneNode(true);
            selectAllBtn.parentNode.replaceChild(newSelectAllBtn, selectAllBtn);
            
            newSelectAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleAccountSelectAll();
            });
        } else {
            console.warn('Account select all button not found');
        }
        
        // Initialize the select all button text based on current state
        updateAccountSelectAllButton();
        updateAccountCartSubtotal();
    }
    
    // Toggle account select all functionality
    function toggleAccountSelectAll() {
        const itemCheckboxes = document.querySelectorAll('.account-item-checkbox');
        const selectAllBtn = document.getElementById('account-select-all-cart-items');
        
        
        if (!itemCheckboxes.length || !selectAllBtn) {
            console.warn('Missing elements for toggleAccountSelectAll');
            return;
        }
        
        // Check if all items are selected
        const allSelected = Array.from(itemCheckboxes).every(checkbox => checkbox.checked);
        
        if (allSelected) {
            // Deselect all
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        } else {
            // Select all
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = true;
            });
        }
        
        // Update UI after toggling
        updateAccountCartSubtotal();
        updateAccountSelectAllButton();
    }
    
    // Update account select all button text based on current selection
    function updateAccountSelectAllButton() {
        const itemCheckboxes = document.querySelectorAll('.account-item-checkbox');
        const selectAllBtn = document.getElementById('account-select-all-cart-items');
        
        
        if (!selectAllBtn || itemCheckboxes.length === 0) {
            console.warn('Missing elements for updateAccountSelectAllButton');
            return;
        }
        
        const selectedCount = Array.from(itemCheckboxes).filter(checkbox => checkbox.checked).length;
        const totalCount = itemCheckboxes.length;
        
        
        if (selectedCount === 0) {
            selectAllBtn.textContent = 'Select All';
        } else if (selectedCount === totalCount) {
            selectAllBtn.textContent = 'Deselect All';
        } else {
            // When some items are selected but not all, show "Select All" to select remaining items
            selectAllBtn.textContent = 'Select All';
        }
    }
    
    // Update account cart subtotal based on selected items
    function updateAccountCartSubtotal() {
        const cartTotalPrice = document.getElementById('cart-total-price');
        const cartTotalQty = document.getElementById('cart-total-qty');
        
        if (!cartTotalPrice) return;
        
        const selectedCheckboxes = document.querySelectorAll('.account-item-checkbox:checked');
        let selectedTotal = 0;
        let selectedQty = 0;
        
        selectedCheckboxes.forEach(checkbox => {
            const itemTotal = parseFloat(checkbox.dataset.itemTotal) || 0;
            selectedTotal += itemTotal;
            selectedQty += 1; // Each checkbox represents one item
        });
        
        if (cartTotalPrice) {
            cartTotalPrice.textContent = `₱${selectedTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }
        
        if (cartTotalQty) {
            cartTotalQty.textContent = selectedQty;
        }
    }

    // Two-Factor Authentication functionality
    let twoFactorEnabled = false;

    // Load 2FA status on page load
    async function loadTwoFactorStatus() {
        try {
            const response = await fetch('/api/account/two-factor/status', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            });

            const data = await response.json();
            
            if (data.success) {
                twoFactorEnabled = data.two_factor_enabled;
                updateTwoFactorUI();
            }
        } catch (error) {
            console.error('Error loading 2FA status:', error);
            document.getElementById('two-factor-status-text').textContent = 'Error loading status';
            document.getElementById('two-factor-toggle').textContent = 'Error';
        }
    }

    // Update the UI based on 2FA status
    function updateTwoFactorUI() {
        const statusText = document.getElementById('two-factor-status-text');
        const toggleButton = document.getElementById('two-factor-toggle');

        if (twoFactorEnabled) {
            statusText.textContent = 'Two-factor authentication is enabled';
            statusText.className = 'text-sm text-green-600';
            toggleButton.textContent = 'Disable';
            toggleButton.className = 'text-red-600 hover:text-red-700 font-medium';
        } else {
            statusText.textContent = 'Two-factor authentication is disabled';
            statusText.className = 'text-sm text-gray-500';
            toggleButton.textContent = 'Enable';
            toggleButton.className = 'text-[#8b7355] hover:text-[#6b5b47] font-medium';
        }
    }

    // Toggle 2FA functionality
    async function toggleTwoFactor() {
        const password = prompt(twoFactorEnabled ? 'Enter your password to disable two-factor authentication:' : 'Enter your password to enable two-factor authentication:');
        
        if (!password) {
            return;
        }

        const toggleButton = document.getElementById('two-factor-toggle');
        const originalText = toggleButton.textContent;
        toggleButton.textContent = 'Processing...';
        toggleButton.disabled = true;

        try {
            const endpoint = twoFactorEnabled ? '/api/account/two-factor/disable' : '/api/account/two-factor/enable';
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ password: password }),
            });

            const data = await response.json();

            if (data.success) {
                twoFactorEnabled = !twoFactorEnabled;
                updateTwoFactorUI();
                alert(data.message);
            } else {
                alert(data.message || 'An error occurred');
            }
        } catch (error) {
            console.error('Error toggling 2FA:', error);
            alert('An error occurred while updating two-factor authentication');
        } finally {
            toggleButton.textContent = originalText;
            toggleButton.disabled = false;
        }
    }

    // Load 2FA status when the page loads
    loadTwoFactorStatus();
</script>
@endpush