<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Vertical;
use App\Models\Client;
use App\Models\Technology;
use App\Models\ProjectRole;
use App\Models\Profile;
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
        $users = User::all();
        $verticals = Vertical::all();
        $clients = Client::all();
        $projectManagers = User::all();
        $technologies = Technology::all();
        $projectMembers = Profile::all();
        $projectRoles = ProjectRole::all();

        return view('projects.create', compact('users', 'verticals', 'clients', 'projectManagers', 'technologies', 'projectMembers', 'projectRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'project_description' => 'required',
            'project_manager_id' => 'required',
            'project_startDate' => 'required|date',
            'project_endDate' => 'required|date',
            'project_status' => 'required',
            'client_spoc_name' => 'required',
            'client_spoc_email' => 'required|email',
            'client_spoc_contact' => 'required',
            'vertical_id' => 'required',
            'technology_id' => 'required',
            'client_id' => 'required',
            'project_members_id' => 'required',
            'project_role_id' => 'required',
        ]);

        $project = new Project;
        $project->project_name = $request->project_name;
        $project->project_type = $request->project_type;
        $project->project_description = $request->project_description;
        $project->project_manager_id = $request->project_manager_id;
        $project->project_startDate = $request->project_startDate;
        $project->project_endDate = $request->project_endDate;
        $project->project_status = $request->project_status;
        $project->client_spoc_name = $request->client_spoc_name;
        $project->client_spoc_email = $request->client_spoc_email;
        $project->client_spoc_contact = $request->client_spoc_contact;
        $project->vertical_id = $request->vertical_id;
        $project->technology_id = $request->technology_id;
        $project->client_id = $request->client_id;
        $project->project_members_id = $request->project_members_id;
        $project->project_role_id = $request->project_role_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profiles'), $imageName);
            $profile->image = 'images/profiles/' . $imageName;
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    // public function settings(Project $project)
    // {
    //     return view('projects.settings', compact('project'));
    // }

    public function edit(Project $project)
    {
        $projectManagers = User::all();
        $users = User::all();
        $technologies = Technology::all();
        $verticals = Vertical::all();
        $clients = Client::all();
        $projectRoles = ProjectRole::all();
        $projectMembers = Profile::all();

        return view('projects.edit', compact('project', 'users', 'technologies', 'verticals', 'clients', 'projectRoles', 'projectMembers', 'projectManagers'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'project_description' => 'required',
            'project_manager_id' => 'required',
            'project_startDate' => 'required|date',
            'project_endDate' => 'required|date',
            'project_status' => 'required',
            'client_spoc_name' => 'required',
            'client_spoc_email' => 'required|email',
            'client_spoc_contact' => 'required',
            'vertical_id' => 'required',
            'technology_id' => 'required',
            'client_id' => 'required',
            'project_members_id' => 'required',
            'project_role_id' => 'required',
        ]);

        $project->project_name = $request->project_name;
        $project->project_type = $request->project_type;
        $project->project_description = $request->project_description;
        $project->project_manager_id = $request->project_manager_id;
        $project->project_startDate = $request->project_startDate;
        $project->project_endDate = $request->project_endDate;
        $project->project_status = $request->project_status;
        $project->client_spoc_name = $request->client_spoc_name;
        $project->client_spoc_email = $request->client_spoc_email;
        $project->client_spoc_contact = $request->client_spoc_contact;
        $project->vertical_id = $request->vertical_id;
        $project->technology_id = $request->technology_id;
        $project->client_id = $request->client_id;
        $project->project_members_id = $request->project_members_id;
        $project->project_role_id = $request->project_role_id;

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project settings updated successfully.');
    }
}
