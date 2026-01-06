@extends('layouts.admin')
@section('title', 'Fragrance Of God - Broadcasts')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Broadcasts ({{ $broadcasts->total() }})</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Broadcasts</li>
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
            <a href="{{ route('admin.broadcasts.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> New Broadcast
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped projects align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Sent At</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($broadcasts as $broadcast)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-bold">{{ $broadcast->subject }}</td>

                                <td>
                                    @if($broadcast->status === 'sent')
                                        <span class="badge badge-success">Sent</span>
                                    @else
                                        <span class="badge badge-secondary">Draft</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $broadcast->sent_at ? $broadcast->sent_at->format('d M Y H:i') : '-' }}
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.broadcasts.edit', $broadcast->id) }}"
                                       class="btn btn-info btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.broadcasts.destroy', $broadcast->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this broadcast?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.broadcasts.show', $broadcast->id) }}"
                                       class="btn btn-secondary btn-sm" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    No broadcasts available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $broadcasts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
