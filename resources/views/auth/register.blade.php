@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
        <form method="POST" action="{{ route('register') }}">
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
                                <input type="text" name="business_name" class="form-control form-control-sm @error('business_name') is-invalid @enderror"
                                    placeholder="e.g. Café Luna" value="{{ old('business_name') }}">
                                @error('business_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">Category</label>
                                <select name="category_id" class="form-select form-select-sm @error('category_id') is-invalid @enderror">
                                    <option selected disabled value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->icon }} {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Street Address</label>
                                <input type="text" name="address" class="form-control form-control-sm @error('address') is-invalid @enderror"
                                    placeholder="Street and number" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">City</label>
                                <input type="text" name="city" class="form-control form-control-sm @error('city') is-invalid @enderror" value="{{ old('city', 'San Diego') }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">ZIP Code</label>
                                <input type="text" name="zip" class="form-control form-control-sm @error('zip') is-invalid @enderror"
                                    placeholder="e.g. 92101" value="{{ old('zip') }}">
                                @error('zip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Website (optional)</label>
                                <input type="url" name="website" class="form-control form-control-sm @error('website') is-invalid @enderror"
                                    placeholder="https://example.com" value="{{ old('website') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                    placeholder="(555) 123-4567" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Business Description</label>
                                <textarea name="description" rows="4" class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Tell customers what you offer, what makes your business special, and any key details they should know.">{{ old('description') }}</textarea>
                                <div class="hint-text mt-1">
                                    A clear description helps you stand out and improves your visibility.
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Contact & account --}}
                    <div class="section-card">
                        <div class="section-label">Account & contact person</div>
                        <p class="hint-text mb-3">
                            This information is used to manage your listing. It won't be publicly displayed unless you
                            choose.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Contact Name</label>
                                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    placeholder="Your full name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Contact Email</label>
                                <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    placeholder="you@business.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Create Password</label>
                                <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    placeholder="Min. 8 characters">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-sm"
                                    placeholder="Re-type password">
                            </div>

                        </div>
                    </div>

                </div>

                {{-- RIGHT: plans --}}
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
                                <input class="form-check-input" type="radio" name="plan" id="plan_featured" value="featured"
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
                                <input class="form-check-input" type="radio" name="plan" id="plan_basic" value="basic">
                                <label class="form-check-label" for="plan_basic">
                                    Select Basic Listing
                                </label>
                            </div>
                        </div>

                        <div class="hint-text">
                            Paid plans renew automatically each month. You can cancel anytime from your dashboard.
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary w-100">
                                Complete Signup
                            </button>
                            <p class="text-center small text-muted mb-0">
                                By clicking "Complete Signup", you agree to our <a href="#">Terms of Service</a>.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>
@endsection
