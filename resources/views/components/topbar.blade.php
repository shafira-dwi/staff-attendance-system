<nav class="bg-white border-b px-6 py-3 flex items-center justify-between">
    <!-- Left -->
    <div class="flex items-center gap-4">
        <span class="text-lg font-semibold">Dashboard</span>
        <button class="md:hidden" id="toggleSidebar">
            ☰
        </button>

        <input type="text" placeholder="Search..."
            class="hidden md:block border rounded px-3 py-1 text-sm focus:outline-none">
    </div>

    <!-- Right -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <span class="text-sm text-gray-600">
            WorkTrack
        </span>
        <button type="submit" class="text-sm text-red-600 hover:underline">
            Logout
        </button>
    </form>
</nav>
