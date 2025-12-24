<?php

use App\Models\Listing;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$featuredListings = Listing::where('status', 'active')
    ->where('is_featured', true)
    ->take(3)
    ->get();

if ($featuredListings->isEmpty()) {
    echo "No featured listings found. Falling back to latest.\n";
    $featuredListings = Listing::where('status', 'active')
        ->latest()
        ->take(3)
        ->get();
}

foreach ($featuredListings as $listing) {
    echo "ID: " . $listing->id . "\n";
    echo "Title: " . $listing->title . "\n";
    echo "Address: " . $listing->address . "\n";
    echo "City: " . $listing->city . "\n";
    echo "State: " . $listing->state . "\n";
    echo "Full Address: " . ($listing->address) . ', ' . ($listing->city) . ', ' . ($listing->state) . "\n";
    echo "--------------------------------\n";
}
