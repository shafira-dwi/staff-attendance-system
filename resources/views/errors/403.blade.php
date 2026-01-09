@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-4xl font-bold text-red-600">403</h1>
        <p class="mt-2 text-gray-600">You are not authorized to access this page.</p>
        <a href="{{ url()->previous() }}" class="mt-4 text-blue-500 underline">Go Back</a>
    </div>
@endsection
