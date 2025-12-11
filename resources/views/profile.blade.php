@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Businesses</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $business->name ?? 'Business Name' }}
                </li>
            </ol>
        </nav>

        {{-- HERO CARD --}}
        <div class="hero-card mb-4 p-0 position-relative d-flex align-items-end"
            style="min-height: 320px; background-image: url('{{ $business->cover_image_url ?? 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=1600&q=80' }}'); background-size: cover; background-position: center;">
            
            {{-- Dark Overlay --}}
            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.1)); border-radius: 18px;"></div>

            <div class="p-4 w-100 position-relative text-white">
                <div class="row align-items-end">
                    <div class="col-md-8 d-flex align-items-center">
                        <img src="{{ $business->logo_url ?? 'https://via.placeholder.com/120x120?text=Logo' }}"
                            class="business-logo me-3 me-md-4" alt="{{ $business->name ?? 'Business Logo' }}">

                        <div class="text-white">
                            <div class="mb-1">
                                @if (!empty($business->category))
                                    <span class="badge-soft me-2">
                                        {{ $business->category->name ?? $business->category }}
                                    </span>
                                @endif
                                @if (!empty($business->neighborhood))
                                    <span class="badge-soft">
                                        {{ $business->neighborhood }}
                                    </span>
                                @endif
                            </div>
                            <h1 class="h3 fw-bold mb-1">
                                {{ $business->name ?? 'Business Name' }}
                            </h1>

                            <div class="d-flex flex-wrap align-items-center small">
                                <div class="me-3 d-flex align-items-center">
                                    <span class="rating-stars me-1">
                                        @php
                                            $rating = $business->rating ?? 4.8;
                                            $fullStars = floor($rating);
                                            $halfStar = $rating - $fullStars >= 0.5;
                                        @endphp

                                        @for ($i = 0; $i < $fullStars; $i++)
                                            ★
                                        @endfor
                                        @if ($halfStar)
                                            ☆
                                        @endif
                                    </span>
                                    <span>{{ number_format($rating, 1) }} / 5.0</span>
                                    <span class="ms-1 text-white-50">
                                        ({{ $business->review_count ?? 24 }} reviews)
                                    </span>
                                </div>

                                @if (!empty($business->price_level))
                                    <span class="me-3">
                                        {{ str_repeat('$', $business->price_level) }}
                                    </span>
                                @endif

                                @if (!empty($business->short_tagline))
                                    <span class="text-white-75">
                                        • {{ $business->short_tagline }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3 mt-md-0 text-md-end text-white">
                        <div class="mb-2 small text-white-75">
                            {{ $business->address ?? '123 Main St, San Diego, CA' }}
                        </div>
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                            @if (!empty($business->phone))
                                <a href="tel:{{ $business->phone }}" class="btn btn-light btn-sm">
                                    Call
                                </a>
                            @endif

                            @if (!empty($business->website))
                                <a href="{{ $business->website }}" target="_blank" class="btn btn-primary btn-sm">
                                    Visit Website
                                </a>
                            @endif

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="/dashboard/" class="btn btn-primary btn-sm w-100">Message this Business</a>
                            </div>
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
                    <p class="mb-0">
                        {{ $business->description ?? 'This local business is a staple of the San Diego community, offering quality service and a welcoming atmosphere. Add a detailed description here to highlight what makes this business unique, what it specializes in, and why locals love it.' }}
                    </p>
                </div>

                {{-- Highlights / Tags --}}
                @php
                    $tags = $business->tags ?? [
                        'Family-friendly',
                        'Locally Owned',
                        'Outdoor Seating',
                        'Good for Groups',
                        'Takes Reservations',
                    ];
                @endphp
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Highlights</h6>
                    @foreach ($tags as $tag)
                        <span class="pill">{{ is_object($tag) ? $tag->name : $tag }}</span>
                    @endforeach
                </div>

                {{-- Photos --}}
                @php
                    $photos = $business->photos ?? [
                        'https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80',
                    ];
                @endphp

                <div class="section-card mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold mb-0">Photos</h6>
                    </div>

                    <div class="photo-scroll">
                        @foreach ($photos as $photo)
                            <img src="{{ is_object($photo) ? $photo->url : $photo }}"
                                alt="{{ $business->name ?? 'Business Photo' }}">
                        @endforeach
                    </div>
                </div>

                {{-- Reviews --}}
                @php
                    $reviews = $business->reviews ?? [
                        [
                            'name' => 'Sarah M.',
                            'rating' => 5,
                            'date' => '2 weeks ago',
                            'text' =>
                                'Fantastic experience! Friendly staff, great atmosphere, and the service was top-notch.',
                        ],
                        [
                            'name' => 'James K.',
                            'rating' => 4,
                            'date' => '1 month ago',
                            'text' =>
                                'Really enjoyed my visit here. A few minor delays, but overall very happy and will return.',
                        ],
                    ];
                @endphp

                <div class="section-card mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h6 class="fw-bold mb-0">Customer Reviews</h6>
                        <a href="#" class="small text-decoration-none">Write a review</a>
                    </div>
                    <p class="small text-muted mb-3">
                        Showing {{ count($reviews) }} of {{ $business->review_count ?? 24 }} reviews
                    </p>

                    @foreach ($reviews as $review)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>{{ $review['name'] }}</strong>
                                    <div class="rating-stars small">
                                        @for ($i = 0; $i < $review['rating']; $i++)
                                            ★
                                        @endfor
                                        @for ($i = $review['rating']; $i < 5; $i++)
                                            ☆
                                        @endfor
                                    </div>
                                </div>
                                <span class="small text-muted">{{ $review['date'] }}</span>
                            </div>
                            <p class="small mb-0 mt-2">
                                {{ $review['text'] }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="col-lg-4">
                {{-- Contact Info --}}
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-3">Contact & Details</h6>

                    <div class="small mb-2">
                        <div class="fw-semibold">Address</div>
                        <div>{{ $business->address ?? '123 Main St' }}</div>
                        <div>{{ $business->city ?? 'San Diego' }}, {{ $business->state ?? 'CA' }}
                            {{ $business->zip ?? '92101' }}</div>
                        @if (!empty($business->address_note))
                            <div class="text-muted">{{ $business->address_note }}</div>
                        @endif
                    </div>

                    @if (!empty($business->phone))
                        <div class="small mb-2">
                            <div class="fw-semibold">Phone</div>
                            <a href="tel:{{ $business->phone }}" class="text-decoration-none">
                                {{ $business->phone }}
                            </a>
                        </div>
                    @endif

                    @if (!empty($business->email))
                        <div class="small mb-2">
                            <div class="fw-semibold">Email</div>
                            <a href="mailto:{{ $business->email }}" class="text-decoration-none">
                                {{ $business->email }}
                            </a>
                        </div>
                    @endif

                    @if (!empty($business->website))
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
                    $hours = $business->opening_hours ?? [
                        'Monday' => '9:00 AM - 6:00 PM',
                        'Tuesday' => '9:00 AM - 6:00 PM',
                        'Wednesday' => '9:00 AM - 6:00 PM',
                        'Thursday' => '9:00 AM - 8:00 PM',
                        'Friday' => '9:00 AM - 8:00 PM',
                        'Saturday' => '10:00 AM - 4:00 PM',
                        'Sunday' => 'Closed',
                    ];
                @endphp

                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Opening Hours</h6>
                    @foreach ($hours as $day => $time)
                        <div class="d-flex justify-content-between py-1 small">
                            <span>{{ $day }}</span>
                            <span class="{{ strtolower($time) === 'closed' ? 'text-muted' : '' }}">
                                {{ $time }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Location Map --}}
                <div id="location" class="section-card mb-3">
                    <h6 class="fw-bold mb-2">Location</h6>
                    <div class="map-embed-placeholder mb-2">
                        {{-- Replace this with a real map embed / Leaflet / Google Maps --}}
                        <img src="https://via.placeholder.com/500x260?text=Map+Location" alt="Map location"
                            style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <a href="https://maps.google.com/?q={{ urlencode($business->address ?? 'San Diego, CA') }}"
                        target="_blank" class="btn btn-outline-primary btn-sm w-100">
                        Get Directions
                    </a>
                </div>

                {{-- Related Businesses --}}
                @php
                    $related = $relatedBusinesses ?? [];
                @endphp

                @if (!empty($related))
                    <div class="section-card">
                        <h6 class="fw-bold mb-2">You might also like</h6>
                        <div class="small">
                            @foreach ($related as $item)
                                <a href="{{ route('businesses.show', $item->slug ?? $item->id) }}"
                                    class="d-block text-decoration-none text-dark mb-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->logo_url ?? 'https://via.placeholder.com/40x40' }}"
                                            alt="{{ $item->name }}" class="me-2 rounded"
                                            style="width:40px;height:40px;object-fit:cover;">
                                        <div>
                                            <div class="fw-semibold">{{ $item->name }}</div>
                                            <div class="text-muted small">
                                                {{ $item->category->name ?? ($item->category ?? 'Local Business') }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
