<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{

//     public function index()
// {
//     $sprints = Sprint::with('project')->get();
//     return view('sprints.index', compact('sprints'));
// }
    public function index()
    {
        $sprints = Sprint::all();
        return view('sprints.index', compact('sprints'));
    }

    public function create()
    {
        return view('sprints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sprint_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'assigned_to' => 'required',
            'assigned_by' => 'required',
        ]);

        Sprint::create($request->all());

        return redirect()->route('sprints.index')
            ->with('success', 'Sprint created successfully.');
    }

    public function show(Sprint $sprint)
    {
        return view('sprints.show', compact('sprint'));
    }

    public function edit(Sprint $sprint)
    {
        return view('sprints.edit', compact('sprint'));
    }

    public function update(Request $request, Sprint $sprint)
    {
        $request->validate([
            'sprint_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'assigned_to' => 'required',
            'assigned_by' => 'required',
        ]);

        $sprint->update($request->all());

        return redirect()->route('sprints.index')
            ->with('success', 'Sprint updated successfully.');
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        return redirect()->route('sprints.index')
            ->with('success', 'Sprint deleted successfully.');
    }
}
