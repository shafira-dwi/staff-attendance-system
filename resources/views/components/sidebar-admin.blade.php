@php
    $route = request()->route()->getName();
@endphp

<aside class="w-64 bg-white shadow-md hidden md:block">
    <nav class="p-4 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
            class="block px-4 py-2 rounded
           {{ $route === 'admin.dashboard' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.attendance') }}"
            class="block px-4 py-2 rounded
           {{ str_starts_with($route, 'admin.attendance') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
            Attendance
        </a>

    </nav>
</aside>
