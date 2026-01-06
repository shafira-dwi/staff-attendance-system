@extends('layouts.staff')

@section('content')
    <h2>Leave Request</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('staff.leave.store') }}">
        @csrf

        <div>
            <label>Start Date</label>
            <input type="date" name="start_date" required>
        </div>

        <div>
            <label>End Date</label>
            <input type="date" name="end_date" required>
        </div>

        <div>
            <label>Reason</label>
            <textarea name="reason"></textarea>
        </div>

        <button type="submit">Submit Leave</button>
    </form>

    <hr>

    <h3>Leave History</h3>

    <table border="1" cellpadding="8">
        <tr>
            <th>Start</th>
            <th>End</th>
            <th>Reason</th>
            <th>Status</th>
        </tr>

        @foreach ($leaveRequests as $leave)
            <tr>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->reason }}</td>
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
    </table>
@endsection
