<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ProjectRole;
use App\Models\Technology;

class UserTechnology extends Model
{
    use HasFactory;

    protected $table = 'user_technologies';

    protected $fillable = ['user_id','project_role_id','technology_id','details','years_of_experience','is_current_company'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project_role()
    {
        return $this->belongsTo(ProjectRole::class, 'project_role_id');
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
