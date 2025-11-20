@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="/categories/">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Restaurants</li>
            </ol>
        </nav>

        {{-- CATEGORY HEADER --}}
        <div class="category-header-card mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-12 d-flex align-items-center">
                    <div class="category-icon-badge-lg">
                        🍽️
                    </div>
                    <div>
                        <h1 class="h4 fw-bold mb-1">Restaurants</h1>
                        <div class="small text-muted">
                            128 businesses · Updated daily · Discover local favorites, fine dining, and hidden gems across
                            San Diego.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTERS + MAP PREVIEW --}}
        <div class="row g-4 mb-3 align-items-start">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                    <div class="section-label">
                        Restaurants in San Diego
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="small text-muted">
                        Showing 1-10 of 128 restaurants
                    </div>

                </div>
            </div>

        </div>

        {{-- BUSINESS LIST --}}
        <div class="row g-3">

            {{-- Business 1 --}}
            <div class="col-12">
                <a href="/profile/">
                    <div class="business-list-card">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=600&q=80"
                                    alt="Café Luna" class="business-thumb">
                            </div>
                            <div class="col-md-6">
                                <h2 class="h6 fw-bold mb-1">
                                    Café Luna
                                </h2>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="rating-stars me-2">★★★★★</span>
                                    <span class="small me-2">4.9</span>
                                    <span class="small text-muted">(128 reviews)</span>
                                </div>
                                <div class="business-meta mb-1">
                                    Coffee &bull; Brunch &bull; Pastries
                                </div>
                                <div class="small text-muted">
                                    Cozy neighborhood café known for its artisan coffee, fresh pastries, and sunny outdoor
                                    patio.
                                </div>
                            </div>
                            <div class="col-md-3 small text-muted">
                                <div class="mb-1">
                                    🌍 Gaslamp Quarter, San Diego
                                </div>
                                <div class="mb-1">
                                    ⏰ Open now · Closes 7:00 PM
                                </div>
                                <div class="mb-1">
                                    💵 $$ · Moderate
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Business 2 --}}
            <div class="col-12">
                <div class="business-list-card">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=600&q=80"
                                alt="Harborview Grill" class="business-thumb">
                        </div>
                        <div class="col-md-6">
                            <h2 class="h6 fw-bold mb-1">
                                Harborview Grill
                            </h2>
                            <div class="d-flex align-items-center mb-1">
                                <span class="rating-stars me-2">★★★★☆</span>
                                <span class="small me-2">4.6</span>
                                <span class="small text-muted">(95 reviews)</span>
                            </div>
                            <div class="business-meta mb-1">
                                Seafood &bull; Waterfront &bull; Fine Dining
                            </div>
                            <div class="small text-muted">
                                Upscale waterfront dining with fresh seafood, craft cocktails, and sunset views over the
                                bay.
                            </div>
                        </div>
                        <div class="col-md-3 small text-muted">
                            <div class="mb-1">
                                🌍 Embarcadero, San Diego
                            </div>
                            <div class="mb-1">
                                ⏰ Opens 4:00 PM
                            </div>
                            <div class="mb-1">
                                💵 $$$ · Upscale
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Business 3 --}}
            <div class="col-12">
                <div class="business-list-card">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=600&q=80"
                                alt="Barrio Tacos" class="business-thumb">
                        </div>
                        <div class="col-md-6">
                            <h2 class="h6 fw-bold mb-1">
                                Barrio Tacos
                            </h2>
                            <div class="d-flex align-items-center mb-1">
                                <span class="rating-stars me-2">★★★★★</span>
                                <span class="small me-2">4.8</span>
                                <span class="small text-muted">(210 reviews)</span>
                            </div>
                            <div class="business-meta mb-1">
                                Mexican &bull; Street Food &bull; Casual
                            </div>
                            <div class="small text-muted">
                                Vibrant taco spot with handmade tortillas, bold flavors, and late-night hours.
                            </div>
                        </div>
                        <div class="col-md-3 small text-muted">
                            <div class="mb-1">
                                🌍 Barrio Logan, San Diego
                            </div>
                            <div class="mb-1">
                                ⏰ Open now · Closes 11:00 PM
                            </div>
                            <div class="mb-1">
                                💵 $ · Casual
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Business 4 --}}
            <div class="col-12">
                <div class="business-list-card">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
                                alt="Sunrise Brunch House" class="business-thumb">
                        </div>
                        <div class="col-md-6">
                            <h2 class="h6 fw-bold mb-1">
                                Sunrise Brunch House
                            </h2>
                            <div class="d-flex align-items-center mb-1">
                                <span class="rating-stars me-2">★★★★☆</span>
                                <span class="small me-2">4.5</span>
                                <span class="small text-muted">(64 reviews)</span>
                            </div>
                            <div class="business-meta mb-1">
                                Brunch &bull; Coffee &bull; Family Friendly
                            </div>
                            <div class="small text-muted">
                                Bright, family-friendly brunch spot with pancakes, omelets, and bottomless coffee.
                            </div>
                        </div>
                        <div class="col-md-3 small text-muted">
                            <div class="mb-1">
                                🌍 North Park, San Diego
                            </div>
                            <div class="mb-1">
                                ⏰ Open now · Closes 2:00 PM
                            </div>
                            <div class="mb-1">
                                💵 $$ · Moderate
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- You can duplicate more business cards as needed --}}
        </div>

        {{-- PAGINATION (static visual) --}}
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    <li class="page-item active"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </nav>
        </div>

    </div>
@endsection
