<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectRole;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    public function index()
    {
        $projectMembers = ProjectMember::all();
        return view('project_member.index', compact('projectMembers'));
    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        $projectRoles = ProjectRole::all();

        return view('project_member.create', compact('users', 'projects', 'projectRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_active' => 'nullable|boolean',
            'user_id' => 'required',
            'project_id' => 'required',
            'project_role_id' => 'required',
            'is_project_admin' => 'nullable|boolean',
        ]);

        $requestData = $request->all();
        $requestData['is_active'] = $requestData['is_active'] ?? 0;
        $requestData['is_project_admin'] = $requestData['is_project_admin'] ?? 0;

        ProjectMember::create($requestData);

        return redirect()->route('project-members.index')->with('success', 'Project member created successfully.');
    }

    public function show($id)
    {
        $projectMember = ProjectMember::findOrFail($id);
        return view('project_member.show', compact('projectMember'));
    }

    public function edit($id)
    {
        $projectMember = ProjectMember::findOrFail($id);
        $users = User::all();
        $projects = Project::all();
        $projectRoles = ProjectRole::all();

        return view('project_member.edit', compact('projectMember', 'users', 'projects', 'projectRoles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'nullable|boolean',
            'user_id' => 'required',
            'project_id' => 'required',
            'project_role_id' => 'required',
            'is_project_admin' => 'nullable|boolean',
        ]);

        $requestData = $request->all();
        $requestData['is_active'] = $requestData['is_active'] ?? 0;
        $requestData['is_project_admin'] = $requestData['is_project_admin'] ?? 0;
        $projectMember = ProjectMember::findOrFail($id);
        $projectMember->update($requestData);

        return redirect()->route('project-members.index')->with('success', 'Project member updated successfully.');
    }
    
    public function destroy($id)
    {
        $projectMember = ProjectMember::findOrFail($id);
        $projectMember->delete();

        return redirect()->route('project-members.index')->with('success', 'Project member deleted successfully.');
    }
}
