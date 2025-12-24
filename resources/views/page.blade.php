@extends('layouts.app')

@section('title', $page->title . ' - San Diego Directory')
@section('meta_description', Str::limit(strip_tags($page->content), 160))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="fw-bold mb-4">{{ $page->title }}</h1>
            
            <div class="section-card shadow-sm p-4 p-md-5 border-0 bg-white">
                <article class="prose">
                    {!! $page->content !!}
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
