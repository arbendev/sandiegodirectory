@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Discover, Connect, and Grow — <br>The Ultimate San Diego Business Hub</h1>
            
            {{-- 
            <form action="{{ route('search') }}" method="GET" class="mt-4 d-flex justify-content-center gap-2">
                 <input type="text" name="q" class="form-control form-control-lg w-50" placeholder="What are you looking for?">
                 <button type="submit" class="btn btn-primary btn-lg">Search</button>
            </form>
            --}}
            
            <div class="mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-light btn me-2">Browse Categories</a>
                <a href="{{ route('register') }}" class="btn btn-warning btn">Add Your Business</a>
            </div>
        </div>
    </section>

    <!-- FEATURED CATEGORIES -->
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-4">Featured Categories</h2>

        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-md-2">
                <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none text-dark">
                    <div class="category-card h-100">
                        @php
                            // Mapping slugs to static icons if they match known assets
                            $iconMap = [
                                'restaurants' => '/img/icon-dinning.png',
                                'dining' => '/img/icon-dinning.png',
                                'food' => '/img/icon-dinning.png',
                                'real-estate' => '/img/icon-real-estate.png',
                                'fitness' => '/img/icon-fitness.png',
                                'gym' => '/img/icon-fitness.png',
                                'health' => '/img/icon-fitness.png',
                                'services' => '/img/icon-services.png',
                                'shopping' => '/img/icon-shopping.png',
                                'retail' => '/img/icon-shopping.png',
                            ];
                            $staticIcon = $iconMap[$category->slug] ?? null;
                        @endphp

                        @if($staticIcon)
                            <img src="{{ $staticIcon }}" class="img-fluid mb-2" style="width:35%;" alt="{{ $category->name }}">
                        @elseif($category->icon && (str_starts_with($category->icon, 'http') || str_starts_with($category->icon, '/')))
                            <img src="{{ $category->icon }}" class="img-fluid mb-2" style="width:35%;" alt="{{ $category->name }}">
                        @elseif($category->icon)
                             {{-- Assume emoji or font class --}}
                             <div class="display-4 mb-2">{{ $category->icon }}</div>
                        @else
                            <img src="/img/icon-services.png" class="img-fluid mb-2" style="width:35%;" alt="Category">
                        @endif
                        <br>
                        <strong>{{ $category->name }}</strong>
                        <div class="small text-muted mt-1">{{ $category->listings_count }} Listings</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- MAP + FEATURED BUSINESSES -->
    <div class="container pb-4">
        <div class="row g-4 align-items-start">
            <!-- MAP -->
            <div class="col-lg-5">
                <div class="map-box" style="height: 300px;">
                    <img src="/img/map-temp.jpg" alt="Map" class="img-fluid">
                </div>
            </div>

            <!-- FEATURED BUSINESSES -->
            <div class="col-lg-7">
                <h3 class="fw-bold mb-3 text-center text-lg-start">Featured Businesses</h3>
                <div class="d-flex gap-3 overflow-auto pb-2">
                    @forelse($featuredListings as $listing)
                    <div class="card business-card border-0 shadow-sm" style="min-width: 210px;">
                        <a href="{{ route('profile.show', $listing->slug) }}" class="text-decoration-none text-dark">
                            @if($listing->cover_image_path)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($listing->cover_image_path) }}"
                                class="card-img-top" alt="{{ $listing->title }}" style="height: 130px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/600x400?text={{ urlencode($listing->title) }}"
                                class="card-img-top" alt="{{ $listing->title }}" style="height: 130px; object-fit: cover;">
                            @endif
                            
                            <div class="card-body">
                                <h6 class="card-title mb-1 text-truncate">{{ $listing->title }}</h6>
                                <div class="small text-warning">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= round($listing->average_rating)) ★ @else ☆ @endif
                                    @endfor
                                    <span class="text-muted ms-1">({{ number_format($listing->average_rating, 1) }})</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="alert alert-light w-100">No featured businesses found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- LOCAL EVENTS -->
    <div class="container pb-2">
        <h3 class="fw-bold mb-4">Upcoming Events</h3>

        <div class="row g-4">
            @forelse($upcomingEvents as $event)
            <div class="col-md-3">
                <a href="{{ route('events.show', $event->slug) }}" class="text-decoration-none text-dark">
                    <div class="event-card h-100">
                        <div class="row">
                            <div class="col-3 col-md-3 px-1">
                                <div class="date-badge">
                                    <div class="month">{{ $event->start_datetime->format('M') }}</div>
                                    <div class="day">{{ $event->start_datetime->format('d') }}</div>
                                    <div class="dow">{{ $event->start_datetime->format('D') }}</div>
                                </div>
                            </div>
                            <div class="col-9 col-md-9 ps-0">
                                <h5 class="mt-2 mb-1 text-truncate" style="font-size: 1rem;">{{ $event->title }}</h5>
                                <small class="text-muted d-block text-truncate">{{ $event->location_name }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <p class="text-muted">No upcoming events.</p>
            </div>
            @endforelse
        </div>
    </div>
@endsection
