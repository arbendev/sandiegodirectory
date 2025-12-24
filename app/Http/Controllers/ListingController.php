<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($id)
    {
        $listing = Listing::with(['category', 'images'])->findOrFail($id);
        
        // Parse hours and amenities if they are JSON, though Blade can handle array or object access if casted.
        // It's better to rely on Eloquent casting or accessors in Model if possible, but for now we decode in view or rely on loose blade typing if they are strings.
        // Let's check model casts first or just pass as is.
        // Actually, $listing is retrieved. We will adapt the view to use $listing properties.
        
        return view('profile', [
            'business' => $listing,
            'relatedBusinesses' => [] // Optional: implement related logic later
        ]);
    }

    public function edit()
    {
        $listing = auth()->user()->listings()->firstOrFail();
        $categories = Category::all();
        return view('profile-edit', compact('listing', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'contact_email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|max:2048',
            'cover' => 'nullable|image|max:4096',
            'hours' => 'nullable|array',
        ]);

        $listing = auth()->user()->listings()->firstOrFail();

        // Handle File Uploads
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('uploads/logos', 'public');
            $listing->logo_path = $logoPath;
        }

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('uploads/covers', 'public');
            $listing->cover_image_path = $coverPath;
        }

        // Handle Hours
        $hours = $request->hours ? json_encode($request->hours) : null;

        $listing->update([
            'title' => $request->business_name,
            'category_id' => $request->category_id,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'email' => $request->contact_email,
            'social_links' => json_encode([
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
            ]),
            'hours' => $hours,
        ]);
        
        // Save if files were uploaded (since update uses mass assignment and might not catch the manually set properties if they are not in fillable or if using forceFill)
        // Ideally add logo_path and cover_image_path to model fillable or strictly update them.
        // Since we set them on the model instance above, perform a save() to ensure those changes persist if they weren't covered by update()
        if ($request->hasFile('logo') || $request->hasFile('cover')) {
            $listing->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
