<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All users list</h1>
    @foreach($users as $user)
        <div>
            <ul>
                <li>{{$user->upperName()}}</li>
                <li>{{$user->email}}</li>
                <li>{{$user->created_at}}</li>
            </ul>
        </div>
        <hr>
    @endforeach
</body>
</html>
