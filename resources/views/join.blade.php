@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Businesses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Join the San Diego Directory</li>
            </ol>
        </nav>

        {{-- HERO / INTRO --}}
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-7">
                        <div class="mb-1">
                            <span class="badge-soft">📣 Grow your local presence</span>
                        </div>
                        <h1 class="h4 fw-bold mb-2">Join the San Diego Directory as a Featured Business</h1>
                        <p class="small mb-0 text-muted">
                            Add your business to the ultimate San Diego local directory. Get discovered by new customers,
                            highlight reviews, list events, and showcase everything that makes your business unique.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- JOIN FORM --}}
        <form method="POST" action="#">
            @csrf

            <div class="row g-4">

                {{-- LEFT: main form --}}
                <div class="col-lg-8">

                    {{-- Business information --}}
                    <div class="section-card">
                        <div class="section-label">Business information</div>
                        <p class="hint-text mb-3">
                            Tell us the basics about your business so people can find and recognize you.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-semibold">Business Name</label>
                                <input type="text" name="business_name" class="form-control form-control-sm"
                                    placeholder="e.g. Café Luna">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">Category</label>
                                <select name="category" class="form-select form-select-sm">
                                    <option selected disabled>Select category</option>
                                    <option>Restaurants</option>
                                    <option>Coffee &amp; Tea</option>
                                    <option>Health &amp; Fitness</option>
                                    <option>Real Estate</option>
                                    <option>Professional Services</option>
                                    <option>Local Shops</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Street Address</label>
                                <input type="text" name="address" class="form-control form-control-sm"
                                    placeholder="Street and number">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">City</label>
                                <input type="text" name="city" class="form-control form-control-sm" value="San Diego">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">ZIP Code</label>
                                <input type="text" name="zip" class="form-control form-control-sm"
                                    placeholder="e.g. 92101">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Website (optional)</label>
                                <input type="url" name="website" class="form-control form-control-sm"
                                    placeholder="https://example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control form-control-sm"
                                    placeholder="(555) 123-4567">
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Business Description</label>
                                <textarea name="description" rows="4" class="form-control form-control-sm"
                                    placeholder="Tell customers what you offer, what makes your business special, and any key details they should know."></textarea>
                                <div class="hint-text mt-1">
                                    A clear description helps you stand out and improves your visibility.
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact & account --}}
                    <div class="section-card">
                        <div class="section-label">Account & contact person</div>
                        <p class="hint-text mb-3">
                            This information is used to manage your listing. It won'’'t be publicly displayed unless you
                            choose.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Contact Name</label>
                                <input type="text" name="contact_name" class="form-control form-control-sm"
                                    placeholder="Your full name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Contact Email</label>
                                <input type="email" name="contact_email" class="form-control form-control-sm"
                                    placeholder="you@business.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Create Password</label>
                                <input type="password" name="password" class="form-control form-control-sm"
                                    placeholder="Min. 8 characters">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-sm"
                                    placeholder="Re-type password">
                            </div>

                        </div>
                    </div>

                </div>

                {{-- RIGHT: plans & payment --}}
                <div class="col-lg-4">

                    {{-- Plan selection --}}
                    <div class="section-card">
                        <div class="section-label">Choose your plan</div>
                        <p class="hint-text mb-3">
                            Start with a simple monthly plan. You can upgrade or cancel anytime.
                        </p>

                        <div class="plan-card featured mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="fw-semibold">Featured Listing</div>
                                <span class="pill active">Most Popular</span>
                            </div>
                            <div class="plan-price mb-1">
                                $29 <span class="small text-muted">/ month</span>
                            </div>
                            <ul class="small mb-2">
                                <li>Priority placement in search results</li>
                                <li>Photos, events, and special offers</li>
                                <li>Reviews and rating highlights</li>
                                <li>Direct website and call-to-action buttons</li>
                            </ul>
                            <div class="form-check small">
                                <input class="form-check-input" type="radio" name="plan" id="plan_featured"
                                    checked>
                                <label class="form-check-label" for="plan_featured">
                                    Select Featured Listing
                                </label>
                            </div>
                        </div>

                        <div class="plan-card mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="fw-semibold">Basic Listing</div>
                            </div>
                            <div class="plan-price mb-1">
                                $0 <span class="small text-muted">/ month</span>
                            </div>
                            <ul class="small mb-2">
                                <li>Standard search placement</li>
                                <li>Business name, address, and phone</li>
                                <li>One category and short description</li>
                            </ul>
                            <div class="form-check small">
                                <input class="form-check-input" type="radio" name="plan" id="plan_basic">
                                <label class="form-check-label" for="plan_basic">
                                    Select Basic Listing
                                </label>
                            </div>
                        </div>

                        <div class="hint-text">
                            Paid plans renew automatically each month. You can cancel anytime from your dashboard.
                        </div>
                    </div>

                    {{-- Payment section --}}
                    <div class="section-card">
                        <div class="section-label">Payment details</div>

                        <div class="payment-summary mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Selected plan</span>
                                <span class="fw-semibold">Featured Listing</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Monthly total</span>
                                <span class="fw-semibold">$29.00</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Today’s charge</span>
                                <span class="fw-semibold">$29.00</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="meta-text mb-1">Card information</div>
                            <div class="payment-box">
                                <!-- Payment gateway card element will go here -->
                                <span class="hint-text">Card number, expiry, CVC</span>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="meta-text mb-1">Name on card</div>
                                <input type="text" name="card_name" class="form-control form-control-sm"
                                    placeholder="Full name">
                            </div>
                            <div class="col-6">
                                <div class="meta-text mb-1">ZIP / Postal code</div>
                                <input type="text" name="card_zip" class="form-control form-control-sm"
                                    placeholder="e.g. 92101">
                            </div>
                        </div>

                        <div class="form-check small mb-2">
                            <input class="form-check-input" type="checkbox" value="1" id="agree_terms">
                            <label class="form-check-label" for="agree_terms">
                                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a>
                                and <a href="#" class="text-decoration-none">Billing Policy</a>.
                            </label>
                        </div>

                        <div class="secure-text mb-2">
                            🔒 Payments are processed securely. Your card details are never stored on the San Diego
                            Directory servers.
                        </div>

                        <button href="/join-success/" class="btn btn-primary w-100">
                            Complete Signup &amp; Pay
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </div>
@endsection
