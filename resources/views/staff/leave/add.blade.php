@extends('layouts.staff')

@section('content')
    <!-- Topbar -->
    <div class="topbar">
        <h2>Leave Request</h2>
    </div>

    <form method="POST" action="{{ route('staff.leave.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" required>
            </div>

            <div class="mb-3">
                <label>Reason</label>
                <label>Type of Leave</label>
                <select name="type" class="form-control" required>
                    <option value="">-- Select Type --</option>
                    <option value="annual">Annual Leave</option>
                    <option value="sick">Sick Leave</option>
                    <option value="personal">Personal Leave</option>
                    <option value="emergency">Emergency Leave</option>
                </select>
            </div>
        </div>

        <div>
            <label>Upload Leave Letter (PDF)</label>
            <input type="file" name="letter" class="form-control" accept="application/pdf" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Submit Leave
        </button>
    </form>
@endsection
