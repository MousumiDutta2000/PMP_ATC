<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'details',
        'project_id',
        'item_id',
        'sprint_id',
        'status',
        'expected_delivery',
        'start_date',
        'end_date',
        'assigned_to',
        'assigned_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }


    public function itemStatus()
    {
        return $this->belongsTo(ProjectItemStatus::class, 'item_id');
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }
}
