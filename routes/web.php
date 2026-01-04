<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// dummy dashboard tanpa login
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return redirect()->route('login');
});


require __DIR__ . '/auth.php';
