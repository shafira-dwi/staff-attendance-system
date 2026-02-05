@extends('layouts.staff')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Submit Leave --}}

    <!-- Main -->
    <main class="main">

        <div class="card-body">

            {{-- Leave History --}}

            <hr>

            <div class="card shadow mb-4">
                <div class="card-header py-3 position-relative text-center">
                    <div class="card-header font-weight-bold text-primary">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Leave History
                        </h6>
                        <a href="{{ route('staff.leave.add') }}"
                            class="btn btn-primary position-absolute top-50 end-0 translate-middle-y me-3">
                            <i class="fa fa-plus me-1"></i> Add Leave
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Start</th>
                                <th>End</th>
                                <th>Reason</th>
                                <th>Leave Letter</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaveRequests as $leave)
                                <tr>
                                    <td>{{ $leave->start_date }}</td>
                                    <td>{{ $leave->end_date }}</td>
                                    <td>{{ $leave->reason }}</td>
                                    <td>{{ $leave->letter }}</td>
                                    <td>
                                        <span
                                            class="
                {{ $leave->status === 'pending' ? 'badge-warning' : '' }}
                {{ $leave->status === 'approved' ? 'badge-success' : '' }}
                {{ $leave->status === 'rejected' ? 'badge-danger' : '' }}
            ">
                                            {{ ucfirst($leave->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
