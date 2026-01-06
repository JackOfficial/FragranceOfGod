@extends('layouts.admin')
@section('title','HFRO - Projects')

<style>
.image-stack {
    display: flex;
    align-items: center;
}
.image-stack img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    margin-left: -12px;
    background: #f4f6f9;
}
.image-stack img:first-child {
    margin-left: 0;
}
.image-stack .more {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #6c757d;
    color: #fff;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: -12px;
    border: 2px solid #fff;
}

.documents-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.documents-list li {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.85rem;
}
.documents-list li a {
    text-decoration: none;
}
</style>

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h1>Projects ({{ $projects->total() }})</h1>
    </div>
</section>

<section class="content">
<div class="card">
<div class="card-body table-responsive">

<a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Add Project
</a>

<table class="table table-bordered align-middle">
<thead>
<tr>
    <th>Title</th>
    <th>Images</th>
    <th>Documents</th>
    <th>Status</th>
    <th width="160">Actions</th>
</tr>
</thead>

<tbody>
@forelse($projects as $project)
<tr>
    <td class="fw-bold">{{ $project->title }}</td>

    {{-- Facebook-style stacked images --}}
    <td>
        @php
            $images = $project->media->where('file_type','image');
        @endphp

        @if($images->count())
            <div class="image-stack">
                @foreach($images->take(4) as $img)
                    <img src="{{ asset('storage/'.$img->file_path) }}" alt="Project image">
                @endforeach

                @if($images->count() > 4)
                    <div class="more">
                        +{{ $images->count() - 4 }}
                    </div>
                @endif
            </div>
        @else
            <span class="text-muted">No images</span>
        @endif
    </td>

    {{-- Documents --}}
    <td>
        @php
            $docs = $project->media->where('file_type','document');
        @endphp

        @if($docs->count())
            <ul class="documents-list">
                @foreach($docs as $doc)
                    <li>
                        <i class="fas fa-file-pdf text-danger"></i>
                        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">
                            {{ \Illuminate\Support\Str::limit(basename($doc->file_path), 20) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <span class="text-muted">No documents</span>
        @endif
    </td>

    <td>
        @if($project->is_published)
            <span class="badge badge-success">Published</span>
        @else
            <span class="badge badge-secondary">Draft</span>
        @endif
    </td>

    <td>
        <a href="{{ route('admin.projects.edit',$project->id) }}"
           class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('admin.projects.destroy',$project->id) }}"
              method="POST" class="d-inline"
              onsubmit="return confirm('Delete this project?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center text-muted">
        No projects found.
    </td>
</tr>
@endforelse
</tbody>

</table>

{{ $projects->links('pagination::bootstrap-4') }}

</div>
</div>
</section>

@endsection
