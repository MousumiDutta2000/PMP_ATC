<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vertical;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'contact_number', 'line_manager_id', 'user_id', 'vertical_id', 'designation_id', 'highest_educational_qualification_id', 'image'];

    public function lineManager()
    {
        return $this->belongsTo(User::class, 'line_manager_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vertical()
    {
        return $this->belongsTo(Vertical::class, 'vertical_id');
    }
}
