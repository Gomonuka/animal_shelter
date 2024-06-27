<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>
    <div class="profile-container">
        <h1>{{ __('messages.profile') }}</h1>
        <div class="profile-details">
            <p><strong>{{ __('messages.name') }}</strong><br> {{ $user->name }}</p>
            <p><strong>{{ __('messages.username') }}</strong><br> {{ $user->username }}</p>
            @if ($user->role_id == 1) <p><strong>{{ __('messages.role') }}</strong><br> Admin </p>
            @elseif ($user->role_id == 2) <p><strong>{{ __('messages.role') }}</strong><br> GoogleUser </p>
            @elseif ($user->role_id == 3) <p><strong>{{ __('messages.role') }}</strong><br> User </p>
            @else ($user->role_id == 4) <p><strong>{{ __('messages.role') }}</strong><br> Volunteer </p>
            @endif
        </div>
        <form action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture">
            <button type="submit">{{ __('messages.upload') }}</button>
        </form>
        @if ($user->profile_picture)
        <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture">
        @else
        <p>{{ __('messages.no_picture') }}</p>
        @endif
        <br>
        <a href="{{ route('welcome') }}" class="button">{{ __('messages.return') }}</a>
    </div>
</body>
</html>