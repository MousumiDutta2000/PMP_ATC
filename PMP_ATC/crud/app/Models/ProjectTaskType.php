<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTaskType extends Model
{
    protected $fillable = ['project_id', 'task_type_id'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}

