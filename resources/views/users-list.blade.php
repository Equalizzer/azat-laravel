<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<h1>All users list</h1>
    @foreach($users as $user)
        <div>
            <ul style="list-style: none">
                <li>Name: {{$user->name}}</li>
                <li>OG Name: {{$user->getRawOriginal('name')}}</li>
                <li>Email: {{$user->email}}</li>
                <li>Created At: {{$user->created_at}}</li>
            </ul>
        </div>
        <hr>
    @endforeach
<div style="display: flex; justify-content: right">
    <form action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>
