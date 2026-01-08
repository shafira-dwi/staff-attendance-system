@extends('layouts.admin')

@section('content')
    <h1 class="text-xl font-bold mb-4">Add Staff</h1>

    <form method="POST" action="{{ route('admin.staff.store') }}" class="space-y-4">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="border p-2 w-full" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" class="border p-2 w-full" required>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Save
        </button>
    </form>
@endsection
