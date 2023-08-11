<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $fillable = ['task_id', 'assigned_to'];

    // Define the relationship between TaskUser and Task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    // Define the relationship between TaskUser and User
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

