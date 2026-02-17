<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <div style="width:260px; flex-shrink:0;">
            @include('components.sidebar-admin')
        </div>

        {{-- Main Content --}}
        <div style="flex:1;">
            @include('components.topbar')

            <main style="padding:24px;">
                @yield('content')
            </main>
        </div>

    </div>

</body>

</html>
