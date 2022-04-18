<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeboksKas - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <div class="desc"><h1>DeboksKas</h1></div>
        <div class="login-box">
            <h2>LOGIN</h2>
            @if(session()->has('loginError'))
                <p style="color:red;margin-bottom: 5px">{{ session('loginError') }}</p>
            @endif
            <form action="/login" method="post">
                @csrf
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>