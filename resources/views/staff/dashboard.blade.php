@extends('layouts.staff')

@section('content')
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

    </div>
    <div class="container mt-4">
        <div class="row g-4">

            <!-- Profile -->
            <div class="col-md-7">
                <div class="bg-white flex rounded-xl shadow hover:shadow-xl transition duration-300 overflow-hidden h-56">
                    <!-- Profile Image (setengah tinggi card) -->
                    <div class="flex-shrink-0 w-1/2 h-full">
                        <img src="https://ui-avatars.com/api/?name=Staff+User&size=128&background=0D8ABC&color=fff"
                            class="h-full w-full object-cover" alt="Profile">
                    </div>

                    <!-- Profile Info -->
                    <div class="p-3 flex flex-col justify-center w-1/2">
                        <span class="text-gray-500 text-sm mb-1">My Profile</span>
                        <h6 class="text-lg font-bold mb-1">
                            {{ auth()->user()->staff->name ?? auth()->user()->name }}
                        </h6>
                        <p class="text-gray-500 text-sm mb-1">Mulai kerja sejak</p>
                        <strong class="text-gray-800">01 Januari 2024</strong>
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

            <div class="row g-4">

                <!-- STATISTIK CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                    <!-- Total Attendance -->
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Attendance</p>
                                <h2 class="text-3xl font-bold text-blue-600">{{ $totalAttendance }}</h2>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full text-blue-600 text-xl">
                                <i class="fa fa-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Leave Request -->
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Leave Request</p>
                                <h2 class="text-3xl font-bold text-yellow-600">{{ $totalLeave }}</h2>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600 text-xl">
                                <i class="fa fa-file-alt"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Leave Approved -->
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Leave Approved</p>
                                <h2 class="text-3xl font-bold text-green-600">{{ $approvedCount }}</h2>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full text-green-600 text-xl">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Remaining Leave -->
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Remaining Leave</p>
                                <h2 class="text-3xl font-bold text-red-600">{{ $remainingLeave }} Hari</h2>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full text-red-600 text-xl">
                                <i class="fa fa-hourglass-half"></i>
                            </div>
                        </div>
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
    </div>
@endsection
