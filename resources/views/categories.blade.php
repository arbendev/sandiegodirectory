@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        {{-- HERO / INTRO --}}
        <section class="categories-hero">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <h1 class="h4 fw-bold mb-1">Browse Categories</h1>
                        <p class="small mb-0 text-muted">
                            Discover local businesses across San Diego by category.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- CATEGORY GRID --}}
        <div class="row g-4 mt-2">

            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none text-dark">
                    <div class="hover-card h-100">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-badge">{{ $category->icon ?? '📁' }}</div>
                            <div class="flex-grow-1">
                                <h2 class="h6 fw-bold mb-0">{{ $category->name }}</h2>
                                <div class="meta-text">{{ $category->listings_count }} businesses</div>
                            </div>
                        </div>

                        <p class="small mb-2 text-muted">
                            {{ $category->description ?? 'Explore businesses in ' . $category->name }}
                        </p>

                        {{-- Subcategories pills could go here if we had them --}}
                    </div>
                </a>
            </div>
            @endforeach

        </div>

    </div>
@endsection
