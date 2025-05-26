<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectadd;

class ProjectController extends Controller
{
    public function index()
    {
        return view('createproject');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);
        $project = new projectadd();
        $project->name = $validated['name'];
        $project->price = $validated['price'];
        $project->date = $validated['date'];
        $project->description = $validated['description'];
        $project->save();


        return redirect()->back()->with('success', 'Project created successfully!');
    }
    public function get()
    {
        $projects = ProjectAdd::all();
        return view('listproject', compact('projects'));
    }
    public function edit($id)
    {
        $project = projectadd::findOrFail($id);
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

        $project = ProjectAdd::findOrFail($id);
        $project->update($validated);

        return redirect()->route('get')->with('success', 'Project updated successfully!');
    }
    public function destroy($id)
    {
        $project = ProjectAdd::findOrFail($id);
        $project->delete();

        return redirect()->route('get')->with('success', 'Project deleted successfully!');
    }
}
