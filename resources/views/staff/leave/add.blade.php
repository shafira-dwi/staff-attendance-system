@extends('layouts.staff')

@section('content')
    <div class="container">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Leave Request</h3>
                <small class="text-muted">Submit your leave request easily</small>
            </div>
        </div>

        <form method="POST" action="{{ route('staff.leave.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">

                    <!-- DATE -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input type="date" name="start_date" class="form-control rounded-2" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">End Date</label>
                            <input type="date" name="end_date" class="form-control rounded-2" required>
                        </div>
                    </div>

                    <!-- TYPE -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Type of Leave</label>
                        <select name="type" class="form-select rounded-2" required>
                            <option value="">-- Select Type --</option>
                            <option value="annual">Annual</option>
                            <option value="sick">Sick</option>
                            <option value="personal">Personal</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>

                    <!-- REASON -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Reason</label>
                        <textarea name="reason" maxlength="100" rows="3" class="form-control rounded-2"
                            placeholder="Explain your reason for leave..." required></textarea>
                    </div>

                    <!-- OPTIONAL LETTER -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Upload Supporting Document (Optional)
                        </label>

                        <input type="file" name="letter" class="form-control rounded-2">

                        <small class="text-muted">
                            Upload file PDF (max 2MB)
                        </small>

                        @error('letter')
                            <div class="text-danger text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4 rounded-2">
                            <i class="fas fa-paper-plane me-1"></i> Submit Leave
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
