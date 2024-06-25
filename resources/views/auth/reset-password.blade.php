<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Reset Password</div>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <label for="username">Email</label>
                <input id="username" type="username" name="username" value="{{ old('username', $request->username) }}" required autocomplete="username" autofocus>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                <div>
                    <label for="password" >Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit">Reset Password</button>
                </div>
            </form>
</body>
</html>

