@extends('layouts.app')

@section('title', 'Search Results for ' . $query . ' - San Diego Directory')
@section('meta_description', 'Search results for ' . $query . ' in San Diego Directory.')

@section('content')
<div class="container py-5">
    
    {{-- Search Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="fw-bold mb-3">Search Results</h1>
            <p class="text-muted mb-4">
                Showing results for <span class="fw-bold text-dark">"{{ $query }}"</span>
            </p>
            
            <form action="{{ route('search') }}" method="GET" class="d-flex gap-2 justify-content-center">
                <input type="text" name="q" value="{{ $query }}" class="form-control form-control-lg" placeholder="Search again..." style="max-width: 400px;">
                <button type="submit" class="btn btn-primary btn-lg">Search</button>
            </form>
        </div>
    </div>

    {{-- Results Grid --}}
    @if($listings->count() > 0)
        <div class="row g-4">
            @foreach($listings as $listing)
            <div class="col-md-6 col-lg-3">
                <div class="card business-card border-0 shadow-sm h-100">
                    <a href="{{ route('profile.show', $listing->slug) }}" class="text-decoration-none text-dark">
                        <div class="position-relative">
                            @if($listing->cover_image_path)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($listing->cover_image_path) }}" 
                                    class="card-img-top" alt="{{ $listing->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/600x400?text={{ urlencode($listing->title) }}" 
                                    class="card-img-top" alt="{{ $listing->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            
                            {{-- Optional Status Badge --}}
                            @if($listing->status === 'active')
                                <span class="badge bg-success position-absolute top-0 end-0 m-3">Verified</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="card-title fw-bold mb-1">{{ $listing->title }}</h5>
                                    @if($listing->category)
                                        <div class="text-muted small">
                                            <i class="bi bi-tag-fill me-1"></i> {{ $listing->category->name }}
                                        </div>
                                    @endif
                                </div>
                                <div class="badge bg-light text-dark border">
                                    <i class="bi bi-star-fill text-warning"></i> {{ number_format($listing->average_rating, 1) }}
                                </div>
                            </div>
                            
                            @if($listing->tagline)
                                <p class="card-text small text-muted mb-3 line-clamp-2">
                                    {{ $listing->tagline }}
                                </p>
                            @endif
                            
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-geo-alt me-2"></i> 
                                <span class="text-truncate" style="max-width: 150px;">{{ $listing->city }}, {{ $listing->state }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $listings->appends(['q' => $query])->links() }}
        </div>
        
    @else
        <div class="text-center py-5">
            <div class="display-1 text-muted mb-3"><i class="bi bi-search"></i></div>
            <h3 class="fw-bold">No results found</h3>
            <p class="text-muted">We couldn't find any listings matching your specific criteria.</p>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary mt-3">Browse all categories</a>
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
