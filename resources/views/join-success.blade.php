@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Businesses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Welcome</li>
            </ol>
        </nav>

        {{-- HERO / SUCCESS --}}
        <section class="mb-4">
            <div class="success-hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8 d-flex">
                        <div class="success-icon-circle">
                            ✓
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="success-badge">Welcome to the San Diego Directory</span>
                            </div>
                            <h1 class="h4 fw-bold mb-1">
                                Your business listing has been created!
                            </h1>
                            <p class="small mb-0 text-muted">
                                You're now part of the San Diego business community.
                                Finish a few quick steps to make your listing shine and start attracting new customers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- NEXT STEPS + SUMMARY --}}
        <section>
            <div class="row g-4">

                {{-- LEFT: Next steps --}}
                <div class="col-lg-12">

                    <div class="section-card">
                        <div class="section-label">Next steps</div>
                        <p class="hint-text mb-3">
                            Complete these steps to make the most of your San Diego Directory listing.
                        </p>

                        <div class="checklist-item">
                            <div class="checklist-icon done">✓</div>
                            <div>
                                <div class="fw-semibold small">Create your business profile</div>
                                <div class="small text-muted">
                                    Basic details have been saved. You can edit them at any time from your dashboard.
                                </div>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="checklist-icon todo">2</div>
                            <div>
                                <div class="fw-semibold small">Add photos and logo</div>
                                <div class="small text-muted">
                                    Upload your logo, interior/exterior shots, and any photos that show what you offer.
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                    Add photos
                                </a>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="checklist-icon todo">3</div>
                            <div>
                                <div class="fw-semibold small">Set hours and contact options</div>
                                <div class="small text-muted">
                                    Let customers know when you're open and how to reach you.
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm mt-1">
                                    Set hours
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
