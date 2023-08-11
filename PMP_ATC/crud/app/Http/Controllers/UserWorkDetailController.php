<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\UserWorkDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWorkDetailController extends Controller
{
    public function index()
    {
        $userWorkDetails = UserWorkDetail::with('project', 'projectManager')->currentUser()->get();
        return view('user_work_details.index', compact('userWorkDetails'));
    }

    public function create()
    {
        $tasks = Task::all();
        $projects = Project::all();
        $projectManagersByProject = $projects->pluck('project_manager_id', 'id')->toArray();
        return view('user_work_details.create', compact('projects', 'projectManagersByProject', 'tasks'));
    }
      

    public function store(Request $request)
    {
        $profile_id = Auth::id();
        $data = $request->validate([
            'project_id' => 'required|exists:project,id',
            'task_id' => 'required|exists:tasks,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
        ]);
    
        $project = Project::findOrFail($request->input('project_id'));
    
        $data['profile_id'] = $profile_id;
        $data['project_manager_id'] = $project->Project_manager_id; // Retrieve from associated project
        $data['date'] = now(); // Set the current date
    
        UserWorkDetail::create($data);
    
        return redirect()->route('user_work_details.index');
    }
    

    public function edit(UserWorkDetail $userWorkDetail)
    {
        $projects = Project::all();
        $projectManagers = Project::pluck('project_manager')->unique();
        $tasks = Task::where('project_id', $userWorkDetail->project_id)->get();
        return view('user_work_details.edit', compact('userWorkDetail', 'projects', 'projectManagers', 'tasks'));
    }

    public function update(Request $request, UserWorkDetail $userWorkDetail)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'task_id' => 'required|exists:tasks,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
        ]);

        $userWorkDetail->update($data);
        return redirect()->route('user_work_details.index');
    }

    public function destroy(UserWorkDetail $userWorkDetail)
    {
        $userWorkDetail->delete();
        return redirect()->route('user_work_details.index');
    }
}
