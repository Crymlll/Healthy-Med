<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    <form action="/register" method="post">
    @csrf

        <label for="name">Name : </label>
        <input type="text" name="name" id="name">

        <br>

        <label for="username">Email :</label>
        <input type="text" name="email" id="email">

        <br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password">

        <br>
        <br>

        <input type="submit">
    </form>
</body>
</html>