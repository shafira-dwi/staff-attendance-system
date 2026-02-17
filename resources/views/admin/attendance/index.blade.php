@extends('layouts.admin')

@section('title', 'Attendance History')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Attendance History</h1>
        <p class="text-gray-500">Track and monitor staff attendance records</p>
    </div>

    {{-- FILTER SECTION --}}
    <div class="bg-white p-6 rounded-xl shadow mb-8">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">

            <div>
                <label class="block text-sm text-gray-600 mb-2">Staff</label>
                <select name="user_id"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">All Staff</option>
                    @foreach ($users ?? [] as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Date</label>
                <input type="date" name="date" value="{{ request('date') }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition w-full md:w-auto">
                    Filter
                </button>
            </div>

        </form>
    </div>

    {{-- TABLE SECTION --}}
    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">
                Attendance Records
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Check In</th>
                        <th class="px-4 py-3">Check Out</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($attendances ?? [] as $attendance)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-3">
                                {{ $attendance->date ? \Carbon\Carbon::parse($attendance->date)->format('d M Y') : '-' }}
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ optional($attendance->user)->name ?? 'No User' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $attendance->clock_in ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $attendance->clock_out ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($attendance->status === 'present')
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">
                                        Present
                                    </span>
                                @elseif ($attendance->status === 'late')
                                    <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-medium">
                                        Late
                                    </span>
                                @elseif ($attendance->status === 'absent')
                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium">
                                        Absent
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
                                        -
                                    </span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                                No attendance data found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection
