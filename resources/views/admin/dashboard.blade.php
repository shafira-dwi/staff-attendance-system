@extends('layouts.admin')

@section('content')
    <div class="space-y-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

            <div>
                <div class="flex items-center gap-2 mb-2">

                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                    <span class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
                        Admin Panel
                    </span>

                </div>

                <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900">
                    Attendance Control Center
                </h1>

                <p class="text-sm text-slate-500 mt-2">
                    Monitor staff attendance and leave requests in real time.
                </p>
            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- SUMMARY CARDS --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


            {{-- TOTAL STAFF --}}
            <div
                class="group bg-white rounded-2xl border border-slate-100
                        p-5 shadow-sm hover:shadow-lg hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div>

                        <p
                            class="text-xs font-semibold uppercase
                                  tracking-wider text-slate-400">
                            Total Staff
                        </p>

                        <h2 class="mt-3 text-4xl font-bold tracking-tight text-slate-800">
                            {{ $totalStaff }}
                        </h2>

                        <p class="mt-2 text-xs text-slate-400">
                            Registered staff
                        </p>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-blue-50
                                flex items-center justify-center
                                group-hover:scale-110 transition">

                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M17 20h5v-2a3 3 0 00-5.83-1M17 20H7m10 0v-2c0-.73-.13-1.43-.38-2M7 20H2v-2a3 3 0 015.83-1M7 20v-2c0-.73.13-1.43.38-2m0 0a5 5 0 019.24 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 rounded-full bg-blue-50 overflow-hidden">
                    <div class="h-full w-full bg-blue-500 rounded-full"></div>
                </div>

            </div>


            {{-- PRESENT --}}
            <div
                class="group bg-white rounded-2xl border border-slate-100
                        p-5 shadow-sm hover:shadow-lg hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div>

                        <p
                            class="text-xs font-semibold uppercase
                                  tracking-wider text-slate-400">
                            Present Today
                        </p>

                        <h2 class="mt-3 text-4xl font-bold tracking-tight text-slate-800">
                            {{ $presentToday }}
                        </h2>

                        <p class="mt-2 text-xs text-emerald-500 font-medium">
                            ● Staff present
                        </p>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-emerald-50
                                flex items-center justify-center
                                group-hover:scale-110 transition">

                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 rounded-full bg-emerald-50 overflow-hidden">
                    <div class="h-full w-4/5 bg-emerald-500 rounded-full"></div>
                </div>

            </div>


            {{-- ABSENT --}}
            <div
                class="group bg-white rounded-2xl border border-slate-100
                        p-5 shadow-sm hover:shadow-lg hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div>

                        <p
                            class="text-xs font-semibold uppercase
                                  tracking-wider text-slate-400">
                            Absent Today
                        </p>

                        <h2 class="mt-3 text-4xl font-bold tracking-tight text-slate-800">
                            {{ $absentToday }}
                        </h2>

                        <p class="mt-2 text-xs text-rose-500 font-medium">
                            ● No attendance
                        </p>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-rose-50
                                flex items-center justify-center
                                group-hover:scale-110 transition">

                        <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 rounded-full bg-rose-50 overflow-hidden">
                    <div class="h-full w-1/3 bg-rose-500 rounded-full"></div>
                </div>

            </div>


            {{-- PENDING --}}
            <div
                class="group bg-white rounded-2xl border border-slate-100
                        p-5 shadow-sm hover:shadow-lg hover:-translate-y-1
                        transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div>

                        <p
                            class="text-xs font-semibold uppercase
                                  tracking-wider text-slate-400">
                            Pending Leave
                        </p>

                        <h2 class="mt-3 text-4xl font-bold tracking-tight text-slate-800">
                            {{ $pendingLeave }}
                        </h2>

                        <p class="mt-2 text-xs text-amber-500 font-medium">
                            ● Needs review
                        </p>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-amber-50
                                flex items-center justify-center
                                group-hover:scale-110 transition">

                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 rounded-full bg-amber-50 overflow-hidden">
                    <div class="h-full w-1/2 bg-amber-400 rounded-full"></div>
                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


            {{-- ===================================================== --}}
            {{-- ATTENDANCE TABLE --}}
            {{-- ===================================================== --}}
            <div
                class="xl:col-span-2 bg-white rounded-2xl
                        border border-slate-100 shadow-sm overflow-hidden">


                {{-- Table Header --}}
                <div class="px-6 py-5 border-b border-slate-100">

                    <div
                        class="flex flex-col sm:flex-row
                                sm:items-center sm:justify-between gap-4">

                        <div>

                            <div class="flex items-center gap-2">

                                <h2 class="text-lg font-semibold text-slate-800">
                                    Today's Attendance
                                </h2>

                                <span
                                    class="px-2 py-0.5 rounded-full
                                             bg-slate-100 text-slate-500
                                             text-[10px] font-semibold">

                                    {{ $totalStaff }} STAFF

                                </span>

                            </div>

                            <p class="text-xs text-slate-400 mt-1">
                                Attendance activity for today
                            </p>

                        </div>


                        <a href="{{ route('admin.attendance.index') }}"
                            class="inline-flex items-center justify-center gap-2
                                  bg-slate-900 text-white
                                  px-4 py-2.5 rounded-xl
                                  text-xs font-semibold
                                  hover:bg-slate-700
                                  transition">

                            View History

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />

                            </svg>

                        </a>

                    </div>

                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>

                            <tr
                                class="bg-slate-50/70
                                       text-[10px] uppercase
                                       tracking-wider text-slate-400">

                                <th class="text-left px-6 py-3 font-semibold">
                                    Staff
                                </th>

                                <th class="text-center px-4 py-3 font-semibold">
                                    Status
                                </th>

                                <th class="text-center px-4 py-3 font-semibold">
                                    Check In
                                </th>

                                <th class="text-center px-4 py-3 font-semibold">
                                    Check Out
                                </th>

                                <th class="px-6 py-3"></th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse ($todayAttendance as $attendance)
                                @php

                                    $status = match (true) {
                                        !$attendance->clock_in => 'Absent',

                                        $attendance->clock_in && $attendance->clock_in->format('H:i') > '13:00'
                                            => 'Late',

                                        default => 'Present',
                                    };

                                    $statusUI = match ($status) {
                                        'Present' => [
                                            'bg' => 'bg-emerald-50',
                                            'text' => 'text-emerald-600',
                                            'dot' => 'bg-emerald-500',
                                            'icon' => 'fa-check-circle',
                                        ],

                                        'Late' => [
                                            'bg' => 'bg-amber-50',
                                            'text' => 'text-amber-600',
                                            'dot' => 'bg-amber-500',
                                            'icon' => 'fa-clock',
                                        ],

                                        'Absent' => [
                                            'bg' => 'bg-rose-50',
                                            'text' => 'text-rose-600',
                                            'dot' => 'bg-rose-500',
                                            'icon' => 'fa-times-circle',
                                        ],
                                    };

                                @endphp


                                <tr class="group hover:bg-slate-50/70 transition">


                                    {{-- Staff --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                        bg-gradient-to-br
                                                        from-indigo-400
                                                        to-purple-500
                                                        text-white
                                                        flex items-center justify-center
                                                        font-semibold text-sm
                                                        shadow-sm">

                                                {{ strtoupper(substr($attendance->user->name ?? '-', 0, 1)) }}

                                            </div>


                                            <div>

                                                <p class="font-semibold text-slate-800">
                                                    {{ $attendance->user->name ?? '-' }}
                                                </p>

                                                <p class="text-[11px] text-slate-400">
                                                    Staff
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-4 py-4 text-center">

                                        <span
                                            class="inline-flex items-center gap-2
                                                     px-3 py-1.5 rounded-full
                                                     text-[11px] font-semibold
                                                     {{ $statusUI['bg'] }}
                                                     {{ $statusUI['text'] }}">

                                            <span
                                                class="w-1.5 h-1.5 rounded-full
                                                         {{ $statusUI['dot'] }}">
                                            </span>

                                            {{ $status }}

                                        </span>

                                    </td>


                                    {{-- Clock In --}}
                                    <td class="px-4 py-4 text-center">

                                        <span class="font-medium text-slate-700">

                                            {{ $attendance->clock_in?->format('H:i') ?? '-' }}

                                        </span>

                                    </td>


                                    {{-- Clock Out --}}
                                    <td class="px-4 py-4 text-center">

                                        <span class="font-medium text-slate-700">

                                            {{ $attendance->clock_out?->format('H:i') ?? '-' }}

                                        </span>

                                    </td>


                                    {{-- Detail --}}
                                    <td class="px-6 py-4 text-right">

                                        <a href="{{ route('admin.attendance.index', $attendance->id) }}"
                                            class="inline-flex items-center gap-1
                                                  text-indigo-500
                                                  hover:text-indigo-700
                                                  text-xs font-semibold
                                                  transition">

                                            Detail

                                            <span class="group-hover:translate-x-0.5 transition">
                                                →
                                            </span>

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-12 text-center">

                                        <div class="flex flex-col items-center">

                                            <div
                                                class="w-12 h-12 rounded-2xl
                                                        bg-slate-100
                                                        flex items-center justify-center">

                                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

                                                </svg>

                                            </div>

                                            <p class="mt-3 text-sm font-medium text-slate-600">
                                                No attendance data
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                No attendance has been recorded today.
                                            </p>

                                        </div>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- DATE / QUICK INFO --}}
            {{-- ===================================================== --}}
            <div
                class="relative overflow-hidden rounded-2xl
                        bg-slate-900 p-7 text-white shadow-sm">


                {{-- Decoration --}}
                <div
                    class="absolute -right-20 -top-20
                            w-64 h-64 rounded-full
                            bg-[#c1e8e7]/10 blur-2xl">
                </div>

                <div
                    class="absolute -left-20 -bottom-20
                            w-56 h-56 rounded-full
                            bg-indigo-400/10 blur-3xl">
                </div>


                <div class="relative z-10 h-full flex flex-col">


                    {{-- Header --}}
                    <div class="flex items-center justify-between">

                        <div>

                            <p
                                class="text-xs uppercase
                                      tracking-[0.2em] text-slate-400">
                                Today
                            </p>

                            <p class="text-sm text-slate-300 mt-1">
                                Attendance Summary
                            </p>

                        </div>


                        <div
                            class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center justify-center">

                            <svg class="w-5 h-5 text-[#c1e8e7]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                            </svg>

                        </div>

                    </div>


                    {{-- Date --}}
                    <div class="mt-8">

                        <p class="text-lg font-medium text-[#c1e8e7]">
                            {{ now()->format('l') }}
                        </p>

                        <div class="flex items-end gap-3">

                            <span class="text-7xl font-bold tracking-tight">
                                {{ now()->format('d') }}
                            </span>

                            <div class="pb-2">

                                <p class="text-sm text-slate-300">
                                    {{ now()->format('F') }}
                                </p>

                                <p class="text-sm text-slate-500">
                                    {{ now()->format('Y') }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Divider --}}
                    <div class="my-7 border-t border-white/10"></div>


                    {{-- Mini Stats --}}
                    <div class="space-y-4">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>

                                <span class="text-sm text-slate-300">
                                    Present
                                </span>

                            </div>

                            <span class="font-semibold">
                                {{ $presentToday }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="w-2 h-2 rounded-full bg-rose-400"></span>

                                <span class="text-sm text-slate-300">
                                    Absent
                                </span>

                            </div>

                            <span class="font-semibold">
                                {{ $absentToday }}
                            </span>

                        </div>


                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="w-2 h-2 rounded-full bg-amber-400"></span>

                                <span class="text-sm text-slate-300">
                                    Pending Leave
                                </span>

                            </div>

                            <span class="font-semibold">
                                {{ $pendingLeave }}
                            </span>

                        </div>

                    </div>


                    {{-- Bottom --}}
                    <div class="mt-auto pt-7">

                        <div
                            class="rounded-xl bg-white/5
                                    border border-white/10
                                    p-4">

                            <p class="text-xs text-slate-400">
                                Attendance monitoring
                            </p>

                            <p class="text-sm font-medium text-white mt-1">
                                Keep staff attendance under control.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
