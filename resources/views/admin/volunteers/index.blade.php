@extends('layouts.admin')
@section('title', 'Fragrance Of God - Volunteers')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Volunteers ({{ $volunteers->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Volunteers</li>
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

    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-bold">Volunteer Applications</span>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-striped projects align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Opportunity</th>
                        <th>Status</th>
                        <th style="width:180px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($volunteers as $volunteer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-bold">{{ $volunteer->name }}</td>

                            <td>{{ $volunteer->email }}</td>

                            <td>{{ $volunteer->phone }}</td>

                            <td>{{ $volunteer->opportunity }}</td>

                            <td>
                                @if($volunteer->status === 'approved')
                                    <span class="badge badge-success">Approved</span>
                                @elseif($volunteer->status === 'rejected')
                                    <span class="badge badge-danger">Rejected</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>

                            <td class="d-flex gap-1">

                                {{-- View --}}
                                <a href="{{ route('admin.volunteers.show', $volunteer->id) }}"
                                   class="btn btn-secondary btn-sm"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.volunteers.destroy', $volunteer->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this volunteer application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No volunteer applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $volunteers->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

</div>
</section>

@endsection
