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
            <form action="#" method="POST" class="relative">
                <div class="flex items-center border-b border-gray-900 pb-2">
                    <input type="email" placeholder="EMAIL ADDRESS" class="bg-transparent w-full text-[10px] tracking-[0.2em] font-azeret focus:outline-none placeholder:text-gray-400 uppercase">
                    <button type="submit" class="bg-black text-white px-6 py-2 text-[10px] tracking-[0.2em] uppercase font-bold flex items-center gap-3">
                        <span class="text-xs">●</span> SUBSCRIBE
                    </button>
                </div>
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
                    <li><a href="#" class="hover:text-gray-900 transition-colors">FIND A BOUTIQUE</a></li>
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
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-gray-900 hover:text-gray-900 transition-all">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
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
