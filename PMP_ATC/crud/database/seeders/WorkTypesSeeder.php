<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkType; // Make sure to import the appropriate model

class WorkTypesSeeder extends Seeder
{
    public function run()
    {
        $workTypes = [
            ['name' => 'Research', 'description' => 'Conducting investigative activities'],
            ['name' => 'Coding', 'description' => 'Writing and testing code'],
            // Add more work types here
        ];

        foreach ($workTypes as $workType) {
            WorkType::create($workType);
        }
    }
}
