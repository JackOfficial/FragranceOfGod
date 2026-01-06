@extends('admin.layouts.app')

@section('title', 'Admin - Contacts')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contacts ({{ $contacts->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
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
    <div class="card-header">
        <h3 class="card-title">All Contact Messages</h3>
    </div>

    <div class="card-body table-responsive p-3">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-light">
                <tr class="text-uppercase">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 50) }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('admin.contacts.show', $contact) }}"
                               class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye"></i>
                            </a>

                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">
                            <i class="fas fa-envelope-open-text"></i> No contact messages available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

</div>
</div>
</div>
</section>

@endsection
