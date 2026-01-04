@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">Total Staff</div>
        <div class="bg-white p-4 rounded shadow">Today Attendance</div>
        <div class="bg-white p-4 rounded shadow">Pending Leave</div>
    </div>
@endsection
