<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskType extends Model
{
    protected $table = 'task_types';
    
    protected $fillable = [
        'type_name',
        'level',
        'description'
    ];
}

