<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SprintExport;
use Illuminate\Support\Str;

class SprintController extends Controller
{

    public function export()
{
    return Excel::download(new SprintExport, 'sprints.xlsx');
}


    public function index()
    {
        $sprints = Sprint::all();
        return view('sprints.index', compact('sprints'));
    }

    public function create()
    {
        $users = User::all();
        $projects= Project::all();

        return view('sprints.create', compact('users', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sprint_name' => 'required',
            'is_global_sprint' => 'required|in:yes,no', 
            'project_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'createdAt' => 'required',
            'created_by' => 'required',
            // 'assigned_to' => 'required',
            // 'assigned_by' => 'required',
        ]);

        $sprint = new Sprint;
        $sprint->uuid = substr(Str::uuid()->toString(), 0, 8);
        $sprint->sprint_name = $request->sprint_name;
        $sprint->is_global_sprint = $request->is_global_sprint;
        $sprint->project_id = $request->project_id;
        $sprint->start_date = $request->start_date;
        $sprint->end_date = $request->end_date;
        $sprint->status = $request->status;
        $sprint->createdAt = $request->createdAt;
        $sprint->created_by = $request->created_by;

        $sprint->save();

        return redirect()->route('sprints.index')->with('success', 'Sprint created successfully.');
    }

    public function show(Sprint $sprint)
    {
        return view('sprints.show', compact('sprint'));
    }

    public function edit($id)
    {
        $users = User::all();
        $projects = Project::all();
    
        $sprint = Sprint::findOrFail($id);
    
        return view('sprints.edit', compact('users', 'projects', 'sprint'));
    }
    

    public function update(Request $request, Sprint $sprint)
    {
        $request->validate([
            'sprint_name' => 'required',
            'is_global_sprint' => 'required|in:yes,no',
            'project_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
            'createdAt' => 'required',
            'created_by' => 'required',
        ]);

        $sprint->uuid = substr(Str::uuid()->toString(), 0, 8);
        $sprint->sprint_name = $request->sprint_name;
        $sprint->is_global_sprint = $request->is_global_sprint;
        $sprint->project_id = $request->project_id;
        $sprint->start_date = $request->start_date;
        $sprint->end_date = $request->end_date;
        $sprint->status = $request->status;
        $sprint->createdAt = $request->createdAt;
        $sprint->created_by = $request->created_by;

        $sprint->save();

        return redirect()->route('sprints.index')->with('success', 'Sprint settings updated successfully.');

    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        return redirect()->route('sprints.index')
            ->with('success', 'Sprint deleted successfully.');
    }
}
