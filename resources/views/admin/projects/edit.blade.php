@extends('layouts.admin')
@section('title', 'HFRO - Edit Project')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit Project</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Edit Project</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<div class="container-fluid">

<div class="card shadow-sm" x-data="{ imagePreviews: [] }">
<div class="card-header bg-gradient-primary text-white">
    <h3 class="card-title"><i class="fas fa-edit"></i> Update Project</h3>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- ================= PROJECT INFO ================= -->
<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-info-circle"></i> Project Info</legend>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Project Title *</label>
<input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Publish?</label>
<select name="is_published" class="form-control">
<option value="1" {{ $project->is_published ? 'selected' : '' }}>Yes</option>
<option value="0" {{ !$project->is_published ? 'selected' : '' }}>No</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Short Description *</label>
<textarea name="short_desc" class="form-control" rows="2">{{ $project->short_desc }}</textarea>
</div>
</div>
</div>
</fieldset>

<!-- ================= DESCRIPTION ================= -->
<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-align-left"></i> Description</legend>
<textarea name="description" class="form-control summernote">
{!! $project->description !!}
</textarea>
</fieldset>

<!-- ================= EXISTING IMAGES ================= -->
<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-images"></i> Existing Images</legend>

<div class="row g-3">
@foreach($project->images as $image)
<div class="col-md-3">
<div class="card border {{ $image->is_cover ? 'border-success' : '' }}">
<img src="{{ asset('storage/'.$image->file_path) }}"
     class="card-img-top"
     style="height:160px; object-fit:cover;">

<div class="card-body p-2 text-center">

@if($image->is_cover)
<span class="badge bg-success mb-2">Cover</span>
@else
<form action="{{ route('admin.media.cover', $image->id) }}" method="POST">
@csrf
<button class="btn btn-sm btn-outline-success mb-1">
Set as Cover
</button>
</form>
@endif

<form action="{{ route('admin.media.destroy', $image->id) }}" method="POST">
@csrf @method('DELETE')
<button class="btn btn-sm btn-outline-danger">
Delete
</button>
</form>

</div>
</div>
</div>
@endforeach
</div>
</fieldset>

<!-- ================= EXISTING DOCUMENTS ================= -->
@if($project->documents->count())
<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-file-pdf"></i> Documents</legend>

<ul class="list-group">
@foreach($project->documents as $doc)
<li class="list-group-item d-flex justify-content-between align-items-center">
<a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">
<i class="fas fa-file-pdf text-danger"></i> View Document
</a>

<form action="{{ route('admin.media.destroy', $doc->id) }}" method="POST">
@csrf @method('DELETE')
<button class="btn btn-sm btn-outline-danger">Delete</button>
</form>
</li>
@endforeach
</ul>
</fieldset>
@endif

<!-- ================= ADD NEW MEDIA ================= -->
<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-upload"></i> Add More Media</legend>

<div class="row">
<div class="col-md-6">
<label>New Images</label>
<input type="file" name="images[]" multiple class="form-control"
@change="imagePreviews = Array.from($event.target.files).map(f => URL.createObjectURL(f))">

<div class="mt-2 d-flex flex-wrap gap-2">
<template x-for="src in imagePreviews">
<img :src="src" class="img-thumbnail" style="width:100px;height:100px;">
</template>
</div>
</div>

<div class="col-md-6">
<label>New Documents / PDFs</label>
<input type="file" name="documents[]" multiple class="form-control">
</div>
</div>
</fieldset>

<!-- ================= ACTIONS ================= -->
<div class="d-flex gap-2">
<a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i> Back
</a>

<button type="submit" class="btn btn-success">
<i class="fas fa-save"></i> Update Project
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
        placeholder: 'Update project description...'
    });
});
</script>
@endsection
