<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\ImageCarouselController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'tech-admin', 'as' => 'admin.'], function () {
    // auth
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.store');
});

Route::group(['middleware' => ['auth:admin', 'auth.admin', 'role:admin'], 'prefix' => "tech-admin", 'as' => "admin."], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('carousel-preview', [ImageCarouselController::class, 'preview'])->name('carousel.preview');
    Route::resource('carousel', ImageCarouselController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('teams', TeamsController::class);


    Route::get('users', [UsersController::class, 'liste'])->name('users.liste');
    Route::get('user/{email}', [UsersController::class, 'show'])->name('user.show');


    Route::get('profile', [AdminProfilController::class, 'profile'])->name('profile');
    Route::put('profile', [AdminProfilController::class, 'updateProfile'])->name('profile.update');
    Route::put('password-reset', [AdminProfilController::class, 'updatePass'])->name('password.reset');

    // 
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::middleware('role:Ct0')->group(function () {

        Route::get('admins-liste', [AdminController::class, 'admin'])->name('admin');
        Route::get('admin/{admin}/roles', [AdminRoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('admin/{admin}/roles', [AdminRoleController::class, 'update'])->name('admin.roles.update');
        Route::get('admin/{admin}/permissions', [AdminPermissionController::class, 'edit'])->name('admin.permissions.edit');
        Route::put('admin/{admin}/permissions', [AdminPermissionController::class, 'update'])->name('admin.permissions.update');
    });

    Route::get('guides', [AdminController::class, 'guide'])->name('guide');

    // logout 
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
});
