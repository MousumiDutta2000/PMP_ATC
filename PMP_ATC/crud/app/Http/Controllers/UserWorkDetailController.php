<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\UserWorkDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWorkDetailController extends Controller
{
    public function index()
    {
        $userWorkDetails = UserWorkDetail::with('project')->currentUser()->get();
        return view('user_work_details.index', compact('userWorkDetails'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('user_work_details.create', compact('projects'));
    }
      

    public function store(Request $request)
    {
        $profile_id = Auth::id();
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'task_id' => 'required|exists:tasks,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
            'project_manager' => 'required|string',
        ]);

        $data['profile_id'] = $profile_id;
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
            'project_manager' => 'required|string',
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
