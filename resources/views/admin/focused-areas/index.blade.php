@extends('layouts.admin')

@section('title', 'Focused Areas')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h1>Focused Areas</h1>
        <a href="{{ route('admin.focused-areas.create') }}" class="btn btn-primary">
            + Add Focus Area
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Icon</th>
                <th>Status</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($focusAreas as $area)
            <tr>
                <td>{{ $area->title }}</td>
                <td><i class="{{ $area->icon }}"></i></td>
                <td>
                    <span class="badge {{ $area->is_published ? 'bg-success' : 'bg-secondary' }}">
                        {{ $area->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.focused-areas.edit', $area) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.focused-areas.destroy', $area) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this focus area?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $focusAreas->links() }}
</div>
@endsection
