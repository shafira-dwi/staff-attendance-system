<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

// dummy dashboard tanpa login
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    });

    Route::get('/staff/attendance', [AttendanceController::class, 'index'])
        ->name('attendance.index');

    Route::post('/staff/attendance/clock-in', [AttendanceController::class, 'clockIn'])
        ->name('attendance.clockIn');

    Route::post('/staff/attendance/clock-out', [AttendanceController::class, 'clockOut'])
        ->name('attendance.clockOut');
});



require __DIR__ . '/auth.php';
