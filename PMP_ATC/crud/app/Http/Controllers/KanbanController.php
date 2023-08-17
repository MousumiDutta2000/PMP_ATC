<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;


class KanbanController extends Controller
{
    public function showKanban($projectId)
    {
        $profiles= Profile::all();
        $project = Project::findOrFail($projectId);
        $tasks = Task::all();

        $taskStatusesWithIds = DB::table('project_task_status')
            ->join('task_status', 'project_task_status.task_status_id', '=', 'task_status.id')
            ->join('project', 'project_task_status.project_id', '=', 'project.id')
            ->select('project_task_status.id as project_task_status_id', 'task_status.status')
            ->where('project.id', $projectId)
            ->distinct()
            ->get();

            

            $projectTypes = DB::table('project_task_types')
            ->join('task_types', 'project_task_types.task_type_id', '=', 'task_types.id')
            ->join('project', 'project_task_types.project_id', '=', 'project.id')
            ->select('task_types.type_name')
            ->where('project.id', $projectId)
            ->distinct()
            ->pluck('type_name')
            ->toArray();

        
        return view('kanban.kanban', compact('taskStatusesWithIds', 'projectId', 'projectTypes','profiles','tasks','project'));
    }

    public function updateTaskStatus(Request $request)
{
    $taskId = $request->input('taskId');
    $statusId = $request->input('statusId');

    // Update the task status in the database
    $task = Task::findOrFail($taskId);
    $task->project_task_status_id = $statusId;
    $task->save();

    // You can return a success response if needed
    return response()->json(['message' => 'Task status updated successfully']);
}

}
