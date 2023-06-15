<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{
    use HasFactory;

    protected $table = 'vertical';

    protected $fillable = [
        'vertical_name',
        'vertical_head_name',
        'vertical_head_emailId',
        'vertical_head_contact',
    ];
}
