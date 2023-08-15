<?php

namespace App\Http\Livewire\Admin\Department;

use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public $user;

    public $department;

    public function addUserToDepartment($user)
    // TODO: When selecting a manager it adds the user to the department, when selecting a new manager it sets the new user as manager, but the old user is still in the department. The old manager should be set to no department
    {
        $user = \App\Models\User::find($user);
        $department = $this->department;
        $department->manager_id = $user->id;
        $user->department_id = $department->id;
        $user->save();
        $department->save();
        session()->flash('added', "Set $user->name as the department manager of " . $department->name . "");
    }

    public function render()
    {
        return view('livewire.admin.department.search-users', [
            'users' => \App\Models\User::search($this->search)->paginate(10)
        ]);
    }
}
