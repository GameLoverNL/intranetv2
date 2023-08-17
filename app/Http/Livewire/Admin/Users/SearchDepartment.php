<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class SearchDepartment extends Component
{
    public $search = '';
    public $user;

    public $department;

    public function addUserToDepartment($user, $department)
    // TODO: When selecting a manager it adds the user to the department, when selecting a new manager it sets the new user as manager, but the old user is still in the department. The old manager should be set to no department
    {
        $user = \App\Models\User::find($user);
        $department = \App\Models\Department::find($department);
        $user->department_id = $department->id;
        $user->save();
        $department->manager_id = $user->id;
        $department->save();
        session()->flash('added', "Set $user->name as the department manager of " . $this->department->name . "");
    }

    public function render()
    {
        return view('livewire.admin.users.search-department', [
            'users' => \App\Models\User::search($this->search)->paginate(10)
        ]);
    }
}
