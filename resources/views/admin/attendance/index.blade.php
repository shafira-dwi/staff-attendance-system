@extends('layouts.admin')

@section('title', 'Attendance History')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-6">Attendance History</h1>

        {{-- FILTER --}}
        <div class="bg-white p-4 rounded-xl shadow mb-6 flex gap-4 items-end">
            <div>
                <label class="text-sm text-gray-600">Start Date</label>
                <input type="date" class="input">
            </div>

            <div>
                <label class="text-sm text-gray-600">End Date</label>
                <input type="date" class="input">
            </div>

            <button class="btn-primary">
                Filter
            </button>
        </div>

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
                    <tr>
                        <td class="px-4 py-3">2026-01-06</td>
                        <td class="px-4 py-3">John Doe</td>
                        <td class="px-4 py-3">08:05</td>
                        <td class="px-4 py-3">17:00</td>
                        <td class="px-4 py-3">
                            <x-badge type="success">Present</x-badge>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3">2026-01-05</td>
                        <td class="px-4 py-3">Jane Smith</td>
                        <td class="px-4 py-3">08:20</td>
                        <td class="px-4 py-3">17:02</td>
                        <td class="px-4 py-3">
                            <x-badge type="warning">Late</x-badge>
                        </td>
                    </tr>
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
