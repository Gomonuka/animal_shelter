<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use App\Models\Team;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */

public function handleGoogleCallback()
{
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            Auth::login($existingUser); 
            return redirect('welcome');
        } else {

            $newUser = User::create([
                'name' => $user->name,
                'username' => $user->email, 
                'google_id' => $user->id,
                'password' => ''
            ]);

            $newTeam = Team::forceCreate([
                'user_id' => $newUser->id,
                'name' => explode(' ', $user->name, 2)[0] . "'s Team",
                'personal_team' => true,
            ]);

            $newUser->current_team_id = $newTeam->id;
            $newUser->save();

            Auth::login($newUser);

            return redirect('welcome');
        }
}
}
