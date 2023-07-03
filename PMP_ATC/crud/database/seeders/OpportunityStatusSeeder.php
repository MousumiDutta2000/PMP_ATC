<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpportunityStatus;

class OpportunityStatusSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the opportunity status
        $data = [
            [
                'project_goal' => 'Achieved',
            ],
            [
                'project_goal' => 'Lost',
            ],
        ];

        // Insert the data into the opportunity_status table
        OpportunityStatus::insert($data);
    }
}
