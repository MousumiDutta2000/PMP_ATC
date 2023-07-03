<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the technologies
        $data = [
            [
                'technology_name' => 'PHP',
                'expertise' => 'Intermediate',
            ],
            [
                'technology_name' => 'JavaScript',
                'expertise' => 'Advanced',
            ],
            [
                'technology_name' => 'Python',
                'expertise' => 'Beginner',
            ],
            // Add more data as needed
        ];

        // Insert the data into the technologies table
        Technology::insert($data);
    }
}
