<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'San Diego Directory'))</title>
    <meta name="description" content="@yield('meta_description', 'Discover the best local businesses, events, and services in San Diego. Your ultimate guide to the city by the bay.')">
    <meta name="keywords" content="@yield('meta_keywords', 'San Diego, Business Directory, Events, Local Services, California, Travel, Tourism')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
            <div class="container">
                <div class="d-flex align-items-center w-100">

                    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                        <img src="/img/logo-header.png" class="me-2 img-fluid" style="height:60px;"
                            alt="San Diego Directory">
                    </a>

                    <!-- Directory search bar -->
                    <form class="navbar-directory-search d-none d-md-block" action="{{ url('/search') }}"
                        method="GET">
                        <div class="directory-search-wrapper">
                            <input type="text" name="q" class="navbar-directory-search-input"
                                placeholder="Searching for places, restaurants, hotels...">

                            <button type="submit" class="directory-search-btn">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg></span>
                            </button>
                        </div>
                    </form>
                    <!-- /Directory search bar -->

                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ms-auto">

                        <ul class="navbar-nav me-3">
                            <li class="nav-item"><a class="nav-link" href="/categories">Businesses</a></li>
                            <li class="nav-item"><a class="nav-link" href="/events">Events</a></li>
                        </ul>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary me-2"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('register') }}">Join</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="">
            @yield('content')
        </main>

        <footer class="pt-5 pb-4 mt-5">
            <div class="container">
                <div class="row gy-4">
                    <!-- Brand / About -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <img src="/img/logo-footer.png" class="me-2 img-fluid" style="height:140px;">
                        </div>
                        <p class="small mb-0 mt-3">
                            Discover local businesses, events, and services across San Diego.
                            Connect with the people and places that keep the city thriving.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Quick Links</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1"><a href="/categories" class="text-decoration-none text-dark">Browse
                                    Businesses</a></li>
                            <li class="mb-1"><a href="/events" class="text-decoration-none text-dark">Upcoming
                                    Events</a></li>
                            <li class="mb-1"><a href="/register" class="text-decoration-none text-dark">Add Your
                                    Business</a></li>
                            <li class="mb-1"><a href="/contact" class="text-decoration-none text-dark">Contact
                                    Us</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Stay in the Loop</h6>
                        <p class="small">
                            Get updates on new businesses, events, and local opportunities delivered to your inbox.
                        </p>
                        
                        @if(session('success'))
                            <div class="alert alert-success small p-2 mb-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="small" action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <div class="input-group mb-2">
                                <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                             @error('email')
                                <div class="text-danger small mb-1">{{ $message }}</div>
                             @enderror
                            <div class="form-text small">
                                We'll never share your email with anyone else.
                            </div>
                        </form>
                    </div>
                </div>

                <hr class="my-4">

                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-muted">
                    <span>© 2025 San Diego Directory. All rights reserved.</span>
                    <div class="d-flex gap-3 mt-2 mt-md-0">
                        <a href="{{ route('page.show', 'privacy-policy') }}" class="text-decoration-none text-muted">Privacy Policy</a>
                        <a href="{{ route('page.show', 'terms-of-service') }}" class="text-decoration-none text-muted">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
