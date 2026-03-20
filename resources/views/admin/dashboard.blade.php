@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-[#f6f8ff] relative ">

        <!-- HEADER -->
        <div class="mb-6 relative z-10">
            <h5 class="text-5xl font-bold mb-2">
                <span class="text-slate-800 font-serif">Dashboard</span>
            </h5>
            <p class="text-slate-500 mt-2">
                Attendance Control Center
            </p>
        </div>


        <!-- SUMMARY -->

        <div class="flex justify-center mb-6 relative z-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 w-full max-w-5xl">

                <!-- TOTAL STAFF -->
                <div
                    class="bg-white rounded-[25px] p-8 text-center
                shadow-[0_20px_50px_rgba(0,0,0,0.06)]
                border border-slate-100">

                    <p class="text-slate-400 text-sm tracking-widest uppercase">
                        Total Staff
                    </p>

                    <h2 class="text-5xl font-serif font-semibold text-slate-800 mt-4">
                        {{ $totalStaff }}
                    </h2>

                    <div class="w-12 h-[2px] bg-blue-500 mx-auto mt-4 rounded-full"></div>

                </div>


                <!-- PRESENT -->
                <div
                    class="bg-white rounded-[25px] p-8 text-center
                shadow-[0_20px_50px_rgba(0,0,0,0.06)]
                border border-slate-100">

                    <p class="text-slate-400 text-sm tracking-widest uppercase">
                        Present Today
                    </p>

                    <h2 class="text-5xl font-serif font-semibold text-emerald-600 mt-4">
                        {{ $presentToday }}
                    </h2>

                    <div class="w-12 h-[2px] bg-emerald-500 mx-auto mt-4 rounded-full"></div>

                </div>


                <!-- ABSENT -->
                <div
                    class="bg-white rounded-[25px] p-8 text-center
                shadow-[0_20px_50px_rgba(0,0,0,0.06)]
                border border-slate-100">

                    <p class="text-slate-400 text-sm tracking-widest uppercase">
                        Absent Today
                    </p>

                    <h2 class="text-5xl font-serif font-semibold text-rose-600 mt-4">
                        {{ $absentToday }}
                    </h2>

                    <div class="w-12 h-[2px] bg-rose-500 mx-auto mt-4 rounded-full"></div>

                </div>


                <!-- PENDING -->
                <div
                    class="bg-white rounded-[25px] p-8 text-center
                shadow-[0_20px_50px_rgba(0,0,0,0.06)]
                border border-slate-100">

                    <p class="text-slate-400 text-sm tracking-widest uppercase">
                        Pending Leave
                    </p>

                    <h2 class="text-5xl font-serif font-semibold text-amber-500 mt-4">
                        {{ $pendingLeave }}
                    </h2>

                    <div class="w-12 h-[2px] bg-amber-400 mx-auto mt-4 rounded-full"></div>

                </div>

            </div>

        </div>



        <!-- MAIN CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative z-10">

            <!-- ATTENDANCE SECTION -->
            <div class="lg:col-span-2 bg-white rounded-[26px] shadow-[0_15px_40px_rgba(0,0,0,0.06)] p-8">

                <!-- ATTENDANCE HEADER -->
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-700 tracking-wide">
                            Today Attendance
                        </h2>
                    </div>

                    <a href="{{ route('admin.attendance.index') }}"
                        class="bg-green-600 text-white px-5 py-2 rounded-xl text-sm shadow hover:scale-105 transition">
                        View History
                    </a>
                </div>


                <!-- TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full border-separate border-spacing-y-3 text-sm">

                        <thead>
                            <tr class="text-slate-400 text-xs uppercase tracking-wider">
                                <th class="text-left px-4">Staff</th>
                                <th>Status</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($todayAttendance as $attendance)
                                @php
                                    $status = match (true) {
                                        !$attendance->clock_in => 'Absent',
                                        $attendance->clock_in && $attendance->clock_in->format('H:i') > '08:00'
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

                                <tr class="bg-slate-50 hover:bg-blue-50 transition rounded-2xl shadow-sm">

                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-400
                                            text-white flex items-center justify-center font-semibold shadow">
                                                {{ strtoupper(substr($attendance->user->name ?? '-', 0, 1)) }}
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-800">
                                                    {{ $attendance->user->name ?? '-' }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <div
                                            class="inline-flex items-center gap-2
                                        {{ $statusUI['bg'] }} {{ $statusUI['text'] }}
                                        px-3 py-1.5 rounded-full text-xs font-semibold">
                                            <i class="fas {{ $statusUI['icon'] }}"></i>
                                            {{ $status }}
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <span class="font-semibold text-slate-700">
                                            {{ $attendance->clock_in?->format('H:i') ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <span class="font-semibold text-slate-700">
                                            {{ $attendance->clock_out?->format('H:i') ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="text-right pr-4">
                                        <a href="{{ route('admin.attendance.index', $attendance->id) }}"
                                            class="text-blue-500 hover:text-purple-500 transition text-sm font-semibold">
                                            Detail →
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>


            <!-- CALENDAR SECTION -->

            <div
                class="bg-[#0f172a]/90 rounded-[30px]
            p-6 flex items-center justify-center
            relative overflow-hidden">

                <div
                    class="relative w-40 h-40 rounded-full
                        bg-white
                        flex flex-col items-center justify-center
                        text-black shadow-2xl">

                    <span class="text-sm opacity-80">
                        {{ now()->format('l') }}
                    </span>

                    <span class="text-6xl font-bold leading-none mt-1">
                        {{ now()->format('d') }}
                    </span>

                    <span class="text-xs opacity-80 mt-1">
                        {{ now()->format('F Y') }}
                    </span>

                </div>

            </div>

        </div>

    </div>
@endsection
