<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Admin Panel

    @role('admin')
    <a href="/admin">Admin Dashboard</a>
@endrole

@can('manage users')
    <a href="/users">Manage Users</a>
@endcan

@hasanyrole('admin|staff')
    <button>Manage Events</button>
@endhasanyrole

</body>
</html>