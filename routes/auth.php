<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

   // Route to display the forgot password form
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
->name('password.request');

// Route to handle the forgot password form submission and redirect to the reset password form
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
->name('password.email'); // This route handles the form submission and validation

// Route to display the reset password form
Route::get('reset-password', [NewPasswordController::class, 'create'])
->name('password.reset');

// Route to handle the reset password form submission
Route::post('reset-password', [NewPasswordController::class, 'store'])
->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/FAQ', [FaqController::class, 'index'])->name('FAQ');