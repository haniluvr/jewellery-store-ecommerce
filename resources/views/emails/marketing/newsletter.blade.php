@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">The Éclore Dispatch</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $subscriber->name ?? 'Valued Collector' }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0; font-weight: 300;">
        Thank you for subscribing to our correspondence. Here is what is capturing our attention at Éclore this season.
    </p>
</div>

@if($featuredProducts && count($featuredProducts) > 0)
<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Curated Pieces</h2>
<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <p style="color: #555; margin: 0; font-weight: 300;">Discover our handpicked selection of high jewelry pieces, crafted with the rarest materials and uncompromising attention to detail.</p>
</div>

@foreach($featuredProducts as $product)
<div style="border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; background-color: #FAFAFA;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">{{ $product->name }}</h3>
    <p style="margin: 0 0 15px 0; color: #555; font-weight: 300;">{{ Str::limit($product->description, 150) }}</p>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
        <div>
            <span style="font-size: 14px; font-weight: 400; color: #1A1A1A; font-family: 'Azeret Mono', monospace;">€{{ number_format($product->price, 2) }}</span>
            @if($product->sale_price && $product->sale_price < $product->price)
                <span style="text-decoration: line-through; color: #999; margin-left: 10px; font-family: 'Azeret Mono', monospace; font-size: 12px;">€{{ number_format($product->price, 2) }}</span>
                <span style="background-color: #1A1A1A; color: white; padding: 2px 8px; font-family: 'Azeret Mono', monospace; font-size: 10px; margin-left: 10px;">PRIVILEGE</span>
            @endif
        </div>
        <div>
            <a href="{{ url('/products/' . $product->id) }}" class="button" style="padding: 10px 20px; font-size: 10px;">ACQUIRE NOW</a>
        </div>
    </div>
    
    @if($product->average_rating > 0)
    <div style="margin: 10px 0;">
        <span style="color: #1A1A1A; font-size: 14px;">
            @for($i = 1; $i <= 5; $i++)
                <span style="display: inline-block; margin-right: 2px;">{{ $i <= $product->average_rating ? '★' : '☆' }}</span>
            @endfor
        </span>
    </div>
    @endif
</div>
@endforeach
@endif

@if($promotions && count($promotions) > 0)
<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Exclusive Privileges</h2>
@foreach($promotions as $promotion)
<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; text-align: center;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">{{ $promotion->title }}</h3>
    <p style="margin: 0 0 15px 0; color: #555; font-weight: 300;">{{ $promotion->description }}</p>
    @if($promotion->discount_code)
        <p style="margin: 0 0 15px 0; color: #555;"><strong>Privilege Code:</strong> <span style="background-color: #1A1A1A; color: white; padding: 4px 10px; font-family: 'Azeret Mono', monospace; font-size: 12px;">{{ $promotion->discount_code }}</span></p>
    @endif
    @if($promotion->valid_until)
        <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase;">Valid until {{ \Carbon\Carbon::parse($promotion->valid_until)->format('M d, Y') }}</p>
    @endif
</div>
@endforeach
@endif

<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Recent Additions</h2>
<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">New Collection: Lumi Naturelle</h3>
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">Introducing our latest high jewelry collection featuring brilliant-cut diamonds and natural organic contours. A testament to light and life.</p>
    <div style="text-align: center; margin: 20px 0;">
        <a href="{{ url('/catalogue') }}" class="button" style="padding: 10px 20px; font-size: 10px;">EXPLORE COLLECTION</a>
    </div>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Bespoke Services</h3>
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">Looking for something extraordinary? Our master jewelers remain at your disposal to create custom pieces tailored to your exact specifications.</p>
    <div style="text-align: center; margin: 20px 0;">
        <a href="{{ url('/about') }}" class="button" style="padding: 10px 20px; font-size: 10px; background: #1A1A1A; color: #ffffff !important;">DISCOVER BESPOKE</a>
    </div>
</div>

<div style="text-align: center; margin: 40px 0;">
    <a href="{{ url('/catalogue') }}" class="button" style="margin: 0 10px;">SHOP ALL CREATIONS</a>
</div>

<p style="color: #555; margin: 30px 0 20px 0; font-weight: 300; text-align: center;">Thank you for being part of our esteemed community. We invite you to discover beauty with us.</p>
@endsection

