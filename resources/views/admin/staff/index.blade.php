@extends('layouts.admin')

@section('title', 'Staff Management')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Staff List</h1>
        <a href="{{ route('admin.staff.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
            + Add Staff
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">No</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $index => $staff)
                <tr>
                    <td class="p-2 border">{{ $index + 1 }}</td>
                    <td class="p-2 border">{{ $staff->name }}</td>
                    <td class="p-2 border">{{ $staff->email }}</td>
                    <td class="p-2 border flex gap-2">
                        <a href="{{ route('admin.staff.edit', $staff->id) }}" class="text-blue-500">Edit</a>

                        <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus staff ini?')" class="text-red-500">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
