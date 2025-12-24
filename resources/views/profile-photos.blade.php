@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Business Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Photos</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <h1 class="h4 fw-bold mb-1">
                            {{ $listing->title }} · Photos
                        </h1>
                        <p class="small mb-0 text-muted">
                            Upload and manage the photos that appear on your business profile.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- LEFT COLUMN: Existing photos --}}
            <div class="col-lg-8">

                {{-- Gallery photos --}}
                <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <div class="section-label mb-0">Gallery</div>
                            <div class="hint-text">
                                Add photos of your interior, exterior, menu items, staff, and events.
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        @forelse($listing->images as $image)
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Photo"
                                         style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                                    <div class="photo-overlay">
                                        <div class="photo-actions" style="position: absolute; bottom: 10px; right: 10px;">
                                            <form action="{{ route('profile.photos.delete', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 text-muted">
                                No photos uploaded yet. Use the form on the right to add some!
                            </div>
                        @endforelse
                    </div>

                </div>

            </div>

            {{-- RIGHT COLUMN: Upload + queue --}}
            <div class="col-lg-4">
                <form method="POST" action="{{ route('profile.photos.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Upload area --}}
                    <div class="section-card">
                        <div class="section-label">Upload new photos</div>

                        <div class="upload-dropzone mb-2 text-center p-4 border rounded bg-light">
                            <div class="upload-icon-circle mb-2" style="font-size: 2rem;">
                                ⬆️
                            </div>
                            <div class="small fw-semibold mb-1">Select photos</div>
                            <div class="hint-text mb-3">
                                Multiple files allowed.
                            </div>
                            
                            <input type="file" name="photos[]" class="form-control form-control-sm" multiple required>
                        </div>
                        
                         <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary">
                                Upload Photos
                            </button>
                        </div>

                        <div class="hint-text mt-3 mb-2">
                            Tips:
                            <ul class="small mb-0">
                                <li>Use bright, well-lit photos.</li>
                                <li>Max 4MB per image.</li>
                            </ul>
                        </div>
                    </div>
                </form>

                {{-- Photo guidelines --}}
                <div class="section-card mt-3">
                    <div class="section-label">Photo guidelines</div>
                    <ul class="small mb-0">
                        <li>Only upload photos you own or have permission to use.</li>
                        <li>No explicit, offensive, or irrelevant content.</li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

    <style>
        .photo-tile {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }
        .photo-tile:hover .photo-overlay {
            opacity: 1;
        }
        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            opacity: 0; /* Hidden by default */
            transition: opacity 0.2s;
        }
    </style>
@endsection
