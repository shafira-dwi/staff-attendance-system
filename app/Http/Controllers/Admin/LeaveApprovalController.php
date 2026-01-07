<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    public function approve($id)
    {
        LeaveRequest::where('id', $id)->update([
            'status' => 'approved',
            'approved_by' => 1 // dummy admin id
        ]);

        return back();
    }

    public function reject($id)
    {
        LeaveRequest::where('id', $id)->update([
            'status' => 'rejected',
            'approved_by' => 1
        ]);

        return back();
    }
}
