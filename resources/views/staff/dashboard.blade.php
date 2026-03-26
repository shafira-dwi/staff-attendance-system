@extends('layouts.staff')

@section('content')
    <div class="space-y-6">

        <!-- TOP SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Welcome Banner -->
            <div class="lg:col-span-2">
                <div
                    class="relative overflow-hidden rounded-2xl bg-[#c1e8e7] p-6 shadow-sm hover:shadow-xl transition duration-300">

                    <!-- Glow -->
                    <div class="absolute right-0 top-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

                    <div class="flex items-center justify-between relative z-10">

                        <!-- Text -->
                        <div>
                            <h2 class="text-2xl font-semibold text-black">
                                Welcome back, {{ auth()->user()->name }} 👋
                            </h2>

                            <p class="mt-2 text-sm text-black/70">
                                Semoga harimu menyenangkan! Jangan lupa cek attendance hari ini ya.
                            </p>

                            <span class="inline-block mt-4 bg-black/20 text-white text-xs px-3 py-1 rounded-full">
                                Dashboard Overview
                            </span>
                        </div>

                        <!-- Image -->
                        <div class="hidden md:block">
                            <img src="{{ asset('images/staff.png') }}"
                                class="w-40 transform hover:scale-105 transition duration-300">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Calendar -->
            <div>
                <div class="bg-[#0f172a]/90 rounded-[30px] p-6 flex items-center justify-center">

                    <div
                        class="w-40 h-40 rounded-full bg-white flex flex-col items-center justify-center text-black shadow-2xl">
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

        <!-- STAT CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card -->
            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs tracking-widest uppercase">Total Attendance</p>
                <h2 class="text-4xl font-semibold text-blue-800 mt-3">{{ $totalAttendance }}</h2>
                <div class="w-10 h-[2px] bg-blue-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs tracking-widest uppercase">Leave Request</p>
                <h2 class="text-4xl font-semibold text-yellow-600 mt-3">{{ $totalLeave }}</h2>
                <div class="w-10 h-[2px] bg-yellow-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs tracking-widest uppercase">Leave Approved</p>
                <h2 class="text-4xl font-semibold text-green-600 mt-3">{{ $approvedCount }}</h2>
                <div class="w-10 h-[2px] bg-green-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow border border-slate-100">
                <p class="text-slate-400 text-xs tracking-widest uppercase">Remaining Leave</p>
                <h2 class="text-4xl font-semibold text-rose-500 mt-3">{{ $remainingLeave }}</h2>
                <div class="w-10 h-[2px] bg-rose-400 mx-auto mt-3 rounded-full"></div>
            </div>

        </div>

    </div>
@endsection
