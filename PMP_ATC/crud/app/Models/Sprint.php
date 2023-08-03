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
        'createdAt',
        'created_by',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'createdAt',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // public function assignedTo()
    // {
    //     return $this->belongsTo(User::class, 'assigned_to');
    // }

    // public function assignedBy()
    // {
    //     return $this->belongsTo(User::class, 'assigned_by');
    // }

}
