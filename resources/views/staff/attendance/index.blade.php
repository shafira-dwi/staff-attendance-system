@extends('layouts.staff')

@section('title', 'Staff Dashboard')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Staff Attendance</h2>

        {{-- Alert --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Timestamp --}}
        <div class="mb-4 text-sm text-gray-600">
            <p>Date: <strong>{{ now()->format('d M Y') }}</strong></p>
            <p>Clock In: <strong>{{ $attendance?->clock_in ?? '-' }}</strong></p>
            <p>Clock Out: <strong>{{ $attendance?->clock_out ?? '-' }}</strong></p>
        </div>

        {{-- Button --}}
        <div class="flex gap-3">
            <form method="POST" action="{{ route('staff.attendance.clockIn') }}">
                @csrf
                <button
                    class="px-4 py-2 rounded text-white
        {{ $alreadyClockedIn ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }}"
                    {{ $alreadyClockedIn ? 'disabled' : '' }}>
                    Clock In
                </button>
            </form>

            <form method="POST" action="{{ route('staff.attendance.clockOut') }}">
                @csrf
                <button
                    class="px-4 py-2 rounded text-white
        {{ !$canClockOut ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700' }}"
                    {{ !$canClockOut ? 'disabled' : '' }}>
                    Clock Out
                </button>
            </form>
        </div>
    </div>
@endsection
