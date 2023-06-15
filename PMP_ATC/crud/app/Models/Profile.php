<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','contact_number','line_manager_id','user_id','vertical_id','designation_id','highest_educational_qualification_id','image'];
}
