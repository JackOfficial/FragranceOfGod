@extends('layouts.admin')

@section('title', 'Create Program')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
                <h3 class="card-title"><i class="fas fa-book"></i> Create New Program</h3>
            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('admin.programs.store') }}" method="POST">
                    @csrf

                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-info-circle"></i> Program Info</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_published">Publish Program?</label>
                                    <select name="is_published" id="is_published" class="form-control">
                                        <option value="1" {{ old('is_published', 1) == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-align-left"></i> Excerpt & Description</legend>
                        <div class="mb-3">
                            <label for="excerpt">Excerpt</label>
                            <input type="text" name="excerpt" id="excerpt" class="form-control" value="{{ old('excerpt') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control summernote">{{ old('description') }}</textarea>
                        </div>
                    </fieldset>

                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2"><i class="fas fa-icons"></i> Icon</legend>
                        <div class="mb-3">
                            <label for="icon">FontAwesome Icon</label>
                            <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', 'fas fa-hands-helping') }}">
                        </div>
                    </fieldset>

                    <div class="d-flex gap-3">
                        <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary"><i class="fas fa-times me-1"></i> Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle me-1"></i> Create Program</button>
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
            placeholder: 'Write detailed description here...',
            tabsize: 2,
            height: 180
        });
    });
</script>
@endsection
