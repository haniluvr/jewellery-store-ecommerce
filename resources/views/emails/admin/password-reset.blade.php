@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Admin Authentication Reset</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $admin->first_name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-weight: 300;">
        You requested to reset your administration credentials ({{ $admin->email }}). Proceed via the secure link below.
    </p>
    
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; border-top: 1px solid #1A1A1A;">
        <h3 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Reset Authentication</h3>
        <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">Click the secure link below to reset your password. This link will expire shortly.</p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ $resetUrl }}" class="button">RESET CREDENTIALS</a>
        </div>
        <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; text-transform: uppercase;">Valid for 1 Hour</p>
        <p style="margin: 10px 0 0 0; color: #555; font-size: 12px; font-weight: 300;">If the button does not work, copy and paste this link into your browser:</p>
        <p style="margin: 5px 0 0 0; color: #1A1A1A; font-family: 'Azeret Mono', monospace; font-size: 10px; word-break: break-all;">{{ $resetUrl }}</p>
    </div>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Security Notice</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">If you did not request this password reset, please ignore this email. Your authentication will retain its current integrity.</p>
</div>

<p style="color: #555; margin: 20px 0; font-weight: 300;">Thank you,<br>
The Éclore Admin operations</p>
@endsection

