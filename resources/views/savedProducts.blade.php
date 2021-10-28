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
<h1>All products list</h1>
@include('includes.messages')
@foreach($products as $product)
<div>
    <ul style="list-style: none">
        <li style="">Id: {{$product->id}}</li>
        <li>Name: {{$product->name}}</li>
        <li>Price: {{$product->price}}</li>
        <li>Created At: {{$product->created_at}}</li>
    </ul>
</div>
<hr>
@endforeach
</body>
</html>
