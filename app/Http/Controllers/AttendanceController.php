<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('clock_in', $today)
            ->first();

        $alreadyClockedIn = $attendance != null;
        $canClockOut = $attendance && $attendance->clock_out == null;

        return view('staff.attendance.index', compact('attendance', 'alreadyClockedIn', 'canClockOut'));
    }

    public function clockIn()
    {
        $today = date('Y-m-d');
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', $today)
            ->first();

        if ($attendance) {
            return back()->with('error', 'You already clocked in today.');
        }

        Attendance::create([
            'user_id' => auth()->id(),
            'date' => Carbon::today(),
            'clock_in' => Carbon::now(),
        ]);

        return back()->with('success', 'Clock in successful.');
    }

    public function clockOut()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', Carbon::today())
            ->whereNull('clock_out')
            ->first();

        if (!$attendance) {
            return back()->with('error', 'You cannot clock out.');
        }

        $attendance->update([
            'clock_out' => Carbon::now(),
        ]);

        return back()->with('success', 'Clock out successful.');
    }

    public function adminIndex(Request $request)
    {
        $query = Attendance::with('user');

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $attendances = $query->orderBy('date', 'desc')->get();
        $users = User::all();

        return view('admin.attendance.index', compact('attendances', 'users'));
    }
}
