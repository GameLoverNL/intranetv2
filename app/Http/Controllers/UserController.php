<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index() // * Shows all users
    {
        // return User::search('Jori')->get();
        dd(User::all());
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

    // * Example usage of search function
    // public function search(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string'
    //     ]);

    //     dd(User::search($request->name)->get());
    // }

    public function store(Request $request, int $id)
    {

        // dd($request);
        $request->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['email'],
                'department' => ['string']
            ]
        );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // TODO: Has to be fully refactored to display all the results in the html form, where you then select the department you want
        $department = \App\Models\Department::search($request->department)->raw();
        // if ($department) {
        //     foreach ($department as $dept) {
        //         $user->department_id = $dept->id;
        //     }
        // }
        // dd($department);


        $user->save();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request, int $id)
    {
        User::destroy($id);
        return redirect()->route('admin.dashboard')->withErrors($request, 'success');

    }

    public function passwordReset(int $id)
    {
        $user = User::find($id);
        $status = Password::sendResetLink(['email' => $user->email]);
        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]);
    }
    public function handlePasswordReset(Request $request)
    {

    }
}
