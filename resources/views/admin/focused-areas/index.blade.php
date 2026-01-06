@extends('layouts.admin')
@section('title', 'HFRO - Focused Areas')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Focused Areas ({{ $focusAreas->total() }})</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Focused Areas</li>
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
            <a href="{{ route('admin.focused-areas.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Focus Area
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
                        @forelse($focusAreas as $area)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-bold">{{ $area->title }}</td>

                                <td><i class="{{ $area->icon }}"></i></td>

                                <td>
                                    @if($area->is_published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.focused-areas.edit', $area->id) }}"
                                       class="btn btn-info btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.focused-areas.destroy', $area->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this focus area?')">
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
                                    No focused areas available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $focusAreas->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
