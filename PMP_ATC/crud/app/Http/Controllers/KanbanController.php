<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KanbanController extends Controller
{

    public function showKanban($projectId)
    {
        $taskStatuses = DB::table('project_task_status')
            ->join('task_status', 'project_task_status.task_status_id', '=', 'task_status.id')
            ->join('project', 'project_task_status.project_id', '=', 'project.id')
            ->select('task_status.status')
            ->where('project.id', $projectId)
            ->distinct()
            ->pluck('status')
            ->toArray();

        return view('kanban.kanban', compact('taskStatuses', 'projectId'));
    }
//     public function showKanban()
// {
//     $taskStatuses = DB::table('project_task_status')
//                     ->join('task_status', 'project_task_status.task_status_id', '=', 'task_status.id')
//                     ->select('task_status.status')
//                     ->distinct()
//                     ->pluck('status')
//                     ->toArray();

//     return view('kanban.kanban', compact('taskStatuses'));
// }

}
