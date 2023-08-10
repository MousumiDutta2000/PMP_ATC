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

        $taskStatuses = DB::table('project_task_status')
            ->join('task_status', 'project_task_status.task_status_id', '=', 'task_status.id')
            ->join('project', 'project_task_status.project_id', '=', 'project.id')
            ->select('task_status.status')
            ->where('project.id', $projectId)
            ->distinct()
            ->pluck('status')
            ->toArray();

            $projectTypes = DB::table('project_task_types')
            ->join('task_types', 'project_task_types.task_type_id', '=', 'task_types.id')
            ->join('project', 'project_task_types.project_id', '=', 'project.id')
            ->select('task_types.type_name')
            ->where('project.id', $projectId)
            ->distinct()
            ->pluck('type_name')
            ->toArray();

        
        return view('kanban.kanban', compact('taskStatuses', 'projectId', 'projectTypes','profiles','tasks','project'));
    }
}
