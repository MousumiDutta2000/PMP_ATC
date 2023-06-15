<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
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
        return view('project_member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_active' => 'required|boolean',
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'project_role_id' => 'required|integer',
            'is_project_admin' => 'required|boolean',
        ]);

        ProjectMember::create($request->all());

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
        return view('project_member.edit', compact('projectMember'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'required|boolean',
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'project_role_id' => 'required|integer',
            'is_project_admin' => 'required|boolean',
        ]);

        $projectMember = ProjectMember::findOrFail($id);
        $projectMember->update($request->all());

        return redirect()->route('project-members.index')->with('success', 'Project member updated successfully.');
    }

    public function destroy($id)
    {
        $projectMember = ProjectMember::findOrFail($id);
        $projectMember->delete();

        return redirect()->route('project-members.index')->with('success', 'Project member deleted successfully.');
    }
}
