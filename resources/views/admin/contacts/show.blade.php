@extends('admin.layouts.app')

@section('title', 'View Contact - ' . $contact->name)

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Message</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Contacts</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Message from {{ $contact->name }}</h3>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $contact->name }}</dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $contact->email }}</dd>

            <dt class="col-sm-3">Subject</dt>
            <dd class="col-sm-9">{{ $contact->subject }}</dd>

            <dt class="col-sm-3">Message</dt>
            <dd class="col-sm-9">{{ $contact->message }}</dd>

            <dt class="col-sm-3">Received At</dt>
            <dd class="col-sm-9">{{ $contact->created_at->format('Y-m-d H:i') }}</dd>
        </dl>
    </div>
</div>

</div>
</div>
</div>
</section>

@endsection
