
@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">San Diego Business Networking Mixer</li>
        </ol>
    </nav>

    {{-- HERO --}}
    <div class="event-hero-card mb-4">
        <div class="event-hero-cover"></div>

        <div class="event-hero-content">
            <div class="row g-3 align-items-end">
                <div class="col-md-8 d-flex">
                    <div class="event-date-badge-lg me-3">
                        <div class="month">APR</div>
                        <div class="day">13</div>
                        <div class="dow">SAT</div>
                    </div>
                    <div class="event-hero-text">
                        <div class="mb-1">
                            <span class="event-label-pill">Business &amp; Networking</span>
                            <span class="event-label-pill">In-person</span>
                        </div>
                        <h1 class="h4 fw-bold mb-1">
                            San Diego Business Networking Mixer
                        </h1>
                        <div class="event-hero-meta">
                            📍 San Diego Convention Center · Hall B<br>
                            ⏰ Saturday, April 13 · 6:00 PM – 9:00 PM
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="mb-2">
                        <span class="badge bg-success rounded-pill me-1">Happening Soon</span>
                        <span class="badge bg-light text-muted rounded-pill">Free Event</span>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary btn-sm">
                            Get Free Ticket
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm">
                            Add to Calendar
                        </a>
                    </div>
                    <div class="event-hero-meta mt-1 small">
                        👤 Hosted by SD Business Hub · 120 people interested
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
                <h2 class="h6 fw-bold mb-2">
                    Connect with local professionals in a relaxed, friendly setting.
                </h2>
                <p class="small mb-2">
                    Join entrepreneurs, founders, freelancers, and small business owners from across San Diego
                    for an evening of meaningful connections and conversation. Whether you are looking for new
                    clients, collaborators, or simply want to expand your local network, this mixer is designed
                    to help you meet the right people.
                </p>
                <p class="small mb-2">
                    Expect a welcoming atmosphere, curated introductions, and light refreshments provided by
                    local vendors. Bring plenty of business cards, your elevator pitch, and an open mind.
                </p>
                <p class="small mb-0">
                    <strong>Who should attend?</strong><br>
                    Small business owners, startup teams, creatives, marketers, real estate professionals,
                    consultants, and anyone interested in building relationships within the San Diego business community.
                </p>
            </div>

 

        </div>

        {{-- RIGHT: Sidebar --}}
        <div class="col-lg-4">

                   {{-- Event Details --}}
            <div class="section-card">
                <div class="section-label">Event details</div>

                <div class="small mb-2">
                    <div class="fw-semibold">Date &amp; Time</div>
                    <div>Saturday, April 13</div>
                    <div>6:00 PM - 9:00 PM</div>
                </div>

                <div class="small mb-2">
                    <div class="fw-semibold">Location</div>
                    <div>San Diego Convention Center · Hall B</div>
                    <div class="text-muted">111 W Harbor Dr, San Diego, CA 92101</div>
                </div>

                <div class="small mb-2">
                    <div class="fw-semibold">Contact</div>
                    <div>Email: hello@sdbusinesshub.com</div>
                    <div>Phone: (555) 123-4567</div>
                </div>
            </div>


            {{-- Tickets / Registration --}}
            {{--
            <div class="section-card">
                <div class="section-label">Tickets</div>
                <h2 class="h6 fw-bold mb-1">General Admission</h2>
                <div class="mb-1 small text-muted">
                    Free · Includes access to all networking rounds and refreshments.
                </div>

                <div class="mb-2">
                    <span class="ticket-badge">Free entry</span>
                    <span class="ticket-badge">Limited capacity</span>
                    <span class="ticket-badge">RSVP required</span>
                </div>

                <div class="small mb-2 text-muted">
                    ⏳ 30 spots left · Registration closes April 12 at 11:59 PM.
                </div>

                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary btn-sm">
                        Reserve My Spot
                    </a>
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        Share Event
                    </a>
                </div>
            </div>
             --}}

        </div>
    </div>
</div>

@endsection