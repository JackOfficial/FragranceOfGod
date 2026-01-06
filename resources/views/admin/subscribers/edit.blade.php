@extends('layouts.admin')
@section('title', 'Edit Subscriber | Fragrance Of God')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit Subscriber</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subscribers.index') }}">Subscribers</a></li>
                    <li class="breadcrumb-item active">Edit Subscriber</li>
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
        <div class="card-header">
            <h3 class="card-title">Edit Subscriber</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.subscribers.update', $subscriber->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email"
                           value="{{ old('email', $subscriber->email) }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="subscriber@example.com" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-edit"></i> Update Subscriber
                    </button>
                    <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
