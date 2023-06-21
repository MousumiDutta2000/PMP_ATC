<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'project_description' => 'required',
            'project_manager' => 'required',
            'project_startDate' => 'required|date',
            'project_endDate' => 'required|date',
            'project_status' => 'required',
            'client_spoc_name' => 'required',
            'client_spoc_email' => 'required|email',
            'client_spoc_contact' => 'required',
            'vertical_id' => 'required|integer',
            'technologies_id' => 'required|integer',
            'clients_id' => 'required|integer',

        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // public function update(Request $request, Project $project)
    // {
    //     $request->validate([
    //         'project_name' => 'required',
    //         'project_type' => 'required',
    //         'project_description' => 'required',
    //         'project_manager' => 'required',
    //         'project_startDate' => 'required|date_format:Y-m-d',
    //         'project_endDate' => 'required|date_format:Y-m-d',
    //         'project_status' => 'required',
    //         'client_spoc_name' => 'required',
    //         'client_spoc_email' => 'required|email',
    //         'client_spoc_contact' => 'required',
    //     ]);

    //     $project->update($request->all());

    //     return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    // }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function settings(Project $project)
    {
        return view('projects.settings', compact('project'));
    }

    public function updateSettings(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'project_start' => 'required|date',
            'project_end' => 'required|date',
            'status' => 'required',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index', $project->id)->with('success', 'Project settings updated successfully.');
    }

}
