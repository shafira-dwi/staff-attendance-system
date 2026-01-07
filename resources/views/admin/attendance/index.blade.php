@extends('layouts.admin')

@section('title', 'Attendance History')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-6">Attendance History</h1>

        {{-- FILTER --}}
        <form method="GET" class="bg-white p-4 rounded-xl shadow mb-6 flex gap-4 items-end">
            <div>
                <label class="text-sm text-gray-600">Staff</label>
                <select name="user_id" class="input">
                    <option value="">All Staff</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-600">Date</label>
                <input type="date" name="date" class="input" value="{{ request('date') }}">
            </div>

            <button class="btn-primary">Filter</button>
        </form>

        {{-- TABLE --}}
        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Check In</th>
                        <th class="px-4 py-3 text-left">Check Out</th>
                        <th class="px-4 py-3 text-left">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($attendances as $attendance)
                        <tr>
                            <td class="px-4 py-3">
                                {{ $attendance->date }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $attendance->user->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $attendance->clock_in ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $attendance->clock_out ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($attendance->status === 'present')
                                    <x-badge type="success">Present</x-badge>
                                @elseif($attendance->status === 'late')
                                    <x-badge type="warning">Late</x-badge>
                                @else
                                    <x-badge type="danger">Absent</x-badge>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                No attendance data found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4 flex justify-end">
            <div class="flex items-center gap-2 text-sm">
                <button class="px-3 py-1 border rounded">Prev</button>
                <button class="px-3 py-1 border rounded bg-gray-200">1</button>
                <button class="px-3 py-1 border rounded">2</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>
        </div>

    </div>
@endsection
