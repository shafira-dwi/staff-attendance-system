<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'WorkTrack Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-100 font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 flex-shrink-0">
            @include('components.sidebar-staff')
        </aside>

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col">

            <!-- NAVBAR (PROFILE ONLY) -->
            @include('layouts.navigation')

            <!-- CONTENT -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
