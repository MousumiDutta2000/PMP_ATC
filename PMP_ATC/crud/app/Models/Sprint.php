<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = [
        'sprint_name',
        'project_id',
        'is_global_sprint',
        'start_date',
        'end_date',
        'status',
        'assigned_to',
        'assigned_by',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

}
