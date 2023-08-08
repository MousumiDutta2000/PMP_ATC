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
        
    ];
    
    public function taskUser()
    {
        return $this->belongsToMany(TaskUser::class, 'task_users', 'task_id', 'id');
    }
}
