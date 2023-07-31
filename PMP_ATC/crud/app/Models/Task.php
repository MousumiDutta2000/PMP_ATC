<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'title',
        'type',
        'priority',
        'details',
        'attachments',
        'assigned_to',
        'created_by',
        'last_edited_by',
        'estimated_time',
        'time_taken',
        'status',
        'parent_task',
    ];

    public function createdBy()
    {
        return $this->belongsTo(Profile::class, 'created_by');
    }

    public function lastEditedBy()
    {
        return $this->belongsTo(Profile::class, 'last_edited_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(Profile::class, 'assigned_to');
    }

    public function parentTask()
    {
        return $this->belongsTo(Task::class, 'parent_task');
    }
}
