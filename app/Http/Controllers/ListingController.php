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
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $listings = Listing::with(['category', 'reviews'])
            ->active()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('tagline', 'like', "%{$query}%")
                  ->orWhereHas('category', function ($q) use ($query) {
                      $q->where('name', 'like', "%{$query}%");
                  });
            })
            ->latest()
            ->paginate(12);

        return view('search', compact('listings', 'query'));
    }

    public function create()
    {
        // Ensure user doesn't already have one
        if (auth()->user()->listings()->exists()) {
            return redirect()->route('profile.edit');
        }

        $listing = new Listing();
        $categories = Category::all();
        return view('profile-edit', compact('listing', 'categories'));
    }

    public function store(Request $request)
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

        $listing = new Listing();
        $listing->user_id = auth()->id();
        $listing->category_id = $request->category_id;
        $listing->title = $request->business_name;
        $listing->slug = Str::slug($request->business_name . '-' . Str::random(6));
        $listing->tagline = $request->tagline;
        $listing->description = $request->description;
        $listing->phone = $request->phone;
        $listing->website = $request->website;
        $listing->address = $request->address;
        $listing->city = $request->city;
        $listing->state = 'CA'; // Default for now
        $listing->zip = $request->zip;
        $listing->email = $request->contact_email;
        $listing->status = 'active'; // Auto-activate for demo
        $listing->social_links = json_encode([
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
        ]);
        
        if ($request->hasFile('logo')) {
            $listing->logo_path = $request->file('logo')->store('uploads/logos', 'public');
        }

        if ($request->hasFile('cover')) {
            $listing->cover_image_path = $request->file('cover')->store('uploads/covers', 'public');
        }

        // Handle Hours
        $listing->hours = $request->hours ? json_encode($request->hours) : null;

        $listing->save();

        return redirect()->route('home')->with('success', 'Listing created successfully!');
    }

    public function show($slug)
    {
        $listing = Listing::with(['category', 'images', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();
        
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
