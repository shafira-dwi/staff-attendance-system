<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main area --}}
        <div class="flex-1 flex flex-col">
            {{-- Topbar --}}
            @include('components.topbar')

            {{-- Content --}}
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
