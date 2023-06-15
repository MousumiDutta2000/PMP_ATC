<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['project_id'];
    
    // Define the relationship with the Project model
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

