<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $listing = Listing::findOrFail($id);

        // Check if user already reviewed
        $existingReview = Review::where('user_id', auth()->id())
            ->where('listing_id', $listing->id)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'You have already reviewed this business.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}
