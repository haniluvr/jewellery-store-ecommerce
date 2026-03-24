@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; padding: 2rem 0;">
    <h1 style="color: #1A1A1A; font-family: 'Playfair Display', serif; font-size: 2rem; margin-bottom: 1rem;">Welcome to Éclore</h1>
    <p style="font-size: 1.1rem; color: #555; margin-bottom: 2rem; font-weight: 300;">
        Thank you for joining our exclusive clientele. Please verify your email address to complete your account setup.
    </p>
    
    <div style="background: #FAFAFA; border-radius: 0; padding: 2rem; margin: 2rem 0; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
        <h2 style="color: #1A1A1A; font-family: 'Playfair Display', serif; font-size: 1.25rem; margin-bottom: 1rem;">Verify Your Address</h2>
        <p style="color: #555; font-weight: 300; margin-bottom: 1.5rem;">
            Click the link below to verify your email address and activate your portfolio:
        </p>
        
        <a href="{{ $verificationUrl }}" class="button">
            VERIFY EMAIL ADDRESS
        </a>
        
        <p style="color: #555; font-size: 11px; font-family: 'Azeret Mono', monospace; text-transform: uppercase; margin-top: 2rem;">
            Valid for 1 Hour
        </p>
    </div>
    
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 1rem; margin: 1rem 0;">
        <p style="color: #555; font-weight: 300; margin: 0; font-size: 0.875rem;">
            <strong>Note:</strong> If you did not create a portfolio with Éclore, please disregard this email.
        </p>
    </div>
    
    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #eeeeee;">
        <p style="color: #555; font-size: 0.875rem; margin: 0; font-weight: 300;">
            If the button does not work, copy and paste this link into your browser:
        </p>
        <p style="color: #1A1A1A; font-family: 'Azeret Mono', monospace; font-size: 10px; margin: 0.5rem 0 0 0; word-break: break-all;">
            {{ $verificationUrl }}
        </p>
    </div>
</div>
@endsection