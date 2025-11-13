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
        <div class="categories-hero-card">
            <div class="row g-3 align-items-center">
                <div class="col-md-7">
                    <h1 class="h4 fw-bold mb-1">Browse Categories</h1>
                    <p class="small mb-0 text-muted">
                        Discover local businesses across San Diego by category and subcategory.
                        From restaurants and real estate to health, services, and more.
                    </p>
                </div>
                <div class="col-md-5 mt-3 mt-md-0">
                    <form>
                        <div class="input-group input-group-sm">
                            <input type="text"
                                   class="form-control"
                                   placeholder="Search categories (e.g. Restaurants, Fitness, Plumbing)">
                            <button class="btn btn-primary" type="submit">
                                Search
                            </button>
                        </div>
                        <div class="form-text small mt-1">
                            Tip: You can also search by subcategory (e.g. &quot;lawyers&quot;, &quot;coffee&quot;).
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- ALPHABET FILTER (purely visual for now) --}}
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="category-section-heading">
                All Categories
            </div>
            <div class="alphabet-filter d-none d-md-flex flex-wrap gap-1">
                <button type="button" class="btn btn-sm btn-outline-secondary active">All</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">A</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">B</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">C</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">D</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">E</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">F</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">G</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">H</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">I</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">J</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">K</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">L</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">M</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">N</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">O</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">P</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Q</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">R</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">S</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">T</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">U</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">V</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">W</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">X</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Y</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Z</button>
            </div>
        </div>
    </div>

    {{-- CATEGORY GRID (fully static) --}}
    <div class="row g-4 mt-2">

        {{-- Restaurants --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🍽️</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Restaurants</h2>
                            <div class="category-meta">128 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Local favorites, fine dining, and casual eats.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Cafés</span>
                        <span class="category-sub-pill">Fine Dining</span>
                        <span class="category-sub-pill">Family Style</span>
                        <span class="category-sub-pill">Takeout</span>
                        <span class="category-sub-pill">Brunch</span>
                        <span class="category-sub-pill">+4 more</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Coffee & Tea --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">☕</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Coffee &amp; Tea</h2>
                            <div class="category-meta">54 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Neighborhood cafés and specialty roasters.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Coffee Shops</span>
                        <span class="category-sub-pill">Tea Rooms</span>
                        <span class="category-sub-pill">Bakeries</span>
                        <span class="category-sub-pill">Desserts</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Real Estate --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🏠</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Real Estate</h2>
                            <div class="category-meta">89 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Buy, sell, or rent with trusted local experts.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Agents</span>
                        <span class="category-sub-pill">Property Management</span>
                        <span class="category-sub-pill">Mortgage Brokers</span>
                        <span class="category-sub-pill">Home Inspectors</span>
                        <span class="category-sub-pill">Title Companies</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Home Services --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🛠️</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Home Services</h2>
                            <div class="category-meta">112 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Everything you need to maintain and improve your home.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Plumbers</span>
                        <span class="category-sub-pill">Electricians</span>
                        <span class="category-sub-pill">Roofing</span>
                        <span class="category-sub-pill">Landscaping</span>
                        <span class="category-sub-pill">Cleaning Services</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Health & Fitness --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🏋️</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Health &amp; Fitness</h2>
                            <div class="category-meta">76 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Stay active and healthy with local gyms and studios.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Gyms</span>
                        <span class="category-sub-pill">Yoga Studios</span>
                        <span class="category-sub-pill">Pilates</span>
                        <span class="category-sub-pill">Personal Trainers</span>
                        <span class="category-sub-pill">CrossFit</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Medical & Wellness --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🩺</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Medical &amp; Wellness</h2>
                            <div class="category-meta">65 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Clinics, specialists, and wellness centers near you.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Family Doctors</span>
                        <span class="category-sub-pill">Dentists</span>
                        <span class="category-sub-pill">Chiropractors</span>
                        <span class="category-sub-pill">Therapists</span>
                        <span class="category-sub-pill">Massage</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Professional Services --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">💼</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Professional Services</h2>
                            <div class="category-meta">94 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Legal, financial, and consulting services for individuals and businesses.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Lawyers</span>
                        <span class="category-sub-pill">Accountants</span>
                        <span class="category-sub-pill">Consultants</span>
                        <span class="category-sub-pill">Marketing Agencies</span>
                        <span class="category-sub-pill">IT Services</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Local Shops --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🛍️</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Local Shops</h2>
                            <div class="category-meta">72 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Support local boutiques, markets, and specialty stores.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Boutiques</span>
                        <span class="category-sub-pill">Gift Shops</span>
                        <span class="category-sub-pill">Markets</span>
                        <span class="category-sub-pill">Bookstores</span>
                        <span class="category-sub-pill">Vintage</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Beauty & Personal Care --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">💇‍♀️</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Beauty &amp; Personal Care</h2>
                            <div class="category-meta">58 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Salons, barbers, spas, and beauty services.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Hair Salons</span>
                        <span class="category-sub-pill">Barbers</span>
                        <span class="category-sub-pill">Nail Salons</span>
                        <span class="category-sub-pill">Spas</span>
                        <span class="category-sub-pill">Makeup Artists</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Auto Services --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🚗</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Auto Services</h2>
                            <div class="category-meta">47 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Keep your car running smoothly with trusted auto pros.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Auto Repair</span>
                        <span class="category-sub-pill">Body Shops</span>
                        <span class="category-sub-pill">Car Wash</span>
                        <span class="category-sub-pill">Tire Shops</span>
                        <span class="category-sub-pill">Detailing</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Events & Entertainment --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🎉</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Events &amp; Entertainment</h2>
                            <div class="category-meta">39 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Venues, planners, and entertainment for any occasion.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Event Planners</span>
                        <span class="category-sub-pill">Venues</span>
                        <span class="category-sub-pill">Photographers</span>
                        <span class="category-sub-pill">DJs</span>
                        <span class="category-sub-pill">Caterers</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Education & Learning --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">📚</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Education &amp; Learning</h2>
                            <div class="category-meta">33 businesses</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Schools, tutors, and learning centers for all ages.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Tutoring</span>
                        <span class="category-sub-pill">Language Schools</span>
                        <span class="category-sub-pill">Music Lessons</span>
                        <span class="category-sub-pill">Test Prep</span>
                        <span class="category-sub-pill">Childcare</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Nonprofits & Community --}}
        <div class="col-6 col-md-4 col-lg-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="category-grid-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="category-icon-badge">🤝</div>
                        <div class="flex-grow-1">
                            <h2 class="h6 fw-bold mb-0">Nonprofits &amp; Community</h2>
                            <div class="category-meta">21 organizations</div>
                        </div>
                    </div>

                    <p class="small mb-2 text-muted">
                        Local organizations making a difference in San Diego.
                    </p>

                    <div class="mb-1">
                        <span class="category-sub-pill">Charities</span>
                        <span class="category-sub-pill">Community Centers</span>
                        <span class="category-sub-pill">Youth Programs</span>
                        <span class="category-sub-pill">Religious Centers</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
