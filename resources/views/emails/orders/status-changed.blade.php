@extends('emails.layouts.branded')

@section('content')
<h1>Order Status Update</h1>

<p>Hello {{ ($order->user->first_name ?? '') . ' ' . ($order->user->last_name ?? '') ?: $order->user->email }},</p>

<p>Your order status has been updated. Here are the details:</p>

<div class="info-box">
    <h2>Client Order Information</h2>
    <p><strong>Order Reference:</strong> #{{ $order->order_number }}</p>
    <p><strong>Previous Status:</strong> <span style="font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">{{ ucfirst($oldStatus ?? 'Unknown') }}</span></p>
    <p><strong>New Status:</strong> 
        @if($newStatus === 'shipped')
            <span style="color: #1A1A1A; font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">Shipped</span>
        @elseif($newStatus === 'delivered')
            <span style="color: #1A1A1A; font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">Delivered</span>
        @elseif($newStatus === 'cancelled')
            <span style="color: #ef4444; font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">Cancelled</span>
        @elseif($newStatus === 'processing')
            <span style="color: #1A1A1A; font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">Processing</span>
        @else
            <span style="font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">{{ ucfirst($newStatus) }}</span>
        @endif
    </p>
    <p><strong>Updated:</strong> {{ now()->format('M d, Y \a\t g:i A') }}</p>
</div>

@if($newStatus === 'shipped')
    <div class="info-box">
        <h2>Secure Courier Dispatch</h2>
        <p>Your exquisite acquisition has been secured and dispatched.</p>
        @if($order->tracking_number ?? false)
            <p><strong>Tracking Number:</strong> <span style="font-family: 'Azeret Mono', monospace;">{{ $order->tracking_number }}</span></p>
        @endif
        @if($order->estimated_delivery ?? false)
            <p><strong>Estimated Arrival:</strong> {{ \Carbon\Carbon::parse($order->estimated_delivery)->format('M d, Y') }}</p>
        @endif
    </div>
@elseif($newStatus === 'delivered')
    <div class="info-box">
        <h2>Delivery Complete</h2>
        <p>Your beautiful piece has been delivered successfully.</p>
        @if($order->delivered_at ?? false)
            <p><strong>Delivered on:</strong> {{ \Carbon\Carbon::parse($order->delivered_at)->format('M d, Y \a\t g:i A') }}</p>
        @endif
    </div>
@elseif($newStatus === 'cancelled')
    <div class="info-box">
        <h2>Order Cancelled</h2>
        <p>Your order has been updated to Cancelled.</p>
        @if($order->cancellation_reason ?? false)
            <p><strong>Reason:</strong> {{ $order->cancellation_reason }}</p>
        @endif
        <p>If you require further assistance regarding this matter, please contact our concierge services.</p>
    </div>
@elseif($newStatus === 'processing')
    <div class="info-box">
        <h2>Atelier Processing</h2>
        <p>Your piece is currently being prepared by our specialists.</p>
        <p>You will receive further correspondence once dispatched.</p>
    </div>
@endif

<h2>Order Timeline</h2>
<div class="info-box">
    <p><strong>Order Placed:</strong> {{ $order->created_at->format('M d, Y \a\t g:i A') }}</p>
    @if($order->status === 'processing' || $order->status === 'shipped' || $order->status === 'delivered')
        <p><strong>Processing Started:</strong> {{ $order->updated_at->format('M d, Y \a\t g:i A') }}</p>
    @endif
    @if($order->status === 'shipped' || $order->status === 'delivered')
        <p><strong>Shipped:</strong> {{ $order->updated_at->format('M d, Y \a\t g:i A') }}</p>
    @endif
    @if($order->status === 'delivered')
        <p><strong>Delivered:</strong> {{ $order->delivered_at ? \Carbon\Carbon::parse($order->delivered_at)->format('M d, Y \a\t g:i A') : 'Recently' }}</p>
    @endif
</div>

<div style="text-align: center; margin: 30px 0;">
    <a href="{{ url('/account/orders/' . $order->id) }}" class="button">View Order Details</a>
</div>

@if($newStatus === 'delivered')
    <p>We hope you love your new piece! If you require any aftercare, adjustments, or have any inquiries, please don't hesitate to contact us.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/catalogue') }}" class="button">EXPLORE MORE CREATIONS</a>
    </div>
@endif

<p>Thank you for choosing Éclore!</p>
@endsection

