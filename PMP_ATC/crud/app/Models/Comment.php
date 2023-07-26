<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'commented_by',
        'user',
        'task_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

    public function users()
    {
        return $this->belongsTo(Profile::class,'user');
    }

    public function commentedBy()
    {
        return $this->belongsTo(Profile::class,'commented_by');
    }
}
