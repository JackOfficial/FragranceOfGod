@extends('layouts.admin')
@section('title', 'Fragrance Of God - Add Volunteer')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Volunteer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.volunteers.index') }}">Volunteers</a></li>
                    <li class="breadcrumb-item active">Add Volunteer</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Volunteer Information</h3>
    </div>

    <form action="{{ route('admin.volunteers.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="row">

                {{-- Full Name --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror"
                               required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Phone --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone') }}"
                               class="form-control @error('phone') is-invalid @enderror"
                               required>
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Opportunity --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Volunteer Opportunity <span class="text-danger">*</span></label>
                        <select name="opportunity"
                                class="form-control @error('opportunity') is-invalid @enderror"
                                required>
                            <option value="">-- Select Opportunity --</option>
                            <option value="Community Outreach Volunteer" {{ old('opportunity') == 'Community Outreach Volunteer' ? 'selected' : '' }}>
                                Community Outreach Volunteer
                            </option>
                            <option value="Youth Mentorship Volunteer" {{ old('opportunity') == 'Youth Mentorship Volunteer' ? 'selected' : '' }}>
                                Youth Mentorship Volunteer
                            </option>
                            <option value="Health & Wellness Volunteer" {{ old('opportunity') == 'Health & Wellness Volunteer' ? 'selected' : '' }}>
                                Health & Wellness Volunteer
                            </option>
                            <option value="Fundraising & Advocacy Volunteer" {{ old('opportunity') == 'Fundraising & Advocacy Volunteer' ? 'selected' : '' }}>
                                Fundraising & Advocacy Volunteer
                            </option>
                        </select>
                        @error('opportunity')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Message --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Message (Optional)</label>
                        <textarea name="message"
                                  rows="4"
                                  class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Status --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status"
                                class="form-control @error('status') is-invalid @enderror">
                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>
                                Approved
                            </option>
                            <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('admin.volunteers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Volunteer
            </button>
        </div>

    </form>

</div>
</section>

@endsection
