<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('password.email') }}">
        <h1>{{ __('messages.reset') }}</h1>
        @csrf
            <div>
                <label for="username">{{ __('messages.username') }}</label><br>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div>
                <label for="secret_question" >{{ __('messages.secret') }}</label><br>
                <select id="secret_question" name="secret_question" required>
                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                    <option value="What city were you born in?">What city were you born in?</option>
                    <option value="What is your favorite film?">What is your favorite film?</option>
                    <option value="What is your first pet's name?">What is your first pet's name?</option>
                </select>
                @error('secret_question')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div>
                <label for="secret_answer">{{ __('messages.answer') }}</label><br>
                <input id="secret_answer" type="text" name="secret_answer" required>
                @error('secret_answer')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div>
                <button type="submit">{{ __('messages.submit') }}</button>
            </div>
    </form>    
</body>
</html>

