<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'title',
        'type',
        'priority',
        'details',
        'attachments',
        'assigned_to',
        'created_by',
        'last_edited_by',
        'estimated_time',
        'time_taken',
        'status',
        'parent_task',
    ];

   
}
