<?php

namespace App\Http\Controllers;

use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listing = auth()->user()->listings()->with('images')->firstOrFail();
        return view('profile-photos', compact('listing'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|max:4096' // 4MB max per image
        ]);

        $listing = auth()->user()->listings()->firstOrFail();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // Store file
                $path = $photo->store('uploads/gallery', 'public');

                // Create database record
                $listing->images()->create([
                    'image_path' => $path,
                    // 'caption' => ... // Could be added later if UI supports it
                ]);
            }
        }

        return redirect()->route('profile.photos')->with('success', 'Photos uploaded successfully.');
    }

    public function destroy($id)
    {
        $listing = auth()->user()->listings()->firstOrFail();
        
        // Ensure the image belongs to the user's listing
        $image = $listing->images()->where('id', $id)->firstOrFail();

        // Delete from storage
        Storage::disk('public')->delete($image->image_path);

        // Delete from database
        $image->delete();

        return redirect()->route('profile.photos')->with('success', 'Photo deleted successfully.');
    }
}
