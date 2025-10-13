<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/', [\App\Http\Controllers\LandingController::class, 'home'])->name('landing.home');
Route::get('/about', [\App\Http\Controllers\LandingController::class, 'about'])->name('landing.about');
Route::get('/services', [\App\Http\Controllers\LandingController::class, 'services'])->name('landing.services');
Route::get('/blogs', [\App\Http\Controllers\LandingController::class, 'blogs'])->name('landing.blogs');

Route::post('/feedbacks', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

Route::redirect('/admin', '/admin/dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');

    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::get('/settings', [\App\Http\Controllers\SystemSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [\App\Http\Controllers\SystemSettingController::class, 'store'])->name('settings.store');
    Route::post('/settings/social-media', [\App\Http\Controllers\SystemSettingController::class, 'storeSocialMedia'])->name('settings.store-social-media');

    Route::resource('users', \App\Http\Controllers\UserController::class);

    Route::resource('posts/categories', \App\Http\Controllers\PostCategoryController::class, ['as' => 'posts']);
    Route::resource('posts', \App\Http\Controllers\PostController::class);

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
    Route::get('/change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/change-password', [\App\Http\Controllers\ProfileController::class, 'doChangePassword'])->name('profile.change-password');

    Route::resource('feedbacks', \App\Http\Controllers\FeedbackController::class)->except('store');
});
