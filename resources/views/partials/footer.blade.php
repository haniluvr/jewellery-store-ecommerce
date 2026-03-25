<!-- footer -->
<footer class="relative bg-[#fcfcfc] pt-20 pb-10 overflow-hidden" id="footer">
    <!-- Background Watermark -->
    <div class="absolute bottom-0 w-full pl-40 text-left pointer-events-none z-0 opacity-[0.03] select-none">
        <h2 class="font-playfair text-[20vw] leading-none tracking-tight">Éclore</h2>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Brand Partners Bar -->
        <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-6 mb-20">
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
        </div>

        <!-- Newsletter Subscription -->
        <div class="max-w-xl mx-auto mb-32">
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="relative">
                @csrf
                <div class="flex items-center border-b border-gray-900 pb-2">
                    <input type="email" name="email" placeholder="EMAIL ADDRESS" class="bg-transparent w-full text-[10px] tracking-[0.2em] font-azeret focus:outline-none placeholder:text-gray-400 uppercase" required>
                    <button type="submit" class="bg-black text-white px-6 py-2 text-[10px] tracking-[0.2em] uppercase font-bold flex items-center gap-3">
                        <span class="text-xs">●</span> SUBSCRIBE
                    </button>
                </div>
                @if(session('success'))
                    <p class="absolute -bottom-6 left-0 text-[8px] tracking-widest text-[#C5B391] uppercase">{{ session('success') }}</p>
                @endif
            </form>
        </div>

        <!-- Footer Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
            <!-- Customer -->
            <div>
                <h3 class="font-playfair text-2xl mb-8 text-gray-900">Customer</h3>
                <ul class="space-y-4 text-[10px] tracking-[0.2em] font-azeret text-gray-600 uppercase">
                    <li><a href="{{ route('contact') }}" class="hover:text-gray-900 transition-colors">CONTACT US</a></li>
                    <li><a href="{{ route('track-order') }}" class="hover:text-gray-900 transition-colors">TRACK YOUR ORDER</a></li>
                    <li><a href="{{ route('orders-payments') }}" class="hover:text-gray-900 transition-colors">ORDERS & PAYMENT</a></li>
                    <li><a href="{{ route('accessibility') }}" class="hover:text-gray-900 transition-colors">ACCESSIBILITY</a></li>
                    <li><a href="{{ route('help') }}" class="hover:text-gray-900 transition-colors">HELP</a></li>
                </ul>
            </div>

            <!-- Our Company -->
            <div>
                <h3 class="font-playfair text-2xl mb-8 text-gray-900">Our Company</h3>
                <ul class="space-y-4 text-[10px] tracking-[0.2em] font-azeret text-gray-600 uppercase">
                    <li><a href="{{ route('boutiques') }}" class="hover:text-gray-900 transition-colors">FIND A BOUTIQUE</a></li>
                    <li><a href="{{ route('vip-club') }}" class="hover:text-gray-900 transition-colors">VIP CLUB</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-gray-900 transition-colors">ABOUT ÉCLORE</a></li>
                    <li><a href="{{ route('corporate-responsibility') }}" class="hover:text-gray-900 transition-colors">CORPORATE RESPONSIBILITY</a></li>
                </ul>
            </div>

            <!-- Legal and Privacy -->
            <div>
                <h3 class="font-playfair text-2xl mb-8 text-gray-900">Legal And Privacy</h3>
                <ul class="space-y-4 text-[10px] tracking-[0.2em] font-azeret text-gray-600 uppercase">
                    <li><a href="{{ route('terms-of-service') }}" class="hover:text-gray-900 transition-colors">TERMS OF SERVICE</a></li>
                    <li><a href="{{ route('conditions-of-sale') }}" class="hover:text-gray-900 transition-colors">CONDITIONS OF SALE</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-gray-900 transition-colors">PRIVACY POLICY</a></li>
                    <li><a href="{{ route('cookie-policy') }}" class="hover:text-gray-900 transition-colors">COOKIE POLICY</a></li>
                    <li><a href="{{ route('cookie-center') }}" class="hover:text-gray-900 transition-colors">COOKIE CENTER</a></li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div>
                <h3 class="font-playfair text-2xl mb-8 text-gray-900">Follow Us</h3>
                <div class="flex gap-4">
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.344 3.608 1.32.975.975 1.258 2.242 1.32 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.344 2.633-1.32 3.608-.975.975-2.242 1.258-3.608 1.32-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.344-3.608-1.32-.975-.975-1.258-2.242-1.32-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.344-2.633 1.32-3.608.975-.975 2.242-1.258 3.608-1.32 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.547.054-3.411.156-5.32 2.063-5.476 5.476-.04 0-.054.408-.054 4.547s.014 3.667.054 4.547c.156 3.411 2.063 5.32 5.476 5.476.88.04 1.288.054 4.547.054s3.667-.014 4.547-.054c3.411-.156 5.32-2.063 5.476-5.476.04-.88.054-1.288.054-4.547s-.014-3.667-.054-4.547c-.156-3.411-2.063-5.32-5.476-5.476-.88-.04-1.288-.054-4.547-.054zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 text-[9px] tracking-[0.2em] font-azeret text-gray-400 uppercase">
            <p>© 2026 ÉCLORE. ALL RIGHTS RESERVED.</p>
            <div class="flex gap-8">
                <span>ETHICALLY SOURCED</span>
                <span>RJC CERTIFIED</span>
            </div>
        </div>
    </div>
</footer>
