<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacatureController;

Route::get('/', function () {
    return view('auth.choose-login');
});

Route::get('/vacatures', [VacatureController::class, 'index'])->name('vacatures.index');
Route::get('/vacatures/create', [VacatureController::class, 'create'])->name('vacatures.create');
Route::post('/vacatures', [VacatureController::class, 'store'])->name('vacatures.store');
Route::get('/vacatures/{id}', [VacatureController::class, 'show'])->name('vacatures.show');
Route::get('/vacatures/{id}/edit', [VacatureController::class, 'edit'])->name('vacatures.edit');
Route::put('/vacatures/{id}', [VacatureController::class, 'update'])->name('vacatures.update');
route::delete('/vacatures/{id}', [VacatureController::class, 'destroy'])->name('vacatures.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
