<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;

    protected $table = 'project_member';

    protected $fillable = [
        'is_active',
        'user_id',
        'project_id',
        'project_role_id',
        'is_project_admin',
    ];
}
