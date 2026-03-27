<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Mail\AdminOtpMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

$admin = Admin::where('email', 'hymarquez@eclore.co')->first();

if (! $admin) {
    echo "FAILED: Admin not found.\n";
    exit;
}

$to = 'hvniluvr@gmail.com';
$otp = '123456';

echo "Sending OTP email to $to using AdminOtpMail class...\n";

try {
    Mail::to($to)->send(new AdminOtpMail($admin, $otp));
    echo "SUCCESS: OTP email sent successfully.\n";
} catch (\Exception $e) {
    echo 'FAILED: '.$e->getMessage()."\n";
}
