<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        <h1>Register to become a part of a good cause!</h1>
        @csrf
            <div>
                <label for="name">Name</label><br>
                <input id="name" type="text" name="name" required autofocus/>
            </div>
            <div>
                <label for="username">Username</label><br>
                <input id="username" type="text" name="username" required/>
            </div>
            <div>
                <label for="password">Password</label><br>
                <input id="password" type="password" name="password" required autocomplete="new-password"/>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label><br>
                <input id="password_confirmation" type="password" name="password_confirmation" required/>
            </div>
            <div>
                <button>Register</button>
            </div>
        </form>
</body>
</html>
