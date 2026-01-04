@extends('admin.layouts.app')
@section('title', 'HFRO - Edit Event')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Event: {{ $event->title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Edit Event</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-primary" x-data="{ imagePreview: '{{ $event->image ? asset('storage/' . $event->image) : '' }}', docs: @json($event->media->where('file_type','document')->pluck('file_path')->map(fn($p)=>basename($p))) }">
                <div class="card-header">
                    <h3 class="card-title">Edit Event Details</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Event Title -->
                        <div class="form-group">
                            <label for="title">Event Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required
                                   @input="document.getElementById('slug').value = this.value.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')">
                        </div>

                        <!-- Slug (auto-generated) -->
                        <div class="form-group">
                            <label for="slug">Slug (URL Friendly) <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $event->slug) }}" readonly>
                        </div>

                        <!-- Event Date -->
                        <div class="form-group">
                            <label for="event_date">Event Date <span class="text-danger">*</span></label>
                            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location <span class="text-danger">*</span></label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control summernote" rows="6">{{ old('description', $event->description) }}</textarea>
                        </div>

                        <!-- Event Image -->
                        <div class="form-group">
                            <label for="image">Event Image</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control"
                                   @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                            <template x-if="imagePreview">
                                <div class="mt-2">
                                    <img :src="imagePreview" class="img-thumbnail" style="width:200px;">
                                </div>
                            </template>
                        </div>

                        <!-- Existing Documents -->
                        <div class="form-group">
                            <label>Existing Documents</label>
                            <ul class="list-group mb-2">
                                @foreach($event->media->where('file_type','document') as $doc)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">{{ basename($doc->file_path) }}</a>
                                        <a href="{{ route('admin.events.media.delete', $doc->id) }}" class="text-danger" onclick="return confirm('Delete this file?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Upload New Documents -->
                        <div class="form-group">
                            <label for="documents">Add New Documents</label>
                            <input type="file" name="documents[]" id="documents" multiple class="form-control"
                                   @change="docs = Array.from($event.target.files).map(f => f.name)">
                            <template x-if="docs.length">
                                <div class="mt-2">
                                    <ul class="list-group">
                                        <li class="list-group-item" x-text="doc" x-for="doc in docs"></li>
                                    </ul>
                                </div>
                            </template>
                        </div>

                        <!-- Publish -->
                        <div class="form-group">
                            <label for="is_published">Publish Event?</label>
                            <select name="is_published" id="is_published" class="form-control">
                                <option value="1" {{ old('is_published', $event->is_published) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_published', $event->is_published) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Event
                            </button>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Write detailed event description here...',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endsection
