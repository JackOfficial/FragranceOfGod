@extends('layouts.admin')

@section('title', 'Fragrance Of God - Edit Focus Area')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit Focus Area</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Focus Area</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
                <h3 class="card-title"><i class="fas fa-bullseye"></i> Edit Focus Area</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.focused-areas.update', $focusedArea->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Basic Info -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-info-circle"></i> Basic Info</legend>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label"><i class="fas fa-heading"></i> Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $focusedArea->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="excerpt" class="form-label"><i class="fas fa-quote-left"></i> Excerpt <span class="text-danger">*</span></label>
                                <input type="text" name="excerpt" id="excerpt"
                                       class="form-control @error('excerpt') is-invalid @enderror"
                                       value="{{ old('excerpt', $focusedArea->excerpt) }}" required>
                                @error('excerpt')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-align-left"></i> Description</legend>
                        <div class="form-group">
                            <textarea name="description" id="description" 
                                      class="form-control summernote @error('description') is-invalid @enderror" 
                                      rows="5">{{ old('description', $focusedArea->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>

                    <!-- Icon & Status -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-cogs"></i> Icon & Status</legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="icon" class="form-label"><i class="fas fa-icons"></i> Icon (FontAwesome class)</label>
                                <input type="text" name="icon" id="icon" 
                                       class="form-control @error('icon') is-invalid @enderror"
                                       value="{{ old('icon', $focusedArea->icon) }}">
                                @error('icon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="is_published" class="form-label"><i class="fas fa-eye"></i> Status</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    <option value="1" {{ old('is_published', $focusedArea->is_published) == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ old('is_published', $focusedArea->is_published) == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-start gap-3">
                        <a href="{{ route('admin.focused-areas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i> Update Focus Area
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
            placeholder: 'Update the description of this focus area...',
            tabsize: 2,
            height: 150
        });
    });
</script>
@endsection
