<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AdminController;

    Route::resource('pets', AnimalController::class);
    Route::get('/pets', [AnimalController::class, 'index'])->name('pets.index');
    Route::get('/pets/search', [AnimalController::class, 'search'])->name('pets.search');
    Route::get('/pets/{id}', [AnimalController::class, 'show'])->name('pets.show');
    Route::get('/pets/create', [AnimalController::class, 'create'])->name('pets.create');
    Route::post('/pets', [AnimalController::class, 'store'])->name('pets.store');
    Route::get('/pets/edit/{id}', [AnimalController::class, 'edit'])->name('pets.edit');
    Route::patch('/pets/{id}', [AnimalController::class, 'update'])->name('pets.update');
    Route::delete('/pets/{id}', [AnimalController::class, 'destroy'])->name('pets.destroy');

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/picture/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.picture.upload');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Auth\RegisteredUserController;
Route::middleware(['web'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::get('/locale/{lang}', [LanguageController::class, 'setLocale'])->name('setLocale');

Route::get('/admin', [AdminController::class, 'index'])->name('adminDashboard');
Route::put('/admin/promote', [AdminController::class, 'promote'])->name('admin.promote');
Route::put('/admin/demote', [AdminController::class, 'demote'])->name('admin.demote');


require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('reset-password/{token}/{username}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::put('reset-password', [NewPasswordController::class, 'store'])->name('password.update');