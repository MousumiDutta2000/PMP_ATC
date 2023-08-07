<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profile;

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
            ->pluck('type_name')
            ->toArray();
        

        return view('kanban.kanban', compact('taskStatuses', 'projectId', 'projectTypes','profiles'));
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
