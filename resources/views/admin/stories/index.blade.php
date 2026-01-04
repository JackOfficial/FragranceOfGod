@extends('layouts.admin')
@section('title', 'HFRO - Stories')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Stories ({{ $stories->total() }})</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Stories</li>
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
            <a href="{{ route('admin.stories.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Story
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stories as $story)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $story->title }}</td>
                                <td>{{ $story->author->name ?? 'Unknown' }}</td>
                                <td>
                                    @if($story->is_published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $story->created_at->format('d M, Y') }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.stories.edit', $story->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($story->trashed())
                                        <form action="{{ route('admin.stories.restore', $story->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success btn-sm" title="Restore">
                                                <i class="fas fa-trash-restore"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.stories.forceDelete', $story->id) }}" method="POST" onsubmit="return confirm('Permanently delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete Forever">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Move to trash?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm" title="Trash">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted">No stories available.</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">{{ $stories->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
</section>

@endsection
