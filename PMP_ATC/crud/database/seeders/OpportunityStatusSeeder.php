<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpportunityStatus;

class OpportunityStatusSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'project_goal' => 'Achieved',
            ],
            [
                'project_goal' => 'Lost',
            ],
        ];

        OpportunityStatus::insert($data);
    }
}
