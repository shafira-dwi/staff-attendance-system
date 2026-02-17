@extends('layouts.staff')

@section('title', 'My Profile')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow-sm">

                    <!-- Header -->
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">My Profile</h5>
                    </div>

                    <!-- Body -->
                    <div class="card-body">

                        <div class="d-flex justify-content-center mb-4">
                            <img src="https://ui-avatars.com/api/?name=Staff+User&size=120&background=0D8ABC&color=fff"
                                class="rounded-circle shadow-sm" width="120" height="120" style="object-fit: cover;">
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Nama Lengkap</div>
                            <div class="col-sm-8 fw-semibold">
                                {{ auth()->user()->staff->name ?? auth()->user()->name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Email</div>
                            <div class="col-sm-8">{{ auth()->user()->email }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">ID Staff</div>
                            <div class="col-sm-8">{{ auth()->id() }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Mulai Bergabung</div>
                            <div class="col-sm-8">
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </div>
                        </div>

                        {{-- Tambahan kalau ada relasi staff --}}
                        @if (auth()->user()->staff)
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted">No. Telepon</div>
                                <div class="col-sm-8">{{ auth()->user()->staff->phone ?? '-' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted">Jabatan</div>
                                <div class="col-sm-8">{{ auth()->user()->staff->position ?? 'Staff' }}</div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
