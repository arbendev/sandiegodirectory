@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        {{-- CATEGORY HEADER --}}
        <div class="hero-card mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-12 d-flex align-items-center">
                    <div class="icon-badge-lg">
                        {{ $category->icon ?? '📁' }}
                    </div>
                    <div>
                        <h1 class="h4 fw-bold mb-1">{{ $category->name }}</h1>
                        <div class="small text-muted">
                            {{ $category->listings()->count() }} businesses · Updated daily · 
                            {{ $category->description ?? 'Discover local favorites and hidden gems across San Diego.' }}
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
                        {{ $category->name }} in San Diego
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="small text-muted">
                        Showing {{ $listings->firstItem() ?? 0 }}-{{ $listings->lastItem() ?? 0 }} of {{ $listings->total() }} businesses
                    </div>

                </div>
            </div>

        </div>

        {{-- BUSINESS LIST --}}
        <div class="row g-3">

            @forelse($listings as $listing)
            <div class="col-12">
                <a href="{{ route('profile.show', $listing->slug) }}" class="text-decoration-none text-dark">
                    <div class="hover-card">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <img src="{{ $listing->logo_path ? asset('storage/' . $listing->logo_path) : 'https://via.placeholder.com/150x150?text=No+Image' }}"
                                    alt="{{ $listing->title }}" class="business-thumb" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;">
                            </div>
                            <div class="col-md-6">
                                <h2 class="h6 fw-bold mb-1">
                                    {{ $listing->title }}
                                </h2>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="rating-stars me-2 text-warning">
                                        @for($i = 0; $i < 5; $i++)
                                            @if($i < round($listing->reviews_avg_rating))
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="small me-2">{{ number_format($listing->reviews_avg_rating, 1) }}</span>
                                    <span class="small text-muted">({{ $listing->reviews_count }} reviews)</span>
                                </div>
                                <div class="meta-text mb-1">
                                    {{ $listing->tagline }}
                                </div>
                                <div class="small text-muted text-truncate" style="max-width: 90%;">
                                    {{ Str::limit(strip_tags($listing->description), 100) }}
                                </div>
                            </div>
                            <div class="col-md-3 small text-muted">
                                <div class="mb-1">
                                    🌍 {{ $listing->city ?? 'San Diego' }}
                                </div>
                                <div class="mb-1">
                                    {{-- Simple Open/Closed text or just hours check --}}
                                    @if($listing->hours)
                                        ⏰ See hours
                                    @else
                                        ⏰ Hours not set
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-light text-center py-5">
                    <div class="h3 mb-3">😕</div>
                    <div class="fw-semibold">No businesses found in this category yet.</div>
                    <p class="text-muted small">Check back later or explore other categories.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-primary btn-sm">Browse All Categories</a>
                </div>
            </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $listings->links() }}
        </div>

    </div>
@endsection
