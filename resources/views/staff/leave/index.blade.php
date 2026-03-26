@extends('layouts.staff')

@section('content')
    <div class="space-y-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Leave Management
                </h1>
                <p class="text-sm text-slate-500">
                    Manage your leave requests here
                </p>
            </div>

            <a href="{{ route('staff.leave.add') }}"
                class="bg-emerald-600 text-white px-4 py-2 rounded-xl text-sm shadow hover:scale-105 transition">
                + Add Leave
            </a>
        </div>


        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow border border-slate-100 overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    <!-- HEAD -->
                    <thead class="bg-slate-50 text-slate-400 text-xs uppercase">
                        <tr>
                            <th class="text-left px-6 py-4">Start</th>
                            <th class="text-left">End</th>
                            <th class="text-left">Type</th>
                            <th class="text-left">Reason</th>
                            <th class="text-center">Leave Letter</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y">

                        @forelse ($leaveRequests as $leave)
                            @php
                                $statusUI = match ($leave->status) {
                                    'approved' => 'bg-green-100 text-green-600',
                                    'pending' => 'bg-yellow-100 text-yellow-600',
                                    'rejected' => 'bg-red-100 text-red-600',
                                    default => 'bg-slate-100 text-slate-600',
                                };
                            @endphp

                            <tr class="hover:bg-slate-50 transition">

                                <!-- START -->
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    {{ $leave->start_date }}
                                </td>

                                <!-- END -->
                                <td class="text-slate-600">
                                    {{ $leave->end_date }}
                                </td>

                                <!-- TYPE -->
                                <td class="text-slate-600">
                                    {{ ucfirst($leave->type) }}
                                </td>

                                <!-- REASON -->
                                <td class="text-slate-600 max-w-[220px] truncate">
                                    {{ $leave->reason }}
                                </td>

                                <!-- LETTER -->
                                <td class="text-center">
                                    @if ($leave->letter)
                                        <a href="{{ asset('storage/' . $leave->letter) }}" target="_blank"
                                            class="text-indigo-500 hover:underline text-sm">
                                            View
                                        </a>
                                    @else
                                        <span class="text-slate-400 text-xs">-</span>
                                    @endif
                                </td>

                                <!-- STATUS -->
                                <td class="text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusUI }}">
                                        {{ ucfirst($leave->status) }}
                                    </span>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-slate-400">
                                    No leave requests yet
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>
@endsection
