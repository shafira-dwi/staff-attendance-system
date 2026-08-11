@extends('layouts.staff')

@section('content')
    <div class="space-y-8">

        {{-- ========================================================= --}}
        {{-- HEADER / WELCOME SECTION --}}
        {{-- ========================================================= --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Welcome Card --}}
            <div
                class="xl:col-span-2 relative overflow-hidden rounded-3xl
                        bg-gradient-to-br from-[#c1e8e7] via-[#d9f3f2] to-white
                        border border-white shadow-sm">

                {{-- Decorative Circle --}}
                <div
                    class="absolute -right-16 -top-20 w-72 h-72
                            bg-white/40 rounded-full blur-2xl">
                </div>

                <div
                    class="absolute right-20 bottom-[-80px] w-52 h-52
                            bg-[#9edbd9]/30 rounded-full blur-3xl">
                </div>

                <div
                    class="relative z-10 flex items-center justify-between
                            min-h-[250px] p-7 md:p-9">

                    {{-- Text --}}
                    <div class="max-w-xl">

                        <div
                            class="inline-flex items-center gap-2
                                    bg-white/70 backdrop-blur-sm
                                    px-3 py-1.5 rounded-full
                                    text-xs font-medium text-slate-600 mb-5">

                            <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>

                            Dashboard Overview
                        </div>

                        <h1
                            class="text-3xl md:text-4xl font-bold
                                   tracking-tight text-slate-900">

                            Welcome back,
                            <span class="text-[#3d7f7d]">
                                {{ auth()->user()->name }}
                            </span>
                            👋
                        </h1>

                        <p
                            class="mt-4 text-sm md:text-base
                                  leading-relaxed text-slate-600 max-w-lg">

                            Semoga harimu menyenangkan!
                            Jangan lupa cek attendance kamu hari ini.

                        </p>

                        {{-- Quick Status --}}
                        <div class="mt-6 flex items-center gap-3">

                            <div
                                class="flex items-center gap-2
                                        bg-white/80 backdrop-blur-sm
                                        px-4 py-2 rounded-xl
                                        shadow-sm">

                                <div
                                    class="w-8 h-8 rounded-lg
                                            bg-emerald-100
                                            flex items-center justify-center">

                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                </div>

                                <div>
                                    <p class="text-[10px] text-slate-400 uppercase tracking-wider">
                                        Status
                                    </p>

                                    <p class="text-xs font-semibold text-slate-700">
                                        Active
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Image --}}
                    <div class="hidden md:block relative self-end">

                        <img src="{{ asset('images/staff.png') }}"
                            class="w-44 lg:w-52 xl:w-56
                                    drop-shadow-xl
                                    transition duration-500
                                    hover:scale-105"
                            alt="Staff">

                    </div>

                </div>
            </div>


            {{-- ===================================================== --}}
            {{-- DATE CARD --}}
            {{-- ===================================================== --}}
            <div
                class="relative overflow-hidden rounded-3xl
                        bg-[#0f172a]
                        p-7 text-white
                        shadow-sm">

                {{-- Background Decoration --}}
                <div
                    class="absolute -right-20 -top-20
                            w-56 h-56
                            bg-[#c1e8e7]/10
                            rounded-full blur-2xl">
                </div>

                <div
                    class="absolute -left-16 -bottom-20
                            w-48 h-48
                            bg-blue-400/10
                            rounded-full blur-3xl">
                </div>


                <div class="relative z-10 h-full flex flex-col justify-between">

                    {{-- Header --}}
                    <div class="flex items-center justify-between">

                        <div>
                            <p
                                class="text-xs uppercase tracking-[0.2em]
                                      text-slate-400">
                                Today
                            </p>

                            <p class="text-sm text-slate-300 mt-1">
                                Current Date
                            </p>
                        </div>

                        <div
                            class="w-10 h-10 rounded-xl
                                    bg-white/10
                                    flex items-center justify-center">

                            <svg class="w-5 h-5 text-[#c1e8e7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">

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


                    {{-- Bottom Line --}}
                    <div class="mt-6 pt-4 border-t border-white/10">

                        <p class="text-xs text-slate-400">
                            Have a productive day ✨
                        </p>

                    </div>

                </div>
            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- STATISTICS --}}
        {{-- ========================================================= --}}
        <div>

            {{-- Section Header --}}
            <div class="flex items-center justify-between mb-4">

                <div>
                    <h2 class="text-lg font-semibold text-slate-800">
                        Attendance Overview
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Summary of your attendance and leave
                    </p>
                </div>

            </div>


            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


                {{-- Total Attendance --}}
                <div
                    class="group bg-white rounded-2xl
                            border border-slate-100
                            p-5 shadow-sm
                            hover:shadow-lg hover:-translate-y-1
                            transition-all duration-300">

                    <div class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-xs font-medium
                                      uppercase tracking-wider
                                      text-slate-400">

                                Total Attendance

                            </p>

                            <h3
                                class="mt-3 text-4xl font-bold
                                       tracking-tight text-slate-800">

                                {{ $totalAttendance }}

                            </h3>

                        </div>


                        <div
                            class="w-11 h-11 rounded-xl
                                    bg-blue-50
                                    flex items-center justify-center
                                    group-hover:scale-110
                                    transition">

                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-blue-100 overflow-hidden">
                        <div class="h-full w-3/4 bg-blue-500 rounded-full"></div>
                    </div>

                </div>


                {{-- Leave Request --}}
                <div
                    class="group bg-white rounded-2xl
                            border border-slate-100
                            p-5 shadow-sm
                            hover:shadow-lg hover:-translate-y-1
                            transition-all duration-300">

                    <div class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-xs font-medium
                                      uppercase tracking-wider
                                      text-slate-400">

                                Leave Request

                            </p>

                            <h3
                                class="mt-3 text-4xl font-bold
                                       tracking-tight text-slate-800">

                                {{ $totalLeave }}

                            </h3>

                        </div>


                        <div
                            class="w-11 h-11 rounded-xl
                                    bg-amber-50
                                    flex items-center justify-center
                                    group-hover:scale-110
                                    transition">

                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-amber-100 overflow-hidden">
                        <div class="h-full w-1/2 bg-amber-400 rounded-full"></div>
                    </div>

                </div>


                {{-- Leave Approved --}}
                <div
                    class="group bg-white rounded-2xl
                            border border-slate-100
                            p-5 shadow-sm
                            hover:shadow-lg hover:-translate-y-1
                            transition-all duration-300">

                    <div class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-xs font-medium
                                      uppercase tracking-wider
                                      text-slate-400">

                                Leave Approved

                            </p>

                            <h3
                                class="mt-3 text-4xl font-bold
                                       tracking-tight text-slate-800">

                                {{ $approvedCount }}

                            </h3>

                        </div>


                        <div
                            class="w-11 h-11 rounded-xl
                                    bg-emerald-50
                                    flex items-center justify-center
                                    group-hover:scale-110
                                    transition">

                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-emerald-100 overflow-hidden">
                        <div class="h-full w-4/5 bg-emerald-500 rounded-full"></div>
                    </div>

                </div>


                {{-- Remaining Leave --}}
                <div
                    class="group bg-white rounded-2xl
                            border border-slate-100
                            p-5 shadow-sm
                            hover:shadow-lg hover:-translate-y-1
                            transition-all duration-300">

                    <div class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-xs font-medium
                                      uppercase tracking-wider
                                      text-slate-400">

                                Remaining Leave

                            </p>

                            <h3
                                class="mt-3 text-4xl font-bold
                                       tracking-tight text-slate-800">

                                {{ $remainingLeave }}

                            </h3>

                        </div>


                        <div
                            class="w-11 h-11 rounded-xl
                                    bg-rose-50
                                    flex items-center justify-center
                                    group-hover:scale-110
                                    transition">

                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 h-1 rounded-full bg-rose-100 overflow-hidden">
                        <div class="h-full w-1/3 bg-rose-400 rounded-full"></div>
                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}
        <div class="rounded-2xl border border-slate-100
                    bg-white p-5 shadow-sm">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-xl
                                bg-[#c1e8e7]/40
                                flex items-center justify-center">

                        <svg class="w-5 h-5 text-[#3d7f7d]" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />

                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-700">
                            Keep your attendance updated
                        </p>

                        <p class="text-xs text-slate-400 mt-0.5">
                            Make sure to clock in and clock out on time.
                        </p>

                    </div>

                </div>

                <span class="text-xs font-medium
                             text-slate-400">
                    Staff Dashboard
                </span>

            </div>

        </div>

    </div>
@endsection
