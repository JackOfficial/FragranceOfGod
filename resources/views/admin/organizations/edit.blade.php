@extends('layouts.admin')
@section('title', 'Add Organization')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Add Organization</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.organization.index') }}">Organizations</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.organization.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @include('admin.organizations._form')

                <div class="mt-3">
                    <button class="btn btn-success btn-sm">
                        <i class="fas fa-save"></i> Save
                    </button>
                    <a href="{{ route('admin.organization.index') }}" class="btn btn-secondary btn-sm">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
