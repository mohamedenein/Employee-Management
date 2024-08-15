<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $departments = Department::where('name', 'like', "%$search%")
            ->withCount('employees')
            ->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = new Department();
        $department->name = $request->input('name');
        $department->save();

        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->all());
        return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        if ($department->employees()->count() > 0) {
            return back()->withErrors(['department' => 'Cannot delete department with assigned employees.']);
        }

        $department->delete();
        return redirect()->route('departments.index');
    }
}
