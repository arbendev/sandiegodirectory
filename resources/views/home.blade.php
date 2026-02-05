@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @if (auth()->user()->subscribed('default'))
                            <div class="mt-4 border-top pt-4">
                                <h5 class="fw-bold">Billing & Subscription</h5>
                                <p class="text-muted small">Manage your subscription, payment methods, and invoices.</p>
                                <a href="{{ route('billing.portal') }}" class="btn btn-outline-primary">
                                    Manage Billing
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
