<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Incharge page</h1>
    <p>Welcome {{ $user->firstname }} / {{ $user->role }}</p>
    <a href="{{ url('/logout') }}"><button class="btn btn-primary">Sign out</button></a>
</body>
</html>