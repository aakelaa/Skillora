<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\DashboardRedirectController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Client\JobController as ClientJobController;
use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\Freelancer\DashboardController as FreelancerDashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ---- Public routes ----
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public frontend pages (static views)
Route::view('/about', 'frontend.about')->name('about');
Route::view('/services', 'frontend.services')->name('services');
Route::view('/how', 'frontend.how')->name('how');
Route::view('/faq', 'frontend.faq')->name('faq');
Route::view('/privacy', 'frontend.privacy')->name('privacy');
Route::view('/terms', 'frontend.terms')->name('terms');

// Contact form (simple closure to avoid changing controllers)

Route::get('/contact', function ()
{
     return view('frontend.contact'); })
     ->name('contact');

Route::post('/contact', function (Request $request) {
    $request->validate(['email' => 'nullable|email', 'message' => 'nullable|string']);
    return back()->with('success', 'Thanks — we will get back to you soon.');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// ---- Auth required, any role ---
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/dashboard', DashboardRedirectController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');

    Route::get('/freelancer-profile', [FreelancerProfileController::class, 'edit'])->name('freelancer-profile.edit');
    Route::put('/freelancer-profile', [FreelancerProfileController::class, 'update'])->name('freelancer-profile.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::put('users/{user}/approve', [AdminUserController::class, 'approve'])->name('users.approve');
    Route::put('users/{user}/reject', [AdminUserController::class, 'reject'])->name('users.reject');
});

// Client routes
Route::middleware(['auth', 'role:client'])
    ->prefix('clients')
    ->name('clients.')
    ->group(function () {
        Route::get('/dashboard', [ClientDashboard::class, 'index'])->name('dashboard');
        Route::resource('jobs', ClientJobController::class)->except(['show']);

        Route::get('/jobs/{job}/applications', [ClientJobController::class, 'applications'])->name('jobs.applications');
        Route::put('/applications/{application}/hire', [ClientJobController::class, 'hire'])->name('applications.hire');
        Route::put('/applications/{application}/reject', [ClientJobController::class, 'reject'])->name('applications.reject');
    });

// Freelancer routes
Route::middleware(['auth', 'role:freelancer'])
    ->prefix('freelancer')
    ->name('freelancer.')
    ->group(function () {
        Route::get('/dashboard', [FreelancerDashboard::class, 'index'])->name('dashboard');
        Route::get('/applications', [FreelancerDashboard::class, 'applications'])->name('applications');
    });

//  Admin routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
        Route::resource('users', AdminUserController::class)->except(['show']);
    });

require __DIR__.'/auth.php';
