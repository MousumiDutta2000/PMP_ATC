<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTaskStatus extends Model
{
    protected $fillable = ['project_id', 'task_status_id'];
    protected $table = 'project_task_status';

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}

