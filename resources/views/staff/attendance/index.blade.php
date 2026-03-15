@extends('layouts.staff')

@section('title', 'Staff Dashboard')

@section('content')
    <div class="flex flex-col gap-6">

        <!-- Card / Header -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4">Staff Attendance</h2>

            {{-- Alerts --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
            @endif

            {{-- Timestamp --}}
            <div class="mb-4 text-sm text-gray-600">
                <p>Date: <strong>{{ now()->format('d M Y') }}</strong></p>
                <p>Clock In: <strong>{{ $attendance?->clock_in ?? '-' }}</strong></p>
                <p>Clock Out: <strong>{{ $attendance?->clock_out ?? '-' }}</strong></p>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <form method="POST" action="{{ route('staff.attendance.clockIn') }}">
                    @csrf
                    <button
                        class="px-4 py-2 rounded text-white {{ $alreadyClockedIn ? 'bg-black cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }}"
                        {{ $alreadyClockedIn ? 'disabled' : '' }}>
                        Check In
                    </button>
                </form>

                <form method="POST" action="{{ route('staff.attendance.clockOut') }}">
                    @csrf
                    <button
                        class="px-4 py-2 rounded text-white {{ !$canClockOut ? 'bg-black cursor-not-allowed' : 'bg-red-600 hover:bg-red-700' }}"
                        {{ !$canClockOut ? 'disabled' : '' }}>
                        Check Out
                    </button>
                </form>
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="bg-white p-6 rounded-xl shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Clock In</th>
                        <th class="px-4 py-3">Clock Out</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($attendances as $attendance)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ $attendance->clock_in ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $attendance->clock_out ?? '-' }}</td>
                            <td class="px-4 py-3">
                                @if ($attendance->status === 'present')
                                    <span
                                        class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">Present</span>
                                @elseif($attendance->status === 'late')
                                    <span
                                        class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-medium">Late</span>
                                @elseif($attendance->status === 'absent')
                                    <span
                                        class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium">Absent</span>
                                @else
                                    <span
                                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-400">No attendance data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
