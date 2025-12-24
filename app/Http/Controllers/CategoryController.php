<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('listings')->get();
        return view('categories', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $listings = $category->listings()->where('status', 'active')->paginate(12); // Assuming active status logic
        // Or just all for now since status logic isn't fully enforced
        // $listings = $category->listings()->paginate(12);
        
        return view('category', compact('category', 'listings'));
    }
}
