<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('components.sidebar-admin')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Topbar --}}
            @include('components.topbar')

            {{-- Page Content --}}
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
