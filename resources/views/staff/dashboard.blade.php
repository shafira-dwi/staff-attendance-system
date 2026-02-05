@extends('layouts.staff')

@section('content')
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>Dashboard Staff</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    </head>

    <style>
        /* Calendar */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px;
        }

        .calendar-day {
            font-size: 12px;
            color: #888;
        }

        .calendar-date {
            padding: 8px 0;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
        }

        .calendar-date:hover {
            background: #f0f3ff;
        }

        .calendar-today {
            background: #4f6bed;
            color: #fff;
        }

        .small-calendar {
            font-size: 12px;
        }

        .small-calendar .calendar-date {
            padding: 4px 0;
            font-size: 12px;
        }

        .small-calendar h6 {
            font-size: 14px;
        }
    </style>

    <body>
        <div class="container mt-4">
            <div class="row g-4">

                <!-- Header / Greeting -->
                <div class="col-md-8">
                    <div class="card p-4">
                        <h4>
                            Good Day,
                            <strong>{{ auth()->user()->staff->name ?? auth()->user()->name }}</strong> 👋
                        </h4>
                        <p class="text-muted mb-0">Selamat datang di dashboard staff</p>
                    </div>
                </div>

                <!-- Profile -->
                <div class="col-md-4">

                    <!-- Header -->
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-2">
                        <span class="fw-semibold">My Profile</span>
                        <a href="{{ route('staff.profile') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-pen me-1"></i> Edit
                        </a>
                    </div>

                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/60" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">
                                    <strong>{{ auth()->user()->staff->name ?? auth()->user()->name }}</strong>
                                </h6>
                                <small class="text-muted">Mulai kerja sejak</small><br>
                                <strong>01 Januari 2024</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">

                    <!-- Statistik (KIRI) -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="card text-center p-3">
                                    <i class="fa fa-check-circle fa-2x text-primary mb-2"></i>
                                    <h6>Total Absensi</h6>
                                    <h5>120</h5>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center p-3">
                                    <i class="fa fa-file-alt fa-2x text-warning mb-2"></i>
                                    <h6>Pengajuan Cuti</h6>
                                    <h5>8</h5>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center p-3">
                                    <i class="fa fa-thumbs-up fa-2x text-success mb-2"></i>
                                    <h6>Cuti Di-ACC</h6>
                                    <h5>5</h5>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center p-3">
                                    <i class="fa fa-hourglass-half fa-2x text-danger mb-2"></i>
                                    <h6>Sisa Cuti</h6>
                                    <h5>3</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kalender (KANAN) -->
                    <div class="col-md-4">
                        <div class="card p-2 small-calendar">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">My Calendar</h6>
                                <div>
                                    <button class="btn btn-sm btn-light" onclick="prevMonth()">‹</button>
                                    <button class="btn btn-sm btn-light" onclick="nextMonth()">›</button>
                                </div>
                            </div>

                            <div class="text-center fw-semibold mb-1" id="monthYear"></div>

                            <div class="calendar-grid text-center">
                                <div class="calendar-day">Sun</div>
                                <div class="calendar-day">Mon</div>
                                <div class="calendar-day">Tue</div>
                                <div class="calendar-day">Wed</div>
                                <div class="calendar-day">Thu</div>
                                <div class="calendar-day">Fri</div>
                                <div class="calendar-day">Sat</div>
                            </div>

                            <div class="calendar-grid text-center mt-1" id="calendarDays"></div>
                        </div>
                    </div>

                </div>

                <script>
                    let currentDate = new Date();

                    function renderCalendar() {
                        const monthYear = document.getElementById("monthYear");
                        const calendarDays = document.getElementById("calendarDays");

                        const year = currentDate.getFullYear();
                        const month = currentDate.getMonth();

                        const firstDay = new Date(year, month, 1).getDay();
                        const lastDate = new Date(year, month + 1, 0).getDate();

                        const monthNames = [
                            "January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                        ];

                        monthYear.innerText = `${monthNames[month]} ${year}`;
                        calendarDays.innerHTML = "";

                        for (let i = 0; i < firstDay; i++) {
                            calendarDays.innerHTML += `<div></div>`;
                        }

                        for (let day = 1; day <= lastDate; day++) {
                            const today = new Date();
                            let isToday = day === today.getDate() &&
                                month === today.getMonth() &&
                                year === today.getFullYear();

                            calendarDays.innerHTML += `
                <div class="calendar-date ${isToday ? 'calendar-today' : ''}">
                    ${day}
                </div>
            `;
                        }
                    }

                    function prevMonth() {
                        currentDate.setMonth(currentDate.getMonth() - 1);
                        renderCalendar();
                    }

                    function nextMonth() {
                        currentDate.setMonth(currentDate.getMonth() + 1);
                        renderCalendar();
                    }

                    renderCalendar();
                </script>
            </div>

    </body>

    </html>
@endsection
