<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'is_active',
        'user_id',
        'project_id',
        'project_role_id',
        'is_project_admin',
    ];
}
