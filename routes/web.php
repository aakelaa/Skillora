<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\DashboardRedirectController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Client\JobController as ClientJobController;
use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\Freelancer\DashboardController as FreelancerDashboard;
use Illuminate\Support\Facades\Route;

// ---- Public routes ----
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// ---- Auth required, any role ----
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardRedirectController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');

    Route::get('/freelancer-profile', [FreelancerProfileController::class, 'edit'])->name('freelancer-profile.edit');
    Route::put('/freelancer-profile', [FreelancerProfileController::class, 'update'])->name('freelancer-profile.update');
});

// ---- Client routes: /client/* ----
Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {
        Route::get('/dashboard', [ClientDashboard::class, 'index'])->name('dashboard');
        Route::resource('jobs', ClientJobController::class)->except(['show']);
    });

// ---- Freelancer routes: /freelancer/* ----
Route::middleware(['auth', 'role:freelancer'])
    ->prefix('freelancer')
    ->name('freelancer.')
    ->group(function () {
        Route::get('/dashboard', [FreelancerDashboard::class, 'index'])->name('dashboard');
    });

// ---- Admin routes: /admin/* ----
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
    });

require __DIR__.'/auth.php'; // provided by Laravel Breeze (includes logout route)
