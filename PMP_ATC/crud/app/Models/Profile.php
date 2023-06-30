<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vertical;
use App\Models\HighestEducationValue;


class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['profile_name', 'email', 'contact_number', 'line_manager_id', 'user_id', 'vertical_id', 'designation_id', 'highest_educational_qualification_id', 'image'];

    public function profileName()
    {
        return $this->belongsTo(User::class, 'profile_name');
    }

    public function lineManager()
    {
        return $this->belongsTo(User::class, 'line_manager_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'profile_name', 'id');
    }

    public function vertical()
    {
        return $this->belongsTo(Vertical::class, 'vertical_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function highestEducationValue()
    {
        return $this->belongsTo(HighestEducationValue::class, 'highest_educational_qualification_id');
    }

}
