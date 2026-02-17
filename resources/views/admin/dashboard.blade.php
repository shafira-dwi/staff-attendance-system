@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Overview</h1>
        <p class="text-gray-500">Staff Attendance Monitoring</p>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- Total Staff -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Staff</p>
                    <h2 class="text-3xl font-bold text-blue-600">{{ $totalStaff }}</h2>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600 text-xl">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <!-- Present Today -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Present Today</p>
                    <h2 class="text-3xl font-bold text-green-600">{{ $presentToday }}</h2>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600 text-xl">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <!-- Absent Today -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Absent Today</p>
                    <h2 class="text-3xl font-bold text-red-600">{{ $absentToday }}</h2>
                </div>
                <div class="bg-red-100 p-3 rounded-full text-red-600 text-xl">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
        </div>

        <!-- Pending Leave -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Pending Leave</p>
                    <h2 class="text-3xl font-bold text-yellow-600">{{ $pendingLeave }}</h2>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full text-yellow-600 text-xl">
                    <i class="fas fa-hourglass-half"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- TODAY ATTENDANCE TABLE -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Today's Attendance</h2>
            <a href="{{ route('admin.attendance.index') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                View All
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Check In</th>
                        <th class="px-4 py-3">Check Out</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($todayAttendance as $attendance)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">{{ $attendance->name }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $statusClass = match ($attendance->status) {
                                        'Present' => 'bg-green-100 text-green-600',
                                        'Late' => 'bg-yellow-100 text-yellow-600',
                                        'Absent' => 'bg-red-100 text-red-600',
                                        default => 'bg-gray-100 text-gray-600',
                                    };
                                @endphp
                                <span class="{{ $statusClass }} px-3 py-1 rounded-full text-xs">
                                    {{ $attendance->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $attendance->check_in?->format('h:i A') ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $attendance->check_out?->format('h:i A') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.attendance.index', $attendance->id) }}"
                                    class="text-blue-600 hover:underline">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
