@extends('layouts.admin')
@section('title', 'HFRO - Create Event')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Add Event</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Add Event</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" x-data="{ imagePreviews: [], docs: [] }">
            <div class="card-header bg-gradient-primary text-white">
                <h3 class="card-title"><i class="fas fa-calendar-plus"></i> Create New Event</h3>
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

                    <!-- Event Info -->
                   <!-- Event Info -->
<fieldset class="border p-3 mb-3">
    <legend class="w-auto px-2"><i class="fas fa-info-circle"></i> Event Info</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title"><i class="fas fa-heading"></i> Event Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="event_date"><i class="fas fa-calendar-alt"></i> Event Date <span class="text-danger">*</span></label>
                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="event_time"><i class="fas fa-clock"></i> Event Time <span class="text-danger">*</span></label>
                <input type="time" name="event_time" id="event_time" class="form-control" value="{{ old('event_time', '12:00') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="location"><i class="fas fa-map-marker-alt"></i> Location <span class="text-danger">*</span></label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="is_published"><i class="fas fa-eye"></i> Publish Event?</label>
                <select name="is_published" id="is_published" class="form-control">
                    <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
    </div>
</fieldset>


                    <!-- Description -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-align-left"></i> Description</legend>
                        <div class="form-group">
                            <textarea name="description" id="description" class="form-control summernote">{{ old('description') }}</textarea>
                        </div>
                    </fieldset>

                    <!-- Media Uploads -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-file-upload"></i> Media Uploads</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Event Images -->
                                <div class="form-group">
                                    <label for="images"><i class="fas fa-image"></i> Event Images</label>
                                    <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple
                                           @change="imagePreviews = Array.from($event.target.files).map(f => URL.createObjectURL(f))">

                                    <template x-if="imagePreviews.length">
                                        <div class="mt-2 d-flex flex-wrap gap-2">
                                            <template x-for="src in imagePreviews" :key="src">
                                                <img :src="src" class="img-thumbnail" style="width:100px; height:100px; object-fit:cover;">
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Event Documents -->
                                <div class="form-group">
                                    <label for="documents"><i class="fas fa-file-pdf"></i> Attach Documents / PDFs</label>
                                    <input type="file" name="documents[]" id="documents" multiple class="form-control"
                                           @change="docs = Array.from($event.target.files).map(f => ({ name: f.name, size: f.size }))">

                                    <template x-if="docs.length">
                                        <ul class="list-group mt-2">
                                            <template x-for="(doc, index) in docs" :key="index">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span x-text="doc.name"></span>
                                                    <small class="text-muted" x-text="'(' + Math.round(doc.size/1024) + ' KB)'"></small>
                                                </li>
                                            </template>
                                        </ul>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Submit Buttons -->
                   <div class="d-flex justify-content-start gap-3">
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary mr-2">
        <i class="fas fa-times me-1"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus-circle me-1"></i> Create Event
    </button>
</div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Write detailed event description here...',
            tabsize: 2,
            height: 180
        });
    });
</script>
@endsection
