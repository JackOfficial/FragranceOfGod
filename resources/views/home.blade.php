<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="text-center">
    <div class="fw-bold">
        {{ Auth::user()->name }}
    </div>

    <form method="POST" action="{{ route('logout') }}" class="mt-2">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-danger">
            Logout
        </button>
    </form>
</div>
</body>
</html>
