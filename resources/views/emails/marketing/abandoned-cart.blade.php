@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Your Selection Awaits</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Hello {{ $user->name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0; font-weight: 300;">
        We noticed you left some exquisite pieces in your cart. Their timeless beauty is waiting to be yours.
    </p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; text-align: center;">
    <h2 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 18px;">A Special Consideration</h2>
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">Complete your acquisition within the next 24 hours to enjoy a complimentary <strong>15%</strong> courtesy on your order.</p>
    <p style="color: #555; margin: 0 0 15px 0;"><strong>Privilege Code:</strong> <span style="background-color: #1A1A1A; color: white; padding: 4px 10px; font-family: 'Azeret Mono', monospace; font-size: 13px; letter-spacing: 0.1em;">ECLORE15</span></p>
    <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase;">Valid for 24 Hours</p>
</div>

<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Your Selection</h2>
@if($cartItems && count($cartItems) > 0)
<table class="order-table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
        <tr>
            <td>
                <div style="display: flex; align-items: center;">
                    @if($item->product->images && count($item->product->images) > 0)
                        <img src="{{ storage_url($item->product->images[0]) }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; margin-right: 15px;">
                    @endif
                    <div>
                        <strong>{{ $item->product->name }}</strong>
                        @if($item->product->sku)
                            <br><small>SKU: {{ $item->product->sku }}</small>
                        @endif
                    </div>
                </div>
            </td>
            <td>{{ $item->quantity }}</td>
            <td>€{{ number_format($item->unit_price, 2) }}</td>
            <td>€{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><strong>Subtotal:</strong></td>
            <td><strong>€{{ number_format($cartTotal, 2) }}</strong></td>
        </tr>
        <tr style="background-color: #FAFAFA;">
            <td colspan="3"><strong>Courtesy (15%):</strong></td>
            <td><strong style="color: #B6965D;">-€{{ number_format($cartTotal * 0.15, 2) }}</strong></td>
        </tr>
        <tr class="total-row">
            <td colspan="3"><strong>Total Balance:</strong></td>
            <td><strong style="font-size: 16px; color: #1A1A1A;">€{{ number_format($cartTotal * 0.85, 2) }}</strong></td>
        </tr>
    </tfoot>
</table>
@endif

<div style="text-align: center; margin: 40px 0;">
    <a href="{{ url('/checkout') }}" class="button" style="margin: 0 10px;">PROCEED TO SECURE CHECKOUT</a>
</div>

<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">The Éclore Experience</h2>
<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Exceptional Craftsmanship</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Every creation is a testament to unparalleled artistry, accompanied by a certificate of authenticity and our lifetime warranty.</p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Complimentary White-Glove Delivery</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Enjoy fully insured, complimentary delivery. Your piece will be hand-delivered in our signature packaging.</p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Bespoke Services</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Should you require adjustments, our master jewelers provide complimentary initial resizing and consultation services.</p>
</div>

<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Personal Concierge</h2>
<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">Our dedicated advisors are available to assist you:</p>
    <ul style="margin: 0; padding-left: 20px; color: #555; font-weight: 300; font-family: 'Azeret Mono', monospace; font-size: 11px; line-height: 2;">
        <li>+33 (0) 1 40 20 45 45</li>
        <li>concierge@eclore.com</li>
    </ul>
</div>

<p style="color: #555; margin: 30px 0 20px 0; font-weight: 300;">We look forward to welcoming you to the Éclore family.</p>
@endsection

