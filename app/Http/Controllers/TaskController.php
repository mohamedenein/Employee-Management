<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = User::where('manager_id', auth()->id())->get();
        return view('tasks.create', compact('employees'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->employee_id = $request->input('employee_id');
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = 'Pending';
        $task->save();

        return redirect()->back();
    }

    public function edit(Task $task)
    {
        if (Gate::denies('edit-task', $task)) {
            abort(403, 'Unauthorized action.');
        }

        $employees = User::where('manager_id', auth()->id())->get();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if (Gate::denies('edit-task', $task)) {
            abort(403, 'Unauthorized action.');
        }

        $task->status = $request->input('title');
        $task->status = $request->input('description');
        $task->status = $request->input('status');
        $task->employee_id = $request->input('employee_id');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function myTasks()
    {
        $tasks = Task::where('employee_id', auth()->id())->get();
        return view('tasks.myTasks', compact('tasks'));
    }

    public function updateTaskStatus(Request $request, Task $task)
    {
        if (Gate::denies('edit-task', $task)) {
            abort(403, 'Unauthorized action.');
        }

        $task->status = $request->input('status');
        $task->save();

        return redirect()->back();
    }
}
