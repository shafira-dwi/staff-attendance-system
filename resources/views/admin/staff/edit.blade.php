@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Edit Staff</h1>

    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $staff->name }}" class="border p-2 w-full">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ $staff->email }}" class="border p-2 w-full">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
@endsection
