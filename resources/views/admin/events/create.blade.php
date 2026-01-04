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
            <div class="card card-primary" x-data="{ imagePreview: null, docs: [] }">
                <div class="card-header">
                    <h3 class="card-title">New Event Details</h3>
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

                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Event Title -->
                        <div class="form-group">
                            <label for="title">Event Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <!-- Slug -->
                        <div class="form-group">
                            <label for="slug">Slug (URL Friendly) <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
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

                        <!-- Event Documents -->
                        <div class="form-group">
                            <label for="documents">Attach Documents / PDFs</label>
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
