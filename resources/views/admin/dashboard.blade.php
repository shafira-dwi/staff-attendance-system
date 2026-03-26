@extends('layouts.admin')

@section('content')
    <div class="space-y-6">

        <!-- HEADER -->
        <div class="mb-6 relative z-10">
            <h1 class="text-4xl font-bold">
                <span class="text-slate-800 font-serif">Dashboard</span>
            </h1>
            <p class="text-slate-500 mt-2">
                Attendance Control Center
            </p>
        </div>


        <!-- SUMMARY CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- CARD -->
            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs uppercase tracking-widest">Total Staff</p>
                <h2 class="text-4xl font-semibold text-slate-800 mt-3">{{ $totalStaff }}</h2>
                <div class="w-10 h-[2px] bg-blue-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs uppercase tracking-widest">Present Today</p>
                <h2 class="text-4xl font-semibold text-emerald-600 mt-3">{{ $presentToday }}</h2>
                <div class="w-10 h-[2px] bg-emerald-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs uppercase tracking-widest">Absent Today</p>
                <h2 class="text-4xl font-semibold text-rose-600 mt-3">{{ $absentToday }}</h2>
                <div class="w-10 h-[2px] bg-rose-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs uppercase tracking-widest">Pending Leave</p>
                <h2 class="text-4xl font-semibold text-amber-500 mt-3">{{ $pendingLeave }}</h2>
                <div class="w-10 h-[2px] bg-amber-400 mx-auto mt-3 rounded-full"></div>
            </div>

        </div>


        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- ATTENDANCE -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow border border-slate-100 p-6">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-slate-700">
                        Today Attendance
                    </h2>

                    <a href="{{ route('admin.attendance.index') }}"
                        class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:scale-105 transition">
                        View History
                    </a>
                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead>
                            <tr class="text-slate-400 text-xs uppercase">
                                <th class="text-left py-3">Staff</th>
                                <th>Status</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @foreach ($todayAttendance as $attendance)
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

                                <tr class="hover:bg-slate-50 transition">

                                    <td class="py-4">
                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-400 to-purple-400 text-white flex items-center justify-center font-semibold">
                                                {{ strtoupper(substr($attendance->user->name ?? '-', 0, 1)) }}
                                            </div>

                                            <span class="font-medium text-slate-800">
                                                {{ $attendance->user->name ?? '-' }}
                                            </span>

                                        </div>
                                    </td>

                                    <td>
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold {{ $statusUI['bg'] }} {{ $statusUI['text'] }}">
                                            <i class="fas {{ $statusUI['icon'] }}"></i>
                                            {{ $status }}
                                        </span>
                                    </td>

                                    <td class="text-center font-medium text-slate-700">
                                        {{ $attendance->clock_in?->format('H:i') ?? '-' }}
                                    </td>

                                    <td class="text-center font-medium text-slate-700">
                                        {{ $attendance->clock_out?->format('H:i') ?? '-' }}
                                    </td>

                                    <td class="text-right">
                                        <a href="{{ route('admin.attendance.index', $attendance->id) }}"
                                            class="text-indigo-500 hover:text-indigo-700 text-sm font-medium">
                                            Detail →
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>


            <!-- CALENDAR -->
            <div class="bg-slate-900 rounded-2xl p-6 flex items-center justify-center">

                <div class="w-40 h-40 rounded-full bg-white flex flex-col items-center justify-center shadow-xl">
                    <span class="text-sm text-slate-500">
                        {{ now()->format('l') }}
                    </span>

                    <span class="text-5xl font-bold mt-1">
                        {{ now()->format('d') }}
                    </span>

                    <span class="text-xs text-slate-400 mt-1">
                        {{ now()->format('F Y') }}
                    </span>
                </div>

            </div>

        </div>

    </div>
@endsection
