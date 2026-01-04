@extends('admin.layouts.app')
@section('title', 'View Event - ' . $event->title)

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $event->title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">View Event</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Event Details</h3>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> {{ $event->title }}</p>
            <p><strong>Slug:</strong> {{ $event->slug }}</p>
            <p><strong>Date:</strong> {{ $event->event_date->format('d M, Y') }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Published:</strong> {{ $event->is_published ? 'Yes' : 'No' }}</p>
            <p><strong>Description:</strong></p>
            <div>{!! $event->description !!}</div>

            <!-- Images -->
            @if($event->media->where('file_type', 'image')->count())
            <hr>
            <h5>Images:</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach($event->media->where('file_type', 'image') as $image)
                    <img src="{{ asset('storage/'.$image->file_path) }}" class="img-thumbnail" style="width:150px;">
                @endforeach
            </div>
            @endif

            <!-- Documents -->
            @if($event->media->where('file_type', 'document')->count())
            <hr>
            <h5>Documents:</h5>
            <ul>
                @foreach($event->media->where('file_type', 'document') as $doc)
                    <li><a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">{{ basename($doc->file_path) }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back to Events</a>
            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-info">Edit Event</a>
        </div>
    </div>
</section>
@endsection
