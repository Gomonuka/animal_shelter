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
        <h1>User Profile</h1>
        <div class="profile-details">
            <p><strong>Name:</strong><br> {{ $user->name }}</p>
            <p><strong>Username:</strong><br> {{ $user->username }}</p>
            @if ($user->role_id == 1) <p><strong>Role:</strong><br> Admin </p>
            @elseif ($user->role_id == 2) <p><strong>Role:</strong><br> GoogleUser </p>
            @elseif ($user->role_id == 3) <p><strong>Role:</strong><br> User </p>
            @else ($user->role_id == 4) <p><strong>Role:</strong><br> Volunteer </p>
            @endif
        </div>
        <form action="{{ route('profile.picture.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture">
            <button type="submit">Upload Profile Picture</button>
        </form>
        @if ($user->profile_picture)
        <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture">
        @else
        <p>No profile picture uploaded.</p>
        @endif
        <br>
        <a href="{{ route('welcome') }}" class="button">Return to Welcome Page</a>
    </div>
</body>
</html>