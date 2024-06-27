<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Show the Welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function welcome()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('welcome', compact('user'));
        } 
        else {
            abort(403, 'Unauthorized action.');
        }
    }
}
