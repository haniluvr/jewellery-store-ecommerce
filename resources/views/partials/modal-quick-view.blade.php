<!-- Editorial Quick View Modal -->
<style>
#image-thumbnails::-webkit-scrollbar {
    display: none;
}
.quick-view-btn-hover:hover {
    letter-spacing: 0.1em;
}
</style>
<div class="modal fixed inset-0 bg-black/60 backdrop-blur-md flex items-center justify-center z-50 hidden" id="modalQuickView">
  <div class="modal-content bg-white max-w-5xl w-full max-h-[80vh] mx-4 overflow-hidden transform transition-all duration-500 ease-out border border-stone-100 shadow-[0_30px_100px_rgba(0,0,0,0.4)] flex flex-col md:flex-row my-auto">
    
    <!-- Left Column: Visuals (Editorial style, larger) -->
    <div class="w-full md:w-[55%] bg-stone-50/50 flex flex-col items-center justify-center p-8 md:p-12 border-r border-stone-100 relative">
        <div class="relative w-full aspect-square flex items-center justify-center bg-white shadow-sm ring-1 ring-black/5 overflow-hidden group">
            <img src="" alt="Product Image" class="w-full h-full object-contain p-8 transition-transform duration-700 group-hover:scale-105" id="quick-view-image">
            
            <!-- Corner Decoration -->
            <div class="absolute top-0 left-0 w-8 h-8 border-t border-l border-stone-200"></div>
            <div class="absolute bottom-0 right-0 w-8 h-8 border-b border-r border-stone-200"></div>
        </div>

        <!-- Image Thumbnails (Refined) -->
        <div class="mt-6 relative w-full overflow-hidden" id="thumbnail-container">
            <div class="flex justify-center flex-wrap gap-3" id="image-thumbnails">
                <!-- Thumbnails will be dynamically generated -->
            </div>
        </div>
    </div>

    <!-- Right Column: Details (Clean Typography) -->
    <div class="w-full md:w-[45%] p-10 md:p-12 flex flex-col relative overflow-y-auto">
        <!-- Close Button (Top Right of Content Column) -->
        <button type="button" class="absolute top-6 right-6 text-stone-400 hover:text-black z-30 transition-colors uppercase text-[10px] tracking-widest font-azeret flex items-center gap-2" id="close-modalQuickView-modal">
            <span>Close</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Product Identity -->
        <div class="mb-8 mt-4">
            <span class="text-[9px] tracking-[0.4em] uppercase text-stone-400 font-bold mb-3 block" id="quick-view-category">Jewellery Box Collection</span>
            <h2 class="text-2xl md:text-3xl font-playfair leading-[1.2] text-stone-900 mb-5" id="quickViewLabel">Eclore Jewelry Case</h2>
            <div class="w-10 h-[1px] bg-stone-300"></div>
        </div>

        <!-- Price and Rating -->
        <div class="flex items-center gap-4 mb-8">
            <div class="text-xl font-playfair italic text-stone-700" id="quick-view-price">₱0,000</div>
            <div class="h-3 w-[1px] bg-stone-200"></div>
            <div class="flex items-center gap-1.5" id="star-rating-container">
                <!-- Rating stars -->
            </div>
            <span class="text-[10px] font-azeret text-stone-400 mt-0.5" id="quick-view-rating">0.0</span>
        </div>

        <!-- Description (Editorial line-height) -->
        <div class="mb-10">
            <p class="text-xs text-stone-500 leading-relaxed font-azeret opacity-80" id="quick-view-desc">
                A bespoke piece from the Éclore archives, curated for the modern collector.
            </p>
        </div>

        <!-- Configuration -->
        <div class="space-y-8 mt-auto">
            <!-- Quantity (Minimalist) -->
            <div class="flex items-center justify-between border-b border-stone-100 pb-3">
                <span class="text-[9px] tracking-[0.3em] uppercase text-stone-500 font-bold">Quantity</span>
                <div class="flex items-center gap-4">
                    <button class="text-stone-300 hover:text-stone-900 transition-colors" id="decrease-qty">
                        <i data-lucide="minus" class="w-3 h-3"></i>
                    </button>
                    <input type="number" class="w-8 text-center text-xs font-azeret border-0 focus:ring-0 p-0" value="1" min="1" id="quantity-input">
                    <button class="text-stone-300 hover:text-stone-900 transition-colors" id="increase-qty">
                        <i data-lucide="plus" class="w-3 h-3"></i>
                    </button>
                </div>
            </div>

            <!-- Actions (Beside each other) -->
            <div class="grid grid-cols-2 gap-3 pt-2">
                <button class="btn-add-to-cart bg-stone-900 border border-transparent text-white uppercase font-bold hover:bg-stone-800 transition-all duration-300 quick-view-btn-hover flex items-center justify-center" id="modalAddToCart" data-product-id="" style="height: 44px !important; font-size: 11px !important; letter-spacing: 0.15em !important; border-radius: 0px !important;">
                    <span>Add to bag</span>
                </button>
                <button class="bg-white border border-stone-200 text-stone-500 uppercase font-bold hover:text-stone-900 hover:border-stone-900 transition-all duration-300 flex items-center justify-center gap-2 group quick-view-btn-hover" id="modalWishlistBtn" data-product-id="" style="height: 44px !important; font-size: 11px !important; letter-spacing: 0.15em !important; border-radius: 0px !important;">
                    <i data-lucide="heart" class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" id="modal-heart-icon" style="color: #666;"></i>
                    <span id="modal-wishlist-text">Wishlist</span>
                </button>
            </div>
        </div>
        
        <!-- Link to Product Page -->
        <div class="mt-10 pt-6 border-t border-stone-50 text-center">
            <a href="#" id="quick-view-product-link" class="text-[8px] tracking-[0.4em] uppercase text-stone-300 hover:text-stone-900 transition-colors font-bold">
                View Entire Details
            </a>
        </div>
    </div>
  </div>
</div>

