@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb small mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Join</li>
        </ol>
    </nav>

    @if(!request('type'))
        {{-- SELECTION SCREEN --}}
        <div class="row justify-content-center py-5">
            <div class="col-md-8 text-center">
                <h2 class="fw-bold mb-4">How would you like to join?</h2>
                <div class="row g-4">
                    {{-- User Option --}}
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 p-4 hover-lift">
                            <div class="card-body">
                                <div class="mb-3 text-primary">
                                    <i class="bi bi-person-circle display-4"></i>
                                </div>
                                <h4 class="fw-bold">Regular User</h4>
                                <p class="text-muted small">
                                    Join to write reviews, save your favorite places, and connect with the community.
                                </p>
                                <a href="{{ route('register', ['type' => 'user']) }}" class="btn btn-outline-primary w-100 stretched-link">Join as User</a>
                            </div>
                        </div>
                    </div>

                    {{-- Business Option --}}
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 p-4 hover-lift">
                            <div class="card-body">
                                <div class="mb-3 text-warning">
                                    <i class="bi bi-shop display-4"></i>
                                </div>
                                <h4 class="fw-bold">Business Owner</h4>
                                <p class="text-muted small">
                                    List your business, manage your profile, promote events, and respond to reviews.
                                </p>
                                <a href="{{ route('register', ['type' => 'business']) }}" class="btn btn-primary w-100 stretched-link">Register Business</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif(request('type') == 'user')
        {{-- USER REGISTRATION FORM --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="role" value="user">
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="section-card shadow-sm p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Create your account</h2>
                            <p class="text-muted small">Join San Diego Directory to review businesses, save favorites, and list your own business.</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="e.g. John Doe" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="you@example.com" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Min. 8 characters" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Re-type password" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            Join Now
                        </button>

                        <div class="text-center small">
                            Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a>
                        </div>
                        <div class="text-center small mt-2">
                             <a href="{{ route('register') }}" class="text-muted">Back to selection</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    @elseif(request('type') == 'business')
        {{-- BUSINESS REGISTRATION FORM --}}
        
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-7">
                        <div class="mb-1">
                            <span class="badge-soft">📣 Grow your local presence</span>
                        </div>
                        <h1 class="h4 fw-bold mb-2">Join as a Featured Business</h1>
                        <p class="small mb-0 text-muted">
                            Add your business to the ultimate San Diego local directory.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="role" value="business_owner">
            
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
                                    placeholder="Tell customers what you offer.">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Contact & account --}}
                    <div class="section-card">
                        <div class="section-label">Account & contact person</div>
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
                    <div class="section-card">
                        <div class="section-label">Choose your plan</div>

                        <div class="plan-card featured mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="fw-semibold">Basic Listing</div>
                            </div>
                            <div class="plan-price mb-1">$0 <span class="small text-muted">/ month</span></div>
                             <div class="form-check small">
                                <input class="form-check-input" type="radio" name="plan" id="plan_basic" value="basic" checked>
                                <label class="form-check-label" for="plan_basic">Select Basic</label>
                            </div>
                        </div>

                        <div class="plan-card mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="fw-semibold">Featured Listing</div>
                                <span class="pill active">Most Popular</span>
                            </div>
                            <div class="plan-price mb-1">$29 <span class="small text-muted">/ month</span></div>
                            <ul class="small mb-2">
                                <li>Priority placement</li>
                                <li>Photos & Events</li>
                            </ul>
                            <div class="form-check small">
                                <input class="form-check-input" type="radio" name="plan" id="plan_featured" value="featured">
                                <label class="form-check-label" for="plan_featured">Select Featured</label>
                            </div>
                        </div>

                    </div>
                    <div class="section-card">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary w-100">Complete Signup</button>
                            <a href="{{ route('register') }}" class="btn btn-sm text-muted">Back to selection</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
