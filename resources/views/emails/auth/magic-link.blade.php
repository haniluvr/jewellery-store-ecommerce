@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Secure Authentication</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $user->first_name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-weight: 300;">
        You are moments away from accessing your portfolio. Please proceed by clicking the secure link below.
    </p>

    <div style="text-align: center; margin: 30px 0;">
        @if($user instanceof \App\Models\Admin)
            <a href="{{ admin_route('verify-magic-link', $token) }}" class="button" style="margin: 0 auto;">
                AUTHENTICATE NOW
            </a>
        @else
            <a href="{{ route('auth.verify-email', $token) }}" class="button" style="margin: 0 auto;">
                AUTHENTICATE NOW
            </a>
        @endif
    </div>

    <p style="color: #555; font-size: 11px; font-family: 'Azeret Mono', monospace; text-transform: uppercase; margin: 20px 0 0 0; text-align: center;">
        Valid for 1 Hour
    </p>
</div>

<div style="border-top: 1px solid #E5E5E5; padding-top: 20px; text-align: center;">
    <p style="color: #666; font-size: 12px; margin: 0;">
        If you didn't request this login, please ignore this email or contact support if you have concerns.
    </p>
    <p style="color: #666; font-size: 12px; margin: 10px 0 0 0;">
        This email was sent to {{ $user->email }}
    </p>
</div>
@endsection
