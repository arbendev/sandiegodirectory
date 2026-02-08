<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Listing;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch categories with listing counts, limit to 5
        $categories = Category::withCount('listings')
            ->orderBy('listings_count', 'desc')
            ->take(5)
            ->get();

        // Fetch featured listings, limit to 3. If no featured, just take random active ones.
        $featuredListings = Listing::active()
            ->where('is_featured', true)
            ->with(['category', 'reviews'])
            ->inRandomOrder()
            ->take(3)
            ->get();

        if ($featuredListings->isEmpty()) {
            $featuredListings = Listing::active()
                ->with(['category', 'reviews'])
                ->latest()
                ->take(3)
                ->get();
        }

        // Fetch upcoming events
        // Fetch upcoming events
        // Logic: Show if it ends in the future OR (if end_datetime is null, it starts in the future)
        $upcomingEvents = Event::where(function($query) {
                $query->where('end_datetime', '>=', now())
                      ->orWhere(function($subQuery) {
                          $subQuery->whereNull('end_datetime')
                                   ->where('start_datetime', '>=', now());
                      });
            })
            ->orderBy('start_datetime', 'asc')
            ->take(4)
            ->get();

        return view('welcome', compact('categories', 'featuredListings', 'upcomingEvents'));
    }
}
