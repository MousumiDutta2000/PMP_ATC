<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectItemStatus;

class ProjectItemStatusesSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the project item statuses
        $data = [
            [
                'status' => 'Under discussion',
            ],
            [
                'status' => 'Under development',
            ],
            [
                'status' => 'In queue',
            ],
            [
                'status' => 'Not Started',
            ],
            [
                'status' => 'Pending',
            ],
            [
                'status' => 'Delay',
            ],
            // Add more data as needed
        ];

        // Insert the data into the project_item_statuses table
        ProjectItemStatus::insert($data);
    }
}
