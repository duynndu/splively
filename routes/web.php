<?php

use App\Livewire\Dashboard;
use App\Livewire\Rooms;
use App\Livewire\Films;

use App\Livewire\Genres;                                                                                                                                        
use App\Livewire\Screenings;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
Route::get('/', [HomeController::class, 'index']);
Route::prefix('film')->group(function () {
    Route::get('/', [FilmController::class, 'films']);
    Route::get('/{slug}', [FilmController::class, 'index']);
    Route::get('/{slug}/movie-booking', [FilmController::class, 'movieBooking']);
    Route::get('/{slug}/seat-booking', [FilmController::class, 'seatBooking']);
});
Route::get('/booking-type', [FilmController::class, 'bookingType']);
Route::get('/confirmation-screen', [FilmController::class, 'confirmationScreen']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'check-role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', Dashboard::class)->name('dashboard');
        Route::get('rooms', Rooms::class)->name('rooms');
        Route::get('films', Films::class)->name('films');
        Route::get('genres', Genres::class)->name('films');
        Route::get('screenings', Screenings::class)->name('screenings');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
