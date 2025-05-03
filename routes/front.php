<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;
// route profile
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/plants', [ProfileController::class, 'plants'])->name('plants');
    Route::post('/plant', [ProfileController::class, 'savePlant'])->name('plant.store');


    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/photo-profile', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::put('/reset-password', [ProfileController::class, 'resetPass'])->name('profile.resetPass');
    Route::get('/guides', [ProfileController::class, 'guides'])->name('guides');
});

Route::get('/', [FrontendController::class, 'index'])->name('about');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('plants', [FrontendController::class, 'plants'])->name('plants.liste');

Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);