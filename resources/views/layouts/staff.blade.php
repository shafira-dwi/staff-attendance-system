<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Staff Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('components.sidebar-staff')

        {{-- Main --}}
        <div class="flex-1 flex flex-col">
            @include('components.topbar')

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
