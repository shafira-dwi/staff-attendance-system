@extends('layouts.staff')

@section('content')
    <h1 class="text-xl font-bold mb-4">Staff Dashboard</h1>

    <a href="{{ route('staff.attendance.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
        Go to Attendance
    </a>
@endsection
