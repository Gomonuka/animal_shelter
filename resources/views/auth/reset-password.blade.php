<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
</head>
<body>
        <form method="POST" action="{{ route('password.update') }}">
            <h1>Reset Password</h1>
            @csrf
            @method('PUT')
            <label for="username">Username</label><br>
            <input id="username" type="username" name="username" value="{{ old('username', $request->username) }}" required autocomplete="username" autofocus>
            @error('username')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <label for="password" >Password</label><br>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label><br>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            {{$errors}}
            <div>
                <button type="submit">Reset Password</button>
            </div>
        </form>
</body>
</html>

