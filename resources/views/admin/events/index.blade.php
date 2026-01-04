@extends('admin.layouts.app')
@section('title', 'Events')
@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Events ({{ $events->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Event
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td>{{ $event->iteration }}</td>
                          <td>
    @php
        $firstImage = $event->media->where('file_type', 'image')->first();
    @endphp

    @if($firstImage)
        <img src="{{ asset('storage/' . $firstImage->file_path) }}" class="img-thumbnail" style="width:80px">
    @else
        <span class="text-muted">No image</span>
    @endif
</td>
                            <td>{{ $event->title }}</td>
                            <td>{!! Str::limit(strip_tags($event->description), 50) !!}</td>
                            <td>{{ $event->event_date->format('d M, Y') }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                @if($event->is_published)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="/events/{{ $event->slug }}" target="_blank" class="btn btn-success btn-sm mr-1" title="View Frontend">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-info btn-sm mr-1" title="Edit Event">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete Event">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No events available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $events->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</section>

@endsection
