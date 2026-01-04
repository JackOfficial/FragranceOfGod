<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This Home</h1>
    <div class="text-center">
    <div class="fw-bold">
        {{ Auth::user()->name }}
        <div>{{ Auth::user()->getRoleNames()->first() }}</div>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="mt-2">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-danger">
            Logout
        </button>
    </form>

        @role('admin')
    <a href="/admin">Admin Dashboard</a>
@endrole

@can('manage users')
    <a href="/users">Manage Users</a>
@endcan

@hasanyrole('admin|staff')
    <button>Manage Events</button>
@endhasanyrole
</div>
</body>
</html>
