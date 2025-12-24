@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <div class="hero-card mb-4 p-0">
            <div class="event-hero-cover" style="background-image: url('{{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1600&q=80' }}'); background-size: cover; background-position: center; position: absolute; inset: 0; filter: brightness(0.6);"></div>

            <div class="hero-content-overlap p-4" style="position: relative; z-index: 2;">
                <div class="row g-3 align-items-end">
                    <div class="col-md-8 d-flex">
                        <div class="date-badge-lg me-3">
                            <div class="month">{{ $event->start_datetime->format('M') }}</div>
                            <div class="day">{{ $event->start_datetime->format('d') }}</div>
                            <div class="dow">{{ strtoupper($event->start_datetime->format('D')) }}</div>
                        </div>
                        <div class="event-hero-text text-white">
                            <div class="mb-1">
                                @if($event->tags)
                                    @foreach(array_slice($event->tags, 0, 3) as $tag)
                                        <span class="badge bg-white text-dark me-1">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <h1 class="h4 fw-bold mb-1">
                                {{ $event->title }}
                            </h1>
                            <div class="meta-text text-white-75">
                                📍 {{ $event->location_name ?? 'Location varies' }} <br>
                                ⏰ {{ $event->start_datetime->format('l, F j') }} · {{ $event->start_datetime->format('g:i A') }} - {{ $event->end_datetime ? $event->end_datetime->format('g:i A') : 'Ends late' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            @if($event->ticket_url)
                                <a href="{{ $event->ticket_url }}" target="_blank" class="btn btn-primary btn-sm">
                                    Get Ticket
                                </a>
                            @endif
                        </div>
                        <div class="meta-text mt-1 small text-white-50">
                            @if($event->listing)
                                👤 Hosted by <a href="{{ route('profile.show', $event->listing->id) }}" class="text-white text-decoration-underline">{{ $event->listing->title }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN LAYOUT --}}
        <div class="row g-4">

            {{-- LEFT: Content --}}
            <div class="col-lg-8">
                {{-- About --}}
                <div class="section-card">
                    <div class="section-label">About this event</div>
                    <div class="small mb-2" style="white-space: pre-line;">
                        {{ $event->description }}
                    </div>
                </div>

            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="col-lg-4">

                {{-- Event Details --}}
                <div class="section-card">
                    <div class="section-label">Event details</div>

                    <div class="small mb-2">
                        <div class="fw-semibold">Date &amp; Time</div>
                        <div>{{ $event->start_datetime->format('l, F j, Y') }}</div>
                        <div>
                            {{ $event->start_datetime->format('g:i A') }}
                            @if($event->end_datetime)
                                - {{ $event->end_datetime->format('g:i A') }}
                            @endif
                        </div>
                    </div>

                    <div class="small mb-2">
                        <div class="fw-semibold">Location</div>
                        <div>{{ $event->location_name }}</div>
                        @if($event->address)
                            <div class="text-muted">{{ $event->address }}</div>
                        @endif
                    </div>
                    
                    @if($event->listing && ($event->listing->email || $event->listing->phone))
                    <div class="small mb-2">
                        <div class="fw-semibold">Contact</div>
                        @if($event->listing->email)
                            <div>Email: <a href="mailto:{{ $event->listing->email }}">{{ $event->listing->email }}</a></div>
                        @endif
                        @if($event->listing->phone)
                            <div>Phone: <a href="tel:{{ $event->listing->phone }}">{{ $event->listing->phone }}</a></div>
                        @endif
                    </div>
                    @endif
                </div>


                {{-- Tickets / Price --}}
                 <div class="section-card mt-3">
                    <div class="section-label">Tickets</div>
                    <h2 class="h6 fw-bold mb-1">{{ ucfirst($event->price_type) }} Admission</h2>
                    
                    @if($event->price_type === 'paid')
                        <div class="mb-2">
                            <span class="badge bg-success text-white">Price: ${{ number_format($event->price, 2) }}</span>
                        </div>
                    @else
                         <div class="mb-2">
                            <span class="badge bg-success text-white">Free entry</span>
                        </div>
                    @endif

                    @if($event->ticket_url)
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ $event->ticket_url }}" target="_blank" class="btn btn-primary btn-sm">
                                Buy Tickets / RSVP
                            </a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
