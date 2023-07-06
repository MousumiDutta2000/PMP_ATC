<?php


namespace App\Http\Controllers;

use App\Models\ProjectItem;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectItemStatus;
use App\Models\Sprint;
use App\Models\User;

class ProjectItemController extends Controller
{

    // public function index()
    // {
    //     $projectItems = ProjectItem::with('project')->get(); // Add 'with' to eager load the associated project
    //     return view('project_items.index', compact('projectItems'));
    // }
    public function index()
    {
        $projectItems = ProjectItem::all();
        return view('project_items.index', compact('projectItems'));
    }

    public function create()
    {
        $projects = Project::all();
        $statuses = ProjectItemStatus::all();
        $sprints = Sprint::all();
        $users = User::all();
        
    
        return view('project_items.create', compact('projects', 'statuses', 'sprints', 'users'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required',
            'details' => 'required',
            'project_id' => 'required',
            'item_id' => 'required',
            'sprint_id' => 'required',
            'status' => 'required',
            'expected_delivery' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'assigned_to' => 'required',
            'assigned_by' => 'required',
        ]);

        ProjectItem::create($validatedData);

        return redirect()->route('project-items.index')->with('success', 'Project Item created successfully');
    }

    public function show($id)
    {
        $projectItem = ProjectItem::findOrFail($id);
        return view('project_items.show', compact('projectItem'));
    }

    public function edit($id)
    {
        $users = User::all();
        $projects = Project::all();
        $statuses = ProjectItemStatus::all();
        $sprints = Sprint::all();
        
        $projectItem = ProjectItem::findOrFail($id);
        
        return view('project_items.edit', compact('projects', 'statuses', 'sprints', 'projectItem', 'users'));
    }
    

    public function update(Request $request, $id)
    {

        $request->validate([
            'item_name' => 'required',
            'details' => 'required',
            'project_id' => 'required',
            'item_id' => 'required',
            'sprint_id' => 'required',
            'status' => 'required',
            'expected_delivery' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'assigned_to' => 'required',
            'assigned_by' => 'required',
        ]);
        $projectItem = ProjectItem::findOrFail($id);

        // Update the project item fields based on the form data
        $projectItem->item_name = $request->input('item_name');
        $projectItem->details = $request->input('details');
        $projectItem->project_id = $request->input('project_id');
        $projectItem->item_id = $request->input('item_id');
        $projectItem->sprint_id = $request->input('sprint_id');
        $projectItem->status = $request->input('status');
        $projectItem->expected_delivery = $request->input('expected_delivery');
        $projectItem->start_date = $request->input('start_date');
        $projectItem->end_date = $request->input('end_date');
        $projectItem->assigned_to = $request->input('assigned_to');
        $projectItem->assigned_by = $request->input('assigned_by');

        $projectItem->save();

        return redirect()->route('project-items.index')->with('success', 'Project Item updated successfully');
    }

    public function destroy($id)
    {
        $projectItem = ProjectItem::findOrFail($id);
        $projectItem->delete();

        return redirect()->route('project-items.index')->with('success', 'Project Item deleted successfully');
       
    }
}
