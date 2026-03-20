@extends('layouts.admin')

@section('title', 'Staff Management')

@section('content')

    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Staff Management</h1>
        <a href="{{ route('admin.staff.create') }}"
            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            + Add Staff
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">

        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($staffs as $index => $staff)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $staff->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $staff->email }}</td>
                        <td class="px-4 py-3 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.staff.edit', $staff->id) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus staff ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($staffs->isEmpty())
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">
                            No staff found
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>

@endsection
