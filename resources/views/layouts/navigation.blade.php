@php
    $dashboardRoute = auth()->user()->role === 'admin' ? 'admin.dashboard' : 'staff.dashboard';
@endphp
<nav x-data="{ open: false }" class="bg-[#c1e8e7] border-b border-slate-800 shadow-sm sticky top-0 z-50">

    <div class="w-full px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- LEFT (kosong / bisa isi nanti) -->
            <div></div>

            <!-- RIGHT -->
            <div class="flex items-center gap-3">

                <!-- Notification -->
                <div class="relative">
                    <button
                        class="hidden sm:flex items-center justify-center w-9 h-9 rounded-lg hover:bg-slate-200 transition">

                        <i class="fa fa-bell text-slate-600"></i>
                    </button>

                    <!-- Badge -->
                    @if (isset($unreadCount) && $unreadCount > 0)
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-black text-[10px] w-4 h-4 flex items-center justify-center rounded-full">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </div>

                <!-- Profile -->
                <div class="flex items-center gap-2 cursor-pointer group">

                    <!-- Avatar -->
                    <div
                        class="w-9 h-9 bg-indigo-500 text-white flex items-center justify-center rounded-full text-sm font-semibold shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <!-- Name -->
                    <span class="hidden sm:block text-sm text-dark-400 group-hover:text-black transition">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <!-- Hamburger -->
                <button @click="open = !open"
                    class="sm:hidden flex items-center justify-center w-9 h-9 rounded-lg hover:bg-white/10 transition">
                    <i class="fa fa-bars text-slate-300"></i>
                </button>

            </div>
        </div>
    </div>

    <!-- MOBILE -->
    <div x-show="open" x-transition class="sm:hidden px-4 pb-4">

        <div class="mt-4 border-t border-slate-700 pt-3">
            <div class="text-sm text-slate-200">
                {{ Auth::user()->name }}
            </div>
            <div class="text-xs text-slate-400">
                {{ Auth::user()->email }}
            </div>
        </div>

    </div>
</nav>
