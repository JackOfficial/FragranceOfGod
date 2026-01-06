@extends('layouts.admin')
@section('title', 'View Volunteer')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Volunteer Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.volunteers.index') }}">Volunteers</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <h4 class="mb-3">{{ $volunteer->name }}</h4>

        <p><strong>Email:</strong> {{ $volunteer->email }}</p>
        <p><strong>Phone:</strong> {{ $volunteer->phone }}</p>
        <p><strong>Opportunity:</strong> {{ $volunteer->opportunity }}</p>

        <hr>

        <h6>Message</h6>
        <p class="text-muted">
            {{ $volunteer->message ?? 'No message provided.' }}
        </p>

        <hr>

        <p>
            <strong>Status:</strong>
            <span class="badge badge-{{ 
                $volunteer->status == 'approved' ? 'success' : 
                ($volunteer->status == 'rejected' ? 'danger' : 'warning') 
            }}">
                {{ ucfirst($volunteer->status) }}
            </span>
        </p>

        <div class="mt-4 d-flex gap-2">

            {{-- Approve --}}
            <form action="{{ route('admin.volunteers.status', $volunteer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="approved">
                <button class="btn btn-success"
                        {{ $volunteer->status == 'approved' ? 'disabled' : '' }}>
                    <i class="fas fa-check"></i> Approve
                </button>
            </form>

            {{-- Reject --}}
            <form action="{{ route('admin.volunteers.status', $volunteer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="rejected">
                <button class="btn btn-danger"
                        {{ $volunteer->status == 'rejected' ? 'disabled' : '' }}>
                    <i class="fas fa-times"></i> Reject
                </button>
            </form>

            {{-- Back --}}
            <a href="{{ route('admin.volunteers.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>
</div>

</section>
@endsection
