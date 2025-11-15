@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
    </nav>

    {{-- HERO / INTRO --}}
    <section class="mb-4">
        <div class="events-hero">
            <div class="row g-3 align-items-center">
                <div class="col-md-7">
                    <h1 class="h4 fw-bold mb-2">Discover What's Happening Around San Diego</h1>
                    <p class="small mb-3 text-muted">
                        Business meetups, local festivals, live music, workshops, and more.  
                        Find events by date, category, and neighborhood.
                    </p>

                    {{-- 
                    <form class="row g-2 align-items-center">
                        <div class="col-sm-6 col-md-5">
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Search events (e.g. networking, food festival)">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <select class="form-select form-select-sm">
                                <option selected>All categories</option>
                                <option>Business & Networking</option>
                                <option>Food & Drink</option>
                                <option>Family & Kids</option>
                                <option>Arts & Culture</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-1 mt-1 mt-md-0 text-md-end">
                            <button class="btn btn-primary btn-sm w-100" type="submit">
                                Search
                            </button>
                        </div>
                    </form>
                    --}}
                </div>

            </div>
        </div>
    </section>

    {{-- MAIN LAYOUT: EVENTS LIST + SIDEBAR --}}
    <section>
        <div class="row g-4">
            {{-- LEFT: Event list --}}
            <div class="col-lg-8">
                <div class="row g-3">

                    {{-- Event 1 --}}
                    <div class="col-12">
                        <div class="event-card-main">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="event-date-badge">
                                        <div class="month">APR</div>
                                        <div class="day">13</div>
                                        <div class="dow">SAT</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h6 fw-bold mb-1">
                                        San Diego Business Networking Mixer
                                    </h2>
                                    <div class="event-meta mb-1">
                                        San Diego Convention Center · 6:00 PM - 9:00 PM
                                    </div>
                                    <p class="small text-muted mb-1">
                                        Connect with entrepreneurs, founders, and local professionals over drinks and light bites.
                                    </p>
                                    <div>
                                        <span class="event-tag-pill">Business &amp; Networking</span>
                                        <span class="event-tag-pill">Free Registration</span>
                                        <span class="event-tag-pill">Indoor</span>
                                    </div>
                                </div>
                                <div class="col-md-3 small text-muted">
                                    <div class="mb-1">
                                        👥 Hosted by: SD Business Hub
                                    </div>
                                    <div class="mb-1">
                                        💵 Tickets: Free · RSVP required
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            View Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Event 2 --}}
                    <div class="col-12">
                        <div class="event-card-main">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="event-date-badge">
                                        <div class="month">APR</div>
                                        <div class="day">22</div>
                                        <div class="dow">MON</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h6 fw-bold mb-1">
                                        Small Business Growth Summit
                                    </h2>
                                    <div class="event-meta mb-1">
                                        Downtown Conference Center · 9:00 AM - 4:00 PM
                                    </div>
                                    <p class="small text-muted mb-1">
                                        A full-day summit with speakers, panels, and workshops for small business owners.
                                    </p>
                                    <div>
                                        <span class="event-tag-pill">Business &amp; Networking</span>
                                        <span class="event-tag-pill">Workshops</span>
                                        <span class="event-tag-pill">Paid Event</span>
                                    </div>
                                </div>
                                <div class="col-md-3 small text-muted">
                                    <div class="mb-1">
                                        👥 Hosted by: SD Chamber of Commerce
                                    </div>
                                    <div class="mb-1">
                                        💵 Tickets: From $49
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            View Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Event 3 --}}
                    <div class="col-12">
                        <div class="event-card-main">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="event-date-badge">
                                        <div class="month">APR</div>
                                        <div class="day">27</div>
                                        <div class="dow">SAT</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h6 fw-bold mb-1">
                                        San Diego Local Food Festival
                                    </h2>
                                    <div class="event-meta mb-1">
                                        Liberty Station · 11:00 AM - 7:00 PM
                                    </div>
                                    <p class="small text-muted mb-1">
                                        Sample bites from local restaurants, food trucks, and artisans with live music all day.
                                    </p>
                                    <div>
                                        <span class="event-tag-pill">Food &amp; Drink</span>
                                        <span class="event-tag-pill">Family Friendly</span>
                                        <span class="event-tag-pill">Outdoor</span>
                                    </div>
                                </div>
                                <div class="col-md-3 small text-muted">
                                    <div class="mb-1">
                                        👥 Hosted by: SD Eats
                                    </div>
                                    <div class="mb-1">
                                        💵 Tickets: From $15
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            View Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Event 4 --}}
                    <div class="col-12">
                        <div class="event-card-main">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="event-date-badge">
                                        <div class="month">MAY</div>
                                        <div class="day">03</div>
                                        <div class="dow">FRI</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h6 fw-bold mb-1">
                                        Sunset Rooftop Happy Hour
                                    </h2>
                                    <div class="event-meta mb-1">
                                        Downtown Rooftop Lounge · 5:30 PM - 8:30 PM
                                    </div>
                                    <p class="small text-muted mb-1">
                                        Relax after work with panoramic views, live DJ, and specialty cocktails.
                                    </p>
                                    <div>
                                        <span class="event-tag-pill">Social</span>
                                        <span class="event-tag-pill">Networking</span>
                                        <span class="event-tag-pill">21+</span>
                                    </div>
                                </div>
                                <div class="col-md-3 small text-muted">
                                    <div class="mb-1">
                                        👥 Hosted by: Skyline Social
                                    </div>
                                    <div class="mb-1">
                                        💵 Tickets: Free with RSVP
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            View Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Pagination (static) --}}
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            <li class="page-item active"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            {{-- RIGHT: Sidebar (calendar + highlights) --}}
            <div class="col-lg-4">



                {{-- Featured Today / This Week --}}
                <div class="event-calendar-card mb-3">
                    <div class="section-label mb-2">Featured This Week</div>

                    <div class="event-mini-card">
                        <strong>Startup Pitch Night</strong>
                        <span>Thu · 7:00 PM · Downtown Co-working Loft</span>
                        <span class="text-muted">Business &amp; Networking</span>
                    </div>

                    <div class="event-mini-card">
                        <strong>Family Outdoor Movie Night</strong>
                        <span>Fri · 8:30 PM · Balboa Park</span>
                        <span class="text-muted">Family &amp; Kids</span>
                    </div>

                    <div class="event-mini-card mb-0">
                        <strong>Art Walk &amp; Wine Tasting</strong>
                        <span>Sun · 2:00 PM · Little Italy</span>
                        <span class="text-muted">Arts &amp; Culture</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
