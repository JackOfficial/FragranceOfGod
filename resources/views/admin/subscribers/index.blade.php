@extends('layouts.admin')
@section('title', 'Fragrance Of God - Subscribers')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Subscribers ({{ $subscribers->total() }})</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Subscribers</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header">
            {{-- Optional: You can add a button to manually add a subscriber --}}
            <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Subscriber
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Subscribed At</th>
                            <th style="width:120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscribers as $subscriber)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->created_at->format('d M, Y H:i') }}</td>
                                <td class="d-flex gap-1">
                                    <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this subscriber?')">
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
                                <td colspan="4" class="text-center text-muted">
                                    No subscribers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $subscribers->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
