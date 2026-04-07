@php
    $categories = \Illuminate\Support\Facades\Cache::remember('navbar_categories', 86400, function () {
        return \App\Models\Category::whereNull('parent_id')
            ->where('is_active', true)
            ->with('subcategories')
            ->orderBy('sort_order', 'asc')
            ->get();
    });
@endphp

<header class="navbar fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100 transition-all duration-300">
    <style>
        .navbar-icon-btn {
            background-color: transparent !important;
            transition: all 0.3s ease !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        .navbar-icon-btn:hover {
            background-color: transparent !important;
            color: #B6965D !important;
        }
        .navbar-icon-btn:hover i, .navbar-icon-btn:hover svg {
            color: #B6965D !important;
        }
    </style>
    <!-- Top Header -->
    <div class="px-4 md:px-8 h-16 flex items-center justify-between bg-white">
        
        <!-- Left: Search and Mobile Toggle -->
        <div class="flex items-center space-x-6 flex-1">
            <button class="md:hidden flex-shrink-0 navbar-icon-btn text-gray-900" id="mobile-menu-button" type="button">
                <span class="block w-6 h-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
            <div class="hidden md:flex items-center bg-transparent group overflow-visible relative">
                <button class="navbar-icon-btn z-20 p-2 text-gray-900" id="toggleSearch" type="button">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </button>
                <div id="searchContainer" class="w-0 opacity-0 transition-all duration-500 ease-in-out flex items-center relative">
                    <input type="text" id="navbarSearch" placeholder="Search by product..." class="bg-transparent border-b border-black outline-none py-1 px-4 text-[10px] uppercase tracking-widest font-azeret w-80 placeholder:text-gray-400">
                    <button id="closeSearch" class="ml-2 navbar-icon-btn text-gray-900">
                        <i data-lucide="x" class="w-3 h-3"></i>
                    </button>
                    <!-- Inline Search Results Dropdown -->
                    <div id="navbarSearchResults" class="hidden absolute top-full left-0 mt-2 w-96 bg-white/95 backdrop-blur-md shadow-xl border border-gray-100 z-50 max-h-80 overflow-y-auto">
                        <div id="navbarSearchContent"></div>
                    </div>
                </div>
            </div>
            <button class="navbar-icon-btn md:hidden text-gray-900 p-2" id="openSearchModalMobile" type="button">
                <i data-lucide="search" class="w-5 h-5"></i>
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggle = document.getElementById('toggleSearch');
                const container = document.getElementById('searchContainer');
                const input = document.getElementById('navbarSearch');
                const close = document.getElementById('closeSearch');
                const resultsContainer = document.getElementById('navbarSearchResults');
                const content = document.getElementById('navbarSearchContent');

                let searchTimeout;

                toggle.addEventListener('click', () => {
                    container.classList.toggle('w-0');
                    container.classList.toggle('opacity-0');
                    container.classList.toggle('w-96');
                    container.classList.toggle('opacity-100');
                    if (container.classList.contains('w-96')) {
                        setTimeout(() => input.focus(), 300);
                    } else {
                        hideResults();
                    }
                });

                close.addEventListener('click', () => {
                    container.classList.add('w-0', 'opacity-0');
                    container.classList.remove('w-96', 'opacity-100');
                    hideResults();
                });

                input.addEventListener('input', (e) => {
                    const query = e.target.value.trim();
                    
                    if (searchTimeout) clearTimeout(searchTimeout);

                    if (query.length < 2) {
                        hideResults();
                        return;
                    }

                    searchTimeout = setTimeout(() => {
                        performSearch(query);
                    }, 300);
                });

                async function performSearch(query) {
                    if (!window.api) return;

                    content.innerHTML = '<div class="p-4 text-center text-[10px] tracking-widest text-gray-500 uppercase">Searching...</div>';
                    resultsContainer.classList.remove('hidden');

                    try {
                        const response = await window.api.searchProducts(query);
                        if (response.success && response.data && response.data.length > 0) {
                            renderResults(response.data);
                        } else {
                            content.innerHTML = '<div class="p-4 text-center text-[10px] tracking-widest text-gray-500 uppercase">No results found</div>';
                        }
                    } catch (error) {
                        console.error('Search error:', error);
                        content.innerHTML = '<div class="p-4 text-center text-[10px] tracking-widest text-red-500 uppercase">Error searching</div>';
                    }
                }

                function renderResults(products) {
                    let html = '';
                    products.forEach(product => {
                        const productUrl = `/products/${product.slug}`;
                        const image = (product.images && product.images.length > 0 ? product.images[0] : product.image) || 'frontend/assets/necklace.webp';
                        
                        html += `
                            <a href="${productUrl}" class="flex items-center p-3 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0 group">
                                <div class="w-10 h-10 flex-shrink-0 bg-gray-50 overflow-hidden">
                                    <img src="${(function(path) {
                                        if (!path) return '';
                                        if (window.getStorageUrl) return window.getStorageUrl(path);
                                        if (path.startsWith('http') || path.startsWith('//') || path.startsWith('data:')) return path;
                                        if (path.startsWith('frontend/') || path.startsWith('assets/')) return '/' + path;
                                        return '/storage/' + (path.startsWith('/') ? path.substring(1) : path);
                                    })(image)}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="${product.name}">
                                </div>
                                <div class="ml-3 overflow-hidden">
                                    <p class="text-[10px] font-medium text-gray-900 uppercase tracking-widest truncate">${product.name}</p>
                                    <p class="text-[9px] text-[#B6965D] uppercase tracking-widest mt-1">₱${Math.floor(product.price).toLocaleString()}</p>
                                </div>
                            </a>
                        `;
                    });
                    content.innerHTML = html;
                }

                function hideResults() {
                    resultsContainer.classList.add('hidden');
                    content.innerHTML = '';
                }

                // Close on click outside
                document.addEventListener('click', (e) => {
                    if (!container.contains(e.target) && !toggle.contains(e.target)) {
                        hideResults();
                        if (container.classList.contains('w-96') && input.value === '') {
                            container.classList.add('w-0', 'opacity-0');
                            container.classList.remove('w-96', 'opacity-100');
                        }
                    }
                });

                // Close on Escape
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        hideResults();
                        container.classList.add('w-0', 'opacity-0');
                        container.classList.remove('w-96', 'opacity-100');
                    }
                });
            });
        </script>

        <!-- Center: Logo -->
        <div class="flex-shrink-0 flex justify-center flex-1">
            <a href="{{ route('home') }}" class="font-playfair text-2xl md:text-3xl tracking-[0.2em] text-gray-900 uppercase font-light">
                Éclore
            </a>
        </div>

        <!-- Right: Actions -->
        <div class="flex items-center justify-end space-x-2 md:space-x-4 flex-1 text-gray-900">
            <div class="relative dropdown">
                <button class="navbar-icon-btn flex items-center p-2 rounded-none" id="account-dropdown" type="button">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </button>
                <ul class="dropdown-menu absolute right-0 top-full mt-2 w-56 bg-white border border-gray-100 rounded-none shadow-xl text-sm hidden" id="account-menu" style="display: none; z-index: 9999; overflow: visible;">
                    @guest
                        <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-50 font-medium" href="#" id="open-login-modal">Sign In</a></li>
                        <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-50" href="#" id="open-signup-modal">Create Account</a></li>
                    @else
                        <li class="px-4 py-3 border-b border-gray-50">
                            <p class="text-[10px] tracking-[0.2em] text-gray-400 uppercase mb-1">Authenticated as</p>
                            <a href="{{ route('account') }}" class="font-playfair text-base text-gray-900 hover:text-[#B6965D] transition-colors">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-colors" href="#">
                                <i data-lucide="package" class="w-4 h-4 inline-block mr-2 opacity-50"></i> My Orders
                            </a>
                        </li>
                        <li>
                            <a class="block px-4 py-2.5 text-gray-700 hover:bg-gray-50 transition-colors" href="#">
                                <i data-lucide="settings" class="w-4 h-4 inline-block mr-2 opacity-50"></i> Settings
                            </a>
                        </li>
                        <li class="border-t border-gray-50 mt-1">
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <button type="submit" class="w-[100%] text-left px-4 py-3 text-red-500 hover:bg-red-50 transition-colors flex items-center justify-center">
                                    <i data-lucide="log-out" class="w-4 h-4 mr-2"></i> 
                                    <span class="text-[10px] tracking-[0.2em] font-bold">LOGOUT</span>
                                </button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>

            @auth
            <div class="relative">
                <button class="navbar-icon-btn p-2 rounded-none" id="openNotificationOffcanvas" type="button">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute -top-1 -right-1 bg-[#B6965D] text-white text-[9px] font-bold w-4 h-4 flex items-center justify-center rounded-full hidden" id="notification-count"></span>
                </button>
            </div>
            @endauth

            <div class="relative">
                <button class="navbar-icon-btn p-2 rounded-none" id="openOffcanvas" type="button">
                    <i data-lucide="heart" class="w-5 h-5"></i>
                    <span class="absolute -top-1 -right-1 bg-[#B6965D] text-white text-[9px] font-bold w-4 h-4 flex items-center justify-center rounded-full hidden" id="wishlist-count"></span>
                </button>
            </div>

            <div class="relative">
                <button class="navbar-icon-btn p-2 rounded-none flex items-center" id="openCartOffcanvas" type="button">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    <span class="absolute -top-1 -right-1 bg-[#B6965D] text-white text-[9px] font-bold w-4 h-4 flex items-center justify-center rounded-full hidden" id="cart-count"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Nav (Links) -->
    <div class="hidden md:flex justify-center bg-white border-t border-gray-100">
        <ul class="flex items-center space-x-12 py-3 text-[12px] tracking-[0.2em] text-gray-900 font-light uppercase">
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('catalogue') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    Jewellery
                </a>
            </li>
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('collections') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    Collections
                </a>
            </li>
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('about') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    About Éclore
                </a>
            </li>
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('boutiques') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    Boutiques & Appointments
                </a>
            </li>
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('newsroom') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    Newsroom
                </a>
            </li>
            <li class="flex items-center">
                <span class="text-lg mr-12 text-[#B6965D]">●</span>
                <a href="{{ route('vip-club') }}" class="hover:text-[#B6965D] transition-colors block py-2">
                    VIP Club
                </a>
            </li>
            <!-- Final closing dot to match reference -->
            <li class="flex items-center">
                <span class="text-lg text-[#B6965D]">●</span>
            </li>
        </ul>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="md:hidden hidden bg-white border-t border-gray-100" id="mobile-menu">
        <div class="px-6 py-8 space-y-6">
            <a href="{{ route('catalogue') }}" class="block text-lg font-light text-gray-900 uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                Catalogue
            </a>
            <a href="{{ route('collections') }}" class="block text-lg font-light text-gray-900 uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                Collections
            </a>
            <a href="{{ route('about') }}" class="block text-lg font-light text-gray-900 uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                About Éclore
            </a>
            <a href="{{ route('boutiques') }}" class="block text-lg font-light text-gray-900 uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                Boutiques & Appointments
            </a>
            <a href="{{ route('newsroom') }}" class="block text-lg font-light text-gray-900 uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                Newsroom
            </a>
            <a href="{{ route('vip-club') }}" class="block text-lg font-medium text-[#B6965D] uppercase tracking-[0.2em] border-b border-gray-50 pb-2">
                VIP Club
            </a>
        </div>
    </div>
</header>
