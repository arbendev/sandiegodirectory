<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'San Diego Directory') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <img src="#" class="me-2" style="border-radius:50%" alt="San Diego Directory Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            
                <ul class="navbar-nav ms-auto">

                    <ul class="navbar-nav me-3">
                        <li class="nav-item"><a class="nav-link" href="#">Businesses</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            <img src="https://via.placeholder.com/36" style="border-radius:50%" class="me-2" alt="Logo">
                            <span class="fw-bold">San Diego Directory</span>
                        </div>
                        <p class="small mb-0">
                            Discover local businesses, events, and services across San Diego. 
                            Connect with the people and places that keep the city thriving.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Quick Links</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1"><a href="#" class="text-decoration-none text-dark">Browse Businesses</a></li>
                            <li class="mb-1"><a href="#" class="text-decoration-none text-dark">Upcoming Events</a></li>
                            <li class="mb-1"><a href="#" class="text-decoration-none text-dark">Add Your Business</a></li>
                            <li class="mb-1"><a href="#" class="text-decoration-none text-dark">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Stay in the Loop</h6>
                        <p class="small">
                            Get updates on new businesses, events, and local opportunities delivered to your inbox.
                        </p>
                        <form class="small">
                            <div class="input-group mb-2">
                                <input type="email" class="form-control" placeholder="Your email address">
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                            <div class="form-text small">
                                We'll never share your email with anyone else.
                            </div>
                        </form>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-muted">
                    <span>© 2025 San Diego Directory. All rights reserved.</span>
                    <div class="d-flex gap-3 mt-2 mt-md-0">
                        <a href="#" class="text-decoration-none text-muted">Privacy Policy</a>
                        <a href="#" class="text-decoration-none text-muted">Terms of Service</a>
                        <a href="#" class="text-decoration-none text-muted">Support</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
