@php
    $currentStep = 5;
@endphp
@extends('checkout.layout')

@section('title', 'Order Summary')

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Success Message -->
        <div class="text-center mb-20 animate-fade-in">
            <div class="inline-block p-4 mb-8 bg-[#FAFAFA] border border-gray-50 rounded-full">
                <i data-lucide="check" class="w-8 h-8 text-[#B6965D]"></i>
            </div>
            <h1 class="text-4xl text-[#1A1A1A] mb-4 font-playfair tracking-tight">Acquisition Confirmed</h1>
            <p class="text-sm text-gray-400 font-light tracking-wide uppercase mono">Your selection is being prepared for transit.</p>
        </div>

        <!-- Order Details -->
        <div class="bg-white p-10 border border-gray-100 mb-12">
            <div class="flex items-center justify-between mb-12 pb-6 border-b border-gray-50">
                <h2 class="text-2xl text-[#1A1A1A] font-playfair">Summary of Selection</h2>
                <div class="text-right">
                    <p class="text-[9px] mono tracking-[0.2em] text-gray-300 uppercase mb-2">REFERENCE</p>
                    <p class="text-sm border border-gray-100 px-4 py-1 inline-block mono text-[#1A1A1A]">#{{ $order->order_number }}</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <div>
                    <h3 class="text-[9px] mono tracking-[0.25em] text-[#B6965D] uppercase mb-6 font-medium">DELIVERY DISPATCH</h3>
                    <div class="text-sm text-gray-400 leading-relaxed font-light">
                        <p class="text-[#1A1A1A] mb-3 uppercase tracking-wider text-[10px] font-medium">{{ $order->shipping_address['first_name'] ?? '' }} {{ $order->shipping_address['last_name'] ?? '' }}</p>
                        <p>{{ $order->shipping_address['address_line_1'] ?? '' }}</p>
                        @if($order->shipping_address['address_line_2'] ?? null)
                            <p>{{ $order->shipping_address['address_line_2'] }}</p>
                        @endif
                        <p>{{ $order->shipping_address['city'] ?? '' }}, {{ $order->shipping_address['province'] ?? '' }} {{ $order->shipping_address['zip_code'] ?? '' }}</p>
                        <p>{{ $order->shipping_address['region'] ?? '' }}</p>
                        <p class="mt-4 text-[#1A1A1A] mono text-xs">{{ $order->shipping_address['phone'] ?? '' }}</p>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-[9px] mono tracking-[0.25em] text-[#B6965D] uppercase mb-6 font-medium">LOGISTICS & SETTLEMENT</h3>
                    <div class="text-sm text-gray-400 space-y-4 font-light">
                        <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-[9px] mono uppercase tracking-wider">Method</span>
                            <span class="text-[#1A1A1A] uppercase tracking-widest text-[10px]">{{ $order->payment_method ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-[9px] mono uppercase tracking-wider">Authentication</span>
                            <span>
                                @if($order->payment_status === 'paid')
                                    <span class="text-[#B6965D] tracking-[0.2em] uppercase text-[9px] mono">VERIFIED</span>
                                @elseif($order->payment_status === 'pending')
                                    <span class="text-orange-400 tracking-[0.2em] uppercase text-[9px] mono">AWAITING</span>
                                @else
                                    <span class="text-gray-400 tracking-[0.2em] uppercase text-[9px] mono">{{ strtoupper($order->payment_status) }}</span>
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-[9px] mono uppercase tracking-wider">Delivery Mode</span>
                            <span class="text-[#1A1A1A] uppercase tracking-widest text-[10px]">{{ $order->shipping_method ?? 'White-Glove' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[9px] mono uppercase tracking-wider">Est. Arrival</span>
                            <span class="text-[#1A1A1A] font-medium text-[10px] uppercase tracking-widest">{{ $estimatedDeliveryDate }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Items -->
            <div class="border-t border-gray-50 pt-12 mt-12">
                <h3 class="text-[9px] mono tracking-[0.25em] text-[#B6965D] uppercase mb-8 font-medium">CURATED SELECTION</h3>
                <div class="divide-y divide-gray-50">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center py-8 gap-8">
                        <div class="w-20 h-24 bg-gray-50 flex items-center justify-center flex-shrink-0 overflow-hidden border border-gray-100">
                            @if($item->product && $item->product->images)
                                @php
                                    $images = is_string($item->product->images) ? json_decode($item->product->images, true) : $item->product->images;
                                    $firstImage = is_array($images) && count($images) > 0 ? $images[0] : null;
                                @endphp
                                @if($firstImage)
                                    <img src="{{ storage_url($firstImage) }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
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
            
            <!-- Order Summary totals -->
            <div class="border-t border-gray-50 pt-10 mt-4">
                <div class="flex justify-end">
                    <div class="w-full max-w-sm">
                        <div class="space-y-4 font-light text-sm text-gray-400">
                            <div class="flex justify-between items-center text-[11px] mono uppercase tracking-wider">
                                <span>Subtotal</span>
                                <span class="text-[#1A1A1A]">€{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-[11px] mono uppercase tracking-wider">
                                <span>Shipping</span>
                                <span>
                                    @if($order->shipping_cost == 0)
                                        <span class="text-[#B6965D] uppercase tracking-widest">Complimentary</span>
                                    @else
                                        <span class="text-[#1A1A1A]">€{{ number_format($order->shipping_cost, 2) }}</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between items-center border-t border-gray-50 pt-4 mt-2 text-[11px] mono uppercase tracking-wider">
                                <span>Tax Incl. (12%)</span>
                                <span class="text-[#1A1A1A]">€{{ number_format($order->tax_amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-end pt-2">
                                <span class="text-[11px] text-[#1A1A1A] uppercase tracking-[0.3em] font-medium">TOTAL</span>
                                <span class="text-2xl text-[#1A1A1A] font-playfair font-normal">€{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Order Status Timeline -->
        <div class="bg-white p-10 border border-gray-100 mb-12 mt-16">
            <h3 class="text-[9px] mono tracking-[0.25em] text-gray-300 uppercase mb-12 text-center">CURRENT TRAJECTORY</h3>
            <div class="max-w-2xl mx-auto flex items-center justify-between relative px-4">
                <div class="absolute left-10 right-10 top-1/2 -translate-y-1/2 h-px bg-gray-50 z-0"></div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="flex items-center justify-center w-6 h-6 rounded-full bg-[#1A1A1A] text-white">
                        <i data-lucide="check" class="w-2 h-2"></i>
                    </div>
                    <span class="mt-4 text-[8px] mono tracking-[0.2em] uppercase text-[#1A1A1A]">Confirmed</span>
                </div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="flex items-center justify-center w-6 h-6 rounded-full {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-gray-100 text-gray-200' }}">
                        @if(in_array($order->status, ['processing', 'shipped', 'delivered']))
                             <i data-lucide="check" class="w-2 h-2"></i>
                        @else
                            <div class="w-1 h-1 bg-gray-100 rounded-full"></div>
                        @endif
                    </div>
                    <span class="mt-4 text-[8px] mono tracking-[0.2em] uppercase {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Atelier</span>
                </div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="flex items-center justify-center w-6 h-6 rounded-full {{ in_array($order->status, ['shipped', 'delivered']) ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-gray-100 text-gray-200' }}">
                        @if(in_array($order->status, ['shipped', 'delivered']))
                             <i data-lucide="check" class="w-2 h-2"></i>
                        @else
                            <div class="w-1 h-1 bg-gray-100 rounded-full"></div>
                        @endif
                    </div>
                    <span class="mt-4 text-[8px] mono tracking-[0.2em] uppercase {{ in_array($order->status, ['shipped', 'delivered']) ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Transit</span>
                </div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="flex items-center justify-center w-6 h-6 rounded-full {{ $order->status === 'delivered' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-gray-100 text-gray-200' }}">
                        @if($order->status === 'delivered')
                             <i data-lucide="check" class="w-2 h-2"></i>
                        @else
                            <div class="w-1 h-1 bg-gray-100 rounded-full"></div>
                        @endif
                    </div>
                    <span class="mt-4 text-[8px] mono tracking-[0.2em] uppercase {{ $order->status === 'delivered' ? 'text-[#1A1A1A]' : 'text-gray-300' }}">Arrival</span>
                </div>
            </div>
        </div>

        <!-- Next Steps block removed for cleaner aesthetic, integrated minimally below if needed -->

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center mt-20 mb-12 border-t border-gray-50 pt-16">
            <a href="{{ route('catalogue') }}" 
               class="btn-gold w-full sm:w-auto text-center order-1 sm:order-2">
                CONTINUE EXPLORATION
            </a>
            <a href="{{ route('account.receipt', $order->order_number) }}" 
               class="px-10 py-4 text-[10px] mono tracking-[0.3em] uppercase transition-all duration-300 border border-gray-100 text-gray-400 hover:text-[#1A1A1A] hover:border-[#1A1A1A] text-center w-full sm:w-auto order-3 sm:order-1">
                VIEW RECEIPT
            </a>
            <a href="{{ route('account') }}" 
               class="px-10 py-4 text-[10px] mono tracking-[0.3em] uppercase transition-all duration-300 border border-gray-100 text-gray-400 hover:text-[#1A1A1A] hover:border-[#1A1A1A] text-center w-full sm:w-auto order-2 sm:order-3">
                MY ATELIER
            </a>
        </div>
    </div>
@endsection

