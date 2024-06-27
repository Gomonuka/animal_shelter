<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>{{ __('messages.dashboard') }}</h1>
    <a class="return" href="{{ route('welcome') }}">{{ __('messages.return') }}</a>
    <div class="user-grid">
    @foreach ($users as $user)
        <div>
            <p>{{ __('messages.user') }} {{ $user->username }}</p>
            @if ($user->role_id !== 1)
                <p>{{ __('messages.role') }} User</p>
            @else
                <p>{{ __('messages.role') }} Admin</p>
            @endif
            @if ($user->role_id !== 1)
                <form action="{{ route('admin.promote') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit">{{ __('messages.promote') }}</button>
                </form>
            @else
                <form action="{{ route('admin.demote') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit">{{ __('messages.demote') }}</button>
                </form>
            @endif
        </div>
    @endforeach
    </div>
</body>
</html>