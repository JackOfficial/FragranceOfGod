@extends('layouts.admin')
@section('title', 'HFRO - Edit Story')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit Story</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.stories.index') }}">Stories</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" x-data="{ imagePreviews: [], docs: [] }">

            <div class="card-header bg-gradient-primary text-white">
                <h3 class="card-title">
                    <i class="fas fa-newspaper"></i> Edit Story
                </h3>
            </div>

            <div class="card-body">

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.stories.update', $story->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- STORY INFO --}}
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2">
                            <i class="fas fa-info-circle"></i> Story Info
                        </legend>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-heading"></i> Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           value="{{ old('title', $story->title) }}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-eye"></i> Publish?
                                    </label>
                                    <select name="is_published" class="form-control">
                                        <option value="1" {{ $story->is_published ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !$story->is_published ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    {{-- DESCRIPTION --}}
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2">
                            <i class="fas fa-align-left"></i> Description
                        </legend>
                        <textarea name="description"
                                  class="form-control summernote">
                            {{ old('description', $story->description) }}
                        </textarea>
                    </fieldset>

                    {{-- MEDIA --}}
                    <fieldset class="border p-3 mb-3">
                        <legend class="w-auto px-2">
                            <i class="fas fa-file-upload"></i> Media Uploads
                        </legend>

                        <div class="row">

                            {{-- IMAGES --}}
                            <div class="col-md-6">
                                <label><i class="fas fa-image"></i> Story Images</label>

                                {{-- Existing Images --}}
                                @php
                                    $images = $story->media->where('file_type', 'image');
                                @endphp

                                @if($images->count())
                                    <div class="mb-2">
                                        <small class="text-muted">Current Images</small>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach($images as $img)
                                                <img src="{{ asset('storage/'.$img->file_path) }}"
                                                     class="img-thumbnail"
                                                     style="width:100px;height:100px;object-fit:cover;">
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                {{-- Upload New Images --}}
                                <input type="file"
                                       name="images[]"
                                       class="form-control"
                                       multiple
                                       accept="image/*"
                                       @change="imagePreviews = Array.from($event.target.files).map(f => URL.createObjectURL(f))">

                                {{-- New Image Preview --}}
                                <template x-if="imagePreviews.length">
                                    <div class="mt-2">
                                        <small class="text-muted">New Images</small>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <template x-for="src in imagePreviews" :key="src">
                                                <img :src="src"
                                                     class="img-thumbnail"
                                                     style="width:100px;height:100px;object-fit:cover;">
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            {{-- DOCUMENTS --}}
                            <div class="col-md-6">
                                <label><i class="fas fa-file-pdf"></i> Documents</label>

                                {{-- Existing Documents --}}
                                @php
                                    $documents = $story->media->where('file_type', 'document');
                                @endphp

                                @if($documents->count())
                                    <ul class="list-group mb-2">
                                        @foreach($documents as $doc)
                                            <li class="list-group-item">
                                                <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">
                                                    <i class="fas fa-file-pdf text-danger"></i>
                                                    {{ basename($doc->file_path) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                {{-- Upload New Documents --}}
                                <input type="file"
                                       name="documents[]"
                                       class="form-control"
                                       multiple
                                       @change="docs = Array.from($event.target.files).map(f => ({ name: f.name, size: f.size }))">

                                {{-- New Docs Preview --}}
                                <template x-if="docs.length">
                                    <ul class="list-group mt-2">
                                        <template x-for="doc in docs" :key="doc.name">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span x-text="doc.name"></span>
                                                <small class="text-muted"
                                                       x-text="'(' + Math.round(doc.size/1024) + ' KB)'"></small>
                                            </li>
                                        </template>
                                    </ul>
                                </template>
                            </div>

                        </div>
                    </fieldset>

                    {{-- ACTIONS --}}
                    <div class="d-flex gap-3">
                        <a href="{{ route('admin.stories.index') }}"
                           class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit"
                                class="btn btn-success">
                            <i class="fas fa-save"></i> Update Story
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
    $(function () {
        $('.summernote').summernote({
            height: 180,
            placeholder: 'Write detailed story content here...'
        });
    });
</script>
@endsection
