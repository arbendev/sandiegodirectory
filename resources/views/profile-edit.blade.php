@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Business Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="profile-hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <h1 class="h4 fw-bold mb-1">
                            Café Luna · Profile Settings
                        </h1>
                        <p class="small mb-0 text-muted">
                            Keep your information accurate and attractive so customers can easily discover and choose you.
                        </p>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0 text-md-end">
                        <div class="small text-muted mb-1">
                            Last updated: Apr 10, 2025 · 3:42 PM
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FORM --}}
        <form method="POST" action="#">
            @csrf

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
                                <div class="logo-preview">
                                    <img src="https://via.placeholder.com/120?text=Logo" alt="Logo">
                                </div>
                                <div>
                                    <div class="small fw-semibold mb-1">Business Logo</div>
                                    <div class="hint-text mb-2">
                                        Recommended: square image, at least 300x300 px, PNG or JPG.
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        Upload logo
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="small fw-semibold mb-1">Cover Photo</div>
                                <div class="cover-preview mb-2">
                                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=1600&q=80"
                                        alt="Cover">
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="hint-text">
                                        Recommended: wide image, at least 1600x600 px. This appears at the top of your
                                        profile.
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        Change cover
                                    </button>
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
                                    value="Café Luna">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">Primary Category</label>
                                <select name="category" class="form-select form-select-sm">
                                    <option>Restaurants</option>
                                    <option selected>Coffee &amp; Tea</option>
                                    <option>Health &amp; Fitness</option>
                                    <option>Local Shops</option>
                                    <option>Professional Services</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Tagline</label>
                                <input type="text" name="tagline" class="form-control form-control-sm"
                                    placeholder="e.g. Cozy neighborhood café with artisan coffee."
                                    value="Cozy neighborhood café with artisan coffee and fresh pastries.">
                                <div class="hint-text mt-1">
                                    A short, clear sentence that describes what makes your business special.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Secondary Categories</label>
                                <input type="text" name="subcategories" class="form-control form-control-sm"
                                    placeholder="e.g. Brunch, Bakery, Wi-Fi">
                                <div class="hint-text mt-1">
                                    Comma-separated keywords (not shown directly, used for search).
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Business Description</label>
                                <textarea name="description" rows="4" class="form-control form-control-sm"
                                    placeholder="Describe your business, what you offer, and why customers love you.">Café Luna is a cozy neighborhood spot in the heart of San Diego, known for artisan coffee, fresh-baked pastries, and a relaxed atmosphere perfect for meetups, remote work, or a quiet break.</textarea>
                                <div class="hint-text mt-1">
                                    Aim for 3–6 sentences. You can highlight specialties, ambiance, and what customers can
                                    expect.
                                </div>
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
                                    value="(555) 123-4567">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Website</label>
                                <input type="url" name="website" class="form-control form-control-sm"
                                    value="https://cafelunaexample.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Facebook</label>
                                <input type="url" name="facebook" class="form-control form-control-sm"
                                    placeholder="https://facebook.com/yourpage">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Instagram</label>
                                <input type="url" name="instagram" class="form-control form-control-sm"
                                    placeholder="https://instagram.com/yourprofile">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email for inquiries</label>
                                <input type="email" name="contact_email" class="form-control form-control-sm"
                                    value="hello@cafelunaexample.com">
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
                                value="123 Market St">
                            <div class="row g-2">
                                <div class="col-8">
                                    <input type="text" name="city" class="form-control form-control-sm"
                                        value="San Diego">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="zip" class="form-control form-control-sm"
                                        value="92101">
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
                                <tr>
                                    <th class="pe-2">Mon</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="08:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="18:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Tue</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="08:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="18:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Wed</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="08:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="18:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Thu</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="08:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="18:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Fri</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="08:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="19:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Sat</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="09:00">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm"
                                                    value="14:00">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pe-2">Sun</th>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-2 text-end">
                                                <div class="form-check form-check-inline small">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label">Open</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Highlights & tags --}}
                    <div class="section-card">
                        <div class="section-label">Highlights</div>
                        <p class="hint-text mb-2">
                            Select what applies to your business. These may show as icons or tags.
                        </p>

                        <div class="mb-2">
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" id="highlight_wifi" checked>
                                <label class="form-check-label" for="highlight_wifi">
                                    Free Wi-Fi
                                </label>
                            </div>
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" id="highlight_outdoor" checked>
                                <label class="form-check-label" for="highlight_outdoor">
                                    Outdoor seating
                                </label>
                            </div>
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" id="highlight_parking">
                                <label class="form-check-label" for="highlight_parking">
                                    On-site parking
                                </label>
                            </div>
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" id="highlight_family">
                                <label class="form-check-label" for="highlight_family">
                                    Family friendly
                                </label>
                            </div>
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" id="highlight_vegan">
                                <label class="form-check-label" for="highlight_vegan">
                                    Vegan / vegetarian options
                                </label>
                            </div>
                        </div>
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
                                        Save changes
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
