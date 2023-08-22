<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\UserWorkDetail;
use App\Models\WorkType;
use App\Models\ProjectTaskStatus;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWorkDetailController extends Controller
{
    public function index()
    {
        $users = User::all();
        $profiles = Profile::all();
        $userWorkDetails = UserWorkDetail::with('project', 'projectManager')->currentUser()->get();
        return view('user_work_details.index', compact('userWorkDetails'));
    }

    public function create()
    {
        $distinctProjectIds = ProjectTaskStatus::with('project')->distinct('project_id')->pluck('project_id');

        $projectTaskStatusIds = ProjectTaskStatus::whereIn('project_id', $distinctProjectIds)->pluck('id');
    
        $tasks = Task::whereIn('project_task_status_id', $projectTaskStatusIds)->get();
    
        $projects = Project::all();
        $workTypes = WorkType::all();
        $projectManagersByProject = $projects->pluck('project_manager_id', 'id')->toArray();
    
        return view('user_work_details.create', compact('projects', 'projectManagersByProject', 'tasks', 'workTypes', 'distinctProjectIds', 'projectTaskStatusIds',));
    }    
    
      

    public function store(Request $request)
    {
        $profile_id = Auth::id();
        $data = $request->validate([
            'project_id' => 'required|exists:project,id',
            'task_id' => 'required|exists:tasks,id',
            'work_type_id' => 'required|exists:work_types,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
        ]);
    
        $project = Project::findOrFail($request->input('project_id'));
    
        $data['profile_id'] = $profile_id;
        $data['project_manager_id'] = $project->Project_manager_id; // Retrieve from associated project
        $data['date'] = now(); // Set the current date

        // dd($data);
    
            // Find the WorkType model instance
            $workType = WorkType::findOrFail($data['work_type_id']);

            // Create a new UserWorkDetail instance
            $userWorkDetail = new UserWorkDetail($data);

            // Associate the WorkType with the UserWorkDetail
            $userWorkDetail->workType()->associate($workType);

            // Save the UserWorkDetail to the database
            $userWorkDetail->save();

    
        return redirect()->route('user_work_details.index');
    }
    
    

    public function edit(UserWorkDetail $userWorkDetail)
    {
        $projectManagers = Project::pluck('project_manager_id')->unique();
        $workTypes = WorkType::all();
        return view('user_work_details.edit', compact('userWorkDetail', 'projectManagers', 'workTypes',));
    }

    public function update(Request $request, UserWorkDetail $userWorkDetail)
    {
        $data = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'work_type_id' => 'required|exists:work_types,id',
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

    public function getTasksForProject($projectId)
    {
        $tasks = Task::whereHas('projectTaskStatus', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })->get();
    
        return response()->json($tasks);
    }
    

}
