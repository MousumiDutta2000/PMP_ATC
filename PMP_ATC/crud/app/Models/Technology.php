<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'technology_name',
        'expertise',
    ];

    public function projects()
{
    return $this->belongsToMany(Project::class, 'project_technology', 'technology_id', 'project_id');
}


}
