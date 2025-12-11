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
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-7">
                        <h1 class="h4 fw-bold mb-2">Discover What's Happening Around San Diego</h1>
                        <p class="small mb-3 text-muted">
                            Business meetups, local festivals, live music, workshops, and more.
                            Find events by date, category, and neighborhood.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section>
            <div class="row g-4">
                {{-- LEFT: Event list --}}
                <div class="col-lg-12">
                    <div class="row g-3">

                        {{-- Event 1 --}}
                        <div class="col-12">
                            <div class="hover-card">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="date-badge">
                                            <div class="month">APR</div>
                                            <div class="day">13</div>
                                            <div class="dow">SAT</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="h6 fw-bold mb-1">
                                            San Diego Business Networking Mixer
                                        </h2>
                                        <div class="meta-text mb-1">
                                            San Diego Convention Center · 6:00 PM - 9:00 PM
                                        </div>
                                        <p class="small text-muted mb-1">
                                            Connect with entrepreneurs, founders, and local professionals over drinks and
                                            light bites.
                                        </p>
                                        <div>
                                            <span class="pill">Business &amp; Networking</span>
                                            <span class="pill">Free Registration</span>
                                            <span class="pill">Indoor</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 small text-muted">
                                        <div class="mb-1">
                                            👥 Hosted by: SD Business Hub
                                        </div>
                                        <div class="mb-1">
                                            💵 Tickets: Free · RSVP required
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Event 2 --}}
                        <div class="col-12">
                            <div class="hover-card">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="date-badge">
                                            <div class="month">APR</div>
                                            <div class="day">22</div>
                                            <div class="dow">MON</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="h6 fw-bold mb-1">
                                            Small Business Growth Summit
                                        </h2>
                                        <div class="meta-text mb-1">
                                            Downtown Conference Center · 9:00 AM - 4:00 PM
                                        </div>
                                        <p class="small text-muted mb-1">
                                            A full-day summit with speakers, panels, and workshops for small business
                                            owners.
                                        </p>
                                        <div>
                                            <span class="pill">Business &amp; Networking</span>
                                            <span class="pill">Workshops</span>
                                            <span class="pill">Paid Event</span>
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
                                </div>
                            </div>
                        </div>

                        {{-- Event 3 --}}
                        <div class="col-12">
                            <div class="hover-card">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="date-badge">
                                            <div class="month">APR</div>
                                            <div class="day">27</div>
                                            <div class="dow">SAT</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="h6 fw-bold mb-1">
                                            San Diego Local Food Festival
                                        </h2>
                                        <div class="meta-text mb-1">
                                            Liberty Station · 11:00 AM - 7:00 PM
                                        </div>
                                        <p class="small text-muted mb-1">
                                            Sample bites from local restaurants, food trucks, and artisans with live music
                                            all day.
                                        </p>
                                        <div>
                                            <span class="pill">Food &amp; Drink</span>
                                            <span class="pill">Family Friendly</span>
                                            <span class="pill">Outdoor</span>
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
                                </div>
                            </div>
                        </div>

                        {{-- Event 4 --}}
                        <div class="col-12">
                            <div class="hover-card">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="date-badge">
                                            <div class="month">MAY</div>
                                            <div class="day">03</div>
                                            <div class="dow">FRI</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="h6 fw-bold mb-1">
                                            Sunset Rooftop Happy Hour
                                        </h2>
                                        <div class="meta-text mb-1">
                                            Downtown Rooftop Lounge · 5:30 PM - 8:30 PM
                                        </div>
                                        <p class="small text-muted mb-1">
                                            Relax after work with panoramic views, live DJ, and specialty cocktails.
                                        </p>
                                        <div>
                                            <span class="pill">Social</span>
                                            <span class="pill">Networking</span>
                                            <span class="pill">21+</span>
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

            </div>
        </section>

    </div>
@endsection
