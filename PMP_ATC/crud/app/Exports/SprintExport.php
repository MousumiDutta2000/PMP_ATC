<?php

namespace App\Exports;

use App\Models\Sprint;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SprintExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Sprint::query()
            ->join('project', 'sprints.project_id', '=', 'project.id')
            ->leftJoin('users', 'sprints.assigned_to', '=', 'users.id')
            ->leftJoin('users AS users2', 'sprints.assigned_by', '=', 'users2.id')
            ->select(
                'sprints.sprint_name',
                'sprints.is_global_sprint',
                'project.project_name',
                'sprints.start_date',
                'sprints.end_date',
                'sprints.status',
                'users.name AS assigned_to',
                'users2.name AS assigned_by',
                'sprints.created_at',
                 'sprints.updated_at',
            );
    }

    public function headings(): array
    {
        return [
            'Sprint Name',
            'Is Global Sprint',
            'Project Name',
            'Start Date',
            'End Date',
            'Status',
            'Assigned To',
            'Assigned By',
            'created_at',
            'updated_at',
        ];
    }
}

