@extends('layouts.app')

@section('title', 'San Diego Directory - Discover Local Businesses & Events')
@section('meta_description', 'The ultimate guide to San Diego. Find the best restaurants, shops, services, and upcoming events in San Diego, CA.')
@section('meta_keywords', 'San Diego, Business Directory, Events, California, Local Guide, Restaurants, Shopping')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

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
                    <div id="home-map" style="width: 100%; height: 100%; border-radius: 16px;"></div>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Map focused on San Diego
            var map = L.map('home-map').setView([32.7157, -117.1611], 11);

            L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 20
            }).addTo(map);

            var listings = @json($featuredListings);
            console.log('Map Listings:', listings);

            if (listings.length === 0) {
                console.warn('No listings found for map.');
            }

            listings.forEach(function(listing, index) {
                var address = (listing.address || '') + ', ' + (listing.city || 'San Diego') + ', ' + (listing.state || 'CA');
                console.log('Geocoding:', address);
                
                // Simple delay to respect Nominatim rate limits (not robust but helpful for 3 items)
                setTimeout(function() {
                    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address))
                        .then(function(response) { return response.json(); })
                        .then(function(data) {
                            console.log('Geocode result for ' + listing.title + ':', data);
                            if (data && data.length > 0) {
                                var lat = data[0].lat;
                                var lon = data[0].lon;
                                var marker = L.marker([lat, lon]).addTo(map);
                                marker.bindPopup('<b>' + listing.title + '</b><br><a href="/profile/' + listing.slug + '">View Profile</a>');
                            } else {
                                console.warn('No coordinates found for:', address, 'Trying fallback to City...');
                                // Fallback to City, State
                                var cityAddress = (listing.city || 'San Diego') + ', ' + (listing.state || 'CA');
                                fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(cityAddress))
                                    .then(function(res) { return res.json(); })
                                    .then(function(cityData) {
                                        if (cityData && cityData.length > 0) {
                                             var lat = cityData[0].lat;
                                             var lon = cityData[0].lon;
                                             // Add a slight random offset to prevent exact overlap if multiple fallbacks occur
                                             lat = parseFloat(lat) + (Math.random() - 0.5) * 0.01;
                                             lon = parseFloat(lon) + (Math.random() - 0.5) * 0.01;
                                             
                                             var marker = L.marker([lat, lon]).addTo(map);
                                             marker.bindPopup('<b>' + listing.title + '</b><br><a href="/profile/' + listing.slug + '">View Profile</a><br><i>(Approximate Location)</i>');
                                        }
                                    });
                            }
                        })
                        .catch(function(err) { console.error('Geocoding error:', err); });
                }, index * 1000); // 1-second stager
            });
        });
    </script>
@endsection
