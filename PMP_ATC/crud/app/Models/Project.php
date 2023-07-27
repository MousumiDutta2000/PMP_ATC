<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'project_name',
        'project_type',
        'project_description',
        'project_manager_id',
        'project_startDate',
        'project_endDate',
        'project_status',
        'client_spoc_name',
        'client_spoc_email',
        'client_spoc_contact',
        'vertical_id',
        'technology_id',
        'client_id',
        'project_members_id',
        'project_role_id',
    ];

    protected $casts = [
        'project_members_id' => 'array',
        'project_role_id' => 'array',
    ];

    // Relationships

    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function vertical()
    {
        return $this->belongsTo(Vertical::class, 'vertical_id');
    }

    public function technologies()
    {
        return $this->belongsTo(Technologies::class, 'technology_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function projectMembers()
    {
        return $this->belongsToMany(Profile::class, 'project_members', 'project_id', 'project_members_id')
            ->withPivot('project_role_id')
            ->withTimestamps();
    }
}