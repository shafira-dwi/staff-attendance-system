<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\LeaveRequest;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $year = Carbon::now()->year;

        // Total Absensi
        $totalAttendance = Attendance::where('user_id', $userId)->count();

        // Total Pengajuan Cuti (semua status)
        $totalLeave = LeaveRequest::where('user_id', $userId)->count();

        // Cuti yang sudah di-ACC tahun ini
        $approvedLeaves = LeaveRequest::where('user_id', $userId)
            ->where('status', 'approved')
            ->whereYear('start_date', $year)
            ->get();

        $approvedCount = $approvedLeaves->count();

        // Hitung total hari cuti yang terpakai
        $usedLeaveDays = 0;
        foreach ($approvedLeaves as $leave) {
            $start = Carbon::parse($leave->start_date);
            $end = Carbon::parse($leave->end_date);
            $usedLeaveDays += $start->diffInDays($end) + 1;
        }

        // Sisa cuti (jatah 10 hari per tahun)
        $remainingLeave = max(10 - $usedLeaveDays, 0);

        // ⬇️ INI YANG KEMARIN HILANG
        return view('staff.dashboard', compact(
            'totalAttendance',
            'totalLeave',
            'approvedCount',
            'remainingLeave'
        ));
    }
}
