@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Business Dashboard</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="dash-hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <h1 class="h4 fw-bold mb-1">
                            Welcome back, Café Luna
                        </h1>
                        <p class="small mb-0 text-muted">
                            Use the quick actions to keep your profile fresh and engaging.
                        </p>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0 text-md-end">
                        {{-- 
                    <div class="hint-text mb-1">
                        Listing completeness
                    </div>
                    <div class="progress-wrapper mb-1">
                        <div class="progress-inner"></div>
                    </div>
                    <div class="small text-muted mb-2">
                        60% complete · Add photos and details to unlock full visibility.
                    </div>
                    --}}
                        <div class="d-flex justify-content-md-end gap-2">
                            <a href="#" class="btn btn-primary btn-sm">
                                View Public Listing
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                Edit Listing
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- TOP STATS --}}
        {{-- 
    <section class="mb-3">
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="dash-stat-card">
                    <div class="dash-stat-label">Views (last 30 days)</div>
                    <div class="dash-stat-value">1,248</div>
                    <div class="dash-stat-sub">+18% vs previous 30 days</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="dash-stat-card">
                    <div class="dash-stat-label">Website clicks</div>
                    <div class="dash-stat-value">312</div>
                    <div class="dash-stat-sub">25% of viewers clicked through</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="dash-stat-card">
                    <div class="dash-stat-label">Calls from listing</div>
                    <div class="dash-stat-value">96</div>
                    <div class="dash-stat-sub">Avg. 3-4 calls per day</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="dash-stat-card">
                    <div class="dash-stat-label">Customer reviews</div>
                    <div class="dash-stat-value">4.8</div>
                    <div class="dash-stat-sub">38 total reviews · 5 new this month</div>
                </div>
            </div>
        </div>
    </section>
    --}}

        {{-- MAIN GRID --}}
        <section>
            <div class="row g-4">

                {{-- LEFT COLUMN --}}
                <div class="col-lg-8">

                    {{-- Checklist --}}
                    <div class="section-card">
                        <div class="section-label">Get your listing to 100%</div>
                        <p class="hint-text mb-3">
                            Complete these items to improve your ranking and help customers choose you faster.
                        </p>

                        <div class="checklist-item">
                            <div class="checklist-icon done">✓</div>
                            <div>
                                <div class="fw-semibold small">Add basic business information</div>
                                <div class="small text-muted">
                                    Name, category, address, and contact details are set.
                                </div>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="checklist-icon todo">2</div>
                            <div>
                                <div class="fw-semibold small">Upload a logo and cover photo</div>
                                <div class="small text-muted">
                                    Profiles with a recognizable logo and strong photos receive more clicks.
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                    Add photos
                                </a>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="checklist-icon todo">3</div>
                            <div>
                                <div class="fw-semibold small">Set business hours</div>
                                <div class="small text-muted">
                                    Let customers know when you're open so they can plan their visit.
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                    Set hours
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- RIGHT COLUMN --}}
                <div class="col-lg-4">

                    {{-- Quick actions --}}
                    <div class="section-card">
                        <div class="section-label">Quick actions</div>
                        <p class="hint-text mb-2">
                            Common tasks you'll do most often.
                        </p>
                        <div class="mb-2">
                            <a href="#" class="quick-link-pill">
                                ✏️ <span>Edit listing</span>
                            </a>
                            <a href="#" class="quick-link-pill">
                                🖼️ <span>Manage photos</span>
                            </a>
                            <a href="#" class="quick-link-pill">
                                💳 <span>Manage billing</span>
                            </a>
                        </div>
                    </div>

                    {{-- Recent reviews --}}
                    {{-- 
                <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <div class="section-label mb-0">Recent reviews</div>
                            <div class="hint-text">
                                See what customers are saying about your business.
                            </div>
                        </div>
                        <a href="#" class="small text-decoration-none">View all</a>
                    </div>

                    <div class="review-card">
                        <div class="d-flex justify-content-between">
                            <div class="fw-semibold small">Sarah M.</div>
                            <div class="review-stars">★★★★★</div>
                        </div>
                        <div class="small text-muted mb-1">
                            2 days ago · Visited for brunch
                        </div>
                        <div class="small">
                            “Amazing coffee and such a cozy atmosphere. The staff were incredibly friendly and welcoming.”
                        </div>
                    </div>

                    <div class="review-card">
                        <div class="d-flex justify-content-between">
                            <div class="fw-semibold small">James K.</div>
                            <div class="review-stars">★★★★☆</div>
                        </div>
                        <div class="small text-muted mb-1">
                            1 week ago · Takeout
                        </div>
                        <div class="small">
                            “Food was delicious and ready on time. A bit busy on weekends, but totally worth it.”
                        </div>
                    </div>

                    <div class="review-card mb-0">
                        <div class="d-flex justify-content-between">
                            <div class="fw-semibold small">Lauren P.</div>
                            <div class="review-stars">★★★★★</div>
                        </div>
                        <div class="small text-muted mb-1">
                            2 weeks ago · Coffee & snack
                        </div>
                        <div class="small">
                            “My go-to spot for a quiet workspace and great lattes. Highly recommend.”
                        </div>
                    </div>
                </div>
                --}}

                </div>
            </div>
        </section>

    </div>
@endsection
