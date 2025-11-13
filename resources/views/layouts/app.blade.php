<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'San Diego Directory') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background: #faf6ef;
        }

        .hero-section {
            background: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            color: white;
            padding: 120px 0;
            text-align: center;
        }

        .category-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            text-align: center;
            transition: 0.2s;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .map-box {
            border-radius: 16px;
            overflow: hidden;
            background: #ddd;
        }

        .map-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .business-card {
            border-radius: 16px;
            overflow: hidden;
            min-width: 210px;
        }

        .business-card img {
            height: 130px;
            object-fit: cover;
        }

        .event-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        footer {
            background: #f2e9dc;
            border-top: 1px solid rgba(0,0,0,0.05);
        }



    .business-hero-card {
        border-radius: 18px;
        overflow: hidden;
        background: white;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .business-hero-cover {
        height: 260px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .business-hero-cover::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.55), rgba(0,0,0,0.05));
    }

    .business-hero-content {
        margin-top: -80px;
        position: relative;
        z-index: 2;
    }

    .business-logo {
        width: 96px;
        height: 96px;
        border-radius: 20px;
        border: 4px solid #fff;
        object-fit: cover;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        background: #f8f4ea;
    }

    .badge-soft {
        background: rgba(0, 123, 255, 0.08);
        color: #0d6efd;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 0.75rem;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 22px 24px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
    }

    .tag-pill {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        background: #f4ece0;
        font-size: 0.8rem;
        margin: 0 6px 6px 0;
    }

    .photo-scroll {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        padding-bottom: 4px;
    }

    .photo-scroll img {
        border-radius: 14px;
        height: 140px;
        width: 220px;
        object-fit: cover;
        flex: 0 0 auto;
    }

    .rating-stars {
        color: #f5b300;
        letter-spacing: 1px;
    }

    .map-embed-placeholder {
        border-radius: 12px;
        overflow: hidden;
        background: #ddd;
        height: 220px;
    }

    .opening-hours-row {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        padding: 4px 0;
    }


    .categories-hero {
        padding: 40px 0 10px;
    }

    .categories-hero-card {
        background: white;
        border-radius: 18px;
        padding: 24px 26px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .category-grid-card {
        background: white;
        border-radius: 16px;
        padding: 18px 18px 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        transition: 0.2s;
        height: 100%;
        cursor: pointer;
    }

    .category-grid-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .category-icon-badge {
        width: 40px;
        height: 40px;
        border-radius: 14px;
        background: #f3eadf;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-right: 10px;
    }

    .category-sub-pill {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        background: #f6eee2;
        font-size: 0.78rem;
        margin: 0 5px 5px 0;
        white-space: nowrap;
    }

    .category-meta {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .alphabet-filter button {
        border-radius: 999px;
        padding: 4px 9px;
        font-size: 0.78rem;
    }

    .alphabet-filter button.active {
        background: #0d6efd;
        color: #fff;
    }

    .category-section-heading {
        font-size: 0.9rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }


    .category-header-card {
        background: white;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .category-icon-badge-lg {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        background: #f3eadf;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin-right: 14px;
    }

    .badge-soft {
        background: rgba(13, 110, 253, 0.08);
        color: #0d6efd;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 0.75rem;
    }

    .subcat-pill {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        background: #f6eee2;
        font-size: 0.78rem;
        margin: 0 5px 5px 0;
        white-space: nowrap;
    }

    .business-list-card {
        background: white;
        border-radius: 16px;
        padding: 14px 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        transition: 0.2s;
    }

    .business-list-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .business-thumb {
        width: 110px;
        height: 80px;
        border-radius: 12px;
        object-fit: cover;
    }

    .rating-stars {
        color: #f5b300;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .business-meta {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .filter-chip {
        border-radius: 999px;
        font-size: 0.78rem;
        border: 1px solid rgba(0,0,0,0.08);
        background: #faf6ef;
    }

    .filter-chip.active {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .map-preview {
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        height: 220px;
    }

    .map-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }



    .events-hero {
        background: linear-gradient(135deg, #f6ead7, #fdf7ed);
        border-radius: 18px;
        padding: 26px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .events-hero-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
    }

    .events-stat-pill {
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 6px 10px;
        background: rgba(0,0,0,0.03);
    }

    .event-card-main {
        background: white;
        border-radius: 16px;
        padding: 16px 18px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        transition: 0.2s;
        height: 100%;
    }

    .event-card-main:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .event-date-badge {
        width: 56px;
        border-radius: 12px;
        background: #f3eadf;
        text-align: center;
        padding: 6px 0;
        font-size: 0.85rem;
        line-height: 1.1;
    }

    .event-date-badge .month {
        text-transform: uppercase;
        font-weight: 700;
        font-size: 0.7rem;
        color: #8a7d6a;
    }

    .event-date-badge .day {
        font-weight: 700;
        font-size: 1.1rem;
        color: #2b261f;
    }

    .event-date-badge .dow {
        font-size: 0.65rem;
        color: #a0907c;
    }

    .event-meta {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .event-tag-pill {
        display: inline-block;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 3px 9px;
        background: #f6eee2;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .filter-chip {
        border-radius: 999px;
        font-size: 0.78rem;
        border: 1px solid rgba(0,0,0,0.08);
        background: #faf6ef;
    }

    .filter-chip.active {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    .event-calendar-card {
        background: white;
        border-radius: 16px;
        padding: 16px 18px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 6px;
        font-size: 0.75rem;
    }

    .calendar-day-header {
        text-align: center;
        font-weight: 600;
        color: #8a7d6a;
    }

    .calendar-day {
        text-align: center;
        padding: 6px 0;
        border-radius: 999px;
        background: #f3eadf;
        cursor: pointer;
    }

    .calendar-day.muted {
        opacity: 0.4;
        background: transparent;
    }

    .calendar-day.has-event {
        background: #0d6efd;
        color: #fff;
        font-weight: 600;
    }

    .event-mini-card {
        background: #faf6ef;
        border-radius: 12px;
        padding: 8px 10px;
        font-size: 0.8rem;
        margin-bottom: 6px;
    }

    .event-mini-card strong {
        display: block;
    }

    .map-mini {
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        height: 200px;
        margin-top: 8px;
    }

    .map-mini img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }


    .event-hero-card {
        background: white;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .event-hero-cover {
        height: 220px;
        background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .event-hero-cover::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.6), rgba(0,0,0,0.1));
    }

    .event-hero-content {
        position: relative;
        margin-top: -70px;
        z-index: 2;
        padding: 0 24px 20px;
    }

    .event-date-badge-lg {
        width: 70px;
        height: 90px;
        border-radius: 16px;
        background: #faf6ef;
        text-align: center;
        padding-top: 6px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    .event-date-badge-lg .month {
        text-transform: uppercase;
        font-weight: 700;
        font-size: 0.75rem;
        color: #8a7d6a;
    }

    .event-date-badge-lg .day {
        font-weight: 700;
        font-size: 1.4rem;
        color: #2b261f;
        line-height: 1.1;
    }

    .event-date-badge-lg .dow {
        font-size: 0.7rem;
        color: #a0907c;
    }

    .event-hero-text h1 {
        color: #fff;
        text-shadow: 0 2px 6px rgba(0,0,0,0.35);
    }

    .event-hero-meta {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.85);
    }

    .event-label-pill {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.12);
        color: #fff;
        font-size: 0.78rem;
        margin-right: 6px;
        backdrop-filter: blur(3px);
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .timeline-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: #0d6efd;
        margin-top: 5px;
    }

    .timeline-line {
        width: 1px;
        background: rgba(0,0,0,0.1);
        flex-grow: 1;
        margin: 2px auto 0;
    }

    .timeline-item-time {
        font-size: 0.8rem;
        color: #8a7d6a;
        white-space: nowrap;
    }

    .timeline-item-title {
        font-size: 0.9rem;
        font-weight: 600;
    }

    .event-tag-pill {
        display: inline-block;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: #f6eee2;
        margin: 0 5px 5px 0;
    }

    .speaker-card {
        background: #faf6ef;
        border-radius: 14px;
        padding: 10px 12px;
        font-size: 0.85rem;
        margin-bottom: 8px;
    }

    .speaker-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .map-embed {
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        height: 220px;
    }

    .map-embed img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .ticket-badge {
        display: inline-block;
        font-size: 0.75rem;
        border-radius: 999px;
        padding: 3px 9px;
        background: rgba(13, 110, 253, 0.08);
        color: #0d6efd;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .faq-item {
        border-bottom: 1px solid rgba(0,0,0,0.04);
        padding-bottom: 8px;
        margin-bottom: 8px;
    }

    .faq-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }


    .join-hero-card {
        background: white;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .join-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
    }

    .step-pill {
        display: flex;
        align-items: center;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: #faf2e5;
        color: #6d5b44;
        margin-right: 6px;
    }

    .step-pill.active {
        background: #0d6efd;
        color: #fff;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .hint-text {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .plan-card {
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.06);
        padding: 16px 18px;
        background: #fff;
    }

    .plan-card.featured {
        border-color: #0d6efd;
        box-shadow: 0 4px 16px rgba(13,110,253,0.15);
    }

    .plan-price {
        font-size: 1.4rem;
        font-weight: 700;
    }

    .plan-tag {
        font-size: 0.75rem;
        border-radius: 999px;
        padding: 3px 8px;
        background: rgba(13,110,253,0.08);
        color: #0d6efd;
        margin-left: 6px;
    }

    .payment-summary {
        background: #faf6ef;
        border-radius: 14px;
        padding: 12px 14px;
        font-size: 0.88rem;
    }

    .payment-label {
        font-size: 0.8rem;
        color: #8a7d6a;
        margin-bottom: 4px;
    }

    .payment-box {
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,0.1);
        padding: 10px 12px;
        background: #ffffff;
        min-height: 54px;
    }

    .secure-text {
        font-size: 0.75rem;
        color: #8a7d6a;
    }


    .success-hero-card {
        background: white;
        border-radius: 18px;
        padding: 26px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .success-icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #e6f4ea;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: #198754;
        margin-right: 14px;
    }

    .success-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(25, 135, 84, 0.08);
        color: #198754;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .hint-text {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .progress-bar-wrapper {
        background: #f5ece0;
        border-radius: 999px;
        overflow: hidden;
        height: 10px;
    }

    .progress-bar-inner {
        background: linear-gradient(90deg, #0d6efd, #198754);
        height: 100%;
        width: 40%;
    }

    .checklist-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 8px;
        font-size: 0.88rem;
    }

    .checklist-icon {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        margin-right: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .checklist-icon.done {
        background: #198754;
        color: #fff;
    }

    .checklist-icon.todo {
        background: #f0e5d7;
        color: #8a7d6a;
    }

    .action-pill {
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.08);
        padding: 6px 10px;
        font-size: 0.78rem;
        background: #faf6ef;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .card-mini {
        background: #faf6ef;
        border-radius: 14px;
        padding: 10px 12px;
        font-size: 0.84rem;
    }

    .tag-pill {
        display: inline-block;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 3px 9px;
        background: #f6eee2;
        margin-right: 4px;
        margin-bottom: 4px;
    }




    .dash-hero-card {
        background: white;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .dash-hero-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
    }

    .dash-stat-card {
        background: white;
        border-radius: 16px;
        padding: 16px 18px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        height: 100%;
    }

    .dash-stat-label {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .dash-stat-value {
        font-size: 1.4rem;
        font-weight: 700;
    }

    .dash-stat-sub {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .hint-text {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .progress-wrapper {
        background: #f5ece0;
        border-radius: 999px;
        overflow: hidden;
        height: 10px;
    }

    .progress-inner {
        background: linear-gradient(90deg, #0d6efd, #198754);
        height: 100%;
        width: 60%;
    }

    .checklist-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 8px;
        font-size: 0.85rem;
    }

    .checklist-icon {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        margin-right: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .checklist-icon.done {
        background: #198754;
        color: #fff;
    }

    .checklist-icon.todo {
        background: #f0e5d7;
        color: #8a7d6a;
    }

    .tag-pill {
        display: inline-block;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 3px 9px;
        background: #f6eee2;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .activity-item {
        padding: 8px 0;
        border-bottom: 1px solid rgba(0,0,0,0.04);
        font-size: 0.84rem;
    }

    .activity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .activity-time {
        font-size: 0.75rem;
        color: #8a7d6a;
    }

    .review-card {
        border-radius: 14px;
        background: #faf6ef;
        padding: 10px 12px;
        font-size: 0.84rem;
        margin-bottom: 8px;
    }

    .review-stars {
        color: #f5b300;
        font-size: 0.9rem;
    }

    .quick-link-pill {
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.08);
        padding: 6px 10px;
        font-size: 0.78rem;
        background: #faf6ef;
        display: inline-flex;
        align-items: center;
        margin: 0 4px 6px 0;
    }

    .quick-link-pill span {
        margin-left: 4px;
    }

    .mini-table {
        width: 100%;
        font-size: 0.83rem;
    }

    .mini-table th {
        font-weight: 600;
        color: #8a7d6a;
        padding: 6px 0;
        border-bottom: 1px solid rgba(0,0,0,0.04);
    }

    .mini-table td {
        padding: 6px 0;
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }

    .status-pill {
        font-size: 0.72rem;
        border-radius: 999px;
        padding: 2px 8px;
        background: #e6f4ea;
        color: #198754;
    }

    .status-pill.pending {
        background: #fff4e5;
        color: #c47f06;
    }


    .profile-hero-card {
        background: white;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .profile-hero-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .hint-text {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .logo-preview {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #f3eadf;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-right: 12px;
    }

    .logo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cover-preview {
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        height: 130px;
    }

    .cover-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .tag-pill {
        display: inline-block;
        font-size: 0.78rem;
        border-radius: 999px;
        padding: 3px 9px;
        background: #f6eee2;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .hours-table {
        width: 100%;
        font-size: 0.83rem;
    }

    .hours-table th,
    .hours-table td {
        padding: 4px 0;
    }

    .map-mini {
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        height: 200px;
        margin-top: 6px;
    }

    .map-mini img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .save-bar {
        position: sticky;
        bottom: 0;
        left: 0;
        right: 0;
        padding-top: 10px;
        margin-top: 10px;
        background: linear-gradient(to top, #faf6ef, rgba(250,246,239,0.3));
    }

    .badge-soft {
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 0.75rem;
    }



    .photos-hero-card {
        background: white;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    .photos-hero-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 4px 10px;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
    }

    .section-card {
        background: white;
        border-radius: 16px;
        padding: 20px 22px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        margin-bottom: 14px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #8a7d6a;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 4px;
    }

    .hint-text {
        font-size: 0.8rem;
        color: #8a7d6a;
    }

    .photo-tile {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        background: #ddd;
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .photo-tile img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
    }

    .photo-tile:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.12);
    }

    .photo-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.1));
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 8px;
        opacity: 0;
        transition: opacity 0.15s ease;
    }

    .photo-tile:hover .photo-overlay {
        opacity: 1;
    }

    .photo-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 2px 8px;
        font-size: 0.7rem;
        background: rgba(0,0,0,0.55);
        color: #fff;
    }

    .photo-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .photo-actions .btn {
        padding: 3px 8px;
        font-size: 0.7rem;
    }

    .upload-dropzone {
        border-radius: 16px;
        border: 1px dashed rgba(0,0,0,0.25);
        background: #faf6ef;
        padding: 22px 18px;
        text-align: center;
    }

    .upload-icon-circle {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #f3eadf;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-size: 1.3rem;
    }

    .queue-item {
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,0.06);
        padding: 8px 10px;
        background: #fff;
        font-size: 0.84rem;
        margin-bottom: 6px;
    }

    .queue-progress {
        height: 4px;
        border-radius: 999px;
        overflow: hidden;
        background: #f1e5d6;
        margin-top: 4px;
    }

    .queue-progress-inner {
        height: 100%;
        width: 40%;
        background: #0d6efd;
    }

    .photo-type-pill {
        font-size: 0.72rem;
        border-radius: 999px;
        padding: 2px 8px;
        background: rgba(0,0,0,0.04);
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .photo-type-pill.active {
        background: rgba(13,110,253,0.12);
        color: #0d6efd;
    }

    .save-bar {
        position: sticky;
        bottom: 0;
        left: 0;
        right: 0;
        padding-top: 10px;
        margin-top: 10px;
        background: linear-gradient(to top, #faf6ef, rgba(250,246,239,0.3));
    }
    </style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
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

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="pt-5 pb-4 mt-5">
            <div class="container">
                <div class="row gy-4">
                    <!-- Brand / About -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://via.placeholder.com/36" style="border-radius:50%" class="me-2" alt="Logo">
                            <span class="fw-bold">SD Directory</span>
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
