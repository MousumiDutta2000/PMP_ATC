<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profile;
// use App\Models\Task;
// use Illuminate\Support\Str;

class KanbanController extends Controller
{
    public function showKanban($projectId)
    {
        $profiles= Profile::all();

        $taskStatuses = DB::table('project_task_status')
            ->join('task_status', 'project_task_status.task_status_id', '=', 'task_status.id')
            ->join('project', 'project_task_status.project_id', '=', 'project.id')
            ->select('task_status.status')
            ->where('project.id', $projectId)
            ->distinct()
            ->pluck('status')
            ->toArray();

            $projectTypes = DB::table('project_task_types')
            ->join('task_types', 'project_task_types.task_type_id', '=', 'task_types.id') // Corrected column name here
            ->join('project', 'project_task_types.project_id', '=', 'project.id')
            ->select('task_types.type_name')
            ->where('project.id', $projectId)
            ->pluck('type_name') // Changed pluck() to select the correct column
            ->toArray();
        

        return view('kanban.kanban', compact('taskStatuses', 'projectId', 'projectTypes','profiles'));
    }


    // public function createTask(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'priority' => 'required',
    //         'title' => 'required',
    //         'details' => 'required',
    //         'assigned_to' => 'required',
    //         'due_date' => 'required',
    //     ]);

    //     // Create a new task
    //     $task = new Task;
    //     $task->uuid = substr(Str::uuid()->toString(), 0, 8);
    //     $task->priority = $request->priority;
    //     $task->title = $request->title;
    //     $task->details = $request->details;
    //     $task->assigned_to = $request->assigned_to;
    //     $task->due_date = $request->due_date;
    //     $task->save();

    //     // Redirect back to the Kanban view
    //     return redirect()->back();
    // }

}
