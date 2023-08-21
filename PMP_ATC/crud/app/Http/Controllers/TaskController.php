<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Task;
use App\Models\TaskUser;

use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', compact('tasks'));
    }

        public function create()
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        $projects= Project::all();
        return view('kanban.kanban', compact('tasks','profiles','projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'details' => 'required',
            'assigned_to' => 'required',
            'project_task_status_id' => 'required',
           
        ]);

        $task = new Task();
        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->details = $request->details;
        $task->assigned_to = implode(',', $request->assigned_to);
        $task->project_task_status_id = $request->project_task_status_id;
        $task->save();

        $assignedToIds = explode(',', $task->assigned_to);
        $totalAssignedTasks = TaskUser::whereIn('assigned_to', $assignedToIds)->count();

        $assignedTo = $request->assigned_to;
        foreach ($assignedTo as $userId) {
            $taskUser = new TaskUser([
                'task_id' => $task->id,
                'assigned_to' => $userId,
            ]);
            $taskUser->save();
        }

        return redirect()->back()->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        $projects= Project::all();
        return view('tasks.edit', compact('task','tasks','profiles','projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'details' => 'required',
            'assigned_to' => 'required',
            // 'project_task_status_id' => 'required',
        ]);

        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->details = $request->details;
        $task->assigned_to = implode(',', $request->assigned_to);
        // $task->project_task_status_id = $request->project_task_status_id;

        $task->save();

        $assignedTo = $request->assigned_to;
        foreach ($assignedTo as $userId) {
            // Check if the relationship already exists before creating a new entry
            if (!$task->taskUsers->contains('assigned_to', $userId)) {
                $taskUser = new TaskUser([
                    'task_id' => $task->id,
                    'assigned_to' => $userId,
                ]);
                $taskUser->save();
            }
        }
        // foreach ($assignedTo as $userId) {
        //     $taskUser = new TaskUser([
        //         'task_id' => $task->id,
        //         'assigned_to' => auth()->user()->id,
        //     ]);
        //     $taskUser->assigned_to = $userId;
        //     $taskUser->save();
        // }
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}