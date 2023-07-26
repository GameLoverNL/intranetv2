<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() // * Shows all departments
    {
        return Department::all();
        // TODO: Should return a view with options to manage the departments, this is for testing only
    }

    public function show(int $id) // * Shows specific department using the given department id
    {
        $department = Department::find($id);
        if (!$department) {
            abort(404); // TODO: Should redirect to the dashboard with an error message, but for now this is fine
        }

        return $department;
    }
}
