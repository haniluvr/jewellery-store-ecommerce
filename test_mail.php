<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Mail;

$to = 'hvniluvr@gmail.com';
echo "Sending test email to $to...\n";

try {
    Mail::raw('This is a test email from Éclore Jewellery Admin system.', function ($message) use ($to) {
        $message->to($to)
            ->subject('Éclore Test Email');
    });
    echo "SUCCESS: Test email sent successfully.\n";
} catch (\Exception $e) {
    echo 'FAILED: '.$e->getMessage()."\n";
}
