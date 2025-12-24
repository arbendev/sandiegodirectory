@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Events</li>
            </ol>
        </nav>

        {{-- HERO --}}
        <section class="mb-4">
            <div class="hero-card">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <h1 class="h4 fw-bold mb-1">
                            Upcoming Events
                        </h1>
                        <p class="small mb-0 text-muted">
                            Discover what's happening in San Diego, from festivals and markets to workshops and
                            networking.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- FILTERS + SEARCH (static visual) --}}
        <div class="row g-4 mb-3 align-items-end">
            <div class="col-lg-8">
                <div class="section-card p-3">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="small fw-semibold mb-1">Date</label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="small fw-semibold mb-1">Category</label>
                            <select class="form-select form-select-sm">
                                <option>All Categories</option>
                                <option>Music</option>
                                <option>Food &amp; Drink</option>
                                <option>Business</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="small fw-semibold mb-1">&nbsp;</label>
                            <button class="btn btn-primary btn-sm w-100">Find Events</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EVENTS LIST --}}
        <section>
            <div class="row g-3">

                @forelse($events as $event)
                <div class="col-12">
                    <a href="{{ route('events.show', $event->slug) }}" class="text-decoration-none text-dark">
                        <div class="hover-card">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <div class="date-badge">
                                        <div class="month">{{ $event->start_datetime->format('M') }}</div>
                                        <div class="day">{{ $event->start_datetime->format('d') }}</div>
                                        <div class="dow">{{ strtoupper($event->start_datetime->format('D')) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h6 fw-bold mb-1">
                                        {{ $event->title }}
                                    </h2>
                                    <div class="meta-text mb-1">
                                        {{ $event->location_name ?? 'San Diego' }} · {{ $event->start_datetime->format('g:i A') }}
                                        @if($event->end_datetime)
                                             - {{ $event->end_datetime->format('g:i A') }}
                                        @endif
                                    </div>
                                    <p class="small text-muted mb-1 text-truncate">
                                        {{ Str::limit(strip_tags($event->description), 100) }}
                                    </p>
                                    <div>
                                        @if($event->tags)
                                            @foreach(array_slice($event->tags, 0, 3) as $tag)
                                                <span class="pill">{{ $tag }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3 small text-muted">
                                    <div class="mb-1">
                                        👥 Hosted by: {{ $event->listing->title ?? $event->user->name }}
                                    </div>
                                    <div class="mb-1">
                                        💵 Tickets: {{ $event->price_type === 'paid' ? '$' . $event->price : 'Free' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-light text-center py-5">
                        <div class="h3 mb-3">📅</div>
                        <div class="fw-semibold">No upcoming events found.</div>
                        <p class="text-muted small">Check back later for new updates.</p>
                    </div>
                </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
            </div>
        </section>

    </div>
@endsection
