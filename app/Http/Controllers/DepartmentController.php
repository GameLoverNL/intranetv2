<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() // * Shows all Departments
    {
        // return Department::search('Jori')->get();
        dd(Department::all());
    }

    public function show(Request $request, int $id) // * Shows specific department using the given department id
    {
        $department = Department::find($id);
        if (!$department) {
            abort(404); // TODO: Should redirect to the dashboard with an error message, but for now this is fine
        }

        return view('admin.department.show', [
            'department' => $department
        ]);
    }

    public function store(Request $request, int $id)
    {

        // dd($request);
        $request->validate(
            [
                'name' => ['required']
            ]
        );
        $department = Department::find($id);
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request, int $id)
    {
        Department::destroy($id);
        return redirect()->route('admin.dashboard')->withErrors($request, 'success');

    }
}
