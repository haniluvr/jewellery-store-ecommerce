<?php

define('LARAVEL_START', microtime(true));
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\CmsPage;
use Illuminate\Support\Str;

$pages = [
    [
        'title' => 'Moments We Share',
        'meta_description' => 'EXHIBITIONS, ENCOUNTERS, AND STORIES THAT CONNECT US WITH THE WORLD.',
    ],
    [
        'title' => 'Stories Of Creation',
        'meta_description' => 'BEHIND THE SCENES OF OUR ARTISTRY, FROM FIRST SKETCH TO TIMELESS JEWEL.',
    ],
];

foreach ($pages as $page) {
    CmsPage::updateOrCreate(
        ['slug' => Str::slug($page['title'])],
        [
            'title' => $page['title'],
            'content' => 'Content for '.$page['title'],
            'meta_description' => $page['meta_description'],
            'is_active' => 1,
        ]
    );
}

echo "Newsroom pages created successfully.\n";
