<h2>Admin - Leave Requests</h2>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Date</th>
            <th>Type</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leaves as $leave)
        <tr>
            <td>{{ $leave->user_id }}</td>
            <td>{{ $leave->start_date }} → {{ $leave->end_date }}</td>
            <td>{{ ucfirst($leave->type) }}</td>
            <td>{{ $leave->reason }}</td>
            <td>
                @if ($leave->status === 'pending')
                    ⏳ Pending
                @elseif ($leave->status === 'approved')
                    ✅ Approved
                @else
                    ❌ Rejected
                @endif
            </td>
            <td>
                @if ($leave->status === 'pending')
                    <form action="/admin/leave-requests/{{ $leave->id }}/approve" method="POST" style="display:inline">
                        @csrf
                        <button type="submit">Approve</button>
                    </form>

                    <form action="/admin/leave-requests/{{ $leave->id }}/reject" method="POST" style="display:inline">
                        @csrf
                        <button type="submit">Reject</button>
                    </form>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', e => {
        if (!confirm('Are you sure?')) e.preventDefault();
    });
});
</script>
