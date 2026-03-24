@extends('emails.layouts.branded')

@section('content')
<h1>Response to Your Inquiry</h1>

<p>Dear {{ $contactMessage->name }},</p>

<p>Thank you for contacting Éclore. We have received your message and are pleased to provide assistance.</p>

@if($contactMessage->message)
<div class="info-box" style="background-color: #FAFAFA; padding: 20px; border-radius: 0; margin: 20px 0; border: 1px solid #eeeeee; border-left: 2px solid #1A1A1A;">
    <p style="margin: 0 0 10px 0; font-weight: 600; color: #1A1A1A; font-family: 'Playfair Display', serif;">Your Original Message:</p>
    <p style="margin: 0; color: #555; font-weight: 300;">{{ $contactMessage->message }}</p>
</div>
@endif

<div style="background-color: #FAFAFA; padding: 20px; border-radius: 0; margin: 20px 0; border: 1px solid #eeeeee;">
    <p style="margin: 0 0 10px 0; font-weight: 600; color: #1A1A1A; font-family: 'Playfair Display', serif;">Our Response:</p>
    <div style="color: #555; font-weight: 300; white-space: pre-wrap;">{!! nl2br(e($replyMessage)) !!}</div>
</div>

<p>If you require any further assistance or consultations, please do not hesitate to reach out. We are at your complete disposal.</p>

<p>Kind regards,<br>
<strong>{{ $admin->full_name }}</strong><br>
Éclore Concierge</p>

<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #E5E5E5;">
    <p style="font-size: 12px; color: #6b7280; margin: 0;">
        This is an automated response to your inquiry submitted on {{ $contactMessage->created_at->format('M d, Y \a\t g:i A') }}.
    </p>
</div>
@endsection

