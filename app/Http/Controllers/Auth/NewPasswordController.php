<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request, $token, $username): View
    {
        return view('auth.reset-password', [
            'request' => $request,
            'token' => $token,
            'username' => $username,
        ]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::where('username', $request->username)->first();
        $user->password = $request->password;

        $user->save();

        event(new PasswordReset($user));
        return redirect()->route('login')->with('success', 'Password has been changed successfully!');
    }
}


