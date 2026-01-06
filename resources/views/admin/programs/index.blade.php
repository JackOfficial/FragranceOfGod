@extends('layouts.admin')
@section('title', 'Fragrance Of God - Programs')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Programs ({{ $programs->total() }})</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Programs</li>
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
            <a href="{{ route('admin.programs.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Program
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $program)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-bold">{{ $program->title }}</td>

                                <td><i class="{{ $program->icon }}"></i></td>

                                <td>
                                    @if($program->is_published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.programs.edit', $program->id) }}"
                                       class="btn btn-info btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.programs.destroy', $program->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this program?')">
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
                                <td colspan="5" class="text-center text-muted">
                                    No programs available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $programs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
