<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

$email = 'hymarquez@eclore.co';
$password = 'admin123';

echo "Testing login for $email...\n";

$admin = Admin::where('email', $email)->first();

if (! $admin) {
    echo "FAILED: Admin not found in database.\n";
    $all = Admin::all('email')->pluck('email')->toArray();
    echo 'Available emails: '.implode(', ', $all)."\n";
    exit;
} else {
    echo "SUCCESS: Admin found.\n";
    echo 'Admin Status: '.($admin->status ?? 'N/A')."\n";
    echo 'Hash in DB: '.substr($admin->password, 0, 10)."...\n";
}

if (Hash::check($password, $admin->password)) {
    echo "SUCCESS: Password matches.\n";
} else {
    echo "FAILED: Password does NOT match.\n";
}

// Try guard login
if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
    echo "SUCCESS: Guard attempt succeeded.\n";
} else {
    echo "FAILED: Guard attempt failed.\n";
}
