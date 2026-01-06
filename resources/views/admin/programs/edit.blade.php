@extends('layouts.admin')
@section('title', 'Edit Program')

@section('content')
<div class="container-fluid">
    <h1>Edit Program</h1>

    <form method="POST" action="{{ route('admin.programs.update', $program->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" 
                   class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title', $program->title) }}" required>
            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt <span class="text-danger">*</span></label>
            <input type="text" name="excerpt" id="excerpt" 
                   class="form-control @error('excerpt') is-invalid @enderror" 
                   value="{{ old('excerpt', $program->excerpt) }}" required>
            @error('excerpt') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" 
                      class="form-control @error('description') is-invalid @enderror" 
                      rows="5">{{ old('description', $program->description) }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon (FontAwesome)</label>
            <input type="text" name="icon" id="icon" 
                   class="form-control @error('icon') is-invalid @enderror" 
                   value="{{ old('icon', $program->icon) }}">
            @error('icon') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="is_published" class="form-label">Status</label>
            <select name="is_published" id="is_published" class="form-control">
                <option value="1" {{ old('is_published', $program->is_published) == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ old('is_published', $program->is_published) == 0 ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="focus_areas" class="form-label">Focus Areas</label>
            <select name="focus_areas[]" id="focus_areas" class="form-control" multiple>
                @foreach($focusAreas as $area)
                    <option value="{{ $area->id }}" 
                        {{ in_array($area->id, old('focus_areas', $program->focusAreas->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $area->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Program</button>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
