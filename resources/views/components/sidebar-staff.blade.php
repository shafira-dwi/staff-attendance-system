<aside class="w-64 min-h-screen bg-white border-r">
    <div class="p-6 text-xl font-semibold">
        Staff Panel
    </div>

    <nav class="px-4 space-y-2 text-sm">
        <a href="{{ route('staff.dashboard') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100">
            Dashboard
        </a>

        <a href="{{ route('staff.attendance.index') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100">
            Attendance History
        </a>

        <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100">
            Profile
        </a>
    </nav>
</aside>
