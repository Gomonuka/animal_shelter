<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login to continue to use our members-only features!</h1>
        <!-- Username -->
        <div>
            <label for="username" >Username</label><br>
            <input id="username" type="text" name="username" required autofocus />
        </div>
        <div>
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>
        <div>
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me</label>
        </div>
        <div>
            @if (Route::has('password.request'))
            <a id="forgot" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            <br>
            <button>Login</button>
        </div>
    </form>
</body>
