<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'priority',
        'estimated_time',
        'details',
        'assigned_to',
        'project_task_status_id',
        
    ];
    
    public function taskUser()
    {
        return $this->belongsToMany(TaskUser::class, 'task_users', 'task_id', 'id');
    }

    public function projectTaskStatus()
    {
        return $this->belongsTo(ProjectTaskStatus::class, 'project_task_status_id');
    }
}
