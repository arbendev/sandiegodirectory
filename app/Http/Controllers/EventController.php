<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('listing')
            ->where('start_datetime', '>=', now())
            ->orderBy('start_datetime', 'asc')
            ->paginate(10);

        return view('events', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::with('listing')->where('slug', $slug)->firstOrFail();
        return view('event', compact('event'));
    }
}
