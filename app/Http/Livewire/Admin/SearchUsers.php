<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public $user;

    public function addUserToDepartment($user)
    {
        // TODO: Reconfigure to actually use this in the user editor so you can select a department from the list that the user is linked to\
        // TODO ^ The same thing needs to be done for the department editor to select a manager from the user list
        $user = \App\Models\User::find($user);
        $user->department_id = 2;
        $user->save();
        session()->flash('added', "Added $user->name to " . \App\Models\Department::find($user->department_id)->name . "");
    }

    public function render()
    {
        return view('livewire.admin.search-users', [
            'users' => \App\Models\User::search($this->search)->get()
        ]);
    }
}
