<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opportunity;
use App\Models\OpportunityStatus;

class OpportunitiesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'opportunity_status_id' => 1,
                'proposal' => 'Sample Proposal 1',
                'initial_stage' => 'Sample Initial Stage 1',
                'technical_stage' => 'Sample Technical Stage 1',
            ],
            [
                'opportunity_status_id' => 2,
                'proposal' => 'Sample Proposal 2',
                'initial_stage' => 'Sample Initial Stage 2',
                'technical_stage' => 'Sample Technical Stage 2',
            ],
        ];
        Opportunity::insert($data);
    }
}
