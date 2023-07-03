<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    public function opportunityStatus()
{
    return $this->belongsTo(OpportunityStatus::class, 'opportunity_status_id');
}
}
