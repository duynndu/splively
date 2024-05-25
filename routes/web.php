<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified', 'check-role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('film')->group(function () {
    Route::get('/', [FilmController::class, 'films']);
    Route::get('/{slug}', [FilmController::class, 'index']);
    Route::get('/{slug}/movie-booking', [FilmController::class, 'movieBooking']);
    Route::get('/{slug}/seat-booking', [FilmController::class, 'seatBooking']);
});
Route::get('/booking-type', [FilmController::class, 'bookingType']);
Route::get('/confirmation-screen', [FilmController::class, 'confirmationScreen']);


require __DIR__ . '/auth.php';
