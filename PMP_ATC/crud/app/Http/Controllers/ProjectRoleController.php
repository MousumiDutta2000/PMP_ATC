<?php

namespace App\Http\Controllers;

use App\Models\ProjectRole;
use Illuminate\Http\Request;

class ProjectRoleController extends Controller
{
    public function index()
    {
        $projectRoles = ProjectRole::all();
        return view('project_role.index', compact('projectRoles'));
    }

    public function create()
    {
        return view('project_role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_role_type' => 'required',
        ]);

        ProjectRole::create($request->only('member_role_type'));

        return redirect()->route('project-roles.index')->with('success', 'Project role created successfully.');
    }

    public function show($id)
    {
        $projectRole = ProjectRole::findOrFail($id);
        return view('project-role.show', compact('projectRole'));
    }

    public function edit($id)
    {
        $projectRole = ProjectRole::findOrFail($id);
        return view('project_role.edit', compact('projectRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_role_type' => 'required',
        ]);

        $projectRole = ProjectRole::findOrFail($id);
        $projectRole->update($request->only('member_role_type'));

        return redirect()->route('project-roles.index')->with('success', 'Project role updated successfully.');
    }

    public function destroy($id)
    {
        $projectRole = ProjectRole::findOrFail($id);
        $projectRole->delete();

        return redirect()->route('project-roles.index')->with('success', 'Project role deleted successfully.');
    }
}
