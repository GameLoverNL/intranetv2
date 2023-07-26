<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() // * Shows all departments
    {
        return User::all();
        // TODO: Should return a view with options to manage the departments, this is for testing only
    }

    public function show(int $id) // * Shows specific department using the given department id
    {
        $user = User::find($id);
        if (!$user) {
            abort(404); // TODO: Should redirect to the dashboard with an error message, but for now this is fine
        }

        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        dd(User::find($id));
    }
}
