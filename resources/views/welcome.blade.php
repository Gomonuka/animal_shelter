
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animal Shelter Volunteer Hub</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="top">
        <div class="navigation">
            <p id="title" >Animal Shelter Volunteer Hub<p>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('blogposts.index') }}">Blog</a>
            <div class="auth-links">
                @if (Route::has('login'))
                    @auth
                        <a class="user" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="user" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a class="user" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
    <div class="body">
        <h1>Welcome to the Animal Shelter Volunteer Hub!</h1>
        <img src="{{ asset('puppies-ccca1b0776bb47c0b61b2e8a52b9dd92.jpg') }}" alt="Animal Shelter">
    </div>
</body>
</html>
