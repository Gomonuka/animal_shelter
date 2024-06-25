<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User; 
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'secret_question' => 'required|string',
            'secret_answer' => 'required|string'
    ]);

    if ($validator->fails()) {
        return redirect()->route('password.request', $request->username)
                         ->withErrors($validator)
                         ->withInput();
    }

        // Validate username, secret question, and answer here as needed
        // Assuming you have the logic to verify the secret question and answer

        // For example, you might retrieve user details based on username and validate the secret answer
        // Replace this logic with your actual implementation
        $user = User::where('username', $request->username)->first();

        if (!$user || !$this->validateSecretAnswer($user, $request->secret_question, $request->secret_answer)) {
            return redirect()->route('password.request')
                ->withErrors(['username' => __('Invalid username or security question answer.')])
                ->withInput();
        }
        $token = Password::createToken($user);
        
        return redirect()->route('password.reset', ['token' => $token, 'username' => $request->username]);
    }

    /**
     * Validate the secret answer against the stored user's answer.
     *
     * @param  \App\Models\User  $user
     * @param  string  $question
     * @param  string  $answer
     * @return bool
     */
    protected function validateSecretAnswer($user, $question, $answer)
    {
        // Implement your logic to validate secret question and answer here
        // Example:
        return $user->secret_question === $question && $user->secret_answer === $answer;
    }
}

