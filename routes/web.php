<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacatureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PreferencesController;

Route::get('/', function () {
    return view('auth.choose-login');
});

route::get('/preferences', [PreferencesController::class, 'index'])->name('preferences.index');
route::post('/preferences', [PreferencesController::class, 'store'])->name('preferences.store');


Route::get('/vacatures', [VacatureController::class, 'index'])->name('vacatures.index');
Route::get('/vacatures/create', [VacatureController::class, 'create'])->name('vacatures.create');
Route::post('/vacatures', [VacatureController::class, 'store'])->name('vacatures.store');
Route::get('/vacatures/{id}', [VacatureController::class, 'show'])->name('vacatures.show');
Route::get('/vacatures/{id}/edit', [VacatureController::class, 'edit'])->name('vacatures.edit');
Route::put('/vacatures/{id}', [VacatureController::class, 'update'])->name('vacatures.update');
route::delete('/vacatures/{id}', [VacatureController::class, 'destroy'])->name('vacatures.destroy');

route::get('/students', [StudentController::class, 'index'])->name('students.index');
route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
route::post('/students', [StudentController::class, 'store'])->name('students.store');
route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // deze route zorgt ervoor dat alleen geverifieerde gebruikers toegang hebben tot het dashboard, wanneer een gebruiker probeert toegang te krijgen tot het dashboard zonder geverifieerd te zijn, wordt hij automatisch doorgestuurd naar de verificatiepagina


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
