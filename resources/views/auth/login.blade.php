@extends('layouts.guest')

@section('content')
    <style>
        /* Global body */
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            background-color: #f3f4f6;
            /* gray-100 */
        }

        .login-container {
            display: flex;
            min-height: 100vh;
        }

        /* Left side branding */
        .login-left {
            flex: 1;
            background-color: #0a66c2;
            /* LinkedIn blue */
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .login-left h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .login-left p {
            font-size: 1.2rem;
            line-height: 1.5;
            text-align: center;
            max-width: 400px;
        }

        /* Right side login form */
        .login-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: #f3f4f6;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background-color: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #111827;
        }

        .login-card p {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            /* gray-300 */
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: #0a66c2;
            box-shadow: 0 0 0 2px rgba(10, 102, 194, 0.3);
        }

        .login-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #0a66c2;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 0.5rem;
        }

        .login-btn:hover {
            background-color: #004182;
        }

        .forgot-link {
            text-align: right;
            display: block;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .forgot-link:hover {
            color: #111827;
        }

        .error-box {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                flex: none;
                width: 100%;
                padding: 3rem 1.5rem;
            }

            .login-right {
                flex: none;
                width: 100%;
                padding: 2rem 1rem;
            }
        }
    </style>

    <div class="login-container">
        <!-- Left branding -->
        <div class="login-left">
            <h1>WorkTrack</h1>
            <p>Track your team, simplify workflows, boost productivity.</p>
            </p>
        </div>

        <!-- Right login form -->
        <div class="login-right">
            <div class="login-card">
                <h2>Login</h2>
                <p>to your account</p>

                @if ($errors->any())
                    <div class="error-box">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    <input type="password" name="password" placeholder="Password" required>

                    <div class="mb-4 flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
