@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Welcome to Éclore Administration</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ $admin->first_name }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0 0 20px 0; font-weight: 300;">
        Welcome to the Éclore Administration Panel. Your administrative credentials have been successfully provisioned.
    </p>
    
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
        <h3 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Your Credentials</h3>
        <p style="color: #555; margin: 0 0 10px 0; font-weight: 300;"><strong>Login Email:</strong> <span style="font-family: 'Azeret Mono', monospace; font-size: 12px;">{{ $admin->email }}</span></p>
        <p style="color: #555; margin: 0 0 10px 0; font-weight: 300;"><strong>Role:</strong> <span style="font-family: 'Azeret Mono', monospace; font-size: 11px; text-transform: uppercase;">{{ ucwords(str_replace('_', ' ', $admin->role)) }}</span></p>
    </div>
    
    @if(isset($magicLink) && $magicLink)
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0; border-top: 1px solid #1A1A1A;">
        <h3 style="color: #1A1A1A; margin: 0 0 15px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Complete Authorization</h3>
        <p style="color: #555; margin: 0 0 15px 0; font-weight: 300;">To complete your setup and authorize your password, please proceed through the secure link below:</p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ $magicLink }}" class="button">SET SECURE PASSWORD</a>
        </div>
        <p style="margin: 0; color: #B6965D; font-family: 'Azeret Mono', monospace; font-size: 10px; text-transform: uppercase; text-align: center;">Valid for 24 Hours</p>
        <p style="margin: 10px 0 0 0; color: #555; font-size: 12px; font-weight: 300;">If the button does not work, copy and paste this link into your browser:</p>
        <p style="margin: 5px 0 0 0; color: #1A1A1A; font-family: 'Azeret Mono', monospace; font-size: 10px; word-break: break-all;">{{ $magicLink }}</p>
    </div>
    @endif
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Security Notice</h3>
    <p style="color: #555; margin: 0; font-weight: 300;">Please keep your credentials secure. If you have any inquiries, contact the systems administrator.</p>
</div>

<div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 25px; margin: 20px 0;">
    <h3 style="color: #1A1A1A; margin: 0 0 10px 0; font-family: 'Playfair Display', serif; font-size: 16px;">Accessing Operations</h3>
    <p style="color: #555; margin: 0 0 10px 0; font-weight: 300;">Once authorized, access operations here:</p>
    <p style="color: #1A1A1A; margin: 0; font-family: 'Azeret Mono', monospace; font-size: 11px;"><a href="{{ admin_route('dashboard') }}" style="color: #1A1A1A;">{{ admin_route('dashboard') }}</a></p>
</div>

<p style="color: #555; margin: 30px 0 20px 0; font-weight: 300; text-align: center;">Welcome to the Éclore Team.</p>
@endsection

