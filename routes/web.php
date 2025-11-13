<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile-edit', function () {
    return view('profile-edit');
});

Route::get('/profile-photos', function () {
    return view('profile-photos');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/join', function () {
    return view('join');
});

Route::get('/join-success', function () {
    return view('join-success');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
