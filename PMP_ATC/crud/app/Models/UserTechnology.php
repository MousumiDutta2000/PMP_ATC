<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTechnology extends Model
{
    use HasFactory;

    protected $table = 'user_technologies';

    protected $fillable = ['user_id','project_role_id','technology_id','details','years_of_experience','is_current_company'];
}
