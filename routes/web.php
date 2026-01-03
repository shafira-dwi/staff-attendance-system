<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Staff\DashboardController as StaffDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])
            ->name('admin.dashboard');
    });

    Route::prefix('staff')->group(function () {
        Route::get('/dashboard', [StaffDashboard::class, 'index'])
            ->name('staff.dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
