<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobApplicationController;

// Public Routes
Route::redirect('/login', '/account/login');
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::view('/divisions', 'divisions')->name('divisions');
Route::view('/technology', 'technology')->name('technology');
Route::view('/robotics', 'robotics')->name('robotics');
Route::view('/home-systems', 'homesystems')->name('homesystems');
Route::view('/appliances', 'appliances')->name('appliances');
Route::view('/constraal-build', 'build')->name('build');
Route::view('/safety', 'safety')->name('safety');
Route::view('/about', 'about')->name('about');
Route::get('/company', function () {
    return view('about');
})->name('company');
Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-of-service', 'terms')->name('terms');
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/jobs/{job}/apply', [JobApplicationController::class, 'create'])->name('jobs.apply');
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply.store');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');

// Admin Routes (New Admin Panel)
Route::prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));

// Customer Portal Routes
Route::prefix('account')->name('account.')->middleware('web')->group(base_path('routes/customer.php'));

// CMS Routes - already defined in routes/admin.php with proper admin.auth middleware
// require __DIR__ . '/cms.php';
