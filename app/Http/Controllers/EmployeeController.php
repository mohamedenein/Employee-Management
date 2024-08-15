<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $employees = User::when($search, function ($query, $search) {
            return $query->where('first_name', 'like', "%{$search}%")
                         ->orWhere('last_name', 'like', "%{$search}%");
        })->paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $employees = User::all();
        $departments = Department::all();
        return view('employees.create', compact(['employees', 'departments']));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        User::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(User $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, User $employee)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }

            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(User $employee)
    {

        if ($employee->tasks()->count() > 0) {
            return redirect()->route('employees.index')->with('error', 'Cannot delete employee assigned to tasks.');
        }

        if ($employee->image) {
            Storage::disk('public')->delete($employee->image);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}