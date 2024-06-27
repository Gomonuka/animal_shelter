<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), ([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'secret_question' => ['required', 'string', 'max:255'],
            'secret_answer' => ['required', 'string', 'max:255'],
        ]));

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer,
            'role_id' => 3
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('welcome');
    }
}
