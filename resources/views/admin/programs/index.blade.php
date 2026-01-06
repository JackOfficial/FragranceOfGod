@extends('layouts.admin')

@section('title', 'Programs')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h1>Programs</h1>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
            + Add Program
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Icon</th>
                <th>Status</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->title }}</td>
                <td><i class="{{ $program->icon }}"></i></td>
                <td>
                    <span class="badge {{ $program->is_published ? 'bg-success' : 'bg-secondary' }}">
                        {{ $program->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this program?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $programs->links() }}
</div>
@endsection
