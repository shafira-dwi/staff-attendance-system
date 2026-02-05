<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Staff\LeaveRequestController;
use App\Http\Controllers\Admin\LeaveApprovalController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Staff\DashboardController;

Route::middleware('auth')->group(function () {

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware(['throttle:6,1'])->name('verification.send');
});


// ----- LOGIN / GUEST -----
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// LOGOUT (POST)
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// ----- ADMIN -----
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('attendance', [AttendanceController::class, 'adminIndex'])->name('attendance.index');
    Route::get('leave-requests', [LeaveApprovalController::class, 'index'])->name('leave.index');
    Route::post('leave-requests/{id}/approve', [LeaveApprovalController::class, 'approve'])->name('leave.approve');
    Route::post('leave-requests/{id}/reject', [LeaveApprovalController::class, 'reject'])->name('leave.reject');
    Route::resource('staff', StaffController::class);
});

// ----- STAFF -----
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('attendance/clock-in', [AttendanceController::class, 'clockIn'])->name('attendance.clockIn');
    Route::post('attendance/clock-out', [AttendanceController::class, 'clockOut'])->name('attendance.clockOut');
    Route::get('leave', [LeaveRequestController::class, 'index'])->name('leave.index');
    Route::get('leave/add', [LeaveRequestController::class, 'add'])
        ->name('leave.add');
    Route::post('leave', [LeaveRequestController::class, 'store'])->name('leave.store');
});

// ----- PROFILE -----
Route::middleware('auth')->group(function () {

    // Halaman lihat profile
    Route::get('/staff/profile', function () {
        return view('staff.profile');
    })->middleware(['auth'])->name('staff.profile');
});