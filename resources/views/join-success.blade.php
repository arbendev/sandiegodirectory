@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Businesses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Welcome</li>
        </ol>
    </nav>

    {{-- HERO / SUCCESS --}}
    <section class="mb-4">
        <div class="success-hero-card">
            <div class="row g-3 align-items-center">
                <div class="col-md-8 d-flex">
                    <div class="success-icon-circle">
                        ✓
                    </div>
                    <div>
                        <div class="mb-1">
                            <span class="success-badge">Welcome to the San Diego Directory</span>
                        </div>
                        <h1 class="h4 fw-bold mb-1">
                            Your business listing has been created!
                        </h1>
                        <p class="small mb-0 text-muted">
                            You're now part of the San Diego business community.  
                            Finish a few quick steps to make your listing shine and start attracting new customers.
                        </p>
                    </div>
                </div>
                {{-- 
                <div class="col-md-4 mt-2 mt-md-0 text-md-end">
                    <div class="hint-text mb-2">
                        Listing completeness
                    </div>
                    <div class="progress-bar-wrapper mb-1">
                        <div class="progress-bar-inner"></div>
                    </div>
                    <div class="small text-muted mb-2">
                        40% complete · Add photos and details to improve visibility.
                    </div>
                    <div class="d-flex justify-content-md-end gap-2">
                        <a href="#" class="btn btn-primary btn-sm">
                            Go to Dashboard
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            View My Listing
                        </a>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </section>

    {{-- NEXT STEPS + SUMMARY --}}
    <section>
        <div class="row g-4">

            {{-- LEFT: Next steps --}}
            <div class="col-lg-12">

                <div class="section-card">
                    <div class="section-label">Next steps</div>
                    <p class="hint-text mb-3">
                        Complete these steps to make the most of your San Diego Directory listing.
                    </p>

                    <div class="checklist-item">
                        <div class="checklist-icon done">✓</div>
                        <div>
                            <div class="fw-semibold small">Create your business profile</div>
                            <div class="small text-muted">
                                Basic details have been saved. You can edit them at any time from your dashboard.
                            </div>
                        </div>
                    </div>

                    <div class="checklist-item">
                        <div class="checklist-icon todo">1</div>
                        <div>
                            <div class="fw-semibold small">Add photos and logo</div>
                            <div class="small text-muted">
                                Upload your logo, interior/exterior shots, and any photos that show what you offer.
                            </div>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                Add photos
                            </a>
                        </div>
                    </div>

                    <div class="checklist-item">
                        <div class="checklist-icon todo">2</div>
                        <div>
                            <div class="fw-semibold small">Set hours and contact options</div>
                            <div class="small text-muted">
                                Let customers know when you're open and how to reach you.
                            </div>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                Set hours
                            </a>
                        </div>
                    </div>

                </div>

                {{-- Tips card --}}
                {{-- 
                <div class="section-card">
                    <div class="section-label">Tips to get more views</div>
                    <div class="mb-2">
                        <span class="action-pill">Complete your profile</span>
                        <span class="action-pill">Add 5+ photos</span>
                        <span class="action-pill">Use a clear tagline</span>
                        <span class="action-pill">Promote events</span>
                        <span class="action-pill">Ask for reviews</span>
                    </div>

                    <ul class="small mb-0">
                        <li>Businesses with photos receive significantly more views and engagement.</li>
                        <li>Clear business hours and contact info help customers decide faster.</li>
                        <li>Encourage happy customers to leave a review and share your SD Directory page.</li>
                    </ul>
                </div>

                 --}}
            </div>
           

            {{-- RIGHT: Plan + billing summary --}}
            {{-- 
            <div class="col-lg-4">

                <div class="section-card">
                    <div class="section-label">Plan & billing</div>

                    <div class="card-mini mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-semibold small">Featured Listing</div>
                                <div class="small text-muted">Monthly subscription</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-semibold">$29<span class="small">/mo</span></div>
                                <div class="small text-muted">Active</div>
                            </div>
                        </div>
                    </div>

                    <div class="small mb-1">
                        Next billing date: <strong>May 12, 2025</strong>
                    </div>
                    <div class="small text-muted mb-2">
                        You can update payment details, view invoices, or cancel your plan from the billing section in your dashboard.
                    </div>

                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Manage billing
                        </a>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                            Download receipt
                        </a>
                    </div>
                </div>
            
                <div class="section-card">
                    <div class="section-label">Listing snapshot</div>

                    <div class="small mb-2">
                        <div class="fw-semibold">Business name</div>
                        <div>Café Luna</div>
                    </div>

                    <div class="small mb-2">
                        <div class="fw-semibold">Category</div>
                        <div>Restaurants · Coffee &amp; Brunch</div>
                    </div>

                    <div class="small mb-2">
                        <div class="fw-semibold">Location</div>
                        <div>123 Market St, San Diego, CA 92101</div>
                    </div>

                    <div class="small mb-2">
                        <div class="fw-semibold">What customers will see</div>
                        <div class="tag-pill">Logo</div>
                        <div class="tag-pill">Photos</div>
                        <div class="tag-pill">Hours</div>
                        <div class="tag-pill">Phone &amp; Website</div>
                        <div class="tag-pill">Reviews (when added)</div>
                    </div>

                    <a href="#" class="btn btn-outline-secondary btn-sm w-100">
                        Preview my public listing
                    </a>
                </div>


            </div>
            --}}
        </div>
    </section>

</div>
@endsection
