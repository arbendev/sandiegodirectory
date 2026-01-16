@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <div class="hero-card mb-4 p-4 d-flex align-items-center"
            style="min-height: 200px; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
            <div>
                <h1 class="h3 fw-bold mb-2">Get in Touch</h1>
                <p class="mb-0 text-white-75">
                    Have questions or feedback? We'd love to hear from you.
                </p>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="row g-4">
            {{-- LEFT: Contact Form --}}
            <div class="col-lg-8">
                <div class="section-card">
                    <h5 class="fw-bold mb-3">Send us a message</h5>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label small fw-semibold">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label small fw-semibold">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label small fw-semibold">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label small fw-semibold">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- RIGHT: Contact Info --}}
            <div class="col-lg-4">
                <div class="section-card mb-3">
                    <h6 class="fw-bold mb-3">Contact Information</h6>

                    {{-- 
                    <div class="mb-3">
                        <div class="fw-semibold small">Address</div>
                        <div class="small text-muted">
                            123 Business Avenue, Suite 100<br>
                            San Diego, CA 92101
                        </div>
                    </div>
                    --}}

                    <div class="mb-3">
                        <div class="fw-semibold small">Email</div>
                        <a href="mailto:contact@thesandiegodirectory.com"
                            class="small text-decoration-none">contact@thesandiegodirectory.com</a>
                    </div>

                    <div class="mb-3">
                        <div class="fw-semibold small">Phone</div>
                        <a href="tel:+16195550123" class="small text-decoration-none">(619) 840-9862</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
