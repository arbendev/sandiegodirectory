@extends('layouts.app')
@section('title', 'Login - San Diego Directory')
@section('meta_description', 'Log in to your San Diego Directory account to manage your business listing, write reviews, and save favorites.')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <h1 class="h3 fw-bold">Welcome back</h1>
                <p class="text-muted small">
                    Log in to manage your business or write reviews.
                </p>
            </div>

            <div class="section-card shadow-sm p-4 border-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label small fw-semibold mb-0">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="remember">
                                {{ __('Keep me logged in') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary py-2 fw-semibold">
                            {{ __('Log In') }}
                        </button>
                    </div>

                    <div class="text-center small text-muted">
                        Don't have an account yet? 
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Join now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
