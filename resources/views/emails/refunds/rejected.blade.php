@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Refund Request Update</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ ($returnRepair->user->first_name ?? '') . ' ' . ($returnRepair->user->last_name ?? '') ?: $returnRepair->user->email }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0; font-weight: 300;">
        We have completed the formal review of your refund request and must share the following assessment.
    </p>

    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 20px; margin: 25px 0;">
        <p style="margin: 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>RETURN AUTHORIZATION:</strong> {{ $returnRepair->rma_number }}</p>
        <p style="margin: 10px 0 0 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>ORDER REFERENCE:</strong> #{{ $returnRepair->order->order_number ?? 'N/A' }}</p>
        <p style="margin: 10px 0 0 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>CURRENT STATUS:</strong> {{ strtoupper($returnRepair->status) }}</p>
    </div>
</div>
    
<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Assessment Details</h2>
    
    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 20px; margin: 20px 0;">
        <p style="margin: 0; color: #555; font-weight: 300;">{{ $rejectionReason }}</p>
    </div>
    
<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Further Consultation</h2>
    
    <p style="color: #555; font-weight: 300;">If you believe this assessment requires further review or if you have additional information to present, please contact our concierge services:</p>
    
    <ul style="line-height: 2; margin: 20px 0; color: #555; font-weight: 300; font-size: 13px;">
        <li>Email: <a href="mailto:concierge@eclore.com" style="color: #1A1A1A; text-decoration: underline;">concierge@eclore.com</a></li>
        <li>Kindly reference your unique authorization number: <span style="font-family: 'Azeret Mono', monospace; font-size: 11px;">{{ $returnRepair->rma_number }}</span></li>
        <li>Our advisors will review your inquiry within 48-72 operational hours.</li>
    </ul>
    
    <p style="color: #555; font-weight: 300;">We remain at your disposal to resolve any concerns you may have regarding this decision.</p>
    
    <div style="margin: 40px 0; text-align: center;">
        <a href="{{ route('account') }}#orders" class="button">VIEW YOUR PORTFOLIO</a>
    </div>
    
    <p style="margin-top: 40px; color: #555; font-size: 13px; font-weight: 300; text-align: center;">
        Sincerely,<br>
        <span style="color: #1A1A1A; font-family: 'Playfair Display', serif;">The Éclore Concierge Team</span>
    </p>
</div>
@endsection

