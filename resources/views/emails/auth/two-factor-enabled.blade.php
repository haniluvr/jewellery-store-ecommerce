@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Two-Factor Authentication Enabled</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $user->first_name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-weight: 300;">
        You have successfully enabled two-factor authentication for your portfolio. This adds an extra layer of security to protect your account.
    </p>

    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 15px; margin: 20px 0;">
        <p style="color: #1A1A1A; margin: 0; font-weight: 600; font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; text-align: center;">
            Two-Factor Authentication is active
        </p>
    </div>

    <p style="color: #555; line-height: 1.6; margin: 20px 0 0 0; font-weight: 300;">
        From now on, when you log in, you will receive a secure magic link via email to complete your authentication. This ensures your portfolio remains secure.
    </p>
</div>

<div style="border-top: 1px solid #E5E5E5; padding-top: 20px; text-align: center;">
    <p style="color: #666; font-size: 12px; margin: 0;">
        If you didn't enable this feature, please contact our support team immediately.
    </p>
    <p style="color: #666; font-size: 12px; margin: 10px 0 0 0;">
        This email was sent to {{ $user->email }}
    </p>
</div>
@endsection
