<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function ()
{
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/profile', [MyProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/create', [MyProfileController::class, 'createProfile'])->name('profile.create');
    Route::post('/profile', [MyProfileController::class, 'storeProfile'])->name('profile.store');
    Route::get('/profile/edit', [MyProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [MyProfileController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [MyProfileController::class, 'deleteProfile'])->name('profile.delete');

    Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
    Route::post('/education', [EducationController::class, 'store'])->name('education.store');
    Route::get('/education/edit', [EducationController::class, 'edit'])->name('education.edit');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
