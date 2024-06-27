<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animal Shelter Volunteer Hub</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="top">
        <div class="navigation">
            <p id="title" > {{ __('messages.title') }} <p>
            <a href="{{ route('pets.index') }}">{{ __('messages.categories') }}</a>
                @auth
                    <div id="logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">{{ __('messages.logout') }}</button>
                        </form>
                    </div>
                    @if (Auth::check())
                        <a href="{{ route('profile.show') }}" class="button">{{ __('messages.welcome') }} {{ $user->username }}</a>
                    @endif
                    @if (Auth::check() && Auth::user()->profile_picture)
                        <img class="pfp" src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture">
                    @endif
                @else
                    <div class="auth-links">
                    @if (Route::has('login'))
                        <a class="user" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="user" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        <a class="user" href="{{ url('auth/google') }}">{{ __('messages.google') }}</a>
                    @endif 
                    </div>
                @endauth
            <div>
                <a class="FAQ" href="{{ route('FAQ') }}">{{ __('messages.faq') }}</a>
            </div>
            <div>
                <a href="{{ route('setLocale', 'en') }}">English</a>
                <a href="{{ route('setLocale', 'lv') }}">Latviski</a>
            </div>
        </div>
    </div>
    <div class="body">
        <h1>{{ __('messages.greeting') }}</h1>
        <img src="{{ asset('puppies-ccca1b0776bb47c0b61b2e8a52b9dd92.jpg') }}" alt="Animal Shelter">
    </div>
</body>
</html>
