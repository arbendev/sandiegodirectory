@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Business Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Photos</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <h1 class="h4 fw-bold mb-1">
                            Café Luna · Photos
                        </h1>
                        <p class="small mb-0 text-muted">
                            Upload and manage the photos that appear on your business profile.
                            Great photos help customers decide to visit your business.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                {{-- LEFT COLUMN: Existing photos --}}
                <div class="col-lg-8">


                    {{-- Gallery photos --}}
                    <div class="section-card">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <div class="section-label mb-0">Gallery</div>
                                <div class="hint-text">
                                    Add photos of your interior, exterior, menu items, staff, and events. Aim for 5-12
                                    high-quality images.
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">

                            {{-- Photo 1 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 1">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Photo 2 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 2">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Photo 3 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 3">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Photo 4 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 4">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Photo 5 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 5">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Photo 6 --}}
                            <div class="col-6 col-md-4">
                                <div class="photo-tile">
                                    <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80"
                                        alt="Photo 6">
                                    <div class="photo-overlay">
                                        <div class="photo-actions">
                                            <button type="button" class="btn btn-outline-light btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- RIGHT COLUMN: Upload + queue --}}
                <div class="col-lg-4">

                    {{-- Upload area --}}
                    <div class="section-card">
                        <div class="section-label">Upload new photos</div>

                        <div class="upload-dropzone mb-2">
                            <div class="upload-icon-circle">
                                ⬆️
                            </div>
                            <div class="small fw-semibold mb-1">Drag &amp; drop photos here</div>
                            <div class="hint-text mb-2">
                                or click the button below to browse files.
                            </div>
                            <input type="file" name="photos[]" id="photo_input" class="d-none" multiple>
                            <button type="button" class="btn btn-outline-primary btn-sm"
                                onclick="document.getElementById('photo_input').click();">
                                Choose files
                            </button>
                        </div>

                        <div class="hint-text mb-2">
                            Tips:
                            <ul class="small mb-0">
                                <li>Use bright, well-lit photos.</li>
                                <li>Avoid blurry or low-resolution images.</li>
                                <li>Show different angles and experiences.</li>
                            </ul>
                        </div>
                    </div>



                    {{-- Photo guidelines --}}
                    <div class="section-card">
                        <div class="section-label">Photo guidelines</div>
                        <ul class="small mb-0">
                            <li>Only upload photos you own or have permission to use.</li>
                            <li>No explicit, offensive, or irrelevant content.</li>
                            <li>Logos, menus, and promotional graphics are allowed but should be clear and readable.</li>
                        </ul>
                    </div>

                    {{-- Save bar --}}
                    <div class="save-bar">
                        <div class="section-card">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                                <div class="hint-text">
                                    Remember to save your changes after uploading, deleting, or reordering photos.
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Save photo changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>
@endsection
