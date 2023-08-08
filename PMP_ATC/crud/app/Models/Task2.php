<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        // 'sprint_id',
        // 'type',
        'priority',
        'description',
        // 'attachments',
        'assigned_to',
        'due_date',
        // 'created_by',
        // 'last_edited_by',
        // 'estimated_time',
        // 'time_taken',
        // 'status',
        // 'parent_task',
    ];

    // public function sprintId()
    // {
    //     return $this->belongsTo(Sprint::class, 'sprint_id');
    // }

    // public function taskTypeId()
    // {
    //     return $this->belongsTo(Project::class, 'type');
    // }
    // public function createdBy()
    // {
    //     return $this->belongsTo(Profile::class, 'created_by');
    // }

    // public function lastEditedBy()
    // {
    //     return $this->belongsTo(Profile::class, 'last_edited_by');
    // }

    // public function parentTask()
    // {
    //     return $this->belongsTo(Task::class, 'parent_task');
    // }

    public function taskUser()
    {
        return $this->hasOne(TaskUser::class, 'task_id', 'id');
    }

}
