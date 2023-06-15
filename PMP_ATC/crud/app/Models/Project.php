<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = ['project_name', 'project_type', 'project_description', 'project_manager', 'project_startDate', 'project_endDate', 'project_status', 'client_spoc_name', 'client_spoc_email', 'client_spoc_contact', 'project_status','vertical_id'];
}
