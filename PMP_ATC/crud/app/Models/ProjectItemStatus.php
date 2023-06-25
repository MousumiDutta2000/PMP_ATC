<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectItemStatus extends Model
{
    protected $table = 'project_item_statuses';

    protected $fillable = ['status'];
}
