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
<body class="container" style="background-color: #6b7280; position: relative">
<div class="container-fluid">
    @include('includes.messages')
    @if(Session::has('success'))
        <div style="display: flex; justify-content: center">
            {{Session::get('success')}}
        </div>
        <div style="display: flex; justify-content: center">
            <a href="{{route('savedProducts')}}">Go to saved products</a>
        </div>
        <br>
    @endif
    <form action="/products" method="POST" style="display: flex;justify-content: center;">
        @csrf
        <input type="name" name="name" placeholder="Name">
        <input type="number" name="price" placeholder="Price">
        <input type="submit" value="Save">
    </form>
</div>

</body>
</html>
