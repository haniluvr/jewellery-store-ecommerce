@extends('layouts.app')

@section('title', 'Track Your Order — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        background: #fbfbfb;
        padding: 12rem 0 8rem 0;
        border-bottom: 1px solid #eee;
    }
    .track-section {
        padding: 8rem 0;
    }
    .track-form-container {
        max-width: 600px;
        margin: auto;
        padding: 4rem;
        border: 1px solid #f9f9f9;
        background: #fff;
    }
    .track-input {
        width: 100%;
        border-bottom: 2px solid #eee;
        padding: 1.5rem 0;
        margin-bottom: 3rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.2rem;
        text-transform: uppercase;
        outline: none;
        transition: border-color 0.3s ease;
    }
    .track-input:focus {
        border-color: #C5B391;
    }
    .track-label {
        font-family: 'Azeret Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.4rem;
        color: #999;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero text-center px-6">
        <nav class="mb-12" data-aos="fade-down">
            <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Client Services — Tracking</span>
        </nav>
        <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Acquisition Status</h1>
        <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
            Trace the journey of your Éclore piece from our atelier to your doorstep.
        </p>
    </header>

    <section class="track-section bg-white px-6">
        <div class="container mx-auto">
            <div class="track-form-container" data-aos="fade-up">
                @if($errors->any())
                    <div class="mb-8 p-6 bg-red-50 border border-red-100 text-red-800 font-azeret text-[10px] tracking-widest uppercase text-center leading-loose">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('track-order.search') }}" method="POST">
                    @csrf
                    <div class="mb-12">
                        <label class="track-label block mb-2">Order Identification</label>
                        <input type="text" name="order_number" placeholder="ECO-XXXXX" class="track-input" value="{{ old('order_number') }}" required>
                    </div>
                    <div class="mb-12">
                        <label class="track-label block mb-2">Acquisition Email</label>
                        <input type="email" name="email" placeholder="YOUR@EMAIL.COM" class="track-input" value="{{ old('email') }}" required>
                    </div>
                    <button type="submit" class="w-full bg-black text-white px-12 py-5 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#C5B391] transition-all">
                        LOCATE ACQUISITION
                    </button>
                </form>
            </div>

            @if(isset($order))
                <div class="mt-24 border-t border-gray-100 pt-24" data-aos="fade-up">
                    <h2 class="font-playfair text-4xl mb-16 text-center">Acquisition Journey</h2>
                    <div class="max-w-4xl mx-auto">
                        <!-- Tracking Progress -->
                        <div class="flex flex-col md:flex-row justify-between mb-24 gap-12 text-center">
                            @php
                                $steps = [
                                    'pending' => 'Acquisition Received',
                                    'processing' => 'Artisan Workshop',
                                    'shipped' => 'In Transit',
                                    'delivered' => 'Delivered'
                                ];
                                $statuses = array_keys($steps);
                                $currentIndex = array_search($order->status, $statuses);
                            @endphp
                            @foreach($steps as $status => $label)
                                @php
                                    $stepIndex = array_search($status, $statuses);
                                    $isCompleted = $stepIndex <= $currentIndex;
                                    $isCurrent = $stepIndex === $currentIndex;
                                @endphp
                                <div class="flex flex-col items-center flex-1">
                                    <div class="w-3 h-3 rounded-full {{ $isCompleted ? 'bg-[#C5B391]' : 'bg-gray-100' }} mb-6 relative">
                                        @if($isCurrent)
                                            <div class="absolute inset-0 bg-[#C5B391] rounded-full animate-ping opacity-25"></div>
                                        @endif
                                    </div>
                                    <span class="font-azeret text-[9px] tracking-[0.3em] uppercase {{ $isCurrent ? 'text-black font-bold' : 'text-gray-400' }}">{{ $label }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Order Details Box -->
                        <div class="bg-[#fbfbfb] p-16 border border-gray-100 shadow-sm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                                <div>
                                    <h3 class="font-playfair text-2xl mb-8 italic">Manifest</h3>
                                    <p class="font-azeret text-[10px] tracking-[0.2em] text-gray-500 uppercase leading-loose">
                                        <span class="text-gray-300">Identifier:</span> {{ $order->order_number }}<br>
                                        <span class="text-gray-300">Acquired:</span> {{ $order->created_at->format('d M Y') }}<br>
                                        <span class="text-gray-300">Status:</span> <span class="text-black font-bold">{{ strtoupper($order->status) }}</span>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="font-playfair text-2xl mb-8 italic">Delivery</h3>
                                    <p class="font-azeret text-[10px] tracking-[0.2em] text-gray-500 uppercase leading-loose">
                                        <span class="text-gray-300">Courier:</span> {{ $order->carrier ?? 'PROCESSING' }}<br>
                                        <span class="text-gray-300">Tracking:</span> {{ $order->tracking_number ?? 'NOT ASSIGNED' }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="mt-16 pt-16 border-t border-gray-100">
                                <h3 class="font-playfair text-2xl mb-8 italic">Shipment Composition</h3>
                                <div class="space-y-6">
                                    @foreach($order->orderItems as $item)
                                        <div class="flex justify-between items-center text-[10px] font-azeret tracking-widest uppercase">
                                            <span class="text-gray-600">{{ $item->product_name }} x{{ $item->quantity }}</span>
                                            <span class="text-gray-400">₱{{ number_format($item->total_price, 2) }}</span>
                                        </div>
                                    @endforeach
                                    <div class="flex justify-between items-center text-[11px] font-azeret tracking-widest uppercase border-t border-gray-50 pt-6 mt-6">
                                        <span class="text-black font-bold">Total Acquisition Value</span>
                                        <span class="text-black font-bold">₱{{ number_format($order->total_amount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-center mt-20" data-aos="fade-up">
                <p class="font-azeret text-[10px] tracking-widest text-gray-400 uppercase leading-loose">
                    Need assistance with tracking? Our concierge is available at hello@eclorejewellery.shop.
                </p>
            </div>
        </div>
    </section>
</main>
@endsection
