@extends('layouts.admin')
@section('title', 'HFRO - Projects')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Projects ({{ $projects->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Projects</li>
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
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped projects align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>Documents</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-bold">
                                    {{ $project->title }}
                                </td>

                                {{-- Images --}}
                                <td>
                                    @php
                                        $images = $project->media->where('file_type', 'image');
                                    @endphp

                                    @if($images->count())
                                        <div class="d-flex gap-1 flex-wrap">
                                            @foreach($images->take(3) as $img)
                                                <img src="{{ asset('storage/'.$img->file_path) }}"
                                                     class="img-thumbnail"
                                                     style="width:45px; height:45px; object-fit:cover;">
                                            @endforeach

                                            @if($images->count() > 3)
                                                <span class="badge badge-secondary">
                                                    +{{ $images->count() - 3 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                {{-- Documents --}}
                                <td>
                                    @php
                                        $docs = $project->media->where('file_type', 'document');
                                    @endphp

                                    @if($docs->count())
                                        <ul class="list-unstyled mb-0">
                                            @foreach($docs as $doc)
                                                <li>
                                                    <a href="{{ asset('storage/'.$doc->file_path) }}"
                                                       target="_blank"
                                                       class="text-sm">
                                                        <i class="fas fa-file-pdf text-danger"></i>
                                                        {{ \Illuminate\Support\Str::limit(basename($doc->file_path), 18) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if($project->is_published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                </td>

                                {{-- Created --}}
                                <td>
                                    {{ $project->created_at->format('d M, Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this project?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    No projects available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $projects->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</section>

@endsection
