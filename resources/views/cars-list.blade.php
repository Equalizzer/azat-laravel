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
<h1>All cars list</h1>
@include('includes.messages')
@foreach($cars as $car)
    <div>
        <ul style="list-style: none">
            <li style="">Id: {{$car->id}}</li>
            <li>Name: {{$car->brand}}</li>
            <li>Price: {{$car->price}}</li>
            <li>User Name: {{$car->user->name}}</li>
            <li>Created At: {{$car->created_at}}</li>
        </ul>
    </div>
    <hr>
@endforeach
<form action="/cars-list" method="POST" class="delete">
    @csrf
    <input type="text" name="id" placeholder="ID">
    <input type="submit" value="delete">
</form>
<div style="display: flex; justify-content: right">
    <form action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>
