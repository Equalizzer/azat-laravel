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
    <form action="/sign-up" method="POST" style="display: flex;justify-content: center;" enctype="multipart/form-data">
        @csrf
        <input type="name" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Your Email">
        <input type="password" name="password" placeholder="Your Password">
        <input type="file" name="img">
        <input type="submit" value="Sign Up">
    </form>
</div>

</body>
</html>
