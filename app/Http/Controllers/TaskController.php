<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\projectadd;

class TaskController extends Controller
{
    public function index(ProjectAdd $project)
    {
        $tasks = $project->tasks;
        return view('tasklist', compact('project', 'tasks'));
    }

    public function create()
    {
        return view('taskcreate', compact('project'));
    }

    public function store(Request $request, ProjectAdd $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task();
        $task->name = $validated['name'];
        $task->price = $validated['product_id'];
        $task->price = $validated['price'];
        $task->date = $validated['date'];
        $task->description = $validated['description'];
        $task->save();

        return redirect()->route('index', $task->id)->with('success', 'Task added successfully!');
    }
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('editproject', compact('project'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);

        return redirect()->route('index')->with('success', 'Project updated successfully!');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('index')->with('success', 'Project deleted successfully!');
    }
}