<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #6b7280; position: relative">
<form action="/products" method="POST" style="display: flex;justify-content: center;">
    @csrf
    <input type="name" name="name" placeholder="Name">
    <input type="number" name="price" placeholder="Price">
    <input type="submit" value="Save">
</form>
</body>
</html>
