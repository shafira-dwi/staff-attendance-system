<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Staff\LeaveRequestController;
use App\Http\Controllers\Admin\LeaveApprovalController;
/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | STAFF
    |--------------------------------------------------------------------------
    */
    Route::prefix('staff')->name('staff.')->group(function () {

        Route::get('/dashboard', function () {
            return view('staff.dashboard');
        })->name('dashboard');

        // Attendance
        Route::get('/attendance', [AttendanceController::class, 'index'])
            ->name('attendance.index');

        Route::post('/attendance/clock-in', [AttendanceController::class, 'clockIn'])
            ->name('attendance.clockIn');

        Route::post('/attendance/clock-out', [AttendanceController::class, 'clockOut'])
            ->name('attendance.clockOut');

        // Leave
        Route::get('/leave', [LeaveRequestController::class, 'index'])
            ->name('leave.index');

        Route::post('/leave', [LeaveRequestController::class, 'store'])
            ->name('leave.store');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN (DUMMY UI ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/attendance', function () {
            return view('admin.attendance.index');
        })->name('attendance.index');

        // LEAVE APPROVAL
        Route::get('/leave-requests', [LeaveApprovalController::class, 'index'])
            ->name('leave.index');

        Route::post('/leave-requests/{id}/approve', [LeaveApprovalController::class, 'approve'])
            ->name('leave.approve');

        Route::post('/leave-requests/{id}/reject', [LeaveApprovalController::class, 'reject'])
            ->name('leave.reject');
    });
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, LOGOUT, dll)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
