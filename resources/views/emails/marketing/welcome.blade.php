@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Welcome to Éclore</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $user->name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-weight: 300;">
        Welcome to the exclusive world of Éclore. We are delighted to have you join our distinguished clientele of high jewelry connoisseurs.
    </p>
    
    @if(isset($magicLink) && $magicLink)
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; border-top: 1px solid #1A1A1A;">
        <h3 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Complete Your Profile</h3>
        <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">To finalize your sophisticated portfolio and set a secure password, kindly proceed through the secure link below:</p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ $magicLink }}" class="button">SET SECURE PASSWORD</a>
        </div>
        <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; text-transform: uppercase;">Valid for 24 Hours</p>
    </div>
    @endif
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h2 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 18px; text-align: center;">An Exclusive Privilege</h2>
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300; text-align: center;">As a token of our appreciation for your membership, we invite you to enjoy a complimentary <strong>10%</strong> consideration on your inaugural acquisition.</p>
    <p style="color: #555; margin: 0 0 15px 0; text-align: center;"><strong>Privilege Code:</strong> <span style="background-color: #1A1A1A; color: white; padding: 4px 10px; font-family: 'Azeret Mono', monospace; font-size: 13px; letter-spacing: 0.1em;">ECLORE10</span></p>
    <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase; text-align: center;">Valid for 30 Days</p>
</div>

<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">The Éclore Signature</h2>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Masterful Artistry</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Discover our precisely curated high jewelry collections, from breathtaking engagement rings to bespoke necklaces, each uniquely handcrafted by master artisans from the rarest materials.</p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">White-Glove Delivery</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">We offer fully insured, complimentary secure courier delivery on all exquisite acquisitions across the globe.</p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Personal Concierge</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Our devoted high jewelry advisors wait to guide you through our collections and offer individualized bespoke design consultations.</p>
</div>

<div style="text-align: center; margin: 40px 0;">
    <a href="{{ url('/catalogue') }}" class="button" style="margin: 0 10px;">EXPLORE COLLECTIONS</a>
    <a href="{{ url('/account') }}" class="button" style="margin: 0 10px; background: #1A1A1A; color: #ffffff !important;">YOUR PORTFOLIO</a>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <p style="color: #555; margin: 0 0 15px 0; font-weight: 300; text-align: center;">Our advisors are at your complete disposal to assist you:</p>
    <ul style="margin: 0 auto; padding-left: 0; color: #555; list-style-type: none; text-align: center; font-family: 'Azeret Mono', monospace; font-size: 11px; line-height: 2;">
        <li>+33 (0) 1 40 20 45 45</li>
        <li>concierge@eclore.com</li>
    </ul>
</div>

<p style="color: #555; margin: 30px 0 20px 0; font-weight: 300; text-align: center;">We invite you to immerse yourself in out-of-the-ordinary creations.</p>
@endsection

