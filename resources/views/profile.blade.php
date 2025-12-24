@extends('layouts.app')

@section('title', $business->title . ' - San Diego Directory')
@section('meta_description', Str::limit($business->description, 160))
@section('meta_keywords', $business->title . ', ' . ($business->category->name ?? '') . ', San Diego, ' . $business->city)

@section('content')
    <div class="container py-4">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Businesses</a></li>
                @if($business->category)
                    <li class="breadcrumb-item">
                        <a href="{{ route('categories.show', $business->category->slug) }}">{{ $business->category->name }}</a>
                    </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $business->title }}
                </li>
            </ol>
        </nav>

        {{-- HERO CARD --}}
        <div class="hero-card mb-4 p-0 position-relative d-flex align-items-end"
            style="min-height: 320px; background-image: url('{{ $business->cover_image_path ? asset('storage/' . $business->cover_image_path) : 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=1600&q=80' }}'); background-size: cover; background-position: center;">
            
            {{-- Dark Overlay --}}
            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.1)); border-radius: 18px;"></div>

            <div class="p-4 w-100 position-relative text-white">
                <div class="row align-items-end">
                    <div class="col-md-8 d-flex align-items-center">
                        <img src="{{ $business->logo_path ? asset('storage/' . $business->logo_path) : 'https://via.placeholder.com/120x120?text=Logo' }}"
                            class="business-logo me-3 me-md-4" alt="{{ $business->title }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 12px; border: 2px solid white;">

                        <div class="text-white">
                            <div class="mb-1">
                                @if ($business->category)
                                    <span class="badge bg-white text-dark me-2">
                                        {{ $business->category->name }}
                                    </span>
                                @endif
                                @if ($business->state)
                                    <span class="badge bg-white text-dark opacity-75">
                                        {{ $business->city }}, {{ $business->state }}
                                    </span>
                                @endif
                            </div>
                            <h1 class="h3 fw-bold mb-1">
                                {{ $business->title }}
                            </h1>
                            
                            @if($business->tagline)
                            <div class="text-white-75 mb-2">
                                {{ $business->tagline }}
                            </div>
                            @endif

                            <div class="d-flex flex-wrap align-items-center small">
                                <span class="rating-stars me-1 text-warning">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= round($business->average_rating)) ★ @else ☆ @endif
                                    @endfor
                                </span>
                                <span>{{ number_format($business->average_rating, 1) }}</span>
                                <span class="ms-1 text-white-50">
                                    ({{ $business->reviews->count() }} reviews)
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3 mt-md-0 text-md-end text-white">
                        <div class="mb-2 small text-white-75">
                            {{ $business->address ?? 'Address not set' }}
                        </div>
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                            @if ($business->phone)
                                <a href="tel:{{ $business->phone }}" class="btn btn-light btn-sm">
                                    Call
                                </a>
                            @endif

                            @if ($business->website)
                                <a href="{{ $business->website }}" target="_blank" class="btn btn-primary btn-sm">
                                    Visit Website
                                </a>
                            @endif
                        </div>
                         
                         @php
                            $socials = json_decode($business->social_links, true) ?? [];
                         @endphp
                         <div class="d-flex gap-2 justify-content-md-end mt-2">
                             @if(!empty($socials['facebook']))
                                <a href="{{ $socials['facebook'] }}" target="_blank" class="text-white"><i class="bi bi-facebook"></i> Facebook</a>
                             @endif
                             @if(!empty($socials['instagram']))
                                <a href="{{ $socials['instagram'] }}" target="_blank" class="text-white"><i class="bi bi-instagram"></i> Instagram</a>
                             @endif
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
                <div class="section-card mb-3">
                    <h5 class="fw-bold mb-2">About</h5>
                    <p class="mb-0" style="white-space: pre-line;">
                        {{ $business->description }}
                    </p>
                </div>

                {{-- Highlights / Tags (Placeholder for now as amenities column exists but might be empty) --}}
                {{-- 
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Highlights</h6>
                    <span class="pill">Locally Owned</span>
                    <span class="pill">Family-friendly</span>
                </div>
                --}}

                {{-- Photos --}}
                @if($business->images->count() > 0)
                <div class="section-card mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold mb-0">Photos</h6>
                    </div>

                    <div class="row g-2">
                        @foreach ($business->images as $image)
                            <div class="col-4 col-sm-3">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Gallery Photo" class="img-fluid rounded" style="width:100%; height:150px; object-fit:cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Reviews --}}
                <div class="section-card mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0">Customer Reviews</h6>
                        <span class="badge bg-light text-dark border">{{ $business->reviews->count() }} Reviews</span>
                    </div>

                    @foreach($business->reviews as $review)
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="d-flex justify-content-between mb-1">
                                <div class="fw-bold small">{{ $review->user->name ?? 'User' }}</div>
                                <div class="text-warning small">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= $review->rating) ★ @else ☆ @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="small text-muted mb-2">
                                {{ $review->created_at->diffForHumans() }}
                            </div>
                            <p class="small mb-0">{{ $review->comment }}</p>
                        </div>
                    @endforeach

                    @if($business->reviews->isEmpty())
                        <p class="small text-muted mb-3">No reviews yet. Be the first to review!</p>
                    @endif

                    {{-- Write a Review Form --}}
                    @auth
                        @if(!$business->reviews->where('user_id', auth()->id())->first())
                        <div class="mt-4 p-3 bg-light rounded">
                            <h6 class="fw-bold x-small mb-2">Write a Review</h6>
                            <form action="{{ route('reviews.store', $business->id) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label small">Rating</label>
                                    <div class="rating-input">
                                        <select name="rating" class="form-select form-select-sm" style="width: 100px;">
                                            <option value="5">5 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="2">2 Stars</option>
                                            <option value="1">1 Star</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <textarea name="comment" class="form-control form-control-sm" rows="3" placeholder="Share your experience..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit Review</button>
                            </form>
                        </div>
                        @else
                        <div class="mt-3 p-2 bg-light rounded text-center small text-muted">
                            You have already reviewed this business.
                        </div>
                        @endif
                    @else
                        <div class="mt-3 p-3 bg-light rounded text-center">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Log in to leave a review</a>
                        </div>
                    @endauth
                </div>
            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="col-lg-4">
                {{-- Contact Info --}}
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-3">Contact & Details</h6>

                    <div class="small mb-2">
                        <div class="fw-semibold">Address</div>
                        <div>{{ $business->address }}</div>
                        <div>{{ $business->city }}, {{ $business->state }} {{ $business->zip }}</div>
                    </div>

                    @if ($business->phone)
                        <div class="small mb-2">
                            <div class="fw-semibold">Phone</div>
                            <a href="tel:{{ $business->phone }}" class="text-decoration-none">
                                {{ $business->phone }}
                            </a>
                        </div>
                    @endif

                    @if ($business->email)
                        <div class="small mb-2">
                            <div class="fw-semibold">Email</div>
                            <a href="mailto:{{ $business->email }}" class="text-decoration-none">
                                {{ $business->email }}
                            </a>
                        </div>
                    @endif

                    @if ($business->website)
                        <div class="small mb-3">
                            <div class="fw-semibold">Website</div>
                            <a href="{{ $business->website }}" target="_blank" class="text-decoration-none">
                                {{ parse_url($business->website, PHP_URL_HOST) ?? $business->website }}
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Opening Hours --}}
                @php
                    $hours = json_decode($business->hours, true) ?? [];
                    // Hours format in DB: ['Mon' => ['open' => '09:00', 'close' => '17:00', 'is_open' => 'on'], ...]
                    // Order of days for display
                    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                @endphp

                @if(!empty($hours))
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Opening Hours</h6>
                    @foreach ($days as $day)
                        @php
                            $dayData = $hours[$day] ?? null;
                            $isOpen = isset($dayData['is_open']);
                            $timeStr = $isOpen ? ($dayData['open'] . ' - ' . $dayData['close']) : 'Closed';
                            // Format time if needed, e.g. 09:00 to 9:00 AM. For simplicity just showing raw or simple format.
                        @endphp
                        <div class="d-flex justify-content-between py-1 small">
                            <span>{{ $day }}</span>
                            <span class="{{ !$isOpen ? 'text-muted' : '' }}">
                                {{ $timeStr }}
                            </span>
                        </div>
                    @endforeach
                </div>
                @endif

                {{-- Location Map --}}
                <div id="location" class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Location</h6>
                    <div class="map-embed-placeholder mb-2">
                        {{-- Replace this with a real map embed / Leaflet / Google Maps --}}
                        <img src="https://via.placeholder.com/500x260?text=Map+Location" alt="Map location"
                            style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <a href="https://maps.google.com/?q={{ urlencode(($business->address ?? '') . ', ' . ($business->city ?? '') . ', ' . ($business->state ?? '')) }}"
                        target="_blank" class="btn btn-outline-primary btn-sm w-100">
                        Get Directions
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
