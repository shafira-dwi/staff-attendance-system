@extends('layouts.staff')

@section('content')
    <div class="topbar mb-4">
        <h3>Leave Request</h3>
    </div>

    <form method="POST" action="{{ route('staff.leave.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Type of Leave</label>
                    <select name="type" class="form-control" required>
                        <option value="">-- Select Type --</option>
                        <option value="annual">Annual Leave</option>
                        <option value="sick">Sick Leave</option>
                        <option value="personal">Personal Leave</option>
                        <option value="emergency">Emergency Leave</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label>Upload Leave Letter (PDF)</label>
                    <input type="file" name="letter" class="form-control" accept="application/pdf" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-1"></i> Submit Leave
                    </button>
                </div>

            </div>
        </div>
    </form>
@endsection
