<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the designations
        $data = [
            [
                'level' => 'L1A',
            ],
            [
                'level' => 'L1B',
            ],
            // Add more designations as needed
        ];

        // Insert the data into the designations table
        Designation::insert($data);
    }
}
