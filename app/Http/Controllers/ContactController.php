<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Logic to send email would go here.
        // Mail::to('admin@example.com')->send(new ContactMail($validated));
        
        // Create database record
        \App\Models\ContactSubmission::create($validated);
        
        Log::info('Contact Form Submission:', $validated);

        return back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
    }
}
