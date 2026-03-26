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
                        class="px-4 py-2 rounded text-white {{ $alreadyClockedIn ? 'bg-black cursor-not-allowed' : 'bg-green-600 hover:bg-green-700' }}"
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
                                @php
                                    $status = match (true) {
                                        !$attendance->clock_in => 'Absent',
                                        $attendance->clock_in && $attendance->clock_in->format('H:i') > '13:00'
                                            => 'Late',
                                        default => 'Present',
                                    };

                                    $statusUI = match ($status) {
                                        'Present' => [
                                            'bg' => 'bg-green-100',
                                            'text' => 'text-green-600',
                                            'icon' => 'fa-check-circle',
                                        ],
                                        'Late' => [
                                            'bg' => 'bg-yellow-100',
                                            'text' => 'text-yellow-600',
                                            'icon' => 'fa-clock',
                                        ],
                                        'Absent' => [
                                            'bg' => 'bg-red-100',
                                            'text' => 'text-red-600',
                                            'icon' => 'fa-times-circle',
                                        ],
                                    };
                                @endphp
                                <div
                                    class="inline-flex items-center gap-2
                                        {{ $statusUI['bg'] }} {{ $statusUI['text'] }}
                                        px-3 py-1.5 rounded-full text-xs font-semibold">
                                    <i class="fas {{ $statusUI['icon'] }}"></i>
                                    {{ $status }}
                                </div>
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
