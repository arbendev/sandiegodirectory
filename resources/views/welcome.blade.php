@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Discover, Connect, and Grow — <br>The Ultimate San Diego Business Hub</h1>
            <div class="mt-4">
                <a href="#" class="btn btn-primary btn me-2">Find Businesses</a>
                <a href="#" class="btn btn-warning btn">Add Your Business</a>
            </div>
        </div>
    </section>

    <!-- FEATURED CATEGORIES -->
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-4">Featured Categories</h2>

        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-2">
                <a href="/category">
                    <div class="category-card">
                        <img src="/img/icon-dinning.png" class="img-fluid"
                            style="width:35%;"><br><strong>Restaurants</strong>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card">
                    <img src="/img/icon-real-estate.png" class="img-fluid" style="width:35%;"><br><strong>Real
                        Estate</strong>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card">
                    <img src="/img/icon-fitness.png" class="img-fluid" style="width:35%;"><br><strong>Health &
                        Fitness</strong>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card">
                    <img src="/img/icon-services.png" class="img-fluid" style="width:35%;"><br><strong>
                        Services</strong>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card">
                    <img src="/img/icon-shopping.png" class="img-fluid" style="width:35%;"><br><strong>Local Shops</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP + FEATURED BUSINESSES -->
    <div class="container pb-4">
        <div class="row g-4 align-items-start">
            <!-- MAP -->
            <div class="col-lg-5">
                <div class="map-box" style="height: 300px;">
                    <img src="/img/map-temp.jpg" alt="Map" class="img-fluid">
                </div>
            </div>

            <!-- FEATURED BUSINESSES -->
            <div class="col-lg-7">
                <h3 class="fw-bold mb-3 text-center text-lg-start">Featured Businesses</h3>
                <div class="d-flex gap-3 overflow-auto pb-2">

                    <!-- Business 1 -->
                    <div class="card business-card border-0 shadow-sm">
                        <a href="/profile">
                            <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=600&q=80"
                                class="card-img-top" alt="Café Luna">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Café Luna</h6>
                                <div class="small text-warning">★★★★★</div>
                            </div>
                        </a>
                    </div>

                    <!-- Business 2 -->
                    <div class="card business-card border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1523755231516-e43fd2e8dca5?auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Creative Co.">
                        <div class="card-body">
                            <h6 class="card-title mb-1">Creative Co.</h6>
                            <div class="small text-warning">★★★★☆</div>
                        </div>
                    </div>

                    <!-- Business 3 -->
                    <div class="card business-card border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=600&q=80"
                            class="card-img-top" alt="Café Luna">
                        <div class="card-body">
                            <h6 class="card-title mb-1">Café Luna</h6>
                            <div class="small text-warning">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOCAL EVENTS -->
    <div class="container pb-2">
        <h3 class="fw-bold mb-4">Local Events</h3>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="event-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-date-badge">
                                <div class="month">APR</div>
                                <div class="day">13</div>
                                <div class="dow">SAT</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5 class="mt-2 mb-1">Business Networking</h5>
                            <small>San Diego Convention Center</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="event-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-date-badge">
                                <div class="month">APR</div>
                                <div class="day">18</div>
                                <div class="dow">SAT</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5 class="mt-2 mb-1">Small Business Expo</h5>
                            <small>Downtown San Diego</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="event-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-date-badge">
                                <div class="month">APR</div>
                                <div class="day">24</div>
                                <div class="dow">SAT</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5 class="mt-2 mb-1">Local Food Festival</h5>
                            <small>La Jolla</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="event-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-date-badge">
                                <div class="month">APR</div>
                                <div class="day">30</div>
                                <div class="dow">SAT</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5 class="mt-2 mb-1">Local Food Festival</h5>
                            <small>La Jolla</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
