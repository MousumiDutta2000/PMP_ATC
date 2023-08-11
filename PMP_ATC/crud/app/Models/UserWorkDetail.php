<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserWorkDetail extends Model
{
    protected $fillable = [
        'project_id', 'task_id', 'date', 'start_time', 'end_time',
        'profile_id', 'notes', 'project_manager_id', // Update the field name
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('profile_id', Auth::id());
    }

        public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }
}