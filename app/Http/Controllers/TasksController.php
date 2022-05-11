<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.form', compact('users'));
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        Task::create($data);
        return redirect()->route('tasks.index')->with([
            'message' => 'Task Created Successfully'
        ]);
    }

    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.form', compact('task', 'users'));
    }

    public function update(Task $task, TaskRequest $request)
    {
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('tasks.index')->with([
            'message' => 'Task Updated Successfully'
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with([
            'message' => 'Task Deleted Successfully'
        ]);
    }
}
