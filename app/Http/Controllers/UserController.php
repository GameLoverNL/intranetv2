<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() // * Shows all users
    {
        // return User::search('Jori')->get();
    }

    public function show(Request $request, int $id) // * Shows specific department using the given department id
    {
        $user = User::find($id);
        if (!$user) {
            abort(404); // TODO: Should redirect to the dashboard with an error message, but for now this is fine
        }

        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    public function store(Request $request, int $id)
    {

        // dd($request);
        $request->validate(
            [
                'name' => ['required'],
                'email' => ['email'],
            ]
        );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request, int $id)
    {
        User::destroy($id);
        return redirect()->route('admin.dashboard')->withErrors($request, 'success');

    }
}
