@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Business Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <h1 class="h4 fw-bold mb-1">
                            {{ $listing->exists ? ($listing->title . ' · Profile Settings') : 'Create Your Business Listing' }}
                        </h1>
                        <p class="small mb-0 text-muted">
                            Keep your information accurate and attractive so customers can easily discover and choose you.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- FORM --}}
        <form method="POST" action="{{ $listing->exists ? route('profile.update') : route('profile.store') }}" enctype="multipart/form-data">
            @csrf

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row g-4">

                {{-- LEFT COLUMN --}}
                <div class="col-lg-8">

                    {{-- Branding --}}
                    <div class="section-card">
                        <div class="section-label">Branding</div>
                        <p class="hint-text mb-3">
                            Add a clear logo and cover photo so customers instantly recognize your business.
                        </p>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto d-flex align-items-center">
                                @if($listing->logo_path)
                                    <div class="logo-preview">
                                        <img src="{{ asset('storage/' . $listing->logo_path) }}" alt="Logo" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                    </div>
                                @endif
                                <div class="{{ $listing->logo_path ? 'ms-3' : '' }}">
                                    <div class="small fw-semibold mb-1">Business Logo</div>
                                    <input type="file" name="logo" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="small fw-semibold mb-1">Cover Photo</div>
                                @if($listing->cover_image_path)
                                    <div class="cover-preview mb-2">
                                        <img src="{{ asset('storage/' . $listing->cover_image_path) }}"
                                            alt="Cover" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="hint-text">
                                        Recommended: wide image, at least 1600x600 px.
                                    </div>
                                    <input type="file" name="cover" class="form-control form-control-sm w-auto">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Basic Info --}}
                    <div class="section-card">
                        <div class="section-label">Basic information</div>
                        <p class="hint-text mb-3">
                            This is the core information shown on your public listing.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-semibold">Business Name</label>
                                <input type="text" name="business_name" class="form-control form-control-sm"
                                    value="{{ old('business_name', $listing->title) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">Primary Category</label>
                                <select name="category_id" class="form-select form-select-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $listing->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label small fw-semibold">Tagline</label>
                                <input type="text" name="tagline" class="form-control form-control-sm"
                                    placeholder="e.g. Cozy neighborhood café with artisan coffee."
                                    value="{{ old('tagline', $listing->tagline) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Business Description</label>
                                <textarea name="description" rows="4" class="form-control form-control-sm"
                                    placeholder="Describe your business...">{{ old('description', $listing->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Contact & Social --}}
                    <div class="section-card">
                        <div class="section-label">Contact & online presence</div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control form-control-sm"
                                    value="{{ old('phone', $listing->phone) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Website</label>
                                <input type="url" name="website" class="form-control form-control-sm"
                                    value="{{ old('website', $listing->website) }}">
                            </div>

                            @php
                                $socials = json_decode($listing->social_links, true) ?? [];
                            @endphp

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Facebook</label>
                                <input type="url" name="facebook" class="form-control form-control-sm"
                                    placeholder="https://facebook.com/yourpage" value="{{ old('facebook', $socials['facebook'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Instagram</label>
                                <input type="url" name="instagram" class="form-control form-control-sm"
                                    placeholder="https://instagram.com/yourprofile" value="{{ old('instagram', $socials['instagram'] ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email for inquiries</label>
                                <input type="email" name="contact_email" class="form-control form-control-sm"
                                    value="{{ old('contact_email', $listing->email) }}">
                            </div>
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="col-lg-4">

                    {{-- Location & Map --}}
                    <div class="section-card">
                        <div class="section-label">Location</div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm mb-2"
                                value="{{ old('address', $listing->address) }}">
                            <div class="row g-2">
                                <div class="col-8">
                                    <input type="text" name="city" class="form-control form-control-sm"
                                        value="{{ old('city', $listing->city) }}">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="zip" class="form-control form-control-sm"
                                        value="{{ old('zip', $listing->zip) }}">
                                </div>
                            </div>
                            <div class="hint-text mt-1">
                                Your address helps customers find you and powers “near me” searches.
                            </div>
                        </div>
                    </div>

                    {{-- Hours --}}
                    <div class="section-card">
                        <div class="section-label">Business hours</div>
                        <p class="hint-text mb-2">
                            Let customers know when you're open. Leave blank for closed days.
                        </p>

                        <table class="hours-table">
                            <tbody>
                                @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                <tr>
                                    <th class="pe-2">{{ $day }}</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" name="hours[{{ $day }}][open]" class="form-control form-control-sm" value="09:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" name="hours[{{ $day }}][close]" class="form-control form-control-sm" value="17:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" name="hours[{{ $day }}][is_open]" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Save bar --}}
                    <div class="save-bar">
                        <div class="section-card">
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                                <div class="hint-text">
                                    Changes are not live until you save. You can preview your profile before publishing.
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ $listing->exists ? 'Save changes' : 'Create Listing' }}
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
