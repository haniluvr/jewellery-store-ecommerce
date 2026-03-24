@extends('emails.layouts.branded')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #1A1A1A; margin: 0; font-family: 'Playfair Display', serif;">Refund Request Approved</h1>
</div>

<div style="background: #FAFAFA; padding: 30px; border-radius: 0; margin-bottom: 30px; border: 1px solid #eeeeee; border-top: 2px solid #1A1A1A;">
    <h2 style="color: #1A1A1A; margin: 0 0 20px 0; font-family: 'Playfair Display', serif;">Dear {{ ($returnRepair->user->first_name ?? '') . ' ' . ($returnRepair->user->last_name ?? '') ?: $returnRepair->user->email }},</h2>
    
    <p style="color: #555; line-height: 1.6; margin: 0; font-weight: 300;">
        We are pleased to inform you that your refund request has been formally approved after our initial assessment.
    </p>

    <div style="background: #FAFAFA; border: 1px solid #eeeeee; padding: 20px; margin: 25px 0;">
        <p style="margin: 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>RETURN AUTHORIZATION:</strong> {{ $returnRepair->rma_number }}</p>
        <p style="margin: 10px 0 0 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>ORDER REFERENCE:</strong> #{{ $returnRepair->order->order_number ?? 'N/A' }}</p>
        <p style="margin: 10px 0 0 0; font-family: 'Azeret Mono', monospace; font-size: 11px; color: #1A1A1A;"><strong>CURRENT STATUS:</strong> {{ strtoupper($returnRepair->status) }}</p>
    </div>
</div>
    
<h2 style="color: #1A1A1A; margin: 40px 0 20px 0; font-family: 'Playfair Display', serif; font-size: 20px; border-bottom: 1px solid #eeeeee; padding-bottom: 10px;">Next Considerations</h2>
    
    <p style="color: #555; font-weight: 300;">Our specialists will now proceed with the finalization of your refund. Please note the following sequence:</p>
    
    <ul style="line-height: 2; margin: 20px 0; color: #555; font-weight: 300; font-size: 13px;">
        <li>Should the creation still reside with you, please utilize the provided return authorization.</li>
        <li>Upon receipt and inspection of the creation at our atelier, the refund will be initiated.</li>
        <li>Financial reversals typically require 5-10 business days per standard banking intervals.</li>
        <li>A final confirmation will be dispatched upon completion of the transaction.</li>
    </ul>
    
    <p style="color: #555; font-weight: 300;">Should you require any further assistance or consultations, please do not hesitate to reach out to our concierge.</p>
    
    <div style="margin: 40px 0; text-align: center;">
        <a href="{{ route('account') }}#orders" class="button">VIEW YOUR PORTFOLIO</a>
    </div>
    
    <p style="margin-top: 40px; color: #555; font-size: 13px; font-weight: 300; text-align: center;">
        Sincerely,<br>
        <span style="color: #1A1A1A; font-family: 'Playfair Display', serif;">The Éclore Concierge Team</span>
    </p>
</div>
@endsection

