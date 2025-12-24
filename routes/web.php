<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile-edit', [App\Http\Controllers\ListingController::class, 'edit'])->name('profile.edit');
Route::post('/profile-edit', [App\Http\Controllers\ListingController::class, 'update'])->name('profile.update');

Route::get('/profile-photos', [App\Http\Controllers\ListingImageController::class, 'index'])->name('profile.photos');
Route::post('/profile-photos', [App\Http\Controllers\ListingImageController::class, 'store'])->name('profile.photos.store');
Route::delete('/profile-photos/{id}', [App\Http\Controllers\ListingImageController::class, 'destroy'])->name('profile.photos.delete');

Route::get('/profile/{id}', [App\Http\Controllers\ListingController::class, 'show'])->name('profile.show');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/event/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
