<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityStatus extends Model
{
    use HasFactory;

    protected $table = 'opportunity_status';

    protected $fillable = [
        'project_goal',
    ];
}
