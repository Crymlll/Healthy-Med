<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="/login" method="post">
        @csrf
        <label for="username">Email :</label>
        <input type="text" name="email">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password">
        <br>
        <input type="submit">

        <br>
        <br>
        <a href="/register">Register</a>
    </form>
</body>
</html>