<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'title',
        // 'sprint_id',
        'type',
        'priority',
        'details',
        // 'attachments',
        'assigned_to',
        // 'created_by',
        // 'last_edited_by',
        // 'estimated_time',
        // 'time_taken',
        'status',
        // 'parent_task',
    ];

    public function sprintId()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }

    public function taskTypeId()
    {
        return $this->belongsTo(Project::class, 'type');
    }
    public function createdBy()
    {
        return $this->belongsTo(Profile::class, 'created_by');
    }

    public function lastEditedBy()
    {
        return $this->belongsTo(Profile::class, 'last_edited_by');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'task_users', 'task_id', 'profile_id')
            ->withPivot('assigned_by', 'assigned_date')
            ->withTimestamps();
    }

    public function assignedTo()
{
    return $this->belongsToMany(Profile::class, 'task_users', 'task_id', 'user_id');
}


    public function parentTask()
    {
        return $this->belongsTo(Task::class, 'parent_task');
    }


    

    // public function profiles()
    // {
    //     return $this->belongsToMany(Profile::class, 'task_users', 'task_id', 'profile_id')
    //         ->withPivot('assigned_by')
    //         ->withTimestamps();
    // }

    // working 1st
//     public function users()
// {
//     return $this->belongsToMany(Profile::class, 'task_users', 'task_id', 'profile_id');
// }


}
