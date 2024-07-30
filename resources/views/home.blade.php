<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body>
@auth

<p>You are Logged in !!</p>
<form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
</form>
@else
<div style="border :3px solid black">

    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" id="" placeholder="name">
        <input type="email" placeholder="email" name="email">
        <input type="password" name="password" id="" placeholder="password">
        <button>Register</button>
    </form>
</div>
@endauth
</body>
</html>