<?php

namespace App\Http\Controllers;

use App\Models\ProjectItemStatus;
use Illuminate\Http\Request;

class ProjectItemStatusController extends Controller
{
    public function index()
    {
        $statuses = ProjectItemStatus::all();

        return view('project_item_statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('project_item_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:Under discussion,Under development,In queue,Not Started,Pending,Delay',
        ]);

        ProjectItemStatus::create($request->all());

        return redirect()->route('project_item_statuses.index')
            ->with('success', 'Status created successfully.');
    }

    public function show(ProjectItemStatus $projectItemStatus)
    {
        return view('project_item_statuses.show', compact('projectItemStatus'));
    }

    public function edit(ProjectItemStatus $projectItemStatus)
    {
        return view('project_item_statuses.edit', compact('projectItemStatus'));
    }

    public function update(Request $request, ProjectItemStatus $projectItemStatus)
    {
        $request->validate([
            'status' => 'required|in:Under discussion,Under development,In queue,Not Started,Pending,Delay',
        ]);

        $projectItemStatus->update($request->all());

        return redirect()->route('project_item_statuses.index')
            ->with('success', 'Status updated successfully.');
    }

    public function destroy(ProjectItemStatus $projectItemStatus)
    {
        $projectItemStatus->delete();

        return redirect()->route('project_item_statuses.index')
            ->with('success', 'Status deleted successfully.');
    }
}
