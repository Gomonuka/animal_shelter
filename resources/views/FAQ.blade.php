<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="{{asset('css/FAQ.css')}}">
</head>
<body>
    <div class="container">
        <div class="faq-section">
            <h1>{{ __('messages.frequently') }}</h1>
            <h2>{{ __('messages.how') }}</h2>
            <p><strong>{{ __('messages.q1') }}</strong></p>
            <p>{{ __('messages.a1') }}</p>

            <p><strong>{{ __('messages.q2') }}</strong></p>
            <p>{{ __('messages.a2') }}.</p>

            <p><strong>{{ __('messages.q3') }}</strong></p>
            <p>{{ __('messages.a3') }}</p>

            <a href="{{ route('welcome') }}">{{ __('messages.return') }}</a>
        </div>
    </div>
</body>
</html>

