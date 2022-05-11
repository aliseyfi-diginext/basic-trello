<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Models\Cat;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cats = Cat::all();
        $tasks = [];
        foreach ($cats as $cat) {
            $tasks[$cat->id] = Task::where('cat_id', $cat->id)->get();
        }
        return view('tasks.index', compact('tasks', 'cats'));
    }

    public function create()
    {
        $users = User::all();
        $cats = Cat::all();
        return view('tasks.form', compact('users', 'cats'));
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
        $cats = Cat::all();
        return view('tasks.form', compact('task', 'users', 'cats'));
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
