<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/* admin routes */
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login_submit', [AdminController::class, 'login_submit'])->name('admin.login_submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/forget-password', [AdminController::class, 'forgetPassword'])->name('admin.forgetPassword');
    Route::post('/forget-password_submit', [AdminController::class, 'forgetPassword_submit'])->name('admin.forgetPassword_submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'resetPassword'])->name('admin.resetPassword');
    Route::post('/reset-password_submit', [AdminController::class, 'resetPassword_submit'])->name('admin.resetPassword_submit');
});