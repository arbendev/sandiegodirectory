@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        {{-- HERO / INTRO --}}
        <section class="categories-hero">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <h1 class="h4 fw-bold mb-1">Browse Categories</h1>
                        <p class="small mb-0 text-muted">
                            Discover local businesses across San Diego by category and subcategory.
                            From restaurants and real estate to health, services, and more.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- CATEGORY GRID (fully static) --}}
        <div class="row g-4 mt-2">

            {{-- Restaurants --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="/category/" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🍽️</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Restaurants</h2>
                                <div class="meta-text">128 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Local favorites, fine dining, and casual eats.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Cafés</span>
                            <span class="pill">Fine Dining</span>
                            <span class="pill">Family Style</span>
                            <span class="pill">Takeout</span>
                            <span class="pill">Brunch</span>
                            <span class="pill">+4 more</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Coffee & Tea --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">☕</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Coffee &amp; Tea</h2>
                                <div class="meta-text">54 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Neighborhood cafés and specialty roasters.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Coffee Shops</span>
                            <span class="pill">Tea Rooms</span>
                            <span class="pill">Bakeries</span>
                            <span class="pill">Desserts</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Real Estate --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🏠</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Real Estate</h2>
                                <div class="meta-text">89 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Buy, sell, or rent with trusted local experts.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Agents</span>
                            <span class="pill">Property Management</span>
                            <span class="pill">Mortgage Brokers</span>
                            <span class="pill">Home Inspectors</span>
                            <span class="pill">Title Companies</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Home Services --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🛠️</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Home Services</h2>
                                <div class="meta-text">112 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Everything you need to maintain and improve your home.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Plumbers</span>
                            <span class="pill">Electricians</span>
                            <span class="pill">Roofing</span>
                            <span class="pill">Landscaping</span>
                            <span class="pill">Cleaning Services</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Health & Fitness --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🏋️</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Health &amp; Fitness</h2>
                                <div class="meta-text">76 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Stay active and healthy with local gyms and studios.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Gyms</span>
                            <span class="pill">Yoga Studios</span>
                            <span class="pill">Pilates</span>
                            <span class="pill">Personal Trainers</span>
                            <span class="pill">CrossFit</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Medical & Wellness --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🩺</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Medical &amp; Wellness</h2>
                                <div class="meta-text">65 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Clinics, specialists, and wellness centers near you.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Family Doctors</span>
                            <span class="pill">Dentists</span>
                            <span class="pill">Chiropractors</span>
                            <span class="pill">Therapists</span>
                            <span class="pill">Massage</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Professional Services --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">💼</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Professional Services</h2>
                                <div class="meta-text">94 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Legal, financial, and consulting services for individuals and businesses.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Lawyers</span>
                            <span class="pill">Accountants</span>
                            <span class="pill">Consultants</span>
                            <span class="pill">Marketing Agencies</span>
                            <span class="pill">IT Services</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Local Shops --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🛍️</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Local Shops</h2>
                                <div class="meta-text">72 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Support local boutiques, markets, and specialty stores.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Boutiques</span>
                            <span class="pill">Gift Shops</span>
                            <span class="pill">Markets</span>
                            <span class="pill">Bookstores</span>
                            <span class="pill">Vintage</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Beauty & Personal Care --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">💇‍♀️</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Beauty &amp; Personal Care</h2>
                                <div class="meta-text">58 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Salons, barbers, spas, and beauty services.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Hair Salons</span>
                            <span class="pill">Barbers</span>
                            <span class="pill">Nail Salons</span>
                            <span class="pill">Spas</span>
                            <span class="pill">Makeup Artists</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Auto Services --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🚗</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Auto Services</h2>
                                <div class="meta-text">47 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Keep your car running smoothly with trusted auto pros.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Auto Repair</span>
                            <span class="pill">Body Shops</span>
                            <span class="pill">Car Wash</span>
                            <span class="pill">Tire Shops</span>
                            <span class="pill">Detailing</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Events & Entertainment --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🎉</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Events &amp; Entertainment</h2>
                                <div class="meta-text">39 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Venues, planners, and entertainment for any occasion.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Event Planners</span>
                            <span class="pill">Venues</span>
                            <span class="pill">Photographers</span>
                            <span class="pill">DJs</span>
                            <span class="pill">Caterers</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Education & Learning --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">📚</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Education &amp; Learning</h2>
                                <div class="meta-text">33 businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Schools, tutors, and learning centers for all ages.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Tutoring</span>
                            <span class="pill">Language Schools</span>
                            <span class="pill">Music Lessons</span>
                            <span class="pill">Test Prep</span>
                            <span class="pill">Childcare</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Nonprofits & Community --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">🤝</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">Nonprofits &amp; Community</h2>
                                <div class="meta-text">21 organizations</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            Local organizations making a difference in San Diego.
                        </p>

                        <div class="mb-1">
                            <span class="pill">Charities</span>
                            <span class="pill">Community Centers</span>
                            <span class="pill">Youth Programs</span>
                            <span class="pill">Religious Centers</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
@endsection
