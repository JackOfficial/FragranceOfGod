@extends('layouts.admin')
@section('title','HFRO - Projects')

@section('content')

<section class="content-header">
<div class="container-fluid">
<h1>Projects</h1>
</div>
</section>

<section class="content">
<div class="card">
<div class="card-body table-responsive">

<a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">
<i class="fas fa-plus"></i> Add Project
</a>

<table class="table table-bordered">
<thead>
<tr>
<th>Title</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($projects as $project)
<tr>
<td>{{ $project->title }}</td>
<td>{{ $project->is_published ? 'Published' : 'Draft' }}</td>
<td>
<a href="{{ route('admin.projects.edit',$project->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('admin.projects.destroy',$project->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>

</table>
{{ $projects->links() }}

</div>
</div>
</section>
@endsection
