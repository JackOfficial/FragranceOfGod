@extends('admin.layouts.app')
@section('title', 'HFRO - Create Event')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create New Event</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Event</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm" x-data="{ imagePreviews: [], docs: [] }">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">New Event Details</h3>
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

                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Event Title -->
                        <div class="form-group">
                            <label for="title">Event Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <!-- Event Date -->
                        <div class="form-group">
                            <label for="event_date">Event Date <span class="text-danger">*</span></label>
                            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location <span class="text-danger">*</span></label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control summernote" rows="6">{{ old('description') }}</textarea>
                        </div>

                        <!-- Event Images -->
                        <div class="form-group">
                            <label for="images">Event Images</label>
                            <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple
                                   @change="imagePreviews = Array.from($event.target.files).map(f => URL.createObjectURL(f))">

                            <template x-if="imagePreviews.length">
                                <div class="mt-2 d-flex flex-wrap gap-2">
                                    <template x-for="src in imagePreviews" :key="src">
                                        <img :src="src" class="img-thumbnail" style="width:150px; height:150px; object-fit:cover;">
                                    </template>
                                </div>
                            </template>
                        </div>

                        <!-- Event Documents -->
                        <div class="form-group">
                            <label for="documents">Attach Documents / PDFs</label>
                            <input type="file" name="documents[]" id="documents" multiple class="form-control"
                                   @change="docs = Array.from($event.target.files).map(f => ({ name: f.name, size: f.size }))">

                            <template x-if="docs.length">
                                <div class="mt-2">
                                    <ul class="list-group">
                                        <template x-for="(doc, index) in docs" :key="index">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span x-text="doc.name"></span>
                                                <small class="text-muted" x-text="'(' + Math.round(doc.size/1024) + ' KB)'"></small>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </template>
                        </div>

                        <!-- Publish -->
                        <div class="form-group">
                            <label for="is_published">Publish Event?</label>
                            <select name="is_published" id="is_published" class="form-control">
                                <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Create Event
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
