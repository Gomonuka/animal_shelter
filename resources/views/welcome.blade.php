<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animal Shelter Volunteer Hub</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="top">
        <div class="navigation">
            <p id="title" >Animal Shelter Volunteer Hub<p>
            <a href="{{ route('categories.index') }}">Browse our pet categories</a>
            @if (Route::has('login'))
                @auth
                    <div id="logout">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="auth-links">
                        <a class="user" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a class="user" href="{{ route('register') }}">Register</a>
                        @endif
                            <a class="user">Login with Google</a>
                    </div>
                @endauth
            @endif
            <div>
                <a class="FAQ" href="{{ route('FAQ') }}">FAQ</a>
            </div>
        </div>
    </div>
    <div class="body">
        <h1>Welcome to our Animal Shelter Volunteer Hub!</h1>
        <img src="{{ asset('puppies-ccca1b0776bb47c0b61b2e8a52b9dd92.jpg') }}" alt="Animal Shelter">
    </div>
</body>
</html>
