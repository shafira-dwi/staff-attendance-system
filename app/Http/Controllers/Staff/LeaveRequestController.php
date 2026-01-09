<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = auth()->user()
            ->leaveRequests()
            ->latest()
            ->get();

        return view('staff.leave.index', compact('leaveRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        $overlap = LeaveRequest::where('user_id', auth()->id())
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->exists();

        if ($overlap) {
            return back()->with('error', 'Leave dates overlap with existing leave.');
        }

        auth()->user()->leaveRequests()->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Leave request submitted');
    }
}