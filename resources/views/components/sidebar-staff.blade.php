<aside class="w-64 min-h-screen bg-white border-r">

    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    </head>

    <style>
        body {
            background: #f5f7fb;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #0f172a;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .card {
            border-radius: 12px;
        }

        .sidebar-link {
            background: none;
            border: none;
            color: #fff;
            width: 100%;
            text-align: left;
            padding: 12px 20px;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>

    <nav class="px-4 space-y-2 text-sm">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="text-white mb-4">
                <span class="text-white-800 brand-font">Work</span>
                <span class="text-green-600 brand-font">Track</span>
            </h4>
            <a href="{{ route('staff.dashboard') }}"><i class="fa fa-home me-2"></i> Dashboard</a>
            <a href="{{ route('staff.attendance.index') }}"><i class="fa fa-calendar-check me-2"></i> Attendance</a>
            <a href="{{ route('staff.leave.index') }}"><i class="fa fa-plane me-2"></i> Leave Request</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link">
                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>
    </nav>
</aside>
