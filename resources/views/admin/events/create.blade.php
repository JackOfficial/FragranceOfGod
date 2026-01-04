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
        <div class="col-lg-10 col-md-12">
            <div class="card shadow-sm border-0 rounded p-4" x-data="{ imagePreviews: [], docs: [] }">

                <h4 class="mb-4 text-primary"><i class="fas fa-calendar-plus"></i> New Event Details</h4>

                <!-- Display Validation Errors -->
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

                    <!-- Event Title & Slug -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug (URL Friendly) <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
                        </div>
                    </div>

                    <!-- Event Date & Location -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-4">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control summernote" rows="6">{{ old('description') }}</textarea>
                    </div>

                    <!-- Event Images -->
                    <div class="form-group mb-4">
                        <label for="images" class="form-label">Event Images</label>
                        <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple
                               @change="imagePreviews = Array.from($event.target.files).map(f => ({ src: URL.createObjectURL(f), name: f.name }))">
                        
                        <template x-if="imagePreviews.length">
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                <template x-for="(img, index) in imagePreviews" :key="index">
                                    <div class="position-relative">
                                        <img :src="img.src" class="img-thumbnail" style="width:120px; height:120px; object-fit:cover;">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0"
                                                @click="imagePreviews.splice(index, 1)">×</button>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    <!-- Event Documents -->
                    <div class="form-group mb-4">
                        <label for="documents" class="form-label">Attach Documents / PDFs</label>
                        <input type="file" name="documents[]" id="documents" multiple class="form-control"
                               @change="docs = Array.from($event.target.files).map(f => ({ name: f.name, size: f.size }))">
                        
                        <template x-if="docs.length">
                            <ul class="list-group mt-2">
                                <template x-for="(doc, index) in docs" :key="index">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span x-text="doc.name"></span>
                                            <small class="text-muted ms-2" x-text="'(' + Math.round(doc.size/1024) + ' KB)'"></small>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger" @click="docs.splice(index,1)">Remove</button>
                                    </li>
                                </template>
                            </ul>
                        </template>
                    </div>

                    <!-- Publish -->
                    <div class="form-group mb-4">
                        <label for="is_published" class="form-label">Publish Event?</label>
                        <select name="is_published" id="is_published" class="form-control">
                            <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-plus-circle"></i> Create Event</button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                    </div>

                </form>
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
