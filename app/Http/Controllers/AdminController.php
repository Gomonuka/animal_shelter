<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::denies('update-pet')) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return view('admin.adminDashboard', compact('users'));
    }

    public function promote(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update(['role_id' => 1]);
        return redirect()->back();
    }

    public function demote(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update(['role_id' => 3]);
        return redirect()->back();
    }
}

