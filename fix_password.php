<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;

$email = 'hymarquez@eclore.co';
$admin = Admin::where('email', $email)->first();

if ($admin) {
    // Set RAW password, letting the 'hashed' cast handle it
    $admin->password = 'admin123';
    $admin->save();
    echo "Password set to admin123 for $email using model cast.\n";
} else {
    echo "Admin not found!\n";
}
