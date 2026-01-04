<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dummy data sementara
        $data = [
            'totalStaff' => 15,
            'presentToday' => 10,
            'pendingLeave' => 3,
        ];

        return view('admin.dashboard', compact('data'));
    }
}
