<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class HighestEducationValue extends Model
{
    use HasFactory;

    protected $table = 'highest_education_value';

    protected $fillable = ['highest_education_value'];
}
