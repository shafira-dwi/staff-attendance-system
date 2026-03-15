@extends('layouts.guest')

@section('content')
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(120deg, #f4f7fb, #e9eef5);
        }

        .brand-font {
            font-family: 'Playfair Display', serif;
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.7);
        }

        .input-style {
            transition: .3s;
        }

        .input-style:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, .15);
        }

        .login-btn {
            transition: .35s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(34, 197, 94, .4);
        }
    </style>

    <div class="min-h-screen w-full flex items-center justify-center">

        <div class="grid grid-cols-1 lg:grid-cols-2 w-full max-w-6xl rounded-3xl overflow-hidden shadow-2xl">

            <!-- LEFT SIDE -->
            <div class="p-14 glass">

                <h1 class="text-5xl font-bold mb-2">
                    <span class="text-slate-800 brand-font">Work</span>
                    <span class="text-green-600 brand-font">Track</span>
                </h1>

                <p class="text-slate-500 mb-6">Attendance & Workforce Management System</p>

                {{-- ERROR VALIDATION --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="text-sm text-slate-500">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full mt-1 px-4 py-3 rounded-xl border border-slate-200 input-style outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-slate-500">Password</label>
                        <input type="password" name="password" required
                            class="w-full mt-1 px-4 py-3 rounded-xl border border-slate-200 input-style outline-none">
                    </div>

                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-2 text-sm text-slate-500">
                            <input type="checkbox" name="remember" class="accent-green-600">
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                                Forgot Password?
                            </a>
                        @endif

                    </div>

                    <button type="submit"
                        class="login-btn w-full py-3 rounded-xl bg-green-600 text-white font-semibold text-lg">
                        Login
                    </button>

                </form>

            </div>

            <!-- RIGHT SIDE CLOCK -->
            <div
                class="hidden lg:flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">

                <div class="absolute w-96 h-96 bg-green-500/20 blur-[120px] rounded-full top-20 left-20"></div>
                <div class="absolute w-96 h-96 bg-blue-500/20 blur-[120px] rounded-full bottom-10 right-10"></div>

                <div class="relative">

                    <div
                        class="bg-white/5 backdrop-blur-3xl border border-white/10 p-16 shadow-[0_40px_120px_rgba(0,0,0,0.6)]">

                        <div
                            class="relative w-64 h-64 translate-x-8 rounded-full bg-gradient-to-br from-white to-slate-200 shadow-inner">

                            <div
                                class="absolute w-5 h-5 bg-slate-800 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50">
                            </div>

                            <div id="hour"
                                class="absolute w-2 h-20 bg-slate-800 top-1/2 left-1/2 origin-bottom -translate-x-1/2 -translate-y-full rounded-full">
                            </div>
                            <div id="minute"
                                class="absolute w-1.5 h-28 bg-slate-700 top-1/2 left-1/2 origin-bottom -translate-x-1/2 -translate-y-full rounded-full">
                            </div>
                            <div id="second"
                                class="absolute w-1 h-32 bg-green-500 top-1/2 left-1/2 origin-bottom -translate-x-1/2 -translate-y-full rounded-full">
                            </div>

                        </div>

                        <div class="mt-6 text-center text-white">

                            <div id="dateText"
                                class="text-2xl font-semibold tracking-wide opacity-0 transition duration-700"></div>
                            <div class="w-20 h-[2px] bg-green-500 mx-auto mt-4 rounded-full opacity-70"></div>

                            <div id="digital"
                                class="mt-4 text-4xl font-mono text-green-400 tracking-[6px] bg-black/40 px-8 py-3 rounded-2xl">
                                00:00:00
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function updateRealtimeDate() {
            const now = new Date();
            const format = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            const el = document.getElementById("dateText");
            el.style.opacity = 0;
            setTimeout(() => {
                el.innerText = now.toLocaleDateString(undefined, format);
                el.style.opacity = 1;
            }, 300);
        }
        updateRealtimeDate();
        setInterval(updateRealtimeDate, 60000);

        function updateClock() {
            const now = new Date();
            const sec = now.getSeconds();
            const min = now.getMinutes();
            const hr = now.getHours();

            document.getElementById("second").style.transform =
                `translate(-50%,-100%) rotate(${sec*6}deg)`;

            document.getElementById("minute").style.transform =
                `translate(-50%,-100%) rotate(${min*6}deg)`;

            document.getElementById("hour").style.transform =
                `translate(-50%,-100%) rotate(${hr*30 + min/2}deg)`;

            document.getElementById("digital").innerText =
                now.toLocaleTimeString();
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endsection
