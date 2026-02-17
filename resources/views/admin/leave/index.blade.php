@extends('layouts.admin')
@section('title', 'Leave Requests')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Leave Requests</h1>
        <p class="text-gray-500">Manage staff leave submissions</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Reason</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($leaves as $leave)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-3 font-medium text-gray-800">
                                #{{ $leave->user_id }}
                            </td>

                            <td class="px-4 py-3 text-gray-600">
                                {{ $leave->start_date }} → {{ $leave->end_date }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="capitalize">
                                    {{ $leave->type }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-gray-600">
                                {{ $leave->reason }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($leave->status === 'pending')
                                    <span
                                        class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        ⏳ Pending
                                    </span>
                                @elseif ($leave->status === 'approved')
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        ✅ Approved
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        ❌ Rejected
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($leave->status === 'pending')
                                    <div class="flex justify-center gap-2">

                                        <form action="/admin/leave-requests/{{ $leave->id }}/approve" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-xs transition">
                                                Approve
                                            </button>
                                        </form>

                                        <form action="/admin/leave-requests/{{ $leave->id }}/reject" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs transition">
                                                Reject
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">No Action</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

    <script>
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', e => {
                if (!confirm('Are you sure you want to continue?')) e.preventDefault();
            });
        });
    </script>

@endsection
