<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
    @csrf
        <h1>{{ __('messages.cause') }}</h1>
            <div>
                <label for="name">{{ __('messages.name') }}</label><br>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus/>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div>
                <label for="username">{{ __('messages.username') }}</label><br>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required/>
            </div>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div>
                <label for="password">{{ __('messages.password') }}</label><br>
                <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="new-password"/>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div>
                <label for="password-confirmation">{{ __('messages.confirm') }}</label><br>
                <input id="password-confirmation" type="password" name="password_confirmation" value="{{ old('password') }}" required>
            </div>
            <div>
            <label for="secret_question">{{ __('messages.question') }}</label><br>
                <select id="secret_question" name="secret_question" required>
                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                    <option value="What city were you born in?">What city were you born in?</option>
                    <option value="What is your favorite film?">What is your favorite film?</option>
                    <option value="What is your first pet's name?">What is your first pet's name?</option>
                </select>
            </div>
            <div>
                <label for="secret_answer">{{ __('messages.answer') }}</label><br>
                <input id="secret_answer" type="text" name="secret_answer" required>
            </div>
            <div>
                <button action="submit">{{ __('messages.register') }}</button><br><br>
                <a href="{{ route('login') }}">{{ __('messages.already') }}</a>
            </div>
        </form>
</body>
</html>
