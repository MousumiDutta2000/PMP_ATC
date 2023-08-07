<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['attachments', 'file_size'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'tasks_id');
    }
}