<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>{{ __('messages.features') }}</h1>
        <div>
            <label for="username" >{{ __('messages.username') }}</label><br>
            <input id="username" type="text" name="username" required autofocus />
        </div>
        @error('username')
            <span class="error">{{ $message }}</span>
        @enderror
        <div>
            <label for="password">{{ __('messages.password') }}</label><br>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
        <div>
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">{{ __('messages.remember') }}</label>
        </div>
        <div>
            <a id="forgot" href="{{ route('password.email') }}">{{ __('messages.forgot') }}</a><br>
            <button>{{ __('messages.login') }}</button>
        </div>
    </form>
</body>
</html>

