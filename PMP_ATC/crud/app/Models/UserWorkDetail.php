<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserWorkDetail extends Model
{
    protected $fillable = [
        'project_id', 'task_id', 'date', 'start_time', 'end_time',
        'profile_id', 'notes', 'project_manager',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('profile_id', Auth::id());
    }
}