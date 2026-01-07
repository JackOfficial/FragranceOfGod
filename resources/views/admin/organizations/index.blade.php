@extends('layouts.admin')
@section('title', 'Fragrance Of God - Organization Information')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Organizations ({{ $organizations->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Organizations</li>
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
            <a href="{{ route('admin.organization.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Organization
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slogan</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($organizations as $org)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-bold">{{ $org->name }}</td>

                                <td>{{ $org->slogan ?? '—' }}</td>

                                <td>{{ $org->email ?? '—' }}</td>

                                <td>
                                    @if($org->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.organization.edit', $org->id) }}"
                                       class="btn btn-info btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.organization.destroy', $org->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this organization?')">
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
                                <td colspan="6" class="text-center text-muted">
                                    No organizations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $organizations->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
