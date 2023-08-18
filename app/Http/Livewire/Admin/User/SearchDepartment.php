<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class SearchDepartment extends Component
{
    public $search = '';
    public $user;

    public function addUserToDepartment($userID, $departmentID)
    // TODO: When selecting a manager it adds the user to the department, when selecting a new manager it sets the new user as manager, but the old user is still in the department. The old manager should be set to no department
    {
        $user = \App\Models\User::find($userID);
        $user->department_id = $departmentID;
        $department = \App\Models\Department::find($user->department_id);
        $user->save();
        session()->flash('added', "Added $user->name to " . $department->name . "");
    }

    public function render()
    {
        return view('livewire.admin.user.search-department', [
            'departments' => \App\Models\Department::search($this->search)->paginate(10)
        ]);
    }
}
