@extends('layouts.admin')
@section('title', 'HFRO - Create Project')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Add Project</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Add Project</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<div class="container-fluid">
<div class="card shadow-sm" x-data="{ imagePreviews: [], docs: [] }">

<div class="card-header bg-gradient-primary text-white">
    <h3 class="card-title"><i class="fas fa-project-diagram"></i> Create New Project</h3>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-info-circle"></i> Project Info</legend>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Project Title *</label>
<input type="text" name="title" class="form-control" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Publish?</label>
<select name="is_published" class="form-control">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Short Description *</label>
<textarea name="short_desc" class="form-control" rows="2"></textarea>
</div>
</div>
</div>
</fieldset>

<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-align-left"></i> Description</legend>
<textarea name="description" class="form-control summernote"></textarea>
</fieldset>

<fieldset class="border p-3 mb-3">
<legend class="w-auto px-2"><i class="fas fa-file-upload"></i> Media Uploads</legend>

<div class="row">
<div class="col-md-6">
<label>Project Images (first = cover)</label>
<input type="file" name="images[]" multiple class="form-control"
@change="imagePreviews = Array.from($event.target.files).map(f => URL.createObjectURL(f))">

<div class="mt-2 d-flex flex-wrap gap-2">
<template x-for="src in imagePreviews">
<img :src="src" class="img-thumbnail" style="width:100px;height:100px;">
</template>
</div>
</div>

<div class="col-md-6">
<label>Documents / PDFs</label>
<input type="file" name="documents[]" multiple class="form-control">
</div>
</div>
</fieldset>

<div class="d-flex gap-2">
<a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
<button class="btn btn-success">Create Project</button>
</div>

</form>
</div>
</div>
</div>
</section>

@endsection
