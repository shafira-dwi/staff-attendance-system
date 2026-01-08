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
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', $today)
            ->first();

        return view('staff.attendance.index', compact('attendance'));
    }

    public function clockIn()
    {
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', $today)
            ->first();

        if ($attendance) {
            return back()->with('error', 'You already clocked in today.');
        }

        Attendance::create([
            'user_id' => auth()->id(),
            'date' => $today,
            'clock_in' => Carbon::now()->format('H:i:s'),
        ]);

        return back()->with('success', 'Clock in successful.');
    }

    public function clockOut()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', Carbon::today())
            ->first();

        if (!$attendance || $attendance->clock_out) {
            return back()->with('error', 'You cannot clock out.');
        }

        $attendance->update([
            'clock_out' => Carbon::now()->format('H:i:s'),
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
