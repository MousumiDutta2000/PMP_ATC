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
    
    public function taskUsers()
    {
        return $this->hasMany(TaskUser::class, 'task_id');
    }

    
}
