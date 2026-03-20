<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;
use App\Models\LeaveRequest;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $year = $today->year;

        // Total staff
        $totalStaff = User::count();

        // Attendance hari ini (semua staff)
        $todayAttendance = Attendance::with('user')
            ->whereDate('date', $today)
            ->get();

        $presentToday = $todayAttendance->whereNotNull('clock_in')->count();
        $lateToday = 0; // nanti bisa dihitung dari jam
        $absentToday = $totalStaff - $presentToday;
        $lateToday = $todayAttendance->where('status', 'Late')->count();
        $absentToday = $totalStaff - $todayAttendance->count();

        // Leave pending semua staff
        $pendingLeave = LeaveRequest::where('status', 'pending')->count();

        // ⬇️ Kirim ke Blade admin.dashboard
        return view('admin.dashboard', compact(
            'totalStaff',
            'presentToday',
            'lateToday',
            'absentToday',
            'pendingLeave',
            'todayAttendance'
        ));
    }
}